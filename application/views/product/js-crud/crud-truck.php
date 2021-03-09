<script type="text/javascript">
$(document).ready(function(){
  $("form.saveTruck").submit(function(e){
    e.preventDefault();
    // alert('test');
    var atribut = $(this).attr("id");
    if(atribut == "tambah"){
      tambah_truck();
    }
    else if(atribut == "update"){
      var idtruck = $(this).data("id");
      update_truck(idtruck);
    }
  });
});

function tambah_truck(){
  //alert('ok');
  var name = $("#truck_name").val();
  var plat_no = $("#plat_no").val();
  var brand = $("#brand").val();
  var type = $("#type").val();
  var reg_date = $("#reg_date").val();
  var driver = $("#driver").val();
  var chassis_no = $("#chassis_no").val();
  var machine_no = $("#machine_no").val();
  if(plat_no == "" ){
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
      url : "<?php echo base_url(); ?>saveTruck",
            type: "POST",
            dataType: "JSON",
            data: {
                name, plat_no, brand, type, reg_date, driver, chassis_no, machine_no
            }
    });
    $("#formAdd").modal("hide");
      swal({
          title: "Success!",
          text: "Truck has been added",
          type: "success",
          icon: 'success',
          buttonsStyling: false,
          confirmButtonClass: "btn btn-success"
      },function(){
        location.reload();
      });
  }
}

function delItem(truck_id){
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
        url: "<?php echo base_url() ?>delTruck",
        data: {idtruck:truck_id},
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
            text : "Failed to delete Truck",
            type : "error"
          })
        }
      });
    });
  
}

function edtItem(id){
  //alert(id);
  $.ajax({
      url : "<?php echo base_url(); ?>edtTruck",
    type: "POST",
    dataType: "JSON",
    data: {
        id : id
    },
    success : function(data){
            var truck = data.truck;
            var services = data.services;
            var trips = data.trips;

            $("#formAdd").modal("show");
            $("#formTruckLabel").text("Edit Truck");
            $("form").attr("data-id", truck.idtruck);
            $("form").attr("id",'update');

            $("#truck_name").val(truck.name);
            $("#plat_no").val(truck.plat_no);
            $("#brand").val(truck.brand);
            $("#type").val(truck.type);
            $("#reg_date").val(truck.reg_date);
            $("#driver").val(truck.driver);
            $("#chassis_no").val(truck.chassis_no);
            $("#machine_no").val(truck.machine_no);

            $('.select2').select2().trigger('change');
            $("#btntruck").text("Update Truck");
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

function update_truck(idtruck){
  //alert('ok');
  var name = $("#truck_name").val();
  var plat_no = $("#plat_no").val();
  var brand = $("#brand").val();
  var type = $("#type").val();
  var reg_date = $("#reg_date").val();
  var driver = $("#driver").val();
  var chassis_no = $("#chassis_no").val();
  var machine_no = $("#machine_no").val();

  if(plat_no == ""){
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
      url : "<?php echo base_url(); ?>uptTruck",
            type: "POST",
            dataType: "JSON",
            data: {
                idtruck,
                name,
                plat_no,
                brand,
                type,
                reg_date,
                driver,
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

function serviceItem(id) {
  var url = "<?php base_url(); ?>service-truck/"+id;
  window.open(url);
}
</script>
