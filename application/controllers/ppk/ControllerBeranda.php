<?php

defined('BASEPATH') or exit('No direct script access allowed');

class ControllerBeranda extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('ppk/select_model');
        $this->load->model('ppk/insert_model');
        $this->load->model('ppk/update_model');
    }
    public function index()
    {
        $cek_email = $this->db->get_where('tbl_login', ['email' => $this->session->userdata('email')])->row_array();
        if ($cek_email['level'] == 'PPK') :
            $id_login = $cek_email['id_login'];
            $jml_pengjauan  = count($this->db->get_where('tbl_pengajuan', ['status_pengajuan' => 'PENGAJUAN', 'id_login' => $id_login])->result());
            $jml_verifikasi = count($this->db->get_where('tbl_pengajuan', ['status_pengajuan' => 'VERIFIKASI', 'id_login' => $id_login])->result());
            $jml_diterima   = count($this->db->get_where('tbl_pengajuan', ['status_pengajuan' => 'DITERIMA', 'id_login' => $id_login])->result());
            $jml_ditolak    = count($this->db->get_where('tbl_pengajuan', ['status_pengajuan' => 'DITOLAK', 'id_login' => $id_login])->result());
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
            $this->load->view('ppk/include/index', $data);
        else :
            $this->load->view('login');
        endif;
    }
}
        
    /* End of file  ControllerBeranda.php */
