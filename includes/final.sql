-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 19, 2021 at 10:34 AM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `final`
--

-- --------------------------------------------------------

--
-- Table structure for table `accountmaster`
--

CREATE TABLE `accountmaster` (
  `accounttype` varchar(25) NOT NULL,
  `prefix` varchar(11) NOT NULL,
  `minbalance` decimal(12,2) NOT NULL,
  `interest` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `accno` varchar(25) NOT NULL,
  `customerid` int(10) NOT NULL,
  `accstatus` varchar(25) NOT NULL,
  `accopendate` date NOT NULL,
  `accountbalance` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`accno`, `customerid`, `accstatus`, `accopendate`, `accountbalance`) VALUES
('18106213', 1, 'Savings', '2021-03-15', '1000000.00'),
('18106214', 2, 'Savings', '2021-03-15', '500000.00'),
('18106215', 3, 'Savings', '2021-03-15', '7100000.00'),
('18106261', 4, 'Savings', '2021-03-15', '1850700.00');

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `iban` varchar(25) NOT NULL,
  `branchname` varchar(50) NOT NULL,
  `city` varchar(25) NOT NULL,
  `branchaddress` text NOT NULL,
  `state` varchar(25) NOT NULL,
  `country` varchar(25) NOT NULL,
  `pincode` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`iban`, `branchname`, `city`, `branchaddress`, `state`, `country`, `pincode`) VALUES
('KH12345', 'kodambakkam', 'chennai', 'No 55 10 th street Anbu nagar Kodambakkam', 'Tamil Nadu', 'India', 600087);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customerid` int(10) NOT NULL,
  `iban` varchar(25) NOT NULL,
  `firstname` varchar(25) NOT NULL,
  `lastname` varchar(25) NOT NULL,
  `emailid` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `transpassword` varchar(50) NOT NULL,
  `accstatus` varchar(25) NOT NULL,
  `city` varchar(25) NOT NULL,
  `state` varchar(25) NOT NULL,
  `country` varchar(25) NOT NULL,
  `accopendate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customerid`, `iban`, `firstname`, `lastname`, `emailid`, `password`, `transpassword`, `accstatus`, `city`, `state`, `country`, `accopendate`) VALUES
(1, 'KH12345', 'kathrine', 'sathi', 'kathrine@gmail.com', '123456', '1111', 'saving', 'chennai', 'Tamil Nadu', 'India', '2021-03-01'),
(2, 'KH12345', 'Hari', 'Prasaad', 'hari@gmail.com', '123456', '1111', 'saving', 'chennai', 'Tamil Nadu', 'India', '2021-03-01'),
(3, 'KH12345', 'Deva', 'raj', 'deva@gmail.com', '123456', '1111', 'current', 'chennai', 'tamilnadu', 'india', '2021-03-02'),
(4, 'KH12345', 'Rohith', ' ', 'rohit@gmail.com', '123456', '1111', 'savings', 'chennai', 'tamilnadu', 'India', '2021-03-02');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `empid` int(10) NOT NULL,
  `empname` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `emailid` varchar(30) NOT NULL,
  `contactno` varchar(30) NOT NULL,
  `createdat` date NOT NULL,
  `last_login` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`empid`, `empname`, `password`, `emailid`, `contactno`, `createdat`, `last_login`) VALUES
(1, 'Bennet ', '123456', 'bennet@gmail.com', '6369510580', '2021-03-01', '2021-03-07 15:24:23'),
(2, 'jeevi', '123456', 'jeevi@gmail.com', '7092434502', '2021-03-18', '2021-03-18 11:00:03');

-- --------------------------------------------------------

--
-- Table structure for table `fastag`
--

CREATE TABLE `fastag` (
  `fastagid` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `accno` int(25) NOT NULL,
  `emailid` varchar(100) NOT NULL,
  `dob` date NOT NULL,
  `phonenum` varchar(100) NOT NULL,
  `vehiclenum` varchar(25) NOT NULL,
  `accopendate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fastag`
--

INSERT INTO `fastag` (`fastagid`, `firstname`, `lastname`, `accno`, `emailid`, `dob`, `phonenum`, `vehiclenum`, `accopendate`) VALUES
(1, 'hari', 'prasaad', 2021001, 'hari@gmail.com', '2001-01-10', '7092434502', 'TN50H5412', '2021-03-19'),
(2, 'kathrine', 'sathi', 2021002, 'kathrine@gmail.com', '2001-06-02', '8110894502', 'TN12K2875', '2021-03-19');

-- --------------------------------------------------------

--
-- Table structure for table `loan`
--

CREATE TABLE `loan` (
  `loanid` int(11) NOT NULL,
  `accno` varchar(200) NOT NULL,
  `loantype` varchar(25) NOT NULL,
  `loanamount` float(10,2) NOT NULL,
  `customerid` int(12) NOT NULL,
  `interest` float(10,2) NOT NULL,
  `startdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `loan`
--

