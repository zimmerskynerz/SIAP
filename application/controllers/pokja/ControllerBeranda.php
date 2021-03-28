<?php

defined('BASEPATH') or exit('No direct script access allowed');

class ControllerBeranda extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('pokja/select_model');
        $this->load->model('pokja/insert_model');
        $this->load->model('pokja/update_model');
    }
    public function index()
    {
        $cek_email = $this->db->get_where('tbl_login', ['email' => $this->session->userdata('email')])->row_array();
        if ($cek_email['level'] == 'POKJA') :
            $jml_pengjauan  = count($this->db->get_where('tbl_pengajuan', ['status_pengajuan' => 'PENGAJUAN'])->result());
            $jml_verifikasi = count($this->db->get_where('tbl_pengajuan', ['status_pengajuan' => 'VERIFIKASI'])->result());
            $jml_diterima   = count($this->db->get_where('tbl_pengajuan', ['status_pengajuan' => 'DITERIMA'])->result());
            $jml_ditolak    = count($this->db->get_where('tbl_pengajuan', ['status_pengajuan' => 'DITOLAK'])->result());
            $data = array(
                'judul'   => 'BERANDA',
                'folder'  => 'beranda',
                'jml_pengjauan'    => $jml_pengjauan,
                'jml_verifikasi'   => $jml_verifikasi,
                'jml_diterima'     => $jml_diterima,
                'jml_ditolak'      => $jml_ditolak,
                'halaman' => 'index'
            );
            $this->load->view('pokja/include/index', $data);
        else :
            $this->load->view('login');
        endif;
    }
}
        
    /* End of file  ControllerBeranda.php */
