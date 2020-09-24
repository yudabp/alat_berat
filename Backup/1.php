<!DOCTYPE html>
<html lang="en">
<!-- Develoved By Yuda Budi Pratama -->
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>HRIS System</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="http://beta.xavaxx.com/assets/chroma/vendors/iconfonts/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="http://beta.xavaxx.com/assets/chroma/vendors/iconfonts/flag-icon-css/css/flag-icon.min.css">
  <link rel="stylesheet" href="http://beta.xavaxx.com/assets/chroma/vendors/iconfonts/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="http://beta.xavaxx.com/assets/chroma/vendors/iconfonts/simple-line-icon/css/simple-line-icons.css">
  <link rel="stylesheet" href="http://beta.xavaxx.com/assets/chroma/vendors/iconfonts/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="http://beta.xavaxx.com/assets/chroma/vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="http://beta.xavaxx.com/assets/chroma/vendors/css/vendor.bundle.addons.css">
  <link rel="stylesheet" href="http://beta.xavaxx.com/assets/chroma/vendors/sweetalert/sweetalert.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="http://beta.xavaxx.com/assets/chroma/css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="http://beta.xavaxx.com/assets/chroma/images/favicon.png" />
</head>
<body style="background: #F2F6F9;" class="sidebar-fixed" id="body_id">
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
<style type="text/css">

  /*.sidebar .logo, .card.card-stats .card-header .card-category, .card-title h4, .navbar .navbar-brand, .card .card-title, thead{
        font-family: 'Montserrat', sans-serif !important;
    }
  .sidebar .nav, .card .card-footer .stats, .card.card-stats .card-header .card-title, tbody, .footer .copyright{
        font-family: 'Play', sans-serif !important;
    }*/
  .modal-content, .content-wrapper{
    background: #F9FBFC;
  }
  .dataTables_wrapper .dataTable .btn-icons{
    padding: 0.1rem 0.1rem;
  }
  .fa-pencil{
    color: #00DA90;
  }
  .fa-trash-o{
    color: #FB0000;
  }
  .btn-link{
    /*background: #ECECEC;*/
    width: 45px;
  }
  .dropdown-menu {
    min-width: 6rem;
  }
