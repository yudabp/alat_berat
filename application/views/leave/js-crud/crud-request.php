<script type="text/javascript">
$(document).ready(function(){
  $("form").submit(function(e){
    e.preventDefault();
    var atribut = $(this).attr("id");
    if(atribut == "tambah"){
      adding();
    }
    else if(atribut == "update"){
      var keyword = $(this).data("id");
      updating(keyword);
    }
  });
});

function adding(){
      var employee_name = $("#employee_name").val();
      var from_date = $("#from_date").val();
      var to_date = $("#to_date").val();
      var reason = $("#reason").val();
      //var res = from_date.split('/');
      //var rest = to_date.split('/');
      if(employee_name == "" || from_date == "" || to_date =="" || reason==""){
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
          url : "<?php echo base_url(); ?>saveReq",
                type: "POST",
                dataType: "JSON",
                data: {
                  employee_name :employee_name,
                  from_date :from_date ,
                  to_date :to_date ,
                  reason :reason ,
                },
        success : function(data){
            $("#formAdd").modal("hide");
              swal({
                  title: "Congratulation!",
                  text: "Data has been added",
                  type: "success",
                  icon: 'success',
                  buttonsStyling: false,
                  confirmButtonClass: "btn btn-success"
              },function(){
                location.reload();
              });
        },
        error : function(jqXHR, textStatus, errorThrown){
          swal({
                title: 'Gagal!',
                text: 'Jumlah hari melebih batas maksimal',
                type: 'error',
                confirmButtonClass: "btn btn-danger",
                buttonsStyling: false
            }).catch(swal.noop)
        }
      });
        /**/
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
          window.location.href="<?php echo base_url(); ?>delReq/"+id;
                /*$.ajax({
                  url : "<?php echo base_url(); ?>delReq",
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
                          location.reload();*/
          });
}

function viewItem(id){
  //$("#showleave").modal('show');
  $.ajax({
      url : "<?php echo base_url(); ?>showSelReq",
    type: "POST",
    dataType: "JSON",
    data: {
        id : id
    },
    success : function(data){
            $("#showleave").modal("show");
              var html = '';
                   var i;
                   for(i=0; i<data.length; i++){
                       html += '<tr class="text-center">'+
                               '<td>'+data[i].fromdate+'</td>'+
                               '<td>'+data[i].todate+'</td>'+
                               '<td>'+data[i].days+'</td>'+
                               '<td>'+data[i].leavereson+'</td>'+
                               '<td><button class="btn btn-link" onclick="edtItem('+"'"+data[i].idleavereq+"'"+');"><i class="fa fa-pencil"></i></button> <button class="btn btn-link" onclick="delSel('+"'"+data[i].idleavereq+"'"+');"><i class="fa fa-trash-o"></i></button></td>'+
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
                  url : "<?php echo base_url(); ?>delDetReq",
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
  $.ajax({
      url : "<?php echo base_url(); ?>edtReq",
    type: "POST",
    dataType: "JSON",
    data: {
        id : id
    },
    success : function(data){
            $("#formAdd").modal("show");
            $("#showleave").modal("hide");
            $("#formStaffLabel").text("Edit Leave Request");
            $("form").attr("data-id", id);
            $("form").attr("id",'update');
            $("#employee_name").val(data.employeid+" - "+data.fname+" "+data.mname+" "+data.lname);
            $("#from_date").val(data.fromdate);
            $("#to_date").val(data.todate);
            $("#reason").val(data.leavereson);
            $("#btnok").text("Update Leave Request");
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

function updating(keyword){
      var employee_name = $("#employee_name").val();
      var from_date = $("#from_date").val();
      var to_date = $("#to_date").val();
      var reason = $("#reason").val();
      if(employee_name == "" || from_date == "" || to_date =="" || reason==""){
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
          url : "<?php echo base_url(); ?>uptReq",
                type: "POST",
                dataType: "JSON",
                data: {
                  keyword : keyword,
                  employee_name:employee_name,
                  from_date :from_date ,
                  to_date :to_date ,
                  reason :reason ,
                },
        success : function(data){
            $("#formAdd").modal("hide");
              swal({
                  title: "Congratulation!",
                  text: "Data has been updated",
                  type: "success",
                  icon: 'success',
                  buttonsStyling: false,
                  confirmButtonClass: "btn btn-success"
              },function(){
                location.reload();
              });
        },
        error : function(jqXHR, textStatus, errorThrown){
          swal({
                title: 'Gagal!',
                text: 'Jumlah hari melebih batas maksimal',
                type: 'error',
                confirmButtonClass: "btn btn-danger",
                buttonsStyling: false
            }).catch(swal.noop)
        }
      });
        /**/
      }
}
</script>
