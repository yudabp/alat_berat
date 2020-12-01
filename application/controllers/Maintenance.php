<?php
if(!defined('BASEPATH')) exit('no file allowed');
class Maintenance extends CI_Controller{
  public function __construct(){
    parent::__construct();
     date_default_timezone_set("Asia/Jakarta");
     $this->api->CheckSession();
     qazwsxedc();
  }

  public function main_overview()
  {
    $id = $this->session->userdata('idcompany');
    $data['info'] = $this->db->get_where('company',['idcompany'=>$this->session->userdata('idcompany')])->row();
    $data['sticker'] = $this->db->get_where('sticker',['idcompany'=>$this->session->userdata('idcompany')])->result();
    $data['job'] = $this->db->get_where('category',['idcompany'=>$this->session->userdata('idcompany')])->result();
    $data['client'] = $this->db->get_where('contacts',['idcompany'=>$this->session->userdata('idcompany')])->result();
    $data['views'] = $this->db->query("SELECT * FROM contacts JOIN maintenance ON contacts.idcontacts = maintenance.idcontacts JOIN category ON category.idcategory = maintenance.idcategory WHERE maintenance.idcompany ='$id'")->result();
    $this->load->view('maintenance/overview',$data);
  }

  public function saveOver(){
    $id = $this->uuid->v4();
    $idcom = $this->session->userdata('idcompany');
    $sticker_no = $this->input->post('sticker_no'); 
    $job_category = $this->input->post('job_category'); 
    $tipeSelection = $this->input->post('tipeSelection');
    $date_from = $this->input->post('date_from');
    $date_to = $this->input->post('date_to');
    $maplat = $this->input->post('maplat');
    $maplng = $this->input->post('maplng');
    $mapdistance = $this->input->post('mapdistance');
    $question = $this->input->post('question');
    $answer = $this->input->post('answer');
    $this->db->insert('maintenance',[
      'idmaintenance'=>$id,
      'idcompany' => $idcom,
      'idsticker' => $sticker_no,
      'idcategory' => $job_category,
      'idcontacts' => $tipeSelection,
      'datefrom' => $date_from,
      'dateto' => $date_to,
      'latitude' => $maplat,
      'longitude' => $maplng,
      'checkinrange'=> $mapdistance,
      'question'=> $question,
      'answer' => $answer,
    ]);
    
  }

  public function sticker()
  {
    if($this->uri->segment(2)){
      $idcom = $this->session->userdata('idcompany');
      $inGet = $this->db->get_where('sticker',['idsticker'=>$this->uri->segment(2)])->row();
      $filedata ='./assets/sticker/'.$inGet->sticker.'-'.$idcom.'.png';
      header('Content-Description: File Transfer');
      header('Content-type: image/jpeg' );
      header('Content-length: 1024' );
      header("Content-Transfer-Encoding: binarynn");
      header("Pragma: private");
      header('Cache-Control: private');
      header("Expires: 0");
      header('Content-Disposition: attachment; filename="' . $inGet->sticker.'-'.$idcom.'.png' . '"');
      readfile($filedata);
      exit;
    }else{
    $data['info'] = $this->db->get_where('company',['idcompany'=>$this->session->userdata('idcompany')])->row();
    $data['views']= $this->db->get_where('sticker',['idcompany'=>$this->session->userdata('idcompany')])->result();
    $this->load->view('maintenance/sticker',$data);
  }
  }

  public function edtStick(){
    $id = $this->input->post('id');
    $data = $this->db->get_where('sticker',['idsticker'=>$id])
                     ->row_array();
    echo json_encode($data);
  }


  public function saveStick(){
    $id = $this->uuid->v4();
    $sticker = $this->input->post('new_sticker');
    $idcom = $this->session->userdata('idcompany');
    $this->load->library('ciqrcode'); //pemanggilan library QR CODE

        $config['cacheable']    = true; //boolean, the default is true
        $config['cachedir']     = './assets/'; //string, the default is application/cache/
        $config['errorlog']     = './assets/'; //string, the default is application/logs/
        $config['imagedir']     = './assets/sticker/'; //direktori penyimpanan qr code
        $config['quality']      = true; //boolean, the default is true
        $config['size']         = '1024'; //interger, the default is 1024
        $config['black']        = array(224,255,255); // array, default is array(255,255,255)
        $config['white']        = array(70,130,180); // array, default is array(0,0,0)
        $this->ciqrcode->initialize($config);

        $image_name=$sticker.'-'.$idcom.'.png'; //buat name dari qr code sesuai dengan nim

        $params['data'] = $sticker; //data yang akan di jadikan QR CODE
        $params['level'] = 'H'; //H=High
        $params['size'] = 10;
        $params['savename'] = FCPATH.$config['imagedir'].$image_name; //simpan image QR CODE ke folder assets/images/
        $this->ciqrcode->generate($params); // fungsi untuk generate QR CODE

        $inEnter = $this->InsertModel->indata('sticker',[
          'idsticker'=>$id,
          'idcompany'=>$this->session->userdata('idcompany'),
          'sticker'=>$sticker,
        ]);
  }

