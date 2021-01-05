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
              <h4 class="page-title">Truck</h4>
              <div class="d-flex align-items-center">
                <div class="wrapper mr-4 d-none d-sm-block">
                  <!-- <p class="mb-0">Summary for
                    <b class="mb-0"><i id="bulan"></i> <i id="tahun"></i></b>
                  </p> -->
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12">
              <div class="card px-2">
                <div class="card-body">
                  <div class="card-title row">
                    <div class="col-md-12 text-right">
                      <button class="btn btn-icons btn-inverse-success" id="buttonModal" data-toggle="modal" data-target="#formAdd"><i class="fa fa-plus"></i></button>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-12 table-responsive">
                      <table id="Truck" class="table">
                        <thead>
                          <tr class="text-center">
                            <th>Plat No.</th>
                            <th>Type</th>
                            <th>Brand</th>
                            <th>Reg. Date</th>
                            <th>Last Service</th>
                            <th>Trips</th>
                            <th>Status</th>
                            <!-- <th>Status</th> -->
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          
                          <tr class="text-center">
                            <td><span class="btn btn-link" onclick="viewItem('<?php echo $value->idvendors; ?>');">-</span></td>
                            <td> - </td>
                            <td> - </td>
                            <td> - </td>
                            <td>
                              <button class="btn btn-link" onclick="addService();"><i class="fa fa-plus-circle"></i></button>
                            </td>
                            <td>
                              <button class="btn btn-link" onclick="addTrip('<?php echo $value->idvendors; ?>');"><i class="fa fa-plus-circle"></i></button>
                            </td>
                            <td> - </td>
                            <!-- <td> </td> -->
                            <!-- <td>-</td> -->
                            <td>
                              <button class="btn btn-link" onclick="edtItem('<?php echo $value->idvendors; ?>');"><i class="fa fa-pencil"></i></button>
                              <button class="btn btn-link" onclick="delItem('<?php echo $value->idvendors; ?>');"><i class="fa fa-trash-o"></i></button>
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
        <!-- content-wrapper ends -->

        <!-- modal add -->
        <div class="modal fade" id="formAdd" tabindex="-1" role="dialog" aria-labelledby="formStaffLabel" data-backdrop="static" data-keyboard="false">
          <div class="modal-dialog" role="document" style="margin-top: 15px;margin-bottom: 0">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="formProductLabel">New Truck</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form class="saveDep form" method="post" action="#" id="tambah" enctype="multipart/form-data">
              <div class="modal-body">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="plat_no">Plat No.</label>
                      <input type="text" name="plat_no" id="plat_no" class="form-control form-control-lg" placeholder="Plat No.">
                    </div>
                  </div>
                  <!-- <div class="col-md-6">
                    <div class="form-group">
                      <label for="reg_date">Reg. Date</label>
                      <div class="input-group date datepicker">
                        <input type="text" id="reg_date" name="reg_date" class="form-control form-control-lg" >
                        <span class="input-group-addon input-group-append border-left">
                          <span class="mdi mdi-calendar input-group-text"></span>
                        </span>
                      </div>
                    </div>
                  </div> -->
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="type">Type</label>
                      <input type="text" list="emp" name="type" id="type" class="form-control form-control-lg" placeholder="Type">
                      <!-- <datalist id="emp">
                        <?php foreach ($employe as $emp) { ?>
                        <option value="<?php echo $emp->fname." ".$emp->mname." ".$emp->lname; ?>">
                        <?php } ?>
                      </datalist> -->
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="brand">Brand</label>
                      <input type="text" list="browsers" name="brand" id="brand" class="form-control form-control-lg" placeholder="Brand">
                      <!-- <datalist id="browsers">
                        <?php foreach ($view as $key => $val) { ?>
                        <option value="<?php echo $val->departmenttitle; ?>">
                        <?php } ?>
                      </datalist> -->
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="reg_date">Reg. Date</label>
                      <div class="input-group date datepicker">
                        <input type="text" id="reg_date" name="reg_date" class="form-control" >
                        <span class="input-group-addon input-group-append border-left">
                          <span class="mdi mdi-calendar input-group-text"></span>
                        </span>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="driver">Driver</label>
                      <!-- <input type="number" name="stock" id="stock" class="form-control form-control-lg" placeholder="Stock"> -->
                      <input type="text" list="browsers" name="driver" id="driver" class="form-control form-control-lg" placeholder="Driver">
                      <!-- <datalist id="browsers">
                        <?php foreach ($view as $key => $val) { ?>
                        <option value="<?php echo $val->departmenttitle; ?>">
                        <?php } ?>
                      </datalist> -->
                      <!-- <select name="driver" id="driver" class="single-select form-control">
                        <option disabled="" selected="">-- Select Status --</option>
                        <option>Available</option>
                        <option>Not Available</option>
                      </select> -->
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="chassis_no">Chassis No</label>
                      <input type="text" name="chassis_no" id="chassis_no" class="form-control form-control-lg" placeholder="Chassis No">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="machine_no">Machine No</label>
                      <input type="text" name="machine_no" id="machine_no" class="form-control form-control-lg" placeholder="Machine No">
                    </div>
                  </div>
                </div>
                <hr/>
                <div class="row">
                  <div class="col-md-12">
                    <h5>Service</h5>
                  </div>
                </div>
                <hr/>
                <div class="row">
                  <div class="col-md-12">
                    <h5>Trips</h5>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-success" id="btnok">Add Truck</button>
                <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
              </div>
            </form>
            </div>
          </div>
        </div>
        <!-- Modal add Ends -->

        <!-- Modal Service -->
        <div class="modal fade" id="formService" tabindex="-1" role="dialog" aria-labelledby="formServiceLabel" data-backdrop="static" data-keyboard="false">
          <div class="modal-dialog" role="document" style="margin-top: 15px;margin-bottom: 0">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="formServiceLabel">Service Truck</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form class="saveDep form" method="post" action="#" id="tambah" enctype="multipart/form-data">
              <div class="modal-body">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="service_date">Date</label>
                      <div class="input-group date datepicker">
                        <input type="text" id="service_date" name="service_date" class="form-control" >
                        <span class="input-group-addon input-group-append border-left">
                          <span class="mdi mdi-calendar input-group-text"></span>
                        </span>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="type_service">Driver</label>
                      <select name="type_service" id="type_service" class="single-select form-control">
                        <option disabled="" selected="">-- Type of Service --</option>
                        <option>Service</option>
                        <option>Repair</option>
                      </select>
                    </div>
                  </div>
                </div>
                <hr/>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="driver_note">Driver's Note</label>
                      <textarea name="driver_note" id="driver_note" class="form-control form-control-lg" placeholder="Driver's Note"></textarea>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="action">Action</label>
                      <div id="p_action" data="1">
                        <div class="p_action1">

                          <div class="row" id="selected_action">
                            <div class="col-md-10" >
                              <input type="text" class="form-control" rows="2" id="action" name="action[]" style="width: 100%;">
                            </div>
                            <div class="col-md-2">
                              <button type="button" id="btnselect" class="btn btn-info btn-sm icon-btn ml-4 mb-2"><i class="mdi mdi-plus"></i></button>
                            </div>
                          </div>

                        </div>
                        <div id="ulang" data="1"></div>
                      </div>

                    </div>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-success" id="btnok">Add Truck</button>
                <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
              </div>
            </form>
            </div>
          </div>
        </div>
        <!-- Modal Service End -->

