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
              <h4 class="page-title">User Access</h4>
              <div class="d-flex align-items-center">
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
                    <div class="card-block">
                        <div class="toolbar">
                            <h6>Keterangan : <?= $this->session->userdata() ?></h6>
                            <ol>
                                <div class="row">
                                    <div class="col-md-4">
                                        <li>DBR : Dashboard</li>
                                        <li>HRM : HR Management</li>
                                        <li>LVE : Leave</li>
                                        <li>CLN : Clients</li>
                                    </div>
                                    <div class="col-md-4">
                                        <li>ACC : Accounting</li>
                                        <li>PRL : Payroll</li>
                                        <li>SRV : Service & Sparepart</li>
                                        <li>PRD : Production</li>
                                    </div>
                                    <div class="col-md-4">
                                        <li>WRH : Warehouse</li>
                                        <li>MCH : Mechanics</li>
                                        <li>LGU : Log User</li>
                                        <li>STG : Setting</li>
                                    </div>
                                </div>
                            </ol>
                        </div>
                        <div class="col-12 table-responsive">
                            <table id="tableEmployee" class="table">
                                <thead>
                                <tr class="text-center">
                                    <!-- <th>No</th> -->
                                    <th style="width: 20%">Employee Name</th>
                                    <th>DBR</th>
                                    <th>HRM</th>
                                    <th>LVE</th>
                                    <th>CLN</th>
                                    <th>ACC</th>
                                    <th>PRL</th>
                                    <th>SRV</th>
                                    <th>PRD</th>
                                    <th>WRH</th>
                                    <th>MCH</th>
                                    <th>LGU</th>
                                    <th>STG</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php for ($i=0;$i<10;$i++) { ?>
                                    <tr class="text-center">
                                        <td style="text-align:left;"><?php echo $value->fname." ".$value->mname." ".$value->lname; ?></td>
                                        <td>
                                            <div class="checkbox-radios">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                    <input class="form-check-input" type="checkbox" <?= $pegawai->access->kalender==1?"checked":"" ?> id="dbr{{ $i }}" onclick="check('{{ $pegawai->id }}', '#kalender{{ $i }}', 'kalender');">
                                                    <span class="form-check-sign">
                                                        <span class="check"></span>
                                                    </span>
                                                </label>
                                                </div>
                                            </div>
                                        </td>
                                        <th>HRM</th>
                                        <th>LV</th>
                                        <th>CLN</th>
                                        <th>ACC</th>
                                        <th>PRL</th>
                                        <th>SRV</th>
                                        <th>PRD</th>
                                        <th>WRH</th>
                                        <th>MCH</th>
                                        <th>LGU</th>
                                        <th>STG</th>
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
