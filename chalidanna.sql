-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 19, 2020 at 02:09 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chalidanna`
--

-- --------------------------------------------------------

--
-- Table structure for table `blok`
--

CREATE TABLE `blok` (
  `IDBlok` varchar(255) NOT NULL,
  `IDCluster` int(11) DEFAULT NULL,
  `IDCustomer` varchar(255) DEFAULT NULL,
  `Harga` int(11) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blok`
--

INSERT INTO `blok` (`IDBlok`, `IDCluster`, `IDCustomer`, `Harga`, `type`) VALUES
('101B4/27', 3, 'Cust148', 75000, '10'),
('101B4/28', 3, 'Cust147', 75000, '10'),
('103A2/17', 3, 'Cust146', 75000, '10'),
('103A2/18', 3, 'Cust145', 75000, '10'),
('103A2/20', 3, 'Cust144', 75000, '10'),
('103A2/27', 3, 'Cust143', 75000, '10'),
('103B5/01', 3, 'Cust142', 75000, '10'),
('103B5/02', 3, 'Cust141', 75000, '10'),
('103B5/05', 3, 'Cust140', 75000, '10'),
('103B5/06', 3, 'Cust139', 75000, '10'),
('103B5/07', 3, 'Cust138', 75000, '10'),
('103B5/08', 3, 'Cust137', 75000, '10'),
('103B5/09', 3, 'Cust136', 75000, '10'),
('103B5/10', 3, 'Cust135', 75000, '10'),
('103B5/11', 3, 'Cust134', 75000, '10'),
('103B5/12A', 3, 'Cust133', 75000, '10'),
('103B5/12B', 3, 'Cust132', 75000, '10'),
('103B5/16', 3, 'Cust131', 75000, '10'),
('110B1/04', 3, 'Cust130', 75000, '11'),
('110B1/05', 3, 'Cust129', 75000, '11'),
('110B1/06', 3, 'Cust128', 75000, '11'),
('110B1/07', 3, 'Cust127', 75000, '11'),
('110B2/02', 3, 'Cust126', 75000, '11'),
('110B2/03', 3, 'Cust125', 75000, '11'),
('110B4/21', 3, 'Cust124', 75000, '11'),
('40C5/08', 3, 'Cust123', 75000, '40'),
('40C5/10', 3, 'Cust122', 75000, '40'),
('44A1/02', 3, 'Cust121', 75000, '44'),
('48B6/02', 3, 'Cust120', 75000, '48'),
('48B6/04', 3, 'Cust119', 75000, '48'),
('48B6/05', 3, 'Cust118', 75000, '48'),
('48B6/06', 3, 'Cust117', 75000, '48'),
('48B6/12A', 3, 'Cust116', 75000, '48'),
('48B6/12B', 3, 'Cust115', 75000, '48'),
('48B6/14', 3, 'Cust114', 75000, '48'),
('48B6/16', 3, 'Cust113', 75000, '48'),
('48B6/18', 3, 'Cust112', 75000, '48'),
('48B6/19', 3, 'Cust111', 75000, '48'),
('48B6/20', 3, 'Cust110', 75000, '48'),
('48B6/21', 3, 'Cust109', 75000, '48'),
('48B6/22', 3, 'Cust108', 75000, '48'),
('48B6/23', 3, 'Cust107', 75000, '48'),
('48B6/24', 3, 'Cust106', 75000, '48'),
('48B6/25', 3, 'Cust105', 75000, '48'),
('48B6/26', 3, 'Cust104', 75000, '48'),
('48B6/28', 3, 'Cust103', 75000, '48'),
('48B6/29', 3, 'Cust102', 75000, '48'),
('48B6/30', 3, 'Cust101', 75000, '48'),
('48B6/31', 2, 'Cust100', 85000, '48'),
('48B6/32', 2, 'Cust99', 85000, '48'),
('48B6/33', 2, 'Cust98', 85000, '48'),
('48B6/34', 2, 'Cust97', 85000, '48'),
('52A3/05', 2, 'Cust96', 85000, '52'),
('52A3/06', 2, 'Cust95', 85000, '52'),
('52A3/07', 2, 'Cust94', 85000, '52'),
('52A3/09', 2, 'Cust93', 85000, '52'),
('52A3/10', 2, 'Cust92', 85000, '52'),
('52A3/12', 2, 'Cust91', 85000, '52'),
('52A3/15', 2, 'Cust90', 85000, '52'),
('52A3/16', 2, 'Cust89', 85000, '52'),
('52A3/17', 2, 'Cust88', 85000, '52'),
('52A3/18', 2, 'Cust87', 85000, '52'),
('52A3/19', 2, 'Cust86', 85000, '52'),
('52A3/20', 2, 'Cust85', 85000, '52'),
('52A3/21', 2, 'Cust84', 85000, '52'),
('52A3/22', 2, 'Cust83', 85000, '52'),
('52A3/23', 2, 'Cust82', 85000, '52'),
('52B4/01', 2, 'Cust81', 85000, '52'),
('52B4/02', 2, 'Cust80', 85000, '52'),
('52B4/03', 2, 'Cust79', 85000, '52'),
('52B4/04', 2, 'Cust78', 85000, '52'),
('52B4/06', 2, 'Cust77', 85000, '52'),
('52B4/07', 2, 'Cust76', 85000, '52'),
('52B4/08', 2, 'Cust75', 85000, '52'),
('52B4/09', 2, 'Cust74', 85000, '52'),
('52B4/10', 2, 'Cust73', 85000, '52'),
('52B4/11', 2, 'Cust72', 85000, '52'),
('52B4/12B', 2, 'Cust71', 85000, '52'),
('52B4/14', 2, 'Cust70', 85000, '52'),
('52B4/15', 2, 'Cust69', 85000, '52'),
('60B5/34', 2, 'Cust68', 85000, '60'),
('60B5/36', 2, 'Cust67', 85000, '60'),
('63B6/03', 2, 'Cust66', 85000, '63'),
('63B6/07', 2, 'Cust65', 85000, '63'),
('63B6/08', 2, 'Cust64', 85000, '63'),
('63B6/09', 2, 'Cust63', 85000, '63'),
('63B6/10', 2, 'Cust62', 85000, '63'),
('63B6/11', 2, 'Cust61', 85000, '63'),
('66B5/18', 2, 'Cust60', 85000, '66'),
('66B5/19', 2, 'Cust59', 85000, '66'),
('66B5/21', 2, 'Cust58', 85000, '66'),
('66B5/22', 2, 'Cust57', 85000, '66'),
('66B5/23', 2, 'Cust56', 85000, '66'),
('66B5/24', 2, 'Cust55', 85000, '66'),
('66B5/25', 2, 'Cust54', 85000, '66'),
('66B5/26', 2, 'Cust53', 85000, '66'),
('66B5/27', 2, 'Cust52', 85000, '66'),
('66B5/28', 1, 'Cust51', 85000, '66'),
('66B5/29', 1, 'Cust50', 80000, '66'),
('66B5/30', 1, 'Cust49', 80000, '66'),
('66B5/31', 1, 'Cust48', 80000, '66'),
('66B5/32', 1, 'Cust47', 80000, '66'),
('66B5/35', 1, 'Cust46', 80000, '66'),
('72A1/04', 1, 'Cust45', 80000, '72'),
('72A1/05', 1, 'Cust44', 80000, '72'),
('72A1/07', 1, 'Cust43', 80000, '72'),
('72A1/08', 1, 'Cust42', 80000, '72'),
('72A1/10', 1, 'Cust41', 80000, '72'),
('72A1/11', 1, 'Cust40', 80000, '72'),
('72A1/12a', 1, 'Cust39', 80000, '72'),
('72A1/12b', 1, 'Cust38', 80000, '72'),
('72A2/02', 1, 'Cust37', 80000, '72'),
('72A2/03', 1, 'Cust36', 80000, '72'),
('72A2/04', 1, 'Cust35', 80000, '72'),
('72A2/05', 1, 'Cust34', 80000, '72'),
('72A2/06', 1, 'Cust33', 80000, '72'),
('72A2/07', 1, 'Cust32', 80000, '72'),
('72A2/08', 1, 'Cust31', 80000, '72'),
('72A2/11', 1, 'Cust30', 80000, '72'),
('72A2/12A', 1, 'Cust29', 80000, '72'),
('72A2/12B', 1, 'Cust28', 80000, '72'),
('72A2/14', 1, 'Cust27', 80000, '72'),
('72A2/15', 1, 'Cust26', 80000, '72'),
('72A2/16', 1, 'Cust25', 80000, '72'),
('73B4/17', 1, 'Cust24', 80000, '73'),
('73B4/25', 1, 'Cust23', 80000, '73'),
('73B4/26', 1, 'Cust22', 80000, '73'),
('80A2/01', 1, 'Cust21', 80000, '80'),
('80B3/01', 1, 'Cust20', 80000, '80'),
('80B3/02', 1, 'Cust19', 80000, '80'),
('80B3/03', 1, 'Cust18', 80000, '80'),
('80B3/04', 1, 'Cust17', 80000, '80'),
('80B3/05', 1, 'Cust16', 80000, '80'),
('80B3/06', 1, 'Cust15', 80000, '80'),
('80B3/07', 1, 'Cust14', 80000, '80'),
('80B3/09', 1, 'Cust13', 80000, '80'),
('80B3/10', 1, 'Cust12', 80000, '80'),
('80B3/11', 1, 'Cust11', 80000, '80'),
('80B3/12a', 1, 'Cust10', 80000, '80'),
('80B3/12b', 1, 'Cust9', 80000, '80'),
('80B3/14', 1, 'Cust8', 80000, '80'),
('80B3/15', 1, 'Cust7', 80000, '80'),
('82B4/18', 1, 'Cust6', 80000, '82'),
('82B4/24', 1, 'Cust5', 80000, '82'),
('85A1/06', 1, 'Cust4', 80000, '85'),
('90B1/09', 1, 'Cust3', 80000, '90'),
('98A1/01', 1, 'Cust2', 80000, '98'),
('KVB5/17', 1, NULL, 80000, 'KV'),
('lala', 1, NULL, 90000, '10');

