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
              <h4 class="page-title">Overview</h4>
              <div class="d-flex align-items-center">
                <div class="wrapper mr-4 d-none d-sm-block">
                  <p class="mb-0">Summary for
                    <b class="mb-0"><i id="bulan"></i> <i id="tahun"></i></b>
                  </p>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <!-- Start Left Content -->
            <div class="col-md-8">
              <div class="row">
                <div class="col-12 col-md-6 grid-margin stretch-card card-tile">
                  <div class="card">
                    <div class="card-body">
                      <div class="d-flex justify-content-between pb-2">
                        <h5>Contact</h5>
                        <i class="icon-people"></i>
                      </div>
                      <div class="inner d-flex align-items-center">
                        <h1 class="text-info font-weight-bold"><?php echo $contnum; ?></h1>
                      </div>
                      <a href="<?php echo base_url() ?>contacts">
                        <small class="text-gray">View All Contacts.... <!-- <i class="ti-angle-double-right"></i> --></small>
                      </a>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-md-6 grid-margin stretch-card card-tile">
                  <div class="card">
                    <div class="card-body">
                      <div class="d-flex justify-content-between pb-2">
                        <h5>Companies</h5>
                        <i class="fa fa-building-o"></i>
                      </div>
                      <div class="inner d-flex align-items-center">
                        <h1 class="text-primary font-weight-bold"><?php echo $contnum; ?></h1>
                      </div>
                      <a href="<?php echo base_url() ?>companies">
                        <small class="text-gray">View All Companies.... <!-- <i class="ti-angle-double-right"></i> --></small>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
              <!-- <div class="row grid-margin">
                <div class="col-md-12">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">Latest Announcement</h4>
                    </div>
                  </div>
                </div>
              </div> -->
              <div class="row grid-margin">
                <div class="col-md-12">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">Schedules</h4>
                      <div id="calendar"></div>
                    </div>
                  </div>
                </div>
              </div>
            </div> 
            <!-- End Left Content -->
            <!-- Start Right Content -->
            <div class="col-md-4">
              <div class="row grid-margin">
                <div class="col-md-12">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">Today's Schedules</h4>
                      <div class="row">
                        <div class="col-12 table-responsive">
                          <table id="birthday" class="table table-striped">
                            <thead>
                              <tr>
                                <th>Name</th>
                                <th>Birthday</th>
                                <!-- <th>Department</th> -->
                                <!-- <th>Ship to</th> -->
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td colspan="2" class="text-center">No Data</td>
                                <!-- <td></td> -->
                                <!-- <td></td> -->
                                <!-- <td></td> -->
                              </tr>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row grid-margin">
                <div class="col-md-12">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">Upcoming Schedules</h4>
                      <div class="row">
                        <div class="col-12">
                          <ul class="nav nav-tabs tab-basic" role="tablist">
                            <li class="nav-item">
                              <a class="nav-link active" id="home-tab" data-toggle="tab" href="#this_month" role="tab" aria-controls="this_month" aria-selected="true">This Month</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" id="profile-tab" data-toggle="tab" href="#next_month" role="tab" aria-controls="next_month" aria-selected="false">Next Month</a>
                            </li>
                          </ul>
                          <div class="tab-content tab-content-basic">
                            <div class="tab-pane fade show active" id="this_month" role="tabpanel" aria-labelledby="home-tab">
                              <div class="row">
                                <div class="col-12 table-responsive">
                                  <table id="cuti_ini" class="table table-striped">
                                    <thead>
                                      <tr>
                                        <th>Name</th>
                                        <th>Department</th>
                                        <!-- <th>Department</th> -->
                                        <!-- <th>Ship to</th> -->
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <tr>
                                        <td colspan="2" class="text-center">No Data</td>
                                        <!-- <td></td> -->
                                        <!-- <td></td> -->
                                        <!-- <td></td> -->
                                      </tr>
                                    </tbody>
                                  </table>
                                </div>
                              </div>
                            </div>
                            <div class="tab-pane fade" id="next_month" role="tabpanel" aria-labelledby="profile-tab">
                              <div class="row">
                                <div class="col-12 table-responsive">
                                  <table id="cuti_depan" class="table table-striped">
                                    <thead>
                                      <tr>
                                        <th>Nama</th>
                                        <th>Departemen</th>
                                        <!-- <th>Department</th> -->
                                        <!-- <th>Ship to</th> -->
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <tr>
                                        <td colspan="2" class="text-center">No Data</td>
                                        <!-- <td></td> -->
                                        <!-- <td></td> -->
                                        <!-- <td></td> -->
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
                  </div>
                </div>
              </div>
              <!-- <div class="row grid-margin">
                <div class="col-md-12">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">Recently Added</h4>
                      <div class="chart-container">
                        <canvas class="mt-4" id="sales-status" height="150"></canvas>
                        <div id="sales-status-legend" class="legend-con mt-4 mb-0"></div>
                      </div>
                      <div id="donut-absensi"></div>
                    </div>
                  </div>
                </div>
              </div> -->
            </div>
            <!-- End Right Content -->
          </div>
        </div>
        <!-- content-wrapper ends -->

<?php 
  $this->load->view('template/footer');
  // $this->load->view('template/fixed-plugin');
  $this->load->view('template/js');
?>
<!-- <script type="text/javascript">
  var c3DonutChart = c3.generate({
    bindto: '#donut-absensi',
    data: {
      columns: [
        ['Hadir', 100],
        ['Sakit', 75],
        ['Izin', 50],
        ['Alfa', 36],
      ],
      type: 'donut',
      onclick: function (d, i) {
        console.log("onclick", d, i);
      },
      onmouseover: function (d, i) {
        console.log("onmouseover", d, i);
      },
      onmouseout: function (d, i) {
        console.log("onmouseout", d, i);
      }
    },
    color: {
      pattern: ['rgba(88,216,163,1)', '#ff9800', '#00bcd4', 'rgba(237,28,36,0.6)']
    },
    padding: {
      top: 0,
      right: 0,
      bottom: 30,
      left: 0,
    },
    donut: {
      title: "Attendance"
    }
  });
</script> -->