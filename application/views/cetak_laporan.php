<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="shortcut icon" href="<?= base_url('assets/') ?>dist/img/logo-kudus.png" />
    <title>LAPORAN BULANAN PENGADAAN BARANG DAN JASA</title>
    <link href="<?= base_url('assets/') ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url('assets/') ?>vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Select2 -->
    <link href="<?= base_url('assets/') ?>vendor/select2/dist/css/select2.min.css" rel="stylesheet" type="text/css" />
    <!-- Bootstrap DatePicker -->
    <!-- Bootstrap Touchspin -->
    <link href="<?= base_url('assets/') ?>vendor/bootstrap-touchspin/css/jquery.bootstrap-touchspin.css" rel="stylesheet" />
    <!-- ClockPicker -->
    <!-- RuangAdmin CSS -->
    <link href="<?= base_url('assets/') ?>css/ruang-admin.min.css" rel="stylesheet" />
    <link href="<?= base_url('assets/') ?>css/custom.css" rel="stylesheet" />
    <script src="<?= base_url('assets/') ?>vendor/jquery/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/') ?>css/forms/theme-checkbox-radio.css">
    <link href="<?= base_url('assets/') ?>css/scrollspyNav.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url('assets/') ?>css/components/tabs-accordian/custom-tabs.css" rel="stylesheet" type="text/css" />
    <script src="<?= base_url('assets/') ?>js/jquery-1.10.2.min.js"></script>
    <script type='text/javascript'>
        tinymce.init({
            selector: ".tinymce", // change this value according to your HTML
            skin: "CUSTOM",
            content_css: "CUSTOM"
        });
    </script>
    <style>
        .sidebar.toggled .nav-item .collapse {
            position: relative;
            padding-left: 1rem;
            left: 0;
            z-index: 1;
            top: 0;
        }

        .sidebar.toggled {
            width: 60vw !important;
            transition: all .3s ease-in-out;
            -webkit-transition: all .3s ease-in-out;
        }
    </style>
    <style>
        .responsive img {
            max-width: 50%;
            align-content: center;
            /*width:100%;*/
            height: auto;
        }
    </style>
</head>

<body>

    <div class="main-panel">
        <div class="content-wrapper">
            <style>
                hr {
                    display: block;
                    margin-top: 0.1em;
                    margin-bottom: 0.5em;
                    margin-left: auto;
                    margin-right: auto;
                    border-style: double;
                    border-width: 2px;
                }

                table,
                th,
                td {
                    padding: 8px 10px;
                }
            </style>

            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="row">
                            <div class="col-lg-10 offset-lg-1">
                                <div class="card-body">
                                    <center>
                                        <table>
                                            <tr>
                                                <td><img src="<?= base_url('assets/') ?>dist/img/kudus-hitam-putih.png" width="100px" style="left: 12px;" alt=""></td>
                                                <td style="width: 690px;">
                                                    <center>
                                                        <h4><b>PEMERINTAH KABUPATEN KUDUS</b></h4>
                                                        <h4><b>SEKRETARIAT DAERAH</b></h4>
                                                        <h7>Jl. Simpang Tujuh No. 1, Kode Pos 59313</h7><br>
                                                        <h7>Telp. (0291) 435019, Fax. (0291)439300</h7>
                                                    </center>
                                                </td>

                                            </tr>
                                        </table>
                                    </center>
                                    <hr class="mb-4">
                                    <center>
                                        <br>
                                        <h4><u>LAPORAN PENGAJUAN PENGADAAN BARANG DAN JASA</u></h4>
                                        <h5>Bulan : <?= $bulan ?>; Tahun : <?= $tahun ?></h5>
                                    </center><br>
                                    <table>
                                        <tr>
                                            <td>Jumlah Pengajuan </td>
                                            <td>:</td>
                                            <td> <?= $jml_pengajuan_total; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Jumlah Pengajuan Baru </td>
                                            <td>:</td>
                                            <td> <?= $jml_pengjauan; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Jumlah Pengajuan Review </td>
                                            <td>:</td>
                                            <td> <?= $jml_verifikasi; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Jumlah Pengajuan Diterima </td>
                                            <td>:</td>
                                            <td> <?= $jml_diterima; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Jumlah Pengajuan Ditolak </td>
                                            <td>:</td>
                                            <td> <?= $jml_ditolak; ?></td>
                                        </tr>
                                    </table>
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
                                    <table colspan="2" width="100%">
                                        <thead>
                                            <tr>
                                                <td align="center">Kepla Bagian,</td>
                                            </tr>
                                            <tr>
                                                <td align="center">Kudus, <?= $tgl_indo ?></td>
                                            </tr>
                                            <tr>
                                                <td align="center"></td>
                                            </tr>
                                            <tr>
                                                <td align="center"></td>
                                            </tr>
                                            <tr colspan="3">
                                                <td align="center"></td>
                                            </tr>
                                            <tr>
                                                <td align="center"><u><?= $identitas['nama'] ?>,</u><br>NIP. <?= $nip ?></td>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- plugins:js -->
    <script src="<?= base_url('assets/') ?>vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url('assets/') ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url('assets/') ?>vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="<?= base_url('assets/') ?>js/ruang-admin.min.js"></script>
    <script src="<?= base_url('assets/') ?>vendor/select2/dist/js/select2.min.js"></script>
    <!-- Bootstrap Datepicker -->
    <script src="<?= base_url('assets/') ?>vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
    <!-- Bootstrap Touchspin -->
    <script src="<?= base_url('assets/') ?>vendor/bootstrap-touchspin/js/jquery.bootstrap-touchspin.js"></script>
    <!-- ClockPicker -->
    <script src="<?= base_url('assets/') ?>vendor/clock-picker/clockpicker.js"></script>
    <!-- Page level plugins -->

    <script src="<?= base_url('assets/') ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url('assets/') ?>vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Page level plugins -->
    <script src="<?= base_url('assets/') ?>vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= base_url('assets/') ?>vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <!-- File Upload -->
    <script language=javascript>
        function printWindow() {
            bV = parseInt(navigator.appVersion);
            if (bV >= 4) window.print();
        }
        printWindow();
    </script>
</body>

</html>