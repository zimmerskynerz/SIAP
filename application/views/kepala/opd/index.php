<?php $this->load->view('agendaris/notif') ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>DAFTAR ORGANISASI PERANGKAT DAERAH</h1>
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
                            <button class="btn btn-primary btn-block mb-4 mr-2" data-toggle="modal" data-target="#tambahOPD" type="button">Tambah</button>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th style="text-align: center;">No</th>
                                        <th style="text-align: center;">Nama OPD</th>
                                        <th style="text-align: center;">Keterangan</th>
                                        <th style="text-align: center;">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($opd as $OPD) : ?>
                                        <tr>
                                            <td style="text-align: center;"><?= $no ?></td>
                                            <td><?= $OPD->nm_opd ?></td>
                                            <td><?= $OPD->keterangan ?></td>
                                            <td class="text-center">
                                                <a id="detail_opd" href="javascript:void(0);" class="bs-tooltip" data-toggle="modal" data-target="#OPD_detail" data-id_opd="<?= $OPD->id_opd ?>" data-nm_opd="<?= $OPD->nm_opd ?>" data-keterangan="<?= $OPD->keterangan ?>">
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
<?php $this->load->view('agendaris/opd/tambah_data') ?>
<?php $this->load->view('agendaris/opd/detail_data') ?>