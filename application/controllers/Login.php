<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	//Konstruktor Untuk Controller Login
	public function __construct()
	{
		parent::__construct();
		//Memuat Model Login
		$this->load->model('ModelLogin');
	}

	//Fungsi Index Controller Login
	public function index()
	{
		//Memuat View Login
		$this->load->view('login');
	}

	//Fungsi Index Controller Login
	public function fungsiLogin()
	{
		//Menampung Username Yang Diinputkan Pengguna
		$username = $this->input->post('username');
		//Menampung Password Yang Diinputkan Pengguna
		$password = md5($this->input->post('password'));

		//Menampung Username dan Password Yang Diinputkan Pengguna Ke Dalam Array
		$data = array('username' => $username, 'password' => $password );

		//Memeriksa Apakah Username dan Password Yang Diinputkan
		//Sesuai Menggunakan Sebuah Fungsi Yang Terdapat Pada Model Login
		if ($this->ModelLogin->fungsiLogin($data)->num_rows() > 0) {

			//Menampung Data Pengguna Yang Login Jika Login Sukses
			$data = $this->ModelLogin->fungsiLogin($data)->result();

			foreach ($data as $dataakun) {
				//Menampung Data Pengguna Yang Login Ke Dalam Session
				//Untuk Digunakan Pada Halaman Dashboard(Admin/Manager/User)
				$datalogin = array(
					'idakun' => $dataakun->id,
					'status' => 'SUKSES',
					'akses' => $dataakun->akses
				);
				$this->session->set_userdata( $datalogin );
			}
		}

		//Mengalihkan Pengguna Ke Halaman Dashboard
		redirect('admin','refresh');

	}

}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */