<?php
    $this->load->view('template/head');
    $this->load->view('template/topbar');
    $this->load->view('template/sidebar');
?>
<style type="text/css">
</style>
<!-- Top -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row mb-4">
            <div class="col-12 d-flex align-items-center justify-content-between">
              <h4 class="page-title">Chart of Account</h4>
              <div class="d-flex align-items-center">
                <div class="wrapper mr-4 d-none d-sm-block">
                  <p class="mb-0">Summary for
                    <b class="mb-0"><i id="bulan"></i> <i id="tahun"></i></b>
                  </p>
                </div>
              </div>
            </div>
          </div>
<!-- End Top -->

<!-- Assets -->          
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-body">
                  <h4>Assets</h4>
                  <div class="card-title row">
                    <div class="col-md-12 text-right">
                      <button class="btn btn-icons btn-inverse-success" id="buttonAssets" data-toggle="modal" data-target="#Modal_Assets"><i class="fa fa-plus"></i></button>
                    </div>                  
                  </div>
                  <div class="row">
                    <div class="col-12 table-responsive">
                      <table id="Assets" class="table">
                        <thead>
                          <tr class="text-center">
                            <th>Code</th>
                            <th>Name</th>
                            <th>Type</th>
                            <th>Entries</th>
                            <th>Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                           <?php  $i=1; foreach ($data as $col) { ?>
                              <tr class="text-center">
                                <td><?php echo $col->code_asset; ?></td>
                                <td><?php echo $col->name_asset; ?></td>
                                <td><?php echo $col->type_asset; ?></td>
                                <td><?php echo $col->entries_asset; ?></td>
                                <td>
                                  <?php if ($col->actions_asset == "system_account") { ?>
                                System Account      
                                  <?php }else {?>
                                    <button class="btn btn-link" data-toggle="modal" onClick="edtCoa('<?php echo $col->id_asset; ?>');"><i class="fa fa-pencil"></i></button>
                                    <button class="btn btn-link"  onclick="delCoa('<?php echo $col->id_asset; ?>');"><i class="fa fa-trash-o"></i></button>
                                  <?php } ?>
                                </td>
                              </tr>
                            <?php $i++; } ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <br>
<!-- content-Assets ends -->
<!-- Assets Modal -->
        <div class="modal fade" id="Modal_Assets" tabindex="-1" role="dialog" aria-labelledby="formStaffLabel" data-backdrop="static" data-keyboard="false">
          <div class="modal-dialog" role="document" style="margin-top: 15px;margin-bottom: 0">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="formStaffLabel">Assets</h5>
                <button type="button" class="close btn-close-assets" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form class="saveDep form" method="post" action="" id="plus" enctype="multipart/form-data">
              <input type="hidden" name="type_data" value="assets">
              <div class="modal-body">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="code_asset">Code</label>
                      <input type="text" name="code_asset" id="code_asset" class="form-control form-control-lg" placeholder="Code">
                    <small>A Unique Code / Number for This Account</small>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="name_asset">Name</label>
                      <input type="text" name="name_asset" id="name_asset" class="form-control form-control-lg" placeholder="Name">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Type</label>
                        <select class="form-control" id="type_asset" name="type_asset">
                            <option selected disabled>Choose</option>
                            <option value="Bank & Cash">Bank & Cash</option>
                            <option value="Current Asset">Current Asset</option>
                            <option value="Non-current Asset">Non-current Asset</option>
                            <option value="Fixed Asset">Fixed Asset</option>
                            <option value="Inventory">Inventory</option>
                            <option value="Prepayment">Prepayment</option>
                        </select>
                    </div>
                  </div>
                </div>
               <div class="row">
                 <div class="col-md-12">
                   <div class="form-group">
                     <label for="entries_asset">Entries</label>
                     <input type="text" list="emp" name="entries_asset" id="entries_asset" class="form-control form-control-lg" placeholder="">                     
                   </div>
                 </div>
                </div>
                <!-- <div class="row">
                 <div class="col-md-12">
                   <div class="form-group">
                     <label for="actions_asset">Actions</label>                     
                     <select class="form-control" name="actions_asset" id="actions_asset">
                     <option value="" disabled="disabled" selected="Choose">Choose</option>
                     <option value="system_account">System Account</option>
                     <option value="edit_delete">Edit - Delete</option>
                     </select>
                   </div>                 
                </div>
               </div> -->
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-success" id="updateData">Create Asset</button>
                <button type="button" class="btn btn-light btn-close-assets" data-dismiss="modal">Cancel</button>
              </div>
            </form>
            </div>
          </div>
        </div>
<!-- Modal-Assets Ends -->


