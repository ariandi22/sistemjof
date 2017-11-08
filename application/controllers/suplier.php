<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Suplier extends CI_Controller {

	public function index()
	{
		$this->model_squrity->getsqurity();
		$isi['content'] 	= 'Suplier/tampil_datasuplier';
		$isi['judul'] 		= 'Master';
		$isi['sub_judul']	= 'Supplier';
		$isi['data']		= $this->db->get('suplier');
		$this->load->view('tampilan_home',$isi);
	}

	public function tambah()
	{
		$this->model_squrity->getsqurity();
		$isi['content'] 			= 'Suplier/form_tambahsuplier';
		$isi['judul'] 				= 'Master';
		$isi['sub_judul']			= 'Tambah Supplier';
		$isi['idsuplier']			= '';
		$isi['namasuplier']			= '';
		$isi['namaperusahaan']		= '';
		$isi['alamat']				= '';
		$isi['notelp']				= '';
		$this->load->view('tampilan_home',$isi);
	}

	public function edit()
	{
		$this->model_squrity->getsqurity();
		$isi['content'] 	= 'Suplier/form_tambahsuplier';
		$isi['judul'] 		= 'Master';
		$isi['sub_judul']	= 'Edit Supplier';

		$key = $this->uri->segment(3);
		$this->db->where('id_suplier',$key);
		$query = $this->db->get('suplier');
		if($query->num_rows()>0)
		{
			foreach ($query->result() as $row) 
			{
				$isi['idsuplier']			= $row->id_suplier;
				$isi['namasuplier']			= $row->nama_suplier;
				$isi['namaperusahaan']		= $row->nama_perusahaan;
				$isi['alamat']				= $row->alamat;
				$isi['notelp']				= $row->telp;				
			}
		}
		else
		{
				$isi['idsuplier']			= '';
				$isi['namasuplier']			= '';
				$isi['namaperusahaan']		= '';
				$isi['alamat']				= '';
				$isi['notelp']				= '';
		}

		$this->load->view('tampilan_home',$isi);
	}

	public function simpan()
	{
		$this->model_squrity->getsqurity();
		
		$key = $this->input->post('id_suplier');
		$data['id_suplier']			= $this->input->post('idsuplier');
		$data['nama_suplier']		= $this->input->post('namasuplier');
		$data['nama_perusahaan']	= $this->input->post('namaperusahaan');
		$data['alamat']				= $this->input->post('alamat');
		$data['telp']				= $this->input->post('notelp');

		$this->load->model('model_suplier');
		$query = $this->model_suplier->getdata($key);
		if($query->num_rows()>0)
		{
			$this->model_suplier->getupdate($key,$data);
			$this->session->set_flashdata('info','Data Sukses Di Update');
		}
		else
		{
			$this->model_suplier->getinsert($data);
			$this->session->set_flashdata('info','Data Sukses Di Simpan');
		}
		redirect('suplier/tambah');
	}

	public function delete()
	{
		$this->model_squrity->getsqurity();
		$this->load->model('model_suplier');

		$key = $this->uri->segment(3);
		$this->db->where('id_suplier',$key);
		$query = $this->db->get('suplier');
		if($query->num_rows()>0)
		{
			$this->model_suplier->getdelete($key);
		}
		redirect('suplier');
	}
}