</style>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
        <a class="navbar-brand brand-logo" href="http://beta.xavaxx.com/">
          <img src="http://beta.xavaxx.com/assets/chroma/images/logo.svg" alt="logo" />
        </a>
        <a class="navbar-brand brand-logo-mini" href="http://beta.xavaxx.com/">
          <img src="http://beta.xavaxx.com/assets/chroma/images/logo-mini.svg" alt="logo" />
        </a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" onclick="sidebar_icon()">
          <span class="mdi mdi-menu"></span>
        </button>
        <!-- <ul class="navbar-nav d-none d-md-block">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="LanguageDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
              <i class="flag-icon flag-icon-us"></i>
              English
            </a>
            <div class="dropdown-menu navbar-dropdown pb-0" aria-labelledby="LanguageDropdown">
              <a class="dropdown-item preview-item px-3 py-0">
                <div class="preview-thumbnail">
                  <div class="preview-icon">
                    <i class="flag-icon flag-icon-cn"></i>
                  </div>
                </div>
                <div class="preview-item-content">
                  <p class="font-weight-light mb-0 small-text">
                    Chinese
                  </p>
                </div>
              </a>
              <a class="dropdown-item preview-item px-3 py-0">
                <div class="preview-thumbnail">
                  <div class="preview-icon">
                    <i class="flag-icon flag-icon-es"></i>
                  </div>
                </div>
                <div class="preview-item-content">
                  <p class="font-weight-light mb-0 small-text">
                    Spanish
                  </p>
                </div>
              </a>
              <a class="dropdown-item preview-item px-3 py-0">
                <div class="preview-thumbnail">
                  <div class="preview-icon">
                    <i class="flag-icon flag-icon-bl"></i>
                  </div>
                </div>
                <div class="preview-item-content">
                  <p class="font-weight-light mb-0 small-text">
                    French
                  </p>
                </div>
              </a>
              <a class="dropdown-item preview-item px-3 py-0">
                <div class="preview-thumbnail">
                  <div class="preview-icon">
                    <i class="flag-icon flag-icon-ae"></i>
                  </div>
                </div>
                <div class="preview-item-content">
                  <p class="font-weight-light mb-0 small-text">
                    Arabic
                  </p>
                </div>
              </a>
            </div>
          </li>
        </ul> -->
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item search-wrapper d-none d-md-block">
            <form action="#">
              <div class="form-group mb-0">
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="mdi mdi-magnify"></i>
                    </span>
                  </div>
                  <input type="text" class="form-control" placeholder="Search">
                </div>
              </div>
            </form>
          </li>
                    <li class="nav-item dropdown d-none d-xl-inline-block user-dropdown">
            <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
              <div class="dropdown-toggle-wrapper">
                <div class="inner">
                                    <img class="img-xs rounded-circle" src="http://beta.xavaxx.com/assets/img/test1.png" alt="Profile image">
                
                </div>
                <div class="inner">
                  <div class="inner">
                    <span class="profile-text font-weight-bold">Administrator</span>
                    <small class="profile-text small">demo</small>
                  </div>
                  <div class="inner">
                    <div class="icon-wrapper">
                      <i class="mdi mdi-chevron-down"></i>
                    </div>
                  </div>
                </div>
              </div>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
              <!--<a class="dropdown-item p-0">
                <div class="d-flex border-bottom">
                  <div class="py-3 px-4 d-flex align-items-center justify-content-center">
                    <i class="mdi mdi-bookmark-plus-outline mr-0 text-gray"></i>
                  </div>
                  <div class="py-3 px-4 d-flex align-items-center justify-content-center border-left border-right">
                    <i class="mdi mdi-account-outline mr-0 text-gray"></i>
                  </div>
                  <div class="py-3 px-4 d-flex align-items-center justify-content-center">
                    <i class="mdi mdi-alarm-check mr-0 text-gray"></i>
                  </div>
                </div>
              </a>-->
              <a class="dropdown-item mt-2">
                Manage Accounts
              </a>
              <a class="dropdown-item" onclick="changepass();" >
                Change Password
              </a>
              <a class="dropdown-item" onclick="changeuser();" >
                Change Username
              </a>
              <a class="dropdown-item" href="http://beta.xavaxx.com/proout">
                Sign Out
              </a>
            </div>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
              <i class="mdi mdi-bell-outline"></i>
              <span class="count">4</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
              <a class="dropdown-item">
                <p class="mb-0 font-weight-normal float-left">You have 4 new notifications
                </p>
                <span class="badge badge-pill badge-warning float-right">View all</span>
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <div class="preview-icon bg-success">
                    <i class="mdi mdi-alert-circle-outline mx-0"></i>
                  </div>
                </div>
                <div class="preview-item-content">
                  <h6 class="preview-subject font-weight-medium text-dark">Application Error</h6>
                  <p class="font-weight-light small-text">
                    Just now
                  </p>
                </div>
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <div class="preview-icon bg-warning">
                    <i class="mdi mdi-comment-text-outline mx-0"></i>
                  </div>
                </div>
                <div class="preview-item-content">
                  <h6 class="preview-subject font-weight-medium text-dark">Settings</h6>
                  <p class="font-weight-light small-text">
                    Private message
                  </p>
                </div>
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <div class="preview-icon bg-info">
                    <i class="mdi mdi-email-outline mx-0"></i>
                  </div>
                </div>
                <div class="preview-item-content">
                  <h6 class="preview-subject font-weight-medium text-dark">New user registration</h6>
                  <p class="font-weight-light small-text">
                    2 days ago
                  </p>
                </div>
              </a>
            </div>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle count-indicator" id="messageDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
              <i class="mdi mdi-email-outline"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="messageDropdown">
              <div class="dropdown-item">
                <p class="mb-0 font-weight-normal float-left">You have 7 unread mails
                </p>
                <span class="badge badge-info badge-pill float-right">View all</span>
              </div>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <img src="http://beta.xavaxx.com/assets/chroma/images/faces/face4.jpg" alt="image" class="profile-pic">
                </div>
                <div class="preview-item-content flex-grow">
                  <h6 class="preview-subject ellipsis font-weight-medium text-dark">David Grey
                    <span class="float-right font-weight-light small-text">1 Minutes ago</span>
                  </h6>
                  <p class="font-weight-light small-text">
                    The meeting is cancelled
                  </p>
                </div>
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <img src="http://beta.xavaxx.com/assets/chroma/images/faces/face2.jpg" alt="image" class="profile-pic">
                </div>
                <div class="preview-item-content flex-grow">
                  <h6 class="preview-subject ellipsis font-weight-medium text-dark">Tim Cook
                    <span class="float-right font-weight-light small-text">15 Minutes ago</span>
                  </h6>
                  <p class="font-weight-light small-text">
                    New product launch
                  </p>
                </div>
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <img src="http://beta.xavaxx.com/assets/chroma/images/faces/face3.jpg" alt="image" class="profile-pic">
                </div>
                <div class="preview-item-content flex-grow">
                  <h6 class="preview-subject ellipsis font-weight-medium text-dark"> Johnson
                    <span class="float-right font-weight-light small-text">18 Minutes ago</span>
                  </h6>
                  <p class="font-weight-light small-text">
                    Upcoming board meeting
                  </p>
                </div>
              </a>
            </div>
          </li>
                  <!-- <li class="nav-item dropdown color-setting d-none d-md-block">
            <a class="nav-link count-indicator" href="#">
              <i class="mdi mdi-invert-colors"></i>
            </a>
          </li> -->
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="mdi mdi-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_settings-panel.html -->
      <div class="theme-setting-wrapper">
        <div id="theme-settings" class="settings-panel">
          <i class="settings-close mdi mdi-close"></i>
          <div class="d-flex align-items-center justify-content-between border-bottom">
            <p class="settings-heading font-weight-bold border-top-0 mb-3 pl-3 pt-0 border-bottom-0 pb-0">Template Skins</p>
          </div>
          <div class="sidebar-bg-options" id="sidebar-light-theme"><div class="img-ss rounded-circle bg-light border mr-3"></div>Light</div>
          <div class="sidebar-bg-options selected" id="sidebar-dark-theme"><div class="img-ss rounded-circle bg-dark border mr-3"></div>Dark</div>
          <p class="settings-heading font-weight-bold mt-2">Header Skins</p>
          <div class="color-tiles mx-0 px-4">
            <div class="tiles primary"></div>
            <div class="tiles success"></div>
            <div class="tiles warning"></div>
            <div class="tiles danger"></div>
            <div class="tiles pink"></div>
            <div class="tiles info"></div>
            <div class="tiles dark"></div>
            <div class="tiles default"></div>
          </div>
        </div>
      </div>
<script type="text/javascript">
  function sidebar_icon(){
    // var x = document.getElementById('body_id');
    if ($('.sidebar-fixed').hasClass('sidebar-icon-only')) {
      $('.sidebar-fixed').removeClass('sidebar-icon-only')
    }else{
      $('.sidebar-fixed').addClass('sidebar-icon-only')
    }
  }