INSERT INTO `loan` (`loanid`, `accno`, `loantype`, `loanamount`, `customerid`, `interest`, `startdate`) VALUES
(1, '18106213', 'car loan', 300000.00, 1, 1234.00, '2021-03-01'),
(2, '18106214', 'Education loan', 300000.00, 2, 1000.00, '2021-03-01'),
(3, '18106215', 'house loan', 700000.00, 3, 2312.00, '2021-03-18'),
(4, '18106213', 'personal loan', 500000.00, 1, 2084.00, '2021-03-18');

-- --------------------------------------------------------

--
-- Table structure for table `loanpayment`
--

CREATE TABLE `loanpayment` (
  `loantype` varchar(20) NOT NULL,
  `amount` int(20) NOT NULL,
  `from_acc` int(20) NOT NULL,
  `payment_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `loanpayment`
--

INSERT INTO `loanpayment` (`loantype`, `amount`, `from_acc`, `payment_date`) VALUES
('personal loan', 50000, 18106213, '2021-03-18'),
('personal loan', 50000, 18106213, '2021-03-18'),
('car loan', 100000, 18106213, '2021-03-18'),
('car loan', 100000, 18106213, '2021-03-18');

-- --------------------------------------------------------

--
-- Table structure for table `loantype`
--

CREATE TABLE `loantype` (
  `loantype` varchar(25) NOT NULL,
  `prefix` varchar(25) NOT NULL,
  `maximumamount` float(10,2) NOT NULL,
  `minimumamount` float(10,2) NOT NULL,
  `interest` float(10,2) NOT NULL,
  `status` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `loantype`
--

INSERT INTO `loantype` (`loantype`, `prefix`, `maximumamount`, `minimumamount`, `interest`, `status`) VALUES
('car loan', 'a car loan', 700000.00, 100000.00, 1234.00, 'loan');

-- --------------------------------------------------------

--
-- Table structure for table `registered_payee`
--

CREATE TABLE `registered_payee` (
  `owner_no` varchar(25) NOT NULL,
  `payeename` varchar(25) NOT NULL,
  `accno` varchar(25) NOT NULL,
  `accounttype` varchar(25) NOT NULL,
  `iban` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `registered_payee`
--

INSERT INTO `registered_payee` (`owner_no`, `payeename`, `accno`, `accounttype`, `iban`) VALUES
('18106213', 'rohit', '18106261', 'Current', 'KH12345');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `payeeid` varchar(200) NOT NULL,
  `paymentdate` date NOT NULL,
  `receiveid` varchar(200) NOT NULL,
  `amount` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`payeeid`, `paymentdate`, `receiveid`, `amount`) VALUES
('2', '2021-03-01', '3', 2000),
('2', '2021-03-02', '4', 5000),
('2147483647', '2021-03-14', '2147483647', 2000),
('2147483647', '2021-03-14', '2147483647', 2000),
('2147483647', '2021-03-14', '2147483647', 4000),
('2147483647', '2021-03-14', '2147483647', 4000),
('2147483647', '2021-03-14', '2147483647', 4000),
('2147483647', '2021-03-14', '2147483647', 4000),
('2147483647', '2021-03-14', '2147483647', 4000),
('211418205059', '2021-03-14', '211418205049', 4000),
('2', '2021-03-14', '211418205067', 5000),
('2', '2021-03-14', '211418205067', 5000),
('2', '2021-03-14', '211418205049', 5000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accountmaster`
--
ALTER TABLE `accountmaster`
  ADD PRIMARY KEY (`accounttype`);

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`accno`),
  ADD KEY `fk1_Accounts` (`customerid`);

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`iban`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customerid`),
  ADD KEY `fk1_Customer` (`iban`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`empid`);

--
-- Indexes for table `fastag`
--
ALTER TABLE `fastag`
  ADD PRIMARY KEY (`fastagid`);

--
-- Indexes for table `loan`
--
ALTER TABLE `loan`
  ADD PRIMARY KEY (`loanid`),
  ADD KEY `fk1_Loan` (`customerid`);

--
-- Indexes for table `registered_payee`
--
ALTER TABLE `registered_payee`
  ADD KEY `fk1_Register_Payee` (`accno`),
  ADD KEY `fk2_Register_Payee` (`iban`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `loan`
--
ALTER TABLE `loan`
  MODIFY `loanid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `accounts`
--
ALTER TABLE `accounts`
  ADD CONSTRAINT `fk1_Accounts` FOREIGN KEY (`customerid`) REFERENCES `customers` (`customerid`);

--
-- Constraints for table `customers`
--
ALTER TABLE `customers`
  ADD CONSTRAINT `fk1_Customer` FOREIGN KEY (`iban`) REFERENCES `branch` (`iban`);

--
-- Constraints for table `loan`
--
ALTER TABLE `loan`
  ADD CONSTRAINT `fk1_Loan` FOREIGN KEY (`customerid`) REFERENCES `customers` (`customerid`);

--
-- Constraints for table `registered_payee`
--
ALTER TABLE `registered_payee`
  ADD CONSTRAINT `fk1_Register_Payee` FOREIGN KEY (`accno`) REFERENCES `accounts` (`accno`),
  ADD CONSTRAINT `fk2_Register_Payee` FOREIGN KEY (`iban`) REFERENCES `branch` (`iban`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
