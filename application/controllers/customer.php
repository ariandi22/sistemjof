<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends CI_Controller {

	public function index()
	{
		$this->model_squrity->getsqurity();
		$isi['content'] 	= 'Customer/tampil_datacustomer';
		$isi['judul'] 		= 'Master';
		$isi['sub_judul']	= 'Customer';
		$isi['data']		= $this->db->get('customer');
		$this->load->view('tampilan_home',$isi);
	}

	public function tambah()
	{
		$this->model_squrity->getsqurity();
		$this->load->model('model_customer');
		$isi['kode'] = $this->model_customer->buat_kode(); // kita load kodenya via model disini.
		$isi['content'] 			= 'Customer/form_tambahcustomer';
		$isi['judul'] 				= 'Master';
		$isi['sub_judul']			= 'Tambah Customer';
		$isi['idcustomer']			= '';
		$isi['namapemesan']			= '';
		$isi['namaperusahaan']		= '';
		$isi['namaproyek']			= '';
		$isi['alamatperusahaan']	= '';
		$isi['alamatproyek']		= '';
		$isi['notelp']				= '';
		$this->load->view('tampilan_home',$isi);
	}

	public function edit()
	{
		$this->model_squrity->getsqurity();
		$isi['content'] 	= 'Customer/form_tambahcustomer';
		$isi['judul'] 		= 'Master';
		$isi['sub_judul']	= 'Edit Customer';

		$key = $this->uri->segment(3);
		$this->db->where('id_customer',$key);
		$query = $this->db->get('customer');
		if($query->num_rows()>0)
		{
			foreach ($query->result() as $row) 
			{
				$isi['idcustomer']			= $row->id_customer;
				$isi['namapemesan']			= $row->nama_pemesan;
				$isi['namaperusahaan']		= $row->nama_perusahaan;
				$isi['namaproyek']			= $row->nama_proyek;
				$isi['alamatperusahaan']	= $row->alamat_perusahaan;
				$isi['alamatproyek']		= $row->alamat_proyek;
				$isi['notelp']				= $row->telp;				
			}
		}
		else
		{
				$isi['idcustomer']			= '';
				$isi['namapemesan']			= '';
				$isi['namaperusahaan']		= '';
				$isi['namaproyek']			= '';
				$isi['alamatperusahaan']	= '';
				$isi['alamatproyek']		= '';
				$isi['notelp']				= '';
		}

		$this->load->view('tampilan_home',$isi);
	}

	public function simpan()
	{
		$this->model_squrity->getsqurity();
		
		$key = $this->input->post('idcustomer');
		$data['id_customer']		= $this->input->post('idcustomer');
		$data['nama_pemesan']		= $this->input->post('namapemesan');
		$data['nama_perusahaan']	= $this->input->post('namaperusahaan');
		$data['nama_proyek']		= $this->input->post('namaproyek');
		$data['alamat_perusahaan']	= $this->input->post('alamatperusahaan');
		$data['alamat_proyek']		= $this->input->post('alamatproyek');
		$data['telp']				= $this->input->post('notelp');  

		$this->load->model('model_customer');
		$query = $this->model_customer->getdata($key);
		if($query->num_rows()>0)
		{
			$this->model_customer->getupdate($key,$data);
			$this->session->set_flashdata('info','Data Sukses Di Update');
		}
		else
		{
			$this->model_customer->getinsert($data);
			$this->session->set_flashdata('info','Data Sukses Di Simpan');
		}
		redirect('customer/tambah');
	}

	public function delete()
	{
		$this->model_squrity->getsqurity();
		$this->load->model('model_customer');

		$key = $this->uri->segment(3);
		$this->db->where('id_customer',$key);
		$query = $this->db->get('customer');
		if($query->num_rows()>0)
		{
			$this->model_customer->getdelete($key);
		}
		redirect('customer');
	}

	
}