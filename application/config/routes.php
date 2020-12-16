<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(0);
/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$data = explode("/",$_SERVER['REQUEST_URI']);
$uri2 = $this->uri->segment(2);

$route['default_controller'] = 'auth';
$route['404_override'] = 'not_found';
$route['translate_uri_dashes'] = FALSE;

/*
| -------------------------------------------------------------------------
| Sample REST API Routes
| -------------------------------------------------------------------------
*/
$route['api/example/users/(:num)'] = 'api/example/users/id/$1'; // Example 4
$route['api/example/users/(:num)(\.)([a-zA-Z0-9_-]+)(.*)'] = 'api/example/users/id/$1/format/$3$4'; // Example 8
//Masukkan sesuai uri yang di browser, lalu arahkan ke controller
//format nya; $route['uri_di_browser'] = "controller";
//Link Controller

$route['beranda'] = "app/index";
$route['login'] = "auth/index";
$route['su'] = "auth/index";

$route['setting-company'] = "app/set_company";

//authentication
$route['prolog'] = "auth/proLogSystem";
$route['prosu'] = "auth/proSuSystem";
$route['proout'] = "auth/proOutSystem";
$route['getPass'] = "auth/getPass";
$route['uptPass'] = "auth/uptPass";
$route['getUser'] = "auth/getUser";
$route['uptUser'] = "auth/uptUser";

//---------------- Superadmin ---------------------
//dashboard
$route['su-dashboard'] = "root/su_dashboard";
//tambah perusahaan
$route['su-add-company'] = "root/add_company";
$route['saveCom'] = "root/saveCom";
$route['delCom'] = "root/delCom";
$route['edtCom'] = "root/edtCom";
$route['uptCom'] = "root/uptCom";
$route['susCom'] = "root/susCom";
$route['unsusCom'] = "root/unsusCom";
$route['showAddCom'] = "root/showAddCom";
//list perusahaan
$route['su-list-company'] = "root/list_company";

//---------------- HRM ---------------------
//overview
$route['hrm-overview'] = "hrm/hrm_overview";
//employee
$route['employees'] = "hrm/employee";
$route['saveemployee'] = "hrm/saveemployee";
$route['delEmp/'.$uri2] = "hrm/delEmp";
$route['edtEmp'] = "hrm/edtEmp";
$route['uptEmp'] = "hrm/uptEmp";
$route['detail-employee'] = "hrm/detailEmp";
$route['detail-staff'] = "hrm/detailEmp";
//Department
$route['departments'] = "hrm/department";
$route['saveDep'] = "hrm/saveDep";
$route['delDep'] = "hrm/delDep";
$route['edtDep'] = "hrm/edtDep";
$route['uptDep'] = "hrm/uptDep";
$route['showSubDep'] = "hrm/showSubDep";
//designation
$route['designations'] = "hrm/designation";
$route['saveDes'] = "hrm/saveDes";
$route['delDes/'.$uri2] = "hrm/delDes";
$route['edtDes'] = "hrm/edtDes";
$route['uptDes'] = "hrm/uptDes";
//announcement
$route['announcement'] = "hrm/announcement";
$route['saveAnn'] = "hrm/saveAnn";
$route['delAnn'] = "hrm/delAnn";
$route['edtAnn'] = "hrm/edtAnn";
$route['uptAnn'] = "hrm/uptAnn";
$route['showSelEmp'] = "hrm/showSelEmp";
$route['delSel'] = "hrm/delSel";
//reporting
$route['hrm-report'] = "hrm/hrm_report";
//------------- end HRM --------------------

//------------- leave ----------------------
//request
$route['leave-request'] = "leave/request";
$route['saveReq'] = "leave/saveReq";
$route['delReq/'.$data[2]] = "leave/delReq";
$route['edtReq'] = "leave/edtReq";
$route['uptReq'] = "leave/uptReq";
$route['showReq'] = "leave/showReq";
$route['showSelReq'] = "leave/showSelReq";
$route['delDetReq'] = "leave/delDetReq";
//entitle
$route['leave-entitlement'] = "leave/leave_entitlement";
//holiday
$route['holidays'] = "leave/holiday";
$route['saveHoli'] = "leave/saveHoli";
$route['delHoli/'.$data[2]] = "leave/delHoli";
$route['edtHoli'] = "leave/edtHoli";
$route['uptHoli'] = "leave/uptHoli";
//report
$route['leave-report'] = "leave/leave_report";
//calendar
$route['leave-calendar'] = "leave/calendar";
$route['getCal'] = "leave/getCal";
//------------- end leave ----------------------

