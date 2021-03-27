<?php

defined('BASEPATH') or exit('No direct script access allowed');

class ControllerProfile extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('ppk/select_model');
        $this->load->model('ppk/insert_model');
        $this->load->model('ppk/update_model');
        $this->load->helper('tgl_indo');
    }
    public function index()
    {
        $cek_email = $this->db->get_where('tbl_login', ['email' => $this->session->userdata('email')])->row_array();
        if ($cek_email['level'] == 'PPK') :
            $data_login = $this->db->get_where('tbl_login', ['id_login' => $this->session->userdata('id_login')])->row_array();
            $data_diri  = $this->db->get_where('tbl_identitas', ['id_login' => $this->session->userdata('id_login')])->row_array();
            $data = array(
                'judul'      => 'PROFILE',
                'folder'     => 'profile',
                'halaman'    => 'index',
                // Data PPK
                'data_login' => $data_login,
                'data_diri'  => $data_diri
            );
            $this->load->view('ppk/include/index', $data);
        else :
            $this->load->view('login');
        endif;
    }
    public function crudprofile()
    {
        if (isset($_POST['data_login'])) :
            $cek_password = $this->db->get_where('tbl_login', ['id_login' => $this->input->post('id_login')])->row_array();
            if (password_verify($this->input->post('password_lama'), $cek_password['pass'])) :
                if ($this->input->post('password_baru') == $this->input->post('password_konfirmasi')) :
                    $data = array(
                        'pass' => password_hash($this->input->post('password_baru'), PASSWORD_DEFAULT)
                    );
                    $this->db->where('id_login', $this->input->post('id_login'));
                    $this->db->update('tbl_login', $data);
                    $this->session->set_flashdata('berhasil_ubah_password', '<div class="berhasil_ubah_password"></div>');
                else :
                    $this->session->set_flashdata('gagal_password_beda', '<div class="gagal_password_beda"></div>');
                endif;
            else :
                $this->session->set_flashdata('gagal_password_lama', '<div class="gagal_password_lama"></div>');
            endif;
            redirect('ppk/profile');
        endif;
        if (isset($_POST['data_identitas'])) :
            if ($this->input->post('nip') == $this->input->post('nip_lama')) :
                $data = array(
                    'nama'            => htmlentities($this->input->post('nama')),
                    'pangkat_gol'     => htmlentities($this->input->post('pangkat_gol'))
                );
                $this->db->where('id_login', htmlentities($this->input->post('id_login')));
                $this->db->update('tbl_identitas', $data);
            else :
                $data = array(
                    'nip'             => htmlentities($this->input->post('nip')),
                    'nama'            => htmlentities($this->input->post('nama')),
                    'pangkat_gol'     => htmlentities($this->input->post('pangkat_gol'))
                );
                $this->db->where('id_login', htmlentities($this->input->post('id_login')));
                $this->db->update('tbl_identitas', $data);
            endif;
            $this->session->set_flashdata('berhasil_ubah_identitas', '<div class="berhasil_ubah_identitas"></div>');
            redirect('ppk/profile');
        endif;
    }
}
        
    /* End of file  ControllerProfile.php */
