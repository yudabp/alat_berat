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
              <h4 class="page-title">Sticker</h4>
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
                      <label for="new_sticker" id="formStaffLabel">New Sticker</label>
                      <div class="form-group">
                        <input  type="text" name="new_sticker" id="new_sticker" class="form-control" placeholder="New Sticker">
                      </div>
                    </div>
                  </div>
                  <!--<div class="row">
                    <div class="col-md-6">
                      <div id="qrcode" style="margin-bottom: 15px;"></div>
                    </div>
                    <div class="col-md-6">
                      <button type="button" class="btn btn-primary btn-rounded btn-fw">Generate QR Code</button>
                      <!-- <button onclick="dlDataUrlBin()">binary dataURL</button>
                    </div>
                  </div>-->
                  <div class="row">
                    <div class="col-md-12">
                      <button type="submit" id="btnok" class="btn btn-success btn-fw"></i>Create New Sticker</button>
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
                            <th>Sticker</th>
                            <th>QR Code</th>
                            <th>Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php foreach ($views as $key => $value) { ?>
                          <tr class="text-center">
                            <td><?php echo $value->sticker; ?></td>
                            <td><img src="<?php echo base_url(); ?>assets/sticker/<?php echo $value->sticker.'-'.$this->session->userdata('idcompany').'.png'; ?>" onclick="window.location.href='<?php echo base_url(); ?>assets/sticker/<?php echo $value->sticker."-".$this->session->userdata("idcompany").".png"; ?>'" download></td>
                            <td>
                              <div class="dropdown">
                                <button type="button" class="btn btn-icons btn-rounded text-center" data-toggle="dropdown">
                                  <i class="ti-more-alt"></i>
                                </button>
                                <div class="dropdown-menu">
                                  <button class="btn btn-link" onclick="edtItem('<?php echo $value->idsticker; ?>');"><i class="fa fa-pencil"></i></button>
                                  <button class="btn btn-link" onclick="delItem('<?php echo $value->idsticker; ?>');"><i class="fa fa-trash-o"></i></button>
                                  <a class="btn btn-link" target="_blank" href="<?php echo base_url(); ?>assets/sticker/<?php echo $value->sticker.'-'.$this->session->userdata('idcompany').'.png'; ?>"><i class="fa fa-download"></i></a>
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
  $this->load->view('maintenance/js-crud/crud-sticker');
  require_once(APPPATH."views/component/message.php");
?>
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

  var qrcode = new QRCode(document.getElementById("qrcode"), {
    width : 150,
    height : 150
  });

  function makeCode () {
    var elText = document.getElementById("text");

    // if (!elText.value) {
    //   alert("Input a text");
    //   elText.focus();
    //   return;
    // }

    qrcode.makeCode(elText.value);
  }

  makeCode();

  $("#text").
    on("blur", function () {
      makeCode();
    }).
    on("keydown", function (e) {
      if (e.keyCode == 13) {
        makeCode();
      }
    });
function dlDataUrlBin(){
  download("data:image/gif;base64,iVBORw0KGgoAAAANSUhEUgAAAAUAAAAFCAYAAACNbyblAAAAHElEQVQI12P4//8/w38GIAXDIBKE0DHxgljNBAAO9TXL0Y4OHwAAAABJRU5ErkJggg==", "dlDataUrlBin.gif", "image/gif");
}
</script>
