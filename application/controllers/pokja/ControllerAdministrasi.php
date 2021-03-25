<?php

defined('BASEPATH') or exit('No direct script access allowed');

class ControllerAdministrasi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('pokja/select_model');
        $this->load->model('pokja/insert_model');
        $this->load->model('pokja/update_model');
        $this->load->helper('tgl_indo');
    }
    public function index()
    {
        redirect('ppk/administrasi/pengajuan');
    }
    public function review()
    {
        $cek_email = $this->db->get_where('tbl_login', ['email' => $this->session->userdata('email')])->row_array();
        if ($cek_email['level'] == 'POKJA') :
            $id_login = $cek_email['id_login'];
            $data_pengajuan = $this->select_model->getDataReview($id_login);
            $data = array(
                'judul'          => 'ADMINISTRASI',
                'folder'         => 'administrasi/review',
                'halaman'        => 'index',
                // Data Pengajuan
                'data_pengajuan' => $data_pengajuan
            );
            $this->load->view('pokja/include/index', $data);
        else :
            $this->load->view('login');
        endif;
    }
    public function crudreview()
    {
        if (isset($_POST['tambah_komentar'])) :
            $id_pengajuan = htmlentities($this->input->post('id_pengajuan'));
            $this->update_model->ubah_komentar();
            $this->session->set_flashdata('berhasil_tambah_komentar', '<div class="berhasil_tambah_komentar"></div>');
            redirect('pokja/administrasi/detail_review/' . $id_pengajuan . '');
        endif;
        if (isset($_POST['simpan_konfirmasi'])) :
            $this->update_model->simpan_konfirmasi();
            $this->session->set_flashdata('berhasil_simpan_konfirmasi', '<div class="berhasil_simpan_konfirmasi"></div>');
            redirect('pokja/administrasi/review');
        endif;
    }
    public function detail_review($id)
    {
        $id_pengajuan = $id;
        $cek_email = $this->db->get_where('tbl_login', ['email' => $this->session->userdata('email')])->row_array();
        if ($cek_email['level'] == 'POKJA') :
            $data_pengajuan = $this->select_model->getDataPengajuanDetail($id_pengajuan);
            $data_berkas    = $this->db->get_where('tbl_berkas', ['id_pengajuan' => $id_pengajuan])->result();
            $jml_berkas     = count($data_berkas);
            $data_ketua     = $this->select_model->getDataKetuaPokja($id_pengajuan);
            $id_pokja       = $data_ketua['id_pokja'];
            $data_anggota   = $this->select_model->getDataAnggotaPokja($id_pokja);
            $data = array(
                'judul'          => 'ADMINISTRASI',
                'folder'         => 'administrasi/review',
                'halaman'        => 'detail_review',
                // Data Pengajuan
                'data_pengajuan' => $data_pengajuan,
                'data_berkas'    => $data_berkas,
                'jml_berkas'     => $jml_berkas,
                'data_ketua'     => $data_ketua,
                'data_anggota'   => $data_anggota
            );
            $this->load->view('pokja/include/index', $data);
        else :
            $this->load->view('login');
        endif;
    }
    public function berita_acara($id)
    {
        $id_pengajuan = $id;
        $data_pengajuan = $this->select_model->getDataPengajuanDetailNew($id_pengajuan);
        $data_berkas    = $this->db->get_where('tbl_berkas', ['id_pengajuan' => $id_pengajuan])->result();
        $data_ketua     = $this->select_model->getDataKetuaPokja($id_pengajuan);
        $id_pokja       = $data_ketua['id_pokja'];
        $data_anggota   = $this->select_model->getDataAnggotaPokja($id_pokja);
        // Nomor Berita Acara
        $no_urut        = substr($id_pengajuan, -3);
        $bulan          = substr($id_pengajuan, 4, 2);
        $tahun          = substr($id_pengajuan, 0, 4);
        $kode_jenis     = $data_ketua['kode_pokja'] . '.' . $data_ketua['id_pokja'];
        $nomor          = $no_urut . '/' . $bulan . '/' . $kode_jenis . '/PBJ' . '/' . $tahun;
        // Hari
        $tanggal             = $data_ketua['tgl_review'];
        $tgl_indo            = date_indo($tanggal);
        $hari                = hari_indo($tanggal);
        $tanggal_baru        = substr($tanggal, -2);
        $bulan_baru          = bulan($bulan);
        $tahun_baru          = tahun_baru($tanggal);
        // Data Pokja
        if ($data_ketua['kode_pokja'] == 'PPB') :
            # code...
            $singkatan = 'Pokja Pengadaan Barang ' . $data_ketua['id_pokja'];
        else :
            $singkatan = 'Pokja Pengadaan Jasa ' . $data_ketua['id_pokja'];
        endif;
        // NIP
        $depan        = substr($data_pengajuan['nip'], 0, 8);
        $tengah       = substr($data_pengajuan['nip'], 8, 6);
        $kelamin      = substr($data_pengajuan['nip'], 14, 1);
        $belakang     = substr($data_pengajuan['nip'], -3);
        $nip          = $depan . ' ' . $tengah . ' ' . $kelamin . ' ' . $belakang;
        $data = array(
            'judul'          => 'ADMINISTRASI',
            'folder'         => 'administrasi',
            'halaman'        => 'berita_acara',
            // Data Pengajuan
            'nomor'          => $nomor,
            'hari'           => $hari,
            'bulan_baru'     => $bulan_baru,
            'tahun_baru'     => $tahun_baru,
            'tanggal_baru'   => $tanggal_baru,
            // Singkatan
            'singkatan'      => $singkatan,
            'data_pengajuan' => $data_pengajuan,
            'nip'            => $nip,
            'tgl_indo'       => $tgl_indo,
            'data_ketua'     => $data_ketua,
            'data_berkas'    => $data_berkas,
            'data_anggota'   => $data_anggota
        );
        $this->load->view('berita_acara', $data);
    }
}
        
    /* End of file  ControllerAdministrasi.php */
