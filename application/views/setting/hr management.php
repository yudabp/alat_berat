<?php
    $this->load->view('template/head');
    $this->load->view('template/topbar');
    $this->load->view('template/sidebar');
?>
<style type="text/css">
  body{
    scroll-behavior:
  }
  .btn-link{
    /*background: #ECECEC;*/
    width: 10px;
  }
  .fa-trash-o{
    color: #FB0000;
  }
</style>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row mb-4">
            <div class="col-12 d-flex align-items-center justify-content-between">
              <h4 class="page-title">HR Management</h4>
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
            <div class="col-md-12">
              <div class="card">
                <div class="card-body">
                  <div class="vertical-tab">
                    <ul class="nav nav-tabs tab-solid tab-solid-info mr-2 col-md-2" role="tablist">
                      <li class="nav-item mb-4">
                        <a class="nav-link active" id="tab-6-1" data-toggle="tab" href="#home-6-1" role="tab" aria-controls="home-6-1" aria-selected="true">Attendace</a>
                      </li>
                      <!-- <li class="nav-item mb-4">
                        <a class="nav-link" id="tab-6-2" data-toggle="tab" href="#profile-6-2" role="tab" aria-controls="profile-6-2" aria-selected="false">Company</a>
                      </li> -->
                      <!-- <li class="nav-item mb-4">
                        <a class="nav-link" id="tab-6-3" data-toggle="tab" href="#contact-6-3" role="tab" aria-controls="contact-6-3" aria-selected="false">Payroll</a>
                      </li> -->
                      <li class="nav-item mb-4"> 
                        <a class="nav-link" id="tab-6-4" data-toggle="tab" href="#work-6-4" role="tab" aria-controls="work-6-4" aria-selected="false">Work Days</a>
                      </li>
                      <li class="nav-item mb-4"> 
                        <a class="nav-link" id="tab-6-5" data-toggle="tab" href="#work-6-5" role="tab" aria-controls="work-6-5" aria-selected="false">Trip</a>
                      </li>
                      <li class="nav-item mb-4"> 
                        <a class="nav-link" id="tab-6-6" data-toggle="tab" href="#work-6-6" role="tab" aria-controls="work-6-6" aria-selected="false">Shift</a>
                      </li>
                      <li class="nav-item mb-4"> 
                        <a class="nav-link text-left" id="tab-6-7" data-toggle="tab" href="#work-6-7" role="tab" aria-controls="work-6-7" aria-selected="false">Machine Working Time</a>
                      </li>
                      <!-- <li class="nav-item mb-4"> 
                        <a class="nav-link" id="tab-6-8" data-toggle="tab" href="#work-6-8" role="tab" aria-controls="work-6-8" aria-selected="false">Jam Kerja</a>
                      </li> -->
                    </ul>
                    <div class="tab-content col-md-10">

                      <div class="tab-pane fade show active" id="home-6-1" role="tabpanel" aria-labelledby="tab-6-1">
                        <?php
                          // Load View Workdays
                          $this->load->view('setting/hr-setting-attendance');
                        ?>
                      </div>

                      <!-- <div class="tab-pane fade" id="profile-6-2" role="tabpanel" aria-labelledby="tab-6-2">
                        <div class="row">
                          Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
                        </div>
                      </div>
                      <div class="tab-pane fade" id="contact-6-3" role="tabpanel" aria-labelledby="tab-6-3">
                        <div class="row">
                          Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                        </div>
                      </div> -->
                      <div class="tab-pane fade" id="work-6-4" role="tabpanel" aria-labelledby="tab-6-4">
                        <?php
                          // Load View Workdays
                          $this->load->view('setting/hr-setting-workdays');
                        ?>
                      </div>
                      <div class="tab-pane fade" id="work-6-5" role="tabpanel" aria-labelledby="tab-6-5">
                        <?php
                          // Load View Trip
                          $this->load->view('setting/hr-setting-trip');
                        ?>
                      </div>
                      <div class="tab-pane fade" id="work-6-6" role="tabpanel" aria-labelledby="tab-6-6">
                        <?php
                          // Load View Shift
                          $this->load->view('setting/hr-setting-shift');
                        ?>
                      </div>
                      <div class="tab-pane fade" id="work-6-7" role="tabpanel" aria-labelledby="tab-6-7">
                        <?php
                          // Load View Machine
                          $this->load->view('setting/hr-setting-machine');
                        ?>
                      </div>
                      <div class="tab-pane fade" id="work-6-8" role="tabpanel" aria-labelledby="tab-6-8">
                        <div class="row">
                          Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                        </div>
                      </div>
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
  require_once(APPPATH."views/component/message.php");
?>
<script type="text/javascript">
  $('#tabledesignation').DataTable({
      "aLengthMenu": [
        [5, 10, 15, -1],
        [5, 10, 15, "All"]
      ],
      "iDisplayLength": 10,
      "language": {
        search: ""
      },
    });

    $('#start-picker').datetimepicker({
      format: 'LT'
    });

    $('#end-picker').datetimepicker({
      format: 'LT'
    });

    $('.start-workdays').datetimepicker({
      format: 'LT'
    });

    $('.end-workdays').datetimepicker({
      format: 'LT'
    });

    $('#start-trip').datetimepicker({
      format: 'LT'
    });

    $('#end-trip').datetimepicker({
      format: 'LT'
    });

    $('#start-shift').datetimepicker({
      format: 'LT'
    });

    $('#end-shift').datetimepicker({
      format: 'LT'
    });

    $('#start-machine').datetimepicker({
      format: 'LT'
    });

    $('#end-machine').datetimepicker({
      format: 'LT'
    });

    $(document).ready(()=>{
      $(".work-days").change(function(){
        let el = $(this);
        let id = el.attr("id");
        if(el.val()=="non")
        {
          $("#time-"+id).addClass("d-none");
        }else{
          $("#time-"+id).removeClass("d-none");
        }
      });
    });

  // $(document).ready(function() {
  //   $('#buttonModal').click(function() {
  //       $('html').css('overflow', 'hidden');
  //       $('body').bind('touchmove', function(e) {
  //           e.preventDefault()
  //       });
  //   });
  //   $('.btn-close').click(function() {
  //       $('html').css('overflow', 'scroll');
  //       $('body').unbind('touchmove');
  //   });
  // });

</script>
