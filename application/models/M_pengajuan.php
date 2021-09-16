<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_pengajuan extends CI_Model
{
	public function addPengajuan($nama, $nik, $kategori, $file)
	{
		return $this->db->query("INSERT INTO pengajuan(pengajuan_nama, pengajuan_nik, pengajuan_kategori, pengajuan_file) VALUES ('$nama', '$nik', '$kategori', '$file')");
	}

	public function getPengajuan()
	{
		return $this->db->query("SELECT pengajuan_id,pengajuan_nama, DATE_FORMAT(pengajuan_tanggal, '%d - %m - %Y') AS tanggal, pengajuan_nik, pengajuan_kategori, pengajuan_ktp, pengajuan_kk, pengajuan_status, pengajuan_surat, pengajuan_catatan FROM pengajuan ORDER BY pengajuan_id DESC");
	}


	public function getPengajuanDownload()
	{
		return $this->db->query("SELECT pengajuan_id,pengajuan_nama, DATE_FORMAT(pengajuan_tanggal, '%d - %m - %Y') AS tanggal, pengajuan_nik, pengajuan_kategori, pengajuan_ktp, pengajuan_kk, pengajuan_status, pengajuan_surat, pengajuan_catatan FROM pengajuan WHERE pengajuan_status = 1 OR pengajuan_status = 2 ORDER BY pengajuan_id DESC");
	}


	public function updatePublishPengajuan($status, $id, $surat)
	{
		return $this->db->query("UPDATE pengajuan SET pengajuan_status = '$status', pengajuan_surat = '$surat' WHERE pengajuan_id = '$id'");
	}

	public function updateTolakPengajuan($status, $id, $catatan)
	{
		return $this->db->query("UPDATE pengajuan SET pengajuan_status = '$status', pengajuan_catatan = '$catatan' WHERE pengajuan_id = '$id'");
	}
}
