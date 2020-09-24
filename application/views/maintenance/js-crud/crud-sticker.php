<script type="text/javascript">
$(document).ready(function(){
  $("form").submit(function(e){
    e.preventDefault();
    //alert('test');
    var atribut = $(this).attr("id");
    if(atribut == "tambah"){
      tambah();
    }
    else if(atribut == "update"){
      var keyword = $(this).data("id");
      update(keyword);
    }
  });
});

function tambah(){

      var new_sticker = $("#new_sticker").val();
      if(new_sticker == "" ){
          swal({
            title: "Data ada yang kosong!",
              text: "Tolong lengkapi data.",
              type: "warning",
              icon: 'warning',
              buttonsStyling: false,
              confirmButtonClass: "btn btn-warning"
          }).catch(swal.noop);
      }else{
        $.ajax({
          url : "<?php echo base_url(); ?>saveStick",
                type: "POST",
                dataType: "JSON",
                data: {
                  new_sticker : new_sticker ,
                }
        });

          swal({
              title: "Congratulation!",
              text: "New sticker has been added",
              type: "success",
              icon: 'success',
              buttonsStyling: false,
              confirmButtonClass: "btn btn-success"
          },function(){
            location.reload();
          });
      }
}

function delItem(id){
  swal({
            title: 'Are you sure ?',
            text: "You will not be able to recover this file!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonClass: 'btn btn-success',
            cancelButtonClass: 'btn btn-danger',
            confirmButtonText: 'Ya, Hapus!',
            cancelButtonText: 'Batal',
            buttonsStyling: false
        },function(){
              window.location.href="<?php echo base_url(); ?>delStick/"+id;
          });
}

function edtItem(id){
  $.ajax({
      url : "<?php echo base_url(); ?>edtStick",
    type: "POST",
    dataType: "JSON",
    data: {
        id : id
    },
    success : function(data){
            $("label").text("Edit Sticker");
            $("form").attr("data-id", id);
            $("form").attr("id",'update');
            $("#new_sticker").val(data.sticker);
            $("button[type='submit']").text("Update Sticker");
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

function update(keyword){
      var new_sticker = $("#new_sticker").val();
      if(new_sticker == "" ){
          swal({
            title: "Data ada yang kosong!",
              text: "Tolong lengkapi data.",
              type: "warning",
              icon: 'warning',
              buttonsStyling: false,
              confirmButtonClass: "btn btn-warning"
          }).catch(swal.noop);
      }else{
        $.ajax({
          url : "<?php echo base_url(); ?>uptStick",
                type: "POST",
                dataType: "JSON",
                data: {
                  keyword : keyword,
                  new_sticker : new_sticker ,
                }
              });
                swal({
                    title: "Congratulation!",
                    text: "Data has been updated",
                    type: "success",
                    icon: 'success',
                    buttonsStyling: false,
                    confirmButtonClass: "btn btn-success"
                },function(){
                  location.reload();
                });

      };
}
</script>
