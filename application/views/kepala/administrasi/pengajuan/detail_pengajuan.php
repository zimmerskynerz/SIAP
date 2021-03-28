<?php $this->load->view('agendaris/notif') ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>DETAIL PENGADAAN BARANG & JASA</h1>
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
                                        <th style="text-align: center;">Nama Dokumen</th>
                                        <th style="text-align: center;">Link Dokumen</th>
                                        <?php if ($data_pengajuan['status_pengajuan'] == 'BELUM_KIRIM') : ?>
                                            <th style="text-align: center;">Aksi</th>
                                        <?php elseif ($data_pengajuan['status_pengajuan'] == 'REVISI_PENGAJUAN') : ?>
                                            <th style="text-align: center;">Aksi</th>
                                        <?php endif; ?>
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
                                            <?php if ($data_pengajuan['status_pengajuan'] == 'BELUM_KIRIM') : ?>
                                                <td class="text-center">
                                                    <a id="detail_berkas" href="javascript:void(0);" class="bs-tooltip" data-toggle="modal" data-target="#berkas_detail" data-id_pengajuan="<?= $Data_berkas->id_pengajuan ?>" data-id_berkas="<?= $Data_berkas->id_berkas ?>" data-nm_berkas="<?= $Data_berkas->nm_berkas ?>" data-link_berkas="<?= $Data_berkas->link_berkas ?>">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                </td>
                                            <?php elseif ($data_pengajuan['status_pengajuan'] == 'REVISI_PENGAJUAN') : ?>
                                                <td class="text-center">
                                                    <a id="detail_berkas" href="javascript:void(0);" class="bs-tooltip" data-toggle="modal" data-target="#berkas_detail" data-id_pengajuan="<?= $Data_berkas->id_pengajuan ?>" data-id_berkas="<?= $Data_berkas->id_berkas ?>" data-nm_berkas="<?= $Data_berkas->nm_berkas ?>" data-link_berkas="<?= $Data_berkas->link_berkas ?>">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                </td>
                                            <?php endif; ?>
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