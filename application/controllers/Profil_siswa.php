<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil_siswa extends CI_Controller {

	public function __construct(){
		parent::__construct();

		$this->simple_login->cek_login(2);
		$this->load->model('m_siswa');
	}

	public function index()
	{
		$data['profil_siswa'] = $this->m_siswa->ambil_profil_siswa($this->session->userdata('id_siswa'));
		$this->load->view('siswa/profil_siswa', $data);
	}
}
