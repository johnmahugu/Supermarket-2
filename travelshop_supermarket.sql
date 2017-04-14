-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 28, 2017 at 05:54 AM
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
  `address_no` text,
  `address_province` varchar(50) NOT NULL,
  `address_region` varchar(50) NOT NULL,
  `address_continent` varchar(50) NOT NULL,
  `address_country` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=tis620;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`address_id`, `address_no`, `address_province`, `address_region`, `address_continent`, `address_country`) VALUES
(3, NULL, 'Hongkong', 'Central', 'Asia', 'Hongkong'),
(4, NULL, 'Tokyo', 'Central', 'Asia', 'Japan'),
(5, NULL, 'Bagan', 'Central', 'Asia', 'Myanmar'),
(6, NULL, 'Osaka', 'Central', 'Asia', 'Japan'),
(10, NULL, 'Mandalay', 'Central', 'Asia', 'Myanmar'),
(11, NULL, 'Inwa', 'Central', 'Asia', 'Myanmar'),
(12, NULL, 'Kyoto', 'Central', 'Asia', 'Japan'),
(13, NULL, 'Nagoya', 'Central', 'Asia', 'Japan'),
(14, NULL, 'Fuji', 'Central', 'Asia', 'Japan'),
(15, NULL, 'Taoyuan', 'Central', 'Asia', 'Taiwan'),
(16, NULL, 'Phuket', 'South', 'Asia', 'Thailand'),
(17, NULL, 'Taipei', 'Central', 'Asia', 'Taiwan'),
(18, NULL, 'Taitung', 'Northern', 'Asia', 'Taiwan'),
(19, NULL, 'Yehliu', 'Northern', 'Asia', 'Taiwan'),
(20, NULL, 'Jiufen', 'Northern', 'Asia', 'Taiwan');

-- --------------------------------------------------------

--
-- Table structure for table `agent`
--

