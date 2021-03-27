<?php $this->load->view('ppk/notif') ?>
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
                        <a class="btn btn-primary" style="position: absolute; right:20px; top: 5px;" target="_BLANK" href="<?= base_url('agendaris/administrasi/berita_acara/' . $data_ketua['id_pengajuan'] . '') ?>"> Berita Acara</a>
                    </div>
                <?php endif; ?>
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
                        <div class="card-header">
                            <?php if ($jml_berkas > 0) : ?>
                                <?php if ($data_pengajuan['status_pengajuan'] == 'BELUM_KIRIM') : ?>
                                    <button class="btn btn-primary btn-block mb-4 mr-2" data-toggle="modal" data-target="#kirim_pengajuan" type="button">Kirim Pengajuan</button>
                                <?php elseif ($data_pengajuan['status_pengajuan'] == 'REVISI_PENGAJUAN') : ?>
                                    <button class="btn btn-primary btn-block mb-4 mr-2" data-toggle="modal" data-target="#kirim_pengajuan" type="button">Kirim Pengajuan</button>
                                    <div class="form-group">
                                        <textarea class="form-control" readonly>Dokumen pengajuan anda sudah kami verifikasi pada <?= date('d F Y', strtotime($data_konfirmasi['tgl_konfirmasi'])) ?>, dan dinyatakan REVISI dengan catatan <?= $data_konfirmasi['alasan'] ?></textarea>
                                    </div>
                                <?php endif; ?>
                            <?php else : ?>
                                <button class="btn btn-primary btn-block mb-4 mr-2" data-toggle="modal" data-target="#upload_berkas" type="button">Upload Berkas</button>
                            <?php endif; ?>

                        </div>
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
<?php $this->load->view('ppk/administrasi/pengajuan/tambah_data') ?>