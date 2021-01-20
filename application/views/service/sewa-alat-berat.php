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
              <h4 class="page-title">Heavy Equipment</h4>
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
                            <th>Heavy Equipment</th>
                            <th>Date</th>
                            <th>Type</th>
                            <th>Brand</th>
                            <!-- <th>Reg. Date</th> -->
                            <!-- <th>Last Service</th> -->
                            <th>Working Hours</th>
                            <th>Price</th>
                            <!-- <th>Status</th> -->
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          foreach($heqs as $key=>$heq){
                          ?>
                          <tr class="text-center">
                            <td><?php echo $heq->description ?></td>
                            <td><?php echo $heq->date ?></td>
                            <td><?php echo $heq->type_name ?></td>
                            <td><?php echo $heq->brand_name ?></td>
                            <td><?php echo $heq->total_hour ?></td>
                            <td>Rp. <?php echo number_format($heq->total_price,2,'.',',') ?></td>
                            <!-- <td> - </td> -->
                            <!-- <td>-</td> -->
                            <td>
                              <button class="btn btn-link" onclick="edtItem('<?php echo $heq->idshequipment; ?>');"><i class="fa fa-pencil"></i></button>
                              <button class="btn btn-link" onclick="delItem('<?php echo $heq->idshequipment; ?>');"><i class="fa fa-trash-o"></i></button>
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

        <div class="modal fade" id="formAdd" tabindex="-1" role="dialog" aria-labelledby="formHEqLabel" data-backdrop="static" data-keyboard="false">
          <div class="modal-dialog" role="document" style="margin-top: 15px;margin-bottom: 0">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="formHEqLabel">Heavy Equipment</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form class="saveServiceHEQ form" method="post" action="#" id="tambah" enctype="multipart/form-data">
              <div class="modal-body">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="description">Heavy Equipment</label>
                      <select name="h_equipment" id="h_equipment" class="single-select form-control select2" style="width:100%;">
                        <option disabled="" selected="">-- Select Heavy Equipment --</option>
                        <?php foreach ($prod_heqs as $key => $prod_heq) { ?>
                          <option value="<?php echo $prod_heq->idhequipment?>"><?php echo $prod_heq->description ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="date">Date</label>
                      <div class="input-group date datepicker">
                        <input type="text" id="date" name="date" class="form-control form-control-lg" >
                        <span class="input-group-addon input-group-append border-left">
                          <span class="mdi mdi-calendar input-group-text"></span>
                        </span>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="operator">Operator</label>
                      <select name="operator" id="operator" class="single-select form-control select2" style="width:100%;">
                        <option disabled="" selected="">-- Select Operator --</option>
                        <?php foreach ($operators as $key => $operator) { ?>
                          <option value="<?php echo $operator->mainid?>"><?php echo "{$operator->fname} {$operator->mname} {$operator->lname}" ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="brand">Brand</label>
                      <select name="brand" id="brand" class="single-select form-control select2" style="width:100%;">
                        <option disabled="" selected="" value="">-- Select Brand --</option>
                        <?php foreach ($brands as $key => $brand) { ?>
                          <option value="<?php echo $brand->idbrand?>"><?php echo $brand->brand_name ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="type">Type</label>
                      <select name="type" id="type" class="single-select form-control select2" style="width:100%;">
                        <option disabled="" selected="" value="">-- Select Type --</option>
                        <?php foreach ($types as $key => $type) { ?>
                          <option value="<?php echo $type->idtype?>"><?php echo $type->type_name ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <!-- <label for="working_hour">Working Hour</label> -->
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="start-working">Working Hour</label>
                      <div class="input-group date" id="start-working" data-target-input="nearest">
                        <div class="input-group" data-target="#start-working" data-toggle="datetimepicker">
                          <input type="text" name="work_start" id="work_start" class="form-control datetimepicker-input" data-target="#start-working" value="" />
                          <div class="input-group-addon input-group-append">
                            <i class="mdi mdi-clock input-group-text"></i>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="end-working"></label>
                      <div class="input-group date" id="end-working" data-target-input="nearest">
                        <div class="input-group" data-target="#end-working" data-toggle="datetimepicker">
                          <input type="text" name="work_end" id="work_end" class="form-control datetimepicker-input" data-target="#end-working" value="" />
                          <div class="input-group-addon input-group-append">
                            <i class="mdi mdi-clock input-group-text"></i>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="price">Price per Hour</label>
                      <input type="text" name="price" id="price" class="form-control form-control-lg" placeholder="-" disabled="" style="font-size:24px;color:#44cc22;background:transparent;border:none;font-weight: bold;">
                    </div>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-success" id="btnheq">Add Heavy Equipment</button>
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
  $this->load->view("service/js-crud/crud-h-equipment");
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

    $('#start-working').datetimepicker({
      format: 'LT'
    });

    $('#end-working').datetimepicker({
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