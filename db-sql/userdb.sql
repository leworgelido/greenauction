-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 03, 2023 at 11:36 PM
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
-- Table structure for table `add_cart`
--

CREATE TABLE `add_cart` (
  `id` int(255) NOT NULL,
  `cart` int(255) NOT NULL,
  `users_id` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `add_cart`
--

INSERT INTO `add_cart` (`id`, `cart`, `users_id`) VALUES
(1, 1, 149);

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
(146, 'zxc', 'zxc', '$2y$10$oIjszSb.BBtf7Giq6kufcOM4miA.KAbOZuTXd2966IMJoRirxZsVW', '2023-12-03 17:33:41', 'account-default-pic.jpg', 0, '', 0),
(147, '4321', '4321', '$2y$10$xhf/nWi5I.XO93o0upy3Dega3iXURXeikCoM.vuI1uTD/f.VKmXNi', '2023-12-03 18:19:12', 'account-default-pic.jpg', 0, '', 0),
(148, 'mnb', 'mnb', '$2y$10$Uc32g1n62V5N/zvHI20QK.QaZYMikxSReUAC.HY5wbmwYGYuJ6LYi', '2023-12-04 01:49:08', 'account-default-pic.jpg', 0, '', 0),
(149, '41', '41#gmail,com', '$2y$10$f.pjtgttNKiVaGqba0h28ueeM11P3HZnzj63u31eaH2mowy7.FIkO', '2023-12-04 01:49:47', 'IMG-656cc3c7a34841.70708442.jpg', 985712, 'pampangaa', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users_products`
--

CREATE TABLE `users_products` (
  `id` int(255) NOT NULL,
  `image_product` varchar(255) NOT NULL,
  `prod_name` varchar(255) NOT NULL,
  `prod_description` text NOT NULL,
  `prod_price` int(255) NOT NULL,
  `prod_category` varchar(255) NOT NULL,
  `users_shop_id` int(255) DEFAULT NULL,
  `display_prod` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users_products`
--

INSERT INTO `users_products` (`id`, `image_product`, `prod_name`, `prod_description`, `prod_price`, `prod_category`, `users_shop_id`, `display_prod`) VALUES
(10, 'PRODUCT-IMG-656c4978ae3fd2.35168904.jpg', 'DRAGON', 'CAN EAT A FIRE', 20000, 'Fresh Produce', 22, 1),
(11, 'PRODUCT-IMG-656c8bb11b3481.19073211.jpg', 'mais na bulok', 'MAIS NA MASARAP PARANG AKO', 50, 'Nuts and Seeds', 23, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users_shop`
--

CREATE TABLE `users_shop` (
  `id` int(255) NOT NULL,
  `shop_name` varchar(30) NOT NULL,
  `full_name` varchar(30) NOT NULL,
  `pickup_Address` varchar(255) NOT NULL,
  `shop_email` varchar(30) NOT NULL,
  `shop_PhoneNo` bigint(11) NOT NULL,
  `user_id` int(255) DEFAULT NULL,
  `shop_image` varchar(255) NOT NULL,
  `shop_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users_shop`
--

INSERT INTO `users_shop` (`id`, `shop_name`, `full_name`, `pickup_Address`, `shop_email`, `shop_PhoneNo`, `user_id`, `shop_image`, `shop_description`) VALUES
(19, 'goku\'s shop', 'son goku', 'namek', 'goku@gmail.com', 9849538143, 141, 'IMG-656aee8458a141.49262249.png', 'heheeeee'),
(20, 'goku', 'goku', 'goku', 'goku@gmail.com', 9856124512, 142, 'IMG-656af01564e403.44434775.png', 'safsafafsfsaf fafasf afff ff'),
(21, 'Natsu\'s Shop', 'Natsu Dragneel', 'evertlasting, santa lucia, CSFP, Pampanga', 'natsu324@shop.com', 98547123, 143, 'IMG-656b829d0893d0.69619297.jpg', 'ALL IM ALL FIRE\r\n'),
(22, 'motor\'s shop', 'natsu drag', 'evertlasting, santa lucia, CSFP, Pampanga', 'natsu@shop.com', 9876543231, 144, 'IMG-656c4951470715.92802554.png', 'HEEHEHEHEHE'),
(23, 'yoyoyo', 'yoyoo', 'yoyoyo', '3412', 561251, 145, '../uploads/account-default-pic.jpg', 'PUT SOME DESCRIPTION');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add_cart`
--
ALTER TABLE `add_cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_id` (`users_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_products`
--
ALTER TABLE `users_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_shop_id` (`users_shop_id`);

--
-- Indexes for table `users_shop`
--
ALTER TABLE `users_shop`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `add_cart`
--
ALTER TABLE `add_cart`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=150;

--
-- AUTO_INCREMENT for table `users_products`
--
ALTER TABLE `users_products`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users_shop`
--
ALTER TABLE `users_shop`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `add_cart`
--
ALTER TABLE `add_cart`
  ADD CONSTRAINT `add_cart_ibfk_1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `users_products`
--
ALTER TABLE `users_products`
  ADD CONSTRAINT `users_products_ibfk_1` FOREIGN KEY (`users_shop_id`) REFERENCES `users_shop` (`id`);

--
-- Constraints for table `users_shop`
--
ALTER TABLE `users_shop`
  ADD CONSTRAINT `users_shop_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
