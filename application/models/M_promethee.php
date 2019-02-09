<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_promethee extends CI_Model{

    public function ambil_kriteria(){
        $this->db->select('id_kriteria, nama_kriteria, kaidah, tipe_preferensi, nama_preferensi');
        $this->db->join('tipe_preferensi','tipe_preferensi.id_preferensi=kriteria.id_preferensi');
        $this->db->group_by('kriteria.id_kriteria');
        return $this->db->get('kriteria')->result_array();
    }

    public function ambil_nilai_alternatif(){
        $this->db->select('nama_polygon, COALESCE(sum(markers_pragu.hutang),0) as jumlah_hutang, count(markers_pragu.id_polygon) as jumlah_pragu, nilai_evaluasi.id_kriteria, jumlah_penduduk, kepadatan_penduduk, tipe_preferensi, id_evaluasi');
        $this->db->join('nilai_evaluasi','nilai_evaluasi.id_kriteria=kriteria.id_kriteria');
        $this->db->join('polygon','polygon.id_polygon=nilai_evaluasi.id_polygon');
        $this->db->join('markers_pragu','markers_pragu.id_polygon=polygon.id_polygon','left');
        $this->db->join('tipe_preferensi','tipe_preferensi.id_preferensi=kriteria.id_preferensi');
        $this->db->group_by('polygon.id_polygon');
        return $this->db->get('kriteria')->result_array();
    }

    public function ambil_nilai_evaluasi(){
        $this->db->select('id_kriteria, id_polygon, nilai');
        return $this->db->get('nilai_evaluasi')->result_array();
    }

    public function ambil_nilai_evaluasia($id_kriteria){
        $this->db->select('nilai_evaluasi.id_kriteria, nilai_evaluasi.id_polygon, nilai, nama_polygon');
        $this->db->join('kriteria','kriteria.id_kriteria=nilai_evaluasi.id_kriteria');
        $this->db->join('tipe_preferensi','tipe_preferensi.id_preferensi=kriteria.id_preferensi');
        $this->db->join('polygon','polygon.id_polygon=nilai_evaluasi.id_polygon');
        $this->db->order_by('id_evaluasi');
        $this->db->where('nilai_evaluasi.id_kriteria',$id_kriteria);
        return $this->db->get('nilai_evaluasi')->result_array();
    }

    public function ambil_kriteria_byid($id_kriteria){
        $this->db->select('id_kriteria, nama_kriteria, kaidah, kriteria.id_preferensi, tipe_preferensi, nama_preferensi');
        $this->db->join('tipe_preferensi','tipe_preferensi.id_preferensi=kriteria.id_preferensi');
        $this->db->where('id_kriteria',$id_kriteria);
        return $this->db->get('kriteria')->result_array();
    }

    public function ambil_tipe_preferensi(){
        return $this->db->get('tipe_preferensi')->result_array();
    }

    public function ambil_kriteria3($id_kriteria){
        $this->db->where('id_kriteria',$id_kriteria);
        return $this->db->get('kriteria')->result_array();
    }

    public function ambil_jumlah_kriteria(){
        return $this->db->get('kriteria')->num_rows();
    }

    public function edit_kriteria($id_kriteria,$data){
        $this->db->where('id_kriteria',$id_kriteria);
        $this->db->update('kriteria',$data);
    }
}