<?php $this->load->view('pokja/notif') ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>DETAIL PENGADAAN BARANG & JASA</h1>
                </div>
                <?php if ($data_ketua['status_ba'] != 'KONFIRMASI') : ?>
                    <div class="col-sm-6">
                        <a class="btn btn-primary" style="position: absolute; right:20px; top: 5px;" target="_BLANK" href="<?= base_url('pokja/administrasi/berita_acara/' . $data_pengajuan['id_pengajuan'] . '') ?>"> Berita Acara</a>
                    </div>
                <?php else : ?>
                    <div class="col-sm">
                        <button class="btn btn-primary" style="position: absolute; right:20px; top: 5px;" data-toggle="modal" data-target="#konfirmasi_review" type="button">Kaji Ulang</button>
                    </div>
                <?php endif; ?>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- Data Login -->
                <div class="col-md">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">DATA POKJA</h3>
                        </div>
                        <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" style="display: none">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Ketua POKJA</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" value="<?= $data_ketua['nama'] ?>" readonly name="id_login">
                            </div>
                            <label for="exampleInputPassword1">Anggota POKJA</label>
                            <?php foreach ($data_anggota as $Data_anggota) : ?>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="exampleInputPassword1" value="<?= $Data_anggota->nama ?>" readonly name="password_baru" placeholder="Password Baru" required>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <!-- /.card -->
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th style="text-align: center;">No</th>
                                        <th style="text-align: center;">Nama Dokumen</th>
                                        <th style="text-align: center;">Link Dokumen</th>
                                        <th style="text-align: center;">Komentar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($data_berkas as $Data_berkas) : ?>
                                        <tr>
                                            <td style="text-align: center;"><?= $no ?></td>
                                            <td><?= $Data_berkas->nm_berkas ?></td>
                                            <td><a href="<?= base_url('berkas/' . $Data_berkas->link_berkas . '') ?>" target="_BLANK">Link Download!</a></td>
                                            <td>
                                                <?php if ($data_ketua['status_ba'] != 'KONFIRMASI') :
                                                    echo $Data_berkas->komentar;
                                                else : ?>
                                                    <?php if ($Data_berkas->komentar == null) : ?>
                                                        <?php echo form_open_multipart('pokja/administrasi/crudreview'); ?>
                                                        <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" style="display: none">
                                                        <div class="form-group">
                                                            <input id="id_pengajuan" name="id_pengajuan" type="text" hidden value="<?= $data_ketua['id_pengajuan'] ?>" class="form-control" placeholder="Masukkan Nama Kegiatan" required>
                                                            <input id="id_berkas" name="id_berkas" type="text" hidden value="<?= $Data_berkas->id_berkas ?>" class="form-control" placeholder="Masukkan Nama Kegiatan" required>
                                                            <textarea id="komentar" name="komentar" class="form-control" type="text" placeholder="Masukkan Komentar Dokumen"></textarea>
                                                            <br> <button type="submit" id="tambah_komentar" name="tambah_komentar" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
                                                        </div>
                                                        <?php echo form_close(); ?>
                                                    <?php else :
                                                        echo $Data_berkas->komentar;
                                                    endif;
                                                    ?>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php
                                        $no++;
                                    endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<div class="modal fade" id="konfirmasi_review" tabindex="-1" role="dialog" aria-labelledby="konfirmasi_reviewLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="konfirmasi_reviewLabel">Konfirmasi Kaji Ulang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                </button>
            </div>
            <div class="modal-body">
                <?php echo form_open_multipart('pokja/administrasi/crudreview'); ?>
                <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" style="display: none">
                <div class="form-group">
                    <select name="konfirmasi" id="konfirmasi" class="form-control" required onchange="showDiv2(this)">
                        <option value="1">Pilih Konfirmasi</option>
                        <option value="2">Terima Pengadaan</option>
                        <option value="3">Tolak Pengadaan</option>
                    </select>
                    <input id="id_pokja" name="id_pokja" type="text" hidden value="<?= $data_ketua['id_pokja'] ?>" class="form-control" placeholder="Masukkan Nama Organisasi Perangkat Daerah" required>
                </div>
                <div class="form-group" id="alasan_baru">
                    <textarea id="alasan" name="alasan" type="text" value="" class="form-control" placeholder="Masukkan Alasan DItolak"></textarea>
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
    $("#alasan_baru").hide();

    function showDiv2(select) {
        if (select.value == 1) {
            $("#alasan_baru").hide();
        }
        if (select.value == 2) {
            $("#alasan_baru").hide();
        }
        if (select.value == 3) {
            $("#alasan_baru").show();
        }
    }
</script>