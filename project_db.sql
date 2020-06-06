-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 06, 2020 at 04:14 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblbrand`
--

CREATE TABLE `tblbrand` (
  `brandID` int(11) NOT NULL,
  `brandName` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblbrand`
--

INSERT INTO `tblbrand` (`brandID`, `brandName`) VALUES
(1, 'Microsoft'),
(2, 'Sony'),
(3, 'Cosair'),
(4, 'Razer'),
(5, 'HP'),
(6, 'Logitech'),
(7, 'Dell'),
(8, 'Lenovo'),
(9, 'Thinkpad'),
(10, 'Apple'),
(11, 'Surface');

-- --------------------------------------------------------

--
-- Table structure for table `tblcart`
--

CREATE TABLE `tblcart` (
  `cartID` int(11) NOT NULL,
  `openDate` date NOT NULL,
  `closeDate` date NOT NULL,
  `status` char(1) NOT NULL,
  `userID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblcart`
--

INSERT INTO `tblcart` (`cartID`, `openDate`, `closeDate`, `status`, `userID`) VALUES
(1, '2020-05-22', '2020-05-22', 'A', 1),
(2, '2020-05-25', '2020-05-25', 'A', 3),
(4, '2020-05-27', '2020-05-27', 'A', 4),
(5, '2020-05-28', '2020-05-28', 'A', 5),
(6, '2020-05-28', '2020-05-28', 'A', 6),
(7, '2020-05-28', '2020-05-28', 'A', 7),
(8, '2020-06-06', '2020-06-06', 'A', 8),
(9, '2020-06-06', '2020-06-06', 'A', 10),
(10, '2020-06-06', '2020-06-06', 'A', 11);

-- --------------------------------------------------------

--
-- Table structure for table `tblcat`
--

CREATE TABLE `tblcat` (
  `catID` int(11) NOT NULL,
  `catName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblcat`
--

INSERT INTO `tblcat` (`catID`, `catName`) VALUES
(1, 'keyboards'),
(2, 'mice'),
(3, 'monitors'),
(4, 'laptops'),
(5, 'tablets');

-- --------------------------------------------------------

--
-- Table structure for table `tblitems`
--

CREATE TABLE `tblitems` (
  `itemID` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `productID` int(11) NOT NULL,
  `cartID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblitems`
--

INSERT INTO `tblitems` (`itemID`, `qty`, `productID`, `cartID`) VALUES
(1, 0, 3, 1),
(2, 0, 17, 1),
(3, 0, 11, 1),
(4, 0, 14, 1),
(6, 0, 16, 1),
(7, 15, 2, 2),
(8, 13, 1, 2),
(9, 5, 9, 2),
(10, 8, 3, 2),
(11, 6, 12, 2),
(12, 13, 16, 2),
(13, 1, 9, 4),
(14, 4, 10, 4),
(15, 7, 17, 4),
(16, 3, 14, 4),
(17, 1, 15, 4),
(18, 4, 4, 4),
(19, 1, 10, 5),
(20, 5, 10, 2),
(22, 0, 14, 2),
(23, 2, 13, 2),
(24, 1, 15, 7),
(25, 2, 13, 5),
(26, 0, 2, 1),
(27, 0, 12, 1),
(28, 0, 9, 1),
(29, 0, 1, 1),
(30, 0, 9, 9),
(31, 0, 9, 10),
(32, 0, 7, 10);

-- --------------------------------------------------------

--
-- Table structure for table `tblproduct`
--

CREATE TABLE `tblproduct` (
  `productID` int(11) NOT NULL,
  `productName` varchar(120) NOT NULL,
  `productDesc` varchar(500) NOT NULL,
  `price` float NOT NULL,
  `catID` int(11) NOT NULL,
  `brandID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblproduct`
--

INSERT INTO `tblproduct` (`productID`, `productName`, `productDesc`, `price`, `catID`, `brandID`) VALUES
(1, 'Surface Pro x', 'The thinnest coolest neetist most awesome tablet like ever.', 2000, 4, 11),
(2, 'Dell XPS', 'Thin light and great keyboard deck, I mean who doesn\'t love carbon fiber', 1800, 4, 7),
(3, 'Logitech K400 Plus ', 'Logitech K400 Plus Wireless Touch Keyboard, Compact and slim: Perfect for the living room. Typing noise is within 55 dBA for all keys, 10-meter (33-foot) wireless range: Ensures trouble-free connection in the largest room, Plug-and-play design', 35, 1, 6),
(4, 'Microsoft Bluetooth Keyboard', 'Requires Windows 8 or higher ; Control media playback from your keyboard.\r\nWireless Bluetooth Smart technology.\r\nThe keyboard is full-sized with a built-in number pad.\r\nBlue Track Technology provides remarkable tracking onvirtually any surface.\r\nAmbidextrous design allows you to control your mousein either hand.\r\nUltra-thin and modern design complements your desktop.\r\nBluetooth Smart technology (support Bluetooth 4.0 only).', 94.99, 1, 1),
(5, 'Razer Gaming Keyboard', 'Customizable Chroma RGB Lighting - Individually Backlit Keys - Spill-Resistant Design - Programmable Macro Functionality\r\nThe #1 Selling Membrane Gaming Keyboard in the US: Source - NPD Group, Inc. (January - September 2019)\r\nAll-Around Gaming Performance: Able to execute up to ten commands at the same time with built-in key rollover anti-ghosting\r\nUltimate Personalization and Gaming Immersion with Razer Chroma: Offers effortless, full integration with popular game titles', 64.94, 1, 4),
(6, 'Corsair K95 Gaming Keyboard', 'Per-key RGB backlighting and a 19-zone LightEdge across the top of the keyboard delivers dynamic and vibrant lighting effects with near-limitless customization\r\nPrecision-molded 1 5mm thick 104/105-key PBT double-shot keycap set resists wear fading and shine through years of gaming\r\nGain an in-game advantage with six dedicated macro keys fully programmable for complex macros and key remaps or swap to the included S-key keycaps ', 269.99, 1, 3),
(7, 'Surface Laptop 3', 'Clean, elegant design — thin and light, starting at just 2.79 pounds, Surface Laptop 3 is easy to carry\r\nChoose from rich tone-on-tone color combinations: new Sandstone, plus Matte Black, Cobalt Blue, and Platinum\r\nImproved speed and performance to do what you want, with the latest processors – Surface Laptop 3 is up to two times faster than Surface Laptop 2\r\nMore ways to connect, with USB-C and USB-A ports for connecting to displays, docking stations and more, as well as accessory charging', 1349.99, 4, 11),
(8, 'Surface Book', 'This product has been professionally inspected and tested by Amazon-qualified suppliers. The product may have minimal scratches or dents, and a battery with at least 80% capacity. Box may be generic and accessories may not be original, but will be compatible and fully functional. This product comes with a 90-day supplier-backed warranty.', 855, 4, 11),
(9, 'Dell U3419w', 'Increased screen curvature improves your field of view, reduces reflections and creates near-uniform visual focus, so you can work comfortably for longer\r\nPicture-In-Picture (PIP) and Picture-By-Picture (PBP) features enable you to view content from two different computer sources simultaneously.\r\nWith USB-C connectivity you can connect your laptop to the monitor and charge up to 90Wi from a single source, protected by Dell’s built-in surge protection.\r\nPower Consumption (On mode):41 W', 1078.91, 3, 7),
(10, 'Lenovo ThinkVision', 'Optimize your working experience.\r\nLenovo Think vision s22e-19 - LED monitor - Full HD (1080P) - 21.5\"\r\nFull HD (1080P) 1920 x 1080 at 75 Hz\r\nHdmi, VGA', 145, 3, 8),
(11, 'HP EliteDisplay', 'HP EliteDisplay E243i 24 Inch LED Monitor\r\nBreak the boundaries\r\nWork comfortably\r\nExperience simple, convenient connectivity', 344.74, 3, 5),
(12, 'Logitech Wireless Mouse', 'Plug-and-play wireless: Get a reliable connection from a convenient nano receiver that stays in your computer\r\n1-year battery life: Go for a full year without a battery change (Battery life may vary based on user and computing conditions)\r\nLogitech reliability: Made by the global leader for mice and backed by a 3-year limited hardware warranty\r\nContoured shape: Gives you more comfort and control\r\nFor Windows and Mac computers: No software or setup hassles-start using your mouse right away', 14.88, 2, 6),
(13, 'Apple Magic Mouse', 'Magic Mouse 2 is completely rechargeable, so you’ll eliminate the use of traditional batteries.\r\nIt’s lighter, has fewer moving parts thanks to its built-in battery and continuous bottom shell, and has an optimized foot design — all helping Magic Mouse 2 track easier and move with less resistance across your desk.\r\nAnd the Multi-Touch surface allows you to perform simple gestures such as swiping between web pages and scrolling through documents.', 185.74, 2, 10),
(14, 'HP Photon Wireless Gaming Mouse', 'Wired mouse performance - proactive wireless technology and industry-leading optical-mechanical switch makes this gaming mouse as precise, Fast, and smooth As wired competitors\r\nQi wireless charging - easily charge the photon mouse with a Qi wireless charger or the OMEN by HP Outpost mouse pad (OMEN Outpost sold separately)\r\nNo more lag - 3x faster response time (0.2ms) than traditional mechanical mice with light beam detection', 163.22, 2, 5),
(15, 'Apple iPad', '10. 2-inch Retina display\r\nA10 Fusion chip\r\nTouch ID fingerprint sensor\r\n8MP back camera, 1. 2MP FaceTime HD front camera\r\nStereo speakers\r\n802. 11ac Wi-Fi\r\nUp to 10 hours of battery life', 519.98, 5, 10),
(16, 'Lenovo ThinkPad ', 'Intel Core i5-6300U 2.40GHz Processor\r\n8GB DDR3 Memory\r\n256GB Solid State Drive\r\n14\" 1920x1080 Touchscreen Display 360° Axis\r\nWindows 10 Pro x64', 779.99, 5, 9),
(17, 'Dell Latitude ', '12.3\" Touchscreen Display with Corning Gorilla Glass Protection (2880x1920) - Flexible 360 Hinge Movement Foldable to a Tablet\r\n7th Gen Intel Core i5-7Y54 1.20 GHz (Turbo 3.20 GHz, 2 Cores 4 Threads, 4MB SmartCache) | Integrated Intel HD Graphics 615\r\n256GB PCIe NVMe M.2 SSD | 8 GB 1866 MHz LPDDR3 SDRAM | WiFi + Bluetooth Combo | Infrared Camera\r\nWindows 10 Professional 64-bit (Keyboard and Pen Sold Separately)', 722.05, 5, 7);

-- --------------------------------------------------------

--
-- Table structure for table `tblproductimage`
--

CREATE TABLE `tblproductimage` (
  `imageID` int(11) NOT NULL,
  `imageURL` varchar(120) NOT NULL,
  `productID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblproductimage`
--

INSERT INTO `tblproductimage` (`imageID`, `imageURL`, `productID`) VALUES
(1, 'surface_prox_1.jpg', 1),
(2, 'surface_prox_2.jpg', 1),
(3, 'logitech_K400_1.jpg', 3),
(4, 'logitech_K400_2.jpg', 3),
(5, 'logitech_K400_3.jpg', 3),
(6, 'logitech_K400_4.jpg', 3),
(7, 'microsoft_bluetooth_keyboard_1.jpg', 4),
(8, 'microsoft_bluetooth_keyboard_2.jpg', 4),
(9, 'microsoft_bluetooth_keyboard_3.jpg', 4),
(10, 'microsoft_bluetooth_keyboard_4.jpg', 4),
(11, 'microsoft_bluetooth_keyboard_5.jpg', 4),
(12, 'razer_gaming_keyboard_1.jpg', 5),
(13, 'razer_gaming_keyboard_2.jpg', 5),
(14, 'razer_gaming_keyboard_3.jpg', 5),
(15, 'razer_gaming_keyboard_4.jpg', 5),
(16, 'razer_gaming_keyboard_5.jpg', 5),
(17, 'corsair_gaming_keyboard_1.jpg', 6),
(18, 'corsair_gaming_keyboard_2.jpg', 6),
(19, 'corsair_gaming_keyboard_3.jpg', 6),
(20, 'corsair_gaming_keyboard_4.jpg', 6),
(21, 'surface_laptop_1.jpg', 7),
(22, 'surface_laptop_2.jpg', 7),
(23, 'surface_laptop_3.jpg', 7),
(24, 'surface_laptop_4.jpg', 7),
(25, 'surface_laptop_5.jpg', 7),
(27, 'dellu3419w_1.jpg', 9),
(28, 'dellu3419w_2.jpg', 9),
(29, 'dellu3419w_3.jpg', 9),
(30, 'dellu3419w_4.jpg', 9),
(31, 'dellu3419w_5.jpg', 9),
(32, 'dellu3419w_6.jpg', 9),
(33, 'surface_book_1.jpg', 8),
(34, 'surface_book_2.jpg', 8),
(36, 'surface_book_3.jpg', 8),
(37, 'surface_book_4.jpg', 8),
(38, 'surface_book_5.jpg', 8),
(39, 'lenovothinkvision_1.jpg', 10),
(40, 'lenovothinkvision_2.jpg', 10),
(41, 'lenovothinkvision_3.jpg', 10),
(42, 'lenovothinkvision_4.jpg', 10),
(43, 'hpelitedisplay_1.jpg', 11),
(44, 'hpelitedisplay_2.jpg', 11),
(45, 'hpelitedisplay_3.jpg', 11),
(46, 'hpelitedisplay_4.jpg', 11),
(47, 'logitechwirelessmouse_1.jpg', 12),
(48, 'logitechwirelessmouse_2.jpg', 12),
(49, 'logitechwirelessmouse_3.jpg', 12),
(50, 'logitechwirelessmouse_4.jpg', 12),
(51, 'applemagicmouse_1.jpg', 13),
(52, 'applemagicmouse_2.jpg', 13),
(53, 'applemagicmouse_3.jpg', 13),
(54, 'hpphotonwireless_1.jpg', 14),
(55, 'hpphotonwireless_2.jpg', 14),
(56, 'hpphotonwireless_3.jpg', 14),
(57, 'hpphotonwireless_4.jpg', 14),
(58, 'hpphotonwireless_5.jpg', 14),
(59, 'appleiPad_1.jpg', 15),
(60, 'appleiPad_2.jpg', 15),
(61, 'appleiPad_3.jpg', 15),
(62, 'appleiPad_4.jpg', 15),
(63, 'appleiPad_5.jpg', 15),
(64, 'lenovothinkpad_1.jpg', 16),
(65, 'lenovothinkpad_2.jpg', 16),
(66, 'lenovothinkpad_3.jpg', 16),
(67, 'lenovothinkpad_4.jpg', 16),
(68, 'lenovothinkpad_5.jpg', 16),
(69, 'delllatitude_1.jpg', 17),
(70, 'delllatitude_2.jpg', 17),
(71, 'delllatitude_3.jpg', 17),
(72, 'delllatitude_4.jpg', 17),
(73, 'delllatitude_5.jpg', 17),
(74, 'surface_prox_3.jpg', 1),
(75, 'surface_prox_4.jpg', 1),
(76, 'surface_prox_6.jpg', 1),
(77, 'surface_prox_5.jpg', 1),
(78, 'dellxps_1.jpg', 2),
(79, 'dellxps_2.jpg', 2),
(80, 'dellxps_3.jpg', 2),
(81, 'dellxps_4.jpg', 2),
(82, 'dellxps_5.jpg', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbluser`
--

CREATE TABLE `tbluser` (
  `userID` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(120) NOT NULL,
  `status` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbluser`
--

INSERT INTO `tbluser` (`userID`, `username`, `password`, `email`, `status`) VALUES
(1, 'rui', 'rui', 'rui@gmail.com', 'A'),
(3, 'aaa', 'aaa', 'aaa@gmail.com', 'A'),
(4, 'bbb', 'bbb', 'bbb@gmail.com', 'A'),
(5, 'ccc', 'ccc', 'ccc@gmail.com', 'A'),
(6, 'ddd', 'ddd', 'ddd@gmail.com', 'A'),
(7, '666', '666', '666@gmail.com', 'A'),
(8, 'qqq', 'qqq', 'qqq@gmail.com', 'A'),
(9, '444', '444', '444@gmail.com', 'A'),
(10, '555', '555', '555@gmail.com', 'A'),
(11, '777', '777', '777@gmail.com', 'A');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblbrand`
--
ALTER TABLE `tblbrand`
  ADD PRIMARY KEY (`brandID`);

--
-- Indexes for table `tblcart`
--
ALTER TABLE `tblcart`
  ADD PRIMARY KEY (`cartID`);

--
-- Indexes for table `tblcat`
--
ALTER TABLE `tblcat`
  ADD PRIMARY KEY (`catID`);

--
-- Indexes for table `tblitems`
--
ALTER TABLE `tblitems`
  ADD PRIMARY KEY (`itemID`);

--
-- Indexes for table `tblproduct`
--
ALTER TABLE `tblproduct`
  ADD PRIMARY KEY (`productID`);

--
-- Indexes for table `tblproductimage`
--
ALTER TABLE `tblproductimage`
  ADD PRIMARY KEY (`imageID`);

--
-- Indexes for table `tbluser`
--
ALTER TABLE `tbluser`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblbrand`
--
ALTER TABLE `tblbrand`
  MODIFY `brandID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tblcart`
--
ALTER TABLE `tblcart`
  MODIFY `cartID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tblcat`
--
ALTER TABLE `tblcat`
  MODIFY `catID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tblitems`
--
ALTER TABLE `tblitems`
  MODIFY `itemID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `tblproduct`
--
ALTER TABLE `tblproduct`
  MODIFY `productID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tblproductimage`
--
ALTER TABLE `tblproductimage`
  MODIFY `imageID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `tbluser`
--
ALTER TABLE `tbluser`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
