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
                      <li class="nav-item mb-4">
                        <a class="nav-link" id="tab-6-2" data-toggle="tab" href="#profile-6-2" role="tab" aria-controls="profile-6-2" aria-selected="false">Company</a>
                      </li>
                      <li class="nav-item mb-4">
                        <a class="nav-link" id="tab-6-3" data-toggle="tab" href="#contact-6-3" role="tab" aria-controls="contact-6-3" aria-selected="false">Payroll</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="tab-6-4" data-toggle="tab" href="#work-6-4" role="tab" aria-controls="work-6-4" aria-selected="false">Work Days</a>
                      </li>
                    </ul>
                    <div class="tab-content col-md-10">

                      <div class="tab-pane fade show active" id="home-6-1" role="tabpanel" aria-labelledby="tab-6-1">
                        <?php echo form_open('saveGrace'); ?>
                        <h4>GRACE TIME</h4>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="before_check_in">Before Check-in</label>
                              <input type="text" name="before_check_in" id="before_check_in" class="form-control" placeholder="Before Check In" value="<?php echo $gracetime->before_check_in; ?>" required>
                              <i><p class="card-description text-danger" style="font-size: 13px; font">(in minute) this time will not counted as overtime</p></i>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="After_check_in">After Check-in</label>
                              <input type="text" name="after_check_in" id="After_check_in" class="form-control" placeholder="After Check In" value="<?php echo $gracetime->after_check_in; ?>" required>
                              <i><p class="card-description text-danger" style="font-size: 13px; font">(in minute) this time will not counted as late</p></i>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="before_check_out">Before Check-out</label>
                              <input type="text" name="before_check_out" id="before_check_out" class="form-control" placeholder="Before Check Out" value="<?php echo $gracetime->before_check_out; ?>" required>
                              <i><p class="card-description text-danger" style="font-size: 13px; font">(in minute) this time will not counted as early left</p></i>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="After_check_out">After Check-out</label>
                              <input type="text" name="after_check_out" id="After_check_out" class="form-control" placeholder="After Check Out" value="<?php echo $gracetime->after_check_out; ?>" required>
                              <i><p class="card-description text-danger" style="font-size: 13px; font">(in minute) this time will not counted as overtime</p></i>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-12">
                            <div class="form-check form-check-flat">
                              <label class="form-check-label">
                                <input type="checkbox" name="self_service" class="form-check-input" <?php if($gracetime->self_service=='yes'){ echo"checked";} ?> value="yes"> Enable self attendance services for employees?
                              </label>
                            </div>
                          </div>
                        </div>
                        <div class="row mb-4">
                          <div class="col-md-12">
                            <div class="form-check form-check-flat">
                              <label class="form-check-label">
                                <input type="checkbox" name="shift" class="form-check-input" <?php if($gracetime->shift=='yes'){echo"checked";} ?> value="yes"> Enable shift?
                              </label>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="office_starts">Office Starts</label>
                              <!-- <input type="text" name="office_starts" id="office_starts" class="form-control" placeholder="Office Starts"> -->
                              <div class="input-group date" id="start-picker" data-target-input="nearest">
                                <div class="input-group" data-target="#start-picker" data-toggle="datetimepicker">
                                  <input type="text" name="office_start" id="office_starts" class="form-control datetimepicker-input" data-target="#start-picker" value="<?php echo $gracetime->office_start; ?>" />
                                  <div class="input-group-addon input-group-append">
                                    <i class="mdi mdi-clock input-group-text"></i>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="office_ends">Office Ends</label>
                              <!-- <input type="text" name="office_ends" id="office_ends" class="form-control" placeholder="Office Ends"> -->
                              <div class="input-group date" id="end-picker" data-target-input="nearest">
                                <div class="input-group" data-target="#end-picker" data-toggle="datetimepicker">
                                  <input type="text" name="office_end" id="office_starts" class="form-control datetimepicker-input" data-target="#end-picker" value="<?php echo $gracetime->office_end; ?>" />
                                  <div class="input-group-addon input-group-append">
                                    <i class="mdi mdi-clock input-group-text"></i>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <button type="submit" class="btn btn-success float-left mt-4">
                          <i class="mdi mdi-content-save mr-1"></i>Save Changes</button>
                        </div>
                        <?php echo form_close(); ?>
                      </div>

                      <div class="tab-pane fade" id="profile-6-2" role="tabpanel" aria-labelledby="tab-6-2">
                        <div class="row">
                          Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
                        </div>
                      </div>
                      <div class="tab-pane fade" id="contact-6-3" role="tabpanel" aria-labelledby="tab-6-3">
                        <div class="row">
                          Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                        </div>
                      </div>
                      <div class="tab-pane fade" id="work-6-4" role="tabpanel" aria-labelledby="tab-6-4">
                        <form class="form" method="post" action="<?php echo base_url(); ?>uptWork" id="tambah" enctype="multipart/form-data">
                                <div class="row">
                                  <div class="col-md-6">
                                    <div class="row">
                                      <label class="col-sm-3 col-form-label">Monday</label>
                                      <div class="col-sm-9">
                                        <div class="form-group">
                                        <select class="form-control" id="monday" name="monday">
                                          <option selected="selected" disabled="disabled"> - Select - </option>
                                          <option value="full" <?php if($work->mon=="full"){echo"selected";} ?>>Full Day</option>
                                          <option value="half" <?php if($work->mon=="half"){echo"selected";} ?>>Half Day</option>
                                          <option value="non" <?php if($work->mon=="non"){echo"selected";} ?>>Not-Working Day</option>
                                        </select>
                                      </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-md-6">
                                    <div class="row">
                                      <label class="col-sm-3 col-form-label">Tuesday</label>
                                      <div class="col-sm-9">
                                        <div class="form-group">
                                        <select class="form-control" id="tuesday" name="tuesday">
                                          <option selected="selected" disabled="disabled"> - Select - </option>
                                          <option value="full" <?php if($work->tue=="full"){echo"selected";} ?>>Full Day</option>
                                          <option value="half" <?php if($work->tue=="half"){echo"selected";} ?>>Half Day</option>
                                          <option value="non" <?php if($work->tue=="non"){echo"selected";} ?>>Not-Working Day</option>
                                        </select>
                                      </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-md-6">
                                    <div class="row">
                                      <label class="col-sm-3 col-form-label">Wednesday</label>
                                      <div class="col-sm-9">
                                        <div class="form-group">
                                        <select class="form-control" id="wednesday" name="wednesday">
                                          <option selected="selected" disabled="disabled"> - Select - </option>
                                          <option value="full" <?php if($work->wed=="full"){echo"selected";} ?>>Full Day</option>
                                          <option value="half" <?php if($work->wed=="half"){echo"selected";} ?>>Half Day</option>
                                          <option value="non" <?php if($work->wed=="non"){echo"selected";} ?>>Not-Working Day</option>
                                        </select>
                                      </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-md-6">
                                    <div class="row">
                                      <label class="col-sm-3 col-form-label">Thursday</label>
                                      <div class="col-sm-9">
                                        <div class="form-group">
                                        <select class="form-control" id="thursday" name="thursday">
                                          <option selected="selected" disabled="disabled"> - Select - </option>
                                          <option value="full" <?php if($work->thu=="full"){echo"selected";} ?>>Full Day</option>
                                          <option value="half" <?php if($work->thu=="half"){echo"selected";} ?>>Half Day</option>
                                          <option value="non" <?php if($work->thu=="non"){echo"selected";} ?>>Not-Working Day</option>
                                        </select>
                                      </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-md-6">
                                    <div class="row">
                                      <label class="col-sm-3 col-form-label">Friday</label>
                                      <div class="col-sm-9">
                                        <div class="form-group">
                                        <select class="form-control" id="friday" name="friday">
                                          <option selected="selected" disabled="disabled"> - Select - </option>
                                          <option value="full" <?php if($work->fri=="full"){echo"selected";} ?>>Full Day</option>
                                          <option value="half" <?php if($work->fri=="half"){echo"selected";} ?>>Half Day</option>
                                          <option value="non" <?php if($work->fri=="non"){echo"selected";} ?>>Not-Working Day</option>
                                        </select>
                                      </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-md-6">
                                    <div class="row">
                                      <label class="col-sm-3 col-form-label">Saturday</label>
                                      <div class="col-sm-9">
                                        <div class="form-group">
                                        <select class="form-control" id="saturday" name="saturday">
                                          <option selected="selected" disabled="disabled"> - Select - </option>
                                          <option value="full" <?php if($work->sat=="full"){echo"selected";} ?>>Full Day</option>
                                          <option value="half" <?php if($work->sat=="half"){echo"selected";} ?>>Half Day</option>
                                          <option value="non" <?php if($work->sat=="non"){echo"selected";} ?>>Not-Working Day</option>
                                        </select>
                                      </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-md-6">
                                    <div class="row">
                                      <label class="col-sm-3 col-form-label">Sunday</label>
                                      <div class="col-sm-9">
                                        <div class="form-group">
                                        <select class="form-control" id="sunday" name="sunday">
                                          <option selected="selected" disabled="disabled"> - Select - </option>
                                          <option value="full" <?php if($work->sun=="full"){echo"selected";} ?>>Full Day</option>
                                          <option value="half" <?php if($work->sun=="half"){echo"selected";} ?>>Half Day</option>
                                          <option value="non" <?php if($work->sun=="non"){echo"selected";} ?>>Not-Working Day</option>
                                        </select>
                                      </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="row">
                                  <button type="submit" class="btn btn-success float-left mt-4">
                                  <i class="mdi mdi-content-save mr-1"></i>Save Changes</button>
                                </div>
                        </form>
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
