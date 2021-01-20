<div class="row">
  <!-- <div class="row"> -->
  <div class="col-md-4">
    <h5>Add Type</h5>
    <br />
    <form id="type_form" method="POST" action="p-setting-type_add">
      <input type="hidden" name="type_id" id="type_id" />
      <div class="form-group">
        <label for="type_name">Type Name</label>
        <input type="text" class="form-control" name="type_name" id="type_name" placeholder="Type Name" required />
      </div>
      <!-- <div class="row">
      	<div class="col-md-6">
      		<div class="form-check">
                <label class="form-check-label">
                	<input type="checkbox" class="form-check-input"> Chassis Number
                    <i class="input-helper"></i>
                </label>
            </div>
      	</div>
      	<div class="col-md-6">
      		<div class="form-check">
                <label class="form-check-label">
                	<input type="checkbox" class="form-check-input"> Vehicle ID
                    <i class="input-helper"></i>
                </label>
            </div>
      	</div>
      </div> -->
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
            <th>Type Name</th>
            <!-- <th>Trip Start</th> -->
            <!-- <th>Trip End</th> -->
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php 
          foreach($types as $type){
          ?>
          <tr>
            <td><?php echo $type->type_name ?></td>
            <td>
              <div class="dropdown">
                <button type="button" class="btn btn-icons btn-rounded text-center" data-toggle="dropdown">
                  <i class="ti-more-alt"></i>
                </button>
                <div class="dropdown-menu">
                  <button class="btn btn-link" onclick="edit_type('<?php echo $type->idtype; ?>')"><i class="fa fa-pencil"></i></button>
                  <button class="btn btn-link" onclick="del_type('<?php echo $type->idtype; ?>')"><i class="fa fa-trash-o"></i></button>
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