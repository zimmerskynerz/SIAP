<?php defined('BASEPATH') or exit('No direct script access allowed');

class Update_model extends CI_Model
{
    // Ubah dan Hapus Data OPD
    function ubah_komentar()
    {
        $data = array(
            'komentar'    => htmlentities($this->input->post('komentar'))
        );
        $this->db->where('id_berkas', $this->input->post('id_berkas'));
        $this->db->update('tbl_berkas', $data);
    }
    function simpan_konfirmasi()
    {
        $konfirmasi = htmlentities($this->input->post('konfirmasi'));
        if ($konfirmasi == 2) :
            $data = array(
                'status_ba'    => 'DITERIMA'
            );
            $this->db->where('id_pokja', $this->input->post('id_pokja'));
            $this->db->update('tbl_pokja', $data);
        else :
            $data = array(
                'status_ba'    => 'TOLAK',
                'alasan'       => htmlentities($this->input->post('alasan'))
            );
            $this->db->where('id_pokja', $this->input->post('id_pokja'));
            $this->db->update('tbl_pokja', $data);
        endif;
    }
}
