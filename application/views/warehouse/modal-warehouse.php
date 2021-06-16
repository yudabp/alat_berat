<div id="hidden_gang">
	<input type="hidden" id="idsparepart">
	<input type="hidden" id="idbranch">
</div>
<!-- Modal Add Stock -->
<div class="modal fade" id="addStock" tabindex="-1" role="dialog" aria-labelledby="addStockLabel">
	<div class="modal-dialog" role="document" style="margin-top: 15px;margin-bottom: 0">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="addStockLabel">Add Stock Warehouse 1</h5>
				<button type="button" class="close btn-close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<!-- <?php echo form_open_multipart('add-sparepart',['class'=>'form-sample','id'=>'tambah']); ?> -->
			<form action="#" method="post" enctype="multipart/form-data" class="form-sample" id="add">
				<div class="modal-body">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="date">Date</label>
								<div class="input-group date datepicker">
									<input type="text" id="date" name="date" class="form-control" >
									<span class="input-group-addon input-group-append border-left">
										<span class="mdi mdi-calendar input-group-text"></span>
									</span>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="sparepart">Sparepart</label>
								<input type="text"name="sparepart" id="modal-add" class="form-control" readonly>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="in">Stock In</label>
								<input type="number" name="in" id="in" class="form-control">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="price">Price per Unit</label>
								<input type="text" name="price" id="price" class="form-control">
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-success">Submit</button>
					<button type="button" class="btn btn-light btn-close" data-dismiss="modal">Cancel</button>
				</div>
			</form>
			<!-- <?php echo form_close(); ?> -->
		</div>
	</div>
</div>
<!-- End Modal Add Stock -->

<!-- Modal Request Stock -->
<div class="modal fade" id="requestStock" tabindex="-1" role="dialog" aria-labelledby="requestStockLabel">
	<div class="modal-dialog" role="document" style="margin-top: 15px;margin-bottom: 0">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="requestStockLabel">Request Stock Warehouse 1</h5>
				<button type="button" class="close btn-close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<!-- <?php echo form_open_multipart('request-sparepart',['class'=>'form-sample','id'=>'request']); ?> -->
			<form action="#" method="post" enctype="multipart/form-data" class="form-sample" id="request">
			<div class="modal-body">
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="date">Date</label>
							<div class="input-group date datepicker">
								<input type="text" id="date" name="date" class="form-control" >
								<span class="input-group-addon input-group-append border-left">
									<span class="mdi mdi-calendar input-group-text"></span>
								</span>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="sparepart">Sparepart</label>
							<input type="text"name="sparepart" id="modal-request" class="form-control" readonly>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="request">Request from</label>
							<select name="request" id="request-option" class="single-select form-control" >
								<option selected="selected" disabled="disabled"> - Warehouse - </option>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="request">Stock Request</label>
							<input type="number" name="request" id="request" class="form-control">
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="submit" class="btn btn-success">Submit</button>
				<button type="button" class="btn btn-light btn-close" data-dismiss="modal">Cancel</button>
			</div>
			</form>
			<!-- <?php echo form_close(); ?> -->
		</div>
	</div>
</div>
<!-- End Modal Request Stock -->

<!-- Modal Tranfer Stock -->
<div class="modal fade" id="transferStock" tabindex="-1" role="dialog" aria-labelledby="transferStockLabel">
	<div class="modal-dialog" role="document" style="margin-top: 15px;margin-bottom: 0">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="transferStockLabel">Transfer Stock nya</h5>
				<button type="button" class="close btn-close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="#" method="post" enctype="multipart/form-data" class="form-sample" id="transfer">
				<div class="modal-body">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="date">Date</label>
								<div class="input-group date datepicker">
									<input type="text" id="date" name="date" class="form-control" >
									<span class="input-group-addon input-group-append border-left">
										<span class="mdi mdi-calendar input-group-text"></span>
									</span>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="sparepart">Sparepart</label>
								<input type="text"name="sparepart" id="modal-transfer" class="form-control" readonly>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="transfer">Transfer to</label>
								<select name="transfer-to" id="transfer-option" class="single-select form-control" >
									<option selected="selected" disabled="disabled"> - Warehouse - </option>
								</select>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="transfer">Stock Transfer</label>
								<input type="number" name="stock" id="transfer" class="form-control">
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-success">Submit</button>
					<button type="button" class="btn btn-light btn-close" data-dismiss="modal">Cancel</button>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- End Modal Tranfer Stock -->
