<?php defined('BASEPATH') or exit('No direct script access allowed');

class Update_model extends CI_Model
{
    // Ubah dan Hapus Data OPD
    function ubah_berkas()
    {
        $id_pengajuan = htmlspecialchars($this->input->post('id_pengajuan'));
        $id_berkas = htmlspecialchars($this->input->post('id_berkas'));
        $link_berkas = htmlspecialchars($this->input->post('link_berkas'));
        $config['upload_path']   = './berkas';
        $config['allowed_types'] = 'jpg|png|gif|jpeg|pdf|doc|docx|xls|xlsx';
        $config['encrypt_name']  = true;
        $config['overwrite']     = true;
        $config['max_size']      = 10024; // 10MB
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('berkas')) {
            $this->session->set_flashdata('gagal_ubah_berkas', '<div class="gagal_ubah_berkas"></div>');
        } else {
            $_FILES['file']['name'] = $_FILES['berkas']['name'];
            $_FILES['file']['type'] = $_FILES['berkas']['type'];
            $_FILES['file']['tmp_name'] = $_FILES['berkas']['tmp_name'];
            $_FILES['file']['size'] = $_FILES['berkas']['size'];
            $uploadData = $this->upload->data();
            $data = array(
                'link_berkas' => $uploadData['file_name']
            );
            $this->db->where('id_pengajuan', $id_pengajuan);
            $this->db->where('id_berkas', $id_berkas);
            $this->db->update('tbl_berkas', $data);
            $berkas_lama = './berkas/' . $link_berkas . '';
            unlink($berkas_lama);
            $this->session->set_flashdata('berhasil_ubah_berkas', '<div class="berhasil_ubah_berkas"></div>');
        }
    }
    function kirim_pengajuan()
    {
        $id_pengajuan = htmlspecialchars($this->input->post('id_pengajuan'));
        $data = array(
            'status_pengajuan'    => 'PENGAJUAN'
        );
        $this->db->where('id_pengajuan', $id_pengajuan);
        $this->db->update('tbl_pengajuan', $data);
    }
}
