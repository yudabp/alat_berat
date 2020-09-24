<?php
if(!defined('BASEPATH')) exit('no file allowed');
class Quonum extends CI_Model{
  	public function __construct(){
    	parent::__construct();
  	}

 	public function quote_number(){
		$this->db->select('left(quotation.quote_number,3) as kode', FALSE);
		$this->db->order_by('quote_number','DESC');
		$this->db->limit(1);    
		$query = $this->db->get('quotation');      //cek dulu apakah ada sudah ada kode di tabel.    
		if($query->num_rows() <> 0){      
			//jika kode ternyata sudah ada.      
			$data = $query->row();      
			$kode = intval($data->kode) + 1;    
		}
		else {      
			//jika kode belum ada      
			$kode = 1;    
		}
		$kodemax = str_pad($kode, 3, "0", STR_PAD_LEFT); // angka 3 menunjukkan jumlah digit angka 0
		$m = date("m");
		$y = date("Y");
 		$kodejadi = $kodemax."/QUO-XV/".$m."-".$y;    // hasilnya GTS001 dst.
		return $kodejadi;  
	}

	public function jo_number(){
		$this->db->select('right(job_order.jo_number,3) as kode', FALSE);
		$this->db->order_by('jo_number','DESC');
		$this->db->limit(1);    
		$query = $this->db->get('job_order');      //cek dulu apakah ada sudah ada kode di tabel.    
		if($query->num_rows() <> 0){      
			//jika kode ternyata sudah ada.      
			$data = $query->row();      
			$kode = intval($data->kode) + 1;    
		}
		else {      
			//jika kode belum ada      
			$kode = 1;    
		}
		$kodemax = str_pad($kode, 3, "0", STR_PAD_LEFT); // angka 3 menunjukkan jumlah digit angka 0
		$m = date("m");
		$y = date("Y");
 		$kodejadi = "XV".$m.$y.$kodemax;    // hasilnya GTS001 dst.
		return $kodejadi;  
	}

	public function buat_kode(){
		  $this->db->select('RIGHT(quotation.quote_number,3) as kode', FALSE);
		  $this->db->order_by('quote_number','DESC');    
		  $this->db->limit(1);    
		  $query = $this->db->get('quotation');      //cek dulu apakah ada sudah ada kode di tabel.    
		  if($query->num_rows() <> 0){      
		   //jika kode ternyata sudah ada.      
		   $data = $query->row();      
		   $kode = intval($data->kode) + 1;    
		  }
		  else {      
		   //jika kode belum ada      
		   $kode = 1;    
		  }
		  $kodemax = str_pad($kode, 3, "0", STR_PAD_LEFT); // angka 3 menunjukkan jumlah digit angka 0
		  $kodejadi = "19".$kodemax;    // hasilnya GTS001 dst.
		  return $kodejadi;  
	}

	public function coba()
	{
		$kode = "uhlawjsop";
		return $kode;
	}
}
