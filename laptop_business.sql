-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 30, 2021 at 08:56 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laptop_business`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_page`
--

CREATE TABLE `about_page` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `content` varchar(1000) NOT NULL,
  `image` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `about_page`
--

INSERT INTO `about_page` (`id`, `title`, `description`, `content`, `image`, `date`) VALUES
(1, 'Spring', 'When spring comes', 'The Tauries Shop supplies the very best in contemporary laptops and laptop accessories. Our expert team of techies are also available for laptop repairs and laptop refurbishments.\n<br><br>\nAll our available laptops have been carefully curated by our technical team for their performance, speed and value for money.\n<br><br>\nWe have laptops for the avid gamer, the college student, and even for the committed technophobe.\n<br><br>\nWe’re independent, knowledgeable, and on your side.', 'img/spring.svg', '2021-11-28 22:03:25'),
(2, 'Summer', 'Summer time', 'TAURIES is for all your needs of laptop parts and accessories and dedicated to providing you with honest information and original products. <br>\nAt TAURIES you can expect to get a great selection of products at incredibly low prices without having to sacrifice quality service and support', 'img/summer.svg', '2021-11-28 22:41:37'),
(3, 'Autumn', 'Autumn vibes', 'hihi', 'img/autumn.svg', '2021-11-28 06:21:07'),
(4, 'Q4', 'Q4 page', 'The Tauries Shop supplies the very best in contemporary laptops and laptop accessories. Our expert team of techies are also available for laptop repairs and laptop refurbishments.\n<br><br>\nAll our available laptops have been carefully curated by our technical team for their performance, speed and value for money.\n<br><br>\nWe have laptops for the avid gamer, the college student, and even for the committed technophobe.\n<br><br>\nOur fully trained, friendly and welcoming staff are on the side of the customer. We go out of our way to make sure all our clients get the right laptops and laptop accessories for their unique needs.\n<br><br>\nWe’re independent, knowledgeable, and on your side. ', 'img/spring.svg', '2021-11-28 09:01:14');

-- --------------------------------------------------------

--
-- Table structure for table `belong`
--

