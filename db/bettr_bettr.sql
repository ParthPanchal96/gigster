-- phpMyAdmin SQL Dump
-- version 4.1.8
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 06, 2014 at 02:37 AM
-- Server version: 5.5.36-cll-lve
-- PHP Version: 5.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bettr_bettr`
--

-- --------------------------------------------------------

--
-- Table structure for table `btr_assignment`
--

CREATE TABLE IF NOT EXISTS `btr_assignment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `projectId` int(11) DEFAULT NULL,
  `awardedto` int(11) DEFAULT NULL,
  `assignedon` double DEFAULT NULL,
  `startdate` date DEFAULT NULL,
  `completiondate` date DEFAULT NULL,
  `rating` enum('0','1','2','3','4','5') DEFAULT '0',
  `feedback` text,
  `feedbackowner` text,
  `actualcompletion` double DEFAULT NULL,
  `termsaccepted` enum('0','1') DEFAULT '0',
  `projectowner` int(11) DEFAULT NULL,
  `terms` text,
  `amount` double DEFAULT NULL,
  `status` enum('0','1','2','3','4','5','6') NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `btr_assignment`
--

INSERT INTO `btr_assignment` (`id`, `projectId`, `awardedto`, `assignedon`, `startdate`, `completiondate`, `rating`, `feedback`, `feedbackowner`, `actualcompletion`, `termsaccepted`, `projectowner`, `terms`, `amount`, `status`) VALUES
(8, 1, 2, 1406269450, '2014-07-25', '2014-07-30', '0', NULL, NULL, NULL, '1', 1, 'fasdfasd', 250, '0'),
(9, 2, 2, 1407163770, '2014-07-25', '2014-07-29', '0', NULL, NULL, NULL, '0', 3, 'Hi, I would like to aware the project to you.', 90, '0'),
(10, 3, 3, 1407210527, '2014-08-04', '2014-08-04', '0', NULL, NULL, NULL, '1', 2, '', 10, '0'),
(11, 8, 7, 1407325008, '2014-08-06', '2014-08-06', '0', NULL, NULL, NULL, '1', 3, 'Hello Ashish, \r\n\r\nI hope you will do a good job.', 168, '0'),
(12, 10, 3, 1407325242, '2014-08-06', '2014-08-06', '0', NULL, NULL, NULL, '1', 2, 'Please sign the NDA and other attached docs.', 100, '0'),
(13, 13, 3, 1407383657, '2014-08-06', '2014-08-06', '0', NULL, NULL, NULL, '1', 8, 'you got the job!', 900, '0'),
(14, 5, 4, 1409217167, '2014-08-28', '2014-08-28', '0', NULL, NULL, NULL, '1', 5, '', 200, '0'),
(15, 20, 5, 1409217378, '2014-08-28', '2014-09-20', '0', NULL, NULL, NULL, '1', 4, 'test', 100, '0'),
(16, 17, 4, 1409230212, '2014-08-28', '2014-08-28', '0', NULL, NULL, NULL, '0', 2, 'will you able to complete this task in time...', 10, '0'),
(17, 24, 2, 1409230430, '2014-08-28', '2014-09-17', '0', NULL, NULL, NULL, '0', 4, 'test', 50, '0'),
(18, 25, 5, 1409469978, '2014-08-31', '2014-08-31', '0', NULL, NULL, NULL, '1', 3, 'I would like this phase to be completed by 5th September', 200, '0'),
(19, 26, 5, 1409551360, '2014-09-01', '2014-09-24', '0', NULL, NULL, NULL, '1', 3, 'This is to be awarded to rohit', 100, '0'),
(20, 27, 3, 1409747511, '2014-09-03', '2014-09-03', '0', NULL, NULL, NULL, '0', 12, 'monry will paid end of the project', 100, '0'),
(21, 32, 2, 1410247554, '2014-09-09', '2014-09-09', '0', NULL, NULL, NULL, '1', 13, 'no any', 20, '0'),
(22, 36, 5, 1410409202, '2014-09-11', '2014-09-11', '0', NULL, NULL, NULL, '1', 2, 'how many photos do you have ??', 12, '0');

-- --------------------------------------------------------

--
-- Table structure for table `btr_attachments`
--

