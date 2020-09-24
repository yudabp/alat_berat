<script type="text/javascript">
$(document).ready(function(){
  $("form").submit(function(e){
    e.preventDefault();
    
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
      var sticker_no = $("#sticker_no").val();
      var job_category = $("#job_category").val();
      var tipeSelection = $("#tipeSelection").val();
      var date_from = $("#date_from").val();
      var date_to = $("#date_to").val();
      var maplat = $("#maplat").val();
      var maplng = $("#maplng").val();
      var mapdistance = $("#mapdistance").val();
      var question = $("#question").val();
      var answer = $("#answer").val();

      if(sticker_no == "" || job_category =="" || tipeSelection ==""  || maplat=="" || maplng=="" || mapdistance=="" || question=="" || answer==""){
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
          url : "<?php echo base_url(); ?>saveOver",
                type: "POST",
                dataType: "JSON",
                data: {
                    sticker_no : sticker_no, 
                    job_category : job_category, 
                    tipeSelection : tipeSelection, 
                    date_from : date_from, 
                    date_to : date_to, 
                    maplat : maplat,
                    maplng : maplng,
                    mapdistance : mapdistance, 
                    question : question,
                    answer : answer,
                }
        });

          swal({
              title: "Congratulation!",
              text: "Overview has been added",
              type: "success",
              icon: 'success',
              buttonsStyling: false,
              confirmButtonClass: "btn btn-success"
          },function(){
            location.reload();
          });
      }
}


</script>
