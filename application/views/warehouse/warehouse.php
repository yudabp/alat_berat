	<?php
			$this->load->view('template/head');
			$this->load->view('template/topbar');
			$this->load->view('template/sidebar');
	?>
	<style type="text/css">
		a:hover{
			text-decoration: none;
		}
	</style>
				<!-- partial -->
				<div class="main-panel">
					
					<div class="content-wrapper">
						<div class="row mb-4">
							<div class="col-12 d-flex align-items-center justify-content-between">
								<h4 class="page-title">Warehouse</h4>
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
							<div class="col-md-12">
									<div class="card">
											<div class="card-body">
													<ul class="nav nav-tabs tab-basic" role="tablist">
															<li class="nav-item">
																	<a class="nav-link active" id="debasic-tab" data-toggle="tab" href="#dewh1" role="tab">Warehouse 1</a>
															</li>
															<li class="nav-item">
																	<a class="nav-link" id="dework-tab" data-toggle="tab" href="#dewh2" role="tab">Warehouse 2</a>
															</li>
															<li class="nav-item">
																	<a class="nav-link" id="depersonal-tab" data-toggle="tab" href="#dewh3" role="tab">Warehouse 3</a>
															</li>
													</ul>
													<div class="tab-content tab-content-basic">
															<div class="tab-pane fade show active" id="dewh1" role="tabpanel">
																	<div class="row mb-2">
																			<h2 class="col-sm-9" style="font-size: 18px;">Sparepart Warehouse 1</h2>
																	</div>
																	<div class="table-responsive mb-5">
																			<table class="table table-bordered">
																					<thead>
																							<tr>
																									<th>
																											Sparepart Code
																									</th>
																									<th>
																											Stock
																									</th>
																									<th>
																											Price
																									</th>
																									<th>
																											Action
																									</th>
																							</tr>
																					</thead>
																					<tbody>
																						<tr>
																							<td>SP0007</td>
																							<td>31</td>
																							<td>IDR. 400.00</td>
																							<td>
																								<button class="btn btn-link" onclick="addStock();"><i class="fa fa-plus"></i></button>
																								<button class="btn btn-link" onclick="requestStock();"><i class="fa fa-angle-left"></i></button>
																								<button class="btn btn-link" onclick="transferStock();"><i class="fa fa-angle-right"></i></button>
																							</td>
																						</tr>
																					</tbody>
																			</table>
																	</div>
															</div>
															<div class="tab-pane fade" id="dewh2" role="tabpanel">
																	<div class="row mb-2">
																			<h2 class="col-sm-9" style="font-size: 18px;">Sparepart Warehouse 2</h2>
																	</div>
																	<div class="table-responsive mb-5">
																			<table class="table table-bordered">
																					<thead>
																							<tr>
																									<th>
																											Sparepart Code
																									</th>
																									<th>
																											Stock
																									</th>
																									<th>
																											Price
																									</th>
																									<th>
																											Action
																									</th>
																							</tr>
																					</thead>
																					<tbody>
																					<tr>
																							<td>SP0007</td>
																							<td>31</td>
																							<td>IDR. 400.00</td>
																							<td>
																								<button class="btn btn-link" onclick="addStock();"><i class="fa fa-plus"></i></button>
																								<button class="btn btn-link" onclick="requestStock();"><i class="fa fa-angle-left"></i></button>
																								<button class="btn btn-link" onclick="transferStock();"><i class="fa fa-angle-right"></i></button>
																							</td>
																						</tr>
																					</tbody>
																			</table>
																	</div>
															</div>
															<div class="tab-pane fade" id="dewh3" role="tabpanel">
																	<div class="row mb-2">
																			<h2 class="col-sm-9" style="font-size: 18px;">Sparepart Warehouse 3</h2>
																	</div>
																	<div class="table-responsive mb-5">
																			<table class="table table-bordered">
																					<thead>
																							<tr>
																									<th>
																											Sparepart Code
																									</th>
																									<th>
																											Stock
																									</th>
																									<th>
																											Price
																									</th>
																									<th>
																											Action
																									</th>
																							</tr>
																					</thead>
																					<tbody>
																					<tr>
																							<td>SP0007</td>
																							<td>31</td>
																							<td>IDR. 400.00</td>
																							<td>
																								<button class="btn btn-link" onclick="addStock();"><i class="fa fa-plus"></i></button>
																								<button class="btn btn-link" onclick="requestStock();"><i class="fa fa-angle-left"></i></button>
																								<button class="btn btn-link" onclick="transferStock();"><i class="fa fa-angle-right"></i></button>
																							</td>
																						</tr>
																					</tbody>
																			</table>
																	</div>
															</div>
													</div>
											</div>
									</div>
							</div>
						</div>
					</div>
					<!-- content-wrapper ends -->

					<!-- Modal -->
					<?php 
						$this->load->view('warehouse/modal-warehouse');
					?>
					<!-- End Modal -->
	<?php
		$this->load->view('template/footer');
		// $this->load->view('template/fixed-plugin');
		$this->load->view('template/js');
	?>
	<script type="text/javascript">
		
		$(document).ready(function() {
			$('#buttonModal').click(function() {
					$('html').css('overflow', 'hidden');
					$('body').bind('touchmove', function(e) {
							e.preventDefault()
					});
			});
			$('.btn-close').click(function() {
					$('html').css('overflow', 'scroll');
					$('body').unbind('touchmove');
			});

			$('.datepicker').datepicker({
					enableOnReadonly: true,
					todayHighlight: true,
					autoclose: true,
					format: "dd/mm/yyyy"
			});
			$("#phone_no").inputmask({"mask": "(+62)8##-####-####"});
			$('#price').inputmask({
				alias: 'currency',
				prefix: 'IDR. ',
			});
		});

		function addStock(){
			$("#addStock").modal("show");
		}

		function requestStock(){
			$("#requestStock").modal("show");
		}

		function transferStock(){
			$("#transferStock").modal("show");
		}
	</script>