<!-- Liabilities-->
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-body">
                <h4>Liabilities</h4>
                  <div class="card-title row">
                    <div class="col-md-12 text-right">
                      <button class="btn btn-icons btn-inverse-success" id="buttonLiabilities" data-toggle="modal" data-target="#Modal_Liabilities"><i class="fa fa-plus"></i></button>
                    </div>                   
                  </div>
                  <div class="row">
                    <div class="col-12 table-responsive">
                      <table id="Liabilities" class="table">
                        <thead>
                          <tr class="text-center">
                            <th>Code</th>
                            <th>Name</th>
                            <th>Type</th>
                            <th>Entries</th>
                            <th>Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                          
                          <tr class="text-center">
                            <td>200</td>
                            <td>Account Payable</td>
                            <td>Current Liability</td>
                            <td>0</td>
                            <td>System Account</td>
                          </tr>
                          <tr class="text-center">
                            <td>205</td>
                            <td>Accruals</td>
                            <td>Current Liability</td>
                            <td>0</td>
                            <td>
                              <button class="btn btn-link"><i class="fa fa-pencil"></i></button>
                              <button class="btn btn-link"><i class="fa fa-trash-o"></i></button>
                            </td>
                          </tr>
                          <tr class="text-center">
                            <td>210</td>
                            <td>Unpaid Expense Claims</td>
                            <td>Current Liability</td>
                            <td>0</td>
                            <td>System Account</td>
                          </tr>
                          <tr class="text-center">
                            <td>215</td>
                            <td>Wages Payable</td>
                            <td>Current Liability</td>
                            <td>0</td>
                            <td>System Account</td>
                          </tr>
                          <tr class="text-center">
                            <td>216</td>
                            <td>Wages Payable - Payroll</td>
                            <td>Current Liability</td>
                            <td>0</td>
                            <td>
                              <button class="btn btn-link"><i class="fa fa-pencil"></i></button>
                              <button class="btn btn-link"><i class="fa fa-trash-o"></i></button>
                            </td>
                          </tr>
                          <tr class="text-center">
                            <td>220</td>
                            <td>Sales Tax</td>
                            <td>Current Liability</td>
                            <td>0</td>
                            <td>System Account</td>
                          </tr>
                          <tr class="text-center">
                            <td>230</td>
                            <td>Employee Tax Payable</td>
                            <td>Current Liability</td>
                            <td>0</td>
                            <td>
                              <button class="btn btn-link"><i class="fa fa-pencil"></i></button>
                              <button class="btn btn-link"><i class="fa fa-trash-o"></i></button>
                            </td>
                          </tr>
                          <tr class="text-center">
                            <td>235</td>
                            <td>Employee Benefits Payable</td>
                            <td>Current Liability</td>
                            <td>0</td>
                            <td>
                              <button class="btn btn-link"><i class="fa fa-pencil"></i></button>
                              <button class="btn btn-link"><i class="fa fa-trash-o"></i></button>
                            </td>
                          </tr>
                          <tr class="text-center">
                            <td>236</td>
                            <td>Employee Deductions Payable</td>
                            <td>Current Liability</td>
                            <td>0</td>
                            <td>
                              <button class="btn btn-link"><i class="fa fa-pencil"></i></button>
                              <button class="btn btn-link"><i class="fa fa-trash-o"></i></button>
                            </td>
                          </tr>
                          <tr class="text-center">
                            <td>240</td>
                            <td>Income Tax Payable</td>
                            <td>Current Liability</td>
                            <td>0</td>
                            <td>
                              <button class="btn btn-link"><i class="fa fa-pencil"></i></button>
                              <button class="btn btn-link"><i class="fa fa-trash-o"></i></button>
                            </td>
                          </tr>
                          <tr class="text-center">
                            <td>250</td>
                            <td>Suspense</td>
                            <td>Current Liability</td>
                            <td>0</td>
                            <td>
                              <button class="btn btn-link"><i class="fa fa-pencil"></i></button>
                              <button class="btn btn-link"><i class="fa fa-trash-o"></i></button>
                            </td>
                          </tr>
                          <tr class="text-center">
                            <td>255</td>
                            <td>Historical Adjustments</td>
                            <td>Current Liability</td>
                            <td>0</td>
                            <td>System Account</td>
                          </tr>
                          <tr class="text-center">
                            <td>260</td>
                            <td>Rounding</td>
                            <td>Current Liability</td>
                            <td>0</td>
                            <td>System Account</td>
                          </tr>
                          <tr class="text-center">
                            <td>835</td>
                            <td>Revenue Received in Advance</td>
                            <td>Current Liability</td>
                            <td>0</td>
                            <td>
                              <button class="btn btn-link"><i class="fa fa-pencil"></i></button>
                              <button class="btn btn-link"><i class="fa fa-trash-o"></i></button>
                            </td>
                          </tr>
                          <tr class="text-center">
                            <td>855</td>
                            <td>Clearing Account</td>
                            <td>Current Liability</td>
                            <td>0</td>
                            <td>
                              <button class="btn btn-link"><i class="fa fa-pencil"></i></button>
                              <button class="btn btn-link"><i class="fa fa-trash-o"></i></button>
                            </td>
                          </tr>
                          <tr class="text-center">
                            <td>290</td>
                            <td>Loan</td>
                            <td>Non-current Liability</td>
                            <td>0</td>
                            <td>
                              <button class="btn btn-link"><i class="fa fa-pencil"></i></button>
                              <button class="btn btn-link"><i class="fa fa-trash-o"></i></button>
                            </td>
                          </tr>
                          
                          </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>          
          <br>
