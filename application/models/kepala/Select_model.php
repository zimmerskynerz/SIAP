<?php defined('BASEPATH') or exit('No direct script access allowed');

class Select_model extends CI_Model
{
    // Data PPK
    // Select * from tbl_login as A join tbl_identitas as B on A.id_login=B.id_login join tbl_opd as C on B.id_opd=C.id_opd where A.status = 'ADA' and C.status='ADA'
    function getDataPPK()
    {
        $query  = $this->db->select('*');
        $query  = $this->db->from('tbl_login as A');
        $query  = $this->db->join('tbl_identitas as B', 'A.id_login=B.id_login');
        $query  = $this->db->join('tbl_opd as C', 'C.id_opd=B.id_opd');
        $query  = $this->db->where('A.status', 'ADA');
        $query  = $this->db->where('C.status', 'ADA');
        $query  = $this->db->get();
        return $query->result();
    }
    // Data POKJA
    // sELECT * FROM TBL_LOGIN AS a JOIN TBL_IDENTITAS AS b ON a.ID_LOGIN=b.ID_LOGIN WHERE A.STATUS='ADA' AND A.LEVEL='POKJA'
    function getDataPOKJA()
    {
        $query  = $this->db->select('*');
        $query  = $this->db->from('tbl_login as A');
        $query  = $this->db->join('tbl_identitas as B', 'A.id_login=B.id_login');
        $query  = $this->db->where('A.status', 'ADA');
        $query  = $this->db->where('A.level', 'POKJA');
        $query  = $this->db->get();
        return $query->result();
    }
    function getDataPengajuan()
    {
        $query = $this->db->select('*');
        $query = $this->db->from('tbl_pengajuan as A');
        $query = $this->db->join('tbl_login as B', 'A.id_login=B.id_login');
        $query = $this->db->join('tbl_identitas as C', 'B.id_login=C.id_login');
        $query = $this->db->join('tbl_opd as D', 'C.id_opd=D.id_opd');
        $query = $this->db->where('A.status_pengajuan', 'PENGAJUAN');
        $query  = $this->db->order_by('A.id_pengajuan', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }

    function getDataPengajuanDiterima()
    {
        $query = $this->db->select('*');
        $query = $this->db->from('tbl_pengajuan as A');
        $query = $this->db->join('tbl_login as B', 'A.id_login=B.id_login');
        $query = $this->db->join('tbl_identitas as C', 'B.id_login=C.id_login');
        $query = $this->db->join('tbl_opd as D', 'C.id_opd=D.id_opd');
        $query = $this->db->where('A.status_pengajuan', 'DITERIMA');
        $query  = $this->db->order_by('A.id_pengajuan', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }
    function getDataPengajuanDitolak()
    {
        $query = $this->db->select('*');
        $query = $this->db->from('tbl_pengajuan as A');
        $query = $this->db->join('tbl_login as B', 'A.id_login=B.id_login');
        $query = $this->db->join('tbl_identitas as C', 'B.id_login=C.id_login');
        $query = $this->db->join('tbl_opd as D', 'C.id_opd=D.id_opd');
        $query = $this->db->where('A.status_pengajuan', 'DITOLAK');
        $query  = $this->db->order_by('A.id_pengajuan', 'DESC');
        $query = $this->db->get();
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
    function getDataReview()
    {
        $query = $this->db->select('*');
        $query = $this->db->from('tbl_pengajuan as A');
        $query = $this->db->join('tbl_login as B', 'A.id_login=B.id_login');
        $query = $this->db->join('tbl_identitas as C', 'B.id_login=C.id_login');
        $query = $this->db->join('tbl_pokja as E', 'E.id_pengajuan=A.id_pengajuan');
        $query = $this->db->join('tbl_opd as D', 'C.id_opd=D.id_opd');
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
    // KEPALA
    // Ambil data pengajuan
    function getDataPengajuanOPD($bulan, $tahun)
    {
        $query = $this->db->select('*, count(*) as jml_pengajuanOPD');
        $query = $this->db->from('tbl_pengajuan as A');
        $query = $this->db->join('tbl_login as B', 'A.id_login=B.id_login');
        $query = $this->db->join('tbl_identitas as C', 'B.id_login=C.id_login');
        $query = $this->db->join('tbl_opd as D', 'C.id_opd=D.id_opd');
        $query = $this->db->where('A.status_pengajuan', 'PENGAJUAN');
        $query  = $this->db->group_by('D.id_opd');
        $query = $this->db->where('month(A.tgl_pengajuan)', $bulan);
        $query = $this->db->where('year(A.tgl_pengajuan)', $tahun);
        $query = $this->db->get();
        return $query->result();
    }
    // Ambil data pengajuan
    function getDataReviewOPD($bulan, $tahun)
    {
        $query = $this->db->select('*, count(*) as jml_reviewOPD');
        $query = $this->db->from('tbl_pengajuan as A');
        $query = $this->db->join('tbl_login as B', 'A.id_login=B.id_login');
        $query = $this->db->join('tbl_identitas as C', 'B.id_login=C.id_login');
        $query = $this->db->join('tbl_opd as D', 'C.id_opd=D.id_opd');
        $query = $this->db->where('A.status_pengajuan', 'VERIFIKASI');
        $query  = $this->db->group_by('D.id_opd');
        $query = $this->db->where('month(A.tgl_pengajuan)', $bulan);
        $query = $this->db->where('year(A.tgl_pengajuan)', $tahun);
        $query = $this->db->get();
        return $query->result();
    }
    // Ambil data pengajuan
    function getDataPengajuanDiterimaOPD($bulan, $tahun)
    {
        $query = $this->db->select('*, count(*) as jml_diterimaOPD');
        $query = $this->db->from('tbl_pengajuan as A');
        $query = $this->db->join('tbl_login as B', 'A.id_login=B.id_login');
        $query = $this->db->join('tbl_identitas as C', 'B.id_login=C.id_login');
        $query = $this->db->join('tbl_opd as D', 'C.id_opd=D.id_opd');
        $query = $this->db->where('A.status_pengajuan', 'DITERIMA');
        $query  = $this->db->group_by('D.id_opd');
        $query = $this->db->where('month(A.tgl_pengajuan)', $bulan);
        $query = $this->db->where('year(A.tgl_pengajuan)', $tahun);
        $query = $this->db->get();
        return $query->result();
    }
    // Ambil data pengajuan
    function getDataPengajuanDitolakOPD($bulan, $tahun)
    {
        $query = $this->db->select('*, count(*) as jml_ditolakOPD');
        $query = $this->db->from('tbl_pengajuan as A');
        $query = $this->db->join('tbl_login as B', 'A.id_login=B.id_login');
        $query = $this->db->join('tbl_identitas as C', 'B.id_login=C.id_login');
        $query = $this->db->join('tbl_opd as D', 'C.id_opd=D.id_opd');
        $query = $this->db->where('A.status_pengajuan', 'DITOLAK');
        $query  = $this->db->group_by('D.id_opd');
        $query = $this->db->where('month(A.tgl_pengajuan)', $bulan);
        $query = $this->db->where('year(A.tgl_pengajuan)', $tahun);
        $query = $this->db->get();
        return $query->result();
    }
}
