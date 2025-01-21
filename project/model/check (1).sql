-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 21, 2025 at 06:44 PM
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
-- Database: `check`
--

-- --------------------------------------------------------

--
-- Table structure for table `ads`
--

CREATE TABLE `ads` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `ad_title` varchar(255) NOT NULL,
  `ad_description` mediumtext NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `ad_photo` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `category` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ads`
--

INSERT INTO `ads` (`id`, `user_id`, `ad_title`, `ad_description`, `phone`, `email`, `price`, `ad_photo`, `category`) VALUES
(3, 18, 'asdfasdfasdfasdf', 'asdfasdfasdf asdffasdfasdf', '82030489234', 'opiiii@gmail.com', 123123, 'fridge.jpeg', 'Daily living'),
(4, 13, 'I am Selling Iphone ', 'I am selling a fresh Iphone 13 pro max I am selling a fresh Iphone 13 pro max I am selling a fresh Iphone 13 pro max.Price is not negotiable', '0177234234', 'opi@gmail.com', 47018, 'iphone_1.jpeg', 'Mobile'),
(8, 24, 'seeling fruits', 'ajkl;sdlkjfklasdfljk;a;klsjdf asdlkfjaklsdjflajsdl;kjf asdf', '01839487392', 'shohan@gmail.com', 12000, 'fruits.jpg', 'Electronics'),
(9, 24, 'selling home', 'seliing home seliing home seliing home seliing home seliing home seliing home seliing home seliing home fridge', '0182934111', 'aasdf@gmail.com', 200000, 'home.jpg', 'Electronics'),
(11, 18, 'Selling a Puppy', 'I am seeling a Puppy.I am selling a puppy. I am sellin a Puppy I am seeling a Puppy.I am selling a puppy. I am sellin a Puppy I am seeling a Puppy.I am selling a puppy. I am sellin a Puppy I am seeling a Puppy.I am selling a puppy. I am sellin a Puppy', '0188283121234', 'towsif1528@gmail.com', 2000, 'puppy.png', 'Electronics');

-- --------------------------------------------------------

--
-- Table structure for table `ad_statistics`
--

CREATE TABLE `ad_statistics` (
  `id` int(11) NOT NULL,
  `impressions` int(11) NOT NULL,
  `report` int(11) NOT NULL,
  `date_posted` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ad_statistics`
--

INSERT INTO `ad_statistics` (`id`, `impressions`, `report`, `date_posted`) VALUES
(3, 51, 29, '2025-01-17'),
(4, 12, 4, '2025-01-17'),
(8, 1, 0, '2025-01-17'),
(9, 3, 1, '2025-01-17'),
(11, 1, 1, '0000-00-00'),
(20, 0, 0, '2025-01-18'),
(21, 0, 0, '2025-01-18'),
(22, 0, 0, '2025-01-18'),
(23, 0, 0, '2025-01-18'),
(24, 0, 0, '2025-01-18'),
(25, 0, 0, '2025-01-18'),
(26, 0, 0, '2025-01-18'),
(27, 0, 0, '2025-01-18'),
(28, 0, 0, '2025-01-18');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(255) NOT NULL,
  `profile_pic` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `profile_pic`, `password`, `user_id`, `email`, `type`, `status`) VALUES
