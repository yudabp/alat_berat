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
              <h4 class="page-title">All Project</h4>
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
                      <!-- <button class="btn btn-icons btn-inverse-success" id="buttonModal" data-toggle="modal" data-target="#formAdd"><i class="fa fa-plus"></i></button> -->
                      <a href="http://beta.xavaxx.com/add-project"><button class="btn btn-icons btn-inverse-success"><i class="fa fa-plus" style="color:green"></i></button></a>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-12 table-responsive">
                      <table id="tabledepartment" class="table">
                        <thead>
                          <tr class="text-center">
                            <th>Project</th>
                            <th>PIC</th>
                            <th>Region</th>
                            <th>Customer</th>
                            <th>Project Date</th>
                            <th>Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php $i=1; foreach($data as $row){ ?>
                            <tr class="text-center">
                            <td><?php echo $row->project_name ?></td>
                            <td><?php echo $row->pic ?></td>
                            <td><?php echo $row->village;?></td>
                            <td><?php echo $row->name_client ?></td>
                            <td><?php echo $row->date ?></td>
                            <td>
                              <div class="dropdown">
                                <button type="button" class="btn btn-icons btn-rounded text-center" data-toggle="dropdown">
                                  <i class="ti-more-alt"></i>
                                </button>
                                <div class="dropdown-menu">
                                  <button class="btn btn-link" onclick="edtItem('<?php echo $row->code ?>');"><i class="fa fa-pencil"></i></button>
                                  <button class="btn btn-link" onclick="delItem('<?php echo $row->code ?>');"><i class="fa fa-trash-o"></i></button>
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
        <!-- content-wrapper ends -->
        <div class="modal fade" id="formAdd" tabindex="-1" role="dialog" aria-labelledby="formStaffLabel" data-backdrop="static" data-keyboard="false">
          <div class="modal-dialog" role="document" style="margin-top: 15px;margin-bottom: 0">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="formStaffLabel">New Department</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form class="saveDep form" method="post" action="#" id="tambah" enctype="multipart/form-data">
              <div class="modal-body">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="project_allproject">Project</label>
                      <input type="text" name="project_allproject" id="project_allproject" class="form-control form-control-lg" placeholder="Project">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="pic_allproject">PIC</label>
                      <input type="text" name="pic_allproject" id="pic_allproject" class="form-control form-control-lg" placeholder="PIC">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="region_allproject">Region</label>
                      <input type="text" name="region_allproject" id="region_allproject" class="form-control form-control-lg" placeholder="Region">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="client_allproject">Customer</label>
                      <input type="text" name="client_allproject" id="client_allproject" class="form-control form-control-lg" placeholder="Client">
                    </div>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-success" id="btnok">Add Project</button>
                <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
              </div>
            </form>
            </div>
          </div>
        </div>
        <!-- Modal Ends -->
        <div class="modal fade" id="editform" tabindex="-1" role="dialog" aria-labelledby="formStaffLabel" data-backdrop="static" data-keyboard="false">
          <div class="modal-dialog" role="document" style="margin-top: 15px;margin-bottom: 0">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="formStaffLabel">Update All Project</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form class="saveDep form" method="post" action="#" id="update" enctype="multipart/form-data">
              <div class="modal-body">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="edit_projectall">Edit Project</label>
                      <input type="text" name="edit_projectall" id="edit_projectall" class="form-control form-control-lg" placeholder="Name Project">
                    </div>
                    <div class="form-group">
                      <label for="edit_picall">Edit PIC</label>
                      <input type="text" name="edit_picall" id="edit_picall" class="form-control form-control-lg" placeholder="PIC">
                    </div>
                    <div class="form-group">
                      <label for="edit_regionall">Edit Region</label>
                      <input type="text" name="edit_regionall" id="edit_regionall" class="form-control form-control-lg" placeholder="Region Project">
                    </div>
                    <div class="form-group">
                      <label for="edit_custumerall">Edit Custumer</label>
                      <input type="text" name="edit_custumerall" id="edit_custumerall" class="form-control form-control-lg" placeholder="Name Client">
                    </div>
                    <input type="hidden" name="get_idallproject" id="get_idallproject" class="form-control">
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-success" id="btnok">Update Department</button>
                <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
              </div>
            </form>
            </div>
          </div>
        </div>

        <div class="modal fade" id="showsubdep" tabindex="-1" role="dialog" aria-labelledby="formStaffLabel" data-backdrop="static" data-keyboard="false">
          <div class="modal-dialog modal-lg" role="document" style="margin-top: 15px;margin-bottom: 0">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="">Sub Department</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <table id="subdeptable" class="table">
                  <thead>
                    <tr class="text-center">
                      <th>Department</th>
                      <th>Description</th>
                      <th>Department lead</th>
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
?>
<script type="text/javascript">
  var d = new Date();
  var months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
  document.getElementById("bulan").innerHTML = months[d.getMonth()];
  document.getElementById("tahun").innerHTML = d.getFullYear();
  $('.dropify').dropify();
</script>


  </body>
</html>
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
});

