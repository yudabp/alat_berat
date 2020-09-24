<?php
if(!defined('BASEPATH')) exit('no file allowed');
class Auth extends CI_Controller{
  public function __construct(){
    parent::__construct();
     date_default_timezone_set("Asia/Jakarta");
     qazwsxedc();
  }

  public function index(){
    if($this->session->userdata('level')=="root"){
      $this->api->CheckLoginRoot();
    }else{
      $this->api->CheckLogin();
    }
    $this->load->view('auth/login');
  }

  public function getRealIpAddr(){
			if (!empty($_SERVER['HTTP_CLIENT_IP']))   //check ip from share internet
			{
				$ip=$_SERVER['HTTP_CLIENT_IP'];
			}
			elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))   //to check ip is pass from proxy
			{
				$ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
			}
			else
			{
				$ip=$_SERVER['REMOTE_ADDR'];
			}
			return $ip;
	}

  public function proLogSystem(){
    $user = $this->input->post('username');
    $pass = $this->input->post('password');
    $remember = $this->input->post('remember');
    $inCheck = $this->AuthModel->getuseradm($user);
    $inGet = $inCheck->row();
    if($inCheck->num_rows()>0 && password_verify($pass,$inGet->password) && $inGet->suspended=='no'){
      $this->session->set_userdata(array(
											'status_login'=>TRUE,
											'iduser'=>$inGet->iduser,
                      'name'=>$inGet->name,
                      'username'=>$inGet->username,
                      'ip'=>$inGet->ip,
                      'idcompany'=>$inGet->idcompany,
                      'suspended'=>$inGet->suspended,
                      'paket'=>$inGet->paket,
                      'level' =>'superakses',
                      'health'=>$inGet->health,
                      'hospitality'=>$inGet->hospitality,
                      'architecture'=>$inGet->architecture,
                      'cargo'=>$inGet->cargo,
                      'maintenance'=>$inGet->maintenance,
									));
      if(isset($remember)){
        $this->input->set_cookie([
           'name'   => 'uname',
           'value'  => $user,
           'expire' => 3600 * 24,
           'secure' => TRUE]);
        $this->input->set_cookie([
            'name'   => 'upass',
            'value'  => $pass,
            'expire' => 3600 * 24,
            'secure' => TRUE]);
      }
      $a = $this->AuthModel->ubahip('superakses',['ip'=>$this->getRealIpAddr()],['username'=>$user]);
      if($a){
          redirect('beranda');
      }else{
        $this->session->set_flashdata('item', 'Gagal mendapatkan alamat ip');
        session_destroy();
        redirect('');
      }
    }else if($inCheck->num_rows()>0 && $inGet->suspended=="yes"){
      $this->session->set_flashdata('item', 'Mohon maaf akun anda telah disuspend');
      redirect('');
    }else{
      $this->session->set_flashdata('item', 'Username atau password tidak valid !');
      redirect('');
    }
  }

  public function proSuSystem(){
    $user = $this->input->post('username');
    $pass = $this->input->post('password');
    $remember = $this->input->post('remember');
    $inCheck = $this->AuthModel->getroot($user);
    $inGet = $inCheck->row();
    if($inCheck->num_rows()>0 && password_verify($pass,$inGet->password)){
      $this->session->set_userdata(array(
                      'status_login'=>TRUE,
                      'iduser'=>$inGet->idroot,
                      'name'=>$inGet->nama,
                      'username'=>$inGet->username,
                      'ip'=>$inGet->ip,
                      'level' =>'root',
                  ));
      if(isset($remember)){
        $this->input->set_cookie([
           'name'   => 'uname',
           'value'  => $user,
           'expire' => 3600 * 24,
           'secure' => TRUE]);
        $this->input->set_cookie([
            'name'   => 'upass',
            'value'  => $pass,
            'expire' => 3600 * 24,
            'secure' => TRUE]);
      }
      $a = $this->AuthModel->ubahip('root',['ip'=>$this->getRealIpAddr()],['username'=>$user]);
      if($a){
          redirect('su-dashboard');
      }else{
        $this->session->set_flashdata('item', 'Gagal mendapatkan alamat ip');
        session_destroy();
        redirect('');
      }
    }else{
      $this->session->set_flashdata('item', 'Username atau password tidak valid !');
      redirect('');
    }
  }

  public function proOutSystem(){
    $akses = $this->session->userdata('level');
    session_destroy();
    if($akses=="root"){
        redirect('su');
    }else{
        redirect('');
    }
  }

  public function getPass(){
    $oldpass = $this->input->post('old_pass');
    $newpass = password_hash($this->input->post('new_pass'),PASSWORD_DEFAULT);
    if($this->session->userdata('level')=="root"){
        $inGet = $this->db->get_where('root',['idroot'=>$this->session->userdata('iduser')])->row();
        if(password_verify($oldpass,$inGet->password)){
          $data = 1;
        }else{
          $data = 0;
        }
    }else{
        $inGet = $this->db->get_where('superakses',['iduser'=>$this->session->userdata('iduser')])->row();
        if(password_verify($oldpass,$inGet->password)){
          $data = 1;
        }else{
          $data = 0;
        }
    }
    echo json_encode($data);
  }

  public function uptPass(){
    $oldpass = $this->input->post('old_pass');
    $newpass = password_hash($this->input->post('new_pass'),PASSWORD_DEFAULT);
    if($this->session->userdata('level')=="root"){
        $this->db->where(['idroot'=>$this->session->userdata('iduser')])
                ->update('root',['password'=>$newpass]);
    }else{
      $this->db->where(['iduser'=>$this->session->userdata('iduser')])
              ->update('superakses',['password'=>$newpass]);
    }
  }

  public function getUser(){
    $old_user = $this->input->post('old_user');
    $new_user = $this->input->post('new_user');

    if($this->session->userdata('level')=="root"){
        $inGet = $this->db->get_where('root',['idroot'=>$this->session->userdata('iduser'),'username'=>$old_user])->num_rows();
        if($inGet > 0){
          $data = 1;
        }else{
          $data = 0;
        }
    }else{
        $inGet = $this->db->get_where('superakses',['iduser'=>$this->session->userdata('iduser'),'username'=>$old_user])->num_rows();
        if($inGet > 0){
          $data = 1;
        }else{
          $data = 0;
        }
    }
    echo json_encode($data);
  }

  public function uptUser(){
    $old_user = $this->input->post('old_user');
    $new_user = $this->input->post('new_user');
    if($this->session->userdata('level')=="root"){
        $this->db->where(['idroot'=>$this->session->userdata('iduser')])
                ->update('root',['username'=>$new_user]);
    }else{
      $this->db->where(['iduser'=>$this->session->userdata('iduser')])
              ->update('superakses',['username'=>$new_user]);
    }
  }
}
