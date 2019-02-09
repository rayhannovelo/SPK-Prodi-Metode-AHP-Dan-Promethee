<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perbandingan_kriteria extends CI_Controller {

	public function __construct() {
		parent::__construct();

		$this->simple_login->cek_login(2);
		$this->load->model('m_kriteria');
	}

	public function index()
	{
		$data['perbandingan_kriteria'] = $this->m_kriteria->ambil_perbandingan_kriteria($this->session->userdata('id_siswa'));

		$this->load->view('siswa/perbandingan_kriteria', $data);
	}

	public function simpan(){
		$id_perbandingan = $this->m_kriteria->ambil_id_perbandingan($this->session->userdata('id_siswa'));
		foreach ($this->input->post('kriteria[]') as $key => $value) {
			$this->m_kriteria->edit_perbandingan_kriteria($this->session->userdata('id_siswa'), $id_perbandingan, $value);
			$id_perbandingan++;
		}
		// $this->session->set_flashdata('hasil','<div class="alert alert-success alert-dismissable text-center"><button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>Data Perbandingan Kriteria Berhasil Diupdate!</div>');
		redirect('kuesioner');
	}
}
