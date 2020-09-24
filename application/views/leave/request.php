<?php
    $this->load->view('template/head');
    $this->load->view('template/topbar');
    $this->load->view('template/sidebar');
?>
<style type="text/css">
  a:hover{
    text-decoration: none;
  }
  .days:hover{
    color: blue;
    cursor: pointer;
  }
</style>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row mb-4">
            <div class="col-12 d-flex align-items-center justify-content-between">
              <h4 class="page-title">Leave Request</h4>
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
            <div class="col-12">
              <div class="card">
                <div class="card-body">
                  <div class="card-title row">
                    <div class="col-md-12 text-right">
                      <button class="btn btn-icons btn-inverse-success" id="buttonModal" data-toggle="modal" data-target="#formAdd"><i class="fa fa-plus"></i></button>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-12 table-responsive">
                      <table id="tableLeaverequest" class="table">
                        <thead>
                          <tr class="text-center">
                            <th>No.</th>
                            <th>Employee Name</th>
                            <th>Total Days</th>
                            <th>Available</th>
                            <th>Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php foreach ($req as $key => $value) { ?>
                          <tr class="text-center">
                            <td><?php echo $key+1; ?></td>
                            <td><?php echo $value->fname." ".$value->mname." ".$value->lname; ?></td>
                            <td><span class="days" onclick="viewItem('<?php  echo $value->employeid; ?>');"><?php echo $value->tot; ?></span></td>
                            <td>
                              <?php if($value->tot <= 12 && ($value->available - $value->tot) != 0){ ?>
                                <div class="badge badge-primary">Available <strong><?php echo $value->available - $value->tot; ?></strong></div>
                              <?php }else{ ?>
                                <div class="badge badge-danger">Not Available <strong><?php echo $value->available - $value->tot; ?></strong></div>
                              <?php } ?></td>
                            <td>
                              <div class="dropdown">
                                <button type="button" class="btn btn-icons btn-rounded text-center" data-toggle="dropdown">
                                  <i class="ti-more-alt"></i>
                                </button>
                                <div class="dropdown-menu">
                                  <!--<button class="btn btn-link" onclick="edtItem('<?php echo $value->idann; ?>');"><i class="fa fa-pencil"></i></button>-->
                                  <button class="btn btn-link" onclick="delItem('<?php echo $value->employeid; ?>');"><i class="fa fa-trash-o"></i></button>
                                  <button class="btn btn-link" onclick="viewItem('<?php  echo $value->employeid; ?>');"><i class="fa fa-list-alt"></i></button>
                                </div>
                              </div>
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
        <div class="modal fade" id="formAdd" tabindex="-1" role="dialog" aria-labelledby="formStaffLabel" data-backdrop="static" data-keyboard="false">
          <div class="modal-dialog" role="document" style="margin-top: 15px;margin-bottom: 0">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="formStaffLabel">New Request</h5>
                <button type="button" class="close btn-close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form class="saveDep form" method="post" action="#" id="tambah" enctype="multipart/form-data">
              <div class="modal-body">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="employee_name">Employee Name</label>
                      <input type="text" list="browsers" name="employee_name" id="employee_name" class="form-control form-control-lg" placeholder="Employee Name">
                      <datalist id="browsers">
                        <?php foreach ($view as $vemp) {
                          $sql = $this->db->query("select sum(days) as tal from leavereq")->row();
                          if($sql->tal <=12 ){
                          ?>
                        <option value="<?php echo $vemp->employeid." - ".$vemp->fname." ".$vemp->mname." ".$vemp->lname; ?>"><?php echo $vemp->fname." ".$vemp->mname." ".$vemp->lname; ?></option>
                      <?php } }?>
                      </datalist>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="from_date">From</label>
                      <div class="input-group date datepicker">
                        <input type="text" name="from_date" id="from_date" class="form-control form-control-lg">
                        <span class="input-group-addon input-group-append border-left">
                          <span class="mdi mdi-calendar input-group-text"></span>
                        </span>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="to_date">To</label>
                      <div class="input-group date datepicker">
                        <input type="text" name="to_date" id="to_date" class="form-control form-control-lg">
                        <span class="input-group-addon input-group-append border-left">
                          <span class="mdi mdi-calendar input-group-text"></span>
                        </span>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="reason">Reason</label>
                      <textarea class="form-control" id="reason" rows="2" name="reason"></textarea>
                    </div>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-success">Create Request</button>
                <button type="button" class="btn btn-light btn-close" data-dismiss="modal">Cancel</button>
              </div>
            </form>
            </div>
          </div>
        </div>
        <!-- Modal Ends -->

        <div class="modal fade" id="showleave" tabindex="-1" role="dialog" aria-labelledby="formStaffLabel" data-backdrop="static" data-keyboard="false">
          <div class="modal-dialog modal-lg" role="document" style="margin-top: 15px;margin-bottom: 0">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="formStaffLabel">Detail Leave</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <table id="leavetbl" class="table">
                  <thead>
                    <tr class="text-center">
                      <th>From Date</th>
                      <th>To Date</th>
                      <th>Days</th>
                      <th>Leave Reason</th>
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
  $this->load->view('leave/js-crud/crud-request');
  require_once(APPPATH."views/component/message.php");
?>

<script type="text/javascript">
  $('#tableLeaverequest').DataTable({
      "aLengthMenu": [
        [5, 10, 15, -1],
        [5, 10, 15, "All"]
      ],
      "iDisplayLength": 10,
      "language": {
        search: ""
      },
    });

    $('#leavetbl').DataTable({
        "aLengthMenu": [
          [5, 10, 15, -1],
          [5, 10, 15, "All"]
        ],
        "iDisplayLength": 10,
        "language": {
          search: ""
        },
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

    $('.datepicker').datepicker({
        enableOnReadonly: true,
        todayHighlight: true,
        autoclose: true,
        format: "dd/mm/yyyy"
    });
  });

</script>
