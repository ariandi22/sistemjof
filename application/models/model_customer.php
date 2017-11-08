<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_customer extends CI_Model {

	public function getdata($key)
	{
		$this->db->where('id_customer',$key);
		$hasil = $this->db->get('customer');
		return $hasil;
	}

	public function getupdate($key,$data)
	{
		$this->db->where('id_customer',$key);
		$this->db->update('customer',$data);
	}

	public function getinsert($data)
	{
		$this->db->insert('customer',$data);
	}

	public function getdelete($key)
	{
		$this->db->where('id_customer',$key);
		$this->db->delete('customer');
	}
	
	public function buat_kode()   {
		  $this->db->select('RIGHT(customer.id_customer,5) as kode', FALSE);
		  $this->db->order_by('id_customer','DESC');    
		  $this->db->limit(1);    
		  $query = $this->db->get('customer');      //cek dulu apakah ada sudah ada kode di tabel.    
		  if($query->num_rows() <> 0){      
		   //jika kode ternyata sudah ada.      
		   $data = $query->row();      
		   $kode = intval($data->kode) + 1;    
		  }
		  else {      
		   //jika kode belum ada      
		   $kode = 1;    
		  }
		  $kodemax = str_pad($kode, 5, "0", STR_PAD_LEFT); // angka 5 menunjukkan jumlah digit angka 0
		  $kodejadi = "ab-".$kodemax;    // hasilnya abc-00001 dst. yg dinamis itu 00001, 00002 dst. xxx statis. bebas silahkan dirubah di "ab-" jumlahnya 8 digit perpaduan huruf dan angka. saya rubah size tabel id_costumer ke 8.
		  return $kodejadi;  
	}
}