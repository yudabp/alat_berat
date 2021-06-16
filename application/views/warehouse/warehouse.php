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
															<?php foreach($warehouse as $i=>$w): ?>
																<li class="nav-item">
																		<a class="nav-link <?= $i == false ? "active show" : "" ?>" aria-selected="<?= $i == FALSE ? "true" : "false" ?>" id="debasic-tab" data-toggle="tab" href="#<?= $w->branch_id ?>" data-branchid="<?=$w->branch_id?>" role="tab" onclick="currentBranch(this)"><?= $w->branch ?></a>
																</li>
															<?php endforeach; ?>
													</ul>
													<input type="hidden" name="current_branch_id" id="current_branch_id" value="<?= $warehouse[0]->branch_id ?>"  />
													<input type="hidden" name="id_company" id="id_company" value="<?= $this->session->userdata('idcompany') ?>"  />
													<div class="tab-content tab-content-basic">
														<?php foreach($items as $i=>$item): ?>
																<div class="tab-pane fade <?= $i == false ? "active show" : "" ?>" id="<?= $item["branch_id"] ?>" role="tabpanel">
																		<div class="row mb-2">
																				<h2 class="col-sm-9" style="font-size: 18px;">Sparepart <?= $item["name"] ?> </h2>
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
																							<?php foreach($item["sparepart"] as $j=>$sp) : ?>
																								<tr>
																									<td><?= $sp["code"]; ?></td>
																										<td> <?=$sp["stock"];?></td>
																										<td> <?=$sp["price"];?></td>
																										<td>
																											<button class="btn btn-link" data-sparepartname="<?= $sp["name"] ?>" data-branchid="<?= $item["branch_id"] ?>" data-idsparepart="<?=$sp["idsparepart"]?>"  onclick="addStock(this);"><i class="fa fa-plus"></i></button>
																											<button class="btn btn-link" data-sparepartname="<?= $sp["name"] ?>" data-branchid="<?= $item["branch_id"] ?>" data-idsparepart="<?=$sp["idsparepart"]?>"  onclick="requestStock(this);"><i class="fa fa-angle-left"></i></button>
																											<button class="btn btn-link" data-sparepartname="<?= $sp["name"] ?>" data-branchid="<?= $item["branch_id"] ?>" data-idsparepart="<?=$sp["idsparepart"]?>"  onclick="transferStock(this);" <?= $sp["stock"] == 0 ? "disabled" : "" ?>><i class="fa fa-angle-right"></i></button>
																										</td>
																								</tr>
																							<?php endforeach; ?>
																							<!-- <?php foreach($sparepart as $i=>$s) : ?>
																								<tr>
																									<td><?= $s->code; ?></td>
																									<?php foreach ($sparepart_detail as $i=>$sd) :?>
																										<?php if($w->branch_id == $sd->idbranch && $s->idsparepart == $sd->idsparepart): ?>
																											<td> <?=$sd->stock;?></td>
																											<td> <?=$sd->price;?></td>
																											<td>
																												<button class="btn btn-link" data-sparepartname="<?= $s->name ?>" data-branchid="<?= $w->branch_id ?>" data-idsparepart="<?=$s->idsparepart?>" data-idBranchsparepart="<?= $sd->idBranchsparepart ?>" onclick="addStock(this);"><i class="fa fa-plus"></i></button>
																												<button class="btn btn-link" data-sparepartname="<?= $s->name ?>" data-branchid="<?= $w->branch_id ?>" data-idsparepart="<?=$s->idsparepart?>" data-idBranchsparepart="<?= $sd->idBranchsparepart ?>" onclick="requestStock(this);"><i class="fa fa-angle-left"></i></button>
																												<button class="btn btn-link" data-sparepartname="<?= $s->name ?>" data-branchid="<?= $w->branch_id ?>" data-idsparepart="<?=$s->idsparepart?>" data-idBranchsparepart="<?= $sd->idBranchsparepart ?>" onclick="transferStock(this);" <?= $sd->stock == 0 ? "disabled" : "" ?>><i class="fa fa-angle-right"></i></button>
																											</td>
																										<?php endif; ?>
																									<?php endforeach; ?>
																								</tr>
																							<?php endforeach; ?> -->
																						</tbody>
																				</table>
																		</div>
																</div>
														<?php endforeach; ?>
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
			// $('#price').inputmask({
			// 	alias: 'currency',
			// 	prefix: 'IDR. ',
			// });
			
			// form submit
			// $("form").submit(function(e){
			// 	e.preventDefault();
			// 	let atribut = $(this).attr("id");
			// 	if(atribut == "tambah"){
			// 		addStockPart();
			// 	}
			// 	else if(atribut == "request"){
			// 		let id_dep = $(this).data("id");
			// 		reqStockPart();

			// 	}
			// 	else if(atribut == "transfer"){
			// 		let id_dep = $(this).data("id");
			// 		transStockPart(id_dep);
			// 	}
			// });
		});

		// add stock
		$("#add").submit(function(e){
			e.preventDefault()
			let formData = $(this).serializeArray(); 
			let idbranch = $("#idbranch").val()
			let idsparepart = $("#idsparepart").val()
			let idcompany = $("#id_company").val()
			// data = [...]
			let data = {};
			formData.map(d => data[d.name] = d.value)
			data = {...data,idbranch,idsparepart,idcompany, type:"add" }
			$.ajax({
				type: "POST",
				url: "<?=base_url()?>add-sparepart",
				dataType: "json",
				data: data,
				success: function (data) {
					location.reload();
				},
			});
		});

		// transfer stock
		$("#transfer").submit(function(e){
			e.preventDefault()
			let formData = $(this).serializeArray(); 
			let idbranch = $("#idbranch").val()
			let idsparepart = $("#idsparepart").val()
			let idcompany = $("#id_company").val()
			let data = {};
			formData.map(d => data[d.name] = d.value)
			data = {...data,idbranch,idsparepart,idcompany, type:"transfer"}
			console.log(data)
			$.ajax({
				type: "POST",
				url: "<?=base_url()?>transfer-sparepart",
				dataType: "json",
				data: data,
				success: function (data) {
					// location.reload();
					console.log(data)
				},
			});
		});
		
		// request stock
		$("#request").submit(function(e){
			e.preventDefault()
			let formData = $(this).serializeArray(); 
			let idbranch = $("#idbranch").val()
			let idsparepart = $("#idsparepart").val()
			let idcompany = $("#id_company").val()
			let data = {};
			formData.map(d => data[d.name] = d.value)
			data = {...data,idbranch,idsparepart,idcompany, type:"request"}
			console.log(data)
			$.ajax({
				type: "POST",
				url: "<?=base_url()?>request-sparepart",
				dataType: "json",
				data: data,
				success: function (data) {
					location.reload();
				},
			});
		});

		// current branch
		function currentBranch(event){
			$("#current_branch_id").val($(event).data("branchid"))
		}

		// api current branch
		function apiCurrentBranch(id=false){
			$.get({
				url: "<?= base_url();?>branch-comp",
				success: function (data){
					let res = JSON.parse(data).warehouse;
					if(id){
						$(`#${id}`).html("");
						$(`#${id}`).append(`<option selected="selected"> - Warehoxuse - </option>`)
						res.map(d => {
							if(d.branch_id != $("#current_branch_id").val()){
								$(`#${id}`).append(`<option value="${d.branch_id}"> ${d.branch} </option>`)
							}
						})
					}
				},
			})
		}

		// modal event
		function addStock(event){
			$("#addStock").modal("show");
			$("#modal-add").val($(event).data("sparepartname"))

			$("#idbranch").val($(event).data("branchid"))
			$("#idsparepart").val($(event).data("idsparepart"))

			apiCurrentBranch();
		}

		function requestStock(event){
			$("#requestStock").modal("show");
			$("#modal-request").val($(event).data("sparepartname"))

			$("#idBranchsparepart").val($(event).data("idBranchsparepart"))
			$("#idbranch").val($(event).data("branchid"))
			$("#idsparepart").val($(event).data("idsparepart"))

			apiCurrentBranch("request-option")
		}

		function transferStock(event){
			$("#transferStock").modal("show");
			$("#modal-transfer").val($(event).data("sparepartname"))

			$("#idBranchsparepart").val($(event).data("idBranchsparepart"))
			$("#idbranch").val($(event).data("branchid"))
			$("#idsparepart").val($(event).data("idsparepart"))

			apiCurrentBranch("transfer-option")
		}


	</script>
