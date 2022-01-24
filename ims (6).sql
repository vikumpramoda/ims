-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 06, 2022 at 11:11 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ims`
--

-- --------------------------------------------------------

--
-- Table structure for table `depot`
--

CREATE TABLE `depot` (
  `depot_id` int(11) NOT NULL,
  `depot_name` varchar(100) DEFAULT NULL,
  `region_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `depot`
--

INSERT INTO `depot` (`depot_id`, `depot_name`, `region_id`) VALUES
(1, 'Kaldemulla', 1),
(2, 'Egodauyana', 1),
(3, 'Pannipitiya', 1),
(4, 'Orugodawatta', 1),
(5, 'Moratumulla', 1),
(6, 'Kadawatha', 1),
(7, 'Mirigama', 1),
(8, 'Boossa', 2),
(9, 'Ambalangoda', 3),
(10, 'Unawatuna', 3),
(11, 'Talalla', 3),
(12, 'Hambanthota', 3),
(13, 'Dambuluoya', 4),
(14, 'Pallekelle', 4),
(15, 'Matale', 4),
(16, 'Ethagala', 4),
(17, 'Kurunegala', 5),
(18, 'Nikaweratiya', 5),
(19, 'Kilinochchiya', 6),
(20, 'Nallur', 6),
(21, 'Ampara', 7),
(22, 'Padiyathalawa', 7),
(23, 'IT', 8),
(24, 'Finance', 8),
(25, 'HR', 8),
(26, 'Purchasing', 8),
(27, 'Main stock', 8),
(28, 'Boralanda', 10);

-- --------------------------------------------------------

--
-- Table structure for table `grn`
--

