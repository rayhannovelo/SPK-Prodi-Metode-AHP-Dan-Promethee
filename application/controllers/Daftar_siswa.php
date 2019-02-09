<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Daftar_siswa extends CI_Controller {

	public function __construct(){
		parent::__construct();

		$this->simple_login->cek_login(1);
		$this->load->model('m_siswa');
	}

	public function index()
	{
		$data['siswa'] = $this->m_siswa->ambil_siswa();
		$this->load->view('admin/daftar_siswa', $data);
	}

	public function hapus_siswa($id_siswa, $id_users) {
		$this->m_siswa->hapus_siswa($id_siswa, $id_users);
		$this->session->set_flashdata('hasil','<div class="alert alert-success alert-dismissable text-center"><button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>Data Siswa Berhasil Dihapus!</div>');
		redirect('daftar_siswa');
	}
}
