<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_kriteria extends CI_Model{

    public function ambil_kriteria() {
        $this->db->select('id_kriteria, nama_kriteria, kaidah, tipe_preferensi, nama_preferensi');
        $this->db->join('tipe_preferensi','tipe_preferensi.id_preferensi=kriteria.id_preferensi');
        $this->db->group_by('kriteria.id_kriteria');
        return $this->db->get('kriteria')->result_array();
    }

    public function ambil_kriteria_byid($id_kriteria) {
        $this->db->select('id_kriteria, kriteria.id_preferensi, nama_kriteria, kaidah, tipe_preferensi, nama_preferensi');
        $this->db->join('tipe_preferensi','tipe_preferensi.id_preferensi=kriteria.id_preferensi');
        $this->db->group_by('kriteria.id_kriteria');
        $this->db->where('id_kriteria', $id_kriteria);
        return $this->db->get('kriteria')->result_array();
    }

    public function ambil_jumlah_kriteria() {
        return $this->db->get('kriteria')->num_rows();
    }

    public function edit_kriteria($id_kriteria, $data) {
        $this->db->where('id_kriteria', $id_kriteria);
        $this->db->update('kriteria', $data);
    }

    public function ambil_perbandingan_kriteria() {
        return $this->db->get('perbandingan_kriteria')->result_array();
    }

    public function ambil_perbandingan_kriteria_byid($id_siswa) {
        $this->db->where('id_siswa', $id_siswa);
        return $this->db->get('perbandingan_kriteria')->result_array();
    }

    public function ambil_id_perbandingan($id_siswa){
        $this->db->select('id_perbandingan');
        $this->db->where('id_siswa', $id_siswa);
        return $this->db->get('perbandingan_kriteria')->row()->id_perbandingan;
    }

    public function tambah_nilai_perbandingan($data) {
        $this->db->insert('perbandingan_kriteria', $data);
    }

    public function edit_perbandingan_kriteria($id_siswa, $id_perbandingan, $nilai) {
        $this->db->set('nilai', $nilai);
        $this->db->where('id_siswa', $id_siswa);
        $this->db->where('id_perbandingan', $id_perbandingan);
        $this->db->update('perbandingan_kriteria');
    }

    public function ambil_tipe_preferensi(){
        return $this->db->get('tipe_preferensi')->result_array();
    }
}