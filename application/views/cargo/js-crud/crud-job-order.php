<script type="text/javascript">
function delJob(id){
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
          window.location.href="<?php echo base_url(); ?>delJob/"+id;
          });
          //Prosess Penghapusan data
}

function editItem(num) {
    window.location.href="<?php echo base_url(); ?>add-job-order?quonum="+num;
}

function printItem(data){
    url = "<?php echo base_url(); ?>print-job-order/"+data;
    Object.assign(document.createElement('a'), { target: '_blank', href: url}).click();
}

// function saveJob() {
//     showTable();
// }

function saveJob(){
    var jo_number = $("#jo_number").val();
    var jo_date = $("#jo_date").val();
    var jo_type = $("#jo_type").val();
    var freight_type = $("#freight_type").val();
    var id_quotation = $("#id_quotation").val();
   
    if(jo_number == "" || jo_date == "" || jo_type == "" || freight_type == ""){
        swal({
            title: "Data ada yang kosong!",
                text: "Tolong isi lengkapi data..",
                type: "warning",
                icon: 'warning',
                buttonsStyling: false,
                confirmButtonClass: "btn btn-warning"
        }).catch(swal.noop);
    }else{   
      //Memulai memasukan data ke database
    $.ajax({
        url : "<?php echo base_url(); ?>saveJob",
        type: "POST",
        dataType: "JSON",
        data: {
            jo_number : jo_number,
            jo_date : jo_date,
            jo_type : jo_type,
            freight_type : freight_type,
            id_quotation : id_quotation
        },
        // success : function () {
            
        // },
        error: (error) => {
            console.log(JSON.stringify(error));
        }
    });
    // $("#formAdd").modal("hide");
      swal({
            title: "Congratulation!",
            text: "Job Order has been added",
            type: "success",
            icon: 'success',
            buttonsStyling: false,
            confirmButtonClass: "btn btn-success"
            },function(){
                location.reload();
            });
    }
}

function uptJob(id){
    // Val Job Order
    var jo_number = $("#jo_number").val();
    var jo_date = $("#jo_date").val();
    var jo_type = $("#jo_type").val();
    var freight_type = $("#freight_type").val();
    var id_quotation = $("#id_quotation").val();
    // Val Data
    var shipper = $("#shipper").val();
    var consignee = $("#consignee").val();
    var notify_party = $("#notify_party").val();
    var agent = $("#agent").val();
    var etd = $("#etd").val();
    var eta = $("#eta").val();
    var stuffing = $("#stuffing").val();
    var receive = $("#receive").val();
    var loading = $("#loading").val();
    var discharge = $("#discharge").val();
    var delivery = $("#delivery").val();
    var hs_code = $("#hs_code").val();
    var deskripsi = $("#descofgoods").val();
    // Val Sea
    var shipping_line = $("#shipping_line").val();
    var shipment_number = $("#shipment_number").val();
    var shipping_mark = $("#shipping_marks").val();
    var qty = $("#qty").val();
    var piece = $("#piece").val();
    var type = $("#type_sea").val();
    var bl_number = $("#bl_number").val();
    var mbl_number = $("#mbl_number").val();
    var voyage = $("#voyage").val();
    var vessel = $("#vessel").val();
    var issued_office = $("#issued_office").val();
    // Val Air
    var airlines = $("#airlines").val();
    var flight_number = $("#flight_number").val();
    var hawb_number = $("#hawb_number").val();
    var mawb_number = $("#mawb_number").val();
    var aita_code = $("#aita_code").val();

    
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
        url : "<?php echo base_url(); ?>uptJob",
        type: "POST",
        dataType: "JSON",
        data: {
            // Job Order
            id_job_order : id,
            jo_number : jo_number,
            jo_date : jo_date,
            jo_type : jo_type,
            freight_type : freight_type,
            id_quotation : id_quotation,
            // Data
            shipper : shipper,
            consignee : consignee,
            notify_party : notify_party,
            agent : agent,
            etd : etd,
            eta : eta,
            stuffing : stuffing,
            receive : receive,
            loading : loading,
            discharge : discharge,
            delivery : delivery,
            hs_code : hs_code,
            deskripsi : deskripsi,
            // Data Sea
            shipping_line : shipping_line,
            shipment_number : shipment_number,
            shipping_mark : shipping_mark,
            qty : qty,
            piece : piece,
            type : type,
            bl_number : bl_number,
            mbl_number : mbl_number,
            voyage : voyage,
            vessel : vessel,
            issued_office : issued_office,
            // Data Air
            airlines : airlines,
            flight_number : flight_number,
            hawb_number : hawb_number,
            mawb_number : mawb_number,
            aita_code : aita_code,
        },
        error: (error) => {
            console.log(JSON.stringify(error));
        }
    });
    // $("#formAdd").modal("hide");
        swal({
            title: "Congratulation!",
            text: "Job Order has been updated",
            type: "success",
            icon: 'success',
            buttonsStyling: false,
            confirmButtonClass: "btn btn-success"
        },function(){
            // location.href="<?php echo base_url(); ?>add-quotation?number="+quote_number;
            location.reload();
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