//------------- attendance ----------------------
//attendance
$route['attendance'] = "attendance/attendance";
//shift
$route['shift'] = "attendance/shift";
//export/import
$route['import-export'] = "attendance/ex_im";

//----------- end attendance --------------------

//------------- recruitment --------------------------
//job opening
$route['job-opening'] = "recruitment/job_opening";
//candidate
$route['candidates'] = "recruitment/candidate";
//rec calendar
$route['recruitment-calendar'] = "recruitment/rec_calendar";
//rec report
$route['recruitment-report'] = "recruitment/rec_report";
//------------- end recruitment ----------------------

//------------- client --------------------------
//oberview
$route['clients-overview'] = "clients/clients_overview";

//contact
$route['contacts'] = "clients/contacts";
$route['saveCon'] = "clients/saveCon";
$route['delCon/'.$data[2]] = "clients/delCon";
$route['edtCon'] = "clients/edtCon";
$route['uptCon'] = "clients/uptCon";
$route['viewCon'] = "clients/viewCon";
$route['showAddCon'] = "clients/showAddCon";
//companies
$route['companies'] = "clients/companies";
//activity
$route['activities'] = "clients/activities";

//card
$route['contact-profile'] = "clients/card";

//------------- maintenance --------------------------
//overview
$route['main-overview'] = "maintenance/main_overview";
$route['saveOver'] = "maintenance/saveOver";
$route['getQuestion'] = "maintenance/getQuestion";
$route['confirmDel'] = "maintenance/confirmDel";
$route['delList/'.$data[2]] = "maintenance/delList";
$route['date-click'] = "maintenance/date_click";

//list
$route['list-maintenance'] = "maintenance/listing";

//sticker
$route['sticker/'.$data[2]] = "maintenance/sticker";
$route['sticker'] = "maintenance/sticker";
$route['saveStick'] = "maintenance/saveStick";
$route['delStick/'.$data[2]] = "maintenance/delStick";
$route['edtStick'] = "maintenance/edtStick";
$route['uptStick'] = "maintenance/uptStick";

//category
$route['category'] = "maintenance/category";
$route['saveCat'] = "maintenance/saveCat";
$route['delCat/'.$data[2]] = "maintenance/delCat";
$route['edtCat'] = "maintenance/edtCat";
$route['uptCat'] = "maintenance/uptCat";


//------------- settings --------------------------
//settigng
$route['settings'] = "setting/setting";
$route['uptSetting'] = "setting/uptSetting";
//hrmsetting
$route['setting-hrm'] = "setting/set_hrm";

//addon
$route['add-ons'] = "setting/add_on";
//set
$route['setting-attendance'] = "setting/set_attendance";
$route['saveGrace'] = "setting/saveGrace";
//work
$route['work-days'] = "setting/work_days";
$route['uptWork'] = "setting/uptWork";
//trip
$route['trip_add'] = "setting/trip_adding";
$route['trip_deleting'] = "setting/trip_delete";
$route['trip_edit'] = "setting/trip_edit";
$route['trip_update'] = "setting/trip_update"; 
//shift
$route['shift_add'] = "setting/shift_adding";
$route['shift_deleting'] = "setting/shift_delete";
$route['shift_edit'] = "setting/shift_edit";
$route['shift_update'] = "setting/shift_update"; 
//machine
$route['machine_add'] = "setting/machine_adding";
$route['machine_deleting'] = "setting/machine_delete";
$route['machine_edit'] = "setting/machine_edit";
$route['machine_update'] = "setting/machine_update"; 