</script>          <!-- partial -->
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas sidebar-dark" id="sidebar">
        <ul class="nav">
          <li class="nav-item nav-profile">
                        <img src="http://beta.xavaxx.com/assets/img/test1.png" alt="profile image">
          
            <p class="text-center font-weight-medium">Demo</p>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="http://beta.xavaxx.com/">
              <i class="menu-icon icon-grid"></i>
              <span class="menu-title">Dashboard</span>
              <!-- <div class="badge badge-success">3</div> -->
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#hr_management" aria-expanded="false" aria-controls="hr_management">
              <i class="menu-icon icon-people"></i>
              <span class="menu-title">HR Management</span>
            </a>
            <div class="collapse show" id="hr_management">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item ">
                  <a class="nav-link" href="http://beta.xavaxx.com/hrm-overview">Overview</a>
                </li>
                <li class="nav-item active">
                  <a class="nav-link" href="http://beta.xavaxx.com/departments">Departments</a>
                </li>
                <li class="nav-item ">
                  <a class="nav-link" href="http://beta.xavaxx.com/designations">Designations</a>
                </li>
                <li class="nav-item ">
                  <a class="nav-link" href="http://beta.xavaxx.com/employees">Employees</a>
                </li>
                <li class="nav-item ">
                  <a class="nav-link" href="http://beta.xavaxx.com/announcement">Announcement</a>
                </li>
                <li class="nav-item ">
                  <a class="nav-link" href="http://beta.xavaxx.com/hrm-report">Reports</a>
                </li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#leave" aria-expanded="false" aria-controls="leave">
              <i class="menu-icon icon-directions"></i>
              <span class="menu-title">Leave</span>
            </a>
            <div class="collapse " id="leave">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item ">
                  <a class="nav-link" href="http://beta.xavaxx.com/leave-request">Request</a>
                </li>
                <li class="nav-item ">
                  <a class="nav-link" href="http://beta.xavaxx.com/leave-entitlement">Leave Entitlements</a>
                </li>
                <li class="nav-item ">
                  <a class="nav-link" href="http://beta.xavaxx.com/holidays">Holidays</a>
                </li>
                <li class="nav-item ">
                  <a class="nav-link" href="http://beta.xavaxx.com/leave-calendar">Calendar</a>
                </li>
                <li class="nav-item ">
                  <a class="nav-link" href="http://beta.xavaxx.com/leave-report">Report</a>
                </li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#attendance" aria-expanded="false" aria-controls="attendance">
              <i class="menu-icon icon-calendar"></i>
              <span class="menu-title">Attendance</span>
            </a>
            <div class="collapse " id="attendance">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item ">
                  <a class="nav-link" href="http://beta.xavaxx.com/attendance">Attendance</a>
                </li>
                <li class="nav-item ">
                  <a class="nav-link" href="http://beta.xavaxx.com/shift">Shift</a>
                </li>
                <li class="nav-item ">
                  <a class="nav-link" href="http://beta.xavaxx.com/import-export">Export / Import</li></a>
                </li>
              </ul>
            </div>
          </li>

                    <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#recruitment" aria-expanded="false" aria-controls="recruitment">
              <i class="menu-icon icon-user-follow"></i>
              <span class="menu-title">Recruitment</span>
            </a>
            <div class="collapse " id="recruitment">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item ">
                  <a class="nav-link" href="http://beta.xavaxx.com/job-opening">Job Opening</a>
                </li>
                <li class="nav-item ">
                  <a class="nav-link" href="http://beta.xavaxx.com/candidates">Candidates</a>
                </li>
                <li class="nav-item ">
                  <a class="nav-link" href="http://beta.xavaxx.com/recruitment-calendar">Calendar</a>
                </li>
                  <li class="nav-item ">
                  <a class="nav-link" href="http://beta.xavaxx.com/recruitment-reports">Reports</a>
                </li>
              </ul>
            </div>
          </li>
        
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#clients" aria-expanded="false" aria-controls="clients">
              <i class="menu-icon icon-briefcase"></i>
              <span class="menu-title">Clients</span>
            </a>
            <div class="collapse " id="clients">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item ">
                  <a class="nav-link" href="http://beta.xavaxx.com/clients-overview">Overview</a>
                </li>
                <li class="nav-item ">
                  <a class="nav-link" href="http://beta.xavaxx.com/contacts">Contacts</a>
                </li>
                <li class="nav-item ">
                  <a class="nav-link" href="http://beta.xavaxx.com/companies">Companies</a>
                </li>
                <li class="nav-item ">
                  <a class="nav-link" href="http://beta.xavaxx.com/activities">Activities</a>
                </li>
              </ul>
            </div>
          </li>

                    <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#accounting" aria-expanded="false" aria-controls="accounting">
              <i class="menu-icon icon-calculator"></i>
              <span class="menu-title">Accounting</span>
            </a>
            <div class="collapse " id="accounting">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item ">
                  <a class="nav-link" href="http://beta.xavaxx.com/accounting-overview">Overview</a>
                </li>
                <!-- <li class="nav-item">
                  <a class="nav-link" href="">Customers</a>
                </li> -->
                <li class="nav-item ">
                  <a class="nav-link" href="http://beta.xavaxx.com/vendors">Vendors</a>
                </li>
                <li class="nav-item ">
                  <a class="nav-link" href="http://beta.xavaxx.com/sales">Sales</a>
                </li>
                <li class="nav-item ">
                  <a class="nav-link" href="http://beta.xavaxx.com/expense">Expenses</a>
                </li>
                <li class="nav-item ">
                  <a class="nav-link" href="http://beta.xavaxx.com/chart-of-accounts">Chart of Accounts</a>
                </li>
                <li class="nav-item ">
                  <a class="nav-link" href="http://beta.xavaxx.com/bank-accounts">Bank Accounts</a>
                </li>
                <!-- <li class="nav-item">
                  <a class="nav-link" href="http://beta.xavaxx.com/journal-entry">Journal Entry</a>
                </li> -->
                <li class="nav-item ">
                  <a class="nav-link" href="http://beta.xavaxx.com/accounting-report">Reports</a>
                </li>
              </ul>
            </div>
          </li>


          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#payroll" aria-expanded="false" aria-controls="payroll">
              <i class="menu-icon icon-wallet"></i>
              <span class="menu-title">Payroll</span>
            </a>
            <div class="collapse " id="payroll">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item ">
                  <a class="nav-link" href="http://beta.xavaxx.com/payroll-overview">Overview</a>
                </li>
                 <li class="nav-item ">
                  <a class="nav-link" href="http://beta.xavaxx.com/pay-run">Pay Run</a>
                </li>
                <li class="nav-item ">
                  <a class="nav-link" href="http://beta.xavaxx.com/pay-calendar">Pay Calendar</a>
                </li>
                <li class="nav-item ">
                  <a class="nav-link" href="http://beta.xavaxx.com/payroll-report">Reports</a>
                </li>
              <!--   <li class="nav-item">
                  <a class="nav-link" href="#">Setting</a>
                </li> -->
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#assets" aria-expanded="false" aria-controls="assets">
              <i class="menu-icon icon-notebook"></i>
              <span class="menu-title">Assets</span>
            </a>
            <div class="collapse " id="assets">
              <ul class="nav flex-column sub-menu">
                 <li class="nav-item ">
                  <a class="nav-link" href="http://beta.xavaxx.com/assets">Assets</a>
                </li>
                <li class="nav-item ">
                  <a class="nav-link" href="http://beta.xavaxx.com/allotments">Allotments</a>
                </li>
                <li class="nav-item ">
                  <a class="nav-link" href="http://beta.xavaxx.com/assets-requests">Requests</a>
                </li>
              </ul>
            </div>
          </li>
        
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#cargo" aria-expanded="false" aria-controls="cargo">
              <i class="menu-icon icon-plane"></i>
              <span class="menu-title">Cargo</span>
            </a>
            <div class="collapse " id="cargo">
              <ul class="nav flex-column sub-menu">
                 <li class="nav-item ">
                  <a class="nav-link" href="http://beta.xavaxx.com/quotation">Quotation</a>
                </li>
                <li class="nav-item ">
                  <a class="nav-link" href="http://beta.xavaxx.com/job-order">Job Order</a>
                </li>
              </ul>
            </div>
          </li>
         
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#architecture" aria-expanded="false" aria-controls="architecture">
              <i class="menu-icon fa fa-building-o"></i>
              <span class="menu-title">Architecture</span>
            </a>
            <div class="collapse " id="architecture">
              <ul class="nav flex-column sub-menu">
                 <li class="nav-item ">
                  <a class="nav-link" href="http://beta.xavaxx.com/architecture/all_project">All Project</a>
                </li>
                <li class="nav-item ">
                  <a class="nav-link" href="http://beta.xavaxx.com/architecture/add_project">Add Project</a>
                </li>
                <li class="nav-item ">
                  <a class="nav-link" href="http://beta.xavaxx.com/architecture/rab_penawaran">RAB Penawaran</a>
                </li>
                <li class="nav-item ">
                  <a class="nav-link" href="http://beta.xavaxx.com/architecture/rab_borongan">RAB Borongan</a>
                </li>
                <li class="nav-item ">
                  <a class="nav-link" href="http://beta.xavaxx.com/architecture/categori">Categories</a>
                </li>
                <li class="nav-item ">
                  <a class="nav-link" href="http://beta.xavaxx.com/architecture/worker_level">Worker Types</a>
                </li>
                <li class="nav-item ">
                  <a class="nav-link" href="http://beta.xavaxx.com/architecture/worker_types">Worker Types</a>
                </li>
              </ul>
            </div>
          </li>
          
                  <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#hospitality" aria-expanded="false" aria-controls="hospitality">
              <i class="menu-icon fa fa-hospital-o"></i>
              <span class="menu-title">Hospitality</span>
            </a>
            <div class="collapse " id="hospitality">
              <ul class="nav flex-column sub-menu">
                 <li class="nav-item ">
                  <a class="nav-link" href="http://beta.xavaxx.com/quotation">Quotation</a>
                </li>
                <li class="nav-item ">
                  <a class="nav-link" href="http://beta.xavaxx.com/job-order">Job Order</a>
                </li>
              </ul>
            </div>
          </li>

                  <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#health" aria-expanded="false" aria-controls="health">
              <i class="menu-icon fa fa-medkit"></i>
              <span class="menu-title">Health</span>
            </a>
            <div class="collapse " id="health">
              <ul class="nav flex-column sub-menu">
                 <li class="nav-item ">
                  <a class="nav-link" href="http://beta.xavaxx.com/quotation">Quotation</a>
                </li>
                <li class="nav-item ">
                  <a class="nav-link" href="http://beta.xavaxx.com/job-order">Job Order</a>
                </li>
              </ul>
            </div>
          </li>
                  <li class="nav-item ">
            <a class="nav-link" href="#">
              <i class="menu-icon icon-key"></i>
              <span class="menu-title">Log User</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#setting" aria-expanded="false" aria-controls="setting">
              <i class="menu-icon icon-settings"></i>
              <span class="menu-title">Setting</span>
            </a>
            <div class="collapse " id="setting">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item ">
                  <a class="nav-link" href="http://beta.xavaxx.com/settings">Settings</a>
                </li>
                <li class="nav-item ">
                  <a class="nav-link" href="http://beta.xavaxx.com/setting-hrm">HR Management</a>
                </li>
                <!-- <li class="nav-item ">
                  <a class="nav-link" href="http://beta.xavaxx.com/setting-payroll">Payroll (HR)</a>
                </li>
                <li class="nav-item ">
                  <a class="nav-link" href="http://beta.xavaxx.com/setting-attendance">Attendance (HR)</a>
                </li>
                <li class="nav-item ">
                  <a class="nav-link" href="http://beta.xavaxx.com/setting-company">Company (HR)</a>
                </li>
                <li class="nav-item ">
                  <a class="nav-link" href="http://beta.xavaxx.com/work-days">Work Days (HR)</a>
                </li> -->
                <li class="nav-item ">
                  <a class="nav-link" href="http://beta.xavaxx.com/add-ons">Add-ons </a>
                </li>
              </ul>
            </div>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="http://beta.xavaxx.com/proout">
              <i class="menu-icon icon-logout"></i>
              <span class="menu-title">Sign Out</span>
            </a>
          </li>
        </ul>
      </nav>
    <style type="text/css">
