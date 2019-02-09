<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kuesioner extends CI_Controller {

	public function __construct(){
		parent::__construct();
		
	}

	public function index()
	{
		$data['minat'] = $this->m_minat->ambil_minat_siswa($this->session->userdata('id_siswa'));
		$data['nilai_pelajaran'] = $this->m_matakuliah->ambil_pelajaran_siswa($this->session->userdata('id_siswa'));
		$this->load->view('siswa/kuesioner', $data);
	}

	public function simpan() {
		$id_nilai_minat = $this->m_minat->ambil_id_nilai_minat($this->session->userdata('id_siswa'));

		foreach ($this->input->post('minat[]') as $value) {
			$this->m_minat->edit_nilai_minat($this->session->userdata('id_siswa'), $id_nilai_minat, $value);
			$id_nilai_minat++;
		}

		$id_nilai_pelajaran = $this->m_matakuliah->ambil_id_nilai_pelajaran($this->session->userdata('id_siswa'));

		foreach ($this->input->post('pelajaran[]') as $value) {
			$this->m_matakuliah->edit_nilai_pelajaran($this->session->userdata('id_siswa'), $id_nilai_pelajaran, $value);
			$id_nilai_pelajaran++;
		}
		$this->session->set_flashdata('hasil','<div class="alert alert-success alert-dismissable text-center"><button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>Data Kuesioner Berhasil Diupdate!</div>');
		redirect('kuesioner');
	}
}
