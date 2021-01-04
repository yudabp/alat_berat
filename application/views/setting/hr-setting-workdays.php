<form class="form" method="post" action="<?php echo base_url(); ?>uptWork" id="tambah" enctype="multipart/form-data">
  <!-- MONDAY -->
    <div class="row" style="background-color:#f5f5f5;padding-top:20px;">
      <div class="col-md-6">
        <div class="row">
          <label class="col-sm-3 col-form-label">Monday</label>
          <div class="col-sm-9">
            <div class="form-group">
              <select class="form-control work-days" id="monday" name="monday">
                <option selected="selected" disabled="disabled"> - Select - </option>
                <option value="full" <?php if($workdays->mon=="full"){echo"selected";} ?>>Full Day</option>
                <option value="half" <?php if($workdays->mon=="half"){echo"selected";} ?>>Half Day</option>
                <option value="non" <?php if($workdays->mon=="non"){echo"selected";} ?>>Not-Working Day</option>
              </select>
            </div>
            <div class="row <?php if($workdays->mon=="non"){echo"d-none";} ?>" id="time-monday">
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="start-trip">Start</label>
                  <div class="input-group date start-workdays" id="start-monday" data-target-input="nearest">
                    <div class="input-group" data-target="#start-monday" data-toggle="datetimepicker">
                      <input type="text" name="monday_start" id="monday_start" class="form-control datetimepicker-input" data-target="#start-monday" value="<?php echo $workdays->mon_start; ?>" />
                      <div class="input-group-addon input-group-append">
                        <i class="mdi mdi-clock input-group-text"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="end-trip">End</label>
                  <div class="input-group date end-workdays" id="end-monday" data-target-input="nearest">
                    <div class="input-group" data-target="#end-monday" data-toggle="datetimepicker">
                      <input type="text" name="monday_end" id="monday_end" class="form-control datetimepicker-input" data-target="#end-monday" value="<?php echo $workdays->mon_end; ?>" />
                      <div class="input-group-addon input-group-append">
                        <i class="mdi mdi-clock input-group-text"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  <!-- END MONDAY -->

  <!-- TUESDAY -->
    <div class="row" style="background-color:#fff;padding-top:20px;">
      <div class="col-md-6">
        <div class="row">
          <label class="col-sm-3 col-form-label">Tuesday</label>
          <div class="col-sm-9">
            <div class="form-group">
              <select class="form-control work-days" id="tuesday" name="tuesday">
                <option selected="selected" disabled="disabled"> - Select - </option>
                <option value="full" <?php if($workdays->tue=="full"){echo"selected";} ?>>Full Day</option>
                <option value="half" <?php if($workdays->tue=="half"){echo"selected";} ?>>Half Day</option>
                <option value="non" <?php if($workdays->tue=="non"){echo"selected";} ?>>Not-Working Day</option>
              </select>
            </div>
            <div class="row <?php if($workdays->tue=="non"){echo"d-none";} ?>" id="time-tuesday">
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="start-trip">Start</label>
                  <div class="input-group date start-workdays" id="start-tuesday" data-target-input="nearest">
                    <div class="input-group" data-target="#start-tuesday" data-toggle="datetimepicker">
                      <input type="text" name="tuesday_start" id="tuesday_start" class="form-control datetimepicker-input" data-target="#start-tuesday" value="<?php echo $workdays->tue_start; ?>" />
                      <div class="input-group-addon input-group-append">
                        <i class="mdi mdi-clock input-group-text"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="end-trip">End</label>
                  <div class="input-group date end-workdays" id="end-tuesday" data-target-input="nearest">
                    <div class="input-group" data-target="#end-tuesday" data-toggle="datetimepicker">
                      <input type="text" name="tuesday_end" id="tuesday_end" class="form-control datetimepicker-input" data-target="#end-tuesday" value="<?php echo $workdays->tue_end; ?>" />
                      <div class="input-group-addon input-group-append">
                        <i class="mdi mdi-clock input-group-text"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  <!-- END TUESDAY -->

  <!-- WEDNESDAY -->
    <div class="row" style="background-color:#f5f5f5;padding-top:20px;">
      <div class="col-md-6">
        <div class="row">
          <label class="col-sm-3 col-form-label">Wednesday</label>
          <div class="col-sm-9">
            <div class="form-group">
              <select class="form-control work-days" id="wednesday" name="wednesday">
                <option selected="selected" disabled="disabled"> - Select - </option>
                <option value="full" <?php if($workdays->wed=="full"){echo"selected";} ?>>Full Day</option>
                <option value="half" <?php if($workdays->wed=="half"){echo"selected";} ?>>Half Day</option>
                <option value="non" <?php if($workdays->wed=="non"){echo"selected";} ?>>Not-Working Day</option>
              </select>
            </div>
            <div class="row <?php if($workdays->wed=="non"){echo"d-none";} ?>" id="time-wednesday">
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="start-trip">Start</label>
                  <div class="input-group date start-workdays" id="start-wednesday" data-target-input="nearest">
                    <div class="input-group" data-target="#start-wednesday" data-toggle="datetimepicker">
                      <input type="text" name="wednesday_start" id="wednesday_start" class="form-control datetimepicker-input" data-target="#start-wednesday" value="<?php echo $workdays->wed_start; ?>" />
                      <div class="input-group-addon input-group-append">
                        <i class="mdi mdi-clock input-group-text"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="end-trip">End</label>
                  <div class="input-group date end-workdays" id="end-wednesday" data-target-input="nearest">
                    <div class="input-group" data-target="#end-wednesday" data-toggle="datetimepicker">
                      <input type="text" name="wednesday_end" id="wednesday_end" class="form-control datetimepicker-input" data-target="#end-wednesday" value="<?php echo $workdays->wed_end; ?>" />
                      <div class="input-group-addon input-group-append">
                        <i class="mdi mdi-clock input-group-text"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  <!-- END WEDNESDAY -->

  <!-- THURSDAY -->
    <div class="row" style="background-color:#fff;padding-top:20px;">
      <div class="col-md-6">
        <div class="row">
          <label class="col-sm-3 col-form-label">Thursday</label>
          <div class="col-sm-9">
            <div class="form-group">
              <select class="form-control work-days" id="thursday" name="thursday">
                <option selected="selected" disabled="disabled"> - Select - </option>
                <option value="full" <?php if($workdays->thu=="full"){echo"selected";} ?>>Full Day</option>
                <option value="half" <?php if($workdays->thu=="half"){echo"selected";} ?>>Half Day</option>
                <option value="non" <?php if($workdays->thu=="non"){echo"selected";} ?>>Not-Working Day</option>
              </select>
            </div>
            <div class="row <?php if($workdays->thu=="non"){echo"d-none";} ?>" id="time-thursday">
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="start-trip">Start</label>
                  <div class="input-group date start-workdays" id="start-thursday" data-target-input="nearest">
                    <div class="input-group" data-target="#start-thursday" data-toggle="datetimepicker">
                      <input type="text" name="thursday_start" id="thursday_start" class="form-control datetimepicker-input" data-target="#start-thursday" value="<?php echo $workdays->thu_start; ?>" />
                      <div class="input-group-addon input-group-append">
                        <i class="mdi mdi-clock input-group-text"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="end-thursday">End</label>
                  <div class="input-group date end-workdays" id="end-thursday" data-target-input="nearest">
                    <div class="input-group" data-target="#end-thursday" data-toggle="datetimepicker">
                      <input type="text" name="thursday_end" id="thursday_end" class="form-control datetimepicker-input" data-target="#end-thursday" value="<?php echo $workdays->thu_end; ?>" />
                      <div class="input-group-addon input-group-append">
                        <i class="mdi mdi-clock input-group-text"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  <!-- END THURSDAY -->

  <!-- FRIDAY -->
    <div class="row" style="background-color:#f5f5f5;padding-top:20px;">
      <div class="col-md-6">
        <div class="row">
          <label class="col-sm-3 col-form-label">Friday</label>
          <div class="col-sm-9">
            <div class="form-group">
              <select class="form-control work-days" id="friday" name="friday">
                <option selected="selected" disabled="disabled"> - Select - </option>
                <option value="full" <?php if($workdays->fri=="full"){echo"selected";} ?>>Full Day</option>
                <option value="half" <?php if($workdays->fri=="half"){echo"selected";} ?>>Half Day</option>
                <option value="non" <?php if($workdays->fri=="non"){echo"selected";} ?>>Not-Working Day</option>
              </select>
            </div>
            <div class="row <?php if($workdays->fri=="non"){echo"d-none";} ?>" id="time-friday">
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="start-friday">Start</label>
                  <div class="input-group date start-workdays" id="start-friday" data-target-input="nearest">
                    <div class="input-group" data-target="#start-friday" data-toggle="datetimepicker">
                      <input type="text" name="friday_start" id="friday_start" class="form-control datetimepicker-input" data-target="#start-friday" value="<?php echo $workdays->fri_start; ?>" />
                      <div class="input-group-addon input-group-append">
                        <i class="mdi mdi-clock input-group-text"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="end-friday">End</label>
                  <div class="input-group date end-workdays" id="end-friday" data-target-input="nearest">
                    <div class="input-group" data-target="#end-friday" data-toggle="datetimepicker">
                      <input type="text" name="friday_end" id="friday_end" class="form-control datetimepicker-input" data-target="#end-friday" value="<?php echo $workdays->fri_end; ?>" />
                      <div class="input-group-addon input-group-append">
                        <i class="mdi mdi-clock input-group-text"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  <!-- END FRIDAY -->

  <!-- SATURDAY -->
    <div class="row" style="background-color:#fff;padding-top:20px;">
      <div class="col-md-6">
        <div class="row">
          <label class="col-sm-3 col-form-label">Saturday</label>
          <div class="col-sm-9">
            <div class="form-group">
              <select class="form-control work-days" id="saturday" name="saturday">
                <option selected="selected" disabled="disabled"> - Select - </option>
                <option value="full" <?php if($workdays->sat=="full"){echo"selected";} ?>>Full Day</option>
                <option value="half" <?php if($workdays->sat=="half"){echo"selected";} ?>>Half Day</option>
                <option value="non" <?php if($workdays->sat=="non"){echo"selected";} ?>>Not-Working Day</option>
              </select>
            </div>
            <div class="row <?php if($workdays->sat=="non"){echo"d-none";} ?>" id="time-saturday">
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="start-saturday">Start</label>
                  <div class="input-group date start-workdays" id="start-saturday" data-target-input="nearest">
                    <div class="input-group" data-target="#start-saturday" data-toggle="datetimepicker">
                      <input type="text" name="saturday_start" id="saturday_start" class="form-control datetimepicker-input" data-target="#start-saturday" value="<?php echo $workdays->sat_start; ?>" />
                      <div class="input-group-addon input-group-append">
                        <i class="mdi mdi-clock input-group-text"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="end-saturday">End</label>
                  <div class="input-group date end-workdays" id="end-saturday" data-target-input="nearest">
                    <div class="input-group" data-target="#end-saturday" data-toggle="datetimepicker">
                      <input type="text" name="saturday_end" id="saturday_end" class="form-control datetimepicker-input" data-target="#end-saturday" value="<?php echo $workdays->sat_end; ?>" />
                      <div class="input-group-addon input-group-append">
                        <i class="mdi mdi-clock input-group-text"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  <!-- END SATURDAY -->

  <!-- SUNDAY -->
    <div class="row" style="background-color:#f5f5f5;padding-top:20px;">
      <div class="col-md-6">
        <div class="row">
          <label class="col-sm-3 col-form-label">Sunday</label>
          <div class="col-sm-9">
            <div class="form-group">
              <select class="form-control work-days" id="sunday" name="sunday">
                <option selected="selected" disabled="disabled"> - Select - </option>
                <option value="full" <?php if($workdays->sun=="full"){echo"selected";} ?>>Full Day</option>
                <option value="half" <?php if($workdays->sun=="half"){echo"selected";} ?>>Half Day</option>
                <option value="non" <?php if($workdays->sun=="non"){echo"selected";} ?>>Not-Working Day</option>
              </select>
            </div>
            <div class="row <?php if($workdays->sun=="non"){echo"d-none";} ?>" id="time-sunday">
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="start-sunday">Start</label>
                  <div class="input-group date start-workdays" id="start-sunday" data-target-input="nearest">
                    <div class="input-group" data-target="#start-sunday" data-toggle="datetimepicker">
                      <input type="text" name="sunday_start" id="sunday_start" class="form-control datetimepicker-input" data-target="#start-sunday" value="<?php echo $workdays->sun_start; ?>" />
                      <div class="input-group-addon input-group-append">
                        <i class="mdi mdi-clock input-group-text"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="end-sunday">End</label>
                  <div class="input-group date end-workdays" id="end-sunday" data-target-input="nearest">
                    <div class="input-group" data-target="#end-sunday" data-toggle="datetimepicker">
                      <input type="text" name="sunday_end" id="sunday_end" class="form-control datetimepicker-input" data-target="#end-sunday" value="<?php echo $workdays->sun_end; ?>" />
                      <div class="input-group-addon input-group-append">
                        <i class="mdi mdi-clock input-group-text"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  <!-- END SUNDAY -->
  <div class="row">
    <button type="submit" class="btn btn-success float-left mt-4"><i class="mdi mdi-content-save mr-1"></i>Save Changes</button>
  </div>
</form>