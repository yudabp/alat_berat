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
              <h4 class="page-title">Category</h4>
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
            <div class="col-md-5">
              <div class="card">
                <div class="card-body">
                  <form class="saveDep form" method="post" action="#" id="tambah" enctype="multipart/form-data">
                  <div class="row">
                    <div class="col-md-12">
                      <label for="new_category">New Category</label>
                      <div class="form-group">
                        <input type="text" name="new_category" id="new_category" class="form-control" placeholder="New Category">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                  <div class="col-md-6">
                  <input id="inputColor" type="color" value="#ff1a1a" />
                  </div>
                    <div class="col-md-6">
                      <button type="submit" class="btn btn-success btn-fw" id="btnok"></i>Create New Category</button>
                    </div>
                  </div>
                </form>
                </div>
              </div>
            </div>
            <div class="col-md-7">
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-12 table-responsive">
                      <table id="tablesticker" class="table">
                        <thead>
                          <tr class="text-center">
                            <th>No.</th>
                            <th>Category</th>
                            <th>Color</th>
                            <th>Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php foreach ($view as $key => $value) { ?>
                          <tr class="text-center">
                            <td><?php echo $key+1; ?></td>
                            <td><?php echo $value->categoryname;?></td>
                            <td><input disabled style="background:<?php echo $value->color;?>;width:20px"></td>
                            <td>
                              <div class="dropdown">
                                <button type="button" class="btn btn-icons btn-rounded text-center" data-toggle="dropdown">
                                  <i class="ti-more-alt"></i>
                                </button>
                                <div class="dropdown-menu">
                                  <button class="btn btn-link" onclick="edtItem('<?php echo $value->idcategory; ?>');"><i class="fa fa-pencil"></i></button>
                                  <button class="btn btn-link" onclick="delItem('<?php echo $value->idcategory; ?>');"><i class="fa fa-trash-o"></i></button>
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
  $this->load->view('maintenance/js-crud/crud-category');
  require_once(APPPATH."views/component/message.php");
?>
<script>
function getColor() {
    document.getElementById("colorHex").innerHTML = 'HEX : ' + document.getElementById("inputColor").value;
    document.getElementById("colorRGB").innerHTML = 'RGB : '+ hexToRgb(document.getElementById("inputColor").value);
}
function hexToRgb(hex) {
    var result = /^#?([a-f\d]{2})([a-f\d]{2})([a-f\d]{2})$/i.exec(hex);
    var r = parseInt(result[1], 16);
    var g = parseInt(result[2], 16);
    var b = parseInt(result[3], 16);
    return 'RGB('+r+','+g+','+b+')'; 
}
</script>
<script type="text/javascript">
  $('#tablesticker').DataTable({
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
</script>
