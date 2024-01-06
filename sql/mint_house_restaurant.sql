-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 01, 2024 at 03:23 PM
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
-- Database: `mint_house_restaurant`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_account`
--

CREATE TABLE `admin_account` (
  `AdminID` int(11) NOT NULL,
  `FullName` varchar(100) NOT NULL,
  `Phone` varchar(20) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Birthday` varchar(10) NOT NULL,
  `Username` varchar(20) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `ProfileImage` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_account`
--

INSERT INTO `admin_account` (`AdminID`, `FullName`, `Phone`, `Email`, `Birthday`, `Username`, `Password`, `ProfileImage`) VALUES
(1, 'admin', 'admin', 'admin@gmail.com', '2024-01-01', 'admin', 'admin', 'admin.png'),
(2, 'admin', 'admin', 'admin@gmail.com', '2024-01-10', 'admin1', 'admin', 'admin1.png'),
(4, 'KurZa', '0935175094', 'kurzayt@gmail.com', '2002-12-23', 'KurZa', '23122002', 'KurZa.png');

-- --------------------------------------------------------

--
-- Table structure for table `customer_question`
--

CREATE TABLE `customer_question` (
  `QuestionID` int(11) NOT NULL,
  `FullName` varchar(100) NOT NULL,
  `Phone` varchar(20) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Message` text NOT NULL,
  `Status` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer_question`
--

INSERT INTO `customer_question` (`QuestionID`, `FullName`, `Phone`, `Email`, `Message`, `Status`) VALUES
(1, 'Pham Hoang Thang', '0935175094', 'phthang.20it3@vku.udn.vn', 'aksjdoakwod kdoaksopdkwopa dosakdowkapd', 'checked'),
(2, 'Phạm Hoàng Thắng', '0935175094', 'phthang.20it3@vku.udn.vn', 'Hello tôi muốn hỏi là liệu có cách nào để được giảm giá hay không?', 'checked'),
(3, 'Phạm Hoàng Thắng', '0935175094', 'phthang.20it3@vku.udn.vn', 'Hello tôi muốn hỏi là liệu có cách nào để được giảm giá hay không?', 'checked');

-- --------------------------------------------------------

--
-- Table structure for table `menu_item`
--

CREATE TABLE `menu_item` (
  `ItemID` varchar(10) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Description` text NOT NULL,
  `Image` text DEFAULT NULL,
  `Price` double(10,2) NOT NULL,
  `Type` varchar(10) NOT NULL,
  `Trending` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `menu_item`
--

