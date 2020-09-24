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
</style>
<!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row mb-4">
            <div class="col-12 d-flex align-items-center justify-content-between">
              <h4 class="page-title">Bank Account</h4>
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
          <div class="row" style="margin-bottom: 10px;">
            <div class="col-md-12">
              <div class="card">
                <!-- <div class="card-body">
                  <div class="row">
                    <div class="col-md-12">           
                      <div class="row">
                        <div class="col-lg-12">
                          <div class="card px-2"> -->
                            <div class="card-body">
                              <div class="card-title row">
                                <h4 class="col-md-6">Petty Cash Balance : Rp 0</h4>
                                <div class="col-md-6 text-right">
                                <ul class="nav nav-pills nav-pills-success" role="tablist">
                                  <div class="card-title row">
                                    <div class="col-md-12 text-right">
                                    <button class="btn btn-inverse-success" id="buttonIncome" data-toggle="modal" data-target="#Modal_Receive">Receive Money</button>
                                    </div>
                                  </div>
                                  <div class="card-title row">
                                    <div class="col-md-12 text-right">
                                      <button class="btn btn-inverse-success" id="buttonSpend" data-toggle="modal" data-target="#Modal_Spend">Spend Money</button>
                                    </div>
                                  </div>
                                  <div class="card-title row">
                                    <div class="col-md-12 text-right">
                                      <button class="btn btn-inverse-success" id="buttonTransfer" data-toggle="modal" data-target="#Modal_Transfer">Transfer Money</button>
                                    </div>
                                  </div>   
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-12">
                                    
                                        <div class="card-header card-header-icon card-header-rose" style="background: none"">
                                            <div class="card-icon">
                                                <i class="material-icons">Account No.</i>
                                            </div>
                                        </div>                                                                                        
                                        <div class="card-body">
                                            <div id="multipleBarsChart2" class="ct-chart">
                                              <div>
                                                <br>1.
                                                <br><hr style="margin-top: 5px;">2.
                                                <br><hr style="margin-top: 5px;">3.
                                                <br><hr style="margin-top: 5px;">4.
                                                <br><hr style="margin-top: 5px;">5.
                                                <br><hr style="margin-top: 5px;">6.
                                                <br><hr style="margin-top: 5px;">
                                              </div>
                                            </div>
                                        </div>                                    
                                </div>
                              </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  
                    
<!-- End Petty Cash -->

<!-- Saving Account -->
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="card px-2">
                        <div class="card-body">
                          <div class="card-title row">
                            <h4 class="col-md-6">Saving Account Balance : Rp 0</h4>
                              <div class="col-md-6 text-right">
                                <ul class="nav nav-pills nav-pills-success" role="tablist">
                                  <div class="card-title row">
                                    <div class="col-md-12 text-right">
                                    <button class="btn btn-inverse-success" id="buttonModal" data-toggle="modal" data-target="#formStaff">Receive Money</button>
                                    </div>
                                  </div>
                                  <div class="card-title row">
                                    <div class="col-md-12 text-right">
                                      <button class="btn btn-inverse-success" id="buttonModal" data-toggle="modal" data-target="#formStaff">Spend Money</button>
                                    </div>
                                  </div>
                                  <div class="card-title row">
                                    <div class="col-md-12 text-right">
                                      <button class="btn btn-inverse-success" id="buttonModal" data-toggle="modal" data-target="#formStaff">Transfer Money</button>
                                    </div>
                                  </div>
                                </ul>
                              </div>
                          </div>
                          <div class="row">
                                <div class="col-md-12">
                                  
                                    <div class="card-header card-header-icon card-header-rose" style="background: none">
                                        <div class="card-icon">
                                            <i class="material-icons">Account No.</i>
                                        </div>
                                        
                                    </div>
                                    <div class="card-body">
                                        <div id="multipleBarsChart1" class="ct-chart">
                                              <div>
                                                <br>1.
                                                <br><hr style="margin-top: 5px;">2.
                                                <br><hr style="margin-top: 5px;">3.
                                                <br><hr style="margin-top: 5px;">4.
                                                <br><hr style="margin-top: 5px;">5.
                                                <br><hr style="margin-top: 5px;">6.
                                                <br><hr style="margin-top: 5px;">
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
                      
