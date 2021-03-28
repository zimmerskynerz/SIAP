<?php

defined('BASEPATH') or exit('No direct script access allowed');

class ControllerBeranda extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('kepala/select_model');
        $this->load->model('kepala/insert_model');
        $this->load->model('kepala/update_model');
        $this->load->helper('tgl_indo');
    }
    public function index()
    {
        $cek_email = $this->db->get_where('tbl_login', ['email' => $this->session->userdata('email')])->row_array();
        if ($cek_email['level'] == 'KEPALA') :
            if (isset($_POST['tampilLaporan'])) :
                $bulan          = htmlentities($this->input->post('bulan'));
                $tahun          = htmlentities($this->input->post('tahun'));
            else :
                $bulan          = date('m');
                $tahun          = date('Y');
            endif;
            $jml_pengjauan  = count($this->db->get_where('tbl_pengajuan', ['status_pengajuan' => 'PENGAJUAN', 'month(tgl_pengajuan)' => $bulan, 'year(tgl_pengajuan)' => $tahun])->result());
            $jml_verifikasi = count($this->db->get_where('tbl_pengajuan', ['status_pengajuan' => 'VERIFIKASI', 'month(tgl_pengajuan)' => $bulan, 'year(tgl_pengajuan)' => $tahun])->result());
            $jml_diterima   = count($this->db->get_where('tbl_pengajuan', ['status_pengajuan' => 'DITERIMA', 'month(tgl_pengajuan)' => $bulan, 'year(tgl_pengajuan)' => $tahun])->result());
            $jml_ditolak    = count($this->db->get_where('tbl_pengajuan', ['status_pengajuan' => 'DITOLAK', 'month(tgl_pengajuan)' => $bulan, 'year(tgl_pengajuan)' => $tahun])->result());
            $data_pengajuan = $this->select_model->getDataPengajuanOPD($bulan, $tahun);
            $data_review    = $this->select_model->getDataReviewOPD($bulan, $tahun);
            $data_diterima  = $this->select_model->getDataPengajuanDiterimaOPD($bulan, $tahun);
            $data_ditolak   = $this->select_model->getDataPengajuanDitolakOPD($bulan, $tahun);
            $data_opd       = $this->db->get_where('tbl_opd', ['status' => 'ADA'])->result();
            $data = array(
                'judul'   => 'BERANDA',
                'folder'  => 'beranda',
                'halaman' => 'index',
                // PENJUMLAHAN
                'jml_pengjauan'    => $jml_pengjauan,
                'jml_verifikasi'   => $jml_verifikasi,
                'jml_diterima'     => $jml_diterima,
                'jml_ditolak'      => $jml_ditolak,
                'data_opd'         => $data_opd,
                'data_pengajuan'   => $data_pengajuan,
                'data_review'      => $data_review,
                'data_diterima'    => $data_diterima,
                'data_ditolak'     => $data_ditolak
            );
            $this->load->view('kepala/include/index', $data);
        else :
            $this->load->view('login');
        endif;
    }
    public function cetak_laporan()
    {
        if (isset($_POST['cetak_laporan'])) :
            $cek_email = $this->db->get_where('tbl_login', ['email' => $this->session->userdata('email')])->row_array();
            $identitas = $this->db->get_where('tbl_identitas', ['id_login' => $cek_email['id_login']])->row_array();
            $bulan          = htmlentities($this->input->post('bulan'));
            $tahun          = htmlentities($this->input->post('tahun'));
            $jml_pengjauan  = count($this->db->get_where('tbl_pengajuan', ['status_pengajuan' => 'PENGAJUAN', 'month(tgl_pengajuan)' => $bulan, 'year(tgl_pengajuan)' => $tahun])->result());
            $jml_verifikasi = count($this->db->get_where('tbl_pengajuan', ['status_pengajuan' => 'VERIFIKASI', 'month(tgl_pengajuan)' => $bulan, 'year(tgl_pengajuan)' => $tahun])->result());
            $jml_diterima   = count($this->db->get_where('tbl_pengajuan', ['status_pengajuan' => 'DITERIMA', 'month(tgl_pengajuan)' => $bulan, 'year(tgl_pengajuan)' => $tahun])->result());
            $jml_ditolak    = count($this->db->get_where('tbl_pengajuan', ['status_pengajuan' => 'DITOLAK', 'month(tgl_pengajuan)' => $bulan, 'year(tgl_pengajuan)' => $tahun])->result());
            $jml_pengajuan_total = $jml_diterima + $jml_ditolak + $jml_verifikasi + $jml_pengjauan;
            // Jumlah OPD
            $data_pengajuan = $this->select_model->getDataPengajuanOPD($bulan, $tahun);
            $data_review    = $this->select_model->getDataReviewOPD($bulan, $tahun);
            $data_diterima  = $this->select_model->getDataPengajuanDiterimaOPD($bulan, $tahun);
            $data_ditolak   = $this->select_model->getDataPengajuanDitolakOPD($bulan, $tahun);
            $data_opd       = $this->db->get_where('tbl_opd', ['status' => 'ADA'])->result();
            $bulan_baru     = bulan($bulan);
            $tanggal        = date('Y-m-d');
            $tgl_indo       = date_indo($tanggal);
            // NIP
            $depan        = substr($identitas['nip'], 0, 8);
            $tengah       = substr($identitas['nip'], 8, 6);
            $kelamin      = substr($identitas['nip'], 14, 1);
            $belakang     = substr($identitas['nip'], -3);
            $nip          = $depan . ' ' . $tengah . ' ' . $kelamin . ' ' . $belakang;
            $data = array(
                // PENJUMLAHAN
                'identitas'        => $identitas,
                'nip'        => $nip,
                'jml_pengjauan'    => $jml_pengjauan,
                'jml_verifikasi'   => $jml_verifikasi,
                'jml_diterima'     => $jml_diterima,
                'jml_ditolak'      => $jml_ditolak,
                'jml_pengajuan_total' => $jml_pengajuan_total,
                'data_opd'         => $data_opd,
                'data_pengajuan'   => $data_pengajuan,
                'data_review'      => $data_review,
                'data_diterima'    => $data_diterima,
                'data_ditolak'     => $data_ditolak,
                'tahun'            => $tahun,
                'bulan'            => $bulan_baru,
                'tgl_indo'         => $tgl_indo
            );
            $this->load->view('cetak_laporan', $data);
        endif;
    }
}
        
    /* End of file  ControllerBeranda.php */
