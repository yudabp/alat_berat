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
              <div class="d-flex align-items-left">
                <h4 class="page-title mt-1">Sales Transaction</h4>
                <button class="btn btn-inverse-success ml-2" id="buttonModal" data-toggle="modal" data-target="#formAdd">Payment</button>
                <button class="btn btn-inverse-success ml-2" id="buttoninvoice" data-toggle="modal" data-target="#forminvoice">Invoice</button>
              </div>
              <div class="d-flex align-items-center">
                <div class="wrapper mr-4 d-none d-sm-block">
                  <p class="mb-0">Summary for
                    <b class="mb-0"><i id="bulan"></i> <i id="tahun"></i></b>
                  </p>
                </div>
              </div>
            </div>
          </div>
          <div class="row grid-margin">
            <div class="col-md-12">
              <div class="row">
                <div class="col-md-4">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">Payments</h4>
                      <div id="payment" style="height: 110px"></div>
                    </div>
                  </div>
                </div>  
                <div class="col-md-4">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">Status</h4>
                      <div id="status" style="height: 110px"></div>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="card" style="height: 197px">
                    <div class="card-head">
                      <br>
                    </div>
                    <div class="card-body">
                      <div class="d-flex justify-content-between pb-2">
                        <h5>Total Outstanding Payments</h5>
                      </div>
                      <h1 class="text-info font-weight-bold">Rp 0</h1>  
                    </div>
                  </div>
                </div>
              </div>
              <div class="row grid-margin mt-3">
                <div class="col-md-12 grid-margin stretch-card">
                  <div class="card">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-12 table-responsive">
                          <table id="tablesales" class="table">
                            <thead>
                              <tr class="text-center">
                                <th>Date</th>
                                <th>Type</th>
                                <th>Ref</th>
                                <th>Customer</th>
                                <th>Due Date</th>
                                <th>Due</th>
                                <th>Total</th>
                                <th>Status</th>
                                <th>Actions</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr class="text-center">
                                <td>28/oct</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>
                                  <button class="btn btn-link"><i class="fa fa-pencil"></i></button>
                                  <button class="btn btn-link"><i class="fa fa-trash-o"></i></button>
                                  <!-- <button class="btn btn-icons btn-inverse-primary"><i class="fa  fa-trash-o"></i></button> -->
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
            </div>
          </div>
        </div>
<!-- content-wrapper ends -->
        <!-- modal payment -->
        <div class="modal fade" id="formAdd" tabindex="-1" role="dialog" aria-labelledby="formStaffLabel" data-backdrop="static" data-keyboard="false">
          <div class="modal-dialog modal-lg" role="document" style="margin-top: 15px;margin-bottom: 0">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="formStaffLabel">Payment</h5>
                <button type="button" class="close btn-close" data-dismiss="modal" aria-label="Close">
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
                      <label for="">Invoice No.</label>
                      <input type="text" name="" id="" class="form-control form-control-lg" placeholder="Invoice No.">
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
                
        <div class="row" id="nambah" data="1">
            <div class="col-md-2">
                <div class="nambah1">
                      <label for="account">Account</label>
                      <select class="form-control form-control-sm" id="account">
                        <?php
                            foreach($asu as $row){
                                ?>
                                    <option value="<?php echo $row->id_payment_option; ?>"><?php echo $row->account." "; ?></option>
                                <?php
                            }
                          ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="nambah1">
                      <label for="description">Description</label>
                      <input type="text" name="description" id="description" class="form-control form-control-lg" placeholder="Description">
                    </div>
                  </div>
                  <div class="col-md-1">
                    <div class="nambah1">
                      <label for="qty">Qty</label>
                      <select class="form-control form-control-sm" id="qty">
                        <option selected="selected" disabled="disabled"> Qty </option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md">
                    <div class="nambah1">
                      <label for="unit_price">Unit Price</label>
                      <input type="text" name="unit_price" id="unit_price" class="form-control form-control-lg" placeholder="Unit Price">
                    </div>
                  </div>
                  <div class="col-md-1">
                    <div class="nambah1">
                      <label for="disc">Disc</label>
                      <input type="text" name="disc" id="disc" class="form-control form-control-lg" placeholder="Disc">
                    </div>
                  </div>
                  <div class="col-md-1">
                    <div class="nambah1">
                      <label for="tax">Tax (%)</label>
                      <select class="form-control form-control-sm" id="tax">
                        <option selected="selected" disabled="disabled"> Tax </option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md">
                    <div class="nambah1">
                      <label for="tax_amount">Tax Amount</label>
                      <input type="text" name="tax_amount" id="tax_amount" class="form-control form-control-lg" placeholder="Tax Amount">
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="nambah1">
                      <label for="amount">Amount</label>
                      <input type="text" name="amount" id="amount" class="form-control form-control-lg" placeholder="Amount">
                    </div>
                  </div>
                  <div>                  
                    <div class="nambah1">
                    <label for=""></label>
                      <p class="text-right"><button class="btn-small btn-icons btn-inverse-success" id="TambahItem"><i class="fa fa-plus"></i></button></p>
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
                <button type="button" class="btn btn-success">Create Payment</button>
                <button type="button" class="btn btn-light btn-close-voucher" data-dismiss="modal">Cancel</button>
              </div>
            </div>
          </div>
        </div>
        <!-- modal payment end -->
