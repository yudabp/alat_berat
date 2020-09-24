<?php
if(!defined('BASEPATH')) exit('no file allowed');
class Leave extends CI_Controller{
  public function __construct(){
    parent::__construct();
     date_default_timezone_set("Asia/Jakarta");
     $this->api->CheckSession();
     qazwsxedc();
  }

  //request
  public function request()
  {
    $idcompany = $this->session->userdata('idcompany');
    $data['view'] = $this->db->get_where('employee',['idcompany'=>$this->session->userdata('idcompany')])->result();
    $data['req'] = $this->db->query("SELECT *, sum(leavereq.days) as tot FROM `leavereq` JOIN employee on (employee.employeid = leavereq.mainid) where leavereq.idcompany='$idcompany' GROUP BY leavereq.mainid ")->result();
    $data['info'] = $this->db->get_where('company',['idcompany'=>$this->session->userdata('idcompany')])->row();
    $this->load->view('leave/request',$data);
  }

  public function saveReq(){
    $id = $this->uuid->v4();
    $employee_name = $this->input->post('employee_name');
    $from_date = $this->input->post('from_date');
    $to_date = $this->input->post('to_date');
    $reason = $this->input->post('reason');
    $empex = explode(" ",$employee_name);
    $exdata = explode("/",$from_date);
    $exdatatwo = explode("/",$to_date);

    $cal = CAL_GREGORIAN;
    $bulan = $exdata[1];
    $tahun = $exdata[2];
    $day = cal_days_in_month($cal,$bulan,$tahun);
    $currentday1 = $exdata[0];
    $a = $day - $currentday1;

    $bulan2 = $exdatatwo[1];
    $tahun2 = $exdatatwo[2];
    $day2 = cal_days_in_month($cal,$bulan2,$tahun2);
    $currentday2 = $exdatatwo[0];
    $b = $day2 - $currentday2;
    if($exdatatwo[2]==date('Y')+1){
      $days = $a + $exdatatwo[0];
    }else{
      if($exdata[1]==$exdatatwo[1]){
        $days = $a - $b;
      }else{
        $days = $a + $exdatatwo[0];
      }
    }

    $inGet = $this->db->get_where('employee',['employeid'=>$empex[0],'idcompany'=>$this->session->userdata('idcompany')])->row();

    $inCheck = $this->db->get_where('leavereq',['mainid'=>$inGet->mainid])->num_rows();
    if($inCheck > 0){
      $inGet = $this->db->query("select sum(days) as total from leavereq where mainid='$inGet->mainid'")->row();
      $asd = $inGet->total;
    }else {
      $asd = 0;
    }
    $qwe = $days + $asd;

    $left = $inGet->available - $asd;

    if($left != 0){
      if($days<12 && $qwe < 12 && $days <= $inGet->available){
        //$this->db->where(['mainid'=>$inGet->mainid,'idcompany'=>$this->session->userdata('idcompany')])
          //      ->update('employee',['available'=>$left]);
        $data = $this->InsertModel->indata('leavereq',[
          'idleavereq'=>$id,
          'idcompany'=>$this->session->userdata('idcompany'),
          'mainid'=>$empex[0],
          'fromdate'=>$from_date,
          'todate'=>$to_date,
          'days'=>$days,
          'leavereson'=>$reason
        ]);
        echo json_encode($data);
      }
    }
  }

  public function showSelReq(){
    $id = $this->input->post('id');
    $data = $this->db->order_by('leavecreated','desc')
                     ->get_where('leavereq',['mainid'=>$id])
                     ->result();
    echo json_encode($data);
  }

  public function delReq(){
      //$id = $this->input->post('id');
      $id = $this->uri->segment(2);
      $this->DeleteModel->delItem('leavereq',['mainid'=>$id,'idcompany'=>$this->session->userdata('idcompany')]);
      $this->session->set_flashdata('item','Data has been deleted');
      redirect('leave-request');
  }

  public function delDetReq(){
      $id = $this->input->post('id');
      $this->DeleteModel->delItem('leavereq',['idleavereq'=>$id]);
  }

  public function edtReq(){
    $id = $this->input->post('id');
    $data = $this->db->join('employee','employee.employeid = leavereq.mainid')
                            ->get_where('leavereq',['leavereq.idleavereq'=>$id])
                            ->row_array();
    echo json_encode($data);
  }

