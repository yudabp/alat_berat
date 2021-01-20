<?php
if(!defined('BASEPATH')) exit('no file allowed');
class InsertModel extends CI_Model{
  public function __construct(){
    parent::__construct();
  }

  public function indata($table,$data,$doReturn=true){
    $a = $this->db->insert($table,$data);
    if($doReturn)
      return $a;
  }

  public function uptdata($table,$data,$where, $doReturn=true){
    $a = $this->db->where($where)
                  ->update($table,$data);
    if($doReturn)
      return $a;
  }
}
