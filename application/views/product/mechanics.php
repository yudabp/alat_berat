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
          <!-- Service Truck -->
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
                    <div class="col-md-12 text-right">
                      <!-- <button class="btn btn-icons btn-inverse-success" id="buttonModal" data-toggle="modal" data-target="#formAdd"><i class="fa fa-plus"></i></button> -->
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-12 table-responsive">
                      <table id="tableTruck" class="table">
                        <thead>
                          <tr class="text-center">
                            <th>Request Date</th>
                            <th>Truck Name</th>
                            <th>Type of Service</th>
                            <th>Driver's Note</th>
                            <!-- <th>Reg. Date</th> -->
                            <!-- <th>Stock</th> -->
                            <!-- <th>Status</th> -->
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php 
                            foreach($truck_services as $truck){
                          ?>
                          <tr class="text-center">
                            <td><span class="btn btn-link" onclick="viewItem('coba');"><?= $truck->service_date ?></span></td>
                            <td><?= $truck->name ?></td>
                            <td><?= $truck->service_type ?></td>
                            <td><?= $truck->driver_note ?></td>
                            <td>
                              <button class="btn btn-link" onclick="prosesTruck('<?= $truck->idservice ?>');"><i class="fa fa-wrench"></i></button>
                              <!-- <button class="btn btn-link" onclick="delItem('<?php echo $spart->idsparepart; ?>');"><i class="fa fa-trash-o"></i></button> -->
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
          <!-- End Service Truck -->

          <br><hr>

          <!-- Service Heavy Equipment -->
          <div class="row mb-4">
            <div class="col-12 d-flex align-items-center justify-content-between">
              <h4 class="page-title">Service Heavy Mechanics</h4>
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
                      <!-- <button class="btn btn-icons btn-inverse-success" id="buttonModal" data-toggle="modal" data-target="#formAdd"><i class="fa fa-plus"></i></button> -->
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-12 table-responsive">
                      <table id="tableHEquipment" class="table">
                        <thead>
                          <tr class="text-center">
                            <th>Request Date</th>
                            <th>Name</th>
                            <th>Type of Service</th>
                            <th>Description</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php 
                            foreach($heq_services as $heq){
                          ?>
                          <tr class="text-center">
                            <td><span class="btn btn-link" onclick="viewItem('coba');"><?= $heq->service_date ?></span></td>
                            <td><?= $heq->description ?></td>
                            <td><?= $heq->service_type ?></td>
                            <td><?= $heq->heq_desc ?></td>
                            <td>
                              <button class="btn btn-link" onclick="prosesEquipment('<?= $heq->idservice ?>');"><i class="fa fa-wrench"></i></button>
                              <!-- <button class="btn btn-link" onclick="delItem('<?php echo $spart->idsparepart; ?>');"><i class="fa fa-trash-o"></i></button> -->
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
          <!-- End Service Heavy Equipment -->
        </div>
        <!-- content-wrapper ends -->

        <!-- Modal Start -->
        <?php $this->load->view('product/modal-mechanics') ?>
        <!-- Modal Ends -->

<?php 
  $this->load->view('template/footer');
  // $this->load->view('template/fixed-plugin');
  $this->load->view('template/js');
  $this->load->view("product/js-crud/crud-mechanics");
?>

<script type="text/javascript">
  $('#tableTruck').DataTable({
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

  $('#tableHEquipment').DataTable({
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
</script>
