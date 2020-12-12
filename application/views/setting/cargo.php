<?php
    $this->load->view('template/head');
    $this->load->view('template/topbar');
    $this->load->view('template/sidebar');
?>
<style type="text/css">
  body{
    scroll-behavior:
  }
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
              <h4 class="page-title">Branch Office</h4>
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
                  <ul class="nav nav-tabs tab-simple-styled" role="tablist">
                    <!-- <li class="nav-item">
                      <a class="nav-link active" id="tab-data-partner" data-toggle="tab" href="#data-partner" role="tab" aria-controls="home-3-1" aria-selected="true">
                        <i class="mdi mdi-folder"></i>Data Partner</a>
                    </li> -->
                    <!-- <li class="nav-item">
                      <a class="nav-link active" id="tab-data-cost" data-toggle="tab" href="#data-cost" role="tab" aria-controls="home-3-2" aria-selected="true">
                        <i class="mdi mdi-folder"></i>Data Cost</a>
                    </li> -->
                    <!-- <li class="nav-item">
                      <a class="nav-link" id="tab-data-port" data-toggle="tab" href="#data-port" role="tab" aria-controls="contact-3-3" aria-selected="false">
                        <i class="mdi mdi-folder"></i>Data Port</a>
                    </li> -->
                    <!-- <li class="nav-item">
                      <a class="nav-link" id="tab-data-airlines" data-toggle="tab" href="#data-airlines" role="tab" aria-controls="contact-3-3" aria-selected="false">
                        <i class="mdi mdi-folder"></i>Data Airlines</a>
                    </li> -->
                    <li class="nav-item">
                      <a class="nav-link active" id="tab-data-branch" data-toggle="tab" href="#data-branch" role="tab" aria-controls="contact-3-3" aria-selected="false">
                        <i class=""></i>Data Branch Office</a>
                    </li>
                  </ul>
                  <div class="tab-content tab-content-basic">
                    <!-- <div class="tab-pane fade show active" id="data-partner" role="tabpanel" aria-labelledby="tab-3-1">
                      <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore
                            et dolore magna aliqua.</p>                      
                    </div> -->
                    <!-- <div class="tab-pane fade show active" id="data-cost" role="tabpanel" aria-labelledby="tab-3-2">
                      <div class="row">
                        <div class="col-md-4">
                          <h5>Add New</h5>
                          <br>
                          <form action="cost_add" method="post" enctype="multipart/form-data" id="cost_form">
                            <input type="hidden" name="cost_id" id="cost_id">
                            <div class="form-group">
                              <label for="label_cost">Cost</label>
                              <input type="text" class="form-control" name="cost" id="cost" placeholder="Cost" required>
                            </div> -->
                            <!-- <div class="form-group">
                                <label for="state">Country</label>
                                <select class="form-control form-control-sm" id="airlines" name="state" required>
                                  <option selected="selected" disabled="disabled"> - Select Country - </option>
                                  <option value=""></option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="zip">Caption</label>
                                <input type="text" name="caption" id="caption" class="form-control form-control-lg" placeholder="Caption">
                            </div> -->
                            <!-- <div class="float-right">
                              <button class="btn btn-inverse-success btn-primary" type="submit">Submit</button>
                              <button class="btn btn-inverse-default btn-default" type="reset">Reset</button>
                            </div>
                            
                          </form>
                        </div>
                        <br>
                        <div class="col-md-8">
                          <div class="table responsive">
                            <table class="table table-hover table-bordered table-striped" id="cost_table">
                              <thead>
                                <tr>
                                  <th>No</th>
                                  <th>Cost</th>
                                  <th>Action</th>
                                </tr>
                              </thead>
                              <tbody>
                              <?php $i = 1; foreach($cost as $row){ ?>
                                  <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $row->cost; ?></td>
                                    <td>
                                      <div class="dropdown">
                                        <button type="button" class="btn btn-icons btn-rounded text-center" data-toggle="dropdown">
                                          <i class="ti-more-alt"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                          <button class="btn btn-link" onclick="edit_cost('<?php echo $row->cost_id; ?>')"><i class="fa fa-pencil"></i></button>
                                          <button class="btn btn-link" onclick="del_cost('<?php echo $row->cost_id; ?>')"><i class="fa fa-trash-o"></i></button>
                                      </div>
                                    </td>
                                  </tr>
                                <?php $i++; } ?>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                    </div> -->
                    <!-- <div class="tab-pane fade" id="data-port" role="tabpanel" aria-labelledby="tab-3-3">
                      <div class="row">
                        <div class="col-md-4">
                          <h5>Add New</h5>
                          <br>
                          <form action="port_add" method="post" enctype="multipart/form-data" id="port_form">
                            <input type="hidden" name="port_id" id="port_id">
                            <div class="form-group">
                              <label for="label_port">Port</label>
                              <input type="text" class="form-control" name="port" id="port" placeholder="Port" required>
                            </div>
                            <div class="form-group">
                                <label for="state">Country</label>
                                <select class="form-control form-control-sm" id="port" name="state" required>
                                  <option selected="selected" disabled="disabled"> - Select Country - </option>
                                    <option value="AFGHANISTAN">AFGHANISTAN</option>
                                    <option value="ALBANIA">ALBANIA</option>
                                    <option value="ALGERIA">ALGERIA</option>
                                    <option value="ANDORRA">ANDORRA</option>
                                    <option value="ANGOLA">ANGOLA</option>
                                    <option value="ANTIGUA AND BARBUDA">ANTIGUA AND BARBUDA</option>
                                    <option value="ARGENTINA">ARGENTINA</option>
                                    <option value="ARMENIA">ARMENIA</option>
                                    <option value="AUSTRALIA">AUSTRALIA</option>
                                    <option value="AUSTRIA">AUSTRIA</option>
                                    <option value="AZERBAIJAN">AZERBAIJAN</option>
                                    <option value="BAHAMAS">BAHAMAS</option>
                                    <option value="BAHRAIN">BAHRAIN</option>
                                    <option value="BANGLADESH">BANGLADESH</option>
                                    <option value="BANGLADESH.">BANGLADESH.</option>
                                    <option value="BARBADOS">BARBADOS</option>
                                    <option value="BELARUS">BELARUS</option>
                                    <option value="BELGIUM - EU">BELGIUM - EU</option>
                                    <option value="BELIZE - LA">BELIZE - LA</option>
                                    <option value="BENIN - AFRICA">BENIN - AFRICA</option>
                                    <option value="BHUTAN">BHUTAN</option>
                                    <option value="BOLIVIA - LA">BOLIVIA - LA</option>
                                    <option value="BOSNIA AND HERZEGOVINA - EU">BOSNIA AND HERZEGOVINA - EU</option>
                                    <option value="BOTSWANA - AFRICA">BOTSWANA - AFRICA</option>
                                    <option value="BRAZIL">BRAZIL</option>
                                    <option value="BRUNEI">BRUNEI</option>
                                    <option value="BULGARIA">BULGARIA</option>
                                    <option value="BURKINA FASO - EA">BURKINA FASO - EA</option>
                                    <option value="BURUNDI - AFRICA">BURUNDI - AFRICA</option>
                                    <option value="CAMBODIA">CAMBODIA</option>
                                    <option value="CAMEROON - AFRICA">CAMEROON - AFRICA</option>
                                    <option value="CANADA">CANADA</option>
                                    <option value="CAPE VERDE">CAPE VERDE</option>
                                    <option value="CENTRAL AFRICAN REPUBLIC">CENTRAL AFRICAN REPUBLIC</option>
                                    <option value="CHAD - AFRICA">CHAD - AFRICA</option>
                                    <option value="CHILE - LA">CHILE - LA</option>
                                    <option value="CHINA">CHINA</option>
                                    <option value="chins">chins</option>
                                    <option value="COLOMBIA - LA">COLOMBIA - LA</option>
                                    <option value="COMOROS - AFRICA">COMOROS - AFRICA</option>
                                    <option value="CONGO (BRAZZAVILLE) - AFRICA">CONGO (BRAZZAVILLE) - AFRICA</option>
                                    <option value="CONGO, DEMOCRATIC REPUBLIC OF THE">CONGO, DEMOCRATIC REPUBLIC OF THE</option>
                                    <option value="COSTA RICA - LA">COSTA RICA - LA</option>
                                    <option value="COTE D`IVOIRE - AFRICA">COTE D`IVOIRE - AFRICA</option>
                                    <option value="CROATIA">CROATIA</option>
                                    <option value="CUBA">CUBA</option>
                                    <option value="CYPRUS">CYPRUS</option>
                                    <option value="CZECH REPUBLIC">CZECH REPUBLIC</option>
                                    <option value="DENMARK">DENMARK</option>
                                    <option value="DJIBOUTI - AFRICA">DJIBOUTI - AFRICA</option>
                                    <option value="DOMINICA">DOMINICA</option>
                                    <option value="DOMINICAN REPUBLIC">DOMINICAN REPUBLIC</option>
                                    <option value="EAST TIMOR (TIMOR TIMUR)">EAST TIMOR (TIMOR TIMUR)</option>
                                    <option value="ECUADOR - LA">ECUADOR - LA</option>
                                    <option value="EGYPT">EGYPT</option>
                                    <option value="EL SALVADOR">EL SALVADOR</option>
                                    <option value="EQUATORIAL GUINEA">EQUATORIAL GUINEA</option>
                                    <option value="ERITREA">ERITREA</option>
                                    <option value="ESTONIA">ESTONIA</option>
                                    <option value="ETHIOPIA">ETHIOPIA</option>
                                    <option value="FIJI">FIJI</option>
                                    <option value="FINLAND">FINLAND</option>
                                    <option value="FRANCE">FRANCE</option>
                                    <option value="GABON - AFRICA">GABON - AFRICA</option>
                                    <option value="GAMBIA,THE - AFRICA">GAMBIA,THE - AFRICA</option>
                                    <option value="GEORGIA">GEORGIA</option>
                                    <option value="GERMANY">GERMANY</option>
                                    <option value="GHANA - AFRICA">GHANA - AFRICA</option>
                                    <option value="GREECE">GREECE</option>
                                    <option value="GRENADA">GRENADA</option>
                                    <option value="GUATEMALA">GUATEMALA</option>
                                    <option value="GUINEA">GUINEA</option>
                                    <option value="GUINEA-BISSAU">GUINEA-BISSAU</option>
                                    <option value="GUYANA">GUYANA</option>
                                    <option value="HAITI">HAITI</option>
                                    <option value="HONDURAS">HONDURAS</option>
                                    <option value="HUNGARY">HUNGARY</option>
                                    <option value="ICELAND">ICELAND</option>
                                    <option value="INDIA">INDIA</option>
                                    <option value="INDONESIA">INDONESIA</option>
                                    <option value="IRAN">IRAN</option>
                                    <option value="IRAQ">IRAQ</option>
                                    <option value="IRELAND">IRELAND</option>
                                    <option value="ISRAEL">ISRAEL</option>
                                    <option value="ITALY">ITALY</option>
                                    <option value="JAMAICA">JAMAICA</option>
                                    <option value="JAPAN">JAPAN</option>
                                    <option value="JORDAN">JORDAN</option>
                                    <option value="KAZAKHSTAN">KAZAKHSTAN</option>
                                    <option value="KENYA - AFRICA">KENYA - AFRICA</option>
                                    <option value="KIRIBATI">KIRIBATI</option>
                                    <option value="KOREA, NORTH">KOREA, NORTH</option>
                                    <option value="KOREA, SOUTH">KOREA, SOUTH</option>
                                    <option value="KUWAIT">KUWAIT</option>
                                    <option value="KYRGYZSTAN">KYRGYZSTAN</option>
                                    <option value="LAOS">LAOS</option>
                                    <option value="LATVIA">LATVIA</option>
                                    <option value="LEBANON">LEBANON</option>
                                    <option value="LESOTHO - AFRICA">LESOTHO - AFRICA</option>
                                    <option value="LIBERIA">LIBERIA</option>
                                    <option value="LIBYA">LIBYA</option>
                                    <option value="LIECHTENSTEIN">LIECHTENSTEIN</option>
                                    <option value="LITHUANIA">LITHUANIA</option>
                                    <option value="LUXEMBOURG">LUXEMBOURG</option>
                                    <option value="MACAO">MACAO</option>
                                    <option value="MACEDONIA, FORMER YUGOSLAV REPUBLIC OF">MACEDONIA, FORMER YUGOSLAV REPUBLIC OF</option>
                                    <option value="MADAGASCAR">MADAGASCAR</option>
                                    <option value="MALAWI">MALAWI</option>
                                    <option value="MALAYSIA">MALAYSIA</option>
                                    <option value="MALDIVES">MALDIVES</option>
                                    <option value="MALI">MALI</option>
                                    <option value="MALTA">MALTA</option>
                                    <option value="MARSHALL ISLANDS">MARSHALL ISLANDS</option>
                                    <option value="MAURITANIA">MAURITANIA</option>
                                    <option value="MAURITIUS">MAURITIUS</option>
                                    <option value="MEXICO">MEXICO</option>
                                    <option value="MICRONESIA, FEDERATED STATES OF">MICRONESIA, FEDERATED STATES OF</option>
                                    <option value="MOLDOVA">MOLDOVA</option>
                                    <option value="MONACO">MONACO</option>
                                    <option value="MONGOLIA">MONGOLIA</option>
                                    <option value="MONTENEGRO">MONTENEGRO</option>
                                    <option value="MOROCCO">MOROCCO</option>
                                    <option value="MOZAMBIQUE">MOZAMBIQUE</option>
                                    <option value="MYANMAR">MYANMAR</option>
                                    <option value="NAMIBIA">NAMIBIA</option>
                                    <option value="NAURU">NAURU</option>
                                    <option value="NEPAL">NEPAL</option>
                                    <option value="NETHERLANDS">NETHERLANDS</option>
                                    <option value="NEW ZEALAND">NEW ZEALAND</option>
                                    <option value="NICARAGUA">NICARAGUA</option>
                                    <option value="NIGER - AFRICA">NIGER - AFRICA</option>
                                    <option value="NORWAY">NORWAY</option>
                                    <option value="NULL">NULL</option>
                                    <option value="OMAN">OMAN</option>
                                    <option value="PAKISTAN">PAKISTAN</option>
                                    <option value="PALAU">PALAU</option>
                                    <option value="PANAMA">PANAMA</option>
                                    <option value="PAPUA NEW GUINEA">PAPUA NEW GUINEA</option>
                                    <option value="PARAGUAY">PARAGUAY</option>
                                    <option value="PERU">PERU</option>
                                    <option value="PHILIPPINES">PHILIPPINES</option>
                                    <option value="POLAND">POLAND</option>
                                    <option value="PORTUGAL">PORTUGAL</option>
                                    <option value="QATAR">QATAR</option>
                                    <option value="ROMANIA">ROMANIA</option>
                                    <option value="RUSSIA">RUSSIA</option>
                                    <option value="RWANDA - AFRICA">RWANDA - AFRICA</option>
                                    <option value="SAINT KITTS AND NEVIS">SAINT KITTS AND NEVIS</option>
                                    <option value="SAINT LUCIA">SAINT LUCIA</option>
                                    <option value="SAINT VINCENT AND THE GRENADINES">SAINT VINCENT AND THE GRENADINES</option>
                                    <option value="SAMOA">SAMOA</option>
                                    <option value="SAN MARINO">SAN MARINO</option>
                                    <option value="SAO TOME AND PRINCIPE">SAO TOME AND PRINCIPE</option>
                                    <option value="SAUDI ARABIA">SAUDI ARABIA</option>
                                    <option value="SENEGAL">SENEGAL</option>
                                    <option value="SERBIA">SERBIA</option>
                                    <option value="SEYCHELLES">SEYCHELLES</option>
                                    <option value="SIERRA LEONE">SIERRA LEONE</option>
                                    <option value="SINGAPORE">SINGAPORE</option>
                                    <option value="SLOVAKIA">SLOVAKIA</option>
                                    <option value="SLOVENIA">SLOVENIA</option>
                                    <option value="SOLOMON ISLANDS">SOLOMON ISLANDS</option>
                                    <option value="SOMALIA">SOMALIA</option>
                                    <option value="SOUTH AFRICA">SOUTH AFRICA</option>
                                    <option value="SPAIN">SPAIN</option>
                                    <option value="SRI LANKA">SRI LANKA</option>
                                    <option value="SUDAN">SUDAN</option>
                                    <option value="SURINAME">SURINAME</option>
                                    <option value="SWAZILAND">SWAZILAND</option>
                                    <option value="SWEDEN">SWEDEN</option>
                                    <option value="SWITZERLAND">SWITZERLAND</option>
                                    <option value="SYRIA">SYRIA</option>
                                    <option value="TAIWAN">TAIWAN</option>
                                    <option value="TAJIKISTAN">TAJIKISTAN</option>
                                    <option value="TANZANIA">TANZANIA</option>
                                    <option value="THAILAND">THAILAND</option>
                                    <option value="TIMOR LESTE">TIMOR LESTE</option>
                                    <option value="TOGO">TOGO</option>
                                    <option value="TONGA">TONGA</option>
                                    <option value="TRINIDAD AND TOBAGO">TRINIDAD AND TOBAGO</option>
                                    <option value="TUNISIA">TUNISIA</option>
                                    <option value="TURKEY">TURKEY</option>
                                    <option value="TURKMENISTAN">TURKMENISTAN</option>
                                    <option value="TUVALU">TUVALU</option>
                                    <option value="UGANDA - AFRICA">UGANDA - AFRICA</option>
                                    <option value="UK">UK</option>
                                    <option value="UKRAINE">UKRAINE</option>
                                    <option value="UNITED ARAB EMIRATES">UNITED ARAB EMIRATES</option>
                                    <option value="UNITED ARAB EMIRATES">UNITED ARAB EMIRATES</option>
                                    <option value="UNITED KINGDOM">UNITED KINGDOM</option>
                                    <option value="UNITED STATES OF AMERICA">UNITED STATES OF AMERICA</option>
                                    <option value="URUGUAY">URUGUAY</option>
                                    <option value="UZBEKISTAN">UZBEKISTAN</option>
                                    <option value="VANUATU">VANUATU</option>
                                    <option value="VATICAN CITY">VATICAN CITY</option>
                                    <option value="VENEZUELA">VENEZUELA</option>
                                    <option value="VIETNAM">VIETNAM</option>
                                    <option value="WESTERN SAHARA">WESTERN SAHARA</option>
                                    <option value="YEMEN">YEMEN</option>
                                    <option value="ZAMBIA">ZAMBIA</option>
                                    <option value="ZIMBABWE">ZIMBABWE</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="caption_port">Caption</label>
                                <input type="text" name="caption" id="caption_port" class="form-control form-control-lg" placeholder="Caption">
                              </div>
                            <div class="float-right">
                              <button class="btn btn-inverse-success btn-primary" type="submit">Submit</button>
                              <button class="btn btn-inverse-default btn-default" type="reset">Reset</button>
                            </div>
                            
                          </form>
                        </div>
                        <br>
                        <div class="col-md-8">
                          <div class="table responsive">
                            <table class="table table-hover table-bordered table-striped" id="port_table">
                              <thead>
                                <tr>
                                  <th>No</th>
                                  <th>Port</th>
                                  <th>Action</th>
                                </tr>
                              </thead>
                              <tbody>
                               
                                  <tr>
                                    <td></td>
                                    <td></td>
                                    <td>
                                      <div class="dropdown">
                                        <button type="button" class="btn btn-icons btn-rounded text-center" data-toggle="dropdown">
                                          <i class="ti-more-alt"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                          <button class="btn btn-link"><i class="fa fa-pencil"></i></button>
                                          <button class="btn btn-link"><i class="fa fa-trash-o"></i></button>
                                      </div>
                                    </td>
                                  </tr>
                                
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                    </div> -->
                    <!-- <div class="tab-pane fade" id="data-airlines" role="tabpanel" aria-labelledby="tab-3-3">
                      <div class="row">
                        <div class="col-md-4">
                          <h5>Add New</h5>
                          <br>
                          <form action="airlines_add" method="post" enctype="multipart/form-data" id="airlines_form">
                            <input type="hidden" name="airlines_id" id="airlines_id">
                            <div class="form-group">
                              <label for="label_quote_number">Airlines</label>
                              <input type="text" class="form-control" name="airlines" id="airlines" placeholder="Airlines" required>
                            </div>
                            <div class="form-group">
                                <label for="state">State</label>
                                <select class="form-control form-control-sm" id="airlines" name="state" required>
                                  <option selected="selected" disabled="disabled"> - Select Airlines - </option>
                                  <option value=""></option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="caption_airlines">Caption</label>
                                <input type="text" name="caption" id="caption_airlines" class="form-control form-control-lg" placeholder="Caption">
                              </div>
                            <div class="float-right">
                              <button class="btn btn-inverse-success btn-primary" type="submit">Submit</button>
                              <button class="btn btn-inverse-default btn-default" type="reset">Reset</button>
                            </div>
                            
                          </form>
                        </div>
                        <br>
                        <div class="col-md-8">
                          <div class="table responsive">
                            <table class="table table-hover table-bordered table-striped" id="airlines_table">
                              <thead>
                                <tr>
                                  <th>No</th>
                                  <th>Airlines</th>
                                  <th>Action</th>
                                </tr>
                              </thead>
                              <tbody>
                               
                                  <tr>
                                    <td></td>
                                    <td></td>
                                    <td>
                                      <div class="dropdown">
                                        <button type="button" class="btn btn-icons btn-rounded text-center" data-toggle="dropdown">
                                          <i class="ti-more-alt"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                          <button class="btn btn-link"><i class="fa fa-pencil"></i></button>
                                          <button class="btn btn-link"><i class="fa fa-trash-o"></i></button>
                                      </div>
                                    </td>
                                  </tr>
                                
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                    </div> -->
                    <div class="tab-pane fade show active" id="data-branch" role="tabpanel" aria-labelledby="tab-3-3">
                      <div class="row">
                        <div class="col-md-4">
                          <h5>Add New</h5>
                          <br>
                          <form action="branch_office_add" method="post" enctype="multipart/form-data" id="branch_office_form">
                            <input type="hidden" name="branch_id" id="branch_id">
                            <div class="form-group">
                              <label for="label_quote_number">Branch Office</label>
                              <input type="text" class="form-control" name="branch_office" id="branch_office" placeholder="Branch Office" required>
                            </div>
                            <div class="form-group">
                                <label for="state">State</label>
                                <select class="form-control form-control-sm" id="state" name="state" required>
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
                            <div class="form-group">
                              <label for="address">Address</label>
                              <textarea name="address" id="address" class="form-control form-control-lg"></textarea>
                            </div>
                            <div class="form-group">
                              <label for="zip">Zip</label>
                              <input type="text" name="zip" id="zip" class="form-control form-control-lg" placeholder="Zip">
                            </div>
                            <div class="float-right">
                              <button class="btn btn-inverse-success btn-primary" type="submit">Submit</button>
                              <button class="btn btn-inverse-default btn-default" type="reset">Reset</button>
                            </div>
                            
                          </form>
                        </div>
                        <div class="col-md-8">
                          <div class="table responsive">
                            <table class="table table-hover table-bordered table-striped" id="branch_office_table">
                              <thead>
                                <tr>
                                  <th>No</th>
                                  <th>Branch Office</th>
                                  <th>Action</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php $i = 1; foreach ($branch_office as $row){ ?>
                                  <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $row->branch; ?></td>
                                    <td>
                                      <div class="dropdown">
                                        <button type="button" class="btn btn-icons btn-rounded text-center" data-toggle="dropdown">
                                          <i class="ti-more-alt"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                          <button class="btn btn-link" onclick="edit_branch('<?php echo $row->branch_id; ?>')"><i class="fa fa-pencil"></i></button>
                                          <button class="btn btn-link" onclick="del_branch('<?php echo $row->branch_id; ?>')"><i class="fa fa-trash-o"></i></button>
                                      </div>
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
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
<?php
  $this->load->view('template/footer');
  // $this->load->view('template/fixed-plugin');
  $this->load->view('template/js');
  require_once(APPPATH."views/component/message.php");
?>
<script type="text/javascript">
  $('#tabledesignation').DataTable({
      "aLengthMenu": [
        [5, 10, 15, -1],
        [5, 10, 15, "All"]
      ],
      "iDisplayLength": 10,
      "language": {
        search: ""
      },
    });  

    $('#start-picker').datetimepicker({
      format: 'LT'
    });

    $('#end-picker').datetimepicker({
      format: 'LT'
    });

    $('#branch_office_table').DataTable({
      "aLengthMenu": [
        [5, 10, 15, -1],
        [5, 10, 15, "All"]
      ],
      "iDisplayLength": 10,
      "language": {
        search: ""
      },
    });

    $('#start-picker').datetimepicker({
      format: 'LT'
    });

    $('#end-picker').datetimepicker({
      format: 'LT'
    });

    $('#airlines_table').DataTable({
      "aLengthMenu": [
        [5, 10, 15, -1],
        [5, 10, 15, "All"]
      ],
      "iDisplayLength": 10,
      "language": {
        search: ""
      },
    });

    $('#start-picker').datetimepicker({
      format: 'LT'
    });

    $('#end-picker').datetimepicker({
      format: 'LT'
    });

    $('#port_table').DataTable({
      "aLengthMenu": [
        [5, 10, 15, -1],
        [5, 10, 15, "All"]
      ],
      "iDisplayLength": 10,
      "language": {
        search: ""
      },
    });

    $('#start-picker').datetimepicker({
      format: 'LT'
    });

    $('#end-picker').datetimepicker({
      format: 'LT'
    });

    $('#cost_table').DataTable({
      "aLengthMenu": [
        [5, 10, 15, -1],
        [5, 10, 15, "All"]
      ],
      "iDisplayLength": 10,
      "language": {
        search: ""
      },
    });

    $('#start-picker').datetimepicker({
      format: 'LT'
    });

    $('#end-picker').datetimepicker({
      format: 'LT'
    });

  // $(document).ready(function() {
  //   $('#buttonModal').click(function() {
  //       $('html').css('overflow', 'hidden');
  //       $('body').bind('touchmove', function(e) {
  //           e.preventDefault()
  //       });
  //   });
  //   $('.btn-close').click(function() {
  //       $('html').css('overflow', 'scroll');
  //       $('body').unbind('touchmove');
  //   });
  // });


    $("#branch_office_form").submit(function (e) { 
      e.preventDefault();
      
      var action = $(this).attr("action");
      if(action == "branch_office_add"){
        branch_office_add();
      }
      else if(action == "branch_office_update"){
        branch_office_update();
      }
    });

    $("#branch_office_form [type='reset']").click(function(){
      $("#branch_office_form").attr("action", "branch_office_add");
      $("#branch_id").val("");
      $("#branch").val("");
      $("#state").val("");
      $("#address").val("");
      $("#zip").val("");
    });

    function branch_office_add(){
      var branch_office = $("#branch_office").val();
      var state = $("#state").val();
      var address = $("#address").val();
      var zip = $("#zip").val();
      if(branch_office == "" || state == "" || address == "" || zip == ""){
        swal({
          title : "Oops!",
          text : "All data must be filled",
          type : "error"
        })
      }
      else{
        $.ajax({
          type: "POST",
          url: "<?php echo base_url(); ?>branch_office_add",
          data: { branch_office : branch_office, state : state, address : address, zip : zip },
          dataType: "JSON",
          success: function (data) {
            swal({
              title : "Berhasil!",
              text : "Branch office has been added",
              type : "success"
            }, function(){
              location.reload();
            })
          },
          error : function(){
            swal({
              title : "Oops!",
              text : "Failed to adding branch office",
              type : "error"
            })
          }
        });
      }
    }

    function del_branch(branch_id){
      swal({
            title: 'Are you sure ?',
            text: "You will not be able to recover this data!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonClass: 'btn btn-success',
            cancelButtonClass: 'btn btn-danger',
            confirmButtonText: 'Ya, Hapus!',
            cancelButtonText: 'Batal',
            buttonsStyling: false
        },function(){
          $.ajax({
            type: "POST",
            url: "<?php echo base_url() ?>branch_office_deleting",
            data: {branch_id : branch_id},
            dataType: "JSON",
            success: function (data) {
              swal({
                title : "Success!",
                text : "Your data has been deleted",
                type : "success"
              }, function(){
                location.reload();
              });   
            },
            error : function(){
              swal({
                title : "Oops!",
                text : "Failed to deleting branch office",
                type : "error"
              })
            }
          });
        });
      
    }

    function edit_branch(branch_id){
      $.ajax({
        type: "POST",
        url: "<?php echo base_url(); ?>branch_office_edit",
        data: {branch_id : branch_id},
        dataType: "JSON",
        success: function (data) {
          $("#branch_office_form").attr("action", "branch_office_update");
          $("#branch_office").val(data.branch);
          $("#branch_id").val(data.branch_id);
          $("#state").val(data.state);
          $("#address").val(data.address);
          $("#zip").val(data.zip);
        },
        error : function(){
          swal({
            title : "Oops!",
            text : "Failed to get data",
            type : "error"
          });
        }
      });
    }

    function branch_office_update(){
      var branch_office = $("#branch_office").val();
      var branch_id = $("#branch_id").val();
      var state = $("#state").val();
      var address = $("#address").val();
      var zip = $("#zip").val();
      if(branch_office == "" || branch_id == "" || state == "" || address == "" || zip == ""){
        swal({
          title : "Oops!",
          text : "All data must be filled",
          type : "error"
        })
      }
      else{
        $.ajax({
          type: "POST",
          url: "<?php echo base_url(); ?>branch_office_update",
          data: { branch_office : branch_office, branch_id : branch_id, state : state, address : address, zip : zip },
          dataType: "JSON",
          success: function (data) {
            swal({
              title : "Berhasil!",
              text : "Branch office has been updated",
              type : "success"
            }, function(){
              location.reload();
            })
          },
          error : function(){
            swal({
              title : "Oops!",
              text : "Failed to updating branch office",
              type : "error"
            })
          }
        });
      }
    }

</script>
