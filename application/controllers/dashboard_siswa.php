<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_siswa extends CI_Controller {

	public function __construct(){
		parent::__construct();

		$this->simple_login->cek_login(2);
	}

	public function index()
	{
		$this->load->view('siswa/dashboard');
	}
}
