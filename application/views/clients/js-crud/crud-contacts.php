<script type="text/javascript">
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
          window.location.href="<?php echo base_url(); ?>delCon/"+id;
          });
          //Prosess Penghapusan data
}

function edtItem(id){
  //alert(id);
  $.ajax({
      url : "<?php echo base_url(); ?>edtCon",
    type: "POST",
    dataType: "JSON",
    data: {
        id : id
    },
    success : function(data){
            $("#formAdd").modal("show");
            $("#formStaffLabel").text("Edit Contact");
            $("form").attr("action", "<?php echo base_url('uptCon'); ?>");
            $("#idnya").val(data.idcontacts);
            $("#first_name").val(data.first_name);
            $("#last_name").val(data.last_name);
            $("#email").val(data.email);
            $("#phone_no").val(data.phone_no);
            $("#job_title").val(data.job_title);
            $("#company").val(data.company);
            $("#city").val(data.city);
            $("#state").val(data.state);
            $("#zip").val(data.zip);
            $("#joined").val(data.joined);

            $("#btncancel").removeAttr('data-dismiss');
            $("#btncancel").attr('onclick','location.reload();');
            $("#btnok").text("Update Contact");

            $.ajax({
                url : "<?php echo base_url(); ?>showAddCon",
              type: "POST",
              dataType: "JSON",
              data: {
                  id : id
              },
              success : function(data){
                for(o=0; o<1; o++){
                  $("#address").val(data[o].address);
                }
                var kepala = $('#ulang');
                            var html = '';
                             var i;
                             for(i=1; i<data.length; i++){
                                 //html += '<div style="margin-bottom:1px;">'+data[i].address+'</div><br>';
                                 html += `
                                 <div class="ulang`+(i+1)+`">
                                   <div class="row mt-2">
                                     <div class="col-md-10">
                                       <textarea class="form-control" rows="2"  name="address[]" style="width: 100%;">`+data[i].address+`</textarea>
                                     </div>
                                     <div class="col-md-2">
                                       <button type="button"  class="btn btn-danger btn-just-icon add btn-sm btnHps" data="ulang`+(i+1)+`"><i class="fa fa-minus"></i></button>
                                     </div>
                                   </div>
                                 </div>
                                 `;
                             }
                             $('#ulang').html(html);
                             //kepala.append(html);
                             btnHps = $('.btnHps');
                             btnHps.click(function(){
                               var id_div = $(this).attr('data');
                               console.log(id_div);
                               $('.'+id_div).remove();
                             });
                             //$('#addressd').html(data.length);
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

function viewItem(id){
  $.ajax({
      url : "<?php echo base_url(); ?>viewCon",
    type: "POST",
    dataType: "JSON",
    data: {
        id : id
    },
    success : function(data){
            $("#detailCon").modal("show");
            $("#first_named").html(data.first_name);
            $("#last_named").html(data.last_name);
            $("#emaild").html(data.email);
            $("#phone_nod").html(data.phone_no);
            $("#job_titled").html(data.job_title);
            $("#companyd").html(data.company);
            $("#cityd").html(data.city);
            $("#stated").html(data.state);
            $("#zipd").html(data.zip);
            $("#joinedd").html(data.joined);
            var cekimg = data.photo;
            if(cekimg !=""){
              $("#userimg").attr('src','<?php echo base_url(); ?>assets/contact/'+cekimg);
            }

            $.ajax({
                url : "<?php echo base_url(); ?>showAddCon",
              type: "POST",
              dataType: "JSON",
              data: {
                  id : id
              },
              success : function(data){
                            var html = '';
                             var i;
                             for(i=0; i<data.length; i++){
                                 html += '<div style="margin-bottom:1px;">'+data[i].address+'</div><br>';
                             }
                             $('#loaddatahere').html(html);
                             //$('#addressd').html(data.length);
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
