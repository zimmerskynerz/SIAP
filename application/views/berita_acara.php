<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="shortcut icon" href="<?= base_url('assets/') ?>dist/img/logo-kudus.png" />
    <title>BERITA ACARA KAJI ULANG PENGADAAN BARANG DAN JASA</title>
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
                                        <h4><u>BERITA ACARA REVIU/KAJI ULANG DOKUMEN PERSIAPAN PENGADAAN</u></h4>
                                        <h5>Nomor : <?= $nomor ?></h5>
                                    </center><br>

                                    <p>Pada hari ini <?= $hari ?> tanggal <?= $tanggal_baru ?> bulan <?= $bulan_baru ?> tahun <?= $tahun_baru ?>, kami yang bertanda tangan di bawah ini <?= $singkatan ?> Bagian Pengadaan Barang /Jasa Sekretariat Daerah Kabupaten Kudus bersama dengan Pengguna Anggaran (PA)/Kuasa Pengguna Anggaran (KPA)/Pejabat Pembuat Komitmen (PPK), yaitu:</p>
                                    <table>
                                        <tr>
                                            <td>Nama PA/KPA/PPK </td>
                                            <td>:</td>
                                            <td> <?= $data_pengajuan['nama']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>SKPD/OPD </td>
                                            <td>:</td>
                                            <td> <?= $data_pengajuan['nm_opd']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Nomor SK </td>
                                            <td>:</td>
                                            <td> <?= $data_pengajuan['no_sk']; ?></td>
                                        </tr>
                                    </table>
                                    <p>telah mengadakan Reviu/Kaji Ulang Dokumen Persiapan Pengadaan untuk :</p>
                                    <table>
                                        <tr>
                                            <td>Nama Kegiatan </td>
                                            <td>:</td>
                                            <td> <?= $data_pengajuan['nm_kegiatan']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Nama Paket Pekerjaan </td>
                                            <td>:</td>
                                            <td> <?= $data_pengajuan['nm_paket']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Sumber Dana </td>
                                            <td>:</td>
                                            <td> <?= $data_pengajuan['smb_dana']; ?></td>
                                        </tr>
                                    </table>
                                    <p>Dalam pembahasan ini telah dilakukan reviu/kaji ulang terhadap Dokumen Persiapan Pengadaan meliputi spesifikasi teknis, Harga Perkiraan Sendiri (HPS), Rancangan Kontrak, Dokumen Anggaran Belanja, ID paket RUP, waktu penggunaan barang/jasa, serta analisis pasar. Hasil reviu terhadap dokumen-dokumen tersebut adalah Sebagai tertuang dalam lampiran review.</p>
                                    <p>Demikian Berita Acara ini dibuat untuk dapat dipergunakan sebagaimana mestinya.</p>
                                    <table colspan="2" width="100%">
                                        <thead>
                                            <tr>
                                                <td align="center">Pejabat Pembuat Komitmen,</td>
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
                                                <td align="center"><u><?= $data_pengajuan['nama']; ?></u><br>NIP. <?= $nip ?></td>
                                            </tr>
                                        </thead>
                                    </table>
                                    <table>
                                        <tr>
                                            <td>1. </td>
                                            <td> <?= $data_ketua['nama'] ?> </td>
                                            <td> 1.</td>
                                            <td> ..........</td>
                                        </tr>
                                        <?php
                                        $no = 2;
                                        foreach ($data_anggota as $Data_anggota) : ?>
                                            <tr>
                                                <td><?= $no ?>. </td>
                                                <td> <?= $Data_anggota->nama ?> </td>
                                                <td> <?= $no ?>.</td>
                                                <td> ..........</td>
                                            </tr>
                                        <?php
                                            $no++;
                                        endforeach; ?>
                                    </table><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                                    <center>
                                        <h4><u>LAMPIRAN BERITA ACARA REVIEW/KAJI ULANG</u></h4>
                                    </center>
                                    <table>
                                        <tr>
                                            <td>Nama Paket Pekerjaan </td>
                                            <td>:</td>
                                            <td> <?= $data_pengajuan['nm_paket']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Pagu </td>
                                            <td>:</td>
                                            <td> Rp <?= $data_pengajuan['pagu']; ?>,-</td>
                                        </tr>
                                        <tr>
                                            <td>HPS </td>
                                            <td>:</td>
                                            <td> Rp <?= $data_pengajuan['hps']; ?>,-</td>
                                        </tr>
                                    </table>
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th style="text-align: center;">No</th>
                                                <th style="text-align: center;">ITEM REVIEW</th>
                                                <th style="text-align: center;">MEMENUHI / TIDAK MEMENUHI</th>
                                                <th style="text-align: center;">HASIL REVIEW</th>
                                            </tr>
                                            <tr>
                                                <th style="text-align: center;">1</th>
                                                <th style="text-align: center;">2</th>
                                                <th style="text-align: center;">3</th>
                                                <th style="text-align: center;">4</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            foreach ($data_berkas as $Data_berkas) : ?>
                                                <tr>
                                                    <td style="text-align: center;"><?= $no ?></td>
                                                    <td><?= $Data_berkas->nm_berkas ?></td>
                                                    <td>Ada, Memenuhi</td>
                                                    <td><?= $Data_berkas->komentar ?></td>
                                                </tr>
                                            <?php
                                                $no++;
                                            endforeach; ?>
                                        </tbody>
                                    </table>
                                    <p>Berdasarkan hasil Review diatas maka dapat kami simpulkan bahwa :</p>
                                    <?php if ($data_ketua['status_ba'] == 'DITERIMA') : ?>
                                        <ol>
                                            1. Memenuhi untuk dilakukan proses Tender/Lelang <br>
                                            2. <s>Dikembalikan untuk dilakukan proses perbaikan/revisi</s>
                                        </ol>
                                    <?php else : ?>
                                        <ol>
                                            1. <s>Memenuhi untuk dilakukan proses Tender/Lelang</s> <br>
                                            2. Dikembalikan untuk dilakukan proses perbaikan/revisi
                                        </ol>
                                    <?php endif; ?>
                                    <table colspan="2" width="100%">
                                        <thead>
                                            <tr>
                                                <td align="center">Pejabat Pembuat Komitmen,</td>
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
                                                <td align="center"><u><?= $data_pengajuan['nama']; ?></u><br>NIP. <?= $nip ?></td>
                                            </tr>
                                        </thead>
                                    </table>
                                    <table>
                                        <tr>
                                            <td>1. </td>
                                            <td> <?= $data_ketua['nama'] ?> </td>
                                            <td> 1.</td>
                                            <td> ..........</td>
                                        </tr>
                                        <?php
                                        $no = 2;
                                        foreach ($data_anggota as $Data_anggota) : ?>
                                            <tr>
                                                <td><?= $no ?>. </td>
                                                <td> <?= $Data_anggota->nama ?> </td>
                                                <td> <?= $no ?>.</td>
                                                <td> ..........</td>
                                            </tr>
                                        <?php
                                            $no++;
                                        endforeach; ?>
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