<div class="modal fade" id="formpass" tabindex="-1" role="dialog" aria-labelledby="formStaffLabel" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog modal-md" role="document" style="margin-top: 15px;margin-bottom: 0">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="formStaffLabel">Change Password</h5>
        <button type="button" class="close btn-close" data-dismiss="modal" aria-label="Close" id="btncancel">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="changepass" method="post" action="#" id="tambah" enctype="multipart/form-data">
      <div class="modal-body">
        <div class="row">

          <div class="col-md-12">
            <div class="card">
              <div class="card body">
                <div class="col-md-12 mt-4">

                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="nama_perusahaan">Old Password</label>
                        <div class="input-group">
                        <input type="password" name="old_pass" id="old_pass" class="form-control" placeholder="Old password" >
                        <span class="input-group-addon input-group-append border-left" style="cursor: pointer;" onclick="showoldpass()">
                          <span id="eye" class="fa fa-eye-slash input-group-text"></span>
                        </span>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="nama_perusahaan">New Password</label>
                        <div class="input-group">
                        <input type="password" name="new_pass" id="new_pass" class="form-control" placeholder="Old password" >
                        <span class="input-group-addon input-group-append border-left" style="cursor: pointer;" onclick="shownewpass()">
                          <span id="eye" class="fa fa-eye-slash input-group-text"></span>
                        </span>
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
      <div class="modal-footer">
        <button type="submit" class="btn btn-success" id="btnok">Change Password</button>
        <button type="button" class="btn btn-light btn-close" id="btncancel" data-dismiss="modal">Cancel</button>
      </div>
      </form>
    </div>
  </div>
</div>


<div class="modal fade" id="formuser" tabindex="-1" role="dialog" aria-labelledby="formStaffLabel" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog modal-md" role="document" style="margin-top: 15px;margin-bottom: 0">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="formStaffLabel">Change Password</h5>
        <button type="button" class="close btn-close" data-dismiss="modal" aria-label="Close" id="btncancel">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="changeuser" method="post" action="#" id="tambah" enctype="multipart/form-data">
      <div class="modal-body">
        <div class="row">

          <div class="col-md-12">
            <div class="card">
              <div class="card body">
                <div class="col-md-12 mt-4">

                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="nama_perusahaan">Old Username</label>
                        <input type="text" name="old_user" id="old_user" class="form-control" placeholder="Old  username" >
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="nama_perusahaan">New Username</label>
                        <input type="text" name="new_user" id="new_user" class="form-control" placeholder="New username" >
                      </div>
                    </div>
                  </div>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-success" id="btnok">Change Username</button>
        <button type="button" class="btn btn-light btn-close" id="btncancel" data-dismiss="modal">Cancel</button>
      </div>
      </form>
    </div>
  </div>
</div>
