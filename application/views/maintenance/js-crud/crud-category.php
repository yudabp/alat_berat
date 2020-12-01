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
      var new_category = $("#new_category").val();
      var color = $("#inputColor").val();
      if(new_category == "" ){
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
          url : "<?php echo base_url(); ?>saveCat",
                type: "POST",
                dataType: "JSON",
                data: {
                  new_category : new_category ,
                  color : color
                }
        });

          swal({
              title: "Congratulation!",
              text: "Category has been added",
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
              window.location.href="<?php echo base_url(); ?>delCat/"+id;
          });
}

function edtItem(id){
  $.ajax({
      url : "<?php echo base_url(); ?>edtCat",
    type: "POST",
    dataType: "JSON",
    data: {
        id : id
    },
    success : function(data){
            $("#formStaffLabel").text("Edit Category");
            $("form").attr("data-id", id);
            $("form").attr("id",'update');
            $("#new_category").val(data.categoryname);
            $("#btnok").text("Update Category");
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
      var new_category = $("#new_category").val();
      if(new_category == "" ){
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
          url : "<?php echo base_url(); ?>uptCat",
                type: "POST",
                dataType: "JSON",
                data: {
                  keyword : keyword,
                  new_category : new_category ,
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
