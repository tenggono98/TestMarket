-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 19, 2018 at 04:41 PM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bengkel`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `CustomerID` char(5) NOT NULL,
  `CustomerName` varchar(30) NOT NULL,
  `CustomerPNumber` varchar(15) NOT NULL,
  `CustomerEmail` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`CustomerID`, `CustomerName`, `CustomerPNumber`, `CustomerEmail`) VALUES
('CT001', 'Josh Doe', '081495275645', 'josh.doe@gmail.com'),
('CT002', 'Jack Doe', '0897785621354', 'jack.doe@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `ItemID` char(5) NOT NULL,
  `ItemName` varchar(30) NOT NULL,
  `ItemDescription` varchar(50) NOT NULL,
  `ItemStock` int(11) NOT NULL,
  `ItemPrice` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`ItemID`, `ItemName`, `ItemDescription`, `ItemStock`, `ItemPrice`) VALUES
('IT001', 'Shock Breaker', 'Radius: 20 mm. Length: 20 cm.', 30, 800000),
('IT002', 'Lubricant 2L', '2L Volume. High slick.', 10, 300000);

-- --------------------------------------------------------

--
-- Table structure for table `purchase_detail`
--

CREATE TABLE `purchase_detail` (
  `PurchaseID` char(5) NOT NULL,
  `ItemID` char(5) NOT NULL,
  `Quantitiy` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `purchase_header`
--

CREATE TABLE `purchase_header` (
  `PurchaseID` char(5) NOT NULL,
  `VendorID` char(5) NOT NULL,
  `PurchaseDateTime` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sales_detail`
--

