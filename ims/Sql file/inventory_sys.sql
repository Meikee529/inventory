-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 12, 2019 at 03:52 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventory_sys`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `adminid` varchar(200) NOT NULL,
  `UserName` varchar(100) NOT NULL,
  `firstname` varchar(200) NOT NULL,
  `lastname` varchar(200) NOT NULL,
  `emailid` varchar(200) NOT NULL,
  `department` varchar(200) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `updationDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `adminid`, `UserName`, `firstname`, `lastname`, `emailid`, `department`, `Password`, `updationDate`) VALUES
(1, 'A001', 'Edmund Yuen', 'Edmund', 'Yuen', 'miss1000words@gmail.com', 'All', '202cb962ac59075b964b07152d234b70', '2018-09-06 11:19:51'),
(2, 'A002', 'Law Theng Theng', 'Theng Theng', 'Law', 'shareen1998@hotmail.com', 'Human Resource', '202cb962ac59075b964b07152d234b70', '2018-09-06 11:19:57'),
(3, 'A003', 'ideal', 'ideal', 'vision', 'idealvisioncom@gmail.com', 'Human Resource', '202cb962ac59075b964b07152d234b70', '0000-00-00 00:00:00'),
(4, 'A004', 'vision', 'ideall', 'visionn', 'shareenloh98@hotmail.com', 'Information Technology', '202cb962ac59075b964b07152d234b70', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`) VALUES
(1, 'IPC'),
(2, 'Controller'),
(3, 'Camera'),
(4, 'Lens'),
(5, 'Lighting'),
(6, 'Electronics'),
(7, 'Cable'),
(8, 'Others');

-- --------------------------------------------------------

--
-- Table structure for table `chairperson`
--

CREATE TABLE `chairperson` (
  `c_id` int(11) NOT NULL,
  `c_name` varchar(255) NOT NULL,
  `c_email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chairperson`
--

INSERT INTO `chairperson` (`c_id`, `c_name`, `c_email`) VALUES
(1, 'Ling Chui Sian', 'kahhinchiah123@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cust_id` int(11) NOT NULL,
  `cust_name` varchar(200) NOT NULL,
  `cust_pic` varchar(200) NOT NULL,
  `cust_contact` varchar(200) NOT NULL,
  `cust_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cust_id`, `cust_name`, `cust_pic`, `cust_contact`, `cust_status`) VALUES
