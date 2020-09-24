<?php 
    $this->load->view('template/head');
    $this->load->view('template/topbar');
    $this->load->view('template/sidebar');
?>
  <!--<link rel="stylesheet" href="http://beta.xavaxx.com/assets/chroma/vendors/css/vendor.bundle.addons.css">-->

    <style type="text/css">
</style>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row mb-4">
            <div class="col-12 d-flex align-items-center justify-content-between">
              <h4 class="page-title">Add Project</h4>
              <div class="d-flex align-items-right">
                <div class="wrapper mr-4 d-none d-sm-block">
                  <p class="mb-0">Summary for
                    <b class="mb-0"><i id="bulan"></i> <i id="tahun"></i></b>
                  </p>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-body">
                <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-12">
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <div class="white-box" id="content">
                                            <h3>
                            <!--<span>Input Data</span>-->
                        </h3>
                    

<div class="white-box" v-show="showForm && !showDetails && !showCheckIns">
    <form class="form-horizontal form-material" method="post" action="<?php echo base_url();?>architecture/subbmit">
        <!--12 : 2-->
        <div class="body">
            <div class="row clearfix">
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Code</label>
                                        <input type="text" name="code" class="form-control" required="" v-model="formData.code">
                                    </div>
                                </div>
                                <?php $tyui=$this->db->query("SELECT * FROM employee")->result(); ?>
                                <div class="col-md-6">
                                     <div class="form-group">
                                        <label>Project Name</label>
                                        <input class="form-control" name="nname_projet" id="nname_projet" placeholder="">
                                          
                                        
                                    </div>
                                </div>
                                <?php $gate=$this->db->query("SELECT * FROM  category")->result(); ?>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Category</label>
                                        <select class="form-control" name="ccategory" id="ccategory">
                                          <option selected disabled>--Category--</option>
                                          <?php $g=1;foreach($jkljj as $row){ ?>
                                            <option value="<?php echo $row->types ?>"><?php echo $row->types ?></option>
                                          <?php $g++;} ?>
                                        </select>
                                    </div>
                                </div>
                                <?php 
                                   $ppicc = $this->db->select('*')
                                                            ->join('department','department.iddepartment = employee.department')
                                                            ->join('designation','designation.iddesignation = employee.jobtitle')
                                                            ->join('employee_access','employee_access.mainid = employee.mainid')
                                                            ->get_where('employee',['employee.idcompany'=>$this->session->userdata('idcompany')])
                                                            ->result();

                                 ?>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>PIC</label>
                                        <select class="form-control" name="pic" id="pic">
                                          <option selected disabled>---PIC---</option>
                                          <?php $g=1;foreach($ppicc as $row){ ?>
                                            <option value="<?php echo $row->fname." ".$row->mname." ".$row->lname; ?>"><?php echo $row->fname." ".$row->mname." ".$row->lname; ?></option>
                                          <?php $g++;} ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Level</label>
                                        <input type="number" name="level" class="form-control" required="" v-model="formData.level">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Project Date</label>
                                        <input type="text" class="form-control datepicker" name="date_from" id="date_from" placeholder="Date">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Address</label>
                                        <textarea name="address" class="form-control" v-model="formData.address"></textarea>
                                    </div>
                                </div>
                                <div class="form-group col-md-12">
                                    <label>Region</label>
                                    <select class="form-control" name="province_id" v-model="selProvince">
                                        <option value="" id="this_prov">--Province--</option>
                                        <?php $a=1; foreach($prov as $row){ ?>
                                            <option v-for="province in provinces" value="<?php echo $row->id ?>" id="<?php echo $row->id ?>"><?php echo $row->name; ?></option>
                                        <?php $a++; } ?>
                                    </select>
                                    <select class="form-control" name="regency_id" id="regency_id" data-placeholder="regency"><option selected disabled>--Districts--</option></select>
                                    <select class="form-control" name="district_id" id="district_id" data-placeholder="distric"><option selected disabled>--Sub-district--</option></select>
                                    <select class="form-control" name="village_all" id="village_all" data-placeholder="village"><option selected disabled>--Kelurahan--</option></select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>      
                <style type="text/css">
                .map-container{overflow:hidden;padding-bottom:56.25%;position:relative;height:0;}
                .map-container iframe{left:0;top:0;height:100%;width:100%;position:absolute;}
                </style>
                <div class="col-md-6">
                    <div id="map-container-google-1" class="z-depth-1-half map-container" style="height: 500px">
                      <iframe src="https://maps.google.com/maps?q=manhatan&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0"
                        style="border:0" allowfullscreen></iframe>
                    </div>            
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <h4>Client</h4>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                            <label>Name</label>
                            <select class="form-control" name="name_client">
                              <option selected disabled>--Name Client--</option>
                              <?php $i=1; foreach($date as $row){ ?>
                                <option value="<?php echo $row->first_name ?>"><?php echo $row->first_name ?></option>
                              <?php $i++;} ?>
                            </select>
                        </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>KTP</label>
                                <input type="text" name="customer_KTP" class="form-control" v-model="selCustomer.KTP">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <textarea name="customer_address" class="form-control" id="nmnmn"></textarea>
                    </div>
                    <div class="form-group">
                    <button type="submit" class="btn btn-primary" name="kirim">Save</button>
                    <button type="button" class="btn btn-default" @click="closeForm()">Cancel</button>
                </div>
            </div>        
        </div>
    </form>
