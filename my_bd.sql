-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 26, 2024 at 02:25 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `my_bd`
--

-- --------------------------------------------------------

--
-- Table structure for table `contactadmin`
--

CREATE TABLE `contactadmin` (
  `id_ct` int(3) UNSIGNED ZEROFILL NOT NULL COMMENT 'ลำดับการติดต่อ',
  `id_member` int(11) NOT NULL,
  `name_ct` varchar(50) NOT NULL COMMENT 'ชื่อผู้ติดต่อ',
  `dept_ct` varchar(100) NOT NULL COMMENT 'แผนกผู้ติดต่อ',
  `topic_ct` varchar(100) NOT NULL COMMENT 'หัวข้อที่ติดต่อ',
  `detail_ct` varchar(100) NOT NULL COMMENT 'รายละเอียดที่ติดต่อ',
  `status_ct` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contactadmin`
--

INSERT INTO `contactadmin` (`id_ct`, `id_member`, `name_ct`, `dept_ct`, `topic_ct`, `detail_ct`, `status_ct`) VALUES
(001, 1, '', '', '', '', '1'),
(002, 3, 'ตะวันภูมิ  อู่พันธ์', 'กราฟิก', 'ไม่เข้าใจงาน', 'ไม่มีเอกสาร', '0');

-- --------------------------------------------------------

--
-- Table structure for table `document`
--

CREATE TABLE `document` (
  `doc_id` int(10) NOT NULL COMMENT 'รหัสเอกสาร',
  `doc_topic` varchar(255) NOT NULL COMMENT 'หัวข้อเอกสาร',
  `doc_nameplot` varchar(50) NOT NULL COMMENT 'ชื่อผู้เขียน',
  `doc_detail` text NOT NULL COMMENT 'รายละเอียดเอกสาร',
  `doc_file` tinytext NOT NULL COMMENT 'ไฟลืเอกสาร',
  `delete_doc` varchar(2) NOT NULL COMMENT '0 = โหลดได้ 1  = ลบแล้ว'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `document`
--

INSERT INTO `document` (`doc_id`, `doc_topic`, `doc_nameplot`, `doc_detail`, `doc_file`, `delete_doc`) VALUES
(1, '001', 'นายณัฐวุฒิ แดนชล', 'การออกแบบและพัฒนาเว็บต์-เอกสารประกอบการสอน', 'การออกแบบและพัฒนาเว็บต์-เอกสารประกอบการส.pdf', '0');

-- --------------------------------------------------------

--
-- Table structure for table `download_doc`
--

CREATE TABLE `download_doc` (
  `dow_id` int(10) NOT NULL COMMENT 'รหัสดาวน์โหลด',
  `doc_id` int(10) NOT NULL COMMENT 'รหัสเอกสาร',
  `id_member` int(10) NOT NULL COMMENT 'รหัสสมาชิก',
  `dow_date` date NOT NULL COMMENT 'วันที่ดาวน์โหลด'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id_member` int(11) NOT NULL COMMENT 'ไอดีสมาชิก',
  `name` varchar(255) NOT NULL COMMENT 'ชื่อ',
  `lastname` varchar(255) NOT NULL COMMENT 'นามสกุล',
  `phone` int(10) NOT NULL COMMENT 'โทรศัพท์',
  `username` varchar(255) NOT NULL,
  `m_password` int(255) NOT NULL,
  `status` varchar(1) NOT NULL COMMENT '0=user 1=admin'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id_member`, `name`, `lastname`, `phone`, `username`, `m_password`, `status`) VALUES
(1, 'ณัฐวุฒิ', 'แดยชล', 928811235, 'admin', 123, '1'),
(2, 'ธนวรรธ', 'เพ่งผล', 990252233, 'admin1', 123, '1'),
(3, 'ตะวันภูมิ', 'อู่พันธ์', 82678655, 'User', 123, '0');

-- --------------------------------------------------------

--
-- Table structure for table `topic`
--

CREATE TABLE `topic` (
  `topic_id` int(3) UNSIGNED ZEROFILL NOT NULL,
  `topic_name` varchar(50) NOT NULL,
  `topic_detail` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `topic`
--

INSERT INTO `topic` (`topic_id`, `topic_name`, `topic_detail`) VALUES
(001, 'การสร้างเว็บ', 'การออกแบบและพัฒนาเว็บต์-เอกสารประกอบการสอน');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contactadmin`
--
ALTER TABLE `contactadmin`
  ADD PRIMARY KEY (`id_ct`);

--
-- Indexes for table `document`
--
ALTER TABLE `document`
  ADD PRIMARY KEY (`doc_id`);

--
-- Indexes for table `download_doc`
--
ALTER TABLE `download_doc`
  ADD PRIMARY KEY (`dow_id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id_member`);

--
-- Indexes for table `topic`
--
ALTER TABLE `topic`
  ADD PRIMARY KEY (`topic_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contactadmin`
--
ALTER TABLE `contactadmin`
  MODIFY `id_ct` int(3) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT COMMENT 'ลำดับการติดต่อ', AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `document`
--
ALTER TABLE `document`
  MODIFY `doc_id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'รหัสเอกสาร', AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `download_doc`
--
ALTER TABLE `download_doc`
  MODIFY `dow_id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'รหัสดาวน์โหลด';

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id_member` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ไอดีสมาชิก', AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `topic`
--
ALTER TABLE `topic`
  MODIFY `topic_id` int(3) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
