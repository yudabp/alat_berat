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
              <h4 class="page-title">Sparepart</h4>
              <div class="d-flex align-items-center">
                <div class="wrapper mr-4 d-none d-sm-block">
                  <!-- <p class="mb-0">Summary for
                    <b class="mb-0"><i id="bulan"></i> <i id="tahun"></i></b>
                  </p> -->
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12">
              <div class="card px-2">
                <div class="card-body">
                  <div class="card-title row">
                    <div class="col-md-12 text-right">
                      <button class="btn btn-icons btn-inverse-success" id="buttonModal" data-toggle="modal" data-target="#formAdd"><i class="fa fa-plus"></i></button>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-12 table-responsive">
                      <table id="SparePart" class="table">
                        <thead>
                          <tr class="text-center">
                            <th>Sparepart Name</th>
                            <th>Code</th>
                            <th>Type</th>
                            <th>Brand</th>
                            <th>Reg. Date</th>
                            <!-- <th>Status</th> -->
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php foreach ($sparts as $key => $spart) { ?>
                          <tr class="text-center">
                            <td><?php echo $spart->name ?></td>
                            <td><?php echo $spart->code; ?></td>
                            <td><?php echo $spart->type_name; ?></td>
                            <td><?php echo $spart->brand_name;?></td>
                            <td><?php echo $spart->reg_date;?></td>
                            <!-- <td>-</td> -->
                            <td>
                              <button class="btn btn-link" onclick="edtItem('<?php echo $spart->idsparepart; ?>');"><i class="fa fa-pencil"></i></button>
                              <button class="btn btn-link" onclick="delItem('<?php echo $spart->idsparepart; ?>');"><i class="fa fa-trash-o"></i></button>
                            </td>
                          </tr>
                          <?php } ?>
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

        <div class="modal fade" id="formAdd" tabindex="-1" role="dialog" aria-labelledby="formStaffLabel" data-backdrop="static" data-keyboard="false">
          <div class="modal-dialog" role="document" style="margin-top: 15px;margin-bottom: 0">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="formProductLabel">New Sparepart</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form class="saveSPart form" method="post" action="#" id="tambah" enctype="multipart/form-data">
              <div class="modal-body">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="sparepart_name">Sparepart Name</label>
                      <input type="text" name="sparepart_name" id="sparepart_name" class="form-control form-control-lg" placeholder="Sparepart Name">
                    </div>
                  </div>
									<div class="col-md-6">
                    <div class="form-group">
                      <label for="sparepart_code">Sparepart Code</label>
                      <input type="text" name="sparepart_code" id="sparepart_code" class="form-control form-control-lg" placeholder="Sparepart Code">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="type">Type</label>
                      <select name="type" id="type" class="single-select form-control select2" style="width:100%;">
                        <option disabled="" selected="">-- Select Type --</option>
                        <?php foreach ($types as $key => $type) { ?>
                          <option value="<?php echo $type->idtype?>"><?php echo $type->type_name ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="brand">Brand</label>
                      <select name="brand" id="brand" class="single-select form-control select2" style="width:100%;">
                        <option disabled="" selected="">-- Select Brand --</option>
                        <?php foreach ($brands as $key => $brand) { ?>
                          <option value="<?php echo $brand->idbrand?>"><?php echo $brand->brand_name ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="reg_date">Reg. Date</label>
                      <div class="input-group date datepicker">
                        <input type="text" id="reg_date" name="reg_date" class="form-control" >
                        <span class="input-group-addon input-group-append border-left">
                          <span class="mdi mdi-calendar input-group-text"></span>
                        </span>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="unit">Unit</label>
                      <select name="unit" id="unit" class="single-select form-control select2" style="width:100%;">
                        <option disabled="" selected="">-- Select Unit --</option>
                        <?php foreach ($units as $key => $unit) { ?>
                          <option value="<?php echo $unit->idunit?>"><?php echo $unit->unit_name ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                </div>
								<!-- <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="price">Price per Unit</label>
                      <input type="text" name="price" id="price" class="form-control form-control-lg" placeholder="Price per Unit">
                    </div>
                  </div>
                </div> -->
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-success" id="btnspart">Save</button>
                <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
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
  $this->load->view("product/js-crud/crud-sparepart");
?>

<script type="text/javascript">
  	$('#SparePart').DataTable({
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
      if ($(".datepicker").length) {
        $('.datepicker').datepicker({
          enableOnReadonly: true,
          todayHighlight: true,
          autoclose: true,
          format: "dd/mm/yyyy"
        });
      }
      $('.btn-close').click(function() {
          $('html').css('overflow', 'scroll');
          $('body').unbind('touchmove');
      });
      $("#phone_no").inputmask({"mask": "(+62)8##-####-####"});
			$('#price').inputmask({
				alias: 'currency',
				prefix: 'Rp. ',
			});
  	});
</script>
