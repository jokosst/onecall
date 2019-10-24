-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 03, 2018 at 08:51 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onecall`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_us`
--

CREATE TABLE `about_us` (
  `id` int(3) NOT NULL,
  `isi` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `about_us`
--

INSERT INTO `about_us` (`id`, `isi`) VALUES
(1, 'cobe lah saye usahakan');

-- --------------------------------------------------------

--
-- Table structure for table `agency`
--

CREATE TABLE `agency` (
  `id` int(3) NOT NULL,
  `id_witel` int(3) NOT NULL,
  `agency` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `agency`
--

INSERT INTO `agency` (`id`, `id_witel`, `agency`) VALUES
(1, 1, 'TELKOM'),
(2, 1, 'GFD'),
(3, 1, 'GG'),
(4, 2, 'aman');

-- --------------------------------------------------------

--
-- Table structure for table `datel`
--

CREATE TABLE `datel` (
  `id` int(3) NOT NULL,
  `id_witel` int(3) NOT NULL,
  `datel` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `datel`
--

INSERT INTO `datel` (`id`, `id_witel`, `datel`) VALUES
(1, 1, 'PONTIANAK'),
(2, 1, 'MEMPAWAH'),
(3, 1, 'SINGKAWANG'),
(4, 1, 'SANGGAU'),
(5, 1, 'KETAPANG'),
(6, 1, 'SINTANG'),
(7, 2, 'fsd');

-- --------------------------------------------------------

--
-- Table structure for table `follow`
--

CREATE TABLE `follow` (
  `id` int(3) NOT NULL,
  `track_id` varchar(50) NOT NULL,
  `id_user` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `no_hp_alt` varchar(20) NOT NULL,
  `appointment` date NOT NULL,
  `lat` varchar(100) NOT NULL,
  `lng` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `catatan` varchar(500) NOT NULL,
  `foto` longtext NOT NULL,
  `done` int(1) DEFAULT NULL,
  `appointment_waktu` varchar(100) DEFAULT NULL,
  `odp` varchar(100) DEFAULT NULL,
  `nd_telp` varchar(100) DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `witel` varchar(20) NOT NULL,
  `sales_id` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `follow`
--

INSERT INTO `follow` (`id`, `track_id`, `id_user`, `nama`, `no_hp`, `no_hp_alt`, `appointment`, `lat`, `lng`, `alamat`, `catatan`, `foto`, `done`, `appointment_waktu`, `odp`, `nd_telp`, `timestamp`, `witel`, `sales_id`) VALUES
(2, 'MYIR-10035796360001', 'OLIVR46', 'Syeh Ismail', '089675155474', '081298999251', '2018-03-24', '-0.03828048421257122', '109.32662688195705', '08-Mar-18 08:00|Jl.kampung arab gg.kif 99 no.59 undefined, Pontianak Timur//085821671876|ZN160793|FC', 'test doang', '[\"\\/data\\/storage\\/uploads\\/cpSABCjb1P-1521767560.jpg\"]', 1, NULL, NULL, NULL, '2018-04-02 06:51:50', 'KALBAR', 1),
(3, 'MYIR-10034509790001', 'OLIVR46', 'ADITYA FERWANDI', '082351621175', '8849464', '2018-03-24', '-0.035715287100974755', '109.35368735343218', '20-Feb-18 16:00|jalan pramuka komp dalisha permai 2 BLOK. A.32 parit langgar,KEC. sungai rengas //CP', 'Tes foto', '[\"\\/data\\/storage\\/uploads\\/CrW44ov9w2-1521771219.jpg\",\"\\/data\\/storage\\/uploads\\/YzVSMb7NlP-1521771219.jpg\"]', 1, NULL, NULL, NULL, '2018-04-02 06:51:50', 'KALBAR', 0),
(4, 'MYIR-10036509960001', 'SPIND93', 'DEWI NURHAYATI', '085245088007', '0', '2018-03-23', '-0.017877928622531198', '109.31212686002254', '2018-03-19 08:00|jl.H rais arahman Gg. Lawu No.52|830054|WITEL', 'gg lawu no 52', '[\"\\/data\\/storage\\/uploads\\/ZEWMPsfTP7-1521778919.jpg\"]', 1, NULL, NULL, NULL, '2018-04-02 06:51:50', '', 0),
(5, 'MYIR-10037007280001', 'SPYNO88', 'PPK SELUAS-ENTIKONG', '081314087686', '088655', '2018-03-30', '-0.03562409201214628', '109.35359749943018', '24-Mar-2018 08:00|RNA // Konfrimasi no laternatif //  Ibu Wiwit (pic) // JL. PURNAMA 1 GG PURNAMA GR', 'Test lagi', '[\"\\/data\\/storage\\/uploads\\/eiSeUf2FTe-1521875752.jpg\"]', 1, NULL, NULL, NULL, '2018-04-02 06:51:50', '', 0),
(6, 'MYIR-10033165600001', 'OLIVR46', 'LIM MENG HONG', '081256082836', '123', '2018-03-24', '-0.034783554920769184', '109.32694640010595', 'test', 'test', '[\"\\/data\\/storage\\/uploads\\/V6BPOJVAbI-1521876481.jpg\"]', NULL, NULL, NULL, NULL, '2018-04-02 06:51:50', '', 0),
(7, 'MYIR-10035159550001', 'OLHEROO', 'lisdaniar', '08991048868', '123', '2018-03-26', '-0.03326710126640848', '109.32685084640981', '28-Feb-18 15:00|Lanjut / 6112015608860011 / Dusun Keramat Rt01/RWw1 Desa Kuala Dua Kec. Sungai Raya ', 'dekat blsbla bla test', '[]', 1, NULL, NULL, NULL, '2018-04-02 06:51:50', '', 0),
(8, 'MYIR-10037009560001', 'SPYNO88', 'TJEN CIE YAP', '08125766379', '085274737171', '2018-03-26', '-0.03612667082778201', '109.32529784739016', '2018-03-24 08:00|JL. DESA KAPUR KOMP. MEKAR SARI 3 NO D - 16|830054|WITEL', 'Nichi testing', '[\"\\/data\\/storage\\/uploads\\/ZwI5EqJjkP-1521942465.jpg\"]', 1, NULL, NULL, NULL, '2018-04-02 06:51:50', '', 0),
(9, 'MYIR-10037137190001', 'OLYYK82', 'Ainur Rafik', '085386864446', '123', '2018-03-26', '-1.5697588553170945', '110.5215459689498', '27-Mar-2018 13:01|jl. Gatot subroto gg kakak tua 1 no.E13 rt 033 rw 009 kel. sampit kec.delta pawan ', 'test aja', '[\"\\/data\\/storage\\/uploads\\/xBjlGoe1Ez-1521991099.jpg\"]', 1, NULL, NULL, NULL, '2018-04-02 06:51:50', '', 0),
(12, 'MYIR-10035706220001', 'OLIVR46', 'INDAH OKTARIA USDIANTI, SE', '08115690082', '1', '2018-03-29', '-0.03562409201214628', '109.35359749943018', '10-Mar-18 11:00|LANJUT / Jalan Suka Mulia komplek sukma mansion nomor 15 A Pontianak Kota patokannya', 'Test', '[\"\\/data\\/storage\\/uploads\\/9cD0GxMmq2-1521992076.jpg\"]', 1, NULL, NULL, NULL, '2018-04-02 06:51:50', '', 0),
(13, 'MYIR-10037092040004', 'OLYYK82', 'Agus Supriyadi', '085822089936', '123', '2018-03-26', '-1.5697588553170945', '110.5215459689498', '27-Mar-2018 10:31|Jl. H. Agus Salim B03, Sampit, Delta Pawan, Kabupaten Ketapang, Kalimantan Barat 7', 'tessst', '[\"\\/data\\/storage\\/uploads\\/3NdRCSnme9-1521993160.jpg\"]', 1, NULL, NULL, NULL, '2018-04-02 06:51:50', '', 0),
(14, 'MYIR-10037051350001', 'SPJKS92', 'BONG JUNIANTO', '085332672945', '0', '1970-01-01', '0.07771597654755352', '111.49882659316062', '25-Mar-2018 09:00|Jl. Taruna Toko Pulau Indah No. 01 Kel. Tanjung Puri, Kec. Sintang, Kabupaten Sint', 'Sudah PS tanggal 25 Maret 2018', '[]', 1, NULL, NULL, NULL, '2018-04-02 06:51:50', '', 1),
(15, 'MYIR-10036950720003', 'SPFRA93', 'tumilah', '0897177282', '08971772822', '2018-03-26', '-0.030126905543153306', '109.37093697488308', '2018-03-23 08:00|jl.sambas barat 9 no.154 blok 13,pontianak|830054|WITEL', 'rumah di sebelah gg.mentibu 2', '[\"\\/data\\/storage\\/uploads\\/iE7rrxjVhp-1522024578.jpg\"]', 1, NULL, NULL, NULL, '2018-04-02 06:51:50', '', 0),
(16, 'MYIR-10036675190001', 'SPJKS92', 'WALIDAYA', '085349892969', '0', '2018-03-26', '0.038029362449233446', '111.46556485444307', '21-Mar-2018 10:31|Jl. Mt. Haryono km6 toko kaca,kel. balai agung, Kec. Sintang, Kabupaten Sintang, K', 'Sudah PS', '[]', 1, NULL, NULL, NULL, '2018-04-02 06:51:50', '', 0),
(17, 'MYIR-10037135970001', 'SPIND93', 'JUNAIDI.SH', '081352542442', '0', '2018-03-26', '-0.00968847419174702', '109.29945476353168', '26-Mar-2018 10:31|jl.nawawi hasan Gg. Matan 1 no 287, Sungai Beliung, Pontianak Bar., Kota Pontianak', 'Jl.nawawi hasan gg matan 1 no 287', '[]', 1, NULL, NULL, NULL, '2018-04-02 06:51:50', '', 0),
(18, 'MYIR-10027931690002', 'SPIND93', 'AGUS GUNAWAN', '081231046060', '0', '2018-03-26', '-0.028257070826412673', '109.3033791705966', '2018-03-25 08:00|jl.ujung pandang komp janur asri no B11|830054|WITEL', 'Jl.ujung pandang gg janur asri no B11\r\nRmh cat warna abu2 cat pagar warna hitam', '[]', 1, NULL, NULL, NULL, '2018-04-02 06:51:50', '', 0),
(19, 'MYIR-10037026270001', 'SPIND93', 'RICKY SANJAYA', '082158594577', '0', '2018-03-26', '-0.007929615651080605', '109.31454051285982', '2018-03-25 08:00|Jl. R.E Martadinata Blok C7|830054|WITEL', 'Jl.martadinata ruko no C7  sederet jl.apel samping toko hoki hoki', '[]', 1, NULL, NULL, NULL, '2018-04-02 06:51:50', '', 0),
(20, 'MYIR-10037155440001', 'SPRLY91', 'LIM YAK KIAN', '081345506380', '0', '2018-03-26', '-0.07591755701946769', '109.3449507281184', '26-Mar-2018 08:00|Jl. Padat Karya,  Komp. GrandView No. B22, Bansir Darat, Pontianak Tenggara, Kota ', 'Pelanggan minta pasangkan hari ini jam 3/4\r\nOdp cuman 30m depan rumah pelanggan.. Segera di Libas..', '[]', 1, NULL, NULL, NULL, '2018-04-02 06:51:50', '', 0),
(21, 'MYIR-10037146470001', 'SPDDA85', 'LIU SU LING', '08534686672088', '0', '2018-03-26', '0.8773689164764712', '108.95000450313091', '2018-03-26 10:31|-|930325|WITEL', 'pasang hari ini', '[\"\\/data\\/storage\\/uploads\\/qGGs1ImVPS-1522026243.jpg\"]', 1, NULL, NULL, NULL, '2018-04-02 06:51:50', '', 0),
(22, 'MYIR-10037116210001', 'SPSBA88', 'Bukhori', '085245545617', '085252474655', '2018-03-26', '-0.09812923938885015', '109.39846649765967', '26-Mar-2018 08:00|Gg. Teluk Harapan B12 Sungai Raya, Kabupaten Kubu Raya, Kalimantan Barat, patokann', 'Jalan Adi Sucipto Gg.Teluk Harapan Nomor B12 samping BTN Teluk Mulus Sungai Raya, Kabupaten Kubu Raya,Kalimantan Barat.', '[\"\\/data\\/storage\\/uploads\\/i9MkLq7r9j-1522026667.jpg\"]', 1, NULL, NULL, NULL, '2018-04-02 06:51:50', '', 0),
(23, 'MYIR-10037119780001', 'SPSBA88', 'Lorensius', '082353053237', '082148542774', '2018-03-26', '-0.10006377974728042', '109.38870057463647', '25-Mar-2018 15:31|Jl. Parit Tengkorak Gg Beyduri No 11 Sungai Raya, Kabupaten Kubu Raya, Kalimantan ', 'Jalan Parit Tengkorak Gg.Beyduri No.11 Sungai Raya,Kabupaten Kubu Raya,Kalimantan Barat.', '[\"\\/data\\/storage\\/uploads\\/qzKEhVZ7kB-1522027148.jpg\"]', 1, NULL, NULL, NULL, '2018-04-02 06:51:50', '', 0),
(24, 'MYIR-10037182050001', 'SPSBA88', 'Bambang', '085822121830', '089502199078', '2018-03-26', '-0.0023590028279223303', '109.28417723625898', '26-Mar-2018 09:00|Jalan Pelopor Komplek Pondok Harapan Kita Blok P1, kel : Sungai bliung kec : , Sun', 'Jalan Pelopor Komplek Pondok Harapan Kita Gg.Pinishi blok P1 dekat warnet Amiyau & depan warung Kelurahan Sungai Beliung,Kecamatan Sungai Rengas,Kabupaten Kubu Raya,Kalimantan Barat.', '[\"\\/data\\/storage\\/uploads\\/1j25L8JQF6-1522028170.jpg\"]', 1, NULL, NULL, NULL, '2018-04-02 06:51:50', '', 0),
(25, 'MYIR-10037143160001', 'SPAIN88', 'hendry', '0813225176988', '0', '2018-03-26', '-0.04786468485564531', '109.35526717454195', '2018-03-26 08:00| Adi Sucipto No.69a, Bansir Laut|700270|WITEL', 'Samping Masjid, seberang jl daya nasional', '[]', 1, NULL, NULL, NULL, '2018-04-02 06:51:50', '', 0),
(26, 'MYIR-10037143160001', 'SPAIN88', 'hendry', '0813225176988', '0', '2018-03-26', '-0.04786468485564531', '109.35526717454195', '2018-03-26 08:00| Adi Sucipto No.69a, Bansir Laut|700270|WITEL', 'Samping Masjid, seberang jl daya nasional', '[]', 1, NULL, NULL, NULL, '2018-04-02 06:51:50', '', 0),
(27, 'MYIR-10036613180002', 'SPFQR98', 'Syafa istiqomah', '085654677734', '0', '2018-03-26', '-0.06909100527027001', '109.34341985732317', '22-Mar-2018 13:01| jl sepakat 2 blok B no 6  kec pontianak tenggara. lokasi depan jl reformasi. 0813', 'Depan reformasi ada gang baru masuk terus', '[]', NULL, NULL, NULL, NULL, '2018-04-02 06:51:50', '', 0),
(28, 'MYIR-10037071030001', 'SPAIN88', 'subarkah', '08125741994', '08115741994', '2018-03-26', '-0.05066457475579895', '109.31705508381128', '2018-03-25 10:31|Cp alternatif 08125741994|830054|WITEL', 'Minta di percepat pemasangan', '[]', 1, NULL, NULL, NULL, '2018-04-02 06:51:50', '', 0),
(29, 'MYIR-10037190170001', 'SPAIN88', 'Fitri yus handayani', '089622771606', '0', '2018-03-26', '-0.04057477820531074', '109.36108119785786', '27-Mar-2018 08:00|jl. tanjung raya 2 no 18 rt 03 rw 04 . Gg. Hidayah, Banjar Serasan, Pontianak Tim.', 'Minta di pasang jam 3 sore ini', '[]', 1, NULL, NULL, NULL, '2018-04-02 06:51:50', '', 0),
(30, 'MYIR-10037215960001', 'SPRLY91', 'LIE KIANG', '0895702377540', '085820830355', '2018-03-26', '-0.06277843053675256', '109.32964738458395', 'Jl. Purnama 1, Komp. Purnama Agung 7, Blok O/4, Pontianak Kota,  Kalimantan Barat.', 'Di lokasi sudah ad Odp terdekat Jarak 40m.. Pelanggan minta pasangkan sore ini kalau bisa.', '[]', 1, NULL, NULL, NULL, '2018-04-02 06:51:50', '', 0),
(31, 'MYIR-10037108850006', 'SPRLY91', 'Hengky', '08125752886', '0', '2018-03-27', '-0.07266202856463785', '109.35803554952145', 'Jl. Sungai Raya dalam, komp. Pondok Agung utama no: 12B deretan sebelah kanan ( dpn bank Kalbar), Po', 'Pelanggan sudah menunggu untuk di pasang besok siang atau sore', '[]', 1, NULL, NULL, NULL, '2018-04-02 06:51:50', '', 0),
(32, 'MYIR-10037055230004', 'SPSBA88', 'Bang Uray', '085252510256', '0', '2018-03-26', '-0.05088451580866275', '109.33676227927208', '25-Mar-2018 13:01|2018-03-25/13:01/Jalan Karya Baru Bakmi Kering Haji  no 2 Aman Pontianak/patokan a', 'Jalan Karya Baru,Bakmi Kering Haji Aman No.2B depan RM Puring Jaya Pontianak', '[\"\\/data\\/storage\\/uploads\\/IxrwVN4Dy2-1522045394.jpg\",\"\\/data\\/storage\\/uploads\\/8erzFHQOe0-1522045394.jpg\",\"\\/data\\/storage\\/uploads\\/IZjv3LFFup-1522045394.jpg\"]', NULL, NULL, NULL, NULL, '2018-04-02 06:51:50', '', 0),
(33, 'MYIR-10037224340003', 'SPNNG75', 'ARIYANTO', '081392188359', '0', '2018-03-26', '-0.051625811028528146', '109.32072099298239', '27-Mar-2018 08:00|Gg. sambas 2, Akcaya, rt 2 rw 13 Pontianak Sel., Kota Pontianak, Kalimantan Barat ', 'Cafe, samping GG Sambas 2', '[]', 1, NULL, NULL, NULL, '2018-04-02 06:51:50', '', 0),
(34, 'MYIR-10037230110001', 'SPARD86', 'IQBAL SHANDIKA LHARA', '08565264260', '085750327071', '1970-01-01', '-0.0278886024072275', '109.32398959994316', 'NaN-undefined-NaN undefined|lanjut//Jl. Putri Dara Hitam Ruko Bluelight photography No. 9c samping t', 'Samping toss cafe', '[\"\\/data\\/storage\\/uploads\\/wiXcKaAhi1-1522050341.jpg\"]', 1, NULL, NULL, NULL, '2018-04-02 06:51:50', '', 0),
(35, 'MYIR-10037228130001', 'SPAMT85', 'Salmon', '082154531241', '085251845200', '2018-03-26', '-0.00468548386766981', '109.27953600883484', '27-Mar-2018 08:00|Komplek Marisa 3 no b15 , Sungai Rengas, Sungai Kakap, Kabupaten Kubu Raya, Kalima', 'Pemasangan baru', '[\"\\/data\\/storage\\/uploads\\/S9KtD57zCY-1522051959.jpg\"]', 1, NULL, NULL, NULL, '2018-04-02 06:51:50', '', 0),
(36, 'MYIR-10037218620001', 'SPALC90', 'HERRIANSYAH', '081256818506', '0', '2018-03-26', '-0.035266687729296864', '109.30869262665509', '27-Mar-2018 10:31|jln.dr.wahidin komp.mitra raya lestari 3 BLOK D/8 rt.02/rw.20, Sungai Jawi, Pontia', 'Mudah2an bisa terpasang segera', '[]', 1, NULL, NULL, NULL, '2018-04-02 06:51:50', '', 0),
(37, 'MYIR-10037088240002', 'SPRLY91', 'ERWIN', '085390583658', '0', '2018-03-27', '-0.030908769360071822', '109.33596566319466', '27-Mar-2018 08:00|JL TEUKU UMAR KOMPLEK PONTIANAK MALL BLOK D4 SAMPING BANK BUKOPIN (TOKO BC LONGRIC', 'Besok di pasang sekitar jam 1/2 siang', '[]', 1, NULL, NULL, NULL, '2018-04-02 06:51:50', '', 0),
(38, 'MYIR-10037086030002', 'SPRLY91', 'LISNA', '085245652195', '085390583658', '2018-03-27', '-0.03337103684817051', '109.33139953762293', '27-Mar-2018 08:00|JL KH AHMAD DAHLAN NO 16 TOKO E2 AUTOSOUND, Darat Sekip, Pontianak Kota, Kota Pont', 'Besok di pasang pagi jam 10, di tunggu sama pelanggan', '[]', 1, NULL, NULL, NULL, '2018-04-02 06:51:50', '', 0),
(39, 'MYIR-10037205920001', 'SPRLY91', 'DEDI SANJAYA', '089687851338', '089693386788', '2018-03-27', '-0.05834004764966808', '109.17946681380272', '27-Mar-2018 10:31|JL RAYA SUNGAI KAKAP NO 33, Sungai Kakap, Kabupaten Kubu Raya, Kalimantan Barat 78', 'Besok di pasang Jam 3 sore..di tunggu sama pelanggan', '[]', 1, NULL, NULL, NULL, '2018-04-02 06:51:50', '', 0),
(40, 'MYIR-10006090220002', 'SPRLY91', 'yalianty', '08125660118', '08125660118', '2018-03-27', '-0.02381198039648142', '109.34048116207123', 'JL. NUSA INDAH 2 NO BLOK D9 NO 1-2 PASAR SUDIRMAN (TOKO WIWI MAS), Pontianak,  Kalimantan Barat.', 'Di tunggu jam 11 siang sama pelanggan', '[]', 1, NULL, NULL, NULL, '2018-04-02 06:51:50', '', 0),
(41, 'MYIR-10036969860001', 'SPRLY91', 'HEMDY', '081345311967', '0', '2018-03-27', '-0.07281290270013945', '109.35840468853712', '23-Mar-2018 13:01|Jl. Sungairaya dalam.  Perumahan anggrek permai no. 3 b, Samp. Komp. Balimas 3, Ba', 'Pelanggan minta kepastian untuk di pasang besok pagi jam 10', '[]', NULL, NULL, NULL, NULL, '2018-04-02 06:51:50', '', 0),
(42, 'MYIR-10036768920002', 'SPSBA88', 'Putra Anugrah Sinaga', '089632358098', '0', '2018-03-26', '-0.030647589294926256', '109.38087623566389', '22-Mar-2018 16:00|lanjut // Jalan YM Sabran Komplek Villa Intan K11 kelurahan tanjung hulu kec ponti', 'Jalan Y.M.Sabran Komplek Villa Intan Blok K11 depan POLSEK Ambawang', '[\"\\/data\\/storage\\/uploads\\/GoSMGKQn8r-1522056155.jpg\"]', NULL, NULL, NULL, NULL, '2018-04-02 06:51:50', '', 0),
(43, 'MYIR-10037243670001', 'SPHDI79', 'Andre', '085349929696', '0', '1970-01-01', '-0.11343725065333991', '109.40135691314936', '27-Mar-2018 13:01|Jl Parit Bugis Gang Budi Utomo no. 36 //ada meubel kayu pas d ujung perempatan seb', 'Rumahnya ada meubel kayu perempatan sebelah kiri jalan', '[]', 1, NULL, NULL, NULL, '2018-04-02 06:51:50', '', 0),
(44, 'MYIR-10037203230001', 'SPRLY91', 'HARIATI', '085345191166', '081522666233', '2018-03-27', '-0.03965645711893543', '109.36241123825312', '27-Mar-2018 08:00|JL TANJUNG RAYA 2 KOMP MUTIARA SAIGON NO B14, Saigon, Pontianak Tim, Kota Pontiana', 'Tolong konfirmasi pelanggan untuk pemasangan', '[]', 1, NULL, NULL, NULL, '2018-04-02 06:51:50', '', 0),
(45, 'MYIR-10037208380001', 'SPRLY91', 'ARIS TANDILILING', '081352424872', '082353530292', '2018-03-27', '-0.05854758346422125', '109.35644768178463', 'JL ABDULRAHMAN SALEH GG AR SALEH 4 NO 16, Pontianak Kota, Pontianak, Kalimantan Barat.', 'Pemasangan Besok Sore Jam 4.', '[]', 1, NULL, NULL, NULL, '2018-04-02 06:51:50', '', 0),
(46, 'MYIR-10036820890011', 'SPRLY91', 'Julius Hadinata', '089689148262', '081254206529', '2018-03-27', '-0.07568454031521465', '109.35950439423323', '27-Mar-2018 10:31|lanjut // JL SUNGAI RAYA DALAM GG CERIA 11 NO 89,  pontianak Sungai Raya, Kabupate', 'Mohon Konfirmasi terlebih dahulu untuk pemasangan', '[]', 1, NULL, NULL, NULL, '2018-04-02 06:51:50', '', 0),
(47, 'MYIR-10037081280004', 'SPRLY91', 'SUYANTI', '085252644258', '085345278211', '2018-03-27', '-0.054482697680441276', '109.32422764599322', '28-Mar-2018 13:01|JL PURNAMA GG PERINTIS 2 NO G2, Akcaya pas depan komplek purnama agung 7 , Pontian', 'Konfirmasi pelanggan terlebih dahulu untuk pemasangan dirumah', '[]', 1, NULL, NULL, NULL, '2018-04-02 06:51:50', '', 0),
(48, 'MYIR-10037235360001', 'SPDKY88', 'HIRPAN', '0895379857264', '089691927819', '2018-03-27', '-0.07091322965965298', '109.39041517674923', 'Jl. Desa Kapur Gg. M. Tahir No.5\r\ndepan Komplek Graha Kapur', 'Dekat Komplek Graha Kapur', '[]', 1, NULL, NULL, NULL, '2018-04-02 06:51:50', '', 0),
(49, 'MYIR-10037213640001', 'SPARE96', 'teguh supriyatno', '081333348999', '081222245', '2018-03-27', '3.3095355612844477', '117.58348815143108', '27-Mar-2018 13:01|lanjut/285000/jalan hasanudin 1 rt.18 no.57 masuk gang sebelah mesjid quba rumah w', 'Tes arya....', '[\"\\/data\\/storage\\/uploads\\/Me4hVJr7v9-1522068519.jpg\",\"\\/data\\/storage\\/uploads\\/cfuCSizvP8-1522068519.jpg\"]', 1, NULL, NULL, NULL, '2018-04-02 06:51:50', '', 0),
(50, 'MYIR-10037247280001', 'SPRLY91', 'BUDIYONO', '082154036604', '0', '2018-03-27', '-0.049777099188923944', '109.31768305599688', '27-Mar-2018 09:00| JL PROF M YAMIN (METRO PONSEL) SAMPING GG KENCANA/2018-03-27/09:00/085787833332|S', 'Pelanggan minta di pasang sekitar jam 10 pagi', '[]', 1, NULL, NULL, NULL, '2018-04-02 06:51:50', '', 0),
(51, 'MYIR-10037238590002', 'SPNNG75', 'AGUSTINI', '08161754747', '0', '2018-03-26', '-0.019464119894447737', '109.32361744344234', 'Jln HR Rais arahman GG gunung sari nomor 37', 'pasang baru', '[]', NULL, NULL, NULL, NULL, '2018-04-02 06:51:50', '', 0),
(52, 'MYIR-10036879140001', 'SPJKS92', 'NENI HARNANI', '082353272338', '0', '2018-03-27', '0.0311605616944218', '111.46253496408463', '22-Mar-2018 10:31|Jl. sintang-pontianak BTN Nabila No. B 2,kel,martiguna, Kec. Sintang, Kabupaten Si', 'Jl.sintang-pontianak,BTN Nabilla No. B 2 , Kel. MARTIGUNA,kec. Sintang, kab. Sintang', '[]', NULL, NULL, NULL, NULL, '2018-04-02 06:51:50', '', 0),
(53, 'MYIR-10019383230010', 'SPIND93', 'rizky muliawan', '085252249410', '0', '2018-03-27', '-0.021362117928062033', '109.33088790625332', '27-Mar-2018 10:31|jl.merdeka gg kakak tua no 66 rt 3/5 kec Mariana,  kel Pontianak Kota, Kota Pontia', 'Jl.merdeka gg kakak tua no 66 di depan ada gerobak es buah', '[\"\\/data\\/storage\\/uploads\\/foh2jKRnUX-1522076314.jpg\"]', 1, NULL, NULL, NULL, '2018-04-02 06:51:50', '', 0),
(54, 'MYIR-10037252980001', 'SPHDI79', 'Gunadi', '085705446979', '085753577363', '2018-03-27', '-0.024651511743060357', '109.35231238603593', '27-Mar-2018 08:00|Jl. Tritura Gg. Angket No.22 Tj. Hilir, Pontianak Tim., Kota Pontianak, Kalimantan', 'Rmah pelanggan ada tulisan Assyifa Ponsel agak ke dalam dr rmh lainnya.. Rumah ke 4 dr masuk gang sebelah kiri', '[\"\\/data\\/storage\\/uploads\\/qH9zrat7Od-1522077193.jpg\"]', 1, NULL, NULL, NULL, '2018-04-02 06:51:50', '', 0),
(55, 'MYIR-10037274270001', 'SPNGY91', 'Indria Anggrainy', '081348303959', '0', '2018-03-27', '-0.07130717880529923', '109.35935687273741', 'jalan sui raya dalam komp mitra indah utama 1 No A.9', 'rumah sebelah kanan.', '[]', 1, NULL, NULL, NULL, '2018-04-02 06:51:50', '', 0),
(56, 'MYIR-10037283910001', 'SPALC90', 'MEISYA RESKI', '089608637003', '0', '2018-03-27', '-0.021561607209554638', '109.30542133748531', 'Jln.husein hamzah komp.harvin indah(dpn bank BRI) NO.AA/3', 'Pelanggan menunggu untuk dipasang segera', '[]', 1, NULL, NULL, NULL, '2018-04-02 06:51:50', '', 0),
(57, 'MYIR-10037235460001', 'SPMSI97', 'siranudi', '08115680214', '0', '2018-03-27', '0.12187110383551666', '110.5813381075859', '27-Mar-2018 08:00|AGREE / Jl. Jenderal Sudirman no 2 kec. sanggau kapuas kel. bunut / alfa londry sa', 'Pelanggan menunggu di rumah', '[\"\\/data\\/storage\\/uploads\\/jRkZCU3i93-1522117297.jpg\",\"\\/data\\/storage\\/uploads\\/PBNXl2LYZk-1522117297.jpg\"]', 1, NULL, NULL, NULL, '2018-04-02 06:51:50', '', 0),
(58, 'MYIR-10037235460001', 'SPMSI97', 'siranudi', '08115680214', '0', '2018-03-27', '0.12187110383551666', '110.5813381075859', '27-Mar-2018 08:00|AGREE / Jl. Jenderal Sudirman no 2 kec. sanggau kapuas kel. bunut / alfa londry sa', 'Pelanggan menunggu di rumah', '[\"\\/data\\/storage\\/uploads\\/10uFMyRSg1-1522117310.jpg\",\"\\/data\\/storage\\/uploads\\/rNOSmJWpJT-1522117310.jpg\"]', 1, NULL, NULL, NULL, '2018-04-02 06:51:50', '', 0),
(59, 'MYIR-10037235460001', 'SPMSI97', 'siranudi', '08115680214', '0', '2018-03-27', '0.12187110383551666', '110.5813381075859', '27-Mar-2018 08:00|AGREE / Jl. Jenderal Sudirman no 2 kec. sanggau kapuas kel. bunut / alfa londry sa', 'Pelanggan menunggu di rumah', '[\"\\/data\\/storage\\/uploads\\/iKECpNpU6b-1522117318.jpg\"]', 1, NULL, NULL, NULL, '2018-04-02 06:51:50', '', 0),
(60, 'MYIR-10037235460001', 'SPMSI97', 'siranudi', '08115680214', '08115680214', '2018-03-27', '0.12187110383551666', '110.5813381075859', '27-Mar-2018 08:00|AGREE / Jl. Jenderal Sudirman no 2 kec. sanggau kapuas kel. bunut / alfa londry sa', 'Pelanggan menunggu di rumah', '[\"\\/data\\/storage\\/uploads\\/LeR2Fui07R-1522117319.jpg\"]', 1, NULL, NULL, NULL, '2018-04-02 06:51:50', '', 0),
(61, 'MYIR-10036845970002', 'SPNGY91', 'SUADI S.PD MT', '082159530770', '082255051751', '2018-03-28', '-0.006000101555337062', '109.30460963398218', '2018-03-23 08:00|kom yos sudarso Gang Landak 1 no 24 , Pontianak Barat|700270|WITEL', 'rumah sebellah kiri selepas tikungan', '[]', 1, NULL, NULL, NULL, '2018-04-02 06:51:50', '', 0),
(62, 'MYIR-10036616980002', 'SPNGY91', 'devi apriliasari', '082148433464', '0', '2018-03-28', '-0.039070729863545706', '109.31456029415132', 'NaN-undefined-NaN undefined|jalan pangeran natakusuma Gg sumur bor no 9, Pontianak Kota//didepan SD ', 'rumah sebelah kiri  no 9', '[]', NULL, NULL, NULL, NULL, '2018-04-02 06:51:50', '', 0),
(63, 'MYIR-10036859330001', 'SPNGY91', 'syarif hafizh', '085750000571', '0', '2018-03-28', '-0.034100932849819514', '109.30665079504251', 'Jalan Dr. Wahidin. komp PU jalur 1 no 12 Pontianak Kota - Masuk jalur 1 sampai mentok - no cp 085750', 'rumah sebelah kanan', '[]', NULL, NULL, NULL, NULL, '2018-04-02 06:51:50', '', 0),
(64, 'MYIR-10036567170002', 'SPMSI97', 'Kam siat moi', '089629532682', '089629532682', '2018-03-27', '0.20596973939076232', '110.43665271252394', '18-Mar-2018 10:31|Jalan suadaya pasar sayur no 28  rumah warna putih //sebelah depot air//0896295326', 'Sudah 1 minggu tidak terpasang', '[\"\\/data\\/storage\\/uploads\\/o9EUhs8T3j-1522117683.jpg\"]', 1, NULL, NULL, NULL, '2018-04-02 06:51:50', '', 0),
(65, 'MYIR-10037270740001', 'SPHDI79', 'Sin Kiun', '085350415199', '0', '2018-03-27', '-0.09787375935389915', '109.39147096127273', '28-Mar-2018 08:00|Jl. Adisucipto Komp Green Royal Residence no A. 23 masuk dr Hanura 2 sampai peremp', 'Rumah pelaanggan melewati komplek Hanura 2 ujung perempatan lurus aja..rumahnya d sebelah kanan jalan', '[]', 1, NULL, NULL, NULL, '2018-04-02 06:51:50', '', 0),
(66, 'MYIR-10036180300001', 'SPSAI88', 'YUSTISIA NURWAHYUNI', '082140030579', '08125652980', '2018-03-27', '-0.0700056378705109', '109.34222761541606', '13-Mar-18 10:05|Jl. Sepakat II ruko Griya Sepakat indah No.b-3, Bansir Darat, Pontianak Tenggara, Ko', 'di lokasi terdapat 2 odp yg terdekat ODP-SRD-FA/110 jarak 289 dr lokasi pelanggan dan ODP-SRD-FA/149 jarak 397 dr lokasi pelanggn', '[\"\\/data\\/storage\\/uploads\\/B49zmqqKxV-1522119933.jpg\",\"\\/data\\/storage\\/uploads\\/IEIfyx85c7-1522119933.jpg\",\"\\/data\\/storage\\/uploads\\/0IhVfBgvdc-1522119933.jpg\"]', 1, NULL, NULL, NULL, '2018-04-02 06:51:50', '', 0),
(67, 'MYIR-10036564110001', 'SPNGY91', 'ARFIAN FERNICKO', '085654535800', '0', '2018-03-28', '-0.10995507941714606', '109.40067261457443', '20-Mar-2018 15:31|Dilanjut / 315000 / Jl. Parit BugisKomplek Griya Lestari B.12Kec. Sungai RayaKab. ', 'rumah sebelah kanan', '[]', NULL, NULL, NULL, NULL, '2018-04-02 06:51:50', '', 0),
(68, 'MYIR-10037315500001', 'SPSAI88', 'HENDRI SUSANTO', '081253730362', '081348727936', '2018-03-27', '-0.06109534536336749', '109.3042653053999', 'Jalan prof m yamin, kompleks melati permai no. 6B (samping paud hebron dan seberang nya ada apotik f', 'rumah pelanggan samping paud hebron dan seberang nya ada apotik felicia', '[\"\\/data\\/storage\\/uploads\\/Ylw2lOoU2h-1522143018.jpg\"]', 1, NULL, NULL, NULL, '2018-04-02 06:51:50', '', 0),
(69, 'MYIR-10037273020001', 'SPSAI88', 'HENDRI SUSANTO', '081348727936', '081294530454', '2018-03-28', '-0.05404650363502272', '109.17054377496243', 'Jalan karya jaya, dusun nirwana sungai kakap gudang batu es balok', 'Jalan karya jaya,dusun nirwana sungai kakap rt.01/rw 01 ( jalan yg ada restoran pantai indah kakap) masuk sebelah kiri samping spbu pertamina) gudang batu es balok', '[\"\\/data\\/storage\\/uploads\\/XrZ4zULq6q-1522152353.jpg\",\"\\/data\\/storage\\/uploads\\/qcvI8LFgh7-1522152353.jpg\",\"\\/data\\/storage\\/uploads\\/kztsClUHvu-1522152353.jpg\"]', 1, NULL, NULL, NULL, '2018-04-02 06:51:50', '', 0),
(70, 'MYIR-10037200870001', 'SPYAN59', 'HENNY PANJAITAN', '087836543752', '081253519254', '1970-01-01', '-0.057080415880032556', '109.32746406644583', '2018-03-27 10:31|Jl. Komp. Purnama Permai 2 No.F8|830054|WITEL', 'Jl. Komp. Purnama Permai 2 No.F8|', '[]', 1, NULL, NULL, NULL, '2018-04-02 06:51:50', '', 0),
(71, 'MYIR-10037312340001', 'SPYAN59', 'RUMAH KOPI NUSANTARA', '082165474944', '085754677334', '1970-01-01', '-0.07620254147619335', '109.34905920177698', '30-Mar-2018 10:31|RUMAH KOPI NUSANTARA, JL. PARIT H. HUSIN 2 (TEPAT SAMPING KOMP. PEMDA 3) PONTIANAK', 'RUMAH KOPI NUSANTARA, JL. PARIT H. HUSIN 2 (TEPAT SAMPING KOMP. PEMDA 3)', '[]', 1, NULL, NULL, NULL, '2018-04-02 06:51:50', '', 0),
(72, 'MYIR-10036280940003', 'SPSBA88', 'Kiki Permatasari', '082157000380', '0', '2018-03-28', '-0.009277090389726014', '109.29693013429642', '14-Mar-18 15:00|Jl. Karet Komplek Karet Alam Indah E3,Sungai Beliung, Pontianak Bar., Kota Pontianak', 'Jalan Karet Komplek Karet Alam Indah Blok E3,Sungai Beliung,Kota Pontianak.', '[\"\\/data\\/storage\\/uploads\\/5ZGpKlBr0u-1522159879.jpg\"]', NULL, NULL, NULL, NULL, '2018-04-02 06:51:50', '', 0),
(73, 'MYIR-10033839650006', 'SPYAN59', 'SUPARMIN', '082149350110', '089635163917', '1970-01-01', '-0.1501019444703519', '109.41371250897646', '28-Mar-2018 13:01| JL. ARTERI SUPADIO/ JL. ABDURRAHMAN WAHID (ARAH RASAU) NO. 24 (DEPAN PEMOTONGAN A', 'Jl. ARTERI SUPADIO/ JL. ABDURRAHMAN WAHID (ARAH RASAU) NO. 24 (DEPAN PEMOTONGAN AYAM / SEBELUM TOKO BANGUNAN EKO 2)', '[]', 1, NULL, NULL, NULL, '2018-04-02 06:51:50', '', 0),
(74, 'MYIR-10031715930002', 'SPYAN59', 'BERTY', '085390895125', '08125712935', '1970-01-01', '-0.037378926903960656', '109.37639929354191', '28-Mar-2018 15:01|JL SAIGON INDAH LESTARI BLOK A3 // seberangan dengan perum 4 dan belakang komp mut', 'JL SAIGON INDAH LESTARI BLOK A3 // seberangan dengan perum 4 dan belakang komp muti residen 1', '[]', 1, NULL, NULL, NULL, '2018-04-02 06:51:50', '', 0),
(75, 'MYIR-10037257450001', 'SPSYT92', 'Then kim on', '081287590050', '087803282512', '1970-01-01', '-0.03859262621643684', '109.28443640470503', '30-Mar-2018 08:00|Jl. Husein Hamzah Komp.Mitra mas No.A16 Pal 5, Pal Lima, Pontianak Bar., Kota Pont', 'Jl.husien hamzah komp.mitra mas No.A16 Pal 5 setelah apotik nada medika\r\nOdp terdekat FA jaw 125', '[\"\\/data\\/storage\\/uploads\\/PL9uJN0dAE-1522160809.jpg\",\"\\/data\\/storage\\/uploads\\/k91nD5tzCD-1522160809.jpg\"]', 1, NULL, NULL, NULL, '2018-04-02 06:51:50', '', 0),
(76, 'MYIR-10037275960001', 'SPSYT92', 'ARI PUTRA UTAMA', '082351433308', '089602883695', '1970-01-01', '-0.026339626874618632', '109.29161533713342', '2018-03-28 08:00|Gg. Keneana Lestari 2 No.A5|830054|WITEL', 'Tabrani ahmad gg.kencana lestari 2 No.A5\r\nODP JAW FA/157 DEPAN KOMP\r\nDIDALEM ADA FA/156\r\n\r\nSebelah sekolah SMPN 17', '[]', 1, NULL, NULL, NULL, '2018-04-02 06:51:50', '', 0),
(77, 'MYIR-10036825820001', 'SPSYT92', 'PARUTUNGAN NAINGGOLAN', '0895360464860', '082353021414', '2018-03-28', '-0.04789418914451094', '109.31012056767939', '22-Mar-2018 09:00|JL. DANAU SENTARUM GG DANAU INDAH NO 6  RT 03/36  KEL SUNGAI BANGKONG KEC PONTIANA', 'Ada ODP PTK FCB 31 & FCB 46\r\njarak +/- 250m', '[]', 1, NULL, NULL, NULL, '2018-04-02 06:51:50', '', 0),
(78, 'MYIR-10037349090001', 'SPNGY91', 'nasik', '085754727354', '0', '2018-03-28', '-0.022936909778206685', '109.30827721953392', 'jalan husein hamzah Gg Amanah no 10.', 'dari masuk gang Amanah rumah sebelah kanan', '[]', 1, NULL, NULL, NULL, '2018-04-02 06:51:50', '', 0),
(79, 'MYIR-10009870820001', 'SPRLY91', 'Chandra Gupta', '081221813117', '0', '2018-03-28', '-0.029907634986266068', '109.32734806090595', 'JL KARIMATA NO 56/58 (AKBAR CAFE DAN RESTO)', 'Secepatnya besok di pasang', '[]', NULL, NULL, NULL, NULL, '2018-04-02 06:51:50', '', 0),
(80, 'MYIR-10037336580001', 'SPJKS92', 'YENNI ERVIANA', '081348492742', '082255439311', '2018-03-28', '0.05795380975042494', '111.64099574089049', '28-Mar-2018 10:31|kelam permai kec.kelam permai kab.sintang. / patokan dekat  ATM, samping toko indo', 'Hubungi pelanggan dulu', '[]', 1, NULL, NULL, NULL, '2018-04-02 06:51:50', '', 0),
(81, 'MYIR-10037362440001', 'SPDKY88', 'MULIADI', '082242267014', '0', '2018-03-28', '-0.07237838518851375', '109.39280435442923', 'Jl. Desa Kapur Komplek Kota Raya Blok B.10', 'Komplek KOTA RAYA Blok B.10, Jl. Desa Kapur', '[]', 1, NULL, NULL, NULL, '2018-04-02 06:51:50', '', 0),
(82, 'MYIR-10037349670001', 'SPNGY91', 'LINDRA CHAIRIYANI', '085322015999', '0', '2018-03-28', '-0.03850176640661978', '109.35954228043555', 'jalan tanjung raya 2 masuk jalan tanjung harapan no 10  .', 'rumah sebelah kiri klo masuk jalan tanjung harapan', '[]', 1, NULL, NULL, NULL, '2018-04-02 06:51:50', '', 0),
(83, 'MYIR-10037323520001', 'SPSAI88', 'MUHAMMAD YANDA', '085750582818', '081254405142 : 08582', '2018-03-28', '0.020768008671420937', '109.27161075174809', 'Jalan Raya Wajok Hulu km 9 depan PT. Guangken Ruber, Pontianak, Kalimantan Barat 78351, Indonesia, n', 'nama tempatny warung Amanah Jalan Raya Wajok Hulu km 9 depan tower dengan PT. Guangken Rubber pontianak indonesia klw dr pontianak sblm PT. Indofood', '[\"\\/data\\/storage\\/uploads\\/xcNysvISd8-1522212317.jpg\"]', 1, NULL, NULL, NULL, '2018-04-02 06:51:50', '', 0),
(84, 'MYIR-10037372500001', 'SPRLY91', 'CHANDRA GUPTA', '08990181121', '081221813117', '2018-03-28', '-0.0289923312808579', '109.32735744863749', '29-Mar-2018 08:00|JL. KARIMATA NO 56 dan 58, Sungai Bangkong, Pontianak Kota, Kota Pontianak, Kalima', 'Pasang hari ni klo bisa jam 2/3 sore', '[]', 1, NULL, NULL, NULL, '2018-04-02 06:51:50', '', 0),
(85, 'MYIR-10037374280002', 'SPNGY91', 'Rizky Ikhwanul Akbar', '085654900545', '0', '2018-03-28', '-0.10253140818419641', '109.35519307851791', '29-Mar-2018 08:00|Jalan sui raya dalam masuk jalan prasetya komp kartika permai no B.12Kabupaten Kub', 'komp kartika permai no b 12 sebelah kanan', '[]', 1, NULL, NULL, NULL, '2018-04-02 06:51:50', '', 0),
(86, 'MYIR-10036869730001', 'SPDKY88', 'WAHYUDI', '081345433810', '0', '1970-01-01', '-0.017920173412447157', '109.3190922215581', '23-Mar-2018 15:31|22-Mar-2018 15:31|Gg. Keluarga Jl. H. Rais A. Rachman No.24, Sungai Jawi Dalam, Po', 'Gg. Keluarga No.24 posisi rumah tengah tengah Gang', '[]', NULL, NULL, NULL, NULL, '2018-04-02 06:51:50', '', 0),
(87, 'MYIR-10034999170001', 'SPDKY88', 'DODY BOEN', '085245076070', '0', '1970-01-01', '-0.07081231162264394', '109.35595951974393', '25-Feb-18 10:00|agree DODY BOEN 085245076070  Jl. Sungai Raya dalam  Komplek Permata Agung No.F5 rt ', 'Pelanggan masih minat. Ada odp di depan Komplek', '[]', NULL, NULL, NULL, NULL, '2018-04-02 06:51:50', '', 0),
(88, 'MYIR-10035749200001', 'SPDKY88', 'SY IMAM HADI KUSUMA', '089693957999', '0', '1970-01-01', '0.007260069231634657', '109.3020836636424', '07-Mar-18 14:00|Jl. Khatulistiwa, Batu Layang No.28 Siantan, Pontianak, Kalimantan Barat 78351, Indo', 'Masih minat pelanggan setia menanti', '[]', NULL, NULL, NULL, NULL, '2018-04-02 06:51:50', '', 0),
(89, 'MYIR-10036675490001', 'SPDKY88', 'MONIKA RATNA SARI', '089611969951', '0', '1970-01-01', '-0.06996909279996023', '109.37106873840094', '21-Mar-2018 12:00|Jl. Siaga Gg. Siaga Delima No. 2a, Sungai Raya, Kabupaten Kubu Raya, Kalimantan Ba', 'Pelanggan masih minat. \r\nMasih ada odp alternatif posisi di dpn Jl. Siaga', '[]', 1, NULL, NULL, NULL, '2018-04-02 06:51:50', '', 0),
(90, 'MYIR-10036465080001', 'SPDKY88', 'DR. DYAH TUT WURI HANDAYANI', '082151466777', '085750453525', '1970-01-01', '-0.12703736148489247', '109.4106487557292', '19-Mar-18 09:00|lanjut//Jl. Adi Sucipto km. 14.5 Kantor DPRKPLH Desa Arang Limbung Di Sebelah Kantor', 'Samping Kantor CAPIL KUBU RAYA', '[]', 1, NULL, NULL, NULL, '2018-04-02 06:51:50', '', 0),
(91, 'MYIR-10036616630001', 'SPNGY91', 'efendy', '08125672001.', '081256569817', '2018-03-29', '-0.045261937142547816', '109.35181483626366', '19-Mar-2018 08:00|Jalan imam bonjol GgTanjung Harapan 2 no 35 B  Pontianak Selatan /  kel. bangkir l', 'dilokasi sudah ada kabel bekas yang dulu punya rumah.', '[]', NULL, NULL, NULL, NULL, '2018-04-02 06:51:50', '', 0),
(92, 'MYIR-10037401640001', 'SPNGY91', 'Alvin hendra', '085821619299', '0', '2018-03-29', '-0.05586369940665817', '109.33182433247566', 'jalan karya baru komp karya baru permai no 10', 'rumah sebelah kanan no 10', '[]', 1, NULL, NULL, NULL, '2018-04-02 06:51:50', '', 0),
(93, 'MYIR-10027967830001', 'SPFQR98', 'Candra wijaya', '08125786202', '0', '2018-03-29', '-0.007901117180572997', '109.30922202765942', '29-Mar-2018 08:00|Gg. Tebu Manis No. 20 Sungai Beliung, Pontianak Bar., Kota Pontianak, Kalimantan B', 'Jalan. Tebu masuk gang. Tebu manis terus no. 20', '[]', 1, NULL, NULL, NULL, '2018-04-02 06:51:50', '', 0),
(94, 'MYIR-10037350800001', 'SPORZ85', 'JONY', '085345354815', '08125631489', '2018-03-29', '-0.06294238046410938', '109.31895073503256', '2018-03-29 08:00|Jl. Purnama II wahana squre No C 9-10|830054|WITEL', 'Ruko wahana squere No.C9-10', '[\"\\/data\\/storage\\/uploads\\/l5Ec6qHZGU-1522253025.jpg\"]', 1, NULL, NULL, NULL, '2018-04-02 06:51:50', '', 0),
(95, 'MYIR-10037350660001', 'SPORZ85', 'RIAMA', '08132032182', '085697962676', '1970-01-01', '-0.05959800301137165', '109.33730877935886', '2018-03-29 08:00|Jl. Reformasi Untan No.E45|830054|WITEL', 'Jl.Reformasi Untan No.E45', '[]', 1, NULL, NULL, NULL, '2018-04-02 06:51:50', '', 0),
(96, 'MYIR-10010883400001', 'SPORZ85', 'Ridwansyah', '08152207383', '085822045678', '2018-03-29', '-0.12261474459235178', '109.3983293697238', '2018-03-29 10:31|Jl. Ringinsari No.10|830054|WITEL', 'Ringinsari.No 10', '[]', 1, NULL, NULL, NULL, '2018-04-02 06:51:50', '', 0),
(97, 'MYIR-10037287590002', 'SPYAN59', 'YUSMERI HERLAN', '085289596482', '0', '1970-01-01', '-0.05584391812458437', '109.39648635685445', '2018-03-28 13:01|Jl. Major Alianyang Ruko BBC blok C2|830054|WITEL', 'JL.TRANSKALIMANTAN RUKO BORNEO BISNIS ICON', '[\"\\/data\\/storage\\/uploads\\/kIyATBelwA-1522253617.jpg\"]', 1, NULL, NULL, NULL, '2018-04-02 06:51:50', '', 0),
(98, 'MYIR-10037016020002', 'SPYAN59', 'AGUS PRIADI', '089517001640', '0', '2018-03-29', '-0.01423548892395144', '109.3234920501709', '2018-03-24 08:00|JL. SRIKAYA GG. SRIKAYA IV NO.19|830054|WITEL', 'Pelanggan minta besok jam 10', '[]', 1, NULL, NULL, NULL, '2018-04-02 06:51:50', '', 0),
(99, 'MYIR-10037029000001', 'SPARS70', 'MANSYUR', '081257923568', '0', '2018-03-29', '-0.02726934747264831', '109.36741422861814', '24-Mar-2018 08:00|lanjut // Gg. Gotong Royong, Tj. Hulu, Pontianak Tim., Kota Pontianak, Kalimantan ', 'Ada tiang jarak rumah plgn ketiang 35m\r\nJarak odp ketmpt plgn +/- 250m\r\nAda 2 ODP yg bisa digunakan.', '[\"\\/data\\/storage\\/uploads\\/ujIIrLEmdd-1522255748.jpg\",\"\\/data\\/storage\\/uploads\\/VzVUXlm9Rz-1522255748.jpg\",\"\\/data\\/storage\\/uploads\\/7r5Btqluzn-1522255748.jpg\"]', NULL, NULL, NULL, NULL, '2018-04-02 06:51:50', '', 0),
(100, 'MYIR-10037276510002', 'SPTMJ91', 'NYNDA WINDU WULANSARI', '089655626459', '081345140877', '2018-03-30', '-0.10034172323139873', '109.39675793051721', 'Jalan adisucipto gang teluk harapan no a17', 'Bom ada konfirmasi.dari fcc', '[]', NULL, NULL, NULL, NULL, '2018-04-02 06:51:50', '', 0),
(101, 'MYIR-10037180700001', 'SPTMJ91', 'Dinda tri', '089693397336', '089693397336', '2018-03-30', '-0.10037726244631526', '109.39675558358432', 'Jalan adisucipto gang teluk harapan no b23', 'Bom ada.konfirmasi dari.fcc', '[]', 1, NULL, NULL, NULL, '2018-04-02 06:51:50', '', 0),
(102, 'MYIR-10036110430001', 'SPTMJ91', 'U. arfandi', '085252589494', '085252589494', '2018-03-30', '0.9329775779559022', '108.97978171706198', '14-Mar-18 09:00|Gang Permai no 3, Sungai Garam Hili, Singkawang Utara, Kota Singkawang, Kalimantan B', 'Info.terakhir teknisi bln.ke.lokasi pemasangan', '[]', NULL, NULL, NULL, NULL, '2018-04-02 06:51:50', '', 0),
(103, 'MYIR-10034216280001', 'SPTMJ91', 'RAHMAWATI', '08179382112', '08179382112', '2018-03-30', '-0.12985434442385657', '109.41045999526978', '15-Feb-18 12:00|lanjut/285000/Jalan adisucipto komplek panorama residence no 4. dekat dengan dukapil', 'Udah ada pdp baru di dpn komp.pelanggan', '[]', NULL, NULL, NULL, NULL, '2018-04-02 06:51:50', '', 0),
(104, 'MYIR-10033411210001', 'SPTMJ91', 'Meisy', '085348676792', '085348676792', '2018-03-30', '-0.003602877256883511', '109.35664013028145', '04-Feb-18 09:00|lanjut/170000/Siantan, jalan parit pangeran gang pati 3 no h2. dekat dengan warung/0', 'Belum pernah di kunjungi teknisi', '[]', 1, NULL, NULL, NULL, '2018-04-02 06:51:50', '', 0),
(105, 'MYIR-10031773190001', 'SPTMJ91', 'FATMAWATI', '089504876665', '089504876665', '2018-03-30', '-0.02123840104580443', '109.31180264800787', '10-Jan-18 13:00|Jl. Tabrani ahmad Gang Bersama 2 No 63, kel. Pontianak Barat, kec. pontianak barat, ', 'Pdp kosong masih ada 1 buah.jarak 350.meter', '[]', NULL, NULL, NULL, NULL, '2018-04-02 06:51:50', '', 0),
(106, 'MYIR-10032369270001', 'SPTMJ91', 'Suparman', '081346623130', '081346623130', '2018-03-30', '-0.036406626337636354', '109.30590011179446', 'Jalan dokter wahidin gang adiakasa no.15 pontianak kota', 'Tidak pernah di tangani oleh teknisi', '[]', NULL, NULL, NULL, NULL, '2018-04-02 06:51:50', '', 0),
(107, 'MYIR-10037433310002', 'SPSBA88', 'Agus Susanto', '081256631310', '0', '2018-03-29', '-0.06977697972211092', '109.37131013721228', '30-Mar-2018 10:31|Jln Siaga Gg Siaga Indah Lestari nomor A8 Sungai Raya, Kabupaten Kubu Raya, Kalima', 'Jalan Siaga Gg Siaga Indah Lestari Nomor A8 Sungai Raya dekat Asrama BRIMOB,Kabupaten Kubu Raya,Kalimantan Barat.', '[\"\\/data\\/storage\\/uploads\\/g66BbgiD5M-1522289097.jpg\"]', 1, NULL, NULL, NULL, '2018-04-02 06:51:50', '', 0),
(108, 'MYIR-10037433310002', 'SPSBA88', 'Agus Susanto', '081256631310', '0', '2018-03-29', '-0.06977697972211092', '109.37131013721228', '30-Mar-2018 10:31|Jln Siaga Gg Siaga Indah Lestari nomor A8 Sungai Raya, Kabupaten Kubu Raya, Kalima', 'Jalan Siaga Gg Siaga Indah Lestari Nomor A8 Sungai Raya dekat Asrama BRIMOB,Kabupaten Kubu Raya,Kalimantan Barat.', '[\"\\/data\\/storage\\/uploads\\/eP9kKpw68d-1522289208.jpg\"]', 1, NULL, NULL, NULL, '2018-04-02 06:51:50', '', 0),
(109, 'MYIR-10037410350001', 'SPSBA88', 'Muhammad Nur', '085820473455', '082381812345', '2018-03-29', '-0.006197914469074481', '109.27905656397343', '29-Mar-2018 08:00|Jalan Pramuka Gang Usaha Bersama No.1, Sungai Rengas, Sungai Kakap, Kabupaten Kubu', 'Jalan Pramuka Gang Usaha Bersama No.1 Sungai Rengas,Kabupaten Kubu Raya Kalimantan Barat.', '[\"\\/data\\/storage\\/uploads\\/le2kmz7Dvg-1522289584.jpg\"]', NULL, NULL, NULL, NULL, '2018-04-02 06:51:50', '', 0),
(110, 'MYIR-10037432460002', 'SPSBA88', 'Ira Maya', '081256003668', '0', '2018-03-29', '-0.06944807408441973', '109.37177885323764', '30-Mar-2018 10:31|Jalan Siaga Gg.Siaga No.A4 Sungai Raya, Kabupaten Kubu Raya, Kalimantan Barat // L', 'Jalan Siaga Gg Siaga Nomor A4 tepi jalan di Toko LOLYPOP Sungai Raya,Kabupaten Kubu Raya Kalimantan Barat.', '[\"\\/data\\/storage\\/uploads\\/QKNIPGy0hE-1522290932.jpg\"]', 1, NULL, NULL, NULL, '2018-04-02 06:51:50', '', 0),
(111, 'MYIR-10035765430001', 'OLIVR46', 'Hasmayati', '083149150728', '5', '2018-03-31', '-0.03562409201214628', '109.35359749943018', '08-Mar-18 09:16|Jalan Umuthalib 15, Pontianak Barat|700270|WITEL', 'Test', '[\"\\/data\\/storage\\/uploads\\/3ReKvWC1sC-1522293384.jpg\"]', 1, NULL, NULL, NULL, '2018-04-02 06:51:50', '', 0),
(112, 'MYIR-10037439220004', 'SPAMT85', 'Muslim Misbahudin', '081257556655', '085251845200', '2018-03-29', '-0.053122818309495404', '109.37362521886826', '30-Mar-2018 08:00|2018-03-30/08:00/Jl. Tanjung Raya II gg. Suka-suka no.14 kel.parit mayor pontianak', 'Harap segera dipasang .', '[\"\\/data\\/storage\\/uploads\\/oiJAPnV2Nz-1522293471.jpg\"]', 1, NULL, NULL, NULL, '2018-04-02 06:51:50', '', 0),
(113, 'MYIR-10037434880001', 'SPYAN59', 'YUSMERI HERLAN', '085289596482', '0', '2018-03-29', '-0.05620199285689792', '109.39544599503277', 'Jl.Transkalimantan Komp.ruko bbc', 'Jl.transkalimantan Komp.Ruko borneo bisnis icon blok c16', '[\"\\/data\\/storage\\/uploads\\/TZYEBECP64-1522293694.jpg\"]', 1, NULL, NULL, NULL, '2018-04-02 06:51:50', '', 0),
(114, 'MYIR-10037449260001', 'SPAMT85', 'PT. Serkolinas aman nusantara.wilayah Kalbar.', '089652022999', '085251845200', '2018-03-29', '-0.023783817204260056', '109.32271387428044', '30-Mar-2018 13:01|Dilanjut / Bpk Taswan / 330000 / Jl. Prof. DR. Hamka.Gg.padi 8. No.62, Sungai Jawi', 'Kantor', '[\"\\/data\\/storage\\/uploads\\/nZZx4sKv3s-1522297160.jpg\"]', 1, NULL, NULL, NULL, '2018-04-02 06:51:50', '', 0),
(115, 'MYIR-10037388230001', 'SPTSN91', 'Jon charlos', '082252400611', '0', '2018-03-29', '0.08520134378548193', '111.47320479154587', 'Jalan Darat II Depan Pasar Baru\r\nKelurahan Kapuas Kiri Hilir \r\nKecamatan Sintang', 'Mohon di Bantu', '[]', 1, NULL, NULL, NULL, '2018-04-02 06:51:50', '', 0),
(116, 'MYIR-10037454790004', 'SPDKY88', 'VELDILI PUTRAWAN', '0853879196750', '0', '2018-03-29', '-0.028740874217631555', '109.34263832867144', 'Jl. Tanjungpura Gg. DILI ACEH 1 No.33', 'Jl. Tanjungpura Gg. Dili Aceh rumah No.33 posisi tengah gang', '[]', NULL, NULL, NULL, NULL, '2018-04-02 06:51:50', '', 0),
(117, 'MYIR-10037450770001', 'SPIND93', 'SRI SWESTI.SE', '08115702723', '0', '1970-01-01', '-0.07163072001602029', '109.3487872928381', '2018-03-30 08:00|jl.paris 2 komp Pemda Jalur 1 No.92|830054|WITEL', 'Pelanggan minta call dulu sebelum ke rmh..\r\nJl.paris 2 komp pemda jalur 1 no 92', '[]', 1, NULL, NULL, NULL, '2018-04-02 06:51:50', '', 0),
(118, 'MYIR-10037374570001', 'SPTSN91', 'Sudarminingsih', '081522708837', '0', '2018-03-30', '0.03312762642106743', '111.46295607089998', 'Jalan Sintang - Pontianak, KM 6 Depan makam Pahlawan\r\nKelurahan Martiguna \r\nKecamatan Sintang', 'Mohon di Bantu agar menuju WO ????', '[]', 1, NULL, NULL, NULL, '2018-04-02 06:51:50', '', 0),
(119, 'MYIR-10037454790006', 'SPDKY88', 'VELDILI PUTRAWAN', '0853879196750', '0', '2018-03-29', '-0.028776413482597296', '109.34257999062538', 'Jl. Tanjungpura Gg.Dili Aceh No.33', 'Jl. Tanjungpura Gg.Dili Aceh No.33 \r\nPosisi rumah tengah tengah Gang', '[]', 1, NULL, NULL, NULL, '2018-04-02 06:51:50', '', 0),
(120, 'MYIR-10037413310001', 'SPTSN91', 'Agus Prasetyo', '082154734747', '0', '2018-04-01', '0.07657100961214376', '111.48578032851219', 'Jalan Cik Ditiro Rt 09 / Rw 03\r\nKelurahan Kapuas Kanan Hulu \r\nKecamatan Sintang', 'Mohon dibantu untuk menuju WO', '[]', 1, NULL, NULL, NULL, '2018-04-02 06:51:50', '', 0),
(121, 'MYIR-10037395790009', 'SPSBA88', 'Pak Hasanuddin', '082158401401', '0', '2018-03-29', '-0.009108446500078976', '109.31167960166931', '29-Mar-2018 08:00|Jalan M.Saad.Ain.Gg Seluang No.20 Pontianak // Didepan Lapangan Voli // 0821584014', 'Perumnas 1 Jeruju Jalan M Saad Ain Gg. Seluang M1 No. 20 Depan SDN 04 Pontianak', '[\"\\/data\\/storage\\/uploads\\/HD2z2zIM4b-1522313307.jpg\"]', 1, NULL, NULL, NULL, '2018-04-02 06:51:50', '', 0),
(122, 'MYIR-10037395790009', 'SPSBA88', 'Pak Hasanuddin', '082158401401', '0', '2018-03-29', '-0.009108446500078976', '109.31167960166931', '29-Mar-2018 08:00|Jalan M.Saad.Ain.Gg Seluang No.20 Pontianak // Didepan Lapangan Voli // 0821584014', 'Perumnas 1 Jeruju Jalan M Saad Ain Gg. Seluang M1 No. 20 Depan SDN 04 Pontianak', '[\"\\/data\\/storage\\/uploads\\/weMlyDiRXk-1522313322.jpg\"]', 1, NULL, NULL, NULL, '2018-04-02 06:51:50', '', 0),
(123, 'MYIR-10037480680001', 'SPAMT85', 'Hadirah', '0895365601095', '085251845200', '2018-03-29', '-0.024041309247263234', '109.32251371443272', '30-Mar-2018 08:00|lanjut / /CP : 0895365601095 Hadirah // Gg. Padi 9 No.3, kec/kel. Sungai Jawi, Pon', 'Psb', '[]', 1, NULL, NULL, NULL, '2018-04-02 06:51:50', '', 0),
(124, 'MYIR-10037453090001', 'SPRLY91', 'LEO PRIMA YUHERSAPAUTRA', '08115644456', '0', '2018-03-29', '-0.02435043380866251', '109.32438723742962', '30-Mar-2018 15:31|Gang Usaha 1 no 27B sungai jawa  pontianak kota // dekat mesjid  muha hiddin // 08', 'Pasang hari ini jam 4/5..\r\nJarak odp ke lokasi pelanggan cuman 60m', '[]', 1, NULL, NULL, NULL, '2018-04-02 06:51:50', '', 0),
(125, 'MYIR-10037466380001', 'SPRLY91', 'ISMOE BAYU KURNIA KUSHARIADI', '085217504584', '0', '2018-03-30', '-0.057001961305218354', '109.32795625180007', '30-Mar-2018 08:00|Jalan Purnama Komplek Purnama Permai I no G11 Kec Pontianak Selatan Kel Parito Kay', 'Pelanggan minta pasang besok Jam 1 siang,  di pastikan untuk di hubungi terlebih dahulu', '[]', 1, NULL, NULL, NULL, '2018-04-02 06:51:50', '', 0),
(126, 'MYIR-10037471680001', 'SPRLY91', 'WIENDA SASMYTA MULIAWAN', '08119404567', '0', '2018-03-30', '-0.007916875158388775', '109.3176693096757', '30-Mar-2018 13:01|Gang Pisang no 12 pontianak RT 01 RW 15 Kel Sungai Jawi Luar Kec Pontianak Barat K', 'Minta pasangkan besok jam 10.. Jarak dari odp cuman 230m, masih fresh at baru.\r\nOdp JAW FM 071di gg. Pisang raja.. \r\nSebelah gg pisang raja at depan gg pisang odp FM 073 jarak cman 210m', '[]', 1, NULL, NULL, NULL, '2018-04-02 06:51:50', '', 0),
(127, 'MYIR-10035801150001', 'OLIVR46', 'WIWIT INDRA HASTUTIK', '085252433883', '085552548', '2018-03-29', '-0.03562409201214628', '109.35359749943018', '08-Mar-18 10:00| jalan raya desa kapur, komplek bayangkara asri 2. blok B 4/ sebalah toko bangunan m', 'Test', '[\"\\/data\\/storage\\/uploads\\/YkjwGDF1OR-1522318690.jpg\"]', 1, '10.00-13.00', NULL, 'false', '2018-04-02 06:51:50', '', 0),
(128, 'MYIR-10037388620001', 'SPTSN91', 'Astuti veronika', '082251252390', '0', '2018-03-29', '0.04093922326300063', '111.4711643010378', '29-Mar-2018 13:01|BTN Cipta Mandiri 1 rt 031 rw 005 kel.kapuas kanan hulu kec.Sintang patokan jl MT ', 'Mohon di Bantu menuju PS ( sudah terpasang )', '[]', 1, NULL, NULL, NULL, '2018-04-02 06:51:50', '', 0),
(129, 'MYIR-10037472910002', 'SPNGY91', 'Dyna Liestari', '081271526464', '0', '1970-01-01', '-0.04112328980944327', '109.30849246680737', 'jalan suka mulia komp sepakat mulia no 10', 'rumah sebelah kanan di dalam komp', '[]', 1, NULL, NULL, NULL, '2018-04-02 06:51:50', '', 0),
(130, 'MYIR-10037163970001', 'SPVVP95', 'junaidi', '089505985102', '0', '2018-03-29', '-0.03539643956572147', '109.31666918098925', '26-Mar-2018 08:00|Gg. Selamat Bersama No.18, Sungai Bangkong, Pontianak Kota, Kota Pontianak, patoka', 'Sudah aktif tpi kena masih belom ps', '[]', NULL, NULL, NULL, NULL, '2018-04-02 06:51:50', '', 0),
(131, 'MYIR-10036369620001', 'SPNGY91', 'asep suwarna', '085281507244', '0', '2018-03-30', '-0.047273928523719415', '109.30070936679839', '16-Mar-18 15:00|jalan petani Gang Mandiri no b 29, Pontianak Kota. dekat dengan alfamart dan  masjid', 'rumah paling ujung sebelah kanan', '[]', NULL, NULL, NULL, NULL, '2018-04-02 06:51:50', '', 0),
(132, 'MYIR-10036786540002', 'SPNGY91', 'SRI SUDIARTI', '082250790840', '0', '2018-03-30', '0.0014369934795780853', '109.28513545542955', '21-Mar-2018 08:00|Jalan Perum pondok harapan kita Gg Borobudur Blok e no 8, Sungai Rengas, Sungai Ka', 'lokasi rumah di kantor perikanan', '[]', NULL, NULL, NULL, NULL, '2018-04-02 06:51:50', '', 0),
(133, 'MYIR-10037183560001', 'SPAIN88', 'saaludin', '085247166887', '0', '2018-03-30', '-0.12180304293564063', '109.38803639262915', '2018-03-27 10:31|Jl. Wonodadi. Gg. Sabar. No..2|830054|WITEL', 'Minta segera di pasang besok terima kasih', '[]', NULL, NULL, NULL, NULL, '2018-04-02 06:51:50', '', 0),
(134, 'MYIR-10035465600003', 'SPNGY91', 'Rita monita S.E', '081350170880', '0', '2018-03-30', '-0.019806101523758446', '109.32101469486952', '03-Mar-18 08:00|jalan H rais A rahman no 1  Pontianak Barat// samping gg selamat 1 |RA260794|FCC', 'toko elektronik sebelah kiri pingir jalan', '[]', 1, NULL, NULL, NULL, '2018-04-02 06:51:50', '', 0),
(135, 'MYIR-10035525590001', 'SPNGY91', 'Army sugihartono', '081345320102', '0', '2018-03-30', '-0.10388726264143454', '109.40614867955446', '04-Mar-18 08:00|Jalan Adi Sucipto Gang patria 1 no B.9, Sungai Raya,,belakang makam pahlawan,,081345', 'rumah chat hijau sebelah kanan pas masuk komp sebalah kanan', '[]', NULL, NULL, NULL, NULL, '2018-04-02 06:51:50', '', 0),
(136, 'MYIR-10037070840001', 'SPAIN88', 'laila', '0895702267669', '0', '2018-03-30', '-0.05393318035446148', '109.37281955033541', 'Jl. Tanjung raya 2. Gg. Nusa indah. No.22. 2018-03-25 08:00|0895702267669|830054|WITEL', 'Minta bantu pasang besok... terimah kasih', '[]', NULL, NULL, NULL, NULL, '2018-04-02 06:51:50', '', 0),
(137, 'MYIR-10033862990004', 'SPNGY91', 'Ali karsono', '085248888864', '0', '2018-03-30', '-0.034765450013244235', '109.34628210961819', '09-Feb-18 13:26|09-Feb-18, jm. 13:26, Jalan. Tanjung Pura no. 18 konter surya jaya, benua melayu dar', 'konter sebelah kiri. samping rumah makan melda', '[]', NULL, NULL, NULL, NULL, '2018-04-02 06:51:50', '', 0),
(138, 'MYIR-10033778560001', 'SPNGY91', 'Novie Pratiwi. S.E', '081350285782', '0', '2018-03-30', '-0.025234221596325893', '109.33036353439093', '08-Feb-18 10:00|Jalan Cendrawasih no 59 B, kel kampung tengah kec Pontianak Kota (depan warkop bersa', 'rumah pingir jalan sebalah kanan klo masuk dari jalan merdeka barat', '[]', NULL, NULL, NULL, NULL, '2018-04-02 06:51:50', '', 0);
INSERT INTO `follow` (`id`, `track_id`, `id_user`, `nama`, `no_hp`, `no_hp_alt`, `appointment`, `lat`, `lng`, `alamat`, `catatan`, `foto`, `done`, `appointment_waktu`, `odp`, `nd_telp`, `timestamp`, `witel`, `sales_id`) VALUES
(139, 'MYIR-10036979850001', 'SPAIN88', 'usman SE', '085849500599', '0', '2018-03-30', '-0.04709623223675202', '109.35558836907148', '2018-03-24 13:01|jl. Iman bonjol. Gg. Family no.5,|830054|WITEL', 'Minta di bantu pasang besok karna sudah lama menunggu.m terima kaish', '[]', 1, NULL, NULL, NULL, '2018-04-02 06:51:50', '', 0),
(140, 'MYIR-10037497660001', 'SPDKY88', 'RIADY HERAWAN', '08115622321', '089604982213', '2018-03-29', '-0.06054079896195836', '109.30330038070679', 'Jl. Ampera Gg.Iklas No. 6a', 'Posisi rumah di tengah gang No.6A', '[]', 1, NULL, NULL, NULL, '2018-04-02 06:51:50', '', 0),
(141, 'MYIR-10037435460001', 'SPSBA88', 'Eric Nikolaus', '081257609884', '0', '2018-03-30', '-0.014415196922339744', '109.34581775218247', '30-Mar-2018 13:01|Jalan Gusti Situt Mahmud Gg Selat Makassar No.59 Toko Aneka Kerupuk / pinggir jala', 'Jl. Gusti Situt Mahmud, Gg. Selat Makasar, No. 59 *Toko Aneka Kerupuk*\r\nSiantan\r\n\r\nSetelah _Kaisar Siantan_, sebelah kanan,\r\nletak Gang di antara _BPAS_ dan _Bank BNI 46_\r\n\r\nMasuk kira-kira 100meter, No. 59 Toko Aneka Kerupuk (sebelah kiri)', '[\"\\/data\\/storage\\/uploads\\/C0qbPHTXP7-1522337367.jpg\"]', 1, NULL, NULL, NULL, '2018-04-02 06:51:50', '', 0),
(142, 'MYIR-10037019960005', 'SPSBA88', 'Ricky Yantoro', '6282149119471', '0', '2018-03-30', '-0.04531692241016883', '109.35267448425293', '24-Mar-2018 09:00|24-Mar-2018 09:00|Jalan Imam Bonjol Gg.Tanjung Djambu Tiga Rumah Sebelah Kanan no ', 'Jalan Imam Bonjol Gg.Tanjung Djambu Tiga Rumah sebelah kanan Pontianak Kalimantan Barat', '[\"\\/data\\/storage\\/uploads\\/DpZwZr8gMh-1522344084.jpg\"]', NULL, NULL, NULL, NULL, '2018-04-02 06:51:50', '', 0),
(143, 'MYIR-10037504130001', 'OLHEROO', 'Ridwansyah', '0895323813836', '123', '2018-03-30', '-0.0381869421939954', '109.32694137096405', 'TEST DOANG', 'TEST AJAH', '[\"\\/data\\/storage\\/uploads\\/Hc6zg0ETUP-1522345063.jpg\"]', 1, '10.00-13.00', NULL, '05616710835', '2018-04-02 06:51:50', '', 0),
(144, 'MYIR-10037510530001', 'SPDKY88', 'PUTRI MEGA AYU', '081250505926', '0', '1970-01-01', '-0.07039690481687644', '109.39056135714054', '31-Mar-2018 10:31|Jl. Desa Kapur,  Komplek Graha Kapur  No A4, kec sungai raya kel kubu raya // pato', 'Komplek Graha kapur A4 posisi arah depan komplek. Ade 3 ODP', '[]', 1, NULL, NULL, NULL, '2018-04-02 06:51:50', '', 0),
(145, 'MYIR-10037521310001', 'SPDDA85', 'HIU KUI LAN', '0853495441544', '0', '2018-03-30', '0.9037519601477224', '108.98953322321177', '2018-03-31 08:00|-|930325|WITEL', 'alhamdulillah', '[\"\\/data\\/storage\\/uploads\\/eQFXUF20TY-1522395101.jpg\"]', 1, NULL, NULL, NULL, '2018-04-02 06:51:50', '', 0),
(146, 'MYIR-10037542870001', 'SPHDI79', 'Novi Unun Handayani', '089693597005', '0', '2018-03-31', '-0.03106534328842225', '109.2893398180604', '31-Mar-2018 08:00|Jl. Hussein Hamzah Komp Cempaka V no. A.28 Pontianak Barat, Kota Pontianak, Kalima', 'Masuk dr jl. Hussein Hamzah rumahnya d sebelah rumah cat hijau masuk komp sebelah kanan..', '[\"\\/data\\/storage\\/uploads\\/OaMv5figlH-1522397993.jpg\"]', 1, NULL, NULL, NULL, '2018-04-02 06:51:50', '', 0),
(147, 'MYIR-10037252430001', 'SPTSN91', 'M. Chomain Wahab', '0811566160', '0', '2018-03-30', '0.09248621470709933', '111.53206083923578', '29-Mar-2018 15:00|lanjut//jalan Sintang-putussibau , Kabupaten Sintang, Kalimantan Barat, Indonesia,', 'Mohon di nantu menuju PS ( sudah terpasang )', '[]', 1, NULL, NULL, NULL, '2018-04-02 06:51:50', '', 0),
(148, 'MYIR-10037549420004', 'SPAMT85', 'Syahroni', '089627947089', '085251845200', '2018-03-30', '-0.0055045634423432155', '109.34876650571822', '1-Apr-2018 08:00|lanjut/Parwasal perumahan garden mas 1 blok E. gg. Pinang merah dekat dengan ponpes', 'Mohon dapat ditarik kabel nya', '[\"\\/data\\/storage\\/uploads\\/hduy1oquBW-1522407284.jpg\"]', 1, NULL, NULL, NULL, '2018-04-02 06:51:50', '', 0),
(149, 'MYIR-10037545860002', 'SPAMT85', 'Yanto', '081253200488', '085251845200', '2018-03-30', '-0.01848075506828038', '109.35227282345295', '1-Apr-2018 10:31|Jl. Gusti Situt Mahmud .Rt 04/05 gg.selat wetar , Siantan Hulu, Pontianak Utara, Ko', 'Mohon dapat ditarik kabelnya', '[\"\\/data\\/storage\\/uploads\\/YaUqaKEtuv-1522407389.jpg\"]', 1, NULL, NULL, NULL, '2018-04-02 06:51:50', '', 0),
(150, 'MYIR-10037548130002', 'SPFQR98', 'ARIF APRIANTO', '081274024162', '0', '2018-03-31', '-0.06441323592423673', '109.3613175675273', '31-Mar-2018 13:01|Jl.Dr. Soedarso Gg.BPom No.55 pontianak//Patokannya dekat kampus akbid sudarso//CP', 'Bisa masuk dari parit h husin 1 gg. Al qadar terus ada simpang ke kiri ikutkan jalan terus no. 55', '[]', 1, NULL, NULL, NULL, '2018-04-02 06:51:50', '', 0),
(151, 'MYIR-10037542840001', 'SPRRF87', 'NUR ROKHIM', '087812461213', '0811155522', '2018-03-31', '3.311041786463496', '117.58260671049356', '31-Mar-2018 10:31|Jl. Swarga, Karang Balik, Tarakan Bar., Kota Tarakan, Kalimantan Utara, Indonesia,', 'Tes arya', '[\"\\/data\\/storage\\/uploads\\/n8vVR1dHg5-1522415658.jpg\",\"\\/data\\/storage\\/uploads\\/RDxr0jebEe-1522415658.jpg\"]', 1, '10.00-13.00', NULL, '05513818056', '2018-04-02 06:51:50', '', 0),
(152, 'MYIR-10037349740001', 'SPTMJ91', 'Rukiah', '082157001479', '082157001479', '2018-03-31', '-0.05736841792935947', '109.36145871877669', '28-Mar-2018 15:31|Jl. Parit Haji Husin 1 Gang Muslimin II No. 17  kel balitung laut kec  Pontianak T', 'Stb bln diantar ke rmh.pelanggan tolong cpt.di.antar.', '[]', 1, NULL, NULL, NULL, '2018-04-02 06:51:50', '', 0),
(153, 'MYIR-10037545180001', 'SPFQR98', 'JUNARTO', '085246046667', '0', '2018-03-31', '-0.06266544254970606', '109.36809953302145', '31-Mar-2018 16:00|Gg. Teladan no. 17, Sungai Raya, Kabupaten Kubu Raya, Kalimantan Barat //patokanny', 'Jalan. Adi sucipto Gg. Teladan depan no.17 pagar warna hijau', '[]', 1, NULL, NULL, NULL, '2018-04-02 06:51:50', '', 0),
(154, 'MYIR-10037555910001', 'SPFQR98', 'FAIZ DZIAULHAQ', '081256821188', '0', '2018-03-31', '-0.010170265978806017', '109.31802302598953', '31-Mar-2018 15:31|Gg. Gandaria no. 61, Sungai Jawi Luar, Pontianak Bar., Kota Pontianak, Kalimantan ', 'Masuk jalan apel Gang. Gandaria no. 60 sungai jawi', '[]', 1, NULL, NULL, NULL, '2018-04-02 06:51:50', '', 0),
(155, 'MYIR-10037563180001', 'SPFQR98', 'RISKANITA', '085323222765', '0', '1970-01-01', '-0.005945451546957127', '109.30404134094714', '31-Mar-2018 13:01|jalan. kom yos sudarso perumnas 2 jl. atot ahmad 1 no. 15, sungai beliung , pontia', 'Masuk jalan. Atot ahmad 1 no. 15 dekat gang sambas 1', '[]', 1, NULL, NULL, NULL, '2018-04-02 06:51:50', '', 0),
(156, 'MYIR-10037317980001', 'SPWRA96', 'NOPAN DWIKASNI', '085245726909', '085245726909', '2018-04-01', '-0.043698545034151576', '109.30029194802044', '28-Mar-2018 15:31|Jalan Danau Sentarum Jalan Petani gang nur nomor 3 , kel sungai jawi kec  Pontiana', 'Belum terpasang juga', '[\"\\/data\\/storage\\/uploads\\/O4UOLAko4E-1522438813.jpg\"]', 1, NULL, NULL, NULL, '2018-04-02 06:51:50', '', 0),
(157, 'MYIR-10037569890001', 'SPNGY91', 'Widya Halim', '082251259888', '0', '2018-03-31', '-0.057548461118950435', '109.32571560144426', '1-Apr-2018 08:00|Jl purnama, komp.purnama griya, patokannya samping purnama mart swalayan,  No.B9./ ', 'Jl purnama, komp.purnama griya, samping purnama mart swalayan,  No.B9.', '[]', 1, NULL, NULL, NULL, '2018-04-02 06:51:50', '', 0),
(158, 'MYIR-10037568900001', 'SPNGY91', 'Anita', '081256087562', '0', '2018-03-31', '-0.06716316890371171', '109.37160350382327', '1-Apr-2018 10:31|2018-04-01/10:31/Jalan adisucipto Gg. M Saleh no 34, Sungai Raya, Kabupaten Kubu Ra', 'masuk gg m saleh rumah sebelah kanan no 5', '[]', 1, NULL, NULL, NULL, '2018-04-02 06:51:50', '', 0),
(159, 'MYIR-10037248670002', 'SPTSN91', 'Elisabet', '081522565635', '0', '2018-03-31', '0.1054432765499187', '111.55888192355631', '28-Mar-2018 08:00|jalan Sintang - putusibau, rt 1 Akcaya 1 Kabupaten Sintang, Kalimantan Barat 78661', 'Mohon bantuannya menuju PS ( sudah terpasang )', '[]', 1, NULL, NULL, NULL, '2018-04-02 06:51:50', '', 0),
(160, 'MYIR-10037425080002', 'SPWRA96', 'RULLY', '0895702478988', '081649077988', '2018-04-01', '-0.004647932941586809', '109.31026976555586', 'Jalan Komyos sudarso komplek Bali indah blok F nomor 22', 'Belum terpasang sampai sekarang', '[\"\\/data\\/storage\\/uploads\\/xUK2bPZwUs-1522477466.jpg\"]', NULL, NULL, NULL, NULL, '2018-04-02 06:51:50', '', 0),
(161, 'MYIR-10037595010001', 'SPJKS92', 'DWI EKO SAPUTRA REDO', '083805459975', '082251353656', '2018-04-01', '0.07276931683883282', '111.49810943752526', '1-Apr-2018 08:00|Jl. Akcaya 2 Gg. Darusallam 2, Kel, Tanjung Puri. Kec. Sintang, Kabupaten Sintang, ', 'Minta pasang besok jam 10 pagi', '[]', 1, NULL, NULL, NULL, '2018-04-02 06:51:50', '', 0),
(162, 'MYIR-10037527890001', 'SPTSN91', 'Riko yuda pratama', '085252380884', '0', '2018-03-31', '0.07851627991856147', '111.49471577256918', '31-Mar-2018 08:00|jl. pangeran antasari no 61 kel: tanjung puri kec: simpang kalmantan barat / 08125', 'Mohon Bantuannya Menuju PS (sudah terpasang)', '[]', 1, NULL, NULL, NULL, '2018-04-02 06:51:50', '', 0),
(163, 'MYIR-10037546430001', 'SPTSN91', 'Idu asnah', '085820071971', '0', '2018-03-31', '0.08443926198420035', '111.473881714046', '31-Mar-2018 15:31|Jalan masuka 2 gang pangsuma undefined, Sintang  rt 03  rw 01  mengkurai  // psar ', 'Mohon bantuannya menuju PS (sudah terpasang)', '[]', 1, NULL, NULL, NULL, '2018-04-02 06:51:50', '', 0),
(164, 'MYIR-10037484870001', 'SPAIRMA', 'Bunga', '081258257874', '855552', '2018-04-01', '3.3103592993828057', '117.58268516510725', '2018-04-01 08:00|081258257874|930026|WITEL', 'Ted', '[\"\\/data\\/storage\\/uploads\\/WNuo7TqZsC-1522479835.jpg\"]', 1, '13.00-15.00', NULL, '05513814418', '2018-04-02 06:51:50', '', 0),
(165, 'MYIR-10037605370001', 'SPSAI88', 'WENG LENG', '082150351818', '085245683408', '2018-04-01', '-0.07112110069862652', '109.35736097395419', 'Jl. Sungai Raya Dalam Komplek Villa Kelapa Gading Permai No.A12, Bangka Belitung Darat, Pontianak Te', 'Bangka Belitung Darat, Pontianak Tenggara, Kota Pontianak, Kalimantan Barat 78117,', '[\"\\/data\\/storage\\/uploads\\/oQGQOlSXwQ-1522488177.jpg\",\"\\/data\\/storage\\/uploads\\/4WR8VlMsWx-1522488177.jpg\"]', 1, NULL, NULL, NULL, '2018-04-02 06:51:50', '', 0),
(166, 'MYIR-10037612170001', 'SPJKS92', 'ARIEF FERDIAN AKBAR', '082154961616', '0', '2018-04-01', '0.06547840749495887', '111.47449627518655', '1-Apr-2018 15:31|lanjut/ARIEF FERDIAN AKBAR/Jl. suka maju Gg. wp jahir , Kel. Kapuas kanan hulu, Kec', 'Minta pasang besok', '[\"\\/data\\/storage\\/uploads\\/jlmBAauTmd-1522499269.jpg\"]', 1, NULL, NULL, NULL, '2018-04-02 06:51:50', '', 0),
(167, 'MYIR-10037598440001', 'SPJKS92', 'ILHAM', '085751765545', '0', '2018-04-01', '0.061128202405109314', '111.49678207933901', '2-Apr-2018 08:00|Jalan,Yc. Oevang Oeray ,kel, Baning Kota, Kec. Sintang, Kabupaten Sintang, Kalimant', 'Minta pasang besok', '[]', 1, NULL, NULL, NULL, '2018-04-02 06:51:50', '', 0),
(168, 'MYIR-10037604960001', 'SPJKS92', 'KIKI SORAYA', '0895605686951', '0', '2018-04-01', '0.06926099014271019', '111.47936448454855', '1-Apr-2018 15:31|eza // suami // Jalan. Mt. Haryono gg. wajar,Kel. Kapuas kanan hulu, Kec. Sintang, ', 'Minta pasang besok', '[]', 1, NULL, NULL, NULL, '2018-04-02 06:51:50', '', 0),
(169, 'MYIR-10037589320001', 'SPARD86', 'ASTIA', '081257919114', '0', '1970-01-01', '-0.027828587987614832', '109.32399496436119', '1-Apr-2018 08:00|Jl.HUSIEN HAMZAH Gg.Mandiri no 51, Pal Lima, Pontianak Bar., Kota Pontianak, Kalima', 'Cat pagar warna hijau', '[\"\\/data\\/storage\\/uploads\\/p3O7XHfwXT-1522504676.jpg\"]', 1, NULL, NULL, NULL, '2018-04-02 06:51:50', '', 0),
(170, 'MYIR-10037613230002', 'SPBLA98', 'rizky', '081253443931', '08085', '2018-04-02', '3.31010391052105', '117.58345529437065', '1-Apr-2018 10:31|jalan hangtua rt. 11 no .15b  kel selumit // di dekat rumah nya ketua rt.12 tanya a', 'Tres', '[\"\\/data\\/storage\\/uploads\\/reLR9bUvUZ-1522550221.jpg\"]', 1, '15.00-18.00', NULL, 'false', '2018-04-02 06:51:50', '', 0),
(171, 'MYIR-10037608050001', 'SPSUS26', 'TAUFIK SOPIAN', '082251194631', '6282251194631', '2018-04-02', '3.301833024664', '117.6014257594943', '2-Apr-2018 08:00|Jl. P. Antasari Rt.19 No.28 A kel Pamusian, kec  Tarakan Tengah, Kota Tarakan, Kali', 'Belakang masjid al\'ala', '[\"\\/data\\/storage\\/uploads\\/0z0sx0HEao-1522552133.jpg\"]', 1, '15.00-18.00', NULL, 'false', '2018-04-02 06:51:50', '', 0),
(172, 'MYIR-10037628190001', 'SPHDI79', 'Husni Aulia Tamma', '081649275879', '0', '2018-04-01', '-0.033592989606246786', '109.37745742499828', '2-Apr-2018 08:00|lanjut /Jalan Sambas Timur 8 no. 2 Perum 4, Durian, Sungai Ambawang, Kabupaten Kubu', 'Rumah ny dekat dgn SD dan ada tanah kosong', '[\"\\/data\\/storage\\/uploads\\/GlzhLaOtCW-1522564431.jpg\"]', 1, NULL, NULL, NULL, '2018-04-02 06:51:50', '', 0),
(173, 'MYIR-10037619120001', 'SPTSN91', 'Erni Subariyanti', '081253450800', '0', '2018-04-01', '0.10115107855044186', '111.56224742531776', '1-Apr-2018 15:31|JL.JERORORA 2 NO 1 KEL. Akcaya 1 , Kec. Sintang, Kabupaten Sintang, Kalimantan Bara', 'Mohon Bantu Menuju PS\r\n#SudahTerpasang', '[]', 1, '08.00-10.00', NULL, 'false', '2018-04-02 06:51:50', '', 0),
(174, 'MYIR-10037619820001', 'SPTSN91', 'Martin', '081255506987', '0', '2018-04-01', '0.08074452290552782', '111.48214928805828', '2-Apr-2018 08:00|terminal sungai durian simpang komp terminal sungai durian kel sintang Kapuas Kanan', 'Mohon Bantu Menuju PS ( Sudah Terpasang )', '[]', 1, '08.00-10.00', NULL, 'false', '2018-04-02 06:51:50', '', 0),
(175, 'MYIR-10037648660001', 'SPNGY91', 'Tutiah', '085348473869', '0', '2018-04-02', '-0.09491092841408375', '109.346968755126', 'KAB KUBU RAYA,SUNGAI RAYA SUNGAI RAYA,KOMP GRIYA PERMATA,20', 'rumah sebelah kiri.', '[]', 1, '10.00-13.00', NULL, 'tidak ada no telp', '2018-04-02 06:51:50', '', 0),
(176, 'MYIR-10037242430002', 'SPWRA96', 'DAMIANUS', '081352366766', '081352366766', '2018-04-02', '-0.01499924791607759', '109.34572085738183', '2018-03-30 10:31| Gusti Situt Mahmud Gang Selat Makassar nomor 109D|700270|WITEL', 'Teknisi belum pasang sampai sekarang', '[\"\\/data\\/storage\\/uploads\\/3JAIOZsyhb-1522593596.jpg\"]', 1, '08.00-10.00', NULL, 'false', '2018-04-02 06:51:50', '', 0),
(177, 'MYIR-10037466940002', 'SPWRA96', 'NOVI PUSPITASARI', '081521532633', '089694137356', '2018-04-02', '-0.03860737836267621', '109.28575672209263', '30-Mar-2018 13:01|Jalan husein hamzah jalan berdikari (patokan dekat simpang ampera, rumah sebelah k', 'Pelanggan menunggu pengaktifan Internet dan paketnya salah,pelanggan menggambil paket 20Mbps promo imlek 3p.', '[\"\\/data\\/storage\\/uploads\\/LLbUrFiCPu-1522599434.jpg\"]', NULL, '13.00-15.00', NULL, 'false', '2018-04-02 06:51:50', '', 0),
(178, 'MYIR-10037672050001', 'SPAMT85', 'Akbar Nanda Sudarman', '085252084474', '085251845200', '2018-04-02', '-0.0309848770297689', '109.28752027451992', '2-Apr-2018 15:31|lanjut // Akbar Nanda Sudarman // 2P // Jl. husein hamzah A5, Komplek Didis permai ', 'Mohon ditarik hari ini sore jam 4 . Silakan datang sore ditunggu . Sebelum datang hub 085252084474', '[\"\\/data\\/storage\\/uploads\\/75MVODbEPv-1522622568.jpg\"]', NULL, '15.00-18.00', NULL, 'true', '2018-04-02 06:51:50', '', 0),
(179, 'MYIR-10037589070001', 'SPTSN91', 'Herman Boceng', '085245135810', '0', '2018-04-02', '0.07895014241008225', '111.49678619047938', '3-Apr-2018 08:00|jalan Darajuanti, Kec. Sintang, Kabupaten Sintang, Kalimantan Barat 78614, Indonesi', 'Mohon Bantu, sudah terpasang', '[]', 1, '08.00-10.00', NULL, 'false', '2018-04-02 06:51:50', '', 0),
(180, 'MYIR-10037620040001', 'SPTSN91', 'Darmadi', '081258086891', '0', '2018-04-02', '0.07898499550118367', '111.49736579507591', '1-Apr-2018 13:01|lanjut//terminal pasar impres, Kec. Sintang, Kabupaten Sintang, Kalimantan Barat, I', 'Mohon Bantu Sudah Terpasang', '[]', 1, '08.00-10.00', NULL, 'false', '2018-04-02 06:51:50', '', 0),
(181, 'MYIR-10037698360002', 'SPNGY91', 'Merry Astuti', '081345234123', '0', '2018-04-02', '-0.02486675899640202', '109.33516167104244', 'KODYA PONTIANAK,TENGAH PTK KOTA,JEND URIP,20-25', 'ruko sebelah kiri', '[]', 1, '15.00-18.00', NULL, '05618105239', '2018-04-02 06:51:50', '', 0),
(182, 'MYIR-10037602630001', 'SPRFL99', 'Robby', '085845175017', '085845175017', '2018-04-02', '-0.043292525761514544', '109.34577450156212', 'Jalan Budikarya,Komplek waduk no D05', 'Jalan Budikarya,Komplek waduk no D05', '[]', NULL, NULL, NULL, NULL, '2018-04-02 06:51:50', '', 0),
(183, 'MYIR-10037550460001', 'SPDBM84', 'SULAIMAN', '081257707011', '081276375186', '2018-04-03', '-0.041419673828699446', '109.30520240217447', '31-Mar-2018 10:31|Jalan Suka Mulya,Gang Sukma 9,No99, Sungai Jawi, Pontianak Kota, Kota Pontianak, K', 'Moban bisa di tarik dari ODP-FCB-PTK/109 jarak cuman 150 meter kendala perlu tancap tiang 2????????', '[\"\\/data\\/storage\\/uploads\\/jUWPf9h7p6-1522650565.jpg\",\"\\/data\\/storage\\/uploads\\/4aJykst2vY-1522650565.jpg\"]', 1, '08.00-10.00', NULL, 'true', '2018-04-02 06:51:50', '', 0),
(184, 'MYIR-10037507370001', 'SPDBM84', 'YA MUHAMMAD KHAFI', '082255335522', '0895601004801', '2018-04-02', '-0.0231582', '109.3299577', 'Jln.Pangeran Nata Kusuma Gg. Taman Asri No.B4', 'minta progres skrg pelanggan sudah menunggu sejak pameran di pcc tgl 29 kemarin????', '[]', 1, '08.00-10.00', NULL, 'false', '2018-04-02 06:51:50', '', 0),
(185, 'MYIR-10037665990001', 'SPFQR98', 'PASYA EKERT', '081388306363', '0', '2018-04-03', '-0.044210176253188876', '109.312701523304', '2-Apr-2018 08:00|Jl. Danau Sentarum Gg. Nurhadi 3 No. C.9, Komp, Kel. Sungai Bangkong, Kec. Ptk Kota', 'Gang. Nurhadi 3 no. C9', '[]', 1, '08.00-10.00', NULL, 'false', '2018-04-02 06:51:50', '', 0),
(186, 'MYIR-10030702190001', 'SPDBM84', 'EKA MANDASAPUTRA', '085215613055', '085215613055', '2018-04-04', '-0.011037625304139776', '109.33637402951716', 'KODYA PONTIANAK,SIANTAN HILIR PTK UTARA,Gang TELUK BAYUR,19C', 'follow up pelanggan lama boss..????', '[]', NULL, '13.00-15.00', NULL, '05618281152', '2018-04-02 06:56:45', '', 0),
(187, 'MYIR-10037631530001', 'SPSBA88', 'Hertanto Harvest', '085750830321', '0', '2018-04-02', '-0.03008432548091782', '109.3361346423626', '2018-04-03 08:00|Hos Cokroaminoto No.266a|700270|WITEL', 'Jalan HOS Cokroaminoto depan Pasar Mawar di Cafe Harvest', '[\"\\/data\\/storage\\/uploads\\/mbtEo7y9yc-1522653281.jpg\"]', 1, '15.00-18.00', NULL, 'false', '2018-04-02 07:14:44', '', 0),
(188, 'MYIR-10037721540001', 'SPDKY88', 'UMAR INDIRWAN', '0896914421141', '0', '1970-01-01', '-0.0180375200510814', '109.32136673480272', 'Gg. SELAMAT 1 DALAM NO.53', 'Gg. Selamat 1 dalam no.53 rumah ujung dekat kuburan', '[]', NULL, '08.00-10.00', NULL, 'true', '2018-04-02 07:21:01', '', 0),
(189, 'MYIR-10037733270002', 'SPAMT85', 'SATIAWAN', '081346631959', '085251845200', '2018-04-03', '-0.044642682326819595', '109.3113473430276', 'KODYA PONTIANAK,SEI BANGKONG PTK KOTA,JL DANAU SENTARUM GG ABIDIN,3', 'Di depan masih ada odp kosong silakan dicek .harap ditarik kabelnya .', '[\"\\/data\\/storage\\/uploads\\/dlUDObmUrF-1522659089.jpg\"]', 1, '08.00-10.00', NULL, '05618109633', '2018-04-02 08:51:33', '', 0),
(190, 'MYIR-10037663150001', 'SPHDI79', 'Ahmad Akbar SP', '081345140789', '0', '2018-04-02', '-0.05292534075532648', '109.35334134846926', '2-Apr-2018 15:31|Jl. Husni Thamrin no. P. 43 Komplek Untan, Bansir Laut, Pontianak Tenggara, Kota Po', 'Posisi rumahnya tepat d ujung jalan.masuk dr tugu pendidikan', '[]', 1, '08.00-10.00', NULL, 'false', '2018-04-02 09:28:16', '', 0),
(191, 'MYIR-10037666780003', 'SPSBA88', 'Lestari', '089683991537', '0', '2018-04-02', '-0.005575641980900365', '109.31297712028027', 'Jalan Kom Yos Sudarso Gg.Bunga Dalam No.66', 'Jalan Kom Yos Sudarso Gg.Bunga Dalam No.66', '[\"\\/data\\/storage\\/uploads\\/fpH2DnXNyL-1522661329.jpg\"]', NULL, '15.00-18.00', NULL, 'true', '2018-04-02 09:28:50', '', 0),
(192, 'MYIR-10037692580001', 'SPMSI97', 'Maria elys bidasari', '089611673244', '089611673244', '2018-04-03', '0.2895422249568317', '110.24747584015131', '3-Apr-2018 13:01|Sosok jalan moling no 42 rt 09 kec ten hulu kel moling, Samping masjid nurjannah , ', 'Pengen cepet masang nya', '[\"\\/data\\/storage\\/uploads\\/9NlelXVtbb-1522666347.jpg\"]', 1, NULL, NULL, NULL, '2018-04-02 10:52:29', '', 0),
(193, 'MYIR-10037745190001', 'SPNGY91', 'muhammad  hamzah', '082149075896', '0', '2018-04-03', '-0.10068739238626545', '109.35197375714779', 'KAB KUBU RAYA,SUNGAI RAYA SUNGAI RAYA,JL PRASETYA,20', 'rumah dekat masjid.  buka warung klontong', '[\"\\/data\\/storage\\/uploads\\/FD2cfAF4O7-1522669873.jpg\"]', 1, '10.00-13.00', NULL, 'tidak ada no telp', '2018-04-02 11:51:18', '', 0),
(194, 'MYIR-10037740870001', 'SPNGY91', 'wartini', '085346802886', '0', '2018-04-03', '-0.03878239246098596', '109.3604414910078', 'KODYA PONTIANAK,SAIGON PTK TIMUR,KOMPLEK CENDANA PERMAI BLOK A,19', 'rumah sebelah kiri', '[]', 1, '13.00-15.00', NULL, 'tidak ada no telp', '2018-04-02 11:53:46', '', 0),
(195, 'MYIR-10037735850001', 'SPNGY91', 'abdul hamid', '081256066636', '0', '2018-04-03', '-0.027686430926505082', '109.29050959646702', 'KODYA PONTIANAK,PAL LIMA PTK BARAT,TABRANI AHMAD KOMP PALESTINE,20', 'rumah sebelah kiri paling ujung', '[]', 1, '10.00-13.00', NULL, '05617810069', '2018-04-02 11:55:43', '', 0),
(196, 'MYIR-10037742110001', 'SPNGY91', 'Haryanto', '0895702372212', '0', '2018-04-03', '-0.10058915663263097', '109.35197174549103', 'jalan parsetyo no 304 depan masjid (warung iyan)', 'rumah depan masjid buka warung klontong', '[\"\\/data\\/storage\\/uploads\\/qJTtw5Pvkl-1522673895.jpg\",\"\\/data\\/storage\\/uploads\\/gk6dkVqcKz-1522673895.jpg\"]', 1, '10.00-13.00', NULL, 'false', '2018-04-02 12:58:20', '', 0),
(197, 'MYIR-10037712640001', 'SPJKS92', 'DJIE BUI FUNG', '085845718179', '0', '2018-04-03', '0.07986174173055963', '111.4830005541444', '2018-04-03 10:31|face to face|930269|WITEL\r\nJl. Masuka darat depan Polsek kota ada Gang masuk kecil,', 'Mau ke rumah hubungi pelangganya dulu', '[]', 1, '08.00-10.00', NULL, 'false', '2018-04-02 16:06:34', '', 0),
(198, 'MYIR-10037160450002', 'SPRFL99', 'Nanang Apriansyah', '089604982213', '089604982213', '1970-01-01', '-0.043621431547355975', '109.2919187620282', 'jalan ampera Depan kampus ikip Kantin Al barokah No A4', 'Depan kampus ikip, kantin al barokah no A4', '[]', NULL, NULL, NULL, NULL, '2018-04-02 17:21:34', '', 0),
(199, 'MYIR-10037776610001', 'SPNGY91', 'Arfian Fernicko', '0895702478648', '0', '2018-04-03', '-0.10983337440696556', '109.3978562951088', 'Jl. Parit Bugis\r\nKomplek Griya Lestari B.12\r\nKec. Sungai Raya\r\nKab. Kubu Raya', 'rumah sebelah kiri', '[]', NULL, '15.00-18.00', NULL, 'true', '2018-04-03 03:29:07', '', 0),
(200, 'MYIR-10037762600001', 'SPDKY88', 'EKA SUSILAWATI', '081253201097', '0', '1970-01-01', '-0.006270334112049175', '109.28985010832548', 'Jl. Komyos Sudarso Gg.Formula No.1', 'Rumah di depan No. 1 Gg. Formula Jl. Komyos Sudarso', '[]', NULL, '08.00-10.00', NULL, 'tidak ada no telp', '2018-04-03 05:33:01', '', 0),
(201, 'MYIR-10037791760001', 'SPRUD85', 'TRI HERDIANTI', '089530940291', '0', '2018-04-04', '-0.12316727837847725', '109.41023100167513', '4-Apr-2018 10:31|jl.adi sucipto gang hj.rasib no. 6 ds.arang limbung kota pontianak. / patokan dibel', 'Ada adik nya ybs stay dirumah', '[]', 1, '10.00-13.00', NULL, '05616712650', '2018-04-03 12:02:21', '', 0),
(202, 'MYIR-10037778510001', 'SPOCY93', 'MINARNI', '0856542786349', '0', '2018-04-03', '0.8953066', '108.9810759', '2018-04-04 08:00|Ratu Sepudak No.19|700270|WITEL \r\nJl. Pasar\r\n\r\nhttps://goo.gl/maps/UnESHd2cuRL2', 'Di depan Kantor Lurah Sungai Rasau', '[\"\\/data\\/storage\\/uploads\\/Li7att6MTK-1522762517.jpg\"]', 1, '13.00-15.00', NULL, '05624202160', '2018-04-03 13:35:22', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `kode_agency`
--

CREATE TABLE `kode_agency` (
  `id` int(3) NOT NULL,
  `id_agency` int(3) NOT NULL,
  `kode_agency` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kode_agency`
--

INSERT INTO `kode_agency` (`id`, `id_agency`, `kode_agency`) VALUES
(1, 3, 'G34'),
(2, 1, 'Afifnichi'),
(3, 4, 'kendali'),
(4, 1, 'rt');

-- --------------------------------------------------------

--
-- Table structure for table `points`
--

CREATE TABLE `points` (
  `id` int(3) NOT NULL,
  `sales_id` int(11) NOT NULL,
  `point` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `points`
--

INSERT INTO `points` (`id`, `sales_id`, `point`, `date`) VALUES
(1, 5, 29, '2018-04-01'),
(2, 113, 36, '2018-04-01'),
(3, 68, 13, '2018-04-01'),
(4, 58, 61, '2018-04-01'),
(5, 119, 43, '2018-04-01'),
(6, 128, 23, '2018-04-01'),
(7, 120, 8, '2018-04-01'),
(8, 73, 31, '2018-04-01'),
(9, 163, 12, '2018-04-01'),
(10, 80, 48, '2018-04-01'),
(11, 10, 27, '2018-04-01'),
(12, 29, 16, '2018-04-01'),
(13, 26, 15, '2018-04-01'),
(14, 69, 14, '2018-04-01'),
(15, 164, 10, '2018-04-01'),
(16, 20, 31, '2018-04-01'),
(17, 179, 15, '2018-04-01'),
(18, 127, 3, '2018-04-01'),
(19, 118, 97, '2018-04-01'),
(20, 108, 15, '2018-04-01'),
(21, 13, 18, '2018-04-01'),
(22, 52, 3, '2018-04-01'),
(23, 64, 4, '2018-04-01'),
(24, 90, 31, '2018-04-01'),
(25, 126, 6, '2018-04-01'),
(26, 77, 33, '2018-04-01'),
(27, 144, 291, '2018-04-01'),
(28, 32, 12, '2018-04-01'),
(29, 130, 3, '2018-04-01'),
(30, 11, 12, '2018-04-01'),
(31, 184, 41, '2018-04-01'),
(32, 205, 16, '2018-04-01'),
(33, 209, 19, '2018-04-01'),
(34, 95, 6, '2018-04-01'),
(35, 211, 10, '2018-04-01'),
(36, 41, 3, '2018-04-01'),
(37, 166, 15, '2018-04-01'),
(38, 81, 2, '2018-04-01'),
(39, 213, 76, '2018-04-01'),
(40, 160, 17, '2018-04-01'),
(41, 152, 9, '2018-04-01'),
(42, 165, 3, '2018-04-01');

-- --------------------------------------------------------

--
-- Table structure for table `regional`
--

CREATE TABLE `regional` (
  `id` int(3) NOT NULL,
  `regional` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `regional`
--

INSERT INTO `regional` (`id`, `regional`) VALUES
(1, '6'),
(2, '7');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int(3) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `ID_User` varchar(50) DEFAULT NULL,
  `no_hp` varchar(15) NOT NULL,
  `remember_token` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `regional` varchar(20) NOT NULL,
  `witel` varchar(50) NOT NULL,
  `datel` varchar(50) NOT NULL,
  `sto` varchar(50) NOT NULL,
  `agency` varchar(50) NOT NULL,
  `kode_agency` varchar(50) NOT NULL,
  `foto_profil` varchar(100) NOT NULL,
  `role` varchar(20) NOT NULL,
  `api_token` varchar(50) DEFAULT NULL,
  `device_id` varchar(50) DEFAULT NULL,
  `last_order_id` varchar(50) DEFAULT NULL,
  `no_ktp` varchar(50) NOT NULL,
  `tmp_lahir` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `no_rek` varchar(20) NOT NULL,
  `bank` varchar(50) NOT NULL,
  `nama_pemilik_bank` varchar(100) NOT NULL,
  `cabang_bank` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `nama`, `username`, `password`, `ID_User`, `no_hp`, `remember_token`, `created_at`, `updated_at`, `regional`, `witel`, `datel`, `sto`, `agency`, `kode_agency`, `foto_profil`, `role`, `api_token`, `device_id`, `last_order_id`, `no_ktp`, `tmp_lahir`, `tgl_lahir`, `alamat`, `no_rek`, `bank`, `nama_pemilik_bank`, `cabang_bank`) VALUES
(1, 'Joko Susanto', 'joko_sst', '$2y$10$Lt.8DdRYsCRYf4FxSSn4cOKkK5/QU7hNr9TX05Z8LqHUS9.FIEkxO', 'SPSBA88', '082255535084', '', '2018-03-16 08:54:17', '2018-04-13 07:07:56', '6', 'KALBAR', 'PONTIANAK', 'JAW', 'TELKOM', 'Afifnichi', '87f8428bedd15d5828181b197e654066.jpg', 'sales', NULL, NULL, NULL, '6171043105900012', 'pontianak', '2018-04-09', 'Jl. Khatulistiwa Gg. panca Bakti', '24124455', 'Mandiri', 'Joko Susanto', 'Tanjungpura'),
(4, 'cc', 'cc', '$2y$10$BSRW5Q367Wm6nB7sw23zxOR6pb9K47sOUEyWOE718Q2dnpWgBk8ja', 'SPAMT85', 'cc', '', '2018-03-21 03:34:01', '2018-03-21 03:34:01', '6', 'KALBAR', 'PONTIANAK', 'JAW', 'GFD', 'Afifnichi', 'default.png', 'sales', NULL, NULL, NULL, '', '', '0000-00-00', '', '', '', '', ''),
(5, 'Test', 'test', '$2y$10$HGu8/1O/kSVNuqbL7SfBouGmq9O4s85tfiqwDxnbvb8rRb48g0eQ6', 'SPAMAR9', '2123', '', '2018-03-20 03:04:37', '2018-04-12 06:23:37', '6', 'KALBAR', 'PONTIANAK', 'PTK', 'KOPEGTEL PONTIANAK', 'KPT2', 'wcNAgsmLn4-1522317320.jpg', 'sales', '9c9bdc427c8b6dbd303255957bf34d55976b2aae', '0e026de5-f207-4401-92c3-dd34b0e890dd', '4916096', '', '', '0000-00-00', '', '', '', '', ''),
(9, 'ACHMAD MULYADI', 'imoelptk78@gmail.com', '$2y$10$Ask5pXiWOXaX5hTFPSmNX.SRtiuLN2nfRhJikrH3vY4CNKVRvhEL6', 'SPMUL78', '+6282148677788', '', '2018-03-21 19:59:03', '2018-03-21 19:59:03', '6', 'KALBAR', 'PONTIANAK', 'PTK', 'CV. JASA WIRA PONTIANAK', 'JWP', 'default.png', 'sales', '62f34822f37939b4b8f1f35f1837428756809748', NULL, NULL, '', '', '0000-00-00', '', '', '', '', ''),
(10, 'AGUS MARTAMAN', 'agusmartaman@gmail.com', '$2y$10$2kMS137FNvtb9jBZEQUT6ecExhvE8lwELw4Yt8Gd9dPuzkAsmA9SK', 'SPAMT85', '+6285251845200', '', '2018-03-21 20:08:26', '2018-03-21 20:08:26', '6', 'KALBAR', 'PONTIANAK', 'PTK', 'CV. JASA WIRA PONTIANAK', 'JWP', 'DnzO2UcjZk-1522651748.jpg', 'sales', 'bd4637f435207fd6d28ed755d9e47e88f63dc423', '0edfaa21-29b3-44bb-b00e-d2fcd82e5941', '4916096', '', '', '0000-00-00', '', '', '', '', ''),
(11, 'AHMAD RIFALDI', 'rifaldiahmad2009@gmail.com', '$2y$10$XNLAKp4y2ugKeBtwlYEk5.qeold/E7luNYMb6ITN7WtENAESmNyai', 'SPRFL99', '083151792651', '', '2018-03-21 20:12:11', '2018-03-21 20:12:11', '6', 'KALBAR', 'PONTIANAK', 'PTK', 'CV. JASA WIRA PONTIANAK', 'JWP', '0LQTIetc6s-1524117956.jpg', 'sales', 'e08dde7e732a1a2eff6f9e49ffb678a6c7b4ba55', '86a63127-d7ec-4a2e-a27a-87e9741eb56e', '4916096', '', '', '0000-00-00', '', '', '', '', ''),
(12, 'ARSYAD', 'oppogalaxy999@gmail.com', '$2y$10$PPtvmXrkftAlDUPlU.fO3.S0hgdF.vobRkw.PAHgTcD/3XEKFr82a', 'SPARS70', '+62085102095766', '', '2018-03-21 20:14:27', '2018-03-21 20:14:27', '6', 'KALBAR', 'PONTIANAK', 'PTK', 'CV. JASA WIRA PONTIANAK', 'JWP', '0wcJTjAhsK-1522653434.jpg', 'sales', '0118459b62c96bc2fea7880307e4a35119052f29', '206985a0-2fc8-43fc-a1eb-e6fd641f3093', '4916096', '', '', '0000-00-00', '', '', '', '', ''),
(13, 'FAJAR RAHAGUNG', 'fa7ar_rockclimbing@yahoo.com', '$2y$10$HLsOGv01u0CCIH1uCNFlweMf/gK7wT6UDxytejgMJeFtL6Iffm4h2', 'SPFRA93', '082156641961', '', '2018-03-21 20:18:32', '2018-03-21 20:18:32', '6', 'KALBAR', 'PONTIANAK', 'PTK', 'CV. JASA WIRA PONTIANAK', 'JWP', 'default.png', 'sales', '10a4e6fc8b259196c97581e03a900cdd6a074654', NULL, NULL, '', '', '0000-00-00', '', '', '', '', ''),
(16, 'INDRA SULISTYO FARDILLA', 'indrasulistyof@gmail.com', '$2y$10$SN632OKIwGLjQJGmRdVo7.ARXj6xIVwYgHpoJkcf4IPHVzHYhq1/G', 'SPIND93', '+6285349106272', '', '2018-03-21 20:26:49', '2018-03-21 20:26:49', '6', 'KALBAR', 'PONTIANAK', 'PTK', 'CV. JASA WIRA PONTIANAK', 'JWP', 'G9AGqj62wQ-1523700849.jpg', 'sales', '9474dc47553094b4f9668175f8bd55268ce2d697', 'f3a7e4b2-ecec-46dc-8d4a-984c6f8643bf', '4916096', '', '', '0000-00-00', '', '', '', '', ''),
(17, 'MUHAMMAD SABRI', 'm.sabri.spm@gmail.com', '$2y$10$N8cDwXwUxO2L7QG2/K6plOrckpyP791sPt3zru2nK0Ul8BTcGSOxW', 'SPSBR72', '+6285106091700', '', '2018-03-21 20:32:11', '2018-03-21 20:32:11', '6', 'KALBAR', 'PONTIANAK', 'PTK', 'CV. JASA WIRA PONTIANAK', 'JWP', 'TPxfQJa0aE-1523588102.jpg', 'sales', '3f418d67792d3c45a4885e7030364a3883544dcd', '16dd7961-a1ec-41c2-b521-77cfa3f61507', '4916096', '', '', '0000-00-00', '', '', '', '', ''),
(18, 'NANANG MULYAGUS', 'nanang9abun@gmail.com', '$2y$10$VOGcREJdgH8dkK3XzC1Kpe56IaRZGtiEAU4Zf66v8fgj9uT8RyzYq', 'SPNNG75', '+6285103006273', '', '2018-03-21 20:33:28', '2018-03-21 20:33:28', '6', 'KALBAR', 'PONTIANAK', 'PTK', 'CV. JASA WIRA PONTIANAK', 'JWP', '7VqynxIYSh-1523316011.jpg', 'sales', 'bc4f866ec2da61d3c7540fec50c31b30dc4de2e0', 'eeba5554-bd57-4b3b-8745-bbb5b3fedd04', '4916096', '', '', '0000-00-00', '', '', '', '', ''),
(20, 'R.FIQRI RACHMANA', 'fiqri.rachmana981@gmail.com', '$2y$10$ech32e2g7PafLL9Ea5nhfubkEJhhVqIPXZFQNzrn/VWKa8BLk3J9K', 'SPFQR98', '089669685067', '', '2018-03-21 20:50:00', '2018-03-21 20:50:00', '6', 'KALBAR', 'PONTIANAK', 'PTK', 'CV. JASA WIRA PONTIANAK', 'JWP', 'oAXYnr3I6D-1522642587.jpg', 'sales', 'bbd77e543adb255229068c58011a8e02759ce511', 'ad083ff9-eacd-4f3e-a43b-7e5148265449', '4916096', '', '', '0000-00-00', '', '', '', '', ''),
(22, 'RINALDI AZHIMI', 'rinaldi4111@yahoo.com', '$2y$10$AT.jQ31GDen6WVHfbAS0iOP1WqJsKumRuWzUsJKSuS15P3zfD10xe', 'SPRND82', '085248087575', '', '2018-03-21 20:53:36', '2018-03-21 20:53:36', '6', 'KALBAR', 'MEMPAWAH', 'MPW', 'CV. JASA WIRA PONTIANAK', 'JWP', 'default.png', 'sales', '4b04882832d7c3143e54b550af0320fe0002ff3a', '368a7421-59be-4241-8078-f5b9c6458d5d', '4916096', '', '', '0000-00-00', '', '', '', '', ''),
(23, 'RM.TATANG HIDAYAT', 'tatanghidayat638@gmail.com', '$2y$10$u99JJiFaHPik0y/gFjNl8OiG2AM87PC7GulJjz3u4efTXEVGGC/3i', 'SPTTG73', '081257524787', '', '2018-03-21 20:58:44', '2018-03-21 20:58:44', '6', 'KALBAR', 'PONTIANAK', 'PTK', 'CV. JASA WIRA PONTIANAK', 'JWP', 'default.png', 'sales', '91cbcca92fbfc1149938bb863647f9fb3b591880', '1419f3df-1bce-429c-96fa-5435fd4dc7a4', '4916096', '', '', '0000-00-00', '', '', '', '', ''),
(24, 'SATRIA NURDIANSYAH', 'satrianurdiansyah@gmail.com', '$2y$10$3wjPe5bCzYhBfkoTvk7vleAWOVop6UucIb0Cbjggq1zjsVCEKO6Cy', 'SPSTN97', '085849860902', '', '2018-03-21 21:00:31', '2018-03-21 21:00:31', '6', 'KALBAR', 'PONTIANAK', 'PTK', 'CV. JASA WIRA PONTIANAK', 'JWP', 'default.png', 'sales', '1f20f5000590c0ad00d3b923747d23e8e53b05d5', NULL, NULL, '', '', '0000-00-00', '', '', '', '', ''),
(25, 'SURYANTO', 'indra_suryanto59@yahoo.com', '$2y$10$/0HZf/iqPtqRjXyuGBdWHuMjrFFUMnZTt/kLHcqq26Oh3j9CC5CSq', 'SPYAN59', '+6281345907070', '', '2018-03-21 21:02:09', '2018-03-21 21:02:09', '6', 'KALBAR', 'PONTIANAK', 'PTK', 'CV. JASA WIRA PONTIANAK', 'JWP', 'eOispGkHqP-1522645566.jpg', 'sales', '139562f39931e8a22beccb82605a2115674ca0f7', '1caadfd6-184e-4809-a259-94c6573d3cea', '4916096', '', '', '0000-00-00', '', '', '', '', ''),
(26, 'SUYATNO', 'justinthamson@gmail.com', '$2y$10$f.0X6PjzWA/8y.hS4h0RY.L5BLw8RZgn83AmrIPY9ax9Ir6RTaDze', 'SPSYT92', '+6282351670881', '', '2018-03-21 21:05:38', '2018-03-21 21:05:38', '6', 'KALBAR', 'PONTIANAK', 'PTK', 'CV. JASA WIRA PONTIANAK', 'JWP', 'default.png', 'sales', '0bce97d7e3f6894d0c838506aae428fdf73cab0f', NULL, NULL, '', '', '0000-00-00', '', '', '', '', ''),
(27, 'YANI ABDUL MALIK', 'thamyono@gmail.com', '$2y$10$ccfIp9QQxAPxzoDHOa3UU.WXZfw2dw7ELgntt/XUHJhRNqjJDgsG.', 'SPYAM66', '+6285107017703', '', '2018-03-21 21:16:13', '2018-03-21 21:16:13', '6', 'KALBAR', 'PONTIANAK', 'PTK', 'CV. JASA WIRA PONTIANAK', 'JWP', 'default.png', 'sales', 'a92a26efd4b4e2f637ff3bbcfb3f622d36f06561', '51aa63fa-07ed-4aec-a966-9726e4076365', '4916096', '', '', '0000-00-00', '', '', '', '', ''),
(28, 'YUSMAYA', 'maya888dopi@gmail.com', '$2y$10$fCZ0xgpclwrF6aT8NKYINuFjVCElEZaZlCsyZhz7Tkc4jCknWWp8G', 'SPYMY93', '081520435617', '', '2018-03-21 21:18:39', '2018-03-21 21:18:39', '6', 'KALBAR', 'PONTIANAK', 'PTK', 'CV. JASA WIRA PONTIANAK', 'JWP', 'default.png', 'sales', '92011c7d7bba9fd4a8c4c7de6b840f698c1e727a', '51aa63fa-07ed-4aec-a966-9726e4076365', '4916096', '', '', '0000-00-00', '', '', '', '', ''),
(29, 'SUYONO', 'Yonotham@gmail.com', '$2y$10$.UZ5t7UlYpDIk6YGnDA/LeZ6/XDcFG2.oVmUMkIjW5j39d1LhzV52', 'SPYNO88', '085252186507', '', '2018-03-21 21:22:10', '2018-03-21 21:22:10', '6', 'KALBAR', 'PONTIANAK', 'PTK', 'CV. JASA WIRA PONTIANAK', 'JWP', 'default.png', 'sales', '51f05d9f195449628be995dcf79a6a8fef68b8a3', 'c4fa2b74-a54c-49c7-8cd2-06ac7dc7f312', '4916096', '', '', '0000-00-00', '', '', '', '', ''),
(30, 'ADI JUMADI', 'adifikri866@gmail.com', '$2y$10$B2Ymz8Y/Kc43AcOACUmjReueVAWOvvAl5l1Mfucip0GeW0ZSnctLm', 'SPAJM92', '+6281258797914', '', '2018-03-21 21:25:55', '2018-03-21 21:25:55', '6', 'KALBAR', 'SINGKAWANG', 'SNW', 'KOPEGTEL PONTIANAK', 'KPT1', 'F5xcfeWv6h-1523455761.jpg', 'sales', '3b74c7a0949edd1608b13a3eb092a33e07667059', '9122357a-04ba-4230-8b17-d4f3b551eff1', '4916096', '', '', '0000-00-00', '', '', '', '', ''),
(31, 'AGUS NUGROHO', 'agusbwl28@gmail.com', '$2y$10$4H26w/5auLB16Gr7JJPRZefbe1./5SF7PJElZ850rIvAEqSmcC3dq', 'SPAGS84', '+6285252055797', '', '2018-03-21 21:32:11', '2018-03-21 21:32:11', '6', 'KALBAR', 'SINGKAWANG', 'SNW', 'KOPEGTEL PONTIANAK', 'KPT1', 'default.png', 'sales', '1190cfb2954fbf38322d36d26f1d86f2cdf0f3bd', '683c11c9-4558-4b2a-b031-0c7ee5870648', '4916096', '', '', '0000-00-00', '', '', '', '', ''),
(32, 'ANDRIE', 'dedspeed8@gmail.com', '$2y$10$mmJ76KmJlgYnUFGieqJWH.WBBc48r43hGKz.oBwPZKyytZQY9O9Bq', 'SPDDA85', '+628115661900', '', '2018-03-21 21:34:12', '2018-03-21 21:34:12', '6', 'KALBAR', 'SINGKAWANG', 'SNW', 'CV. JASA WIRA PONTIANAK', 'KPT1', 'default.png', 'sales', 'ba4321d7dba4189f3def838f9998d4a37b7f6ae0', '8e3b4df2-865f-4344-a23c-88940d872cec', '4916096', '', '', '0000-00-00', '', '', '', '', ''),
(33, 'AYUNARTI', 'Ayunarti88@gmail.com', '$2y$10$o2AX4dLL8txQTruHb.1Ca.U41ux530CnugQCfxESTuzbpDyFXAoQS', 'SPAYN89', '085652330444', '', '2018-03-21 21:35:57', '2018-03-21 21:35:57', '6', 'KALBAR', 'SINGKAWANG', 'SNW', 'KOPEGTEL PONTIANAK', 'KPT1', 'default.png', 'sales', 'bd4e1dc460558129ecf800a244e4cd63ccdd442f', NULL, NULL, '', '', '0000-00-00', '', '', '', '', ''),
(34, 'DESTA WAHYUDI', 'mobiledesta1@gmail.com', '$2y$10$prMa7hQAz.aKNzjVFAhwqOVi9SEDNzCK4x/BXDGDFFPtl0FM.u69G', 'SPDST98', '0895395843364', '', '2018-03-21 21:37:56', '2018-03-21 21:37:56', '6', 'KALBAR', 'PONTIANAK', 'PTK', 'KOPEGTEL PONTIANAK', 'KPT1', 'default.png', 'sales', 'f8d347eb379bb74fbe1d3b11a145d25c46c7c5cc', NULL, NULL, '', '', '0000-00-00', '', '', '', '', ''),
(35, 'DESY PURWANTI', 'winnie_choopie10@yahoo.co.id', '$2y$10$7XP7F/t/o5EuBMOuJmtsMu4nB35Ypw.50VnYhJvLMgKoaie9bYI8K', 'SPDSY92', '0813-4537-7092', '', '2018-03-21 21:39:36', '2018-03-21 21:39:36', '6', 'KALBAR', 'PONTIANAK', 'PTK', 'KOPEGTEL PONTIANAK', 'KPT1', 'qmUGsUtQEY-1523461420.jpg', 'sales', 'e1c89c683d5a0ef10300ded41bb96cfb31329a55', '53e2a6a9-8ea0-4e5b-a4d1-9c494b695967', '4916096', '', '', '0000-00-00', '', '', '', '', ''),
(37, 'HAZIZAH', 'azizah12655@gmail.com', '$2y$10$ooYQtEPDOIjjbp3rQl8OuOCfIuX4vh00dTvnb/Z762..3Wuo6YUUK', 'SPHZH95', '081351608921', '', '2018-03-22 00:26:46', '2018-03-22 00:26:46', '6', 'KALBAR', 'MEMPAWAH', 'MPW', 'KOPEGTEL PONTIANAK', 'kosong', 'default.png', 'sales', '5f8a2475c3d0b1e83aa84df462b55e21d382bbe8', NULL, NULL, '', '', '0000-00-00', '', '', '', '', ''),
(38, 'HERI SAFARI', 'safari.tel@gmail.com', '$2y$10$qV/jIFfRpQGXJPiV/QiGHuANkbXfs2lrzYlCAEbhTQDJxOpjOtKBu', 'SPHSF66', '+6281285916861', '', '2018-03-22 00:28:43', '2018-03-22 00:28:43', '6', 'KALBAR', 'PONTIANAK', 'PTK', 'KOPEGTEL PONTIANAK', 'KPT1', 'ODa4Az72gi-1522819907.jpg', 'sales', 'a8be29f54b75fe9cffcbe15a0bf56bd5326d4055', '4d203964-5c7c-44c6-b69f-6d0ad748bda7', '4916096', '', '', '0000-00-00', '', '', '', '', ''),
(39, 'INTAN FITRIA SARI', 'intanfs85@gmail.com', '$2y$10$BQxNttJM2NzvVjbulti4OelWAjBwVKD8348lV.FFW1qoVguGq3JwG', 'SPINT85', '+6289665326739', '', '2018-03-22 00:32:00', '2018-03-22 00:32:00', '6', 'KALBAR', 'MEMPAWAH', 'MPW', 'KOPEGTEL PONTIANAK', 'KPT1', 'default.png', 'sales', '15f6780af62cc17b1f58cf4234b00bb915f3f499', NULL, NULL, '', '', '0000-00-00', '', '', '', '', ''),
(40, 'JANUARIUS ASWIN KAMALO', 'j.kamalo@yahoo.com', '$2y$10$4yLUbkb0OA8wUGemKcy1iuY7kulYxP3UdYFzcI7r5vVWmuxFhaw0G', 'SPJWS97', '+6287818333443', '', '2018-03-22 00:33:47', '2018-03-22 00:33:47', '6', 'KALBAR', 'PONTIANAK', 'PTK', 'KOPEGTEL PONTIANAK', 'KPT1', 'R29bge5o3U-1523354378.jpg', 'sales', '75a2f098ef926b37fad0003eeaf3f96c6116b551', 'debd746a-b16d-4534-b4c0-aaef86c0ce30', '4916096', '', '', '0000-00-00', '', '', '', '', ''),
(41, 'JUNEWI', 'junewinawi@gmail.com', '$2y$10$MDQeuvtHdIezW6rrn1hF3OoZ8lmVDQW.Tb5SIyummMagxEQHCXgcq', 'SPJNW90', '082352746312', '', '2018-03-22 00:35:43', '2018-03-22 00:35:43', '6', 'KALBAR', 'PONTIANAK', 'PTK', 'KOPEGTEL PONTIANAK', 'KPT1', 'default.png', 'sales', 'e98cd99af28002f77d5e425e9826a24d83a4dd19', '549d5c2c-4010-4d05-a174-b1d2c297b5a1', '4916096', '', '', '0000-00-00', '', '', '', '', ''),
(42, 'NASRUN', 'anasrun66@gmail.com', '$2y$10$mQhKwwjlm9Fqmlh8I9M6TuBIhYqkvTsk4PeIrGRZr8nGTOr/2ErEu', 'SPNAS85', '+6289694142784', '', '2018-03-22 00:44:27', '2018-03-22 00:44:27', '6', 'KALBAR', 'SINGKAWANG', 'SNW', 'KOPEGTEL PONTIANAK', 'KPT1', 'default.png', 'sales', NULL, NULL, NULL, '', '', '0000-00-00', '', '', '', '', ''),
(43, 'NOVIA AWALIANA', 'noviaawaliana14@gmail.com', '$2y$10$nBY4NoHonY46KH6oE5S61OC1ZEPtOR40SwMi9rcivYdazSnNici0W', 'SPNVI93', '089693329396', '', '2018-03-22 01:01:50', '2018-03-22 01:01:50', '6', 'KALBAR', 'MEMPAWAH', 'MPW', 'KOPEGTEL PONTIANAK', 'KPT1', 'yvFgpc5Lop-1522984867.jpg', 'sales', '938803d68163dabc727eaf6e79be2f25ee45d08f', '186ffcdc-cdd5-4b8c-a712-ec4945242d3b', '4916096', '', '', '0000-00-00', '', '', '', '', ''),
(44, 'NOVIANDO', 'noviiando89@gmail.com', '$2y$10$5m94qFqJhsiWWbdFSQUvcOfhvN61Eb0Pg46QIDE9CzygROu5Nd/Ru', 'SPNVD89', '085787-852840', '', '2018-03-22 01:07:38', '2018-03-22 01:07:38', '6', 'KALBAR', 'PONTIANAK', 'PTK', 'KOPEGTEL PONTIANAK', 'KPT1', 'default.png', 'sales', '011d42b3eb809e627ab900d19d1d9e2561e87748', 'debd746a-b16d-4534-b4c0-aaef86c0ce30', '4916096', '', '', '0000-00-00', '', '', '', '', ''),
(45, 'NUR EKA SARI', 'sari0983@yahoo.com', '$2y$10$Bg/xuA61dai9quedzoTkc.KbrSWc7l8K2aXwftF/dlEz0jbJzDNTS', 'SPSAR83', '081256943853', '', '2018-03-22 01:14:51', '2018-03-22 01:14:51', '6', 'KALBAR', 'SINGKAWANG', 'SNW', 'KOPEGTEL PONTIANAK', 'kosong', '4Itg9cNaR5-1523520301.jpg', 'sales', '15d9fd3ec903348fa1e085c3586365d8692b6ef9', 'b321830f-8b00-4f6b-979c-f12807a4f1ba', '4916096', '', '', '0000-00-00', '', '', '', '', ''),
(46, 'OCHA HAYUBY', 'Ochahayuby78@gmail.com', '$2y$10$C.lyT/yrIrklQi4RjHE.reDNko3yrF2sU0Q4/QqC8kMrLrD/8ugrS', 'SPOCY93', 'Ochahayuby78@gm', '', '2018-03-22 01:17:14', '2018-03-22 01:17:14', '6', 'KALBAR', 'SINGKAWANG', 'SNW', 'KOPEGTEL PONTIANAK', 'KPT1', 'CoONLEA0w2-1522550003.jpg', 'sales', '36d865045c9521fb443f24fcacddfe5e0586e378', '7d897c64-9cab-426d-83c9-6b5697523a54', '4916096', '', '', '0000-00-00', '', '', '', '', ''),
(47, 'RACHMAT RUDINI', 'rudirude2906@gmail.com', '$2y$10$Lfdr4kk8Ho/KlOPudhDz..Xe7oblXzf5eyBWlqNaHiB2ph9pTt72.', 'SPRUD85', '085750156000', '', '2018-03-22 01:22:20', '2018-03-22 01:22:20', '6', 'KALBAR', 'PONTIANAK', 'PTK', 'KOPEGTEL PONTIANAK', 'KPT1', 'iFEgK36wZa-1522920828.jpg', 'sales', 'e75dd224469e8b6fffcb7747f1758c0659f54313', '55e970b2-0dc2-432c-91c6-a62bc603c4cf', '4916096', '', '', '0000-00-00', '', '', '', '', ''),
(48, 'RAUDHAH HILYAHSANI', 'ummubena50@gmail.com', '$2y$10$Du/Y6YcYonDVHtM2Yi6WQ.rwLSs3Sf/pa4fJSPgADugzgZnnM/U5K', 'SPRAU88', '081352322220', '', '2018-03-22 01:24:48', '2018-03-22 01:24:48', '6', 'KALBAR', 'PONTIANAK', 'PTK', 'KOPEGTEL PONTIANAK', 'KPT1', 'default.png', 'sales', 'a2f58916c8f837039731dc01daae68a69c81a50d', '570d916e-560f-4bc2-8b85-e3d0db31dae6', '4916096', '', '', '0000-00-00', '', '', '', '', ''),
(49, 'RUDI KURNIAWAN', 'rudikurniawan67@yahoo.co.id', '$2y$10$c91Tj1PIZMVKJIKwg8s.c.IlZEvdhEfWqMOXKM2wRY0hu8VmM2BVa', 'SPRDK67', '+628115739000', '', '2018-03-22 01:26:59', '2018-03-22 01:26:59', '6', 'KALBAR', 'PONTIANAK', 'PTK', 'KOPEGTEL PONTIANAK', 'KPT1', 'default.png', 'sales', NULL, NULL, NULL, '', '', '0000-00-00', '', '', '', '', ''),
(50, 'SUPARJONO', 'supar1979@gmail.com', '$2y$10$ekUpJWc2BMblyLdbUeIkouyHUvEHQZiURLowAxmJJa6UZ06r2kfX.', 'SPSPR79', '+6285391157917', '', '2018-03-22 01:30:07', '2018-03-22 01:30:07', '6', 'KALBAR', 'PONTIANAK', 'PTK', 'KOPEGTEL PONTIANAK', 'KPT1', 'DfHvC3fCA3-1523880389.jpg', 'sales', 'cc72e5745151191e315d51bc9e11299126b6704c', 'c56bbddd-840e-43ff-8597-94d12149f259', '4916096', '', '', '0000-00-00', '', '', '', '', ''),
(51, 'SUPRIADI', 'supri82@gmail.com', '$2y$10$bpzfQT/0tcyT6goaiuefAO8ljHQnJTRZD7XMJ.2ZYKYp3Jg3.281K', 'SPSPR82', '08565055443', '', '2018-03-22 01:34:15', '2018-03-22 01:34:15', '6', 'KALBAR', 'PONTIANAK', 'PTK', 'KOPEGTEL PONTIANAK', 'KPT1', 'default.png', 'sales', '0947d6439d45f596718c79e2a96a2524ddff3911', '352cd3ed-bf56-4431-ab80-7be19439011a', '4916096', '', '', '0000-00-00', '', '', '', '', ''),
(52, 'TOMI JULIANATA', 'zeinalfii@gmail.com', '$2y$10$wrMH3vce207jR.AhU0g1jO6Z8uZvYNOdyNW1D7kyrx4LZKQH387Sy', 'SPTMJ91', '08565055443', '', '2018-03-22 01:36:19', '2018-03-22 01:36:19', '6', 'KALBAR', 'PONTIANAK', 'PTK', 'KOPEGTEL PONTIANAK', 'KPT1', '594fofmFag-1524057284.jpg', 'sales', '38a9aa7d5d739e8c8a97b9db0ee2532d83d86d0d', NULL, NULL, '', '', '0000-00-00', '', '', '', '', ''),
(53, 'URAY HERNILASARI', 'mheinarty@gmail.com', '$2y$10$ij466TRl/IErO5wYCaOjseZdg0TwDvTBvAjPsMQlt.iTyIj0ZWUDa', 'SPURY90', '085109318888', '', '2018-03-22 01:38:18', '2018-03-22 01:38:18', '6', 'KALBAR', 'SINGKAWANG', 'SNW', 'KOPEGTEL PONTIANAK', 'KPT1', 'default.png', 'sales', '01bfb4531e428593ea80a645bea5ec3527aac9b5', '26d43cb5-7bf8-4429-b494-057b29e4c54c', '4916096', '', '', '0000-00-00', '', '', '', '', ''),
(55, 'MUHAMMAD AZMI', 'azmi101297@gmail.com', '$2y$10$gZFtvoWvzYlCbC7PT48qF.NsbJ84HpF4HOIchuErQGGpn4W7P/w6y', 'SPAZM97', '089693244518', '', '2018-03-22 01:43:28', '2018-03-22 01:43:28', '6', 'KALBAR', 'MEMPAWAH', 'MPW', 'KOPEGTEL PONTIANAK', 'KPT1', 'ZhqI6Eg1D1-1523234022.jpg', 'sales', '85c9b30046843f0697a559d70e75cd4c8f26db8d', '01ed3001-2494-49f4-b565-aab34ac97c2d', '4916096', '', '', '0000-00-00', '', '', '', '', ''),
(56, 'OVI OKTAVIA LABA', 'anggun12november@gmail.com', '$2y$10$iKkVnd/W.e/cJuVDOSXDKu3cjTiU7.qOakLhTs7VKN2P4SM4rwZv6', 'SPOVI78', '085251285503', '', '2018-03-22 01:46:20', '2018-03-22 01:46:20', '6', 'KALBAR', 'SINGKAWANG', 'SNW', 'KOPEGTEL PONTIANAK', 'KPT1', 'default.png', 'sales', '99ede7bb127e3bec172757649123b5471e333de3', '381ed9d2-fce1-4084-9eb2-1ec0b5d06449', '4916096', '', '', '0000-00-00', '', '', '', '', ''),
(57, 'RENALDI SURYA PRANATA', 'renaldisurya77@gmail.com', '$2y$10$uZu7Br5afjSPII5QhEmigumNObyluLXrUxqnayjJWU.FJfJ.ztPEm', 'SPREN77', '085787129867', '', '2018-03-22 01:47:34', '2018-03-22 01:47:34', '6', 'KALBAR', 'PONTIANAK', 'PTK', 'KOPEGTEL PONTIANAK', 'KPT1', 'default.png', 'sales', '3516aab5a98603727d68570048faad8302a388ad', '73f32f5d-6e6e-4579-b021-accdc464aa55', '4916096', '', '', '0000-00-00', '', '', '', '', ''),
(58, 'SATRIA BARLINA', 'satriabarlina88@gmail.com', '$2y$10$8JUxD4g7Xvhc0ktuy5uxwu/ZhNnFojS7pjcMtbv3b6aV8asS8fRrm', 'SPSBA88', '082150000097', '', '2018-03-22 01:49:31', '2018-03-22 01:49:31', '6', 'KALBAR', 'PONTIANAK', 'PTK', 'KOPEGTEL PONTIANAK', 'KPT1', 'UShNATeJIo-1523461989.jpg', 'sales', '8e5604c61a41c8c16bf4d0139fa277ee7c5c9364', '983a394f-ac48-493b-9cc8-d4ecd5f1f7af', '4916096', '', '', '0000-00-00', '', '', '', '', ''),
(60, 'VERRYANTO', 'athar771629@gmail.com', '$2y$10$aAabD.Ow7S6QTFoiEmTH4.aKZ7mXyeuYKMVyrGKZxAxBdf67.QkQC', 'SPVRY88', '085100096890', '', '2018-03-22 18:49:43', '2018-03-22 18:49:43', '6', 'KALBAR', 'PONTIANAK', 'PTK', 'KOPEGTEL PONTIANAK', 'KPT1', 'L3GvSiFDsF-1522818329.jpg', 'sales', '257cf99160af40679300fc1b5bfb7a319fabad00', 'debd746a-b16d-4534-b4c0-aaef86c0ce30', '4916096', '', '', '0000-00-00', '', '', '', '', ''),
(61, 'WAHYUDI', 'gilangwahyudhi.48@gmail.co.id', '$2y$10$VxMiDdzgnrek.gX5gWu3w.HXg3e9ZXyDei3AzaC5J6lWDlrqpsmrm', 'SPWYD85', '082155224053', '', '2018-03-22 18:59:27', '2018-03-22 18:59:27', '6', 'KALBAR', 'SINGKAWANG', 'BKY', 'KOPEGTEL PONTIANAK', 'KPT1', 'default.png', 'sales', 'bdf7f46e809ec762d0595106ac2d8e5accca34c1', NULL, NULL, '', '', '0000-00-00', '', '', '', '', ''),
(62, 'ABDUL RAUF', 'm.rauf8899@gmail.com', '$2y$10$lauF39YEjqdUKdfxBjuFuOHtdzcC1IKBmcLEd3HTgUb7bDhJzNDpi', 'SPRUF99', '08999515848', '', '2018-03-22 19:01:21', '2018-03-22 19:01:21', '6', 'KALBAR', 'PONTIANAK', 'PTK', 'KOPEGTEL PONTIANAK', 'KPT2', 'default.png', 'sales', NULL, NULL, NULL, '', '', '0000-00-00', '', '', '', '', ''),
(63, 'ADE MULYONO', 'ademulyono2006@gmail.com', '$2y$10$XBTB4LQT5UQD2YEyVkigTuMinhb/4QVlJdTvn8SPHigIDzo4U9Eo6', 'SPADM91', '089693297698', '', '2018-03-22 19:03:43', '2018-03-22 19:03:43', '6', 'KALBAR', 'PONTIANAK', 'PTK', 'KOPEGTEL PONTIANAK', 'KPT2', 'default.png', 'sales', 'c55fc228e6bf7e1a325dc2fd9894b159d0070072', NULL, NULL, '', '', '0000-00-00', '', '', '', '', ''),
(64, 'AGUS MAULANA', 'agusmini1996@gmail.com', '$2y$10$tOGUw/COhyAZo13MbhFzje.T0en6a5i1mhuuqr3HdHSn8QW70nsj6', 'SPAGL96', '085249729157', '', '2018-03-22 19:05:49', '2018-03-22 19:05:49', '6', 'KALBAR', 'PONTIANAK', 'PTK', 'KOPEGTEL PONTIANAK', 'KPT2', 'default.png', 'sales', '3adbf75c6043b559caf99f378578847d1e3afaf0', NULL, NULL, '', '', '0000-00-00', '', '', '', '', ''),
(65, 'ALIN CHANIAGO', 'alinchaniago692@gmail.com', '$2y$10$uuSLLDYTUwi/28n3Tttk5u1FERTk7bn27SV/lCiRbTXbfiIQtlvJ.', 'SPALC90', '081298822384', '', '2018-03-22 19:08:59', '2018-03-22 19:08:59', '6', 'KALBAR', 'PONTIANAK', 'PTK', 'KOPEGTEL PONTIANAK', 'KPT2', 'default.png', 'sales', '52d918f9908c9226dd2b0d1092831e060587cd4e', NULL, NULL, '', '', '0000-00-00', '', '', '', '', ''),
(66, 'BAGUS SANTOSO', 'santosob161@gmail.com', '$2y$10$RXoaSpW7dwFEVmyuyn75CuUfuzeH3uY0A3rIfhIJ5QHfPxAp0oc06', 'SPBGS94', '0895600445601', '', '2018-03-22 19:14:22', '2018-03-22 19:14:22', '6', 'KALBAR', 'PONTIANAK', 'PTK', 'KOPEGTEL PONTIANAK', 'KPT2', '2QMghUylsq-1523036115.jpg', 'sales', 'e1c3e3e430436fe1285eb2b289ab3d329c2211e5', '115772b8-df38-4f49-a994-9aef153f708a', '4916096', '', '', '0000-00-00', '', '', '', '', ''),
(67, 'DEBI MARIANSYAH', 'dhebipandawa672@gmail.com', '$2y$10$wynq0sX8TQMvpPmzPnfMh.nwEtqY0ByBdifVouvAW/kHY6yffwsYi', 'SPDBM84', '081276375186', '', '2018-03-22 19:16:25', '2018-03-22 19:16:25', '6', 'KALBAR', 'PONTIANAK', 'PTK', 'KOPEGTEL PONTIANAK', 'KPT2', 'default.png', 'sales', '46c92af7481e32dbcfa56fec5a95d95f0a93c795', NULL, NULL, '', '', '0000-00-00', '', '', '', '', ''),
(68, 'DICKY SAPUTRA', 'dicky16saputra@gmail.com', '$2y$10$UDAKKX0ddZKKBohIfCpbuOI1rjXiiOK3BMPI0hALq1niPLR0geNX2', 'SPDKY88', '082153845022', '', '2018-03-22 19:18:11', '2018-03-22 19:18:11', '6', 'KALBAR', 'PONTIANAK', 'PTK', 'KOPEGTEL PONTIANAK', 'KPT2', 'default.png', 'sales', '8108b952eb834c1f5a195ea289594a245ad98fd0', 'b2a34d15-f1e2-4724-81bb-fdb155772f95', '4916096', '', '', '0000-00-00', '', '', '', '', ''),
(69, 'HAMDANI', 'dhanikeren79@gmail.com', '$2y$10$ZS7oTr.o8jp2RF7aPuj8cO3vpfoXAKx0Rdbkar.U3ytvJ1DIWroG.', 'SPHDI79', '+6285245230777', '', '2018-03-22 19:20:53', '2018-03-22 19:20:53', '6', 'KALBAR', 'PONTIANAK', 'PTK', 'KOPEGTEL PONTIANAK', 'KPT2', 'q42PIsa1I2-1522564798.jpg', 'sales', 'af73e38ae173fc5180932863e2bfd0925ccab024', '5f9e6fd2-e37b-40de-80c8-8f898f5cb683', '4916096', '', '', '0000-00-00', '', '', '', '', ''),
(70, 'HARRIS TRIANA', 'aistrianalisa@gmail.com', '$2y$10$14NhzuaeNW9KUm2vEEETxO4GbODVjgsAuZCMUt.32RAQIZqeNTXjC', 'SPRSI90', '085245866250', '', '2018-03-22 19:23:40', '2018-03-22 19:23:40', '6', 'KALBAR', 'PONTIANAK', 'PTK', 'KOPEGTEL PONTIANAK', 'KPT2', 'default.png', 'sales', 'c584b22fa332d9475ef2611121fe6eb0cc580d3e', '73f32f5d-6e6e-4579-b021-accdc464aa55', '4916096', '', '', '0000-00-00', '', '', '', '', ''),
(71, 'IMAM SAPUTRA', 'Saputraimam48@gmail.com', '$2y$10$kEwyJ2yPiksPhan98IZo1u2Wlej.wCrQsc4CjtUADnnJa74NNMVyq', 'SPIMS95', '089646438527', '', '2018-03-22 19:25:00', '2018-03-22 19:25:00', '6', 'KALBAR', 'PONTIANAK', 'PTK', 'KOPEGTEL PONTIANAK', 'KPT2', 'default.png', 'sales', NULL, NULL, NULL, '', '', '0000-00-00', '', '', '', '', ''),
(72, 'MUHAMMAD ILHAM', 'sibenk12@gmail.com', '$2y$10$E6wiwtKG.BlMgzul79YWv.ISBQTy028YpbYPDivMESVVvE88Qu0QC', 'SPMIH93', '081254992234', '', '2018-03-22 19:29:44', '2018-03-22 19:29:44', '6', 'KALBAR', 'PONTIANAK', 'PTK', 'KOPEGTEL PONTIANAK', 'KPT2', 'default.png', 'sales', 'e3090a9ac1d9e01629ebf9a2d1ed370c299c4c1d', NULL, NULL, '', '', '0000-00-00', '', '', '', '', ''),
(73, 'MUHARDI BUJANG', 'ardi_thegel@yahoo.com', '$2y$10$KHxxcxnXw.ydRAtIkm6zfeVAVw45bkdbFoJmK6ejhr6PPase5N3uO', 'SPARD86', '+628115787765', '', '2018-03-22 19:34:03', '2018-03-22 19:34:03', '6', 'KALBAR', 'PONTIANAK', 'PTK', 'KOPEGTEL PONTIANAK', 'KPT2', 'Vda4I3dpSf-1522552069.jpg', 'sales', '3d64ff30a2c5e8a1aba086fc2ca356c03137cfaa', '5a71b9fd-1798-4901-8c0a-7a748a4afa3d', '4916096', '', '', '0000-00-00', '', '', '', '', ''),
(74, 'REZA KUMAKAU', 'rezanovember26@gmail.com', '$2y$10$m9o/OI.qsEqnil7T/7l/iODYcsGr8vXJzmESQnwHTikBpru4aahpy', 'SPRZA89', '+6281258502212', '', '2018-03-22 19:36:44', '2018-03-22 19:36:44', '6', 'KALBAR', 'PONTIANAK', 'PTK', 'KOPEGTEL PONTIANAK', 'KPT2', 'default.png', 'sales', 'e20987d94df4b9e38a610a69479f352016a7be82', 'c882c39e-b509-4d00-b070-fda1acc2ebdf', '4916096', '', '', '0000-00-00', '', '', '', '', ''),
(75, 'RIAN ARDI', 'rian44419@gmail.com', '$2y$10$mVr.LdHBsapOxYC56sAqw.cDbbBto5zNq7GZboSG/M4VSu5FdbPv.', 'SPRNR99', '089667902902', '', '2018-03-22 19:41:05', '2018-03-22 19:41:05', '6', 'KALBAR', 'PONTIANAK', 'PTK', 'KOPEGTEL PONTIANAK', 'KPT2', 'default.png', 'sales', NULL, NULL, NULL, '', '', '0000-00-00', '', '', '', '', ''),
(76, 'RIZKI', 'rizki.m.e14@gmail.com', '$2y$10$z6Pn.3suindXsEmHrA5I3.ZnJWblyO1SvNyOpiPsRyQfRpkJLMwVW', 'SPRME91', '082148024702', '', '2018-03-22 19:46:04', '2018-03-22 19:46:04', '6', 'KALBAR', 'PONTIANAK', 'PTK', 'KOPEGTEL PONTIANAK', 'KPT2', 'default.png', 'sales', NULL, NULL, NULL, '', '', '0000-00-00', '', '', '', '', ''),
(77, 'RULIANDI', 'ruliandi39@yahoo.com', '$2y$10$J3JsVVYjAyRv3hPzEhrRzOvvrooIheTjipVxPQSPaBH495wMrEza2', 'SPRLY91', '+6281253944102', '', '2018-03-22 19:48:10', '2018-03-22 19:48:10', '6', 'KALBAR', 'PONTIANAK', 'PTK', 'KOPEGTEL PONTIANAK', 'KPT2', 'fQVuLzd6KG-1523291915.jpg', 'sales', '172117d414b408b83672e5341213803251460080', '204b0efa-7aae-42bc-80df-012af7d1e6e1', '4916096', '', '', '0000-00-00', '', '', '', '', ''),
(78, 'TAUPIQ DARMAWAN', 'taufiqdarmawan5@gmail.com', '$2y$10$KoRlTBWUWVuPhfOsbYLPTOhfv/ExBUXI0TtNPveBSTjBGU3WmXfQm', 'SPTPQ94', '089694298346', '', '2018-03-22 19:49:24', '2018-03-22 19:49:24', '6', 'KALBAR', 'PONTIANAK', 'PTK', 'KOPEGTEL PONTIANAK', 'KPT2', 'default.png', 'sales', 'e3d1c3fefd66926c6b1ab95ff6edf49c5ec1ba11', '754b8057-3649-409f-ae79-165e60fff11a', '4916096', '', '', '0000-00-00', '', '', '', '', ''),
(79, 'TRI FADLI', 'trifadli04@yahoo.com', '$2y$10$/wWXcXhBaAkE5sdBtXCzr.HTebXXgOknsL8NGvKePfIKJjYoy2RPG', 'SPTRI94', '08990316672', '', '2018-03-22 19:51:33', '2018-03-22 19:51:33', '6', 'KALBAR', 'PONTIANAK', 'PTK', 'KOPEGTEL PONTIANAK', 'KPT2', 'default.png', 'sales', '55f0010a5bfac7cb8219e8256ee251d87aa4ecab', 'a224767d-713f-47b1-ac03-3e2548a32659', '4916096', '', '', '0000-00-00', '', '', '', '', ''),
(80, 'MUHAMMAD SAIDILLAH', 'm.saidillah@yahoo.com', '$2y$10$5GbBz32YVye89z6vTGwgouctGOKDi3lLiIYCuG0HVL3ZiBVhbzhwy', 'SPSAI88', '085245866250', '', '2018-03-22 19:52:52', '2018-03-22 19:52:52', '6', 'KALBAR', 'PONTIANAK', 'PTK', 'KOPEGTEL PONTIANAK', 'KPT2', 'P8woLeHINQ-1523632526.jpg', 'sales', 'e03e7f18639b02af4bb5e88fb9a1e4e04d3fc4e4', 'b16276bf-5135-488e-b5dc-765f5b35dfac', '4916096', '', '', '0000-00-00', '', '', '', '', ''),
(81, 'VIVI PURNAMAWATI', 'alpratama001@gmail.com', '$2y$10$sQM/Q6ABtMab1LNhd1Le/eABajetg37j8kNv6UmcD8aMm5xN7eXWy', 'SPVVP95', '081351952535', '', '2018-03-22 19:54:09', '2018-03-22 19:54:09', '6', 'KALBAR', 'PONTIANAK', 'PTK', 'KOPEGTEL PONTIANAK', 'KPT2', 'default.png', 'sales', '1d79c1f7c0fd3328047c92b887f5391a004a0ad0', NULL, NULL, '', '', '0000-00-00', '', '', '', '', ''),
(82, 'VIVI PURNAMAWATI', 'alpratama001@gmail.com', '$2y$10$MWrU2/TnW9T9GjxffZMx3e344q6Qz2LU60WM5WVwWYob/RNVz3Ac.', 'SPVVP95', '081351952535', '', '2018-03-22 19:54:10', '2018-03-22 19:54:10', '6', 'KALBAR', 'PONTIANAK', 'PTK', 'KOPEGTEL PONTIANAK', 'KPT2', 'default.png', 'sales', NULL, NULL, NULL, '', '', '0000-00-00', '', '', '', '', ''),
(84, 'BAIHAQI', 'baihakibai20@gmail.com', '$2y$10$Q0pYA.hQukImwkQ3jCbmUupwmanYSlfqv9qkP9dBbY0YohR.acl1K', 'SPBHQ89', '082354535052', '', '2018-03-22 20:01:33', '2018-03-22 21:17:17', '6', 'KALBAR', 'KETAPANG', 'KTP', 'KOPEGTEL PONTIANAK', 'KPT3', 'default.png', 'sales', NULL, NULL, NULL, '', '', '0000-00-00', '', '', '', '', ''),
(86, 'ABDUL WAFID', 'wafidfsc@gmail.com', '$2y$10$n5ztzDYWmJKM1z8wETjTtOTnDOLwBs3bor1lfLXogWsFtAim/MjKq', 'SPAWF81', '081256713456', '', '2018-03-22 20:06:38', '2018-03-22 20:06:38', '6', 'KALBAR', 'KETAPANG', 'KTP', 'KOPEGTEL PONTIANAK', 'KPT3', 'default.png', 'sales', '1a36a8fcfc19535445dd39a1d106763a34aac333', NULL, NULL, '', '', '0000-00-00', '', '', '', '', ''),
(87, 'HENDRO WAHYU FERBRUWANTORO', '130Y.85@gmail.com', '$2y$10$Fc7T2GwERHTlLcHi3P3g5uOJ3prYZCBThIwrPCHvmoaZa3g5zlt1u', 'SPHWF85', '081345916463', '', '2018-03-22 20:08:40', '2018-03-22 20:08:40', '6', 'KALBAR', 'SINTANG', 'STG', 'KOPEGTEL PONTIANAK', 'KPT3', '9WZ1eE4gqN-1522622866.jpg', 'sales', 'b8c17ee75d4140ff26f3bd5d6655e3f10f203fc0', NULL, NULL, '', '', '0000-00-00', '', '', '', '', ''),
(88, 'IIN TAJUIN', 'juinyenny15januari@gmail.com', '$2y$10$HMUjqbetQsWtKGd0lo7jfewBxuMTIkO0.SGOCyxOS38YNK7tuiFKS', 'SPJUN75', '+6282255579059', '', '2018-03-22 20:10:59', '2018-03-22 20:10:59', '6', 'KALBAR', 'SINTANG', 'STG', 'KOPEGTEL PONTIANAK', 'KPT3', 'default.png', 'sales', 'f7a158fa8f689663f3e632c74a9bbc945d37737e', NULL, NULL, '', '', '0000-00-00', '', '', '', '', ''),
(89, 'IQBAL SEPTIAN NUGRAHA', 'septianiqbal93@gmail.com', '$2y$10$qsE8joo/AUZPOLI4MYS8t.wxJIbtRWz/GpuMd1plAB/MhHNNwXT16', 'SPISN94', '082254933937', '', '2018-03-22 20:12:25', '2018-03-22 20:12:25', '6', 'KALBAR', 'KETAPANG', 'KTP', 'KOPEGTEL PONTIANAK', 'KPT3', 'default.png', 'sales', '36b3735ac26bc98c0224ecaa246dae5dec43b3d1', NULL, NULL, '', '', '0000-00-00', '', '', '', '', ''),
(90, 'JAKA SUHENDRO', 'cikaci72@gmail.com', '$2y$10$QrNzAe6SrrupU1HZvs4fg.ss3Huwnw0F2P5PbLopF6XaFF/oI1Zhu', 'SPJKS92', '0858 4986 9392', '', '2018-03-22 20:13:44', '2018-03-22 20:13:44', '6', 'KALBAR', 'SINTANG', 'STG', 'KOPEGTEL PONTIANAK', 'KPT3', 'fhrEyBszbE-1523422988.jpg', 'sales', 'b2e256aee5de96ad764589de0476ed2497158435', '7151c1cd-0088-4157-a8fb-3ed5145a06b6', '4916096', '', '', '0000-00-00', '', '', '', '', ''),
(91, 'JAYANTI', 'jayanti260624@gmail.com', '$2y$10$35.s3iij0xbiGkPAJx1mDuxRjkfCcdE0SzHPB5N7uSVjJpT.W1S.6', 'SPJYT98', '089676643215', '', '2018-03-22 20:15:19', '2018-03-22 20:15:19', '6', 'KALBAR', 'KETAPANG', 'KTP', 'KOPEGTEL PONTIANAK', 'KPT3', 'default.png', 'sales', '3e0cbb208fc83a0bd82ee622073484fee6fd0b82', NULL, NULL, '', '', '0000-00-00', '', '', '', '', ''),
(93, 'LIA WAHYUNI', 'wahyunilia98@yahoo.com', '$2y$10$A1D0niEWQkTU3lHYiC/PbOV2cVd45dgUXG9JZtc7BXUuws9wDgr5q', 'SPLWI99', '089625310392', '', '2018-03-22 20:18:21', '2018-03-22 20:18:21', '6', 'KALBAR', 'SANGGAU', 'SGU', 'KOPEGTEL PONTIANAK', 'KPT3', 'default.png', 'sales', NULL, NULL, NULL, '', '', '0000-00-00', '', '', '', '', ''),
(94, 'MELLY SUSANTI', 'melly.susanti@gmail.com', '$2y$10$jnBP/eQO2Suw2CQGAOZtV.kqA2rngFfE2rjcp54JD8p2nvqG6rcXi', 'SPSSI90', '082251899988', '', '2018-03-22 20:35:48', '2018-03-22 20:35:48', '6', 'KALBAR', 'KETAPANG', 'KTP', 'KOPEGTEL PONTIANAK', 'KPT3', 'default.png', 'sales', '60caa553fca4dc642589e3ae700016820f37cf8f', 'de1920cc-8463-40a9-a062-e44b59d55133', '4916096', '', '', '0000-00-00', '', '', '', '', ''),
(95, 'MUHAMAD SOLIHIN', 'Lihinbuy@gmail.com', '$2y$10$p7lIeUIeZHHmYKil/lb3Wu.kEIqgeraKGMpKOeDaQbknbBPHfF7D6', 'SPMSI97', '0895368596714', '', '2018-03-22 20:40:02', '2018-04-13 08:11:26', '6', 'KALBAR', 'SANGGAU', 'SGU', 'KOPEGTEL PONTIANAK', 'KPT3', 'default.png', 'sales', 'bf83a24c38c7e12e494da800d02950d5b74b0a8f', 'd2cbae8f-b8d2-4bf9-94ff-7d1d4f7662fc', '4916096', '', '', '0000-00-00', '', '', '', '', ''),
(97, 'MULYADI', 'tkjcool.ktp@gmail.com', '$2y$10$qorIWIq9CSD6Hj5uqHrs3e/Ug.R2vpQlt5UoQjC0507KYqtZjCDPm', 'SPMLY91', '089693250851', '', '2018-03-22 20:43:15', '2018-03-22 20:43:15', '6', 'KALBAR', 'KETAPANG', 'KTP', 'KOPEGTEL PONTIANAK', 'KPT3', 'default.png', 'sales', '788849eebc4d86378288238535c3f167355142f9', 'a76c8ec1-6912-45f2-85a9-a1471ceb4bd7', '4916096', '', '', '0000-00-00', '', '', '', '', ''),
(99, 'NURMANITA', 'nitanurma450@yahoo.com', '$2y$10$Kt4XhSNpbjpITmddcywmbuthM4uEA2BKtiGAyPy6nXmqz6LpMvo8e', 'SPNRM89', '081250000255', '', '2018-03-22 20:46:59', '2018-03-22 20:46:59', '6', 'KALBAR', 'KETAPANG', 'KTP', 'KOPEGTEL PONTIANAK', 'KPT3', 'default.png', 'sales', NULL, NULL, NULL, '', '', '0000-00-00', '', '', '', '', ''),
(100, 'OKTAVIANUS ESA PRATAMA', 'Yuniskw46@gmail.com', '$2y$10$7jUH5EJH.kHA9AZ68HzdkefZm02YTh6wKtP/mmXpYDGwqaduQSu4a', 'SPEPO98', '085750906259', '', '2018-03-22 20:48:11', '2018-03-22 20:48:11', '6', 'KALBAR', 'SINTANG', 'STG', 'KOPEGTEL PONTIANAK', 'KPT3', 'default.png', 'sales', NULL, NULL, NULL, '', '', '0000-00-00', '', '', '', '', ''),
(102, 'RAHMAD YUDA', 'rahmadyuda96@gmail.com', '$2y$10$aIGZf.7CAfNKzanXBFYCju1aCYppL2vKXBYQvVHWnle/Vl2v1Vl2e', 'SPYDA96', '+6285245463332', '', '2018-03-22 20:50:45', '2018-03-22 20:50:45', '6', 'KALBAR', 'SANGGAU', 'SGU', 'KOPEGTEL PONTIANAK', 'KPT3', 'default.png', 'sales', '8cfb07239f77ffaa4ea0b26b0b829a408b01e610', NULL, NULL, '', '', '0000-00-00', '', '', '', '', ''),
(103, 'RAJANI', 'Abuyani009@gmail.com', '$2y$10$Y5OCgkzUty1SmLEHEHLf9eDqR8C8Breqb9b4mVxAAhNlF8BSk4RAm', 'SPRJN80', '085245144852', '', '2018-03-22 20:52:11', '2018-03-22 20:52:11', '6', 'KALBAR', 'KETAPANG', 'KTP', 'KOPEGTEL PONTIANAK', 'KPT3', 'default.png', 'sales', 'b9b9ab9a1a8861e0752954eacb882dccf8b704df', '23f60580-880a-4976-bcb0-7d3622c14eb5', '4916096', '', '', '0000-00-00', '', '', '', '', ''),
(104, 'RENNI MARYATI', 'maryatir3nny@gmail.co.id', '$2y$10$v9AqfxSGM4P2RxAWLfrTpej.hC5R26u/v.KdEzYqVGcMfkLbxH1py', 'SPRNM87', '0821 5423 4471', '', '2018-03-22 20:56:49', '2018-03-22 20:56:49', '6', 'KALBAR', 'SINTANG', 'STG', 'KOPEGTEL PONTIANAK', 'KPT3', 'nde7hSjZ6K-1523006137.jpg', 'sales', '957b8a586a9afdcf005de7d9f84fdc521fb7802c', NULL, NULL, '', '', '0000-00-00', '', '', '', '', ''),
(105, 'RIAN PANDAPOTAN SILALAHI', 'rianpandapotans@yahoo.com', '$2y$10$3KkYhTJgOf9Huxx1P5z7lOoNJBRPhfzeWpXgPY7pAi6ZAbmdijFxe', 'SPRPD97', '0895-350740041', '', '2018-03-22 20:58:19', '2018-03-22 20:58:19', '6', 'KALBAR', 'SANGGAU', 'SGU', 'KOPEGTEL PONTIANAK', 'KPT3', 'default.png', 'sales', 'c5c0557b6da34c08e6bf7efe893ff6257daf309e', '22777e74-28bb-483a-9431-eeb74aec201b', '4916096', '', '', '0000-00-00', '', '', '', '', ''),
(107, 'SUKARDI', 'sukardi.jambi1970@gmail.com', '$2y$10$6WlFoAB6DZ99gNoZvsgIs.xRyLbetUxQjEArcQiFoqlybg34GF1sO', 'SPSKD70', '081345384009', '', '2018-03-22 21:01:45', '2018-03-22 21:01:45', '6', 'KALBAR', 'SINTANG', 'STG', 'KOPEGTEL PONTIANAK', 'KPT3', 'default.png', 'sales', 'e3006bf9e13c0c889e36b766c13fec7ec19dd219', NULL, NULL, '', '', '0000-00-00', '', '', '', '', ''),
(108, 'TERI SUTRISNO', 'agentterry@protonmail.com', '$2y$10$H9FdupmIH5H2fwXs35n1QOEG5zrVnW4gvomhl507dI3LDBojdZIc6', 'SPTSN91', '0811882120', '', '2018-03-22 21:03:18', '2018-03-22 21:03:18', '6', 'KALBAR', 'SINTANG', 'STG', 'KOPEGTEL PONTIANAK', 'KPT3', 'LF9XQ6oitW-1524046981.jpg', 'sales', '25f9084b6bb4e537522a1aed37763cee0394a9c9', '2e59db64-5e6e-4b21-b226-b2ac18dbaf7c', '4916096', '', '', '0000-00-00', '', '', '', '', ''),
(109, 'TINI OKVIARTY', 'Oviartytini@gmail.com', '$2y$10$bIFdDlsCfI1YL0yNyFxvbe6XPz6Xh1Hq80Hd7maVQdR/zfYs0XRuW', 'SPTNO98', '0895383017005', '', '2018-03-22 21:06:00', '2018-03-22 21:06:00', '6', 'KALBAR', 'KETAPANG', 'KTP', 'KOPEGTEL PONTIANAK', 'KPT3', 'default.png', 'sales', 'c99f680d8301c571dffeb5cd6f3d4328d833df7c', NULL, NULL, '', '', '0000-00-00', '', '', '', '', ''),
(110, 'VIVIN RAHMAWATI', 'Teguh.sylvawan26@gmail.com', '$2y$10$lQZnc2ttHTLuDmV9t62qFOa537nQ1ARq06I495Qw5/HkRqR33eiWm', 'SPVVN88', '085245353204', '', '2018-03-22 21:08:06', '2018-03-22 21:08:06', '6', 'KALBAR', 'SINTANG', 'STG', 'KOPEGTEL PONTIANAK', 'KPT3', 'default.png', 'sales', NULL, NULL, NULL, '', '', '0000-00-00', '', '', '', '', ''),
(117, 'MUHAMMAD ANGGARA YUDA PRATAMA', 'anggasmanta@gmail.com', '$2y$10$6MNYG5fzg931my1MPSKrpe/E5URBhN06Jm6jVD5cpQHLVq4Msy.pO', 'SPANG97', '0821-4804-7311', '', '2018-03-25 18:49:42', '2018-03-25 18:49:42', '6', 'KALBAR', 'KETAPANG', 'KTP', 'KOPEGTEL PONTIANAK', 'KPT3', 'default.png', 'sales', '1b0e04a27d1f2111529bd4bed4c066e05f005947', NULL, NULL, '', '', '0000-00-00', '', '', '', '', ''),
(118, 'I KOMANG NEDI Y.B', 'komangnedi@gmail.com', '$2y$10$J6DQG.KbNqQuBXqI3krtaedH6.IunryT7K1e9iK6kLq1T5yl2jXZ6', 'SPNGY91', '+6285750291546', '', '2018-03-25 20:16:41', '2018-03-25 20:16:41', '6', 'KALBAR', 'PONTIANAK', 'PTK', 'CV. JASA WIRA PONTIANAK', 'JWP', '7VqzNTX9bn-1523615524.jpg', 'sales', '13d5890633c18d39fc82f4e74526076ee572f486', '024f1470-8f2f-437e-9497-b8744d6a1976', '4913520', '', '', '0000-00-00', '', '', '', '', ''),
(119, 'RAMDANI', 'ramdani27@yahoo.com', '$2y$10$QveOoQb.9tLKtJz16QJRvuUFirNPz2V5LsNm8pW61OgOL9SO7Yk2y', 'SPAIN88', '+6281351439163', '', '2018-03-25 20:24:38', '2018-03-25 20:24:38', '6', 'KALBAR', 'MEMPAWAH', 'MPW', 'CV. JASA WIRA PONTIANAK', 'JWP', '8vt2x1lADQ-1522859931.jpg', 'sales', 'c970f4dd75c5d2817bacb0ade73fa5ae53d000fb', 'e37ec652-fd92-43f5-8425-acf7a580a51b', '4913520', '', '', '0000-00-00', '', '', '', '', ''),
(120, 'AWWALLUDIN', 'awalludinsaja92@gmail.com', '$2y$10$0jy.18bM12nGn6AnCws5c..TK1Q2KeWHhJhabhTfG6NhPqLqe8ma2', 'SPAWW92', '08125867647', '', '2018-03-26 01:12:42', '2018-03-26 01:12:42', '6', 'KALBAR', 'KETAPANG', 'KTP', 'KOPEGTEL PONTIANAK', 'KPT3', 'VJkyZDawN3-1522679918.jpg', 'sales', 'ea36f0ad2a751fffe1206470d2d629fc7705c89d', 'ddfa2989-7569-489c-b878-44113214fc4e', '4913520', '', '', '0000-00-00', '', '', '', '', ''),
(121, 'ERA NOVITASARI', 'eranovitasari.trk@gmail.com', '$2y$10$nIHr0xS21fB3FhGxot3UmOUUja/uWy23wg7llE/tErkOVf6abgXMa', 'SPARE96', '08115375525', '', '2018-03-26 05:11:54', '2018-03-26 05:11:54', '6', 'KALTARA', 'TARAKAN', 'TRK', 'KOPEGTEL BALIKPAPAN', 'KBP', 'default.png', 'sales', 'a87da395f9dddb1a963fd35bca3e52ce72d54432', NULL, NULL, '', '', '0000-00-00', '', '', '', '', ''),
(122, 'PUTRI WULANDARI', 'putriw445@gmail.com', '$2y$10$VuU5EzcUYCOOf2zwVRqdze06NiHDS0sFUf4WzTTK2KtkHbc6CXGp.', 'SPPTR94', '082252766866', '', '2018-03-26 05:11:57', '2018-03-26 05:11:57', '6', 'KALBAR', 'KETAPANG', 'KTP', 'KOPEGTEL PONTIANAK', 'KPT3', 'default.png', 'sales', 'af991bfd9e7254058a767e6c06a77d56e0cc9a46', NULL, NULL, '', '', '0000-00-00', '', '', '', '', ''),
(123, 'DIANA SARI', 'dianasari.trk@amail.club', '$2y$10$1aMxifGFsWGeCI6M8UeTm./OYAi7Qjfg.lQonfT7BdjxhXXrBlZWW', 'SPDRI97', '081348584266', '', '2018-03-26 05:14:04', '2018-03-26 05:14:04', '6', 'KALTARA', 'TARAKAN', 'TRK', 'KOPEGTEL BALIKPAPAN', 'KBP', 'GG7Ze8LKgi-1523421476.jpg', 'sales', 'e211b265b8a2293cab30914cfae061959e3f3547', '10b02fed-6f90-4d52-8b34-295b49b060c8', NULL, '', '', '0000-00-00', '', '', '', '', ''),
(124, 'FITRIYANI', 'fitriyani20151205@gmail.com', '$2y$10$OGzsUKiE6O9/8KvVxTp7cO0d3OPvKNo95OrC6XVd9jyvZDuWJtXZ.', 'SPFTR94', '089691535396', '', '2018-03-27 00:22:57', '2018-03-27 00:22:57', '6', 'KALBAR', 'MEMPAWAH', 'MPW', 'KOPEGTEL PONTIANAK', 'KPT1', 'a5ZDhCTjdp-1522984886.jpg', 'sales', '8355aa3bd1b60e1bed6a9544594735bd457c2b31', '9da3ac85-7f6b-4c48-a79a-bd9301e73cc5', '4913520', '', '', '0000-00-00', '', '', '', '', ''),
(125, 'MUNA LUQIANA', 'munaluqiia@gmail.com', '$2y$10$UoqGDaNovPxqJLGMbC1Jc.ltawAKOREoFdI3ubccy20kptJC5LGeu', 'SPMNL99', '085849085327', '', '2018-03-27 03:02:04', '2018-03-27 03:02:04', '6', 'KALBAR', 'SANGGAU', 'SGU', 'KOPEGTEL PONTIANAK', 'KPT3', 'vXJYWXmENn-1524065370.jpg', 'sales', 'c66e61de8188b48ad04312046671a72aec751dab', '3d1a3255-c264-40cf-9f9a-ffedfac00061', '4913520', '', '', '0000-00-00', '', '', '', '', ''),
(126, 'GERRY PRAYOGA', 'Gerryprayoga.se2nd@gmail.com', '$2y$10$xFzYfqiq7Y1iInmK/aQNcOSDo4EBWpleyiUVlePTJTPuPCvbRyYzW', 'SPGRP92', '085750461235', '', '2018-03-27 03:06:37', '2018-03-27 03:06:37', '6', 'KALBAR', 'PONTIANAK', 'PTK', 'CV. JASA WIRA PONTIANAK', 'JWP', '2LL6lzC96n-1523092781.jpg', 'sales', '9beeaaba6832bc74a458ea165b08f9ffd6d564f7', 'b1d28a96-e1ba-466c-855e-03ea9b6fc99d', '4913520', '', '', '0000-00-00', '', '', '', '', ''),
(127, 'ORYZA', 'oryzaadli@gmail.com', '$2y$10$qBxUUx5J5ZxCHs.aPZw5BOBQYdOL97SccUWvFnqoVKiYCZwoVeIra', 'SPORZ85', '082351083103', '', '2018-03-27 10:23:40', '2018-03-27 10:23:40', '6', 'KALBAR', 'MEMPAWAH', 'MPW', 'CV. JASA WIRA PONTIANAK', 'JWP', 'default.png', 'sales', '4ce59cb8807453e7c1cec486a47e0b75ba18e1d0', NULL, NULL, '', '', '0000-00-00', '', '', '', '', ''),
(128, 'ZAHRAN', 'ryan.redsky@yahoo.com', '$2y$10$.cn0uQD6C8lKWP2SjHIICexcXcb7sw0vb3Uh3kjgslX9RYiC3HezS', 'SPRRF87', '082252725076', '', '2018-03-30 05:50:56', '2018-03-30 05:50:56', '6', 'KALTARA', 'TARAKAN', 'TRK', 'KOPEGTEL BALIKPAPAN', 'KBP', 'default.png', 'sales', 'a9e09bf0606eeef0b565c32373fbac32447bc90d', '88aa486a-ae56-4e97-b86b-520cdd6c8ce3', '4913520', '', '', '0000-00-00', '', '', '', '', ''),
(129, 'Wulandari', 'wulandariindihome@gmail.com', '$2y$10$AlYBtOLOezJvPjIydlM5cuv1bJDCYEr5/EkjTOIWG8EJmLGogJiJK', 'SPWULAN', '082280437716', '', '2018-03-30 05:55:21', '2018-03-30 05:55:21', '6', 'KALTARA', 'TARAKAN', 'TRK', 'KOPEGTEL TARAKAN', 'KTA', 'FMv7MlwOPg-1522478564.jpg', 'sales', '43149039a6ce9b7074e379172bb99ccedc7c065e', NULL, NULL, '', '', '0000-00-00', '', '', '', '', ''),
(130, 'TEGUH DWI RIEWANGGA', 'fandymarley111@gmail.com', '$2y$10$wsL2FM3yahCOwD0VkG438OowJJdrFp75S6BG.GIunTiUaVupIEpfy', 'SPFAN77', '083110476668', '', '2018-03-30 06:02:33', '2018-03-30 06:02:33', '6', 'KALTARA', 'TARAKAN', 'TRK', 'KOPEGTEL BALIKPAPAN', 'KBP', 'default.png', 'sales', 'a380e621c4d49bd146e702f0012b175bb9ad5f7d', 'd49e288e-75ad-4cd5-abb8-97262a62d7bc', '4913520', '', '', '0000-00-00', '', '', '', '', ''),
(131, 'SAKINAH JUMAN', 'sakinahjuman77@gmail.com', '$2y$10$UG3nRqBVqlLFIPpQzo8EzebxJt4LoeJ2fTevRff0hlZurW4XIXYhC', 'SPNAH77', '082158441750', '', '2018-03-30 06:23:06', '2018-03-30 06:23:06', '6', 'KALTARA', 'TARAKAN', 'TRK', 'KOPEGTEL BALIKPAPAN', 'KBP', '6SLNLtgtE3-1523617363.jpg', 'sales', '11fd7703fe653dd7640687fe04a65f33bf0e2021', 'd4619d45-c2b6-446a-b126-9515a1662823', '4913520', '', '', '0000-00-00', '', '', '', '', ''),
(132, 'Rizky Devi Tyandani Putri', 'rizkydevi504@gmail.com', '$2y$10$zdrW.CRj3eDJxubOstNE1O9j8OrqAfMSdMowGNg0jOiAEpv0/BDdS', 'SPRDI96', '085368810100', '', '2018-03-30 06:40:10', '2018-03-30 06:40:10', '6', 'KALTARA', 'TARAKAN', 'TRK', 'KOPEGTEL BALIKPAPAN', 'KBP', 'default.png', 'sales', NULL, NULL, NULL, '', '', '0000-00-00', '', '', '', '', ''),
(134, 'RAHMAD HIDAYAT', 'dayat248@gmail.com', '$2y$10$oGYarlrOEyo7hROeDmOjvOTStbyL0rOZk4oib3jVTDhEYV3UnO406', 'SPDYT89', '082216212224', '', '2018-03-30 06:42:57', '2018-03-30 06:42:57', '6', 'KALTARA', 'TARAKAN', 'TRK', 'KOPEGTEL TARAKAN', 'KTA', 'default.png', 'sales', 'f198d8b0e7b4fe5873f16a3bc7480182ddde272e', NULL, NULL, '', '', '0000-00-00', '', '', '', '', ''),
(135, 'Nursyadisyam', 'nursyadisyam@gmail.com', '$2y$10$xo/d0OYdDEszjO2E2yIZZej9Ot/aAlSfnCCAQLsbffWoNX/e0XqVK', 'SPANC94', '082249101191', '', '2018-03-30 06:44:00', '2018-03-30 06:44:00', '6', 'KALTARA', 'TARAKAN', 'TRK', 'KOPEGTEL TARAKAN', 'KTA', 'default.png', 'sales', 'b27a67d803f635e939a56eb6cffe07d2ed2b1bae', 'bfca78a5-b0fa-425d-b200-14bc52774393', '4913520', '', '', '0000-00-00', '', '', '', '', ''),
(136, 'NOR KOMARIAH', 'nosita.tiwi@gmail.com', '$2y$10$iye0VfeqboxTRWZh5jw90OI7kFIQkvWxoCPFjgKx3pmJU3AADhW0W', 'SPIWI97', '082256074743', '', '2018-03-30 06:45:09', '2018-03-30 06:45:09', '6', 'KALTARA', 'TARAKAN', 'TRK', 'KOPEGTEL BALIKPAPAN', 'KBP', 'YTKwFHEmju-1523443023.jpg', 'sales', 'd4e4b4ca542da158d320e4dfff6bdff85da4ac5d', NULL, NULL, '', '', '0000-00-00', '', '', '', '', ''),
(137, 'MULYANI', 'mulyaniabn94@gmail.com', '$2y$10$AZEdWkcbVpe8lKD2tF/AF.x9R/ZdgBvuqv1.eBAYVujlxi6JdHPLq', 'SPMUL23', '082153688929', '', '2018-03-30 06:46:57', '2018-03-30 06:46:57', '6', 'KALTARA', 'TARAKAN', 'TRK', 'KOPEGTEL BALIKPAPAN', 'KBP', 'default.png', 'sales', NULL, NULL, NULL, '', '', '0000-00-00', '', '', '', '', ''),
(138, 'Muhammad Zulfikar Wirayudha', 'sergiovicguero@gmail.com', '$2y$10$JnJWJTyg8ZFVQZ35kvFj4uBpS.I/dWC56RTJSo.svwkUkREM/Emtq', 'SPMZW95', '085248000041', '', '2018-03-30 06:48:15', '2018-03-30 06:48:15', '6', 'KALTARA', 'TARAKAN', 'TRK', 'KOPEGTEL BALIKPAPAN', 'KBP', 'default.png', 'sales', NULL, NULL, NULL, '', '', '0000-00-00', '', '', '', '', ''),
(139, 'MUHAMMAD YUSRAN', 'Yusranloow23@gmail.com', '$2y$10$67OogtOiZ7ULzvX87Jsssu5APLDD36bPyr2e8Zd4g0R5Ms5g.V7Py', 'SPYUSRN', '085392241236', '', '2018-03-30 06:49:18', '2018-03-30 06:49:18', '6', 'KALTARA', 'TARAKAN', 'TRK', 'KOPEGTEL TARAKAN', 'KTA', 'L0DcGJFBNY-1523437278.jpg', 'sales', 'bad4e519ad5e404f09e46f8c34a12fba365f8ae6', NULL, NULL, '', '', '0000-00-00', '', '', '', '', ''),
(140, 'Mohammad Albar', 'mhmmdalbar08@gmail.com', '$2y$10$XBMbghTEkrRY2UZoGgdyruNwlM8E.UzmtL/kiJ6dynvoABS5uhxYq', 'SPALB98', '082253760628', '', '2018-03-30 06:50:24', '2018-03-30 06:50:24', '6', 'KALTARA', 'TARAKAN', 'TRK', 'KOPEGTEL TARAKAN', 'KTA', '3FRKgtm50p-1523448306.jpg', 'sales', '4468880f1ba8c4564bbf3d1b08e0646d75028297', '84e734f8-d045-4b40-9e36-8e70b18070bc', '4913520', '', '', '0000-00-00', '', '', '', '', ''),
(141, 'Mentari', 'rietarie92@gmail.com', '$2y$10$a1Vw.ipidkWnV6i1HMvHI.m0cLU8nxVIJ1W1Ktciat8pKzw30mYH2', 'SPRIE92', '082154411671', '', '2018-03-30 06:51:49', '2018-03-30 06:51:49', '6', 'KALTARA', 'TARAKAN', 'TRK', 'KOPEGTEL BALIKPAPAN', 'KBP', 'oSqovgC4PY-1524022337.jpg', 'sales', '4c27ec6c700321d16804bd9ab48514ecc481d88b', '6f1d8aae-b061-4c29-b5ea-f943e92c2b4b', '4913520', '', '', '0000-00-00', '', '', '', '', ''),
(142, 'Maya Winokan', 'SPWAN77', '$2y$10$DM5HOjEIqGm.6EMWMSeUIu2AsrRkslO9XOqSNP8kr6Q7CHoAUX.fm', 'SPWAN77', '081214128368', '', '2018-03-30 23:30:44', '2018-03-30 23:30:44', '6', 'KALTARA', 'TARAKAN', 'TRK', 'KOPEGTEL TARAKAN', 'KTA', 'default.png', 'sales', NULL, NULL, NULL, '', '', '0000-00-00', '', '', '', '', ''),
(143, 'JEPENRI PASARIBU', 'SPJFR28', '$2y$10$QJNzhRsPjZ4CWOZVweRwCuIuoaAEf7kqRGxETNPmk/jOxe5c2YGLa', 'SPJFR28', '085386296845', '', '2018-03-30 23:32:35', '2018-03-30 23:32:35', '6', 'KALTARA', 'TARAKAN', 'TRK', 'KOPEGTEL BALIKPAPAN', 'KBP', 'default.png', 'sales', NULL, NULL, NULL, '', '', '0000-00-00', '', '', '', '', ''),
(144, 'IWAN SAPUTRA', 'shantymut@gmail.com', '$2y$10$ptbW4U5WuPTh7RyDVw7IMuvV6iKlBg.CCF77nZQBUyrQopzXfWavm', 'SPSUS26', '08115396981', '', '2018-03-30 23:33:48', '2018-03-30 23:33:48', '6', 'KALTARA', 'TARAKAN', 'TRK', 'KOPEGTEL BALIKPAPAN', 'KBP', 'zk94vT0gmY-1522562717.jpg', 'sales', 'a3bc9f0b3a54ae45f993918d6fd97969c5ee89ad', '5e39bfa6-7fd6-4695-b24d-b088feaeb673', '4915326', '', '', '0000-00-00', '', '', '', '', ''),
(145, 'Irma Nur Rani', 'andiirma160@gmail.com', '$2y$10$whjwRUV2lqz7k7AEjLEqI.dkENfjtZshFqDSuB7/N2sjzAhzjkv3a', 'SPAIRMA', '0811537422', '', '2018-03-30 23:53:22', '2018-03-30 23:53:22', '6', 'KALTARA', 'TARAKAN', 'TRK', 'KOPEGTEL TARAKAN', 'KTA', 'dWa2XYmO1t-1523413656.jpg', 'sales', '3ffa6abd0fbc2cd53d5730334b9bda729a4d0cbb', NULL, NULL, '', '', '0000-00-00', '', '', '', '', ''),
(147, 'IQBAL WAHYUDI LATIEF', 'iqbalwahyudi@gmail.com', '$2y$10$M78hnpDkR2zFgs9Os55JR.AXb5zz1VLVJjX3fSpOAoCSpVMwrm4Fe', 'SPIQB85', '085250008828', '', '2018-03-31 00:07:23', '2018-03-31 00:07:23', '6', 'KALTARA', 'TARAKAN', 'TRK', 'KOPEGTEL TARAKAN', 'KTA', 'default.png', 'sales', NULL, NULL, NULL, '', '', '0000-00-00', '', '', '', '', ''),
(148, 'Imam Safei', 'imamsafei670@gmail.com', '$2y$10$HX6ZZxEXXCPp8oqsZ956jeVFVfyXaCiA.O9KuKqU/QZ.zvKH6tcWW', 'SPMAA93', '08115396933', '', '2018-03-31 00:09:37', '2018-04-11 05:08:20', '6', 'KALTARA', 'TARAKAN', 'TRK', 'KOPEGTEL BALIKPAPAN', 'KBP', 'ak3MuYI2Qx-1523615287.jpg', 'sales', '5945ded65d019cc1fc9708ad4aa229eaa7488bde', '42d9dd87-6804-4333-892c-00e15ba543a6', '4915326', '', '', '0000-00-00', '', '', '', '', ''),
(149, 'ILHAM MULYADI', 'ilham.mulyadi0410@gmail.com', '$2y$10$cvFyNXL25GxNrEBJQOVAQ.DBrdDRwVTzGc1YUbVcuvlOaRsqO5xEe', 'SPILH04', '081254512346', '', '2018-03-31 00:11:37', '2018-03-31 00:11:37', '6', 'KALTARA', 'TARAKAN', 'TRK', 'KOPEGTEL TARAKAN', 'KTA', 'default.png', 'sales', NULL, NULL, NULL, '', '', '0000-00-00', '', '', '', '', ''),
(150, 'Ihwansyah', 'ihwansyah08@gmail.com', '$2y$10$xptpnzGKp4cTZdsEEnisbuqe7Nahy1.hPMRlWBNTUsplwGLxGGh5O', 'SPIHW95', '085241716341', '', '2018-03-31 00:14:01', '2018-03-31 00:14:01', '6', 'KALTARA', 'TARAKAN', 'TRK', 'KOPEGTEL BALIKPAPAN', 'KBP', 'default.png', 'sales', NULL, NULL, NULL, '', '', '0000-00-00', '', '', '', '', ''),
(151, 'Hadi Wahyudi', 'hadysukses78@gmail.com', '$2y$10$nquhq7plhAu5kOqN7Z0kzuUALbPw1ooUiafGG10kMC7ieVl0DZ6K2', 'SPHDY25', '085247207898', '', '2018-03-31 00:15:17', '2018-03-31 00:15:17', '6', 'KALTARA', 'TARAKAN', 'TRK', 'KOPEGTEL TARAKAN', 'KTA', 'default.png', 'sales', 'b1d90ea0bbc7ca0d647948293c0b7c60aa522277', NULL, NULL, '', '', '0000-00-00', '', '', '', '', ''),
(152, 'GUSTI NOVAN RIOPRABAWA', 'gusti.sipil09@gmail.com', '$2y$10$BNpsjpA4d1GRKU96GQSjYOp4dEFXAX0hcKDEwd3XyrcGPUITWVzUK', 'SPGNR90', '082302477771', '', '2018-03-31 00:16:28', '2018-03-31 00:16:28', '6', 'KALTARA', 'TARAKAN', 'TRK', 'KOPEGTEL BALIKPAPAN', 'KBP', 'default.png', 'sales', '93a322fa322fd4818a589b22a9d296dc3c8503b4', 'b4b91b34-8045-49a6-933d-183ff8fa962d', '4909510', '', '', '0000-00-00', '', '', '', '', '');
INSERT INTO `sales` (`id`, `nama`, `username`, `password`, `ID_User`, `no_hp`, `remember_token`, `created_at`, `updated_at`, `regional`, `witel`, `datel`, `sto`, `agency`, `kode_agency`, `foto_profil`, `role`, `api_token`, `device_id`, `last_order_id`, `no_ktp`, `tmp_lahir`, `tgl_lahir`, `alamat`, `no_rek`, `bank`, `nama_pemilik_bank`, `cabang_bank`) VALUES
(153, 'Fitriana', 'fitriana.luswanto17@gmail.com', '$2y$10$8kLhBuaOLtNZeQXY1.W1UuXrEwERYPJmrTNkil6PzenVH/qjJG.dK', 'SPFTR13', '085252147096', '', '2018-03-31 00:17:59', '2018-03-31 00:17:59', '6', 'KALTARA', 'TARAKAN', 'TRK', 'KOPEGTEL BALIKPAPAN', 'KBP', 'default.png', 'sales', '5118ca4b3f3428b5b215f870cb5f93753146a52e', NULL, NULL, '', '', '0000-00-00', '', '', '', '', ''),
(154, 'Fitriana', 'fitriana.luswanto17@gmail.com', '$2y$10$ZaqVKt/YVvBMkHw6cKnYXe5himdrHuRgGBY/8QWhX8gYM2cFE1bFG', 'SPFTR13', '085252147096', '', '2018-03-31 00:18:12', '2018-03-31 00:18:12', '6', 'KALTARA', 'TARAKAN', 'TRK', 'KOPEGTEL BALIKPAPAN', 'KBP', 'default.png', 'sales', NULL, NULL, NULL, '', '', '0000-00-00', '', '', '', '', ''),
(155, 'Fernandito Fredrick Lamawuran', 'fernandito.0290@gmail.com', '$2y$10$hJJHjP/K3BoNhTwIsS6duutg8JvVPoflI2mEFShiX3a.vytb/ewOm', 'SPFER72', '0853488798933', '', '2018-03-31 00:20:25', '2018-03-31 00:20:25', '6', 'KALTARA', 'TARAKAN', 'TRK', 'KOPEGTEL BALIKPAPAN', 'KBP', 'default.png', 'sales', '6d50324bb26d393aceade173c45b85d7a9b0aa37', '2b2f0536-3b3e-472f-9223-3be9badeb992', '4909510', '', '', '0000-00-00', '', '', '', '', ''),
(156, 'Fatkhur Rahman', 'faturdeclay@gmail.com', '$2y$10$jmg3ouP8Z.WyllfAbQseW.3W7.8yvlHtLFYB6rP4PvCs4Aa6jQPJW', 'SPFAT47', '085246657568', '', '2018-03-31 00:21:54', '2018-03-31 00:21:54', '6', 'KALTARA', 'TARAKAN', 'TRK', 'KOPEGTEL TARAKAN', 'KTA', 'default.png', 'sales', NULL, NULL, NULL, '', '', '0000-00-00', '', '', '', '', ''),
(157, 'DODI ISKANDAR ZULKARNAIN', 'dodi92271@gmail.com', '$2y$10$2HlVP4MPRNHgQ0NVisNPg.9kReTie8YFa0DKqhxmv89uQQNLFZMqK', 'SPDIZ97', '082155767611', '', '2018-03-31 00:23:02', '2018-03-31 00:23:02', '6', 'KALTARA', 'TARAKAN', 'TRK', 'KOPEGTEL BALIKPAPAN', 'KBP', 'R72tOjQjBs-1523417119.jpg', 'sales', '90ddc41f5a1c685f6613e0e45d0843a6c07f9784', NULL, NULL, '', '', '0000-00-00', '', '', '', '', ''),
(158, 'Dedi Paisal', 'dedipaisal0105@yahoo.com', '$2y$10$u8R.25sK/IIoem.BQU/icO78G1MKEN43HErSvkAMgQsgReCBsD2yu', 'SPDDI98', '082213291709', '', '2018-03-31 00:24:25', '2018-03-31 00:24:25', '6', 'KALTARA', 'TARAKAN', 'TRK', 'KOPEGTEL TARAKAN', 'KTA', 'XI84n31T6N-1523662692.jpg', 'sales', '8a484447eb262b0b727b9845d5a7d30e8df183a8', '346f2cba-adaf-48de-9274-1c688b5b1207', '4909510', '', '', '0000-00-00', '', '', '', '', ''),
(159, 'darmansyah', 'adefaturrahman10@gmail.com', '$2y$10$k.FoUi4exv.Z9EvMWk8tZe0gLU1NGyhN.8c8.d5UuHvtSLH.n6wQ6', 'SPAFR97', '08112032002', '', '2018-03-31 00:25:35', '2018-03-31 00:25:35', '6', 'KALTARA', 'TARAKAN', 'TRK', 'KOPEGTEL TARAKAN', 'KTA', 'default.png', 'sales', NULL, NULL, NULL, '', '', '0000-00-00', '', '', '', '', ''),
(160, 'Bela Hari Kristanti', 'belakristanti9898@gmail.com', '$2y$10$mAPbQOj/Abk8UxCUEeqgwuXpOPTC9T/rPgavVHmNcmLPp51GOSS32', 'SPBLA98', '085705972166', '', '2018-03-31 00:27:50', '2018-03-31 00:27:50', '6', 'KALTARA', 'TARAKAN', 'TRK', 'kosong', 'KTA', 'rlkxAoSu5Z-1522562726.jpg', 'sales', 'f5725f4ed5e12a17bbba9a24433c87e505503974', '8a758048-8e3c-499f-aa0b-f3723d0745e3', '4909510', '', '', '0000-00-00', '', '', '', '', ''),
(161, 'Alfian', 'fian.kaltara2@gmail.com', '$2y$10$GApE322mBinGFIawnolcneaaJcQ8hBDfdAgNsY1Ty7/jIbZDhjaie', 'SPALF62', '085247445267', '', '2018-03-31 00:29:48', '2018-03-31 00:29:48', '6', 'KALTARA', 'TARAKAN', 'TRK', 'KOPEGTEL TARAKAN', 'KTA', 'default.png', 'sales', NULL, NULL, NULL, '', '', '0000-00-00', '', '', '', '', ''),
(162, 'Agus priyanto', 'Jadull85@gmail.com', '$2y$10$v9wEEckFUQxihrfQHCo3RejhYWJYALOgTsj66LggwVFAOvXWSWCum', 'SPGSS85', '085334998885', '', '2018-03-31 00:32:07', '2018-03-31 00:32:07', '6', 'KALTARA', 'TARAKAN', 'TRK', 'KOPEGTEL BALIKPAPAN', 'KBP', 'default.png', 'sales', NULL, NULL, NULL, '', '', '0000-00-00', '', '', '', '', ''),
(163, 'WAHYU RAMADHAN', 'wahyuramadhan777777@gmail.com', '$2y$10$c/P6TlmgqlGm/JaMljIIHucxRjZ/tcX.zpnYxoTCPz0zT36lYiMAS', 'SPWRA96', '085750210653', '', '2018-03-31 21:36:26', '2018-03-31 21:36:26', '6', 'KALBAR', 'PONTIANAK', 'PTK', 'KOPEGTEL PONTIANAK', 'KPT1', 'NvvbZWRJWQ-1523688669.jpg', 'sales', '26d0f6f052f32cc0365d2da12b183a6a9be2d29d', NULL, NULL, '', '', '0000-00-00', '', '', '', '', ''),
(164, 'DWI WIDIYANTO', 'dwi.photo.dw@gmail.com', '$2y$10$EwL8pwrW6hByNLsI.lyvA.Z3VP95nAmo3APIf/XpumWXcZ7KQXAs6', 'SPDWD93', '089693548036', '', '2018-04-03 20:03:31', '2018-04-03 20:03:31', '6', 'KALBAR', 'PONTIANAK', 'PTK', 'CV. JASA WIRA PONTIANAK', 'JWP', '13IIUUpUy1-1522812843.jpg', 'sales', '3084e4a9ae906b9bf023edf7f28066c848a634cb', '05bd9767-bd24-4772-99a6-942d45a4c671', '4909510', '', '', '0000-00-00', '', '', '', '', ''),
(165, 'HIDAYATULLAH', 'aat_maizir@yahoo.com', '$2y$10$MgcOk3YDPnT8jmy8wmWEAud5wueDNIi/K3hdEeIFjLuasaNoh17kO', 'SPDAY94', '089528136452', '', '2018-04-03 20:04:28', '2018-04-03 20:04:28', '6', 'KALBAR', 'SINTANG', 'STG', 'KOPEGTEL PONTIANAK', 'KPT3', 'aPUP5I4uux-1522814001.jpg', 'sales', '1ccc449a839d8c2a00b194598b3642c25e46b114', '47e5599d-e9e5-424b-ad3d-c5fa2deb6137', '4906805', '', '', '0000-00-00', '', '', '', '', ''),
(166, 'Jhonny', 'dionyhospot@gmail.com', '$2y$10$NT8TQZzWry4NkL6geSc4w.bNeYbOIsXsNnticGWMAlM7VEYSAF.1W', 'SPJHN84', '085750824486', '', '2018-04-03 20:06:23', '2018-04-03 20:06:23', '6', 'KALBAR', 'PONTIANAK', 'PTK', 'CV. JASA WIRA PONTIANAK', 'JWP', '20z4fBHf1x-1523414631.jpg', 'sales', 'db860e2fd5246f65a277ae7bbcb1f60ce70af248', 'a439879f-9d03-491a-96a4-e97c28d8d6d1', '4912070', '', '', '0000-00-00', '', '', '', '', ''),
(167, 'AGUSTIAN', 'gugunptk38@gmail.com', '$2y$10$tsWCTSA.zjfPvOG5oSA.W.SKeh43IwGNSKPdfFCXz4IT3AffEnb.C', 'SPAGT94', '082255101780', '', '2018-04-04 01:03:16', '2018-04-04 01:03:16', '6', 'KALBAR', 'PONTIANAK', 'PTK', 'CV. JASA WIRA PONTIANAK', 'JWP', 'default.png', 'sales', NULL, NULL, NULL, '', '', '0000-00-00', '', '', '', '', ''),
(168, 'CACA MARLISA', 'cacamarlisa3@gmail.com', '$2y$10$OKkU4oFEChJS5s3MfolMD.zajM69TPAfvFnZS..gtxFJbWIC9ydHK', 'SPCMR91', '085849772720', '', '2018-04-04 01:05:18', '2018-04-04 01:05:18', '6', 'KALBAR', 'PONTIANAK', 'PTK', 'CV. JASA WIRA PONTIANAK', 'JWP', 'default.png', 'sales', '3f4b3a67e2f1ff98dd9644dab6b6355fb44b3ceb', NULL, NULL, '', '', '0000-00-00', '', '', '', '', ''),
(169, 'DEDI FAHRUS', 'aimmia88@yahoo.com', '$2y$10$YMfhMyhrG3Scwc1ZpM2pyuS75N/ys6G8EtMxFRmLr6oa3.Ec0YjKK', 'SPDDF88', '085822222434', '', '2018-04-04 01:08:12', '2018-04-04 01:08:12', '6', 'KALBAR', 'PONTIANAK', 'PTK', 'CV. JASA WIRA PONTIANAK', 'JWP', 'default.png', 'sales', NULL, NULL, NULL, '', '', '0000-00-00', '', '', '', '', ''),
(170, 'DIKY MULIAWAN', 'DikyMulliawan89@gmail.com', '$2y$10$VX9ZFiiS2V.aPSkAfd2TLeGa8QK3tXdK1sAk9tUwddqYg6G6lXN9i', 'SPDML89', '089630690112', '', '2018-04-04 01:11:30', '2018-04-04 01:11:30', '6', 'KALBAR', 'PONTIANAK', 'PTK', 'CV. JASA WIRA PONTIANAK', 'JWP', 'default.png', 'sales', NULL, NULL, NULL, '', '', '0000-00-00', '', '', '', '', ''),
(171, 'NOFIYANTI', 'Nofiyanti20@gmail.com', '$2y$10$VtRxstG3nxKT8Q3WGbMeyOCkHyrV6ZclMsGDwh8Pcn9Qu/toe02GC', 'SPNFY94', '085750343109', '', '2018-04-04 01:13:30', '2018-04-04 01:13:30', '6', 'KALBAR', 'PONTIANAK', 'PTK', 'CV. JASA WIRA PONTIANAK', 'JWP', 'HLqN5mXFZm-1524044832.jpg', 'sales', '4f291af509c25337e7d8c53add02546490108965', '485d4c8f-87b5-4b26-8f94-7030c65ca767', '4912070', '', '', '0000-00-00', '', '', '', '', ''),
(172, 'NOVI FATIKA SARI', 'noviifatika@gmail.com', '$2y$10$ITVXV4elt./xQZHdc5R2UeOzEMpTRwMecFhpf3SMDnzg85elhC/vq', 'SPNFS96', '08982970258', '', '2018-04-04 01:15:00', '2018-04-04 01:15:00', '6', 'KALBAR', 'PONTIANAK', 'PTK', 'CV. JASA WIRA PONTIANAK', 'JWP', 'default.png', 'sales', '7cb4d17878a803f54b1e54f0237f54b5ce7ac05f', NULL, NULL, '', '', '0000-00-00', '', '', '', '', ''),
(173, 'PENGKY SANJAYA', 'fgs.sanjaya@gmail.com', '$2y$10$YtHhWSloTyKYg8chreQiSuyKlxPb9.6f4HAeFd5RjxSh.CHw/WNTy', 'SPPKY92', '082149881448', '', '2018-04-04 01:16:12', '2018-04-04 01:16:12', '6', 'KALBAR', 'PONTIANAK', 'PTK', 'CV. JASA WIRA PONTIANAK', 'JWP', 'default.png', 'sales', NULL, NULL, NULL, '', '', '0000-00-00', '', '', '', '', ''),
(174, 'RIDWAN PARMIDI', 'ridwanparmidi1212@gmail.com', '$2y$10$.9AZDDQ6mRzpVldpeJznbep35e3wUJOtrZejQ6MIqU9ioYoMzVbTW', 'SPRPR82', '08992912558', '', '2018-04-04 01:18:07', '2018-04-04 01:18:07', '6', 'KALBAR', 'PONTIANAK', 'PTK', 'CV. JASA WIRA PONTIANAK', 'JWP', 'default.png', 'sales', 'cf5c6885690313c5dcca76a105b14813cb893a61', NULL, NULL, '', '', '0000-00-00', '', '', '', '', ''),
(175, 'SUSI LESTARI', 'susilestarikku@gmail.com', '$2y$10$UpgPCr7h.8U5WgQvI.sjrurn9nYhLi0/aAY7JAaBLrmLRhAgeMX8K', 'SPSLT97', '085822634576', '', '2018-04-04 01:19:49', '2018-04-04 01:19:49', '6', 'KALBAR', 'PONTIANAK', 'PTK', 'CV. JASA WIRA PONTIANAK', 'JWP', 'default.png', 'sales', NULL, NULL, NULL, '', '', '0000-00-00', '', '', '', '', ''),
(176, 'GUSTI TESSA PRANATA', 'engah.samsung@gmail.com', '$2y$10$AHjj0WmuXT7A0bJqdAbVZOcNROeKuNy0zZBcad0q2pqam/DmEE8ve', 'SPTES90', '+625252013496', '', '2018-04-04 02:06:29', '2018-04-04 02:06:29', '6', 'KALBAR', 'SINTANG', 'STG', 'KOPEGTEL PONTIANAK', 'KPT3', 'Qdwy6ElwDs-1522833798.jpg', 'sales', '079d5f9b0fab4f69ff65b95e2fe43e0d707b3f92', NULL, NULL, '', '', '0000-00-00', '', '', '', '', ''),
(177, 'MARDIATY FANNY', 'fannymardiati@gmail.com', '$2y$10$qEsBOFHlDXbfqJ3nFqb1QOOERmooOpPSg6LN8D/A8cic/awczh4te', 'SPMFN97', '0895363828156', '', '2018-04-05 11:02:50', '2018-04-05 11:02:50', '6', 'KALBAR', 'PONTIANAK', 'PTK', 'CV. JASA WIRA PONTIANAK', 'JWP', 'default.png', 'sales', '5393cc2ca96b2ec828dd26cdb26751faa5e75d99', 'cb4b85f4-34d4-49da-b764-27aa274e133c', '4908732', '', '', '0000-00-00', '', '', '', '', ''),
(178, 'ARIO GUNA PRATAMA', 'dolpiyoshop@gmail.com', '$2y$10$7Tg32/XzfBkuU0DpOaDIluJzm6DFNnFx3/bLLxRaFqM10hFIzpDbm', 'SPAGP90', '089693808043', '', '2018-04-05 11:04:16', '2018-04-05 11:04:16', '6', 'KALBAR', 'PONTIANAK', 'PTK', 'CV. JASA WIRA PONTIANAK', 'JWP', 'default.png', 'sales', '449c9b7db1e0829a7c48e86f5aa09050524ea0be', NULL, NULL, '', '', '0000-00-00', '', '', '', '', ''),
(179, 'RENALDINATA', 'renaldialdi007@gmail.com', '$2y$10$IdJgZOYHrEdM9MTnffNyCuTty.V1B2mDQzNggxI1RWejqAjyreu.K', 'SPREN04', '081253139495', '', '2018-04-06 08:12:15', '2018-04-06 08:12:15', '6', 'SAMARINDA', 'SAMARINDA', 'SMR', 'kosong', 'kosong', 'default.png', 'sales', 'd1e339f5fe14e829c13fb336a69e132ad09a95f3', '34303648-e7e6-4d94-ac84-993ece983155', '4908732', '', '', '0000-00-00', '', '', '', '', ''),
(180, 'WIDI ZUHRI CAHYADI', 'supioktavieanthy@gmail.com', '$2y$10$7IKgx1Kp2ro3sx0cfwiVquHojvQKb/XHpJsh9.pVaxrAWKk9Al1.C', 'OLOLTBC', '081528928209', '', '2018-04-06 09:39:48', '2018-04-06 09:39:48', '6', 'KALBAR', 'PONTIANAK', 'JAW', 'KOPEGTEL BALIKPAPAN', 'JWP', 'default.png', 'sales', '7791ae282d355a327dde24d087a4b86518ca325b', NULL, NULL, '', '', '0000-00-00', '', '', '', '', ''),
(181, 'APRIO AGUNG', 'aprioagung01@gmail.com', '$2y$10$AhWz95V7sDNcH4VeTffb4OgoxjVQG/3YSFbu0UfB8xxEuPvP3r9Km', 'OLSVG04', '082153937099', '', '2018-04-09 07:34:10', '2018-04-09 07:34:10', '6', 'KALTARA', 'TARAKAN', 'TRK', 'KOPEGTEL TARAKAN', 'KTA', 'default.png', 'sales', NULL, NULL, NULL, '', '', '0000-00-00', '', '', '', '', ''),
(182, 'Irawansyah', 'irawan200211@gmail.com', '$2y$10$xclVKqictOQYPr2vTfU1Z.jSR7Vj1gmmzkGg15JyBax2EscL5ObZy', 'OLSVW91', '08112032002', '', '2018-04-09 07:45:30', '2018-04-09 07:45:30', '6', 'KALTARA', 'TARAKAN', 'TRK', 'KOPEGTEL TARAKAN', 'KTA', 'default.png', 'sales', NULL, NULL, NULL, '', '', '0000-00-00', '', '', '', '', ''),
(183, 'Ahmad Rifani', 'rifani2710@gmail.com', '$2y$10$LD0hVqgifw6yNQBS6O9GfeRD5y81KC9jqGY.r/F0Gp7ENU0uKnxn6', 'SPAHI91', '085249410222', '', '2018-04-10 20:21:51', '2018-04-10 20:26:03', '6', 'KALTARA', 'TARAKAN', 'TRK', 'KOPEGTEL TARAKAN', 'KTA', 'default.png', 'sales', NULL, NULL, NULL, '', '', '0000-00-00', '', '', '', '', ''),
(184, 'Maya Winokan', 'kurniawanths@gmail.com', '$2y$10$VmYjIKoGo3hY42helm/yG.nBZI4BLUqCzL4CZRXyxPtROi.MFjh82', 'SPWAN77', '081214128368', '', '2018-04-10 20:32:55', '2018-04-10 20:32:55', '6', 'KALTARA', 'TARAKAN', 'TRK', 'KOPEGTEL TARAKAN', 'KTA', 'VRWeGlP1kI-1523459269.jpg', 'sales', '352ba3816d4084c360dd0f1a9f86ff0f55e4f168', '81b0f6ac-e78e-4490-a59f-053f6b50f925', '4908732', '', '', '0000-00-00', '', '', '', '', ''),
(185, 'DENI SETIAWAN', 'denitel17@gmail.com', '$2y$10$deaGQHk90ckaFfhRjcbHXeKZwwP8.mjfSECwGg57rPHlwvB1qqVKG', 'SPDSW00', '08993603835', '', '2018-04-11 00:22:19', '2018-04-11 00:22:19', '6', 'KALBAR', 'PONTIANAK', 'PTK', 'CV. JASA WIRA PONTIANAK', 'JWP', 'default.png', 'sales', NULL, NULL, NULL, '', '', '0000-00-00', '', '', '', '', ''),
(186, 'HENDRA SAPUTRA', 'hendra46saputra@gmail.com', '$2y$10$KysH.ng7A2BmQ1urJQGB1uC/1AhdV0Yk8Ec0eao6TU4EWXXKUjVg.', 'SPHSP91', '082251352001', '', '2018-04-11 00:24:37', '2018-04-11 00:24:37', '6', 'KALBAR', 'PONTIANAK', 'PTK', 'CV. JASA WIRA PONTIANAK', 'JWP', 'default.png', 'sales', '63aef2c44a14782c9213698511dd2cc6c311348e', '754b8057-3649-409f-ae79-165e60fff11a', NULL, '', '', '0000-00-00', '', '', '', '', ''),
(187, 'KISWANTORO', 'kiswan1002@gmail.com', '$2y$10$GM3e0nMjbq8oIsP8Wp6qQugu2TQX39zNoDAfuHkDDkzBhfAFBBqWC', 'SPKWT94', '085348010207', '', '2018-04-11 00:26:47', '2018-04-11 00:26:47', '6', 'KALBAR', 'PONTIANAK', 'PTK', 'CV. JASA WIRA PONTIANAK', 'JWP', 'default.png', 'sales', NULL, NULL, NULL, '', '', '0000-00-00', '', '', '', '', ''),
(188, 'M. FARHAN', 'farhangafar23@yahoo.com', '$2y$10$0VjxWi6CYuBEtnu7n2UMMOIIVgQJKnFVj80oG6WbcHWU9VEm8ke1S', 'SPFRH98', '082350195667', '', '2018-04-11 00:28:40', '2018-04-11 00:28:40', '6', 'KALBAR', 'PONTIANAK', 'PTK', 'CV. JASA WIRA PONTIANAK', 'JWP', 'default.png', 'sales', '5b6ba3d9e89721fee2299d70b38c3c23147534fa', '754b8057-3649-409f-ae79-165e60fff11a', NULL, '', '', '0000-00-00', '', '', '', '', ''),
(189, 'MOHAMAD FAISOL ARIF', 'pay.gilbert26@gmail.com', '$2y$10$ap6blkNMKV6htgkOLrACCeInzBtGuv5kebi2BsNB2CgMTkekA0HYC', 'SPFSR90', '082153866326', '', '2018-04-11 00:30:28', '2018-04-11 00:30:28', '6', 'KALBAR', 'PONTIANAK', 'PTK', 'CV. JASA WIRA PONTIANAK', 'JWP', 'default.png', 'sales', NULL, NULL, NULL, '', '', '0000-00-00', '', '', '', '', ''),
(190, 'RENO GAPIANO', 'enogaviano93@gmail.com', '$2y$10$TYnsK1JKDxDu6HvIXLH35e3OVNKaI5qbRaunv5ic92GeQqkl/sPfq', 'SPRNG93', '085245802124', '', '2018-04-11 00:33:10', '2018-04-11 00:33:10', '6', 'KALBAR', 'PONTIANAK', 'PTK', 'CV. JASA WIRA PONTIANAK', 'JWP', 'default.png', 'sales', NULL, NULL, NULL, '', '', '0000-00-00', '', '', '', '', ''),
(191, 'RICKY MUBARAK', 'rizkimubarak97@gmail.com', '$2y$10$YpCsIx3T4SbnhcyLG2aPpucWpLH.z7P8nb1g0/SS8MzLCbt1hvg6G', 'SPRMB97', '089680768651', '', '2018-04-11 00:35:01', '2018-04-11 00:35:01', '6', 'KALBAR', 'PONTIANAK', 'PTK', 'CV. JASA WIRA PONTIANAK', 'JWP', 'default.png', 'sales', '69047c77b7cf554929e6ea953788229d932bf11a', '73f32f5d-6e6e-4579-b021-accdc464aa55', '4906805', '', '', '0000-00-00', '', '', '', '', ''),
(192, 'SHITI MASHITOH', 'sitaamusyaffa@gmail.com', '$2y$10$EdPxdkFG4OT.Vsol8kNgje22YAmYChe1nMbuigyfs.1r88BcyFJLy', 'SPSMS95', '089693602828', '', '2018-04-11 00:36:12', '2018-04-11 00:36:12', '6', 'KALBAR', 'PONTIANAK', 'PTK', 'CV. JASA WIRA PONTIANAK', 'JWP', 'default.png', 'sales', '16e2f88f25cd2accd0d0075fccc7c12f3ee76f86', '570d916e-560f-4bc2-8b85-e3d0db31dae6', '4906805', '', '', '0000-00-00', '', '', '', '', ''),
(193, 'TULUS SETIA NUGRAHA', 'tsetianugraha@gmail.com', '$2y$10$fkT5zw0DuEVNJV.DUtIrWeLKjyN5jLk83d3pobK6/PyqUWsFCY7e2', 'SPTLS94', '089694447922', '', '2018-04-11 00:53:49', '2018-04-11 00:53:49', '6', 'KALBAR', 'PONTIANAK', 'PTK', 'KOPEGTEL PONTIANAK', 'KPT2', 'default.png', 'sales', NULL, NULL, NULL, '', '', '0000-00-00', '', '', '', '', ''),
(194, 'WAHYU HIDAYAT', 'w_hidayat27@yahoo.com', '$2y$10$l4VUOs3762q98PW24cKMBOS2YVwFJl1lKkX.K1XaS6WiPl5NHrNu2', 'SPWYH92', '082352746312', '', '2018-04-11 00:55:13', '2018-04-11 00:55:13', '6', 'KALBAR', 'PONTIANAK', 'PTK', 'KOPEGTEL PONTIANAK', 'KPT1', 'default.png', 'sales', '34e67fb65ff057f2022f9c438288ffa2863ed77b', 'c882c39e-b509-4d00-b070-fda1acc2ebdf', '4907529', '', '', '0000-00-00', '', '', '', '', ''),
(195, 'EDY', 'aphangr@yahoo.com', '$2y$10$NKwizbT2KB.wBU8zxCGAJeqLwu7UUwy0YLou4tNW4OAhoI.AIubEK', 'SPYDE87', '85252540200', '', '2018-04-11 00:57:13', '2018-04-11 00:57:13', '6', 'KALBAR', 'PONTIANAK', 'PTK', 'KOPEGTEL PONTIANAK', 'KPT2', 'default.png', 'sales', NULL, NULL, NULL, '', '', '0000-00-00', '', '', '', '', ''),
(196, 'AJI SETIAWAN', 'Ajhiesetiawan13@gmail.com', '$2y$10$CoLHwqz6RaOdU5tJvNuMieyOre.KgzkFKOY3EtsIN4TjGxqga/Y1a', 'SPAJT92', '085705852455', '', '2018-04-11 00:58:58', '2018-04-11 00:58:58', '6', 'KALBAR', 'PONTIANAK', 'PTK', 'CV. JASA WIRA PONTIANAK', 'JWP', 'default.png', 'sales', '38c54b5341809c5aac6cbaa373cf8a05f115b0f5', '51aa63fa-07ed-4aec-a966-9726e4076365', NULL, '', '', '0000-00-00', '', '', '', '', ''),
(197, 'ARTHESWARA KINARA SATYA WARDANA', 'kapalkapalan98@gmail.com', '$2y$10$KO7.pB4W07mAT2JIUf5CIuJHdOmZqGCUMEXLo/XHNSJJPvlu8H23.', 'SPART98', '089683417219', '', '2018-04-11 01:00:52', '2018-04-11 01:00:52', '6', 'KALBAR', 'PONTIANAK', 'PTK', 'CV. JASA WIRA PONTIANAK', 'JWP', 'default.png', 'sales', NULL, NULL, NULL, '', '', '0000-00-00', '', '', '', '', ''),
(198, 'IRIANTO', 'eeng.irianto@gmail.com', '$2y$10$W6uU1JyRZ3PMzldaci5.xOPPXRozr.pbFDXWC.7.gBqju9N.TxwUq', 'SPIRT62', '082157008917', '', '2018-04-11 01:26:42', '2018-04-11 01:26:42', '6', 'KALBAR', 'PONTIANAK', 'PTK', 'CV. JASA WIRA PONTIANAK', 'JWP', 'default.png', 'sales', NULL, NULL, NULL, '', '', '0000-00-00', '', '', '', '', ''),
(199, 'JEFFRI APRIYADI', 'jeffriapriyadi86@gmail.com', '$2y$10$2VA5Dhrn/VWBiA/Gbq7ZKexTw/OD6F5Q1TR8HaYln5iVC5HdHfXnu', 'SPJEF86', '085752812190', '', '2018-04-11 01:28:01', '2018-04-11 01:28:01', '6', 'KALBAR', 'PONTIANAK', 'PTK', 'CV. JASA WIRA PONTIANAK', 'JWP', 'default.png', 'sales', NULL, NULL, NULL, '', '', '0000-00-00', '', '', '', '', ''),
(200, 'MUHAMMAD SYAFI\'I', 'Syafiisr109@gmail.com', '$2y$10$i4cNvQLJdSP7xckMS/e4R.FdpPok.7k58tRk5F82KBnGLKp6Htfb2', 'SPMSF81', '085249698884', '', '2018-04-11 01:29:08', '2018-04-11 01:29:08', '6', 'KALBAR', 'PONTIANAK', 'PTK', 'CV. JASA WIRA PONTIANAK', 'JWP', 'default.png', 'sales', NULL, NULL, NULL, '', '', '0000-00-00', '', '', '', '', ''),
(201, 'MUMUN ENDANG DARMAWAN', 'mumunendang@gmail.com', '$2y$10$nzrytmuRqeNdEY/5XktTQOB9igC1aTIqMchputl9wcxjwsZWDZ0dG', 'SPMED79', '081345731736', '', '2018-04-11 01:30:26', '2018-04-11 01:30:26', '6', 'KALBAR', 'PONTIANAK', 'PTK', 'CV. JASA WIRA PONTIANAK', 'JWP', 'default.png', 'sales', NULL, NULL, NULL, '', '', '0000-00-00', '', '', '', '', ''),
(202, 'SY. DENI KURNIAWAN', 'sydenikurniawan@gmai.com', '$2y$10$sSY2v4/qF.7oiAdpmP/VAe2aQWEv.OhIPxMF3Ye4TVSTtSu90tbau', 'SPSDK81', '089661351858', '', '2018-04-11 01:31:39', '2018-04-11 01:31:39', '6', 'KALBAR', 'PONTIANAK', 'PTK', 'CV. JASA WIRA PONTIANAK', 'JWP', 'default.png', 'sales', NULL, NULL, NULL, '', '', '0000-00-00', '', '', '', '', ''),
(203, 'WIDYA YUNIARTI', 'Widyayuniarti236@gmail.com', '$2y$10$3BLDCD30Kw/lVckhD/BAXuBTCQRsdLlBCnfji75H0NPeiHgPTC2CW', 'SPWYA89', '085654824644', '', '2018-04-11 01:32:55', '2018-04-11 01:32:55', '6', 'KALBAR', 'PONTIANAK', 'PTK', 'CV. JASA WIRA PONTIANAK', 'JWP', 'default.png', 'sales', NULL, NULL, NULL, '', '', '0000-00-00', '', '', '', '', ''),
(204, 'HENGKY ARIANTO', 'Vikingariyanto@gmail.com', '$2y$10$bBZTtgFXglX06wM3GAoL9OaFxmpmOF6nr0HrSXYS62Ak2RQThsdiq', 'SPHKY95', '0811577723', '', '2018-04-11 01:34:13', '2018-04-11 01:34:13', '6', 'KALBAR', 'PONTIANAK', 'PTK', 'KOPEGTEL PONTIANAK', 'KPT1', 'nmG4tCXiFq-1524145695.jpg', 'sales', '6bcf68f72e66f4b395b8965e9322bca146610557', '00c7b890-d363-438d-8672-58b7d9cdae34', NULL, '', '', '0000-00-00', '', '', '', '', ''),
(205, 'IVAN DARMAWAN', 'ivan.darma49@gmail.com', '$2y$10$Z4vo0ZpDeU6OV0tDZSemeuPbJjhLz/WSi3C7xZR6XTVpOI6NOqEPO', 'SPIVN97', '085245113709', '', '2018-04-11 01:35:22', '2018-04-11 01:35:22', '6', 'KALBAR', 'PONTIANAK', 'PTK', 'KOPEGTEL PONTIANAK', 'KPT1', '0CrmHCp7lv-1523635797.jpg', 'sales', '756423f7052bbce9127f6e510d0f18bb77fa31fe', '54fb5f90-670f-40a6-a4d1-a23220741888', '4907529', '', '', '0000-00-00', '', '', '', '', ''),
(206, 'PERAWATI', 'rikiyakup74@gmail.com', '$2y$10$GNzJxWKioTDLMVxjQEPrJuHO9uWYiJSo7v/bshiRKrk0mCqeC4Iu.', 'SPPRW93', '082253280977', '', '2018-04-11 01:36:21', '2018-04-11 01:36:21', '6', 'KALBAR', 'PONTIANAK', 'PTK', 'KOPEGTEL PONTIANAK', 'KPT1', 'default.png', 'sales', NULL, NULL, NULL, '', '', '0000-00-00', '', '', '', '', ''),
(207, 'RYAN ASYARI', 'ryanasyari25389@gmail.com', '$2y$10$5oLjKxFmSPhwokghWCKEzujkGYgeDmSEDSFXQyS0Z8JinF.YuyzzC', 'SPRYI97', '089654594880', '', '2018-04-11 01:37:40', '2018-04-11 01:37:40', '6', 'KALBAR', 'PONTIANAK', 'PTK', 'KOPEGTEL PONTIANAK', 'KPT1', 'jlRhp7YRYC-1523684441.jpg', 'sales', 'df51870337fa20a5929fc01971cd03b933bb8d68', 'e9aa2511-075b-4959-8442-f86c7f4a8068', '4907529', '', '', '0000-00-00', '', '', '', '', ''),
(208, 'BENNY APRIYANSYAH', '1717bennyapr@gmail.com', '$2y$10$8GTG4GhT6ewNdgRcIhO/R.HiJ4VTZhngwr2JLDoFs2HDBY/.G4Jeu', 'SPBNY96', '081256066970', '', '2018-04-11 01:38:53', '2018-04-11 01:38:53', '6', 'KALBAR', 'PONTIANAK', 'PTK', 'KOPEGTEL PONTIANAK', 'KPT2', 'default.png', 'sales', NULL, NULL, NULL, '', '', '0000-00-00', '', '', '', '', ''),
(209, 'WERRY RAMADHAN', 'werryrm18@gmail.com', '$2y$10$eK50F74YbOfkzfvulqzZdeBI/K.Zg7H/SJ1H.qpiubuwKcaC6RuBu', 'SPWYN98', '089509822722', '', '2018-04-11 01:40:15', '2018-04-11 01:40:15', '6', 'KALBAR', 'PONTIANAK', 'PTK', 'KOPEGTEL PONTIANAK', 'KPT2', 'sFgcJpFUzF-1524298486.jpg', 'sales', '0df26eefc484a58a3ca2ae062d486a3c004e384a', 'e8b32715-47fa-4e4e-8d43-5b8288f22966', '4907529', '', '', '0000-00-00', '', '', '', '', ''),
(210, 'JULIUS FERDINAND', 'juliusferdinan96@gmail.com', '$2y$10$R6GOJEPCK8XVoMX/k5ywKewpnlMv6ImbAPxG7.sholV5p0R3lI4QG', 'SPJLS96', '0897-112-4585', '', '2018-04-11 01:41:41', '2018-04-19 20:33:15', '6', 'KALBAR', 'KETAPANG', 'KTP', 'KOPEGTEL PONTIANAK', 'KPT3', 'default.png', 'sales', NULL, NULL, NULL, '', '', '2030-01-11', '', '', '', '', ''),
(211, 'Renaldi Agus Ferdiawan', 'ryanjonesilluminati@gmail.com', '$2y$10$IgABY3EzURAGbtMCXKYqJ.Y68yYnfKQN3Lmj6odcBbGfkuNvpgYCq', 'SPREN11', '082250176070', '', '2018-04-11 18:57:48', '2018-04-11 18:57:48', '6', 'KALTARA', 'TARAKAN', 'TRK', 'KOPEGTEL TARAKAN', 'KTA', 'default.png', 'sales', '3fa2a72d33bf8aae319aacceafaccfb836d5c973', '29ef1177-a4f1-4beb-b2c0-488858e83786', '4907529', '', '', '0000-00-00', '', '', '', '', ''),
(212, 'sofian budiatmo', 'sofian.tkj25@gmail.com', '$2y$10$wq..giYEvI2BI6wOhEykZ.537TZ9..e7JlpX0u/jyPWNaoPjDiTqS', 'SPSFN93', '085249330088', '', '2018-04-11 19:00:18', '2018-04-11 19:00:18', '6', 'KALTARA', 'TARAKAN', 'TRK', 'KOPEGTEL BALIKPAPAN', 'KBP', 'default.png', 'sales', '8040173721c73c691c8f7228e652379934a8c1bb', '87d95d5b-3e5d-4edf-8e3d-410da3cd0e1b', '4907529', '', '', '0000-00-00', '', '', '', '', ''),
(213, 'Yogi surya iqwa sukmana', 'yogisurya64@gmail.com', '$2y$10$2lxFsegW9gyVCYtMEs/TQeImSBCvVssoLzuJgMmbo3Q2mLphz8zpi', 'SPYOGIS', '082254809830', '', '2018-04-11 19:03:00', '2018-04-13 21:12:31', '6', 'KALTARA', 'BERBULU', 'TSL', 'KOPEGTEL TARAKAN', 'KTA', '5TUMoaFM7h-1523898279.jpg', 'sales', '1d719058f276e081396106897fb97e00430b17c9', '686f76f6-d0c2-43a0-a453-93577d36a689', '4905871', '', '', '0000-00-00', '', '', '', '', ''),
(214, 'Adinda virda aini', 'adindavirdaaini@gmail.com', '$2y$10$7jWvBvuSNZbAi4cSCB679eYUu8N6eq7DQHOb0yt/RWkzrP0BeqeiC', 'SPADA98', '085251928040', '', '2018-04-13 06:34:16', '2018-04-13 06:52:04', '6', 'KALTARA', 'BERBULU', 'TSL', 'KOPEGTEL TARAKAN', 'KTA', 'default.png', 'sales', NULL, NULL, NULL, '', '', '0000-00-00', '', '', '', '', ''),
(215, 'Anggraeni Rakasiwi. H', 'anggraenirakasiwi@gmail.com', '$2y$10$jLfDtVagFMfSUS7c2umaKuOu6M5QPwrdXiQZXC7gRQTf.Gy3Nbb3W', 'SPENI96', '085245819817', '', '2018-04-13 06:39:19', '2018-04-13 06:58:16', '6', 'KALTARA', 'BERBULU', 'TRD', 'KOPEGTEL BALIKPAPAN', 'KBP', 'default.png', 'sales', NULL, NULL, NULL, '', '', '0000-00-00', '', '', '', '', ''),
(216, 'fitrio sahdan andriano', 'fitriosahdan.tsl@gmail.com', '$2y$10$5WRdyrpwu/oJPa9ZfEs/x.4fPn.AMefYLXZSatXABGUH43tn3yysm', 'SPFDD90', '082157096584', '', '2018-04-13 06:43:57', '2018-04-13 06:57:21', '6', 'KALTARA', 'BERBULU', 'TSL', 'KOPEGTEL TARAKAN', 'KTA', 'default.png', 'sales', NULL, NULL, NULL, '', '', '0000-00-00', '', '', '', '', ''),
(217, 'Francis Markus', 'ancizrb89@gmail.com', '$2y$10$/Li4rIzzU3kYzmTDGgt92OWG9eKJzoRqCr5eBft7WUApBCkCQtD9C', 'SPFRA89', '082251911854', '', '2018-04-13 06:50:18', '2018-04-13 06:50:18', '6', 'KALTARA', 'BERBULU', 'TSL', 'KOPEGTEL TARAKAN', 'KTA', 'default.png', 'sales', NULL, NULL, NULL, '', '', '0000-00-00', '', '', '', '', ''),
(218, 'HELTY', 'heltymhonica16okt99@gmail.com', '$2y$10$N.ximaXPJQ.Lo7.gPcyjzOLvkEKxGn7wi4bicewXFfUWL4CjIpaHm', 'SPHTY99', '085399276863', '', '2018-04-13 07:00:33', '2018-04-13 07:00:33', '6', 'KALTARA', 'BERBULU', 'TRD', 'KOPEGTEL TARAKAN', 'KTA', 'default.png', 'sales', '775373b00149d25ac1ce4a21eecec918e8d8ba56', 'c199e223-0ffb-4455-a09c-0ed37c7cd137', '4893492', '', '', '0000-00-00', '', '', '', '', ''),
(219, 'HERU KURNIAWAN', 'heruk081188@gmail.com', '$2y$10$irSk5X5SHzRnOsWRWQAgv.HFSF52Xe4eKnqOGPj.G3Qz1Hg30daiq', 'SPXHER2', '082251609348', '', '2018-04-13 07:02:51', '2018-04-13 07:02:51', '6', 'KALTARA', 'BERBULU', 'TRD', 'KOPEGTEL BALIKPAPAN', 'KBP', 'default.png', 'sales', NULL, NULL, NULL, '', '', '0000-00-00', '', '', '', '', ''),
(220, 'ISMAIL SYAMSUDDIN', 'smhailandoli93@gmail.com', '$2y$10$ER19TpJ533s7T/QczAfcmeoUkE5B45tKadepF.zt01ouoG1u1ALaS', 'SPLID95', '082255676478', '', '2018-04-13 07:13:24', '2018-04-13 07:14:31', '6', 'KALTARA', 'BERBULU', 'TRD', 'KOPEGTEL TARAKAN', 'KTA', 'default.png', 'sales', NULL, NULL, NULL, '', '', '0000-00-00', '', '', '', '', ''),
(221, 'KURNIAWATI', 'cv.khalishah@yahoo.com', '$2y$10$ctaNGrgfL7ZXgjg/92RI0uBAPdDuWTheZWZQexA1Hop/lcn2efIvq', 'SPNIA20', '085222206767', '', '2018-04-13 07:17:48', '2018-04-13 07:17:48', '6', 'KALTARA', 'TARAKAN', 'TRK', 'KOPEGTEL BALIKPAPAN', 'KBP', 'default.png', 'sales', NULL, NULL, NULL, '', '', '0000-00-00', '', '', '', '', ''),
(222, 'MASTANG', 'smhailandoli93@gmail.com', '$2y$10$o2W2ZIQ2RVYecSdFfjl4p.kCwR95vg5OoBbhNeDhNTO5G/Xagj98a', 'SPLID95', '082255676478', '', '2018-04-13 07:19:39', '2018-04-13 07:19:39', '6', 'KALTARA', 'BERBULU', 'TRD', 'KOPEGTEL TARAKAN', 'KTA', 'default.png', 'sales', NULL, NULL, NULL, '', '', '0000-00-00', '', '', '', '', ''),
(223, 'Rahmawan Efendi', 'rahmawan.tsl@gmail.com', '$2y$10$lBIptw7PNe8zUvoJov7ZTecf349V4JelhIAiPV2G62ze7Z2vcYhs2', 'SPRMW95', '081333866876', '', '2018-04-13 07:22:54', '2018-04-16 07:55:15', '6', 'KALTARA', 'BERBULU', 'TSL', 'KOPEGTEL TARAKAN', 'KTA', 'VAcqrJzBFJ-1523881280.jpg', 'sales', '517cf5c14d38de7fa61a677afb49a35975e79a30', 'e88b4042-63d0-45d5-bb04-22192689655f', NULL, '', '', '2030-01-11', '', '', '', '', ''),
(224, 'SISWANTO SLAMET WIDODO', 'rivabbest@gmail.com', '$2y$10$J5Qw/ddS69gJrOo5b/NreeavOBaw9dxvfoeJHwFirXgZkac7SOmeW', 'SPSSW77', '085388211690', '', '2018-04-13 08:23:51', '2018-04-13 08:23:51', '6', 'KALTARA', 'NUNUKAN', 'NNK', 'KOPEGTEL BALIKPAPAN', 'KBP', 'default.png', 'sales', NULL, NULL, NULL, '', '', '0000-00-00', '', '', '', '', ''),
(227, 'AGUNG PRASETYO', 'agungfiya070310@gmail.com', '$2y$10$6WRkrWvQf2Q9PXAXANIzNOQH6U4LjO7aagPxjnm6Qmhww2gqWcsZe', 'SPAPO94', '082153783422', '', '2018-04-17 22:14:35', '2018-04-17 22:14:35', '6', 'KALTENG', 'PALANGKARAYA', 'PLK', 'KOPKAR TELKOM ICC PALANGKARAYA', 'ICC', 'default.png', 'sales', '911fa4ee7a26bae525c6fef6000dd4e75d319e3b', NULL, NULL, '', '', '0000-00-00', '', '', '', '', ''),
(228, 'RUDY', 'rudy.kianfung@gmail.com', '$2y$10$FwO2QM3K1WuTF5xAKYiHwerMQaBq3.Tbghi95asd.VnYGK6IQ3ZIi', 'OLRUUDY', '081345264916', '', '2018-04-18 23:08:33', '2018-04-18 23:08:33', '6', 'KALBAR', 'PONTIANAK', 'PTK', 'KOPEGTEL BALIKPAPAN', 'kosong', 'default.png', 'sales', NULL, NULL, NULL, '', '', '0000-00-00', '', '', '', '', ''),
(229, 'HERU PURNOMO MATA RATU', 'herumarta90@gmail.com', '$2y$10$WqrUKviinch5ExujBNNGk.Go5p5hV1wRgRWSSNiy3NhaDZmj44Xyu', 'OLHEROO', '082153979334', '', '2018-04-18 23:11:29', '2018-04-18 23:11:29', '6', 'KALBAR', 'PONTIANAK', 'PTK', 'KOPEGTEL BALIKPAPAN', 'kosong', 'default.png', 'sales', NULL, NULL, NULL, '', '', '0000-00-00', '', '', '', '', ''),
(230, 'HERU PURNOMO MATA RATU', 'herumarta90@gmail.com', '$2y$10$YFy59hIPY1Yq7JdFdQeH0OCTIGtiZJnd3A1C9tjOjJWp7VdKK3J2m', 'OLHEROO', '082153979334', '', '2018-04-18 23:11:33', '2018-04-18 23:11:33', '6', 'KALBAR', 'PONTIANAK', 'PTK', 'KOPEGTEL BALIKPAPAN', 'kosong', 'default.png', 'sales', NULL, NULL, NULL, '', '', '0000-00-00', '', '', '', '', ''),
(231, 'AFNAN SHERLY', 'afnanshirly@gmail.com', '$2y$10$6ISWtAhMBa0zwV7HQl6iYu3eh.m65JJ90hT7aZRkpI0Bt78Mmd1YO', 'OLASHFA', '085245776890', '', '2018-04-18 23:13:01', '2018-04-18 23:13:01', '6', 'KALBAR', 'PONTIANAK', 'PTK', 'KOPEGTEL BALIKPAPAN', 'kosong', 'default.png', 'sales', NULL, NULL, NULL, '', '', '0000-00-00', '', '', '', '', ''),
(232, 'FITRININGSIH', 'lidyaagithaa99@gmail.com', '$2y$10$Hmf35IL6EQ/D1Q8.PZsXo.bbeCSyLh0g7lLWx/GCInajeoQspo8jG', 'OLNBR99', '081352499311', '', '2018-04-18 23:16:05', '2018-04-18 23:16:05', '6', 'KALBAR', 'PONTIANAK', 'PTK', 'KOPEGTEL BALIKPAPAN', 'kosong', 'default.png', 'sales', NULL, NULL, NULL, '', '', '0000-00-00', '', '', '', '', ''),
(233, 'gg', 'gg', '$2y$10$d.nN310nidJ0n9Bfso6KQOrywGS8cNpYQjeNDIVSI7EVZzxORtR32', 'OLAWS84', '245', '', '2018-05-21 11:16:54', '2018-05-21 11:16:54', '6', 'KALBAR', 'PONTIANAK', 'PTK', 'TELKOM', 'Afifnichi', 'default.png', 'sales', NULL, NULL, NULL, '', '', '1990-05-31', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `sto`
--

CREATE TABLE `sto` (
  `id` int(3) NOT NULL,
  `id_datel` int(3) NOT NULL,
  `sto` varchar(50) NOT NULL,
  `area` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sto`
--

INSERT INTO `sto` (`id`, `id_datel`, `sto`, `area`) VALUES
(1, 1, 'JAW', 'JAWI'),
(2, 1, 'PTK', 'PONTIANAK'),
(3, 1, 'STA', 'SIANTAN'),
(4, 7, 'bnm', 'banama');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_log`
--

CREATE TABLE `tbl_log` (
  `id` int(11) NOT NULL,
  `id_sales` int(11) NOT NULL,
  `log` text NOT NULL,
  `waktu` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_log`
--

INSERT INTO `tbl_log` (`id`, `id_sales`, `log`, `waktu`) VALUES
(1, 1, 'cob coba mania, biar sehat ', '2018-03-08 05:24:06'),
(2, 1, 'coba lagi', '2018-03-29 18:22:14'),
(3, 2, 'ini yg 2', '2018-03-30 14:05:07'),
(4, 2, 'yang yang 2.1', '2018-03-30 16:19:08'),
(5, 1, 'yang ini 1.3', '2018-03-30 15:20:24'),
(6, 2, 'ini 31', '2018-03-31 09:08:11'),
(7, 2, 'ini tanggal 02 senin', '2018-04-02 11:28:36'),
(8, 1, 'ini id 1 senin tanggal 02 ', '2018-04-02 20:32:27');

-- --------------------------------------------------------

--
-- Table structure for table `teknisi`
--

CREATE TABLE `teknisi` (
  `id` int(3) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `no_telegram` varchar(15) NOT NULL,
  `regional` varchar(50) NOT NULL,
  `witel` varchar(50) NOT NULL,
  `datel` varchar(50) NOT NULL,
  `sto` varchar(50) NOT NULL,
  `role` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teknisi`
--

INSERT INTO `teknisi` (`id`, `nama`, `email`, `no_telegram`, `regional`, `witel`, `datel`, `sto`, `role`, `created_at`, `updated_at`) VALUES
(1, 'Joko Susanto', 'jokosusantopontianak@gmail.com', '082255535084', '6', 'KALBAR', 'PONTIANAK', 'JAW,PTK', 'Team Leader', '2018-03-17 12:57:15', '2018-04-15 20:22:25'),
(6, 'df', 'df', 'b', '6', 'KALSEL', 'PONTIANAK', 'JAW,PTK,STA', 'Teknisi', '2018-03-28 01:43:42', '2018-03-28 01:59:10');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(3) NOT NULL,
  `level` varchar(20) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `foto_profil` varchar(200) NOT NULL,
  `witel` varchar(50) NOT NULL,
  `remember_token` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `level`, `username`, `password`, `foto_profil`, `witel`, `remember_token`) VALUES
(1, 'super', 'onecall_admin', '$2y$10$vPjolgnrd7UFM0nIr7Vlvu62KISoB/Fvf34h.TvrrssyMwYRryKYC', '8badb744f15eea1fecd27bda9f7ee1e9.jpg', '', 'VgpiN4KtYTqdh76rBzkP6flN7zYDl6HI03IT7ChKmm2ARm53yevBis6es9yt'),
(2, 'admin', 'joko_sst', '$2y$10$ghlcrkxcILxoS8scKhuIbOzi3n4ojq2kFBZtyLgbxSl84ApEAibaC', '6705e8d0bf042cdc6af264c854e9e554.png', 'KALBAR', 'MNxUmisHeq0QWDLP7S2EfclJiMiUhH3IVT2Uw0714DZVXsa9pZOmuXMqA1RA'),
(3, 'admin', 'dc', '$2y$10$FceUhSMsU82m9bPKGRK2W.lxwJ7y9UVK53uyA6wFE8pGpi5bCezQy', 'admin.png', 'KALSEL', 'N7zG04FPQxRO2YXDOusxxU9KJe4aM6yu7dCQJAxv5EOQAANklOoLRIAkmRcE');

-- --------------------------------------------------------

--
-- Table structure for table `witel`
--

CREATE TABLE `witel` (
  `id` int(3) NOT NULL,
  `id_regional` int(3) NOT NULL,
  `witel` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `witel`
--

INSERT INTO `witel` (`id`, `id_regional`, `witel`) VALUES
(1, 6, 'KALBAR'),
(2, 6, 'KALSEL'),
(3, 6, 'KALTENG'),
(4, 7, 'gg'),
(5, 6, 'KALTARA');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_us`
--
ALTER TABLE `about_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `agency`
--
ALTER TABLE `agency`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `datel`
--
ALTER TABLE `datel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `follow`
--
ALTER TABLE `follow`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kode_agency`
--
ALTER TABLE `kode_agency`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `points`
--
ALTER TABLE `points`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `regional`
--
ALTER TABLE `regional`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sto`
--
ALTER TABLE `sto`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_log`
--
ALTER TABLE `tbl_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teknisi`
--
ALTER TABLE `teknisi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `witel`
--
ALTER TABLE `witel`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_us`
--
ALTER TABLE `about_us`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `agency`
--
ALTER TABLE `agency`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `datel`
--
ALTER TABLE `datel`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `follow`
--
ALTER TABLE `follow`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=203;
--
-- AUTO_INCREMENT for table `kode_agency`
--
ALTER TABLE `kode_agency`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `points`
--
ALTER TABLE `points`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `regional`
--
ALTER TABLE `regional`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=234;
--
-- AUTO_INCREMENT for table `sto`
--
ALTER TABLE `sto`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_log`
--
ALTER TABLE `tbl_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `teknisi`
--
ALTER TABLE `teknisi`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `witel`
--
ALTER TABLE `witel`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
