-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 20, 2017 at 11:19 AM
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
  `address_no` mediumtext,
  `address_province` varchar(50) NOT NULL,
  `geography_id` varchar(50) NOT NULL,
  `continent_id` varchar(50) NOT NULL,
  `country_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`address_id`, `address_no`, `address_province`, `geography_id`, `continent_id`, `country_id`) VALUES
(3, NULL, 'Hong kong', '2', '3', '94'),
(4, NULL, 'Tokyo', '2', '3', '113'),
(5, NULL, 'Bagan', '2', '3', '145'),
(6, NULL, 'Osaka', '2', '3', '113'),
(10, NULL, 'Mandalay', '2', '3', '145'),
(11, NULL, 'Inwa', '2', '3', '145'),
(12, NULL, 'Kyoto', '2', '3', '113'),
(13, NULL, 'Nagoya', '2', '3', '113'),
(14, NULL, 'Fuji', '2', '3', '113'),
(15, NULL, 'Taoyuan', '2', '3', '225'),
(16, NULL, 'Phuket', '6', '3', '215'),
(17, NULL, 'Taipei', '2', '3', '225'),
(18, NULL, 'Taitung', '1', '3', '225'),
(19, NULL, 'Yehliu', '1', '3', '225'),
(20, NULL, 'Jiufen', '1', '3', '225'),
(21, NULL, 'Trang', '6', '3', '215'),
(22, NULL, 'Satun', '6', '3', '215'),
(23, NULL, 'Trat', '6', '3', '215'),
(24, NULL, 'Rangoon', '2', '3', '145'),
(26, NULL, 'Chiang Mai', '1', '3', '215');

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
(1, 'TTSC0100110001', 247, 11, '{\"room\":[{\"Single room\":\"1\"}],\"date\":[{\"start\":\"2017-04-12\",\"end\":\"2017-04-16\"}],\"tourist\":[{\"totaltourist\":\"1\"}],\"total_amount\":[{\"amount\":\"12400\"}],\"touristinfo\":[{\"fullname\":\"test\",\"tel\":\"02222222\",\"passportImg\":\"0.png\",\"passportNo\":\"2222222\",\"dob\":\"1993-11-07\"}]}', '2017-04-04 20:31:20', 'booking', 12400.00, 0.00, 0.00, 'THB'),
(2, 'ITSC0100050001', 248, 5, '{\"room\":[{\"Single room\":\"1\"}],\"date\":[{\"start\":\"2017-04-06\",\"end\":\"2017-04-09\"}],\"tourist\":[{\"totaltourist\":\"1\"}],\"total_amount\":[{\"amount\":\"27400\"}],\"touristinfo\":[{\"fullname\":\"test2 test22\",\"tel\":\"8524513526\",\"passportImg\":\"0.jpeg\",\"passportNo\":\"12354312\",\"dob\":\"2017-04-03\"}]}', '2017-04-08 16:04:53', 'booking', 27400.00, 0.00, 0.00, 'THB'),
(4, 'ITSC0100040001', 252, 4, '{\"room\":[{\"Single room\":\"1\"}],\"date\":[{\"start\":\"2017-04-13\",\"end\":\"2017-04-17\"}],\"tourist\":[{\"totaltourist\":\"1\"}],\"total_amount\":[{\"amount\":\"45800\"}],\"touristinfo\":[{\"fullname\":\"test4 test44\",\"tel\":\"12352456\",\"passportImg\":\"0.jpeg\",\"passportNo\":\"123123\",\"dob\":\"2017-04-02\"}]}', '2017-04-08 16:26:38', 'booking', 45800.00, 0.00, 0.00, 'THB'),
(5, 'TTSC0100110002', 253, 11, '{\"room\":[{\"Single room\":\"1\"}],\"date\":[{\"start\":\"2017-04-12\",\"end\":\"2017-04-16\"}],\"tourist\":[{\"totaltourist\":\"1\"}],\"total_amount\":[{\"amount\":\"12400\"}],\"touristinfo\":[{\"fullname\":\"test1 test11\",\"tel\":\"0840789211\",\"passportImg\":\"0.jpeg\",\"passportNo\":\"7868757\",\"dob\":\"2017-04-02\"}]}', '2017-04-14 13:49:11', 'booking', 12400.00, 0.00, 0.00, 'THB'),
(6, 'ITSC0100040002', 253, 4, '{\"room\":[{\"Single room\":\"1\"}],\"date\":[{\"start\":\"2017-04-13\",\"end\":\"2017-04-17\"}],\"tourist\":[{\"totaltourist\":\"1\"}],\"total_amount\":[{\"amount\":\"45800\"}],\"touristinfo\":[{\"fullname\":\"test1  test11\",\"tel\":\"0840789211\",\"passportImg\":\"253\",\"passportNo\":\"7868757\",\"dob\":\"2017-04-02\"}]}', '2017-04-14 14:00:17', 'booking', 45800.00, 0.00, 0.00, 'THB'),
(7, 'ITSC0100140001', 258, 14, '{\"room\":[{\"roomtype\":\"Twin-room\",\"tourist_num\":1}],\"date\":[{\"start\":\"2016-11-11\",\"end\":\"2016-11-14\"}],\"tourist\":[{\"total_tourist\":1}],\"total_amount\":9400,\"touristinfo\":[{\"fullname\":\"test2 test22\",\"tel\":\"12352456\",\"passportImg\":\"0.jpeg\",\"passportNo\":\"23514625365894\",\"dob\":\"2017-04-01\"}]}', '2017-04-18 11:13:06', 'booking', 9400.00, 0.00, 0.00, 'THB'),
(8, 'ITSC0100040003', 258, 4, '{\"room\":[{\"roomtype\":\"Single room\",\"tourist_num\":1}],\"date\":[{\"start\":\"2017-04-19\",\"end\":\"2017-04-23\"}],\"tourist\":[{\"total_tourist\":\"1\"}],\"total_amount\":37800,\"touristinfo\":[{\"fullname\":\"test2  test22\",\"tel\":\"12352456\",\"passportImg\":\"258\",\"passportNo\":\"23514625365894\",\"dob\":\"2017-04-01\"}]}', '2017-04-18 11:29:16', 'booking', 37800.00, 0.00, 0.00, 'THB'),
(9, 'ITSC0100040004', 258, 4, '{\"room\":[{\"roomtype\":\"Single room\",\"tourist_num\":1}],\"date\":[{\"start\":\"2017-04-16\",\"end\":\"2017-04-20\"}],\"tourist\":[{\"total_tourist\":\"1\"}],\"total_amount\":36800,\"touristinfo\":[{\"fullname\":\"test2  test22\",\"tel\":\"12352456\",\"passportImg\":\"258\",\"passportNo\":\"23514625365894\",\"dob\":\"2017-04-01\"}]}', '2017-04-18 11:41:37', 'booking', 36800.00, 0.00, 0.00, 'THB'),
(10, 'ITSC0100140002', 258, 14, '{\"room\":[{\"roomtype\":\"Twin-room\",\"tourist_num\":1}],\"date\":[{\"start\":\"2016-11-11\",\"end\":\"2016-11-14\"}],\"tourist\":[{\"total_tourist\":1}],\"total_amount\":9400,\"touristinfo\":[{\"fullname\":\"test2  test22\",\"tel\":\"12352456\",\"passportImg\":\"258\",\"passportNo\":\"23514625365894\",\"dob\":\"2017-04-01\"}]}', '2017-04-18 11:41:54', 'booking', 9400.00, 0.00, 0.00, 'THB'),
(17, 'ITSC0100140003', 259, 14, '{\"room\":[{\"roomtype\":\"Single-room\",\"tourist_num\":2}],\"date\":[{\"start\":\"2017-04-21\",\"end\":\"2017-04-21\"}],\"tourist\":[{\"total_tourist\":2}],\"total_amount\":20800,\"touristinfo\":[{\"fullname\":\"test3  test33\",\"tel\":\"12312\",\"passportImg\":\"259\",\"passportNo\":\"12354312\",\"dob\":\"2017-04-02\"},{\"fullname\":\"asdasd asdasd\",\"tel\":\"12356456\",\"passportNo\":\"453123456\",\"dob\":\"2017-04-10\"}]}', '2017-04-20 10:00:59', 'booking', 20800.00, 0.00, 0.00, 'THB'),
(18, 'ITSC0100040005', 259, 4, '{\"room\":[{\"roomtype\":\"Single room\",\"tourist_num\":2}],\"date\":[{\"start\":\"2017-04-16\",\"end\":\"2017-04-20\"}],\"tourist\":[{\"total_tourist\":\"2\"}],\"total_amount\":73600,\"touristinfo\":[{\"fullname\":\"test3  test33\",\"tel\":\"12312\",\"passportImg\":\"259\",\"passportNo\":\"12354312\",\"dob\":\"2017-04-02\"},{\"fullname\":\"tsets tsetse\",\"tel\":\"131232\",\"passportImg\":\"259\",\"passportNo\":\"123123\",\"dob\":\"2017-04-03\"}]}', '2017-04-20 10:16:35', 'booking', 73600.00, 0.00, 0.00, 'THB');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `city_id` int(11) NOT NULL,
  `city_name` varchar(200) NOT NULL COMMENT 'ไทย|eng',
  `city_country` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(2, 'agent', '095125365', 'agent_1@gg.com', '123456789', NULL, 'AgentFirstName', NULL, 'AgentLastNAme', 'F', '1984-03-01', NULL, 'Thai', '4534538', '2', '17594231512', NULL, 1),
(247, 'normal', '02222222', 'test@test.com', '02222222', NULL, 'test', '', '', '', '1993-11-07', 'ssss', 'Thai', '2222222', '247', NULL, 'test', NULL),
(252, 'normal', '12352456', 'test4@mail.com', '12352456', NULL, 'test4', '', 'test44', '', '2017-04-02', 'zxczxc', 'Burkinabe', '123123', '252', NULL, '3123123', NULL),
(253, 'normal', '0840789211', 'test1@mail.com', '0840789211', NULL, 'test1', '', 'test11', '', '2017-04-02', 'asdasdasd', 'Burkinabe', '7868757', '253', NULL, '2313123546', NULL),
(258, 'normal', '12352456', 'test2@mail.com', '12352456', NULL, 'test2', '', 'test22', '', '2017-04-01', 'address', 'Burkinabe', '23514625365894', '258', NULL, 'line1', NULL),
(259, 'normal', '12312', 'test3@mail.com', '12312', NULL, 'test3', '', 'test33', '', '2017-04-02', 'address', 'Burkinabe', '12354312', '259', NULL, '123123', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `content`
--

CREATE TABLE `content` (
  `content_id` int(11) NOT NULL,
  `content_name` text NOT NULL,
  `content_detailTH` text NOT NULL,
  `content_detailEN` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `continents`
--

CREATE TABLE `continents` (
  `continent_id` int(11) NOT NULL,
  `continent_code` varchar(2) NOT NULL,
  `continent_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `continents`
--

INSERT INTO `continents` (`continent_id`, `continent_code`, `continent_name`) VALUES
(1, 'AF', 'Africa'),
(2, 'AN', 'Antarctica'),
(3, 'AS', 'Asia'),
(4, 'EU', 'Europe'),
(5, 'NA', 'North America'),
(6, 'OC', 'Oceania'),
(7, 'SA', 'South America');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `country_id` int(11) NOT NULL,
  `country_code` varchar(2) NOT NULL,
  `country_name` varchar(50) NOT NULL,
  `country_fullname` varchar(80) NOT NULL,
  `country_iso3` varchar(3) NOT NULL,
  `country_number` varchar(3) NOT NULL,
  `country_continent` varchar(2) NOT NULL,
  `country_nationality` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`country_id`, `country_code`, `country_name`, `country_fullname`, `country_iso3`, `country_number`, `country_continent`, `country_nationality`) VALUES
