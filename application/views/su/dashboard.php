<?php
    $this->load->view('template/head');
    $this->load->view('template/topbar');
    $this->load->view('template/sidebar');
?>
<style type="text/css">
  a{
    color: #7D7D7D;
  }
  a:hover{
    text-decoration: none;
    color: #7D7D7D;
  }
  .card-title{
    font-size: 18px;
  }
</style>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row mb-4">
            <div class="col-12 d-flex align-items-center justify-content-between">
              <h4 class="page-title">Dashboard Super Admin</h4>
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
                        <h5>Total Companies</h5>
                        <!-- <i class="icon-docs"></i> -->
                      </div>
                      <div class="d-flex float-right">
                        <h3><?php echo $total; ?></h3>
                        <!-- <p class="text-muted">Avg. Session</p>
                        <p class="text-muted">max: 40</p> -->
                      </div>
                      <div class="progress progress-md mt-5">
                        <div class="progress-bar bg-info w-100" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <div class="row mt-2 mb-0">
                        <a onclick="total()" data-toggle="collapse" href="#rowTotal" class="m-auto">Show More <i class="fa fa-arrow-circle-right"></i></a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-sm-6 col-md-3 grid-margin stretch-card card-tile">
                  <div class="card">
                    <div class="card-body">
                      <div class="d-flex justify-content-between pb-2">
                        <h5>Standard</h5>
                        <!-- <i class="icon-pie-chart"></i> -->
                      </div>
                      <div class="d-flex float-right">
                        <h3><?php echo $totstandard;  ?></h3>
                        <!-- <p class="text-muted">Avg. Session</p>
                        <p class="text-muted">max: 120</p> -->
                      </div>
                      <div class="progress progress-md mt-5">
                        <div class="progress-bar bg-success" style="width:<?php echo round(100 - ((($total-$totstandard)*100)/$total)); ?>%;" role="progressbar" aria-valuenow="<?php echo round(100 - ((($total-$totstandard)*100)/$total)); ?>" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <div class="row mt-2 mb-0">
                        <a onclick="standard()" data-toggle="collapse" href="#rowStandard" class="m-auto">Show More <i class="fa fa-arrow-circle-right"></i></a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-sm-6 col-md-3 grid-margin stretch-card card-tile">
                  <div class="card">
                    <div class="card-body">
                      <div class="d-flex justify-content-between pb-2">
                        <h5>Premium</h5>
                        <!-- <i class="icon-wallet"></i> -->
                      </div>
                      <div class="d-flex float-right">
                        <h3><?php echo $totpremium; ?></h3>
                        <!-- <p class="text-muted">Avg. Session</p>
                        <p class="text-muted">max: 54</p> -->
                      </div>
                      <div class="progress progress-md mt-5">
                        <div class="progress-bar bg-danger" style="width:<?php echo round(100 - ((($total-$totpremium)*100)/$total)); ?>%;" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <div class="row mt-2 mb-0">
                        <a onclick="premium()" data-toggle="collapse" href="#rowPremium" class="m-auto">Show More <i class="fa fa-arrow-circle-right"></i></a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-sm-6 col-md-3 grid-margin stretch-card card-tile">
                  <div class="card">
                    <div class="card-body">
                      <div class="d-flex justify-content-between pb-2">
                        <h5>Suspended Companies</h5>
                        <!-- <i class="icon-screen-desktop"></i> -->
                      </div>
                      <div class="d-flex float-right">
                        <h3><?php echo $totsuspend; ?></h3>
                        <!-- <p class="text-muted">Avg. Session</p>
                        <p class="text-muted">max: 143</p> -->
                      </div>
                      <div class="progress progress-md mt-5">
                        <div class="progress-bar bg-warning " style="width:<?php echo round(100 - ((($total-$totsuspend)*100)/$total)); ?>%;" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <div class="row mt-2 mb-0">
                        <a onclick="suspend()" data-toggle="collapse" href="#rowSuspend" class="m-auto">Show More <i class="fa fa-arrow-circle-right"></i></a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div id="rowTotal" class="row collapse show">
            <div class="card col-md-12 grid-margin">
              <div class="card-body">
                <h4 class="card-title">Total Perusahaan</h4>
                <div class="row">
                  <div class="col-12 table-responsive">
                    <table id="tableTotal" class="table">
                      <thead>
                        <tr class="text-center">
                          <!-- <th>No</th> -->
                          <th style="width: 20%">Nama Perusahaan</th>
                          <th style="width: 20%">Penanggung Jawab</th>
                          <th style="width: 50%">Alamat</th>
                          <th style="width: 10%">Jumlah Pemakai</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($view as $key => $value) { ?>
                        <tr class="text-center">
                          <td><?php echo $value->companyname; ?></td>
                          <td><?php echo $value->penanggungjawab; ?></td>
                          <td>
                            <?php $address = $this->db->get_where('address_company',['idcompany'=>$value->idcompany])->result();
                            foreach ($address as $ky => $val) { ?>
                              <div style="margin-bottom: 10px;">
                              <?php echo $val->addcompany; ?>
                              </div>
                            <?php }?>
                          </td>
                          <td><?php echo $value->jlhpemakai; ?></td>
                        </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div id="rowStandard" class="row collapse">
            <div class="card col-md-12 grid-margin">
              <div class="card-body">
                <h4 class="card-title">Paket Standard</h4>
                <div class="row">
                  <div class="col-12 table-responsive">
                    <table id="tableStandard" class="table">
                      <thead>
                        <tr class="text-center">
                          <!-- <th>No</th> -->
                          <th style="width: 20%">Nama Perusahaan</th>
                          <th style="width: 20%">Penanggung Jawab</th>
                          <th style="width: 50%">Alamat</th>
                          <th style="width: 10%">Jumlah Pemakai</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($standard as  $val) { ?>
                        <tr class="text-center">
                          <td><?php echo $val->companyname; ?></td>
                          <td><?php echo $val->penanggungjawab; ?></td>
                          <td>
                            <?php $add = $this->db->get_where('address_company',['idcompany'=>$val->idcompany])->result();
                            foreach ($add as $std) { ?>
                              <div style="margin-bottom: 10px;">
                              <?php echo $std->addcompany; ?>
                              </div>
                            <?php } ?>
                          </td>
                          <td><?php echo $val->jlhpemakai; ?></td>
                        </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div id="rowPremium" class="row collapse">
            <div class="card col-md-12 grid-margin">
              <div class="card-body">
                <h4 class="card-title">Paket Premium</h4>
                <div class="row">
                  <div class="col-12 table-responsive">
                    <table id="tablePremium" class="table">
                      <thead>
                        <tr class="text-center">
                          <!-- <th>No</th> -->
                          <th style="width: 20%">Nama Perusahaan</th>
                          <th style="width: 20%">Penanggung Jawab</th>
                          <th style="width: 50%">Alamat</th>
                          <th style="width: 10%">Jumlah Pemakai</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($premium as  $val) { ?>
                        <tr class="text-center">
                          <td><?php echo $val->companyname; ?></td>
                          <td><?php echo $val->penanggungjawab; ?></td>
                          <td>
                            <?php $add = $this->db->get_where('address_company',['idcompany'=>$val->idcompany])->result();
                            foreach ($add as $std) { ?>
                              <div style="margin-bottom: 10px;">
                              <?php echo $std->addcompany; ?>
                              </div>
                            <?php } ?>
                          </td>
                          <td><?php echo $val->jlhpemakai; ?></td>
                        </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div id="rowSuspend" class="row collapse">
            <div class="card col-md-12 grid-margin">
              <div class="card-body">
                <h4 class="card-title">Perusahaan Suspend</h4>
                <div class="row">
                  <div class="col-12 table-responsive">
                    <table id="tableSuspend" class="table">
                      <thead>
                        <tr class="text-center">
                          <!-- <th>No</th> -->
                          <th style="width: 20%">Nama Perusahaan</th>
                          <th style="width: 20%">Penanggung Jawab</th>
                          <th style="width: 50%">Alamat</th>
                          <th style="width: 10%">Jumlah Pemakai</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($suspend as  $val) { ?>
                        <tr class="text-center">
                          <td><?php echo $val->companyname; ?></td>
                          <td><?php echo $val->penanggungjawab; ?></td>
                          <td>
                            <?php $add = $this->db->get_where('address_company',['idcompany'=>$val->idcompany])->result();
                            foreach ($add as $std) { ?>
                              <div style="margin-bottom: 10px;">
                              <?php echo $std->addcompany; ?>
                              </div>
                            <?php } ?>
                          </td>
                          <td><?php echo $val->jlhpemakai; ?></td>
                        </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                  </div>
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
    $(document).ready(function () {
        $('#tableTotal').dataTable();
        $('#tableStandard').dataTable();
        $('#tablePremium').dataTable();
        $('#tableSuspend').dataTable();
    });

    function total(){
        if ($('#rowStandard').collapse({toggle: true}) || $('#rowPremium').collapse({toggle: true}) || $('#rowSuspend').collapse({toggle: true})) {
            $('#rowStandard').collapse('hide');
            $('#rowPremium').collapse('hide');
            $('#rowSuspend').collapse('hide');
        }
    }

    function standard(){
        if ($('#rowTotal').collapse({toggle: true}) || $('#rowPremium').collapse({toggle: true}) || $('#rowSuspend').collapse({toggle: true})) {
            $('#rowTotal').collapse('hide');
            $('#rowPremium').collapse('hide');
            $('#rowSuspend').collapse('hide');
        }
    }

    function premium(){
        if ($('#rowTotal').collapse({toggle: true}) || $('#rowStandard').collapse({toggle: true}) || $('#rowSuspend').collapse({toggle: true})) {
            $('#rowTotal').collapse('hide');
            $('#rowStandard').collapse('hide');
            $('#rowSuspend').collapse('hide');
        }
    }

    function suspend(){
        if ($('#rowTotal').collapse({toggle: true}) || $('#rowStandard').collapse({toggle: true}) || $('#rowPremium').collapse({toggle: true})) {
            $('#rowTotal').collapse('hide');
            $('#rowStandard').collapse('hide');
            $('#rowPremium').collapse('hide');
        }
    }
</script>
