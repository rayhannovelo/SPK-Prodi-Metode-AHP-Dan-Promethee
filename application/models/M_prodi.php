<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_prodi extends CI_Model{

    public function ambil_prodi() {
        $this->db->join('cita_cita', 'cita_cita.id_cita_cita = program_studi.id_cita_cita');
    	$this->db->join('minat', 'minat.id_minat = program_studi.id_minat');
    	$this->db->join('mata_pelajaran', 'mata_pelajaran.id_pelajaran = program_studi.id_pelajaran');
        $this->db->join('akreditasi', 'akreditasi.id_akreditasi = program_studi.id_akreditasi');
        return $this->db->get('program_studi')->result_array();
    }

    public function ambil_max_akreditasi() {
        $this->db->select_max('nilai_akreditasi');
        $this->db->join('akreditasi', 'akreditasi.id_akreditasi = program_studi.id_akreditasi');
        return $this->db->get('program_studi')->row()->nilai_akreditasi;
    }

    public function ambil_min1_akreditasi() {
        $this->db->select_min('nilai_akreditasi');
        $this->db->join('akreditasi', 'akreditasi.id_akreditasi = program_studi.id_akreditasi');
        return $this->db->get('program_studi')->row()->nilai_akreditasi;
    }

    public function ambil_min2_akreditasi() {
        $this->db->select('nilai_akreditasi');
        $this->db->order_by('nilai_akreditasi', 'ASC');
        $this->db->join('akreditasi', 'akreditasi.id_akreditasi = program_studi.id_akreditasi');
        return $this->db->get('program_studi')->row(1)->nilai_akreditasi;
    }

    public function ambil_prodi_byid($id_prodi) {
        $this->db->where('id_prodi', $id_prodi);
        return $this->db->get('program_studi')->result_array();
    }

    public function ambil_jumlah_prodi() {
        return $this->db->get('program_studi')->num_rows();
    }

    public function ambil_akreditasi() {
    	return $this->db->get('akreditasi')->result_array();
    }

    public function tambah_prodi($data) {
        $this->db->insert('program_studi', $data);
    }

    public function edit_prodi($id_prodi, $data) {
        $this->db->where('id_prodi', $id_prodi);
        $this->db->update('program_studi', $data);
    }

    public function hapus_prodi($id_prodi) {
        $this->db->where('id_prodi', $id_prodi);
        $this->db->delete('program_studi');
    }
}