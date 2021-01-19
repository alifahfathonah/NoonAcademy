-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 19, 2013 at 07:21 AM
-- Server version: 5.5.24-log
-- PHP Version: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `e_school`
--

-- --------------------------------------------------------

--
-- Table structure for table `company_informaiton`
--

DROP TABLE IF EXISTS `company_informaiton`;
CREATE TABLE IF NOT EXISTS `company_informaiton` (
  `CompanyID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `CompanyName` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `AddressLine1` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `AddressLine2` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `City` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Country` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Phone` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `Email` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `WebSite` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `ContactPerson` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`CompanyID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `company_informaiton`
--

INSERT INTO `company_informaiton` (`CompanyID`, `CompanyName`, `AddressLine1`, `AddressLine2`, `City`, `Country`, `Phone`, `Email`, `WebSite`, `ContactPerson`) VALUES
(1, 'CityNet', 'Office #1', 'Malaz, Near Wooden Backery', 'Riyadh', 'Suadi Arabia', '+966 545883076', 'kifayat@citynet.com.co', 'http://citynet.com.co', 'Kifayat Ullah Khan');

-- --------------------------------------------------------

--
-- Table structure for table `country_names`
--

DROP TABLE IF EXISTS `country_names`;
CREATE TABLE IF NOT EXISTS `country_names` (
  `CountryID` int(11) NOT NULL AUTO_INCREMENT,
  `CountryName` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`CountryID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=248 ;

--
-- Dumping data for table `country_names`
--

INSERT INTO `country_names` (`CountryID`, `CountryName`) VALUES
(1, 'Select your country name'),
(2, 'Afghanistan (افغانستان)'),
(3, 'Aland Islands'),
(4, 'Albania (Shqipëria)'),
(5, 'Algeria (الجزائر)'),
(6, 'American Samoa'),
(7, 'Andorra'),
(8, 'Angola'),
(9, 'Anguilla'),
(10, 'Antarctica'),
(11, 'Antigua and Barbuda'),
(12, 'Argentina'),
(13, 'Armenia (Հայաստան)'),
(14, 'Aruba'),
(15, 'Australia'),
(16, 'Austria (Österreich)'),
(17, 'Azerbaijan (Azərbaycan)'),
(18, 'Bahamas'),
(19, 'Bahrain (البحرين)'),
(20, 'Bangladesh (বাংলাদেশ)'),
(21, 'Barbados'),
(22, 'Belarus (Белару́сь)'),
(23, 'Belgium (België)'),
(24, 'Belize'),
(25, 'Benin (Bénin)'),
(26, 'Bermuda'),
(27, 'Bhutan (འབྲུག་ཡུལ)'),
(28, 'Bolivia'),
(29, 'Bosnia and Herzegovina (Bosna i Hercegovina)'),
(30, 'Botswana'),
(31, 'Bouvet Island'),
(32, 'Brazil (Brasil)'),
(33, 'British Indian Ocean Territory'),
(34, 'Brunei (Brunei Darussalam)'),
(35, 'Bulgaria (България)'),
(36, 'Burkina Faso'),
(37, 'Burundi (Uburundi)'),
(38, 'Cambodia (Kampuchea)'),
(39, 'Cameroon (Cameroun)'),
(40, 'Canada'),
(41, 'Cape Verde (Cabo Verde)'),
(42, 'Cayman Islands'),
(43, 'Central African Republic (République Centrafricaine)'),
(44, 'Chad (Tchad)'),
(45, 'Chile'),
(46, 'China (中国)'),
(47, 'Christmas Island'),
(48, 'Cocos Islands'),
(49, 'Colombia'),
(50, 'Comoros (Comores)'),
(51, 'Congo'),
(52, 'Congo, Democratic Republic of the'),
(53, 'Cook Islands'),
(54, 'Costa Rica'),
(55, 'Côte d&#39;Ivoire'),
(56, 'Croatia (Hrvatska)'),
(57, 'Cuba'),
(58, 'Cyprus (Κυπρος)'),
(59, 'Czech Republic (Česko)'),
(60, 'Denmark (Danmark)'),
(61, 'Djibouti'),
(62, 'Dominica'),
(63, 'Dominican Republic'),
(64, 'Ecuador'),
(65, 'Egypt (مصر)'),
(66, 'El Salvador'),
(67, 'Equatorial Guinea (Guinea Ecuatorial)'),
(68, 'Eritrea (Ertra)'),
(69, 'Estonia (Eesti)'),
(70, 'Ethiopia (Ityop&#39;iya)'),
(71, 'Falkland Islands'),
(72, 'Faroe Islands'),
(73, 'Fiji'),
(74, 'Finland (Suomi)'),
(75, 'France'),
(76, 'French Guiana'),
(77, 'French Polynesia'),
(78, 'French Southern Territories'),
(79, 'Gabon'),
(80, 'Gambia'),
(81, 'Georgia (საქართველო)'),
(82, 'Germany (Deutschland)'),
(83, 'Ghana'),
(84, 'Gibraltar'),
(85, 'Greece (Ελλάς)'),
(86, 'Greenland'),
(87, 'Grenada'),
(88, 'Guadeloupe'),
(89, 'Guam'),
(90, 'Guatemala'),
(91, 'Guernsey'),
(92, 'Guinea (Guinée)'),
(93, 'Guinea-Bissau (Guiné-Bissau)'),
(94, 'Guyana'),
(95, 'Haiti (Haïti)'),
(96, 'Heard Island and McDonald Islands'),
(97, 'Honduras'),
(98, 'Hong Kong'),
(99, 'Hungary (Magyarország)'),
(100, 'Iceland (Ísland)'),
(101, 'India'),
(102, 'Indonesia'),
(103, 'Iran (ایران)'),
(104, 'Iraq (العراق)'),
(105, 'Ireland'),
(106, 'Isle of Man'),
(107, 'Israel (ישראל)'),
(108, 'Italy (Italia)'),
(109, 'Jamaica'),
(110, 'Japan (日本)'),
(111, 'Jersey'),
(112, 'Jordan (الاردن)'),
(113, 'Kazakhstan (Қазақстан)'),
(114, 'Kenya'),
(115, 'Kiribati'),
(116, 'Kuwait (الكويت)'),
(117, 'Kyrgyzstan (Кыргызстан)'),
(118, 'Laos (ນລາວ)'),
(119, 'Latvia (Latvija)'),
(120, 'Lebanon (لبنان)'),
(121, 'Lesotho'),
(122, 'Liberia'),
(123, 'Libya (ليبيا)'),
(124, 'Liechtenstein'),
(125, 'Lithuania (Lietuva)'),
(126, 'Luxembourg (Lëtzebuerg)'),
(127, 'Macao'),
(128, 'Macedonia (Македонија)'),
(129, 'Madagascar (Madagasikara)'),
(130, 'Malawi'),
(131, 'Malaysia'),
(132, 'Maldives (ގުޖޭއްރާ ޔާއްރިހޫމްޖ)'),
(133, 'Mali'),
(134, 'Malta'),
(135, 'Marshall Islands'),
(136, 'Martinique'),
(137, 'Mauritania (موريتانيا)'),
(138, 'Mauritius'),
(139, 'Mayotte'),
(140, 'Mexico (México)'),
(141, 'Micronesia'),
(142, 'Moldova'),
(143, 'Monaco'),
(144, 'Mongolia (Монгол Улс)'),
(145, 'Montenegro (Црна Гора)'),
(146, 'Montserrat'),
(147, 'Morocco (المغرب)'),
(148, 'Mozambique (Moçambique)'),
(149, 'Myanmar (Burma)'),
(150, 'Namibia'),
(151, 'Nauru (Naoero)'),
(152, 'Nepal (नेपाल)'),
(153, 'Netherlands (Nederland)'),
(154, 'Netherlands Antilles'),
(155, 'New Caledonia'),
(156, 'New Zealand'),
(157, 'Nicaragua'),
(158, 'Niger'),
(159, 'Nigeria'),
(160, 'Niue'),
(161, 'Norfolk Island'),
(162, 'Northern Mariana Islands'),
(163, 'North Korea (조선)'),
(164, 'Norway (Norge)'),
(165, 'Oman (عمان)'),
(166, 'Pakistan (پاکستان)'),
(167, 'Palau (Belau)'),
(168, 'Palestinian Territories'),
(169, 'Panama (Panamá)'),
(170, 'Papua New Guinea'),
(171, 'Paraguay'),
(172, 'Peru (Perú)'),
(173, 'Philippines (Pilipinas)'),
(174, 'Pitcairn'),
(175, 'Poland (Polska)'),
(176, 'Portugal'),
(177, 'Puerto Rico'),
(178, 'Qatar (قطر)'),
(179, 'Reunion'),
(180, 'Romania (România)'),
(181, 'Russia (Россия)'),
(182, 'Rwanda'),
(183, 'Saint Helena'),
(184, 'Saint Kitts and Nevis'),
(185, 'Saint Lucia'),
(186, 'Saint Pierre and Miquelon'),
(187, 'Saint Vincent and the Grenadines'),
(188, 'Samoa'),
(189, 'San Marino'),
(190, 'São Tomé and Príncipe'),
(191, 'Saudi Arabia (المملكة العربية السعودية)'),
(192, 'Senegal (Sénégal)'),
(193, 'Serbia (Србија)'),
(194, 'Serbia and Montenegro (Србија и Црна Гора)'),
(195, 'Seychelles'),
(196, 'Sierra Leone'),
(197, 'Singapore (Singapura)'),
(198, 'Slovakia (Slovensko)'),
(199, 'Slovenia (Slovenija)'),
(200, 'Solomon Islands'),
(201, 'Somalia (Soomaaliya)'),
(202, 'South Africa'),
(203, 'South Georgia and the South Sandwich Islands'),
(204, 'South Korea (한국)'),
(205, 'Spain (España)'),
(206, 'Sri Lanka'),
(207, 'Sudan (السودان)'),
(208, 'Suriname'),
(209, 'Svalbard and Jan Mayen'),
(210, 'Swaziland'),
(211, 'Sweden (Sverige)'),
(212, 'Switzerland (Schweiz)'),
(213, 'Syria (سوريا)'),
(214, 'Taiwan (台灣)'),
(215, 'Tajikistan (Тоҷикистон)'),
(216, 'Tanzania'),
(217, 'Thailand (ราชอาณาจักรไทย)'),
(218, 'Timor-Leste'),
(219, 'Togo'),
(220, 'Tokelau'),
(221, 'Tonga'),
(222, 'Trinidad and Tobago'),
(223, 'Tunisia (تونس)'),
(224, 'Turkey (Türkiye)'),
(225, 'Turkmenistan (Türkmenistan)'),
(226, 'Turks and Caicos Islands'),
(227, 'Tuvalu'),
(228, 'Uganda'),
(229, 'Ukraine (Україна)'),
(230, 'United Arab Emirates (الإمارات العربيّة المتّحدة)'),
(231, 'United Kingdom'),
(232, 'United States'),
(233, 'United States minor outlying islands'),
(234, 'Uruguay'),
(235, 'Uzbekistan (O&#39;zbekiston)'),
(236, 'Vanuatu'),
(237, 'Vatican City (Città del Vaticano)'),
(238, 'Venezuela'),
(239, 'Vietnam (Việt Nam)'),
(240, 'Virgin Islands, British'),
(241, 'Virgin Islands, U.S.'),
(242, 'Wallis and Futuna'),
(243, 'Western Sahara (الصحراء الغربية)'),
(244, 'Yemen (اليمن)'),
(245, 'Zambia'),
(246, 'Zimbabwe');

-- --------------------------------------------------------

--
-- Table structure for table `eschool_courses`
--

DROP TABLE IF EXISTS `eschool_courses`;
CREATE TABLE IF NOT EXISTS `eschool_courses` (
  `CourseID` bigint(20) NOT NULL AUTO_INCREMENT,
  `CourseName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Description` text COLLATE utf8_unicode_ci NOT NULL,
  `ContentDataFileName` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `StartDate` date NOT NULL,
  `EndDate` date NOT NULL,
  `IsEnrollable` tinyint(4) NOT NULL,
  `MaxNoOfStudent` int(11) NOT NULL DEFAULT '1',
  `TotalNoOfClasses` int(11) NOT NULL,
  `CourseFee` double DEFAULT NULL,
  `TeacherUserID` int(11) DEFAULT NULL COMMENT 'Which teacher will do this course',
  `TeacherLibID` int(11) DEFAULT NULL COMMENT 'The Teacher can add his library any time',
  `SubjectID` int(11) NOT NULL DEFAULT '0' COMMENT 'Physics, Chemistry , bio, etc.',
  PRIMARY KEY (`CourseID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='The Courses that we will offer on the web site' AUTO_INCREMENT=4 ;

--
-- Dumping data for table `eschool_courses`
--

INSERT INTO `eschool_courses` (`CourseID`, `CourseName`, `Description`, `ContentDataFileName`, `StartDate`, `EndDate`, `IsEnrollable`, `MaxNoOfStudent`, `TotalNoOfClasses`, `CourseFee`, `TeacherUserID`, `TeacherLibID`, `SubjectID`) VALUES
(1, 'Mastering Windows 2008 R2 Server', 'Mastering Windows 2008 R2 Server, by Kifayat Ullah', '2_090113809227855360c90724286f1e7862b184b08bf0d303.pdf', '2013-01-09', '2013-02-28', 1, 20, 20, 5000, 2, 2, 4),
(2, 'CCNA OSP', 'CCNA Network Samulation Lab', '2_09011380914430526af6e7b946b346d8ca891b9f0e285acc.pdf', '2013-01-09', '2013-02-10', 1, 50, 20, 5000, 2, 2, 4),
(3, 'KKJ Course', 'THis is KKJ Cours', '5_1401131309018773574ea416e2dbf3c3c285382a205782467.doc', '2013-01-02', '2013-01-04', 1, 4, 30, 44, 5, 3, 4);

-- --------------------------------------------------------

--
-- Table structure for table `eschool_courses_classes`
--

DROP TABLE IF EXISTS `eschool_courses_classes`;
CREATE TABLE IF NOT EXISTS `eschool_courses_classes` (
  `ClassID` int(11) NOT NULL AUTO_INCREMENT,
  `CourseID` bigint(20) NOT NULL DEFAULT '0',
  `TeacherUserID` int(11) NOT NULL COMMENT 'OurSystem''s Teacher ID from the user accounts table',
  `WizIQ_class_id` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `WizIQ_start_time` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `WizIQ_duration` int(11) NOT NULL DEFAULT '60' COMMENT 'In Minutes, ',
  `WizIQ_presenter_url` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `WizIQ_recording_url` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CreateAt` datetime NOT NULL,
  `UpdateAt` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `WhoUserID` int(11) NOT NULL DEFAULT '0' COMMENT 'Which user create this record',
  PRIMARY KEY (`ClassID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='To record the classes details created in the WizIQ Server' AUTO_INCREMENT=5 ;

--
-- Dumping data for table `eschool_courses_classes`
--

INSERT INTO `eschool_courses_classes` (`ClassID`, `CourseID`, `TeacherUserID`, `WizIQ_class_id`, `WizIQ_start_time`, `WizIQ_duration`, `WizIQ_presenter_url`, `WizIQ_recording_url`, `CreateAt`, `UpdateAt`, `WhoUserID`) VALUES
(1, 1, 4, '1247827', '2013-1-19 1:01:00', 30, NULL, 'http://authorlive.com/aliveext/Recorded.aspx?SessionCode=MIaKhug8nxM%3d', '2013-01-16 11:14:44', '0000-00-00 00:00:00', 4),
(2, 1, 4, '1247856', '2013-1-19 2:01:00', 30, NULL, 'http://authorlive.com/aliveext/Recorded.aspx?SessionCode=%2bjkJN27%2bacM%3d', '2013-01-16 11:48:11', '0000-00-00 00:00:00', 4),
(3, 1, 4, '1247857', '2013-1-19 3:01:00', 30, 'http://authorlive.com/aliveext/LoginToSession.aspx?SessionCode=40svgYiXbqwTbbvqFuxhtg%3d%3d', 'http://authorlive.com/aliveext/Recorded.aspx?SessionCode=iyyScRVw%2fHQ%3d', '2013-01-16 11:49:28', '0000-00-00 00:00:00', 4),
(4, 1, 4, '1247874', '2013-1-19 4:01:00', 30, 'http://authorlive.com/aliveext/LoginToSession.aspx?SessionCode=Xeeez3JFKwep0GiX3xacFA%3d%3d', 'http://authorlive.com/aliveext/Recorded.aspx?SessionCode=3sjoCFRRwYE%3d', '2013-01-16 12:10:00', '0000-00-00 00:00:00', 4);

-- --------------------------------------------------------

--
-- Table structure for table `eschool_courses_schedule`
--

DROP TABLE IF EXISTS `eschool_courses_schedule`;
CREATE TABLE IF NOT EXISTS `eschool_courses_schedule` (
  `CourseClassScheduleID` int(11) NOT NULL AUTO_INCREMENT,
  `CourseID` bigint(20) NOT NULL,
  `WeekDay0` tinyint(4) DEFAULT NULL COMMENT 'Sunday',
  `WeekDay1` tinyint(4) DEFAULT NULL COMMENT 'Monday',
  `WeekDay2` tinyint(4) DEFAULT NULL COMMENT 'Tuesday',
  `WeekDay3` tinyint(4) DEFAULT NULL COMMENT 'Wednesday',
  `WeekDay4` tinyint(4) DEFAULT NULL COMMENT ' Thursday',
  `WeekDay5` tinyint(4) DEFAULT NULL COMMENT 'Friday',
  `WeekDay6` tinyint(4) DEFAULT NULL COMMENT 'Saturday',
  `TeacherUserID` int(11) DEFAULT NULL,
  PRIMARY KEY (`CourseClassScheduleID`),
  UNIQUE KEY `CourseID` (`CourseID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `eschool_courses_schedule`
--

INSERT INTO `eschool_courses_schedule` (`CourseClassScheduleID`, `CourseID`, `WeekDay0`, `WeekDay1`, `WeekDay2`, `WeekDay3`, `WeekDay4`, `WeekDay5`, `WeekDay6`, `TeacherUserID`) VALUES
(1, 2, 0, 0, 1, 1, 1, 0, 0, 2);

-- --------------------------------------------------------

--
-- Table structure for table `eschool_courses_studdent_attendance`
--

DROP TABLE IF EXISTS `eschool_courses_studdent_attendance`;
CREATE TABLE IF NOT EXISTS `eschool_courses_studdent_attendance` (
  `CAID` bigint(20) NOT NULL AUTO_INCREMENT,
  `ClassID` bigint(20) NOT NULL,
  `StudentUserID` bigint(20) NOT NULL COMMENT 'UserID of the Student Account',
  `CourseID` int(11) NOT NULL,
  PRIMARY KEY (`CAID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Per Class Attendance of the Student' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `eschool_courses_studdent_entrollments`
--

DROP TABLE IF EXISTS `eschool_courses_studdent_entrollments`;
CREATE TABLE IF NOT EXISTS `eschool_courses_studdent_entrollments` (
  `CEID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Student Entrollment ID',
  `CourseID` bigint(20) NOT NULL,
  `StudentUserID` bigint(20) NOT NULL,
  `WhoUserID` bigint(20) NOT NULL COMMENT 'Which User Enrolled this student',
  `CreateAt` datetime NOT NULL COMMENT 'The Time on Which the Record was created',
  `UpdatedAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`CEID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Which Student is in What Course can be defined in this table' AUTO_INCREMENT=4 ;

--
-- Dumping data for table `eschool_courses_studdent_entrollments`
--

INSERT INTO `eschool_courses_studdent_entrollments` (`CEID`, `CourseID`, `StudentUserID`, `WhoUserID`, `CreateAt`, `UpdatedAt`) VALUES
(2, 3, 4, 4, '2013-01-14 09:41:06', '2013-01-14 06:41:06'),
(3, 1, 4, 4, '2013-01-14 10:47:30', '2013-01-14 07:47:30');

-- --------------------------------------------------------

--
-- Table structure for table `eschool_share_with_types`
--

DROP TABLE IF EXISTS `eschool_share_with_types`;
CREATE TABLE IF NOT EXISTS `eschool_share_with_types` (
  `ShareWithID` int(11) NOT NULL AUTO_INCREMENT,
  `ShareWith` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ShareWithID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Documents Sharing With Type Names' AUTO_INCREMENT=4 ;

--
-- Dumping data for table `eschool_share_with_types`
--

INSERT INTO `eschool_share_with_types` (`ShareWithID`, `ShareWith`) VALUES
(1, 'Public'),
(2, 'Students'),
(3, 'Only Me');

-- --------------------------------------------------------

--
-- Table structure for table `eschool_subjects`
--

DROP TABLE IF EXISTS `eschool_subjects`;
CREATE TABLE IF NOT EXISTS `eschool_subjects` (
  `SubjectID` int(11) NOT NULL AUTO_INCREMENT,
  `SubjectTitle` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `SubjectSubTitle` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`SubjectID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `eschool_subjects`
--

INSERT INTO `eschool_subjects` (`SubjectID`, `SubjectTitle`, `SubjectSubTitle`) VALUES
(1, 'Chemistry', 'Physical and Analytical Chemistry'),
(2, 'Biology', 'Botany and Zoology'),
(3, 'Maths', 'Algebra & Geometry '),
(4, 'IT', 'Computer and Information Technology');

-- --------------------------------------------------------

--
-- Table structure for table `eschool_teacher_library`
--

DROP TABLE IF EXISTS `eschool_teacher_library`;
CREATE TABLE IF NOT EXISTS `eschool_teacher_library` (
  `TeacherLibID` int(11) NOT NULL AUTO_INCREMENT,
  `LibName` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `LibDescription` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `TeacherUserID` int(11) NOT NULL COMMENT 'Which Teacher has This Library',
  `CreateAt` datetime NOT NULL,
  `UpdateAt` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`TeacherLibID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='The Name of the Library of a Teacher' AUTO_INCREMENT=4 ;

--
-- Dumping data for table `eschool_teacher_library`
--

INSERT INTO `eschool_teacher_library` (`TeacherLibID`, `LibName`, `LibDescription`, `TeacherUserID`, `CreateAt`, `UpdateAt`) VALUES
(1, 'CCNA Study Meterials', 'Cisco Networking Courses ', 2, '2013-01-08 23:00:46', '0000-00-00 00:00:00'),
(2, 'MCSE Study Material', 'Microsoft Certified System Engineers and MCITP Courses Study Material ', 2, '2013-01-08 23:02:20', '0000-00-00 00:00:00'),
(3, 'Web Development', ' My Web Development and PHP Development Section', 5, '2013-01-14 09:21:33', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `eschool_teacher_library_meterial`
--

DROP TABLE IF EXISTS `eschool_teacher_library_meterial`;
CREATE TABLE IF NOT EXISTS `eschool_teacher_library_meterial` (
  `TeacherLibMetrialID` bigint(20) NOT NULL AUTO_INCREMENT,
  `TeacherLibID` int(11) NOT NULL,
  `DataFileName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Description` text COLLATE utf8_unicode_ci NOT NULL,
  `IsDownloadable` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0=No, 1=Yes',
  `ShareWithID` int(11) NOT NULL COMMENT '1=Public, 2=Student, 3=Only Me',
  `CreateAt` datetime NOT NULL,
  `UpdateAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`TeacherLibMetrialID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='The Item Added to the Library by a Teacher or Admin' AUTO_INCREMENT=5 ;

--
-- Dumping data for table `eschool_teacher_library_meterial`
--

INSERT INTO `eschool_teacher_library_meterial` (`TeacherLibMetrialID`, `TeacherLibID`, `DataFileName`, `Description`, `IsDownloadable`, `ShareWithID`, `CreateAt`, `UpdateAt`) VALUES
(1, 2, '2_0901138131569173adfb11976e107df6120a2dfa4dbfa4af.pdf', 'sfsdfsgsdgsgsf', 1, 1, '2013-01-09 13:23:15', '2013-01-09 10:23:15'),
(2, 1, '1_12011311141044262a2d63b1bd357ddc33a63f1640ac8a704.pdf', 'tsdfdsd', 1, 1, '2013-01-12 14:25:10', '2013-01-12 11:25:10'),
(3, 3, '5_140113130952193303e43171bf957c27ed4e4ead5f0ae0219.pdf', 'test', 1, 2, '2013-01-14 09:37:52', '2013-01-14 06:37:52'),
(4, 3, '5_140113131102425452f30d509567249539af677f54f49391b.doc', 'test', 1, 2, '2013-01-14 11:04:02', '2013-01-14 08:04:02');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
CREATE TABLE IF NOT EXISTS `news` (
  `NewsID` bigint(20) NOT NULL AUTO_INCREMENT,
  `NewsTitle` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `NewsText` text COLLATE utf8_unicode_ci NOT NULL,
  `Dated` date NOT NULL,
  `Username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Language` varchar(3) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'en',
  PRIMARY KEY (`NewsID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `news_letter`
--

DROP TABLE IF EXISTS `news_letter`;
CREATE TABLE IF NOT EXISTS `news_letter` (
  `NewsLetterID` bigint(20) NOT NULL AUTO_INCREMENT,
  `EmailAddress` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `CreatedAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`EmailAddress`),
  UNIQUE KEY `NewsLetterID` (`NewsLetterID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user_accounts`
--

DROP TABLE IF EXISTS `user_accounts`;
CREATE TABLE IF NOT EXISTS `user_accounts` (
  `UserID` bigint(20) NOT NULL AUTO_INCREMENT,
  `Username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Password` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `FirstName` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `MiddleNames` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `LastNames` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `AddressLine1` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `AddressLine2` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `City` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CountryID` int(11) DEFAULT NULL,
  `Phone` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `WebSite` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'The Web Site Address of the User',
  `CompanyNameIfAny` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ContactNo` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'User''s Contact Phone or Mobile Numbers',
  `Others` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Picture` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Path of the Picture Upladed by User to his Profile',
  `GroupID` int(10) unsigned DEFAULT NULL,
  `AccountStatus` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1= Enable  0=Disable',
  `LastLoginIP` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Users, Last Login IP',
  `AdditionalUsername` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'This Username could be used for WizIQ Services',
  `AdditionalPassword` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'This Password for the Username that could be used for WizIQ Services',
  `CreatedAt` datetime NOT NULL,
  `UpdateAt` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`Username`),
  KEY `UserID` (`UserID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='UserAccounts' AUTO_INCREMENT=6 ;

--
-- Dumping data for table `user_accounts`
--

INSERT INTO `user_accounts` (`UserID`, `Username`, `Password`, `FirstName`, `MiddleNames`, `LastNames`, `AddressLine1`, `AddressLine2`, `City`, `CountryID`, `Phone`, `Email`, `WebSite`, `CompanyNameIfAny`, `ContactNo`, `Others`, `Picture`, `GroupID`, `AccountStatus`, `LastLoginIP`, `AdditionalUsername`, `AdditionalPassword`, `CreatedAt`, `UpdateAt`) VALUES
(1, 'administrator', '123', 'System', 'Default Account', 'admin', 'Default', 'Default', 'Default', 191, '00966545883076', 'info@zorkif.com', 'http://www.zorkif.com', 'Zorkif Technology Center', '00966545883076', 'This e-School Application was Developed by Zorkif Team', '1_0801137220671568091a55eadb43e62f4d9016fe00ab14c3.png', 1, 1, NULL, 'demo', 'demo', '2012-12-26 00:00:00', '0000-00-00 00:00:00'),
(2, 'kifayat', '123', 'Kifayat', 'ullah', 'Khan', 'Office No1', 'Ground Floor, Ibni Khatir Road', 'Riyadh', 191, '00966545883076', 'kifayat@zorkif.com', 'http://www.zorlkif.com', NULL, '00966545883076', NULL, '2_1601131515143754002b1e0da11a7cae7fd98ed25cb1b19ca.gif', 2, 1, '127.0.0.1', NULL, NULL, '2013-01-08 22:58:48', '2013-01-16 12:15:14'),
(3, 'misbah', '123', 'Misbah', 'Kifayat', 'Khan', 'Office No3', 'Ground Floor, Ibni Khatir Road', 'Riyadh', 191, '00966545883076', 'misbah.kifayat@outlook.com', 'http://www.zorlkif.com', NULL, '00966545883076', NULL, NULL, 3, 1, '127.0.0.1', NULL, NULL, '2013-01-08 23:04:55', '0000-00-00 00:00:00'),
(4, 'student', '123', 'Student', 'S', 'Khan', 'Welcome', 'to', 'Riyadh', 191, '009265354855', 'student@student.com', 'http://www.yahoo.com', NULL, '0096654566666', NULL, '4_1501131421235311602b1e0da11a7cae7fd98ed25cb1b19ca.gif', 3, 1, '127.0.0.1', NULL, NULL, '2013-01-13 11:41:49', '2013-01-15 18:04:23'),
(5, 'teacher', '123', 'teacher', NULL, 't', '555', '55', '55', 191, '555', 'teacher2@yahoo.com', 'http://www.yahoo.com', NULL, '555', NULL, NULL, 2, 1, '127.0.0.1', NULL, NULL, '2013-01-14 09:20:48', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `user_groups`
--

DROP TABLE IF EXISTS `user_groups`;
CREATE TABLE IF NOT EXISTS `user_groups` (
  `GroupID` int(11) NOT NULL AUTO_INCREMENT,
  `GroupName` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `GroupDescription` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`GroupID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='User Groups' AUTO_INCREMENT=4 ;

--
-- Dumping data for table `user_groups`
--

INSERT INTO `user_groups` (`GroupID`, `GroupName`, `GroupDescription`) VALUES
(1, 'Administrators', 'System Administrators'),
(2, 'Teachers', 'e-School Teachers'),
(3, 'Students', 'e-School Students');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
