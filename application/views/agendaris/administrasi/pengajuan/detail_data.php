<div class="modal fade" id="konfirmasi_pengajuan" tabindex="-1" role="dialog" aria-labelledby="konfirmasi_pengajuanLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="konfirmasi_pengajuanLabel">Konfirmasi Kirim Pengajuan!</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                </button>
            </div>
            <div class="modal-body">
                <?php echo form_open_multipart('agendaris/administrasi/crudpengajuan'); ?>
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
                    <input id="pagu" name="pagu" readonly value="<?= $data_pengajuan['pagu'] ?>" type="number" value="" class="form-control" placeholder="Masukkan Anggaran Sesuai di Dokumen Anggaran" required>
                </div>
                <div class="form-group">
                    <label for="">Jumlah Anggaran Pasar</label>
                    <input id="hps" name="hps" readonly value="<?= $data_pengajuan['hps'] ?>" type="number" value="" class="form-control" placeholder="Masukkan Harga Perkiraan Setelah Survey Pasar" required>
                </div>
                <div class="form-group">
                    <label for="">Konfirmasi</label>
                    <select class="form-control" name="konfirmasi" id="konfirmasi" required onchange="showDiv2(this)">
                        <option value="3">Pilih Aksi Konfirmasi</option>
                        <option value="1">Diterima</option>
                        <option value="2">Revisi</option>
                    </select>
                </div>
                <div class="form-group" id="revisi2">
                    <label for="">Revisi</label>
                    <textarea id="revisi" name="revisi" type="text" class="form-control" placeholder="Masukkan Alasan Revisi"></textarea>
                </div>
                <div class="form-group" id="tgl_review2">
                    <label for="">Tanggal Review</label>
                    <input id="tgl_review" name="tgl_review" type="date" min="<?= date('Y-m-d') ?>" value="" class="form-control" placeholder="Masukkan Harga Perkiraan Setelah Survey Pasar">
                </div>
                <div class="form-group" id="tgl_review3">
                    <label for="">Kode Pokja</label>
                    <select class="form-control" name="kode_pokja" id="kode_pokja">
                        <option value="PPJ">Pokja Pengadaan Jasa</option>
                        <option value="PPB">Pokja Pengadaan Barang</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Keluar</button>
                <button type="submit" id="simpan_konfirmasi" name="simpan_konfirmasi" class="btn btn-primary">Simpan</button>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>
<script>
    $("#tgl_review2").hide();
    $("#tgl_review3").hide();
    $("#revisi2").hide();

    function showDiv2(select) {
        if (select.value == 1) {
            $("#tgl_review2").show();
            $("#tgl_review3").show();
            $("#revisi2").hide();
        }
        if (select.value == 2) {
            $("#tgl_review2").hide();
            $("#tgl_review3").hide();
            $("#revisi2").show();
        }
        if (select.value == 3) {
            $("#tgl_review2").hide();
            $("#tgl_review3").hide();
            $("#revisi2").hide();
        }
    }
</script>