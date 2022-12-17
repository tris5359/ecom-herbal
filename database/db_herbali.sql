-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 09, 2020 at 06:32 AM
-- Server version: 10.1.40-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_herbali`
--

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `idbanner` int(11) NOT NULL,
  `img` text NOT NULL,
  `text1` text NOT NULL,
  `text2` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`idbanner`, `img`, `text1`, `text2`) VALUES
(1, 'AdobeStock_181218549-herbs-resize.jpeg', 'New arrivals 1', 'Men Collection 2020 1'),
(2, '202003131038-main_cropped_15840707461.jpg', 'Jackets & Coats 2', 'Men New-Season 2'),
(3, 'warming-spices-FB.jpg', 'NEW SEASON 3', 'Women Collection 2020 3');

-- --------------------------------------------------------

--
-- Table structure for table `site`
--

CREATE TABLE `site` (
  `id` int(11) NOT NULL,
  `sitename` varchar(40) NOT NULL,
  `tagline` text NOT NULL,
  `email` varchar(35) NOT NULL,
  `addressStore` text NOT NULL,
  `noTlp` varchar(14) NOT NULL,
  `tentangToko` text NOT NULL,
  `fotoToko` varchar(50) NOT NULL,
  `fotoLogo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `site`
--

INSERT INTO `site` (`id`, `sitename`, `tagline`, `email`, `addressStore`, `noTlp`, `tentangToko`, `fotoToko`, `fotoLogo`) VALUES
(1, 'Herbali', 'Your Best Adventure Partner', 'hyugadventure@gmail.com', '<p>Desa Surabayan Rt 03 Rw 02 Kec wonopringgo Kab Pekallongan Kota Pekalongan</p>', '085773222611', '', '88047274.jpeg', 'log.png');

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang`
--

CREATE TABLE `tb_barang` (
  `kodebarang` int(11) NOT NULL,
  `kodedetil` int(1) DEFAULT NULL,
  `namabarang` varchar(80) DEFAULT NULL,
  `harga` double DEFAULT NULL,
  `stok` int(4) NOT NULL,
  `deskripsiSingkat` varchar(200) NOT NULL,
  `deskripsi` text,
  `foto` text,
  `counter` int(5) NOT NULL,
  `view` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_barang`
--