(1, 'AD', 'Andorra', 'Principality of Andorra', 'AND', '020', 'EU', 'Andorran'),
(2, 'AE', 'United Arab Emirates', 'United Arab Emirates', 'ARE', '784', 'AS', 'Emirian'),
(3, 'AF', 'Afghanistan', 'Islamic Republic of Afghanistan', 'AFG', '004', 'AS', 'Afghan'),
(4, 'AG', 'Antigua and Barbuda', 'Antigua and Barbuda', 'ATG', '028', 'NA', 'Antiguans, Barbudans'),
(5, 'AI', 'Anguilla', 'Anguilla', 'AIA', '660', 'NA', ''),
(6, 'AL', 'Albania', 'Republic of Albania', 'ALB', '008', 'EU', 'Albanian'),
(7, 'AM', 'Armenia', 'Republic of Armenia', 'ARM', '051', 'AS', 'Armenian'),
(8, 'AN', 'Netherlands Antilles', 'Netherlands Antilles', 'ANT', '530', 'NA', 'Dutch'),
(9, 'AO', 'Angola', 'Republic of Angola', 'AGO', '024', 'AF', 'Angolan'),
(10, 'AQ', 'Antarctica', 'Antarctica (the territory South of 60 deg S)', 'ATA', '010', 'AN', ''),
(11, 'AR', 'Argentina', 'Argentine Republic', 'ARG', '032', 'SA', 'Argentinean'),
(12, 'AS', 'American Samoa', 'American Samoa', 'ASM', '016', 'OC', ''),
(13, 'AT', 'Austria', 'Republic of Austria', 'AUT', '040', 'EU', 'Austrian'),
(14, 'AU', 'Australia', 'Commonwealth of Australia', 'AUS', '036', 'OC', 'Australian'),
(15, 'AW', 'Aruba', 'Aruba', 'ABW', '533', 'NA', ''),
(16, 'AX', 'Aland', 'Aland Islands', 'ALA', '248', 'EU', ''),
(17, 'AZ', 'Azerbaijan', 'Republic of Azerbaijan', 'AZE', '031', 'AS', 'Azerbaijani'),
(18, 'BA', 'Bosnia and Herzegovina', 'Bosnia and Herzegovina', 'BIH', '070', 'EU', 'Bosnian, Herzegovinian'),
(19, 'BB', 'Barbados', 'Barbados', 'BRB', '052', 'NA', 'Barbadian'),
(20, 'BD', 'Bangladesh', 'People\'s Republic of Bangladesh', 'BGD', '050', 'AS', 'Bangladeshi'),
(21, 'BE', 'Belgium', 'Kingdom of Belgium', 'BEL', '056', 'EU', 'Belgian'),
(22, 'BF', 'Burkina Faso', 'Burkina Faso', 'BFA', '854', 'AF', 'Burkinabe'),
(23, 'BG', 'Bulgaria', 'Republic of Bulgaria', 'BGR', '100', 'EU', 'Bulgarian'),
(24, 'BH', 'Bahrain', 'Kingdom of Bahrain', 'BHR', '048', 'AS', 'Bahraini'),
(25, 'BI', 'Burundi', 'Republic of Burundi', 'BDI', '108', 'AF', 'Burundian'),
(26, 'BJ', 'Benin', 'Republic of Benin', 'BEN', '204', 'AF', 'Beninese'),
(27, 'BL', 'Saint Barthélemy', 'Saint Barthelemy', 'BLM', '652', 'NA', ''),
(28, 'BM', 'Bermuda', 'Bermuda', 'BMU', '060', 'NA', ''),
(29, 'BN', 'Brunei Darussalam', 'Brunei Darussalam', 'BRN', '096', 'AS', 'Bruneian'),
(30, 'BO', 'Bolivia', 'Republic of Bolivia', 'BOL', '068', 'SA', 'Bolivian'),
(31, 'BR', 'Brazil', 'Federative Republic of Brazil', 'BRA', '076', 'SA', 'Brazilian'),
(32, 'BS', 'Bahamas', 'Commonwealth of the Bahamas', 'BHS', '044', 'NA', 'Bahamian'),
(33, 'BT', 'Bhutan', 'Kingdom of Bhutan', 'BTN', '064', 'AS', 'Bhutanese'),
(34, 'BV', 'Bouvet Island', 'Bouvet Island (Bouvetoya)', 'BVT', '074', 'AN', ''),
(35, 'BW', 'Botswana', 'Republic of Botswana', 'BWA', '072', 'AF', 'Batswana'),
(36, 'BY', 'Belarus', 'Republic of Belarus', 'BLR', '112', 'EU', 'Belarusian'),
(37, 'BZ', 'Belize', 'Belize', 'BLZ', '084', 'NA', 'Belizean'),
(38, 'CA', 'Canada', 'Canada', 'CAN', '124', 'NA', 'Canadian'),
(39, 'CC', 'Cocos (Keeling) Islands', 'Cocos (Keeling) Islands', 'CCK', '166', 'AS', ''),
(40, 'CD', 'Congo (Kinshasa)', 'Democratic Republic of the Congo', 'COD', '180', 'AF', 'Congolese'),
(41, 'CF', 'Central African Republic', 'Central African Republic', 'CAF', '140', 'AF', ''),
(42, 'CG', 'Congo (Brazzaville)', 'Republic of the Congo', 'COG', '178', 'AF', 'Congolese'),
(43, 'CH', 'Switzerland', 'Swiss Confederation', 'CHE', '756', 'EU', 'Swiss'),
(44, 'CI', 'Côte d\'Ivoire', 'Republic of Cote d\'Ivoire', 'CIV', '384', 'AF', 'Ivorian'),
(45, 'CK', 'Cook Islands', 'Cook Islands', 'COK', '184', 'OC', ''),
(46, 'CL', 'Chile', 'Republic of Chile', 'CHL', '152', 'SA', ''),
(47, 'CM', 'Cameroon', 'Republic of Cameroon', 'CMR', '120', 'AF', 'Cameroonian'),
(48, 'CN', 'China', 'People\'s Republic of China', 'CHN', '156', 'AS', 'Chinese'),
(49, 'CO', 'Colombia', 'Republic of Colombia', 'COL', '170', 'SA', 'Colombian'),
(50, 'CR', 'Costa Rica', 'Republic of Costa Rica', 'CRI', '188', 'NA', 'Costa Rican'),
(51, 'CU', 'Cuba', 'Republic of Cuba', 'CUB', '192', 'NA', 'Cuban'),
(52, 'CV', 'Cape Verde', 'Republic of Cape Verde', 'CPV', '132', 'AF', 'Cape Verdian'),
(53, 'CX', 'Christmas Island', 'Christmas Island', 'CXR', '162', 'AS', ''),
(54, 'CY', 'Cyprus', 'Republic of Cyprus', 'CYP', '196', 'AS', 'Cypriot'),
(55, 'CZ', 'Czech Republic', 'Czech Republic', 'CZE', '203', 'EU', 'Czech'),
(56, 'DE', 'Germany', 'Federal Republic of Germany', 'DEU', '276', 'EU', 'German'),
(57, 'DJ', 'Djibouti', 'Republic of Djibouti', 'DJI', '262', 'AF', 'Djibouti'),
(58, 'DK', 'Denmark', 'Kingdom of Denmark', 'DNK', '208', 'EU', 'Danish'),
(59, 'DM', 'Dominica', 'Commonwealth of Dominica', 'DMA', '212', 'NA', 'Dominican'),
(60, 'DO', 'Dominican Republic', 'Dominican Republic', 'DOM', '214', 'NA', 'Dominican'),
(61, 'DZ', 'Algeria', 'People\'s Democratic Republic of Algeria', 'DZA', '012', 'AF', 'Algerian'),
(62, 'EC', 'Ecuador', 'Republic of Ecuador', 'ECU', '218', 'SA', 'Ecuadorean'),
(63, 'EE', 'Estonia', 'Republic of Estonia', 'EST', '233', 'EU', 'Estonian'),
(64, 'EG', 'Egypt', 'Arab Republic of Egypt', 'EGY', '818', 'AF', 'Egyptian'),
(65, 'EH', 'Western Sahara', 'Western Sahara', 'ESH', '732', 'AF', ''),
(66, 'ER', 'Eritrea', 'State of Eritrea', 'ERI', '232', 'AF', 'Eritrean'),
(67, 'ES', 'Spain', 'Kingdom of Spain', 'ESP', '724', 'EU', 'Spanish'),
(68, 'ET', 'Ethiopia', 'Federal Democratic Republic of Ethiopia', 'ETH', '231', 'AF', 'Ethiopian'),
(69, 'FI', 'Finland', 'Republic of Finland', 'FIN', '246', 'EU', 'Finnish'),
(70, 'FJ', 'Fiji', 'Republic of the Fiji Islands', 'FJI', '242', 'OC', 'Fijian'),
(71, 'FK', 'Falkland Islands', 'Falkland Islands (Malvinas)', 'FLK', '238', 'SA', ''),
(72, 'FM', 'Micronesia', 'Federated States of Micronesia', 'FSM', '583', 'OC', ''),
(73, 'FO', 'Faroe Islands', 'Faroe Islands', 'FRO', '234', 'EU', ''),
(74, 'FR', 'France', 'French Republic', 'FRA', '250', 'EU', 'French'),
(75, 'GA', 'Gabon', 'Gabonese Republic', 'GAB', '266', 'AF', 'Gabonese'),
(76, 'GB', 'United Kingdom', 'United Kingdom of Great Britain & Northern Ireland', 'GBR', '826', 'EU', ''),
(77, 'GD', 'Grenada', 'Grenada', 'GRD', '308', 'NA', 'Grenadian'),
(78, 'GE', 'Georgia', 'Georgia', 'GEO', '268', 'AS', 'Georgian'),
(79, 'GF', 'French Guiana', 'French Guiana', 'GUF', '254', 'SA', ''),
(80, 'GG', 'Guernsey', 'Bailiwick of Guernsey', 'GGY', '831', 'EU', ''),
(81, 'GH', 'Ghana', 'Republic of Ghana', 'GHA', '288', 'AF', 'Ghanaian'),
(82, 'GI', 'Gibraltar', 'Gibraltar', 'GIB', '292', 'EU', ''),
(83, 'GL', 'Greenland', 'Greenland', 'GRL', '304', 'NA', ''),
(84, 'GM', 'Gambia', 'Republic of the Gambia', 'GMB', '270', 'AF', 'Gambian'),
(85, 'GN', 'Guinea', 'Republic of Guinea', 'GIN', '324', 'AF', 'Guinean'),
(86, 'GP', 'Guadeloupe', 'Guadeloupe', 'GLP', '312', 'NA', ''),
(87, 'GQ', 'Equatorial Guinea', 'Republic of Equatorial Guinea', 'GNQ', '226', 'AF', 'Equatorial Guinean'),
(88, 'GR', 'Greece', 'Hellenic Republic Greece', 'GRC', '300', 'EU', ''),
(89, 'GS', 'South Georgia and South Sandwich Islands', 'South Georgia and the South Sandwich Islands', 'SGS', '239', 'AN', ''),
(90, 'GT', 'Guatemala', 'Republic of Guatemala', 'GTM', '320', 'NA', 'Guatemalan'),
(91, 'GU', 'Guam', 'Guam', 'GUM', '316', 'OC', ''),
(92, 'GW', 'Guinea-Bissau', 'Republic of Guinea-Bissau', 'GNB', '624', 'AF', 'Guinea-Bissauan'),
(93, 'GY', 'Guyana', 'Co-operative Republic of Guyana', 'GUY', '328', 'SA', 'Guyanese'),
(94, 'HK', 'Hong Kong', 'Hong Kong Special Administrative Region of China', 'HKG', '344', 'AS', 'Hong Kong'),
(95, 'HM', 'Heard and McDonald Islands', 'Heard Island and McDonald Islands', 'HMD', '334', 'AN', ''),
(96, 'HN', 'Honduras', 'Republic of Honduras', 'HND', '340', 'NA', 'Honduran'),
(97, 'HR', 'Croatia', 'Republic of Croatia', 'HRV', '191', 'EU', 'Croatian'),
(98, 'HT', 'Haiti', 'Republic of Haiti', 'HTI', '332', 'NA', 'Haitian'),
(99, 'HU', 'Hungary', 'Republic of Hungary', 'HUN', '348', 'EU', 'Hungarian'),
(100, 'ID', 'Indonesia', 'Republic of Indonesia', 'IDN', '360', 'AS', 'Indonesian'),
(101, 'IE', 'Ireland', 'Ireland', 'IRL', '372', 'EU', 'Irish'),
(102, 'IL', 'Israel', 'State of Israel', 'ISR', '376', 'AS', 'Israeli'),
(103, 'IM', 'Isle of Man', 'Isle of Man', 'IMN', '833', 'EU', ''),
(104, 'IN', 'India', 'Republic of India', 'IND', '356', 'AS', 'Indian'),
(105, 'IO', 'British Indian Ocean Territory', 'British Indian Ocean Territory (Chagos Archipelago)', 'IOT', '086', 'AS', ''),
(106, 'IQ', 'Iraq', 'Republic of Iraq', 'IRQ', '368', 'AS', 'Iraqi'),
(107, 'IR', 'Iran', 'Islamic Republic of Iran', 'IRN', '364', 'AS', 'Iranian'),
(108, 'IS', 'Iceland', 'Republic of Iceland', 'ISL', '352', 'EU', 'Icelander'),
(109, 'IT', 'Italy', 'Italian Republic', 'ITA', '380', 'EU', 'Italian'),
(110, 'JE', 'Jersey', 'Bailiwick of Jersey', 'JEY', '832', 'EU', ''),
(111, 'JM', 'Jamaica', 'Jamaica', 'JAM', '388', 'NA', 'Jamaican'),
(112, 'JO', 'Jordan', 'Hashemite Kingdom of Jordan', 'JOR', '400', 'AS', 'Jordanian'),
(113, 'JP', 'Japan', 'Japan', 'JPN', '392', 'AS', 'Japanese'),
(114, 'KE', 'Kenya', 'Republic of Kenya', 'KEN', '404', 'AF', 'Kenyan'),
(115, 'KG', 'Kyrgyzstan', 'Kyrgyz Republic', 'KGZ', '417', 'AS', 'Kirghiz'),
(116, 'KH', 'Cambodia', 'Kingdom of Cambodia', 'KHM', '116', 'AS', 'Cambodian'),
(117, 'KI', 'Kiribati', 'Republic of Kiribati', 'KIR', '296', 'OC', 'I-Kiribati'),
(118, 'KM', 'Comoros', 'Union of the Comoros', 'COM', '174', 'AF', 'Comoran'),
(119, 'KN', 'Saint Kitts and Nevis', 'Federation of Saint Kitts and Nevis', 'KNA', '659', 'NA', 'Kittian, Nevisian'),
(120, 'KP', 'Korea, North', 'Democratic People\'s Republic of Korea', 'PRK', '408', 'AS', 'North Korean'),
(121, 'KR', 'Korea, South', 'Republic of Korea', 'KOR', '410', 'AS', 'South Korean'),
(122, 'KW', 'Kuwait', 'State of Kuwait', 'KWT', '414', 'AS', 'Kuwaiti'),
(123, 'KY', 'Cayman Islands', 'Cayman Islands', 'CYM', '136', 'NA', 'Central African'),
(124, 'KZ', 'Kazakhstan', 'Republic of Kazakhstan', 'KAZ', '398', 'AS', 'Kazakhstani'),
(125, 'LA', 'Laos', 'Lao People\'s Democratic Republic', 'LAO', '418', 'AS', 'Laotian'),
(126, 'LB', 'Lebanon', 'Lebanese Republic', 'LBN', '422', 'AS', 'Lebanese'),
(127, 'LC', 'Saint Lucia', 'Saint Lucia', 'LCA', '662', 'NA', 'Saint Lucian'),
(128, 'LI', 'Liechtenstein', 'Principality of Liechtenstein', 'LIE', '438', 'EU', 'Liechtensteiner'),
(129, 'LK', 'Sri Lanka', 'Democratic Socialist Republic of Sri Lanka', 'LKA', '144', 'AS', 'Sri Lankan'),
(130, 'LR', 'Liberia', 'Republic of Liberia', 'LBR', '430', 'AF', 'Liberian'),
(131, 'LS', 'Lesotho', 'Kingdom of Lesotho', 'LSO', '426', 'AF', 'Mosotho'),
(132, 'LT', 'Lithuania', 'Republic of Lithuania', 'LTU', '440', 'EU', 'Lithuanian'),
(133, 'LU', 'Luxembourg', 'Grand Duchy of Luxembourg', 'LUX', '442', 'EU', 'Luxembourger'),
(134, 'LV', 'Latvia', 'Republic of Latvia', 'LVA', '428', 'EU', 'Latvian'),
(135, 'LY', 'Libya', 'Libyan Arab Jamahiriya', 'LBY', '434', 'AF', 'Libyan'),
(136, 'MA', 'Morocco', 'Kingdom of Morocco', 'MAR', '504', 'AF', 'Moroccan'),
(137, 'MC', 'Monaco', 'Principality of Monaco', 'MCO', '492', 'EU', 'Monegasque'),
(138, 'MD', 'Moldova', 'Republic of Moldova', 'MDA', '498', 'EU', 'Moldovan'),
(139, 'ME', 'Montenegro', 'Republic of Montenegro', 'MNE', '499', 'EU', ''),
(140, 'MF', 'Saint Martin (French part)', 'Saint Martin', 'MAF', '663', 'NA', ''),
(141, 'MG', 'Madagascar', 'Republic of Madagascar', 'MDG', '450', 'AF', 'Malagasy'),
(142, 'MH', 'Marshall Islands', 'Republic of the Marshall Islands', 'MHL', '584', 'OC', 'Marshallese'),
(143, 'MK', 'Macedonia', 'Republic of Macedonia', 'MKD', '807', 'EU', 'Macedonian'),
(144, 'ML', 'Mali', 'Republic of Mali', 'MLI', '466', 'AF', 'Malian'),
(145, 'MM', 'Myanmar', 'Union of Myanmar', 'MMR', '104', 'AS', 'Burmese'),
(146, 'MN', 'Mongolia', 'Mongolia', 'MNG', '496', 'AS', ''),
(147, 'MO', 'Macau', 'Macao Special Administrative Region of China', 'MAC', '446', 'AS', ''),
(148, 'MP', 'Northern Mariana Islands', 'Commonwealth of the Northern Mariana Islands', 'MNP', '580', 'OC', ''),
(149, 'MQ', 'Martinique', 'Martinique', 'MTQ', '474', 'NA', ''),
(150, 'MR', 'Mauritania', 'Islamic Republic of Mauritania', 'MRT', '478', 'AF', 'Mauritanian'),
(151, 'MS', 'Montserrat', 'Montserrat', 'MSR', '500', 'NA', ''),
(152, 'MT', 'Malta', 'Republic of Malta', 'MLT', '470', 'EU', 'Maltese'),
(153, 'MU', 'Mauritius', 'Republic of Mauritius', 'MUS', '480', 'AF', 'Mauritian'),
(154, 'MV', 'Maldives', 'Republic of Maldives', 'MDV', '462', 'AS', 'Maldivan'),
(155, 'MW', 'Malawi', 'Republic of Malawi', 'MWI', '454', 'AF', 'Malawian'),
(156, 'MX', 'Mexico', 'United Mexican States', 'MEX', '484', 'NA', 'Mexican'),
(157, 'MY', 'Malaysia', 'Malaysia', 'MYS', '458', 'AS', 'Malaysian'),
(158, 'MZ', 'Mozambique', 'Republic of Mozambique', 'MOZ', '508', 'AF', 'Mozambican'),
(159, 'NA', 'Namibia', 'Republic of Namibia', 'NAM', '516', 'AF', 'Namibian'),
(160, 'NC', 'New Caledonia', 'New Caledonia', 'NCL', '540', 'OC', ''),
(161, 'NE', 'Niger', 'Republic of Niger', 'NER', '562', 'AF', 'Nigerien'),
(162, 'NF', 'Norfolk Island', 'Norfolk Island', 'NFK', '574', 'OC', ''),
(163, 'NG', 'Nigeria', 'Federal Republic of Nigeria', 'NGA', '566', 'AF', 'Nigerian'),
(164, 'NI', 'Nicaragua', 'Republic of Nicaragua', 'NIC', '558', 'NA', 'Nicaraguan'),
(165, 'NL', 'Netherlands', 'Kingdom of the Netherlands', 'NLD', '528', 'EU', 'Dutch'),
(166, 'NO', 'Norway', 'Kingdom of Norway', 'NOR', '578', 'EU', 'Norwegian'),
(167, 'NP', 'Nepal', 'State of Nepal', 'NPL', '524', 'AS', 'Nepalese'),
(168, 'NR', 'Nauru', 'Republic of Nauru', 'NRU', '520', 'OC', 'Nauruan'),
(169, 'NU', 'Niue', 'Niue', 'NIU', '570', 'OC', ''),
(170, 'NZ', 'New Zealand', 'New Zealand', 'NZL', '554', 'OC', 'New Zealander'),
(171, 'OM', 'Oman', 'Sultanate of Oman', 'OMN', '512', 'AS', 'Omani'),
(172, 'PA', 'Panama', 'Republic of Panama', 'PAN', '591', 'NA', 'Panamanian'),
(173, 'PE', 'Peru', 'Republic of Peru', 'PER', '604', 'SA', 'Peruvian'),
(174, 'PF', 'French Polynesia', 'French Polynesia', 'PYF', '258', 'OC', ''),
(175, 'PG', 'Papua New Guinea', 'Independent State of Papua New Guinea', 'PNG', '598', 'OC', 'Papua New Guinean'),
(176, 'PH', 'Philippines', 'Republic of the Philippines', 'PHL', '608', 'AS', 'Filipino'),
(177, 'PK', 'Pakistan', 'Islamic Republic of Pakistan', 'PAK', '586', 'AS', 'Pakistani'),
(178, 'PL', 'Poland', 'Republic of Poland', 'POL', '616', 'EU', 'Polish'),
(179, 'PM', 'Saint Pierre and Miquelon', 'Saint Pierre and Miquelon', 'SPM', '666', 'NA', ''),
(180, 'PN', 'Pitcairn', 'Pitcairn Islands', 'PCN', '612', 'OC', ''),
(181, 'PR', 'Puerto Rico', 'Commonwealth of Puerto Rico', 'PRI', '630', 'NA', ''),
(182, 'PS', 'Palestine', 'Occupied Palestinian Territory', 'PSE', '275', 'AS', ''),
(183, 'PT', 'Portugal', 'Portuguese Republic', 'PRT', '620', 'EU', 'Portuguese'),
(184, 'PW', 'Palau', 'Republic of Palau', 'PLW', '585', 'OC', 'Palauan'),
(185, 'PY', 'Paraguay', 'Republic of Paraguay', 'PRY', '600', 'SA', 'Paraguayan'),
(186, 'QA', 'Qatar', 'State of Qatar', 'QAT', '634', 'AS', 'Qatari'),
(187, 'RE', 'Reunion', 'Reunion', 'REU', '638', 'AF', ''),
(188, 'RO', 'Romania', 'Romania', 'ROU', '642', 'EU', 'Romanian'),
(189, 'RS', 'Serbia', 'Republic of Serbia', 'SRB', '688', 'EU', 'Serbian'),
(190, 'RU', 'Russian Federation', 'Russian Federation', 'RUS', '643', 'EU', 'Russian'),
(191, 'RW', 'Rwanda', 'Republic of Rwanda', 'RWA', '646', 'AF', 'Rwandan'),
(192, 'SA', 'Saudi Arabia', 'Kingdom of Saudi Arabia', 'SAU', '682', 'AS', 'Saudi Arabian'),
(193, 'SB', 'Solomon Islands', 'Solomon Islands', 'SLB', '090', 'OC', 'Solomon Islander'),
(194, 'SC', 'Seychelles', 'Republic of Seychelles', 'SYC', '690', 'AF', 'Seychellois'),
(195, 'SD', 'Sudan', 'Republic of Sudan', 'SDN', '736', 'AF', 'Sudanese'),
(196, 'SE', 'Sweden', 'Kingdom of Sweden', 'SWE', '752', 'EU', 'Swedish'),
(197, 'SG', 'Singapore', 'Republic of Singapore', 'SGP', '702', 'AS', 'Singaporean'),
(198, 'SH', 'Saint Helena', 'Saint Helena', 'SHN', '654', 'AF', ''),
(199, 'SI', 'Slovenia', 'Republic of Slovenia', 'SVN', '705', 'EU', 'Slovene'),
(200, 'SJ', 'Svalbard and Jan Mayen Islands', 'Svalbard & Jan Mayen Islands', 'SJM', '744', 'EU', ''),
(201, 'SK', 'Slovakia', 'Slovakia (Slovak Republic)', 'SVK', '703', 'EU', 'Slovak'),
(202, 'SL', 'Sierra Leone', 'Republic of Sierra Leone', 'SLE', '694', 'AF', 'Sierra Leonean'),
(203, 'SM', 'San Marino', 'Republic of San Marino', 'SMR', '674', 'EU', 'Sammarinese'),
(204, 'SN', 'Senegal', 'Republic of Senegal', 'SEN', '686', 'AF', 'Senegalese'),
(205, 'SO', 'Somalia', 'Somali Republic', 'SOM', '706', 'AF', 'Somali'),
(206, 'SR', 'Suriname', 'Republic of Suriname', 'SUR', '740', 'SA', 'Surinamer'),
(207, 'ST', 'Sao Tome and Principe', 'Democratic Republic of Sao Tome and Principe', 'STP', '678', 'AF', 'Sao Tomean'),
(208, 'SV', 'El Salvador', 'Republic of El Salvador', 'SLV', '222', 'NA', 'Salvadoran'),
(209, 'SY', 'Syria', 'Syrian Arab Republic', 'SYR', '760', 'AS', 'Syrian'),
(210, 'SZ', 'Swaziland', 'Kingdom of Swaziland', 'SWZ', '748', 'AF', 'Swazi'),
(211, 'TC', 'Turks and Caicos Islands', 'Turks and Caicos Islands', 'TCA', '796', 'NA', ''),
(212, 'TD', 'Chad', 'Republic of Chad', 'TCD', '148', 'AF', 'Chadian'),
(213, 'TF', 'French Southern Lands', 'French Southern Territories', 'ATF', '260', 'AN', ''),
(214, 'TG', 'Togo', 'Togolese Republic', 'TGO', '768', 'AF', 'Togolese'),
(215, 'TH', 'Thailand', 'Kingdom of Thailand', 'THA', '764', 'AS', 'Thai'),
(216, 'TJ', 'Tajikistan', 'Republic of Tajikistan', 'TJK', '762', 'AS', 'Tadzhik'),
(217, 'TK', 'Tokelau', 'Tokelau', 'TKL', '772', 'OC', ''),
(218, 'TL', 'Timor-Leste', 'Democratic Republic of Timor-Leste', 'TLS', '626', 'AS', 'East Timorese'),
(219, 'TM', 'Turkmenistan', 'Turkmenistan', 'TKM', '795', 'AS', 'Turkmen'),
(220, 'TN', 'Tunisia', 'Tunisian Republic', 'TUN', '788', 'AF', 'Tunisian'),
(221, 'TO', 'Tonga', 'Kingdom of Tonga', 'TON', '776', 'OC', 'Tongan'),
(222, 'TR', 'Turkey', 'Republic of Turkey', 'TUR', '792', 'AS', 'Turkish'),
(223, 'TT', 'Trinidad and Tobago', 'Republic of Trinidad and Tobago', 'TTO', '780', 'NA', 'Trinidadian'),
(224, 'TV', 'Tuvalu', 'Tuvalu', 'TUV', '798', 'OC', 'Tuvaluan'),
(225, 'TW', 'Taiwan', 'Taiwan', 'TWN', '158', 'AS', 'Taiwanese'),
(226, 'TZ', 'Tanzania', 'United Republic of Tanzania', 'TZA', '834', 'AF', 'Tanzanian'),
(227, 'UA', 'Ukraine', 'Ukraine', 'UKR', '804', 'EU', 'Ukrainian'),
(228, 'UG', 'Uganda', 'Republic of Uganda', 'UGA', '800', 'AF', 'Ugandan'),
(229, 'UM', 'United States Minor Outlying Islands', 'United States Minor Outlying Islands', 'UMI', '581', 'OC', ''),
(230, 'US', 'United States of America', 'United States of America', 'USA', '840', 'NA', 'American'),
(231, 'UY', 'Uruguay', 'Eastern Republic of Uruguay', 'URY', '858', 'SA', 'Uruguayan'),
(232, 'UZ', 'Uzbekistan', 'Republic of Uzbekistan', 'UZB', '860', 'AS', 'Uzbekistani'),
(233, 'VA', 'Vatican City', 'Holy See (Vatican City State)', 'VAT', '336', 'EU', 'none'),
(234, 'VC', 'Saint Vincent and the Grenadines', 'Saint Vincent and the Grenadines', 'VCT', '670', 'NA', ''),
(235, 'VE', 'Venezuela', 'Bolivarian Republic of Venezuela', 'VEN', '862', 'SA', 'Venezuelan'),
(236, 'VG', 'Virgin Islands, British', 'British Virgin Islands', 'VGB', '092', 'NA', ''),
(237, 'VI', 'Virgin Islands, U.S.', 'United States Virgin Islands', 'VIR', '850', 'NA', ''),
(238, 'VN', 'Vietnam', 'Socialist Republic of Vietnam', 'VNM', '704', 'AS', 'Vietnamese'),
(239, 'VU', 'Vanuatu', 'Republic of Vanuatu', 'VUT', '548', 'OC', 'Ni-Vanuatu'),
(240, 'WF', 'Wallis and Futuna Islands', 'Wallis and Futuna', 'WLF', '876', 'OC', ''),
(241, 'WS', 'Samoa', 'Independent State of Samoa', 'WSM', '882', 'OC', 'Samoan'),
(242, 'YE', 'Yemen', 'Yemen', 'YEM', '887', 'AS', 'Yemeni'),
(243, 'YT', 'Mayotte', 'Mayotte', 'MYT', '175', 'AF', ''),
(244, 'ZA', 'South Africa', 'Republic of South Africa', 'ZAF', '710', 'AF', 'South African'),
(245, 'ZM', 'Zambia', 'Republic of Zambia', 'ZMB', '894', 'AF', 'Zambian'),
(246, 'ZW', 'Zimbabwe', 'Republic of Zimbabwe', 'ZWE', '716', 'AF', 'Zimbabwean');

