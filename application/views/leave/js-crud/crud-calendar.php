<script type="text/javascript">
$(document).ready(function(){
  $(".saveCom").submit(function(e){
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
  var designation = $("#designation").val();
  var department = $("#department").val();
  if(designation == null && department == null ){
    swal({
      title: "Upps!",
        text: "Silahkan pilih data yang akan difilter.",
        type: "warning",
        icon: 'warning',
        buttonsStyling: false,
        confirmButtonClass: "btn btn-warning"
    }).catch(swal.noop);
  }else{
    $.ajax({
        url : "<?php echo base_url(); ?>leave/getCal",
      type: "POST",
      dataType: "JSON",
      data: {
        designation : designation,
        department : department
      },
      success : function(data){
        //alert(data.departmenttitle);
              //$('.calendar').attr('id','selectcal');
                //var i;
                (function($){
                'use strict';
                    $(function() {
                      var style = getComputedStyle(document.body);
                      if ($('#calendar').length) {
                        $('#calendar').fullCalendar({
                          header: {
                            left: 'prev,next today',
                            center: 'title',
                            right: 'month,basicWeek,basicDay'
                          },
                          defaultDate: '<?php echo date('Y-m-d'); ?>',
                          navLinks: true, // can click day/week names to navigate views
                          editable: true,
                          eventLimit: true, // allow "more" link when too many events
                          events: [
                              
                              {
                                title: "ok",
                                start: '2018-11-21',
                                end: '2018-11-22',
                                color: style.getPropertyValue('--warning')
                              }

                          ]
                        })
                      }
                    });
                  })(jQuery);
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

</script>