<!-- content-Liabilities ends -->
<!-- Liabilities Modal -->
        <div class="modal fade" id="Modal_Liabilities" tabindex="-1" role="dialog" aria-labelledby="formStaffLabel" data-backdrop="static" data-keyboard="false">
          <div class="modal-dialog" role="document" style="margin-top: 15px;margin-bottom: 0">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="formStaffLabel">Liabilities</h5>
                <button type="button" class="close btn-close-liabilities" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form class="saveDep form" method="post" action="" id="" enctype="multipart/form-data">
              <div class="modal-body">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="code_liabillities">Code</label>
                      <input type="text" name="code_liabilities" id="code_liabilities" class="form-control form-control-lg" placeholder="Code">
                    <small>A Unique Code / Number for This Account</small>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="name_liabilities">Name</label>
                      <input type="text" name="name_liabilities" id="name_liabilities" class="form-control form-control-lg" placeholder="Name">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="type_liabilities">Type</label>
                        <select class="form-control" id="type_liabilities" name="type_liabilities">
                        <option value="" selected="Choose" disabled="disabled">Choose</option>
                        <option value="">Liability</option>
                        <option value="">Current Liability</option>
                        <option value="">Non-current Liability</option>
                        
                        </select>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="entries_liabilities">Entries</label>
                      <input type="text" list="emp" name="entries_liabilities" id="entries_liabilities" class="form-control form-control-lg" placeholder="">                      
                    </div>
                  </div>
                  <!-- <div class="col-md-6">
                    <div class="form-group">
                      <label for="actions_liabilities">Actions</label>                      
                      <select class="form-control" name="actions_liabilities" id="actions_liabilities">
                      <option value="" disabled="disabled" selected="Choose">Choose</option>
                      <option value="">System Account</option>
                      <option value="">Edit - Delete</option>
                      </select>
                    </div>
                  </div> -->
                </div>
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-success" id="">Create Liabilities</button>
                <button type="button" class="btn btn-light btn-close-liabilities" data-dismiss="modal">Cancel</button>
              </div>
            </form>
            </div>
          </div>
        </div>
<!-- Modal-Liabilities Ends -->