</style>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row mb-4">
            <div class="col-12 d-flex align-items-center justify-content-between">
              <h4 class="page-title">Rab Borongan</h4>
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
            <div class="col-12">
              <div class="card">
                <div class="card-body">
                  <div class="card-title row">
                    <div class="col-md-12 text-right">
                        
                    </div>
                  </div>
                  <div class="row">

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- <div class="card-body">
          <div class="card-title row">


        </div>

        </div> -->
        <!-- content-wrapper ends -->
        <div class="modal fade" id="formAdd" tabindex="-1" role="dialog" aria-labelledby="formStaffLabel" data-backdrop="static" data-keyboard="false">
          <div class="modal-dialog" role="document" style="margin-top: 15px;margin-bottom: 0">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="formStaffLabel">New Department</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form class="saveDep form" method="post" action="#" id="tambah" enctype="multipart/form-data">
              <div class="modal-body">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="department_title">Department Title</label>
                      <input type="text" name="department_title" id="department_title" class="form-control form-control-lg" placeholder="Department Title">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="description">Description</label>
                      <textarea class="form-control" id="description" rows="2" name="description"></textarea>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="department_lead">Department Lead</label>
                      <input type="text" list="emp" name="department_lead" id="department_lead" class="form-control form-control-lg" placeholder="Department Lead">
                      <datalist id="emp">
                                                <option value="Nue  Gunawan">
                                              </datalist>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="parent_department">Parent Department</label>
                      <input type="text" list="browsers" name="parent_department" id="parent_department" class="form-control form-control-lg" placeholder="Parent Department">
                      <datalist id="browsers">
                                                <option value="Creative">
                                              </datalist>
                    </div>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-success" id="btnok">Create Department</button>
                <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
              </div>
            </form>
            </div>
          </div>
        </div>
        <!-- Modal Ends -->

        <div class="modal fade" id="showsubdep" tabindex="-1" role="dialog" aria-labelledby="formStaffLabel" data-backdrop="static" data-keyboard="false">
          <div class="modal-dialog modal-lg" role="document" style="margin-top: 15px;margin-bottom: 0">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="">Sub Department</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <table id="subdeptable" class="table">
                  <thead>
                    <tr class="text-center">
                      <th>Department</th>
                      <th>Description</th>
                      <th>Department lead</th>
                      <th>Actions </th>
                    </tr>
                  </thead>
                  <tbody id="loaddatahere">
                  </tbody>
                </table>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
              </div>

            </div>
          </div>
        </div>
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
          <div class="container-fluid clearfix">
            <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © <script>document.write(new Date().getFullYear())</script>
              <a href="https://n56ht.com/" target="_blank">InSight MarkComm</a>. All rights reserved.</span>
            <!-- <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with
              <i class="mdi mdi-heart-outline text-danger"></i>
            </span> -->
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->  <!-- plugins:js -->
  <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
  <script src="http://beta.xavaxx.com/assets/chroma/vendors/js/vendor.bundle.base.js"></script>
  <script src="http://beta.xavaxx.com/assets/chroma/vendors/js/vendor.bundle.addons.js"></script>
  <!-- <script src="http://beta.xavaxx.com/assets/chroma/vendors/js/vendor.addons1.js"></script>
  <script src="http://beta.xavaxx.com/assets/chroma/vendors/js/vendor.addons2.js"></script>
  <script src="http://beta.xavaxx.com/assets/chroma/vendors/js/vendor.addons3.js"></script>
  <script src="http://beta.xavaxx.com/assets/chroma/vendors/js/vendor.addons4.js"></script>
  <script src="http://beta.xavaxx.com/assets/chroma/vendors/js/vendor.addons5.js"></script>
  <script src="http://beta.xavaxx.com/assets/chroma/vendors/js/vendor.addons6.js"></script>
  <script src="http://beta.xavaxx.com/assets/chroma/vendors/js/vendor.addons7.js"></script>
  <script src="http://beta.xavaxx.com/assets/chroma/vendors/js/vendor.addons8.js"></script>
  <script src="http://beta.xavaxx.com/assets/chroma/vendors/js/vendor.addons9.js"></script>
  <script src="http://beta.xavaxx.com/assets/chroma/vendors/js/vendor.addons10.js"></script>
  <script src="http://beta.xavaxx.com/assets/chroma/vendors/js/vendor.addons11.js"></script>
  <script src="http://beta.xavaxx.com/assets/chroma/vendors/js/vendor.addons12.js"></script>
  <script src="http://beta.xavaxx.com/assets/chroma/vendors/js/vendor.addons13.js"></script>
  <script src="http://beta.xavaxx.com/assets/chroma/vendors/js/vendor.addons14.js"></script>
  <script src="http://beta.xavaxx.com/assets/chroma/vendors/js/vendor.addons15.js"></script>
  <script src="http://beta.xavaxx.com/assets/chroma/vendors/js/vendor.addons16.js"></script>
  <script src="http://beta.xavaxx.com/assets/chroma/vendors/js/vendor.addons17.js"></script>
  <script src="http://beta.xavaxx.com/assets/chroma/vendors/js/vendor.addons18.js"></script>
  <script src="http://beta.xavaxx.com/assets/chroma/vendors/js/vendor.addons19.js"></script>
  <script src="http://beta.xavaxx.com/assets/chroma/vendors/js/vendor.addons20.js"></script>
  <script src="http://beta.xavaxx.com/assets/chroma/vendors/js/vendor.addons21.js"></script>
  <script src="http://beta.xavaxx.com/assets/chroma/vendors/js/vendor.addons22.js"></script>
  <script src="http://beta.xavaxx.com/assets/chroma/vendors/js/vendor.addons23.js"></script> -->
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <!-- End plugin js for this page-->
  <!-- inject:js-->
  <script src="http://beta.xavaxx.com/assets/chroma/vendors/sweetalert/sweetalert.min.js"></script>
  <script src="http://beta.xavaxx.com/assets/chroma/js/off-canvas.js"></script>
  <script src="http://beta.xavaxx.com/assets/chroma/js/hoverable-collapse.js"></script>
  <script src="http://beta.xavaxx.com/assets/chroma/js/misc.js"></script>
  <script src="http://beta.xavaxx.com/assets/chroma/js/settings.js"></script>
  <script src="http://beta.xavaxx.com/assets/chroma/js/todolist.js"></script>
  <!-- <script src="http://beta.xavaxx.com/assets/chroma/js/dashboard.js"></script> -->
  <script src="http://beta.xavaxx.com/assets/chroma/js/avgrund.js"></script>
  <script src="http://beta.xavaxx.com/assets/chroma/js/bt-maxLenght.js"></script>
  <script src="http://beta.xavaxx.com/assets/chroma/js/c3.js"></script>
  <!--<script src="http://beta.xavaxx.com/assets/chroma/js/calendar.js"></script>-->
  <script src="http://beta.xavaxx.com/assets/chroma/js/chart.js"></script>
  <script src="http://beta.xavaxx.com/assets/chroma/js/chartist.js"></script>
  <script src="http://beta.xavaxx.com/assets/chroma/js/clipboard.js"></script>
  <script src="http://beta.xavaxx.com/assets/chroma/js/codeEditor.js"></script>
  <script src="http://beta.xavaxx.com/assets/chroma/js/context-menu.js"></script>
  <script src="http://beta.xavaxx.com/assets/chroma/js/data-table.js"></script>
  <script src="http://beta.xavaxx.com/assets/chroma/js/db.js"></script>
  <script src="http://beta.xavaxx.com/assets/chroma/js/dekstop-notification.js"></script>
  <script src="http://beta.xavaxx.com/assets/chroma/js/dragula.js"></script>
  <script src="http://beta.xavaxx.com/assets/chroma/js/dropity.js"></script>
  <script src="http://beta.xavaxx.com/assets/chroma/js/dropzone.js"></script>
  <script src="http://beta.xavaxx.com/assets/chroma/js/editorDemo.js"></script>
  <script src="http://beta.xavaxx.com/assets/chroma/js/file-upload.js"></script>
  <script src="http://beta.xavaxx.com/assets/chroma/js/float-chart.js"></script>
  <script src="http://beta.xavaxx.com/assets/chroma/js/form-addons.js"></script>
  <script src="http://beta.xavaxx.com/assets/chroma/js/form-repeater.js"></script>
  <script src="http://beta.xavaxx.com/assets/chroma/js/form-validation.js"></script>
  <script src="http://beta.xavaxx.com/assets/chroma/js/formpickers.js"></script>
  <script src="http://beta.xavaxx.com/assets/chroma/js/google-charts.js"></script>
  <script src="http://beta.xavaxx.com/assets/chroma/js/google-maps.js"></script>
  <script src="http://beta.xavaxx.com/assets/chroma/js/horizontal-menu.js"></script>
  <script src="http://beta.xavaxx.com/assets/chroma/js/iCheck.js"></script>
  <script src="http://beta.xavaxx.com/assets/chroma/js/ion-range-slider.js"></script>
  <script src="http://beta.xavaxx.com/assets/chroma/js/jq.tablesort.js"></script>
  <script src="http://beta.xavaxx.com/assets/chroma/js/jquery-file-upload.js"></script>
  <script src="http://beta.xavaxx.com/assets/chroma/js/select2.js"></script>
  <script src="http://beta.xavaxx.com/assets/chroma/js/morris.js"></script>
  <script src="http://beta.xavaxx.com/assets/chroma/js/js-grid.js"></script>
  <script src="http://beta.xavaxx.com/assets/chroma/js/just-gage.js"></script>
  <script src="http://beta.xavaxx.com/assets/chroma/js/light-gallery.js"></script>
  <script src="http://beta.xavaxx.com/assets/chroma/js/mapeal.js"></script>
  <script src="http://beta.xavaxx.com/assets/chroma/js/mapeal_example_2.js"></script>
  <script src="http://beta.xavaxx.com/assets/chroma/js/mapeal_example_3.js"></script>
  <script src="http://beta.xavaxx.com/assets/chroma/js/maps.js"></script>
  <script src="http://beta.xavaxx.com/assets/chroma/js/misc.js"></script>
  <script src="http://beta.xavaxx.com/assets/chroma/js/modal-demo.js"></script>
  <script src="http://beta.xavaxx.com/assets/chroma/js/morris.js"></script>
  <script src="http://beta.xavaxx.com/assets/chroma/js/no-ui-slider.js"></script>
  <script src="http://beta.xavaxx.com/assets/chroma/js/owl-carousel.js"></script>
  <script src="http://beta.xavaxx.com/assets/chroma/js/paginate.js"></script>
  <script src="http://beta.xavaxx.com/assets/chroma/js/popover.js"></script>
  <script src="http://beta.xavaxx.com/assets/chroma/js/progress-bar.js"></script>
  <script src="http://beta.xavaxx.com/assets/chroma/js/sparkline.js"></script>
  <script src="http://beta.xavaxx.com/assets/chroma/js/tablesorter.js"></script>
  <script src="http://beta.xavaxx.com/assets/chroma/js/tabs.js"></script>
  <script src="http://beta.xavaxx.com/assets/chroma/js/tight-grid.js"></script>
  <script src="http://beta.xavaxx.com/assets/chroma/js/toastDemo.js"></script>
  <script src="http://beta.xavaxx.com/assets/chroma/js/tooltips.js"></script>
  <script src="http://beta.xavaxx.com/assets/chroma/js/typehead.js"></script>
  <script src="http://beta.xavaxx.com/assets/chroma/js/wizard.js"></script>
  <script src="http://beta.xavaxx.com/assets/chroma/js/x-editable.js"></script>

  <!-- map -->
  <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&amp;sensor=false"></script>
  <!-- barcode -->
  <script src="http://beta.xavaxx.com/assets/chroma/js/qrcode.js"></script>
  <script src="http://beta.xavaxx.com/assets/chroma/js/download.js"></script>