-- --------------------------------------------------------

--
-- Table structure for table `cluster`
--

CREATE TABLE `cluster` (
  `IDCluster` int(11) NOT NULL,
  `IDPerumahan` int(11) DEFAULT NULL,
  `nama_cluster` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cluster`
--

INSERT INTO `cluster` (`IDCluster`, `IDPerumahan`, `nama_cluster`) VALUES
(1, 2, 'Amira'),
(2, 1, 'Dedek'),
(3, 3, 'Toto'),
(4, 4, 'Dian'),
(5, 3, 'Pokko'),
(6, 1, 'koko');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `IDCustomer` varchar(255) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `nomor` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`IDCustomer`, `nama`, `nomor`, `email`) VALUES
('Cust1', 'Abisujak Ilyas', '31797', '82230@gmail.com'),
('Cust10', 'Anang Riswanto / Lelita', '26087', '63346@gmail.com'),
('Cust100', 'Muhammad Khaiyan/ Egidio', '67571', '70810@gmail.com'),
('Cust101', 'Muhammad Reza Norman/Andi oktafianto', '65507', '90407@gmail.com'),
('Cust102', 'Nancy Pasaribu', '33620', '7460@gmail.com'),
('Cust103', 'Naniek Iyatiningsih', '61750', '50265@gmail.com'),
('Cust104', 'Ninik Suryani', '52511', '81462@gmail.com'),
('Cust105', 'Nunuk Pujiastutik/Timotius', '13122', '11356@gmail.com'),
('Cust106', 'Nurhaenisani/Ahmad K', '40471', '90106@gmail.com'),
('Cust107', 'Nyoman Darmayasa SE', '90', '45153@gmail.com'),
('Cust108', 'Olly Ruswati Usmanah/Hendra', '94241', '51715@gmail.com'),
('Cust109', 'Pamungkas Swasono', '3787', '68034@gmail.com'),
('Cust11', 'Andi Yurianto', '62476', '62741@gmail.com'),
('Cust110', 'Paulus Ngatiman ', '42390', '34649@gmail.com'),
('Cust111', 'PC Subyantoro / PT.PNM', '81054', '91206@gmail.com'),
('Cust112', 'Poniyem', '19577', '53016@gmail.com'),
('Cust113', 'Rachmadi Priyadi', '84277', '79643@gmail.com'),
('Cust114', 'Reni Sumarni', '6559', '81010@gmail.com'),
('Cust115', 'RIRIN SAFRIYAH / Indah', '88868', '40886@gmail.com'),
('Cust116', 'Ririn Soelistiawati', '7504', '81436@gmail.com'),
('Cust117', 'Roni', '9317', '61518@gmail.com'),
('Cust118', 'Ronny Sutiono Gunawan', '39435', '87495@gmail.com'),
('Cust119', 'RR. Puspita / Djaswadi', '69919', '95476@gmail.com'),
('Cust12', 'Angky Dimas Fernico', '90246', '55403@gmail.com'),
('Cust120', 'Rudi Kristanto', '49643', '30635@gmail.com'),
('Cust121', 'Semi Tandjung Ningsih/Imam Asrofi', '57329', '92678@gmail.com'),
('Cust122', 'Setya Bagus W', '88498', '64275@gmail.com'),
('Cust123', 'Sian Lien', '38161', '85733@gmail.com'),
('Cust124', 'Sihartanti', '72817', '46551@gmail.com'),
('Cust125', 'Siti Aisyah/Ivone Ocktavia S (ke-2)', '64014', '97933@gmail.com'),
('Cust126', 'Sofyar Noviyanto P', '52170', '16884@gmail.com'),
('Cust127', 'Sonya Roswita Hapsari/Antonius Suliyanto', '85135', '91489@gmail.com'),
('Cust128', 'Sri Rahayu', '2638', '95378@gmail.com'),
('Cust129', 'Sriyadi', '63383', '35433@gmail.com'),
('Cust13', 'Anis Kurniawati', '42858', '63119@gmail.com'),
('Cust130', 'Sudartik Dwi Ariati/ Siani Prayogo', '48781', '22438@gmail.com'),
('Cust131', 'Suhadi', '90580', '52813@gmail.com'),
('Cust132', 'Suliad', '44488', '68698@gmail.com'),
('Cust133', 'Sutiyana', '54381', '71053@gmail.com'),
('Cust134', 'Sutjipto Judodihardjo', '84828', '90317@gmail.com'),
('Cust135', 'Sutrisno', '66209', '40961@gmail.com'),
('Cust136', 'Suyono', '42630', '91635@gmail.com'),
('Cust137', 'Swastu Bondan W', '41533', '50271@gmail.com'),
('Cust138', 'Tan Paul Wijaya H', '50828', '17018@gmail.com'),
('Cust139', 'Tan Welianto/Yudi Handoko', '30645', '35883@gmail.com'),
('Cust14', 'Anton Chandra Tjan', '33798', '29670@gmail.com'),
('Cust140', 'Tanty Wijaya', '57830', '24778@gmail.com'),
('Cust141', 'Tiny Wijaya', '25603', '35669@gmail.com'),
('Cust142', 'Ussio Shianni', '67444', '15904@gmail.com'),
('Cust143', 'Wenny Hersilatty', '85666', '87726@gmail.com'),
('Cust144', 'Yayuk Rahmawati', '19537', '71299@gmail.com'),
('Cust145', 'Yelis Agustina', '39133', '44975@gmail.com'),
('Cust146', 'Yonny Herdyanto S Pd M kes', '89017', '70892@gmail.com'),
('Cust147', 'Yulius Catur Adi Wijaya', '3843', '58872@gmail.com'),
('Cust148', 'Yusnita/Azwar P', '19377', '55246@gmail.com'),
('Cust15', 'Antonius  Budianto / Gatut B.S/Agus Dwi Hartanto', '96206', '92381@gmail.com'),
('Cust16', 'Antonius Budianto / lukman ( kontrak)', '4827', '28900@gmail.com'),
('Cust17', 'Antonius Budianto/ Teguh Rusdianto', '60585', '17594@gmail.com'),
('Cust18', 'Antonius Budianto/Supriyatin', '43437', '6465@gmail.com'),
('Cust19', 'Arief Penta Novel', '46409', '3223@gmail.com'),
('Cust2', 'Achmad ( IN-HOUSE )', '48867', '62260@gmail.com'),
('Cust20', 'Aris Santoso', '21798', '7322@gmail.com'),
('Cust21', 'Arsyad Hari Iswoyo', '19825', '24029@gmail.com'),
('Cust22', 'Ary Ardianto.ST', '63412', '73365@gmail.com'),
('Cust23', 'Askan/Lisa Handayani', '27410', '99574@gmail.com'),
('Cust24', 'Asrul Tunggal Ratmansyah', '692', '857@gmail.com'),
('Cust25', 'Astu Anindyajati ', '19010', '17723@gmail.com'),
('Cust26', 'Bambang Biantoro Totok', '74933', '5698@gmail.com'),
('Cust27', 'Basworo Djati', '80157', '17909@gmail.com'),
('Cust28', 'Boedi Susetyo', '55265', '91834@gmail.com'),
('Cust29', 'Chan Iwan Chandoko', '37044', '44891@gmail.com'),
('Cust3', 'Achmad Anshori', '78621', '40597@gmail.com'),
('Cust30', 'Charles Gunadhi / Pak Agus', '70391', '47128@gmail.com'),
('Cust31', 'Dede Maryadi', '8478', '45514@gmail.com'),
('Cust32', 'Dedy Putra Mahardika', '7041', '92395@gmail.com'),
('Cust33', 'Dedy Yulianda', '39486', '46221@gmail.com'),
('Cust34', 'Denny Kastriantono', '40714', '67998@gmail.com'),
('Cust35', 'Dersy Wulandari/Adi A', '27832', '59076@gmail.com'),
('Cust36', 'Desy Tanoyo/ Amri Darwis', '80547', '40274@gmail.com'),
('Cust37', 'Devlina Tarantin', '57779', '36145@gmail.com'),
('Cust38', 'Devy Rachmawati', '44072', '55431@gmail.com'),
('Cust39', 'Dewi Nofita Reni', '13367', '33293@gmail.com'),
('Cust4', 'Achmad Bashori', '50103', '23350@gmail.com'),
('Cust40', 'Diah Ayu Puspita S/ Dhito Yudho N', '31412', '15481@gmail.com'),
('Cust41', 'Diah Siswachyuni', '2764', '91795@gmail.com'),
('Cust42', 'Diaz Iskandar', '62863', '12870@gmail.com'),
('Cust43', 'Dinna Wahyuni', '25656', '87027@gmail.com'),
('Cust44', 'Djemy R Limanuel', '54247', '74284@gmail.com'),
('Cust45', 'DR Esther Karoniawati H', '15135', '17905@gmail.com'),
('Cust46', 'Dr. Tita Komara', '37052', '15277@gmail.com'),
('Cust47', 'Dr. Tita Komara', '23151', '97586@gmail.com'),
('Cust48', 'Dra. Hj. Endah Sulistyawati', '68458', '33456@gmail.com'),
('Cust49', 'Dra. Hj. Endah Sulistyawati', '77284', '68856@gmail.com'),
('Cust5', 'Agustina Rani Eviyanti', '89655', '9704@gmail.com'),
('Cust50', 'Dra.Noortje Kumaat M Kes', '61393', '46052@gmail.com'),
('Cust51', 'Edi Moeljanto', '45371', '35915@gmail.com'),
('Cust52', 'Effendi', '9579', '88914@gmail.com'),
('Cust53', 'Egidio Hermenegildo Costa', '62160', '45023@gmail.com'),
('Cust54', 'Eko Nugroho ', '76013', '91505@gmail.com'),
('Cust55', 'ELIYAH INDRA KUSUMA', '48543', '1839@gmail.com'),
('Cust56', 'Erly Fajarini', '29136', '52128@gmail.com'),
('Cust57', 'Fabiana Pamriyanti', '6398', '27620@gmail.com'),
('Cust58', 'Fahrul Hadi Kusuma', '45716', '42799@gmail.com'),
('Cust59', 'Fandry Anggajaya/Gunawan Santosa', '15215', '43178@gmail.com'),
('Cust6', 'Ahmad Baihaki', '90561', '12247@gmail.com'),
('Cust60', 'Fanny Setiawati', '6972', '23388@gmail.com'),
('Cust61', 'Felix Haliman ( IN-HOUSE )/Juliana', '59884', '79380@gmail.com'),
('Cust62', 'Feryanto Marpaung', '7777', '72956@gmail.com'),
('Cust63', 'Gatut Samuel', '71311', '83276@gmail.com'),
('Cust64', 'Gusti Ayu Komang', '27869', '93455@gmail.com'),
('Cust65', 'H Ngatmono', '46603', '48117@gmail.com'),
('Cust66', 'H.A Sholikan Arief', '26139', '87813@gmail.com'),
('Cust67', 'Habiba', '84765', '22072@gmail.com'),
('Cust68', 'Hadi Kisworo', '88643', '49785@gmail.com'),
('Cust69', 'Hadi Sunaryo', '55655', '17715@gmail.com'),
('Cust7', 'Albert Lukito Setiawan/Ardian', '9793', '93945@gmail.com'),
('Cust70', 'Hanif Moch.Nizar', '66693', '89157@gmail.com'),
('Cust71', 'Hartono', '88118', '68961@gmail.com'),
('Cust72', 'Haryono Kristian/Jadidiah Sri Rahayu ', '13283', '56926@gmail.com'),
('Cust73', 'Helita Chandra', '99810', '64778@gmail.com'),
('Cust74', 'Hendrik Gunawan', '59580', '59043@gmail.com'),
('Cust75', 'Heppy Sandra/Yuliana', '5544', '98473@gmail.com'),
('Cust76', 'Herlina Damiria/Yongki', '21562', '2959@gmail.com'),
('Cust77', 'Hertien Indah Mawarti/Lincye,SE', '50040', '60458@gmail.com'),
('Cust78', 'Heru Cahyono/iskandar', '79538', '79787@gmail.com'),
('Cust79', 'Hery Priyanto', '76446', '13643@gmail.com'),
('Cust8', 'Albertus Hartanto', '69106', '45637@gmail.com'),
('Cust80', 'Hiu Maria/Yuwono R / Sunarsih', '88946', '71963@gmail.com'),
('Cust81', 'Hujuala Rika Ayu/Agung Prasetya B', '30903', '88513@gmail.com'),
('Cust82', 'Inayatul Qudsiyah', '91263', '57773@gmail.com'),
('Cust83', 'Jemicha Endra Giarta', '24465', '1@gmail.com'),
('Cust84', 'Jhon Wayne Bullqhuis', '30127', '25497@gmail.com'),
('Cust85', 'Johan Rihadi', '12546', '43191@gmail.com'),
('Cust86', 'Johanes Purwanto', '69534', '65706@gmail.com'),
('Cust87', 'Josawiana Hermanto / Alexander', '83992', '69633@gmail.com'),
('Cust88', 'Joy Mawarwati/Nuh Aria', '63879', '92735@gmail.com'),
('Cust89', 'June Sutikno/Cheung Chap', '9000', '91818@gmail.com'),
('Cust9', 'Alex Wibowo Gunawan', '76896', '8803@gmail.com'),
('Cust90', 'Koimam Selamet, SE', '80404', '1309@gmail.com'),
('Cust91', 'Lauw Weliawan Liono', '35113', '30699@gmail.com'),
('Cust92', 'Liem lek Kiat', '3135', '85376@gmail.com'),
('Cust93', 'Lim Swie ', '58893', '73309@gmail.com'),
('Cust94', 'Lita Soehairi', '89753', '70432@gmail.com'),
('Cust95', 'Mamik Pujiati', '59165', '25365@gmail.com'),
('Cust96', 'Meita Dwi Susanti', '27207', '84116@gmail.com'),
('Cust97', 'Meity Rianawati', '82104', '98648@gmail.com'),
('Cust98', 'Michael J.M Sanggel', '57138', '49254@gmail.com'),
('Cust99', 'Milton Triwahono S', '82495', '15521@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `nota`
--

CREATE TABLE `nota` (
  `IDNota` int(11) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `total_awal` int(11) DEFAULT NULL,
  `diskon` int(11) DEFAULT NULL,
  `total_setelah_diskon` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nota`
--

INSERT INTO `nota` (`IDNota`, `tanggal`, `username`, `total_awal`, `diskon`, `total_setelah_diskon`) VALUES
(1, '2020-02-15', 'staff1', 80000, 0, 80000);

-- --------------------------------------------------------

--
-- Table structure for table `nota_detail`
--

CREATE TABLE `nota_detail` (
  `IDNota` int(11) NOT NULL,
  `IDTagihan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nota_detail`
--

INSERT INTO `nota_detail` (`IDNota`, `IDTagihan`) VALUES
(1, '103A2/201');

-- --------------------------------------------------------

--
-- Table structure for table `perumahan`
--

CREATE TABLE `perumahan` (
  `IDPerumahan` int(11) NOT NULL,
  `nama_perumahan` varchar(255) DEFAULT NULL,
  `kota` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `perumahan`
--

INSERT INTO `perumahan` (`IDPerumahan`, `nama_perumahan`, `kota`, `username`, `status`) VALUES
(1, 'Anggrek', 'Surabaya', NULL, '0'),
(2, 'Melati', 'Malang', 'staff2', '1'),
(3, 'Tulip', 'Malang', 'staff3', '1'),
(4, 'Mawar', 'Surabaya', NULL, '0'),
(5, 'Cempedak', 'Jakarta', NULL, '0'),
(6, 'Manggis', 'Surabaya', 'staff1', '1'),
(7, 'Merak', 'Surabaya', NULL, '0');

-- --------------------------------------------------------

--
-- Table structure for table `tagihan`
--

CREATE TABLE `tagihan` (
  `IDTagihan` varchar(255) NOT NULL,
  `IDBlok` varchar(255) DEFAULT NULL,
  `bulan` varchar(255) DEFAULT NULL,
  `tahun` varchar(255) DEFAULT NULL,
  `Harga` int(11) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tagihan`
--

INSERT INTO `tagihan` (`IDTagihan`, `IDBlok`, `bulan`, `tahun`, `Harga`, `status`) VALUES
('103A2/201', '103A2/20', 'november', '2019', 80000, '1'),
('103A2/202', '103A2/20', 'desember', '2019', 70000, '0'),
('103A2/203', '103A2/20', 'januari', '2020', 75000, '0'),
('103A2/204', '103A2/20', 'febuari', '2020', 75000, '0');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `pangkat` varchar(255) DEFAULT NULL,
  `nama_user` varchar(255) DEFAULT NULL,
  `nomor` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `pangkat`, `nama_user`, `nomor`, `email`) VALUES
('admin', 'e10adc3949ba59abbe56e057f20f883e', 'admin', 'admin1', '0897654321', 'admin@gmail.com'),
('PO', 'e10adc3949ba59abbe56e057f20f883e', 'staff', 'tata', '08765432123', 'tata@gmail.com'),
('staff1', 'e10adc3949ba59abbe56e057f20f883e', 'staff', 'siti', '0897654321', 'siti@gmail.com'),
('staff2', 'e10adc3949ba59abbe56e057f20f883e', 'staff', 'dido', '087567543321', 'dido@gmail.com'),
('staff3', 'e10adc3949ba59abbe56e057f20f883e', 'staff', 'ando', '0876543334455', 'padi@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blok`
--
ALTER TABLE `blok`
  ADD PRIMARY KEY (`IDBlok`),
  ADD KEY `IDCluster` (`IDCluster`);

--
-- Indexes for table `cluster`
--
ALTER TABLE `cluster`
  ADD PRIMARY KEY (`IDCluster`),
  ADD KEY `IDPerumahan` (`IDPerumahan`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`IDCustomer`);

--
-- Indexes for table `nota`
--
ALTER TABLE `nota`
  ADD PRIMARY KEY (`IDNota`);

--
-- Indexes for table `nota_detail`
--
ALTER TABLE `nota_detail`
  ADD PRIMARY KEY (`IDNota`,`IDTagihan`),
  ADD KEY `IDTagihan` (`IDTagihan`);

--
-- Indexes for table `perumahan`
--
ALTER TABLE `perumahan`
  ADD PRIMARY KEY (`IDPerumahan`);

--
-- Indexes for table `tagihan`
--
ALTER TABLE `tagihan`
  ADD PRIMARY KEY (`IDTagihan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cluster`
--
ALTER TABLE `cluster`
  MODIFY `IDCluster` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `nota`
--
ALTER TABLE `nota`
  MODIFY `IDNota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `perumahan`
--
ALTER TABLE `perumahan`
  MODIFY `IDPerumahan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blok`
--
ALTER TABLE `blok`
  ADD CONSTRAINT `blok_ibfk_1` FOREIGN KEY (`IDCluster`) REFERENCES `cluster` (`IDCluster`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cluster`
--
ALTER TABLE `cluster`
  ADD CONSTRAINT `cluster_ibfk_1` FOREIGN KEY (`IDPerumahan`) REFERENCES `perumahan` (`IDPerumahan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `nota_detail`
--
ALTER TABLE `nota_detail`
  ADD CONSTRAINT `nota_detail_ibfk_1` FOREIGN KEY (`IDNota`) REFERENCES `nota` (`IDNota`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nota_detail_ibfk_2` FOREIGN KEY (`IDTagihan`) REFERENCES `tagihan` (`IDTagihan`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
