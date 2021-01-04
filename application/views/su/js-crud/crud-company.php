<script type="text/javascript">
$(document).ready(function(){
  $(".saveCom").submit(function(e){
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
  // console.log('ini log');
});

function tambah(){
      var nama_perusahaan = $("#nama_perusahaan").val();
      var alamat = $("#alamat").val();
      var username = $("#username").val();
      var password = $("#password").val();
      var penanggung_jawab = $("#penanggung_jawab").val();
      var pemakai_utama = $("#pemakai_utama").val();
      var paketSelection = $("#paketSelection").val();
      var cargo = jQuery("#cargo").is(":checked") ? "Yes" : "No";
      var health = jQuery("#health").is(":checked") ? "Yes" : "No";
      var architecture = jQuery("#architecture").is(":checked") ? "Yes" : "No";
      var hospitality = jQuery("#hospitality").is(":checked") ? "Yes" : "No";
      var maintenance = jQuery("#maintenance").is(":checked") ? "Yes" : "No";
      if(nama_perusahaan == "" || alamat == "" || username == "" || password == "" || penanggung_jawab == "" || pemakai_utama == "" || paketSelection == ""){
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
          url : "<?php echo base_url(); ?>saveCom",
                type: "POST",
                dataType: "JSON",
                data: {
                  nama_perusahaan : nama_perusahaan ,
                  alamat : alamat ,
                  username : username ,
                  password : password ,
                  penanggung_jawab : penanggung_jawab ,
                  pemakai_utama : pemakai_utama ,
                  paketSelection : paketSelection ,
                  cargo : cargo ,
                  health : health ,
                  architecture : architecture ,
                  hospitality : hospitality ,
                  maintenance : maintenance ,
                }
        });

          swal({
              title: "Congratulation!",
              text: "Category has been added",
              type: "success",
              icon: 'success',
              buttonsStyling: false,
              confirmButtonClass: "btn btn-success"
          },function(){
            //location.reload();
            window.location.href="<?php echo base_url(); ?>su-list-company";
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
              window.location.href="<?php echo base_url(); ?>root/delCom/"+id;
          });
}

function edtItem(id){
  
  $.ajax({
      url : "<?php echo base_url(); ?>edtCom/",
    type: "POST",
    dataType: "JSON",
    data: {
        id : id
    },
    success : function(data){
            $('#formAdd').modal('show');
            $("#formStaffLabel").text("Edit Company");
            //$("form").attr("data-id", id);
            $("form").attr("action", '<?php echo base_url(); ?>uptCom');
            $("form").attr("id",'none');
            $("#keyword").val(data.idcompany);
            $("#nama_perusahaan").val(data.companyname);
            $("#username").val(data.username);
            $("#password").val(data.password_de);
            $("#penanggung_jawab").val(data.penanggungjawab);
            $("#pemakai_utama").val(data.jlhpemakai);
            $("#paketSelection").val(data.paket);
            var paket = data.paket;
            if(paket=="Standard"){
              $("#tipeselect").removeAttr("disabled");
              $("#checkAddons").css("display", "block");
            }
            $("button[type=submit]").text("Update Company");

            var cargo = data.cargo;
            var architecture = data.architecture;
            var hospitality = data.hospitality;
            var health = data.health;
            var maintenance = data.maintenance;
            if(cargo == "Yes"){
              $('#cargo').attr('checked','checked');
            }

            if(architecture == "Yes"){
              $('#architecture').attr('checked','checked');
            }

            if(hospitality == "Yes"){
              $('#hospitality').attr('checked','checked');
            }
            
            if(health == "Yes"){
              $('#health').attr('checked','checked');
            }

            if(maintenance == "Yes"){
              $('#maintenance').attr('checked','checked');
            }
            // console.log(data);
            $.ajax({
                url : "<?php echo base_url(); ?>showAddCom",
              type: "POST",
              dataType: "JSON",
              data: {
                  id : id
              },
              success : function(data){
                for(o=0; o<1; o++){
                  $("#address").val(data[o].addcompany);
                }
                var kepala = $('#ulang');
                            var html = '';
                             var i;
                             for(i=1; i<data.length; i++){

                                 html += `
                                 <div class="ulang`+(i+1)+`">
                                   <div class="row mt-2">
                                     <div class="col-md-10">
                                       <textarea class="form-control" rows="2"  name="address[]" style="width: 100%;">`+data[i].addcompany+`</textarea>
                                     </div>
                                     <div class="col-md-2">
                                       <button type="button"  class="btn btn-danger btn-just-icon add btn-sm btnHps" data="ulang`+(i+1)+`"><i class="fa fa-minus"></i></button>
                                     </div>
                                   </div>
                                 </div>
                                 `;
                             }
                             $('#ulang').html(html);

                             btnHps = $('.btnHps');
                             btnHps.click(function(){
                               var id_div = $(this).attr('data');
                               console.log(id_div);
                               $('.'+id_div).remove();
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
  // $.ajaxSetup({
  //   headers: {
  //   ‘X-CSRF-TOKEN’: $(‘meta[name=”csrf-token”]’).attr(‘content’)
  //   }
  // });
}

function update(keyword){
  var nama_perusahaan = $("#nama_perusahaan").val();
  var address = $("#address").val();
  var username = $("#username").val();
  var password = $("#password").val();
  var penanggung_jawab = $("#penanggung_jawab").val();
  var pemakai_utama = $("#pemakai_utama").val();
  var paketSelection = $("#paketSelection").val();
  var cargos = jQuery("#cargos").is(":checked") ? "Yes" : "No";
      var healths = jQuery("#healths").is(":checked") ? "Yes" : "No";
      var architectures = jQuery("#architectures").is(":checked") ? "Yes" : "No";
      var hospitalitys = jQuery("#hospitalitys").is(":checked") ? "Yes" : "No";
      var maintenance = jQuery("#maintenance").is(":checked") ? "Yes" : "No";
  if(nama_perusahaan == "" || address == "" || username == "" ||  penanggung_jawab == "" || pemakai_utama == "" || paketSelection == ""){
          swal({
            title: "Data ada yang kosong!",
              text: "Tolong lengkapi data.",
              type: "warning",
              icon: 'warning',
              buttonsStyling: false,
              confirmButtonClass: "btn btn-warning"
          }).catch(swal.noop);
      }else{
        //alert(cargos+" "+healths+" "+achitectures+" "+hospitality);
        $.ajax({
          url : "<?php echo base_url(); ?>uptCom",
                type: "POST",
                dataType: "JSON",
                data: {
                  keyword : keyword,
                  nama_perusahaan : nama_perusahaan ,
                  address : address ,
                  username : username ,
                  password : password ,
                  penanggung_jawab : penanggung_jawab ,
                  pemakai_utama : pemakai_utama ,
                  paketSelection : paketSelection ,
                  cargos : cargos ,
                  healths : healths ,
                  architectures : architectures ,
                  hospitalitys : hospitalitys ,
                }
              });
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

function Suspend(id){
  $.ajax({
      url : "<?php echo base_url(); ?>susCom",
    type: "POST",
    dataType: "JSON",
    data: {
        id : id
    },
    success : function(data){
      swal({
          title: "Congratulation!",
          text: "Company has been suspended",
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
            text: 'Gagal mengambil data.',
            type: 'error',
            confirmButtonClass: "btn btn-danger",
            buttonsStyling: false
        }).catch(swal.noop)
    }
  });
}

function unSuspend(id){
  $.ajax({
      url : "<?php echo base_url(); ?>unsusCom",
    type: "POST",
    dataType: "JSON",
    data: {
        id : id
    },
    success : function(data){
      swal({
          title: "Congratulation!",
          text: "Company has been reactive",
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
            text: 'Gagal mengambil data.',
            type: 'error',
            confirmButtonClass: "btn btn-danger",
            buttonsStyling: false
        }).catch(swal.noop)
    }
  });
}
</script>
