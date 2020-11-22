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
              <h4 class="page-title">Worker</h4>
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
                      <button class="btn btn-icons btn-inverse-success" id="buttonModal" data-toggle="modal" data-target="#formAdd"><i class="fa fa-plus"></i></button>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-12 table-responsive">
                      <table id="tabledepartment" class="table">
                        <thead>
                          <tr class="text-center">
                            <th>Name</th>
                            <th>Level</th>
                            <th>Type</th>
                            <th>Wage</th>
                            <th>Update</th>
                            <th>Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php $i=1; foreach($jklj as $row){ ?>
                            <tr class="text-center">
                              <td><?= $row->nama; ?></td>
                              <td><?= $row->level; ?></td>
                              <td><?= $row->type; ?></td>
                              <td><?= $row->wage; ?></td>
                              <td><?= $row->created_at; ?></td>
                              <td>
                                <div class="dropdown">
                                  <button type="button" class="btn btn-icons btn-rounded text-center" data-toggle="dropdown">
                                    <i class="ti-more-alt"></i>
                                  </button>
                                  <div class="dropdown-menu">
                                    <button class="btn btn-link" onclick="edtItem('<?php echo $row->idworker; ?>');"><i class="fa fa-pencil"></i></button>
                                    <button class="btn btn-link" onclick="delItem('<?php echo $row->idworker; ?>');"><i class="fa fa-trash-o"></i></button>
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
                <h5 class="modal-title" id="formStaffLabel">Create Worker</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form class="saveDep form" method="post" action="#" id="tambah" enctype="multipart/form-data">
              <div class="modal-body">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="name">Name</label>
                      <input type="text" name="worker__name" id="worker__name" class="form-control form-control-lg" placeholder="Name">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="name">Worker Level</label>
                      <select class="form-control" name="worker__level" id="worker__level">
                            <option class="form-control" value="" selected disabled>worker types</option>
                            <?php $h = 1; foreach($nmckl as $vvil){ ?>
                                <option class="form-control" value="<?= $vvil->workername; ?>"><?= $vvil->workername; ?></option>
                            <?php $h++; } ?>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="name">Worker Type</label>
                      <select class="form-control" name="worker__type" id="worker__type">
                            <option class="form-control" value="" selected disabled>worker level</option>
                            <?php $h = 1; foreach($nmkl as $vil){ ?>
                                <option class="form-control" value="<?= $vil->name; ?>"><?= $vil->name; ?></option>
                            <?php $h++; } ?>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="name">Worker Project</label>
                      <select class="form-control" name="worker__type" id="worker__type">
                            <option class="form-control" value="" selected disabled>worker project</option>
                            <?php $h = 1; foreach($nmkl as $vil){ ?>
                                <option class="form-control" value="<?= $vil->name; ?>"><?= $vil->name; ?></option>
                            <?php $h++; } ?>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="description">Wage</label>
                      <input type="text" name="worker__wage" id="worker__wage" class="form-control form-control-lg" placeholder="Wage">
                    </div>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-success" id="btnok">Add Worker</button>
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
                <h5 class="modal-title" id="formStaffLabel">Update Worker</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form class="saveDep form" method="post" action="#" id="update" enctype="multipart/form-data">
              <div class="modal-body">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="department_title">Edit Name</label>
                      <input type="text" name="input_workername" id="input_workername" class="form-control form-control-lg">
                    </div>
                    <div class="form-group">
                      <label for="name">Edit Type</label>
                      <select class="form-control" name="input_workertype" id="input_workertype">
                            <option class="form-control" value="" selected disabled>pilih level</option>
                            <?php $h = 1; foreach($nmkl as $vil){ ?>
                                <option class="form-control" value="<?= $vil->name; ?>"><?= $vil->name; ?></option>
                            <?php $h++; } ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="name">Edit Level</label>
                      <select class="form-control" name="input_workerlevel" id="input_workerlevel">
                            <option class="form-control" value="" selected disabled>pilih types</option>
                            <?php $h = 1; foreach($nmckl as $vvil){ ?>
                                <option class="form-control" value="<?= $vvil->workername; ?>"><?= $vvil->workername; ?></option>
                            <?php $h++; } ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="department_title">Edit Wage</label>
                      <input type="text" name="input_workerwage" id="input_workerwage" class="form-control form-control-lg">
                    </div>
                    <input type="hidden" name="get_worker" id="get_worker" class="form-control">
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-success" id="btnok">Update Worker</button>
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
      add_worker();
    }
    else if(atribut == "update"){
      var id_dep = $(this).data("id");
      update_dep(id_dep);
    }
  });
});

function add_worker(){
  //alert('ok');
      var worker__name = $("#worker__name").val();
      var worker__type = $("#worker__type").val();
      var worker__level = $("#worker__level").val();
      var worker__wage = $("#worker__wage").val();
      if(worker__name == "" ){
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
          url : "http://beta.xavaxx.com/add-add-add",
                type: "POST",
                dataType: "JSON",
                data: {
                    workername : worker__name,
                    workertype : worker__type,
                    workerlevel : worker__level,
                    workerwage : worker__wage
                }
        });
        $("#formAdd").modal("hide");
          swal({
              title: "Congratulation!",
              text: "Worker Level has been added",
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
        },function(){
          $.ajax({
            url : "http://beta.xavaxx.com/del-del-del",
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
          });
}

function edtItem(id){
  //alert(id);
  $("#showsubdep").modal("hide");
  $.ajax({
      url : "http://beta.xavaxx.com/get-get-get",
    type: "POST",
    dataType: "JSON",
    data: {
        id : id
    },
    success : function(data){
            $("#editform").modal("show");
            $('#get_worker').val(data.inilah.idworker);
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
  var name = $("#input_workername").val();
  var wage = $("#input_workerwage").val();
  var type = $("#input_workertype").val();
  var level = $("#input_workerlevel").val();
  var idworker = $("#get_worker").val();
  if(name == ""  ){
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
      url : "http://beta.xavaxx.com/update-update-update",
            type: "POST",
            dataType: "JSON",
            data: {
                name : name,
                idworker : idworker,
                wage : wage,
                type : type,
                level : level
            }
    });
    $("#formAdd").modal("hide");
      swal({
          title: "Congratulation!",
          text: "Worker Level has been updated",
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
