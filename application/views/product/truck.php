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
                            <th>Truck Name</th>
                            <th>Plat No.</th>
                            <th>Type</th>
                            <th>Reg. Date</th>
                            <!-- <th>Last Service</th> -->
                            <th>Trips</th>
                            <th>Status</th>
                            <!-- <th>Status</th> -->
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php foreach($trucks as $key => $truck){
                              $last_service = $this->db->order_by('service_date', 'DESC')->get_where('product_truck_service', ['idtruck'=>$truck->idtruck], 1)->result();
                           ?>
                          <tr class="text-center">
                            <td><span class="btn btn-link" onclick="viewItem('<?php echo $truck->idtruck; ?>');"><?php echo $truck->plat_no ?></span></td>
                            <td> <?php echo $truck->type_name ?> </td>
                            <td> <?php echo $truck->brand_name ?> </td>
                            <td> <?php echo $truck->reg_date ?> </td>
                            <!-- <td>
                              <?php 
                                if(empty($last_service) || $last_service[0]->isDone){
                              ?>
                              <div class="row">
                                <div class="col-md-12">
                                  <button class="btn" style="background: transparent;padding-left:0px;padding-right:0px;">20/01/2021</button>
                                  <button class="btn btn-primary" style="padding-left:3px;padding-right:3px;" onclick="addService('<?php echo $truck->idtruck; ?>');">&nbsp;<i class="fa fa-plus-circle"></i></button>
                                </div>
                              </div>
                              <?php }else{
                              ?>
                              <button class="btn" onclick="edtService('<?php echo $truck->idtruck; ?>', '<?php echo $last_service[0]->idservice?>');"><?php echo $last_service[0]->service_date ?></button>
                              <?php } ?>
                            </td> -->
                            <td>
                              <?php 
                                $countTrips = $this->db->get_where('service_mining',['plat_no'=>$truck->idtruck,'idcompany'=>$this->session->userdata('idcompany')])->num_rows();
                                echo $countTrips;
                              ?>
                            </td>
                            <td> <?php echo $truck->status ?> </td>
                            <!-- <td> </td> -->
                            <!-- <td>-</td> -->
                            <td>
                              <button class="btn btn-link" onclick="edtItem('<?php echo $truck->idtruck; ?>');"><i class="fa fa-pencil"></i></button>
                              <button class="btn btn-link" onclick="delItem('<?php echo $truck->idtruck; ?>');"><i class="fa fa-trash-o"></i></button>
                              <button class="btn btn-link" onclick="serviceItem('<?php echo $truck->idtruck; ?>');"><i class="fa fa-wrench"></i></button>
                            </td>
                          </tr>
                          <?php } ?>
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
                <h5 class="modal-title" id="formTruckLabel">New Truck</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form class="saveTruck form" method="post" action="#" id="tambah" enctype="multipart/form-data">
              <div class="modal-body">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="truck_name">Truck Name</label>
                      <input type="text" name="truck_name" id="truck_name" class="form-control form-control-lg" placeholder="Truck Name">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="plat_no">Plat No.</label>
                      <input type="text" name="plat_no" id="plat_no" class="form-control form-control-lg" placeholder="Plat No.">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="brand">Brand</label>
                      <select name="brand" id="brand" class="single-select form-control select2" style="width:100%;">
                        <option disabled="" selected="">-- Select Brand --</option>
                        <?php foreach ($brands as $key => $brand) { ?>
                          <option value="<?php echo $brand->idbrand?>"><?php echo $brand->brand_name ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="type">Type</label>
                      <select name="type" id="type" class="single-select form-control select2" style="width:100%;">
                        <option disabled="" selected="">-- Select Type --</option>
                        <?php foreach ($types as $key => $type) { ?>
                          <option value="<?php echo $type->idtype?>"><?php echo $type->type_name ?></option>
                        <?php } ?>
                      </select>
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
                      <select name="driver" id="driver" class="single-select form-control select2" style="width:100%;">
                        <option disabled="" selected="">-- Select Driver --</option>
                        <?php foreach ($drivers as $key => $driver) { ?>
                          <option value="<?php echo $driver->mainid?>"><?php echo "{$driver->fname} {$driver->mname} {$driver->lname}" ?></option>
                        <?php } ?>
                      </select>
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
                <!-- <hr/>
                <div class="row">
                  <div class="col-md-12">
                    <h5>Service</h5>
                    <table>
                      <thead>
                        <tr>
                          <th>Date</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>20/01/2021</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
                <hr/>
                <div class="row">
                  <div class="col-md-12">
                    <h5>Trips</h5>
                  </div>
                </div> -->
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-success" id="btntruck">Add Truck</button>
                <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
              </div>
            </form>
            </div>
          </div>
        </div>
        <!-- Modal add Ends -->

        <!-- Modal Service -->
        <?php
          $this->load->view('product/truck-service');
        ?>
        <!-- Modal Service End -->

<?php 
  $this->load->view('template/footer');
  // $this->load->view('template/fixed-plugin');
  $this->load->view('template/js');
  $this->load->view("product/js-crud/crud-truck");
  $this->load->view("product/js-crud/crud-truck-service");
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

    $(".services").change(function(){
      let el = $(this);
      let id = el.attr("id");
      if(el.val()!="")
      {
        $(".service-"+id).removeClass("d-none");
        // $(".repair-"+id).addClass("d-none");
      }else{
        // $(".repair-"+id).removeClass("d-none");
        $(".service-"+id).addClass("d-none");
      }
    });
  });

  var btnaddselect = $('#btnselect');
  var btnDelete;
  var loopID = 1;
  // btnaddselect.on('click', function(){
  //   //console.log("ok");
  //   addAction();
  // });
</script>