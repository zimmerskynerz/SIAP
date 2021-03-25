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
        $this->load->helper('tgl_indo');
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
            $this->load->view('agendaris/include/index', $data);
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
