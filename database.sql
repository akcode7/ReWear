-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 12, 2025 at 04:55 PM
-- Server version: 10.6.22-MariaDB-cll-lve
-- PHP Version: 8.3.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ashishen_reWear`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `last_login_date` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `email`, `password`, `created_date`, `last_login_date`) VALUES
(1, 'ashish', 'ashish@gmail.com', '$2y$10$9z6.qO/qXq0hjZohnVSjA.VXQK1s1UVouHDlaRyKpJdte9V5e/Rxa', '2025-04-27 07:11:04', '2025-05-11 20:14:12');

-- --------------------------------------------------------

--
-- Table structure for table `listing`
--

CREATE TABLE `listing` (
  `id` int(11) NOT NULL,
  `listing_name` varchar(150) NOT NULL,
  `listing_desc` text DEFAULT NULL,
  `listing_img` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`listing_img`)),
  `listing_user` int(11) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `listing`
--

INSERT INTO `listing` (`id`, `listing_name`, `listing_desc`, `listing_img`, `listing_user`, `created_at`) VALUES
(1, 'Ashish Shrama', 'fdsfds', '[\"uploads\\/1752315637_Screenshot_2025-07-12_122713.png\"]', 4, '2025-07-12 15:52:05');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `phone` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `created_at`, `phone`) VALUES
(1, 'Ashish Sharma', 'ashishgotapogo10@gmail.com', '$2y$10$KxoThNq27uyhClPSnf9e4uF1YxqLkACFkjnq3wLTJKEhsTcJwfLMG', '2025-07-12 07:58:26', ''),
(2, 'Ashish Sharma332', 'ashishgotapogodsd10@gmail.com', '$2y$10$jJim.F73SVS77OZPnoQrHuTjvsFd6Z7ckGYwdRDXcMvhSa7fFRZOy', '2025-07-12 08:07:36', ''),
(3, 'dsd', 'dsd@dfdsf.in', '$2y$10$BIpEW/bmwJ9LjPrI37YhwudxMzoc0LWIDPublJiwkAoskrh14v1m2', '2025-07-12 08:23:07', ''),
(4, 'aaa', 'aaa@gmail.com', '$2y$10$RSn4BNeki5iW6AejX0fVoeMfQpEngU2zryDuU7N7neq9UiEVz8Y92', '2025-07-12 08:27:17', ''),
(5, 'Ashish', 'Ashish@gmail.com', '$2y$10$7SCwoLL.kOnYbZpVBGnmyuN5r122aK3hKIyRDKCWD69a/il7yIzN2', '2025-07-12 09:54:09', NULL),
(6, 'as', 'testing@mail.com', '$2y$10$HRGzuyimJpZLXrqX2IIdP.gqg0D1i3NHZQKxL2aK1d6so1eMUPUJy', '2025-07-12 09:58:45', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `listing`
--
ALTER TABLE `listing`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `listing`
--
ALTER TABLE `listing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