<script type="text/javascript">
  var d = new Date();
  var months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
  document.getElementById("bulan").innerHTML = months[d.getMonth()];
  document.getElementById("tahun").innerHTML = d.getFullYear();
  $('.dropify').dropify();
</script>
<script type="text/javascript">
  // var d = new Date();
  // var months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
  // document.getElementById("bulan").innerHTML = months[d.getMonth()];
  // document.getElementById("tahun").innerHTML = d.getFullYear();
  //uri => https://sekolah.n56ht.co/uri_1/uri_2/uri_3
  
    function changepass(){
    $('#formpass').modal('show');
    }

    function changeuser(){
      $('#formuser').modal('show');
    }

    $(document).ready(function(){
      $(".changepass").submit(function(e){
        e.preventDefault();
        var atribut = $(this).attr("id");
        if(atribut == "tambah"){
          ubahpass();
        }
      });

      $(".changeuser").submit(function(e){
        e.preventDefault();
        var atribut = $(this).attr("id");
        if(atribut == "tambah"){
          ubahuser();
        }
      });
    });

    function ubahpass(){
        var old_pass = $("#old_pass").val();
        var new_pass = $("#new_pass").val();
        if(old_pass == "" || new_pass==""){
            swal({
              title: "Data ada yang kosong!",
                text: "Tolong lengkapi data.",
                type: "warning",
                icon: 'warning',
                buttonsStyling: false,
                confirmButtonClass: "btn btn-warning"
            }).catch(swal.noop);
        }else{
          $.ajax({
              url : "http://beta.xavaxx.com/getPass",
            type: "POST",
            dataType: "JSON",
            data: {
                old_pass :old_pass,
                new_pass :new_pass,
            },
            success : function(data){
                if(data == 0){
                  swal({
                        title: 'Gagal!',
                        text: 'Password tidak ditemukan',
                        type: 'error',
                        confirmButtonClass: "btn btn-danger",
                        buttonsStyling: false
                    }).catch(swal.noop)
                }else{
                  $.ajax({
                    url : "http://beta.xavaxx.com/uptPass",
                          type: "POST",
                          dataType: "JSON",
                          data: {
                            old_pass :old_pass,
                            new_pass :new_pass,
                          }
                  });
                  $("#formpass").modal("hide");
                    swal({
                        title: "Congratulation!",
                        text: "Password has been changed. Please login with new password",
                        type: "success",
                        icon: 'success',
                        buttonsStyling: false,
                        confirmButtonClass: "btn btn-success"
                    },function(){
                      window.location.href="http://beta.xavaxx.com/proout";
                    });
                }
            },
            error : function(jqXHR, textStatus, errorThrown){
              swal({
                    title: 'Gagal!',
                    text: 'Gagal mengambil data.',
                    type: 'error',
                    confirmButtonClass: "btn btn-danger",
                    buttonsStyling: false
                }).catch(swal.noop)
            }
          });
        }
    }

    function ubahuser(){
        var old_user = $("#old_user").val();
        var new_user = $("#new_user").val();
        if(old_user == "" || new_user==""){
            swal({
              title: "Data ada yang kosong!",
                text: "Tolong lengkapi data.",
                type: "warning",
                icon: 'warning',
                buttonsStyling: false,
                confirmButtonClass: "btn btn-warning"
            }).catch(swal.noop);
        }else{
          $.ajax({
              url : "http://beta.xavaxx.com/getUser",
            type: "POST",
            dataType: "JSON",
            data: {
                old_user :old_user,
                new_user :new_user,
            },
            success : function(data){
                if(data == 0){
                  swal({
                        title: 'Gagal!',
                        text: 'Username tidak ditemukan',
                        type: 'error',
                        confirmButtonClass: "btn btn-danger",
                        buttonsStyling: false
                    }).catch(swal.noop)
                }else{
                  $.ajax({
                    url : "http://beta.xavaxx.com/uptUser",
                          type: "POST",
                          dataType: "JSON",
                          data: {
                            old_user :old_user,
                            new_user :new_user,
                          }
                  });
                  $("#formpass").modal("hide");
                    swal({
                        title: "Congratulation!",
                        text: "Username has been changed. Please login with new username",
                        type: "success",
                        icon: 'success',
                        buttonsStyling: false,
                        confirmButtonClass: "btn btn-success"
                    },function(){
                      window.location.href="http://beta.xavaxx.com/proout";
                    });
                }
            },
            error : function(jqXHR, textStatus, errorThrown){
              swal({
                    title: 'Gagal!',
                    text: 'Gagal mengambil data.',
                    type: 'error',
                    confirmButtonClass: "btn btn-danger",
                    buttonsStyling: false
                }).catch(swal.noop)
            }
          });
        }
    }

    function showoldpass() {
      var x = document.getElementById("old_pass");
      var y = document.getElementById("eye");
      // var x = document.getElementsByClassName("password")[0];
      if (x.type == "password") {
          x.type = "text";
          $('#eye').removeClass('fa fa-eye-slash');
          $('#eye').addClass('fa fa-eye');
      } else {
          x.type = "password";
          $('#eye').removeClass('fa fa-eye');
          $('#eye').addClass('fa fa-eye-slash');
      }
    }

    function shownewpass() {
      var x = document.getElementById("new_pass");
      var y = document.getElementById("eye");
      // var x = document.getElementsByClassName("password")[0];
      if (x.type == "password") {
          x.type = "text";
          $('#eye').removeClass('fa fa-eye-slash');
          $('#eye').addClass('fa fa-eye');
      } else {
          x.type = "password";
          $('#eye').removeClass('fa fa-eye');
          $('#eye').addClass('fa fa-eye-slash');
      }
    }

