<!-- Tambah Pengajuan -->
<div class="modal fade" id="tambah_pengajuan" tabindex="-1" role="dialog" aria-labelledby="tambah_pengajuanLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambah_pengajuanLabel">Tambah Data Pengajuan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                </button>
            </div>
            <div class="modal-body">
                <?php echo form_open_multipart('ppk/administrasi/crudpengajuan'); ?>
                <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" style="display: none">
                <div class="form-group">
                    <input id="nm_kegiatan" name="nm_kegiatan" type="text" value="" class="form-control" placeholder="Masukkan Nama Kegiatan" required>
                </div>
                <div class="form-group">
                    <input id="nm_paket" name="nm_paket" type="text" value="" class="form-control" placeholder="Masukkan Nama Paket Kegiatan" required>
                </div>
                <div class="form-group">
                    <input id="smb_dana" name="smb_dana" type="text" value="" class="form-control" placeholder="Masukkan Sumber Dana Kegiatan" required>
                </div>
                <div class="form-group">
                    <input id="no_sk" name="no_sk" type="text" value="" class="form-control" placeholder="Masukkan Nomer Surat Tugas" required>
                </div>
                <div class="form-group">
                    <input id="pagu" name="pagu" type="number" value="" class="form-control" placeholder="Masukkan Anggaran Sesuai di Dokumen Anggaran" required>
                </div>
                <div class="form-group">
                    <input id="hps" name="hps" type="number" value="" class="form-control" placeholder="Masukkan Harga Perkiraan Setelah Survey Pasar" required>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Keluar</button>
                <button type="submit" id="tambah_pengajuan" name="tambah_pengajuan" class="btn btn-primary">Simpan</button>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>
<!-- Konfirmasi Pengiriman Pengajuan -->
<div class="modal fade" id="kirim_pengajuan" tabindex="-1" role="dialog" aria-labelledby="kirim_pengajuanLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="kirim_pengajuanLabel">Konfirmasi Kirim Pengajuan!</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                </button>
            </div>
            <div class="modal-body">
                <?php echo form_open_multipart('ppk/administrasi/crudpengajuan'); ?>
                <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" style="display: none">
                <div class="form-group">
                    <label for="">Nama Kegiatan</label>
                    <input id="nm_kegiatan" name="nm_kegiatan" readonly value="<?= $data_pengajuan['nm_kegiatan'] ?>" type=" text" value="" class="form-control" placeholder="Masukkan Nama Kegiatan" required>
                    <input id="id_pengajuan" name="id_pengajuan" hidden value="<?= $data_pengajuan['id_pengajuan'] ?>" type=" text" value="" class="form-control" placeholder="Masukkan Nama Kegiatan" required>
                </div>
                <div class="form-group">
                    <label for="">Nama Paket Kegiatan</label>
                    <input id="nm_paket" name="nm_paket" readonly value="<?= $data_pengajuan['nm_paket'] ?>" type=" text" value="" class="form-control" placeholder="Masukkan Nama Paket Kegiatan" required>
                </div>
                <div class="form-group">
                    <label for="">Sumber Dana Kegiatan</label>
                    <input id="smb_dana" name="smb_dana" readonly value="<?= $data_pengajuan['smb_dana'] ?>" type=" text" value="" class="form-control" placeholder="Masukkan Sumber Dana Kegiatan" required>
                </div>
                <div class="form-group">
                    <label for="">Nomor SK</label>
                    <input id="no_sk" name="no_sk" readonly value="<?= $data_pengajuan['no_sk'] ?>" type=" text" value="" class="form-control" placeholder="Masukkan Nomer Surat Tugas" required>
                </div>
                <div class="form-group">
                    <label for="">Jumlah Anggaran</label>
                    <input id="pagu" name="pagu" readonly value="<?= $data_pengajuan['pagu'] ?>" type=" number" value="" class="form-control" placeholder="Masukkan Anggaran Sesuai di Dokumen Anggaran" required>
                </div>
                <div class="form-group">
                    <label for="">Jumlah Anggaran Pasar</label>
                    <input id="hps" name="hps" readonly value="<?= $data_pengajuan['hps'] ?>" type=" number" value="" class="form-control" placeholder="Masukkan Harga Perkiraan Setelah Survey Pasar" required>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Keluar</button>
                <button type="submit" id="kirim_pengajuan" name="kirim_pengajuan" class="btn btn-primary">Kirim</button>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>
