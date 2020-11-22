<script type="text/javascript">
function delItem(id){
  //alert(id);
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
          window.location.href="<?php echo base_url(); ?>delQuo/"+id;
          });
          //Prosess Penghapusan data
}

function printItem(id){
    url = "<?php echo base_url(); ?>print-quotation/"+id;
    Object.assign(document.createElement('a'), { target: '_blank', href: url}).click();
}

function editItem(num) {
    window.location.href="<?php echo base_url(); ?>add-quotation?number="+num;
}

function createJob(num) {
    window.location.href="<?php echo base_url(); ?>add-job-order?quonum="+num;
    // $.ajax({
    //     url : "<?php echo base_url(); ?>createJob",
    //     type: "POST",
    //     dataType: "JSON",
    //     data: {
    //         id : id,
    //     }
    // });
}

function saveQuo(){
    var quote_number = $("#quote_number").val();
    var quote_date = $("#quote_date").val();
    var shipping_from = $("#branch_office").val();
    var destination = $("#destination").val();
    var customer_name = $("#customer_name").val();
    var subject = $("#subject").val();
    var expires_date = $("#expires_date").val();
    var term_payment = $("#term_payment").val();
    var desk_header = $("#desk_header").val();
    var desk_footer = $("#desk_footer").val();
    if(customer_name == ""){
        swal({
            title: "Data ada yang kosong!",
                text: "Tolong isi customer name.",
                type: "warning",
                icon: 'warning',
                buttonsStyling: false,
                confirmButtonClass: "btn btn-warning"
        }).catch(swal.noop);
    }else{   
      //Memulai memasukan data ke database
    $.ajax({
        url : "<?php echo base_url(); ?>savequotation",
        type: "POST",
        dataType: "JSON",
        data: {
            quote_number : quote_number,
            quote_date : quote_date,
            shipping_from : shipping_from,
            destination : destination,
            customer_name : customer_name,
            subject : subject,
            expires_date : expires_date,
            term_payment : term_payment,
            desk_header : desk_header,
            desk_footer : desk_footer
        }
    });
    // $("#formAdd").modal("hide");
      swal({
            title: "Congratulation!",
            text: "Quotation has been added",
            type: "success",
            icon: 'success',
            buttonsStyling: false,
            confirmButtonClass: "btn btn-success"
        },function(){
            location.href="<?php echo base_url(); ?>add-quotation?number="+quote_number;
        });
    }
}

function upQuo(id){
    // var id_quotation = $("#id_quotation").val();
    var quote_number = $("#quote_number").val();
    var quote_date = $("#quote_date").val();
    var shipping_from = $("#branch_office").val();
    var destination = $("#destination").val();
    var customer_name = $("#customer_name").val();
    var subject = $("#subject").val();
    var expires_date = $("#expires_date").val();
    var term_payment = $("#term_payment").val();
    var desk_header = $("#desk_header").val();
    var desk_footer = $("#desk_footer").val();
    if(customer_name == ""){
        swal({
            title: "Data ada yang kosong!",
                text: "Tolong isi customer name.",
                type: "warning",
                icon: 'warning',
                buttonsStyling: false,
                confirmButtonClass: "btn btn-warning"
        }).catch(swal.noop);
    }else{   
      //Memulai memasukan data ke database
    $.ajax({
        url : "<?php echo base_url(); ?>upquotation",
        type: "POST",
        dataType: "JSON",
        data: {
            id_quotation : id,
            quote_number : quote_number,
            quote_date : quote_date,
            shipping_from : shipping_from,
            destination : destination,
            customer_name : customer_name,
            subject : subject,
            expires_date : expires_date,
            term_payment : term_payment,
            desk_header : desk_header,
            desk_footer : desk_footer
        },
        error: (error) => {
            console.log(JSON.stringify(error));
        }
    });
    // $("#formAdd").modal("hide");
        swal({
            title: "Congratulation!",
            text: "Quotation has been updated",
            type: "success",
            icon: 'success',
            buttonsStyling: false,
            confirmButtonClass: "btn btn-success"
        },function(){
            location.href="<?php echo base_url(); ?>add-quotation?number="+quote_number;
        });
    }
}

function saveRate(){
    var id_quo = $("#id_quo").val();
    var rate_item_cost = $("#rate_item_cost").val();
    var rate_unit = $("#rate_unit").val();
    var rate_qty = $("#rate_qty").val();
    var rate_price = $("#rate_price").val();
    var rate_prices = $("#rate_prices").val();
    var note = $("#note").val();
    if(rate_item_cost == ""||rate_unit == ""||rate_qty == ""||rate_price == "") {
        swal({
            title: "Data ada yang kosong!",
                text: "Tolong isi lengkapi data.",
                type: "warning",
                icon: 'warning',
                buttonsStyling: false,
                confirmButtonClass: "btn btn-warning"
        }).catch(swal.noop);
    }else{   
      //Memulai memasukan data ke database
    $.ajax({
        url : "<?php echo base_url(); ?>saveratequote",
        type: "POST",
        dataType: "JSON",
        data: {
            id_quo : id_quo,
            rate_item_cost : rate_item_cost,
            rate_unit : rate_unit,
            rate_qty : rate_qty,
            rate_price : rate_price,
            rate_prices : rate_prices,
            note : note,
        }
    });
    $("#formRate").modal("hide");
        swal({
            title: "Congratulation!",
            text: "Rate Quote has been added",
            type: "success",
            icon: 'success',
            buttonsStyling: false,
            confirmButtonClass: "btn btn-success"
        },function(){
            location.reload();
        });
    }
}

function delRate(id){
  //alert(id);
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
          window.location.href="<?php echo base_url(); ?>delRate/"+id;
          });
          //Prosess Penghapusan data
}

