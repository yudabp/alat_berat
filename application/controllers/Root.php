<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Root extends CI_Controller {

  public function __construct(){
    parent::__construct();
    $this->api->CheckSession();
     date_default_timezone_set("Asia/Jakarta");
     qazwsxedc();
  }

  public function su_dashboard()
  {
    $data['total'] = $this->db->get('company')->num_rows();
    $data['totstandard'] = $this->db->get_where('company',['paket'=>'Standard'])->num_rows();
    $data['totpremium'] = $this->db->get_where('company',['paket'=>'Premium'])->num_rows();
    $data['totsuspend'] = $this->db->get_where('company',['suspended'=>'yes'])->num_rows();
    $data['view'] = $this->db->get('company')->result();
    $data['standard'] = $this->db->get_where('company',['paket'=>'Standard'])->result();
    $data['premium'] = $this->db->get_where('company',['paket'=>'Premium'])->result();
    $data['suspend'] = $this->db->get_where('company',['suspended'=>'yes'])->result();
    $this->load->view('su/dashboard',$data);
  }

  public function add_company()
  {
    $this->load->view('su/add company');
  }

  public function saveCom(){
    $id = $this->uuid->v4();
    $code = comcode();
    $nama_perusahaan = $this->input->post('nama_perusahaan');
    $alamat = $this->input->post('alamat');
    $username = $this->input->post('username');
    $password = password_hash($this->input->post('password'),PASSWORD_DEFAULT);
    $penanggung_jawab = $this->input->post('penanggung_jawab');
    $pemakai_utama = $this->input->post('pemakai_utama');
    $paketSelection = $this->input->post('paketSelection');
    $cargo = $this->input->post('cargo');
    $health = $this->input->post('health');
    $architecture = $this->input->post('architecture');
    $hospitality = $this->input->post('hospitality');
    $maintenance = $this->input->post('maintenance');

    $inSave = $this->db->insert('company',[
      'idcompany'=>$id,
      'code' => 'X - '.$code,
      'companyname'=>$nama_perusahaan,
      'penanggungjawab'=>$penanggung_jawab,
      'jlhpemakai'=>$pemakai_utama,
      'paket'=>$paketSelection,
      'cargo' => $cargo,
      'architecture' => $architecture,
      'hospitality' => $hospitality,
      'health'=> $health,
      'maintenance'=>$maintenance
    ]);

    if($inSave){
      $inGetOne = $this->db->order_by('companycreated','desc')
                           ->get_where('company')
                           ->row();
      $inSaveTwo = $this->db->insert('superakses',[
        'iduser'=>$id,
        'idcompany' => $inGetOne->idcompany,
        'name' => 'Administrator',
        'username' =>$username,
        'password' => $password,
      ]);

      if($inSaveTwo){
        $inSaveTri = $this->db->insert('address_company',[
          'idcompany' => $inGetOne->idcompany,
          'addcompany' => $alamat,
        ]);
        
        if($inSaveTri){
            redirect('su-list-company');
        }
      }
    }
  }

  public function delCom(){
      $id = $this->uri->segment(3);
      // echo $id;
      $this->DeleteModel->delItem('company',['idcompany'=>$id]);
      $this->DeleteModel->delItem('address_company',['idcompany'=>$id]);
      $this->DeleteModel->delItem('superakses',['idcompany'=>$id]);
      $this->session->set_flashdata('suc','Data has been deleted');
      redirect('su-list-company');
  }

  public function edtCom(){
    $id = $this->input->post('id');
    $data = $this->db->join('superakses','superakses.idcompany=company.idcompany')
                     ->get_where('company',['company.idcompany'=>$id])
                     ->row_array();
    $password = $this->encrypt->decode($data_siswa['pass_encrypted']);
    $data['password_de'] = $password;
    echo json_encode($data);
  }

  public function susCom(){
    $id = $this->input->post('id');
    $data = $this->db->where(['idcompany'=>$id])
                    ->update('company',['suspended'=>'yes']);
    echo json_encode($data);
  }

  public function unsusCom(){
    $id = $this->input->post('id');
    $data = $this->db->where(['idcompany'=>$id])
                    ->update('company',['suspended'=>'no']);
    echo json_encode($data);
  }

  public function showAddCom(){
    $id = $this->input->post('id');
      $data = $this->db->get_where('address_company',['idcompany'=>$id])
                     ->result();
    echo json_encode($data);
  }

  public function uptCom(){
    $id = $this->input->post('keyword');
    $nama_perusahaan = $this->input->post('nama_perusahaan');
    $address = $this->input->post('address[]');
    $username = $this->input->post('username');
    $password = password_hash($this->input->post('password'),PASSWORD_DEFAULT);
    $pass = $this->input->post('password');
    $penanggung_jawab = $this->input->post('penanggung_jawab');
    $pemakai_utama = $this->input->post('pemakai_utama');
    $paketSelection = $this->input->post('paketSelection');

    $cargos = $this->input->post('cargo');
    $healths = $this->input->post('health');
    $architectures = $this->input->post('architecture');
    $hospitalitys = $this->input->post('hospitality');
    $maintenances = $this->input->post('maintenance');

    $inGet = $this->db->get_where('company',['idcompany'=>$id])
                           ->row();
    
    if($cargos == "Yes"){
      $cargo = $cargos;
    }else{
      $cargo = $inGet->cargo;
    }

    if($healths == "Yes"){
      $health = $healths;
    }else{
      $health = $inGet->health;
    }
    
    if($architectures == "Yes"){
      $architecture = $architectures;
    }else{
      $architecture = $inGet->architecture;
    }

    if($hospitalitys == "Yes"){
      $hospitality = $hospitalitys;
    }else{
      $hospitality = $inGet->hospitality;
    }

    if($maintenances == "Yes"){
      $maintenance = $maintenances;
    }else{
      $maintenance = $inGet->maintenance;
    }

    $inSave = $this->db->where(['idcompany'=>$id])
                       ->update('company',[
      'companyname'=>$nama_perusahaan,
      'penanggungjawab'=>$penanggung_jawab,
      'jlhpemakai'=>$pemakai_utama,
      'paket'=>$paketSelection,
      'cargo' => $cargo,
      'architecture' => $architecture,
      'hospitality' => $hospitality,
      'health'=> $health,
      'maintenance' => $maintenance
    ]);

    if($inSave){
      if($pass==""){
        $inSaveTwo = $this->db->where(['idcompany'=>$id])
                              ->update('superakses',[
          'username' =>$username,
        ]);
      }else{
        $inSaveTwo = $this->db->where(['idcompany'=>$id])
                              ->update('superakses',[
          'username' =>$username,
          'password' => $password,
        ]);
      }

      if($inSaveTwo){
        $indel = $this->db->delete('address_company',['idcompany'=>$id]);
        $value = array();
          foreach ($address as $key) {
            array_push($value,array(
              'idcompany' => $id,
              'addcompany' => $key,
            ));
          }
          $save = $this->db->insert_batch('address_company',$value);
      }

      if($save){
        $this->session->set_flashdata('suc','Data has been updated');
        redirect('su-list-company');
      }else{
        echo"fail";
      }
    }
  }

  public function list_company()
  {
    $data['view'] = $this->db->get('company')->result();
    $this->load->view('su/list company',$data);
  }

}