<!-- End Saving Account-->
                       
<!-- Modal Receive Money -->
          <div class="modal fade" id="Modal_Receive" tabindex="-1" role="dialog" aria-labelledby="formStaffLabel" data-backdrop="static" data-keyboard="false">
          <div class="modal-dialog modal-lg" role="document" style="margin-top: 15px;margin-bottom: 0">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="formStaffLabel">Receive Money</h5>
                <button type="button" class="close btn-close-receive" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="customer">Customer</label>
                      <select class="form-control form-control-sm" id="customer">
                        <option selected="selected" disabled="disabled"> - Select Customer - </option>
                      </select>
                      <button class="btn btn-link" style="font-size: 13px;"><a href="#">Create New</a></button>
                    </div>

                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="exampleFormControlSelect2">Reference</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text">#</span>
                        </div>
                        <input type="text" class="form-control" placeholder="Reference" aria-label="Reference">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="invoice_no">Invoice No.</label>
                      <input type="text" name="invoice_no" id="invoice_no" class="form-control form-control-lg" placeholder="Invoice No.">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Payment Date</label>
                      <div id="datepicker-popup" class="input-group date datepicker">
                        <input type="text" class="form-control form-control-lg">
                        <span class="input-group-addon input-group-append border-left">
                        </span>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="deposit_to">Deposit to</label>
                      <select class="form-control form-control-sm" id="deposit_to">
                        <option selected="selected" disabled="disabled"> - Select Deposit to - </option>
                      </select>
                    </div>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-md-2">
                    <div class="form-group">
                      <label for="account">Account</label>
                      <select class="form-control form-control-sm" id="account">
                        <option selected="selected" disabled="disabled"> Account </option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group">
                      <label for="description">Description</label>
                      <input type="text" name="description" id="description" class="form-control form-control-lg" placeholder="Description">
                    </div>
                  </div>
                  <div class="col-md-1">
                    <div class="form-group">
                      <label for="qty">Qty</label>
                      <select class="form-control form-control-sm" id="qty">
                        <option selected="selected" disabled="disabled"> Qty </option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md">
                    <div class="form-group">
                      <label for="unit_price">Unit Price</label>
                      <input type="text" name="unit_price" id="unit_price" class="form-control form-control-lg" placeholder="Unit Price">
                    </div>
                  </div>
                  <div class="col-md-1">
                    <div class="form-group">
                      <label for="disc">Disc</label>
                      <input type="text" name="disc" id="disc" class="form-control form-control-lg" placeholder="Disc">
                    </div>
                  </div>
                  <div class="col-md-1">
                    <div class="form-group">
                      <label for="tax">Tax (%)</label>
                      <select class="form-control form-control-sm" id="tax">
                        <option selected="selected" disabled="disabled"> Tax </option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md">
                    <div class="form-group">
                      <label for="tax_amount">Tax Amount</label>
                      <input type="text" name="tax_amount" id="tax_amount" class="form-control form-control-lg" placeholder="Tax Amount">
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group">
                      <label for="amount">Amount</label>
                      <input type="text" name="amount" id="amount" class="form-control form-control-lg" placeholder="Amount">
                    </div>
                  </div>
                  <div>                  
                    <div class="form-group">
                    <label for=""></label>
                      <p class="text-right"><button class="btn-small btn-icons btn-inverse-success" id="TambahPengguna"><i class="fa fa-plus"></i></button></p>
                    </div>
                  </div>


                  <div class="col-md-2">
                    <div class="form-group">                      
                      <select class="form-control form-control-sm" id="account">
                        <option selected="selected" disabled="disabled"> Account </option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group">                      
                      <input type="text" name="description" id="description" class="form-control form-control-lg" placeholder="Description">
                    </div>
                  </div>
                  <div class="col-md-1">
                    <div class="form-group">                      
                      <select class="form-control form-control-sm" id="qty">
                        <option selected="selected" disabled="disabled"> Qty </option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md">
                    <div class="form-group">                      
                      <input type="text" name="unit_price" id="unit_price" class="form-control form-control-lg" placeholder="Unit Price">
                    </div>
                  </div>
                  <div class="col-md-1">
                    <div class="form-group">                      
                      <input type="text" name="disc" id="disc" class="form-control form-control-lg" placeholder="Disc">
                    </div>
                  </div>
                  <div class="col-md-1">
                    <div class="form-group">                      
                      <select class="form-control form-control-sm" id="tax">
                        <option selected="selected" disabled="disabled"> Tax </option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md">
                    <div class="form-group">                      
                      <input type="text" name="tax_amount" id="tax_amount" class="form-control form-control-lg" placeholder="Tax Amount">
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group">                      
                      <input type="text" name="amount" id="amount" class="form-control form-control-lg" placeholder="Amount">
                    </div>
                  </div>
                  <div>                  
                    <div class="form-group">                    
                      <p class="text-right"><button class="btn-small btn-icons btn-danger" id="KurangPengguna"><i class="fa fa-minus"></i></button></p>
                    </div>
                  </div>


                </div>                
                <div class="row">
                  <div class="container-fluid mt-5 w-100">
                    <p class="text-right mb-2">Sub - Total : Rp 12,348</p>
                    <h4 class="text-right mb-5">Total :  Rp 13,986</h4>
                    <hr>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="exampleTextarea1">Memo</label>
                      <textarea class="form-control" id="exampleTextarea1" rows="3"></textarea>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Attachment</label>
                      <input type="file" class="dropify" data-height="50">
                    </div>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-success">Receive Money</button>
                <button type="button" class="btn btn-light btn-close-receive" data-dismiss="modal">Cancel</button>
              </div>
            </div>
          </div>
        </div>
