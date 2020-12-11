<script type="text/javascript">
/*$(document).ready(function(){
  $("form").submit(function(e){
    e.preventDefault();
    //alert('test');
    var atribut = $(this).attr("id");
    if(atribut == "tambah"){
      tambah_ann();
    }
    else if(atribut == "update"){
      var id_ann = $(this).data("id");
      update_ann(id_ann);
    }
  });
});*/
function clearModal() {
  $("form").attr("id",'tambah');
  $("form").attr("data-id",'');
  // document.getElementById('tambah').reset();
  $("#id_ann").val('');
  $("#announcement_title").val('');
  $("#description").val('');
  $("#tipeSelection").val('-- Choose --');
  $("#formStaffLabel.modal-title").html('New Announcement');
  $("#btnok.btn.btn-success").text("Save Announcement");

  // $("#tamabh.saveAnn.form")[0].reset();
}

function tambah_ann(){
  var announcement_title = $("#announcement_title").val();
  var description = $("#description").val();
  var tipeSelection = $("#tipeSelection").val();
  var by_depart = $("#by_depart").val();
  var by_des = $("#by_des").val();
  var selected_employee = $("#selected_employee").val();
  if(announcement_title == "" || description == "" || tipeSelection == ""){
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
      url : "<?php echo base_url(); ?>saveAnn",
            type: "POST",
            dataType: "JSON",
            data: {
                announcement_title : announcement_title,
                description : description,
                tipeSelection : tipeSelection,
                by_depart : by_depart,
                by_des : by_des,
                selected_employee : selected_employee
            }
    });
      $("#formAdd").modal("hide");
      swal({
          title: "Congratulation!",
          text: "Designation has been added",
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
            confirmButtonText: 'Delete!',
            cancelButtonText: 'Cancel',
            buttonsStyling: false
        },function(){
                $.ajax({
                  url : "<?php echo base_url(); ?>delAnn",
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
          //Prosess Penghapusan data
}

function edtItem(id){
  //alert(id);
  $.ajax({
      url : "<?php echo base_url(); ?>edtAnn",
    type: "POST",
    dataType: "JSON",
    data: {
        id : id
    },
    success : function(data){
            $("#formAdd").modal("show");
            $("#formStaffLabel.modal-title").text("Edit Announcement");
            $("form").attr("data-id", data.idann);
            $("form").attr("id",'update');
            $("form").attr("action",'<?php echo base_url(); ?>uptAnn');
            $("#id_ann").val(data.idann);
            $("#announcement_title").val(data.anntitle);
            $("#description").val(data.anndesc);
            $("#tipeSelection").val(data.annsendto);
            var open = data.annsendto;
            if(open=="department"){
              $("#by_dept").css("display", "block");
              $("#by_depart").val(data.annsenddetail);
            }else if(open=="designation"){
              $("#by_designation").css("display", "block");
              $("#by_des").val(data.annsenddetail);
            }else if(open=="selected"){
              $("#selected_employees").css("display", "block");
            }else{
              $("#selected_employees").css("display", "none");
              $("#by_designation").css("display", "none");
              $("#by_dept").css("display", "none");
            }
            $("#btnok.btn.btn-success").text("Update Announcement");
            console.log(data);
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

function update_ann(id_ann){
  //alert('ok');
  var announcement_title = $("#announcement_title").val();
  var description = $("#description").val();
  var tipeSelection = $("#tipeSelection").val();
  var by_depart = $("#by_depart").val();
  var by_des = $("#by_des").val();
  var selected_employee = $("#selected_employee").val();
  if(announcement_title == "" || description == "" || tipeSelection == ""){
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
      url : "<?php echo base_url(); ?>uptAnn",
            type: "POST",
            dataType: "JSON",
            data: {
                id_ann : id_ann,
                announcement_title : announcement_title,
                description : description,
                tipeSelection : tipeSelection,
                by_depart : by_depart,
                by_des : by_des,
                selected_employee : selected_employee
            }
    });
    $("#formAdd").modal("hide");
      swal({
          title: "Congratulation!",
          text: "Announcement has been updated",
          type: "success",
          icon: 'success',
          buttonsStyling: false,
          confirmButtonClass: "btn btn-success"
      },function(){
        location.reload();
      });
  }
}

function viewItem(id){
  //alert(id);
  $("#showemployee").modal("show");
  $.ajax({
      url : "<?php echo base_url(); ?>showSelEmp",
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
                               '<td style="text-align:left;">'+data[i].diann+'</td>'+
                               //'<td>'+data[i].departmentdesc+'</td>'+
                               //'<td>'+data[i].departmentlead+'</td>'+
                               '<td><button class="btn btn-link" onclick="delSel('+"'"+data[i].idannsendto+"'"+');"><i class="fa fa-trash-o"></i></button></td>'+
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

function delSel(id){
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
                  url : "<?php echo base_url(); ?>delSel",
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
          //Prosess Penghapusan data
}
</script>
