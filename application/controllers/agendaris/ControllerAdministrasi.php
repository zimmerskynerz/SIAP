<?php

defined('BASEPATH') or exit('No direct script access allowed');

class ControllerAdministrasi extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('agendaris/select_model');
        $this->load->model('agendaris/insert_model');
        $this->load->model('agendaris/update_model');
    }
    public function FunctionName()
    {
        redirect('agendaris/administrasi/pengajuan');
    }
    public function pengajuan()
    {
        $cek_email = $this->db->get_where('tbl_login', ['email' => $this->session->userdata('email')])->row_array();
        if ($cek_email['level'] == 'AGENDARIS') :
            $data_pengajuan   = $this->select_model->getDataPengajuan();
            $data = array(
                'judul'          => 'ADMINISTRASI',
                'folder'         => 'administrasi/pengajuan',
                'halaman'        => 'index',
                // Data Database Pengajuan
                'data_pengajuan' => $data_pengajuan
            );
            $this->load->view('agendaris/include/index', $data);
        else :
            $this->load->view('login');
        endif;
    }
    public function detailpengajuan($id)
    {
        $id_pengajuan = $id;
        $cek_email = $this->db->get_where('tbl_login', ['email' => $this->session->userdata('email')])->row_array();
        if ($cek_email['level'] == 'AGENDARIS') :
            $data_pengajuan = $this->select_model->getDataPengajuanDetail($id_pengajuan);
            $data_berkas    = $this->db->get_where('tbl_berkas', ['id_pengajuan' => $id_pengajuan])->result();
            $jml_berkas     = count($data_berkas);
            $data = array(
                'judul'          => 'ADMINISTRASI',
                'folder'         => 'administrasi/pengajuan',
                'halaman'        => 'detail_pengajuan',
                // Data Pengajuan
                'data_pengajuan' => $data_pengajuan,
                'data_berkas'    => $data_berkas,
                'jml_berkas'     => $jml_berkas
            );
            $this->load->view('agendaris/include/index', $data);
        else :
            $this->load->view('login');
        endif;
    }
    public function crudpengajuan()
    {
        if (isset($_POST['simpan_konfirmasi'])) :
            if ($this->input->post('konfirmasi') == 1) :
                $ketua    = $this->select_model->getDataKetua();
                $id_ketua = $ketua['id_login'];
                $this->update_model->konfirmasiTerima();
                $this->insert_model->tambahKonfirmasiTerima();
                // KOde Pokja
                if ($this->input->post('kode_pokja') == 'PPJ') :
                    $this->insert_model->tambahTimPokjaPPJ($id_ketua);
                    $cek_pokja   = $this->db->get_where('tbl_pokja', ['id_login' => $id_ketua, 'id_pengajuan' => $this->input->post('id_pengajuan')])->row_array();
                    $id_pokja    = $cek_pokja['id_pokja'];
                    $cek_anggota = $this->select_model->getDataPokjaAnggota($id_ketua);
                    foreach ($cek_anggota as $Anggota) :
                        $data_anggota = array(
                            'id_pokja' => $id_pokja,
                            'id_login' => $Anggota->id_login
                        );
                        $this->db->insert('anggota_pokja', $data_anggota);
                    endforeach;
                else :
                    $this->insert_model->tambahTimPokjaPPB($id_ketua);
                    $cek_pokja = $this->db->get_where('tbl_pokja', ['id_login' => $id_ketua, 'id_pengajuan' => $this->input->post('id_pengajuan')])->row_array();
                    $id_pokja  = $cek_pokja['id_pokja'];
                    $cek_anggota = $this->select_model->getDataPokjaAnggota($id_ketua);
                    foreach ($cek_anggota as $Anggota) :
                        $data_anggota = array(
                            'id_pokja' => $id_pokja,
                            'id_login' => $Anggota->id_login
                        );
                        $this->db->insert('anggota_pokja', $data_anggota);
                    endforeach;
                endif;
            elseif ($this->input->post('konfirmasi') == 2) :
                $this->update_model->konfirmasiRevisi();
            endif;
            $this->session->set_flashdata('berhasil_konfirmasi', '<div class="berhasil_konfirmasi"></div>');
            redirect('agendaris/administrasi/pengajuan');
        endif;
    }
    public function review()
    {
        $cek_email = $this->db->get_where('tbl_login', ['email' => $this->session->userdata('email')])->row_array();
        if ($cek_email['level'] == 'AGENDARIS') :
            $data_pengajuan   = $this->select_model->getDataReview();
            $data = array(
                'judul'          => 'ADMINISTRASI',
                'folder'         => 'administrasi/review',
                'halaman'        => 'index',
                // Data Database Pengajuan
                'data_pengajuan' => $data_pengajuan
            );
            $this->load->view('agendaris/include/index', $data);
        else :
            $this->load->view('login');
        endif;
    }
    public function detailreview($id)
    {
        $id_pengajuan = $id;
        $cek_email = $this->db->get_where('tbl_login', ['email' => $this->session->userdata('email')])->row_array();
        if ($cek_email['level'] == 'AGENDARIS') :
            $data_pengajuan = $this->select_model->getDataPengajuanDetail($id_pengajuan);
            $data_berkas    = $this->db->get_where('tbl_berkas', ['id_pengajuan' => $id_pengajuan])->result();
            $jml_berkas     = count($data_berkas);
            $data = array(
                'judul'          => 'ADMINISTRASI',
                'folder'         => 'administrasi/review',
                'halaman'        => 'detailreview',
                // Data Pengajuan
                'data_pengajuan' => $data_pengajuan,
                'data_berkas'    => $data_berkas,
                'jml_berkas'     => $jml_berkas
            );
            $this->load->view('agendaris/include/index', $data);
        else :
            $this->load->view('login');
        endif;
    }
}
        
    /* End of file  ControllerAdministrasi.php */
