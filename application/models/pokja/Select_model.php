<?php defined('BASEPATH') or exit('No direct script access allowed');

class Select_model extends CI_Model
{
    // Data REVIEW PENGADAAN
    // SELECT * FROM `anggota_pokja` as A JOIN tbl_pokja as B ON A.id_pokja=B.id_pokja JOIN tbl_pengajuan as C ON B.id_pengajuan=C.id_pengajuan WHERE A.id_login = '13' OR B.id_login='11' GROUP BY B.id_pokja
    function getDataReview($id_login)
    {
        $query  = $this->db->select('*');
        $query  = $this->db->from('anggota_pokja as A');
        $query  = $this->db->join('tbl_pokja as B', 'A.id_pokja=B.id_pokja');
        $query  = $this->db->join('tbl_pengajuan as C', 'C.id_pengajuan=B.id_pengajuan');
        $query  = $this->db->where('A.id_login', $id_login);
        $query  = $this->db->or_where('B.id_login', $id_login);
        $query  = $this->db->group_by('B.id_pokja', 'desc');
        $query  = $this->db->get();
        return $query->result();
    }
    function getDataPengajuanDetail($id_pengajuan)
    {
        $query = $this->db->select('*');
        $query = $this->db->from('tbl_pengajuan as A');
        $query = $this->db->join('tbl_login as B', 'A.id_login=B.id_login');
        $query = $this->db->join('tbl_identitas as C', 'B.id_login=C.id_login');
        $query = $this->db->where('A.id_pengajuan', $id_pengajuan);
        $query  = $this->db->get();
        return $query->row_array();
    }
    function getDataKetuaPokja($id_pengajuan)
    {
        $query = $this->db->select('*');
        $query = $this->db->from('tbl_pokja as A');
        $query = $this->db->join('tbl_identitas as B', 'A.id_login=B.id_login');
        $query = $this->db->where('A.id_pengajuan', $id_pengajuan);
        $query = $this->db->get();
        return $query->row_array();
    }
    function getDataAnggotaPokja($id_pokja)
    {
        $query = $this->db->select('*');
        $query = $this->db->from('anggota_pokja as A');
        $query = $this->db->join('tbl_identitas as B', 'A.id_login=B.id_login');
        $query = $this->db->where('A.id_pokja', $id_pokja);
        $query = $this->db->get();
        return $query->result();
    }
    function getDataPengajuanDetailNew($id_pengajuan)
    {
        $query = $this->db->select('*');
        $query = $this->db->from('tbl_pengajuan as A');
        $query = $this->db->join('tbl_login as B', 'A.id_login=B.id_login');
        $query = $this->db->join('tbl_identitas as C', 'B.id_login=C.id_login');
        $query = $this->db->join('tbl_opd as D', 'D.id_opd=C.id_opd');
        $query = $this->db->where('A.id_pengajuan', $id_pengajuan);
        $query  = $this->db->get();
        return $query->row_array();
    }
    function getDataPokjaAnggota($id_ketua)
    {
        $query = $this->db->select('*');
        $query = $this->db->from('tbl_login');
        $query = $this->db->where('level', 'POKJA');
        $query = $this->db->where('status', 'ADA');
        $query = $this->db->where('id_login !=', $id_ketua);
        $query = $this->db->order_by('rand()');
        $query = $this->db->limit(2);
        $query  = $this->db->get();
        return $query->result();
    }
    function getDataKetua()
    {
        $query = $this->db->select('*');
        $query = $this->db->from('tbl_login');
        $query = $this->db->where('level', 'POKJA');
        $query = $this->db->where('status', 'ADA');
        $query = $this->db->order_by('rand()');
        $query  = $this->db->get();
        return $query->row_array();
    }
}
