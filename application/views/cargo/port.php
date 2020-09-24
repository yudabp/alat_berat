<?php 
    $this->load->view('template/head');
    $this->load->view('template/topbar');
    $this->load->view('template/sidebar');
?>
    <style type="text/css">
</style>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row mb-4">
            <div class="col-12 d-flex align-items-center justify-content-between">
              <h4 class="page-title">Port</h4>
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
            <div class="col-md-5">
              <div class="card">
                <div class="card-body">
                  <form class="saveDep form" method="post" action="#" id="tambah" enctype="multipart/form-data">
                  <div class="row">
                    <div class="col-md-12">
                        <h5 id="label_port">Add New Port</h5>
                    <br>
                      <label for="port">Port</label>
                      <div class="form-group">
                        <input type="text" name="port_name" id="port_name" class="form-control" placeholder="Port">
                      </div>
                    </div>                    
                  </div>
                  <div class="row">                  
                    <div class="col-md-12">                    
                      <label for="country">Country</label>                        
                      <div class="form-group">
                        <select class="form-control form-control-sm" name="country" id="country">
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
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">                    
                      <label for="deskripsi">Description</label>
                      <div class="form-group">
                        <input type="text" name="deskripsi" id="deskripsi" class="form-control" placeholder="Description">
                      </div>
                    <input type="hidden" name="get_idcategory" id="get_idcategory" class="form-control">
                    </div>                    
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <button type="submit" class="btn btn-success btn-fw" id="btnSubmit">Create Port</button>
                    </div>
                  </div>
                </form>
                </div>
              </div>
            </div>
          <!--<div class="row">-->
            <div class="col-7">
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-12 table-responsive">
                      <table id="tabledepartment" class="table">
                        <thead>
                          <tr class="text-center">
                            <th>Port</th>
                            <th>Country</th>
                            <th>Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php $i=1;foreach($all as $row){ ?>
                          <tr class="text-center">
                            <td><?php echo $row->port ?></td>
                            <td><?php echo $row->country ?></td>
                            <td>
                              <div class="dropdown">
                                <button type="button" class="btn btn-icons btn-rounded text-center" data-toggle="dropdown">
                                  <i class="ti-more-alt"></i>
                                </button>
                                <div class="dropdown-menu">
                                  <button class="btn btn-link" onclick="edtItem('<?php echo $row->port_id ?>');"><i class="fa fa-pencil"></i></button>
                                  <button class="btn btn-link" onclick="delItem('<?php echo $row->port_id ?>');"><i class="fa fa-trash-o"></i></button>
                                  <!-- <button class="btn btn-icons btn-inverse-primary"><i class="fa  fa-trash-o"></i></button> -->
                                </div>
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
        
 <?php 
  $this->load->view('template/footer');
  // $this->load->view('template/fixed-plugin');
  $this->load->view('template/js');
?>

<script type="text/javascript">
  var d = new Date();
  var months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
  document.getElementById("bulan").innerHTML = months[d.getMonth()];
  document.getElementById("tahun").innerHTML = d.getFullYear();
  $('.dropify').dropify();
</script>

<script type="text/javascript">
$(document).ready(function(){
  $("form").submit(function(e){
    e.preventDefault();
    //alert('test');
    var atribut = $(this).attr("id");
    if(atribut == "tambah"){
      tambah_dep();
    }
    else if(atribut == "update"){
      var id_dep = $(this).data("id");
      update_dep(id_dep);
    }
  });
  $("#port_name").focus();
});

function tambah_dep(){
  //alert('ok');
      var port = $("#port_name").val();
      var country = $("#country").val();
      var deskripsi = $("#deskripsi").val();
      if(port == "" ){
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
          url : "http://beta.xavaxx.com/new_port",
                type: "POST",
                dataType: "JSON",
                data: {
                    port : port,
                    country : country,
                    deskripsi : deskripsi
                }
        });
          swal({
              title: "Congratulation!",
              text: "Port has been added",
              type: "success",
              icon: 'success',
              buttonsStyling: false,
              confirmButtonClass: "btn btn-success"
          },function(){
            location.reload();
          });
      }
}

function delItem(id){
  swal({
      title: 'Are you sure ?',
      text: "You will not be able to recover this file!",
      type: 'warning',
      showCancelButton: true,
      confirmButtonClass: 'btn btn-success',
      cancelButtonClass: 'btn btn-danger',
      confirmButtonText: 'Ya, Hapus!',
      cancelButtonText: 'Batal',
      buttonsStyling: false
        },function(){
    $.ajax({
      url : "http://beta.xavaxx.com/deleted_port",
            type: "POST",
            dataType: "JSON",
            data: {id : id}
            });
      swal({
          title: 'Congratulation',
          text: 'Port has been deleted',
          type: 'success',
          confirmButtonClass: "btn btn-success",
          buttonsStyling: false
      });
      location.reload();
  });
}

function edtItem(id){
  //alert(id);
  $.ajax({
      url : "http://beta.xavaxx.com/get_port",
    type: "POST",
    dataType: "JSON",
    data: {
        id : id
    },
    success : function(data){
            // $("#formAdd").modal("show");
            $(".saveDep").attr("id","update");
            $("#get_idcategory").val(data.inilah.port_id);
            $("#port_name").focus();
            $("#port_name").val(data.inilah.port);
            $("#country option[value='"+data.inilah.country+"']").prop("selected", true);
            $("#deskripsi").val(data.inilah.deskripsi);
            $("#label_port").text("Update Port");
            $("#btnSubmit").text("Update Port");
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

function update_dep(id_dep){
  //alert('ok');
  var port = $("#port_name").val();
  var country = $("#country").val();
  var deskripsi = $("#deskripsi").val();
  var port_id = $("#get_idcategory").val();
  if(port == ""  ){
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
      url : "http://beta.xavaxx.com/updated_port",
            type: "POST",
            dataType: "JSON",
            data: {
                port : port,
                port_id : port_id,
                country : country,
                deskripsi : deskripsi
            }
    });
      swal({
          title: "Congratulation!",
          text: "Port has been updated",
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
</script>

<script type="text/javascript">
  $('#tabledepartment').DataTable({
      "aLengthMenu": [
        [5, 10, 15, -1],
        [5, 10, 15, "All"]
      ],
      "iDisplayLength": 10,
      "language": {
        search: ""
      },
    });

    $('#subdeptable').DataTable({
        "aLengthMenu": [
          [5, 10, 15, -1],
          [5, 10, 15, "All"]
        ],
        "iDisplayLength": 10,
        "language": {
          search: ""
        },
        // "bSort" : false,
        // "dom": 'Bfrtip',
        // "buttons": [
        //   'copy', 'csv', 'excel', 'pdf', 'print'
        // ]
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

</script>