INSERT INTO `tb_barang` (`kodebarang`, `kodedetil`, `namabarang`, `harga`, `stok`, `deskripsiSingkat`, `deskripsi`, `foto`, `counter`, `view`) VALUES
(1, 3, 'Temu Lawak', 15000, 1000, '\r\n\r\nDeskripsi Temulawak segar 1kg\r\nTemulawak segar & fresh berat 1kg\r\n\r\nKhasiat temulawak penumpas segala macam penyakit :\r\n1. Khasiat Temulawak untuk pelancar ASI\r\nKhasiat dan manfaat temulawak untuk', '', '8903460_573229fd-aebe-49e5-9eee-4216f87409bf_2048_1536.jpg', 0, '0000-00-00'),
(2, 3, 'Kunyit Kuning Segar 1kg / 1000gram - Super', 10000, 100, '\r\n\r\nDeskripsi Kunyit Kuning Segar 1kg / 1000gram - Super\r\nKunyit Kuning Segar 1 Kg\r\n\r\nDikirim keadaan fresh / segar\r\n\r\n', '', '4135659_c49e79c2-29c1-4b3d-a44b-0caa3cbc29d2_1080_1080.png', 0, '0000-00-00'),
(3, 3, 'Temu Putih', 10000, 100, '', '\r\n\r\nDeskripsi Temu putih segar kunyit 1 kg\r\nReady stok\r\nNeto 1000 gram\r\nTemu putih segar di ambil langsung dari kebun saat ada order masuk,\r\n\r\nBerikut manfaat kunyit putih bagi kesehatan tubuh, yang perlu diketahui.\r\nObat alergi alami, mencegah kangker, mengatasi masalah pencernaan, penawar bisa ular,, dll\r\n\r\nTerimakasih\r\n\r\n', '8021722_641766fc-4718-43db-9023-8add03a786c1_640_640.jpg', 0, '0000-00-00'),
(4, 3, 'Temu Ireng/Temu Hitam Curcuma Aeruginosa', 30000, 99, '', 'Temu Ireng atau Temu Hitam dengan nama latin Curcuma Aeruginosa mempunyai banyak manfaat bagi kesehatan diantaranya adalah sbb:\r\n1. Mengatasi Masuk Angin\r\n2. Mengobati Malaria\r\n3. Menambah Nafsu Makan\r\n4. Mengobati Cacingan\r\n5. Mengobati Ambeien\r\n6. Menetralkan Racun\r\n7. Mengatasi Penyakit Kulit\r\n8. Meringankan Nyeri Haid\r\n9. Mengobati Gonore\r\n10. Mengatasi Masalah Kulit Wajah\r\n11. Melancarkan haid yang tidak teratur.\r\n12. Mengobati bengkak.\r\n\r\n', '5184268_1b57695a-2587-4b7a-8441-b3de9c83f74b_1548_1548.jpg', 0, '0000-00-00'),
(5, 3, 'Temu kunci', 10000, 99, '\r\n\r\nDeskripsi TEMU KUNCI SEGAR\r\nTemu kunci segar di ambil saat order masuk\r\nHarga 10.000/250gr\r\n=Barang ready stock monggo langsung di beli=\r\n\r\nmanfaat temu kunci :\r\n1.Bumbu masak\r\n2.obat masuk angin\r', '', '23157329_967d00fc-aea9-4236-a56f-af6a748729fa_480_362.jpg', 0, '0000-00-00'),
(6, 3, 'Temu mangga', 30000, 999, '', 'Secara empiris, rimpang temu mangga secara tradisional dimanfaatkan untuk mengatasi gangguan perut, nyeri dada, demam, maag, dan perawatan post partum. Temu mangga berkhasiat sebagai penurun panas (antipiretik), penangkal racun (antitoksik), pencahar (laksatif), dan antioksidan.\r\nKhasiat lainnya untuk mengatasi kanker, sakit perut, mengecilkan rahim setelah melahirkan, mengurangi lemak perut, menambah nafsu makan, menguatkan syahwat, gatal-gatal pada Vagina, gatal-gatal (pruritis), luka, Sesak Nafas (asma), Radang Saluran Napas (bronkitis), demam, kembung, dan masuk angin,Diare dll.\r\nBerat 1 kg', '5184268_533bb59e-c775-4bf3-ae26-23c23367adfc_336_336.jpg', 0, '0000-00-00'),
(7, 3, 'Temu giring ', 15000, 999, '', '', '0_9f73be2b-f614-469b-bae9-e7b7273479f6_720_720.jpg', 0, '0000-00-00'),
(8, 3, 'Kencur', 37000, 90, '', '\r\n\r\nDeskripsi kencur\r\nKencur Rp 37.000/kg (harga eceran) dapatkan harga grosir di pembelian >50 kg\r\n\r\nNote : kencur tidak dicuci untuk menjaga kesegarannya dan tidak cepat busuk\r\n\r\nReady!!! Jual kencur dengan harga terbaik per-kilonya.\r\n\r\nKetentuan PENGIRIMAN:\r\nPengiriman H+1 dari pemesanan\r\n\r\nKencur banyak sekali manfaat yang diolah menjadi obat herbal, minuman herbal\r\n\r\nJika ingin pembelian skala besar? Silahkan kunjungi website kami di www.pasarbumbu.com atau instagram @pasarbumbu. Harga menyesuaikan dari quantity pembelian.\r\n\r\nSilahkan hubungi kami jika berminat menjadi reseller.', '5891317_8fdff2e7-fbb4-49f8-8388-2e65bf8524e8_480_480.jpg', 0, '0000-00-00'),
(9, 3, 'KUNYIT PUTIH SEGAR 1 KG KUNIR,TEMU', 20000, 90, '', 'Deskripsi KUNYIT PUTIH SEGAR 1 KG KUNIR,TEMU\r\nKetentuan ekspedisi pengiriman :\r\n1. pengiriman by JNE, J&amp;T, POS berat nett 1000 gr\r\n2. Pengiriman by WAHANA berat nett 900 gr ( berat bruto (berat net + Kardus) max 1000 gr)\r\n&nbsp;\r\n............................READY STOCK ...........\r\njual Kunir Putih( CURCUMA ZEDOARIA) 1kg,\r\nDESKRIPSI PRODUK\r\n* tersedia dalam bentuk SEGAR ( umbi Bonggol atau Umbi Rimpang)\r\n* CURCUMA ZEDOARIA yang kami jual BUKAN seperti kunyit putih yang berbentuk bulat-bulat putih (mirip buah anggur yg bergerombol) atau kami menyebutnya Kunci Rapet / Temu Pepet.\r\n* CURCUMA ZEDOARIA yang kami jual BUKAN pula seperti kunyit putih yang beraroma MANGGA pada daging rimpangnya\r\n* Packing pengiriman dalam Kardus ( tidak dalam plastik/ tas kresek ) hal ini untuk menjaga agar produk tidak terkena hawa panas karena tertutup plastik\r\n&nbsp;', '4208992_129250a4-479b-46f2-b819-c362f46dffd2.jpg', 3, '2020-11-09'),
(10, 3, 'Rimpang BANGLE 1KG ', 60000, 99, '', 'Deskripsi Rimpang BANGLE 1KG / PANGLAI / BENGLE (Zingiber purpureum Roxb.)\r\nKandungan dan Khasiat BENGLE / BANGLE\r\n&nbsp;\r\nBengle menagndung beberapa zat, yaitu damar, pati, tanin, dan minyak atsiri (sineol dan pinen). Bengle memiliki khasiat dan manfaat untuk mengobati beberapa jenis penyakit, yaitu cacingan, masuk angin, demam, obesitas, gangguan penglihatan, nyeri sendi, demam yang disertai pusing, mengecilkan perut setelah melahirkan, perut mules, dan obat sakit kuning.', '37651729_2a350ce5-4353-4f37-90b4-2087de2f5506_700_700.jpg', 0, '0000-00-00'),
(11, 3, 'Lempuyang wangi', 26500, 99, '', 'Deskripsi 1kg Lempuyang Wangi / Zingiber Zerumbet Organik\r\nHarga per 1kg\r\n&nbsp;\r\nLempuyang merupakan salah satu rempah yang banyak tumbuh di pedesaan, sering\r\ndigunakan sebagai minuman jamu maupun obat herbal, terkait senyawa penting yang\r\nterdapat di dalamnya. Rempah ini kaya akan minyak atsiri, yaitu limonen dan\r\nzerumbon (zat anti kejang).Lempuyang wangi sering juga digunakan sebagai\r\ncampuran obat. Masyarakat jawa tentu tidak asing dengan jamu cabe puyang,\r\nminuman segar yang berbahan lempuyang. Manfaat lempuyang cukup dikenal di dunia\r\nherbal, untuk melawan sel-sel kanker dengan melakukan induksi apoptosis.Sebuah\r\nstudi di Jepang mengungkapkan bahwa ekstrak lempuyang efektifdalam menghambat\r\ntumbuhnya sel-sel melanoma.Fakta Nutrisi LempuyangSenyawa bioaktif yang terdapat\r\ndi dalam rimpang lempuyang telah diteliti sejak tahun 1944, sehingga\r\nidentifikasi minyak esensial dari rempah ini didapat. Minyak alami ini banyak\r\nterdapat di akar seperti kamper, nerolidol, juga zerumbon yang ditemukan di\r\ndaunnya. Nutrisi lain yang ada di dalam lempuyang seperti flavonoid,\r\nseskuiterpenoid, senyawaaromatik, vanili, kaempferol, fenolik, saponin, dan\r\nterpenoidSifat tanaman lempuyangAnti-inflamasiHasil penelitian menunjukkan bahwa\r\nekstrak rimpang yang larut di dalam air merupakan inhibitor yang kuat pada\r\nperadangan akut.Anti-AsmaSenyawa yang dikandungnya dapat mendongkrak sistem\r\nkekebalan tubuh, pada penderita Asma.Antipiretik / analgesikRimpang ini\r\nmengandung etanol, sehingga bersifat analgesik dan antipiretik. Cocok digunakan\r\nuntuk menahan rasa sakit,Anti Tumor / Anti kankerZat zerumbon yang ada didalam\r\nrempah ini dapat menurunkan aktivasi Epstein-Barr virus.Lempuyang dapat\r\ndigunakan sebagai obat cacing, anti ketombe, anti mikroba, atau menghaluskan\r\nkulit.\r\n&nbsp;', '8080845_2a2fee7a-b215-4bd5-a15c-40043bbee2ba_400_400.jpg', 0, '0000-00-00'),
(12, 3, 'Lengkuas ', 9000, 80, '', '', '8179681_6f97f986-541a-4d6c-b4c5-9f808cdf5b1e_421_421.jpg', 0, '0000-00-00'),
(13, 3, 'Jahe Merah Fresh 1kg', 36500, 99, '', 'Deskripsi Jahe Merah Fresh 1kg\r\nJahe Merah Fresh 1kg (Asli Medan)\r\n&nbsp;\r\nTidak Perlu Tanya Ready atau tidak?BARANG SELALU READY!! Jadi Langsung di order saja ????\r\n&nbsp;\r\nJahe Merah Segar &amp; Fresh ( Jahe Medan )\r\n&nbsp;\r\nHarga tertera adalah harga untuk 1kg jahe merah segar.\r\nDikirim keadaan segar, masih ada tanah menempel tapi minim\r\n&nbsp;\r\nMenyediakan:\r\n&nbsp;\r\n-Jahe Merah Bersih Segar 1kg', '747392623_f76f876d-5de8-454b-aa36-cc045ecef612_360_360.jpg', 0, '0000-00-00'),
(14, 7, 'Jamur Kuping Kering Bokni Bokji Hitam Dried Black Fungus 40g', 13500, 1000, '', 'Deskripsi Jamur Kuping Kering Bokni Bokji Hitam Dried Black Fungus 40g\r\nDried Black Fungus / Jamur Kuping Hitam\r\n&nbsp;\r\nisi 40 gr / bungkus\r\n&nbsp;\r\nJamur kuping Hitam bagus dan tebal untuk kesehatam jantung, melancarkan peredaran darah.\r\n&nbsp;\r\nbiasanya dimasak bersama Red Dates/ Angco dan jahe untuk mencegah jantung coroner.\r\n&nbsp;\r\nManfaat Jamur Kuping\r\n- Melancarkan pencernaan\r\n- Meringankan gejala wasir\r\n- Baik untuk menurunkan berat badan\r\n- Mencegah anemia\r\n- Melancarkan sirkulasi darah\r\n- Aman dikonsumsi penderita diabetes\r\n- Menurunkan kadar kolesterol , dll', '8947130_24227ac8-8949-43ec-be8c-f08265ef01c6_800_800.jpg', 0, '0000-00-00'),
(15, 7, 'Jamur Champignon Fresh', 6100, 99, '', 'Deskripsi Jamur Champignon Fresh\r\nSelamat Datang di Bakoel Sayur Online!\r\nPenuhi kebutuhan dapur Anda dengan berbelanja di sini.\r\nBelanja praktis, pesan hari ini besok langsung diantar!\r\nHarga murah kualitas Premium!\r\n&nbsp;\r\nDESKRIPSI PRODUK\r\nJamur Champignon Fresh - HARGA PER @100gr\r\n&nbsp;\r\nDESKRIPSI PENGIRIMAN - (PENTING!)\r\nPesanan 00:00 - 20:00 dikirim H+1\r\nPesanan 20:01 - 23:59 dikirim H+2\r\nStart pengiriman setiap harinya pk. 08:00 (mengikuti antrian dan sistem pengantaran)\r\n&nbsp;\r\nKami merupakan supplier utama dari banyak restaurant terkemuka di Indonesia. Kini kami hadir melayani Anda via online di Marketplace kesayangan Anda. Kami menjamin kesegaran produk kami terutama Sayur dan Buah yang kami kirim setiap harinya, sehingga, sayur yang baru dipanen akan dikirim setiap harinya waktu dini hari. Setelah datang, kami bersihkan dan siapkan untuk dikirimkan ke pelanggan. Maka tertulis dalam DESKRIPSI PENGIRIMAN, keterangan waktu pemesanan dan pengiriman belanjaan Anda. Agar Sayur dan Buah yang Anda terima adalah yang terbaik dari kami.\r\nSelamat Berbelanja dan Selamat Menikmati Sayur dan Buah segar dengan standar Restaurant dari kami!', '30497455_c8854ceb-1e74-4614-838c-1f81d6ab7fc0_500_500.jpg', 0, '0000-00-00'),
(16, 7, 'jamur enoki korea 100gr termurah', 5500, 998, '', 'Deskripsi jamur enoki korea 100gr termurah\r\nJamur enoki atau enokitake merupakan jenis jamur edible atau dapat dikonsumsi. Jamur ini berbentuk menyerupai lidi yang bertopi atau seperti tauge berwarna putih kekuningan.\r\n&nbsp;\r\nJamur ini banyak digunakan dalam berbagai masakan sup dalam Jepang, Korea, masakan Cina, dan Vietnam.Jamur mempunyai tekstur garing dan aroma yang segar.Bagian akar perlu dipotong sebelum digunakan dalam masakan.Jamur segar tahan disimpan di lemari es sampai satu minggu.\r\nJamur Enokitake mengandung banyak serat...\r\nJamur ini juga mengandung banyak protein dan beberapa vitamin seperti vitamin B, serta mineral..\r\nJamur ini juga tidak mengandung gula sehingga aman dikonsumsi oleh penderita diabetes dan juga dapat dijadikan pilihan bahan makanan untuk diet..\r\n&nbsp;\r\nTips : Agar lebih lezat, cuci jamur di air mengalir. Jangan memasak Jamur Enoki lebih dari 5 menit. Utk merebus dalam air mendidih cukup 1 menit saja. Setelah matang, sebaiknya jamur segera dikonsumsi.\r\n&nbsp;\r\nDemi menjaga mutu produk, kami menyarankan customer menggunakan pengiriman Go-Jek Instant Courier (pengiriman express), dibanding Go-Jek Same-Day Delivery (pesanan dikirim max. dalam 24 jam). Kami tidak menerima keluhan tentang kualitas produk yang dikirim dengan layanan Go-Jek Same Day Delivery, mengingat kesegaran produk kami sangat dipengaruhi waktu. Terima kasih dan happy shopping!', '8424e882-3ae6-4e77-9290-391a8f3eb604.jpg', 0, '0000-00-00'),
(17, 7, 'Jamur Merang', 14000, 99, '', 'Deskripsi Jamur Merang\r\n-Jamur Merang 250 gram per pack-\r\n&nbsp;\r\n*Mohon untuk dibaca*\r\n&nbsp;\r\n*Pengiriman produk dapat dilakukan melalui:\r\n1. GO-JEK/GRAB INSTANT COURIER (pengiriman express)\r\n2. GO-JEK/GRAB SAME-DAY DELIVERY\r\n&nbsp;\r\n*Untuk produk sayur mayur tidak bisa dikirim menggunakan pengiriman 1 hari 1 malam karena kualitas dan kesegaran produk akan mengalami penurunan.\r\n&nbsp;\r\n*Ketersediaan Produk\r\nSemua produk dengan status \"aktif\" di etalase semuanya ready, tetapi jika pembeli ingin memastikan ketersediaan produk dapat menghubungi penjual.\r\n&nbsp;\r\n*Pesanan yg akan dikirim hari selanjutnya (H+1) adalah pesanan yg telah melakukan pembayaran sebelum pukul 22.00 WIB. Sesudah pukul 22.00 WIB pesanan akan dikirim hari berikutnya lagi (H+2).\r\n&nbsp;\r\n*Jadwal Pengiriman\r\nSetiap Hari\r\n&nbsp;\r\n*Jika barang yg dibutuhkan cepat atau perlu QTY yg banyak dapat menghubungi penjual.\r\n&nbsp;\r\n-Terimakasih-', '8429232_73f481f7-b533-4339-acf4-ab8ba1f5bbab_1024_1024.jpg', 0, '0000-00-00'),
(18, 7, 'Jamur Kancing/Jamur Champignon 100Gr', 9500, 96, '', '<p>Deskripsi Sayuran Segar Sayur Jakarta FRESH Jamur Kancing/Jamur Champignon 100Gr Jadwal Pengiriman Toko Gunakan Pengiriman GRAB / GOJEK Same Day : 6-8 jam (datang tidak menentu - sampai tidak menentu) Instant : 2-3 jam (datang langsung - langsung diantar) &nbsp; gunakan lah jasa pengiriman yg sesuai dengan tempat anda. kami tidak menanggung kerusakan barang selain pengiriman di atas</p>', '4179b01e-b1d0-4651-942d-07934af2f8bb.jpg', 0, '0000-00-00'),
(19, 7, 'Jamur Shimeji', 9500, 30, '', 'MAU BELANJA SAYUR ,BUAH SERTA SEMBAKO? DI Nestsayurbuah Aja Kakak ^^\r\nFAST RESPON DAN DIKIRIM HARI YANG SAMA (S&amp;K Berlaku)\r\nNote Harap diperhatikan :\r\n1. Pesanan Sayur/Buah dibawah jam 09.00 akan dikirim dihari yang sama dengan kurir ekspedisi pilihan\r\n2. Pesanan Sayur/Buah diatas jam 09.00 akan dikirim dihari berikutnya, kecuali hari minggu dikirim lusa (minggu tidak ada jadwal pengiriman)\r\n3. Untuk pesanan Sayur/Buah wajib pilih (Instant/Sameday courier),\r\nSelain itu kami tidak bertanggung jawab jika buah / sayur diterima dalam keadaan tidak baik.\r\nMembeli = setuju (No complain)\r\n4. Pesanan Sembako dibawah jam 15:00 dikirim dihari yang sama dengan kurir ekspedisi pilihan\r\n5. Pesanan Sembako diatas jam 15:00 dikirim dihari berikutnya kecuali hari minggu dikirim lusa (minggu tidak ada jadwal pengiriman)\r\n6. FREE ONGKIR untuk wilayah Sunter,Kemayoran, Kelapa Gading (Khusus order via WA 0877-9313-4559)\r\n7. FREE MASKER 3 PLY EXCLUSIVE NESTSAYURBUAH (S&amp;K Berlaku)\r\n8. Seluruh barang yang kami jual sudah melalui proses QC &amp; sterilisasi sebelum di packing (menghindari penyebaran wabah covid19)\r\n9. Order diterima Senin - Minggu\r\n&nbsp;', '99529699_4d72ec72-c5f2-4743-a73f-77874ab15f24_427_427.png', 0, '0000-00-00'),
(20, 7, 'jamur shiitake 100gr jamur shitake jamur yoko hioko', 26000, 80, '', '', '13300713_aa161986-cbd3-411d-83de-aa888c95627b_350_350.jpg', 0, '0000-00-00'),
(21, 7, 'Jamur Matsutake', 3500000, 3, '', '', '22380879_89cfffa4-f0b6-4c17-835e-b1aeeb1eea3d_700_700.jpg', 0, '0000-00-00'),
(22, 7, 'Jamur Truffle', 900000, 10, '', '', '9_-Jamur-Truffle-768x473.jpg', 0, '0000-00-00'),
(23, 7, 'Jamur Lingzhi', 32500, 40, '', '', '10_-Jamur-Lingzhi-768x473.jpg', 0, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `tb_content`
--

CREATE TABLE `tb_content` (
  `kodecontent` int(1) NOT NULL,
  `judul` varchar(20) NOT NULL,
  `isicontent` longtext NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_content`
--

INSERT INTO `tb_content` (`kodecontent`, `judul`, `isicontent`) VALUES
(4, 'Tata Cara Pemesanan', 'Data Tata Cara Pemesanan Belum Tersedia'),
(3, 'Contact Person', 'Data Contact Person Belum Tersedia'),
(1, 'Profil', 'Data Profil Belum Tersedia'),
(2, 'Cara Pembayaran', 'Cara Pembayaran belum tersedia'),
(5, 'Garansi Uang Kembali', 'informasi Garansi Uang Kembali belum tersedia'),
(6, 'Tentang Kami', 'informasi Tentang Kami belum tersedia'),
(7, 'Ongkos Kirim', 'informasi ongkos kirim belum tersedia'),
(20, 'Tata Cara Pemesanan', 'Data Tata Cara Pemesanan Belum Tersedia'),
(21, 'ds', 'sd');

-- --------------------------------------------------------

--
-- Table structure for table `tb_detilkategori`
--

CREATE TABLE `tb_detilkategori` (
  `kodedetil` int(11) NOT NULL,
  `namadetil` varchar(40) DEFAULT NULL,
  `fotoKategori` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_detilkategori`
--

INSERT INTO `tb_detilkategori` (`kodedetil`, `namadetil`, `fotoKategori`) VALUES
(3, 'Empon', 'GettyImages-477756915_54_990x660.jpg'),
(7, 'Jamur', 'jenis-jamur-yang-bisa-dikonsumsi1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_detilnota`
--

CREATE TABLE `tb_detilnota` (
  `nomornota` varchar(11) NOT NULL,
  `tglnota` date NOT NULL,
  `username` varchar(20) NOT NULL,
  `kodebarang` int(5) DEFAULT NULL,
  `banyak` int(2) DEFAULT NULL,
  `harga` double DEFAULT NULL,
  `proses` int(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_detilnota`
--

INSERT INTO `tb_detilnota` (`nomornota`, `tglnota`, `username`, `kodebarang`, `banyak`, `harga`, `proses`) VALUES
('0001', '2020-07-01', 'saputra', 6, 2, 2000000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_keranjang`
--

CREATE TABLE `tb_keranjang` (
  `id` int(11) NOT NULL,
  `kodebarang` int(5) DEFAULT NULL,
  `kodepelanggan` int(5) DEFAULT NULL,
  `banyak` int(2) DEFAULT NULL,
  `harga` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_keranjang`
--

INSERT INTO `tb_keranjang` (`id`, `kodebarang`, `kodepelanggan`, `banyak`, `harga`) VALUES
(8, 7, 5, 1, NULL),
(9, 14, 5, 3, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_pemesanan`
--

CREATE TABLE `tb_pemesanan` (
  `idpemesanan` int(11) NOT NULL,
  `kodepelanggan` int(11) NOT NULL,
  `kodetransaksi` varchar(15) NOT NULL,
  `namadepan` varchar(20) NOT NULL,
  `namabelakang` varchar(20) NOT NULL,
  `notlp` varchar(14) NOT NULL,
  `alamatpenerima` varchar(200) NOT NULL,
  `daerah` varchar(20) NOT NULL,
  `kdpos` int(5) NOT NULL,
  `tglbeli` date NOT NULL,
  `tglkirim` date NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pemesanan`
--

INSERT INTO `tb_pemesanan` (`idpemesanan`, `kodepelanggan`, `kodetransaksi`, `namadepan`, `namabelakang`, `notlp`, `alamatpenerima`, `daerah`, `kdpos`, `tglbeli`, `tglkirim`, `status`) VALUES
(4, 4, 'RJG7ZjzJxkDybYX', 'ddd', 'dddd', '3333333', 'dd', 'ddddd', 333, '2020-06-30', '2020-07-01', 'Sukses'),
(5, 4, 'RJj3T8fnRrtVOxC', 'aaa', 'a', '3333333', 'sssss', 'sssssss', 333333, '2020-06-30', '2020-07-01', 'Sukses'),
(6, 4, 'RJr1dcCV4GJEO8f', 'S', 'S', '3333', 'S', 'A', 33, '2020-06-30', '0000-00-00', 'Proses'),
(10, 8, 'HIRYxJG8i1a2tWX', '1eds', 'dsfds', '342342', 'dsfsd', 'dsf', 2314, '2020-11-09', '0000-00-00', 'Proses');

-- --------------------------------------------------------

--
-- Table structure for table `tb_polling`
--

CREATE TABLE `tb_polling` (
  `id` int(11) NOT NULL,
  `question` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `answer1` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `answer2` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `answer3` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `answer4` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `vote1` int(10) NOT NULL,
  `vote2` int(10) NOT NULL,
  `vote3` int(10) NOT NULL,
  `vote4` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_polling`
--

INSERT INTO `tb_polling` (`id`, `question`, `answer1`, `answer2`, `answer3`, `answer4`, `vote1`, `vote2`, `vote3`, `vote4`) VALUES
(1, 'Menurut Anda Bagaimana Tampilan Website ini?', 'Bagus', 'Lumayan', 'Biasa', 'Jelek', 510, 249, 177, 1095);

-- --------------------------------------------------------

--
-- Table structure for table `tb_transfer`
--

CREATE TABLE `tb_transfer` (
  `nomortransfer` int(5) NOT NULL,
  `nomornota` varchar(5) DEFAULT NULL,
  `tgltransfer` date DEFAULT NULL,
  `namabank` varchar(20) DEFAULT NULL,
  `pemilikrekening` varchar(40) DEFAULT NULL,
  `jumlahuang` double DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT '0',
  `pesan` longtext
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_transfer`
--

INSERT INTO `tb_transfer` (`nomortransfer`, `nomornota`, `tgltransfer`, `namabank`, `pemilikrekening`, `jumlahuang`, `status`, `pesan`) VALUES
(1, '00001', '2016-06-28', 'Bank Mandiri', 'Saputra', 11499000, 1, 'Telah ditransfer.');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `kduser` int(5) NOT NULL,
  `namadepan` varchar(20) DEFAULT NULL,
  `namabelakang` varchar(20) DEFAULT NULL,
  `tempatlahir` varchar(15) DEFAULT NULL,
  `tgllahir` date DEFAULT NULL,
  `kota` varchar(15) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `nomorhp` varchar(15) DEFAULT NULL,
  `username` varchar(10) DEFAULT NULL,
  `password` varchar(60) DEFAULT NULL,
  `akses` int(1) NOT NULL,
  `status` int(1) DEFAULT NULL,
  `alamat` varchar(70) DEFAULT NULL,
  `foto` varchar(60) NOT NULL,
  `codeAktivasiAkun` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`kduser`, `namadepan`, `namabelakang`, `tempatlahir`, `tgllahir`, `kota`, `email`, `nomorhp`, `username`, `password`, `akses`, `status`, `alamat`, `foto`, `codeAktivasiAkun`) VALUES
(4, 'Saputra', '', 'Pontianak', '1980-01-20', 'Pontianak', 'saputra@yahoo.co.id', '-', 'saputra', 'saputra', 1, 1, NULL, '', ''),
(5, 'Lely', 'Yati', 'Pontianak', '1989-11-10', 'Pontianak', 'lely@yahoo.com', '-', 'lely', 'deb574e7ea12208a2846b90e1ade564b', 1, 1, NULL, '', ''),
(6, 'Kristi', 'Yanti', 'Pontianak', '1985-07-06', 'Pontianak', 'kristi@yahoo.com', '-', 'kristi', 'eedf080e46e02c103fb1081643ff90c5', 1, 1, NULL, '', ''),
(8, 'Rahayu', 'Puspita', 'Sragen', '1996-07-13', 'Sragen', 'rahayupuspita@yahoo.co.id', '08321434523', '1', '1', 1, 1, NULL, '', ''),
(9, 'admin', 'admin', 'Sragen', '1996-07-13', 'Sragen', 'rahayupuspita@yahoo.co.id', '08321434523', 'admin', 'admin', 0, 1, NULL, '', ''),
(10, 'aaa', 'bbb', NULL, NULL, NULL, 'triska619@gmail.com', NULL, 'triska', '123', 0, 0, NULL, '', 'mJBYj6FZiKkoW9D'),
(11, '123', '321', NULL, NULL, NULL, 'triska619@gmail.com', NULL, '1234335', '123', 0, 0, NULL, '', 'ImJ6y8owBilQ5aX');

-- --------------------------------------------------------

--
-- Table structure for table `vbarang`
--

CREATE TABLE `vbarang` (
  `kodebarang` int(11) DEFAULT NULL,
  `namabarang` varchar(80) DEFAULT NULL,
  `namadetil` varchar(40) DEFAULT NULL,
  `harga` double DEFAULT NULL,
  `deskripsi` longtext
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `vinvoice`
--

CREATE TABLE `vinvoice` (
  `nomornota` varchar(11) DEFAULT NULL,
  `tglnota` date DEFAULT NULL,
  `namabarang` varchar(80) DEFAULT NULL,
  `banyak` int(2) DEFAULT NULL,
  `harga` double DEFAULT NULL,
  `jumlah` double DEFAULT NULL,
  `proses` int(1) DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `vkeranjang`
--

CREATE TABLE `vkeranjang` (
  `kodebarang` int(5) DEFAULT NULL,
  `namabarang` varchar(80) DEFAULT NULL,
  `banyak` int(2) DEFAULT NULL,
  `harga` double DEFAULT NULL,
  `jumlah` double DEFAULT NULL,
  `id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `vnota`
--

CREATE TABLE `vnota` (
  `nomornota` int(11) NOT NULL,
  `tglnota` date DEFAULT NULL,
  `idpemesanan` int(5) NOT NULL,
  `kodebarang` int(5) NOT NULL,
  `banyak` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vnota`
--

INSERT INTO `vnota` (`nomornota`, `tglnota`, `idpemesanan`, `kodebarang`, `banyak`) VALUES
(2, '2020-06-30', 4, 8, 3),
(3, '2020-06-30', 5, 7, 1),
(4, '2020-06-30', 5, 10, 2),
(5, '2020-06-30', 6, 10, 1),
(6, '2020-06-30', 6, 18, 4),
(7, '2020-06-30', 5, 7, 1),
(8, '2020-06-30', 5, 7, 1),
(9, '2020-11-09', 10, 18, 3),
(10, '2020-11-09', 10, 13, 1),
(11, '2020-11-09', 10, 14, 1);

--
-- Triggers `vnota`
--
DELIMITER $$
CREATE TRIGGER `jual_produk` AFTER INSERT ON `vnota` FOR EACH ROW BEGIN
	UPDATE tb_barang SET stok=stok-NEW.banyak
    WHERE kodebarang=NEW.kodebarang;
END
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`idbanner`);

--
-- Indexes for table `site`
--
ALTER TABLE `site`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`kodebarang`),
  ADD KEY `kodedetil` (`kodedetil`);

--
-- Indexes for table `tb_content`
--
ALTER TABLE `tb_content`
  ADD PRIMARY KEY (`kodecontent`);

--
-- Indexes for table `tb_detilkategori`
--
ALTER TABLE `tb_detilkategori`
  ADD PRIMARY KEY (`kodedetil`);

--
-- Indexes for table `tb_detilnota`
--
ALTER TABLE `tb_detilnota`
  ADD KEY `nomornota` (`nomornota`),
  ADD KEY `kodebarang` (`kodebarang`);

--
-- Indexes for table `tb_keranjang`
--
ALTER TABLE `tb_keranjang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kodebarang` (`kodebarang`),
  ADD KEY `kodepelanggan` (`kodepelanggan`);

--
-- Indexes for table `tb_pemesanan`
--
ALTER TABLE `tb_pemesanan`
  ADD PRIMARY KEY (`idpemesanan`);

--
-- Indexes for table `tb_polling`
--
ALTER TABLE `tb_polling`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_transfer`
--
ALTER TABLE `tb_transfer`
  ADD PRIMARY KEY (`nomortransfer`),
  ADD KEY `nomornota` (`nomornota`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`kduser`);

--
-- Indexes for table `vnota`
--
ALTER TABLE `vnota`
  ADD PRIMARY KEY (`nomornota`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `idbanner` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `site`
--
ALTER TABLE `site`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_barang`
--
ALTER TABLE `tb_barang`
  MODIFY `kodebarang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tb_content`
--
ALTER TABLE `tb_content`
  MODIFY `kodecontent` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tb_detilkategori`
--
ALTER TABLE `tb_detilkategori`
  MODIFY `kodedetil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_keranjang`
--
ALTER TABLE `tb_keranjang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tb_pemesanan`
--
ALTER TABLE `tb_pemesanan`
  MODIFY `idpemesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_polling`
--
ALTER TABLE `tb_polling`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_transfer`
--
ALTER TABLE `tb_transfer`
  MODIFY `nomortransfer` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `kduser` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `vnota`
--
ALTER TABLE `vnota`
  MODIFY `nomornota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
