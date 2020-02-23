-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 23, 2020 at 03:11 PM
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
  `IDBlok` int(11) NOT NULL,
  `IDCluster` int(11) DEFAULT NULL,
  `IDCustomer` int(11) DEFAULT NULL,
  `nama_blok` varchar(255) DEFAULT NULL,
  `Harga` int(11) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blok`
--

INSERT INTO `blok` (`IDBlok`, `IDCluster`, `IDCustomer`, `nama_blok`, `Harga`, `type`) VALUES
(1, 1, 1, 'KVB5/17', 80000, '20'),
(2, 1, 2, '98A1/01', 80000, '98'),
(3, 1, 3, '90B1/09', 80000, '90'),
(4, 1, 4, '85A1/06', 80000, '85'),
(5, 1, 5, '82B4/24', 80000, '82'),
(6, 1, 6, '82B4/18', 80000, '82'),
(7, 1, 7, '80B3/15', 80000, '80'),
(8, 1, 8, '80B3/14', 80000, '80'),
(9, 1, 9, '80B3/12b', 80000, '80'),
(10, 1, 10, '80B3/12a', 80000, '80'),
(11, 1, 11, '80B3/11', 80000, '80'),
(12, 1, 12, '80B3/10', 80000, '80'),
(13, 1, 13, '80B3/09', 80000, '80'),
(14, 1, 14, '80B3/07', 80000, '80'),
(15, 1, 15, '80B3/06', 80000, '80'),
(16, 1, 16, '80B3/05', 80000, '80'),
(17, 1, 17, '80B3/04', 80000, '80'),
(18, 1, 18, '80B3/03', 80000, '80'),
(19, 1, 19, '80B3/02', 80000, '80'),
(20, 1, 20, '80B3/01', 80000, '80'),
(21, 1, 21, '80A2/01', 80000, '80'),
(22, 1, 22, '73B4/26', 80000, '73'),
(23, 1, 23, '73B4/25', 80000, '73'),
(24, 1, 24, '73B4/17', 80000, '73'),
(25, 1, 25, '72A2/16', 80000, '72'),
(26, 1, 26, '72A2/15', 80000, '72'),
(27, 1, 27, '72A2/14', 80000, '72'),
(28, 1, 28, '72A2/12B', 80000, '72'),
(29, 1, 29, '72A2/12A', 80000, '72'),
(30, 1, 30, '72A2/11', 80000, '72'),
(31, 1, 31, '72A2/08', 80000, '72'),
(32, 1, 32, '72A2/07', 80000, '72'),
(33, 1, 33, '72A2/06', 80000, '72'),
(34, 1, 34, '72A2/05', 80000, '72'),
(35, 1, 35, '72A2/04', 80000, '72'),
(36, 1, 36, '72A2/03', 80000, '72'),
(37, 1, 37, '72A2/02', 80000, '72'),
(38, 1, 38, '72A1/12b', 80000, '72'),
(39, 1, 39, '72A1/12a', 80000, '72'),
(40, 1, 40, '72A1/11', 80000, '72'),
(41, 1, 41, '72A1/10', 80000, '72'),
(42, 1, 42, '72A1/08', 80000, '72'),
(43, 1, 43, '72A1/07', 80000, '72'),
(44, 1, 44, '72A1/05', 80000, '72'),
(45, 1, 45, '72A1/04', 80000, '72'),
(46, 1, 46, '66B5/35', 80000, '66'),
(47, 1, 47, '66B5/32', 80000, '66'),
(48, 1, 48, '66B5/31', 80000, '66'),
(49, 1, 49, '66B5/30', 80000, '66'),
(50, 1, 50, '66B5/29', 80000, '66'),
(51, 1, 51, '66B5/28', 85000, '66'),
(52, 2, 52, '66B5/27', 85000, '66'),
(53, 2, 53, '66B5/26', 85000, '66'),
(54, 2, 54, '66B5/25', 85000, '66'),
(55, 2, 55, '66B5/24', 85000, '66'),
(56, 2, 56, '66B5/23', 85000, '66'),
(57, 2, 57, '66B5/22', 85000, '66'),
(58, 2, 58, '66B5/21', 85000, '66'),
(59, 2, 59, '66B5/19', 85000, '66'),
(60, 2, 60, '66B5/18', 85000, '66'),
(61, 2, 61, '63B6/11', 85000, '63'),
(62, 2, 62, '63B6/10', 85000, '63'),
(63, 2, 63, '63B6/09', 85000, '63'),
(64, 2, 64, '63B6/08', 85000, '63'),
(65, 2, 65, '63B6/07', 85000, '63'),
(66, 2, 66, '63B6/03', 85000, '63'),
(67, 2, 67, '60B5/36', 85000, '60'),
(68, 2, 68, '60B5/34', 85000, '60'),
(69, 2, 69, '52B4/15', 85000, '52'),
(70, 2, 70, '52B4/14', 85000, '52'),
(71, 2, 71, '52B4/12B', 85000, '52'),
(72, 2, 72, '52B4/11', 85000, '52'),
(73, 2, 73, '52B4/10', 85000, '52'),
(74, 2, 74, '52B4/09', 85000, '52'),
(75, 2, 75, '52B4/08', 85000, '52'),
(76, 2, 76, '52B4/07', 85000, '52'),
(77, 2, 77, '52B4/06', 85000, '52'),
(78, 2, 78, '52B4/04', 85000, '52'),
(79, 2, 79, '52B4/03', 85000, '52'),
(80, 2, 80, '52B4/02', 85000, '52'),
(81, 2, 81, '52B4/01', 85000, '52'),
(82, 2, 82, '52A3/23', 85000, '52'),
(83, 2, 83, '52A3/22', 85000, '52'),
(84, 2, 84, '52A3/21', 85000, '52'),
(85, 2, 85, '52A3/20', 85000, '52'),
(86, 2, 86, '52A3/19', 85000, '52'),
(87, 2, 87, '52A3/18', 85000, '52'),
(88, 2, 88, '52A3/17', 85000, '52'),
(89, 2, 89, '52A3/16', 85000, '52'),
(90, 2, 90, '52A3/15', 85000, '52'),
(91, 2, 91, '52A3/12', 85000, '52'),
(92, 2, 92, '52A3/10', 85000, '52'),
(93, 2, 93, '52A3/09', 85000, '52'),
(94, 2, 94, '52A3/07', 85000, '52'),
(95, 2, 95, '52A3/06', 85000, '52'),
(96, 2, 96, '52A3/05', 85000, '52'),
(97, 2, 97, '48B6/34', 85000, '48'),
(98, 2, 98, '48B6/33', 85000, '48'),
(99, 2, 99, '48B6/32', 85000, '48'),
(100, 2, 100, '48B6/31', 85000, '48'),
(101, 3, 101, '48B6/30', 75000, '48'),
(102, 3, 102, '48B6/29', 75000, '48'),
(103, 3, 103, '48B6/28', 75000, '48'),
(104, 3, 104, '48B6/26', 75000, '48'),
(105, 3, 105, '48B6/25', 75000, '48'),
(106, 3, 106, '48B6/24', 75000, '48'),
(107, 3, 107, '48B6/23', 75000, '48'),
(108, 3, 108, '48B6/22', 75000, '48'),
(109, 3, 109, '48B6/21', 75000, '48'),
(110, 3, 110, '48B6/20', 75000, '48'),
(111, 3, 111, '48B6/19', 75000, '48'),
(112, 3, 112, '48B6/18', 75000, '48'),
(113, 3, 113, '48B6/16', 75000, '48'),
(114, 3, 114, '48B6/14', 75000, '48'),
(115, 3, 115, '48B6/12B', 75000, '48'),
(116, 3, 116, '48B6/12A', 75000, '48'),
(117, 3, 117, '48B6/06', 75000, '48'),
(118, 3, 118, '48B6/05', 75000, '48'),
(119, 3, 119, '48B6/04', 75000, '48'),
(120, 3, 120, '48B6/02', 75000, '48'),
(121, 3, 121, '44A1/02', 75000, '44'),
(122, 3, 122, '40C5/10', 75000, '40'),
(123, 3, 123, '40C5/08', 75000, '40'),
(124, 3, 124, '110B4/21', 75000, '11'),
(125, 3, 125, '110B2/03', 75000, '11'),
(126, 3, 126, '110B2/02', 75000, '11'),
(127, 3, 127, '110B1/07', 75000, '11'),
(128, 3, 128, '110B1/06', 75000, '11'),
(129, 3, 129, '110B1/05', 75000, '11'),
(130, 3, 130, '110B1/04', 75000, '11'),
(131, 3, 131, '103B5/16', 75000, '10'),
(132, 3, 132, '103B5/12B', 75000, '10'),
(133, 3, 133, '103B5/12A', 75000, '10'),
(134, 3, 134, '103B5/11', 75000, '10'),
(135, 3, 135, '103B5/10', 75000, '10'),
(136, 3, 136, '103B5/09', 75000, '10'),
(137, 3, 137, '103B5/08', 75000, '10'),
(138, 3, 138, '103B5/07', 75000, '10'),
(139, 3, 139, '103B5/06', 75000, '10'),
(140, 3, 140, '103B5/05', 75000, '10'),
(141, 3, 141, '103B5/02', 75000, '10'),
(142, 3, 142, '103B5/01', 75000, '10'),
(143, 3, 143, '103A2/27', 75000, '10'),
(144, 3, 144, '103A2/20', 75000, '10'),
(145, 3, 145, '103A2/18', 75000, '10'),
(146, 3, 146, '103A2/17', 75000, '10'),
(147, 3, 147, '101B4/28', 75000, '10'),
(148, 3, 148, '101B4/27', 75000, '10');

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
(1, 2, '2_Amira'),
(2, 1, '1_Casablanca'),
(3, 3, '3_Cavana'),
(4, 4, '4_Balsamic'),
(5, 3, '3_Aster'),
(6, 1, '1_Asoka'),
(7, 8, '8_Dian_satu');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `IDCustomer` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `nomor` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`IDCustomer`, `nama`, `nomor`, `email`) VALUES
(1, 'Abisujak Ilyas', '081895627750', '82230@gmail.com'),
(2, 'Achmad ( IN-HOUSE )', '081724453591', '62260@gmail.com'),
(3, 'Achmad Anshori', '081951819975', '40597@gmail.com'),
(4, 'Achmad Bashori', '081646679276', '23350@gmail.com'),
(5, 'Agustina Rani Eviyanti', '081574351238', '9704@gmail.com'),
(6, 'Ahmad Baihaki', '081370342314', '12247@gmail.com'),
(7, 'Albert Lukito Setiawan/Ardian', '081797702522', '93945@gmail.com'),
(8, 'Albertus Hartanto', '081971876988', '45637@gmail.com'),
(9, 'Alex Wibowo Gunawan', '081834675824', '8803@gmail.com'),
(10, 'Anang Riswanto / Lelita', '081345770477', '63346@gmail.com'),
(11, 'Andi Yurianto', '081223475849', '62741@gmail.com'),
(12, 'Angky Dimas Fernico', '081888616324', '55403@gmail.com'),
(13, 'Anis Kurniawati', '081637274294', '63119@gmail.com'),
(14, 'Anton Chandra Tjan', '081641773601', '29670@gmail.com'),
(15, 'Antonius  Budianto / Gatut B.S/Agus Dwi Hartanto', '081388622882', '92381@gmail.com'),
(16, 'Antonius Budianto / lukman ( kontrak)', '081855576467', '28900@gmail.com'),
(17, 'Antonius Budianto/ Teguh Rusdianto', '081406438602', '17594@gmail.com'),
(18, 'Antonius Budianto/Supriyatin', '081611028194', '6465@gmail.com'),
(19, 'Arief Penta Novel', '081441605270', '3223@gmail.com'),
(20, 'Aris Santoso', '081813344419', '7322@gmail.com'),
(21, 'Arsyad Hari Iswoyo', '081706246310', '24029@gmail.com'),
(22, 'Ary Ardianto.ST', '081788824337', '73365@gmail.com'),
(23, 'Askan/Lisa Handayani', '081997935435', '99574@gmail.com'),
(24, 'Asrul Tunggal Ratmansyah', '081705223822', '857@gmail.com'),
(25, 'Astu Anindyajati ', '081212120692', '17723@gmail.com'),
(26, 'Bambang Biantoro Totok', '081340822414', '5698@gmail.com'),
(27, 'Basworo Djati', '081559983073', '17909@gmail.com'),
(28, 'Boedi Susetyo', '081706861477', '91834@gmail.com'),
(29, 'Chan Iwan Chandoko', '081854358768', '44891@gmail.com'),
(30, 'Charles Gunadhi / Pak Agus', '081351373352', '47128@gmail.com'),
(31, 'Dede Maryadi', '081856498729', '45514@gmail.com'),
(32, 'Dedy Putra Mahardika', '081743537823', '92395@gmail.com'),
(33, 'Dedy Yulianda', '081108240627', '46221@gmail.com'),
(34, 'Denny Kastriantono', '081256769404', '67998@gmail.com'),
(35, 'Dersy Wulandari/Adi A', '081459530298', '59076@gmail.com'),
(36, 'Desy Tanoyo/ Amri Darwis', '081267016902', '40274@gmail.com'),
(37, 'Devlina Tarantin', '081421929750', '36145@gmail.com'),
(38, 'Devy Rachmawati', '081583839605', '55431@gmail.com'),
(39, 'Dewi Nofita Reni', '081905994373', '33293@gmail.com'),
(40, 'Diah Ayu Puspita S/ Dhito Yudho N', '081692496328', '15481@gmail.com'),
(41, 'Diah Siswachyuni', '081465375511', '91795@gmail.com'),
(42, 'Diaz Iskandar', '081889865581', '12870@gmail.com'),
(43, 'Dinna Wahyuni', '081863970590', '87027@gmail.com'),
(44, 'Djemy R Limanuel', '081149848382', '74284@gmail.com'),
(45, 'DR Esther Karoniawati H', '081843634370', '17905@gmail.com'),
(46, 'Dr. Tita Komara', '081494730100', '15277@gmail.com'),
(47, 'Dr. Tita Komara', '081124818292', '97586@gmail.com'),
(48, 'Dra. Hj. Endah Sulistyawati', '081740212739', '33456@gmail.com'),
(49, 'Dra. Hj. Endah Sulistyawati', '081419705666', '68856@gmail.com'),
(50, 'Dra.Noortje Kumaat M Kes', '081872380649', '46052@gmail.com'),
(51, 'Edi Moeljanto', '081849392248', '35915@gmail.com'),
(52, 'Effendi', '081767019466', '88914@gmail.com'),
(53, 'Egidio Hermenegildo Costa', '081372806802', '45023@gmail.com'),
(54, 'Eko Nugroho ', '081554731995', '91505@gmail.com'),
(55, 'ELIYAH INDRA KUSUMA', '081237455839', '1839@gmail.com'),
(56, 'Erly Fajarini', '081865464280', '52128@gmail.com'),
(57, 'Fabiana Pamriyanti', '081742381670', '27620@gmail.com'),
(58, 'Fahrul Hadi Kusuma', '081797041621', '42799@gmail.com'),
(59, 'Fandry Anggajaya/Gunawan Santosa', '081461165229', '43178@gmail.com'),
(60, 'Fanny Setiawati', '081482190271', '23388@gmail.com'),
(61, 'Felix Haliman ( IN-HOUSE )/Juliana', '081963710741', '79380@gmail.com'),
(62, 'Feryanto Marpaung', '081600556599', '72956@gmail.com'),
(63, 'Gatut Samuel', '081994853689', '83276@gmail.com'),
(64, 'Gusti Ayu Komang', '081846820400', '93455@gmail.com'),
(65, 'H Ngatmono', '081461731197', '48117@gmail.com'),
(66, 'H.A Sholikan Arief', '081603133649', '87813@gmail.com'),
(67, 'Habiba', '081914217821', '22072@gmail.com'),
(68, 'Hadi Kisworo', '081917971001', '49785@gmail.com'),
(69, 'Hadi Sunaryo', '081199855200', '17715@gmail.com'),
(70, 'Hanif Moch.Nizar', '081950871365', '89157@gmail.com'),
(71, 'Hartono', '081359758656', '68961@gmail.com'),
(72, 'Haryono Kristian/Jadidiah Sri Rahayu ', '081557618558', '56926@gmail.com'),
(73, 'Helita Chandra', '081302625785', '64778@gmail.com'),
(74, 'Hendrik Gunawan', '081202997772', '59043@gmail.com'),
(75, 'Heppy Sandra/Yuliana', '081284078682', '98473@gmail.com'),
(76, 'Herlina Damiria/Yongki', '081845169638', '2959@gmail.com'),
(77, 'Hertien Indah Mawarti/Lincye,SE', '081210748702', '60458@gmail.com'),
(78, 'Heru Cahyono/iskandar', '081914799568', '79787@gmail.com'),
(79, 'Hery Priyanto', '081664325210', '13643@gmail.com'),
(80, 'Hiu Maria/Yuwono R / Sunarsih', '081984922226', '71963@gmail.com'),
(81, 'Hujuala Rika Ayu/Agung Prasetya B', '081685242769', '88513@gmail.com'),
(82, 'Inayatul Qudsiyah', '081821333352', '57773@gmail.com'),
(83, 'Jemicha Endra Giarta', '081752716860', '1@gmail.com'),
(84, 'Jhon Wayne Bullqhuis', '081984956753', '25497@gmail.com'),
(85, 'Johan Rihadi', '081777208844', '43191@gmail.com'),
(86, 'Johanes Purwanto', '081379441210', '65706@gmail.com'),
(87, 'Josawiana Hermanto / Alexander', '081330372154', '69633@gmail.com'),
(88, 'Joy Mawarwati/Nuh Aria', '081226768795', '92735@gmail.com'),
(89, 'June Sutikno/Cheung Chap', '081617188878', '91818@gmail.com'),
(90, 'Koimam Selamet, SE', '081139787701', '1309@gmail.com'),
(91, 'Lauw Weliawan Liono', '081900908076', '30699@gmail.com'),
(92, 'Liem lek Kiat', '081835134658', '85376@gmail.com'),
(93, 'Lim Swie ', '081506448912', '73309@gmail.com'),
(94, 'Lita Soehairi', '081380363947', '70432@gmail.com'),
(95, 'Mamik Pujiati', '081325444835', '25365@gmail.com'),
(96, 'Meita Dwi Susanti', '081567419769', '84116@gmail.com'),
(97, 'Meity Rianawati', '081390803999', '98648@gmail.com'),
(98, 'Michael J.M Sanggel', '081834721889', '49254@gmail.com'),
(99, 'Milton Triwahono S', '081856839819', '15521@gmail.com'),
(100, 'Muhammad Khaiyan/ Egidio', '081684454853', '70810@gmail.com'),
(101, 'Muhammad Reza Norman/Andi oktafianto', '081646937892', '90407@gmail.com'),
(102, 'Nancy Pasaribu', '081759557243', '7460@gmail.com'),
(103, 'Naniek Iyatiningsih', '081718066428', '50265@gmail.com'),
(104, 'Ninik Suryani', '081900667744', '81462@gmail.com'),
(105, 'Nunuk Pujiastutik/Timotius', '081372996318', '11356@gmail.com'),
(106, 'Nurhaenisani/Ahmad K', '081578118517', '90106@gmail.com'),
(107, 'Nyoman Darmayasa SE', '081815983908', '45153@gmail.com'),
(108, 'Olly Ruswati Usmanah/Hendra', '081318733010', '51715@gmail.com'),
(109, 'Pamungkas Swasono', '081300898218', '68034@gmail.com'),
(110, 'Paulus Ngatiman ', '081133701789', '34649@gmail.com'),
(111, 'PC Subyantoro / PT.PNM', '081990728164', '91206@gmail.com'),
(112, 'Poniyem', '081349495443', '53016@gmail.com'),
(113, 'Rachmadi Priyadi', '081820498758', '79643@gmail.com'),
(114, 'Reni Sumarni', '081433521522', '81010@gmail.com'),
(115, 'RIRIN SAFRIYAH / Indah', '081914293049', '40886@gmail.com'),
(116, 'Ririn Soelistiawati', '081159271386', '81436@gmail.com'),
(117, 'Roni', '081245832968', '61518@gmail.com'),
(118, 'Ronny Sutiono Gunawan', '081205475930', '87495@gmail.com'),
(119, 'RR. Puspita / Djaswadi', '081540393361', '95476@gmail.com'),
(120, 'Rudi Kristanto', '081758251661', '30635@gmail.com'),
(121, 'Semi Tandjung Ningsih/Imam Asrofi', '081275033936', '92678@gmail.com'),
(122, 'Setya Bagus W', '081341174320', '64275@gmail.com'),
(123, 'Sian Lien', '081138057105', '85733@gmail.com'),
(124, 'Sihartanti', '081217103687', '46551@gmail.com'),
(125, 'Siti Aisyah/Ivone Ocktavia S (ke-2)', '081520577158', '97933@gmail.com'),
(126, 'Sofyar Noviyanto P', '081353327406', '16884@gmail.com'),
(127, 'Sonya Roswita Hapsari/Antonius Suliyanto', '081946623908', '91489@gmail.com'),
(128, 'Sri Rahayu', '081524764716', '95378@gmail.com'),
(129, 'Sriyadi', '081743819355', '35433@gmail.com'),
(130, 'Sudartik Dwi Ariati/ Siani Prayogo', '081372997417', '22438@gmail.com'),
(131, 'Suhadi', '081510830008', '52813@gmail.com'),
(132, 'Suliad', '081365278707', '68698@gmail.com'),
(133, 'Sutiyana', '081559872362', '71053@gmail.com'),
(134, 'Sutjipto Judodihardjo', '081250924099', '90317@gmail.com'),
(135, 'Sutrisno', '081651738206', '40961@gmail.com'),
(136, 'Suyono', '081526215473', '91635@gmail.com'),
(137, 'Swastu Bondan W', '081131943962', '50271@gmail.com'),
(138, 'Tan Paul Wijaya H', '081811154566', '17018@gmail.com'),
(139, 'Tan Welianto/Yudi Handoko', '081733448000', '35883@gmail.com'),
(140, 'Tanty Wijaya', '081713171242', '24778@gmail.com'),
(141, 'Tiny Wijaya', '081747652682', '35669@gmail.com'),
(142, 'Ussio Shianni', '081200781899', '15904@gmail.com'),
(143, 'Wenny Hersilatty', '081513003052', '87726@gmail.com'),
(144, 'Yayuk Rahmawati', '081173938450', '71299@gmail.com'),
(145, 'Yelis Agustina', '081207168374', '44975@gmail.com'),
(146, 'Yonny Herdyanto S Pd M kes', '081790421484', '70892@gmail.com'),
(147, 'Yulius Catur Adi Wijaya', '081720947619', '58872@gmail.com'),
(148, 'Yusnita/Azwar P', '081354548359', '55246@gmail.com'),
(149, 'Ilham Mahendra Sika', '089765433', 'sika@gmail.com');

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

-- --------------------------------------------------------

--
-- Table structure for table `nota_detail`
--

CREATE TABLE `nota_detail` (
  `IDNota` int(11) NOT NULL,
  `IDTagihan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(1, 'Anggrek1', 'Surabaya', 'staff1', '1'),
