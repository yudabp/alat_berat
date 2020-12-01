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
              <h4 class="page-title">Log User</h4>
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
            <div class="col-md-6">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Your Login</h4>
                  <table width="100%">
                    <tr>
                      <td width="35%">Waktu Login</td>
                      <td width="10%">:</td>
                      <td width="55%"><?php echo $current_log->waktu?></td>
                    </tr>
                    <tr>
                      <td>IP Address</td>
                      <td>:</td>
                      <td><?php echo $current_log->ip_address?></td>
                    </tr>
                    <tr>
                      <td>Browser</td>
                      <td>:</td>
                      <td><?php echo $current_log->browser?></td>
                    </tr>
                    <tr>
                      <td>Sistem Operasi</td>
                      <td>:</td>
                      <td><?php echo $current_log->sistem_operasi?></td>
                    </tr>
                    <tr>
                      <td>Negara</td>
                      <td>:</td>
                      <td><?php echo $current_log->country?></td>
                    </tr>
                  </table>
                </div>
              </div>
            </div>

            <div class="col-md-6">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Other Users</h4>
                  <?php foreach($all_log as $log){?>
                    <hr>
                    <div class="col-md-12">
                      <?php
                      echo "<span style='color:#999'>[ ".$log->waktu." ]</span> <br>";
                      echo $log->id_user==$this->session->userdata('iduser')?"Anda":$log->username;
                      echo " telah "; 
                      echo $log->type=="Login"?"<b style='color:green'>Login</b>":"<b style='color:red'>Logout</b>";
                      echo " -> ".$log->ip_address." | ".$log->browser." | ".$log->sistem_operasi." | ".$log->country?>
                    </div>
                  <?php }?>
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