function editRate(id){
  $.ajax({
      url : "<?php echo base_url(); ?>editRate",
    type: "POST",
    dataType: "JSON",
    data: {
        id : id
    },
    success : function(data){
            $("#formRate").modal("show");
            $("#formRateLabel").text("Edit Rate Quote");
            $("#rate_item_cost").val(data.item_cost);
            $("#rate_unit").val(data.unit);
            $("#rate_qty").val(data.qty);
            $("#rate_price").val(data.price);
            $("#note").val(data.note);
            // $("#btnok").html('onclick="uptRate('<?php echo $value->id_rate_quote; ?>')"');
            $("#btnSaveR").attr('onclick',"uptRate('"+id+"')");
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

function uptRate(id){
    var id_quo = $("#id_quo").val();
    var rate_item_cost = $("#rate_item_cost").val();
    var rate_unit = $("#rate_unit").val();
    var rate_qty = $("#rate_qty").val();
    var rate_price = $("#rate_price").val();
    var rate_prices = $("#rate_prices").val();
    var note = $("#note").val();
    if(rate_item_cost == ""||rate_unit == ""||rate_qty == ""||rate_price == "") {
        swal({
            title: "Data ada yang kosong!",
                text: "Tolong isi lengkapi data.",
                type: "warning",
                icon: 'warning',
                buttonsStyling: false,
                confirmButtonClass: "btn btn-warning"
        }).catch(swal.noop);
    }else{   
      //Memulai memasukan data ke database
    $.ajax({
        url : "<?php echo base_url(); ?>uptRate",
        type: "POST",
        dataType: "JSON",
        data: {
            id_rate_quote : id,
            id_quo : id_quo,
            rate_item_cost : rate_item_cost,
            rate_unit : rate_unit,
            rate_qty : rate_qty,
            rate_price : rate_price,
            rate_prices : rate_prices,
            note : note,
        }
    });
    $("#formRate").modal("hide");
        swal({
            title: "Congratulation!",
            text: "Rate Quote has been added",
            type: "success",
            icon: 'success',
            buttonsStyling: false,
            confirmButtonClass: "btn btn-success"
        },function(){
            location.reload();
        });
    }
}

function saveEst(){
    var id_quo_est = $("#id_quo_est").val();
    var est_item_cost = $("#est_item_cost").val();
    var est_unit = $("#est_unit").val();
    var est_qty = $("#est_qty").val();
    var est_price = $("#est_price").val();
    var est_prices = $("#est_prices").val();
    var vendor = $("#vendor").val();
    if(est_item_cost == ""||est_unit == ""||est_qty == ""||est_price == "") {
        swal({
            title: "Data ada yang kosong!",
                text: "Tolong isi lengkapi data.",
                type: "warning",
                icon: 'warning',
                buttonsStyling: false,
                confirmButtonClass: "btn btn-warning"
        }).catch(swal.noop);
    }else{   
      //Memulai memasukan data ke database
    $.ajax({
        url : "<?php echo base_url(); ?>saveEst",
        type: "POST",
        dataType: "JSON",
        data: {
            id_quo_est : id_quo_est,
            est_item_cost : est_item_cost,
            est_unit : est_unit,
            est_qty : est_qty,
            est_price : est_price,
            est_prices : est_prices,
            vendor : vendor,
        },
        error: (error) => {
            console.log(JSON.stringify(error));
        }
    });
    $("#formRate").modal("hide");
        swal({
            title: "Congratulation!",
            text: "Estimation Cost has been added",
            type: "success",
            icon: 'success',
            buttonsStyling: false,
            confirmButtonClass: "btn btn-success"
        },function(){
            location.reload();
        });
    }
}

function delEst(id){
  //alert(id);
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
          window.location.href="<?php echo base_url(); ?>delEst/"+id;
          });
          //Prosess Penghapusan data
}

function editEst(id){
  $.ajax({
      url : "<?php echo base_url(); ?>editEst",
    type: "POST",
    dataType: "JSON",
    data: {
        id : id
    },
    success : function(data){
            $("#formCost").modal("show");
            $("#formRateLabel").text("Edit Rate Quote");
            $("#est_item_cost").val(data.item_cost);
            $("#est_unit").val(data.unit);
            $("#est_qty").val(data.qty);
            $("#est_price").val(data.price);
            $("#vendor").val(data.vendor);
            // $("#btnok").html('onclick="uptRate('<?php echo $value->id_est_quote; ?>')"');
            $("#btnSaveE").attr('onclick',"uptEst('"+id+"')");
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

function uptEst(id){
    var id_quo_est = $("#id_quo_est").val();
    var est_item_cost = $("#est_item_cost").val();
    var est_unit = $("#est_unit").val();
    var est_qty = $("#est_qty").val();
    var est_price = $("#est_price").val();
    var est_prices = $("#est_prices").val();
    var vendor = $("#vendor").val();
    if(est_item_cost == ""||est_unit == ""||est_qty == ""||est_price == "") {
        swal({
            title: "Data ada yang kosong!",
                text: "Tolong isi lengkapi data.",
                type: "warning",
                icon: 'warning',
                buttonsStyling: false,
                confirmButtonClass: "btn btn-warning"
        }).catch(swal.noop);
    }else{   
      //Memulai memasukan data ke database
    $.ajax({
        url : "<?php echo base_url(); ?>uptEst",
        type: "POST",
        dataType: "JSON",
        data: {
            id_estimation : id,
            id_quo_est : id_quo_est,
            est_item_cost : est_item_cost,
            est_unit : est_unit,
            est_qty : est_qty,
            est_price : est_price,
            est_prices : est_prices,
            vendor : vendor,
        }
    });
    $("#formCost").modal("hide");
        swal({
            title: "Congratulation!",
            text: "Estimation Cost has been updated",
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
