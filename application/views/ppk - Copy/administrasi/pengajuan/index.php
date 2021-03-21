<?php $this->load->view('ppk/notif') ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>KONFIRMASI PENGADAAN BARANG</h1>
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
                        <div class="card-header">
                            <button class="btn btn-primary btn-block mb-4 mr-2" data-toggle="modal" data-target="#tambah_pengajuan" type="button">Tambah</button>
                        </div>
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
                                            <td><?= $Data_pengajuan->no_sk ?></td>
                                            <td><?= $Data_pengajuan->nm_kegiatan ?></td>
                                            <td><?= $Data_pengajuan->nm_paket ?></td>
                                            <td><?= $Data_pengajuan->smb_dana ?></td>
                                            <td>
                                                <?php
                                                if ($Data_pengajuan->status_pengajuan == 'PENGAJUAN') :
                                                    echo 'PENGAJUAN';
                                                elseif ($Data_pengajuan->status_pengajuan == 'BELUM_KIRIM') :
                                                    echo 'LENGKAPI DOKUMEN';
                                                elseif ($Data_pengajuan->status_pengajuan == 'VERIFIKASI') :
                                                    echo 'DOKUMEN DITERIMA';
                                                    foreach ($data_pokja as $Data_pokja) :
                                                        if ($Data_pengajuan->id_pengajuan == $Data_pokja->id_pengajuan) :
                                                            echo  '<br>Review : ' . date('d F Y', strtotime($Data_pokja->tgl_review)) . '';
                                                        endif;
                                                    endforeach;
                                                elseif ($Data_pengajuan->status_pengajuan == 'REVISI_PENGAJUAN') :
                                                    echo 'REVISI DOKUMEN';
                                                elseif ($Data_pengajuan->status_pengajuan == 'KAJI_ULANG') :
                                                    echo 'PENGKAJIAN ULANG';
                                                elseif ($Data_pengajuan->status_pengajuan == 'REVISI_KAJI') :
                                                    echo 'REVISI PENGKAJIAN';
                                                elseif ($Data_pengajuan->status_pengajuan == 'TOLAK_KAJI') :
                                                    echo 'KEGIATAN DITOLAK';
                                                else :
                                                    echo 'KEGIATAN PROSES';
                                                endif;
                                                ?>
                                            </td>
                                            <td><?= date('d F Y', strtotime($Data_pengajuan->tgl_pengajuan)) ?></td>
                                            <td class="text-center">
                                                <a href="<?= base_url('ppk/administrasi/detailpengajuan/' . $Data_pengajuan->id_pengajuan . '') ?>">
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
<?php $this->load->view('ppk/administrasi/pengajuan/tambah_data_pertama') ?>