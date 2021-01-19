-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 06, 2013 at 08:01 AM
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='The Courses that we will offer on the web site' AUTO_INCREMENT=3 ;

--
-- Dumping data for table `eschool_courses`
--

INSERT INTO `eschool_courses` (`CourseID`, `CourseName`, `Description`, `ContentDataFileName`, `StartDate`, `EndDate`, `IsEnrollable`, `MaxNoOfStudent`, `TotalNoOfClasses`, `CourseFee`, `TeacherUserID`, `TeacherLibID`, `SubjectID`) VALUES
(1, 'Analytical Chemistry Part1', 'FSc Part 1 Analytical Chemistry at PES', NULL, '2013-01-01', '2013-01-15', 1, 15, 30, 5000, 3, 1, 2),
(2, '1Botanical Plants', 'FSc Part 1 Biology for PES', NULL, '2013-01-01', '2013-02-01', 1, 15, 20, 5000, 4, 1, 2);

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
(1, 1, 1, 1, 1, 0, 0, 0, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `eschool_courses_schedule_date_sheet`
--

DROP TABLE IF EXISTS `eschool_courses_schedule_date_sheet`;
CREATE TABLE IF NOT EXISTS `eschool_courses_schedule_date_sheet` (
  `ClassID` bigint(20) NOT NULL AUTO_INCREMENT,
  `CourseID` int(11) NOT NULL,
  `ClassDate` date NOT NULL,
  `ClassTime` time NOT NULL,
  PRIMARY KEY (`ClassID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Class Date Sheet for a course' AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Which Student is in What Course can be defined in this table' AUTO_INCREMENT=16 ;

--
-- Dumping data for table `eschool_courses_studdent_entrollments`
--

INSERT INTO `eschool_courses_studdent_entrollments` (`CEID`, `CourseID`, `StudentUserID`, `WhoUserID`, `CreateAt`, `UpdatedAt`) VALUES
(1, 1, 1, 3, '2013-01-02 12:44:13', '2013-01-02 09:44:13'),
(2, 1, 1, 3, '2013-01-02 12:44:13', '2013-01-02 09:44:13'),
(3, 1, 1, 3, '2013-01-02 12:44:46', '2013-01-02 09:44:46'),
(4, 1, 1, 3, '2013-01-02 12:44:46', '2013-01-02 09:44:46'),
(5, 1, 1, 3, '2013-01-02 13:12:02', '2013-01-02 10:12:02'),
(6, 1, 1, 3, '2013-01-02 13:12:02', '2013-01-02 10:12:02'),
(7, 1, 1, 3, '2013-01-02 13:12:07', '2013-01-02 10:12:07'),
(8, 1, 1, 3, '2013-01-02 13:12:07', '2013-01-02 10:12:07'),
(9, 1, 1, 3, '2013-01-02 13:13:16', '2013-01-02 10:13:16'),
(10, 1, 1, 3, '2013-01-02 13:13:16', '2013-01-02 10:13:16'),
(11, 1, 1, 3, '2013-01-02 13:14:23', '2013-01-02 10:14:23'),
(12, 1, 1, 3, '2013-01-02 13:14:23', '2013-01-02 10:14:23'),
(13, 1, 1, 3, '2013-01-05 09:27:01', '2013-01-05 06:27:01'),
(14, 1, 1, 3, '2013-01-05 09:27:01', '2013-01-05 06:27:01'),
(15, 1, 1, 3, '2013-01-05 12:48:55', '2013-01-05 09:48:55');

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
(4, 'Modern Sciences', 'Computer and Information Technology');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='The Name of the Library of a Teacher' AUTO_INCREMENT=10 ;

--
-- Dumping data for table `eschool_teacher_library`
--

INSERT INTO `eschool_teacher_library` (`TeacherLibID`, `LibName`, `LibDescription`, `TeacherUserID`, `CreateAt`, `UpdateAt`) VALUES
(1, 'My First Library', 'This is my First Library for Physics & Physical Sciences ', 3, '2013-01-01 14:45:17', '2013-01-02 19:33:09'),
(2, 'My Second Library', ' This is my Second Library', 3, '2013-01-01 14:53:57', '0000-00-00 00:00:00'),
(3, 'Teacher Library1', ' tl1', 4, '2013-01-02 23:11:05', '0000-00-00 00:00:00'),
(4, 'sdsds', ' ', 3, '2013-01-06 09:14:56', '0000-00-00 00:00:00'),
(5, 'dfgf', ' ', 3, '2013-01-06 09:18:14', '0000-00-00 00:00:00'),
(6, 'sdsds', ' ', 3, '2013-01-06 09:19:42', '0000-00-00 00:00:00'),
(7, 'sdsds', ' ', 3, '2013-01-06 09:19:46', '0000-00-00 00:00:00'),
(8, 'sdsds', ' ', 3, '2013-01-06 09:20:06', '0000-00-00 00:00:00'),
(9, 'asdasd', ' ', 3, '2013-01-06 09:20:16', '0000-00-00 00:00:00');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='The Item Added to the Library by a Teacher or Admin' AUTO_INCREMENT=6 ;

--
-- Dumping data for table `eschool_teacher_library_meterial`
--

INSERT INTO `eschool_teacher_library_meterial` (`TeacherLibMetrialID`, `TeacherLibID`, `DataFileName`, `Description`, `IsDownloadable`, `ShareWithID`, `CreateAt`, `UpdateAt`) VALUES
(5, 2, '64(1).png', 'ss', 0, 1, '2013-01-02 23:10:23', '2013-01-02 20:10:23');

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=23 ;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`NewsID`, `NewsTitle`, `NewsText`, `Dated`, `Username`, `Language`) VALUES
(21, 'Welcome to Sooqna', 'Welcome to Sooqna.com', '2012-05-10', 'administrator', 'en'),
(22, 'سوقنا', 'سوقنا', '2012-07-09', 'administrator', 'ar');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `news_letter`
--

INSERT INTO `news_letter` (`NewsLetterID`, `EmailAddress`, `CreatedAt`) VALUES
(1, 'kifayat@yahoo.com', '2012-12-26 16:34:34'),
(3, 'test@sdfsdfd.com', '2012-12-26 16:44:34');

-- --------------------------------------------------------

--
-- Table structure for table `system_roles_list`
--

DROP TABLE IF EXISTS `system_roles_list`;
CREATE TABLE IF NOT EXISTS `system_roles_list` (
  `RoleListID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `RoleName` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`RoleListID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `system_roles_list_saved_role_details`
--

DROP TABLE IF EXISTS `system_roles_list_saved_role_details`;
CREATE TABLE IF NOT EXISTS `system_roles_list_saved_role_details` (
  `RoleListSavedRollID` int(11) NOT NULL AUTO_INCREMENT,
  `RoleListID` int(11) NOT NULL,
  `SavedRoleID` int(11) NOT NULL,
  PRIMARY KEY (`RoleListSavedRollID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='This Table will hold the details of the Saved Roles' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `system_roles_saved`
--

DROP TABLE IF EXISTS `system_roles_saved`;
CREATE TABLE IF NOT EXISTS `system_roles_saved` (
  `SavedRoleID` int(11) NOT NULL AUTO_INCREMENT,
  `SavedRoleName` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`SavedRoleID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='These will be defined by the admin and saved in here as group of roll List' AUTO_INCREMENT=1 ;

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
  `CreatedAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`Username`),
  KEY `UserID` (`UserID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='UserAccounts' AUTO_INCREMENT=8 ;

--
-- Dumping data for table `user_accounts`
--

INSERT INTO `user_accounts` (`UserID`, `Username`, `Password`, `FirstName`, `MiddleNames`, `LastNames`, `AddressLine1`, `AddressLine2`, `City`, `CountryID`, `Phone`, `Email`, `WebSite`, `CompanyNameIfAny`, `ContactNo`, `Others`, `Picture`, `GroupID`, `AccountStatus`, `LastLoginIP`, `AdditionalUsername`, `AdditionalPassword`, `CreatedAt`) VALUES
(7, '', '', '', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, 1, NULL, NULL, NULL, '2013-01-02 08:23:28'),
(1, 'administrator', '123', 'System', NULL, 'admin', 'Default', 'Default', 'Default', 191, NULL, 'info@zorkif.com', 'http://www.zorkif.com', NULL, '', NULL, NULL, 1, 1, NULL, 'demo', 'demo', '2012-12-25 21:00:00'),
(5, 'student1', '123', 'Student', 'd', 's', '123', '123', '123', 191, 'aasd', 'student1@student1.com', NULL, NULL, '123', NULL, NULL, 3, 1, '127.0.0.1', NULL, NULL, '2013-01-02 05:49:11'),
(6, 'student2', '123', 'Student', NULL, '2', '123', '123', '123', 191, 'aasd', 'student1@student1.com', 'asd', NULL, '123', NULL, NULL, 3, 0, '127.0.0.1', NULL, NULL, '2013-01-02 05:53:43'),
(3, 'teacher1', '123', ' مرحبا', 'Tea', 'Te', 'qqqq', 'qq', 'Riyadh', 17, 'qqq', 'kifayat@yahoo.com', 'http://www.bbc.com', 'were', '55555', 'rewrwer', NULL, 2, 1, '127.0.0.1', NULL, NULL, '2012-12-26 17:33:52'),
(4, 'teacher2', '123', 'داود', 'علی', 'خان', 'teacher2', 'teacher2', 'teacher2', 166, 'teacher2', 'teacher2', 'teacher2', 'teacher2', 'teacher2', 'teacher2', NULL, 2, 1, NULL, 'teacher2', 'teacher2', '2012-12-29 19:06:50');

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
(1, 'Administrator', 'System Administrator'),
(2, 'Teacher', 'e-School Teachers'),
(3, 'Student', 'e-School Students');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
