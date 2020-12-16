<?php echo form_open('saveGrace'); ?>
<h4>GRACE TIME</h4>
<div class="row">
  <div class="col-md-6">
    <div class="form-group">
      <label for="before_check_in">Before Check-in</label>
      <input type="text" name="before_check_in" id="before_check_in" class="form-control" placeholder="Before Check In" value="<?php echo $gracetime->before_check_in; ?>" required />
      <i><p class="card-description text-danger" style="font-size: 13px; font">(in minute) this time will not counted as overtime</p></i>
    </div>
  </div>
  <div class="col-md-6">
    <div class="form-group">
      <label for="After_check_in">After Check-in</label>
      <input type="text" name="after_check_in" id="After_check_in" class="form-control" placeholder="After Check In" value="<?php echo $gracetime->after_check_in; ?>" required />
      <i><p class="card-description text-danger" style="font-size: 13px; font">(in minute) this time will not counted as late</p></i>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-6">
    <div class="form-group">
      <label for="before_check_out">Before Check-out</label>
      <input type="text" name="before_check_out" id="before_check_out" class="form-control" placeholder="Before Check Out" value="<?php echo $gracetime->before_check_out; ?>" required />
      <i><p class="card-description text-danger" style="font-size: 13px; font">(in minute) this time will not counted as early left</p></i>
    </div>
  </div>
  <div class="col-md-6">
    <div class="form-group">
      <label for="After_check_out">After Check-out</label>
      <input type="text" name="after_check_out" id="After_check_out" class="form-control" placeholder="After Check Out" value="<?php echo $gracetime->after_check_out; ?>" required />
      <i><p class="card-description text-danger" style="font-size: 13px; font">(in minute) this time will not counted as overtime</p></i>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-12">
    <div class="form-check form-check-flat">
      <label class="form-check-label"> <input type="checkbox" name="self_service" class="form-check-input" <?php if($gracetime->self_service=='yes'){ echo"checked";} ?> value="yes"> Enable self attendance services for employees? </label>
    </div>
  </div>
</div>
<div class="row mb-4">
  <div class="col-md-12">
    <div class="form-check form-check-flat">
      <label class="form-check-label"> <input type="checkbox" name="shift" class="form-check-input" <?php if($gracetime->shift=='yes'){echo"checked";} ?> value="yes"> Enable shift? </label>
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
  <button type="submit" class="btn btn-success float-left mt-4"><i class="mdi mdi-content-save mr-1"></i>Save Changes</button>
</div>
<?php echo form_close(); ?>
