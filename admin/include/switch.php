<?php
$hal=$_GET['hal'];
switch ($hal) {

		case 'Kasus':
		include"kasus.php";
		break;

		case 'tambah_kasus':
		include"edit_kasus.php";
		break;
		
		case 'hapus_kasus':
		include"edit_kasus.php";
		break;

		case 'Ubah Kasus':
		include"edit_kasus.php";
		break;
			
		case 'Buku':
		include"data_buku.php";
		break;

		case 'Lihat Buku':
		include"data_buku.php";
		break;
		
		case 'Data Buku Detail':
		include"data_buku.php";
		break;

		case 'Buku Masuk':
		include"data_buku.php";
		break;

		case'Pengadaan Buku':
		include"data_buku.php";
		break;

		case 'Tambah Kategori Buku':
		include"tambah_kategori_bk.php";
		break;

		case 'hapus_kat':
		include"hapus_kat.php";
		break;

		case'edit_kategori':
		include"edit_kategori.php";
		break;

		case 'Siswa';
		include"user.php";
		break;

		case 'Guru';
		include"user.php";
		break;

		case 'Petugas';
		include"user.php";
		break;

		case 'Pengunjung';
		include"user.php";
		break;

		case 'Detail Pengunjung';
		include"user.php";
		break;

		case 'Visi Misi';
		include"sekolah.php";
		break;

		case 'Galeri';
		include"sekolah.php";
		break;
		
		case 'Petunjuk';
		include"sekolah.php";
		break;
		
		case 'Slider';
		include"sekolah.php";
		break;


		case 'tambah_visi';
		include"tambah_sekolah.php";
		break;
		
		case 'tambah_petunjuk';
		include"tambah_sekolah.php";
		break;

		case 'hapus_petunjuk':
		include"hapus_sekolah.php";
		break;

		case'hapus_galeri':
		include"hapus_sekolah.php";
		break;

		case'hapus_slider':
		include"hapus_sekolah.php";
		break;

		case'hapus_pengunjung':
		include"hapus_user.php";
		break;

		case'hapus_pengunjung_detail':
		include"hapus_user.php";
		break;

		case 'edit_visi':
		include"edit_sekolah.php";
		break;

		case 'edit_petunjuk':
		include"edit_sekolah.php";
		break;


		case 'hapus_profil':
		include"hapus_sekolah.php";
		break;

		

		case 'tambah_buku':
		include"tambah_buku.php";
		break;

		case 'hapus_buku':
		include"hapus_buku.php";
		break;

		case 'hapus_buku_masuk':
		include"hapus_buku.php";
		break;

		case 'hapus_semua_buku':
		include"hapus_buku.php";
		break;
		
		case 'hapus_pengadaan':
		include"hapus_buku.php";
		break;


		
		case 'edit_buku':
		include"edit_buku.php";
		break;

		case 'Import Anggota':
		include"import.php";
		break;

		case 'Import Buku':
		include"import.php";
		break;



		case 'tambah_anggota':
		include"tambah_user.php";
		break;

		case 'tambah_guru':
		include"tambah_user.php";
		break;
		

		case 'tambah_petugas':
		include"tambah_user.php";
		break;

		case'hapus_siswa':
		include"hapus_user.php";
		break;

		case'delete_siswa_all':
		include"hapus_user.php";
		break;

		case'hapus_guru':
		include"hapus_user.php";
		break;

		case'hapus_petugas':
		include"hapus_user.php";
		break;

		case'edit_petugas':
		include"edit_user.php";
		break;
		

		case'edit_siswa':
		include"edit_user.php";
		break;

		case'edit_guru':
		include"edit_user.php";
		break;
		
		case'Artikel':
		include"artikel.php";
		break;

		case"hapus_artikel":
		include"hapus_artikel.php";
		break;

		case"Peminjaman":
		include"peminjaman.php";
		break;

		case"Lihat Peminjaman":
		include"semua_peminjaman.php";
		break;
		
		case"Lihat Pengembalian":
		include"semua_peminjaman.php";
		break;


		case"Pengembalian":
		include"pengembalian.php";
		break;

		case"Keterlambatan":
		include"keterlambatan.php";
		break;
		
		case"Laporan":
		include"laporan.php";
		break;
		
		case"cetak":
		include"cetak.php";
		break;

		case"Statistik Peminjam":
		include"statistik.php";
		break;

		case"Statistik Pengunjung":
		include"statistik.php";
		break;

		case"Pengaturan":
		include"pengaturan.php";
		break;

		case"Pengaturan":
		include"pengaturan.php";
		break;

		case"edit_pengaturan":
		include"edit_pengaturan.php";
		break;

		case"ubah_status_aktif":
		include"edit_pengaturan.php";
		break;
		case"ubah_status_non":
		include"edit_pengaturan.php";
		break;
		

		case"hapus_pengaturan":
		include"edit_pengaturan.php";
		break;

		case"Tambah Pengaturan":
		include"edit_pengaturan.php";
		break;

		case"Riwayat Pengunjung":
		include"riwayat.php";
		break;

		case"Riwayat Login":
		include"riwayat.php";
		break;

		case'Pengembalian Buku':
		include"mengembalikan.php";
		break;

		case'hapus_peminjaman':
		include"hapus_transaksi.php";
		break;
		
		case'hapus_mengembalikan':
		include"hapus_transaksi.php";
		break;
					
		case'hapus_riwayat':
		include"hapus_transaksi.php";
		break;

		case'hapus_pengunjung_website':
		include"hapus_transaksi.php";
		break;
		
		case'hapus_keterlambatan':
		include"hapus_transaksi.php";
		break;
		
		case'edit_transaksi':
		include"ubah_peminjaman.php";
		break;	
		
		case'simpan_peminjaman':
		include"ubah_peminjaman.php";
		break;

		case'History Peminjaman':
		include"history_peminjaman.php";
		break;
		
		case'Detail Peminjaman':
		include"history_peminjaman.php";
		break;

		case'Detail Peminjaman Anggota':
		include"history_peminjaman.php";
		break;

		case'hapus_banyak':
		include"hapus_banyak.php";
		break;
		
		case'hapus_banyak_pengunjung':
		include"hapus_banyak.php";
		break;

		case'hapus_semua_pengunjung';
		include"hapus_banyak.php";
		break;


		case'hapus_semua_login';
		include"hapus_banyak.php";
		break;
		
		
		
		
			
	
	default:
		# code...
		break;
}


?>