<?php
if(!defined('BASEPATH')) exit('no file allowed');
class Clients extends CI_Controller{
  public function __construct(){
    parent::__construct();
     date_default_timezone_set("Asia/Jakarta");
     $this->api->CheckSession();
     qazwsxedc();
  }

  public function clients_overview()
  {
    $data['contnum'] = $this->db->get_where('contacts',['idcompany'=>$this->session->userdata('idcompany')])->num_rows();
    // $data['depnum'] = $this->db->get_where('department',['idcompany'=>$this->session->userdata('idcompany')])->num_rows();
    $data['info'] = $this->db->get_where('company',['idcompany'=>$this->session->userdata('idcompany')])->row();
    $this->load->view('clients/overview',$data);
  }

  //contact
  public function contacts()
  {
    $data['info'] = $this->db->get_where('company',['idcompany'=>$this->session->userdata('idcompany')])->row();
    $data['view'] = $this->db->order_by('contactcreated','desc')
                            ->get_where('contacts',['idcompany'=>$this->session->userdata('idcompany')])
                            ->result();
    $this->load->view('clients/contacts',$data);
  }

  public function saveCon(){
    $id = $this->uuid->v4();
    $first_name = $this->input->post('first_name');
    $last_name = $this->input->post('last_name');
    $email = $this->input->post('email');
    $phone_no = $this->input->post('phone_no');
    $job_title = $this->input->post('job_title');
    $company = $this->input->post('company');
    $city = $this->input->post('city');
    $state = $this->input->post('state');
    $zip = $this->input->post('zip');
    $count = $this->input->post('country');
    $joined = $this->input->post('joined');
    $address = $this->input->post('address[]');

    if(!empty($_FILES['photo']['name'])){
	            $renamefile  = imgRandom();
	            //Config File
	            $config['upload_path'] = './assets/contact/';
	            $config['allowed_types'] = 'jpg|jpeg|png';
	            $config['file_name'] = $renamefile;

	            $this->load->library('upload', $config);
	            $uploading = $this->upload->do_upload('photo');

	        	if($uploading){
		            $hasil = $this->upload->data();
		            $name_img = $hasil['file_name'];
	          	}
	        }else{
                $name_img ="";
          }

    $inEnter = $this->InsertModel->indata('contacts',[
      'idcontacts'=>$id,
      'idcompany' =>$this->session->userdata('idcompany'),
      'first_name'=>$first_name,
      'last_name'=>$last_name,
      'email'=>$email,
      'phone_no'=>$phone_no,
      'job_title'=>$job_title,
      'company'=>$company,
      'city'=>$city,
      'state'=>$state,
      'zip'=>$zip,
      'joined'=>$joined,
      'photo' => $name_img,
    ]);

      $inGet = $this->db->order_by('contactcreated','desc')
                        ->get('contacts')
                        ->row();
      $value = array();
        foreach ($address as $key) {
          array_push($value,array(
            'idcompany' =>$this->session->userdata('idcompany'),
            'idcontacts'=>$inGet->idcontacts,
            'address'=>$key,
          ));
        }
        //echo json_encode($value);
        $save = $this->db->insert_batch('address_contacts',$value);

    if($inEnter==TRUE && $save){
      $this->session->set_flashdata('suc','Data has been added');
      redirect('contacts');
    }else{
      echo"fail";
    }
  }

  public function viewCon(){
    $id = $this->input->post('id');
    $data = $this->db->get_where('contacts',['idcontacts'=>$id])
                     ->row_array();
    echo json_encode($data);
  }

  public function showAddCon(){
    $id = $this->input->post('id');
      $data = $this->db->get_where('address_contacts',['idcontacts'=>$id])
                     ->result();
    echo json_encode($data);
  }

  public function edtCon(){
    $id = $this->input->post('id');
    $data = $this->db->get_where('contacts',['idcontacts'=>$id])
                     ->row_array();
    echo json_encode($data);
  }

