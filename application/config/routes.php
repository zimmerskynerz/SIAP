<?php
defined('BASEPATH') or exit('No direct script access allowed');


$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// Menu Untuk Login
$route['login']                                               = 'ControllerLogin/index';
$route['cek_login']                                           = 'ControllerLogin/cek_login';
$route['logout']                                              = 'ControllerLogin/logout';
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
