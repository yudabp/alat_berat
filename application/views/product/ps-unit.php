<div class="row">
  <!-- <div class="row"> -->
  <div class="col-md-4">
    <h5>Add Unit</h5>
    <br />
    <form id="unit_form" method="POST" action="p-setting-unit_add">
      <input type="hidden" name="unit_id" id="unit_id" />
      <div class="form-group">
        <label for="unit_name">Unit Name</label>
        <input type="text" class="form-control" name="unit_name" id="unit_name" placeholder="Unit Name" required />
      </div>
      <br/>
      <div class="float-right">
        <button class="btn btn-inverse-success btn-primary" type="submit">Submit</button>
        <button class="btn btn-inverse-default btn-default" type="reset">Reset</button>
      </div>
    </form>
  </div>
  <div class="col-md-8">
    <div class="table responsive">
      <table class="table table-hover table-bordered table-striped" id="trip_table">
        <thead>
          <tr>
            <th>Unit Name</th>
            <!-- <th>Trip Start</th> -->
            <!-- <th>Trip End</th> -->
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php 
          foreach($units as $unit){
          ?>
          <tr>
            <td><?php echo $unit->unit_name ?></td>
            <td>
              <div class="dropdown">
                <button type="button" class="btn btn-icons btn-rounded text-center" data-toggle="dropdown">
                  <i class="ti-more-alt"></i>
                </button>
                <div class="dropdown-menu">
                  <button class="btn btn-link" onclick="edit_unit('<?php echo $unit->idunit; ?>')"><i class="fa fa-pencil"></i></button>
                  <button class="btn btn-link" onclick="del_unit('<?php echo $unit->idunit; ?>')"><i class="fa fa-trash-o"></i></button>
                </div>
              </div>
            </td>
          </tr>
          <?php }?>
        </tbody>
      </table>
    </div>
  </div>
  <!-- </div> -->
</div>