</div>
<div id="gmap" style="display: none;"></div>
        <div class="modal fade" id="formAdd" tabindex="-1" role="dialog" aria-labelledby="formStaffLabel" data-backdrop="static" data-keyboard="false">
          <div class="modal-dialog" role="document" style="margin-top: 15px;margin-bottom: 0">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="formStaffLabel">New Project</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form class="saveDep form" method="post" action="#" id="tambah" enctype="multipart/form-data">
              <div class="modal-body">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="department_title">PIC</label>
                      <input type="text" name="chandra" class="form-control form-control-lg" placeholder="Department Title">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="description">Region</label>
                      <textarea class="form-control" id="description" rows="2" name="description"></textarea>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="department_lead">Department Lead</label>
                      <input type="text" list="emp" name="department_lead" id="department_lead" class="form-control form-control-lg" placeholder="Department Lead">
                      <datalist id="emp">
                        <option value="Nico lahara Gawa">
                        <option value="asd  ">
                        <option value="asd asd asd">
                        <option value="Lisa  ">
                        <option value="adjie46  ">
                        <option value="adjie46  ">
                        <option value="Lisaaaa  ">
                        <option value="uncle k  ">
                      </datalist>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="parent_department">Parent Department</label>
                      <input type="text" list="browsers" name="parent_department" id="parent_department" class="form-control form-control-lg" placeholder="Parent Department">
                      <datalist id="browsers">
                        <option value="afsa">
                      </datalist>
                    </div>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-success" id="btnok">Create Project</button>
                <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
              </div>
            </form>
            </div>
          </div>
        </div>
        <!-- Modal Ends -->

        <div class="modal fade" id="showsubdep" tabindex="-1" role="dialog" aria-labelledby="formStaffLabel" data-backdrop="static" data-keyboard="false">
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
?>

<script type="text/javascript">
    $(document).ready(function(){

        $('#chandra').load('')
    });
</script>
<script type="text/javascript">
  var d = new Date();
  var months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
  document.getElementById("bulan").innerHTML = months[d.getMonth()];
  document.getElementById("tahun").innerHTML = d.getFullYear();
  $('.dropify').dropify();
</script>


<script type="text/javascript">
    $("[name='province_id']").change(function(){
      var get_prov = $("[name='province_id']").val();
        $.ajax({
          url : "http://beta.xavaxx.com/region-regency",
                type: "POST",
                dataType: "JSON",
                data: {
                    get_prov : get_prov
                },
                success : function(data){
                    var i;
                    var regency = "";
                    for(i=0;i<data.valuedata.length;i++){
                      regency += '<option value="'+data.valuedata[i].id_regency+'">'+data.valuedata[i].name_regency+'</option>';
                    }
                    $("#regency_id").html(regency);
                },error : function(jqXHR, textStatus, errorThrown){
                  swal({
                        title: 'Gagal!',
                        text: 'Gagal mengambil data.',
                        type: 'error',
                        confirmButtonClass: "btn btn-danger",
                        buttonsStyling: false
                    });
                }
        });
    })

    $("[name='regency_id']").change(function(){
      var get_kab = $("[name='regency_id']").val();
        $.ajax({
          url : "http://beta.xavaxx.com/region-distric",
                type: "POST",
                dataType: "JSON",
                data: {
                    get_kab : get_kab
                },
                success : function(data){
                    var i;
                    var distric = "";
                    for(i=0;i<data.valuedat.length;i++){
                      distric += '<option value="'+data.valuedat[i].id_distric+'">'+data.valuedat[i].name_distric+'</option>';
                    }
                    $("#district_id").html(distric);
                },error : function(jqXHR, textStatus, errorThrown){
                  swal({
                        title: 'Gagal!',
                        text: 'Gagal mengambil data.',
                        type: 'error',
                        confirmButtonClass: "btn btn-danger",
                        buttonsStyling: false
                    });
                }
        });
    })

    $("[name='district_id']").change(function(){
      var get_kel = $("[name='district_id']").val();
        $.ajax({
          url : "http://beta.xavaxx.com/region-vallige",
                type: "POST",
                dataType: "JSON",
                data: {
                    get_kel : get_kel
                },
                success : function(data){
                    var p;
                    var village = "";
                    for(p=0;p<data.valueda.length;p++){
                      village += '<option value="'+data.valueda[p].name_village+'">'+data.valueda[p].name_village+'</option>';
                    }
                    $("#village_all").html(village);
                },error : function(jqXHR, textStatus, errorThrown){
                  swal({
                        title: 'Gagal!',
                        text: 'Gagal mengambil data.',
                        type: 'error',
                        confirmButtonClass: "btn btn-danger",
                        buttonsStyling: false
                    });
                }
        });
    })
    $("[name='name_client']").change(function(){
        var get_cll = $("[name='name_client']").val();
        $.ajax({
          url : "http://beta.xavaxx.com/get_cll",
          type : "POST",
          dataType : "JSON",
          data : {
            id : get_cll
          },
          success : function(data){
            $("#nmnmn").val(data.vallue.email);
          }
        });
    })
