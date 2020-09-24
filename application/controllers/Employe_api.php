<?php 
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';
class Employe_api extends REST_Controller{

    public function __construct(){
        parent :: __construct();
        $this->load->model('Employeapi');
    }

    public function index_get(){
        $employeee = $this->gd->getemploye();
        

        if($employeee){
            $this->response($employeee, REST_Controller::HTTP_OK);
        }
    } 
}