<!-- Expenses-->
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-body">
                <h4>Expenses</h4>
                  <div class="card-title row">
                    <div class="col-md-12 text-right">
                      <button class="btn btn-icons btn-inverse-success" id="buttonExpenses" data-toggle="modal" data-target="#Modal_Expenses"><i class="fa fa-plus"></i></button>
                    </div>                  
                  </div>
                  <div class="row">
                    <div class="col-12 table-responsive">
                      <table id="Expenses" class="table">
                        <thead>
                          <tr class="text-center">
                            <th>Code</th>
                            <th>Name</th>
                            <th>Type</th>
                            <th>Entries</th>
                            <th>Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                          
                          <tr class="text-center">
                            <td>500</td>
                            <td>Cost of Gold Sold</td>
                            <td>Direct Cost</td>
                            <td>0</td>
                            <td>System Account</td>
                          </tr>
                          <tr class="text-center">
                            <td>600</td>
                            <td>Advertising</td>
                            <td>Expense</td>
                            <td>0</td>
                            <td>
                              <button class="btn btn-link"><i class="fa fa-pencil"></i></button>
                              <button class="btn btn-link"><i class="fa fa-trash-o"></i></button>
                            </td>
                          </tr>
                          <tr class="text-center">
                            <td>605</td>
                            <td>Bank Service Charges</td>
                            <td>Expense</td>
                            <td>0</td>
                            <td>
                              <button class="btn btn-link"><i class="fa fa-pencil"></i></button>
                              <button class="btn btn-link"><i class="fa fa-trash-o"></i></button>
                            </td>
                          </tr>
                          <tr class="text-center">
                            <td>610</td>
                            <td>Janitorial Expenses</td>
                            <td>Expense</td>
                            <td>0</td>
                            <td>
                              <button class="btn btn-link"><i class="fa fa-pencil"></i></button>
                              <button class="btn btn-link"><i class="fa fa-trash-o"></i></button>
                            </td>
                          </tr>
                          <tr class="text-center">
                            <td>615</td>
                            <td>Consulting & Accounting</td>
                            <td>Expense</td>
                            <td>0</td>
                            <td>
                              <button class="btn btn-link"><i class="fa fa-pencil"></i></button>
                              <button class="btn btn-link"><i class="fa fa-trash-o"></i></button>
                            </td>
                          </tr>
                          <tr class="text-center">
                            <td>620</td>
                            <td>Entertaiment</td>
                            <td>Expense</td>
                            <td>0</td>
                            <td>
                              <button class="btn btn-link"><i class="fa fa-pencil"></i></button>
                              <button class="btn btn-link"><i class="fa fa-trash-o"></i></button>
                            </td>
                          </tr>
                          <tr class="text-center">
                            <td>624</td>
                            <td>Postage & Delivary</td>
                            <td>Expense</td>
                            <td>0</td>
                            <td>
                              <button class="btn btn-link"><i class="fa fa-pencil"></i></button>
                              <button class="btn btn-link"><i class="fa fa-trash-o"></i></button>
                            </td>
                          </tr>
                          <tr class="text-center">
                            <td>628</td>
                            <td>General Expenses</td>
                            <td>Expense</td>
                            <td>0</td>
                            <td>
                              <button class="btn btn-link"><i class="fa fa-pencil"></i></button>
                              <button class="btn btn-link"><i class="fa fa-trash-o"></i></button>
                            </td>
                          </tr>
                          <tr class="text-center">
                            <td>632</td>
                            <td>Isurance</td>
                            <td>Expense</td>
                            <td>0</td>
                            <td>
                              <button class="btn btn-link"><i class="fa fa-pencil"></i></button>
                              <button class="btn btn-link"><i class="fa fa-trash-o"></i></button>
                            </td>
                          </tr>
                          <tr class="text-center">
                            <td>636</td>
                            <td>Legal Expenses</td>
                            <td>Expense</td>
                            <td>0</td>
                            <td>
                              <button class="btn btn-link"><i class="fa fa-pencil"></i></button>
                              <button class="btn btn-link"><i class="fa fa-trash-o"></i></button>
                            </td>
                          </tr>
                          <tr class="text-center">
                            <td>640</td>
                            <td>Ultilities</td>
                            <td>Expense</td>
                            <td>0</td>
                            <td>System Account</td>
                          </tr>
                          <tr class="text-center">
                            <td>644</td>
                            <td>Automobile Expenses</td>
                            <td>Expense</td>
                            <td>0</td>
                            <td>
                              <button class="btn btn-link"><i class="fa fa-pencil"></i></button>
                              <button class="btn btn-link"><i class="fa fa-trash-o"></i></button>
                            </td>
                          </tr>
                          <tr class="text-center">
                            <td>648</td>
                            <td>Office Expense</td>
                            <td>Expense</td>
                            <td>0</td>
                            <td>System Account</td>
                          </tr>
                          <tr class="text-center">
                            <td>652</td>
                            <td>Printing & Stationary</td>
                            <td>Expense</td>
                            <td>0</td>
                            <td>
                              <button class="btn btn-link"><i class="fa fa-pencil"></i></button>
                              <button class="btn btn-link"><i class="fa fa-trash-o"></i></button>
                            </td>
                          </tr>
                          <tr class="text-center">
                            <td>656</td>
                            <td>Rent</td>
                            <td>Expense</td>
                            <td>0</td>
                            <td>System Account</td>
                          </tr>
                          <tr class="text-center">
                            <td>660</td>
                            <td>Repair & Maintenance</td>
                            <td>Expense</td>
                            <td>0</td>
                            <td>
                              <button class="btn btn-link"><i class="fa fa-pencil"></i></button>
                              <button class="btn btn-link"><i class="fa fa-trash-o"></i></button>
                            </td>
                          </tr>
                          <tr class="text-center">
                            <td>664</td>
                            <td>Wages & Salaries</td>
                            <td>Expense</td>
                            <td>0</td>
                            <td>
                              <button class="btn btn-link"><i class="fa fa-pencil"></i></button>
                              <button class="btn btn-link"><i class="fa fa-trash-o"></i></button>
                            </td>
                          </tr>
                          <tr class="text-center">
                            <td>668</td>
                            <td>Payroll Tax Expense</td>
                            <td>Expense</td>
                            <td>0</td>
                            <td>
                              <button class="btn btn-link"><i class="fa fa-pencil"></i></button>
                              <button class="btn btn-link"><i class="fa fa-trash-o"></i></button>
                            </td>
                          </tr>
                          <tr class="text-center">
                            <td>672</td>
                            <td>Dues & Subscriptions</td>
                            <td>Expense</td>
                            <td>0</td>
                            <td>
                              <button class="btn btn-link"><i class="fa fa-pencil"></i></button>
                              <button class="btn btn-link"><i class="fa fa-trash-o"></i></button>
                            </td> 
                          </tr>
                          <tr class="text-center">
                            <td>676</td>
                            <td>Telephone & Internet</td>
                            <td>Expense</td>
                            <td>0</td>
                            <td>
                              <button class="btn btn-link"><i class="fa fa-pencil"></i></button>
                              <button class="btn btn-link"><i class="fa fa-trash-o"></i></button>
                            </td>
                          </tr>
                          <tr class="text-center">
                            <td>680</td>
                            <td>Travel</td>
                            <td>Expense</td>
                            <td>0</td>
                            <td>
                              <button class="btn btn-link"><i class="fa fa-pencil"></i></button>
                              <button class="btn btn-link"><i class="fa fa-trash-o"></i></button>
                            </td>
                          </tr>
                          <tr class="text-center">
                            <td>684</td>
                            <td>Bad Debts</td>
                            <td>Expense</td>
                            <td>0</td>
                            <td>
                              <button class="btn btn-link"><i class="fa fa-pencil"></i></button>
                              <button class="btn btn-link"><i class="fa fa-trash-o"></i></button>
                            </td>
                          </tr>
                          <tr class="text-center">
                            <td>700</td>
                            <td>Depreciation</td>
                            <td>Depreciation</td>
                            <td>0</td>
                            <td>System Account</td>
                          </tr>
                          <tr class="text-center">
                            <td>710</td>
                            <td>Income Tax Expense</td>
                            <td>Expense</td>
                            <td>0</td>
                            <td>
                              <button class="btn btn-link"><i class="fa fa-pencil"></i></button>
                              <button class="btn btn-link"><i class="fa fa-trash-o"></i></button>
                            </td>
                          </tr>
                          <tr class="text-center">
                            <td>715</td>
                            <td>Employee Benefits Expense</td>
                            <td>Expense</td>
                            <td>0</td>
                            <td>
                              <button class="btn btn-link"><i class="fa fa-pencil"></i></button>
                              <button class="btn btn-link"><i class="fa fa-trash-o"></i></button>
                            </td>
                          </tr>
                          <tr class="text-center">
                            <td>800</td>
                            <td>Interest Expense</td>
                            <td>Expense</td>
                            <td>0</td>
                            <td>
                              <button class="btn btn-link"><i class="fa fa-pencil"></i></button>
                              <button class="btn btn-link"><i class="fa fa-trash-o"></i></button>
                            </td>
                          </tr>
                          <tr class="text-center">
                            <td>810</td>
                            <td>Bank Revaluations</td>
                            <td>Expense</td>
                            <td>0</td>
                            <td>System Account</td>
                          </tr>
                          <tr class="text-center">
                            <td>815</td>
                            <td>Unrealized Currency Gains</td>
                            <td>Expense</td>
                            <td>0</td>
                            <td>System Account</td>
                          </tr>
                          <tr class="text-center">
                            <td>820</td>
                            <td>Realized Currency Gains</td>
                            <td>Expense</td>
                            <td>0</td>
                            <td>System Account</td>
                          </tr>
                          <tr class="text-center">
                            <td>825</td>
                            <td>Sales Discount</td>
                            <td>Expense</td>
                            <td>0</td>
                            <td>System Account</td>
                          </tr>                        
                         
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <br>
<!-- content-Expenses ends -->  
<!-- Expenses Modal -->
        <div class="modal fade" id="Modal_Expenses" tabindex="-1" role="dialog" aria-labelledby="formStaffLabel" data-backdrop="static" data-keyboard="false">
          <div class="modal-dialog" role="document" style="margin-top: 15px;margin-bottom: 0">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="formStaffLabel">Expenses</h5>
                <button type="button" class="close btn-close-expenses" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form class="saveDep form" method="post" action="" id="" enctype="multipart/form-data">
              <div class="modal-body">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="code_expenses">Code</label>
                      <input type="text" name="code_expenses" id="code_expenses" class="form-control form-control-lg" placeholder="Code">
                    <small>A Unique Code / Number for This Account</small>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="name_expenses">Name</label>
                      <input type="text" name="name_expenses" id="name_expenses" class="form-control form-control-lg" placeholder="Name">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="type_expenses">Type</label>
                        <select class="form-control" id="type_expenses" name="type_expenses">
                        <option value="" selected="Choose" disabled="disabled">Choose</option>
                        <option value="">Depreciation</option>
                        <option value="">Direct Cost</option>
                        <option value="">Expense</option>                        
                        </select>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="entries_expenses">Entries</label>
                      <input type="text" list="emp" name="entries_expenses" id="entries_expenses" class="form-control form-control-lg" placeholder="">                      
                    </div>
                  </div>
                  <!-- <div class="col-md-6">
                    <div class="form-group">
                      <label for="actions_expenses">Actions</label>                      
                      <select class="form-control" name="actions_expenses" id="actions_expenses">
                      <option value="" disabled="disabled" selected="Choose">Choose</option>
                      <option value="">System Account</option>
                      <option value="">Edit - Delete</option>
                      </select>
                    </div>
                  </div> -->
                </div>
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-success" id="">Create Expenses</button>
                <button type="button" class="btn btn-light btn-close-expenses" data-dismiss="modal">Cancel</button>
              </div>
            </form>
            </div>
          </div>
        </div>