CREATE TABLE `belong` (
  `cart_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `belong`
--

INSERT INTO `belong` (`cart_id`, `product_id`, `quantity`) VALUES
(1, 40, 23),
(1, 5, 2),
(49, 14, 1),
(49, 9, 3),
(50, 9, 2),
(50, 10, 1),
(51, 10, 4),
(54, 9, 4);

-- --------------------------------------------------------

--
-- Table structure for table `carousel`
--

CREATE TABLE `carousel` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `title2` varchar(100) NOT NULL,
  `content` varchar(1000) NOT NULL,
  `image` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `carousel`
--

INSERT INTO `carousel` (`id`, `title`, `title2`, `content`, `image`, `date`) VALUES
(1, 'TAURIES SHOP', 'LAPTOPS', 'Powerful and affordable laptops for the Student, Gamer, Social Media Connoisseur or the Home Office.', 'img/homepage1.jpg', '2021-11-28 08:39:59'),
(2, 'TAURIES SHOP', 'LAPTOP ACCESSORIES', 'Competitively Priced Quality Laptop Accessories.', 'img/homepage2.jpg', '2021-11-28 08:39:47'),
(3, 'TAURIES SHOP', 'LAPTOP REPAIRS', 'For the best in laptop repair, get in contact with us today.', 'img/homepage3.jpg', '2021-11-28 08:40:05');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id_cart` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL DEFAULT 0,
  `address_cur` varchar(1000) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `status` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL DEFAULT 'Paid',
  `date` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id_cart`, `user_id`, `amount`, `address_cur`, `status`, `date`) VALUES
(1, 16, 123123123, '123123132', '123312', '2021-11-29 00:18:40'),
(49, 16, 97990000, '123 ABC, XYZ', 'Paid', 'Mon Nov 29 2021 10:46:06 GMT+0700 (Indochina Time)'),
(50, 16, 79000000, '12 ABC', 'Paid', 'Mon Nov 29 2021 12:12:50 GMT+0700 (Indochina Time)'),
(51, 16, 124000000, '12 ABC', 'Paid', 'Mon Nov 29 2021 12:52:28 GMT+0700 (Indochina Time)'),
(54, 18, 96000000, 'Pax Sky, 26 Ung Văn Khiêm, Phường 25, Bình Thạnh, Thành phố Hồ Chí Minh', 'Paid', 'Tue Nov 30 2021 14:55:53 GMT+0700 (Indochina Time)');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `type`, `amount`) VALUES
(15, 'asus', 'laptop', 0),
(16, 'acer', 'laptop', 0),
(17, 'msi', 'laptop', 0),
(19, 'hp', 'laptop', 0),
(20, 'dell', 'laptop', 0),
(21, 'macbook', 'laptop', 0),
(22, 'mouse', 'accessories', 0),
(23, 'chair', 'accessories', 0),
(24, 'keyboard', 'accessories', 0),
(25, 'headphone', 'accessories', 0),
(26, 'speaker', 'accessories', 0),
(27, 'router', 'accessories', 0),
(28, 'cooler', 'accessories', 0),
(32, 'lenovo', 'laptop', 0),
(33, 'install', 'service', 0),
(34, 'repair', 'service', 0);

-- --------------------------------------------------------

--
-- Table structure for table `comment_post`
--

CREATE TABLE `comment_post` (
  `id` int(11) NOT NULL,
  `id_post` int(6) UNSIGNED NOT NULL,
  `username` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` varchar(1000) CHARACTER SET utf8mb4 NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comment_post`
--

INSERT INTO `comment_post` (`id`, `id_post`, `username`, `content`, `date`) VALUES
(1, 22, 'hovanhoa', 'hay qa di thui', '2021-11-24 13:22:54'),
(2, 22, 'hiu', 'olala', '2021-11-24 13:23:09'),
(3, 22, 'hovanhoa', '123', '2021-11-24 13:37:11'),
(4, 22, 'hovanhoa', 'Hay qá admin ưiii\n', '2021-11-24 13:39:28'),
(5, 22, 'hovanhoa', 'dink kout', '2021-11-24 13:39:45'),
(6, 22, 'hovanhoa', 'quá tuyệt vời !', '2021-11-24 13:40:33'),
(7, 22, 'hovanhoa', 'olala ozawa', '2021-11-24 13:40:59'),
(8, 22, 'hovanhoa', 'ádasd', '2021-11-25 02:24:28'),
(9, 22, 'hovanhoa', 'dink kout\n', '2021-11-25 02:24:34'),
(10, 22, 'hovanhoa', '123', '2021-11-25 02:25:32'),
(11, 22, 'hovanhoa', '1', '2021-11-26 19:46:27'),
(12, 22, 'hovanhoa', '2', '2021-11-26 19:46:28'),
(13, 22, 'hovanhoa', '3', '2021-11-26 19:46:29'),
(14, 22, 'hovanhoa', '4', '2021-11-26 19:46:30'),
(15, 22, 'hovanhoa', '5', '2021-11-26 19:46:31'),
(16, 22, 'hovanhoa', 'Good job ❤️', '2021-11-26 20:39:14'),
(17, 22, 'hovanhoa', 'amazinggggg', '2021-11-26 20:39:24'),
(18, 22, 'hovanhoa', 'WOW omg', '2021-11-26 20:39:43'),
(19, 22, 'hovanhoa', '123', '2021-11-26 20:52:26'),
(0, 35, 'hovanhoa1', '132', '2021-11-30 07:56:00'),
(0, 35, 'hovanhoa1', '23', '2021-11-30 07:56:01'),
(0, 35, 'hovanhoa1', '23', '2021-11-30 07:56:02'),
(0, 38, 'hovanhoa1', '123', '2021-11-30 07:56:07');

-- --------------------------------------------------------

--
-- Table structure for table `contact_page`
--

CREATE TABLE `contact_page` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `website` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `type` int(1) NOT NULL DEFAULT 0,
  `create_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact_page`
--

INSERT INTO `contact_page` (`id`, `email`, `address`, `phone`, `website`, `image`, `type`, `create_date`) VALUES
(1, 'tauries@gmail.com', ' 268 Lý Thường Kiệt, Phường 14, Quận 10, Thành phố Hồ Chí Minh', '096624123', 'tauries.com', 'img/contact.png', 0, '2021-11-28 22:46:48'),
(2, 'tauries@gmail.com', ' 268 Lý Thường Kiệt, Phường 14, Quận 10, Thành phố Hồ Chí Minh', '0966243123', 'tauries.com', 'img/contact.png', 1, '2021-11-28 22:19:13');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `message` varchar(300) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `email`, `name`, `subject`, `message`, `create_date`) VALUES
(1, 'hehe@gmail.com', 'Nguyễn Thị Duyên Bằng', 'meomeo', 'meo', '2021-11-28 22:00:20'),
(2, 'hoa.ho.van@hcmut.edu.vn', 'Hồ Văn Hòa', 'Repairs', 'Hi hi hi hi ', '2021-11-28 22:05:58'),
(3, 'hovanhoaa1@gmail.com', 'hovanhoa1', 'ABC', 'ABC XYZ', '2021-11-30 07:56:24');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int(6) UNSIGNED NOT NULL,
  `slug` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `author` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `summary` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `slug`, `title`, `author`, `content`, `image`, `summary`, `category`, `date`) VALUES
(22, 'black-friday-macbook-deals-2021-best-sales-so-far', 'Black Friday MacBook deals 2021: Best sales so far', 'Hilda Scott ', 'Black Friday MacBook deals have surfaced at go-to Apple retailers. And while the day has come and gone, the best MacBook Pro Black Friday deals still slash up to $600 off Apple\'s powerful notebooks.  \n\nNow that Black Friday 2021 has ended, Amazon, Best Buy and B&H are wasting no time offering post-Black Friday MacBook deals in the lead up at Cyber Monday 2021. If you\'ve waited this long to snag a MacBook Air or MacBook Pro due to price, now is the best time to buy.  \n\nMore: Black Friday deals 2021\nBest Black Friday laptop deals\nOver the summer, we\'ve seen excellent MacBook deals like last year\'s MacBook Air for $749. This deal has returned during post-Black Friday as retailers make shelf room for the rumored 2022 MacBook Air. \n\nCurrently, Best Buy is slashing up to $600 off select 2020 MacBook Pro notebooks. One standout deal is the 16-inch MacBook Pro with 9th Intel Core i7 CPU for $1,799 ($600 off).\n\nBlack Friday 2021 has concluded and so far we\'ve seen tons of excellent holiday deals on Apple products. Be sure to bookmark our Apple Black Friday deals hub for the best post-holiday discounts and stay tuned for our upcoming Cyber Monday coverage. \n\nFrom the latest MacBook Pro to previous-gen Intel notebooks, here are the best post Black Friday MacBook deals happening right now. \n\nBlack Friday MacBook deals — Quick links\nBlack Friday MacBook deals: from $849 @ Amazon\nBlack Friday MacBook deals: from $849 @ Best Buy\nBlack Friday MacBook deals: from $829 @ B&H\nApple MacBook Air M1 (256GB): was $999 now $899 @ Amazon\nApple MacBook Air Intel (256GB): was $999 now $829 @ B&H\nApple MacBook Air M1 (512GB): was $1,249 now $1,099 @ Amazon\nApple MacBook Pro M1 (256GB): was $1,299 now $1,199 @ B&H\nApple MacBook Pro Intel (512GB): was $1,499 now $1,149 @ B&H\nApple MacBook Pro Intel (1TB): was $1,999 now $1,499 @ Best Buy', 'https://cdn.mos.cms.futurecdn.net/Xpp7i3vm6ds9YU9hQWiTuL-1024-80.jpg.webp', 'Black Friday MacBook deals 2021: Best sales so far', 'laptop', '2021-11-26 20:35:41'),
(23, 'ps5-black-friday-deals-2021-save-big-on-playstation-games', 'PS5 Black Friday deals 2021: Save big on PlayStation games', 'Hilda Scott ', 'If you\'re on the hunt for the best PS5 post-Black Friday deals of 2021 right now, you\'ve come to the right place. Whether you\'re a proud (and lucky) PlayStation 5 owner or still on the hunt for the illusive system, our roundup of PS5 post-Black Friday deals will save you tons of time and money. \n\nBlack Friday and the days leading up to Cyber Monday are the best time to buy PS5 games, a spare PS5 DualSense controller or a PlayStation Plus subscription. In fact, the best PS5 post-Black Friday deals of 2021 are already here. \n\nRetailers are rolling out the best end-of-year gaming deals and we\'re seeing excellent discounts on PS5 games and accessories. Don\'t expect to see discounts on consoles though. However, check store links for PS5 restocks. \n\nBlack Friday deals 2021 \nWant to buy a PS5 for the holidays? This might be your best chance\nBest Buy continues to offer $10 in rewards on PS5 game pre-orders like Halo Infinite. You must sign up for a free My Best Buy membership to take advantage of these deals.\n\nWhile there isn\'t an abundance of PS5 exclusive titles just yet, the PS5 is backwards compatible with 99% of PS4 games. Many come with a free upgrade to the PS5 digital version which is great for all PlayStation fans. \n\nThe best post-Black Friday 2021 peripherals, there are gaming headsets and external hard drives that you can use to bring over your PS4 games to the PS5.\n\nBlack Friday has come and gone but we’re seeing tons of deep discounts on today’s most coveted tech. Visit our post-Black Friday 2021 hub for the best deals happening right now.\n\nHere are the best PS5 post-Black Friday deals so far.', 'https://cdn.mos.cms.futurecdn.net/zKyRmEMQcUBGGfHTp8BQ5g-1024-80.png.webp', 'Save big with the best PS5 post-Black Friday deals 2021', 'accessories', '2021-11-26 20:36:25'),
(24, 'black-friday-phone-deals-2021-cheap-iphone-13-google-pixel-6-and-more', 'Black Friday Phone Deals 2021: Cheap iPhone 13, Google Pixel 6 and more', 'Jason England ', 'The post-Black Friday smartphone deals of 2021 prove this is the best time of the year to buy a new iPhone or Android phone, with huge savings across the board.\n\nTo help you find the best bang for your buck, we’ve put together this handy guide, which points you in the right direction towards the biggest discounts on current and previous-gen phones.\n\nBest Black Friday deals 2021— early sales and predictions\nBest smartphones of 2021\nBlack Friday has come and gone, but the deals are still ripe for the picking. The lead up to Black Friday and the upcoming Cyber Monday prove that both are much more than a one-day event. Some offers and sales have already launched with a lot of products probably hitting their best prices already.', 'https://cdn.mos.cms.futurecdn.net/WzKMffumwTbtrNPvS8XB7T-1024-80.jpg.webp', 'Black Friday Phone Deals 2021: Cheap iPhone 13, Google Pixel 6 and more', 'laptop', '2021-11-26 20:37:09'),
(32, 'black-friday-laptop-deals-2021-the-best-sales', 'Black Friday laptop deals 2021: The best sales', 'Hilda Scott ', 'The best Black Friday laptop deals of 2021 continue at Amazon, Best Buy, Walmart, major PC manufacturers and other retailers. So if you\'re due for a new laptop, there are tons of Black Friday deals on laptops to be had today and throughout the rest of the weekend, leading into Cyber Monday.  \n\nWe\'re currently seeing aggressive discounts on the industry\'s best laptops — from budget machines to high-end gaming notebooks. Many configurations are at their lowest prices of the year. Now is the best time to save big on our top picks for best laptops like the excellent Dell XPS 13, M1 MacBook Air, MacBook Pro, HP Envy 13 and ThinkPad X1 Carbon. \n\nWhether you\'re on the hunt for cheap Black Friday laptops deals on MacBook, Chromebook or Windows PC you\'ve come to the right place. We\'re bringing you the best Black Friday laptop deals that are worth your while.\n\nLive Blog: Best Black Friday laptop deals right now\nMore: Black Friday deals 2021\nBest laptops in 2021\nSo what stores have the best post-Black Friday deals on laptops? \n\nAmazon, Best Buy, B&H and Walmart are just some of the stores that offer the best post-Black Friday deals on laptops. If you\'re shopping for a Dell or Alienware laptop, Dell\'s Black Friday sale generally has the best discounts. However, it\'s always good to compare prices among retailers to ensure you get the best deal.\n\nIf you\'re waited this long to buy a MacBook, your patience has paid off. Apple\'s costly laptops are known to get considerable discounts on Black Friday. And if you\'re looking for post-Black Friday laptop deals under $200, there are plenty of cheap Chromebook deals to be had starting from $99.\n\nBlack Friday is here and we’re seeing tons of deep discounts on today’s most coveted tech. Visit our Black Friday 2021 hub for the best deals happening right now.  ', 'https://cdn.mos.cms.futurecdn.net/uB3SCe42ZNgjpZVyHfJU3G-1024-80.jpg.webp', 'Black Friday laptop deals 2021: The best sales', 'laptop', '2021-11-26 20:40:30'),
(33, 'this-msi-pulse-gl66-for-799-is-one-of-the-cheapest-black-friday-rtx-3050-laptop-deals-you-can-get', 'This MSI Pulse GL66 for $799 is one of the cheapest Black Friday RTX 3050 laptop deals you can get', 'Hilda Scott ', 'The MSI Pulse GL66 boasts Nvidia\'s powerful GeForce RTX 30 series GPU. Powerful gaming laptops can be costly which is why Black Friday/Cyber Monday weekend is the best time to buy one.\n\nCurrently, Best Buy offers the RTX 3050 GPU-having MSI Pulse GL66 $799. That\'s $150 off its regular price of $949, it\'s lowest price yet, and one of the best Black Friday gaming laptop deals you can get. \n\nShop: GameStop\'s Black Friday sale\nBlack Friday deals 2021', 'https://cdn.mos.cms.futurecdn.net/DcqLkServAHPnBVZuPUbfW-1024-80.jpg.webp', 'This MSI Pulse GL66 for $799 is one of the cheapest Black Friday RTX 3050 laptop deals you can get', 'laptop', '2021-11-26 20:41:06'),
(34, 'the-rtx-3050-charged-msi-sword-15-drops-to-899-in-black-friday-weekend-sale', 'The RTX 3050-charged MSI Sword 15 drops to $899 in Black Friday weekend sale', 'Darragh Murphy ', 'Black Friday gaming laptop deals continue this weekend with marvelous offers on the best RTX 30 Series gaming laptops on the market. Now, Best Buy is offering a $300 price cut on the MSI Sword 15 laptop.\n\nRight now, you can grab the RTX 3050 Ti-charged MSI Sword 15 for $899 at Best Buy. That\'s a $300 markdown from a $1,199 price tag. If you\'re a fan of 15-inch 144Hz displays, powerful 11th Gen Intel Core i7 CPUs and a sleek gaming laptop design, this is the deal for you. \n\nThis is one of the best gaming laptop deals you can still get. ', 'https://cdn.mos.cms.futurecdn.net/DpSrBjob4CL3ELAMTHia3P-1024-80.jpg.webp', 'The RTX 3050-charged MSI Sword 15 drops to $899 in Black Friday weekend sale', 'laptop', '2021-11-26 20:41:42'),
(35, 'best-black-friday-rtx-30-gaming-laptop-deals-cheap-rtx-3080-rtx-3070-and-rtx-3060-laptops', 'Best Black Friday RTX 30 gaming laptop deals: Cheap RTX 3080, RTX 3070 and RTX 3060 laptops', 'Jason England ', 'Black Friday is here and we\'re seeing prices drop on some of the most popular RTX 30 Series gaming laptops. And trust us, we know a thing or two about finding the best gaming laptop deals, which makes finding the best Black Friday deals similar to a treasure hunt. \n\nWith so many new games coming out soon, such as the award-winning MMO Final Fantasy XIV Endwalker, Halo Infinite, and Monster Hunter Rise just to name a few, it would be a shame to miss out on upgrading your gaming system.  \n\nSo roll up your sleeves and stick around to strike gold with us.\n\nABC', 'https://cdn.mos.cms.futurecdn.net/omLuqabQM64AecxCFDBjLb-1024-80.png.webp', 'Best Black Friday RTX 30 gaming laptop deals: Cheap RTX 3080, RTX 3070 and RTX 3060 laptops', 'laptop', '2021-11-28 22:36:04'),
(36, 'best-black-friday-tv-deals-2021-700-lg-oled-and-more', 'Best Black Friday TV deals 2021: $700 LG OLED and more', 'Hilda Scott ', 'Black Friday is hands down the best time of the year to buy a TV. Black Friday TV deals are now available at electronics retailers like Amazon, Best Buy, PC Richard, and more. \n\nWhether you want the best discount on a TCL TV or the best HDMI 2.1 TV for for PS5, Xbox Series X, we\'ve got you covered.  \n\nWith so many Black Friday TV deals to sort through, investing in a new TV can get overwhelming. That\'s why we\'re hand-selecting the best Black Friday TV deals and listing them here. Our Black Friday TV deals list will not only help you save, but also get you the best bang for your buck. \n\nMore: Black Friday deals 2021\nLooking for a 55-inch 4K TV under $400? Right now, you can get the Insignia 55-inch F50 Series QLED 4K Smart TV for $399 at Amazon. Typically, this TV costs $649, so you\'re saving $250. It\'s its lowest price yet and among the best early Black Friday deals at Amazon.\n\nWith its 55-inch 2160p panel and Quantum Dot technology, the Insignia F50 series TV delivers vivid pictures with colors that pop. \n\nIf you\'re looking for the best TV for PC and console, Amazon also offers the  LG OLED C1 4K TV for $1,796 ($700 off). It\'s this TV\'s lowest price of the year and one of the best Black Friday TV deals we\'ve seen yet. \n\nWe tested its sibling, the LG CX48 OLED and bestowed it with our Editor\'s Choice award for its pristine picture and great sound.  It\'s a solid investment if you\'re looking for a new home entertainment system centerpiece. \n\nBlack Friday is here and we’re seeing tons of deep discounts on today’s most coveted tech. Visit our Black Friday 2021 hub for the best deals happening right now.\n\nHere are the best Black Friday TV deals you can shop today. \n\nBlack Friday TV deals at Amazon: from $159\nBlack Friday TV deals at Best Buy: from $79\nBlack Friday TV deals at PC Richard: from $99\nBlack Friday TV deals at Samsung: from $629\nBlack Friday TV deals at Walmart: from $98\nSamsung 55\" QN85A QLED 4K Smart TV: was $1,499 now $1,099 @ Best Buy\nSony 65\"  X90J 4K Smart TV: was $1,499 now $1,199 @ Best Buy\nTCL 4 Series 55\" 4K Roku TV: was $599 now $379 @ Amazon\nTCL 6 Series 55\" 4K Mini-LED QLED Roku TV: was $799 now $699 @ Amazon\nLG NanoCell 75 Series 70\" 4K Smart TV: was $1,199 now $749 @ Best Buy\nTCL 6 series 65\" Mini-LED QLED 4K Smart TV: was $1,299 now $899 @ Best Buy', 'https://cdn.mos.cms.futurecdn.net/AAKtBoYYokX6YWFw8U7XmG-1024-80.jpg.webp', 'Best Black Friday TV deals 2021: $700 LG OLED and more', 'laptop', '2021-11-26 20:42:49'),
(37, 'black-friday-deals-for-streamers-cheap-elgato-gear-blue-yeti-mics-logitech-webcams-and-more', 'Black Friday deals for streamers: Cheap Elgato gear, Blue Yeti mics, Logitech webcams and more', ' Rami Tabari , Jason England ', 'Black Friday is here and now is the best time to grab big savings on all kinds of streaming tools. From capture cards, webcams, USB microphones to powerful laptops, we’ve covered all the bases here and you can find big Black Friday savings of up to 50% off.\n\nSo, for anyone from a new-starter on Twitch to experienced streamers with established audiences, this list is for you. Here are the best Black Friday streaming gear deals.\n\n', 'https://cdn.mos.cms.futurecdn.net/iQvky4BsfrJqcZAggrrnbC-1024-80.jpg.webp', 'Black Friday deals for streamers: Cheap Elgato gear, Blue Yeti mics, Logitech webcams and more', 'laptop', '2021-11-26 20:43:22'),
(38, 'airpods-max-gets-99-price-cut-in-amazon-black-friday-warm-up', 'AirPods Max gets $99 price cut in Amazon Black Friday warm-up', 'Hilda Scott ', 'Apple\'s AirPods Max wireless headphones are among our top picks for best audio wearables. One retailer\'s extended Labor Day sale offers these premium audiophile headphones for a stellar price. \n\nCurrently, Amazon offers the AirPods Max in Sky Blue for $439 via an on-page coupon. Typically, these over-ear Apple headphones retail for $549, so that\'s $99 off. It\'s just $10 shy of their all-time low price and one of the best Black Friday AirPods deals we\'ve seen so far.\n\nLaptopMag is supported by its audience. When you purchase through links on our site, we may earn an affiliate commission. Learn more\n\nHome News\nAirPods Max gets $99 price cut in Amazon Black Friday warm-up\nBy Hilda Scott 9 days ago\n\nSave $99 on the AirPods Max right now on Amazon.\n\n \n \n \nAirPods Max\n(Image credit: Apple )\nApple\'s AirPods Max wireless headphones are among our top picks for best audio wearables. One retailer\'s extended Labor Day sale offers these premium audiophile headphones for a stellar price. \n\nCurrently, Amazon offers the AirPods Max in Sky Blue for $439 via an on-page coupon. Typically, these over-ear Apple headphones retail for $549, so that\'s $99 off. It\'s just $10 shy of their all-time low price and one of the best Black Friday AirPods deals we\'ve seen so far.\n\nShop: Amazon\'s early Black Friday sale\nBest Black Friday headphone deals\nBest headphones in 2021\nAirPods Max Black Friday deal\nApple AirPods Max: was $549 now $439 @ Amazon\nApple AirPods Max: was $549 now $439 @ Amazon\nCurrently $110 off on Amazon, the AirPods Max are our favorite wireless ear cans. These stylish ear cans feature Apple\'s powerful H1 chip, nine microphones and 40mm drivers. With spatial sound, the AirPods Max provides an audio experience like no other. \n\nVIEW DEAL\nApple\'s AirPods Max are our new favorite noise-cancelling headphones. They feature powerful H1 chips, nine microphones, 40mm drivers, and tons of sensors. \n\nIn our AirPods Max review, we loved their gorgeous design, great audio quality, and powerful active noise-cancelling. We gave the AirPods Max an overall rating of 4.5 out of 5 stars and the Editor\'s Choice awards. \n\nThe AirPods Max are the latest headphones to feature spatial audio. This technology creates the illusion of a 360-degree soundscape for an immersive listening experience. In one test, listening to Lil Nas X’s, “Montero', 'https://cdn.mos.cms.futurecdn.net/pUicWGQLBxehzVN7wMByMT-1024-80.jpg.webp', 'AirPods Max gets $99 price cut in Amazon Black Friday warm-up', 'accessories', '2021-11-28 22:35:43'),
(39, 'best-vpn-black-friday-deals-expressvpn-nordvpn-surfshark-and-more', 'Best VPN Black Friday deals: ExpressVPN, NordVPN, Surfshark and more', 'Hilda Scott ', 'Black Friday is here and all the best VPN services are rolling out some huge savings for the special occasion.\n\nA VPN is one of the best ways to stay safe online, acting as a proxy IP address and location. Of course, security is a big benefit, especially when you take into account what data public Wi-Fi networks can collect about you, but it’s also a cracking way to access country-specific streaming.\n\nWhether it’s getting onto BBC iPlayer from the US, or jumping on HBO Max in the UK, wherever you are, this is a great service for binge watchers to maximise their monthly investment. With up to 70% off our favourite VPNs, now is the best time to get one.', 'https://cdn.mos.cms.futurecdn.net/Pfhe6RVXtgYURj3PrN9Yzc-1024-80.jpg.webp', 'Best VPN Black Friday deals: ExpressVPN, NordVPN, Surfshark and more', 'laptop', '2021-11-26 20:45:18'),
(40, 'apple-ar-vr-headset-is-reportedly-approaching-liftoff-watch-out-oculus-', 'Apple AR/VR headset is reportedly \'approaching liftoff\' — watch out Oculus!', 'Kimberly Gedeon', 'Apple\'s AR/VR headset has reportedly been in the works for years, but according to a Morgan Stanley note to clients (spotted by Investor\'s Business Daily), Apple is finally placing proverbial wings on its technologically advanced eyewear — it\'s ready for takeoff.\n\nMacRumors says the inundation of virtual reality-related patents from Apple hints that the AR/VR headset is coming to market soon. Before the Cupertino-based tech giant unveiled the Apple Watch in 2014, there was an uptick of patent filings for pedometer functionality, step detection and more. Due to increased patent-filing activity for head-mounted displays, MacRumors suspects the long-awaited Apple AR/VR headset is moving forward behind the scenes.\n\nApple VR headset: release date, price, specs and more\nBest laptops of 2021\nThe best VR-ready laptops of 2021\nApple\'s AR/VR headset is reportedly progressing through development\nMorgan Stanley analysts said that developing the Apple AR/VR headset wasn\'t a smooth-sailing journey. There were many obstacles, especially in regards to engineering the device.', 'https://cdn.mos.cms.futurecdn.net/i4Z7u4KMepBycQ5Pnxz6hV-1024-80.jpg.webp', 'Apple AR/VR headset is reportedly \'approaching liftoff\' — watch out Oculus!', 'laptop', '2021-11-26 20:50:06');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `uid` int(11) NOT NULL,
  `name` text COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `description` text COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `price` int(11) NOT NULL,
  `image` text COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `type` text COLLATE utf8mb4_vietnamese_ci NOT NULL DEFAULT 'service',
  `category` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` int(11) NOT NULL DEFAULT 10
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`uid`, `name`, `description`, `price`, `image`, `type`, `category`, `amount`) VALUES
(1, 'Install Intel Pentium Processor', 'Install Intel Pentium Processor for laptop', 200000, 'img/intel.png', 'service', 'install', 5),
(2, 'Install Intel Core Processor', 'Install Intel Core Processor for laptop', 222000, 'img/intel_core.jpg', 'service', 'install', 15),
(3, 'Install GeForce GTX VGA', 'Install GeForce GTX VGA for laptop', 245000, 'img/gtx.png', 'service', 'install', 15),
(4, 'Install Mainboard', 'Install Mainboard for laptop', 390000, 'img/mainboard.png', 'service', 'install', 5),
(5, 'Install Radeon VGA', 'Install Radeon VGA for laptop', 255000, 'img/radeon.jpg', 'service', 'install', 15),
(6, 'Install RAM', 'Install RAM for laptop', 159000, 'img/ram.jpg', 'service', 'install', 15),
(7, 'Install Ryzen Processor', 'Install Ryzen Processor for laptop', 490000, 'img/ryzen.jpg', 'service', 'install', 15),
(8, 'Install SSD', 'Install SSD for laptop', 149000, 'img/ssd.jpg', 'service', 'install', 15),
(9, 'Laptop Gaming Asus ROG', 'Laptop Gaming Asus ROG Strix G15 G513IH HN015T', 24000000, 'img/rog_strix.png', 'laptop', 'asus', 119),
(10, 'Laptop Asus TUF Gaming A15', 'Laptop Asus TUF Gaming A15 FA506QM HN016T', 31000000, 'img/asus_tuf.jpg', 'laptop', 'asus', 0),
(11, 'Laptop Gaming Asus ROG Flow', 'Laptop Gaming Asus ROG Flow X13 GV301QC K6052T', 39000000, 'img/rog_flow.png', 'laptop', 'asus', 55),
(12, 'Laptop Gaming Asus TUF Dash', 'Laptop Gaming Asus TUF Dash F15 FX516PC HN002T', 25599000, 'img/tuf_dash.png', 'laptop', 'asus', 15),
(13, 'Laptop Gaming Acer Aspire', 'Laptop Gaming Acer Aspire 7 A715 42G R6ZR', 21990000, 'img/aspire.jpg', 'laptop', 'acer', 15),
(14, 'Laptop Gaming Acer Nitro', 'Laptop gaming Acer Nitro 5 Eagle AN515 57 54MV', 25990000, 'img/acer_nitro.jpg', 'laptop', 'acer', 14),
(15, 'Laptop Gaming Acer Predator', 'Laptop Gaming Acer Predator Helios 300 PH315 54 75YD', 39990000, 'img/predator.png', 'laptop', 'acer', 15),
(16, 'Laptop Gaming MSI Bravo', 'Laptop Gaming MSI Bravo 15 B5DD 028VN', 24990000, 'img/msi_bravo.png', 'laptop', 'msi', 15),
(17, 'Laptop Gaming MSI Katana', 'Laptop Gaming MSI Katana GF66 11UC 676VN', 25990000, 'img/msi_katana.jpg', 'laptop', 'msi', 15),
(18, 'Laptop MSI Creator Z16', 'Laptop MSI Creator Z16 A11UET 217VN', 62990000, 'img/msi_creator.jpg', 'laptop', 'msi', 15),
(19, 'Laptop Gaming Lenovo Legion 5', 'Laptop gaming Lenovo Legion 5 Pro 16ACH6H 82JQ001VVN', 42390000, 'img/lenovo_legion.png', 'laptop', 'lenovo', 15),
(20, 'Laptop Gaming HP Omen', 'Laptop Gaming HP Omen 16 b0142TX 4Y0Z8PA', 39990000, 'img/hp_omen.jpg', 'laptop', 'hp', 15),
(21, 'Laptop Gaming HP VICTUS', 'Laptop Gaming HP VICTUS 16 e0179AX 4R0V0PA', 26599000, 'img/hp_victus.jpg', 'laptop', 'hp', 15),
(22, 'Laptop Dell Inspiron 15', 'Laptop Dell Inspiron 15 3505 Y1N1T1', 15990000, 'img/dell_inspiron.jpg', 'laptop', 'dell', 15),
(23, 'Laptop Dell Vostro 3400', 'Laptop Dell Vostro 3400 70253899', 16990000, 'img/dell_vostro.jpg', 'laptop', 'dell', 15),
(24, 'Laptop Dell Vostro 3510', 'Laptop Dell Vostro 3510 7T2YC1', 20490000, 'img/vostro_3510.jpg', 'laptop', 'dell', 15),
(25, 'Laptop Dell Inspiron 3505', 'Laptop Dell Inspiron 3505 Y1N1T5', 19490000, 'img/inspiron_3510.jpg', 'laptop', 'dell', 5),
(26, 'MacBook Pro 16 2021', 'MacBook Pro 16 2021 M1 Pro 16GB 512GB Silver', 92900000, 'img/macbook_pro.png', 'laptop', 'macbook', 15),
(27, 'Macbook Air 2020 M1', 'Macbook Air 2020 M1 8GPU 16GB 512GB Z1250004D - Grey', 37990000, 'img/macbook_air.jpg', 'laptop', 'macbook', 15),
(28, 'Laptop Hardware Repair', 'Repair Hardware for laptop', 399000, 'img/error_repair.png', 'service', 'repair', 15),
(29, 'Laptop Software Repair', 'Repair Software for laptops', 310000, 'img/software_repair.jpg', 'service', 'repair', 15),
(30, 'Logitech G102 Lightsync RGB Black Mouse', 'Logitech G102 Lightsync RGB Black Mouse', 500000, 'img/mouse_logitech.jpg', 'accessories', 'mouse', 15),
(31, 'Razer Viper Mini Mouse', 'Razer Viper Mini Mouse', 990000, 'img/mouse_razer.jpg', 'accessories', 'mouse', 15),
(32, 'Corsair M55 RGB Pro Mouse', 'Corsair M55 RGB Pro Mouse', 900000, 'img/mouse_corsair.png', 'accessories', 'mouse', 15),
(33, 'Razer Blackwidow Keyboard', 'Razer Blackwidow Green Switch Keyboard', 3300000, 'img/razer_blackwidow.jpg', 'accessories', 'keyboard', 15),
(34, 'Razer Huntsman Keyboard', 'Razer Huntsman Mini Mercury Keyboard', 3099000, 'img/razer_huntsman.jpg', 'accessories', 'keyboard', 15),
(35, 'Corsair K63 Wireless Keyboard', 'Corsair K63 Wireless Keyboard', 2590000, 'img/corsair_k63.png', 'accessories', 'keyboard', 15),
(36, 'Leopold FC980M PD Keyboard', 'Leopold FC980M PD Dark Yellow Keyboard', 3650000, 'img/leopold_pd.png', 'accessories', 'keyboard', 15),
(37, 'Steelseries Apex 3 Keyboard', 'Steelseries Apex 3 Keyboard', 1640000, 'img/steelseries.jpg', 'accessories', 'keyboard', 15),
(38, 'DareU EH416 RGB Headphone', 'DareU EH416 RGB Headphone', 380000, 'img/dareu.png', 'accessories', 'headphone', 15),
(39, 'Rapoo VH520 Virtual 7.1 Headphone', 'Rapoo VH520 Virtual 7.1 Headphone', 990000, 'img/rapoo.jpg', 'accessories', 'headphone', 15),
(40, 'Mpow Air SE Headphone', 'Mpow Air SE Headphone', 690000, 'img/mpow.png', 'accessories', 'headphone', 15),
(41, 'E-Dra Ares EGC207 Black Chair', 'E-Dra Ares EGC207 Black Chair', 3190000, 'img/edra.jpg', 'accessories', 'chair', 15),
(42, 'Warrior Raider Series Chair', 'Warrior Raider Series – WGC206 Plus White/Pink Chair', 3369000, 'img/raider.jpg', 'accessories', 'chair', 15),
(43, 'Cougar Armor K Chair', 'Cougar Armor K Chair', 4890000, 'img/armor.png', 'accessories', 'chair', 15),
(44, 'Corsair T3 RUSH Charcoal Chair', 'Corsair T3 RUSH Charcoal Chair', 5490000, 'img/rush.jpg', 'accessories', 'chair', 1),
(45, 'Thonet & Vander SPIEL BT Speaker', 'Thonet & Vander SPIEL BT Speaker', 990000, 'img/spiel.png', 'accessories', 'speaker', 15),
(46, 'Thonet & Vander GRUB BT Speaker', 'Thonet & Vander GRUB BT Speaker', 1990000, 'img/grub.png', 'accessories', 'speaker', 15),
(47, 'WiFi 5 TP-Link Archer C54 Router', 'WiFi 5 TP-Link Archer C54 Router', 949000, 'img/archer.jpg', 'accessories', 'router', 15),
(48, 'WiFi 5 Linksys Router', 'WiFi 5 Linksys MAX-STREAM E5600-AH Router', 1149000, 'img/linksys.png', 'accessories', 'router', 15),
(49, 'Coolermaster Ergostand Lite Cooler', 'Coolermaster Ergostand Lite Cooler', 640000, 'img/ergostand.png', 'accessories', 'cooler', 15),
(50, 'Coolermaster Notepal - L1 Cooler', 'Coolermaster Notepal - L1 Cooler', 340000, 'img/notepal.png', 'accessories', 'cooler', 15);

