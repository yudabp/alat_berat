<script type="text/javascript">
$(document).ready(function(){
  $("form.saveServiceHEQ").submit(function(e){
    e.preventDefault();
    // alert('test');
    var atribut = $(this).attr("id");
    if(atribut == "tambah"){
      tambah_heq();
    }
    else if(atribut == "update"){
      var idshequipment = $(this).data("id");
      update_heq(idshequipment);
    }
  });
  $("#brand").change(function(){
    getServicePrice();
  });
  $("#type").change(function(){
    getServicePrice();
  });
  $('.total_price').inputmask({
    alias: 'currency',
    prefix: 'Rp. ',
  });
});

function getServicePrice()
{
  var brand = $("#brand").val();
  var type = $("#type").val();
  if(brand!=="" && type!==""){
    $.ajax({
      url : "<?php echo base_url(); ?>getServicePrice",
      type: "POST",
      dataType: "JSON",
      data: {
          brand, type
      },
      success : function(data){
        // console.log(data);
        if(data==null){
          $("#price").val("0").css("color", "#ccc");
          $("#btnheq").attr("disabled", "disabled");
        }
        else{
         $("#price").val(data.price).css("color", "#44cc22"); 
         $("#btnheq").removeAttr("disabled");
        }
        $('#price').inputmask({
          alias: 'currency',
          prefix: 'Rp. ',
        });

      },
      error : function(jqXHR, textStatus, errorThrown){
        swal({
              title: 'Failed!',
              text: 'Cannot get service price.',
              type: 'error',
              confirmButtonClass: "btn btn-danger",
              buttonsStyling: false
          }).catch(swal.noop)
      }
    });
  }
}

function tambah_heq(){
  //alert('ok');
  
  var h_equipment = $("#h_equipment").val();
  var date = $("#date").val();
  var brand = $("#brand").val();
  var type = $("#type").val();
  var operator = $("#operator").val();
  var work_start = $("#work_start").val();
  var work_end = $("#work_end").val();
  var price_per_hour = $("#price").inputmask('unmaskedvalue');

  if(date == "" ){
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
      url : "<?php echo base_url(); ?>saveServiceHEQ",
            type: "POST",
            dataType: "JSON",
            data: {
                h_equipment, date, brand, type,  operator, work_start, work_end, price_per_hour
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
        url: "<?php echo base_url() ?>delServiceHEQ",
        data: {idshequipment:heq_id},
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
      url : "<?php echo base_url(); ?>edtServiceHEQ",
    type: "POST",
    dataType: "JSON",
    data: {
        id : id
    },
    success : function(data){
            $("#formAdd").modal("show");
            $("#formHEqLabel").text("Edit Heavy Equipment");
            $("form").attr("data-id", data.idshequipment);
            $("form").attr("id",'update');

            $("#h_equipment").val(data.h_equipment);
            $("#date").val(data.date);
            $("#brand").val(data.brand);
            $("#type").val(data.type);
            $("#operator").val(data.operator);
            $("#work_start").val(data.work_start);
            $("#work_end").val(data.work_end);

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

function update_heq(idshequipment){
  //alert('ok');
  var h_equipment = $("#h_equipment").val();
  var date = $("#date").val();
  var brand = $("#brand").val();
  var type = $("#type").val();
  var operator = $("#operator").val();
  var work_start = $("#work_start").val();
  var work_end = $("#work_end").val();
  var price_per_hour = $("#price").inputmask('unmaskedvalue');

  if(date == ""){
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
      url : "<?php echo base_url(); ?>uptServiceHEQ",
            type: "POST",
            dataType: "JSON",
            data: {
                idshequipment, h_equipment, date, brand, type,  operator, work_start, work_end, price_per_hour
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