  public function uptStick(){
    $id = $this->input->post('keyword');
    $sticker = $this->input->post('new_sticker');
    $idcom = $this->session->userdata('idcompany');
    $inGet = $this->ShowModel->getDataWHere('sticker',['idsticker'=>$id]);
    if($inGet->num_rows() > 0){
      $a = $inGet->row();
      if($a->sticker!=""){
        $data_path = "./assets/sticker/".$a->sticker.'-'.$idcom.'.png';
        unlink($data_path);
      }
    }

    $this->load->library('ciqrcode'); //pemanggilan library QR CODE

        $config['cacheable']    = true; //boolean, the default is true
        $config['cachedir']     = './assets/'; //string, the default is application/cache/
        $config['errorlog']     = './assets/'; //string, the default is application/logs/
        $config['imagedir']     = './assets/sticker/'; //direktori penyimpanan qr code
        $config['quality']      = true; //boolean, the default is true
        $config['size']         = '1024'; //interger, the default is 1024
        $config['black']        = array(224,255,255); // array, default is array(255,255,255)
        $config['white']        = array(70,130,180); // array, default is array(0,0,0)
        $this->ciqrcode->initialize($config);

        $image_name=$sticker.'-'.$idcom.'.png'; //buat name dari qr code sesuai dengan nim

        $params['data'] = $sticker; //data yang akan di jadikan QR CODE
        $params['level'] = 'H'; //H=High
        $params['size'] = 10;
        $params['savename'] = FCPATH.$config['imagedir'].$image_name; //simpan image QR CODE ke folder assets/images/
        $this->ciqrcode->generate($params); // fungsi untuk generate QR CODE

        $inEnter = $this->InsertModel->uptdata('sticker',[
          'sticker'=>$sticker],
          ['idsticker'=>$id]);
  }

  public function delStick(){
      $id = $this->uri->segment(2);
      $idcom = $this->session->userdata('idcompany');
      $inGet = $this->ShowModel->getDataWHere('sticker',['idsticker'=>$id]);
      if($inGet->num_rows() > 0){
        $a = $inGet->row();
        if($a->sticker!=""){
          $data_path = "./assets/sticker/".$a->sticker.'-'.$idcom.'.png';
          unlink($data_path);
        }
      }
      $this->DeleteModel->delItem('sticker',['idsticker'=>$id]);
      $this->session->set_flashdata('suc','Data has been deleted');
      redirect('sticker');
  }

  //category
  public function category()
  {
    $data['view'] = $this->db->get_where('category',['idcompany'=>$this->session->userdata('idcompany')])->result();
    $data['info'] = $this->db->get_where('company',['idcompany'=>$this->session->userdata('idcompany')])->row();
    $this->load->view('maintenance/category',$data);
  }

  public function saveCat(){
    $id = $this->uuid->v4();
    $new_category =  $this->input->post('new_category');
    $colorr = $this->input->post('color');
    $inEnter = $this->InsertModel->indata('category',[
      'idcategory'=>$id,
      'idcompany'=>$this->session->userdata('idcompany'),
      'categoryname'=>$new_category,
      'color' => $colorr
    ]);
  }

  public function delCat(){
      $id = $this->uri->segment(2);
      $this->DeleteModel->delItem('category',['idcategory'=>$id]);
      $this->session->set_flashdata('suc','Data has been deleted');
      redirect('category');
  }

  public function edtCat(){
    $id = $this->input->post('id');
    $data = $this->db->get_where('category',['idcategory'=>$id])
                     ->row_array();
    echo json_encode($data);
  }

  public function uptCat(){
    $id = $this->input->post('keyword');
    $new_category =  $this->input->post('new_category');
    $inEnter = $this->InsertModel->uptdata('category',[
      'categoryname'=>$new_category,
    ],['idcategory'=>$id]);
  }

  public function listing(){
    $data['views'] = $this->db->join('contacts','contacts.idcontacts = maintenance.idcontacts')
                              ->join('sticker','sticker.idsticker = maintenance.idsticker')
                              ->join('category','category.idcategory = maintenance.idcategory')
                              ->get_where('maintenance',['maintenance.idcompany'=>$this->session->userdata('idcompany')])->result();
    $this->load->view('maintenance/list',$data);
  }

  public function getQuestion(){
    $id = $this->input->post('id');
    $data = $this->db->get_where('maintenance',['idmaintenance'=>$id])->row_array();
    echo json_encode($data);
  }

  public function confirmDel(){
    $id = $this->input->post('id');
    $answer = $this->input->post('answer');
    $data = $this->db->get_where('maintenance',['idmaintenance'=>$id,'answer'=>$answer])->result();
    echo json_encode($data);
  }

  public function delList(){
    $id = $this->uri->segment(2);
    $this->DeleteModel->delItem('maintenance',['idmaintenance'=>$id]);
    $this->session->set_flashdata('suc','Data has been deleted');
    redirect('list-maintenance');
}

  function date_click(){
    $color = $this->input->post("idcolor");
    $date = $this->input->post("iddate");
    $mma = explode("/",$date);
    $mmb = $mma[2]."/".[1]."/".[0];
    $dataget = $this->db->query("SELECT * FROM maintenance JOIN category ON category.idcategory=maintenance.idcategory WHERE category.color='$color' AND maintenance.datefrom='$mmb' ")->row_array();
    $dataKaryawan = $this->db->query("SELECT * FROM maintenance JOIN log_karyawan ON maintenance.idcompany=log_karyawan.idcompany ")->row_array();
    $data = array(
      "getda" => $dataget,
      "dt" => $mmb,
      "hll" => $dataKaryawan,
  );
    echo json_encode($data);
  }

}