CREATE TABLE `agent` (
  `agent_id` int(11) NOT NULL,
  `agent_code` varchar(5) NOT NULL,
  `agent_compName` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=tis620;

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
  `booking_detail` text NOT NULL,
  `booking_lastupdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `booking_status` varchar(20) NOT NULL,
  `booking_price` float(8,2) NOT NULL,
  `booking_discount` float(8,2) NOT NULL,
  `booking_paidleft` float(8,2) NOT NULL,
  `booking_currency` varchar(3) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=tis620;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`booking_id`, `booking_code`, `client_id`, `tour_id`, `booking_detail`, `booking_lastupdate`, `booking_status`, `booking_price`, `booking_discount`, `booking_paidleft`, `booking_currency`) VALUES
(3, 'ITSC0100040001', 72, 4, '{\"room\":[{\"Single room\":\"1\"}],\"date\":[{\"start\":\"2017-04-04\",\"end\":\"2017-04-08\"}],\"tourist\":[{\"totaltourist\":\"1\"}],\"total_amount\":[{\"amount\":\"37800\"}],\"touristinfo\":[{\"fullname\":\"test1 test11\",\"tel\":\"12352456\",\"passportImg\":\"0.jpeg\",\"passportNo\":\"12354312\",\"dob\":\"2017-03-05\"}]}', '2017-03-27 20:50:54', 'booking', 37800.00, 0.00, 0.00, 'THB'),
(4, 'ITSC0100040002', 73, 4, '{\"room\":[{\"Single room\":\"1\"}],\"date\":[{\"start\":\"2017-04-04\",\"end\":\"2017-04-08\"}],\"tourist\":[{\"totaltourist\":\"1\"}],\"total_amount\":[{\"amount\":\"37800\"}],\"touristinfo\":[{\"fullname\":\"test2 test22\",\"tel\":\"0928521478\",\"passportImg\":\"0.jpeg\",\"passportNo\":\"23514625365894\",\"dob\":\"2017-02-27\"}]}', '2017-03-27 20:51:38', 'booking', 37800.00, 0.00, 0.00, 'THB'),
(5, 'ITSC0100040003', 74, 4, '{\"room\":[{\"Single room\":\"1\"}],\"date\":[{\"start\":\"2017-03-26\",\"end\":\"2017-03-30\"}],\"tourist\":[{\"totaltourist\":\"1\"}],\"total_amount\":[{\"amount\":\"37800\"}],\"touristinfo\":[{\"fullname\":\"test3 test33\",\"tel\":\"12352456\",\"passportImg\":\"0.jpeg\",\"passportNo\":\"23514625365894\",\"dob\":\"2017-01-02\"}]}', '2017-03-27 20:54:37', 'booking', 37800.00, 0.00, 0.00, 'THB');

-- --------------------------------------------------------

--
-- Table structure for table `booking_paid`
--

CREATE TABLE `booking_paid` (
  `paid_id` int(11) NOT NULL,
  `booking_id` int(11) NOT NULL,
  `paid_isPledge` tinyint(1) NOT NULL,
  `paid_amount` double NOT NULL,
  `paid_currency` varchar(30) NOT NULL,
  `paid_gateway` varchar(100) NOT NULL,
  `paid_status` varchar(50) NOT NULL,
  `paid_date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=tis620;

-- --------------------------------------------------------

--
-- Table structure for table `car`
--

CREATE TABLE `car` (
  `car_id` int(11) NOT NULL,
  `car_agency` varchar(200) NOT NULL,
  `car_name` varchar(200) NOT NULL,
  `car_colour` varchar(50) NOT NULL,
  `car_capability` int(11) NOT NULL,
  `car_type` varchar(50) NOT NULL COMMENT 'Normal,Boat,Alphard',
  `car_status` varchar(10) NOT NULL,
  `car_plate` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=tis620;

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `city_id` int(11) NOT NULL,
  `city_name` varchar(200) NOT NULL COMMENT 'ไทย|eng',
  `city_country` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=tis620;

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
) ENGINE=MyISAM DEFAULT CHARSET=tis620;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`client_id`, `client_type`, `client_tel`, `client_email`, `client_password`, `client_imgMain`, `client_firstName`, `client_middleName`, `client_lastName`, `client_gender`, `client_dob`, `client_address`, `client_nationality`, `client_passportNumber`, `client_passportRefImg`, `client_identificationNumber`, `client_lineId`, `client_agency_id`) VALUES
(2, 'agent', '095125365', 'agent_1@gg.com', '123456789', NULL, 'AgentFirstName', NULL, 'AgentLastNAme', 'F', '1984-03-01', NULL, 'Thai', '4534538', '2', '17594231512', NULL, 1),
(72, 'normal', '12352456', 'test1@mail.com', '12352456', NULL, 'test1', NULL, 'test11', '', '2017-03-05', 'fghgfh', 'albanian', '12354312', '72', NULL, '123123', NULL),
(73, 'normal', '0928521478', 'test2@mail.com', '0928521478', NULL, 'test2', NULL, 'test22', '', '2017-02-27', 'bvnvbn', 'algerian', '23514625365894', '73', NULL, '12358353', NULL),
(74, 'normal', '12352456', 'test3@mail.com', '12352456', NULL, 'test3', NULL, 'test33', '', '2017-01-02', 'dfgdfg', 'belarusian', '23514625365894', '74', NULL, 'line1', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `content`
--

CREATE TABLE `content` (
  `content_id` int(11) NOT NULL,
  `content_name` text NOT NULL,
  `content_detailTH` text NOT NULL,
  `content_detailEN` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=tis620;

-- --------------------------------------------------------

--
-- Table structure for table `discount`
--

CREATE TABLE `discount` (
  `discount_id` int(11) NOT NULL,
  `discount_type` varchar(20) NOT NULL,
  `discount_rate` double NOT NULL,
  `discount_isPercent` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=tis620;

-- --------------------------------------------------------

--
-- Table structure for table `entrance`
--

CREATE TABLE `entrance` (
  `ent_id` int(11) NOT NULL,
  `ent_name` varchar(200) NOT NULL,
  `ent_detail` text NOT NULL,
  `city_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=tis620;

-- --------------------------------------------------------

--
-- Table structure for table `exchangerate`
--

CREATE TABLE `exchangerate` (
  `ex_id` int(11) NOT NULL,
  `ex_currency` varchar(60) NOT NULL,
  `ex_shortcurrency` varchar(3) NOT NULL,
  `ex_tocurrency` varchar(3) NOT NULL COMMENT 'short currency',
  `ex_rate` double NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=tis620;

-- --------------------------------------------------------

--
-- Table structure for table `flight`
--

CREATE TABLE `flight` (
  `flight_id` int(11) NOT NULL,
  `plane_id` int(11) NOT NULL,
  `flight_code` varchar(20) NOT NULL,
  `flight_origin` varchar(200) NOT NULL,
  `flight_destination` int(200) NOT NULL,
  `flight_durationtime` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=tis620;

-- --------------------------------------------------------

--
-- Table structure for table `freerate`
--

CREATE TABLE `freerate` (
  `fr_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `fr_upTo` int(11) NOT NULL,
  `fr_freePax` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=tis620;

-- --------------------------------------------------------

--
-- Table structure for table `guide`
--

CREATE TABLE `guide` (
  `guide_id` int(11) NOT NULL,
  `guide_name` varchar(100) NOT NULL,
  `guide_sex` varchar(5) NOT NULL,
  `guide_imgRef` varchar(100) NOT NULL,
  `guide_status` varchar(30) NOT NULL,
  `guide_detail` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=tis620;

-- --------------------------------------------------------

--
-- Table structure for table `guide_language`
--

CREATE TABLE `guide_language` (
  `glang_id` int(11) NOT NULL,
  `guide_id` int(11) NOT NULL,
  `language_id` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=tis620;

-- --------------------------------------------------------

--
-- Table structure for table `guide_service`
--

CREATE TABLE `guide_service` (
  `gservice_id` int(11) NOT NULL,
  `guide_id` int(11) NOT NULL,
  `gservice_type` varchar(100) NOT NULL,
  `city_id` int(11) NOT NULL,
  `gservice_price` int(11) NOT NULL,
  `gservice_pricCurr` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=tis620;

-- --------------------------------------------------------

--
-- Table structure for table `hotel`
--

CREATE TABLE `hotel` (
  `hotel_id` int(11) NOT NULL,
  `hotel_name` varchar(200) NOT NULL,
  `hotel_star` tinyint(1) NOT NULL,
  `hotel_status` tinyint(1) NOT NULL,
  `city_id` int(11) NOT NULL,
  `hotel_fulladdress` text NOT NULL,
  `hotel_detail` text NOT NULL,
  `hotel_IsGIT` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=tis620;

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE `image` (
  `img_id` int(11) NOT NULL,
  `img_type` varchar(100) NOT NULL,
  `img_refid` int(11) NOT NULL,
  `img_source` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=tis620;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`img_id`, `img_type`, `img_refid`, `img_source`) VALUES
(3, 'tour cover', 3, 'filestorage/image/tour/3.jpg'),
(4, 'tour cover', 4, 'filestorage/image/tour/4.jpg'),
(5, 'tour cover', 5, 'filestorage/image/tour/5.jpg'),
(6, 'tour cover', 6, 'filestorage/image/tour/6.jpg'),
(7, 'tour cover', 7, 'filestorage/image/tour/7.jpg'),
(8, 'tour cover', 8, 'filestorage/image/tour/8.jpg'),
(9, 'tour cover', 9, 'filestorage/image/tour/9.jpg'),
(10, 'tour cover', 10, 'filestorage/image/tour/10.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `item_id` int(11) NOT NULL,
  `item_category` varchar(50) NOT NULL,
  `item_FK_id` int(11) NOT NULL,
  `item_desc` text,
  `item_guidePrice` double DEFAULT NULL,
  `item_guidePrice_cc` varchar(50) DEFAULT NULL,
  `item_costs` double NOT NULL,
  `item_costs_cc` varchar(50) DEFAULT NULL,
  `item_price_B2C` double NOT NULL,
  `item_price_B2B` double NOT NULL,
  `item_freeRate` int(11) DEFAULT NULL,
  `item_startDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `item_endDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=tis620;

-- --------------------------------------------------------

--
-- Table structure for table `language`
--

CREATE TABLE `language` (
  `language_id` int(11) NOT NULL,
  `language_name` varchar(60) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=tis620;

-- --------------------------------------------------------

--
-- Table structure for table `meal`
--

CREATE TABLE `meal` (
  `meal_id` int(11) NOT NULL,
  `restaurant_id` int(11) NOT NULL,
  `meal_type` varchar(100) NOT NULL,
  `meal_name` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=tis620;

-- --------------------------------------------------------

--
-- Table structure for table `other`
--

CREATE TABLE `other` (
  `other_id` int(11) NOT NULL,
  `other_type` varchar(100) NOT NULL,
  `other_detail` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=tis620;

-- --------------------------------------------------------

--
-- Table structure for table `plan`
--

CREATE TABLE `plan` (
  `plan_id` int(11) NOT NULL,
  `tour_id` int(11) NOT NULL,
  `plan_order` int(11) NOT NULL,
  `plan_type` varchar(20) NOT NULL,
  `plan_typeId` int(11) NOT NULL,
  `plan_shortDetail` text NOT NULL,
  `plan_day` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=tis620;

-- --------------------------------------------------------

--
-- Table structure for table `plane`
--

CREATE TABLE `plane` (
  `plane_id` int(11) NOT NULL,
  `plane_code` varchar(20) NOT NULL,
  `plane_airline` varchar(100) NOT NULL COMMENT 'ไทย|eng',
  `plane_capability` int(11) NOT NULL,
  `plane_OriginCountry` varchar(100) NOT NULL COMMENT 'ไทย|eng'
) ENGINE=MyISAM DEFAULT CHARSET=tis620;

-- --------------------------------------------------------

--
-- Table structure for table `price_ranges`
--

CREATE TABLE `price_ranges` (
  `pr_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `pr_from` int(11) NOT NULL,
  `pr_to` int(11) NOT NULL,
  `pr_costs` int(11) NOT NULL,
  `pr_B2C` int(11) NOT NULL,
  `pr_B2B` int(11) NOT NULL,
  `pr_type` varchar(20) NOT NULL,
  `pr_nationalityRate` double NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=tis620;

-- --------------------------------------------------------

--
-- Table structure for table `restaurant`
--

CREATE TABLE `restaurant` (
  `restaurant_id` int(11) NOT NULL,
  `restaurant_name` varchar(200) NOT NULL,
  `restaurant_tel` varchar(20) NOT NULL,
  `restaurant_imgRef` varchar(100) NOT NULL,
  `restaurant_status` varchar(20) NOT NULL,
  `city_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=tis620;

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `room_id` int(11) NOT NULL,
  `hotel_id` int(11) NOT NULL,
  `room_type` varchar(50) NOT NULL,
  `room_name` varchar(100) NOT NULL,
  `room_detail` text NOT NULL,
  `room_size` int(11) NOT NULL,
  `room_facilities` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=tis620;

-- --------------------------------------------------------

--
-- Table structure for table `route`
--

CREATE TABLE `route` (
  `route_id` int(11) NOT NULL,
  `car_id` int(11) NOT NULL,
  `route_start` varchar(200) NOT NULL,
  `route_end` varchar(200) NOT NULL,
  `route_estTime` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=tis620;

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staff_id` int(11) NOT NULL,
  `staff_username` varchar(50) NOT NULL,
  `staff_password` varchar(50) NOT NULL,
  `staff_rank` int(11) NOT NULL,
  `staff_firstname` varchar(50) NOT NULL,
  `staff_middlename` varchar(50) NOT NULL,
  `staff_lastname` varchar(50) NOT NULL,
  `staff_sex` varchar(5) NOT NULL,
  `staff_address` mediumtext NOT NULL,
  `staff_email` varchar(100) NOT NULL,
  `staff_nationality` varchar(30) NOT NULL,
  `staff_passportNumber` varchar(30) NOT NULL,
  `staff_identificationNumber` varchar(30) NOT NULL,
  `staff_imgMain` varchar(100) NOT NULL,
  `staff_groupId` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=tis620;

-- --------------------------------------------------------

--
-- Table structure for table `staffgroup`
--

CREATE TABLE `staffgroup` (
  `staff_groupId` int(11) NOT NULL,
  `staff_groupName` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=tis620;

-- --------------------------------------------------------

--
-- Table structure for table `tour`
--

CREATE TABLE `tour` (
  `tour_id` int(11) NOT NULL,
  `tour_nameTH` text,
  `tour_nameEN` text,
  `tour_type` varchar(2) NOT NULL,
  `tour_overview` text NOT NULL,
  `tour_desc` text NOT NULL,
  `tour_briefing` text NOT NULL,
  `tour_imgCover` int(11) NOT NULL,
  `tour_pdf` varchar(40) NOT NULL,
  `tour_dayNight` varchar(5) NOT NULL,
  `tour_startPrice` float(8,2) NOT NULL,
  `tour_priceRange` text NOT NULL,
  `tour_privateGroup` tinyint(1) NOT NULL,
  `tour_discountRate` text,
  `tour_doublePack` tinyint(1) NOT NULL,
  `tour_currency` varchar(3) NOT NULL,
  `tour_isHilight` tinyint(1) NOT NULL,
  `tour_season` tinyint(1) NOT NULL,
  `tour_agentId` int(11) NOT NULL,
  `tour_openBooking` date NOT NULL,
  `tour_closeBooking` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=tis620;

--
-- Dumping data for table `tour`
--

INSERT INTO `tour` (`tour_id`, `tour_nameTH`, `tour_nameEN`, `tour_type`, `tour_overview`, `tour_desc`, `tour_briefing`, `tour_imgCover`, `tour_pdf`, `tour_dayNight`, `tour_startPrice`, `tour_priceRange`, `tour_privateGroup`, `tour_discountRate`, `tour_doublePack`, `tour_currency`, `tour_isHilight`, `tour_season`, `tour_agentId`, `tour_openBooking`, `tour_closeBooking`) VALUES
(3, 'ฮ่องกง นอนปิง', 'Easy amazing hongkong by CX', 'sp', 'ทัวร์ฮ่องกง ? พระใหญ่นองปิง 3 วัน 2 คืน\r\nเดินทางโดยสายการบิน CATHAY PACIFIC โหลดกระเป๋าได้ 30 กิโลกรัม\r\nพิเศษ !!! บริการอาหารร้อนและเครื่องดื่มบนเครื่อง', '<ul>\n<li>นั่งกระเช้านองปิง สักการะพระใหญ่พระพุทธรูปนั่งปรางสมาธิทองสัมฤทธิ์</li>\n<li>ช้อปปิ้ง CITY GATE OUTLET  ศูนย์รวมสินค้ามากมาย</li>\n<li>ชมวัดแชกงหมิว (วัดกังหัน) สิ่งศักสิทธิ์ที่นิยมที่สุดในฮ่องกง</li>\n<li>ชม REPULSE BAY หาดทรายรูปจันทร์เสี้ยว</li>\n<li>ชม VICTORIA  PEAK  จุดชมวิวที่สวยที่สุดในฮ่องกง</li>\n<li>นั่ง รถรางพีคแทรม ขึ้นสู่จุดชมวิวเดอะพีค</li>\n<li>ช๊อปปิ้ง ย่านจิมซาจุ่ยและโอเซี่ยนเทอร์มินอล สนุกสนานกับการเลือกสินค้าราคาพิเศษ</li>\n<li>อิสระเต็มอิ่มกับการช๊อปปิ้งตามอัธยาศัย</li>\n<li>พิเศษ !!!  เมนู ติ่มซำ ซาลาเปา ขนมจีบ โจ๊กฮ่องกง</li></ul><br>\n<b>ก่อนตัดสินใจจองทัวร์ ควรอ่านเงื่อนไขการเดินทางอย่างถ่องแท้ แล้วจึงวางมัดจำ \nเพื่อประโยชน์ของท่านเอง</b><br>\nการเดินทางในแต่ละครั้งจะต้องมีผู้เดินทางจำนวน 25 ท่านขึ้นไป\nถ้าผู้เดินทางไม่ครบจำนวนดังกล่าว บริษัทฯ ขอสงวนสิทธิ์ในการ เลื่อนการเดินทาง หรือ เปลี่ยนแปลงราคา<br>\n<b>ยังไม่รวมค่าทิปไกด์ และคนขับรถท่านละ 120 HKD ตลอดทริป</b><br>\nกรุณาชำระมัดจำท่านละ 5,000 บาท ภายใน 3 วันหลังจากที่ทำการจอง \nหากไม่ชำระภายในวันที่กำหนด ทางบริษัทขออนุญาตตัดที่นั่งตามเงื่อนไข\n\n', '[{\"route\":\"กรุงเทพฯ ? ฮ่องกง ? หมูบ้านนองปิง ? อิสระช้อปปิ้ง City Gate Outlet\",\"hotel\":\"MK HOTEL / CRUISE HOTEL\"},{\"route\":\"ติ่มซำ ? วัดแชกงหมิว ? จุดชมวิววิคตอเรียพีค ? รถรางขึ้นพีคแทรม ? หาดรีพลัสเบย์ ? โรงงานจิวเวอรี่ ? ช้อปปิ้งจิมซาจุ่ยและโอเชี่ยนเทอร์มินอล\",\"hotel\":\"MK HOTEL / CRUISE HOTEL\",\"route\":\"อิสระตามอัธยาศัย ? กรุงเทพฯ\",\"hotel\":\"\"}]', 3, '3.pdf', '3,2', 14900.00, '[{ \"from\": \"2017-03-19\", \"to\": \"2017-03-21\", \"price\": 13900},\n { \"from\": \"2017-03-25\", \"to\": \"2017-03-27\", \"price\": 13900}\n ]', 0, NULL, 0, 'THB', 0, 0, 1, '2017-03-19', '2017-03-27'),
(4, 'ญี่ปุ่น โตเกียว ฟูจิ 5 วัน 3 คืน', 'Easy Beautiful Tokyo(mar-apr\'17)', 'sp', 'พักออนเซ็น 1 คืน นาริตะ 2 คืน / อิสระฟรีเดย์ 1 วัน<br>\r\nเดินทางโดยสายการบิน SCOOT AIRLINES โหลดกระเป๋าได้ 20 กิโลกรัม<br>\r\nเครื่องลำใหญ่ Boeing 787 Dreamliner\r\n', '<ul>\r\n<li>มรดกโลกทางวัฒนธรรม ภูเขาไฟฟูจิ สถานที่ศักดิ์สิทธิ์และแหล่งบันดาลใจทางศิลปะ</li>\r\n<li>สักการะ วัดนาริตะซัน ขอพรเพื่อความเป็นสิริมงคล</li>\r\n<li>หมู่บ้านโอชิโนะฮัคไค  เป็นหมู่บ้านที่มีบ่อน้ำซึ่งเกิดจากการละลายของหิมะบนภูเขาไฟฟูจิ</li>\r\n<li>มรดกโลกทางวัฒนธรรม ภูเขาไฟฟูจิ สถานที่ศักดิ์สิทธิ์และแหล่งบันดาลใจทางศิลปะ</li>\r\n<li>อิสระ 1 วัน ให้ช้อปปิ้งจุใจ ย่านชินจุกุ ย่านฮาราจุกุ ย่านชิบูย่า แหล่งช้อปปิ้งชั้นนำของญี่ปุ่น</li>\r\n<li>สัมผัสประสบการณ์ อาบน้ำแร่ออนเซ็น ให้ท่านได้ผ่อนคลายความเมื่อยล้า</li>\r\n<li>พิเศษ!!! ขาปูยักษ์ และ Free Wi-Fi ตลอดการเดินทาง</li>\r\n<li>ช่วงเทศกาลซากุระ (ประมาณปลายเดือนมี.ค. ? ต้นเดือนเม.ย.) นำท่านชมซากุระบานสะพรั่งที่สวนอุเอโนะ</li>\r\n<br>\r\n<b>ก่อนตัดสินใจจองทัวร์ ควรอ่านเงื่อนไขการเดินทางอย่างถ่องแท้ แล้วจึงวางมัดจำ \r\nเพื่อประโยชน์ของท่านเอง</b>\r\n<i>การเดินทางในแต่ละครั้งจะต้องมีผู้เดินทางจำนวน 30 ท่านขึ้นไป\r\nถ้าผู้เดินทางไม่ครบจำนวนดังกล่าว บริษัทฯ ขอสงวนสิทธิ์ในการ เลื่อนการเดินทาง หรือ เปลี่ยนแปลงราคา\r\n</i>\r\n<br>\r\n1. โรงแรมที่ญี่ปุ่นห้องค่อนข้างเล็ก และบางโรงแรมไม่มีห้องสำหรับนอน 3 ท่าน ท่านอาจจะต้องพักเป็นห้องที่นอน 2 ท่าน และห้องที่นอน 1 ท่าน (แยกเป็น 2 ห้อง) และในกรณีที่พัก 2 ท่าน บางโรงแรมอาจจะไม่มีเตียงทวิน ทางบริษัทขอสงวนสิทธิ์ในการจัดห้องพักเป็นเตียงดับเบิ้ลสำหรับนอน 2 ท่าน\r\n2. รายการท่องเที่ยวอาจมีการสลับหรือเปลี่ยนแปลงได้ตามความเหมาะสมโดยมิแจ้งให้ทราบล่วงหน้า\r\nในกรณีที่มีเหตุการณ์สุดวิสัย หรือภัยธรรมชาติ หรือเหตุการณ์ที่ไม่ได้อยู่ภายใต้การควบคุมของบริษัทฯ \r\nเนื่องจากบริษัทรถทัวร์ของญี่ปุ่นสามารถใช้รถได้ 12 ชั่วโมง / วัน หากเกิดเหตุการณ์สุดวิสัย ทางบริษัทของสงวนสิทธิ์ในการสลับหรือเปลี่ยนแปลงโปรแกรมตามความเหมาะสม ทั้งนี้ บริษัทฯ จะคำนึงถึงความปลอดภัย ตลอดจนผลประโยชน์ของคณะเป็นสำคัญ\r\n<br>\r\n<br>\r\n<b>ยังไม่รวมค่าทิปไกด์ และคนขับรถท่านละ 120 HKD ตลอดทริป</b>\r\n<br>\r\n<br>\r\nกรุณาชำระมัดจำท่านละ 5,000 บาท ภายใน 3 วันหลังจากที่ทำการจอง \r\nหากไม่ชำระภายในวันที่กำหนด ทางบริษัทขออนุญาตตัดที่นั่งตามเงื่อนไข\r\n<br>\r\n<br>\r\n<u>ยังไม่รวมค่าทิปไกด์ และคนขับรถท่านละ 3,000 เยน ตลอดทริป \r\nกรุณาชำระมัดจำท่านละ 15,000 บาท ภายใน 3 วันหลังจากที่ทำการจอง \r\nหากไม่ชำระภายในวันที่กำหนด ทางบริษัทขออนุญาตตัดที่นั่งตามเงื่อนไข</u>\r\n\r\n', '[{\"route\":\"กรุงเทพฯ ? โตเกียว\",\"hotel\":\"\"},{\"route\":\"วัดนาริตะ ? ร้านดองกี้โฮเต้ ? วัดอาซากุสะ ? จุดชมวิว Tokyo Sky Tree ?  แช่น้ำแร่ร้อน\",\"hotel\":\"Atami New Fujiya Hotel / Just One Hotel\"},{\"route\":\"ภูเขาไฟฟูจิ ชั้น 5 (ขึ้นอยู่กับสภาพถูมิอากาศ) ? หมู่บ้านน้ำใสโอชิโนะฮัคไค ? พิพิธภัณฑ์แผ่นดินไหวโตเกียว ? ช้อปปิ้งชินจุกุ\",\"hotel\":\"Narita View Hotel / Narita Tobu Hotel \"},{\"route\":\"อิสระตามอัธยาศัย หรือ ท่านสามารถเลือกซื้อตั๋ว Tokyo Disneyland - ช่วงเทศกาลซากุระ ประมาณปลายเดือนมี.ค. ? ต้นเดือนเม.ย.) นำท่านชมซากุระบานสะพรั่งที่สวนอุเอโนะ\",\"hotel\":\"Narita View Hotel / Narita Tobu Hotel\"},{\"route\":\"สนามบินนาริตะ ? กรุงเทพฯ\",\"hotel\":\"\"}]', 4, '4.pdf', '5,4', 25900.00, '[{ \"from\": \"2017-03-06\", \"to\": \"2017-03-10\", \"price\": 25900},\n { \"from\": \"2017-03-12\", \"to\": \"2017-03-16\", \"price\": 25900},\n { \"from\": \"2017-03-14\", \"to\": \"2017-03-18\", \"price\": 27900},\n { \"from\": \"2017-03-16\", \"to\": \"2017-03-20\", \"price\": 27900},\n  { \"from\": \"2017-03-18\", \"to\": \"2017-03-22\", \"price\": 28900},\n  { \"from\": \"2017-03-20\", \"to\": \"2017-03-24\", \"price\": 29900},\n  { \"from\": \"2017-03-24\", \"to\": \"2017-03-28\", \"price\": 29900},\n  { \"from\": \"2017-03-26\", \"to\": \"2017-03-30\", \"price\": 29900},\n  { \"from\": \"2017-03-29\", \"to\": \"2017-04-20\", \"price\": 29900},\n  { \"from\": \"2017-04-01\", \"to\": \"2017-04-05\", \"price\": 29900},\n  { \"from\": \"2017-04-04\", \"to\": \"2017-04-08\", \"price\": 29900},\n  { \"from\": \"2017-04-10\", \"to\": \"2017-04-14\", \"price\": 35900},\n  { \"from\": \"2017-04-13\", \"to\": \"2017-04-17\", \"price\": 37900},\n  { \"from\": \"2017-04-16\", \"to\": \"2017-04-20\", \"price\": 28900},\n  { \"from\": \"2017-04-19\", \"to\": \"2017-04-23\", \"price\": 29900},\n  { \"from\": \"2017-04-22\", \"to\": \"2017-04-26\", \"price\": 29900}\n]', 0, NULL, 0, 'THB', 1, 1, 1, '2017-03-06', '2017-04-26'),
(5, 'มัณฑะเลย์-มินกุน-สกายส์-อังวะ-พุกาม 4วัน3คืน', 'Easy luxury bagan - mandalay', 'sp', 'เดินทางโดยสายการบินบางกอกแอร์เวย์ โหลดกระเป๋าได้ 20 กิโลกรัม\r\nพิเศษ!!นั่งเล้าจน์บางกอกแอร์เวย์ บริการอาหารร้อนและเครื่องดื่มบนเครื่อง\r\n', '<ul>\r\n<li>ร่วมพิธีศักดิ์สิทธิ์ล้างพระพักตร์ พระมหามัยมุณี สิ่งศักดิ์สิทธิ์สูงสุด 1 ใน 5 มหาบูชาสถาน</li>\r\n<li>ชมอาทิตย์อัสดงท่ามกลางความยิ่งใหญ่ของทุ่งทะเลเจดีย์ เมืองพุกาม</li>\r\n<li>เที่ยว เมืองสกายน์ ชมวิวยอดดอยสกายน์</li>\r\n<li>ชมวิวที่เขา มัณฑะเลย์ฮิลล์ จุดชมวิวทิวทัศน์ที่สวยที่สุดของเมืองมัณฑะเลย์</li>\r\n<li>เที่ยวเมืองมิงกุน ล่องแม่น้ำอิระวดีชม เมืองมิงกุน ระฆังมิงกุน เจดีย์มิงกุน และ ทัชมาฮาลพม่า</li>\r\n<li>ชม สะพานไม้อูเบ็ง สะพานไม้สักที่ยาวที่สุดโลก</li>\r\n<li>เมนูพิเศษ!!! กุ้งแม่น้ำเผา</li>\r\n<li>สามารถใช้ห้องรับรองของสายการบินบางกอกแอร์เวย์ได้</li>\r\n<li>พักโรงแรมมาตรฐาน 4 ดาว</li>\r\n<br>\r\n<b>ก่อนตัดสินใจจองทัวร์ ควรอ่านเงื่อนไขการเดินทางอย่างถ่องแท้ แล้วจึงวางมัดจำ \r\nเพื่อประโยชน์ของท่านเอง</b>\r\n<i>การเดินทางในแต่ละครั้งจะต้องมีผู้เดินทางจำนวน 30 ท่านขึ้นไป\r\nถ้าผู้เดินทางไม่ครบจำนวนดังกล่าว บริษัทฯ ขอสงวนสิทธิ์ในการ เลื่อนการเดินทาง หรือ เปลี่ยนแปลงราคา\r\n</i>\r\n<br>\r\nการเดินทางอาจเปลี่ยนแปลงได้ตามความเหมาะสมโดยไม่แจ้งให้ทราบล่วงหน้า ทั้งนี้เนื่องจากสภาพ ลม ฟ้า อากาศ และสถานการณ์ในการเดินทางขณะนั้นแต่จะคำนึงถึงความปลอดภัยในการเดินทาง และผลประโยชน์ของหมู่คณะเป็นสำคัญ โดยไม่ทำให้มาตรฐานของการบริการลดน้อยลง', '[{\"route\":\"กรุงเทพฯ ? มัณฑะเลย์ ? พระราชวังมัณฑะเลย์ ? วิหารชเวนันดอร์ ? วัดกุโสดอ ? MANDALAY HILL \",\"hotel\":\"Best Western Shwe Pyi Thar\"},{\"route\":\"เมืองพุกาม ? เจดีย์ชเวสิกอง ? วัดอนันดา ? วิหารธรรมยันจี ? วิหารติโลมินโล ? ชเวกุจี ? เจดีย์สัพพัญญู ? วัดมนุหา ? วัดกุบยางกี ? เจดีย์ชเว\",\"hotel\":\"Bagan Airport\",\"route\":\"มัณฑะเลย์ ?  เมืองมิงกุน ? ล่องเรือแม่น้ำอิระวดี ? เจดีย์พญาเธียรดาน ? เมืองสกายน์ ? เจดีย์กวงมูดอร์ หรือวัดเจดีย์นมนาง ? เจดีย์อูมินทงแส่ ? เมืองอังวะ\",\"hotel\":\"Best Western Shwe Pyi Thar\"},{\"route\":\"นมัสการพระมหามัยมุนี ? วัดกุสินารา ? เมืองอมรปุระ ? วัดมหากันดายง ? สะพานไม้อูเบ็ง\",\"hotel\":\"\"}]', 5, '5.pdf', '4,3', 20900.00, '[{ \"from\": \"2017-03-16\", \"to\": \"2017-03-19\", \"price\": 20900},\n { \"from\": \"2017-03-23\", \"to\": \"2017-03-26\", \"price\": 21900},\n { \"from\": \"2017-04-06\", \"to\": \"2017-04-09\", \"price\": 22900},\n { \"from\": \"2017-04-26\", \"to\": \"2017-04-29\", \"price\": 21900}\n ]', 0, NULL, 0, 'THB', 0, 1, 1, '2017-03-16', '2017-04-29'),
(6, 'โอซาก้า-เกียวโต-ชิราคาวาโกะ\r\nกำแพงหิมะ-ฟูจิ-โตเกียว 5 วัน 4 คืน', 'Easy say hi snow wall', 'sp', 'หมู่บ้านมรดกโลกชิราคาวาโกะ-ศาลเจ้าฟูชิมิอินาริเจแปนเอล์ป-เทือกเขาทาคายาม่า-ช้อปปิ้งจุใจที่ชินจูกุ-ชินไซบาชิ-ชมภูเขาไฟฟูจิสัญลักษณ์ของแดงอาทิตย์อุทัย สักการะวัดอาซากุสะเพื่อความเป็นสิริมงคล', '<ul>\n<li>บินกับ Scoot ด้วยเครื่องใหม่ป้ายแดง Boeing 787 Dreamliner</li>\n<li>ช้อปปิ้ง ถนนชินไชบาชิ เป็นย่านช้อปปิ้งชื่อดังของนครโอซาก้า</li>\n<li>ศาลเจ้าฟูชิมิอินาริ ที่สถิตของพระแม่โพสภ</li>\n<li>หมู่บ้านมรดกโลกชิราคาวาโกะ ที่ยังคงอนุรักษ์บ้านสไตล์ญี่ปุ่นขนานแท้ดั้งเดิม</li>\n<li>เจแปน แอลป์ เทือกเขาทาคายาม่า ที่มีชื่อเสียงที่สุดของประเทศญี่ปุ่น</li>\n<li>ปราสาทมัตซึโมโตะ เป็นปราสาทไม้ที่คงความดั้งเดิมและเก่าแก่ที่สุดในญี่ปุ่น</li>\n<li>มรดกโลกทางวัฒนธรรม ภูเขาไฟฟูจิ สถานที่ศักดิ์สิทธิ์และแหล่งบันดาลใจทางศิลปะ</li>\n<li>วัดเซนโซจิ  หรือ วัดอาซากุสะ วัดที่เก่าแก่ที่สุดในกรุงโตเกียว</li>\n<li>ให้ช้อปปิ้งจุใจ ย่านชินจุกุ ชิบูยะ ฮาจุกุ แหล่งช้อปปิ้งชั้นนำของญี่ปุ่น</li>\n<li>สัมผัสประสบการณ์ อาบน้ำแร่ออนเซ็น ให้ท่านได้ผ่อนคลายความเมื่อยล้า</li>\n<li>พิเศษ!!! ขาปูยักษ์ และ Free Wi-Fi ตลอดการเดินทาง</li>\n</ul><br>\n<b>ก่อนตัดสินใจจองทัวร์ ควรอ่านเงื่อนไขการเดินทางอย่างถ่องแท้ แล้วจึงวางมัดจำ \nเพื่อประโยชน์ของท่านเอง</b><br>\nการเดินทางในแต่ละครั้งจะต้องมีผู้เดินทางจำนวน 30 ท่านขึ้นไป\nถ้าผู้เดินทางไม่ครบจำนวนดังกล่าว บริษัทฯ ขอสงวนสิทธิ์ในการ เลื่อนการเดินทาง หรือ เปลี่ยนแปลงราคา\n<br>\n<b>ยังไม่รวมค่าทิปไกด์ และคนขับรถท่านละ 3,500 เยน ตลอดทริป \nกรุณาชำระมัดจำท่านละ 15,000 บาท ภายใน 3 วันหลังจากที่ทำการจอง \nหากไม่ชำระภายในวันที่กำหนด ทางบริษัทขออนุญาตตัดที่นั่งตามเงื่อนไข</b>\n<br>\nกรุณาชำระมัดจำท่านละ 5,000 บาท ภายใน 3 วันหลังจากที่ทำการจอง \nหากไม่ชำระภายในวันที่กำหนด ทางบริษัทขออนุญาตตัดที่นั่งตามเงื่อนไข\n<br>\n<b>หมายเหตุ</b>\n<br>\n1. โรงแรมที่ญี่ปุ่นห้องค่อนข้างเล็ก และบางโรงแรมไม่มีห้องสำหรับนอน 3 ท่าน ท่านอาจจะต้องพักเป็นห้องที่นอน 2 ท่าน และห้องที่นอน 1 ท่าน (แยกเป็น 2 ห้อง) และในกรณีที่พัก 2 ท่าน บางโรงแรมอาจจะไม่มีเตียงทวิน ทางบริษัทขอสงวนสิทธิ์ในการจัดห้องพักเป็นเตียงดับเบิ้ลสำหรับนอน 2 ท่าน\n2. รายการท่องเที่ยวอาจมีการสลับหรือเปลี่ยนแปลงได้ตามความเหมาะสมโดยมิแจ้งให้ทราบล่วงหน้า\nในกรณีที่มีเหตุการณ์สุดวิสัย หรือภัยธรรมชาติ หรือเหตุการณ์ที่ไม่ได้อยู่ภายใต้การควบคุมของบริษัทฯ \nเนื่องจากบริษัทรถทัวร์ของญี่ปุ่นสามารถใช้รถได้ 12 ชั่วโมง / วัน หากเกิดเหตุการณ์สุดวิสัย ทางบริษัทของสงวนสิทธิ์ในการสลับหรือเปลี่ยนแปลงโปรแกรมตามความเหมาะสม ทั้งนี้ บริษัทฯ จะคำนึงถึงความปลอดภัย ตลอดจนผลประโยชน์ของคณะเป็นสำคัญ\n\n', '[{\"route\":\"กรุงเทพฯ ? โอซาก้า ? ช้อปปิ้งชินไซบาชิ\",\"hotel\":\"Ibis Style Osaka / Agora Osaka Hotel\"},{\"route\":\"เมืองเกียวโต ? ศาลเจ้าฟูชิมิอินาริ ? ทาคายาม่า ? หมู่บ้านชิราคาวาโกะ ? เมืองคานาซาว่า\",\"hotel\":\"TONAMI ROYAL HOTEL\",\"route\":\"เจแปน แอลป์ ? ปราสามัตซึโมโตะ ? เมืองอิซาว่า ? แช่น้ำแร่ออนเซ็น ? เมนูขาปูยักษ์\",\"hotel\":\"ISAWA ONSEN KYOSUISO HOTEL\"},{\"route\":\"ชมทุ่งพิงค์มอส หรือ หมู่บ้านน้ำใสโอชิโนะฮัคไค ? พิพิธภัณฑ์แผ่นดินไหว ? โตเกียว ? วัดอาซากุสะ  จุดชมวิว Tokyo Sky Tree ? ช้อปปิ้งชินจุกุ\",\"hotel\":\"Narita View Hotel / Narita Tobu Hotel\"},{\"route\":\"ท่าอากาศยานนานาชาตินาริตะ ? กรุงเทพฯ\",\"hotel\":\"\"}]', 6, '6.pdf', '5,4', 38900.00, '[{ \"from\": \"2017-04-21\", \"to\": \"2017-04-25\", \"price\": 39900},\n { \"from\": \"2017-04-19\", \"to\": \"2017-04-23\", \"price\": 39900},\n { \"from\": \"2017-05-02\", \"to\": \"2017-05-06\", \"price\": 38900}\n ]', 0, NULL, 0, 'THB', 0, 0, 1, '2017-04-21', '2017-05-06'),
(7, 'โอซาก้า-เกียวโต-นาโกย่า\r\nฟูจิ-โตเกียว 5 วัน 4 คืน', 'Easy say love Osaka Tokyo', 'sp', 'เที่ยววัดคิโยมิสึ ศาลเจ้าฟูชิมิอินาริ ปราสาทโอซาก้า ช้อปปิ้งจุใจย่านซินไซบาชิ ซาคาเอะ ชินจุกุ ชมภูเขาไฟฟูจิสัญลักษณ์ของแดนอาทิตย์อุทัย สักการะวัดอาซากุสะเพื่อความเป็นสิริมงคล', '<ul>\r\n<li>บินกับ Scoot ด้วยเครื่องใหม่ป้ายแดง Boeing 787 Dreamliner</li>\r\n<li>ช้อปปิ้ง ถนนชินไชบาชิ เป็นย่านช้อปปิ้งชื่อดังของนครโอซาก้า</li>\r\n<li>ศาลเจ้าฟูชิมิอินาริ ที่สถิตของพระแม่โพสภ</li>\r\n<li>หมู่บ้านมรดกโลกชิราคาวาโกะ ที่ยังคงอนุรักษ์บ้านสไตล์ญี่ปุ่นขนานแท้ดั้งเดิม</li>\r\n<li>เจแปน แอลป์ เทือกเขาทาคายาม่า ที่มีชื่อเสียงที่สุดของประเทศญี่ปุ่น</li>\r\n<li>ปราสาทมัตซึโมโตะ เป็นปราสาทไม้ที่คงความดั้งเดิมและเก่าแก่ที่สุดในญี่ปุ่น</li>\r\n<li>มรดกโลกทางวัฒนธรรม ภูเขาไฟฟูจิ สถานที่ศักดิ์สิทธิ์และแหล่งบันดาลใจทางศิลปะ</li>\r\n<li>วัดเซนโซจิ  หรือ วัดอาซากุสะ วัดที่เก่าแก่ที่สุดในกรุงโตเกียว</li>\r\n<li>ให้ช้อปปิ้งจุใจ ย่านชินจุกุ ชิบูยะ ฮาจุกุ แหล่งช้อปปิ้งชั้นนำของญี่ปุ่น</li>\r\n<li>สัมผัสประสบการณ์ อาบน้ำแร่ออนเซ็น ให้ท่านได้ผ่อนคลายความเมื่อยล้า</li>\r\n<li>พิเศษ!!! ขาปูยักษ์ และ Free Wi-Fi ตลอดการเดินทาง</li>\r\n</ul><br>\r\n<b>ก่อนตัดสินใจจองทัวร์ ควรอ่านเงื่อนไขการเดินทางอย่างถ่องแท้ แล้วจึงวางมัดจำ \r\nเพื่อประโยชน์ของท่านเอง</b><br>\r\nการเดินทางในแต่ละครั้งจะต้องมีผู้เดินทางจำนวน 30 ท่านขึ้นไป\r\nถ้าผู้เดินทางไม่ครบจำนวนดังกล่าว บริษัทฯ ขอสงวนสิทธิ์ในการ เลื่อนการเดินทาง หรือ เปลี่ยนแปลงราคา\r\n<br>\r\n<b>ยังไม่รวมค่าทิปไกด์ และคนขับรถท่านละ 3,500 เยน ตลอดทริป \r\nกรุณาชำระมัดจำท่านละ 15,000 บาท ภายใน 3 วันหลังจากที่ทำการจอง \r\nหากไม่ชำระภายในวันที่กำหนด ทางบริษัทขออนุญาตตัดที่นั่งตามเงื่อนไข</b>\r\n<br>\r\nกรุณาชำระมัดจำท่านละ 5,000 บาท ภายใน 3 วันหลังจากที่ทำการจอง \r\nหากไม่ชำระภายในวันที่กำหนด ทางบริษัทขออนุญาตตัดที่นั่งตามเงื่อนไข\r\n<br>\r\n<b>หมายเหตุ</b>\r\n<br>\r\n1. โรงแรมที่ญี่ปุ่นห้องค่อนข้างเล็ก และบางโรงแรมไม่มีห้องสำหรับนอน 3 ท่าน ท่านอาจจะต้องพักเป็นห้องที่นอน 2 ท่าน และห้องที่นอน 1 ท่าน (แยกเป็น 2 ห้อง) และในกรณีที่พัก 2 ท่าน บางโรงแรมอาจจะไม่มีเตียงทวิน ทางบริษัทขอสงวนสิทธิ์ในการจัดห้องพักเป็นเตียงดับเบิ้ลสำหรับนอน 2 ท่าน\r\n2. รายการท่องเที่ยวอาจมีการสลับหรือเปลี่ยนแปลงได้ตามความเหมาะสมโดยมิแจ้งให้ทราบล่วงหน้า\r\nในกรณีที่มีเหตุการณ์สุดวิสัย หรือภัยธรรมชาติ หรือเหตุการณ์ที่ไม่ได้อยู่ภายใต้การควบคุมของบริษัทฯ \r\nเนื่องจากบริษัทรถทัวร์ของญี่ปุ่นสามารถใช้รถได้ 12 ชั่วโมง / วัน หากเกิดเหตุการณ์สุดวิสัย ทางบริษัทของสงวนสิทธิ์ในการสลับหรือเปลี่ยนแปลงโปรแกรมตามความเหมาะสม ทั้งนี้ บริษัทฯ จะคำนึงถึงความปลอดภัย ตลอดจนผลประโยชน์ของคณะเป็นสำคัญ', '[{\"route\":\"กรุงเทพฯ ? โอซาก้า ? ช้อปปิ้งชินไซบาชิ\",\"hotel\":\"Ibis Style Osaka / Agora Osaka Hotel\"},{\"route\":\"ปราสาทโอซาก้า - เมืองเกียวโต  - ศาลเจ้าฟูชิมิอินาริ  - วัดคิโยมิสึ (วัดน้ำใส) ? ช้อปปิ้งย่านซาคาเอะ\",\"hotel\":\"Castle Plaza Nagoya \",\"route\":\"ทะเลสาบฮามานะ ?  โกเท็มบะเอ้าท์เล็ท ? ฟูจิ ? แช่น้ำแร่ออนเซ็น ? เมนูขาปูยักษ์\",\"hotel\":\"Fujino Boukaen Hotel\"},{\"route\":\"ภูเขาไฟฟูจิ ชั้น 5 (ขึ้นอยู่กับสภาพภูมิอากาศ) ? พิพิธภัณฑ์แผ่นดินไหว ? โตเกียว ? วัดอาซากุสะ จุดชมวิว Tokyo Sky Tree ? ช้อปปิ้งชินจุกุ\",\"hotel\":\"Narita View Hotel / Narita Tobu Hotel\"},{\"route\":\"สนามบินนาริตะ ? กรุงเทพฯ\",\"hotel\":\"\"}]', 7, '7.pdf', '5,4', 37900.00, '[{ \"from\": \"2017-04-07\", \"to\": \"2017-04-11\", \"price\": 37900}\n ]', 0, NULL, 0, 'THB', 0, 1, 1, '2017-04-07', '2017-04-11'),
(8, 'อุทยานเหย่หลิว-จิ่วเฟิ่น-ฟรีอิสระท่องเที่ยว-6วัน 4คืน', 'Easy \"ฟินเวอร์\" in Taiwan', 'sp', '', '<i>ไม่รวมทิปไกด์+คนขับรถตลอดการเดินทาง ท่านละ 900NTD(1,080บาท) (ส่วนหัวหน้าทัวร์แล้วแต่จะพอใจในการบริการ)</i>\r\n<br>\r\n1.ในกรณีที่ผู้เดินทางไม่ผ่านการตรวจพิจารณาจากด่านตรวจคนเข้าเมือง (ต.ม.)ในการ เข้า-ออกทั้งประเทศไทยและประเทศไต้หวัน อันเนื่องมาจากการกระทำที่ส่อไปในทางผิดกฎหมาย การหลบหนีเข้าออกเมือง หรือการถูกปฎิเสธในกรณีอื่นๆทุกกรณี ทางบริษัทจะไม่รับผิดชอบและไม่คืนค่าใช้จ่ายใดใดทั้งสิ้น เนื่องจากเป็นการเหมาจ่ายกับตัวแทนบริษัทแล้ว\r\n2.ในกรณีที่ลูกค้าไม่ลงร้านช้อปที่ไต้หวัน ซึ่งได้แก่ ร้านขนมพายสัปปะรด, ศูนย์เครื่องประดับเจอร์เนียมหรือร้านนาฬิกา, Duty free ทางบริษัทขอสงวนสิทธิ์ในการเก็บเงินลูกค้าที่ไม่เข้าร้านเป็นจำนวนเงินร้านละ 700 บาท', '[{\"route\":\"กรุงเทพฯ(ดอนเมือง)\",\"hotel\":\"Ibis Style Osaka / Agora Osaka Hotel\"},{\"route\":\"ปราสาทโอซาก้า - เมืองเกียวโต  - ศาลเจ้าฟูชิมิอินาริ  - วัดคิโยมิสึ (วัดน้ำใส) ? ช้อปปิ้งย่านซาคาเอะ\",\"hotel\":\"Castle Plaza Nagoya \",\"route\":\"ทะเลสาบฮามานะ ?  โกเท็มบะเอ้าท์เล็ท ? ฟูจิ ? แช่น้ำแร่ออนเซ็น ? เมนูขาปูยักษ์\",\"hotel\":\"Fujino Boukaen Hotel\"},{\"route\":\"ภูเขาไฟฟูจิ ชั้น 5 (ขึ้นอยู่กับสภาพภูมิอากาศ) ? พิพิธภัณฑ์แผ่นดินไหว ? โตเกียว ? วัดอาซากุสะ จุดชมวิว Tokyo Sky Tree ? ช้อปปิ้งชินจุกุ\",\"hotel\":\"Narita View Hotel / Narita Tobu Hotel\"},{\"route\":\"สนามบินนาริตะ ? กรุงเทพฯ\",\"hotel\":\"\"}]', 8, '8.pdf', '6,4', 17999.00, '[{ \"from\": \"2017-02-22\", \"to\": \"2017-02-27\", \"price\": 18999},\n { \"from\": \"2017-03-08\", \"to\": \"2017-03-13\", \"price\": 17999},\n { \"from\": \"2017-03-15\", \"to\": \"2017-03-20\", \"price\": 18999},\n { \"from\": \"2017-04-19\", \"to\": \"2017-04-24\", \"price\": 19999},\n { \"from\": \"2017-05-05\", \"to\": \"2017-05-10\", \"price\": 19999},\n { \"from\": \"2017-06-06\", \"to\": \"2017-06-11\", \"price\": 18999},\n { \"from\": \"2017-07-15\", \"to\": \"2017-07-20\", \"price\": 18999}\n ]', 0, NULL, 0, 'THB', 0, 0, 1, '2017-02-22', '2017-07-20'),
(9, NULL, 'Easy \"สุดจ๊าบ\" in Taiwan', 'sp', 'พิพิธภัณท์สถานกู้กง ทะเลสาบสุริยันจันทรา ช้อปปิ้ง 3 ตลาดดัง ตลาดฝงเจี๋ย ตลาดชื่อหลิน ตลาดซึเหมิงติง\r\n<b>พิเศษ ปล่อยโคมลอยผิงซี</b>', '<i>ไม่รวมทิปไกด์+คนขับรถตลอดการเดินทาง ท่านละ 900NTD(1,080บาท) (ส่วนหัวหน้าทัวร์แล้วแต่จะพอใจในการบริการ)</i>\r\n<br>\r\n1.ในกรณีที่ผู้เดินทางไม่ผ่านการตรวจพิจารณาจากด่านตรวจคนเข้าเมือง (ต.ม.)ในการ เข้า-ออกทั้งประเทศไทยและประเทศไต้หวัน อันเนื่องมาจากการกระทำที่ส่อไปในทางผิดกฎหมาย การหลบหนีเข้าออกเมือง หรือการถูกปฎิเสธในกรณีอื่นๆทุกกรณี ทางบริษัทจะไม่รับผิดชอบและไม่คืนค่าใช้จ่ายใดใดทั้งสิ้น เนื่องจากเป็นการเหมาจ่ายกับตัวแทนบริษัทแล้ว\r\n2.ในกรณีที่ลูกค้าไม่ลงร้านช้อปที่ไต้หวัน ซึ่งได้แก่ ร้านขนมพายสัปปะรด, ศูนย์เครื่องประดับเจอร์เนียมหรือร้านนาฬิกา, Duty free ทางบริษัทขอสงวนสิทธิ์ในการเก็บเงินลูกค้าที่ไม่เข้าร้านเป็นจำนวนเงินร้านละ 700 บาท', '[{\"route\":\"กรุงเทพฯ(ดอนเมือง)\",\"hotel\":\"\"},{\"route\":\"สนามบินเถาหยวน - ล่องทะเลสาบสุริยันจันทรา ? วัดพระถังซัมจั๋ง \",\"hotel\":\"LOOK HOTEL \",\"route\":\"อาลีซาน ? ป่าสนพันปี ? ฟ่งเจี๋ยไนท์มาเก๊ต\",\"hotel\":\"FORTE ORANGE HOTEL TAICHUNG PARK\"},{\"route\":\"ถนนเก่าจิ่วเฟิ่น ? อุทยานเย่หลิว ? ปล่อยโคมลอยผิงซี(ไม่รวมค่าโคมลอย) ? ตลาดซื่อหลินไนท์มาร์เก็ต\",\"hotel\":\"HEDO HOTEL\"},{\"route\":\"ทำ DIY พายสัปปะรด ? พิพิธภัณฑ์สถานกู้กง ? ศูนย์เครื่องประดับ - DUTY FREE ? ตลาดซีเหมินติง \",\"hotel\":\"HEDO HOTEL\"},{\"route\":\"สนามบินเถาหยวน ? สนามบินดอนเมือง กรุงเทพฯ\",\"hotel\":\"\"}]', 9, '9.pdf', '6,5', 22999.00, '[{ \"from\": \"2017-03-31\", \"to\": \"2017-04-05\", \"price\": 21999},\r\n { \"from\": \"2017-04-11\", \"to\": \"2017-04-16\", \"price\": 26999},\r\n { \"from\": \"2017-05-04\", \"to\": \"2017-05-09\", \"price\": 23999},\r\n { \"from\": \"2017-06-05\", \"to\": \"2017-06-10\", \"price\": 22999}\r\n ]', 0, NULL, 0, 'THB', 0, 0, 1, '2017-03-31', '2017-06-05'),
(10, 'ภูเก็ต หรรษา พาเพลิน 6999 บาท', 'Easy fun in Phuket', 'sp', 'เที่ยวสนุกดูปะการังรอบภูเก็ต', '<ul>\r\n<li>นั่งกระเช้านองปิง สักการะพระใหญ่พระพุทธรูปนั่งปรางสมาธิทองสัมฤทธิ์</li>\r\n<li>ช้อปปิ้ง CITY GATE OUTLET  ศูนย์รวมสินค้ามากมาย</li>\r\n<li>ชมวัดแชกงหมิว (วัดกังหัน) สิ่งศักสิทธิ์ที่นิยมที่สุดในฮ่องกง</li>\r\n<li>ชม REPULSE BAY หาดทรายรูปจันทร์เสี้ยว</li>\r\n<li>ชม VICTORIA  PEAK  จุดชมวิวที่สวยที่สุดในฮ่องกง</li>\r\n<li>นั่ง รถรางพีคแทรม ขึ้นสู่จุดชมวิวเดอะพีค</li>\r\n<li>ช๊อปปิ้ง ย่านจิมซาจุ่ยและโอเซี่ยนเทอร์มินอล สนุกสนานกับการเลือกสินค้าราคาพิเศษ</li>\r\n<li>อิสระเต็มอิ่มกับการช๊อปปิ้งตามอัธยาศัย</li>\r\n<li>พิเศษ !!!  เมนู ติ่มซำ ซาลาเปา ขนมจีบ โจ๊กฮ่องกง</li></ul><br>\r\n<b>ก่อนตัดสินใจจองทัวร์ ควรอ่านเงื่อนไขการเดินทางอย่างถ่องแท้ แล้วจึงวางมัดจำ \r\nเพื่อประโยชน์ของท่านเอง</b><br>\r\nการเดินทางในแต่ละครั้งจะต้องมีผู้เดินทางจำนวน 25 ท่านขึ้นไป\r\nถ้าผู้เดินทางไม่ครบจำนวนดังกล่าว บริษัทฯ ขอสงวนสิทธิ์ในการ เลื่อนการเดินทาง หรือ เปลี่ยนแปลงราคา<br>\r\n<b>ยังไม่รวมค่าทิปไกด์ และคนขับรถท่านละ 120 HKD ตลอดทริป</b><br>\r\nกรุณาชำระมัดจำท่านละ 5,000 บาท ภายใน 3 วันหลังจากที่ทำการจอง \r\nหากไม่ชำระภายในวันที่กำหนด ทางบริษัทขออนุญาตตัดที่นั่งตามเงื่อนไข\r\n\r\n', '[{\"route\":\"กรุงเทพฯ ? ฮ่องกง ? หมูบ้านนองปิง ? อิสระช้อปปิ้ง City Gate Outlet\",\"hotel\":\"MK HOTEL / CRUISE HOTEL\"},{\"route\":\"ติ่มซำ ? วัดแชกงหมิว ? จุดชมวิววิคตอเรียพีค ? รถรางขึ้นพีคแทรม ? หาดรีพลัสเบย์ ? โรงงานจิวเวอรี่ ? ช้อปปิ้งจิมซาจุ่ยและโอเชี่ยนเทอร์มินอล\",\"hotel\":\"MK HOTEL / CRUISE HOTEL\",\"route\":\"อิสระตามอัธยาศัย ? กรุงเทพฯ\",\"hotel\":\"\"}]', 10, '10.pdf', '3,2', 6999.00, '[{ \"from\": \"2017-03-19\", \"to\": \"2017-03-21\", \"price\": 6999},\n { \"from\": \"2017-03-25\", \"to\": \"2017-03-27\", \"price\": 6999}\n ]', 0, NULL, 0, 'THB', 0, 0, 1, '2017-03-19', '2017-03-27');

-- --------------------------------------------------------

--
-- Table structure for table `tour_address`
--

CREATE TABLE `tour_address` (
  `ta_id` int(11) NOT NULL,
  `tour_id` int(11) NOT NULL,
  `address_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=tis620;

--
-- Dumping data for table `tour_address`
--

INSERT INTO `tour_address` (`ta_id`, `tour_id`, `address_id`) VALUES
(1, 3, 3),
(2, 4, 4),
(3, 5, 5),
(4, 6, 6),
(6, 5, 10),
(7, 5, 11),
(8, 6, 4),
(9, 6, 12),
(10, 7, 4),
(11, 7, 12),
(12, 7, 13),
(13, 7, 14),
(14, 6, 14),
(15, 4, 14),
(16, 9, 15),
(17, 10, 16),
(18, 8, 17),
(19, 8, 18),
(20, 8, 19),
(21, 8, 20);

-- --------------------------------------------------------

--
-- Table structure for table `tour_condition`
--

CREATE TABLE `tour_condition` (
  `tc_id` int(11) NOT NULL,
  `tour_id` int(11) NOT NULL,
  `tc_condition` varchar(8) NOT NULL,
  `tc_price` float(8,2) NOT NULL,
  `tc_type` varchar(10) NOT NULL,
  `tc_chooseCondition` text,
  `tc_data` text NOT NULL,
  `tc_order` int(2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=tis620;

--
-- Dumping data for table `tour_condition`
--

INSERT INTO `tour_condition` (`tc_id`, `tour_id`, `tc_condition`, `tc_price`, `tc_type`, `tc_chooseCondition`, `tc_data`, `tc_order`) VALUES
(4, 3, 'increase', 4000.00, 'room', NULL, '[{\"roomtype\":\"Single room\",\"roomdetail\":\"\"}]', 1),
(5, 3, 'increase', 4500.00, 'room', NULL, '[{\"roomtype\":\"Children < 2 year old\",\"roomdetail\":\"with bed\"}]', 2),
(6, 4, 'increase', 7900.00, 'room', NULL, '[{\"roomtype\":\"Single room\",\"roomdetail\":\"\"}]', 1),
(7, 4, 'increase', 6900.00, 'room', NULL, '[{\"roomtype\":\"Children < 2 year old\",\"roomdetail\":\"with bed\"}]', 2),
(8, 5, 'increase', 4500.00, 'room', NULL, '[{\"roomtype\":\"Single room\",\"roomdetail\":\"\"}]', 1),
(9, 5, 'increase', 6900.00, 'room', NULL, '[{\"roomtype\":\"Children < 2 year old\",\"roomdetail\":\"with bed\"}]', 2),
(10, 6, 'increase', 8900.00, 'room', NULL, '[{\"roomtype\":\"Single room\",\"roomdetail\":\"\"}]', 1),
(11, 6, 'increase', 6900.00, 'room', NULL, '[{\"roomtype\":\"Children < 2 year old\",\"roomdetail\":\"with bed\"}]', 2),
(12, 7, 'increase', 8900.00, 'room', NULL, '[{\"roomtype\":\"Single room\",\"roomdetail\":\"\"}]', 1),
(13, 7, 'increase', 6900.00, 'room', NULL, '[{\"roomtype\":\"Children < 2 year old\",\"roomdetail\":\"with bed\"}]', 2),
(14, 8, 'increase', 5000.00, 'room', '[{\"from\":\"2017-02-22\",\"to\":\"2017-03-20\"},{\"from\":\"2017-06-06\",\"to\":\"2017-07-20\"}]', '[{\"roomtype\":\"Single room\",\"roomdetail\":\"\"}]', 1),
(15, 8, 'increase', 7900.00, 'room', '[{\"from\":\"2017-04-19\",\"to\":\"2017-05-10\"}]', '[{\"roomtype\":\"Single room\",\"roomdetail\":\"\"}]', 2),
(16, 8, 'increase', 9900.00, 'room', NULL, '[{\"roomtype\":\"Children < 2 year old\",\"roomdetail\":\"with bed\"}]', 3),
(17, 9, 'increase', 8900.00, 'room', '[{\"from\":\"2017-03-131\",\"to\":\"2017-04-05\"},{\"from\":\"2017-04-11\",\"to\":\"2017-04-16\"},{\"from\":\"2017-06-05\",\"to\",\"2017-06-10\"}]', '[{\"roomtype\":\"Single room\",\"roomdetail\":\"\"}]', 1),
(18, 9, 'increase', 9900.00, 'room', '[{\"from\":\"2017-04-11\",\"to\":\"2017-05-09\"}]', '[{\"roomtype\":\"Single room\",\"roomdetail\":\"\"}]', 2),
(19, 9, 'increase', 6000.00, 'room', NULL, '[{\"roomtype\":\"Children < 2 year old\",\"roomdetail\":\"with bed\"}]', 3),
(20, 10, 'increase', 1000.00, 'room', NULL, '[{\"roomtype\":\"Single room\",\"roomdetail\":\"\"}]', 1),
(21, 10, 'increase', 1200.00, 'room', NULL, '[{\"roomtype\":Children < 2 year old\",\"roomdetail\":\"with bed\"}]', 2);

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
-- Indexes for table `booking_paid`
--
ALTER TABLE `booking_paid`
  ADD PRIMARY KEY (`paid_id`);

--
-- Indexes for table `car`
--
ALTER TABLE `car`
  ADD PRIMARY KEY (`car_id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`city_id`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`client_id`),
  ADD UNIQUE KEY `client_email` (`client_email`);

--
-- Indexes for table `discount`
--
ALTER TABLE `discount`
  ADD PRIMARY KEY (`discount_id`);

--
-- Indexes for table `entrance`
--
ALTER TABLE `entrance`
  ADD PRIMARY KEY (`ent_id`);

--
-- Indexes for table `exchangerate`
--
ALTER TABLE `exchangerate`
  ADD PRIMARY KEY (`ex_id`);

--
-- Indexes for table `flight`
--
ALTER TABLE `flight`
  ADD PRIMARY KEY (`flight_id`);

--
-- Indexes for table `freerate`
--
ALTER TABLE `freerate`
  ADD PRIMARY KEY (`fr_id`);

--
-- Indexes for table `guide`
--
ALTER TABLE `guide`
  ADD PRIMARY KEY (`guide_id`);

--
-- Indexes for table `guide_language`
--
ALTER TABLE `guide_language`
  ADD PRIMARY KEY (`glang_id`);

--
-- Indexes for table `guide_service`
--
ALTER TABLE `guide_service`
  ADD PRIMARY KEY (`gservice_id`);

--
-- Indexes for table `hotel`
--
ALTER TABLE `hotel`
  ADD PRIMARY KEY (`hotel_id`);

--
-- Indexes for table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`img_id`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `language`
--
ALTER TABLE `language`
  ADD PRIMARY KEY (`language_id`);

--
-- Indexes for table `meal`
--
ALTER TABLE `meal`
  ADD PRIMARY KEY (`meal_id`);

--
-- Indexes for table `other`
--
ALTER TABLE `other`
  ADD PRIMARY KEY (`other_id`);

--
-- Indexes for table `plan`
--
ALTER TABLE `plan`
  ADD PRIMARY KEY (`plan_id`);

--
-- Indexes for table `plane`
--
ALTER TABLE `plane`
  ADD PRIMARY KEY (`plane_id`);

--
-- Indexes for table `price_ranges`
--
ALTER TABLE `price_ranges`
  ADD PRIMARY KEY (`pr_id`);

--
-- Indexes for table `restaurant`
--
ALTER TABLE `restaurant`
  ADD PRIMARY KEY (`restaurant_id`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`room_id`);

--
-- Indexes for table `route`
--
ALTER TABLE `route`
  ADD PRIMARY KEY (`route_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staff_id`);

--
-- Indexes for table `staffgroup`
--
ALTER TABLE `staffgroup`
  ADD PRIMARY KEY (`staff_groupId`);

--
-- Indexes for table `tour`
--
ALTER TABLE `tour`
  ADD PRIMARY KEY (`tour_id`);

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
  MODIFY `address_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `agent`
--
ALTER TABLE `agent`
  MODIFY `agent_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `booking_paid`
--
ALTER TABLE `booking_paid`
  MODIFY `paid_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `car`
--
ALTER TABLE `car`
  MODIFY `car_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `city_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `client_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;
--
-- AUTO_INCREMENT for table `discount`
--
ALTER TABLE `discount`
  MODIFY `discount_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `entrance`
--
ALTER TABLE `entrance`
  MODIFY `ent_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `exchangerate`
--
ALTER TABLE `exchangerate`
  MODIFY `ex_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `flight`
--
ALTER TABLE `flight`
  MODIFY `flight_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `freerate`
--
ALTER TABLE `freerate`
  MODIFY `fr_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `guide`
--
ALTER TABLE `guide`
  MODIFY `guide_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `guide_language`
--
ALTER TABLE `guide_language`
  MODIFY `glang_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `guide_service`
--
ALTER TABLE `guide_service`
  MODIFY `gservice_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `hotel`
--
ALTER TABLE `hotel`
  MODIFY `hotel_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `image`
--
ALTER TABLE `image`
  MODIFY `img_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `language`
--
ALTER TABLE `language`
  MODIFY `language_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `meal`
--
ALTER TABLE `meal`
  MODIFY `meal_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `other`
--
ALTER TABLE `other`
  MODIFY `other_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `plan`
--
ALTER TABLE `plan`
  MODIFY `plan_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `plane`
--
ALTER TABLE `plane`
  MODIFY `plane_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `price_ranges`
--
ALTER TABLE `price_ranges`
  MODIFY `pr_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `restaurant`
--
ALTER TABLE `restaurant`
  MODIFY `restaurant_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `room_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `route`
--
ALTER TABLE `route`
  MODIFY `route_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `staff_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `staffgroup`
--
ALTER TABLE `staffgroup`
  MODIFY `staff_groupId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tour`
--
ALTER TABLE `tour`
  MODIFY `tour_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tour_address`
--
ALTER TABLE `tour_address`
  MODIFY `ta_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `tour_condition`
--
ALTER TABLE `tour_condition`
  MODIFY `tc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
