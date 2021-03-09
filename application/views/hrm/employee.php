<?php
    $this->load->view('template/head');
    $this->load->view('template/topbar');
    $this->load->view('template/sidebar');
?>
<style type="text/css">
  .tab-pane{
    background-color: #F8F8F8 !important;
  }
  .font-11{
    font-size: 11px !important;
  }
  .form-control{
    border-color: #A2A2A2;
  }
  .table-bordered{
    border:1.6px solid #E1E1E1 !important;
  }
</style>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row mb-4">
            <div class="col-12 d-flex align-items-center justify-content-between">
              <h4 class="page-title">Employees</h4>
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
            <div class="col-12">
              <div class="card">
                <div class="card-body">
                  <div class="card-title row">
                    <div class="col-md-12 text-right">
                      <button class="btn btn-icons btn-inverse-success" id="buttonModal" data-toggle="modal" data-target="#formStaff"><i class="fa fa-plus"></i></button>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-12 table-responsive">
                      <table id="tableEmployee" class="table">
                        <thead>
                          <tr class="text-center">
                            <!-- <th>No</th> -->
                            <th style="width: 20%">Employee Name</th>
                            <th style="width: 15%">Designation</th>
                            <th style="width: 15%">Department</th>
                            <th style="width: 10%">Type</th>
                            <th style="width: 15%">Joined</th>
                            <th style="width: 15%">Status</th>
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
                                    <!-- <button class="btn btn-link" onclick="viewItem('<?php echo $value->mainid; ?>');"><i class="fa  fa-user-circle-o"></i></button> -->
                                    <a class="btn btn-link" href="<?php echo base_url('detail-employee?id='.$value->mainid); ?>" target="_blank"><i class="fa  fa-user-circle-o"></i></a>
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

        <?php 
          $this->load->view('hrm/modal-employee');
        ?>

        <div class="modal fade" id="detailStaff" tabindex="-1" role="dialog" aria-labelledby="formStaffLabel" data-backdrop="static" data-keyboard="false">
          <div class="modal-dialog modal-lg" role="document" style="margin-top: 15px;margin-bottom: 0">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="formStaffLabel">Detail Staff</h5>
                <button type="button" class="close btn-close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="row">
                  <div class="col-md-4">
                    <div class="row gird-margin">
                      <div class="card col-md-12">
                        <div class="card-body">
                          <h4 class="card-title d-flex">Photo
                          </h4>
                          <center><img src="<?php echo base_url(); ?>assets/staffprofil/defuser.png" class="img-lg rounded-circle" id="userimg"></center>
                        </div>
                      </div>
                    </div>
                    <div class="row grid-margin">
                      <div class="card col-md-12">
                        <div class="card-body">
                          <h4 class="card-title d-flex">User Access</h4>
                          <!-- <div class="form-check">
                            <label class="form-check-label">
                              <input type="checkbox" class="form-check-input" name="allow" value="yes" id="allow"> Allow Application Login
                            </label>
                          </div> -->
                          <div class="form-group">
                            <?php 
                            foreach($roles as $role){
                            ?>
                            <div class="form-radio">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="role[]" id="hrd" value="<?= $role->id ?>"> <?= $role->name."D"?>
                                <i class="input-helper"></i>
                              </label>
                            </div>
                            <?php } ?> 
                          </div>
                        </div>
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
                            <a class="nav-link" id="dework-tab" data-toggle="tab" href="#dework" role="tab">Job</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" id="depersonal-tab" data-toggle="tab" href="#depersonal" role="tab">Leave</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" id="depayroll-tab" data-toggle="tab" href="#depayroll" role="tab">Payroll</a>
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
                                <!-- </table>
                              </div>
                              <div class="col-md-12">
                                <table class="table"> -->
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
                                <!-- </table>
                              </div>
                              <div class="col-md-12">
                                <table class="table"> -->
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

