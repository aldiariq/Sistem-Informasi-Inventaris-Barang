<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelAdmin extends CI_Model {

	public function index($namagudang)
	{
		$query = $this->db->query("SELECT kategori,namagudang, COUNT(*) AS jumlah FROM tb_barang GROUP BY kategori,namagudang HAVING jumlah <= 3 AND namagudang = '$namagudang' ORDER BY kategori");
		return $query->result();
	}

	public function jumlahGudang()
	{
		$query = $this->db->get('tb_gudang');
		return $query->num_rows();
	}

	public function jumlahWilayah()
	{
		$query = $this->db->query("SELECT DISTINCT wilayah FROM tb_lokasi");
		return $query->num_rows();
	}

	public function jumlahStasiun()
	{
		$query = $this->db->query("SELECT DISTINCT namalokasi FROM tb_lokasi");
		return $query->num_rows();
	}

	public function jumlahAkun()
	{
		$query = $this->db->query("SELECT * FROM tb_user");
		return $query->num_rows();
	}

	public function rincianStok($namagudang)
	{
		$query = $this->db->query("SELECT kategori,namagudang, COUNT(*) AS jumlah FROM tb_barang GROUP BY kategori, namagudang HAVING namagudang = '$namagudang' ORDER BY kategori");
		return $query->result();
	}

	public function ambilAkun($where)
	{
		$query = $this->db->get_where('tb_user', $where);
		return $query->result();
	}

	public function ambilGudang()
	{
		$query = $this->db->get('tb_gudang');
		return $query->result();
	}

	public function ambilGudang2($where)
	{
		$query = $this->db->get_where('tb_gudang', $where);
		return $query->result();
	}

	public function fungsibarangMasuk($data)
	{
		$query = $this->db->insert('tb_barang', $data);
	}

	public function fungsibarangKeluar($data, $where, $gudang)
	{
		$query = $this->db->insert('tb_barangkeluar', $data);
		
		$query = $this->db->where($where);
		$query = $this->db->update('tb_barang', $gudang);

	}

	public function fungsiambilsemuaBarang()
	{
		$query = $this->db->order_by('namagudang', 'desc');
		$query = $this->db->get('tb_barang');
		return $query->result();
	}

	public function fungsiambilBarang($wheresatu, $wheredua)
	{
		$query = $this->db->where($wheresatu);
		$query = $this->db->or_where($wheredua);
		$query = $this->db->get('tb_barang');
		return $query->result();
	}

	public function fungsihapusBarang($where)
	{
		$query = $this->db->where($where);
		$query = $this->db->delete('tb_barang');
	}

	public function fungsieditstok($where, $data)
	{
		$query = $this->db->where($where);
		$query = $this->db->update('tb_barang', $data);
	}

	public function fungsiambilAkun()
	{
		$query = $this->db->order_by('akses', 'asc');
		$query = $this->db->get('tb_user');
		return $query->result();
	}

	public function fungsihapusAkun($where)
	{
		$query = $this->db->where($where);
		$query = $this->db->delete('tb_user');
	}

	public function fungsitambahAkun($data)
	{
		$query = $this->db->insert('tb_user', $data);
	}

	public function resetpasswordAkun($where)
	{
		$query = $this->db->get_where('tb_user', $where);
		return $query->result();
	}

	public function fungsiresetpasswordAkun($where, $data)
	{
		$query = $this->db->where($where);
		$query = $this->db->update('tb_user', $data);
	}

	public function fungsiubahPasswordakun($where, $data)
	{
		$query = $this->db->where($where);
		$query = $this->db->update('tb_user', $data);
	}

	public function fungsitambahGudang($data)
	{
		$query = $this->db->insert('tb_gudang', $data);
	}

	public function fungsihapusGudang($where)
	{
		$query = $this->db->where($where);
		$query = $this->db->delete('tb_gudang');
	}

	public function fungsiambilLokasi($where2)
	{
		$query = $this->db->get_where('tb_lokasi', $where2);
		return $query->result();
	}

	public function fungsiambilsemuaLokasi()
	{
		$query = $this->db->get('tb_lokasi');
		return $query->result();
	}

	public function fungsitambahLokasi($data)
	{
		$query = $this->db->insert('tb_lokasi', $data);
	}

	public function fungsihapusLokasi($where)
	{
		$query = $this->db->where($where);
		$query = $this->db->delete('tb_lokasi');
	}

	public function fungsiubahLokasi($where, $data)
	{
		$query = $this->db->where($where);
		$query = $this->db->update('tb_lokasi', $data);
	}

	public function laporanStok($where)
	{
		$query = $this->db->get_where('tb_barangkeluar', $where);
		return $query->result();
	}

	public function fungsiambilWilayah()
	{
		$query = $this->db->query("SELECT DISTINCT wilayah FROM tb_lokasi");
		return $query->result();
	}

	public function ambilPetugas()
	{
		$query = $this->db->get('tb_petugas');
		return $query->result();
	}

	public function fungsiubahnamaPetugas($where, $data)
	{
		$query = $this->db->where($where);
		$query = $this->db->update('tb_petugas', $data);
	}

	public function fungsiambilNotif()
	{
		$query = $this->db->where('keteranganpakai IS NOT NULL');
		$query = $this->db->order_by('tanggal', 'asc');
		$query = $this->db->get('tb_notif');
		return $query->result();
	}

	public function fungsiambilNotif2($where)
	{
		$query = $this->db->get_where('tb_notif', $where);
		return $query->result();
	}

	public function fungsilihatNotifadmin()
	{
		$query = $this->db->query("UPDATE tb_notif SET statusadmin = 1 WHERE keteranganpakai != ''");
	}

	public function fungsilihatNotifuser($where2)
	{
		$query = $this->db->where($where2);
		$data = array('statususer' => 1 );
		$query = $this->db->update('tb_notif', $data);
		
	}

	public function fungsihitungNotifadmin()
	{
		$query = $this->db->query("SELECT id,statusadmin,keteranganpakai, COUNT(*) AS jumlah FROM tb_notif GROUP BY id HAVING statusadmin = 0 AND keteranganpakai != ''");
		return $query->num_rows();
	}

	public function fungsihitungNotifuser($kd_gudang)
	{
		$query = $this->db->query("SELECT id,statususer,keteranganpakai,kd_gudang, COUNT(*) AS jumlah FROM tb_notif GROUP BY id HAVING statususer = 0 AND keteranganpakai = '' AND kd_gudang = '$kd_gudang'");
		return $query->num_rows();
	}

	public function fungsiNotif($notif)
	{
		$query = $this->db->insert('tb_notif', $notif);
	}

	public function Fungsikonfirnotif($where, $data, $data2)
	{
		$query = $this->db->where($where);
		$query = $this->db->update('tb_notif', $data);

		$tampung = $this->db->get_where('tb_notif', $where)->result();
		foreach ($tampung as $datatampung) {
			$tanggal = $datatampung->tanggal;
			$snbarang = $datatampung->snbarang;
		}

		$whereupdate = array('tanggal' => $tanggal, 'snbarang' => $snbarang );
		$updatelaporan = $this->db->where($whereupdate);
		$updatelaporan = $this->db->update('tb_barangkeluar', $data2);


	}
}

/* End of file ModelAdmin.php */
/* Location: ./application/models/ModelAdmin.php */
