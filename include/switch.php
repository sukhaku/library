<?php
$hal=$_GET['hal'];

switch ($hal) {
	case'profil':
	include"profil.php";
	break;
	
	case"galeri":
	include"galeri.php";
	break;

	case"petunjuk":
	include"petunjuk.php";
	break;

	case"katalog":
	include"katalog.php";
	break;

	case"artikel":
	include"include/transaksi.php";
	break;
	
	case"buku_terbaru":
	include"buku_terbaru.php";
	break;


	case"contact":
	include"contact.php";
	break;


	case"logout":
	include"include/logout.php";
	break;

	case 'profil_anggota':
	include"include/transaksi.php"	;
	break;

	case 'riwayat_transaksi':
	include"include/transaksi.php"	;
	break;

	case 'riwayat_kasus':
	include"include/transaksi.php"	;
	break;



	case 'keterlambatan':
	include"include/transaksi.php"	;
	break;

	
	case'detail_peminjaman':
	include"include/transaksi.php";
	break;


	case 'ubah_profil':
	include"include/ubah_profil.php"	;
	break;

	case 'detail_buku':
	include"include/detail_buku.php"	;
	break;

	case 'sitemap':
	include"sitemap.php";
	break;







	


	


	

		default:
		# code...
		break;
}


?>