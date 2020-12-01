<?php 
    $this->load->view('template/head');
    $this->load->view('template/topbar');
    $this->load->view('template/sidebar');
?>
<style type="text/css">
  .btn-link{
    /*background: #ECECEC;*/
    width: 10px;
  }
  .fa-trash-o{
    color: #FB0000;
  }
</style>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row mb-4">
            <div class="col-12 d-flex align-items-center justify-content-between">
              <h4 class="page-title">Attendance (HR)</h4>
              <div class="d-flex align-items-center">
                <div class="wrapper mr-4 d-none d-sm-block">
                  <p class="mb-0">Summary for
                    <b class="mb-0"><i id="bulan"></i> <i id="tahun"></i></b>
                  </p>
                </div>
                <!-- <div class="wrapper">
                  <a href="#" class="btn btn-link btn-sm font-weight-bold">
                    <i class="icon-share-alt"></i>Export CSV</a>
                </div> -->
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-body">
                  <h4>GRACE TIME</h4>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="before_check_in">Before Check-in</label>
                        <input type="text" name="before_check_in" id="before_check_in" class="form-control" placeholder="Before Check In">
                        <i><p class="card-description text-danger" style="font-size: 13px; font">(in minute) this time will not counted as overtime</p></i>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="After_check_in">After Check-in</label>
                        <input type="text" name="After_check_in" id="After_check_in" class="form-control" placeholder="After Check In">
                        <i><p class="card-description text-danger" style="font-size: 13px; font">(in minute) this time will not counted as late</p></i>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="before_check_out">Before Check-out</label>
                        <input type="text" name="before_check_out" id="before_check_out" class="form-control" placeholder="Before Check Out">
                        <i><p class="card-description text-danger" style="font-size: 13px; font">(in minute) this time will not counted as early left</p></i>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="After_check_out">After Check-out</label>
                        <input type="text" name="After_check_out" id="After_check_out" class="form-control" placeholder="After Check Out">
                        <i><p class="card-description text-danger" style="font-size: 13px; font">(in minute) this time will not counted as overtime</p></i>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">   
                      <div class="form-check form-check-flat">
                        <label class="form-check-label">
                          <input type="checkbox" class="form-check-input"> Enable self attendance services for employees?
                        </label>
                      </div>
                    </div>
                  </div>
                  <div class="row mb-4">
                    <div class="col-md-12">   
                      <div class="form-check form-check-flat">
                        <label class="form-check-label">
                          <input type="checkbox" class="form-check-input"> Enable shift?
                        </label>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="office_starts">Office Starts</label>
                        <input type="text" name="office_starts" id="office_starts" class="form-control" placeholder="Office Starts">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="office_ends">Office Ends</label>
                        <input type="text" name="office_ends" id="office_ends" class="form-control" placeholder="Office Ends">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <a href="#" class="btn btn-success float-left mt-4">
                    <i class="mdi mdi-content-save mr-1"></i>Save Changes</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

<?php 
  $this->load->view('template/footer');
  // $this->load->view('template/fixed-plugin');
  $this->load->view('template/js');
?>