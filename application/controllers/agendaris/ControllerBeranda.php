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
            $data = array(
                'judul'   => 'BERANDA',
                'folder'  => 'beranda',
                'halaman' => 'index'
            );
            $this->load->view('agendaris/include/index', $data);
        else :
            $this->load->view('login');
        endif;
    }
}
        
    /* End of file  ControllerBeranda.php */
