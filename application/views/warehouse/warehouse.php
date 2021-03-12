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
              <h4 class="page-title">Warehouse</h4>
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
            <div class="col-md-12">
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
                            </div>
                            <div class="tab-pane fade" id="dework" role="tabpanel">
                                <h2 style="font-size: 18px;">Employee Main Status</h2>
                                <form class="forms-sample mb-4">
                                    <div class="form-group row">
                                        <label for="employeestatus" class="col-sm-1 col-form-label">Status</label>
                                        <div class="col-sm-3">
                                            <select name="employee-status" id="employee-status" class="single-select form-control">
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
                                </form>
                                <div class="row mb-2">
                                    <h2 class="col-sm-10" style="font-size: 18px;">Employee Status</h2>
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
                                    <h2 class="col-sm-9" style="font-size: 18px;">Compensation</h2>
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
                                    <h2 class="col-sm-9" style="font-size: 18px;">Job Information</h2>
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
                            </div>
                            <div class="tab-pane fade" id="depersonal" role="tabpanel">
                                <div class="row mb-2">
                                    <h2 class="col-sm-9" style="font-size: 18px;">History</h2>
                                </div>
                                <div class="table-responsive mb-5">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>
                                                    Date
                                                </th>
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
                            </div>
                            <div class="tab-pane fade" id="depayroll" role="tabpanel">
                                <div class="row">
                                    <div class="col-md-6 grid-margin">
                                        <div class="card">
                                            <div class="card-body">
                                                <h3 class="card-title mb-4">Detail information at a glance</h3>
                                                <h3 style="font-size: 16px;">Fixed Allowance</h3>
                                                <div class="row pt-2 mb-4" style="background-color: #DDDDDD">
                                                    <label class="col-sm-3" style="font-size: 10px;">Pay Item</label>
                                                    <div class="col-sm-3">
                                                    </div>
                                                    <label class="col-sm-4" style="font-size: 10px;">Pay Item Amount</label>
                                                    <div class="col-sm-2">
                                                    </div>
                                                </div>
                                                <h3 style="font-size: 16px;">Fixed Deduction</h3>
                                                <div class="row pt-2 mb-4" style="background-color: #DDDDDD">
                                                    <label class="col-sm-3" style="font-size: 10px;">Deduction Item</label>
                                                    <div class="col-sm-3">
                                                    </div>
                                                    <label class="col-sm-4" style="font-size: 10px;">Deduction Amount</label>
                                                    <div class="col-sm-2">
                                                    </div>
                                                </div>
                                                <h3 style="font-size: 16px;">Fixed Tax</h3>
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
