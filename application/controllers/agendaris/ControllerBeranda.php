<?php

defined('BASEPATH') or exit('No direct script access allowed');

class ControllerBeranda extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('agendaris/select_model');
        $this->load->model('agendaris/insert_model');
        $this->load->model('agendaris/update_model');
    }
    public function index()
    {
        $cek_email = $this->db->get_where('tbl_login', ['email' => $this->session->userdata('email')])->row_array();
        if ($cek_email['level'] == 'AGENDARIS') :
            $jml_pengjauan  = count($this->db->get_where('tbl_pengajuan', ['status_pengajuan' => 'PENGAJUAN'])->result());
            $jml_verifikasi = count($this->db->get_where('tbl_pengajuan', ['status_pengajuan' => 'VERIFIKASI'])->result());
            $jml_diterima   = count($this->db->get_where('tbl_pengajuan', ['status_pengajuan' => 'DITERIMA'])->result());
            $jml_ditolak    = count($this->db->get_where('tbl_pengajuan', ['status_pengajuan' => 'DITOLAK'])->result());
            $data_odp = $this->db->get_where('tbl_opd', ['status' => 'ADA'])->result();
            // $data_pengajuan = $this->db->getDataPengajuan();
            // $data_review    = $this->db->getDataReview();
            // $data_diterima  = $this->db->getDataPengajuanDiterima();
            // $data_ditolak   = $this->db->getDataPengajuanDitolak();
            $data = array(
                'judul'   => 'BERANDA',
                'folder'  => 'beranda',
                'halaman' => 'index',
                // PENJUMLAHAN
                'jml_pengjauan'    => $jml_pengjauan,
                'jml_verifikasi'   => $jml_verifikasi,
                'jml_diterima'     => $jml_diterima,
                'jml_ditolak'      => $jml_ditolak,
                'opd'              => $data_odp
            );
            $this->load->view('agendaris/include/index', $data);
        else :
            $this->load->view('login');
        endif;
    }
}
        
    /* End of file  ControllerBeranda.php */
