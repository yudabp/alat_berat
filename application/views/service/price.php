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
              <h4 class="page-title">Price</h4>
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
                      <table id="heavyEquipment" class="table">
                        <thead>
                          <tr class="text-center">
                            <th>Brand</th>
                            <th>Type</th>
                            <th>Price</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php foreach ($prices as $key => $price) { ?>
                          <tr class="text-center">
                            <td> <?php echo $price->brand_name ?> </td>
                            <td> <?php echo $price->type_name ?> </td>
                            <td> <?php echo $price->price ?> </td>
                            <td>
                              <button class="btn btn-link" onclick="edtItem('<?php echo $price->idprice; ?>');"><i class="fa fa-pencil"></i></button>
                              <button class="btn btn-link" onclick="delItem('<?php echo $price->idprice; ?>');"><i class="fa fa-trash-o"></i></button>
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

        <div class="modal fade" id="formAdd" tabindex="-1" role="dialog" aria-labelledby="formPriceLabel" data-backdrop="static" data-keyboard="false">
          <div class="modal-dialog" role="document" style="margin-top: 15px;margin-bottom: 0">
            <div class="modal-content">
              <div class="modal-header">
<<<<<<< HEAD
                <h5 class="modal-title" id="formProductLabel">Price</h5>
=======
                <h5 class="modal-title" id="formPriceLabel">New Price</h5>
>>>>>>> 5d666575ec68bd1bee15ac29ab8383e2a1e01eb2
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form class="savePrice form" method="post" action="#" id="tambah" enctype="multipart/form-data">
              <div class="modal-body">
                <div class="row">
                  <div class="col-md-12">
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
                  <div class="col-md-12">
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
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="price">Price</label>
                      <input type="text" name="price" id="price" class="form-control form-control-lg" placeholder="Price">
                    </div>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-success" id="btnprice">Add Price</button>
                <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
              </div>
            </form>
            </div>
          </div>
        </div>
        
        <!-- Modal Ends -->
          </div> 
        </div>
        <!-- content-wrapper ends -->

<?php 
  $this->load->view('template/footer');
  // $this->load->view('template/fixed-plugin');
  $this->load->view('template/js');
  $this->load->view("service/js-crud/crud-price");
?>
<script type="text/javascript">
  $(document).ready(function () {
    if ($(".datepicker").length) {
      $('.datepicker').datepicker({
        enableOnReadonly: true,
        todayHighlight: true,
        autoclose: true,
        format: "dd/mm/yyyy"
      });
    }

    $('#delivery-time').datetimepicker({
      format: 'LT'
    });

    $('#heavyEquipment').DataTable({
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

    $('#price').inputmask({
      alias: 'currency',
      prefix: 'Rp. ',
    });
  });
</script>