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
              <h4 class="page-title">Heavy Equipment</h4>
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
                      <table id="heavyEquipment" class="table">
                        <thead>
                          <tr class="text-center">
                            <th>Description</th>
                            <th>Type</th>
                            <th>Brand</th>
                            <th>Reg. Date</th>
                            <!-- <th>Last Service</th> -->
                            <th>Working Hours</th>
                            <th>Status</th>
                            <!-- <th>Status</th> -->
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php foreach($heqs as $key => $heq){
                              $last_service = $this->db->order_by('service_date', 'DESC')->get_where('product_h_equipment_service', ['idhequipment'=>$heq->idhequipment], 1)->result();
                          ?>
                          <tr class="text-center">
                            <td><span class="btn btn-link" onclick="viewItem('<?php echo $value->idvendors; ?>');"> <?php echo $heq->description ?> </span></td>
                            <td> <?php echo $heq->type_name ?> </td>
                            <td> <?php echo $heq->brand_name ?> </td>
                            <td> <?php echo $heq->reg_date ?> </td>
                            <!-- <td>
                              <?php 
                                if(empty($last_service) || $last_service[0]->isDone){
                              ?>
                              <div class="row">
                                <div class="col-md-12">
                                  <button class="btn" style="background: transparent;padding-left:0px;padding-right:0px;">20/01/2021</button>
                                  <button class="btn btn-primary" style="padding-left:3px;padding-right:3px;" onclick="addService('<?php echo $heq->idhequipment; ?>');">&nbsp;<i class="fa fa-plus-circle"></i></button>
                                </div>
                              </div>
                              <?php }else{
                              ?>
                              <button class="btn " onclick="edtService('<?php echo $heq->idhequipment; ?>', '<?php echo $last_service[0]->idservice?>');"><?php echo $last_service[0]->service_date ?></button>
                              <?php } ?>
                            </td> -->
                            <td>
                              <?php 
                              $work_hours = $this->ShowModel->getDataWHere('service_h_equipment', [
                                  'h_equipment'=>$heq->idhequipment,
                                  'idcompany' => $this->session->userdata('idcompany')
                                ])->result();
                              $total_hours = 0;
                              foreach($work_hours as $wh){
                                $total_hours += $wh->total_hour;
                              }
                              echo $total_hours;
                              ?>
                            </td>
                            <td> <?php echo $heq->status ?> </td>
                            <!-- <td> - </td> -->
                            <!-- <td>-</td> -->
                            <td>
                              <button class="btn btn-link" onclick="edtItem('<?php echo $heq->idhequipment; ?>');"><i class="fa fa-pencil"></i></button>
                              <button class="btn btn-link" onclick="delItem('<?php echo $heq->idhequipment; ?>');"><i class="fa fa-trash-o"></i></button>
                              <button class="btn btn-link" onclick="serviceItem('<?php echo $heq->idhequipment; ?>');"><i class="fa fa-wrench"></i></button>
                            </td>
                          </tr>
                          <?php }?>
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

        <div class="modal fade" id="formAdd" tabindex="-1" role="dialog" aria-labelledby="formStaffLabel" data-backdrop="static" data-keyboard="false">
          <div class="modal-dialog" role="document" style="margin-top: 15px;margin-bottom: 0">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="formHEqLabel">New Heavy Equipment</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form class="saveHEquipment form" method="post" action="#" id="tambah" enctype="multipart/form-data">
              <div class="modal-body">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="description">Description</label>
                      <input type="text" name="description" id="description" class="form-control form-control-lg" placeholder="Description">
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
                      <label for="brand">Brand</label>
                      <select name="brand" id="brand" class="single-select form-control select2-nosearch" style="width:100%;">
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
                      <select name="type" id="type" class="single-select form-control select2-nosearch" style="width:100%;">
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
                      <label for="operator">Operator</label>
                      <select name="operator" id="operator" class="single-select form-control select2" style="width:100%;">
                        <option disabled="" selected="">-- Select Operator --</option>
                        <?php foreach ($operators as $key => $operator) { ?>
                          <option value="<?php echo $operator->mainid?>"><?php echo "{$operator->fname} {$operator->mname} {$operator->lname}" ?></option>
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
                <hr/>
                <!-- <div class="row">
                  <div class="col-md-12">
                    <h5>Service</h5>
                  </div>
                </div>
                <hr/>
                <div class="row">
                  <div class="col-md-12">
                    <h5>Working Hours</h5>
                  </div>
                </div> -->
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-success" id="btnheq">Save</button>
                <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
              </div>
            </form>
            </div>
          </div>
        </div>
        <!-- Modal Ends -->

        <!-- Modal Service -->
        <?php
          $this->load->view('product/h-equipment-service');
        ?>
        <!-- Modal Service End -->

<?php 
  $this->load->view('template/footer');
  // $this->load->view('template/fixed-plugin');
  $this->load->view('template/js');
  $this->load->view("product/js-crud/crud-h-equipment");
  $this->load->view("product/js-crud/crud-h-equipment-service");
?>

<script type="text/javascript">
  $('#heavyEquipment').DataTable({
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
</script>