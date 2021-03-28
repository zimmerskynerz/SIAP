<?php
defined('BASEPATH') or exit('No direct script access allowed');


$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// Menu Untuk Login
$route['login']                                               = 'ControllerLogin/index';
$route['cek_login']                                           = 'ControllerLogin/cek_login';
$route['logout']                                              = 'ControllerLogin/logout';
// Kepala
// Menu Utama
$route['kepala']                                           = 'kepala/ControllerBeranda/index';
$route['kepala/beranda']                                   = 'kepala/ControllerBeranda/index';
// Cetak Laporan
$route['kepala/cetak_laporan']                             = 'kepala/ControllerBeranda/cetak_laporan';
// Menu Profile
$route['kepala/profile']                                   = 'kepala/ControllerProfile/index';
$route['kepala/crudprofile']                               = 'kepala/ControllerProfile/crudprofile';
// Menu Administrasi
$route['kepala/administrasi']                              = 'kepala/ControllerAdministrasi/index';
// Sub Menu Pengajuan
$route['kepala/administrasi/pengajuan']                    = 'kepala/ControllerAdministrasi/pengajuan';
$route['kepala/administrasi/crudpengajuan']                = 'kepala/ControllerAdministrasi/crudpengajuan';
$route['kepala/administrasi/detailpengajuan/(:any)']       = 'kepala/ControllerAdministrasi/detailpengajuan/$1';
// Sub Menu Review
$route['kepala/administrasi/review']                       = 'kepala/ControllerAdministrasi/review';
$route['kepala/administrasi/detailreview/(:any)']          = 'kepala/ControllerAdministrasi/detailreview/$1';
// Sub Menu Diterima dan Ditolak
$route['kepala/administrasi/diterima']                       = 'kepala/ControllerAdministrasi/diterima';
$route['kepala/administrasi/detailditerima/(:any)']          = 'kepala/ControllerAdministrasi/detailditerima/$1';
$route['kepala/administrasi/ditolak']                        = 'kepala/ControllerAdministrasi/ditolak';
$route['kepala/administrasi/detailditolak/(:any)']           = 'kepala/ControllerAdministrasi/detailditolak/$1';


// Agendaris
// Menu Utama
$route['agendaris']                                           = 'agendaris/ControllerBeranda/index';
$route['agendaris/beranda']                                   = 'agendaris/ControllerBeranda/index';
// Menu ORGANISASI PERANGKAT DAERAH (OPD)
$route['agendaris/opd']                                       = 'agendaris/ControllerOPD/index';
$route['agendaris/crudopd']                                   = 'agendaris/ControllerOPD/crudopd';
//  Menu Pengguna
$route['agendaris/pengguna']                                  = 'agendaris/ControllerPengguna/index';
//  Sub Menu PPK
$route['agendaris/pengguna/ppk']                              = 'agendaris/ControllerPengguna/ppk';
$route['agendaris/pengguna/crudppk']                          = 'agendaris/ControllerPengguna/crudppk';
// Sub Menu POKJA
$route['agendaris/pengguna/pokja']                            = 'agendaris/ControllerPengguna/pokja';
$route['agendaris/pengguna/crudpokja']                        = 'agendaris/ControllerPengguna/crudpokja';
// Menu Profile
$route['agendaris/profile']                                   = 'agendaris/ControllerProfile/index';
$route['agendaris/crudprofile']                               = 'agendaris/ControllerProfile/crudprofile';
// Menu Administrasi
$route['agendaris/administrasi']                              = 'agendaris/ControllerAdministrasi/index';
// Sub Menu Pengajuan
$route['agendaris/administrasi/pengajuan']                    = 'agendaris/ControllerAdministrasi/pengajuan';
$route['agendaris/administrasi/crudpengajuan']                = 'agendaris/ControllerAdministrasi/crudpengajuan';
$route['agendaris/administrasi/detailpengajuan/(:any)']       = 'agendaris/ControllerAdministrasi/detailpengajuan/$1';
// Sub Menu Review
$route['agendaris/administrasi/review']                       = 'agendaris/ControllerAdministrasi/review';
$route['agendaris/administrasi/detailreview/(:any)']          = 'agendaris/ControllerAdministrasi/detailreview/$1';
// Sub Menu Diterima dan Ditolak
$route['agendaris/administrasi/diterima']                       = 'agendaris/ControllerAdministrasi/diterima';
$route['agendaris/administrasi/detailditerima/(:any)']          = 'agendaris/ControllerAdministrasi/detailditerima/$1';
$route['agendaris/administrasi/ditolak']                        = 'agendaris/ControllerAdministrasi/ditolak';
$route['agendaris/administrasi/detailditolak/(:any)']           = 'agendaris/ControllerAdministrasi/detailditolak/$1';

// Sub Menu Berita Acara
$route['agendaris/administrasi/berita_acara/(:any)']          = 'agendaris/COntrollerAdministrasi/berita_acara/$1';

// PPK
// Menu Beranda
$route['ppk']                                                 = 'ppk/ControllerBeranda/index';
$route['ppk/beranda']                                         = 'ppk/ControllerBeranda/index';
// Menu Administrasi
$route['ppk/administrasi']                                    = 'ppk/ControllerAdministrasi/index';
// Sub Menu Pengajuan
$route['ppk/administrasi/pengajuan']                          = 'ppk/ControllerAdministrasi/pengajuan';
$route['ppk/administrasi/detailpengajuan/(:any)']             = 'ppk/ControllerAdministrasi/detailpengajuan/$1';
$route['ppk/administrasi/crudpengajuan']                      = 'ppk/ControllerAdministrasi/crudpengajuan';
// Sub Menu Pengajuan
$route['ppk/administrasi/review']                             = 'ppk/ControllerAdministrasi/review';
$route['ppk/administrasi/detailreview/(:any)']                = 'ppk/ControllerAdministrasi/detailreview/$1';
$route['ppk/administrasi/berita_acara/(:any)']                = 'ppk/COntrollerAdministrasi/berita_acara/$1';
// Menu Profile
$route['ppk/profile']                                         = 'ppk/ControllerProfile/index';
$route['ppk/crudprofile']                                     = 'ppk/ControllerProfile/crudprofile';

// POKJA
// Menu Beranda
$route['pokja']                                               = 'pokja/ControllerBeranda/index';
$route['pokja/beranda']                                       = 'pokja/ControllerBeranda/index';
// Menu Administrasi
$route['pokja/administrasi']                                  = 'pokja/ControllerAdministrasi/index';
// Sub Menu Administrasi->Review
$route['pokja/administrasi/review']                           = 'pokja/ControllerAdministrasi/review';
$route['pokja/administrasi/detail_review/(:any)']             = 'pokja/ControllerAdministrasi/detail_review/$1';
$route['pokja/administrasi/crudreview']                       = 'pokja/ControllerAdministrasi/crudreview';
$route['pokja/administrasi/berita_acara/(:any)']              = 'pokja/COntrollerAdministrasi/berita_acara/$1';
// Menu Profile
$route['pokja/profile']                                       = 'pokja/ControllerProfile/index';
$route['pokja/crudprofile']                                   = 'pokja/ControllerProfile/crudprofile';
