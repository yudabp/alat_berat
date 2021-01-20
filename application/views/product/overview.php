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
              <h4 class="page-title">Product Overview</h4>
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
            <!-- Start Left Content -->
            <div class="col-md-12">
              <div class="row">
                <div class="col-12 col-md-4 grid-margin stretch-card card-tile">
                  <div class="card">
                    <div class="card-body">
                      <div class="d-flex justify-content-between pb-2">
                        <h5>Truck</h5>
                        <i class="fa fa-truck"></i>
                      </div>
                      <div class="inner d-flex align-items-center">
                        <h1 class="text-info font-weight-bold"><?php echo $count_truck; ?></h1>
                      </div>
                      <a href="<?php echo base_url() ?>truck">
                        <small class="text-gray">View All Truck.... <!-- <i class="ti-angle-double-right"></i> --></small>
                      </a>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-md-4 grid-margin stretch-card card-tile">
                  <div class="card">
                    <div class="card-body">
                      <div class="d-flex justify-content-between pb-2">
                        <h5>Heavy Equipment</h5>
                        <i class="fa fa-anchor"></i>
                      </div>
                      <div class="inner d-flex align-items-center">
                        <h1 class="text-primary font-weight-bold"><?php echo $count_heq; ?></h1>
                      </div>
                      <a href="<?php echo base_url() ?>heavy-equipment">
                        <small class="text-gray">View All Heavy Equipment.... <!-- <i class="ti-angle-double-right"></i> --></small>
                      </a>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-md-4 grid-margin stretch-card card-tile">
                  <div class="card">
                    <div class="card-body">
                      <div class="d-flex justify-content-between pb-2">
                        <h5>Sparepart</h5>
                        <i class="fa fa-wrench"></i>
                      </div>
                      <div class="inner d-flex align-items-center">
                        <h1 class="text-primary font-weight-bold"><?php echo $count_sparepart; ?></h1>
                      </div>
                      <a href="<?php echo base_url() ?>sparepart">
                        <small class="text-gray">View All Sparepart.... <!-- <i class="ti-angle-double-right"></i> --></small>
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
          </div>
        </div>
        <!-- content-wrapper ends -->

<?php 
  $this->load->view('template/footer');
  // $this->load->view('template/fixed-plugin');
  $this->load->view('template/js');
?>
<script type="text/javascript">
    if ($('#calendar').length) {
      $('#calendar').fullCalendar({
        header: {
          left: 'prev,next today',
          center: 'title',
          right: 'month,basicWeek,basicDay'
        },
        // defaultDate: '2017-07-12',
        navLinks: true, // can click day/week names to navigate views
        editable: true,
        eventLimit: true, // allow "more" link when too many events
      })
    }
</script>