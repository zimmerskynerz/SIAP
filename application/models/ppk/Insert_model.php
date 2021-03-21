<?php defined('BASEPATH') or exit('No direct script access allowed');

class Insert_model extends CI_Model
{
    // Tambah Pengajuan Kegiatan
    function tambah_pengajuan($no_pengajuan, $id_login)
    {
        $data = array(
            'id_pengajuan'      => $no_pengajuan,
            'nm_kegiatan'       => htmlentities($this->input->post('nm_kegiatan')),
            'nm_paket'          => htmlentities($this->input->post('nm_paket')),
            'smb_dana'          => htmlentities($this->input->post('smb_dana')),
            'tgl_pengajuan'     => date('Y-m-d'),
            'no_sk'             => htmlentities($this->input->post('no_sk')),
            'pagu'              => htmlentities($this->input->post('pagu')),
            'hps'               => htmlentities($this->input->post('hps')),
            'id_login'          => $id_login,
            'status_pengajuan'  => 'BELUM_KIRIM'
        );
        $this->db->insert('tbl_pengajuan', $data);
    }
    function upload_berkas()
    {
        $id_pengajuan = htmlspecialchars($this->input->post('id_pengajuan'));
        $config['upload_path'] = './berkas';
        $config['allowed_types'] = 'jpg|png|gif|jpeg|pdf|doc|docx|xls|xlsx';
        $config['encrypt_name'] = true;
        $config['overwrite']            = true;
        $config['max_size']             = 10024; // 10MB
        $this->load->library('upload', $config);
        $keterangan_berkas = $this->input->post('keterangan');
        $jumlah_berkas = count($_FILES['berkas']['name']);
        for ($i = 0; $i < $jumlah_berkas; $i++) {
            if (!empty($_FILES['berkas']['name'][$i])) {
                $_FILES['file']['name'] = $_FILES['berkas']['name'][$i];
                $_FILES['file']['type'] = $_FILES['berkas']['type'][$i];
                $_FILES['file']['tmp_name'] = $_FILES['berkas']['tmp_name'][$i];
                $_FILES['file']['size'] = $_FILES['berkas']['size'][$i];
                if ($this->upload->do_upload('file')) {
                    $uploadData = $this->upload->data();
                    $data['id_pengajuan'] = $id_pengajuan;
                    $data['id_berkas'] = '';
                    $data['nm_berkas'] = $keterangan_berkas[$i];
                    $data['link_berkas'] = $uploadData['file_name'];
                    $this->db->insert('tbl_berkas', $data);
                }
            }
        }
    }
}
