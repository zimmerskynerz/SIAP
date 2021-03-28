<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Beranda</h1>
                </div><!-- /.col -->
                <div>
                    <?php echo form_open_multipart('kepala'); ?>
                    <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" style="display: none">
                    <div class="row">
                        <div class="col">
                            <select name="bulan" id="bulan" class="form-control" style="width: 130px;">
                                <option>Pilih Bulan</option>
                                <option value="1">Januari</option>
                                <option value="2">Februari</option>
                                <option value="3">Maret</option>
                                <option value="4">April</option>
                                <option value="5">Mei</option>
                                <option value="6">Juni</option>
                                <option value="7">Juli</option>
                                <option value="8">Agustus</option>
                                <option value="9">September</option>
                                <option value="10">Oktober</option>
                                <option value="11">Nopember</option>
                                <option value="12">Desember</option>
                            </select>
                        </div>
                        <div class="col">
                            <select name="tahun" id="tahun" class="form-control" style="width: 130px;">
                                <option>Pilih Tahun</option>
                                <?php
                                $now = date('Y');
                                for ($tahun = $now; $tahun >= $now - 20; $tahun--) {
                                    echo '
                                            <option value="' . $tahun . '">' . $tahun . '</option>';
                                } ?>
                            </select>
                        </div>
                        <div class="col">
                            <button type="submit" class="btn btn-primary" id="tampilLaporan" name="tampilLaporan" class="btn btn-primary mb-2"><i class="nav-icon fas fa-search"></i></button>
                            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#tampil_aksi" class="btn btn-primary mb-2"><i class="nav-icon fas fa-print"></i></button>
                        </div>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3><?= $jml_pengjauan ?></h3>
                            <p>Pengajuan Baru</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="<?= base_url('agendaris/administrasi/pengajuan') ?>" class="small-box-footer">Selanjutnya <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3><?= $jml_verifikasi ?></h3>
                            <p>Kaji Ulang</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="<?= base_url('agendaris/administrasi/review') ?>" class="small-box-footer">Selanjutnya <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3><?= $jml_diterima ?></h3>
                            <p>Pengajuan Diterima</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="<?= base_url('agendaris/administrasi/diterima') ?>" class="small-box-footer">Selanjutnya <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3><?= $jml_ditolak ?></h3>
                            <p>Pengajuan Ditolak</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>
                        <a href="<?= base_url('agendaris/administrasi/ditolak') ?>" class="small-box-footer">Selanjutnya <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
            </div>
            <div class="row">
                <div class="col-12">
                    <!-- /.card -->
                    <div class="card">
                        <div class="card-header">
                            <h4>Data Pengadaan Barang dan Jasa</h4>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th style="text-align: center;">No</th>
                                        <th style="text-align: center;">Nama OPD</th>
                                        <th style="text-align: center;">Pengajuan</th>
                                        <th style="text-align: center;">Review</th>
                                        <th style="text-align: center;">Diterima</th>
                                        <th style="text-align: center;">Ditolak</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($data_opd as $OPD) : ?>
                                        <tr>
                                            <td style="text-align: center;"><?= $no ?></td>
                                            <td><?= $OPD->nm_opd ?></td>
                                            <td class="text-center">
                                                <?php
                                                foreach ($data_pengajuan as $Data_pengajuan) :
                                                    if ($Data_pengajuan->id_opd == $OPD->id_opd) :
                                                        echo $Data_pengajuan->jml_pengajuanOPD;
                                                    endif;
                                                endforeach
                                                ?>
                                            </td>
                                            <td class="text-center">
                                                <?php
                                                foreach ($data_review as $Data_review) :
                                                    if ($Data_review->id_opd == $OPD->id_opd) :
                                                        echo $Data_review->jml_reviewOPD;
                                                    endif;
                                                endforeach
                                                ?>
                                            </td>
                                            <td class="text-center">
                                                <?php
                                                foreach ($data_diterima as $Data_diterima) :
                                                    if ($Data_diterima->id_opd == $OPD->id_opd) :
                                                        echo $Data_diterima->jml_diterimaOPD;
                                                    endif;
                                                endforeach
                                                ?>
                                            </td>
                                            <td class="text-center">
                                                <?php
                                                foreach ($data_ditolak as $Data_ditolak) :
                                                    if ($Data_ditolak->id_opd == $OPD->id_opd) :
                                                        echo $Data_ditolak->jml_ditolakOPD;
                                                    endif;
                                                endforeach
                                                ?>
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
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<div class="modal fade" id="tampil_aksi" tabindex="-1" role="dialog" aria-labelledby="tampil_aksiLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tampil_aksiLabel">Cetak Laporan Pengajuan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                </button>
            </div>
            <div class="modal-body">
                <?php echo form_open_multipart('kepala/cetak_laporan'); ?>
                <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" style="display: none">
                <div class="form-group">
                    <select name="bulan" id="bulan" class="form-control" required>
                        <option>Pilih Bulan</option>
                        <option value="1">Januari</option>
                        <option value="2">Februari</option>
                        <option value="3">Maret</option>
                        <option value="4">April</option>
                        <option value="5">Mei</option>
                        <option value="6">Juni</option>
                        <option value="7">Juli</option>
                        <option value="8">Agustus</option>
                        <option value="9">September</option>
                        <option value="10">Oktober</option>
                        <option value="11">Nopember</option>
                        <option value="12">Desember</option>
                    </select>
                </div>
                <div class="form-group">
                    <select name="tahun" id="tahun" class="form-control" required>
                        <option>Pilih Tahun</option>
                        <?php
                        $now = date('Y');
                        for ($tahun = $now; $tahun >= $now - 20; $tahun--) {
                            echo '
                                            <option value="' . $tahun . '">' . $tahun . '</option>';
                        } ?>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Keluar</button>
                <button type="submit" id="cetak_laporan" name="cetak_laporan" class="btn btn-primary"> Cetak</button>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>