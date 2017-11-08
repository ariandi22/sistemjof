<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_suplier extends CI_Model {

	public function getdata($key)
	{
		$this->db->where('id_suplier',$key);
		$hasil = $this->db->get('suplier');
		return $hasil;
	}

	public function getupdate($key,$data)
	{
		$this->db->where('id_suplier',$key);
		$this->db->update('suplier',$data);
	}

	public function getinsert($data)
	{
		$this->db->insert('suplier',$data);
	}

	public function getdelete($key)
	{
		$this->db->where('id_suplier',$key);
		$this->db->delete('suplier');
	}
	
	public function getkodeunik($key,$data)
	{ 
        $query = $this->db->query("SELECT MAX(RIGHT(id_suplier,4)) AS idmax FROM suplier");
        $kd = "";
        if($query->num_rows()>0){ 
            foreach($query->result() as $k){
                $tmp = ((int)$k->idmax)+1; 
                $kd = sprintf("%04s", $tmp); 
            }
        }else{
            $kd = "0001";
        }
        $kar = "SL.";
        return $kar.$kd;
   }
}