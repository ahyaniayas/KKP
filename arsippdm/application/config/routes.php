<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
// $route['default_controller'] = 'welcome';
$route['default_controller'] = 'indexCont';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// custom routes

// login
$route['login'] = 'loginCont';
$route['login-aksi'] = 'loginCont/loginAksi';

// user
$route['user'] = 'user/userCont/user';
$route['tbl-user'] = 'user/userCont/userTbl';
$route['tambah-user'] = 'user/userCont/userTambah';
$route['tambah-user-aksi'] = 'user/userCont/userTambahAksi';
$route['(:any)/edit-user'] = 'user/userCont/userEdit/$1';
$route['edit-user-aksi'] = 'user/userCont/userEditAksi';
$route['(:any)/hapus-user'] = 'user/userCont/userHapus/$1';
$route['hapus-user-aksi'] = 'user/userCont/userHapusAksi';
$route['(:any)/lihat-user'] = 'user/userCont/userLihat/$1';
// end user

// jadwal
$route['jadwal'] = 'jadwal/jadwalCont/jadwal';
$route['tbl-jadwal'] = 'jadwal/jadwalCont/jadwalTbl';
$route['tambah-jadwal'] = 'jadwal/jadwalCont/jadwalTambah';
$route['tambah-jadwal-aksi'] = 'jadwal/jadwalCont/jadwalTambahAksi';
$route['(:any)/edit-jadwal'] = 'jadwal/jadwalCont/jadwalEdit/$1';
$route['edit-jadwal-aksi'] = 'jadwal/jadwalCont/jadwalEditAksi';
$route['(:any)/hapus-jadwal'] = 'jadwal/jadwalCont/jadwalHapus/$1';
$route['hapus-jadwal-aksi'] = 'jadwal/jadwalCont/jadwalHapusAksi';
$route['(:any)/lihat-jadwal'] = 'jadwal/jadwalCont/jadwalLihat/$1';
// end jadwal

// detail jadwal
$route['(:any)/jadwal'] = 'jadwal/jadwalDetailCont/detail/$1';
$route['(:any)/tbl-jadwal'] = 'jadwal/jadwalDetailCont/tbl/$1';
$route['(:any)/tambah-jadwal'] = 'jadwal/jadwalDetailCont/tambah/$1';
$route['tambah-jadwal-detail-aksi'] = 'jadwal/jadwalDetailCont/tambahAksi';
$route['(:any)/edit-jadwal-detail'] = 'jadwal/jadwalDetailCont/edit/$1';
$route['edit-jadwal-detail-aksi'] = 'jadwal/jadwalDetailCont/editAksi';
$route['(:any)/hapus-jadwal-detail'] = 'jadwal/jadwalDetailCont/hapus/$1';
$route['hapus-jadwal-detail-aksi'] = 'jadwal/jadwalDetailCont/hapusAksi';
$route['(:any)/lihat-jadwal-detail'] = 'jadwal/jadwalDetailCont/lihat/$1';
$route['(:any)/terkumpul-jadwal-detail'] = 'jadwal/jadwalDetailCont/iuranTerkumpul/$1';
$route['cetak/(:any)-(:any)'] = 'report/reportCont/jadwal/$1';
// end detail jadwal

// arsip
$route['arsip'] = 'arsip/arsipCont/arsip';
$route['tbl-arsip'] = 'arsip/arsipCont/tbl';
$route['tambah-arsip'] = 'arsip/arsipCont/tambah';
$route['tambah-arsip-aksi'] = 'arsip/arsipCont/tambahAksi';
$route['(:any)/edit-arsip'] = 'arsip/arsipCont/edit/$1';
$route['(:any)/lihat-arsip'] = 'arsip/arsipCont/lihat/$1';
$route['edit-arsip-aksi'] = 'arsip/arsipCont/editAksi';
$route['(:any)/hapus-arsip'] = 'arsip/arsipCont/hapus/$1';
$route['hapus-arsip-aksi'] = 'arsip/arsipCont/hapusAksi';

$route['arsip/(:any)'] = 'arsip/arsipCont/surat/$1';
$route['(:any)/tbl-surat'] = 'arsip/arsipCont/tblSurat/$1';
$route['(:any)/tambah-surat'] = 'arsip/arsipCont/tambahSurat/$1';
$route['tambah-surat-aksi'] = 'arsip/arsipCont/tambahSuratAksi';
$route['(:any)/edit-surat'] = 'arsip/arsipCont/editSurat/$1';
$route['(:any)/lihat-surat'] = 'arsip/arsipCont/lihatSurat/$1';
$route['edit-surat-aksi'] = 'arsip/arsipCont/editSuratAksi';
$route['(:any)/hapus-surat'] = 'arsip/arsipCont/hapusSurat/$1';
$route['hapus-surat-aksi'] = 'arsip/arsipCont/hapusSuratAksi';
$route['(:any)/downsurat'] = 'arsip/arsipCont/downloadSurat/$1';
$route['(:any)/laporansurat/(:any).pdf'] = 'report/reportCont/surat/$1';
// end surat

// password
$route['(:any)/gantipassword'] = 'user/passCont/gantiPass/$1';
$route['gantipassword-aksi'] = 'user/passCont/gantiPassAksi';
// end password

// tampilan
$route['tampilan'] = 'tampilan/tampilanCont/tampilan';
$route['tbl-tampilan'] = 'tampilan/tampilanCont/tbl';
$route['tampilan-aksi'] = 'tampilan/tampilanCont/tampilanAksi';
// end tampilan