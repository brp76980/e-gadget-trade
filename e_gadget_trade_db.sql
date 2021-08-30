-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 17, 2021 at 02:42 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e_gadget_trade_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(6) NOT NULL,
  `item_id` int(6) NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=44 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `item_id`, `reg_date`) VALUES
(1, 2, 1, '2021-08-11 13:20:22'),
(2, 2, 26, '2021-08-11 13:20:29'),
(3, 2, 4, '2021-08-11 13:39:45'),
(4, 2, 4, '2021-08-11 13:39:49'),
(9, 4, 1, '2021-08-11 13:53:52'),
(6, 4, 4, '2021-08-11 13:41:27'),
(8, 4, 1, '2021-08-11 13:53:24'),
(10, 4, 1, '2021-08-11 13:54:28'),
(11, 4, 1, '2021-08-11 13:54:45'),
(12, 4, 1, '2021-08-11 13:54:53'),
(13, 4, 1, '2021-08-11 13:54:53'),
(14, 4, 1, '2021-08-11 13:54:54'),
(15, 4, 1, '2021-08-11 13:54:54'),
(16, 4, 1, '2021-08-11 13:54:54'),
(17, 4, 1, '2021-08-11 13:54:54'),
(18, 4, 1, '2021-08-11 13:54:54'),
(19, 4, 1, '2021-08-11 13:54:54'),
(20, 4, 1, '2021-08-11 13:54:54'),
(21, 4, 1, '2021-08-11 13:54:55'),
(22, 4, 1, '2021-08-11 13:54:55'),
(23, 4, 1, '2021-08-11 13:54:55'),
(24, 4, 1, '2021-08-11 13:54:55'),
(25, 4, 1, '2021-08-11 13:54:55'),
(26, 4, 1, '2021-08-11 13:54:56'),
(27, 4, 1, '2021-08-11 13:54:56'),
(28, 4, 1, '2021-08-11 13:54:56'),
(29, 4, 1, '2021-08-11 13:54:56'),
(30, 4, 1, '2021-08-11 13:54:56'),
(31, 4, 1, '2021-08-11 13:54:56'),
(32, 4, 1, '2021-08-11 13:54:57'),
(33, 4, 1, '2021-08-11 13:54:57'),
(34, 4, 1, '2021-08-11 13:54:57'),
(35, 4, 1, '2021-08-11 13:54:57'),
(36, 4, 1, '2021-08-11 13:54:57'),
(37, 4, 1, '2021-08-11 13:54:57'),
(38, 4, 1, '2021-08-11 13:54:58'),
(39, 4, 1, '2021-08-11 13:54:58'),
(40, 4, 1, '2021-08-11 13:54:58'),
(41, 4, 1, '2021-08-11 13:54:58'),
(42, 4, 1, '2021-08-11 13:54:58'),
(43, 4, 1, '2021-08-11 13:54:58');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

