<?php 
    $this->load->view('template/head');
    $this->load->view('template/topbar');
    $this->load->view('template/sidebar');
?>
<style type="text/css">
  a:hover{
    text-decoration: none;
    cursor: pointer;
  }
  tr{
    padding: 0px;
  }
  th{
    padding: 0px;
  }
  td{
    padding: 0px;
  }
</style>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row mb-4">
            <div class="col-12 d-flex align-items-center justify-content-between">
              <h4 class="page-title">Add Quotation</h4>
              <div class="d-flex align-items-center">
                <div class="wrapper mr-4 d-none d-sm-block">
                  <p class="mb-0">Summary for
                    <b class="mb-0"><i id="bulan"></i> <i id="tahun"></i></b>
                  </p>
                </div>
              </div>
            </div>
          </div>
          <?php 
            $quonum = $_GET['number'];
            $quo = $this->db->get_where('quotation',['quote_number'=>$quonum])->row();
           ?>
              <form id="addQuotation">
              <!-- <?php echo form_open_multipart('savequotation',['class'=>'form-sample','id'=>'tambah']); ?> -->
            <div class="row">
              <?php if ($quonum != "") { ?>
                <input type="hidden" name="id-quotation" id="id-quotation" value="<?php echo $quo->id_quotation ?>">
              <?php } ?>
              <div class="col-md-6 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title mb-3">Data Quotation</h4>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="label_quote_number">Quote Number</label>
                          <input type="text" class="form-control" name="quote_number" id="quote_number" readonly value="<?php 
                          if ($quonum == ""){
                            echo $kodeunik;
                          }else{
                            echo $quo->quote_number;
                          }
                          ?>">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="label_quote_date">Quote Date</label>
                          <input type="text" class="form-control datepicker" name="quote_date" id="quote_date" readonly value="<?php 
                          if ($quonum != ""){
                            echo $quo->quote_date;
                          }else{
                            echo date("d/m/Y");
                          }
                          ?>">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="label_snipping">Shipping From</label>
                            <select name="branch_office" id="branch_office" class="form-control single-select">
                                  <option value="" <?php if($quo->shipping_from == ""){ ?>selected<?php } ?> disabled> - Select Branch Office - </option>
                                  <?php foreach($branch_office as $vil){ ?>
                                  <option value="<?php echo $vil->branch_id ?>" <?php if($quo->shipping_from == $vil->branch_id){ ?>selected <?php } ?>><?php echo $vil->branch ?></option>
                                  <?php } ?>
                            </select>
                        </div>
                      </div>    
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="label_destination">Destination</label>
                            <select name="destination" id="destination" class="form-control single-select">
                                  <option value="" <?php if($quo->destination == ""){ ?>selected<?php } ?> disabled> - Select Destination - </option>
                                  <?php foreach($port as $po){ ?>
                                  <option value="<?php echo $po->port_id ?>" <?php if($quo->destination == $po->port_id){ ?>selected <?php } ?>><?php echo $po->port." (".$po->country.")" ?></option>
                                  <?php } ?>
                            </select>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label for="label_customer_name">Customer Name</label>
                          <!-- <input type="text" class="form-control" name="customer_name" id="customer_name"> -->
                          <select name="customer_name" id="customer_name" class="single-select form-control">
                            <option <?php if($quo->customer == ""){ ?>selected <?php } ?> disabled="disabled"> - Select Customer - </option>
                            <?php
                              foreach($customer_name as $row){
                                ?>
                                  <option <?php if($quo->customer == $row->company){ ?>selected <?php } ?> value="<?php echo $row->idcontacts; ?>"><?php echo $row->company; ?></option>
                                <?php
                              }
                            ?>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label for="label_subject">Subject</label>
                          <textarea type="text" class="form-control" name="subject" id="subject"><?php 
                          if ($quonum != ""){
                            echo $quo->subject;
                          }
                          ?></textarea>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="label_expires_date">Expires Date</label>
                          <input type="text" class="form-control datepicker" name="expires_date" id="expires_date" readonly value="<? 
                          if ($quonum != ""){
                            echo $quo->expires_date;
                          }else{
                            echo date("d/m/Y");
                          }
                          ?>">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="label_term_payment">Term of Payment</label>
                          <select name="term_payment" id="term_payment" class="form-control">
                            <option <?php if($quo->term_op == ""){ ?>selected<?php } ?> disabled="disabled"> - Term of Payment - </option>
                            <option <?php if($quo->term_op == " "){ ?>selected<?php } ?> value=" "> </option>
                            <option <?php if($quo->term_op == "0"){ ?>selected<?php } ?> value="0">0 Days</option>
                            <option <?php if($quo->term_op == "7"){ ?>selected<?php } ?> value="7">7 Days</option>
                            <option <?php if($quo->term_op == "14"){ ?>selected<?php } ?> value="14">14 Days</option>
                            <option <?php if($quo->term_op == "30"){ ?>selected<?php } ?> value="30">30 Days</option>
                            <option <?php if($quo->term_op == "60"){ ?>selected<?php } ?> value="60">60 Days</option>
                            <option <?php if($quo->term_op == "90"){ ?>selected<?php } ?> value="90">90 Days</option>
                          </select>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-6 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title mb-3">Deskripsi</h4>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label for="label_header">Header</label>
                          <textarea type="text" class="form-control" name="desk_header" id="desk_header" rows="7" placeholder="Firstly, we would to say thanks for kind cooperation and attention here with we would like to have to overing Quatation for as follow:"><?php 
                          if ($quonum != ""){
                            echo $quo->desk_header;
                          }
                          else{
                            ?>
Firstly, we would to say thanks for kind cooperation and attention here with we would like to have to overing Quatation for as follow:
                            <?php
                          }
                          ?></textarea>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label for="label_footer">Footer</label>
                          <textarea type="text" class="form-control" name="desk_footer" id="desk_footer" rows="7" placeholder="The requested term of payment are as follow:    
