<?php defined('BASEPATH') or exit('No direct script access allowed');

class Select_model extends CI_Model
{
    // Data PPK
    // Select * from tbl_login as A join tbl_identitas as B on A.id_login=B.id_login join tbl_opd as C on B.id_opd=C.id_opd where A.status = 'ADA' and C.status='ADA'
    function getDataPengajuan()
    {
        $query  = $this->db->select('*');
        $query  = $this->db->from('tbl_pengajuan as A');
        $query  = $this->db->join('tbl_login as B', 'A.id_login=B.id_login');
        $query  = $this->db->join('tbl_identitas as C', 'C.id_login=B.id_login');
        $query  = $this->db->where('A.id_login', $this->session->userdata('id_login'));
        $query  = $this->db->where('A.status_pengajuan !=', 'SELESAI');
        $query  = $this->db->or_where('A.status_pengajuan !=', 'PROSES');
        $query  = $this->db->order_by('A.id_pengajuan', 'DESC');
        $query  = $this->db->get();
        return $query->result();
    }
    function getKodeNota()
    {
        $bulan  = date('m');
        $tahun  = date('Y');
        $query  = $this->db->select('max(id_pengajuan) as max_kode');
        $query  = $this->db->from('tbl_pengajuan');
        $query  = $this->db->where('month(tgl_pengajuan)', $bulan);
        $query  = $this->db->where('year(tgl_pengajuan)', $tahun);
        $query  = $this->db->get();
        return $query->row_array();
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
    function getDataKonfirmasi($id_pengajuan)
    {
        $query = $this->db->select('*');
        $query = $this->db->from('tbl_konfirmasi');
        $query = $this->db->where('id_pengajuan', $id_pengajuan);
        $query = $this->db->order_by('id_konfirmasi', 'DESC');
        $query = $this->db->get();
        return $query->row_array();
    }
    function getDataReview($id_login)
    {
        $query = $this->db->select('*');
        $query = $this->db->from('tbl_pengajuan as A');
        $query = $this->db->join('tbl_login as B', 'A.id_login=B.id_login');
        $query = $this->db->join('tbl_identitas as C', 'B.id_login=C.id_login');
        $query = $this->db->join('tbl_pokja as E', 'E.id_pengajuan=A.id_pengajuan');
        $query = $this->db->join('tbl_opd as D', 'C.id_opd=D.id_opd');
        $query = $this->db->where('A.id_login', $id_login);
        $query = $this->db->where('A.status_pengajuan', 'VERIFIKASI');
        $query  = $this->db->order_by('A.id_pengajuan', 'DESC');
        $query = $this->db->get();
        return $query->result();
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
}
