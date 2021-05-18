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
            confirmButtonText: 'Delete!',
            cancelButtonText: 'Cancel',
            buttonsStyling: false
        },function(){
          window.location.href="<?php echo base_url(); ?>delEmp/"+id;
          });
          //Prosess Penghapusan data
}

function edtItem(id){
  //alert(id);
  $.ajax({
      url : "<?php echo base_url(); ?>edtEmp",
    type: "POST",
    dataType: "JSON",
    data: {
        id : id
    },
    success : function(data){
            $("#formStaff").modal("show");
            $("#formStaffLabel").text("Edit Staff");
            $("form").attr("action", "<?php echo base_url('uptEmp'); ?>");
            $("#first_name").val(data.fname);
            $("#middle_name").val(data.mname);
            $("#last_name").val(data.lname);
            $("#employee_id").val(data.employeid);
            $("#email").val(data.email);
            $("#employee_type").val(data.employetype);
            $("#employee_status").val(data.employestatus);
            $("#date_of_hire").val(data.datehire);
            $("#department").val(data.department);
            $("#job_title").val(data.jobtitle);
            $("#location").val(data.location);
            $("#reporting_to").val(data.reportingto);
            $("#source_of_hire").val(data.sourceofhire);
            $("#payrate").val(data.payrate);
            $("#pay_type").val(data.paytype);
            $("#work_phone").val(data.workphone);
            $("#phone").val(data.phone);
            $("#hand_phone").val(data.handphone);
            $("#other_email").val(data.otheremail);
            $("#date_of_birth").val(data.birth);
            $("#nationality").val(data.nationality);
            $("#gender").val(data.gender);
            $("#marital_status").val(data.status);
            $("#driving_license").val(data.drivinglicense);
            $("#address").val(data.address);
            $("#city").val(data.city);
            $("#state").val(data.state);
            $("#zip_code").val(data.zipcode);
            $("#mainid").val(data.mainid);
            $("#username").val(data.username);
            $("#password").removeAttr('required','');
            var role = data.role_id;
						console.log(role)
            var cek = data.sendnotif;
            var allow = data.allow;
            if(cek == "yes"){
              $("#notification").attr('checked','checked');
            }
            if(allow == "yes"){
              $("#allow").attr('checked','checked');
            }
						if(role == "2dea1ed8-a7c7-4f44-b076-f50b0ca4a851"){
							$("#role1").attr('checked','checked');
						}else if(role == "31279819-6b9f-46c2-a28a-beec145fa31e") {
							$("#role2").attr('checked','checked');
						}else if(role == "35027eed-d317-4bc4-b74f-37e5f7d84544") {
							$("#role3").attr('checked','checked');
						}else if(role == "5073ed9b-00a9-4d18-863b-8fa69988090f") {
							$("#role4").attr('checked','checked');
						}else if(role == "a75f3ed5-0fee-47ad-a7ab-64fbc8c3e7c0") {
							$("#role5").attr('checked','checked');
						}else if(role == "bb91a898-f12b-47a9-94df-6c7c773714f4") {
							$("#role6").attr('checked','checked');
						}else if(role == "c962f62f-d67a-4d87-a476-42a3bfca5dd1") {
							$("#role7").attr('checked','checked');
						}

            $("#btnok").text("Update Department");
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

function viewItem(id){
  $.ajax({
      url : "<?php echo base_url(); ?>viewEmp",
    type: "POST",
    dataType: "JSON",
    data: {
        id : id
    },
    success : function(data){
            $("#detailStaff").modal("show");
            $("#first_named").html(data.fname);
            $("#middle_named").html(data.mname);
            $("#last_named").html(data.lname);
            $("#employee_idd").html(data.employeid);
            $("#emaild").html(data.email);
            $("#employee_typed").html(data.employetype);
            $("#employee_statusd").html(data.employestatus);
            $("#date_of_hired").html(data.datehire);
            $("#departmentd").html(data.departmenttitle);
            $("#job_titled").html(data.designationtitle);
            $("#locationd").html(data.location);
            $("#reporting_tod").html(data.departmentlead);
            $("#source_of_hired").html(data.sourceofhire);
            $("#payrated").html(data.payrate);
            $("#pay_typed").html(data.paytype);
            $("#work_phoned").html(data.workphone);
            $("#phoned").html(data.phone);
            $("#hand_phoned").html(data.handphone);
            $("#other_emaild").html(data.otheremail);
            $("#date_of_birthd").html(data.birth);
            $("#nationalityd").html(data.nationality);
            $("#genderd").html(data.gender);
            $("#marital_statusd").html(data.status);
            $("#driving_licensed").html(data.drivinglicense);
            $("#addressd").html(data.address);
            $("#cityd").html(data.city);
            $("#stated").html(data.state);
            $("#zip_coded").html(data.zipcode);
            $("#mainid").html(data.mainid);
            var cek = data.sendnotif;
            var cekimg = data.photo;
            if(cekimg !=""){
              $("#userimg").attr('src','<?php echo base_url(); ?>assets/staffprofil/'+cekimg);
            }
            if(cek == "yes"){
              $("#notification").attr('checked','checked');
            }
            $("#btnok").text("Update Department");
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
</script>
