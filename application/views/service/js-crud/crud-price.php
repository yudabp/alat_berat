<script type="text/javascript">
$(document).ready(function(){
  $("form.savePrice").submit(function(e){
    e.preventDefault();
    // alert('test');
    var atribut = $(this).attr("id");
    if(atribut == "tambah"){
      tambah_price();
    }
    else if(atribut == "update"){
      var idprice = $(this).data("id");
      update_price(idprice);
    }
  });
});

function tambah_price(){
  //alert('ok');
  var type = $("#type").val();
  var brand = $("#brand").val();
  var price = $("#price").inputmask('unmaskedvalue');

  if(price == "" ){
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
      url : "<?php echo base_url(); ?>savePrice",
            type: "POST",
            dataType: "JSON",
            data: {
                price, type, brand
            }
    });
    $("#formAdd").modal("hide");
      swal({
          title: "Success!",
          text: "Price has been added",
          type: "success",
          icon: 'success',
          buttonsStyling: false,
          confirmButtonClass: "btn btn-success"
      },function(){
        location.reload();
      });
  }
}

function delItem(idprice){
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
        url: "<?php echo base_url() ?>delPrice",
        data: {idprice:idprice},
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
            text : "Failed to delete Price",
            type : "error"
          })
        }
      });
    });
  
}

function edtItem(idprice){
  //alert(id);
  $.ajax({
      url : "<?php echo base_url(); ?>edtPrice",
    type: "POST",
    dataType: "JSON",
    data: {
        idprice : idprice
    },
    success : function(data){
            $("#formAdd").modal("show");
            $("#formPriceLabel").text("Edit Price");
            $("form").attr("data-id", data.idprice);
            $("form").attr("id",'update');

            $("#brand").val(data.brand);
            $("#type").val(data.type);
            $("#price").val(data.price);

            $('.select2').select2().trigger('change');
            $("#btnprice").text("Update Price");
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

function update_price(idprice){
  //alert('ok');
  var type = $("#type").val();
  var brand = $("#brand").val();
  var price = $("#price").inputmask('unmaskedvalue');

  if(price == ""){
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
      url : "<?php echo base_url(); ?>uptPrice",
            type: "POST",
            dataType: "JSON",
            data: {
                idprice, type, brand, price
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
