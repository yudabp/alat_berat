<?php
  $url_1 = $this->uri->segment(1);
  $url_2 = $this->uri->segment(2);

  $level = $this->session->userdata("level");
?>
    <?php if ($level == "superakses") { ?>
      <!-- partial -->
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas sidebar-dark" id="sidebar">
        <ul class="nav">
          <li class="nav-item nav-profile">
            <?php if($info->comphoto==""){ ?>
            <img src="<?php echo base_url(); ?>assets/img/test1.png" alt="profile image">
          <?php }else{ ?>
            <img src="<?php echo base_url(); ?>assets/company/<?php echo $info->comphoto; ?>" alt="profile image">
          <?php }?>

            <p class="text-center font-weight-medium"><?php echo $info->companyname; ?></p>
          </li>
          <li class="nav-item <?php if ($url_1 == "" || $url_1 == "beranda") { echo "active"; }?>">
            <a class="nav-link" href="<?php echo base_url(); ?>">
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
            <div class="collapse <?php if($url_1 == "hrm-overview" ||$url_1 == "employees" ||$url_1 == "departments" ||$url_1 == "designations" ||$url_1 == "announcement" ||$url_1 == "hrm-report"){echo "show"; } ?>" id="hr_management">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item <?php if($url_1 == "hrm-overview"){echo "active"; } ?>">
                  <a class="nav-link" href="<?php echo base_url() ?>hrm-overview">Overview</a>
                </li>
                <li class="nav-item <?php if($url_1 == "departments"){echo "active"; } ?>">
                  <a class="nav-link" href="<?php echo base_url() ?>departments">Departments</a>
                </li>
                <li class="nav-item <?php if($url_1 == "designations"){echo "active"; } ?>">
                  <a class="nav-link" href="<?php echo base_url() ?>designations">Designations</a>
                </li>
                <li class="nav-item <?php if($url_1 == "employees"){echo "active"; } ?>">
                  <a class="nav-link" href="<?php echo base_url() ?>employees">Employees</a>
                </li>
                <li class="nav-item <?php if($url_1 == "announcement"){echo "active"; } ?>">
                  <a class="nav-link" href="<?php echo base_url() ?>announcement">Announcement</a>
                </li>
                <li class="nav-item <?php if($url_1 == "hrm-report"){echo "active"; } ?>">
                  <a class="nav-link" href="<?php echo base_url() ?>hrm-report">Reports</a>
                </li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#leave" aria-expanded="false" aria-controls="leave">
              <i class="menu-icon icon-directions"></i>
              <span class="menu-title">Leave</span>
            </a>
            <div class="collapse <?php if($url_1 == "leave-request" ||$url_1 == "leave-entitlement" ||$url_1 == "holidays" ||$url_1 == "leave-calendar" ||$url_1 == "leave-report"){echo "show"; } ?>" id="leave">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item <?php if($url_1 == "leave-request"){echo "active"; } ?>">
                  <a class="nav-link" href="<?php echo base_url() ?>leave-request">Request</a>
                </li>
                <li class="nav-item <?php if($url_1 == "leave-entitlement"){echo "active"; } ?>">
                  <a class="nav-link" href="<?php echo base_url() ?>leave-entitlement">Leave Entitlements</a>
                </li>
                <li class="nav-item <?php if($url_1 == "holiday"){echo "active"; } ?>">
                  <a class="nav-link" href="<?php echo base_url() ?>holidays">Holidays</a>
                </li>
                <li class="nav-item <?php if($url_1 == "leave-calendar"){echo "active"; } ?>">
                  <a class="nav-link" href="<?php echo base_url() ?>leave-calendar">Calendar</a>
                </li>
                <li class="nav-item <?php if($url_1 == "leave-report"){echo "active"; } ?>">
                  <a class="nav-link" href="<?php echo base_url() ?>leave-report">Report</a>
                </li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#attendance" aria-expanded="false" aria-controls="attendance">
              <i class="menu-icon icon-calendar"></i>
              <span class="menu-title">Attendance</span>
            </a>
            <div class="collapse <?php if($url_1 == "attendance" ||$url_1 == "shift" ||$url_1 == "import-export"){echo "show"; } ?>" id="attendance">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item <?php if($url_1 == "attendance"){echo "active"; } ?>">
                  <a class="nav-link" href="<?php echo base_url() ?>attendance">Attendance</a>
                </li>
                <li class="nav-item <?php if($url_1 == "shift"){echo "active"; } ?>">
                  <a class="nav-link" href="<?php echo base_url() ?>shift">Shift</a>
                </li>
                <li class="nav-item <?php if($url_1 == "import-export"){echo "active"; } ?>">
                  <a class="nav-link" href="<?php echo base_url() ?>import-export">Export / Import</li></a>
                </li>
              </ul>
            </div>
          </li>

          <?php if($this->session->userdata('paket')=="Premium"){ ?>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#recruitment" aria-expanded="false" aria-controls="recruitment">
              <i class="menu-icon icon-user-follow"></i>
              <span class="menu-title">Recruitment</span>
            </a>
            <div class="collapse <?php if($url_1 == "job-opening" ||$url_1 == "candidates" ||$url_1 == "recruitment-calendar" ||$url_1 == "recruitment-reports"){echo "show"; } ?>" id="recruitment">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item <?php if($url_1 == "job-opening"){echo "active"; } ?>">
                  <a class="nav-link" href="<?php echo base_url() ?>job-opening">Job Opening</a>
                </li>
                <li class="nav-item <?php if($url_1 == "candidates"){echo "active"; } ?>">
                  <a class="nav-link" href="<?php echo base_url() ?>candidates">Candidates</a>
                </li>
                <li class="nav-item <?php if($url_1 == "recruitment-calendar"){echo "active"; } ?>">
                  <a class="nav-link" href="<?php echo base_url() ?>recruitment-calendar">Calendar</a>
                </li>
                  <li class="nav-item <?php if($url_1 == "recruitment-reports"){echo "active"; } ?>">
                  <a class="nav-link" href="<?php echo base_url() ?>recruitment-reports">Reports</a>
                </li>
              </ul>
            </div>
          </li>
        <?php }?>

          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#clients" aria-expanded="false" aria-controls="clients">
              <i class="menu-icon icon-briefcase"></i>
              <span class="menu-title">Clients</span>
            </a>
            <div class="collapse <?php if($url_1 == "clients-overview" ||$url_1 == "contacts" ||$url_1 == "companies" ||$url_1 == "activities"){echo "show"; } ?>" id="clients">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item <?php if($url_1 == "clients-overview"){echo "active"; } ?>">
                  <a class="nav-link" href="<?php echo base_url() ?>clients-overview">Overview</a>
                </li>
                <li class="nav-item <?php if($url_1 == "contacts"){echo "active"; } ?>">
                  <a class="nav-link" href="<?php echo base_url() ?>contacts">Contacts</a>
                </li>
                <li class="nav-item <?php if($url_1 == "companies"){echo "active"; } ?>">
                  <a class="nav-link" href="<?php echo base_url() ?>companies">Companies</a>
                </li>
                <li class="nav-item <?php if($url_1 == "activities"){echo "active"; } ?>">
                  <a class="nav-link" href="<?php echo base_url() ?>activities">Activities</a>
                </li>
              </ul>
            </div>
          </li>

          <?php if($this->session->userdata('paket')=="Premium"){ ?>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#accounting" aria-expanded="false" aria-controls="accounting">
              <i class="menu-icon icon-calculator"></i>
              <span class="menu-title">Accounting</span>
            </a>
            <div class="collapse <?php if($url_1 == "accounting-overview" ||$url_1 == "vendors" ||$url_1 == "expense" ||$url_1 == "sales" ||$url_1 == "chart-of-accounts" |$url_1 == "bank-accounts" ||$url_1 == "journal-entry" ||$url_1 == "accounting-report"){echo "show"; } ?>" id="accounting">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item <?php if($url_1 == "accounting-overview"){echo "active"; } ?>">
                  <a class="nav-link" href="<?php echo base_url() ?>accounting-overview">Overview</a>
                </li>
                <!-- <li class="nav-item">
                  <a class="nav-link" href="">Customers</a>
                </li> -->
                <li class="nav-item <?php if($url_1 == "vendors"){echo "active"; } ?>">
                  <a class="nav-link" href="<?php echo base_url() ?>vendors">Vendors</a>
                </li>
                <li class="nav-item <?php if($url_1 == "sales"){echo "active"; } ?>">
                  <a class="nav-link" href="<?php echo base_url() ?>sales">Sales</a>
                </li>
                <li class="nav-item <?php if($url_1 == "expense"){echo "active"; } ?>">
                  <a class="nav-link" href="<?php echo base_url() ?>expense">Expenses</a>
                </li>
                <li class="nav-item <?php if($url_1 == "chart-of-accounts"){echo "active"; } ?>">
                  <a class="nav-link" href="<?php echo base_url() ?>chart-of-accounts">Chart of Accounts</a>
                </li>
                <li class="nav-item <?php if($url_1 == "bank-accounts"){echo "active"; } ?>">
                  <a class="nav-link" href="<?php echo base_url() ?>bank-accounts">Bank Accounts</a>
                </li>
                <!-- <li class="nav-item">
                  <a class="nav-link" href="<?php echo base_url() ?>journal-entry">Journal Entry</a>
                </li> -->
                <li class="nav-item <?php if($url_1 == "accounting-report"){echo "active"; } ?>">
                  <a class="nav-link" href="<?php echo base_url() ?>accounting-report">Reports</a>
                </li>
              </ul>
            </div>
          </li>


          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#payroll" aria-expanded="false" aria-controls="payroll">
              <i class="menu-icon icon-wallet"></i>
              <span class="menu-title">Payroll</span>
            </a>
            <div class="collapse <?php if($url_1 == "payroll-overview" ||$url_1 == "pay-calendar" ||$url_1 == "pay-run" ||$url_1 == "payroll-report" ||$url_1 == "setting"){echo "show"; } ?>" id="payroll">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item <?php if($url_1 == "payroll-overview"){echo "active"; } ?>">
                  <a class="nav-link" href="<?php echo base_url() ?>payroll-overview">Overview</a>
                </li>
                 <li class="nav-item <?php if($url_1 == "pay-run"){echo "active"; } ?>">
                  <a class="nav-link" href="<?php echo base_url() ?>pay-run">Pay Run</a>
                </li>
                <li class="nav-item <?php if($url_1 == "pay-calendar"){echo "active"; } ?>">
                  <a class="nav-link" href="<?php echo base_url() ?>pay-calendar">Pay Calendar</a>
                </li>
                <li class="nav-item <?php if($url_1 == "payroll-report"){echo "active"; } ?>">
                  <a class="nav-link" href="<?php echo base_url() ?>payroll-report">Reports</a>
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
            <div class="collapse <?php if($url_1 == "assets" ||$url_1 == "allotments" ||$url_1 == "assets-requests"){echo "show"; } ?>" id="assets">
              <ul class="nav flex-column sub-menu">
                 <li class="nav-item <?php if($url_1 == "assets"){echo "active"; } ?>">
                  <a class="nav-link" href="<?php echo base_url() ?>assets">Assets</a>
                </li>
                <li class="nav-item <?php if($url_1 == "allotments"){echo "active"; } ?>">
                  <a class="nav-link" href="<?php echo base_url() ?>allotments">Allotments</a>
                </li>
                <li class="nav-item <?php if($url_1 == "assets-requests"){echo "active"; } ?>">
                  <a class="nav-link" href="<?php echo base_url() ?>assets-requests">Requests</a>
                </li>
              </ul>
            </div>
          </li>
        <?php } if($this->session->userdata('cargo') == "Yes"){?>

          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#cargo" aria-expanded="false" aria-controls="cargo">
              <i class="menu-icon icon-plane"></i>
              <span class="menu-title">Cargo</span>
            </a>
            <div class="collapse <?php if($url_1 == "quotation" || $url_1 == "add-quotation" || $url_1 == "job-order" || $url_1 == "add-job-order"){echo "show"; } ?>" id="cargo">
              <ul class="nav flex-column sub-menu">
                 <li class="nav-item <?php if($url_1 == "add-quotation" || $url_1 == "quotation"){echo "active"; } ?>">
                  <a class="nav-link" href="<?php echo base_url() ?>quotation">Quotation</a>
                </li>
                <li class="nav-item <?php if($url_1 == "job-order" || $url_1 == "add-job-order"){echo "active"; } ?>">
                  <a class="nav-link" href="<?php echo base_url() ?>job-order">Job Order</a>
                </li>
                <li class="nav-item <?php if($url_1 == "item-cost"){echo "active"; } ?>">
                  <a class="nav-link" href="<?php echo base_url() ?>item-cost">Item Cost</a>
                </li>
                <li class="nav-item" <?php if($url_1 == "unit"){echo "active"; } ?>>
                  <a class="nav-link" href="<?php echo base_url() ?>unit">Unit</a>
                </li>
                <li class="nav-item" <?php if($url_1 == "cargo-port"){echo "active"; } ?>>
                  <a class="nav-link" href="<?php echo base_url() ?>cargo-port">Port</a>
                </li>
                <li class="nav-item" <?php if($url_1 == "airlines"){echo "active"; } ?>>
                  <a class="nav-link" href="<?php echo base_url() ?>airlines">Airlines</a>
                </li>
                <li class="nav-item" <?php if($url_1 == "consignee"){echo "active"; } ?>>
                  <a class="nav-link" href="<?php echo base_url() ?>consignee">Consignee</a>
                </li>
                
              </ul>
            </div>
          </li>
        <?php } if($this->session->userdata('architecture') == "Yes") { ?> 
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#architecture" aria-expanded="false" aria-controls="architecture">
              <i class="menu-icon fa fa-building-o"></i>
              <span class="menu-title">Architecture</span>
            </a>
            <div class="collapse <?php if($url_1 == "projects" || $url_1 == "project-add" || $url_1 == "project-tasks" || $url_1 == "actual-tasks" || $url_1 == "project-categories" || $url_1 == "worker-levels" || $url_1 == "worker-types" || $url_1 == "worker"){echo "show"; } ?>" id="architecture">
              <ul class="nav flex-column sub-menu">
                 <li class="nav-item <?php if($url_1 == "projects"){echo "active"; } ?>">
                  <a class="nav-link" href="<?php echo base_url() ?>all-project">All Project</a>
                </li>
                <li class="nav-item <?php if($url_1 == "project-tasks"){echo "active"; } ?>">
                  <a class="nav-link" href="<?php echo base_url() ?>rab-penawaran">RAB Penawaran</a>
                </li>
                <li class="nav-item <?php if($url_1 == "actual-tasks"){echo "active"; } ?>">
                  <a class="nav-link" href="<?php echo base_url() ?>rab-borongan">RAB Borongan</a>
                </li>
                <li class="nav-item <?php if($url_1 == "project-categories"){echo "active"; } ?>">
                  <a class="nav-link" href="<?php echo base_url() ?>categories">Categories</a>
                </li>
                <li class="nav-item <?php if($url_1 == "worker-all"){echo "active"; } ?>">
                  <a class="nav-link" href="<?php echo base_url() ?>worker-all">Worker</a>
                </li>
                <li class="nav-item <?php if($url_1 == "worker-levels"){echo "active"; } ?>">
                  <a class="nav-link" href="<?php echo base_url() ?>worker-level">Worker Levels</a>
                </li>
                <li class="nav-item <?php if($url_1 == "worker-types"){echo "active"; } ?>">
                  <a class="nav-link" href="<?php echo base_url() ?>worker-types">Worker Types</a>
                </li>
                <li class="nav-item <?php if($url_1 == "worker-check-in"){echo "active"; } ?>">
                  <a class="nav-link" href="<?php echo base_url() ?>workers-checkins">Workers Check-Ins</a>
                </li>
                <li class="nav-item <?php if($url_1 == "workers-overtimes"){echo "active"; } ?>">
                  <a class="nav-link" href="<?php echo base_url() ?>workers-overtimes">Workers Overtimes</a>
                </li>
              </ul>
            </div>
          </li>
          
        <?php } if($this->session->userdata('hospitality') == "Yes"){ ?>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#hospitality" aria-expanded="false" aria-controls="hospitality">
              <i class="menu-icon fa fa-hospital-o"></i>
              <span class="menu-title">Hospitality</span>
            </a>
            <!-- <div class="collapse <?php if($url_1 == "hospitality"){echo "show"; } ?>" id="hospitality">
              <ul class="nav flex-column sub-menu">
                 <li class="nav-item <?php if($url_1 == "hospitality"){echo "active"; } ?>">
                  <a class="nav-link" href="<?php echo base_url() ?>quotation">Quotation</a>
                </li>
                <li class="nav-item <?php if($url_1 == "hospitality"){echo "active"; } ?>">
                  <a class="nav-link" href="<?php echo base_url() ?>job-order">Job Order</a>
                </li>
              </ul>
            </div> -->
          </li>

        <?php } if($this->session->userdata('health') == "Yes"){?>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#health" aria-expanded="false" aria-controls="health">
              <i class="menu-icon fa fa-medkit"></i>
              <span class="menu-title">Health</span>
            </a>
            <!-- <div class="collapse <?php if($url_1 == "health"){echo "show"; } ?>" id="health">
              <ul class="nav flex-column sub-menu">
                 <li class="nav-item <?php if($url_1 == "health"){echo "active"; } ?>">
                  <a class="nav-link" href="<?php echo base_url() ?>quotation">Quotation</a>
                </li>
                <li class="nav-item <?php if($url_1 == "health"){echo "active"; } ?>">
                  <a class="nav-link" href="<?php echo base_url() ?>job-order">Job Order</a>
                </li>
              </ul>
            </div> -->
          </li>
        <?php } if($this->session->userdata('maintenance') == "Yes") {?>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#maintenance" aria-expanded="false" aria-controls="maintenance">
              <i class="menu-icon icon-energy"></i>
              <span class="menu-title">Maintenance</span>
            </a>
            <div class="collapse <?php if($url_1 == "main-overview" ||$url_1 == "sticker" ||$url_1 == "category"){echo "show"; } ?>" id="maintenance">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item <?php if($url_1 == "main-overview"){echo "active"; } ?>">
                  <a class="nav-link" href="<?php echo base_url() ?>main-overview">Overview</a>
                </li>
                <li class="nav-item <?php if($url_1 == "list-maintenance"){echo "active"; } ?>">
                  <a class="nav-link" href="<?php echo base_url() ?>list-maintenance">List</a>
                </li>
                <li class="nav-item <?php if($url_1 == "sticker"){echo "active"; } ?>">
                  <a class="nav-link" href="<?php echo base_url() ?>sticker">Sticker</a>
                </li>
                <li class="nav-item <?php if($url_1 == "category"){echo "active"; } ?>">
                  <a class="nav-link" href="<?php echo base_url() ?>category">Category</a>
                </li>
              </ul>
            </div>
          </li>
        <?php } ?>
          <li class="nav-item <?php if ($url_1 == "") { echo "active"; }?>">
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
            <div class="collapse <?php if($url_1 == "settings" ||$url_1 == "settings-hrm" ||$url_1 == "setting-payroll" ||$url_1 == "setting-attendance" ||$url_1 == "setting-company" ||$url_1 == "work-days" ||$url_1 == "add-ons"){echo "show"; } ?>" id="setting">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item <?php if($url_1 == "settings"){echo "active"; } ?>">
                  <a class="nav-link" href="<?php echo base_url() ?>settings">Settings</a>
                </li>
                <li class="nav-item <?php if($url_1 == "setting-hrm"){echo "active"; } ?>">
                  <a class="nav-link" href="<?php echo base_url() ?>setting-hrm">HR Management</a>
                </li>
                <!-- <li class="nav-item <?php if($url_1 == "setting-payroll"){echo "active"; } ?>">
                  <a class="nav-link" href="<?php echo base_url() ?>setting-payroll">Payroll (HR)</a>
                </li>
                <li class="nav-item <?php if($url_1 == "setting-attendance"){echo "active"; } ?>">
                  <a class="nav-link" href="<?php echo base_url() ?>setting-attendance">Attendance (HR)</a>
                </li>
                <li class="nav-item <?php if($url_1 == "setting-company"){echo "active"; } ?>">
                  <a class="nav-link" href="<?php echo base_url() ?>setting-company">Company (HR)</a>
                </li>
                <li class="nav-item <?php if($url_1 == "work-days"){echo "active"; } ?>">
                  <a class="nav-link" href="<?php echo base_url() ?>work-days">Work Days (HR)</a>
                </li> -->
                <li class="nav-item <?php if($url_1 == "add-ons"){echo "active"; } ?>">
                  <a class="nav-link" href="<?php echo base_url() ?>add-ons">Add-ons </a>
                </li>
                <li class="nav-item <?php if($url_1 == "setting-cargo"){echo "active"; } ?>">
                  <a class="nav-link" href="<?php echo base_url() ?>setting-cargo">Branch Office</a>
                </li>
              </ul>
            </div>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="<?= base_url('proout'); ?>">
              <i class="menu-icon icon-logout"></i>
              <span class="menu-title">Sign Out</span>
            </a>
          </li>
        </ul>
      </nav>
    <?php }elseif ($level == "root") { ?>
      <!-- partial -->
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas sidebar-dark" id="sidebar">
        <ul class="nav">
          <li class="nav-item nav-profile">
            <img src="<?php echo base_url(); ?>assets/img/anonymous_emblem.png" alt="profile image">
            <p class="text-center font-weight-medium"><?php echo $this->session->userdata('name'); ?></p>
          </li>
          <li class="nav-item <?php if ($url_1 == "su-dashboard") { echo "active"; }?>">
            <a class="nav-link" href="<?php echo base_url(); ?>su-dashboard">
              <i class="menu-icon icon-grid"></i>
              <span class="menu-title">Dashboard</span>
              <!-- <div class="badge badge-success">3</div> -->
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#hr_management" aria-expanded="false" aria-controls="hr_management">
              <i class="menu-icon icon-people"></i>
              <span class="menu-title">HRM Company</span>
            </a>
            <div class="collapse <?php if($url_1 == "su-add-company" ||$url_1 == "employees"){echo "show"; } ?>" id="hr_management">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item <?php if($url_1 == "su-add-company"){echo "active"; } ?>">
                  <a class="nav-link" href="<?php echo base_url() ?>su-add-company">Tambah Perusahaan</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="<?php echo base_url() ?>su-list-company">List Perusahaan</a>
                </li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url() ?>proout">
              <i class="menu-icon icon-key"></i>
              <span class="menu-title">Sign Out</span>
            </a>
          </li>
        </ul>
      </nav>
    <?php } ?>