DROP TABLE IF EXISTS `items`;
CREATE TABLE IF NOT EXISTS `items` (
  `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(6) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(6) NOT NULL,
  `item_condition` varchar(255) NOT NULL,
  `image_link` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `specifications` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=101 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `user_id`, `name`, `price`, `item_condition`, `image_link`, `type`, `specifications`, `location`, `reg_date`) VALUES
(1, 12, '2021 Newest HP 14\" HD Laptop for Business and Student, Intel Celeron N4020(up to 2.8GHz', 27, 'new', 'sample-image-07.png', 'Computers and Laptops', '2021 Newest HP 14\" HD Laptop for Business and Student, Intel Celeron N4020(up to 2.8GHz), 4GB RAM, 64GB eMMC, 1 Year Office 365, USB-A&C, WiFi, Webcam, HDMI, Win10 S, w/Ghost Manta 64GB SD Card ', 'Guelph', '2021-08-11 19:54:51'),
(2, 15, 'COOKLEE 6-IN-1 Stand Mixer', 81, 'new', 'sample-image-02.png', 'Home Appliances', 'COOKLEE 6-IN-1 Stand Mixer, 8.5 Qt. Multifunctional Electric Kitchen Mixer with 9 Accessories for Most Home Cooks, SM-1507BM, Nero Nemesis Black', 'Bancroft', '2021-08-11 20:16:08'),
(3, 22, 'Canon EOS Rebel T7 DSLR Camera Bundle with Canon EF-S 18-55mm ', 47, 'new', 'sample-image-07.png', 'Cameras', 'Canon EOS Rebel T7 DSLR Camera Bundle with Canon EF-S 18-55mm f/3.5-5.6 is II Lens + 2pc SanDisk 32GB Memory Cards + Accessory Kit ', 'Oshawa', '2021-08-11 20:02:08'),
(4, 13, 'Lenovo IdeaPad 5i Pro 16\" Laptop, 16.0\" QHD (2560 x 1600) Display, Intel Core i5-11300H Processor', 125, 'used', 'sample-image-02.png', 'Computers and Laptops', 'Lenovo IdeaPad 5i Pro 16\" Laptop, 16.0\" QHD (2560 x 1600) Display, Intel Core i5-11300H Processor, 16GB DDR4 RAM, 512GB M.2 SSD Storage, NVIDIA GeForce MX450, Windows 10 Pro, 82L9000KUS, Storm Grey ', 'Belleville', '2021-08-11 19:55:59'),
(5, 5, 'K11 Foldable Stereo Tangle-Free 3.5mm', 73, 'used', 'sample-image-07.png', 'Headphones and Speakers', ' K11 Foldable Stereo Tangle-Free 3.5mm Jack Wired Cord On-Ear Headset for Children/Teens/Boys/Girls/Smartphones/School/Kindle/Airplane Travel/Plane/Tablet (Navy/Teal) ', 'Timmins', '2021-08-11 20:09:40'),
(6, 20, 'TOZO T6 True Wireless Earbuds', 93, 'new', 'sample-image-01.png', 'Headphones and Speakers', 'TOZO T6 True Wireless Earbuds Bluetooth Headphones Touch Control with Wireless Charging Case IPX8 Waterproof Stereo Earphones in-Ear Built-in Mic Headset Premium Deep Bass for Sport Black ', 'Picton', '2021-08-11 20:10:04'),
(7, 4, 'Miracase 2021 Military-Grade Universal Cell ', 17, 'new', 'sample-image-04.png', 'Mobile Phone and Accessories', 'Miracase 2021 Military-Grade Universal Cell Phone Holder for Car,[Ultra-Stable& Strong Suction] Hands Free Dashboard Windshield Air Vent Car Phone Holder Mount Fit for All Mobile Phones ', 'Niagara-on-the-Lake', '2021-08-11 20:24:04'),
(8, 18, 'Acer Aspire 5 A515-46-R14K Slim Laptop | 15.6\" Full HD IPS | AMD Ryzen 3 3350U Quad-Core Mobile Processor', 22, 'used', 'sample-image-05.png', 'Computers and Laptops', 'Acer Aspire 5 A515-46-R14K Slim Laptop | 15.6\" Full HD IPS | AMD Ryzen 3 3350U Quad-Core Mobile Processor | 4GB DDR4 | 128GB NVMe SSD | WiFi 6 | Backlit KB | Amazon Alexa | Windows 10 Home (S mode)', 'Ottawa', '2021-08-11 19:56:28'),
(9, 7, 'Lifeproof Home Ceramic Coating Spray Kit ', 42, 'new', 'sample-image-03.png', 'Home Appliances', 'Lifeproof Home Ceramic Coating Spray Kit - Advanced Ceramic Technology for Home Kitchen & Bath Surfaces - Prevents Stains - Keeps Surfaces Cleaner For Longer - Super-slick Anti-stick Properties.', 'Moose Factory', '2021-08-11 20:16:55'),
(10, 12, 'Padi Home Portable Air Conditioner Fan', 30, 'new', 'sample-image-02.png', 'Home Appliances', 'Padi Home Portable Air Conditioner Fan Air Cooler Super Quiet Desk Fan with Handle Personal Air Conditioner with 3 Speeds 7 Colors for Home Office Bedroom', 'Niagara-on-the-Lake', '2021-08-11 20:17:22'),
(11, 23, 'LED Refrigerator Light Bulb 40W', 188, 'new', 'sample-image-07.png', 'Home Appliances', 'LED Refrigerator Light Bulb 40W Equivalent 120V A15 Fridge Waterproof Bulbs 5 W Daylight White 5000K E26 Medium Base Freezer Ceiling Home Lighting Lamp Non-dimmable(2 Pack)', 'London', '2021-08-11 20:17:44'),
(12, 4, 'Edifier W820BT Bluetooth Headphones', 199, 'used', 'sample-image-06.png', 'Headphones and Speakers', 'Edifier W820BT Bluetooth Headphones - Foldable Wireless Headphone with 80-Hour Long Battery Life - Gold ', 'Mississauga', '2021-08-11 20:10:28'),
(13, 8, 'McCulloch MC1385 Deluxe Canister', 172, 'used', 'sample-image-07.png', 'Home Appliances', 'McCulloch MC1385 Deluxe Canister Steam Cleaner with 23 Accessories, Chemical-Free Pressurized Cleaning for Most Floors, Counters, Appliances, Windows, Autos, and More, 1-(Pack), Black', 'Belleville', '2021-08-11 20:18:04'),
(14, 18, 'BESTRIX Phone Holder for Car', 72, 'used', 'sample-image-07.png', 'Mobile Phone and Accessories', 'BESTRIX Phone Holder for Car, SmartClamp Car Phone Mount | Dashboard Cell Phone Car Phone Holder Compatible with iPhone 12 11 Pro, Xr, Xs, XS MAX,XR,X, Galaxy S20 Note 20 Ultra & All Smartphones', 'Kirkland Lake', '2021-08-11 20:24:36'),
(15, 4, 'GumDrop Droptech B1 Over-Ear Headphones ', 157, 'used', 'sample-image-06.png', 'Headphones and Speakers', 'GumDrop Droptech B1 Over-Ear Headphones with Chew-Proof Tangle Free Cord, 3.5mm Audio Jack (75dB/110dB) for Classroom, Students, Kids -Black, Rugged, Plug & Play, No Microphone (Black)', 'Thorold', '2021-08-11 20:10:52'),
(16, 19, 'HP 15 Laptop, 11th Gen Intel Core i5-1135G7 Processor, 8 GB RAM, 256 GB SSD Storage', 169, 'used', 'sample-image-07.png', 'Computers and Laptops', 'HP 15 Laptop, 11th Gen Intel Core i5-1135G7 Processor, 8 GB RAM, 256 GB SSD Storage, 15.6” Full HD IPS Display, Windows 10 Home, HP Fast Charge, Lightweight Design (15-dy2021nr, 2020) ', 'Fort Frances', '2021-08-11 19:57:38'),
(17, 22, 'HP Chromebook 14 Laptop, Intel Celeron N4000 Processor, 4 GB RAM, 32 GB eMMC, 14” HD Display', 194, 'new', 'sample-image-09.png', 'Computers and Laptops', 'HP Chromebook 14 Laptop, Intel Celeron N4000 Processor, 4 GB RAM, 32 GB eMMC, 14” HD Display, Chrome, Lightweight Computer with Webcam and Dual Mics, Home, School, Music, Movies (14a-na0021nr, 2021) ', 'Belleville', '2021-08-11 19:58:00'),
(18, 9, 'NEVEIKA Phone Cooler', 92, 'used', 'sample-image-08.png', 'Mobile Phone and Accessories', 'NEVEIKA Phone Cooler, Cellphone Radiator with Dual Semi-Conductor Cooling Chip, Suitable for All Types Cellphone from 4.5 to 7 Inches for Tiktok Live Streaming, Outdoor Vlog, Mobile Gaming', 'Kitchener', '2021-08-11 20:25:00'),
(19, 6, 'Sony a7 III ILCE7M3/B Full-Frame Mirrorless', 30, 'new', 'sample-image-08.png', 'Cameras', 'Sony a7 III ILCE7M3/B Full-Frame Mirrorless Interchangeable-Lens Camera with 3-Inch LCD, Black ', 'Thunder Bay', '2021-08-11 20:03:47'),
(22, 18, 'Lamicall Cell Phone Stand', 57, 'new', 'sample-image-07.png', 'Mobile Phone and Accessories', 'Lamicall Cell Phone Stand, Phone Dock: Cradle, Holder, Stand for Office Desk - Black', 'Parry Sound', '2021-08-11 20:26:02'),
(23, 23, 'KODAK PIXPRO Astro Zoom AZ421-WH', 6, 'used', 'sample-image-10.png', 'Cameras', 'KODAK PIXPRO Astro Zoom AZ421-WH 16MP Digital Camera with 42X Optical Zoom and 3\" LCD Screen (White) \r\nPowerful 16. 1-Megapixel CCD sensor gives you room to enlarge, zoom and crop.', 'Iroquois Falls', '2021-08-11 20:04:38'),
(25, 5, 'Computer Ring Light for Zoom Meetings', 25, 'used', 'sample-image-06.png', 'Mobile Phone and Accessories', 'Computer Ring Light for Zoom Meetings - Desk Selfie Ring Light for Makeup/Video Recording/Video Conference, Dual 8\" Circle Laptop Light with Stand for Webcam Lighting, Photo,Video Calls, Live Stream', 'Thorold', '2021-08-11 20:26:24'),
(26, 14, 'TECLAST Traditional Laptop Computers 15.6\", 6GB+128GB SSD Thin Bezel', 50, 'used', 'sample-image-09.png', 'Computers and Laptops', 'TECLAST Traditional Laptop Computers 15.6\", 6GB+128GB SSD Thin Bezel Windows Laptop Computer Intel N3350, 1920x1080 FHD, Windows 10 Laptop, Full Size Keyboard, 2.4G+5G WiFi BT 4.2 USB 3.0 TF Expansion ', 'York', '2021-08-11 19:58:23'),
(27, 6, 'MGC ClawSocks', 152, 'used', 'sample-image-10.png', 'Mobile Phone and Accessories', 'MGC ClawSocks, Premium Mobile Gaming Finger Thumb Sleeves, Pack of 6, Frictionless Consistency, Highly Conductive 100% Silver Thread, Durable 18-Needle Weave, Compatible with All Touchscreen Devices', 'Ottawa', '2021-08-11 20:26:54'),
(29, 9, 'Hybrid Active Noise Cancelling Headphones', 143, 'new', 'sample-image-02.png', 'Headphones and Speakers', 'Hybrid Active Noise Cancelling Headphones-SuperEQ S1 Bluetooth 5.0 Over Ear Wireless Wired Headphones with Ambient Mode, 45H Playtime, Hi-Fi Deep Bass for Smart Phones PC Travel Work (White) ', 'Moose Factory', '2021-08-11 20:11:21'),
(30, 18, 'DERE Laptop MBook M10, 15.6\" Screen Computer with Full-size Keyboard, 12GB DDR4, 256GB SSD', 93, 'used', 'sample-image-06.png', 'Computers and Laptops', 'DERE Laptop MBook M10, 15.6\" Screen Computer with Full-size Keyboard, 12GB DDR4, 256GB SSD, Intel 11th Celeron Version Processor, 1920x1080 FHD Display Windows 10, 5G WiFi, USB 3.0, Type C, White ', 'North Bay', '2021-08-11 19:58:57'),
(31, 1, 'HP Chromebook 14 Laptop, Dual-core Intel Celeron Processor N3350, 4 GB RAM', 111, 'used', 'sample-image-06.png', 'Computers and Laptops', 'HP Chromebook 14 Laptop, Dual-core Intel Celeron Processor N3350, 4 GB RAM, 32 GB eMMC Storage, 14-inch FHD IPS Display, Google Chrome OS, Dual Speakers and Audio by B&O (14-ca051nr, 2020) ', 'Iroquois Falls', '2021-08-11 19:59:19'),
(32, 7, 'Lenovo IdeaPad 1 14 14.0\" Laptop, 14.0\" HD (1366 x 768) Display, Intel Celeron N4020 Processor', 67, 'new', 'sample-image-10.png', 'Computers and Laptops', 'Lenovo IdeaPad 1 14 14.0\" Laptop, 14.0\" HD (1366 x 768) Display, Intel Celeron N4020 Processor, 4GB DDR4 RAM, 64 GB SSD Storage, Intel UHD Graphics 600, Win 10 in S Mode, 81VU0079US, Ice Blue ', 'Gananoque', '2021-08-11 19:59:41'),
(33, 24, 'Fujifilm instax Mini 9 Instant Camera', 40, 'used', 'sample-image-08.png', 'Cameras', 'Fujifilm instax Mini 9 Instant Camera (Flamingo Pink) and instax Film Twin Pack (20 Exposures) Bundle Pink BUNDLE INCLUDES: Fujifilm instax Mini 9 Instant Camera (Flamingo Pink) and one Mini Film Twin Pack (20 Sheets) ', 'Sault Sainte Marie', '2021-08-11 20:05:06'),
(34, 6, 'Samsung Galaxy S21 5G', 1, 'new', 'sample-image-04.png', 'Mobile Phone and Accessories', 'Samsung Galaxy S21 5G | Factory Unlocked Android Cell Phone | US Version 5G Smartphone | Pro-Grade Camera, 8K Video, 64MP High Res | 128GB, Phantom White (SM-G991UZWAXAA)', 'Thunder Bay', '2021-08-11 20:27:13'),
(35, 22, 'Nokia 3.4', 145, 'new', 'sample-image-07.png', 'Mobile Phone and Accessories', 'Nokia 3.4 | Android 10 | Unlocked Smartphone | 2-Day Battery | US Version | 3/64GB | 6.39-Inch Screen | Triple Camera | Charcoal ', 'Kawartha Lakes', '2021-08-11 20:27:32'),
(36, 2, 'Kasa Smart Light Switch HS200', 124, 'new', 'sample-image-04.png', 'Home Appliances', 'Kasa Smart Light Switch HS200, Single Pole, Needs Neutral Wire, 2.4GHz Wi-Fi Light Switch Works with Alexa and Google Home, UL Certified, No Hub Required , White', 'Belleville', '2021-08-11 20:18:39'),
(37, 18, 'TCL 20S Unlocked Android Smartphone', 104, 'new', 'sample-image-03.png', 'Mobile Phone and Accessories', 'TCL 20S Unlocked Android Smartphone with 6.67” Dotch FHD+ Display, 64MP Quad Rear Camera System, 128GB+4GB RAM, 5000mAh Battery with Fast Charging, Milky Way Black ', 'Cornwall', '2021-08-11 20:27:52'),
(38, 24, 'GREECHO GREEGRILL Smokeless Grill Indoor', 36, 'used', 'sample-image-02.png', 'Home Appliances', 'GREECHO GREEGRILL Smokeless Grill Indoor, 6 Heat Control Indoor Grill Smokeless Nonstick With Lid, 1500W Turbocharger Technology Grill Smokeless, Griddle Plates & Removable Grill Replacement', 'Hamilton', '2021-08-11 20:19:00'),
(39, 20, 'Canon EOS 4000D DSLR', 158, 'new', 'sample-image-02.png', 'Cameras', 'Canon EOS 4000D DSLR Camera with 18-55mm f/3.5-5.6 Zoom Lens, 64GB Memory,Case, Tripod and More (28pc Bundle) ', 'Fort Erie', '2021-08-11 20:06:15'),
(40, 3, 'iTouchless 13 Gallon Automatic Trash', 136, 'used', 'sample-image-10.png', 'Home Appliances', 'iTouchless 13 Gallon Automatic Trash Can with Odor-Absorbing Filter and Lid Lock, Power by Batteries (not included) or Optional AC Adapter (sold separately), Black/Stainless Steel', 'Sault Sainte Marie', '2021-08-11 20:19:42'),
(41, 4, 'Vector Robot by Anki', 97, 'used', 'sample-image-05.png', 'Smart Devices', 'Vector Robot by Anki, A Home Robot Who Hangs Out & Helps Out, With Amazon Alexa Built-In ', 'Kirkland Lake', '2021-08-11 20:36:19'),
(42, 12, 'Digital Camera,30MP Compact Camera', 166, 'used', 'sample-image-02.png', 'Cameras', 'Digital Camera,30MP Compact Camera,2.7 inch Pocket Camera,Rechargeable Small Digital Camera for Kids,Students,School,Children,Photography with 8X Zoom 32GB SD Card Included ', 'West Nipissing', '2021-08-11 20:06:27'),
(43, 12, 'MXX Case Compatible with Galaxy S21', 109, 'new', 'sample-image-09.png', 'Mobile Phone and Accessories', 'MXX Case Compatible with Galaxy S21 Ultra, 3-Layer Super Full Heavy Duty Body Bumper Cover/Shock Protection/Dust Proof, Designed for Samsung Galaxy S21 Ultra 5G (6.8 Inch) 2021 - (Aqua/Light Pink)', 'Niagara-on-the-Lake', '2021-08-11 20:28:19'),
(44, 25, 'ASUS VivoBook 15 Thin and Light Laptop, 15.6” FHD Display, Intel i3-1005G1 CPU', 150, 'new', 'sample-image-08.png', 'Computers and Laptops', 'ASUS VivoBook 15 Thin and Light Laptop, 15.6” FHD Display, Intel i3-1005G1 CPU, 8GB RAM, 128GB SSD, Backlit Keyboard, Fingerprint, Windows 10 Home in S Mode, Slate Gray, F512JA-AS34 ', 'York', '2021-08-11 20:00:07'),
(45, 17, 'Smart Plug, Power Strip, AHRISE WiFi Surge Protector', 40, 'new', 'sample-image-07.png', 'Smart Devices', 'Multi-Function Smart Power Strip(2.4G WIFI ONLY): 4 USB charging ports (5V/4.8A 24W), 4 smart outlets and 4 always on outlets with built-in surge protector 1680 Joules, the 3 Alexa smart outlets works with Alexa Google Assistant for Voice Control.\r\n', 'Peterborough', '2021-08-11 20:35:56'),
(46, 24, 'AUXO-FUN Cell Phone Holder', 81, 'new', 'sample-image-10.png', 'Mobile Phone and Accessories', 'AUXO-FUN Cell Phone Holder, Universal Lazy Bracket Mobile Phone Stand, Flexible Gooseneck Long Arm Clip (Black)', 'Parry Sound', '2021-08-11 20:28:43'),
(47, 3, 'Panasonic LUMIX FZ80 4K Digital Camera', 30, 'new', 'sample-image-04.png', 'Cameras', 'Panasonic LUMIX FZ80 4K Digital Camera, 18.1 Megapixel Video Camera, 60X Zoom DC VARIO 20-1200mm Lens, F2.8-5.9 Aperture, Power O.I.S. Stabilization, Touch Enabled 3-Inch LCD, Wi-Fi, DC-FZ80K (Black) ', 'Simcoe', '2021-08-11 20:06:49'),
(48, 8, 'CHEF iQ World’s Smartest Pressure Cooker', 122, 'new', 'sample-image-01.png', 'Home Appliances', 'CHEF iQ World’s Smartest Pressure Cooker, Pairs with App Via WiFi for Meals in an Instant Built-In Scale & Auto Steam Release, Multi-Functional w/ 300+ Smart Cooking Presets, 6 Qt', 'Fort Frances', '2021-08-11 20:20:06'),
(49, 6, 'Paww WaveSound 3 Bluetooth Headphones', 19, 'used', 'sample-image-05.png', 'Headphones and Speakers', 'Paww WaveSound 3 Bluetooth Headphones – Active Noise Cancelling Headphones / 16-Hour Battery Life with Precision-Engineered Sound / Foldable Travel Headphones & Over-Ear Headphones (Black) ', 'York', '2021-08-11 20:11:46'),
(50, 4, 'Pizza Oven Ovens Electric Mryitcal Countertop', 138, 'used', 'sample-image-03.png', 'Home Appliances', 'Pizza Oven Ovens Electric Mryitcal Countertop Home Commercial Pizza and Snack Oven Stainless Steel for 12-Inch Pizza Bread Pies Appetizers Quesadillas and Pastries (110V, 2100W)', 'Etobicoke', '2021-08-11 20:20:35'),
(51, 3, 'Canon EOS 4000D DSLR Camera', 114, 'new', 'sample-image-06.png', 'Cameras', 'Canon EOS 4000D DSLR Camera w/Canon EF-S 18-55mm F/3.5-5.6 III Zoom Lens + Case + 32GB SD Card (15pc Bundle) ', '', '2021-08-11 20:07:11'),
(52, 3, 'Video Camera Camcorder Full HD 1080P 30FPS', 147, 'used', 'sample-image-05.png', 'Cameras', 'Video Camera Camcorder Full HD 1080P 30FPS 24.0 MP IR Night Vision Vlogging Camera Recorder 3.0 Inch IPS Screen 16X Zoom Camcorders Camera Remote Control with 2 Batteries', 'Belleville', '2021-08-11 20:07:35'),
(53, 19, 'Anker Soundcore Life Q20 Hybrid', 121, 'new', 'sample-image-08.png', 'Headphones and Speakers', 'Anker Soundcore Life Q20 Hybrid Active Noise Cancelling Headphones, Wireless Over Ear Bluetooth Headphones, 40H Playtime, Hi-Res Audio, Deep Bass, Memory Foam Ear Cups, for Travel, Home Office', 'Kingston', '2021-08-11 20:12:08'),
(54, 6, 'Beats Solo3 Wireless On-Ear Headphones', 34, 'new', 'sample-image-06.png', 'Headphones and Speakers', 'Beats Solo3 Wireless On-Ear Headphones - Apple W1 Headphone Chip, Class 1 Bluetooth, 40 Hours of Listening Time, Built-in Microphone - Black (Latest Model) ', 'York', '2021-08-11 20:13:50'),
(55, 5, 'Micro USB Cable', 175, 'new', 'sample-image-05.png', 'Mobile Phone and Accessories', 'Micro USB Cable, MaGeek [3.3 ft / 5-Pack] Premium Fast Charger Mobile Phone Charging Cord Data Sync Cables for Samsung, HTC, Sony, Motorola, LG, Google, Nokia and More (5 Colors)', 'Moose Factory', '2021-08-11 20:29:01'),
(56, 9, 'Fire TV Stick 4K streaming device', 1, 'new', 'sample-image-07.png', 'Smart Devices', 'Fire TV Stick 4K streaming device with Alexa Voice Remote (includes TV controls) | Dolby Vision', 'Iroquois Falls', '2021-08-11 20:34:04'),
(57, 8, '1080P 16MP Trail Camera, Hunting Camera', 151, 'new', 'sample-image-02.png', 'Cameras', '1080P 16MP Trail Camera, Hunting Camera with 120°Wide-Angle Motion Latest Sensor View 0.2s Trigger Time Trail Game Camera with 940nm No Glow and IP66 Waterproof 2.4” LCD 48pcs for Wildlife Monitoring', 'Iroquois Falls', '2021-08-11 20:08:06'),
(59, 23, 'Over Ear Headphone, Wired Premium Stereo Sound Headsets', 106, 'used', 'sample-image-04.png', 'Headphones and Speakers', 'Over Ear Headphone, Wired Premium Stereo Sound Headsets with 50mm Driver, Foldable Comfortable Headphones with Protein Earmuffs and Shareport for Recording Monitoring Podcast PC TV- with Mic (Silver) ', 'North York', '2021-08-11 20:13:28'),
(60, 25, 'Eaton WFD30-C7-SP-L Wi-Fi Smart Universal Dimmer', 18, 'used', 'sample-image-07.png', 'Smart Devices', 'Eaton WFD30-C7-SP-L Wi-Fi Smart Universal Dimmer Works with Alexa, Color Change Kit (Brown/Black/Gray) – A Certified for Humans Device', 'Moosonee', '2021-08-11 20:33:39'),
(62, 12, 'Soundcore by Anker Life Q30 Hybrid', 59, 'used', 'sample-image-05.png', 'Headphones and Speakers', 'Soundcore by Anker Life Q30 Hybrid Active Noise Cancelling Headphones with Multiple Modes, Hi-Res Sound, Custom EQ via App, 40H Playtime, Comfortable Fit, Bluetooth Headphones, Connect to 2 Devices', 'Hamilton', '2021-08-11 20:14:19'),
(63, 3, 'Acer Spin 5 Convertible Laptop, 13.5\" 2K 2256 x 1504 IPS Touch, 10th Gen Intel Core i7-1065G7', 159, 'new', 'sample-image-09.png', 'Computers and Laptops', 'Acer Spin 5 Convertible Laptop, 13.5\" 2K 2256 x 1504 IPS Touch, 10th Gen Intel Core i7-1065G7, 16GB LPDDR4X, 512GB NVMe SSD, Wi-Fi 6, Backlit KB, FPR, Rechargeable Active Stylus, SP513-54N-74V2 ', 'Temiskaming Shores', '2021-08-11 20:00:28'),
(64, 13, 'Sengled Smart Light Bulb', 73, 'used', 'sample-image-01.png', 'Smart Devices', 'Sengled Smart Light Bulb, Bluetooth Mesh Smart Bulb That Works with Alexa Only, Standard A19, Dimmable Daylight 5000K, E26 60W Equivalent 800LM, 4 Pack – A Certified for Humans Device', 'Sarnia-Clearwater', '2021-08-11 20:33:17'),
(68, 9, 'Master Appliance Ph-1000 Proheat Heat Gun', 66, 'new', 'sample-image-01.png', 'Home Appliances', 'Master Appliance Ph-1000 Proheat Heat Gun, Lightweight, Balanced Design, 1000° Fahrenheit 120V 1300W with Momentary Contact Switch, Assembled In the USA ', 'Orillia', '2021-08-11 20:21:09'),
(69, 21, 'bopmen T3 Wired Over Ear Headphones', 151, 'new', 'sample-image-05.png', 'Headphones and Speakers', 'bopmen T3 Wired Over Ear Headphones - Stereo Sound Headphones with Tangle Free Cord Bass Comfortable Headphones, Lightweight Portable for Smartphone Tablet Computer PC Laptop Notebook', 'Simcoe', '2021-08-11 20:14:45'),
(71, 15, 'KeySmart Max', 151, 'new', 'sample-image-09.png', 'Smart Devices', 'KeySmart Max - Smart Trackable Key Organizer with Tile Bluetooth Smart Technology (up to 14 Keys, Steel Gray)', 'Sudbury', '2021-08-11 20:32:54'),
(72, 8, 'Smart Light Switch', 9, 'new', 'sample-image-08.png', 'Smart Devices', 'Smart Light Switch, in-Wall WiFi Smart Switch That Works with Alexa and Google Home, No Hub Required, Neutral Wire Needed, Single-Pole 15A, Etl and Fcc Listed,4 Pack White', 'Niagara-on-the-Lake', '2021-08-11 20:32:34'),
(73, 10, 'Brilliant Smart Home Control', 64, 'used', 'sample-image-05.png', 'Smart Devices', 'Brilliant Smart Home Control (1-Switch Panel) — Alexa Built-In & Compatible with Ring, Sonos, Hue, Kasa/TP-Link, Wemo, SmartThings, Apple HomeKit — In-Wall Touchscreen Control for Lights, Music & More ', 'Fort Frances', '2021-08-11 20:32:13'),
(81, 20, 'NiteBird Smart WiFi LED Strip Lights', 112, 'used', 'sample-image-08.png', 'Smart Devices', 'NiteBird Smart WiFi LED Strip Lights 16.4ft Works with Alexa Google Home, App and Voice Control, Music Sync, 16 Million RGB Color Changing Led Lights for Bedroom, Party, Desk, Home Decoration, TV', 'Temiskaming Shores', '2021-08-11 20:31:53'),
(89, 23, 'Lockly Secure Pro PGD728W', 156, 'used', 'sample-image-10.png', 'Smart Devices', 'Lockly Secure Pro PGD728W Wi-Fi Smart DeadBolt Fingerprint, Entry Keyless Door Lock with Patented Keypad | Works with Alexa and Google Assistant (Satin Nickel)', 'Thunder Bay', '2021-08-11 20:31:22'),
(91, 25, 'Smart Plug ESICOO', 38, 'new', 'sample-image-07.png', 'Smart Devices', 'Smart Plug ESICOO - Plug A Certified Compatible with Alexa, Echo & Google Home – Only WiFi 2.4G', 'Kitchener', '2021-08-11 20:30:59'),
(93, 10, 'Solar Lights Outdoor Motion Sensor', 146, 'new', 'sample-image-08.png', 'Home Appliances', 'Solar Lights Outdoor Motion Sensor, iThird LED Solar Powered Outdoor Lights Stainless Steel Solar Security Lights for Yard Patio Garage Waterproof 3 Modes Super Bright(Daylight)', 'Oakville', '2021-08-11 20:21:31'),
(95, 3, 'BESTRIX Phone Holder for Car', 12, 'new', 'sample-image-04.png', 'Home Appliances', 'GYBER Fremont Trunk-shape Portable Pizza Oven 12\" Outdoor Wood, Charcoal & Pellets Pizza Maker', 'Kawartha Lakes', '2021-08-11 20:24:18'),
(96, 2, 'Echo Show 5 Charcoal', 160, 'used', 'sample-image-09.png', 'Smart Devices', 'Echo Show 5 Charcoal with Blink Mini Indoor Smart Security Camera, 1080 HD with Motion Detection', 'Woodstock', '2021-08-11 20:30:37');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(6) NOT NULL,
  `total_cost` int(6) NOT NULL,
  `shipping_information` varchar(255) NOT NULL,
  `payment_information` varchar(255) NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

DROP TABLE IF EXISTS `order_items`;
CREATE TABLE IF NOT EXISTS `order_items` (
  `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT,
  `order_id` int(6) NOT NULL,
  `item_id` int(6) NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `payment_method`
--

DROP TABLE IF EXISTS `payment_method`;
CREATE TABLE IF NOT EXISTS `payment_method` (
  `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(6) NOT NULL,
  `card_number` int(255) NOT NULL,
  `expiration_date` varchar(255) NOT NULL,
  `security_code` int(255) NOT NULL,
  `billing_address` varchar(255) NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `shipping_addresses`
--

DROP TABLE IF EXISTS `shipping_addresses`;
CREATE TABLE IF NOT EXISTS `shipping_addresses` (
  `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(6) NOT NULL,
  `names` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `province` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `zipcode` varchar(255) NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) NOT NULL,
  `secondname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=101 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `secondname`, `email`, `password`, `reg_date`) VALUES
(1, 'Ulric', 'Garth', 'consectetuer@miacmattis.com', '12345678', '2021-08-11 08:45:26'),
(2, 'Magee', 'Merrill', 'penatibus.et@egetdictumplacerat.com', '12345678', '2021-08-11 08:45:26'),
(3, 'Kato', 'Griffin', 'facilisis@ipsumdolor.ca', '12345678', '2021-08-11 08:45:26'),
(4, 'Lestero', 'Cairo', 'mollis@eleifendCrassed.co.uk', '12345678', '2021-08-11 14:31:43'),
(5, 'Hayes', 'Tyrone', 'purus.mauris@elitAliquam.net', '12345678', '2021-08-11 08:45:26'),
(6, 'Ethan', 'Nigel', 'ut.pellentesque.eget@Crasegetnisi.com', '12345678', '2021-08-11 08:45:26'),
(7, 'Donna', 'Amber', 'vel.arcu@eliterat.edu', '12345678', '2021-08-11 08:45:26'),
(8, 'Angela', 'Carlos', 'vitae.sodales@ametconsectetuer.com', '12345678', '2021-08-11 08:45:26'),
(9, 'Odette', 'Jordan', 'Aliquam.nisl@Inlorem.net', '12345678', '2021-08-11 08:45:26'),
(10, 'Jael', 'Hakeem', 'commodo.at.libero@Nuncmauris.co.uk', '12345678', '2021-08-11 08:45:26'),
(11, 'Jocelyn', 'Jason', 'egestas.a@Duis.org', '12345678', '2021-08-11 08:45:26'),
(12, 'Ava', 'Hammett', 'viverra.Maecenas@Integereu.org', '12345678', '2021-08-11 08:45:26'),
(13, 'Florence', 'Vaughan', 'nascetur@vitaesodalesat.com', '12345678', '2021-08-11 08:45:26'),
(14, 'Ivan', 'Hilda', 'pellentesque.a.facilisis@dolordolortempus.org', '12345678', '2021-08-11 08:45:26'),
(15, 'Uma', 'Jessamine', 'Duis@velitjustonec.org', '12345678', '2021-08-11 08:45:26'),
(16, 'Maite', 'Hall', 'vitae.risus@molestiepharetra.edu', '12345678', '2021-08-11 08:45:26'),
(17, 'Alice', 'Salvador', 'sit.amet@facilisismagna.net', '12345678', '2021-08-11 08:45:26'),
(18, 'Maite', 'Roth', 'sit@Nullamut.co.uk', '12345678', '2021-08-11 08:45:26'),
(19, 'Mona', 'Cole', 'erat.in@Duiscursus.com', '12345678', '2021-08-11 08:45:26'),
(20, 'Ella', 'Jarrod', 'laoreet@ultricies.org', '12345678', '2021-08-11 08:45:26'),
(21, 'Hannah', 'Hayden', 'semper.erat.in@duiCras.ca', '12345678', '2021-08-11 08:45:26'),
(22, 'Irma', 'Malcolm', 'auctor@loremDonecelementum.ca', '12345678', '2021-08-11 08:45:26'),
(23, 'Garrett', 'Chester', 'at.iaculis@purusgravida.co.uk', '12345678', '2021-08-11 08:45:26'),
(24, 'Mariko', 'Galena', 'mauris@velfaucibus.org', '12345678', '2021-08-11 08:45:26'),
(25, 'Joshua', 'Imani', 'ligula.elit.pretium@a.org', '12345678', '2021-08-11 08:45:26'),
(26, 'Xantha', 'Cleo', 'gravida.non@neccursusa.ca', '12345678', '2021-08-11 08:45:26'),
(27, 'Wang', 'Roanna', 'adipiscing@loremDonec.ca', '12345678', '2021-08-11 08:45:26'),
(28, 'Jermaine', 'Vance', 'elementum@ligula.org', '12345678', '2021-08-11 08:45:26'),
(29, 'Uriel', 'Mollie', 'quis@Maecenasliberoest.ca', '12345678', '2021-08-11 08:45:26'),
(30, 'Caryn', 'Cheryl', 'amet@semegetmassa.edu', '12345678', '2021-08-11 08:45:26'),
(31, 'Scarlet', 'Sydney', 'diam.Sed@necdiamDuis.ca', '12345678', '2021-08-11 08:45:26'),
(32, 'Beatrice', 'Hasad', 'torquent@Quisqueornare.ca', '12345678', '2021-08-11 08:45:26'),
(33, 'Zenia', 'Rylee', 'placerat.orci.lacus@diamatpretium.edu', '12345678', '2021-08-11 08:45:26'),
(34, 'Kay', 'Buffy', 'lacinia.orci.consectetuer@pedesagittisaugue.org', '12345678', '2021-08-11 08:45:26'),
(35, 'Aileen', 'Kasimir', 'tellus.lorem.eu@posuereat.net', '12345678', '2021-08-11 08:45:26'),
(36, 'Ulla', 'Gareth', 'dolor.Fusce@ut.org', '12345678', '2021-08-11 08:45:26'),
(37, 'Jade', 'Rooney', 'bibendum@sollicitudin.edu', '12345678', '2021-08-11 08:45:26'),
(38, 'Norman', 'August', 'Nulla.tincidunt.neque@nonsapien.co.uk', '12345678', '2021-08-11 08:45:26'),
(39, 'Aubrey', 'Melinda', 'Quisque.libero.lacus@idblandit.org', '12345678', '2021-08-11 08:45:26'),
(40, 'Heidi', 'Peter', 'aliquet.Phasellus.fermentum@elit.com', '12345678', '2021-08-11 08:45:26'),
(41, 'Solomon', 'Beau', 'eget.magna@nisidictumaugue.org', '12345678', '2021-08-11 08:45:26'),
(42, 'George', 'Audra', 'Integer.id@diamluctuslobortis.net', '12345678', '2021-08-11 08:45:26'),
(43, 'Nash', 'Nola', 'pretium.aliquet@id.edu', '12345678', '2021-08-11 08:45:26'),
(44, 'Carter', 'Inez', 'tempor@hymenaeosMauris.org', '12345678', '2021-08-11 08:45:26'),
(45, 'Sylvia', 'Yen', 'Vestibulum.ut.eros@mollislectuspede.edu', '12345678', '2021-08-11 08:45:26'),
(46, 'Kelsey', 'Drew', 'blandit.congue.In@Maecenas.co.uk', '12345678', '2021-08-11 08:45:26'),
(47, 'Chadwick', 'Maya', 'ultrices.a.auctor@Proin.net', '12345678', '2021-08-11 08:45:26'),
(48, 'Alfonso', 'Sierra', 'fermentum.risus@Sedeu.net', '12345678', '2021-08-11 08:45:26'),
(49, 'Serena', 'Uta', 'erat.Sed.nunc@cursus.org', '12345678', '2021-08-11 08:45:26'),
(50, 'Kaye', 'Perry', 'euismod.mauris@consequatnecmollis.net', '12345678', '2021-08-11 08:45:26'),
(51, 'Hillary', 'Cullen', 'vel@dapibusquam.ca', '12345678', '2021-08-11 08:45:26'),
(52, 'Maxwell', 'Oleg', 'Lorem@liberoduinec.co.uk', '12345678', '2021-08-11 08:45:26'),
(53, 'Angela', 'Wallace', 'aptent.taciti.sociosqu@Incondimentum.edu', '12345678', '2021-08-11 08:45:26'),
(54, 'Ashely', 'Isaiah', 'eu.neque@placerateget.net', '12345678', '2021-08-11 08:45:26'),
(55, 'Anne', 'Wilma', 'ipsum.dolor@nonleoVivamus.ca', '12345678', '2021-08-11 08:45:26'),
(56, 'Jermaine', 'Chastity', 'elit.sed@ornareegestas.net', '12345678', '2021-08-11 08:45:26'),
(57, 'Eugenia', 'Haviva', 'eu.tempor.erat@diam.org', '12345678', '2021-08-11 08:45:26'),
(58, 'Madison', 'Isabelle', 'ipsum@nec.edu', '12345678', '2021-08-11 08:45:26'),
(59, 'Blossom', 'Bernard', 'fames@ac.co.uk', '12345678', '2021-08-11 08:45:26'),
(60, 'Aileen', 'Carl', 'Nunc.sed.orci@sitametconsectetuer.org', '12345678', '2021-08-11 08:45:26'),
(61, 'Destiny', 'Germaine', 'nec.malesuada.ut@rutrumnonhendrerit.com', '12345678', '2021-08-11 08:45:26'),
(62, 'Isabella', 'Lynn', 'Quisque.ac@augue.com', '12345678', '2021-08-11 08:45:26'),
(63, 'Adara', 'Bruno', 'parturient.montes.nascetur@adipiscingfringilla.co.uk', '12345678', '2021-08-11 08:45:26'),
(64, 'Robert', 'Sonia', 'parturient.montes@nislMaecenas.org', '12345678', '2021-08-11 08:45:26'),
(65, 'Alvin', 'Zahir', 'Cras.interdum@nequenon.com', '12345678', '2021-08-11 08:45:26'),
(66, 'Hyatt', 'Samantha', 'nibh@vestibulum.org', '12345678', '2021-08-11 08:45:26'),
(67, 'Wanda', 'Laura', 'vulputate@etmagnis.com', '12345678', '2021-08-11 08:45:26'),
(68, 'Flavia', 'Teegan', 'diam.lorem@turpis.co.uk', '12345678', '2021-08-11 08:45:26'),
(69, 'Guy', 'Kirestin', 'magnis.dis.parturient@Maecenasmi.net', '12345678', '2021-08-11 08:45:26'),
(70, 'Carly', 'Felicia', 'Proin@Aliquam.org', '12345678', '2021-08-11 08:45:26'),
(71, 'Branden', 'Xavier', 'augue.porttitor.interdum@utnullaCras.ca', '12345678', '2021-08-11 08:45:26'),
(72, 'Hadley', 'Rachel', 'vel.est@tempus.net', '12345678', '2021-08-11 08:45:26'),
(73, 'Brody', 'Rebecca', 'Cras.dictum.ultricies@netusetmalesuada.ca', '12345678', '2021-08-11 08:45:26'),
(74, 'Whoopi', 'Chadwick', 'et@neque.co.uk', '12345678', '2021-08-11 08:45:26'),
(75, 'Isaac', 'Edward', 'tristique.senectus@nequetellusimperdiet.edu', '12345678', '2021-08-11 08:45:26'),
(76, 'Lance', 'Robin', 'Aliquam.auctor.velit@facilisisvitaeorci.org', '12345678', '2021-08-11 08:45:26'),
(77, 'Sophia', 'Fitzgerald', 'Sed.nec@egestas.com', '12345678', '2021-08-11 08:45:26'),
(78, 'Fletcher', 'Kelly', 'eget@eleifendnondapibus.co.uk', '12345678', '2021-08-11 08:45:26'),
(79, 'Isadora', 'Gemma', 'lorem@sodales.net', '12345678', '2021-08-11 08:45:26'),
(80, 'Oscar', 'Christopher', 'Quisque@ametconsectetueradipiscing.edu', '12345678', '2021-08-11 08:45:26'),
(81, 'Mara', 'Lois', 'dignissim.tempor@Aeneanegetmagna.co.uk', '12345678', '2021-08-11 08:45:26'),
(82, 'Stephen', 'Amber', 'Fusce@mitemporlorem.co.uk', '12345678', '2021-08-11 08:45:26'),
(83, 'Garrett', 'Daquan', 'parturient.montes.nascetur@turpisnec.net', '12345678', '2021-08-11 08:45:26'),
(84, 'Wyatt', 'Andrew', 'nisl@Quisquetincidunt.net', '12345678', '2021-08-11 08:45:26'),
(85, 'Wang', 'Keiko', 'urna.Ut.tincidunt@semper.com', '12345678', '2021-08-11 08:45:26'),
(86, 'Isabella', 'Cynthia', 'semper@ametluctus.org', '12345678', '2021-08-11 08:45:26'),
(87, 'Caryn', 'Christopher', 'Nam.consequat@Pellentesque.com', '12345678', '2021-08-11 08:45:26'),
(88, 'Ifeoma', 'Zephania', 'Sed.id@Sed.ca', '12345678', '2021-08-11 08:45:26'),
(89, 'Arthur', 'Hoyt', 'mauris.sapien@enimNunc.co.uk', '12345678', '2021-08-11 08:45:26'),
(90, 'Alexandra', 'Geraldine', 'et@sollicitudinadipiscing.com', '12345678', '2021-08-11 08:45:26'),
(91, 'Scarlet', 'Fredericka', 'ac@Classaptenttaciti.org', '12345678', '2021-08-11 08:45:26'),
(92, 'Gemma', 'Clare', 'molestie@malesuadaIntegerid.org', '12345678', '2021-08-11 08:45:26'),
(93, 'Madison', 'Yoko', 'Nam.ac@nisl.ca', '12345678', '2021-08-11 08:45:26'),
(94, 'Cora', 'Peter', 'in.sodales.elit@montes.net', '12345678', '2021-08-11 08:45:26'),
(95, 'Kieran', 'Connor', 'ornare.lectus.ante@tinciduntvehicula.edu', '12345678', '2021-08-11 08:45:26'),
(96, 'Bruno', 'Sharon', 'nisi.Aenean@Donecfringilla.net', '12345678', '2021-08-11 08:45:26'),
(97, 'Elton', 'Colby', 'tincidunt.adipiscing.Mauris@ipsum.co.uk', '12345678', '2021-08-11 08:45:26'),
(98, 'Kibo', 'Ifeoma', 'a.mi.fringilla@posuerecubiliaCurae.co.uk', '12345678', '2021-08-11 08:45:26'),
(99, 'Yvette', 'Raja', 'mauris@vulputate.net', '12345678', '2021-08-11 08:45:26'),
(100, 'Wyatt', 'Evangeline', 'at.velit@ultrices.co.uk', '12345678', '2021-08-11 08:45:26');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
