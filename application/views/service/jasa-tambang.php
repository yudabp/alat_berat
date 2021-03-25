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
              <h4 class="page-title">Truck</h4>
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
                            <th>Delivery Order No.</th>
                            <th>Client</th>
                            <th>Truck Name</th>
                            <th>Date</th>
                            <!-- <th>Last Service</th> -->
                            <th>Quary</th>
                            <th>Total Trips</th>
                            <!-- <th>Status</th> -->
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php 
                          foreach($minings as $key=>$mining){
                          ?>
                          <tr class="text-center">
                            <td><?= $mining->delivery_no ?></td>
                            <td><?= $mining->first_name." ".$mining->last_name; ?></td>
                            <td><?= $mining->plat_no ?></td>
                            <td><?= $mining->delivery_date ?></td>
                            <td><?= $mining->working_hour ?></td>
                            <td><?= $mining->exact_tonage ?></td>
                            <!-- <td>-</td> -->
                            <td>
                              <button class="btn btn-link" onclick="edtItem('<?= $mining->idmining; ?>');"><i class="fa fa-pencil"></i></button>
                              <button class="btn btn-link" onclick="delItem('<?= $mining->idmining; ?>');"><i class="fa fa-trash-o"></i></button>
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

        <div class="modal fade" id="formAdd" tabindex="-1" role="dialog" aria-labelledby="formMiningLabel" data-backdrop="static" data-keyboard="false">
          <div class="modal-dialog" role="document" style="margin-top: 15px;margin-bottom: 0">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="formMiningLabel">Truck</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form class="saveMining form" method="post" action="#" id="tambah" enctype="multipart/form-data">
              <div class="modal-body">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="client">Client</label>
                      <select name="client" id="client" class="single-select form-control select2" style="width:100%;">
                        <option disabled="" selected="">-- Select Mining --</option>
                        <?php foreach ($clients as $key => $client) { ?>
                          <option value="<?php echo $client->idcontacts ?>"><?php echo "{$client->first_name} {$client->last_name}" ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="delivery_no">Delivery Order No.</label>
                      <input type="text" name="delivery_no" id="delivery_no" class="form-control form-control-lg" placeholder="Delivery Order No.">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="plat_no">Plat No.</label>
                      <select name="plat_no" id="plat_no" class="single-select form-control select2" style="width:100%;">
                        <option disabled="" selected="">-- Select Operator --</option>
                        <?php foreach ($trucks as $key => $truck) { ?>
                          <option value="<?php echo $truck->idtruck?>"><?php echo $truck->plat_no ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="delivery_date">Delivery Date</label>
                      <div class="input-group date datepicker">
                        <input type="text" id="delivery_date" name="delivery_date" class="form-control form-control-lg" >
                        <span class="input-group-addon input-group-append border-left">
                          <span class="mdi mdi-calendar input-group-text"></span>
                        </span>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="total_trip">Total Trip</label>
                      <input type="number" name="total_trip" id="total_trip" class="form-control form-control-lg" placeholder="Total Trip">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="est_tonage">Tonage Estimation</label>
                      <input type="text" name="est_tonage" id="est_tonage" class="form-control form-control-lg" placeholder="Tonage Estimation">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="exact_tonage">Quary</label>
                      <select name="plat_no" id="plat_no" class="single-select form-control select2" style="width:100%;">
                        <option disabled="" selected="">-- Select Quary --</option>
                        <option value="quary_1">Quary 1</option>
                        <option value="quary_2">Quary 2</option>
                        <option value="plant_service">Plant Service</option>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-success" id="btnmining">Save</button>
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
  $this->load->view("service/js-crud/crud-mining");
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

    $('#working-hour').datetimepicker({
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
  });
</script>
