-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 28, 2022 at 08:04 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `a_wisata`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `email` varchar(55) NOT NULL,
  `pass` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`email`, `pass`) VALUES
('ronald@gmail.com', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminID` char(4) NOT NULL,
  `adminNAMA` varchar(30) NOT NULL,
  `adminEMAIL` varchar(60) NOT NULL,
  `adminPASSWORD` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminID`, `adminNAMA`, `adminEMAIL`, `adminPASSWORD`) VALUES
('A001', 'Jone', 'jone@yahoo.com', '81dc9bdb52d04dc20036dbd8313ed055'),
('A002', 'Alex', 'alex@yahoo.com', 'd93591bdf7860e1e4ee2fca799911215'),
('A003', 'Ronald Lie', 'ronald@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055');

-- --------------------------------------------------------

--
-- Table structure for table `area`
--

CREATE TABLE `area` (
  `areaID` char(4) NOT NULL,
  `areanama` char(25) NOT NULL,
  `areawilayah` char(35) NOT NULL,
  `areaketerangan` varchar(255) NOT NULL,
  `provinsiID` char(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `area`
--

INSERT INTO `area` (`areaID`, `areanama`, `areawilayah`, `areaketerangan`, `provinsiID`) VALUES
('AR01', 'Lembang', 'Jayapura', '', '01'),
('AR02', 'Ledeng', 'Bandung Utara', '', '02'),
('AR03', 'Dago', 'Mamuju', '', '02'),
('AR04', 'Lambara', 'Tatanga', 'lambara area kota palu', '01'),
('AR05', 'panau', 'Gatotsubroto', 'panau area kota poso', '02'),
('AR06', 'Area Jalanan', 'Samosir', 'Dekat dengan jalanan', '04');

-- --------------------------------------------------------

--
-- Table structure for table `destinasi`
--

CREATE TABLE `destinasi` (
  `destinasiID` char(5) NOT NULL,
  `destinasinama` varchar(35) NOT NULL,
  `destinasialamat` varchar(255) NOT NULL,
  `kategoriID` char(4) NOT NULL,
  `areaID` char(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `destinasi`
--

INSERT INTO `destinasi` (`destinasiID`, `destinasinama`, `destinasialamat`, `kategoriID`, `areaID`) VALUES
('WS01', 'Trinity Tower', 'Jl. H. R. Rasuna Said', 'WK03', 'AR02'),
('WS02', 'The Energy Building', 'Jl. Gatot Subroto', 'WK02', 'AR04'),
('WS03', 'Luminary Building', 'Jl. Jend. Sudirman', 'WK01', 'AR01'),
('WS04', 'World Capital Tower', 'Jl. Mega Kuningan Barat', 'WK04', 'AR03'),
('WS05', 'Gama Tower', 'Jl. H. R. Rasuna Said', 'WK02', 'AR01'),
('WS06', 'Autograph Tower', 'Jl. M. H. Thamrin', 'WK03', 'AR05');

-- --------------------------------------------------------

--
-- Table structure for table `fotodestinasi`
--

CREATE TABLE `fotodestinasi` (
  `fotoID` char(5) NOT NULL,
  `fotonama` char(60) NOT NULL,
  `destinasiID` char(4) NOT NULL,
  `fotofile` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fotodestinasi`
--

INSERT INTO `fotodestinasi` (`fotoID`, `fotonama`, `destinasiID`, `fotofile`) VALUES
('F001', 'Gedung 1', 'WS01', 'building (1).jpg'),
('F002', 'Gedung 2', 'WS05', 'building (2).jpg'),
('F003', 'Gedung 3', 'WS04', 'building (3).jpg'),
('F004', 'Gedung 4', 'WS02', 'building (4).jpg'),
('F005', 'Gedung 5', 'WS03', 'building (5).jpg'),
('F006', 'Gedung 6', 'WS05', 'building (6).jpg');

-- --------------------------------------------------------

--
-- Table structure for table `kabupaten`
--

CREATE TABLE `kabupaten` (
  `kabupatenID` char(4) NOT NULL,
  `kabupatennama` varchar(45) NOT NULL,
  `kabupatenketerangan` varchar(155) NOT NULL,
  `provinsiID` char(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kabupaten`
--

INSERT INTO `kabupaten` (`kabupatenID`, `kabupatennama`, `kabupatenketerangan`, `provinsiID`) VALUES
('KB01', 'Poso', 'Kabupaten Poso adalah sebuah kabupaten yang berada di provinsi Sulawesi Tengah, Indonesia.', '01'),
('KB02', 'Buol', 'Buol adalah kota dan pusat administrasi Kabupaten Buol, di Provinsi Sulawesi Tengah Indonesia.', '01'),
('KB03', 'Sigi', 'Kabupaten Sigi adalah sebuah kabupaten yang berada di Provinsi Sulawesi Tengah, Indonesia.', '01'),
('KB04', 'Bone', 'Kabupaten Bone adalah salah satu Daerah otonom di provinsi Sulawesi Selatan, Indonesia.', '02'),
('KB05', 'Minahasa', 'Kabupaten Minahasa adalah salah satu kabupaten yang berada di provinsi Sulawesi Utara, Indonesia.', '03'),
('KB06', 'Mamasa', 'Kabupaten Mamasa adalah salah satu Daerah Tingkat II atau kabupaten yang berada di Provinsi Sulawesi Barat, Indonesia.', '04'),
('KB07', 'Palu Barat', 'Nunu palu ngataku', '01');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `kategoriID` char(4) NOT NULL,
  `kategorinama` char(30) NOT NULL,
  `kategoriketerangan` varchar(255) NOT NULL,
  `kategorireferensi` char(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`kategoriID`, `kategorinama`, `kategoriketerangan`, `kategorireferensi`) VALUES
('test', 'test', 'test', 'test'),
('WK01', 'Alam', 'gedung perusahaan besar', 'buku'),
('WK02', 'Budaya', 'Bangunan modern kaca', 'Buku'),
('WK03', 'Pantai', 'Gedung tinggi pencakar langit', 'Pengguna'),
('WK04', 'Religi', 'Tower Building Group', 'Buku'),
('WK05', 'Pesona', 'pesona Indonesia', 'Koran');

-- --------------------------------------------------------

--
-- Table structure for table `kecamatan`
--

CREATE TABLE `kecamatan` (
  `kecamatanID` char(4) NOT NULL,
  `kecamatannama` varchar(35) NOT NULL,
  `kelurahan` varchar(65) NOT NULL,
  `kabupatenID` char(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kecamatan`
--

INSERT INTO `kecamatan` (`kecamatanID`, `kecamatannama`, `kelurahan`, `kabupatenID`) VALUES
('KC01', 'Palu Selatan', 'Tatura Selatan', 'KB01'),
('KC02', 'Parigi', 'Parigi Moutong', 'KB03'),
('KC03', 'Mamuju', 'Budong-budong', 'KB06'),
('KC04', 'Malalayang', 'Tatura', 'KB05'),
('KC05', 'Mahakaraya', 'Nyoman', 'KB07');

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan`
--

CREATE TABLE `kegiatan` (
  `eventKODE` char(10) NOT NULL,
  `eventNAMA` varchar(255) NOT NULL,
  `kabupatenKODE` char(5) NOT NULL,
  `eventKET` text NOT NULL,
  `eventMULAI` date NOT NULL,
  `eventSELESAI` date NOT NULL,
  `eventPOSTER` varchar(120) NOT NULL,
  `eventSUMBER` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kegiatan`
--

INSERT INTO `kegiatan` (`eventKODE`, `eventNAMA`, `kabupatenKODE`, `eventKET`, `eventMULAI`, `eventSELESAI`, `eventPOSTER`, `eventSUMBER`) VALUES
('EV00000001', 'Palu Nomoni 2018', 'KB07', 'Siapa yang sudah pernah ke Palu? Kesan pertama saat tiba di kota tersebut pastinya keluhan akan cuaca yang super panas. Tapi tenang, itu hanya cuaca, orang-orang di sana sangatlah ramah. Apalagi bila berbicara perihal kolektif seni, jumlahnya tumpah ruah. Mulai dari seni musik, visual, hingga teater, semua ada pelakunya. Palu, sebagai Ibu Kota provinsi yang terletak di tengah pulau Sulawesi ini menyimpan banyak sekali hal-hal unik nan bagus di dalamnya.', '2020-09-28', '2018-10-02', 'palunomoni.jpg', 'Soal Palu'),
('EV00000002', 'Makassar Sound Space', 'KB06', 'Makassar Sound Space (MSS) sendiri menawarkan pengalaman unik. Diisi oleh 11 musisi dan grup, beberapa di antaranya akan berkolaborasi. Bagi penyuka musik keras, unit hardcore Frontxside berpadu dengan grup heavy rock/metal Middle Finger. Kemudian band britpop The Joeys jadi \"pasangan\" kuartet post-hardcore Paniki Hate Light.', '2021-04-10', '2021-04-15', 'makassarevent.png', 'Makssar News'),
('EV00000003', 'Manado Fiesta Fair', 'KB05', 'Festival Fantastis Manado Fiesta 2017 merupakan bagian dari event kalender Manado 2017 yang diluncurkan pada tahun 2016 dengan  menampilkan sejumlah besar peristiwa menarik sepanjang tahun, dari acara mingguan hingga acara bulanan khusus.\r\n\r\nDidorong oleh lonjakan wisatawan internasional tahun ini yang terutama berasal dari China, Manado saat ini melayani 9 penerbangan internasional dari 9 kota ke Manado: 1 dari Singapura, dan 8 dari China yaitu: Chengdu, Chongqing, Guangzhou, Wuhan, Nanchang, Changsha, Makau dan Hongkong. Dan tentu saja ada penerbangan domestik setiap hari dari Jakarta, Bali, Makassar dan lainnya.', '2017-09-01', '2017-09-10', 'manadofiesta.jpg', 'Manado Event Group');

-- --------------------------------------------------------

--
-- Table structure for table `makanan`
--

CREATE TABLE `makanan` (
  `foodID` char(4) NOT NULL,
  `foodnama` varchar(25) NOT NULL,
  `foodketerangan` varchar(500) NOT NULL,
  `foodfoto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `makanan`
--

INSERT INTO `makanan` (`foodID`, `foodnama`, `foodketerangan`, `foodfoto`) VALUES
('FD01', 'Kaledo', 'Kaki Lembu Donggala atau yang lebih dikenal dengan nama Kaledo ini adalah makanan khas masyarakat Donggala yang terletak di provinsi Sulawesi Tengah, tepatnya di kota Palu. Makanan ini mirip dengan sup buntut, bedanya tulangnya dari kaki lembu dan disajikan bukan dengan nasi melainkan dengan ubi. Tulangnya itu sendiri adalah ruas tulang lutut yang masih penuh dengan sum-sum.', 'kaledo.jpg'),
('FD02', 'Coto Makassar', 'Coto makassar atau coto mangkasara adalah makanan tradisional Makassar, Sulawesi Selatan. Makanan ini terbuat dari jeroan sapi yang direbus dalam waktu yang lama. Rebusan jeroan bercampur daging sapi ini kemudian diiris-iris lalu dibumbui dengan bumbu yang diracik secara khusus. Coto dihidangkan dalam mangkuk dan dinikmati dengan ketupat dan buras, yakni sejenis ketupat yang dibungkus daun pisang.', 'coto.jpg'),
('FD03', 'Sate Padang', 'Sate Padang adalah sebutan untuk tiga jenis varian sate di Sumatra Barat, yaitu Sate Padang, Sate Padang Panjang dan Sate Pariaman. Sate Padang memakai bahan daging sapi, lidah, atau jerohan (jantung, usus, dan tetelan) dengan bumbu kuah kacang kental (mirip bubur) ditambah cabai yang banyak sehingga rasanya pedas. Sate Padang Panjang dibedakan dengan kuah sate nya yang berwarna kuning sedangkan sate Pariaman kuahnya berwarna merah. Rasa kedua jenis sate ini juga berbeda.', 'satepadang.jpg'),
('FD04', 'Rendang', 'Rendang atau randang adalah masakan daging asli Indonesia yang berasal dari Minangkabau. Masakan ini dihasilkan dari proses memasak suhu rendah dalam waktu lama menggunakan aneka rempah-rempah dan santan. Proses memasaknya memakan waktu berjam-jam (biasanya sekitar empat jam) hingga yang tinggal hanyalah potongan daging berwarna hitam pekat dan dedak.', 'rendang.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `provinsi`
--

CREATE TABLE `provinsi` (
  `provinsiID` char(4) NOT NULL,
  `provinsiNama` char(35) NOT NULL,
  `provinsiTglBerdiri` date NOT NULL,
  `provinsifoto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `provinsi`
--

INSERT INTO `provinsi` (`provinsiID`, `provinsiNama`, `provinsiTglBerdiri`, `provinsifoto`) VALUES
('01', 'Sulawesi Tengah', '1964-04-13', 'sulteng.jpg'),
('02', 'Sulawesi Selatan', '1969-10-10', 'sulsel.jpg'),
('03', 'Sulawesi Utara', '1964-09-23', 'sulut.jpg'),
('04', 'Sulawesi Barat', '2004-10-05', 'sulbar.jpg'),
('05', 'Sumatera Barat', '2021-11-22', 'airbebatuan.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `saran`
--

CREATE TABLE `saran` (
  `nama` varchar(30) NOT NULL,
  `masukan` varchar(100) NOT NULL,
  `rating` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `saran`
--

INSERT INTO `saran` (`nama`, `masukan`, `rating`) VALUES
('Budi', 'Terus kembangkan website ini, semangat.', 'Baik'),
('dedi', 'kereennnn', 'Baik'),
('Jojo', 'terus kembangkan sangat menarik', 'Sangat Baik'),
('Kelvin', 'Semoga website ini di jual, saya sangat tertarik', 'Sangat Baik'),
('Ronald Lie', 'Semoga website ini terus di kembangkan dengan baik', 'Sangat Baik');

-- --------------------------------------------------------

--
-- Table structure for table `tiket`
--

CREATE TABLE `tiket` (
  `tiketID` char(4) NOT NULL,
  `tiketkelas` varchar(15) NOT NULL,
  `tiketwisata` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tiket`
--

INSERT INTO `tiket` (`tiketID`, `tiketkelas`, `tiketwisata`) VALUES
('TK01', 'VIP', 'Kebun Binatang'),
('TK02', 'Non VIP', 'Hutan'),
('TK03', 'Non VIP', 'Pantai'),
('TK04', 'VVIP', 'Pegunungan');

-- --------------------------------------------------------

--
-- Table structure for table `villa`
--

CREATE TABLE `villa` (
  `villaID` char(4) NOT NULL,
  `villaname` varchar(35) NOT NULL,
  `villaketerangan` varchar(255) NOT NULL,
  `villafoto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `villa`
--

INSERT INTO `villa` (`villaID`, `villaname`, `villaketerangan`, `villafoto`) VALUES
('VL01', 'Villa Lalovee', 'Villa dengan nuansa pegunungan, dengan bangunan yang besar disertai dengan suara ombak pantai.', 'villa(3).jpg'),
('VL02', 'Villa Citra', 'Villa dengan nuansa pinggir pantai, bangunan minimalis sangat cocok untuk satu keluarga utama.', 'villa(2).jpg'),
('VL03', 'Villa Doda', 'Villa ini mengelilingi kolam, dan kita bisa bertemu dan berinteraksi dengan penghuni lain, sangat cocok untuk keluarga besar dan sahabat.', 'villa(1).jpg'),
('VL04', 'Villa Maldives', 'Villa ini terletak di pulau kecil, dan berdiri diatas air sehingga memberikan pengalaman yang baru dan menarik.', 'villa(4).jpg'),
('VL05', 'Villa Midi', 'Villa ini berada dipinggir pantai, sehingga sangat cocok untuk meraka yang ingin berlibur menikmati pantai dan suset.', 'villa(5).jpg'),
('VL06', 'Villa Magnolia', 'Villa ini menggunakan konsep bangunan lama, maka para penghuni lebih merasakan pengalaman tinggal dengan nuansa bangunan lama.', 'villa(6).jpg'),
('VL07', 'Villa Modern', 'Villa Masa depan dengan teknologi', 'villa(7).jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminID`);

--
-- Indexes for table `area`
--
ALTER TABLE `area`
  ADD PRIMARY KEY (`areaID`),
  ADD KEY `provinsiID` (`provinsiID`);

--
-- Indexes for table `destinasi`
--
ALTER TABLE `destinasi`
  ADD PRIMARY KEY (`destinasiID`),
  ADD KEY `KategoriID` (`kategoriID`),
  ADD KEY `areaID` (`areaID`);

--
-- Indexes for table `fotodestinasi`
--
ALTER TABLE `fotodestinasi`
  ADD PRIMARY KEY (`fotoID`),
  ADD KEY `destinasiID` (`destinasiID`);

--
-- Indexes for table `kabupaten`
--
ALTER TABLE `kabupaten`
  ADD PRIMARY KEY (`kabupatenID`),
  ADD KEY `provinsiID` (`provinsiID`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`kategoriID`);

--
-- Indexes for table `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD PRIMARY KEY (`kecamatanID`),
  ADD KEY `kabupatenID` (`kabupatenID`);

--
-- Indexes for table `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD PRIMARY KEY (`eventKODE`),
  ADD KEY `kabupatenKODE` (`kabupatenKODE`);

--
-- Indexes for table `makanan`
--
ALTER TABLE `makanan`
  ADD PRIMARY KEY (`foodID`);

--
-- Indexes for table `provinsi`
--
ALTER TABLE `provinsi`
  ADD PRIMARY KEY (`provinsiID`);

--
-- Indexes for table `saran`
--
ALTER TABLE `saran`
  ADD PRIMARY KEY (`nama`);

--
-- Indexes for table `tiket`
--
ALTER TABLE `tiket`
  ADD PRIMARY KEY (`tiketID`);

--
-- Indexes for table `villa`
--
ALTER TABLE `villa`
  ADD PRIMARY KEY (`villaID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `area`
--
ALTER TABLE `area`
  ADD CONSTRAINT `provinsiID` FOREIGN KEY (`provinsiID`) REFERENCES `provinsi` (`provinsiID`);

--
-- Constraints for table `destinasi`
--
ALTER TABLE `destinasi`
  ADD CONSTRAINT `KategoriID` FOREIGN KEY (`kategoriID`) REFERENCES `kategori` (`kategoriID`);

--
-- Constraints for table `fotodestinasi`
--
ALTER TABLE `fotodestinasi`
  ADD CONSTRAINT `destinasiID` FOREIGN KEY (`destinasiID`) REFERENCES `destinasi` (`destinasiID`);

--
-- Constraints for table `kabupaten`
--
ALTER TABLE `kabupaten`
  ADD CONSTRAINT `kabupaten_ibfk_1` FOREIGN KEY (`provinsiID`) REFERENCES `provinsi` (`provinsiID`);

--
-- Constraints for table `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD CONSTRAINT `kecamatan_ibfk_1` FOREIGN KEY (`kabupatenID`) REFERENCES `kabupaten` (`kabupatenID`);

--
-- Constraints for table `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD CONSTRAINT `kegiatan_ibfk_1` FOREIGN KEY (`kabupatenKODE`) REFERENCES `kabupaten` (`kabupatenID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
