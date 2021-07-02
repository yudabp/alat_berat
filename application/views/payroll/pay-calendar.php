<?php 
    $this->load->view('template/head');
    $this->load->view('template/topbar');
    $this->load->view('template/sidebar');
?>
<style type="text/css">
</style>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row mb-4">
            <div class="col-12 d-flex align-items-center justify-content-between">
              <h4 class="page-title">Pay Calendar</h4>
              <div class="d-flex align-items-center">
                <div class="wrapper mr-4 d-none d-sm-block">
                  <!-- <p class="mb-0">Summary for
                    <b class="mb-0"><i id="bulan"></i> <i id="tahun"></i></b>
                  </p> -->
                </div>
                <!-- <div class="wrapper">
                  <a href="#" class="btn btn-link btn-sm font-weight-bold">
                    <i class="icon-share-alt"></i>Export CSV</a>
                </div> -->
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12">
              <div class="card px-2">
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="calendar_name">Calendar Name</label>
                        <input type="text" name="calendar_name" id="calendar_name" class="form-control" placeholder="Calendar Name">
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label for="calendar_type">Calendar Type</label>
                        <select class="form-control" id="calendar_type" name="calendar_type">
                          <option selected="selected" disabled="disabled" value="0"> - Select Calendar Type - </option>
                          <option>Weekly</option>
                          <option>Biweekly</option>
                          <option>Monthly</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label for="normal_pay_day">Normal Pay Day</label>
                        <select class="form-control" id="normal_pay_day" name="normal_pay_day">
                          <option selected="selected" disabled="disabled" value="0"> - Select Normal Pay Day - </option>
                          <option>Sunday</option>
                          <option>Monday</option>
                          <option>Tuesday</option>
                          <option>Wednesday</option>
                          <option>Thursday</option>
                          <option>Friday</option>
                          <option>Saturday</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="card-title row">
                    <h4 class="col-md-6">Pay Calendar Setup</h4>
                    <div class="col-md-6 text-right">
                      <button class="btn btn-icons btn-inverse-success" id="buttonModal" data-toggle="modal" data-target="#formAdd"><i class="fa fa-plus"></i></button>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-12 table-responsive">
                      <table id="tablepay" class="table">
                        <thead>
                          <tr class="text-center">
                            <th>Employee</th>
                            <th>Email</th>
                            <th>Department</th>
                            <th>Designation</th>
                            <!-- <th>Basic Pay Rate</th> -->
                            <th>Actions</th>
                          </tr>
                        </thead>
                        <tbody id="show_emp">
                          <!-- <tr class="text-center">
                            <td>Alex</td>
                            <td>benialexsandro22@gmail.com</td>
                            <td>finance</td>
                            <td>-</td>
                            <td>
															<button type="button" class="btn btn-icons btn-rounded text-center" data-toggle="dropdown">
																<i class="fa fa-trash-o"></i>
															</button>
                            </td>
                          </tr> -->
                        </tbody>
                      </table>
                    </div>
                  </div>
                  <div class="row">
                    <button class="btn btn-success float-right mt-4" id="tambah_cal">
                    <i class="mdi mdi-pencil mr-1"></i>Create Pay Calendar</bu>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- content-wrapper ends -->
        <div class="modal fade" id="formAdd" tabindex="-1" role="dialog"aria-labelledby="formStaffLabel" data-backdrop="static" data-keyboard="false">
          <div class="modal-dialog modal-lg" role="document" style="margin-top: 15px;margin-bottom: 0">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="formStaffLabel">Add Employee</h5>
                <button type="button" class="close btn-close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
							<form action="#" id="tambah">
              <div class="modal-body">
                <div class="row">
                  <div class="col-md-6">
										<div class="form-group">
                      <label for="select_employee">Employee</label>
                      <select name="select_employee" id="select_employee" data-default="0" class="single-select form-control select2" style="width:100%;">
                        <option value="0" disabled="" selected="selected">-- Select Employee --</option>
                        <?php foreach ($emp as $key => $em) { ?>
                          <option value="<?php echo $em->mainid ?>"><?php echo $em->fname." ".$em->mname." ".$em->lname ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-6">
										<div class="form-group">
                      <label for="salary">Salary</label>
                      <input type="text" id="salary" name="salary" class="form-control">
                    </div>
                  </div>
                </div>
								<div class="row">
									<div class="col-md-6">
										<br>
										<h4>Allowance</h4>
										<hr>
										<table id="row_allowance" style="width:100%">
											<!-- <div class="form-group row">
												<label for="allowance" class="col-sm-4 col-form-label">Bonus</label>
												<div class="col-sm-8">
													<input type="text" class="form-control currency" id="allowance" name="allowance" value="200000">
												</div>
											</div> -->
										</table>
										<div class="form-group row">
											<label for="total_allowance" class="col-sm-4 col-form-label text-danger">Total Allowance</label>
											<div class="col-sm-8">
												<input type="text" class="form-control currency" id="total_allowance" name="total_allowance">
											</div>
										</div>
									</div>
									<div class="col-md-6">
									<br>
										<h4>Deduction</h4>
										<hr>
										<table id="row_deduction" style="width:100%">
											<!-- <div class="form-group row">
												<label for="deduction" class="col-sm-4 col-form-label">Absent</label>
												<div class="col-sm-8">
													<input type="text" class="form-control currency" id="deduction" name="deduction" value="200000">
												</div>
											</div> -->
										</table>
										<table id="row_tax" style="width:100%">
												
										</table>
										<div class="form-group row">
											<label for="total_deduction" class="col-sm-4 col-form-label text-danger">Total Deduction</label>
											<div class="col-sm-8">
												<input type="text" class="form-control currency" id="total_deduction" name="total_deduction">
											</div>
										</div>
									</div>
								</div>
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-success">Add Employee To List</button>
                <button type="button" class="btn btn-light btn-close" data-dismiss="modal">Cancel</button>
              </div>
							</form>
            </div>
          </div>
        </div>
        <!-- Modal Ends -->
<?php 
  $this->load->view('template/footer');
  // $this->load->view('template/fixed-plugin');
  $this->load->view('template/js');
  $this->load->view('payroll/js-crud/crud-pay_calendar');
?>
<script type="text/javascript">
  $('#tablepay').DataTable({
      "aLengthMenu": [
        [5, 10, 15, -1],
        [5, 10, 15, "All"]
      ],
      "iDisplayLength": 10,
      "language": {
        search: ""
      },
      // "bSort" : false,
      // "dom": 'Bfrtip',
      // "buttons": [
      //   'copy', 'csv', 'excel', 'pdf', 'print'
      // ]
    });
  $(document).ready(function() {
      $('#buttonModal').click(function() {
          $('html').css('overflow', 'hidden');
          $('body').bind('touchmove', function(e) {
              e.preventDefault()
          });
      });
      $('.btn-close').click(function() {
          $('html').css('overflow', 'auto');
          $('body').unbind('touchmove');
      });
			$('#salary').inputmask({
				alias: 'currency',
				prefix: 'Rp ',
				autoUnmask:true,
			});
			// $('.money').toLocaleString('id-ID', { style: 'currency', currency: 'IDR' });
			$('.currency').inputmask({
				alias: 'currency',
				prefix: 'Rp ',
				autoUnmask:true,
			});

			// function showSelEmp() {
			// 	$.ajax({
			// 		url: '<?php echo base_url()?>payroll/showSelEmp',
			// 		type: 'POST',
			// 		dataType: 'json',
			// 		data: {id : this.value},
			// 		success: function(data){

			// 		}
			// }

			$('#select_employee').change(function() {
				$.ajax({
					url: '<?php echo base_url()?>payroll/getPayrate',
					type: 'POST',
					dataType: 'json',
					data: {id : this.value},
					success: function(data){
						$('#salary').val(data.payrate.payrate);
						var allow = '';
						var t_allow = 0;
						var dedu = '';
						var t_dedu = 0;
						var tax = '';
						var t_tax = 0;
						var i;
							for(i=0; i<data.allowance.length; i++){
								allow += '<tr class="row">'+
													'<td class="col-sm-4 col-form-label"><label for="allowance'+i+'">'+data.allowance[i].item+'</label></td>'+
													'<td class="col-sm-8"><input type="text" class="form-control currency" id="allowance'+i+'" name="allowance'+i+'" value="'+data.allowance[i].amount+'" disabled></td>'+
													'<input type="hidden" name="id_allowance'+i+'" id="id_allowance'+i+'" value="'+data.allowance[i].id+'">'+
												'</tr>';
								t_allow = t_allow + parseInt(data.allowance[i].amount);
							}
							for(i=0; i<data.deduction.length; i++){
								dedu += '<tr class="row">'+
													'<td class="col-sm-4 col-form-label"><label for="deduction'+i+'">'+data.deduction[i].item+'</label></td>'+
													'<td class="col-sm-8"><input type="text" class="form-control currency" id="deduction'+i+'" name="deduction'+i+'" value="'+data.deduction[i].amount+'" disabled></td>'+
													'<input type="hidden" name="id_deduction'+i+'" id="id_deduction'+i+'" value="'+data.deduction[i].id+'">'+
												'</tr>';
								t_dedu = t_dedu + parseInt(data.deduction[i].amount);
							}
							for(i=0; i<data.tax.length; i++){
								tax += '<tr class="row">'+
													'<td class="col-sm-4 col-form-label"><label for="tax'+i+'">'+data.tax[i].item+'</label></td>'+
													'<td class="col-sm-8"><input type="text" class="form-control currency" id="tax'+i+'" name="tax'+i+'" value="'+data.tax[i].amount+'" disabled></td>'+
													'<input type="hidden" name="id_tax'+i+'" id="id_tax'+i+'" value="'+data.tax[i].id+'">'+
												'</tr>';
								t_tax = t_tax + parseInt(data.tax[i].amount);
							}
							// console.log(t_allow);
						$('#total_allowance').val(t_allow);
						$('#total_deduction').val(t_dedu + t_tax);
						$('#row_allowance').html(allow);
						$('#row_deduction').html(dedu);
						$('#row_tax').html(tax);
					}
				});
			});
    });
</script>
