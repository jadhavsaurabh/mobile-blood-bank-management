-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 08, 2017 at 01:45 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blood_bank`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Email` varchar(40) NOT NULL,
  `Password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Email`, `Password`) VALUES
('jadhavsaurabh1998@gmail.com', 'Admin123'),
('fundeamit3@gmail.com', 'Admin123'),
('mahighuge64@gmail.com', 'Admin123'),
('gsumeet@gmail.com', 'Admin123');

-- --------------------------------------------------------

--
-- Table structure for table `blood_record`
--

CREATE TABLE `blood_record` (
  `Blood_Group` varchar(3) NOT NULL,
  `Amount_Received` int(11) NOT NULL,
  `Amount_Sent` int(11) NOT NULL,
  `Current_Volume` int(11) NOT NULL,
  `Total_capacity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blood_record`
--

INSERT INTO `blood_record` (`Blood_Group`, `Amount_Received`, `Amount_Sent`, `Current_Volume`, `Total_capacity`) VALUES
('A+', 0, 0, 0, 2000000),
('A-', 0, 0, 0, 2000000),
('B+', 350, 0, 350, 2000000),
('B-', 0, 0, 0, 2000000),
('O+', 0, 0, 0, 2000000),
('O-', 0, 0, 0, 2000000),
('AB-', 0, 0, 0, 2000000),
('AB+', 0, 0, 0, 2000000);

-- --------------------------------------------------------

--
-- Table structure for table `final_donor`
--

CREATE TABLE `final_donor` (
  `First_Name` varchar(20) NOT NULL,
  `Last_Name` varchar(20) NOT NULL,
  `Email` varchar(20) NOT NULL,
  `Mobile` varchar(10) NOT NULL,
  `Blood_Group` varchar(3) NOT NULL,
  `Date` varchar(10) NOT NULL,
  `Address` varchar(40) NOT NULL,
  `Amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `final_donor`
--

INSERT INTO `final_donor` (`First_Name`, `Last_Name`, `Email`, `Mobile`, `Blood_Group`, `Date`, `Address`, `Amount`) VALUES
('Mahesh', 'Ghuge', 'mahighuge664@gmail.c', '8585858585', 'B+', '2017/10/08', 'Pune', 350);

--
-- Triggers `final_donor`
--
DELIMITER $$
CREATE TRIGGER `Donor_Blood` AFTER INSERT ON `final_donor` FOR EACH ROW BEGIN 
UPDATE blood_record SET Amount_Received = Amount_Received + NEW.Amount WHERE Blood_Group=NEW.Blood_Group;
UPDATE blood_record SET Current_Volume = Current_Volume + NEW.Amount WHERE Blood_Group=NEW.Blood_Group;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `final_receiver`
--

CREATE TABLE `final_receiver` (
  `First_Name` varchar(20) NOT NULL,
  `Last_Name` varchar(20) NOT NULL,
  `Email` varchar(20) NOT NULL,
  `Mobile` varchar(10) NOT NULL,
  `Blood_Group` varchar(3) NOT NULL,
  `Date` varchar(10) NOT NULL,
  `Address` varchar(40) NOT NULL,
  `Amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Triggers `final_receiver`
--
DELIMITER $$
CREATE TRIGGER `Receiver_Blood` AFTER INSERT ON `final_receiver` FOR EACH ROW BEGIN
UPDATE blood_record SET Amount_Sent = Amount_Sent + New.Amount WHERE Blood_Group = NEW.Blood_Group;
UPDATE blood_record SET Current_Volume = Current_Volume - New.Amount WHERE Blood_Group = NEW.Blood_Group;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `temp_donor`
--

CREATE TABLE `temp_donor` (
  `First_Name` varchar(20) NOT NULL,
  `Last_Name` varchar(20) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Mobile` varchar(10) NOT NULL,
  `Blood_Group` varchar(3) NOT NULL,
  `Date` varchar(10) NOT NULL,
  `Address` varchar(40) NOT NULL,
  `Amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `temp_donor`
--

INSERT INTO `temp_donor` (`First_Name`, `Last_Name`, `Email`, `Mobile`, `Blood_Group`, `Date`, `Address`, `Amount`) VALUES
('Mahesh', 'Ghuge', 'mahighuge664@gmail.c', '', 'B+', '', '', 0),
('Mahesh', 'Ghuge', 'mahighuge664@gmail.c', '', 'B+', '', '', 0),
('Jay', 'Thanvi', 'jay@gmail.com', '8989898989', 'AB+', '2017/10/08', 'Pune', 350),
('Jay', 'Thanvi', 'jay@gmail.com', '8989898989', 'AB+', '2017/10/08', 'Pune', 350);

-- --------------------------------------------------------

--
-- Table structure for table `temp_receiver`
--

CREATE TABLE `temp_receiver` (
  `First_Name` varchar(20) NOT NULL,
  `Last_Name` varchar(20) NOT NULL,
  `Email` varchar(20) NOT NULL,
  `Mobile` varchar(20) NOT NULL,
  `Blood_Group` varchar(3) NOT NULL,
  `Date` varchar(10) NOT NULL,
  `Address` varchar(40) NOT NULL,
  `Amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `First_Name` varchar(20) NOT NULL,
  `Last_Name` varchar(20) NOT NULL,
  `Mobile` varchar(10) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `Address` varchar(50) NOT NULL,
  `Permenant_Address` varchar(50) NOT NULL,
  `Date_OF_Birth` date NOT NULL,
  `Blood_Group` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`First_Name`, `Last_Name`, `Mobile`, `Email`, `Password`, `Address`, `Permenant_Address`, `Date_OF_Birth`, `Blood_Group`) VALUES
('Amit', 'Funde', '9882134503', 'fundeamit3@gmail.com', 'amit', 'Pune', 'Pune', '1998-04-08', 'B+'),
('Mahesh', 'Ghuge', '8600429732', 'mahighuge664@gmail.com', 'mahi664', 'Pune', 'Ahmednagar', '1998-05-22', 'B+'),
('Sagar', 'Ghorpade', '9881235040', 'sagar@gmail.com', 'sagar', 'Pune', 'nashik', '1999-10-05', 'A+'),
('Akshay', 'Garje', '8796212281', 'garje@gmail.com', 'aaa', 'Pune', 'Ahmednagar', '1998-05-06', 'A-'),
('Ayush', 'Oswal', '9881235030', 'ayush@gmail.com', 'ayush', 'Nagar', 'Pune', '2000-10-08', 'A-'),
('Ayush', 'Oswal', '9881235030', 'ayush@gmail.com', 'ayush', 'Nagar', 'Pune', '2000-10-08', 'A-'),
('Vedant', 'Rekulwad', '9856321458', 'vedant@gmail.com', 'vedant', 'pune', 'Nanded', '1997-02-04', 'B-'),
('Omkar', 'Pacharne', '9881235660', 'omkar@gmail.com', 'omkar', 'Dhule', 'Dhule', '2017-10-08', 'B+'),
('Santosh', 'Shinde', '8785896587', 'santosh@gmail.com', 'santosh', 'pune', 'Ahmednagar', '1997-05-31', 'AB+'),
('Aditya', 'Dikshit', '8975108619', 'aditya@gmail.com', 'aditya', 'pune', 'Nashik', '1997-02-03', 'O-'),
('Jay', 'Thanvi', '9881235665', 'jay@gmail.com', 'jay', 'Shegoan', 'Shegoan', '1989-10-31', 'AB+'),
('Atul', 'Gunjal', '7858745214', 'atul@gmail.com', 'atul', 'Pune', 'Ahmednagar', '1997-03-23', 'O+'),
('Amit', 'Jadhav', '8965247852', 'amit@gmail.com', 'amit', 'Pune', 'Pune', '1997-04-22', 'A+'),
('Prasad', 'Kute', '9881233333', 'prasad@gmail.com', 'prasad', 'Nagar', 'Pune', '1990-12-11', 'AB-'),
('Shubham', 'Raskar', '9881233321', 'shubham@gmail.com', 'shubham', 'Amravati', 'Pune', '1997-02-12', 'O+'),
('Shivaji', 'Savant', '9856321478', 'shivaji@gmail.com', 'shivaji', 'Pune', 'Pune', '1997-07-08', 'B+'),
('Shubham', 'Raskar', '9881233321', 'shubham@gmail.com', 'shubham', 'Amravati', 'Pune', '1997-02-12', 'O+'),
('shushrut', 'Shimpi', '7852456985', 'shushrut@gmail.com', 'shushrut', 'Pune', 'Pune', '1997-02-04', 'B-'),
('milan', 'Joshi', '7896542154', 'milan@gmail.com', 'milan', 'Pune', 'Pune', '1998-10-31', 'AB-'),
('Hrushi', 'Said', '9221233321', 'hrushi@gmail.com', 'hrushi', 'Jalgoan', 'Pune', '1998-12-09', 'O-'),
('soham', 'Kasar', '9856565648', 'soham@gmail.com', 'soham', 'Pune', 'Pune', '1997-09-23', 'B-'),
('nishant', 'kulgod', '9568784512', 'nishant@gmail.com', 'nishant', 'Pune', 'Pune', '1997-11-30', 'A+'),
('Kartik', 'Jain', '9221211321', 'kartik@gmail.com', 'kartik', 'Bhusaval', 'nashik', '1991-06-09', 'A+'),
('saurabh', 'Jadhav', '9898989896', 'saurabh@gmail.com', 'saurabh', 'Pune', 'Nashik', '1998-06-23', 'O+'),
('Dinesh', 'Agarwal', '9111211321', 'dinesh@gmail.com', 'dinesh', 'Pune', 'Dhule', '1988-08-04', 'A-'),
('Mukesh', 'Ambani', '9111232111', 'mukesh@gmail.com', 'mukesh', 'Mumbai', 'Mumbai', '1986-02-07', 'B+'),
('Prashant', 'Gholap', '8898136375', 'prashantgholap97@gmail.com', 'Prashant@123', 'Pune', 'Mumbai', '1997-10-29', 'O+'),
('Rakesh', 'Roshan', '9111233121', 'rakesh@gmail.com', 'rakesh', 'Delhi', 'Mumbai', '1988-09-12', 'B-'),
('Alia', 'Bhatt', '9111233232', 'alia@gmail.com', 'alia', 'Mumbai', 'Mumbai', '1991-06-10', 'AB+'),
('Pratik', 'Pachange', '9637811002', 'pratikpachange@gmail.com', 'Pratik@123', 'Pune', 'roha', '1997-08-28', 'O+'),
('Shivani', 'Karwa', '9111233211', 'shivani@gmail.com', 'shivani', 'nagpur', 'pune', '1996-08-04', 'AB-'),
('Sumeet', 'Godse', '7896547852', 'sumeet@gmail.com', 'sumeet', 'Pune', 'Pune', '1997-08-13', 'B+'),
('Hrushi', 'Dhumal', '9111233222', 'hd@gmail.com', 'hd', 'satana', 'pune', '1999-06-21', 'O+'),
('Pranav', 'Agarwal', '9111233233', 'pranav@gmail.com', 'pranav', 'Nagpur', 'pune', '1992-10-20', 'O-'),
('Harsh', 'Mutha', '9111233256', 'harsh@gmail.com', 'harsh', 'Nagar', 'pune', '1998-03-04', 'A+'),
('Shree', 'Agar', '9111211256', 'shree@gmail.com', 'shree', 'Dhule', 'pune', '1996-07-05', 'A-');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
