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
              <h4 class="page-title">List Maintenance</h4>
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
                    <!-- <div class="col-md-12 text-right">
                      <button class="btn btn-icons btn-inverse-success" id="buttonModal" data-toggle="modal" data-target="#formAdd"><i class="fa fa-plus"></i></button>
                    </div> -->
                  </div>
                  <div class="row">
                    <div class="col-12 table-responsive">
                      <table id="tableListmantenance" class="table">
                        <thead>
                          <tr class="text-center">
                            <th>No.</th>
                            <th>Sticker</th>
                            <th>Job Category</th>
                            <th>Clients</th>
                            <th>Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php foreach ($views as $key => $value) { ?> 
                          <tr class="text-center">
                            <td><?php echo $key+1; ?></td>
                            <td><img src="<?php echo base_url(); ?>assets/sticker/<?php echo $value->sticker.'-'.$this->session->userdata('idcompany').'.png'; ?>" onclick="window.location.href='<?php echo base_url(); ?>assets/sticker/<?php echo $value->sticker."-".$this->session->userdata("idcompany").".png"; ?>'" download></td>
                            <td><?= $value->categoryname; ?></td>
                            <td><?= $value->first_name." ".$value->last_name; ?></td>
                            <td>
                            <button class="btn btn-link" onclick="delItem('<?php echo $value->idmaintenance; ?>');"><i class="fa fa-trash-o"></i></button>
                              
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

        <div class="modal fade" id="formAdd" tabindex="-1" role="dialog" aria-labelledby="formStaffLabel" data-backdrop="static" data-keyboard="false">
          <div class="modal-dialog" role="document" style="margin-top: 15px;margin-bottom: 0">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="formStaffLabel">Validation ! Please answer the question</h5>
                <button type="button" class="close btn-close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form class="saveDep form" method="post" action="#" id="tambah" enctype="multipart/form-data">
              <div class="modal-body">
                
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="start_date">Question</label>
                      
                        <input type="text" name="question" id="question" class="form-control form-control-lg" readonly>
                        

                    </div>
                  </div>
                  </div>
                  <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="end_date">Answer</label>
                      
                        <input type="text" name="answer" id="answer" class="form-control form-control-lg">
                        
                      
                    </div>
                  </div>
                </div>
                
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-success">Create Holiday</button>
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
  $this->load->view('maintenance/js-crud/crud-list');
  require_once(APPPATH."views/component/message.php");
?>

<script type="text/javascript">
  $('#tableListmantenance').DataTable({
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