('admin', 'admin_pic.jpg', '110918', 1, 'towsif1528@gmail.com', 'Admin', ''),
('rafiul hassan', 'profile_pic1.png', '123456', 11, 'rafiul@gmail.com', 'Advertiser', ''),
('tawsif', '', '1234', 12, 'tawsif@gmail.com', 'Admin', ''),
('farjana', 'opi_pic.jpg', '1103', 13, 'farjan@gmail.com', 'Advertiser', 'Active'),
('Shohan', 'shohan.jpeg', '12345', 18, 'advertiser2@gmail.com', 'Advertiser', 'Inactive'),
('towsif_adv', 'towsif_pic.jpg', '1234', 24, 'towsifadv@gmail.com', 'Advertiser', 'Active'),
('JaneSmith', 'profile_pic3.png', 'mypassword1', 40, 'janesmith@example.com', 'Admin', 'Active'),
('SophiaGreen', 'profile_pic6.png', 'sophia2025', 43, 'sophiagreen@gmail.com', 'Admin', 'Inactive'),
('OliviaBlack', 'profile_pic10.png', 'olivia789', 47, 'oliviablack@gmail.com', 'Admin', 'Inactive'),
('MiaOrange', 'profile_pic14.png', 'miapassword2025', 51, 'miaorange@yahoo.com', 'Admin', 'Inactive'),
('ZoeBrown', 'profile_pic16.png', 'zoepassword21', 53, 'zoebrown@aol.com', 'Admin', 'Inactive'),
('JacksonGrey', 'profile_pic19.png', 'jacksonpass789', 56, 'jasongrey@aol.com', 'Admin', 'Active'),
('asdfasdf', 'profile_pic1.png', 'password1', 58, 'abc@gmail.com', 'User', 'Active'),
('user2', 'profile_pic2.png', 'password2', 59, 'user2@example.com', 'Admin', 'Inactive'),
('Tishat', 'user2.jpg', 'password3', 60, 'towsif1528@gmail.com', 'User', 'Active'),
('user5', 'profile_pic5.png', 'password5', 62, 'user5@example.com', 'Admin', 'Inactive'),
('user9', 'profile_pic4.png', 'password9', 66, 'user9@example.com', 'Admin', 'Inactive'),
('user11', 'profile_pic1.png', 'password11', 68, 'user11@example.com', 'Admin', 'Active'),
('user13', 'profile_pic3.png', 'password13', 70, 'user13@example.com', 'Admin', 'Active'),
('user16', 'profile_pic1.png', 'password16', 73, 'user16@example.com', 'Admin', 'Inactive'),
('user19', 'profile_pic4.png', 'password19', 76, 'user19@example.com', 'Admin', 'Active'),
('tutor', 'profile_pic2.png', '110918', 78, 'tutor@gmail.com', 'Advertiser', 'Active'),
('asdffff', '', '111111', 80, 'asdf@dsf.com', 'User', 'Active'),
('newopi', 'opi_pic.jpg', '123456', 83, 'newopi@gamil.com', 'User', 'Inactive'),
('opiopi', '', '110918', 84, 'opiopi@gmail.com', 'User', 'Active'),
('Tishat', '', '110918', 85, 'towsif1528@gmail.com', 'User', 'Active'),
('Tishat', '', '110918', 86, 'towsif1528@gmail.com', 'User', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(11) NOT NULL,
  `ad_title` varchar(255) NOT NULL,
  `ad_description` text DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` enum('active','inactive') DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`id`, `ad_title`, `ad_description`, `price`, `created_at`, `status`) VALUES
(1, 'Samsung Galaxy S21', 'Brand new Samsung Galaxy S21, 128GB storage, 5G compatible.', 27000.00, '2025-01-18 10:19:23', 'active'),
(2, 'Vintage Wooden Chair', 'Handcrafted vintage wooden chair, perfect for your home decor.', 12500.00, '2025-01-18 10:19:23', 'inactive'),
(3, 'Gaming Laptop', 'High-performance gaming laptop with a powerful GPU and 16GB RAM.', 140000.00, '2025-01-18 10:19:23', 'active'),
(4, 'Electric Bike', 'Eco-friendly electric bike with a 50-mile range per charge.', 85000.00, '2025-01-18 10:19:23', 'active'),
(5, 'Leather Jacket', 'Genuine leather jacket in size L, stylish and comfortable.', 22000.00, '2025-01-18 10:19:23', 'inactive'),
(6, 'Smartwatch Series 7', 'Apple Watch Series 7 with all features, brand new in box.', 35000.00, '2025-01-18 10:19:23', 'active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ads`
--
ALTER TABLE `ads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ad_statistics`
--
ALTER TABLE `ad_statistics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ads`
--
ALTER TABLE `ads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