CREATE TABLE `sales_detail` (
  `WOID` char(5) NOT NULL,
  `ItemID` char(5) NOT NULL,
  `Quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `StaffID` char(5) NOT NULL,
  `STypeID` char(5) NOT NULL,
  `StaffName` varchar(30) NOT NULL,
  `StaffPNumber` varchar(15) NOT NULL,
  `StaffEmail` varchar(30) NOT NULL,
  `StaffDOB` date NOT NULL,
  `StaffPassword` varchar(30) NOT NULL,
  `StaffSalary` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`StaffID`, `STypeID`, `StaffName`, `StaffPNumber`, `StaffEmail`, `StaffDOB`, `StaffPassword`, `StaffSalary`) VALUES
('ST001', 'TP001', 'John Doe', '08132465795', 'john.doe@gmail.com', '1980-12-11', 'johndoe', 5000000),
('ST002', 'TP002', 'Jane Doe', '08135794168544', 'jane.doe@gmail.com', '1985-05-03', 'janedoe', 3000000);

-- --------------------------------------------------------

--
-- Table structure for table `stafftype`
--

CREATE TABLE `stafftype` (
  `STypeID` char(5) NOT NULL,
  `STypeName` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stafftype`
--

INSERT INTO `stafftype` (`STypeID`, `STypeName`) VALUES
('TP001', 'Manager'),
('TP002', 'Cashier'),
('TP003', 'Engineer');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

CREATE TABLE `vehicle` (
  `VehicleID` char(5) NOT NULL,
  `CustomerID` char(5) NOT NULL,
  `VTypeID` char(5) NOT NULL,
  `Notes` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vehicle`
--

INSERT INTO `vehicle` (`VehicleID`, `CustomerID`, `VTypeID`, `Notes`) VALUES
('VH001', 'CT001', 'VT001', 'Complaints of squeaking sound from the rear of the car.'),
('VH002', 'CT002', 'VT002', 'Regular oil change.');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_type`
--

CREATE TABLE `vehicle_type` (
  `VTypeID` char(5) NOT NULL,
  `VTypeName` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vehicle_type`
--

INSERT INTO `vehicle_type` (`VTypeID`, `VTypeName`) VALUES
('VT001', 'Car'),
('VT002', 'Motorcycle');

-- --------------------------------------------------------

--
-- Table structure for table `vendor`
--

CREATE TABLE `vendor` (
  `VendorID` char(5) NOT NULL,
  `VendorName` varchar(30) NOT NULL,
  `VendorPICName` varchar(30) NOT NULL,
  `VendorPICPNumber` int(15) NOT NULL,
  `VendorPICEmail` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vendor`
--

INSERT INTO `vendor` (`VendorID`, `VendorName`, `VendorPICName`, `VendorPICPNumber`, `VendorPICEmail`) VALUES
('VD001', 'Top One', 'Jono Joni', 847632464, 'jono.joni@gmail.com'),
('VD002', 'Astra Auto Parts', 'Jini Jino', 846543272, 'jini.jino@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `work_order`
--

CREATE TABLE `work_order` (
  `WOID` char(5) NOT NULL,
  `VehicleID` char(5) NOT NULL,
  `WODateTime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `OrderDescription` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `wo_detail`
--

CREATE TABLE `wo_detail` (
  `StaffID` char(5) NOT NULL,
  `WOID` char(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`CustomerID`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`ItemID`);

--
-- Indexes for table `purchase_detail`
--
ALTER TABLE `purchase_detail`
  ADD PRIMARY KEY (`PurchaseID`,`ItemID`),
  ADD KEY `PurchaseID` (`PurchaseID`),
  ADD KEY `ItemID` (`ItemID`);

--
-- Indexes for table `purchase_header`
--
ALTER TABLE `purchase_header`
  ADD PRIMARY KEY (`PurchaseID`),
  ADD KEY `purchase_header_ibfk_1` (`VendorID`);

--
-- Indexes for table `sales_detail`
--
ALTER TABLE `sales_detail`
  ADD PRIMARY KEY (`WOID`,`ItemID`),
  ADD KEY `WOID` (`WOID`),
  ADD KEY `ItemID` (`ItemID`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`StaffID`) USING BTREE,
  ADD KEY `STypeID` (`STypeID`) USING BTREE;

--
-- Indexes for table `stafftype`
--
ALTER TABLE `stafftype`
  ADD PRIMARY KEY (`STypeID`);

--
-- Indexes for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD PRIMARY KEY (`VehicleID`),
  ADD KEY `VehicleID` (`VehicleID`),
  ADD KEY `CustomerID` (`CustomerID`),
  ADD KEY `VTypeID` (`VTypeID`);

--
-- Indexes for table `vehicle_type`
--
ALTER TABLE `vehicle_type`
  ADD PRIMARY KEY (`VTypeID`);

--
-- Indexes for table `vendor`
--
ALTER TABLE `vendor`
  ADD PRIMARY KEY (`VendorID`);

--
-- Indexes for table `work_order`
--
ALTER TABLE `work_order`
  ADD PRIMARY KEY (`WOID`),
  ADD KEY `VehicleID` (`VehicleID`);

--
-- Indexes for table `wo_detail`
--
ALTER TABLE `wo_detail`
  ADD PRIMARY KEY (`StaffID`,`WOID`),
  ADD KEY `StaffID` (`StaffID`,`WOID`),
  ADD KEY `WOID` (`WOID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `purchase_detail`
--
ALTER TABLE `purchase_detail`
  ADD CONSTRAINT `purchase_detail_ibfk_1` FOREIGN KEY (`ItemID`) REFERENCES `item` (`ItemID`),
  ADD CONSTRAINT `purchase_detail_ibfk_2` FOREIGN KEY (`PurchaseID`) REFERENCES `purchase_header` (`PurchaseID`);

--
-- Constraints for table `purchase_header`
--
ALTER TABLE `purchase_header`
  ADD CONSTRAINT `purchase_header_ibfk_1` FOREIGN KEY (`VendorID`) REFERENCES `vendor` (`VendorID`),
  ADD CONSTRAINT `purchase_header_ibfk_2` FOREIGN KEY (`PurchaseID`) REFERENCES `purchase_detail` (`PurchaseID`);

--
-- Constraints for table `sales_detail`
--
ALTER TABLE `sales_detail`
  ADD CONSTRAINT `sales_detail_ibfk_1` FOREIGN KEY (`WOID`) REFERENCES `work_order` (`WOID`),
  ADD CONSTRAINT `sales_detail_ibfk_2` FOREIGN KEY (`ItemID`) REFERENCES `item` (`ItemID`);

--
-- Constraints for table `staff`
--
ALTER TABLE `staff`
  ADD CONSTRAINT `staff_ibfk_1` FOREIGN KEY (`STypeID`) REFERENCES `stafftype` (`STypeID`);

--
-- Constraints for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD CONSTRAINT `vehicle_ibfk_1` FOREIGN KEY (`VTypeID`) REFERENCES `vehicle_type` (`VTypeID`),
  ADD CONSTRAINT `vehicle_ibfk_2` FOREIGN KEY (`CustomerID`) REFERENCES `customer` (`CustomerID`);

--
-- Constraints for table `work_order`
--
ALTER TABLE `work_order`
  ADD CONSTRAINT `work_order_ibfk_1` FOREIGN KEY (`WOID`) REFERENCES `wo_detail` (`WOID`),
  ADD CONSTRAINT `work_order_ibfk_2` FOREIGN KEY (`VehicleID`) REFERENCES `vehicle` (`VehicleID`);

--
-- Constraints for table `wo_detail`
--
ALTER TABLE `wo_detail`
  ADD CONSTRAINT `wo_detail_ibfk_1` FOREIGN KEY (`StaffID`) REFERENCES `staff` (`StaffID`),
  ADD CONSTRAINT `wo_detail_ibfk_2` FOREIGN KEY (`WOID`) REFERENCES `work_order` (`WOID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
