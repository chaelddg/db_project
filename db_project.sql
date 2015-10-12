-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 12, 2015 at 10:54 AM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `CUSTOMERS`
--

CREATE TABLE IF NOT EXISTS `CUSTOMERS` (
  `CustNo` int(11) NOT NULL,
  `CustCompanyName` varchar(50) NOT NULL,
  `ContactPerson` varchar(50) NOT NULL,
  `CustAddr` varchar(255) NOT NULL,
  `CustPhoneNo` varchar(50) NOT NULL,
  `CustEmail` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `CUSTOMERS`
--

INSERT INTO `CUSTOMERS` (`CustNo`, `CustCompanyName`, `ContactPerson`, `CustAddr`, `CustPhoneNo`, `CustEmail`) VALUES
(1, 'DROPBOX CEBU', 'C/O MAM JASMIN DIANO KFC', '15-C QUEENS ROAD,REDEMTORIST,CEBU CITY', '09178899302', ''),
(2, 'MY JOY', 'C/O MAM VIVIAN', 'OSMENA BOULEVARD,CEBU CITY', '(032)254-3166', ''),
(3, 'METRO BANK CEBU', 'PETER KO', 'MINGANILLIA, CEBU', '09178899345', ''),
(4, 'MULTICO PRIME POWER,INC', 'JONATHAN G. LLEMOS /MEL T. HERNANDEZ', '7797 ST.PAUL ROAD ,SAN ANTONIO VILLAGE ,MAKATI CITY,1203 PHILIPPINES', '(632)8972357', ''),
(5, 'FLYING V', 'C/O MAM ROWENA BUETA', 'WHITE GOLD COMPOUND,A.SORIANO OFFICE,NORTH RECLAMATION AREA,CEBU CITY ', '(032)232-5250', 'rowena.bueta@flyingv.com.ph'),
(6, 'BEST BUY MART', 'C/O MAM NILA', 'OSMENA BOULEVARD,CEBU CITY', '(032)416-8717', ''),
(7, 'GLOBAL CEBU FOODS', 'MAM STELLA SASAN', 'MEPZ ii, LAPU-LAPU CITY, CEBU', '406-0044', ''),
(8, 'KFC', 'C/O MAM JASMIN DIANO', 'JANETE COMPOUND,OPAO,MANDAUE CITY,CEBU', '09178899302', ''),
(9, 'CATTLEYA', 'MAM CATTY AVANZADO', 'PAJO,LAPU-LAPU CITY,CEBU', '09345678922', ''),
(10, '', 'KARDO FERSOSO', 'VILLA TERESA VILLAGE, TALISAY CITY ,CEBU', '09178902345', ''),
(11, 'ISLANDER INC.', 'EDWIN WONG', 'MINGLANILLA , CEBU', '(032) 890-1234', ''),
(12, 'STK ', 'BOBBY TAN', 'BASAK , MANDAUE CITY, CEBU', '(032)345-7890', 'bobby.tan@stk.com');

-- --------------------------------------------------------

--
-- Table structure for table `EMPLOYEES`
--

CREATE TABLE IF NOT EXISTS `EMPLOYEES` (
  `EmpNo` int(11) NOT NULL,
  `EmpName` varchar(50) NOT NULL,
  `EmPosition` varchar(50) NOT NULL,
  `EmPhoneNo` varchar(13) NOT NULL,
  `EmpEmail` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `EMPLOYEES`
--

INSERT INTO `EMPLOYEES` (`EmpNo`, `EmpName`, `EmPosition`, `EmPhoneNo`, `EmpEmail`) VALUES
(1, 'YOLANDO DOLLOSO', 'OPERATION-IN-CHARGE', '09226301920', 'ygd.lra@gmail.co'),
(2, 'KIM DOLLOSO', 'ADMIN ASSISTANT', '09324567822', 'kim.dolloso@gmail.com'),
(3, 'DARYLE BUGOY', 'TECHNICIAN', '0933221237', 'bugoydyl@gmail.com'),
(4, 'JAYLORD TAMBOBOY', 'TECHNICIAN', '09435678987', ''),
(5, 'JUFEL DELOY', 'TECHNICIAN', '0919345672', '');

-- --------------------------------------------------------

--
-- Table structure for table `INVOICED_PRODUCTS`
--

CREATE TABLE IF NOT EXISTS `INVOICED_PRODUCTS` (
  `InProNo` int(11) NOT NULL,
  `InProDate` date NOT NULL,
  `InProAmount` double NOT NULL,
  `Qty` int(11) NOT NULL,
  `ProductNo` int(11) NOT NULL,
  `InvoiceNo` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `INVOICED_PRODUCTS`
--

INSERT INTO `INVOICED_PRODUCTS` (`InProNo`, `InProDate`, `InProAmount`, `Qty`, `ProductNo`, `InvoiceNo`) VALUES
(1, '2015-10-02', 53700, 1, 2, 8);

-- --------------------------------------------------------

--
-- Table structure for table `INVOICES`
--

CREATE TABLE IF NOT EXISTS `INVOICES` (
  `InvoiceNo` int(11) NOT NULL,
  `InvoiceDate` date NOT NULL,
  `InvoiceDesc` varchar(50) NOT NULL,
  `TotalDue` double NOT NULL,
  `BalanceAmt` double NOT NULL,
  `Discount` double NOT NULL,
  `CustNo` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `INVOICES`
--

INSERT INTO `INVOICES` (`InvoiceNo`, `InvoiceDate`, `InvoiceDesc`, `TotalDue`, `BalanceAmt`, `Discount`, `CustNo`) VALUES
(1, '2015-09-10', 'AIRCON CLEANING', 2400, 2400, 0, 1),
(2, '2015-09-10', 'AIRCON CLEANING ,CHECKUP', 1150, 1150, 0, 2),
(3, '2015-09-05', 'AIRCON REPAIR', 3900, 3900, 0, 3),
(4, '2015-05-08', 'AIRCON CLEANING', 2250, 2250, 0, 5),
(6, '2015-07-09', 'AIRCON INSTALLATION', 56645, 56645, 0, 4),
(7, '2015-10-09', 'AIRCON CLEANING', 900, 900, 0, 6),
(8, '2015-10-02', 'SOLD AIRCON', 53700, 53700, 0, 8),
(9, '2015-10-09', 'Aircon checkup', 350, 350, 0, 9),
(10, '2015-10-06', 'AIRCON CLEANING', 1200, 1200, 0, 10),
(11, '2015-10-14', 'AIRCON CLEANING', 750, 750, 0, 11),
(12, '2015-10-10', 'AIRCON CHECK-UP WITH REPAIR', 550, 550, 0, 12);

-- --------------------------------------------------------

--
-- Table structure for table `JOB_ORDERS`
--

CREATE TABLE IF NOT EXISTS `JOB_ORDERS` (
  `jobNO` int(11) NOT NULL,
  `JobLocation` varchar(50) NOT NULL,
  `JobStrDate` date NOT NULL,
  `JobEnDate` date NOT NULL,
  `Defects` varchar(100) NOT NULL,
  `Qty` int(11) NOT NULL,
  `UnitPrice` double NOT NULL,
  `Amount` double NOT NULL,
  `EmpNo` int(11) NOT NULL,
  `ServiceNo` int(11) NOT NULL,
  `InvoiceNo` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `JOB_ORDERS`
--

INSERT INTO `JOB_ORDERS` (`jobNO`, `JobLocation`, `JobStrDate`, `JobEnDate`, `Defects`, `Qty`, `UnitPrice`, `Amount`, `EmpNo`, `ServiceNo`, `InvoiceNo`) VALUES
(1, 'CONFERENCE ROOM', '2015-09-22', '2015-10-22', '', 2, 750, 750, 2, 2, 3),
(2, 'CONFERENCE ROOM', '2015-09-22', '2015-10-22', '', 1, 900, 900, 2, 4, 1),
(3, 'FLOOR AREA/STACK ROOM ', '2015-04-07', '2015-04-07', '', 2, 750, 1500, 2, 8, 4),
(4, 'FIRST FLOOR', '2015-05-08', '2015-05-08', '', 3, 750, 0, 3, 9, 4),
(5, 'MAIN OFFICE', '2015-10-12', '2015-10-12', '', 1, 550, 550, 2, 2, 2),
(6, 'MAIN OFFICE', '2015-10-12', '2015-10-12', '', 1, 800, 800, 5, 5, 2);

-- --------------------------------------------------------

--
-- Table structure for table `PAYMENTS`
--

CREATE TABLE IF NOT EXISTS `PAYMENTS` (
  `PaymentNo` int(11) NOT NULL,
  `PaymentDate` date NOT NULL,
  `ModeOfPayment` varchar(25) DEFAULT NULL,
  `PAmount` double NOT NULL,
  `InvoiceNo` int(11) NOT NULL,
  `EmpNo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `PRODUCTS`
--

CREATE TABLE IF NOT EXISTS `PRODUCTS` (
  `ProductNo` int(11) NOT NULL,
  `ProductBrand` varchar(25) NOT NULL,
  `ProductSerialNo` varchar(50) NOT NULL,
  `ProductDesc` varchar(50) NOT NULL,
  `ProductModel` varchar(25) NOT NULL,
  `ProductPrice` double NOT NULL,
  `ProductQty` int(11) NOT NULL,
  `Reorderpoint` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `PRODUCTS`
--

INSERT INTO `PRODUCTS` (`ProductNo`, `ProductBrand`, `ProductSerialNo`, `ProductDesc`, `ProductModel`, `ProductPrice`, `ProductQty`, `Reorderpoint`) VALUES
(1, 'CARRIER', '7893456782', 'INVERTER TYPE', 'INDOOR:FI60PUM', 53700, 2, '1'),
(2, 'DAIKIN', '7893456782', 'INVERTER TYPE', 'INDOOR:FI60PUM', 53700, 2, '1');

-- --------------------------------------------------------

--
-- Table structure for table `SERVICES`
--

CREATE TABLE IF NOT EXISTS `SERVICES` (
  `ServiceNo` int(11) NOT NULL,
  `ServiceDesc` varchar(100) NOT NULL,
  `ServicePrice` double NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `SERVICES`
--

INSERT INTO `SERVICES` (`ServiceNo`, `ServiceDesc`, `ServicePrice`) VALUES
(2, 'Checkup', 350),
(3, 'Labor', 450),
(4, 'Checkup with repair', 550),
(5, 'Cleaning split type aircon', 800),
(6, 'Cleaning window type aircon', 400),
(7, 'Cleaning floor mounted aircon', 1200),
(8, 'Cleaning Ceiling mounted type aircon', 1200),
(9, 'Cleaning Hi-Wall type aircon', 750),
(10, 'Install split type aircon', 7500),
(11, 'Install window type aircon', 1500),
(12, 'Install floor mounted aircon', 9500),
(13, 'Install ceiling mounted type aircon', 12500),
(14, 'Install Hi-Wall type aircon', 7500),
(15, 'System Repair Window type aircon', 2800),
(16, 'System repair split type aircon ', 4500),
(17, 'System Repair Floor mounted type aircon', 4500),
(18, 'System Repair Ceiling Mounted type aircon ', 4500),
(19, 'System Repair HI-wall type aircon', 4500);

-- --------------------------------------------------------

--
-- Table structure for table `SUPPLIERS`
--

CREATE TABLE IF NOT EXISTS `SUPPLIERS` (
  `SupplierNo` int(11) NOT NULL,
  `SupplierCompanyName` varchar(50) NOT NULL,
  `SupplierContactPerson` varchar(25) NOT NULL,
  `SupplierEmail` varchar(25) NOT NULL,
  `SupplierPhoneNo` int(13) NOT NULL,
  `SupplierAddr` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `SUPPLY_PRODUCTS`
--

CREATE TABLE IF NOT EXISTS `SUPPLY_PRODUCTS` (
  `SuppProNo` int(11) NOT NULL,
  `SupplyDeliveryDate` date NOT NULL,
  `SupplyPODate` date NOT NULL,
  `QtySupplied` int(11) NOT NULL,
  `ProductNo` int(11) NOT NULL,
  `SupplierNo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `USERS`
--

CREATE TABLE IF NOT EXISTS `USERS` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `USERS`
--

INSERT INTO `USERS` (`id`, `username`, `password`, `firstname`, `lastname`) VALUES
(1, 'admin', 'admin123', 'Jolly Ann', 'Dolloso');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `CUSTOMERS`
--
ALTER TABLE `CUSTOMERS`
  ADD PRIMARY KEY (`CustNo`),
  ADD KEY `CustCompanyName` (`CustCompanyName`);

--
-- Indexes for table `EMPLOYEES`
--
ALTER TABLE `EMPLOYEES`
  ADD PRIMARY KEY (`EmpNo`);

--
-- Indexes for table `INVOICED_PRODUCTS`
--
ALTER TABLE `INVOICED_PRODUCTS`
  ADD PRIMARY KEY (`InProNo`),
  ADD KEY `ProductNo` (`ProductNo`),
  ADD KEY `InvoiceNo` (`InvoiceNo`);

--
-- Indexes for table `INVOICES`
--
ALTER TABLE `INVOICES`
  ADD PRIMARY KEY (`InvoiceNo`),
  ADD KEY `CustNo` (`CustNo`);

--
-- Indexes for table `JOB_ORDERS`
--
ALTER TABLE `JOB_ORDERS`
  ADD PRIMARY KEY (`jobNO`),
  ADD KEY `EmpNo` (`EmpNo`),
  ADD KEY `ServiceNo` (`ServiceNo`),
  ADD KEY `InvoiceNo` (`InvoiceNo`);

--
-- Indexes for table `PAYMENTS`
--
ALTER TABLE `PAYMENTS`
  ADD PRIMARY KEY (`PaymentNo`),
  ADD KEY `InvoiceNo` (`InvoiceNo`),
  ADD KEY `EmpNo` (`EmpNo`);

--
-- Indexes for table `PRODUCTS`
--
ALTER TABLE `PRODUCTS`
  ADD PRIMARY KEY (`ProductNo`);

--
-- Indexes for table `SERVICES`
--
ALTER TABLE `SERVICES`
  ADD PRIMARY KEY (`ServiceNo`);

--
-- Indexes for table `SUPPLIERS`
--
ALTER TABLE `SUPPLIERS`
  ADD PRIMARY KEY (`SupplierNo`);

--
-- Indexes for table `SUPPLY_PRODUCTS`
--
ALTER TABLE `SUPPLY_PRODUCTS`
  ADD PRIMARY KEY (`SuppProNo`),
  ADD KEY `ProductNo` (`ProductNo`),
  ADD KEY `SupplierNo` (`SupplierNo`);

--
-- Indexes for table `USERS`
--
ALTER TABLE `USERS`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `CUSTOMERS`
--
ALTER TABLE `CUSTOMERS`
  MODIFY `CustNo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `EMPLOYEES`
--
ALTER TABLE `EMPLOYEES`
  MODIFY `EmpNo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `INVOICED_PRODUCTS`
--
ALTER TABLE `INVOICED_PRODUCTS`
  MODIFY `InProNo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `INVOICES`
--
ALTER TABLE `INVOICES`
  MODIFY `InvoiceNo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `JOB_ORDERS`
--
ALTER TABLE `JOB_ORDERS`
  MODIFY `jobNO` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `PAYMENTS`
--
ALTER TABLE `PAYMENTS`
  MODIFY `PaymentNo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `PRODUCTS`
--
ALTER TABLE `PRODUCTS`
  MODIFY `ProductNo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `SERVICES`
--
ALTER TABLE `SERVICES`
  MODIFY `ServiceNo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `SUPPLIERS`
--
ALTER TABLE `SUPPLIERS`
  MODIFY `SupplierNo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `SUPPLY_PRODUCTS`
--
ALTER TABLE `SUPPLY_PRODUCTS`
  MODIFY `SuppProNo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `USERS`
--
ALTER TABLE `USERS`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `INVOICED_PRODUCTS`
--
ALTER TABLE `INVOICED_PRODUCTS`
  ADD CONSTRAINT `INVOICED_PRODUCTS_ibfk_1` FOREIGN KEY (`ProductNo`) REFERENCES `PRODUCTS` (`ProductNo`),
  ADD CONSTRAINT `INVOICED_PRODUCTS_ibfk_2` FOREIGN KEY (`InvoiceNo`) REFERENCES `INVOICES` (`InvoiceNo`);

--
-- Constraints for table `INVOICES`
--
ALTER TABLE `INVOICES`
  ADD CONSTRAINT `INVOICES_ibfk_1` FOREIGN KEY (`CustNo`) REFERENCES `CUSTOMERS` (`CustNo`);

--
-- Constraints for table `JOB_ORDERS`
--
ALTER TABLE `JOB_ORDERS`
  ADD CONSTRAINT `JOB_ORDERS_ibfk_1` FOREIGN KEY (`EmpNo`) REFERENCES `EMPLOYEES` (`EmpNo`),
  ADD CONSTRAINT `JOB_ORDERS_ibfk_2` FOREIGN KEY (`ServiceNo`) REFERENCES `SERVICES` (`ServiceNo`),
  ADD CONSTRAINT `JOB_ORDERS_ibfk_3` FOREIGN KEY (`InvoiceNo`) REFERENCES `INVOICES` (`InvoiceNo`);

--
-- Constraints for table `PAYMENTS`
--
ALTER TABLE `PAYMENTS`
  ADD CONSTRAINT `PAYMENTS_ibfk_1` FOREIGN KEY (`InvoiceNo`) REFERENCES `INVOICES` (`InvoiceNo`),
  ADD CONSTRAINT `PAYMENTS_ibfk_2` FOREIGN KEY (`EmpNo`) REFERENCES `EMPLOYEES` (`EmpNo`);

--
-- Constraints for table `SUPPLY_PRODUCTS`
--
ALTER TABLE `SUPPLY_PRODUCTS`
  ADD CONSTRAINT `SUPPLY_PRODUCTS_ibfk_1` FOREIGN KEY (`ProductNo`) REFERENCES `PRODUCTS` (`ProductNo`),
  ADD CONSTRAINT `SUPPLY_PRODUCTS_ibfk_2` FOREIGN KEY (`SupplierNo`) REFERENCES `SUPPLIERS` (`SupplierNo`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
