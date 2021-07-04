<script type="text/javascript">
$(document).ready(function () {
	viewItem();
	showBasic();
	showAllowance();
	showDeduction();
	showTax();
	showPayment();

	$('#basic_pay').inputmask({
		alias: 'currency',
		prefix: 'Rp ',
		autoUnmask:true,
    });

	$('#pay_item_payment').inputmask({
		alias: 'currency',
		prefix: 'Rp ',
		autoUnmask:true,
    });

	$('#deduction_payment').inputmask({
		alias: 'currency',
		prefix: 'Rp ',
		autoUnmask:true,
    });

	$('#tax_payment').inputmask({
		alias: 'currency',
		prefix: 'Rp ',
		autoUnmask:true,
    });

	$('.currency').inputmask({
		alias: 'currency',
		prefix: 'Rp ',
    });
	
    function getUrlVars(param=null)
    {
      if(param !== null)
      {
        var vars = [], hash;
        var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
        for(var i = 0; i < hashes.length; i++)
        {
          hash = hashes[i].split('=');
          vars.push(hash[0]);
          vars[hash[0]] = hash[1];
        }
        return vars[param];
      } 
      else 
      {
        return null;
      }
    }

		$('#table-leave').DataTable();
		
		if ($(".datepicker").length) {
			$('.datepicker').datepicker({
				enableOnReadonly: true,
				todayHighlight: true,
				autoclose: true,
				format: "dd/mm/yyyy"
			});
		}

    function viewItem(){
    var id = getUrlVars("id");
      $.ajax({
        url : "<?php echo base_url(); ?>viewEmp",
        type: "POST",
        dataType: "JSON",
        data: {
            id : id
        },
        success : function(view){
                // $("#detailStaff").modal("show");
				//Basic Tab
                $("#first_named").html(view.data.fname);
                $("#middle_named").html(view.data.mname);
                $("#last_named").html(view.data.lname);
                $("#employee_idd").html(view.data.employeid);
                $("#emaild").html(view.data.email);
                $("#employee_typed").html(view.data.employetype);
                $("#employee_statusd").html(view.data.employestatus);
                $("#date_of_hired").html(view.data.datehire);
                $("#departmentd").html(view.data.departmenttitle);
                $("#job_titled").html(view.data.designationtitle);
                $("#locationd").html(view.data.location);
                $("#reporting_tod").html(view.data.departmentlead);
                $("#source_of_hired").html(view.data.sourceofhire);
                $("#payrated").html(view.data.payrate);
                $("#pay_typed").html(view.data.paytype);
                $("#work_phoned").html(view.data.workphone);
                $("#phoned").html(view.data.phone);
                $("#hand_phoned").html(view.data.handphone);
                $("#other_emaild").html(view.data.otheremail);
                $("#date_of_birthd").html(view.data.birth);
                $("#nationalityd").html(view.data.nationality);
                $("#genderd").html(view.data.gender);
                $("#marital_statusd").html(view.data.status);
                $("#driving_licensed").html(view.data.drivinglicense);
                $("#addressd").html(view.data.address);
                $("#cityd").html(view.city.name);
                $("#stated").html(view.provinsi.name);
                $("#zip_coded").html(view.data.zipcode);
                $("#mainid").html(view.data.mainid);

				$("#basic_pay").val(view.data.payrate);
								// var role = view.data.role_id;
								// console.log(view.city);
								//Job
								$("#employee-status").val(view.data.employestatus);
                var cek = view.data.sendnotif;
                var cekimg = view.data.photo;
                if(cekimg !=""){
                  $("#userimg").attr('src','<?php echo base_url(); ?>assets/staffprofil/'+cekimg);
                }
                if(cek == "yes"){
                  $("#notification").attr('checked','checked');
                }

                // alert(data.fname);
        },
        error : function(jqXHR, textStatus, errorThrown){
          swal({
                title: 'Gagal!',
                text: 'Gagal mengambil data.',
                type: 'error',
                confirmButtonClass: "btn btn-danger",
                buttonsStyling: false
            }).catch(swal.noop);
        }
      });
    }

	//SHOW BASIC
	function showBasic(){
		var id = getUrlVars("id");
		$.ajax({
			type : 'POST',
			url : "<?php echo base_url(); ?>hrm/showBasic",
			dataType : 'JSON',
			data : { id : id},
			success : function(data){
				if (data.p_basic != null){
					$("#basic_pay").val(data.p_basic.basic_pay);
					$("#tax_number").val(data.p_basic.tax_number);
					$("#bank_account_number").val(data.p_basic.bank_account_number);
					$("#bank_account_name").val(data.p_basic.bank_account_name);
					$("#bank_name").val(data.p_basic.bank_name);
				}else{
					$("#basic_pay").val(data.p_emplo.payrate);
				}
			}
		});
	}

	$('#btn_basic').on('click',function(){
		var id = getUrlVars("id");
		var basic_pay = $("#basic_pay").val();
		var tax_number = $("#tax_number").val();
		var bank_account_number = $("#bank_account_number").val();
		var bank_account_name = $("#bank_account_name").val();
		var bank_name = $("#bank_name").val();
		$.ajax({
		url   : "<?php echo base_url(); ?>saveBasic",
		type  : "POST",
		dataType  : "JSON",
		data  : {
			id : id,
			basic_pay : basic_pay,
			tax_number : tax_number,
			bank_account_number : bank_account_number,
			bank_account_name : bank_account_name,
			bank_name : bank_name,
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
					showBasic();
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

	//SHOW ALLOWANCE
	function showAllowance(){
		var id = getUrlVars("id");
		$.ajax({
			type : 'POST',
			url : "<?php echo base_url(); ?>hrm/showAllowance",
			dataType : 'JSON',
			data : { id : id},
			success : function(data){
				var html = '';
				var i;
				if (data != ''){
					for(i=0; i<data.length; i++){
						html += '<tr>'+
						'<td style="font-size: 11px;">'+data[i].item+'</td>'+
						'<td class="currency" style="font-size: 11px;">'+data[i].amount+'</td>'+
						'<td style="font-size: 11px;">'+
						'<button class="btn btn-link item_hapus" data="'+data[i].id+'"><i class="fa fa-trash-o"></i></button>'+
						'</td>'+
						'</tr>';
					}
				}else{
					html += '<tr>'+
										'<td colspan="3" style="font-size: 11px; text-align:center;">Data Kosong</td>'+
									'</tr>';
				}
				$('#show_data').html(html);
			}

		});
	}

	//GET HAPUS ALLOWANCE
	$('#show_data').on('click','.item_hapus',function(){
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
									url : "<?php echo base_url(); ?>delAllowance",
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
													showAllowance();
							/*} else {
									swal("Cancelled", "Your data is safe :)", "error");
							}*/
					});
					//Prosess Penghapusan data
	});

	//Simpan Allowance
	$('#btn_allowance').on('click',function(){
		var id = getUrlVars("id");
		var item = $("#pay_item").val();
		var payment = $("#pay_item_payment").val();
		$.ajax({
			url   : "<?php echo base_url(); ?>saveAllowance",
			type  : "POST",
			dataType  : "JSON",
			data  : {
				id : id,
				item : item,
				payment : payment,
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
					$('[name="pay_item"]').val("");
					$('[name="pay_item_payment"]').val("");
					showAllowance();
				});
			},
			error : function(jqXHR, textStatus, errorThrown){
				swal({
						title: 'Failed!',
						text: 'Failed to save data',
						type: 'error',
						confirmButtonClass: "btn btn-danger",
						buttonsStyling: false
					}).catch(swal.noop)
				}
		});
	});

	//SHOW Deduction
	function showDeduction(){
		var id = getUrlVars("id");
		$.ajax({
			type : 'POST',
			url : "<?php echo base_url(); ?>hrm/showDeduction",
			dataType : 'JSON',
			data : { id : id},
			success : function(data){
				var html = '';
				var i;
				if (data != ''){
					for(i=0; i<data.length; i++){
						html += '<tr>'+
						'<td style="font-size: 11px;">'+data[i].item+'</td>'+
						'<td class="currency" style="font-size: 11px;">'+data[i].amount+'</td>'+
						'<td style="font-size: 11px;">'+
						'<button class="btn btn-link item_hapus" data="'+data[i].id+'"><i class="fa fa-trash-o"></i></button>'+
						'</td>'+
						'</tr>';
					}
				}else{
					html += '<tr>'+
										'<td colspan="3" style="font-size: 11px; text-align:center;">Data Kosong</td>'+
									'</tr>';
				}
				$('#show_deduction').html(html);
			}

		});
	}

	//GET HAPUS DEDUCTION
	$('#show_deduction').on('click','.item_hapus',function(){
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
									url : "<?php echo base_url(); ?>hrm/delDeduction",
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
													showDeduction();
							/*} else {
									swal("Cancelled", "Your data is safe :)", "error");
							}*/
					});
					//Prosess Penghapusan data
	});

	//Simpan Deduction
	$('#btn_deduction').on('click',function(){
		var id = getUrlVars("id");
		var item = $("#deduction_item").val();
		var payment = $("#deduction_payment").val();
		$.ajax({
			url   : "<?php echo base_url(); ?>hrm/saveDeduction",
			type  : "POST",
			dataType  : "JSON",
			data  : {
				id : id,
				item : item,
				payment : payment,
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
								$('[name="deduction_item"]').val("");
				$('[name="deduction_payment"]').val("");
								showDeduction();
							});
			},
			error : function(jqXHR, textStatus, errorThrown){
					swal({
								title: 'Failed!',
								text: 'Failed to save data',
								type: 'error',
								confirmButtonClass: "btn btn-danger",
								buttonsStyling: false
						}).catch(swal.noop)
				}
		});
	});

	//SHOW Tax
	function showTax(){
		var id = getUrlVars("id");
		$.ajax({
			type : 'POST',
			url : "<?php echo base_url(); ?>hrm/showTax",
			dataType : 'JSON',
			data : { id : id},
			success : function(data){
				var html = '';
				var i;
				if (data != ''){
					for(i=0; i<data.length; i++){
						html += '<tr>'+
						'<td style="font-size: 11px;">'+data[i].item+'</td>'+
						'<td class="currency" style="font-size: 11px;">'+data[i].amount+'</td>'+
						'<td style="font-size: 11px;">'+
						'<button class="btn btn-link item_hapus" data="'+data[i].id+'"><i class="fa fa-trash-o"></i></button>'+
						'</td>'+
						'</tr>';
					}
				}else{
					html += '<tr>'+
										'<td colspan="3" style="font-size: 11px; text-align:center;">Data Kosong</td>'+
									'</tr>';
				}
				$('#show_tax').html(html);
			}

		});
	}

	//GET HAPUS Tax
	$('#show_tax').on('click','.item_hapus',function(){
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
									url : "<?php echo base_url(); ?>hrm/delTax",
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
													showTax();
							/*} else {
									swal("Cancelled", "Your data is safe :)", "error");
							}*/
					});
					//Prosess Penghapusan data
	});

	//Simpan Tax
	$('#btn_tax').on('click',function(){
		var id = getUrlVars("id");
		var item = $("#tax_item").val();
		var payment = $("#tax_payment").val();
		$.ajax({
			url   : "<?php echo base_url(); ?>hrm/saveTax",
			type  : "POST",
			dataType  : "JSON",
			data  : {
				id : id,
				item : item,
				payment : payment,
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
								$('[name="tax_item"]').val("");
				$('[name="tax_payment"]').val("");
								showTax();
							});
			},
			error : function(jqXHR, textStatus, errorThrown){
					swal({
								title: 'Failed!',
								text: 'Failed to save data',
								type: 'error',
								confirmButtonClass: "btn btn-danger",
								buttonsStyling: false
						}).catch(swal.noop)
				}
		});
	});

	//SHOW BASIC
	function showPayment(){
		var id = getUrlVars("id");
		$.ajax({
			type : 'POST',
			url : "<?php echo base_url(); ?>hrm/showPayment",
			dataType : 'JSON',
			data : { id : id},
			success : function(data){
				$("#payment_method").val(data.payment_method);
			}
		});
	}

	$('#btn_payment').on('click',function(){
		var id = getUrlVars("id");
		var payment_method = $("#payment_method").val();
		$.ajax({
		url   : "<?php echo base_url(); ?>hrm/savePayment",
		type  : "POST",
		dataType  : "JSON",
		data  : {
			id : id,
			payment_method : payment_method,
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
					showPayment();
				});
				},
				error : function(jqXHR, textStatus, errorThrown){
			swal({
					title: 'Failed!',
					text: 'Failed to save data',
					type: 'error',
					confirmButtonClass: "btn btn-danger",
					buttonsStyling: false
				}).catch(swal.noop)
			}
		});
	});
});
</script>