//------------- accounting --------------------------
//Overview
$route['accounting-overview'] = "accounting/acc_overview";
//vendor
$route['vendors'] = "accounting/vendor";
$route['saveVen'] = "accounting/saveVen";
$route['delVen/'.$data[2]] = "accounting/delVen";
$route['edtVen'] = "accounting/edtVen";
$route['uptVen'] = "accounting/uptVen";
$route['showVen'] = "accounting/showVen";
//sales
$route['sales'] = "accounting/sales";
//axpanse
$route['expense'] = "accounting/expense";
//coa
$route['chart-of-accounts'] = "accounting/coa";
$route['saveCoa'] = "accounting/saveCoa";
$route['delCoa'] = "accounting/delCoa";
$route['edit_coa'] = "accounting/edit_coa";
$route['uptCoa'] = "accounting/uptCoa";
$route['showCoa'] = "accounting/showCoa";
//bank
$route['bank-accounts'] = "accounting/bank_account";
//jurnal
$route['journal-entry'] = "accounting/journal_entry";
//acc
$route['accounting-report'] = "accounting/acc_report";
//customers
$route['customers'] = "accounting/customers";

//------------- payroll --------------------------
//Overview
$route['payroll-overview'] = "payroll/pay_overview";
//calendar
$route['pay-calendar'] = "payroll/pay_calendar";
//payrun
$route['pay-run'] = "payroll/pay_run";
//payreport
$route['payroll-report'] = "payroll/pay_report";
//setpayr0ll
$route['setting-payroll'] = "payroll/set_payroll";

//------------- payroll --------------------------
//allotment
$route['allotments'] = "asset/allotment";
//assets_request
$route['assets-requests'] = "asset/assets_request";

//------------- cargo --------------------------
//quotation
$route['quotation'] = "cargo/quotation";
$route['add-quotation'] = "cargo/add_quotation";
$route['savequotation'] = "cargo/savequotation";
$route['upquotation'] = "cargo/upQuo";
$route['delQuo/'.$data[2]] = "cargo/delQuo";
$route['saveratequote'] = "cargo/saveRC";
$route['editRate'] = "cargo/editRate";
$route['uptRate'] = "cargo/uptRate";
$route['delRate/'.$data[2]] = "cargo/delRate";
$route['saveEst'] = "cargo/saveEst";
$route['editEst'] = "cargo/editEst";
$route['uptEst'] = "cargo/uptEst";
$route['delEst/'.$data[2]] = "cargo/delEst";
$route['createJob'] = "cargo/add_job_order";
//item cost
$route['item-cost'] = "cargo/item_cost";
$route['new_item'] = "cargo/add_item";
$route['get_item'] = "cargo/get_data_item";
$route['updated_item'] = "cargo/updated_item";
$route['deleted_item'] = "cargo/deleted_item";
//unit
$route['unit'] = "cargo/unity";
$route['new_unit'] = "cargo/add_unity";
$route['get_unit'] = "cargo/get_data_status";
$route['updated_unit'] = "cargo/updated";
$route['deleted_unit'] = "cargo/deleted";
//job order
$route['job-order'] = "cargo/job_order";
$route['add-job-order'] = "cargo/add_job_order";
$route['saveJob'] = "cargo/saveJob";
$route['uptJob'] = "cargo/uptJob";
$route['add_jo_container'] = "cargo/add_jo_container";
$route['del_jo_container'] = "cargo/del_jo_container";
$route['edit_jo_container'] = "cargo/edit_jo_container";
$route['update_jo_container'] = "cargo/update_jo_container";
$route['add_jo_pieces'] = "cargo/add_jo_pieces";
$route['del_jo_pieces'] = "cargo/del_jo_pieces";
$route['edit_jo_pieces'] = "cargo/edit_jo_pieces";
$route['update_jo_pieces'] = "cargo/update_jo_pieces";
$route['add_jo_status'] = "cargo/add_jo_status";
$route['del_jo_status'] = "cargo/del_jo_status";
$route['edit_jo_status'] = "cargo/edit_jo_status";
$route['update_jo_status'] = "cargo/update_jo_status";
// port
$route['cargo-port'] = "cargo/port";
$route['new_port'] = "cargo/add_port";
$route['deleted_port'] = "cargo/deleted_port";
$route['get_port'] = "cargo/get_port";
$route['updated_port'] = "cargo/updated_port";
// airlines
$route['airlines'] = "cargo/airlines";
$route['add_airlines'] = "cargo/add_airlines";
$route['get_airlines'] = "cargo/get_airlines";
$route['updated_airlines'] = "cargo/updated_airlines";
$route['deleted_airlines'] = "cargo/deleted_airlines";
// consignee
$route['consignee'] = "cargo/consignee";
$route['add_consignee'] = "cargo/add_consignee";
$route['get_consignee'] = "cargo/get_consignee";
$route['updated_consignee'] = "cargo/updated_consignee";
$route['deleted_consignee'] = "cargo/deleted_consignee";
//setting
$route['branch-office'] = "cargo/setting";
$route['branch_office_add'] = "cargo/branch_office_adding";
$route['branch_office_deleting'] = "cargo/branch_office_delete";
$route['branch_office_edit'] = "cargo/branch_office_edit";
$route['branch_office_update'] = "cargo/branch_office_update";