-- --------------------------------------------------------

--
-- Table structure for table `product_comments`
--

CREATE TABLE `product_comments` (
  `id` int(11) NOT NULL,
  `username` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'unread'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_comments`
--

INSERT INTO `product_comments` (`id`, `username`, `content`, `product_id`, `date`, `status`) VALUES
(1, 'hieu.le1501', 'hello', 10, '2021-11-25 06:27:52', 'unread'),
(2, 'hieu.le1501', 'grwggegeger', 10, '2021-11-25 06:48:33', 'unread'),
(3, 'hieu.le1501', 'nice', 14, '2021-11-25 06:51:05', 'unread'),
(4, 'hieu@hieu', 'best laptop', 9, '2021-11-25 06:57:34', 'unread'),
(5, 'hieu@hieu', 'best laptop', 10, '2021-11-25 07:54:26', 'unread'),
(6, 'hieu@hieu', 'best laptop', 10, '2021-11-27 00:23:58', 'unread'),
(7, 'hieu@hieu', 'best laptop', 10, '2021-11-25 07:54:27', 'block'),
(8, 'hieu@hieu', 'mmm', 11, '2021-11-25 09:29:16', 'read'),
(9, 'hieu.le1501', 'hi im hiu', 1, '2021-11-27 00:58:23', 'read'),
(10, 'hieu.le1501', 'spamming here', 6, '2021-11-27 00:58:42', 'read'),
(11, 'hieu.le1501', 'hellllooo', 30, '2021-11-27 00:58:57', 'read'),
(12, 'hieu.le1501', 'mappp', 9, '2021-11-27 06:01:34', 'unread'),
(13, 'hieu.le1501', 'hello', 13, '2021-11-27 06:03:14', 'block'),
(20, 'ntdbng1', '123', 9, '2021-11-28 22:05:02', 'unread'),
(21, 'ntdbng1', 'wow', 18, '2021-11-28 22:17:32', 'unread');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uid` int(11) NOT NULL,
  `username` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` text COLLATE utf8mb4_unicode_ci DEFAULT 'img/avatar.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `username`, `password`, `name`, `role`, `email`, `address`, `phone`, `image`) VALUES
(1, 'admin', 'admin', '', 'admin', NULL, NULL, NULL, 'img/avatar.png'),
(2, 'hiu', 'hiu', '', 'admin', NULL, NULL, NULL, 'img/avatar.png'),
(4, 'hieu.le1501', '$2y$12$v3XUA/iKqHKpOKuE0AoqWOJuNgk8k109ezn8IPg3O9qlJgheywb.q', 'Lê Nguyễn Minh Híu', 'customer', 'hieu.le1501@hcmut.edu.v', '206/10', '021111', '/img/hieu.jpg'),
(7, 'hieu@hieu', '$2y$12$sL1IyZMIuuEEvG/miGV7DeEZAwZgeuKmfJiBh5fdcinDU42n2z722', 'Lê Nguyễn Hiếu', 'customer', 'hieu@hieu', '206/10 đường Tân Xuân 2, ấp Chánh 1', '0932018687', 'data:image/jpeg;base64,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'),
(12, 'ntdbng', '$2y$12$Z1aOoJV1yxtglRXgJ.c2G.8tOtuAuj56HQZDBFvpYrb.1X6aTacAq', 'nguyen thi duyen bang', 'customer', 'abc@gmail.com', 'ABC XYZ', '0966243543', 'img/avatar.png'),
(13, 'ntdbng1', '$2y$12$7kkpm82GtzOCxMoiM5sfjO6rCz08wZ6Op6u2dxY5IxhJGrdoWqIYu', 'ntdbng1', 'customer', 'ntdbng1@gmail.com', '12 ABC', '0123456798', 'uploads/man-avatar-profile-vector-21372065.jpg'),
(16, 'hovanhoa', '$2y$12$BIJMqwn.od9Ka4wjazcnTel.5.CfJvZyYy1dm7F9.Rox00fyQ43Jm', 'hovanhoa', 'customer', 'hovanhoa@gmail.com', NULL, NULL, 'img/avatar.png'),
(18, 'hovanhoa1', '$2y$12$UaGlKTNAYEkHcaTVYHOQ7ec1eAvmlPxp.CAg05BZG9yj.DMOSQMia', 'hovanhoa1', 'customer', 'hovanhoa1@gmail.com', 'Pax Sky, 26 Ung Văn Khiêm, Phường 25, Bình Thạnh, Thành phố Hồ Chí Minh', '0966243735', 'img/avatar.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_page`
--
ALTER TABLE `about_page`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `belong`
--
ALTER TABLE `belong`
  ADD KEY `123` (`cart_id`),
  ADD KEY `321` (`product_id`);

--
-- Indexes for table `carousel`
--
ALTER TABLE `carousel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id_cart`),
  ADD KEY `12312312312312323` (`user_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `comment_post`
--
ALTER TABLE `comment_post`
  ADD KEY `1231231231231231` (`username`),
  ADD KEY `comment_user_ibfk_1123` (`id_post`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`uid`),
  ADD KEY `123123123123123` (`category`);

--
-- Indexes for table `product_comments`
--
ALTER TABLE `product_comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `a` (`product_id`),
  ADD KEY `comment_user_ibfk_1` (`username`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_page`
--
ALTER TABLE `about_page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `carousel`
--
ALTER TABLE `carousel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id_cart` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `product_comments`
--
ALTER TABLE `product_comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `belong`
--
ALTER TABLE `belong`
  ADD CONSTRAINT `123` FOREIGN KEY (`cart_id`) REFERENCES `cart` (`id_cart`) ON DELETE CASCADE,
  ADD CONSTRAINT `321` FOREIGN KEY (`product_id`) REFERENCES `product` (`uid`);

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `12312312312312323` FOREIGN KEY (`user_id`) REFERENCES `users` (`uid`);

--
-- Constraints for table `comment_post`
--
ALTER TABLE `comment_post`
  ADD CONSTRAINT `1231231231231231` FOREIGN KEY (`username`) REFERENCES `users` (`username`),
  ADD CONSTRAINT `comment_user_ibfk_1123` FOREIGN KEY (`id_post`) REFERENCES `post` (`id`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `123123123123123` FOREIGN KEY (`category`) REFERENCES `category` (`name`);

--
-- Constraints for table `product_comments`
--
ALTER TABLE `product_comments`
  ADD CONSTRAINT `a` FOREIGN KEY (`product_id`) REFERENCES `product` (`uid`) ON DELETE CASCADE,
  ADD CONSTRAINT `comment_user_ibfk_1` FOREIGN KEY (`username`) REFERENCES `users` (`username`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