<!-- modal invoice -->
        <div class="modal fade" id="forminvoice" tabindex="-1" role="dialog" aria-labelledby="formStaffLabel" data-backdrop="static" data-keyboard="false">
          <div class="modal-dialog modal-lg" role="document" style="margin-top: 15px;margin-bottom: 0">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="formStaffLabel">Invoice</h5>
                <button type="button" class="close btn-close1" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="customer1">Customer</label>
                      <select class="form-control form-control-sm" id="customer1">
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
                        <input type="text" name="Reference" id="Reference" class="form-control form-control-lg" placeholder="Reference">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="">Invoice No.</label>
                      <input type="text" name="" id="" class="form-control form-control-lg" placeholder="Invoice No.">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Invoice Date</label>
                      <div id="datepicker-popup" class="input-group date datepicker">
                        <input type="text" class="form-control form-control-lg">
                        <span class="input-group-addon input-group-append border-left">
                        </span>
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Due Date</label>
                      <div id="datepicker-popup" class="input-group date datepicker">
                        <input type="text" class="form-control form-control-lg">
                        <span class="input-group-addon input-group-append border-left">
                        </span>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-8">
                    <div class="form-group">
                      <label for="exampleTextarea1">Billing Address</label>
                      <textarea class="form-control"  id="exampleTextarea1" rows="6"></textarea>
                    </div>
                  </div>
                </div>
                <hr>
                
                
                
        <div class="row" id="function" data="1">
            <div class="col-md-2">
                <div class="function1">
                      <label for="account">Account</label>
                      <select class="form-control form-control-sm" id="account">
                        <?php
                            foreach($asu as $row){
                                ?>
                                    <option value="<?php echo $row->id_payment_option; ?>"><?php echo $row->account." "; ?></option>
                                <?php
                            }
                          ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="function1">
                      <label for="description">Description</label>
                      <input type="text" name="description" id="description" class="form-control form-control-lg" placeholder="Description">
                    </div>
                  </div>
                  <div class="col-md-1">
                    <div class="function1">
                      <label for="qty">Qty</label>
                      <select class="form-control form-control-sm" id="qty">
                        <option selected="selected" disabled="disabled"> Qty </option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md">
                    <div class="function1">
                      <label for="unit_price">Unit Price</label>
                      <input type="text" name="unit_price" id="unit_price" class="form-control form-control-lg" placeholder="Unit Price">
                    </div>
                  </div>
                  <div class="col-md-1">
                    <div class="function1">
                      <label for="disc">Disc</label>
                      <input type="text" name="disc" id="disc" class="form-control form-control-lg" placeholder="Disc">
                    </div>
                  </div>
                  <div class="col-md-1">
                    <div class="function1">
                      <label for="tax">Tax (%)</label>
                      <select class="form-control form-control-sm" id="tax">
                        <option selected="selected" disabled="disabled"> Tax </option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md">
                    <div class="function1">
                      <label for="tax_amount">Tax Amount</label>
                      <input type="text" name="tax_amount" id="tax_amount" class="form-control form-control-lg" placeholder="Tax Amount">
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="function1">
                      <label for="amount">Amount</label>
                      <input type="text" name="amount" id="amount" class="form-control form-control-lg" placeholder="Amount">
                    </div>
                  </div>
                  <div>                  
                    <div class="function1">
                    <label for=""></label>
                      <p class="text-right"><button class="btn-small btn-icons btn-inverse-success" id="plusitem"><i class="fa fa-plus"></i></button></p>
                    </div>
                  </div>
                </div>                

                <div class="row">
                  <div class="container-fluid mt-5 w-100">
                    <p class="text-right mb-2">Sub - Total : Rp 12,348</p>
                    <h4 class="text-right mb-5">Total : Rp 13,986</h4>
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
                <button type="button" class="btn btn-success">Create Invoice</button>
                <button type="button" class="btn btn-light btn-close1" data-dismiss="modal">Cancel</button>
              </div>
            </div>
          </div>
        </div>
