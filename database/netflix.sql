-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2026 at 07:11 PM
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
-- Database: `netflix_clone`
--

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE `movies` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `thumbnail` varchar(255) DEFAULT NULL,
  `video_url` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`id`, `title`, `description`, `thumbnail`, `video_url`, `created_at`) VALUES
(3, 'Stranger Things', 'Mystery sci-fi series', 'stranger.jpg', 'https://youtube.com', '2026-04-25 13:24:02'),
(4, 'Money Heist', 'Heist crime drama', 'moneyheist.jpg', 'https://youtube.com', '2026-04-25 13:24:02'),
(5, 'Breaking Bad', 'Crime chemistry story', 'breakingbad.jpg', 'https://www.youtube.com/watch?v=HhesaQXLuRY', '2026-04-25 13:24:02'),
(6, 'Wednesday', 'Dark comedy mystery', 'wednesday.jpg', 'https://www.youtube.com/watch?v=Di310WS8zLk', '2026-04-25 13:24:02'),
(7, 'Dark', 'Time travel thriller', 'dark.jpg', 'https://www.youtube.com/watch?v=rrwycJ08PSA', '2026-04-25 13:24:02'),
(8, 'Avengers', 'Marvel superhero film', 'avengers.jpg', 'https://www.youtube.com/watch?v=eOrNdBpGMv8', '2026-04-25 13:24:02'),
(9, 'Interstellar', 'Space exploration movie', 'interstellar.jpg', 'https://www.youtube.com/watch?v=zSWdZVtXT7E', '2026-04-25 13:24:02'),
(10, 'Joker', 'Psychological drama', 'joker.jpg', 'https://www.youtube.com/watch?v=zAGVQLHvwOY', '2026-04-25 13:24:02');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `created_at`) VALUES
(1, '', '', '$2y$10$4vmSFeriai8LzGsdAsNXe.2R3H2BtDcNAq//Ehwrt6LJuftYPAC5O', '2026-04-25 08:42:39'),
(2, 'Test User', 'test@gmail.com', '123456', '2026-04-25 13:13:50'),
(3, 'Farishta Khan', 'farishtakhan15@gmail.com', '1234567890', '2026-04-25 15:05:20'),
(4, 'asma', 'asma15@gmail.com', '1234567890', '2026-04-25 17:04:30');

-- --------------------------------------------------------

--
-- Table structure for table `watchlist`
--

CREATE TABLE `watchlist` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `movie_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `watchlist`
--
ALTER TABLE `watchlist`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `movie_id` (`movie_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `movies`
--
ALTER TABLE `movies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `watchlist`
--
ALTER TABLE `watchlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `watchlist`
--
ALTER TABLE `watchlist`
  ADD CONSTRAINT `watchlist_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `watchlist_ibfk_2` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
