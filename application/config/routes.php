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
$route['default_controller'] = 'login';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['login'] = 'login';
$route['fungsilogin'] = 'login/fungsiLogin';

$route['admin'] = 'admin';
$route['logout'] = 'admin/fungsiLogout';

$route['barangmasuk'] = 'admin/barangMasuk';
$route['fungsibarangmasuk'] = 'admin/fungsibarangMasuk';

$route['barangkeluar'] = 'admin/barangKeluar';
$route['fungsibarangkeluar'] = 'admin/fungsibarangKeluar';
$route['barangkeluar2'] = 'admin/barangKeluar2';
$route['fungsibarangkeluar2'] = 'admin/fungsibarangKeluar2';

$route['kelolaakun'] = 'admin/kelolaAkun';
$route['hapusakun/(:any)'] = 'admin/fungsihapusAkun/(:any)';
$route['tambahakun'] = 'admin/tambahAkun';
$route['fungsitambahakun'] = 'admin/fungsitambahAkun';
$route['resetpasswordakun/(:any)'] = 'admin/resetpasswordAkun/(:any)';
$route['fungsiresetpasswordakun/(:any)'] = 'admin/fungsiresetpasswordAkun/(:any)';

$route['lihatstok/(:any)'] = 'admin/lihatStok/(:any)';
$route['editstok/(:any)/(:any)'] = 'admin/editStok/(:any)/(:any)';
$route['fungsieditstok/(:any)'] = 'admin/fungsieditStok/(:any)';
$route['fungsihapusbarang/(:any)/(:any)'] = 'admin/fungsihapusBarang/(:any)/(:any)';

$route['ubahpasswordakun'] = 'admin/ubahPasswordakun';
$route['fungsiubahpasswordakun'] = 'admin/fungsiubahPasswordakun';

$route['kelolagudang'] = 'admin/kelolaGudang';
$route['tambahgudang'] = 'admin/tambahGudang';
$route['fungsitambahgudang'] = 'admin/fungsitambahGudang';
$route['fungsihapusgudang/(:any)'] = 'admin/fungsihapusGudang/(:any)';

$route['kelolalokasi'] = 'admin/kelolaLokasi';
$route['tambahlokasi'] = 'admin/tambahLokasi';
$route['fungsitambahlokasi'] = 'admin/fungsitambahLokasi';
$route['fungsihapuslokasi/(:any)'] = 'admin/fungsihapusLokasi/(:any)';
$route['ubahlokasi/(:any)'] = 'admin/ubahLokasi/(:any)';
$route['fungsiubahlokasi/(:any)'] = 'admin/fungsiubahLokasi/(:any)';

$route['laporanstok/(:any)'] = 'admin/laporanStok/(:any)';
$route['cetaklaporanstok'] = 'admin/cetakpdflaporanStok';

$route['laporanbarang/(:any)'] = 'admin/laporanBarang/(:any)';

$route['kelolapetugas'] = 'admin/kelolaPetugas';
$route['fungsiubahnamapetugas'] = 'admin/fungsiubahnamaPetugas';

$route['notif'] = 'admin/Notif';
$route['konfirnotif/(:any)'] = 'admin/Konfirnotif/(:any)';
$route['fungsikonfirnotif/(:any)'] = 'admin/Fungsikonfirnotif/(:any)';