<!-- Modal-Expenses Ends -->                        


<!-- Income-->
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-body">
                <h4>Income</h4>
                  <div class="card-title row">
                    <div class="col-md-12 text-right">
                      <button class="btn btn-icons btn-inverse-success" id="buttonIncome" data-toggle="modal" data-target="#Modal_Income"><i class="fa fa-plus"></i></button>
                    </div>                  
                  </div>
                  <div class="row">
                    <div class="col-12 table-responsive">
                      <table id="Income" class="table">
                        <thead>
                          <tr class="text-center">
                            <th>Code</th>
                            <th>Name</th>
                            <th>Type</th>
                            <th>Entries</th>
                            <th>Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                          
                          <tr class="text-center">
                            <td>400</td>
                            <td>Sales</td>
                            <td>Revenue</td>
                            <td>0</td>
                            <td>
                              <button class="btn btn-link"><i class="fa fa-pencil"></i></button>
                              <button class="btn btn-link"><i class="fa fa-trash-o"></i></button>
                            </td>
                          </tr>
                          <tr class="text-center">
                            <td>460</td>
                            <td>Interest Income</td>
                            <td>Revenue</td>
                            <td>0</td>
                            <td>
                              <button class="btn btn-link"><i class="fa fa-pencil"></i></button>
                              <button class="btn btn-link"><i class="fa fa-trash-o"></i></button>
                            </td>
                          </tr>
                          <tr class="text-center">
                            <td>470</td>
                            <td>Other Revenue</td>
                            <td>Revenue</td>
                            <td>0</td>
                            <td>
                              <button class="btn btn-link"><i class="fa fa-pencil"></i></button>
                              <button class="btn btn-link"><i class="fa fa-trash-o"></i></button>
                            </td>
                          </tr>
                          <tr class="text-center">
                            <td>475</td>
                            <td>Purchase Discount</td>
                            <td>Fixed Asset</td>
                            <td>0</td>
                            <td>System Account</td>
                          </tr>                                                   
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <br>
<!-- content-Expenses ends -->  
<!-- Income Modal -->
        <div class="modal fade" id="Modal_Income" tabindex="-1" role="dialog" aria-labelledby="formStaffLabel" data-backdrop="static" data-keyboard="false">
          <div class="modal-dialog" role="document" style="margin-top: 15px;margin-bottom: 0">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="formStaffLabel">Income</h5>
                <button type="button" class="close btn-close-income" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form class="saveDep form" method="post" action="" id="" enctype="multipart/form-data">
              <div class="modal-body">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="code_income">Code</label>
                      <input type="text" name="code_income" id="code_income" class="form-control form-control-lg" placeholder="Code">
                    <small>A Unique Code / Number for This Account</small>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="name_income">Name</label>
                      <input type="text" name="name_income" id="name_income" class="form-control form-control-lg" placeholder="Name">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="type_income">Type</label>
                        <select class="form-control" id="type_income" name="type_income">
                        <option value="" selected="Choose" disabled="disabled">Choose</option>
                        <option value="">Revenue</option>
                        <option value="">Sales</option>
                        <option value="">Other Income</option>                                                
                        </select>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="entries_income">Entries</label>
                      <input type="text" list="emp" name="entries_income" id="entries_income" class="form-control form-control-lg" placeholder="">                      
                    </div>
                  </div>
                  <!-- <div class="col-md-6">
                    <div class="form-group">
                      <label for="actions_income">Actions</label>                      
                      <select class="form-control" name="actions_income" id="actions_income">
                      <option value="" disabled="disabled" selected="Choose">Choose</option>
                      <option value="">System Account</option>
                      <option value="">Edit - Delete</option>
                      </select>
                    </div>
                  </div> -->
                </div>
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-success" id="">Create Income</button>
                <button type="button" class="btn btn-light btn-close-income" data-dismiss="modal">Cancel</button>
              </div>
            </form>
            </div>
          </div>
        </div>
