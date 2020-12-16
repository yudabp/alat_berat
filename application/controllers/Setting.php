<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting extends CI_Controller {

  public function __construct(){
    parent::__construct();
    $this->api->CheckSession();
     date_default_timezone_set("Asia/Jakarta");
     //qazwsxedc();
  }

  /*public function set_attendance()
  {
    $this->load->view('setting_attendance');
  }*/

  public function set_hrm()
  {
    $data['info'] = $this->db->get_where('company',['idcompany'=>$this->session->userdata('idcompany')])->row();
    $data['workdays'] = $this->db->get_where('hrm_setting_workdays',['idcompany'=>$this->session->userdata('idcompany')])->row();
    $data['trips'] = $this->db->get_where('hrm_setting_trip',['idcompany'=>$this->session->userdata('idcompany')])->result();
    $data['shifts'] = $this->db->get_where('hrm_setting_shift',['idcompany'=>$this->session->userdata('idcompany')])->result();
    $data['machines'] = $this->db->get_where('hrm_setting_machine',['idcompany'=>$this->session->userdata('idcompany')])->result();
    // var_dump($data['trips']);
    // exit;
    $data['gracetime'] = $this->db->get_where('hrm_setting_gracetime',['idcompany'=>$this->session->userdata('idcompany')])->row();
    // $data['view_attendance'] = $this->load->view('setting/hr-setting-attendance',$data);
    $this->load->view('setting/hr management',$data);
  }

  public function setting()
  {
    $data['info'] = $this->db->get_where('company',['idcompany'=>$this->session->userdata('idcompany')])->row();
    $a = $this->db->order_by('addsetcreated','asc')
                  ->get_where('address_company',['idcompany'=>$this->session->userdata('idcompany')]);
    $data['numadd'] = $a->num_rows();
    $data['firstaddr'] = $a->row();
    $data['alladdr'] = $a->result();
    $this->load->view('setting/setting',$data);
  }

  public function uptSetting(){
    $id = $this->session->userdata( 'idcompany');
    $nama_perusahaan = $this->input->post('nama_perusahaan');
    $hr_manager = $this->input->post('hr_manager');
    $no_telp = $this->input->post('no_telp');
    $email = $this->input->post('email');
    $website = $this->input->post('website');
    $address = $this->input->post('company_address');


    $inGet = $this->ShowModel->getDataWHere('company',['idcompany'=>$id]);
    $a = $inGet->row();
    if(!empty($_FILES['photo']['name'])){

      if($inGet->num_rows() > 0){

        if($a->comphoto!=""){
          $data_path = "./assets/company/".$a->comphoto;
          unlink($data_path);
        }
      }
	            $renamefile  = imgRandom();
	            //Config File
	            $config['upload_path'] = './assets/company/';
	            $config['allowed_types'] = 'jpg|jpeg|png';
	            $config['file_name'] = $renamefile;

	            $this->load->library('upload', $config);
	            $uploading = $this->upload->do_upload('photo');

	        	if($uploading){
		            $hasil = $this->upload->data();
		            $name_img = $hasil['file_name'];
	          	}
	        }else{
              $name_img = $a->comphoto;
          }

    $inEnter = $this->InsertModel->uptdata('company',[
      'companyname'=>$nama_perusahaan,
      'penanggungjawab'=>$hr_manager,
      'notelp'=>$no_telp,
      'email'=>$email,
      'website'=>$website,
      'comphoto'=>$name_img
    ],['idcompany'=>$id]);

    $inAddress = $this->InsertModel->uptdata('address_company',[
      'addcompany'=>$address,
    ],['idcompany'=>$id]);

      // $indel = $this->db->delete('address_company',['idcompany'=>$id]);
      // $value = array();
      //   foreach ($address as $key) {
      //     array_push($value,array(
      //       'idcompany'=>$id,
      //       'addcompany'=>$key,
      //     ));
      //   }
        //echo json_encode($value);
        // $save = $this->db->insert_batch('address_company',$value);

    if($inEnter==TRUE && $inAddress==TRUE){
      $this->session->set_flashdata('suc','Data has been updated');
      redirect('settings');
    }else{
      echo"fail";
    }
  }

  public function set_attendance()
  {
    $data['info'] = $this->db->get_where('company',['idcompany'=>$this->session->userdata('idcompany')])->row();
    $this->load->view('setting/attendance',$data);
  }

  public function saveGrace(){
    $id = $this->uuid->v4();
    $bcheckin = $this->input->post('before_check_in');
    $acheckin = $this->input->post('after_check_in');
    $bcheckout = $this->input->post('before_check_out');
    $acheckout = $this->input->post('after_check_out');
    $self_service = $this->input->post('self_service');
    $shift = $this->input->post('shift');
    $ostart = $this->input->post('office_start');
    $oend = $this->input->post('office_end');
    $idcom = $this->session->userdata('idcompany');
    $inCheck = $this->db->get_where('hrm_setting_gracetime',['idcompany'=>$idcom]);
    if($inCheck->num_rows() > 0){
      $inUpt = $this->InsertModel->uptdata('hrm_setting_gracetime',[
        'before_check_in'=>$bcheckin,
        'after_check_in'=>$acheckin,
        'before_check_out'=>$bcheckout,
        'after_check_out'=>$acheckout,
        'self_service' => $self_service,
        'shift' => $shift,
        'office_start'=>$ostart,
        'office_end'=>$oend,
      ],['idcompany'=>$idcom]);
    }else{
      $inSave = $this->InsertModel->indata('hrm_setting_gracetime',[
        'idgracetime'=>$id,
        'idcompany'=>$idcom,
        'before_check_in'=>$bcheckin,
        'after_check_in'=>$acheckin,
        'before_check_out'=>$bcheckout,
        'after_check_out'=>$acheckout,
        'self_service' => $self_service,
        'shift' => $shift,
        'office_start'=>$ostart,
        'office_end'=>$oend,
      ]);
    }

    if($inSave || $inUpt){
      $this->session->set_flashdata('suc','Perubahan berhasil disimpan');
      redirect('setting-hrm');
    }
  }

  public function work_days()
  {
    $data['info'] = $this->db->get_where('company',['idcompany'=>$this->session->userdata('idcompany')])->row();

    $this->load->view('setting/work days',$data);
  }

  public function uptWork(){
    $id = $this->uuid->v4();
    
    $sun = $this->input->post('sunday');
    $sun_start = $this->input->post('sunday_start');
    $sun_end = $this->input->post('sunday_end');
    if($sun==="non"){$sun_start = $sun_end=0;}

    $mon = $this->input->post('monday');
    $mon_start = $this->input->post('monday_start');
    $mon_end = $this->input->post('monday_end');
    if($mon==="non"){$mon_start = $mon_end=0;}

    $tue = $this->input->post('tuesday');
    $tue_start = $this->input->post('tuesday_start');
    $tue_end = $this->input->post('tuesday_end');
    if($tue==="non"){$tue_start = $tue_end=0;}

    $wed = $this->input->post('wednesday');
    $wed_start = $this->input->post('wednesday_start');
    $wed_end = $this->input->post('wednesday_end');
    if($wed==="non"){$wed_start = $wed_end=0;}

    $thu = $this->input->post('thursday');
    $thu_start = $this->input->post('thursday_start');
    $thu_end = $this->input->post('thursday_end');
    if($thu==="non"){$thu_start = $thu_end=0;}

    $fri = $this->input->post('friday');
    $fri_start = $this->input->post('friday_start');
    $fri_end = $this->input->post('friday_end');
    if($fri==="non"){$fri_start = $fri_end=0;}

    $sat = $this->input->post('saturday');
    $sat_start = $this->input->post('saturday_start');
    $sat_end = $this->input->post('saturday_end');
    if($sat==="non"){$sat_start = $sat_end=0;}

    $inGet = $this->db->get_where('hrm_setting_workdays',['idcompany'=>$this->session->userdata('idcompany')]);
    if($inGet->num_rows() > 0){
        $inSave = $this->db->where(['idcompany'=>$this->session->userdata('idcompany')])
                          ->update('hrm_setting_workdays',[
                            'sun'=>$sun,
                            'sun_start'=>$sun_start,
                            'sun_end'=>$sun_end,
                            'mon'=>$mon,
                            'mon_start'=>$mon_start,
                            'mon_end'=>$mon_end,
                            'tue'=>$tue,
                            'tue_start'=>$tue_start,
                            'tue_end'=>$tue_end,
                            'wed'=>$wed,
                            'wed_start'=>$wed_start,
                            'wed_end'=>$wed_end,
                            'thu'=>$thu,
                            'thu_start'=>$thu_start,
                            'thu_end'=>$thu_end,
                            'fri'=>$fri,
                            'fri_start'=>$fri_start,
                            'fri_end'=>$fri_end,
                            'sat'=>$sat,
                            'sat_start'=>$sat_start,
                            'sat_end'=>$sat_end,
                          ]);
    }else{
      $inSave = $this->db->insert('hrm_setting_workdays',[
                          'idwork' =>$id,
                          'idcompany'=>$this->session->userdata('idcompany'),
                          'sun'=>$sun,
                            'sun_start'=>$sun_start,
                            'sun_end'=>$sun_end,
                            'mon'=>$mon,
                            'mon_start'=>$mon_start,
                            'mon_end'=>$mon_end,
                            'tue'=>$tue,
                            'tue_start'=>$tue_start,
                            'tue_end'=>$tue_end,
                            'wed'=>$wed,
                            'wed_start'=>$wed_start,
                            'wed_end'=>$wed_end,
                            'thu'=>$thu,
                            'thu_start'=>$thu_start,
                            'thu_end'=>$thu_end,
                            'fri'=>$fri,
                            'fri_start'=>$fri_start,
                            'fri_end'=>$fri_end,
                            'sat'=>$sat,
                            'sat_start'=>$sat_start,
                            'sat_end'=>$sat_end,
                        ]);
    }

    if($inSave){
      $this->session->set_flashdata('suc','Work days berhasil disimpan');
      redirect('setting-hrm');
    }
  }

  // TRIP
  public function trip_adding(){
    $idcompany = $this->session->userdata("idcompany");
    $idtrip = $this->uuid->v4();
    $trip_name = $this->input->post("trip_name");
    $trip_start = $this->input->post("trip_start");
    $trip_end = $this->input->post("trip_end");

    $this->db->insert("hrm_setting_trip", ['idtrip' => $idtrip, "idcompany" => $idcompany, "trip_name" => $trip_name, "trip_start" => $trip_start, "trip_end" => $trip_end]);

    $data = array("callback" => "yes");
    echo json_encode($data);
  }

  public function trip_edit(){
    $idtrip = $this->input->post("trip_id");
    $idcompany = $this->session->userdata("idcompany");

    $data = $this->db->get_where("hrm_setting_trip", ['idtrip' => $idtrip, "idcompany" => $idcompany])->row_array();

    echo json_encode($data);
  }
  
  public function trip_update(){
    $idtrip = $this->input->post("trip_id");
    $idcompany = $this->session->userdata("idcompany");
    $trip_name = $this->input->post("trip_name");
    $trip_start = $this->input->post("trip_start");
    $trip_end = $this->input->post("trip_end");

    $this->db->update("hrm_setting_trip", ['trip_name' => $trip_name, "trip_start" => $trip_start, "trip_end" => $trip_end], ['idtrip' => $idtrip, 'idcompany' => $idcompany]);

    $data = array("callback" => "yes");
    echo json_encode($data);
  }

  public function trip_delete(){
    $idtrip = $this->input->post("trip_id");
    // echo $idtrip;
    // exit;
    $idcompany = $this->session->userdata("idcompany");

    $this->db->delete("hrm_setting_trip", ['idtrip' => $idtrip, 'idcompany' => $idcompany]);

    $data= array("callback" => "yes");
    echo json_encode($data);
  }
  // END TRIP

  // SHIFT
  public function shift_adding(){
    $idcompany = $this->session->userdata("idcompany");
    $idshift = $this->uuid->v4();
    $shift_name = $this->input->post("shift_name");
    $shift_start = $this->input->post("shift_start");
    $shift_end = $this->input->post("shift_end");

    $this->db->insert("hrm_setting_shift", ['idshift' => $idshift, "idcompany" => $idcompany, "shift_name" => $shift_name, "shift_start" => $shift_start, "shift_end" => $shift_end]);

    $data = array("callback" => "yes");
    echo json_encode($data);
  }

  public function shift_edit(){
    $idshift = $this->input->post("shift_id");
    $idcompany = $this->session->userdata("idcompany");

    $data = $this->db->get_where("hrm_setting_shift", ['idshift' => $idshift, "idcompany" => $idcompany])->row_array();

    echo json_encode($data);
  }
  
  public function shift_update(){
    $idshift = $this->input->post("idshift");
    $idcompany = $this->session->userdata("idcompany");
    $shift_name = $this->input->post("shift_name");
    $shift_start = $this->input->post("shift_start");
    $shift_end = $this->input->post("shift_end");

    $this->db->update("hrm_setting_shift", ['shift_name' => $shift_name, "shift_start" => $shift_start, "shift_end" => $shift_end], ['idshift' => $idshift, 'idcompany' => $idcompany]);

    $data = array("callback" => "yes");
    echo json_encode($data);
  }

  public function shift_delete(){
    $idshift = $this->input->post("shift_id");
    // echo $idshift;
    // exit;
    $idcompany = $this->session->userdata("idcompany");

    $this->db->delete("hrm_setting_shift", ['idshift' => $idshift, 'idcompany' => $idcompany]);

    $data= array("callback" => "yes");
    echo json_encode($data);
  }
  // END SHIFT

  // MACHINE
  public function machine_adding(){
    $idcompany = $this->session->userdata("idcompany");
    $idmachine = $this->uuid->v4();
    $machine_name = $this->input->post("machine_name");
    $machine_start = $this->input->post("machine_start");
    $machine_end = $this->input->post("machine_end");

    $this->db->insert("hrm_setting_machine", ['idmachine' => $idmachine, "idcompany" => $idcompany, "machine_name" => $machine_name, "machine_start" => $machine_start, "machine_end" => $machine_end]);

    $data = array("callback" => "yes");
    echo json_encode($data);
  }

  public function machine_edit(){
    $idmachine = $this->input->post("machine_id");
    $idcompany = $this->session->userdata("idcompany");

    $data = $this->db->get_where("hrm_setting_machine", ['idmachine' => $idmachine, "idcompany" => $idcompany])->row_array();

    echo json_encode($data);
  }
  
  public function machine_update(){
    $idmachine = $this->input->post("machine_id");
    $idcompany = $this->session->userdata("idcompany");
    $machine_name = $this->input->post("machine_name");
    $machine_start = $this->input->post("machine_start");
    $machine_end = $this->input->post("machine_end");

    $this->db->update("hrm_setting_machine", ['machine_name' => $machine_name, "machine_start" => $machine_start, "machine_end" => $machine_end], ['idmachine' => $idmachine, 'idcompany' => $idcompany]);

    $data = array("callback" => "yes");
    echo json_encode($data);
  }

  public function machine_delete(){
    $idmachine = $this->input->post("machine_id");
    // echo $idmachine;
    // exit;
    $idcompany = $this->session->userdata("idcompany");

    $this->db->delete("hrm_setting_machine", ['idmachine' => $idmachine, 'idcompany' => $idcompany]);

    $data= array("callback" => "yes");
    echo json_encode($data);
  }
  // END SHIFT

  public function add_on()
  {
    $data['info'] = $this->db->get_where('company',['idcompany'=>$this->session->userdata('idcompany')])->row();
    $this->load->view('setting/add_on',$data);
  }

}
?>
