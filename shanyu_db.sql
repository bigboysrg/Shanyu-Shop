-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 15, 2026 at 07:43 PM
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
-- Database: `shanyu_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `img` varchar(255) NOT NULL,
  `overview` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `rating` int(11) DEFAULT 5
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `img`, `overview`, `description`, `rating`) VALUES
(1, 'Zero IEM Headphones - Blue', 89.99, 'zeroblue.png', 'Smooth & Detailed', 'High-performance dynamic driver with a beautiful blue faceplate.', 5),
(2, 'Moondrop CHU 2', 56.99, 'chu2.png', 'Entry-level King', 'The successor to the CHU, featuring a replaceable cable and refined tuning.', 5),
(3, 'Vibes 202MC', 43.99, 'vibes.png', 'Clear Vocals', 'Great for monitoring and clear vocal reproduction.', 5),
(4, 'BGVP Wukong', 58990.99, 'wukong.png', 'Ultra-premium', 'A masterpiece of engineering for the ultimate audiophile experience.', 5),
(5, 'Moondrop ARIA 2 RED', 100.99, 'aria.png', 'Rich Soundstage', 'Classic Moondrop tuning with a stunning red finish.', 5),
(6, 'Tangzu Waner S.G. Jade', 45.99, 'Waner2Jade.png', 'Balanced Profile', 'Great value IEM with a comfortable fit and natural sound.', 5),
(7, 'HiFiGo DUNU DN242', 150.99, 'dunu.png', 'Professional Grade', 'Dual-driver hybrid setup for detailed sound reproduction.', 5),
(8, 'Tipsy M1 IEM', 30.99, 'tipsy.png', 'Vibrant & Fun', 'Easy to drive and fun to listen to for daily use.', 5);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `created_at`) VALUES
(1, 'Salt', 'sergebarcelon54@gmail.com', '$2y$10$c8sHUdLceRvhhDtCcrKi2.dBq/sCwBzNQtZ829Xvfs3WOaQrRtw92', '2026-03-16 02:32:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
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
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
