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
              <h4 class="page-title">Product</h4>
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
                      <table id="alatBerat" class="table">
                        <thead>
                          <tr class="text-center">
                            <th>Product Name</th>
                            <th>Category</th>
                            <th>Manufacture</th>
                            <th>Stock</th>
                            <!-- <th>Joined</th> -->
                            <!-- <th>Status</th> -->
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php foreach ($views as $key => $value) { ?>
                          <tr class="text-center">
                            <td><span class="btn btn-link" onclick="viewItem('<?php echo $value->idvendors; ?>');"><?php echo $value->vendor_first_name." ".$value->vendor_last_name; ?></span></td>
                            <td><?php echo $value->vendor_company; ?></td>
                            <td><?php echo $value->vendor_email;?></td>
                            <td><?php echo $value->vendor_phone;?></td>
                            <!-- <td><?php echo $value->vendor_joined; ?></td> -->
                            <!-- <td>-</td> -->
                            <td>
                              <button class="btn btn-link" onclick="edtItem('<?php echo $value->idvendors; ?>');"><i class="fa fa-pencil"></i></button>
                              <button class="btn btn-link" onclick="delItem('<?php echo $value->idvendors; ?>');"><i class="fa fa-trash-o"></i></button>
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
                <h5 class="modal-title" id="formProductLabel">New Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form class="saveDep form" method="post" action="#" id="tambah" enctype="multipart/form-data">
              <div class="modal-body">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="product_name">Product Name</label>
                      <input type="text" name="product_name" id="product_name" class="form-control form-control-lg" placeholder="Product Name">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="category">Category</label>
                      <input type="text" list="emp" name="category" id="category" class="form-control form-control-lg" placeholder="Category">
                      <!-- <datalist id="emp">
                        <?php foreach ($employe as $emp) { ?>
                        <option value="<?php echo $emp->fname." ".$emp->mname." ".$emp->lname; ?>">
                        <?php } ?>
                      </datalist> -->
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="manufacture">Manufacture</label>
                      <input type="text" list="browsers" name="manufacture" id="manufacture" class="form-control form-control-lg" placeholder="Manufacture">
                      <!-- <datalist id="browsers">
                        <?php foreach ($view as $key => $val) { ?>
                        <option value="<?php echo $val->departmenttitle; ?>">
                        <?php } ?>
                      </datalist> -->
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="chassis_no">Chassis Number</label>
                      <input type="text" list="emp" name="chassis_no" id="chassis_no" class="form-control form-control-lg" placeholder="Chassis Number">
                      <!-- <datalist id="emp">
                        <?php foreach ($employe as $emp) { ?>
                        <option value="<?php echo $emp->fname." ".$emp->mname." ".$emp->lname; ?>">
                        <?php } ?>
                      </datalist> -->
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="vehicle_id">Vehicle ID</label>
                      <input type="text" list="browsers" name="vehicle_id" id="vehicle_id" class="form-control form-control-lg" placeholder="Vehicle ID">
                      <!-- <datalist id="browsers">
                        <?php foreach ($view as $key => $val) { ?>
                        <option value="<?php echo $val->departmenttitle; ?>">
                        <?php } ?>
                      </datalist> -->
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="stock">Stock Status</label>
                      <!-- <input type="text" name="product_name" id="product_name" class="form-control form-control-lg" placeholder="Product Name"> -->
                      <select name="stock" id="stock" class="single-select form-control">
                        <option disabled="" selected="">-- Select Status --</option>
                        <option>Available</option>
                        <option>Not Available</option>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-success" id="btnok">Add Product</button>
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
?>

<script type="text/javascript">
  $('#alatBerat').DataTable({
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
          $('html').css('overflow', 'scroll');
          $('body').unbind('touchmove');
      });
      $("#phone_no").inputmask({"mask": "(+62)8##-####-####"});
    });
</script>