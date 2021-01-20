<script type="text/javascript">
$(document).ready(function(){
  $("form.saveTruckService").submit(function(e){
    e.preventDefault();
    // alert('test');
    var atribut = $(this).attr("id");
    if(atribut == "tambah"){
      tambah_truck_service();
    }
    else if(atribut == "update"){
      var idtruck = $(this).data("id");
      update_truck_service(idtruck);
    }
  });
  $("#btndone").click(function(){
    doneService();
  });
});

function tambah_truck_service(){
  //alert('ok');
  var idtruck       = $("#idtruck").val();
  var service_date  = $("#service_date").val();
  var service_type  = $("#type_service").val();
  var driver_note   = $("#driver_note").val();
  var mechanic_note = $("#mechanic_note").val();
  var action        = [];
  $("input[name='action[]']").each(function(){
    action.push(this.value);
  });

  if(service_date == "" ){
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
      url : "<?php echo base_url(); ?>saveTruckService",
            type: "POST",
            dataType: "JSON",
            data: {
                idtruck,
                service_date,
                service_type,
                driver_note,
                action,
                mechanic_note
            }
    });
    $("#formAdd").modal("hide");
      swal({
          title: "Success!",
          text: "Truck Service has been added",
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

// function edtItem(id){
//   //alert(id);
//   $.ajax({
//       url : "<?php echo base_url(); ?>edtTruck",
//     type: "POST",
//     dataType: "JSON",
//     data: {
//         id : id
//     },
//     success : function(data){
//             $("#formAdd").modal("show");
//             $("#formTruckLabel").text("Edit Truck");
//             $("form").attr("data-id", data.idtruck);
//             $("form").attr("id",'update');

//             $("#plat_no").val(data.plat_no);
//             $("#brand").val(data.brand);
//             $("#type").val(data.type);
//             $("#reg_date").val(data.reg_date);
//             $("#driver").val(data.driver);
//             $("#chassis_no").val(data.chassis_no);
//             $("#machine_no").val(data.machine_no);

//             $('.select2').select2().trigger('change');
//             $("#btntruck").text("Update Truck");
//     },
//     error : function(jqXHR, textStatus, errorThrown){
//       swal({
//             title: 'Failed!',
//             text: 'Cannot get data.',
//             type: 'error',
//             confirmButtonClass: "btn btn-danger",
//             buttonsStyling: false
//         }).catch(swal.noop)
//     }
//   });
// }

function update_truck_service(idtruck){
  //alert('ok');
  var idservice     = $("#idservice").val();
  var service_date  = $("#service_date").val();
  var service_type  = $("#type_service").val();
  var driver_note   = $("#driver_note").val();
  var mechanic_note = $("#mechanic_note").val();

  if(service_date == "" ){
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
      url : "<?php echo base_url(); ?>uptTruckService",
            type: "POST",
            dataType: "JSON",
            data: {
                idservice,
                service_date,
                service_type,
                driver_note,
                mechanic_note
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

function addAction(action="", editing=false){
  loopID++;
  var headHtml = $('#p_action');
  if(editing){
    var html = `
    <div class="p_action`+loopID+`">
      <div class="row mt-2">
        <div class="col-md-10">
          <input type="text" class="form-control" rows="2" id="action" name="action[]" style="width: 100%;" value="`+action+`">
        </div>
      </div>
    </div>
    `;
  }
  else{
    var html = `
    <div class="p_action`+loopID+`">
      <div class="row mt-2">
        <div class="col-md-10">
          <input type="text" class="form-control" rows="2" id="action" name="action[]" style="width: 100%;" value="`+action+`">
        </div>
        <div class="col-md-2">
          <button type="button" class="btn btn-danger btn-just-icon add btn-sm btnDelete" data="p_action`+loopID+`" style="width:100% !important"><i class="fa fa-minus" style="margin:0"></i></button>
        </div>
      </div>
    </div>
    `;
  }
  headHtml.append(html);
  btnDelete = $('.btnDelete')
  btnDelete.click(function(){
    var id_div = $(this).attr('data');
    console.log(id_div);
    $('.'+id_div).remove();
  });
}

function resetAction(){
  var html=`<div class="p_action1">
              <div class="row" id="selected_action">
                <div class="col-md-10" >
                  <input type="text" class="form-control" rows="2" id="action" name="action[]" style="width: 100%;">
                </div>
                <div class="col-md-2">
                  <button type="button" onclick="addAction()" id="btnselect" class="btn btn-info btn-sm icon-btn mb-2" style="width:100% !important"><i class="mdi mdi-plus" style="margin:0"></i></button>
                </div>
              </div>
            </div>`;
  $("#p_action").html(html);
}

function addService(idtruck) {
  window.idservice = 0;
  loopID=1;
  $("#formService").modal("show");
  $("#idtruck").val(idtruck);
  $(".service-type_service").addClass("d-none");
  $("form.saveTruckService").attr("id", "tambah");
  resetAction();
}

function edtService(idtruck, idservice) {
  loopID=1;
  $("form.saveTruckService").attr("id", "update");
  $("#formService").modal("show");
  $("#idtruck").val(idtruck);
  $(".service-type_service").removeClass("d-none");
  resetAction();
  $("#btnselect").hide();
  $("#idservice").val(idservice);

  if(idservice!=window.idservice){
    $.ajax({
      url : "<?php echo base_url(); ?>edtTruckService",
    type: "POST",
    dataType: "JSON",
    data: {
        id : idservice
    },
    success : function(data){
            let service = data.service;
            let actions = data.actions;
            window.idservice = service.idservice;

            $("#service_date").val(service.service_date);
            $("#type_service").val(service.service_type);
            $("#driver_note").val(service.driver_note);
            $("#mechanic_note").val(service.mechanic_note);
            $('.select2').select2().trigger('change');
            // console.log(actions);
            for(let [key, action] of Object.entries(actions)){
              if(key=="0"){
                $("#action").val(action.action); 
              }
              else{
                addAction(action.action, true);
              }
            }
            // $("#formAdd").modal("show");
            // $("#formTruckLabel").text("Edit Truck");
            // $("form").attr("data-id", data.idtruck);
            // $("form").attr("id",'update');

            // $("#plat_no").val(data.plat_no);
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
}

function doneService(){
  var idtruck       = $("#idtruck").val();
  var idservice     = $("#idservice").val();
  var mechanic_note = $("#mechanic_note").val();

  $.ajax({
      url : "<?php echo base_url(); ?>doneTruckService",
            type: "POST",
            dataType: "JSON",
            data: {
                idtruck,
                idservice,
                mechanic_note
            }
    });
    $("#formAdd").modal("hide");
    swal({
        title: "Success!",
        text: "Truck Service is done!",
        type: "success",
        icon: 'success',
        buttonsStyling: false,
        confirmButtonClass: "btn btn-success"
    },function(){
      location.reload();
    });
}
</script>