- 25% on contract date
- 50% on vessel arrival
- 25% after unstuffing/unpacking
        
Hope the above quotation will meet with your requirment and kindly please feel free contact us if any question."><?php 
                          if ($quonum != ""){
                            echo $quo->desk_footer;
                          }
                          else{
                            ?>
The requested term of payment are as follow:    
- 25% on contract date
- 50% on vessel arrival
- 25% after unstuffing/unpacking
        
Hope the above quotation will meet with your requirment and kindly please feel free contact us if any question.
                            <?php
                          }
                          ?></textarea>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
              <!-- <?php echo form_close(); ?> -->
              </form>
            <!-- <div class="row grid-margin collapse" id="btnShow"> -->
              <!-- <button type="button" class="btn btn-success ml-2" onclick="showTable()">Save</button> -->
              <!-- <button type="button" onclick="saveQuo()" class="btn btn-success ml-2 float-right">Save</button>
              <a href="<?php echo base_url() ?>quotation" class="ml-2"><button type="button" class="btn btn-light btn-close" data-dismiss="modal">Back</button></a> -->
            <!-- </div> -->
            <?php 
            if (!isset($quonum)) { ?>
            <div class="row grid-margin collapse" id="tableBottom">
            <?php }else{ ?>
            <div class="row grid-margin" id="tableBottom">
            <?php }
             ?>
              <ul class="nav nav-tabs tab-solid tab-solid-danger ml-2 mb-0" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" id="btnItem" data-toggle="tab" role="tab" onclick="clickRate()">Rate Quote</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="btnCost" data-toggle="tab" role="tab" onclick="clickCost()">Estimation Cost</a>
                </li>
              </ul>
              <div class="col-md-12" style="display: block;" id="cardRate">
                <div class="card">
                  <div class="card-body">
                    <div class="card-title row">
                      <div class="col-md-12 text-left">
                        <button class="btn btn-icons btn-inverse-success" data-toggle="modal" data-target="#formRate"><i class="fa fa-plus"></i></button>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-12 table-responsive">
                        <table id="tableItem" class="table table-bordered">
                          <thead>
                            <tr class="text-center">  
                              <th rowspan="2" width="3%" style="vertical-align: middle;">No</th>
                              <th rowspan="2" width="28%" style="vertical-align: middle;">Item Cost</th>          
                              <th rowspan="2" width="5%" style="vertical-align: middle;">Unit</th>
                              <th rowspan="2" width="5%" style="vertical-align: middle;">QTY</th>
                              <th rowspan="2" width="10%" style="vertical-align: middle;">Price</th>
                              <th colspan="2" width="14%">Amount</th>
                              <th rowspan="2" width="30%" style="vertical-align: middle;">Note</th>
                              <th rowspan="2" width="5%" style="vertical-align: middle;">Action</th>
                            </tr>
                            <tr class="text-center">  
                              <th width="7%">IDR</th>
                              <th width="7%">USD</th> 
                            </tr>
                          </thead>
                          <tbody>
                          <?php 
                            $total_quote_idr = 0;
                            $total_quote_usd = 0;
                            foreach ($view as $key => $value) {
                              $total_quote_idr += $value->amount_idr;
                              $total_quote_usd += $value->amount_usd;  
                            ?>
                            <tr>
                              <td><?php echo $key +1; ?></td>
                              <td><?php echo $value->item_cost; ?></td>
                              <td><?php echo $value->unit; ?></td>
                              <td><?php echo $value->qty; ?></td>
                              <td><?php echo number_format($value->price,0,',','.'); ?></td>
                              <td><?php echo number_format($value->amount_idr,0,',','.'); ?></td>
                              <td><?php echo number_format($value->amount_usd,0,',','.'); ?></td>
                              <td><?php echo $value->note; ?></td>
                              <td class="text-center">
                                <div class="dropdown">
                                  <button type="button" class="btn btn-icons btn-rounded text-center" data-toggle="dropdown">
                                    <i class="ti-more-alt"></i>
                                  </button>
                                  <div class="dropdown-menu">
                                    <button class="btn btn-link" onclick="editRate('<?php echo $value->id_rate_quote; ?>')"><i class="fa fa-pencil"></i></button>
                                    <button class="btn btn-link" onclick="delRate('<?php echo $value->id_rate_quote; ?>')"><i class="fa fa-trash-o"></i></button>
                                  </div>
                                </div>
                              </td>
                            </tr>
                          <?php } ?>
                          </tbody>
                          <tfoot class="text-center">
                            <th colspan="4"></th>
                            <th style="font-weight: bold;">Total Quote :</th>
                            <th style="background: #00B65E"><?php echo number_format($total_quote_idr,0,',','.'); ?></th>
                            <th style="background: #F88600"><?php echo number_format($total_quote_usd,0,',','.'); ?></th>
                            <th colspan="2"></th>
                          </tfoot>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-12" style="display: none;" id="cardCost">
                <div class="card">
                  <div class="card-body">
                    <div class="card-title row">
                      <div class="col-md-12 text-left">
                        <button class="btn btn-icons btn-inverse-success" id="buttonModal" data-toggle="modal" data-target="#formCost"><i class="fa fa-plus"></i></button>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-12 table-responsive">
                        <table id="tableCost" class="table table-bordered">
                          <thead>
                            <tr class="text-center">  
                              <th rowspan="2" width="3%" style="vertical-align: middle;">No</th>
                              <th rowspan="2" width="28%" style="vertical-align: middle;">Item Cost</th>          
                              <th rowspan="2" width="5%" style="vertical-align: middle;">Unit</th>
                              <th rowspan="2" width="5%" style="vertical-align: middle;">QTY</th>
                              <th rowspan="2" width="10%" style="vertical-align: middle;">Price</th>
                              <th colspan="2" width="14%">Amount</th>
                              <th rowspan="2" width="30%" style="vertical-align: middle;">Vendor</th>
                              <th rowspan="2" width="5%" style="vertical-align: middle;">Action</th>
                            </tr>
                            <tr class="text-center">  
                              <th width="7%">IDR</th>
                              <th width="7%">USD</th> 
                            </tr>
                          </thead>
                          <tbody>
                            <?php 
                              $total_cost_idr = 0;
                              $total_cost_usd = 0;
                              foreach ($view as $key => $value) {
                                $total_cost_idr += $value->amount_idr;
                                $total_cost_usd += $value->amount_usd;
                              ?>
                              <tr>
                                <td><?php echo $key +1; ?></td>
                                <td><?php echo $value->item_cost; ?></td>
                                <td><?php echo $value->unit; ?></td>
                                <td><?php echo $value->qty; ?></td>
                                <td><?php echo number_format($value->price,0,',','.'); ?></td>
                                <td><?php echo number_format($value->amount_idr,0,',','.'); ?></td>
                                <td><?php echo number_format($value->amount_usd,0,',','.'); ?></td>
                                <td>NA</td>
                                <td class="text-center">
                                  <div class="dropdown">
                                    <button type="button" class="btn btn-icons btn-rounded text-center" data-toggle="dropdown">
                                      <i class="ti-more-alt"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                      <button class="btn btn-link" onclick="editRate('<?php echo $value->id_rate_quote; ?>')"><i class="fa fa-pencil"></i></button>
                                      <button class="btn btn-link" onclick="delRate('<?php echo $value->id_rate_quote; ?>')"><i class="fa fa-trash-o"></i></button>
                                    </div>
                                  </div>
                                </td>
                              </tr>
                            <?php }
                              foreach ($cost as $no => $est) { 
                                $total_cost_idr += $est->amount_idr;
                                $total_cost_usd += $est->amount_usd;
                              ?>
                            <tr>
                              <td><?php echo $no +1; ?></td>
                              <td><?php echo $est->item_cost; ?></td>
                              <td><?php echo $est->unit; ?></td>
                              <td><?php echo $est->qty; ?></td>
                              <td><?php echo number_format($est->price,0,',','.'); ?></td>
                              <td><?php echo number_format($est->amount_idr,0,',','.'); ?></td>
                              <td><?php echo number_format($est->amount_usd,0,',','.'); ?></td>
                              <td><?php echo $est->vendor; ?></td>
                              <td class="text-center">
                                <div class="dropdown">
                                  <button type="button" class="btn btn-icons btn-rounded text-center" data-toggle="dropdown">
                                    <i class="ti-more-alt"></i>
                                  </button>
                                  <div class="dropdown-menu">
                                    <button class="btn btn-link" onclick="editEst('<?php echo $est->id_estimation; ?>')"><i class="fa fa-pencil"></i></button>
                                    <button class="btn btn-link" onclick="delEst('<?php echo $est->id_estimation; ?>')"><i class="fa fa-trash-o"></i></button>
                                  </div>
                                </div>
                              </td>
                            </tr>
                          <?php } ?>
                          </tbody>
                          <tfoot class="text-center">
                            <tr>
                              <th colspan="4"></th>
                              <th style="font-weight: bold;">Estimation Cost :</th>
                              <th style="background: #00B65E"><?php echo number_format($total_cost_idr,0,',','.'); ?></th>
                              <th style="background: #F88600"><?php echo number_format($total_cost_usd,0,',','.'); ?></th>
                              <th colspan="2"></th>
                            </tr>
                            <tr>
                              <th colspan="4"></th>
                              <th style="font-weight: bold;">Total Quote :</th>
                              <th style="background: #00B65E"><?php echo number_format($total_quote_idr,0,',','.'); ?></th>
                              <th style="background: #F88600"><?php echo number_format($total_quote_usd,0,',','.'); ?></th>
                              <th colspan="2"></th>
                            </tr>
                            <tr>
                                <?php 
                                  $total_cost_profit_idr = $total_quote_idr - $total_cost_idr; 
                                  $total_cost_profit_usd = $total_quote_usd - $total_cost_usd;
                                ?>
                              <th colspan="4"></th>
                              <th style="font-weight: bold;">Estimation Profit :</th>
                              <th style="background: #00B65E"><?php echo number_format($total_cost_profit_idr,0,',','.'); ?></th>
                              <th style="background: #F88600"><?php echo number_format($total_cost_profit_usd,0,',','.'); ?></th>
                              <th colspan="2"></th>
                            </tr>
                          </tfoot>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
              <?php if ($quonum != "") { ?>
                <button type="button" onclick="upQuo('<?php echo $quo->id_quotation; ?>')" class="btn btn-success ml-2 float-right">Save</button>
              <?php }else{ ?>
                <button type="button" onclick="saveQuo()" class="btn btn-success ml-2 float-right">Save</button>
              <?php } ?>
              <a href="<?php echo base_url() ?>quotation" class="ml-2"><button type="button" class="btn btn-light btn-close" data-dismiss="modal">Back</button></a>
            <!-- <div class="row grid-margin collapse" id="btnSave">
              <button type="submit" class="btn btn-success ml-2">Save</button>
              <a href="<?php echo base_url() ?>quotation" class="ml-2"><button type="button" class="btn btn-light btn-close" data-dismiss="modal">Back</button></a>
            </div> -->
          <!-- </form> -->
        </div>
        <!-- content-wrapper ends -->
            
        <div class="modal fade" id="formRate" tabindex="-1" role="dialog" aria-labelledby="formRateLabel">
          <div class="modal-dialog" role="document" style="margin-top: 15px;margin-bottom: 0">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="formRateLabel">Rate Quote</h5>
                <button type="button" class="close btn-close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <!-- <?php echo form_open_multipart('saveratequote',['class'=>'formrq','id'=>'tambah']); ?> -->
              <form class="saveRateQ form" id="rate" action="<?php echo $base_url; ?>saveratequote" method="post"> 
              <div class="modal-body">
                <div class="row">
                  <input type="hidden" name="id_quo" id="id_quo" value="<?php echo $quo->id_quotation; ?>">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="label_rate_item_cost">Item Cost</label>
                      <?php $getdata = $this->db->query("SELECT * FROM add_itemcost")->result(); ?>
                      <select name="rate_item_cost" id="rate_item_cost" class="form-control modal1_select">
                        <option selected="selected" disabled="disabled"> - Select Item Cost - </option>
                        <?php foreach($getdata as $col){ ?>
                        <option value="<?php echo $col->item ?>"><?php echo $col->item ?></option>
                        <?php } ?>
                        <!-- <option value="ADDITIONAL CHARGES">ADDITIONAL CHARGES</option>
                        <option value="ADM FEE">ADM FEE</option>
                        <option value="ADMINISTRATION FEE">ADMINISTRATION FEE</option>
                        <option value="AGENCY FEE">AGENCY FEE</option>
                        <option value="AIR FREIGHT">AIR FREIGHT</option>
                        <option value="ASURANSI">ASURANSI</option>
                        <option value="BAF">BAF</option>
                        <option value="BAHANDLE (AS PER RECEIVED)">BAHANDLE (AS PER RECEIVED)</option>
                        <option value="BIAYA ADM BANK">BIAYA ADM BANK</option>
                        <option value="BIAYA BC">BIAYA BC</option> -->
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="label_rate_unit">Unit</label>
                      <?php $getuniit = $this->db->query("SELECT * FROM add_unit")->result(); ?>
                      <select name="rate_unit" id="rate_unit" class="form-control modal1_select">
                        <option selected="selected" disabled="disabled"> - Select Unit - </option>
                        <?php foreach($getuniit as $kill){ ?>
                        <option value="<?php echo $kill->unit ?>"><?php echo $kill->unit ?></option>
                        <?php } ?>
                        <!-- <option value="Buruh">Buruh</option>
                        <option value="Container">Container</option>
                        <option value="Doc">Doc</option>
                        <option value="Kg">Kg</option>
                        <option value="M3">M3</option>
                        <option value="Trip">Trip</option>
                        <option value="Unit">Unit</option> -->
                      </select>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="label_rate_qty">QTY</label>
                      <input type="text" name="rate_qty" id="rate_qty" class="form-control qty">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="label_rate_price">Price</label>
                      <div class="input-group">
                        <input type="text" name="rate_price" id="rate_price" class="form-control col-md-10">
                        <select name="rate_prices" id="rate_prices" class="form-control input-group-addon col-md-2" style="background: #E3E6EA;">
                          <option value="IDR" selected="selected">IDR</option>
                          <option value="USD">USD</option>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="label_note">Note</label>
                      <textarea name="note" id="note" class="form-control"></textarea>
                    </div>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" onclick="saveRate()" id="btnSaveR" class="btn btn-success">Save</button>
                <button type="button" class="btn btn-light btn-close" data-dismiss="modal">Cancel</button>
              </div>
              <!-- <?php echo form_close(); ?> -->
            </form>
            </div>
          </div>
        </div>
        <!-- Modal Ends -->

        <div class="modal fade" id="formCost" tabindex="-1" role="dialog" aria-labelledby="formCostLabel">
          <div class="modal-dialog" role="document" style="margin-top: 15px;margin-bottom: 0">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="formCostLabel">Estimation Cost</h5>
                <button type="button" class="close btn-close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form class="saveDep form">
              <div class="modal-body">
                <div class="row">
                  <input type="hidden" name="id_quo_est" id="id_quo_est" value="<?php echo $quo->id_quotation; ?>">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="label_est_item_cost">Item Cost</label>
                      <select name="est_item_cost" id="est_item_cost" class="form-control modal2_select">
                        <option selected="selected" disabled="disabled"> - Select Item Cost - </option>
                        <?php foreach($getdata as $col){ ?>
                        <option value="<?php echo $col->item ?>"><?php echo $col->item ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="label_est_unit">Unit</label>
                      <select name="est_unit" id="est_unit" class="form-control modal2_select">
                        <option selected="selected" disabled="disabled"> - Select Unit - </option>
                        <?php foreach($getuniit as $kill){ ?>
                        <option value="<?php echo $kill->unit ?>"><?php echo $kill->unit ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="label_est_qty">QTY</label>
                      <input type="text" name="est_qty" id="est_qty" class="form-control qty">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="label_est_price">Price</label>
                      <div class="input-group">
                        <input type="text" name="est_price" id="est_price" class="form-control col-md-10">
                        <select name="est_prices" id="est_prices" class="form-control input-group-addon col-md-2" style="background: #E3E6EA;">
                          <option value="IDR" selected="selected">IDR</option>
                          <option value="USD">USD</option>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="label_vendor">Vendor</label>
                      <select name="vendor" id="vendor" class="form-control modal2_select">
                        <option value="CV. MAKMUR SENTOSA DAN ABADI">CV. MAKMUR SENTOSA DAN ABADI</option>
                        <option value="PT ASIA INDO JAWA">PT ASIA INDO JAWA</option>
                        <option value="PT BUMI ABADI JAYA">PT BUMI ABADI JAYA</option>
                        <option value="PT CEMERLANG SELALU">PT CEMERLANG SELALU</option>
                        <option value="PT GOLDEN JAYA SELALU">PT GOLDEN JAYA SELALU</option>
                        <option value="PT. ARCA INDONESIA">PT. ARCA INDONESIA</option>
                        <option value="PT. INTAN MUTIARA CEMERLANG">PT. INTAN MUTIARA CEMERLANG</option>
                        <option value="PT. KERAJAAN MAJAPAHIT">PT. KERAJAAN MAJAPAHIT</option>
                        <option value="PT. KURNIA JAYA RAYA">PT. KURNIA JAYA RAYA</option>
                        <option value="PT. MUTIARA YANG HILANG">PT. MUTIARA YANG HILANG</option>
                        <option value="PT. PACIFIC MARITIM INDO">PT. PACIFIC MARITIM INDO</option>
                        <option value="PT. PANTJA DUNIA ALAM">PT. PANTJA DUNIA ALAM</option>
                        <option value="PT. SHIPPING INDONESIA MAJU">PT. SHIPPING INDONESIA MAJU</option>
                        <option value="PT. TEGUH DUNIA ABADIPT. TEGUH DUNIA ABADI">PT. TEGUH DUNIA ABADI</option>
                        <option value="PT.PRATAMA EXPRESINDO LOGISTIK">PT.PRATAMA EXPRESINDO LOGISTIK</option>
                        <option value="PT.TRANS PRATAMA SEJAHTERA">PT.TRANS PRATAMA SEJAHTERA</option>

                      </select>
                    </div>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" onclick="saveEst()" id="btnSaveE" class="btn btn-success">Save</button>
                <button type="button" class="btn btn-light btn-close" data-dismiss="modal">Cancel</button>
              </div>
            </form>
            </div>
          </div>
        </div>
        <!-- Modal Ends -->

<?php 
  $this->load->view('template/footer');
  // $this->load->view('template/fixed-plugin');
  $this->load->view('template/js');
?>
<script type="text/javascript">
  if ($(".datepicker").length) {
    $('.datepicker').datepicker({
      enableOnReadonly: true,
      todayHighlight: true,
      autoclose: true,
      format: "dd/mm/yyyy"
    });
  }
  $(".single-select").select2({
    width: '100%',
    // dropdownParent: $('#addQuotation'),
  });
  // $(".modal1_select").select2({
  //   width: '100%',
  //   dropdownParent: $('#rate'),
  // });
  // $(".modal2_select").select2({
  //   width: '100%',
  //   dropdownParent: $('#cost'),
  // });
  $('#tableItem').DataTable({
      "aLengthMenu": [
        [5, 10, 15, -1],
        [5, 10, 15, "All"]
      ],
      "iDisplayLength": 10,
      "language": {
        search: ""
      },
      "bSort" : false,
      // "dom": 'Bfrtip',
      // "buttons": [
      //   'copy', 'csv', 'excel', 'pdf', 'print'
      // ]
    });

  $('#tableCost').DataTable({
      "aLengthMenu": [
        [5, 10, 15, -1],
        [5, 10, 15, "All"]
      ],
      "iDisplayLength": 10,
      "language": {
        search: ""
      },
      "bSort" : false,
      // "dom": 'Bfrtip',
      // "buttons": [
      //   'copy', 'csv', 'excel', 'pdf', 'print'
      // ]
    });
  $(document).ready(function() {
    $("#btnShow").collapse('toggle');
    // $('#buttonModal').click(function() {
    //   $('html').css('overflow', 'hidden');
    //   $('body').bind('touchmove', function(e) {
    //     e.preventDefault()
    //   });
    // });
    // $('.btn-close').click(function() {
    //   $('html').css('overflow', 'scroll');
    //   $('body').unbind('touchmove');
    // });
    $('.qty').inputmask({
      alias: 'currency',
      prefix: '',
    });
    $('#price').inputmask({
      alias: 'currency',
      prefix: '',
    });
  });

  function showTable(){
    $("#btnShow").collapse('toggle');
    $("#tableBottom").collapse('toggle');
    $("#btnSave").collapse('toggle');
  }
  function clickRate(){ 
    document.getElementById('cardRate').style.cssText = 'display: block';
    document.getElementById('cardCost').style.cssText = 'display: none';
  }
  function clickCost(){
    document.getElementById('cardRate').style.cssText = 'display: none';
    document.getElementById('cardCost').style.cssText = 'display: block';
  }
</script>
<?php 
  $this->load->view('cargo/js-crud/crud-quotation');
?>