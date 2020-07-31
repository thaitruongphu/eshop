-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 31, 2020 at 11:02 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` double NOT NULL,
  `user_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `product_id`, `quantity`, `user_id`, `created`, `modified`) VALUES
(44, 40, 1, 25, '2020-07-30 15:33:57', '2020-07-30 13:33:57');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(512) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `created` datetime NOT NULL,
  `modified` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='products that can be added to cart';

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `created`, `modified`) VALUES
(27, 'San Antonio Spurs Kawhi Leonard #2 \nAdidas Black T-Shirt', '&lt;p&gt;Kawhi Leonard San Antonio Spurs T shirt, made by Adidas the official on court producers of NBA apparel and jerseys.&lt;/p&gt;\r\n&lt;p&gt;Leonard and 2 are printed on the back in authentic font.&lt;/p&gt;\r\n&lt;ul&gt;\r\n&lt;li&gt;Basic Print&lt;/li&gt;\r\n&lt;li&gt;Officially licensed NBA Product&lt;/li&gt;\r\n&lt;li&gt;NBA Hologram Sticker&lt;/li&gt;\r\n&lt;li&gt;Mens Sizing&lt;/li&gt;\r\n&lt;li&gt;100% Cotton&lt;/li&gt;\r\n&lt;li&gt;Adidas &quot;Go To Tee&quot;&lt;/li&gt;\r\n&lt;/ul&gt;', '99.99', '2016-10-28 20:49:40', '2016-10-28 12:49:40'),
(28, 'LaMarcus Aldridge San Antonio Spurs NBA Adidas Player Black T-Shirt', '&lt;p&gt;Looks like a jersey, wears like a tee -- this 100% cotton Adidas NBA player name and number t-shirt sports screen prints of your favorite player\'s name and number, plus team graphics on the chest.&lt;/p&gt;\r\n&lt;p&gt;Officially licensed by the NBA.&lt;/p&gt;', '49.99', '2016-10-28 20:52:43', '2016-10-28 12:52:43'),
(29, 'Tim Duncan San Antonio Spurs Jersey Name and Number T-Shirt', '&lt;p&gt;Cheer on Tim Duncan and the Spurs as they begin their road to repeating as NBA champions.&lt;/p&gt;\r\n&lt;p&gt;Show your support for Duncan and the San Antonio Spurs in your very own black Spurs Name and Number Tee.&lt;/p&gt;', '29.99', '2016-10-28 20:56:23', '2016-10-28 12:56:23'),
(30, 'Women\'s Customized San Antonio Spurs Black Replica Basketball Jersey', '&lt;p&gt;San Antonio Spurs Custom Jerseys with any name and number.&lt;/p&gt;\r\n&lt;p&gt;Choose the style and size.&lt;/p&gt;\r\n&lt;p&gt;There\'s no better way to prove your loyalty than to make this jersey your own.&lt;/p&gt;', '29.99', '2016-10-28 20:58:02', '2016-10-28 12:58:02'),
(31, 'Klay Thompson Golden State Warriors Jersey Name and Number T-Shirt', '&lt;p&gt;It\'s Splash Time!&lt;/p&gt;\r\n&lt;p&gt;Make sure to show your support for the second half of the splash bros and get your very own Warriors Name and Number Tee.&lt;/p&gt;', '29.99', '2016-10-28 20:59:20', '2016-10-28 12:59:20'),
(32, 'Stephen Curry Golden State Warriors #30 NBA Youth Climalite Player T-Shirt Blue', '&lt;p&gt;Featuring your favorite player\'s name and number on back with team logo at front, this Climalite polyester t-shirt provides the ultimate display of pride for a die-hard fan!&lt;/p&gt;', '29.99', '2016-10-28 21:03:19', '2016-10-28 13:03:19'),
(33, 'Adidas Men\'s NBA Golden State Warriors-Kevin Durant #35-Mesh Logo T-Shirt', '&lt;p&gt;Show off how excited you are to welcome Kevin Durant to you Golden State Warriors with this Mesh Logo Tee from adidas.&lt;/p&gt;\r\n&lt;p&gt;It features cool graphics made from jersey like mesh and has KD\'s name and number on the back.&lt;/p&gt;\r\n&lt;p&gt;A great look, whether you\'re at the game, or a friends house watching the new look Warriors.&lt;/p&gt;', '29.99', '2016-10-28 21:05:30', '2016-10-28 13:05:30'),
(34, 'Klay Thompson Golden State Warriors Charcoal Chinese New Year Name and Number T-shirt', '&lt;p&gt;Cheer on Klay all the way to the NBA Finals in style with this unique Chinese New Year Jersey Name and Number t-shirt by adidas.&lt;/p&gt;', '29.99', '2016-10-28 21:06:34', '2016-10-28 13:06:34'),
(35, 'Kevin Durant #35 Women\'s Replica Name and Number Short Sleeve', '&lt;p&gt;Let everyone know who you will be cheering for this season in the adidas U Series high density name &amp;amp; number tee.&lt;/p&gt;\r\n&lt;p&gt;Adidas is the official outfitter of the NBA and this tee is the authentic take down name &amp;amp; number tee of your MVP.&lt;/p&gt;\r\n&lt;p&gt;A high density screen print on a soft cotton tee is a must have for every true NBA fan.&lt;/p&gt;', '32.24', '2016-10-28 21:08:05', '2016-10-28 13:08:05'),
(36, 'LeBron James Men\'s Navy Cleveland Cavaliers adidas Swingman Jersey', '&lt;p&gt;Prove you are the #1 LeBron James fan with this Swingman jersey from adidas!&amp;nbsp;&lt;/p&gt;\r\n&lt;p&gt;This Swingman is the ultimate Cleveland Cavaliers jersey. Whether it\'s going to the game, spending time with your friends or anything in-between - this jersey does it all.&amp;nbsp;&lt;/p&gt;\r\n&lt;p&gt;The Swingman includes adidas Climacool &amp;reg; performance mesh fabrication and one layer twill wordmark, name &amp;amp; number applications.&amp;nbsp;&lt;/p&gt;\r\n&lt;p&gt;The NBA Swingman jersey - the most authentic Swingman ever made.&lt;/p&gt;', '109.93', '2016-10-28 21:08:52', '2016-10-28 13:08:52'),
(37, 'NBA Cleveland Cavaliers Kyrie Irving #2 Men\'s Replica Jersey', '&lt;p&gt;Detailed to look like a real NBA jersey and priced to make you cheer!&lt;/p&gt;\r\n&lt;p&gt;This quality NBA Adidas Replica Revolution Jersey features screen printed team graphic, screen printed player name and number on the front and back, tagless collar, and embroidered Adidas and NBA logo\'s on the front.&lt;/p&gt;\r\n&lt;p&gt;This new style Adidas replica jersey is made of breathable, easy-care 100% polyester with Clima Cool fabrication. Officially licensed by the NBA.&lt;/p&gt;', '46.99', '2016-10-28 21:09:44', '2016-10-28 13:09:44'),
(38, 'Kevin Love Cleveland Cavaliers #0 NBA Youth Road Jersey Wine', '&lt;p&gt;Detailed to look like a real NBA jersey, sized for a youth, and priced to make you cheer!&lt;/p&gt;\r\n&lt;p&gt;This quality NBA Adidas Replica Jersey features screen printed team graphic, screen printed player name and number on the front and back, tagless collar, and embroidered Adidas and NBA logo\'s on the front.&lt;/p&gt;\r\n&lt;p&gt;Perfect for your child or for gift giving. Made of breathable, easy-care 100% polyester with Clima Cool fabrication. Officially licensed by the NBA.', '29.99', '2016-10-28 21:46:06', '2016-10-28 13:46:06'),
(40, 'For Mens San Antonio Spurs Kawhi Leonard #2 Cream White Christmas Day Swingman Basketball Jersey', '&lt;p&gt;This is 100% mesh polyester breathable and quick-dry jersey.&lt;/p&gt;\r\n&lt;p&gt;Player name and number graphics deliver classic style. priced to make you cheer.&lt;/p&gt;\r\n&lt;p&gt;It will be the best gift for you or your friend and family.&lt;/p&gt;', '32.00', '2016-11-02 20:15:38', '2016-11-02 12:15:38');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `name` varchar(512) NOT NULL,
  `created` datetime NOT NULL,
  `modified` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='image files related to a product';

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `name`, `created`, `modified`) VALUES
(83, 30, 'p41.jpg', '2016-10-28 20:58:02', '2016-10-28 12:58:02'),
(82, 29, 'p32.jpg', '2016-10-28 20:56:23', '2016-10-28 12:56:23'),
(81, 29, 'p31.jpg', '2016-10-28 20:56:23', '2016-10-28 12:56:23'),
(80, 28, 'p22.jpg', '2016-10-28 20:52:43', '2016-10-28 12:52:43'),
(79, 28, 'p21.jpg', '2016-10-28 20:52:43', '2016-10-28 12:52:43'),
(77, 27, 'p11.jpg', '2016-10-28 20:49:40', '2016-10-28 12:49:40'),
(78, 27, 'p12.jpg', '2016-10-28 20:49:40', '2016-10-28 12:49:40'),
(84, 31, 'p51.jpg', '2016-10-28 20:59:20', '2016-10-28 12:59:20'),
(85, 31, 'p52.jpg', '2016-10-28 20:59:20', '2016-10-28 12:59:20'),
(86, 32, 'p61.jpg', '2016-10-28 21:03:19', '2016-10-28 13:03:19'),
(87, 32, 'p62.jpg', '2016-10-28 21:03:19', '2016-10-28 13:03:19'),
(89, 33, 'p71.jpg', '2016-10-28 21:05:30', '2016-10-28 13:05:30'),
(90, 33, 'p72.jpg', '2016-10-28 21:05:30', '2016-10-28 13:05:30'),
(91, 34, 'p81.jpg', '2016-10-28 21:06:34', '2016-10-28 13:06:34'),
(92, 34, 'p82.jpg', '2016-10-28 21:06:34', '2016-10-28 13:06:34'),
(93, 34, 'p83.jpg', '2016-10-28 21:06:34', '2016-10-28 13:06:34'),
(94, 35, 'p91.jpg', '2016-10-28 21:08:05', '2016-10-28 13:08:05'),
(95, 35, 'p92.jpg', '2016-10-28 21:08:05', '2016-10-28 13:08:05'),
(96, 36, 'p101.jpg', '2016-10-28 21:08:52', '2016-10-28 13:08:52'),
(97, 36, 'p102.jpg', '2016-10-28 21:08:52', '2016-10-28 13:08:52'),
(98, 36, 'p103.jpg', '2016-10-28 21:08:52', '2016-10-28 13:08:52'),
(99, 37, 'p111.jpg', '2016-10-28 21:09:44', '2016-10-28 13:09:44'),
(100, 37, 'p112.jpg', '2016-10-28 21:09:44', '2016-10-28 13:09:44'),
(101, 37, 'p113.jpg', '2016-10-28 21:09:44', '2016-10-28 13:09:44'),
(102, 38, 'p121.jpg', '2016-10-28 21:46:06', '2016-10-28 13:46:06'),
(103, 38, 'p122.jpg', '2016-10-28 21:46:06', '2016-10-28 13:46:06'),
(104, 40, 'p131.jpg', '2016-11-02 20:15:38', '2016-11-02 12:15:38'),
(51, 14, 'gardman-r687-4-tier-mini-greenhouse-1.jpg', '0000-00-00 00:00:00', '2015-03-19 08:45:42'),
(52, 14, 'gardman-r687-4-tier-mini-greenhouse-2.jpg', '0000-00-00 00:00:00', '2015-03-19 08:45:42'),
(53, 15, 'spalding-nba-street-basketball-1.jpg', '0000-00-00 00:00:00', '2015-03-19 08:48:34'),
(54, 16, 'bandai-hobby-thousand-sunny-model-ship-one-piece-grand-ship-collection-1.jpg', '0000-00-00 00:00:00', '2015-03-19 09:02:25'),
(55, 16, 'bandai-hobby-thousand-sunny-model-ship-one-piece-grand-ship-collection-2.jpg', '0000-00-00 00:00:00', '2015-03-19 09:02:25'),
(56, 16, 'bandai-hobby-thousand-sunny-model-ship-one-piece-grand-ship-collection-3.jpg', '0000-00-00 00:00:00', '2015-03-19 09:02:25'),
(57, 16, 'bandai-hobby-thousand-sunny-model-ship-one-piece-grand-ship-collection-4.jpg', '0000-00-00 00:00:00', '2015-03-19 09:02:25'),
(59, 17, 'bandai-tamashii-nations-nami-new-world-ver-one-piece-figuartszero-bandai-tamashii-nations-2.jpg', '0000-00-00 00:00:00', '2015-03-19 09:07:20'),
(73, 17, '29097235540_b2fefed80d_k.jpg', '2016-09-17 22:01:17', '2016-09-17 14:01:17'),
(74, 25, '14194449_1363884933625826_1306807357_n.jpg', '2016-09-18 01:03:15', '2016-09-17 17:03:15'),
(61, 17, 'bandai-tamashii-nations-nami-new-world-ver-one-piece-figuartszero-bandai-tamashii-nations-4.jpg', '0000-00-00 00:00:00', '2015-03-19 09:07:20'),
(71, 17, 'bandai-tamashii-nations-nami-new-world-ver-one-piece-figuartszero-bandai-tamashii-nations-5.jpg', '2016-08-17 15:53:17', '2016-08-17 07:53:17'),
(67, 19, 'products.jpg', '0000-00-00 00:00:00', '2015-03-26 03:29:34'),
(69, 20, 'tp-link-mr3420-2.jpg', '2016-08-08 14:12:59', '2016-08-08 06:12:59'),
(70, 21, 'd-link-universal-modem.jpg', '2016-08-08 14:24:19', '2016-08-08 06:24:19'),
(75, 25, '29097235540_b2fefed80d_k.jpg', '2016-09-18 01:03:15', '2016-09-17 17:03:15'),
(76, 20, 'aaa.png', '2016-10-13 16:31:58', '2016-10-13 08:31:58');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(32) NOT NULL,
  `lastname` varchar(32) NOT NULL,
  `email` varchar(64) NOT NULL,
  `contact_number` varchar(64) NOT NULL,
  `address` text NOT NULL,
  `password` varchar(512) NOT NULL,
  `access_level` varchar(16) NOT NULL,
  `access_code` text NOT NULL,
  `status` int(11) NOT NULL COMMENT '0=pending,1=confirmed',
  `created` datetime NOT NULL,
  `modified` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='admin and customer users';

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `contact_number`, `address`, `password`, `access_level`, `access_code`, `status`, `created`, `modified`) VALUES
(1, 'Mike', 'Dalisay', 'mike@example.com', '0999999999', 'Blk. 24 A, Lot 6, Ph. 3, Peace Village', '$2y$10$AUBptrm9sQF696zr8Hv31On3x4wqnTihdCLocZmGLbiDvyLpyokL.', 'Admin', '', 1, '0000-00-00 00:00:00', '2016-06-13 11:17:47'),
(2, 'Lauro', 'Abogne', 'lauro@eacomm.com', '08888888', 'Pasig City', '$2y$10$it4i11kRKrB19FfpPRWsRO5qtgrgajL7NnxOq180MsIhCKhAmSdDa', 'Customer', '', 1, '0000-00-00 00:00:00', '2015-03-24 00:00:21'),
(4, 'Darwin', 'Dalisay', 'darwin@example.com', '9331868359', 'Blk 24 A Lot 6 Ph 3\r\nPeace Village, San Luis', '$2y$10$tLq9lTKDUt7EyTFhxL0QHuen/BgO9YQzFYTUyH50kJXLJ.ISO3HAO', 'Customer', 'ILXFBdMAbHVrJswNDnm231cziO8FZomn', 1, '2014-10-29 17:31:09', '2016-06-13 11:18:25'),
(7, 'Marisol Jane', 'Dalisay', 'mariz@gmail.com', '09998765432', 'Blk. 24 A, Lot 6, Ph. 3, Peace Village', 'mariz', 'Customer', '', 1, '2015-02-25 09:35:52', '2015-03-24 00:00:21'),
(9, 'Marykris', 'De Leon', 'marykrisdarell.deleon@gmail.com', '09194444444', 'Project 4, QC', '$2y$10$uUy7D5qmvaRYttLCx9wnU.WOD3/8URgOX7OBXHPpWyTDjU4ZteSEm', 'Customer', '', 1, '2015-02-27 14:28:46', '2015-03-23 23:51:03'),
(10, 'Merlin', 'Duckerberg', 'merlin@gmail.com', '09991112333', 'Project 2, Quezon City', '$2y$10$VHY58eALB1QyYsP71RHD1ewmVxZZp.wLuhejyQrufvdy041arx1Kq', 'Admin', '', 1, '2015-03-18 06:45:28', '2015-03-24 00:00:21'),
(14, 'Charlon', 'Ignacio', 'charlon@gmail.com', '09876543345', 'Tandang Sora, QC', '$2y$10$Fj6O1tPYI6UZRzJ9BNfFJuhURN9DnK5fQGHEsfol5LXRu.tCYYggu', 'Customer', '', 1, '2015-03-24 08:06:57', '2015-03-24 00:48:00'),
(15, 'Kobe Bro', 'Bryant', 'kobe@gmail.com', '09898787674', 'Los Angeles, California', '$2y$10$fmanyjJxNfJ8O3p9jjUixu6EOHkGZrThtcd..TeNz2g.XZyCIuVpm', 'Customer', '', 1, '2015-03-26 11:28:01', '2015-03-25 20:39:52'),
(20, 'Tim', 'Duncan', 'tim@example.com', '9999999', 'San Antonio, Texas, USA', '$2y$10$9OSKHLhiDdBkJTmd3VLnQeNPCtyH1IvZmcHrz4khBMHdxc8PLX5G6', 'Customer', '0X4JwsRmdif8UyyIHSOUjhZz9tva3Czj', 1, '2016-05-26 01:25:59', '2016-05-25 10:25:59'),
(21, 'Tony', 'Parker', 'tony@example.com', '8888888', 'Blk 24 A Lot 6 Ph 3\r\nPeace Village, San Luis', '$2y$10$lBJfvLyl/X5PieaztTYADOxOQeZJCqETayF.O9ld17z3hcKSJwZae', 'Customer', 'THM3xkZzXeza5ISoTyPKl6oLpVa88tYl', 1, '2016-05-26 01:29:01', '2016-06-13 10:46:33'),
(22, 'fgds', 'gsdfg', 'safasf@example.com', '3425234', 'sdafsadf', '$2y$10$xw1p0yuajiD6aeXySFh83OfK.pz9TF42cuVCr5NlqOA3hlUFTrEgC', 'Customer', '', 1, '2020-07-01 15:24:12', '2020-07-01 07:24:12'),
(23, 'asdfadsf', 'asdfsdaf', 'asdfasdf@example.com', 'asdfadsf', 'asdfdasf', '$2y$10$RmtY5GkmViNE3IxrwJND0eNDMt4BYhn88OOVKbIfyQo8F50p/fxHS', 'Customer', '', 1, '2020-07-01 15:24:46', '2020-07-01 07:24:46'),
(24, 'Thuong', 'Thuong', 'Thuong@Thuong', '1', 'Thuong', '$2y$10$YeUSh55udRiddSdPnS6ihu4zDur7ZQxb9eATZfltASdDnb0hA2i8u', 'Admin', '', 1, '2020-07-20 21:23:48', '2020-07-20 13:24:47'),
(25, 'Phu', 'Phu', 'Phu@Phu', '2', 'Phu', '$2y$10$HHIIuVf84RrHAvaLlEosMupHDkFb/AqHFTll5ieoHstXK8L/mzb6y', 'Customer', '', 1, '2020-07-20 21:24:11', '2020-07-20 13:24:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
