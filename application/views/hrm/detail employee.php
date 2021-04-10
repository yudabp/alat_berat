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
              <h4 class="page-title">Detail Employee</h4>
              <div class="d-flex align-items-center">
                <div class="wrapper mr-4 d-none d-sm-block">
                  <!-- <p class="mb-0">Summary for
                    <b class="mb-0"><i id="bulan"></i> <i id="tahun"></i></b>
                  </p> -->
                </div>
              </div>
            </div>
          </div>
          <div class="row">
                  <div class="col-md-3">
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
													$i = 1;
													foreach($roles as $role){
													?>
													<div class="form-radio">
														<label class="form-check-label">
															<input type="radio" class="form-check-input" name="role" id="role<?= $i ?>" value="<?= $role->id?>"><?= $role->name ?>
															<i class="input-helper"></i>
														</label>
													</div>
													<?php
													$i++;	
													} ?>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-9">
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
                          <!-- <li class="nav-item">
                            <a class="nav-link" id="depayroll-tab" data-toggle="tab" href="#depayroll" role="tab">Payroll</a>
                          </li> -->
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
                                        <option value="active">Active</option>
                                        <option value="terminate">Terminated</option>
                                        <option value="deceased">Deceased</option>
                                        <option value="resigned">Resigned</option>
                                      </select>
                                    </div>
                                    <div class="col-sm-2">
                                      <button type="submit" class="btn btn-success btn-block mr-2">Update</button>
                                    </div>
                                  </div>
                                  <!-- <button class="btn btn-light">Cancel</button> -->
                                </form>
                                <div class="row mb-2 mr-0">
                                  <h2 class="col-sm-8" style="font-size: 18px;" >Employee Status</h2>
                                  <button type="submit" class="col-sm-4 btn btn-success">Update Status</button>
                                </div>
                                <div class="table-responsive mb-5 mr-0">
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
                                <div class="row mb-2 mr-0">
                                  <h2 class="col-sm-8" style="font-size: 18px;" >Compensation</h2>
                                  <button type="submit" class="col-sm-4 btn btn-success">Update Compensation</button>
                                </div>
                                <div class="table-responsive mb-5 mr-0">
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
                                <div class="row mb-2 mr-0">
                                  <h2 class="col-sm-8" style="font-size: 18px;" >Job Information</h2>
                                  <button type="submit" class="col-sm-4 btn btn-success">Update Job Information</button>
                                </div>
                                <div class="table-responsive mb-5 mr-0">
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
                                  <table class="table table-bordered" id="table-leave">
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
                                        <!-- <th>
                                          Status
                                        </th> -->
                                      </tr>
                                    </thead>
                                    <tbody>
																		<?php
																			// $leave = $this->db->select('*')
																			// ->from('leavereq')
																			// ->where('mainid', $id)
																			// ->get();
																			foreach ($leave->result() as $key => $value) { ?>
																				<tr>
																					<td style="width: 30%;"><?php echo $value->fromdate; ?> to <?php echo $value->todate; ?></td>
																					<td style="width: 40%;"><?php echo $value->leavereson; ?></td>
																					<td style="width: 30%;"><?php echo $value->days; ?> days</td>
																				</tr>
																		<?php	
																			}
																		?>
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
        <!-- content-wrapper ends -->

<?php 
  $this->load->view('template/footer');
  // $this->load->view('template/fixed-plugin');
  $this->load->view('template/js');
?>
<script type="text/javascript">
  $(document).ready(function () {
    function getUrlVars(param=null)
    {
      if(param !== null)
      {
        var vars = [], hash;
        var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
        for(var i = 0; i < hashes.length; i++)
        {
          hash = hashes[i].split('=');
          vars.push(hash[0]);
          vars[hash[0]] = hash[1];
        }
        return vars[param];
      } 
      else 
      {
        return null;
      }
    }

		$('#table-leave').DataTable();

    function viewItem(){
    var id = getUrlVars("id");
      $.ajax({
        url : "<?php echo base_url(); ?>viewEmp",
        type: "POST",
        dataType: "JSON",
        data: {
            id : id
        },
        success : function(view){
                // $("#detailStaff").modal("show");
                $("#first_named").html(view.data.fname);
                $("#middle_named").html(view.data.mname);
                $("#last_named").html(view.data.lname);
                $("#employee_idd").html(view.data.employeid);
                $("#emaild").html(view.data.email);
                $("#employee_typed").html(view.data.employetype);
                $("#employee_statusd").html(view.data.employestatus);
                $("#date_of_hired").html(view.data.datehire);
                $("#departmentd").html(view.data.departmenttitle);
                $("#job_titled").html(view.data.designationtitle);
                $("#locationd").html(view.data.location);
                $("#reporting_tod").html(view.data.departmentlead);
                $("#source_of_hired").html(view.data.sourceofhire);
                $("#payrated").html(view.data.payrate);
                $("#pay_typed").html(view.data.paytype);
                $("#work_phoned").html(view.data.workphone);
                $("#phoned").html(view.data.phone);
                $("#hand_phoned").html(view.data.handphone);
                $("#other_emaild").html(view.data.otheremail);
                $("#date_of_birthd").html(view.data.birth);
                $("#nationalityd").html(view.data.nationality);
                $("#genderd").html(view.data.gender);
                $("#marital_statusd").html(view.data.status);
                $("#driving_licensed").html(view.data.drivinglicense);
                $("#addressd").html(view.data.address);
                $("#cityd").html(view.city.name);
                $("#stated").html(view.provinsi.name);
                $("#zip_coded").html(view.data.zipcode);
                $("#mainid").html(view.data.mainid);
								var role = view.data.role_id;
								// console.log(view.city);
								//Job
								$("#employee-status").val(view.data.employestatus);
                var cek = view.data.sendnotif;
                var cekimg = view.data.photo;
                if(cekimg !=""){
                  $("#userimg").attr('src','<?php echo base_url(); ?>assets/staffprofil/'+cekimg);
                }
                if(cek == "yes"){
                  $("#notification").attr('checked','checked');
                }

								if(role == "2dea1ed8-a7c7-4f44-b076-f50b0ca4a851"){
									$("#role1").attr('checked','checked');
								}else if(role == "31279819-6b9f-46c2-a28a-beec145fa31e") {
									$("#role2").attr('checked','checked');
								}else if(role == "35027eed-d317-4bc4-b74f-37e5f7d84544") {
									$("#role3").attr('checked','checked');
								}else if(role == "5073ed9b-00a9-4d18-863b-8fa69988090f") {
									$("#role4").attr('checked','checked');
								}else if(role == "a75f3ed5-0fee-47ad-a7ab-64fbc8c3e7c0") {
									$("#role5").attr('checked','checked');
								}else if(role == "bb91a898-f12b-47a9-94df-6c7c773714f4") {
									$("#role6").attr('checked','checked');
								}else if(role == "c962f62f-d67a-4d87-a476-42a3bfca5dd1") {
									$("#role7").attr('checked','checked');
								}
                // alert(data.fname);
        },
        error : function(jqXHR, textStatus, errorThrown){
          swal({
                title: 'Gagal!',
                text: 'Gagal mengambil data.',
                type: 'error',
                confirmButtonClass: "btn btn-danger",
                buttonsStyling: false
            }).catch(swal.noop);
        }
      });
    }
    viewItem(); 
    // alert(id);
  });
</script>
