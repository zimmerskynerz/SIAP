<?php $this->load->view('agendaris/notif') ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>PENGAJUAN PENGADAAN BARANG & JASA DITOLAK</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
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
                                        <th style="text-align: center;">NIP</th>
                                        <th style="text-align: center;">Nama</th>
                                        <th style="text-align: center;">Kegiatan</th>
                                        <th style="text-align: center;">OPD</th>
                                        <th style="text-align: center;">Pengajuan</th>
                                        <th style="text-align: center;">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($data_pengajuan as $Data_pengajuan) : ?>
                                        <tr>
                                            <td style="text-align: center;"><?= $no ?></td>
                                            <td><?= $Data_pengajuan->nip ?></td>
                                            <td><?= $Data_pengajuan->nama ?></td>
                                            <td><?= $Data_pengajuan->nm_kegiatan ?></td>
                                            <td><?= $Data_pengajuan->nm_opd ?></td>
                                            <td><?= date('d F Y', strtotime($Data_pengajuan->tgl_pengajuan)) ?></td>
                                            <td class="text-center">
                                                <a href="<?= base_url('kepala/administrasi/detailditolak/' . $Data_pengajuan->id_pengajuan . '') ?>">
                                                    <i class="fas fa-edit"></i>
                                                </a>
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