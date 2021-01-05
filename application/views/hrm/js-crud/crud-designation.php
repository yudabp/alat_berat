<script type="text/javascript">
$(document).ready(function(){
  $("form").submit(function(e){
    e.preventDefault();
    //alert('test');
    var atribut = $(this).attr("id");
    if(atribut == "tambah"){
      tambah_des();
    }
    else if(atribut == "update"){
      var id_des = $(this).data("id");
      update_des(id_des);
    }
  });
});

function tambah_des(){
  //alert('ok');
  var designation_title = $("#designation_title").val();
  var description = $("#description").val();
  if(designation_title == "" ){
      swal({
        title: "Empty field!",
          text: "Please check again.",
          type: "warning",
          icon: 'warning',
          buttonsStyling: false,
          confirmButtonClass: "btn btn-warning"
      }).catch(swal.noop);
  }else{
      //Memulai memasukan data ke database
    $.ajax({
      url : "<?php echo base_url(); ?>saveDes",
            type: "POST",
            dataType: "JSON",
            data: {
                designation_title : designation_title,
                description : description,
            }
    });
    $("#formAdd").modal("hide");
      swal({
          title: "Success!",
          text: "Designation has been added",
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
          window.location.href="<?php echo base_url();?>delDes/"+id;
                /*$.ajax({
                  url : "<?php echo base_url(); ?>delDes",
                        type: "POST",
                        dataType: "JSON",
                        data: {
                          id : id
                        }
                        });

                          swal({
                              title: 'Congratulation',
                              text: 'Data has been deleted',
                              type: 'success',
                              confirmButtonClass: "btn btn-success",
                              buttonsStyling: false
                          });
                          location.reload();*/
          });
          //Prosess Penghapusan data
}

function edtItem(id){
  //alert(id);
  $.ajax({
      url : "<?php echo base_url(); ?>edtDes",
    type: "POST",
    dataType: "JSON",
    data: {
        id : id
    },
    success : function(data){
            $("#formAdd").modal("show");
            $("#formStaffLabel").text("Edit Designation");
            $("form").attr("data-id", data.iddesignation);
            $("form").attr("id",'update');
            $("#designation_title").val(data.designationtitle);
            $("#description").val(data.designationdecs);
            $("#btnok").text("Update Designation");
    },
    error : function(jqXHR, textStatus, errorThrown){
      swal({
            title: 'Failed!',
            text: 'Cannot get data.',
            type: 'error',
            confirmButtonClass: "btn btn-danger",
            buttonsStyling: false
        }).catch(swal.noop)
    }
  });
}

function update_des(id_des){
  //alert('ok');
  var designation_title = $("#designation_title").val();
  var description = $("#description").val();
  if(designation_title == "" || description == "" ){
      swal({
        title: "Empty field!",
          text: "Please check again.",
          type: "warning",
          icon: 'warning',
          buttonsStyling: false,
          confirmButtonClass: "btn btn-warning"
      }).catch(swal.noop);
  }else{
      //Memulai memasukan data ke database
    $.ajax({
      url : "<?php echo base_url(); ?>uptDes",
            type: "POST",
            dataType: "JSON",
            data: {
                id_des : id_des,
                designation_title : designation_title,
                description : description,
            }
    });
    $("#formAdd").modal("hide");
      swal({
          title: "Success!",
          text: "Data has been updated",
          type: "success",
          icon: 'success',
          buttonsStyling: false,
          confirmButtonClass: "btn btn-success"
      },function(){
        location.reload();
      });
  }
}
</script>
