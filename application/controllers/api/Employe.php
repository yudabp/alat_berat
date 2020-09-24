<?php 
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';


class Employe extends REST_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->model('Employeapi','gd');
    }

    public function index_get(){
        $id = $this->get('id');
        if($id == null){
            $employeee = $this->gd->getemploye();
        }else{
            $employeee = $this->gd->getemploye($id);
        }

        if($employeee){
            $this->response([
                'status' => true,
                'data' => $employeee,
                // echo $this->decode("$2y$10$i4CBCzvD4VnNwC.nZjAZTuk4alHDnX7qwCUPQlDuP59uxsZKzNke2");
            ], REST_Controller::HTTP_OK);
        }else{
            $this->response([
                'status' => false,
                'message' => 'data tidak ada'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    } 


    public function index_post(){
        $mainid = $this->uuid->v4("mainid");    
        $first_name = $this->post('first_name');
        $username = $this->post('username');
        $password = $this->post('password');
        $email = $this->post('email');
        $idcompany = $this->session->userdata('idcompany');
        $nohp = $this->post('handphone');
        $date = $this->post('Y-m-d H:i:s');
    
          $saveone = array([
            'mainid'=>$mainid,
            'idcompany'=>$idcompany,
            'employeid'=>$idcompany,
            'fname'=>$first_name,
            'lname'=>"",
            'mname'=>"",
            'email'=>$email,
            'employetype'=>"",
            'employestatus'=>"",
            'datehire'=>$date_of_hire,
            'department'=>"",
            'jobtitle'=>"",
            'location'=>"",
            'reportingto'=>"",
            'sourceofhire'=>"",
            'payrate'=>"",
            'paytype'=>"",
            'workphone'=>"",
            'phone'=>"",
            'handphone'=>$nohp,
            'otheremail'=>"",
            'birth'=>"",
            'nationality'=>"",
            'gender'=>"",
            'status'=>"",
            'drivinglicense'=>"",
            'address'=>"",
            'city'=>"",
            'state'=>"",
            'zipcode'=>"",
            'photo' => "",
            'sendnotif'=>"",
            'allow' =>"",
            'available'=>"",
            'created_at' =>$date    
          ]);
          $savetwo = array([
            'idaccess'=>$mainid,
            'idcompany' =>$this->session->userdata('idcompany'),
            'mainid'=>$inGet->mainid,
            'username' => $username,
            'password' => password_hash($password,PASSWORD_DEFAULT)
          ]);

        if($this->gd->created($savetwo,$saveone)){
            $this->response([
                'status'=>true,
                'message'=>'data berhasil di tambahkan'
            ],REST_Controller::HTTP_CREATED);
        }
    
      }






    // public function index_post(){
    //     $data = [
    //         'username' => $this->post('username');
    //         'password' => $this->post('password');
    //         'name' => $this->post('fullname');
    //         'idcompany' => $this->post('companyid');
    //         'nohp' => $this->post('handphone');
    //         'email' => $this->post('email');
    //         'created_at' => date("Y-m-d H:i:s ")
    //     ];
    //     if($this->gd->created($data)>0){
    //         $this->response([
    //             'status' => false,
    //             'message' => 'data berhasil di tambahkan'
    //         ], REST_Controller::HTTP_CREATED);
    //     }

    // }

    

}