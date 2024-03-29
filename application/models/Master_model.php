<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Master_model extends CI_Model {


	public function buku() {
		$q = $this->db->query("SELECT * FROM mst_buku 
								LEFT JOIN mst_kategori ON mst_buku.id_kategori = mst_kategori.id_kategori 
								LEFT JOIN mst_sumber ON mst_buku.id_sumber = mst_sumber.id_sumber ORDER BY id_buku DESC");
		return $q;
	}

	public function kategori() {
		$q = $this->db->query("SELECT * FROM mst_kategori ORDER BY id_kategori DESC");
		return $q;
	}

	public function sumber() {
		$q = $this->db->query("SELECT * FROM mst_sumber ORDER BY id_sumber DESC");
		return $q;
	}

	public function pengunjung_today() {
		$tgl_awal = date("Y-m-d");
		$tgl_akhir = date("Y-m-d");
		$q = $this->db->query("SELECT * FROM pengunjung_perpus 
								INNER JOIN mst_siswa ON pengunjung_perpus.nis = mst_siswa.nis 
								INNER JOIN mst_kelas ON pengunjung_perpus.id_kelas = mst_kelas.id_kelas  WHERE date(tanggal) between date('$tgl_awal') and date('$tgl_akhir') ORDER BY tanggal DESC");
		return $q;
	}
	public function read_data()
	{
	$this->db->select('*');
	$check = $this->db->get('sr_profile')->num_rows();
	if($check>0){
		$this->db->join('sr_provinsi','sr_provinsi.province_id = sr_profile.idprovinsi','left');
		$this->db->join('sr_kota','sr_kota.city_id = sr_profile.idkota','left');
		$this->db->join('sr_kecamatan','sr_kecamatan.subdistrict_id = sr_profile.idkecamatan','left');
		$this->db->join('sr_tahun_pelajaran','sr_tahun_pelajaran.idtahun_pelajaran = sr_profile.idtahun_pelajaran','left');
		$this->db->order_by('sr_profile.idprofile','ASC');
		return $this->db->get('sr_profile')->row();
	} else {
		return false;
	};
    }
}