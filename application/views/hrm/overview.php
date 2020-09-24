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
                <div class="col-12 col-md-4 grid-margin stretch-card card-tile">
                  <div class="card">
                    <div class="card-body">
                      <div class="d-flex justify-content-between pb-2">
                        <h5>Employee</h5>
                        <i class="icon-people"></i>
                      </div>
                      <div class="inner d-flex align-items-center">
                        <h1 class="text-info font-weight-bold"><?php echo $emnum; ?></h1>
                      </div>
                      <a href="<?php echo base_url() ?>employees">
                        <small class="text-gray">View Employee.... <!-- <i class="ti-angle-double-right"></i> --></small>
                      </a>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-md-4 grid-margin stretch-card card-tile">
                  <div class="card">
                    <div class="card-body">
                      <div class="d-flex justify-content-between pb-2">
                        <h5>Department</h5>
                        <i class="fa fa-building-o"></i>
                      </div>
                      <div class="inner d-flex align-items-center">
                        <h1 class="text-primary font-weight-bold"><?php echo $depnum; ?></h1>
                      </div>
                      <a href="<?php echo base_url() ?>departments">
                        <small class="text-gray">View Department.... <!-- <i class="ti-angle-double-right"></i> --></small>
                      </a>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-md-4 grid-margin stretch-card card-tile">
                  <div class="card">
                    <div class="card-body">
                      <div class="d-flex justify-content-between pb-2">
                        <h5>Designation</h5>
                        <i class="icon-puzzle"></i>
                      </div>
                      <div class="inner d-flex align-items-center">
                        <h1 class="text-warning font-weight-bold"><?php echo $desnum; ?></h1>
                      </div>
                      <a href="<?php echo base_url() ?>designations">
                        <small class="text-gray">View Designation.... <!-- <i class="ti-angle-double-right"></i> --></small>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row grid-margin">
                <div class="col-md-12">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">Latest Announcement</h4>
                      <div class="table-responsive">
                        <table id="tableannouncement" class="table">
                          <thead>
                            <tr class="text-center">
                              <!-- <th>No</th> -->
                              <th>Title</th>
                              <!-- <th>Sent to</th> -->
                              <th>Description</th>
                              <th>Date</th>
                              <!-- <th>Actions</th> -->
                            </tr>
                          </thead>
                          <tbody>
                            <?php foreach ($announ as $key => $value) {?>

                            <tr class="text-center">
                              <!-- <td><?php echo $key +1; ?></td> -->
                              <td><?php echo $value->anntitle; ?></td>
                              <!-- <td style="text-align:left;"><?php echo $value->annsendto; if($value->annsendto == "designation" || $value->annsendto=="department"){ echo "<strong> - ".$value->annsenddetail."</strong>";}elseif ($value->annsendto =="all" || $value->annsendto=="selected") {echo " employee";}?></td> -->
                              <td><?php echo $value->anndesc?></td>
                              <td><?php $date = date_create($value->adddate); echo date_format($date,"d / M / Y H:i:s");?></td>
                              <!-- <td style="text-align:left;">
                                <div class="dropdown">
                                  <button type="button" class="btn btn-icons btn-rounded text-center" data-toggle="dropdown">
                                    <i class="ti-more-alt"></i>
                                  </button>
                                  <div class="dropdown-menu">
                                    <button class="btn btn-link" onclick="edtItem('<?php echo $value->idann; ?>');"><i class="fa fa-pencil"></i></button>
                                    <button class="btn btn-link" onclick="delItem('<?php echo $value->idann; ?>');"><i class="fa fa-trash-o"></i></button>
                                    <?php if($value->annsendto=="selected"){ ?><button class="btn btn-link" onclick="viewItem('<?php echo $value->idann; ?>');"><i class="fa fa-user"></i></button><?php } ?>
                                  </div>
                                </div>
                              </td> -->
                            </tr>
                            <?php } ?>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row grid-margin">
                <div class="col-md-12">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">Calendar</h4>
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
                      <h4 class="card-title">Birthday</h4>
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
                      <h4 class="card-title">Leave</h4>
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
              <div class="row grid-margin">
                <div class="col-md-12">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">Attendance</h4>
                      <!-- <div class="chart-container">
                        <canvas class="mt-4" id="sales-status" height="150"></canvas>
                        <div id="sales-status-legend" class="legend-con mt-4 mb-0"></div>
                      </div> -->
                      <div id="donut-absensi"></div>
                    </div>
                  </div>
                </div>
              </div>
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
<script type="text/javascript">
  var c3DonutChart = c3.generate({
    bindto: '#donut-absensi',
    data: {
      // columns: [
      //   ['Present', 100],
      //   ['Sick', 75],
      //   ['Permission', 50],
      //   ['Absent', 36],
      // ],
      columns: [
        ['No Data', 100],
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
      // pattern: ['rgba(88,216,163,1)', '#ff9800', '#00bcd4', 'rgba(237,28,36,0.6)']
      pattern: ['#D5D5D5']
    },
    padding: {
      top: 0,
      right: 0,
      bottom: 30,
      left: 0,
    },
    donut: {
      title: ""
    }
  });
</script>
