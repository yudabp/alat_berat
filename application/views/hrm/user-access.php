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
                                <?php foreach ($employees as $key=>$employee) { ?>
                                    <tr class="text-center">
                                        <td style="text-align:left;"><?php echo $employee->fname." ".$employee->mname." ".$employee->lname; ?></td>
                                        <td>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" <?= $employee->dbr==1?"checked":"" ?> id="dbr<?= $key ?>" onclick="check('<?= $employee->mainid ?>', '#dbr<?= $key ?>', 'dbr');"> &nbsp;
                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" <?= $employee->hrm==1?"checked":"" ?> id="hrm<?= $key ?>" onclick="check('<?= $employee->mainid ?>', '#hrm<?= $key ?>', 'hrm');"> &nbsp;
                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" <?= $employee->lve==1?"checked":"" ?> id="lve<?= $key ?>" onclick="check('<?= $employee->mainid ?>', '#lve<?= $key ?>', 'lve');"> &nbsp;
                                                </label>
                                            </div>
                                        </td><td>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" <?= $employee->cln==1?"checked":"" ?> id="cln<?= $key ?>" onclick="check('<?= $employee->mainid ?>', '#cln<?= $key ?>', 'cln');"> &nbsp;
                                                </label>
                                            </div>
                                        </td><td>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" <?= $employee->acc==1?"checked":"" ?> id="acc<?= $key ?>" onclick="check('<?= $employee->mainid ?>', '#acc<?= $key ?>', 'acc');"> &nbsp;
                                                </label>
                                            </div>
                                        </td><td>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" <?= $employee->prl==1?"checked":"" ?> id="prl<?= $key ?>" onclick="check('<?= $employee->mainid ?>', '#prl<?= $key ?>', 'prl');"> &nbsp;
                                                </label>
                                            </div>
                                        </td><td>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" <?= $employee->srv==1?"checked":"" ?> id="srv<?= $key ?>" onclick="check('<?= $employee->mainid ?>', '#srv<?= $key ?>', 'srv');"> &nbsp;
                                                </label>
                                            </div>
                                        </td><td>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" <?= $employee->prd==1?"checked":"" ?> id="prd<?= $key ?>" onclick="check('<?= $employee->mainid ?>', '#prd<?= $key ?>', 'prd');"> &nbsp;
                                                </label>
                                            </div>
                                        </td><td>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" <?= $employee->wrh==1?"checked":"" ?> id="wrh<?= $key ?>" onclick="check('<?= $employee->mainid ?>', '#wrh<?= $key ?>', 'wrh');"> &nbsp;
                                                </label>
                                            </div>
                                        </td><td>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" <?= $employee->mch==1?"checked":"" ?> id="mch<?= $key ?>" onclick="check('<?= $employee->mainid ?>', '#mch<?= $key ?>', 'mch');"> &nbsp;
                                                </label>
                                            </div>
                                        </td><td>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" <?= $employee->lgu==1?"checked":"" ?> id="lgu<?= $key ?>" onclick="check('<?= $employee->mainid ?>', '#lgu<?= $key ?>', 'lgu');"> &nbsp;
                                                </label>
                                            </div>
                                        </td><td>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" <?= $employee->stg==1?"checked":"" ?> id="stg<?= $key ?>" onclick="check('<?= $employee->mainid ?>', '#stg<?= $key ?>', 'stg');"> &nbsp;
                                                </label>
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

<script type="text/javascript">
    window.onload = function(){
        $(document).ready(function() {
            
        });
    }
    function check(mainid, id_check_form, structure){
                var isChecked = $(id_check_form).is(":checked");
                $.ajax({
                    url : "<?php echo base_url('hrm/changeUserAccess'); ?>",
                    type: "POST",
                    data: {
                        mainid,
                        isChecked,
                        structure
                    }
                });
            }
</script>
<?php
  $this->load->view('template/footer');
  // $this->load->view('template/fixed-plugin');
  $this->load->view('template/js');
//   $this->load->view("hrm/js-crud/crud-employee");
//   require_once(APPPATH."views/component/message.php");
?>