<!-- modal invoice end -->


<?php 
  $this->load->view('template/footer');
  // $this->load->view('template/fixed-plugin');
  $this->load->view('template/js');
?>
<script type="text/javascript">
  var profitChart = c3.generate({
    bindto: '#payment',
    data: {
        columns: [
            ['Received', 60],
            ['Outstanding', 40],
        ],
        type : 'donut',
    },
    donut: {
        label: {
        show: false
        },
    },

    legend: {  
        show: true,
        position: 'right'
    },
    padding: {
        top: 0,
        right: 0,
        bottom: 0,
        left: 0,
    },
});
var serviceChart = c3.generate({
    bindto: '#status',
    data: {
        columns: [
            ['Paid', 40],
            ['Overdue', 20],
            ['Partial', 20],
            ['Draft', 20],
        ],
        type : 'donut',
    },
    donut: {
        label: {
        show: false
        },
    },
    legend: {  
        show: true,
        position: 'right'
    },
    padding: {
        top: 0,
        right: 0,
        bottom: 0,
        left: 0,
    },
});
$('#tablesales').DataTable({
  "aLengthMenu": [
    [5, 10, 15, -1],
    [5, 10, 15, "All"]
  ],
  "iDisplayLength": 10,
  "language": {
    search: ""
  },
});
$('.datepicker').datepicker({
  enableOnReadonly: true,
  todayHighlight: true,
  autoclose: true,
  format: "dd/mm/yyyy"
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
  });
$(document).ready(function() {
    $('#buttoninvoice').click(function() {
        $('html').css('overflow', 'hidden');
        $('body').bind('touchmove', function(e) {
            e.preventDefault()
        });
    });
    $('.btn-close1').click(function() {
        $('html').css('overflow', 'scroll');
        $('body').unbind('touchmove');
    });
  });

