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
              <h4 class="page-title">Consignee</h4>
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
                    <h5 id="label_consignee">Add New Consignee</h5>
                    <br>
                      <label for="consignee"><small>Consignee</small></label>
                      <div class="form-group">
                        <input type="text" name="consignee" id="consignee" class="form-control" placeholder="Consignee">
                      </div>
                    </div>                    
                  </div>                  
                  <div class="row">
                    <div class="col-md-12">                    
                      <label for="deskripsi"><small>Description</small></label>
                      <div class="form-group">
                        <input type="text" name="deskripsi" id="deskripsi" class="form-control" placeholder="Description">
                      </div>
                      <input type="hidden" name="id_consignee" id="id_consignee" class="form-control">
                    </div>                    
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <button type="submit" class="btn btn-success btn-fw" id="btnSubmit">Create Consignee</button>
                    </div>
                  </div>
                </form>
                </div>
              </div>
            </div>
          <!--<div class="row">-->
            <div class="col-7">
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-12 table-responsive">
                      <table id="tabledepartment" class="table">
                        <thead>
                          <tr class="text-center">
                            <th>No</th>
                            <th>Consignee</th>
                            <th>Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php $i=1;foreach($all as $row){ ?>
                          <tr class="text-center">
                            <td><?php echo $i; ?></td>
                            <td><?php echo $row->consignee ?></td>
                            <td>
                              <div class="dropdown">
                                <button type="button" class="btn btn-icons btn-rounded text-center" data-toggle="dropdown">
                                  <i class="ti-more-alt"></i>
                                </button>
                                <div class="dropdown-menu">
                                  <button class="btn btn-link" onclick="edtItem('<?php echo $row->id_consignee ?>');"><i class="fa fa-pencil"></i></button>
                                  <button class="btn btn-link" onclick="delItem('<?php echo $row->id_consignee ?>');"><i class="fa fa-trash-o"></i></button>
                                  <!-- <button class="btn btn-icons btn-inverse-primary"><i class="fa  fa-trash-o"></i></button> -->
                                </div>
                              </div>
                            </td>
                          </tr>
                          <?php $i++; } ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        
 <?php 
  $this->load->view('template/footer');
  // $this->load->view('template/fixed-plugin');
  $this->load->view('template/js');
?>

<script type="text/javascript">
  var d = new Date();
  var months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
  document.getElementById("bulan").innerHTML = months[d.getMonth()];
  document.getElementById("tahun").innerHTML = d.getFullYear();
  $('.dropify').dropify();
</script>

<script type="text/javascript">
$(document).ready(function(){
  $("form").submit(function(e){
    e.preventDefault();
    //alert('test');
    var atribut = $(this).attr("id");
    if(atribut == "tambah"){
      tambah_dep();
    }
    else if(atribut == "update"){
      var id_dep = $(this).data("id");
      update_dep(id_dep);
    }
  });
  $("#consignee").focus();
});

function tambah_dep(){
  //alert('ok');
      var consignee = $("#consignee").val();
      var deskripsi = $("#deskripsi").val();
      if(consignee == "" ){
          swal({
            title: "Data ada yang kosong!",
              text: "Tolong lengkapi data...",
              type: "warning",
              icon: 'warning',
              buttonsStyling: false,
              confirmButtonClass: "btn btn-warning"
          }).catch(swal.noop);
      }else{
          //Memulai memasukan data ke database
        $.ajax({
          url : "http://beta.xavaxx.com/add_consignee",
                type: "POST",
                dataType: "JSON",
                data: {
                    consignee : consignee,
                    deskripsi : deskripsi
                }
        });
          swal({
              title: "Congratulation!",
              text: "Consignee has been added",
              type: "success",
              icon: 'success',
              buttonsStyling: false,
              confirmButtonClass: "btn btn-success"
          },function(){
            location.reload();
          });
      }
}

function delItem(id){
  swal({
      title: 'Are you sure ?',
      text: "You will not be able to recover this file!",
      type: 'warning',
      showCancelButton: true,
      confirmButtonClass: 'btn btn-success',
      cancelButtonClass: 'btn btn-danger',
      confirmButtonText: 'Ya, Hapus!',
      cancelButtonText: 'Batal',
      buttonsStyling: false
        },function(){
    $.ajax({
      url : "http://beta.xavaxx.com/deleted_consignee",
            type: "POST",
            dataType: "JSON",
            data: {id : id}
            });
      swal({
          title: 'Congratulation',
          text: 'Consignee has been deleted',
          type: 'success',
          confirmButtonClass: "btn btn-success",
          buttonsStyling: false
      });
      location.reload();
  });
}

function edtItem(id){
  //alert(id);
  $("#showsubdep").modal("hide");
  $.ajax({
      url : "http://beta.xavaxx.com/get_consignee",
    type: "POST",
    dataType: "JSON",
    data: {
        id : id
    },
    success : function(data){
            // $("#formAdd").modal("show");
            $(".saveDep").attr("id","update");
            $("#id_consignee").val(data.inilah.id_consignee);
            $("#consignee").focus();
            $("#consignee").val(data.inilah.consignee);
            $("#label_consignee").text("Update Consignee");
            $("#btnSubmit").text("Update Consignee");
    },
    error : function(jqXHR, textStatus, errorThrown){
      swal({
            title: 'Gagal!',
            text: 'Gagal mengambil data.',
            type: 'error',
            confirmButtonClass: "btn btn-danger",
            buttonsStyling: false
        }).catch(swal.noop)
    }
  });
}

function update_dep(id_dep){
  //alert('ok');
  var consignee = $("#consignee").val();
  var id_consignee = $("#id_consignee").val();
  var deskripsi = $("deskripsi").val();
  if(consignee == ""  ){
      swal({
        title: "Data ada yang kosong!",
          text: "Tolong lengkapi data.",
          type: "warning",
          icon: 'warning',
          buttonsStyling: false,
          confirmButtonClass: "btn btn-warning"
      }).catch(swal.noop);
  }else{
      //Memulai memasukan data ke database
    $.ajax({
      url : "http://beta.xavaxx.com/updated_consignee",
            type: "POST",
            dataType: "JSON",
            data: {
                consignee : consignee,
                id_consignee : id_consignee,
                deskripsi : deskripsi
            }
    });
      swal({
          title: "Congratulation!",
          text: "Consignee has been updated",
          type: "success",
          icon: 'success',
          buttonsStyling: false,
          confirmButtonClass: "btn btn-success"
      },function(){
        location.reload();
      });
      //alert('ok');
  }
}
</script>

<script type="text/javascript">
  $('#tabledepartment').DataTable({
      "aLengthMenu": [
        [5, 10, 15, -1],
        [5, 10, 15, "All"]
      ],
      "iDisplayLength": 10,
      "language": {
        search: ""
      },
    });

    $('#subdeptable').DataTable({
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

  // $(document).ready(function() {
  //   $('#buttonModal').click(function() {
  //       $('html').css('overflow', 'hidden');
  //       $('body').bind('touchmove', function(e) {
  //           e.preventDefault()
  //       });
  //   });
  //   $('.btn-close').click(function() {
  //       $('html').css('overflow', 'scroll');
  //       $('body').unbind('touchmove');
  //   });
  // });

</script>
