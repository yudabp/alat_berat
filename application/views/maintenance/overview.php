<?php
    $this->load->view('template/head');
    $this->load->view('template/topbar');
    $this->load->view('template/sidebar');
?>
<style type="text/css">
  a:hover{
    text-decoration: none;
  }

  html, body, #map-canvas {
    height: 100%;
    margin: 0;
    padding: 0;
  }
</style>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row mb-4">
            <div class="col-12 d-flex align-items-center justify-content-between">
              <h4 class="page-title">Overview</h4>
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
            <div class="col-lg-12">
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-4">
                      <button class="btn btn-inverse-success" id="buttonModal" data-toggle="modal" data-target="#formAdd"><i class="fa fa-plus"></i> Create A New Maintenance</button>
                      <!-- <div class="wrapper mt-4">
                        <div class="item-wrapper d-flex pb-4 border-bottom">
                          <div class="status-wrapper d-flex align-items-start pr-3">
                            <span class="bg-warning rounded-circle p-1 mt-2 mx-auto"></span>
                          </div>
                          <div class="text-wrapper">
                            <h6 class="d-block mb-1">Dentist appoinment:metro</h6>
                            <small class="d-block mb-2">
                              <strong>7 Feb 2017, 16:00</strong>
                            </small>
                            <small class="text-gray d-block">First Remainder : 1 Hours min before</small>
                          </div>
                        </div>
                        <div class="item-wrapper d-flex py-4">
                          <div class="status-wrapper d-flex align-items-start pr-3">
                            <span class="bg-success rounded-circle p-1 mt-2 mx-auto"></span>
                          </div>
                          <div class="text-wrapper">
                            <h6 class="d-block mb-1">Job appoinment:metro</h6>
                            <small class="d-block mb-2">
                              <strong>9 Feb 2017, 20:00</strong>
                            </small>
                            <small class="text-gray d-block">First Remainder : 1 Hours min before</small>
                          </div>
                        </div>
                        <div class="item-wrapper d-flex py-4">
                          <div class="status-wrapper d-flex align-items-start pr-3">
                            <span class="bg-success rounded-circle p-1 mt-2 mx-auto"></span>
                          </div>
                          <div class="text-wrapper">
                            <h6 class="d-block mb-1">Job appoinment:metro</h6>
                            <small class="d-block mb-2">
                              <strong>9 Feb 2017, 20:00</strong>
                            </small>
                            <small class="text-gray d-block">First Remainder : 1 Hours min before</small>
                          </div>
                        </div>
                        <div class="item-wrapper d-flex py-4">
                          <div class="status-wrapper d-flex align-items-start pr-3">
                            <span class="bg-success rounded-circle p-1 mt-2 mx-auto"></span>
                          </div>
                          <div class="text-wrapper">
                            <h6 class="d-block mb-1">Job appoinment:metro</h6>
                            <small class="d-block mb-2">
                              <strong>9 Feb 2017, 20:00</strong>
                            </small>
                            <small class="text-gray d-block">First Remainder : 1 Hours min before</small>
                          </div>
                        </div>
                        <div class="item-wrapper d-flex py-4">
                          <div class="status-wrapper d-flex align-items-start pr-3">
                            <span class="bg-success rounded-circle p-1 mt-2 mx-auto"></span>
                          </div>
                          <div class="text-wrapper">
                            <h6 class="d-block mb-1">Job appoinment:metro</h6>
                            <small class="d-block mb-2">
                              <strong>9 Feb 2017, 20:00</strong>
                            </small>
                            <small class="text-gray d-block">First Remainder : 1 Hours min before</small>
                          </div>
                        </div>
                      </div> -->
                    </div>
                    <div class="col-md-12">
                      <div id="calendar"></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
        <div class="modal fade" id="formAdd" tabindex="-1" role="dialog" aria-labelledby="formStaffLabel" data-backdrop="static" data-keyboard="false">
          <div class="modal-dialog modal-lg" role="document" style="margin-top: 15px;margin-bottom: 0">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="formStaffLabel">New Maintenance</h5>
                <button type="button" class="close btn-close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form class="saveOver form" method="post" action="#" id="tambah" enctype="multipart/form-data">
              <div class="modal-body">
                <div class="row">
                  <div class="col-md-6">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="Sticker_no">Sticker No.</label>
                          <select name="Sticker_no" id="sticker_no" class="single-select form-control">
                            <option selected="selected" disabled="disabled"> - Select - </option>
                            <?php foreach($sticker as $valsticker){ ?>
                            <option value="<?= $valsticker->idsticker;  ?>"><?= $valsticker->sticker; ?></option>
                            <?php } ?>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="job_category">Job Category</label>
                          <select name="job_category" id="job_category" class="single-select form-control">
                            <option selected="selected" disabled="disabled"> - Select - </option>
                            <?php foreach($job as $jobs){ ?>
                            <option value="<?= $jobs->idcategory;  ?>"><?= $jobs->categoryname; ?></option>
                            <?php } ?>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label>Clients</label>
                          <div class="input-group">
                            <select class="form-control form-control-sm" id="tipeSelection" name="tipeSelection">
                              <option disabled selected>-- Choose --</option>
                              <?php foreach($client as $clients){ ?>
                            <option value="<?= $clients->idcontacts;  ?>"><?= $clients->company; ?></option>
                            <?php } ?>
                            </select>
                          </div>
                        </div>
                        
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="date_of_hire">From</label>
                          <div class="input-group date datepicker">
                            <input type="text" id="date_from" name="date_from" class="form-control">
                            <span class="input-group-addon input-group-append border-left">
                              <span class="mdi mdi-calendar input-group-text"></span>
                            </span>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="date_of_hire">To</label>
                          <div class="input-group date datepicker">
                            <input type="text" id="date_to" name="date_to" class="form-control">
                            <span class="input-group-addon input-group-append border-left">
                              <span class="mdi mdi-calendar input-group-text"></span>
                            </span>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="latitude">Latitude</label>
                          <input type="text" name="maplat" id="maplat" class="form-control" placeholder="Latitude">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="longitude">Longitude</label>
                          <input type="text" name="maplng" id="maplng" class="form-control" placeholder="Longitude">
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label for="check_in_range">Check-in Range</label>
                          <input type="text" name="mapdistance" id="mapdistance" value="50" class="form-control" placeholder="Check-in Range">
                        </div>
                      </div>
                      <div class="col-md-6 mt-4">
                        <div class="form-group">
                          <input type="text" name="question" id="question" class="form-control" placeholder="Question">
                        </div>
                      </div>
                      <div class="col-md-6 mt-4">
                        <div class="form-group">
                          <input type="text" name="answer" id="answer" class="form-control" placeholder="Answer">
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="row">
                      <div class="col-md-6">
                        <div style="height: 433px; width: 550px;" id="map-canvas"></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-success" id="crmaintenance">Create Maintenance</button>
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
  $this->load->view('maintenance/js-crud/crud-overview');
