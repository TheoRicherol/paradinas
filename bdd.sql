-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Mar 25, 2021 at 04:50 PM
-- Server version: 5.7.32
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `paradinas`
--

-- --------------------------------------------------------

--
-- Table structure for table `basket`
--

CREATE TABLE `basket` (
  `id` int(11) NOT NULL,
  `id_users` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `color_leather`
--

CREATE TABLE `color_leather` (
  `id` int(11) NOT NULL,
  `color` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `color_leather_picture`
--

CREATE TABLE `color_leather_picture` (
  `id` int(11) NOT NULL,
  `color_leather_picture` varchar(255) DEFAULT NULL,
  `id_color_leather` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `color_lining`
--

CREATE TABLE `color_lining` (
  `id` int(11) NOT NULL,
  `color` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `color_lining_picture`
--

CREATE TABLE `color_lining_picture` (
  `id` int(11) NOT NULL,
  `color_lining_picture` varchar(255) DEFAULT NULL,
  `id_color_lining` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `is_in`
--

CREATE TABLE `is_in` (
  `id` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `id_color_leather` int(11) DEFAULT NULL,
  `id_color_lining` int(11) DEFAULT NULL,
  `id_basket` int(11) DEFAULT NULL,
  `id_order` int(11) DEFAULT NULL,
  `engraving` varchar(3) DEFAULT NULL,
  `quantity` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `id_order_status` int(11) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `order_status`
--

CREATE TABLE `order_status` (
  `id` int(11) NOT NULL,
  `statut` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `product_description` text NOT NULL,
  `product_price` float NOT NULL,
  `id_product_type` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `products_pics`
--

CREATE TABLE `products_pics` (
  `id` int(11) NOT NULL,
  `product_pics` varchar(255) NOT NULL,
  `id_products` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `product_type`
--

CREATE TABLE `product_type` (
  `id` int(11) NOT NULL,
  `product_type` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `users_role_role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_firstname` varchar(50) NOT NULL,
  `user_lastname` varchar(50) NOT NULL,
  `user_birthdate` date NOT NULL,
  `user_mail` varchar(50) NOT NULL,
  `user_phone` varchar(50) NOT NULL,
  `user_adress_number` int(6) NOT NULL,
  `user_adress_street` varchar(255) NOT NULL,
  `user_adress_complement` varchar(50) DEFAULT NULL,
  `user_adress_postal_code` int(6) NOT NULL,
  `user_adress_city` varchar(50) NOT NULL,
  `user_adress_country` varchar(50) NOT NULL,
  `user_username` varchar(50) NOT NULL,
  `user_password` varchar(60) NOT NULL,
  `id_roles` int(11) NOT NULL DEFAULT '2',
  `user_inscription_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `basket`
--
ALTER TABLE `basket`
  ADD PRIMARY KEY (`id`),
  ADD KEY `basket_users_FK` (`id_users`);

--
-- Indexes for table `color_leather`
--
ALTER TABLE `color_leather`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `color_leather_picture`
--
ALTER TABLE `color_leather_picture`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_id_color_leather_idx` (`id_color_leather`);

--
-- Indexes for table `color_lining`
--
ALTER TABLE `color_lining`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `color_lining_picture`
--
ALTER TABLE `color_lining_picture`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_color_lining_idx` (`id_color_lining`);

--
-- Indexes for table `is_in`
--
ALTER TABLE `is_in`
  ADD PRIMARY KEY (`id`),
  ADD KEY `is_in_basket_id_fk` (`id_basket`),
  ADD KEY `is_in_color_leather_id_fk` (`id_color_leather`),
  ADD KEY `is_in_color_lining_id_fk` (`id_color_lining`),
  ADD KEY `is_in_orders_id_fk` (`id_order`),
  ADD KEY `is_in_products_id_fk` (`id_product`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_order_status1_FK` (`id_order_status`);

--
-- Indexes for table `order_status`
--
ALTER TABLE `order_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_id_product_type_idx` (`id_product_type`);

--
-- Indexes for table `products_pics`
--
ALTER TABLE `products_pics`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_pics_products_FK` (`id_products`);

--
-- Indexes for table `product_type`
--
ALTER TABLE `product_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_roles_FK` (`id_roles`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `basket`
--
ALTER TABLE `basket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `color_leather`
--
ALTER TABLE `color_leather`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `color_leather_picture`
--
ALTER TABLE `color_leather_picture`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `color_lining`
--
ALTER TABLE `color_lining`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `color_lining_picture`
--
ALTER TABLE `color_lining_picture`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `is_in`
--
ALTER TABLE `is_in`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_status`
--
ALTER TABLE `order_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products_pics`
--
ALTER TABLE `products_pics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_type`
--
ALTER TABLE `product_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `basket`
--
ALTER TABLE `basket`
  ADD CONSTRAINT `basket_users_FK` FOREIGN KEY (`id_users`) REFERENCES `users` (`id`);

--
-- Constraints for table `color_leather_picture`
--
ALTER TABLE `color_leather_picture`
  ADD CONSTRAINT `FK_id_color_leather` FOREIGN KEY (`id_color_leather`) REFERENCES `color_leather` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `color_lining_picture`
--
ALTER TABLE `color_lining_picture`
  ADD CONSTRAINT `FK_color_lining` FOREIGN KEY (`id_color_lining`) REFERENCES `color_lining` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `is_in`
--
ALTER TABLE `is_in`
  ADD CONSTRAINT `is_in_basket_id_fk` FOREIGN KEY (`id_basket`) REFERENCES `basket` (`id`),
  ADD CONSTRAINT `is_in_color_leather_id_fk` FOREIGN KEY (`id_color_leather`) REFERENCES `color_leather` (`id`),
  ADD CONSTRAINT `is_in_color_lining_id_fk` FOREIGN KEY (`id_color_lining`) REFERENCES `color_lining` (`id`),
  ADD CONSTRAINT `is_in_orders_id_fk` FOREIGN KEY (`id_order`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `is_in_products_id_fk` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_order_status1_FK` FOREIGN KEY (`id_order_status`) REFERENCES `order_status` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `FK_id_product_type` FOREIGN KEY (`id_product_type`) REFERENCES `product_type` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `products_pics`
--
ALTER TABLE `products_pics`
  ADD CONSTRAINT `products_pics_products_FK` FOREIGN KEY (`id_products`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_roles_FK` FOREIGN KEY (`id_roles`) REFERENCES `roles` (`id`);
