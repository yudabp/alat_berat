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
              <h4 class="page-title">Product Setting</h4>
              <!-- <div class="d-flex align-items-center">
                <div class="wrapper mr-4 d-none d-sm-block">
                  <p class="mb-0">Summary for
                    <b class="mb-0"><i id="bulan"></i> <i id="tahun"></i></b>
                  </p>
                </div>
              </div> -->
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-body">
                  <div class="vertical-tab">
                    <ul class="nav nav-tabs tab-solid tab-solid-info mr-2 col-md-2" role="tablist">
                      <li class="nav-item mb-4">
                        <a class="nav-link active" id="tab-6-1" data-toggle="tab" href="#home-6-1" role="tab" aria-controls="home-6-1" aria-selected="true">Type</a>
                      </li>
                      <li class="nav-item mb-4"> 
                        <a class="nav-link" id="tab-6-4" data-toggle="tab" href="#work-6-4" role="tab" aria-controls="work-6-4" aria-selected="false">Brand</a>
                      </li>
                    </ul>
                    <div class="tab-content col-md-10">

                      <div class="tab-pane fade show active" id="home-6-1" role="tabpanel" aria-labelledby="tab-6-1">
                        <?php
                          // Load View Workdays
                          $this->load->view('product/ps-category');
                        ?>
                      </div>
                      <div class="tab-pane fade" id="work-6-4" role="tabpanel" aria-labelledby="tab-6-4">
                        <?php
                          // Load View Workdays
                          $this->load->view('product/ps-manufacture');
                        ?>
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
