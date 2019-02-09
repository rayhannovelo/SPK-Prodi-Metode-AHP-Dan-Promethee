<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_matakuliah extends CI_Model {

    public function ambil_matakuliah() {
        return $this->db->get('mata_pelajaran')->result_array();
    }

    public function ambil_nilai_pelajaran($id_siswa) {
    	$this->db->select('*, 2 as id_kriteria');
    	$this->db->where('id_siswa', $id_siswa);
        return $this->db->get('nilai_pelajaran')->result_array();
    }

    public function ambil_pelajaran_siswa($id_siswa) {
    	$this->db->join('mata_pelajaran', 'mata_pelajaran.id_pelajaran = nilai_pelajaran.id_pelajaran');
    	$this->db->where('id_siswa', $id_siswa);
        return $this->db->get('nilai_pelajaran')->result_array();
    }

    public function ambil_id_nilai_pelajaran($id_siswa){
        $this->db->select('id_nilai_pelajaran');
        $this->db->where('id_siswa', $id_siswa);
        return $this->db->get('nilai_pelajaran')->row()->id_nilai_pelajaran;
    }

    public function ambil_max_nilai($id_siswa) {
        $this->db->select_max('nilai_pelajaran');
        $this->db->join('program_studi', 'program_studi.id_pelajaran = nilai_pelajaran.id_pelajaran');
        $this->db->where('id_siswa', $id_siswa);
        return $this->db->get('nilai_pelajaran')->row()->nilai_pelajaran;
    }

    public function ambil_min1_nilai($id_siswa) {
        $this->db->select_min('nilai_pelajaran');
        $this->db->join('program_studi', 'program_studi.id_pelajaran = nilai_pelajaran.id_pelajaran');
        $this->db->where('id_siswa', $id_siswa);
        return $this->db->get('nilai_pelajaran')->row()->nilai_pelajaran;
    }

    public function ambil_min2_nilai($id_siswa) {
        $this->db->select('nilai_pelajaran');
        $this->db->join('program_studi', 'program_studi.id_pelajaran = nilai_pelajaran.id_pelajaran');
        $this->db->order_by('nilai_pelajaran', 'ASC');
        $this->db->where('id_siswa', $id_siswa);
        return $this->db->get('nilai_pelajaran')->row(1)->nilai_pelajaran;
    }

    public function edit_nilai_pelajaran($id_siswa, $id_nilai_pelajaran, $nilai_pelajaran) {
        $this->db->set('nilai_pelajaran', $nilai_pelajaran);
        $this->db->where('id_siswa', $id_siswa);
        $this->db->where('id_nilai_pelajaran', $id_nilai_pelajaran);
        $this->db->update('nilai_pelajaran');
    }

    public function tambah_nilai_siswa($data) {
        $this->db->insert('nilai_pelajaran', $data);
    }
}