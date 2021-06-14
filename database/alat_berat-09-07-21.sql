-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 09, 2021 at 03:37 AM
-- Server version: 8.0.23
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `alat_berat`
--

-- --------------------------------------------------------

--
-- Table structure for table `acc_asset`
--

CREATE TABLE `acc_asset` (
  `id_asset` varchar(100) NOT NULL,
  `idcompany` varchar(255) NOT NULL,
  `id_adc` varchar(100) NOT NULL,
  `code_asset` varchar(500) NOT NULL,
  `name_asset` varchar(254) NOT NULL,
  `type_asset` enum('Bank & Cash','Current Asset','Non-Current Asset','Fixed Asset','Inventory','Prepayment') NOT NULL,
  `desc_asset` text NOT NULL,
  `entries_asset` int NOT NULL,
  `actions_asset` enum('system_account','edit_delete') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `acc_default_coa`
--

CREATE TABLE `acc_default_coa` (
  `id_adc` varchar(100) NOT NULL,
  `code` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `type_coa` enum('asset','liabilities','expenses','income','equity') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `acc_equity`
--

CREATE TABLE `acc_equity` (
  `id_equity` int NOT NULL,
  `idcompany` varchar(255) NOT NULL,
  `code` int NOT NULL,
  `name` varchar(254) NOT NULL,
  `type` enum('equity') NOT NULL,
  `entries` int NOT NULL,
  `actions` enum('system_account','edit_delete') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `acc_expenses`
--

CREATE TABLE `acc_expenses` (
  `id_expenses` int NOT NULL,
  `idcompany` varchar(255) NOT NULL,
  `code` int NOT NULL,
  `name` varchar(254) NOT NULL,
  `type` enum('depreciation','direct_cost','expense') NOT NULL,
  `entries` int NOT NULL,
  `actions` enum('system_account','edit_delete') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `acc_income`
--

CREATE TABLE `acc_income` (
  `id_income` int NOT NULL,
  `idcompany` varchar(255) NOT NULL,
  `code` int NOT NULL,
  `name` varchar(254) NOT NULL,
  `type` enum('revenue','sales','other_income') NOT NULL,
  `entries` int NOT NULL,
  `actions` enum('system_account','edit_delete') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `acc_liabilities`
--

CREATE TABLE `acc_liabilities` (
  `id_liabilities` int NOT NULL,
  `idcompany` varchar(255) NOT NULL,
  `code` int NOT NULL,
  `name` varchar(254) NOT NULL,
  `type` enum('liability','current_liability','noncurrent_liability') NOT NULL,
  `entries` int NOT NULL,
  `actions` enum('system_account','edit_delete') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `address_company`
--

CREATE TABLE `address_company` (
  `idaddcompany` bigint NOT NULL,
  `idcompany` varchar(225) NOT NULL,
  `addcompany` text NOT NULL,
  `addsetcreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `address_company`
--

INSERT INTO `address_company` (`idaddcompany`, `idcompany`, `addcompany`, `addsetcreated`) VALUES
(6, '288ccad4-916e-43af-af42-82cc69fc76eb', 'Banda Aceh', '2021-05-18 13:00:52');

-- --------------------------------------------------------

--
-- Table structure for table `address_contacts`
--

CREATE TABLE `address_contacts` (
  `idaddr` int NOT NULL,
  `idcompany` varchar(225) NOT NULL,
  `idcontacts` varchar(225) NOT NULL,
  `address` text NOT NULL,
  `addcreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `address_contacts`
--

INSERT INTO `address_contacts` (`idaddr`, `idcompany`, `idcontacts`, `address`, `addcreated`) VALUES
(1, '288ccad4-916e-43af-af42-82cc69fc76eb', '9ba36f79-b871-4902-8e70-bf3baf7ce0e0', 'Medan', '2021-05-19 10:32:23');

-- --------------------------------------------------------

--
-- Table structure for table `add_itemcost`
--

CREATE TABLE `add_itemcost` (
  `iditem` varchar(225) NOT NULL,
  `idcompany` varchar(225) NOT NULL,
  `item` text NOT NULL,
  `created_at` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `add_project`
--

CREATE TABLE `add_project` (
  `code` varchar(225) NOT NULL,
  `project_name` varchar(225) DEFAULT NULL,
  `category` varchar(225) DEFAULT NULL,
  `pic` text,
  `level` varchar(225) DEFAULT NULL,
  `date` text,
  `addres` varchar(225) DEFAULT NULL,
  `province` text,
  `regency` text,
  `district` text,
  `village` text,
  `name_client` varchar(225) DEFAULT NULL,
  `ktp` varchar(225) DEFAULT NULL,
  `client_addres` text
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `add_unit`
--

CREATE TABLE `add_unit` (
  `idunit` varchar(225) NOT NULL,
  `idcompany` varchar(225) NOT NULL,
  `unit` text NOT NULL,
  `created_at` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `airlines`
--

CREATE TABLE `airlines` (
  `id_airlines` varchar(255) NOT NULL,
  `idcompany` varchar(255) NOT NULL,
  `airlines` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `created` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `announcement`
--

CREATE TABLE `announcement` (
  `id` int NOT NULL,
  `idann` varchar(225) NOT NULL,
  `idcompany` varchar(225) NOT NULL,
  `anntitle` text NOT NULL,
  `anndesc` text NOT NULL,
  `annsendto` varchar(50) NOT NULL,
  `annsenddetail` text NOT NULL,
  `adddate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `announcement`
--

INSERT INTO `announcement` (`id`, `idann`, `idcompany`, `anntitle`, `anndesc`, `annsendto`, `annsenddetail`, `adddate`) VALUES
(1, 'e6616868-0a2a-4c17-a6e9-4bbacabc81fb', '288ccad4-916e-43af-af42-82cc69fc76eb', 'COBA', 'asdasd', 'all', '', '2021-05-19 17:20:41');

-- --------------------------------------------------------

--
-- Table structure for table `annsendto`
--

CREATE TABLE `annsendto` (
  `idannsendto` int NOT NULL,
  `idcompany` varchar(225) NOT NULL,
  `diann` varchar(225) NOT NULL,
  `mainid` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `annsendto`
--

INSERT INTO `annsendto` (`idannsendto`, `idcompany`, `diann`, `mainid`) VALUES
(1, '288ccad4-916e-43af-af42-82cc69fc76eb', '', 'e6616868-0a2a-4c17-a6e9-4bbacabc81fb');

-- --------------------------------------------------------

--
-- Table structure for table `branch_office`
--

CREATE TABLE `branch_office` (
  `branch_id` varchar(255) NOT NULL,
  `idcompany` varchar(255) NOT NULL,
  `branch` varchar(255) NOT NULL,
  `type` enum('Office','Warehouse') NOT NULL,
  `state` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `zip` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `idcategory` varchar(225) NOT NULL,
  `idcompany` varchar(225) NOT NULL,
  `categoryname` text NOT NULL,
  `color` varchar(225) NOT NULL,
  `categorycreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `idcompany` varchar(225) NOT NULL,
  `code` varchar(11) NOT NULL,
  `companyname` text NOT NULL,
  `penanggungjawab` text NOT NULL,
  `jlhpemakai` int NOT NULL,
  `paket` varchar(20) NOT NULL,
  `suspended` enum('no','yes') NOT NULL,
  `comphoto` text NOT NULL,
  `notelp` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `website` varchar(100) NOT NULL,
  `companycreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cargo` text NOT NULL,
  `architecture` text NOT NULL,
  `hospitality` text NOT NULL,
  `health` text NOT NULL,
  `maintenance` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`idcompany`, `code`, `companyname`, `penanggungjawab`, `jlhpemakai`, `paket`, `suspended`, `comphoto`, `notelp`, `email`, `website`, `companycreated`, `cargo`, `architecture`, `hospitality`, `health`, `maintenance`) VALUES
('288ccad4-916e-43af-af42-82cc69fc76eb', 'X - 445443', 'PT MAK', 'ptmak', 10, 'Premium', 'no', '', '', '', '', '2021-05-18 13:00:52', 'No', 'No', 'No', 'No', 'No');

-- --------------------------------------------------------

--
-- Table structure for table `consignee`
--

CREATE TABLE `consignee` (
  `id_consignee` varchar(255) NOT NULL,
  `idcompany` varchar(255) NOT NULL,
  `consignee` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `created` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `idcontacts` varchar(225) NOT NULL,
  `idcompany` varchar(225) NOT NULL,
  `first_name` text NOT NULL,
  `last_name` text NOT NULL,
  `email` text NOT NULL,
  `phone_no` varchar(20) NOT NULL,
  `job_title` text NOT NULL,
  `company` text NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` text NOT NULL,
  `zip` varchar(15) NOT NULL,
  `joined` varchar(20) NOT NULL,
  `photo` text NOT NULL,
  `contactcreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`idcontacts`, `idcompany`, `first_name`, `last_name`, `email`, `phone_no`, `job_title`, `company`, `city`, `state`, `zip`, `joined`, `photo`, `contactcreated`) VALUES
('9ba36f79-b871-4902-8e70-bf3baf7ce0e0', '288ccad4-916e-43af-af42-82cc69fc76eb', 'Sri', 'Gunawan', 'gunawand@gmail.com', '83129302481', 'HRD', 'Literasia', 'Medan', 'Sulawesi Utara', '20993', '05/19/2021', '', '2021-05-19 10:32:23');

-- --------------------------------------------------------

--
-- Table structure for table `contoh`
--

CREATE TABLE `contoh` (
  `code` varchar(225) NOT NULL,
  `date` date NOT NULL,
  `img` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cost`
--

CREATE TABLE `cost` (
  `cost_id` varchar(255) NOT NULL,
  `idcompany` varchar(255) NOT NULL,
  `cost` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `iddepartment` varchar(225) NOT NULL,
  `idcompany` varchar(225) NOT NULL,
  `departmenttitle` text NOT NULL,
  `departmentdesc` text NOT NULL,
  `departmentlead` text NOT NULL,
  `parentdepartment` text NOT NULL,
  `departmentstatus` int NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`iddepartment`, `idcompany`, `departmenttitle`, `departmentdesc`, `departmentlead`, `parentdepartment`, `departmentstatus`) VALUES
('2272a354-dba4-4bff-b473-7bdcc95c2ce4', '7fbbfd48-70d2-47c4-8120-456161a77b7a', 'IT', '', 'Yuda', '', 0),
('d2915495-0c5d-4e3a-b53d-636d4daadc82', '288ccad4-916e-43af-af42-82cc69fc76eb', 'IT', '', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `designation`
--

CREATE TABLE `designation` (
  `iddesignation` varchar(225) NOT NULL,
  `idcompany` varchar(225) NOT NULL,
  `designationtitle` text NOT NULL,
  `designationdecs` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `designation`
--

INSERT INTO `designation` (`iddesignation`, `idcompany`, `designationtitle`, `designationdecs`) VALUES
('7fa602d4-6514-4811-8564-aa796fe1a91a', '7fbbfd48-70d2-47c4-8120-456161a77b7a', 'Programmer', ''),
('2af0dfe7-136b-4800-9beb-d05a09a5faf8', '288ccad4-916e-43af-af42-82cc69fc76eb', 'Programmer', '');

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `id_distric` char(7) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `regency_id` char(4) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name_distric` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `mainid` varchar(225) NOT NULL,
  `idcompany` varchar(225) DEFAULT NULL,
  `employeid` varchar(100) DEFAULT NULL,
  `fname` text,
  `lname` text,
  `mname` text,
  `email` varchar(50) DEFAULT NULL,
  `employetype` text,
  `employestatus` text,
  `datehire` varchar(15) DEFAULT NULL,
  `department` text,
  `jobtitle` text,
  `location` text,
  `reportingto` text,
  `sourceofhire` text,
  `payrate` text,
  `paytype` text,
  `workphone` varchar(20) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `handphone` varchar(20) DEFAULT NULL,
  `otheremail` text,
  `birth` varchar(15) DEFAULT NULL,
  `nationality` text,
  `gender` varchar(20) DEFAULT NULL,
  `status` text,
  `drivinglicense` text,
  `address` text,
  `city` text,
  `state` text,
  `zipcode` varchar(15) DEFAULT NULL,
  `photo` varchar(100) DEFAULT NULL,
  `sendnotif` enum('no','yes') DEFAULT NULL,
  `allow` enum('no','yes') DEFAULT NULL,
  `available` int DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`mainid`, `idcompany`, `employeid`, `fname`, `lname`, `mname`, `email`, `employetype`, `employestatus`, `datehire`, `department`, `jobtitle`, `location`, `reportingto`, `sourceofhire`, `payrate`, `paytype`, `workphone`, `phone`, `handphone`, `otheremail`, `birth`, `nationality`, `gender`, `status`, `drivinglicense`, `address`, `city`, `state`, `zipcode`, `photo`, `sendnotif`, `allow`, `available`, `created_at`) VALUES
('716cd6a3a75d495da6840ef5f63f3ef4', '288ccad4-916e-43af-af42-82cc69fc76eb', '090399', 'Yuda', 'Pratama', 'Budi', 'yuda@literasia.co.id', 'Full Time', 'active', '12/11/2017', 'd2915495-0c5d-4e3a-b53d-636d4daadc82', '2af0dfe7-136b-4800-9beb-d05a09a5faf8', NULL, NULL, 'Direct', 'Rp 2,000,000.00', 'Monthly', '(+62)853-6180-0215', '', '(+62)896-9090-9093', 'ybpcrest@gmail.com', '09/03/1999', 'Indonesia', 'Man', 'Single', '990307150044', 'Gunung Para II', NULL, '12', '20993', '', 'no', 'no', 12, '2021-05-19 10:19:29');

-- --------------------------------------------------------

--
-- Table structure for table `employee_access`
--

CREATE TABLE `employee_access` (
  `idaccess` varchar(225) NOT NULL,
  `idcompany` varchar(225) NOT NULL,
  `mainid` varchar(225) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `ip` varchar(20) DEFAULT NULL,
  `accesscreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee_access`
--

INSERT INTO `employee_access` (`idaccess`, `idcompany`, `mainid`, `username`, `password`, `ip`, `accesscreated`) VALUES
('716cd6a3a75d495da6840ef5f63f3ef4', '288ccad4-916e-43af-af42-82cc69fc76eb', '716cd6a3a75d495da6840ef5f63f3ef4', 'yudabp', '$2y$10$PF2Z/Rh2E6xdMAW4iCXMuu/vARfPLKhZJBHwYSagW2qY2iWkzISF.', NULL, '2021-05-19 10:19:29');

-- --------------------------------------------------------

--
-- Table structure for table `employee_role`
--

CREATE TABLE `employee_role` (
  `mainid` varchar(225) NOT NULL,
  `role_id` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `estimation_cost`
--

CREATE TABLE `estimation_cost` (
  `id_estimation` varchar(225) NOT NULL,
  `id_quotation` varchar(225) NOT NULL,
  `item_cost` varchar(100) NOT NULL,
  `unit` varchar(20) NOT NULL,
  `qty` varchar(15) NOT NULL,
  `price` float DEFAULT NULL,
  `amount_idr` float DEFAULT NULL,
  `amount_usd` float DEFAULT NULL,
  `vendor` varchar(100) NOT NULL,
  `estimationcreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `holidays`
--

CREATE TABLE `holidays` (
  `idholidays` varchar(225) NOT NULL,
  `idcompany` varchar(225) NOT NULL,
  `holidayname` text NOT NULL,
  `holidaystart` varchar(20) NOT NULL,
  `holidaysend` varchar(20) NOT NULL,
  `holidaysdays` int NOT NULL,
  `holidaysdesc` text NOT NULL,
  `holidayscreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `holidayscolor` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hrm_setting_gracetime`
--

CREATE TABLE `hrm_setting_gracetime` (
  `idgracetime` varchar(225) NOT NULL,
  `idcompany` varchar(225) NOT NULL,
  `before_check_in` varchar(10) NOT NULL,
  `after_check_in` varchar(10) NOT NULL,
  `before_check_out` varchar(10) NOT NULL,
  `after_check_out` varchar(10) NOT NULL,
  `self_service` varchar(15) DEFAULT NULL,
  `shift` varchar(15) DEFAULT NULL,
  `office_start` varchar(15) NOT NULL,
  `office_end` varchar(15) NOT NULL,
  `gracetime_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hrm_setting_machine`
--

CREATE TABLE `hrm_setting_machine` (
  `idmachine` varchar(225) NOT NULL,
  `idcompany` varchar(225) NOT NULL,
  `machine_name` varchar(225) NOT NULL,
  `machine_start` varchar(15) NOT NULL,
  `machine_end` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hrm_setting_shift`
--

CREATE TABLE `hrm_setting_shift` (
  `idshift` varchar(225) NOT NULL,
  `idcompany` varchar(225) NOT NULL,
  `shift_name` varchar(225) NOT NULL,
  `shift_start` varchar(15) NOT NULL,
  `shift_end` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hrm_setting_trip`
--

CREATE TABLE `hrm_setting_trip` (
  `idtrip` varchar(225) NOT NULL,
  `idcompany` varchar(225) NOT NULL,
  `trip_name` varchar(225) NOT NULL,
  `trip_start` varchar(15) NOT NULL,
  `trip_end` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hrm_setting_workdays`
--

CREATE TABLE `hrm_setting_workdays` (
  `idwork` varchar(225) NOT NULL,
  `idcompany` varchar(225) NOT NULL,
  `sun` varchar(50) NOT NULL,
  `sun_start` varchar(15) DEFAULT NULL,
  `sun_end` varchar(15) DEFAULT NULL,
  `mon` varchar(50) NOT NULL,
  `mon_start` varchar(15) DEFAULT NULL,
  `mon_end` varchar(15) DEFAULT NULL,
  `tue` varchar(50) NOT NULL,
  `tue_start` varchar(15) DEFAULT NULL,
  `tue_end` varchar(15) DEFAULT NULL,
  `wed` varchar(50) NOT NULL,
  `wed_start` varchar(15) DEFAULT NULL,
  `wed_end` varchar(15) DEFAULT NULL,
  `thu` varchar(50) NOT NULL,
  `thu_start` varchar(15) DEFAULT NULL,
  `thu_end` varchar(15) DEFAULT NULL,
  `fri` varchar(50) NOT NULL,
  `fri_start` varchar(15) DEFAULT NULL,
  `fri_end` varchar(15) DEFAULT NULL,
  `sat` varchar(50) NOT NULL,
  `sat_start` varchar(15) DEFAULT NULL,
  `sat_end` varchar(15) DEFAULT NULL,
  `workcreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `job_order`
--

CREATE TABLE `job_order` (
  `id_job_order` varchar(225) NOT NULL,
  `idcompany` varchar(225) NOT NULL,
  `id_quotation` varchar(225) NOT NULL,
  `jo_number` varchar(100) NOT NULL,
  `jo_date` varchar(20) NOT NULL,
  `jo_type` varchar(50) NOT NULL,
  `freight_type` varchar(50) NOT NULL,
  `creator` varchar(100) NOT NULL,
  `jocreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Triggers `job_order`
--
DELIMITER $$
CREATE TRIGGER `delete_data` AFTER DELETE ON `job_order` FOR EACH ROW delete from jo_data where id_job_order = old.id_job_order
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `delete_data_air` AFTER DELETE ON `job_order` FOR EACH ROW delete from jo_data_air where id_job_order = old.id_job_order
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `delete_data_container` AFTER DELETE ON `job_order` FOR EACH ROW delete from jo_data_container where id_job_order = old.id_job_order
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `delete_data_pieces` AFTER DELETE ON `job_order` FOR EACH ROW delete from jo_data_pieces where id_job_order = old.id_job_order
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `delete_data_sea` AFTER DELETE ON `job_order` FOR EACH ROW delete from jo_data_sea where id_job_order = old.id_job_order
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `delete_data_status` AFTER DELETE ON `job_order` FOR EACH ROW delete from jo_data_status where id_job_order = old.id_job_order
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `jo_data`
--

CREATE TABLE `jo_data` (
  `id_jo_data` varchar(225) NOT NULL,
  `id_job_order` varchar(225) NOT NULL,
  `shipper` varchar(100) DEFAULT NULL,
  `consignee` varchar(100) DEFAULT NULL,
  `notify_party` varchar(100) DEFAULT NULL,
  `agent` varchar(100) DEFAULT NULL,
  `etd` varchar(20) DEFAULT NULL,
  `eta` varchar(20) DEFAULT NULL,
  `stuffing` varchar(20) DEFAULT NULL,
  `receive` varchar(100) DEFAULT NULL,
  `loading` varchar(100) DEFAULT NULL,
  `discharge` varchar(100) DEFAULT NULL,
  `delivery` varchar(100) DEFAULT NULL,
  `hs_code` varchar(50) DEFAULT NULL,
  `deskripsi` text
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jo_data_air`
--

CREATE TABLE `jo_data_air` (
  `id_data_air` varchar(225) NOT NULL,
  `id_job_order` varchar(225) NOT NULL,
  `airlines` varchar(100) DEFAULT NULL,
  `flight_number` varchar(50) DEFAULT NULL,
  `hawb_number` varchar(50) DEFAULT NULL,
  `mawb_number` varchar(50) DEFAULT NULL,
  `aita_code` varchar(50) DEFAULT NULL,
  `dataaircreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jo_data_container`
--

CREATE TABLE `jo_data_container` (
  `id_data_container` varchar(225) NOT NULL,
  `id_job_order` varchar(225) NOT NULL,
  `container_number` varchar(50) DEFAULT NULL,
  `seal_number` varchar(50) DEFAULT NULL,
  `type` varchar(20) DEFAULT NULL,
  `measurement` varchar(50) DEFAULT NULL,
  `net_weight` varchar(50) DEFAULT NULL,
  `gross_weight` varchar(50) DEFAULT NULL,
  `dataconcreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jo_data_pieces`
--

CREATE TABLE `jo_data_pieces` (
  `id_data_pieces` varchar(225) NOT NULL,
  `id_job_order` varchar(225) NOT NULL,
  `no_of_pieces` varchar(20) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `gross_weight` varchar(20) DEFAULT NULL,
  `chargeable_weight` varchar(20) DEFAULT NULL,
  `datapiecescreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jo_data_sea`
--

CREATE TABLE `jo_data_sea` (
  `id_data_sea` varchar(225) NOT NULL,
  `id_job_order` varchar(225) NOT NULL,
  `shipping_line` varchar(100) DEFAULT NULL,
  `shipment_number` varchar(50) DEFAULT NULL,
  `shipping_mark` text,
  `qty` varchar(20) DEFAULT NULL,
  `piece` varchar(50) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `bl_number` varchar(20) DEFAULT NULL,
  `mbl_number` varchar(20) DEFAULT NULL,
  `voyage` varchar(100) DEFAULT NULL,
  `vessel` varchar(100) DEFAULT NULL,
  `issued_office` varchar(100) DEFAULT NULL,
  `dataseacreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jo_data_status`
--

CREATE TABLE `jo_data_status` (
  `id_data_status` varchar(225) NOT NULL,
  `id_job_order` varchar(225) NOT NULL,
  `date` varchar(20) DEFAULT NULL,
  `time` varchar(20) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `note` text,
  `datastatuscreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `leavereq`
--

CREATE TABLE `leavereq` (
  `id` int NOT NULL,
  `idleavereq` varchar(225) NOT NULL,
  `idcompany` varchar(225) NOT NULL,
  `mainid` varchar(225) NOT NULL,
  `fromdate` varchar(20) NOT NULL,
  `todate` varchar(20) NOT NULL,
  `days` int NOT NULL,
  `leavereson` text NOT NULL,
  `leavecreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `leavereq`
--

INSERT INTO `leavereq` (`id`, `idleavereq`, `idcompany`, `mainid`, `fromdate`, `todate`, `days`, `leavereson`, `leavecreated`) VALUES
(2, '4376b23e-2793-423b-99d4-93f0f0a5d148', '288ccad4-916e-43af-af42-82cc69fc76eb', '716cd6a3a75d495da6840ef5f63f3ef4', '20/05/2021', '25/05/2021', 5, 'da', '2021-05-19 10:21:43');

-- --------------------------------------------------------

--
-- Table structure for table `log_karyawan`
--

CREATE TABLE `log_karyawan` (
  `id` int UNSIGNED NOT NULL,
  `idcompany` varchar(100) NOT NULL,
  `id_employe` varchar(225) NOT NULL,
  `text` varchar(225) DEFAULT NULL,
  `image` varchar(500) DEFAULT NULL,
  `color` varchar(10) DEFAULT NULL,
  `created_ad` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `log_user`
--

CREATE TABLE `log_user` (
  `id_log` int NOT NULL,
  `idcompany` varchar(225) NOT NULL,
  `id_user` varchar(225) NOT NULL,
  `waktu` datetime NOT NULL,
  `type` enum('Login','Logout') NOT NULL,
  `ip_address` varchar(30) NOT NULL,
  `browser` varchar(50) NOT NULL,
  `sistem_operasi` varchar(50) NOT NULL,
  `country` varchar(100) NOT NULL,
  `level` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `log_user`
--

INSERT INTO `log_user` (`id_log`, `idcompany`, `id_user`, `waktu`, `type`, `ip_address`, `browser`, `sistem_operasi`, `country`, `level`) VALUES
(1, 'faeab403-94fe-4bd1-981f-530283a3929c', 'faeab403-94fe-4bd1-981f-530283a3929c', '2021-05-18 19:45:41', 'Logout', '::1', 'Chrome', 'Linux', 'Indonesia', 'superakses'),
(2, '7fbbfd48-70d2-47c4-8120-456161a77b7a', '7fbbfd48-70d2-47c4-8120-456161a77b7a', '2021-05-18 19:47:43', 'Login', '::1', 'Chrome', 'Linux', 'Indonesia', 'superakses'),
(3, '7fbbfd48-70d2-47c4-8120-456161a77b7a', '7fbbfd48-70d2-47c4-8120-456161a77b7a', '2021-05-18 19:53:10', 'Logout', '::1', 'Chrome', 'Linux', 'Indonesia', 'superakses'),
(4, '7fbbfd48-70d2-47c4-8120-456161a77b7a', '7fbbfd48-70d2-47c4-8120-456161a77b7a', '2021-05-18 19:53:56', 'Login', '::1', 'Chrome', 'Linux', 'Indonesia', 'superakses'),
(5, '7fbbfd48-70d2-47c4-8120-456161a77b7a', '7fbbfd48-70d2-47c4-8120-456161a77b7a', '2021-05-18 19:57:07', 'Logout', '::1', 'Chrome', 'Linux', 'Indonesia', 'superakses'),
(6, '7fbbfd48-70d2-47c4-8120-456161a77b7a', '7fbbfd48-70d2-47c4-8120-456161a77b7a', '2021-05-18 19:57:12', 'Login', '::1', 'Chrome', 'Linux', 'Indonesia', 'superakses'),
(7, '7fbbfd48-70d2-47c4-8120-456161a77b7a', '7fbbfd48-70d2-47c4-8120-456161a77b7a', '2021-05-18 19:57:49', 'Logout', '::1', 'Chrome', 'Linux', 'Indonesia', 'superakses'),
(8, '7fbbfd48-70d2-47c4-8120-456161a77b7a', '7fbbfd48-70d2-47c4-8120-456161a77b7a', '2021-05-18 19:57:57', 'Login', '::1', 'Chrome', 'Linux', 'Indonesia', 'superakses'),
(9, '7fbbfd48-70d2-47c4-8120-456161a77b7a', '7fbbfd48-70d2-47c4-8120-456161a77b7a', '2021-05-18 20:00:59', 'Logout', '::1', 'Chrome', 'Linux', 'Indonesia', 'superakses'),
(10, '288ccad4-916e-43af-af42-82cc69fc76eb', '288ccad4-916e-43af-af42-82cc69fc76eb', '2021-05-18 20:01:04', 'Login', '::1', 'Chrome', 'Linux', 'Indonesia', 'superakses'),
(11, '288ccad4-916e-43af-af42-82cc69fc76eb', '288ccad4-916e-43af-af42-82cc69fc76eb', '2021-05-18 20:02:43', 'Logout', '::1', 'Chrome', 'Linux', 'Indonesia', 'superakses'),
(12, '288ccad4-916e-43af-af42-82cc69fc76eb', '288ccad4-916e-43af-af42-82cc69fc76eb', '2021-05-18 20:04:04', 'Login', '::1', 'Chrome', 'Linux', 'Indonesia', 'superakses'),
(13, '288ccad4-916e-43af-af42-82cc69fc76eb', '288ccad4-916e-43af-af42-82cc69fc76eb', '2021-05-19 16:17:30', 'Login', '::1', 'Chrome', 'Linux', 'Indonesia', 'superakses'),
(14, '288ccad4-916e-43af-af42-82cc69fc76eb', '288ccad4-916e-43af-af42-82cc69fc76eb', '2021-05-19 17:15:51', 'Login', '::1', 'Chrome', 'Linux', 'Indonesia', 'superakses'),
(15, '288ccad4-916e-43af-af42-82cc69fc76eb', '288ccad4-916e-43af-af42-82cc69fc76eb', '2021-05-20 15:15:30', 'Login', '::1', 'Chrome', 'Linux', 'Indonesia', 'superakses'),
(16, '288ccad4-916e-43af-af42-82cc69fc76eb', '288ccad4-916e-43af-af42-82cc69fc76eb', '2021-06-03 14:02:56', 'Login', '::1', 'Chrome', 'Linux', 'Indonesia', 'superakses'),
(17, '288ccad4-916e-43af-af42-82cc69fc76eb', '288ccad4-916e-43af-af42-82cc69fc76eb', '2021-06-05 11:48:25', 'Login', '::1', 'Chrome', 'Linux', 'Indonesia', 'superakses'),
(18, '288ccad4-916e-43af-af42-82cc69fc76eb', '288ccad4-916e-43af-af42-82cc69fc76eb', '2021-06-06 15:42:42', 'Login', '::1', 'Chrome', 'Linux', 'Indonesia', 'superakses'),
(19, '288ccad4-916e-43af-af42-82cc69fc76eb', '288ccad4-916e-43af-af42-82cc69fc76eb', '2021-06-06 16:30:30', 'Login', '::1', 'Chrome', 'Linux', 'Indonesia', 'superakses'),
(20, '288ccad4-916e-43af-af42-82cc69fc76eb', '288ccad4-916e-43af-af42-82cc69fc76eb', '2021-06-07 16:29:26', 'Login', '::1', 'Chrome', 'Linux', 'Indonesia', 'superakses');

-- --------------------------------------------------------

--
-- Table structure for table `maintenance`
--

CREATE TABLE `maintenance` (
  `idmaintenance` varchar(225) NOT NULL,
  `idcompany` varchar(225) NOT NULL,
  `idsticker` varchar(225) NOT NULL,
  `idcategory` varchar(225) NOT NULL,
  `idcontacts` varchar(225) NOT NULL,
  `datefrom` varchar(20) NOT NULL,
  `dateto` varchar(20) NOT NULL,
  `latitude` varchar(100) NOT NULL,
  `longitude` varchar(100) NOT NULL,
  `checkinrange` int NOT NULL,
  `question` text NOT NULL,
  `answer` text NOT NULL,
  `maintenance_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id_payment` int NOT NULL,
  `customer` varchar(50) NOT NULL,
  `reference` varchar(50) NOT NULL,
  `invoice no` int NOT NULL,
  `payment_date` date NOT NULL,
  `deposit` varchar(50) NOT NULL,
  `memo` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `payment_option`
--

CREATE TABLE `payment_option` (
  `id_payment_option` int NOT NULL,
  `id_payment` int NOT NULL,
  `account` enum('400 - Sales','460 - Interest Income','470 - Other Revenue','475 - Purchase Discount') NOT NULL,
  `description` varchar(255) NOT NULL,
  `qty` int NOT NULL,
  `unit_price` int NOT NULL,
  `discount` int NOT NULL,
  `tax` int NOT NULL,
  `tax_amount` int NOT NULL,
  `amount` int NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pay_calendar_emp`
--

CREATE TABLE `pay_calendar_emp` (
  `id` varchar(225) COLLATE utf8mb4_general_ci NOT NULL,
  `idcompany` varchar(225) COLLATE utf8mb4_general_ci NOT NULL,
  `mainid` varchar(225) COLLATE utf8mb4_general_ci NOT NULL,
  `salary` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `total_allowance` text COLLATE utf8mb4_general_ci NOT NULL,
  `total_deduction` text COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pay_calendar_emp`
--

INSERT INTO `pay_calendar_emp` (`id`, `idcompany`, `mainid`, `salary`, `total_allowance`, `total_deduction`) VALUES
('fb631049-db54-4ba1-bd17-42234f042168', '288ccad4-916e-43af-af42-82cc69fc76eb', '716cd6a3a75d495da6840ef5f63f3ef4', 'Rp 3,000,000.00', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `port`
--

CREATE TABLE `port` (
  `port_id` varchar(255) NOT NULL,
  `idcompany` varchar(255) NOT NULL,
  `port` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `created` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product_h_equipment`
--

CREATE TABLE `product_h_equipment` (
  `idhequipment` varchar(225) NOT NULL,
  `idcompany` varchar(225) NOT NULL,
  `description` varchar(225) NOT NULL,
  `type` varchar(225) NOT NULL,
  `brand` varchar(225) NOT NULL,
  `reg_date` varchar(20) NOT NULL,
  `operator` varchar(225) NOT NULL,
  `chassis_no` varchar(50) NOT NULL,
  `machine_no` varchar(50) NOT NULL,
  `status` enum('Active','Repair') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_h_equipment`
--

INSERT INTO `product_h_equipment` (`idhequipment`, `idcompany`, `description`, `type`, `brand`, `reg_date`, `operator`, `chassis_no`, `machine_no`, `status`) VALUES
('6108fa4c-615e-421f-8fc4-7eef645778bc', '288ccad4-916e-43af-af42-82cc69fc76eb', 'Beco', '528a927a-da24-4d3c-9531-c469c1721b2b', 'e2a808be-396b-4123-a062-d37158a63eb1', '19/05/2021', '', '2434135', '324123', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `product_h_equipment_service`
--

CREATE TABLE `product_h_equipment_service` (
  `idservice` varchar(225) NOT NULL,
  `idhequipment` varchar(225) NOT NULL,
  `idcompany` varchar(225) NOT NULL,
  `service_date` varchar(20) NOT NULL,
  `service_type` enum('Service','Repair') NOT NULL,
  `description` text NOT NULL,
  `mechanic_note` text,
  `status` enum('Active','Request','Repair') NOT NULL DEFAULT 'Active',
  `isDone` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product_h_equipment_service_actions`
--

CREATE TABLE `product_h_equipment_service_actions` (
  `idaction` varchar(225) NOT NULL,
  `idservice` varchar(225) NOT NULL,
  `idcompany` varchar(225) NOT NULL,
  `action` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product_setting_brand`
--

CREATE TABLE `product_setting_brand` (
  `idbrand` varchar(225) NOT NULL,
  `idcompany` varchar(225) NOT NULL,
  `brand_name` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_setting_brand`
--

INSERT INTO `product_setting_brand` (`idbrand`, `idcompany`, `brand_name`) VALUES
('e2a808be-396b-4123-a062-d37158a63eb1', '288ccad4-916e-43af-af42-82cc69fc76eb', 'Mantab');

-- --------------------------------------------------------

--
-- Table structure for table `product_setting_type`
--

CREATE TABLE `product_setting_type` (
  `idtype` varchar(225) NOT NULL,
  `idcompany` varchar(225) NOT NULL,
  `type_name` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_setting_type`
--

INSERT INTO `product_setting_type` (`idtype`, `idcompany`, `type_name`) VALUES
('528a927a-da24-4d3c-9531-c469c1721b2b', '288ccad4-916e-43af-af42-82cc69fc76eb', 'Besar');

-- --------------------------------------------------------

--
-- Table structure for table `product_setting_unit`
--

CREATE TABLE `product_setting_unit` (
  `idunit` varchar(225) NOT NULL,
  `idcompany` varchar(225) NOT NULL,
  `unit_name` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_setting_unit`
--

INSERT INTO `product_setting_unit` (`idunit`, `idcompany`, `unit_name`) VALUES
('4135d9c3-d886-4f94-b7a4-a7506b9a85d5', '288ccad4-916e-43af-af42-82cc69fc76eb', 'Buah');

-- --------------------------------------------------------

--
-- Table structure for table `product_sparepart`
--

CREATE TABLE `product_sparepart` (
  `idsparepart` varchar(225) NOT NULL,
  `idcompany` varchar(225) NOT NULL,
  `name` varchar(225) NOT NULL,
  `code` varchar(20) NOT NULL,
  `type` varchar(225) NOT NULL,
  `brand` varchar(225) NOT NULL,
  `reg_date` varchar(20) NOT NULL,
  `unit` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_sparepart`
--

INSERT INTO `product_sparepart` (`idsparepart`, `idcompany`, `name`, `code`, `type`, `brand`, `reg_date`, `unit`) VALUES
('900445f7-8fee-4707-993a-1bfb9f4850ba', '288ccad4-916e-43af-af42-82cc69fc76eb', 'Ban Dalam', 'BD001', '528a927a-da24-4d3c-9531-c469c1721b2b', 'e2a808be-396b-4123-a062-d37158a63eb1', '19/05/2021', '4135d9c3-d886-4f94-b7a4-a7506b9a85d5');

-- --------------------------------------------------------

--
-- Table structure for table `product_truck`
--

CREATE TABLE `product_truck` (
  `idtruck` varchar(225) NOT NULL,
  `idcompany` varchar(225) NOT NULL,
  `name` varchar(225) NOT NULL,
  `plat_no` varchar(20) NOT NULL,
  `type` varchar(225) NOT NULL,
  `brand` varchar(225) NOT NULL,
  `reg_date` varchar(20) NOT NULL,
  `driver` varchar(225) NOT NULL,
  `chassis_no` varchar(50) NOT NULL,
  `machine_no` varchar(50) NOT NULL,
  `status` enum('Active','Repair') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_truck`
--

INSERT INTO `product_truck` (`idtruck`, `idcompany`, `name`, `plat_no`, `type`, `brand`, `reg_date`, `driver`, `chassis_no`, `machine_no`, `status`) VALUES
('6680e98c-fc3e-43cb-818c-6f968b0e3ab0', '288ccad4-916e-43af-af42-82cc69fc76eb', 'Truck ku', 'BK 8837 NU', '528a927a-da24-4d3c-9531-c469c1721b2b', 'e2a808be-396b-4123-a062-d37158a63eb1', '19/05/2021', '', '79872491', '87624981', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `product_truck_service`
--

CREATE TABLE `product_truck_service` (
  `idservice` varchar(225) NOT NULL,
  `idtruck` varchar(225) NOT NULL,
  `idcompany` varchar(225) NOT NULL,
  `service_date` varchar(255) NOT NULL,
  `service_type` enum('Service','Repair') NOT NULL,
  `driver_note` text NOT NULL,
  `mechanic_note` text,
  `status` enum('Active','Request','Repair') NOT NULL DEFAULT 'Active',
  `isDone` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_truck_service`
--

INSERT INTO `product_truck_service` (`idservice`, `idtruck`, `idcompany`, `service_date`, `service_type`, `driver_note`, `mechanic_note`, `status`, `isDone`) VALUES
('ee99d6cd-2761-4aaa-a76f-797d3053cac1', '', '288ccad4-916e-43af-af42-82cc69fc76eb', '27/05/2021', 'Service', 'asdas', NULL, 'Active', 0);

-- --------------------------------------------------------

--
-- Table structure for table `product_truck_service_actions`
--

CREATE TABLE `product_truck_service_actions` (
  `idaction` varchar(225) NOT NULL,
  `idservice` varchar(225) NOT NULL,
  `idcompany` varchar(225) NOT NULL,
  `action` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int NOT NULL,
  `code` varchar(15) NOT NULL,
  `name` varchar(50) NOT NULL,
  `type_id` int NOT NULL,
  `customer_id` mediumint UNSIGNED DEFAULT NULL,
  `address` varchar(100) NOT NULL,
  `province_id` char(2) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `regency_id` char(4) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `district_id` char(7) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `village_id` char(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `lat` decimal(18,15) NOT NULL,
  `lng` decimal(18,15) NOT NULL,
  `checkin_range` int UNSIGNED NOT NULL,
  `level` varchar(20) NOT NULL,
  `project_date` date NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `project_tasks`
--

CREATE TABLE `project_tasks` (
  `id` varchar(30) NOT NULL,
  `project_id` int NOT NULL,
  `level` int UNSIGNED NOT NULL,
  `order` int UNSIGNED NOT NULL,
  `parent_id` varchar(30) DEFAULT NULL,
  `type` varchar(1) NOT NULL,
  `title` varchar(50) NOT NULL,
  `offered_value` decimal(10,2) DEFAULT NULL,
  `offered_unit` varchar(10) DEFAULT NULL,
  `offered_price` decimal(15,2) DEFAULT '0.00',
  `start` date DEFAULT NULL,
  `end` date DEFAULT NULL,
  `progress` int UNSIGNED NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `project_task_logs`
--

CREATE TABLE `project_task_logs` (
  `id` varchar(30) NOT NULL,
  `task_id` varchar(30) NOT NULL,
  `value` decimal(10,2) UNSIGNED NOT NULL DEFAULT '0.00',
  `date_from` datetime NOT NULL,
  `date_to` date NOT NULL,
  `condition` varchar(20) NOT NULL DEFAULT 'Bagus',
  `remarks` varchar(100) NOT NULL,
  `image` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `project_types`
--

CREATE TABLE `project_types` (
  `idtypes` varchar(255) NOT NULL,
  `idcompany` varchar(225) NOT NULL,
  `types` varchar(225) NOT NULL,
  `color` varchar(225) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `provinces`
--

CREATE TABLE `provinces` (
  `id` char(2) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `quotation`
--

CREATE TABLE `quotation` (
  `id_quotation` varchar(225) NOT NULL,
  `idcompany` varchar(225) NOT NULL,
  `quote_number` varchar(100) NOT NULL,
  `quote_date` varchar(30) DEFAULT NULL,
  `shipping_from` varchar(100) NOT NULL,
  `destination` varchar(225) NOT NULL,
  `customer` varchar(225) DEFAULT NULL,
  `subject` text,
  `expires_date` varchar(30) DEFAULT NULL,
  `term_op` varchar(20) DEFAULT NULL,
  `desk_header` text,
  `desk_footer` text,
  `status` enum('In Progress','Executed') NOT NULL,
  `creator` varchar(30) DEFAULT NULL,
  `quotationcreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rate_quote`
--

CREATE TABLE `rate_quote` (
  `id_rate_quote` varchar(225) NOT NULL,
  `id_quotation` varchar(225) NOT NULL,
  `item_cost` varchar(100) NOT NULL,
  `unit` varchar(20) NOT NULL,
  `qty` varchar(15) NOT NULL,
  `price` float DEFAULT NULL,
  `amount_idr` float DEFAULT NULL,
  `amount_usd` float DEFAULT NULL,
  `note` text,
  `ratecreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `regencies`
--

CREATE TABLE `regencies` (
  `id_regency` char(4) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `province_id` char(2) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name_regency` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `regis_api`
--

CREATE TABLE `regis_api` (
  `username` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `idcompany` varchar(225) NOT NULL,
  `name` varchar(225) NOT NULL,
  `nohp` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `created_at` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` varchar(225) NOT NULL,
  `idcompany` varchar(225) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `root`
--

CREATE TABLE `root` (
  `idroot` varchar(225) NOT NULL,
  `nama` text NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `ip` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `root`
--

INSERT INTO `root` (`idroot`, `nama`, `username`, `password`, `ip`) VALUES
('qwerty123', 'superadmin', 'root', '$2y$10$cIX1wB0qiqPTqaY2zRgf9.jLFLSwB.9PBiIgidxevx4R6AnAQ/.UK', '::1');

-- --------------------------------------------------------

--
-- Table structure for table `service_h_equipment`
--

CREATE TABLE `service_h_equipment` (
  `idshequipment` varchar(225) NOT NULL,
  `idcompany` varchar(225) NOT NULL,
  `h_equipment` varchar(225) NOT NULL,
  `date` varchar(20) NOT NULL,
  `operator` varchar(225) NOT NULL,
  `brand` varchar(225) NOT NULL,
  `type` varchar(225) NOT NULL,
  `work_start` varchar(20) NOT NULL,
  `work_end` varchar(20) NOT NULL,
  `total_hour` varchar(10) NOT NULL,
  `price_per_hour` varchar(20) NOT NULL,
  `total_price` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `service_mining`
--

CREATE TABLE `service_mining` (
  `idmining` varchar(225) NOT NULL,
  `idcompany` varchar(225) NOT NULL,
  `client` varchar(225) NOT NULL,
  `delivery_no` varchar(225) NOT NULL,
  `plat_no` varchar(225) NOT NULL,
  `delivery_date` varchar(20) NOT NULL,
  `working_hour` varchar(20) NOT NULL,
  `est_tonage` varchar(20) NOT NULL,
  `exact_tonage` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `service_price`
--

CREATE TABLE `service_price` (
  `idprice` varchar(225) NOT NULL,
  `idcompany` varchar(225) NOT NULL,
  `brand` varchar(225) NOT NULL,
  `type` varchar(225) NOT NULL,
  `price` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sticker`
--

CREATE TABLE `sticker` (
  `idsticker` varchar(225) NOT NULL,
  `idcompany` varchar(225) NOT NULL,
  `sticker` text NOT NULL,
  `stickercreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `superakses`
--

CREATE TABLE `superakses` (
  `iduser` varchar(225) NOT NULL,
  `idcompany` varchar(225) NOT NULL,
  `name` text NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `ip` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `superakses`
--

INSERT INTO `superakses` (`iduser`, `idcompany`, `name`, `username`, `password`, `ip`) VALUES
('288ccad4-916e-43af-af42-82cc69fc76eb', '288ccad4-916e-43af-af42-82cc69fc76eb', 'Administrator', 'demo', '$2y$10$m7PLanCYewGSiHr8YUUcZeRW1m3PwnELvYAm1Y2CL161lYVrPVP1W', '::1');

-- --------------------------------------------------------

--
-- Table structure for table `timeline`
--

CREATE TABLE `timeline` (
  `idtimeline` varchar(225) NOT NULL,
  `mainid` varchar(225) NOT NULL,
  `sticker` text,
  `pesan` text,
  `photo` text,
  `timeline_created` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `vendors`
--

CREATE TABLE `vendors` (
  `idvendors` varchar(225) NOT NULL,
  `idcompany` varchar(225) NOT NULL,
  `vendor_first_name` text,
  `vendor_last_name` text,
  `vendor_email` text,
  `vendor_phone` text,
  `vendor_job_title` text,
  `vendor_company` text,
  `vendor_address` text,
  `vendor_city` text,
  `vendor_state` text,
  `vendor_zip` text,
  `vendor_joined` text,
  `vendor_photo` text,
  `vendor_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `villages`
--

CREATE TABLE `villages` (
  `id_village` char(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `district_id` char(7) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name_village` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `worker`
--

CREATE TABLE `worker` (
  `idworker` varchar(225) NOT NULL,
  `idcompany` varchar(225) NOT NULL,
  `nama` varchar(225) NOT NULL,
  `type` text NOT NULL,
  `level` text NOT NULL,
  `wage` int NOT NULL,
  `created_at` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `worker_allproject`
--

CREATE TABLE `worker_allproject` (
  `idallproject` varchar(225) NOT NULL,
  `idcompany` varchar(225) NOT NULL,
  `allprojectname` varchar(225) NOT NULL,
  `allprojectpic` text NOT NULL,
  `allprojectregion` text NOT NULL,
  `allprojectcostumer` text NOT NULL,
  `created_at` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `worker_subtypes`
--

CREATE TABLE `worker_subtypes` (
  `idsubtypes` varchar(225) NOT NULL,
  `idcompany` varchar(225) NOT NULL,
  `name` varchar(225) NOT NULL,
  `created_at` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `worker_types`
--

CREATE TABLE `worker_types` (
  `idworker` varchar(225) NOT NULL,
  `idcompany` varchar(225) NOT NULL,
  `workername` varchar(225) NOT NULL,
  `created_at` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acc_asset`
--
ALTER TABLE `acc_asset`
  ADD PRIMARY KEY (`id_asset`),
  ADD KEY `code` (`code_asset`);

--
-- Indexes for table `acc_default_coa`
--
ALTER TABLE `acc_default_coa`
  ADD PRIMARY KEY (`id_adc`);

--
-- Indexes for table `acc_equity`
--
ALTER TABLE `acc_equity`
  ADD PRIMARY KEY (`id_equity`),
  ADD KEY `code` (`code`);

--
-- Indexes for table `acc_expenses`
--
ALTER TABLE `acc_expenses`
  ADD PRIMARY KEY (`id_expenses`),
  ADD KEY `code` (`code`);

--
-- Indexes for table `acc_income`
--
ALTER TABLE `acc_income`
  ADD PRIMARY KEY (`id_income`),
  ADD KEY `code` (`code`);

--
-- Indexes for table `acc_liabilities`
--
ALTER TABLE `acc_liabilities`
  ADD PRIMARY KEY (`id_liabilities`),
  ADD KEY `code` (`code`);

--
-- Indexes for table `address_company`
--
ALTER TABLE `address_company`
  ADD PRIMARY KEY (`idaddcompany`);

--
-- Indexes for table `address_contacts`
--
ALTER TABLE `address_contacts`
  ADD PRIMARY KEY (`idaddr`);

--
-- Indexes for table `add_itemcost`
--
ALTER TABLE `add_itemcost`
  ADD PRIMARY KEY (`iditem`);

--
-- Indexes for table `add_project`
--
ALTER TABLE `add_project`
  ADD PRIMARY KEY (`code`);

--
-- Indexes for table `add_unit`
--
ALTER TABLE `add_unit`
  ADD PRIMARY KEY (`idunit`);

--
-- Indexes for table `airlines`
--
ALTER TABLE `airlines`
  ADD PRIMARY KEY (`id_airlines`),
  ADD KEY `idcompany` (`idcompany`);

--
-- Indexes for table `announcement`
--
ALTER TABLE `announcement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `annsendto`
--
ALTER TABLE `annsendto`
  ADD PRIMARY KEY (`idannsendto`);

--
-- Indexes for table `branch_office`
--
ALTER TABLE `branch_office`
  ADD PRIMARY KEY (`branch_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`idcategory`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`idcompany`);

--
-- Indexes for table `consignee`
--
ALTER TABLE `consignee`
  ADD PRIMARY KEY (`id_consignee`),
  ADD KEY `idcompany` (`idcompany`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`idcontacts`);

--
-- Indexes for table `cost`
--
ALTER TABLE `cost`
  ADD PRIMARY KEY (`cost_id`),
  ADD KEY `idcompany` (`idcompany`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`iddepartment`);

--
-- Indexes for table `designation`
--
ALTER TABLE `designation`
  ADD PRIMARY KEY (`iddesignation`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`mainid`);

--
-- Indexes for table `employee_access`
--
ALTER TABLE `employee_access`
  ADD PRIMARY KEY (`idaccess`);

--
-- Indexes for table `estimation_cost`
--
ALTER TABLE `estimation_cost`
  ADD PRIMARY KEY (`id_estimation`);

--
-- Indexes for table `holidays`
--
ALTER TABLE `holidays`
  ADD PRIMARY KEY (`idholidays`);

--
-- Indexes for table `hrm_setting_gracetime`
--
ALTER TABLE `hrm_setting_gracetime`
  ADD PRIMARY KEY (`idgracetime`);

--
-- Indexes for table `hrm_setting_machine`
--
ALTER TABLE `hrm_setting_machine`
  ADD PRIMARY KEY (`idmachine`);

--
-- Indexes for table `hrm_setting_shift`
--
ALTER TABLE `hrm_setting_shift`
  ADD PRIMARY KEY (`idshift`);

--
-- Indexes for table `hrm_setting_trip`
--
ALTER TABLE `hrm_setting_trip`
  ADD PRIMARY KEY (`idtrip`);

--
-- Indexes for table `hrm_setting_workdays`
--
ALTER TABLE `hrm_setting_workdays`
  ADD PRIMARY KEY (`idwork`);

--
-- Indexes for table `job_order`
--
ALTER TABLE `job_order`
  ADD PRIMARY KEY (`id_job_order`);

--
-- Indexes for table `jo_data`
--
ALTER TABLE `jo_data`
  ADD PRIMARY KEY (`id_jo_data`);

--
-- Indexes for table `jo_data_air`
--
ALTER TABLE `jo_data_air`
  ADD PRIMARY KEY (`id_data_air`);

--
-- Indexes for table `jo_data_container`
--
ALTER TABLE `jo_data_container`
  ADD PRIMARY KEY (`id_data_container`);

--
-- Indexes for table `jo_data_pieces`
--
ALTER TABLE `jo_data_pieces`
  ADD PRIMARY KEY (`id_data_pieces`);

--
-- Indexes for table `jo_data_sea`
--
ALTER TABLE `jo_data_sea`
  ADD PRIMARY KEY (`id_data_sea`);

--
-- Indexes for table `jo_data_status`
--
ALTER TABLE `jo_data_status`
  ADD PRIMARY KEY (`id_data_status`);

--
-- Indexes for table `leavereq`
--
ALTER TABLE `leavereq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `log_karyawan`
--
ALTER TABLE `log_karyawan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `log_user`
--
ALTER TABLE `log_user`
  ADD PRIMARY KEY (`id_log`);

--
-- Indexes for table `maintenance`
--
ALTER TABLE `maintenance`
  ADD PRIMARY KEY (`idmaintenance`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id_payment`);

--
-- Indexes for table `pay_calendar_emp`
--
ALTER TABLE `pay_calendar_emp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `port`
--
ALTER TABLE `port`
  ADD PRIMARY KEY (`port_id`),
  ADD KEY `idcompany` (`idcompany`);

--
-- Indexes for table `product_h_equipment`
--
ALTER TABLE `product_h_equipment`
  ADD PRIMARY KEY (`idhequipment`);

--
-- Indexes for table `product_h_equipment_service`
--
ALTER TABLE `product_h_equipment_service`
  ADD PRIMARY KEY (`idservice`);

--
-- Indexes for table `product_h_equipment_service_actions`
--
ALTER TABLE `product_h_equipment_service_actions`
  ADD PRIMARY KEY (`idaction`);

--
-- Indexes for table `product_setting_brand`
--
ALTER TABLE `product_setting_brand`
  ADD PRIMARY KEY (`idbrand`);

--
-- Indexes for table `product_setting_type`
--
ALTER TABLE `product_setting_type`
  ADD PRIMARY KEY (`idtype`);

--
-- Indexes for table `product_setting_unit`
--
ALTER TABLE `product_setting_unit`
  ADD PRIMARY KEY (`idunit`);

--
-- Indexes for table `product_sparepart`
--
ALTER TABLE `product_sparepart`
  ADD PRIMARY KEY (`idsparepart`);

--
-- Indexes for table `product_truck`
--
ALTER TABLE `product_truck`
  ADD PRIMARY KEY (`idtruck`);

--
-- Indexes for table `product_truck_service`
--
ALTER TABLE `product_truck_service`
  ADD PRIMARY KEY (`idservice`);

--
-- Indexes for table `product_truck_service_actions`
--
ALTER TABLE `product_truck_service_actions`
  ADD PRIMARY KEY (`idaction`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_types`
--
ALTER TABLE `project_types`
  ADD PRIMARY KEY (`idtypes`);

--
-- Indexes for table `quotation`
--
ALTER TABLE `quotation`
  ADD PRIMARY KEY (`id_quotation`);

--
-- Indexes for table `rate_quote`
--
ALTER TABLE `rate_quote`
  ADD PRIMARY KEY (`id_rate_quote`);

--
-- Indexes for table `regis_api`
--
ALTER TABLE `regis_api`
  ADD PRIMARY KEY (`idcompany`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `root`
--
ALTER TABLE `root`
  ADD PRIMARY KEY (`idroot`);

--
-- Indexes for table `service_h_equipment`
--
ALTER TABLE `service_h_equipment`
  ADD PRIMARY KEY (`idshequipment`);

--
-- Indexes for table `service_mining`
--
ALTER TABLE `service_mining`
  ADD PRIMARY KEY (`idmining`);

--
-- Indexes for table `service_price`
--
ALTER TABLE `service_price`
  ADD PRIMARY KEY (`idprice`);

--
-- Indexes for table `sticker`
--
ALTER TABLE `sticker`
  ADD PRIMARY KEY (`idsticker`);

--
-- Indexes for table `superakses`
--
ALTER TABLE `superakses`
  ADD PRIMARY KEY (`iduser`);

--
-- Indexes for table `timeline`
--
ALTER TABLE `timeline`
  ADD PRIMARY KEY (`idtimeline`);

--
-- Indexes for table `vendors`
--
ALTER TABLE `vendors`
  ADD PRIMARY KEY (`idvendors`);

--
-- Indexes for table `worker`
--
ALTER TABLE `worker`
  ADD PRIMARY KEY (`idworker`);

--
-- Indexes for table `worker_allproject`
--
ALTER TABLE `worker_allproject`
  ADD PRIMARY KEY (`idallproject`);

--
-- Indexes for table `worker_subtypes`
--
ALTER TABLE `worker_subtypes`
  ADD PRIMARY KEY (`idsubtypes`);

--
-- Indexes for table `worker_types`
--
ALTER TABLE `worker_types`
  ADD PRIMARY KEY (`idworker`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `acc_equity`
--
ALTER TABLE `acc_equity`
  MODIFY `id_equity` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `acc_expenses`
--
ALTER TABLE `acc_expenses`
  MODIFY `id_expenses` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `acc_income`
--
ALTER TABLE `acc_income`
  MODIFY `id_income` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `acc_liabilities`
--
ALTER TABLE `acc_liabilities`
  MODIFY `id_liabilities` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `address_company`
--
ALTER TABLE `address_company`
  MODIFY `idaddcompany` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `address_contacts`
--
ALTER TABLE `address_contacts`
  MODIFY `idaddr` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `announcement`
--
ALTER TABLE `announcement`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `annsendto`
--
ALTER TABLE `annsendto`
  MODIFY `idannsendto` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `leavereq`
--
ALTER TABLE `leavereq`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `log_karyawan`
--
ALTER TABLE `log_karyawan`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `log_user`
--
ALTER TABLE `log_user`
  MODIFY `id_log` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id_payment` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