</script>


  </body>
</html>
<script type="text/javascript">
$(document).ready(function(){
  $("form").submit(function(e){
    e.preventDefault();
    //alert('test');
    var atribut = $(this).attr("id");
    if(atribut == "tambah"){
      tambah_dep();
    }
    else if(atribut == "update"){
      var id_dep = $(this).data("id");
      update_dep(id_dep);
    }
  });
});

function tambah_dep(){
  //alert('ok');
      var department_title = $("#department_title").val();
      var description = $("#description").val();
      var department_lead = $("#department_lead").val();
      var parent_department = $("#parent_department").val();
      if(department_title == "" ){
          swal({
            title: "Data ada yang kosong!",
              text: "Tolong lengkapi data.",
              type: "warning",
              icon: 'warning',
              buttonsStyling: false,
              confirmButtonClass: "btn btn-warning"
          }).catch(swal.noop);
      }else{
          //Memulai memasukan data ke database
        $.ajax({
          url : "http://beta.xavaxx.com/saveDep",
                type: "POST",
                dataType: "JSON",
                data: {
                    department_title : department_title,
                    description : description,
                    department_lead : department_lead,
                    parent_department : parent_department,
                }
        });
        $("#formAdd").modal("hide");
          swal({
              title: "Congratulation!",
              text: "Department has been added",
              type: "success",
              icon: 'success',
              buttonsStyling: false,
              confirmButtonClass: "btn btn-success"
          },function(){
            location.reload();
          });
          //alert('ok');
      }
}

