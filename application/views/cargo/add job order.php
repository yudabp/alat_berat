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
  label.col-form-label{
    font-size: 13px;
  }
</style>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row mb-4">
            <div class="col-12 d-flex align-items-center justify-content-between">
              <h4 class="page-title">Add Job Order</h4>
              <div class="d-flex align-items-center">
                <div class="wrapper mr-4 d-none d-sm-block">
                  <p class="mb-0">Summary for
                    <b class="mb-0"><i id="bulan"></i> <i id="tahun"></i></b>
                  </p>
                </div>
              </div>
            </div>
          </div>
          <!-- <form id="addQuotation"> -->
          <?php 
            $quonum = $_GET['quonum'];
            $quo = $this->db->get_where('quotation',['quote_number'=>$quonum])->row();
            $job = $this->db->get_where('job_order',['id_quotation'=>$quo->id_quotation]);
            $jo = $job->row();
            $data = $this->db->get_where('jo_data',['id_job_order'=>$jo->id_job_order]);
            $vdata = $data->row();
            $sea = $this->db->get_where('jo_data_sea',['id_job_order'=>$jo->id_job_order]);
            $vsea = $sea->row();
            $air = $this->db->get_where('jo_data_air',['id_job_order'=>$jo->id_job_order]);
            $vair = $air->row();
           ?>
            <div class="row grid-margin">            
              <div class="col-md-6 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title mb-3">Data Job Order</h4>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="label_jo_number">Job Order Number</label>
                          <input type="text" class="form-control" name="jo_number" id="jo_number" <?php if ($job->num_rows()>0){?>value="<?php echo $jo->jo_number; ?>"<?php } ?> value="<?php echo $kodeunik; ?>" readonly>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="label_jo_date">Job Order Date</label>
                          <input type="text" class="form-control datepicker" name="jo_date" id="jo_date" <?php if ($job->num_rows()>0){?>value="<?php echo $jo->jo_date; ?>"<?php } ?> value="<?php echo date("d/m/Y"); ?>" readonly>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="label_jo_type">Job Type</label>
                          <!-- <input type="text" class="form-control" name="customer_name" id="customer_name"> -->
                          <select name="jo_type" id="jo_type" class="single-select form-control">
                            <option <?php if ($job->num_rows()<=0){?>selected<?php } ?> disabled="disabled"> - Job Type - </option>
                            <option <?php if ($jo->jo_type == "Import"){?>selected<?php } ?> value="Import">Import</option>
                            <option <?php if ($jo->jo_type == "Export"){?>selected<?php } ?> value="Export">Export</option>
                            <option <?php if ($jo->jo_type == "Domestic"){?>selected<?php } ?> value="Domestic">Domestic</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-6 mb-3">
                        <div class="form-group">
                          <label for="label_freight_type">Freight Type</label>
                          <!-- <input type="text" class="form-control" name="customer_name" id="customer_name"> -->
                          <select name="freight_type" id="freight_type" class="single-select form-control">
                            <option <?php if ($job->num_rows()<=0){?>selected<?php } ?> disabled="disabled"> - Freight Type - </option>
                            <option <?php if ($jo->freight_type == "PREPAID"){?>selected<?php } ?> value="PREPAID">PREPAID</option>
                            <option <?php if ($jo->freight_type == "COLLECT"){?>selected<?php } ?> value="COLLECT">COLLECT</option>
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
                    <h4 class="card-title mb-3">Data Quotation</h4>
                    <input type="hidden" class="form-control" name="id_quotation" id="id_quotation" readonly value="<?php echo $quo->id_quotation; ?>">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="label_quote_number">Quote Number</label>
                          <input type="text" class="form-control" name="quote_number" id="quote_number" readonly value="<?php echo $quo->quote_number; ?>">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="label_customer_name">Customer Name</label>
                          <input type="text" class="form-control" name="customer_name" id="customer_name" readonly value="<?php echo $quo->customer_name; ?>">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label for="label_subject">Subject</label>
                          <textarea type="text" class="form-control" name="subject" id="subject" rows="2" readonly><?php echo $quo->subject; ?></textarea>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row grid-margin collapse <?php if ($job->num_rows()<=0){?>show<?php } ?>" id="btnShow">
              <div class="col-md-6" style="float: left;">
                <a href="<?php echo base_url() ?>job-order" class="btn btn-light btn-close ml-2">Back</a>
              </div>
              <div class="col-md-6" style="float: right;">
                <button type="button" class="btn btn-success ml-2" onclick="saveJob()" style="float: right;">Save</button>
              </div>
            </div>
            <div class="row grid-margin collapse <?php if ($job->num_rows()>0){?>show<?php } ?>" id="tableBottom">
              <ul class="nav nav-tabs tab-solid tab-solid-danger ml-2 mb-0" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" id="btnItem" data-toggle="tab" role="tab" onclick="clickData()">Data</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="btnCost" data-toggle="tab" role="tab" onclick="clickSea()">Sea</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="btnItem" data-toggle="tab" role="tab" onclick="clickAir()">Air</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="btnCost" data-toggle="tab" role="tab" onclick="clickReport()">Daily Report</a>
                </li>
              </ul>
              <!-- <div class="col-md-12 ml-2" style="border: 1px solid #000;max-width: 98%;"></div> -->
              <div class="col-md-12" style="display: block;" id="row_data">
                <div class="row grid-margin">            
                  <div class="col-md-6 grid-margin">
                    <div class="card">
                      <div class="card-body">
                        <!-- <h4 class="card-title mb-3">Data Job Order</h4> -->
                        <div class="form-group row m-0">
                          <label for="label_shipper" class="col-sm-3 col-form-label text-right">Shipper :</label>
                          <div class="col-sm-9 mb-1">
                            <select name="shipper" id="shipper" class="single-select form-control">
                              <option <?php if ($vdata->shipper == ""){?>selected<?php } ?> disabled="disabled"> - Shipper - </option>
                            <?php
                              foreach($client as $row){
                                ?>
                                  <option <?php if($vdata->shipper == $row->company){ ?>selected<?php } ?> value="<?php echo $row->company; ?>"><?php echo $row->company; ?></option>
                                <?php
                              }
                            ?>
                            </select>
                          </div>
                        </div>
                        <div class="form-group row m-0">
                          <label for="label_consignee" class="col-sm-3 col-form-label text-right">Consignee :</label>
                          <div class="col-sm-9 mb-1">
                            <select name="consignee" id="consignee" class="single-select form-control">
                              <option <?php if ($vdata->consignee == ""){?>selected<?php } ?> disabled="disabled"> - Consignee - </option>
                              <option <?php if ($vdata->consignee == "CV. MAKMUR SENTOSA DAN ABADI"){?>selected<?php } ?> value="CV. MAKMUR SENTOSA DAN ABADI">CV. MAKMUR SENTOSA DAN ABADI</option>
                              <option <?php if ($vdata->consignee == "LLC"){?>selected<?php } ?> value="LLC">LLC</option>
                              <option <?php if ($vdata->consignee == "PT ASIA INDO JAWA"){?>selected<?php } ?> value="PT ASIA INDO JAWA">PT ASIA INDO JAWA</option>
                              <option <?php if ($vdata->consignee == "PT BUMI ABADI JAYA"){?>selected<?php } ?> value="PT BUMI ABADI JAYA">PT BUMI ABADI JAYA</option>
                              <option <?php if ($vdata->consignee == "PT CEMERLANG SELALU"){?>selected<?php } ?> value="PT CEMERLANG SELALU">PT CEMERLANG SELALU</option>
                              <option <?php if ($vdata->consignee == "PT GOLDEN JAYA SELALU"){?>selected<?php } ?> value="PT GOLDEN JAYA SELALU">PT GOLDEN JAYA SELALU</option>
                              <option <?php if ($vdata->consignee == "PT. ARCA INDONESIA"){?>selected<?php } ?> value="PT. ARCA INDONESIA">PT. ARCA INDONESIA</option>
                              <option <?php if ($vdata->consignee == "PT. INTAN MUTIARA CEMERLANG"){?>selected<?php } ?> value="PT. INTAN MUTIARA CEMERLANG">PT. INTAN MUTIARA CEMERLANG</option>
                              <option <?php if ($vdata->consignee == "PT. KERAJAAN MAJAPAHIT"){?>selected<?php } ?> value="PT. KERAJAAN MAJAPAHIT">PT. KERAJAAN MAJAPAHIT</option>
                              <option <?php if ($vdata->consignee == "PT. KURNIA JAYA RAYA"){?>selected<?php } ?> value="PT. KURNIA JAYA RAYA">PT. KURNIA JAYA RAYA</option>
                            </select>
                          </div>
                        </div>
                        <div class="form-group row m-0">
                          <label for="label_notify_party" class="col-sm-3 col-form-label text-right">Notify Party :</label>
                          <div class="col-sm-9 mb-1">
                            <select name="notify_party" id="notify_party" class="single-select form-control">
                              <option <?php if ($vdata->notify_party == ""){?>selected<?php } ?> disabled="disabled"> - Notify Party - </option>
                              <option <?php if ($vdata->notify_party == "CV. MAKMUR SENTOSA DAN ABADI"){?>selected<?php } ?> value="CV. MAKMUR SENTOSA DAN ABADI">CV. MAKMUR SENTOSA DAN ABADI</option>
                              <option <?php if ($vdata->notify_party == "LLC"){?>selected<?php } ?> value="LLC">LLC</option>
                              <option <?php if ($vdata->notify_party == "PT ASIA INDO JAWA"){?>selected<?php } ?> value="PT ASIA INDO JAWA">PT ASIA INDO JAWA</option>
                              <option <?php if ($vdata->notify_party == "PT BUMI ABADI JAYA"){?>selected<?php } ?> value="PT BUMI ABADI JAYA">PT BUMI ABADI JAYA</option>
                              <option <?php if ($vdata->notify_party == "PT CEMERLANG SELALU"){?>selected<?php } ?> value="PT CEMERLANG SELALU">PT CEMERLANG SELALU</option>
                              <option <?php if ($vdata->notify_party == "PT GOLDEN JAYA SELALU"){?>selected<?php } ?> value="PT GOLDEN JAYA SELALU">PT GOLDEN JAYA SELALU</option>
                              <option <?php if ($vdata->notify_party == "PT. ARCA INDONESIA"){?>selected<?php } ?> value="PT. ARCA INDONESIA">PT. ARCA INDONESIA</option>
                              <option <?php if ($vdata->notify_party == "PT. INTAN MUTIARA CEMERLANG"){?>selected<?php } ?> value="PT. INTAN MUTIARA CEMERLANG">PT. INTAN MUTIARA CEMERLANG</option>
                              <option <?php if ($vdata->notify_party == "PT. KERAJAAN MAJAPAHIT"){?>selected<?php } ?> value="PT. KERAJAAN MAJAPAHIT">PT. KERAJAAN MAJAPAHIT</option>
                              <option <?php if ($vdata->notify_party == "PT. KURNIA JAYA RAYA"){?>selected<?php } ?> value="PT. KURNIA JAYA RAYA">PT. KURNIA JAYA RAYA</option>
                            </select>
                          </div>
                        </div>
                        <div class="form-group row m-0">
                          <label for="label_agent" class="col-sm-3 col-form-label text-right">Agent :</label>
                          <div class="col-sm-9 mb-1">
                            <select name="agent" id="agent" class="single-select form-control">
                              <option <?php if ($vdata->agent == ""){?>selected<?php } ?> disabled="disabled"> - Agent - </option>
                              <option <?php if ($vdata->agent == "CV. MAKMUR SENTOSA DAN ABADI"){?>selected<?php } ?> value="CV. MAKMUR SENTOSA DAN ABADI">CV. MAKMUR SENTOSA DAN ABADI</option>
                              <option <?php if ($vdata->agent == "LLC"){?>selected<?php } ?> value="LLC">LLC</option>
                              <option <?php if ($vdata->agent == "PT ASIA INDO JAWA"){?>selected<?php } ?> value="PT ASIA INDO JAWA">PT ASIA INDO JAWA</option>
                              <option <?php if ($vdata->agent == "PT BUMI ABADI JAYA"){?>selected<?php } ?> value="PT BUMI ABADI JAYA">PT BUMI ABADI JAYA</option>
                              <option <?php if ($vdata->agent == "PT CEMERLANG SELALU"){?>selected<?php } ?> value="PT CEMERLANG SELALU">PT CEMERLANG SELALU</option>
                              <option <?php if ($vdata->agent == "PT GOLDEN JAYA SELALU"){?>selected<?php } ?> value="PT GOLDEN JAYA SELALU">PT GOLDEN JAYA SELALU</option>
                              <option <?php if ($vdata->agent == "PT. ARCA INDONESIA"){?>selected<?php } ?> value="PT. ARCA INDONESIA">PT. ARCA INDONESIA</option>
                              <option <?php if ($vdata->agent == "PT. INTAN MUTIARA CEMERLANG"){?>selected<?php } ?> value="PT. INTAN MUTIARA CEMERLANG">PT. INTAN MUTIARA CEMERLANG</option>
                              <option <?php if ($vdata->agent == "PT. KERAJAAN MAJAPAHIT"){?>selected<?php } ?> value="PT. KERAJAAN MAJAPAHIT">PT. KERAJAAN MAJAPAHIT</option>
                              <option <?php if ($vdata->agent == "PT. KURNIA JAYA RAYA"){?>selected<?php } ?> value="PT. KURNIA JAYA RAYA">PT. KURNIA JAYA RAYA</option>
                            </select>
                          </div>
                        </div>
                        <div class="form-group row m-0">
                          <label for="label_etd" class="col-sm-3 col-form-label text-right">ETD :</label>
                          <div class="col-sm-9 mb-1">
                            <input type="text" class="form-control datepicker" name="etd" id="etd" value="<?php echo $vdata->etd; ?>" readonly>
                          </div>
                        </div>
                        <div class="form-group row m-0">
                          <label for="label_eta" class="col-sm-3 col-form-label text-right">ETA :</label>
                          <div class="col-sm-9 mb-1">
                            <input type="text" class="form-control datepicker" name="eta" id="eta" value="<?php echo $vdata->eta; ?>" readonly>
                          </div>
                        </div>
                        <div class="form-group row m-0">
                          <label for="label_stuffing" class="col-sm-3 col-form-label text-right">Stuffing :</label>
                          <div class="col-sm-9 mb-1">
                            <input type="text" class="form-control datepicker" name="stuffing" id="stuffing" value="<?php echo $vdata->stuffing; ?>" readonly>
                          </div>
                        </div>
                        <div class="form-group row m-0">
                          <label for="label_receive" class="col-sm-3 col-form-label text-right">Receive :</label>
                          <div class="col-sm-9 mb-1">
                            <select name="receive" id="receive" class="single-select form-control">
                              <option <?php if ($vdata->receive == ""){?>selected<?php } ?> disabled> - Receive - </option>
                              <option <?php if ($vdata->receive == "AACHEN (GERMANY)"){?>selected<?php } ?>>AACHEN (GERMANY)</option>
                              <option <?php if ($vdata->receive == "AARHUS (DENMARK)"){?>selected<?php } ?>>AARHUS (DENMARK)</option>
                              <option <?php if ($vdata->receive == "ABU DHABI (UNITED ARAB EMIRATES)"){?>selected<?php } ?>>ABU DHABI (UNITED ARAB EMIRATES)</option>
                              <option <?php if ($vdata->receive == "ABUDHABI (SAUDI ARABIA)"){?>selected<?php } ?>>ABUDHABI (SAUDI ARABIA)</option>
                              <option <?php if ($vdata->receive == "ADELAIDE (AUSTRALIA)"){?>selected<?php } ?>>ADELAIDE (AUSTRALIA)</option>
                              <option <?php if ($vdata->receive == "AHMEDABAD (INDIA)"){?>selected<?php } ?>>AHMEDABAD (INDIA)</option>
                              <option <?php if ($vdata->receive == "ALEXANDRIA (EGYPT)"){?>selected<?php } ?>>ALEXANDRIA (EGYPT)</option>
                              <option <?php if ($vdata->receive == "ALGECIRAS (SPAIN)"){?>selected<?php } ?>>ALGECIRAS (SPAIN)</option>
                              <option <?php if ($vdata->receive == "AMBARLI (TURKEY)"){?>selected<?php } ?>>AMBARLI (TURKEY)</option>
                              <option <?php if ($vdata->receive == "AMBON (INDONESIA)"){?>selected<?php } ?>>AMBON (INDONESIA)</option>
                            </select>
                          </div>
                        </div>
                        <div class="form-group row m-0">
                          <label for="label_loading" class="col-sm-3 col-form-label text-right">Loading :</label>
                          <div class="col-sm-9 mb-1">
                            <select name="loading" id="loading" class="single-select form-control">
                              <option <?php if ($vdata->loading == ""){?>selected<?php } ?> disabled> - Loading - </option>
                              <option <?php if ($vdata->loading == "AACHEN (GERMANY)"){?>selected<?php } ?>>AACHEN (GERMANY)</option>
                              <option <?php if ($vdata->loading == "AARHUS (DENMARK)"){?>selected<?php } ?>>AARHUS (DENMARK)</option>
                              <option <?php if ($vdata->loading == "ABU DHABI (UNITED ARAB EMIRATES)"){?>selected<?php } ?>>ABU DHABI (UNITED ARAB EMIRATES)</option>
                              <option <?php if ($vdata->loading == "ABUDHABI (SAUDI ARABIA)"){?>selected<?php } ?>>ABUDHABI (SAUDI ARABIA)</option>
                              <option <?php if ($vdata->loading == "ADELAIDE (AUSTRALIA)"){?>selected<?php } ?>>ADELAIDE (AUSTRALIA)</option>
                              <option <?php if ($vdata->loading == "AHMEDABAD (INDIA)"){?>selected<?php } ?>>AHMEDABAD (INDIA)</option>
                              <option <?php if ($vdata->loading == "ALEXANDRIA (EGYPT)"){?>selected<?php } ?>>ALEXANDRIA (EGYPT)</option>
                              <option <?php if ($vdata->loading == "ALGECIRAS (SPAIN)"){?>selected<?php } ?>>ALGECIRAS (SPAIN)</option>
                              <option <?php if ($vdata->loading == "AMBARLI (TURKEY)"){?>selected<?php } ?>>AMBARLI (TURKEY)</option>
                              <option <?php if ($vdata->loading == "AMBON (INDONESIA)"){?>selected<?php } ?>>AMBON (INDONESIA)</option>
                            </select>
                          </div>
                        </div>
                        <div class="form-group row m-0">
                          <label for="label_discharge" class="col-sm-3 col-form-label text-right">Discharge :</label>
                          <div class="col-sm-9 mb-1">
                            <select name="discharge" id="discharge" class="single-select form-control">
                              <option <?php if ($vdata->discharge == ""){?>selected<?php } ?> disabled> - Discharge - </option>
                              <option <?php if ($vdata->discharge == "AACHEN (GERMANY)"){?>selected<?php } ?>>AACHEN (GERMANY)</option>
                              <option <?php if ($vdata->discharge == "AARHUS (DENMARK)"){?>selected<?php } ?>>AARHUS (DENMARK)</option>
                              <option <?php if ($vdata->discharge == "ABU DHABI (UNITED ARAB EMIRATES)"){?>selected<?php } ?>>ABU DHABI (UNITED ARAB EMIRATES)</option>
                              <option <?php if ($vdata->discharge == "ABUDHABI (SAUDI ARABIA)"){?>selected<?php } ?>>ABUDHABI (SAUDI ARABIA)</option>
                              <option <?php if ($vdata->discharge == "ADELAIDE (AUSTRALIA)"){?>selected<?php } ?>>ADELAIDE (AUSTRALIA)</option>
                              <option <?php if ($vdata->discharge == "AHMEDABAD (INDIA)"){?>selected<?php } ?>>AHMEDABAD (INDIA)</option>
                              <option <?php if ($vdata->discharge == "ALEXANDRIA (EGYPT)"){?>selected<?php } ?>>ALEXANDRIA (EGYPT)</option>
                              <option <?php if ($vdata->discharge == "ALGECIRAS (SPAIN)"){?>selected<?php } ?>>ALGECIRAS (SPAIN)</option>
                              <option <?php if ($vdata->discharge == "AMBARLI (TURKEY)"){?>selected<?php } ?>>AMBARLI (TURKEY)</option>
                              <option <?php if ($vdata->discharge == "AMBON (INDONESIA)"){?>selected<?php } ?>>AMBON (INDONESIA)</option>
                            </select>
                          </div>
                        </div>
                        <div class="form-group row m-0">
                          <label for="label_delivery" class="col-sm-3 col-form-label text-right">Delivery</label>
                          <div class="col-sm-9 mb-1">
                            <select name="delivery" id="delivery" class="single-select form-control">
                              <option <?php if ($vdata->delivery == ""){?>selected<?php } ?> disabled> - Delivery - </option>
                              <option <?php if ($vdata->delivery == "AACHEN (GERMANY)"){?>selected<?php } ?>>AACHEN (GERMANY)</option>
                              <option <?php if ($vdata->delivery == "AARHUS (DENMARK)"){?>selected<?php } ?>>AARHUS (DENMARK)</option>
                              <option <?php if ($vdata->delivery == "ABU DHABI (UNITED ARAB EMIRATES)"){?>selected<?php } ?>>ABU DHABI (UNITED ARAB EMIRATES)</option>
                              <option <?php if ($vdata->delivery == "ABUDHABI (SAUDI ARABIA)"){?>selected<?php } ?>>ABUDHABI (SAUDI ARABIA)</option>
                              <option <?php if ($vdata->delivery == "ADELAIDE (AUSTRALIA)"){?>selected<?php } ?>>ADELAIDE (AUSTRALIA)</option>
                              <option <?php if ($vdata->delivery == "AHMEDABAD (INDIA)"){?>selected<?php } ?>>AHMEDABAD (INDIA)</option>
                              <option <?php if ($vdata->delivery == "ALEXANDRIA (EGYPT)"){?>selected<?php } ?>>ALEXANDRIA (EGYPT)</option>
                              <option <?php if ($vdata->delivery == "ALGECIRAS (SPAIN)"){?>selected<?php } ?>>ALGECIRAS (SPAIN)</option>
                              <option <?php if ($vdata->delivery == "AMBARLI (TURKEY)"){?>selected<?php } ?>>AMBARLI (TURKEY)</option>
                              <option <?php if ($vdata->delivery == "AMBON (INDONESIA)"){?>selected<?php } ?>>AMBON (INDONESIA)</option>
                            </select>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 grid-margin">
                    <div class="card">
                      <div class="card-body">
                        <!-- <h4 class="card-title mb-3">Deskripsi</h4> -->
                        <div class="form-group row m-0">
                          <label for="label_hscode" class="col-sm-4 col-form-label text-right">HS. Code :</label>
                          <div class="col-sm-8 mb-1">
                            <input type="text" class="form-control" id="hs_code" name="hs_code" placeholder="HS. Code" value="<?php echo $vdata->hs_code; ?>">
                          </div>
                        </div>
                        <div class="form-group row m-0">
                          <label for="label_descofgoods" class="col-sm-4 col-form-label text-right">Desc. of Goods :</label>
                          <div class="col-sm-8 mb-1">
                            <textarea class="form-control" id="descofgoods" name="descofgoods" rows="23"><?php echo $vdata->deskripsi; ?></textarea>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-12" style="display: none;" id="row_sea">
                <div class="row grid-margin">            
                  <div class="col-md-6 grid-margin">
                    <div class="card">
                      <div class="card-body">
                        <div class="card-title mb-3">
                          <h4>Data Sea</h4>
                        </div>
                        <div class="form-group row m-0">
                          <label for="label_shipping_line" class="col-sm-4 col-form-label text-right">Shipping Line :</label>
                          <div class="col-sm-8 mb-1">
                            <select name="shipping_line" id="shipping_line" class="single-select form-control">
                              <option <?php if ($vsea->shipping_line == ""){?>selected<?php } ?> disabled="disabled"> - Shipping Line - </option>
                              <option <?php if ($vsea->shipping_line == "CV. MAKMUR SENTOSA DAN ABADI"){?>selected<?php } ?> value="CV. MAKMUR SENTOSA DAN ABADI">CV. MAKMUR SENTOSA DAN ABADI</option>
                              <option <?php if ($vsea->shipping_line == "LLC"){?>selected<?php } ?> value="LLC">LLC</option>
                              <option <?php if ($vsea->shipping_line == "PT ASIA INDO JAWA"){?>selected<?php } ?> value="PT ASIA INDO JAWA">PT ASIA INDO JAWA</option>
                              <option <?php if ($vsea->shipping_line == "PT BUMI ABADI JAYA"){?>selected<?php } ?> value="PT BUMI ABADI JAYA">PT BUMI ABADI JAYA</option>
                              <option <?php if ($vsea->shipping_line == "PT CEMERLANG SELALU"){?>selected<?php } ?> value="PT CEMERLANG SELALU">PT CEMERLANG SELALU</option>
                              <option <?php if ($vsea->shipping_line == "PT GOLDEN JAYA SELALU"){?>selected<?php } ?> value="PT GOLDEN JAYA SELALU">PT GOLDEN JAYA SELALU</option>
                              <option <?php if ($vsea->shipping_line == "PT. ARCA INDONESIA"){?>selected<?php } ?> value="PT. ARCA INDONESIA">PT. ARCA INDONESIA</option>
                              <option <?php if ($vsea->shipping_line == "PT. INTAN MUTIARA CEMERLANG"){?>selected<?php } ?> value="PT. INTAN MUTIARA CEMERLANG">PT. INTAN MUTIARA CEMERLANG</option>
                              <option <?php if ($vsea->shipping_line == "PT. KERAJAAN MAJAPAHIT"){?>selected<?php } ?> value="PT. KERAJAAN MAJAPAHIT">PT. KERAJAAN MAJAPAHIT</option>
                              <option <?php if ($vsea->shipping_line == "PT. KURNIA JAYA RAYA"){?>selected<?php } ?> value="PT. KURNIA JAYA RAYA">PT. KURNIA JAYA RAYA</option>
                            </select>
                          </div>
                        </div>
                        <div class="form-group row m-0">
                          <label for="label_shipment_number" class="col-sm-4 col-form-label text-right">Shipment Number :</label>
                          <div class="col-sm-8 mb-1">
                            <input type="text" name="shipment_number" id="shipment_number" class="form-control" placeholder="Shipment Number" value="<?php echo $vsea->shipment_number; ?>">
                          </div>
                        </div>
                        <div class="form-group row m-0">
                          <label for="label_shipping_marks" class="col-sm-4 col-form-label text-right">Shipping Marks :</label>
                          <div class="col-sm-8 mb-1">
                            <textarea name="shipping_marks" id="shipping_marks" class="form-control"><?php echo $vsea->shipping_mark ?></textarea>
                          </div>
                        </div>
                        <div class="form-group row m-0">
                          <label for="label_qty" class="col-sm-4 col-form-label text-right">Qty :</label>
                          <div class="col-sm-2 mb-1">
                            <input type="number" name="qty" id="qty" class="form-control" value="<?php echo $vsea->qty; ?>">
                          </div>
                          <div class="col-sm-3 mb-1">
                            <select name="piece" id="piece" class="form-control single-select">
                              <option <?php if ($vsea->piece == ""){?>selected<?php } ?> disabled>---</option>
                              <option <?php if ($vsea->piece == "Bag"){?>selected<?php } ?>>Bag</option>
                              <option <?php if ($vsea->piece == "Bale"){?>selected<?php } ?>>Bale</option>
                              <option <?php if ($vsea->piece == "Box"){?>selected<?php } ?>>Box</option>
                              <option <?php if ($vsea->piece == "Carton"){?>selected<?php } ?>>Carton</option>
                              <option <?php if ($vsea->piece == "Case"){?>selected<?php } ?>>Case</option>
                              <option <?php if ($vsea->piece == "Crate"){?>selected<?php } ?>>Crate</option>
                              <option <?php if ($vsea->piece == "Drum"){?>selected<?php } ?>>Drum</option>
                              <option <?php if ($vsea->piece == "Package"){?>selected<?php } ?>>Package</option>
                              <option <?php if ($vsea->piece == "Pallet"){?>selected<?php } ?>>Pallet</option>
                              <option <?php if ($vsea->piece == "Roll"){?>selected<?php } ?>>Roll</option>
                              <option <?php if ($vsea->piece == "Unit"){?>selected<?php } ?>>Unit</option>
                            </select>
                          </div>
                          <div class="col-sm-3 mb-1">
                            <select name="type_sea" id="type_sea" class="form-control single-select">
                              <option <?php if ($vsea->type == ""){?>selected<?php } ?> disabled>---</option>
                              <option <?php if ($vsea->type == "FCL"){?>selected<?php } ?>>FCL</option>
                              <option <?php if ($vsea->type == "LCL"){?>selected<?php } ?>>LCL</option>
                            </select>
                          </div>
                        </div>
                        <div class="form-group row m-0">
                          <label for="label_bl_number" class="col-sm-4 col-form-label text-right">BL. Number :</label>
                          <div class="col-sm-8 mb-1">
                            <input type="text" class="form-control" name="bl_number" id="bl_number" placeholder="BL. Number" value="<?php echo $vsea->bl_number; ?>">
                          </div>
                        </div>
                        <div class="form-group row m-0">
                          <label for="label_mbl_number" class="col-sm-4 col-form-label text-right">MBL. Number :</label>
                          <div class="col-sm-8 mb-1">
                            <input type="text" class="form-control" name="mbl_number" id="mbl_number" placeholder="MBL. Number"  value="<?php echo $vsea->mbl_number; ?>">
                          </div>
                        </div>
                        <div class="form-group row m-0">
                          <label for="label_voyage" class="col-sm-4 col-form-label text-right">Voyage :</label>
                          <div class="col-sm-8 mb-1">
                            <input type="text" class="form-control" name="voyage" id="voyage" placeholder="Voyage" value="<?php echo $vsea->voyage; ?>">
                          </div>
                        </div>
                        <div class="form-group row m-0">
                          <label for="label_vessel" class="col-sm-4 col-form-label text-right">Vessel :</label>
                          <div class="col-sm-8 mb-1">
                            <input type="text" class="form-control" name="vessel" id="vessel" placeholder="Vessel" value="<?php echo $vsea->vessel; ?>">
                          </div>
                        </div>
                        <div class="form-group row m-0">
                          <label for="label_issued_office" class="col-sm-4 col-form-label text-right">Issued Office :</label>
                          <div class="col-sm-8 mb-1">
                            <input type="text" class="form-control" name="issued_office" id="issued_office" placeholder="Issued Office" value="<?php echo $vsea->issued_office; ?>">
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 grid-margin">
                    <div class="card">
                      <div class="card-body">
                        <div class="card-title row">
                          <h4>Data Container</h4>
                          <div class="col-md-12 text-left">
                            <button class="btn btn-inverse-success btn-sm" data-toggle="modal" data-target="#addContainer" id="addContainerBtn"><i class="fa fa-plus">Add Container</i></button>
                          </div>
                        </div>
                        <div class="row table-responsive">
                          <table class="table table-striped">
                            <thead style="font-weight:bold !important">
                              <tr class="text-center">  
                                <th width="4%">NO</th>
                                <th width="18%">CONTAINER NO</th>   
                                <th width="18%">SEAL NO</th>            
                                <th width="12%">TYPE</th>
                                <th width="14%">MEAS</th>
                                <th width="14%">NET WEIGHT</th>
                                <th width="14%">GROSS WEIGHT</th>
                                <th width="5%">ACTION</th>  
                                <!-- <th rowspan="2" width="3%" style="text-align: center;">DEL</th>            -->
                              </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $data_container = $this->db->get_where("jo_data_container", ['id_job_order' => $jo->id_job_order ])->result();
                                    $i = 1;
                                    foreach($data_container as $row){
                                        ?>
                                        <tr>
                                            <td><?php echo $i; ?></td>
                                            <td><?php echo $row->container_number; ?></td>
                                            <td><?php echo $row->seal_number; ?></td>
                                            <td><?php echo $row->type; ?></td>
                                            <td><?php echo $row->measurement; ?></td>
                                            <td><?php echo $row->net_weight; ?></td>
                                            <td><?php echo $row->gross_weight; ?></td>
                                            <td>
                                                <div class="dropdown">
                                                    <button type="button" class="btn btn-icons btn-rounded text-center" data-toggle="dropdown">
                                                      <i class="ti-more-alt"></i>
                                                    </button>
                                                    <div class="dropdown-menu">
                                                      <button class="btn btn-link" data-toggle="tooltip" title="Edit" type="button" onclick="edit_container('<?php echo $row->id_data_container; ?>');"><i class="fa fa-pencil"></i></button>
                                                      <button class="btn btn-link" data-toggle="tooltip" title="Delete" type="button" onclick="del_container('<?php echo $row->id_data_container; ?>');"><i class="fa fa-trash-o"></i></button>
                                                    </div>
                                                  </div>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                ?>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-12" style="display: none;" id="row_air">
                <div class="row grid-margin">            
                  <div class="col-md-6 grid-margin">
                    <div class="card">
                      <div class="card-body">
                        <div class="card-title mb-3">
                          <h4>Data Air</h4>
                        </div>
                        <div class="form-group row m-0">
                          <label for="label_airlines" class="col-sm-4 col-form-label text-right">AirLines :</label>
                          <div class="col-sm-8 mb-1">
                            <select name="airlines" id="airlines" class="single-select form-control">
                              <option <?php if ($vair->airlines == ""){?>selected<?php } ?> disabled="disabled"> - AirLines - </option>
                              <option <?php if ($vair->airlines == "CITY"){?>selected<?php } ?>>CITY</option>
                              <option <?php if ($vair->airlines == "EMIRATES"){?>selected<?php } ?>>EMIRATES</option>
                              <option <?php if ($vair->airlines == "ETIHAD AIRWAYS"){?>selected<?php } ?>>ETIHAD AIRWAYS</option>
                              <option <?php if ($vair->airlines == "GARUDA INDONESIA"){?>selected<?php } ?>>GARUDA INDONESIA</option>
                              <option <?php if ($vair->airlines == "LION AIR"){?>selected<?php } ?>>LION AIR</option>
                              <option <?php if ($vair->airlines == "OMAN AIRWAYS"){?>selected<?php } ?>>OMAN AIRWAYS</option>
                              <option <?php if ($vair->airlines == "QATAR AIRWAYS"){?>selected<?php } ?>>QATAR AIRWAYS</option>
                              <option <?php if ($vair->airlines == "SINGAPORE AIRLINES"){?>selected<?php } ?>>SINGAPORE AIRLINES</option>
                            </select>
                          </div>
                        </div>
                        <div class="form-group row m-0">
                          <label for="label_flight_number" class="col-sm-4 col-form-label text-right">Flight Number :</label>
                          <div class="col-sm-8 mb-1">
                            <input type="text" name="flight_number" id="flight_number" class="form-control" placeholder="Flight Number" value="<?php echo $vair->flight_number; ?>">
                          </div>
                        </div>
                        <div class="form-group row m-0">
                          <label for="label_hawb_number" class="col-sm-4 col-form-label text-right">HAWB Number :</label>
                          <div class="col-sm-8 mb-1">
                            <input type="text" class="form-control" name="hawb_number" id="hawb_number" placeholder="HAWB Number" value="<?php echo $vair->hawb_number; ?>">
                          </div>
                        </div>
                        <div class="form-group row m-0">
                          <label for="label_mawb_number" class="col-sm-4 col-form-label text-right">MAWB Number :</label>
                          <div class="col-sm-8 mb-1">
                            <input type="text" class="form-control" name="mawb_number" id="mawb_number" placeholder="MAWB Number" value="<?php echo $vair->mawb_number; ?>">
                          </div>
                        </div>
                        <div class="form-group row m-0">
                          <label for="label_aita_code" class="col-sm-4 col-form-label text-right">AITA Code :</label>
                          <div class="col-sm-8 mb-1">
                            <input type="text" class="form-control" name="aita_code" id="aita_code"  placeholder="AITA Code" value="<?php echo $vair->aita_code; ?>">
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 grid-margin">
                    <div class="card">
                      <div class="card-body">
                        <div class="card-title row">
                          <h4>Data Pieces</h4>
                          <div class="col-md-12 text-left">
                            <button class="btn btn-inverse-success btn-sm" id="addPiecesBtn" data-toggle="modal" data-target="#addPieces"><i class="fa fa-plus">Add Pieces</i></button>
                          </div>
                        </div>
                        <div class="row table-responsive">
                          <table class="table table-striped">
                            <thead style="font-weight:bold !important">
                              <tr class="text-center">  
                                <th>NO</th>
                                <th>NO OF PIECES</th>   
                                <th>TYPE</th>            
                                <th>GROSS WEIGHT</th>
                                <th>CHARGEABLE WEIGHT</th>
                                <th>ACTION</th>  
                                <!-- <th rowspan="2" width="3%" style="text-align: center;">DEL</th>            -->
                              </tr>
                            </thead>
                            <tbody>
                            <?php
                                    $data_pieces = $this->db->get_where("jo_data_pieces", ['id_job_order' => $jo->id_job_order ])->result();
                                    $i = 1;
                                    foreach($data_pieces as $row){
                                        ?>
                                        <tr>
                                            <td><?php echo $i; ?></td>
                                            <td><?php echo $row->no_of_pieces; ?></td>
                                            <td><?php echo $row->type; ?></td>
                                            <td><?php echo $row->gross_weight; ?></td>
                                            <td><?php echo $row->chargeable_weight; ?></td>
                                            <td>
                                                <div class="dropdown">
                                                    <button type="button" class="btn btn-icons btn-rounded text-center" data-toggle="dropdown">
                                                      <i class="ti-more-alt"></i>
                                                    </button>
                                                    <div class="dropdown-menu">
                                                      <button class="btn btn-link" data-toggle="tooltip" title="Edit" type="button" onclick="edit_pieces('<?php echo $row->id_data_pieces; ?>');"><i class="fa fa-pencil"></i></button>
                                                      <button class="btn btn-link" data-toggle="tooltip" title="Delete" type="button" onclick="del_pieces('<?php echo $row->id_data_pieces; ?>');"><i class="fa fa-trash-o"></i></button>
                                                    </div>
                                                  </div>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                ?>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-12" style="display: none;" id="row_report">
                <div class="row grid-margin">            
                  <div class="col-md-12 grid-margin">
                    <div class="card">
                      <div class="card-body">
                        <div class="card-title row">
                          <!-- <h4>Data Container</h4> -->
                          <div class="col-md-12 text-left">
                            <button class="btn btn-inverse-success btn-sm" id="addStatusBtn" data-toggle="modal" data-target="#addStatus"><i class="fa fa-plus">Add Status</i></button>
                          </div>
                        </div>
                        <div class="row table-responsive">
                          <table class="table table-striped">
                            <thead style="font-weight:bold !important">
                              <tr class="text-center">  
                                <th width="5%">NO</th>
                                <th width="10%">DATE</th>   
                                <th width="10%">TIME</th>            
                                <th width="10%">STATUS</th>
                                <th width="60%">NOTE</th>
                                <th width="5%">ACTION</th>  
                                <!-- <th rowspan="2" width="3%" style="text-align: center;">DEL</th>            -->
                              </tr>
                            </thead>
                            <tbody>
                            <?php
                                    $data_status = $this->db->get_where("jo_data_status", ['id_job_order' => $jo->id_job_order ])->result();
                                    $i = 1;
                                    foreach($data_status as $row){
                                        ?>
                                        <tr>
                                            <td><?php echo $i; ?></td>
                                            <td><?php echo $row->date; ?></td>
                                            <td><?php echo $row->time; ?></td>
                                            <td><?php echo $row->status; ?></td>
                                            <td><?php echo $row->note; ?></td>
                                            <td>
                                                <div class="dropdown">
                                                    <button type="button" class="btn btn-icons btn-rounded text-center" data-toggle="dropdown">
                                                      <i class="ti-more-alt"></i>
                                                    </button>
                                                    <div class="dropdown-menu">
                                                      <button class="btn btn-link" data-toggle="tooltip" title="Edit" type="button" onclick="edit_status('<?php echo $row->id_data_status; ?>');"><i class="fa fa-pencil"></i></button>
                                                      <button class="btn btn-link" data-toggle="tooltip" title="Delete" type="button" onclick="del_status('<?php echo $row->id_data_status; ?>');"><i class="fa fa-trash-o"></i></button>
                                                    </div>
                                                  </div>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                ?>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row grid-margin collapse <?php if ($job->num_rows()>0){?>show<?php } ?>" id="btnSave">
              <!-- <button type="submit" class="btn btn-success ml-2">Save</button>
              <a href="<?php echo base_url() ?>job-order" class="ml-2"><button type="button" class="btn btn-light btn-close" data-dismiss="modal">Back</button></a> -->
              <div class="col-md-6" style="float: left;">
                <a href="<?php echo base_url() ?>job-order" class="btn btn-light btn-close ml-2">Back</a>
              </div>
              <div class="col-md-6" style="float: right;">
                <button type="button" class="btn btn-success ml-2" onclick="uptJob('<?php echo $jo->id_job_order; ?>')" style="float: right;">Save</button>
              </div>
            </div>
          <!-- </form> -->
        </div>
        <!-- content-wrapper ends -->

        <div class="modal fade" id="addContainer" tabindex="-1" role="dialog" aria-labelledby="addContainerLabel">
          <div class="modal-dialog" role="document" style="margin-top: 15px;margin-bottom: 0">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="formCostLabel">Data Container</h5>
                <button type="button" class="close btn-close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form class="saveDep form" method="post" action="tambah" id="container" enctype="multipart/form-data">
              <input type="hidden" name="id_job" id="id_job" value="<?php echo $jo->id_job_order; ?>">
              <input type="hidden" name="id_data_con" id="id_data_con">
              <div class="modal-body">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="label_container_number">Container Number</label>
                      <input type="text" name="container_number" id="container_number" class="form-control" required>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="label_seal_number">Seal Number</label>
                      <input type="text" name="seal_number" id="seal_number" class="form-control" required>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="label_type">Type</label>
                      <select name="type_container" id="type_container" class="form-control modal_select" required>
                        <option disabled="disabled"> - Select Type - </option>
                        <option>20 FR</option>
                        <option>20 OT</option>
                        <option>20 RF</option>
                        <option>20 STD</option>
                        <option>40 FR</option>
                        <option>40 HQ</option>
                        <option>40 OT</option>
                        <option>40 RF</option>
                        <option>40 STD</option>
                        <option>LCL</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="label_measurement">Measurement</label>
                      <input type="number" name="measurement" id="measurement" class="form-control" required>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="label_net_weight">Net Weight</label>
                      <input type="number" name="net_weight" id="net_weight" class="form-control" required>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="label_gross_weight">Gross Weight</label>
                      <input type="number" name="gross_weight" id="gross_weight" class="form-control" required>
                    </div>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-success">Save</button>
                <button type="button" class="btn btn-light btn-close" data-dismiss="modal">Cancel</button>
              </div>
            </form>
            </div>
          </div>
        </div>
        <!-- Modal Ends -->

        <div class="modal fade" id="addPieces" tabindex="-1" role="dialog" aria-labelledby="addPiecesLabel">
          <div class="modal-dialog" role="document" style="margin-top: 15px;margin-bottom: 0">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="formCostLabel">Data Pieces</h5>
                <button type="button" class="close btn-close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form class="saveDep form" method="post" action="tambah" id="pieces" enctype="multipart/form-data">
              <input type="hidden" name="id_job" id="id_job" value="<?php echo $jo->id_job_order; ?>">
              <input type="hidden" name="id_data_pieces" id="id_data_pieces">
              <div class="modal-body">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="label_no_of_pieces">No. of Pieces</label>
                      <input type="text" name="no_of_pieces" id="no_of_pieces" class="form-control">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="label_type">Type</label>
                      <select name="type_pieces" id="type_pieces" class="form-control modal2_select">
                        <option selected="selected" disabled="disabled"> - Select Type - </option>
                        <option>Kg</option>
                        <option>Pounds</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="label_gross_weight">Gross Weight</label>
                      <input type="number" name="gross_weight" id="gross_weight_pieces" class="form-control">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="label_chargeable_weight">Chargeable Weight</label>
                      <input type="number" name="chargeable_weight" id="chargeable_weight" class="form-control">
                    </div>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-success">Save</button>
                <button type="button" class="btn btn-light btn-close" data-dismiss="modal">Cancel</button>
              </div>
            </form>
            </div>
          </div>
        </div>
        <!-- Modal Ends -->

        <div class="modal fade" id="addStatus" tabindex="-1" role="dialog" aria-labelledby="addStatusLabel">
          <div class="modal-dialog" role="document" style="margin-top: 15px;margin-bottom: 0">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="formCostLabel">Data Status</h5>
                <button type="button" class="close btn-close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form class="saveDep form" method="post" action="tambah"" id="status_form" enctype="multipart/form-data">
              <input type="hidden" name="id_job" id="id_job" value="<?php echo $jo->id_job_order; ?>">
              <input type="hidden" name="id_data_status" id="id_data_status">
              <div class="modal-body">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="label_date_status">Date</label>
                      <input type="text" class="form-control datepicker" name="date_status" id="date_status" readonly>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="label_time">Time</label>
                      <div class="input-group date" id="time-picker" data-target-input="nearest">
                        <div class="input-group" data-target="#time-picker" data-toggle="datetimepicker">
                          <input type="text" name="time" id="time" class="form-control datetimepicker-input" data-target="#time-picker">
                          <div class="input-group-addon input-group-append">
                            <i class="mdi mdi-clock input-group-text"></i>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="label_status">Status</label>
                      <select name="status" id="status" class="form-control modal3_select">
                        <option selected="selected" disabled="disabled"> - Select Status - </option>
                        <option>At Destination</option>
                        <option>At Port</option>
                        <option>At Warehouse</option>
                        <option>Delivered</option>
                        <option>Loading</option>
                        <option>Packing</option>
                        <option>Received</option>
                      </select>
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
                <button type="submit" class="btn btn-success">Save</button>
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
  var today = new Date();
  var dd = today.getDate();
  var mm = today.getMonth()+1; //January is 0!
  var yyyy = today.getFullYear();

  if(dd<10) {
      dd = '0'+dd
  } 

  if(mm<10) {
      mm = '0'+mm
  } 

  today = mm + '/' + dd + '/' + yyyy;
  // document.getElementById("jo_date").value = today;
</script>
<script type="text/javascript">
  
  if ($(".datepicker").length) {
    $('.datepicker').datepicker({
      enableOnReadonly: true,
      todayHighlight: true,
      autoclose: true,
      format: "dd/mm/yyyy"
    });
  }
  $('#time-picker').datetimepicker({
    format: 'HH:mm'
  });
  $(".single-select").select2({
    width: '100%',
    // dropdownParent: $('#addQuotation'),
  });
  $(".modal_select").select2({
    width: '100%',
    dropdownParent: $('#container'),
  });
  $(".modal2_select").select2({
    width: '100%',
    dropdownParent: $('#pieces'),
  });
  $(".modal3_select").select2({
    width: '100%',
    dropdownParent: $('#status_form'),
  });
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
    // $("#btnShow").collapse('toggle');
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
    $('#qty').inputmask({
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
  function clickData(){ 
    document.getElementById('row_data').style.cssText = 'display: block';
    document.getElementById('row_sea').style.cssText = 'display: none';
    document.getElementById('row_air').style.cssText = 'display: none';
    document.getElementById('row_report').style.cssText = 'display: none';
  }
  function clickSea(){
    document.getElementById('row_data').style.cssText = 'display: none';
    document.getElementById('row_sea').style.cssText = 'display: block';
    document.getElementById('row_air').style.cssText = 'display: none';
    document.getElementById('row_report').style.cssText = 'display: none';
  }
  function clickAir(){
    document.getElementById('row_data').style.cssText = 'display: none';
    document.getElementById('row_sea').style.cssText = 'display: none';
    document.getElementById('row_air').style.cssText = 'display: block';
    document.getElementById('row_report').style.cssText = 'display: none';
  }
  function clickReport(){
    document.getElementById('row_data').style.cssText = 'display: none';
    document.getElementById('row_sea').style.cssText = 'display: none';
    document.getElementById('row_air').style.cssText = 'display: none';
    document.getElementById('row_report').style.cssText = 'display: block';
  }
</script>
<?php 
  $this->load->view('cargo/js-crud/crud-job-order');
  $this->load->view('cargo/js-crud/crud-modal-job-order');
?>