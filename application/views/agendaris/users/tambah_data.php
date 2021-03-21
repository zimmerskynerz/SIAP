<!-- Tambah PPK -->
<div class="modal fade" id="tambah_ppk" tabindex="-1" role="dialog" aria-labelledby="tambah_ppkLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambah_ppkLabel">Tambah Data PPK</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                </button>
            </div>
            <div class="modal-body">
                <?php echo form_open_multipart('agendaris/pengguna/crudppk'); ?>
                <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" style="display: none">
                <div class="form-group">
                    <input id="email" name="email" type="email" value="" class="form-control" placeholder="Masukkan Email" required>
                </div>
                <div class="form-group">
                    <input id="nip" name="nip" type="number" min="9" value="" class="form-control" placeholder="Masukkan Nomor Induk Pegawai (NIP)" required>
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
                <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Keluar</button>
                <button type="submit" id="simpan_ppk" name="simpan_ppk" class="btn btn-primary">Simpan</button>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>
<!-- Tambah POKJA -->
<div class="modal fade" id="tambah_pokja" tabindex="-1" role="dialog" aria-labelledby="tambah_pokjaLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambah_pokjaLabel">Tambah Data POKJA</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                </button>
            </div>
            <div class="modal-body">
                <?php echo form_open_multipart('agendaris/pengguna/crudpokja'); ?>
                <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" style="display: none">
                <div class="form-group">
                    <input id="email" name="email" type="email" value="" class="form-control" placeholder="Masukkan Email" required>
                </div>
                <div class="form-group">
                    <input id="nip" name="nip" type="number" min="9" value="" class="form-control" placeholder="Masukkan Nomor Induk Pegawai (NIP)" required>
                </div>
                <div class="form-group">
                    <input id="nama" name="nama" type="text" value="" class="form-control" placeholder="Masukkan Nama POKJA" required>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Keluar</button>
                <button type="submit" id="simpan_pokja" name="simpan_pokja" class="btn btn-primary">Simpan</button>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>