<!-- Modal-Income Ends -->


<!-- Equity-->
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-body">
                <h4>Equity</h4>
                  <div class="card-title row">
                    <div class="col-md-12 text-right">
                      <button class="btn btn-icons btn-inverse-success" id="buttonEquity" data-toggle="modal" data-target="#Modal_Equity"><i class="fa fa-plus"></i></button>
                    </div>                  
                  </div>
                  <div class="row">
                    <div class="col-12 table-responsive">
                      <table id="Equity" class="table">
                        <thead>
                          <tr class="text-center">
                            <th>Code</th>
                            <th>Name</th>
                            <th>Type</th>
                            <th>Entries</th>
                            <th>Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                          
                          <tr class="text-center">
                            <td>300</td>
                            <td>Owners Contribution</td>
                            <td>Equity</td>
                            <td>0</td>
                            <td>
                              <button class="btn btn-link"><i class="fa fa-pencil"></i></button>
                              <button class="btn btn-link"><i class="fa fa-trash-o"></i></button>
                            </td>
                          </tr>
                          <tr class="text-center">
                            <td>310</td>
                            <td>Owners Draw</td>
                            <td>Equity</td>
                            <td>0</td>
                            <td>
                              <button class="btn btn-link"><i class="fa fa-pencil"></i></button>
                              <button class="btn btn-link"><i class="fa fa-trash-o"></i></button>
                            </td>
                          </tr>
                          <tr class="text-center">
                            <td>150</td>
                            <td>Office Equipment</td>
                            <td>Fixed Asset</td>
                            <td>0</td>
                            <td>System Account</td>
                          </tr>
                          <tr class="text-center">
                            <td>320</td>
                            <td>Retairned Earnings</td>
                            <td>Equity</td>
                            <td>0</td>
                            <td>System Account</td>
                          </tr>
                          <tr class="text-center">
                            <td>330</td>
                            <td>Common Stock</td>
                            <td>Equity</td>
                            <td>0</td>
                            <td>
                              <button class="btn btn-link"><i class="fa fa-pencil"></i></button>
                              <button class="btn btn-link"><i class="fa fa-trash-o"></i></button>
                            </td>
                          </tr>                                                   
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <br>
<!-- content-Expenses ends -->  
<!-- Equity Modal -->
        <div class="modal fade" id="Modal_Equity" tabindex="-1" role="dialog" aria-labelledby="formStaffLabel" data-backdrop="static" data-keyboard="false">
          <div class="modal-dialog" role="document" style="margin-top: 15px;margin-bottom: 0">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="formStaffLabel">Equity</h5>
                <button type="button" class="close btn-close-equity" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form class="saveDep form" method="post" action="" id="" enctype="multipart/form-data">
              <div class="modal-body">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="code_equity">Code</label>
                      <input type="text" name="code_equity" id="code_equity" class="form-control form-control-lg" placeholder="Code">
                    <small>A Unique Code / Number for This Account</small>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="name_equity">Name</label>
                      <input type="text" name="name_equity" id="name_equity" class="form-control form-control-lg" placeholder="Name">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="type_equity">Type</label>
                        <select class="form-control" id="type_equity" name="type_equity">
                        <option value="" selected="Choose" disabled="disabled">Choose</option>
                        <option value="">Equity</option>                                                
                        </select>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="entries_equity">Entries</label>
                      <input type="text" list="emp" name="entries_equity" id="entries_equity" class="form-control form-control-lg" placeholder="">                      
                    </div>
                  </div>
                  <!-- <div class="col-md-6">
                    <div class="form-group">
                      <label for="actions_equity">Actions</label>                      
                      <select class="form-control" name="actions_equity" id="actions_equity">
                      <option value="" disabled="disabled" selected="Choose">Choose</option>
                      <option value="">System Account</option>
                      <option value="">Edit - Delete</option>
                      </select>
                    </div>
                  </div> -->
                </div>
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-success" id="">Create Equity</button>
                <button type="button" class="btn btn-light btn-close-equity" data-dismiss="modal">Cancel</button>
              </div>
            </form>
            </div>
          </div>
        </div>
<!-- Modal-Equity Ends --> 