<!-- Modal Receive Money end -->
        
<!-- Modal Spend Money -->
        <div class="modal fade" id="Modal_Spend" tabindex="-1" role="dialog" aria-labelledby="formStaffLabel" data-backdrop="static" data-keyboard="false">
          <div class="modal-dialog modal-lg" role="document" style="margin-top: 15px;margin-bottom: 0">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="formStaffLabel">Spend Money</h5>
                <button type="button" class="close btn-close-spend" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
              <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="customer">Vendor</label>
                      <select class="form-control form-control-sm" id="customer">
                        <option selected="selected" disabled="disabled"> - Select Customer - </option>
                      </select>
                      <button class="btn btn-link" style="font-size: 13px;"><a href="#">Create New</a></button>
                    </div>

                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="exampleFormControlSelect2">Reference</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text">#</span>
                        </div>
                        <input type="text" class="form-control" placeholder="Reference" aria-label="Reference">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="invoice_no">Payment Date</label>
                      <div id="datepicker-popup" class="input-group date datepicker">
                        <input type="text" class="form-control form-control-lg">
                        <span class="input-group-addon input-group-append border-left">
                        </span>
                      </div>                    
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="deposit_to">From Account</label>
                      <select class="form-control form-control-sm" id="deposit_to">
                        <option selected="selected" disabled="disabled"> - Select Deposit to - </option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Balance</label>
                      <div class="form">
                        $180
                      </div>
                    </div>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-md-2">
                    <div class="form-group">
                      <label for="account">Account</label>
                      <select class="form-control form-control-sm" id="account">
                        <option selected="selected" disabled="disabled"> Account </option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group">
                      <label for="description">Description</label>
                      <input type="text" name="description" id="description" class="form-control form-control-lg" placeholder="Description">
                    </div>
                  </div>
                  <div class="col-md-1">
                    <div class="form-group">
                      <label for="qty">Qty</label>
                      <select class="form-control form-control-sm" id="qty">
                        <option selected="selected" disabled="disabled"> Qty </option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md">
                    <div class="form-group">
                      <label for="unit_price">Unit Price</label>
                      <input type="text" name="unit_price" id="unit_price" class="form-control form-control-lg" placeholder="Unit Price">
                    </div>
                  </div>
                  <div class="col-md-1">
                    <div class="form-group">
                      <label for="disc">Disc</label>
                      <input type="text" name="disc" id="disc" class="form-control form-control-lg" placeholder="Disc">
                    </div>
                  </div>
                  <div class="col-md-1">
                    <div class="form-group">
                      <label for="tax">Tax (%)</label>
                      <select class="form-control form-control-sm" id="tax">
                        <option selected="selected" disabled="disabled"> Tax </option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md">
                    <div class="form-group">
                      <label for="tax_amount">Tax Amount</label>
                      <input type="text" name="tax_amount" id="tax_amount" class="form-control form-control-lg" placeholder="Tax Amount">
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group">
                      <label for="amount">Amount</label>
                      <input type="text" name="amount" id="amount" class="form-control form-control-lg" placeholder="Amount">
                    </div>
                  </div>
                  <div>                  
                    <div class="form-group">
                    <label for=""></label>
                      <p class="text-right"><button class="btn-small btn-icons btn-inverse-success" id="TambahPengguna"><i class="fa fa-plus"></i></button></p>
                    </div>
                  </div>


                  <div class="col-md-2">
                    <div class="form-group">                      
                      <select class="form-control form-control-sm" id="account">
                        <option selected="selected" disabled="disabled"> Account </option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group">                      
                      <input type="text" name="description" id="description" class="form-control form-control-lg" placeholder="Description">
                    </div>
                  </div>
                  <div class="col-md-1">
                    <div class="form-group">                      
                      <select class="form-control form-control-sm" id="qty">
                        <option selected="selected" disabled="disabled"> Qty </option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md">
                    <div class="form-group">                      
                      <input type="text" name="unit_price" id="unit_price" class="form-control form-control-lg" placeholder="Unit Price">
                    </div>
                  </div>
                  <div class="col-md-1">
                    <div class="form-group">                      
                      <input type="text" name="disc" id="disc" class="form-control form-control-lg" placeholder="Disc">
                    </div>
                  </div>
                  <div class="col-md-1">
                    <div class="form-group">                      
                      <select class="form-control form-control-sm" id="tax">
                        <option selected="selected" disabled="disabled"> Tax </option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md">
                    <div class="form-group">                      
                      <input type="text" name="tax_amount" id="tax_amount" class="form-control form-control-lg" placeholder="Tax Amount">
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group">                      
                      <input type="text" name="amount" id="amount" class="form-control form-control-lg" placeholder="Amount">
                    </div>
                  </div>
                  <div>                  
                    <div class="form-group">                    
                      <p class="text-right"><button class="btn-small btn-icons btn-danger" id="KurangPengguna"><i class="fa fa-minus"></i></button></p>
                    </div>
                  </div>


                </div>                
                <div class="row">
                  <div class="container-fluid mt-5 w-100">
                    <p class="text-right mb-2">Sub - Total : Rp 12,348</p>
                    <h4 class="text-right mb-5">Total :  Rp 13,986</h4>
                    <hr>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="exampleTextarea1">Memo</label>
                      <textarea class="form-control" id="exampleTextarea1" rows="3"></textarea>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Attachment</label>
                      <input type="file" class="dropify" data-height="50">
                    </div>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-success">Spend Money</button>
                <button type="button" class="btn btn-light btn-close-spend" data-dismiss="modal">Cancel</button>
              </div>
            </div>
          </div>
        </div>
