<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Promethee extends CI_Controller {

	public function __construct() {
		parent::__construct();

		$this->simple_login->cek_login(2);
		$this->load->model('m_promethee');
		$this->load->model('m_prodi');
		$this->load->model('m_kriteria');
		$this->load->model('m_minat');
		$this->load->model('m_matakuliah');
		$this->load->model('m_cita_cita');
	}

	public function index()
	{
		$data['jumlah_alternatif'] = $this->m_prodi->ambil_jumlah_prodi();
		$data['jumlah_kriteria'] = $this->m_kriteria->ambil_jumlah_kriteria();
		$data['alternatif'] = $this->m_prodi->ambil_prodi();
		$data['kriteria'] = $this->m_kriteria->ambil_kriteria();
		$data['nilai_minat'] = $this->m_minat->ambil_nilai_minat($this->session->userdata('id_siswa'));
		$data['nilai_pelajaran'] = $this->m_matakuliah->ambil_nilai_pelajaran($this->session->userdata('id_siswa'));
		$data['nilai_cita_cita'] = $this->m_cita_cita->ambil_nilai_cita_cita($this->session->userdata('id_siswa'));
		$data['perbandingan_kriteria'] = $this->m_kriteria->ambil_perbandingan_kriteria();

	 	foreach($data['kriteria'] as $key => $k) {           
            foreach($data['alternatif'] as $a) {
                if($k['id_kriteria'] == 1){ // minat
                    foreach($data['nilai_minat'] as $m) {
                        if($m['id_minat'] == $a['id_minat']){
                           	$data['daftar_nilai'][$key][] = $m['nilai_minat'];
                            break;
                        }
                    }
                }elseif($k['id_kriteria'] == 2) { // nilai
                    foreach($data['nilai_pelajaran'] as $p) {
                        if($p['id_pelajaran'] == $a['id_pelajaran']){
                            $data['daftar_nilai'][$key][] = $p['nilai_pelajaran'];
                            break;
                        }
                    }
                }elseif($k['id_kriteria'] == 3) { // akreditasi
                     $data['daftar_nilai'][$key][] = $a['nilai_akreditasi'];
                }elseif($k['id_kriteria'] == 4) { // cita cita
                    foreach($data['nilai_cita_cita'] as $c) {
                        if($c['id_cita_cita'] == $a['id_cita_cita']){
                            $data['daftar_nilai'][$key][] = $c['nilai_cita_cita'];
                            break;
                        }
                    }
                }
            }

            if($k['id_kriteria'] == 1){ // minat
				$max = $this->m_minat->ambil_max_minat($this->session->userdata('id_siswa'));
				$min1 = $this->m_minat->ambil_min1_minat($this->session->userdata('id_siswa'));
				$min2 = $this->m_minat->ambil_min2_minat($this->session->userdata('id_siswa'));
				$z = $data['jumlah_alternatif'];

				$k1 = $max - $min1;
				$k2 = $min2 - $min1;
				$v = $k1 - $k2;
				$q = $v / $z;
				$p = $v - $q;
				$g = ($p + $q) / 2; 

				$data['parameter'][$key]['p'] = $p;
				$data['parameter'][$key]['q'] = $q;
				$data['parameter'][$key]['g'] = $g;
            }elseif($k['id_kriteria'] == 2) { // nilai
            	$max = $this->m_matakuliah->ambil_max_nilai($this->session->userdata('id_siswa'));
				$min1 = $this->m_matakuliah->ambil_min1_nilai($this->session->userdata('id_siswa'));
				$min2 = $this->m_matakuliah->ambil_min2_nilai($this->session->userdata('id_siswa'));
				$z = $data['jumlah_alternatif'];

				$k1 = $max - $min1;
				$k2 = $min2 - $min1;
				$v = $k1 - $k2; 
				$q = $v / $z;
				$p = $v - $q;
				$g = ($p + $q) / 2;

				$data['parameter'][$key]['p'] = $p;
				$data['parameter'][$key]['q'] = $q;
				$data['parameter'][$key]['g'] = $g;
            }elseif($k['id_kriteria'] == 3) { // akreditasi
            	$max = $this->m_prodi->ambil_max_akreditasi();
				$min1 = $this->m_prodi->ambil_min1_akreditasi();
				$min2 = $this->m_prodi->ambil_min2_akreditasi();
				$z = $data['jumlah_alternatif'];

				$k1 = $max - $min1;
				$k2 = $min2 - $min1;
				$v = $k1 - $k2;
				$q = $v / $z;
				$p = $v - $q;
				$g = ($p + $q) / 2;

				$data['parameter'][$key]['p'] = $p;
				$data['parameter'][$key]['q'] = $q;
				$data['parameter'][$key]['g'] = $g;
            }elseif($k['id_kriteria'] == 4) { // cita cita
            	$max = $this->m_cita_cita->ambil_max_cita_cita($this->session->userdata('id_siswa'));
				$min1 = $this->m_cita_cita->ambil_min1_cita_cita($this->session->userdata('id_siswa'));
				$min2 = $this->m_cita_cita->ambil_min2_cita_cita($this->session->userdata('id_siswa'));
				$z = $data['jumlah_alternatif'];

				$k1 = $max - $min1;
				$k2 = $min2 - $min1;
				$v = $k1 - $k2;
				$q = $v / $z;
				$p = $v - $q;
				$g = ($p + $q) / 2;

				$data['parameter'][$key]['p'] = $p;
				$data['parameter'][$key]['q'] = $q;
				$data['parameter'][$key]['g'] = $g;
            }
        }

		foreach ($data['alternatif'] as $alternatif) {
			$data['daftar_alternatif1'][] = $alternatif['nama_prodi']; // daftar nama alternatif
		}

		$this->load->view('siswa/kalkulasi_spk', $data);
	}

	public function kriteria(){
		$data['jumlah_alternatif'] = $this->m_maps->ambil_total_polygon();
		$data['alternatif'] = $this->m_maps->ambil_nama_polygon();
		$data['kriteria'] = $this->m_promethee->ambil_kriteria();
		$data['nilai_alternatif'] = $this->m_promethee->ambil_nilai_evaluasi();
		$this->load->view('kriteria', $data);
	}

	public function edit_kriteria($id_kriteria){
		$data['tipe_preferensi'] = $this->m_promethee->ambil_tipe_preferensi();
		$data['kriteria'] = $this->m_promethee->ambil_kriteria_byid($id_kriteria);
		$this->load->view('edit_kriteria', $data);
	}

	public function edit_kriteria_form(){
		$data = array(
			'id_preferensi' => $this->input->post('id_preferensi'),
			'kaidah ' => $this->input->post('kaidah'),
			'bobot ' => $this->input->post('bobot'),
			'p' => $this->input->post('p'),
			'q' => $this->input->post('q'),
			'g' => $this->input->post('g'),
		);
		$this->m_promethee->edit_kriteria($this->input->post('id_kriteria'), $data);
		redirect('promethee/kriteria');
	}
}
