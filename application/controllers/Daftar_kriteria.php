<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Daftar_kriteria extends CI_Controller {

	public function __construct(){
		parent::__construct();

		$this->simple_login->cek_login(1);
		$this->load->model('m_kriteria');
		$this->load->model('m_minat');
		$this->load->model('m_matakuliah');
		$this->load->model('m_kriteria');
	}

	public function index()
	{
		$data['kriteria'] = $this->m_kriteria->ambil_kriteria();
		$this->load->view('admin/daftar_kriteria', $data);
	}

	public function edit_kriteria($id_kriteria)
	{
		$data['tipe_preferensi'] = $this->m_kriteria->ambil_tipe_preferensi();
		$data['kriteria'] = $this->m_kriteria->ambil_kriteria_byid($id_kriteria);
		$this->load->view('admin/edit_kriteria', $data);
	}

	public function edit_kriteria_form($id_kriteria)
	{
		$data = array(
			'id_preferensi' => $this->input->post('id_preferensi'),
			'kaidah ' => $this->input->post('kaidah')
		);

		$this->m_kriteria->edit_kriteria($id_kriteria, $data);
		$this->session->set_flashdata('hasil','<div class="alert alert-success alert-dismissable text-center"><button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>Data Kriteria Berhasil Diedit!</div>');
		redirect('daftar_kriteria');
	}
}
