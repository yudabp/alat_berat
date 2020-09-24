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
              <h4 class="page-title">Settings</h4>
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
            <div class="col-md-4">
                <!-- <div class="row"> -->
                <form class="form" method="post" action="<?php echo base_url(); ?>uptSetting" id="tambah" enctype="multipart/form-data">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title d-flex">Photo
                        <!-- <small class="ml-auto align-self-end">
                          <a href="dropify.html" class="font-weight-light" target="_blank">More dropify examples</a>
                        </small> -->
                      </h4>
                      <input type="file" class="dropify" name="photo"/ data-default-file="<?php echo base_url('assets/company/'.$info->comphoto) ?>">
                      <small><i>Insert Photos Here for the Company Logo</i></small>
                    </div>
                  </div>
                <!-- </div> -->
            </div>
            <div class="card col-md-8">
              <div class="card-title row mt-2 mb-0">
                <div class="col-md-12 text-right">
                  <button class="btn btn-icons btn-inverse-success" id="buttonModal" data-toggle="modal" data-target="#formLocation"><i class="fa fa-plus"></i></button>
                </div>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="nama_perusahaan">Company Name</label>
                      <input type="text" name="nama_perusahaan" id="nama_perusahaan" class="form-control form-control-lg" placeholder="Nama Perusahaan" value="<?php echo $info->companyname; ?>">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="hr_manager">HR Manager</label>
                      <input type="text" name="hr_manager" id="hr_manager" class="form-control form-control-lg" placeholder="HR Manager" value="<?php echo $info->penanggungjawab; ?>">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="no_telp">Phone No</label>
                      <input type="text" name="no_telp" id="no_telp" class="form-control form-control-lg" placeholder="No. Telp" value="<?php echo $info->notelp; ?>">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="email">Email</label>
                      <input type="text" name="email" id="email" class="form-control form-control-lg" placeholder="Email" value="<?php echo $info->email; ?>">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="website">Website</label>
                      <input type="text" name="website" id="website" class="form-control form-control-lg" placeholder="Website" value="<?php echo $info->website; ?>">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="company_address">Address</label>
                      <?php foreach ($alladdr as $key => $value) { ?>
                      <textarea type="text" name="company_address" id="company_address" class="form-control form-control-lg" placeholder="Address"><?php echo $value->addcompany; ?></textarea>
                      <?php }  ?>
                      <!-- <div id="alamat" data="1">
                        <?php foreach ($alladdr as $key => $value) { ?>
                        <div class="alamat<?php echo $key+1; ?>">
                          <div class="row mt-2" id="">
                            <div class="col-md-11" >
                              <textarea type="text" name="company_address[]" id="company_address" class="form-control form-control-lg" placeholder="Address"><?php echo $value->addcompany; ?></textarea>
                            </div>
                            <div class="col-md-1">
                              <?php if($key+1 != 1){ ?>
                                <button type="button"  class="btn btn-danger btn-just-icon add btn-sm btnDelete" data="alamat<?php echo $key+1; ?>"><i class="fa fa-minus"></i></button>
                              <?php }else{?>
                                <button type="button" id="btnselect" class="btn btn-success btn-sm"><i class="fa fa-plus"></i></button>
                            <?php } ?>
                            </div>
                          </div>
                        </div>
                        <?php }  ?>
                      </div> -->

                    </div>
                  </div>
                </div>
                <div class="row mt-3 float-right">
                  <button type="submit" class="btn btn-success">Save</button>
                  <button type="button" class="btn btn-light btn-close" data-dismiss="modal">Cancel</button>
                </div>
              </div>
               </form>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->

        <div class="modal fade" id="formLocation" tabindex="-1" role="dialog" aria-labelledby="formStaffLabel" data-backdrop="static" data-keyboard="false">
          <div class="modal-dialog" role="document" style="margin-top: 15px;margin-bottom: 0">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="formStaffLabel">New Location</h5>
                <button type="button" class="close btn-close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form>
              <div class="modal-body">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="label_person_in_charge">Person In Charge</label>
                      <input type="text" list="browsers" name="person_in_charge" id="person_in_charge" class="form-control form-control-lg">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="label_phone_no">Phone No</label>
                      <input type="text" name="phone_no" id="phone_no" class="form-control form-control-lg">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="label_email">Email</label>
                      <input type="email" name="email" id="email" class="form-control form-control-lg">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="label_address">Address</label>
                      <textarea class="form-control" id="address" rows="2" name="address"></textarea>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="label_city">City</label>
                      <input type="text" name="city" id="city" class="form-control form-control-lg">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="label_state">State</label>
                      <input type="text" list="list_state" name="state" id="state" class="form-control form-control-lg">
                      <datalist id="list_state">
                        <option selected="selected" disabled="disabled"> - Select State - </option>
                        <option value="Aceh">Aceh</option>
                        <option value="Bali">Bali</option>
                        <option value="Banten">Banten</option>
                        <option value="Bengkulu">Bengkulu</option>
                        <option value="Gorontalo">Gorontalo</option>
                        <option value="Jakarta">Jakarta</option>
                        <option value="Jambi">Jambi</option>
                        <option value="Jawa Barat">Jawa Barat</option>
                        <option value="Jawa Tengah">Jawa Tengah</option>
                        <option value="Jawa Timur">Jawa Timur</option>
                        <option value="Kalimantan Barat">Kalimantan Barat</option>
                        <option value="Kalimantan Selatan">Kalimantan Selatan</option>
                        <option value="Kalimantan Tengah">Kalimantan Tengah</option>
                        <option value="Kalimantan Timur">Kalimantan Timur</option>
                        <option value="Kalimantan Utara">Kalimantan Utara</option>
                        <option value="Kepulauan Bangka Belitung">Kepulauan Bangka Belitung</option>
                        <option value="Kepulauan Riau">Kepulauan Riau</option>
                        <option value="Lampung">Lampung</option>
                        <option value="Maluku">Maluku</option>
                        <option value="Maluku Utara">Maluku Utara</option>
                        <option value="Nusa Tenggara Timur">Nusa Tenggara Timur</option>
                        <option value="Nusa Tenggara Barat">Nusa Tenggara Barat</option>
                        <option value="Papua">Papua</option>
                        <option value="Papua Barat">Papua Barat</option>
                        <option value="Sulawesi Barat">Sulawesi Barat</option>
                        <option value="Sulawesi Selatan">Sulawesi Selatan</option>
                        <option value="Sulawesi Tengah">Sulawesi Tengah</option>
                        <option value="Sulawesi Tenggara">Sulawesi Tenggara</option>
                        <option value="Sulawesi Utara">Sulawesi Utara</option>
                        <option value="Sumatera Barat">Sumatera Barat</option>
                        <option value="Sumatera Selatan">Sumatera Selatan</option>
                        <option value="Sumatera Utara">Sumatera Utara</option>
                        <option value="Yogyakarta">Yogyakarta</option>
                      </datalist>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="label_zip">ZIP</label>
                      <input type="number" name="zip" id="zip" class="form-control form-control-lg">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="label_country">Country</label>
                      <input type="text" name="country" id="country" class="form-control form-control-lg">
                    </div>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-success">Save location</button>
                <button type="button" class="btn btn-light btn-close" data-dismiss="modal">Cancel</button>
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
?>
<script type="text/javascript">
  var btnaddselect = $('#btnselect');
    var btnDelete;
    var loopID = <?php echo $numadd; ?>;
    btnaddselect.on('click', function(){
      //console.log("ok");
    loopID++;
    var headHtml = $('#alamat');
    var html = `
    <div class="alamat`+loopID+`">
      <div class="row mt-2">
        <div class="col-md-11">
          <textarea type="text" name="company_address[]" id="company_address" class="form-control form-control-lg" placeholder="Address"></textarea>
        </div>
        <div class="col-md-1">
          <button type="button"  class="btn btn-danger btn-just-icon add btn-sm btnDelete" data="alamat`+loopID+`"><i class="fa fa-minus"></i></button>
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

  $(document).ready(function() {
    $('#buttonModal').click(function() {
        $('html').css('overflow', 'hidden');
        $('body').bind('touchmove', function(e) {
            e.preventDefault()
        });
    });
    $('.btn-close').click(function() {
        $('html').css('overflow', 'scroll');
        $('body').unbind('touchmove');
    });

    $('.datepicker').datepicker({
        enableOnReadonly: true,
        todayHighlight: true,
        autoclose: true,
        format: "dd/mm/yyyy"
    });
    $("#phone_no").inputmask({"mask": "(+62)8##-####-####"});
  });
</script>
