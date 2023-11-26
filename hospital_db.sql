-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 26, 2023 at 10:48 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hospital_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `Appointment_ID` int(11) NOT NULL,
  `Patient_ID` int(11) NOT NULL,
  `Doctor_id` int(11) NOT NULL,
  `Doctor` varchar(60) NOT NULL,
  `Appointment_Date` date NOT NULL,
  `Appointment_time` time NOT NULL,
  `Appointment_for` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`Appointment_ID`, `Patient_ID`, `Doctor_id`, `Doctor`, `Appointment_Date`, `Appointment_time`, `Appointment_for`) VALUES
(18, 3, 2, 'Vikrant Mehta BPT, MPT (Neuro)', '2023-11-26', '15:32:00', 'Physiotherapist'),
(19, 3, 7, 'Harpreet Singh M.D, Doctor of Osteopathic medicine, MBBS', '2023-11-26', '17:39:00', 'Radiologist');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `Doctor_ID` int(11) NOT NULL,
  `First_name` varchar(50) NOT NULL,
  `Last_name` varchar(50) NOT NULL,
  `Specialization` varchar(50) NOT NULL,
  `Qualifications` varchar(255) NOT NULL,
  `Contact_number` varchar(20) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`Doctor_ID`, `First_name`, `Last_name`, `Specialization`, `Qualifications`, `Contact_number`, `Email`, `Password`) VALUES
(1, 'Shubham', 'Tyagi', 'General Surgeon', 'MBBS, M.S General Surgery', '4343221222', 'smtyagi@gmail.com', '446a12100c856ce9'),
(2, 'Vikrant', 'Mehta', 'Physiotherapist', 'BPT, MPT (Neuro)', '2133245656', 'vkmehta32@yahoo.com', '1234'),
(3, 'Mahesh', 'Reddy', 'Dermatologist ', 'MD (Dermatology)', '9542422121', 'reddymahesh@gmail.com', '49'),
(4, 'Ashok', 'Shrivastav', 'Paediatrician', 'MCh (Paediatric Surgery)', '5453422123', 'ashoksri32@yahoo.com', '2322'),
(5, 'Abhimanyu', 'Sen', 'Spine surgeon', 'MBBS, MS-Orthopaedics', '6776543432', 'abhimanyu43@bing.com', '1234'),
(6, 'Niraj', 'Sharma', 'Cardiac Surgeon', 'MBBS, M. S Cardiothoracic surgery', '4434521221', 'nirajsharma@outlook.com', '31323334'),
(7, 'Harpreet', 'Singh', 'Radiologist', 'M.D, Doctor of Osteopathic medicine, MBBS', '6777623231', 'singhpreet@yahoo.com', '31323334'),
(8, 'Kiran', 'Sharma', 'Oncologist', 'M.D(Oncology), MBBS', '9894322321', 'kiran21s@gmail.com', '446a12100c856ce9'),
(9, 'Kashish', 'Vaidya', 'Psychiatrist', 'MD,MBBS', '3233184843', 'vaidyak2@yahoo.com', '1234'),
(10, 'Swaroop', 'Naik', 'Physiologist', 'MD,MBBS', '4432311212', 'swnaik322@bing.com', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `medical_records`
--

CREATE TABLE `medical_records` (
  `Record_ID` int(11) NOT NULL,
  `Patient_id` int(11) NOT NULL,
  `Doctor_id` int(11) NOT NULL,
  `Record_date` date NOT NULL,
  `Diagnosis` varchar(255) NOT NULL,
  `Treatement_plan` varchar(100) NOT NULL,
  `Medications` varchar(100) NOT NULL,
  `Allergies` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `medical_records`
--

INSERT INTO `medical_records` (`Record_ID`, `Patient_id`, `Doctor_id`, `Record_date`, `Diagnosis`, `Treatement_plan`, `Medications`, `Allergies`) VALUES
(5, 3, 2, '2023-11-26', 'abcd', 'abcd', 'abcd', 'abcd'),
(6, 3, 2, '2023-11-26', 'abcd', 'abcd', 'abcd', 'abcd');

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `Patient_ID` int(11) NOT NULL,
  `First_Name` varchar(50) NOT NULL,
  `Last_Name` varchar(50) NOT NULL,
  `Date_of_Birth` date NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Phone_Number` varchar(20) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Emergency_Contact_Name` varchar(50) NOT NULL,
  `Emergency_Contact_Number` varchar(20) NOT NULL,
  `Username` varchar(20) NOT NULL,
  `Password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`Patient_ID`, `First_Name`, `Last_Name`, `Date_of_Birth`, `Address`, `Phone_Number`, `Email`, `Emergency_Contact_Name`, `Emergency_Contact_Number`, `Username`, `Password`) VALUES
(1, 'Madhuri', 'V', '2010-10-10', 'abcdefg', '1234567890', 'someone@something.com', 'parent', '0987654321', 'hello_world', '$2y$10$9EzICqZbloXSC'),
(2, 'vasu', 'madhuri', '2000-12-22', 'xyz', '1', 'why@why.in', '123456789', '0987654321', 'why', '$2y$10$2uJTjnDqfOVM0'),
(3, 'm', 'v', '2010-10-10', 'a', '1', 'hello@hello.com', '', '', 'sam', '$2y$10$MnVt42Jh0v66A'),
(4, 'admin', 'a', '2005-01-01', 'church street', '9876543211', 'admin@gmail.com', 'ayush', '8976543210', '12345', '$2y$10$MZO.qr5wetLgz');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`Appointment_ID`),
  ADD KEY `Patient_id` (`Patient_ID`),
  ADD KEY `Doctor_id` (`Doctor_id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`Doctor_ID`);

--
-- Indexes for table `medical_records`
--
ALTER TABLE `medical_records`
  ADD PRIMARY KEY (`Record_ID`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`Patient_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `Appointment_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `Doctor_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `medical_records`
--
ALTER TABLE `medical_records`
  MODIFY `Record_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `Patient_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointments`
--
ALTER TABLE `appointments`
  ADD CONSTRAINT `appointments_ibfk_1` FOREIGN KEY (`Patient_id`) REFERENCES `patients` (`Patient_ID`),
  ADD CONSTRAINT `appointments_ibfk_2` FOREIGN KEY (`Doctor_id`) REFERENCES `doctors` (`Doctor_ID`);

--
-- Constraints for table `medical_records`
--
ALTER TABLE `medical_records`
  ADD CONSTRAINT `medical_records_ibfk_1` FOREIGN KEY (`Patient_id`) REFERENCES `patients` (`Patient_ID`),
  ADD CONSTRAINT `medical_records_ibfk_2` FOREIGN KEY (`Doctor_id`) REFERENCES `doctors` (`Doctor_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
