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
              <h4 class="page-title">Tambah Perusahaan</h4>
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
            <div class="card col-md-12">
              <form class="saveCom form" method="post" action="#" id="tambah" enctype="multipart/form-data">
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="nama_perusahaan">Nama Perusahaan</label>
                      <input type="text" name="nama_perusahaan" id="nama_perusahaan" class="form-control form-control-lg" placeholder="Nama Perusahaan">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="alamat">Alamat</label>
                      <textarea class="form-control" id="alamat" rows="2" name="alamat"></textarea>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="username">Username</label>
                      <input type="text" name="username" id="username" class="form-control" placeholder="Username">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="password">Password</label>
                      <div class="input-group">
                        <input type="password" name="password" id="password" class="form-control" placeholder="Password" >
                        <span class="input-group-addon input-group-append border-left" style="cursor: pointer;" onclick="showpass()">
                          <span id="eye" class="fa fa-eye-slash input-group-text"></span>
                        </span>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="penanggung_jawab">Penanggung Jawab</label>
                      <input type="text" name="penanggung_jawab" id="penanggung_jawab" class="form-control" placeholder="Penanggung Jawab">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="pemakai_utama">Jumlah Pemakai Utama</label>
                      <input type="number" name="pemakai_utama" id="pemakai_utama" class="form-control" placeholder="Jumlah Pemakai Utama">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="paket">Paket</label>
                      <div class="input-group">
                        <select class="form-control form-control-sm" id="paketSelection" name="paketSelection">
                          <option disabled selected>-- Choose --</option>
                          <option value="Standard">Standard</option>
                          <option value="Premium">Premium</option>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row" style="" id="checkAddons">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="paket">Add-ons</label>
                      <div class="input-group">
                        <div class="form-check form-check-flat mr-3">
                          <label class="form-check-label">
                            <input type="checkbox" name="cargo" id="cargo"  class="form-check-input"> Cargo
                          </label>
                        </div>
                        <div class="form-check form-check-flat mr-3">
                          <label class="form-check-label">
                            <input type="checkbox" name="architecture" id="architecture"  class="form-check-input"> Architecture
                          </label>
                        </div>
                        <div class="form-check form-check-flat mr-3">
                          <label class="form-check-label">
                            <input type="checkbox" name="hospitality" id="hospitality"  class="form-check-input"> Hospitality
                          </label>
                        </div>
                        <div class="form-check form-check-flat mr-3">
                          <label class="form-check-label">
                            <input type="checkbox" name="health" id="health" class="form-check-input" > Health
                          </label>
                        </div>
                        <div class="form-check form-check-flat mr-3">
                          <label class="form-check-label">
                            <input type="checkbox" name="maintenance" id="maintenance" class="form-check-input" > Maintenance
                          </label>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row mt-3 float-right">
                  <button type="submit" class="btn btn-success mr-2" value="Submit">Submit</button>
                  <button type="reset" class="btn btn-light btn-close" value="Reset">Reset</button>
                </div>
              </div>
              </form>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->

<?php
  $this->load->view('template/footer');
  // $this->load->view('template/fixed-plugin');
  $this->load->view('template/js');
  $this->load->view('su/js-crud/crud-company');
  require_once(APPPATH."views/component/message.php");
?>
<script type="text/javascript">
  function showpass() {
    var x = document.getElementById("password");
    var y = document.getElementById("eye");
    // var x = document.getElementsByClassName("password")[0];
    if (x.type == "password") {
        x.type = "text";
        $('#eye').removeClass('fa fa-eye-slash');
        $('#eye').addClass('fa fa-eye');
    } else {
        x.type = "password";
        $('#eye').removeClass('fa fa-eye');
        $('#eye').addClass('fa fa-eye-slash');
    }
  }

  $("#paketSelection").change(function(){
    var value = $(this).val();
    if(value == "Standard"){
      $("#tipeselect").removeAttr("disabled");
      $("#checkAddons").css("display", "block");
    }
    else{
      $("#tipeselect").attr("disabled", "disabled");
      $("#checkAddons").css("display", "none");
    }
  });
</script>
