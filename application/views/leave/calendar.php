<?php
    $this->load->view('template/head');
    $this->load->view('template/topbar');
    $this->load->view('template/sidebar');
?>
<style type="text/css">
  a:hover{
    text-decoration: none;
  }
</style>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row mb-4">
            <div class="col-12 d-flex align-items-center justify-content-between">
              <h4 class="page-title">Leave Calendar</h4>
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
            <div class="col-lg-12">
              <div class="card">
                <div class="card-body">
                  <form class="saveCom form" method="get" action="<?php echo base_url(); ?>leave-calendar" id="tambah" enctype="multipart/form-data">
                  <div class="row">
                    <div class="col-md-3">
                      <select name="department" id="department" class="single-select form-control" >
                        <option selected="selected" disabled="disabled"> - Select Department - </option>
                        <?php foreach ($department as $dep) {?>
                          <option value="<?php echo $dep->iddepartment; ?>"><?php echo $dep->departmenttitle; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                    <div class="col-md-3">
                      <select name="designation" id="designation" class="single-select form-control" >
                        <option selected="selected" disabled="disabled"> - Select Designation - </option>
                        <?php foreach ($designation as $des) {?>
                          <option value="<?php echo $des->iddesignation; ?>"><?php echo $des->designationtitle; ?></option>
                        <?php } ?>
                      </select>                      
                    </div>
                    <div class="col-md-1">
                      <button class="btn btn-inverse-success" type="submit">
                        <i class="ti-filter"></i> Filter
                      </button>
                    </div>
                  </div>
                  </form>
                  <div class="row">
                    <div class="col-md-12">
                      <div id="calendar" class="calendar"></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->

<?php
  $this->load->view('template/footer');
  // $this->load->view('template/fixed-plugin');
  $this->load->view('template/js');
  //$this->load->view('leave/js-crud/crud-calendar');
?>
<script type="text/javascript">
  $(".single-select").select2({
    width: '100%',
    // dropdownParent: $('#formStaff'),
  });

  (function($) {
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
          <?php foreach ($cal as $cl) {
            if(isset($cl->idholidays)){?>
          {
            title: '<?php echo $cl->holidayname." - ".$cl->holidaysdesc; ?>',
            start: '<?php $dt = explode('/',$cl->holidaystart); echo $dt[2]."-".$dt[1]."-".$dt[0]; ?>',
            end: '<?php $dt = explode('/',$cl->holidaysend); echo $dt[2]."-".$dt[1]."-".$dt[0]; ?>',
            color: style.getPropertyValue('--<?php echo $cl->holidayscolor; ?>')
          },
          <?php }else{ ?>
            {
              title: '<?php echo $cl->fname." ".$cl->mname." ".$cl->lname." - ".$cl->leavereson; ?>',
              start: '<?php $dt = explode('/',$cl->fromdate); echo $dt[2]."-".$dt[1]."-".$dt[0]; ?>',
              end: '<?php $dt = explode('/',$cl->todate); echo $dt[2]."-".$dt[1]."-".$dt[0]; ?>',
              color: style.getPropertyValue('--warning')
            },
          <?php } }?>
          <?php 
          if(!empty($leaves)){
            foreach ($leaves as $lv) {
            ?>
            {
              title: '<?php echo $lv->fname." ".$lv->mname." ".$lv->lname." - ".$lv->leavereson; ?>',
              start: '<?php $dt = explode('/',$lv->fromdate); echo $dt[2]."-".$dt[1]."-".$dt[0]; ?>',
              end: '<?php $dt = explode('/',$lv->todate); echo $dt[2]."-".$dt[1]."-".$dt[0]; ?>',
              color: style.getPropertyValue('--warning')
            },
          <?php }}?>
        ]
      })
    }
  });
})(jQuery);
</script>
