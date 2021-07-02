<?php 
    $this->load->view('template/head');
    $this->load->view('template/topbar');
    $this->load->view('template/sidebar');
?>
<style type="text/css">
  a:hover{
    text-decoration: none;
  }
	.btn-link:hover{
    text-decoration: none;
  }

	.table > thead > tr > th, .table > tbody > tr > th, .table > tfoot > tr > th, .table > thead > tr > td, .table > tbody > tr > td, .table > tfoot > tr > td {
	padding: 5px !important;
	}
</style>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row mb-4">
            <div class="col-12 d-flex align-items-center justify-content-between">
              <h4 class="page-title">Pay Run</h4>
              <div class="d-flex align-items-center">
                <div class="wrapper mr-4 d-none d-sm-block">
                  <p class="mb-0">Summary for
                    <b class="mb-0"><i id="bulan"></i> <i id="tahun"></i></b>
                  </p>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
						<div class="col-lg-12">
              <div class="card px-2">
                <div class="card-body">
                  <div class="row">
                    <div class="col-12 table-responsive">
                      <table id="tablepay" class="table">
                        <thead>
                          <tr class="text-center">
                            <th>Calendar Name</th>
                            <th>Calendar Type</th>
                            <th>Normal Pay Day</th>
                            <th>Actions</th>
                          </tr>
                        </thead>
                        <tbody>
												<?php
													foreach($payRun as $run) {
												?>
													<tr class="text-center">
														<td><a href="#"><?= $run->calendar_name; ?></a></td>
														<td><?= $run->calendar_type; ?></td>
														<td><?= $run->normal_pay_day; ?></td>
														<td>
															<div class="dropdown">
																<button type="button" class="btn btn-icons btn-rounded text-center" data-toggle="dropdown">
																	<i class="ti-more-alt"></i>
																</button>
																<div class="dropdown-menu">
																	<button data-toggle="tooltip" title="Pay Run" class="btn btn-link" onclick="runItem('<?= $run->id; ?>');"><i class="icon-control-forward"></i></button>
																	<button data-toggle="tooltip" title="Edit" class="btn btn-link" onclick="editItem('<?= $run->id; ?>');"><i class="fa fa-pencil"></i></button>
																	<button data-toggle="tooltip" title="Delete" class="btn btn-link" onclick="delItem('<?= $run->id; ?>');"><i class="fa fa-trash-o"></i></button>
																</div>
															</div>
														</td>
													</tr>
												<?php	
													}
												?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->

				<div class="modal fade" id="viewEmp" tabindex="-1" role="dialog"aria-labelledby="viewEmpLabel" data-backdrop="static" data-keyboard="false">
          <div class="modal-dialog modal-lg" role="document" style="margin-top: 15px;margin-bottom: 0">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="viewEmpLabel">Gaji 1</h5>
                <button type="button" class="close btn-close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
								<table id="tablepay" class="table">
									<thead>
										<tr class="text-center">
											<th>Employee</th>
											<th>Email</th>
											<th>Department</th>
											<th>Designation</th>
											<!-- <th>Actions</th> -->
										</tr>
									</thead>
									<tbody>
										<tr class="text-center">
											<td>Alex</td>
											<td>benialexsandro22@gmail.com</td>
											<td>finance</td>
											<td>-</td>
											<!-- <td>
												<button type="button" class="btn btn-icons btn-rounded text-center" data-toggle="dropdown">
													<i class="fa fa-trash-o"></i>
												</button>
												<div class="dropdown">
													<button type="button" class="btn btn-icons btn-rounded text-center" data-toggle="dropdown">
														<i class="ti-more-alt"></i>
													</button>
													<div class="dropdown-menu">
														<button class="btn btn-link"><i class="fa fa-pencil"></i></button>
														<button class="btn btn-link"><i class="fa fa-trash-o"></i></button>
														<button class="btn btn-icons btn-inverse-primary"><i class="fa  fa-trash-o"></i></button>
													</div>
												</div>
											</td> -->
										</tr>
									</tbody>
								</table>
              </div>
              <div class="modal-footer">
                <!-- <button type="button" class="btn btn-success" onclick="btnAprove()">Aprove</button> -->
                <button type="button" class="btn btn-light btn-close" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
        <!-- Modal Ends -->

				<div class="modal fade" id="payRun" tabindex="-1" role="dialog"aria-labelledby="payRunLabel" data-backdrop="static" data-keyboard="false">
          <div class="modal-dialog modal-lg" role="document" style="margin-top: 15px;margin-bottom: 0">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="payRunLabel">Gaji 1</h5>
                <button type="button" class="close btn-close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
								<table id="tablepayrun" class="table table-responsive-sm">
									<thead>
										<tr class="text-center">
											<th>Employee</th>
											<th>Email</th>
											<th>Department</th>
											<th>Designation</th>
											<th>Basic Pay</th>
											<th>Total Allowance</th>
											<th>Total Deduction</th>
											<!-- <th>Tax</th> -->
											<th>Final Pay</th>
											<!-- <th>Actions</th> -->
										</tr>
									</thead>
									<tbody id="view_run">
										
									</tbody>
								</table>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-success" onclick="btnAprove()">Aprove</button>
                <button type="button" class="btn btn-light btn-close" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
        <!-- Modal Ends -->

<?php 
  $this->load->view('template/footer');
  // $this->load->view('template/fixed-plugin');
  $this->load->view('template/js');
  $this->load->view('payroll/js-crud/crud-pay_run');
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
    });
</script>
