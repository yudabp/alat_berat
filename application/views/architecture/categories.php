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
              <h4 class="page-title">Categories</h4>
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
          <!--<div class="row">-->
            <div class="col-7">
              <div class="card">
                <div class="card-body">>
                  <div class="row">
                    <div class="col-12 table-responsive">
                      <table id="tabledepartment" class="table">
                        <thead>
                          <tr class="text-center">
                            <th>Name</th>
                            <th style="width:20px">Color</th>
                            <th>Update</th>
                            <th>Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php $i=1;foreach($cat as $row){ ?>
                            <tr class="text-center">
                            <td><?php echo $row->types ?></td>
                            <td><input style="background:<?= $row->color ?>;width:20px" disabled></td>
                            <td><?php echo $row->created_at ?></td>
                            <td>
                              <div class="dropdown">
                                <button type="button" class="btn btn-icons btn-rounded text-center" data-toggle="dropdown">
                                  <i class="ti-more-alt"></i>
                                </button>
                                <div class="dropdown-menu">
                                  <button class="btn btn-link" onclick="edtItem('<?php echo $row->idtypes ?>');"><i class="fa fa-pencil"></i></button>
                                  <button class="btn btn-link" onclick="delItem('<?php echo $row->idtypes ?>');"><i class="fa fa-trash-o"></i></button>
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
                <!--</div>-->
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
        <div class="modal fade" id="formAdd" tabindex="-1" role="dialog" aria-labelledby="formStaffLabel" data-backdrop="static" data-keyboard="false">
          <div class="modal-dialog" role="document" style="margin-top: 15px;margin-bottom: 0">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="formStaffLabel">Update Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form class="saveDep form" method="post" action="#" id="update" enctype="multipart/form-data">
              <div class="modal-body">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="department_title">Edit Category</label>
                      <input type="text" name="department_title" id="department_title" class="form-control form-control-lg">
                    </div>
                    <input type="hidden" name="get_idcategory" id="get_idcategory" class="form-control">
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-success" id="btnok">Update Category</button>
                <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
              </div>
            </form>
            </div>
          </div>
        </div>
        <!-- Modal Ends -->

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
 <?php 
  $this->load->view('template/footer');
  // $this->load->view('template/fixed-plugin');
  $this->load->view('template/js');
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
  var d = new Date();
  var months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
  document.getElementById("bulan").innerHTML = months[d.getMonth()];
  document.getElementById("tahun").innerHTML = d.getFullYear();
  $('.dropify').dropify();
</script>
<script type="text/javascript">
  // var d = new Date();
  // var months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
  // document.getElementById("bulan").innerHTML = months[d.getMonth()];
  // document.getElementById("tahun").innerHTML = d.getFullYear();
  //uri => https://sekolah.n56ht.co/uri_1/uri_2/uri_3
  
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
      var new_category = $("#new_category").val();
      var colorpic = $("#inputColor").val();
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
          url : "http://beta.xavaxx.com/new_category",
                type: "POST",
                dataType: "JSON",
                data: {
                    new_category : new_category,
                    colorpic : colorpic
                }
        });
        $("#formAdd").modal("hide");
          swal({
              title: "Congratulation!",
              text: "Category has been added",
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
      url : "http://beta.xavaxx.com/deleted_arch",
            type: "POST",
            dataType: "JSON",
            data: {id : id}
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
      url : "http://beta.xavaxx.com/get_arch",
    type: "POST",
    dataType: "JSON",
    data: {
        id : id
    },
    success : function(data){
            $("#formAdd").modal("show");
            $("#get_idcategory").val(data.inilah.idtypes);
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
  var get_idcategory = $("#get_idcategory").val();
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
      url : "http://beta.xavaxx.com/updated_arch",
            type: "POST",
            dataType: "JSON",
            data: {
                department_title : department_title,
                get_idcategory : get_idcategory
            }
    });
    $("#formAdd").modal("hide");
      swal({
          title: "Congratulation!",
          text: "Category has been updated",
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