(2, 'Melati', 'Malang', 'staff3', '1'),
(3, 'Tulip', 'Malang', 'staff4', '1'),
(4, 'Mawar', 'Surabaya', NULL, '0'),
(5, 'Cempedak', 'Jakarta', NULL, '0'),
(6, 'Manggis', 'Surabaya', 'staff2', '1'),
(7, 'Merak', 'Surabaya', 'staff5', '1'),
(8, 'Caca_Maria', 'Malang', NULL, '0');

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
('100February2020', '100', 'February', '2020', 85000, '0'),
('101February2020', '101', 'February', '2020', 75000, '0'),
('102February2020', '102', 'February', '2020', 75000, '0'),
('103February2020', '103', 'February', '2020', 75000, '0'),
('104February2020', '104', 'February', '2020', 75000, '0'),
('105February2020', '105', 'February', '2020', 75000, '0'),
('106February2020', '106', 'February', '2020', 75000, '0'),
('107February2020', '107', 'February', '2020', 75000, '0'),
('108February2020', '108', 'February', '2020', 75000, '0'),
('109February2020', '109', 'February', '2020', 75000, '0'),
('10February2020', '10', 'February', '2020', 80000, '0'),
('110February2020', '110', 'February', '2020', 75000, '0'),
('111February2020', '111', 'February', '2020', 75000, '0'),
('112February2020', '112', 'February', '2020', 75000, '0'),
('113February2020', '113', 'February', '2020', 75000, '0'),
('114February2020', '114', 'February', '2020', 75000, '0'),
('115February2020', '115', 'February', '2020', 75000, '0'),
('116February2020', '116', 'February', '2020', 75000, '0'),
('117February2020', '117', 'February', '2020', 75000, '0'),
('118February2020', '118', 'February', '2020', 75000, '0'),
('119February2020', '119', 'February', '2020', 75000, '0'),
('11February2020', '11', 'February', '2020', 80000, '0'),
('120February2020', '120', 'February', '2020', 75000, '0'),
('121February2020', '121', 'February', '2020', 75000, '0'),
('122February2020', '122', 'February', '2020', 75000, '0'),
('123February2020', '123', 'February', '2020', 75000, '0'),
('124February2020', '124', 'February', '2020', 75000, '0'),
('125February2020', '125', 'February', '2020', 75000, '0'),
('126February2020', '126', 'February', '2020', 75000, '0'),
('127February2020', '127', 'February', '2020', 75000, '0'),
('128February2020', '128', 'February', '2020', 75000, '0'),
('129February2020', '129', 'February', '2020', 75000, '0'),
('12February2020', '12', 'February', '2020', 80000, '0'),
('130February2020', '130', 'February', '2020', 75000, '0'),
('131February2020', '131', 'February', '2020', 75000, '0'),
('132February2020', '132', 'February', '2020', 75000, '0'),
('133February2020', '133', 'February', '2020', 75000, '0'),
('134February2020', '134', 'February', '2020', 75000, '0'),
('135February2020', '135', 'February', '2020', 75000, '0'),
('136February2020', '136', 'February', '2020', 75000, '0'),
('137February2020', '137', 'February', '2020', 75000, '0'),
('138February2020', '138', 'February', '2020', 75000, '0'),
('139February2020', '139', 'February', '2020', 75000, '0'),
('13February2020', '13', 'February', '2020', 80000, '0'),
('140February2020', '140', 'February', '2020', 75000, '0'),
('141February2020', '141', 'February', '2020', 75000, '0'),
('142February2020', '142', 'February', '2020', 75000, '0'),
('143February2020', '143', 'February', '2020', 75000, '0'),
('144Desember2019', '144', 'Desember', '2019', 80000, '0'),
('144February2020', '144', 'February', '2020', 75000, '0'),
('144Januari2020', '144', 'januari', '2020', 75000, '0'),
('145February2020', '145', 'February', '2020', 75000, '0'),
('146February2020', '146', 'February', '2020', 75000, '0'),
('147February2020', '147', 'February', '2020', 75000, '0'),
('148February2020', '148', 'February', '2020', 75000, '0'),
('14February2020', '14', 'February', '2020', 80000, '0'),
('15February2020', '15', 'February', '2020', 80000, '0'),
('16February2020', '16', 'February', '2020', 80000, '0'),
('17February2020', '17', 'February', '2020', 80000, '0'),
('18February2020', '18', 'February', '2020', 80000, '0'),
('19February2020', '19', 'February', '2020', 80000, '0'),
('1February2020', '1', 'February', '2020', 80000, '0'),
('20February2020', '20', 'February', '2020', 80000, '0'),
('21February2020', '21', 'February', '2020', 80000, '0'),
('22February2020', '22', 'February', '2020', 80000, '0'),
('23February2020', '23', 'February', '2020', 80000, '0'),
('24February2020', '24', 'February', '2020', 80000, '0'),
('25February2020', '25', 'February', '2020', 80000, '0'),
('26February2020', '26', 'February', '2020', 80000, '0'),
('27February2020', '27', 'February', '2020', 80000, '0'),
('28February2020', '28', 'February', '2020', 80000, '0'),
('29February2020', '29', 'February', '2020', 80000, '0'),
('2February2020', '2', 'February', '2020', 80000, '0'),
('30February2020', '30', 'February', '2020', 80000, '0'),
('31February2020', '31', 'February', '2020', 80000, '0'),
('32February2020', '32', 'February', '2020', 80000, '0'),
('33February2020', '33', 'February', '2020', 80000, '0'),
('34February2020', '34', 'February', '2020', 80000, '0'),
('35February2020', '35', 'February', '2020', 80000, '0'),
('36February2020', '36', 'February', '2020', 80000, '0'),
('37February2020', '37', 'February', '2020', 80000, '0'),
('38February2020', '38', 'February', '2020', 80000, '0'),
('39February2020', '39', 'February', '2020', 80000, '0'),
('3February2020', '3', 'February', '2020', 80000, '0'),
('40February2020', '40', 'February', '2020', 80000, '0'),
('41February2020', '41', 'February', '2020', 80000, '0'),
('42February2020', '42', 'February', '2020', 80000, '0'),
('43February2020', '43', 'February', '2020', 80000, '0'),
('44February2020', '44', 'February', '2020', 80000, '0'),
('45February2020', '45', 'February', '2020', 80000, '0'),
('46February2020', '46', 'February', '2020', 80000, '0'),
('47February2020', '47', 'February', '2020', 80000, '0'),
('48February2020', '48', 'February', '2020', 80000, '0'),
('49February2020', '49', 'February', '2020', 80000, '0'),
('4February2020', '4', 'February', '2020', 80000, '0'),
('50February2020', '50', 'February', '2020', 80000, '0'),
('51February2020', '51', 'February', '2020', 85000, '0'),
('52February2020', '52', 'February', '2020', 85000, '0'),
('53February2020', '53', 'February', '2020', 85000, '0'),
('54February2020', '54', 'February', '2020', 85000, '0'),
('55February2020', '55', 'February', '2020', 85000, '0'),
('56February2020', '56', 'February', '2020', 85000, '0'),
('57February2020', '57', 'February', '2020', 85000, '0'),
('58February2020', '58', 'February', '2020', 85000, '0'),
('59February2020', '59', 'February', '2020', 85000, '0'),
('5February2020', '5', 'February', '2020', 80000, '0'),
('60February2020', '60', 'February', '2020', 85000, '0'),
('61February2020', '61', 'February', '2020', 85000, '0'),
('62February2020', '62', 'February', '2020', 85000, '0'),
('63February2020', '63', 'February', '2020', 85000, '0'),
('64February2020', '64', 'February', '2020', 85000, '0'),
('65February2020', '65', 'February', '2020', 85000, '0'),
('66February2020', '66', 'February', '2020', 85000, '0'),
('67February2020', '67', 'February', '2020', 85000, '0'),
('68February2020', '68', 'February', '2020', 85000, '0'),
('69February2020', '69', 'February', '2020', 85000, '0'),
('6February2020', '6', 'February', '2020', 80000, '0'),
('70February2020', '70', 'February', '2020', 85000, '0'),
('71February2020', '71', 'February', '2020', 85000, '0'),
('72February2020', '72', 'February', '2020', 85000, '0'),
('73February2020', '73', 'February', '2020', 85000, '0'),
('74February2020', '74', 'February', '2020', 85000, '0'),
('75February2020', '75', 'February', '2020', 85000, '0'),
('76February2020', '76', 'February', '2020', 85000, '0'),
('77February2020', '77', 'February', '2020', 85000, '0'),
('78February2020', '78', 'February', '2020', 85000, '0'),
('79February2020', '79', 'February', '2020', 85000, '0'),
('7February2020', '7', 'February', '2020', 80000, '0'),
('80February2020', '80', 'February', '2020', 85000, '0'),
('81February2020', '81', 'February', '2020', 85000, '0'),
('82February2020', '82', 'February', '2020', 85000, '0'),
('83February2020', '83', 'February', '2020', 85000, '0'),
('84February2020', '84', 'February', '2020', 85000, '0'),
('85February2020', '85', 'February', '2020', 85000, '0'),
('86February2020', '86', 'February', '2020', 85000, '0'),
('87February2020', '87', 'February', '2020', 85000, '0'),
('88February2020', '88', 'February', '2020', 85000, '0'),
('89February2020', '89', 'February', '2020', 85000, '0'),
('8February2020', '8', 'February', '2020', 80000, '0'),
('90February2020', '90', 'February', '2020', 85000, '0'),
('91February2020', '91', 'February', '2020', 85000, '0'),
('92February2020', '92', 'February', '2020', 85000, '0'),
('93February2020', '93', 'February', '2020', 85000, '0'),
('94February2020', '94', 'February', '2020', 85000, '0'),
('95February2020', '95', 'February', '2020', 85000, '0'),
('96February2020', '96', 'February', '2020', 85000, '0'),
('97February2020', '97', 'February', '2020', 85000, '0'),
('98February2020', '98', 'February', '2020', 85000, '0'),
('99February2020', '99', 'February', '2020', 85000, '0'),
('9February2020', '9', 'February', '2020', 80000, '0');

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
('admin', 'f1290186a5d0b1ceab27f4e77c0c5d68', 'admin', 'Ketuta_alex', '089123456789', 'admin@gmail.com'),
('staff1', 'e10adc3949ba59abbe56e057f20f883e', 'staff', 'tata', '089765432141', 'tata@gmail.com'),
('staff2', 'e10adc3949ba59abbe56e057f20f883e', 'staff', 'siti', '089817171625', 'siti@gmail.com'),
('staff3', 'e10adc3949ba59abbe56e057f20f883e', 'staff', 'dido', '087456432134', 'dido@gmail.com'),
('staff4', 'e10adc3949ba59abbe56e057f20f883e', 'staff', 'ando', '089763524162', 'ando@gmail.com'),
('staff5', 'e10adc3949ba59abbe56e057f20f883e', 'staff', 'Miftahul', '087654312131', 'mifta@gmail.com'),
('staff7', '827ccb0eea8a706c4c34a16891f84e7b', 'staff', 'pino alke', '0987654321', 'yaya@gmail.com');

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
-- AUTO_INCREMENT for table `blok`
--
ALTER TABLE `blok`
  MODIFY `IDBlok` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=153;

--
-- AUTO_INCREMENT for table `cluster`
--
ALTER TABLE `cluster`
  MODIFY `IDCluster` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `IDCustomer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=150;

--
-- AUTO_INCREMENT for table `nota`
--
ALTER TABLE `nota`
  MODIFY `IDNota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `perumahan`
--
ALTER TABLE `perumahan`
  MODIFY `IDPerumahan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