  public function uptReq(){
    $id = $this->input->post('keyword');
    $employee_name = $this->input->post('employee_name');
    $from_date = $this->input->post('from_date');
    $to_date = $this->input->post('to_date');
    $reason = $this->input->post('reason');
    $empex = explode(" ",$employee_name);
    $exdata = explode("/",$from_date);
    $exdatatwo = explode("/",$to_date);

    $cal = CAL_GREGORIAN;
    $bulan = $exdata[1];
    $tahun = $exdata[2];
    $day = cal_days_in_month($cal,$bulan,$tahun);
    $currentday1 = $exdata[0];
    $a = $day - $currentday1;

    $bulan2 = $exdatatwo[1];
    $tahun2 = $exdatatwo[2];
    $day2 = cal_days_in_month($cal,$bulan2,$tahun2);
    $currentday2 = $exdatatwo[0];
    $b = $day2 - $currentday2;
    if($exdatatwo[2]==date('Y')+1){
      $days = $a + $exdatatwo[0];
    }else{
      if($exdata[1]==$exdatatwo[1]){
        $days = $a - $b;
      }else{
        $days = $a + $exdatatwo[0];
      }
    }

    $inGet = $this->db->get_where('employee',['employeid'=>$empex[0],'idcompany'=>$this->session->userdata('idcompany')])->row();
    $inCheck = $this->db->get_where('leavereq',['mainid'=>$inGet->mainid])->num_rows();
    if($inCheck > 0){
      $inGet = $this->db->query("select sum(days) as total from leavereq where mainid='$empex[0]'")->row();
      $asd = $inGet->total;
    }else {
      $asd = 0;
    }
    $qwe = $days + $asd;

    $left = $inGet->available - $days;

    //if($inGet->available != 0){
      if($days<12 && $qwe < 12 && $days <= $inGet->available){
        //$this->db->where(['mainid'=>$inGet->mainid,'idcompany'=>$this->session->userdata('idcompany')])
          //      ->update('employee',['available'=>$left]);
        $data = $this->db->where(['idleavereq'=>$id])
                          ->update('leavereq',[
          'mainid'=>$empex[0],
          'fromdate'=>$from_date,
          'todate'=>$to_date,
          'days'=>$days,
          'leavereson'=>$reason
        ]);
        echo json_encode($data);
    //  }
    }
  }

  function tes(){
    $cal = CAL_GREGORIAN;
    $bulan = date('m');
    $tahun = date('Y');
    $day = cal_days_in_month($cal,$bulan,$tahun);
    $currentday1 = date("d");
    $a = $day - $currentday1;

    $bulan2 = 12;
    $tahun2 = 2018;
    $day2 = cal_days_in_month($cal,$bulan2,$tahun2);
    $currentday2 = 15;
    $b = $day2 - $currentday2;

    if(date('Y')+1 == 2019){
      echo date('Y')+1;
    }

    /*$getmo = 12 - $bulan;
    for($i=$bulan;$i<=12;$i++){
      //echo $i." ";
      $bulan3 = $i;
      $tahun3 = date('Y');
      $f[] = $day3 = cal_days_in_month($cal,$bulan3,$tahun3);
    }*/

    $getmo = 12 - $bulan;
    for($i=1;$i<=4;$i++){
      //echo $i." ";
      $bulan3 = $i;
      $tahun3 = 2019;
      $day3[] = cal_days_in_month($cal,$bulan3,$tahun3);
    }
    //echo array_sum($day3);
    //echo $h = array_sum($f) - $currentday1;
    //secho $a + $b;
  }

  //entitle
  public function leave_entitlement()
  {
    $data['info'] = $this->db->get_where('company',['idcompany'=>$this->session->userdata('idcompany')])->row();
    $this->load->view('leave/leave entitlement',$data);
  }


  //holiday
  public function holiday()
  {
    $data['info'] = $this->db->get_where('company',['idcompany'=>$this->session->userdata('idcompany')])->row();
    $data['view'] = $this->db->order_by('holidayscreated','desc')
                             ->get_where('holidays',['idcompany'=>$this->session->userdata('idcompany')])
                             ->result();
    $this->load->view('leave/holiday',$data);
  }

  public function saveHoli(){
    $id = $this->uuid->v4();
    $holiday_name = $this->input->post('holiday_name');
    $description = $this->input->post('description');
    $start_date = $this->input->post('start_date');
    $end_date = $this->input->post('end_date');
    $exdata = explode("/",$start_date);
    $exdatatwo = explode("/",$end_date);
    $cal = CAL_GREGORIAN;
    $bulan = $exdata[1];
    $tahun = $exdata[2];
    $day = cal_days_in_month($cal,$bulan,$tahun);
    $currentday1 = $exdata[0];
    $a = $day - $currentday1;

    $bulan2 = $exdatatwo[1];
    $tahun2 = $exdatatwo[2];
    $day2 = cal_days_in_month($cal,$bulan2,$tahun2);
    $currentday2 = $exdatatwo[0];
    $b = $day2 - $currentday2;
    if($exdatatwo[2]==date('Y')+1){
      $days = $a + $exdatatwo[0];
    }else{
      if($exdata[1]==$exdatatwo[1]){
        $days = $a - $b;
      }else{
        $days = $a + $exdatatwo[0];
      }
    }
    $data = $this->InsertModel->indata('holidays',[
      'idholidays'=>$id,
      'idcompany'=>$this->session->userdata('idcompany'),
      'holidayname'=>$holiday_name,
      'holidaystart'=>$start_date,
      'holidaysend'=>$end_date,
      'holidaysdays'=>$days,
      'holidaysdesc'=>$description
    ]);
  }

  public function delHoli(){
      //$id = $this->input->post('id');
      $id = $this->uri->segment(2);
      $this->DeleteModel->delItem('holidays',['idholidays'=>$id]);
      $this->session->set_flashdata('suc','Data has been deleted');
      redirect('holidays');
  }