<!-- Konfirmasi Pengiriman Pengajuan -->
<div class="modal fade" id="upload_berkas" tabindex="-1" role="dialog" aria-labelledby="upload_berkasTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="upload_berkas2Label">Upload Dokumen!</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php echo form_open_multipart('ppk/administrasi/crudpengajuan'); ?>
                <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" style="display: none">
                <div class="form-group">
                    <label for="">Kode Pengajuan</label>
                    <input id="id_pengajuan" name="id_pengajuan" readonly value="<?= $data_pengajuan['id_pengajuan'] ?>" type=" text" value="" class="form-control" placeholder="Masukkan Nama Kegiatan" required>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlFile1">SK penetapan PPK (yang masih berlaku)</label>
                    <input type="file" class="form-control" id="berkas[]" name="berkas[]" required>
                    <input type="text" name="keterangan[]" hidden id="keterangan[]" value="SK penetapan PPK (yang masih berlaku)">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlFile1">Dokumen Anggaran Belanja (RKA/DPA)</label>
                    <input type="file" class="form-control" id="berkas[]" name="berkas[]" required>
                    <input type="text" name="keterangan[]" hidden id="keterangan[]" value="Dokumen Anggaran Belanja (RKA/DPA)">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlFile1">Dokumen Anggaran Belanja (RKA/DPA)</label>
                    <input type="file" class="form-control" id="berkas[]" name="berkas[]" required>
                    <input type="text" name="keterangan[]" hidden id="keterangan[]" value="Dokumen Anggaran Belanja (RKA/DPA)">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlFile1">Dokumen HPS</label>
                    <input type="file" class="form-control" id="berkas[]" name="berkas[]" required>
                    <input type="text" name="keterangan[]" hidden id="keterangan[]" value="Dokumen HPS">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlFile1">Spesifikasi teknis ( untuk pekerjaan Jasa Konstruksi, Jasa Lainnya dan Pengadaan Barang)</label>
                    <input type="file" class="form-control" id="berkas[]" name="berkas[]" required>
                    <input type="text" name="keterangan[]" hidden id="keterangan[]" value="Spesifikasi teknis ( untuk pekerjaan Jasa Konstruksi, Jasa Lainnya dan Pengadaan Barang)">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlFile1">Kerangka Acuan Kerja (untuk pekerjaan Jasa Konsultansi)</label>
                    <input type="file" class="form-control" id="berkas[]" name="berkas[]" required>
                    <input type="text" name="keterangan[]" hidden id="keterangan[]" value="Kerangka Acuan Kerja (untuk pekerjaan Jasa Konsultansi)">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlFile1">Salinan Perijinan ( ijin lokasi, IMD dll)</label>
                    <input type="file" class="form-control" id="berkas[]" name="berkas[]" required>
                    <input type="text" name="keterangan[]" hidden id="keterangan[]" value="Salinan Perijinan ( ijin lokasi, IMD dll)">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlFile1">Dokumen lain ( Sesuai jenis pengadaan barang/jasanya)</label>
                    <input type="file" class="form-control" id="berkas[]" name="berkas[]" required>
                    <input type="text" name="keterangan[]" hidden id="keterangan[]" value="Dokumen lain ( Sesuai jenis pengadaan barang/jasanya)">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-primary" data-dismiss="modal">
                    Close
                </button>
                <button type="submit" id="upload_berkas" name="upload_berkas" class="btn btn-primary">Upload</button>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>
<!-- Detail Pengajuan Kirim -->
<div class="modal fade" id="berkas_detail" tabindex="-1" role="dialog" aria-labelledby="berkas_detailTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="berkas_detailTitle">
                    Update Berkas!
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="detail_body">
                <?php echo form_open_multipart('ppk/administrasi/crudpengajuan'); ?>
                <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" style="display: none">
                <div class="form-group">
                    <input id="id_pengajuan" name="id_pengajuan" hidden value="<?= $data_pengajuan['id_pengajuan'] ?>" type=" text" value="" class="form-control" placeholder="Masukkan Nama Kegiatan" required>
                    <input id="id_berkas" name="id_berkas" type="text" hidden class="form-control" placeholder="Masukkan Nama Organisasi Perangkat Daerah" required>
                    <input id="nm_berkas" name="nm_berkas" type="text" readonly class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlFile1">Upload Dokumen</label>
                    <input type="file" class="form-control" id="berkas" name="berkas" required>
                    <input type="text" name="link_berkas" hidden id="link_berkas">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-primary" data-dismiss="modal">
                    Close
                </button>
                <button type="submit" id="ubah_berkas" name="ubah_berkas" class="btn btn-success">Simpan</button>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>
<!-- Form Ajax Kategori Juri -->
<script type="text/javascript">
    $(document).on("click", "#detail_berkas", function() {
        var id_berkas = $(this).data('id_berkas');
        var nm_berkas = $(this).data('nm_berkas');
        var link_berkas = $(this).data('link_berkas');
        $(".modal-body#detail_body #id_berkas").val(id_berkas);
        $(".modal-body#detail_body #nm_berkas").val(nm_berkas);
        $(".modal-body#detail_body #link_berkas").val(link_berkas);
    })
</script>