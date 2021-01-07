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
              <h4 class="page-title">Minning</h4>
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
                            <th>PLat No.</th>
                            <th>Date</th>
                            <!-- <th>Last Service</th> -->
                            <th>Working Hours</th>
                            <th>Price</th>
                            <!-- <th>Status</th> -->
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          
                          <tr class="text-center">
                            <td><span class="btn btn-link" onclick="viewItem('<?php echo $value->idvendors; ?>');"> - </span></td>
                            <td> - </td>
                            <td> - </td>
                            <td> - </td>
                            <td> - </td>
                            <td> - </td>
                            <!-- <td>-</td> -->
                            <td>
                              <button class="btn btn-link" onclick="edtItem('<?php echo $value->idvendors; ?>');"><i class="fa fa-pencil"></i></button>
                              <button class="btn btn-link" onclick="delItem('<?php echo $value->idvendors; ?>');"><i class="fa fa-trash-o"></i></button>
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
        <!-- content-wrapper ends -->

        <div class="modal fade" id="formAdd" tabindex="-1" role="dialog" aria-labelledby="formStaffLabel" data-backdrop="static" data-keyboard="false">
          <div class="modal-dialog" role="document" style="margin-top: 15px;margin-bottom: 0">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="formProductLabel">Minning</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form class="saveDep form" method="post" action="#" id="tambah" enctype="multipart/form-data">
              <div class="modal-body">
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
                      <input type="text" list="browsers" name="operator" id="operator" class="form-control form-control-lg" placeholder="Operator">
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
                      <label for="brand">Brand</label>
                      <input type="text" list="browsers" name="brand" id="brand" class="form-control form-control-lg" placeholder="Brand">
                      <!-- <datalist id="browsers">
                        <?php foreach ($view as $key => $val) { ?>
                        <option value="<?php echo $val->departmenttitle; ?>">
                        <?php } ?>
                      </datalist> -->
                    </div>
                  </div>
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
                </div>
                <div class="row">
                  <!-- <label for="working_hour">Working Hour</label> -->
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="start-working">Working Hour</label>
                      <div class="input-group date" id="start-working" data-target-input="nearest">
                        <div class="input-group" data-target="#start-working" data-toggle="datetimepicker">
                          <input type="text" name="working_start" id="working_start" class="form-control datetimepicker-input" data-target="#start-working" value="" />
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
                          <input type="text" name="working_end" id="working_end" class="form-control datetimepicker-input" data-target="#end-working" value="" />
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
                      <input type="text" name="price" id="price" class="form-control form-control-lg" placeholder="Price per Hour" disabled="">
                    </div>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-success" id="btnok">Add Heavy Equipment</button>
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
?>