//-------------architecture-------------------
$route['all-project'] = "architecture/all_project";
$route['add-project'] = "architecture/add_project";
$route['region-regency'] = "architecture/regency";
$route['region-distric'] = "architecture/distric";
$route['region-vallige'] = "architecture/vallige";
$route['categories'] = "architecture/categori";
$route['rab-borongan'] = "architecture/rab_borongan";
$route['rab-penawaran'] = "architecture/rab_penawaran";
$route['worker-level'] = "architecture/worker_level";
$route['worker-types'] = "architecture/worker_types";
$route['new_category'] = "architecture/add_categories";
$route['deleted_arch'] = "architecture/deleted";
$route['get_arch'] = "architecture/get_data_status";
$route['updated_arch'] = "architecture/updated";
$route['new_worker'] = "architecture/created_worker";
$route['deleted_worker'] = "architecture/deleted_worker";
$route['get_worker'] = "architecture/get_data_worker";
$route['update_worker'] = "architecture/update_workerlevel";
$route['new_subtypes'] = "architecture/created_subtypes";
$route['deleted_subtypes'] = "architecture/deleted_subtypes";
$route['get_subtypes'] = "architecture/get_data_subtypes";
$route['update_subtypes'] = "architecture/update_subtypes";
$route['new_allproject'] = "architecture/created_allproject";
$route['edit_allproject'] = "architecture/edit_allproject";
$route['update_allproject'] = "architecture/update_allproject";
$route['delete_allproject'] = "architecture/delete_allproject";
$route['worker-all'] = "architecture/worker";
$route['add-add-add'] = "architecture/add_add_add";
$route['get-get-get'] ="architecture/get_data_worker_c";
$route['del-del-del'] ="architecture/deleted_worker_c";
$route['update-update-update'] = "architecture/update_workerlevel_c";
$route['workers-checkins'] = "architecture/workers_checkins";
$route['workers-overtimes'] = "architecture/workers_overtimes";
$route['get_cll']="architecture/get_cll";
$route['gambar'] = "architecture/gambar";
$route['muncul'] ="architecture/dataaa";
// $route['contohh'] ="architecture/contoh";
//--------------- print pdf------------------------
$route['print-quotation/'.$data[2]] = "pdf_control/quotation";
$route['print-job-order/'.$data[2]] = "pdf_control/job_order";


//-----------------employeapi----------------------
// $route['employe/(:any)'] = "api/employe/$1";

//---------------- Patients ---------------------
//patient
$route['patients-overview'] = "patient/overview";
//case
$route['cases'] = "patient/cases";
$route['saveemployee'] = "hrm/saveemployee";
$route['delEmp/'.$data[2]] = "hrm/delEmp";
$route['edtEmp'] = "hrm/edtEmp";
$route['uptEmp'] = "hrm/uptEmp";
$route['viewEmp'] = "hrm/viewEmp";
//admission
$route['patient-admissions'] = "patient/admissions";
$route['saveDep'] = "hrm/saveDep";
$route['delDep'] = "hrm/delDep";
$route['edtDep'] = "hrm/edtDep";
$route['uptDep'] = "hrm/uptDep";
$route['showSubDep'] = "hrm/showSubDep";
//designation
$route['case-handlers'] = "patient/case_handlers";
$route['saveDes'] = "hrm/saveDes";
$route['delDes/'.$data[2]] = "hrm/delDes";
$route['edtDes'] = "hrm/edtDes";
$route['uptDes'] = "hrm/uptDes";
//------------- end Patients --------------------

