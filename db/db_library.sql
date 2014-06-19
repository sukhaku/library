-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2014 at 05:11 AM
-- Server version: 5.6.14
-- PHP Version: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_library`
--

-- --------------------------------------------------------

--
-- Table structure for table `artikel`
--

CREATE TABLE IF NOT EXISTS `artikel` (
  `id_artikel` int(11) NOT NULL AUTO_INCREMENT,
  `judul` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `type` varchar(200) NOT NULL,
  `size` varchar(200) NOT NULL,
  PRIMARY KEY (`id_artikel`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `artikel`
--

INSERT INTO `artikel` (`id_artikel`, `judul`, `name`, `type`, `size`) VALUES
(8, 'Teknik membaca', 'Teknik Membaca.pdf', 'application/pdf', '274441'),
(10, 'Integrasi Pendidikan', 'Integrasi Pendidikan.doc', 'application/msword', '88064'),
(11, 'Pendidikan Multikultural', 'Pendidikan Multikultural.doc', 'application/msword', '99840'),
(12, 'Pendidikan dalam Membentuk Karakter', 'Pendidikan dalam Membentuk Karakter.doc', 'application/msword', '53760');

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE IF NOT EXISTS `buku` (
  `id_buku` varchar(12) NOT NULL,
  `kode_klarifikasi` varchar(10) NOT NULL,
  `judul_buku` longtext NOT NULL,
  `penerbit` varchar(100) NOT NULL,
  `tahun_terbit` int(6) NOT NULL,
  `pengarang` varchar(100) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  PRIMARY KEY (`id_buku`),
  KEY `FK_REFERENCE_2` (`penerbit`),
  KEY `FK_REFERENCE_3` (`pengarang`),
  KEY `FK_REFERENCE_5` (`id_kategori`),
  KEY `id_buku` (`id_buku`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- RELATIONS FOR TABLE `buku`:
--   `id_kategori`
--       `kategori_buku` -> `id_kategori`
--

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id_buku`, `kode_klarifikasi`, `judul_buku`, `penerbit`, `tahun_terbit`, `pengarang`, `id_kategori`, `stok`) VALUES
('0006sas', '813.08', 'Gairah Asmara', 'Diva Press', 2003, 'Khalil Gibran', 1, 1),
('0008sas', '813.08', 'Simfoni Cinta', 'Diva Press', 2003, 'Khalil Gibran', 1, 1),
('0012sas', '813.08', 'Nyanyian bunga', 'Diva Press', 2003, 'Khalil Gibran', 1, 1),
('0014sas', '813.08', 'Balada sang Kekasih', 'Diva Press', 2003, 'Khalil Gibran', 1, 1),
('0015sas', '813.08', 'Mistikus Cinta', 'Diva Press', 2003, 'Khalil Gibran', 1, 1),
('0021sas', '813.08', 'Anggur cinta', 'Diva Press', 2003, 'Khalil Gibran', 1, 1),
('0022sas', '813.08', 'Diantara Dua Cinta', 'Diva Press', 2003, 'Khalil Gibran', 1, 1),
('0029cer', '813', 'Robin Pendekar Sherwood', 'Dian Rakyat', 1993, 'R. May dan Car penter', 1, 1),
('0036cer', '813', 'Harta Terpendam', 'Dian Rakyat', 1993, 'Francine Pascal', 1, 1),
('0045cer', '813', 'Bahasa Bayi', 'Dian Rakyat', 1993, 'L.E Blair', 1, 1),
('0055cer', '813', 'Bersatu dalam irama', 'Dian Rakyat', 1993, 'L.E Blair', 1, 1),
('0067cer', '813', 'Pentas Mirip Bintang', 'Dian Rakyat', 1993, 'L.E Blair', 1, 1),
('0077dng', '398', '30 Dongeng anak muslim', 'Mitra Umat Surabaya', 1994, 'Anam dan Rahimsyah', 1, 1),
('0130cer', '813', 'Berita dari pinggiran', 'Putra Sukses', 2002, 'Andimas', 1, 1),
('0147cer', '813', 'Emak', 'Gama Media', 2006, 'Adhimas', 1, 1),
('0151cer', '813', 'Otak Para Jenius', 'Dian Rakyat', 1991, 'Gillian Cross', 1, 1),
('0157cer', '813', 'Misteri kota perak', 'Balebat Dedikasi Prima', 2004, 'Sulis Setyowati', 1, 1),
('0161nov', '813', 'Ketika rasa sayang bicara', 'Balebat Dedikasi Prima', 2006, 'Nok Mujiyati', 1, 1),
('0166cer', '813', 'Balada dara-dara mendut', 'Kanisius', 1993, 'Y.B Manggunwijaya', 1, 1),
('0170cer', '813', 'Idam-idamane si Gundul', 'Sastra Jawa', 2007, 'Indiyasiwi Arwiyani', 1, 1),
('0183cer', '813', 'Cerak Betawi 2', 'Gramedia Widiasarana', 1993, 'Rahmat Ali', 1, 1),
('0206nov', '813', 'Lho', 'Balai Pustaka', 2000, 'Putu wijaya', 1, 1),
('0302nov', '813', 'Sebabnya Rafiah Tersesat', 'Balai Pustaka', 1998, 'Balai Pustaka', 1, 1),
('0308cer', '812', 'Dar Der Dor', 'PT Grasindo', 1996, 'Putu WIjaya', 1, 1),
('0317pen', '2X3.4', 'Kepemimpinan Wanita', '', 2000, 'Moh Murtain', 3, 1),
('0320cer', '2X3.4', 'Kumplan kisah 1001 malam', '', 2000, 'Nugraha adhikara', 3, 1),
('0324cer', '200', 'Nabi Zakaria', 'Mitra Pustaka', 2004, 'Hilmi Ali Syaban', 1, 1),
('0325cer', '200', 'Nabi Yaqub', 'Mitra Pustaka', 2004, 'Hilmi Ali Syaban', 1, 1),
('0327cer', '200', 'Nabi Yusuf', 'Mitra Pustaka', 2004, 'Hilmi Ali Syaban', 1, 0),
('0330cer', '200', 'Nabi Daud', 'Mitra Pustaka', 2004, 'Hilmi Ali Syaban', 1, 0),
('0333cer', '200', 'Nabi Idris', 'Mitra Pustaka', 2004, 'Hilmi Ali Syaban', 1, 1),
('0361agm', '377', 'Sikap bahasa santri', '', 2003, 'Fathur Rokhman', 3, 1),
('0362cer', '297', 'Kisah Imam Ali Bin Abi Thalib', 'Lentera', 2002, 'Ali Shofi', 2, 1),
('0368pen', '297.4', 'Adab dalam Agama', 'Gema Insani Press', 1991, 'Al Ghazali', 2, 1),
('0371pen', '297', 'Jujur Salah Satu sifat Para Nabi', 'Mitra Pustaka', 2004, 'A. Nurman Abdulrahman', 2, 1),
('0373pen', '371.3', '20 Kiat Membangkitkan Motovasi', '', 1992, 'Komandoko', 4, 1),
('0374pen', '398', 'Anugerah Gunung Merapi', 'CV.Mediatama', 2001, 'Wiwik Sulistyorini', 2, 1),
('0409ker', '670', 'Membuat Gerabah', '', 0, 'Windarto', 4, 1),
('0414ram', '616.238', 'Ramuan untuk penderita asma', '', 2005, 'Sri Mulyani', 4, 1),
('0420per', '639.21', 'Pembenihan pembesaran lele', '', 0, 'Hernowo', 4, 1),
('0434per', '593.3', 'Merawat Lobster hias', 'Penebar Swadaya', 2003, 'Wiyanto', 2, 1),
('0438per', '634', 'Bertanam Anggur', '', 0, 'Setiadi', 4, 1),
('0450pen', '630', 'Membuat Tanaman kombinasi', '', 0, 'Joesi Endah', 4, 1),
('0451pen', '633.88', 'Khasiat Temu Lawak', '', 0, 'Efi afifah', 4, 1),
('0464pen', '610', 'Menu autis', '', 1991, 'Bonny danu atmaja', 4, 1),
('0475pen', '614', 'Gangguan Pernapasan', '', 2003, 'Fina,Yusuf', 4, 1),
('0481pen', '639', 'Manisan Pepaya', '', 0, 'HB Santoso', 1, 1),
('0485pen', '8X2.2', 'Daun Kehidupan', '', 0, 'Made Anom Subali', 1, 1),
('0486per', '634', 'Bertanam Mangga', '', 0, 'Pracaya', 1, 1),
('0487ker', '780', 'Kerajinan Keramik Cetak', '', 0, 'Surardi', 1, 1),
('0488per', '641', 'Bertani jamur dan memasaknya', '', 0, 'Nurman S', 1, 1),
('0490pen', '636', 'Pendidikan Ketrampilan peternakan', '', 0, 'E karwapi', 1, 1),
('0492pen', '830', 'Kompor Briket Batubara', 'Penebar Swadaya', 2005, 'Heru Kuncoro', 2, 1),
('0493ket', '637', 'Kecap dan touco kedelai', '', 0, 'HB Santoso', 1, 1),
('0494per', '637', 'Pengolahan Tanaman Mangga', '', 0, 'Yuniarti', 1, 1),
('0496per', '633', 'Dasar Pemulihan Tanaman', '', 0, 'W mangoendi djojo', 1, 1),
('0497per', '639', 'Budidaya Kodok Unggul', 'Penebar Swadaya', 2003, 'Heru Susanto', 2, 1),
('0501ket', '637', 'Sale Ikan Lele', '', 0, 'Abbas Siregar', 1, 1),
('0502ket', '637', 'Manisan Buah 4', '', 0, 'Edi Soetanto', 1, 1),
('0504ket', '686', 'Ornamen unik kain perca ', '', 0, 'Mei Hidayat', 1, 1),
('0505pah', '923', 'Habis Gelap Terbitlah Terang', '', 0, 'Armijn Pane', 1, 1),
('0508pah', '923', 'Budi Utomo Cabang Betawi', '', 0, 'A Surjomihardjo', 1, 1),
('0512pah', '923', 'Perjalanan Bersahaja Sudirman', '', 0, 'Soekamto', 1, 1),
('0536pah', '923', 'Pangeran Antasari', '', 0, 'Hamlan Arpan', 1, 1),
('0540pah', '923', 'Dewi Sartika', '', 0, 'R Wiriatmadja', 1, 1),
('0543pah', '923', 'Haji Agus Salim', '', 0, 'Mukayat', 1, 1),
('0545pah', '923', 'Mohammad Hatta', '', 0, 'Imran', 1, 1),
('0546pah', '923', 'Ki Hajar Dewantoro', '', 0, 'Soeratman', 1, 1),
('0548pol', '923.2', 'Pandangan Suharto Pancasila', '', 0, 'Krissantono', 1, 1),
('0551pah', '923', 'r a Kartini', '', 0, 'Tashadi', 1, 1),
('0552pah', '923', 'Seri Pahlawan Nasional', '', 0, 'Harjana hp', 1, 1),
('0553pah', '923', 'Seri Pahlawan Kartini', '', 0, 'Tashadi', 1, 1),
('0557pen', '507', 'Mencintai Alam Indonesia', '', 1999, 'Saribi', 1, 1),
('0561nov', '813', 'Gerr', '', 0, 'Putu WIjaya', 1, 1),
('0562cer', '813', 'Sungkur dan Pena', '', 0, 'Ismadi', 1, 1),
('0563nov', '813', 'Teman Duduk', '', 0, 'Kasim', 1, 1),
('0564cer', '813', 'Sebening Embun Pagi', '', 0, 'Kusmawarti', 1, 1),
('0565cer', '923', 'Kartini pribadi mandiri', '', 0, 'Soebadio Haryati', 1, 1),
('0567cer', '959.8', 'Pengalaman Masa Revolusi', '', 0, 'Soebagijo', 1, 1),
('0571cer', '813', 'Dag Dig Dug', '', 0, 'Putu wijaya', 1, 1),
('0572cer', '813', 'Menjelang Merah Putih ', '', 0, 'H Zubir Mukti', 1, 1),
('0573cer', '813', 'Si Gando', '', 0, 'Ririn Eko', 1, 1),
('0574cer', '813', 'Salman Alfarisa', '', 0, 'Abdul Ghofur', 1, 1),
('0575per', '664', 'Dasar Ilmu Tanah', '', 0, 'Rahman Susanto', 1, 1),
('0576per', '635', 'Keladi Hias', '', 0, 'Tomassow Ina', 1, 1),
('0577ind', '670', 'Home Industri', '', 0, 'Nurdin Elyas', 1, 1),
('0578ket', '370.1', '110 Pengolahan Sukun', '', 2005, 'Zumiati', 1, 1),
('0579per', '664', 'Teknologi Pengolahan Pengawetan ', '', 0, 'Warisno', 1, 1),
('0582per', '635', 'Menanam Sayuran dipekarangan', '', 0, 'Tim red', 4, 1),
('0583nov', '813', 'Anek dot supi nasrudin', '', 0, 'Imam', 1, 1),
('0588pah', '297', 'Kenakalan Remaja', '', 2003, 'Priyatno', 1, 1),
('0592pah', '923', 'Tuanku Imam Bonjol', '', 0, 'Mardjani Martawin', 1, 1),
('0601nov', '791.5', 'Drona Rangsang', 'Penebar Swadaya', 1991, 'ibrahim, farid I', 8, 1),
('0618cer', '297', 'Meraih Rezeki', '', 2000, 'Ahmad Yasin', 3, 1),
('0621pen', '606', 'Kemitraan agrobisnis', '', 2005, 'Trisno Sumardjo', 4, 1),
('0626pen', '778', 'Kamera Lubang Jarum', '', 0, 'Drajad', 4, 1),
('0628pah', '923', 'Hos Cokro Aminoto', '', 0, 'Anhar Gonggong', 1, 1),
('0628per', '634', 'Budidaya Tebu', '', 0, 'Edi Sutardjo', 4, 1),
('0647cer', '398', 'Malin Kundang', '', 1997, 'Setiawan', 1, 1),
('0651pen', '621', 'Mesin Gerinda', '', 2005, 'Soedjono, bsc', 4, 1),
('0652pen', '746', 'Seni Kerajinan Membordir', '', 0, 'Soedjono, bsc', 4, 1),
('0653pen', '633', 'Bertenak Sapi Perah', '', 0, 'Aak', 4, 1),
('0654pen', '800', 'Rumah Kudus', 'Kelompok Studi Mekar', 1999, 'Triyanto', 2, 1),
('0659pen', '641', 'Pesona Pachypodium', '', 0, 'Joyo', 4, 1),
('0667pah', '923', 'Sultan Hasanudin Menentang', '', 0, 'Sagiman', 1, 1),
('0679pah', '923', 'Cut nyak din', '', 0, 'Muchtar Ibrahim', 1, 1),
('0682pen', '959.8', 'Sejarah Nasional III', 'Departemen Pendidikan', 1991, 'Nugroho Notosusanto', 2, 1),
('0687sej', '959.8', 'Sejarah Nasional II', 'Departemen Pendidikan', 1991, 'Nugroho Notosusanto', 2, 1),
('0693ket', '661', 'Membuat Cairan Pembersih', '', 0, 'Iyod Sirodjudan', 4, 1),
('0699pen', '621.31', 'Pintar Elektronik', '', 0, 'Agus Irawan', 1, 1),
('0751cer', '398', 'Ken Arok dan Ken Dedes', '', 1995, 'Yuliadi Soekardi', 1, 1),
('0757cer', '398', 'Kian Santang', '', 1995, 'Yuliadi Soekardi', 1, 1),
('0758cer', '398', 'Pangeran Kornel', '', 1995, 'Yuliadi Soekardi', 1, 1),
('0760cer', '398', 'Kerajaan Majapahit', '', 1995, 'Yuliadi Soekardi', 1, 1),
('0769ind', '959.9', 'Pemuda Indonesia', 'Kurnia Esa', 1991, 'Ahmaddani G-Marta', 2, 0),
('0774ind', '904', 'Sumbangsihku Bagi Pertiwi', 'Pustaka Jaya', 1981, 'Ny. Lasmidjah Hardi', 2, 1),
('0795cer', '813', 'Cerak Betawi 1', 'Gramedia Widiasarana', 1993, 'Rahmat Ali', 1, 1),
('0799pen', '363.4', 'Penyalahgunaan Narkotika', 'PT Yarsif Wantampone', 2005, 'Muhammad Yahya Rasyid', 2, 1),
('0803cer', '370.7', 'Peranan Media', '', 1990, 'Komkat', 4, 1),
('0804cer', '813', 'Kapitan Pattimura', '', 0, 'Harjana hp', 1, 1),
('0809pen', '746', 'Membordir', '', 0, 'Soedjono, bsc', 4, 1),
('0820pen', '900', 'Sejarah Revolusi Kemerdekaan', '', 0, 'Wiyono', 1, 1),
('0821pen', '620', 'Radio Transistor', '', 1998, '', 1, 1),
('0823pen', '651', 'Mengetik', '', 0, 'Hasanah Rukman', 4, 1),
('0826pen', '661', 'Membuat Cairan Pembersih Kaca', '', 0, 'Ajar permono', 4, 1),
('0844pen', '297', 'Menuju masyarakat Industri yang Islami', 'PT Nimas Multima', 1997, 'Ahmad Ghazali', 2, 1),
('0856pen', '959.8', 'Sejarah Nasional I', 'Departemen Pendidikan', 1991, 'Nugroho Notosusanto', 2, 1),
('0883per', '630', 'Subani', 'Sahabat', 1999, 'Asikin S.Pd', 2, 1),
('0891agm', '200', 'Penantian dinatara tanda', 'Gramedia', 2004, 'Margani', 3, 0),
('0917nov', '813', 'Menjaga Lingkungan ', '', 0, 'Inyoman Suaka', 7, 1),
('0934aga', '297', 'Tragedi Ukhuwah', '', 2000, 'Abu ammar', 3, 1),
('0935pen', '372.3', 'Sains di Sekitar Kita', 'CV. Citraunggul Laksana', 2003, 'Rudi darmawan', 2, 1),
('0956agm', '398.2', 'Kumpulan Cerita Gaib', '', 2000, 'Tri wahyono', 3, 1),
('0958agm', '211', 'Doa dan Dzikir', '', 1993, 'ashfiya f, nurul', 3, 1),
('0959agm', '2X4.1', 'Aqiqah dan Qurban', '', 2003, 'Sopandi', 3, 1),
('0967bhs', '421.55', 'Career, Aptitude and Selection Tests', 'Tiga Serangkai', 1993, 'Jim Barret', 9, 1),
('0969agm', '211', 'Agama Darwinisme', 'Tiga serangkai', 1993, 'yahya, harun', 3, 1),
('0970agm', '2X4.1', 'Mengupas Ibadah', '', 1993, 'siroj, zeanuri', 3, 1),
('0971agm', '2X4.2', 'Ibadah dan Hikmahnya', '', 1993, 'siroj, zeanuri', 3, 1),
('0972agm', '205', 'Perempuan dan Jilbab', 'Lentera', 1993, 'ibrahim, farid I', 3, 0),
('1007pen', '230', 'Pancaran Kasih', '', 2003, 'Sri Bhagawan', 3, 1),
('1010sej', '910.09', 'Catatan Perjalanan ', '', 0, 'Tanzil H.O.K', 7, 1),
('1017pen', '60', 'Cara Organisasi', '', 2003, 'Fauzi Ihsan', 5, 1),
('1018pen', '181.16', 'Musyawarah', 'Gramedia', 1990, 'Suparyanto', 5, 1),
('1019pen', '350', 'Kabinet Indonesia', '', 1995, 'Fidelera', 6, 1),
('1021cer', '200', 'Nabi Syuaib', 'Mitra Pustaka', 2004, 'Hilmi Ali Syaban', 1, 1),
('1022cer', '813', 'Lewat Tengah Malam', '', 1993, 'Gola gong', 1, 1),
('1024cer', '813', 'Bangku kosong', '', 1993, 'Ruwi Meita', 1, 1),
('1025agm', '200', 'Mukjizat SAW', 'Lentera', 1993, 'Rahimsyah', 3, 1),
('01430 Ips', '959.8', 'Selayang Pandang Kepulauan Riau', 'Intan Pariwara', 2008, 'Ir. Nugroho Yunanto', 5, 1),
('01425 Ips', '959.8', 'Selayang Pandang Nangro Aceh Darussalam', 'Intan Pariwara', 2009, 'Nunung Yuli Eti', 5, 1),
('00031 Penjas', '796.334', 'Bermain Sepak Takraw', 'Aneka Ilmu', 2010, 'Armelia F', 5, 1),
('00029 Penjas', '796.435', 'Atletik Cabang Lempar', 'Aneka Ilmu', 2010, 'Munasifah', 5, 4);

