/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.5.5-10.0.38-MariaDB-0ubuntu0.16.04.1 : Database - arsipweb-db
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`arsipweb-db` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `arsipweb-db`;

/*Table structure for table `categories` */

DROP TABLE IF EXISTS `categories`;

CREATE TABLE `categories` (
  `categories_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `categories_name` varchar(255) NOT NULL,
  `categories_description` text,
  `categories_slug` varchar(255) NOT NULL,
  `parent_categories` bigint(20) DEFAULT NULL,
  `ctb` char(32) NOT NULL,
  `ctd` datetime NOT NULL,
  `mdb` char(32) NOT NULL,
  `mdd` datetime NOT NULL,
  PRIMARY KEY (`categories_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

/*Data for the table `categories` */

insert  into `categories`(`categories_id`,`categories_name`,`categories_description`,`categories_slug`,`parent_categories`,`ctb`,`ctd`,`mdb`,`mdd`) values (2,'Portal Berita','description','categories',0,'1568527260','2019-09-20 15:37:57','1568527260','2019-09-20 15:37:57'),(6,'kategori A','kategori A','kategori-a',2,'1568527260','2019-09-25 14:40:48','1568527260','2019-09-25 14:40:48');

/*Table structure for table `channel` */

DROP TABLE IF EXISTS `channel`;

CREATE TABLE `channel` (
  `channel_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `channel_name` varchar(255) NOT NULL,
  `channel_shortname` varchar(255) NOT NULL,
  `channel_slug` varchar(255) NOT NULL,
  `ctb` char(32) NOT NULL,
  `ctd` datetime NOT NULL,
  `mdb` char(32) NOT NULL,
  `mdd` datetime NOT NULL,
  PRIMARY KEY (`channel_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

/*Data for the table `channel` */

insert  into `channel`(`channel_id`,`channel_name`,`channel_shortname`,`channel_slug`,`ctb`,`ctd`,`mdb`,`mdd`) values (2,'page','page','page','1568527260','2019-09-25 17:26:54','1568527260','2019-09-25 17:26:54'),(3,'new','new','new','1568527260','2019-10-10 09:28:22','1568527260','2019-10-10 09:28:22');

/*Table structure for table `contoh_tabel` */

DROP TABLE IF EXISTS `contoh_tabel`;

CREATE TABLE `contoh_tabel` (
  `id` char(32) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `harga` decimal(14,2) NOT NULL,
  `tanggal_beli` date DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1',
  `ctb` char(32) NOT NULL,
  `ctd` datetime NOT NULL,
  `mdb` char(32) NOT NULL,
  `mdd` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `contoh_tabel` */

/*Table structure for table `permohonan` */

DROP TABLE IF EXISTS `permohonan`;

CREATE TABLE `permohonan` (
  `permohonan_id` char(32) NOT NULL,
  `nomor_layanan` varchar(10) DEFAULT NULL,
  `nama_pemohon` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `telepon` varchar(20) NOT NULL,
  `identitas` varchar(20) NOT NULL,
  `gambar_identitas` varchar(255) NOT NULL,
  `status` varchar(20) NOT NULL,
  `jenis_layanan` varchar(50) NOT NULL,
  `gambar_permohonan` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `ctb` char(32) NOT NULL,
  `updated_at` datetime NOT NULL,
  `mdb` char(32) NOT NULL,
  PRIMARY KEY (`permohonan_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `permohonan` */

insert  into `permohonan`(`permohonan_id`,`nomor_layanan`,`nama_pemohon`,`email`,`alamat`,`telepon`,`identitas`,`gambar_identitas`,`status`,`jenis_layanan`,`gambar_permohonan`,`created_at`,`ctb`,`updated_at`,`mdb`) values ('4c9c805775d84eea99ab52d74c6569a8','AKB1001','Praditya Kurniawan','email@email.com','alamat praditya kurniawan','082116162017','ktp','uploads/layanan/2019-10/4c9c805775d84eea99ab52d74c6569a8_file_identitas.png','akademisi','Permintaan Akses Ruang Baca','uploads/layanan/2019-10/4c9c805775d84eea99ab52d74c6569a8_surat_permohonan.png','2019-10-25 15:30:16','user','2019-10-25 15:30:16','user'),('5a3356dda253413987d925d7ef94fe0a','AKB1002','Omar Barron','hatabudasu@mailinator.net','Quas tempor qui est eos dicta aliqua Corrupti pariatur Libero temporibus fugiat qui','12345612341234','sim','uploads/layanan/2019-10/5a3356dda253413987d925d7ef94fe0a_file_identitas.jpg','instansi pemerintah','Permintaan Informasi','uploads/layanan/2019-10/5a3356dda253413987d925d7ef94fe0a_surat_permohonan.jpg','2019-10-29 17:12:24','user','2019-10-29 17:12:24','user'),('5e2757ccb327476ea259ea4ffc1bebf1','','Yetta Fulton','dohisuryl@mailinator.com','Recusandae Aliqua Enim rem est iusto ut et magna','123123123123','kitas','uploads/layanan/2019-11/5e2757ccb327476ea259ea4ffc1bebf1_file_identitas.jpg','akademisi','Permintaan Informasi','uploads/layanan/2019-11/5e2757ccb327476ea259ea4ffc1bebf1_surat_permohonan.jpg','2019-11-17 23:47:17','user','2019-11-17 23:47:17','user'),('7f29c3c578d6428ead8549dbac3bd698','AKB1003','Praditya Kurniawan','circlelabs.sandbox@gmail.com','palagan','082116162017','ktp','uploads/layanan/2019-10/7f29c3c578d6428ead8549dbac3bd698_file_identitas.jpg','akademisi','','uploads/layanan/2019-10/7f29c3c578d6428ead8549dbac3bd698_surat_permohonan.jpg','2019-10-18 17:32:46','user','2019-10-18 17:32:46','user'),('888f405320bc4c31bf5b7659dc61bcdc','','Praditya Kurniawan','adit@circlelabs.id','jl palagan tentara pelajar 203','082116162017','ktp','uploads/layanan/2019-10/888f405320bc4c31bf5b7659dc61bcdc_file_identitas.png','umum','Permintaan Akses Ruang Baca','uploads/layanan/2019-10/888f405320bc4c31bf5b7659dc61bcdc_surat_permohonan.png','2019-10-25 16:10:42','user','2019-10-25 16:10:42','user'),('90dc8c1cdfb54cf2a5eff1d22a2685e8','AKB1007','Rae Cabrera','circlelabs.sandbox@gmail.com','Mollitia magnam aliquam officia eu dolorem nulla fugiat iste proident sit','123123123123123','sim','uploads/layanan/2019-11/90dc8c1cdfb54cf2a5eff1d22a2685e8_file_identitas.png','umum','Permintaan Informasi','uploads/layanan/2019-11/90dc8c1cdfb54cf2a5eff1d22a2685e8_surat_permohonan.png','2019-11-22 11:29:04','user','2019-11-22 11:29:04','user'),('aabd962bb2df439ea58a0150f8e9b4a1','AKB1006','Baker Patton','renapumoho@mailinator.com','Vitae a vel dolore velit quas ut eaque exercitationem Nam tempora','123123123123','sim','uploads/layanan/2019-11/aabd962bb2df439ea58a0150f8e9b4a1_file_identitas.png','instansi pemerintah','Permintaan Informasi','uploads/layanan/2019-11/aabd962bb2df439ea58a0150f8e9b4a1_surat_permohonan.png','2019-11-22 11:27:34','user','2019-11-22 11:27:34','user'),('c8e786002f224b549253319a363eb09e','','Yetta Fulton','dohisuryl@mailinator.com','Recusandae Aliqua Enim rem est iusto ut et magna','123123123123','kitas','uploads/layanan/2019-11/c8e786002f224b549253319a363eb09e_file_identitas.jpg','akademisi','Permintaan Informasi','uploads/layanan/2019-11/c8e786002f224b549253319a363eb09e_surat_permohonan.jpg','2019-11-17 23:42:03','user','2019-11-17 23:42:03','user'),('d56eba4efe05446eb30de03aea7e27e6','AKB1005','Alec Mullins','samenywiqe@mailinator.net','Cum laborum omnis ar','123123','kitas','uploads/layanan/2019-10/d56eba4efe05446eb30de03aea7e27e6_file_identitas.jpg','umum','','uploads/layanan/2019-10/d56eba4efe05446eb30de03aea7e27e6_surat_permohonan.jpg','2019-10-18 10:55:13','user','2019-10-18 10:55:13','user');

/*Table structure for table `permohonan_kode_arsip` */

DROP TABLE IF EXISTS `permohonan_kode_arsip`;

CREATE TABLE `permohonan_kode_arsip` (
  `kode_arsip_id` char(32) NOT NULL,
  `permohonan_id` char(32) NOT NULL,
  `kode_arsip` varchar(255) NOT NULL,
  PRIMARY KEY (`kode_arsip_id`),
  KEY `permohonan_id` (`permohonan_id`),
  CONSTRAINT `permohonan_kode_arsip_ibfk_1` FOREIGN KEY (`permohonan_id`) REFERENCES `permohonan` (`permohonan_id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `permohonan_kode_arsip` */

insert  into `permohonan_kode_arsip`(`kode_arsip_id`,`permohonan_id`,`kode_arsip`) values ('4675ef91364e47679a1f929e106f1ff4','888f405320bc4c31bf5b7659dc61bcdc','123123 2'),('4ee75c2c32fa48a687c81c2b9d189f92','d56eba4efe05446eb30de03aea7e27e6','Doloribus officiis e'),('50c72e3f3c484db4b6df7f9af7dbef54','4c9c805775d84eea99ab52d74c6569a8','213123123123123123'),('5ef711c803e44eb994bcc14ac8f7ca77','7f29c3c578d6428ead8549dbac3bd698','123123'),('61d4af5715304460b1d41965c9297b74','888f405320bc4c31bf5b7659dc61bcdc','123123 1'),('7105557bc8ef42b6a626e693f22bbd7b','aabd962bb2df439ea58a0150f8e9b4a1','Qui quaerat laudanti'),('74965bb7c56148a980cb6d983909af9a','90dc8c1cdfb54cf2a5eff1d22a2685e8','Exercitationem nostr'),('822ddf4a495442298a52968b050e6152','7f29c3c578d6428ead8549dbac3bd698','3213123'),('a050bd23ad794cafab7cde546cd3980d','c8e786002f224b549253319a363eb09e','Odio nobis exercitat'),('bf69559241744019bdc74351f872f667','7f29c3c578d6428ead8549dbac3bd698','435345345'),('c5479cd5a6ac4655a6539aa88fb0924b','888f405320bc4c31bf5b7659dc61bcdc','123123 3'),('d419c9443a014552aeedebfa5ad57963','5a3356dda253413987d925d7ef94fe0a','Dolores laborum ea a'),('d57185389fff4fdb97235af969cafa2f','5e2757ccb327476ea259ea4ffc1bebf1','Odio nobis exercitat'),('f143ee40f5c140aba48a15a873208209','7f29c3c578d6428ead8549dbac3bd698','');

/*Table structure for table `posts` */

DROP TABLE IF EXISTS `posts`;

CREATE TABLE `posts` (
  `post_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `channel_id` bigint(20) NOT NULL,
  `categories_id` bigint(20) DEFAULT NULL,
  `post_slug` varchar(255) NOT NULL,
  `post_title` text NOT NULL,
  `post_content` longtext NOT NULL,
  `post_status` enum('draft','publish') NOT NULL DEFAULT 'publish',
  `meta_title` varchar(200) DEFAULT NULL,
  `meta_description` varchar(200) DEFAULT NULL,
  `meta_keyword` varchar(200) DEFAULT NULL,
  `ctb` char(32) NOT NULL,
  `ctd` datetime NOT NULL,
  `mdb` char(32) NOT NULL,
  `mdd` datetime NOT NULL,
  PRIMARY KEY (`post_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

/*Data for the table `posts` */

insert  into `posts`(`post_id`,`channel_id`,`categories_id`,`post_slug`,`post_title`,`post_content`,`post_status`,`meta_title`,`meta_description`,`meta_keyword`,`ctb`,`ctd`,`mdb`,`mdd`) values (4,2,2,'kebijakan','Kebijakan','<h3>1. Latar Belakang</h3><div>Arsip Konservasi Borobudur adalah kumpulan\r\ndokumen yang terkait dengan pemugaran Candi Borobudur sebagai salah satu\r\nkampanye internasional paling awal, dimulai pada tahun 1960-an dan berjalan\r\nhingga tahun 1980-an, untuk melestarikan situs warisan budaya yang didanai oleh\r\nkomunitas internasional bekerja sama dengan pemerintah nasional. Kampanye ini,\r\ndan Proyek Pemugaran Candi Borobudur (1969-1983), adalah salah satu lembaga\r\npendahulu dari dibentuknya Konvensi Warisan Dunia.</div><br>Arsip Konservasi Borobudur menunjukan perubahan yang\r\nsignifikan dalam pendekatan konservasi situs warisan budaya. Kebutuhan untuk\r\nmemasukkan berbagai disiplin ilmu yang relevan telah dijalankan sehingga\r\nmenghasilkan upaya yang disesuaikan oleh para ahli lokal dan internasional.\r\nArsip Konservasi Borobudur merupakan koleksi penelitian yang sangat penting\r\nbagi publik, cendekiawan dan konservator. Arsip ini juga merupakan bukti bagi\r\nlebih dari 600 orang yang berkontribusi pada pekerjaan konservasi selama lebih\r\ndari 10 tahun.<br><br>Secara keseluruhan koleksi Arsip Konservasi\r\nBorobudur memiliki signifikansi tinggi secara nasional, regional, dan\r\ninternasional, dan ini diakui dengan terdaftarnya arsip ini pada <i>Memory of\r\nthe World</i> UNESCO pada tahun 2017.<br><h3><br>2. Konteks Hukum dan Kebijakan</h3><span>Dokumen\r\nkebijakan arsip ini adalah pernyataan umum mengenai maksud dan tujuan untuk\r\nprogram kearsipan di Arsip Konservasi Borobudur. Dokumen ini dikembangkan oleh Balai\r\nKonservasi Borobudur, dengan dukungan dari Kantor UNESCO Jakarta. Diharapkan\r\nbahwa kebijakan ini akan ditinjau setiap 5 tahun sekali untuk perbaikan dalam\r\nmengikuti berbagai perkembangan standar kearsipan.<br></span><br><span>Sebagai salah satu lembaga arsip yang terdaftar dalam daftar\r\ninternasional dari Ingatan Dunia UNESCO (UNESCO <i>Memory of the World</i>), Balai Konservasi Borobudur bertujuan untuk\r\nmenerapkan praktik terbaik dalam bidang manajemen arsip sebagaimana diuraikan\r\ndalam Pedoman Umum untuk Program Memori Dunia UNESCO (UNESCO<i> General Guidelines to the Memory of the\r\nWorld Programme)</i> 2017, serta Rekomendasi UNESCO tentang Pelestarian dan\r\nAkses ke Warisan Dokumenter, termasuk dalam Format Digital (UNESCO<i> Recommendation on the Preservation of, and\r\nAccess to, Documentary Heritage, including in the Digital Form)</i> 2015, di\r\nsamping standar yang dianjurkan oleh Dewan Internasional untuk Arsip (<i>International Council on Archives</i>).\r\nKebijakan ini bertujuan untuk menggambarkan panduan pengaturan standar internasional\r\ntersebut di atas.<br></span><br><span>Selain itu, di tingkat Nasional, Arsip Konservasi Borobudur dijalankan\r\ndi bawah Undang-Undang&nbsp; Nomor 43 Tahun\r\n2009 tentang Kearsipan dan Peraturan Pemerintah Nomor 28 Tahun 2012 tentang\r\nImplementasi Undang-Undang Nasional Nomor 43 Tahun 2009. Selain itu, kebijakan\r\narsip ini juga mempertimbangkan Undang-Undang Nomor 14 Tahun 2008 tentang\r\nKeterbukaan Informasi Publik.<br></span><br><h3>3.&nbsp;Tujuan\r\nArsip Konservasi Borobudur\r\n\r\n</h3>Arsip Konservasi Borobudur dibentuk untuk melestarikan catatan, arsip\r\ndan bahan warisan yang dibuat sebagai bagian dari proyek restorasi dan\r\npelestarian berskala besar di Candi Borobudur dari tahun 1969 (dengan\r\ndibentuknya Proyek Pemugaran Candi Borobudur) hingga 1991 (dengan pembentukan\r\nBalai Studi dan Konservasi Borobudur, sebuah lembaga yang berlanjut hingga\r\nsekarang dengan sistem pencatatan \'aktif\' secara mandiri/ terpisah). Dalam hal ini,\r\nArsip Konservasi Borobudur dikategorikan sebagai arsip \'statis\', sesuai dengan\r\nUU Kearsipan.<br><br><span>Arsip\r\nKonservasi Borobudur berperan sebagai fasilitator penggunaan bahan ini untuk\r\nreferensi dan tujuan pendidikan. Secara khusus, Arsip Konservasi Borobudur bermaksud\r\nuntuk menjadi sumber bagi para peneliti dan staf konservasi dalam pelaksanaan\r\npekerjaan konservasi berkelanjutan di Situs Warisan Dunia Kompleks Candi\r\nBorobudur.<br></span><br><span>Arsip Konservasi Borobudur juga bertujuan untuk memberikan informasi\r\nsecara terbuka kepada publik, baik di Indonesia maupun seluruh dunia, yang\r\nmempunyai ketertarikan terhadap Situs Warisan Dunia Candi Borobudur dan usaha\r\npelestariannya. Arsip Konservasi Borobudur juga berperan untuk menginisiasi dan\r\nberpartisipasi aktif dalam program-program seperti pameran, situs web, dan media\r\nsosial, serta publikasi-publikasi yang dirancang untuk meningkatkan kesadaran\r\nakan sejarah konservasi Situs&nbsp; Warisan\r\nDunia Kompleks Candi Borobudur, dengan menggunakan koleksi arsipnya.<br></span><br>Dalam rangka berbagi sejarah mengenai konservasi Borobudur dengan\r\npublik, Arsip Konservasi Borobudur bekerja sama dengan Perpustakaan Konservasi\r\nBorobudur, yang menyimpan bahan referensi penting yang memberikan konteks bagi\r\nArsip Konservasi Borobudur, serta Studio Sejarah Restorasi Candi Borobudur,\r\nyang menunjukkan bagaimana proyek pemugaran dilaksanakan berikut peralatannya, sehingga\r\nkemudian menghasilkan dokumen yang saat ini disimpan di Arsip Konservasi\r\nBorobudur.<br><br><h3>4.&nbsp;Otoritas\r\n\r\n</h3><div>4.1. Otoritas Dokumen</div><span>Dokumen kebijakan arsip ini\r\nmenetapkan kerangka kerja dimana Arsip Konservasi Borobudur berfungsi di dalam\r\nstruktur Balai Konservasi Borobudur. Semua praktik dan prosedur kerja Arsip\r\nKonservasi Borobudur harus sesuai dengan ketentuan yang berlaku. Kebijakan ini\r\ntelah dikembangkan oleh Kelompok Kerja (Pokja) Dokumentasi dan Publikasi Balai\r\nKonservasi Borobudur (yang bertanggung jawab atas pengelolaan arsip ini),\r\ndengan dukungan pelatihan dan saran dari Kantor UNESCO Jakarta.<br></span><br>4.2. Posisi Lembaga dalam\r\nStruktur Organisasi Balai Konservasi Borobudur \r\n\r\nArsip Konservasi Borobudur dikelola oleh Kelompok Kerja (Pokja) Dokumentasi\r\ndan Publikasi yang melapor kepada Kepala Seksi Konservasi, yang kemudian\r\nmelapor langsung kepada Kepala Balai Konservasi Borobudur. Balai Konservasi\r\nBorobudur adalah unit teknis dibawah Kementerian Pendidikan dan Kebudayaan\r\nRepublik Indonesia, yang melapor kepada Direktorat Jenderal Kebudayaan\r\nKementerian Pendidikan dan Kebudayaan.<br><br>4.3. Staf Arsip Konservasi\r\nBorobudur \r\n\r\nArsip Konservasi Borobudur akan berada di bawah perlindungan dan\r\nmanajemen staf dengan pelatihan yang tepat dan kualifikasi yang sesuai sehingga\r\ndapat mendukung pelestarian dan akses ke koleksi.<br><br><span>Balai Konservasi Borobudur akan berusaha untuk memastikan staf memiliki\r\npelatihan kearsipan yang memadai dalam manajemen arsip dan prinsip-prinsip\r\narsip secara keseluruhan. Untuk mencapai tujuan ini, Balai Konservasi Borobudur\r\nakan bekerja sama dengan Arsip Nasional Republik Indonesia, maupun dengan institusi-institusi\r\nkearsipan lainnya (seperti Universitas Gadjah Mada, Universitas Indonesia, dsb),\r\ndan UNESCO (melalui program <i>Memory of the\r\nWorld</i>).<br></span><br>&nbsp;4.4. Pemelihara Resmi\r\n\r\nArsip Konservasi Borobudur berperan sebagai lembaga pemelihara resmi\r\ndari arsip-arsip dan bahan warisan yang berkaitan dengan Proyek Konservasi\r\nBorobudur untuk periode tahun 1969-1991. Penghapusan bahan dari arsip tanpa\r\nizin dari Kepala Balai Konservasi Borobudur adalah sangat dilarang.<br><br><h3>5.&nbsp;Peran,\r\nTanggung Jawab dan Tugas Staf Arsip Konservasi Borobudur </h3>\r\n\r\n5.1. Aksesi, Pengaturan dan\r\nDeskripsi\r\n\r\n<br><span>Staf Arsip Konservasi Borobudur bertanggung jawab untuk mengatur dan\r\nmenjelaskan semua materi dalam Arsip Konservasi Borobudur sesuai dengan standar\r\nkearsipan profesional. Jika Arsip Konservasi Borobudur memutuskan untuk\r\nmenerima koleksi baru ke koleksi (sesuai dengan Kebijakan Akuisisi), Staf Arsip\r\nKonservasi Borobudur bertanggung jawab untuk mengaksesi arsip tersebut.<br></span><br>5.2. Preservasi and Konservasi\r\n\r\n\r\n<span>Staf Arsip Konservasi Borobudur, bersama dengan semua staf Seksi Konservasi\r\nBorobudur, harus bertindak sebaik mungkin untuk memastikan keselamatan dan\r\nkeamanan semua materi dalam Arsip Konservasi Borobudur. Hal ini meliputi penyediaan\r\ntempat penyimpanan yang aman, yang memiliki kondisi dan lingkungan yang memadai\r\nuntuk penyimpanan arsip jangka panjang dalam berbagai format.<br></span><br>5.2.i.&nbsp; Rekomendasi para ahli \r\n\r\nUNESCO dan Cologne Institute for Conservation Science (CICS) telah\r\nmendukung kunjungan dua misi oleh para ahli arsip internasional (Annegret Seger\r\npada tahun 2014 dan Robert Fuchs pada tahun 2017, keduanya dari CICS Jerman).\r\nLaporan-laporan ini membuat rekomendasi terperinci yang berkaitan dengan\r\npelestarian dan konservasi arsip. Staf Arsip Konservasi Borobudur akan berusaha\r\nmenerapkan rekomendasi ini sebaik mungkin.<br><br>5.2.ii.&nbsp; Rencana inisiatif \r\n\r\nPengelolaan arsip Borobudur mengacu pada Peraturan Kepala Arsip Nasional\r\nRepublik Indonesia No. 06 Tahun 2005 tentang Pedoman Perlindungan, Pengamanan,\r\ndan Penyelamatan Dokumen/Arsip Vital Negara. <br><br>Sesuai sistem pengelolaan ini, Balai Konservasi Borobudur telah dan\r\nselanjutnya berencana untuk melaksanakan langkah-langkah berikut untuk\r\nmeningkatkan pengelolaan Arsip Konservasi Borobudur:<br>1.&nbsp;&nbsp;&nbsp; Mengatur kembali sistem penyimpanan arsip yang disesuaikan dengan\r\nmaterial arsip dan kondisi keterawatan;\r\n\r\n<br>2.&nbsp;&nbsp;&nbsp; Melanjutkan tindakan konservasi untuk arsip yang rusak;\r\n\r\n<br><span>3.&nbsp;&nbsp;&nbsp; <span>Melanjutkan program digitalisasi, dan memprioritaskan untuk gulungan\r\nfilm seluloid (<i>celluloid roll film</i>);</span></span>\r\n\r\n<br>4.&nbsp;&nbsp;&nbsp; Merancang sistem pemantauan untuk iklim mikro penyimpanan dan pemantauan\r\nhama;\r\n\r\n<br>5.&nbsp;&nbsp;&nbsp; Mengatur ulang ruang penyimpanan arsip dan menyediakan\r\nfasilitas-fasilitasnya, yang meliputi:&nbsp;<br><blockquote>a.&nbsp;&nbsp;\r\nPeralatan kontrol suhu dan kelembaban, antara lain pendingin\r\nudara (AC) dan pelembab udara (<i>humidifier</i>).<br>b.&nbsp;&nbsp;\r\nPendeteksi asap;<br>c.&nbsp;&nbsp;\r\n<i>Logger</i> data mikro klimatologi;<br>d.&nbsp;&nbsp;\r\nPemadam api;<br>e.&nbsp;&nbsp;\r\nRak khusus untuk menyimpan peta dan gambar;<br>f.&nbsp;&nbsp;&nbsp;\r\nMenyediakan CCTV untuk memantau ruang penyimpanan\r\narsip.</blockquote>6.&nbsp;&nbsp;&nbsp; Memperbaiki listrik dan mekanik bangunan penyimpanan;\r\n\r\n<br><span>7.&nbsp;&nbsp;&nbsp; <span>Membuat sistem informasi basis data (<i>database</i>)<i> </i>arsip berbasis web agar mudah diakses;</span></span>\r\n\r\n<br>8.&nbsp;&nbsp;&nbsp; Menambahkan sumber daya manusia yang kompeten dan menyediakan\r\npengembangan kapasitas nasional dan internasional untuk manajemen arsip;\r\n\r\n<br>9.&nbsp;&nbsp;&nbsp; Bekerja sama dengan lembaga lain, seperti Arsip Nasional Republik\r\nIndonesia, untuk mengembangkan manajemen arsip;\r\n\r\n<br>10.&nbsp; Mengembangkan rencana manajemen bencana untuk arsip;\r\n\r\n<br><span>11.&nbsp; Mengembangkan rencana manajemen holistik yang mencakup seluruh arsip.<br></span><br>&nbsp;\r\n\r\n5.4. Penelitian Pendukung <br>\r\n\r\nStaf pengelola Arsip Konservasi Borobudur akan memberikan layanan\r\npenelitian kepada staf Balai Konservasi Borobudur serta masyarakat umum.<br><br>5.5. Program Penjangkauan\r\n\r\n<span>Balai Konservasi Borobudur akan merancang dan berpartisipasi dalam\r\nkegiatan rutin untuk mempromosikan (a) konservasi Candi Borobudur (b)\r\nkeberadaan dan isi arsip, (c) dan daftar Arsip Konservasi Borobudur sebagai\r\nbagian dari Program Ingatan Dunia UNESCO (UNESCO <i>Memory of the World Programme</i>). </span>\r\n\r\n&nbsp;\r\n<br>&nbsp;Hal ini menyangkut kegiatan-kegiatan sebagai berikut: <br><blockquote><span>1.&nbsp;&nbsp;&nbsp; <span>Mengadakan pameran di seluruh Indonesia tentang arsip dan dalam konteks <i>Memory\r\nof the World</i>..<br></span></span>2.&nbsp;&nbsp;&nbsp; Promosi dan presentasi Arsip Konservasi Borobudur melalui situs web Kementerian\r\nPendidikan dan Kebudayaan.\r\n\r\n<br>3.&nbsp;&nbsp;&nbsp; Mengadakan seminar dan lokakarya.\r\n\r\n<br>4.&nbsp;&nbsp;&nbsp; Berbagi pentingnya arsip dengan masyarakat luas, termasuk dengan\r\nsekolah-sekolah.\r\n\r\n<br><span>5.&nbsp;&nbsp;&nbsp; Pembuatan publikasi, menyusun alat bantu dan membuka basis data digital.<br><br></span></blockquote><h3>6. Pernyataan\r\nKebijakan Arsip </h3>6.1. Koleksi and Akuisisi\r\n\r\n<br>Arsip Konservasi Borobudur dibentuk untuk melestarikan catatan, arsip\r\ndan bahan warisan yang dibuat sebagai bagian dari proyek restorasi dan\r\npelestarian berskala besar di Candi Borobudur dari tahun 1969 (dengan\r\ndibentuknya Proyek Pemugaran Candi Borobudur, yang kemudian berlanjut dengan\r\nProyek Conservasi Candi Borobudur) hingga 1991 (dengan pembentukan Balai Studi\r\ndan Konservasi Borobudur, sebuah lembaga yang berlanjut hingga sekarang dengan\r\nsistem pencatatan \'aktif\' secara mandiri/ terpisah). Dalam hal ini, Arsip\r\nKonservasi Borobudur dikategorikan sebagai arsip \'statis\', sesuai dengan UU\r\nKearsipan, dan dalam hal ini, bukan sebagai lembaga arsip pengumpul (<i>collecting archive</i>).<br><br>Namun, karena ada sejumlah arsip dari Proyek Pemugaran Candi Borobudur dan\r\nProyek Conservasi Candi Borobudur yang merupakan koleksi pribadi para ahli\r\nproyek, mantan staf dan organisasi yang terlibat dalam proyek, Arsip Konservasi\r\nBorobudur akan menerima bahan dari periode tahun 1969-1991 jika berhubungan\r\nlangsung dengan proyek. Dalam hal ini, sebelum menerima bahan apa pun ke dalam\r\nkoleksi, staf Balai Konservasi Borobudur harus melakukan penilaian sebelumnya.\r\nArsip Konservasi Borobudur berhak menolak tawaran beberapa bahan yang mungkin\r\nberada di luar lingkup pengumpulan ini, atau yang akan menimbulkan kesulitan\r\nyang signifikan dan tidak dapat diatasi dalam hal penyimpanan, pelestarian, dan\r\nkonservasi jangka panjang.<br><br>Arsip Konservasi Borobudur hanya menerima materi melalui donasi, dan\r\nformulir akuisisi harus diisi dan ditandatangani oleh donor.\r\n\r\n&nbsp;\r\n\r\n<br><br>6.2. Akses <br>\r\n\r\nSeluruh Arsip Konservasi Borobudur adalah terbuka untuk umum sesuai\r\ndengan Undang-Undang Nomor 43 Tahun 2009 tentang Kearsipan dan Peraturan\r\nPemerintah Nomor 28 Tahun 2012 tentang Implementasi Undang-Undang Nomor 43\r\nTahun 2009. Semua materi dalam arsip dapat dilihat tanpa batasan, dan digunakan\r\nsesuai dengan ketentuan hak cipta.<br><br>Koleksi yang keadaan fisiknya terlalu rusak atau rapuh untuk dilihat\r\noleh peneliti akan ditutup untuk umum, namun dalam kasus ini, salinan digital\r\nakan tersedia. Ini terutama berlaku untuk koleksi pelat kaca negatif serta\r\nbahan-bahan audio-visual lainnya.<br><br>6.2.i. Akses digital\r\n\r\nArsip Konservasi Borobudur bertujuan untuk men-digitalisasi-kan dan membuka\r\nkoleksinya sehingga dapat diakses secara bebas oleh para peneliti dan\r\nmasyarakat umum melalui sistem manajemen data arsip berbasis dalam jaringan.<br><br>Terbukanya sistem akses secara daring akan membuka kesempatan bagi para\r\npeneliti dari seluruh dunia untuk dapat mengakses koleksi dan mempromosikan\r\nsejarah konservasi Candi Borobudur, serta kegiatan-kegiatan dan program yang\r\ntengah berlangsung dari Balai Konservasi Borobudur. Selain itu, diharapkan\r\nbahwa terbukanya akses secara daring ini akan meningkatkan kesadaran masyarakat\r\ntentang Studio Sejarah Restorasi Candi Borobudur, dan dapat meningkatkan jumlah\r\npengunjung.<br><br>Akses digital akan dipromosikan ke publik sebagai titik akses utama\r\nuntuk koleksi. Akses ini akan membantu memastikan kelestarian koleksi untuk\r\njangka panjang, karena kondisi koleksi yang rapuh, terutama koleksi negatif\r\npelat kaca, adalah rentan terhadap kerusakan jika sering ditangani atau\r\ndipindahkan dari penyimpanan. Dengan menyediakan salinan digital, materi asli\r\ndapat disimpan dengan aman. Jika ada kasus dimana peneliti ingin melihat arsip\r\nyang asli, maka akses akan diberikan di Ruang Baca Arsip Konservasi Borobudur,\r\nselama tidak ada risiko terhadap kelestarian kondisi arsip tersebut.<br><br>6.2.ii. Akses fisik\r\n\r\n<br>Akses Arsip Konservasi Borobudur secara fisik dapat dilakukan di Ruang\r\nBaca Arsip Konservasi Borobudur. \r\n\r\n&nbsp;<br><br><u>Lokasi</u>\r\n\r\nAlamat&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : Jl. Badrawati, Borobudur, Magelang, Jawa Tengah 56553\r\n\r\n<br>No. Telp&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; : (0293) 788225,\r\n788175\r\n\r\n<br><span>Faksimili&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; : (0293) 788367&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <br></span>\r\n\r\n<span>Website&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;: mow.borobudurpedia.id\r\n<br></span>\r\n\r\n<span>E-mail&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;: bkborobudur@kemdikbud.go.id<br></span><br><u>Jam buka</u>\r\n\r\n<br>Senin s.d. Kamis&nbsp;&nbsp;&nbsp;&nbsp; :\r\n&nbsp;&nbsp; 08.00 – 15.30 \r\n\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  12.00 – 13.00 (istirahat)\r\n\r\n<br>Jumat&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;:\r\n&nbsp;&nbsp; 08.00 – 16.00&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 11.30 – 13.00 (istirahat)\r\n\r\n&nbsp;\r\n<br>Tutup setiap hari Sabtu, Minggu dan hari libur. <br><br>6.2.iii. Registrasi <br>\r\n\r\nPeneliti diharuskan mendaftar terlebih dahulu melalui layanan arsip di\r\nsitus web mow.borobudurpedia.id dan pada saat akan mengakses arsip di ruang\r\nbaca menunjukkan kartu identifikasi resmi. Tidak diperlukan proses registrasi\r\nuntuk melihat koleksi secara online.<br><br>6.2.iv. Prosedur penyalinan\r\ndokumen\r\n\r\n<br>Salinan digital dapat dilakukan secara gratis di ruang baca (peneliti\r\ndiharuskan membawa kamera digital sendiri). Formulir perjanjian hak cipta harus\r\nditandatangani oleh peneliti sebelum membuat salinan digital.<br><br>6.2.v. Perpustakaan Museum\r\ndan Referensi Lain\r\n\r\n<br>Pengunjung Ruang Baca dapat mengunjungi Perpustakaan Balai Konservasi\r\nBorobudur (<a target=\"_blank\" rel=\"nofollow\" href=\"http://perpusborobudur.kemdikbud.go.id/index.php\">http://perpusborobudur.kemdikbud.go.id/index.php</a>) dan Studio Sejarah\r\nRestorasi Candi Borobudur, yang terletak di sebelah ruang baca. Perpustakaan\r\ndan Museum menyediakan konteks penting untuk koleksi Arsip Konservasi\r\nBorobudur.<br><br>6.4 Hak Cipta \r\n\r\nPemerintah Indonesia, melalui Kementerian\r\nPendidikan dan Kebudayaan, adalah pemegang hak cipta dari semua materi dalam\r\nArsip Konservasi Borobudur, sesuai dengan Undang-Undang Nomor 28 Tahun 2014\r\ntentang Hak Cipta. Undang-Undang ini memberikan hak kepada Balai Konservasi\r\nBorobudur untuk memberikan akses publik berupa penyalinan materi secara bebas,\r\nasalkan tidak untuk tujuan komersial.<br><br><span><span>Pokok referensi penting untuk kebijakan hak\r\ncipta Arsip Konservasi Borobudur adalah Rekomendasi UNESCO 2015 tentang\r\nDokumenter, yang mendorong promosi akses terbuka untuk koleksi budaya, termasuk\r\nlisensi publik seperti Creative Commons. Arsip Konservasi Borobudur juga\r\nmencatat penggunaan lisensi <i>Creative\r\nCommons</i> oleh UNESCO (</span><a target=\"_blank\" rel=\"nofollow\" href=\"https://creativecommons.org/\">https://creativecommons.org</a>) sebagai bagian dari Kebijakan Akses Terbuka (<a target=\"_blank\" rel=\"nofollow\" href=\"https://en.unesco.org/open-access/creative-commons-licenses\">Open Access Policy</a>) dari organisasi.<br></span><br><span>Balai Konservasi Borobudur saat ini menerapkan\r\nCreative Commons <a target=\"_blank\" rel=\"nofollow\" href=\"https://creativecommons.org/licenses/by-nc/4.0/\">Attribution-NonCommercial 4.0 International</a> (CC BY-NC 4.0). <br></span><br>Di bawah\r\nlisensi ini, pengguna dapat melakukan penyesuaian dan menyusun karya\r\nnon-komersial, dengan syarat bahwa setiap karya baru yang menggunakan konten\r\njuga harus memiliki lisensi CC-BY-NC-SA yang sama. Kementerian Pendidikan dan\r\nKebudayaan harus secara jelas dikreditkan/ disebutkan sebagai pemilik sumber.\r\nSetiap penggunaan konten untuk tujuan komersial atau dalam produk yang tidak\r\nmembawa lisensi ini memerlukan persetujuan tertulis dari Direktur Jenderal\r\nKebudayaan.<br><h3><br>7.&nbsp;Daftar\r\nTerminologi\r\n\r\n</h3><i>Aksesi: <br></i>\r\n\r\n<blockquote>1.&nbsp;&nbsp;&nbsp; Mengambil sekumpulan catatan atau materi lain secara legal untuk\r\nperlindungan dan mendokumentasikan penerimaannya secara formal.\r\n\r\n<br><span>2.&nbsp;&nbsp;&nbsp; <span>Pendokumentasian transfer catatan atau materi dalam register, <i>database</i>, atau log lain dari kepemilikan\r\narsip.</span></span>\r\n\r\n<br>3.&nbsp;&nbsp;&nbsp; Catatan penambahan (item baru) ke perpustakaan, museum, atau koleksi\r\nlainnya.\r\n\r\n&nbsp;\r\n<br></blockquote><i>Arsip:</i><br><blockquote>1.&nbsp;&nbsp;&nbsp; Catatan organisasi atau individu yang telah dipilih untuk penyimpanan\r\ntak terbatas berdasarkan nilai berkelanjutan mereka dengan tujuan hukum,\r\nadministrasi, keuangan atau penelitian sejarah.\r\n\r\n<br>2.&nbsp;&nbsp;&nbsp; Nama yang diberikan ke tempat penyimpanan dimana koleksi arsip berada.\r\n\r\n<br>3.&nbsp;&nbsp;&nbsp; Organisasi (atau bagian dari organisasi) yang fungsi utamanya adalah\r\nuntuk memilih, mengelola, melestarikan, dan membuat catatan arsip sehingga\r\narsip tersebut dapat digunakan.\r\n\r\n<br>4.&nbsp;&nbsp;&nbsp; KBBI: Dokumen tertulis (surat, akta, dan sebagainya), lisan (pidato,\r\nceramah, dan sebagainya), atau bergambar (foto, film, dan sebagainya) dari\r\nwaktu yang lampau, disimpan dalam media tulis (kertas), elektronik (pita kaset,\r\npita video, disket komputer, dan sebagainya), biasanya dikeluarkan oleh\r\ninstansi resmi, disimpan dan dipelihara di tempat khusus untuk referensi.</blockquote><i>Pengaturan dan Deskripsi:</i>\r\n\r\n<br>Proses penataan materi berdasarkan asal-usul dan tatanan aslinya, untuk\r\nmelindungi konteksnya dan untuk mencapai kontrol fisik atau intelektual atas\r\nmateri, dan proses menganalisis, mengorganisir, dan merekam rincian tentang\r\nelemen formal catatan atau kumpulan catatan, seperti pencipta, judul, tanggal,\r\ncakupan, dan konten, untuk memudahkan identifikasi, manajemen, dan pemahaman.<br><br><span><i>Manajemen Arsip</i>: </span><br>\r\n\r\nBidang manajemen yang bertanggung jawab atas kontrol yang efisien dan\r\nsistematis dari penciptaan, penerimaan, pemeliharaan, penggunaan dan disposisi\r\ncatatan, termasuk proses untuk menangkap dan memelihara bukti dan informasi\r\ntentang kegiatan dan transaksi bisnis dalam bentuk catatan.<br><br><br>','publish','kebijakan','kebijakan lorem ipsum','kebijakan, lorem, ipsum','1568527260','2019-10-21 13:16:01','1568527260','2019-11-17 22:56:49'),(5,2,6,'memory-of-the-world','Memory Of The World','<div>Lorem ipsum dolor sit amet, consectetur adipiscing <b>elit</b>. Suspendisse \r\nfacilisis ex condimentum fringilla porta. Sed vel mattis dui. Aliquam \r\nultricies iaculis tortor, pretium lacinia justo aliquet maximus. Orci \r\nvarius natoque penatibus et magnis dis parturient montes, nascetur \r\nridiculus mus. Curabitur euismod, sem eu consectetur egestas, ex tellus \r\nmattis lectus, ut aliquet nisl augue nec ante. Nunc mollis nisi sit amet\r\n nunc molestie, nec commodo tortor rhoncus. Vestibulum ornare, nibh a \r\nporta aliquam, tellus felis rhoncus risus, id consequat est sapien quis \r\ndui. Vivamus at nibh consectetur, porttitor mauris non, feugiat mauris. \r\nVestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere\r\n cubilia Curae; Proin eleifend lobortis dolor, vel egestas nunc \r\ntristique nec. In dictum fringilla ultrices. Vestibulum eu mollis nisi. \r\nAenean facilisis vestibulum massa quis dignissim.\r\n</div><div><br></div><blockquote><div>Proin imperdiet, risus ac facilisis pulvinar, turpis nisi semper massa, a\r\n accumsan sem ipsum ac arcu. Curabitur et gravida felis, non commodo \r\ndiam. Cras imperdiet at turpis a vestibulum. Aliquam eget diam a felis \r\nauctor rhoncus. Pellentesque habitant morbi tristique senectus et netus \r\net malesuada fames ac turpis egestas. Duis sed diam id ipsum blandit \r\nornare in non erat. Integer tempor tristique vestibulum. Maecenas \r\nvestibulum, metus sed aliquam blandit, justo mi tempor justo, ut congue \r\naugue justo tincidunt nibh. Donec sit amet vestibulum dui, sed varius \r\nsapien. Sed volutpat iaculis posuere. Sed justo tellus, rhoncus et \r\ncursus et, tincidunt eu nisl. <br></div><div><br></div></blockquote>Donec mattis facilisis nunc, vitae euismod libero imperdiet a. Etiam \r\nporta fermentum odio laoreet rhoncus. Pellentesque ultrices erat ac nisl\r\n placerat, at tristique dui hendrerit. Aliquam suscipit, turpis non \r\nhendrerit facilisis, turpis neque auctor odio, sed bibendum purus lectus\r\n non lorem. Duis vel justo elementum, hendrerit lacus sed, finibus quam.\r\n Duis fermentum neque nulla, in euismod erat condimentum non. Nam id leo\r\n quis quam vulputate porttitor a eget odio. Sed at volutpat dui.\r\n<br><br>','publish','Maxime ut quis rem i','Perferendis molestia','Molestiae corporis i','1568527260','2019-09-25 17:44:35','1568527260','2019-10-25 14:17:23'),(6,2,6,'nilai-penting','Nilai Penting','<div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse \r\nfacilisis ex condimentum fringilla porta. Sed vel mattis dui. Aliquam \r\nultricies iaculis tortor, pretium lacinia justo aliquet maximus. Orci \r\nvarius natoque penatibus et magnis dis parturient montes, nascetur \r\nridiculus mus. Curabitur euismod, sem eu consectetur egestas, ex tellus \r\nmattis lectus, ut aliquet nisl augue nec ante. Nunc mollis nisi sit amet\r\n nunc molestie, nec commodo tortor rhoncus. Vestibulum ornare, nibh a \r\nporta aliquam, tellus felis rhoncus risus, id consequat est sapien quis \r\ndui. Vivamus at nibh consectetur, porttitor mauris non, feugiat mauris. \r\nVestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere\r\n cubilia Curae; Proin eleifend lobortis dolor, vel egestas nunc \r\ntristique nec. In dictum fringilla ultrices. Vestibulum eu mollis nisi. \r\nAenean facilisis vestibulum massa quis dignissim.\r\n</div><div><br></div><blockquote><div>Proin imperdiet, risus ac facilisis pulvinar, turpis nisi semper massa, a\r\n accumsan sem ipsum ac arcu. Curabitur et gravida felis, non commodo \r\ndiam. Cras imperdiet at turpis a vestibulum. Aliquam eget diam a felis \r\nauctor rhoncus. Pellentesque habitant morbi tristique senectus et netus \r\net malesuada fames ac turpis egestas. Duis sed diam id ipsum blandit \r\nornare in non erat. Integer tempor tristique vestibulum. Maecenas \r\nvestibulum, metus sed aliquam blandit, justo mi tempor justo, ut congue \r\naugue justo tincidunt nibh. Donec sit amet vestibulum dui, sed varius \r\nsapien. Sed volutpat iaculis posuere. Sed justo tellus, rhoncus et \r\ncursus et, tincidunt eu nisl. <br></div><div><br></div></blockquote>Donec mattis facilisis nunc, vitae euismod libero imperdiet a. Etiam \r\nporta fermentum odio laoreet rhoncus. Pellentesque ultrices erat ac nisl\r\n placerat, at tristique dui hendrerit. Aliquam suscipit, turpis non \r\nhendrerit facilisis, turpis neque auctor odio, sed bibendum purus lectus\r\n non lorem. Duis vel justo elementum, hendrerit lacus sed, finibus quam.\r\n Duis fermentum neque nulla, in euismod erat condimentum non. Nam id leo\r\n quis quam vulputate porttitor a eget odio. Sed at volutpat dui.\r\n<br><br>','publish','Maxime ut quis rem i','Perferendis molestia','Molestiae corporis i','1568527260','2019-09-25 17:45:09','1568527260','2019-10-24 11:18:19'),(8,2,2,'layanan','layanan','Silahkan isi formulir online dibawah ini sesuai dengan data diri dan kebutuhan informasi anda. 123<br>','publish','layanan','layanan','layanan','1568527260','2019-11-24 13:33:58','1568527260','2019-11-24 13:46:34');

/*Table structure for table `posts_categories` */

DROP TABLE IF EXISTS `posts_categories`;

CREATE TABLE `posts_categories` (
  `posts_categories_id` bigint(20) NOT NULL,
  `post_id` bigint(20) NOT NULL,
  `categories_id` bigint(20) NOT NULL,
  `ctb` char(32) NOT NULL,
  `ctd` datetime NOT NULL,
  PRIMARY KEY (`posts_categories_id`),
  KEY `post_id` (`post_id`),
  KEY `categories_id` (`categories_id`),
  CONSTRAINT `posts_categories_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`post_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `posts_categories_ibfk_2` FOREIGN KEY (`categories_id`) REFERENCES `categories` (`categories_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `posts_categories` */

/*Table structure for table `posts_tags` */

DROP TABLE IF EXISTS `posts_tags`;

CREATE TABLE `posts_tags` (
  `posts_tags_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `post_id` bigint(20) NOT NULL,
  `tags_id` bigint(20) NOT NULL,
  `ctb` char(32) NOT NULL,
  `ctd` datetime NOT NULL,
  PRIMARY KEY (`posts_tags_id`),
  KEY `tags_id` (`tags_id`),
  KEY `post_id` (`post_id`),
  CONSTRAINT `posts_tags_ibfk_1` FOREIGN KEY (`tags_id`) REFERENCES `tags` (`tags_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `posts_tags_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `posts` (`post_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=utf8mb4;

/*Data for the table `posts_tags` */

insert  into `posts_tags`(`posts_tags_id`,`post_id`,`tags_id`,`ctb`,`ctd`) values (20,6,4,'','0000-00-00 00:00:00'),(21,6,9,'','0000-00-00 00:00:00'),(45,5,4,'','0000-00-00 00:00:00'),(46,5,9,'','0000-00-00 00:00:00'),(59,4,4,'','0000-00-00 00:00:00'),(63,8,4,'','0000-00-00 00:00:00');

/*Table structure for table `slider` */

DROP TABLE IF EXISTS `slider`;

CREATE TABLE `slider` (
  `slider_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `caption` text,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `image_url` varchar(100) NOT NULL,
  `ctb` char(32) NOT NULL,
  `created_at` datetime NOT NULL,
  `mdb` char(32) NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`slider_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

/*Data for the table `slider` */

insert  into `slider`(`slider_id`,`title`,`caption`,`is_active`,`image_url`,`ctb`,`created_at`,`mdb`,`updated_at`) values (3,'Borobudur 123','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse facilisis ex condimentum fringilla porta. Sed vel mattis dui. Aliquam ultricies iaculis tortor, pretium lacinia justo aliquet maximus. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Curabitur euismod, sem eu consectetur egestas, ex tellus mattis lectus, ut aliquet nisl augue nec ante. Nunc mollis nisi sit amet nunc molestie, nec commodo tortor rhoncus.',1,'uploads/slider/NN4jpgjpg.jpg','1568527260','2019-10-24 07:07:02','1568527260','2019-10-27 07:19:31'),(4,'Borobudur 2','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse facilisis ex condimentum fringilla porta. Sed vel mattis dui. Aliquam ultricies iaculis tortor, pretium lacinia justo aliquet maximus. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Curabitur euismod, sem eu consectetur egestas, ex tellus mattis lectus, ut aliquet nisl augue nec ante. Nunc mollis nisi sit amet nunc molestie, nec commodo tortor rhoncus.',1,'uploads/slider/NN1jpgjpg.jpg','1568527260','2019-10-24 07:08:13','1568527260','2019-10-24 10:46:15');

/*Table structure for table `sys_auth_log` */

DROP TABLE IF EXISTS `sys_auth_log`;

CREATE TABLE `sys_auth_log` (
  `log_id` char(32) NOT NULL,
  `user` varchar(100) NOT NULL,
  `waktu_login` datetime NOT NULL,
  `ip` varchar(18) NOT NULL,
  `user_agent` varchar(150) NOT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`log_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `sys_auth_log` */

insert  into `sys_auth_log`(`log_id`,`user`,`waktu_login`,`ip`,`user_agent`,`keterangan`,`status`) values ('05b82fc340814c39ba11b53a38c6e03d','admin','2019-12-05 10:02:08','127.0.0.1','Mozilla/5.0 (X11; Linux x86_64; rv:72.0) Gecko/20100101 Firefox/72.0','Login berhasil.','success'),('0b56b9ed8a7b4d54b022209c77e35257','admin','2019-11-22 12:41:40','127.0.0.1','Mozilla/5.0 (X11; Linux x86_64; rv:71.0) Gecko/20100101 Firefox/71.0','Login berhasil.','success'),('0b6aeedd440947529eaa5dd2a5229537','admin','2019-11-26 16:33:20','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:70.0) Gecko/20100101 Firefox/70.0','Login berhasil.','success'),('15a2c7fda57244ffbbb89eb9082ed17a','admin','2019-11-25 14:01:28','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:70.0) Gecko/20100101 Firefox/70.0','Login berhasil.','success'),('1c22992fe1cf41cfa9e966f4efbf2502','admin','2019-12-06 08:25:10','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:70.0) Gecko/20100101 Firefox/70.0','Login berhasil.','success'),('1f8e8569f6734d6593f908384ae6df52','admin','2019-11-25 15:56:19','127.0.0.1','Mozilla/5.0 (X11; Linux x86_64; rv:71.0) Gecko/20100101 Firefox/71.0','Login berhasil.','success'),('24e31c1f17c84d1ead81569ce183e0c3','admin','2019-11-25 09:55:53','127.0.0.1','Mozilla/5.0 (X11; Linux x86_64; rv:71.0) Gecko/20100101 Firefox/71.0','Login berhasil.','success'),('2abada64dd3249d783814d06e7ac25fd','127.0.0.1','2019-11-28 10:58:32','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:70.0) Gecko/20100101 Firefox/70.0','Pengguna keluar dari sistem.','success'),('2acc889d77bb4aa78ff64f46fdb065fb','admin','2019-11-22 08:46:14','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:70.0) Gecko/20100101 Firefox/70.0','Login berhasil.','success'),('3e924baa4afd4949a2fa5a5fb15bbcd3','admin','2019-11-25 15:59:47','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:70.0) Gecko/20100101 Firefox/70.0','Login berhasil.','success'),('404fbc3fa70a4843a2139cee299e11d2','admin','2019-11-26 03:21:36','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:70.0) Gecko/20100101 Firefox/70.0','Login berhasil.','success'),('499718ac8ed54d069b79ebddf7618ac7','admin','2019-11-20 11:06:08','127.0.0.1','Mozilla/5.0 (X11; Linux x86_64; rv:71.0) Gecko/20100101 Firefox/71.0','Login berhasil.','success'),('4b36347d2e2c4a83b8882d0076d4fe4e','admin','2019-12-06 04:04:06','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:70.0) Gecko/20100101 Firefox/70.0','Login berhasil.','success'),('4ebeb9e6865a4efd97234c158da49a4c','admin','2019-11-22 11:19:43','127.0.0.1','Mozilla/5.0 (X11; Linux x86_64; rv:71.0) Gecko/20100101 Firefox/71.0','Login berhasil.','success'),('5b7075391d324eeca6545868b754e936','admin','2019-12-06 04:04:01','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:70.0) Gecko/20100101 Firefox/70.0','Password salah.','warning'),('5eeb08844ea049e9b7d55907ffa79ce0','admin','2019-11-22 10:00:06','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:70.0) Gecko/20100101 Firefox/70.0','Login berhasil.','success'),('5f7e4f88968d4b479538df4a8837022a','admin','2019-11-28 09:06:38','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:70.0) Gecko/20100101 Firefox/70.0','Login berhasil.','success'),('65232836ee1d4a12a576f291a8f898ce','admin','2019-11-22 11:22:04','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:70.0) Gecko/20100101 Firefox/70.0','Login berhasil.','success'),('65f24e87502f43d593423bc1b5cf953c','admin','2019-12-09 10:09:17','127.0.0.1','Mozilla/5.0 (X11; Linux x86_64; rv:72.0) Gecko/20100101 Firefox/72.0','Login berhasil.','success'),('6c40662004754e7d9dd9f27d68cea3f0','admin','2019-11-25 04:55:51','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:70.0) Gecko/20100101 Firefox/70.0','Login berhasil.','success'),('787ac99ddc6a436b91028769a79903a9','admin','2019-11-25 10:05:16','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:70.0) Gecko/20100101 Firefox/70.0','Login berhasil.','success'),('8a5f0d29d992402bbfd8923cd667ce1e','admin','2019-11-17 22:48:09','::1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10.14; rv:71.0) Gecko/20100101 Firefox/71.0','Login berhasil.','success'),('8b936cb02c8045cc9196e23932104f05','admin','2019-11-26 07:25:52','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:70.0) Gecko/20100101 Firefox/70.0','Login berhasil.','success'),('8c98bdb72d174ae6969874171f692133','admin','2019-12-16 09:04:15','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:70.0) Gecko/20100101 Firefox/70.0','Login berhasil.','success'),('991dd66b688247c7a548160fecbfac1e','admin','2019-11-21 16:06:46','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:70.0) Gecko/20100101 Firefox/70.0','Login berhasil.','success'),('9d623a6cae2f4ce1a70e1222f0b3dd59','admin','2019-12-05 03:13:39','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:70.0) Gecko/20100101 Firefox/70.0','Login berhasil.','success'),('9d7a9d421541419a9ef3cb1c6163be2a','admin','2019-12-03 07:49:02','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:70.0) Gecko/20100101 Firefox/70.0','Login berhasil.','success'),('9e7bbf0a4db54073bce3790cc5cbce9f','admin','2019-12-03 08:13:27','::1','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.108 Safari/537.36','Login berhasil.','success'),('a0644f8f63fd40cdb35783cdc6532f7e','admin','2019-11-22 17:06:43','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:70.0) Gecko/20100101 Firefox/70.0','Login berhasil.','success'),('a17d04148a674cf9b380dfd3e56ffca5','admin','2019-11-27 09:33:24','127.0.0.1','Mozilla/5.0 (X11; Linux x86_64; rv:71.0) Gecko/20100101 Firefox/71.0','Login berhasil.','success'),('a3293da3ef324253bf59fac1a23c2066','admin','2019-12-04 13:53:56','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:70.0) Gecko/20100101 Firefox/70.0','Login berhasil.','success'),('a7644aaa2def4f9f8c95d3025c2f5f28','admin','2019-12-04 10:23:34','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:70.0) Gecko/20100101 Firefox/70.0','Login berhasil.','success'),('a906b8247b664000bf5038de950f84c9','admin','2019-11-27 03:27:11','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:70.0) Gecko/20100101 Firefox/70.0','Login berhasil.','success'),('af7bfecaa5d44aa3a20884cd0cb71518','admin','2019-11-22 14:45:01','127.0.0.1','Mozilla/5.0 (X11; Linux x86_64; rv:65.0) Gecko/20100101 Firefox/65.0','Login berhasil.','success'),('ce5cbfc8a5c5432495d435fb5f2cde96','admin','2019-12-06 10:05:42','127.0.0.1','Mozilla/5.0 (X11; Linux x86_64; rv:72.0) Gecko/20100101 Firefox/72.0','Login berhasil.','success'),('d198c8e65e524787a3081b107c7a9d76','admin','2019-11-27 14:54:28','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:70.0) Gecko/20100101 Firefox/70.0','Pengguna keluar dari sistem.','success'),('d9898b7faeee402e94c2a0946f70f96e','admin','2019-11-23 12:17:52','127.0.0.1','Mozilla/5.0 (X11; Linux x86_64; rv:71.0) Gecko/20100101 Firefox/71.0','Login berhasil.','success'),('db0646a813a04298932d5b9c63264e8a','admin','2019-11-25 15:25:39','::1','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.108 Safari/537.36','Login berhasil.','success'),('e2937b4ce8e9440cb38ec375bb1c8172','admin','2019-11-24 13:31:29','127.0.0.1','Mozilla/5.0 (X11; Linux x86_64; rv:71.0) Gecko/20100101 Firefox/71.0','Login berhasil.','success'),('ee3663409dba4d0185baa2b6c358df99','admin','2019-12-03 09:55:03','127.0.0.1','Mozilla/5.0 (X11; Linux x86_64; rv:71.0) Gecko/20100101 Firefox/71.0','Login berhasil.','success'),('f34146240e5d474d80d0f648953c20ac','admin','2019-11-27 14:54:07','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:70.0) Gecko/20100101 Firefox/70.0','Login berhasil.','success'),('f6d8abe9dd5c4d30b75deddce14e43d5','admin','2019-11-22 09:30:13','127.0.0.1','Mozilla/5.0 (X11; Linux x86_64; rv:71.0) Gecko/20100101 Firefox/71.0','Login berhasil.','success'),('fcc7ca735b20494f8dc31fd4f8687ef0','admin','2019-11-21 12:38:27','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:70.0) Gecko/20100101 Firefox/70.0','Login berhasil.','success');

/*Table structure for table `sys_config` */

DROP TABLE IF EXISTS `sys_config`;

CREATE TABLE `sys_config` (
  `config_id` varchar(18) NOT NULL,
  `config_name` varchar(45) NOT NULL,
  `config_group` varchar(45) NOT NULL,
  `config_value` text NOT NULL,
  `config_desc` varchar(255) DEFAULT NULL,
  `config_portal_id` varchar(45) DEFAULT 'null',
  `restricted` int(1) NOT NULL DEFAULT '0',
  `mdb` varchar(18) NOT NULL,
  `mdd` datetime NOT NULL,
  PRIMARY KEY (`config_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `sys_config` */

insert  into `sys_config`(`config_id`,`config_name`,`config_group`,`config_value`,`config_desc`,`config_portal_id`,`restricted`,`mdb`,`mdd`) values ('cf5d9ae53e3deef','instagram_url','web_config','https://instagram.com/','Instagram Url','',0,'','2019-11-17 23:46:56'),('cf5d9ae559e9c86','facebook_url','web_config','https://facebook.com/','Facebook URL','',0,'','2019-11-17 23:46:56'),('cf5d9ae58579b4d','twitter_url','web_config','https://twitter.com/','twitter url','',0,'','2019-11-17 23:46:56'),('cf5d9ae5acb77f5','web_title','web_config','Borobudur Conservation Archives','web title','',0,'','2019-11-17 23:46:56'),('cf5d9ae5e1a9db1','web_footer','web_config','Borobudur Conservation Archives','web footer','',0,'','2019-11-17 23:46:56'),('cf5d9ae65711c3e','company_name','web_config','Circle Labs','Company Name','',0,'','2019-11-17 23:46:56'),('cf5d9ae67ee17e6','company_address','web_config','Jl. Badrawati Borobudur Magelang 56553','Company Address','',0,'','2019-11-17 23:46:56'),('cf5d9ae6a6e3b2a','company_email','web_config','kebudayaan@kemdikbud.go.id','Company Email','',0,'','2019-11-17 23:46:56'),('cf5d9ae6cde5ac6','company_telp','web_config','(0293) 788175, 78825','Company Telephone','',0,'','2019-11-17 23:46:56'),('cf5db0dd3c6ade1','meta_title','meta_config','Memory of The World Borobudur','meta title','',0,'','2019-11-17 23:46:56'),('cf5db0ddd05c0cc','meta_description','meta_config','Borobudur Conservation Archive','meta description','',0,'','2019-11-17 23:46:56'),('cf5db0de1552d30','meta_tags','meta_config','MOW, borobudur, borobudur conservation archive, memory of the world','meta tag','',0,'','2019-11-17 23:46:56'),('cf5db0de5943053','meta_image','meta_config','-','meta image','',0,'','2019-11-17 23:46:56'),('cf5db0dedb8a45b','meta_keyword','meta_config','borobudur memory of the world','meta keyword','',0,'','2019-11-17 23:46:56'),('cf5db136591e2ac','protocol','mail_config','smtp','protocol','',0,'','2019-11-17 23:46:56'),('cf5db1366f37599','smtp_host','mail_config','ssl://smtp.gmail.com','mail host','',0,'','2019-11-17 23:46:56'),('cf5db13699411af','smtp_port','mail_config','465','port','',0,'','2019-11-17 23:46:56'),('cf5db136a7c9d73','smtp_user','mail_config','borobudur.konservasi.dev','Mail User','',0,'','2019-11-17 23:46:56'),('cf5db136bda58ab','smtp_pass','mail_config','borobudur2019','Password mail server','',0,'','2019-11-17 23:46:56'),('cf5db136d84a72a','crlf','mail_config','\\r\\n','crlf','',0,'','2019-11-17 23:46:56'),('cf5db136f8dc42e','newline','mail_config','\\r\\n','newline','',0,'','2019-11-17 23:46:56'),('cf5db138d979393','meta_author','meta_config','Balai Konservasi Borobudur','author','',0,'','2019-11-17 23:46:56'),('cf5db7fdb2310f4','admin_email','mail_config','circlelabs.sandbox@gmail.com','email admin','',0,'','2019-11-17 23:46:56');

/*Table structure for table `sys_group` */

DROP TABLE IF EXISTS `sys_group`;

CREATE TABLE `sys_group` (
  `group_id` varchar(18) NOT NULL,
  `group_name` varchar(45) NOT NULL,
  `group_desc` varchar(100) NOT NULL,
  `group_portal` varchar(45) NOT NULL,
  `group_restricted` int(1) NOT NULL,
  `mdb` int(11) NOT NULL,
  `mdd` datetime NOT NULL,
  PRIMARY KEY (`group_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `sys_group` */

insert  into `sys_group`(`group_id`,`group_name`,`group_desc`,`group_portal`,`group_restricted`,`mdb`,`mdd`) values ('gr5d7dd371eb2b2','Administrator','Administrator','dashboard',1,0,'2019-09-15 08:00:17'),('gr5db4432130053','Operator','Operator','dashboard',0,0,'2019-10-26 19:59:13');

/*Table structure for table `sys_login_attempts` */

DROP TABLE IF EXISTS `sys_login_attempts`;

CREATE TABLE `sys_login_attempts` (
  `login_id` char(32) NOT NULL,
  `ip_address` varchar(20) NOT NULL,
  `login` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  PRIMARY KEY (`login_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `sys_login_attempts` */

/*Table structure for table `sys_menu` */

DROP TABLE IF EXISTS `sys_menu`;

CREATE TABLE `sys_menu` (
  `menu_id` int(11) NOT NULL AUTO_INCREMENT,
  `portal_id` int(11) NOT NULL,
  `menu_name` varchar(45) NOT NULL,
  `menu_desc` varchar(45) NOT NULL,
  `menu_position` varchar(20) NOT NULL,
  `menu_order` int(3) NOT NULL,
  `menu_parent` int(11) NOT NULL,
  `menu_link` varchar(45) NOT NULL,
  `menu_show` int(1) NOT NULL,
  `menu_icon` varchar(45) NOT NULL,
  `menu_fonticon` varchar(45) NOT NULL,
  `mdb` varchar(18) NOT NULL,
  `mdd` datetime NOT NULL,
  PRIMARY KEY (`menu_id`),
  KEY `fk_sys_menu_sys_portal1_idx` (`portal_id`),
  CONSTRAINT `fk_sys_menu_sys_portal1` FOREIGN KEY (`portal_id`) REFERENCES `sys_portal` (`portal_id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=139 DEFAULT CHARSET=latin1;

/*Data for the table `sys_menu` */

insert  into `sys_menu`(`menu_id`,`portal_id`,`menu_name`,`menu_desc`,`menu_position`,`menu_order`,`menu_parent`,`menu_link`,`menu_show`,`menu_icon`,`menu_fonticon`,`mdb`,`mdd`) values (127,12,'Dashboard','Dashboard','lfm',1,0,'dashboard',1,'','mdi mdi-home','cidev','2019-09-15 07:59:12'),(128,12,'Post','Post','lfm',2,0,'post',1,'','mdi mdi-pin','cidev','2019-09-15 08:44:01'),(129,12,'All Post','All Post','lfm',2,128,'#post',0,'','','cidev','2019-10-25 09:38:45'),(130,12,'Categories','Categories','lfm',3,128,'categories',0,'','','cidev','2019-10-25 09:39:00'),(131,12,'Channel','Channel','lfm',2,128,'channel',0,'','','cidev','2019-10-25 09:38:57'),(132,12,'Tags','Tags','lfm',4,128,'tags',0,'','','cidev','2019-10-25 09:39:03'),(133,12,'Media','Media','lfm',3,0,'media',1,'','mdi mdi-file-image','cidev','2019-09-15 08:56:40'),(134,12,'Permohonan','Permohonan','lfm',6,0,'permohonan',1,'','mdi mdi-email-variant','cidev','2019-09-23 11:15:18'),(135,12,'Home Slider','Home Slider','lfm',5,0,'home_slider',1,'','mdi mdi-image-filter','cidev','2019-10-07 08:38:49'),(136,12,'Web Config','Web Config','lfm',9,0,'web_config',1,'','mdi mdi-settings','cidev','2019-10-07 08:37:54'),(137,12,'User Manager','User Manager','lfm',10,0,'userman',1,'','mdi mdi-account','cidev','2019-10-25 09:40:06'),(138,12,'Change Password','Change Password','tpm',1,0,'change_password',0,'','','cidev','2019-10-25 17:04:29');

/*Table structure for table `sys_permission` */

DROP TABLE IF EXISTS `sys_permission`;

CREATE TABLE `sys_permission` (
  `group_id` varchar(18) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `permission` char(4) NOT NULL,
  PRIMARY KEY (`group_id`,`menu_id`),
  KEY `fk_sys_permission_sys_menu_idx` (`menu_id`),
  KEY `fk_sys_permission_sys_group1_idx` (`group_id`),
  CONSTRAINT `fk_sys_permission_sys_group1` FOREIGN KEY (`group_id`) REFERENCES `sys_group` (`group_id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `fk_sys_permission_sys_menu` FOREIGN KEY (`menu_id`) REFERENCES `sys_menu` (`menu_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `sys_permission` */

insert  into `sys_permission`(`group_id`,`menu_id`,`permission`) values ('gr5d7dd371eb2b2',127,'1111'),('gr5d7dd371eb2b2',128,'1111'),('gr5d7dd371eb2b2',134,'1111'),('gr5d7dd371eb2b2',135,'1111'),('gr5d7dd371eb2b2',136,'1111'),('gr5d7dd371eb2b2',137,'1111'),('gr5d7dd371eb2b2',138,'1111'),('gr5db4432130053',127,'1111'),('gr5db4432130053',128,'1111'),('gr5db4432130053',129,'1111'),('gr5db4432130053',130,'1111'),('gr5db4432130053',131,'1111'),('gr5db4432130053',132,'1111'),('gr5db4432130053',133,'1111'),('gr5db4432130053',134,'1111'),('gr5db4432130053',135,'1111'),('gr5db4432130053',136,'1111'),('gr5db4432130053',137,'1111'),('gr5db4432130053',138,'1111');

/*Table structure for table `sys_portal` */

DROP TABLE IF EXISTS `sys_portal`;

CREATE TABLE `sys_portal` (
  `portal_id` int(11) NOT NULL AUTO_INCREMENT,
  `portal_number` varchar(2) NOT NULL,
  `portal_name` varchar(45) NOT NULL,
  `portal_desc` varchar(255) NOT NULL,
  `portal_link` varchar(100) DEFAULT NULL,
  `meta_title` varchar(150) NOT NULL,
  `meta_desc` varchar(150) NOT NULL,
  `meta_tag` varchar(150) NOT NULL,
  `mdb` int(11) NOT NULL,
  `mdd` datetime NOT NULL,
  PRIMARY KEY (`portal_id`),
  UNIQUE KEY `portal_number_UNIQUE` (`portal_number`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

/*Data for the table `sys_portal` */

insert  into `sys_portal`(`portal_id`,`portal_number`,`portal_name`,`portal_desc`,`portal_link`,`meta_title`,`meta_desc`,`meta_tag`,`mdb`,`mdd`) values (12,'1','Admin Portal','Admin Portal','dashboard','-','-','-',0,'2019-09-15 07:58:34');

/*Table structure for table `sys_user` */

DROP TABLE IF EXISTS `sys_user`;

CREATE TABLE `sys_user` (
  `user_id` varchar(18) NOT NULL,
  `username` varchar(45) NOT NULL,
  `kata_sandi` varchar(200) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `telepon` varchar(15) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `jenis_kelamin` char(1) DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `registered_by` varchar(45) DEFAULT NULL,
  `mdb` char(32) DEFAULT NULL,
  `mdd` datetime DEFAULT NULL,
  `token` text,
  `token_time` datetime DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `sys_user` */

insert  into `sys_user`(`user_id`,`username`,`kata_sandi`,`nama_lengkap`,`telepon`,`email`,`jenis_kelamin`,`foto`,`status`,`last_login`,`registered_by`,`mdb`,`mdd`,`token`,`token_time`) values ('1568527260','admin','$2y$10$kG9Q9kl5ir18s0SLLZL.e.gdwcCE7VFOkACmo7HFL/gKdWdZKqwv2','Administrator','082116162017','support@circlelabs.id','L',NULL,1,'2019-12-16 09:04:15','developer','1568527260','2019-10-26 18:19:34',NULL,NULL),('1572080927','tes','$2y$10$2kqM9FQBFljJNnqKMLInD.iWfIEXGlM2LB3VzLkjCcdaMVeYHJZfi','tes',NULL,'tes@email.com',NULL,NULL,1,'2019-10-26 21:00:18','1568527260',NULL,'2019-10-26 21:00:06',NULL,NULL);

/*Table structure for table `sys_user_group` */

DROP TABLE IF EXISTS `sys_user_group`;

CREATE TABLE `sys_user_group` (
  `user_id` varchar(18) NOT NULL,
  `group_id` varchar(18) NOT NULL,
  `default` int(11) NOT NULL,
  PRIMARY KEY (`user_id`,`group_id`),
  KEY `fk_sys_user_group_sys_group1_idx` (`group_id`),
  CONSTRAINT `fk_sys_user_group_sys_group1` FOREIGN KEY (`group_id`) REFERENCES `sys_group` (`group_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_sys_user_group_sys_user1` FOREIGN KEY (`user_id`) REFERENCES `sys_user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `sys_user_group` */

insert  into `sys_user_group`(`user_id`,`group_id`,`default`) values ('1568527260','gr5d7dd371eb2b2',1),('1572080927','gr5d7dd371eb2b2',1);

/*Table structure for table `tags` */

DROP TABLE IF EXISTS `tags`;

CREATE TABLE `tags` (
  `tags_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `tags_name` varchar(255) NOT NULL,
  `tags_slug` varchar(255) NOT NULL,
  `ctb` char(32) NOT NULL,
  `ctd` datetime NOT NULL,
  `mdb` char(32) NOT NULL,
  `mdd` datetime NOT NULL,
  PRIMARY KEY (`tags_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tags` */

insert  into `tags`(`tags_id`,`tags_name`,`tags_slug`,`ctb`,`ctd`,`mdb`,`mdd`) values (4,'kategori berita','kategori-berita','1568527260','2019-09-16 17:16:13','1568527260','2019-09-16 17:16:13'),(9,'tes','tes','1568527260','2019-09-25 14:25:46','1568527260','2019-09-25 14:25:46'),(10,'tags 1','tags-1','1568527260','2019-10-21 16:06:13','1568527260','2019-10-21 16:06:13'),(11,'tags 2','tags-2','1568527260','2019-10-21 16:06:19','1568527260','2019-10-21 16:06:19');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
