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
              <h4 class="page-title">Work Days (HR)</h4>
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
          <form class="form" method="post" action="<?php echo base_url(); ?>uptWork" id="tambah" enctype="multipart/form-data">
          <div class="row">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="row">
                        <label class="col-sm-3 col-form-label">Monday</label>
                        <div class="col-sm-9">
                          <div class="form-group">
                          <select class="form-control" id="monday" name="monday">
                            <option selected="selected" disabled="disabled"> - Select - </option>
                            <option value="full">Full Day</option>
                            <option value="half">Half Day</option>
                            <option value="non">Not-Working Day</option>
                          </select>
                        </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="row">
                        <label class="col-sm-3 col-form-label">Tuesday</label>
                        <div class="col-sm-9">
                          <div class="form-group">
                          <select class="form-control" id="tuesday" name="tuesday">
                            <option selected="selected" disabled="disabled"> - Select - </option>
                            <option value="full">Full Day</option>
                            <option value="half">Half Day</option>
                            <option value="non">Not-Working Day</option>
                          </select>
                        </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="row">
                        <label class="col-sm-3 col-form-label">Wednesday</label>
                        <div class="col-sm-9">
                          <div class="form-group">
                          <select class="form-control" id="wednesday" name="wednesday">
                            <option selected="selected" disabled="disabled"> - Select - </option>
                            <option value="full">Full Day</option>
                            <option value="half">Half Day</option>
                            <option value="non">Not-Working Day</option>
                          </select>
                        </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="row">
                        <label class="col-sm-3 col-form-label">Thursday</label>
                        <div class="col-sm-9">
                          <div class="form-group">
                          <select class="form-control" id="thursday" name="thursday">
                            <option selected="selected" disabled="disabled"> - Select - </option>
                            <option value="full">Full Day</option>
                            <option value="half">Half Day</option>
                            <option value="non">Not-Working Day</option>
                          </select>
                        </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="row">
                        <label class="col-sm-3 col-form-label">Friday</label>
                        <div class="col-sm-9">
                          <div class="form-group">
                          <select class="form-control" id="friday" name="friday">
                            <option selected="selected" disabled="disabled"> - Select - </option>
                            <option value="full">Full Day</option>
                            <option value="half">Half Day</option>
                            <option value="non">Not-Working Day</option>
                          </select>
                        </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="row">
                        <label class="col-sm-3 col-form-label">Saturday</label>
                        <div class="col-sm-9">
                          <div class="form-group">
                          <select class="form-control" id="saturday" name="saturday">
                            <option selected="selected" disabled="disabled"> - Select - </option>
                            <option value="full">Full Day</option>
                            <option value="half">Half Day</option>
                            <option value="non">Not-Working Day</option>
                          </select>
                        </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="row">
                        <label class="col-sm-3 col-form-label">Sunday</label>
                        <div class="col-sm-9">
                          <div class="form-group">
                          <select class="form-control" id="sunday" name="sunday">
                            <option selected="selected" disabled="disabled"> - Select - </option>
                            <option value="full">Full Day</option>
                            <option value="half">Half Day</option>
                            <option value="non">Not-Working Day</option>
                          </select>
                        </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <button type="submit" class="btn btn-success float-left mt-4">
                    <i class="mdi mdi-content-save mr-1"></i>Save Changes</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
          </form>
        </div>


<?php
  $this->load->view('template/footer');
  // $this->load->view('template/fixed-plugin');
  $this->load->view('template/js');
?>