function delItem(id){
  //alert(id);
  swal({
            title: 'Are you sure ?',
            text: "You will not be able to recover this file!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonClass: 'btn btn-success',
            cancelButtonClass: 'btn btn-danger',
            confirmButtonText: 'Ya, Hapus!',
            cancelButtonText: 'Batal',
            buttonsStyling: false
            /*buttons: {
                cancel: {
                  text: "Cancel",
                  value: null,
                  visible: true,
                  className: "btn btn-danger",
                  closeModal: true,
                },
                confirm: {
                  text: "OK",
                  value: true,
                  visible: true,
                  className: "btn btn-primary",
                  closeModal: true
                }
              }*/
        },function(){
          //alert(id);
              //if (isConfirm) {
                $.ajax({
                  url : "http://beta.xavaxx.com/delDep",
                        type: "POST",
                        dataType: "JSON",
                        data: {
                          id : id
                        }
                        });

                          swal({
                              title: 'Congratulation',
                              text: 'Data has been deleted',
                              type: 'success',
                              confirmButtonClass: "btn btn-success",
                              buttonsStyling: false
                          });
                          location.reload();
              /*} else {
                  swal("Cancelled", "Your data is safe :)", "error");
              }*/
          });
          //Prosess Penghapusan data
}

function edtItem(id){
  //alert(id);
  $("#showsubdep").modal("hide");
  $.ajax({
      url : "http://beta.xavaxx.com/edtDep",
    type: "POST",
    dataType: "JSON",
    data: {
        id : id
    },
    success : function(data){
            $("#formAdd").modal("show");
            $("#formStaffLabel").text("Edit Department");
            //$("form").attr('action','http://beta.xavaxx.com/uptDep');

            $("form").attr("data-id", data.iddepartment);
            $("form").attr("id",'update');
            $("#department_title").val(data.departmenttitle);
            $("#description").val(data.departmentdesc);
            $("#parent_department").val(data.parentdepartment);
            $("#department_lead").val(data.departmentlead);
            $("#btnok").text("Update Department");
    },
    error : function(jqXHR, textStatus, errorThrown){
      swal({
            title: 'Gagal!',
            text: 'Gagal mengambil data.',
            type: 'error',
            confirmButtonClass: "btn btn-danger",
            buttonsStyling: false
        }).catch(swal.noop)
    }
  });
}