(1, 'Osram', 'John', '019827123', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cust_r`
--

CREATE TABLE `cust_r` (
  `cus_id` int(11) NOT NULL,
  `cus_name` varchar(200) NOT NULL,
  `cus_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cust_r`
--

INSERT INTO `cust_r` (`cus_id`, `cus_name`, `cus_status`) VALUES
(1, 'Osram', 1);

-- --------------------------------------------------------

--
-- Table structure for table `loan`
--

CREATE TABLE `loan` (
  `l_id` int(11) NOT NULL,
  `part_num` varchar(200) NOT NULL,
  `l_serialno` varchar(200) NOT NULL,
  `onloan_date` date NOT NULL,
  `target_date` date NOT NULL,
  `part_des` varchar(200) NOT NULL,
  `part_sup` varchar(200) NOT NULL,
  `l_status` int(11) NOT NULL,
  `IsRead` int(11) NOT NULL,
  `empid` int(11) NOT NULL,
  `l_user` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loan`
--

INSERT INTO `loan` (`l_id`, `part_num`, `l_serialno`, `onloan_date`, `target_date`, `part_des`, `part_sup`, `l_status`, `IsRead`, `empid`, `l_user`) VALUES
(1, 'FLDR-Si32A-R24', 'D01-016', '2018-11-29', '2018-11-29', 'OL Ref : OL18112901', 'Falcon', 1, 1, 0, ''),
(2, 'HF50HA-1B', '-', '2018-11-26', '2018-11-29', 'Loan Ref : PG_L_000214', 'Advance Ultravision Sdn. Bhd.', 1, 1, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `log_id` int(11) NOT NULL,
  `log_actionname` varchar(200) NOT NULL,
  `log_username` varchar(200) NOT NULL,
  `action` int(11) NOT NULL,
  `log_date` datetime NOT NULL,
  `log_sup` varchar(200) NOT NULL,
  `log_cus` varchar(200) NOT NULL,
  `log_pro` varchar(200) NOT NULL,
  `log_par` varchar(200) NOT NULL,
  `log_ser` varchar(200) NOT NULL,
  `log_sam` varchar(200) NOT NULL,
  `log_company` varchar(200) NOT NULL,
  `log_proname` varchar(200) NOT NULL,
  `log_do` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`log_id`, `log_actionname`, `log_username`, `action`, `log_date`, `log_sup`, `log_cus`, `log_pro`, `log_par`, `log_ser`, `log_sam`, `log_company`, `log_proname`, `log_do`) VALUES
(1, 'Have Stocked In', 'Renothouni -', 1, '2018-11-07 10:11:12', '', '', '', 'Part Number: HALCON DONGLE', 'Serial Number: 9-5419F572', '', '', 'Project Name: ', 'Supplier Delivery Order No.: '),
(2, 'Have Stocked In', 'Renothouni -', 1, '2018-11-07 10:11:12', '', '', '', 'Part Number: HALCON DONGLE', 'Serial Number: 9-012C4D5F', '', '', 'Project Name: ', 'Supplier Delivery Order No.: '),
(3, 'Have Stocked Out', 'Renothouni -', 1, '2018-11-07 10:13:47', '', '', '', 'Part Number: HALCON DONGLE', 'Serial Number: 9-012C4D5F', '', '', 'Project Name: ', 'Supplier Delivery Order No.: '),
(4, 'Have Stocked Out', 'Renothouni -', 1, '2018-11-07 10:14:10', '', '', '', 'Part Number: HALCON DONGLE', 'Serial Number: 9-5419F572', '', '', 'Project Name: ', 'Supplier Delivery Order No.: '),
(5, 'Updated The On Loan Hardware Details', 'Bernard Phuah', 2, '2018-12-26 11:03:10', '', '', '', 'Part Number: FLDR-Si32A-R24', 'Serial Number: D01-016', '', '', '', ''),
(6, 'Updated The On Loan Hardware Details', 'Bernard Phuah', 2, '2018-12-26 11:03:48', '', '', '', 'Part Number: FLDR-Si32A-R24', 'Serial Number: D01-016', '', '', '', ''),
(7, 'Updated The On Loan Hardware Details', 'Bernard Phuah', 2, '2018-12-26 11:04:19', '', '', '', 'Part Number: FLDR-Si32A-R24', 'Serial Number: D01-016', '', '', '', ''),
(8, 'Updated The On Loan Hardware Details', 'Bernard Phuah', 2, '2018-12-26 11:04:50', '', '', '', 'Part Number: FLDR-Si32A-R24', 'Serial Number: D01-016', '', '', '', ''),
(9, 'Updated The On Loan Hardware Details', 'Bernard Phuah', 2, '2018-12-26 11:05:11', '', '', '', 'Part Number: FLDR-Si32A-R24', 'Serial Number: D01-016', '', '', '', ''),
(10, 'Updated The On Loan Hardware Details', 'Bernard Phuah', 2, '2018-12-26 11:05:38', '', '', '', 'Part Number: FLDR-Si32A-R24', 'Serial Number: D01-016', '', '', '', ''),
(11, 'Added New Sample', 'Bernard Phuah', 1, '2018-12-26 16:53:20', '', '', '', '', '', 'Sample Name: y', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `part`
--

CREATE TABLE `part` (
  `pa_id` int(11) NOT NULL,
  `pa_num` varchar(200) NOT NULL,
  `pa_des` varchar(200) NOT NULL,
  `pa_supname` varchar(200) NOT NULL,
  `pa_pic` varchar(200) NOT NULL,
  `pa_category` varchar(200) NOT NULL,
  `pa_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `part`
--

INSERT INTO `part` (`pa_id`, `pa_num`, `pa_des`, `pa_supname`, `pa_pic`, `pa_category`, `pa_status`) VALUES
(1, '216V6L', 'LCD Monitor', '', '', 'IPC', 1),
(2, 'IPC-510MB-00XBE', 'Advantech PC', '', '', 'IPC', 1),
(3, 'LIC-4256N', 'Falcon LIC Controller and Come with 2 LIC Cable & 1 Power Cable', '', '', 'Controller', 1),
(4, 'PSD-4256', 'Falcon LIC Controller', '', '', 'Controller', 1),
(5, 'VS-CAB-USB3XV[3]', 'USB 3.0 WIRE', '', '', 'Others', 1),
(6, 'FLDR-Si68LA1-W', 'Lighting', '', '', 'Lighting', 1),
(7, 'FLFV-Si35N-W', 'Lighting', '', '', 'Lighting', 1),
(8, 'FLFV-Si20N-W', 'Lighting', '', '', 'Lighting', 1),
(9, 'FFPR-Si32-W', 'Lighting', '', '', 'Lighting', 1),
(10, 'FFPR-Si32-B', 'Lighting', '', '', 'Lighting', 1),
(11, 'FFPR-Si37-W', 'Lighting', '', '', 'Lighting', 1),
(12, 'U3X4-PCIE4XE101', 'USB 4 Port Card', '', '', 'IPC', 1),
(13, 'MIC-75M40-00A1E', 'Advantech CPU', '', '', 'IPC', 1),
(14, 'VS-MC1-80', 'Lens', '', '', 'Lens', 1),
(15, 'VS-TEC0513', 'Lens', '', '', 'Lens', 1),
(16, 'PCIE-1756-AE', '64-ch Isolated Digital I/O PCI Express Card', '', '', 'IPC', 1),
(17, 'ADAM-3951-BE', 'Screw-Terminal Board with LED Indicator', '', '', 'Others', 1),
(18, 'PCL-10250-1E', 'Shielded Cable', '', '', 'Cable', 1),
(19, 'V2505MCFBU', 'CMOS Color Camera', '', '', 'Camera', 1),
(20, 'VS-CAB-USB3XV[4]', '-', '', '', 'Cable', 1),
(21, 'MIC-75M40-0A1E', '-', '', '', 'IPC', 1),
(22, 'LIC-CABLE1', '-', '', '', 'Cable', 1),
(23, 'LIC-PWRCABLE1', '2 WIRES TOOK FROM 2 OF THE NEW PC (SN: KMA3624340 & KMA3611539).ANOTHER ONE TOOK FROM TOPLED 2ND MC UNDER REPAIR  PC(SN: KMA3387192).', '', '', 'Cable', 1),
(24, 'I/OCard', '-', '', '', 'IPC', 1),
(25, 'HALCON DONGLE', '-', '', '', 'Others', 1),
(26, 'IPC-510MB-600X', '-', '', '', 'IPC', 1),
(27, 'PCA-350500-631', '-', '', '', 'Controller', 1),
(28, '35-03-30-000', '-', '', '', 'Lens', 1),
(29, '35-08-00-000', '-', '', '', 'Lens', 1),
(30, '35-00-03-000', '-', '', '', 'Lens', 1),
(31, '35-08-70-000', '-', '', '', 'Others', 1),
(32, '35-07-11-000', '-', '', '', 'Lens', 1),
(33, '35-05-99-000', '-', '', '', 'Others', 1),
(34, '35-31-60-000', '-', '', '', 'Others', 1),
(35, 'FHLV-Si27N2-W + FRB-i56', '-', '', '', 'Lighting', 1),
(36, 'FFPR-i50-W', '-', '', '', 'Lighting', 1),
(37, 'PP610', '-', 'GARDASOFT', '-', 'Controller', 1),
(38, 'VCC-12CLAR', '-', '', '', 'Camera', 1),
(39, 'VS-LTC2-70CO/FSN', '-', '', '', 'Lens', 1),
(40, 'C0057', '-', '', '', 'Lens', 1),
(41, 'FHLV-Si27N2-W + FRB-i56', '-', '', '', 'Lighting', 1),
(42, 'HV-KB329', '-', '', '', 'IPC', 1),
(43, 'T-BC21', '-', '', '', 'IPC', 1),
(44, 'MSIP-REM-EUR-PC1622', '-', '', '', 'IPC', 1),
(45, 'F800P', '-', '', '', 'IPC', 1),
(46, 'IPC510MB', '-', '', '', 'IPC', 1),
(47, '216V6', '-', '', '', 'IPC', 1),
(48, '5.0M KV9', '-', '', '', 'Cable', 1),
(49, 'V2-CAB-HR12', '-', '', '', 'Cable', 1),
(50, '810-000767', 'Mouse', '', '', 'IPC', 1),
(51, 'Camera Link Cable', 'Camera Link Cable', '', '', 'Cable', 1),
(52, 'K400 PLUS TV', 'Logitech Keyboard', '', '', 'IPC', 1),
(53, 'HPR2-150SW', 'Big Ring Light', '', '', 'Lighting', 1),
(54, 'FLDU-i250X200-W', 'Big Half Cylinder Light', '', '', 'Lighting', 1),
(55, 'FRB-i56', 'Internal Light', '', '', 'Lighting', 1),
(56, 'MSIP-REM-EUR-PC1633', 'USB card', '', '', 'IPC', 1),
(57, '1EU3X4-PCIE4XE101', 'USB 4 Port Card', '', '', 'IPC', 1),
(58, 'VCC-12CXP1R', '-', '', '', 'Camera', 1),
(59, 'VCC-12CL4R', '-', '', '', 'Camera', 1),
(60, 'V2-CAB-CXP-HF', 'Camera Cable', '', '', 'Cable', 1),
(61, 'V2-CAB-USB3XV[4]', 'USB 3.0 Wire', '', '', 'Cable', 1),
(62, 'V2-CAB-HR6[5]', '-', '', '', 'Cable', 1),
(63, '35-04-00-000', '-', '', '', 'Lens', 1),
(64, '301602', 'Adapter', '', '', 'Lens', 1),
(65, '28-21-05-001', 'Lens (OPTEM)', '', '', 'Lens', 1),
(66, '35-08-06-000', '1X 1200FL Lens', '', '', 'Lens', 1),
(67, '30-17-03-000', '-', '', '', 'Lens', 1),
(68, '30-16-01', 'Adapter', '', '', 'Lens', 1),
(69, 'C0058', 'Adapter', '', '', 'Lens', 1),
(70, 'FHLV-Si27N2-W', 'Falcon Lighting', '', '', 'Lighting', 1),
(71, 'FLDL-i56X15-W', 'Falcon Lighting', '', '', 'Lighting', 1),
(72, 'SG 13', '-', '', '', 'IPC', 1),
(73, 'M354ND', 'Monitor OTEKSYS', '', '', 'IPC', 1),
(74, 'FFPQ-Si50-W', 'Coaxial Light', '', '', 'Lighting', 1),
(75, 'PSA-1', '-', '', '', 'Controller', 1),
(76, 'X20-19608', 'XYREON PC', '', '', 'IPC', 1),
(77, 'FW-PCIE02', 'PCIE Single Bus Card', '', '', 'IPC', 1),
(78, 'Guppy F-033B ASG', '-', '', '', 'Camera', 1),
(79, 'HF5OHA-1B', '50mm Fujinon Lens', '', '', 'Lens', 1),
(80, 'K1200150 4.5M A DW0', '-', '', '', 'Cable', 1),
(81, 'FLDR-i50B-IR24', 'Ring Light', '', '', 'Lighting', 1),
(82, '6512', 'eVision/Open eVision USB', '', '', 'Others', 1),
(83, '223V5L', 'Philips LCD Monitor 21.5\'\' (54.6cm)', '', '', 'IPC', 1),
(84, 'FLDR-Si32A-R24', '-', 'FALCON', '-', 'Lighting', 1),
(85, 'HF50HA-1B', '-', '', '', 'Lens', 1),
(86, 'FLEXNET-ID-ALA-8626', '-', '', '', 'Others', 1);

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `project_id` int(11) NOT NULL,
  `project_name` varchar(200) NOT NULL,
  `p_des` varchar(200) NOT NULL,
  `cust_contact` varchar(200) NOT NULL,
  `p_cusname` varchar(200) NOT NULL,
  `cust_pic` varchar(200) NOT NULL,
  `p_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`project_id`, `project_name`, `p_des`, `cust_contact`, `p_cusname`, `cust_pic`, `p_status`) VALUES
(1, 'PRM18008 ', '-', '019827123', 'Osram', 'John', 1),
(2, 'PRM18009', '-', '019827123', 'Osram', 'John', 1),
(3, 'TULIPS', '-', '019827123', 'Osram', 'John', 1),
(4, 'PRM18012', '-', '019827123', 'Osram', 'John', 1),
(5, 'FA', '-', '019827123', 'Osram', 'John', 1),
(7, 'MatrixQ 100% AOI Vision', '-', '019827123', 'Osram', 'John', 1),
(8, 'Lidar 6 sides 100% Auto Vision System', '-', '019827123', 'Osram', 'John', 1),
(9, 'Lidar 6 100% AOI Vision', '-', '019827123', 'Osram', 'John', 1),
(10, 'Tokyoweld Taper Vision Lighting Upgrade', '-', '', '', '', 1),
(11, 'XLT18004 SJM Final Pack System', '-', '019827123', 'Osram', 'John', 1),
(12, 'XLT18007', '-', '019827123', 'Osram', 'John', 1),
(13, 'XLT18006 Crimp Mark Inspection System', '-', '', '', '', 1),
(14, 'PRM17019 Glass Turret OCR AutoVI System', '-', '', '', '', 1),
(15, 'PRM17021 OCR and 2D Vision System', '-', '', '', '', 1),
(16, 'Crimp Mark System', '-', '', '', '', 1),
(17, 'SJM Final Pack System', '-', '', '', '', 1),
(18, 'PRM18019 PRISM_OSRAM_T99 RTR 3rd Opt Auto VI System', '-', '', '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `project1`
--

CREATE TABLE `project1` (
  `project_id` int(11) NOT NULL,
  `project_name` varchar(255) NOT NULL,
  `project_description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project1`
--

INSERT INTO `project1` (`project_id`, `project_name`, `project_description`) VALUES
(1, 'Jager', '-'),
(2, 'Halcon', '-');

-- --------------------------------------------------------

--
-- Table structure for table `sample`
--

CREATE TABLE `sample` (
  `sam_id` int(11) NOT NULL,
  `sam_name` varchar(200) NOT NULL,
  `sam_desc` varchar(200) NOT NULL,
  `cust_pic` varchar(200) NOT NULL,
  `cust_contact` varchar(200) NOT NULL,
  `sam_onloan_date` date NOT NULL,
  `sam_due_date` date NOT NULL,
  `sam_status` int(1) NOT NULL,
  `user` varchar(200) NOT NULL,
  `project_name` varchar(200) NOT NULL,
  `project_desc` varchar(200) NOT NULL,
  `cust_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sample`
--

INSERT INTO `sample` (`sam_id`, `sam_name`, `sam_desc`, `cust_pic`, `cust_contact`, `sam_onloan_date`, `sam_due_date`, `sam_status`, `user`, `project_name`, `project_desc`, `cust_name`) VALUES
(1, 'y', 'y', 'John', '019827123', '2018-12-18', '2018-12-27', 2, 'Bernard Phuah', 'y', 'y', 'Osram');

-- --------------------------------------------------------

--
-- Table structure for table `stockin`
--

CREATE TABLE `stockin` (
  `sin_id` int(11) NOT NULL,
  `sin_partnum` varchar(200) NOT NULL,
  `sin_proname` varchar(200) NOT NULL,
  `sin_category` varchar(200) NOT NULL,
  `sin_serialnum` varchar(200) NOT NULL,
  `sin_prodes` varchar(200) NOT NULL,
  `sin_cusname` varchar(200) NOT NULL,
  `sin_cpic` varchar(200) NOT NULL,
  `sin_datein` date NOT NULL,
  `sin_status` int(11) NOT NULL,
  `sin_ladatein` date DEFAULT NULL,
  `sin_user` varchar(200) NOT NULL,
  `sin_upuser` varchar(200) NOT NULL,
  `sin_do` varchar(200) NOT NULL,
  `sin_check` int(11) NOT NULL,
  `sin_remark` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stockin`
--

INSERT INTO `stockin` (`sin_id`, `sin_partnum`, `sin_proname`, `sin_category`, `sin_serialnum`, `sin_prodes`, `sin_cusname`, `sin_cpic`, `sin_datein`, `sin_status`, `sin_ladatein`, `sin_user`, `sin_upuser`, `sin_do`, `sin_check`, `sin_remark`) VALUES
(31, 'VS-CAB-USB3XV[4]', '', 'Cable', 'MRM000252/01201819-1', '', '', '', '2018-08-09', 1, NULL, 'ling chui sian', '', '', 0, ''),
(79, 'IPC-510MB-00XBE', '', 'IPC', 'KMA3930663', '', '', '', '2018-09-14', 1, NULL, 'Edmund Yuen', '', '', 0, ''),
(80, 'IPC-510MB-00XBE', '', 'IPC', 'KMA3930664', '', '', '', '2018-09-14', 1, NULL, 'Edmund Yuen', '', '', 0, ''),
(81, 'IPC-510MB-00XBE', '', 'IPC', 'KMA3941634', '', '', '', '2018-09-14', 1, NULL, 'Edmund Yuen', '', '', 0, ''),
(82, 'IPC-510MB-00XBE', '', 'IPC', 'KMA3930648', '', '', '', '2018-09-14', 1, NULL, 'Edmund Yuen', '', '', 0, 'I/O card used for tulips project'),
(83, 'IPC-510MB-00XBE', '', 'IPC', 'KMA3930644', '', '', '', '2018-09-14', 1, NULL, 'Edmund Yuen', '', '', 0, ''),
(84, 'IPC-510MB-00XBE', '', 'IPC', 'KMA3930656', '', '', '', '2018-09-14', 1, NULL, 'Edmund Yuen', '', '', 0, ''),
(85, 'IPC-510MB-00XBE', '', 'IPC', 'KMA3930645', '', '', '', '2018-09-14', 1, NULL, 'Edmund Yuen', '', '', 0, ''),
(86, 'F800P', '', 'IPC', '3200028T30000062', '', '', '', '2018-09-14', 1, NULL, 'Edmund Yuen', '', '', 0, ''),
(88, 'F800P', '', 'IPC', '3200028N30000345', '', '', '', '2018-09-14', 1, NULL, 'Edmund Yuen', '', '', 0, ''),
(89, 'F800P', '', 'IPC', '3200028N30000347', '', '', '', '2018-09-14', 1, NULL, 'Edmund Yuen', '', '', 0, ''),
(90, 'F800P', '', 'IPC', '3200028N30000348', '', '', '', '2018-09-14', 1, NULL, 'Edmund Yuen', '', '', 0, ''),
(91, 'F800P', '', 'IPC', '3200028N30000346', '', '', '', '2018-09-14', 1, NULL, 'Edmund Yuen', '', '', 0, ''),
(92, 'F800P', '', 'IPC', '3200028N30000374', '', '', '', '2018-09-14', 1, NULL, 'Edmund Yuen', '', '', 0, ''),
(93, 'F800P', '', 'IPC', '3200028N30000375', '', '', '', '2018-09-14', 1, NULL, 'Edmund Yuen', '', '', 0, ''),
(94, 'F800P', '', 'IPC', '3200028N30000376', '', '', '', '2018-09-14', 1, NULL, 'Edmund Yuen', '', '', 0, ''),
(95, 'F800P', '', 'IPC', '3200028N30000373', '', '', '', '2018-09-14', 1, NULL, 'Edmund Yuen', '', '', 0, ''),
(106, 'LIC-4256N', '', 'Controller', 'F180802813', '', '', '', '2018-09-14', 1, NULL, 'Edmund Yuen', '', '', 0, ''),
(110, 'FRB-i56', '', 'Lighting', 'F180802812A', '', '', '', '2018-09-14', 1, NULL, 'Edmund Yuen', '', '', 0, ''),
(148, 'V2-CAB-HR6[5]', '', 'Cable', '-', '', '', '', '2018-09-21', 1, NULL, 'ling chui sian', '', '', 0, ''),
(194, 'T-BC21', '', 'IPC', '-', '', '', '', '2018-10-10', 1, NULL, 'LING CHUI SIAN', '', '', 0, ''),
(195, 'T-BC21', '', 'IPC', '-', '', '', '', '2018-10-10', 1, NULL, 'LING CHUI SIAN', '', '', 0, ''),
(196, 'T-BC21', '', 'IPC', '-', '', '', '', '2018-10-10', 1, NULL, 'LING CHUI SIAN', '', '', 0, ''),
(197, 'HV-KB329', '', 'IPC', 'KB18KB329DLS0797', '', '', '', '2018-10-10', 1, NULL, 'LING CHUI SIAN', '', '', 0, ''),
(198, 'HV-KB329', '', 'IPC', 'KB18KB329DLS0836', '', '', '', '2018-10-10', 1, NULL, 'LING CHUI SIAN', '', '', 0, ''),
(199, 'HV-KB329', '', 'IPC', 'KB18KB329DLS0520', '', '', '', '2018-10-10', 1, NULL, 'LING CHUI SIAN', '', '', 0, ''),
(200, 'HV-KB329', '', 'IPC', 'KB18KB329DLS0753', '', '', '', '2018-10-10', 1, NULL, 'LING CHUI SIAN', '', '', 0, ''),
(226, 'HALCON DONGLE', '', 'Others', '9-40E07B93', '', '', '', '2018-10-18', 1, NULL, 'Edmund Yuen', '', '', 0, ''),
(227, 'HALCON DONGLE', '', 'Others', '9-76224642', '', '', '', '2018-10-18', 1, NULL, 'Edmund Yuen', '', '', 0, ''),
(229, 'HALCON DONGLE', '', 'Others', '9-675EC65D', '', '', '', '2018-10-18', 1, NULL, 'Edmund Yuen', '', '', 0, ''),
(232, '223V5L', '', 'IPC', 'ZV0A1822017281', '', '', '', '2018-10-24', 1, NULL, 'Edmund Yuen', '', '', 0, ''),
(233, '223V5L', '', 'IPC', 'ZV0A1822017288', '', '', '', '2018-10-24', 1, NULL, 'Edmund Yuen', '', '', 0, ''),
(234, '223V5L', '', 'IPC', 'ZV0A1822017291', '', '', '', '2018-10-24', 1, NULL, 'Edmund Yuen', '', '', 0, ''),
(235, '223V5L', '', 'IPC', 'ZV0A1822017285', '', '', '', '2018-10-24', 1, NULL, 'Edmund Yuen', '', '', 0, ''),
(244, 'U3X4-PCIE4XE101', '', 'IPC', '182241202P0963', '', '', '', '2018-12-21', 1, NULL, 'Edmund Yuen', '', 'DO18122374', 0, ''),
(245, 'U3X4-PCIE4XE101', '', 'IPC', '182241202P0953', '', '', '', '2018-12-21', 1, NULL, 'Edmund Yuen', '', 'DO18122374', 0, ''),
(267, 'T-BC21', '', 'IPC', '-', '', '', '', '2018-12-31', 1, NULL, 'Edmund Yuen', '', '', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `stockout`
--

CREATE TABLE `stockout` (
  `st_id` int(11) NOT NULL,
  `st_category` varchar(200) NOT NULL,
  `st_dateout` date NOT NULL,
  `st_status` int(11) NOT NULL,
  `st_partnum` varchar(200) NOT NULL,
  `st_serialnum` varchar(200) NOT NULL,
  `st_proname` varchar(200) NOT NULL,
  `st_ladateout` date DEFAULT NULL,
  `st_user` varchar(200) NOT NULL,
  `st_upuser` varchar(200) NOT NULL,
  `st_prodes` varchar(200) NOT NULL,
  `st_cusname` varchar(200) NOT NULL,
  `st_cpic` varchar(200) NOT NULL,
  `st_do` varchar(200) NOT NULL,
  `st_remark` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stockout`
--

INSERT INTO `stockout` (`st_id`, `st_category`, `st_dateout`, `st_status`, `st_partnum`, `st_serialnum`, `st_proname`, `st_ladateout`, `st_user`, `st_upuser`, `st_prodes`, `st_cusname`, `st_cpic`, `st_do`, `st_remark`) VALUES
(1, 'Camera', '2018-08-08', 0, 'V2505MCFBU', '0510018', 'TULIPS', NULL, 'ling chui sian', '', '-', 'Osram', 'John', '', '0'),
(2, 'Camera', '2018-08-08', 0, 'V2505MCFBU', '0510019', 'TULIPS', NULL, 'ling chui sian', '', '-', 'Osram', 'John', '', '0'),
(3, 'Camera', '2018-08-08', 0, 'V2505MCFBU', '0510142', 'TULIPS', NULL, 'ling chui sian', '', '-', 'Osram', 'John', '', '0'),
(4, 'Lens', '2018-08-08', 0, 'VS-TEC0513', 'N17018121', 'TULIPS', NULL, 'ling chui sian', '', '-', 'Osram', 'John', '', '0'),
(5, 'Lens', '2018-08-08', 0, 'VS-TEC0513', 'N17018126', 'TULIPS', NULL, 'ling chui sian', '', '-', 'Osram', 'John', '', '0'),
(6, 'Lens', '2018-08-08', 0, 'VS-TEC0513', 'N17011106', 'TULIPS', NULL, 'ling chui sian', '', '-', 'Osram', 'John', '', '0'),
(7, 'Controller', '2018-08-08', 0, 'PSD-4256', 'F180602103', 'TULIPS', NULL, 'ling chui sian', '', '-', 'Osram', 'John', '', '0'),
(8, 'Controller', '2018-08-08', 0, 'PSD-4256', 'F180602104', 'TULIPS', NULL, 'ling chui sian', '', '-', 'Osram', 'John', '', '0'),
(9, 'Controller', '2018-08-08', 0, 'PSD-4256', 'F180602102', 'TULIPS', NULL, 'ling chui sian', '', '-', 'Osram', 'John', '', '0'),
(10, 'Lighting', '2018-08-08', 0, 'FLFV-Si20N-W', 'F180602089', 'TULIPS', NULL, 'ling chui sian', '', '-', 'Osram', 'John', '', '0'),
(11, 'Lighting', '2018-08-08', 0, 'FLFV-Si20N-W', 'F171104536', 'TULIPS', NULL, 'ling chui sian', '', '-', 'Osram', 'John', '', '0'),
(12, 'Lighting', '2018-08-08', 0, 'FLFV-Si20N-W', 'F180602092', 'TULIPS', NULL, 'ling chui sian', '', '-', 'Osram', 'John', '', '0'),
(13, 'Lighting', '2018-08-08', 0, 'FFPR-Si32-W', 'F180602096', 'TULIPS', NULL, 'ling chui sian', '', '-', 'Osram', 'John', '', '0'),
(14, 'Lighting', '2018-08-08', 0, 'FFPR-Si32-W', 'F180602097', 'TULIPS', NULL, 'ling chui sian', '', '-', 'Osram', 'John', '', '0'),
(15, 'Lighting', '2018-08-08', 0, 'FFPR-Si37-W', 'F180602100', 'TULIPS', NULL, 'ling chui sian', '', '-', 'Osram', 'John', '', '0'),
(16, 'IPC', '2018-08-08', 0, 'I/OCard', 'LKA1843330', 'TULIPS', NULL, 'ling chui sian', '', '-', 'Osram', 'John', '', '0'),
(19, 'Cable', '2018-08-08', 0, 'LIC-CABLE1', '-', 'TULIPS', NULL, 'ling chui sian', '', '-', 'Osram', 'John', '', '0'),
(20, 'Cable', '2018-08-08', 0, 'LIC-CABLE1', '-', 'TULIPS', NULL, 'ling chui sian', '', '-', 'Osram', 'John', '', '0'),
(21, 'Cable', '2018-08-08', 0, 'LIC-CABLE1', '-', 'TULIPS', NULL, 'ling chui sian', '', '-', 'Osram', 'John', '', '0'),
(22, 'Cable', '2018-08-08', 0, 'LIC-PWRCABLE1', '-', 'TULIPS', NULL, 'ling chui sian', '', '-', 'Osram', 'John', '', '0'),
(23, 'Cable', '2018-08-08', 0, 'LIC-PWRCABLE1', '-', 'TULIPS', NULL, 'ling chui sian', '', '-', 'Osram', 'John', '', '0'),
(24, 'Cable', '2018-08-08', 0, 'LIC-PWRCABLE1', '-', 'TULIPS', NULL, 'ling chui sian', '', '-', 'Osram', 'John', '', '0'),
(25, 'Cable', '2018-08-08', 0, 'VS-CAB-USB3XV[4]', 'MRM000252/01201819-1', 'TULIPS', NULL, 'ling chui sian', '', '-', 'Osram', 'John', '', '0'),
(26, 'Cable', '2018-08-08', 0, 'VS-CAB-USB3XV[4]', 'MRM000252/01201819-2', 'TULIPS', NULL, 'ling chui sian', '', '-', 'Osram', 'John', '', '0'),
(27, 'Cable', '2018-08-08', 0, 'VS-CAB-USB3XV[4]', 'MRM000252/01201819-3', 'TULIPS', NULL, 'ling chui sian', '', '-', 'Osram', 'John', '', '0'),
(28, 'IPC', '2018-08-08', 0, 'U3X4-PCIE4XE101', '179331202P1236', 'TULIPS', NULL, 'ling chui sian', '', '-', 'Osram', 'John', '', '0'),
(29, 'Others', '2018-08-08', 0, 'HALCON DONGLE', 'ID9-702A8434', 'TULIPS', NULL, 'ling chui sian', '', '-', 'Osram', 'John', '', '0'),
(30, 'IPC', '2018-08-08', 0, 'IPC-510MB-600X', 'KMA3624343', 'TULIPS', NULL, 'ling chui sian', '', '-', 'Osram', 'John', '', '0'),
(31, 'Camera', '2018-08-08', 0, 'V2505MCFBU', '0510143', 'PRM18008 ', NULL, 'ling chui sian', '', '-', 'Osram', 'John', '', '0'),
(32, 'Camera', '2018-08-08', 0, 'V2505MCFBU', '0510141', 'PRM18008 ', NULL, 'ling chui sian', '', '-', 'Osram', 'John', '', '0'),
(33, 'Lens', '2018-08-08', 0, 'VS-TEC0513', 'N17018125', 'PRM18008 ', NULL, 'ling chui sian', '', '-', 'Osram', 'John', '', '0'),
(34, 'Lens', '2018-08-08', 0, 'VS-MC1-80', 'G18008374', 'PRM18008 ', NULL, 'ling chui sian', '', '-', 'Osram', 'John', '', '0'),
(35, 'Controller', '2018-08-08', 0, 'PSD-4256', 'F180602101', 'PRM18008 ', NULL, 'ling chui sian', '', '-', 'Osram', 'John', '', '0'),
(36, 'Lighting', '2018-08-08', 0, 'FLFV-Si20N-W', 'F180602091', 'PRM18008 ', NULL, 'ling chui sian', '', '-', 'Osram', 'John', '', '0'),
(37, 'Lighting', '2018-08-08', 0, 'FFPR-Si32-B', 'F180602098', 'PRM18008 ', NULL, 'ling chui sian', '', '-', 'Osram', 'John', '', '0'),
(38, 'Lighting', '2018-08-08', 0, 'FFPR-Si32-W', 'F180602095', 'PRM18008 ', NULL, 'ling chui sian', '', '-', 'Osram', 'John', '', '0'),
(39, 'IPC', '2018-08-08', 0, 'PCIE-1756-AE', '-', 'PRM18008 ', NULL, 'ling chui sian', '', '-', 'Osram', 'John', '', '0'),
(40, 'Cable', '2018-08-08', 0, 'LIC-CABLE1', '-', 'PRM18008 ', NULL, 'ling chui sian', '', '-', 'Osram', 'John', '', '0'),
(41, 'Cable', '2018-08-08', 0, 'LIC-CABLE1', '-', 'PRM18008 ', NULL, 'ling chui sian', '', '-', 'Osram', 'John', '', '0'),
(42, 'Cable', '2018-08-08', 0, 'PCL-10250-1E', 'IAC2276111', 'PRM18008 ', NULL, 'ling chui sian', '', '-', 'Osram', 'John', '', '0'),
(43, 'Cable', '2018-08-08', 0, 'VS-CAB-USB3XV[4]', 'MRM000252/01201819-1', 'PRM18008 ', NULL, 'ling chui sian', '', '-', 'Osram', 'John', '', '0'),
(44, 'Cable', '2018-08-08', 0, 'VS-CAB-USB3XV[4]', 'MRM000252/01201819-2', 'PRM18008 ', NULL, 'ling chui sian', '', '-', 'Osram', 'John', '', '0'),
(45, 'IPC', '2018-08-08', 0, 'MIC-75M40-00A1E', 'KMA3808906', 'PRM18008 ', NULL, 'ling chui sian', '', '-', 'Osram', 'John', '', '0'),
(46, 'Others', '2018-08-08', 0, 'ADAM-3951-BE', '-', 'PRM18008 ', NULL, 'ling chui sian', '', '-', 'Osram', 'John', '', '0'),
(47, 'Others', '2018-08-08', 0, 'ADAM-3951-BE', '-', 'PRM18008 ', NULL, 'ling chui sian', '', '-', 'Osram', 'John', '', '0'),
(48, 'Camera', '2018-08-08', 0, 'V2505MCFBU', '0510144', 'PRM18009', NULL, 'ling chui sian', '', '-', 'Osram', 'John', '', '0'),
(49, 'Camera', '2018-08-08', 0, 'V2505MCFBU', '0510145', 'PRM18009', NULL, 'ling chui sian', '', '-', 'Osram', 'John', '', '0'),
(50, 'Lens', '2018-08-08', 0, 'VS-TEC0513', 'N17018124', 'PRM18009', NULL, 'ling chui sian', '', '-', 'Osram', 'John', '', '0'),
(51, 'Lens', '2018-08-08', 0, 'VS-MC1-80', 'G18008375', 'PRM18009', NULL, 'ling chui sian', '', '-', 'Osram', 'John', '', '0'),
(52, 'Controller', '2018-08-08', 0, 'PSD-4256', 'F180602101', 'PRM18009', NULL, 'ling chui sian', '', '-', 'Osram', 'John', '', '0'),
(53, 'Lighting', '2018-08-08', 0, 'FLFV-Si20N-W', 'F180602093', 'PRM18009', NULL, 'ling chui sian', '', '-', 'Osram', 'John', '', '0'),
(54, 'Lighting', '2018-08-08', 0, 'FFPR-Si32-B', 'F180602099', 'PRM18009', NULL, 'ling chui sian', '', '-', 'Osram', 'John', '', '0'),
(55, 'Lighting', '2018-08-08', 0, 'FFPR-Si32-W', 'F180602094', 'PRM18009', NULL, 'ling chui sian', '', '-', 'Osram', 'John', '', '0'),
(56, 'IPC', '2018-08-08', 0, 'PCIE-1756-AE', '-', 'PRM18009', NULL, 'ling chui sian', '', '-', 'Osram', 'John', '', '0'),
(57, 'Cable', '2018-08-08', 0, 'LIC-CABLE1', '-', 'PRM18009', NULL, 'ling chui sian', '', '-', 'Osram', 'John', '', '0'),
(58, 'Cable', '2018-08-08', 0, 'LIC-CABLE1', '-', 'PRM18009', NULL, 'ling chui sian', '', '-', 'Osram', 'John', '', '0'),
(59, 'Cable', '2018-08-08', 0, 'PCL-10250-1E', 'IAC2276104', 'PRM18009', NULL, 'ling chui sian', '', '-', 'Osram', 'John', '', '0'),
(60, 'Cable', '2018-08-08', 0, 'VS-CAB-USB3XV[4]', 'MRM000252/01201819-1', 'PRM18009', NULL, 'ling chui sian', '', '-', 'Osram', 'John', '', '0'),
(61, 'Cable', '2018-08-08', 0, 'VS-CAB-USB3XV[4]', 'MRM000252/01201819-2', 'PRM18009', NULL, 'ling chui sian', '', '-', 'Osram', 'John', '', '0'),
(62, 'IPC', '2018-08-08', 0, 'MIC-75M40-0A1E', 'KMA2919916', 'PRM18009', NULL, 'ling chui sian', '', '-', 'Osram', 'John', '', '0'),
(63, 'Others', '2018-08-08', 0, 'ADAM-3951-BE', '-', 'PRM18009', NULL, 'ling chui sian', '', '-', 'Osram', 'John', '', '0'),
(64, 'Others', '2018-08-08', 0, 'ADAM-3951-BE', '-', 'PRM18009', NULL, 'ling chui sian', '', '-', 'Osram', 'John', '', '0'),
(65, 'Camera', '2018-09-14', 0, 'V2505MCFBU', '0510169', 'FA', NULL, 'Edmund Yuen', '', '-', 'Osram', 'John', '', '0'),
(66, 'Camera', '2018-09-14', 0, 'V2505MCFBU', '0510167', 'FA', NULL, 'Edmund Yuen', '', '-', 'Osram', 'John', '', '0'),
(67, 'Camera', '2018-09-14', 0, 'V2505MCFBU', '0510168', 'FA', NULL, 'Edmund Yuen', '', '-', 'Osram', 'John', '', '0'),
(68, 'Lighting', '2018-09-14', 0, 'FFPR-Si37-W', 'F180702555', 'FA', NULL, 'Edmund Yuen', '', '-', 'Osram', 'John', '', '0'),
(69, 'Lighting', '2018-09-14', 0, 'FFPR-Si37-W', 'F180702556', 'FA', NULL, 'Edmund Yuen', '', '-', 'Osram', 'John', '', '0'),
(70, 'Lighting', '2018-09-14', 0, 'FFPR-Si37-W', 'F180702557', 'FA', NULL, 'Edmund Yuen', '', '-', 'Osram', 'John', '', '0'),
(71, 'Lighting', '2018-09-14', 0, 'FLFV-Si20N-W', 'F180702554', 'FA', NULL, 'Edmund Yuen', '', '-', 'Osram', 'John', '', '0'),
(72, 'Controller', '2018-09-14', 0, 'LIC-4256N', 'F180702558', 'FA', NULL, 'Edmund Yuen', '', '-', 'Osram', 'John', '', '0'),
(73, 'Controller', '2018-09-14', 0, 'PCA-350500-631', '0000498850', 'FA', NULL, 'Edmund Yuen', '', '-', 'Osram', 'John', '', '0'),
(74, 'Controller', '2018-09-14', 0, 'PCA-350500-631', '0000498849', 'FA', NULL, 'Edmund Yuen', '', '-', 'Osram', 'John', '', '0'),
(75, 'Controller', '2018-09-14', 0, 'PCA-350500-631', '0000498837', 'FA', NULL, 'Edmund Yuen', '', '-', 'Osram', 'John', '', '0'),
(76, 'Lens', '2018-09-14', 0, '35-03-30-000', '18F1410', 'FA', NULL, 'Edmund Yuen', '', '-', 'Osram', 'John', '', '0'),
(77, 'Lens', '2018-09-14', 0, '35-03-30-000', '18F1409', 'FA', NULL, 'Edmund Yuen', '', '-', 'Osram', 'John', '', '0'),
(78, 'Lens', '2018-09-14', 0, '35-03-30-000', '18F1408', 'FA', NULL, 'Edmund Yuen', '', '-', 'Osram', 'John', '', '0'),
(79, 'Lens', '2018-09-14', 0, '35-08-00-000', '-', 'FA', NULL, 'Edmund Yuen', '', '-', 'Osram', 'John', '', '0'),
(80, 'Lens', '2018-09-14', 0, '35-00-03-000', '-', 'FA', NULL, 'Edmund Yuen', '', '-', 'Osram', 'John', '', '0'),
(81, 'Lens', '2018-09-14', 0, '35-00-03-000', '-', 'FA', NULL, 'Edmund Yuen', '', '-', 'Osram', 'John', '', '0'),
(82, 'Lens', '2018-09-14', 0, '35-00-03-000', '-', 'FA', NULL, 'Edmund Yuen', '', '-', 'Osram', 'John', '', '0'),
(83, 'Others', '2018-09-14', 0, '35-08-70-000', '-', 'FA', NULL, 'Edmund Yuen', '', '-', 'Osram', 'John', '', '0'),
(84, 'Others', '2018-09-14', 0, '35-08-70-000', '-', 'FA', NULL, 'Edmund Yuen', '', '-', 'Osram', 'John', '', '0'),
(85, 'Others', '2018-09-14', 0, '35-08-70-000', '-', 'FA', NULL, 'Edmund Yuen', '', '-', 'Osram', 'John', '', '0'),
(86, 'Others', '2018-09-14', 0, '35-07-11-000', '-', 'FA', NULL, 'Edmund Yuen', '', '-', 'Osram', 'John', '', '0'),
(87, 'Others', '2018-09-14', 0, '35-07-11-000', '-', 'FA', NULL, 'Edmund Yuen', '', '-', 'Osram', 'John', '', '0'),
(88, 'Others', '2018-09-14', 0, '35-07-11-000', '-', 'FA', NULL, 'Edmund Yuen', '', '-', 'Osram', 'John', '', '0'),
(89, 'Others', '2018-09-14', 0, '35-05-99-000', '-', 'FA', NULL, 'Edmund Yuen', '', '-', 'Osram', 'John', '', '0'),
(90, 'Others', '2018-09-14', 0, '35-05-99-000', '-', 'FA', NULL, 'Edmund Yuen', '', '-', 'Osram', 'John', '', '0'),
(91, 'Others', '2018-09-14', 0, '35-05-99-000', '-', 'FA', NULL, 'Edmund Yuen', '', '-', 'Osram', 'John', '', '0'),
(92, 'Others', '2018-09-14', 0, '35-31-60-000', 'F8957', 'FA', NULL, 'Edmund Yuen', '', '-', 'Osram', 'John', '', '0'),
(93, 'Others', '2018-09-14', 0, '35-31-60-000', 'F8955', 'FA', NULL, 'Edmund Yuen', '', '-', 'Osram', 'John', '', '0'),
(94, 'Others', '2018-09-14', 0, '35-31-60-000', 'F8956', 'FA', NULL, 'Edmund Yuen', '', '-', 'Osram', 'John', '', '0'),
(95, 'Cable', '2018-09-14', 0, 'VS-CAB-USB3XV[4]', 'MRM000252/01201819-2', 'FA', NULL, 'Edmund Yuen', '', '-', 'Osram', 'John', '', '0'),
(96, 'Cable', '2018-09-14', 0, 'VS-CAB-USB3XV[4]', 'MRM000252/01201819-3', 'FA', NULL, 'Edmund Yuen', '', '-', 'Osram', 'John', '', '0'),
(97, 'Cable', '2018-09-14', 0, 'VS-CAB-USB3XV[4]', 'MRM000252/01201819-4', 'FA', NULL, 'Edmund Yuen', '', '-', 'Osram', 'John', '', '0'),
(98, 'IPC', '2018-09-14', 0, 'U3X4-PCIE4XE101', 'PCB-00456-04', 'FA', NULL, 'Edmund Yuen', '', '-', 'Osram', 'John', '', '0'),
(99, 'Lens', '2018-09-14', 0, '35-08-00-000', '-', 'FA', NULL, 'Edmund Yuen', '', '-', 'Osram', 'John', '', '0'),
(100, 'Lens', '2018-09-14', 0, '35-08-00-000', '-', 'FA', NULL, 'Edmund Yuen', '', '-', 'Osram', 'John', '', '0'),
(101, 'Others', '2018-09-14', 0, 'HALCON DONGLE', 'ID9-258CC2EB', 'FA', NULL, 'Edmund Yuen', '', '-', 'Osram', 'John', '', '0'),
(102, 'IPC', '2018-09-14', 0, 'HV-KB329', 'KB17KB329DLS0191', 'FA', NULL, 'Edmund Yuen', '', '-', 'Osram', 'John', '', '0'),
(103, 'IPC', '2018-09-14', 0, '810-000767', '9785505518', 'FA', NULL, 'Edmund Yuen', '', '-', 'Osram', 'John', '', '0'),
(104, 'Lighting', '2018-09-14', 0, 'FHLV-Si27N2-W + FRBB-i56', 'F180702744/F180702744A', 'PRM18012', NULL, 'Edmund Yuen', '', '-', 'Osram', 'John', '', '0'),
(105, 'Controller', '2018-09-14', 0, 'LIC-4256N', 'F180702748', 'PRM18012', NULL, 'Edmund Yuen', '', '-', 'Osram', 'John', '', '0'),
(106, 'Lighting', '2018-09-14', 0, 'FFPR-i50-W', 'F180702746', 'PRM18012', NULL, 'Edmund Yuen', '', '-', 'Osram', 'John', '', '0'),
(107, 'Lens', '2018-09-14', 0, 'VS-LTC2-70CO/FSN', 'Z17018628', 'PRM18012', NULL, 'Edmund Yuen', '', '-', 'Osram', 'John', '', '0'),
(108, 'Lens', '2018-09-14', 0, 'C0057', '-', 'PRM18012', NULL, 'Edmund Yuen', '', '-', 'Osram', 'John', '', '0'),
(109, 'Camera', '2018-09-14', 0, 'VCC-12CLAR', '217700002', 'PRM18012', NULL, 'Edmund Yuen', '', '-', 'Osram', 'John', '', '0'),
(110, 'Cable', '2018-09-14', 0, 'V2-CAB-HR12', '5.0M KV6', 'PRM18012', NULL, 'Edmund Yuen', '', '-', 'Osram', 'John', '', '0'),
(111, 'Cable', '2018-09-14', 0, 'Camera Link Cable', '5.0M KV9-1', 'PRM18012', NULL, 'Edmund Yuen', '', '-', 'Osram', 'John', '', '0'),
(112, 'Cable', '2018-09-14', 0, 'Camera Link Cable', '5.0M KV9-2', 'PRM18012', NULL, 'Edmund Yuen', '', '-', 'Osram', 'John', '', '0'),
(113, 'IPC', '2018-09-14', 0, 'MSIP-REM-EUR-PC1622', 'FM131266', 'PRM18012', NULL, 'Edmund Yuen', '', '-', 'Osram', 'John', '', '0'),
(114, 'IPC', '2018-09-14', 0, 'T-BC21', '-', 'PRM18012', NULL, 'Edmund Yuen', '', '-', 'Osram', 'John', '', '0'),
(115, 'IPC', '2018-09-14', 0, 'HV-KB329', 'KB17KB329DLS0838', 'PRM18012', NULL, 'Edmund Yuen', '', '-', 'Osram', 'John', '', '0'),
(116, 'IPC', '2018-09-14', 0, 'F800P', '3200027X30000215', 'PRM18012', NULL, 'Edmund Yuen', '', '-', 'Osram', 'John', '', '0'),
(117, 'IPC', '2018-09-14', 0, '216V6L', 'ZV0A1746021379', 'PRM18012', NULL, 'Edmund Yuen', '', '-', 'Osram', 'John', '', '0'),
(118, 'IPC', '2018-09-14', 0, 'IPC-510MB-00XBE', 'KMA3624340', 'PRM18012', NULL, 'Edmund Yuen', '', '-', 'Osram', 'John', '', '0'),
(119, 'IPC', '2018-09-14', 0, 'F800P', '3200027X30000216', 'FA', NULL, 'Edmund Yuen', '', '-', 'Osram', 'John', '', '0'),
(120, 'Lighting', '2018-09-22', 0, 'FHLV-Si27N2-W + FRB-i56', 'F180702743/F180702743A', 'MatrixQ 100% AOI Vision', NULL, 'LING CHUI SIAN', '', '-', 'Osram', 'John', '', '0'),
(121, 'Controller', '2018-09-22', 0, 'LIC-4256N', 'F180702747', 'MatrixQ 100% AOI Vision', NULL, 'LING CHUI SIAN', '', '-', 'Osram', 'John', '', '0'),
(122, 'IPC', '2018-09-22', 0, 'IPC-510MB-00XBE', 'KMA3930652', 'MatrixQ 100% AOI Vision', NULL, 'LING CHUI SIAN', '', '-', 'Osram', 'John', '', '0'),
(123, 'IPC', '2018-09-22', 0, '216V6L', 'ZV0A1719021142', 'MatrixQ 100% AOI Vision', NULL, 'LING CHUI SIAN', '', '-', 'Osram', 'John', '', '0'),
(124, 'Lighting', '2018-09-22', 0, 'HPR2-150SW', '369496A007', 'MatrixQ 100% AOI Vision', NULL, 'LING CHUI SIAN', '', '-', 'Osram', 'John', '', '0'),
(125, 'IPC', '2018-09-22', 0, 'MSIP-REM-EUR-PC1633', 'KQG04560', 'MatrixQ 100% AOI Vision', NULL, 'LING CHUI SIAN', '', '-', 'Osram', 'John', '', '0'),
(126, 'Camera', '2018-09-22', 0, 'VCC-12CXP1R', 'T20510001', 'MatrixQ 100% AOI Vision', NULL, 'LING CHUI SIAN', '', '-', 'Osram', 'John', '', '0'),
(127, 'Cable', '2018-09-22', 0, 'V2-CAB-CXP-HF', '-', 'MatrixQ 100% AOI Vision', NULL, 'LING CHUI SIAN', '', '-', 'Osram', 'John', '', '0'),
(128, 'Cable', '2018-09-22', 0, 'V2-CAB-CXP-HF', '-', 'MatrixQ 100% AOI Vision', NULL, 'LING CHUI SIAN', '', '-', 'Osram', 'John', '', '0'),
(129, 'Cable', '2018-09-22', 0, 'V2-CAB-CXP-HF', '-', 'MatrixQ 100% AOI Vision', NULL, 'LING CHUI SIAN', '', '-', 'Osram', 'John', '', '0'),
(130, 'Cable', '2018-09-22', 0, 'V2-CAB-CXP-HF', '-', 'MatrixQ 100% AOI Vision', NULL, 'LING CHUI SIAN', '', '-', 'Osram', 'John', '', '0'),
(131, 'Lens', '2018-09-22', 0, '35-04-00-000', '-', 'MatrixQ 100% AOI Vision', NULL, 'LING CHUI SIAN', '', '-', 'Osram', 'John', '', '0'),
(132, 'Lens', '2018-09-22', 0, '301602', '-', 'MatrixQ 100% AOI Vision', NULL, 'LING CHUI SIAN', '', '-', 'Osram', 'John', '', '0'),
(133, 'Lens', '2018-09-22', 0, '28-21-05-001', '-', 'MatrixQ 100% AOI Vision', NULL, 'LING CHUI SIAN', '', '-', 'Osram', 'John', '', '0'),
(134, 'Lens', '2018-09-22', 0, '35-08-06-000', '-', 'MatrixQ 100% AOI Vision', NULL, 'LING CHUI SIAN', '', '-', 'Osram', 'John', '', '0'),
(135, 'Lens', '2018-09-22', 0, '30-17-03-000', '-', 'MatrixQ 100% AOI Vision', NULL, 'LING CHUI SIAN', '', '-', 'Osram', 'John', '', '0'),
(136, 'Lens', '2018-09-22', 0, '35-07-11-000', '-', 'MatrixQ 100% AOI Vision', NULL, 'LING CHUI SIAN', '', '-', 'Osram', 'John', '', '0'),
(137, 'Lens', '2018-09-22', 0, '30-16-01', '-', 'MatrixQ 100% AOI Vision', NULL, 'LING CHUI SIAN', '', '-', 'Osram', 'John', '', '0'),
(138, 'Others', '2018-09-22', 0, 'HALCON DONGLE', 'ID9-6E17C945', 'MatrixQ 100% AOI Vision', NULL, 'LING CHUI SIAN', '', '-', 'Osram', 'John', '', '0'),
(139, 'IPC', '2018-09-22', 0, 'HV-KB329', 'KB17KB329DLS0221', 'MatrixQ 100% AOI Vision', NULL, 'LING CHUI SIAN', '', '-', 'Osram', 'John', '', '0'),
(140, 'IPC', '2018-09-22', 0, 'T-BC21', '-', 'MatrixQ 100% AOI Vision', NULL, 'LING CHUI SIAN', '', '-', 'Osram', 'John', '', '0'),
(141, 'IPC', '2018-09-22', 0, 'F800P', '3200027X30000214', 'MatrixQ 100% AOI Vision', NULL, 'LING CHUI SIAN', '', '-', 'Osram', 'John', '', '0'),
(142, 'IPC', '2018-09-25', 0, 'IPC-510MB-00XBE', 'KMA3930649', 'Lidar 6 sides 100% Auto Vision System', NULL, 'LING CHUI SIAN', '', '-', 'Osram', 'John', '', '0'),
(143, 'IPC', '2018-09-25', 0, '216V6L', 'ZV0A1719021139', 'Lidar 6 sides 100% Auto Vision System', NULL, 'LING CHUI SIAN', '', '-', 'Osram', 'John', '', '0'),
(144, 'Controller', '2018-09-25', 0, 'LIC-4256N', 'F180802957', 'Lidar 6 sides 100% Auto Vision System', NULL, 'LING CHUI SIAN', '', '-', 'Osram', 'John', '', '0'),
(145, 'Controller', '2018-09-25', 0, 'LIC-4256N', 'F180802956', 'Lidar 6 sides 100% Auto Vision System', NULL, 'LING CHUI SIAN', '', '-', 'Osram', 'John', '', '0'),
(146, 'Controller', '2018-09-25', 0, 'LIC-4256N', 'F180802955', 'Lidar 6 sides 100% Auto Vision System', NULL, 'LING CHUI SIAN', '', '-', 'Osram', 'John', '', '0'),
(147, 'Lighting', '2018-09-25', 0, 'FLFV-Si20N-W', 'F180802947', 'Lidar 6 sides 100% Auto Vision System', NULL, 'LING CHUI SIAN', '', '-', 'Osram', 'John', '', '0'),
(148, 'Lighting', '2018-09-25', 0, 'FLFV-Si20N-W', 'F180802943', 'Lidar 6 sides 100% Auto Vision System', NULL, 'LING CHUI SIAN', '', '-', 'Osram', 'John', '', '0'),
(149, 'Lighting', '2018-09-25', 0, 'FLFV-Si20N-W', 'F180802948', 'Lidar 6 sides 100% Auto Vision System', NULL, 'LING CHUI SIAN', '', '-', 'Osram', 'John', '', '0'),
(150, 'Lighting', '2018-09-25', 0, 'FLFV-Si20N-W', 'F180802944', 'Lidar 6 sides 100% Auto Vision System', NULL, 'LING CHUI SIAN', '', '-', 'Osram', 'John', '', '0'),
(151, 'Lighting', '2018-09-25', 0, 'FLFV-Si20N-W', 'F180802945', 'Lidar 6 sides 100% Auto Vision System', NULL, 'LING CHUI SIAN', '', '-', 'Osram', 'John', '', '0'),
(152, 'Lighting', '2018-09-25', 0, 'FLFV-Si20N-W', 'F180802946', 'Lidar 6 sides 100% Auto Vision System', NULL, 'LING CHUI SIAN', '', '-', 'Osram', 'John', '', '0'),
(153, 'Lighting', '2018-09-25', 0, 'FFPR-Si32-W', 'F180802949', 'Lidar 6 sides 100% Auto Vision System', NULL, 'LING CHUI SIAN', '', '-', 'Osram', 'John', '', '0'),
(154, 'Lighting', '2018-09-25', 0, 'FFPR-Si32-W', 'F180802952', 'Lidar 6 sides 100% Auto Vision System', NULL, 'LING CHUI SIAN', '', '-', 'Osram', 'John', '', '0'),
(155, 'Lighting', '2018-09-25', 0, 'FFPR-Si32-W', 'F180802953', 'Lidar 6 sides 100% Auto Vision System', NULL, 'LING CHUI SIAN', '', '-', 'Osram', 'John', '', '0'),
(156, 'Lighting', '2018-09-25', 0, 'FFPR-Si32-W', 'F180802950', 'Lidar 6 sides 100% Auto Vision System', NULL, 'LING CHUI SIAN', '', '-', 'Osram', 'John', '', '0'),
(157, 'Lighting', '2018-09-25', 0, 'FFPR-Si32-W', 'F180802951', 'Lidar 6 sides 100% Auto Vision System', NULL, 'LING CHUI SIAN', '', '-', 'Osram', 'John', '', '0'),
(158, 'Lighting', '2018-09-25', 0, 'FFPR-Si32-W', 'F180802954', 'Lidar 6 sides 100% Auto Vision System', NULL, 'LING CHUI SIAN', '', '-', 'Osram', 'John', '', '0'),
(159, 'IPC', '2018-09-25', 0, '1EU3X4-PCIE4XE101', '182241202P0839', 'Lidar 6 sides 100% Auto Vision System', NULL, 'LING CHUI SIAN', '', '-', 'Osram', 'John', '', '0'),
(160, 'IPC', '2018-09-25', 0, '1EU3X4-PCIE4XE101', '182241202P0855', 'Lidar 6 sides 100% Auto Vision System', NULL, 'LING CHUI SIAN', '', '-', 'Osram', 'John', '', '0'),
(161, 'Camera', '2018-09-25', 0, 'V2505MCFBU', '0510206', 'Lidar 6 sides 100% Auto Vision System', NULL, 'LING CHUI SIAN', '', '-', 'Osram', 'John', '', '0'),
(162, 'Camera', '2018-09-25', 0, 'V2505MCFBU', '0510201', 'Lidar 6 sides 100% Auto Vision System', NULL, 'LING CHUI SIAN', '', '-', 'Osram', 'John', '', '0'),
(163, 'Camera', '2018-09-25', 0, 'V2505MCFBU', '0510205', 'Lidar 6 sides 100% Auto Vision System', NULL, 'LING CHUI SIAN', '', '-', 'Osram', 'John', '', '0'),
(164, 'Camera', '2018-09-25', 0, 'V2505MCFBU', '0510203', 'Lidar 6 sides 100% Auto Vision System', NULL, 'LING CHUI SIAN', '', '-', 'Osram', 'John', '', '0'),
(165, 'Camera', '2018-09-25', 0, 'V2505MCFBU', '0510204', 'Lidar 6 sides 100% Auto Vision System', NULL, 'LING CHUI SIAN', '', '-', 'Osram', 'John', '', '0'),
(166, 'Camera', '2018-09-25', 0, 'V2505MCFBU', '0510202', 'Lidar 6 sides 100% Auto Vision System', NULL, 'LING CHUI SIAN', '', '-', 'Osram', 'John', '', '0'),
(167, 'Cable', '2018-09-25', 0, 'V2-CAB-USB3XV[4]', 'MRM000464/02201833-1', 'Lidar 6 sides 100% Auto Vision System', NULL, 'LING CHUI SIAN', '', '-', 'Osram', 'John', '', '0'),
(168, 'Cable', '2018-09-25', 0, 'V2-CAB-USB3XV[4]', 'MRM000464/02201833-2', 'Lidar 6 sides 100% Auto Vision System', NULL, 'LING CHUI SIAN', '', '-', 'Osram', 'John', '', '0'),
(169, 'Cable', '2018-09-25', 0, 'V2-CAB-USB3XV[4]', 'MRM000464/02201833-3', 'Lidar 6 sides 100% Auto Vision System', NULL, 'LING CHUI SIAN', '', '-', 'Osram', 'John', '', '0'),
(170, 'Cable', '2018-09-25', 0, 'V2-CAB-USB3XV[4]', 'MRM000464/02201833-4', 'Lidar 6 sides 100% Auto Vision System', NULL, 'LING CHUI SIAN', '', '-', 'Osram', 'John', '', '0'),
(171, 'Cable', '2018-09-25', 0, 'V2-CAB-USB3XV[4]', 'MRM000464/02201833-5', 'Lidar 6 sides 100% Auto Vision System', NULL, 'LING CHUI SIAN', '', '-', 'Osram', 'John', '', '0'),
(172, 'Cable', '2018-09-25', 0, 'V2-CAB-USB3XV[4]', 'MRM000464/02201833-6', 'Lidar 6 sides 100% Auto Vision System', NULL, 'LING CHUI SIAN', '', '-', 'Osram', 'John', '', '0'),
(173, 'Lens', '2018-09-25', 0, 'VS-TEC0513', 'N17018123', 'Lidar 6 sides 100% Auto Vision System', NULL, 'LING CHUI SIAN', '', '-', 'Osram', 'John', '', '0'),
(174, 'Lens', '2018-09-25', 0, 'VS-TEC0513', 'N17018122', 'Lidar 6 sides 100% Auto Vision System', NULL, 'LING CHUI SIAN', '', '-', 'Osram', 'John', '', '0'),
(175, 'Lens', '2018-09-25', 0, 'VS-TEC0513', 'N17018128', 'Lidar 6 sides 100% Auto Vision System', NULL, 'LING CHUI SIAN', '', '-', 'Osram', 'John', '', '0'),
(176, 'Lens', '2018-09-25', 0, 'VS-TEC0513', 'N17018127', 'Lidar 6 sides 100% Auto Vision System', NULL, 'LING CHUI SIAN', '', '-', 'Osram', 'John', '', '0'),
(177, 'Lens', '2018-09-25', 0, 'VS-TEC0513', 'N17018142', 'Lidar 6 sides 100% Auto Vision System', NULL, 'LING CHUI SIAN', '', '-', 'Osram', 'John', '', '0'),
(178, 'Lens', '2018-09-25', 0, 'VS-TEC0513', 'N17018141', 'Lidar 6 sides 100% Auto Vision System', NULL, 'LING CHUI SIAN', '', '-', 'Osram', 'John', '', '0'),
(179, 'Others', '2018-09-25', 0, 'HALCON DONGLE', 'ID9-45193000', 'Lidar 6 sides 100% Auto Vision System', NULL, 'LING CHUI SIAN', '', '-', 'Osram', 'John', '', '0'),
(180, 'IPC', '2018-09-25', 0, 'HV-KB329', 'KB17KB329DLS0335', 'Lidar 6 sides 100% Auto Vision System', NULL, 'LING CHUI SIAN', '', '-', 'Osram', 'John', '', '0'),
(181, 'IPC', '2018-09-25', 0, 'T-BC21', '-', 'Lidar 6 sides 100% Auto Vision System', NULL, 'LING CHUI SIAN', '', '-', 'Osram', 'John', '', '0'),
(182, 'IPC', '2018-09-25', 0, 'F800P', '3200027X30000149', 'Lidar 6 sides 100% Auto Vision System', NULL, 'LING CHUI SIAN', '', '-', 'Osram', 'John', '', '0'),
(183, 'Lighting', '2018-09-25', 0, 'FFPR-i50-W', 'F180702745', 'Lidar 6 100% AOI Vision', NULL, 'LING CHUI SIAN', '', '-', 'Osram', 'John', '', '0'),
(184, 'IPC', '2018-09-25', 0, 'IPC-510MB-00XBE', 'KMA3930650', 'Lidar 6 100% AOI Vision', NULL, 'LING CHUI SIAN', '', '-', 'Osram', 'John', '', '0'),
(185, 'IPC', '2018-09-25', 0, '216V6L', 'ZV0A1719021122', 'Lidar 6 100% AOI Vision', NULL, 'LING CHUI SIAN', '', '-', 'Osram', 'John', '', '0'),
(186, 'IPC', '2018-09-25', 0, 'MSIP-REM-EUR-PC1622', 'FM132801', 'Lidar 6 100% AOI Vision', NULL, 'LING CHUI SIAN', '', '-', 'Osram', 'John', '', '0'),
(187, 'Camera', '2018-09-25', 0, 'VCC-12CLAR', '217700005', 'Lidar 6 100% AOI Vision', NULL, 'LING CHUI SIAN', '', '-', 'Osram', 'John', '', '0'),
(188, 'Cable', '2018-09-25', 0, 'Camera Link Cable', '5.0M KV9-1', 'Lidar 6 100% AOI Vision', NULL, 'LING CHUI SIAN', '', '-', 'Osram', 'John', '', '0'),
(189, 'Cable', '2018-09-25', 0, 'Camera Link Cable', '5.0M KV9-2', 'Lidar 6 100% AOI Vision', NULL, 'LING CHUI SIAN', '', '-', 'Osram', 'John', '', '0'),
(190, 'Lens', '2018-09-25', 0, 'VS-LTC2-70CO/FSN', 'Z18023387', 'Lidar 6 100% AOI Vision', NULL, 'LING CHUI SIAN', '', '-', 'Osram', 'John', '', '0'),
(191, 'Lens', '2018-09-25', 0, 'C0058', '-', 'Lidar 6 100% AOI Vision', NULL, 'LING CHUI SIAN', '', '-', 'Osram', 'John', '', '0'),
(192, 'Controller', '2018-09-25', 0, 'LIC-4256N', 'F170803259', 'Lidar 6 100% AOI Vision', NULL, 'LING CHUI SIAN', '', '-', 'Osram', 'John', '', '0'),
(193, 'Lighting', '2018-09-25', 0, 'FHLV-Si27N2-W', 'F180802812', 'Lidar 6 100% AOI Vision', NULL, 'LING CHUI SIAN', '', '-', 'Osram', 'John', '', '0'),
(194, 'Others', '2018-09-25', 0, 'HALCON DONGLE', 'ID9-51EB34E5', 'Lidar 6 100% AOI Vision', NULL, 'LING CHUI SIAN', '', '-', 'Osram', 'John', '', '0'),
(195, 'IPC', '2018-09-25', 0, 'HV-KB329', 'KB17KB329DLS0124', 'Lidar 6 100% AOI Vision', NULL, 'LING CHUI SIAN', '', '-', 'Osram', 'John', '', '0'),
(196, 'IPC', '2018-09-25', 0, 'T-BC21', '-', 'Lidar 6 100% AOI Vision', NULL, 'LING CHUI SIAN', '', '-', 'Osram', 'John', '', '0'),
(197, 'IPC', '2018-09-25', 0, 'F800P', '3200027X30000123', 'Lidar 6 100% AOI Vision', NULL, 'LING CHUI SIAN', '', '-', 'Osram', 'John', '', '0'),
(198, 'Cable', '2018-09-25', 0, 'V2-CAB-HR12', '5.0 M KU5', 'Lidar 6 100% AOI Vision', NULL, 'LING CHUI SIAN', '', '-', 'Osram', 'John', '', '0'),
(199, 'Lighting', '2018-09-25', 0, 'FLDL-i56X15-W', 'F180903103', 'Tokyoweld Taper Vision Lighting Upgrade', NULL, 'LING CHUI SIAN', '', '-', '', '', '', '0'),
(200, 'Controller', '2018-10-03', 0, 'PP610', '153962', 'XLT18004 SJM Final Pack System', NULL, 'LING CHUI SIAN', '', '-', 'Osram', 'John', '5077330591', '0'),
(201, 'Controller', '2018-10-03', 0, 'PP610', '153961', 'XLT18004 SJM Final Pack System', NULL, 'LING CHUI SIAN', '', '-', 'Osram', 'John', '5077330591', '0'),
(202, 'IPC', '2018-10-03', 0, 'K400 PLUS TV', '1812SCF00ZY9', 'XLT18004 SJM Final Pack System', NULL, 'LING CHUI SIAN', '', '-', 'Osram', 'John', '', '0'),
(203, 'IPC', '2018-10-03', 0, 'K400 PLUS TV', '1812SCF00ZS9', 'XLT18004 SJM Final Pack System', NULL, 'LING CHUI SIAN', '', '-', 'Osram', 'John', '', '0'),
(204, 'Lighting', '2018-10-03', 0, 'FLDU-i250X200-W', 'F180702750', 'XLT18004 SJM Final Pack System', NULL, 'LING CHUI SIAN', '', '-', 'Osram', 'John', '', '0'),
(205, 'Lighting', '2018-10-03', 0, 'FLDU-i250X200-W', 'F180702749', 'XLT18004 SJM Final Pack System', NULL, 'LING CHUI SIAN', '', '-', 'Osram', 'John', '', '0'),
(206, 'IPC', '2018-10-03', 0, 'SG 13', 'BS17521471SG13B', 'XLT18004 SJM Final Pack System', NULL, 'LING CHUI SIAN', '', '-', 'Osram', 'John', '', '0'),
(207, 'IPC', '2018-10-03', 0, 'SG 13', 'BS17521504SG13B', 'XLT18004 SJM Final Pack System', NULL, 'LING CHUI SIAN', '', '-', 'Osram', 'John', '', '0'),
(208, 'Lighting', '2018-10-05', 0, 'FFPQ-Si50-W', 'F180903117', 'XLT18007', NULL, 'LING CHUI SIAN', '', '-', 'Osram', 'John', '', '0'),
(209, 'Lighting', '2018-10-05', 0, 'FFPQ-Si50-W', 'F180903119', 'XLT18007', NULL, 'LING CHUI SIAN', '', '-', 'Osram', 'John', '', '0'),
(210, 'Lighting', '2018-10-05', 0, 'FFPQ-Si50-W', 'F180903118', 'XLT18007', NULL, 'LING CHUI SIAN', '', '-', 'Osram', 'John', '', '0'),
(211, 'IPC', '2018-10-10', 0, 'HV-KB329', 'KB17KB329DLS0044', 'MatrixQ 100% AOI Vision', NULL, 'LING CHUI SIAN', '', '-', 'Osram', 'John', '', 'replace for previous spoil keyboard'),
(212, 'IPC', '2018-10-18', 0, 'K400 PLUS TV', '1812SCF01009', 'XLT18006 Crimp Mark Inspection System', NULL, 'Edmund Yuen', '', '-', '', '', '', ''),
(213, 'IPC', '2018-10-18', 0, 'K400 PLUS TV', '1812SCF020V9', 'XLT18006 Crimp Mark Inspection System', NULL, 'Edmund Yuen', '', '-', '', '', '', ''),
(214, 'IPC', '2018-10-18', 0, 'M354ND', 'M354NI2E5028', 'XLT18006 Crimp Mark Inspection System', NULL, 'Edmund Yuen', '', '-', '', '', ' 00025509', ''),
(215, 'IPC', '2018-10-18', 0, 'M354ND', 'M354NI2E5029', 'XLT18006 Crimp Mark Inspection System', NULL, 'Edmund Yuen', '', '-', '', '', '00025510', ''),
(216, 'Controller', '2018-10-18', 0, 'PSA-1', 'F181003124', 'XLT18006 Crimp Mark Inspection System', NULL, 'Edmund Yuen', '', '-', '', '', 'DO-IVI-18026', ''),
(217, 'Controller', '2018-10-18', 0, 'PSA-1', 'F181003125', 'XLT18006 Crimp Mark Inspection System', NULL, 'Edmund Yuen', '', '-', '', '', 'DO-IVI-18026', ''),
(218, 'IPC', '2018-10-18', 0, 'X20-19608', '00186220841258', 'XLT18006 Crimp Mark Inspection System', NULL, 'Edmund Yuen', '', '-', '', '', '00025616', 'Come with ASRock Driver DVD and Window Pro 7 SP1 x64 DVD'),
(219, 'IPC', '2018-10-18', 0, 'X20-19608', '00186220841265', 'XLT18006 Crimp Mark Inspection System', NULL, 'Edmund Yuen', '', '-', '', '', '00025616', 'Come with ASRock Driver DVD and Window Pro 7 SP1 x64 DVD'),
(220, 'IPC', '2018-10-18', 0, 'FW-PCIE02', '18AAK500002', 'XLT18006 Crimp Mark Inspection System', NULL, 'Edmund Yuen', '', '-', '', '', 'DO18101944', ''),
(221, 'IPC', '2018-10-18', 0, 'FW-PCIE02', '18AAK500003', 'XLT18006 Crimp Mark Inspection System', NULL, 'Edmund Yuen', '', '-', '', '', 'DO18101944', ''),
(222, 'Camera', '2018-10-18', 0, 'Guppy F-033B ASG', '252381558', 'XLT18006 Crimp Mark Inspection System', NULL, 'Edmund Yuen', '', '-', '', '', 'DO18101944', ''),
(223, 'Camera', '2018-10-18', 0, 'Guppy F-033B ASG', '252381557', 'XLT18006 Crimp Mark Inspection System', NULL, 'Edmund Yuen', '', '-', '', '', 'DO18101944', ''),
(224, 'Lens', '2018-10-18', 0, 'HF5OHA-1B', '-', 'XLT18006 Crimp Mark Inspection System', NULL, 'Edmund Yuen', '', '-', '', '', '', ''),
(225, 'Lens', '2018-10-18', 0, 'HF5OHA-1B', '-', 'XLT18006 Crimp Mark Inspection System', NULL, 'Edmund Yuen', '', '-', '', '', '', ''),
(226, 'Cable', '2018-10-18', 0, 'K1200150 4.5M A DW0', '-', 'XLT18006 Crimp Mark Inspection System', NULL, 'Edmund Yuen', '', '-', '', '', 'DO18101944', ''),
(227, 'Cable', '2018-10-18', 0, 'K1200150 4.5M A DW0', '-', 'XLT18006 Crimp Mark Inspection System', NULL, 'Edmund Yuen', '', '-', '', '', 'DO18101944', ''),
(228, 'Cable', '2018-11-16', 0, 'K1200150 4.5M A DW0', '-', 'Crimp Mark System', NULL, 'Edmund Yuen', '', '-', '', '', 'DO18101944', ''),
(229, 'Lighting', '2018-10-18', 0, 'FLDR-i50B-IR24', 'F181003123', 'XLT18006 Crimp Mark Inspection System', NULL, 'Edmund Yuen', '', '-', '', '', 'DO-IVI-18026', ''),
(230, 'Lighting', '2018-10-18', 0, 'FLDR-i50B-IR24', 'F181003122', 'XLT18006 Crimp Mark Inspection System', NULL, 'Edmund Yuen', '', '-', '', '', 'DO-IVI-18026', ''),
(231, 'Others', '2018-10-18', 0, '6512', 'USB57651', 'XLT18006 Crimp Mark Inspection System', NULL, 'Edmund Yuen', '', '-', '', '', '', ''),
(232, 'Others', '2018-10-18', 0, '6512', 'USB55793', 'XLT18006 Crimp Mark Inspection System', NULL, 'Edmund Yuen', '', '-', '', '', '', ''),
(233, 'Others', '2018-08-08', 0, 'HALCON DONGLE', '9-012C4D5F', 'PRM18009', NULL, 'Renothouni', '', '-', 'Osram', 'John', '', ''),
(234, 'Others', '2018-08-08', 0, 'HALCON DONGLE', '9-5419F572', 'PRM18008 ', NULL, 'Renothouni', '', '-', 'Osram', 'John', '', ''),
(235, 'Lens', '2018-11-09', 0, 'VS-TEC0513', 'N17018148', 'PRM17019 Glass Turret OCR AutoVI System', NULL, 'Edmund Yuen', '', '-', '', '', 'DO18101945', ''),
(236, 'Lens', '2018-11-09', 0, 'VS-TEC0513', 'N17018147', 'PRM17019 Glass Turret OCR AutoVI System', NULL, 'Edmund Yuen', '', '-', '', '', 'DO18101945', ''),
(237, 'Lens', '2018-11-09', 0, 'VS-TEC0513', 'N17018146', 'PRM17019 Glass Turret OCR AutoVI System', NULL, 'Edmund Yuen', '', '-', '', '', 'DO18101945', ''),
(238, 'Others', '2018-11-09', 0, 'HALCON DONGLE', '9-6E92E6A1', 'PRM17021 OCR and 2D Vision System', NULL, 'Edmund Yuen', '', '-', '', '', '', ''),
(239, 'IPC', '2018-11-16', 0, 'K400 PLUS TV', '1812SCF00ZA9', 'SJM Final Pack System', NULL, 'Edmund Yuen', '', '-', '', '', '', ''),
(240, 'IPC', '2018-11-16', 0, 'K400 PLUS TV', '1812SCF00ZW9', 'SJM Final Pack System', NULL, 'Edmund Yuen', '', '-', '', '', '', ''),
(241, 'Lighting', '2018-11-16', 0, 'FLDU-i250X200-W', 'F180903113', 'SJM Final Pack System', NULL, 'Edmund Yuen', '', '-', '', '', 'DO-IVI-18027', ''),
(242, 'Lighting', '2018-11-16', 0, 'FLDU-i250X200-W', 'F180903114', 'SJM Final Pack System', NULL, 'Edmund Yuen', '', '-', '', '', 'DO-IVI-18027', ''),
(243, 'IPC', '2018-11-16', 0, 'SG 13', 'BS18142117SG13BQ', 'SJM Final Pack System', NULL, 'Edmund Yuen', '', '-', '', '', '00025698', ''),
(244, 'IPC', '2018-11-16', 0, 'SG 13', 'BS18142119SG13BQ', 'SJM Final Pack System', NULL, 'Edmund Yuen', '', '-', '', '', '00025698', ''),
(245, 'IPC', '2018-11-16', 0, 'M354ND', 'M354NI2E5053', 'Crimp Mark System', NULL, 'Edmund Yuen', '', '-', '', '', ' 00025509', ''),
(246, 'IPC', '2018-11-16', 0, 'FW-PCIE02', '18AAK500001', 'Crimp Mark System', NULL, 'Edmund Yuen', '', '-', '', '', 'DO18101944', ''),
(247, 'Camera', '2018-11-16', 0, 'Guppy F-033B ASG', '252381559', 'Crimp Mark System', NULL, 'Edmund Yuen', '', '-', '', '', 'DO18101944', ''),
(248, 'Controller', '2018-11-16', 0, 'PP610', '153959', 'SJM Final Pack System', NULL, 'Edmund Yuen', '', '-', '', '', 'IF13966', ''),
(249, 'Controller', '2018-11-16', 0, 'PP610', '153958', 'SJM Final Pack System', NULL, 'Edmund Yuen', '', '-', '', '', 'IF13966', ''),
(250, 'IPC', '2018-11-16', 0, 'K400 PLUS TV', '1827SCF08M59', 'Crimp Mark System', NULL, 'Edmund Yuen', '', '-', '', '', '', ''),
(282, 'IPC', '2018-12-27', 0, 'T-BC21', '-', 'PRM18019 PRISM_OSRAM_T99 RTR 3rd Opt Auto VI System', NULL, 'Edmund Yuen', '', '-', '', '', '', ''),
(283, 'IPC', '2018-12-27', 0, 'U3X4-PCIE4XE101', '179331202P1168', 'PRM18019 PRISM_OSRAM_T99 RTR 3rd Opt Auto VI System', NULL, 'Edmund Yuen', '', '-', '', '', '', ''),
(284, 'IPC', '2018-12-27', 0, 'IPC-510MB-00XBE', 'KMA3387192', 'PRM18019 PRISM_OSRAM_T99 RTR 3rd Opt Auto VI System', NULL, 'Edmund Yuen', '', '-', '', '', '', ''),
(285, 'IPC', '2018-12-27', 0, '223V5L', 'ZV0A1822017273', 'PRM18019 PRISM_OSRAM_T99 RTR 3rd Opt Auto VI System', NULL, 'Edmund Yuen', '', '-', '', '', '', ''),
(286, 'IPC', '2018-12-27', 0, 'HV-KB329', 'KB18KB329DLS0673', 'PRM18019 PRISM_OSRAM_T99 RTR 3rd Opt Auto VI System', NULL, 'Edmund Yuen', '', '-', '', '', '', ''),
(287, 'IPC', '2018-12-27', 0, 'F800P', '3200028N30000352', 'PRM18019 PRISM_OSRAM_T99 RTR 3rd Opt Auto VI System', NULL, 'Edmund Yuen', '', '-', '', '', '', ''),
(288, 'Camera', '2018-12-27', 0, 'V2505MCFBU', '0510255', 'PRM18019 PRISM_OSRAM_T99 RTR 3rd Opt Auto VI System', NULL, 'Edmund Yuen', '', '-', '', '', '', ''),
(289, 'Camera', '2018-12-27', 0, 'V2505MCFBU', '0510252', 'PRM18019 PRISM_OSRAM_T99 RTR 3rd Opt Auto VI System', NULL, 'Edmund Yuen', '', '-', '', '', '', ''),
(290, 'Camera', '2018-12-27', 0, 'V2505MCFBU', '0510254', 'PRM18019 PRISM_OSRAM_T99 RTR 3rd Opt Auto VI System', NULL, 'Edmund Yuen', '', '-', '', '', '', ''),
(291, 'Camera', '2018-12-27', 0, 'V2505MCFBU', '0510253', 'PRM18019 PRISM_OSRAM_T99 RTR 3rd Opt Auto VI System', NULL, 'Edmund Yuen', '', '-', '', '', '', ''),
(292, 'Cable', '2018-12-27', 0, 'VS-CAB-USB3XV[4]', 'MRM000548/02201841-1', 'PRM18019 PRISM_OSRAM_T99 RTR 3rd Opt Auto VI System', NULL, 'Edmund Yuen', '', '-', '', '', '', ''),
(293, 'Cable', '2018-12-27', 0, 'VS-CAB-USB3XV[4]', 'MRM000548/02201841-2', 'PRM18019 PRISM_OSRAM_T99 RTR 3rd Opt Auto VI System', NULL, 'Edmund Yuen', '', '-', '', '', '', ''),
(294, 'Cable', '2018-12-27', 0, 'VS-CAB-USB3XV[4]', 'MRM000548/02201841-3', 'PRM18019 PRISM_OSRAM_T99 RTR 3rd Opt Auto VI System', NULL, 'Edmund Yuen', '', '-', '', '', '', ''),
(295, 'Cable', '2018-12-27', 0, 'VS-CAB-USB3XV[4]', 'MRM000548/02201841-4', 'PRM18019 PRISM_OSRAM_T99 RTR 3rd Opt Auto VI System', NULL, 'Edmund Yuen', '', '-', '', '', '', ''),
(296, 'Controller', '2018-12-27', 0, 'LIC-4256N', 'F181203745', 'PRM18019 PRISM_OSRAM_T99 RTR 3rd Opt Auto VI System', NULL, 'Edmund Yuen', '', '-', '', '', '', ''),
(297, 'Controller', '2018-12-27', 0, 'LIC-4256N', 'F181203747', 'PRM18019 PRISM_OSRAM_T99 RTR 3rd Opt Auto VI System', NULL, 'Edmund Yuen', '', '-', '', '', '', ''),
(298, 'Controller', '2018-12-27', 0, 'LIC-4256N', 'F181203750', 'PRM18019 PRISM_OSRAM_T99 RTR 3rd Opt Auto VI System', NULL, 'Edmund Yuen', '', '-', '', '', '', ''),
(299, 'Controller', '2018-12-27', 0, 'LIC-4256N', 'F181203746', 'PRM18019 PRISM_OSRAM_T99 RTR 3rd Opt Auto VI System', NULL, 'Edmund Yuen', '', '-', '', '', '', ''),
(300, 'Lens', '2018-12-27', 0, 'VS-TEC0513', 'N18026439', 'PRM18019 PRISM_OSRAM_T99 RTR 3rd Opt Auto VI System', NULL, 'Edmund Yuen', '', '-', '', '', '', ''),
(301, 'Lens', '2018-12-27', 0, 'VS-TEC0513', 'N18026440', 'PRM18019 PRISM_OSRAM_T99 RTR 3rd Opt Auto VI System', NULL, 'Edmund Yuen', '', '-', '', '', '', ''),
(302, 'Lens', '2018-12-27', 0, 'VS-TEC0513', 'N18009227', 'PRM18019 PRISM_OSRAM_T99 RTR 3rd Opt Auto VI System', NULL, 'Edmund Yuen', '', '-', '', '', '', ''),
(303, 'Lens', '2018-12-27', 0, 'VS-TEC0513', 'N17018149', 'PRM18019 PRISM_OSRAM_T99 RTR 3rd Opt Auto VI System', NULL, 'Edmund Yuen', '', '-', '', '', '', ''),
(304, 'Lighting', '2018-12-27', 0, 'FFPR-i50-W', 'F181203756', 'PRM18019 PRISM_OSRAM_T99 RTR 3rd Opt Auto VI System', NULL, 'Edmund Yuen', '', '-', '', '', '', ''),
(305, 'Lighting', '2018-12-27', 0, 'FFPR-i50-W', 'F181203753', 'PRM18019 PRISM_OSRAM_T99 RTR 3rd Opt Auto VI System', NULL, 'Edmund Yuen', '', '-', '', '', '', ''),
(306, 'Lighting', '2018-12-27', 0, 'FFPR-i50-W', 'F181203755', 'PRM18019 PRISM_OSRAM_T99 RTR 3rd Opt Auto VI System', NULL, 'Edmund Yuen', '', '-', '', '', '', ''),
(307, 'Lighting', '2018-12-27', 0, 'FFPR-i50-W', 'F181203754', 'PRM18019 PRISM_OSRAM_T99 RTR 3rd Opt Auto VI System', NULL, 'Edmund Yuen', '', '-', '', '', '', ''),
(308, 'Lighting', '2018-12-27', 0, 'FLFV-Si35N-W', 'F181203759', 'PRM18019 PRISM_OSRAM_T99 RTR 3rd Opt Auto VI System', NULL, 'Edmund Yuen', '', '-', '', '', '', ''),
(309, 'Lighting', '2018-12-27', 0, 'FLFV-Si35N-W', 'F181203757', 'PRM18019 PRISM_OSRAM_T99 RTR 3rd Opt Auto VI System', NULL, 'Edmund Yuen', '', '-', '', '', '', ''),
(310, 'Lighting', '2018-12-27', 0, 'FLFV-Si35N-W', 'F181203763', 'PRM18019 PRISM_OSRAM_T99 RTR 3rd Opt Auto VI System', NULL, 'Edmund Yuen', '', '-', '', '', '', ''),
(311, 'Lighting', '2018-12-27', 0, 'FLFV-Si35N-W', 'F181203762', 'PRM18019 PRISM_OSRAM_T99 RTR 3rd Opt Auto VI System', NULL, 'Edmund Yuen', '', '-', '', '', '', ''),
(312, 'Others', '2018-12-27', 0, 'FLEXNET-ID-ALA-8626', '9-04CE9ADD', 'PRM18019 PRISM_OSRAM_T99 RTR 3rd Opt Auto VI System', NULL, 'Edmund Yuen', '', '-', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `s_id` int(11) NOT NULL,
  `s_name` varchar(200) NOT NULL,
  `s_pic` varchar(200) NOT NULL,
  `s_contact` varchar(200) NOT NULL,
  `s_status` int(11) NOT NULL,
  `s_IsRead` int(11) NOT NULL,
  `s_read` int(11) NOT NULL,
  `s_empid` int(11) NOT NULL,
  `s_emid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`s_id`, `s_name`, `s_pic`, `s_contact`, `s_status`, `s_IsRead`, `s_read`, `s_empid`, `s_emid`) VALUES
(1, 'FALCON', '-', '-', 1, 1, 0, 0, 0),
(2, 'QIOPTIQ', '-', '-', 1, 1, 0, 0, 0),
(3, 'GARDASOFT', '-', '-', 1, 1, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE `task` (
  `t_id` int(11) NOT NULL,
  `p_title` varchar(200) NOT NULL,
  `t_title` varchar(200) NOT NULL,
  `t_category` varchar(150) NOT NULL,
  `t_status` varchar(255) NOT NULL,
  `t_details` varchar(200) NOT NULL,
  `t_pic` varchar(200) NOT NULL,
  `t_startdate` date NOT NULL,
  `t_duedate` date NOT NULL,
  `t_priority` varchar(10) NOT NULL,
  `t_complete` int(11) NOT NULL,
  `t_demerit` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `task`
--

INSERT INTO `task` (`t_id`, `p_title`, `t_title`, `t_category`, `t_status`, `t_details`, `t_pic`, `t_startdate`, `t_duedate`, `t_priority`, `t_complete`, `t_demerit`) VALUES
(1, 'Jager1', 'jager1', '-', '-', '-', 'Bernard', '2019-03-01', '2019-03-08', 'High', 0, ''),
(2, 'Jager2', 'jager2', '-', '-', '-', 'Bernard', '2019-03-01', '2019-03-20', 'Medium', -1, ''),
(3, 'Jager3', 'jager3', '-', '-', '-', 'Bernard', '2019-03-01', '2019-03-20', 'Low', -2, ''),
(4, 'Jager4', 'jager4', '-', '-', '-', 'Bernard', '2019-03-01', '2019-03-25', 'Medium', -3, ''),
(5, 'Jager5', 'jager5', '-', '-', '-', 'Bernard', '2019-03-01', '2019-03-26', 'High', 1, ''),
(6, 'Jager6', 'jager6', '-', '-', '-', 'Bernard', '2019-03-01', '2019-03-15', 'Medium', -1, ''),
(7, 'Jager7', 'jager7', '-', '-', '-', 'Bernard', '2019-03-01', '2019-03-13', 'High', 0, ''),
(8, 'Jager8', 'jager8', '-', '-', '-', 'Bernard', '2019-03-01', '2019-03-22', 'High', 1, ''),
(9, 'Jager9', 'jager9', '-', '-', '-', 'Bernard', '2019-03-01', '2019-03-26', 'Medium', -2, ''),
(10, 'Jager10', 'jager10', '-', '-', '-', 'Bernard', '2019-03-01', '2019-03-26', 'Medium', 1, ''),
(11, 'Jager11', 'jager11', '-', '-', '-', 'Bernard', '2019-03-01', '2019-03-15', 'High', -1, ''),
(12, 'Jager12', 'jager12', '-', '-', '-', 'Bernard', '2019-03-01', '2019-03-26', 'Medium', -2, ''),
(13, 'Jager13', 'jager13', '-', '-', '-', 'Bernard', '2019-03-01', '2019-03-29', 'Low', -1, ''),
(14, 'Jager14', 'jager14', '-', '-', '-', 'Bernard', '2019-03-01', '2019-03-26', 'Low', -3, '');

-- --------------------------------------------------------

--
-- Table structure for table `tblcr`
--

CREATE TABLE `tblcr` (
  `id` int(11) NOT NULL,
  `crtype` varchar(3) NOT NULL,
  `year` varchar(4) NOT NULL,
  `department` varchar(110) NOT NULL,
  `typecr` varchar(15) NOT NULL,
  `priority` varchar(10) NOT NULL,
  `dateRequired` varchar(120) NOT NULL,
  `title` varchar(50) NOT NULL,
  `Description` mediumtext NOT NULL,
  `reason` mediumtext NOT NULL,
  `affecteddoc` varchar(200) NOT NULL,
  `svne` varchar(200) NOT NULL,
  `requestor` varchar(50) NOT NULL,
  `PostingDate` datetime NOT NULL,
  `AdminRemark` mediumtext NOT NULL,
  `AdminRemarkDate` varchar(120) NOT NULL,
  `Status` int(11) NOT NULL,
  `IsRead` int(1) NOT NULL,
  `vIsRead` int(1) NOT NULL,
  `empid` varchar(200) NOT NULL,
  `receiver` varchar(200) NOT NULL,
  `vreceiver` varchar(200) NOT NULL,
  `startdate` varchar(120) NOT NULL,
  `svnn` varchar(200) NOT NULL,
  `eic` varchar(50) NOT NULL,
  `emp_name` varchar(300) NOT NULL,
  `admin_name` varchar(50) NOT NULL,
  `vStatus` int(11) NOT NULL,
  `veisread` int(11) NOT NULL,
  `vdesc` varchar(500) NOT NULL,
  `assignver` varchar(200) NOT NULL,
  `asread` int(11) NOT NULL,
  `verdate` datetime NOT NULL,
  `asverdate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblcr`
--

INSERT INTO `tblcr` (`id`, `crtype`, `year`, `department`, `typecr`, `priority`, `dateRequired`, `title`, `Description`, `reason`, `affecteddoc`, `svne`, `requestor`, `PostingDate`, `AdminRemark`, `AdminRemarkDate`, `Status`, `IsRead`, `vIsRead`, `empid`, `receiver`, `vreceiver`, `startdate`, `svnn`, `eic`, `emp_name`, `admin_name`, `vStatus`, `veisread`, `vdesc`, `assignver`, `asread`, `verdate`, `asverdate`) VALUES
(1, 'D', '2018', 'Operation', 'Revise', 'Low', '2019-01-10', '2', '2', '2', '2', '', '', '2018-12-14 14:31:08', '', '', 0, 0, 0, 'E006', 'A001', '', '2018-12-18', '', '', 'Bernard Phuah', '', 0, 0, '', '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbldepartments`
--

CREATE TABLE `tbldepartments` (
  `id` int(11) NOT NULL,
  `DepartmentName` varchar(200) NOT NULL,
  `DepartmentShortName` varchar(200) NOT NULL,
  `DepartmentCode` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbldepartments`
--

INSERT INTO `tbldepartments` (`id`, `DepartmentName`, `DepartmentShortName`, `DepartmentCode`) VALUES
(1, 'Human Resource', 'HR', 'HR001'),
(2, 'Operation', 'OP', 'OP001'),
(3, 'Information Technology', 'IT', 'IT001');

-- --------------------------------------------------------

--
-- Table structure for table `tblemployees`
--

CREATE TABLE `tblemployees` (
  `id` int(11) NOT NULL,
  `EmpId` varchar(100) NOT NULL,
  `emp_username` varchar(200) NOT NULL,
  `FirstName` varchar(150) NOT NULL,
  `LastName` varchar(150) NOT NULL,
  `Emp_initial` varchar(150) NOT NULL,
  `EmailId` varchar(200) NOT NULL,
  `Password` varchar(180) NOT NULL,
  `Gender` varchar(100) NOT NULL,
  `Dob` varchar(100) NOT NULL,
  `Department` varchar(255) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `City` varchar(200) NOT NULL,
  `Country` varchar(150) NOT NULL,
  `Phonenumber` char(11) NOT NULL,
  `Status` int(1) NOT NULL,
  `RegDate` datetime NOT NULL,
  `head` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblemployees`
--

INSERT INTO `tblemployees` (`id`, `EmpId`, `emp_username`, `FirstName`, `LastName`, `Emp_initial`, `EmailId`, `Password`, `Gender`, `Dob`, `Department`, `Address`, `City`, `Country`, `Phonenumber`, `Status`, `RegDate`, `head`) VALUES
(2, 'E006', 'Bernard Phuah', 'Bernard', 'Phuah', 'Bernard', 'chiahkahhin@hotmail.com', '202cb962ac59075b964b07152d234b70', 'Male', '1 August, 1980', 'Operation', '-', '-', '-', '-', 1, '2018-08-08 13:49:26', 0),
(3, 'E007', 'Yeoh Hooi Liang', 'Hooi Liang', 'Yeoh', 'HLYeoh', 'kahhinchiah@gmail.com', '202cb962ac59075b964b07152d234b70', 'Male', '1 August, 2018', 'Operation', '-', '-', '-', '-', 1, '2018-08-08 13:51:18', 1),
(5, 'E004', 'Ling Chui Sian', 'Chui Sian', 'Ling', 'CSLing', 'kahhinchiah0707@gmail.com', '202cb962ac59075b964b07152d234b70', 'Female', '1 August, 2018', 'Operation', '-', '-', '-', '-', 1, '2018-09-26 14:43:21', 1);

-- --------------------------------------------------------

--
-- Table structure for table `temp`
--

CREATE TABLE `temp` (
  `temp_sinid` int(11) NOT NULL,
  `temp_part` varchar(200) NOT NULL,
  `temp_category` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `temp_cr`
--

CREATE TABLE `temp_cr` (
  `cr_id` int(11) NOT NULL,
  `cr_crtype` varchar(3) NOT NULL,
  `cr_year` varchar(4) NOT NULL,
  `cr_department` varchar(110) NOT NULL,
  `cr_typecr` varchar(15) NOT NULL,
  `cr_priority` varchar(10) NOT NULL,
  `cr_dateRequired` varchar(120) NOT NULL,
  `cr_startdate` varchar(120) NOT NULL,
  `cr_title` varchar(50) NOT NULL,
  `cr_Description` mediumtext NOT NULL,
  `cr_reason` mediumtext NOT NULL,
  `cr_affecteddoc` varchar(200) NOT NULL,
  `cr_svne` varchar(200) NOT NULL,
  `cr_svnn` varchar(200) NOT NULL,
  `cr_requestor` varchar(30) NOT NULL,
  `cr_eic` varchar(30) NOT NULL,
  `cr_PostingDate` datetime NOT NULL,
  `cr_AdminRemark` mediumtext NOT NULL,
  `cr_AdminRemarkDate` varchar(120) NOT NULL,
  `cr_admin_name` varchar(50) NOT NULL,
  `cr_Status` varchar(200) NOT NULL,
  `cr_emp_name` varchar(300) NOT NULL,
  `cr_vStatus` varchar(200) NOT NULL,
  `cr_vdesc` varchar(500) NOT NULL,
  `cr_verdate` datetime NOT NULL,
  `cr_vreceiver` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `temp_cr`
--

INSERT INTO `temp_cr` (`cr_id`, `cr_crtype`, `cr_year`, `cr_department`, `cr_typecr`, `cr_priority`, `cr_dateRequired`, `cr_startdate`, `cr_title`, `cr_Description`, `cr_reason`, `cr_affecteddoc`, `cr_svne`, `cr_svnn`, `cr_requestor`, `cr_eic`, `cr_PostingDate`, `cr_AdminRemark`, `cr_AdminRemarkDate`, `cr_admin_name`, `cr_Status`, `cr_emp_name`, `cr_vStatus`, `cr_vdesc`, `cr_verdate`, `cr_vreceiver`) VALUES
(1, 'D', '2018', 'Human Resource', 'Revise', 'Low', '2018-10-22', '2018-10-12', '2', '2', '2', '2', '0', '0', '', '', '2018-10-18 10:26:49', 'deded', '2018-10-18 17:21:10 ', 'Edmund Yuen', 'Approved', 'Bernard Phuah', 'Verified', 'dedeed', '2018-10-18 17:22:07', 'Law Theng Theng'),
(2, 'D', '2018', 'Human Resource', 'Revise', 'Low', '2018-10-22', '2018-10-12', 'e', 'e', 'e', '3', '0', '0', '', '', '2018-10-18 10:45:54', 'dede', '2018-10-18 10:49:24 ', 'Edmund Yuen', 'Not Approved', 'Law Theng Theng', 'Verified', 'edede', '2018-10-18 10:54:38', 'Tan Chaur Chuan'),
(3, 'D', '2018', 'Human Resource', 'Revise', 'Low', '2018-10-23', '2018-10-11', 'e', 'e', 'e', '2', '0', '0', '', '', '2018-10-18 17:30:43', 'v', '2018-10-18 17:31:27 ', 'Law Theng Theng', 'Not Approved', 'Edmund Yuen', 'Verified', '', '0000-00-00 00:00:00', 'Tan Chaur Chuan'),
(4, 'S', '2018', 'Human Resource', 'Revise', 'Low', '2018-10-24', '2018-10-11', 'e', 'ecdvf fvfvd dd', 'eeeef  vvfv rff fvfv', '0', '0', '0', 'added cfrf', 'added cfrf', '2018-10-19 10:09:20', '', '', '', 'Waiting for Approval', 'Bernard Phuah', 'Verified', '', '0000-00-00 00:00:00', 'Tan Chaur Chuan');

-- --------------------------------------------------------

--
-- Table structure for table `temp_log`
--

CREATE TABLE `temp_log` (
  `llog_id` int(11) NOT NULL,
  `llog_actionname` varchar(200) NOT NULL,
  `llog_username` varchar(200) NOT NULL,
  `laction` int(11) NOT NULL,
  `llog_date` datetime NOT NULL,
  `llog_sup` varchar(200) NOT NULL,
  `llog_cus` varchar(200) NOT NULL,
  `llog_pro` varchar(200) NOT NULL,
  `llog_par` varchar(200) NOT NULL,
  `llog_ser` varchar(200) NOT NULL,
  `llog_sam` varchar(200) NOT NULL,
  `llog_company` varchar(200) NOT NULL,
  `llog_proname` varchar(200) NOT NULL,
  `llog_do` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `chairperson`
--
ALTER TABLE `chairperson`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cust_id`);

--
-- Indexes for table `cust_r`
--
ALTER TABLE `cust_r`
  ADD PRIMARY KEY (`cus_id`);

--
-- Indexes for table `loan`
--
ALTER TABLE `loan`
  ADD PRIMARY KEY (`l_id`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `part`
--
ALTER TABLE `part`
  ADD PRIMARY KEY (`pa_id`);

--
-- Indexes for table `project1`
--
ALTER TABLE `project1`
  ADD PRIMARY KEY (`project_id`);

--
-- Indexes for table `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`t_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chairperson`
--
ALTER TABLE `chairperson`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `project1`
--
ALTER TABLE `project1`
  MODIFY `project_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `task`
--
ALTER TABLE `task`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
