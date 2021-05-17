<div class="modal fade" id="formStaff" tabindex="-1" role="dialog" aria-labelledby="formStaffLabel" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog modal-lg" role="document" style="margin-top: 15px;margin-bottom: 0">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="formStaffLabel">Add Staff</h5>
        <button type="button" class="close btn-close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php echo form_open_multipart('saveemployee',['class'=>'form-sample','id'=>'tambah']); ?>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-4">
            <div class="row grid-margin">
              <div class="card col-md-12">
                <div class="card-body">
                  <h4 class="card-title d-flex">Photo
                    <!-- <small class="ml-auto align-self-end">
                      <a href="dropify.html" class="font-weight-light" target="_blank">More dropify examples</a>
                    </small> -->
                  </h4>
                  <input type="file" class="dropify" name="photo"  />
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
          <div class="col-md-8">
            <div class="card">
              <div class="card-body">
                <!-- <h4 class="card-title">Basic form</h4>
                <p class="card-description">
                  Basic form elements
                </p> -->
                <ul class="nav nav-tabs tab-basic" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="basic-tab" data-toggle="tab" href="#basic" role="tab">Basic</a>
                  </li>
                  <!-- <li class="nav-item">
                    <a class="nav-link" id="work-tab" data-toggle="tab" href="#work" role="tab">Work</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="personal-tab" data-toggle="tab" href="#personal" role="tab">Personal Details</a>
                  </li> -->
                </ul>
                <div class="tab-content tab-content-basic">
                  <div class="tab-pane fade show active" id="basic" role="tabpanel">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="first_name">First Name</label>
                          <input type="text" name="first_name" id="first_name" class="form-control" placeholder="First Name" required>
                          <input type="hidden" name="id" id="mainid">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="middle_name">Middle Name</label>
                          <input type="text" name="middle_name" id="middle_name" class="form-control" placeholder="Middle Name">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="last_name">Last Name</label>
                          <!-- <input type="text" name="last_name" id="last_name" class="form-control" placeholder="Last Name" required> -->
                          <input type="text" name="last_name" id="last_name" class="form-control" placeholder="Last Name">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="employee_id">Employee ID</label>
                          <input type="text" name="employee_id" id="employee_id" class="form-control" placeholder="Employee ID" >
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="email">Email</label>
                          <input type="text" name="email" id="email" class="form-control" placeholder="Email">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="employee_type">Employee Type</label>
                          <select name="employee_type" id="employee_type" class="single-select form-control" >
                            <option selected="selected" disabled="disabled"> - Select Type - </option>
                            <option value="Full Time">Full Time</option>
                            <option value="Part Time">Part Time</option>
                            <option value="Contract">Contract</option>
                            <option value="Trainee">Trainee</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="employee_status">Employee Status</label>
                          <select name="employee_status" id="employee_status" class="single-select form-control" >
                            <option selected="selected" disabled="disabled"> - Select Status - </option>
                            <option value="active">Active</option>
                            <option value="terminated">Terminated</option>
                            <option value="deceased">Deceased</option>
                            <option value="resigned">Resigned</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="date_of_hire">Date of Hire</label>
                          <div class="input-group date datepicker">
                            <input type="text" id="date_of_hire" name="date_of_hire" class="form-control" >
                            <span class="input-group-addon input-group-append border-left">
                              <span class="mdi mdi-calendar input-group-text"></span>
                            </span>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="username">Username</label>
                          <!-- <input type="text" name="username" id="username" class="form-control" placeholder="Username" required> -->
                          <input type="text" name="username" id="username" class="form-control" placeholder="Username">

                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="password">Password</label>
                          <div class="input-group">
                            <!-- <input type="password" name="password" id="password" class="form-control" placeholder="Password" required> -->
                            <input type="password" name="password" id="password" class="form-control" placeholder="Password">
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
                          <label for="department">Department</label>
                          <select name="department" id="department" class="single-select form-control" >
                            <option selected="selected" disabled="disabled"> - Select Department - </option>
                            <?php foreach ($viewdep as $vdep ) {?>
                                <option value="<?php echo $vdep->iddepartment; ?>"><?php echo $vdep->departmenttitle; ?></option>
                            <?php } ?>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="job_title">Job Title</label>
                          <select name="job_title" id="job_title" class="single-select form-control" >
                            <option selected="selected" disabled="disabled"> - Select Tittle - </option>
                            <?php foreach ($viewdes as $vdes ) {?>
                              <option value="<?php echo $vdes->iddesignation; ?>"><?php echo $vdes->designationtitle;?></option>
                            <?php } ?>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="location">Location</label>
                          <select name="location" id="location" class="single-select form-control" >
                            <option selected="selected" disabled="disabled"> - Select Location - </option>
                            <?php foreach ($viewloc as $vloc ) {?>
                              <option value="<?php echo $vloc->branch_id; ?>"><?php echo $vloc->branch;?></option>
                            <?php } ?>
                            <!-- <option value="Full Time">Full Time</option>
                            <option value="Part Time">Part Time</option>
                            <option value="Contract">Contract</option>
                            <option value="Trainee">Trainee</option> -->
                          </select>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="reporting_to">Reporting To</label>
                          <select name="reporting_to" id="reporting_to" class="single-select form-control" >
                            <option selected="selected" disabled="disabled"> - Select - </option>
                            <?php foreach ($viewlead as $vlead ) {?>
                                <option value="<?php echo $vlead->iddepartment; ?>"><?php echo $vlead->departmentlead; ?></option>
                            <?php } ?>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="source_of_hire">Source of Hire</label>
                          <select name="source_of_hire" id="source_of_hire" class="single-select form-control" >
                            <option selected="selected" disabled="disabled"> - Select - </option>
                            <option value="Direct">Direct</option>
                            <option value="Referral">Referral</option>
                            <option value="Web">Web</option>
                            <option value="Newspaper">Newspaper</option>
                            <option value="Social Media">Social Media</option>
                            <option value="Advertisement">Advertisement</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="payrate">Payrate</label>
                          <input type="text" name="payrate" id="payrate" class="form-control" >
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="pay_type">Pay Type</label>
                          <select name="pay_type" id="pay_type" class="single-select form-control" >
                            <option selected="selected" disabled="disabled"> - Select - </option>
                            <option value="Daily">Daily</option>
                            <option value="Weekly">Weekly</option>
                            <option value="Biweekly">Biweekly</option>
                            <option value="Monthly">Monthly</option>
                            <option value="Contract">Contract</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="work_phone">Work Phone</label>
                          <input type="text" name="work_phone" id="work_phone" class="form-control" placeholder="(+62)8__-____-____" >
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="phone">Phone</label>
                          <input type="text" name="phone" id="phone" class="form-control" placeholder="(+62)____-_____">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="hand_phone">Hand Phone</label>
                          <input type="text" name="hand_phone" id="hand_phone" class="form-control" placeholder="(+62)8__-____-____">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="other_email">Other Email</label>
                          <input type="text" name="other_email" id="other_email" class="form-control" placeholder="Other Email">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="date_of_birth">Date of Birth</label>
                          <div class="input-group date datepicker">
                            <input type="text" id="date_of_birth" name="date_of_birth" class="form-control">
                            <span class="input-group-addon input-group-append border-left">
                              <span class="mdi mdi-calendar input-group-text"></span>
                            </span>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="nationality">Nationality</label>
                          <input type="text" name="nationality" id="nationality" class="form-control" placeholder="Nationality">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="gender">Gender</label>
                          <select name="gender" id="gender" class="single-select form-control">
                            <option selected="selected" disabled="disabled"> - Select Gender - </option>
                            <option value="Man">Male</option>
                            <option value="Woman">Female</option>
                            <!-- <option value="Contract">Contract</option>
                            <option value="Trainee">Trainee</option> -->
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="marital_status">Marital Status</label>
                          <select name="marital_status" id="marital_status" class="single-select form-control">
                            <option selected="selected" disabled="disabled"> - Select Status - </option>
                            <option value="Married">Married</option>
                            <option value="Single">Single</option>
                            <!-- <option value="Disvorced">Disvorced</option> -->
                            <option value="Widowed">Widowed</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="driving_license">Driving License</label>
                          <input type="text" name="driving_license" id="driving_license" class="form-control" placeholder="Driving License">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label for="address">Address</label>
                          <textarea name="address" id="address" class="form-control" placeholder="Address"></textarea>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="state">State</label>
                          <select name="state" id="state" class="single-select form-control">
                            <option selected="selected" disabled="disabled"> - Select State - </option>
														<?php
															foreach ($provinsi as $val)
															{
																?>
                            <option value="<?php echo $val->id ?>"><?php echo $val->name ?></option>
														<?php 
															}
															?>
                          </select>
                        </div>
                      </div>
											<div class="col-md-6">
												<div class="form-group">
													<label for="city">City</label>
                          <select name="city" id="city" class="single-select form-control">
													<!-- <input type="text" name="city" id="city" class="form-control" placeholder="City"> -->
													</select>
												</div>
											</div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="zip_code">Zip Code</label>
                          <input type="number" name="zip_code" id="zip_code" class="form-control" placeholder="00000">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="notification">Notification :</label>
                          <div class="form-check form-check-flat">
                            <label class="form-check-label">
                              <input type="checkbox" name="notification" id="notification" class="form-check-input" value="yes" > Send the employee a welcome email.
                            </label>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="tab-pane fade" id="work" role="tabpanel">
                    <div class="float-right">
                      <button type="button" class="btn btn-rounded btn-warning" onclick="back_basic()"><< Back</button>
                      <button type="button" class="btn btn-rounded btn-primary" onclick="next_personal()">Next >></button>
                    </div>
                  </div>
                  <div class="tab-pane fade" id="personal" role="tabpanel">
                  </div>
                </div>
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
