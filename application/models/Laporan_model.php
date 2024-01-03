<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Laporan_model extends CI_Model {

	public function siswa($id_kelas) {
		$q = $this->db->query("SELECT * FROM vw_siswa  WHERE id_kelas = '$id_kelas' ORDER BY nama_siswa ASC");
		return $q;
	}

	public function siswa_detail($nis) {
		$q = $this->db->query("SELECT * FROM vw_siswa_dt WHERE nis = '$nis'");
		return $q;
	}

	public function peminjaman($tgl_awal, $tgl_akhir) {

		$q = $this->db->query("select * from peminjaman_buku_dt 
								left join peminjaman_buku on peminjaman_buku_dt.id_peminjaman = peminjaman_buku.id_peminjaman 
								left join sr_siswa on peminjaman_buku.id_siswa = sr_siswa.idsiswa
								left join mst_buku on peminjaman_buku_dt.id_buku = mst_buku.id_buku WHERE  peminjaman_buku_dt.status_pinjam_dt = 1 AND tanggal_pinjam between '$tgl_awal' and '$tgl_akhir' ORDER BY id_peminjaman_dt DESC");
		return $q;
	}

	public function buku() {
		$q = $this->db->query("SELECT * FROM mst_buku 
								LEFT JOIN mst_kategori ON mst_buku.id_kategori = mst_kategori.id_kategori 
								LEFT JOIN mst_sumber ON mst_buku.id_sumber = mst_sumber.id_sumber ORDER BY id_buku DESC");
		return $q;
	}

	public function pengunjung($tgl_awal, $tgl_akhir, $keperluan) {
		if($keperluan == 'all' || $keperluan == '') {
			$param1 = "";
		} else {
			$param1 = "AND pengunjung_perpus.keperluan = '$keperluan'";
		}
		$q = $this->db->query("SELECT * FROM pengunjung_perpus 
								INNER JOIN mst_siswa ON pengunjung_perpus.nis = mst_siswa.nis 
								INNER JOIN mst_kelas ON pengunjung_perpus.id_kelas = mst_kelas.id_kelas  WHERE  pengunjung_perpus.tanggal >= '$tgl_awal' AND pengunjung_perpus.tanggal <= '$tgl_akhir' $param1"); //WHERE date(tanggal) between date('$tgl_awal') and date('$tgl_akhir') $param1 ORDER BY tanggal DESC
		return $q;
	}

}