CREATE TABLE IF NOT EXISTS `btr_attachments` (
  `attchId` int(11) NOT NULL AUTO_INCREMENT,
  `userId` int(11) DEFAULT NULL,
  `attchpath` varchar(255) DEFAULT NULL,
  `attachmenttype` varchar(10) DEFAULT NULL,
  `projectId` int(11) DEFAULT '0',
  `bidId` int(11) DEFAULT '0',
  `attachedon` double DEFAULT NULL,
  `msgId` int(11) DEFAULT '0',
  PRIMARY KEY (`attchId`),
  KEY `userId` (`userId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `btr_attachments`
--

INSERT INTO `btr_attachments` (`attchId`, `userId`, `attchpath`, `attachmenttype`, `projectId`, `bidId`, `attachedon`, `msgId`) VALUES
(1, 3, '1XX1407126274.jpg', 'jpg', 0, 0, 1407126274, 1),
(2, 5, '0XX1407150909.png', 'png', 2, 0, 1407150909, 0),
(3, 5, '0XX1407150912.png', 'png', 2, 0, 1407150912, 0);

-- --------------------------------------------------------

--
-- Table structure for table `btr_bids`
--

CREATE TABLE IF NOT EXISTS `btr_bids` (
  `bidId` int(11) NOT NULL AUTO_INCREMENT,
  `bidfrom` int(11) DEFAULT NULL,
  `bidon` double DEFAULT NULL,
  `projectId` int(11) DEFAULT NULL,
  `bidcontent` text,
  `isselected` enum('0','1') DEFAULT '0',
  `haveattachment` enum('0','1') DEFAULT '0',
  `bidprice` double DEFAULT NULL,
  `updatedon` double DEFAULT NULL,
  PRIMARY KEY (`bidId`),
  KEY `bidfrom` (`bidfrom`,`projectId`),
  KEY `projectId` (`projectId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=32 ;

--
-- Dumping data for table `btr_bids`
--

INSERT INTO `btr_bids` (`bidId`, `bidfrom`, `bidon`, `projectId`, `bidcontent`, `isselected`, `haveattachment`, `bidprice`, `updatedon`) VALUES
(1, 2, 1407126028, 2, 'test prpposal', '0', '0', 90, NULL),
(2, 3, 1407126108, 3, 'This is a test proposal which we are trying to count the time it is taking', '0', '0', 10, NULL),
(3, 5, 1407158085, 2, 'this is a test proposal from rohit', '0', '0', 55, NULL),
(4, 3, 1407159220, 5, 'Test 2 - This is a test bid from me.', '0', '0', 100, NULL),
(5, 2, 1407210429, 5, 'sssssss', '0', '0', 500, NULL),
(6, 2, 1407324132, 8, 'I can do it', '0', '0', 300, NULL),
(7, 5, 1407324279, 8, 'Test Bid For Amol', '0', '0', 150, NULL),
(8, 7, 1407324650, 8, 'Plz Plz Give me this Gig.', '0', '0', 168, NULL),
(9, 3, 1407325196, 10, 'Hello Shital,\r\n\r\nI would like to work on your project and complete it as soon as possible.', '0', '0', 100, NULL),
(10, 3, 1407383012, 13, 'I am interested in working on this project.', '0', '0', 900, NULL),
(11, 2, 1407383141, 13, 'Hello\r\n\r\nI am a professional protographer. \r\nPlease visit my website...\r\n\r\nRegards,\r\nShital', '0', '0', 50, NULL),
(12, 2, 1407473009, 12, 'ssss', '0', '0', 111, 1407473841),
(13, 8, 1407741748, 12, 'My proposal $5/hr', '0', '0', 500, NULL),
(14, 4, 1408683509, 17, 'yes, i can do work for you.', '0', '0', 10, NULL),
(15, 2, 1409051714, 11, 'testing end date', '0', '0', 100, NULL),
(16, 4, 1409217081, 5, 'assign this gig to me.', '0', '0', 200, NULL),
(17, 5, 1409217251, 20, 'sadfasdf', '0', '0', 10, NULL),
(18, 5, 1409217265, 19, 'fasdfas', '0', '0', 12, NULL),
(19, 2, 1409218795, 24, 'Hello,\r\n\r\nPlease send me all details.\r\n\r\nRegards', '0', '0', 50, NULL),
(20, 2, 1409227602, 4, 'test', '0', '0', 100, NULL),
(21, 5, 1409468565, 25, 'Lorel Ipsum Dummy Text From Rohit', '0', '0', 200, NULL),
(22, 2, 1409551271, 26, 'hi', '0', '0', 100, NULL),
(23, 5, 1409551317, 26, 'This is test bid from rohit', '0', '0', 100, NULL),
(24, 3, 1409747247, 27, 'Hi Saurabh,\r\n\r\nI would like to work on your project and complet the entire painting in 3 days', '0', '0', 100, NULL),
(25, 4, 1409751229, 28, 'i can do this work', '0', '0', 1000, NULL),
(26, 2, 1410244723, 32, 'hello,\r\n\r\nI have team of 2 people and they can do it for you...', '0', '0', 20, NULL),
(27, 14, 1410346959, 33, '', '0', '0', 80, NULL),
(28, 5, 1410408796, 36, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\\''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '0', '0', 12, NULL),
(29, 5, 1410408815, 34, 'fasdfasdfa', '0', '0', 12, NULL),
(30, 2, 1410409644, 34, 'tetsing', '0', '0', 100, NULL),
(31, 3, 1410749004, 44, 'This is a new proposal', '0', '0', 10, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `btr_countries`
--

CREATE TABLE IF NOT EXISTS `btr_countries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `countryname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `countrycode` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=234 ;

--
-- Dumping data for table `btr_countries`
--

INSERT INTO `btr_countries` (`id`, `countryname`, `countrycode`) VALUES
(1, 'AFGHANISTAN', 'AF'),
(2, 'ALAND ISLANDS', 'AX'),
(3, 'ALBANIA', 'AL'),
(4, 'ALGERIA', 'DZ'),
(5, 'AMERICAN SAMOA', 'AS'),
(6, 'ANDORRA', 'AD'),
(7, 'ANGOLA', 'AO'),
(8, 'ANGUILLA', 'AI'),
(9, 'ANTARCTICA', 'AQ'),
(10, 'ANTIGUA AND BARBUDA', 'AG'),
(11, 'ARGENTINA', 'AR'),
(12, 'ARMENIA', 'AM'),
(13, 'ARUBA', 'AW'),
(14, 'AUSTRALIA', 'AU'),
(15, 'AUSTRIA', 'AT'),
(16, 'AZERBAIJAN', 'AZ'),
(17, 'BAHAMAS', 'BS'),
(18, 'BAHRAIN', 'BH'),
(19, 'BANGLADESH', 'BD'),
(20, 'BARBADOS', 'BB'),
(21, 'BELARUS', 'BY'),
(22, 'BELGIUM', 'BE'),
(23, 'BELIZE', 'BZ'),
(24, 'BENIN', 'BJ'),
(25, 'BERMUDA', 'BM'),
(26, 'BHUTAN', 'BT'),
(27, 'BOLIVIA, PLURINATIONAL STATE OF', 'BO'),
(28, 'BOSNIA AND HERZEGOVINA', 'BA'),
(29, 'BOTSWANA', 'BW'),
(30, 'BOUVET ISLAND', 'BV'),
(31, 'BRAZIL', 'BR'),
(32, 'BRITISH INDIAN OCEAN TERRITORY', 'IO'),
(33, 'BRUNEI DARUSSALAM', 'BN'),
(34, 'BULGARIA', 'BG'),
(35, 'BURKINA FASO', 'BF'),
(36, 'BURUNDI', 'BI'),
(37, 'CAMBODIA', 'KH'),
(38, 'CAMEROON', 'CM'),
(39, 'CANADA', 'CA'),
(40, 'CAPE VERDE', 'CV'),
(41, 'CAYMAN ISLANDS', 'KY'),
(42, 'CENTRAL AFRICAN REPUBLIC', 'CF'),
(43, 'CHAD', 'TD'),
(44, 'CHILE', 'CL'),
(45, 'CHINA', 'CN'),
(46, 'COCOS (KEELING) ISLANDS', 'CC'),
(47, 'COLOMBIA', 'CO'),
(48, 'COMOROS', 'KM'),
(49, 'CONGO', 'CG'),
(50, 'CONGO, THE DEMOCRATIC REPUBLIC OF THE', 'CD'),
(51, 'COOK ISLANDS', 'CK'),
(52, 'COSTA RICA', 'CR'),
(53, 'CROATIA', 'HR'),
(54, 'CURACAO', 'CW'),
(55, 'CYPRUS', 'CY'),
(56, 'CZECH REPUBLIC', 'CZ'),
(57, 'DENMARK', 'DK'),
(58, 'DJIBOUTI', 'DJ'),
(59, 'DOMINICA', 'DM'),
(60, 'DOMINICAN REPUBLIC', 'DO'),
(61, 'ECUADOR', 'EC'),
(62, 'EGYPT', 'EG'),
(63, 'EL SALVADOR', 'SV'),
(64, 'EQUATORIAL GUINEA', 'GQ'),
(65, 'ERITREA', 'ER'),
(66, 'ESTONIA', 'EE'),
(67, 'ETHIOPIA', 'ET'),
(68, 'FALKLAND ISLANDS (MALVINAS)', 'FK'),
(69, 'FAROE ISLANDS', 'FO'),
(70, 'FIJI', 'FJ'),
(71, 'FINLAND', 'FI'),
(72, 'FRANCE', 'FR'),
(73, 'FRENCH GUIANA', 'GF'),
(74, 'FRENCH POLYNESIA', 'PF'),
(75, 'GABON', 'GA'),
(76, 'GAMBIA', 'GM'),
(77, 'GEORGIA', 'GE'),
(78, 'GERMANY', 'DE'),
(79, 'GHANA', 'GH'),
(80, 'GIBRALTAR', 'GI'),
(81, 'GREECE', 'GR'),
(82, 'GREENLAND', 'GL'),
(83, 'GRENADA', 'GD'),
(84, 'GUADELOUPE', 'GP'),
(85, 'GUAM', 'GU'),
(86, 'GUATEMALA', 'GT'),
(87, 'GUERNSEY', 'GG'),
(88, 'GUINEA', 'GN'),
(89, 'GUINEA-BISSAU', 'GW'),
(90, 'GUYANA', 'GY'),
(91, 'HAITI', 'HT'),
(92, 'HOLY SEE (VATICAN CITY STATE)', 'VA'),
(93, 'HONDURAS', 'HN'),
(94, 'HONG KONG', 'HK'),
(95, 'HUNGARY', 'HU'),
(96, 'ICELAND', 'IS'),
(97, 'INDIA', 'IN'),
(98, 'INDONESIA', 'ID'),
(99, 'IRAN, ISLAMIC REPUBLIC OF', 'IR'),
(100, 'IRAQ', 'IQ'),
(101, 'IRELAND', 'IE'),
(102, 'ISLE OF MAN', 'IM'),
(103, 'ISRAEL', 'IL'),
(104, 'ITALY', 'IT'),
(105, 'JAMAICA', 'JM'),
(106, 'JAPAN', 'JP'),
(107, 'JERSEY', 'JE'),
(108, 'JORDAN', 'JO'),
(109, 'KAZAKHSTAN', 'KZ'),
(110, 'KENYA', 'KE'),
(111, 'KIRIBATI', 'KI'),
(112, 'KOREA, REPUBLIC OF', 'KR'),
(113, 'KUWAIT', 'KW'),
(114, 'KYRGYZSTAN', 'KG'),
(115, 'LATVIA', 'LV'),
(116, 'LEBANON', 'LB'),
(117, 'LESOTHO', 'LS'),
(118, 'LIBERIA', 'LR'),
(119, 'LIBYA', 'LY'),
(120, 'LIECHTENSTEIN', 'LI'),
(121, 'LITHUANIA', 'LT'),
(122, 'LUXEMBOURG', 'LU'),
(123, 'MACAO', 'MO'),
(124, 'MACEDONIA, THE FORMER YUGOSLAV REPUBLIC OF', 'MK'),
(125, 'MADAGASCAR', 'MG'),
(126, 'MALAWI', 'MW'),
(127, 'MALAYSIA', 'MY'),
(128, 'MALDIVES', 'MV'),
(129, 'MALI', 'ML'),
(130, 'MALTA', 'MT'),
(131, 'MARSHALL ISLANDS', 'MH'),
(132, 'MARTINIQUE', 'MQ'),
(133, 'MAURITANIA', 'MR'),
(134, 'MAURITIUS', 'MU'),
(135, 'MAYOTTE', 'YT'),
(136, 'MEXICO', 'MX'),
(137, 'MICRONESIA, FEDERATED STATES OF', 'FM'),
(138, 'MOLDOVA, REPUBLIC OF', 'MD'),
(139, 'MONACO', 'MC'),
(140, 'MONGOLIA', 'MN'),
(141, 'MONTENEGRO', 'ME'),
(142, 'MOROCCO', 'MA'),
(143, 'MOZAMBIQUE', 'MZ'),
(144, 'MYANMAR', 'MM'),
(145, 'NAMIBIA', 'NA'),
(146, 'NAURU', 'NR'),
(147, 'NEPAL', 'NP'),
(148, 'NETHERLANDS', 'NL'),
(149, 'NEW CALEDONIA', 'NC'),
(150, 'NEW ZEALAND', 'NZ'),
(151, 'NICARAGUA', 'NI'),
(152, 'NIGER', 'NE'),
(153, 'NIGERIA', 'NG'),
(154, 'NIUE', 'NU'),
(155, 'NORTHERN MARIANA ISLANDS', 'MP'),
(156, 'NORWAY', 'NO'),
(157, 'OMAN', 'OM'),
(158, 'PAKISTAN', 'PK'),
(159, 'PALAU', 'PW'),
(160, 'PALESTINIAN, STATE OF', 'PS'),
(161, 'PANAMA', 'PA'),
(162, 'PAPUA NEW GUINEA', 'PG'),
(163, 'PARAGUAY', 'PY'),
(164, 'PERU', 'PE'),
(165, 'PHILIPPINES', 'PH'),
(166, 'POLAND', 'PL'),
(167, 'PORTUGAL', 'PT'),
(168, 'PUERTO RICO', 'PR'),
(169, 'QATAR', 'QA'),
(170, 'REUNION', 'RE'),
(171, 'ROMANIA', 'RO'),
(172, 'RUSSIAN FEDERATION', 'RU'),
(173, 'RWANDA', 'RW'),
(174, 'SAINT KITTS AND NEVIS', 'KN'),
(175, 'SAINT LUCIA', 'LC'),
(176, 'SAINT MARTIN (FRENCH PART)', 'MF'),
(177, 'SAINT PIERRE AND MIQUELON', 'PM'),
(178, 'SAINT VINCENT AND THE GRENADINES', 'VC'),
(179, 'SAMOA', 'WS'),
(180, 'SAN MARINO', 'SM'),
(181, 'SAUDI ARABIA', 'SA'),
(182, 'SENEGAL', 'SN'),
(183, 'SERBIA', 'RS'),
(184, 'SEYCHELLES', 'SC'),
(185, 'SIERRA LEONE', 'SL'),
(186, 'SINGAPORE', 'SG'),
(187, 'SINT MAARTEN (DUTCH PART)', 'SX'),
(188, 'SLOVAKIA', 'SK'),
(189, 'SLOVENIA', 'SI'),
(190, 'SOLOMON ISLANDS', 'SB'),
(191, 'SOMALIA', 'SO'),
(192, 'SOUTH AFRICA', 'ZA'),
(193, 'SOUTH GEORGIA AND THE SOUTH SANDWICH ISLANDS', 'GS'),
(194, 'SOUTH SUDAN', 'SS'),
(195, 'SPAIN', 'ES'),
(196, 'SRI LANKA', 'LK'),
(197, 'SUDAN', 'SD'),
(198, 'SURINAME', 'SR'),
(199, 'SVALBARD AND JAN MAYEN', 'SJ'),
(200, 'SWAZILAND', 'SZ'),
(201, 'SWEDEN', 'SE'),
(202, 'SWITZERLAND', 'CH'),
(203, 'SYRIAN ARAB REPUBLIC', 'SY'),
(204, 'TAIWAN, PROVINCE OF CHINA', 'TW'),
(205, 'TAJIKISTAN', 'TJ'),
(206, 'TANZANIA, UNITED REPUBLIC OF', 'TZ'),
(207, 'THAILAND', 'TH'),
(208, 'TIMOR-LESTE', 'TL'),
(209, 'TOGO', 'TG'),
(210, 'TOKELAU', 'TK'),
(211, 'TONGA', 'TO'),
(212, 'TRINIDAD AND TOBAGO', 'TT'),
(213, 'TUNISIA', 'TN'),
(214, 'TURKEY', 'TR'),
(215, 'TURKMENISTAN', 'TM'),
(216, 'TURKS AND CAICOS ISLANDS', 'TC'),
(217, 'UGANDA', 'UG'),
(218, 'UKRAINE', 'UA'),
(219, 'UNITED ARAB EMIRATES', 'AE'),
(220, 'UNITED KINGDOM', 'GB'),
(221, 'UNITED STATES', 'US'),
(222, 'URUGUAY', 'UY'),
(223, 'UZBEKISTAN', 'UZ'),
(224, 'VANUATU', 'VU'),
(225, 'VENEZUELA, BOLIVARIAN REPUBLIC OF', 'VE'),
(226, 'VIET NAM', 'VN'),
(227, 'VIRGIN ISLANDS, BRITISH', 'VG'),
(228, 'VIRGIN ISLANDS, U.S.', 'VI'),
(229, 'WALLIS AND FUTUNA', 'WF'),
(230, 'WESTERN SAHARA', 'EH'),
(231, 'YEMEN', 'YE'),
(232, 'ZAMBIA', 'ZM'),
(233, 'ZIMBABWE', 'ZW');

-- --------------------------------------------------------

--
-- Table structure for table `btr_invites`
--

CREATE TABLE IF NOT EXISTS `btr_invites` (
  `inviteid` int(11) NOT NULL AUTO_INCREMENT,
  `invitefrom` int(11) DEFAULT NULL,
  `inviteto` int(11) DEFAULT NULL,
  `inviteon` date DEFAULT NULL,
  `projectId` int(11) DEFAULT NULL,
  PRIMARY KEY (`inviteid`),
  KEY `invitefrom` (`invitefrom`,`inviteto`),
  KEY `inviteto` (`inviteto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `btr_messages`
--

CREATE TABLE IF NOT EXISTS `btr_messages` (
  `msgId` int(11) NOT NULL AUTO_INCREMENT,
  `msgfrom` int(11) DEFAULT NULL,
  `msgto` int(11) DEFAULT NULL,
  `msgcontent` text,
  `haveattachment` enum('0','1') DEFAULT '0',
  `msgon` double DEFAULT NULL,
  `projectId` int(11) DEFAULT NULL,
  `isread` enum('0','1') DEFAULT '0',
  PRIMARY KEY (`msgId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=45 ;

--
-- Dumping data for table `btr_messages`
--

INSERT INTO `btr_messages` (`msgId`, `msgfrom`, `msgto`, `msgcontent`, `haveattachment`, `msgon`, `projectId`, `isread`) VALUES
(1, 3, 2, 'This is a new message', '1', 1407126274, 2, '1'),
(2, 3, 2, 'This is my message.', '0', 1407163688, 2, '1'),
(3, 3, 5, 'This is new', '0', 1407163708, 2, '0'),
(4, 3, 5, 'Hello Rohit,\r\n\r\nThis is my first message.', '0', 1407324541, 8, '1'),
(5, 3, 2, 'Shital,\r\n\r\nThis is my first message - shital/amol \r\n\r\nPlease do let me know if you can see it.\r\n\r\nThanks', '0', 1407324569, 8, '1'),
(6, 3, 7, 'Hello,\r\n\r\nThis is a bid for ashish.', '0', 1407324760, 8, '1'),
(7, 2, 3, 'yes I can...', '0', 1407324856, 8, '1'),
(8, 3, 2, 'Okay good', '0', 1407324882, 8, '1'),
(9, 5, 3, 'reply from rohit', '0', 1407324910, 8, '1'),
(10, 7, 3, 'Hi', '0', 1407324942, 8, '1'),
(11, 3, 2, 'hi', '0', 1407326090, 10, '1'),
(12, 3, 2, 'hi', '0', 1407326090, 10, '1'),
(13, 3, 2, 'SOrry, I am unable to accept it. \r\n\r\nPlease revise the bid to $29', '0', 1407377354, 3, '1'),
(14, 3, 5, 'This is a new project.', '0', 1407377388, 8, '1'),
(15, 8, 3, 'Thanks for your bid. Too expensive!', '0', 1407383179, 13, '1'),
(16, 8, 2, 'Thanks for your bid... very good... when can you start?', '0', 1407383362, 13, '1'),
(17, 3, 8, 'This is my reply.', '0', 1407383459, 13, '1'),
(18, 2, 8, 'Hello James,\r\n\r\nThis weekend I am free so we can start', '0', 1407383534, 13, '1'),
(19, 3, 8, 'I don\\''t want to accept.', '0', 1407383839, 13, '1'),
(20, 8, 3, '123', '0', 1407383997, 13, '1'),
(21, 3, 8, 'This is a test', '0', 1409211144, 13, '0'),
(22, 4, 2, 'hello', '0', 1409228940, 24, '1'),
(23, 4, 2, '', '0', 1409228948, 24, '1'),
(24, 4, 2, 'hellllo', '0', 1409230019, 24, '1'),
(25, 4, 2, 'r u getting my messages', '0', 1409230046, 24, '1'),
(26, 2, 4, 'testing', '0', 1409230047, 24, '1'),
(27, 2, 4, 'can you see now', '0', 1409230075, 24, '1'),
(28, 2, 4, 'Hello Aman', '0', 1409230092, 24, '1'),
(29, 2, 4, 'hello', '0', 1409233752, 24, '1'),
(30, 3, 5, 'Can you test this app.', '0', 1409468679, 25, '1'),
(31, 3, 5, 'Can you test this app.', '0', 1409468684, 25, '1'),
(32, 3, 5, 'Can you test this app.', '0', 1409468692, 25, '1'),
(33, 3, 5, 'Can you test this app.', '0', 1409468698, 25, '1'),
(34, 3, 5, 'Can you test this app.', '0', 1409468701, 25, '1'),
(35, 3, 5, 'Can you test this app.', '0', 1409468703, 25, '1'),
(36, 3, 5, 'Can you test this app.', '0', 1409468707, 25, '1'),
(37, 3, 5, 'Can you test this app.', '0', 1409468709, 25, '1'),
(38, 5, 3, 'This is test reply from rohit', '0', 1409468805, 25, '1'),
(39, 3, 5, 'This is second test', '0', 1409469042, 25, '0'),
(40, 3, 5, 'This is third test', '0', 1409500484, 25, '0'),
(41, 3, 2, 'This is a message to Shital', '0', 1409551303, 26, '1'),
(42, 12, 3, 'can you work on sunday', '0', 1409747320, 27, '1'),
(43, 3, 12, 'This is my response. I will be able to start only on Monday.', '0', 1409747398, 27, '1'),
(44, 2, 13, 'done..', '0', 1410407678, 32, '0');

-- --------------------------------------------------------

--
-- Table structure for table `btr_projects`
--

CREATE TABLE IF NOT EXISTS `btr_projects` (
  `prjId` int(11) NOT NULL AUTO_INCREMENT,
  `userId` int(11) DEFAULT NULL,
  `prjTitle` varchar(255) DEFAULT NULL,
  `prjdesc` text,
  `skills` varchar(255) DEFAULT NULL,
  `postedon` double DEFAULT NULL,
  `proposedbudget` float DEFAULT NULL,
  `haveattachment` enum('0','1') DEFAULT '0',
  `bidfrom` date DEFAULT NULL,
  `bidto` date DEFAULT NULL,
  `status` enum('0','1','2','3','4','5','6') NOT NULL DEFAULT '0',
  `keywords` text NOT NULL,
  `jobtype` enum('h','f') NOT NULL DEFAULT 'f',
  PRIMARY KEY (`prjId`),
  KEY `userId` (`userId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=45 ;

--
-- Dumping data for table `btr_projects`
--

INSERT INTO `btr_projects` (`prjId`, `userId`, `prjTitle`, `prjdesc`, `skills`, `postedon`, `proposedbudget`, `haveattachment`, `bidfrom`, `bidto`, `status`, `keywords`, `jobtype`) VALUES
(1, 2, 'test', 'test', NULL, 1406777815, 10, '0', '2014-07-31', '2014-08-02', '0', '', 'f'),
(2, 3, 'Test', 'test', NULL, 1407125872, 100, '0', '2014-08-04', '2014-08-12', '0', '', 'f'),
(3, 2, 'test gig', 'test gig', NULL, 1407125875, 200, '0', '2014-08-04', '2014-08-04', '2', '', 'f'),
(4, 3, 'test3', 'test 4', NULL, 1407158783, 100, '0', '2014-08-04', '2014-08-22', '0', '', 'f'),
(5, 5, 'Test Gig For Amol', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\\''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', NULL, 1407159035, 250, '0', '2014-08-04', '2014-08-14', '0', '', 'f'),
(6, 2, 'test gig', 'testing testing', NULL, 1407210702, 100, '0', '2014-08-04', '2014-07-29', '0', '', 'f'),
(7, 2, 'test end date gig', 'testing', NULL, 1407211935, 100, '0', '2014-08-05', '2014-08-05', '0', '', 'f'),
(8, 3, 'Create a 3d file', 'I need a 3d file created.', NULL, 1407324060, 200, '0', '2014-08-06', '2014-08-21', '0', '', 'f'),
(9, 2, 'upload images', 'need to upload images on website on daily basis', NULL, 1407324204, 10, '0', '2014-08-06', '2014-08-16', '0', '', 'f'),
(10, 2, 'copy doc to pdf', 'testing', NULL, 1407324986, 10, '0', '2014-08-06', '2014-08-06', '0', '', 'f'),
(11, 3, 'New Project - For Rohit', 'Hello,\r\n\r\nWe are looking for a wordpress solution. The ideal candidate needs ot have all the knowledge about wordpress.', NULL, 1407325262, 2000, '0', '2014-08-06', '2014-08-27', '0', '', 'f'),
(12, 3, 'Test', 'This is a test', NULL, 1407382465, 1000, '0', '2014-08-06', '2014-08-08', '0', '', 'f'),
(13, 8, 'Need a cat photographer', 'Need a cat photographer for this weekend', NULL, 1407382763, 50, '0', '2014-08-06', '2014-08-06', '0', '', 'f'),
(14, 8, 'New Gig - please respond', '', NULL, 1407741343, 200, '0', '2014-08-11', '2014-08-11', '0', '', 'f'),
(15, 8, 'Another Gig', '', NULL, 1407741416, 500, '0', '2014-08-11', '2014-08-18', '0', '', 'f'),
(16, 8, 'Need a tennis coach', 'tennis coach, once a week', NULL, 1408639833, 40, '0', '2014-08-21', '2014-08-23', '0', '', 'f'),
(17, 2, 'web designer', 'exprienced web designer is required...', NULL, 1408677908, 10, '0', '2014-08-21', '2014-08-21', '0', '', 'f'),
(18, 2, 'test gig', 'test gig', NULL, 1408678084, 1111110, '0', '2014-08-21', '2014-08-21', '0', '', 'f'),
(19, 4, 'repairing', 'reparing of car', NULL, 1408708306, 200, '0', '2014-08-22', '2014-08-26', '0', '', 'f'),
(20, 4, 'laptop repairing', 'reparing', NULL, 1409034030, 12, '0', '2014-08-26', '2014-08-31', '2', '', 'f'),
(21, 2, 'repair the window', 'need to repair wooden window', NULL, 1409052885, 1, '0', '2014-08-26', '2014-08-26', '0', '', 'f'),
(22, 2, 'repair the window', 'repair the window', NULL, 1409052920, 5, '0', '2014-08-26', '2014-08-28', '0', '', 'f'),
(23, 2, 'trainer', 'Need a php trainer', NULL, 1409217819, 20, '0', '2014-08-28', '2014-08-30', '0', '', 'f'),
(24, 4, 'Requirement of cook', 'Requirement of cook', NULL, 1409218001, 50, '0', '2014-08-28', '2014-09-30', '0', '', 'f'),
(25, 3, 'Testing Bettr App', 'This is a new demo for gigster. \r\n\r\nWe have made a lot of modifications to the gigster page', NULL, 1409468185, 100, '0', '2014-08-31', '2014-08-31', '2', 'spring,sosisis,susus', 'f'),
(26, 3, 'Test - amol 2', 'This sis s', NULL, 1409469800, 100, '0', '2014-08-31', '2014-10-07', '3', 'sql', 'f'),
(27, 12, 'i need painter', 'i wain painter for my house painting', NULL, 1409747186, 5000, '0', '2014-09-03', '2014-09-12', '1', '', 'h'),
(28, 3, 'Testing Aman Work', 'Hello Aman, \r\n\r\nPlease do bid on this project', NULL, 1409750987, 1000, '0', '2014-09-03', '2014-09-03', '0', 'php', 'f'),
(29, 8, 'Can someone help me with plumbing?', 'need an expert plumber', NULL, 1409890304, 30, '0', '2014-09-05', '2014-09-05', '0', 'plumber,plumbing', 'f'),
(30, 2, 'test gig', 'test gig', NULL, 1409901465, 100, '0', '2014-09-05', '2014-09-06', '0', 'php,cake php', 'f'),
(31, 12, 'test gig', 'test git', NULL, 1409917328, 20, '0', '2014-09-05', '2014-09-05', '0', 'plumber', 'f'),
(32, 13, 'I need a plumber', 'I  need a plumber working on sunday', NULL, 1410242042, 4, '0', '2014-09-09', '2014-09-18', '2', '', 'f'),
(33, 13, 'Need carpenter', 'Need carpenter on sunday...', NULL, 1410244816, 10, '0', '2014-09-09', '2014-09-16', '0', '', 'h'),
(34, 14, 'need a painter', 'I am looking for a painter who can paint my home', NULL, 1410347397, 100, '0', '2014-09-10', '2014-09-11', '0', 'painting', 'f'),
(35, 5, 'Lorel ipsum test', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\\''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', NULL, 1410407818, 250, '0', '2014-09-10', '2014-09-10', '0', 'php', 'f'),
(36, 2, 'photos of jaipure', 'I need some good photoes of forts in jaipure.  S$5 will be given per photo.', NULL, 1410408020, 10, '0', '2014-09-11', '2014-09-11', '3', 'photo', 'h'),
(37, 15, 'Adding Gigs is still opening up on a different page', 'Adding Gigs is still opening up on a different page', NULL, 1410409092, 100000000, '0', '2014-09-11', '2014-09-11', '0', '', 'f'),
(38, 15, 'Find a Gig should be on a different page', 'Find a Gig should be on a different page', NULL, 1410409270, 8888890, '0', '2014-09-11', '2014-09-11', '0', 'gig', 'f'),
(39, 3, 'This is a test', 'This is a test', NULL, 1410416145, 100, '0', '2014-09-11', '2014-09-11', '0', 'JAVA', 'f'),
(40, 2, 'sample', 'tetsing', NULL, 1410431523, 100, '0', '2014-09-11', '2014-09-11', '0', 'painting,photo', 'f'),
(41, 3, 'Need a php developer to work on my facebook app', 'We need to complete a facebook app. I need to complete it within time', NULL, 1410443038, 1000, '0', '2014-09-11', '2014-09-11', '0', 'php', 'f'),
(42, 15, 'Hire Gigster', 'Hire Gigster', NULL, 1410489629, 12345, '0', '2014-09-11', '2014-09-11', '0', '', 'f'),
(43, 3, 'Test', 'Test - testing', NULL, 1410489651, 100, '0', '2014-09-11', '2014-09-11', '0', 'php,james', 'f'),
(44, 5, 'fasdfasdf', 'fasdfasdf', NULL, 1410513593, 12312, '0', '2014-09-12', '2014-09-30', '0', 'fasdf', 'f');

-- --------------------------------------------------------

--
-- Table structure for table `btr_reviews`
--

CREATE TABLE IF NOT EXISTS `btr_reviews` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ratefrom` int(11) DEFAULT NULL,
  `rateto` int(11) DEFAULT NULL,
  `projectId` int(11) DEFAULT NULL,
  `feedback` text,
  `rating` enum('0','1','2','3','4','5') DEFAULT '0',
  `ratedon` double DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `btr_reviews`
--

INSERT INTO `btr_reviews` (`id`, `ratefrom`, `rateto`, `projectId`, `feedback`, `rating`, `ratedon`) VALUES
(1, 3, 5, 26, 'good work', '3', 1409551606),
(2, 2, 5, 36, 'very good', '5', 1410415268);

-- --------------------------------------------------------

--
-- Table structure for table `btr_revisions`
--

CREATE TABLE IF NOT EXISTS `btr_revisions` (
  `rvId` int(11) NOT NULL AUTO_INCREMENT,
  `projectId` int(11) DEFAULT NULL,
  `description` text,
  `revisedon` double DEFAULT NULL,
  PRIMARY KEY (`rvId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `btr_skills`
--

CREATE TABLE IF NOT EXISTS `btr_skills` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `skill` varchar(50) DEFAULT NULL,
  `addedon` double DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `btr_tags`
--

CREATE TABLE IF NOT EXISTS `btr_tags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tag` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `btr_tags`
--

INSERT INTO `btr_tags` (`id`, `tag`) VALUES
(1, 'php'),
(2, 'JS'),
(3, 'JAVA'),
(4, 'jquery'),
(5, 'cake php'),
(6, 'plumber'),
(7, 'plumbing'),
(8, ''),
(9, 'linux'),
(10, 'painting'),
(11, 'photo'),
(12, 'gig'),
(13, 'james'),
(14, 'fasdf');

-- --------------------------------------------------------

--
-- Table structure for table `btr_userprofile`
--

CREATE TABLE IF NOT EXISTS `btr_userprofile` (
  `prfId` int(11) NOT NULL AUTO_INCREMENT,
  `userId` int(11) DEFAULT NULL,
  `fname` varchar(255) DEFAULT NULL,
  `lname` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `zipcode` varchar(20) DEFAULT NULL,
  `country` int(11) DEFAULT NULL,
  `aboutus` text,
  `skills` text,
  `gender` enum('m','f') DEFAULT 'm',
  `contactno` varchar(25) DEFAULT NULL,
  `overview` text,
  `tagline` varchar(255) DEFAULT NULL,
  `services` text,
  PRIMARY KEY (`prfId`),
  KEY `userId` (`userId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `btr_userprofile`
--

INSERT INTO `btr_userprofile` (`prfId`, `userId`, `fname`, `lname`, `address`, `city`, `zipcode`, `country`, `aboutus`, `skills`, `gender`, `contactno`, `overview`, `tagline`, `services`) VALUES
(2, 2, 'Shital', 'Pisolkar', NULL, NULL, NULL, 18, NULL, NULL, 'f', NULL, 'Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary ', 'Lorel ipsum Lorel ipsum Lorel ipsum Lorel ipsum Lorel ipsum', NULL),
(3, 3, 'Amol', 'Chawathe', '100 Cecil Street', 'Singapore', '069532', 1, NULL, 'php,JAVA', 'm', NULL, 'Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan\\\\\\''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan\\\\\\''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan\\\\\\''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan\\\\\\''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan\\\\\\''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan\\\\\\''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan\\\\\\''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan\\\\\\''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan\\\\\\''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan\\\\\\''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan\\\\\\''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan\\\\\\''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan\\\\\\''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan\\\\\\''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan\\\\\\''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan\\\\\\''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan\\\\\\''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan\\\\\\''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan\\\\\\''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan\\\\\\''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan\\\\\\''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan\\\\\\''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan\\\\\\''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan\\\\\\''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan\\\\\\''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan\\\\\\''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan\\\\\\''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan\\\\\\''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan\\\\\\''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan\\\\\\''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan\\\\\\''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan\\\\\\''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan\\\\\\''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan\\\\\\''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan\\\\\\''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan\\\\\\''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan\\\\\\''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan\\\\\\''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan\\\\\\''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan\\\\\\''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan\\\\\\''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan\\\\\\''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan\\\\\\''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan\\\\\\''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan\\\\\\''s mother, legendary', 'Solid Programmer 14 years of experience', ''),
(4, 4, 'Aman', 'Bishnoi', 'Jaipur', 'Jaipur', '302021', 1, NULL, 'php,JS,JAVA,jquery,cake php', 'm', NULL, 'Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary ', 'Lorel ipsum Lorel ipsum Lorel ipsum Lorel ipsum Lorel ipsum', NULL),
(5, 5, 'Rohit', 'Hit', 'Rani Bazar', 'Bikaner', '334001', 1, NULL, NULL, 'm', NULL, 'Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan\\''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan\\''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan\\''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan\\''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan\\''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan\\''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan\\''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan\\''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan\\''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan\\''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan\\''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan\\''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan\\''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan\\''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan\\''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan\\''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan\\''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan\\''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan\\''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan\\''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan\\''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan\\''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan\\''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan\\''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan\\''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan\\''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan\\''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan\\''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan\\''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan\\''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan\\''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan\\''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan\\''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan\\''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan\\''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan\\''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan\\''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan\\''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan\\''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan\\''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan\\''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan\\''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan\\''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan\\''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan\\''s mother, legendary', 'Lorel ipsum Lorel ipsum Lorel ipsum Lorel ipsum Lorel ipsum', NULL),
(6, 6, 'Bijayalaxmi', 'Purohit', 'Rani Bazar', 'Bikaner', '334001', 1, NULL, NULL, 'f', NULL, 'Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\''s mother, legendary', 'Lorel ipsum Lorel ipsum Lorel ipsum Lorel ipsum Lorel ipsum', NULL),
(7, 7, 'Aashish', 'Singhal', NULL, NULL, NULL, 15, NULL, NULL, 'm', NULL, 'Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary ', 'Lorel ipsum Lorel ipsum Lorel ipsum Lorel ipsum Lorel ipsum', NULL);
INSERT INTO `btr_userprofile` (`prfId`, `userId`, `fname`, `lname`, `address`, `city`, `zipcode`, `country`, `aboutus`, `skills`, `gender`, `contactno`, `overview`, `tagline`, `services`) VALUES
(8, 8, 'James', 'Kow', NULL, NULL, NULL, 25, NULL, NULL, 'm', NULL, 'Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary ', 'Lorel ipsum Lorel ipsum Lorel ipsum Lorel ipsum Lorel ipsum', NULL),
(9, 12, 'Saurabh', 'Undre', NULL, NULL, NULL, 47, NULL, NULL, 'm', NULL, 'Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary Gscorted by her 5-year-old son son, Bronx, the singer walked down the aisle at a Greenwich, Connecticut, estate belonging to Evan''s mother, legendary ', 'Lorel ipsum Lorel ipsum Lorel ipsum Lorel ipsum Lorel ipsum', NULL),
(10, 13, 'Gokul', 'Gapat', NULL, NULL, NULL, NULL, NULL, NULL, 'm', NULL, NULL, NULL, NULL),
(11, 14, 'Shital', 'Pisolkar', 'Nasik', 'nasik', '422009', 1, NULL, 'linux,painting', 'm', NULL, 'testing', 'no tag line', 'testing'),
(12, 15, 'James', 'ParasolWonder', NULL, NULL, NULL, NULL, NULL, NULL, 'm', NULL, NULL, NULL, NULL),
(13, 17, '', '', NULL, NULL, NULL, NULL, NULL, NULL, 'm', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `btr_users`
--

CREATE TABLE IF NOT EXISTS `btr_users` (
  `userId` int(11) NOT NULL AUTO_INCREMENT,
  `usermail` varchar(255) DEFAULT NULL,
  `userpass` varchar(255) DEFAULT NULL,
  `fbId` varchar(255) DEFAULT NULL,
  `gId` varchar(255) DEFAULT NULL,
  `profileimage` varchar(255) DEFAULT NULL,
  `usertype` enum('u','a') DEFAULT 'u',
  `joinedon` double DEFAULT NULL,
  `authkey` varchar(255) DEFAULT NULL,
  `twittid` varchar(255) DEFAULT NULL,
  `linkedinid` varchar(255) DEFAULT NULL,
  `isactive` enum('0','1') DEFAULT '0',
  `username` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`userId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `btr_users`
--

INSERT INTO `btr_users` (`userId`, `usermail`, `userpass`, `fbId`, `gId`, `profileimage`, `usertype`, `joinedon`, `authkey`, `twittid`, `linkedinid`, `isactive`, `username`) VALUES
(2, 'meaahe@gmail.com', NULL, '10152589037951108', NULL, '2.jpg', 'u', 1406777785, '1102774157837fdba32b0df0811ab9ea', NULL, NULL, '1', 'meaahe'),
(3, 'amol.chawathe@fountaintechies.com', NULL, '10152657506640962', NULL, '3.jpg', 'u', 1407125601, '3447418403fc4780091e5a804471a00f', NULL, NULL, '1', 'amol.chawathe'),
(4, 'aman29forever@gmail.com', NULL, '811125678918871', NULL, '4.jpg', 'u', 1407134028, 'b969542c2f6cba75156ffed773cf5801', NULL, NULL, '1', 'aman29forever'),
(5, 'rohitbanna@gmail.com', NULL, '10204177077564201', NULL, '5.jpg', 'u', 1407146925, '3534b2282023a8d4926ef7a7cd09532c', NULL, NULL, '1', 'rohitbanna'),
(6, 'blpurohit2010@gmail.com', NULL, '747972341932432', NULL, '6.jpg', 'u', 1407152068, 'd875d51eba70514e60c5ab64c06ab787', NULL, NULL, '1', 'blpurohit2010'),
(7, 'ashish.scripter@gmail.com', NULL, '821219204554885', NULL, '7.jpg', 'u', 1407324389, '6d4a9729cf2b82952d4264f8a2cb38f9', NULL, NULL, '1', 'ashish.scripter'),
(8, 'jameskow@yahoo.com', NULL, '10152617760157065', NULL, '8.jpg', 'u', 1407382518, 'cdc1fcf2f64a1f7812b7c996746a8e6b', NULL, NULL, '1', 'jameskow'),
(12, 'saurabh841undre@gmail.com', NULL, '918538948174273', NULL, '12.jpg', 'u', 1409555777, '807830583e5c28483ed24e3741e678a3', NULL, NULL, '1', 'saurabh841undre'),
(13, 'gokul0607@gmail.com', NULL, '782727778436893', NULL, '13.jpg', 'u', 1410238550, '7734ce8650e7c59c80adfc543fec73d8', NULL, NULL, '1', 'gokul0607'),
(14, '', NULL, NULL, NULL, '14XX1410346243.jpg', 'u', 1410345891, NULL, NULL, '', '0', 'Shital'),
(15, 'james@parasolwonder.com', NULL, '1499319216983107', NULL, '15.jpg', 'u', 1410408992, '22f42e5b668a698505ff2cfe9df89dcb', NULL, NULL, '1', 'james'),
(16, NULL, NULL, NULL, NULL, NULL, 'u', 1410490419, '26164561e58f74f69015a0da2bf51278', '', NULL, '0', NULL),
(17, 'lomazee@gmail.com', NULL, '358646637641857', NULL, '17.jpg', 'u', 1412573533, 'c703688c811580f7dbd83cffa7598473', NULL, NULL, '1', 'lomazee');

-- --------------------------------------------------------

--
-- Table structure for table `btr_userskills`
--

CREATE TABLE IF NOT EXISTS `btr_userskills` (
  `skillId` int(11) NOT NULL AUTO_INCREMENT,
  `skill` varchar(255) DEFAULT NULL,
  `expertiselevel` int(11) DEFAULT '0',
  PRIMARY KEY (`skillId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `btr_attachments`
--
ALTER TABLE `btr_attachments`
  ADD CONSTRAINT `btr_attachments_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `btr_users` (`userId`) ON DELETE CASCADE;

--
-- Constraints for table `btr_bids`
--
ALTER TABLE `btr_bids`
  ADD CONSTRAINT `btr_bids_ibfk_1` FOREIGN KEY (`bidfrom`) REFERENCES `btr_users` (`userId`) ON DELETE CASCADE,
  ADD CONSTRAINT `btr_bids_ibfk_2` FOREIGN KEY (`projectId`) REFERENCES `btr_projects` (`prjId`) ON DELETE CASCADE;

--
-- Constraints for table `btr_invites`
--
ALTER TABLE `btr_invites`
  ADD CONSTRAINT `btr_invites_ibfk_1` FOREIGN KEY (`invitefrom`) REFERENCES `btr_users` (`userId`) ON DELETE CASCADE,
  ADD CONSTRAINT `btr_invites_ibfk_2` FOREIGN KEY (`inviteto`) REFERENCES `btr_users` (`userId`) ON DELETE CASCADE;

--
-- Constraints for table `btr_projects`
--
ALTER TABLE `btr_projects`
  ADD CONSTRAINT `btr_projects_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `btr_users` (`userId`) ON DELETE CASCADE;

--
-- Constraints for table `btr_userprofile`
--
ALTER TABLE `btr_userprofile`
  ADD CONSTRAINT `btr_userprofile_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `btr_users` (`userId`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
