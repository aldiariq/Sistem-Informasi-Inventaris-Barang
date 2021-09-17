<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	//Konstruktor Untuk Controller Admin
	public function __construct()
	{
		parent::__construct();
		//Memeriksa Apakah Session Sudah Terisi Atau Belum, Jika Pengguna Belum Melakukan Login
		//dan Langsung Mengakses Halaman Dashboard Maka Pengguna Langsung Dialihkan Ke Halaman Login Untuk Mengatasi Unauthorized Access
		if ($this->session->userdata('idakun') == '' AND $this->session->userdata('status') == '') {
			//Mengalihkan Pengguna Ke Halaman Login
			redirect('login','refresh');
		}else {
			//Jika Session Sudah Terisi Maka Model Admin Akan Dimuat
			$this->load->model('ModelAdmin');
		}
	}

	//Fungsi Ini Digunakan Untuk Menampilkan Halaman Dashboard Pengguna
	public function index()
	{	
		//Menampung Id Akun Yang Telah Ditampung ke Dalam Session
		$idakun = $this->session->userdata('idakun');

		//Membuat Array Dengan Nama Where Untuk Mencari Data Akun Tersebut
		//(Username dan Akses)
		$where = array('id' => $idakun);

		//Menampung Data Akun Yang Dicari ke Dalam Array
		//Menampung Semua Data Gudang ke Dalam Array
		$data = array(
			'akun' => $this->ModelAdmin->ambilAkun($where),
			'gudang' => $this->ModelAdmin->ambilGudang(),
			'wilayah' => $this->ModelAdmin->fungsiambilWilayah(),
			'lokasi' => $this->ModelAdmin->fungsiambilsemuaLokasi(),
			'jumlahgudang' => $this->ModelAdmin->jumlahGudang(),
			'jumlahlokasi' => $this->ModelAdmin->jumlahWilayah(),
			'jumlahstasiun' => $this->ModelAdmin->jumlahStasiun(),
			'jumlahakun' => $this->ModelAdmin->jumlahAkun());
		
		$this->session->set_userdata( $data );

		//Memuat Header Halaman dan Mengirimkan Data Yang Ditampung
		$this->load->view('tamplates_admin/header', $data);
		//Memuat Sidebar Halaman(Menu) dan Mengirimkan Data Yang Ditampung
		$this->load->view('tamplates_admin/sidebar', $data);
		//Memuat Body Halaman dan Mengirimkan Data Yang Ditampung
		$this->load->view('admin/index', $data);

		//Menampung Semua Data Gudang ke Dalam Array
		$gudang = $this->ModelAdmin->ambilGudang();

		foreach ($gudang as $datagudang) {
			$rincianstok = array(
				'namagudang' => $datagudang->namagudang,
				'rincianstok' => $this->ModelAdmin->rincianStok($datagudang->namagudang) );
			//Memuat Halaman Stok Paling Sedikit di Gudang Tersebut ke Halaman Utama
			$this->load->view('tamplates_admin/rincianstok', $rincianstok);
		}

		//Menampung Nama Gudang dan Stok Paling Sedikit di Gudang Tersebut
		//ke Dalam Array
		foreach ($gudang as $datagudang) {
			$datastok = array(
				'namagudang' => $datagudang->namagudang,
				'stoksedikit' => $this->ModelAdmin->index($datagudang->namagudang) );
			//Memuat Halaman Stok Paling Sedikit di Gudang Tersebut ke Halaman Utama
			$this->load->view('tamplates_admin/stoksedikit', $datastok);
		}
		//Memuat Footer Halaman
		$this->load->view('tamplates_admin/footer');
	}

	//Fungsi Ini Digunakan Untuk Menampilkan Form Input Barang ke Gudang Tertentu
	public function barangMasuk()
	{
		//Menampung Id Akun Yang Telah Ditampung ke Dalam Session
		$idakun = $this->session->userdata('idakun');

		//Membuat Array Dengan Nama Where Untuk Mencari Data Akun Tersebut
		//(Username dan Akses)
		$where = array('id' => $idakun);

		//Menampung Data Akun Yang Dicari ke Dalam Array
		//Menampung Semua Data Gudang ke Dalam Array
		$data = array(
			'akun' => $this->ModelAdmin->ambilAkun($where),
			'gudang' => $this->ModelAdmin->ambilGudang(),
			'wilayah' => $this->ModelAdmin->fungsiambilWilayah(),
			'lokasi' => $this->ModelAdmin->fungsiambilsemuaLokasi(),);

		//Memuat Header Halaman dan Mengirimkan Data Yang Ditampung
		$this->load->view('tamplates_admin/header', $data);
		//Memuat Sidebar Halaman(Menu) dan Mengirimkan Data Yang Ditampung
		$this->load->view('tamplates_admin/sidebar', $data);
		//Memuat Body Halaman dan Mengirimkan Data Yang Ditampung
		//Untuk Menginputkan Barang ke Gudang Tertentu
		$this->load->view('admin/barangmasuk', $data);
		//Memuat Footer Halaman
		$this->load->view('tamplates_admin/footer');
	}

	//Fungsi Ini Digunakan Untuk Menginputkan Data Barang yang Diinputkan
	//ke Dalam Database 
	public function fungsibarangMasuk()
	{
		//Menampung Atribut Barang Yang Diinputkan Lewat Form
		//Seperti Kategori, Merel , Dll
		$np = $this->input->post('np');
		$kategori = $this->input->post('kategori');
		$merek = $this->input->post('merek');
		$nama = $this->input->post('nama');
		$sn = $this->input->post('sn');
		$noinventaris = $this->input->post('noinventaris');
		$namagudang = $this->input->post('lokasigudang');
		$keterangan = $this->input->post('keterangan');

		//Menampung Atribut Barang Yang Diinputkan ke Dalam Array
		$data = array(
			'np' => $np,
			'kategori' => $kategori,
			'nama' => $nama,
			'merek' => $merek,
			'sn' => $sn,
			'noinventaris' => $noinventaris,
			'namagudang' => $namagudang,
			'lokasibarang' => $namagudang,
			'keterangan' => $keterangan
		);

		//Memanggil Fungsi Untuk Menginputkan Data Barang Ke Database
		//yang Ada Pada Model Admin dengan Parameter Array yang Berisi
		//Atribut yang Telah Ditampung
		$this->ModelAdmin->fungsibarangMasuk($data);

		//Mengalihkan Pengguna ke Halaman Form Input Barang
		redirect('barangmasuk','refresh');
	}

	//Fungsi Ini Digunakan Untuk Menampilkan Form Peminjaman/Mutasi
	//Barang ke Gudang Tertentu
	public function barangKeluar()
	{
		//Menampung Id Akun Yang Telah Ditampung ke Dalam Session
		$idakun = $this->session->userdata('idakun');

		//Membuat Array Dengan Nama Where Untuk Mencari Data Akun Tersebut
		//(Username dan Akses)
		$where = array('id' => $idakun);

		//Menampung Data Akun Yang Dicari ke Dalam Array
		//Menampung Semua Data Gudang ke Dalam Array
		//Menampung Semua Data Barang ke Dalam Array
		$data = array(
			'akun' => $this->ModelAdmin->ambilAkun($where),
			'gudang' => $this->ModelAdmin->ambilGudang(),
			'wilayah' => $this->ModelAdmin->fungsiambilWilayah(),
			'lokasi' => $this->ModelAdmin->fungsiambilsemuaLokasi(),
			'barang' => $this->ModelAdmin->fungsiambilsemuaBarang());

		//Memuat Header Halaman dan Mengirimkan Data Yang Ditampung
		$this->load->view('tamplates_admin/header', $data);
		//Memuat Sidebar Halaman(Menu) dan Mengirimkan Data Yang Ditampung
		$this->load->view('tamplates_admin/sidebar', $data);
		//Memuat Halaman Form Peminjaman dan Mengirimkan Data Yang Ditampung
		//Untuk Meminjam Barang ke Gudang Tertentu
		$this->load->view('admin/barangkeluar', $data);
		//Memuat Footer Halaman
		$this->load->view('tamplates_admin/footer');
	}

	//Fungsi Ini Digunakan Untuk Menampung Data Yang Diinputkan Pada Form
	//Peminjaman Barang
	public function fungsibarangKeluar()
	{
		//Menampung Atribut Peminjaman Barang Seperti Nama Gudang,
		//Serial Number Barang, Dll
		$namagudang = $this->input->post('lokasigudang');
		$sn = $this->input->post('sn');
		$namabarang = $this->input->post('namabarang');
		$np = $this->input->post('np'); 
		$kdgudang = $this->input->post('kdgudang'); 

		//Menampung Semua Atribut ke Dalam Session Yang Nantinya Akan Diproses
		//di Form Barang Keluar Lanjutan
		$databarang = array(
			'namagudang' => $namagudang,
			'sn' => $sn,
			'namabarang' => $namabarang,
			'np' => $np,
			'kdgudang' => $kdgudang
		);
		$this->session->set_userdata( $databarang );

		//Mengalihkan Pengguna ke Form Peminjaman Barang Lanjutan
		redirect('barangkeluar2','refresh');
	}

	//Fungsi Ini Digunakan Untuk Menampilkan Form Lanjutan Peminjaman/Mutasi
	//Barang ke Gudang Tertentu
	public function barangKeluar2()
	{
		//Menampung Id Akun Yang Telah Ditampung ke Dalam Session
		$idakun = $this->session->userdata('idakun');

		//Membuat Array Dengan Nama Where Untuk Mencari Data Akun Tersebut
		//(Username dan Akses)
		$where = array('id' => $idakun);

		//Menampung Data Akun Yang Dicari ke Dalam Array
		//Menampung Semua Data Gudang ke Dalam Array
		//Menampung Semua Data Barang ke Dalam Array
		$data = array(
			'akun' => $this->ModelAdmin->ambilAkun($where),
			'gudang' => $this->ModelAdmin->ambilGudang(),
			'wilayah' => $this->ModelAdmin->fungsiambilWilayah(),
			'barang' => $this->ModelAdmin->fungsiambilsemuaBarang(),
			'petugas' => $this->ModelAdmin->ambilPetugas(),
			'lokasi' => $this->ModelAdmin->fungsiambilsemuaLokasi());

		//Memuat Header Halaman dan Mengirimkan Data Yang Ditampung
		$this->load->view('tamplates_admin/header', $data);
		//Memuat Sidebar Halaman(Menu) dan Mengirimkan Data Yang Ditampung
		$this->load->view('tamplates_admin/sidebar', $data);
		//Memuat Halaman Form Peminjaman dan Mengirimkan Data Yang Ditampung
		//Untuk Meminjam Barang ke Gudang Tertentu
		$this->load->view('admin/barangkeluar2', $data);
		//Memuat Footer Halaman
		$this->load->view('tamplates_admin/footer');
	}

	//Fungsi Ini Digunakan Untuk Menampung Data Yang Diinputkan Pada Form
	//Peminjaman Barang dan Menginputkan-nya ke Database
	public function fungsibarangKeluar2()
	{
		//Menampung Atribut Peminjaman Barang Seperti Nama Petugas,
		//Serial Number Barang, Dll
		$namapetugas = $this->input->post('peminjam');
		$tanggal = $this->input->post('tanggal');
		$peminjam = $this->input->post('peminjam');
		$namagudang = $this->session->userdata('namagudang');
		$namagudangtujuan = $this->input->post('gudangtujuan');
		$namalokasitujuan = $this->input->post('lokasitujuan');
		$keterangan = $this->input->post('keterangan');
		$np = $this->session->userdata('np');
		$sn = $this->session->userdata('sn');
		$namabarang = $this->session->userdata('namabarang');

		$carigudang = array('namagudang' => $namagudangtujuan );
		$gudang = $this->ModelAdmin->ambilGudang2($carigudang);

		foreach ($gudang as $datagudang) {
			if ($datagudang->namagudang == $namagudangtujuan) {
				$kdgudang = $datagudang->id;
			}
			
		}

		if ($namagudangtujuan == "-") {
			//Menampung Atribut Peminjaman Barang ke Dalam Array
			$data = array(
				'namapetugas' => $namapetugas,
				'tanggal' => $tanggal,
				'peminjam' => $peminjam,
				'namagudang' => $namagudang,
				'namalokasitujuan' => $namalokasitujuan,
				'keterangan' => $keterangan,
				'np' => $np,
				'snbarang' => $sn,
				'namabarang' => $namabarang);

			$notif = array(
				'tanggal' => $tanggal,
				'asalstok' => $namagudang,
				'lokasitujuan' => $namalokasitujuan,
				'peminjam' => $peminjam,
				'snbarang' => $sn,
				'namabarang' => $namabarang,
				'keterangan' => $keterangan,
				'statusadmin' => 0,
				'statususer' => 0,
				'kd_gudang' => $kdgudang);

			$this->ModelAdmin->fungsiNotif($notif);

			//Membuat Array yang Berisi Gudang Tujuan Untuk
			//Memindahkan Barang yang Dipilih ke Gudang Tersebut
			$gudang = array(
				'namagudang' => $namagudangtujuan,
				'lokasibarang' => $namalokasitujuan);
		}else if ($namalokasitujuan == "-") {
			//Menampung Atribut Peminjaman Barang ke Dalam Array
			$data = array(
				'namapetugas' => $namapetugas,
				'tanggal' => $tanggal,
				'peminjam' => $peminjam,
				'namagudang' => $namagudang,
				'namalokasitujuan' => $namagudangtujuan,
				'keterangan' => $keterangan,
				'np' => $np,
				'snbarang' => $sn,
				'namabarang' => $namabarang);

			//Membuat Array yang Berisi Gudang Tujuan Untuk
			//Memindahkan Barang yang Dipilih ke Gudang Tersebut
			$gudang = array(
				'namagudang' => $namagudangtujuan,
				'lokasibarang' => $namagudangtujuan);
		}else if($namagudangtujuan != "-" && $namalokasitujuan != "-") {
			//Menampung Atribut Peminjaman Barang ke Dalam Array
			$data = array(
				'namapetugas' => $namapetugas,
				'tanggal' => $tanggal,
				'peminjam' => $peminjam,
				'namagudang' => $namagudang,
				'namalokasitujuan' => $namalokasitujuan,
				'keterangan' => $keterangan,
				'np' => $np,
				'snbarang' => $sn,
				'namabarang' => $namabarang);

			$notif = array(
				'tanggal' => $tanggal,
				'asalstok' => $namagudang,
				'lokasitujuan' => $namalokasitujuan,
				'peminjam' => $peminjam,
				'snbarang' => $sn,
				'namabarang' => $namabarang,
				'keterangan' => $keterangan,
				'statusadmin' => 0,
				'statususer' => 0,
				'kd_gudang' => $kdgudang);

			$this->ModelAdmin->fungsiNotif($notif);

			//Membuat Array yang Berisi Gudang Tujuan Untuk
			//Memindahkan Barang yang Dipilih ke Gudang Tersebut
			$gudang = array(
				'namagudang' => $namagudangtujuan,
				'lokasibarang' => $namalokasitujuan);
		}else if ($namagudangtujuan != $namagudang && $namalokasitujuan != "-") {
			//Menampung Atribut Peminjaman Barang ke Dalam Array
			$data = array(
				'namapetugas' => $namapetugas,
				'tanggal' => $tanggal,
				'peminjam' => $peminjam,
				'namagudang' => $namagudangtujuan,
				'namalokasitujuan' => $namalokasitujuan,
				'keterangan' => $keterangan,
				'np' => $np,
				'snbarang' => $sn,
				'namabarang' => $namabarang);

			//Membuat Array yang Berisi Gudang Tujuan Untuk
			//Memindahkan Barang yang Dipilih ke Gudang Tersebut
			$gudang = array(
				'namagudang' => $namagudangtujuan,
				'lokasibarang' => $namalokasitujuan);
		}else {
			$data = array(
				'namapetugas' => $namapetugas,
				'tanggal' => $tanggal,
				'peminjam' => $peminjam,
				'namagudang' => $namagudang,
				'namalokasitujuan' => $namalokasitujuan,
				'keterangan' => $keterangan,
				'norab' => $norab,
				'snbarang' => $sn,
				'namabarang' => $namabarang);

			//Membuat Array yang Berisi Gudang Tujuan Untuk
			//Memindahkan Barang yang Dipilih ke Gudang Tersebut
			$gudang = array(
				'namagudang' => $namagudangtujuan,
				'lokasibarang' => $namalokasitujuan);
		}

		
		//Membuat Array yang Berisi SN Barang Tersebut Untuk
		//Memindahkan ke Gudang Tujuan
		$where = array(
			'sn' => $sn );

		//Memanggil Fungsi Untuk Proses Peminjaman/Mutasi Barang
		//dengan Parameter Berupa Data Barang, SN Barang, dan Gudang Tujuan
		$this->ModelAdmin->fungsibarangKeluar($data, $where, $gudang);

		//Mengalihkan Pengguna ke Halaman Stok Gudang Tujuan
		if ($namagudangtujuan != '-') {
			redirect('lihatstok/'.urldecode($namagudangtujuan),'refresh');
		}else {
			redirect('lihatstok/'.urldecode($namagudang),'refresh');
		}
		
	}

	//Fungsi Ini Digunakan Untuk Menampilkan Halaman yang Berisi Semua Stok Barang
	//di Gudang Tertentu
	public function lihatStok()
	{
		//Menampung Id Akun Yang Telah Ditampung ke Dalam Session
		$idakun = $this->session->userdata('idakun');
		//Membuat Array Dengan Nama Where Untuk Mencari Data Akun Tersebut
		//(Username dan Akses)
		$where = array('id' => $idakun);

		//Menampung Nama Gudang yang Didapatkan dari URL
		$namagudang = urldecode($this->uri->segment(2));
		//Membuat Array Dengan Nama Where Untuk Mencari Barang Dari Gudang Tersebut
		$wheresatu = array('namagudang' => $namagudang);
		$wheredua = array('lokasibarang' => $namagudang);


		//Menampung Data Akun Yang Dicari ke Dalam Array
		//Menampung Nama Gudang Tersebut
		//Menampung Semua Data Gudang ke Dalam Array
		//Menampung Semua Data Barang di Gudang Tersebut ke Dalam Array
		$data = array(
			'akun' => $this->ModelAdmin->ambilAkun($where),
			'namagudang' => $namagudang,
			'gudang' => $this->ModelAdmin->ambilGudang(),
			'wilayah' => $this->ModelAdmin->fungsiambilWilayah(),
			'lokasi' => $this->ModelAdmin->fungsiambilsemuaLokasi(),
			'barang' => $this->ModelAdmin->fungsiambilBarang($wheresatu, $wheredua));

		//Memuat Header Halaman dan Mengirimkan Data Yang Ditampung
		$this->load->view('tamplates_admin/header', $data);
		//Memuat Sidebar Halaman(Menu) dan Mengirimkan Data Yang Ditampung
		$this->load->view('tamplates_admin/sidebar', $data);
		//Memuat Halaman Stok Barang di Gudang Tersebut
		$this->load->view('admin/stokbarang', $data);
		//Memuat Footer Halaman
		$this->load->view('tamplates_admin/footer');
	}

	//Fungsi Ini Digunakan Untuk Menampilkan Halaman Ubah Data Barang
	//(Nama, Serial, No Inventaris, Dll) yang Dipilih
	public function editStok()
	{
		//Menampung Id Akun Yang Telah Ditampung ke Dalam Session
		$idakun = $this->session->userdata('idakun');
		//Membuat Array Dengan Nama Where Untuk Mencari Data Akun Tersebut
		//(Username dan Akses)
		$where = array('id' => $idakun);

		//Menampung Id Barang yang Ingin Diubah Datanya dari URL
		$idbarang = $this->uri->segment(3);
		//Membuat Array Dengan Nama Where Untuk Mencari Data Barang Tersebut
		$where2 = array('id' => $idbarang );

		//Menampung Data Akun Yang Dicari ke Dalam Array
		//Menampung Semua Data Gudang ke Dalam Array
		//Menampung Semua Data Barang Tersebut ke Dalam Array
		$data = array(
			'akun' => $this->ModelAdmin->ambilAkun($where),
			'gudang' => $this->ModelAdmin->ambilGudang(),
			'wilayah' => $this->ModelAdmin->fungsiambilWilayah(),
			'lokasi' => $this->ModelAdmin->fungsiambilsemuaLokasi(),
			'barang' => $this->ModelAdmin->fungsiambilBarang($where2, $where2));

		//Memuat Header Halaman dan Mengirimkan Data Yang Ditampung
		$this->load->view('tamplates_admin/header', $data);
		//Memuat Sidebar Halaman(Menu) dan Mengirimkan Data Yang Ditampung
		$this->load->view('tamplates_admin/sidebar', $data);
		//Memuat Halaman Stok Barang di Gudang Tersebut
		$this->load->view('admin/editstok', $data);
		//Memuat Footer Halaman
		$this->load->view('tamplates_admin/footer');
	}

	//Fungsi Ini Digunakan Untuk Menyimpan Perubahan dari Barang yang Diedit
	//ke Dalam Database
	public function fungsieditstok()
	{
		//Menampung Id Barang yang Akan Diedit dari URL
		$idbarang = $this->uri->segment(2);
		//Membuat Array yang Berisi Id Barang Tersebut
		$where = array('id' => $idbarang );

		//Menampung Artribut yang Diperlukan untuk Mengedit Barang
		$kategori = $this->input->post('kategori');
		$merek = $this->input->post('merek');
		$nama = $this->input->post('nama');
		$sn = $this->input->post('sn');
		$noinventaris = $this->input->post('noinventaris');
		$lokasigudang = $this->input->post('lokasigudang');
		$keterangan = $this->input->post('keterangan');

		//Menampung Semua Atribut yang Diperlukan ke Dalam Array
		$data = array(
			'kategori' => $kategori,
			'merek' => $merek,
			'nama' => $nama,
			'sn' => $sn,
			'noinventaris' => $noinventaris,
			'namagudang' => $lokasigudang,
			'keterangan' => $keterangan);

		//Memanggil Fungsi Untuk Untuk Menyimpan Perubahan dari Barang yang Diedit
		//ke Dalam Database
		$this->ModelAdmin->fungsieditstok($where, $data);
		//Mengalihkan Pengguna ke Halaman Lihat Stok dari Gudang Barang Tersebut
		redirect('lihatstok/'.$lokasigudang,'refresh');
	}

	//Fungsi Ini Digunakan Untuk Menghapus Barang Tertentu yang Ada di Dalam Stok(Gudang)
	public function fungsihapusBarang()
	{
		//Menampung Id Barang yang Akan Diedit dari URL
		$idbarang = $this->uri->segment(3);
		//Membuat Array yang Berisi Id Barang Tersebut
		$where = array('id' => $idbarang );
		//Menampung Nama Gudang Barang yang Akan Diedit dari URL
		$namagudang = rawurldecode($this->uri->segment(2));

		//Memanggil Fungsi Untuk Untuk Menghapus Barang Tersebut
		$this->ModelAdmin->fungsihapusBarang($where);

		//Mengalihkan Pengguna ke Halaman Lihat Stok dari Gudang Barang Tersebut
		redirect('lihatstok/'.$namagudang,'refresh');
	}

	//Fungsi Ini Digunakan Untuk Melihat Laporan Barang di Gudang Tertentu
	//(Melihat Barang dari Gudang Tersebut)
	public function laporanBarang()
	{
		//Menampung Id Akun Yang Telah Ditampung ke Dalam Session
		$idakun = $this->session->userdata('idakun');
		//Membuat Array Dengan Nama Where Untuk Mencari Data Akun Tersebut
		//(Username dan Akses)
		$where = array('id' => $idakun);

		//Menampung Nama Gudang yang Didapatkan dari URL
		$namagudang = rawurldecode($this->uri->segment(2));
		//Membuat Array Dengan Nama Where Untuk Melihat Laporan Dari Gudang Tersebut
		$wheresatu = array('namagudang' => $namagudang);
		$wheredua = array('lokasibarang' => $namagudang);

		//Menampung Data Akun Yang Dicari ke Dalam Array
		//Menampung Nama Gudang Tersebut
		//Menampung Semua Data Gudang ke Dalam Array
		//Menampung Laporan dari Gudang Tersebut ke Dalam Array
		$data = array(
			'akun' => $this->ModelAdmin->ambilAkun($where),
			'namagudang' => $namagudang,
			'gudang' => $this->ModelAdmin->ambilGudang(),
			'wilayah' => $this->ModelAdmin->fungsiambilWilayah(),
			'lokasi' => $this->ModelAdmin->fungsiambilsemuaLokasi(),
			'barang' => $this->ModelAdmin->fungsiambilBarang($wheresatu, $wheredua));

		//Memuat Header Halaman dan Mengirimkan Data Yang Ditampung
		$this->load->view('tamplates_admin/header', $data);
		//Memuat Sidebar Halaman(Menu) dan Mengirimkan Data Yang Ditampung
		$this->load->view('tamplates_admin/sidebar', $data);
		//Memuat Halaman Laporan dari Gudang Tersebut
		$this->load->view('admin/laporanbarang', $data);
		//Memuat Footer Halaman
		$this->load->view('tamplates_admin/footer');
	}

	//Fungsi Ini Digunakan Untuk Melihat Laporan Stok di Gudang Tertentu
	//(Melihat Barang Keluar dari Gudang Tersebut)
	public function laporanStok()
	{
		//Menampung Id Akun Yang Telah Ditampung ke Dalam Session
		$idakun = $this->session->userdata('idakun');
		//Membuat Array Dengan Nama Where Untuk Mencari Data Akun Tersebut
		//(Username dan Akses)
		$where = array('id' => $idakun);

		//Menampung Nama Gudang yang Didapatkan dari URL
		$namagudang = rawurldecode($this->uri->segment(2));
		//Membuat Array Dengan Nama Where Untuk Melihat Laporan Dari Gudang Tersebut
		$where2 = array('namagudang' => $namagudang);

		//Menampung Data Akun Yang Dicari ke Dalam Array
		//Menampung Nama Gudang Tersebut
		//Menampung Semua Data Gudang ke Dalam Array
		//Menampung Laporan dari Gudang Tersebut ke Dalam Array
		$data = array(
			'akun' => $this->ModelAdmin->ambilAkun($where),
			'namagudang' => $namagudang,
			'gudang' => $this->ModelAdmin->ambilGudang(),
			'wilayah' => $this->ModelAdmin->fungsiambilWilayah(),
			'lokasi' => $this->ModelAdmin->fungsiambilsemuaLokasi(),
			'barangkeluar' => $this->ModelAdmin->laporanStok($where2));

		//Memuat Header Halaman dan Mengirimkan Data Yang Ditampung
		$this->load->view('tamplates_admin/header', $data);
		//Memuat Sidebar Halaman(Menu) dan Mengirimkan Data Yang Ditampung
		$this->load->view('tamplates_admin/sidebar', $data);
		//Memuat Halaman Laporan dari Gudang Tersebut
		$this->load->view('admin/laporanstok', $data);
		//Memuat Footer Halaman
		$this->load->view('tamplates_admin/footer');
	}

	//Fungsi Ini Digunakan Untuk Menampilkan Halaman Pengelolaan Akun
	//Seperti Menghapus dan Mereset Password Akun (Membutuhkan Hak Akses Admin)
	public function kelolaAkun()
	{
		//Menampung Id Akun Yang Telah Ditampung ke Dalam Session
		$idakun = $this->session->userdata('idakun');

		//Membuat Array Dengan Nama Where Untuk Mencari Data Akun Tersebut
		//(Username dan Akses)
		$where = array('id' => $idakun);

		//Menampung Data Akun Yang Dicari ke Dalam Array
		//Menampung Semua Data Gudang ke Dalam Array
		//Menampung Semua Data Pengguna ke Dalam Array
		$data = array(
			'akun' => $this->ModelAdmin->ambilAkun($where),
			'gudang' => $this->ModelAdmin->ambilGudang(),
			'wilayah' => $this->ModelAdmin->fungsiambilWilayah(),
			'lokasi' => $this->ModelAdmin->fungsiambilsemuaLokasi(),
			'pengguna' => $this->ModelAdmin->fungsiambilAkun());

		//Memuat Header Halaman dan Mengirimkan Data Yang Ditampung
		$this->load->view('tamplates_admin/header', $data);
		//Memuat Sidebar Halaman(Menu) dan Mengirimkan Data Yang Ditampung
		$this->load->view('tamplates_admin/sidebar',$data);
		//Memuat Halaman Form Pengelolaan Akun
		$this->load->view('admin/kelolaakun', $data);
		//Memuat Footer Halaman
		$this->load->view('tamplates_admin/footer');
	}

	//Fungsi Ini Digunakan Untuk Menghapus Akun Tertentu yang Dipilih
	//dari Database
	public function fungsihapusAkun()
	{
		//Menampung Id Akun Tertentu yang Didapatkan Dari Url
		//Saat Akun Tersebut Dipilih untuk Dihapus
		$idakun = $this->uri->segment(2);

		//Membuat Array Dengan Nama Where Untuk Menampung Id Akun
		//Tersebut
		$where = array('id' => $idakun );

		//Memanggil Fungsi Untuk Proses Penghapusan Akun Tersebut
		//dengan Array Sebagai Parameternya
		$this->ModelAdmin->fungsihapusAkun($where);

		//Mengalihkan Pengguna ke Halaman Pengelolaan Akun
		redirect('kelolaakun','refresh');
	}

	//Fungsi Ini Digunakan Untuk Menampilkan Halaman Form Penambahan Akun
	//Pengguna
	public function tambahAkun()
	{
		//Menampung Id Akun Yang Telah Ditampung ke Dalam Session
		$idakun = $this->session->userdata('idakun');

		//Membuat Array Dengan Nama Where Untuk Mencari Data Akun Tersebut
		//(Username dan Akses)
		$where = array('id' => $idakun);

		//Menampung Data Akun Yang Dicari ke Dalam Array
		//Menampung Semua Data Gudang ke Dalam Array
		//Menampung Semua Data Pengguna ke Dalam Array
		$data = array(
			'akun' => $this->ModelAdmin->ambilAkun($where),
			'gudang' => $this->ModelAdmin->ambilGudang(),
			'wilayah' => $this->ModelAdmin->fungsiambilWilayah(),
			'lokasi' => $this->ModelAdmin->fungsiambilsemuaLokasi(),
			'pengguna' => $this->ModelAdmin->fungsiambilAkun());

		//Memuat Header Halaman dan Mengirimkan Data Yang Ditampung
		$this->load->view('tamplates_admin/header', $data);
		//Memuat Sidebar Halaman(Menu) dan Mengirimkan Data Yang Ditampung
		$this->load->view('tamplates_admin/sidebar',$data);
		//Memuat Halaman Form Penambahan Akun Pengguna
		$this->load->view('admin/tambahakun');
		//Memuat Footer Halaman
		$this->load->view('tamplates_admin/footer');
	}

	//Fungsi Ini Digunakan Untuk Menambahkan Akun yang Telah Diinputkan
	//di Form Penambahan Akun ke Database
	public function fungsitambahAkun()
	{
		//Menampung Atribut yang Penambahan Akun Seperti Username, Password
		//dan Akses
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$password2 = $this->input->post('password2');
		$akses = $this->input->post('akses');
		$kdgudang = $this->input->post('kd_gudang');

		//Memeriksa Apakah Password yang Diinputkan Sama
		//Jika Tidak Sama Pengguna Akan Dialihkan Kembali
		//Ke Halaman Penambahan Akun
		if ($password != $password2) {
			redirect('tambahakun','refresh');
		}else {
			//Jika Sama Atribut yang Telah Diinputkan Akan Ditampung ke Array
			$data = array(
				'username' => $username,
				'password' => md5($password),
				'akses' => $akses,
				'kd_gudang' => $kdgudang);

			//Memanggil Fungsi Untuk Proses Penambahan Akun
			//dengan Array yang Berisi Atribut Sebagai Parameternya
			$this->ModelAdmin->fungsitambahAkun($data);
			//Mengalihkan Pengguna ke Halaman Pengelolaan Akun
			redirect('admin/kelolaakun','refresh');
		}
	}

	//Fungsi Ini Digunakan Untuk Menampilkan Halaman Form Reset Password Akun
	//Pengguna Tertentu Yang Dipilih Menggunakan Tombol
	public function resetpasswordAkun()
	{
		//Menampung Id Akun Yang Telah Ditampung ke Dalam Session
		$idakun = $this->session->userdata('idakun');
		//Membuat Array Dengan Nama Where Untuk Mencari Data Akun Tersebut
		//(Username dan Akses)
		$where = array('id' => $idakun);

		//Menampung Id Akun Yang Akan Direset Passwordnya yang Didapatkan dari URL
		//Untuk Mendapatkan Data Akun Tersebut
		$idakun2 = $this->uri->segment(2);
		//Membuat Array Dengan Nama Where Untuk Mencari Data Akun Tersebut
		//(Username dan Akses)
		$where2 = array('id' => $idakun2 );
		
		//Menampung Data Akun Yang Dicari ke Dalam Array
		//Menampung Semua Data Gudang ke Dalam Array
		//Menampung Semua Data Pengguna ke Dalam Array
		$data = array(
			'akun' => $this->ModelAdmin->ambilAkun($where),
			'gudang' => $this->ModelAdmin->ambilGudang(),
			'wilayah' => $this->ModelAdmin->fungsiambilWilayah(),
			'lokasi' => $this->ModelAdmin->fungsiambilsemuaLokasi(),
			'pengguna' => $this->ModelAdmin->resetpasswordakun($where2));

		//Memuat Header Halaman dan Mengirimkan Data Yang Ditampung
		$this->load->view('tamplates_admin/header', $data);
		//Memuat Sidebar Halaman(Menu) dan Mengirimkan Data Yang Ditampung
		$this->load->view('tamplates_admin/sidebar', $data);
		//Memuat Halaman Form Reset Password Akun Pengguna
		$this->load->view('admin/resetpasswordakun', $data);
		//Memuat Footer Halaman
		$this->load->view('tamplates_admin/footer');
	}

	//Fungsi Ini Digunakan Untuk Mereset Password Akun yang Dipilih dan Sudah Diinputkan
	//Password Baru Melalui Form Reset Password Untuk Akun Tersebut
	public function fungsiresetpasswordAkun()
	{
		//Menampung Id Akun Yang Akan Direset Passwordnya yang Didapatkan dari URL
		$idakun = $this->uri->segment(2);
		//Membuat Array Dengan Nama Where Untuk Mencari Data Akun Tersebut
		//(Username dan Akses)
		$where = array('id' => $idakun );

		//Menampung Password Baru Akun Tersebut
		$password = md5($this->input->post('passwordbaru'));
		$password2 = md5($this->input->post('passwordbaru2'));

		//Memeriksa Apakah Password yang Diinputkan Sama
		//Jika Tidak Sama Pengguna Akan Dialihkan Kembali
		//Ke Halaman Pengelolaan Akun
		if ($password != $password2) {
			redirect('kelolaakun','refresh');
		}else {
			//Menampung Password Baru ke Dalam Array
			$data = array('password' => $password);
			//Memanggil Fungsi Untuk Proses Reset Password Akun
			//dengan Array yang Berisi Atribut Sebagai Parameternya
			$this->ModelAdmin->fungsiresetpasswordAkun($where, $data);
			//Mengalihkan Pengguna ke Halaman Pengelolaan Akun
			redirect('kelolaakun','refresh');
		}
	}

	//Fungsi Ini Digunakan Untuk Menampilkan Halaman yang Berisi Daftar Gudang
	//dan Halaman Mengelola Gudang(Menambah dan Menghapus)
	public function kelolaGudang()
	{
		//Menampung Id Akun Yang Telah Ditampung ke Dalam Session
		$idakun = $this->session->userdata('idakun');
		//Membuat Array Dengan Nama Where Untuk Mencari Data Akun Tersebut
		//(Username dan Akses)
		$where = array('id' => $idakun);

		//Menampung Data Akun Yang Dicari ke Dalam Array
		//Menampung Semua Data Gudang ke Dalam Array
		$data = array(
			'akun' => $this->ModelAdmin->ambilAkun($where),
			'wilayah' => $this->ModelAdmin->fungsiambilWilayah(),
			'lokasi' => $this->ModelAdmin->fungsiambilsemuaLokasi(),
			'gudang' => $this->ModelAdmin->ambilGudang());

		//Memuat Header Halaman dan Mengirimkan Data Yang Ditampung
		$this->load->view('tamplates_admin/header', $data);
		//Memuat Sidebar Halaman(Menu) dan Mengirimkan Data Yang Ditampung
		$this->load->view('tamplates_admin/sidebar', $data);
		//Memuat Halaman Pengelolaan Gudang
		$this->load->view('admin/kelolagudang', $data);
		//Memuat Footer Halaman
		$this->load->view('tamplates_admin/footer');
	}

	//Fungsi Ini Digunakan Untuk Menampilkan Halaman yang Berisi Form
	//Untuk Menambah Gudang
	public function tambahGudang()
	{
		//Menampung Id Akun Yang Telah Ditampung ke Dalam Session
		$idakun = $this->session->userdata('idakun');
		//Membuat Array Dengan Nama Where Untuk Mencari Data Akun Tersebut
		//(Username dan Akses)
		$where = array('id' => $idakun);

		//Menampung Data Akun Yang Dicari ke Dalam Array
		//Menampung Semua Data Gudang ke Dalam Array
		$data = array(
			'akun' => $this->ModelAdmin->ambilAkun($where),
			'wilayah' => $this->ModelAdmin->fungsiambilWilayah(),
			'lokasi' => $this->ModelAdmin->fungsiambilsemuaLokasi(),
			'gudang' => $this->ModelAdmin->ambilGudang());

		//Memuat Header Halaman dan Mengirimkan Data Yang Ditampung
		$this->load->view('tamplates_admin/header', $data);
		//Memuat Sidebar Halaman(Menu) dan Mengirimkan Data Yang Ditampung
		$this->load->view('tamplates_admin/sidebar',$data);
		//Memuat Halaman Form Penambahan Gudang
		$this->load->view('admin/tambahgudang');
		//Memuat Footer Halaman
		$this->load->view('tamplates_admin/footer');
	}

	//Fungsi Ini Digunakan Untuk Menambahkan Gudang yang Telah Diinputkan
	//dari Form Tambah Gudang ke Dalam Database
	public function fungsitambahGudang()
	{
		//Menampung Nama Gudang dari Form Tambah Gudang
		$namagudang = $this->input->post('namagudang');

		//Menampung Nama Gudang ke Dalam Array
		$data = array('namagudang' => $namagudang);

		//Memanggil Fungsi Untuk Menambahkan Gudang dengan Array Sebagai
		//Parameternya
		$this->ModelAdmin->fungsitambahGudang($data);

		//Mengalihkan Pengguna ke Halaman Pengelolaan Gudang
		redirect('kelolagudang','refresh');
	}

	//Fungsi Ini Digunakan Untuk Menghapus Gudang yang Dipilih dari
	//Halaman Pengelolaan Gudang
	public function fungsihapusGudang()
	{
		//Menampung ID Gudang yang Akan Dihapus dari URL
		$idgudang = $this->uri->segment(2);
		//Menampung ID Gudang yang Akan Dihapus ke Dalam Array
		$where = array('id' => $idgudang );

		//Memanggil Fungsi Untuk Menghapus Gudang Tersebut dengan Array
		//Sebagai Parameternya
		$this->ModelAdmin->fungsihapusGudang($where);
		//Mengalihkan Pengguna ke Halaman Pengelolaan Gudang
		redirect('kelolagudang','refresh');
	}

	public function kelolalokasi()
	{
		//Menampung Id Akun Yang Telah Ditampung ke Dalam Session
		$idakun = $this->session->userdata('idakun');
		//Membuat Array Dengan Nama Where Untuk Mencari Data Akun Tersebut
		//(Username dan Akses)
		$where = array('id' => $idakun);

		//Menampung Data Akun Yang Dicari ke Dalam Array
		//Menampung Nama Gudang Tersebut
		//Menampung Semua Data Gudang ke Dalam Array
		//Menampung Semua Data Barang di Gudang Tersebut ke Dalam Array
		$data = array(
			'akun' => $this->ModelAdmin->ambilAkun($where),
			'gudang' => $this->ModelAdmin->ambilGudang(),
			'wilayah' => $this->ModelAdmin->fungsiambilWilayah(),
			'lokasi' => $this->ModelAdmin->fungsiambilsemuaLokasi());

		//Memuat Header Halaman dan Mengirimkan Data Yang Ditampung
		$this->load->view('tamplates_admin/header', $data);
		//Memuat Sidebar Halaman(Menu) dan Mengirimkan Data Yang Ditampung
		$this->load->view('tamplates_admin/sidebar', $data);
		//Memuat Halaman Stok Barang di Gudang Tersebut
		$this->load->view('admin/kelolalokasi', $data);
		//Memuat Footer Halaman
		$this->load->view('tamplates_admin/footer');
	}

	public function tambahlokasi()
	{
		//Menampung Id Akun Yang Telah Ditampung ke Dalam Session
		$idakun = $this->session->userdata('idakun');
		//Membuat Array Dengan Nama Where Untuk Mencari Data Akun Tersebut
		//(Username dan Akses)
		$where = array('id' => $idakun);

		//Menampung Data Akun Yang Dicari ke Dalam Array
		//Menampung Nama Gudang Tersebut
		//Menampung Semua Data Gudang ke Dalam Array
		//Menampung Semua Data Barang di Gudang Tersebut ke Dalam Array
		$data = array(
			'akun' => $this->ModelAdmin->ambilAkun($where),
			'wilayah' => $this->ModelAdmin->fungsiambilWilayah(),
			'lokasi' => $this->ModelAdmin->fungsiambilsemuaLokasi(),
			'gudang' => $this->ModelAdmin->ambilGudang());

		//Memuat Header Halaman dan Mengirimkan Data Yang Ditampung
		$this->load->view('tamplates_admin/header', $data);
		//Memuat Sidebar Halaman(Menu) dan Mengirimkan Data Yang Ditampung
		$this->load->view('tamplates_admin/sidebar', $data);
		//Memuat Halaman Stok Barang di Gudang Tersebut
		$this->load->view('admin/tambahlokasi', $data);
		//Memuat Footer Halaman
		$this->load->view('tamplates_admin/footer');
	}

	public function fungsitambahLokasi()
	{
		$namalokasi = strtoupper($this->input->post('namalokasi'));
		$wilayah = strtoupper($this->input->post('wilayah'));

		$data = array(
			'namalokasi' => $namalokasi,
			'wilayah' => $wilayah);

		$this->ModelAdmin->fungsitambahLokasi($data);
		redirect('kelolalokasi','refresh');
	}

	public function fungsihapusLokasi()
	{
		$idunit = $this->uri->segment(2);

		$where = array('id' => $idunit);

		$this->ModelAdmin->fungsihapusLokasi($where);
		redirect('kelolalokasi','refresh');
	}

	public function ubahLokasi()
	{
		//Menampung Id Akun Yang Telah Ditampung ke Dalam Session
		$idakun = $this->session->userdata('idakun');
		//Membuat Array Dengan Nama Where Untuk Mencari Data Akun Tersebut
		//(Username dan Akses)
		$where = array('id' => $idakun);

		$where2 = array('id' => $this->uri->segment(2));

		//Menampung Data Akun Yang Dicari ke Dalam Array
		//Menampung Nama Gudang Tersebut
		//Menampung Semua Data Gudang ke Dalam Array
		//Menampung Semua Data Barang di Gudang Tersebut ke Dalam Array
		$data = array(
			'akun' => $this->ModelAdmin->ambilAkun($where),
			'gudang' => $this->ModelAdmin->ambilGudang(),
			'wilayah' => $this->ModelAdmin->fungsiambilWilayah(),
			'lokasi' => $this->ModelAdmin->fungsiambilsemuaLokasi(),
			'lokasitujuan' => $this->ModelAdmin->fungsiambilLokasi($where2));

		//Memuat Header Halaman dan Mengirimkan Data Yang Ditampung
		$this->load->view('tamplates_admin/header', $data);
		//Memuat Sidebar Halaman(Menu) dan Mengirimkan Data Yang Ditampung
		$this->load->view('tamplates_admin/sidebar', $data);
		//Memuat Halaman Stok Barang di Gudang Tersebut
		$this->load->view('admin/ubahlokasi', $data);
		//Memuat Footer Halaman
		$this->load->view('tamplates_admin/footer');
	}

	public function fungsiubahLokasi()
	{
		$id = $this->uri->segment(2);
		$where = array('id' => $id );

		$namalokasi = $this->input->post('namalokasi');
		$wilayah = strtoupper($this->input->post('wilayah'));
		$data = array(
			'namalokasi' => $namalokasi,
			'wilayah' => $wilayah);

		$this->ModelAdmin->fungsiubahLokasi($where, $data);
		redirect('kelolalokasi','refresh');
	}

	//Fungsi Ini Digunakan Untuk Mengelola Petugas
	public function kelolaPetugas()
	{
		//Menampung Id Akun Yang Telah Ditampung ke Dalam Session
		$idakun = $this->session->userdata('idakun');

		//Membuat Array Dengan Nama Where Untuk Mencari Data Akun Tersebut
		//(Username dan Akses)
		$where = array('id' => $idakun);

		//Menampung Data Akun Yang Dicari ke Dalam Array
		//Menampung Semua Data Gudang ke Dalam Array
		$data = array(
			'akun' => $this->ModelAdmin->ambilAkun($where),
			'wilayah' => $this->ModelAdmin->fungsiambilWilayah(),
			'lokasi' => $this->ModelAdmin->fungsiambilsemuaLokasi(),
			'gudang' => $this->ModelAdmin->ambilGudang(),
			'petugas' => $this->ModelAdmin->ambilPetugas());

		//Memuat Header Halaman dan Mengirimkan Data Yang Ditampung
		$this->load->view('tamplates_admin/header', $data);
		//Memuat Sidebar Halaman(Menu) dan Mengirimkan Data Yang Ditampung
		$this->load->view('tamplates_admin/sidebar', $data);
		//Memuat Halaman Form Ubah Password Akun Pengguna
		$this->load->view('admin/kelolapetugas', $data);
		//Memuat Footer Halaman
		$this->load->view('tamplates_admin/footer');
	}

	//Fungsi Ini Digunakan Untuk Menyimpan Perubahan Nama Petugas
	public function fungsiubahnamaPetugas()
	{
		//Menampung Id Akun Yang Telah Ditampung ke Dalam Session
		$idakun = $this->session->userdata('idakun');
		//Membuat Array Dengan Nama Where Untuk Mencari Data Akun Tersebut
		//(Username dan Akses)
		$where = array('id' => 1);

		$namapetugas = $this->input->post('namapetugas');

		$data = array('namapetugas' => $namapetugas );

		$this->ModelAdmin->fungsiubahnamaPetugas($where, $data);

		redirect('kelolapetugas','refresh');
	}

	//Fungsi Ini Digunakan Untuk Menampilkan Halaman Ubah Password Akun
	//Pengguna Tersebut
	public function ubahPasswordakun()
	{
		//Menampung Id Akun Yang Telah Ditampung ke Dalam Session
		$idakun = $this->session->userdata('idakun');

		//Membuat Array Dengan Nama Where Untuk Mencari Data Akun Tersebut
		//(Username dan Akses)
		$where = array('id' => $idakun);

		//Menampung Data Akun Yang Dicari ke Dalam Array
		//Menampung Semua Data Gudang ke Dalam Array
		$data = array(
			'akun' => $this->ModelAdmin->ambilAkun($where),
			'wilayah' => $this->ModelAdmin->fungsiambilWilayah(),
			'lokasi' => $this->ModelAdmin->fungsiambilsemuaLokasi(),
			'gudang' => $this->ModelAdmin->ambilGudang());

		//Memuat Header Halaman dan Mengirimkan Data Yang Ditampung
		$this->load->view('tamplates_admin/header', $data);
		//Memuat Sidebar Halaman(Menu) dan Mengirimkan Data Yang Ditampung
		$this->load->view('tamplates_admin/sidebar', $data);
		//Memuat Halaman Form Ubah Password Akun Pengguna
		$this->load->view('admin/ubahpasswordakun', $data);
		//Memuat Footer Halaman
		$this->load->view('tamplates_admin/footer');
	}

	//Fungsi Ini Digunakan Untuk Menyimpan Perubahan Password Akun Pengguna
	//Tersebut di Database
	public function fungsiubahPasswordakun()
	{
		//Menampung Id Akun Yang Telah Ditampung ke Dalam Session
		$idakun = $this->session->userdata('idakun');
		//Membuat Array Dengan Nama Where Untuk Mencari Data Akun Tersebut
		//(Username dan Akses)
		$where = array('id' => $idakun);
		//Menampung Data Akun Pengguna Tersebut
		$tampung = $this->ModelAdmin->ambilAkun($where);

		//Menampung Atribut yang Diperlukan untuk Mengubah Password Pengguna
		$passlama = md5($this->input->post('passwordlama'));
		$passbaru1 = md5($this->input->post('passwordbaru1'));
		$passbaru2 = md5($this->input->post('passwordbaru2'));

		//Proses Validasi Ubah Password Pengguna
		foreach ($tampung as $datatampung) {
			//Memeriksa Jika Password Lama yang Diinputkan Tidak Sama Dengan Password
			//Akun Tersebut yang ada dalam Database Maka Pengguna Akan Dialihkan
			//ke Halaman Utama
			if ($passlama != $datatampung->password) {
				redirect('admin','refresh');
			}else {
				//Memeriksa Jika Password Baru yang Diinputkan Tidak Sama Maka
				//Pengguna Akan Dialihkan ke Halaman Utama
				if ($passbaru1 != $passbaru2) {
					redirect('admin','refresh');
				}else {
					//Menampung Password Baru ke Dalam Array
					$data = array('password' => $passbaru1);
					//Memanggil Fungsi untuk Menyimpan Perubahan Password Akun
					//Pengguna Tersebut ke Database
					$this->ModelAdmin->fungsiubahPasswordakun($where, $data);
					//Mengalihkan Pengguna ke Halaman Utama
					redirect('admin','refresh');
				}
			}
		}
	}

	public function Notif()
	{
		//Menampung Id Akun Yang Telah Ditampung ke Dalam Session
		$idakun = $this->session->userdata('idakun');

		//Membuat Array Dengan Nama Where Untuk Mencari Data Akun Tersebut
		//(Username dan Akses)
		$where = array('id' => $idakun);

		foreach ($this->ModelAdmin->ambilAkun($where) as $dataakun) {
			if ($dataakun->akses == "ADMIN") {
				$this->ModelAdmin->fungsilihatNotifadmin();
				//Menampung Data Akun Yang Dicari ke Dalam Array
				//Menampung Semua Data Gudang ke Dalam Array
				//Menampung Semua Data Barang ke Dalam Array
				$data = array(
					'akun' => $this->ModelAdmin->ambilAkun($where),
					'gudang' => $this->ModelAdmin->ambilGudang(),
					'wilayah' => $this->ModelAdmin->fungsiambilWilayah(),
					'lokasi' => $this->ModelAdmin->fungsiambilsemuaLokasi(),
					'notif' => $this->ModelAdmin->fungsiambilNotif());
			}

			if ($dataakun->akses == "USER") {

				$where2 = array('kd_gudang' => $dataakun->kd_gudang );
				//Menampung Data Akun Yang Dicari ke Dalam Array
				//Menampung Semua Data Gudang ke Dalam Array
				//Menampung Semua Data Barang ke Dalam Array
				$this->ModelAdmin->fungsilihatNotifuser($where2);
				$data = array(
					'akun' => $this->ModelAdmin->ambilAkun($where),
					'gudang' => $this->ModelAdmin->ambilGudang(),
					'wilayah' => $this->ModelAdmin->fungsiambilWilayah(),
					'lokasi' => $this->ModelAdmin->fungsiambilsemuaLokasi(),
					'notif' => $this->ModelAdmin->fungsiambilNotif2($where2));
			}
		}

		

		
		

		
		//Memuat Header Halaman dan Mengirimkan Data Yang Ditampung
		$this->load->view('tamplates_admin/header', $data);
		//Memuat Sidebar Halaman(Menu) dan Mengirimkan Data Yang Ditampung
		$this->load->view('tamplates_admin/sidebar', $data);
		//Memuat Halaman Form Peminjaman dan Mengirimkan Data Yang Ditampung
		//Untuk Meminjam Barang ke Gudang Tertentu
		$this->load->view('admin/notif', $data);
		//Memuat Footer Halaman
		$this->load->view('tamplates_admin/footer');
	}

	public function Konfirnotif()
	{
		


		//Menampung Id Akun Yang Telah Ditampung ke Dalam Session
		$idakun = $this->session->userdata('idakun');

		//Membuat Array Dengan Nama Where Untuk Mencari Data Akun Tersebut
		//(Username dan Akses)
		$where = array('id' => $idakun);

		$where2 = array('id' => $this->uri->segment(2));

		//Menampung Data Akun Yang Dicari ke Dalam Array
		//Menampung Semua Data Gudang ke Dalam Array
		//Menampung Semua Data Pengguna ke Dalam Array
		$data = array(
			'akun' => $this->ModelAdmin->ambilAkun($where),
			'gudang' => $this->ModelAdmin->ambilGudang(),
			'wilayah' => $this->ModelAdmin->fungsiambilWilayah(),
			'lokasi' => $this->ModelAdmin->fungsiambilsemuaLokasi(),
			'notif' => $this->ModelAdmin->fungsiambilNotif2($where2));

		//Memuat Header Halaman dan Mengirimkan Data Yang Ditampung
		$this->load->view('tamplates_admin/header', $data);
		//Memuat Sidebar Halaman(Menu) dan Mengirimkan Data Yang Ditampung
		$this->load->view('tamplates_admin/sidebar',$data);
		//Memuat Halaman Form Penambahan Akun Pengguna
		$this->load->view('admin/konfirnotif', $data);
		//Memuat Footer Halaman
		$this->load->view('tamplates_admin/footer');
	}

	public function Fungsikonfirnotif()
	{
		$idnotif = $this->uri->segment(2);
		$tanggalpakai = $this->input->post('tanggalpakai');
		$namapemakai = $this->input->post('namapemakai');
		$keteranganpakai = $this->input->post('keteranganpakai');

		$where = array('id' => $idnotif );

		$data = array('tanggalpakai' => $tanggalpakai, 'peminjam' => $namapemakai, 'keteranganpakai' => $keteranganpakai );

		$data2 = array('tanggalpakai' => $tanggalpakai, 'peminjam' => $namapemakai, 'keterangan' => $keteranganpakai );

		$this->ModelAdmin->Fungsikonfirnotif($where, $data, $data2);

		redirect('notif','refresh');
	}

	//Fungsi Logout Controller Admin
	public function fungsiLogout()
	{
		//Menghapus Session Yang Ada Saat ini
		$this->session->sess_destroy();
		//Mengalihkan Pengguna ke Halaman Login
		redirect('login','refresh');
	}


}

/* End of file Admin.php */
/* Location: ./application/controllers/Admin.php */
;