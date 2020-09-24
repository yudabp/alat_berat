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
              <h4 class="page-title">Pay Calendar</h4>
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
            <div class="col-lg-12">
              <div class="card px-2">
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="calendar_name">Calendar Name</label>
                        <input type="text" name="calendar_name" id="calendar_name" class="form-control" placeholder="Calendar Name">
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label for="calendar_type">Calendar Type</label>
                        <select class="form-control" id="calendar_type">
                          <option selected="selected" disabled="disabled"> - Select Calendar Type - </option>
                          <option>Weekly</option>
                          <option>Biweekly</option>
                          <option>Monthly</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label for="normal_pay_day">Normal Pay Day</label>
                        <select class="form-control" id="normal_pay_day">
                          <option selected="selected" disabled="disabled"> - Select Normal Pay Day - </option>
                          <option>Sunday</option>
                          <option>Monday</option>
                          <option>Tuesday</option>
                          <option>Wednesday</option>
                          <option>Thursday</option>
                          <option>Friday</option>
                          <option>Saturday</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="card-title row">
                    <h4 class="col-md-6">Pay Calendar Setup</h4>
                    <div class="col-md-6 text-right">
                      <button class="btn btn-icons btn-inverse-success" id="buttonModal" data-toggle="modal" data-target="#formAdd"><i class="fa fa-plus"></i></button>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-12 table-responsive">
                      <table id="tablepay" class="table">
                        <thead>
                          <tr class="text-center">
                            <th>Employee</th>
                            <th>Email</th>
                            <th>Department</th>
                            <th>Designation</th>
                            <th>Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr class="text-center">
                            <td>Alex</td>
                            <td>benialexsandro22@gmail.com</td>
                            <td>finance</td>
                            <td>-</td>
                            <td>
                              <div class="dropdown">
                                <button type="button" class="btn btn-icons btn-rounded text-center" data-toggle="dropdown">
                                  <i class="ti-more-alt"></i>
                                </button>
                                <div class="dropdown-menu">
                                  <button class="btn btn-link"><i class="fa fa-pencil"></i></button>
                                  <button class="btn btn-link"><i class="fa fa-trash-o"></i></button>
                                  <!-- <button class="btn btn-icons btn-inverse-primary"><i class="fa  fa-trash-o"></i></button> -->
                                </div>
                              </div>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                  <div class="row">
                    <a href="#" class="btn btn-success float-right mt-4">
                    <i class="mdi mdi-pencil mr-1"></i>Create Pay Calendar</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- content-wrapper ends -->
        <div class="modal fade" id="formAdd" tabindex="-1" role="dialog"aria-labelledby="formStaffLabel" data-backdrop="static" data-keyboard="false">
          <div class="modal-dialog" role="document" style="margin-top: 15px;margin-bottom: 0">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="formStaffLabel">Add Employe</h5>
                <button type="button" class="close btn-close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="select_employee">Select Employee</label>
                      <select class="form-control" id="select_employee">
                        <option selected="selected" disabled="disabled"> - Select Employee - </option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="select_department">Select Department</label>
                      <select class="form-control" id="select_department">
                        <option selected="selected" disabled="disabled"> - Select Department - </option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="select_designation">Select Designation</label>
                      <select class="form-control" id="select_designation">
                        <option selected="selected" disabled="disabled"> - Select Designation - </option>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-success">Add Employee To List</button>
                <button type="button" class="btn btn-light btn-close" data-dismiss="modal">Cancel</button>
              </div>
            </div>
          </div>
        </div>
        <!-- Modal Ends -->
<?php 
  $this->load->view('template/footer');
  // $this->load->view('template/fixed-plugin');
  $this->load->view('template/js');
?>
<script type="text/javascript">
  $('#tablepay').DataTable({
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
      $('.btn-close').click(function() {
          $('html').css('overflow',);
          $('body').unbind('touchmove');
      });
    });
</script>