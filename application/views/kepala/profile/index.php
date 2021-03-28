<?php $this->load->view('agendaris/notif') ?>
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Profile Kepala Bagian</h1>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- Data Login -->
                <div class="col-md-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">DATA LOGIN</h3>
                        </div>
                        <?php echo form_open_multipart('kepala/crudprofile'); ?>
                        <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" style="display: none">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Password Lama</label>
                                <input type="password" class="form-control" id="exampleInputPassword1" name="password_lama" placeholder="Password Lama" required>
                                <input type="text" class="form-control" id="exampleInputEmail1" value="<?= $data_login['id_login'] ?>" name="id_login" hidden>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Password Baru</label>
                                <input type="password" class="form-control" id="exampleInputPassword1" name="password_baru" placeholder="Password Baru" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Password Konfirmasi</label>
                                <input type="password" class="form-control" id="exampleInputPassword1" name="password_konfirmasi" placeholder="Password Konfirmasi" required>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary" id="data_login" name="data_login">Simpan</button>
                        </div>
                        <?php echo form_close(); ?>
                    </div>
                </div>
                <!-- Data Identitas -->
                <div class="col-md-6">
                    <div class="card card-danger">
                        <div class="card-header">
                            <h3 class="card-title">DATA IDENTITAS</h3>
                        </div>
                        <?php echo form_open_multipart('kepala/crudprofile'); ?>
                        <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" style="display: none">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nomer Induk Pegawai</label>
                                <input type="number" class="form-control" id="exampleInputEmail1" name="nip" value="<?= $data_diri['nip'] ?>" placeholder="Masukkan Nomer Induk Pegawai">
                                <input type="number" class="form-control" id="exampleInputEmail1" hidden name="nip_lama" value="<?= $data_diri['nip'] ?>" placeholder="Masukkan Nomer Induk Pegawai">
                                <input type="text" class="form-control" id="exampleInputEmail1" value="<?= $data_login['id_login'] ?>" name="id_login" hidden>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nama Lengkap</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" value="<?= $data_diri['nama'] ?>" name="nama" placeholder="Masukkan Nama Lengkap Anda">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Pangkat/Golongan</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" value="<?= $data_diri['pangkat_gol'] ?>" name="pangkat_gol" placeholder="Masukkan Pangkat atau Golongan">
                            </div>

                        </div>
                        <div class=" card-footer">
                            <button type="submit" class="btn btn-danger" id="data_identitas" name="data_identitas">Simpan</button>
                        </div>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>