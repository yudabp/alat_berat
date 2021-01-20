<script type="text/javascript">
$(document).ready(function(){
  $("form.saveMining").submit(function(e){
    e.preventDefault();
    // alert('test');
    var atribut = $(this).attr("id");
    if(atribut == "tambah"){
      tambah_mining();
    }
    else if(atribut == "update"){
      var idmining = $(this).data("id");
      update_mining(idmining);
    }
  });
});


function tambah_mining(){
  //alert('ok');
  
  var client = $("#client").val();
  var delivery_no = $("#delivery_no").val();
  var plat_no = $("#plat_no").val();
  var delivery_date = $("#delivery_date").val();
  var working_hour = $("#working_hour").val();
  var est_tonage = $("#est_tonage").val();

  if(delivery_no == "" ){
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
      url : "<?php echo base_url(); ?>saveMining",
            type: "POST",
            dataType: "JSON",
            data: {
                client, delivery_no, plat_no, delivery_date, working_hour, est_tonage
            }
    });
    $("#formAdd").modal("hide");
      swal({
          title: "Success!",
          text: "Mining has been added",
          type: "success",
          icon: 'success',
          buttonsStyling: false,
          confirmButtonClass: "btn btn-success"
      },function(){
        location.reload();
      });
  }
}

function delItem(idmining){
  swal({
        title: 'Are you sure ?',
        text: "You will not be able to recover this data!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonClass: 'btn btn-success',
        cancelButtonClass: 'btn btn-danger',
        confirmButtonText: 'Yes, Delete!',
        cancelButtonText: 'Cancel',
        buttonsStyling: false
    },function(){
      $.ajax({
        type: "POST",
        url: "<?php echo base_url() ?>delMining",
        data: {idmining},
        dataType: "JSON",
        success: function (data) {
          swal({
            title : "Success!",
            text : "Your data has been deleted",
            type : "success"
          }, function(){
            location.reload();
          });   
        },
        error : function(){
          swal({
            title : "Oops!",
            text : "Failed to delete Heavy Equipment",
            type : "error"
          })
        }
      });
    });
  
}

function edtItem(idmining){
  //alert(id);
  $.ajax({
      url : "<?php echo base_url(); ?>edtMining",
    type: "POST",
    dataType: "JSON",
    data: {
        idmining : idmining
    },
    success : function(data){
            $("#formAdd").modal("show");
            $("#formMiningLabel").text("Edit Mining");
            $("form").attr("data-id", data.idmining);
            $("form").attr("id",'update');

            $("#client").val(data.client);
            $("#delivery_no").val(data.delivery_no);
            $("#plat_no").val(data.plat_no);
            $("#delivery_date").val(data.delivery_date);
            $("#working_hour").val(data.working_hour);
            $("#est_tonage").val(data.est_tonage);
            $("#exact_tonage").removeAttr("disabled").val(data.exact_tonage);
            $('.select2').select2().trigger('change');
            $("#btnmining").text("Update Mining");
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

function update_mining(idmining){
  //alert('ok');
  var client = $("#client").val();
  var delivery_no = $("#delivery_no").val();
  var plat_no = $("#plat_no").val();
  var delivery_date = $("#delivery_date").val();
  var working_hour = $("#working_hour").val();
  var est_tonage = $("#est_tonage").val();
  var exact_tonage = $("#exact_tonage").val();

  if(delivery_no == ""){
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
      url : "<?php echo base_url(); ?>uptMining",
            type: "POST",
            dataType: "JSON",
            data: {
                idmining, client, delivery_no, plat_no, delivery_date, working_hour, est_tonage, exact_tonage
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