  public function edtHoli(){
    $id = $this->input->post('id');
    $data = $this->db->get_where('holidays',['idholidays'=>$id])
                            ->row_array();
    echo json_encode($data);
  }

  public function uptHoli(){
    $id = $this->input->post('keyword');
    $holiday_name = $this->input->post('holiday_name');
    $description = $this->input->post('description');
    $start_date = $this->input->post('start_date');
    $end_date = $this->input->post('end_date');
    $exdata = explode("/",$start_date);
    $exdatatwo = explode("/",$end_date);

    $cal = CAL_GREGORIAN;
    $bulan = $exdata[1];
    $tahun = $exdata[2];
    $day = cal_days_in_month($cal,$bulan,$tahun);
    $currentday1 = $exdata[0];
    $a = $day - $currentday1;

    $bulan2 = $exdatatwo[1];
    $tahun2 = $exdatatwo[2];
    $day2 = cal_days_in_month($cal,$bulan2,$tahun2);
    $currentday2 = $exdatatwo[0];
    $b = $day2 - $currentday2;
    if($exdatatwo[2]==date('Y')+1){
      $days = $a + $exdatatwo[0];
    }else{
      if($exdata[1]==$exdatatwo[1]){
        $days = $a - $b;
      }else{
        $days = $a + $exdatatwo[0];
      }
    }

    $inCheck = $this->db->get_where('holidays',['idholidays'=>$id])->num_rows();
    if($inCheck > 0){
      $inGet = $this->db->query("select sum(holidaysdays) as total from holidays where idholidays='$id'")->row();
      $asd = $inGet->total;
    }else {
      $asd = 0;
    }
    $qwe = $days + $asd;

    if($days<12 && $qwe < 12){
    $data = $this->db->where(['idholidays'=>$id])
                      ->update('holidays',[
                        'holidayname'=>$holiday_name,
                        'holidaystart'=>$start_date,
                        'holidaysend'=>$end_date,
                        'holidaysdays'=>$days,
                        'holidaysdesc'=>$description,
                        'holidayscolor'=>'info'
    ]);
    echo json_encode($data);
    }
  }

  //report
  public function leave_report()
  {
    $data['info'] = $this->db->get_where('company',['idcompany'=>$this->session->userdata('idcompany')])->row();
    $this->load->view('leave/report',$data);
  }


  //calendar
  public function calendar()
  {

    $data['info'] = $this->db->get_where('company',['idcompany'=>$this->session->userdata('idcompany')])->row();
    $data['department'] = $this->db->get_where('department',['idcompany'=>$this->session->userdata('idcompany')])->result();
    $data['designation'] = $this->db->get_where('designation',['idcompany'=>$this->session->userdata('idcompany')])->result();
    $department = $this->input->get('department');
    $designation = $this->input->get('designation');
    $idcompany = $this->session->userdata('idcompany');
    if(isset($department) || isset($designation)){
        if(isset($department )){
          $data['cal'] = $this->db->query("select * from employee join department on(department.iddepartment=employee.department) join leavereq on(leavereq.mainid=employee.employeid) where employee.idcompany='$idcompany' and department.iddepartment='$department' ")->result();
        }elseif( isset($designation )){
          $data['cal'] = $this->db->query("select * from employee join designation on(designation.iddesignation=employee.jobtitle) join leavereq on(leavereq.mainid=employee.employeid) where employee.idcompany='$idcompany' and designation.iddesignation='$designation' ")->result();
        }elseif(isset($department) || isset($designation)){
            $data['cal'] = $this->db->query("select * from employee join designation on(designation.iddesignation=employee.jobtitle) join leavereq on(leavereq.mainid=employee.employeid) where employee.idcompany='$idcompany' and designation.iddesignation='$designation' and department.iddepartment='$department' ")->result();
        }
    }else{
        $data['cal'] = $this->db->get_where('holidays',['idcompany'=>$this->session->userdata('idcompany')])->result();
        
    }
    $this->load->view('leave/calendar',$data);
  }

  public function getCal(){
    $department = $this->input->post('department');
    $designation = $this->input->post('designation');
    $idcompany = $this->session->userdata('idcompany');
    if($department != "null" && $designation == "null"){
      $data = $this->db->query("select * from employee join department on(department.iddepartment=employee.department) join leavereq on(leavereq.mainid=employee.employeid) where employee.idcompany='$idcompany' and department.iddepartment='$department' ")->result();
    }elseif($department == "null" && $designation != "null"){
      $data = $this->db->query("select * from employee join designation on(designation.iddesignation=employee.jobtitle) join leavereq on(leavereq.mainid=employee.employeid) where employee.idcompany='$idcompany' and designation.iddesignation='$designation' ")->result();
    }/*elseif($department != "null" && $designation != "null"){
            $data = $this->db->query("select * from employee join designation on(designation.iddesignation=employee.jobtitle) join leavereq on(leavereq.mainid=employee.employeid) where employee.idcompany='$idcompany' and designation.iddesignation='$designation' and department.iddepartment='$department' ")->result();
        }*/
    echo json_encode($data);
  }
}
