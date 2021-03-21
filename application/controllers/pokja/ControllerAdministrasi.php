<?php

defined('BASEPATH') or exit('No direct script access allowed');

class ControllerAdministrasi extends CI_Controller
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
        redirect('ppk/administrasi/pengajuan');
    }
    public function pengajuan()
    {
        $cek_email = $this->db->get_where('tbl_login', ['email' => $this->session->userdata('email')])->row_array();
        if ($cek_email['level'] == 'PPK') :
            $data_pengajuan = $this->select_model->getDataPengajuan();
            $data_pokja     = $this->db->get_where('tbl_pokja')->result();
            $data = array(
                'judul'          => 'ADMINISTRASI',
                'folder'         => 'administrasi/pengajuan',
                'halaman'        => 'index',
                // Data Pengajuan
                'data_pengajuan' => $data_pengajuan,
                'data_pokja'     => $data_pokja
            );
            $this->load->view('ppk/include/index', $data);
        else :
            $this->load->view('login');
        endif;
    }
    public function crudpengajuan()
    {
        if (isset($_POST['tambah_pengajuan'])) :
            $cek_nota = $this->select_model->getKodeNota();
            $max_nota = $cek_nota['max_kode'];
            $max_fix = substr($max_nota, -3);
            $no_nota = $max_fix + 1;
            $tahun = date('Y');
            $bulan = date('m');
            $no_pengajuan = $tahun . $bulan . sprintf("%03s", $no_nota);
            $cek_email = $this->db->get_where('tbl_login', ['email' => $this->session->userdata('email')])->row_array();
            $id_login = $cek_email['id_login'];
            $this->insert_model->tambah_pengajuan($no_pengajuan, $id_login);
            redirect('ppk/administrasi/detailpengajuan/' . $no_pengajuan . '');
        endif;
        if (isset($_POST['upload_berkas'])) :
            $id_pengajuan = htmlentities($this->input->post('id_pengajuan'));
            $this->insert_model->upload_berkas();
            $this->session->set_flashdata('berhasil_upload_berkas', '<div class="berhasil_upload_berkas"></div>');
            redirect('ppk/administrasi/detailpengajuan/' . $id_pengajuan . '');
        endif;
        if (isset($_POST['ubah_berkas'])) :
            $id_pengajuan = htmlentities($this->input->post('id_pengajuan'));
            $this->update_model->ubah_berkas();
            redirect('ppk/administrasi/detailpengajuan/' . $id_pengajuan . '');
        endif;
        if (isset($_POST['kirim_pengajuan'])) :
            $this->update_model->kirim_pengajuan();
            $this->session->set_flashdata('berhasil_kirim_berkas', '<div class="berhasil_kirim_berkas"></div>');
            redirect('ppk/administrasi/pengajuan');
        endif;
    }
    public function detailpengajuan($id)
    {
        $id_pengajuan = $id;
        $cek_email = $this->db->get_where('tbl_login', ['email' => $this->session->userdata('email')])->row_array();
        if ($cek_email['level'] == 'PPK') :
            $data_pengajuan = $this->select_model->getDataPengajuanDetail($id_pengajuan);
            $data_berkas    = $this->db->get_where('tbl_berkas', ['id_pengajuan' => $id_pengajuan])->result();
            $data_konfirmasi = $this->select_model->getDataKonfirmasi($id_pengajuan);
            $jml_berkas     = count($data_berkas);
            $data = array(
                'judul'          => 'ADMINISTRASI',
                'folder'         => 'administrasi/pengajuan',
                'halaman'        => 'detail_pengajuan',
                // Data Pengajuan
                'data_pengajuan' => $data_pengajuan,
                'data_berkas'    => $data_berkas,
                'jml_berkas'     => $jml_berkas,
                'data_konfirmasi' => $data_konfirmasi
            );
            $this->load->view('ppk/include/index', $data);
        else :
            $this->load->view('login');
        endif;
    }
}
        
    /* End of file  ControllerAdministrasi.php */
