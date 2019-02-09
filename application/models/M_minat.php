<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_minat extends CI_Model {

    public function ambil_minat() {
        return $this->db->get('minat')->result_array();
    }

    public function ambil_nilai_minat($id_siswa) {
    	$this->db->select('*, 1 as id_kriteria');
    	$this->db->where('id_siswa', $id_siswa);
        return $this->db->get('nilai_minat')->result_array();
    }

    public function ambil_minat_siswa($id_siswa) {
    	$this->db->join('minat', 'minat.id_minat = nilai_minat.id_minat');
    	$this->db->where('id_siswa', $id_siswa);
        return $this->db->get('nilai_minat')->result_array();
    }

    public function ambil_id_nilai_minat($id_siswa){
        $this->db->select('id_nilai_minat');
        $this->db->where('id_siswa', $id_siswa);
        return $this->db->get('nilai_minat')->row()->id_nilai_minat;
    }

    public function ambil_max_minat($id_siswa) {
        $this->db->select_max('nilai_minat');
        $this->db->join('program_studi', 'program_studi.id_minat = nilai_minat.id_minat');
        $this->db->where('id_siswa', $id_siswa);
        return $this->db->get('nilai_minat')->row()->nilai_minat;
    }

    public function ambil_min1_minat($id_siswa) {
        $this->db->select_min('nilai_minat');
        $this->db->join('program_studi', 'program_studi.id_minat = nilai_minat.id_minat');
        $this->db->where('id_siswa', $id_siswa);
        return $this->db->get('nilai_minat')->row()->nilai_minat;
    }

    public function ambil_min2_minat($id_siswa) {
        $this->db->select('nilai_minat');
        $this->db->join('program_studi', 'program_studi.id_minat = nilai_minat.id_minat');
        $this->db->order_by('nilai_minat', 'ASC');
        $this->db->where('id_siswa', $id_siswa);
        return $this->db->get('nilai_minat')->row(1)->nilai_minat;
    }

    public function edit_nilai_minat($id_siswa, $id_nilai_minat, $nilai_minat) {
        $this->db->set('nilai_minat', $nilai_minat);
        $this->db->where('id_siswa', $id_siswa);
        $this->db->where('id_nilai_minat', $id_nilai_minat);
        $this->db->update('nilai_minat');
    }

    public function tambah_minat_siswa($data) {
        $this->db->insert('nilai_minat', $data);
    }
}