var TambahItem = $('#TambahItem');
    var DeleteItem;
    var loopID = 1;
    TambahItem.on('click', function(){
      //console.log("ok");
    loopID++;
    var headHtml = $('#nambah');
    var html = `
  <div class="parent_section`+loopID+`">
    <div class="row">
     <div class="col-md-2">
            <div>
                     <select class="form-control form-control-sm" id="account">
                        <?php
                            foreach($asu as $row){
                                ?>
                                    <option value="<?php echo $row->id_payment_option; ?>"><?php echo $row->account." "; ?></option>
                                <?php
                            }
                          ?>
                    </select>
            </div>
     </div>

        <div class="col-md-2">
            <div>
                      <input type="text" name="description" id="description" class="form-control form-control-lg" placeholder="Description">
                    </div>
                  </div>
                  
        <div class="col-md-1">
            <div>
                      <select class="form-control form-control-sm" id="qty">
                        <option selected="selected" disabled="disabled"> Qty </option>
                      </select>
            </div>
        </div>
        
        <div class="col-md">
            <div>
                <input type="text" name="unit_price" id="unit_price" class="form-control form-control-lg" placeholder="Unit Price">
            </div>
        </div>
        
         <div class="col-md-1">
            <div>
                <input type="text" name="disc" id="disc" class="form-control form-control-lg" placeholder="Disc">
            </div>
        </div>
        
        <div class="col-md-1">
            <div>
                <select class="form-control form-control-sm" id="tax">
                    <option selected="selected" disabled="disabled"> Tax </option>
                </select>
            </div>
        </div>
        
        <div class="col-md">
            <div>
                      <input type="text" name="tax_amount" id="tax_amount" class="form-control form-control-lg" placeholder="Tax Amount">
            </div>
        </div>
        
        <div class="col-md-2">
            <div>
                <input type="text" name="amount" id="amount" class="form-control form-control-lg" placeholder="Amount">
            </div>
        </div>
        
        <div>                  
            <div class="form-group">                    
                <p class="text-right"><button class="btn-small btn-icons btn-danger" onclick="kurang_btn(`+loopID+`);"><i class="fa fa-minus"></i></button></p>
                    </div>
                  </div>
    </div>
    </div>
                  
    `;

    headHtml.append(html);
  });

  function kurang_btn(section){
    $(".parent_section"+section).remove();
  }
  
  
  
  
  
  
  var plusitem = $('#plusitem');
    var hapusitem;
    var loopID = 1;
    plusitem.on('click', function(){
      //console.log("ok");
    loopID++;
    var headHtml = $('#function');
    var html = `
  <div class="function`+loopID+`">
    <div class="row">
     <div class="col-md-2">
            <div>
                     <select class="form-control form-control-sm" id="account">
                        <?php
                            foreach($asu as $row){
                                ?>
                                    <option value="<?php echo $row->id_payment_option; ?>"><?php echo $row->account." "; ?></option>
                                <?php
                            }
                          ?>
                    </select>
            </div>
     </div>

        <div class="col-md-2">
            <div>
                      <input type="text" name="description" id="description" class="form-control form-control-lg" placeholder="Description">
                    </div>
                  </div>
                  
        <div class="col-md-1">
            <div>
                      <select class="form-control form-control-sm" id="qty">
                        <option selected="selected" disabled="disabled"> Qty </option>
                      </select>
            </div>
        </div>
        
        <div class="col-md">
            <div>
                <input type="text" name="unit_price" id="unit_price" class="form-control form-control-lg" placeholder="Unit Price">
            </div>
        </div>
        
         <div class="col-md-1">
            <div>
                <input type="text" name="disc" id="disc" class="form-control form-control-lg" placeholder="Disc">
            </div>
        </div>
        
        <div class="col-md-1">
            <div>
                <select class="form-control form-control-sm" id="tax">
                    <option selected="selected" disabled="disabled"> Tax </option>
                </select>
            </div>
        </div>
        
        <div class="col-md">
            <div>
                      <input type="text" name="tax_amount" id="tax_amount" class="form-control form-control-lg" placeholder="Tax Amount">
            </div>
        </div>
        
        <div class="col-md-2">
            <div>
                <input type="text" name="amount" id="amount" class="form-control form-control-lg" placeholder="Amount">
            </div>
        </div>
        
        <div>                  
            <div class="form-group">                    
                <p class="text-right"><button class="btn-small btn-icons btn-danger" onclick="kurangbutton(`+loopID+`);"><i class="fa fa-minus"></i></button></p>
                    </div>
                  </div>
    </div>
    </div>
                  
    `;

    headHtml.append(html);
  });

  function kurangbutton(section){
    $(".function"+section).remove();
  }
    
</script>
