<script type="text/javascript">
$(document).ready(function(){
  $("form").submit(function(e){
    e.preventDefault();
    //alert('test');
    var atribut = $(this).attr("id");
    if(atribut == "tambah"){
      tambah_emp();
    }
    else if(atribut == "update"){
      var id_des = $(this).data("id");
      update_des(id_des);
    }
  });

	showEmp();

	function showEmp(){
		$.ajax({
			type : 'POST',
			url : "<?php echo base_url(); ?>payroll/showEmp",
			dataType : 'JSON',
			success : function(data){
				var html = '';
				var i;
				// var money = '';
				if (data != ''){
					for(i=0; i<data.length; i++){
						html += '<tr class="text-center">'+
									'<td>'+data[i].fname+' '+data[i].mname+' '+data[i].lname+'</td>'+
									'<td>'+data[i].email+'</td>'+
									'<td>'+data[i].departmenttitle+'</td>'+
									'<td>'+data[i].designationtitle+'</td>'+
									// '<td class="money">'+data[i].payrate+'</td>'+
									'<td>'+
										'<button type="button" class="btn btn-icons btn-rounded text-center item_hapus" data="'+data[i].id+'">'+
											'<i class="fa fa-trash-o"></i>'+
										'</button>'+
									'</td>'+
								'</tr>';
								// console.log('data[i].payrate'.toLocaleString('id-ID', { style: 'currency', currency: 'IDR' }));
					}
				}else{
					html += '<tr class="text-center">'+
								'<td colspan="5">Data Kosong</td>'+
							'</tr>';
				}
				// var number = 123456789.00;
				// console.log(number.toLocaleString('id-ID', { style: 'currency', currency: 'IDR' }));
				$('#show_emp').html(html);
			}

		});	
	}

	//GET HAPUS ALLOWANCE
	$('#show_emp').on('click','.item_hapus',function(){
		var id=$(this).attr('data');
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
		//alert(id);
				//if (isConfirm) {
					$.ajax({
						url : "<?php echo base_url(); ?>payroll/delEmp",
						type: "POST",
						dataType: "JSON",
						data: {
							id : id
						}
						});
							swal({
									title: 'Success!',
									text: 'Data has been deleted',
									type: 'success',
									confirmButtonClass: "btn btn-success",
									buttonsStyling: false
							});
							showEmp();
				/*} else {
						swal("Cancelled", "Your data is safe :)", "error");
				}*/
		});
		//Prosess Penghapusan data
	});

	function tambah_emp(){
		//alert('ok');
		var select_employee = $("#select_employee").val();
		var salary = $("#salary").val();
		var total_allowance = $("#total_allowance").val();
		var total_deduction = $("#total_deduction").val();
		if(salary == "" ){
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
				url : "<?php echo base_url(); ?>payroll/saveEmp",
				type: "POST",
				dataType: "JSON",
				data: {
						select_employee : select_employee,
						salary : salary,
						total_allowance : total_allowance,
						total_deduction : total_deduction,
				},
				success : function(data){
					if (data == false) {
						$("#formAdd").modal("hide");
						swal({
							title: 'Failed!',
							text: 'Employee has been added',
							type: 'error',
							confirmButtonClass: "btn btn-danger",
							buttonsStyling: false
						},function(){
							document.getElementsByTagName('html')[0].style.overflow = "auto";
							$("#select_employee").val('');
							$("#salary").val('');
							$("#total_allowance").val('');
							$("#total_deduction").val('');
							$('#row_allowance').html('');
							$('#row_deduction').html('');
							$('#row_tax').html('');
							showEmp();
						});	
					}else{
						$("#formAdd").modal("hide");
						swal({
								title: "Success!",
								text: "Data has been added",
								type: "success",
								icon: 'success',
								buttonsStyling: false,
								confirmButtonClass: "btn btn-success"
						},function(){
							document.getElementsByTagName('html')[0].style.overflow = "auto";
							$("#select_employee").val('');
							$("#salary").val('');
							$("#total_allowance").val('');
							$("#total_deduction").val('');
							$('#row_allowance').html('');
							$('#row_deduction').html('');
							$('#row_tax').html('');
							showEmp();
						});
					}
					// console.log(data);
				},
				error : function(jqXHR, textStatus, errorThrown){
					swal({
						title: 'Failed!',
						text: 'Employee has been added',
						type: 'error',
						confirmButtonClass: "btn btn-danger",
						buttonsStyling: false
					}).catch(swal.noop);
				}
			});
		}
	}

	$('#tambah_cal').on('click',function(){
		var calendar_name = $("#calendar_name").val();
		var calendar_type = $("#calendar_type").val();
		var normal_pay_day = $("#normal_pay_day").val();
		$.ajax({
		url   : "<?php echo base_url(); ?>savePayCal",
		type  : "POST",
		dataType  : "JSON",
		data  : {
			calendar_name : calendar_name,
			calendar_type : calendar_type,
			normal_pay_day : normal_pay_day,
		},
		success : function(data){
			swal({
			title: "Congratulation!",
			text: "Data has been added",
			type: "success",
			icon: 'success',
			buttonsStyling: false,
			confirmButtonClass: "btn btn-success"
		},function(){
				$("#calendar_name").val("");
				$("#calendar_type").val("0");
				$("#normal_pay_day").val("0");
				showEmp();
			});
		},
		error : function(jqXHR, textStatus, errorThrown){
			swal({
				title: 'Failed!',
				text: 'Failed to save data',
				type: 'error',
				confirmButtonClass: "btn btn-danger",
				buttonsStyling: false
			}).catch(swal.noop);
		}
		});
	});
});

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
          window.location.href="<?php echo base_url();?>delDes/"+id;
                /*$.ajax({
                  url : "<?php echo base_url(); ?>delDes",
                        type: "POST",
                        dataType: "JSON",
                        data: {
                          id : id
                        }
                        });

                          swal({
                              title: 'Congratulation',
                              text: 'Data has been deleted',
                              type: 'success',
                              confirmButtonClass: "btn btn-success",
                              buttonsStyling: false
                          });
                          location.reload();*/
          });
          //Prosess Penghapusan data
}

function edtItem(id){
  //alert(id);
  $.ajax({
      url : "<?php echo base_url(); ?>edtDes",
    type: "POST",
    dataType: "JSON",
    data: {
        id : id
    },
    success : function(data){
            $("#formAdd").modal("show");
            $("#formStaffLabel").text("Edit Designation");
            $("form").attr("data-id", data.iddesignation);
            $("form").attr("id",'update');
            $("#designation_title").val(data.designationtitle);
            $("#description").val(data.designationdecs);
            $("#btnok").text("Update Designation");
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

function update_des(id_des){
  //alert('ok');
  var designation_title = $("#designation_title").val();
  var description = $("#description").val();
  if(designation_title == "" || description == "" ){
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
      url : "<?php echo base_url(); ?>uptDes",
            type: "POST",
            dataType: "JSON",
            data: {
                id_des : id_des,
                designation_title : designation_title,
                description : description,
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
