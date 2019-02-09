<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_siswa extends CI_Model{

    public function ambil_siswa() {
        return $this->db->get('siswa')->result_array();
    }

    public function ambil_profil_siswa($id_siswa) {
    	$this->db->where('id_siswa', $id_siswa);
        return $this->db->get('siswa')->result_array();
    }

    public function ambil_nama_siswa($id_users) {
        $this->db->where('id_users', $id_users);
        return $this->db->get('siswa')->row()->nama_siswa;
    }

    public function ambil_id_siswa($id_users) {
        $this->db->where('id_users', $id_users);
        return $this->db->get('siswa')->row()->id_siswa;
    }

    public function hapus_siswa($id_siswa, $id_users){
        $this->db->where('id_users', $id_users);
        $this->db->delete('users');
    }

    public function tambah_users($data) {
        $this->db->insert('users', $data);
        return $this->db->insert_id();
    }

    public function tambah_siswa($data) {
        $this->db->insert('siswa', $data);
        return $this->db->insert_id();
    }
}