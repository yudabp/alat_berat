<?php
	$this->load->view('template/head');
 ?>
<?php
  $url_1 = $this->uri->segment(1);
  $url_2 = $this->uri->segment(2);
?>
<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth auth-bg-1 theme-one">
        <div class="row w-100 mx-auto">
          <div class="col-lg-4 mx-auto">
            <div class="auto-form-wrapper">
            <?php if ($url_1 == "" || $url_1 == "login") { ?>
              <?php echo form_open_multipart('prolog'); ?>
                <div class="form-group">
                  <label class="label">Username</label>
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Username" name="username" required value="<?php echo get_cookie('uname');?>">
                    <div class="input-group-append">
                      <span class="input-group-text">
                        <i class="mdi mdi-check-circle-outline"></i>
                      </span>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label class="label">Password</label>
                  <div class="input-group">
                    <input type="password" class="form-control" placeholder="*********" name="password" required value="<?php echo get_cookie('upass');?>">
                    <div class="input-group-append">
                      <span class="input-group-text">
                        <i class="mdi mdi-check-circle-outline"></i>
                      </span>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <button class="btn btn-primary submit-btn btn-block">Login</button>
                </div>
                <div class="form-group d-flex justify-content-between">
                  <!-- <div class="form-check form-check-flat mt-0">
                    <label class="form-check-label">
                      <input type="checkbox" class="form-check-input" checked name="remember"> remember me
                    </label>
                  </div> -->
                  <a href="#" class="text-small forgot-password text-black">Forgot Password</a>
                </div>
                <!-- <div class="form-group">
                  <button class="btn btn-block g-login">
                    <img class="mr-3" src="../../images/file-icons/icon-google.svg" alt="">Log in with Google</button>
                </div> -->
                <!-- <div class="text-block text-center my-3">
                  <span class="text-small font-weight-semibold">Not a member ?</span>
                  <a href="register.html" class="text-black text-small">Create new account</a>
                </div> -->
              <?php echo form_close(); ?>
            <?php }elseif ($url_1 == "su") { ?>
            	<?php echo form_open_multipart('prosu'); ?>
            	<h4>Super Admin</h4>
            	<hr>
                <div class="form-group">
                  <label class="label">Username</label>
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Username" name="username" required value="<?php echo get_cookie('uname');?>">
                    <div class="input-group-append">
                      <span class="input-group-text">
                        <i class="mdi mdi-check-circle-outline"></i>
                      </span>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label class="label">Password</label>
                  <div class="input-group">
                    <input type="password" class="form-control" placeholder="*********" name="password" required value="<?php echo get_cookie('upass');?>">
                    <div class="input-group-append">
                      <span class="input-group-text">
                        <i class="mdi mdi-check-circle-outline"></i>
                      </span>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <button class="btn btn-primary submit-btn btn-block">Login</button>
                </div>
                <!-- <div class="form-group d-flex justify-content-between"> -->
                  <!-- <div class="form-check form-check-flat mt-0">
                    <label class="form-check-label">
                      <input type="checkbox" class="form-check-input" checked name="remember"> remember me
                    </label>
                  </div> -->
                  <!-- <a href="#" class="text-small forgot-password text-black">Forgot Password</a>
                </div> -->
                <!-- <div class="form-group">
                  <button class="btn btn-block g-login">
                    <img class="mr-3" src="../../images/file-icons/icon-google.svg" alt="">Log in with Google</button>
                </div> -->
                <!-- <div class="text-block text-center my-3">
                  <span class="text-small font-weight-semibold">Not a member ?</span>
                  <a href="register.html" class="text-black text-small">Create new account</a>
                </div> -->
              <?php echo form_close(); ?>
            <?php } ?>
            </div>
            <ul class="auth-footer">
             <!--  <li>
                <a href="#">Conditions</a>
              </li>
              <li>
                <a href="#">Help</a>
              </li>
              <li>
                <a href="#">Terms</a>
              </li> -->
            </ul>
            <p class="footer-text text-center"><span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © <script>document.write(new Date().getFullYear())</script>
              <a href="https://n56ht.com/" target="_blank">InSight MarkComm</a>. All rights reserved.</span></p>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
<?php
	$this->load->view('template/js');
	require_once(APPPATH."views/component/message.php");
  ?>
