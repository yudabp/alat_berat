<script type="text/javascript">
$(document).ready(function(){
  $("form").submit(function(e){
    e.preventDefault();
    //alert('test');
    var atribut = $(this).attr("id");
    if(atribut == "tambah"){
      tambah();
    }
    else if(atribut == "update"){
      var keyword = $(this).data("id");
      update(keyword);
    }
  });
});

function tambah(){
      var holiday_name = $("#holiday_name").val();
      var description = $("#description").val();
      var start_date = $("#start_date").val();
      var end_date = $("#end_date").val();
      if(holiday_name == "" || start_date =="" || end_date==""){
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
          url : "<?php echo base_url(); ?>saveHoli",
                type: "POST",
                dataType: "JSON",
                data: {
                  holiday_name : holiday_name ,
                  description : description ,
                  start_date : start_date ,
                  end_date : end_date ,
                }
        });
        $("#formAdd").modal("hide");
          swal({
              title: "Congratulation!",
              text: "Holiday has been added",
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
          window.location.href="<?php echo base_url(); ?>delHoli/"+id;
                /*$.ajax({
                  url : "<?php echo base_url(); ?>delHoli",
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

function edtItem(id){
  $.ajax({
      url : "<?php echo base_url(); ?>edtHoli",
    type: "POST",
    dataType: "JSON",
    data: {
        id : id
    },
    success : function(data){
            $("#formAdd").modal("show");
            $("#showleave").modal("hide");
            $("#formStaffLabel").text("Edit Holiday");
            $("form").attr("data-id", id);
            $("form").attr("id",'update');
            $("#holiday_name").val(data.holidayname);
            $("#description").val(data.holidaysdesc);
            $("#start_date").val(data.holidaystart);
            $("#end_date").val(data.holidaysend);
            $("#btnok").text("Update holiday");
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

function update(keyword){
      var holiday_name = $("#holiday_name").val();
      var description = $("#description").val();
      var start_date = $("#start_date").val();
      var end_date = $("#end_date").val();
      if(holiday_name == "" || start_date =="" || end_date==""){
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
          url : "<?php echo base_url(); ?>uptHoli",
                type: "POST",
                dataType: "JSON",
                data: {
                  keyword : keyword,
                  holiday_name : holiday_name ,
                  description : description ,
                  start_date : start_date ,
                  end_date : end_date ,
                }
              });
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

      };
}
</script>
