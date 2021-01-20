<script type="text/javascript">
$(document).ready(function(){
  $("form.saveHEquipmentService").submit(function(e){
    e.preventDefault();
    // alert('test');
    var atribut = $(this).attr("id");
    if(atribut == "tambah"){
      tambah_heq_service();
    }
    else if(atribut == "update"){
      var idhequipment = $(this).data("id");
      update_heq_service(idhequipment);
    }
  });
  $("#btndone").click(function(){
    doneService();
  });
});

function tambah_heq_service(){
  //alert('ok');
  var idhequipment  = $("#idhequipment").val();
  var service_date  = $("#service_date").val();
  var service_type  = $("#type_service").val();
  var description   = $("#description").val();
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
      url : "<?php echo base_url(); ?>saveHEqService",
            type: "POST",
            dataType: "JSON",
            data: {
                idhequipment,
                service_date,
                service_type,
                description,
                action,
                mechanic_note
            }
    });
    $("#formAdd").modal("hide");
      swal({
          title: "Success!",
          text: "Heavy Equipment Service has been added",
          type: "success",
          icon: 'success',
          buttonsStyling: false,
          confirmButtonClass: "btn btn-success"
      },function(){
        location.reload();
    });
  }
}

function update_heq_service(idhequipment){
  //alert('ok');
  var idservice     = $("#idservice").val();
  var service_date  = $("#service_date").val();
  var service_type  = $("#type_service").val();
  var description   = $("#description").val();
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
      url : "<?php echo base_url(); ?>uptHEqService",
            type: "POST",
            dataType: "JSON",
            data: {
                idservice,
                service_date,
                service_type,
                description,
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

function addService(idhequipment) {
  window.idservice = 0;
  loopID=1;
  $("#formService").modal("show");
  $("#idhequipment").val(idhequipment);
  $(".service-type_service").addClass("d-none");
  $("form.saveHEquipmentService").attr("id", "tambah");
  resetAction();
}

function edtService(idhequipment, idservice) {
  loopID=1;
  $("form.saveHEquipmentService").attr("id", "update");
  $("#formService").modal("show");
  $("#idhequipment").val(idhequipment);
  $(".service-type_service").removeClass("d-none");
  resetAction();
  $("#btnselect").hide();
  $("#idservice").val(idservice);

  if(idservice!=window.idservice){
    $.ajax({
      url : "<?php echo base_url(); ?>edtHEqService",
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
            $("#description").val(service.description);
            $("#mechanic_note").val(service.mechanic_note);
            $('.select2-nosearch').select2().trigger('change');
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
  var idhequipment       = $("#idhequipment").val();
  var idservice     = $("#idservice").val();
  var mechanic_note = $("#mechanic_note").val();

  $.ajax({
      url : "<?php echo base_url(); ?>doneHEqService",
            type: "POST",
            dataType: "JSON",
            data: {
                idhequipment,
                idservice,
                mechanic_note
            }
    });
    $("#formAdd").modal("hide");
    swal({
        title: "Success!",
        text: "Heavy Equipment Service is done!",
        type: "success",
        icon: 'success',
        buttonsStyling: false,
        confirmButtonClass: "btn btn-success"
    },function(){
      location.reload();
    });
}
</script>
