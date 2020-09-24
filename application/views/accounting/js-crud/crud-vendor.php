<script type="text/javascript">
function delItem(id){
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
              window.location.href="<?php echo base_url(); ?>delVen/"+id;
          });
}

function edtItem(id){
  $.ajax({
      url : "<?php echo base_url(); ?>showVen",
    type: "POST",
    dataType: "JSON",
    data: {
        id : id
    },
    success : function(data){
            $(".modal-header h5").text("Edit Vendors");
            $("#formAdd").modal("show");
            $("form").attr("action", "<?php echo base_url('uptVen'); ?>");
            $("#first_name").val(data.vendor_first_name);
            $("#last_name").val(data.vendor_last_name);
            $("#email").val(data.vendor_email);
            $("#phone_no").val(data.vendor_phone);
            $("#job_title").val(data.vendor_job_title);
            $("#company").val(data.vendor_company);
            $("#address").val(data.vendor_address);
            $("#city").val(data.vendor_city);
            $("#state").val(data.vendor_state);
            $("#zip").val(data.vendor_zip);
            $("#joined").val(data.vendor_joined);
            $("#keyword").val(data.idvendors);
            $("button[type='submit']").text("Update Vendors");
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

function viewItem(id){
  $.ajax({
      url : "<?php echo base_url(); ?>showVen",
    type: "POST",
    dataType: "JSON",
    data: {
        id : id
    },
    success : function(data){
            $("#detailStaff").modal("show");
            $("#first_named").html(data.vendor_first_name);
            $("#last_named").html(data.vendor_last_name);
            $("#emaild").html(data.vendor_email);
            $("#phoned").html(data.vendor_phone);
            $("#jobd").html(data.vendor_job_title);
            $("#companyd").html(data.vendor_company);
            $("#Addressd").html(data.vendor_address);
            $("#cityd").html(data.vendor_city);
            $("#stated").html(data.vendor_state);
            $("#zipd").html(data.vendor_zip);
            $("#joinedd").html(data.vendor_joined);

            var cekimg = data.vendor_photo;
            if(cekimg !=""){
              $("#userimg").attr('src','<?php echo base_url(); ?>assets/vendor/'+cekimg);
            }else{
              $("#userimg").attr('src','<?php echo base_url(); ?>assets/vendor/defuser.png');
            }

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
</script>