<!-- Edit Assets Modal -->
        <div class="modal fade" id="Edit_Modal_Assets" tabindex="-1" role="dialog" aria-labelledby="formStaffLabel" data-backdrop="static" data-keyboard="false">
          <div class="modal-dialog" role="document" style="margin-top: 15px;margin-bottom: 0">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="formStaffLabel">Edit Assets</h5>
                <button type="button" class="close btn-close-assets" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form class="saveDep form" method="post" action="" id="update" enctype="multipart/form-data">
              <input type="hidden" name="type_data" value="assets" id="novita">
              <div class="modal-body">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="code_asset">Code</label>
                      <input type="text" name="edit_code_asset" id="edit_code_asset" class="form-control form-control-lg" placeholder="Code">
                      <input type="hidden" id="kt_kunci" name="kt_kunci">
                    <small>A Unique Code / Number for This Account</small>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="name_asset">Name</label>
                      <input type="text" name="edit_name_asset" id="edit_name_asset" class="form-control form-control-lg" placeholder="Name">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Type</label>
                        <select class="form-control" id="edit_type_asset" name="edit_type_asset">
                            <option selected disabled>Choose</option>
                            <option value="Bank & Cash">Bank & Cash</option>
                            <option value="Current Asset">Current Asset</option>
                            <option value="Non-current Asset">Non-current Asset</option>
                            <option value="Fixed Asset">Fixed Asset</option>
                            <option value="Inventory">Inventory</option>
                            <option value="Prepayment">Prepayment</option>
                        </select>
                    </div>
                  </div>
                </div>
               <div class="row">
                 <div class="col-md-12">
                   <div class="form-group">
                     <label for="entries_asset">Entries</label>
                     <input type="text" list="emp" name="edit_entries_asset" id="edit_entries_asset" class="form-control form-control-lg" placeholder="">                     
                   </div>
                 </div>
                </div>
                <!-- <div class="row">
                 <div class="col-md-12">
                   <div class="form-group">
                     <label for="actions_asset">Actions</label>                     
                     <select class="form-control" name="actions_asset" id="actions_asset">
                     <option value="" disabled="disabled" selected="Choose">Choose</option>
                     <option value="system_account">System Account</option>
                     <option value="edit_delete">Edit - Delete</option>
                     </select>
                   </div>                 
                </div>
               </div> -->
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-success" id="updateData">Update Asset</button>
                <button type="button" class="btn btn-light btn-close-assets" data-dismiss="modal">Cancel</button>
              </div>
            </form>
            </div>
          </div>
        </div>
<!-- Modal-Assets Ends -->

 <div class="modal fade" id="showDep" tabindex="-1" role="dialog" aria-labelledby="formStaffLabel" data-backdrop="static" data-keyboard="false">
          <div class="modal-dialog modal-lg" role="document" style="margin-top: 15px;margin-bottom: 0">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="">Sub Department</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <table id="subdeptable" class="table">
                  <thead>
                    <tr class="text-center">
                      <th>Department</th>
                      <th>Description</th>
                      <th>Department lead</th>
                      <th>Actions </th>
                    </tr>
                  </thead>
                  <tbody id="loaddatahere">
                  </tbody>
                </table>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
              </div>

            </div>
          </div>
        </div>

<?php
  $this->load->view('template/footer');
  // $this->load->view('template/fixed-plugin');
  $this->load->view('template/js');
  $this->load->view("hrm/js-crud/crud-department");
?>
<script type="text/javascript">
// var assets = $('#Assets');
// var liabilities = $('#Liabilities');
// var expenses = $('#Expenses');
// var income = $('#Income');
// var equity = $('#Equity');

// assets,liabilities,expenses,income,equity.DataTable({
//       "aLengthMenu": [
//         [5, 10, 15, -1],
//         [5, 10, 15, "All"]
//       ],
//       "iDisplayLength": 5,
//       "language": {
//         search: ""
//       },
//     });

  $('#Assets').DataTable({
      "aLengthMenu": [
        [5, 10, 15, -1],
        [5, 10, 15, "All"]
      ],
      "iDisplayLength": 5,
      "language": {
        search: ""
      },
    });

    $('#Liabilities').DataTable({
        "aLengthMenu": [
          [5, 10, 15, -1],
          [5, 10, 15, "All"]
        ],
        "iDisplayLength": 5,
        "language": {
          search: ""
        },
      });
    
    $('#Expenses').DataTable({
      "aLengthMenu": [
        [5, 10, 15, -1],
        [5, 10, 15, "All"]
      ],
      "iDisplayLength": 5,
      "language": {
        search: ""
      },
    });

    $('#Income').DataTable({
      "aLengthMenu": [
        [5, 10, 15, -1],
        [5, 10, 15, "All"]
      ],
      "iDisplayLength": 5,
      "language": {
        search: ""
      },
    });

    $('#Equity').DataTable({
      "aLengthMenu": [
        [5, 10, 15, -1],
        [5, 10, 15, "All"]
      ],
      "iDisplayLength": 5,
      "language": {
        search: ""
      },
    });
    
    $(document).ready(function(){
        $("form").submit(function(e){
            e.preventDefault();
            //alert('test');
            var asw= $(this).attr("id")
            if(asw == "plus"){
                nambah_data();
            }
            else if(asw == "update"){
                var id_upd = $(this).data("id");
                update_dep(id_upd);
            }
        });
    });
    
