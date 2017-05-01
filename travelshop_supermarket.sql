-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 01, 2017 at 03:54 PM
-- Server version: 5.5.41-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `travelshop_supermarket`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `address_id` int(11) NOT NULL,
  `province_id` int(11) DEFAULT NULL,
  `region_id` int(11) DEFAULT NULL,
  `continent_id` int(11) DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`address_id`, `province_id`, `region_id`, `continent_id`, `country_id`) VALUES
(1, NULL, NULL, 3, 145),
(2, NULL, NULL, 3, 147),
(3, NULL, NULL, 3, 113),
(4, NULL, NULL, 3, 145),
(5, NULL, NULL, NULL, NULL),
(6, 7, 6, NULL, 215),
(7, NULL, NULL, 3, 9),
(8, NULL, NULL, 5, 14),
(9, NULL, NULL, 5, 61),
(10, 5, 3, NULL, 215),
(12, 10, 6, NULL, 215),
(13, 20, 3, NULL, 215),
(14, 50, 6, 0, 0),
(15, 5, 4, NULL, 215),
(18, 5, 5, NULL, NULL),
(19, 0, 3, NULL, 215),
(20, 7, 3, NULL, 215),
(21, 0, 1, NULL, 215),
(22, 5, 2, NULL, 215),
(23, NULL, NULL, 7, 12);

-- --------------------------------------------------------

--
-- Table structure for table `agent`
--

CREATE TABLE `agent` (
  `agent_id` int(11) NOT NULL,
  `agent_code` varchar(5) NOT NULL,
  `agent_compName` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `agent`
--

INSERT INTO `agent` (`agent_id`, `agent_code`, `agent_compName`) VALUES
(1, 'TSC01', 'Tiger Singapore Company');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `booking_id` int(11) NOT NULL,
  `booking_code` varchar(20) NOT NULL,
  `client_id` int(11) NOT NULL,
  `tour_id` int(11) NOT NULL,
  `booking_detail` mediumtext NOT NULL,
  `booking_lastupdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `booking_status` varchar(20) NOT NULL,
  `booking_price` float(8,2) NOT NULL,
  `booking_discount` float(8,2) NOT NULL,
  `booking_paidleft` float(8,2) NOT NULL,
  `booking_currency` varchar(3) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`booking_id`, `booking_code`, `client_id`, `tour_id`, `booking_detail`, `booking_lastupdate`, `booking_status`, `booking_price`, `booking_discount`, `booking_paidleft`, `booking_currency`) VALUES
(1, 'ITSC0100010001', 1, 1, '{\"room\":[{\"roomtype\":\"Single room\",\"tourist_num\":1}],\"date\":[{\"start\":\"2017-05-05\",\"end\":\"2017-05-07\"}],\"tourist\":[{\"total_tourist\":1}],\"total_amount\":19400,\"touristinfo\":[{\"fullname\":\"Adam Smith\",\"tel\":\"012536584\",\"passportImg\":\"0.jpeg\",\"passportNo\":\"12523625415795\",\"dob\":\"1989-02-16\"}]}', '2017-04-27 17:15:10', 'booking', 19400.00, 0.00, 0.00, 'THB'),
(2, 'ITSC0100020001', 1, 2, '{\"room\":[{\"roomtype\":\"Single room\",\"tourist_num\":1}],\"date\":[{\"start\":\"2017-05-19\",\"end\":\"2017-05-21\"}],\"option\":[{\"condition\":\"increase\",\"price\":\"4000.00\"}],\"tourist\":[{\"total_tourist\":1}],\"special-request\":\"20 kg bag\",\"total_amount\":14900,\"touristinfo\":[{\"fullname\":\"Adam  Smith\",\"tel\":\"012536584\",\"passportImg\":\"1\",\"passportNo\":\"12523625415795\",\"dob\":\"1989-02-16\"}]}', '2017-04-27 17:15:44', 'booking', 14900.00, 0.00, 0.00, 'THB'),
(3, 'ITSC0100010002', 2, 1, '{\"room\":[{\"roomtype\":\"Single room\",\"tourist_num\":1}],\"date\":[{\"start\":\"2017-05-05\",\"end\":\"2017-05-07\"}],\"tourist\":[{\"total_tourist\":1}],\"total_amount\":19400,\"touristinfo\":[{\"fullname\":\"aaaa\",\"tel\":\"0844444444\",\"passportImg\":\"0.png\",\"passportNo\":\"1234\",\"dob\":\"1993-11-07\"}]}', '2017-04-28 15:31:51', 'booking', 19400.00, 0.00, 0.00, 'THB'),
(4, 'ITSC0100010003', 3, 1, '{\"room\":[{\"roomtype\":\"Single room\",\"tourist_num\":1}],\"date\":[{\"start\":\"2017-05-11\",\"end\":\"2017-05-13\"}],\"tourist\":[{\"total_tourist\":1}],\"total_amount\":17400,\"touristinfo\":[{\"fullname\":\"test1 test11\",\"tel\":\"0928521478\",\"passportImg\":\"0.jpeg\",\"passportNo\":\"23514625365894\",\"dob\":\"1997-01-01\"}]}', '2017-04-30 20:47:40', 'booking', 17400.00, 0.00, 0.00, 'THB'),
(5, 'TTSC0100180001', 3, 18, '{\"room\":[{\"roomtype\":\"Single-room\",\"tourist_num\":2}],\"date\":[{\"start\":\"2017-05-10\",\"end\":\"2017-05-10\"}],\"tourist\":[{\"total_tourist\":2}],\"total_amount\":24800,\"touristinfo\":[{\"fullname\":\"test1  test11\",\"tel\":\"0928521478\",\"passportImg\":\"3\",\"passportNo\":\"23514625365894\",\"dob\":\"1997-01-01\"}],\"cancel\":\"\"}', '2017-05-01 10:01:52', 'cancel', 24800.00, 0.00, 0.00, 'THB'),
(6, 'TTSC0100180002', 3, 18, '{\"room\":[{\"roomtype\":\"Twin-room\",\"tourist_num\":1}],\"date\":[{\"start\":\"2017-05-10\",\"end\":\"2017-05-10\"}],\"tourist\":[{\"total_tourist\":1}],\"total_amount\":12400,\"touristinfo\":[{\"fullname\":\"test1  test11\",\"tel\":\"0928521478\",\"passportImg\":\"3\",\"passportNo\":\"23514625365894\",\"dob\":\"1997-01-01\"}],\"cancel\":\"\"}', '2017-05-01 10:01:50', 'cancel', 12400.00, 0.00, 0.00, 'THB'),
(7, 'TTSC0100180003', 3, 18, '{\"room\":[{\"roomtype\":\"Single-room\",\"tourist_num\":2}],\"date\":[{\"start\":\"2017-05-10\",\"end\":\"2017-05-10\"}],\"tourist\":[{\"total_tourist\":2}],\"total_amount\":22300,\"touristinfo\":[{\"fullname\":\"test1  test11\",\"tel\":\"0928521478\",\"passportImg\":\"3\",\"passportNo\":\"23514625365894\",\"dob\":\"1997-01-01\"}],\"cancel\":\"\"}', '2017-05-01 10:01:47', 'cancel', 22300.00, 0.00, 0.00, 'THB'),
(8, 'TTSC0100180004', 3, 18, '{\"room\":[{\"roomtype\":\"Twin-room\",\"tourist_num\":1}],\"date\":[{\"start\":\"2017-05-10\",\"end\":\"2017-05-10\"}],\"tourist\":[{\"total_tourist\":1}],\"total_amount\":12400,\"touristinfo\":[{\"fullname\":\"test1  test11\",\"tel\":\"0928521478\",\"passportImg\":\"3\",\"passportNo\":\"23514625365894\",\"dob\":\"1997-01-01\"}],\"cancel\":\"\"}', '2017-05-01 10:01:45', 'cancel', 12400.00, 0.00, 0.00, 'THB'),
(9, 'TTSC0100180005', 3, 18, '{\"room\":[{\"roomtype\":\"Single-room\",\"tourist_num\":2}],\"date\":[{\"start\":\"2017-05-10\",\"end\":\"2017-05-10\"}],\"tourist\":[{\"total_tourist\":2}],\"total_amount\":24800,\"touristinfo\":[{\"fullname\":\"test1  test11\",\"tel\":\"0928521478\",\"passportImg\":\"3\",\"passportNo\":\"23514625365894\",\"dob\":\"1997-01-01\"}]}', '2017-05-01 10:01:08', 'booking', 24800.00, 0.00, 0.00, 'THB'),
(10, 'TTSC0100180006', 3, 18, '{\"room\":[{\"roomtype\":\"Twin-room\",\"tourist_num\":2}],\"date\":[{\"start\":\"2017-05-10\",\"end\":\"2017-05-10\"}],\"tourist\":[{\"total_tourist\":2}],\"total_amount\":19800,\"touristinfo\":[{\"fullname\":\"test1  test11\",\"tel\":\"0928521478\",\"passportImg\":\"3\",\"passportNo\":\"23514625365894\",\"dob\":\"1997-01-01\"}]}', '2017-05-01 10:16:43', 'booking', 19800.00, 0.00, 0.00, 'THB'),
(11, 'TTSC0100180007', 3, 18, '{\"room\":[{\"roomtype\":\"Twin-room\",\"tourist_num\":2},{\"roomtype\":\"Single-room\",\"tourist_num\":1}],\"date\":[{\"start\":\"2017-05-10\",\"end\":\"2017-05-10\"}],\"tourist\":[{\"total_tourist\":3}],\"total_amount\":32200,\"touristinfo\":[{\"fullname\":\"test1  test11\",\"tel\":\"0928521478\",\"passportImg\":\"3\",\"passportNo\":\"23514625365894\",\"dob\":\"1997-01-01\"}]}', '2017-05-01 10:17:12', 'booking', 32200.00, 0.00, 0.00, 'THB'),
(12, 'ITSC0100010004', 3, 1, '{\"room\":[{\"roomtype\":\"Single room\",\"tourist_num\":1}],\"date\":[{\"start\":\"2017-05-11\",\"end\":\"2017-05-13\"}],\"tourist\":[{\"total_tourist\":1}],\"total_amount\":17400,\"touristinfo\":[{\"fullname\":\"test1  test11\",\"tel\":\"0928521478\",\"passportImg\":\"3\",\"passportNo\":\"23514625365894\",\"dob\":\"1997-01-01\"}]}', '2017-05-01 12:00:11', 'booking', 17400.00, 0.00, 0.00, 'THB');

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `client_id` int(11) NOT NULL,
  `client_type` varchar(10) NOT NULL,
  `client_tel` varchar(20) DEFAULT NULL,
  `client_email` varchar(50) NOT NULL,
  `client_password` varchar(50) NOT NULL,
  `client_imgMain` varchar(100) DEFAULT NULL,
  `client_firstName` varchar(100) NOT NULL,
  `client_middleName` varchar(100) DEFAULT NULL,
  `client_lastName` varchar(100) NOT NULL,
  `client_gender` varchar(1) DEFAULT NULL,
  `client_dob` date NOT NULL,
  `client_address` mediumtext,
  `client_nationality` varchar(50) NOT NULL,
  `client_passportNumber` varchar(20) NOT NULL,
  `client_passportRefImg` varchar(100) DEFAULT NULL,
  `client_identificationNumber` varchar(20) DEFAULT NULL,
  `client_lineId` varchar(30) DEFAULT NULL,
  `client_agency_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`client_id`, `client_type`, `client_tel`, `client_email`, `client_password`, `client_imgMain`, `client_firstName`, `client_middleName`, `client_lastName`, `client_gender`, `client_dob`, `client_address`, `client_nationality`, `client_passportNumber`, `client_passportRefImg`, `client_identificationNumber`, `client_lineId`, `client_agency_id`) VALUES
