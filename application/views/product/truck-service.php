<div class="modal fade" id="formService" tabindex="-1" role="dialog" aria-labelledby="formServiceLabel" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog" role="document" style="margin-top: 15px;margin-bottom: 0">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="formServiceLabel">Service Truck</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="saveTruckService form" method="post" action="#" id="tambah" enctype="multipart/form-data">
      <div class="modal-body">
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="service_date">Date</label>
              <div class="input-group date datepicker">
                <input type="text" id="service_date" name="service_date" class="form-control" >
                <span class="input-group-addon input-group-append border-left">
                  <span class="mdi mdi-calendar input-group-text"></span>
                </span>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="service_type">Type of Service</label>
              <select name="service_type" id="type_service" class="select2 single-select form-control services" style="width:100%;">
                <option disabled="" selected="">-- Type of Service --</option>
                <option value="Service">Service</option>
                <option value="Repair">Repair</option>
              </select>
            </div>
          </div>
        </div>
        <hr/>
        <!-- service -->
        <div class="row d-none service-type_service">
          <div class="col-md-12">
            <div class="form-group">
              <label for="driver_note">Driver's Note</label>
              <textarea name="driver_note" id="driver_note" class="form-control form-control-lg" placeholder="Driver's Note"></textarea>
            </div>
          </div>
        </div>
        <!-- <div class="row d-none service-type_service">
          <div class="col-md-12">
            <div class="form-group">
              <label for="action">Action</label>
              <div id="p_action" data="1">
                <div class="p_action1">

                  <div class="row" id="selected_action">
                    <div class="col-md-10" >
                      <input type="text" class="form-control" rows="2" id="action" name="action[]" style="width: 100%;">
                    </div>
                    <div class="col-md-2">
                      <button type="button" onclick="addAction()" id="btnselect" class="btn btn-info btn-sm icon-btn mb-2" style="width:100% !important"><i class="mdi mdi-plus" style="margin:0"></i></button>
                    </div>
                  </div>

                </div>
                <div id="ulang" data="1"></div>
              </div>

            </div>
          </div>
        </div>
        <div class="row d-none service-type_service">
          <div class="col-md-12">
            <div class="form-group">
              <label for="mechanic_note">Mechanic's Note</label>
              <textarea name="mechanic_note" id="mechanic_note" class="form-control form-control-lg" placeholder="Mechanic's Note"></textarea>
            </div>
          </div>
        </div> -->
        <!-- end service -->
        <!-- repair -->
        <!-- <div class="row d-none repair-type_service">
          <div class="col-md-12">
            <div class="form-group">
              <label for="description">Description</label>
              <textarea name="description" id="description" class="form-control form-control-lg" placeholder="Description"></textarea>
            </div>
          </div>
        </div>
        <div class="row d-none repair-type_service">
          <div class="col-md-12">
            <div class="form-group">
              <label for="action">Action</label>
              <div id="p_action" data="1">
                <div class="p_action1">

                  <div class="row" id="selected_action">
                    <div class="col-md-10" >
                      <input type="text" class="form-control" rows="2" id="action" name="action[]" style="width: 100%;">
                    </div>
                    <div class="col-md-2">
                      <button type="button" id="btnselect" class="btn btn-info btn-sm icon-btn ml-4 mb-2"><i class="mdi mdi-plus"></i></button>
                    </div>
                  </div>

                </div>
                <div id="ulang" data="1"></div>
              </div>

            </div>
          </div>
        </div>
        <div class="row d-none repair-type_service">
          <div class="col-md-12">
            <div class="form-group">
              <label for="mechanic_note">Mechanic's Note</label>
              <textarea name="mechanic_note" id="mechanic_note" class="form-control form-control-lg" placeholder="Mechanic's Note"></textarea>
            </div>
          </div>
        </div> -->
        <!-- end repair -->
      </div>
      <div class="modal-footer">
        <input type="hidden" name="idtruck" id="idtruck" value="<?= $truck->idtruck ?>">
        <input type="hidden" name="idservice" id="idservice">
        <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-success" id="btnsave">Save</button>
        <!-- <button type="button" class="btn btn-primary" id="btndone">Done</button> -->
      </div>
    </form>
    </div>
  </div>
</div>