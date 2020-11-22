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
            <div class="col-md-12">
              <div class="row">
                <div class="col-12 col-md-4 grid-margin stretch-card card-tile">
                  <div class="card">
                    <div class="card-body">
                      <div class="d-flex justify-content-between pb-2">
                        <h5>Total Pay Calendar Created</h5>
                        <i class="fa fa-calendar"></i>
                      </div>
                      <div class="inner d-flex align-items-center">
                        <h1 class="text-info font-weight-bold">0</h1>
                      </div>
                      <a href="<?php echo base_url() ?>pay-calendar">
                        <small class="text-gray">View Pay Calendar.... <!-- <i class="ti-angle-double-right"></i> --></small>
                      </a>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-md-4 grid-margin stretch-card card-tile">
                  <div class="card">
                    <div class="card-body">
                      <div class="d-flex justify-content-between pb-2">
                        <h5>Pay Calendar Approved</h5>
                        <i class="icon-calendar"></i>
                      </div>
                      <div class="inner d-flex align-items-center">
                        <h1 class="text-info font-weight-bold">0</h1>
                      </div>
                      <a href="#">
                        <small class="text-gray">View Pay Run List.... <!-- <i class="ti-angle-double-right"></i> --></small>
                      </a>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-md-4 grid-margin stretch-card card-tile">
                  <div class="card">
                    <div class="card-body">
                      <div class="d-flex justify-content-between pb-2">
                        <h5>Spent on Previous Month</h5>
                        <i class="icon-wallet"></i>
                      </div>
                      <div class="inner d-flex align-items-center">
                        <h1 class="text-info font-weight-bold">Rp 0</h1>
                      </div>
                      <a href="#">
                        <small class="text-gray">View Detail.... <!-- <i class="ti-angle-double-right"></i> --></small>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row grid-margin">
                <div class="col-md-12">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">Latest 5 Pay Run Records</h4>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row grid-margin">
                <div class="col-md-12">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">Payroll History of Current Month</h4>
                      <div id="mori-line-example"></div>
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
<script type="text/javascript">
	var GraphLines = Morris.Line({
      element: 'mori-line-example',
      lineColors: ['#63CF72'],
      data: [{
          y: '2006',
          a: 100,
        },
        {
          y: '2007',
          a: 75,
        },
        {
          y: '2008',
          a: 50,
        },
        {
          y: '2009',
          a: 75,
        },
        {
          y: '2010',
          a: 50,
        },
        {
          y: '2011',
          a: 25,
        },
        {
          y: '2012',
          a: 0,
        }
      ],
      xkey: 'y',
      ykeys: ['a'],
      labels: ['site A']
      });
</script>