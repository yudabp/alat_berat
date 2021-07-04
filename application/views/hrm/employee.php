<?php
    $this->load->view('template/head');
    $this->load->view('template/topbar');
    $this->load->view('template/sidebar');
?>
<style type="text/css">
  .tab-pane{
    background-color: #F8F8F8 !important;
  }
  .font-11{
    font-size: 11px !important;
  }
  .form-control{
    border-color: #A2A2A2;
  }
  .table-bordered{
    border:1.6px solid #E1E1E1 !important;
  }
</style>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row mb-4">
            <div class="col-12 d-flex align-items-center justify-content-between">
              <h4 class="page-title">Employees</h4>
              <div class="d-flex align-items-center">
                <div class="wrapper mr-4 d-none d-sm-block">
                  <p class="mb-0">Summary for
                    <b class="mb-0"><i id="bulan"></i> <i id="tahun"></i></b>
                  </p>
                </div>
                <!-- <div class="wrapper">
                  <a href="#" class="btn btn-link btn-sm font-weight-bold">
                    <i class="icon-share-alt"></i>Export CSV</a>
                </div> -->
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-body">
                  <div class="card-title row">
                    <div class="col-md-12 text-right">
                      <button class="btn btn-icons btn-inverse-success" id="buttonModal" data-toggle="modal" data-target="#formStaff" onclick="clearModal()"><i class="fa fa-plus"></i></button>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-12 table-responsive">
                      <table id="tableEmployee" class="table">
                        <thead>
                          <tr class="text-center">
                            <!-- <th>No</th> -->
                            <th style="width: 20%">Employee Name</th>
                            <th style="width: 15%">Designation</th>
                            <th style="width: 15%">Department</th>
                            <th style="width: 10%">Type</th>
                            <th style="width: 15%">Joined</th>
                            <th style="width: 15%">Status</th>
                            <th style="width: 10%">Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php foreach ($view as $key => $value) { ?>
                            <tr class="text-center">
                              <!-- <td><?php echo $key+1; ?></td> -->
                              <td style="text-align:left;"><?php echo $value->fname." ".$value->mname." ".$value->lname; ?></td>
                              <td><?php echo $value->designationtitle;?></td>
                              <td><?php echo $value->departmenttitle;?></td>
                              <td><?php echo $value->employetype;?></td>
                              <td><?php echo $value->datehire;?></td>
                              <td>Active</td>
                              <td>
                                <div class="dropdown">
                                  <button type="button" class="btn btn-icons btn-rounded text-center" data-toggle="dropdown">
                                    <i class="ti-more-alt"></i>
                                  </button>
                                  <div class="dropdown-menu">
                                    <button class="btn btn-link" onclick="edtItem('<?php echo $value->mainid; ?>');"><i class="fa fa-pencil"></i></button>
                                    <button class="btn btn-link" onclick="delItem('<?php echo $value->mainid; ?>');"><i class="fa fa-trash-o"></i></button>
                                    <!-- <button class="btn btn-link" onclick="viewItem('<?php echo $value->mainid; ?>');"><i class="fa  fa-user-circle-o"></i></button> -->
                                    <a class="btn btn-link" href="<?php echo base_url('detail-employee?id='.$value->mainid); ?>" target="_blank"><i class="fa  fa-user-circle-o"></i></a>
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

				<!-- Modal -->
        <?php 
          $this->load->view('hrm/modal-employee');
        ?>
				<!-- End Modal -->

<?php
  $this->load->view('template/footer');
  // $this->load->view('template/fixed-plugin');
  $this->load->view('template/js');
  $this->load->view("hrm/js-crud/crud-employee");
  require_once(APPPATH."views/component/message.php");
?>
<script type="text/javascript">
  function next_work() {
    $('#basic').removeClass('active show');
    $('#basic-tab').removeClass('active');
    $('#work').addClass('active show');
    $('#work-tab').addClass('active');
  }
  function next_workd() {
    $('#debasic').removeClass('active show');
    $('#debasic-tab').removeClass('active');
    $('#dework').addClass('active show');
    $('#dework-tab').addClass('active');
  }
  function back_basic() {
    $('#work').removeClass('active show');
    $('#work-tab').removeClass('active');
    $('#basic').addClass('active show');
    $('#basic-tab').addClass('active');
  }
  function back_basicd() {
    $('#dework').removeClass('active show');
    $('#dework-tab').removeClass('active');
    $('#debasic').addClass('active show');
    $('#debasic-tab').addClass('active');
  }
  function next_personal() {
    $('#work').removeClass('active show');
    $('#work-tab').removeClass('active');
    $('#personal').addClass('active show');
    $('#personal-tab').addClass('active');
  }
  function next_personald() {
    $('#dework').removeClass('active show');
    $('#dework-tab').removeClass('active');
    $('#depersonal').addClass('active show');
    $('#depersonal-tab').addClass('active');
  }
  function back_work() {
    $('#personal').removeClass('active show');
    $('#personal-tab').removeClass('active');
    $('#work').addClass('active show');
    $('#work-tab').addClass('active');
  }
  function back_workd() {
    $('#depersonal').removeClass('active show');
    $('#depersonal-tab').removeClass('active');
    $('#dework').addClass('active show');
    $('#dework-tab').addClass('active');
  }
  function showpass() {
    var x = document.getElementById("password");
    var y = document.getElementById("eye");
    // var x = document.getElementsByClassName("password")[0];
    if (x.type == "password") {
        x.type = "text";
        $('#eye').removeClass('fa fa-eye-slash');
        $('#eye').addClass('fa fa-eye');
    } else {
        x.type = "password";
        $('#eye').removeClass('fa fa-eye');
        $('#eye').addClass('fa fa-eye-slash');
    }
  }
  $('#tableEmployee').DataTable({
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
if ($(".datepicker").length) {
    $('.datepicker').datepicker({
      enableOnReadonly: true,
      todayHighlight: true,
      autoclose: true,
      format: "dd/mm/yyyy"
    });
  }
  // $(".single-select").select2({
  //   width: '100%',
  //   dropdownParent: $('#formStaff'),
  // });

  // $('#employee_type').select2({
  //   width: '100%',
  //   dropdownParent: $('#formStaff')
  // });
  // $('#employee_status').select2({
  //   width: '100%',
  //   dropdownParent: $('#formStaff')
  // });
  // $('#department').select2({
  //   width: '100%',
  //   dropdownParent: $('#formStaff')
  // });
  // $('#job_title').select2({
  //   width: '100%',
  //   dropdownParent: $('#formStaff')
  // });
  // $('#location').select2({
  //   width: '100%',
  //   dropdownParent: $('#formStaff')
  // });
  // $('#reporting_to').select2({
  //   width: '100%',
  //   dropdownParent: $('#formStaff')
  // });
  // $('#source_of_hire').select2({
  //   width: '100%',
  //   dropdownParent: $('#formStaff')
  // });
  // $('#pay_type').select2({
  //   width: '100%',
  //   dropdownParent: $('#formStaff')
  // });
  // $('#gender').select2({
  //   width: '100%',
  //   dropdownParent: $('#formStaff')
  // });
  // $('#marital_status').select2({
  //   width: '100%',
  //   dropdownParent: $('#formStaff')
  // });
  // $('#state').select2({
  //   width: '100%',
  //   dropdownParent: $('#formStaff')
  // });

  // if ($(".select-employee").length) {
  //   $(".select-employee").select2({
  //     width: '100%',
  //     dropdownParent: $('#formStaff')
  //   });
  // }
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
        // $("#payrate").inputmask({ alias : "currency", mask : "Rp 0.00" });
        $('#payrate').inputmask({
          alias: 'currency',
          prefix: 'Rp ',
        });
        $("#phone").inputmask({"mask": "(+62)####-#####"});
        $("#work_phone").inputmask({"mask": "(+62)8##-####-####"});
        $("#hand_phone").inputmask({"mask": "(+62)8##-####-####"});

				$("#state").change(function(){
            _this = $(this);
            $.ajax({
                url: '<?php echo base_url(); ?>getKab',
								// type: 'POST',
                dataType: 'JSON',
                data: {provinsi_id:_this.val()},
                success: function (data) {
                    $("#city").html("");
                    var options = "";
                    for (let key in data) {
                        options += `<option value="${data[key].id}">${data[key].name}</option>`;
                    }
                    $("#city").html(options);
										console.log(data);
                },
								error : function(jqXHR, textStatus, errorThrown){
									swal({
												title: 'Failed!',
												text: 'Cannot get data.',
												type: 'error',
												confirmButtonClass: "btn btn-danger",
												buttonsStyling: false
										}).catch(swal.noop)
								}
            });
        });
    });

</script>
