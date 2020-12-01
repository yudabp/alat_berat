<?php
if(!defined('BASEPATH')) exit('no file allowed');
class InsertModel extends CI_Model{
  public function __construct(){
    parent::__construct();
  }

  public function indata($table,$data){
    $a = $this->db->insert($table,$data);
    return $a;
  }

  public function uptdata($table,$data,$where){
    $a = $this->db->where($where)
                  ->update($table,$data);
    return $a;
  }
}