-- --------------------------------------------------------

--
-- Table structure for table `discount`
--

CREATE TABLE `discount` (
  `discount_id` int(11) NOT NULL,
  `discount_type` varchar(20) NOT NULL,
  `discount_rate` double NOT NULL,
  `discount_isPercent` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `entrance`
--

CREATE TABLE `entrance` (
  `ent_id` int(11) NOT NULL,
  `ent_name` varchar(200) NOT NULL,
  `ent_detail` text NOT NULL,
  `city_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `freerate`
--

CREATE TABLE `freerate` (
  `fr_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `fr_upTo` int(11) NOT NULL,
  `fr_freePax` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `geography`
--

CREATE TABLE `geography` (
  `geography_id` int(11) NOT NULL,
  `geography_nameTH` varchar(50) NOT NULL,
  `geography_nameEN` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `geography`
--

INSERT INTO `geography` (`geography_id`, `geography_nameTH`, `geography_nameEN`) VALUES
(1, 'ภาคเหนือ', 'Northern'),
(2, 'ภาคกลาง', 'Central'),
(3, 'ภาคตะวันออกเฉียงเหนือ', 'Northeast'),
(4, 'ภาคตะวันตก', 'Western'),
(5, 'ภาคตะวันออก', 'Eastern'),
(6, 'ภาคใต้', 'Southern');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `guide_language`
--

CREATE TABLE `guide_language` (
  `glang_id` int(11) NOT NULL,
  `guide_id` int(11) NOT NULL,
  `language_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(3, 'tour cover', 3, 'filestorage/image/tour/3.jpg'),
(4, 'tour cover', 4, 'filestorage/image/tour/4.jpg'),
(5, 'tour cover', 5, 'filestorage/image/tour/5.jpg'),
(6, 'tour cover', 6, 'filestorage/image/tour/6.jpg'),
(7, 'tour cover', 7, 'filestorage/image/tour/7.jpg'),
(8, 'tour cover', 8, 'filestorage/image/tour/8.jpg'),
(9, 'tour cover', 9, 'filestorage/image/tour/9.jpg'),
(10, 'tour cover', 10, 'filestorage/image/tour/10.jpg'),
(14, 'tour cover', 11, 'filestorage/image/tour/11.jpg'),
(15, 'tour cover', 12, 'filestorage/image/tour/12.jpg'),
(17, 'tour cover', 14, 'filestorage/image/tour/14.jpg');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `language`
--

CREATE TABLE `language` (
  `language_id` int(11) NOT NULL,
  `language_name` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
-- Table structure for table `meal`
--

CREATE TABLE `meal` (
  `meal_id` int(11) NOT NULL,
  `restaurant_id` int(11) NOT NULL,
  `meal_type` varchar(100) NOT NULL,
  `meal_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `other`
--

CREATE TABLE `other` (
  `other_id` int(11) NOT NULL,
  `other_type` varchar(100) NOT NULL,
  `other_detail` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `province`
--

CREATE TABLE `province` (
  `province_id` int(5) NOT NULL,
  `province_code` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `province_nameTH` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `province_nameEN` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `geography_id` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `province`
--

INSERT INTO `province` (`province_id`, `province_code`, `province_nameTH`, `province_nameEN`, `geography_id`) VALUES
(1, '10', 'กรุงเทพมหานคร   ', 'Bangkok', 2),
(2, '11', 'สมุทรปราการ   ', 'Samut Prakan', 2),
(3, '12', 'นนทบุรี   ', 'Nonthaburi', 2),
(4, '13', 'ปทุมธานี   ', 'Pathum Thani', 2),
(5, '14', 'พระนครศรีอยุธยา   ', 'Phra Nakhon Si Ayutthaya', 2),
(6, '15', 'อ่างทอง   ', 'Ang Thong', 2),
(7, '16', 'ลพบุรี   ', 'Loburi', 2),
(8, '17', 'สิงห์บุรี   ', 'Sing Buri', 2),
(9, '18', 'ชัยนาท   ', 'Chai Nat', 2),
(10, '19', 'สระบุรี', 'Saraburi', 2),
(11, '20', 'ชลบุรี   ', 'Chon Buri', 5),
(12, '21', 'ระยอง   ', 'Rayong', 5),
(13, '22', 'จันทบุรี   ', 'Chanthaburi', 5),
(14, '23', 'ตราด   ', 'Trat', 5),
(15, '24', 'ฉะเชิงเทรา   ', 'Chachoengsao', 5),
(16, '25', 'ปราจีนบุรี   ', 'Prachin Buri', 5),
(17, '26', 'นครนายก   ', 'Nakhon Nayok', 2),
(18, '27', 'สระแก้ว   ', 'Sa Kaeo', 5),
(19, '30', 'นครราชสีมา   ', 'Nakhon Ratchasima', 3),
(20, '31', 'บุรีรัมย์   ', 'Buri Ram', 3),
(21, '32', 'สุรินทร์   ', 'Surin', 3),
(22, '33', 'ศรีสะเกษ   ', 'Si Sa Ket', 3),
(23, '34', 'อุบลราชธานี   ', 'Ubon Ratchathani', 3),
(24, '35', 'ยโสธร   ', 'Yasothon', 3),
(25, '36', 'ชัยภูมิ   ', 'Chaiyaphum', 3),
(26, '37', 'อำนาจเจริญ   ', 'Amnat Charoen', 3),
(27, '39', 'หนองบัวลำภู   ', 'Nong Bua Lam Phu', 3),
(28, '40', 'ขอนแก่น   ', 'Khon Kaen', 3),
(29, '41', 'อุดรธานี   ', 'Udon Thani', 3),
(30, '42', 'เลย   ', 'Loei', 3),
(31, '43', 'หนองคาย   ', 'Nong Khai', 3),
(32, '44', 'มหาสารคาม   ', 'Maha Sarakham', 3),
(33, '45', 'ร้อยเอ็ด   ', 'Roi Et', 3),
(34, '46', 'กาฬสินธุ์   ', 'Kalasin', 3),
(35, '47', 'สกลนคร   ', 'Sakon Nakhon', 3),
(36, '48', 'นครพนม   ', 'Nakhon Phanom', 3),
(37, '49', 'มุกดาหาร   ', 'Mukdahan', 3),
(38, '50', 'เชียงใหม่   ', 'Chiang Mai', 1),
(39, '51', 'ลำพูน   ', 'Lamphun', 1),
(40, '52', 'ลำปาง   ', 'Lampang', 1),
(41, '53', 'อุตรดิตถ์   ', 'Uttaradit', 1),
(42, '54', 'แพร่   ', 'Phrae', 1),
(43, '55', 'น่าน   ', 'Nan', 1),
(44, '56', 'พะเยา   ', 'Phayao', 1),
(45, '57', 'เชียงราย   ', 'Chiang Rai', 1),
(46, '58', 'แม่ฮ่องสอน   ', 'Mae Hong Son', 1),
(47, '60', 'นครสวรรค์   ', 'Nakhon Sawan', 2),
(48, '61', 'อุทัยธานี   ', 'Uthai Thani', 2),
(49, '62', 'กำแพงเพชร   ', 'Kamphaeng Phet', 2),
(50, '63', 'ตาก   ', 'Tak', 4),
(51, '64', 'สุโขทัย   ', 'Sukhothai', 2),
(52, '65', 'พิษณุโลก   ', 'Phitsanulok', 2),
(53, '66', 'พิจิตร   ', 'Phichit', 2),
(54, '67', 'เพชรบูรณ์   ', 'Phetchabun', 2),
(55, '70', 'ราชบุรี   ', 'Ratchaburi', 4),
(56, '71', 'กาญจนบุรี   ', 'Kanchanaburi', 4),
(57, '72', 'สุพรรณบุรี   ', 'Suphan Buri', 2),
(58, '73', 'นครปฐม   ', 'Nakhon Pathom', 2),
(59, '74', 'สมุทรสาคร   ', 'Samut Sakhon', 2),
(60, '75', 'สมุทรสงคราม   ', 'Samut Songkhram', 2),
(61, '76', 'เพชรบุรี   ', 'Phetchaburi', 4),
(62, '77', 'ประจวบคีรีขันธ์   ', 'Prachuap Khiri Khan', 4),
(63, '80', 'นครศรีธรรมราช   ', 'Nakhon Si Thammarat', 6),
(64, '81', 'กระบี่   ', 'Krabi', 6),
(65, '82', 'พังงา   ', 'Phangnga', 6),
(66, '83', 'ภูเก็ต   ', 'Phuket', 6),
(67, '84', 'สุราษฎร์ธานี   ', 'Surat Thani', 6),
(68, '85', 'ระนอง   ', 'Ranong', 6),
(69, '86', 'ชุมพร   ', 'Chumphon', 6),
(70, '90', 'สงขลา   ', 'Songkhla', 6),
(71, '91', 'สตูล   ', 'Satun', 6),
(72, '92', 'ตรัง   ', 'Trang', 6),
(73, '93', 'พัทลุง   ', 'Phatthalung', 6),
(74, '94', 'ปัตตานี   ', 'Pattani', 6),
(75, '95', 'ยะลา   ', 'Yala', 6),
(76, '96', 'นราธิวาส   ', 'Narathiwat', 6),
(77, '97', 'บึงกาฬ', 'buogkan', 3);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `staffgroup`
--

CREATE TABLE `staffgroup` (
  `staff_groupId` int(11) NOT NULL,
  `staff_groupName` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `tour_currency` varchar(10) NOT NULL,
  `tour_isHilight` tinyint(1) NOT NULL,
  `tour_season` tinyint(1) NOT NULL,
  `tour_agentId` int(11) NOT NULL,
  `tour_openBooking` date NOT NULL,
  `tour_closeBooking` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tour`
--

INSERT INTO `tour` (`tour_id`, `tour_nationality`, `tour_nameTH`, `tour_nameEN`, `tour_nameSlug`, `tour_type`, `tour_overview`, `tour_desc`, `tour_briefing`, `tour_imgCover`, `tour_pdf`, `tour_dayNight`, `tour_startPrice`, `tour_priceRange`, `tour_privateGroup`, `tour_discountRate`, `tour_doublePack`, `tour_currency`, `tour_isHilight`, `tour_season`, `tour_agentId`, `tour_openBooking`, `tour_closeBooking`) VALUES
(3, 'international tour', 'ฮ่องกง นอนปิง', 'Easy amazing hongkong by CX', 'Easy-amazing-hongkong-by-CX', 'sp', 'ทัวร์ฮ่องกง ? พระใหญ่นองปิง 3 วัน 2 คืน\r\nเดินทางโดยสายการบิน CATHAY PACIFIC โหลดกระเป๋าได้ 30 กิโลกรัม\r\nพิเศษ !!! บริการอาหารร้อนและเครื่องดื่มบนเครื่อง', '<ul>\n<li>นั่งกระเช้านองปิง สักการะพระใหญ่พระพุทธรูปนั่งปรางสมาธิทองสัมฤทธิ์</li>\n<li>ช้อปปิ้ง CITY GATE OUTLET  ศูนย์รวมสินค้ามากมาย</li>\n<li>ชมวัดแชกงหมิว (วัดกังหัน) สิ่งศักสิทธิ์ที่นิยมที่สุดในฮ่องกง</li>\n<li>ชม REPULSE BAY หาดทรายรูปจันทร์เสี้ยว</li>\n<li>ชม VICTORIA  PEAK  จุดชมวิวที่สวยที่สุดในฮ่องกง</li>\n<li>นั่ง รถรางพีคแทรม ขึ้นสู่จุดชมวิวเดอะพีค</li>\n<li>ช๊อปปิ้ง ย่านจิมซาจุ่ยและโอเซี่ยนเทอร์มินอล สนุกสนานกับการเลือกสินค้าราคาพิเศษ</li>\n<li>อิสระเต็มอิ่มกับการช๊อปปิ้งตามอัธยาศัย</li>\n<li>พิเศษ !!!  เมนู ติ่มซำ ซาลาเปา ขนมจีบ โจ๊กฮ่องกง</li></ul><br>\n<b>ก่อนตัดสินใจจองทัวร์ ควรอ่านเงื่อนไขการเดินทางอย่างถ่องแท้ แล้วจึงวางมัดจำ \nเพื่อประโยชน์ของท่านเอง</b><br>\nการเดินทางในแต่ละครั้งจะต้องมีผู้เดินทางจำนวน 25 ท่านขึ้นไป\nถ้าผู้เดินทางไม่ครบจำนวนดังกล่าว บริษัทฯ ขอสงวนสิทธิ์ในการ เลื่อนการเดินทาง หรือ เปลี่ยนแปลงราคา<br>\n<b>ยังไม่รวมค่าทิปไกด์ และคนขับรถท่านละ 120 HKD ตลอดทริป</b><br>\nกรุณาชำระมัดจำท่านละ 5,000 บาท ภายใน 3 วันหลังจากที่ทำการจอง \nหากไม่ชำระภายในวันที่กำหนด ทางบริษัทขออนุญาตตัดที่นั่งตามเงื่อนไข\n\n', '[{\"route\":\"กรุงเทพฯ - ฮ่องกง - หมูบ้านนองปิง - อิสระช้อปปิ้ง City Gate Outlet\",\"hotel\":\"MK HOTEL / CRUISE HOTEL\"},{\"route\":\"ติ่มซำ - วัดแชกงหมิว - จุดชมวิววิคตอเรียพีค - รถรางขึ้นพีคแทรม - หาดรีพลัสเบย์ - โรงงานจิวเวอรี่ - ช้อปปิ้งจิมซาจุ่ยและโอเชี่ยนเทอร์มินอล\",\"hotel\":\"MK HOTEL / CRUISE HOTEL\",\"route\":\"อิสระตามอัธยาศัย - กรุงเทพฯ\",\"hotel\":\"\"}]', 3, '3.pdf', '3,2', 14900.00, '[{ \"from\": \"2017-03-19\", \"to\": \"2017-03-21\", \"price\": 13900},\n { \"from\": \"2017-03-25\", \"to\": \"2017-03-27\", \"price\": 13900}\n ]', 0, NULL, 0, 'THB', 0, 0, 1, '2017-02-19', '2017-03-27'),
(4, 'international tour', 'ญี่ปุ่น โตเกียว ฟูจิ 5 วัน 3 คืน', 'Easy Beautiful Tokyo(mar-apr\'17)', 'Easy-Beautiful-Tokyo(mar-apr-17)', 'sp', 'พักออนเซ็น 1 คืน นาริตะ 2 คืน / อิสระฟรีเดย์ 1 วัน<br>\r\nเดินทางโดยสายการบิน SCOOT AIRLINES โหลดกระเป๋าได้ 20 กิโลกรัม<br>\r\nเครื่องลำใหญ่ Boeing 787 Dreamliner\r\n', '<ul>\r\n<li>มรดกโลกทางวัฒนธรรม ภูเขาไฟฟูจิ สถานที่ศักดิ์สิทธิ์และแหล่งบันดาลใจทางศิลปะ</li>\r\n<li>สักการะ วัดนาริตะซัน ขอพรเพื่อความเป็นสิริมงคล</li>\r\n<li>หมู่บ้านโอชิโนะฮัคไค  เป็นหมู่บ้านที่มีบ่อน้ำซึ่งเกิดจากการละลายของหิมะบนภูเขาไฟฟูจิ</li>\r\n<li>มรดกโลกทางวัฒนธรรม ภูเขาไฟฟูจิ สถานที่ศักดิ์สิทธิ์และแหล่งบันดาลใจทางศิลปะ</li>\r\n<li>อิสระ 1 วัน ให้ช้อปปิ้งจุใจ ย่านชินจุกุ ย่านฮาราจุกุ ย่านชิบูย่า แหล่งช้อปปิ้งชั้นนำของญี่ปุ่น</li>\r\n<li>สัมผัสประสบการณ์ อาบน้ำแร่ออนเซ็น ให้ท่านได้ผ่อนคลายความเมื่อยล้า</li>\r\n<li>พิเศษ!!! ขาปูยักษ์ และ Free Wi-Fi ตลอดการเดินทาง</li>\r\n<li>ช่วงเทศกาลซากุระ (ประมาณปลายเดือนมี.ค. ? ต้นเดือนเม.ย.) นำท่านชมซากุระบานสะพรั่งที่สวนอุเอโนะ</li>\r\n<br>\r\n<b>ก่อนตัดสินใจจองทัวร์ ควรอ่านเงื่อนไขการเดินทางอย่างถ่องแท้ แล้วจึงวางมัดจำ \r\nเพื่อประโยชน์ของท่านเอง</b>\r\n<i>การเดินทางในแต่ละครั้งจะต้องมีผู้เดินทางจำนวน 30 ท่านขึ้นไป\r\nถ้าผู้เดินทางไม่ครบจำนวนดังกล่าว บริษัทฯ ขอสงวนสิทธิ์ในการ เลื่อนการเดินทาง หรือ เปลี่ยนแปลงราคา\r\n</i>\r\n<br>\r\n<br>\r\n1. โรงแรมที่ญี่ปุ่นห้องค่อนข้างเล็ก และบางโรงแรมไม่มีห้องสำหรับนอน 3 ท่าน ท่านอาจจะต้องพักเป็นห้องที่นอน 2 ท่าน และห้องที่นอน 1 ท่าน (แยกเป็น 2 ห้อง) และในกรณีที่พัก 2 ท่าน บางโรงแรมอาจจะไม่มีเตียงทวิน ทางบริษัทขอสงวนสิทธิ์ในการจัดห้องพักเป็นเตียงดับเบิ้ลสำหรับนอน 2 ท่าน\r\n<br>\r\n<br>\r\n2. รายการท่องเที่ยวอาจมีการสลับหรือเปลี่ยนแปลงได้ตามความเหมาะสมโดยมิแจ้งให้ทราบล่วงหน้า\r\nในกรณีที่มีเหตุการณ์สุดวิสัย หรือภัยธรรมชาติ หรือเหตุการณ์ที่ไม่ได้อยู่ภายใต้การควบคุมของบริษัทฯ \r\nเนื่องจากบริษัทรถทัวร์ของญี่ปุ่นสามารถใช้รถได้ 12 ชั่วโมง / วัน หากเกิดเหตุการณ์สุดวิสัย ทางบริษัทของสงวนสิทธิ์ในการสลับหรือเปลี่ยนแปลงโปรแกรมตามความเหมาะสม ทั้งนี้ บริษัทฯ จะคำนึงถึงความปลอดภัย ตลอดจนผลประโยชน์ของคณะเป็นสำคัญ\r\n<br>\r\n<br>\r\n<b>ยังไม่รวมค่าทิปไกด์ และคนขับรถท่านละ 120 HKD ตลอดทริป</b>\r\n<br>\r\n<br>\r\nกรุณาชำระมัดจำท่านละ 5,000 บาท ภายใน 3 วันหลังจากที่ทำการจอง \r\nหากไม่ชำระภายในวันที่กำหนด ทางบริษัทขออนุญาตตัดที่นั่งตามเงื่อนไข\r\n<br>\r\n<br>\r\n<u style=\"color:red;\">ยังไม่รวมค่าทิปไกด์ และคนขับรถท่านละ 3,000 เยน ตลอดทริป \r\nกรุณาชำระมัดจำท่านละ 15,000 บาท ภายใน 3 วันหลังจากที่ทำการจอง \r\nหากไม่ชำระภายในวันที่กำหนด ทางบริษัทขออนุญาตตัดที่นั่งตามเงื่อนไข</u>\r\n\r\n', '[{\"route\":\"กรุงเทพฯ - โตเกียว\",\"hotel\":\"\"},{\"route\":\"วัดนาริตะ - ร้านดองกี้โฮเต้ - วัดอาซากุสะ - จุดชมวิว Tokyo Sky Tree -  แช่น้ำแร่ร้อน\",\"hotel\":\"Atami New Fujiya Hotel / Just One Hotel\"},{\"route\":\"ภูเขาไฟฟูจิ ชั้น 5 (ขึ้นอยู่กับสภาพถูมิอากาศ) - หมู่บ้านน้ำใสโอชิโนะฮัคไค - พิพิธภัณฑ์แผ่นดินไหวโตเกียว - ช้อปปิ้งชินจุกุ\",\"hotel\":\"Narita View Hotel / Narita Tobu Hotel \"},{\"route\":\"อิสระตามอัธยาศัย หรือ ท่านสามารถเลือกซื้อตั๋ว Tokyo Disneyland - ช่วงเทศกาลซากุระ ประมาณปลายเดือนมี.ค. - ต้นเดือนเม.ย.) นำท่านชมซากุระบานสะพรั่งที่สวนอุเอโนะ\",\"hotel\":\"Narita View Hotel / Narita Tobu Hotel\"},{\"route\":\"สนามบินนาริตะ - กรุงเทพฯ\",\"hotel\":\"\"}]', 4, '4.pdf', '5,4', 25900.00, '[{ \"from\": \"2017-03-06\", \"to\": \"2017-03-10\", \"price\": 25900},\n { \"from\": \"2017-03-12\", \"to\": \"2017-03-16\", \"price\": 25900},\n { \"from\": \"2017-03-14\", \"to\": \"2017-03-18\", \"price\": 27900},\n { \"from\": \"2017-03-16\", \"to\": \"2017-03-20\", \"price\": 27900},\n  { \"from\": \"2017-03-18\", \"to\": \"2017-03-22\", \"price\": 28900},\n  { \"from\": \"2017-03-20\", \"to\": \"2017-03-24\", \"price\": 29900},\n  { \"from\": \"2017-03-24\", \"to\": \"2017-03-28\", \"price\": 29900},\n  { \"from\": \"2017-03-26\", \"to\": \"2017-03-30\", \"price\": 29900},\n  { \"from\": \"2017-03-29\", \"to\": \"2017-04-20\", \"price\": 29900},\n  { \"from\": \"2017-04-01\", \"to\": \"2017-04-05\", \"price\": 29900},\n  { \"from\": \"2017-04-04\", \"to\": \"2017-04-08\", \"price\": 29900},\n  { \"from\": \"2017-04-10\", \"to\": \"2017-04-14\", \"price\": 35900},\n  { \"from\": \"2017-04-13\", \"to\": \"2017-04-17\", \"price\": 37900},\n  { \"from\": \"2017-04-16\", \"to\": \"2017-04-20\", \"price\": 28900},\n  { \"from\": \"2017-04-19\", \"to\": \"2017-04-23\", \"price\": 29900},\n  { \"from\": \"2017-04-22\", \"to\": \"2017-04-26\", \"price\": 29900}\n]', 0, NULL, 0, 'THB', 1, 1, 1, '2017-02-06', '2017-04-26'),
(5, 'international tour', 'มัณฑะเลย์-มินกุน-สกายส์-อังวะ-พุกาม 4วัน3คืน', 'Easy luxury bagan - mandalay', 'Easy-luxury-bagan-mandalay', 'sp', 'เดินทางโดยสายการบินบางกอกแอร์เวย์ โหลดกระเป๋าได้ 20 กิโลกรัม\r\nพิเศษ!!นั่งเล้าจน์บางกอกแอร์เวย์ บริการอาหารร้อนและเครื่องดื่มบนเครื่อง\r\n', '<ul>\r\n<li>ร่วมพิธีศักดิ์สิทธิ์ล้างพระพักตร์ พระมหามัยมุณี สิ่งศักดิ์สิทธิ์สูงสุด 1 ใน 5 มหาบูชาสถาน</li>\r\n<li>ชมอาทิตย์อัสดงท่ามกลางความยิ่งใหญ่ของทุ่งทะเลเจดีย์ เมืองพุกาม</li>\r\n<li>เที่ยว เมืองสกายน์ ชมวิวยอดดอยสกายน์</li>\r\n<li>ชมวิวที่เขา มัณฑะเลย์ฮิลล์ จุดชมวิวทิวทัศน์ที่สวยที่สุดของเมืองมัณฑะเลย์</li>\r\n<li>เที่ยวเมืองมิงกุน ล่องแม่น้ำอิระวดีชม เมืองมิงกุน ระฆังมิงกุน เจดีย์มิงกุน และ ทัชมาฮาลพม่า</li>\r\n<li>ชม สะพานไม้อูเบ็ง สะพานไม้สักที่ยาวที่สุดโลก</li>\r\n<li>เมนูพิเศษ!!! กุ้งแม่น้ำเผา</li>\r\n<li>สามารถใช้ห้องรับรองของสายการบินบางกอกแอร์เวย์ได้</li>\r\n<li>พักโรงแรมมาตรฐาน 4 ดาว</li>\r\n<br>\r\n<b>ก่อนตัดสินใจจองทัวร์ ควรอ่านเงื่อนไขการเดินทางอย่างถ่องแท้ แล้วจึงวางมัดจำ \r\nเพื่อประโยชน์ของท่านเอง</b>\r\n<i>การเดินทางในแต่ละครั้งจะต้องมีผู้เดินทางจำนวน 30 ท่านขึ้นไป\r\nถ้าผู้เดินทางไม่ครบจำนวนดังกล่าว บริษัทฯ ขอสงวนสิทธิ์ในการ เลื่อนการเดินทาง หรือ เปลี่ยนแปลงราคา\r\n</i>\r\n<br>\r\nการเดินทางอาจเปลี่ยนแปลงได้ตามความเหมาะสมโดยไม่แจ้งให้ทราบล่วงหน้า ทั้งนี้เนื่องจากสภาพ ลม ฟ้า อากาศ และสถานการณ์ในการเดินทางขณะนั้นแต่จะคำนึงถึงความปลอดภัยในการเดินทาง และผลประโยชน์ของหมู่คณะเป็นสำคัญ โดยไม่ทำให้มาตรฐานของการบริการลดน้อยลง', '[{\"route\":\"กรุงเทพฯ - มัณฑะเลย์ - พระราชวังมัณฑะเลย์ - วิหารชเวนันดอร์ - วัดกุโสดอ - MANDALAY HILL \",\"hotel\":\"Best Western Shwe Pyi Thar\"},{\"route\":\"เมืองพุกาม - เจดีย์ชเวสิกอง - วัดอนันดา - วิหารธรรมยันจี - วิหารติโลมินโล - ชเวกุจี - เจดีย์สัพพัญญู - วัดมนุหา - วัดกุบยางกี - เจดีย์ชเว\",\"hotel\":\"Bagan Airport\",\"route\":\"มัณฑะเลย์ -  เมืองมิงกุน - ล่องเรือแม่น้ำอิระวดี - เจดีย์พญาเธียรดาน - เมืองสกายน์ - เจดีย์กวงมูดอร์ หรือวัดเจดีย์นมนาง - เจดีย์อูมินทงแส่ - เมืองอังวะ\",\"hotel\":\"Best Western Shwe Pyi Thar\"},{\"route\":\"นมัสการพระมหามัยมุนี - วัดกุสินารา - เมืองอมรปุระ - วัดมหากันดายง - สะพานไม้อูเบ็ง\",\"hotel\":\"\"}]', 5, '5.pdf', '4,3', 20900.00, '[{ \"from\": \"2017-03-16\", \"to\": \"2017-03-19\", \"price\": 20900},\n { \"from\": \"2017-03-23\", \"to\": \"2017-03-26\", \"price\": 21900},\n { \"from\": \"2017-04-06\", \"to\": \"2017-04-09\", \"price\": 22900},\n { \"from\": \"2017-04-26\", \"to\": \"2017-04-29\", \"price\": 21900}\n ]', 0, NULL, 0, 'THB', 1, 1, 1, '2017-02-16', '2017-04-29'),
(6, 'international tour', 'โอซาก้า-เกียวโต-ชิราคาวาโกะ\r\nกำแพงหิมะ-ฟูจิ-โตเกียว 5 วัน 4 คืน', 'Easy say hi snow wall', 'Easy-say-hi-snow wall', 'sp', 'หมู่บ้านมรดกโลกชิราคาวาโกะ-ศาลเจ้าฟูชิมิอินาริเจแปนเอล์ป-เทือกเขาทาคายาม่า-ช้อปปิ้งจุใจที่ชินจูกุ-ชินไซบาชิ-ชมภูเขาไฟฟูจิสัญลักษณ์ของแดงอาทิตย์อุทัย สักการะวัดอาซากุสะเพื่อความเป็นสิริมงคล', '<ul>\n<li>บินกับ Scoot ด้วยเครื่องใหม่ป้ายแดง Boeing 787 Dreamliner</li>\n<li>ช้อปปิ้ง ถนนชินไชบาชิ เป็นย่านช้อปปิ้งชื่อดังของนครโอซาก้า</li>\n<li>ศาลเจ้าฟูชิมิอินาริ ที่สถิตของพระแม่โพสภ</li>\n<li>หมู่บ้านมรดกโลกชิราคาวาโกะ ที่ยังคงอนุรักษ์บ้านสไตล์ญี่ปุ่นขนานแท้ดั้งเดิม</li>\n<li>เจแปน แอลป์ เทือกเขาทาคายาม่า ที่มีชื่อเสียงที่สุดของประเทศญี่ปุ่น</li>\n<li>ปราสาทมัตซึโมโตะ เป็นปราสาทไม้ที่คงความดั้งเดิมและเก่าแก่ที่สุดในญี่ปุ่น</li>\n<li>มรดกโลกทางวัฒนธรรม ภูเขาไฟฟูจิ สถานที่ศักดิ์สิทธิ์และแหล่งบันดาลใจทางศิลปะ</li>\n<li>วัดเซนโซจิ  หรือ วัดอาซากุสะ วัดที่เก่าแก่ที่สุดในกรุงโตเกียว</li>\n<li>ให้ช้อปปิ้งจุใจ ย่านชินจุกุ ชิบูยะ ฮาจุกุ แหล่งช้อปปิ้งชั้นนำของญี่ปุ่น</li>\n<li>สัมผัสประสบการณ์ อาบน้ำแร่ออนเซ็น ให้ท่านได้ผ่อนคลายความเมื่อยล้า</li>\n<li>พิเศษ!!! ขาปูยักษ์ และ Free Wi-Fi ตลอดการเดินทาง</li>\n</ul><br>\n<b>ก่อนตัดสินใจจองทัวร์ ควรอ่านเงื่อนไขการเดินทางอย่างถ่องแท้ แล้วจึงวางมัดจำ \nเพื่อประโยชน์ของท่านเอง</b><br>\nการเดินทางในแต่ละครั้งจะต้องมีผู้เดินทางจำนวน 30 ท่านขึ้นไป\nถ้าผู้เดินทางไม่ครบจำนวนดังกล่าว บริษัทฯ ขอสงวนสิทธิ์ในการ เลื่อนการเดินทาง หรือ เปลี่ยนแปลงราคา\n<br>\n<b>ยังไม่รวมค่าทิปไกด์ และคนขับรถท่านละ 3,500 เยน ตลอดทริป \nกรุณาชำระมัดจำท่านละ 15,000 บาท ภายใน 3 วันหลังจากที่ทำการจอง \nหากไม่ชำระภายในวันที่กำหนด ทางบริษัทขออนุญาตตัดที่นั่งตามเงื่อนไข</b>\n<br>\nกรุณาชำระมัดจำท่านละ 5,000 บาท ภายใน 3 วันหลังจากที่ทำการจอง \nหากไม่ชำระภายในวันที่กำหนด ทางบริษัทขออนุญาตตัดที่นั่งตามเงื่อนไข\n<br>\n<b>หมายเหตุ</b>\n<br>\n1. โรงแรมที่ญี่ปุ่นห้องค่อนข้างเล็ก และบางโรงแรมไม่มีห้องสำหรับนอน 3 ท่าน ท่านอาจจะต้องพักเป็นห้องที่นอน 2 ท่าน และห้องที่นอน 1 ท่าน (แยกเป็น 2 ห้อง) และในกรณีที่พัก 2 ท่าน บางโรงแรมอาจจะไม่มีเตียงทวิน ทางบริษัทขอสงวนสิทธิ์ในการจัดห้องพักเป็นเตียงดับเบิ้ลสำหรับนอน 2 ท่าน\n2. รายการท่องเที่ยวอาจมีการสลับหรือเปลี่ยนแปลงได้ตามความเหมาะสมโดยมิแจ้งให้ทราบล่วงหน้า\nในกรณีที่มีเหตุการณ์สุดวิสัย หรือภัยธรรมชาติ หรือเหตุการณ์ที่ไม่ได้อยู่ภายใต้การควบคุมของบริษัทฯ \nเนื่องจากบริษัทรถทัวร์ของญี่ปุ่นสามารถใช้รถได้ 12 ชั่วโมง / วัน หากเกิดเหตุการณ์สุดวิสัย ทางบริษัทของสงวนสิทธิ์ในการสลับหรือเปลี่ยนแปลงโปรแกรมตามความเหมาะสม ทั้งนี้ บริษัทฯ จะคำนึงถึงความปลอดภัย ตลอดจนผลประโยชน์ของคณะเป็นสำคัญ\n\n', '[{\"route\":\"กรุงเทพฯ - โอซาก้า - ช้อปปิ้งชินไซบาชิ\",\"hotel\":\"Ibis Style Osaka / Agora Osaka Hotel\"},{\"route\":\"เมืองเกียวโต - ศาลเจ้าฟูชิมิอินาริ - ทาคายาม่า - หมู่บ้านชิราคาวาโกะ - เมืองคานาซาว่า\",\"hotel\":\"TONAMI ROYAL HOTEL\",\"route\":\"เจแปน แอลป์ - ปราสามัตซึโมโตะ - เมืองอิซาว่า - แช่น้ำแร่ออนเซ็น - เมนูขาปูยักษ์\",\"hotel\":\"ISAWA ONSEN KYOSUISO HOTEL\"},{\"route\":\"ชมทุ่งพิงค์มอส หรือ หมู่บ้านน้ำใสโอชิโนะฮัคไค - พิพิธภัณฑ์แผ่นดินไหว - โตเกียว - วัดอาซากุสะ  จุดชมวิว Tokyo Sky Tree - ช้อปปิ้งชินจุกุ\",\"hotel\":\"Narita View Hotel / Narita Tobu Hotel\"},{\"route\":\"ท่าอากาศยานนานาชาตินาริตะ - กรุงเทพฯ\",\"hotel\":\"\"}]', 6, '6.pdf', '5,4', 38900.00, '[{ \"from\": \"2017-04-21\", \"to\": \"2017-04-25\", \"price\": 39900},\n { \"from\": \"2017-04-19\", \"to\": \"2017-04-23\", \"price\": 39900},\n { \"from\": \"2017-05-02\", \"to\": \"2017-05-06\", \"price\": 38900}\n ]', 0, NULL, 0, 'THB', 0, 0, 1, '2017-02-21', '2017-05-06'),
(7, 'international tour', 'โอซาก้า-เกียวโต-นาโกย่า\r\nฟูจิ-โตเกียว 5 วัน 4 คืน', 'Easy say love Osaka Tokyo', 'Easy-say-love Osaka-Tokyo', 'sp', 'เที่ยววัดคิโยมิสึ ศาลเจ้าฟูชิมิอินาริ ปราสาทโอซาก้า ช้อปปิ้งจุใจย่านซินไซบาชิ ซาคาเอะ ชินจุกุ ชมภูเขาไฟฟูจิสัญลักษณ์ของแดนอาทิตย์อุทัย สักการะวัดอาซากุสะเพื่อความเป็นสิริมงคล', '<ul>\r\n<li>บินกับ Scoot ด้วยเครื่องใหม่ป้ายแดง Boeing 787 Dreamliner</li>\r\n<li>ช้อปปิ้ง ถนนชินไชบาชิ เป็นย่านช้อปปิ้งชื่อดังของนครโอซาก้า</li>\r\n<li>ศาลเจ้าฟูชิมิอินาริ ที่สถิตของพระแม่โพสภ</li>\r\n<li>หมู่บ้านมรดกโลกชิราคาวาโกะ ที่ยังคงอนุรักษ์บ้านสไตล์ญี่ปุ่นขนานแท้ดั้งเดิม</li>\r\n<li>เจแปน แอลป์ เทือกเขาทาคายาม่า ที่มีชื่อเสียงที่สุดของประเทศญี่ปุ่น</li>\r\n<li>ปราสาทมัตซึโมโตะ เป็นปราสาทไม้ที่คงความดั้งเดิมและเก่าแก่ที่สุดในญี่ปุ่น</li>\r\n<li>มรดกโลกทางวัฒนธรรม ภูเขาไฟฟูจิ สถานที่ศักดิ์สิทธิ์และแหล่งบันดาลใจทางศิลปะ</li>\r\n<li>วัดเซนโซจิ  หรือ วัดอาซากุสะ วัดที่เก่าแก่ที่สุดในกรุงโตเกียว</li>\r\n<li>ให้ช้อปปิ้งจุใจ ย่านชินจุกุ ชิบูยะ ฮาจุกุ แหล่งช้อปปิ้งชั้นนำของญี่ปุ่น</li>\r\n<li>สัมผัสประสบการณ์ อาบน้ำแร่ออนเซ็น ให้ท่านได้ผ่อนคลายความเมื่อยล้า</li>\r\n<li>พิเศษ!!! ขาปูยักษ์ และ Free Wi-Fi ตลอดการเดินทาง</li>\r\n</ul><br>\r\n<b>ก่อนตัดสินใจจองทัวร์ ควรอ่านเงื่อนไขการเดินทางอย่างถ่องแท้ แล้วจึงวางมัดจำ \r\nเพื่อประโยชน์ของท่านเอง</b><br>\r\nการเดินทางในแต่ละครั้งจะต้องมีผู้เดินทางจำนวน 30 ท่านขึ้นไป\r\nถ้าผู้เดินทางไม่ครบจำนวนดังกล่าว บริษัทฯ ขอสงวนสิทธิ์ในการ เลื่อนการเดินทาง หรือ เปลี่ยนแปลงราคา\r\n<br>\r\n<b>ยังไม่รวมค่าทิปไกด์ และคนขับรถท่านละ 3,500 เยน ตลอดทริป \r\nกรุณาชำระมัดจำท่านละ 15,000 บาท ภายใน 3 วันหลังจากที่ทำการจอง \r\nหากไม่ชำระภายในวันที่กำหนด ทางบริษัทขออนุญาตตัดที่นั่งตามเงื่อนไข</b>\r\n<br>\r\nกรุณาชำระมัดจำท่านละ 5,000 บาท ภายใน 3 วันหลังจากที่ทำการจอง \r\nหากไม่ชำระภายในวันที่กำหนด ทางบริษัทขออนุญาตตัดที่นั่งตามเงื่อนไข\r\n<br>\r\n<b>หมายเหตุ</b>\r\n<br>\r\n1. โรงแรมที่ญี่ปุ่นห้องค่อนข้างเล็ก และบางโรงแรมไม่มีห้องสำหรับนอน 3 ท่าน ท่านอาจจะต้องพักเป็นห้องที่นอน 2 ท่าน และห้องที่นอน 1 ท่าน (แยกเป็น 2 ห้อง) และในกรณีที่พัก 2 ท่าน บางโรงแรมอาจจะไม่มีเตียงทวิน ทางบริษัทขอสงวนสิทธิ์ในการจัดห้องพักเป็นเตียงดับเบิ้ลสำหรับนอน 2 ท่าน\r\n2. รายการท่องเที่ยวอาจมีการสลับหรือเปลี่ยนแปลงได้ตามความเหมาะสมโดยมิแจ้งให้ทราบล่วงหน้า\r\nในกรณีที่มีเหตุการณ์สุดวิสัย หรือภัยธรรมชาติ หรือเหตุการณ์ที่ไม่ได้อยู่ภายใต้การควบคุมของบริษัทฯ \r\nเนื่องจากบริษัทรถทัวร์ของญี่ปุ่นสามารถใช้รถได้ 12 ชั่วโมง / วัน หากเกิดเหตุการณ์สุดวิสัย ทางบริษัทของสงวนสิทธิ์ในการสลับหรือเปลี่ยนแปลงโปรแกรมตามความเหมาะสม ทั้งนี้ บริษัทฯ จะคำนึงถึงความปลอดภัย ตลอดจนผลประโยชน์ของคณะเป็นสำคัญ', '[{\"route\":\"กรุงเทพฯ - โอซาก้า - ช้อปปิ้งชินไซบาชิ\",\"hotel\":\"Ibis Style Osaka / Agora Osaka Hotel\"},{\"route\":\"ปราสาทโอซาก้า - เมืองเกียวโต  - ศาลเจ้าฟูชิมิอินาริ  - วัดคิโยมิสึ (วัดน้ำใส) - ช้อปปิ้งย่านซาคาเอะ\",\"hotel\":\"Castle Plaza Nagoya \",\"route\":\"ทะเลสาบฮามานะ -  โกเท็มบะเอ้าท์เล็ท - ฟูจิ - แช่น้ำแร่ออนเซ็น - เมนูขาปูยักษ์\",\"hotel\":\"Fujino Boukaen Hotel\"},{\"route\":\"ภูเขาไฟฟูจิ ชั้น 5 (ขึ้นอยู่กับสภาพภูมิอากาศ) - พิพิธภัณฑ์แผ่นดินไหว - โตเกียว - วัดอาซากุสะ จุดชมวิว Tokyo Sky Tree - ช้อปปิ้งชินจุกุ\",\"hotel\":\"Narita View Hotel / Narita Tobu Hotel\"},{\"route\":\"สนามบินนาริตะ - กรุงเทพฯ\",\"hotel\":\"\"}]', 7, '7.pdf', '5,4', 37900.00, '[{ \"from\": \"2017-04-07\", \"to\": \"2017-04-11\", \"price\": 37900}\n ]', 0, NULL, 0, 'THB', 0, 1, 1, '2017-03-07', '2017-04-11'),
(8, 'international tour', 'อุทยานเหย่หลิว-จิ่วเฟิ่น-ฟรีอิสระท่องเที่ยว-6วัน 4คืน', 'Easy \"ฟินเวอร์\" in Taiwan', 'Easy-ฟินเวอร์-in-Taiwan', 'sp', '', '<i>ไม่รวมทิปไกด์+คนขับรถตลอดการเดินทาง ท่านละ 900NTD(1,080บาท) (ส่วนหัวหน้าทัวร์แล้วแต่จะพอใจในการบริการ)</i>\r\n<br>\r\n1.ในกรณีที่ผู้เดินทางไม่ผ่านการตรวจพิจารณาจากด่านตรวจคนเข้าเมือง (ต.ม.)ในการ เข้า-ออกทั้งประเทศไทยและประเทศไต้หวัน อันเนื่องมาจากการกระทำที่ส่อไปในทางผิดกฎหมาย การหลบหนีเข้าออกเมือง หรือการถูกปฎิเสธในกรณีอื่นๆทุกกรณี ทางบริษัทจะไม่รับผิดชอบและไม่คืนค่าใช้จ่ายใดใดทั้งสิ้น เนื่องจากเป็นการเหมาจ่ายกับตัวแทนบริษัทแล้ว\r\n2.ในกรณีที่ลูกค้าไม่ลงร้านช้อปที่ไต้หวัน ซึ่งได้แก่ ร้านขนมพายสัปปะรด, ศูนย์เครื่องประดับเจอร์เนียมหรือร้านนาฬิกา, Duty free ทางบริษัทขอสงวนสิทธิ์ในการเก็บเงินลูกค้าที่ไม่เข้าร้านเป็นจำนวนเงินร้านละ 700 บาท', '[{\"route\":\"กรุงเทพฯ(ดอนเมือง)\",\"hotel\":\"Ibis Style Osaka / Agora Osaka Hotel\"},{\"route\":\"ปราสาทโอซาก้า - เมืองเกียวโต  - ศาลเจ้าฟูชิมิอินาริ  - วัดคิโยมิสึ (วัดน้ำใส) - ช้อปปิ้งย่านซาคาเอะ\",\"hotel\":\"Castle Plaza Nagoya \",\"route\":\"ทะเลสาบฮามานะ -  โกเท็มบะเอ้าท์เล็ท - ฟูจิ - แช่น้ำแร่ออนเซ็น - เมนูขาปูยักษ์\",\"hotel\":\"Fujino Boukaen Hotel\"},{\"route\":\"ภูเขาไฟฟูจิ ชั้น 5 (ขึ้นอยู่กับสภาพภูมิอากาศ) - พิพิธภัณฑ์แผ่นดินไหว - โตเกียว - วัดอาซากุสะ จุดชมวิว Tokyo Sky Tree - ช้อปปิ้งชินจุกุ\",\"hotel\":\"Narita View Hotel / Narita Tobu Hotel\"},{\"route\":\"สนามบินนาริตะ - กรุงเทพฯ\",\"hotel\":\"\"}]', 8, '8.pdf', '6,4', 17999.00, '[{ \"from\": \"2017-02-22\", \"to\": \"2017-02-27\", \"price\": 18999},\n { \"from\": \"2017-03-08\", \"to\": \"2017-03-13\", \"price\": 17999},\n { \"from\": \"2017-03-15\", \"to\": \"2017-03-20\", \"price\": 18999},\n { \"from\": \"2017-04-19\", \"to\": \"2017-04-24\", \"price\": 19999},\n { \"from\": \"2017-05-05\", \"to\": \"2017-05-10\", \"price\": 19999},\n { \"from\": \"2017-06-06\", \"to\": \"2017-06-11\", \"price\": 18999},\n { \"from\": \"2017-07-15\", \"to\": \"2017-07-20\", \"price\": 18999}\n ]', 0, NULL, 0, 'THB', 1, 0, 1, '2017-01-22', '2017-07-20'),
(9, 'international tour', NULL, 'Easy \"สุดจ๊าบ\" in Taiwan', 'Easy-สุดจ๊าบ-in-Taiwan', 'sp', 'พิพิธภัณท์สถานกู้กง ทะเลสาบสุริยันจันทรา ช้อปปิ้ง 3 ตลาดดัง ตลาดฝงเจี๋ย ตลาดชื่อหลิน ตลาดซึเหมิงติง\r\n<b>พิเศษ ปล่อยโคมลอยผิงซี</b>', '<i>ไม่รวมทิปไกด์+คนขับรถตลอดการเดินทาง ท่านละ 900NTD(1,080บาท) (ส่วนหัวหน้าทัวร์แล้วแต่จะพอใจในการบริการ)</i>\r\n<br>\r\n1.ในกรณีที่ผู้เดินทางไม่ผ่านการตรวจพิจารณาจากด่านตรวจคนเข้าเมือง (ต.ม.)ในการ เข้า-ออกทั้งประเทศไทยและประเทศไต้หวัน อันเนื่องมาจากการกระทำที่ส่อไปในทางผิดกฎหมาย การหลบหนีเข้าออกเมือง หรือการถูกปฎิเสธในกรณีอื่นๆทุกกรณี ทางบริษัทจะไม่รับผิดชอบและไม่คืนค่าใช้จ่ายใดใดทั้งสิ้น เนื่องจากเป็นการเหมาจ่ายกับตัวแทนบริษัทแล้ว\r\n2.ในกรณีที่ลูกค้าไม่ลงร้านช้อปที่ไต้หวัน ซึ่งได้แก่ ร้านขนมพายสัปปะรด, ศูนย์เครื่องประดับเจอร์เนียมหรือร้านนาฬิกา, Duty free ทางบริษัทขอสงวนสิทธิ์ในการเก็บเงินลูกค้าที่ไม่เข้าร้านเป็นจำนวนเงินร้านละ 700 บาท', '[{\"route\":\"กรุงเทพฯ(ดอนเมือง)\",\"hotel\":\"\"},{\"route\":\"สนามบินเถาหยวน - ล่องทะเลสาบสุริยันจันทรา - วัดพระถังซัมจั๋ง \",\"hotel\":\"LOOK HOTEL \",\"route\":\"อาลีซาน - ป่าสนพันปี - ฟ่งเจี๋ยไนท์มาเก๊ต\",\"hotel\":\"FORTE ORANGE HOTEL TAICHUNG PARK\"},{\"route\":\"ถนนเก่าจิ่วเฟิ่น - อุทยานเย่หลิว - ปล่อยโคมลอยผิงซี(ไม่รวมค่าโคมลอย) - ตลาดซื่อหลินไนท์มาร์เก็ต\",\"hotel\":\"HEDO HOTEL\"},{\"route\":\"ทำ DIY พายสัปปะรด - พิพิธภัณฑ์สถานกู้กง - ศูนย์เครื่องประดับ - DUTY FREE - ตลาดซีเหมินติง \",\"hotel\":\"HEDO HOTEL\"},{\"route\":\"สนามบินเถาหยวน - สนามบินดอนเมือง กรุงเทพฯ\",\"hotel\":\"\"}]', 9, '9.pdf', '6,5', 22999.00, '[{ \"from\": \"2017-03-31\", \"to\": \"2017-04-05\", \"price\": 21999},\r\n { \"from\": \"2017-04-11\", \"to\": \"2017-04-16\", \"price\": 26999},\r\n { \"from\": \"2017-05-04\", \"to\": \"2017-05-09\", \"price\": 23999},\r\n { \"from\": \"2017-06-05\", \"to\": \"2017-06-10\", \"price\": 22999}\r\n ]', 0, NULL, 0, 'THB', 0, 0, 1, '2017-02-28', '2017-06-05'),
(10, 'thailand domestic tour', 'ภูเก็ต หรรษา พาเพลิน 6999 บาท', 'Easy fun in Phuket', 'Easy-fun-in-Phuket', 'sp', 'เที่ยวสนุกดูปะการังรอบภูเก็ต', '<ul>\r\n<li>นั่งกระเช้านองปิง สักการะพระใหญ่พระพุทธรูปนั่งปรางสมาธิทองสัมฤทธิ์</li>\r\n<li>ช้อปปิ้ง CITY GATE OUTLET  ศูนย์รวมสินค้ามากมาย</li>\r\n<li>ชมวัดแชกงหมิว (วัดกังหัน) สิ่งศักสิทธิ์ที่นิยมที่สุดในฮ่องกง</li>\r\n<li>ชม REPULSE BAY หาดทรายรูปจันทร์เสี้ยว</li>\r\n<li>ชม VICTORIA  PEAK  จุดชมวิวที่สวยที่สุดในฮ่องกง</li>\r\n<li>นั่ง รถรางพีคแทรม ขึ้นสู่จุดชมวิวเดอะพีค</li>\r\n<li>ช๊อปปิ้ง ย่านจิมซาจุ่ยและโอเซี่ยนเทอร์มินอล สนุกสนานกับการเลือกสินค้าราคาพิเศษ</li>\r\n<li>อิสระเต็มอิ่มกับการช๊อปปิ้งตามอัธยาศัย</li>\r\n<li>พิเศษ !!!  เมนู ติ่มซำ ซาลาเปา ขนมจีบ โจ๊กฮ่องกง</li></ul><br>\r\n<b>ก่อนตัดสินใจจองทัวร์ ควรอ่านเงื่อนไขการเดินทางอย่างถ่องแท้ แล้วจึงวางมัดจำ \r\nเพื่อประโยชน์ของท่านเอง</b><br>\r\nการเดินทางในแต่ละครั้งจะต้องมีผู้เดินทางจำนวน 25 ท่านขึ้นไป\r\nถ้าผู้เดินทางไม่ครบจำนวนดังกล่าว บริษัทฯ ขอสงวนสิทธิ์ในการ เลื่อนการเดินทาง หรือ เปลี่ยนแปลงราคา<br>\r\n<b>ยังไม่รวมค่าทิปไกด์ และคนขับรถท่านละ 120 HKD ตลอดทริป</b><br>\r\nกรุณาชำระมัดจำท่านละ 5,000 บาท ภายใน 3 วันหลังจากที่ทำการจอง \r\nหากไม่ชำระภายในวันที่กำหนด ทางบริษัทขออนุญาตตัดที่นั่งตามเงื่อนไข\r\n\r\n', '[{\"route\":\"กรุงเทพฯ - ฮ่องกง - หมูบ้านนองปิง - อิสระช้อปปิ้ง City Gate Outlet\",\"hotel\":\"MK HOTEL / CRUISE HOTEL\"},{\"route\":\"ติ่มซำ - วัดแชกงหมิว - จุดชมวิววิคตอเรียพีค - รถรางขึ้นพีคแทรม - หาดรีพลัสเบย์ - โรงงานจิวเวอรี่ - ช้อปปิ้งจิมซาจุ่ยและโอเชี่ยนเทอร์มินอล\",\"hotel\":\"MK HOTEL / CRUISE HOTEL\",\"route\":\"อิสระตามอัธยาศัย - กรุงเทพฯ\",\"hotel\":\"\"}]', 10, '10.pdf', '3,2', 6999.00, '[{ \"from\": \"2017-03-19\", \"to\": \"2017-03-21\", \"price\": 6999},\n { \"from\": \"2017-03-25\", \"to\": \"2017-03-27\", \"price\": 6999}\n ]', 0, NULL, 0, 'THB', 0, 0, 1, '2017-02-19', '2017-03-27'),
(11, 'thailand domestic tour', 'HP119 แฮปปี้ ทริปส์ หมู่เกาะตะรุเตา เกาะหลีเป๊ะ', 'HP119 หมู่เกาะตะรุเตา เกาะหลีเป๊ะ', 'HP119-หมู่เกาะตะรุเตา-เกาะหลีเป๊ะ', 'sp', '22/21 หมู่ 6 ซอย แก้วประไพ ถ.เสมาฟ้าคราม ต.คูคต อ. ลำลูกกา จ. ปทุมธานี 12130 ใบอนุญาตเลขที่ 11/4286 Tel: (02) 987-3417; Fax: (02) 987-6708 www.toursooksun.com E-mail: happytrips48@hotmail.com', '<ul>\r\n<b><u>อัตรานี้รวม </u></b>\r\n<br>\r\n<br>\r\n<li>\r\nค่าที่พัก 2 คืน ( นอน 2-3 ท่าน / ห้อง )	\r\n</li>\r\n<li>\r\nค่ารถบัสปรับอากาศวีไอพี / รถตู้รุ่นใหม่ D4D นำเที่ยว	\r\n</li>\r\n<li>\r\nค่าาประกันอุบัติเหตุระหว่างการเดินทาง 1,000,000 บาท (ขึ้นอยู่กับเงื่อนไขของกรมธรรม์)	\r\n</li>\r\n<li>\r\nค่ารักษาพยาบาลระหว่างการเดินทาง 500,000 บาท (ขึ้นอยู่กับเงื่อนไขกรมธรรม์)	\r\n</li>\r\n<li>\r\nค่าอาหารทุกมื้อตามรายการ	\r\n</li>\r\n<li>\r\nค่าอุปกรณ์ดำน้ำ พร้อมเจ้าหน้าที่ผู้ชำนาญ และค่าเรือนำเที่ยวตามรายการ	\r\n</li>\r\n<li>\r\nค่ามัคคุเทศก์ในการนำเที่ยวและบริการ\r\n</li>\r\n<li>\r\nค่าธรรมเนียมเข้าชมสถานที่ท่องเที่ยวตามรายการ \r\n</li>\r\n<li>\r\nค่าเครื่องดื่มและขนมขบเคี้ยวบนรถตลอดการเดินทาง\r\n</li>\r\n<b><u>อัตราดังกล่าวไม่รวม</u></b>\r\n<br>\r\n<br>\r\n<li>\r\nค่าใช้จ่ายส่วนตัวที่นอกเหนือจากรายการ เช่น ค่าโทรศัพท์ ค่าซักรีด ค่าเครื่องดื่มพิเศษและค่าอาหาร\r\n</li>\r\n<li>\r\nภาษีหัก ณ ที่จ่าย 3 % และ ภาษีมูลค่าเพิ่ม 7 %<b>(ในกรณีต้องการใบเสร็จรับเงิน / ใบกำกับภาษี)</b>\r\n</li>\r\n<b><u>การสำรองที่นั่ง</u></b>\r\n<br>\r\n<br>\r\n<li>\r\nวางมัดจำท่านละ 2,000 บาท โดย <b>โอนเงินสด</b> ผ่านบัญชีตามรายละเอียดด้านล่าง ส่วนที่เหลือชำระก่อนการเดินทาง 15 วัน พร้อมแฟกซ์<br>ใบโอนเงินและระบุโปรแกรมทัวร์ แจ้งชื่อ-นามสกุล เบอร์โทรศัพท์ / แฟกซ์ เพื่อทำประกันการเดินทาง\r\n</li>\r\n<b><u>การชำระเงิน</u></b>\r\n<br>\r\n<br>\r\n<li>\r\nนายสุขสันต์ สินธุ์สุวรรณ ธนาคารกสิกรไทย สาขาสุทธิสาร ออมทรัพย์ เลขที่บัญชี 069 – 2 – 60120 - 3\r\n</li>\r\n<li>\r\nนาง ปิยรัตน์ สินธุ์สุวรรณ ธนาคารไทยพาณิชย์ สาขาเซ็นทรัลลาดพร้าว ออมทรัพย์ เลขที่บัญชี 157-2-01717-3\r\n</li>\r\n<b><u>ขั้นตอนการยกเลิกทัวร์</u></b>\r\n<br>\r\n<br>\r\n<li>\r\nยกเลิกทัวร์ภายใน 45 วันทำการก่อนการเดินทาง บริษัทฯยึดเงินมัดจำทั้งหมด  **ช่วงเทศกาล วันหยุดนักขัตฤกษ์ วันหยุด Long Weekend **\r\n</li>\r\n<li>\r\nยกเลิกทัวร์ภายใน 30 – 15 วันทำการก่อนการเดินทาง บริษัทฯ ยึดเงินมัดจำทั้งหมด\r\n</li>\r\n<li>\r\nยกเลิกทัวร์ภายใน 14 วันทำการก่อนการเดินทาง บริษัทฯ ขอสงวนสิทธิ์ในการยึดเงินค่าทัวร์ทั้งหมด\r\n</li>\r\n<li>\r\n<b>การไม่มาชำระเงินตามกำหนดนัดหมาย</b> 		บริษัทฯ ขอสงวนสิทธิ์ในการยกเลิกทัวร์และยึดเงินค่าทัวร์ทั้งหมด\r\n</li>\r\n<li>\r\n<b style=\"color:red\">กรณียกเลิกการเดินทางหลังจากการจองสมบูรณ์แล้ว บริษัทฯขอสงวนสิทธิ์ในการเก็บค่าธรรมเนียมอย่างน้อยท่านละ 500 บาท หากมีค่าใช้จ่ายอื่น ๆ เช่นตั๋วเครื่องบิน โรงแรม ขอสงวนสิทธิ์เก็บค่าใช้จ่ายตามจริงที่สายการบิน โรงแรม เรียกเก็บ และหากมีการเปลี่ยนแปลงหรือยกเลิกเดินทางต้องใช้สิทธิภายใน 45 วัน นับจากวันจอง หากเกินกำหนดดังกล่าว ถือว่าท่านสละสิทธิ์</b>\r\n</li>\r\n<b><u>หมายเหตุ</u></b>\r\n<br>\r\n<br>\r\n<li>\r\n<b>ในกรณีที่ลูกค้าต้องออกตั๋วโดยสารภายในประเทศกรุณาติดต่อเจ้าหน้าที่ของบริษัทฯก่อนทุกครั้งมิฉะนั้นทางบริษัทจะไม่รับผิดชอบใดๆทั้งสิ้น</b>\r\n</li>\r\n<li>\r\nบริษัทขอสงวนสิทธิ์ในการเปลี่ยนแปลงรายละเอียดบางประการโดยคำนึงถึงความสะดวกและความปลอดภัยของผู้เดินทางเป็นสำคัญ\r\n</li>\r\n<li>\r\nบริษัทไม่อาจรับผิดชอบต่อเหตุการณ์สุดวิสัยที่ไม่อาจแก้ไขได้หรือกรณีที่สูญหายหรือได้รับบาดเจ็บที่นอกเหนือความรับผิดชอบของมัคคุเทศก์ และเหตุการณ์บางอย่าง เช่น ภัยธรรมชาติ การจลาจล การนัดหยุดงาน การชุมนุมประท้วง ฯลฯ\r\n</li>\r\n<li>\r\nบริษัทฯ ขอสงวนสิทธิ์ที่จะเปลี่ยนแปลงราคาโดยมิต้องแจ้งให้ทราบล่วงหน้า \r\n</li>\r\n<li>\r\nบริษัทฯ ขอสงวนสิทธิ์เมื่อท่านเดินทางไปพร้อมคณะ แล้วท่านงดใช้บริการใด หรือไม่เดินทางพร้อมคณะถือว่าท่านสละสิทธิ์ ไม่อาจเรียกร้องค่าบริการ และเงินคืน ไม่ว่ากรณีใด ๆ ทั้งสิ้น\r\n</li>\r\n<b>ขอสงวนสิทธิ์ในการยกเลิกโปรแกรมในกรณีที่มีการจองต่ำกว่า 30ท่าน</b>\r\n</ul>\r\n', '[{\"route\":\"กรุงเทพฯ – จ.ตรัง\",\"hotel\":\"\"},{\"route\":\"ตรัง – สตูล – ท่าเรือปากบารา – อุทยานแห่งชาติหมู่เกาะตะรุเตา – เกาะไข่ – เกาะหลีเป๊ะ\",\"hotel\":\"โรงแรมวารินทร์ บีช รีสอร์ทเกาะหลีเป๊ะ\"},{\"route\":\"เกาะหินงาม – ร่องน้ำจา-บัง - เกาะราวี-เกาะอาดัง\",\"hotel\":\"โรงแรมวารินทร์ บีช รีสอร์ทเกาะหลีเป๊ะ\"},{\"route\":\"เกาะหลีเป๊ะ– ท่าเรือปาบารา – พระบรมธาตุไชยา\",\"hotel\":\"โรงแรมวารินทร์ บีช รีสอร์ทเกาะหลีเป๊ะ\"},{\"route\":\"จ.ตรัง - กรุงเทพฯ\",\"hotel\":\"\"}]', 11, '11.pdf', '5,4', 9900.00, '[{ \"from\": \"2017-04-12\", \"to\": \"2017-04-16\", \"price\": 9900}]', 0, NULL, 0, 'THB', 0, 1, 1, '2017-02-01', '2017-04-16'),
(12, 'thailand domestic tour', 'เกาะช้าง 3 วัน 2 คืน', 'Koh-chang 3 days 2 nights', 'Koh-chang-3-days-2-nights', 'sp', 'ดำน้ำดูปะการัง หมู่เกาะรัง – เกาะโล้น – เกาะมะปริง – เกาะยักษ์', '<b><u>เริ่มเดินทาง ตุลาคม 2559 – 31 พฤษภาคม 2560  ตั้งแต่ 2 ท่านขึ้นไป</u></b>\n<br>\n<br>\n<b><u style=\"color:red;\">อัตรานี้รวม</u></b>\n<br>\n<br>\n<li>\nรถบัส ไป-กลับ จาก กทม. + ตั๋วเรือ ข้ามเกาะช้าง\n</li>\n<li>\nที่พัก 2 คืน บังกะโล Magic Resort  หาดคลองพร้าว\n</li>\n<li>\nอาหาร 3 มื้อ (เช้า 2 มื้อ, เที่ยง 1 มื้อ)\n</li>\n<li>\nทัวร์ดำน้ำ 4 เกาะ หมู่เกาะรัง\n</li>\n<li>\nประกันอุบัติเหตุการเดินทางวงเงิน 1 ล้าน\n</li>\n<br>\n<br>\n<b>\nท่านสามารถกำหนดวันเดินทางได้ทุกวันโดยมีผู้เดินทางเริ่มต้นที่ 2 ท่านขึ้นไป \n</b>\n<br>\n<br>\n<u>อัตราค่าบริการต่อท่าน</u> ราคาเด็กผู้ใหญ่เท่ากัน เด็กต่ำกว่า 3 ขวบ ฟรี...ไม่มีที่นั่งบนรถบัส\n<br><br>\n<b>กรุณาจองล่วงหน้า 3 วัน ยกเว้นเทศกาล (จองล่วงหน้าเกิน 3 วัน) เนื่องจากเขื่อนไขของบริษัทประกันฯ จะไม่คุ้มครองหากจองต่ำกว่ากำหนดการเดินทาง \n</b>', '[{\"route\":\"กรุงเทพฯ – ตราด  – เกาะช้าง \",\"hotel\":\"บังกะโล Magic Resort หาดคลองพร้าว\"},{\"route\":\"หมู่เกาะรัง – เกาะโล้น – เกาะมะปริง\",\"hotel\":\"บังกะโล Magic Resort หาดคลองพร้าว \"},{\"route\":\" เกาะช้าง – กรุงเทพฯ\",\"hotel\":\"\"}]', 12, '12.pdf', '3,2', 3900.00, '[{\"from\": \"2016-10-01\",\"to\": \"2016-10-03\",\"price\": 3900},{\"from\": \"2016-10-04\",\"to\": \"2016-10-06\",\"price\": 3900},{\"from\": \"2016-10-07\",\"to\": \"2016-10-09\",\"price\": 3900},{\"from\": \"2016-10-10\",\"to\": \"2016-10-12\",\"price\": 3900},{\"from\": \"2016-10-13\",\"to\": \"2016-10-15\",\"price\": 3900},{\"from\": \"2016-10-16\",\"to\": \"2016-10-18\",\"price\": 3900},{\"from\": \"2016-10-19\",\"to\": \"2016-10-21\",\"price\": 3900},{\"from\": \"2016-10-22\",\"to\": \"2016-10-24\",\"price\": 3900},{\"from\": \"2016-10-25\",\"to\": \"2016-10-27\",\"price\": 3900},{\"from\": \"2016-10-28\",\"to\": \"2016-10-30\",\"price\": 3900},{\"from\": \"2016-10-31\",\"to\": \"2016-11-02\",\"price\": 3900},{\"from\": \"2016-11-03\",\"to\": \"2016-11-05\",\"price\": 3900},{\"from\": \"2016-11-06\",\"to\": \"2016-11-08\",\"price\": 3900},{\"from\": \"2016-11-09\",\"to\": \"2016-11-11\",\"price\": 3900},{\"from\": \"2016-11-12\",\"to\": \"2016-11-14\",\"price\": 3900},{\"from\": \"2016-11-15\",\"to\": \"2016-11-17\",\"price\": 3900},{\"from\": \"2016-11-18\",\"to\": \"2016-11-20\",\"price\": 3900},{\"from\": \"2016-11-21\",\"to\": \"2016-11-23\",\"price\": 3900},{\"from\": \"2016-11-24\",\"to\": \"2016-11-26\",\"price\": 3900},{\"from\": \"2016-11-27\",\"to\": \"2016-11-29\",\"price\": 3900},{\"from\": \"2016-11-30\",\"to\": \"2016-12-02\",\"price\": 3900},{\"from\": \"2016-12-03\",\"to\": \"2016-12-05\",\"price\": 3900},{\"from\": \"2016-12-06\",\"to\": \"2016-12-08\",\"price\": 3900},{\"from\": \"2016-12-09\",\"to\": \"2016-12-11\",\"price\": 3900},{\"from\": \"2016-12-12\",\"to\": \"2016-12-14\",\"price\": 3900},{\"from\": \"2016-12-15\",\"to\": \"2016-12-17\",\"price\": 3900},{\"from\": \"2016-12-18\",\"to\": \"2016-12-20\",\"price\": 3900},{\"from\": \"2016-12-21\",\"to\": \"2016-12-23\",\"price\": 3900},{\"from\": \"2016-12-24\",\"to\": \"2016-12-26\",\"price\": 3900},{\"from\": \"2016-12-27\",\"to\": \"2016-12-29\",\"price\": 3900},{\"from\": \"2016-12-30\",\"to\": \"2017-01-01\",\"price\": 3900},{\"from\": \"2017-01-02\",\"to\": \"2017-01-04\",\"price\": 3900},{\"from\": \"2017-01-05\",\"to\": \"2017-01-07\",\"price\": 3900},{\"from\": \"2017-01-08\",\"to\": \"2017-01-10\",\"price\": 3900},{\"from\": \"2017-01-11\",\"to\": \"2017-01-13\",\"price\": 3900},{\"from\": \"2017-01-14\",\"to\": \"2017-01-16\",\"price\": 3900},{\"from\": \"2017-01-17\",\"to\": \"2017-01-19\",\"price\": 3900},{\"from\": \"2017-01-20\",\"to\": \"2017-01-22\",\"price\": 3900},{\"from\": \"2017-01-23\",\"to\": \"2017-01-25\",\"price\": 3900},{\"from\": \"2017-01-26\",\"to\": \"2017-01-28\",\"price\": 3900},{\"from\": \"2017-01-29\",\"to\": \"2017-01-31\",\"price\": 3900},{\"from\": \"2017-02-01\",\"to\": \"2017-02-03\",\"price\": 3900},{\"from\": \"2017-02-04\",\"to\": \"2017-02-06\",\"price\": 3900},{\"from\": \"2017-02-07\",\"to\": \"2017-02-09\",\"price\": 3900},{\"from\": \"2017-02-10\",\"to\": \"2017-02-12\",\"price\": 3900},{\"from\": \"2017-02-13\",\"to\": \"2017-02-15\",\"price\": 3900},{\"from\": \"2017-02-16\",\"to\": \"2017-02-18\",\"price\": 3900},{\"from\": \"2017-02-19\",\"to\": \"2017-02-21\",\"price\": 3900},{\"from\": \"2017-02-22\",\"to\": \"2017-02-24\",\"price\": 3900},{\"from\": \"2017-02-25\",\"to\": \"2017-02-27\",\"price\": 3900},{\"from\": \"2017-02-28\",\"to\": \"2017-03-02\",\"price\": 3900},{\"from\": \"2017-03-03\",\"to\": \"2017-03-05\",\"price\": 3900},{\"from\": \"2017-03-06\",\"to\": \"2017-03-08\",\"price\": 3900},{\"from\": \"2017-03-09\",\"to\": \"2017-03-11\",\"price\": 3900},{\"from\": \"2017-03-12\",\"to\": \"2017-03-14\",\"price\": 3900},{\"from\": \"2017-03-15\",\"to\": \"2017-03-17\",\"price\": 3900},{\"from\": \"2017-03-18\",\"to\": \"2017-03-20\",\"price\": 3900},{\"from\": \"2017-03-21\",\"to\": \"2017-03-23\",\"price\": 3900},{\"from\": \"2017-03-24\",\"to\": \"2017-03-26\",\"price\": 3900},{\"from\": \"2017-03-27\",\"to\": \"2017-03-29\",\"price\": 3900},{\"from\": \"2017-03-30\",\"to\": \"2017-04-01\",\"price\": 3900},{\"from\": \"2017-04-02\",\"to\": \"2017-04-04\",\"price\": 3900},{\"from\": \"2017-04-05\",\"to\": \"2017-04-07\",\"price\": 3900},{\"from\": \"2017-04-08\",\"to\": \"2017-04-10\",\"price\": 3900},{\"from\": \"2017-04-11\",\"to\": \"2017-04-13\",\"price\": 4400},{\"from\": \"2017-04-14\",\"to\": \"2017-04-16\",\"price\": 4400},{\"from\": \"2017-04-17\",\"to\": \"2017-04-19\",\"price\": 4400},{\"from\": \"2017-04-20\",\"to\": \"2017-04-22\",\"price\": 3900},{\"from\": \"2017-04-23\",\"to\": \"2017-04-25\",\"price\": 3900},{\"from\": \"2017-04-26\",\"to\": \"2017-04-28\",\"price\": 3900},{\"from\": \"2017-04-29\",\"to\": \"2017-05-01\",\"price\": 3900},{\"from\": \"2017-05-02\",\"to\": \"2017-05-04\",\"price\": 3900},{\"from\": \"2017-05-05\",\"to\": \"2017-05-07\",\"price\": 3900},{\"from\": \"2017-05-08\",\"to\": \"2017-05-10\",\"price\": 3900},{\"from\": \"2017-05-11\",\"to\": \"2017-05-13\",\"price\": 3900},{\"from\": \"2017-05-14\",\"to\": \"2017-05-16\",\"price\": 3900},{\"from\": \"2017-05-17\",\"to\": \"2017-05-19\",\"price\": 3900},{\"from\": \"2017-05-20\",\"to\": \"2017-05-22\",\"price\": 3900},{\"from\": \"2017-05-23\",\"to\": \"2017-05-25\",\"price\": 3900},{\"from\": \"2017-05-26\",\"to\": \"2017-05-28\",\"price\": 3900},{\"from\": \"2017-05-29\",\"to\": \"2017-05-31\",\"price\": 3900}]', 0, NULL, 0, 'THB', 0, 0, 1, '2016-10-01', '2017-05-31'),
(14, 'international tour', 'เชียงใหม่ - ย่างกุ้ง 3 คืน 4 วัน', 'Easy Package UB 01 Chiang Mai - Rangoon 3 Night 4 Day', 'Easy-Package-UB 01-Chiang-Mai-Rangoon-3-Night-4-Day', 'ep', 'โดยสายการบิน...Myanmar National Airlines   ', '<b><u>สำหรับ 2 ท่านขึ้นไป เดินทางทุกวันศุกร์</u></b>\r\n<br><br>\r\n<b><u>อัตรานี้รวม</u></b>\r\n<br><br>\r\n<li>ค่าตั๋วเครื่องบินเชียงใหม่ – ย่างกุ้ง – เชียงใหม่ โดยสายการบิน <b>Myanmar National Airline</b></li>\r\n<li>ค่าโรงแรมที่พัก 3 คืน <i>(Half Twin Sharing )<i></li>\r\n<li>ค่าอาหารตามรายการ</li>\r\n<li>ค่าประกันอุบัติเหตุการเดินทาง (Personal  Accident) วงเงินท่านละ  1,000,000  บาท</li>\r\n<li>ค่ารักษา  พยาบาล(Accident medical Expense) วงเงินท่านละ 500,000 บาท</li>\r\n<br><br>\r\n<b><u>อัตรานี้ไม่รวม</u></b>\r\n<br><br>\r\n<li>ค่าวีซ่าสำหรับคนต่างชาติ (คนไทยไม่ใช้วีซ่า)</li>\r\n<li>ค่ารถเดินทางตลอดทริป</li>\r\n<li>ค่ามินิบาร์ในห้องพัก และค่าใช้จ่ายอื่น ๆ นอกเหนือรายการที่ระบุ</li>\r\n<br><br>\r\n<b><u>เอกสารในการเดินทาง</u></b>: พาสปอร์ต ที่มีอายุเหลือใช้งานได้ไม่น้อยกว่า 6 เดือน\r\n<br><br><br><br>\r\n<b>“ซื่อสัตย์ จริงใจ ห่วงใย เน้นบริการ คืองานของเรา”</b>', '[{\"route\":\"เชียงใหม่- ย่างกุ้ง\",\"hotel\":\"\"},{\"route\":\"ย่างกุ้ง\",\"hotel\":\"\"},{\"route\":\"ย่างกุ้ง\",\"hotel\":\"\"},{\"route\":\"ย่างกุ้ง-เชียงใหม่\", \"hotel\":\"\"}]', 14, '14.pdf', '4,3', 6900.00, '[{\"from\": \"2016-11-04\",\"to\": \"2016-12-10\",\"price\": 6900},{\"from\":\"2016-12-29\",\"to\":\"2017-01-15\",\"price\":8900},{\"from\":\"2017-04-19\",\"to\":\"2017-04-22\",\"price\":7900},{\"from\":\"2017-04-30\",\"to\":\"2017-05-22\",\"price\":9900}]', 1, '', 0, 'THB', 0, 0, 1, '2016-11-01', '2017-06-30');

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
(21, 8, 20),
(22, 11, 21),
(23, 11, 22),
(24, 12, 23),
(27, 14, 24),
(28, 14, 26);

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
  `tc_chooseCondition` text,
  `tc_data` text NOT NULL,
  `tc_order` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(21, 10, 'increase', 1200.00, 'room', NULL, '[{\"roomtype\":Children < 2 year old\",\"roomdetail\":\"with bed\"}]', 2),
(22, 4, 'increase', 1500.00, 'option', NULL, 'Stay at good view', 3),
(23, 4, 'decrease', 1000.00, 'option', NULL, 'No breakfast', 4),
(24, 11, 'increase', 2500.00, 'room', NULL, '[{\"roomtype\":\"Single room\",\"roomdetail\":\"\"}]', 1),
(25, 11, 'increase', 8900.00, 'room', NULL, '[{\"roomtype\":\"Children < 2 year old\",\"roomdetail\":\"with bed\"}]', 2),
(26, 11, 'increase', 8400.00, 'room', NULL, '[{\"roomtype\":\"Children < 2 year old\",\"roomdetail\":\"with out bed\"}]', 3),
(27, 12, 'increase', 4900.00, 'room', NULL, '[{\"roomtype\":\"Single room\",\"roomdetail\":\"\"}]', 1),
(29, 14, NULL, NULL, 'hotel', NULL, '[{\n	\"name\": \"Holly Hotel\",\n	\"star\": 3,\n	\"locationEN\": \"Near Airport\",\n	\"locationTH\": \"ใกล้สนามบิน\",\n	\"room\": [{\n		\"roomtype\": \"Twin room\",\n		\"price\": 0,\n		\"extension\": 500\n	}, {\n		\"roomtype\": \"Single room\",\n		\"price\": 2500,\n		\"extension\": 900\n	}]\n}, {\n	\"name\": \"Up Town\",\n	\"star\": 3,\n	\"locationEN\": \"Near Down Town\",\n	\"locationTH\": \"ใกล้สนามบิน\",\n	\"room\": [{\n		\"roomtype\": \"Twin room\",\n		\"price\": 0,\n		\"extension\": 500\n	}, {\n		\"roomtype\": \"Single room\",\n		\"price\": 2500,\n		\"extension\": 900\n	}]\n}, {\n	\"name\": \"Summit Park View\",\n	\"star\": 4,\n	\"locationEN\": \"Near Shwedagon\",\n	\"locationTH\": \"ใกล้พระเจดีย์ชเวดากอง\",\n	\"room\": [{\n		\"roomtype\": \"Twin room\",\n		\"price\": 0,\n		\"extension\": 900\n	}, {\n		\"roomtype\": \"Single room\",\n		\"price\": 3500,\n		\"extension\": 1200\n	}]\n}, {\n	\"name\": \"Vintage Luxury Yacht\",\n	\"star\": 5,\n	\"locationEN\": \"Near Botataung\",\n	\"locationTH\": \"ใกล้พระเจดีย์โบตะตอง\",\n	\"room\": [{\n		\"roomtype\": \"Twin room\",\n		\"price\": 0,\n		\"extension\": 1000\n	}, {\n		\"roomtype\": \"Single room\",\n		\"price\": 3500,\n		\"extension\": 1300\n	}]\n}]', 1),
(43, 14, 'increase', 1000.00, 'option', NULL, 'Stay at good view', 1),
(46, 14, NULL, 1500.00, 'option activity', NULL, 'Climbing', 1),
(47, 14, NULL, 2500.00, 'option activity', NULL, 'River cruise', 2);

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
-- Indexes for table `continents`
--
ALTER TABLE `continents`
  ADD PRIMARY KEY (`continent_id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`country_id`);

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
-- Indexes for table `geography`
--
ALTER TABLE `geography`
  ADD PRIMARY KEY (`geography_id`);

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
-- Indexes for table `mapping`
--
ALTER TABLE `mapping`
  ADD PRIMARY KEY (`mapping_id`);

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
-- Indexes for table `province`
--
ALTER TABLE `province`
  ADD PRIMARY KEY (`province_id`);

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
  MODIFY `address_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `agent`
--
ALTER TABLE `agent`
  MODIFY `agent_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
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
  MODIFY `client_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=260;
--
-- AUTO_INCREMENT for table `continents`
--
ALTER TABLE `continents`
  MODIFY `continent_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `country_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=247;
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
-- AUTO_INCREMENT for table `geography`
--
ALTER TABLE `geography`
  MODIFY `geography_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
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
  MODIFY `img_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
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
-- AUTO_INCREMENT for table `mapping`
--
ALTER TABLE `mapping`
  MODIFY `mapping_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
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
-- AUTO_INCREMENT for table `province`
--
ALTER TABLE `province`
  MODIFY `province_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;
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
  MODIFY `tour_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `tour_address`
--
ALTER TABLE `tour_address`
  MODIFY `ta_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `tour_condition`
--
ALTER TABLE `tour_condition`
  MODIFY `tc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
