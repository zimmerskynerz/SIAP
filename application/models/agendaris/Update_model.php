<?php defined('BASEPATH') or exit('No direct script access allowed');

class Update_model extends CI_Model
{
    // Ubah dan Hapus Data OPD
    function ubah_opd()
    {
        $data = array(
            'nm_opd' => htmlentities($this->input->post('nm_opd')),
            'keterangan' => htmlentities($this->input->post('keterangan'))
        );
        $this->db->where('id_opd', htmlentities($this->input->post('id_opd')));
        $this->db->update('tbl_opd', $data);
    }
    function hapus_opd()
    {
        $data = array(
            'status' => 'HAPUS'
        );
        $this->db->where('id_opd', htmlentities($this->input->post('id_opd')));
        $this->db->update('tbl_opd', $data);
    }
    // Ubah dan Hapus data PPK
    function ubah_ppk()
    {
        $cek_login = $this->db->get_where('tbl_login', ['email' => $this->input->post('email')])->row_array();
        $id_login  = $cek_login['id_login'];
        $data_identitas = array(
            'nip'           => htmlentities($this->input->post('nip')),
            'nama'          => htmlentities($this->input->post('nama')),
            'pangkat_gol'   => htmlentities($this->input->post('pangkat_gol')),
            'id_opd'        => htmlentities($this->input->post('id_opd'))
        );
        $this->db->where('id_login', $id_login);
        $this->db->update('tbl_identitas', $data_identitas);
    }
    function ubah_ppknip()
    {
        $cek_login = $this->db->get_where('tbl_login', ['email' => $this->input->post('email')])->row_array();
        $id_login  = $cek_login['id_login'];
        $data_identitas = array(
            'nama'          => htmlentities($this->input->post('nama')),
            'pangkat_gol'   => htmlentities($this->input->post('pangkat_gol')),
            'id_opd'        => htmlentities($this->input->post('id_opd'))
        );
        $this->db->where('id_login', $id_login);
        $this->db->update('tbl_identitas', $data_identitas);
    }
    function hapus_PPK($id_login)
    {
        $data_login = array(
            'email'   => null,
            'status'  => 'HAPUS'
        );
        $this->db->where('id_login', $id_login);
        $this->db->update('tbl_login', $data_login);
        $data_identitas = array(
            'nip'     => null,
            'id_opd'  => null
        );
        $this->db->where('id_login', $id_login);
        $this->db->update('tbl_identitas', $data_identitas);
    }
    // Ubah dan Hapus data PPK
    function ubah_pokja()
    {
        $cek_login = $this->db->get_where('tbl_login', ['email' => $this->input->post('email')])->row_array();
        $id_login  = $cek_login['id_login'];
        $data_identitas = array(
            'nip'           => htmlentities($this->input->post('nip')),
            'nama'          => htmlentities($this->input->post('nama'))
        );
        $this->db->where('id_login', $id_login);
        $this->db->update('tbl_identitas', $data_identitas);
    }
    function ubah_pokjanip()
    {
        $cek_login = $this->db->get_where('tbl_login', ['email' => $this->input->post('email')])->row_array();
        $id_login  = $cek_login['id_login'];
        $data_identitas = array(
            'nama'          => htmlentities($this->input->post('nama'))
        );
        $this->db->where('id_login', $id_login);
        $this->db->update('tbl_identitas', $data_identitas);
    }
    function hapus_pokja($id_login)
    {
        $data_login = array(
            'email'   => null,
            'status'  => 'HAPUS'
        );
        $this->db->where('id_login', $id_login);
        $this->db->update('tbl_login', $data_login);
        $data_identitas = array(
            'nip'     => null,
            'id_opd'  => null
        );
        $this->db->where('id_login', $id_login);
        $this->db->update('tbl_identitas', $data_identitas);
    }
    // Konfirmasi Pengajuan
    // Konfirmasi Terima
    function konfirmasiTerima()
    {
        $data_pengajuan = array(
            'status_pengajuan'      => 'VERIFIKASI'
        );
        $this->db->where('id_pengajuan', $this->input->post('id_pengajuan'));
        $this->db->update('tbl_pengajuan', $data_pengajuan);
    }
    function konfirmasiRevisi()
    {
        $data_pengajuan = array(
            'status_pengajuan'      => 'REVISI_PENGAJUAN'
        );
        $this->db->where('id_pengajuan', $this->input->post('id_pengajuan'));
        $this->db->update('tbl_pengajuan', $data_pengajuan);
        $data_konfirmasi = array(
            'id_konfirmasi'         => '',
            'id_pengajuan'          => $this->input->post('id_pengajuan'),
            'tgl_konfirmasi'        => date('Y-m-d'),
            'alasan'                => htmlentities($this->input->post('revisi'))
        );
        $this->db->insert('tbl_konfirmasi', $data_konfirmasi);
    }
}