(1, 'normal', '012536584', 'adam@gmail.com', '012536584', NULL, 'Adam', '', 'Smith', '', '1989-02-16', 'amarica', 'American', '12523625415795', '1', NULL, 'adamline', NULL),
(2, 'normal', '0844444444', 'aaa@gmail.com', '0844444444', NULL, 'aaaa', '', '', '', '1993-11-07', 'aaa', 'Thai', '1234', '2', NULL, 'aaaa', NULL),
(3, 'normal', '0928521478', 'test1@mail.com', '0928521478', NULL, 'test1', '', 'test11', '', '1997-01-01', 'test address', '17', '23514625365894', '3', NULL, 'line1', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `continent`
--

CREATE TABLE `continent` (
  `continent_id` int(11) NOT NULL,
  `continent_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `continent`
--

INSERT INTO `continent` (`continent_id`, `continent_name`) VALUES
(1, 'Africa'),
(2, 'Antarctica'),
(3, 'Asia'),
(4, 'Europe'),
(5, 'North America'),
(6, 'Oceania'),
(7, 'South America');

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `country_id` int(11) NOT NULL,
  `continent_id` tinyint(1) NOT NULL,
  `country_nameEN` varchar(50) NOT NULL,
  `country_nameTH` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`country_id`, `continent_id`, `country_nameEN`, `country_nameTH`) VALUES
(1, 4, 'Andorra', ''),
(2, 3, 'United Arab Emirates', ''),
(3, 3, 'Afghanistan', ''),
(4, 5, 'Antigua and Barbuda', ''),
(5, 5, 'Anguilla', ''),
(6, 4, 'Albania', ''),
(7, 3, 'Armenia', ''),
(8, 5, 'Netherlands Antilles', ''),
(9, 1, 'Angola', ''),
(10, 2, 'Antarctica', ''),
(11, 7, 'Argentina', ''),
(12, 6, 'American Samoa', ''),
(13, 4, 'Austria', ''),
(14, 6, 'Australia', ''),
(15, 5, 'Aruba', ''),
(16, 4, 'Aland', ''),
(17, 3, 'Azerbaijan', ''),
(18, 4, 'Bosnia and Herzegovina', ''),
(19, 5, 'Barbados', ''),
(20, 3, 'Bangladesh', ''),
(21, 4, 'Belgium', ''),
(22, 1, 'Burkina Faso', ''),
(23, 4, 'Bulgaria', ''),
(24, 3, 'Bahrain', ''),
(25, 1, 'Burundi', ''),
(26, 1, 'Benin', ''),
(27, 5, 'Saint Barthélemy', ''),
(28, 5, 'Bermuda', ''),
(29, 3, 'Brunei Darussalam', ''),
(30, 7, 'Bolivia', ''),
(31, 7, 'Brazil', ''),
(32, 5, 'Bahamas', ''),
(33, 3, 'Bhutan', ''),
(34, 2, 'Bouvet Island', ''),
(35, 1, 'Botswana', ''),
(36, 4, 'Belarus', ''),
(37, 5, 'Belize', ''),
(38, 5, 'Canada', ''),
(39, 3, 'Cocos (Keeling) Islands', ''),
(40, 1, 'Congo (Kinshasa)', ''),
(41, 1, 'Central African Republic', ''),
(42, 1, 'Congo (Brazzaville)', ''),
(43, 4, 'Switzerland', ''),
(44, 1, 'Côte d\'Ivoire', ''),
(45, 6, 'Cook Islands', ''),
(46, 7, 'Chile', ''),
(47, 1, 'Cameroon', ''),
(48, 3, 'China', ''),
(49, 7, 'Colombia', ''),
(50, 5, 'Costa Rica', ''),
(51, 5, 'Cuba', ''),
(52, 1, 'Cape Verde', ''),
(53, 3, 'Christmas Island', ''),
(54, 3, 'Cyprus', ''),
(55, 4, 'Czech Republic', ''),
(56, 4, 'Germany', ''),
(57, 1, 'Djibouti', ''),
(58, 4, 'Denmark', ''),
(59, 5, 'Dominica', ''),
(60, 5, 'Dominican Republic', ''),
(61, 1, 'Algeria', ''),
(62, 7, 'Ecuador', ''),
(63, 4, 'Estonia', ''),
(64, 1, 'Egypt', ''),
(65, 1, 'Western Sahara', ''),
(66, 1, 'Eritrea', ''),
(67, 4, 'Spain', ''),
(68, 1, 'Ethiopia', ''),
(69, 4, 'Finland', ''),
(70, 6, 'Fiji', ''),
(71, 7, 'Falkland Islands', ''),
(72, 6, 'Micronesia', ''),
(73, 4, 'Faroe Islands', ''),
(74, 4, 'France', ''),
(75, 1, 'Gabon', ''),
(76, 4, 'United Kingdom', ''),
(77, 5, 'Grenada', ''),
(78, 3, 'Georgia', ''),
(79, 7, 'French Guiana', ''),
(80, 4, 'Guernsey', ''),
(81, 1, 'Ghana', ''),
(82, 4, 'Gibraltar', ''),
(83, 5, 'Greenland', ''),
(84, 1, 'Gambia', ''),
(85, 1, 'Guinea', ''),
(86, 5, 'Guadeloupe', ''),
(87, 1, 'Equatorial Guinea', ''),
(88, 4, 'Greece', ''),
(89, 2, 'South Georgia and South Sandwich Islands', ''),
(90, 5, 'Guatemala', ''),
(91, 6, 'Guam', ''),
(92, 1, 'Guinea-Bissau', ''),
(93, 7, 'Guyana', ''),
(94, 3, 'Hong Kong', ''),
(95, 2, 'Heard and McDonald Islands', ''),
(96, 5, 'Honduras', ''),
(97, 4, 'Croatia', ''),
(98, 5, 'Haiti', ''),
(99, 4, 'Hungary', ''),
(100, 3, 'Indonesia', ''),
(101, 4, 'Ireland', ''),
(102, 3, 'Israel', ''),
(103, 4, 'Isle of Man', ''),
(104, 3, 'India', ''),
(105, 3, 'British Indian Ocean Territory', ''),
(106, 3, 'Iraq', ''),
(107, 3, 'Iran', ''),
(108, 4, 'Iceland', ''),
(109, 4, 'Italy', ''),
(110, 4, 'Jersey', ''),
(111, 5, 'Jamaica', ''),
(112, 3, 'Jordan', ''),
(113, 3, 'Japan', ''),
(114, 1, 'Kenya', ''),
(115, 3, 'Kyrgyzstan', ''),
(116, 3, 'Cambodia', ''),
(117, 6, 'Kiribati', ''),
(118, 1, 'Comoros', ''),
(119, 5, 'Saint Kitts and Nevis', ''),
(120, 3, 'Korea, North', ''),
(121, 3, 'Korea, South', ''),
(122, 3, 'Kuwait', ''),
(123, 5, 'Cayman Islands', ''),
(124, 3, 'Kazakhstan', ''),
(125, 3, 'Laos', ''),
(126, 3, 'Lebanon', ''),
(127, 5, 'Saint Lucia', ''),
(128, 4, 'Liechtenstein', ''),
(129, 3, 'Sri Lanka', ''),
(130, 1, 'Liberia', ''),
(131, 1, 'Lesotho', ''),
(132, 4, 'Lithuania', ''),
(133, 4, 'Luxembourg', ''),
(134, 4, 'Latvia', ''),
(135, 1, 'Libya', ''),
(136, 1, 'Morocco', ''),
(137, 4, 'Monaco', ''),
(138, 4, 'Moldova', ''),
(139, 4, 'Montenegro', ''),
(140, 5, 'Saint Martin (French part)', ''),
(141, 1, 'Madagascar', ''),
(142, 6, 'Marshall Islands', ''),
(143, 4, 'Macedonia', ''),
(144, 1, 'Mali', ''),
(145, 3, 'Myanmar', ''),
(146, 3, 'Mongolia', ''),
(147, 3, 'Macau', ''),
(148, 6, 'Northern Mariana Islands', ''),
(149, 5, 'Martinique', ''),
(150, 1, 'Mauritania', ''),
(151, 5, 'Montserrat', ''),
(152, 4, 'Malta', ''),
(153, 1, 'Mauritius', ''),
(154, 3, 'Maldives', ''),
(155, 1, 'Malawi', ''),
(156, 5, 'Mexico', ''),
(157, 3, 'Malaysia', ''),
(158, 1, 'Mozambique', ''),
(159, 1, 'Namibia', ''),
(160, 6, 'New Caledonia', ''),
(161, 1, 'Niger', ''),
(162, 6, 'Norfolk Island', ''),
(163, 1, 'Nigeria', ''),
(164, 5, 'Nicaragua', ''),
(165, 4, 'Netherlands', ''),
(166, 4, 'Norway', ''),
(167, 3, 'Nepal', ''),
(168, 6, 'Nauru', ''),
(169, 6, 'Niue', ''),
(170, 6, 'New Zealand', ''),
(171, 3, 'Oman', ''),
(172, 5, 'Panama', ''),
(173, 7, 'Peru', ''),
(174, 6, 'French Polynesia', ''),
(175, 6, 'Papua New Guinea', ''),
(176, 3, 'Philippines', ''),
(177, 3, 'Pakistan', ''),
(178, 4, 'Poland', ''),
(179, 5, 'Saint Pierre and Miquelon', ''),
(180, 6, 'Pitcairn', ''),
(181, 5, 'Puerto Rico', ''),
(182, 3, 'Palestine', ''),
(183, 4, 'Portugal', ''),
(184, 6, 'Palau', ''),
(185, 7, 'Paraguay', ''),
(186, 3, 'Qatar', ''),
(187, 1, 'Reunion', ''),
(188, 4, 'Romania', ''),
(189, 4, 'Serbia', ''),
(190, 4, 'Russian Federation', ''),
(191, 1, 'Rwanda', ''),
(192, 3, 'Saudi Arabia', ''),
(193, 6, 'Solomon Islands', ''),
(194, 1, 'Seychelles', ''),
(195, 1, 'Sudan', ''),
(196, 4, 'Sweden', ''),
(197, 3, 'Singapore', ''),
(198, 1, 'Saint Helena', ''),
(199, 4, 'Slovenia', ''),
(200, 4, 'Svalbard and Jan Mayen Islands', ''),
(201, 4, 'Slovakia', ''),
(202, 1, 'Sierra Leone', ''),
(203, 4, 'San Marino', ''),
(204, 1, 'Senegal', ''),
(205, 1, 'Somalia', ''),
(206, 7, 'Suriname', ''),
(207, 1, 'Sao Tome and Principe', ''),
(208, 5, 'El Salvador', ''),
(209, 3, 'Syria', ''),
(210, 1, 'Swaziland', ''),
(211, 5, 'Turks and Caicos Islands', ''),
(212, 1, 'Chad', ''),
(213, 2, 'French Southern Lands', ''),
(214, 1, 'Togo', ''),
(215, 3, 'Thailand', ''),
(216, 3, 'Tajikistan', ''),
(217, 6, 'Tokelau', ''),
(218, 3, 'Timor-Leste', ''),
(219, 3, 'Turkmenistan', ''),
(220, 1, 'Tunisia', ''),
(221, 6, 'Tonga', ''),
(222, 3, 'Turkey', ''),
(223, 5, 'Trinidad and Tobago', ''),
(224, 6, 'Tuvalu', ''),
(225, 3, 'Taiwan', ''),
(226, 1, 'Tanzania', ''),
(227, 4, 'Ukraine', ''),
(228, 1, 'Uganda', ''),
(229, 6, 'United States Minor Outlying Islands', ''),
(230, 5, 'United States of America', ''),
(231, 7, 'Uruguay', ''),
(232, 3, 'Uzbekistan', ''),
(233, 4, 'Vatican City', ''),
(234, 5, 'Saint Vincent and the Grenadines', ''),
(235, 7, 'Venezuela', ''),
(236, 5, 'Virgin Islands, British', ''),
(237, 5, 'Virgin Islands, U.S.', ''),
(238, 3, 'Vietnam', ''),
(239, 6, 'Vanuatu', ''),
(240, 6, 'Wallis and Futuna Islands', ''),
(241, 6, 'Samoa', ''),
(242, 3, 'Yemen', ''),
(243, 1, 'Mayotte', ''),
(244, 1, 'South Africa', ''),
(245, 1, 'Zambia', ''),
(246, 1, 'Zimbabwe', ''),
(247, 1, 'AAA', 'เอเอเอ'),
(248, 1, 'BBB', 'บีบีบี');

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE `image` (
  `img_id` int(11) NOT NULL,
  `img_type` varchar(100) NOT NULL,
  `img_refid` int(11) NOT NULL,
  `img_source` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`img_id`, `img_type`, `img_refid`, `img_source`) VALUES
(1, 'tour cover', 1, 'filestorage/image/tour/easy-boutique-myanmar-2pg-3d2n.jpg'),
(2, 'tour cover', 2, 'filestorage/image/tour/easy-shopping-in-macau.jpg'),
(3, 'tour cover', 3, 'filestorage/image/tour/easy-beautiful-tokyo-jun-jul17.jpg'),
(4, 'tour cover', 4, 'filestorage/image/tour/easy-package-ub01-chiang-mai-rangoon-3-nights-4-days.jpg'),
(5, 'tour cover', 5, 'filestorage/image/tour/hrepeak-hansa-papan.jpg'),
(6, 'tour cover', 6, 'filestorage/image/tour/test-1.jpg'),
(7, 'tour cover', 7, 'filestorage/image/tour/gg1.jpg'),
(8, 'tour cover', 8, 'filestorage/image/tour/test11.jpg'),
(9, 'tour cover', 9, 'filestorage/image/tour/asdasdasd.jpg'),
(10, 'tour cover', 10, 'filestorage/image/tour/asdasd.jpg'),
(11, 'tour cover', 12, 'filestorage/image/tour/asdasdasd.jpg'),
(12, 'tour cover', 13, 'filestorage/image/tour/aaaaa.jpg'),
(13, 'tour cover', 14, 'filestorage/image/tour/asdasdcc.jpg'),
(14, 'tour cover', 15, 'filestorage/image/tour/test1.jpg'),
(15, 'tour cover', 16, 'filestorage/image/tour/asdasd.jpg'),
(16, 'tour cover', 17, 'filestorage/image/tour/sdfsdf.jpg'),
(17, 'tour cover', 18, 'filestorage/image/tour/asdasdasd.jpg'),
(18, 'tour cover', 19, 'filestorage/image/tour/zxczxczxc.jpg'),
(19, 'tour cover', 20, 'filestorage/image/tour/.jpg'),
(20, 'tour cover', 21, 'filestorage/image/tour/setset.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `mapping`
--

CREATE TABLE `mapping` (
  `mapping_id` int(11) NOT NULL,
  `mapping_type` varchar(30) NOT NULL,
  `mapping_1` varchar(50) NOT NULL,
  `mapping_2` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mapping`
--

INSERT INTO `mapping` (`mapping_id`, `mapping_type`, `mapping_1`, `mapping_2`) VALUES
(1, 'room type', 'Single room', 'SGL'),
(2, 'room type', 'Twin room', 'Price'),
(3, 'room type', 'Tripple room', 'Price'),
(4, 'room type', 'Twin/Tripple room', 'Price'),
(5, 'room type', 'Childen with bed', 'CWB'),
(6, 'room type', 'Childen with out bed', 'CWOB');

-- --------------------------------------------------------

--
-- Table structure for table `nationality`
--

CREATE TABLE `nationality` (
  `nationality_id` int(11) NOT NULL,
  `nationality_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nationality`
--

INSERT INTO `nationality` (`nationality_id`, `nationality_name`) VALUES
(1, 'Andorran'),
(2, 'Emirian'),
(3, 'Afghan'),
(4, 'Antiguans, Barbudans'),
(5, 'Albanian'),
(6, 'Armenian'),
(7, 'Dutch'),
(8, 'Angolan'),
(9, 'Argentinean'),
(10, 'Austrian'),
(11, 'Australian'),
(12, 'Azerbaijani'),
(13, 'Bosnian, Herzegovinian'),
(14, 'Barbadian'),
(15, 'Bangladeshi'),
(16, 'Belgian'),
(17, 'Burkinabe'),
(18, 'Bulgarian'),
(19, 'Bahraini'),
(20, 'Burundian'),
(21, 'Beninese'),
(22, 'Bruneian'),
(23, 'Bolivian'),
(24, 'Brazilian'),
(25, 'Bahamian'),
(26, 'Bhutanese'),
(27, 'Batswana'),
(28, 'Belarusian'),
(29, 'Belizean'),
(30, 'Canadian'),
(31, 'Congolese'),
(32, 'Congolese'),
(33, 'Swiss'),
(34, 'Ivorian'),
(35, 'Cameroonian'),
(36, 'Chinese'),
(37, 'Colombian'),
(38, 'Costa Rican'),
(39, 'Cuban'),
(40, 'Cape Verdian'),
(41, 'Cypriot'),
(42, 'Czech'),
(43, 'German'),
(44, 'Djibouti'),
(45, 'Danish'),
(46, 'Dominican'),
(47, 'Dominican'),
(48, 'Algerian'),
(49, 'Ecuadorean'),
(50, 'Estonian'),
(51, 'Egyptian'),
(52, 'Eritrean'),
(53, 'Spanish'),
(54, 'Ethiopian'),
(55, 'Finnish'),
(56, 'Fijian'),
(57, 'French'),
(58, 'Gabonese'),
(59, 'Grenadian'),
(60, 'Georgian'),
(61, 'Ghanaian'),
(62, 'Gambian'),
(63, 'Guinean'),
(64, 'Equatorial Guinean'),
(65, 'Guatemalan'),
(66, 'Guinea-Bissauan'),
(67, 'Guyanese'),
(68, 'Hong Kong'),
(69, 'Honduran'),
(70, 'Croatian'),
(71, 'Haitian'),
(72, 'Hungarian'),
(73, 'Indonesian'),
(74, 'Irish'),
(75, 'Israeli'),
(76, 'Indian'),
(77, 'Iraqi'),
(78, 'Iranian'),
(79, 'Icelander'),
(80, 'Italian'),
(81, 'Jamaican'),
(82, 'Jordanian'),
(83, 'Japanese'),
(84, 'Kenyan'),
(85, 'Kirghiz'),
(86, 'Cambodian'),
(87, 'I-Kiribati'),
(88, 'Comoran'),
(89, 'Kittian, Nevisian'),
(90, 'North Korean'),
(91, 'South Korean'),
(92, 'Kuwaiti'),
(93, 'Central African'),
(94, 'Kazakhstani'),
(95, 'Laotian'),
(96, 'Lebanese'),
(97, 'Saint Lucian'),
(98, 'Liechtensteiner'),
(99, 'Sri Lankan'),
(100, 'Liberian'),
(101, 'Mosotho'),
(102, 'Lithuanian'),
(103, 'Luxembourger'),
(104, 'Latvian'),
(105, 'Libyan'),
(106, 'Moroccan'),
(107, 'Monegasque'),
(108, 'Moldovan'),
(109, 'Malagasy'),
(110, 'Marshallese'),
(111, 'Macedonian'),
(112, 'Malian'),
(113, 'Burmese'),
(114, 'Mauritanian'),
(115, 'Maltese'),
(116, 'Mauritian'),
(117, 'Maldivan'),
(118, 'Malawian'),
(119, 'Mexican'),
(120, 'Malaysian'),
(121, 'Mozambican'),
(122, 'Namibian'),
(123, 'Nigerien'),
(124, 'Nigerian'),
(125, 'Nicaraguan'),
(126, 'Dutch'),
(127, 'Norwegian'),
(128, 'Nepalese'),
(129, 'Nauruan'),
(130, 'New Zealander'),
(131, 'Omani'),
(132, 'Panamanian'),
(133, 'Peruvian'),
(134, 'Papua New Guinean'),
(135, 'Filipino'),
(136, 'Pakistani'),
(137, 'Polish'),
(138, 'Portuguese'),
(139, 'Palauan'),
(140, 'Paraguayan'),
(141, 'Qatari'),
(142, 'Romanian'),
(143, 'Serbian'),
(144, 'Russian'),
(145, 'Rwandan'),
(146, 'Saudi Arabian'),
(147, 'Solomon Islander'),
(148, 'Seychellois'),
(149, 'Sudanese'),
(150, 'Swedish'),
(151, 'Singaporean'),
(152, 'Slovene'),
(153, 'Slovak'),
(154, 'Sierra Leonean'),
(155, 'Sammarinese'),
(156, 'Senegalese'),
(157, 'Somali'),
(158, 'Surinamer'),
(159, 'Sao Tomean'),
(160, 'Salvadoran'),
(161, 'Syrian'),
(162, 'Swazi'),
(163, 'Chadian'),
(164, 'Togolese'),
(165, 'Thai'),
(166, 'Tadzhik'),
(167, 'East Timorese'),
(168, 'Turkmen'),
(169, 'Tunisian'),
(170, 'Tongan'),
(171, 'Turkish'),
(172, 'Trinidadian'),
(173, 'Tuvaluan'),
(174, 'Taiwanese'),
(175, 'Tanzanian'),
(176, 'Ukrainian'),
(177, 'Ugandan'),
(178, 'American'),
(179, 'Uruguayan'),
(180, 'Uzbekistani'),
(181, 'Venezuelan'),
(182, 'Vietnamese'),
(183, 'Ni-Vanuatu'),
(184, 'Samoan'),
(185, 'Yemeni'),
(186, 'South African'),
(187, 'Zambian'),
(188, 'Zimbabwean');

-- --------------------------------------------------------

--
-- Table structure for table `province`
--

CREATE TABLE `province` (
  `province_id` int(5) NOT NULL,
  `province_nameTH` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `province_nameEN` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `region_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `province`
--

INSERT INTO `province` (`province_id`, `province_nameTH`, `province_nameEN`, `region_id`) VALUES
(1, 'กรุงเทพมหานคร   ', 'Bangkok', 2),
(2, 'สมุทรปราการ   ', 'Samut Prakan', 2),
(3, 'นนทบุรี   ', 'Nonthaburi', 2),
(4, 'ปทุมธานี   ', 'Pathum Thani', 2),
(5, 'พระนครศรีอยุธยา   ', 'Phra Nakhon Si Ayutthaya', 2),
(6, 'อ่างทอง   ', 'Ang Thong', 2),
(7, 'ลพบุรี   ', 'Loburi', 2),
(8, 'สิงห์บุรี   ', 'Sing Buri', 2),
(9, 'ชัยนาท   ', 'Chai Nat', 2),
(10, 'สระบุรี', 'Saraburi', 2),
(11, 'ชลบุรี   ', 'Chon Buri', 5),
(12, 'ระยอง   ', 'Rayong', 5),
(13, 'จันทบุรี   ', 'Chanthaburi', 5),
(14, 'ตราด   ', 'Trat', 5),
(15, 'ฉะเชิงเทรา   ', 'Chachoengsao', 5),
(16, 'ปราจีนบุรี   ', 'Prachin Buri', 5),
(17, 'นครนายก   ', 'Nakhon Nayok', 2),
(18, 'สระแก้ว   ', 'Sa Kaeo', 5),
(19, 'นครราชสีมา   ', 'Nakhon Ratchasima', 3),
(20, 'บุรีรัมย์   ', 'Buri Ram', 3),
(21, 'สุรินทร์   ', 'Surin', 3),
(22, 'ศรีสะเกษ   ', 'Si Sa Ket', 3),
(23, 'อุบลราชธานี   ', 'Ubon Ratchathani', 3),
(24, 'ยโสธร   ', 'Yasothon', 3),
(25, 'ชัยภูมิ   ', 'Chaiyaphum', 3),
(26, 'อำนาจเจริญ   ', 'Amnat Charoen', 3),
(27, 'หนองบัวลำภู   ', 'Nong Bua Lam Phu', 3),
(28, 'ขอนแก่น   ', 'Khon Kaen', 3),
(29, 'อุดรธานี   ', 'Udon Thani', 3),
(30, 'เลย   ', 'Loei', 3),
(31, 'หนองคาย   ', 'Nong Khai', 3),
(32, 'มหาสารคาม   ', 'Maha Sarakham', 3),
(33, 'ร้อยเอ็ด   ', 'Roi Et', 3),
(34, 'กาฬสินธุ์   ', 'Kalasin', 3),
(35, 'สกลนคร   ', 'Sakon Nakhon', 3),
(36, 'นครพนม   ', 'Nakhon Phanom', 3),
(37, 'มุกดาหาร   ', 'Mukdahan', 3),
(38, 'เชียงใหม่   ', 'Chiang Mai', 1),
(39, 'ลำพูน   ', 'Lamphun', 1),
(40, 'ลำปาง   ', 'Lampang', 1),
(41, 'อุตรดิตถ์   ', 'Uttaradit', 1),
(42, 'แพร่   ', 'Phrae', 1),
(43, 'น่าน   ', 'Nan', 1),
(44, 'พะเยา   ', 'Phayao', 1),
(45, 'เชียงราย   ', 'Chiang Rai', 1),
(46, 'แม่ฮ่องสอน   ', 'Mae Hong Son', 1),
(47, 'นครสวรรค์   ', 'Nakhon Sawan', 2),
(48, 'อุทัยธานี   ', 'Uthai Thani', 2),
(49, 'กำแพงเพชร   ', 'Kamphaeng Phet', 2),
(50, 'ตาก   ', 'Tak', 4),
(51, 'สุโขทัย   ', 'Sukhothai', 2),
(52, 'พิษณุโลก   ', 'Phitsanulok', 2),
(53, 'พิจิตร   ', 'Phichit', 2),
(54, 'เพชรบูรณ์   ', 'Phetchabun', 2),
(55, 'ราชบุรี   ', 'Ratchaburi', 4),
(56, 'กาญจนบุรี   ', 'Kanchanaburi', 4),
(57, 'สุพรรณบุรี   ', 'Suphan Buri', 2),
(58, 'นครปฐม   ', 'Nakhon Pathom', 2),
(59, 'สมุทรสาคร   ', 'Samut Sakhon', 2),
(60, 'สมุทรสงคราม   ', 'Samut Songkhram', 2),
(61, 'เพชรบุรี   ', 'Phetchaburi', 4),
(62, 'ประจวบคีรีขันธ์   ', 'Prachuap Khiri Khan', 4),
(63, 'นครศรีธรรมราช   ', 'Nakhon Si Thammarat', 6),
(64, 'กระบี่   ', 'Krabi', 6),
(65, 'พังงา   ', 'Phangnga', 6),
(66, 'ภูเก็ต   ', 'Phuket', 6),
(67, 'สุราษฎร์ธานี   ', 'Surat Thani', 6),
(68, 'ระนอง   ', 'Ranong', 6),
(69, 'ชุมพร   ', 'Chumphon', 6),
(70, 'สงขลา   ', 'Songkhla', 6),
(71, 'สตูล   ', 'Satun', 6),
(72, 'ตรัง   ', 'Trang', 6),
(73, 'พัทลุง   ', 'Phatthalung', 6),
(74, 'ปัตตานี   ', 'Pattani', 6),
(75, 'ยะลา   ', 'Yala', 6),
(76, 'นราธิวาส   ', 'Narathiwat', 6),
(77, 'บึงกาฬ', 'Buogkan', 3),
(78, 'ดอนเมือง', 'Don meang', 1),
(79, 'กหดหกด', 'Don meangห', 1),
(80, 'ดอนนน', 'Donns', 1);

-- --------------------------------------------------------

--
-- Table structure for table `region`
--

CREATE TABLE `region` (
  `region_id` int(11) NOT NULL,
  `region_nameEN` varchar(20) NOT NULL,
  `region_nameTH` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `region`
--

INSERT INTO `region` (`region_id`, `region_nameEN`, `region_nameTH`) VALUES
(1, 'Northern', 'ภาคเหนือ'),
(2, 'Central', 'ภาคกลาง'),
(3, 'Northeast', 'ภาคตะวันออกเฉียงเหนือ'),
(4, 'Western', 'ภาคตะวันตก'),
(5, 'Eastern', 'ภาคตะวันออก'),
(6, 'Southern', 'ภาคใต้');

-- --------------------------------------------------------

--
-- Table structure for table `tour`
--

CREATE TABLE `tour` (
  `tour_id` int(11) NOT NULL,
  `tour_nationality` varchar(50) NOT NULL,
  `tour_nameTH` text,
  `tour_nameEN` text,
  `tour_nameSlug` varchar(100) NOT NULL,
  `tour_type` varchar(2) NOT NULL,
  `tour_overviewEN` text NOT NULL,
  `tour_overviewTH` text NOT NULL,
  `tour_descEN` text NOT NULL,
  `tour_descTH` text,
  `tour_briefingEN` text NOT NULL,
  `tour_briefingTH` text NOT NULL,
  `tour_imgCover` int(11) NOT NULL,
  `tour_pdf` varchar(40) NOT NULL,
  `tour_word` text NOT NULL,
  `tour_dayNight` varchar(5) NOT NULL,
  `tour_startPrice` float(8,2) NOT NULL,
  `tour_priceRange` text NOT NULL,
  `tour_privateGroup` tinyint(1) NOT NULL,
  `tour_privateGroupPrice` int(10) NOT NULL DEFAULT '0',
  `tour_discountRate` text,
  `tour_doublePack` tinyint(1) NOT NULL,
  `tour_minimum` int(5) NOT NULL,
  `tour_currency` varchar(10) NOT NULL,
  `tour_hilight` tinyint(1) NOT NULL,
  `tour_season` tinyint(1) NOT NULL,
  `tour_agentId` int(11) NOT NULL,
  `tour_openBooking` date NOT NULL,
  `tour_closeBooking` date NOT NULL,
  `tour_advanceBooking` int(11) NOT NULL,
  `tour_public` tinyint(1) NOT NULL DEFAULT '0',
  `tour_remove` tinyint(1) NOT NULL DEFAULT '1',
  `address_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tour`
--

INSERT INTO `tour` (`tour_id`, `tour_nationality`, `tour_nameTH`, `tour_nameEN`, `tour_nameSlug`, `tour_type`, `tour_overviewEN`, `tour_overviewTH`, `tour_descEN`, `tour_descTH`, `tour_briefingEN`, `tour_briefingTH`, `tour_imgCover`, `tour_pdf`, `tour_word`, `tour_dayNight`, `tour_startPrice`, `tour_priceRange`, `tour_privateGroup`, `tour_privateGroupPrice`, `tour_discountRate`, `tour_doublePack`, `tour_minimum`, `tour_currency`, `tour_hilight`, `tour_season`, `tour_agentId`, `tour_openBooking`, `tour_closeBooking`, `tour_advanceBooking`, `tour_public`, `tour_remove`, `address_id`) VALUES
(1, 'international tour', 'พม่า-ย่างกุ้ง-หงสาวดี-พระธาตุอินทร์แขวน 3 วัน 2 คืน', 'Easy boutique myanmar 2(PG) 3D2N', 'easy-boutique-myanmar-2pg-3d2n', 'sp', 'Slow life at Myanmar', 'ชีวิตง่ายๆ สบายๆ ที่พม่า', '<p><strong>CU Center</strong></p>\r\n\r\n<p>This price does not include guide + driver cost 500 Baht per person per trip throughout the trip.<br />\r\nBefore making a booking Should read the terms of travel thoroughly. Until satisfied Then place a deposit for your own benefit.</p>\r\n\r\n<p><strong>Travel may change as appropriate without prior notice. Due to weather conditions and travel situations at the moment, but to take into account the safety of travel. And the benefits of the squad are significant. Without lowering the standard of service.</strong></p>\r\n', '<p><strong>CU Center</strong></p>\r\n\r\n<p>ราคานี้ไม่รวมค่าไกด์ + คนขับตลอดการเดินทาง ท่านละ 500 บาท/ท่านตลอดทริป</p>\r\n\r\n<p>ก่อนตัดสินใจจองทัวร์ ควรอ่านเงื่อนไขการเดินทางอย่างถ่องแท้ จนเป็นที่พอใจ แล้วจึงวางมัดจำเพื่อประโยชน์ของท่านเอง</p>\r\n\r\n<p><strong>การเดินทางอาจเปลี่ยนแปลงได้ตามความเหมาะสมโดยไม่แจ้งให้ทราบล่วงหน้า ทั้งนี้เนื่องจากสภาพ ลม ฟ้า อากาศ และสถานการณ์ในการเดินทางขณะนั้นแต่จะคำนึงถึงความปลอดภัยในการเดินทาง และผลประโยชน์ของหมู่คณะเป็นสำคัญ โดยไม่ทำให้มาตรฐานของการบริการลดน้อยลง</strong></p>\r\n\r\n<p><strong>อัตราค่าบริการนี้รวม</strong></p>\r\n\r\n<ul>\r\n	<li>ค่าตั๋วเครื่องบินไป-กลับ ตามเที่ยวบินที่ระบุในรายการท่องเที่ยว</li>\r\n	<li>ค่าภาษีสนามบิน ภาษีน้ำมัน</li>\r\n	<li>ค่าห้องพักโรงแรม (ห้องละ 2 หรือ 3 ท่าน) ตามที่ระบุในรายการท่องเที่ยวหรือระดับเดียวกัน</li>\r\n	<li>ค่าอาหาร ค่าเข้าชม และค่ายานพาหนะทุกชนิดตามที่ระบุในรายการท่องเที่ยว</li>\r\n	<li>ค่าใช้จ่ายมัคคุเทศก์ / หัวหน้าทัวร์ ที่คอยอำนวยความสะดวกตลอดการเดินทาง</li>\r\n	<li>ค่าประกันอุบัติเหตุประเภท Medical Insurance คุ้มครองในระหว่างการเดินทาง วงเงิน 1,000,000 บาท</li>\r\n</ul>\r\n\r\n<p><strong>อัตราค่าบริการนี้ไม่รวม</strong></p>\r\n\r\n<ul>\r\n	<li>ค่าธรรมเนียมในการทำหนังสือเดินทาง หรือเอกสารต่างด้าวต่างๆ</li>\r\n	<li>ค่าระวางกระเป๋าน้ำหนักเกินกว่าที่สายการบินกำหนด</li>\r\n	<li>ค่าธรรมเนียมวีซ่า</li>\r\n	<li>ค่าใช้จ่ายส่วนตัว เช่น อาหาร-เครื่องดื่ม นอกเหนือจากรายการท่องเที่ยว ค่าซักรีด ค่าโทรศัพท์ มินิบาร์และทีวีช่องพิเศษของโรงแรม เป็นต้น</li>\r\n	<li>ค่าภาษีมูลค่าเพิ่มและภาษีหัก ณ ที่จ่ายของแต่ละประเทศ</li>\r\n	<li><strong>ทิปไกด์และคนขับรถ</strong><strong> ท่านละ </strong><strong>500บาท/ท่าน/ทริป (สำหรับหัวหน้าทัวร์แล้วแต่จะพอใจในการบริการ)</strong></li>\r\n</ul>\r\n\r\n<p><br />\r\n<strong>เงื่อนไขการชำระเงิน</strong></p>\r\n\r\n<ul>\r\n	<li>ชำระค่ามัดจำ ท่านละ 5,000 บาท หลังจากทำการจองภายใน 3 วัน</li>\r\n</ul>\r\n\r\n<p>(ช่วงเทศกาลมัดจำท่านละ 10,000 บาท)</p>\r\n\r\n<ul>\r\n	<li>ชำระเงินค่าทัวร์ส่วนที่เหลือภายใน 21 วัน ก่อนออกเดินทาง</li>\r\n</ul>\r\n\r\n<p><strong>เงื่อนไขการยกเลิก</strong></p>\r\n\r\n<ul>\r\n	<li>ยกเลิกก่อนการเดินทาง 30 วัน ทางบริษัทฯ ขอสงวนสิทธิ์ในการยึดมัดจำเต็มจำนวน</li>\r\n	<li>ยกเลิกก่อนการเดินทาง 21 วัน ทางบริษัทฯ ขอสงวนสิทธิ์เก็บค่าใช้จ่าย 100% ของราคาทัวร์ทั้งหมด</li>\r\n	<li>กรณีกรุ๊ปที่เดินทางช่วงวันหยุด เทศกาลต่างๆ เช่น ปีใหม่ สงกรานต์ เป็นต้น ทางบริษัทฯ ต้องมีการการันตีมัดจำที่นั่งกับทางสายการบิน รวมถึงเที่ยวบินพิเศษ เช่น Charter Flight และโรงแรมที่พักต่างๆ ทางบริษัทฯ ขอสงวนสิทธิ์ไม่คืนค่ามัดจำ หรือ ค่าทัวร์ทั้งหมด ไม่ว่ายกเลิกกรณีใดก็ตาม</li>\r\n	<li>เมื่อออกตั๋วแล้ว <strong>หากท่านมีเหตุบางประการทำให้เดินทางไม่ได้</strong> <strong>ไม่สามารถขอคืนค่าตั๋วได้</strong> เนื่องจากเป็นนโยบายของสายการบิน</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>หมายเหตุ</strong></p>\r\n\r\n<ul>\r\n	<li>บริษัทฯ ขอสงวนสิทธิ์ที่จะเลื่อนการเดินทาง หรือ เปลี่ยนแปลงราคา ในกรณีที่ผู้เดินทางไม่ถึง 30 คนขึ้นไป</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>ในกรณีที่สายการบินประการปรับขึ้นภาษีน้ำมัน ทางบริษัทฯ ขอสงวนสิทธิ์ในการเรียกเก็บค่าภาษีน้ำมันเพิ่มตามความเป็นจริง</li>\r\n	<li>ตั๋วเครื่องบินที่ออกเป็นกรุ๊ปไม่สามารถเลื่อนวันเดินทางหรือขอคืนเงินได้</li>\r\n	<li>บริษัทฯ ขอสงวนสิทธิ์ที่จะเปลี่ยนแปลง หรือสลับรายการท่องเที่ยวตามความเหมาะสม ในกรณีที่เกิดเหตุสุดวิสัย หรือเหตุการณ์ที่อยู่เหนือการควบคุมของบริษัทฯ โดยบริษัทฯ จะคำนึงถึงความปลอดภัยและผลประโยชน์ของคณะผู้เดินทางเป็นหลัก</li>\r\n	<li>บริษัทฯ จะไม่รับผิดชอบใดๆ ทั้งสิน หากเกิดเหตุการณ์สุดวิสัย เช่น ความล่าช้าจากสายการบิน การยกเลิกเที่ยวบิน การเมือง การประท้วง การนัดหยุดงาน การก่อจลาจล ปัญหาจราจร อุบัติเหตุ ภัยธรรมชาติ หรือทรัพย์สินสูญหายอันเนื่องมาจากความประมาทของตัวท่านเอง หรือจากการโจรกรรม และอุบัติเหตุจากความประมาทของตัวท่านเอง</li>\r\n	<li>กรณีที่สถานที่ท่องเที่ยวใดๆ ที่ไม่สามารถเข้าชมได้เนื่องจากเหตุสุดวิสัย สภาพอากาศ เหตุการณ์ที่อยู่เหนือการควบคุมของบริษัทฯ เป็นต้น บริษัทฯ ขอสงวนสิทธิ์ไม่คืนค่าใช้จ่ายใดๆ ทั้งสิ้น</li>\r\n	<li>กรณีที่ท่านสละสิทธิ์ในการใช้บริการใดๆ หรือไม่เข้าชมสถานที่ใดๆ ก็ตามที่ระบุในรายการท่องเที่ยว หรือไม่เดินทางพร้อมคณะ ทางบริษัทฯ ขอสงวนสิทธิ์ไม่คืนค่าใช้จ่ายไม่ว่ากรณีใดๆ ทั้งสิ้น</li>\r\n	<li>กรณีที่กองตรวจคนเข้าเมืองทั้งในประเทศไทย และในต่างประเทศมีปฏิเสธมิให้เดินทางเข้า-ออกตามประเทศที่ระบุไว้&nbsp; เนื่องจากการครอครองสิ่งผิดกฎหมาย สิ่งของต้องห้าม เอกสารเดินทางไม่ถูกต้อง หรือไม่ว่าด้วยเหตุผลใดๆ ก็ตามบริษัทฯ ขอสงวนสิทธิ์ที่จะไม่คืนค่าทัวร์ไม่ว่ากรณีใดก็ตาม</li>\r\n	<li>กรณีที่ท่านใช้หนังสือเดินทางราชการ (เล่มสีน้ำเงิน) เดินทางเพื่อการท่องเที่ยวกับคณะทัวร์ หากท่านถูกปฏิเสธในการเข้า-ออกประเทศใดๆ ก็ตาม ทางบริษัทฯ ขอสงวนสิทธิ์ไม่คืนค่าทัวร์และรับผิดชอบใดๆ ทั้งสิ้น</li>\r\n	<li>เมื่อท่านตกลงชำระเงินมัดจำหรือค่าทัวร์ทั้งหมดแล้ว ทางบริษัทฯ จะถือว่าท่านได้ยอมรับเงื่อนไขข้อตกลงต่างๆ ทั้งหมด</li>\r\n</ul>\r\n', '<p><strong>D1 -</strong>&nbsp;Bangkok (Suvarnabhumi) - Yangon - Sweets - Scottish Market - Bota Town Tomb - The Immaculate - The Whispers - Shwedagon Pagoda</p>\r\n\r\n<p><strong>D2 -</strong>&nbsp;Marble Temple - Changpuak - Bago City - Schodiddha Pagoda - Bungong Palace - Ji-pagoda Pagoda - Phra Chavalit - Phra Moo Slide - Phra That In Hung (including car relics)</p>\r\n\r\n<p><strong>D3 -</strong>&nbsp;Wat Kiyai Yai - Mengalong Dong Airport - Bangkok</p>\r\n', '<p><strong>D1 -</strong>&nbsp;กรุงเทพฯ (สุวรรณภูมิ)-ย่างกุ้ง &ndash; พระตาหวาน-ตลาดสก๊อต &nbsp;&ndash; เจดีย์โบตาทาวน์ &ndash; เทพทันใจ &ndash;เทพกระซิบ &ndash; &nbsp; เจดีย์ชเวดากอง</p>\r\n\r\n<p><strong>D2 -</strong><strong>&nbsp;</strong>พระหินอ่อน&ndash;ช้างเผือก&ndash;เมืองบะโค-เจดีย์ชเวมอดอร์ &ndash; พระราชวังบุเรงนอง-เจดีย์ไจ้ปุ่น&ndash; &nbsp;พระนอนชเวตาเลียว&ndash;พระไฝเลื่อน &ndash; พระธาตุอินทร์แขวน(รวมรถขึ้นพระธาตุ)</p>\r\n\r\n<p><strong>D3 -</strong>&nbsp;วัดไจ้คะวาย -ท่าอากาศยานมิงกาลาดง &ndash; กรุงเทพฯ</p>\r\n', 1, 'easy-boutique-myanmar-2pg-3d2n.pdf', 'easy-boutique-myanmar-2pg-3d2n..doc', '3,2', 13900.00, '[{\"from\":\"2017-04-28\",\"to\":\"2017-04-30\",\"price\":11900},{\"from\":\"2017-05-05\",\"to\":\"2017-05-07\",\"price\":15900},{\"from\":\"2017-05-11\",\"to\":\"2017-05-13\",\"price\":13900},{\"from\":\"2017-05-19\",\"to\":\"2017-05-21\",\"price\":12900},{\"from\":\"2017-05-25\",\"to\":\"2017-05-27\",\"price\":13900},{\"from\":\"2017-05-26\",\"to\":\"2017-05-28\",\"price\":13900}]', 0, 0, NULL, 0, 0, 'THB', 1, 0, 1, '0000-00-00', '2017-05-28', 0, 1, 0, 1),
(2, 'international tour', 'มาเก๊า จูไห่ 3 วัน 2 คืน เดินทางเดือน  พ.ค. – ส.ค. 60', 'Easy shopping in Macau', 'easy-shopping-in-macau', 'sp', 'Travel by Thai AirAsia. Load 20 kg bag', 'การเดินทางโดย บริษัท ไทยแอร์เอเชีย ใส่ถุง 20 กก', '<ul>\r\n	<li>watch Guan Yin Located by the sea. Made of bronze.</li>\r\n	<li>worship the temple or the big man known as The goddess Ruby</li>\r\n	<li>Senado Square Shopping Product Center</li>\r\n	<li>The Venetian Macau&#39;s luxury casino hotel</li>\r\n	<li>The Lover&#39;s Road, a romantic beach road.</li>\r\n	<li>Shopping Kong Gong Market Shopping center, air-conditioned, over 5,000 stores</li>\r\n	<li>Yuan Ming Palace Created for the Yuan Ming Palace in Beijing.</li>\r\n	<li>Superb show Yuan Ming Yuan Show To tell the story of China&#39;s history.</li>\r\n	<li>special !!! Abalone menu and red wine</li>\r\n</ul>\r\n', '<ul>\r\n	<li>ชม <strong>องค์เจ้าแม่กวนอิม</strong>&nbsp;ตั้งอยู่บริเวณริมทะเล สร้างด้วยทองสัมฤทธิ์ทั้งองค์</li>\r\n	<li>สักการะ<strong> วัดอาม่า</strong> หรือที่คนใหญ่รู้จักกันในนามของ เจ้าแม่ทับทิม</li>\r\n	<li>ช้อปปิ้ง&nbsp;<strong>เซนาโด้สแควร์</strong>&nbsp;ศูนย์รวมสินค้ามากมาย</li>\r\n	<li><strong>เดอะเวเนเชี่ยน</strong> &nbsp;โรงแรมคาสิโนสุดหรูของมาเก๊า</li>\r\n	<li><strong>ถนนคู่รัก</strong><strong> The Lover&rsquo;s Road</strong> ซึ่งเป็นถนนเลียบชายหาดที่แสนจะโรแมนติก</li>\r\n	<li><strong>ช้อปปิ้งตลาดกงเป๋ย</strong> แหล่งช้อปปิ้งศูนย์การค้าติดแอร์ 5,000 กว่า ร้านค้า</li>\r\n	<li><strong>พระราชวังหยวนหมิง</strong> สร้างขึ้นแทนพระราชวังเก่าหยวนหมิง ณ กรุงปักกิ่ง</li>\r\n	<li><strong>โชว์สุดอลังการ โชว์หยวนหมิงหยวน</strong> ที่จะบอกเรื่องราวประวัติศาสตร์ของจีน</li>\r\n	<li><strong>พิเศษ!!! เมนูเป๋าฮื้อ และไวน์แดง</strong></li>\r\n</ul>\r\n', '<p><strong>D1 -</strong> Bangkok - Macau - Guan Yin by the sea - Temple of the Apa - St. Paul&#39;s Cathedral - Senado Square - Venezuela - Macau native snack shop - Zhuhai</p>\r\n\r\n<p><strong>D2 - </strong>Zhuhai - Lovers&#39; Road - Zhuhai Fisher Girl - Jade Shop - Snow Lotus Shop - Chinese Silk Shop - Gong Bee Monastery - Yuan Ming Palace - Yuan Show Ming - Special !!! Menu served with red wine - with red wine.</p>\r\n\r\n<p><strong>D3 -</strong> Zhuhai - Macau - Bangkok</p>\r\n', '<p><strong>D1 -</strong>&nbsp;กรุงเทพ - มาเก๊า - เจ้าแม่กวนอิมริมทะเล - วัดอาม่า - โบสถ์เซ็นต์ปอล - เซนาโด้สแควร์ - เวเนเซีย - ร้านขนมพื้นเมืองมาเก๊า - จูไห่</p>\r\n\r\n<p><strong>D2 -</strong>&nbsp;จูไห่ - ถนนคู่รัก - จูไห่ฟิชเชอร์เกิร์ล - ร้านหยก - ร้านบัวหิมะ - ร้านผ้าไหมจีน - วัดผู้ก่อ - ช้องปิ้งกงเป๋ย - พระราชวังหยวนหมิง - ชมโชว์หยวนหมิง - พิเศษ!!! เมนูเป่าฮื้อเสิร์ฟ - พร้อมไวน์แดง</p>\r\n\r\n<p><strong>D3 -&nbsp;</strong>จูไห่ - มาเก๊า - กรุงเทพ</p>\r\n', 2, 'easy-shopping-in-macau.pdf', '', '3,2', 7900.00, '[{\"from\":\"2017-05-04\",\"to\":\"2017-05-06\",\"price\":8900},{\"from\":\"2017-05-05\",\"to\":\"2017-05-07\",\"price\":8900},{\"from\":\"2017-05-12\",\"to\":\"2017-05-14\",\"price\":8900},{\"from\":\"2017-04-14\",\"to\":\"2017-04-16\",\"price\":7900},{\"from\":\"2017-05-19\",\"to\":\"2017-05-21\",\"price\":7900},{\"from\":\"2017-05-21\",\"to\":\"2017-05-23\",\"price\":7900},{\"from\":\"2017-05-26\",\"to\":\"2017-05-28\",\"price\":7900}]', 0, 0, NULL, 0, 0, 'THB', 1, 0, 1, '0000-00-00', '2017-05-28', 0, 1, 0, 2),
(3, 'international tour', 'ทัวร์ญี่ปุ่นโตเกียว ฟูจิ  5 วัน 3 คืน ', 'EASY BEAUTIFUL TOKYO [JUN-JUL17]', 'easy-beautiful-tokyo-jun-jul17', 'sp', 'Stay 1 night Narita 2 nights / Free one day Travel by SCOOT AIRLINES, load 20 kg. Boeing 787 Dreamliner', 'พักออนเซ็น 1 คืน นาริตะ 2 คืน / อิสระฟรีเดย์ 1 วัน เดินทางโดยสายการบิน SCOOT AIRLINES โหลดกระเป๋าได้ 20 กิโลกรัม เครื่องลำใหญ่ Boeing 787 Dreamliner', '<ul>\r\n	<li>Fuji Volcano Cultural World Heritage Site Sacred Place and Artistic Inspiration</li>\r\n	<li>worship Narita Sun temple blessing for prosperity.</li>\r\n	<li>Oshinohakai Village It is a village with a well which was caused by the melting of snow on Mount Fuji.</li>\r\n	<li>Fuji Volcano Cultural World Heritage Site Sacred Place and Artistic Inspiration</li>\r\n	<li>One day free shopping at Shinjuku, Harajuku, Shibuya, Japan&#39;s premier shopping district.</li>\r\n	<li>experience Mineral water bath onsen Let you relax fatigue.</li>\r\n	<li>special !!! Giant crab legs and Free Wi-Fi throughout the journey.</li>\r\n</ul>\r\n', '<ul>\r\n	<li>มรดกโลกทางวัฒนธรรม ภูเขาไฟฟูจิ สถานที่ศักดิ์สิทธิ์และแหล่งบันดาลใจทางศิลปะ</li>\r\n	<li>สักการะ วัดนาริตะซัน ขอพรเพื่อความเป็นสิริมงคล</li>\r\n	<li>หมู่บ้านโอชิโนะฮัคไค &nbsp;เป็นหมู่บ้านที่มีบ่อน้ำซึ่งเกิดจากการละลายของหิมะบนภูเขาไฟฟูจิ</li>\r\n	<li>มรดกโลกทางวัฒนธรรม ภูเขาไฟฟูจิ สถานที่ศักดิ์สิทธิ์และแหล่งบันดาลใจทางศิลปะ</li>\r\n	<li>อิสระ 1 วัน ให้ช้อปปิ้งจุใจ ย่านชินจุกุ ย่านฮาราจุกุ ย่านชิบูย่า แหล่งช้อปปิ้งชั้นนำของญี่ปุ่น</li>\r\n	<li>สัมผัสประสบการณ์ อาบน้ำแร่ออนเซ็น ให้ท่านได้ผ่อนคลายความเมื่อยล้า</li>\r\n	<li>พิเศษ!!! ขาปูยักษ์ และ Free Wi-Fi ตลอดการเดินทาง</li>\r\n</ul>\r\n', '<p><strong>D1 -</strong> Bangkok - Tokyo</p>\r\n\r\n<p><strong>D2 -</strong> Narita Temple - Dong Nai Doe Temple - Asakusa Temple - Tokyo Sky Tree Scenic Spot - Hot Water Bath</p>\r\n\r\n<p>D3 - Fuji Volcano 5th Floor (depending on climate) - Clear Water Village Ochino Hachkae - Tokyo Earthquake Museum - Shinjuku Shopping</p>\r\n\r\n<p><strong>D4 -</strong> Free at leisure or you can buy Tokyo Disneyland tickets.</p>\r\n\r\n<p><br />\r\n<strong>D5 -</strong> Narita Airport - Bangkok</p>\r\n', '<p>D1 - กรุงเทพ - โตเกียว</p>\r\n\r\n<p>D2 - วัดนาริตะ - ร้องดองกี้โฮเต้ - วัดอาซากุสะ - จุดชมวิว Tokyo Sky Tree - แช่น้ำร้อน</p>\r\n\r\n<p>D3 - ภูเขาไฟฟูจิชั้น 5 (ขึ้นอยู่กับสภาพภูมิอากาศ) - หมู่บ้านน้ำใสโอชิโนะฮัคไค - พิพิธภัณฑ์แผ่นดินไหวโตเกียว &ndash; ช้อปปิ้งชินจุกุ</p>\r\n\r\n<p>D4 - อิสระตามอัธยาศัย หรือ ท่านสามารถเลือกซื้อตั๋ว Tokyo Disneyland</p>\r\n\r\n<p><br />\r\nD5 - สนามบินนาริตะ &ndash; กรุงเทพฯ</p>\r\n', 3, '', '', '5,4', 23900.00, '[{\"from\":\"2017-06-03\",\"to\":\"2017-06-07\",\"price\":26900},{\"from\":\"2017-06-06\",\"to\":\"2017-06-10\",\"price\":26900},{\"from\":\"2017-06-09\",\"to\":\"2017-06-13\",\"price\":25900},{\"from\":\"2017-07-09\",\"to\":\"2017-07-13\",\"price\":27900},{\"from\":\"2017-07-12\",\"to\":\"2017-07-16\",\"price\":25900},{\"from\":\"2017-07-18\",\"to\":\"2017-07-22\",\"price\":24900},{\"from\":\"2017-07-21\",\"to\":\"2017-07-25\",\"price\":25900},{\"from\":\"2017-07-27\",\"to\":\"2017-07-31\",\"price\":25900}]', 0, 0, NULL, 0, 0, 'THB', 1, 0, 1, '0000-00-00', '2017-07-31', 0, 1, 0, 3),
(4, 'international tour', 'เชียงใหม่ - ย่างกุ้ง 3 คืน 4 วัน', 'Easy Package UB01 Chiang Mai - Rangoon 3 Nights 4 Days', 'easy-package-ub01-chiang-mai-rangoon-3-nights-4-days', 'ep', 'By airline ... Myanmar National Airlines', 'โดยสายการบิน...Myanmar National Airlines', '<p>This rate includes</p>\r\n\r\n<ul>\r\n	<li>Chiang Mai - Chiang Mai - Chiang Mai by Myanmar National Airline</li>\r\n	<li>Half-stay accommodation</li>\r\n	<li>food items</li>\r\n	<li>Accident insurance fee (Personal Accident) amount of 1,000,000 baht per person.</li>\r\n	<li>Accident medical expense (Baht 500,000)</li>\r\n</ul>\r\n\r\n<p>This rate is not included.</p>\r\n\r\n<ul>\r\n	<li>visa fee for foreigners (Thai people do not use visas)</li>\r\n	<li>Car travel throughout the trip.</li>\r\n	<li>In-room minibar And other expenses beyond the specified items.</li>\r\n</ul>\r\n\r\n<p><strong>Travel Documents: Passports valid for at least 6 months</strong></p>\r\n', '<p>อัตรานี้รวม</p>\r\n\r\n<ul>\r\n	<li>ค่าตัว๋ เครื่องบินเชียงใหม่ &ndash; ย่างกงุ้ &ndash; เชียงใหม่ โดยสายการบิน Myanmar National Airline</li>\r\n	<li>ค่าโรงแรมที่พัก 3 คืน (Half Twin Sharing )</li>\r\n	<li>ค่าอาหารตามรายการ</li>\r\n	<li>ค่าประกันอุบัติเหตกุ ารเดินทาง (Personal Accident) วงเงินท่านละ 1,000,000 บาท</li>\r\n	<li>ค่ารักษา พยาบาล(Accident medical Expense) วงเงินท่านละ 500,000 บาท</li>\r\n</ul>\r\n\r\n<p>อัตรานี้ไม่รวม</p>\r\n\r\n<ul>\r\n	<li>ค่าวีซ่าสา หรับคนต่างชาติ (คนไทยไม่ใช้วีซ่า)</li>\r\n	<li>ค่ารถเดินทางตลอดทริป</li>\r\n	<li>ค่ามินิบาร์ในห้องพัก และค่าใช้จ่ายอื่น ๆ นอกเหนือรายการที่ระบุ</li>\r\n</ul>\r\n\r\n<p><strong>เอกสารในการเดินทาง : พาสปอร์ต ที่มีอายเุ หลือใช้งานได้ไม่น้อยกว่า 6 เดือน</strong></p>\r\n', '<p><strong>D1 - </strong>Chiang Mai - Rangoon</p>\r\n\r\n<p><strong>D2 - </strong>Rangoon</p>\r\n\r\n<p><strong>D3 - </strong>Rangoon</p>\r\n\r\n<p><strong>D4 - </strong>Rangoon - Chiang Mai</p>\r\n', '<p><strong>D1 - </strong>เชียงใหม่ - ย่างกุ้ง</p>\r\n\r\n<p><strong>D2 - </strong>ย่างกุ้ง</p>\r\n\r\n<p><strong>D3 - </strong>ย่างกุ้ง</p>\r\n\r\n<p><strong>D4 -</strong> ย่างกุ้ง - เชียงใหม่</p>\r\n', 4, 'easy-package-ub01-chiang-mai-rangoon-3-n', '', '4,3', 6500.00, '[{\"from\":\"2017-11-04\",\"to\":\"2017-11-07\",\"price\":6900},{\"from\":\"2017-11-11\",\"to\":\"2017-11-14\",\"price\":6900},{\"from\":\"2017-11-18\",\"to\":\"2017-11-21\",\"price\":6900},{\"from\":\"2017-11-25\",\"to\":\"2017-11-28\",\"price\":6900}]', 0, 0, NULL, 0, 2, 'THB', 1, 0, 1, '0000-00-00', '2017-11-28', 0, 1, 0, 4),
(5, 'international tour', 'เกาะหลีเป๊ะหรรษาพาเพลิน', 'Hrepeak Hansa Papan', 'hrepeak-hansa-papan', 'ep', 'Hrepeck Wow Wow Wow', 'เกาะหลีเปะ ว๊าว ว๊าว ว๊าว', '<p>Wow Wow Wow</p>\r\n', '<p>ว๊าว ว๊าว ว๊าว</p>\r\n', '<p>D1 - Wow Wow Wow</p>\r\n', '<p>วันที่ 1 ว๊าว ว๊าว ว๊าว</p>\r\n', 5, '', '', '3,2', 9900.00, '[{\"from\":\"2017-05-09\",\"to\":\"2017-05-11\",\"price\":9900},{\"from\":\"2017-05-11\",\"to\":\"2017-05-13\",\"price\":9900}]', 0, 0, NULL, 0, 0, 'THB', 0, 0, 1, '0000-00-00', '2017-05-13', 0, 0, 1, 5),
(18, 'thailand domestic tour', 'asdasdasd', 'asdasdasd', 'asdasdasd', 'ep', 'ghfghfgh', 'asdasd', '<p>fghgfh</p>\r\n', '<p>kjhkjh</p>\r\n', '<p>sdfsdfsdf</p>\r\n', '<p>jkhkjhkjh</p>\r\n', 18, '', '', '2,1', 9900.00, '[{\"from\":\"2017-05-09\",\"to\":\"2017-05-10\",\"price\":9900}]', 0, 0, NULL, 0, 0, 'THB', 0, 0, 1, '0000-00-00', '2017-05-10', 0, 1, 0, 20),
(19, 'thailand domestic tour', 'asdasdasd', 'zxczxczxc', 'zxczxczxc', 'sp', 'sadasd', 'ฟหกฟหก', '<p>adsd</p>\r\n', '<p>ฟหก</p>\r\n', '<p>asdasd</p>\r\n', '<p>ฟกฟหก</p>\r\n', 19, '', '', '2,1', 9900.00, '[{\"from\":\"2017-05-03\",\"to\":\"2017-05-05\",\"price\":9900}]', 0, 0, NULL, 0, 0, 'THB', 0, 0, 1, '0000-00-00', '2017-05-05', 0, 0, 1, 21),
(20, 'thailand domestic tour', '้ดเ้ดเอิื', 'หกดหกดปแอ', '', 'sp', 'หดหกด', 'ฟหฟหกกดเ', '<p>หกดหกด</p>\r\n', '<p>ฟกหๆไำ</p>\r\n', '<p>หกดหกด</p>\r\n', '<p>ฟหกฟหกเกด</p>\r\n', 20, '', '', '2,1', 8000.00, '[{\"from\":\"2017-05-03\",\"to\":\"2017-05-05\",\"price\":8900}]', 0, 0, NULL, 0, 0, 'THB', 0, 0, 1, '0000-00-00', '2017-05-05', 0, 0, 0, 22),
(21, 'international tour', 'res', 'setset', 'setset', 'ep', 'sdasd', 'ฟหกฟหก', '<p>sdasd</p>\r\n', '<p>ฟหกฟหก</p>\r\n', '<p>asdasd</p>\r\n', '<p>กฟหก</p>\r\n', 21, '', '', '3,2', 8900.00, '[{\"from\":\"2017-05-11\",\"to\":\"2017-05-13\",\"price\":9900}]', 0, 0, NULL, 0, 0, 'THB', 0, 0, 1, '0000-00-00', '2017-05-13', 0, 0, 0, 23);

-- --------------------------------------------------------

--
-- Table structure for table `tour_address`
--

CREATE TABLE `tour_address` (
  `ta_id` int(11) NOT NULL,
  `tour_id` int(11) NOT NULL,
  `address_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tour_address`
--

INSERT INTO `tour_address` (`ta_id`, `tour_id`, `address_id`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 3, 3),
(4, 4, 4),
(5, 5, 5),
(6, 6, 6),
(7, 7, 7),
(8, 8, 8),
(9, 9, 9),
(10, 10, 10),
(11, 12, 12),
(12, 13, 13),
(13, 14, 14),
(14, 15, 15),
(15, 21, 23);

-- --------------------------------------------------------

--
-- Table structure for table `tour_condition`
--

CREATE TABLE `tour_condition` (
  `tc_id` int(11) NOT NULL,
  `tour_id` int(11) NOT NULL,
  `tc_condition` varchar(8) DEFAULT NULL,
  `tc_price` float(8,2) DEFAULT NULL,
  `tc_type` varchar(20) NOT NULL,
  `tc_title` text,
  `tc_data` text NOT NULL,
  `tc_order` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tour_condition`
--

INSERT INTO `tour_condition` (`tc_id`, `tour_id`, `tc_condition`, `tc_price`, `tc_type`, `tc_title`, `tc_data`, `tc_order`) VALUES
(5, 2, 'increase', 3000.00, 'room', NULL, '[{\"roomtype\":\"Single room\",\"roomdetail\":\"\"}]', 1),
(6, 2, 'increase', 4000.00, 'option', NULL, 'Have tourist 2-18 yrs', 1),
(14, 3, 'increase', 7900.00, 'room', NULL, '[{\"roomtype\":\"Single room\",\"roomdetail\":\"\"}]', 1),
(15, 3, 'increase', 6900.00, 'room', NULL, '[{\"roomtype\":\"Children < 2 yrs\",\"roomdetail\":\"\"}]', 2),
(16, 3, 'decrease', 4000.00, 'option', NULL, 'Joyland does not use plane tickets.', 1),
(32, 14, 'increase', 500.00, 'room', NULL, '[{\"roomtype\":\"Single room\",\"roomdetail\":\"\"}]', 1),
(36, 1, 'increase', 3500.00, 'room', NULL, '[{\"roomtype\":\"Single room\",\"roomdetail\":\"\"}]', 1),
(37, 1, 'increase', 1000.00, 'option', NULL, 'ล่องเรือ', 1),
(38, 1, 'decrease', 5000.00, 'option', NULL, 'ไม่เอาตั๋ว', 2),
(41, 4, NULL, NULL, 'hotel', NULL, '[{\"name\":\"Holly Hotel\",\"star\":3,\"locationEN\":\"Near Airport\",\"locationTH\":\"Near Airport\",\"room\":[{\"roomtype\":\"Twin room\",\"price\":0,\"extension\":500},{\"roomtype\":\"Single room\",\"price\":2500,\"extension\":900}]},{\"name\":\"Up Town\",\"star\":3,\"locationEN\":\"Near Down Town\",\"locationTH\":\"Near Down Town\",\"room\":[{\"roomtype\":\"Twin room\",\"price\":0,\"extension\":500},{\"roomtype\":\"Single room\",\"price\":2500,\"extension\":900}]},{\"name\":\"Summit Park View\",\"star\":4,\"locationEN\":\"Near Shwedagon\",\"locationTH\":\"Near Shwedagon\",\"room\":[{\"roomtype\":\"Twin room\",\"price\":0,\"extension\":900},{\"roomtype\":\"Single room\",\"price\":3500,\"extension\":1200}]},{\"name\":\"Vintage Luxury Yacht\",\"star\":5,\"locationEN\":\"Near Botataung\",\"locationTH\":\"Near Botataung\",\"room\":[{\"roomtype\":\"Twin room\",\"price\":0,\"extension\":1000},{\"roomtype\":\"Single room\",\"price\":3500,\"extension\":1300}]}]', 1),
(43, 18, NULL, NULL, 'hotel', NULL, '[{\"name\":\"Holly Hotel\",\"star\":3,\"locationEN\":\"Near Airport\",\"locationTH\":\"Near Airport\",\"room\":[{\"roomtype\":\"Twin room\",\"price\":0,\"extension\":500},{\"roomtype\":\"Single room\",\"price\":2500,\"extension\":900}]}]', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`address_id`);

--
-- Indexes for table `agent`
--
ALTER TABLE `agent`
  ADD PRIMARY KEY (`agent_id`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`booking_id`),
  ADD UNIQUE KEY `booking_code` (`booking_code`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`client_id`),
  ADD UNIQUE KEY `client_email` (`client_email`);

--
-- Indexes for table `continent`
--
ALTER TABLE `continent`
  ADD PRIMARY KEY (`continent_id`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`country_id`);

--
-- Indexes for table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`img_id`);

--
-- Indexes for table `mapping`
--
ALTER TABLE `mapping`
  ADD PRIMARY KEY (`mapping_id`);

--
-- Indexes for table `nationality`
--
ALTER TABLE `nationality`
  ADD PRIMARY KEY (`nationality_id`);

--
-- Indexes for table `province`
--
ALTER TABLE `province`
  ADD PRIMARY KEY (`province_id`);

--
-- Indexes for table `region`
--
ALTER TABLE `region`
  ADD PRIMARY KEY (`region_id`);

--
-- Indexes for table `tour`
--
ALTER TABLE `tour`
  ADD PRIMARY KEY (`tour_id`),
  ADD UNIQUE KEY `tour_nameSlug` (`tour_nameSlug`);

--
-- Indexes for table `tour_address`
--
ALTER TABLE `tour_address`
  ADD PRIMARY KEY (`ta_id`);

--
-- Indexes for table `tour_condition`
--
ALTER TABLE `tour_condition`
  ADD PRIMARY KEY (`tc_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `address_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `agent`
--
ALTER TABLE `agent`
  MODIFY `agent_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `client_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `continent`
--
ALTER TABLE `continent`
  MODIFY `continent_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `country_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=249;
--
-- AUTO_INCREMENT for table `image`
--
ALTER TABLE `image`
  MODIFY `img_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `mapping`
--
ALTER TABLE `mapping`
  MODIFY `mapping_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `nationality`
--
ALTER TABLE `nationality`
  MODIFY `nationality_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=189;
--
-- AUTO_INCREMENT for table `province`
--
ALTER TABLE `province`
  MODIFY `province_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;
--
-- AUTO_INCREMENT for table `region`
--
ALTER TABLE `region`
  MODIFY `region_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tour`
--
ALTER TABLE `tour`
  MODIFY `tour_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `tour_address`
--
ALTER TABLE `tour_address`
  MODIFY `ta_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `tour_condition`
--
ALTER TABLE `tour_condition`
  MODIFY `tc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
