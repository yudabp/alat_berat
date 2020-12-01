<script type="text/javascript">
$(document).ready(function(){
  $("form").submit(function(e){
    e.preventDefault();
    //alert('test');
    var atribut = $(this).attr("id");
    var id = $(this).data("id");
    if(atribut == "tambah"){
      tambah(id);
    }
    else if(atribut == "update"){
      var keyword = $(this).data("id");
      update(keyword);
    }
  });
});

function tambah(id){

      var answer = $("#answer").val();
      if(answer == "" ){
          swal({
            title: "Data ada yang kosong!",
              text: "Tolong lengkapi jawaban.",
              type: "warning",
              icon: 'warning',
              buttonsStyling: false,
              confirmButtonClass: "btn btn-warning"
          }).catch(swal.noop);
      }else{
        $.ajax({
            url : "<?php echo base_url(); ?>confirmDel",
            type: "POST",
            dataType: "JSON",
            data: {
                id : id,
                answer : answer,
            },
            success : function(data){
                    if(data.length > 0){
                        window.location.href="<?php echo base_url(); ?>delList/"+id;
                    }else{
                        swal({
                            title: 'Gagal!',
                            text: 'Gagal mengkonfirmasi jawab',
                            type: 'error',
                            confirmButtonClass: "btn btn-danger",
                            buttonsStyling: false
                        }).catch(swal.noop)
                    }
            },
            error : function(jqXHR, textStatus, errorThrown){
            swal({
                    title: 'Gagal!',
                    text: 'Gagal mengkonfirmasi jawab',
                    type: 'error',
                    confirmButtonClass: "btn btn-danger",
                    buttonsStyling: false
                }).catch(swal.noop)
            }
        });
      }
}



function delItem(id){
  $.ajax({
      url : "<?php echo base_url(); ?>getQuestion",
    type: "POST",
    dataType: "JSON",
    data: {
        id : id
    },
    success : function(data){
            $("form").attr("data-id", id);
            $("#formAdd").modal('show');
            $("#question").val(data.question);
            $("button[type='submit']").text("Confirm and delete");
    },
    error : function(jqXHR, textStatus, errorThrown){
      swal({
            title: 'Gagal!',
            text: 'Gagal mengambil data.',
            type: 'error',
            confirmButtonClass: "btn btn-danger",
            buttonsStyling: false
        }).catch(swal.noop)
    }
  });
}


</script>