function tambah_dep(){
  //alert('ok');
      var project = $("#project_allproject").val();
      var pic = $("#pic_allproject").val();
      var region = $("#region_allproject").val();
      var custumor = $("#client_allproject").val();

      if(project == "" || pic == "" || region=="" || custumor==""){
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
          url : "http://beta.xavaxx.com/new_allproject",
          type: "POST",
          dataType: "JSON",
          data: {
              project : project,
              pic : pic,
              region : region,
              custumor : custumor
          }
        });
        $("#formAdd").modal("hide");
          swal({
              title: "Congratulation!",
              text: "Department has been added",
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

function delItem(id){
  //alert(id);
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
            /*buttons: {
                cancel: {
                  text: "Cancel",
                  value: null,
                  visible: true,
                  className: "btn btn-danger",
                  closeModal: true,
                },
                confirm: {
                  text: "OK",
                  value: true,
                  visible: true,
                  className: "btn btn-primary",
                  closeModal: true
                }
              }*/
        },function(){
          //alert(id);
              //if (isConfirm) {
                $.ajax({
                  url : "http://beta.xavaxx.com/delete_allproject",
                        type: "POST",
                        dataType: "JSON",
                        data: {
                          id : id
                        }
                        });

                          swal({
                              title: 'Congratulation',
                              text: 'Data has been deleted',
                              type: 'success',
                              confirmButtonClass: "btn btn-success",
                              buttonsStyling: false
                          });
                          location.reload();
              /*} else {
                  swal("Cancelled", "Your data is safe :)", "error");
              }*/
          });
          //Prosess Penghapusan data
}

function edtItem(id){
  //alert(id);
  $("#showsubdep").modal("hide");
  $.ajax({
      url : "http://beta.xavaxx.com/edit_allproject",
    type: "POST",
    dataType: "JSON",
    data: {
        id : id
    },
    success : function(data){
            $("#get_idallproject").val(data.forall.code);
            $("#editform").modal("show");
            $("#btnok").text("Update Department");
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
  var edit_allproject = $("#edit_projectall").val();
  var edit_picall = $("#edit_picall").val();
  var edit_regionall = $("#edit_regionall").val();
  var edit_custumerall = $("#edit_custumerall").val();
  var get_idallproject = $("#get_idallproject").val();
  if(edit_allproject == ""  ){
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
      url : "http://beta.xavaxx.com/update_allproject",
            type: "POST",
            dataType: "JSON",
            data: {
                edit_allproject : edit_allproject,
                edit_picall : edit_picall,
                edit_regionall : edit_regionall,
                edit_custumerall : edit_custumerall,
                get_idallproject : get_idallproject
            }
    });
    $("#formAdd").modal("hide");
      swal({
          title: "Congratulation!",
          text: "Department has been updated",
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

function viewdep(id){
  //alert(id);
  $.ajax({
      url : "http://beta.xavaxx.com/showSubDep",
    type: "POST",
    dataType: "JSON",
    data: {
        id : id
    },
    success : function(data){
            $("#showsubdep").modal("show");
              var html = '';
                   var i;
                   for(i=0; i<data.length; i++){
                       html += '<tr class="text-center">'+
                               '<td>'+data[i].departmenttitle+'</td>'+
                               '<td>'+data[i].departmentdesc+'</td>'+
                               '<td>'+data[i].departmentlead+'</td>'+
                               '<td><button class="btn btn-link" onclick="edtItem('+"'"+data[i].iddepartment+"'"+');"><i class="fa fa-pencil"></i></button> <button class="btn btn-link" onclick="delItem('+"'"+data[i].iddepartment+"'"+');"><i class="fa fa-trash-o"></i></button></td>'+
                               '</tr>';
                   }
                   $('#loaddatahere').html(html);
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
