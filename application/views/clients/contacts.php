<?php
    $this->load->view('template/head');
    $this->load->view('template/topbar');
    $this->load->view('template/sidebar');
?>
<style type="text/css">
  .btn-link{
    /*background: #ECECEC;*/
    width: 10px;
  }
  .fa-trash-o{
    color: #FB0000;
  }
  .contact-name:hover{
    cursor: pointer;
    color: green;
  }
</style>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row mb-4">
            <div class="col-12 d-flex align-items-center justify-content-between">
              <h4 class="page-title">Contacts</h4>
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
            <div class="col-lg-12">
              <div class="card px-2">
                <div class="card-body">
                  <div class="card-title row">
                    <div class="col-md-12 text-right">
                      <button class="btn btn-icons btn-inverse-success" id="buttonModal" data-toggle="modal" data-target="#formAdd"><i class="fa fa-plus"></i></button>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-12 table-responsive">
                      <table id="tablepay" class="table">
                        <thead>
                          <tr class="text-center">
                            <th>Contact Name</th>
                            <th>Company</th>
                            <!--<th>Country</th>-->
                            <th>Email</th>
                            <th>Phone No</th>
                            <th>Joined</th>
                            <th>Status</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php foreach ($view as $key => $value) { ?>
                          <tr class="text-center">
                            <td><span class="contact-name" onclick="viewItem('<?php echo $value->idcontacts; ?>');"><?php echo $value->first_name." ".$value->last_name; ?></span></td>
                            <td><?php echo $value->company; ?></td>
                            <!--<td></td>-->
                            <td><?php echo $value->email;?></td>
                            <td><?php echo $value->phone_no; ?></td>
                            <td><?php echo $value->joined;?></td>
                            <td>-</td>
                            <td>
                              <button class="btn btn-link" onclick="edtItem('<?php echo $value->idcontacts; ?>');"><i class="fa fa-pencil"></i></button>
                              <button class="btn btn-link" onclick="delItem('<?php echo $value->idcontacts; ?>');"><i class="fa fa-trash-o"></i></button>
                            </td>
                          </tr>
                          <?php } ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                  <!-- <div class="row">
                    <a href="#" class="btn btn-success float-right mt-4">
                    <i class="mdi mdi-pencil mr-1"></i>Create Pay Calendar</a>
                  </div> -->
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
              <?php echo form_open_multipart('saveCon',['class'=>'form-sample','id'=>'tambah']); ?>
              <div class="modal-body">
                <div class="row">
                  <div class="col-md-4">
                    <div class="card">
                      <div class="card-body">
                        <h4 class="card-title d-flex">Photo
                          <!-- <small class="ml-auto align-self-end">
                            <a href="dropify.html" class="font-weight-light" target="_blank">More dropify examples</a>
                          </small> -->
                        </h4>
                        <input type="file" class="dropify" name="photo" id="photo"/>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-8">
                    <div class="card">
                      <div class="card body">
                        <div class="col-md-12 mt-4">
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="first_name">First Name</label>
                                <input type="text" name="first_name" id="first_name" class="form-control form-control-lg" placeholder="First Name">
                                <input type="hidden" id="idnya" name="idnya">
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="last_name">Last Name</label>
                                <input type="text" name="last_name" id="last_name" class="form-control form-control-lg" placeholder="Last Name">
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" name="email" id="email" class="form-control form-control-lg" placeholder="Email">
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="phone_no">Phone No.</label>
                                <!-- <input type="text" name="phone_no" id="phone_no" class="form-control" placeholder="(+62)___-____-____"> -->
                                <input type="text" name="phone_no" id="phone_no" class="form-control" placeholder="Phone No.">
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="job_title">Job Title</label>
                                <input type="text" name="job_title" id="job_title" class="form-control form-control-lg" placeholder="Job Title">
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="company">Company</label>
                                <input type="text" name="company" id="company" class="form-control form-control-lg" placeholder="Company">
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
                                <label for="city">City</label>
                                <input type="text" name="city" id="city" class="form-control form-control-lg" placeholder="City">
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="state">State</label>
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
                              <div class="col-md-12">
                                  <div class="form-group">
                                    <label for="country">Country</label>
                                    <input type="text" name="country" id="country" class="form-control form-control-lg" placeholder="Country">
                                  </div>
                              </div>
                          </div>
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="zip">Zip</label>
                                <input type="text" name="zip" id="zip" class="form-control form-control-lg" placeholder="Zip">
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label>Joined</label>
                                <div id="datepicker-popup" class="input-group date datepicker">
                                  <input type="text" class="form-control form-control-lg" name="joined" id="joined">
                                  <span class="input-group-addon input-group-append border-left">
                                  </span>
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

        <div class="modal fade" id="detailCon" tabindex="-1" role="dialog" aria-labelledby="formStaffLabel" data-backdrop="static" data-keyboard="false">
          <div class="modal-dialog modal-lg" role="document" style="margin-top: 15px;margin-bottom: 0">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="formStaffLabel">Detail Contact</h5>
                <button type="button" class="close btn-close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="row">
                  <div class="col-md-4">
                    <div class="card">
                      <div class="card-body">
                        <h4 class="card-title d-flex">Photo
                        </h4>
                        <center><img src="<?php echo base_url(); ?>assets/staffprofil/defuser.png" class="img-lg rounded-circle" id="userimg"></center>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-8">
                    <div class="card">
                      <div class="card-body">

                        <div class="tab-content tab-content-basic">
                          <div class="tab-pane fade show active" id="debasic" role="tabpanel">
                            <div class="row">
                              <div class="col-md-12">
                                <table class="table">
                                  <tr>
                                    <td>First Name</td>
                                    <td>:</td>
                                    <td><span id="first_named"></span></td>
                                  </tr>
                                  <tr>
                                    <td>Last Name</td>
                                    <td>:</td>
                                    <td><span id="last_named"></span></td>
                                  </tr>
                                  <tr>
                                    <td>Email</td>
                                    <td>:</td>
                                    <td><span id="emaild"></span></td>
                                  </tr>
                                  <tr>
                                    <td>Phone No</td>
                                    <td>:</td>
                                    <td><span id="phone_nod"></span></td>
                                  </tr>
                                  <tr>
                                    <td>Job Title</td>
                                    <td>:</td>
                                    <td><span id="job_titled"></span></td>
                                  </tr>
                                  <tr>
                                    <td>Company</td>
                                    <td>:</td>
                                    <td><span id="companyd"></span></td>
                                  </tr>
                                  <tr>
                                    <td>City</td>
                                    <td>:</td>
                                    <td><span id="cityd"></span></td>
                                  </tr>
                                  <tr>
                                    <td>State</td>
                                    <td>:</td>
                                    <td><span id="stated"></span></td>
                                  </tr>
                                  <tr>
                                    <td>Zip</td>
                                    <td>:</td>
                                    <td><span id="zipd"></span></td>
                                  </tr>
                                  <tr>
                                    <td>Joined</td>
                                    <td>:</td>
                                    <td><span id="joinedd"></span></td>
                                  </tr>
                                  <tr>
                                    <td>Address</td>
                                    <td>:</td>
                                    <td id="loaddatahere"></td>
                                  </tr>
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
              <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-close" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
<?php
  $this->load->view('template/footer');
  // $this->load->view('template/fixed-plugin');
  $this->load->view('template/js');
  $this->load->view('clients/js-crud/crud-contacts');
  require_once(APPPATH."views/component/message.php");
?>
<script type="text/javascript">
  $('#tablepay').DataTable({
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
      // $("#phone_no").inputmask({"mask": "(+62)8##-####-####"});
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
