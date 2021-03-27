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
            // echo "<pre>";
            // var_dump($jml_pengjauan, $jml_verifikasi, $jml_diterima, $jml_ditolak);
            // die;
            $data = array(
                'judul'   => 'BERANDA',
                'folder'  => 'beranda',
                'halaman' => 'index',
                // PENJUMLAHAN
                'jml_pengjauan'    => $jml_pengjauan,
                'jml_verifikasi'   => $jml_verifikasi,
                'jml_diterima'     => $jml_diterima,
                'jml_ditolak'      => $jml_ditolak
            );
            $this->load->view('agendaris/include/index', $data);
        else :
            $this->load->view('login');
        endif;
    }
}
        
    /* End of file  ControllerBeranda.php */
