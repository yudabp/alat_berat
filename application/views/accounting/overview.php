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
              <h4 class="page-title">Accounting Overview</h4>
              <div class="d-flex align-items-center">
                <div class="wrapper mr-4 d-none d-sm-block">
                  <p class="mb-0">Summary for
                    <b class="mb-0"><i id="bulan"></i> <i id="tahun"></i></b>
                  </p>
                </div>
              </div>
            </div>
          </div>
          <div class="row grid-margin">
            <div class="col-sm-6">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-tittle">Income + Expense</h4>
                  <div id="income-expense-bar"></div>
                </div>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-tittle">Business Expense</h4>
                  <div id="business-expense-pie"></div>
                </div>
              </div>
            </div>
          </div>
          <div class="row grid-margin">
            <div class="col-12 col-sm-6 col-md-6 grid-margin stretch-card card-tile">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex justify-content-between pb-2">
                    <h4>Cash + Bank Balance</h4>
                    <i class="icon-wallet"></i>
                  </div>
                  <div class="d-flex justify-content-between">
                    <p class="text-muted">Petty Cash</p>
                    <p class="text-muted">Rp 300.000,-</p>
                  </div>
                  <div class="d-flex justify-content-between">
                    <p class="text-muted">Saving Account</p>
                    <p class="text-muted">Rp 4.000.000,-</p>
                  </div>
                  <div class="d-flex justify-content-between">                                    
                    <p class="text-muted" style="font: bold"><b>Total</b></p>
                    <p class="text-muted"><b>Rp 4.300.000,-</b></p>
                  </div>
                  <!-- <div class="progress progress-md">
                    <div class="progress-bar bg-danger w-25" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                  </div> -->
                </div>
              </div>
            </div>
            <div class="col-12 col-sm-6 col-md-6 grid-margin stretch-card card-tile">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex justify-content-between pb-2">
                    <h4>Revenue</h4>
                    <i class="icon-wallet"></i>
                  </div>
                  <div class="d-flex justify-content-between">
                    <p class="text-muted">Income</p>
                    <p class="text-muted">Rp 650.000,-</p>
                  </div>
                  <div class="d-flex justify-content-between">
                    <p class="text-muted">Expense</p>
                    <p class="text-muted">Rp 300.000,-</p>
                  </div>
                  <div class="d-flex justify-content-between">
                    <p class="text-muted"><b>Total</b></p>
                    <p class="text-muted"><b>Rp 950.000,-</b></p>
                  </div>
                  <!-- <div class="progress progress-md">
                    <div class="progress-bar bg-danger w-25" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                  </div> -->
                </div>
              </div>
            </div>
          </div>
          <div class="row grid-margin">
            <div class="col-12 col-sm-6 col-md-6 grid-margin stretch-card card-tile">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex justify-content-between pb-2">
                    <h4>Invoice Payable to You</h4>
                    <i class="icon-wallet"></i>
                  </div>
                  <div class="d-flex justify-content-between">
                    <p class="text-muted">Coming Due</p>
                    <p class="text-muted">Rp</p>
                  </div>
                  <div class="d-flex justify-content-between">
                    <p class="text-muted">1-30 Days Overdue</p>
                    <p class="text-muted">Rp</p>
                  </div>
                  <div class="d-flex justify-content-between">
                    <p class="text-muted">31-60 Days Overdue</p>
                    <p class="text-muted">Rp</p>
                  </div>
                  <div class="d-flex justify-content-between">
                    <p class="text-muted">61-90 Days Overdue</p>
                    <p class="text-muted">Rp</p>
                  </div>
                  <div class="d-flex justify-content-between">
                    <p class="text-muted">> 90 Days Overdue</p>
                    <p class="text-muted">Rp</p>
                  </div>
                  <!-- <div class="progress progress-md">
                    <div class="progress-bar bg-danger w-25" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                  </div> -->
                </div>
              </div>
            </div>
            <div class="col-12 col-sm-6 col-md-6 grid-margin stretch-card card-tile">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex justify-content-between pb-2">
                    <h4>Bill You Need to Pay</h4>
                    <i class="icon-wallet"></i>
                  </div>
                  <div class="d-flex justify-content-between">
                    <p class="text-muted">Coming Due</p>
                    <p class="text-muted">Rp</p>
                  </div>
                  <div class="d-flex justify-content-between">
                    <p class="text-muted">1-30 Days Overdue</p>
                    <p class="text-muted">Rp</p>
                  </div>
                  <div class="d-flex justify-content-between">
                    <p class="text-muted">31-60 Days Overdue</p>
                    <p class="text-muted">Rp</p>
                  </div>
                  <div class="d-flex justify-content-between">
                    <p class="text-muted">61-90 Days Overdue</p>
                    <p class="text-muted">Rp</p>
                  </div>
                  <div class="d-flex justify-content-between">
                    <p class="text-muted">> 90 Days Overdue</p>
                    <p class="text-muted">Rp</p>
                  </div>
                  <!-- <div class="d-flex justify-content-between">
                    <p class="text-muted">Expense</p>
                    <p class="text-muted">Rp 300.000,-</p>
                  </div> -->
                  <!-- <div class="progress progress-md">
                    <div class="progress-bar bg-danger w-25" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                  </div> -->
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->

<?php 
  $this->load->view('template/footer');
  // $this->load->view('template/fixed-plugin');
  $this->load->view('template/js');
?>
<script type="text/javascript">
  $(document).ready(function() {
    var c3BarChart = c3.generate({
      bindto: '#income-expense-bar',
      data: {
        x: 'x',
        columns: [
          ['x', 'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
          // ['x', '1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12'],
          ['Income', '500000', '1000000', '1250000', '750000', '800000', '950000', '1750000', '1100000', '675000', '850000', '925000', '1500000'],
          ['Expense', '250000', '700000', '550000', '650000', '300000', '400000', '550000', '650000', '425000', '225000', '600000', '350000']
        ],
        type: 'bar'
      },
      axis: {
        x: {
          type: 'category'
        }
      },
      color: {
        pattern: ['rgba(88,216,163,1)', 'rgba(4,189,254,0.6)', 'rgba(237,28,36,0.6)']
      },
      padding: {
        top: 0,
        right: 0,
        bottom: 30,
        left: 0,
      },
      bar: {
        width: {
          ratio: 0.7 // this makes bar width 50% of length between ticks
        }
      }
    });
    var c3PieChart = c3.generate({
      bindto: '#business-expense-pie',
      data: {
        // iris data from R

        columns: [
          ['Received', 30],
          ['Outstanding', 120],
        ],
        type: 'pie',
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
        pattern: ['#6153F9', '#1D184A', '#A7B3FD']
      },
      padding: {
        top: 0,
        right: 0,
        bottom: 30,
        left: 0,
      }
    });
  });
</script>