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
    $data['work'] = $this->db->get_where('work_days',['idcompany'=>$this->session->userdata('idcompany')])->row();
    $data['gracetime'] = $this->db->get_where('grace_time',['idcompany'=>$this->session->userdata('idcompany')])->row();
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
    $inCheck = $this->db->get_where('grace_time',['idcompany'=>$idcom]);
    if($inCheck->num_rows() > 0){
      $inUpt = $this->InsertModel->uptdata('grace_time',[
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
      $inSave = $this->InsertModel->indata('grace_time',[
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
    $mon = $this->input->post('monday');
    $tue = $this->input->post('tuesday');
    $wed = $this->input->post('wednesday');
    $thu = $this->input->post('thursday');
    $fri = $this->input->post('friday');
    $sat = $this->input->post('saturday');

    $inGet = $this->db->get_where('work_days',['idcompany'=>$this->session->userdata('idcompany')]);
    if($inGet->num_rows() > 0){
        $inSave = $this->db->where(['idcompany'=>$this->session->userdata('idcompany')])
                          ->update('work_days',[
                            'sun'=>$sun,
                            'mon'=>$mon,
                            'tue'=>$tue,
                            'wed'=>$wed,
                            'thu'=>$thu,
                            'fri'=>$fri,
                            'sat'=>$sat,
                          ]);
    }else{
      $inSave = $this->db->insert('work_days',[
                          'idwork' =>$id,
                          'idcompany'=>$this->session->userdata('idcompany'),
                          'sun'=>$sun,
                          'mon'=>$mon,
                          'tue'=>$tue,
                          'wed'=>$wed,
                          'thu'=>$thu,
                          'fri'=>$fri,
                          'sat'=>$sat,
                        ]);
    }

    if($inSave){
      $this->session->set_flashdata('suc','Work days berhasil disimpan');
      redirect('setting-hrm');
    }
  }

  public function add_on()
  {
    $data['info'] = $this->db->get_where('company',['idcompany'=>$this->session->userdata('idcompany')])->row();
    $this->load->view('setting/add_on',$data);
  }

}
?>
