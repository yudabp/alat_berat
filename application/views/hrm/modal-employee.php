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
                    foreach($roles as $role){
                    ?>
                    <div class="form-radio">
                      <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="role[]" id="hrd" value="<?= $role->id?>"><?= $role->name ?>
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
                          <label for="city">City</label>
                          <input type="text" name="city" id="city" class="form-control" placeholder="City">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="state">State</label>
                          <select name="state" id="state" class="single-select form-control">
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