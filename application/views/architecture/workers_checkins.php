<?php 
    $this->load->view('template/head');
    $this->load->view('template/topbar');
    $this->load->view('template/sidebar');
?>
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row mb-4">
            <div class="col-12 d-flex align-items-center justify-content-between">
              <h4 class="page-title">Workers Checkins</h4>
              <div class="d-flex align-items-right">
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
                  <div id="page-wrapper">
                    <div class="container-fluid">
                      <div class="row bg-title">
                        <div class="col-lg-12">
                    </div>
                  </div>
                <div class="white-box" id="content">
                <div class="white-box" v-show="showForm && !showDetails && !showCheckIns">
                  <form class="form-horizontal form-material" method="post" action="<?php echo base_url();?>architecture/subbmit">
                    <div class="body">
                      <div class="row clearfix">
                        <div class="col-md-12">
                          <div class="form-group">
                            <div class="body">
                              <div class="row clearfix">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Project</label>
                                        <select name="project_name" id="project_name" class="form-control">
                                          <option value="" disable selected>--- project ----</option>
                                          <?php $c=1; foreach($jklj as $kill){ ?>
                                            <option value="<?= $kill->project_name ?>"><?= $kill->project_name ?></option>
                                          <?php $c++; } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <div class="body">
                                      <div class="row">
                                        <div class="col-md-12"><label>Project Date</label></div>
                                        <div class="col-md-6">
                                          <div class="form-group">
                                              <input type="text" class="form-control datepicker" name="date_from" id="date_from" placeholder="from">
                                          </div>
                                        </div>
                                        <div class="col-md-6">
                                          <div class="form-group">
                                            <input type="text" class="form-control datepicker" name="date_to" id="date_to" placeholder="To">
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <!-- <div class="row clearfix">
                                <div style="margin-left:81%">
                                  <button type="reset" class="btn btn-danger" data-dismiss="modal" style="margin-right:10px"> Clear</button>
                                  <button type="submit" class="btn btn-primary nobradius" id="aplay">Aplay</button>
                                </div>
                              </div> -->
                            </div>
                          </div>
                        </div>      
                      </div>
                    </div>
                  </form>
                </div>
                <div class="white-box" v-show="showForm && !showDetails && !showCheckIns" id="onlyy">
                 
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      </div> </div> </div>
<?php 
  $this->load->view('template/footer');
  // $this->load->view('template/fixed-plugin');
  $this->load->view('template/js');
?>
<script type="text/javascript">
    $(document).ready(function(){

    });
</script>
<script type="text/javascript">
  var d = new Date();
  var months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
  document.getElementById("bulan").innerHTML = months[d.getMonth()];
  document.getElementById("tahun").innerHTML = d.getFullYear();
  $('.dropify').dropify();
</script>
<script>
  // $(document).ready(function(){
  //   $("#aply").click(function(){
  //     var project_name = $("#project_name").val();
  //     var date_from = $("#date_from").val();
  //     var date_to = $("#date_to").val();
  //     $.ajax({
  //       url : "http://beta.xavaxx.com/checkk",
  //       type : "POST",
  //       dataType : "JSON",
  //       data : {
  //         name : project_name,
  //         from : date_from,
  //         to : date_to
  //       },
  //       success : function(){
          
  //       }
  //     });
  //   });
  // });
</script>
<script>
$("#project_name").change(function(){
  var project_nnm = $("#project_name").val();
  $.ajax({
    url : "http://beta.xavaxx.com/muncul",
    type : "POST",
    dataType : "JSON",
    data : {id : project_nnm},
    success : function(data){
      stry = `<div class="row">
                <div class="col-md"> Worker </div>
                <div class="col-md"> Level / Type</div>
                <div class="col-md"> Head </div>
                <div class="col-md"> Data </div>
                <div class="col-md"> Days </div>
                <div class="col-md"> Wage </div>
              </div>`;
      $("#onlyy").html(stry);
    }
  });
});
$("#project_name").change(function(){
  var project_to = $("#date_to").val();
  var project_from = $("#date_from").val();
  var project_name = $("#project_name").val();
  $.ajax({
    url : "http://beta.xavaxx.com/muncul",
    type : "POST",
    dataType : "JSON",
    data : {name : project_name
    },
    success : function(data){
      var k ;
      var stry = "";
      stry = `<tr>
                <th style="padding-left:25px"> Worker </th>
                <th style="padding-left:25px"> Level / Type</th>
                <th style="padding-left:25px"> Head </th>
                <th style="padding-left:25px"> Data </th>
                <th style="padding-left:25px"> Days </th>
                <th style="padding-left:25px"> Wage </th>
              </tr>`;
      

      for(k=0;k<data.onee.length;k++){
        stry += `<tr>
                    <td style="padding-left:25px">`+data.onee[k].nama+`</td>
                    <td style="padding-left:25px">`+data.onee[k].level+` / `+data.onee[k].type+`</td>
                    <td style="padding-left:25px">  </td>
                    <td class="imagges" style="padding-left:25px"></td>
                    <td style="padding-left:25px"> `+data.onee[k].lengtd+` </td>
                    <td style="padding-left:25px">Rp. `+data.onee[k].wage+` </td>
                  </tr>`;
      }
      
      $("#onlyy").html(stry);
    }
  });
});

$("#date_to").change(function(){
    var project_to = $("#date_to").val();
    var project_from = $("#date_from").val();
  $.ajax({
    url : "http://beta.xavaxx.com/gambar" ,
    type : "POST",
    dataType : "JSON",
    data : {id : project_to,
            from : project_from},
    success : function(data){
    //   var x;
    //   var nmn = "";
    //   for(x=0;x<data.mvp.length;x++){
    //     nmn += `<img src="`+data.mvp[x].img+`" style="width:100px;height:120px">`;
    //     }
      $(".imagges").html(`<img src="`+data.mvp.img+`" style="width:100px;height:120px">`);
    }
  });
});
</script>

<script type="text/javascript">
    $("[name='district_id']").change(function(){
      var get_kel = $("[name='district_id']").val();
        $.ajax({
          url : "http://beta.xavaxx.com/region-vallige",
                type: "POST",
                dataType: "JSON",
                data: {
                    get_kel : get_kel
                },
                success : function(data){
                    var p;
                    var village = "";
                    for(p=0;p<data.valueda.length;p++){
                      village += '<option value="'+data.valueda[p].name_village+'">'+data.valueda[p].name_village+'</option>';
                    }
                    $("#village_all").html(village);
                },error : function(jqXHR, textStatus, errorThrown){
                  swal({
                        title: 'Gagal!',
                        text: 'Gagal mengambil data.',
                        type: 'error',
                        confirmButtonClass: "btn btn-danger",
                        buttonsStyling: false
                    });
                }
        });
    })

</script>
<script type="text/javascript">
  $(".single-select").select2({
    width: '100%',
    // dropdownParent: $('#addQuotation'),
  });
  $('#tableQuotation').DataTable({
      "aLengthMenu": [
        [5, 10, 15, -1],
        [5, 10, 15, "All"]
      ],
      "iDisplayLength": 5,
      "language": {
        search: ""
      },
      // "bSort" : false,
      // "dom": 'Bfrtip',
      // "buttons": [
      //   'copy', 'csv', 'excel', 'pdf', 'print'
      // ]
    });
  if ($(".datepicker").length) {
    $('.datepicker').datepicker({
      enableOnReadonly: true,
      todayHighlight: true,
      autoclose: true,
      format: "dd/mm/yyyy"
    });
  }
</script>

