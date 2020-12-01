<?php
    $this->load->view('template/head');
    $this->load->view('template/topbar');
    $this->load->view('template/sidebar');
?>
<style type="text/css">

</style>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row mb-4">
            <div class="col-12 d-flex align-items-center justify-content-between">
              <h4 class="page-title">Case</h4>
              <div class="d-flex align-items-center">
                <div class="wrapper mr-4 d-none d-sm-block">
                  <!-- <p class="mb-0">Summary for
                    <b class="mb-0"><i id="bulan"></i> <i id="tahun"></i></b>
                  </p> -->
                </div>
                <!-- <div class="wrapper">
                  <a href="#" class="btn btn-link btn-sm font-weight-bold">
                    <i class="icon-share-alt"></i>Export CSV</a>
                </div> -->
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-body">
                  <div class="card-title row">
                    <div class="col-md-12 text-right">
                      <button class="btn btn-icons btn-inverse-success" id="buttonModal" data-toggle="modal" data-target="#formPatient"><i class="fa fa-plus"></i></button>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-12 table-responsive">
                      <table id="tableEmployee" class="table">
                        <thead>
                          <tr class="text-center">
                            <!-- <th>No</th> -->
                            <th style="width: 15%">Case ID</th>
                            <th style="width: 10%">Case Date</th>
                            <th style="width: 25%">Patient</th>
                            <th style="width: 25%">Doctor</th>
                            <th style="width: 15%">Fee</th>
                            <!-- <th style="width: 15%">Status</th> -->
                            <th style="width: 10%">Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php foreach ($view as $key => $value) { ?>
                            <tr class="text-center">
                              <!-- <td><?php echo $key+1; ?></td> -->
                              <td style="text-align:left;"><?php echo $value->fname." ".$value->mname." ".$value->lname; ?></td>
                              <td><?php echo $value->designationtitle;?></td>
                              <td><?php echo $value->departmenttitle;?></td>
                              <td><?php echo $value->employetype;?></td>
                              <td><?php echo $value->datehire;?></td>
                              <td>Active</td>
                              <td>
                                <div class="dropdown">
                                  <button type="button" class="btn btn-icons btn-rounded text-center" data-toggle="dropdown">
                                    <i class="ti-more-alt"></i>
                                  </button>
                                  <div class="dropdown-menu">
                                    <button class="btn btn-link" onclick="edtItem('<?php echo $value->mainid; ?>');"><i class="fa fa-pencil"></i></button>
                                    <button class="btn btn-link" onclick="delItem('<?php echo $value->mainid; ?>');"><i class="fa fa-trash-o"></i></button>
                                    <button class="btn btn-link" onclick="viewItem('<?php echo $value->mainid; ?>');"><i class="fa  fa-user-circle-o"></i></button>
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
        </div>
        <!-- content-wrapper ends -->

        <div class="modal fade" id="formPatient" tabindex="-1" role="dialog" aria-labelledby="formPatientLabel" data-backdrop="static" data-keyboard="false">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="formPatientLabel">Cases</h5>
                <button type="button" class="close btn-close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <?php echo form_open_multipart('saveemployee',['class'=>'form-sample','id'=>'tambah']); ?>
              <div class="modal-body">
                <div class="row">
                  <div class="col-md-12">
                    <div class="card">
                      <div class="card-body">
                        <!-- <ul class="nav nav-tabs tab-basic" role="tablist">
                          <li class="nav-item">
                            <a class="nav-link active" id="basic-tab" data-toggle="tab" href="#basic" role="tab">Basic</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" id="personal-tab" data-toggle="tab" href="#personal" role="tab">Personal Details</a>
                          </li>
                        </ul> -->
                        <div class="tab-content tab-content-basic">
                          <div class="tab-pane fade show active" id="basic" role="tabpanel">
                            <div class="row">
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label for="case_id">Case ID</label>
                                  <input type="text" name="case_id" id="case_id" class="form-control" placeholder="Case ID" readonly>
                                  <input type="hidden" name="id" id="mainid">
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label for="case_date">Resgistration Date</label>
                                  <div class="input-group date datepicker">
                                    <input type="text" id="case_date" name="case_date" class="form-control" >
                                    <span class="input-group-addon input-group-append border-left">
                                      <span class="mdi mdi-calendar input-group-text"></span>
                                    </span>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <!-- <div class="row">
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label for="first_name">First Name</label>
                                  <input type="text" name="first_name" id="first_name" class="form-control" placeholder="First Name" required>
                                  <input type="hidden" name="id" id="mainid">
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label for="last_name">Last Name</label>
                                  <input type="text" name="last_name" id="last_name" class="form-control" placeholder="Last Name" required>
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label for="bpjs_no">BPJS No.</label>
                                  <input type="text" name="bpjs_no" id="bpjs_no" class="form-control" placeholder="BPJS No." required>
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label for="nik">NIK</label>
                                  <input type="text" name="nik" id="nik" class="form-control" placeholder="NIK" >
                                </div>
                              </div>
                            </div> -->
                            <div class="row">
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label for="patient">Patient</label>
                                  <select name="patient" id="patient" class="single-select form-control" >
                                    <option selected="selected" disabled="disabled"> - Select Pantient - </option>
                                    <!-- <option value="male">Male</option> -->
                                    <!-- <option value="female">Female</option> -->
                                    <!-- <option value="Contract">Contract</option> -->
                                    <!-- <option value="trainee">Trainee</option> -->
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label for="doctor">Doctor</label>
                                  <select name="doctor" id="doctor" class="single-select form-control" >
                                    <option selected="selected" disabled="disabled"> - Select Doctor - </option>
                                    <!-- <option value="single">Single</option> -->
                                    <!-- <option value="maried">Maried</option> -->
                                    <!-- <option value="divorced">Divorced</option> -->
                                    <!-- <option value="trainee">Trainee</option> -->
                                  </select>
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <!-- <div class="col-md-3"></div> -->
                              <div class="col-md-12">
                                <div class="form-group">
                                  <label for="fee">Fee</label>
                                  <input type="text" name="fee" id="fee" class="form-control" placeholder="Fee" >
                                </div>
                              </div>
                              <!-- <div class="col-md-3"></div> -->
                            </div>
                            <div class="float-right">
                              <!-- <button type="button" class="btn btn-rounded btn-success">Submit</button> -->
                              <!-- <button type="button" class="btn btn-rounded btn-primary" onclick="next_personal()">Next >></button> -->
                            </div>
                          </div>
                        </div>
                          <!-- <div class="row" style="border: solid 0.5px #ECECEC; margin-bottom: 10px;"></div> -->
                          <!-- <div class="row" style="border: solid 0.5px #ECECEC; margin-bottom: 10px;"></div> -->
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-success">Submit</button>
                <button type="button" class="btn btn-light btn-close" data-dismiss="modal">Cancel</button>
              </div>
              <?php echo form_close(); ?>
            </div>
          </div>
        </div>
        <!-- Modal Ends -->

        <div class="modal fade" id="detailStaff" tabindex="-1" role="dialog" aria-labelledby="formPatientLabel" data-backdrop="static" data-keyboard="false">
          <div class="modal-dialog modal-lg" role="document" style="margin-top: 15px;margin-bottom: 0">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="formPatientLabel">Detail Staff</h5>
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
                        <ul class="nav nav-tabs tab-basic" role="tablist">
                          <li class="nav-item">
                            <a class="nav-link active" id="debasic-tab" data-toggle="tab" href="#debasic" role="tab">Basic</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" id="dework-tab" data-toggle="tab" href="#dework" role="tab">Work</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" id="depersonal-tab" data-toggle="tab" href="#depersonal" role="tab">Personal Details</a>
                          </li>
                        </ul>
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
                                    <td>Middle Name</td>
                                    <td>:</td>
                                    <td><span id="middle_named"></span></td>
                                  </tr>
                                  <tr>
                                    <td>Last Name</td>
                                    <td>:</td>
                                    <td><span id="last_named"></span></td>
                                  </tr>
                                  <tr>
                                    <td>Employee ID</td>
                                    <td>:</td>
                                    <td><span id="employee_idd"></span></td>
                                  </tr>
                                  <tr>
                                    <td>Email</td>
                                    <td>:</td>
                                    <td><span id="emaild"></span></td>
                                  </tr>
                                  <tr>
                                    <td>Employee Type</td>
                                    <td>:</td>
                                    <td><span id="employee_typed"></span></td>
                                  </tr>
                                  <tr>
                                    <td>Employee Status</td>
                                    <td>:</td>
                                    <td><span id="employee_statusd"></span></td>
                                  </tr>
                                  <tr>
                                    <td>Date of Hire</td>
                                    <td>:</td>
                                    <td><span id="date_of_hired"></span></td>
                                  </tr>
                                </table>
                              </div>
                            </div>

                            <div class="float-right">
                              <button type="button" class="btn btn-rounded btn-primary" onclick="next_workd()">Next >></button>
                            </div>
                          </div>
                          <div class="tab-pane fade" id="dework" role="tabpanel">
                            <div class="row">
                              <div class="col-md-12">
                                <table class="table">
                                  <tr>
                                    <td>Department</td>
                                    <td>:</td>
                                    <td><span id="departmentd"></span></td>
                                  </tr>
                                  <tr>
                                    <td>Job Tittle</td>
                                    <td>:</td>
                                    <td><span id="job_titled"></span></td>
                                  </tr>
                                  <tr>
                                    <td>Location</td>
                                    <td>:</td>
                                    <td><span id="locationd"></span></td>
                                  </tr>
                                  <tr>
                                    <td>Reporting To</td>
                                    <td>:</td>
                                    <td><span id="reporting_tod"></span></td>
                                  </tr>
                                  <tr>
                                    <td>Source of Hire</td>
                                    <td>:</td>
                                    <td><span id="source_of_hired"></span></td>
                                  </tr>
                                  <tr>
                                    <td>Payrate</td>
                                    <td>:</td>
                                    <td><span id="payrated"></span></td>
                                  </tr>
                                  <tr>
                                    <td>Pay Type</td>
                                    <td>:</td>
                                    <td><span id="pay_typed"></span></td>
                                  </tr>
                                  <tr>
                                    <td>Work Phone</td>
                                    <td>:</td>
                                    <td><span id="work_phoned"></span></td>
                                  </tr>
                                </table>
                              </div>


                            <div class="float-right">
                              <button type="button" class="btn btn-rounded btn-warning" onclick="back_basicd()"><< Back</button>
                              <button type="button" class="btn btn-rounded btn-primary" onclick="next_personald()">Next >></button>
                            </div>
                          </div>
                        </div>
                          <div class="tab-pane fade" id="depersonal" role="tabpanel">
                            <div class="row">
                              <div class="col-md-12">
                                <table class="table">
                                  <tr>
                                    <td>Phone</td>
                                    <td>:</td>
                                    <td><span id="phoned"></span></td>
                                  </tr>
                                  <tr>
                                    <td>Hand Phone</td>
                                    <td>:</td>
                                    <td><span id="hand_phoned"></span></td>
                                  </tr>
                                  <tr>
                                    <td>Other Email</td>
                                    <td>:</td>
                                    <td><span id="other_emaild"></span></td>
                                  </tr>
                                  <tr>
                                    <td>Date of Birth</td>
                                    <td>:</td>
                                    <td><span id="date_of_birthd"></span></td>
                                  </tr>
                                  <tr>
                                    <td>Nationality</td>
                                    <td>:</td>
                                    <td><span id="nationalityd"></span></td>
                                  </tr>
                                  <tr>
                                    <td>Gender</td>
                                    <td>:</td>
                                    <td><span id="genderd"></span></td>
                                  </tr>
                                  <tr>
                                    <td>Marital Status</td>
                                    <td>:</td>
                                    <td><span id="marital_statusd"></span></td>
                                  </tr>
                                  <tr>
                                    <td>Driving License</td>
                                    <td>:</td>
                                    <td><span id="driving_licensed"></span></td>
                                  </tr>
                                  <tr>
                                    <td>Address</td>
                                    <td>:</td>
                                    <td><span id="addressd"></span></td>
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
                                    <td>Zip Code</td>
                                    <td>:</td>
                                    <td><span id="zip_coded"></span></td>
                                  </tr>
                                </table>
                              </div>
                            </div>
                            <div class="float-right">
                              <button type="button" class="btn btn-rounded btn-warning" onclick="back_workd()"><< Back</button>
                              <!-- <button type="button" class="btn btn-rounded btn-primary" onclick="next_personal()">Next >></button> -->
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
  $this->load->view("hrm/js-crud/crud-employee");
  require_once(APPPATH."views/component/message.php");
?>
<script type="text/javascript">
  function next_work() {
    $('#basic').removeClass('active show');
    $('#basic-tab').removeClass('active');
    $('#work').addClass('active show');
    $('#work-tab').addClass('active');
  }
  function next_workd() {
    $('#debasic').removeClass('active show');
    $('#debasic-tab').removeClass('active');
    $('#dework').addClass('active show');
    $('#dework-tab').addClass('active');
  }
  function back_basic() {
    $('#personal').removeClass('active show');
    $('#personal-tab').removeClass('active');
    $('#basic').addClass('active show');
    $('#basic-tab').addClass('active');
  }
  function back_basicd() {
    $('#depersonal').removeClass('active show');
    $('#depersonal-tab').removeClass('active');
    $('#debasic').addClass('active show');
    $('#debasic-tab').addClass('active');
  }
  function next_personal() {
    $('#basic').removeClass('active show');
    $('#basic-tab').removeClass('active');
    $('#personal').addClass('active show');
    $('#personal-tab').addClass('active');
  }
  function next_personald() {
    $('#debasic').removeClass('active show');
    $('#debasic-tab').removeClass('active');
    $('#depersonal').addClass('active show');
    $('#depersonal-tab').addClass('active');
  }
  function back_work() {
    $('#personal').removeClass('active show');
    $('#personal-tab').removeClass('active');
    $('#work').addClass('active show');
    $('#work-tab').addClass('active');
  }
  function back_workd() {
    $('#depersonal').removeClass('active show');
    $('#depersonal-tab').removeClass('active');
    $('#dework').addClass('active show');
    $('#dework-tab').addClass('active');
  }
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
  $('#tableEmployee').DataTable({
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
if ($(".datepicker").length) {
    $('.datepicker').datepicker({
      enableOnReadonly: true,
      todayHighlight: true,
      autoclose: true,
      format: "dd/mm/yyyy"
    });
  }
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
        // $("#payrate").inputmask({ alias : "currency", mask : "Rp 0.00" });
        $('#fee').inputmask({
          alias: 'currency',
          prefix: 'Rp ',
        });
        $("#phone").inputmask({"mask": "(+62)############"});
        $("#work_phone").inputmask({"mask": "(+62)8##-####-####"});
        $("#hand_phone").inputmask({"mask": "(+62)8##-####-####"});
    });

</script>
