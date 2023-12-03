-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 03, 2023 at 10:37 AM
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
-- Database: `userdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `image` varchar(255) NOT NULL,
  `PhoneNo` bigint(11) NOT NULL,
  `users_Address` varchar(255) NOT NULL,
  `have_shop` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `pass`, `created_at`, `image`, `PhoneNo`, `users_Address`, `have_shop`) VALUES
(131, 'rowel', 'rowelpog@gmail.com', '$2y$10$Kr0/bG3EsBJHz7Ho/93B6er/Y9HcQCHEzbRnT1nm4UHJVwZZUnYz2', '2023-11-25 18:46:25', 'account-default-pic.jpg', 232414, 'ewqewqwqewq', 1),
(141, 'lewor', 'lewor', '$2y$10$/K5vq1yg/JoRhHObvQ5CPuxwe4vqJDGTYl4bJ0/OXf0M8WOR3l.9m', '2023-12-02 15:52:27', 'IMG-656ae245cd8716.45652581.png', 0, '', 1),
(142, 'rowels', 'rowels@gmail.com', '$2y$10$NjCIAEecDUJVgYp.K14/2OODjpLp5g/yv91Z3udI6tBlUaXbyMVaq', '2023-12-02 16:49:45', 'IMG-656aefb73ef029.66356297.jpg', 984512341, 'Everlasting street, San Pedro CSFP, Pampanga', 1),
(143, 'natsu', 'natsu321@dragneel.com', '$2y$10$elf7fQ1tyN.fsafS8AZ8AebeuG1h6t47i8bPB..Io4S7Lye/azwzi', '2023-12-03 03:07:31', 'IMG-656b8089c5eee9.99106153.jpg', 987654321, 'Everlasting street, San Pedro CSFP, Pampanga', 1),
(144, '321rowel', 'rowel@gmail.com', '$2y$10$h9GoWK25xYgtO2mfweIsSO50j9.7hafPn1xM4wpjYsxN5SPcmGiXG', '2023-12-03 17:17:42', 'IMG-656c4911d50ff6.69176245.jpg', 98576124, 'Everlasting street, San Pedro CSFP, Pampanga', 1),
(145, 'cxz', 'cxz', '$2y$10$W1FkY8hrJAdZ8qFvlRgfUuZyYSzVjJEgqANsS6/3fSCc4OF7N8NhS', '2023-12-03 17:27:14', 'account-default-pic.jpg', 0, '', 1),
(146, 'zxc', 'zxc', '$2y$10$oIjszSb.BBtf7Giq6kufcOM4miA.KAbOZuTXd2966IMJoRirxZsVW', '2023-12-03 17:33:41', 'account-default-pic.jpg', 0, '', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=147;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
