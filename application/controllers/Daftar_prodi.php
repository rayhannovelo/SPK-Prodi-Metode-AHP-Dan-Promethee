<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Daftar_prodi extends CI_Controller {

	public function __construct() {
		parent::__construct();

		$this->simple_login->cek_login(1);
		$this->load->model('m_prodi');
		$this->load->model('m_minat');
		$this->load->model('m_matakuliah');
		$this->load->model('m_cita_cita');
	}

	public function index()
	{
		$data['prodi'] = $this->m_prodi->ambil_prodi();
		$this->load->view('admin/daftar_prodi', $data);
	}

	public function hapus_siswa($id_siswa, $id_users) {
		$this->m_siswa->hapus_siswa($id_siswa, $id_users);
		$this->session->set_flashdata('hasil','<div class="alert alert-success alert-dismissable text-center"><button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>Data Siswa Berhasil Dihapus!</div>');
		redirect('daftar_siswa');
	}

	public function tambah_prodi()
	{
		$data['akreditasi'] = $this->m_prodi->ambil_akreditasi();
		$data['mata_pelajaran'] = $this->m_matakuliah->ambil_matakuliah();
		$data['minat'] = $this->m_minat->ambil_minat();
		$data['cita_cita'] = $this->m_cita_cita->ambil_cita_cita();
		$this->load->view('admin/tambah_prodi', $data);
	}

	public function tambah_prodi_form()
	{
		$data = array(
			'nama_prodi' =>  $this->input->post('nama_prodi'),
			'id_pelajaran' => $this->input->post('id_pelajaran'),
			'id_minat' => $this->input->post('id_minat'),
			'id_akreditasi' => $this->input->post('id_akreditasi'),
			'id_cita_cita' => $this->input->post('id_cita_cita')
		);

		$this->m_prodi->tambah_prodi($data);
		$this->session->set_flashdata('hasil','<div class="alert alert-success alert-dismissable text-center"><button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>Data Program Studi Berhasil Ditambah!</div>');
		redirect('daftar_prodi/tambah_prodi');
	}

	public function edit_prodi($id_prodi)
	{
		$data['prodi'] = $this->m_prodi->ambil_prodi_byid($id_prodi);
		$data['akreditasi'] = $this->m_prodi->ambil_akreditasi();
		$data['mata_pelajaran'] = $this->m_matakuliah->ambil_matakuliah();
		$data['minat'] = $this->m_minat->ambil_minat();
		$data['cita_cita'] = $this->m_cita_cita->ambil_cita_cita();
		$this->load->view('admin/edit_prodi', $data);
	}

	public function edit_prodi_form($id_prodi)
	{
		$data = array(
			'nama_prodi' =>  $this->input->post('nama_prodi'),
			'id_pelajaran' => $this->input->post('id_pelajaran'),
			'id_minat' => $this->input->post('id_minat'),
			'id_akreditasi' => $this->input->post('id_akreditasi'),
			'id_cita_cita' => $this->input->post('id_cita_cita')
		);

		$this->m_prodi->edit_prodi($id_prodi, $data);
		$this->session->set_flashdata('hasil','<div class="alert alert-success alert-dismissable text-center"><button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>Data Program Studi Berhasil Diedit!</div>');
		redirect('daftar_prodi');
	}

	public function hapus_prodi($id_prodi){
		$this->m_prodi->hapus_prodi($id_prodi);
		$this->session->set_flashdata('hasil','<div class="alert alert-success alert-dismissable text-center"><button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>Data Program Studi Berhasil Dihapus!</div>');
		redirect('daftar_prodi');
	}
}