<?php 
  $this->load->view('template/footer');
  // $this->load->view('template/fixed-plugin');
  $this->load->view('template/js');
?>

<script type="text/javascript">
  $('#Truck').DataTable({
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
  $(document).ready(function() {
      $('#buttonModal').click(function() {
          $('html').css('overflow', 'hidden');
          $('body').bind('touchmove', function(e) {
              e.preventDefault()
          });
      });
      if ($(".datepicker").length) {
        $('.datepicker').datepicker({
          enableOnReadonly: true,
          todayHighlight: true,
          autoclose: true,
          format: "dd/mm/yyyy"
        });
      }
      $('.btn-close').click(function() {
          $('html').css('overflow', 'scroll');
          $('body').unbind('touchmove');
      });
      $("#phone_no").inputmask({"mask": "(+62)8##-####-####"});
    });

  var btnaddselect = $('#btnselect');
      var btnDelete;
      var loopID = 1;
      btnaddselect.on('click', function(){
        //console.log("ok");
      loopID++;
      var headHtml = $('#p_action');
      var html = `
      <div class="p_action`+loopID+`">
        <div class="row mt-2">
          <div class="col-md-10">
            <input type="text" class="form-control" rows="2" id="action" name="action[]" style="width: 100%;">
          </div>
          <div class="col-md-2">
            <button type="button"  class="btn btn-danger btn-just-icon add btn-sm btnDelete" data="p_action`+loopID+`"><i class="fa fa-minus"></i></button>
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

  function addService() {
    $("#formService").modal("show");
  }
</script>