INSERT INTO `menu_item` (`ItemID`, `Name`, `Description`, `Image`, `Price`, `Type`, `Trending`) VALUES
('BANHGIO', 'Rice &amp; Pork Dumplings', 'Rice &amp; Pork Dumplings is a originally a steamed street snack from Northern Vietnam. It’s a small, savory snack great any time of the day, made with a rice flour outer layer, ground pork, mushroom and onion filling and all with a special aroma from a banana leaf wrapper.', 'BANHGIO.jpg', 7.00, 'desert', 'yes'),
('BANHXEO', 'Vietnamese Sizzle Pancake', 'Vietnamese Sizzle Pancake or Bánh Xèo (pronounced BAN-sew) is a very popular dish to every Vietnamese. It has a crispy crepe-like layer made of a mix of turmeric powder and rice flour, stuffed with various ingredients, but most common are veggies, mung beans and meat, sometimes seafood or pork.', 'BANHXEO.jpg', 40.00, 'main', 'yes'),
('BTNUONG', 'Grilled Pork &amp; Rice Noodle', 'Made with simple everyday ingredients, Bún Thịt Nướng, also known as Vietnamese Grilled Pork &amp; Rice Noodles, comes together quickly and easily. This bowl features sweet caramelized pork over rice noodles. Packed with a ton of flavour, it’s also fresh and vibrant! You’ll want to reach for seconds.', 'BTNUONG.jpg', 50.00, 'main', 'yes'),
('CHETHAPCAM', 'Vietnamese Mixed Sweet Soup', 'Vietnamese Mixed Sweet Soup is a popular and versatile treat enjoyed in various forms, from puddings to refreshing drinks. It boasts an array of ingredients, including fruits, beans, seeds, and tapioca, often complemented by coconut milk. Traditional recipes have evolved with modern twists, offering a diverse range of flavors.', 'CHETHAPCAM.jpg', 15.00, 'desert', 'yes'),
('CHEXOINUOC', 'Glutinous Rice Balls', 'Vietnamese Glutinous Rice Balls are filled with mung bean paste and bathed in the fragrant and sweet ginger syrup. This warm dessert is very fulfilling and comforting.', 'CHEXOINUOC.jpg', 12.00, 'desert', 'no'),
('COMGA', 'Vietnamese Chicken Rice', 'Vietnamese Chicken Rice is one of the signature dishes of Vietnam, especially Hoi An, a small ancient town in Central Vietnam. It features shredded chicken tossed with Vietnamese coriander, onions, and lime juice dressing. The chicken salad is then served with turmeric rice cooked directly in chicken stock.', 'COMGA.jpg', 45.00, 'main', 'yes'),
('COMTAM', 'Vietnamese Broken Rice', 'Vietnamese(Cơm Tấm), a popular dish among international food lovers, is a source of pride for Saigon people. It is a staple for Vietnamese people from all walks of life.', 'COMTAM.jpg', 45.00, 'main', 'no'),
('MIQUANG', 'Quang Noodles', 'Quang Noodles(Mì Quảng) is a popular noodle dish that originated from Quang Nam Province in Central Vietnam. It is a must-try noodle dish if you ever visit the popular city of Hoi An and the northern neighboring city of Đa Nang.', 'MIQUANG.jpg', 42.00, 'main', 'no'),
('NUOCDUA', 'Coconut Juice', 'Coconut juice is a widely consumed beverage across Vietnam, renowned for its sweet and refreshing taste that brings a cooling sensation. Popular on any stunning beach, Vietnamese coconut water is loved by numerous tourists. Among various Vietnamese drinks, it is not only a healthy thirst-quencher but also an iconic ingredient in the Vietnamese culinary landscape and a symbol of the country’s tropical nature and vibrant culture.', 'NUOCDUA.jpg', 10.00, 'drink', 'yes'),
('NUOCMIA', 'Sugarcane Juice', 'Vietnamese drinks offer a tantalizing array of flavors. One stands out among them, which is Vietnamese Sugarcane Juice. This refreshing elixir is a beloved staple on the sweltering streets of Vietnam that delivers a respite from the heat.', 'NUOCMIA.jpg', 10.00, 'drink', 'yes'),
('NUOCSAM', 'Vietnamese Herbal Tea', 'Vietnamese herbal tea is usually served with ice, which makes it a refreshing drink in the middle of a hot and humid summer day. This drink is inspired by Chinese medicine with a focus on ingredients that have “cooling” properties.', 'NUOCSAM.jpg', 10.00, 'drink', 'no'),
('SCNEPCAM', 'Black Sticky Rice Yogurt', 'Vietnamese Yogurt Black Sticky Rice Pudding is a beloved dessert of people of all ages in Vietnam. The tartness of yogurt combining with the light sweetness and richness of soft-chewy black sticky rice can cool you down quickly on hot summer days.', 'SCNEPCAM.jpg', 12.00, 'desert', 'no'),
('TAOPHO', 'Tofu Pudding', 'Tofu Pudding is a very popular street treat for Vietnamese people, especially for Saigonese who find a bowl of tofu pudding a fine idea on a typical hot day.', 'TAOPHO.jpg', 15.00, 'desert', 'yes'),
('TRAMOT', 'Mot Tea', 'The main ingredients of Mot Tea are lime and lemongrass, along with famous herbs such as licorice, jasmine, chrysanthemum, lotus leaf, ginger, cinnamon, and other ingredients. All are mixed together to create a drink that is both sweet and sophisticated, which everyone falls in love with.', 'TRAMOT.jpg', 10.00, 'drink', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `table_reservation_order`
--

CREATE TABLE `table_reservation_order` (
  `OrderID` int(11) NOT NULL,
  `FullName` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Phone` varchar(20) NOT NULL,
  `NumOfPeople` int(1) NOT NULL,
  `Date` varchar(10) NOT NULL,
  `Time` int(1) NOT NULL,
  `SpecialRequest` text DEFAULT NULL,
  `Status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `table_reservation_order`
--

INSERT INTO `table_reservation_order` (`OrderID`, `FullName`, `Email`, `Phone`, `NumOfPeople`, `Date`, `Time`, `SpecialRequest`, `Status`) VALUES
(1, 'Pham Hoang Thang', 'phthang.20it3@vku.udn.vn', '0935175094', 1, '2024-01-02', 5, '', 'declined');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_account`
--
ALTER TABLE `admin_account`
  ADD PRIMARY KEY (`AdminID`),
  ADD UNIQUE KEY `Username` (`Username`);

--
-- Indexes for table `customer_question`
--
ALTER TABLE `customer_question`
  ADD PRIMARY KEY (`QuestionID`);

--
-- Indexes for table `menu_item`
--
ALTER TABLE `menu_item`
  ADD PRIMARY KEY (`ItemID`),
  ADD UNIQUE KEY `Item Name` (`Name`);

--
-- Indexes for table `table_reservation_order`
--
ALTER TABLE `table_reservation_order`
  ADD PRIMARY KEY (`OrderID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_account`
--
ALTER TABLE `admin_account`
  MODIFY `AdminID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `customer_question`
--
ALTER TABLE `customer_question`
  MODIFY `QuestionID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `table_reservation_order`
--
ALTER TABLE `table_reservation_order`
  MODIFY `OrderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