//---------------- Doctors ---------------------
//doctor
$route['doctors-overview'] = "doctor/overview";
//case
$route['doctor-departments'] = "doctor/department";
$route['saveemployee'] = "hrm/saveemployee";
$route['delEmp/'.$data[2]] = "hrm/delEmp";
$route['edtEmp'] = "hrm/edtEmp";
$route['uptEmp'] = "hrm/uptEmp";
$route['viewEmp'] = "hrm/viewEmp";
//schedule
$route['schedules'] = "doctor/schedule";
$route['saveDep'] = "hrm/saveDep";
$route['delDep'] = "hrm/delDep";
$route['edtDep'] = "hrm/edtDep";
$route['uptDep'] = "hrm/uptDep";
$route['showSubDep'] = "hrm/showSubDep";
//designation
$route['prescriptions'] = "doctor/prescription";
$route['saveDes'] = "hrm/saveDes";
$route['delDes/'.$data[2]] = "hrm/delDes";
$route['edtDes'] = "hrm/edtDes";
$route['uptDes'] = "hrm/uptDes";
//------------- end Doctors --------------------

//-------------- Nurse ------------------------
$route['nurse'] = "nurse";
//-------------- End Nurse --------------------

//-------------- Medicine ------------------------
$route['medicines-overview'] = "medicine/overview";
$route['medicine-categories'] = "medicine/category";
$route['medicine-brands'] = "medicine/brand";
//-------------- End Medicine --------------------

//---------------- Beds ---------------------
//doctor
$route['beds-overview'] = "bed/overview";
//case
$route['bed-list'] = "bed/bed_list";
$route['saveemployee'] = "hrm/saveemployee";
$route['delEmp/'.$data[2]] = "hrm/delEmp";
$route['edtEmp'] = "hrm/edtEmp";
$route['uptEmp'] = "hrm/uptEmp";
$route['viewEmp'] = "hrm/viewEmp";
//assign
$route['bed-assigns'] = "bed/assign";
$route['saveDep'] = "hrm/saveDep";
$route['delDep'] = "hrm/delDep";
$route['edtDep'] = "hrm/edtDep";
$route['uptDep'] = "hrm/uptDep";
$route['showSubDep'] = "hrm/showSubDep";
//designation
$route['designations'] = "hrm/designation";
$route['saveDes'] = "hrm/saveDes";
$route['delDes/'.$data[2]] = "hrm/delDes";
$route['edtDes'] = "hrm/edtDes";
$route['uptDes'] = "hrm/uptDes";
//------------- end Beds --------------------

//---------------- Activity ---------------------
//birth
$route['birth'] = "activity/birth";
//death
$route['death'] = "activity/death";
$route['saveemployee'] = "hrm/saveemployee";
$route['delEmp/'.$data[2]] = "hrm/delEmp";
$route['edtEmp'] = "hrm/edtEmp";
$route['uptEmp'] = "hrm/uptEmp";
$route['viewEmp'] = "hrm/viewEmp";
//operation
$route['operation'] = "activity/operation";
$route['saveDep'] = "hrm/saveDep";
$route['delDep'] = "hrm/delDep";
$route['edtDep'] = "hrm/edtDep";
$route['uptDep'] = "hrm/uptDep";
$route['showSubDep'] = "hrm/showSubDep";
//------------- end Activity --------------------

//---------------- Product ---------------------
//overview
$route['product-overview'] = "product/overview";
//alat berat
$route['alat-berat'] = "product/alat_berat";
//overview
$route['sparepart'] = "product/sparepart";
//------------- end Product --------------------

//---------------- Services ---------------------
//overview
$route['service-overview'] = "services/overview";
//alat berat
$route['sewa-alat-berat'] = "services/sewa_alat_berat";
//overview
$route['jasa-tambang'] = "services/jasa_tambang";
//------------- end Services --------------------

//---------------- Log User ---------------------
$route['log-user'] = "log/index";
$route['log-userd'] = "auth/log";
//---------------- End Log User -----------------