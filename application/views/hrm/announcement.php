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
              <h4 class="page-title">Announcement</h4>
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
                      <button class="btn btn-icons btn-inverse-success" id="buttonModal" data-toggle="modal" data-target="#formAdd" onclick="clearModal()"><i class="fa fa-plus"></i></button>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-12 table-responsive">
                      <table id="tableannouncement" class="table">
                        <thead>
                          <tr class="text-center">
                            <th>No</th>
                            <th>Title</th>
                            <th>Sent to</th>
                            <th>Description</th>
                            <th>Date</th>
                            <th>Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php foreach ($view as $key => $value) {?>

                          <tr class="text-center">
                            <td><?php echo $key +1; ?></td>
                            <td><?php echo $value->anntitle; ?></td>
                            <td style="text-align:left;"><?php echo $value->annsendto; if($value->annsendto == "designation" || $value->annsendto=="department"){ echo "<strong> - ".$value->annsenddetail."</strong>";}elseif ($value->annsendto =="all" || $value->annsendto=="selected") {echo " employee";}?></td>
                            <td><?php echo $value->anndesc?></td>
                            <td><?php $date = date_create($value->adddate); echo date_format($date,"d / M / Y H:i:s");?></td>
                            <td style="text-align:left;">
                              <div class="dropdown">
                                <button type="button" class="btn btn-icons btn-rounded text-center" data-toggle="dropdown">
                                  <i class="ti-more-alt"></i>
                                </button>
                                <div class="dropdown-menu">
                                  <button class="btn btn-link" onclick="edtItem('<?php echo $value->idann; ?>');"><i class="fa fa-pencil"></i></button>
                                  <button class="btn btn-link" onclick="delItem('<?php echo $value->idann; ?>');"><i class="fa fa-trash-o"></i></button>
                                  <!-- <?php if($value->annsendto=="selected"){ ?><button class="btn btn-link" onclick="viewItem('<?php echo $value->idann; ?>');"><i class="fa fa-user"></i></button><?php } ?> -->
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
                <h5 class="modal-title" id="formStaffLabel">New Announcement</h5>
                <button type="button" class="close btn-close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form class="saveAnn form" method="post" name="addForm" action="<?php echo base_url(); ?>saveAnn" id="tambah" enctype="multipart/form-data">
              <div class="modal-body">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="announcement_title">Announcement Title</label>
                      <input type="text" name="announcement_title" id="announcement_title" class="form-control form-control-lg" placeholder="Announcement Title" required>
                      <input type="hidden" name="id_ann" id="id_ann">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="description">Description</label>
                      <textarea class="form-control" id="description" name="description" rows="2" required></textarea>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label>Send Announcement to</label>
                  <div class="input-group">
                    <select class="form-control form-control-sm" id="tipeSelection" name="tipeSelection">
                      <option disabled selected>-- Choose --</option>
                      <option value="all">All Employees</option>
                      <option value="selected">Selected Employees</option>
                      <option value="department">By Deptartment</option>
                      <option value="designation">By Designation</option>
                    </select>
                  </div>
                </div>
                <div class="form-group" style="display: none;" id="selected_employees">
                  <div id="employees" data="1">
                    <div class="employees1">
                      <div class="row" id="selected_employees">
                        <div class="col-md-12" >
                          <input type="text" list="browsers" name="selected_employee[]" id="selected_employee" class="form-control form-control-lg" placeholder="Employee name or ID">
                          <datalist id="browsers">
                            <?php foreach ($emp as $vemp) { ?>
                            <option value="<?php echo $vemp->employeid." - ".$vemp->fname." ".$vemp->mname." ".$vemp->lname; ?>">
                            <?php } ?>
                          </datalist>
                        </div>
                        <!-- <div class="col-md-2">
                          <button type="button" id="btnselect" class="btn btn-success btn-sm"><i class="fa fa-plus"></i></button>
                        </div> -->
                      </div>
                    </div>
                  </div>
                </div>

                <div class="form-group" style="display: none;" id="by_dept">
                  <div class="input-group">
                    <select class="form-control form-control-sm" name="by_depart" id="by_depart">
                      <option selected="selected" disabled="disabled"> - Select By Dept - </option>
                       <?php foreach ($dept as $key => $value): ?>
                        <option value="<?php echo $value->departmenttitle; ?>"><?php echo $value->departmenttitle; ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>

                <div class="form-group" style="display: none;" id="by_designation">
                  <div class="input-group">
                    <select class="form-control form-control-sm" name="by_des" id="by_des">
                      <option selected="selected" disabled="disabled"> - Select By Designation - </option>
                      <?php foreach ($desg as $key => $value): ?>
                      <option value="<?php echo $value->designationtitle; ?>"><?php echo $value->designationtitle; ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-success" id="btnok">Create Announcement</button>
                <button type="button" class="btn btn-light btn-close" data-dismiss="modal">Cancel</button>
              </div>
            </form>
            </div>
          </div>
        </div>
        <!-- Modal Ends -->

        <div class="modal fade" id="showemployee" tabindex="-1" role="dialog" aria-labelledby="formStaffLabel" data-backdrop="static" data-keyboard="false">
          <div class="modal-dialog modal-md" role="document" style="margin-top: 15px;margin-bottom: 0">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="formStaffLabel">Selected Employees</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <table id="seletedem" class="table">
                  <thead>
                    <tr class="text-center">
                      <th>Name</th>
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
  $this->load->view("hrm/js-crud/crud-announcement");
  require_once(APPPATH."views/component/message.php");
?>
<script type="text/javascript">
  $('#tableannouncement').DataTable({
      "aLengthMenu": [
        [5, 10, 15, -1],
        [5, 10, 15, "All"]
      ],
      "iDisplayLength": 10,
      "language": {
        search: ""
      },
    });

    $('#seletedem').DataTable({
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
  });

  $("#tipeSelection").change(function(){
    var value = $(this).val();
    if(value == "selected"){
      $("#tipeselect").removeAttr("disabled");
      $("#selected_employees").css("display", "block");
      $("#by_dept").css("display", "none");
      $("#by_designation").css("display", "none");
    }
    else if(value == "department"){
      $("#tipeselect").removeAttr("disabled");
      $("#by_dept").css("display", "block");
      $("#selected_employees").css("display", "none");
      $("#by_designation").css("display", "none");
    }
    else if(value == "designation"){
      $("#tipeselect").removeAttr("disabled");
      $("#by_designation").css("display", "block");
      $("#selected_employees").css("display", "none");
      $("#by_dept").css("display", "none");
    }
    else{
      $("#tipeselect").attr("disabled", "disabled");
      $("#selected_employees").css("display", "none");
      $("#by_dept").css("display", "none");
      $("#by_designation").css("display", "none");
    }
  });

  var btnaddselect = $('#btnselect');
    var btnDelete;
    var loopID = 1;
    btnaddselect.on('click', function(){
      //console.log("ok");
    loopID++;
    var headHtml = $('#employees');
    var html = `
    <div class="employees`+loopID+`">
      <div class="row mt-2">
        <div class="col-md-10">
          <input type="text" list="brow" name="selected_employee[]" id="selected_employee" class="form-control form-control-lg" placeholder="Employee name or ID">
          <datalist id="brow">
            <?php foreach ($emp as $vemp) { ?>
            <option value="<?php echo $vemp->employeid." - ".$vemp->fname." ".$vemp->mname." ".$vemp->lname; ?>">
            <?php } ?>
          </datalist>
        </div>
        <div class="col-md-2">
          <button type="button"  class="btn btn-danger btn-just-icon add btn-sm btnDelete" data="employees`+loopID+`"><i class="fa fa-minus"></i></button>
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

</script>
