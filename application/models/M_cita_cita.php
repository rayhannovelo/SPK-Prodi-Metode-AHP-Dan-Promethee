<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_cita_cita extends CI_Model {

    public function ambil_cita_cita() {
        return $this->db->get('cita_cita')->result_array();
    }

    public function ambil_nilai_cita_cita($id_siswa) {
    	$this->db->select('*, 4 as id_kriteria');
    	$this->db->where('id_siswa', $id_siswa);
        return $this->db->get('nilai_cita_cita')->result_array();
    }

    public function ambil_cita_cita_siswa($id_siswa) {
    	$this->db->join('cita_cita', 'cita_cita.id_cita_cita = nilai_cita_cita.id_cita_cita');
    	$this->db->where('id_siswa', $id_siswa);
        return $this->db->get('nilai_cita_cita')->result_array();
    }

    public function ambil_id_nilai_cita_cita($id_siswa){
        $this->db->select('id_nilai_cita_cita');
        $this->db->where('id_siswa', $id_siswa);
        return $this->db->get('nilai_cita_cita')->row()->id_nilai_cita_cita;
    }

    public function ambil_max_cita_cita($id_siswa) {
        $this->db->select_max('nilai_cita_cita');
        $this->db->join('program_studi', 'program_studi.id_cita_cita = nilai_cita_cita.id_cita_cita');
        $this->db->where('id_siswa', $id_siswa);
        return $this->db->get('nilai_cita_cita')->row()->nilai_cita_cita;
    }

    public function ambil_min1_cita_cita($id_siswa) {
        $this->db->select_min('nilai_cita_cita');
        $this->db->join('program_studi', 'program_studi.id_cita_cita = nilai_cita_cita.id_cita_cita');
        $this->db->where('id_siswa', $id_siswa);
        return $this->db->get('nilai_cita_cita')->row()->nilai_cita_cita;
    }

    public function ambil_min2_cita_cita($id_siswa) {
        $this->db->select('nilai_cita_cita');
        $this->db->join('program_studi', 'program_studi.id_cita_cita = nilai_cita_cita.id_cita_cita');
        $this->db->order_by('nilai_cita_cita', 'ASC');
        $this->db->where('id_siswa', $id_siswa);
        return $this->db->get('nilai_cita_cita')->row(1)->nilai_cita_cita;
    }

    public function edit_nilai_cita_cita($id_siswa, $id_nilai_cita_cita, $nilai_cita_cita) {
        $this->db->set('nilai_cita_cita', $nilai_cita_cita);
        $this->db->where('id_siswa', $id_siswa);
        $this->db->where('id_nilai_cita_cita', $id_nilai_cita_cita);
        $this->db->update('nilai_cita_cita');
    }

    public function tambah_cita_cita_siswa($data) {
        $this->db->insert('nilai_cita_cita', $data);
    }
}