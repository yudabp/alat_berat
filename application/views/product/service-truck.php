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
              <h4 class="page-title">Service Truck</h4>
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
                    <div class="col-md-12">
                      <?php foreach ($trucks as $key => $truck) {?>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="row">
                            <div class="col-md-5">Truck Name</div>
                            <div class="col-md-1">:</div>
                            <div class="col-md-6"><?php echo $truck->name; ?></div>
                          </div>
                          <div class="row">
                            <div class="col-md-5">Reg. Date</div>
                            <div class="col-md-1">:</div>
                            <div class="col-md-6"><?php echo $truck->reg_date; ?></div>
                          </div>
                          <div class="row">
                            <div class="col-md-5">Brand</div>
                            <div class="col-md-1">:</div>
                            <div class="col-md-6"><?php echo $truck->brand; ?></div>
                          </div>
                          <div class="row">
                            <div class="col-md-5">Chassis No.</div>
                            <div class="col-md-1">:</div>
                            <div class="col-md-6"><?php echo $truck->chassis_no; ?></div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="row">
                            <div class="col-md-5">Plat No.</div>
                            <div class="col-md-1">:</div>
                            <div class="col-md-6"><?php echo $truck->plat_no; ?></div>
                          </div>
                          <div class="row">
                            <div class="col-md-5">Driver</div>
                            <div class="col-md-1">:</div>
                            <div class="col-md-6"><?php echo $truck->driver; ?></div>
                          </div>
                          <div class="row">
                            <div class="col-md-5">Type</div>
                            <div class="col-md-1">:</div>
                            <div class="col-md-6"><?php echo $truck->type; ?></div>
                          </div>
                          <div class="row">
                            <div class="col-md-5">Machine No.</div>
                            <div class="col-md-1">:</div>
                            <div class="col-md-6"><?php echo $truck->machine_no; ?></div>
                          </div>
                        </div>
                      </div>
                      <?php } ?>
                      <div class="row text-right">
                        <div class="col-md-12">
                          <button class="btn btn-icons btn-inverse-success" id="buttonModal" data-toggle="modal" data-target="#formService"><i class="fa fa-plus"></i></button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-12 table-responsive">
                      <table id="Truck" class="table">
                        <thead>
                          <tr class="text-center">
                            <th>Request Date</th>
                            <th>Type of Service</th>
                            <th>Driver's Note</th>
                            <!-- <th>Reg. Date</th> -->
                            <!-- <th>Last Service</th> -->
                            <!-- <th>Trips</th> -->
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
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
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