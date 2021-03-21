<?php defined('BASEPATH') or exit('No direct script access allowed');

class Insert_model extends CI_Model
{
    // Tambah Data OPD
    function tambah_opd()
    {
        $data = array(
            'id_opd' => '',
            'nm_opd' => htmlentities($this->input->post('nm_opd')),
            'keterangan' => htmlentities($this->input->post('keterangan')),
            'status' => 'ADA'
        );
        $this->db->insert('tbl_opd', $data);
    }
    // Tambah Data PPK
    function tambah_ppk()
    {
        $data_login = array(
            'id_login'    => '',
            'email'       => htmlentities($this->input->post('email')),
            'pass'        => password_hash('PPK123abc', PASSWORD_DEFAULT),
            'level'       => 'PPK',
            'status'      => 'ADA',
            'tgl_daftar'  => date('Y-m-d')
        );
        $this->db->insert('tbl_login', $data_login);
        $cek_login = $this->db->get_where('tbl_login', ['email' => $this->input->post('email')])->row_array();
        $id_login  = $cek_login['id_login'];
        $data_identitas = array(
            'id_login'        => $id_login,
            'nip'             => htmlentities($this->input->post('nip')),
            'nama'            => htmlentities($this->input->post('nama')),
            'pangkat_gol'     => htmlentities($this->input->post('pangkat_gol')),
            'id_opd'          => htmlentities($this->input->post('id_opd'))
        );
        $this->db->insert('tbl_identitas', $data_identitas);
    }
    // Tambah Data POKJA
    function tambah_pokja()
    {
        $data_login = array(
            'id_login'    => '',
            'email'       => htmlentities($this->input->post('email')),
            'pass'        => password_hash('POKJA123abc', PASSWORD_DEFAULT),
            'level'       => 'POKJA',
            'status'      => 'ADA',
            'tgl_daftar'  => date('Y-m-d')
        );
        $this->db->insert('tbl_login', $data_login);
        $cek_login = $this->db->get_where('tbl_login', ['email' => $this->input->post('email')])->row_array();
        $id_login  = $cek_login['id_login'];
        $data_identitas = array(
            'id_login'        => $id_login,
            'nip'             => htmlentities($this->input->post('nip')),
            'nama'            => htmlentities($this->input->post('nama')),
            'pangkat_gol'     => null,
            'id_opd'          => null
        );
        $this->db->insert('tbl_identitas', $data_identitas);
    }
    // Tambah Konfirmasi Terima
    function tambahKonfirmasiTerima()
    {
        $data = array(
            'id_konfirmasi'   => '',
            'id_pengajuan'    => $this->input->post('id_pengajuan'),
            'tgl_konfirmasi'  => date('Y-m-d'),
            'alasan'          => 'Pengajuan Masuk Review'
        );
        $this->db->insert('tbl_konfirmasi', $data);
    }
    // Tambah Tim Pokja
    function tambahTimPokjaPPJ($id_ketua)
    {
        $data = array(
            'id_pokja'      => '',
            'id_pengajuan'  => $this->input->post('id_pengajuan'),
            'kode_pokja'    => 'PPJ',
            'id_login'      => $id_ketua,
            'tgl_review'    => $this->input->post('tgl_review'),
            'status_ba'     => 'KONFIRMASI',
            'alasan'        => null
        );
        $this->db->insert('tbl_pokja', $data);
    }
    function tambahTimPokjaPPB($id_ketua)
    {
        $data = array(
            'id_pokja'      => '',
            'id_pengajuan'  => $this->input->post('id_pengajuan'),
            'kode_pokja'    => 'PPB',
            'id_login'      => $id_ketua,
            'tgl_review'    => $this->input->post('tgl_review'),
            'status_ba'     => 'KONFIRMASI',
            'alasan'        => null
        );
        $this->db->insert('tbl_pokja', $data);
    }
}
