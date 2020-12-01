<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Accounting extends CI_Controller {

  public function __construct(){
    parent::__construct();
    $this->api->CheckSession();
     date_default_timezone_set("Asia/Jakarta");
  }

  public function acc_overview()
  {
    $data['info'] = $this->db->get_where('company',['idcompany'=>$this->session->userdata('idcompany')])->row();
    $this->load->view('accounting/overview',$data);
  }
  public function vendor()
  {
    $data['info'] = $this->db->get_where('company',['idcompany'=>$this->session->userdata('idcompany')])->row();
    $data['views'] = $this->db->get_where('vendors',['idcompany'=>$this->session->userdata('idcompany')])->result();
    $this->load->view('accounting/vendor',$data);
  }

  public function saveVen(){
    $id = $this->uuid->v4();
    $fname = $this->input->post('first_name');
    $lname = $this->input->post('last_name');
    $email = $this->input->post('email');
    $phone = $this->input->post('phone_no');
    $job_title = $this->input->post('job_title');
    $company = $this->input->post('company');
    $address = $this->input->post('address');
    $city = $this->input->post('city');
    $state = $this->input->post('state');
    $zip = $this->input->post('zip');
    $joined = $this->input->post('joined');

    if(!empty($_FILES['photo']['name'])){
              $renamefile  = imgRandom();
              //Config File
              $config['upload_path'] = './assets/vendor/';
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

      $inEnter = $this->InsertModel->indata('vendors',[
          'idvendors' => $id,
          'idcompany' =>$this->session->userdata('idcompany'),
          'vendor_first_name' => $fname,
          'vendor_last_name'=>$lname,
          'vendor_email' => $email,
          'vendor_phone' => $phone,
          'vendor_job_title'=>$job_title,
          'vendor_company'=>$company,
          'vendor_address' =>$address,
          'vendor_city'=>$city,
          'vendor_state'=>$state,
          'vendor_zip'=>$zip,
          'vendor_joined'=>$joined,
          'vendor_photo'=>$name_img

      ]);
      if($inEnter){
        $this->session->set_flashdata('suc','Data berhasil disimpan');
        redirect('vendors');
      }
  }

  public function uptVen(){
    $id = $this->input->post('keyword');
    $fname = $this->input->post('first_name');
    $lname = $this->input->post('last_name');
    $email = $this->input->post('email');
    $phone = $this->input->post('phone_no');
    $job_title = $this->input->post('job_title');
    $company = $this->input->post('company');
    $address = $this->input->post('address');
    $city = $this->input->post('city');
    $state = $this->input->post('state');
    $zip = $this->input->post('zip');
    $joined = $this->input->post('joined');

    $inGet = $this->db->get_where('vendors',['idvendors'=>$id])->row();

    if(!empty($_FILES['photo']['name'])){
              $renamefile  = imgRandom();
              //Config File
              $config['upload_path'] = './assets/vendor/';
              $config['allowed_types'] = 'jpg|jpeg|png';
              $config['file_name'] = $renamefile;

              $this->load->library('upload', $config);
              $uploading = $this->upload->do_upload('photo');

            if($uploading){
                $hasil = $this->upload->data();
                $name_img = $hasil['file_name'];
              }
          }else{
                $name_img =$inGet->vendor_photo;
          }

      $inEnter = $this->InsertModel->uptdata('vendors',[
          'vendor_first_name' => $fname,
          'vendor_last_name'=>$lname,
          'vendor_email' => $email,
          'vendor_phone' => $phone,
          'vendor_job_title'=>$job_title,
          'vendor_company'=>$company,
          'vendor_address' =>$address,
          'vendor_city'=>$city,
          'vendor_state'=>$state,
          'vendor_zip'=>$zip,
          'vendor_joined'=>$joined,
          'vendor_photo'=>$name_img
      ],['idvendors'=>$id]);
      if($inEnter){
        $this->session->set_flashdata('suc','Data berhasil disimpan');
        redirect('vendors');
      }
  }

  public function showVen(){
    $id = $this->input->post('id');
    $data = $this->db->get_where('vendors',['idvendors'=>$id])
                     ->row_array();
    echo json_encode($data);
  }

  public function delVen(){
      $id = $this->uri->segment(2);
      $idcom = $this->session->userdata('idcompany');
      $inGet = $this->ShowModel->getDataWHere('vendors',['idvendors'=>$id]);
      if($inGet->num_rows() > 0){
        $a = $inGet->row();
        if($a->vendor_photo!=""){
          $data_path = "./assets/vendor/".$a->vendor_photo;
          unlink($data_path);
        }
      }
      $this->DeleteModel->delItem('vendors',['idvendors'=>$id]);
      $this->session->set_flashdata('suc','Data has been deleted');
      redirect('vendors');
  }

  public function sales()
  {
    $data['info'] = $this->db->get_where('company',['idcompany'=>$this->session->userdata('idcompany')])->row();
    $this->load->view('accounting/sales',$data);
  }

  public function expense()
  {
    $data['info'] = $this->db->get_where('company',['idcompany'=>$this->session->userdata('idcompany')])->row();
    $this->load->view('accounting/expense',$data);
  }

  public function coa()
  {
    $data['info'] = $this->db->get_where('company',['idcompany'=>$this->session->userdata('idcompany')])->row();
    $data['data'] = $this->db->query("SELECT * FROM acc_asset")->result();
    $this->load->view("accounting/chart of accounts", $data);
    // echo $this->uuid->v4();
  }
  public function saveCoa(){
    $id = $this->uuid->v4();
    $c_asset = $this->input->post('code_asset');
    $n_asset = $this->input->post('name_asset');
    $t_asset = $this->input->post('type_asset');
    $e_asset = 0;
    // $a_asset = $this->input->post('actions_asset');
    $a_asset = "edit_delete";

    $masukkan = $this->InsertModel->indata('acc_asset',[
      'id_asset' => $id,
      'idcompany' =>$this->session->userdata('idcompany'),
      'code_asset' => $c_asset,
      'name_asset'=>$n_asset,
      'type_asset' => $t_asset,
      'entries_asset' => $e_asset,
      'actions_asset'=>$a_asset,
    ]);
    if($masukkan){
      $this->session->set_flashdata('suc','Data berhasil disimpan');
      redirect('chart-of-accounts');
    }
  }

  public function delCoa(){
		$master = $this->input->post('id');
        $this->db->delete("acc_asset",['id_asset'=>$master]);
        echo json_encode(array("result"=>"success"));
    }
    
    public function edit_coa(){        
		$pasti = $this->input->post('id');
		$ambel = $this->db->query("SELECT * FROM acc_asset where id_asset='$pasti' ")->row_array();
		$data = array(
			"itulah" => $ambel
		);
		echo json_encode($data);
    }
    
    public function uptCoa(){
        $code = $this->input->post("code");
        $name = $this->input->post("name");
        $type = $this->input->post("type");
        $entries = $this->input->post("entries");
		$id_asset = $this->input->post("id");
		$this->db->query("UPDATE acc_asset SET code_asset='$code' WHERE id_asset='$id_asset' ");
	 	$this->db->query("UPDATE acc_asset SET name_asset='$name' WHERE id_asset='$id_asset' ");
	 	$this->db->query("UPDATE acc_asset SET type_asset='$type' WHERE id_asset='$id_asset' ");
	 	$this->db->query("UPDATE acc_asset SET entries_asset='$entries' WHERE id_asset='$id_asset' ");
    }

  public function bank_account()
  {
    $data['info'] = $this->db->get_where('company',['idcompany'=>$this->session->userdata('idcompany')])->row();
    $this->load->view('accounting/bank account',$data);
  }

  public function journal_entry()
  {
    $data['info'] = $this->db->get_where('company',['idcompany'=>$this->session->userdata('idcompany')])->row();
    $this->load->view('accounting/journal entry',$data);
  }

  public function acc_report()
  {
    $data['info'] = $this->db->get_where('company',['idcompany'=>$this->session->userdata('idcompany')])->row();
    $this->load->view('accounting/report',$data);
  }
}
?>
