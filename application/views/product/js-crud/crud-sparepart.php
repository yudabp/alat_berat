<script type="text/javascript">
$(document).ready(function(){
  $("form.saveSPart").submit(function(e){
    e.preventDefault();
    // alert('test');
    var atribut = $(this).attr("id");
    if(atribut == "tambah"){
      tambah_spart();
    }
    else if(atribut == "update"){
      var idsparepart = $(this).data("id");
      update_spart(idsparepart);
    }
  });
});

function tambah_spart(){
  //alert('ok');
  var sparepart_name = $("#sparepart_name").val();
  var sparepart_code = $("#sparepart_code").val();
  var type = $("#type").val();
  var brand = $("#brand").val();
  var reg_date = $("#reg_date").val();
  var unit = $("#unit").val();
  var price = $("#price").inputmask('unmaskedvalue');

  if(sparepart_name == "" ){
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
      url : "<?php echo base_url(); ?>saveSPart",
            type: "POST",
            dataType: "JSON",
            data: {
                sparepart_name, sparepart_code, type, brand, reg_date, unit, price
            }
    });
    $("#formAdd").modal("hide");
      swal({
          title: "Success!",
          text: "Sparepart has been added",
          type: "success",
          icon: 'success',
          buttonsStyling: false,
          confirmButtonClass: "btn btn-success"
      },function(){
        location.reload();
      });
  }
}

function delItem(idsparepart){
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
        url: "<?php echo base_url() ?>delSPart",
        data: {idsparepart:idsparepart},
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
            text : "Failed to delete Sparepart",
            type : "error"
          })
        }
      });
    });
  
}

function edtItem(idsparepart){
  //alert(id);
  $.ajax({
      url : "<?php echo base_url(); ?>edtSPart",
    type: "POST",
    dataType: "JSON",
    data: {
        idsparepart : idsparepart
    },
    success : function(data){
            $("#formAdd").modal("show");
            $("#formSPartLabel").text("Edit Sparepart");
            $("form").attr("data-id", data.idsparepart);
            $("form").attr("id",'update');

            $("#sparepart_name").val(data.name);
            $("#sparepart_code").val(data.code);
            $("#brand").val(data.brand);
            $("#type").val(data.type);
            $("#reg_date").val(data.reg_date);
            $("#unit").val(data.unit);
            $("#price").val(data.price);

            $('.select2').select2().trigger('change');
            $("#btnspart").text("Update Sparepart");
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

function update_spart(idsparepart){
  //alert('ok');
  var sparepart_name = $("#sparepart_name").val();
  var sparepart_code = $("#sparepart_code").val();
  var type = $("#type").val();
  var brand = $("#brand").val();
  var reg_date = $("#reg_date").val();
  var unit = $("#unit").val();
  var price = $("#price").inputmask('unmaskedvalue');

  if(sparepart_name == ""){
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
      url : "<?php echo base_url(); ?>uptSPart",
            type: "POST",
            dataType: "JSON",
            data: {
                idsparepart, sparepart_name, sparepart_code, type, brand, reg_date, unit, price
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
