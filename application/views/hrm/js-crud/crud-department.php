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

function clearModal() {
  $("form").attr("id",'tambah');
  $("form").attr("data-id",'');
  // $("#department_title").val('');
  // $("#description").val('');
  // $("#parent_department").val('');
  // $("#department_lead").val('');
  $("#tambah.saveDep.form")[0].reset();
  // document.getElementById("tambah").reset();
  $("#btnok.btn.btn-success").text("Create Department");
  $("#formStaffLabel.modal-title").text("New Department");
}

function tambah_dep(){
  //alert('ok');
      var department_title = $("#department_title").val();
      var description = $("#description").val();
      var department_lead = $("#department_lead").val();
      var parent_department = $("#parent_department").val();
      if(department_title == "" ){
          swal({
            title: "Empty field!",
              text: "Please check again.",
              type: "warning",
              icon: 'warning',
              buttonsStyling: false,
              confirmButtonClass: "btn btn-warning"
          }).catch(swal.noop);
      }else{
          //Memulai memasukan data ke database
        $.ajax({
          url : "<?php echo base_url(); ?>saveDep",
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
              title: "Success!",
              text: "Data has been added",
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
            confirmButtonText: 'Delete!',
            cancelButtonText: 'Cancel',
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
                  url : "<?php echo base_url(); ?>delDep",
                        type: "POST",
                        dataType: "JSON",
                        data: {
                          id : id
                        }
                        });
                          swal({
                              title: 'Success!',
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
      url : "<?php echo base_url(); ?>edtDep",
    type: "POST",
    dataType: "JSON",
    data: {
        id : id
    },
    success : function(data){
            $("#formAdd").modal("show");
            $("#formStaffLabel.modal-title").text("Edit Department");
            //$("form").attr('action','<?php echo base_url('uptDep'); ?>');

            $("form").attr("data-id", data.iddepartment);
            $("form").attr("id",'update');
            $("#department_title").val(data.departmenttitle);
            $("#description").val(data.departmentdesc);
            $("#parent_department").val(data.parentdepartment);
            $("#department_lead").val(data.departmentlead);
            $("#btnok.btn.btn-success").text("Update Department");
    },
    error : function(jqXHR, textStatus, errorThrown){
      swal({
            title: 'Failed!',
            text: 'Cannot get data.',
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
        title: "Empty field!",
          text: "Please check again.",
          type: "warning",
          icon: 'warning',
          buttonsStyling: false,
          confirmButtonClass: "btn btn-warning"
      }).catch(swal.noop);
  }else{
      //Memulai memasukan data ke database
    $.ajax({
      url : "<?php echo base_url(); ?>uptDep",
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
          title: "Success!",
          text: "Data has been updated",
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
      url : "<?php echo base_url(); ?>showSubDep",
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
            title: 'Failed!',
            text: 'Cannot get data.',
            type: 'error',
            confirmButtonClass: "btn btn-danger",
            buttonsStyling: false
        }).catch(swal.noop)
    }
  });
}
</script>