CREATE TABLE `grn` (
  `grn_id` int(11) NOT NULL,
  `pur_id` int(11) DEFAULT NULL,
  `invoice` varchar(50) DEFAULT NULL,
  `depot_id` int(11) DEFAULT NULL,
  `member_id` int(11) DEFAULT NULL,
  `grn_date` date DEFAULT NULL,
  `remarks` varchar(100) DEFAULT NULL,
  `total` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `grn`
--

INSERT INTO `grn` (`grn_id`, `pur_id`, `invoice`, `depot_id`, `member_id`, `grn_date`, `remarks`, `total`) VALUES
(7, 23, '11', 11, 3242, '2019-04-02', 'hi', NULL),
(8, 23, '1', 2, 1, '2019-04-02', 'hi', NULL),
(9, 15, '1', 2, 1, '2019-06-05', 'gt', NULL),
(10, NULL, '85246', 0, 1, '2019-08-05', '2', NULL),
(11, NULL, '85246', 0, 1, '2019-08-05', '2', NULL),
(12, NULL, '85246', 0, 1, '2019-08-05', '2', NULL),
(13, NULL, '85246', 0, 1, '2019-08-05', '2', NULL),
(14, NULL, '85246', 2, 1, '2019-08-05', '2', 4600),
(15, 0, '89555', 2, 1, '2019-08-05', 'now ok', 2800),
(16, 19, '4586', 2, 1, '2019-08-05', 'hri', 2800),
(17, 19, '2222', 2, 1, '2019-08-05', 'now', 600),
(18, 19, '159', 2, 1, '2019-08-05', 'hk', 2800),
(19, 20, '1594', 2, 1, '2019-08-05', 'hh', 4600),
(20, 19, '1488', 2, 1, '2019-08-05', 'kmk', 2800),
(21, 19, '235', 2, 1, '2019-08-05', 'ki', 2800),
(22, 19, '3', 2, 1, '2019-08-05', 'ii', 2800),
(23, 20, '0366', 2, 1, '2019-08-05', 'okl', 4600),
(53, NULL, '3654', 2, 1, '2019-08-08', 'bnbmn', 750),
(54, 0, '9631', 2, 1, '2019-08-08', 'ok', 250),
(55, 21, '19960804', 2, 1, '2021-11-10', 'sony ac', 1674400),
(56, NULL, '50', 2, 1, '2021-11-02', 'acccccccc', 460000);

-- --------------------------------------------------------

--
-- Table structure for table `grn_item`
--

CREATE TABLE `grn_item` (
  `grnItem_id` int(11) NOT NULL,
  `grn_id` int(11) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `qty` float DEFAULT NULL,
  `total` float DEFAULT NULL,
  `purchase_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `grn_item`
--

INSERT INTO `grn_item` (`grnItem_id`, `grn_id`, `item_id`, `qty`, `total`, `purchase_id`) VALUES
(1, 12, 10039, 23, 4600, NULL),
(2, 13, 10039, 23, 4600, NULL),
(3, 14, 10039, 23, 4600, NULL),
(4, 15, 10035, 12, 600, NULL),
(5, 15, 10036, 22, 2200, NULL),
(6, 16, 10035, 12, 600, NULL),
(7, 16, 10036, 22, 2200, NULL),
(8, 17, 10035, 12, 600, NULL),
(9, 18, 10035, 12, 600, NULL),
(10, 18, 10036, 22, 2200, NULL),
(11, 19, 10039, 23, 4600, NULL),
(12, 20, 10035, 12, 600, NULL),
(13, 20, 10036, 22, 2200, NULL),
(14, 21, 10035, 12, 600, NULL),
(15, 21, 10036, 22, 2200, NULL),
(16, 22, 10035, 12, 600, NULL),
(17, 22, 10036, 22, 2200, NULL),
(18, 23, 10039, 23, 4600, 17),
(29, 38, 10039, 25, 250, NULL),
(30, 39, 10039, 25, 250, NULL),
(31, 49, 10039, 25, 250, NULL),
(32, 49, 10038, 40, 400, NULL),
(33, 50, 10039, 25, 250, NULL),
(34, 50, 10038, 40, 400, NULL),
(35, 51, 10039, 25, 250, NULL),
(36, 51, 10038, 26, 520, NULL),
(37, 52, 10039, 25, 250, NULL),
(38, 52, 10038, 40, 400, NULL),
(39, 53, 10039, 25, 250, NULL),
(40, 53, 10038, 25, 500, NULL),
(41, 54, 10039, 25, 250, NULL),
(42, 55, 10193, 8, 1674400, 18),
(43, 56, 10193, 23, 460000, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(50) NOT NULL,
  `stockId` int(50) NOT NULL,
  `image_url` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `stockId`, `image_url`) VALUES
(19, 8963530, 'IMG-61b03164e5aa31.61480534.png'),
(20, 8963528, 'IMG-61b031eca56ea2.27562498.png'),
(21, 8963526, 'IMG-61b03245cbc639.22760956.png'),
(25, 8963530, 'IMG-61b170b21abc05.83347945.png'),
(26, 8963530, 'IMG-61b17b4110fbf9.43155933.png'),
(27, 8963526, 'IMG-61b17ff5a34431.82832771.png'),
(28, 8963527, 'IMG-61b1934e460f51.28853700.png'),
(29, 8963529, 'IMG-61b1cd303ffd28.85921490.png'),
(30, 8963530, 'IMG-61b80d50066729.51229748.png'),
(31, 8963529, 'IMG-61b80eae89b0a0.32620444.png');

-- --------------------------------------------------------

--
-- Table structure for table `issue_item`
--

CREATE TABLE `issue_item` (
  `iss_id` int(11) NOT NULL,
  `issue_id` int(11) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `issue_item`
--

INSERT INTO `issue_item` (`iss_id`, `issue_id`, `item_id`, `qty`) VALUES
(3, 3, 8, 700);

-- --------------------------------------------------------

--
-- Table structure for table `issue_order`
--

CREATE TABLE `issue_order` (
  `issue_id` int(11) NOT NULL,
  `req_id` int(11) DEFAULT NULL,
  `region_id` int(11) DEFAULT NULL,
  `depot_id` int(11) DEFAULT NULL,
  `member_id` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `remarks` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `issue_order`
--

INSERT INTO `issue_order` (`issue_id`, `req_id`, `region_id`, `depot_id`, `member_id`, `date`, `remarks`) VALUES
(3, 11, 1, 1, 14, '2019-04-04', 'yui');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `item_id` int(11) NOT NULL,
  `item_name` varchar(60) DEFAULT NULL,
  `unit` varchar(60) DEFAULT NULL,
  `sub_id` int(11) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`item_id`, `item_name`, `unit`, `sub_id`, `status`) VALUES
(10000, 'Tube Light', '2', 1000, 'common'),
(10001, 'Stapler', '2', 1001, 'common'),
(10002, 'Plug Base 5A', '2', 1000, 'common'),
(10003, '13A Plug Base', '2', 1000, 'common'),
(10004, '15A Plug Base', '2', 1000, 'common'),
(10005, 'Double sunk box', '2', 1000, 'common'),
(10006, '5A Plug Top', '2', 1000, 'common'),
(10007, '13A Plug Top', '2', 1000, 'common'),
(10008, '15A Plug Top', '2', 1000, 'common'),
(10009, 'Screw Nail', '2', 1002, 'common'),
(10010, 'Telephone 51A Prolink', '2', 1000, 'common'),
(10011, '40W choke', '2', 1000, 'common'),
(10012, 'Float Switch', '2', 1000, 'common'),
(10013, '3 core wire 10 A', '4', 1000, 'common'),
(10014, 'Insulating tape', '2', 1000, 'common'),
(10015, '3way sunk box', '2', 1000, 'common'),
(10016, 'Rpsert cord', '2', 1000, 'common'),
(10017, 'Hand set cord', '2', 1000, 'common'),
(10018, 'Rosert Box', '2', 1000, 'common'),
(10019, '63A Trip switch', '2', 1000, 'common'),
(10020, '5A M.L.B', '2', 1000, 'common'),
(10021, '10 M.C.B', '2', 1000, 'common'),
(10022, '15A M.C.B', '2', 1000, 'common'),
(10023, 'Sprial 25mm', '2', 1001, 'common'),
(10024, '20A M.C.B', '2', 1000, 'common'),
(10025, '32 M.C.B', '2', 1000, 'common'),
(10026, 'Earth wire', '4', 1000, 'common'),
(10027, 'ABC Box', '2', 1000, 'common'),
(10028, '1/044 Red', '4', 1000, 'common'),
(10029, '10A Conector Bar', '2', 1000, 'common'),
(10030, 'HP Pro Desk 40064', '2', 1004, 'common'),
(10031, '63A 4pole ', '2', 1000, 'common'),
(10032, 'Computer', '2', 1004, 'common'),
(10033, '4 way MCB Box', '2', 1000, 'common'),
(10034, '40W Bulb', '2', 1000, 'common'),
(10035, 'Telephone wire ', '2', 1000, 'common'),
(10036, 'cordwire telephone', '2', 1000, 'common'),
(10037, '60A Isolator', '2', 1000, 'common'),
(10038, 'pala cover 9 x 6', '2', 1001, 'common'),
(10039, 'pala cover 9 x 4', '2', 1001, 'common'),
(10040, 'Duplicator Rongda', '2', 1004, 'common'),
(10041, 'stickers QC', '2', 1001, 'common'),
(10042, 'Diameter Tape', '2', 1006, 'common'),
(10043, 'Reakka', '2', 1002, 'common'),
(10044, 'Photo Copier DP 2309', '2', 1001, 'common'),
(10045, 'Tube 700 x 75 x 16', '2', 1005, 'common'),
(10046, 'Tube 750 x 16', '2', 1005, 'common'),
(10047, 'Tube 12.4 x 28', '2', 1005, 'common'),
(10048, 'Bathroom brush', '2', 1007, 'common'),
(10049, 'Flap 750 x 16', '2', 1005, 'common'),
(10050, 'Brooms plastic', '2', 1007, 'common'),
(10051, 'A4 Photocopy ', '2', 1001, 'common'),
(10052, 'sawal', '2', 1002, 'common'),
(10053, 'Legal Photocopy', '2', 1001, 'common'),
(10054, 'B4 Photocopy', '2', 1001, 'common'),
(10055, 'cerculer protector', '2', 1006, 'common'),
(10056, 'A3 Photocopy ', '2', 1001, 'common'),
(10057, 'E 2309 Toner cartridge', '2', 1001, 'common'),
(10058, '70GSM Photop', '2', 1001, 'common'),
(10059, 'P1102 (85A) cartridge', '2', 1001, 'common'),
(10060, 'Halfsheet', '2', 1001, 'common'),
(10061, '1020 (12A) cartridge', '2', 1001, 'common'),
(10062, '1005 (35A) cartridge', '2', 1001, 'common'),
(10063, 'Roniosheet', '2', 1001, 'common'),
(10064, '1043 samsung toner', '2', 1001, 'common'),
(10065, '17A Toner', '2', 1001, 'common'),
(10066, 'Foolscap', '2', 1001, 'common'),
(10067, '337 toner Fat', '2', 1001, 'common'),
(10068, 'File Cover', '2', 1001, 'common'),
(10069, 'CL 11', '2', 1001, 'common'),
(10070, 'Field Note Book', '2', 1001, 'common'),
(10071, 'PG 88 Fax Toner', '2', 1001, 'common'),
(10072, 'Short Hand Book', '2', 1001, 'common'),
(10073, 'FX 03 Fax Toner', '2', 1001, 'common'),
(10074, 'Envelope Small', '2', 1001, 'common'),
(10075, '328 Fax Toner', '2', 1001, 'common'),
(10076, 'Envelope Medium', '2', 1001, 'common'),
(10077, 'Toshiba T 2450 p/c Toner', '2', 1001, 'common'),
(10078, 'Envelope Large', '2', 1001, 'common'),
(10079, 'IR 2520 p/c Toner', '2', 1001, 'common'),
(10080, 'IR 2016 P/c toner', '2', 1001, 'common'),
(10081, 'Blank sheet 9.5 x 12', '2', 1001, 'common'),
(10082, 'LQ 2180 Printer Ribborn', '2', 1001, 'common'),
(10083, 'LQ 2090 Printer Ribborn', '2', 1001, 'common'),
(10084, 'LQ 310 Ribborn', '2', 1001, 'common'),
(10085, 'Blank sheet 12 x 15', '2', 1001, 'common'),
(10086, 'LQ 310 +2  Ribborn', '2', 1001, 'common'),
(10087, 'Puncher', '2', 1001, 'common'),
(10088, 'Computer Blank Sheet 8 x 6', '2', 1001, 'common'),
(10089, 'staple pin machine', '2', 1001, 'common'),
(10090, 'CR  I', '2', 1001, 'common'),
(10091, 'calculator ', '2', 1001, 'common'),
(10092, 'Lexmark ribborn', '2', 1001, 'common'),
(10093, 'CR  II', '2', 1001, 'common'),
(10094, 'Brother Fax Toner', '2', 1001, 'common'),
(10095, 'CR  III', '2', 1001, 'common'),
(10096, 'Frankling Ribbon', '2', 1001, 'common'),
(10097, 'CR  IV', '2', 1001, 'common'),
(10098, 'Vim', '2', 1007, 'common'),
(10099, 'CR  V', '2', 1001, 'common'),
(10100, 'Lux Soap', '2', 1007, 'common'),
(10101, 'Transparent Sheet ', '2', 1001, 'common'),
(10102, 'sunlight', '2', 1007, 'common'),
(10103, 'Back Cover', '2', 1001, 'common'),
(10104, 'pen light battery', '2', 1000, 'common'),
(10105, 'Blank CD', '2', 1001, 'common'),
(10106, 'Spiral 8mm', '2', 1001, 'common'),
(10107, 'Blank DVD', '2', 1001, 'common'),
(10108, 'FX 9 Toner', '2', 1001, 'common'),
(10109, 'Cashier Carban', '2', 1001, 'common'),
(10110, 'Twine Ball', '2', 1001, 'common'),
(10111, 'Cello Tape 1\"', '2', 1001, 'common'),
(10112, 'Duster', '2', 1001, 'common'),
(10113, 'Life Boy Hand Wash', '2', 1007, 'common'),
(10114, 'Cello Tape 2\"', '2', 1001, 'common'),
(10115, 'Tissue Box', '2', 1007, 'common'),
(10116, 'Gum Tape 2\"', '2', 1001, 'common'),
(10117, 'Toilet paper Roll', '2', 1007, 'common'),
(10118, 'Packing Tape 2\" ', '2', 1001, 'common'),
(10119, 'Pins', '2', 1001, 'common'),
(10120, 'Foot Ruller', '2', 1001, 'common'),
(10121, 'Clips', '2', 1001, 'common'),
(10122, 'Stapler Pin', '2', 1001, 'common'),
(10123, 'Stapler Pin 23/10', '2', 1001, 'common'),
(10124, 'HP 61 colour cartridge', '2', 1001, 'common'),
(10125, 'Blue Pen Ball Point', '2', 1001, 'common'),
(10126, 'Red Pen Ball Point', '2', 1001, 'common'),
(10127, 'White Board Pen', '2', 1001, 'common'),
(10128, 'Mouse pad', '2', 1008, 'common'),
(10129, 'Type writer Ribbon', '2', 1001, 'common'),
(10130, 'Paper Fastner', '2', 1001, 'common'),
(10131, 'Permanent Marker Pen', '2', 1001, 'common'),
(10132, 'High Light Pen', '2', 1001, 'common'),
(10133, 'Tipex', '2', 1001, 'common'),
(10134, 'PC toner 7120', '2', 1001, 'common'),
(10135, 'Pencil', '2', 1001, 'common'),
(10136, '4050 PC Toner', '2', 1001, 'common'),
(10137, 'Eraser', '2', 1001, 'common'),
(10138, 'Toner', '2', 1001, 'common'),
(10139, 'Box File', '2', 1001, 'common'),
(10140, 'File Tag', '2', 1001, 'common'),
(10141, 'Measuring Tape ', '2', 1006, 'common'),
(10142, 'Red Tape', '2', 1001, 'common'),
(10143, '204 colour Toner Black', '2', 1001, 'common'),
(10144, 'Gum Bottle', '2', 1001, 'common'),
(10145, 'Mouse', '2', 1008, 'common'),
(10146, '204 colour Toner Cyan', '2', 1001, 'common'),
(10147, '204 colour Toner yellow', '2', 1001, 'common'),
(10148, 'Carban Single Side', '2', 1001, 'common'),
(10149, '204 colour Toner Majenda', '2', 1001, 'common'),
(10150, 'Carban Double Side', '2', 1001, 'common'),
(10151, '15M Measuring Tape ', '2', 1006, 'common'),
(10152, 'Pay Slip', '2', 1001, 'common'),
(10153, 'Spiral 10mm', '2', 1001, 'common'),
(10154, '4 Hole File Cover', '2', 1001, 'common'),
(10155, '7.053 blue 100m', '2', 1000, 'common'),
(10156, 'Post ID Pad', '2', 1001, 'common'),
(10157, '7.053 brown 100m', '2', 1000, 'common'),
(10158, '3/4 flexible conduit', '2', 1000, 'common'),
(10159, 'Pay Slip Old', '2', 1001, 'common'),
(10160, 'No7 concrete ', '2', 1002, 'common'),
(10161, 'Chemifix Gum Small', '2', 1001, 'common'),
(10162, 'Spiral', '2', 1001, 'common'),
(10163, 'Spiral 6mm', '2', 1001, 'common'),
(10164, 'No7 Roll ply', '2', 1000, 'common'),
(10165, 'A3 Color Paper', '2', 1001, 'common'),
(10166, 'Duplo Ink', '2', 1001, 'common'),
(10167, '75 x 50 Box casing', '2', 1000, 'common'),
(10168, 'A3 Laminating Paper', '2', 1001, 'common'),
(10169, '65 x 95 Laminating', '2', 1001, 'common'),
(10170, 'single sunk box pohlycrome', '2', 1000, 'common'),
(10171, '13A Socket Outlet ', '2', 1000, 'common'),
(10172, 'Sunbox round type', '2', 1000, 'common'),
(10173, '10A MCB', '2', 1000, 'common'),
(10174, '18 penlight LED', '2', 1000, 'common'),
(10175, '40A 2P ELCB', '2', 1000, 'common'),
(10176, '20A MCB', '2', 1000, 'common'),
(10177, 'LED indicator MCB Type', '2', 1000, 'common'),
(10178, '15A Socket', '2', 1000, 'common'),
(10179, '32A MCB', '2', 1000, 'common'),
(10180, '15A MCB', '2', 1000, 'common'),
(10181, '100A Issolator ', '2', 1001, 'common'),
(10182, '900 x 20 16PR (Tyre/ Tube/ Collar Set)', '2', 1005, 'direct'),
(10183, 'Tyre - Ceat â€“ XL Super/Tube - Maruti/ Tyrock - India', '2', 1005, 'direct'),
(10184, 'Collar - Arpico - Sri Lanka', '2', 1005, 'direct'),
(10185, '1100 X 20 (18 PR)(Tyre/ Tube/ Collar Set)', '2', 1005, 'direct'),
(10186, 'Tyre - Ceat â€“ Sri Lanka/Tube - Maruti/ Tyrock -  India', '2', 1005, 'direct'),
(10187, 'Collar - Midland - Sri Lanka ', '2', 1005, 'direct'),
(10188, 'CBN-R Wheel S/No: WMY 103017-5-SY131', '2', 1009, 'direct'),
(10189, 'Size: 127 X 12.7 mm/Profile: 10/30', '2', 1009, 'direct'),
(10190, 'Print & Supply of STC pay slip', '2', 1010, 'direct'),
(10191, '5\" x 12\" /60GSM 1WB paper', '2', 1010, 'direct'),
(10192, 'Penasonic A/C', '2', 1011, 'direct'),
(10193, 'Sony A/C', '2', 1011, 'direct'),
(10194, 'sanitizer', '7', 1012, 'common'),
(10195, 'masks', '2', 1012, 'common'),
(10196, '200*600', '2', 1013, 'common'),
(10197, 'sanitizer2', '7', 1012, 'common'),
(10198, 'acer i5', '2', 1015, 'common'),
(10199, 'acer i3', '2', 1015, 'common'),
(10200, 'i7', '2', 1015, 'common'),
(10201, 'keyboard acer2', '2', 1016, 'common');

-- --------------------------------------------------------

--
-- Table structure for table `main_cato`
--

CREATE TABLE `main_cato` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `main_cato`
--

INSERT INTO `main_cato` (`cat_id`, `cat_name`) VALUES
(100, 'Fix Assets'),
(101, 'Consumable');

-- --------------------------------------------------------

--
-- Table structure for table `main_stock`
--

CREATE TABLE `main_stock` (
  `id` int(11) NOT NULL,
  `item_id` int(11) DEFAULT NULL,
  `depot_id` int(11) DEFAULT NULL,
  `stock_level` float DEFAULT NULL,
  `remarks` varchar(50) NOT NULL,
  `date` date DEFAULT NULL,
  `qr` varchar(50) DEFAULT NULL,
  `user` varchar(50) NOT NULL,
  `region` varchar(50) NOT NULL,
  `depot` varchar(50) NOT NULL,
  `approve` varchar(11) DEFAULT NULL,
  `approve_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `main_stock`
--

INSERT INTO `main_stock` (`id`, `item_id`, `depot_id`, `stock_level`, `remarks`, `date`, `qr`, `user`, `region`, `depot`, `approve`, `approve_date`) VALUES
(1, 10034, 27, 800, '', NULL, NULL, '', '', '', '', NULL),
(2, 10041, 27, 100, '', NULL, NULL, '', '', '', '', NULL),
(3, 10033, 27, 100, '', NULL, NULL, '', '', '', '', NULL),
(4, 10036, 27, 100, '', NULL, NULL, '', '', '', '', NULL),
(5, 10038, 27, 250, '', NULL, NULL, '', '', '', '', NULL),
(6, 10038, 2, 1300, '', NULL, NULL, '', '', '', '', NULL),
(7, 10035, 27, 112, '', NULL, NULL, '', '', '', '', NULL),
(8, 10039, 27, 106, '', NULL, NULL, '', '', '', '', NULL),
(9, 10041, 2, 3210, '', NULL, NULL, '', '', '', '', NULL),
(10, NULL, NULL, NULL, '', NULL, NULL, '', '', '', '', NULL),
(15, 546, 5657, 6756, '', NULL, NULL, '', '', '', '', NULL),
(16, 424, 324, 4234, '', NULL, NULL, '', '', '', '', NULL),
(17, NULL, NULL, NULL, 'ghdfghdfgh', '2021-11-24', NULL, '', '', '', '', NULL),
(18, NULL, NULL, NULL, 'ghdfghdfghfghfgh', '2021-11-24', NULL, '', '', '', '', NULL),
(19, NULL, NULL, NULL, 'vikum', '2021-11-24', NULL, '', '', '', '', NULL),
(20, NULL, NULL, NULL, 'mnmmcvmn', '2021-11-24', NULL, '', '', '', '', NULL),
(21, NULL, NULL, NULL, 'vikum2', '2021-11-25', NULL, '', '', '', '', NULL),
(22, NULL, NULL, NULL, 'hjhhhvdilhani', '2021-11-25', NULL, '', '', '', '', NULL),
(23, NULL, NULL, NULL, '67456745iiiiiiiiiiiiiiiiiiii', '2021-11-25', NULL, '', '', '', '', NULL),
(24, NULL, NULL, NULL, 'apple', '2021-11-25', NULL, '', '', '', '', NULL),
(25, NULL, NULL, NULL, 'banana', '2021-11-25', NULL, '', '', '', '', NULL),
(26, NULL, NULL, NULL, 'pine apple', '2021-11-25', NULL, '', '', '', '', NULL),
(27, NULL, NULL, NULL, 'llllllllllllllll', '2021-11-25', NULL, '', '', '', '', NULL),
(28, NULL, NULL, NULL, 'pppppppppkkkkkkkkkkkkk', '2021-11-25', NULL, '', '', '', '', NULL),
(29, NULL, NULL, NULL, 'tuuuuuuuuuuuuuu', '2021-11-25', NULL, '', '', '', '', NULL),
(30, NULL, NULL, NULL, 'ggggggggghhhhhhhhh', '2021-11-25', NULL, '', '', '', '', NULL),
(31, NULL, NULL, NULL, 'tintin', '2021-11-25', NULL, '', '', '', '', NULL),
(32, NULL, NULL, NULL, 'ghjghjkhj', '2021-11-25', NULL, '', '', '', '', NULL),
(33, NULL, NULL, NULL, 'ghjghjkhj', '2021-11-25', NULL, '', '', '', '', NULL),
(34, NULL, NULL, NULL, 'mmmmmmmmmmm', '2021-11-25', NULL, '', '', '', '', NULL),
(35, NULL, NULL, NULL, 'yyyyy', '2021-11-26', NULL, '', '', '', '', NULL),
(36, NULL, NULL, NULL, 'mmmmmmmmmmmmmmmxxxxxxxxxxxxxxxzzzzzzzzzz', '2021-11-26', NULL, '', '', '', '', NULL),
(37, NULL, NULL, NULL, 'vikumjjjjjjj', '2021-11-26', NULL, '', '', '', '', NULL),
(38, NULL, NULL, NULL, 'uuuuuuuuuuiiiiixxxxxx', '2021-11-26', NULL, '', '', '', '', NULL),
(39, NULL, NULL, NULL, 'uuuuuuuuuuiiiiixxxxxxtryrtyrh', '2021-11-26', NULL, '', '', '', '', NULL),
(40, NULL, NULL, NULL, 'uuuuuuuuuuiiiiixxxxxxtryrtyrh3333333333', '2021-11-26', NULL, '', '', '', '', NULL),
(41, NULL, NULL, NULL, 'yyyyyyuuu', '2021-11-26', NULL, '', '', '', '', NULL),
(42, NULL, NULL, NULL, 'nnnnnnnnnn', '2021-11-26', NULL, '', '', '', '', NULL),
(43, NULL, NULL, NULL, 'rrrrrrrrr', '2021-11-26', NULL, '', '', '', '', NULL),
(44, NULL, NULL, NULL, 'vikumaaaaaaaaaaaaaaaaa', '2021-11-26', NULL, '', '', '', '', NULL),
(45, NULL, NULL, NULL, 'mmmmmmmmmmm', '2021-11-26', NULL, '', '', '', '', NULL),
(46, NULL, NULL, NULL, 'yyyyyyyy', '2021-11-26', NULL, '', '', '', '', NULL),
(47, NULL, NULL, NULL, 'bbbbbbbbb', '2021-11-26', NULL, '', '', '', '', NULL),
(48, NULL, NULL, NULL, 'bnnnnn', '2021-11-26', NULL, '', '', '', '', NULL),
(49, NULL, NULL, NULL, 'vikum', '2021-11-29', NULL, '', '', '', '', NULL),
(50, NULL, NULL, NULL, 'llllllllll', '2021-11-29', NULL, '', '', '', '', NULL),
(51, NULL, NULL, NULL, 'vb', '2021-11-29', NULL, '', '', '', '', NULL),
(52, NULL, NULL, NULL, 'bbbbbbbbbbb', '2021-11-30', NULL, '', '', '', '', NULL),
(53, NULL, NULL, NULL, '2021/12/01', '2021-12-01', NULL, '', '', '', NULL, NULL),
(54, NULL, NULL, NULL, 'rat', '2021-12-01', NULL, '1', '1', '2', '', NULL),
(55, NULL, NULL, NULL, 'Dell lap2 vikum', '2021-12-01', NULL, '1', '3', '9', '1', '2021-12-22'),
(56, NULL, NULL, NULL, 'ac', '2021-12-02', NULL, '1', '1', '2', '', NULL),
(57, NULL, NULL, NULL, 'Table', '2021-12-02', NULL, '1', '1', '2', '2', NULL),
(58, NULL, NULL, NULL, 'current stock pcs', '2021-12-02', NULL, '1', '1', '2', 'confirm', '2021-12-16'),
(59, NULL, NULL, NULL, 'apple 100', '2021-12-02', NULL, '1', '1', '2', NULL, NULL),
(60, NULL, NULL, NULL, 'test 1 vikum', '2021-12-16', NULL, '1', '1', '2', NULL, '2021-12-22'),
(61, NULL, NULL, NULL, 'nvbvnnnnqqqqqqqqqqq', '2021-12-02', NULL, '', '', '', '1', '2021-12-21'),
(62, NULL, NULL, NULL, 'Table 1', '2021-12-06', NULL, '1', '1', '2', NULL, NULL),
(63, NULL, NULL, NULL, 'gfhdfghnnnnnnnnmmmmm', '2021-12-06', NULL, '1', '1', '2', 'Broken', NULL),
(64, NULL, NULL, NULL, 'gg', '2021-12-06', NULL, '1', '3', '9', NULL, '2021-12-21'),
(65, NULL, NULL, NULL, 'qq', '2021-12-06', NULL, '1', '1', '2', 'Broken', NULL),
(66, NULL, NULL, NULL, 'zzzxxx', '2021-12-06', NULL, '1', '3', '9', 'confirm', '2021-12-22'),
(67, NULL, NULL, NULL, 'asasssss', '2021-12-07', NULL, '1', '1', '2', NULL, '2021-12-22'),
(68, NULL, NULL, NULL, '2021-10-07', '2021-12-07', NULL, '1', '1', '2', '1', '2021-12-17'),
(72, NULL, NULL, NULL, 'uuuiiii222', '2021-12-14', NULL, '1', '1', '2', NULL, NULL),
(73, NULL, NULL, NULL, 'uuuiiii222', '2021-12-14', NULL, '1', '1', '2', 'Broken', NULL),
(74, NULL, NULL, NULL, 'zebrz', '2021-12-14', NULL, '1', '1', '2', 'Broken', NULL),
(75, NULL, NULL, NULL, 'today', '2021-12-14', NULL, '1', '1', '2', '1', '2021-12-21'),
(76, NULL, NULL, NULL, 'transfer', '2021-12-15', NULL, '1', '3', '9', '1', '2021-12-21'),
(79, NULL, NULL, NULL, 'keyboard 1', '2021-12-24', NULL, '1', '1', '2', NULL, '2021-12-16'),
(80, NULL, NULL, NULL, 'ac it lab', '2021-12-01', NULL, '2', '3', '9', '1', '2022-01-06');

-- --------------------------------------------------------

--
-- Table structure for table `main_stock_item`
--

CREATE TABLE `main_stock_item` (
  `stockId` int(50) NOT NULL,
  `id` int(11) DEFAULT NULL,
  `item_name` varchar(50) DEFAULT NULL,
  `serial` varchar(50) DEFAULT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `main_stock_item`
--

INSERT INTO `main_stock_item` (`stockId`, `id`, `item_name`, `serial`, `date`) VALUES
(0, 42, '10192', 'gdfhd', '2021-11-14'),
(2, 42, '10198', 'fghdfgh', '2021-11-14'),
(3, 43, '10200', '42545', '2021-11-24'),
(4, 43, '10196', '5434531111115', '2021-11-01'),
(5, 44, '10193', 'gffgf', '2021-11-07'),
(6, 44, '10198', '4454', '2021-11-15'),
(7, 44, '10200', '53453', '2021-11-16'),
(8, 44, '10199', 'ghfgh', '2021-11-16'),
(9, 45, '10198', 'cnbvn', '2021-11-25'),
(10, 46, '10193', 'yyyy', '2021-11-16'),
(11, 47, '10193', 'sgdd', '2021-11-15'),
(12, 48, '10193', 'xgdfd', '2021-11-22'),
(13, 49, '10198', 'fghdhfgh', '2021-11-24'),
(14, 49, '10193', 'fghdhfghnm', '2021-11-24'),
(15, 50, '10198', 'hgkhk', '2021-11-07'),
(16, 51, '10198', 'sdgfasdgasd', '2021-11-15'),
(17, 52, '10193', 'vzvzxdfbv', '2021-11-15'),
(18, 53, '10193', 'bnn', '2021-11-16'),
(19, 53, '10198', 'bnnbnvbnm', '2021-11-17'),
(22, 54, '10198', 'werrrrrrrrrrrrrhh', '2021-12-01'),
(23, 55, '10193', 'dvzdfgzdf', '2021-12-01'),
(24, 55, '10021', 'dvzdfgzdfvdf', '2021-11-17'),
(25, 55, '10193', 'fgfgfgkkkkkkkkk', '2021-11-16'),
(26, 56, '10200', 'vgzxfbvgb', '2021-11-17'),
(27, 56, '10198', 'vgzxfbvgbfbxcvb', '2021-07-15'),
(28, 57, '10198', 'xgffghd', '2021-10-13'),
(29, 58, '10193', 'cgnxcn', '2021-11-16'),
(30, 58, '10198', 'cgnxcncfhgxcg', '2021-02-04'),
(31, 59, '10198', 'bjbn j', '2021-11-25'),
(50000, 65, '10198', 'xq', '2021-12-03'),
(70000, 61, '10200', 'cv bbbnvbn', '2021-11-09'),
(96111, 64, '10198', 'stc', '2021-12-02'),
(185562, 61, '10198', 'vikum', '2021-12-02'),
(968574, 60, '10198', 'vgxbvxfgcfb', '2021-12-01'),
(2000012, 66, '10193', 'ghgfh', '2021-12-02'),
(8963524, 60, '10193', 'vgxbvx', '2021-12-02'),
(8963526, 67, '10193', 'therth', '2021-11-17'),
(8963527, 67, '10192', 'therthhfg', '2021-12-02'),
(8963528, 68, '10192', 'stc-it-003', '2021-12-02'),
(8963529, 68, '10198', 'stc-it-005', '2021-11-25'),
(8963530, 68, '10040', 'stc-it-009', '2021-11-17'),
(8963533, 72, '10199', 'vikum2yyy', '2021-12-10'),
(8963534, 72, '10200', 'vikum2yyylll', '2021-12-05'),
(8963535, 73, '10192', 'lkkkkkkkkkkk', '2021-12-02'),
(8963536, 74, '10193', 'stc-hr-0096', '2021-12-08'),
(8963537, 75, '10193', 'hjhjhk', '2021-12-14'),
(8963538, 75, '10192', 'qqqqqqqqqtoday', '2021-12-14'),
(8963539, 76, '10198', 'stc-ac-op', '2021-12-15'),
(8963540, 79, '10201', 'stc/it/005', '2021-12-24'),
(8963541, 80, '10192', 'stc/it/005', '2021-12-24');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `member_id` int(11) NOT NULL,
  `NIC` varchar(12) DEFAULT NULL,
  `first_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `DOB` date DEFAULT NULL,
  `address` varchar(500) DEFAULT NULL,
  `member-category_id` int(11) DEFAULT NULL,
  `User_name` varchar(100) DEFAULT NULL,
  `Password` varchar(100) DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `depot_id` int(11) DEFAULT NULL,
  `region_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`member_id`, `NIC`, `first_name`, `last_name`, `DOB`, `address`, `member-category_id`, `User_name`, `Password`, `last_login`, `email`, `depot_id`, `region_id`) VALUES
(1, '80754542V', 'Egodauyana Manager 1', 'Vikum 3', '2019-01-03', 'Kadawatha', 1, 'Admin', 'aa', '2022-01-06 11:08:28', 'aadmin@library.com', 2, 1),
(2, 'eeee', 'nimal', 'silvaa', '2019-01-03', 'address', 2, 'vikum', 'aa', '2022-01-06 06:28:22', 'silva@gmail.com', 9, 3),
(3, '875621042V', 'Mahinda', 'Jayasundara', '2019-01-03', 'My address', 1, 'mahinda', 'aa', '2019-04-04 07:04:40', 'm@library.com', 2, 1),
(4, NULL, NULL, NULL, NULL, NULL, 2, 'Student3', 'aa', NULL, NULL, NULL, NULL),
(5, NULL, NULL, NULL, NULL, NULL, 2, 'Student4', 'aa', NULL, NULL, NULL, NULL),
(6, NULL, 'Prof 1 First', 'Prof Last', NULL, NULL, 3, 'Prof1', 'aa', '2019-04-08 09:25:29', NULL, NULL, NULL),
(7, NULL, NULL, NULL, NULL, NULL, 3, 'prof2', 'aa', '2019-02-07 06:48:21', NULL, NULL, NULL),
(8, NULL, NULL, NULL, NULL, NULL, 3, 'prof3', 'aa', NULL, NULL, NULL, NULL),
(9, NULL, NULL, NULL, NULL, NULL, 3, 'Prof4', 'aa', NULL, NULL, NULL, NULL),
(10, NULL, NULL, NULL, NULL, NULL, 3, 'Prof5', 'aa', NULL, NULL, NULL, NULL),
(11, '960000V', 'sa', 'sa', '2019-04-03', 'panadura', 2, 'sasi', '1223', '2021-11-08 19:31:11', '50sasini@gmail.com', 2, 1),
(14, '95555', 'Lahiru', 'Mendis', '2019-04-08', 'panadura', 1, 'Laiya', 'laiya', '2019-04-08 09:57:10', '50laiya@gmail.com', 1, 1),
(17, '612222', 'Devika', 'Mendis', '2019-04-08', 'panadura', 1, 'dev', 'dev', NULL, '50laiya@gmail.com', 1, 1),
(19, '8550000', 'Dev', 'Mendis', '2019-04-03', 'panadura', 1, 'devi', 'Devi1234', NULL, '50sasini@gmail.com', 3, 2),
(20, '855000058V', 'Dev', 'Mendis', '2019-04-03', 'panadura', 1, 'devika', 'Devi1234', NULL, '50sasini@gmail.com', 3, 2),
(21, '8555', 'malmi', 'Mendis', '2019-04-03', 'panadura', 1, 'malmi', 'malmi', NULL, '50malmi@gmail.com', 2, 1),
(22, '9555', 'dasun', 'Mendis', '2019-04-02', 'panadura', 3, 'dasun', 'Dasun123', '2021-11-08 19:32:04', 'dsn@gmail.com', 2, 1),
(23, '541651', 'gcvjv', 'pjp', '2019-04-04', 'panadura', 1, 'bhbj', 'Hgf12345', NULL, '50malmi@gmail.com', 3, 2),
(25, '588888', 'yuu', 'yuu', '2019-04-04', 'panadura', 1, 'kjhbjk', 'Uy123455', NULL, '50sasini@gmail.com', 3, 2),
(26, '852', 'ioi', 'Mendis', '2019-04-06', 'panadura', 1, 'ki', 'kiiikK12', NULL, '50sasini@gmail.com', 2, 1),
(27, '852852468V', '12', 'Mendis', '2019-04-06', 'panadura', 1, 'iu', 'kiiikK12', NULL, '50sasini@gmail.com', 2, 1),
(28, '952285898V', 'Sasini', 'Mendis', '2019-04-04', 'Galle', 1, 'sasin', 'Sasini12', NULL, '50sasini@gmail.com', 3, 2),
(29, '920015434V', 'Shanika', 'Perera', '1992-08-01', 'Haputhale', 6, 'shani', 'Shani123', '2019-07-25 06:58:17', 'shani@gmail.com', 17, 5),
(30, '968523458v', 'vikum', 'pramoda', '2015-06-17', 'vbxc', 6, 'vikum', '!@#QWE123qwe', NULL, 'pramoda@gmail.com', 19, 6),
(31, '9685741235v', 'vikum', 'pramoda', '2018-06-13', 'fjcghj', 1, 'vikum', 'qwe', '2021-11-15 07:22:09', 'pramoda@gmail.com', 23, 8);

-- --------------------------------------------------------

--
-- Table structure for table `member_category`
--

CREATE TABLE `member_category` (
  `member_category_id` int(11) NOT NULL,
  `member_category_text` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member_category`
--

INSERT INTO `member_category` (`member_category_id`, `member_category_text`) VALUES
(1, 'Admin'),
(2, 'Store keeper'),
(3, 'Purchasing officer'),
(4, 'Purchasing Manager'),
(5, 'Officer'),
(6, 'Manager'),
(7, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE `purchase` (
  `pur_id` int(11) NOT NULL,
  `pur_date` date DEFAULT NULL,
  `supplier` int(11) DEFAULT NULL,
  `status` varchar(30) DEFAULT NULL,
  `file_no` varchar(50) DEFAULT NULL,
  `sq_no` varchar(50) DEFAULT NULL,
  `fin_tot` decimal(65,2) DEFAULT NULL,
  `vat` decimal(65,2) DEFAULT NULL,
  `nbt` decimal(65,2) DEFAULT NULL,
  `sum_tot` decimal(65,2) DEFAULT NULL,
  `user` int(11) DEFAULT NULL,
  `approved_user` int(11) DEFAULT NULL,
  `approved_date` date DEFAULT NULL,
  `remarks` varchar(100) DEFAULT NULL,
  `del_address` varchar(200) DEFAULT NULL,
  `2nd_ad` varchar(200) DEFAULT NULL,
  `3rd_ad` varchar(200) DEFAULT NULL,
  `4th_ad` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `purchase`
--

INSERT INTO `purchase` (`pur_id`, `pur_date`, `supplier`, `status`, `file_no`, `sq_no`, `fin_tot`, `vat`, `nbt`, `sum_tot`, `user`, `approved_user`, `approved_date`, `remarks`, `del_address`, `2nd_ad`, `3rd_ad`, `4th_ad`) VALUES
(18, '2019-07-02', 41, 'processing', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2019-08-05', '', NULL, NULL, NULL, NULL),
(19, '2019-07-02', 41, 'processing', '12560', '1213', '3060.20', '459.20', '61.20', '3580.20', 1, 1, '2019-11-27', 'Urgent for stock,Please deliver soon.', 'NO:136/5/1, ', 'Kahanthota Road, ', 'Pittugala', 'Malabe'),
(20, '2019-07-02', 41, 'processing', '145525', '21221', '3105.00', '465.75', '62.10', '3632.85', 1, 1, '2019-07-04', 'wwww', 'NO:136/5/1, ', 'Kahanthota Road, ', 'Malabe', ''),
(21, '2021-11-10', 39, 'processing', '96', '96', '1674400.00', '251160.00', '0.00', '1925560.00', 1, 1, '2021-11-10', 'iukee', '22', '12', '21', 'gsdfghhhh'),
(22, '2021-11-10', NULL, 'incomplete', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(23, '2021-11-10', NULL, 'incomplete', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `purchase_item`
--

CREATE TABLE `purchase_item` (
  `id` int(11) NOT NULL,
  `pur_id` int(11) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `qty` float DEFAULT NULL,
  `unit_price` decimal(65,2) DEFAULT NULL,
  `discount` decimal(65,2) DEFAULT NULL,
  `disc_unit_price` decimal(65,2) DEFAULT NULL,
  `Total` decimal(65,2) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `purchase_item`
--

INSERT INTO `purchase_item` (`id`, `pur_id`, `item_id`, `qty`, `unit_price`, `discount`, `disc_unit_price`, `Total`, `status`) VALUES
(14, 18, 10037, 95, '10.00', NULL, NULL, '950.00', NULL),
(15, 19, 10035, 12, '100.00', '0.10', '90.00', '1080.00', 'approved'),
(16, 19, 10036, 22, '100.00', '0.10', '90.00', '1980.00', 'approved'),
(17, 20, 10039, 23, '150.00', '0.10', '135.00', '3105.00', NULL),
(18, 21, 10193, 8, '230000.00', '0.09', '209300.00', '1674400.00', 'complete'),
(19, 22, 10193, 8, NULL, NULL, NULL, NULL, NULL),
(20, 23, 10193, 8, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `reciept`
--

CREATE TABLE `reciept` (
  `r_id` int(11) NOT NULL,
  `req_id` int(11) DEFAULT NULL,
  `r_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reciept`
--

INSERT INTO `reciept` (`r_id`, `req_id`, `r_date`) VALUES
(1, 79, NULL),
(2, 78, NULL),
(3, 78, NULL),
(4, 78, NULL),
(5, 78, NULL),
(6, 79, NULL),
(7, 79, NULL),
(8, 80, NULL),
(9, 80, NULL),
(10, 80, NULL),
(11, 78, NULL),
(12, 79, NULL),
(13, 79, NULL),
(14, 79, NULL),
(15, 78, NULL),
(16, 78, NULL),
(17, 78, NULL),
(18, 79, NULL),
(19, 80, NULL),
(20, 80, NULL),
(21, 78, NULL),
(22, 79, NULL),
(23, 79, NULL),
(24, 80, NULL),
(25, 70, NULL),
(26, 70, NULL),
(27, 76, NULL),
(28, 76, NULL),
(29, 76, NULL),
(30, 82, NULL),
(31, 82, NULL),
(32, 82, NULL),
(33, 82, NULL),
(34, 82, NULL),
(35, 82, NULL),
(36, 82, NULL),
(37, 82, NULL),
(38, 82, NULL),
(39, 70, NULL),
(40, 70, NULL),
(41, 70, NULL),
(42, 70, NULL),
(43, 70, NULL),
(44, 70, NULL),
(45, 78, NULL),
(46, 79, NULL),
(47, 79, NULL),
(48, 78, NULL),
(49, 70, NULL),
(50, 76, NULL),
(51, 76, NULL),
(52, 78, NULL),
(53, 78, NULL),
(54, 78, NULL),
(55, 78, NULL),
(56, 78, NULL),
(57, 78, NULL),
(58, 79, NULL),
(59, 78, NULL),
(60, 78, NULL),
(61, 80, NULL),
(62, 79, NULL),
(63, 79, NULL),
(64, 82, NULL),
(65, 82, NULL),
(66, 82, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `region`
--

CREATE TABLE `region` (
  `region_id` int(11) NOT NULL,
  `region_name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `region`
--

INSERT INTO `region` (`region_id`, `region_name`) VALUES
(1, 'Colombo'),
(2, 'Boossa'),
(3, 'Matara'),
(4, 'Kandy'),
(5, 'Kurunegala'),
(6, 'Jaffna'),
(7, 'Ampara'),
(8, 'Head Office'),
(9, 'Anuradhapura'),
(10, 'Bandarawela'),
(11, 'Keppettipola'),
(12, 'Monaragala'),
(13, 'Rathnapura'),
(14, 'Polonnaruwa');

-- --------------------------------------------------------

--
-- Table structure for table `req`
--

CREATE TABLE `req` (
  `req_number` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `user` varchar(50) DEFAULT NULL,
  `region` varchar(50) DEFAULT NULL,
  `depot` varchar(50) DEFAULT NULL,
  `remarks` varchar(50) DEFAULT NULL,
  `approve` varchar(11) DEFAULT NULL,
  `approve_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `req`
--

INSERT INTO `req` (`req_number`, `date`, `user`, `region`, `depot`, `remarks`, `approve`, `approve_date`) VALUES
(1, '2019-02-13', 'LahiruM', 'Rathmalana', 'Piliyandala', 'New One', NULL, NULL),
(2, '2019-02-07', 'SAsiniH', 'Kaldemulla', 'Piliyandala', 'Request', NULL, NULL),
(3, '2019-02-06', 'AMAL', 'Rathmalana', 'Colombo', 'New', NULL, NULL),
(4, '2019-02-01', 'Sa', 'Rathmalana', 'Piliyandala', 'as', NULL, NULL),
(5, '2019-02-07', 'asxd', 'Kaldemulla', 'Piliyandala', 'zsdvdc', NULL, NULL),
(6, '2019-02-08', 'szaf', 'Rathmalana', 'Piliyandala', 'zc', NULL, NULL),
(7, '2019-02-07', 'xdv', 'Kaldemulla', 'Piliyandala', 'sdv', NULL, NULL),
(8, '2019-02-22', 'dzvsdsdzv', 'Rathmalana', 'Piliyandala', 'zdv', NULL, NULL),
(9, '2019-02-07', 'dvx', 'Rathmalana', 'Piliyandala', 'szvz', NULL, NULL),
(10, '2019-02-14', 'gcjngj', 'Rathmalana', 'Piliyandala', 'fd', NULL, NULL),
(11, '2019-03-01', 'daa', 'Ampara', 'Piliyandala', 'esfc', NULL, NULL),
(12, '2019-02-28', 'dsv', 'Rathmalana', 'Piliyandala', 'sF', NULL, NULL),
(13, '2019-03-07', 'aaaaaaa', 'Rathmalana', 'Piliyandala', 'dfdsfdfdfsfsfsdfs', NULL, NULL),
(14, '2019-02-28', 'qqqqqqqqqqqqqq', 'Rathmalana', 'Piliyandala', '', NULL, NULL),
(15, '2019-02-28', 'qqqqqqqqqqqqqq', 'Rathmalana', 'Piliyandala', '', NULL, NULL),
(16, '2019-02-27', 'dvxvfxcbfcbfcbfbgb', 'Rathmalana', 'Piliyandala', 'ddddddddddddddddddd', NULL, NULL),
(17, '2019-02-27', 'dvxvfxcbfcbfcbfbgb', 'Rathmalana', 'Piliyandala', 'ddddddddddddddddddd', NULL, NULL),
(18, '2019-03-05', 'lahiru', 'Head Office', 'Piliyandala', 'lahiru', NULL, NULL),
(19, '2019-03-05', 'lahiru', 'Head Office', 'Piliyandala', 'lahiru', NULL, NULL),
(20, '2019-03-05', 'asssssss', 'Rathmalana', 'Piliyandala', 'sssssssssASSSSSSSS', NULL, NULL),
(21, '2019-03-05', 'asssssss', 'Rathmalana', 'Piliyandala', 'sssssssssASSSSSSSS', NULL, NULL),
(22, '2019-03-05', 'DSFDSFD', 'Head Office', 'Piliyandala', 'FVFDVDF', NULL, NULL),
(23, '2019-03-05', 'DSFDSFD', 'Head Office', 'Piliyandala', 'FVFDVDF', NULL, NULL),
(24, '2019-03-05', 'sassssssssssssssssss', 'Rathmalana', 'Colombo', 'sassssssssssssssssssssssss', NULL, NULL),
(25, '2019-03-05', 'sassssssssssssssssss', 'Rathmalana', 'Colombo', 'sassssssssssssssssssssssss', NULL, NULL),
(26, '2019-03-05', 'sasssssssssssss', 'Rathmalana', 'Piliyandala', 'saaaaaaaawwwwwwwwwwwww', NULL, NULL),
(27, '2019-03-05', 'sasssssssssssss', 'Rathmalana', 'Piliyandala', 'saaaaaaaawwwwwwwwwwwww', NULL, NULL),
(28, '2019-02-25', 'mamaaaaaaaaaaa', 'Rathmalana', 'Piliyandala', 'mamaaaaaaaaaaaaaaaaa', NULL, NULL),
(29, '2019-02-25', 'mamaaaaaaaaaaa', 'Rathmalana', 'Piliyandala', 'mamaaaaaaaaaaaaaaaaa', NULL, NULL),
(30, '2019-03-07', 'sssssddddddd', 'Rathmalana', 'Colombo', 'csxfxx', NULL, NULL),
(31, '2019-03-07', 'sssssddddddd', 'Rathmalana', 'Colombo', 'csxfxx', NULL, NULL),
(32, '2019-03-07', 'sssssddddddd', 'Rathmalana', 'Colombo', 'csxfxx', NULL, NULL),
(33, '2019-03-07', 'sssssddddddd', 'Rathmalana', 'Colombo', 'csxfxx', NULL, NULL),
(34, '2019-03-07', 'sssssddddddd', 'Rathmalana', 'Colombo', 'csxfxx', NULL, NULL),
(35, '2019-03-07', 'sssssddddddd', 'Rathmalana', 'Colombo', 'csxfxx', NULL, NULL),
(36, '2019-03-05', 'xzcxz', 'Rathmalana', 'Piliyandala', 'dddd', NULL, NULL),
(37, '2019-03-05', 'xzcxz', 'Rathmalana', 'Piliyandala', 'dddd', NULL, NULL),
(38, '2019-03-08', 'xxx', 'Kaldemulla', 'Piliyandala', 'adddddddddd', NULL, NULL),
(39, '2019-03-08', 'xxx', 'Kaldemulla', 'Piliyandala', 'adddddddddd', NULL, NULL),
(40, '2019-03-01', 'xdzx', 'Rathmalana', 'Colombo', 'ffff', NULL, NULL),
(41, '2019-03-01', 'xdzx', 'Rathmalana', 'Colombo', 'ffff', NULL, NULL),
(42, '2019-03-08', 'ddddddddddd', 'Head Office', 'Colombo', 'zxxx', NULL, NULL),
(43, '2019-03-08', 'ddddddddddd', 'Head Office', 'Colombo', 'zxxx', '1', NULL),
(44, '2019-03-06', 'sddzzzzzzzzzzzzzz', 'Rathmalana', 'Colombo', 'zzzzzzzzzzzz', '1', NULL),
(45, '2019-02-27', 'aqqqqqqqqqqqq', 'Kaldemulla', '4', 'qweeeeee', '1', NULL),
(46, '2019-02-04', 'aqqqqqqqqqqqq', 'Kaldemulla', '4', 'qweeeeee', '1', NULL),
(47, '2019-03-06', 'azzzzzzzzaaa', '12', '3', 'azazzzzzzzzzaaaaaa', '1', NULL),
(48, '2019-03-06', 'azzzzzzzzaaa', '4', '1', 'azazzzzzzzzzaaaaaa', '1', NULL),
(49, '2019-03-06', 'azzzzzzzzaaa', '5', '1', 'azazzzzzzzzzaaaaaaAAAAAAASDDD', '1', NULL),
(50, '2019-03-06', 'qweeee', '4', '1', 'qqqqq', '1', NULL),
(51, '2019-04-01', 'lll', '1', '2', 'New', '1', NULL),
(52, '2019-04-03', 'was', '2', '1', 'faaaas', '1', NULL),
(53, '2019-04-03', 'Admin', '10', '28', 'Ra', '1', NULL),
(54, '2019-04-03', 'Admin', '11', '3', 'qqqq', '1', NULL),
(55, '2019-04-03', 'Admin', '11', '3', 'lahiru', '1', NULL),
(56, '2019-04-03', 'Admin', '11', '3', 'newa', '1', NULL),
(57, '2019-04-05', 'Admin', '10', '28', 'test', '1', NULL),
(58, '2019-05-02', 'Admin', '10', '28', 'Npo', '1', NULL),
(59, '2019-06-04', 'Admin', '10', '28', 'aaaaa', '1', NULL),
(60, '2019-06-06', 'Admin', '10', '28', '', '1', NULL),
(61, '2019-06-28', 'Admin', '12', '3', 'Today Req Urgent', 'Fail', NULL),
(62, '2019-06-27', 'Admin', '11', '3', 'qwe', NULL, NULL),
(63, '2019-06-28', 'Admin', '13', '3', 'aw', '1', NULL),
(64, '2019-06-28', 'Admin', '12', '3', 'ASS', '1', NULL),
(65, '2019-07-02', 'Admin', '10', '1', '', NULL, NULL),
(66, '2019-07-02', 'Admin', '10', '1', '', NULL, NULL),
(69, '2019-07-03', '1', '1', '2', NULL, '1', NULL),
(70, '2019-07-04', '1', '1', '2', '', '1', NULL),
(71, '2019-07-04', '1', '1', '2', 'SK Items', '1', NULL),
(72, '2019-07-04', '1', '1', '2', 'sk new', '1', '2019-07-08'),
(73, '2019-07-04', '1', '1', '2', 'uuu', '1', '2019-07-08'),
(74, '2019-07-04', '1', '1', '2', '', 'Fail', NULL),
(75, '2019-07-04', '1', '1', '2', 'ty', NULL, '2019-11-05'),
(76, '2019-07-04', '1', '1', '2', 'k', '1', '2019-07-09'),
(77, '2019-07-04', '1', '1', '2', 'll', NULL, NULL),
(78, '2019-07-04', '1', '1', '2', 'ssss', '1', '2019-07-08'),
(79, '2019-07-04', '1', '1', '2', '', '1', NULL),
(81, '2019-07-10', '1', '1', '2', '', '1', NULL),
(82, '2019-07-10', '1', '1', '2', '', '1', NULL),
(83, '2019-07-24', '1', '1', '2', NULL, '1', '2019-07-24'),
(84, '2019-07-24', '1', '1', '2', NULL, '1', '2019-07-24'),
(85, '2019-07-24', '1', '1', '2', NULL, '1', '2019-07-24'),
(86, '2019-07-24', '1', '1', '2', NULL, '1', '2019-07-24'),
(89, '2019-07-24', '1', '1', '2', NULL, '1', '2019-07-24'),
(90, '2019-07-24', '1', '1', '2', NULL, '1', '2019-07-24'),
(91, '2019-07-24', '1', '1', '2', NULL, '1', '2019-07-24'),
(92, '2021-11-08', '1', '1', '2', 'TESTTTTTTT', '1', '2021-11-08'),
(93, '2021-11-08', '1', NULL, '2', 'newwwwww', '1', NULL),
(94, '2021-11-08', '1', '1', '2', NULL, '1', '2021-11-08'),
(95, '2021-11-08', '22', '1', '2', '121212', '1', '2021-11-08'),
(96, '2021-11-09', '1', '1', '2', 'NEW TEST', '1', '2021-12-15'),
(97, '2021-11-10', '1', '1', '2', 'new', '1', '2021-11-10'),
(98, '2021-11-10', '1', '1', '2', '', '1', '2021-11-10'),
(99, '2021-11-22', NULL, NULL, NULL, 'ouio', NULL, NULL),
(100, '2021-11-24', NULL, NULL, NULL, 'ooooo', NULL, NULL),
(101, '2021-11-24', '1', '1', '2', '22222', '1', '2021-12-14'),
(102, '2021-11-24', NULL, NULL, NULL, 'pppppplllllllllllllll', NULL, NULL),
(103, '2021-11-24', '1', '1', '2', '1111we', 'Fail', NULL),
(104, '2021-11-25', '1', '1', '2', 'opopopopopopopopop', 'Fail', NULL),
(105, '2021-11-25', '1', '1', '2', '454546456ghhgf9666666', '1', '2021-12-14'),
(106, '2021-12-02', '1', '1', '2', 'kkkk', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `req_items`
--

CREATE TABLE `req_items` (
  `reqID` int(11) NOT NULL,
  `req_number` int(11) DEFAULT NULL,
  `item_name` varchar(50) DEFAULT NULL,
  `qty` float DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `extra_qty` float DEFAULT NULL,
  `av` varchar(11) DEFAULT NULL,
  `issue_depot` int(11) DEFAULT NULL,
  `issue_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `req_items`
--

INSERT INTO `req_items` (`reqID`, `req_number`, `item_name`, `qty`, `status`, `extra_qty`, `av`, `issue_depot`, `issue_date`) VALUES
(1, NULL, 'S', NULL, NULL, NULL, NULL, NULL, NULL),
(2, NULL, 's', NULL, NULL, NULL, NULL, NULL, NULL),
(3, 3, 'Books', 50, NULL, NULL, NULL, NULL, NULL),
(4, 3, 'Files', 100, NULL, NULL, NULL, NULL, NULL),
(5, 4, 'ass', 2, NULL, NULL, NULL, NULL, NULL),
(6, 4, 'ass', 2, NULL, NULL, NULL, NULL, NULL),
(7, 5, 'sda', 2, NULL, NULL, NULL, NULL, NULL),
(8, 5, 'awf', 2, NULL, NULL, NULL, NULL, NULL),
(9, 6, 'a', 2, NULL, NULL, NULL, NULL, NULL),
(10, 6, '1', 2, NULL, NULL, NULL, NULL, NULL),
(11, 10, 'bhb,', 24, NULL, NULL, NULL, NULL, NULL),
(12, 10, 'wef', 23, NULL, NULL, NULL, NULL, NULL),
(13, 11, 'as', 2, NULL, NULL, NULL, NULL, NULL),
(14, 11, 'as', 3, NULL, NULL, NULL, NULL, NULL),
(15, 12, 'dv', 44, NULL, NULL, NULL, NULL, NULL),
(16, NULL, '10018', 12, NULL, NULL, NULL, NULL, NULL),
(17, NULL, '10018', 12, NULL, NULL, NULL, NULL, NULL),
(18, NULL, '10018', 23, NULL, NULL, NULL, NULL, NULL),
(19, NULL, '10018', 23, NULL, NULL, NULL, NULL, NULL),
(20, NULL, '10018', 12, NULL, NULL, NULL, NULL, NULL),
(21, NULL, '10010', 14, NULL, NULL, NULL, NULL, NULL),
(22, 77, '10010', 12, NULL, NULL, NULL, NULL, NULL),
(23, 75, '10018', 12, NULL, NULL, NULL, NULL, NULL),
(24, 74, '10010', 23, 'Fail', NULL, NULL, NULL, NULL),
(25, 74, '10015', 123, 'approved', NULL, NULL, NULL, NULL),
(26, 48, '10011', 122, 'approved', NULL, NULL, NULL, NULL),
(27, 76, '10010', 432, 'Fail', NULL, NULL, NULL, NULL),
(28, 48, '10015', 456, 'approved', NULL, NULL, NULL, NULL),
(29, 49, '10010', 123, 'approved', NULL, NULL, NULL, NULL),
(30, 49, '10023', 23, 'approved', NULL, NULL, NULL, NULL),
(34, 50, '10025', 12, 'approved', NULL, NULL, NULL, NULL),
(35, 51, '10023', 12, 'approved', NULL, NULL, NULL, NULL),
(36, 51, '10025', 10, 'approved', NULL, NULL, NULL, NULL),
(37, 52, '10025', 12, 'approved', NULL, NULL, NULL, NULL),
(38, 52, '10005', 13, 'approved', NULL, NULL, NULL, NULL),
(39, 53, '10025', 12, 'approved', NULL, NULL, NULL, NULL),
(45, 54, '10018', 12, 'approved', NULL, NULL, NULL, NULL),
(46, 55, '10018', 12, 'approved', NULL, NULL, NULL, NULL),
(47, 56, '10014', 12, 'approved', NULL, NULL, NULL, NULL),
(48, 56, '10015', 123, 'approved', NULL, NULL, NULL, NULL),
(49, 57, '10011', 5, 'approved', NULL, NULL, NULL, NULL),
(50, 58, '10010', 10, 'approved', NULL, NULL, NULL, NULL),
(51, 58, '10015', 15, 'approved', NULL, NULL, NULL, NULL),
(52, 59, '10000', 10, 'approved', NULL, NULL, NULL, NULL),
(53, 59, '10022', 14, 'approved', NULL, NULL, NULL, NULL),
(54, 60, '10034', 25, 'complete', NULL, NULL, NULL, NULL),
(55, 61, '10038', 50, 'Fail', NULL, '2', 2, '0000-00-00'),
(56, 61, '10037', 50, 'Fail', NULL, NULL, NULL, NULL),
(57, 61, '10036', 10, 'Fail', NULL, '2', 2, '0000-00-00'),
(58, 62, '10035', 12, 'pending', NULL, '2', NULL, NULL),
(59, 62, '10036', 12, 'direct', NULL, '2', NULL, NULL),
(60, 62, '10037', 45, 'pending', NULL, '2', NULL, NULL),
(61, 62, '10038', 56, 'approved', NULL, '1', NULL, NULL),
(62, 63, '10040', 12, 'approved', NULL, '2', NULL, NULL),
(63, 63, '10039', 23, 'pending', NULL, '2', NULL, NULL),
(64, 64, '10038', 100, 'issue', NULL, '2', 2, '2019-08-30'),
(65, 65, '10041', 50, 'approved', NULL, '2', NULL, NULL),
(66, 65, '10033', 8, 'approved', NULL, '2', NULL, NULL),
(67, 66, '10041', 25, 'approved', NULL, '2', NULL, NULL),
(68, 66, '10034', 8, 'complete', NULL, '2', NULL, NULL),
(72, 69, '10041', 10, 'approved', 10, '2', NULL, NULL),
(76, 70, '10023', 25, 'done', NULL, '2', 2, '2019-08-30'),
(78, 78, '10034', 10, 'done', NULL, '2', 2, '2019-08-30'),
(79, 78, '10041', 200, 'done', NULL, '1', 2, '2019-08-30'),
(80, 79, '10034', 20, 'done', NULL, '2', 2, '2019-08-30'),
(82, 82, '10038', 50, 'done', NULL, '1', 2, '2019-08-30'),
(83, 86, '10038', NULL, 'direct', 10, NULL, NULL, NULL),
(84, 89, '10036', NULL, 'direct', 10, NULL, NULL, NULL),
(85, 91, '10034', NULL, 'direct', 25, NULL, NULL, NULL),
(86, 92, '10051', 100, 'approved', NULL, NULL, NULL, NULL),
(87, 93, '10061', 400, 'direct', NULL, '1', NULL, NULL),
(88, 94, '10061', NULL, 'direct', 25, NULL, NULL, NULL),
(89, 95, '10021', 50, 'approved', NULL, NULL, NULL, NULL),
(90, 96, '10181', 20, 'approved', NULL, NULL, NULL, NULL),
(91, 97, '10193', 8, 'approved', NULL, NULL, NULL, NULL),
(92, 97, '10030', 2, 'approved', NULL, NULL, NULL, NULL),
(93, 98, '10195', 200, 'approved', NULL, NULL, NULL, NULL),
(94, 98, '10194', 2, 'approved', NULL, NULL, NULL, NULL),
(95, 99, '10193', 50, NULL, NULL, NULL, NULL, NULL),
(96, 100, '10193', 66786800, NULL, NULL, NULL, NULL, NULL),
(97, 101, '10193', 222, 'approved', NULL, NULL, NULL, NULL),
(100, 103, '10200', 11, 'Fail', NULL, NULL, NULL, NULL),
(101, 104, '10198', 116, 'Fail', NULL, NULL, NULL, NULL),
(102, 104, '10198', 757, 'Fail', NULL, NULL, NULL, NULL),
(103, 105, '10198', 852, 'approved', NULL, NULL, NULL, NULL),
(104, 106, '10198', 2, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `stock_supplier`
--

CREATE TABLE `stock_supplier` (
  `sup_id` int(11) NOT NULL,
  `sup_name` varchar(240) DEFAULT NULL,
  `sup_address` varchar(360) DEFAULT NULL,
  `2nd` varchar(360) DEFAULT NULL,
  `3rd` varchar(360) DEFAULT NULL,
  `4th` varchar(360) DEFAULT NULL,
  `sup_contact` varchar(30) DEFAULT NULL,
  `sup_email` varchar(240) DEFAULT NULL,
  `sdate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stock_supplier`
--

INSERT INTO `stock_supplier` (`sup_id`, `sup_name`, `sup_address`, `2nd`, `3rd`, `4th`, `sup_contact`, `sup_email`, `sdate`) VALUES
(22, 'Kumara', 'Pittugala,Malabe', NULL, NULL, NULL, '0778529637', 'kumara345@gmail.com', '2019-02-22'),
(23, 'lahiru', 'kaduvela,colombo', NULL, NULL, NULL, '0771234567', 'lahiru123@gmail.com', '2019-02-01'),
(24, 'sasini', 'malabe,coclombo', NULL, NULL, NULL, '077456123', 'sasini123@gmailcom', '2019-02-05'),
(25, 'vimukthi', 'malabe,coclombo', NULL, NULL, NULL, '0777894562', 'vimukthi123@gmail.com', '2019-02-09'),
(26, 'manoj', 'battaramulla,colombo', NULL, NULL, NULL, '0770596321', 'manoj456@ganil.com', '2019-02-09'),
(27, 'Lithira', 'rajagiriya,colombo', NULL, NULL, NULL, '0713214567', 'lithira678@gmail.com', '2019-02-03'),
(28, 'naveen', 'no:224,St. Merino Garden,Pahala Hattiniya,Marawila', NULL, NULL, NULL, '0777894561', 'sandun123@gmail.com', '2019-02-01'),
(29, 'Kasuni', 'kollupitiya,colombo', NULL, NULL, NULL, '0771234567', 'kasuni456@gmail.com', '2019-02-17'),
(30, 'amila', 'kaduvela,colombo', NULL, NULL, NULL, '0777894561', 'amila098@gmail.com', '2019-02-12'),
(31, 'nishan', 'no:224,St. Merino Garden,Pahala Hattiniya,Marawila', NULL, NULL, NULL, '0777894561', 'sandun123@gmail.com', '2019-02-07'),
(32, 'sedfsff', 'no:224,St. Merino Garden,Pahala Hattiniya,Marawila', NULL, NULL, NULL, '0777894561', 'fdo123@gmail.com', '2019-02-01'),
(33, 'erggreg', 'no:224,St. Merino Garden,Pahala Hattiniya,Marawila', NULL, NULL, NULL, '0776541237', 'sandun123@gmail.com', '2019-02-05'),
(34, 'sunil', 'malabe.kaduvela', NULL, NULL, NULL, '0770532987', 'sunil321@gmail.com', '2019-04-02'),
(35, 'gghh', 'no:224,St. Merino Garden,Pahala Hattiniya,Marawila', NULL, NULL, NULL, '0777894561', 'sdfsfsfs@gmail.com', '2019-04-03'),
(36, 'thtfhfh', 'no:224,St. Merino Garden,Pahala Hattiniya,Marawila', NULL, NULL, NULL, '0777894561', 'fdo123@gmail.com', '2019-04-03'),
(37, '', '', NULL, NULL, NULL, '', '', '0000-00-00'),
(38, 'asd store', 'no 80 wadduwa', NULL, NULL, NULL, '0715449154', 'aas@dd.com', '2019-04-16'),
(39, 'Kasaa', 'add', NULL, NULL, NULL, '0715449154', '5@gmail.com', '2019-04-09'),
(40, 'Nalini', 'Matara', NULL, NULL, NULL, '0715449154', '5@gmail.com', '2019-06-04'),
(41, 'Wasundara Perera', 'NO:38', 'Kotte road', 'Battaramulla', 'Colombo 05', '0715449154', '5@gmail.com', '2019-05-29');

-- --------------------------------------------------------

--
-- Table structure for table `sub_cato`
--

CREATE TABLE `sub_cato` (
  `sub_id` int(11) NOT NULL,
  `sub_name` varchar(60) DEFAULT NULL,
  `cat_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sub_cato`
--

INSERT INTO `sub_cato` (`sub_id`, `sub_name`, `cat_id`) VALUES
(1000, 'Electrical Goods ', 101),
(1001, 'Stationery ', 101),
(1002, 'Hardware Items', 101),
(1003, 'Miscellaneous', 101),
(1004, 'Office Equipments', 100),
(1005, 'Tyres  & Tubes', 101),
(1006, 'Chemical & Lab Equipments', 100),
(1007, 'Sanitary ware', 101),
(1008, 'Computer Software & Accessories ', 101),
(1009, 'Spares for Machinery / Heavy vehicles ', 101),
(1010, 'Printing', 101),
(1011, 'A/C', 100),
(1012, 'covid-19', 101),
(1013, 'whiteboard', 100),
(1014, 'pen', 101),
(1015, 'PC', 100),
(1016, 'Computer Items', 100);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `sup_id` int(10) NOT NULL,
  `sup_name` varchar(100) NOT NULL,
  `sup_contact` varchar(100) NOT NULL,
  `sup_address` varchar(100) NOT NULL,
  `saddress` varchar(100) NOT NULL,
  `taddress` varchar(100) NOT NULL,
  `faddress` varchar(100) NOT NULL,
  `sup_email` varchar(100) NOT NULL,
  `sdate` date NOT NULL DEFAULT current_timestamp(),
  `remark` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`sup_id`, `sup_name`, `sup_contact`, `sup_address`, `saddress`, `taddress`, `faddress`, `sup_email`, `sdate`, `remark`) VALUES
(4, 'vikum', '+94717196084', '34', 'Hakmana Road', 'Beliatta', 'colombo 3', 'customer1@gmail.com', '2022-01-06', 'dhgfhhhhhdfyartttttttt');

-- --------------------------------------------------------

--
-- Table structure for table `unit`
--

CREATE TABLE `unit` (
  `unit_id` int(11) NOT NULL,
  `unit` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `unit`
--

INSERT INTO `unit` (`unit_id`, `unit`) VALUES
(1, 'Kg'),
(2, 'Nos'),
(3, 'Rs'),
(4, 'Mtr'),
(5, 'Ltr'),
(6, 'Packet'),
(7, 'Bottles');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `depot`
--
ALTER TABLE `depot`
  ADD PRIMARY KEY (`depot_id`),
  ADD KEY `region_id` (`region_id`);

--
-- Indexes for table `grn`
--
ALTER TABLE `grn`
  ADD PRIMARY KEY (`grn_id`),
  ADD KEY `pur_id` (`pur_id`),
  ADD KEY `region_id` (`invoice`),
  ADD KEY `depot_id` (`depot_id`),
  ADD KEY `member_id` (`member_id`);

--
-- Indexes for table `grn_item`
--
ALTER TABLE `grn_item`
  ADD PRIMARY KEY (`grnItem_id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `stockId` (`stockId`);

--
-- Indexes for table `issue_item`
--
ALTER TABLE `issue_item`
  ADD PRIMARY KEY (`iss_id`),
  ADD KEY `issue_id` (`issue_id`),
  ADD KEY `item_id` (`item_id`);

--
-- Indexes for table `issue_order`
--
ALTER TABLE `issue_order`
  ADD PRIMARY KEY (`issue_id`),
  ADD KEY `req_id` (`req_id`),
  ADD KEY `region_id` (`region_id`),
  ADD KEY `depot_id` (`depot_id`),
  ADD KEY `member_id` (`member_id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`item_id`),
  ADD KEY `sub_id` (`sub_id`);

--
-- Indexes for table `main_cato`
--
ALTER TABLE `main_cato`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `main_stock`
--
ALTER TABLE `main_stock`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `main_stock_item`
--
ALTER TABLE `main_stock_item`
  ADD PRIMARY KEY (`stockId`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`member_id`),
  ADD KEY `member_category_id_Fk` (`member-category_id`),
  ADD KEY `depot_id` (`depot_id`),
  ADD KEY `region_id` (`region_id`);

--
-- Indexes for table `member_category`
--
ALTER TABLE `member_category`
  ADD PRIMARY KEY (`member_category_id`);

--
-- Indexes for table `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`pur_id`);

--
-- Indexes for table `purchase_item`
--
ALTER TABLE `purchase_item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reciept`
--
ALTER TABLE `reciept`
  ADD PRIMARY KEY (`r_id`);

--
-- Indexes for table `region`
--
ALTER TABLE `region`
  ADD PRIMARY KEY (`region_id`);

--
-- Indexes for table `req`
--
ALTER TABLE `req`
  ADD PRIMARY KEY (`req_number`);

--
-- Indexes for table `req_items`
--
ALTER TABLE `req_items`
  ADD PRIMARY KEY (`reqID`),
  ADD KEY `req_number` (`req_number`);

--
-- Indexes for table `stock_supplier`
--
ALTER TABLE `stock_supplier`
  ADD PRIMARY KEY (`sup_id`);

--
-- Indexes for table `sub_cato`
--
ALTER TABLE `sub_cato`
  ADD PRIMARY KEY (`sub_id`),
  ADD KEY `cat_id` (`cat_id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`sup_id`);

--
-- Indexes for table `unit`
--
ALTER TABLE `unit`
  ADD PRIMARY KEY (`unit_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `depot`
--
ALTER TABLE `depot`
  MODIFY `depot_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `grn`
--
ALTER TABLE `grn`
  MODIFY `grn_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `grn_item`
--
ALTER TABLE `grn_item`
  MODIFY `grnItem_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `issue_item`
--
ALTER TABLE `issue_item`
  MODIFY `iss_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `issue_order`
--
ALTER TABLE `issue_order`
  MODIFY `issue_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10202;

--
-- AUTO_INCREMENT for table `main_cato`
--
ALTER TABLE `main_cato`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `main_stock`
--
ALTER TABLE `main_stock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `main_stock_item`
--
ALTER TABLE `main_stock_item`
  MODIFY `stockId` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8963542;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `member_category`
--
ALTER TABLE `member_category`
  MODIFY `member_category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `purchase`
--
ALTER TABLE `purchase`
  MODIFY `pur_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `purchase_item`
--
ALTER TABLE `purchase_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `reciept`
--
ALTER TABLE `reciept`
  MODIFY `r_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `region`
--
ALTER TABLE `region`
  MODIFY `region_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `req`
--
ALTER TABLE `req`
  MODIFY `req_number` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT for table `req_items`
--
ALTER TABLE `req_items`
  MODIFY `reqID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT for table `stock_supplier`
--
ALTER TABLE `stock_supplier`
  MODIFY `sup_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `sub_cato`
--
ALTER TABLE `sub_cato`
  MODIFY `sub_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1017;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `sup_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `unit`
--
ALTER TABLE `unit`
  MODIFY `unit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `depot`
--
ALTER TABLE `depot`
  ADD CONSTRAINT `depot_ibfk_1` FOREIGN KEY (`region_id`) REFERENCES `region` (`region_id`);

--
-- Constraints for table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `stockId` FOREIGN KEY (`stockId`) REFERENCES `main_stock_item` (`stockId`);

--
-- Constraints for table `issue_item`
--
ALTER TABLE `issue_item`
  ADD CONSTRAINT `issue_item_ibfk_1` FOREIGN KEY (`issue_id`) REFERENCES `issue_order` (`issue_id`);

--
-- Constraints for table `issue_order`
--
ALTER TABLE `issue_order`
  ADD CONSTRAINT `issue_order_ibfk_2` FOREIGN KEY (`region_id`) REFERENCES `region` (`region_id`),
  ADD CONSTRAINT `issue_order_ibfk_3` FOREIGN KEY (`depot_id`) REFERENCES `depot` (`depot_id`),
  ADD CONSTRAINT `issue_order_ibfk_4` FOREIGN KEY (`member_id`) REFERENCES `member` (`member_id`);

--
-- Constraints for table `main_stock_item`
--
ALTER TABLE `main_stock_item`
  ADD CONSTRAINT `main_stock_item_ibfk_1` FOREIGN KEY (`id`) REFERENCES `main_stock` (`id`);

--
-- Constraints for table `member`
--
ALTER TABLE `member`
  ADD CONSTRAINT `member_category_id_Fk` FOREIGN KEY (`member-category_id`) REFERENCES `member_category` (`member_category_id`),
  ADD CONSTRAINT `member_ibfk_1` FOREIGN KEY (`depot_id`) REFERENCES `depot` (`depot_id`),
  ADD CONSTRAINT `member_ibfk_2` FOREIGN KEY (`region_id`) REFERENCES `region` (`region_id`);

--
-- Constraints for table `req_items`
--
ALTER TABLE `req_items`
  ADD CONSTRAINT `req_items_ibfk_1` FOREIGN KEY (`req_number`) REFERENCES `req` (`req_number`);

--
-- Constraints for table `sub_cato`
--
ALTER TABLE `sub_cato`
  ADD CONSTRAINT `sub_cato_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `main_cato` (`cat_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
