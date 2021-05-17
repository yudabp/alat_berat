<?php 
    $this->load->view('template/head');
    $this->load->view('template/topbar');
    $this->load->view('template/sidebar');
?>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row mb-4">
            <div class="col-12 d-flex align-items-center justify-content-between">
              <h4 class="page-title">Dashboard</h4>
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
            <div class="col-12 card-statistics">
              <div class="row">
                <div class="col-12 col-sm-6 col-md-3 grid-margin stretch-card card-tile">
                  <div class="card">
                    <div class="card-body">
                      <div class="d-flex justify-content-between pb-2">
                        <h5>Todays Income</h5>
                        <i class="icon-docs"></i>
                      </div>
                      <div class="d-flex justify-content-between">
                        <p class="text-muted">Avg. Session</p>
                        <p class="text-muted">max: 40</p>
                      </div>
                      <div class="progress progress-md">
                        <div class="progress-bar bg-info w-25" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-sm-6 col-md-3 grid-margin stretch-card card-tile">
                  <div class="card">
                    <div class="card-body">
                      <div class="d-flex justify-content-between pb-2">
                        <h5>Total Revenue</h5>
                        <i class="icon-pie-chart"></i>
                      </div>
                      <div class="d-flex justify-content-between">
                        <p class="text-muted">Avg. Session</p>
                        <p class="text-muted">max: 120</p>
                      </div>
                      <div class="progress progress-md">
                        <div class="progress-bar bg-success w-25" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-sm-6 col-md-3 grid-margin stretch-card card-tile">
                  <div class="card">
                    <div class="card-body">
                      <div class="d-flex justify-content-between pb-2">
                        <h5>Pending Product</h5>
                        <i class="icon-wallet"></i>
                      </div>
                      <div class="d-flex justify-content-between">
                        <p class="text-muted">Avg. Session</p>
                        <p class="text-muted">max: 54</p>
                      </div>
                      <div class="progress progress-md">
                        <div class="progress-bar bg-danger w-25" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-sm-6 col-md-3 grid-margin stretch-card card-tile">
                  <div class="card">
                    <div class="card-body">
                      <div class="d-flex justify-content-between pb-2">
                        <h5>Sales</h5>
                        <i class="icon-screen-desktop"></i>
                      </div>
                      <div class="d-flex justify-content-between">
                        <p class="text-muted">Avg. Session</p>
                        <p class="text-muted">max: 143</p>
                      </div>
                      <div class="progress progress-md">
                        <div class="progress-bar bg-warning w-25" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-5 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex justify-content-between">
                    <h4 class="card-title">Client</h4>
                    <p class="text-muted d-none d-md-block">29-May-2018, 11.00 AM</p>
                  </div>
                  <div class="chart-container">
                    <canvas class="mt-4" id="sales-status" height="150"></canvas>
                    <div id="sales-status-legend" class="legend-con mt-4 mb-0"></div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-7 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Total Sales by Categories</h4>
                  <div class="d-flex justify-content-between pb-4">
                    <p class="card-description mb-0 d-none d-sm-block">Activity from 4 Jan 2017 to 10 Jan 2017</p>
                    <div id="product-sales-legend"></div>
                  </div>
                  <canvas id="product-sales" height="150"></canvas>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body d-flex flex-column">
                  <h4 class="card-title">Announcement</h4>
                  <!-- <p class="card-description">Based on last month analytics.</p> -->
                  <!-- <div class="mt-auto"> -->
                    <div class="row">
                      <div class="col-12 table-responsive">
                        <table id="tableAnnouncement" class="table">
                          <thead>
                            <tr class="text-center">
                              <!-- <th>No</th> -->
                              <th style="width: 20%">Title</th>
                              <th style="width: 80%">Description</th>
                            </tr>
                          </thead>
                          <tbody>
                              <tr class="text-center">
                               <td>Cuti Tahunan 2019</td>
                               <td>Dengan ini menyatakan bahwa cuti tahunan 2019 ditiadakan...</td>
                              </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  <!-- </div> -->
                </div>
              </div>
            </div>
            <!-- <div class="col-md-4 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex justify-content-between">
                    <h4 class="card-title">Activity</h4>
                  </div>
                  <p class="card-description">What're people doing right now</p>
                  <div class="list d-flex align-items-center border-bottom py-3">
                    <img class="img-sm rounded-circle" src="images/faces/face4.jpg" alt="">
                    <div class="wrapper w-100 ml-3">
                      <p class="mb-0">
                        <b>Dobrick </b>posted in Material</p>
                      <div class="d-flex justify-content-between align-items-center">
                        <div class="d-flex align-items-center">
                          <p class="mb-0">That's awesome!</p>
                        </div>
                        <small class="text-muted ml-auto">2 hours ago</small>
                      </div>
                    </div>
                  </div>
                  <div class="list d-flex align-items-center border-bottom py-3">
                    <img class="img-sm rounded-circle" src="images/faces/face5.jpg" alt="">
                    <div class="wrapper w-100 ml-3">
                      <p class="mb-0">
                        <b>Stella </b>posted in Material</p>
                      <div class="d-flex justify-content-between align-items-center">
                        <div class="d-flex align-items-center">
                          <p class="mb-0">That's awesome!</p>
                        </div>
                        <small class="text-muted ml-auto">3 hours ago</small>
                      </div>
                    </div>
                  </div>
                  <div class="list d-flex align-items-center border-bottom py-3">
                    <img class="img-sm rounded-circle" src="images/faces/face7.jpg" alt="">
                    <div class="wrapper w-100 ml-3">
                      <p class="mb-0">
                        <b>Peter </b>posted in Material</p>
                      <div class="d-flex justify-content-between align-items-center">
                        <div class="d-flex align-items-center">
                          <p class="mb-0">That's Great!</p>
                        </div>
                        <small class="text-muted ml-auto">1 hours ago</small>
                      </div>
                    </div>
                  </div>
                  <div class="list d-flex align-items-center pt-3">
                    <img class="img-sm rounded-circle" src="images/faces/face6.jpg" alt="">
                    <div class="wrapper w-100 ml-3">
                      <p class="mb-0">
                        <b>Natalia </b>posted in Material</p>
                      <div class="d-flex justify-content-between align-items-center">
                        <div class="d-flex align-items-center">
                          <p class="mb-0">That's awesome!</p>
                        </div>
                        <small class="text-muted ml-auto">1 hours ago</small>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div> -->
            <!-- <div class="col-md-4 grid-margin stretch-card">
              <div class="card">
                <div class="card-body d-flex flex-column">
                  <h4 class="card-title">Sales Chart</h4>
                  <p class="card-description">Based on last month analytics.</p>
                  <div class="mt-auto" id="dashboard-sales-chart"></div>
                </div>
              </div>
            </div> -->
          </div>
          <!-- <div class="row">
            <div class="col-md-12">
              <div class="card support-pane-card">
                <div class="card-body">
                  <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="card-title mb-0">Customer support</h4>
                    <div class="btn-toolbar mb-0 d-none d-sm-block" role="toolbar" aria-label="Toolbar with button groups">
                      <div class="btn-group" role="group" aria-label="First group">
                        <button type="button" class="btn btn-success">
                          <i class="mdi mdi-plus-circle"></i> Add
                        </button>
                      </div>
                      <div class="btn-group" role="group" aria-label="Second group">
                        <button type="button" class="btn btn-outline-secondary">
                          <i class="mdi mdi-alert-circle-outline"></i>
                        </button>
                        <button type="button" class="btn btn-outline-secondary">
                          <i class="mdi mdi-delete-empty"></i>
                        </button>
                      </div>
                      <div class="btn-group" role="group" aria-label="Third group">
                        <button type="button" class="btn btn-outline-secondary">
                          <i class="mdi mdi-printer"></i>
                        </button>
                      </div>
                    </div>
                  </div>
                  <div class="table-responsive support-pane no-wrap">
                    <div class="t-row">
                      <div class="tumb">
                        <div class="img-sm rounded-circle bg-info d-flex align-items-center justify-content-center text-white">EC</div>
                      </div>
                      <div class="content">
                        <p class="font-weight-bold mb-2 d-inline-block">John Alexander</p>
                        <p class="text-muted mb-2 d-inline-block">30 Nov 2018</p>
                        <p>3 Smart Reasons Why You Should Consider Paying For Your Traffic</p>
                      </div>
                      <div class="tile">
                        <p class="text-muted mb-2">Project</p>
                        <p class="font-weight-bold">Dashboard</p>
                      </div>
                      <div class="tile">
                        <p class="text-muted mb-2">Project</p>
                        <p class="font-weight-bold">3 hours</p>
                      </div>
                    </div>
                    <div class="t-row">
                      <div class="tumb">
                        <div class="img-sm rounded-circle bg-danger d-flex align-items-center justify-content-center text-white">EC</div>
                      </div>
                      <div class="content">
                        <p class="font-weight-bold mb-2 d-inline-block">Landon Simpson</p>
                        <p class="text-muted mb-2 d-inline-block">07 Sep 2018</p>
                        <p>Low-Cost Advertising</p>
                      </div>
                      <div class="tile">
                        <p class="text-muted mb-2">Project</p>
                        <p class="font-weight-bold">Mobile app
                      </div>
                      <div class="tile">
                        <p class="text-muted mb-2">Project</p>
                        <p class="font-weight-bold">5 hours</p>
                      </div>
                    </div>
                    <div class="t-row">
                      <div class="tumb">
                        <div class="img-sm rounded-circle bg-success d-flex align-items-center justify-content-center text-white">EC</div>
                      </div>
                      <div class="content">
                        <p class="font-weight-bold mb-2 d-inline-block">David Burns</p>
                        <p class="text-muted mb-2 d-inline-block">06 Aug 2018</p>
                        <p>Pos Hardware More Options In Less Space</p>
                      </div>
                      <div class="tile">
                        <p class="text-muted mb-2">Project</p>
                        <p class="font-weight-bold">Website</p>
                      </div>
                      <div class="tile">
                        <p class="text-muted mb-2">Project</p>
                        <p class="font-weight-bold">2 hours</p>
                      </div>
                    </div>
                    <div class="t-row">
                      <div class="tumb">
                        <div class="img-sm rounded-circle bg-warning d-flex align-items-center justify-content-center text-white">EC</div>
                      </div>
                      <div class="content">
                        <p class="font-weight-bold mb-2 d-inline-block">Cordelia Mitchell</p>
                        <p class="text-muted mb-2 d-inline-block">06 Apr 2018</p>
                        <p>5 Reasons To Choose A Notebook Over A Computer Desktop</p>
                      </div>
                      <div class="tile">
                        <p class="text-muted mb-2">Project</p>
                        <p class="font-weight-bold">Dashboard</p>
                      </div>
                      <div class="tile">
                        <p class="text-muted mb-2">Project</p>
                        <p class="font-weight-bold">4 hours</p>
                      </div>
                    </div>
                  </div>
                  <div class="d-flex justify-content-between align-items-center mt-4">
                    <p class="mb-0 d-none d-md-block">Showing 1 to 20 of 20 entries</p>
                    <nav>
                      <ul class="pagination rounded mb-0 pagination-success">
                        <li class="page-item">
                          <a class="page-link" href="#">
                            <i class="mdi mdi-chevron-left"></i>
                          </a>
                        </li>
                        <li class="page-item active">
                          <a class="page-link" href="#">1</a>
                        </li>
                        <li class="page-item">
                          <a class="page-link" href="#">2</a>
                        </li>
                        <li class="page-item">
                          <a class="page-link" href="#">3</a>
                        </li>
                        <li class="page-item">
                          <a class="page-link" href="#">4</a>
                        </li>
                        <li class="page-item">
                          <a class="page-link" href="#">
                            <i class="mdi mdi-chevron-right"></i>
                          </a>
                        </li>
                      </ul>
                    </nav>
                  </div>
                </div>
              </div>
            </div>
          </div> -->
        </div>
        <!-- content-wrapper ends -->