-- --------------------------------------------------------

--
-- Table structure for table `buku_masuk`
--

CREATE TABLE IF NOT EXISTS `buku_masuk` (
  `id_pemasukan` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `jumlah` int(11) NOT NULL,
  `id_buku` varchar(12) NOT NULL,
  PRIMARY KEY (`id_pemasukan`),
  KEY `FK_REFERENCE_4` (`id_buku`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=581 ;

--
-- RELATIONS FOR TABLE `buku_masuk`:
--   `id_buku`
--       `buku` -> `id_buku`
--

--
-- Dumping data for table `buku_masuk`
--

INSERT INTO `buku_masuk` (`id_pemasukan`, `tanggal`, `jumlah`, `id_buku`) VALUES
(265, '2014-03-19 18:17:45', 1, '0012sas'),
(266, '2014-03-19 18:17:45', 1, '0014sas'),
(267, '2014-03-19 18:17:45', 1, '0015sas'),
(270, '2014-03-19 18:17:45', 1, '0029cer'),
(271, '2014-03-19 18:17:45', 1, '0036cer'),
(272, '2014-03-19 18:17:45', 1, '0045cer'),
(273, '2014-03-19 18:17:45', 1, '0055cer'),
(274, '2014-02-26 10:18:58', 1, '0067cer'),
(580, '2014-04-26 22:28:16', 1, '56'),
(579, '2014-04-25 23:19:42', 1, '2'),
(277, '2014-03-19 18:17:45', 1, '0147cer'),
(278, '2014-03-19 18:17:45', 1, '0151cer'),
(279, '2014-03-19 18:17:45', 1, '0157cer'),
(280, '2014-03-19 18:17:45', 1, '0161nov'),
(281, '2014-03-19 18:17:45', 1, '0166cer'),
(282, '2014-03-19 18:17:45', 1, '0170cer'),
(283, '2014-02-26 10:18:59', 1, '0183cer'),
(284, '2014-03-19 18:17:45', 1, '0206nov'),
(285, '2014-02-26 10:18:59', 1, '0302nov'),
(286, '2014-02-26 10:18:59', 1, '0308cer'),
(287, '2014-02-26 10:18:59', 1, '0324cer'),
(288, '2014-03-19 18:17:45', 1, '0325cer'),
(289, '2014-03-19 18:17:45', 1, '0327cer'),
(290, '2014-03-19 18:17:45', 1, '0330cer'),
(291, '2014-03-19 18:17:45', 1, '0362cer'),
(292, '2014-03-19 18:17:45', 1, '0368pen'),
(293, '2014-03-19 18:17:45', 1, '0371pen'),
(294, '2014-02-26 10:19:00', 1, '0374pen'),
(295, '2014-02-26 10:19:00', 1, '0434per'),
(296, '2014-03-19 18:17:45', 1, '0492pen'),
(297, '2014-02-26 10:19:00', 1, '0497per'),
(298, '2014-02-26 10:19:00', 1, '0601nov'),
(299, '2014-03-19 18:17:45', 1, '0682pen'),
(300, '2014-03-19 18:17:45', 1, '0687sej'),
(301, '2014-03-19 18:17:45', 1, '0769ind'),
(302, '2014-03-19 18:17:45', 1, '0774ind'),
(303, '2014-02-26 10:19:00', 1, '0795cer'),
(304, '2014-02-26 10:19:00', 1, '0799pen'),
(305, '2014-03-19 18:17:45', 1, '0844pen'),
(306, '2014-03-19 18:17:45', 1, '0856pen'),
(307, '2014-02-26 10:19:00', 1, '0935pen'),
(308, '2014-03-19 18:17:45', 1, '0958agm'),
(309, '2014-02-26 10:19:00', 1, '0969agm'),
(310, '2014-02-26 10:19:01', 1, '0970agm'),
(311, '2014-02-26 10:19:01', 1, '0971agm'),
(312, '2014-03-19 18:17:45', 1, '0972agm'),
(313, '2014-02-26 10:19:01', 1, '1022cer'),
(314, '2014-02-26 10:19:01', 1, '1024cer'),
(315, '2014-02-26 10:19:01', 1, '1025agm'),
(316, '2014-03-19 18:17:45', 1, '0967bhs'),
(317, '2014-03-19 18:17:45', 1, '0654pen'),
(318, '2014-03-19 18:17:45', 1, '0883per'),
(319, '2014-02-26 10:19:01', 1, '0956agm'),
(320, '2014-02-26 10:19:01', 1, '0320cer'),
(321, '2014-02-26 10:19:01', 1, '0618cer'),
(322, '2014-02-26 10:19:01', 1, '0317pen'),
(323, '2014-03-19 18:17:45', 1, '0959agm'),
(324, '2014-02-26 10:19:01', 1, '0361agm'),
(325, '2014-02-26 10:19:01', 1, '1007pen'),
(326, '2014-02-26 10:19:01', 1, '0891agm'),
(327, '2014-02-26 10:19:02', 1, '0934aga'),
(328, '2014-02-26 10:19:02', 1, '1021cer'),
(329, '2014-02-26 10:19:02', 1, '0333cer'),
(330, '2014-02-26 10:19:02', 1, '0373pen'),
(331, '2014-02-26 10:19:02', 1, '0464pen'),
(332, '2014-02-26 10:19:02', 1, '0803cer'),
(333, '2014-03-19 18:17:45', 1, '0823pen'),
(334, '2014-02-26 10:19:02', 1, '0693ket'),
(335, '2014-03-19 18:17:45', 1, '0651pen'),
(336, '2014-02-26 10:19:02', 1, '0652pen'),
(337, '2014-03-19 18:17:45', 1, '0809pen'),
(338, '2014-02-26 10:19:02', 1, '0409ker'),
(339, '2014-02-26 10:19:02', 1, '0826pen'),
(340, '2014-02-26 10:19:02', 1, '0475pen'),
(341, '2014-02-26 10:19:02', 1, '0475pen'),
(342, '2014-02-26 10:19:02', 1, '0414ram'),
(343, '2014-02-26 10:19:02', 1, '0626pen'),
(344, '2014-02-26 10:19:03', 1, '0451pen'),
(345, '2014-02-26 10:19:03', 1, '0582per'),
(346, '2014-02-26 10:19:03', 1, '0450pen'),
(347, '2014-02-26 10:19:03', 1, '0659pen'),
(348, '2014-02-26 10:19:03', 1, '0628per'),
(349, '2014-02-26 10:19:03', 1, '0438per'),
(350, '2014-02-26 10:19:03', 1, '0653pen'),
(351, '2014-02-26 10:19:03', 1, '0420per'),
(352, '2014-02-26 10:19:03', 1, '1017pen'),
(353, '2014-02-26 10:19:03', 1, '1018pen'),
(354, '2014-02-26 10:19:03', 1, '1019pen'),
(355, '2014-02-26 10:19:03', 1, '0621pen'),
(356, '2014-02-26 10:19:03', 1, '0821pen'),
(357, '2014-02-26 10:19:03', 1, '0820pen'),
(358, '2014-02-26 10:19:03', 1, '0804cer'),
(359, '2014-02-26 10:19:03', 1, '0760cer'),
(360, '2014-02-26 10:19:03', 1, '0758cer'),
(361, '2014-02-26 10:19:03', 1, '0757cer'),
(362, '2014-02-26 10:19:04', 1, '0751cer'),
(363, '2014-02-26 10:19:04', 1, '0699pen'),
(364, '2014-02-26 10:19:04', 1, '0628pah'),
(365, '2014-02-26 10:19:04', 1, '0679pah'),
(366, '2014-03-19 18:17:45', 1, '0667pah'),
(367, '2014-02-26 10:19:04', 1, '0647cer'),
(368, '2014-02-26 10:19:04', 1, '1010sej'),
(369, '2014-02-26 10:19:04', 1, '0917nov'),
(370, '2014-03-19 18:17:45', 1, '0592pah'),
(371, '2014-02-26 10:19:04', 1, '0588pah'),
(372, '2014-02-26 10:19:04', 1, '0579per'),
(373, '2014-02-26 10:19:04', 1, '0583nov'),
(374, '2014-02-26 10:19:04', 1, '0578ket'),
(375, '2014-02-26 10:19:04', 1, '0577ind'),
(376, '2014-02-26 10:19:05', 1, '0576per'),
(377, '2014-02-26 10:19:05', 1, '0575per'),
(378, '2014-02-26 10:19:05', 1, '0574cer'),
(379, '2014-02-26 10:19:05', 1, '0573cer'),
(380, '2014-02-26 10:19:05', 1, '0572cer'),
(381, '2014-02-26 10:19:05', 1, '0571cer'),
(382, '2014-02-26 10:19:05', 1, '0567cer'),
(383, '2014-02-26 10:19:05', 1, '0565cer'),
(384, '2014-02-26 10:19:05', 1, '0564cer'),
(385, '2014-02-26 10:19:05', 1, '0563nov'),
(386, '2014-02-26 10:19:05', 1, '0562cer'),
(387, '2014-02-26 10:19:05', 1, '0561nov'),
(388, '2014-02-26 10:19:05', 1, '0557pen'),
(389, '2014-02-26 10:19:05', 1, '0553pah'),
(390, '2014-02-26 10:19:06', 1, '0552pah'),
(391, '2014-02-26 10:19:06', 1, '0551pah'),
(392, '2014-02-26 10:19:06', 1, '0548pol'),
(393, '2014-03-19 18:17:45', 1, '0546pah'),
(394, '2014-03-19 18:17:45', 1, '0545pah'),
(395, '2014-03-19 18:17:45', 1, '0543pah'),
(396, '2014-03-19 18:17:45', 1, '0540pah'),
(397, '2014-02-26 10:19:06', 1, '0536pah'),
(398, '2014-03-19 18:17:45', 1, '0512pah'),
(399, '2014-03-19 18:17:45', 1, '0508pah'),
(400, '2014-02-26 10:19:06', 1, '0505pah'),
(401, '2014-02-26 10:19:06', 1, '0504ket'),
(402, '2014-02-26 10:19:06', 1, '0502ket'),
(403, '2014-02-26 10:19:06', 1, '0501ket'),
(404, '2014-02-26 10:19:07', 1, '0496per'),
(405, '2014-02-26 10:19:07', 1, '0494per'),
(406, '2014-02-26 10:19:07', 1, '0493ket'),
(407, '2014-02-26 10:19:07', 1, '0490pen'),
(408, '2014-02-26 10:19:07', 1, '0488per'),
(409, '2014-02-26 10:19:07', 1, '0487ker'),
(410, '2014-02-26 10:19:07', 1, '0486per'),
(411, '2014-02-26 10:19:07', 1, '0485pen'),
(412, '2014-02-26 10:19:07', 1, '0481pen'),
(413, '2014-02-26 10:33:31', 1, '00029 Penjas'),
(414, '2014-02-26 10:34:46', 1, '00031 Penjas'),
(415, '2014-02-26 10:36:25', 1, '01425 Ips'),
(416, '2014-02-26 10:37:22', 1, '01430 Ips'),
(417, '2014-03-26 16:34:25', 1, '01430 Ips'),
(418, '2014-03-26 07:15:08', 1, '121'),
(419, '2014-03-26 17:36:34', 1, '123'),
(420, '2014-03-26 17:51:47', 1, '123'),
(421, '2014-03-26 17:58:00', 1, '123'),
(422, '2014-03-26 23:23:03', 1, '01425 Ips'),
(423, '2014-04-15 19:57:35', 1, '123d'),
(424, '2014-04-15 19:57:35', 1, ''),
(425, '2014-04-15 19:57:35', 1, ''),
(426, '2014-04-15 19:57:35', 1, ''),
(427, '2014-04-15 19:57:35', 1, ''),
(428, '2014-04-15 19:57:35', 1, ''),
(429, '2014-04-15 19:57:35', 1, ''),
(430, '2014-04-15 19:57:35', 1, ''),
(431, '2014-04-15 19:57:35', 1, ''),
(432, '2014-04-15 19:57:35', 1, ''),
(433, '2014-04-15 19:57:35', 1, ''),
(434, '2014-04-15 19:57:35', 1, ''),
(435, '2014-04-15 19:57:35', 1, ''),
(436, '2014-04-15 19:57:35', 1, ''),
(437, '2014-04-15 19:57:35', 1, ''),
(438, '2014-04-15 19:57:35', 1, ''),
(439, '2014-04-15 19:57:35', 1, ''),
(440, '2014-04-15 19:57:35', 1, ''),
(441, '2014-04-15 19:57:35', 1, ''),
(442, '2014-04-15 19:57:35', 1, ''),
(443, '2014-04-15 19:57:35', 1, ''),
(444, '2014-04-15 19:57:35', 1, ''),
(445, '2014-04-15 19:57:35', 1, ''),
(446, '2014-04-15 19:57:35', 1, ''),
(447, '2014-04-15 19:57:35', 1, ''),
(448, '2014-04-15 19:57:35', 1, ''),
(449, '2014-04-15 19:57:35', 1, ''),
(450, '2014-04-15 19:57:35', 1, ''),
(451, '2014-04-15 19:57:35', 1, ''),
(452, '2014-04-15 19:57:35', 1, ''),
(453, '2014-04-15 19:57:35', 1, ''),
(454, '2014-04-15 19:57:35', 1, ''),
(455, '2014-04-15 19:57:35', 1, ''),
(456, '2014-04-15 19:57:35', 1, ''),
(457, '2014-04-15 19:57:35', 1, ''),
(458, '2014-04-15 19:57:35', 1, ''),
(459, '2014-04-15 19:57:35', 1, ''),
(460, '2014-04-15 19:57:35', 1, ''),
(461, '2014-04-15 19:57:35', 1, ''),
(462, '2014-04-15 19:57:35', 1, ''),
(463, '2014-04-15 19:57:35', 1, ''),
(464, '2014-04-15 19:57:35', 1, ''),
(465, '2014-04-15 19:57:35', 1, ''),
(466, '2014-04-15 19:57:35', 1, ''),
(467, '2014-04-15 19:57:35', 1, ''),
(468, '2014-04-15 19:57:35', 1, ''),
(469, '2014-04-15 19:57:35', 1, ''),
(470, '2014-04-15 19:57:35', 1, ''),
(471, '2014-04-15 19:57:35', 1, ''),
(472, '2014-04-15 19:57:35', 1, ''),
(473, '2014-04-15 19:57:35', 1, ''),
(474, '2014-04-15 19:57:35', 1, ''),
(475, '2014-04-15 19:57:35', 1, ''),
(476, '2014-04-15 19:57:35', 1, ''),
(477, '2014-04-15 19:57:35', 1, ''),
(478, '2014-04-15 19:57:35', 1, ''),
(479, '2014-04-15 19:57:35', 1, ''),
(480, '2014-04-15 19:57:35', 1, ''),
(481, '2014-04-15 19:57:35', 1, ''),
(482, '2014-04-15 19:57:35', 1, ''),
(483, '2014-04-15 19:57:35', 1, ''),
(484, '2014-04-15 19:57:35', 1, ''),
(485, '2014-04-15 19:57:35', 1, ''),
(486, '2014-04-15 19:57:35', 1, ''),
(487, '2014-04-15 19:57:35', 1, ''),
(488, '2014-04-15 19:57:35', 1, ''),
(489, '2014-04-15 19:57:35', 1, ''),
(490, '2014-04-15 19:57:35', 1, ''),
(491, '2014-04-15 19:57:35', 1, ''),
(492, '2014-04-15 19:57:35', 1, ''),
(493, '2014-04-15 19:57:35', 1, ''),
(494, '2014-04-15 19:57:35', 1, ''),
(495, '2014-04-15 19:57:35', 1, ''),
(496, '2014-04-15 19:57:35', 1, ''),
(497, '2014-04-15 19:57:35', 1, ''),
(498, '2014-04-15 19:57:35', 1, ''),
(499, '2014-04-15 19:57:35', 1, ''),
(500, '2014-04-15 19:57:35', 1, ''),
(501, '2014-04-15 19:57:35', 1, ''),
(502, '2014-04-15 19:57:35', 1, ''),
(503, '2014-04-15 19:57:35', 1, ''),
(504, '2014-04-15 19:57:35', 1, ''),
(505, '2014-04-15 19:57:35', 1, ''),
(506, '2014-04-15 19:57:35', 1, ''),
(507, '2014-04-15 19:57:35', 1, ''),
(508, '2014-04-15 19:57:35', 1, ''),
(509, '2014-04-15 19:57:35', 1, ''),
(510, '2014-04-15 19:57:35', 1, ''),
(511, '2014-04-15 19:57:35', 1, ''),
(512, '2014-04-15 19:57:35', 1, ''),
(513, '2014-04-15 19:57:35', 1, ''),
(514, '2014-04-15 19:57:35', 1, ''),
(515, '2014-04-15 19:57:35', 1, ''),
(516, '2014-04-15 19:57:35', 1, ''),
(517, '2014-04-15 19:57:35', 1, ''),
(518, '2014-04-15 19:57:35', 1, ''),
(519, '2014-04-15 19:57:35', 1, ''),
(520, '2014-04-15 19:57:35', 1, ''),
(521, '2014-04-15 19:57:35', 1, ''),
(522, '2014-04-15 19:57:35', 1, ''),
(523, '2014-04-15 19:57:35', 1, ''),
(524, '2014-04-15 19:57:35', 1, ''),
(525, '2014-04-15 19:57:35', 1, ''),
(526, '2014-04-15 19:57:35', 1, ''),
(527, '2014-04-15 19:57:35', 1, ''),
(528, '2014-04-15 19:57:35', 1, ''),
(529, '2014-04-15 19:57:35', 1, ''),
(530, '2014-04-15 19:57:35', 1, ''),
(531, '2014-04-15 19:57:35', 1, ''),
(532, '2014-04-15 19:57:35', 1, ''),
(533, '2014-04-15 19:57:35', 1, ''),
(534, '2014-04-15 19:57:35', 1, ''),
(535, '2014-04-15 19:57:35', 1, ''),
(536, '2014-04-15 19:57:35', 1, ''),
(537, '2014-04-15 19:57:35', 1, ''),
(538, '2014-04-15 19:57:35', 1, ''),
(539, '2014-04-15 19:57:35', 1, ''),
(540, '2014-04-15 19:57:35', 1, ''),
(541, '2014-04-15 19:57:35', 1, ''),
(542, '2014-04-15 19:57:35', 1, ''),
(543, '2014-04-15 19:57:35', 1, ''),
(544, '2014-04-15 19:57:35', 1, ''),
(545, '2014-04-15 19:57:35', 1, ''),
(546, '2014-04-15 19:57:35', 1, ''),
(547, '2014-04-15 19:57:35', 1, ''),
(548, '2014-04-15 19:57:35', 1, ''),
(549, '2014-04-15 19:57:35', 1, ''),
(550, '2014-04-15 19:57:35', 1, ''),
(551, '2014-04-15 19:57:35', 1, ''),
(552, '2014-04-15 19:57:35', 1, ''),
(553, '2014-04-15 19:57:35', 1, ''),
(554, '2014-04-15 19:57:35', 1, ''),
(555, '2014-04-15 19:57:35', 1, ''),
(556, '2014-04-15 19:57:35', 1, ''),
(557, '2014-04-15 19:57:35', 1, ''),
(558, '2014-04-15 19:57:35', 1, ''),
(559, '2014-04-15 19:57:35', 1, ''),
(560, '2014-04-15 19:57:35', 1, ''),
(561, '2014-04-15 19:57:35', 1, ''),
(562, '2014-04-15 19:57:35', 1, ''),
(563, '2014-04-15 19:57:35', 1, ''),
(564, '2014-04-15 19:57:35', 1, ''),
(565, '2014-04-15 19:57:35', 1, ''),
(566, '2014-04-15 19:57:35', 1, ''),
(567, '2014-04-15 19:57:35', 1, ''),
(568, '2014-04-15 19:57:35', 1, ''),
(569, '2014-04-15 19:57:35', 1, ''),
(570, '2014-04-15 19:57:35', 1, ''),
(571, '2014-04-15 19:57:35', 1, ''),
(572, '2014-04-15 19:57:35', 1, ''),
(573, '2014-04-15 20:01:56', 1, '123'),
(574, '2014-04-19 00:47:16', 1, '00031 Penjas'),
(575, '2014-04-19 00:48:32', 1, '00029 Penjas'),
(576, '2014-04-19 02:26:34', 1, '23'),
(577, '2014-04-19 02:27:24', 1, '22'),
(578, '2014-04-19 02:27:36', 1, '233');

-- --------------------------------------------------------

--
-- Table structure for table `denda_terlambat`
--

CREATE TABLE IF NOT EXISTS `denda_terlambat` (
  `id_denda` int(4) NOT NULL AUTO_INCREMENT,
  `id_peminjaman` int(11) NOT NULL,
  `jumlah_hari_telat` int(11) NOT NULL,
  `denda` int(100) NOT NULL,
  PRIMARY KEY (`id_denda`),
  KEY `id_peminjaman` (`id_peminjaman`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- RELATIONS FOR TABLE `denda_terlambat`:
--   `id_peminjaman`
--       `peminjaman` -> `id_peminjaman`
--

--
-- Dumping data for table `denda_terlambat`
--

INSERT INTO `denda_terlambat` (`id_denda`, `id_peminjaman`, `jumlah_hari_telat`, `denda`) VALUES
(24, 68, 14, 14000),
(5, 48, 6, 3000),
(17, 64, 12, 12000);

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE IF NOT EXISTS `gallery` (
  `id_gallery` int(4) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `type` varchar(200) NOT NULL,
  `size` varchar(100) NOT NULL,
  `kategori` varchar(100) NOT NULL,
  `deskripsi` varchar(50) NOT NULL,
  PRIMARY KEY (`id_gallery`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=120 ;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id_gallery`, `name`, `type`, `size`, `kategori`, `deskripsi`) VALUES
(117, '1.jpg', 'image/jpeg', '102803', 'perpustakaan', ''),
(85, '3.jpg', 'image/jpeg', '99251', 'perpustakaan', ''),
(86, '4.jpg', 'image/jpeg', '93561', 'perpustakaan', ''),
(87, '5.jpg', 'image/jpeg', '92070', 'perpustakaan', ''),
(89, '8.jpg', 'image/jpeg', '99754', 'perpustakaan', ''),
(92, '12.jpg', 'image/jpeg', '162969', 'perpustakaan', ''),
(91, '7.jpg', 'image/jpeg', '84334', 'perpustakaan', ''),
(93, '11.jpg', 'image/jpeg', '107429', 'perpustakaan', ''),
(94, '100_4641.jpg', 'image/jpeg', '1318637', 'dokumentasi', ''),
(95, '100_4644.jpg', 'image/jpeg', '1353335', 'dokumentasi', ''),
(96, '100_4645.jpg', 'image/jpeg', '1350943', 'dokumentasi', ''),
(97, '100_4659.jpg', 'image/jpeg', '1357918', 'sekolah', ''),
(98, '100_4660.jpg', 'image/jpeg', '1361146', 'sekolah', ''),
(99, '100_4661.jpg', 'image/jpeg', '1353896', 'sekolah', ''),
(100, '100_4677.jpg', 'image/jpeg', '1348180', 'sekolah', ''),
(101, '100_4757.jpg', 'image/jpeg', '1310079', 'sekolah', ''),
(102, '100_4770.jpg', 'image/jpeg', '1364068', 'sekolah', ''),
(105, '100_4782.jpg', 'image/jpeg', '1365433', 'sekolah', ''),
(104, '100_4787.jpg', 'image/jpeg', '1346047', 'sekolah', ''),
(106, '100_4774.jpg', 'image/jpeg', '1391022', 'sekolah', ''),
(107, 'Foto0107.jpg', 'image/jpeg', '364513', 'sekolah', ''),
(108, '100_4727.jpg', 'image/jpeg', '1350260', 'dokumentasi', ''),
(109, '100_4736.jpg', 'image/jpeg', '1355220', 'dokumentasi', ''),
(110, '100_4723.jpg', 'image/jpeg', '1353552', 'dokumentasi', ''),
(111, '100_4722.jpg', 'image/jpeg', '1341718', 'dokumentasi', ''),
(112, '100_4652.jpg', 'image/jpeg', '1333568', 'dokumentasi', ''),
(113, '100_4650.jpg', 'image/jpeg', '1361257', 'dokumentasi', '');

-- --------------------------------------------------------

--
-- Table structure for table `kasus`
--

CREATE TABLE IF NOT EXISTS `kasus` (
  `id_kasus` int(11) NOT NULL AUTO_INCREMENT,
  `id_anggota` varchar(9) NOT NULL,
  `id_buku` int(12) NOT NULL,
  `jenis_kasus` varchar(10) NOT NULL,
  `tgl_kasus` date NOT NULL,
  PRIMARY KEY (`id_kasus`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- RELATIONS FOR TABLE `kasus`:
--   `id_anggota`
--       `siswa` -> `nis`
--   `id_buku`
--       `buku` -> `id_buku`
--

--
-- Dumping data for table `kasus`
--

INSERT INTO `kasus` (`id_kasus`, `id_anggota`, `id_buku`, `jenis_kasus`, `tgl_kasus`) VALUES
(2, '11296-13', 1024, 'Rusak', '2014-04-11');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_buku`
--

CREATE TABLE IF NOT EXISTS `kategori_buku` (
  `id_kategori` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kategori` longtext NOT NULL,
  PRIMARY KEY (`id_kategori`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `kategori_buku`
--

INSERT INTO `kategori_buku` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Fiksi'),
(2, 'Non Fiksi'),
(3, 'Agama'),
(4, 'Ilmu Pasti'),
(5, 'Ilmu Pengetahuan'),
(6, 'Sejarah Geografi'),
(7, 'Reference'),
(8, 'Bahasa Jawa'),
(9, 'Bahasa');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_petunjuk`
--

CREATE TABLE IF NOT EXISTS `kategori_petunjuk` (
  `id_kategori` int(2) NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(100) NOT NULL,
  PRIMARY KEY (`id_kategori`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `kategori_petunjuk`
--

INSERT INTO `kategori_petunjuk` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Petunjuk Umum'),
(2, 'Petunjuk Khusus');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_profil`
--

CREATE TABLE IF NOT EXISTS `kategori_profil` (
  `id_kategori` int(2) NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(100) NOT NULL,
  PRIMARY KEY (`id_kategori`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `kategori_profil`
--

INSERT INTO `kategori_profil` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Visi'),
(2, 'Misi');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE IF NOT EXISTS `kelas` (
  `id_kelas` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kelas` longtext NOT NULL,
  PRIMARY KEY (`id_kelas`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `nama_kelas`) VALUES
(12, 'Reguler'),
(13, 'Bilingual');

-- --------------------------------------------------------

--
-- Table structure for table `konter`
--

CREATE TABLE IF NOT EXISTS `konter` (
  `ip` varchar(20) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `tanggal` date NOT NULL,
  `hits` int(10) NOT NULL DEFAULT '1',
  `online` varchar(255) NOT NULL,
  PRIMARY KEY (`ip`,`tanggal`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `konter`
--

INSERT INTO `konter` (`ip`, `tanggal`, `hits`, `online`) VALUES
('::1', '2014-04-19', 31, '1397926327'),
('::1', '2014-04-20', 18, '1397961077'),
('::1', '2014-04-21', 1, '1398080433'),
('::1', '2014-04-22', 3, '1398153835'),
('::1', '2014-04-24', 53, '1398372740'),
('::1', '2014-04-25', 17, '1398467965'),
('::1', '2014-04-26', 24, '1398554580'),
('127.0.0.1', '2014-04-26', 21, '1398525006');

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE IF NOT EXISTS `peminjaman` (
  `id_peminjaman` int(11) NOT NULL AUTO_INCREMENT,
  `nis` varchar(9) NOT NULL,
  `id_buku` varchar(12) NOT NULL,
  `tanggal_pinjam` date NOT NULL,
  `tanggal_kembali` date NOT NULL,
  `jumlah` int(11) NOT NULL,
  `status_peminjaman` int(11) NOT NULL DEFAULT '1',
  `bulan_peminjaman` int(2) NOT NULL,
  `tahun_peminjaman` int(8) NOT NULL,
  PRIMARY KEY (`id_peminjaman`),
  KEY `FK_REFERENCE_6` (`id_buku`),
  KEY `FK_REFERENCE_7` (`nis`),
  KEY `id_buku` (`id_buku`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=69 ;

--
-- RELATIONS FOR TABLE `peminjaman`:
--   `id_buku`
--       `buku` -> `id_buku`
--   `nis`
--       `siswa` -> `nis`
--

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`id_peminjaman`, `nis`, `id_buku`, `tanggal_pinjam`, `tanggal_kembali`, `jumlah`, `status_peminjaman`, `bulan_peminjaman`, `tahun_peminjaman`) VALUES
(57, '11294-13', '0969agm', '2014-04-02', '2014-04-02', 1, 0, 4, 2014),
(50, '11296-13', '0883per', '2014-03-19', '2014-04-02', 1, 0, 3, 2014),
(54, '11294-13', '0969agm', '2014-03-27', '2014-04-02', 1, 0, 3, 2014),
(55, '11296-13', '01425 Ips', '2014-03-25', '2014-03-30', 1, 0, 3, 2014),
(56, '11293-13', '01430 Ips', '2014-03-27', '2014-04-02', 1, 0, 3, 2014),
(66, '11296-13', '01430 Ips', '2014-04-20', '2014-04-20', 1, 0, 4, 2014),
(67, '11296-13', '0969agm', '2014-04-10', '2014-04-17', 1, 1, 4, 2014),
(68, '11296-13', '00029 Penjas', '2014-04-03', '2014-04-26', 1, 0, 4, 2014);

-- --------------------------------------------------------

--
-- Table structure for table `pengadaan_buku`
--

CREATE TABLE IF NOT EXISTS `pengadaan_buku` (
  `id_pengadaan` int(10) NOT NULL AUTO_INCREMENT,
  `toko_buku` varchar(100) NOT NULL,
  `total_buku` int(10) NOT NULL,
  `tanggal_terima` date NOT NULL,
  `keterangan` varchar(20) NOT NULL,
  `total_harga` int(20) NOT NULL,
  `penerbit` varchar(20) NOT NULL,
  `pengirim` varchar(30) NOT NULL,
  PRIMARY KEY (`id_pengadaan`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Table structure for table `pengaturan`
--

CREATE TABLE IF NOT EXISTS `pengaturan` (
  `id_pengaturan` int(11) NOT NULL AUTO_INCREMENT,
  `max_buku` int(2) NOT NULL,
  `max_hari_pinjam` int(2) NOT NULL,
  `denda_terlambat` int(100) NOT NULL,
  `denda_max` int(10) NOT NULL,
  `status_pengaturan` int(1) NOT NULL,
  PRIMARY KEY (`id_pengaturan`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `pengaturan`
--

INSERT INTO `pengaturan` (`id_pengaturan`, `max_buku`, `max_hari_pinjam`, `denda_terlambat`, `denda_max`, `status_pengaturan`) VALUES
(10, 2, 7, 1000, 5000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pengunjung`
--

CREATE TABLE IF NOT EXISTS `pengunjung` (
  `id_pengunjung` int(10) NOT NULL AUTO_INCREMENT,
  `nis` varchar(9) NOT NULL,
  `tanggal` date NOT NULL,
  `bulan` int(2) NOT NULL,
  `tahun` int(5) NOT NULL,
  PRIMARY KEY (`id_pengunjung`),
  KEY `nis` (`nis`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- RELATIONS FOR TABLE `pengunjung`:
--   `nis`
--       `siswa` -> `nis`
--

--
-- Dumping data for table `pengunjung`
--

INSERT INTO `pengunjung` (`id_pengunjung`, `nis`, `tanggal`, `bulan`, `tahun`) VALUES
(1, '10645-11', '2014-03-05', 3, 2014);

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE IF NOT EXISTS `petugas` (
  `nip` varchar(15) NOT NULL,
  `nama_petugas` longtext NOT NULL,
  `password` longtext NOT NULL,
  `kategori_petugas` int(11) NOT NULL,
  PRIMARY KEY (`nip`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`nip`, `nama_petugas`, `password`, `kategori_petugas`) VALUES
('111', 'Muhammad Rizal Efendi', '402a186ee2ae1ee010ae64866f1fd946', 1),
('S1107-1982', 'Tri Atmojo Yulianto', '3a12a980d4036add56f557b18c564386', 2),
('petugas', 'Rizal', 'afb91ef692fd08c445e8cb1bab2ccf9c', 2);

-- --------------------------------------------------------

--
-- Table structure for table `petunjuk`
--

CREATE TABLE IF NOT EXISTS `petunjuk` (
  `id_petunjuk` int(2) NOT NULL AUTO_INCREMENT,
  `isi` varchar(200) NOT NULL,
  `id_kategori` int(2) NOT NULL,
  PRIMARY KEY (`id_petunjuk`),
  KEY `id_kategori` (`id_kategori`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- RELATIONS FOR TABLE `petunjuk`:
--   `id_kategori`
--       `kategori_petunjuk` -> `id_kategori`
--

--
-- Dumping data for table `petunjuk`
--

INSERT INTO `petunjuk` (`id_petunjuk`, `isi`, `id_kategori`) VALUES
(9, 'Buku/majalah yang sudah selesai dibaca harap dikembalikan kerak semula', 2),
(10, 'Buku referensi hanya boleh dibaca diruang Perpustakaan', 2),
(11, 'Tidak bisa menggunakan kartu peminjaman orang lain untuk meminjam buku di Perpustakaan', 2),
(12, 'Peminjam wajib mengembalikan buku tepat waktu', 1),
(13, 'Peminjam wajib merawat buku yang dipinjam dengan baik', 2),
(14, 'Menghilangkan atau merusakan buku Perpustakaan menjadi tanggung jawab peminjam', 2),
(16, 'Peminjaman maksimal 3 eksmplar', 2),
(17, 'Setiap pengunjung harap mengisi buku tamu', 1),
(18, 'Pengunjung tidak membawa tas dalam ruang perpustakaan', 2),
(19, 'Harap menjaga ketertiban,ketenangan, dan tidak membuat kegaduhan', 1),
(20, 'Tidak diperkenankan memindahkan buku dan peralatan perpustakaan', 1),
(21, 'Dilarang membuat coretan atau tulisan pada buku / majalah dan ruangan perpustakaan', 1),
(22, 'Ikut menjaga kebersihan ruang perpustakaan', 1);

-- --------------------------------------------------------

--
-- Table structure for table `profil`
--

CREATE TABLE IF NOT EXISTS `profil` (
  `id_profil` int(2) NOT NULL AUTO_INCREMENT,
  `isi` varchar(100) NOT NULL,
  `id_kategori` int(2) NOT NULL,
  PRIMARY KEY (`id_profil`),
  KEY `id_kategori` (`id_kategori`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- RELATIONS FOR TABLE `profil`:
--   `id_kategori`
--       `kategori_profil` -> `id_kategori`
--

--
-- Dumping data for table `profil`
--

INSERT INTO `profil` (`id_profil`, `isi`, `id_kategori`) VALUES
(8, 'Terwujudnya pendidikan yang adil dan merata', 1),
(9, 'Terwujudnya pendidikan yang bermutu, efisien, dan relevan serta berdaya saing tinggi', 1),
(11, 'Mewujudkan pendidikan yang bermutu, efisien, dan relevan serta berdaya saing tinggi', 2),
(12, 'Terwujudnya pengembangan kurikulum tingkat satuan pendidikan ', 1),
(13, 'Terwujudnya prestasi akademik yang unggul', 1),
(14, 'Terwujudnya proses pembelajaran dan kelulusan yang unggul ', 1),
(15, 'Terwujudnya prasarana yang unggul', 1),
(16, 'Terwujudnya media pembelajaran yang unggul ', 1),
(17, 'Terwujudnya managemen sekolah yang unggul', 1),
(18, 'Terwujudnya SDM pendidikan yang unggul', 1),
(19, 'Terwujudnya prestasi non akademik yang unggul', 1),
(20, 'Terwujudnya IMTAQ yang unggul', 1),
(21, 'Mewujudkan pendidikan yang adil dan merata', 2),
(22, 'Mewujudkan pendidikan yang bermutu, efisien, dan relevan serta berdaya saing tinggi', 2),
(23, 'Mewujudkan pengembangan kurikulum tingkat satuan pendidikan yang lengkap', 2),
(24, 'Mewujudkan prestasi akademik yang unggul ', 2),
(25, 'Mewujudkan proses pengembangan dan kelulusan yang unggul', 2),
(26, 'Mewujudkan sarana prasarana yang unggul', 2),
(27, 'Mewujudkan media pembelajaran yang unggul', 2),
(28, 'Mewujudkan managemen sekolah yang unggul', 2),
(29, 'Mewujudkan SDM Pendidikan yang unggul', 2),
(30, 'Mewujudkan prestasi non Akademik yang unggul', 2),
(31, 'Mewujudkan IMTAQ yang unggul', 2);

-- --------------------------------------------------------

--
-- Table structure for table `riwayat_login`
--

CREATE TABLE IF NOT EXISTS `riwayat_login` (
  `id_riwayat` int(11) NOT NULL AUTO_INCREMENT,
  `IP` varchar(20) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `status` varchar(10) NOT NULL,
  `password` varchar(100) NOT NULL,
  `waktu_masuk` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_riwayat`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=175 ;

--
-- Dumping data for table `riwayat_login`
--

INSERT INTO `riwayat_login` (`id_riwayat`, `IP`, `id_user`, `nama`, `status`, `password`, `waktu_masuk`) VALUES
(160, '::1', 111, 'Muhammad Rizal Efendi', 'Admin', '402a186ee2ae1ee010ae64866f1fd946', '2014-04-20 02:04:46'),
(161, '::1', 111, 'Muhammad Rizal Efendi', 'Admin', '402a186ee2ae1ee010ae64866f1fd946', '2014-04-22 08:03:42'),
(162, '::1', 111, 'Muhammad Rizal Efendi', 'Admin', '402a186ee2ae1ee010ae64866f1fd946', '2014-04-24 02:19:11'),
(163, '::1', 111, 'Muhammad Rizal Efendi', 'Admin', '402a186ee2ae1ee010ae64866f1fd946', '2014-04-24 02:31:16'),
(164, '::1', 0, 'Rizal', 'Petugas', 'afb91ef692fd08c445e8cb1bab2ccf9c', '2014-04-24 02:32:26'),
(165, '::1', 11296, 'Hamdan Febriyanto', 'Anggota', '3a12a980d4036add56f557b18c564386', '2014-04-24 02:45:02'),
(166, '::1', 111, 'Muhammad Rizal Efendi', 'Admin', '402a186ee2ae1ee010ae64866f1fd946', '2014-04-24 03:43:25'),
(167, '::1', 111, 'Muhammad Rizal Efendi', 'Admin', '402a186ee2ae1ee010ae64866f1fd946', '2014-04-24 17:06:58'),
(168, '::1', 0, 'Rizal', 'Petugas', 'afb91ef692fd08c445e8cb1bab2ccf9c', '2014-04-25 10:44:14'),
(169, '::1', 111, 'Muhammad Rizal Efendi', 'Admin', '402a186ee2ae1ee010ae64866f1fd946', '2014-04-25 14:38:36'),
(170, '::1', 111, 'Muhammad Rizal Efendi', 'Admin', '402a186ee2ae1ee010ae64866f1fd946', '2014-04-25 22:51:34'),
(171, '::1', 111, 'Muhammad Rizal Efendi', 'Admin', '402a186ee2ae1ee010ae64866f1fd946', '2014-04-26 06:23:04'),
(172, '::1', 111, 'Muhammad Rizal Efendi', 'Admin', '402a186ee2ae1ee010ae64866f1fd946', '2014-04-26 06:24:03'),
(173, '::1', 0, 'Rizal', 'Petugas', 'afb91ef692fd08c445e8cb1bab2ccf9c', '2014-04-26 09:54:31'),
(174, '::1', 111, 'Muhammad Rizal Efendi', 'Admin', '402a186ee2ae1ee010ae64866f1fd946', '2014-04-26 22:17:53');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE IF NOT EXISTS `siswa` (
  `nis` varchar(9) NOT NULL,
  `nama` longtext NOT NULL,
  `password` longtext NOT NULL,
  `status` int(2) NOT NULL DEFAULT '3',
  `id_kelas` int(11) NOT NULL,
  `no_hp` int(13) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`nis`),
  KEY `id_kelas` (`id_kelas`),
  KEY `id_kelas_2` (`id_kelas`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- RELATIONS FOR TABLE `siswa`:
--   `id_kelas`
--       `kelas` -> `id_kelas`
--

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`nis`, `nama`, `password`, `status`, `id_kelas`, `no_hp`, `alamat`, `foto`) VALUES
('10466-10', 'Kharisma Olivia A C', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('10579-10', 'Ristya Vibiyana', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('10641-11', 'Aulia Putri Sabilla', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('10643-11', 'Dhia Fauziah Rahman ', '3a12a980d4036add56f557b18c564386', 3, 13, NULL, NULL, NULL),
('10645-11', 'Iftiha Brillyant', '3a12a980d4036add56f557b18c564386', 3, 13, NULL, NULL, NULL),
('10648-11', 'Linda Suryani', '3a12a980d4036add56f557b18c564386', 3, 13, NULL, NULL, NULL),
('10649-11', 'Lintang Aulia', '3a12a980d4036add56f557b18c564386', 3, 13, NULL, NULL, NULL),
('10650-11', 'Magma Bumi Rachmani', '3a12a980d4036add56f557b18c564386', 3, 13, NULL, NULL, NULL),
('10651-11', 'Pradinda Ratna Utami', '3a12a980d4036add56f557b18c564386', 3, 13, NULL, NULL, NULL),
('10654-11', 'Sinta Dewi Wijayanti', '3a12a980d4036add56f557b18c564386', 3, 13, NULL, NULL, NULL),
('10669-11', 'Anita Masdasari', '3a12a980d4036add56f557b18c564386', 3, 13, NULL, NULL, NULL),
('10672-11', 'Erlin Hapsari', '3a12a980d4036add56f557b18c564386', 3, 13, NULL, NULL, NULL),
('10673-11', 'Fina Alfiana Yasmin', '3a12a980d4036add56f557b18c564386', 3, 13, NULL, NULL, NULL),
('10680-11', 'Resita Wardani', '3a12a980d4036add56f557b18c564386', 3, 13, NULL, NULL, NULL),
('10683-11', 'Zahrotul Jannah', '3a12a980d4036add56f557b18c564386', 3, 13, NULL, NULL, NULL),
('10693-11', 'Anggraini Lenny', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('10696-11', 'Bella Suci Afitasari', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('10700-11', 'Fauziah Wahyu Lestari', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('10704-11', 'Luthfi Nur Afifah', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('10705-11', 'Margaretha Ella', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('10707-11', 'Oktavia Kusumo Dewi', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('10708-12', 'Olivia Wahyu Kusumaningtyas', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('10709-11', 'Rohmah Nur Hidayah', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('10710-11', 'Sarah Anita', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('10712-11', 'Wahidah', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('10719-11', 'Bima Kurniawan', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('10721-11', 'Merdeka Agung', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('10722-11', 'Mustain Rhozaly', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('10729-11', 'Wisnu Utomo', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('10736-11', 'Firdausiana Shofia Maghfiroh', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('10738-11', 'Izzah Nur Fitriani', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('10739-11', 'Lathifa Nurani Putri', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('10742-11', 'Nur Cahya Khoironi', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('10743-12', 'Araafiona Chandra Kusuma', '3a12a980d4036add56f557b18c564386', 3, 13, NULL, NULL, NULL),
('10745-12', 'Aulia Haniffiah', '3a12a980d4036add56f557b18c564386', 3, 13, NULL, NULL, NULL),
('10746-11', 'Widi Bianglala', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('10754-12', 'Febrita Rahmawati', '3a12a980d4036add56f557b18c564386', 3, 13, NULL, NULL, NULL),
('10757-12', 'Hima Mei Shaebani', '3a12a980d4036add56f557b18c564386', 3, 13, NULL, NULL, NULL),
('10758-12', 'Indah Putri Yuliani', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('10759-12', 'Inna Laili Rahmawati', '3a12a980d4036add56f557b18c564386', 3, 13, NULL, NULL, NULL),
('10760-12', 'Intan Puspita Sari', '3a12a980d4036add56f557b18c564386', 3, 13, NULL, NULL, NULL),
('10761-12', 'Izza Nur Fiuziah', '3a12a980d4036add56f557b18c564386', 3, 13, NULL, NULL, NULL),
('10763-12', 'Kanaka Ruth Prasanti', '3a12a980d4036add56f557b18c564386', 3, 13, NULL, NULL, NULL),
('10764-12', 'Monika Laraswati', '3a12a980d4036add56f557b18c564386', 3, 13, NULL, NULL, NULL),
('10765-12', 'M. Masmahendra', '3a12a980d4036add56f557b18c564386', 3, 13, NULL, NULL, NULL),
('10767-12', 'Purti Dharmestuti A', '3a12a980d4036add56f557b18c564386', 3, 13, NULL, NULL, NULL),
('10768-11', 'Anggun Lestari Ningtyastuti', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('10768-12', 'Sabrang Jolonidi', '3a12a980d4036add56f557b18c564386', 3, 13, NULL, NULL, NULL),
('10769-12', 'Sasandra Rahmadani Putri', '3a12a980d4036add56f557b18c564386', 3, 13, NULL, NULL, NULL),
('10770-12', 'Tamara Gita Lorenza', '3a12a980d4036add56f557b18c564386', 3, 13, NULL, NULL, NULL),
('10771-11', 'Dyah Isdiyarti', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('10771-12', 'Tegar Satrian', '3a12a980d4036add56f557b18c564386', 3, 13, NULL, NULL, NULL),
('10772-12', 'Iinhana Rohmahtika', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('10773-11', 'Ismiarin Mufidah P', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('10774-11', 'Kurnia Rizqi Damayanti', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('10774-12', 'Adha Nisfatulsanah', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('10777-12', 'Andre Bagus Yudistira', '3a12a980d4036add56f557b18c564386', 3, 13, NULL, NULL, NULL),
('10780-12', 'Asa Pratiwi', '3a12a980d4036add56f557b18c564386', 3, 13, NULL, NULL, NULL),
('10781-12', 'Ayu Choirunnisa Supriyanto', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('10783-12', 'Bagas Hendrayudha', '3a12a980d4036add56f557b18c564386', 3, 13, NULL, NULL, NULL),
('10784-12', 'Wahidah Annisa Utami', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('10785-11', 'Wulan Anggriani', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('10785-12', 'Devira Ulva Permatasari', '3a12a980d4036add56f557b18c564386', 3, 13, NULL, NULL, NULL),
('10786-12', 'Dea Ajun', '3a12a980d4036add56f557b18c564386', 3, 13, NULL, NULL, NULL),
('10787-12', 'Diki Wahyu Saputra ', '3a12a980d4036add56f557b18c564386', 3, 13, NULL, NULL, NULL),
('10788-12', 'Dinda Putri Hariyanti', '3a12a980d4036add56f557b18c564386', 3, 13, NULL, NULL, NULL),
('10789-11', 'Bagus Tri Darmadi', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('10789-12', 'Dita Dwi Sejati', '3a12a980d4036add56f557b18c564386', 3, 13, NULL, NULL, NULL),
('10790-12', 'Ficky Febriyan Nur Roqim', '3a12a980d4036add56f557b18c564386', 3, 13, NULL, NULL, NULL),
('10793-12', 'Okto Kusuma Putra', '3a12a980d4036add56f557b18c564386', 3, 13, NULL, NULL, NULL),
('10794-12', 'Putri Berlyanti', '3a12a980d4036add56f557b18c564386', 3, 13, NULL, NULL, NULL),
('10797-12', 'Ichsan Syafii', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('10798-12', 'Shoffa Noor Faizah', '3a12a980d4036add56f557b18c564386', 3, 13, NULL, NULL, NULL),
('10799-12', 'Tantri Hananti Putri', '3a12a980d4036add56f557b18c564386', 3, 13, NULL, NULL, NULL),
('10800-12', 'Zilda Kurniawan Rifaai', '3a12a980d4036add56f557b18c564386', 3, 13, NULL, NULL, NULL),
('10803-12', 'Andreas Bagas Satria Jati', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('10804-12', 'Andri Ramadhan', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('10806-11', 'Arifa Nurul Aziz', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('10809-11', 'Emi Ayu Anggraini ', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('10809-12', 'Danu Aji Setiawan', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('10810-12', 'Dhimas Hari Sutikno', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('10811-12', 'Diah Nur Utami ', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('10812-11', 'Hanifah Dwi S', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('10814-11', 'Isnaini Dyah N.', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('10816-12', 'Eka Retno Hendrani', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('10817-11', 'Nabilla Fadila Haya', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('10818-11', 'Rifki Widya Murti', '3a12a980d4036add56f557b18c564386', 3, 13, NULL, NULL, NULL),
('10821-12', 'Lilia Atma Yuana', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('10823-12', 'Maria Sendang Bening', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('10834-12', 'Risa Septania Dyah P D', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('10836-12', 'Yesi Novita Sari', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('10837-12', 'Yohanes Andika Prasetyo', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('10839-12', 'Abdul Hafizh Lubis', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('10841-12', 'Afifah Wahyuning Ramadany', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('10842-12', 'Ahya Alimah Rahmah', '3a12a980d4036add56f557b18c564386', 3, 13, NULL, NULL, NULL),
('10843-12', 'Alfi Sholihati ', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('10845-12', 'Andri Apriyanto', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('10847-12', 'Arifin Nur Maulana', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('10849-12', 'Devi Diana Suci', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('10850-12', 'Diana Putri Utami', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('10851-12', 'Endang Lestari', '3a12a980d4036add56f557b18c564386', 3, 13, NULL, NULL, NULL),
('10854-12', 'Wayan Diki Atmaja', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('10855-12', 'Inka Yuliana', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('10857-12', 'Jihad Hafid Ramadhan', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('10858-12', 'Jihan Sahla Nabila', '3a12a980d4036add56f557b18c564386', 3, 13, NULL, NULL, NULL),
('10860-12', 'Kirana Marwah Kusumani', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('10861-12', 'Klarisa Erlina Putri', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('10862-12', 'Larasati Sendy Putriyani', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('10863-12', 'Lupi Nugraheni', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('10864-12', 'Muhammad Bayu Avirama', '3a12a980d4036add56f557b18c564386', 3, 13, NULL, NULL, NULL),
('10870-12', 'Ramadhina Nurdianti', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('10871-12', 'Risky Handayani', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('10872-12', 'Rizqi Pratama Kurnia', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('10875-12', 'Taufik Aji Pangestu', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('10876-12', 'Wulan Arroyani', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('10879-12', 'Aga Arum Indrianti', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('10880-12', 'Alwi Halan Nasrulloh', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('10881-12', 'Andini Siwi Pamungkas', '3a12a980d4036add56f557b18c564386', 3, 13, NULL, NULL, NULL),
('10884-12', 'Ajun Mahendra', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('10885-12', 'Alvina Damayanti', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('10886-12', 'Ayulia Citra Kusuma Dessy', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('10888-12', 'Berni Pralingga', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('10891-12', 'Destya Jihan Rismawati', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('10892-12', 'Elingga Widi Pangestu', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('10893-12', 'Erlinda Prihatin Utami', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('10894-12', 'Erwin Dwi Yulianto', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('10895-12', 'Faradilla', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('10896-12', 'Fitri Wandasari', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('10897-12', 'Iftitah Arumsari', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('10898-12', 'Ikhwan Sholeh', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('10899-12', 'Indah Diani', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('10900-12', 'Intan Ashari', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('10901-12', 'Isla Manda Sofdanita', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('10905-12', 'Lanny Rahma Kusumawati', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('10907-12', 'Muhammad Khoirul Anami', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('10908-12', 'Muhammad Zidan Lfrizi', '3a12a980d4036add56f557b18c564386', 3, 13, NULL, NULL, NULL),
('10909-12', 'Muthmainah Nur Hanifah', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('10910-12', 'Nataya Sekarwangi', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('10912-12', 'Nur Fajar Hidayatulloh', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('10913-12', 'Rizqi Aprilia Puspitasari', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('10915-12', 'Shinta Nuril Airin', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('10917-12', 'Yofan Alfiatur Rohman', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('10918-12', 'Aini Nur Khasanah', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('10921-12', 'Aprilia Damayanti', '3a12a980d4036add56f557b18c564386', 3, 13, NULL, NULL, NULL),
('10922-12', 'Bagas Dwi Kritanto', '3a12a980d4036add56f557b18c564386', 3, 13, NULL, NULL, NULL),
('10923-12', 'Cindy Yunitasari', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('10924-12', 'Deffa Aqshal Athallah', '3a12a980d4036add56f557b18c564386', 3, 13, NULL, NULL, NULL),
('10925-12', 'Danar tejo Waskitho', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('10926-11', 'Shinta Pasmawati', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('10927-12', 'Devy Ratna Kumala Sari', '3a12a980d4036add56f557b18c564386', 3, 13, NULL, NULL, NULL),
('10930-12', 'Ferdian Yudha Purnama', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('10931-12', 'Galih Abrityan Sukma', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('10932-12', 'Hasna Umita Mawadah', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('10936-12', 'Kanisha Noviana Deva', '3a12a980d4036add56f557b18c564386', 3, 13, NULL, NULL, NULL),
('10937-12', 'Mahar Surya Malacca', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('10938-12', 'Mega Seta Dinopember', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('10940-12', 'Muhammad Ridwan', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('10941-12', 'Nadilla Putri Anggi Azhari', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('10942-12', 'Oktaviana Sekar A.L', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('10943-12', 'Riana Winda Dwei', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('10945-12', 'Rosa Septi Anjeli', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('10946-12', 'Rosi Nur Indah Sari', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('10947-12', 'Rosyid Nur Rohman', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('10948-12', 'Septiana Owi Nugrahani', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('10951-12', 'Tri Yuliana', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('10953-12', 'Vannesa Adenia Wilmar', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('10954-12', 'Vionitto Herrosi Pratama', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('10955-12', 'Zahwa Salsabila W B', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('11057-13', 'Adimas Setiawan ', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('11059-13', 'Aldi Maulana', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('11061-13', 'Andreas Novyanto', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('11062-13', 'Arif Hendriyanto', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('11063-13', 'Aulia Puspa Anggrahini', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('11066-13', 'Dewi Trianita', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('11069-13', 'Eka Rizqy Kurniawan', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('11070-13', 'Elina Meitasari', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('11072-13', 'Gutama Danu Widagdo', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('11073-13', 'Indah Safitri', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('11074-13', 'Irza Rivai', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('11075-13', 'Istimawati Rizki M P', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('11076-13', 'Latifah Marita Rahayu', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('11077-13', 'Lilis Sri Muryati', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('11078-13', 'Melinda Sefia Rengganis', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('11079-13', 'Meirina Sekar Ayu Darmas Putri', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('11081-13', 'Nadilla Novika Sivanda', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('11082-13', 'Namira Aulia Damayanti', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('11083-13', 'Octavia Firdausi Putri', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('11084-13', 'Rafinda Shinta', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('11086-13', 'Septiana Putri Talentin', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('11087-13', 'Taufik Fakrurrahman', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('11088-13', 'Tita Amarta Putri', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('11089-13', 'Urimiana Yolanda Charistin', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('11090-13', 'Windrantika Bilkis', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('11091-13', 'Vipta Ari Wibowo', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('11092-13', 'Yurnia Elin Parbandari', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('11130-13', 'Ady Usman Fitriyanto', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('11132-13', 'Aida Choirunnisa', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('11133-13', 'Ana Nur Azizah', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('11134-13', 'Anna Krisna Nareswari', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('11135-13', 'Arya Roy Wijaya', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('11136-13', 'Asri Wahyuni', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('11137-13', 'Aulia Zahra Tasyarasita', '3a12a980d4036add56f557b18c564386', 3, 13, NULL, NULL, NULL),
('11138-13', 'Ayu Ariyanti Aulia', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('11139-13', 'Binar Satrio Sutardi', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('11140-13', 'Cika Aryanti', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('111421-12', 'Abdullah', 'dd74fff5f586ccc36dc96a9fc67afe95', 3, 12, NULL, NULL, NULL),
('111421-13', 'Singgih', '3d222823a1b5be9a84f2d454dd3601b7', 3, 13, NULL, NULL, NULL),
('111421-14', 'Wahyu', 'a98536c89252f5e873792e620b56cdf4', 3, 13, NULL, NULL, NULL),
('111421-15', 'Prasetyo', '6d4938ca1fd51e9e5f8086bee80aabb9', 3, 13, NULL, NULL, NULL),
('11143-13', 'Failasuf Muhammad Azka', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('11144-13', 'Fina Puspita Sari', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('11145-13', 'Fransiska Adi Damayanti', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('11146-13', 'Friska Olivia Nur Safura', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('11147-13', 'Guntur Adi Saputro', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('11149-13', 'Indah Rahmawati Putri', '3a12a980d4036add56f557b18c564386', 3, 13, NULL, NULL, NULL),
('11150-13', 'Iqbal Firmansyah', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('11151-13', 'Lii Unsa Baroro', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('11152-13', 'Luthfinida Kurniawati', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('11153-13', 'Meidevi Ratna Styaningrum', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('11154-13', 'Miranda Ayu Annisa Wicitta', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('11156-13', 'Nilam Diah Ayu Tantri', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('11157-13', 'Dsama Ilham Noer Arrizal', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('11158-13', 'Reza Ade Farezy', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('11161-13', 'Rossiana Fatika Artha', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('11162-13', 'Sabihi Anggi Rahmawati', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('11163-13', 'Sukma Darrmajati', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('11164-13', 'Syadena Diasty Wijaya', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('11165-13', 'Thoriq Abdullah Alzaidi', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('11166-13', 'Tika Nila Syaroh', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('11205-13', 'Adnan Anggoro', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('11206-13', 'Alfian Bagas Ferdiansyah', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('11207-13', 'Alfira Nur Kusumaningrum', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('11208-13', 'Alifa Naurah Nisrina', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('11209-13', 'Anggit Pratama', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('11210-13', 'Anggita Nanda Vaulina', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('11211-13', 'Armadani Fitriana', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('112119-13', 'Daffa. F. A', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('11212-13', 'Berliana Zahwa Arisha Shalsabila', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('11214-13', 'Danan Samodra', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('11215-13', 'Deni Sugiarto', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('11216-13', 'Denty Nadhyla Sari Putri ', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('11217-13', 'Dwi Purwanto', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('11218-13', 'Erizka Khairunnisa Oky Febriana', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('11219-13', 'Fatimah Nurhidayati', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('11220-13', 'Gita Anindya Renaningati Nugraha', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('11223-13', 'Isna Fiantika Esti', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('11224-13', 'Isnaini Novita Rahmawati Sumarta', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('11225-13', 'Kharisma Putri Febriyanti', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('11226-13', 'Krisnadjie Natawijaya', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('11227-13', 'Lusyana Ardila', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('11228-13', 'Mirta Fatmasari', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('11229-13', 'Muhammad Handi Prasetyo', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('11230-13', 'Ningrum Meliyani Pratama', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('11231-13', 'Novita Dwi Rahmawati', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('11232-13', 'Okky Vondra Wardana', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('11233-13', 'Puspa Rose Rezkyta Winneke Pradana', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('11234-13', 'Rahmadi Nurapela Nugraha', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('11235-13', 'Shelina Amalia Riyana', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('11236-13', 'Siswanti Handayani', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('11237-13', 'Siti Amanah Ika Sari', '3a12a980d4036add56f557b18c564386', 3, 13, NULL, NULL, NULL),
('11240-13', 'Wahyuning Putri Bima', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('11242-13', 'Akbar Mahestu', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('11244-13', 'Arief Sukmana', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('11245-13', 'Arya Adhi Wardana', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('11246-13', 'Astri Yuniarti', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('11247-13', 'Bagas Eko Prabowo', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('11248-13', 'Bella Wahyu Adzani', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('11249-13', 'Budi Santoso', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('11250-13', 'Carrisa Sukma Ilania', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('11252-13', 'Cindira Hetri Mustika Ningrum', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('11253-13', 'Dwi Novitasari', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('11254-13', 'Eka Doni Saputro', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('11255-13', 'Fauziah Firma Ardhana', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('11256-13', 'Hamim Maafifa Nugraha', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('11257-13', 'Hannif Nur Luthfyan', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('11258-13', 'Ikha Citra Wardhani', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('11259-13', 'Irfan Ardhianto', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('11260-13', 'Ismi Wahyu Oktaviana', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('11261-13', 'Jihan Ayu Safitri', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('11262-13', 'Muhhamad Husaini Alfani Karuniawan', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('11263-13', 'Muhamad Fauzialfani Karuniawan', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('11264-13', 'Muhammad Fadhil Habibie Haryanto', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('11265-13', 'Mutiara Sari Ayu Cahyanti', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('11266-13', 'Nadhia Utami', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('11268-13', 'Novianti Dhea Anggraeni', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('11269-13', 'Rika Sulistyoningsih', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('11271-13', 'Rosiana Oktaviani', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('11272-13', 'Siti Solikhah', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('11273-13', 'Tery Avita', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('11274-13', 'Tri Mulyono', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('11275-13', 'Wahyu Wijiyanto', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('11276-13', 'Yuyun Rahmawati', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('11293-13', 'Fitri Qoriyah. H', '3a12a980d4036add56f557b18c564386', 3, 13, NULL, NULL, NULL),
('11294-13', 'Galih Dwi. S', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('11296-13', 'Hamdan Febriyanto', '3a12a980d4036add56f557b18c564386', 3, 12, NULL, NULL, NULL),
('61111111', 'Muhammad Rizal Efendi', '402a186ee2ae1ee010ae64866f1fd946', 3, 13, NULL, NULL, NULL),
('6565', 'fghj', '827ccb0eea8a706c4c34a16891f84e7b', 4, 12, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE IF NOT EXISTS `slider` (
  `id_slider` int(4) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `size` int(100) NOT NULL,
  PRIMARY KEY (`id_slider`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=47 ;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id_slider`, `name`, `type`, `size`) VALUES
(43, 'slider23.jpg', 'image/jpeg', 750396),
(42, 'shoot.jpg', 'image/jpeg', 314473),
(44, 'smp.jpg', 'image/jpeg', 351628),
(46, 's.jpg', 'image/jpeg', 430004);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
