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
          <div class="row">
            <div class="col-md-12">
              <a href="<?php echo base_url() ?>contacts"><h5>Back to Contact</h5></a>
            </div>
          </div>
          <div class="row mb-4">
            <div class="col-12 d-flex align-items-center justify-content-between">
              <h4 class="page-title">Customers</h4>
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
          <div class="row profile-page">
            <div class="col-12">
              <div class="card">
                <div class="card-body">
                  <div class="profile-header text-white d-none d-md-block">
                    <div class="d-flex align-items-center justify-content-between">
                      <div class="d-flex justify-content-center align-items-center ml-4">
                        <img class="rounded-circle img-lg" src="assets/chroma/images/faces/face12.jpg" alt="profile image">
                        <div class="wrapper pl-4">
                          <p style="line-height: 10px;" class="profile-user-name">Richard Verandes.Welsh</p>
                          <p style="line-height: 10px;" class="profile-job">(UI/UX Designer)</p>
                          <p style="line-height: 10px;" class="profile-email">sandroid.alex@gmail.com</p>
                          <p style="line-height: 10px;" class="profile-telp">(+62) 89292923</p>
                        </div>
                      </div>
                     <!--  <div class="details">
                        <div class="detail-col ">
                          <p>Projects</p>
                          <p>130</p>
                        </div>
                        <div class="detail-col ">
                          <p>Projects</p>
                          <p>130</p>
                        </div>
                      </div> -->
                    </div>
                  </div>
                  <div class="profile-body pt-0 pt-sm-4">
                    <ul class="nav tab-switch " role="tablist ">
                      <li class="nav-item">
                        <a class="nav-link active" id="tab-3-1" data-toggle="tab" href="#home-3-1" role="tab" aria-controls="home-3-1" aria-selected="true">
                        <i class="fa fa-vcard-o mr-2"></i>Personal details</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="tab-3-2" data-toggle="tab" href="#profile-3-2" role="tab" aria-controls="profile-3-2" aria-selected="false">
                        <i class="fa fa-building mr-2"></i>Company</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="tab-3-3" data-toggle="tab" href="#contact-3-3" role="tab" aria-controls="contact-3-3" aria-selected="false">
                        <i class="fa fa-calendar mr-2"></i>Schedules</a>
                      </li>
                    </ul>
                    <div class="row mt-4">
                      <div class="col-md-12">
                        <div class="tab-content tab-content-basic">
                          <!-- tab 1 -->
                          <div class="tab-pane fade show active" id="home-3-1" role="tabpanel" aria-labelledby="tab-3-1">
                            <div class="row">
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label for="first_name">First Name</label>
                                  <input type="text" name="first_name" id="first_name" class="form-control" placeholder="First Name">
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label for="last_name">Last Name</label>
                                  <input type="text" name="last_name" id="last_name" class="form-control" placeholder="Last Name">
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label for="email">Email</label>
                                  <input type="text" name="email" id="email" class="form-control" placeholder="Email">
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label for="Phone_no">Phone No.</label>
                                  <input type="text" name="Phone_no" id="Phone_no" class="form-control" placeholder="Phone No.">
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label for="email">Other Email</label>
                                  <input type="text" name="email" id="email" class="form-control" placeholder="Other Email">
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label for="Phone_no">Other Phone No.</label>
                                  <input type="text" name="Phone_no" id="Phone_no" class="form-control" placeholder="Other Phone No.">
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label for="job">Job Title</label>
                                  <input type="text" name="job" id="job" class="form-control" placeholder="Job Title">
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label for="birthday">Birthday</label>
                                  <input type="text" name="birthday" id="birthday" class="form-control" placeholder="Birthday">
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-12">
                                <div class="form-group">
                                  <label for="address">Address</label>
                                  <textarea class="form-control" id="address" rows="2"></textarea>
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <a href="#" class="btn btn-success float-left mt-4">
                              <i class="mdi mdi-content-save mr-1"></i>Save Changes</a>
                            </div>
                          </div>
                         <!--  /tab 1 -->
                        <!--   Tab 2 -->
                          <div class="tab-pane fade show" id="profile-3-2" role="tabpanel" aria-labelledby="tab-3-2">
                            <div class="row">
                              <div class="col-md-12">
                                <div class="form-group">
                                  <label for="name">Company Name</label>
                                  <input type="text" name="name" id="name" class="form-control" placeholder="Company Name">
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label for="email">Email</label>
                                  <input type="text" name="email" id="email" class="form-control" placeholder="Email">
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label for="Phone_no">Phone No.</label>
                                  <input type="text" name="Phone_no" id="Phone_no" class="form-control" placeholder="Phone No.">
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-12">
                                <div class="form-group">
                                  <label for="address">Address</label>
                                  <textarea class="form-control" id="address" rows="2"></textarea>
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <a href="#" class="btn btn-success float-left mt-4">
                              <i class="mdi mdi-content-save mr-1"></i>Save Changes</a>
                            </div>
                          </div>
                        <!--   /tab 2 -->
                         <!-- tab 3 -->
                          <div class="tab-pane fade show" id="contact-3-3" role="tabpanel" aria-labelledby="tab-3-3">
                            <div class="row grid-margin">
                              <div class="col-md-12">
                                <div class="form-group">
                                  <div id="calendar"></div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <!-- /tab3 -->
                        </div>
                      </div>
                    </div>
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
