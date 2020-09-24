<?php
if(!defined('BASEPATH')) exit('no file allowed');
class AuthModel extends CI_Model{
  public function __construct(){
    parent::__construct();
  }
  public function getuseradm($user){
    $a = $this->db->join('company','company.idcompany=superakses.idcompany')
                  ->get_where('superakses',['username'=>$user]);
    return $a;
  }
  public function getroot($user){
    $a = $this->db->get_where('root',['username'=>$user]);
    return $a;
  }
  public function ubahip($table,$data,$where){
    $a =  $this->db->where($where)
             ->update($table,$data);
    return $a;
  }
}
