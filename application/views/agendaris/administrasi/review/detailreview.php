<?php $this->load->view('agendaris/notif') ?>
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
                        <a class="btn btn-primary" style="position: absolute; right:20px; top: 5px;" target="_BLANK" href="<?= base_url('ppk/administrasi/berita_acara/' . $data_ketua['id_pengajuan'] . '') ?>"> Berita Acara</a>
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
                                            <td><?= $Data_berkas->komentar ?></td>
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