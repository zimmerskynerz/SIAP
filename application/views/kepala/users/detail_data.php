<!-- Detail PPK -->
<div class="modal fade" id="ppk_detail" tabindex="-1" role="dialog" aria-labelledby="ppk_detailTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ppk_detailTitle">
                    Detail Data PPK!
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="detail_body">
                <?php echo form_open_multipart('agendaris/pengguna/crudppk'); ?>
                <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" style="display: none">
                <div class="form-group">
                    <input id="id_login" name="id_login" hidden type="text" class="form-control" placeholder="Masukkan Email">
                    <input id="email" name="email" readonly type="email" value="" class="form-control" placeholder="Masukkan Email" required>
                </div>
                <div class="form-group">
                    <input id="nip" name="nip" type="number" min="9" class="form-control" placeholder="Masukkan Nomor Induk Pegawai (NIP)" required>
                    <input id="nip_lama" name="nip_lama" hidden type="number" value="" class="form-control" placeholder="Masukkan Nomor Induk Pegawai (NIP)" required>
                </div>
                <div class="form-group">
                    <input id="nama" name="nama" type="text" value="" class="form-control" placeholder="Masukkan Nama PPK" required>
                </div>
                <div class="form-group">
                    <input id="pangkat_gol" name="pangkat_gol" type="text" value="" class="form-control" placeholder="Masukkan Pangkat atau Golongan" required>
                </div>
                <div class="form-group">
                    <select name="id_opd" id="id_opd" class="form-control" required>
                        <option value="">Pilih Organisasi</option>
                        <?php foreach ($opd as $OPD) : ?>
                            <option value="<?= $OPD->id_opd ?>"><?= $OPD->nm_opd ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-primary" data-dismiss="modal">
                    Close
                </button>
                <button type="submit" id="reset_ppk" name="reset_ppk" class="btn btn-warning">Reset</button>
                <button type="submit" id="hapus_ppk" name="hapus_ppk" class="btn btn-danger">Hapus</button>
                <button type="submit" id="ubah_ppk" name="ubah_ppk" class="btn btn-success">Simpan</button>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>
<!-- Detail POKJA -->
<div class="modal fade" id="pokja_detail" tabindex="-1" role="dialog" aria-labelledby="pokja_detailTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="pokja_detailTitle">
                    Detail Data POKJA!
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="detail_body2">
                <?php echo form_open_multipart('agendaris/pengguna/crudpokja'); ?>
                <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" style="display: none">
                <div class="form-group">
                    <input id="id_login" name="id_login" hidden type="text" class="form-control" placeholder="Masukkan Email">
                    <input id="email" name="email" readonly type="email" value="" class="form-control" placeholder="Masukkan Email" required>
                </div>
                <div class="form-group">
                    <input id="nip" name="nip" type="number" min="9" class="form-control" placeholder="Masukkan Nomor Induk Pegawai (NIP)" required>
                    <input id="nip_lama" name="nip_lama" hidden type="number" value="" class="form-control" placeholder="Masukkan Nomor Induk Pegawai (NIP)" required>
                </div>
                <div class="form-group">
                    <input id="nama" name="nama" type="text" value="" class="form-control" placeholder="Masukkan Nama POKJA" required>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-primary" data-dismiss="modal">
                    Close
                </button>
                <button type="submit" id="reset_pokja" name="reset_pokja" class="btn btn-warning">Reset</button>
                <button type="submit" id="hapus_pokja" name="hapus_pokja" class="btn btn-danger">Hapus</button>
                <button type="submit" id="ubah_pokja" name="ubah_pokja" class="btn btn-success">Simpan</button>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).on("click", "#detail_ppk", function() {
        var id_login = $(this).data('id_login');
        var email = $(this).data('email');
        var nip = $(this).data('nip');
        var nama = $(this).data('nama');
        var pangkat_gol = $(this).data('pangkat_gol');
        var id_opd = $(this).data('id_opd');
        $(".modal-body#detail_body #id_login").val(id_login);
        $(".modal-body#detail_body #email").val(email);
        $(".modal-body#detail_body #nip").val(nip);
        $(".modal-body#detail_body #nip_lama").val(nip);
        $(".modal-body#detail_body #nama").val(nama);
        $(".modal-body#detail_body #pangkat_gol").val(pangkat_gol);
        $(".modal-body#detail_body #id_opd").val(id_opd);
    })
    $(document).on("click", "#detail_pokja", function() {
        var id_login = $(this).data('id_login');
        var email = $(this).data('email');
        var nip = $(this).data('nip');
        var nama = $(this).data('nama');
        $(".modal-body#detail_body2 #id_login").val(id_login);
        $(".modal-body#detail_body2 #email").val(email);
        $(".modal-body#detail_body2 #nip").val(nip);
        $(".modal-body#detail_body2 #nip_lama").val(nip);
        $(".modal-body#detail_body2 #nama").val(nama);
    })
</script>