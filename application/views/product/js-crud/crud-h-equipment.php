<script type="text/javascript">
$(document).ready(function(){
  $("form.saveHEquipment").submit(function(e){
    e.preventDefault();
    // alert('test');
    var atribut = $(this).attr("id");
    if(atribut == "tambah"){
      tambah_heq();
    }
    else if(atribut == "update"){
      var idhequipment = $(this).data("id");
      update_heq(idhequipment);
    }
  });
});

function tambah_heq(){
  //alert('ok');
  var description = $("#description").val();
  var brand = $("#brand").val();
  var type = $("#type").val();
  var reg_date = $("#reg_date").val();
  var operator = $("#operator").val();
  var chassis_no = $("#chassis_no").val();
  var machine_no = $("#machine_no").val();
  if(description == "" ){
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
      url : "<?php echo base_url(); ?>saveHEquipment",
            type: "POST",
            dataType: "JSON",
            data: {
                description, brand, type, reg_date, operator, chassis_no, machine_no
            }
    });
    $("#formAdd").modal("hide");
      swal({
          title: "Success!",
          text: "Heavy Equipment has been added",
          type: "success",
          icon: 'success',
          buttonsStyling: false,
          confirmButtonClass: "btn btn-success"
      },function(){
        location.reload();
      });
  }
}

function delItem(heq_id){
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
        url: "<?php echo base_url() ?>delHEquipment",
        data: {idhequipment:heq_id},
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

function edtItem(id){
  //alert(id);
  $.ajax({
      url : "<?php echo base_url(); ?>edtHEquipment",
    type: "POST",
    dataType: "JSON",
    data: {
        id : id
    },
    success : function(data){
            $("#formAdd").modal("show");
            $("#formHEqLabel").text("Edit Heavy Equipment");
            $("form").attr("data-id", data.idhequipment);
            $("form").attr("id",'update');

            $("#description").val(data.description);
            $("#brand").val(data.brand);
            $("#type").val(data.type);
            $("#reg_date").val(data.reg_date);
            $("#operator").val(data.operator);
            $("#chassis_no").val(data.chassis_no);
            $("#machine_no").val(data.machine_no);

            $('.select2').select2().trigger('change');
            $("#btnheq").text("Update Heavy Equipment");
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

function update_heq(idhequipment){
  //alert('ok');
  var description = $("#description").val();
  var brand = $("#brand").val();
  var type = $("#type").val();
  var reg_date = $("#reg_date").val();
  var operator = $("#operator").val();
  var chassis_no = $("#chassis_no").val();
  var machine_no = $("#machine_no").val();

  if(description == ""){
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
      url : "<?php echo base_url(); ?>uptHEquipment",
            type: "POST",
            dataType: "JSON",
            data: {
                idhequipment,
                description,
                brand,
                type,
                reg_date,
                operator,
                chassis_no,
                machine_no
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