function update_dep(id_dep){
  //alert('ok');
  var department_title = $("#department_title").val();
  var description = $("#description").val();
  var department_lead = $("#department_lead").val();
  var parent_department = $("#parent_department").val();
  if(department_title == ""  ){
      swal({
        title: "Data ada yang kosong!",
          text: "Tolong lengkapi data.",
          type: "warning",
          icon: 'warning',
          buttonsStyling: false,
          confirmButtonClass: "btn btn-warning"
      }).catch(swal.noop);
  }else{
      //Memulai memasukan data ke database
    $.ajax({
      url : "http://beta.xavaxx.com/uptDep",
            type: "POST",
            dataType: "JSON",
            data: {
                id_dep : id_dep,
                department_title : department_title,
                description : description,
                department_lead : department_lead,
                parent_department : parent_department,
            }
    });
    $("#formAdd").modal("hide");
      swal({
          title: "Congratulation!",
          text: "Department has been updated",
          type: "success",
          icon: 'success',
          buttonsStyling: false,
          confirmButtonClass: "btn btn-success"
      },function(){
        location.reload();
      });
      //alert('ok');
  }
}

function viewdep(id){
  //alert(id);
  $.ajax({
      url : "http://beta.xavaxx.com/showSubDep",
    type: "POST",
    dataType: "JSON",
    data: {
        id : id
    },
    success : function(data){
            $("#showsubdep").modal("show");
              var html = '';
                   var i;
                   for(i=0; i<data.length; i++){
                       html += '<tr class="text-center">'+
                               '<td>'+data[i].departmenttitle+'</td>'+
                               '<td>'+data[i].departmentdesc+'</td>'+
                               '<td>'+data[i].departmentlead+'</td>'+
                               '<td><button class="btn btn-link" onclick="edtItem('+"'"+data[i].iddepartment+"'"+');"><i class="fa fa-pencil"></i></button> <button class="btn btn-link" onclick="delItem('+"'"+data[i].iddepartment+"'"+');"><i class="fa fa-trash-o"></i></button></td>'+
                               '</tr>';
                   }
                   $('#loaddatahere').html(html);
    },
    error : function(jqXHR, textStatus, errorThrown){
      swal({
            title: 'Gagal!',
            text: 'Gagal mengambil data.',
            type: 'error',
            confirmButtonClass: "btn btn-danger",
            buttonsStyling: false
        }).catch(swal.noop)
    }
  });
}
</script>
<script type="text/javascript">
  $('#tabledepartment').DataTable({
      "aLengthMenu": [
        [5, 10, 15, -1],
        [5, 10, 15, "All"]
      ],
      "iDisplayLength": 10,
      "language": {
        search: ""
      },
    });

    $('#subdeptable').DataTable({
        "aLengthMenu": [
          [5, 10, 15, -1],
          [5, 10, 15, "All"]
        ],
        "iDisplayLength": 10,
        "language": {
          search: ""
        },
        // "bSort" : false,
        // "dom": 'Bfrtip',
        // "buttons": [
        //   'copy', 'csv', 'excel', 'pdf', 'print'
        // ]
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
