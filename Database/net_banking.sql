-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 05, 2020 at 05:29 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `net_banking`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `uname` char(25) DEFAULT NULL,
  `pwd` char(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `uname`, `pwd`) VALUES
(1, 'admin', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `beneficiary2`
--

CREATE TABLE `beneficiary2` (
  `benef_id` int(11) NOT NULL,
  `benef_cust_id` int(11) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `phone_no` varchar(20) DEFAULT NULL,
  `account_no` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `beneficiary2`
--

INSERT INTO `beneficiary2` (`benef_id`, `benef_cust_id`, `email`, `phone_no`, `account_no`) VALUES
(1, 1, 'joey@gmail.com', '984141', 12345678),
(2, 3, 'ross@gmail.com', '98989898', 11223344);

-- --------------------------------------------------------

--
-- Table structure for table `beneficiary4`
--

CREATE TABLE `beneficiary4` (
  `benef_id` int(11) NOT NULL,
  `benef_cust_id` int(11) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `phone_no` varchar(20) DEFAULT NULL,
  `account_no` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `beneficiary4`
--

INSERT INTO `beneficiary4` (`benef_id`, `benef_cust_id`, `email`, `phone_no`, `account_no`) VALUES
(1, 5, 'suraj.dandwani@rocketmail.com', '0987654312', 2147483647);

-- --------------------------------------------------------

--
-- Table structure for table `beneficiary5`
--

CREATE TABLE `beneficiary5` (
  `benef_id` int(11) NOT NULL,
  `benef_cust_id` int(11) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `phone_no` varchar(20) DEFAULT NULL,
  `account_no` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `beneficiary5`
--

INSERT INTO `beneficiary5` (`benef_id`, `benef_cust_id`, `email`, `phone_no`, `account_no`) VALUES
(1, 4, 'lakshya@darteweb.in', '070 1494 9546', 1234567890);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cust_id` int(11) NOT NULL,
  `first_name` varchar(30) DEFAULT NULL,
  `last_name` varchar(30) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `aadhar_no` int(11) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `phone_no` varchar(20) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `branch` varchar(30) DEFAULT NULL,
  `account_no` int(11) DEFAULT NULL,
  `pin` int(4) DEFAULT NULL,
  `uname` varchar(30) DEFAULT NULL,
  `pwd` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cust_id`, `first_name`, `last_name`, `gender`, `dob`, `aadhar_no`, `email`, `phone_no`, `address`, `branch`, `account_no`, `pin`, `uname`, `pwd`) VALUES
(2, 'Vishal', 'yadav', 'female', '1985-12-28', 5555, 'racheal@gmail.com', '9841414', 'Central Perk', 'newyork', 112233, 1234, 'vishal', 'password'),
(4, 'Lakshya', 'choudhary', 'male', '1998-05-24', 1234567890, 'lakshya@darteweb.in', '070 1494 9546', 'S4/16, near FCI college sector14,udaipur,rajasthan\r\nVip colony,', 'delhi', 1234567890, 1234, 'lakshya2413', 'lakshya1234'),
(5, 'Suraj', 'Dandwani', 'male', '1998-11-28', 987654321, 'suraj.dandwani@rocketmail.com', '0987654312', 'Near Kanda House Sector-14', 'delhi', 2147483647, 4321, 'suraj123', 'suraj123');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(40) DEFAULT NULL,
  `created` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `created`) VALUES
(1, 'Hello World !', '2017-09-06 15:45:25'),
(2, 'The First News !', '2017-09-06 15:45:55'),
(3, 'Increasing Interest Rates !', '2017-09-06 15:46:21'),
(4, 'GST on banking', '2017-11-19 16:39:35'),
(5, 'RBI allows PMC Bank customers to withdra', '2019-09-27 21:07:12'),
(6, 'New Post', '2019-09-28 13:35:58'),
(7, 'New bank account Openings', '2020-06-03 13:10:15'),
(8, 'Welcome To Student Bank from Inida', '2020-06-05 15:42:35'),
(9, 'Welcome To Student Bank from Inida', '2020-06-05 15:44:29'),
(10, 'Welcome To Student Bank from Inida', '2020-06-05 15:45:22'),
(11, 'New Upcoming Interest Rate Loans', '2020-06-05 20:55:11');

-- --------------------------------------------------------

--
-- Table structure for table `news_body`
--

CREATE TABLE `news_body` (
  `id` int(10) UNSIGNED NOT NULL,
  `body` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news_body`
--

INSERT INTO `news_body` (`id`, `body`) VALUES
(1, '\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\"'),
(2, 'What is Lorem Ipsum? Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. Why do we use it? It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like). Where does it come from? Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32. The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham. Where can I get some? There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.'),
(3, 'This is to inform that as of today interest rates will increase by 4.6% on loans and decrease by 5.8% on deposits. Effective immediately. '),
(4, 'This is to inform that GST shall be applied on all usages of :\r\n1. Credit Cards\r\n2. Debit Cards\r\n3. Internet Banking\r\nat a nominal (nationally applied) rate of 18%.\r\n'),
(5, 'Mumbai: The Reserve Bank of India (RBI) has eased the restrictions on depositors of Punjab & Maharashtra Cooperative Bank (PMC Bank), two days after it put a Rs 1,000 cap on the money a saver could withdraw, triggering protests.\r\n\r\nA depositor in the Mumbaibased bank can withdraw up to Rs 10,000, the RBI said in a press release on Thursday.\r\n\r\nThis will allow more than 60% of the depositors withdraw their entire account balance, according to the central bankâ€™s calculation.\r\n\r\nThe Rs 1,000 cap was set on September 24. The RBI said it hiked the limit after an initial assessment of the bankâ€™s liquidity position by an administrator appointed by it.\r\n\r\nThe RBI said it had identified â€œmajor financial irregularities, failure of internal control and systems of the bank and wrong/under-reporting of its exposures under various off-site surveillanceâ€ that it conducted.'),
(6, 'Write the content here!'),
(7, 'New Bank Openings Starting from 21 july 2020.'),
(8, 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).'),
(9, 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).'),
(10, 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).'),
(11, 'Best Rate for interest for loan');

-- --------------------------------------------------------

--
-- Table structure for table `passbook2`
--

CREATE TABLE `passbook2` (
  `trans_id` int(11) NOT NULL,
  `trans_date` datetime DEFAULT NULL,
  `remarks` varchar(255) DEFAULT NULL,
  `debit` int(11) DEFAULT NULL,
  `credit` int(11) DEFAULT NULL,
  `balance` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `passbook2`
--

INSERT INTO `passbook2` (`trans_id`, `trans_date`, `remarks`, `debit`, `credit`, `balance`) VALUES
(1, '2019-09-27 21:05:28', 'Opening Balance', 0, 150000, 150000),
(2, '2019-09-27 21:09:38', 'Sent to: Joey Tribbiani, AC/No: 12345678', 10000, 0, 140000),
(3, '2019-09-28 13:37:08', 'Sent to: Joey Tribbiani, AC/No: 12345678', 50000, 0, 90000),
(4, '2019-09-28 13:37:25', 'Cash to Self', 10000, 0, 80000);

-- --------------------------------------------------------

--
-- Table structure for table `passbook4`
--

CREATE TABLE `passbook4` (
  `trans_id` int(11) NOT NULL,
  `trans_date` datetime DEFAULT NULL,
  `remarks` varchar(255) DEFAULT NULL,
  `debit` int(11) DEFAULT NULL,
  `credit` int(11) DEFAULT NULL,
  `balance` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `passbook4`
--

INSERT INTO `passbook4` (`trans_id`, `trans_date`, `remarks`, `debit`, `credit`, `balance`) VALUES
(1, '2020-06-03 12:29:38', 'Opening Balance', 0, 90, 90),
(2, '2020-06-03 13:01:35', 'Received from: Suraj Dandwani, AC/No: 2147483647', 0, 10, 100),
(3, '2020-06-03 13:03:28', 'Cash to Self', 10, 0, 90),
(4, '2020-06-03 13:04:49', 'Cash Deposit', 0, 10000, 10090),
(5, '2020-06-03 18:09:22', 'Sent to: Suraj Dandwani, AC/No: 2147483647', 3000, 0, 7090),
(6, '2020-06-05 14:25:13', 'Cash to Self', 4000, 0, 3090),
(7, '2020-06-05 14:25:46', 'Cash Deposit', 0, 20000, 23090),
(8, '2020-06-05 16:57:27', 'Sent to: Suraj Dandwani, AC/No: 2147483647', 10000, 0, 13090),
(9, '2020-06-05 20:57:28', 'Sent to: Suraj Dandwani, AC/No: 2147483647', 2000, 0, 11090);

-- --------------------------------------------------------

--
-- Table structure for table `passbook5`
--

CREATE TABLE `passbook5` (
  `trans_id` int(11) NOT NULL,
  `trans_date` datetime DEFAULT NULL,
  `remarks` varchar(255) DEFAULT NULL,
  `debit` int(11) DEFAULT NULL,
  `credit` int(11) DEFAULT NULL,
  `balance` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `passbook5`
--

INSERT INTO `passbook5` (`trans_id`, `trans_date`, `remarks`, `debit`, `credit`, `balance`) VALUES
(1, '2020-06-03 12:46:15', 'Opening Balance', 0, 90, 90),
(2, '2020-06-03 13:01:34', 'Sent to: Lakshya choudhary, AC/No: 1234567890', 10, 0, 80),
(3, '2020-06-03 18:09:22', 'Received from: Lakshya choudhary, AC/No: 1234567890', 0, 3000, 3080),
(4, '2020-06-05 16:57:27', 'Received from: Lakshya choudhary, AC/No: 1234567890', 0, 10000, 13080),
(5, '2020-06-05 20:57:28', 'Received from: Lakshya choudhary, AC/No: 1234567890', 0, 2000, 15080);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `beneficiary2`
--
ALTER TABLE `beneficiary2`
  ADD PRIMARY KEY (`benef_id`),
  ADD UNIQUE KEY `benef_cust_id` (`benef_cust_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phone_no` (`phone_no`),
  ADD UNIQUE KEY `account_no` (`account_no`);

--
-- Indexes for table `beneficiary4`
--
ALTER TABLE `beneficiary4`
  ADD PRIMARY KEY (`benef_id`),
  ADD UNIQUE KEY `benef_cust_id` (`benef_cust_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phone_no` (`phone_no`),
  ADD UNIQUE KEY `account_no` (`account_no`);

--
-- Indexes for table `beneficiary5`
--
ALTER TABLE `beneficiary5`
  ADD PRIMARY KEY (`benef_id`),
  ADD UNIQUE KEY `benef_cust_id` (`benef_cust_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phone_no` (`phone_no`),
  ADD UNIQUE KEY `account_no` (`account_no`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cust_id`),
  ADD UNIQUE KEY `aadhar_no` (`aadhar_no`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phone_no` (`phone_no`),
  ADD UNIQUE KEY `account_no` (`account_no`),
  ADD UNIQUE KEY `uname` (`uname`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news_body`
--
ALTER TABLE `news_body`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `passbook2`
--
ALTER TABLE `passbook2`
  ADD PRIMARY KEY (`trans_id`);

--
-- Indexes for table `passbook4`
--
ALTER TABLE `passbook4`
  ADD PRIMARY KEY (`trans_id`);

--
-- Indexes for table `passbook5`
--
ALTER TABLE `passbook5`
  ADD PRIMARY KEY (`trans_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `beneficiary2`
--
ALTER TABLE `beneficiary2`
  MODIFY `benef_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `beneficiary4`
--
ALTER TABLE `beneficiary4`
  MODIFY `benef_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `beneficiary5`
--
ALTER TABLE `beneficiary5`
  MODIFY `benef_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cust_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `news_body`
--
ALTER TABLE `news_body`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `passbook2`
--
ALTER TABLE `passbook2`
  MODIFY `trans_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `passbook4`
--
ALTER TABLE `passbook4`
  MODIFY `trans_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `passbook5`
--
ALTER TABLE `passbook5`
  MODIFY `trans_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
