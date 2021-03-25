<?php $this->load->view('pokja/notif') ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>REVIEW PENGADAAN</h1>
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
                                        <th style="text-align: center;">No SK</th>
                                        <th style="text-align: center;">Kegiatan</th>
                                        <th style="text-align: center;">Paket</th>
                                        <th style="text-align: center;">Dana</th>
                                        <th style="text-align: center;">Status</th>
                                        <th style="text-align: center;">Review</th>
                                        <th style="text-align: center;">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($data_pengajuan as $Data_pengajuan) : ?>
                                        <tr>
                                            <td style="text-align: center;"><?= $no ?></td>
                                            <td style="width: 20%;"><?= $Data_pengajuan->no_sk ?></td>
                                            <td style="width: 20%;"><?= $Data_pengajuan->nm_kegiatan ?></td>
                                            <td style="width: 20%;"><?= $Data_pengajuan->nm_paket ?></td>
                                            <td style="width: 20%;"><?= $Data_pengajuan->smb_dana ?></td>
                                            <td style="width: 10%;"><?= $Data_pengajuan->status_ba ?></td>
                                            <td style="width: 10%;"><?= date('d F Y', strtotime($Data_pengajuan->tgl_review)) ?></td>
                                            <td class="text-center">
                                                <a href="<?= base_url('pokja/administrasi/detail_review/' . $Data_pengajuan->id_pengajuan . '') ?>">
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