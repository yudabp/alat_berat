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
              <h4 class="page-title">List Perusahaan</h4>
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
            <div class="card col-md-12 grid-margin">
              <div class="card-body">
                <div class="row">
                  <div class="col-12 table-responsive">
                    <table id="tablePerusahaan" class="table">
                      <thead>
                        <tr class="text-center">
                          <th style="width: 10%">Code Perusahaan</th>
                          <th style="width: 20%">Nama Perusahaan</th>
                          <th style="width: 15%">Penanggung Jawab</th>
                          <th style="width: 30%">Alamat</th>
                          <th style="width: 10%">Jumlah Pemakai</th>
                          <th style="width: 10%">Paket</th>
                          <th style="width: 5%">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($view as $key => $value) { ?>
                        <tr class="text-center">
                          <td><?php echo $value->code; ?></td>
                          <td><?php echo $value->companyname; ?></td>
                          <td><?php echo $value->penanggungjawab; ?></td>
                          <td>

                            <?php $address = $this->db->get_where('address_company',['idcompany'=>$value->idcompany])->result();
                            foreach ($address as $ky => $val) {?>
                              <div style="margin-bottom: 10px;">
                              <?php echo $val->addcompany; ?>
                              </div>
                            <?php } ?>

                          </td>
                          <td><?php echo $value->jlhpemakai ?></td>
                          <td><?php echo $value->paket; ?></td>
                          <td>
                            <div class="dropdown">
                              <button type="button" class="btn btn-icons btn-rounded text-center" data-toggle="dropdown">
                                <i class="ti-more-alt"></i>
                              </button>
                              <div class="dropdown-menu">
                                <button class="btn btn-icons btn-inverse-primary" onclick="edtItem('<?php echo $value->idcompany; ?>');"><i class="fa fa-pencil"></i></button>
                                <button class="btn btn-icons btn-inverse-danger" onclick="delItem('<?php echo $value->idcompany; ?>');"><i class="fa fa-trash-o"></i></button>
                                <?php if($value->suspended=="no"){ ?>
                                  <button class="btn btn-icons btn-inverse-warning" onclick="Suspend('<?php echo $value->idcompany; ?>');"><i class="fa fa-power-off"></i></button>
                                <?php } else{?>
                                  <button class="btn btn-icons btn-inverse-success" onclick="unSuspend('<?php echo $value->idcompany; ?>');"><i class="fa fa-circle-o-notch"></i></button>
                                <?php } ?>
                              </div>
                            </div>
                          </td>
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


        <div class="modal fade" id="formAdd" tabindex="-1" role="dialog" aria-labelledby="formStaffLabel" data-backdrop="static" data-keyboard="false">
          <div class="modal-dialog modal-lg" role="document" style="margin-top: 15px;margin-bottom: 0">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="formStaffLabel">Add Contact</h5>
                <button type="button" class="close btn-close" data-dismiss="modal" aria-label="Close" id="btncancel">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form class="form" method="post" action="#" id="tambah" enctype="multipart/form-data">
              <div class="modal-body">
                <div class="row">

                  <div class="col-md-12">
                    <div class="card">
                      <div class="card body">
                        <div class="col-md-12 mt-4">
                          <div class="row">
                            <div class="col-md-12">
                              <div class="form-group">
                                <label for="nama_perusahaan">Nama Perusahaan</label>
                                <input type="text" name="nama_perusahaan" id="nama_perusahaan" class="form-control form-control-lg" placeholder="Nama Perusahaan">
                                <input name="keyword" type="hidden" id="keyword">
                              </div>
                            </div>
                          </div>

                          <div class="row">
                            <div class="col-md-12">
                              <div class="form-group">
                                <label for="address">Address</label>

                                <div id="employees" data="1">
                                  <div class="employees1">

                                    <div class="row" id="selected_employees">
                                      <div class="col-md-10" >
                                        <textarea class="form-control" rows="2" id="address" name="address[]" style="width: 100%;"></textarea>
                                      </div>
                                      <div class="col-md-2">
                                        <button type="button" id="btnselect" class="btn btn-info btn-sm icon-btn ml-4 mb-2"><i class="mdi mdi-plus"></i></button>
                                      </div>
                                    </div>

                                  </div>
                                  <div id="ulang" data="1"></div>
                                </div>

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
                          <div class="row"  id="checkAddons">
                            <div class="col-md-12">
                              <div class="form-group">
                                <label for="paket">Add-ons</label>
                                <div class="input-group">
                                <div class="form-check form-check-flat mr-3">
                                  <label class="form-check-label">
                                    <input type="checkbox" name="cargo" id="cargo" value="Yes" class="form-check-input"> Cargo
                                  </label>
                                </div>
                                <div class="form-check form-check-flat mr-3">
                                  <label class="form-check-label">
                                    <input type="checkbox" name="architecture" id="architecture" value="Yes" class="form-check-input"> Architecture
                                  </label>
                                </div>
                                <div class="form-check form-check-flat mr-3">
                                  <label class="form-check-label">
                                    <input type="checkbox" name="hospitality" id="hospitality" value="Yes"  class="form-check-input"> Hospitality
                                  </label>
                                </div>
                                <div class="form-check form-check-flat mr-3">
                                  <label class="form-check-label">
                                    <input type="checkbox" name="health" id="health" value="Yes" class="form-check-input" > Health
                                  </label>
                                </div>
                                <div class="form-check form-check-flat mr-3">
                                  <label class="form-check-label">
                                    <input type="checkbox" name="maintenance" id="maintenance" value="Yes" class="form-check-input" > Maintenance
                                  </label>
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
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-success" id="btnok">Save</button>
                <button type="button" class="btn btn-light btn-close" id="btncancel" data-dismiss="modal">Cancel</button>
              </div>
              </form>
            </div>
          </div>
        </div>
        <!-- Modal Ends -->

<?php
  $this->load->view('template/footer');
  // $this->load->view('template/fixed-plugin');
  $this->load->view('template/js');
  $this->load->view('su/js-crud/crud-company');
  require_once(APPPATH."views/component/message.php");
?>
<script type="text/javascript">
  $(document).ready(function () {
    $('#tablePerusahaan').dataTable();
  });

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

  var btnaddselect = $('#btnselect');
    var btnDelete;
    var loopID = 1;
    btnaddselect.on('click', function(){
      //console.log("ok");
    loopID++;
    var headHtml = $('#employees');
    var html = `
    <div class="employees`+loopID+`">
      <div class="row mt-2">
        <div class="col-md-10">
          <textarea class="form-control" rows="2" id="address" name="address[]" style="width: 100%;"></textarea>
        </div>
        <div class="col-md-2">
          <button type="button"  class="btn btn-danger btn-just-icon add btn-sm btnDelete" data="employees`+loopID+`"><i class="fa fa-minus"></i></button>
        </div>
      </div>
    </div>
    `;
    headHtml.append(html);
    btnDelete = $('.btnDelete')
    btnDelete.click(function(){
      var id_div = $(this).attr('data');
      console.log(id_div);
      $('.'+id_div).remove();
    });
  });
</script>
