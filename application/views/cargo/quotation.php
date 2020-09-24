<?php 
    $this->load->view('template/head');
    $this->load->view('template/topbar');
    $this->load->view('template/sidebar');
?>
<style type="text/css">
  a:hover{
    text-decoration: none;
    cursor: pointer;
  }
</style>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row mb-4">
            <div class="col-12 d-flex align-items-center justify-content-between">
              <h4 class="page-title">Quotation</h4>
              <div class="d-flex align-items-center">
                <div class="wrapper mr-4 d-none d-sm-block">
                  <p class="mb-0">Summary for
                    <b class="mb-0"><i id="bulan"></i> <i id="tahun"></i></b>
                  </p>
                </div>
              </div>
            </div>
          </div>
          <div class="row grid-margin">
            <div class="col-md-12 stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Filter Data</h4>
                  <!-- <p class="card-description">
                    Horizontal form layout
                  </p> -->
                  <form class="forms-sample">
                    <div class="form-group row mb-0">
                      <label for="label_branch_office" class="col-sm-2 col-form-label">Branch Office</label>
                      <div class="col-sm-5">
                        <select name="branch_office" id="branch_office" class="single-select form-control form-control-sm" >
                          <option selected="selected" disabled="disabled"> - Select Office - </option>
                          <option value="All">All</option>
                          <?php $branch = $this->input->get("branch_office");  foreach($branch_office as $vil){ ?>
                           <option value="<?php echo $vil->branch ?>" <?php if($branch == $vil->branch){ ?>selected<?php } ?>><?php echo $vil->branch ?></option>
                           <?php } ?>
                        </select>
                      </div>
                    </div>
                    <div class="form-group row mt-1 mb-1">
                      <label for="label_date" class="col-sm-2 col-form-label">Date</label>
                      <div class="col-sm-2">
                        <input type="text" class="form-control datepicker" name="date_from" id="date_from" placeholder="ex. 01/01/2018">
                      </div>
                      <div class="col-sm-1 text-center">
                        <label for="label_to" class="col-form-label">to</label>
                      </div>
                      <div class="col-sm-2">
                        <input type="text" class="form-control datepicker" name="date_to" id="date_to" placeholder="ex. 31/12/2018">
                      </div>
                    </div>
                    <div class="form-group row mt-0 mb-0">
                      <label for="label_status" class="col-sm-2 col-form-label">Status</label>
                      <div class="col-sm-2">
                        <select name="status" id="status" class="single-select form-control form-control-sm" >
                          <option selected="selected" disabled="disabled"> - Select Status - </option>
                          <option value="All">All</option>
                          <option value="Executed">Executed</option>
                          <option value="In Progress">In Progress</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group row mt-1 mb-1">
                      <label for="label_filter_by" class="col-sm-2 col-form-label">Filter by</label>
                      <div class="col-sm-2 mr-0">
                        <select name="filter_by" id="filter_by" class="single-select form-control form-control-sm" >
                          <option selected="selected" value="All">All</option>
                          <option value="Quo No">Quo No</option>
                          <option value="Customer">Customer</option>
                          <option value="Subject">Subject</option>
                        </select>
                      </div>
                      <div class="col-sm-3 ml-0">
                        <input type="text" class="form-control" name="filter" id="filter">
                      </div>
                      <button type="submit" class="btn"><i class="ti ti-search"></i>Filter</button>
                    </div>
                    <!-- <button type="submit" class="btn btn-success mr-2">Submit</button>
                    <button class="btn btn-light">Cancel</button> -->
                  </form>
                </div>
              </div>
            </div>
          </div>
          <div class="row grid-margin">
            <div class="col-12">
              <div class="card">
                <div class="card-body">
                  <div class="card-title row">
                    <div class="col-md-12 text-right">
                      <a href="<?php echo base_url() ?>add-quotation">
                        <button class="btn btn-icons btn-inverse-success" id="buttonModal"><i class="fa fa-plus"></i></button>
                      </a>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-12 table-responsive">
                      <table id="tableQuotation" class="table">
                        <thead>
                          <tr class="text-center">
                            <th>Date</th>
                            <th>Quo Number</th>
                            <th>Customer Name</th>
                            <th>Subject</th>
                            <th>Expired</th>
                            <th>Created</th>
                            <th>Status</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php foreach ($view as $key => $value ) {
                                  $costumer = $this->db->get_where('contacts',['idcontacts'=>$value->customer])
                                    ->row();
                           ?>
                            <tr class="text-center">
                              <td><?php echo $value->quote_date; ?></td>
                              <td><a><?php echo $value->quote_number; ?></a></td>
                              <td><?php echo $costumer->company; ?></td>
                              <td><?php echo $value->subject; ?></td>
                              <td><?php echo $value->expires_date; ?></td>
                              <td><?php echo $value->creator; ?></td>
                              <td>
                                <button class="btn <?php if($value->status == "Executed"){ ?> btn-success <?php }else{ ?> btn-danger <?php } ?>btn-sm"><?php echo $value->status; ?></button>
                              </td>
                              <td>
                                <div class="dropdown">
                                  <button type="button" class="btn btn-icons btn-rounded text-center" data-toggle="dropdown">
                                    <i class="ti-more-alt"></i>
                                  </button>
                                  <div class="dropdown-menu">
                                    <button class="btn btn-link" onclick="editItem('<?php echo $value->quote_number; ?>');" data-toggle="tooltip" title="Edit"><i class="fa fa-pencil"></i></button>
                                    <button class="btn btn-link" onclick="delItem('<?php echo $value->id_quotation; ?>');" data-toggle="tooltip" title="Delete"><i class="fa fa-trash-o"></i></button>
                                    <button class="btn btn-link" data-toggle="tooltip" title="Execute"><i class="fa fa-check-square-o"></i></button>
                                    <button class="btn btn-link" data-toggle="tooltip" title="Print" onclick="printItem('<?php echo $value->id_quotation; ?>')"><i class="fa fa-print"></i></button>
                                    <button class="btn btn-link" data-toggle="tooltip" title="Create Job Order" onclick="createJob('<?php echo $value->quote_number; ?>');"><i class="fa fa-plus-circle"></i></button>
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

<?php 
  $this->load->view('template/footer');
  // $this->load->view('template/fixed-plugin');
  $this->load->view('template/js');
  $this->load->view('cargo/js-crud/crud-quotation');
?>
<script type="text/javascript">
  $(".single-select").select2({
    width: '100%',
    // dropdownParent: $('#addQuotation'),
  });
  $('#tableQuotation').DataTable({
      "aLengthMenu": [
        [5, 10, 15, -1],
        [5, 10, 15, "All"]
      ],
      "iDisplayLength": 5,
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
</script>