  public function delCon(){
    $id = $this->uri->segment(2);
    $inGet = $this->ShowModel->getDataWHere('contacts',['idcontacts'=>$id]);
    if($inGet->num_rows() > 0){
      $a = $inGet->row();
      if($a->photo!=""){
        $data_path = "./assets/contact/".$a->photo;
        unlink($data_path);
      }
    }
    $inDel = $this->DeleteModel->delItem('contacts',['idcontacts'=>$id]);
    $inDels = $this->DeleteModel->delItem('address_contacts',['idcontacts'=>$id]);
    if($inDel && $inDels){
      $this->session->set_flashdata('suc','Data has been deleted');
      redirect('contacts');
    }
  }

  public function uptCon(){
    $id = $this->input->post('idnya');
    $first_name = $this->input->post('first_name');
    $last_name = $this->input->post('last_name');
    $email = $this->input->post('email');
    $phone_no = $this->input->post('phone_no');
    $job_title = $this->input->post('job_title');
    $company = $this->input->post('company');
    $city = $this->input->post('city');
    $state = $this->input->post('state');
    $zip = $this->input->post('zip');
    $joined = $this->input->post('joined');
    $address = $this->input->post('address[]');


    $inGet = $this->ShowModel->getDataWHere('contacts',['idcontacts'=>$id]);
    $a = $inGet->row();
    if(!empty($_FILES['photo']['name'])){

      if($inGet->num_rows() > 0){

        if($a->photo!=""){
          $data_path = "./assets/contact/".$a->photo;
          unlink($data_path);
        }
      }
	            $renamefile  = imgRandom();
	            //Config File
	            $config['upload_path'] = './assets/contact/';
	            $config['allowed_types'] = 'jpg|jpeg|png';
	            $config['file_name'] = $renamefile;

	            $this->load->library('upload', $config);
	            $uploading = $this->upload->do_upload('photo');

	        	if($uploading){
		            $hasil = $this->upload->data();
		            $name_img = $hasil['file_name'];
	          	}
	        }else{
              $name_img = $a->photo;
          }

    $inEnter = $this->InsertModel->uptdata('contacts',[
      //'idcontacts'=>$id,
      'first_name'=>$first_name,
      'last_name'=>$last_name,
      'email'=>$email,
      'phone_no'=>$phone_no,
      'job_title'=>$job_title,
      'company'=>$company,
      'city'=>$city,
      'state'=>$state,
      'zip'=>$zip,
      'joined'=>$joined,
      'photo' => $name_img,
    ],['idcontacts'=>$id]);

      $indel = $this->db->delete('address_contacts',['idcontacts'=>$id]);
      $value = array();
        foreach ($address as $key) {
          array_push($value,array(
            'idcontacts'=>$id,
            'address'=>$key,
          ));
        }
        //echo json_encode($value);
        $save = $this->db->insert_batch('address_contacts',$value);

    if($inEnter==TRUE && $save){
      $this->session->set_flashdata('suc','Data has been updated');
      redirect('contacts');
    }else{
      echo"fail";
    }
  }

  //contact
  public function companies()
  {
    $data['info'] = $this->db->get_where('company',['idcompany'=>$this->session->userdata('idcompany')])->row();
    $data['view'] = $this->db->group_by("company")
                            ->order_by('contactcreated','desc')
                            ->get_where('contacts',['idcompany'=>$this->session->userdata('idcompany')])
                            ->result();
    $this->load->view('clients/companies',$data);
  }


  //activities
  public function activities()
  {$data['info'] = $this->db->get_where('company',['idcompany'=>$this->session->userdata('idcompany')])->row();
    $this->load->view('clients/activities',$data);
  }

  //card
  public function card()
  {
    $data['info'] = $this->db->get_where('company',['idcompany'=>$this->session->userdata('idcompany')])->row();
    $this->load->view('clients/card profile',$data);
  }
}
