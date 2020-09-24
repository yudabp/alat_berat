<?php 
    $this->load->view('template/head');
    $this->load->view('template/topbar');
    $this->load->view('template/sidebar');
?>
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row mb-4">
            <div class="col-12 d-flex align-items-center justify-content-between">
              <h4 class="page-title">Rab Borongan</h4>
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
                      <span id="page-title"></span>
                      <div class="pull-right">
                        <form class="form-inline" autocomplete="off">
                          <button type="button" class="btn btn-info" @click="fetchTasks(false)" :disabled="!allowRefresh"><i class="mdi mdi-refresh"></i> Refresh</button>
                          <select class="form-control" v-model="projectId">
                            <option value="">- Project -</option>
                              <option value="36">Coba &nbsp;&nbsp;1</option>
                              <option value="38">Coba &nbsp;&nbsp;2</option>
                              <option value="31">Coba &nbsp;&nbsp;3</option>
                          </select>
                        </form>                        
                      </div>
                      <div class="table-responsive" v-show="!showingForm">
                          <table class="table table-bordered dataTable" v-show="showTasks" id="rab">
                              <thead>
                                  <tr>
                                      <th rowspan="2">No</th>
                                      <th rowspan="2">Item</th>
                                      <th colspan="4" class="text-center">Borongan</th>
                                      <th rowspan="2" class="text-center">Date</th>
                                      <th rowspan="2" class="text-center">Progress</th>
                                      <th rowspan="2" class="text-center" style="width: 1px;"></th>
                                  </tr>
                                  <tr>
                                      <th class="text-right">Volume</th>
                                      <th class="text-right">Price (Rp)</th>
                                      <th class="text-right">Total (Rp)</th>
                                      <th class="text-right">Value</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  <tr v-for="task in tasks" :style="{'background': task.isChild ? 'none' : bgColors[task.level - 1], 'font-weight': task.level==1 ? 'bold' : 'normal'}">
                                      <td class="text-nowrap item-name">
                                              <div class="pull-left" :style="{'margin-left': task.isChild ? taskMargin : 'none'}">
                                              </div>
                                              </button>
                                      </td>
                                      <td></td>
                                      <td></td>
                                      <td></td>
                                      <td colspan="2" v-if="!task.isChild"></td>
                                      <td class="text-nowrap text-center small" v-html="task.dateRange.join(' -<br>')"></td>
                                      <td>
                                        <div class="dropdown">
                                          <button type="button" class="btn btn-icons btn-rounded text-center" data-toggle="dropdown">
                                            <i class="ti-more-alt"></i>
                                          </button>
                                          <div class="dropdown-menu">
                                            <button class="btn btn-link" onclick="edtItem('4fd8381e-2f34-4e8b-9667-d5dc8fd03998');"><i class="fa fa-pencil"></i></button>
                                            <button class="btn btn-link" onclick="delItem('4fd8381e-2f34-4e8b-9667-d5dc8fd03998');"><i class="fa fa-trash-o"></i></button>
                                          </div>
                                        </div>
                                      </td>
                                  </tr>
                              </tbody>
                          </table>
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
  
    function changepass(){
    $('#formpass').modal('show');
    }

    function changeuser(){
      $('#formuser').modal('show');
    }

    $(document).ready(function(){
      $(".changepass").submit(function(e){
        e.preventDefault();
        var atribut = $(this).attr("id");
        if(atribut == "tambah"){
          ubahpass();
        }
      });

      $(".changeuser").submit(function(e){
        e.preventDefault();
        var atribut = $(this).attr("id");
        if(atribut == "tambah"){
          ubahuser();
        }
      });
    });

    function ubahpass(){
        var old_pass = $("#old_pass").val();
        var new_pass = $("#new_pass").val();
        if(old_pass == "" || new_pass==""){
            swal({
              title: "Data ada yang kosong!",
                text: "Tolong lengkapi data.",
                type: "warning",
                icon: 'warning',
                buttonsStyling: false,
                confirmButtonClass: "btn btn-warning"
            }).catch(swal.noop);
        }else{
          $.ajax({
              url : "http://beta.xavaxx.com/getPass",
            type: "POST",
            dataType: "JSON",
            data: {
                old_pass :old_pass,
                new_pass :new_pass,
            },
            success : function(data){
                if(data == 0){
                  swal({
                        title: 'Gagal!',
                        text: 'Password tidak ditemukan',
                        type: 'error',
                        confirmButtonClass: "btn btn-danger",
                        buttonsStyling: false
                    }).catch(swal.noop)
                }else{
                  $.ajax({
                    url : "http://beta.xavaxx.com/uptPass",
                          type: "POST",
                          dataType: "JSON",
                          data: {
                            old_pass :old_pass,
                            new_pass :new_pass,
                          }
                  });
                  $("#formpass").modal("hide");
                    swal({
                        title: "Congratulation!",
                        text: "Password has been changed. Please login with new password",
                        type: "success",
                        icon: 'success',
                        buttonsStyling: false,
                        confirmButtonClass: "btn btn-success"
                    },function(){
                      window.location.href="http://beta.xavaxx.com/proout";
                    });
                }
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
    }

    function ubahuser(){
        var old_user = $("#old_user").val();
        var new_user = $("#new_user").val();
        if(old_user == "" || new_user==""){
            swal({
              title: "Data ada yang kosong!",
                text: "Tolong lengkapi data.",
                type: "warning",
                icon: 'warning',
                buttonsStyling: false,
                confirmButtonClass: "btn btn-warning"
            }).catch(swal.noop);
        }else{
          $.ajax({
              url : "http://beta.xavaxx.com/getUser",
            type: "POST",
            dataType: "JSON",
            data: {
                old_user :old_user,
                new_user :new_user,
            },
            success : function(data){
                if(data == 0){
                  swal({
                        title: 'Gagal!',
                        text: 'Username tidak ditemukan',
                        type: 'error',
                        confirmButtonClass: "btn btn-danger",
                        buttonsStyling: false
                    }).catch(swal.noop)
                }else{
                  $.ajax({
                    url : "http://beta.xavaxx.com/uptUser",
                          type: "POST",
                          dataType: "JSON",
                          data: {
                            old_user :old_user,
                            new_user :new_user,
                          }
                  });
                  $("#formpass").modal("hide");
                    swal({
                        title: "Congratulation!",
                        text: "Username has been changed. Please login with new username",
                        type: "success",
                        icon: 'success',
                        buttonsStyling: false,
                        confirmButtonClass: "btn btn-success"
                    },function(){
                      window.location.href="http://beta.xavaxx.com/proout";
                    });
                }
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
    }

    function showoldpass() {
      var x = document.getElementById("old_pass");
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

    function shownewpass() {
      var x = document.getElementById("new_pass");
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
      var department_title = $("#department_title").val();
      var description = $("#description").val();
      var department_lead = $("#department_lead").val();
      var parent_department = $("#parent_department").val();
      if(department_title == "" ){
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
          url : "http://beta.xavaxx.com/saveDep",
                type: "POST",
                dataType: "JSON",
                data: {
                    department_title : department_title,
                    description : description,
                    department_lead : department_lead,
                    parent_department : parent_department,
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
                  url : "http://beta.xavaxx.com/delDep",
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
      url : "http://beta.xavaxx.com/edtDep",
    type: "POST",
    dataType: "JSON",
    data: {
        id : id
    },
    success : function(data){
            $("#formAdd").modal("show");
            $("#formStaffLabel").text("Edit Department");
            //$("form").attr('action','http://beta.xavaxx.com/uptDep');

            $("form").attr("data-id", data.iddepartment);
            $("form").attr("id",'update');
            $("#department_title").val(data.departmenttitle);
            $("#description").val(data.departmentdesc);
            $("#parent_department").val(data.parentdepartment);
            $("#department_lead").val(data.departmentlead);
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
  var department_title = $("#department_title").val();
  var description = $("#description").val();
  var department_lead = $("#department_lead").val();
  var parent_department = $("#parent_department").val();
  if(department_title == ""  ){
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
      url : "http://beta.xavaxx.com/uptDep",
            type: "POST",
            dataType: "JSON",
            data: {
                id_dep : id_dep,
                department_title : department_title,
                description : description,
                department_lead : department_lead,
                parent_department : parent_department,
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
