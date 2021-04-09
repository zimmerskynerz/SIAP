<?php

defined('BASEPATH') or exit('No direct script access allowed');

class ControllerLogin extends CI_Controller
{

    // Tampilan Login
    public function index()
    {
        $cek_email = $this->db->get_where('tbl_login', ['email' => $this->session->userdata('email'), 'status' => 'ADA'])->row_array();
        if ($cek_email['level'] == 'KEPALA') :
            redirect('kepala/');
        elseif ($cek_email['level'] == 'AGENDARIS') :
            redirect('agendaris/');
        elseif ($cek_email['level'] == 'PPK') :
            redirect('ppk/');
        elseif ($cek_email['level'] == 'POKJA') :
            redirect('pokja');
        else :
            $this->load->view('login');
        endif;
    }
    // Cek Apakah User itu benar terdaftar atau tidak
    public function cek_login()
    {
        $email = htmlentities($this->input->post('email'));
        $pass  = htmlentities($this->input->post('password'));
        // Cek Email
        $cek_email = $this->db->get_where('tbl_login', ['email' => $email])->row_array();
        if ($cek_email > 0) :
            if (password_verify($pass, $cek_email['pass'])) :
                // Berhasil Login Password
                $data_login = array(
                    'id_login' => $cek_email['id_login'],
                    'email'    => $cek_email['email'],
                    'level'    => $cek_email['level']
                );
                $this->session->set_userdata($data_login);
                if ($cek_email['level'] == 'KEPALA') :
                    # code...
                    redirect('kepala/');
                elseif ($cek_email['level'] == 'AGENDARIS') :
                    redirect('agendaris/');
                elseif ($cek_email['level'] == 'PPK') :
                    redirect('ppk/');
                elseif ($cek_email['level'] == 'POKJA') :
                    redirect('pokja');
                endif;
            else :
                // Gagal Login Password
                redirect('login');
            endif;
        else :
            // Email belum terdaftar
            redirect('login');
        endif;
    }
    public function logout()
    {
        $this->session->sess_destroy();
        redirect('login/');
    }
    public function tentang()
    {
        # code...
        $this->load->view('tentang');
    }
    public function alur()
    {
        # code...
        $this->load->view('alur');
    }
    public function opd()
    {
        # code...
        $data_odp = $this->db->get_where('tbl_opd', ['status' => 'ADA'])->result();
        $data = array(
            'opd'     => $data_odp
        );
        $this->load->view('opd', $data);
    }
    public function persyaratan()
    {
        # code...
        $this->load->view('persyaratan');
    }
}
        
    /* End of file  ControllerLogin.php */
