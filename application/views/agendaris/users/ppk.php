<?php $this->load->view('agendaris/notif') ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Pejabat Pembuat Komitmen (PPK)</h1>
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
                            <button class="btn btn-primary btn-block mb-4 mr-2" data-toggle="modal" data-target="#tambah_ppk" type="button">Tambah</button>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th style="text-align: center;">No</th>
                                        <th style="text-align: center;">NIP</th>
                                        <th style="text-align: center;">Nama</th>
                                        <th style="text-align: center;">Pangkat/Golongan</th>
                                        <th style="text-align: center;">Jabatan</th>
                                        <th style="text-align: center;">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($data_ppk as $Data_ppk) : ?>
                                        <tr>
                                            <td><?= $no ?></td>
                                            <td><?= $Data_ppk->nip ?></td>
                                            <td><?= $Data_ppk->nama ?></td>
                                            <td><?= $Data_ppk->pangkat_gol ?></td>
                                            <td>
                                                <?php
                                                foreach ($opd as $OPD) :
                                                    if ($Data_ppk->id_opd == $OPD->id_opd) :
                                                        echo $OPD->nm_opd;
                                                    endif;
                                                endforeach; ?>
                                            </td>
                                            <td style="text-align: center;">
                                                <a id="detail_ppk" href="javascript:void(0);" class="bs-tooltip" data-toggle="modal" data-target="#ppk_detail" data-id_login="<?= $Data_ppk->id_login ?>" data-email="<?= $Data_ppk->email ?>" data-nip="<?= $Data_ppk->nip ?>" data-nama="<?= $Data_ppk->nama ?>" data-pangkat_gol="<?= $Data_ppk->pangkat_gol ?>" data-id_opd="<?= $Data_ppk->id_opd  ?>">
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
<?php $this->load->view('agendaris/users/tambah_data') ?>
<?php $this->load->view('agendaris/users/detail_data') ?>