<!--                             <div class="float-right">
                              <button type="button" class="btn btn-rounded btn-primary" onclick="next_workd()">Next >></button>
                            </div> -->
                          </div>
                          <div class="tab-pane fade" id="dework" role="tabpanel">
                            <!-- <div class="card"> -->
                              <!-- <div class="card-body"> -->
                                <h2 style="font-size: 18px;">Employee Main Status</h2>
                                <form class="forms-sample mb-4">
                                  <div class="form-group row">
                                    <label for="employeestatus" class="col-sm-1 col-form-label">Status</label>
                                    <div class="col-sm-3">
                                      <select name="employee-status" id="employee-status" class="single-select form-control" >
                                        <option selected="selected" disabled="disabled"> - Select Status - </option>
                                        <option value="Active">Active</option>
                                        <option value="Terminated">Terminated</option>
                                        <option value="Deceased">Deceased</option>
                                        <option value="Resigned">Resigned</option>
                                      </select>
                                    </div>
                                    <div class="col-sm-2">
                                      <button type="submit" class="btn btn-success btn-block mr-2">Update</button>
                                    </div>
                                  </div>
                                  <!-- <button class="btn btn-light">Cancel</button> -->
                                </form>
                                <div class="row mb-2">
                                  <h2 class="col-sm-10" style="font-size: 18px;" >Employee Status</h2>
                                  <button type="submit" class="col-sm-2 btn btn-success">Update Status</button>
                                </div>
                                <div class="table-responsive mb-5">
                                  <table class="table table-bordered">
                                    <thead>
                                      <tr>
                                        <th>
                                          Date
                                        </th>
                                        <th>
                                          Employe Status
                                        </th>
                                        <th>
                                          Comment
                                        </th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      
                                    </tbody>
                                  </table>
                                </div>
                                <div class="row mb-2">
                                  <h2 class="col-sm-9" style="font-size: 18px;" >Compensation</h2>
                                  <button type="submit" class="col-sm-3 btn btn-success">Update Compensation</button>
                                </div>
                                <div class="table-responsive mb-5">
                                  <table class="table table-bordered">
                                    <thead>
                                      <tr>
                                        <th>
                                          Date
                                        </th>
                                        <th>
                                          Pay Rate
                                        </th>
                                        <th>
                                          Pay Time
                                        </th>
                                        <th>
                                          Change Reason
                                        </th>
                                        <th>
                                          Comment
                                        </th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      
                                    </tbody>
                                  </table>
                                </div>
                                <div class="row mb-2">
                                  <h2 class="col-sm-9" style="font-size: 18px;" >Job Information</h2>
                                  <button type="submit" class="col-sm-3 btn btn-success">Update Job Information</button>
                                </div>
                                <div class="table-responsive mb-5">
                                  <table class="table table-bordered">
                                    <thead>
                                      <tr>
                                        <th>
                                          Date
                                        </th>
                                        <th>
                                          Location
                                        </th>
                                        <th>
                                          Department
                                        </th>
                                        <th>
                                          Job Title
                                        </th>
                                        <th>
                                          Reports To
                                        </th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      
                                    </tbody>
                                  </table>
                                </div>
                              <!-- </div> -->
                            <!-- </div> -->
                              <!-- <div class="float-right">
                                <button type="button" class="btn btn-rounded btn-warning" onclick="back_basicd()"><< Back</button>
                                <button type="button" class="btn btn-rounded btn-primary" onclick="next_personald()">Next >></button>
                              </div> -->
                          </div>
                          <div class="tab-pane fade" id="depersonal" role="tabpanel">
                            <!-- <div class="row"> -->
                                <div class="row mb-2">
                                  <h2 class="col-sm-9" style="font-size: 18px;" >History</h2>
                                  <!-- <button type="submit" class="col-sm-3 btn btn-success">Update Job Information</button> -->
                                </div>
                                <div class="table-responsive mb-5">
                                  <table class="table table-bordered">
                                    <thead>
                                      <tr>
                                        <th>
                                          Date
                                        </th>
                                        <!-- <th>
                                          Policy
                                        </th> -->
                                        <th>
                                          Description
                                        </th>
                                        <th>
                                          Request
                                        </th>
                                        <th>
                                          Status
                                        </th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      
                                    </tbody>
                                  </table>
                                </div>
                            <!-- </div> -->
                            <!-- <div class="float-right">
                              <button type="button" class="btn btn-rounded btn-warning" onclick="back_workd()"><< Back</button>
                              <button type="button" class="btn btn-rounded btn-primary" onclick="next_payrolld()">Next >></button>
                            </div> -->
                          </div>
                          <div class="tab-pane fade" id="depayroll" role="tabpanel">
                            <div class="row">
                              <div class="col-md-6 grid-margin">
                                <div class="card">
                                  <div class="card-body">
                                    <h3 class="card-title mb-4">Detail information at a glance</h3>
                                    <h3 style="font-size: 16px;">Fixed Allowance</h2>
                                    <div class="row pt-2 mb-4" style="background-color: #DDDDDD">
                                      <label class="col-sm-3" style="font-size: 10px;">Pay Item</label>
                                      <div class="col-sm-3">
                                          
                                      </div>
                                      <label class="col-sm-4" style="font-size: 10px;">Pay Item Amount</label>
                                      <div class="col-sm-2">
                                          
                                      </div>
                                    </div>
                                    <h3 style="font-size: 16px;">Fixed Deduction</h2>
                                    <div class="row pt-2 mb-4" style="background-color: #DDDDDD">
                                      <label class="col-sm-3" style="font-size: 10px;">Deduction Item</label>
                                      <div class="col-sm-3">
                                          
                                      </div>
                                      <label class="col-sm-4" style="font-size: 10px;">Deduction Amount</label>
                                      <div class="col-sm-2">
                                          
                                      </div>
                                    </div>
                                    <h3 style="font-size: 16px;">Fixed Tax</h2>
                                    <div class="row pt-2 mb-4" style="background-color: #DDDDDD">
                                      <label class="col-sm-3" style="font-size: 10px;">Tax Caption</label>
                                      <div class="col-sm-3">
                                          
                                      </div>
                                      <label class="col-sm-4" style="font-size: 10px;">Tax Amount</label>
                                      <div class="col-sm-2">
                                          
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-6 grid-margin">
                                <div class="card grid-margin">
                                  <div class="card-body">
                                    <h3 class="card-title">Payroll Basic and Tax Info</h3>
                                    <form class="forms-sample mb-4">
                                      <div class="form-group row">
                                        <label for="tax_number" class="col-sm-5 col-form-label font-11">Employee Tax Number</label>
                                        <div class="col-sm-7">
                                          <input name="tax_number" id="tax_number" class="form-control">
                                        </div>
                                      </div>
                                      <div class="form-group row">
                                        <label for="basic_pay" class="col-sm-5 col-form-label font-11">Basic Pay</label>
                                        <div class="col-sm-7">
                                          <input name="basic_pay" id="basic_pay" class="form-control">
                                        </div>
                                      </div>
                                      <div class="form-group row">
                                        <label for="bank_account_number" class="col-sm-5 col-form-label font-11">Bank Account Number</label>
                                        <div class="col-sm-7">
                                          <input name="bank_account_number" id="bank_account_number" class="form-control">
                                        </div>
                                      </div>
                                      <div class="form-group row">
                                        <label for="bank_account_name" class="col-sm-5 col-form-label font-11">Bank Account Name</label>
                                        <div class="col-sm-7">
                                          <input name="bank_account_name" id="bank_account_name" class="form-control">
                                        </div>
                                      </div>
                                      <div class="form-group row">
                                        <label for="tax_number" class="col-sm-5 col-form-label font-11">Employee Tax Number</label>
                                        <div class="col-sm-7">
                                          <input name="tax_number" id="tax_number" class="form-control">
                                        </div>
                                      </div>
                                      <div class="form-group row">
                                        <label for="bank_name" class="col-sm-5 col-form-label font-11">Bank Name</label>
                                        <div class="col-sm-7">
                                          <input name="bank_name" id="bank_name" class="form-control">
                                        </div>
                                      </div>
                                      <div class="row">
                                        <div class="col-sm-8"></div>
                                        <div class="col-sm-4">
                                          <button type="submit" class="btn btn-success btn-block mr-2">Save</button>
                                        </div>
                                      </div>
                                      <!-- <button class="btn btn-light">Cancel</button> -->
                                    </form>
                                  </div>
                                </div>
                                <div class="card grid-margin">
                                  <div class="card-body">
                                    <h3 class="card-title">Fixed Allowance Payments</h3>
                                    <form class="forms-sample mb-4">
                                      <div class="form-group row">
                                        <label for="pay_item" class="col-sm-5 col-form-label font-11">Pay Item</label>
                                        <div class="col-sm-7">
                                          <select name="pay_item" id="pay_item" class="form-control single-select">
                                            <option selected="selected" disabled="disabled"> - Select Pay Item - </option>
                                          </select>
                                        </div>
                                      </div>
                                      <div class="form-group row">
                                        <label for="pay_item_payment" class="col-sm-5 col-form-label font-11">Pay Item Payment</label>
                                        <div class="col-sm-7">
                                          <input name="pay_item_payment" id="pay_item_payment" class="form-control">
                                        </div>
                                      </div>
                                      <div class="row">
                                        <div class="col-sm-8"></div>
                                        <div class="col-sm-4">
                                          <button type="submit" class="btn btn-success btn-block mr-2">Save</button>
                                        </div>
                                      </div>
                                      <!-- <button class="btn btn-light">Cancel</button> -->
                                    </form>
                                  </div>
                                </div>
                                <div class="card grid-margin">
                                  <div class="card-body">
                                    <h3 class="card-title">Fixed Deductions Payments</h3>
                                    <form class="forms-sample mb-4">
                                      <div class="form-group row">
                                        <label for="deduction_item" class="col-sm-5 col-form-label font-11">Deduction Item</label>
                                        <div class="col-sm-7">
                                          <select name="deduction_item" id="deduction_item" class="form-control single-select">
                                            <option selected="selected" disabled="disabled"> - Select Deduction Item - </option>
                                          </select>
                                        </div>
                                      </div>
                                      <div class="form-group row">
                                        <label for="deduction_payment" class="col-sm-5 col-form-label font-11">Deduction Payment</label>
                                        <div class="col-sm-7">
                                          <input name="deduction_payment" id="deduction_payment" class="form-control">
                                        </div>
                                      </div>
                                      <div class="row">
                                        <div class="col-sm-8"></div>
                                        <div class="col-sm-4">
                                          <button type="submit" class="btn btn-success btn-block mr-2">Save</button>
                                        </div>
                                      </div>
                                      <!-- <button class="btn btn-light">Cancel</button> -->
                                    </form>
                                  </div>
                                </div>
                                <div class="card grid-margin">
                                  <div class="card-body">
                                    <h3 class="card-title">Tax</h3>
                                    <form class="forms-sample mb-4">
                                      <div class="form-group row">
                                        <label for="tax_item" class="col-sm-5 col-form-label font-11">Tax Item</label>
                                        <div class="col-sm-7">
                                          <select name="tax_item" id="tax_item" class="form-control single-select">
                                            <option selected="selected" disabled="disabled"> - Select Tax Item - </option>
                                          </select>
                                        </div>
                                      </div>
                                      <div class="form-group row">
                                        <label for="tax_amount" class="col-sm-5 col-form-label font-11">Tax Amount</label>
                                        <div class="col-sm-7">
                                          <input name="tax_amount" id="tax_amount" class="form-control">
                                        </div>
                                      </div>
                                      <div class="row">
                                        <div class="col-sm-8"></div>
                                        <div class="col-sm-4">
                                          <button type="submit" class="btn btn-success btn-block mr-2">Save</button>
                                        </div>
                                      </div>
                                      <!-- <button class="btn btn-light">Cancel</button> -->
                                    </form>
                                  </div>
                                </div>
                                <div class="card grid-margin">
                                  <div class="card-body">
                                    <h3 class="card-title">Payment Detail</h3>
                                    <form class="forms-sample mb-4">
                                      <div class="form-group row">
                                        <label for="payment_method" class="col-sm-5 col-form-label font-11">Payment Method</label>
                                        <div class="col-sm-7">
                                          <select name="payment_method" id="payment_method" class="form-control single-select">
                                            <option selected="selected" disabled="disabled"> - Select Payment Method - </option>
                                          </select>
                                        </div>
                                      </div>
                                      <div class="row">
                                        <div class="col-sm-8"></div>
                                        <div class="col-sm-4">
                                          <button type="submit" class="btn btn-success btn-block mr-2">Save</button>
                                        </div>
                                      </div>
                                      <!-- <button class="btn btn-light">Cancel</button> -->
                                    </form>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <!-- <div class="float-right">
                              <button type="button" class="btn btn-rounded btn-warning" onclick="back_workd()"><< Back</button>
                              <button type="button" class="btn btn-rounded btn-primary" onclick="next_personal()">Next >></button>
                            </div> -->
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
    $('#work').removeClass('active show');
    $('#work-tab').removeClass('active');
    $('#basic').addClass('active show');
    $('#basic-tab').addClass('active');
  }
  function back_basicd() {
    $('#dework').removeClass('active show');
    $('#dework-tab').removeClass('active');
    $('#debasic').addClass('active show');
    $('#debasic-tab').addClass('active');
  }
  function next_personal() {
    $('#work').removeClass('active show');
    $('#work-tab').removeClass('active');
    $('#personal').addClass('active show');
    $('#personal-tab').addClass('active');
  }
  function next_personald() {
    $('#dework').removeClass('active show');
    $('#dework-tab').removeClass('active');
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
  // $(".single-select").select2({
  //   width: '100%',
  //   dropdownParent: $('#formStaff'),
  // });

  // $('#employee_type').select2({
  //   width: '100%',
  //   dropdownParent: $('#formStaff')
  // });
  // $('#employee_status').select2({
  //   width: '100%',
  //   dropdownParent: $('#formStaff')
  // });
  // $('#department').select2({
  //   width: '100%',
  //   dropdownParent: $('#formStaff')
  // });
  // $('#job_title').select2({
  //   width: '100%',
  //   dropdownParent: $('#formStaff')
  // });
  // $('#location').select2({
  //   width: '100%',
  //   dropdownParent: $('#formStaff')
  // });
  // $('#reporting_to').select2({
  //   width: '100%',
  //   dropdownParent: $('#formStaff')
  // });
  // $('#source_of_hire').select2({
  //   width: '100%',
  //   dropdownParent: $('#formStaff')
  // });
  // $('#pay_type').select2({
  //   width: '100%',
  //   dropdownParent: $('#formStaff')
  // });
  // $('#gender').select2({
  //   width: '100%',
  //   dropdownParent: $('#formStaff')
  // });
  // $('#marital_status').select2({
  //   width: '100%',
  //   dropdownParent: $('#formStaff')
  // });
  // $('#state').select2({
  //   width: '100%',
  //   dropdownParent: $('#formStaff')
  // });

  // if ($(".select-employee").length) {
  //   $(".select-employee").select2({
  //     width: '100%',
  //     dropdownParent: $('#formStaff')
  //   });
  // }
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
        $('#payrate').inputmask({
          alias: 'currency',
          prefix: 'Rp ',
        });
        $("#phone").inputmask({"mask": "(+62)####-#####"});
        $("#work_phone").inputmask({"mask": "(+62)8##-####-####"});
        $("#hand_phone").inputmask({"mask": "(+62)8##-####-####"});
    });

</script>
