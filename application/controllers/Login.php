<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index() {
		$valid = $this->form_validation;
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$level = $this->input->post('level');
		$valid->set_rules('username','Username','trim|required|xss_clean');
		$valid->set_rules('password','Password','trim|required|xss_clean');
		$valid->set_rules('level','Level','trim|required|xss_clean');
		if($valid->run()) {
			$this->simple_login->login($username,$password,$level);
		}
		$this->load->view('login/login');
	}
	
	public function logout() {
		$this->simple_login->logout();	
	}

	public function register() {
		$this->load->model('m_siswa');
		$this->load->model('m_matakuliah');
		$this->load->model('m_minat');
		$this->load->model('m_kriteria');
		$this->load->model('m_cita_cita');

		$data = array(
			'username' =>  $this->input->post('username'),
			'password' => md5($this->input->post('password')),
			'level' => 2
		);

		$id_users = $this->m_siswa->tambah_users($data);

		$data = array(
			'id_users' =>  $id_users,
			'nama_siswa' =>  $this->input->post('nama_siswa'),
			'gender' =>  $this->input->post('gender'),
			'alamat' =>  $this->input->post('alamat')
		);

		$id_siswa = $this->m_siswa->tambah_siswa($data);

		for($i = 1; $i <= 9; $i++) { 
			$data = array(
				'id_siswa' =>  $id_siswa,
				'id_pelajaran' =>  $i,
				'nilai_pelajaran' => 0
			);
			$this->m_matakuliah->tambah_nilai_siswa($data);
		}

		for($i = 1; $i <= 5; $i++) { 
			$data = array(
				'id_siswa' =>  $id_siswa,
				'id_minat' =>  $i,
				'nilai_minat' => 1
			);
			$this->m_minat->tambah_minat_siswa($data);
		}

		for($i = 1; $i <= 5; $i++) { 
			$data = array(
				'id_siswa' =>  $id_siswa,
				'id_cita_cita' =>  $i,
				'nilai_cita_cita' => 1
			);
			$this->m_cita_cita->tambah_cita_cita_siswa($data);
		}

		for($i = 1; $i <= 16; $i++) { 
			$data = array(
				'id_siswa' =>  $id_siswa,
				'nilai' => 1
			);
			$this->m_kriteria->tambah_nilai_perbandingan($data);
		}

		$this->session->set_flashdata('sukses','<div class="alert alert-success alert-dismissable text-center"><button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>Selamat, Anda berhasil melakukan registrasi! <br> Silahkan Log In untuk masuk ke sistem.</div>');
		redirect('login');
	}
}	