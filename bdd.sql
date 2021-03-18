-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Mar 08, 2021 at 09:10 AM
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

--
-- Dumping data for table `color_leather`
--

INSERT INTO `color_leather` (`id`, `color`) VALUES
(1, 'Rouge'),
(2, 'Noir');

-- --------------------------------------------------------

--
-- Table structure for table `color_lining`
--

CREATE TABLE `color_lining` (
  `id` int(11) NOT NULL,
  `color` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `color_lining`
--

INSERT INTO `color_lining` (`id`, `color`) VALUES
(1, 'Bleu'),
(2, 'Vert');

-- --------------------------------------------------------

--
-- Table structure for table `is_in`
--

CREATE TABLE `is_in` (
  `id` int(11) NOT NULL,
  `id_basket` int(11) NOT NULL,
  `id_color_leather` int(11) NOT NULL,
  `id_color_lining` int(11) NOT NULL,
  `id_engraving` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `id_basket` int(11) NOT NULL,
  `id_users` int(11) NOT NULL,
  `id_order_status` int(11) NOT NULL
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

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `product_description`, `product_price`, `id_product_type`) VALUES
(5, 'Test4', 'mkjvhefoubvnaz', 1.5, 1),
(6, '', '', 1.9, 1),
(7, 'Test8', 'mqlksfnvzgrijdfnvaeo', 1.9, 1);

-- --------------------------------------------------------

--
-- Table structure for table `products_pics`
--

CREATE TABLE `products_pics` (
  `id` int(11) NOT NULL,
  `product_pics` varchar(255) NOT NULL,
  `id_products` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products_pics`
--

INSERT INTO `products_pics` (`id`, `product_pics`, `id_products`) VALUES
(17, 'view/assets/img/Capture d’écran 2021-03-06 à 13.10.58.png', 5),
(18, 'view/assets/img/Capture d’écran 2021-03-06 à 13.10.58 (2).png', 7);

-- --------------------------------------------------------

--
-- Table structure for table `product_engraving`
--

CREATE TABLE `product_engraving` (
  `id` int(11) NOT NULL,
  `engraving` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `product_type`
--

CREATE TABLE `product_type` (
  `id` int(11) NOT NULL,
  `product_type` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product_type`
--

INSERT INTO `product_type` (`id`, `product_type`) VALUES
(1, 'Sur-mesure'),
(2, 'Collection');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `users_role_role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `users_role_role`) VALUES
(1, 'admin'),
(2, 'user');

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
  `user_adress_country` varchar(50) NOT NULL,
  `user_username` varchar(50) NOT NULL,
  `user_password` varchar(60) NOT NULL,
  `id_roles` int(11) NOT NULL DEFAULT '2'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_firstname`, `user_lastname`, `user_birthdate`, `user_mail`, `user_phone`, `user_adress_number`, `user_adress_street`, `user_adress_complement`, `user_adress_postal_code`, `user_adress_country`, `user_username`, `user_password`, `id_roles`) VALUES
(1, 'Victor', 'Paradinas', '1992-02-06', 'victor@paradinas.fr', '0786115434', 0, '', NULL, 0, '', '', '', 1),
(5, 'Théo', 'Richerol', '1996-02-04', 'theo@studio-4c.fr', '0617910429', 8, 'Boulevard Déodat de Séverac', 'Bat C APPT 403', 31300, 'France', 'theo', '$2y$10$2LeclZ7c/.bwARK1eToQeeC9BHxbBL/BFBf0T1ocg4/Vpszmekhlm', 2),
(6, 'Claire', 'Vaillant', '1998-02-07', 'claire.demeix@gmail.com', '0777287441', 8, 'Boulevard Déodat de Séverac', '', 31300, 'France', 'claire', '$2y$10$Cx0kKikJ.lp2nAZkZA1DZO9mNS/ttHoTXz1jmAU4Q6puVLtvtLhGu', 2);

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
-- Indexes for table `color_lining`
--
ALTER TABLE `color_lining`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `is_in`
--
ALTER TABLE `is_in`
  ADD PRIMARY KEY (`id`,`id_basket`),
  ADD KEY `is_in_basket0_FK` (`id_basket`),
  ADD KEY `id_color_leather` (`id_color_leather`),
  ADD KEY `id_color_lining` (`id_color_lining`),
  ADD KEY `id_engraving` (`id_engraving`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_basket_FK` (`id_basket`),
  ADD KEY `orders_users0_FK` (`id_users`),
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
-- Indexes for table `product_engraving`
--
ALTER TABLE `product_engraving`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `color_lining`
--
ALTER TABLE `color_lining`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `products_pics`
--
ALTER TABLE `products_pics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `product_engraving`
--
ALTER TABLE `product_engraving`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_type`
--
ALTER TABLE `product_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `basket`
--
ALTER TABLE `basket`
  ADD CONSTRAINT `basket_users_FK` FOREIGN KEY (`id_users`) REFERENCES `users` (`id`);

--
-- Constraints for table `is_in`
--
ALTER TABLE `is_in`
  ADD CONSTRAINT `is_in_basket0_FK` FOREIGN KEY (`id_basket`) REFERENCES `basket` (`id`),
  ADD CONSTRAINT `is_in_ibfk_1` FOREIGN KEY (`id_engraving`) REFERENCES `product_engraving` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `is_in_ibfk_2` FOREIGN KEY (`id_color_lining`) REFERENCES `color_lining` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `is_in_ibfk_3` FOREIGN KEY (`id_color_leather`) REFERENCES `color_leather` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `is_in_products_FK` FOREIGN KEY (`id`) REFERENCES `products` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_basket_FK` FOREIGN KEY (`id_basket`) REFERENCES `basket` (`id`),
  ADD CONSTRAINT `orders_order_status1_FK` FOREIGN KEY (`id_order_status`) REFERENCES `order_status` (`id`),
  ADD CONSTRAINT `orders_users0_FK` FOREIGN KEY (`id_users`) REFERENCES `users` (`id`);

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