</script>
<script type="text/javascript">
  // $("#client_all").click(function(){
  //     $.ajax({
  //       url : "http://beta.xavaxx.com/",
  //       type : "POST",
  //       dataType : "JSON",
  //       data : {}
  //     });
  // })
</script>

<script type="text/javascript">
  $(".single-select").select2({
    width: '100%',
    // dropdownParent: $('#addQuotation'),
  });
  $('#tableQuotation').DataTable({
      "aLengthMenu": [
        [5, 10, 15, -1],
        [5, 10, 15, "All"]
      ],
      "iDisplayLength": 5,
      "language": {
        search: ""
      },
      // "bSort" : false,
      // "dom": 'Bfrtip',
      // "buttons": [
      //   'copy', 'csv', 'excel', 'pdf', 'print'
      // ]
    });
  if ($(".datepicker").length) {
    $('.datepicker').datepicker({
      enableOnReadonly: true,
      todayHighlight: true,
      autoclose: true,
      format: "dd/mm/yyyy"
    });
  }
</script>

<!-- <script>
function autocomplete(inp, arr) {
  /*the autocomplete function takes two arguments,
  the text field element and an array of possible autocompleted values:*/
  var currentFocus;
  /*execute a function when someone writes in the text field:*/
  inp.addEventListener("input", function(e) {
      var a, b, i, val = this.value;
      /*close any already open lists of autocompleted values*/
      closeAllLists();
      if (!val) { return false;}
      currentFocus = -1;
      /*create a DIV element that will contain the items (values):*/
      a = document.createElement("DIV");
      a.setAttribute("id", this.id + "autocomplete-list");
      a.setAttribute("class", "autocomplete-items");
      /*append the DIV element as a child of the autocomplete container:*/
      this.parentNode.appendChild(a);
      /*for each item in the array...*/
      for (i = 0; i < arr.length; i++) {
        /*check if the item starts with the same letters as the text field value:*/
        if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
          /*create a DIV element for each matching element:*/
          b = document.createElement("DIV");
          /*make the matching letters bold:*/
          b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
          b.innerHTML += arr[i].substr(val.length);
          /*insert a input field that will hold the current array item's value:*/
          b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
          /*execute a function when someone clicks on the item value (DIV element):*/
          b.addEventListener("click", function(e) {
              /*insert the value for the autocomplete text field:*/
              inp.value = this.getElementsByTagName("input")[0].value;
              /*close the list of autocompleted values,
              (or any other open lists of autocompleted values:*/
              closeAllLists();
          });
          a.appendChild(b);
        }
      }
  });
  /*execute a function presses a key on the keyboard:*/
  inp.addEventListener("keydown", function(e) {
      var x = document.getElementById(this.id + "autocomplete-list");
      if (x) x = x.getElementsByTagName("div");
      if (e.keyCode == 40) {
        /*If the arrow DOWN key is pressed,
        increase the currentFocus variable:*/
        currentFocus++;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 38) { //up
        /*If the arrow UP key is pressed,
        decrease the currentFocus variable:*/
        currentFocus--;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 13) {
        /*If the ENTER key is pressed, prevent the form from being submitted,*/
        e.preventDefault();
        if (currentFocus > -1) {
          /*and simulate a click on the "active" item:*/
          if (x) x[currentFocus].click();
        }
      }
  });
  function addActive(x) {
    /*a function to classify an item as "active":*/
    if (!x) return false;
    /*start by removing the "active" class on all items:*/
    removeActive(x);
    if (currentFocus >= x.length) currentFocus = 0;
    if (currentFocus < 0) currentFocus = (x.length - 1);
    /*add class "autocomplete-active":*/
    x[currentFocus].classList.add("autocomplete-active");
  }
  function removeActive(x) {
    /*a function to remove the "active" class from all autocomplete items:*/
    for (var i = 0; i < x.length; i++) {
      x[i].classList.remove("autocomplete-active");
    }
  }
  function closeAllLists(elmnt) {
    /*close all autocomplete lists in the document,
    except the one passed as an argument:*/
    var x = document.getElementsByClassName("autocomplete-items");
    for (var i = 0; i < x.length; i++) {
      if (elmnt != x[i] && elmnt != inp) {
        x[i].parentNode.removeChild(x[i]);
      }
    }
  }
  /*execute a function when someone clicks in the document:*/
  document.addEventListener("click", function (e) {
      closeAllLists(e.target);
  });
}

/*An array containing all the country names in the world:*/
var nama = ["Autocomplate.php"];

/*initiate the autocomplete function on the "myInput" element, and pass along the countries array as possible autocomplete values:*/
autocomplete(document.getElementById("myInput"), nama);
</script> -->
