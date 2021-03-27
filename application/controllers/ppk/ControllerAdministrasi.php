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
        $this->load->helper('tgl_indo');
    }
    public function index()
    {
        redirect('ppk/administrasi/pengajuan');
    }
    public function pengajuan()
    {
        $cek_email = $this->db->get_where('tbl_login', ['email' => $this->session->userdata('email')])->row_array();
        if ($cek_email['level'] == 'PPK') :
            $id_login = $cek_email['id_login'];
            $data_pengajuan = $this->select_model->getDataPengajuan($id_login);
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
            $data_ketua     = $this->select_model->getDataKetuaPokja($id_pengajuan);
            $jml_berkas     = count($data_berkas);
            $data = array(
                'judul'          => 'ADMINISTRASI',
                'folder'         => 'administrasi/pengajuan',
                'halaman'        => 'detail_pengajuan',
                // Data Pengajuan
                'data_pengajuan' => $data_pengajuan,
                'data_berkas'    => $data_berkas,
                'jml_berkas'     => $jml_berkas,
                'data_konfirmasi' => $data_konfirmasi,
                'data_ketua'     => $data_ketua
            );
            $this->load->view('ppk/include/index', $data);
        else :
            $this->load->view('login');
        endif;
    }
    public function review()
    {
        $cek_email = $this->db->get_where('tbl_login', ['email' => $this->session->userdata('email')])->row_array();
        if ($cek_email['level'] == 'PPK') :
            $id_login = $cek_email['id_login'];
            $data_pengajuan = $this->select_model->getDataReview($id_login);
            $data = array(
                'judul'          => 'ADMINISTRASI',
                'folder'         => 'administrasi/review',
                'halaman'        => 'index',
                // Data Pengajuan
                'data_pengajuan' => $data_pengajuan
            );
            $this->load->view('ppk/include/index', $data);
        else :
            $this->load->view('login');
        endif;
    }
    public function detailreview($id)
    {
        $id_pengajuan = $id;
        $cek_email = $this->db->get_where('tbl_login', ['email' => $this->session->userdata('email')])->row_array();
        if ($cek_email['level'] == 'PPK') :
            $data_pengajuan = $this->select_model->getDataPengajuanDetail($id_pengajuan);
            $data_berkas    = $this->db->get_where('tbl_berkas', ['id_pengajuan' => $id_pengajuan])->result();
            $jml_berkas     = count($data_berkas);
            $data_ketua     = $this->select_model->getDataKetuaPokja($id_pengajuan);
            $id_pokja       = $data_ketua['id_pokja'];
            $data_anggota   = $this->select_model->getDataAnggotaPokja($id_pokja);
            $data = array(
                'judul'          => 'ADMINISTRASI',
                'folder'         => 'administrasi/review',
                'halaman'        => 'detailreview',
                // Data Pengajuan
                'data_pengajuan' => $data_pengajuan,
                'data_berkas'    => $data_berkas,
                'jml_berkas'     => $jml_berkas,
                'data_ketua'     => $data_ketua,
                'data_anggota'   => $data_anggota
            );
            $this->load->view('ppk/include/index', $data);
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