function nambah_data(){
    var code_asset = $("#code_asset").val();
    var name_asset = $("#name_asset").val();
    var type_asset = $("#type_asset").val();
    var entries_asset = $("#entries_asset").val();
    // var actions_asset = $("#actions_asset").find(":selected").val();
    console.log('code_asset');
    console.log('name_asset');
    console.log('type_asset');
    console.log('entries_asset');
    if(code_asset == "" || name_asset == "" || type_asset == "" || entries_asset == ""){
        swal({
            title: "Data ada yang kosong",
            text: "Tolong lengkapi data",
            type: "warning",
            buttonStyling: false,
            confirmButtonClass: "btn btn-warning"
        }).catch(swal.noop);
    }else{
        //Masukkan Ke Database
            $.ajax({
                url: "http://beta.xavaxx.com/saveCoa",
                type: "POST",
                dataType: "JSON",
                data: {
                    code_asset : code_asset,
                    name_asset : name_asset,
                    type_asset : type_asset,
                    entries_asset : entries_asset
                    // actions_asset : actions_asset
                }
            });
            $("#Modal_Assets").modal("hide");
                swal({
                    title: "Congratulation!",
                    text: "Asset has been added",
                    type: "success",
                    buttonStyling: false,
                    confirmButtonClass: "btn btn-success"
                },function(){
                    location.reload();
                });
            
    }
}

function delCoa(id_asset){
  //alert(id);
  swal({
            title: 'Are you sure ?',
            text: "You will not be able to recover this file!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonClass: 'btn btn-success',
            cancelButtonClass: 'btn btn-danger',
            confirmButtonText: 'Ya, Hapus!',
            buttonsStyling: false
        },function(){
          $.ajax({
            url : "http://beta.xavaxx.com/delCoa",
            type: "POST",
            data: {id : id_asset},
            dataType: "JSON",
            success : function(data){
              swal({
                    title: 'Congratulation',
                    text: 'Data has been deleted',
                    type: 'success',
                    confirmButtonClass: "btn btn-success",
                    buttonsStyling: false
                  },function(){
                      location.reload();
                      });   
                  },
            error:function(){
                swal({
                    title : "Failed",
                    text : "Cannot delete the entire data",
                    type : "error",
                    showCancelButton : false});
                           }
              });
        });
}

function edtCoa(id){
  $("#showDep").modal("hide");
  $.ajax({
    url : "http://beta.xavaxx.com/edit_coa",
    type: "POST",
    dataType: "JSON",
    data: {
        id : id
    },
    success : function(data){
            $("#Edit_Modal_Assets").modal("show");
            $('#novita').val(data.itulah.id_asset);
            $("#kt_kunci").val(data.itulah.id_asset);
            $("#updateData").text("Update Asset");
    },
    error : function(jqXHR, textStatus, errorThrown){
      swal({
            title: 'Gagal!',
            text: 'Gagal mengambil data.',
            type: 'error',
            confirmButtonClass: "btn btn-danger",
            buttonsStyling: false
        }).catch(swal.noop)
    }
  });
}

function update_dep(id){
  //alert('ok');
  var code = $("#edit_code_asset").val();
  var name = $("#edit_name_asset").val();
  var type = $("#edit_type_asset").val();
  var entries = $("#edit_entries_asset").val();
  var id_asset = $("#kt_kunci").val();
  if(code == "" || name == "" || type == "" || entries == ""){
      swal({
        title: "Data ada yang kosong!",
          text: "Tolong lengkapi data.",
          type: "warning",
          icon: 'warning',
          buttonsStyling: false,
          confirmButtonClass: "btn btn-warning"
      }).catch(swal.noop);
  }else{
      //Memulai memasukan data ke database
    $.ajax({
      url : "http://beta.xavaxx.com/uptCoa",
            type: "POST",
            dataType: "JSON",
            data: {
                code : code,
                name : name,
                type : type,
                entries : entries,
                id : id_asset
            }
    });
    $("#Modal_Assets").modal("hide");
      swal({
          title: "Congratulation!",
          text: "Asset has been updated",
          type: "success",
          icon: 'success',
          buttonsStyling: false,
          confirmButtonClass: "btn btn-success"
      },function(){
        location.reload();
      });
      //alert('ok');
  }
}
    
  $(document).ready(function() {
    $('#buttonAssets').click(function() {
        $('html').css('overflow', 'hidden');
        $('body').bind('touchmove', function(e) {
            e.preventDefault()
        });
    });
    $('.btn-close-assets').click(function() {
        $('html').css('overflow', 'scroll');
        $('body').unbind('touchmove');
    });
  });

  $(document).ready(function() {
    $('#buttonLiabilities').click(function() {
        $('html').css('overflow', 'hidden');
        $('body').bind('touchmove', function(e) {
            e.preventDefault()
        });
    });
    $('.btn-close-liabilities').click(function() {
        $('html').css('overflow', 'scroll');
        $('body').unbind('touchmove');
    });
  });

  $(document).ready(function() {
    $('#buttonExpenses').click(function() {
        $('html').css('overflow', 'hidden');
        $('body').bind('touchmove', function(e) {
            e.preventDefault()
        });
    });
    $('.btn-close-expenses').click(function() {
        $('html').css('overflow', 'scroll');
        $('body').unbind('touchmove');
    });
  });

  $(document).ready(function() {
    $('#buttonIncome').click(function() {
        $('html').css('overflow', 'hidden');
        $('body').bind('touchmove', function(e) {
            e.preventDefault()
        });
    });
    $('.btn-close-income').click(function() {
        $('html').css('overflow', 'scroll');
        $('body').unbind('touchmove');
    });
  });

  $(document).ready(function() {
    $('#buttonEquity').click(function() {
        $('html').css('overflow', 'hidden');
        $('body').bind('touchmove', function(e) {
            e.preventDefault()
        });
    });
    $('.btn-close-equity').click(function() {
        $('html').css('overflow', 'scroll');
        $('body').unbind('touchmove');
    });
  });

        // "bSort" : false,
        // "dom": 'Bfrtip',
        // "buttons": [
        //   'copy', 'csv', 'excel', 'pdf', 'print'
        // ]

</script>

