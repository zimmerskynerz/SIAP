<div class="modal fade" id="tambah_pengajuan" tabindex="-1" role="dialog" aria-labelledby="tambah_pengajuanTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambah_pengajuanLabel">Tambah Data Pengajuan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php echo form_open_multipart('ppk/administrasi/crudpengajuan'); ?>
                <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" style="display: none">
                <div class="form-group">
                    <label for="">Nama Kegiatan</label>
                    <input id="nm_kegiatan" name="nm_kegiatan" type="text" value="" class="form-control" placeholder="Masukkan Nama Kegiatan" required>
                </div>
                <div class="form-group">
                    <label for="">Nama Paket</label>
                    <input id="nm_paket" name="nm_paket" type="text" value="" class="form-control" placeholder="Masukkan Nama Paket Kegiatan" required>
                </div>
                <div class="form-group">
                    <label for="">Sumber Dana Kegiatan</label>
                    <input id="smb_dana" name="smb_dana" type="text" value="" class="form-control" placeholder="Masukkan Sumber Dana Kegiatan" required>
                </div>
                <div class="form-group">
                    <label for="">Nomor SK Pengajuan</label>
                    <input id="no_sk" name="no_sk" type="text" value="" class="form-control" placeholder="Masukkan Nomer Surat Tugas" required>
                </div>
                <div class="form-group">
                    <label for="">Anggaran Dana</label>
                    <input id="pagu" name="pagu" type="number" value="" class="form-control" placeholder="Masukkan Anggaran Sesuai di Dokumen Anggaran" required>
                </div>
                <div class="form-group">
                    <label for="">Harga Pasar</label>
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