<?php 
  $this->load->view('template/footer');
  // $this->load->view('template/fixed-plugin');
  $this->load->view('template/js');
?>
<script type="text/javascript">
  $('#tableAnnouncement').DataTable({
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
  $(function () {
    var primaryColor = getComputedStyle(document.body).getPropertyValue('--primary');
    var secondaryColor = getComputedStyle(document.body).getPropertyValue('--secondary');
    var successColor = getComputedStyle(document.body).getPropertyValue('--success');
    var warningColor = getComputedStyle(document.body).getPropertyValue('--warning');
    var dangerColor = getComputedStyle(document.body).getPropertyValue('--danger');
    var infoColor = getComputedStyle(document.body).getPropertyValue('--info');
    var darkColor = getComputedStyle(document.body).getPropertyValue('--dark');
    if ($("#sales-status").length) {
      var myChart = new Chart(document.getElementById('sales-status'), {
        type: 'doughnut',
        animation: {
          animateScale: true
        },
        data: {
          labels: ["Hadir", "Sakit", "Izin", "Absen"],
          datasets: [{
            label: 'Visitor',
            data: [100, 70, 100, 80],
            backgroundColor: [
              successColor,
              infoColor,
              warningColor,
              dangerColor,
            ]
          }]
        },
        options: {
          responsive: true,
          legend: false,
          cutoutPercentage: 50,
          legendCallback: function (chart) {
            var legendHtml = [];
            legendHtml.push('<ul class="row">');
            var item = chart.data.datasets[0];
            for (var i = 0; i < item.data.length; i++) {
              legendHtml.push('<li class="col-6">');
              legendHtml.push('<span class="chart-legend" style="border-color:' + item.backgroundColor[i] + '"></span>');
              legendHtml.push('<span class="chart-legend-label-text">' + chart.data.labels[i] + '&nbsp;' + item.data[i]);
              legendHtml.push('</li>');
            }

            legendHtml.push('</ul>');
            return legendHtml.join("");
          },
          tooltips: {
            enabled: true,
            mode: 'label',
            callbacks: {
              label: function (tooltipItem, data) {
                var indice = tooltipItem.index;
                return data.labels[indice] + data.datasets[0].data[indice];
              }
            }
          },
        }
      });
      $('#sales-status-legend').html(myChart.generateLegend());
    }
    if ($("#product-sales").length) {
      Chart.defaults.global.legend.labels.usePointStyle = true;
      var ctx = document.getElementById('product-sales').getContext("2d");

      var gradientStrokeFill_1 = ctx.createLinearGradient(1, 1, 1, 400);
      gradientStrokeFill_1.addColorStop(0, successColor);
      gradientStrokeFill_1.addColorStop(1, infoColor);

      var gradientStrokeFill_2 = ctx.createLinearGradient(1, 1, 1, 250);
      gradientStrokeFill_2.addColorStop(0, primaryColor);
      gradientStrokeFill_2.addColorStop(1, infoColor);

      var gradientStrokeFill_3 = ctx.createLinearGradient(1, 1, 1, 250);
      gradientStrokeFill_3.addColorStop(0, warningColor);
      gradientStrokeFill_3.addColorStop(1, infoColor);

      var gradientStrokeFill_4 = ctx.createLinearGradient(1, 1, 1, 250);
      gradientStrokeFill_4.addColorStop(0, dangerColor);
      gradientStrokeFill_4.addColorStop(1, infoColor);

      var ProductSalesCanvas = $("#product-sales").get(0).getContext("2d");
      var ProductSales = new Chart(ProductSalesCanvas, {
        type: 'line',
        data: {
          labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Des"],
          datasets: [{
              label: 'Cleaning Service',
              data: [0, 16, 3, 5, 2, 12, 9, 3, 15, 10, 8, 12],
              borderColor: successColor,
              backgroundColor: gradientStrokeFill_1,
              fill: false,
              borderWidth: 2
            },
            {
              label: 'Security',
              data: [0, 23, 7, 12, 40, 17, 26, 5, 10, 9, 14, 10],
              borderColor: primaryColor,
              backgroundColor: gradientStrokeFill_2,
              fill: false,
              borderWidth: 2,
              borderDash: [5, 5],
            },
            {
              label: 'Pest Control',
              data: [0, 14, 9, 6, 24, 30, 15, 11, 8, 20, 13, 5],
              borderColor: warningColor,
              backgroundColor: gradientStrokeFill_3,
              fill: false,
              borderWidth: 2
            },
            {
              label: 'Gondola',
              data: [0, 9, 16, 16, 25, 15, 13, 18, 28, 10, 3, 15],
              borderColor: dangerColor,
              backgroundColor: gradientStrokeFill_4,
              fill: false,
              borderWidth: 2,
              borderDash: [5, 5],
            },
          ]
        },
        options: {
          responsive: true,
          animation: {
            animateScale: true,
            animateRotate: true
          },
          elements: {
            point: {
              radius: 0
            }
          },
          layout: {
            padding: {
              left: 0,
              right: 0,
              top: 0,
              bottom: 0
            }
          },
          legendCallback: function (chart) {
            var text = [];
            text.push('<ul>');
            for (var i = 0; i < chart.data.datasets.length; i++) {
              text.push('<li><span class="chart-color" style="border-color:' +
                chart.data.datasets[i].borderColor + '"></span>');
              text.push('<span class="chart-label"> ' + chart.data.datasets[i].label + '</span>');
              text.push('</li>');
            }
            text.push('</ul>');
            return text.join("");
          },
          legend: false,
          stepsize: 100,
          scales: {
            xAxes: [{
              gridLines: {
                color: 'rgba(0, 0, 0, 0)',
                display: false
              }
            }],
            yAxes: [{
              display: false,
              gridLines: {
                color: 'rgba(0, 0, 0, 0.05)',
                display: false
              }
            }]
          }
        }
      });
      $('#product-sales-legend').html(ProductSales.generateLegend());
    }
  });
</script>