<!-- Modal Spend Money end -->

<!-- Modal Transfer Money -->
        <div class="modal fade" id="Modal_Transfer" tabindex="-1" role="dialog" aria-labelledby="formStaffLabel" data-backdrop="static" data-keyboard="false">
          <div class="modal-dialog" role="document" style="margin-top: 15px;margin-bottom: 0">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="formStaffLabel">Transfer Money</h5>
                <button type="button" class="close btn-close-transfer" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form class="saveDep form" method="post" action="#" id="tambah" enctype="multipart/form-data">
              <div class="modal-body">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="">Date</label>
                        <div class="input-group date datepicker">
                          <input type="text" name="" id="" class="form-control form-control-lg">
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
                      <label for="">From Account*</label>
                        <select class="form-control" id="" name="">
                          <option value="" selected="Choose" disabled="disabled">Choose</option>
                          <option value=""></option>
                          <option value=""></option>
                          <option value=""></option>                        
                        </select>
                        <small>Balance Rp</small>
                    </div>
                  </div>
                <!-- </div> -->
                <!-- <div class="row"> -->
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="">To Account</label>
                        <select class="form-control" id="" name="">
                          <option value="" selected="Choose" disabled="disabled">Choose</option>
                          <option value=""></option>
                          <option value=""></option>
                          <option value=""></option>                        
                        </select>
                        <small>Balance Rp</small>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="department_title">Amount*</label>
                      <input type="text" name="" id="" class="form-control form-control-lg" placeholder="">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="">Description</label>
                      <textarea class="form-control" id="" rows="2" name=""></textarea>
                    </div>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-success">Transfer Money</button>
                <button type="button" class="btn btn-light btn-close-transfer" data-dismiss="modal">Cancel</button>
              </div>
            </form>
            </div>
          </div>
        </div>
