<!-- Notifikasi CRUD OPD -->
<?= $this->session->flashdata('berhasil_tambah_opd'); ?>
<?= $this->session->flashdata('berhasil_ubah_opd'); ?>
<?= $this->session->flashdata('berhasil_hapus_opd'); ?>
<!-- Notifikasi CRUD PPK -->
<!-- Notif Tambah PPK -->
<?= $this->session->flashdata('berhasil_tambah_ppk'); ?>
<?= $this->session->flashdata('gagal_tambah_email_ppk'); ?>
<?= $this->session->flashdata('gagal_tambah_nip_ppk'); ?>
<!-- Notif ubah, Hapus dan reset PPK -->
<?= $this->session->flashdata('berhasil_ubah_ppk'); ?>
<?= $this->session->flashdata('berhasil_hapus_ppk'); ?>
<?= $this->session->flashdata('berhasil_reset_ppk'); ?>
<!-- Notif CRUD POKJA -->
<?= $this->session->flashdata('berhasil_tambah_pokja'); ?>
<?= $this->session->flashdata('berhasil_reset_pokja'); ?>
<?= $this->session->flashdata('berhasil_ubah_pokja'); ?>
<?= $this->session->flashdata('berhasil_hapus_pokja'); ?>
<!-- Notif Profile -->
<?= $this->session->flashdata('berhasil_ubah_password'); ?>
<?= $this->session->flashdata('gagal_password_beda'); ?>
<?= $this->session->flashdata('gagal_password_lama'); ?>
<?= $this->session->flashdata('berhasil_ubah_identitas'); ?>
<!-- Notif Konfirmasi Dokumen -->
<?= $this->session->flashdata('berhasil_konfirmasi'); ?>