?>

<script type="text/javascript">

  $("#tipeSelection").change(function(){
  var value = $(this).val();
  if(value == "2"){
    $("#tipeselect").removeAttr("disabled");
    $("#2").css("display", "block");
    $("#address").css("display", "none");
  }
  else if(value == "address"){
      $("#tipeselect").removeAttr("disabled");
      $("#address").css("display", "block");
      $("#2").css("display", "none");
    }
  else{
    $("#tipeselect").attr("disabled", "disabled");
    $("#2").css("display", "none");
  }
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

  $('.datepicker').datepicker({
    enableOnReadonly: true,
    todayHighlight: true,
    autoclose: true,
    format: "dd/mm/yyyy"
  });

//create empty temp array
  var markersArray = [];
  var circlesArray = [];
  //map property
  var map;
  function initialize() {
    //define map
      var mapOptions = {
        zoom: 15,
        center: new google.maps.LatLng(3.597031,98.678513),
        mapTypeId: google.maps.MapTypeId.ROADMAP
      };

    //create new map
      map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

    //add click event
      google.maps.event.addListener(map, 'click', function(e) {
      var distance = parseInt(document.getElementById('mapdistance').value);
          if( distance < 1 ){
            alert('Your distance is too small');
        }

        //clear map
          removeMarkersAndCircles();
          //draw marker with circle
          placeMarker(e.latLng, map, distance);
          //write actual position into inputs
          writeLabels(e.latLng);
    });
  }

  //function to place marker into map
  function placeMarker(position, map, distance) {
    // Create marker
    var marker = new google.maps.Marker({
      map: map,
      position: position,
      title: 'Center'
    });

    //add marker into temp array
    markersArray.push(marker);

    //Add circle overlay and bind to marker
    var circle = new google.maps.Circle({
        map: map,
        radius: distance,
        fillColor: '#AA0000'
    });
    circle.bindTo('center', marker, 'position');

    circlesArray.push(circle);
  }

  //remove all markers from map
  function removeMarkersAndCircles() {
      if (markersArray) {
          for (i=0; i < markersArray.length; i++) {
              markersArray[i].setMap(null);
              circlesArray[i].setMap(null);
          }
      markersArray.length = 0;
      circlesArray.length = 0;
      }
  }

  //write labels into inputs
  function writeLabels(position){
    document.getElementById('maplat').value = position.lat();
    document.getElementById('maplng').value = position.lng();
  }

  //draw marker and circle by location
  function drawByLocation(){
    var position = new google.maps.LatLng(lat, lng);

    //create marker and circle
    removeMarkersAndCircles();
      placeMarker(position, map, distance);
      writeLabels(position);

  }

  //initialize map
  google.maps.event.addDomListener(window, 'load', initialize);

  (function($) {
    'use strict';
    $(function() {
      var style = getComputedStyle(document.body);
      if ($('#calendar').length) {
        $('#calendar').fullCalendar({
          header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,basicWeek,basicDay'
          },
          defaultDate: '<?= date('Y-m-d');?>',
          navLinks: true, // can click day/week names to navigate views
          editable: true,
          eventLimit: true, // allow "more" link when too many events
          events: [<?php foreach ($views as $cl) {?>
          {
            title: '<?php echo $cl->first_name." - ".$cl->last_name; ?>',
            start: '<?php $dt = explode('/',$cl->datefrom); echo $dt[2]."-".$dt[1]."-".$dt[0]; ?>',
            end: '<?php $dt = explode('/',$cl->dateto); echo $dt[2]."-".$dt[1]."-".$dt[0]; ?>',
            color: "<?= $cl->color ?>"
          },
          <?php } ?>
          ],
          eventClick: function(info) {
            
            $.ajax({
              url : "http://beta.xavaxx.com/date-click",
              type : "POST",
              dataType : "JSON",
              data : {
                idcolor : info.color,
                iddate : info.start._i
              },
              success : function(data){
                  $('#info').modal('show'); 
                  $("#datkl").html(`<p>`+info.start._i+`  --->   `+data.hll.text+`</p>`);
                  $("#vbnv").val(info.title);
                  console.log(info.title);
                  console.log(data.dt);
                  console.log(info);

              },
              error : function(){
                // $('#info').modal('show');

              }

            });
        }
        })
      }
    });
  })(jQuery);

</script>
<?php 
    $this->load->view('maintenance/modal'); ?>