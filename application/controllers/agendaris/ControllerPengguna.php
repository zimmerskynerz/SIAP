<?php

defined('BASEPATH') or exit('No direct script access allowed');

class ControllerPengguna extends CI_Controller
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
        redirect('agendaris');
    }
    public function ppk()
    {
        $cek_email = $this->db->get_where('tbl_login', ['email' => $this->session->userdata('email')])->row_array();
        if ($cek_email['level'] == 'AGENDARIS') :
            $data_odp = $this->db->get_where('tbl_opd', ['status' => 'ADA'])->result();
            $data_ppk = $this->select_model->getDataPPK();
            $data = array(
                'judul'    => 'PENGGUNA',
                'folder'   => 'users',
                'halaman'  => 'ppk',
                // Data PPK
                'opd'      => $data_odp,
                'data_ppk' => $data_ppk
            );
            $this->load->view('agendaris/include/index', $data);
        else :
            $this->load->view('login');
        endif;
    }
    public function crudppk()
    {
        if (isset($_POST['simpan_ppk'])) :
            // Cek email
            $cek_email = $this->db->get_where('tbl_login', ['email' => $this->input->post('email')])->row_array();
            if ($cek_email > 0) :
                $this->session->set_flashdata('gagal_tambah_email_ppk', '<div class="gagal_tambah_email_ppk"></div>');
            else :
                // Cek NIP
                $cek_nip = $this->db->get_where('tbl_identitas', ['nip' => $this->input->post('nip')])->row_array();
                if ($cek_nip > 0) :
                    $this->session->set_flashdata('gagal_tambah_nip_ppk', '<div class="gagal_tambah_nip_ppk"></div>');
                else :
                    $this->insert_model->tambah_ppk();
                    $this->session->set_flashdata('berhasil_tambah_ppk', '<div class="berhasil_tambah_ppk"></div>');
                endif;
            endif;
            redirect('agendaris/pengguna/ppk');
        endif;
        if (isset($_POST['ubah_ppk'])) :
            if ($this->input->post('nip') == $this->input->post('nip_lama')) :
                $this->update_model->ubah_ppknip();
                $this->session->set_flashdata('berhasil_ubah_ppk', '<div class="berhasil_ubah_ppk"></div>');
            else :
                $cek_nip = $this->db->get_where('tbl_identitas', ['nip' => $this->input->post('nip')])->row_array();
                if ($cek_nip > 0) :
                    $this->session->set_flashdata('gagal_tambah_nip_ppk', '<div class="gagal_tambah_nip_ppk"></div>');
                else :
                    $this->update_model->ubah_ppk();
                    $this->session->set_flashdata('berhasil_ubah_ppk', '<div class="berhasil_ubah_ppk"></div>');
                endif;
            endif;
            redirect('agendaris/pengguna/ppk');
        endif;
        if (isset($_POST['hapus_ppk'])) :
            $cek_login = $this->db->get_where('tbl_login', ['email' => $this->input->post('email')])->row_array();
            $id_login  = $cek_login['id_login'];
            $this->update_model->hapus_PPK($id_login);
            $this->session->set_flashdata('berhasil_hapus_ppk', '<div class="berhasil_hapus_ppk"></div>');
            redirect('agendaris/pengguna/ppk');
        endif;
        if (isset($_POST['reset_ppk'])) :
            $data_login = array(
                'pass'    => password_hash('PPK123abc', PASSWORD_DEFAULT)
            );
            $this->db->where('email', $this->input->post('email'));
            $this->db->update('tbl_login', $data_login);
            $this->session->set_flashdata('berhasil_reset_ppk', '<div class="berhasil_reset_ppk"></div>');
            redirect('agendaris/pengguna/ppk');
        endif;
    }
    public function pokja()
    {
        $cek_email = $this->db->get_where('tbl_login', ['email' => $this->session->userdata('email')])->row_array();
        if ($cek_email['level'] == 'AGENDARIS') :
            $data_pokja = $this->select_model->getDataPOKJA();
            $data = array(
                'judul'    => 'PENGGUNA',
                'folder'   => 'users',
                'halaman'  => 'pokja',
                // Data POKJA
                'data_pokja' => $data_pokja
            );
            $this->load->view('agendaris/include/index', $data);
        else :
            $this->load->view('login');
        endif;
    }
    public function crudpokja()
    {
        if (isset($_POST['simpan_pokja'])) :
            // Cek email
            $cek_email = $this->db->get_where('tbl_login', ['email' => $this->input->post('email')])->row_array();
            if ($cek_email > 0) :
                $this->session->set_flashdata('gagal_tambah_email_ppk', '<div class="gagal_tambah_email_ppk"></div>');
            else :
                // Cek NIP
                $cek_nip = $this->db->get_where('tbl_identitas', ['nip' => $this->input->post('nip')])->row_array();
                if ($cek_nip > 0) :
                    $this->session->set_flashdata('gagal_tambah_nip_ppk', '<div class="gagal_tambah_nip_ppk"></div>');
                else :
                    $this->insert_model->tambah_pokja();
                    $this->session->set_flashdata('berhasil_tambah_pokja', '<div class="berhasil_tambah_pokja"></div>');
                endif;
            endif;
            redirect('agendaris/pengguna/pokja');
        endif;
        if (isset($_POST['reset_pokja'])) :
            $data_login = array(
                'pass'    => password_hash('POKJA123abc', PASSWORD_DEFAULT)
            );
            $this->db->where('email', $this->input->post('email'));
            $this->db->update('tbl_login', $data_login);
            $this->session->set_flashdata('berhasil_reset_pokja', '<div class="berhasil_reset_pokja"></div>');
            redirect('agendaris/pengguna/pokja');
        endif;
        if (isset($_POST['ubah_pokja'])) :
            if ($this->input->post('nip') == $this->input->post('nip_lama')) :
                $this->update_model->ubah_pokjanip();
                $this->session->set_flashdata('berhasil_ubah_pokja', '<div class="berhasil_ubah_pokja"></div>');
            else :
                $cek_nip = $this->db->get_where('tbl_identitas', ['nip' => $this->input->post('nip')])->row_array();
                if ($cek_nip > 0) :
                    $this->session->set_flashdata('gagal_tambah_nip_ppk', '<div class="gagal_tambah_nip_ppk"></div>');
                else :
                    $this->update_model->ubah_pokja();
                    $this->session->set_flashdata('berhasil_ubah_pokja', '<div class="berhasil_ubah_pokja"></div>');
                endif;
            endif;
            redirect('agendaris/pengguna/pokja');
        endif;
        if (isset($_POST['hapus_pokja'])) :
            $cek_login = $this->db->get_where('tbl_login', ['email' => $this->input->post('email')])->row_array();
            $id_login  = $cek_login['id_login'];
            $this->update_model->hapus_PPK($id_login);
            $this->session->set_flashdata('berhasil_hapus_pokja', '<div class="berhasil_hapus_pokja"></div>');
            redirect('agendaris/pengguna/pokja');
        endif;
    }
}
        
    /* End of file  ControllerPengguna.php */
