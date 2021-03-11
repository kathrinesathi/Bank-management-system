-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 11, 2021 at 05:14 PM
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
  `accounttype` varchar(25) NOT NULL,
  `accountbalance` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`accno`, `customerid`, `accstatus`, `accopendate`, `accounttype`, `accountbalance`) VALUES
('211418205059', 2, 'saving', '2021-03-01', 'saving', '42000.00'),
('211418205067', 1, 'saving', '2021-03-01', 'saving', '59000.00');

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
  `accopendate` date NOT NULL,
  `lastlogin` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customerid`, `iban`, `firstname`, `lastname`, `emailid`, `password`, `transpassword`, `accstatus`, `city`, `state`, `country`, `accopendate`, `lastlogin`) VALUES
(1, 'KH12345', 'kathrine', 'sathi', 'kathrinesathi18@gmail.com', '123456', '1111', 'saving', 'chennai', 'Tamil Nadu', 'India', '2021-03-01', '2021-03-03 16:36:51'),
(2, 'KH12345', 'Hari', 'Prasad', 'hari@gmail.com', '123456', '1111', 'saving', 'chennai', 'Tamil Nadu', 'India', '2021-03-01', '2021-03-02 13:59:03');

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
(1, 'nithish', '123456', 'nithi@gmail.com', '9361112162', '2021-03-01', '2021-03-07 15:24:23');

-- --------------------------------------------------------

--
-- Table structure for table `loan`
--

CREATE TABLE `loan` (
  `loanid` int(10) NOT NULL,
  `loantype` varchar(25) NOT NULL,
  `loanamount` varchar(25) NOT NULL,
  `customerid` int(12) NOT NULL,
  `interest` float(10,2) NOT NULL,
  `startdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `loan`
--

INSERT INTO `loan` (`loanid`, `loantype`, `loanamount`, `customerid`, `interest`, `startdate`) VALUES
(1, 'car loan', '500000.00', 1, 1234.00, '2021-03-01');

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
  `payeename` varchar(25) NOT NULL,
  `accno` varchar(25) NOT NULL,
  `accounttype` varchar(25) NOT NULL,
  `iban` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `registered_payee`
--

INSERT INTO `registered_payee` (`payeename`, `accno`, `accounttype`, `iban`) VALUES
('HariPrasaad', '211418205059', 'Current', 'KH12345'),
('sooraj', '211418205059', 'Current', 'KH12345'),
('Kathrine', '211418205059', 'Savings', 'KH12345'),
('Karthi', '211418205059', 'Savings', 'KH12345'),
('vikky', '211418205059', 'Current', 'KH12345'),
('HariPrasaad', '211418205067', 'Savings', 'KH12345');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `paymentdate` datetime NOT NULL,
  `payeeid` int(11) NOT NULL,
  `receiveid` int(11) NOT NULL,
  `amount` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`paymentdate`, `payeeid`, `receiveid`, `amount`) VALUES
('2021-03-02 14:32:40', 1, 2, '2000');

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
-- Indexes for table `loan`
--
ALTER TABLE `loan`
  ADD PRIMARY KEY (`loanid`),
  ADD KEY `fk1_Loan` (`customerid`);

--
-- Indexes for table `loanpayment`
--
ALTER TABLE `loanpayment`
  ADD PRIMARY KEY (`loantype`(12));

--
-- Indexes for table `registered_payee`
--
ALTER TABLE `registered_payee`
  ADD KEY `fk1_Register_Payee` (`accno`),
  ADD KEY `fk2_Register_Payee` (`iban`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD KEY `fk1_Transactions` (`payeeid`),
  ADD KEY `fk2_Transactions` (`receiveid`);

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

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `fk1_Transactions` FOREIGN KEY (`payeeid`) REFERENCES `customers` (`customerid`),
  ADD CONSTRAINT `fk2_Transactions` FOREIGN KEY (`receiveid`) REFERENCES `customers` (`customerid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;