<!-- Modal Transfer Money Ends -->



          
                          
<?php 
  $this->load->view('template/footer');
  // $this->load->view('template/fixed-plugin');
  $this->load->view('template/js');
?>
<script type="text/javascript">
var multipleBarsChart1 = Chartist.Bar('#multipleBarsChart2', dataMultipleBarsChart1, optionsMultipleBarsChart1, responsiveOptionsMultipleBarsChart1);         
var dataMultipleBarsChart1 = {
              
                series: [
                    [
                        0,0,0,0,0,0,0,0,0,0,0,0                    ]
                ]
            };

            var optionsMultipleBarsChart1 = {
                seriesBarDistance: 10,
                axisX: {
                    showGrid: false
                },
                height: '300px'
            };

            var responsiveOptionsMultipleBarsChart1 = [
                ['screen and (max-width: 640px)', {
                    seriesBarDistance: 5,
                    axisX: {
                        labelInterpolationFnc: function(value) {
                            return value[0];
                        }
                    }
                }]
            ];

            var multipleBarsChart1 = Chartist.Bar('#multipleBarsChart1', dataMultipleBarsChart1, optionsMultipleBarsChart1, responsiveOptionsMultipleBarsChart1);
            //Balance Sheet
            var dataMultipleBarsChart1 = {
              
                series: [
                    [
                        0,0,0,0,0,0,0,0,0,0,0,0                   ]
                ]
            };

            var optionsMultipleBarsChart2 = {
                seriesBarDistance: 10,
                axisX: {
                    showGrid: false
                },
                height: '300px'
            };

            var responsiveOptionsMultipleBarsChart2 = [
                ['screen and (max-width: 640px)', {
                    seriesBarDistance: 5,
                    axisX: {
                        labelInterpolationFnc: function(value) {
                            return value[0];
                        }
                    }
                }]
            ];

  $(document).ready(function() {
    $('#buttonTransfer').click(function() {
        $('html').css('overflow', 'hidden');
        $('body').bind('touchmove', function(e) {
            e.preventDefault()
        });
    });
    $('.btn-close-transfer').click(function() {
        $('html').css('overflow', 'scroll');
        $('body').unbind('touchmove');
    });

    $('.datepicker').datepicker({
        enableOnReadonly: true,
        todayHighlight: true,
        autoclose: true,
        format: "dd/mm/yyyy"
    });
  });

  $(document).ready(function() {
    $('#buttonTransfer').click(function() {
        $('html').css('overflow', 'hidden');
        $('body').bind('touchmove', function(e) {
            e.preventDefault()
        });
    });
    $('.btn-close-transfer').click(function() {
        $('html').css('overflow', 'scroll');
        $('body').unbind('touchmove');
    });
  });


  var TambahPengguna = $('#TambahPengguna');
  var delete;
  var loopID = 1;
  TambahPengguna.on('click', function(){
    // console log ok
    loopID++;
    var headHtml = ('#pengguna');
    var Html =
  })

            
</script>
