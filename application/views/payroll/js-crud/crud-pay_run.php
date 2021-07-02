<script>
$(document).ready(function() {
	
});

function delItem(id) {
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
			url : "<?php echo base_url(); ?>payroll/delPayCal",
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
			location.reload();
			/*} else {
					swal("Cancelled", "Your data is safe :)", "error");
			}*/
	});
}

function runItem(id) {
	$.ajax({
		url: "<?php echo base_url(); ?>payroll/viewRun",
		type: "POST",
		dataType: "json",
		data: {
			id: id,
		},
		success: function(data) {
			var html = '';
			var title = '';
			var i;
			var total = 0;
			if (data != ''){
				for(i=0; i<data.length; i++){
					total = total + parseInt(data[i].payrate) + parseInt(data[i].total_allowance) - parseInt(data[i].total_deduction);
					var hasil = total.toLocaleString('id-ID', { style: 'currency', currency: 'IDR' });
					// console.log(hasil);
					title += data[i].calendar_name;
					html += '<tr class="text-center">'+
								'<td>'+data[i].fname+' '+data[i].mname+' '+data[i].lname+'</td>'+
								'<td>'+data[i].email+'</td>'+
								'<td>'+data[i].departmenttitle+'</td>'+
								'<td>'+data[i].designationtitle+'</td>'+
								'<td>'+data[i].payrate+'</td>'+
								'<td>'+data[i].total_allowance+'</td>'+
								'<td>'+data[i].total_deduction+'</td>'+
								'<td>'+hasil+'</td>'+
							'</tr>';
							// console.log('data[i].payrate'.toLocaleString('id-ID', { style: 'currency', currency: 'IDR' }));
				}
			}else{
				html += '<tr class="text-center">'+
							'<td colspan="8">Data Kosong</td>'+
						'</tr>';
			}
			// var number = 123456789.00;
			// console.log(number.toLocaleString('id-ID', { style: 'currency', currency: 'IDR' }));
			$("#payRun").modal("show");
			$('#payRunLabel').html(title);
			$('#view_run').html(html);
		}
	});
}

function btnAprove() {
	swal({
		title: 'Success!',
		text: 'Payrun has been aproved',
		type: 'success',
		confirmButtonClass: "btn btn-success",
		buttonsStyling: false
	});
	$("#payRun").modal("hide");
}
</script>
