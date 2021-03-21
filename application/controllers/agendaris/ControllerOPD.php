<?php

defined('BASEPATH') or exit('No direct script access allowed');

class ControllerOPD extends CI_Controller
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
            $data_odp = $this->db->get_where('tbl_opd', ['status' => 'ADA'])->result();
            $data = array(
                'judul'   => 'ORGANISASI PERANGKAT DAERAH',
                'folder'  => 'opd',
                'halaman' => 'index',
                // Data Database ODP
                'opd'     => $data_odp
            );
            $this->load->view('agendaris/include/index', $data);
        else :
            $this->load->view('login');
        endif;
    }
    public function crudopd()
    {
        if (isset($_POST['simpan_opd'])) :
            $this->insert_model->tambah_opd();
            $this->session->set_flashdata('berhasil_tambah_opd', '<div class="berhasil_tambah_opd"></div>');
            redirect('agendaris/opd');
        endif;
        if (isset($_POST['ubah_opd'])) :
            $this->update_model->ubah_opd();
            $this->session->set_flashdata('berhasil_ubah_opd', '<div class="berhasil_ubah_opd"></div>');
            redirect('agendaris/opd');
        endif;
        if (isset($_POST['hapus_opd'])) :
            $this->update_model->hapus_opd();
            $this->session->set_flashdata('berhasil_hapus_opd', '<div class="berhasil_hapus_opd"></div>');
            redirect('agendaris/opd');
        endif;
    }
}
        
    /* End of file  ControllerOPD.php */
