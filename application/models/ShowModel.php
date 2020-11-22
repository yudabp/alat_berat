<?php
if(!defined('BASEPATH')) exit('no file allowed');
class ShowModel extends CI_Model{
  public function __construct(){
    parent::__construct();
  }

  public function getData($table){
      return $this->db->get($table);
  }

  public function getDataWHere($table,$where){
    return $this->db->get_where($table,$where);
  }
}
