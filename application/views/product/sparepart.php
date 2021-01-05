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
                            <th>Type</th>
                            <th>Brand</th>
                            <th>Reg. Date</th>
                            <th>Stock</th>
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
                            <td><?php echo $value->vendor_joined; ?></td>
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
                <h5 class="modal-title" id="formProductLabel">New Sparepart</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form class="saveDep form" method="post" action="#" id="tambah" enctype="multipart/form-data">
              <div class="modal-body">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="sparepart_name">Sparepart Name</label>
                      <input type="text" name="sparepart_name" id="sparepart_name" class="form-control form-control-lg" placeholder="Sparepart Name">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="type">Type</label>
                      <input type="text" list="emp" name="type" id="type" class="form-control form-control-lg" placeholder="Type">
                      <!-- <datalist id="emp">
                        <?php foreach ($employe as $emp) { ?>
                        <option value="<?php echo $emp->fname." ".$emp->mname." ".$emp->lname; ?>">
                        <?php } ?>
                      </datalist> -->
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="brand">Brand</label>
                      <input type="text" list="browsers" name="brand" id="brand" class="form-control form-control-lg" placeholder="Brand">
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
                      <label for="stock">Stock</label>
                      <input type="number" name="stock" id="stock" class="form-control form-control-lg" placeholder="Stock">
                      <!-- <select name="stock" id="stock" class="single-select form-control">
                        <option disabled="" selected="">-- Select Status --</option>
                        <option>Available</option>
                        <option>Not Available</option>
                      </select> -->
                    </div>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-success" id="btnok">Add Sparepart</button>
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
    });
</script>