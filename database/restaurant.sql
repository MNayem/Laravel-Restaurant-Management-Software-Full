-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 07, 2022 at 12:18 AM
-- Server version: 10.3.36-MariaDB-cll-lve
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `planypbu_restaurant`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `order_id` int(10) UNSIGNED DEFAULT NULL,
  `pname` varchar(55) COLLATE utf8mb4_unicode_ci DEFAULT 'product',
  `fname` varchar(55) COLLATE utf8mb4_unicode_ci DEFAULT 'food',
  `amount` float NOT NULL DEFAULT 0,
  `vat` float DEFAULT 0,
  `tamount` float DEFAULT 0,
  `cname` varchar(55) COLLATE utf8mb4_unicode_ci DEFAULT 'customer',
  `date` datetime DEFAULT NULL,
  `cphone` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT 'phone',
  `caddress` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'address',
  `ip_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_quantity` int(11) NOT NULL DEFAULT 1,
  `transaction_id` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT 'Transaction ID',
  `status` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `product_id`, `user_id`, `order_id`, `pname`, `fname`, `amount`, `vat`, `tamount`, `cname`, `date`, `cphone`, `caddress`, `ip_address`, `product_quantity`, `transaction_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 90, NULL, NULL, 'product', 'CHOW-MEIN WITH CHICKEN', 0, 0, 0, 'customer', '2022-08-23 00:00:00', 'phone', 'address', '43.229.12.234', 1, 'Transaction ID', 'pending', '2022-08-23 18:57:49', '2022-08-23 18:57:49'),
(16, 292, NULL, NULL, 'product', 'FRIED WONTON(8 PCS)', 0, 0, 0, 'customer', '2022-11-05 00:00:00', 'phone', 'address', '103.25.249.225', 1, 'Transaction ID', 'pending', '2022-11-05 19:25:10', '2022-11-05 19:25:10'),
(13, 450, NULL, NULL, 'product', 'EGG FRIED RICE', 0, 0, 0, 'customer', '2022-10-19 00:00:00', 'phone', 'address', '103.25.251.249', 1, 'Transaction ID', 'pending', '2022-10-19 18:11:52', '2022-10-19 18:11:52'),
(12, 294, NULL, NULL, 'product', 'FISH FINGER(6PCS)', 0, 0, 0, 'customer', '2022-09-25 00:00:00', 'phone', 'address', '114.130.188.82', 1, 'Transaction ID', 'pending', '2022-09-25 11:11:32', '2022-09-25 11:11:32');

-- --------------------------------------------------------

--
-- Table structure for table `collectionstatement`
--

CREATE TABLE `collectionstatement` (
  `id` int(11) NOT NULL,
  `email` varchar(55) NOT NULL,
  `date` date NOT NULL,
  `shopname` varchar(50) NOT NULL,
  `collectionamount` float NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `collectionstatement`
--

INSERT INTO `collectionstatement` (`id`, `email`, `date`, `shopname`, `collectionamount`, `created_at`, `updated_at`) VALUES
(1, 'mdnayem.cse21@gmail.com', '2022-02-09', 'Alvi Store', 5000, '2022-02-09 12:06:29', '2022-02-09 17:07:03');

-- --------------------------------------------------------

--
-- Table structure for table `collectiontable`
--

CREATE TABLE `collectiontable` (
  `id` int(11) NOT NULL,
  `email` varchar(55) NOT NULL,
  `date` date NOT NULL,
  `deliveryman` varchar(55) NOT NULL,
  `shopname` varchar(55) NOT NULL,
  `dueamount` float NOT NULL,
  `collectionamount` float NOT NULL,
  `amountleft` float DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `collectiontable`
--

INSERT INTO `collectiontable` (`id`, `email`, `date`, `deliveryman`, `shopname`, `dueamount`, `collectionamount`, `amountleft`, `created_at`, `updated_at`) VALUES
(1, 'mdnayem.cse21@gmail.com', '2022-04-19', 'jahangir', 'Alvi Store', 4000, 2000, 2000, '2022-04-13 17:36:04', '2022-04-19 09:39:23'),
(2, 'mdnayem.cse21@gmail.com', '2022-04-19', 'yeasin', 'Kazi Enterprise', 7000, 4000, 3000, '2022-04-19 12:59:46', '2022-04-19 12:59:46'),
(3, 'mdnayem.cse21@gmail.com', '2022-05-10', 'hridoy', 'kazi store', 7000, 5000, 2000, '2022-05-10 15:23:07', '2022-05-10 15:23:07'),
(4, 'mdnayem.cse21@gmail.com', '2022-05-11', 'Myself', 'Alvi Store', 5000, 4000, 1000, '2022-05-11 10:11:33', '2022-05-11 10:11:33'),
(5, 'mdnayem.cse21@gmail.com', '2022-05-11', 'sajid', 'Kazi Enterprise', 5000, 3000, 2000, '2022-05-11 12:49:10', '2022-05-17 13:00:58'),
(6, 'mdnayem.cse21@gmail.com', '2022-05-16', 'jahangir', 'Alvi Store', 7000, 5000, 2000, '2022-05-16 09:25:02', '2022-05-16 09:25:02');

-- --------------------------------------------------------

--
-- Table structure for table `companycarts`
--

CREATE TABLE `companycarts` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `order_id` int(10) UNSIGNED DEFAULT NULL,
  `pname` varchar(55) COLLATE utf8mb4_unicode_ci DEFAULT 'product',
  `fname` varchar(55) COLLATE utf8mb4_unicode_ci DEFAULT 'food',
  `tablenumber` int(11) DEFAULT 1,
  `waitername` varchar(55) COLLATE utf8mb4_unicode_ci DEFAULT 'Waiter 1',
  `amount` float NOT NULL DEFAULT 0,
  `vat` float DEFAULT 0,
  `tamount` float DEFAULT 0,
  `cname` varchar(55) COLLATE utf8mb4_unicode_ci DEFAULT 'customer',
  `date` datetime DEFAULT NULL,
  `cphone` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT 'phone',
  `caddress` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'address',
  `ip_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_quantity` int(11) NOT NULL DEFAULT 1,
  `transaction_id` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT 'Transaction ID',
  `status` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `companyorders`
--

CREATE TABLE `companyorders` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `payment_id` int(10) UNSIGNED DEFAULT NULL,
  `pid` int(11) DEFAULT NULL,
  `ip_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fname` varchar(55) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pname` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT '1',
  `amount` float DEFAULT 0,
  `vat` float DEFAULT 0,
  `tamount` float DEFAULT 0,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` datetime NOT NULL,
  `phone_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Public',
  `cashpayment` float DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_paid` tinyint(1) NOT NULL DEFAULT 0,
  `is_completed` tinyint(1) NOT NULL DEFAULT 0,
  `is_seen_by_admin` tinyint(1) NOT NULL DEFAULT 0,
  `transaction_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `email` varchar(55) DEFAULT NULL,
  `phone` varchar(55) NOT NULL,
  `subject` varchar(55) DEFAULT NULL,
  `message` varchar(255) NOT NULL,
  `status` varchar(50) DEFAULT 'Pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `email`, `phone`, `subject`, `message`, `status`, `created_at`, `updated_at`) VALUES
(1, 'mdnayem.cse21@gmail.com', '01999791578', 'Test', 'Test Message', 'Pending', '2022-07-03 18:05:00', '2022-07-04 08:52:38'),
(2, 'ellargatoguti@hotmail.com', '89035138295', 'Earn additional money without efforts.', 'Join the society of successful people who make money here. https://cigo.rbertilsson.se/', 'Pending', '2022-08-11 23:55:15', '2022-08-11 23:55:15'),
(3, 'asma.begum@hp.com', '89033336381', 'Making money in the net is easier now.', 'We know how to increase your financial stability. https://cigo.rbertilsson.se/', 'Pending', '2022-08-14 03:52:54', '2022-08-14 03:52:54'),
(4, 'tasianevilles@gmail.com', '89031288477', 'We know how to become rich and do you?', 'Online Bot will bring you wealth and satisfaction. https://cigo.rbertilsson.se/', 'Pending', '2022-08-15 06:02:21', '2022-08-15 06:02:21'),
(5, 'velasco.rica@gmail.com', '89031708052', 'Financial Robot is #1 investment tool ever. Launch it!', 'We know how to increase your financial stability. https://cigo.rbertilsson.se/', 'Pending', '2022-08-16 14:15:25', '2022-08-16 14:15:25'),
(6, 'r.xrxrxrxrxrxr4@gmail.com', '89031433620', 'Make thousands of bucks. Pay nothing.', 'Have no money? Earn it online. https://cigo.rbertilsson.se/', 'Pending', '2022-08-16 22:07:27', '2022-08-16 22:07:27'),
(7, 'woof_woof71@yahoo.com', '89039919290', 'Let the Robot bring you money while you rest.', 'Small investments can bring tons of dollars fast. https://cigo.rbertilsson.se/', 'Pending', '2022-08-17 00:46:37', '2022-08-17 00:46:37'),
(8, 'danwentz@clearchannel.com', '89038267490', 'We know how to increase your financial stability.', 'The additional income for everyone. https://cigo.rbertilsson.se/', 'Pending', '2022-08-17 03:31:27', '2022-08-17 03:31:27'),
(9, 'wlytzbqoo@msn.com', '89035172822', 'Online Bot will bring you wealth and satisfaction.', 'We know how to become rich and do you? https://cigo.rbertilsson.se/', 'Pending', '2022-08-17 06:13:30', '2022-08-17 06:13:30'),
(10, 'ghoshsub@gmail.com', '89036573213', 'Most successful people already use Robot. Do you?', 'Start making thousands of dollars every week. https://cigo.rbertilsson.se/', 'Pending', '2022-08-17 11:32:04', '2022-08-17 11:32:04'),
(11, 'rubeth.flores@hotmail.com', '89039451594', 'The huge income without investments is available, now!', 'Check out the new financial tool, which can make you rich. https://cigo.rbertilsson.se/', 'Pending', '2022-08-17 16:53:22', '2022-08-17 16:53:22'),
(12, 'redbonepimp57@gmail.com', '89032632438', 'Check out the automatic Bot, which works for you 24/7.', 'Most successful people already use Robot. Do you? https://cigo.rbertilsson.se/', 'Pending', '2022-08-18 05:56:02', '2022-08-18 05:56:02'),
(13, '1aztecflowr_69@sbcglobal.net', '89035379174', 'Watch your money grow while you invest with the Robot.', 'The additional income is available for everyone using this robot. https://cigo.rbertilsson.se/', 'Pending', '2022-08-18 13:41:25', '2022-08-18 13:41:25'),
(14, 'ncgom@163.com', '89039389652', 'Everyone who needs money should try this Robot out.', 'Launch the robot and let it bring you money. https://cigo.rbertilsson.se/', 'Pending', '2022-08-18 16:13:45', '2022-08-18 16:13:45'),
(15, 'jullan.santos@yahoo.com', '89034179819', 'Attention! Financial robot may bring you millions!', 'See how Robot makes $1000 from $1 of investment. https://cigo.rbertilsson.se/', 'Pending', '2022-08-18 18:58:56', '2022-08-18 18:58:56'),
(16, 'ronnieslife91@hotmail.com', '89036270520', 'The fastest way to make you wallet thick is here.', 'Online earnings are the easiest way for financial independence. https://cigo.escueladelcambio.es/', 'Pending', '2022-08-19 05:36:37', '2022-08-19 05:36:37'),
(17, 'regina.kulcsr3@gmail.com', '89030373307', 'Financial Robot is #1 investment tool ever. Launch it!', 'The huge income without investments is available. https://cigo.escueladelcambio.es/', 'Pending', '2022-08-19 08:17:48', '2022-08-19 08:17:48'),
(18, 'duder4lyfe@yahoo.com', '89034898573', 'Financial independence is what everyone needs.', 'Make dollars staying at home and launched this Bot. https://cigo.escueladelcambio.es/', 'Pending', '2022-08-19 13:35:37', '2022-08-19 13:35:37'),
(19, 'habbibk@yahoo.com', '89032961803', 'Let the Robot bring you money while you rest.', 'Launch the financial Robot and do your business. https://cigo.escueladelcambio.es/', 'Pending', '2022-08-19 16:13:36', '2022-08-19 16:13:36'),
(20, 'erinminogue1978@gmail.com', '89036219264', 'Start making thousands of dollars every week.', 'Financial robot is your success formula is found. Learn more about it. https://cigo.escueladelcambio.es/', 'Pending', '2022-08-19 18:53:12', '2022-08-19 18:53:12'),
(21, 'erika.e2929@yahoo.com', '89038613117', 'Try out the best financial robot in the Internet.', 'There is no need to look for a job anymore. Work online. https://cigo.escueladelcambio.es/', 'Pending', '2022-08-19 21:31:44', '2022-08-19 21:31:44'),
(22, 'gorpen12@hotmail.com', '89037336996', 'Just one click can turn you dollar into $1000.', 'The huge income without investments is available, now! https://cigo.escueladelcambio.es/', 'Pending', '2022-08-20 00:04:59', '2022-08-20 00:04:59'),
(23, 'rachjac47@aol.com', '89038815495', 'Financial Robot is #1 investment tool ever. Launch it!', 'The huge income without investments is available. https://cigo.escueladelcambio.es/', 'Pending', '2022-08-20 05:14:17', '2022-08-20 05:14:17'),
(24, 'p-h@telia.com', '89030483486', 'No worries if you are fired. Work online.', 'Making money in the net is easier now. https://cigo.escueladelcambio.es/', 'Pending', '2022-08-20 07:52:23', '2022-08-20 07:52:23'),
(25, 'tonyhawk1242@hotmail.com', '89030597752', 'Make money online, staying at home this cold winter.', 'This robot can bring you money 24/7. https://cigo.escueladelcambio.es/', 'Pending', '2022-08-20 10:27:56', '2022-08-20 10:27:56'),
(26, 'mythikaurora@hotmail.com', '89032366418', 'Turn $1 into $100 instantly. Use the financial Robot.', 'The best online investment tool is found. Learn more! https://cigo.escueladelcambio.es/', 'Pending', '2022-08-20 13:00:51', '2022-08-20 13:00:51'),
(27, 'rohit766@yahoo.com', '89039891920', 'Wow! This Robot is a great start for an online career.', 'Financial robot is your success formula is found. Learn more about it. https://cigo.escueladelcambio.es/', 'Pending', '2022-08-20 15:31:06', '2022-08-20 15:31:06'),
(28, 'tprousell@yahoo.com', '89031447791', 'Online Bot will bring you wealth and satisfaction.', 'Making money is very easy if you use the financial Robot. https://cigo.escueladelcambio.es/', 'Pending', '2022-08-20 18:06:18', '2022-08-20 18:06:18'),
(29, 'kimcooke78@gmail.com', '89038040859', 'Launch the robot and let it bring you money.', 'The online job can bring you a fantastic profit. https://cigo.escueladelcambio.es/', 'Pending', '2022-08-21 01:58:22', '2022-08-21 01:58:22'),
(30, 'karisma.fb@gmail.com', '89033222941', 'Your money work even when you sleep.', 'Trust the financial Bot to become rich. https://cigo.escueladelcambio.es/', 'Pending', '2022-08-21 07:15:44', '2022-08-21 07:15:44'),
(31, 'jcrosslandf@aol.com', '89031433884', 'Money, money! Make more money with financial robot!', 'Everyone who needs money should try this Robot out. https://cigo.escueladelcambio.es/', 'Pending', '2022-08-21 09:54:37', '2022-08-21 09:54:37'),
(32, 'ramzie_oss_oost@hotmail.com', '89036406288', 'Rich people are rich because they use this robot.', 'Check out the new financial tool, which can make you rich. https://cigo.escueladelcambio.es/', 'Pending', '2022-08-21 12:35:58', '2022-08-21 12:35:58'),
(33, 'egraham@tampabay.rr.com', '89036487361', 'The fastest way to make your wallet thick is found.', 'Everyone can earn as much as he wants now. https://cigo.escueladelcambio.es/', 'Pending', '2022-08-21 18:05:02', '2022-08-21 18:05:02'),
(34, 'pbluv1@aol.com', '89034118352', 'Wow! This Robot is a great start for an online career.', 'No need to work anymore. Just launch the robot. https://cigo.escueladelcambio.es/', 'Pending', '2022-08-21 20:51:50', '2022-08-21 20:51:50'),
(35, 'n.ilona1@gmail.com', '89032972664', 'Financial robot is the best companion of rich people.', 'Only one click can grow up your money really fast. https://cigo.escueladelcambio.es/', 'Pending', '2022-08-22 02:23:24', '2022-08-22 02:23:24'),
(36, 'w.love1959@gmail.com', '89039920475', 'Even a child knows how to make $100 today.', 'Let the Robot bring you money while you rest. https://cigo.escueladelcambio.es/', 'Pending', '2022-08-22 05:02:56', '2022-08-22 05:02:56'),
(37, '05kalpana.patel@gmail.com', '89038533991', 'Financial independence is what everyone needs.', 'Wow! This is a fastest way for a financial independence. https://cigo.escueladelcambio.es/', 'Pending', '2022-08-22 07:45:13', '2022-08-22 07:45:13'),
(38, 'sekil_jocukk@hotmail.com', '89030792026', 'Make thousands of bucks. Pay nothing.', 'Looking for an easy way to make money? Check out the financial robot. http://go.tazalus.com/096s', 'Pending', '2022-08-22 13:07:35', '2022-08-22 13:07:35'),
(39, 'bankonit2991@gmail.com', '89034165831', 'The financial Robot is your # 1 expert of making money.', 'See how Robot makes $1000 from $1 of investment. http://go.tazalus.com/096s', 'Pending', '2022-08-22 18:18:58', '2022-08-22 18:18:58'),
(40, 'milad_art_20@yahoo.com', '89030950004', 'The best online investment tool is found. Learn more!', 'Invest $1 today to make $1000 tomorrow. http://go.tazalus.com/096s', 'Pending', '2022-08-22 20:56:38', '2022-08-22 20:56:38'),
(41, 'katrinawaltze@yahoo.com', '89036134545', 'Looking forward for income? Get it online.', 'Provide your family with the money in age. Launch the Robot! http://go.tazalus.com/096s', 'Pending', '2022-08-22 23:33:35', '2022-08-22 23:33:35'),
(42, 'pc.dab.ge@gmail.com', '89036624805', 'The best online investment tool is found. Learn more!', 'Additional income is now available for anyone all around the world. http://go.tazalus.com/096s', 'Pending', '2022-08-23 12:30:54', '2022-08-23 12:30:54'),
(43, 'raney1@gmail.com', '89030953621', 'Make your money work for you all day long.', 'Still not a millionaire? The financial robot will make you him! http://go.tazalus.com/096s', 'Pending', '2022-08-23 15:07:51', '2022-08-23 15:07:51'),
(44, 'stevextrm@aol.com', '89032414743', 'Need cash? Launch this robot and see what it can.', 'Trust your dollar to the Robot and see how it grows to $100. http://go.tazalus.com/096s', 'Pending', '2022-08-23 17:46:25', '2022-08-23 17:46:25'),
(45, 'nkelly22@comcast.net', '89033561835', 'Try out the best financial robot in the Internet.', 'The best online job for retirees. Make your old ages rich. http://go.tazalus.com/096s', 'Pending', '2022-08-23 20:23:38', '2022-08-23 20:23:38'),
(46, 'princesafina@live.com', '89035020779', 'Need cash? Launch this robot and see what it can.', 'Launch the financial Robot and do your business. http://go.tazalus.com/096s', 'Pending', '2022-08-23 23:18:13', '2022-08-23 23:18:13'),
(47, 'brianautote@aol.com', '89035342153', 'Have no financial skills? Let Robot make money for you.', 'Need money? Get it here easily? http://go.tazalus.com/096s', 'Pending', '2022-08-24 01:54:39', '2022-08-24 01:54:39'),
(48, 'anju.bin.princy@gmail.com', '89038095999', 'Small investments can bring tons of dollars fast.', 'Your computer can bring you additional income if you use this Robot. http://go.tazalus.com/096s', 'Pending', '2022-08-24 04:27:22', '2022-08-24 04:27:22'),
(49, 'ngracienewton@gmail.com', '89033309080', 'Make your computer to be you earning instrument.', 'Make $1000 from $1 in a few minutes. Launch the financial robot now. http://go.tazalus.com/096s', 'Pending', '2022-08-24 09:34:21', '2022-08-24 09:34:21'),
(50, 'carolynfisher0@aol.com', '89032136415', 'Make your computer to be you earning instrument.', 'Online job can be really effective if you use this Robot. http://go.tazalus.com/096s', 'Pending', '2022-08-24 14:41:05', '2022-08-24 14:41:05'),
(51, 'khushmeet@yahoo.com', '89032542018', 'Start your online work using the financial Robot.', 'The financial Robot is your future wealth and independence. http://go.tazalus.com/0j0l', 'Pending', '2022-09-02 15:46:24', '2022-09-02 15:46:24'),
(52, 'rjh0422@gmail.com', '89036058770', 'We know how to increase your financial stability.', 'Online job can be really effective if you use this Robot. http://go.tazalus.com/0j0l', 'Pending', '2022-09-02 20:47:14', '2022-09-02 20:47:14'),
(53, 'jlawler0915@aol.com', '89039668687', 'Have no financial skills? Let Robot make money for you.', 'Your computer can bring you additional income if you use this Robot. http://go.tazalus.com/0j0l', 'Pending', '2022-09-03 01:48:49', '2022-09-03 01:48:49'),
(54, 'paigekatlyn96@gmail.com', '89034959208', 'Making money in the net is easier now.', 'The online financial Robot is your key to success. http://go.tazalus.com/0j0l', 'Pending', '2022-09-03 04:21:01', '2022-09-03 04:21:01'),
(55, 'ericollomb@hotmail.com', '89031767744', 'Find out about the easiest way of money earning.', 'The online income is the easiest ways to make you dream come true. http://go.tazalus.com/0j0l', 'Pending', '2022-09-03 06:53:09', '2022-09-03 06:53:09'),
(56, 'joeparra360@yahoo.com', '89032324572', 'Looking forward for income? Get it online.', 'Using this Robot is the best way to make you rich. http://go.tazalus.com/0j0l', 'Pending', '2022-09-03 09:24:59', '2022-09-03 09:24:59'),
(57, 'wvxg7925958@gmail.com', '89031226559', 'Everyone who needs money should try this Robot out.', 'Start making thousands of dollars every week. http://go.tazalus.com/0j0l', 'Pending', '2022-09-03 14:30:42', '2022-09-03 14:30:42'),
(58, 'sashaspivak10@gmail.com', '89039621324', 'Financial robot is the best companion of rich people.', 'Even a child knows how to make $100 today. http://go.tazalus.com/0j0l', 'Pending', '2022-09-03 19:31:48', '2022-09-03 19:31:48'),
(59, 'andrastardy@gmail.com', '89038286217', 'Watch your money grow while you invest with the Robot.', 'Need some more money? Robot will earn them really fast. http://go.tazalus.com/0j0l', 'Pending', '2022-09-04 00:32:26', '2022-09-04 00:32:26'),
(60, 'prudence.dadzie@gmail.com', '89038425395', 'Need some more money? Robot will earn them really fast.', 'Check out the automatic Bot, which works for you 24/7. http://go.tazalus.com/0j0l', 'Pending', '2022-09-04 03:00:36', '2022-09-04 03:00:36'),
(61, 'ryryrjl2727@aim.com', '89036443332', 'Rich people are rich because they use this robot.', 'Find out about the easiest way of money earning. http://go.tazalus.com/0j0l', 'Pending', '2022-09-04 05:30:56', '2022-09-04 05:30:56'),
(62, 'mikki.collier@gmail.com', '89036725603', 'Make money, not war! Financial Robot is what you need.', 'Let the financial Robot be your companion in the financial market. http://go.tazalus.com/0j0l', 'Pending', '2022-09-04 13:06:41', '2022-09-04 13:06:41'),
(63, 'c_cardona_2003@yahoo.com', '89033774812', 'Make money, not war! Financial Robot is what you need.', 'No need to work anymore. Just launch the robot. http://go.tygyguip.com/096s', 'Pending', '2022-09-04 18:04:05', '2022-09-04 18:04:05'),
(64, 'centurian2015@gmail.com', '89032955743', 'Make your money work for you all day long.', 'Buy everything you want earning money online. https://emdn.cl/promo', 'Pending', '2022-09-04 20:33:00', '2022-09-04 20:33:00'),
(65, 'raquel_stones@hotmail.com', '89036520755', 'Make money, not war! Financial Robot is what you need.', 'Check out the new financial tool, which can make you rich. https://emdn.cl/promo', 'Pending', '2022-09-04 23:03:13', '2022-09-04 23:03:13'),
(66, 'reflectiveblessings@gmail.com', '89039729476', 'Invest $1 today to make $1000 tomorrow.', 'Make thousands every week working online here. https://emdn.cl/promo', 'Pending', '2022-09-05 01:33:44', '2022-09-05 01:33:44'),
(67, 'annekeroobol@hotmail.com', '89031995528', 'The online job can bring you a fantastic profit.', 'No worries if you are fired. Work online. https://emdn.cl/promo', 'Pending', '2022-09-05 04:04:19', '2022-09-05 04:04:19'),
(68, 'brazilnut68@yahoo.com', '89034309213', 'Most successful people already use Robot. Do you?', 'Start making thousands of dollars every week. https://emdn.cl/promo', 'Pending', '2022-09-05 06:35:49', '2022-09-05 06:35:49'),
(69, 'Jesse82206@gmail.com', '89037319364', 'Have no financial skills? Let Robot make money for you.', 'The additional income is available for everyone using this robot. https://emdn.cl/promo', 'Pending', '2022-09-05 09:03:25', '2022-09-05 09:03:25'),
(70, 'sabillonclaudia@yahoo.com', '89039190648', 'The huge income without investments is available.', 'Learn how to make hundreds of backs each day. https://emdn.cl/promo', 'Pending', '2022-09-05 11:33:33', '2022-09-05 11:33:33'),
(71, 'blok_hed_2000@yahoo.com', '89037958184', 'We know how to make our future rich and do you?', 'Watch your money grow while you invest with the Robot. https://emdn.cl/promo', 'Pending', '2022-09-05 16:34:00', '2022-09-05 16:34:00'),
(72, 'sebibrindus@yahoo.com', '89031478282', 'Only one click can grow up your money really fast.', 'The best way for everyone who rushes for financial independence. https://tiendaskon.com.es/promo', 'Pending', '2022-09-05 21:45:32', '2022-09-05 21:45:32'),
(73, 'warchojl@gmail.com', '89034353242', 'Need cash? Launch this robot and see what it can.', 'Launch the best investment instrument to start making money today. https://tiendaskon.com.es/promo', 'Pending', '2022-09-06 00:43:27', '2022-09-06 00:43:27'),
(74, 'jsg151978@yahoo.com', '89039925890', 'The best online investment tool is found. Learn more!', 'Launch the best investment instrument to start making money today. https://tiendaskon.com.es/promo', 'Pending', '2022-09-06 03:21:27', '2022-09-06 03:21:27'),
(75, 'ro.d.ros.mo.l.le@gmail.com', '89039509590', 'Need some more money? Robot will earn them really fast.', 'Make your money work for you all day long. https://tiendaskon.com.es/promo', 'Pending', '2022-09-06 11:05:15', '2022-09-06 11:05:15'),
(76, 'jediphukker@msn.com', '89037710924', 'Trust the financial Bot to become rich.', 'Make your money work for you all day long. https://tiendaskon.com.es/promo', 'Pending', '2022-09-06 13:41:29', '2022-09-06 13:41:29'),
(77, 'tiffanyrogers414@gmail.com', '89032253194', 'Need money? The financial robot is your solution.', 'Online job can be really effective if you use this Robot. https://hierbalimon.es/promo', 'Pending', '2022-09-06 16:17:59', '2022-09-06 16:17:59'),
(78, 'brendahhildah12@gmail.com', '89035902275', 'Need money? Earn it without leaving your home.', 'No need to worry about the future if your use this financial robot. https://hierbalimon.es/promo', 'Pending', '2022-09-06 18:48:13', '2022-09-06 18:48:13'),
(79, 'njelistiqkri2@yahoo.com', '89038022666', 'The huge income without investments is available.', 'Looking for an easy way to make money? Check out the financial robot. https://hierbalimon.es/promo', 'Pending', '2022-09-07 07:21:34', '2022-09-07 07:21:34'),
(80, 'randishepard@me.com', '89034317523', 'Your money work even when you sleep.', 'Make money 24/7 without any efforts and skills. https://hierbalimon.es/promo', 'Pending', '2022-09-07 12:26:18', '2022-09-07 12:26:18'),
(81, 'ddammerman@lakeland.cc.il.us', '89038656147', 'See how Robot makes $1000 from $1 of investment.', 'Making money in the net is easier now. https://bodyandsoul.com.es/promo', 'Pending', '2022-09-07 15:02:59', '2022-09-07 15:02:59'),
(82, 'twsted10303@yahoo.com', '89033929905', 'Make your money work for you all day long.', 'Wow! This is a fastest way for a financial independence. https://bodyandsoul.com.es/promo', 'Pending', '2022-09-07 17:36:38', '2022-09-07 17:36:38'),
(83, 'vika_freestyle@yahoo.com', '89039759697', 'Make your computer to be you earning instrument.', 'Robot is the best way for everyone who looks for financial independence. https://bodyandsoul.com.es/promo', 'Pending', '2022-09-07 22:37:22', '2022-09-07 22:37:22'),
(84, 'cutechirag1978@rediffmail.com', '89031506202', 'We know how to make our future rich and do you?', 'Even a child knows how to make $100 today. https://puertobelenn.cl/promo', 'Pending', '2022-09-08 13:35:51', '2022-09-08 13:35:51'),
(85, 'Kody_johnson1005@yahoo.com', '89034657063', 'Find out about the easiest way of money earning.', 'Invest $1 today to make $1000 tomorrow. https://puertobelenn.cl/promo', 'Pending', '2022-09-08 16:04:35', '2022-09-08 16:04:35'),
(86, 'rsuthar@cyras.com', '89034779735', 'Your money work even when you sleep.', 'Have no money? Earn it online. http://duma.goslog.ru/bitrix/redirect.php?event1=file&event2=puertobelenn.cl&event3=29.01.2015_312_rd.doc&goto=https://puertobelenn.cl/promo', 'Pending', '2022-09-08 21:09:26', '2022-09-08 21:09:26'),
(87, 'jhmassey20@aol.com', '89038417071', 'Looking forward for income? Get it online.', 'Earning $1000 a day is easy if you use this financial Robot. https://www.webstolica.ru/go.php?link=https://puertobelenn.cl/promo', 'Pending', '2022-09-08 23:41:30', '2022-09-08 23:41:30'),
(88, 'dcleghorn987@rogers.com', '89032933477', 'The huge income without investments is available, now!', 'Make money, not war! Financial Robot is what you need. http://satellitespies.kiwi.nz/Link.php?URL=https://puertobelenn.cl/promo', 'Pending', '2022-09-09 07:16:51', '2022-09-09 07:16:51'),
(89, 'harsha_files@yahoo.com', '89030682288', 'The online job can bring you a fantastic profit.', 'Need cash? Launch this robot and see what it can. http://infomark.co.kr/shop/bannerhit.php?bn_id=61&url=https%3A%2F%2Fpuertobelenn.cl%2Fpromo', 'Pending', '2022-09-09 09:48:51', '2022-09-09 09:48:51'),
(90, 'wealthdivaj@gmail.com', '89032752151', 'Have no money? Earn it online.', 'The best way for everyone who rushes for financial independence. https://egyszervolt.hu/banner.php?name=bubaj-2018-link&url=puertobelenn.cl%2Fpromo', 'Pending', '2022-09-09 12:19:25', '2022-09-09 12:19:25'),
(91, 'augo89@aol.com', '89031530471', 'Make thousands every week working online here.', 'Let your money grow into the capital with this Robot. https://www.cazbo.co.uk/cgi-bin/axs/ax.pl?https://puertobelenn.cl/promo', 'Pending', '2022-09-09 14:54:14', '2022-09-09 14:54:14'),
(92, 'mflanagan9948@aol.com', '89033800180', 'No worries if you are fired. Work online.', 'Make money in the internet using this Bot. It really works! http://www.onlinegreece.gr/?lang=eng&url=https%3A%2F%2Fpuertobelenn.cl%2Fpromo', 'Pending', '2022-09-09 20:07:27', '2022-09-09 20:07:27'),
(93, 'Renee.Tyus@gmail.com', '89031560847', 'Using this Robot is the best way to make you rich.', 'The online income is your key to success. https://www.leaducation.ru/bitrix/redirect.php?event1=&event2=&event3=&goto=https://puertobelenn.cl/promo', 'Pending', '2022-09-09 22:43:38', '2022-09-09 22:43:38'),
(94, 'gillespiej@aetna.com', '89032624475', 'Everyone can earn as much as he wants suing this Bot.', 'Have no financial skills? Let Robot make money for you. https://quehacerensantiago.cl/promo', 'Pending', '2022-09-10 01:13:49', '2022-09-10 01:13:49'),
(95, 'seto2424@yahoo.com', '89034310593', 'The additional income for everyone.', 'Make dollars staying at home and launched this Bot. https://quehacerensantiago.cl/promo', 'Pending', '2022-09-10 03:44:00', '2022-09-10 03:44:00'),
(96, 'will_woodall@msn.com', '89030665872', 'Wow! This Robot is a great start for an online career.', 'The best online job for retirees. Make your old ages rich. https://quehacerensantiago.cl/promo', 'Pending', '2022-09-10 06:12:34', '2022-09-10 06:12:34'),
(97, 'northfrench3000@aol.com', '89034597626', 'Everyone can earn as much as he wants suing this Bot.', 'Make your laptop a financial instrument with this program. https://quehacerensantiago.cl/promo', 'Pending', '2022-09-10 08:49:05', '2022-09-10 08:49:05'),
(98, 'denisedalton86@yahoo.com', '89039790554', 'The best online investment tool is found. Learn more!', 'The additional income for everyone. http://asl.nochrichten.de/adclick.php?bannerid=101&zoneid=6&source=&dest=https://varatradgardsforening.se/promo', 'Pending', '2022-09-10 16:17:18', '2022-09-10 16:17:18'),
(99, 'joelyn1000@gmail.com', '89034564612', 'Learn how to make hundreds of backs each day.', 'Attention! Financial robot may bring you millions! http://xn--21-7lci3b.xn--p1ai/bitrix/redirect.php?event1=&event2=&event3=&goto=https://varatradgardsforening.se/promo', 'Pending', '2022-09-10 18:46:37', '2022-09-10 18:46:37'),
(100, 'latonya_farris@yahoo.com', '89035163256', 'Have no financial skills? Let Robot make money for you.', 'Provide your family with the money in age. Launch the Robot! https://leads.su/?ref_id=13057&go=https://varatradgardsforening.se/promo', 'Pending', '2022-09-10 21:24:48', '2022-09-10 21:24:48'),
(101, 'covalicious@sbcglobal.net', '89031538095', 'We know how to become rich and do you?', 'We know how to become rich and do you? http://go.tygyguip.com/096s', 'Pending', '2022-09-11 04:57:28', '2022-09-11 04:57:28'),
(102, 'rloera@edwardsaquifer.org', '89036775821', 'Attention! Financial robot may bring you millions!', 'Launch the robot and let it bring you money. http://go.tygyguip.com/096s', 'Pending', '2022-09-11 09:56:48', '2022-09-11 09:56:48'),
(103, 'mikemajerik@wowway.com', '89030006211', 'Robot never sleeps. It makes money for you 24/7.', 'Let the Robot bring you money while you rest. http://go.tygyguip.com/096s', 'Pending', '2022-09-11 12:29:47', '2022-09-11 12:29:47'),
(104, 'slemric87@gmail.com', '89030050454', 'We know how to become rich and do you?', 'The online income is the easiest ways to make you dream come true. http://go.tygyguip.com/096s', 'Pending', '2022-09-11 15:24:46', '2022-09-11 15:24:46'),
(105, 'predsfan366@aol.com', '89031410222', 'Have no money? Earn it online.', 'Need cash? Launch this robot and see what it can. http://go.tygyguip.com/096s', 'Pending', '2022-09-11 20:28:32', '2022-09-11 20:28:32'),
(106, 'Jadelandry@yahoo.com', '89033315298', 'The huge income without investments is available, now!', 'Even a child knows how to make $100 today with the help of this robot. http://go.tygyguip.com/096s', 'Pending', '2022-09-11 22:58:03', '2022-09-11 22:58:03'),
(107, 'kslewis@comcast.net', '89032374510', 'Using this Robot is the best way to make you rich.', 'One dollar is nothing, but it can grow into $100 here. http://go.tygyguip.com/096s', 'Pending', '2022-09-12 01:28:17', '2022-09-12 01:28:17'),
(108, 'ayfxmoeckn@ozwgua.com', '89032439299', 'Make dollars staying at home and launched this Bot.', 'This robot can bring you money 24/7. http://go.tygyguip.com/096s', 'Pending', '2022-09-12 09:05:57', '2022-09-12 09:05:57'),
(109, 'valerie.marzo@gmail.com', '89032891672', 'We know how to become rich and do you?', 'Automatic robot is the best start for financial independence. http://go.tygyguip.com/096s', 'Pending', '2022-09-12 11:33:48', '2022-09-12 11:33:48'),
(110, 'joncztc@hotmail.com', '89037979552', 'Let the Robot bring you money while you rest.', 'Launch the financial Bot now to start earning. http://go.tygyguip.com/096s', 'Pending', '2022-09-12 16:44:40', '2022-09-12 16:44:40'),
(111, 'starz_random@yahoo.com', '89031414845', 'Have no money? It’s easy to earn them online here.', 'Find out about the easiest way of money earning. https://allnews.elk.pl/096s', 'Pending', '2022-09-13 00:13:11', '2022-09-13 00:13:11'),
(112, 'omarrocksdonkeys@gmail.com', '89030624312', 'Financial independence is what everyone needs.', 'Earning $1000 a day is easy if you use this financial Robot. https://allnews.elk.pl/096s', 'Pending', '2022-09-13 02:45:09', '2022-09-13 02:45:09'),
(113, 'safsof09@yahoo.com', '89037926410', 'Financial independence is what everyone needs.', 'Let the Robot bring you money while you rest. https://allcnews.xyz/096s', 'Pending', '2022-09-13 08:08:38', '2022-09-13 08:08:38'),
(114, 'xihawibu@nabvaginsta1974.chez.com', '89038268742', 'The best online investment tool is found. Learn more!', 'The additional income is available for everyone using this robot. https://allcnews.xyz/096s', 'Pending', '2022-09-13 13:09:32', '2022-09-13 13:09:32'),
(115, 'rosemaryramos1@yahoo.com', '89033597765', 'Using this Robot is the best way to make you rich.', 'Make yourself rich in future using this financial robot. https://allcryptonnews.xyz/0j35', 'Pending', '2022-09-13 23:31:27', '2022-09-13 23:31:27'),
(116, 'scorpion0.9@hotmail.com', '89034818417', 'Try out the best financial robot in the Internet.', 'Even a child knows how to make money. Do you? https://allcryptonnews.xyz/0j35', 'Pending', '2022-09-14 01:59:59', '2022-09-14 01:59:59'),
(117, 'markevo108@hotmail.com', '89036864466', 'Make your money work for you all day long.', 'Make thousands every week working online here. https://allcryptonnews.xyz/0j35', 'Pending', '2022-09-14 07:02:50', '2022-09-14 07:02:50'),
(118, 'chriszha09jaden@yahoo.com', '89032208450', 'Make thousands of bucks. Pay nothing.', 'Every your dollar can turn into $100 after you lunch this Robot. https://allcryptonnews.xyz/0j35', 'Pending', '2022-09-14 09:34:30', '2022-09-14 09:34:30'),
(119, 'swathiwilliams@yahoo.com', '89038621055', 'Using this Robot is the best way to make you rich.', 'The financial Robot is the most effective financial tool in the net! https://allcryptonnews.xyz/0j35', 'Pending', '2022-09-14 14:34:31', '2022-09-14 14:34:31'),
(120, 'beauty_wasim@sify.com', '89034767129', 'Let your money grow into the capital with this Robot.', 'Let the Robot bring you money while you rest. https://allcryptonnews.xyz/0j35', 'Pending', '2022-09-14 17:07:06', '2022-09-14 17:07:06'),
(121, 'cobky_c60@yahoo.com', '89038644133', 'Make thousands every week working online here.', 'Feel free to buy everything you want with the additional income. https://go.tygyguip.com/0j35', 'Pending', '2022-09-14 22:05:23', '2022-09-14 22:05:23'),
(122, 'saurabharora_60@yahoo.com', '89036246782', 'Need money? Get it here easily?', 'Rich people are rich because they use this robot. https://go.tygyguip.com/0j35', 'Pending', '2022-09-15 00:33:25', '2022-09-15 00:33:25'),
(123, 'obiqita@asdfmailk.com', '89030127682', 'Wow! This Robot is a great start for an online career.', 'Have no money? Earn it online. https://go.tygyguip.com/0j35', 'Pending', '2022-09-15 03:03:52', '2022-09-15 03:03:52'),
(124, '6y7rg245@good007.net', '89037420918', 'Need money? The financial robot is your solution.', 'Financial robot is the best companion of rich people. https://go.tygyguip.com/0j35', 'Pending', '2022-09-15 05:31:57', '2022-09-15 05:31:57'),
(125, 'brittanylynn724@yahoo.com', '89031557541', 'The online job can bring you a fantastic profit.', 'Start your online work using the financial Robot. https://go.tygyguip.com/0j35', 'Pending', '2022-09-15 08:01:01', '2022-09-15 08:01:01'),
(126, 'rosannbibaehtexiste@hotmail.com', '89037973616', 'Even a child knows how to make $100 today.', 'Wow! This is a fastest way for a financial independence. https://go.tygyguip.com/0j35', 'Pending', '2022-09-15 12:57:51', '2022-09-15 12:57:51'),
(127, 'samet_crazy6@hotmail.com', '89032615433', 'Even a child knows how to make money. Do you?', 'Only one click can grow up your money really fast. https://go.tygyguip.com/0j35', 'Pending', '2022-09-15 15:28:20', '2022-09-15 15:28:20'),
(128, 'tonidallas18@yahoo.com', '89036839306', 'Make money online, staying at home this cold winter.', 'Launch the robot and let it bring you money. https://go.tygyguip.com/0j35', 'Pending', '2022-09-15 17:58:22', '2022-09-15 17:58:22'),
(129, 'karyln@gmail.com', '89037444015', 'Your money work even when you sleep.', 'Robot is the best solution for everyone who wants to earn. https://go.tygyguip.com/0j35', 'Pending', '2022-09-16 01:36:22', '2022-09-16 01:36:22'),
(130, 'mfitzell@verizon.net', '89038679635', 'Attention! Financial robot may bring you millions!', 'Launch the financial Bot now to start earning. https://go.tygyguip.com/0j35', 'Pending', '2022-09-16 04:04:08', '2022-09-16 04:04:08'),
(131, 'christymei_2@hotmail.com', '89038165726', 'Everyone can earn as much as he wants suing this Bot.', 'The online income is your key to success. https://go.tygyguip.com/0j35', 'Pending', '2022-09-16 08:59:52', '2022-09-16 08:59:52'),
(132, 'Dolemite_thapimp@yahoo.com', '89035726557', 'Even a child knows how to make money. Do you?', 'We have found the fastest way to be rich. Find it out here. https://go.tygyguip.com/0j35', 'Pending', '2022-09-16 11:31:11', '2022-09-16 11:31:11'),
(133, 'dms9174@gmail.com', '89038673800', 'The fastest way to make your wallet thick is found.', 'Everyone can earn as much as he wants now. https://go.tygyguip.com/0j35', 'Pending', '2022-09-16 23:56:53', '2022-09-16 23:56:53'),
(134, 'msmark21@gmail.com', '89037581864', 'We know how to become rich and do you?', 'Make yourself rich in future using this financial robot. https://go.tygyguip.com/0j35', 'Pending', '2022-09-17 07:27:41', '2022-09-17 07:27:41'),
(135, 'dr.aaboulhosn@yahoo.com', '89033264788', 'Making money in the net is easier now.', 'The fastest way to make your wallet thick is found. https://go.tygyguip.com/0j35', 'Pending', '2022-09-17 12:46:09', '2022-09-17 12:46:09'),
(136, 'jasonmisquez12@ymail.com', '89030134405', 'Have no money? It’s easy to earn them online here.', 'Financial independence is what everyone needs. https://go.tygyguip.com/0j35', 'Pending', '2022-09-17 17:48:49', '2022-09-17 17:48:49'),
(137, 'christopher.poulsen@amec.com', '89038405152', 'Online Bot will bring you wealth and satisfaction.', 'Online earnings are the easiest way for financial independence. https://go.tygyguip.com/0j35', 'Pending', '2022-09-17 20:18:16', '2022-09-17 20:18:16'),
(138, 'ryansg2009@yahoo.com', '89038684275', 'No need to work anymore. Just launch the robot.', 'Start making thousands of dollars every week just using this robot. https://go.tygyguip.com/0j35', 'Pending', '2022-09-18 03:54:02', '2022-09-18 03:54:02'),
(139, 'ammarsuraya@yahoo.com', '89033095620', 'Launch the financial Robot and do your business.', 'Make money online, staying at home this cold winter. https://go.tygyguip.com/0j35', 'Pending', '2022-09-18 11:24:34', '2022-09-18 11:24:34'),
(140, '477721136@qq.com', '89039811580', 'Wow! This Robot is a great start for an online career.', 'The huge income without investments is available. https://go.tygyguip.com/0j35', 'Pending', '2022-09-18 14:01:07', '2022-09-18 14:01:07'),
(141, 'nothing20124@gmail.com', '89035409001', 'Let your money grow into the capital with this Robot.', 'There is no need to look for a job anymore. Work online. https://go.tygyguip.com/0j35', 'Pending', '2022-09-18 21:29:12', '2022-09-18 21:29:12'),
(142, 'ricomars@comcast.net', '89035752161', 'Have no money? It’s easy to earn them online here.', 'Earning money in the Internet is easy if you use Robot. https://go.tygyguip.com/0j35', 'Pending', '2022-09-18 23:59:05', '2022-09-18 23:59:05'),
(143, 'lisalangfordganoe@yahoo.com', '89036759118', 'Just one click can turn you dollar into $1000.', 'Start making thousands of dollars every week just using this robot. https://go.tygyguip.com/0j35', 'Pending', '2022-09-19 02:26:06', '2022-09-19 02:26:06'),
(144, 'J.evans854@yahoo.com', '89039528765', 'Everyone who needs money should try this Robot out.', 'Online job can be really effective if you use this Robot. https://go.tygyguip.com/0j35', 'Pending', '2022-09-19 07:06:03', '2022-09-19 07:06:03'),
(145, 'foster_dominick@yahoo.com', '89031460962', 'The huge income without investments is available, now!', 'The financial Robot is your # 1 expert of making money. https://go.tygyguip.com/0j35', 'Pending', '2022-09-19 09:37:00', '2022-09-19 09:37:00'),
(146, 'thistledo@y7mail.com', '89036218212', 'Need some more money? Robot will earn them really fast.', 'Wow! This is a fastest way for a financial independence. https://go.tygyguip.com/0j35', 'Pending', '2022-09-19 12:04:48', '2022-09-19 12:04:48'),
(147, 'toter@sbcglobal.net', '89039931256', 'The best online investment tool is found. Learn more!', 'Make money 24/7 without any efforts and skills. https://go.tygyguip.com/0j35', 'Pending', '2022-09-19 14:34:00', '2022-09-19 14:34:00'),
(148, 'dwite40@yahoo.com', '89036478995', 'Everyone who needs money should try this Robot out.', 'Start making thousands of dollars every week just using this robot. https://go.tygyguip.com/0j35', 'Pending', '2022-09-19 17:04:32', '2022-09-19 17:04:32'),
(149, 'mazzarella.savannah@yahoo.com', '89033660416', 'Financial robot is the best companion of rich people.', 'Financial robot is your success formula is found. Learn more about it. https://go.tygyguip.com/0j35', 'Pending', '2022-09-19 19:36:44', '2022-09-19 19:36:44'),
(150, 'oyleryxab@hotmail.com', '89036038415', 'Even a child knows how to make $100 today.', 'Make your computer to be you earning instrument. https://go.tygyguip.com/0j35', 'Pending', '2022-09-20 03:04:15', '2022-09-20 03:04:15'),
(151, 'Victoriamullane69@yahoo.com', '89038470438', 'Wow! This Robot is a great start for an online career.', 'We know how to become rich and do you? https://go.tygyguip.com/0j35', 'Pending', '2022-09-20 07:59:59', '2022-09-20 07:59:59'),
(152, 'aktooling@gmail.com', '89035281532', 'Start your online work using the financial Robot.', 'Let the Robot bring you money while you rest. https://go.tygyguip.com/0j35', 'Pending', '2022-09-20 10:27:16', '2022-09-20 10:27:16'),
(153, 'spartanac@rocketmail.com', '89038322705', 'Let the Robot bring you money while you rest.', 'Invest $1 today to make $1000 tomorrow. https://go.tygyguip.com/0j35', 'Pending', '2022-09-20 12:56:22', '2022-09-20 12:56:22'),
(154, 'edwinamaro02@yahoo.com', '89035157905', 'Check out the automatic Bot, which works for you 24/7.', 'Launch the best investment instrument to start making money today. https://go.tygyguip.com/0j35', 'Pending', '2022-09-20 15:30:43', '2022-09-20 15:30:43'),
(155, 'omidparsi@yahoo.com', '89031406997', 'Your money work even when you sleep.', 'Turn $1 into $100 instantly. Use the financial Robot. https://go.tygyguip.com/0j35', 'Pending', '2022-09-20 18:01:38', '2022-09-20 18:01:38'),
(156, 'trangnguyen106@gmail.com', '89035325501', 'Even a child knows how to make $100 today.', 'Need money? Earn it without leaving your home. https://go.hinebixi.com/0j35', 'Pending', '2022-09-20 23:01:48', '2022-09-20 23:01:48'),
(157, 'mymail@mymails.cmo', '89316253791', 'ONE OF A KIND GUNFIRE: $593 for 3 minutes', 'SPECIAL ARTICLE: Form week, he appeared on The Overdue Show with Stephen Colbert and announced a new \"cornucopia loophole\" which can turn into anyone into a millionaire within 3-4 months https://87bil.co/EN-CA-2124.html?news-id-864279', 'Pending', '2022-09-21 01:54:55', '2022-09-21 01:54:55'),
(158, 'sureshsubhashini@yahoo.com', '89034061042', 'Financial robot is the best companion of rich people.', 'There is no need to look for a job anymore. Work online. https://go.hinebixi.com/0j35', 'Pending', '2022-09-21 03:56:57', '2022-09-21 03:56:57'),
(159, 'cyrenermeier7777@gmail.com', '89037044027', 'Financial independence is what this robot guarantees.', 'No need to work anymore while you have the Robot launched! https://go.hinebixi.com/0j35', 'Pending', '2022-09-21 08:53:03', '2022-09-21 08:53:03'),
(160, 'emancapodicasa@hotmail.com', '89032481943', 'Attention! Financial robot may bring you millions!', 'Check out the automatic Bot, which works for you 24/7. https://go.hinebixi.com/0j35', 'Pending', '2022-09-21 11:19:00', '2022-09-21 11:19:00'),
(161, 'kmazzant@verizon.net', '89034181493', 'Check out the newest way to make a fantastic profit.', 'Make yourself rich in future using this financial robot. https://go.hinebixi.com/0j35', 'Pending', '2022-09-21 13:45:36', '2022-09-21 13:45:36'),
(162, 'peter.anayo@yahoo.com', '89037246863', 'No need to work anymore. Just launch the robot.', 'Have no money? Earn it online. https://go.hinebixi.com/0j35', 'Pending', '2022-09-21 18:37:26', '2022-09-21 18:37:26'),
(163, 'tinaj1122@yahoo.com', '89034904880', 'The success formula is found. Learn more about it.', 'Money, money! Make more money with financial robot! https://go.obermatsa.com/0j35', 'Pending', '2022-09-21 21:04:39', '2022-09-21 21:04:39'),
(164, 'dishroomsam@yahoo.com', '89034118932', 'Only one click can grow up your money really fast.', 'The financial Robot works for you even when you sleep. https://go.obermatsa.com/0j35', 'Pending', '2022-09-21 23:33:06', '2022-09-21 23:33:06'),
(165, 'webping@hotmail.com', '89037722388', 'Earn additional money without efforts.', 'The financial Robot is the most effective financial tool in the net! https://go.obermatsa.com/0j35', 'Pending', '2022-09-22 01:59:29', '2022-09-22 01:59:29'),
(166, 'Rosaguz72@outlook.com', '89035519538', 'Have no financial skills? Let Robot make money for you.', 'Most successful people already use Robot. Do you? https://go.obermatsa.com/0j35', 'Pending', '2022-09-22 04:27:12', '2022-09-22 04:27:12'),
(167, 'bluejay@bellsouth.net', '89035299221', 'Start making thousands of dollars every week.', 'There is no need to look for a job anymore. Work online. https://go.obermatsa.com/0j35', 'Pending', '2022-09-22 06:56:06', '2022-09-22 06:56:06'),
(168, 'nebur649@gmail.com', '89035589565', 'Have no financial skills? Let Robot make money for you.', 'Financial robot keeps bringing you money while you sleep. https://go.obermatsa.com/0j35', 'Pending', '2022-09-22 09:22:05', '2022-09-22 09:22:05'),
(169, 'Noacl@yahoo.com', '89039744482', 'The online job can bring you a fantastic profit.', 'Only one click can grow up your money really fast. https://go.obermatsa.com/0j35', 'Pending', '2022-09-22 11:49:33', '2022-09-22 11:49:33'),
(170, 'mkh_12@yahoo.com', '89032524720', 'Attention! Here you can earn money online!', 'Small investments can bring tons of dollars fast. https://go.obermatsa.com/0j35', 'Pending', '2022-09-22 16:47:52', '2022-09-22 16:47:52'),
(171, 'justindavidwhite@gmail.com', '89033625002', 'Make dollars staying at home and launched this Bot.', 'No need to work anymore. Just launch the robot. https://go.obermatsa.com/0j35', 'Pending', '2022-09-22 21:45:09', '2022-09-22 21:45:09'),
(172, 'adam.saul@cantab.net', '89033570563', 'Need money? Get it here easily?', 'Learn how to make hundreds of backs each day. https://go.obermatsa.com/0j35', 'Pending', '2022-09-23 00:13:48', '2022-09-23 00:13:48'),
(173, 'soccerqueen34@hotmail.com', '89032608658', 'Need money? The financial robot is your solution.', 'Financial robot keeps bringing you money while you sleep. https://go.obermatsa.com/0j35', 'Pending', '2022-09-23 02:41:39', '2022-09-23 02:41:39'),
(174, 'hihanahi101@yahoo.com', '89035497983', 'Launch the robot and let it bring you money.', 'Launch the financial Robot and do your business. https://go.obermatsa.com/0j35', 'Pending', '2022-09-23 07:39:14', '2022-09-23 07:39:14'),
(175, 'doughousholder@gmail.com', '89038422163', 'The financial Robot is your # 1 expert of making money.', 'Need money? Get it here easily! Just press this to launch the robot. http://go.obermatsa.com/0ja8', 'Pending', '2022-09-28 15:45:06', '2022-09-28 15:45:06'),
(176, 'dorts12@wideopenwest.com', '89034818700', 'Make thousands of bucks. Pay nothing.', 'Need cash? Launch this robot and see what it can. http://go.obermatsa.com/0ja8', 'Pending', '2022-09-29 13:18:36', '2022-09-29 13:18:36'),
(177, 'schartb77@verizon.net', '89036075032', 'Start your online work using the financial Robot.', 'Need some more money? Robot will earn them really fast. https://go.diryjyaz.com/0j35', 'Pending', '2022-09-30 10:19:05', '2022-09-30 10:19:05'),
(178, 'mareearn@yahoo.com', '89035980122', 'Earning money in the Internet is easy if you use Robot.', 'No worries if you are fired. Work online. https://go.diryjyaz.com/0j35', 'Pending', '2022-09-30 17:10:59', '2022-09-30 17:10:59'),
(179, 'jjataer@aol.com', '89031358223', 'Most successful people already use Robot. Do you?', 'There is no need to look for a job anymore. Work online. https://go.diryjyaz.com/0j35', 'Pending', '2022-10-01 06:54:53', '2022-10-01 06:54:53'),
(180, 'arielesmith14@yahoo.com', '89032231507', 'Even a child knows how to make money. Do you?', 'Robot never sleeps. It makes money for you 24/7. https://go.diryjyaz.com/0j35', 'Pending', '2022-10-01 13:47:05', '2022-10-01 13:47:05'),
(181, 'petefable@me.com', '89031879531', 'Even a child knows how to make money. Do you?', 'Your computer can bring you additional income if you use this Robot. https://go.diryjyaz.com/0j35', 'Pending', '2022-10-01 20:57:05', '2022-10-01 20:57:05'),
(182, 'rmankin1982@hotmail.com', '89035990144', 'Learn how to make hundreds of backs each day.', 'Everyone can earn as much as he wants now. https://go.diryjyaz.com/0j35', 'Pending', '2022-10-02 10:38:27', '2022-10-02 10:38:27'),
(183, 'kingxeno7761@gmail.com', '89036412732', 'We know how to increase your financial stability.', 'The additional income for everyone. https://go.diryjyaz.com/0j35', 'Pending', '2022-10-03 00:18:26', '2022-10-03 00:18:26'),
(184, 's.t.e.pankon.cov198.8@gmail.com', '89034011972', 'Launch the robot and let it bring you money.', 'The best online investment tool is found. Learn more! https://go.diryjyaz.com/0j35', 'Pending', '2022-10-03 07:33:19', '2022-10-03 07:33:19'),
(185, 'Ron.record@yahoo.com', '89036587025', 'This robot can bring you money 24/7.', 'Financial independence is what this robot guarantees. https://go.sakelonel.com/0jb5', 'Pending', '2022-10-03 14:26:22', '2022-10-03 14:26:22'),
(186, 'dmcmsc@aol.com', '89030598750', 'Wow! This Robot is a great start for an online career.', 'The online job can bring you a fantastic profit. https://go.sakelonel.com/0jb5', 'Pending', '2022-10-03 21:26:26', '2022-10-03 21:26:26'),
(187, 'ptn352@yahoo.com', '89033307920', 'Have no money? It’s easy to earn them online here.', 'Financial Robot is #1 investment tool ever. Launch it! https://go.sakelonel.com/0jb5', 'Pending', '2022-10-04 04:17:06', '2022-10-04 04:17:06'),
(188, 'gregorioison@live.com', '89038792990', 'The huge income without investments is available, now!', 'The financial Robot is your # 1 expert of making money. https://go.sakelonel.com/0jb5', 'Pending', '2022-10-04 11:30:45', '2022-10-04 11:30:45'),
(189, 'elizaswerenbecker@gmail.com', '89035664204', 'We know how to increase your financial stability.', 'Make money in the internet using this Bot. It really works! https://go.sakelonel.com/0j35', 'Pending', '2022-10-05 01:34:28', '2022-10-05 01:34:28'),
(190, 'aliffikri2001@hotmail.com', '84579267356', 'Facebook Promotion', 'Facebook Promotion Quality >>> http://facebook-video-promotion-guidelines.virtelli.com/news-6040 <<<', 'Pending', '2022-10-05 10:46:12', '2022-10-05 10:46:12'),
(191, 'aliffikri2001@hotmail.com', '88618981764', 'Facebook Promotion', 'Facebook Promotion Quality >>> http://facebook-video-promotion-guidelines.virtelli.com/news-6040 <<<', 'Pending', '2022-10-05 10:46:28', '2022-10-05 10:46:28'),
(192, 'aliffikri2001@hotmail.com', '82181373148', 'Facebook Promotion', 'Facebook Promotion Quality >>> http://facebook-video-promotion-guidelines.virtelli.com/news-6040 <<<', 'Pending', '2022-10-05 10:46:29', '2022-10-05 10:46:29'),
(193, 'aliffikri2001@hotmail.com', '88974562322', 'Facebook Promotion', 'Facebook Promotion Quality >>> http://facebook-video-promotion-guidelines.virtelli.com/news-6040 <<<', 'Pending', '2022-10-05 10:46:32', '2022-10-05 10:46:32'),
(194, 'aliffikri2001@hotmail.com', '88938192289', 'Facebook Promotion', 'Facebook Promotion Quality >>> http://facebook-video-promotion-guidelines.virtelli.com/news-6040 <<<', 'Pending', '2022-10-05 10:46:35', '2022-10-05 10:46:35'),
(195, 'indreshyadav1983@gmail.com', '89032223886', 'Launch the financial Bot now to start earning.', 'This robot can bring you money 24/7. https://go.sakelonel.com/0j35', 'Pending', '2022-10-05 15:23:29', '2022-10-05 15:23:29'),
(196, 'lyn2533@aol.com', '89030654430', 'Make thousands every week working online here.', 'Make dollars staying at home and launched this Bot. https://go.cuxavyem.com/0j35', 'Pending', '2022-10-05 22:16:36', '2022-10-05 22:16:36'),
(197, 'npleimann@yahoo.com', '89034967200', 'Need some more money? Robot will earn them really fast.', 'Still not a millionaire? Fix it now! https://go.cuxavyem.com/0j35', 'Pending', '2022-10-06 05:30:56', '2022-10-06 05:30:56'),
(198, 'rainbow_fanatic@hotmail.com', '89037119131', 'Have no money? It’s easy to earn them online here.', 'Looking for an easy way to make money? Check out the financial robot. https://go.cuxavyem.com/0j35', 'Pending', '2022-10-06 12:23:34', '2022-10-06 12:23:34'),
(199, 'miss_sonshynne@yahoo.com', '89030122350', 'The additional income for everyone.', 'Make money 24/7 without any efforts and skills. https://go.cuxavyem.com/0j35', 'Pending', '2022-10-06 19:19:01', '2022-10-06 19:19:01'),
(200, 'Shaunteeka@gmail.com', '89030156689', 'Make money 24/7 without any efforts and skills.', 'Make thousands of bucks. Pay nothing. https://go.cuxavyem.com/0j35', 'Pending', '2022-10-07 02:13:26', '2022-10-07 02:13:26'),
(201, 'jalasmith64@yahoo.com', '89034581594', 'Try out the best financial robot in the Internet.', 'The online job can bring you a fantastic profit. https://go.cuxavyem.com/0j35', 'Pending', '2022-10-07 16:01:07', '2022-10-07 16:01:07'),
(202, 'swainbrendak@hotmail.com', '89038649989', 'We know how to make our future rich and do you?', 'No need to work anymore while you have the Robot launched! https://go.gepekaep.com/0j35', 'Pending', '2022-10-07 23:00:46', '2022-10-07 23:00:46'),
(203, 'matterhorn9@q.com', '89038410539', 'We know how to become rich and do you?', 'Need money? Get it here easily? https://go.gepekaep.com/0j35', 'Pending', '2022-10-08 06:44:31', '2022-10-08 06:44:31'),
(204, 'doldis@triad.rr.com', '89031691693', 'Make dollars staying at home and launched this Bot.', 'Your computer can bring you additional income if you use this Robot. https://go.gepekaep.com/0j35', 'Pending', '2022-10-08 21:25:02', '2022-10-08 21:25:02'),
(205, 'yodav1023@yahoo.com', '89031809056', 'Need some more money? Robot will earn them really fast.', 'Most successful people already use Robot. Do you? https://go.gepekaep.com/0j35', 'Pending', '2022-10-09 11:11:16', '2022-10-09 11:11:16');
INSERT INTO `contact` (`id`, `email`, `phone`, `subject`, `message`, `status`, `created_at`, `updated_at`) VALUES
(206, 'torres_09@ymail.com', '89036989472', 'Make money 24/7 without any efforts and skills.', 'Try out the automatic robot to keep earning all day long. https://go.gepekaep.com/0j35', 'Pending', '2022-10-09 18:26:45', '2022-10-09 18:26:45'),
(207, 'bwatfeeley@persona.ca', '89646235857', 'OpenSea: How to make $15,000,000 from your NFTs', '$15,000,000 FROM YOUR NFTS https://telegra.ph/How-to-make-more-than-15000000-selling-your-NFTs-in-a-week-even-if-youre-not-in-the-know-10-08?id-20984770', 'Pending', '2022-10-10 04:49:17', '2022-10-10 04:49:17'),
(208, 'buddycoleman1@gmail.com', '89032852362', 'We know how to increase your financial stability.', 'Robot is the best way for everyone who looks for financial independence. Telegram - @Cryptaxbot', 'Pending', '2022-10-10 08:26:45', '2022-10-10 08:26:45'),
(209, 'carap@rova.net.au', '84644551795', 'HOW TO MAKE $15,000,000 FROM YOUR NFTS', '$15,000,000 from your NFTs >>> https://telegra.ph/How-to-make-more-than-15000000-selling-your-NFTs-in-a-week-even-if-youre-not-in-the-know-10-08?id-67464512 <<<', 'Pending', '2022-10-10 16:15:06', '2022-10-10 16:15:06'),
(210, 'carap@rova.net.au', '84826164836', 'HOW TO MAKE $15,000,000 FROM YOUR NFTS', '$15,000,000 from your NFTs >>> https://telegra.ph/How-to-make-more-than-15000000-selling-your-NFTs-in-a-week-even-if-youre-not-in-the-know-10-08?id-67464512 <<<', 'Pending', '2022-10-10 16:15:11', '2022-10-10 16:15:11'),
(211, 'carap@rova.net.au', '82776327625', 'HOW TO MAKE $15,000,000 FROM YOUR NFTS', '$15,000,000 from your NFTs >>> https://telegra.ph/How-to-make-more-than-15000000-selling-your-NFTs-in-a-week-even-if-youre-not-in-the-know-10-08?id-67464512 <<<', 'Pending', '2022-10-10 16:15:16', '2022-10-10 16:15:16'),
(212, 'carap@rova.net.au', '88945717588', 'HOW TO MAKE $15,000,000 FROM YOUR NFTS', '$15,000,000 from your NFTs >>> https://telegra.ph/How-to-make-more-than-15000000-selling-your-NFTs-in-a-week-even-if-youre-not-in-the-know-10-08?id-67464512 <<<', 'Pending', '2022-10-10 16:15:18', '2022-10-10 16:15:18'),
(213, 'carap@rova.net.au', '87512965936', 'HOW TO MAKE $15,000,000 FROM YOUR NFTS', '$15,000,000 from your NFTs >>> https://telegra.ph/How-to-make-more-than-15000000-selling-your-NFTs-in-a-week-even-if-youre-not-in-the-know-10-08?id-67464512 <<<', 'Pending', '2022-10-10 16:15:22', '2022-10-10 16:15:22'),
(214, 'roseyames11@gmail.com', '89039328449', 'The online job can bring you a fantastic profit.', 'No worries if you are fired. Work online. Telegram - @Cryptaxbot', 'Pending', '2022-10-12 09:14:36', '2022-10-12 09:14:36'),
(215, 'lyncrit@netdoor.com', '89030659426', 'We know how to become rich and do you?', 'The fastest way to make your wallet thick is found. Telegram - @Cryptaxbot', 'Pending', '2022-10-12 23:00:12', '2022-10-12 23:00:12'),
(216, 'mlewellyn@aristotle.net', '89030876650', 'The online financial Robot is your key to success.', 'See how Robot makes $1000 from $1 of investment. Telegram - @Cryptaxbot', 'Pending', '2022-10-13 19:37:43', '2022-10-13 19:37:43'),
(217, 'mayannjoy20@yahoo.com', '89030679686', 'Make money, not war! Financial Robot is what you need.', 'Let the financial Robot be your companion in the financial market. Telegram - @Cryptaxbot', 'Pending', '2022-10-14 02:31:48', '2022-10-14 02:31:48'),
(218, 'pretty_manilyn_08@yahoo.com', '89031161519', 'Most successful people already use Robot. Do you?', 'Everyone can earn as much as he wants now. Telegram - @Cryptaxbot', 'Pending', '2022-10-14 10:06:28', '2022-10-14 10:06:28'),
(219, 'heatherbug2008@yahoo.com', '89039426219', 'Need money? Earn it without leaving your home.', 'The financial Robot is your future wealth and independence. Telegram - @Cryptaxbot', 'Pending', '2022-10-15 00:50:57', '2022-10-15 00:50:57'),
(220, 'pranayp716@gmail.com', '89032379596', 'Need money? Earn it without leaving your home.', 'Try out the best financial robot in the Internet. Telegram - @Cryptaxbot', 'Pending', '2022-10-15 07:42:17', '2022-10-15 07:42:17'),
(221, 'juicy77@aol.com', '89033827238', 'Start making thousands of dollars every week.', 'One click of the robot can bring you thousands of bucks. Telegram - @Cryptaxbot', 'Pending', '2022-10-15 21:52:21', '2022-10-15 21:52:21'),
(222, 'kohopat@yahoo.com', '89038858775', 'Attention! Here you can earn money online!', 'No worries if you are fired. Work online. Telegram - @Cryptaxbot', 'Pending', '2022-10-16 04:43:49', '2022-10-16 04:43:49'),
(223, 'heffalump1217@yahoo.com', '89032713760', 'This robot can bring you money 24/7.', 'Make your money work for you all day long. Telegram - @Cryptaxbot', 'Pending', '2022-10-16 21:26:02', '2022-10-16 21:26:02'),
(224, 'sarah.gardineer@gmail.com', '89032000988', 'Have no financial skills? Let Robot make money for you.', 'Earn additional money without efforts and skills. Telegram - @Cryptaxbot', 'Pending', '2022-10-17 11:14:06', '2022-10-17 11:14:06'),
(225, 'Rjstinson38@gmail.com', '89034446312', 'Make money 24/7 without any efforts and skills.', 'The best online job for retirees. Make your old ages rich. Telegram - @Cryptaxbot', 'Pending', '2022-10-17 18:11:30', '2022-10-17 18:11:30'),
(226, 'mschleich2@hotmail.com', '89039101205', 'Have no money? It’s easy to earn them online here.', 'Join the society of successful people who make money here. Telegram - @Cryptaxbot', 'Pending', '2022-10-18 08:06:08', '2022-10-18 08:06:08'),
(227, 'Mstrawn1991@yahoo.com', '89032382315', 'We know how to increase your financial stability.', 'Find out about the easiest way of money earning. Telegram - @Cryptaxbot', 'Pending', '2022-10-18 14:54:26', '2022-10-18 14:54:26'),
(228, 'chumpy56@yahoo.com', '89031601169', 'Even a child knows how to make $100 today.', 'We know how to make our future rich and do you? Telegram - @Cryptaxbot', 'Pending', '2022-10-19 04:47:43', '2022-10-19 04:47:43'),
(229, 'carterpat@99yahoo.com', '89031590831', 'Online Bot will bring you wealth and satisfaction.', 'Small investments can bring tons of dollars fast. Telegram - @Cryptaxbot', 'Pending', '2022-10-19 12:01:49', '2022-10-19 12:01:49'),
(230, 'jackywongtour@gmail.com', '89036792665', 'Have no financial skills? Let Robot make money for you.', 'Check out the automatic Bot, which works for you 24/7. Telegram - @Cryptaxbot', 'Pending', '2022-10-19 18:55:20', '2022-10-19 18:55:20'),
(231, 'movingforward790@yahoo.com', '89034430448', 'Financial Robot is #1 investment tool ever. Launch it!', 'Earning $1000 a day is easy if you use this financial Robot. Telegram - @Cryptaxbot', 'Pending', '2022-10-20 01:46:19', '2022-10-20 01:46:19'),
(232, 'cliftonape@jeffersonbox.com', '89032182399', 'The online financial Robot is your key to success.', 'The online financial Robot is your key to success. Telegram - @Cryptaxbot', 'Pending', '2022-10-20 08:45:57', '2022-10-20 08:45:57'),
(233, 'gsrussell1983@yahoo.com', '89036454742', 'The success formula is found. Learn more about it.', 'Financial robot is your success formula is found. Learn more about it. Telegram - @Cryptaxbot', 'Pending', '2022-10-20 17:41:21', '2022-10-20 17:41:21'),
(234, 'jelenarubio911@yahoo.com', '89034346044', 'Make thousands of bucks. Pay nothing.', 'Make your laptop a financial instrument with this program. Telegram - @Cryptaxbot', 'Pending', '2022-10-21 14:19:19', '2022-10-21 14:19:19'),
(235, 'julie.pflug@yahoo.com', '89032636402', 'Everyone who needs money should try this Robot out.', 'Using this Robot is the best way to make you rich. Telegram - @Cryptaxbot', 'Pending', '2022-10-21 21:12:01', '2022-10-21 21:12:01'),
(236, 'irritateddino@gmail.com', '89037104491', 'The additional income for everyone.', 'The fastest way to make you wallet thick is here. Telegram - @Cryptaxbot', 'Pending', '2022-10-22 18:20:50', '2022-10-22 18:20:50'),
(237, 'cpt_jack_stone@yahoo.com', '89031849859', 'Start making thousands of dollars every week.', 'Additional income is now available for anyone all around the world. Telegram - @Cryptaxbot', 'Pending', '2022-10-23 01:17:26', '2022-10-23 01:17:26'),
(238, 'mike07006@yahoo.com', '89030617532', 'Attention! Here you can earn money online!', 'Launch the financial Robot and do your business. Telegram - @Cryptaxbot', 'Pending', '2022-10-23 08:10:03', '2022-10-23 08:10:03'),
(239, 'laura@ticlaim.com', '89034765583', 'Invest $1 today to make $1000 tomorrow.', 'The online income is your key to success. Telegram - @Cryptaxbot', 'Pending', '2022-10-23 15:02:54', '2022-10-23 15:02:54'),
(240, 'marieve@pinkinbox.org', '89031264338', 'Looking forward for income? Get it online.', 'Just one click can turn you dollar into $1000. Telegram - @Cryptaxbot', 'Pending', '2022-10-23 22:17:58', '2022-10-23 22:17:58'),
(241, 'mctaylor@iinet.net.au', '83338629527', 'Forbes: GET RICH QUICKLY AND EFFECTIVELY...', 'EARN OVER $24,000 A DAY ONLINE WITH... https://telegra.ph/How-does-a-simple-student-make-from-15000-per-day-10-20?id-83936972', 'Pending', '2022-10-24 02:21:07', '2022-10-24 02:21:07'),
(242, 'ufomehwl@yahoo.com', '89035038171', 'Earn additional money without efforts.', 'Even a child knows how to make $100 today. Telegram - @Cryptaxbot', 'Pending', '2022-10-24 05:12:18', '2022-10-24 05:12:18'),
(243, 'joruju.arakune@gmail.com', '89038213822', 'Financial independence is what everyone needs.', 'Your computer can bring you additional income if you use this Robot. Telegram - @Cryptaxbot', 'Pending', '2022-10-24 12:26:41', '2022-10-24 12:26:41'),
(244, 'krista127@comcast.net', '89032793696', 'Wow! This Robot is a great start for an online career.', 'Make yourself rich in future using this financial robot. Telegram - @Cryptaxbot', 'Pending', '2022-10-24 19:23:57', '2022-10-24 19:23:57'),
(245, 'ajehnzfranes@gotmail.com', '89038308355', 'Buy everything you want earning money online.', 'Even a child knows how to make $100 today with the help of this robot. Telegram - @Cryptaxbot', 'Pending', '2022-10-25 05:08:15', '2022-10-25 05:08:15'),
(246, 'audrapinkley6033@mailcatch.com', '89030830627', 'Check out the newest way to make a fantastic profit.', 'Your computer can bring you additional income if you use this Robot. Telegram - @Cryptaxbot', 'Pending', '2022-10-26 01:59:27', '2022-10-26 01:59:27'),
(247, 'hljungclaus@.com', '89035143887', 'Make thousands of bucks. Pay nothing.', 'No need to work anymore. Just launch the robot. Telegram - @Cryptaxbot', 'Pending', '2022-10-26 09:16:50', '2022-10-26 09:16:50'),
(248, 'ruuth.xx3@hotmail.com', '89039371172', 'The additional income for everyone.', 'Trust your dollar to the Robot and see how it grows to $100. Telegram - @Cryptaxbot', 'Pending', '2022-10-26 17:53:12', '2022-10-26 17:53:12'),
(249, 'wispywoods@yahoo.com', '89030894773', 'Make your money work for you all day long.', 'Make thousands of bucks. Financial robot will help you to do it! Telegram - @Cryptaxbot', 'Pending', '2022-10-27 07:52:24', '2022-10-27 07:52:24'),
(250, 'jazlynnjohnson1@gmail.com', '89034252358', 'Trust the financial Bot to become rich.', 'Make money online, staying at home this cold winter. Telegram - @Cryptaxbot', 'Pending', '2022-10-27 14:52:52', '2022-10-27 14:52:52'),
(251, 'mandeee114@yahoo.com', '89031327409', 'Even a child knows how to make money. Do you?', 'Still not a millionaire? Fix it now! Telegram - @Cryptaxbot', 'Pending', '2022-10-27 21:49:24', '2022-10-27 21:49:24'),
(252, 'blatnik.slavko@amis.net', '89032647856', 'Make thousands of bucks. Pay nothing.', 'Robot is the best solution for everyone who wants to earn. Telegram - @Cryptaxbot', 'Pending', '2022-10-28 04:47:29', '2022-10-28 04:47:29'),
(253, 'tony.cordingley12@virgin.net', '89033438304', 'Even a child knows how to make $100 today.', 'One click of the robot can bring you thousands of bucks. Telegram - @Cryptaxbot', 'Pending', '2022-10-28 11:42:57', '2022-10-28 11:42:57'),
(254, 'leslieadler@gmail.com', '89032918573', 'Just one click can turn you dollar into $1000.', 'We know how to increase your financial stability. Telegram - @Cryptaxbot', 'Pending', '2022-10-28 19:06:37', '2022-10-28 19:06:37'),
(255, 'Ryan.hollencamp@gmail.com', '89036123917', 'Watch your money grow while you invest with the Robot.', 'The best way for everyone who rushes for financial independence. Telegram - @Cryptaxbot', 'Pending', '2022-10-29 17:43:30', '2022-10-29 17:43:30'),
(256, 'mecheetahgirl@yahoo.com', '89035141127', 'Looking forward for income? Get it online.', 'See how Robot makes $1000 from $1 of investment. Telegram - @Cryptaxbot', 'Pending', '2022-10-30 01:01:32', '2022-10-30 01:01:32'),
(257, 'suryacomputerlko@gmail.com', '89038890330', 'Financial Robot is #1 investment tool ever. Launch it!', 'Make your laptop a financial instrument with this program. Telegram - @Cryptaxbot', 'Pending', '2022-10-30 22:49:07', '2022-10-30 22:49:07'),
(258, 'Hollymc33@yahoo.com', '89038352305', 'Make your computer to be you earning instrument.', 'The additional income for everyone. Telegram - @Cryptaxbot', 'Pending', '2022-10-31 05:54:33', '2022-10-31 05:54:33'),
(259, 'as.wi.t.h.u.8.3.14@gmail.com', '89038837055', 'One dollar is nothing, but it can grow into $100 here.', 'It is the best time to launch the Robot to get more money. Telegram - @Cryptaxbot', 'Pending', '2022-10-31 13:37:24', '2022-10-31 13:37:24'),
(260, 'siti_ajaya@rocketmail.com', '89032925166', 'We know how to become rich and do you?', 'Buy everything you want earning money online. Telegram - @Cryptaxbot', 'Pending', '2022-11-01 10:35:03', '2022-11-01 10:35:03'),
(261, 'bohemianprophet@gmail.com', '89037904019', 'The financial Robot is your # 1 expert of making money.', 'Make yourself rich in future using this financial robot. Telegram - @Cryptaxbot', 'Pending', '2022-11-02 01:18:07', '2022-11-02 01:18:07'),
(262, 'frontier@iquest.net', '83837562158', 'The Sun: $1000 AMAZON GIFT CARD NEW YEAR\'S GIVEAWAY', 'Free iPhone 13 Pro Max Giveaway Win a Free Apple iPhone 13 http://flip-scan-play-and-win-iphone.bandaiahganji.com/news-2594', 'Pending', '2022-11-02 07:23:39', '2022-11-02 07:23:39'),
(263, 'dkstiffler1@aol.com', '89030981434', 'Try out the best financial robot in the Internet.', 'Financial independence is what this robot guarantees. Telegram - @Cryptaxbot', 'Pending', '2022-11-02 15:30:34', '2022-11-02 15:30:34'),
(264, 'daw.nmqpq@gmail.com', '89039885436', 'Let the Robot bring you money while you rest.', 'Your money work even when you sleep. Telegram - @Cryptaxbot', 'Pending', '2022-11-03 05:45:24', '2022-11-03 05:45:24'),
(265, 'zule454@cs.com', '89036578543', 'Check out the automatic Bot, which works for you 24/7.', 'The huge income without investments is available, now! Telegram - @Cryptaxbot', 'Pending', '2022-11-03 12:46:49', '2022-11-03 12:46:49'),
(266, 'mauchinachie91@gmail.com', '89035717573', 'No worries if you are fired. Work online.', 'The financial Robot is your # 1 expert of making money. Telegram - @Cryptaxbot', 'Pending', '2022-11-04 02:57:46', '2022-11-04 02:57:46'),
(267, 'jant12236@gmail.com', '89031538309', 'One dollar is nothing, but it can grow into $100 here.', 'Try out the best financial robot in the Internet. Telegram - @Cryptaxbot', 'Pending', '2022-11-04 17:54:13', '2022-11-04 17:54:13'),
(268, 'dsautter@verizon.net', '89032306247', 'The additional income for everyone.', 'Earning money in the Internet is easy if you use Robot. Telegram - @Cryptaxbot', 'Pending', '2022-11-05 00:57:14', '2022-11-05 00:57:14'),
(269, 'brownam@gmail.com', '89035965655', 'Invest $1 today to make $1000 tomorrow.', 'Earn additional money without efforts. Telegram - @Cryptaxbot', 'Pending', '2022-11-05 15:00:40', '2022-11-05 15:00:40'),
(270, 'pinkpowerpuffprincess@gmail.com', '89030398778', 'Try out the best financial robot in the Internet.', 'This robot will help you to make hundreds of dollars each day. Telegram - @Cryptaxbot', 'Pending', '2022-11-05 22:02:50', '2022-11-05 22:02:50');

-- --------------------------------------------------------

--
-- Table structure for table `dailysaleRestaurant`
--

CREATE TABLE `dailysaleRestaurant` (
  `id` int(11) NOT NULL,
  `email` varchar(55) NOT NULL,
  `cname` varchar(55) DEFAULT NULL,
  `cphone` varchar(55) DEFAULT NULL,
  `pname` varchar(100) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `tablename` varchar(55) DEFAULT NULL,
  `waitername` varchar(55) DEFAULT NULL,
  `date` date NOT NULL,
  `orders` float NOT NULL,
  `vat` float DEFAULT 0,
  `amount` float DEFAULT 0,
  `tamount` varchar(11) DEFAULT '0',
  `status` varchar(30) DEFAULT 'Pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dailysalestable`
--

CREATE TABLE `dailysalestable` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `date` date DEFAULT NULL,
  `deliverymanname` varchar(55) NOT NULL,
  `pname` varchar(50) NOT NULL,
  `packs` int(11) DEFAULT NULL,
  `pricelp` float DEFAULT NULL,
  `pricetp` float DEFAULT NULL,
  `sellingprice` float DEFAULT NULL,
  `unitprice` float NOT NULL,
  `orders` float NOT NULL,
  `unit` float DEFAULT 0,
  `cases` int(11) DEFAULT 0,
  `pieces` int(11) DEFAULT 0,
  `totalpcs` int(11) DEFAULT NULL,
  `salesv` float NOT NULL,
  `returnp` int(11) DEFAULT 0,
  `returnc` int(11) DEFAULT 0,
  `soldc` int(11) NOT NULL,
  `soldp` int(11) NOT NULL,
  `tpieces` int(11) NOT NULL,
  `valuelp` float NOT NULL,
  `valuetp` float NOT NULL,
  `due` float NOT NULL,
  `damagepcs` int(11) DEFAULT 0,
  `damageamount` float NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dailysalestable`
--

INSERT INTO `dailysalestable` (`id`, `email`, `date`, `deliverymanname`, `pname`, `packs`, `pricelp`, `pricetp`, `sellingprice`, `unitprice`, `orders`, `unit`, `cases`, `pieces`, `totalpcs`, `salesv`, `returnp`, `returnc`, `soldc`, `soldp`, `tpieces`, `valuelp`, `valuetp`, `due`, `damagepcs`, `damageamount`, `created_at`, `updated_at`) VALUES
(1, 'mdnayem.cse21@gmail.com', '2022-05-22', 'Jahangir', 'Pepsi 250 ml', 30, 388, 403, 403, 13.4333, 50, 0, NULL, NULL, 0, 0, 0, 2, 48, 0, 1440, 19344, 19344, 720, 0, 0, '2022-05-22 14:08:31', '2022-05-22 14:08:31'),
(2, 'mdnayem.cse21@gmail.com', '2022-05-22', 'Yeasin', 'Pepsi 250 ml', 30, 388, 403, 403, 13.4333, 2, 0, NULL, NULL, 0, 0, 0, 0, 2, 0, 60, 806, 806, 30, 0, 0, '2022-05-22 14:09:19', '2022-05-22 14:09:19'),
(3, 'mdnayem.cse21@gmail.com', '2022-05-22', 'Hridoy', 'Pepsi 250 ml', 30, 388, 403, 403, 13.4333, 8, 0, NULL, NULL, 0, 0, 0, 3, 5, 0, 150, 2015, 2015, 75, 0, 0, '2022-05-22 14:11:18', '2022-05-22 14:11:18'),
(4, 'mdnayem.cse21@gmail.com', '2022-05-22', 'Sajid', 'Pepsi 250 ml', 30, 388, 403, 403, 13.4333, 35, 0, NULL, NULL, 0, 0, 0, 5, 30, 0, 900, 12090, 12090, 450, 0, 0, '2022-05-22 14:12:05', '2022-05-22 14:12:05'),
(5, 'mdnayem.cse21@gmail.com', '2022-05-22', 'Jahangir', '7 up 250 ml', 34, 404, 430, 430, 12.6471, 55, 0, NULL, NULL, 0, 0, 0, 5, 50, 0, 1700, 21500, 21500, 1300, 0, 0, '2022-05-22 14:21:30', '2022-05-22 14:21:30'),
(6, 'mdnayem.cse21@gmail.com', '2022-05-22', 'Hridoy', 'M. Dew GRB', 24, 380, 0, 417, 17.375, 25, 0, NULL, NULL, 0, 0, 0, 5, 20, 0, 480, 8340, 0, -7600, 0, 0, '2022-05-22 14:23:06', '2022-05-22 14:23:06'),
(7, 'mdnayem.cse21@gmail.com', '2022-05-22', 'Jahangir', 'Pepsi 250 ml', 30, 388, 403, 403, 13.4333, 10, 5, NULL, NULL, 5, 67.1667, 0, 0, 10, 5, 305, 4097.17, 4097.17, 152.5, 0, 0, '2022-05-22 14:47:02', '2022-05-22 14:47:02'),
(8, 'mdnayem.cse21@gmail.com', '2022-05-23', 'Yeasin', 'Pepsi 250 ml', 30, 388, 403, 403, 13.4333, 5, 0, NULL, NULL, 0, 0, 0, 0, 5, 0, 150, 2015, 2015, 75, 0, 0, '2022-05-23 08:41:58', '2022-05-23 08:41:58');

-- --------------------------------------------------------

--
-- Table structure for table `damageproduct`
--

CREATE TABLE `damageproduct` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `productname` varchar(50) NOT NULL,
  `deliverymanname` varchar(50) NOT NULL,
  `totalproduct` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `damageproduct`
--

INSERT INTO `damageproduct` (`id`, `email`, `date`, `productname`, `deliverymanname`, `totalproduct`, `created_at`, `updated_at`) VALUES
(1, 'mdnayem.cse21@gmail.com', '2022-01-15', 'Mountain Dew 250 ml', 'Shakib-Tamim', 400, '2022-01-15 02:49:56', '2022-01-15 02:49:56'),
(2, 'mdnayem.cse21@gmail.com', '2022-01-15', 'Pepsi 250 ml', 'Mushfiq-Mahmudullah', 700, '2022-01-15 02:50:15', '2022-01-15 02:50:15'),
(3, 'mdnayem.cse21@gmail.com', '2022-03-06', 'Soyabin Oil', 'Afsara Adiba', 1, '2022-03-06 16:36:58', '2022-03-06 16:36:58'),
(4, 'mdnayem.cse21@gmail.com', '2022-03-07', 'Mountain Dew', 'Afsara Adiba', 2, '2022-03-07 12:08:51', '2022-03-07 12:08:51'),
(5, 'mdnayem.cse21@gmail.com', '2022-03-07', 'Ponds Cream', 'Afsara Adiba', 1, '2022-03-07 14:14:38', '2022-03-07 14:14:38'),
(6, 'mdnayem.cse21@gmail.com', '2022-04-19', 'Pepsi 250 ml', 'jahangir', 180, '2022-04-19 21:48:07', '2022-04-19 21:48:07');

-- --------------------------------------------------------

--
-- Table structure for table `deliveryman`
--

CREATE TABLE `deliveryman` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `phone` varchar(50) NOT NULL,
  `description` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `deliveryman`
--

INSERT INTO `deliveryman` (`id`, `email`, `name`, `phone`, `description`, `created_at`, `updated_at`) VALUES
(4, 'mdnayem.cse21@gmail.com', 'jahangir', '1111', 'aaaa', '2022-04-03 09:24:28', '2022-04-03 09:24:28'),
(5, 'mdnayem.cse21@gmail.com', 'yeasin', '2222', 'bbbb', '2022-04-03 09:24:42', '2022-04-03 09:24:42'),
(6, 'mdnayem.cse21@gmail.com', 'hridoy', '3333', 'cccc', '2022-04-03 09:24:56', '2022-04-03 09:24:56'),
(7, 'mdnayem.cse21@gmail.com', 'sajid', '4444', 'dddd', '2022-04-03 09:25:13', '2022-04-03 09:25:13'),
(8, 'mdnayem.cse21@gmail.com', 'Myself', '+8801999791578', 'Own', '2022-05-11 10:17:33', '2022-05-11 10:17:33');

-- --------------------------------------------------------

--
-- Table structure for table `duetable`
--

CREATE TABLE `duetable` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `date` date DEFAULT current_timestamp(),
  `deliverymanname` varchar(50) DEFAULT 'Myself',
  `shopname` varchar(50) NOT NULL,
  `amount` float NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `duetable`
--

INSERT INTO `duetable` (`id`, `email`, `date`, `deliverymanname`, `shopname`, `amount`, `created_at`, `updated_at`) VALUES
(5, 'mdnayem.cse21@gmail.com', '2022-04-19', 'jahangir', 'Alvi Store', 7000, '2022-04-17 11:30:25', '2022-04-19 09:26:36'),
(6, 'mdnayem.cse21@gmail.com', '2022-04-19', 'jahangir', 'Alvi Store', 3000, '2022-04-18 14:48:52', '2022-04-19 09:26:47'),
(7, 'mdnayem.cse21@gmail.com', '2022-04-19', 'yeasin', 'Kazi Enterprise', 2000, '2022-04-19 12:57:54', '2022-04-19 12:57:54'),
(8, 'mdnayem.cse21@gmail.com', '2022-05-10', 'hridoy', 'kazi store', 7000, '2022-05-10 15:21:27', '2022-05-17 09:27:13'),
(9, 'mdnayem.cse21@gmail.com', '2022-05-11', 'Myself', 'Alvi Store', 7000, '2022-05-11 09:25:20', '2022-05-11 09:25:38'),
(11, 'mdnayem.cse21@gmail.com', '2022-05-11', 'Myself', 'Kazi Enterprise', 8000, '2022-05-11 09:31:21', '2022-05-11 09:31:21'),
(14, 'mdnayem.cse21@gmail.com', '2022-05-11', 'jahangir', 'Alvi Store', 600, '2022-05-11 12:22:36', '2022-05-11 12:22:36'),
(15, 'mdnayem.cse21@gmail.com', '2022-05-01', 'jahangir', 'Kazi Enterprise', 800, '2022-05-11 12:23:22', '2022-05-11 12:23:22'),
(16, 'mdnayem.cse21@gmail.com', '2022-05-12', 'sajid', 'Alvi Store', 3000, '2022-05-12 08:32:01', '2022-05-12 08:32:01'),
(17, 'mdnayem.cse21@gmail.com', '2022-05-16', 'jahangir', 'kazi store', 7000, '2022-05-16 09:24:21', '2022-05-16 09:24:21');

-- --------------------------------------------------------

--
-- Table structure for table `expense`
--

CREATE TABLE `expense` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `expname` varchar(50) NOT NULL,
  `amount` float NOT NULL,
  `deliverymanname` varchar(50) NOT NULL DEFAULT 'No Person',
  `description` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `expense`
--

INSERT INTO `expense` (`id`, `email`, `date`, `expname`, `amount`, `deliverymanname`, `description`, `created_at`, `updated_at`) VALUES
(1, 'mdnayem.cse21@gmail.com', '2022-04-19', 'Daily Allowance(DA)', 100, 'jahangir', 'nai', '2022-04-17 11:08:52', '2022-04-19 09:27:32'),
(2, 'mdnayem.cse21@gmail.com', '2022-04-19', 'AUTO VARA', 300, 'jahangir', 'nai', '2022-04-18 15:23:37', '2022-04-19 09:27:44'),
(3, 'mdnayem.cse21@gmail.com', '2022-04-19', 'Daily Allowance(DA)', 500, 'yeasin', 'nai', '2022-04-19 12:58:25', '2022-04-19 12:58:25'),
(4, 'mdnayem.cse21@gmail.com', '2022-04-19', 'Daily Allowance(DA)', 70, 'sajid', 'nai', '2022-04-19 21:51:40', '2022-05-17 12:20:19'),
(5, 'mdnayem.cse21@gmail.com', '2022-04-19', 'AUTO VARA', 350, 'yeasin', 'nai', '2022-04-19 21:52:39', '2022-05-17 12:17:21'),
(6, 'mdnayem.cse21@gmail.com', '2022-05-10', 'AUTO VARA', 350, 'hridoy', 'nai', '2022-05-10 15:21:56', '2022-05-10 15:21:56'),
(7, 'mdnayem.cse21@gmail.com', '2022-05-10', 'Daily Allowance(DA)', 500, 'hridoy', 'nai', '2022-05-10 15:22:13', '2022-05-10 15:22:13'),
(9, 'mdnayem.cse21@gmail.com', '2022-05-11', 'SPECIAL COST', 2000, 'Myself', 'nai', '2022-05-11 09:56:35', '2022-05-11 09:56:35'),
(10, 'mdnayem.cse21@gmail.com', '2022-05-11', 'Daily Allowance(DA)', 700, 'yeasin', 'nai', '2022-05-11 12:47:11', '2022-05-11 12:47:11'),
(11, 'mdnayem.cse21@gmail.com', '2022-05-15', 'AUTO VARA', 700, 'yeasin', 'nai', '2022-05-15 13:59:46', '2022-05-15 13:59:46'),
(12, 'mdnayem.cse21@gmail.com', '2022-05-16', 'Daily Allowance(DA)', 500, 'jahangir', 'nai', '2022-05-16 09:24:40', '2022-05-16 09:24:40');

-- --------------------------------------------------------

--
-- Table structure for table `expensename`
--

CREATE TABLE `expensename` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `exname` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `expensename`
--

INSERT INTO `expensename` (`id`, `email`, `exname`, `created_at`, `updated_at`) VALUES
(1, 'mdnayem.cse21@gmail.com', 'Daily Allowance(DA)', '2022-04-11 13:33:26', '2022-04-11 13:33:26'),
(2, 'mdnayem.cse21@gmail.com', 'AUTO VARA', '2022-04-11 13:33:34', '2022-04-11 13:33:34'),
(3, 'mdnayem.cse21@gmail.com', 'SPECIAL COST', '2022-04-11 13:33:45', '2022-04-11 13:33:45');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `id` int(11) NOT NULL,
  `fnumber` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `name` varchar(150) NOT NULL,
  `description` varchar(1500) DEFAULT 'Product description',
  `category` varchar(55) DEFAULT NULL,
  `makingcost` float DEFAULT NULL,
  `sellingprice` float NOT NULL,
  `estimatedprofit` float NOT NULL,
  `availability` varchar(55) DEFAULT 'Yes',
  `image` varchar(255) DEFAULT 'Product Image',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`id`, `fnumber`, `email`, `name`, `description`, `category`, `makingcost`, `sellingprice`, `estimatedprofit`, `availability`, `image`, `created_at`, `updated_at`) VALUES
(292, 2, 'nayemmd.cse21@gmail.com', 'FRIED WONTON(8 PCS)', 'FRIED WONTON(8 PCS)', 'Chinese Cuisine', 100, 240, 140, 'Yes', 'images/images (5).jfif', '2022-08-28 12:21:47', '2022-08-28 12:21:47'),
(293, 1, 'nayemmd.cse21@gmail.com', 'SPECIAL FRIED WONTON(8 PCS)', 'SPECIAL FRIED WONTON(8 PCS)', 'Chinese Cuisine', 120, 290, 170, 'Yes', 'images/images (4).jfif', '2022-08-28 13:06:26', '2022-08-28 13:06:26'),
(294, 3, 'nayemmd.cse21@gmail.com', 'FISH FINGER(6PCS)', 'FISH FINGER(6PCS)', 'Chinese Cuisine', 180, 300, 120, 'Yes', 'images/download - 2022-08-12T150422.646.jfif', '2022-08-28 13:16:20', '2022-08-28 13:16:20'),
(295, 4, 'nayemmd.cse21@gmail.com', 'SPECIAL FRIED PRAWN(6 PCS)', 'SPECIAL FRIED PRAWN(6 PCS)', 'Chinese Cuisine', 190, 280, 90, 'Yes', 'images/download (95).jfif', '2022-08-28 13:18:44', '2022-08-28 13:18:44'),
(296, 5, 'nayemmd.cse21@gmail.com', 'FISH CUTLET', 'FISH CUTLET', 'Thai Cuisine', 180, 300, 120, 'Yes', 'images/download (57).jfif', '2022-08-28 13:20:12', '2022-08-28 13:20:12'),
(297, 6, 'nayemmd.cse21@gmail.com', 'FRENCH FRY', 'FRENCH FRY', 'Thai Cuisine', 80, 150, 70, 'Yes', 'images/crispy-spicy-chicken-wings-small-feature-image.webp', '2022-08-28 13:22:28', '2022-10-30 11:01:07'),
(298, 7, 'nayemmd.cse21@gmail.com', 'THAI FRIED CHICKEN (8 PCS)', 'THAI FRIED CHICKEN (8 PCS)', 'Chinese Cuisine', 250, 450, 200, 'Yes', 'images/download (69).jfif', '2022-08-28 13:25:19', '2022-08-28 13:25:19'),
(299, 8, 'nayemmd.cse21@gmail.com', 'CRISPY WINGS(6PCS)', 'CRISPY WINGS(6PCS)', 'Thai Cuisine', 200, 300, 100, 'Yes', 'images/crispy-spicy-chicken-wings-small-feature-image.webp', '2022-08-28 13:27:57', '2022-08-28 13:27:57'),
(300, 9, 'nayemmd.cse21@gmail.com', 'JAFRAN SPECIAL THAI SOUP', 'JAFRAN SPECIAL THAI SOUP', 'Thai Cuisine', 290, 490, 200, 'Yes', 'images/download - 2022-08-28T152755.118.jfif', '2022-08-28 13:38:05', '2022-08-28 13:38:05'),
(301, 10, 'nayemmd.cse21@gmail.com', 'THAI SOUP (THICK)', 'THAI SOUP (THICK)', 'Thai Cuisine', 230, 450, 220, 'Yes', 'images/download - 2022-08-28T152755.118.jfif', '2022-08-28 13:39:21', '2022-08-28 14:23:16'),
(302, 11, 'nayemmd.cse21@gmail.com', 'SEA FOOD SOUP', 'SEA FOOD SOUP', 'Thai Cuisine', 270, 570, 300, 'Yes', 'images/download - 2022-08-28T152755.118.jfif', '2022-08-28 13:40:22', '2022-08-28 14:25:21'),
(303, 12, 'nayemmd.cse21@gmail.com', 'THAI CLEAR SOUP', 'THAI CLEAR SOUP', 'Thai Cuisine', 150, 520, 370, 'Yes', 'images/download - 2022-08-28T152755.118.jfif', '2022-08-28 13:41:34', '2022-08-28 14:30:40'),
(304, 13, 'nayemmd.cse21@gmail.com', 'CORN SOUP', 'CORN SOUP', 'Thai Cuisine', 190, 290, 100, 'Yes', 'images/download - 2022-08-28T152755.118.jfif', '2022-08-28 13:42:42', '2022-08-28 13:42:42'),
(305, 14, 'nayemmd.cse21@gmail.com', 'SPECIAL CORN SOUP', 'SPECIAL CORN SOUP', 'Thai Cuisine', 220, 320, 100, 'Yes', 'images/download - 2022-08-28T152755.118.jfif', '2022-08-28 13:43:58', '2022-08-28 13:43:58'),
(306, 15, 'nayemmd.cse21@gmail.com', 'HOT & SOUR SOUP', 'HOT & SOUR SOUP', 'Thai Cuisine', 190, 290, 100, 'Yes', 'images/download - 2022-08-28T152755.118.jfif', '2022-08-28 13:45:04', '2022-08-28 13:45:04'),
(307, 16, 'nayemmd.cse21@gmail.com', 'VEGETABLE SOUP', 'VEGETABLE SOUP', 'Thai Cuisine', 180, 280, 100, 'Yes', 'images/download - 2022-08-28T152755.118.jfif', '2022-08-28 13:45:59', '2022-08-28 13:45:59'),
(308, 17, 'nayemmd.cse21@gmail.com', 'JAFRAN SPECIAL CHOWMEIN', 'JAFRAN SPECIAL CHOWMEIN', 'Chinese Cuisine', 260, 380, 120, 'Yes', 'images/download - 2022-09-25T155159.974.jfif', '2022-08-28 13:48:20', '2022-09-25 14:02:13'),
(309, 18, 'nayemmd.cse21@gmail.com', 'CHICKEN CHOWMEIN', 'CHICKEN CHOWMEIN', 'Chinese Cuisine', 200, 280, 80, 'Yes', 'images/download - 2022-09-25T155159.974.jfif', '2022-08-28 13:50:53', '2022-09-25 14:04:14'),
(310, 19, 'nayemmd.cse21@gmail.com', 'PRAWN CHOWMEIN', 'PRAWN CHOWMEIN', 'Chinese Cuisine', 100, 300, 200, 'Yes', 'images/download - 2022-09-25T155159.974.jfif', '2022-08-28 13:52:30', '2022-09-25 14:05:58'),
(311, 20, 'nayemmd.cse21@gmail.com', 'VEGETABLE CHOWMEIN', 'VEGETABLE CHOWMEIN', 'Chinese Cuisine', 100, 250, 150, 'Yes', 'images/download - 2022-09-25T155159.974.jfif', '2022-08-28 13:53:46', '2022-09-25 14:08:31'),
(312, 21, 'nayemmd.cse21@gmail.com', 'SPECIAL FRIED RICE (MIXED)', 'SPECIAL FRIED RICE (MIXED)', 'Chinese Cuisine', 200, 480, 280, 'Yes', 'images/download - 2022-09-03T194437.917.jfif', '2022-08-28 14:00:02', '2022-09-25 14:14:35'),
(313, 22, 'nayemmd.cse21@gmail.com', 'CHICKEN FRIED RICE', 'CHICKEN FRIED RICE', 'Chinese Cuisine', 360, 360, 0, 'Yes', 'images/download - 2022-09-03T194437.917.jfif', '2022-08-28 14:03:16', '2022-09-25 14:16:37'),
(314, 23, 'nayemmd.cse21@gmail.com', 'BEEF FRIED RICE', 'BEEF FRIED RICE', 'Chinese Cuisine', 380, 380, 0, 'Yes', 'images/download - 2022-09-03T194437.917.jfif', '2022-08-28 14:07:19', '2022-09-25 14:18:36'),
(450, 24, 'nayemmd.cse21@gmail.com', 'EGG FRIED RICE', 'EGG FRIED RICE', 'Thai Cuisine', 220, 320, 100, 'Yes', 'images/download - 2022-09-25T203432.429.jfif', '2022-09-26 14:21:44', '2022-09-26 14:21:44'),
(451, 25, 'nayemmd.cse21@gmail.com', 'JAFRAN SPECIAL SZECHUAN SALAD', 'JAFRAN SPECIAL SZECHUAN SALAD', 'Thai Cuisine', 400, 560, 160, 'Yes', 'images/download - 2022-09-25T203432.429.jfif', '2022-09-26 14:22:28', '2022-09-26 14:22:28'),
(452, 26, 'nayemmd.cse21@gmail.com', 'CASHEW NUT SALAD (CHICKEN/BEEF/PRAWN)', 'CASHEW NUT SALAD (CHICKEN/BEEF/PRAWN)', 'Thai Cuisine', 100, 500, 400, 'Yes', 'images/download - 2022-09-25T203432.429.jfif', '2022-09-26 14:23:12', '2022-09-26 14:23:12'),
(453, 27, 'nayemmd.cse21@gmail.com', 'GREEN SALAD', 'GREEN SALAD', 'Thai Cuisine', 100, 190, 90, 'Yes', 'images/download - 2022-09-25T203432.429.jfif', '2022-09-26 14:23:54', '2022-09-26 14:23:54'),
(454, 28, 'nayemmd.cse21@gmail.com', 'CHICKEN SIZZILING', 'CHICKEN SIZZILING', 'Thai Cuisine', 280, 480, 200, 'Yes', 'images/download - 2022-09-25T203432.429.jfif', '2022-09-26 14:24:41', '2022-09-26 14:24:41'),
(455, 29, 'nayemmd.cse21@gmail.com', 'CHICKEN CHILLI ONION', 'CHICKEN CHILLI ONION', 'Thai Cuisine', 280, 380, 100, 'Yes', 'images/download - 2022-09-25T203432.429.jfif', '2022-09-26 14:25:21', '2022-09-26 14:25:21'),
(456, 30, 'nayemmd.cse21@gmail.com', 'CHICKEN JHAL FRY', 'CHICKEN JHAL FRY', 'Thai Cuisine', 250, 380, 130, 'Yes', 'images/download - 2022-09-25T203432.429.jfif', '2022-09-26 14:25:52', '2022-09-26 14:25:52'),
(457, 31, 'nayemmd.cse21@gmail.com', 'CHICKEN MASALA', 'CHICKEN MASALA', 'Thai Cuisine', 200, 280, 80, 'Yes', 'images/download - 2022-09-25T203432.429.jfif', '2022-09-26 14:26:30', '2022-09-26 14:26:30'),
(458, 32, 'nayemmd.cse21@gmail.com', 'CHICKEN DO-PIYAZA', 'CHICKEN DO-PIYAZA', 'Thai Cuisine', 280, 380, 100, 'Yes', 'images/download - 2022-09-25T203432.429.jfif', '2022-09-26 14:27:18', '2022-09-26 14:27:18'),
(459, 33, 'nayemmd.cse21@gmail.com', 'SWEET & SOUR CHICKEN', 'SWEET & SOUR CHICKEN', 'Thai Cuisine', 280, 480, 200, 'Yes', 'images/download - 2022-09-25T203432.429.jfif', '2022-09-26 14:28:00', '2022-09-26 14:28:00'),
(460, 34, 'nayemmd.cse21@gmail.com', 'BEEF SIZZLING', 'BEEF SIZZLING', 'Thai Cuisine', 400, 500, 100, 'Yes', 'images/download - 2022-09-25T203432.429.jfif', '2022-09-26 14:28:35', '2022-09-26 14:28:35'),
(461, 35, 'nayemmd.cse21@gmail.com', 'BEEF CHILLI ONION', 'BEEF CHILLI ONION', 'Thai Cuisine', 320, 420, 100, 'Yes', 'images/download - 2022-09-25T203432.429.jfif', '2022-09-26 14:29:43', '2022-09-26 14:29:43'),
(462, 36, 'nayemmd.cse21@gmail.com', 'SZECHUAN BEEF', 'SZECHUAN BEEF', 'Thai Cuisine', 300, 420, 120, 'Yes', 'images/download - 2022-09-25T203432.429.jfif', '2022-09-26 14:30:41', '2022-09-26 14:30:41'),
(463, 37, 'nayemmd.cse21@gmail.com', 'BEEF MASALA', 'BEEF MASALA', 'Thai Cuisine', 320, 420, 100, 'Yes', 'images/download - 2022-09-25T203432.429.jfif', '2022-09-26 14:31:26', '2022-09-26 14:31:26'),
(464, 38, 'nayemmd.cse21@gmail.com', 'BEEF CHILLI DRY', 'BEEF CHILLI DRY', 'Thai Cuisine', 350, 450, 100, 'Yes', 'images/download - 2022-09-25T203432.429.jfif', '2022-09-26 14:32:00', '2022-09-26 14:32:00'),
(465, 39, 'nayemmd.cse21@gmail.com', 'FISH SIZLING (PRAWN)', 'FISH SIZLING (PRAWN)', 'Thai Cuisine', 420, 520, 100, 'Yes', 'images/download - 2022-09-25T203432.429.jfif', '2022-09-26 14:33:21', '2022-09-26 14:33:21'),
(466, 40, 'nayemmd.cse21@gmail.com', 'SWEET & SOUR FISH', 'SWEET & SOUR FISH', 'Thai Cuisine', 250, 480, 230, 'Yes', 'images/download - 2022-09-25T203432.429.jfif', '2022-09-26 14:33:59', '2022-09-26 14:33:59'),
(467, 41, 'nayemmd.cse21@gmail.com', 'PRAWN MASALA', 'PRAWN MASALA', 'Thai Cuisine', 320, 450, 130, 'Yes', 'images/download - 2022-09-25T203432.429.jfif', '2022-09-26 14:34:43', '2022-09-26 14:34:43'),
(468, 42, 'nayemmd.cse21@gmail.com', 'FISH CHILLI DRY', 'FISH CHILLI DRY', 'Thai Cuisine', 350, 450, 100, 'Yes', 'images/download - 2022-09-25T203432.429.jfif', '2022-09-26 14:35:51', '2022-09-26 14:35:51'),
(469, 43, 'nayemmd.cse21@gmail.com', 'CHINESE VEGETABLE', 'CHINESE VEGETABLE', 'Thai Cuisine', 170, 270, 100, 'Yes', 'images/download - 2022-09-25T203432.429.jfif', '2022-09-26 14:36:48', '2022-09-26 14:36:48'),
(470, 44, 'nayemmd.cse21@gmail.com', 'CHICKEN CHINESE VEGETABLE', 'CHICKEN CHINESE VEGETABLE', 'Thai Cuisine', 250, 320, 70, 'Yes', 'images/download - 2022-09-25T203432.429.jfif', '2022-09-26 14:37:40', '2022-09-26 14:37:40'),
(471, 45, 'nayemmd.cse21@gmail.com', 'VEGETABLE DOPIAZA', 'VEGETABLE DOPIAZA', 'Thai Cuisine', 150, 250, 100, 'Yes', 'images/download - 2022-09-25T203432.429.jfif', '2022-09-26 14:38:51', '2022-09-26 14:38:51'),
(472, 46, 'nayemmd.cse21@gmail.com', 'THAI VEGETABLE', 'THAI VEGETABLE', 'Thai Cuisine', 180, 280, 100, 'Yes', 'images/download - 2022-09-25T203432.429.jfif', '2022-09-26 14:39:40', '2022-09-26 14:39:40'),
(473, 47, 'nayemmd.cse21@gmail.com', 'CHOLA BATORA (REGULAR)', 'CHOLA BATORA (REGULAR)', 'Indian', 70, 170, 100, 'Yes', 'images/download - 2022-09-25T203432.429.jfif', '2022-09-26 14:40:29', '2022-09-26 14:40:29'),
(474, 48, 'nayemmd.cse21@gmail.com', 'CHICKEN CHOLA BATORA', 'CHICKEN CHOLA BATORA', 'Indian', 120, 220, 100, 'Yes', 'images/download - 2022-09-25T203432.429.jfif', '2022-09-26 14:42:00', '2022-09-26 14:42:00'),
(475, 48, 'nayemmd.cse21@gmail.com', 'BEEF CHOLA BATORA', 'BEEF CHOLA BATORA', 'Indian', 120, 240, 120, 'Yes', 'images/download - 2022-09-25T203432.429.jfif', '2022-09-26 14:42:33', '2022-09-26 14:42:33'),
(476, 49, 'nayemmd.cse21@gmail.com', 'MASALA DOSA', 'MASALA DOSA', 'Indian', 100, 180, 80, 'Yes', 'images/download - 2022-09-25T203432.429.jfif', '2022-09-26 14:43:07', '2022-09-26 14:43:07'),
(477, 50, 'nayemmd.cse21@gmail.com', 'SPECIAL MASALA DOSA', 'SPECIAL MASALA DOSA', 'Indian', 200, 250, 50, 'Yes', 'images/download - 2022-09-25T203432.429.jfif', '2022-09-26 14:44:12', '2022-09-26 14:44:12'),
(478, 51, 'nayemmd.cse21@gmail.com', 'THALI', '(1 PCS PARATA,CHICKEN MASALA,CHATNY,VEGETABLE)', 'Indian', 180, 280, 100, 'Yes', 'images/download - 2022-09-25T203432.429.jfif', '2022-09-26 14:46:06', '2022-09-26 14:46:06'),
(479, 52, 'nayemmd.cse21@gmail.com', 'PLAIN NAAN/PARATA', 'PLAIN NAAN/PARATA', 'Indian', 30, 50, 20, 'Yes', 'images/download - 2022-09-25T203432.429.jfif', '2022-09-26 14:46:57', '2022-09-26 14:46:57'),
(480, 53, 'nayemmd.cse21@gmail.com', 'BUTTER NAAN', 'BUTTER NAAN', 'Indian', 40, 75, 35, 'Yes', 'images/download - 2022-09-25T203432.429.jfif', '2022-09-26 14:47:40', '2022-09-26 14:47:40'),
(481, 54, 'nayemmd.cse21@gmail.com', 'GARLIC NAAN', 'GARLIC NAAN', 'Indian', 40, 80, 40, 'Yes', 'images/download - 2022-09-25T203432.429.jfif', '2022-09-26 14:48:30', '2022-09-26 14:48:30'),
(482, 55, 'nayemmd.cse21@gmail.com', 'CHEESE NAAN', 'CHEESE NAAN', 'Indian', 45, 90, 45, 'Yes', 'images/download - 2022-09-25T203432.429.jfif', '2022-09-26 14:49:06', '2022-09-26 14:49:06'),
(483, 56, 'nayemmd.cse21@gmail.com', 'SPECIAL NAAN', 'SPECIAL NAAN', 'Indian', 50, 100, 50, 'Yes', 'images/download - 2022-09-25T203432.429.jfif', '2022-09-26 14:49:41', '2022-09-26 14:49:41'),
(484, 57, 'nayemmd.cse21@gmail.com', 'STEAM WHOLE KORAL WITH LEMON BUTTER SAUCE(400GM)', 'STEAM WHOLE KORAL WITH LEMON BUTTER SAUCE(400GM)', 'Indian', 500, 750, 250, 'Yes', 'images/download - 2022-09-25T203432.429.jfif', '2022-09-26 14:51:43', '2022-09-26 14:51:43'),
(485, 58, 'nayemmd.cse21@gmail.com', 'GRILLED POMPRET (MASH POTATO,SATED VEGETABLE)', 'GRILLED POMPRET(MASH POTATO,SATED VEGETABLE)', 'Indian', 450, 550, 100, 'Yes', 'images/download - 2022-09-25T203432.429.jfif', '2022-09-26 14:55:00', '2022-09-26 14:55:00'),
(486, 59, 'nayemmd.cse21@gmail.com', 'GRILLED/BBQ(KORAL/RED SNAPPER)WITH SATED VEG', 'GRILLED/BBQ(KORAL/RED SNAPPER)WITH SATED VEG', 'Indian', 500, 650, 150, 'Yes', 'images/download - 2022-09-25T203432.429.jfif', '2022-09-26 14:57:15', '2022-09-26 14:57:15'),
(487, 60, 'nayemmd.cse21@gmail.com', 'CHICKEN TIKKA KABAB (6PCS)', 'CHICKEN TIKKA KABAB (6PCS)', 'Indian', 180, 280, 100, 'Yes', 'images/download - 2022-09-25T203432.429.jfif', '2022-09-26 14:57:58', '2022-09-26 14:57:58'),
(488, 61, 'nayemmd.cse21@gmail.com', 'CHICKEN RESMI KABAB (6PCS)', 'CHICKEN RESMI KABAB (6PCS)', 'Indian', 180, 280, 100, 'Yes', 'images/download - 2022-09-25T203432.429.jfif', '2022-09-26 14:58:35', '2022-09-26 14:58:35'),
(489, 62, 'nayemmd.cse21@gmail.com', 'CHICKEN HARIALI KABAB(6PCS)', 'CHICKEN HARIALI KABAB(6PCS)', 'Indian', 200, 300, 100, 'Yes', 'images/download - 2022-09-25T203432.429.jfif', '2022-09-26 14:59:21', '2022-09-26 14:59:21'),
(490, 63, 'nayemmd.cse21@gmail.com', 'BEEF LATA KABAB', 'BEEF LATA KABAB', 'Indian', 250, 350, 100, 'Yes', 'images/download - 2022-09-25T203432.429.jfif', '2022-09-26 15:01:32', '2022-09-26 15:01:32'),
(491, 128, 'nayemmd.cse21@gmail.com', 'MINERAL WATER 500 ML', 'MINERAL WATER 500 ML', 'Beverage and Dessert', 10, 15, 5, 'Yes', 'images/download - 2022-09-25T203432.429.jfif', '2022-09-26 15:03:23', '2022-09-26 15:03:23'),
(492, 64, 'nayemmd.cse21@gmail.com', 'BEEF BEHARI BOTI KABAB (6PCS)', 'BEEF BEHARI BOTI KABAB (6PCS)', 'Indian', 280, 380, 100, 'Yes', 'images/download - 2022-09-25T203432.429.jfif', '2022-09-26 15:08:56', '2022-09-26 15:08:56'),
(493, 65, 'nayemmd.cse21@gmail.com', 'CHICKEN BIRYANI', 'CHICKEN BIRYANI', 'Indian', 120, 220, 100, 'Yes', 'images/download - 2022-09-25T203432.429.jfif', '2022-09-26 16:26:21', '2022-09-26 16:26:21'),
(494, 66, 'nayemmd.cse21@gmail.com', 'BEEF BIRYANI', 'BEEF BIRYANI', 'Indian', 120, 250, 130, 'Yes', 'images/download - 2022-09-25T203432.429.jfif', '2022-09-26 16:26:58', '2022-09-26 16:26:58'),
(495, 67, 'nayemmd.cse21@gmail.com', 'MUTTON BIRYANI', 'MUTTON BIRYANI', 'Indian', 180, 280, 100, 'Yes', 'images/download - 2022-09-25T203432.429.jfif', '2022-09-26 16:27:34', '2022-09-26 16:27:34'),
(496, 68, 'nayemmd.cse21@gmail.com', 'HYDERABADI BIRYANI (CHICKEN)', 'HYDERABADI BIRYANI (CHICKEN)', 'Indian', 200, 250, 50, 'Yes', 'images/download - 2022-09-25T203432.429.jfif', '2022-09-26 16:28:16', '2022-09-26 16:28:16'),
(497, 69, 'nayemmd.cse21@gmail.com', 'HYDERABADI BIRYANI (BEEF)', 'HYDERABADI BIRYANI (BEEF)', 'Indian', 180, 280, 100, 'Yes', 'images/download - 2022-09-25T203432.429.jfif', '2022-09-26 16:28:59', '2022-09-26 16:28:59'),
(498, 70, 'nayemmd.cse21@gmail.com', 'HYDERABADI BIRYANI (MUTTON)', 'HYDERABADI BIRYANI (MUTTON)', 'Indian', 200, 300, 100, 'Yes', 'images/download - 2022-09-25T203432.429.jfif', '2022-09-26 16:29:30', '2022-09-26 16:29:30'),
(499, 71, 'nayemmd.cse21@gmail.com', 'HANDI BIRYANI(CHICKEN)', 'HANDI BIRYANI(CHICKEN)', 'Indian', 140, 240, 100, 'Yes', 'images/download - 2022-09-25T203432.429.jfif', '2022-09-26 16:30:07', '2022-09-26 16:30:07'),
(500, 72, 'nayemmd.cse21@gmail.com', 'HANDI BIRYANY(BEEF)', 'HANDI BIRYANY(BEEF)', 'Indian', 160, 260, 100, 'Yes', 'images/download - 2022-09-25T203432.429.jfif', '2022-09-26 16:30:37', '2022-09-26 16:30:37'),
(501, 173, 'nayemmd.cse21@gmail.com', 'HANDI BIRYANI(MUTTON)', 'HANDI BIRYANI(MUTTON)', 'Indian', 190, 290, 100, 'Yes', 'images/download - 2022-09-25T203432.429.jfif', '2022-09-26 16:31:11', '2022-09-26 16:31:11'),
(502, 74, 'nayemmd.cse21@gmail.com', 'MOROG POLAO', 'MOROG POLAO', 'Indian', 120, 220, 100, 'Yes', 'images/download - 2022-09-25T203432.429.jfif', '2022-09-26 16:31:59', '2022-09-26 16:31:59'),
(503, 75, 'nayemmd.cse21@gmail.com', 'STEAM RICE', 'STEAM RICE', 'Indian', 60, 80, 20, 'Yes', 'images/download - 2022-09-25T203432.429.jfif', '2022-09-26 16:32:32', '2022-09-26 16:32:32'),
(504, 76, 'nayemmd.cse21@gmail.com', 'CHICKEN BUTTER MASALA', 'CHICKEN BUTTER MASALA', 'Indian', 300, 400, 100, 'Yes', 'images/download - 2022-09-25T203432.429.jfif', '2022-09-26 16:33:28', '2022-09-26 16:33:28'),
(505, 77, 'nayemmd.cse21@gmail.com', 'CHICKEN KARAY CURRY', 'CHICKEN KARAY CURRY', 'Indian', 280, 380, 100, 'Yes', 'images/download - 2022-09-25T203432.429.jfif', '2022-09-26 16:34:50', '2022-09-26 16:34:50'),
(506, 78, 'nayemmd.cse21@gmail.com', 'BEEF ACHARI', 'BEEF ACHARI', 'Indian', 320, 420, 100, 'Yes', 'images/download - 2022-09-25T203432.429.jfif', '2022-09-26 16:37:04', '2022-09-26 16:37:04'),
(507, 79, 'nayemmd.cse21@gmail.com', 'BEEF KARAY CURRY', 'BEEF KARAY CURRY', 'Indian', 330, 430, 100, 'Yes', 'images/download - 2022-09-25T203432.429.jfif', '2022-09-26 16:38:04', '2022-09-26 16:38:04'),
(508, 80, 'nayemmd.cse21@gmail.com', 'BEEF KALA BHUNA', 'BEEF KALA BHUNA', 'Indian', 350, 450, 100, 'Yes', 'images/download - 2022-09-25T203432.429.jfif', '2022-09-26 16:38:45', '2022-09-26 16:38:45'),
(509, 81, 'nayemmd.cse21@gmail.com', 'MUTTON BHUNA', 'MUTTON BHUNA', 'Indian', 500, 600, 100, 'Yes', 'images/download - 2022-09-25T203432.429.jfif', '2022-09-26 16:39:18', '2022-09-26 16:39:18'),
(510, 82, 'nayemmd.cse21@gmail.com', 'MUTTON ACHARI', 'MUTTON ACHARI', 'Indian', 400, 600, 200, 'Yes', 'images/download - 2022-09-25T203432.429.jfif', '2022-09-26 16:40:04', '2022-09-26 16:40:04'),
(511, 83, 'nayemmd.cse21@gmail.com', 'PRAWN MALAI CURRY (6PCS)', 'PRAWN MALAI CURRY (6PCS)', 'Indian', 450, 550, 100, 'Yes', 'images/download - 2022-09-25T203432.429.jfif', '2022-09-26 16:40:54', '2022-09-26 16:40:54'),
(512, 84, 'nayemmd.cse21@gmail.com', 'PRAWN ACHARI (6PCS)', 'PRAWN ACHARI (6PCS)', 'Indian', 460, 530, 70, 'Yes', 'images/download - 2022-09-25T203432.429.jfif', '2022-09-26 16:42:08', '2022-09-26 16:42:08'),
(513, 85, 'nayemmd.cse21@gmail.com', 'DAL BUTTER FRY', 'DAL BUTTER FRY', 'Indian', 150, 250, 100, 'Yes', 'images/download - 2022-09-25T203432.429.jfif', '2022-09-26 16:42:50', '2022-09-26 16:42:50'),
(514, 86, 'nayemmd.cse21@gmail.com', 'DAL MAKHANI', 'DAL MAKHANI', 'Indian', 150, 250, 100, 'Yes', 'images/download - 2022-09-25T203432.429.jfif', '2022-09-26 16:43:19', '2022-09-26 16:43:19'),
(515, 87, 'nayemmd.cse21@gmail.com', 'CRISPY CHICKEN BURGER', 'CRISPY CHICKEN BURGER', 'Fast Food', 100, 140, 40, 'Yes', 'images/download - 2022-09-25T203432.429.jfif', '2022-09-26 16:44:36', '2022-09-26 16:44:36'),
(516, 88, 'nayemmd.cse21@gmail.com', 'CHICKEN CHEESE BURGER', 'CHICKEN CHEESE BURGER', 'Fast Food', 100, 170, 70, 'Yes', 'images/download - 2022-09-25T203432.429.jfif', '2022-09-26 16:45:23', '2022-09-26 16:45:23'),
(517, 89, 'nayemmd.cse21@gmail.com', 'CHICKEN DOUBLE DECKER BURGER', 'CHICKEN DOUBLE DECKER BURGER', 'Fast Food', 100, 200, 100, 'Yes', 'images/download - 2022-09-25T203432.429.jfif', '2022-09-26 16:46:08', '2022-09-26 16:46:08'),
(518, 90, 'nayemmd.cse21@gmail.com', 'BEEF CHEESE BURGER', 'BEEF CHEESE BURGER', 'Fast Food', 100, 200, 100, 'Yes', 'images/download - 2022-09-25T203432.429.jfif', '2022-09-26 16:46:41', '2022-10-09 16:24:03'),
(519, 91, 'nayemmd.cse21@gmail.com', 'BEEF DOUBLE DECKER BURGER', 'BEEF DOUBLE DECKER BURGER', 'Fast Food', 150, 290, 140, 'Yes', 'images/download - 2022-09-25T155159.974.jfif', '2022-09-26 16:47:13', '2022-10-09 16:25:02'),
(520, 92, 'nayemmd.cse21@gmail.com', 'BBQ CHICKEN  PIZZA (SMALL)', 'BBQ CHICKEN  PIZZA (SMALL)', 'Fast Food', 200, 300, 100, 'Yes', 'images/download - 2022-09-25T203432.429.jfif', '2022-09-26 16:47:52', '2022-09-26 16:47:52'),
(521, 93, 'nayemmd.cse21@gmail.com', 'BBQ CHICKEN PIZZA MEDIUM', 'BBQ CHICKEN PIZZA MEDIUM', 'Fast Food', 300, 400, 100, 'Yes', 'images/download - 2022-09-25T203432.429.jfif', '2022-09-26 16:48:31', '2022-09-26 16:48:31'),
(522, 94, 'nayemmd.cse21@gmail.com', 'BBQ CHICKEN   PIZZA LARGE', 'BBQ CHICKEN   PIZZA LARGE', 'Fast Food', 400, 500, 100, 'Yes', 'images/download - 2022-09-25T203432.429.jfif', '2022-09-26 16:49:03', '2022-09-26 16:49:03'),
(523, 95, 'nayemmd.cse21@gmail.com', 'FOUR SEASONS PIZZA (SMALL)', 'FOUR SEASONS PIZZA (SMALL)', 'Fast Food', 250, 350, 100, 'Yes', 'images/download - 2022-09-25T203432.429.jfif', '2022-09-26 16:50:10', '2022-09-26 16:50:10'),
(524, 96, 'nayemmd.cse21@gmail.com', 'FOUR SEASONS PIZZA (MEDIUM)', 'FOUR SEASONS PIZZA (MEDIUM)', 'Fast Food', 350, 450, 100, 'Yes', 'images/download - 2022-09-25T203432.429.jfif', '2022-09-26 16:50:55', '2022-09-26 16:50:55'),
(525, 97, 'nayemmd.cse21@gmail.com', 'FOUR SEASONS PIZZA (LARGE)', 'FOUR SEASONS PIZZA (LARGE)', 'Fast Food', 450, 550, 100, 'Yes', 'images/download - 2022-09-25T203432.429.jfif', '2022-09-26 16:51:32', '2022-09-26 16:51:32'),
(526, 98, 'nayemmd.cse21@gmail.com', 'TANDOORI CHICKEN PIZZA (SMALL)', 'TANDOORI CHICKEN PIZZA (SMALL)', 'Fast Food', 200, 300, 100, 'Yes', 'images/download - 2022-09-25T203432.429.jfif', '2022-09-26 16:52:21', '2022-09-26 16:52:21'),
(527, 99, 'nayemmd.cse21@gmail.com', 'TANDOORI CHICKEN PIZZA MEDIUM)', 'TANDOORI CHICKEN PIZZA MEDIUM)', 'Fast Food', 300, 400, 100, 'Yes', 'images/download - 2022-09-25T203432.429.jfif', '2022-09-26 16:53:29', '2022-09-26 16:53:29'),
(528, 100, 'nayemmd.cse21@gmail.com', 'TANDOORI CHICKEN PIZZA (LARGE)', 'TANDOORI CHICKEN PIZZA (LARGE)', 'Fast Food', 400, 500, 100, 'Yes', 'images/download - 2022-09-25T203432.429.jfif', '2022-09-26 16:54:19', '2022-09-26 16:54:19'),
(529, 101, 'nayemmd.cse21@gmail.com', 'SPICY BEEF PIZZA (SMALL)', 'SPICY BEEF PIZZA (SMALL)', 'Fast Food', 200, 300, 100, 'Yes', 'images/download - 2022-09-25T203432.429.jfif', '2022-09-26 16:55:10', '2022-09-26 16:55:10'),
(530, 102, 'nayemmd.cse21@gmail.com', 'SPICY BEEF PIZZA (MEDIUM)', 'SPICY BEEF PIZZA (MEDIUM)', 'Fast Food', 350, 450, 100, 'Yes', 'images/download - 2022-09-25T203432.429.jfif', '2022-09-26 16:55:46', '2022-09-26 16:55:46'),
(531, 103, 'nayemmd.cse21@gmail.com', 'SPICY BEEF PIZZA (LARGE)', 'SPICY BEEF PIZZA (LARGE)', 'Fast Food', 450, 600, 150, 'Yes', 'images/download - 2022-09-25T203432.429.jfif', '2022-09-26 16:56:38', '2022-09-26 16:56:38'),
(532, 104, 'nayemmd.cse21@gmail.com', 'CHEF SPECIAL PIZZA (SMALL)', 'CHEF SPECIAL PIZZA (SMALL)', 'Fast Food', 250, 350, 100, 'Yes', 'images/download - 2022-09-25T203432.429.jfif', '2022-09-26 16:57:51', '2022-09-26 16:57:51'),
(533, 105, 'nayemmd.cse21@gmail.com', 'CHEF SPECIAL PIZZA (MEDIUM)', 'CHEF SPECIAL PIZZA (MEDIUM)', 'Fast Food', 350, 450, 100, 'Yes', 'images/download - 2022-09-25T203432.429.jfif', '2022-09-26 16:58:33', '2022-09-26 16:58:33'),
(534, 106, 'nayemmd.cse21@gmail.com', 'CHEF SPECIAL PIZZA (LARGE)', 'CHEF SPECIAL PIZZA (LARGE)', 'Fast Food', 450, 550, 100, 'Yes', 'images/download - 2022-09-25T203432.429.jfif', '2022-09-26 16:59:20', '2022-09-26 16:59:20'),
(535, 107, 'nayemmd.cse21@gmail.com', 'PENNE ROMA (VEGETABLE PASTA)', 'PENNE ROMA (VEGETABLE PASTA)', 'Fast Food', 150, 350, 200, 'Yes', 'images/download - 2022-09-25T203432.429.jfif', '2022-09-26 16:59:54', '2022-09-26 16:59:54'),
(536, 108, 'nayemmd.cse21@gmail.com', 'PASTA VASTA (OVEN BAKED)', 'PASTA VASTA (OVEN BAKED)', 'Fast Food', 350, 450, 100, 'Yes', 'images/download - 2022-09-25T203432.429.jfif', '2022-09-26 17:00:54', '2022-09-26 17:00:54'),
(537, 109, 'nayemmd.cse21@gmail.com', 'PASTA CARBONARA (WHITE CREAMY)', 'PASTA CARBONARA (WHITE CREAMY)', 'Fast Food', 350, 450, 100, 'Yes', 'images/download - 2022-09-25T203432.429.jfif', '2022-09-26 17:01:25', '2022-09-26 17:01:25'),
(538, 110, 'nayemmd.cse21@gmail.com', 'CHICKEN SHAWRMA', 'CHICKEN SHAWRMA', 'Fast Food', 100, 180, 80, 'Yes', 'images/download - 2022-09-25T203432.429.jfif', '2022-09-26 17:01:57', '2022-09-26 17:01:57'),
(539, 110, 'nayemmd.cse21@gmail.com', 'BEEF SHWARMA', 'BEEF SHWARMA', 'Fast Food', 100, 200, 100, 'Yes', 'images/download - 2022-09-25T203432.429.jfif', '2022-09-26 17:02:44', '2022-09-26 17:04:18'),
(540, 111, 'nayemmd.cse21@gmail.com', 'CLUB SANDWITCH', 'CLUB SANDWITCH', 'Fast Food', 100, 200, 100, 'Yes', 'images/download - 2022-09-25T203432.429.jfif', '2022-09-26 17:05:30', '2022-09-26 17:05:30'),
(541, 112, 'nayemmd.cse21@gmail.com', 'GRILL CHICKEN SANDWITCH', 'GRILL CHICKEN SANDWITCH', 'Fast Food', 100, 180, 80, 'Yes', 'images/download - 2022-09-25T203432.429.jfif', '2022-09-26 17:06:21', '2022-09-26 17:06:21'),
(542, 113, 'nayemmd.cse21@gmail.com', 'SUB SANDWITCH', 'SUB SANDWITCH', 'Fast Food', 100, 200, 100, 'Yes', 'images/download - 2022-09-25T203432.429.jfif', '2022-09-26 17:07:02', '2022-09-26 17:07:02'),
(543, 114, 'nayemmd.cse21@gmail.com', 'SET 1', 'EGG FRIED RICE,1PCS CRISPY FRIED CHICKEN, CHINESE  VEGE, SOFT DRINKS 250ML', 'Launch', 150, 200, 50, 'Yes', 'images/download - 2022-09-25T203432.429.jfif', '2022-09-26 17:10:25', '2022-09-26 17:10:25'),
(544, 115, 'nayemmd.cse21@gmail.com', 'SET 2', 'SET 2', 'Launch', 150, 250, 100, 'Yes', 'images/download - 2022-09-25T203432.429.jfif', '2022-09-26 17:11:05', '2022-09-26 17:11:05'),
(545, 116, 'nayemmd.cse21@gmail.com', 'SET 3', 'SET 3', 'Launch', 150, 250, 100, 'Yes', 'images/download - 2022-09-25T203432.429.jfif', '2022-09-26 17:11:47', '2022-09-26 17:11:47'),
(547, 118, 'nayemmd.cse21@gmail.com', 'SPECIAL SET', 'SPECIAL SET', 'Launch', 300, 400, 100, 'Yes', 'images/download - 2022-09-25T203432.429.jfif', '2022-09-26 17:13:31', '2022-09-26 17:13:31'),
(548, 119, 'nayemmd.cse21@gmail.com', 'FRESH JUICE (SEASONAL FRUITS)', 'FRESH JUICE (SEASONAL FRUITS)', 'Beverage and Dessert', 100, 150, 50, 'Yes', 'images/download - 2022-09-25T203432.429.jfif', '2022-09-26 17:14:29', '2022-09-26 17:14:29'),
(549, 120, 'nayemmd.cse21@gmail.com', 'LEMONADE', 'LEMONADE', 'Beverage and Dessert', 80, 120, 40, 'Yes', 'images/download - 2022-09-25T203432.429.jfif', '2022-09-26 17:15:08', '2022-09-26 17:15:08'),
(550, 121, 'nayemmd.cse21@gmail.com', 'MILK SHAKE (VANILLA/STRAWBERRY/CHOCOLATE)', 'MILK SHAKE (VANILLA/STRAWBERRY/CHOCOLATE)', 'Beverage and Dessert', 120, 180, 60, 'Yes', 'images/download - 2022-09-25T203432.429.jfif', '2022-09-26 17:15:42', '2022-09-26 17:15:42'),
(551, 122, 'nayemmd.cse21@gmail.com', 'COLD COFFEE', 'COLD COFFEE', 'Beverage and Dessert', 100, 150, 50, 'Yes', 'images/download - 2022-09-25T203432.429.jfif', '2022-09-26 17:16:13', '2022-09-26 17:16:13'),
(552, 123, 'nayemmd.cse21@gmail.com', 'CHOCOLATE COLD COFFEE', 'CHOCOLATE COLD COFFEE', 'Beverage and Dessert', 100, 180, 80, 'Yes', 'images/download - 2022-09-25T203432.429.jfif', '2022-09-26 17:16:52', '2022-09-26 17:16:52'),
(553, 124, 'nayemmd.cse21@gmail.com', 'ICE-CREAM', 'ICE-CREAM', 'Beverage and Dessert', 100, 120, 20, 'Yes', 'images/download - 2022-09-25T203432.429.jfif', '2022-09-26 17:17:34', '2022-09-26 17:17:34'),
(554, 125, 'nayemmd.cse21@gmail.com', 'FALUDA', 'FALUDA', 'Beverage and Dessert', 100, 180, 80, 'Yes', 'images/download - 2022-09-25T203432.429.jfif', '2022-09-26 17:18:21', '2022-09-26 17:18:21'),
(555, 126, 'nayemmd.cse21@gmail.com', 'SIZLING CHOCOLATE BROWNEE', 'SIZLING CHOCOLATE BROWNEE', 'Beverage and Dessert', 180, 280, 100, 'Yes', 'images/download - 2022-09-25T203432.429.jfif', '2022-09-26 17:18:54', '2022-09-26 17:18:54'),
(556, 127, 'nayemmd.cse21@gmail.com', 'HOT COFEE', 'HOT COFEE', 'Beverage and Dessert', 50, 80, 30, 'Yes', 'images/download - 2022-09-25T203432.429.jfif', '2022-09-26 17:19:34', '2022-10-04 17:48:53'),
(557, 160, 'nayemmd.cse21@gmail.com', 'FRY CHICKEN 1 PS', 'FRY CHICKEN 1 PS', 'Thai Cuisine', 50, 70, 20, 'Yes', 'images/download (54).jfif', '2022-09-26 17:32:01', '2022-09-26 17:32:01'),
(558, 129, 'nayemmd.cse21@gmail.com', 'SET 1 PACKAGE', 'SET 1 PACKAGE', 'Chinese Cuisine', 100, 215, 115, 'Yes', 'images/images.jfif', '2022-09-26 17:45:02', '2022-09-26 17:45:02'),
(559, 129, 'nayemmd.cse21@gmail.com', 'MINERAL  WATER(2L)', 'MINERAL  WATER(2L)', 'Beverage and Dessert', 24, 30, 6, 'Yes', 'images/download - 2022-09-25T203432.429.jfif', '2022-09-27 13:48:11', '2022-09-29 11:23:34'),
(560, 130, 'nayemmd.cse21@gmail.com', 'SOFT DRINKS (250 ML)', 'SOFT DRINKS (250 ML)', 'Beverage and Dessert', 24, 25, 1, 'Yes', 'images/download - 2022-09-25T203432.429.jfif', '2022-09-27 13:49:38', '2022-09-29 11:24:53'),
(561, 132, 'nayemmd.cse21@gmail.com', 'THAI SOUP/CORN SOUP/VEGETABLE SOUP(CUP)', 'THAI SOUP/CORN SOUP/VEGETABLE SOUP(CUP)', 'Chinese Cuisine', 70, 150, 80, 'Yes', 'images/download (67).jfif', '2022-09-27 18:59:38', '2022-09-27 18:59:38'),
(562, 131, 'nayemmd.cse21@gmail.com', 'SPECIAL FRIED WONTON (4 PCS)', 'SPECIAL FRIED WONTON (4 PCS)', 'Breakfast', 120, 145, 25, 'Yes', 'images/download - 2022-09-25T203432.429.jfif', '2022-10-02 16:03:27', '2022-10-06 18:51:09'),
(563, 150, 'nayemmd.cse21@gmail.com', 'HYDERABADI BIRYANI (MUTTON)', 'HYDERABADI BIRYANI (MUTTON)', 'Launch', 280, 320, 40, 'Yes', 'images/download - 2022-09-25T203432.429.jfif', '2022-10-05 11:04:40', '2022-10-05 11:04:40'),
(564, 151, 'nayemmd.cse21@gmail.com', 'EGG KORMA', 'EGG KORMA', 'Fast Food', 20, 40, 20, 'Yes', 'images/download - 2022-09-25T203432.429.jfif', '2022-10-05 11:07:18', '2022-10-05 11:07:18'),
(565, 117, 'nayemmd.cse21@gmail.com', 'SET 4', 'SET 4', 'Launch', 200, 300, 100, 'Yes', 'images/download - 2022-09-25T203432.429.jfif', '2022-10-06 12:37:58', '2022-10-06 12:37:58'),
(566, 152, 'nayemmd.cse21@gmail.com', 'PACAGE KACCHI', 'PACAGE KACCHI', 'Launch', 262, 362, 100, 'Yes', 'images/download - 2022-09-25T203432.429.jfif', '2022-10-07 20:20:57', '2022-10-07 20:20:57'),
(567, 153, 'nayemmd.cse21@gmail.com', 'PACAGE KACCHI', 'PACAGE KACCHI', 'Launch', 345, 445, 100, 'Yes', 'images/download - 2022-09-25T203432.429.jfif', '2022-10-07 20:23:23', '2022-10-07 20:23:23'),
(568, 133, 'nayemmd.cse21@gmail.com', 'FRENCH FRY (.5)', 'FRENCH FRY (.5)', 'Fast Food', 30, 60, 30, 'Yes', 'images/download - 2022-09-25T203432.429.jfif', '2022-10-08 12:21:51', '2022-10-08 12:21:51'),
(569, 134, 'nayemmd.cse21@gmail.com', 'SPECIAL FRIED RICE (MIXED) (.5)', 'SPECIAL FRIED RICE (MIXED) (.5)', 'Launch', 140, 240, 100, 'Yes', 'images/download - 2022-09-25T203432.429.jfif', '2022-10-08 12:26:25', '2022-10-08 12:26:25'),
(570, 135, 'nayemmd.cse21@gmail.com', 'THAI FRIED CHICKEN (4 PCS)', 'THAI FRIED CHICKEN (4 PCS)', 'Fast Food', 200, 225, 25, 'Yes', 'images/download - 2022-09-25T203432.429.jfif', '2022-10-08 12:27:58', '2022-10-08 12:27:58'),
(571, 160, 'nayemmd.cse21@gmail.com', 'THAI SOUP (THICK)', 'THAI SOUP (THICK)', 'Chinese Cuisine', 80, 150, 70, 'Yes', 'images/download - 2022-09-25T203432.429.jfif', '2022-10-09 18:18:33', '2022-10-09 18:18:33'),
(572, 162, 'nayemmd.cse21@gmail.com', 'MUTTON KACCI', 'MUTTON KACCI', 'Indian', 280, 380, 100, 'Yes', 'images/download (64).jfif', '2022-10-10 12:21:30', '2022-10-10 12:21:30'),
(573, 170, 'nayemmd.cse21@gmail.com', 'special wonton(4 pcs)', 'special wonton(4 pcs)', 'Chinese Cuisine', 100, 150, 50, 'Yes', 'images/download - 2022-09-25T203432.429.jfif', '2022-10-10 19:07:15', '2022-10-10 19:07:15'),
(574, 171, 'nayemmd.cse21@gmail.com', 'CHINESE VEGETABLE (1/2)', 'CHINESE VEGETABLE (1/2)', 'Chinese Cuisine', 100, 140, 40, 'Yes', 'images/download - 2022-09-25T155159.974.jfif', '2022-10-10 20:00:10', '2022-10-10 20:00:10'),
(575, 201, 'nayemmd.cse21@gmail.com', 'PLAIN RICE', 'PLAIN RICE', 'Indian', 30, 50, 20, 'Yes', 'images/download (6).jfif', '2022-10-11 11:12:31', '2022-10-11 11:12:31'),
(576, 202, 'nayemmd.cse21@gmail.com', 'Bangla  Mixed Sabji', 'Bangla  Mixed Sabji', 'Indian', 120, 180, 60, 'Yes', 'images/download - 2022-09-25T203432.429.jfif', '2022-10-11 11:14:19', '2022-10-11 11:14:19'),
(577, 180, 'nayemmd.cse21@gmail.com', 'Special chowmein', 'Special chowmein', 'Chinese Cuisine', 140, 200, 60, 'Yes', 'images/download (36).jfif', '2022-10-12 17:29:03', '2022-10-12 17:29:03'),
(578, 180, 'nayemmd.cse21@gmail.com', 'Dom Biriany (Beef)', 'Dom Biriany (Beef)', 'Indian', 200, 299, 99, 'Yes', 'images/download - 2022-09-25T203432.429.jfif', '2022-10-14 13:42:26', '2022-10-14 13:42:26'),
(579, 181, 'nayemmd.cse21@gmail.com', 'Chicken shwarma', 'Chicken shwarma', 'Indian', 100, 160, 60, 'Yes', 'images/download - 2022-09-25T203432.429.jfif', '2022-10-14 15:59:48', '2022-10-14 15:59:48'),
(580, 182, 'nayemmd.cse21@gmail.com', 'Tea', 'Tea', 'Indian', 20, 40, 20, 'Yes', 'images/download - 2022-08-12T195851.768.jfif', '2022-10-14 18:00:10', '2022-10-14 18:00:10'),
(581, 201, 'nayemmd.cse21@gmail.com', 'fry chicken', 'fry chicken', 'Indian', 40, 60, 20, 'Yes', 'images/download - 2022-08-12T151924.102.jfif', '2022-10-18 19:58:46', '2022-10-18 19:58:46'),
(582, 202, 'nayemmd.cse21@gmail.com', 'fry chicken (4 pcs)', 'fry chicken (4 pcs)', 'Chinese Cuisine', 150, 240, 90, 'Yes', 'images/download (69).jfif', '2022-10-20 17:28:56', '2022-10-20 17:28:56'),
(583, 203, 'nayemmd.cse21@gmail.com', 'Americano de Peeparoni(m)', 'Americano de Peeperoni', 'Indian', 250, 300, 50, 'Yes', 'images/download (93).jfif', '2022-10-20 17:42:31', '2022-10-20 17:42:31'),
(584, 204, 'nayemmd.cse21@gmail.com', 'package 1', 'Beef Biryany,Firni,Egg,S/D,M/W', 'Indian', 300, 410, 110, 'Yes', 'images/download (100).jfif', '2022-10-20 20:24:37', '2022-10-20 20:24:37'),
(585, 205, 'nayemmd.cse21@gmail.com', 'mixed vegetable', 'mixed vegetable', 'Chinese Cuisine', 280, 400, 120, 'Yes', 'images/download - 2022-08-29T145731.128.jfif', '2022-10-21 13:42:44', '2022-10-21 13:42:44'),
(586, 206, 'nayemmd.cse21@gmail.com', 'package 1', 'Fried rice,vegetable,fry chicken,chicken curry,Drinks', 'Chinese Cuisine', 200, 280, 80, 'Yes', 'images/images (6).jfif', '2022-10-21 18:35:57', '2022-10-21 18:35:57'),
(587, 207, 'nayemmd.cse21@gmail.com', 'Mineral water(2L)', 'Mineral water(2L)', 'Chinese Cuisine', 18, 30, 12, 'Yes', 'images/download (4).jfif', '2022-10-21 18:38:51', '2022-10-21 18:38:51'),
(588, 208, 'nayemmd.cse21@gmail.com', 'fish finger -4 pcs', 'fish finger -4 pcs', 'Chinese Cuisine', 120, 160, 40, 'Yes', 'images/download (62).jfif', '2022-10-23 15:02:45', '2022-10-23 15:02:45'),
(589, 209, 'nayemmd.cse21@gmail.com', 'Package 3', 'Package 3', 'Thai Cuisine', 400, 569, 169, 'Yes', 'images/download (100).jfif', '2022-10-23 16:00:54', '2022-10-23 16:00:54'),
(590, 210, 'nayemmd.cse21@gmail.com', 'TANDOORI CHICKEN', 'TANDOORI CHICKEN', 'Indian', 120, 220, 100, 'Yes', 'images/download - 2022-08-12T150422.646.jfif', '2022-10-26 15:26:47', '2022-10-26 15:26:47'),
(591, 211, 'nayemmd.cse21@gmail.com', 'SPECIAL NAAN', 'SPECIAL NAAN', 'Indian', 75, 150, 75, 'Yes', 'images/download (80).jfif', '2022-10-26 15:48:04', '2022-10-26 15:48:04'),
(592, 212, 'nayemmd.cse21@gmail.com', 'BUTTER NAAN', 'BUTTER NAAN', 'Indian', 40, 80, 40, 'Yes', 'images/download - 2022-08-12T151924.102.jfif', '2022-10-26 15:48:45', '2022-10-26 15:48:45'),
(593, 214, 'nayemmd.cse21@gmail.com', 'cake +decoration(package)', 'cake +decoration(package)', 'Indian', 1000, 1400, 400, 'Yes', 'images/download (86).jfif', '2022-10-26 18:03:54', '2022-10-26 18:03:54'),
(594, 215, 'nayemmd.cse21@gmail.com', 'SPECIAL MIXED VEGETABLE', 'SPECIAL MIXED VEGETABLE', 'Thai Cuisine', 250, 400, 150, 'Yes', 'images/download - 2022-08-12T194736.537.jfif', '2022-10-26 18:15:01', '2022-10-26 18:15:01'),
(595, 216, 'nayemmd.cse21@gmail.com', 'FRIED WONTHON(4 PCS)', 'FRIED WONTHON(4 PCS)', 'Chinese Cuisine', 100, 120, 20, 'Yes', 'images/download - 2022-08-28T170352.708.jfif', '2022-10-26 18:16:06', '2022-10-26 18:16:06'),
(596, 131, 'nayemmd.cse21@gmail.com', 'SOFT DRINKS (CAN)', 'SOFT DRINKS (CAN)', 'Barista', 22, 50, 28, 'Yes', 'images/1000005564.jpg', '2022-10-30 16:14:27', '2022-10-30 16:43:49'),
(597, 301, 'nayemmd.cse21@gmail.com', 'korola baji', 'korola baji', 'Indian', 50, 80, 30, 'Yes', 'images/images (6).jfif', '2022-10-31 14:26:45', '2022-10-31 14:26:45'),
(598, 302, 'nayemmd.cse21@gmail.com', 'bagun vartha', 'bagun vartha', 'Indian', 30, 50, 20, 'Yes', 'images/1000005564.jpg', '2022-10-31 14:28:13', '2022-10-31 14:34:35'),
(599, 303, 'nayemmd.cse21@gmail.com', 'mastered hilsha', 'mastered hilsha', 'Indian', 300, 400, 100, 'Yes', 'images/download - 2022-08-28T163553.663.jfif', '2022-10-31 14:29:35', '2022-10-31 14:29:35'),
(600, 304, 'nayemmd.cse21@gmail.com', 'beef bhuna (1)', 'beef bhuna (1)', 'Indian', 180, 220, 40, 'Yes', 'images/download - 2022-08-28T170233.068.jfif', '2022-10-31 14:31:01', '2022-10-31 14:31:01'),
(601, 305, 'nayemmd.cse21@gmail.com', 'plain dal', 'plain dal', 'Indian', 20, 40, 20, 'Yes', 'images/download (71).jfif', '2022-10-31 14:31:50', '2022-10-31 14:31:50'),
(602, 210, 'nayemmd.cse21@gmail.com', 'CHICKEN SANDWICH', 'CHICKEN SANDWICH', 'Indian', 100, 150, 50, 'Yes', 'images/download (95).jfif', '2022-11-01 10:16:20', '2022-11-01 10:16:20'),
(603, 103, 'nayemmd.cse21@gmail.com', 'CHICKEN SHAWRMA', NULL, 'Fast Food', 100, 160, 60, 'Yes', 'images/bzy1hcir54vxgkizdwoq.png', '2022-11-06 17:39:29', '2022-11-06 17:39:29');

-- --------------------------------------------------------

--
-- Table structure for table `ingredients`
--

CREATE TABLE `ingredients` (
  `id` int(11) NOT NULL,
  `email` varchar(55) NOT NULL,
  `foodname` varchar(100) NOT NULL,
  `productname` varchar(100) DEFAULT NULL,
  `quantity` float NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ingredients`
--

INSERT INTO `ingredients` (`id`, `email`, `foodname`, `productname`, `quantity`, `created_at`, `updated_at`) VALUES
(1, 'mdnayem.cse21@gmail.com', 'Chicken Burger Medium', 'Chicken', 130, '2022-06-19 16:15:02', '2022-06-19 16:15:49'),
(2, 'mdnayem.cse21@gmail.com', 'Beef Burger Medium', 'Beef', 100, '2022-06-19 16:15:25', '2022-06-19 16:15:25'),
(3, 'mdnayem.cse21@gmail.com', 'French Fries Full', 'Potato', 200, '2022-06-19 17:32:15', '2022-06-19 17:32:15'),
(4, 'mdnayem.cse21@gmail.com', 'Plain Rice', 'Rice Plain', 200, '2022-06-22 09:27:42', '2022-06-22 09:27:42'),
(5, 'mdnayem.cse21@gmail.com', 'Fried Rice', 'Rice Fried', 200, '2022-06-22 09:27:59', '2022-06-22 09:27:59'),
(6, 'mdnayem.cse21@gmail.com', 'Faluda', 'Sugar', 80, '2022-06-22 09:28:49', '2022-06-22 09:28:49'),
(7, 'mdnayem.cse21@gmail.com', 'Cold Coffee', 'Sugar', 30, '2022-06-22 09:29:06', '2022-06-22 09:29:06'),
(8, 'mdnayem.cse21@gmail.com', 'Faluda', 'Ice Cream', 120, '2022-06-22 09:29:32', '2022-06-22 09:29:32'),
(9, 'mdnayem.cse21@gmail.com', 'Poratha', 'Flour', 100, '2022-06-22 09:30:33', '2022-06-22 09:30:33'),
(10, 'mdnayem.cse21@gmail.com', 'Cold Coffee', 'Coffee', 30, '2022-06-22 09:30:45', '2022-06-22 09:30:45'),
(11, 'mdnayem.cse21@gmail.com', 'Dal Vaji', 'Vegetable', 70, '2022-06-22 09:31:04', '2022-06-22 09:31:04'),
(13, 'mdnayem.cse21@gmail.com', 'Kacci Biriyani', 'Mutton', 100, '2022-06-23 12:17:32', '2022-06-26 10:52:29'),
(14, 'mdnayem.cse21@gmail.com', 'Thai Soup', 'Ginger', 25, '2022-07-15 22:51:29', '2022-07-15 22:51:29'),
(15, 'mdnayem.cse21@gmail.com', 'Thai Soup', 'Shrimp', 15, '2022-07-15 22:51:43', '2022-07-15 22:51:43');

-- --------------------------------------------------------

--
-- Table structure for table `kot`
--

CREATE TABLE `kot` (
  `id` int(11) NOT NULL,
  `food_number` int(11) NOT NULL,
  `food_name` varchar(55) DEFAULT 'Food Name',
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kot`
--

INSERT INTO `kot` (`id`, `food_number`, `food_name`, `quantity`, `created_at`, `updated_at`) VALUES
(1, 44, 'SLICED FISH WITH GINGER OR BASIL LEAF', 1, '2022-08-07 16:09:57', '2022-08-07 16:09:57'),
(2, 99, 'FRIED SPRING CHICKEN', 1, '2022-08-08 13:18:40', '2022-08-08 13:18:40'),
(3, 99, 'FRIED SPRING CHICKEN', 1, '2022-08-08 13:18:41', '2022-08-08 13:18:41'),
(4, 99, 'FRIED SPRING CHICKEN', 1, '2022-08-08 13:19:15', '2022-08-08 13:19:15'),
(5, 99, 'FRIED SPRING CHICKEN', 1, '2022-08-08 13:20:15', '2022-08-08 13:20:15'),
(6, 1, 'Special Fried Wonton (8Pcs)', 1, '2022-08-08 17:43:44', '2022-08-08 17:43:44'),
(7, 115, 'MANDARIN FISH WITH VINEGAR GRAVY', 1, '2022-08-11 17:28:24', '2022-08-11 17:28:24'),
(8, 33, 'SLICED CHICKEN WITH GINGER/MUSHROOM', 1, '2022-08-16 15:05:50', '2022-08-16 15:05:50'),
(9, 33, 'SLICED CHICKEN WITH GINGER/MUSHROOM', 1, '2022-08-16 15:07:53', '2022-08-16 15:07:53'),
(10, 22, 'TOM YUM SOUP', 1, '2022-08-16 16:04:54', '2022-08-16 16:04:54'),
(11, 22, 'TOM YUM SOUP', 4, '2022-08-16 18:54:59', '2022-08-16 18:54:59'),
(12, 12, 'PRAWN CUTLET', 1, '2022-08-16 18:57:11', '2022-08-16 18:57:11'),
(13, 99, 'FRIED SPRING CHICKEN', 1, '2022-08-16 20:02:50', '2022-08-16 20:02:50'),
(14, 99, 'FRIED SPRING CHICKEN', 1, '2022-08-16 20:19:25', '2022-08-16 20:19:25'),
(15, 11, 'CHICKEN CUTLET', 2, '2022-08-16 20:30:04', '2022-08-16 20:30:04'),
(16, 11, 'CHICKEN CUTLET', 1, '2022-08-16 21:36:09', '2022-08-16 21:36:09'),
(17, 22, 'TOM YUM SOUP', 5, '2022-08-16 22:03:18', '2022-08-16 22:03:18'),
(18, 11, 'CHICKEN CUTLET', 2, '2022-08-16 22:11:28', '2022-08-16 22:11:28'),
(19, 99, 'FRIED SPRING CHICKEN', 2, '2022-08-16 22:20:37', '2022-08-16 22:20:37'),
(20, 22, 'TOM YUM SOUP', 5, '2022-08-16 22:37:07', '2022-08-16 22:37:07'),
(21, 216, 'SET 3 :', 24, '2022-08-17 10:38:28', '2022-08-17 10:38:28'),
(22, 22, 'TOM YUM SOUP', 3, '2022-08-24 08:47:56', '2022-08-24 08:47:56'),
(23, 22, 'TOM YUM SOUP', 1, '2022-08-24 09:32:49', '2022-08-24 09:32:49'),
(24, 33, 'SLICED CHICKEN WITH GINGER/MUSHROOM', 2, '2022-08-25 08:39:19', '2022-08-25 08:39:19'),
(25, 44, 'SLICED FISH WITH GINGER OR BASIL LEAF', 2, '2022-08-25 08:51:00', '2022-08-25 08:51:00'),
(26, 1, 'SPECIAL FRIED WONTON (8 PCS)', 1, '2022-08-25 09:18:24', '2022-08-25 09:18:24'),
(27, 2, 'FRIED WONTON (8 PCS)', 1, '2022-08-25 09:18:35', '2022-08-25 09:18:35'),
(28, 22, 'TOM YUM SOUP', 1, '2022-08-25 09:49:04', '2022-08-25 09:49:04'),
(29, 11, 'CHICKEN CUTLET', 2, '2022-08-25 09:49:13', '2022-08-25 09:49:13'),
(30, 22, 'TOM YUM SOUP', 1, '2022-08-25 09:49:21', '2022-08-25 09:49:21'),
(31, 11, 'CHICKEN CUTLET', 1, '2022-08-25 09:58:21', '2022-08-25 09:58:21'),
(32, 1, 'SPECIAL FRIED WONTON (8 PCS)', 2, '2022-08-25 09:58:50', '2022-08-25 09:58:50'),
(33, 1, 'SPECIAL FRIED WONTON (8 PCS)', 1, '2022-08-25 10:00:24', '2022-08-25 10:00:24'),
(34, 24, 'MIXED CLEAR THAI SOUP', 2, '2022-08-25 11:53:04', '2022-08-25 11:53:04'),
(35, 3, 'Spring Rolls (8 Pcs)', 1, '2022-08-25 12:02:25', '2022-08-25 12:02:25'),
(36, 3, 'Spring Rolls (8 Pcs)', 3, '2022-08-25 12:30:54', '2022-08-25 12:30:54'),
(37, 3, 'Spring Rolls (8 Pcs)', 1, '2022-08-25 12:57:26', '2022-08-25 12:57:26'),
(38, 3, 'Spring Rolls (8 Pcs)', 1, '2022-08-25 13:03:59', '2022-08-25 13:03:59'),
(39, 4, 'Fish Finger (6 Pcs)', 4, '2022-08-25 13:10:58', '2022-08-25 13:10:58'),
(40, 55, 'VEGETABLE PRAWN OR BEEF', 2, '2022-08-25 15:00:10', '2022-08-25 15:00:10'),
(41, 66, 'STEAM CHICKEN SOUP', 1, '2022-08-25 15:08:43', '2022-08-25 15:08:43'),
(42, 7, 'Prawn Cake (8 Pcs)', 2, '2022-08-25 15:45:58', '2022-08-25 15:45:58'),
(43, 7, 'Prawn Cake (8 Pcs)', 1, '2022-08-25 15:54:59', '2022-08-25 15:54:59'),
(44, 5, 'Special Fried Prawn (6 Pcs)', 2, '2022-08-25 15:56:41', '2022-08-25 15:56:41'),
(45, 6, 'Chicken Cake (8 Pcs)', 1, '2022-08-25 15:57:15', '2022-08-25 15:57:15'),
(46, 88, 'STREAM RICE', 2, '2022-08-25 16:02:47', '2022-08-25 16:02:47'),
(47, 9, 'SPECIAL FRIED CHICKEN BALL(8 PCS)', 1, '2022-08-25 16:09:26', '2022-08-25 16:09:26'),
(48, 1, 'SPECIAL FRIED WONTON (8 PCS)', 1, '2022-08-25 16:15:48', '2022-08-25 16:15:48'),
(49, 2, 'FRIED WONTON (8 PCS)', 1, '2022-08-25 16:16:25', '2022-08-25 16:16:25'),
(50, 2, 'FRIED WONTON (8 PCS)', 3, '2022-08-25 16:21:38', '2022-08-25 16:21:38'),
(51, 2, 'FRIED WONTON (8 PCS)', 3, '2022-08-25 16:24:15', '2022-08-25 16:24:15'),
(52, 2, 'FRIED WONTON (8 PCS)', 3, '2022-08-25 16:26:20', '2022-08-25 16:26:20'),
(53, 1, 'SPECIAL FRIED WONTON (8 PCS)', 1, '2022-08-25 16:33:04', '2022-08-25 16:33:04'),
(54, 1, 'SPECIAL FRIED WONTON (8 PCS)', 1, '2022-08-25 16:40:38', '2022-08-25 16:40:38'),
(55, 1, 'SPECIAL FRIED WONTON (8 PCS)', 1, '2022-08-25 16:55:03', '2022-08-25 16:55:03'),
(56, 1, 'SPECIAL FRIED WONTON (8 PCS)', 1, '2022-08-25 16:59:11', '2022-08-25 16:59:11'),
(57, 1, 'SPECIAL FRIED WONTON (8 PCS)', 1, '2022-08-25 17:16:07', '2022-08-25 17:16:07'),
(58, 1, 'SPECIAL FRIED WONTON (8 PCS)', 1, '2022-08-25 17:19:45', '2022-08-25 17:19:45'),
(59, 1, 'SPECIAL FRIED WONTON (8 PCS)', 1, '2022-08-25 17:26:11', '2022-08-25 17:26:11'),
(60, 1, 'SPECIAL FRIED WONTON (8 PCS)', 1, '2022-08-25 17:33:48', '2022-08-25 17:33:48'),
(61, 1, 'SPECIAL FRIED WONTON (8 PCS)', 1, '2022-08-25 17:34:42', '2022-08-25 17:34:42'),
(62, 1, 'SPECIAL FRIED WONTON (8 PCS)', 1, '2022-08-25 17:40:46', '2022-08-25 17:40:46'),
(63, 1, 'SPECIAL FRIED WONTON (8 PCS)', 1, '2022-08-25 18:14:31', '2022-08-25 18:14:31'),
(64, 2, 'FRIED WONTON (8 PCS)', 1, '2022-08-25 18:28:14', '2022-08-25 18:28:14'),
(65, 2, 'FRIED WONTON (8 PCS)', 2, '2022-08-25 18:52:36', '2022-08-25 18:52:36'),
(66, 10, 'FISH CUTLET', 2, '2022-08-25 20:14:53', '2022-08-25 20:14:53'),
(67, 1, 'SPECIAL FRIED WONTON (8 PCS)', 1, '2022-08-25 20:18:55', '2022-08-25 20:18:55'),
(68, 3, 'Spring Rolls (8 Pcs)', 3, '2022-08-25 20:20:13', '2022-08-25 20:20:13'),
(69, 2, 'FRIED WONTON (8 PCS)', 1, '2022-08-25 20:25:34', '2022-08-25 20:25:34'),
(70, 1, 'SPECIAL FRIED WONTON (8 PCS)', 1, '2022-08-25 20:27:25', '2022-08-25 20:27:25'),
(71, 111, 'SWEET & SOUR PRAWN', 2, '2022-08-25 20:30:30', '2022-08-25 20:30:30'),
(72, 111, 'SWEET & SOUR PRAWN', 1, '2022-08-25 20:31:59', '2022-08-25 20:31:59'),
(73, 88, 'STREAM RICE', 2, '2022-08-25 21:02:57', '2022-08-25 21:02:57'),
(74, 10, 'FISH CUTLET', 2, '2022-08-25 21:27:42', '2022-08-25 21:27:42'),
(75, 9, 'SPECIAL FRIED CHICKEN BALL(8 PCS)', 2, '2022-08-25 21:28:22', '2022-08-25 21:28:22'),
(76, 8, 'SPECIAL FRIED PRAWN BALL (8 PCS)', 3, '2022-08-25 21:29:18', '2022-08-25 21:29:18'),
(77, 7, 'Prawn Cake (8 Pcs)', 1, '2022-08-25 21:33:06', '2022-08-25 21:33:06'),
(78, 7, 'Prawn Cake (8 Pcs)', 1, '2022-08-25 21:33:34', '2022-08-25 21:33:34'),
(79, 6, 'Chicken Cake (8 Pcs)', 1, '2022-08-25 21:34:02', '2022-08-25 21:34:02'),
(80, 4, 'Fish Finger (6 Pcs)', 1, '2022-08-25 21:37:21', '2022-08-25 21:37:21'),
(81, 4, 'Fish Finger (6 Pcs)', 1, '2022-08-25 21:40:42', '2022-08-25 21:40:42'),
(82, 8, 'SPECIAL FRIED PRAWN BALL (8 PCS)', 3, '2022-08-25 21:43:10', '2022-08-25 21:43:10'),
(83, 5, 'Special Fried Prawn (6 Pcs)', 1, '2022-08-25 21:57:23', '2022-08-25 21:57:23'),
(84, 5, 'Special Fried Prawn (6 Pcs)', 1, '2022-08-25 21:58:00', '2022-08-25 21:58:00'),
(85, 2, 'FRIED WONTON (8 PCS)', 1, '2022-08-25 22:09:16', '2022-08-25 22:09:16'),
(86, 5, 'Special Fried Prawn (6 Pcs)', 1, '2022-08-25 22:11:17', '2022-08-25 22:11:17'),
(87, 5, 'Special Fried Prawn (6 Pcs)', 1, '2022-08-25 22:11:32', '2022-08-25 22:11:32'),
(88, 2, 'FRIED WONTON (8 PCS)', 1, '2022-08-25 22:13:22', '2022-08-25 22:13:22'),
(89, 2, 'FRIED WONTON (8 PCS)', 1, '2022-08-25 22:14:34', '2022-08-25 22:14:34'),
(90, 11, 'CHICKEN CUTLET', 2, '2022-08-25 22:16:43', '2022-08-25 22:16:43'),
(91, 3, 'Spring Rolls (8 Pcs)', 1, '2022-08-25 22:20:54', '2022-08-25 22:20:54'),
(92, 1, 'SPECIAL FRIED WONTON (8 PCS)', 1, '2022-08-25 22:24:57', '2022-08-25 22:24:57'),
(93, 2, 'FRIED WONTON (8 PCS)', 1, '2022-08-25 22:26:10', '2022-08-25 22:26:10'),
(94, 34, 'SLICED CHICKEN WITH GARLIC SAUCE', 1, '2022-08-25 22:31:14', '2022-08-25 22:31:14'),
(95, 34, 'SLICED CHICKEN WITH GARLIC SAUCE', 1, '2022-08-25 22:31:49', '2022-08-25 22:31:49'),
(96, 34, 'SLICED CHICKEN WITH GARLIC SAUCE', 1, '2022-08-25 22:32:06', '2022-08-25 22:32:06'),
(97, 34, 'SLICED CHICKEN WITH GARLIC SAUCE', 1, '2022-08-25 22:32:34', '2022-08-25 22:32:34'),
(98, 34, 'SLICED CHICKEN WITH GARLIC SAUCE', 1, '2022-08-25 22:32:49', '2022-08-25 22:32:49'),
(99, 34, 'SLICED CHICKEN WITH GARLIC SAUCE', 1, '2022-08-25 22:33:07', '2022-08-25 22:33:07'),
(100, 34, 'SLICED CHICKEN WITH GARLIC SAUCE', 1, '2022-08-25 22:36:35', '2022-08-25 22:36:35'),
(101, 22, 'TOM YUM SOUP', 1, '2022-08-25 22:37:13', '2022-08-25 22:37:13'),
(102, 2, 'FRIED WONTON (8 PCS)', 1, '2022-08-25 22:47:13', '2022-08-25 22:47:13'),
(103, 1, 'SPECIAL FRIED WONTON (8 PCS)', 1, '2022-08-25 23:15:05', '2022-08-25 23:15:05'),
(104, 1, 'SPECIAL FRIED WONTON (8 PCS)', 1, '2022-08-25 23:16:17', '2022-08-25 23:16:17'),
(105, 45, 'SWEET & SOUR FISH', 1, '2022-08-25 23:18:44', '2022-08-25 23:18:44'),
(106, 1, 'SPECIAL FRIED WONTON (8 PCS)', 1, '2022-08-25 23:24:59', '2022-08-25 23:24:59'),
(107, 33, 'SLICED CHICKEN WITH GINGER/MUSHROOM', 1, '2022-08-25 23:25:22', '2022-08-25 23:25:22'),
(108, 33, 'SLICED CHICKEN WITH GINGER/MUSHROOM', 1, '2022-08-25 23:26:26', '2022-08-25 23:26:26'),
(109, 11, 'CHICKEN CUTLET', 1, '2022-08-25 23:38:46', '2022-08-25 23:38:46'),
(110, 11, 'CHICKEN CUTLET', 1, '2022-08-25 23:43:13', '2022-08-25 23:43:13'),
(111, 22, 'TOM YUM SOUP', 1, '2022-08-25 23:44:06', '2022-08-25 23:44:06'),
(112, 6, 'Chicken Cake (8 Pcs)', 1, '2022-08-25 23:44:56', '2022-08-25 23:44:56'),
(113, 22, 'TOM YUM SOUP', 1, '2022-08-26 00:47:41', '2022-08-26 00:47:41'),
(114, 11, 'CHICKEN CUTLET', 1, '2022-08-26 10:20:24', '2022-08-26 10:20:24'),
(115, 4, 'Fish Finger (6 Pcs)', 1, '2022-08-26 13:14:58', '2022-08-26 13:14:58'),
(116, 11, 'CHICKEN CUTLET', 1, '2022-08-26 14:15:41', '2022-08-26 14:15:41'),
(117, 45, 'SWEET & SOUR FISH', 1, '2022-08-27 09:15:43', '2022-08-27 09:15:43'),
(118, 43, 'CUTTLEFISH WITH BASIL LEAF', 1, '2022-08-27 09:59:58', '2022-08-27 09:59:58'),
(119, 36, 'JAFRAN SPECIAL HOT SAUCE PRAWN', 1, '2022-08-27 10:01:31', '2022-08-27 10:01:31'),
(120, 102, 'MASALA CHICKEN CURRY', 1, '2022-08-27 17:03:17', '2022-08-27 17:03:17'),
(121, 2, 'FRIED WONTON (8 PCS)', 1, '2022-08-27 17:23:14', '2022-08-27 17:23:14'),
(122, 3, 'Spring Rolls (8 Pcs)', 1, '2022-08-27 17:24:33', '2022-08-27 17:24:33'),
(123, 1, 'SPECIAL FRIED WONTON (8 PCS)', 1, '2022-08-27 17:24:51', '2022-08-27 17:24:51'),
(124, 103, 'PRAWN CHOWMEIN', 1, '2022-08-29 16:40:21', '2022-08-29 16:40:21'),
(125, 41, 'SET 4:', 5, '2022-08-29 17:36:41', '2022-08-29 17:36:41'),
(126, 3, 'FISH FINGER(6PCS)', 3, '2022-08-30 09:01:12', '2022-08-30 09:01:12'),
(127, 111, 'FALUDA', 1, '2022-08-30 09:10:48', '2022-08-30 09:10:48'),
(128, 120, 'HYDERABADI BIRYANI (BEEF)', 2, '2022-08-30 13:40:18', '2022-08-30 13:40:18'),
(129, 33, 'HYDRABADI BIRYANI(CHICKEN)', 1, '2022-08-30 13:52:01', '2022-08-30 13:52:01'),
(130, 110, 'ICE-CREAM', 2, '2022-08-30 16:35:33', '2022-08-30 16:35:33'),
(131, 75, 'FISH PLATTER;', 1, '2022-08-30 17:50:09', '2022-08-30 17:50:09'),
(132, 6, 'FRENCH FRY', 1, '2022-08-30 17:52:00', '2022-08-30 17:52:00'),
(133, 75, 'FISH PLATTER;', 1, '2022-08-30 17:58:26', '2022-08-30 17:58:26'),
(134, 9, 'JAFRAN SPECIAL THAI SOUP', 1, '2022-08-30 18:52:19', '2022-08-30 18:52:19'),
(135, 14, 'SPECIAL CORN SOUP', 2, '2022-08-31 09:10:11', '2022-08-31 09:10:11'),
(136, 6, 'FRENCH FRY', 5, '2022-08-31 09:10:54', '2022-08-31 09:10:54'),
(137, 1, 'SPECIAL FRIED WONTON(8 PCS)', 1, '2022-08-31 09:47:57', '2022-08-31 09:47:57'),
(138, 1, 'SPECIAL FRIED WONTON(8 PCS)', 1, '2022-08-31 09:48:40', '2022-08-31 09:48:40'),
(139, 1, 'SPECIAL FRIED WONTON(8 PCS)', 1, '2022-08-31 09:50:41', '2022-08-31 09:50:41'),
(140, 1, 'SPECIAL FRIED WONTON(8 PCS)', 1, '2022-08-31 09:52:29', '2022-08-31 09:52:29'),
(141, 1, 'SPECIAL FRIED WONTON(8 PCS)', 1, '2022-08-31 09:53:51', '2022-08-31 09:53:51'),
(142, 1, 'SPECIAL FRIED WONTON(8 PCS)', 1, '2022-08-31 09:53:57', '2022-08-31 09:53:57'),
(143, 1, 'SPECIAL FRIED WONTON(8 PCS)', 1, '2022-08-31 09:54:06', '2022-08-31 09:54:06'),
(144, 120, 'HYDERABADI BIRYANI (BEEF)', 1, '2022-08-31 12:22:02', '2022-08-31 12:22:02'),
(145, 120, 'HYDERABADI BIRYANI (BEEF)', 1, '2022-08-31 12:22:15', '2022-08-31 12:22:15'),
(146, 115, 'MINERAL WATER 500 ML', 1, '2022-08-31 15:53:47', '2022-08-31 15:53:47'),
(147, 56, 'CHICKEN HARIALI KABAB', 1, '2022-08-31 16:32:04', '2022-08-31 16:32:04'),
(148, 45, 'MASALA DOSA', 3, '2022-08-31 16:56:48', '2022-08-31 16:56:48'),
(149, 46, 'SPECIAL MASALA DOSA', 2, '2022-08-31 17:05:03', '2022-08-31 17:05:03'),
(150, 55, 'CHICKEN RESMI KABAB (6PCS)', 1, '2022-08-31 17:29:31', '2022-08-31 17:29:31'),
(151, 66, 'MUTTON ROGAN JOSH', 2, '2022-08-31 21:28:35', '2022-08-31 21:28:35'),
(152, 66, 'MUTTON ROGAN JOSH', 2, '2022-08-31 21:28:50', '2022-08-31 21:28:50'),
(153, 77, 'CRISPY CHICKEN BURGER', 3, '2022-09-01 08:18:58', '2022-09-01 08:18:58'),
(154, 1, 'SPECIAL FRIED WONTON(8 PCS)', 2, '2022-09-01 12:38:48', '2022-09-01 12:38:48'),
(155, 1, 'SPECIAL FRIED WONTON(8 PCS)', 3, '2022-09-01 13:25:26', '2022-09-01 13:25:26'),
(156, 7, 'THAI FRIED CHICKEN (8 PCS)', 4, '2022-09-01 14:11:55', '2022-09-01 14:11:55'),
(157, 1, 'SPECIAL FRIED WONTON(8 PCS)', 1, '2022-09-01 14:15:02', '2022-09-01 14:15:02'),
(158, 7, 'THAI FRIED CHICKEN (8 PCS)', 4, '2022-09-01 14:15:14', '2022-09-01 14:15:14'),
(159, 1, 'SPECIAL FRIED WONTON(8 PCS)', 1, '2022-09-01 14:15:30', '2022-09-01 14:15:30'),
(160, 3, 'FISH FINGER(6PCS)', 1, '2022-09-01 14:37:47', '2022-09-01 14:37:47'),
(161, 75, 'FISH PLATTER;', 1, '2022-09-01 14:39:56', '2022-09-01 14:39:56'),
(162, 1, 'SPECIAL FRIED WONTON(8 PCS)', 1, '2022-09-01 14:40:06', '2022-09-01 14:40:06'),
(163, 1, 'SPECIAL FRIED WONTON(8 PCS)', 1, '2022-09-01 14:40:22', '2022-09-01 14:40:22'),
(164, 1, 'SPECIAL FRIED WONTON(8 PCS)', 1, '2022-09-01 14:42:41', '2022-09-01 14:42:41'),
(165, 1, 'SPECIAL FRIED WONTON(8 PCS)', 1, '2022-09-01 14:55:22', '2022-09-01 14:55:22'),
(166, 44, 'CHICKEN/BEEF CHOLA BATORA', 2, '2022-09-01 15:05:07', '2022-09-01 15:05:07'),
(167, 44, 'CHICKEN/BEEF CHOLA BATORA', 1, '2022-09-01 15:25:31', '2022-09-01 15:25:31'),
(168, 115, 'MINERAL WATER 500 ML', 1, '2022-09-01 15:51:38', '2022-09-01 15:51:38'),
(169, 111, 'FALUDA', 1, '2022-09-01 18:40:31', '2022-09-01 18:40:31'),
(170, 118, 'BEEF BIRYANI', 3, '2022-09-01 19:22:39', '2022-09-01 19:22:39'),
(171, 86, 'BBQ CHICKEN  PIZZA (SMALL)', 1, '2022-09-02 18:03:30', '2022-09-02 18:03:30'),
(172, 7, 'THAI FRIED CHICKEN (8 PCS)', 1, '2022-09-02 18:12:58', '2022-09-02 18:12:58'),
(173, 2, 'FRIED WONTON(8 PCS)', 1, '2022-09-02 18:15:27', '2022-09-02 18:15:27'),
(174, 38, 'SET 1:', 1, '2022-09-03 12:17:07', '2022-09-03 12:17:07'),
(175, 74, 'HOT WINGS RICE BOWL:', 1, '2022-09-03 12:29:06', '2022-09-03 12:29:06'),
(176, 107, 'MILK SHAKE (VANILLA/STRAWBERRY/CHOCOLATE)', 1, '2022-09-03 15:37:55', '2022-09-03 15:37:55'),
(177, 124, 'THAI SOUP/CORN SOUP/VEGETABLE SOUP(CUP)', 1, '2022-09-03 16:51:11', '2022-09-03 16:51:11'),
(178, 150, 'set 1 offer', 70, '2022-09-04 16:58:10', '2022-09-04 16:58:10'),
(179, 6, 'FRENCH FRY', 1, '2022-09-05 14:02:22', '2022-09-05 14:02:22'),
(180, 77, 'CRISPY CHICKEN BURGER', 1, '2022-09-05 17:37:12', '2022-09-05 17:37:12'),
(181, 67, 'PRAWN MALAI CURRY (6PCS)', 2, '2022-09-06 13:24:29', '2022-09-06 13:24:29'),
(182, 435, 'set 1 offer', 5, '2022-09-06 13:57:02', '2022-09-06 13:57:02'),
(183, 9, 'JAFRAN SPECIAL THAI SOUP', 1, '2022-09-06 17:32:57', '2022-09-06 17:32:57'),
(184, 126, 'CHICKEN SHAWRMA', 2, '2022-09-06 18:08:19', '2022-09-06 18:08:19'),
(185, 111, 'FALUDA', 1, '2022-09-08 11:03:36', '2022-09-08 11:03:36'),
(186, 40, 'SET 3', 2, '2022-09-08 11:10:20', '2022-09-08 11:10:20'),
(187, 151, 'KACCI (BEEF) OFFER', 29, '2022-09-08 14:16:49', '2022-09-08 14:16:49'),
(188, 9, 'JAFRAN SPECIAL THAI SOUP', 1, '2022-09-08 15:58:40', '2022-09-08 15:58:40'),
(189, 2, 'FRIED WONTON(8 PCS)', 1, '2022-09-10 09:04:47', '2022-09-10 09:04:47'),
(190, 120, 'HYDERABADI BIRYANI (BEEF)', 2, '2022-09-10 10:54:01', '2022-09-10 10:54:01'),
(191, 124, 'THAI SOUP/CORN SOUP/VEGETABLE SOUP(CUP)', 3, '2022-09-10 15:59:42', '2022-09-10 15:59:42'),
(192, 44, 'CHICKEN/BEEF CHOLA BATORA', 2, '2022-09-10 21:18:02', '2022-09-10 21:18:02'),
(193, 33, 'HYDRABADI BIRYANI(CHICKEN)', 2, '2022-09-11 12:25:22', '2022-09-11 12:25:22'),
(194, 39, 'SET 2', 1, '2022-09-12 13:17:21', '2022-09-12 13:17:21'),
(195, 111, 'FALUDA', 3, '2022-09-13 16:52:00', '2022-09-13 16:52:00'),
(196, 78, 'CHICKEN CHEESE BURGER', 1, '2022-09-13 17:20:00', '2022-09-13 17:20:00'),
(197, 111, 'FALUDA', 1, '2022-09-15 13:32:54', '2022-09-15 13:32:54'),
(198, 114, 'SOFT DRINKS', 2, '2022-09-15 14:31:27', '2022-09-15 14:31:27'),
(199, 114, 'SOFT DRINKS', 2, '2022-09-15 14:31:41', '2022-09-15 14:31:41'),
(200, 114, 'SOFT DRINKS', 2, '2022-09-15 14:34:33', '2022-09-15 14:34:33'),
(201, 111, 'FALUDA', 4, '2022-09-15 14:41:04', '2022-09-15 14:41:04'),
(202, 7, 'THAI FRIED CHICKEN (8 PCS)', 1, '2022-09-16 13:58:44', '2022-09-16 13:58:44'),
(203, 7, 'THAI FRIED CHICKEN (8 PCS)', 1, '2022-09-16 13:58:53', '2022-09-16 13:58:53'),
(204, 102, 'CHICKEN CHOWMEIN', 1, '2022-09-16 17:16:29', '2022-09-16 17:16:29'),
(205, 115, 'MINERAL WATER 500 ML', 2, '2022-09-16 17:33:52', '2022-09-16 17:33:52'),
(206, 86, 'BBQ CHICKEN  PIZZA (SMALL)', 1, '2022-09-17 13:06:31', '2022-09-17 13:06:31'),
(207, 27, 'CHINESE VEGETABLE', 1, '2022-09-17 15:12:20', '2022-09-17 15:12:20'),
(208, 77, 'CRISPY CHICKEN BURGER', 1, '2022-09-17 18:54:05', '2022-09-17 18:54:05'),
(209, 73, 'COMBO 3:', 1, '2022-09-17 18:58:57', '2022-09-17 18:58:57'),
(210, 82, 'PENNE ROMA (VEGETABLE PASTA)', 1, '2022-09-17 19:02:53', '2022-09-17 19:02:53'),
(211, 66, 'MUTTON ROGAN JOSH', 1, '2022-09-18 11:08:51', '2022-09-18 11:08:51'),
(212, 6, 'FRENCH FRY', 1, '2022-09-18 14:36:55', '2022-09-18 14:36:55'),
(213, 6, 'FRENCH FRY', 1, '2022-09-18 14:57:15', '2022-09-18 14:57:15'),
(214, 111, 'FALUDA', 1, '2022-09-19 11:41:59', '2022-09-19 11:41:59'),
(215, 115, 'MINERAL WATER 500 ML', 1, '2022-09-19 12:12:32', '2022-09-19 12:12:32'),
(216, 39, 'SET 2', 2, '2022-09-19 12:27:14', '2022-09-19 12:27:14'),
(217, 6, 'FRENCH FRY', 1, '2022-09-19 14:31:41', '2022-09-19 14:31:41'),
(218, 83, 'PASTA VASTA', 1, '2022-09-20 15:48:58', '2022-09-20 15:48:58'),
(219, 118, 'BEEF BIRYANI', 1, '2022-09-21 10:50:14', '2022-09-21 10:50:14'),
(220, 164, 'BIRIYANI OFFER', 2, '2022-09-21 19:03:01', '2022-09-21 19:03:01'),
(221, 39, 'SET 2', 3, '2022-09-22 12:12:34', '2022-09-22 12:12:34'),
(222, 40, 'SET 3', 2, '2022-09-22 12:47:31', '2022-09-22 12:47:31'),
(223, 6, 'FRENCH FRY', 1, '2022-09-22 15:12:25', '2022-09-22 15:12:25'),
(224, 110, 'ICE-CREAM', 4, '2022-09-22 16:33:24', '2022-09-22 16:33:24'),
(225, 90, 'FOUR SEASONS (MEDIUM)', 1, '2022-09-22 19:13:20', '2022-09-22 19:13:20'),
(226, 16, 'VEGETABLE SOUP', 1, '2022-09-23 17:35:07', '2022-09-23 17:35:07'),
(227, 90, 'FOUR SEASONS (MEDIUM)', 1, '2022-09-23 18:00:45', '2022-09-23 18:00:45'),
(228, 127, 'CHICKEN SHAWRMA', 1, '2022-09-23 18:14:56', '2022-09-23 18:14:56'),
(229, 39, 'SET 2', 1, '2022-09-24 11:55:46', '2022-09-24 11:55:46'),
(230, 5, 'FISH CUTLET', 1, '2022-09-25 15:18:21', '2022-09-25 15:18:21'),
(231, 166, 'CHICKEN ROAST', 3, '2022-09-26 12:43:27', '2022-09-26 12:43:27'),
(232, 120, 'HYDERABADI BIRYANI (BEEF)', 1, '2022-09-26 14:05:32', '2022-09-26 14:05:32'),
(233, 129, 'SET 1 PACKAGE', 27, '2022-09-26 17:45:48', '2022-09-26 17:45:48'),
(234, 87, 'CRISPY CHICKEN BURGER', 1, '2022-09-27 13:17:10', '2022-09-27 13:17:10'),
(235, 69, 'HYDERABADI BIRYANI (BEEF)', 5, '2022-09-27 13:18:16', '2022-09-27 13:18:16'),
(236, 109, 'SET 4', 2, '2022-09-29 11:06:48', '2022-09-29 11:06:48'),
(237, 66, 'BEEF BIRYANI', 1, '2022-09-29 11:58:57', '2022-09-29 11:58:57'),
(238, 79, 'BEEF KARAY CURRY', 1, '2022-09-29 18:32:32', '2022-09-29 18:32:32'),
(239, 87, 'CRISPY CHICKEN BURGER', 1, '2022-09-30 13:47:46', '2022-09-30 13:47:46'),
(240, 6, 'FRENCH FRY', 1, '2022-09-30 17:59:28', '2022-09-30 17:59:28'),
(241, 6, 'FRENCH FRY', 1, '2022-09-30 18:13:26', '2022-09-30 18:13:26'),
(242, 6, 'FRENCH FRY', 1, '2022-09-30 18:43:10', '2022-09-30 18:43:10'),
(243, 19, 'PRAWN CHOWMEIN', 1, '2022-10-01 16:52:17', '2022-10-01 16:52:17'),
(244, 6, 'FRENCH FRY', 1, '2022-10-01 18:27:45', '2022-10-01 18:27:45'),
(245, 88, 'CHICKEN CHEESE BURGER', 1, '2022-10-02 19:07:18', '2022-10-02 19:07:18'),
(246, 102, 'SPICY BEEF PIZZA (MEDIUM)', 1, '2022-10-03 15:43:44', '2022-10-03 15:43:44'),
(247, 98, 'TANDOORI CHICKEN PIZZA (SMALL)', 1, '2022-10-03 17:23:18', '2022-10-03 17:23:18'),
(248, 100, 'TANDOORI CHICKEN PIZZA (LARGE)', 1, '2022-10-03 17:24:26', '2022-10-03 17:24:26'),
(249, 6, 'FRENCH FRY', 1, '2022-10-03 17:56:11', '2022-10-03 17:56:11'),
(250, 87, 'CRISPY CHICKEN BURGER', 1, '2022-10-04 12:32:16', '2022-10-04 12:32:16'),
(251, 114, 'SET 1', 1, '2022-10-04 13:34:04', '2022-10-04 13:34:04'),
(252, 69, 'HYDERABADI BIRYANI (BEEF)', 2, '2022-10-04 15:35:41', '2022-10-04 15:35:41'),
(253, 127, 'HOT COFEE', 5, '2022-10-04 17:45:48', '2022-10-04 17:45:48'),
(254, 127, 'HOT COFEE', 5, '2022-10-04 17:45:57', '2022-10-04 17:45:57'),
(255, 6, 'FRENCH FRY', 1, '2022-10-04 18:06:06', '2022-10-04 18:06:06'),
(256, 115, 'SET 2', 2, '2022-10-05 10:34:32', '2022-10-05 10:34:32'),
(257, 115, 'SET 2', 3, '2022-10-05 18:07:40', '2022-10-05 18:07:40'),
(258, 117, 'SET 4', 2, '2022-10-06 12:38:20', '2022-10-06 12:38:20'),
(259, 43, 'CHINESE VEGETABLE', 1, '2022-10-06 12:39:13', '2022-10-06 12:39:13'),
(260, 93, 'BBQ CHICKEN PIZZA MEDIUM', 1, '2022-10-06 13:13:23', '2022-10-06 13:13:23'),
(261, 132, 'THAI SOUP/CORN SOUP/VEGETABLE SOUP(CUP)', 2, '2022-10-06 18:51:44', '2022-10-06 18:51:44'),
(262, 124, 'ICE-CREAM', 2, '2022-10-07 16:08:34', '2022-10-07 16:08:34'),
(263, 116, 'SET 3', 16, '2022-10-07 17:39:45', '2022-10-07 17:39:45'),
(264, 116, 'SET 3', 16, '2022-10-07 17:39:45', '2022-10-07 17:39:45'),
(265, 116, 'SET 3', 18, '2022-10-07 18:22:03', '2022-10-07 18:22:03'),
(266, 116, 'SET 3', 18, '2022-10-07 18:22:03', '2022-10-07 18:22:03'),
(267, 90, 'BEEF CHEESE BURGER', 1, '2022-10-08 11:55:59', '2022-10-08 11:55:59'),
(268, 135, 'THAI FRIED CHICKEN (4 PCS)', 1, '2022-10-08 12:28:19', '2022-10-08 12:28:19'),
(269, 87, 'CRISPY CHICKEN BURGER', 3, '2022-10-08 12:51:28', '2022-10-08 12:51:28'),
(270, 130, 'SOFT DRINKS (250 ML)', 2, '2022-10-08 13:01:45', '2022-10-08 13:01:45'),
(271, 88, 'CHICKEN CHEESE BURGER', 1, '2022-10-08 17:05:28', '2022-10-08 17:05:28'),
(272, 93, 'BBQ CHICKEN PIZZA MEDIUM', 1, '2022-10-09 11:40:33', '2022-10-09 11:40:33'),
(273, 19, 'PRAWN CHOWMEIN', 1, '2022-10-09 18:53:03', '2022-10-09 18:53:03'),
(274, 19, 'PRAWN CHOWMEIN', 1, '2022-10-09 18:53:03', '2022-10-09 18:53:03'),
(275, 1, 'SPECIAL FRIED WONTON(8 PCS)', 1, '2022-10-09 19:23:56', '2022-10-09 19:23:56'),
(276, 162, 'MUTTON KACCI', 1, '2022-10-10 12:21:54', '2022-10-10 12:21:54'),
(277, 6, 'FRENCH FRY', 1, '2022-10-10 18:24:46', '2022-10-10 18:24:46'),
(278, 43, 'CHINESE VEGETABLE', 1, '2022-10-10 19:09:37', '2022-10-10 19:09:37'),
(279, 43, 'CHINESE VEGETABLE', 1, '2022-10-10 19:09:38', '2022-10-10 19:09:38'),
(280, 43, 'CHINESE VEGETABLE', 1, '2022-10-10 19:09:38', '2022-10-10 19:09:38'),
(281, 43, 'CHINESE VEGETABLE', 1, '2022-10-10 19:42:40', '2022-10-10 19:42:40'),
(282, 43, 'CHINESE VEGETABLE', 2, '2022-10-10 19:43:29', '2022-10-10 19:43:29'),
(283, 171, 'CHINESE VEGETABLE (1/2)', 1, '2022-10-10 20:22:25', '2022-10-10 20:22:25'),
(284, 129, 'MINERAL  WATER(2L)', 2, '2022-10-10 20:31:53', '2022-10-10 20:31:53'),
(285, 129, 'MINERAL  WATER(2L)', 2, '2022-10-10 20:40:25', '2022-10-10 20:40:25'),
(286, 115, 'SET 2', 4, '2022-10-11 11:10:15', '2022-10-11 11:10:15'),
(287, 37, 'BEEF MASALA', 1, '2022-10-11 11:15:58', '2022-10-11 11:15:58'),
(288, 69, 'HYDERABADI BIRYANI (BEEF)', 2, '2022-10-11 12:59:20', '2022-10-11 12:59:20'),
(289, 69, 'HYDERABADI BIRYANI (BEEF)', 2, '2022-10-11 12:59:20', '2022-10-11 12:59:20'),
(290, 69, 'HYDERABADI BIRYANI (BEEF)', 2, '2022-10-11 12:59:21', '2022-10-11 12:59:21'),
(291, 6, 'FRENCH FRY', 1, '2022-10-11 14:37:31', '2022-10-11 14:37:31'),
(292, 28, 'CHICKEN SIZZILING', 1, '2022-10-11 16:17:32', '2022-10-11 16:17:32'),
(293, 119, 'FRESH JUICE (SEASONAL FRUITS)', 1, '2022-10-11 18:40:47', '2022-10-11 18:40:47'),
(294, 116, 'SET 3', 2, '2022-10-12 14:37:00', '2022-10-12 14:37:00'),
(295, 180, 'Special chowmein', 1, '2022-10-12 17:29:27', '2022-10-12 17:29:27'),
(296, 125, 'FALUDA', 1, '2022-10-13 16:17:39', '2022-10-13 16:17:39'),
(297, 66, 'BEEF BIRYANI', 2, '2022-10-14 13:31:12', '2022-10-14 13:31:12'),
(298, 90, 'BEEF CHEESE BURGER', 2, '2022-10-14 15:53:48', '2022-10-14 15:53:48'),
(299, 90, 'BEEF CHEESE BURGER', 2, '2022-10-14 15:53:49', '2022-10-14 15:53:49'),
(300, 90, 'BEEF CHEESE BURGER', 2, '2022-10-14 15:53:49', '2022-10-14 15:53:49'),
(301, 181, 'Chicken shwarma', 1, '2022-10-14 16:00:18', '2022-10-14 16:00:18'),
(302, 9, 'JAFRAN SPECIAL THAI SOUP', 1, '2022-10-14 16:24:58', '2022-10-14 16:24:58'),
(303, 6, 'FRENCH FRY', 1, '2022-10-14 16:36:00', '2022-10-14 16:36:00'),
(304, 182, 'Tea', 2, '2022-10-14 18:00:42', '2022-10-14 18:00:42'),
(305, 1, 'SPECIAL FRIED WONTON(8 PCS)', 1, '2022-10-14 19:00:16', '2022-10-14 19:00:16'),
(306, 69, 'HYDERABADI BIRYANI (BEEF)', 1, '2022-10-14 19:13:59', '2022-10-14 19:13:59'),
(307, 88, 'CHICKEN CHEESE BURGER', 2, '2022-10-15 12:17:24', '2022-10-15 12:17:24'),
(308, 130, 'SOFT DRINKS (250 ML)', 1, '2022-10-15 17:24:29', '2022-10-15 17:24:29'),
(309, 125, 'FALUDA', 1, '2022-10-16 08:40:55', '2022-10-16 08:40:55'),
(310, 66, 'BEEF BIRYANI', 4, '2022-10-16 11:51:02', '2022-10-16 11:51:02'),
(311, 66, 'BEEF BIRYANI', 4, '2022-10-16 11:51:02', '2022-10-16 11:51:02'),
(312, 66, 'BEEF BIRYANI', 4, '2022-10-16 11:51:02', '2022-10-16 11:51:02'),
(313, 9, 'JAFRAN SPECIAL THAI SOUP', 1, '2022-10-17 09:53:49', '2022-10-17 09:53:49'),
(314, 9, 'JAFRAN SPECIAL THAI SOUP', 1, '2022-10-17 09:53:49', '2022-10-17 09:53:49'),
(315, 9, 'JAFRAN SPECIAL THAI SOUP', 1, '2022-10-17 09:53:49', '2022-10-17 09:53:49'),
(316, 9, 'JAFRAN SPECIAL THAI SOUP', 1, '2022-10-17 09:53:49', '2022-10-17 09:53:49'),
(317, 10, 'THAI SOUP (THICK)', 3, '2022-10-17 09:54:36', '2022-10-17 09:54:36'),
(318, 69, 'HYDERABADI BIRYANI (BEEF)', 2, '2022-10-17 15:21:21', '2022-10-17 15:21:21'),
(319, 69, 'HYDERABADI BIRYANI (BEEF)', 2, '2022-10-17 15:21:21', '2022-10-17 15:21:21'),
(320, 69, 'HYDERABADI BIRYANI (BEEF)', 2, '2022-10-17 15:21:21', '2022-10-17 15:21:21'),
(321, 69, 'HYDERABADI BIRYANI (BEEF)', 2, '2022-10-17 15:21:21', '2022-10-17 15:21:21'),
(322, 17, 'JAFRAN SPECIAL CHOWMEIN', 1, '2022-10-17 17:24:25', '2022-10-17 17:24:25'),
(323, 17, 'JAFRAN SPECIAL CHOWMEIN', 1, '2022-10-17 17:24:25', '2022-10-17 17:24:25'),
(324, 17, 'JAFRAN SPECIAL CHOWMEIN', 1, '2022-10-17 17:24:25', '2022-10-17 17:24:25'),
(325, 181, 'Chicken shwarma', 1, '2022-10-17 17:24:47', '2022-10-17 17:24:47'),
(326, 69, 'HYDERABADI BIRYANI (BEEF)', 3, '2022-10-18 11:23:52', '2022-10-18 11:23:52'),
(327, 66, 'BEEF BIRYANI', 2, '2022-10-18 12:28:42', '2022-10-18 12:28:42'),
(328, 69, 'HYDERABADI BIRYANI (BEEF)', 5, '2022-10-18 13:42:57', '2022-10-18 13:42:57'),
(329, 69, 'HYDERABADI BIRYANI (BEEF)', 5, '2022-10-18 13:42:57', '2022-10-18 13:42:57'),
(330, 69, 'HYDERABADI BIRYANI (BEEF)', 5, '2022-10-18 13:42:57', '2022-10-18 13:42:57'),
(331, 69, 'HYDERABADI BIRYANI (BEEF)', 5, '2022-10-18 13:42:57', '2022-10-18 13:42:57'),
(332, 152, 'PACAGE KACCHI', 1, '2022-10-18 18:14:10', '2022-10-18 18:14:10'),
(333, 92, 'BBQ CHICKEN  PIZZA (SMALL)', 1, '2022-10-19 11:02:32', '2022-10-19 11:02:32'),
(334, 6, 'FRENCH FRY', 1, '2022-10-19 15:51:12', '2022-10-19 15:51:12'),
(335, 69, 'HYDERABADI BIRYANI (BEEF)', 3, '2022-10-19 18:34:38', '2022-10-19 18:34:38'),
(336, 3, 'FISH FINGER(6PCS)', 1, '2022-10-19 19:07:56', '2022-10-19 19:07:56'),
(337, 130, 'SOFT DRINKS (250 ML)', 2, '2022-10-20 11:47:09', '2022-10-20 11:47:09'),
(338, 69, 'HYDERABADI BIRYANI (BEEF)', 5, '2022-10-20 13:18:51', '2022-10-20 13:18:51'),
(339, 69, 'HYDERABADI BIRYANI (BEEF)', 5, '2022-10-20 13:18:51', '2022-10-20 13:18:51'),
(340, 69, 'HYDERABADI BIRYANI (BEEF)', 6, '2022-10-20 14:18:48', '2022-10-20 14:18:48'),
(341, 69, 'HYDERABADI BIRYANI (BEEF)', 6, '2022-10-20 14:18:48', '2022-10-20 14:18:48'),
(342, 201, 'fry chicken', 1, '2022-10-20 15:50:15', '2022-10-20 15:50:15'),
(343, 201, 'fry chicken', 1, '2022-10-20 15:50:16', '2022-10-20 15:50:16'),
(344, 201, 'fry chicken', 1, '2022-10-20 15:50:16', '2022-10-20 15:50:16'),
(345, 125, 'FALUDA', 1, '2022-10-20 17:18:32', '2022-10-20 17:18:32'),
(346, 202, 'fry chicken (4 pcs)', 1, '2022-10-20 17:29:17', '2022-10-20 17:29:17'),
(347, 93, 'BBQ CHICKEN PIZZA MEDIUM', 1, '2022-10-20 17:39:07', '2022-10-20 17:39:07'),
(348, 203, 'Americano de Peeparoni(m)', 1, '2022-10-20 17:43:15', '2022-10-20 17:43:15'),
(349, 181, 'Chicken shwarma', 2, '2022-10-20 19:47:47', '2022-10-20 19:47:47'),
(350, 204, 'package 1', 4, '2022-10-20 22:07:53', '2022-10-20 22:07:53'),
(351, 204, 'package 1', 4, '2022-10-20 22:07:53', '2022-10-20 22:07:53'),
(352, 6, 'FRENCH FRY', 1, '2022-10-21 16:21:52', '2022-10-21 16:21:52'),
(353, 170, 'special wonton(4 pcs)', 1, '2022-10-21 17:51:35', '2022-10-21 17:51:35'),
(354, 2, 'FRIED WONTON(8 PCS)', 1, '2022-10-21 18:50:22', '2022-10-21 18:50:22'),
(355, 6, 'FRENCH FRY', 1, '2022-10-21 18:58:46', '2022-10-21 18:58:46'),
(356, 6, 'FRENCH FRY', 1, '2022-10-21 19:18:22', '2022-10-21 19:18:22'),
(357, 6, 'FRENCH FRY', 1, '2022-10-21 19:18:22', '2022-10-21 19:18:22'),
(358, 6, 'FRENCH FRY', 1, '2022-10-21 19:18:22', '2022-10-21 19:18:22'),
(359, 6, 'FRENCH FRY', 1, '2022-10-21 19:18:22', '2022-10-21 19:18:22'),
(360, 6, 'FRENCH FRY', 1, '2022-10-21 19:18:45', '2022-10-21 19:18:45'),
(361, 6, 'FRENCH FRY', 1, '2022-10-21 19:18:45', '2022-10-21 19:18:45'),
(362, 6, 'FRENCH FRY', 1, '2022-10-21 19:18:45', '2022-10-21 19:18:45'),
(363, 6, 'FRENCH FRY', 1, '2022-10-21 19:18:45', '2022-10-21 19:18:45'),
(364, 6, 'FRENCH FRY', 1, '2022-10-21 19:18:45', '2022-10-21 19:18:45'),
(365, 6, 'FRENCH FRY', 1, '2022-10-21 19:18:45', '2022-10-21 19:18:45'),
(366, 6, 'FRENCH FRY', 1, '2022-10-21 19:18:45', '2022-10-21 19:18:45'),
(367, 2, 'FRIED WONTON(8 PCS)', 1, '2022-10-21 19:20:54', '2022-10-21 19:20:54'),
(368, 204, 'package 1', 4, '2022-10-21 19:22:11', '2022-10-21 19:22:11'),
(369, 204, 'package 1', 4, '2022-10-21 19:22:11', '2022-10-21 19:22:11'),
(370, 204, 'package 1', 4, '2022-10-21 19:22:11', '2022-10-21 19:22:11'),
(371, 204, 'package 1', 4, '2022-10-21 19:22:11', '2022-10-21 19:22:11'),
(372, 128, 'MINERAL WATER 500 ML', 15, '2022-10-21 19:32:10', '2022-10-21 19:32:10'),
(373, 182, 'Tea', 5, '2022-10-21 20:16:42', '2022-10-21 20:16:42'),
(374, 182, 'Tea', 5, '2022-10-21 20:16:42', '2022-10-21 20:16:42'),
(375, 181, 'Chicken shwarma', 1, '2022-10-22 12:00:15', '2022-10-22 12:00:15'),
(376, 181, 'Chicken shwarma', 2, '2022-10-22 12:00:32', '2022-10-22 12:00:32'),
(377, 70, 'HYDERABADI BIRYANI (MUTTON)', 1, '2022-10-22 15:15:52', '2022-10-22 15:15:52'),
(378, 70, 'HYDERABADI BIRYANI (MUTTON)', 1, '2022-10-22 15:16:07', '2022-10-22 15:16:07'),
(379, 70, 'HYDERABADI BIRYANI (MUTTON)', 2, '2022-10-22 15:16:25', '2022-10-22 15:16:25'),
(380, 120, 'LEMONADE', 1, '2022-10-23 09:47:23', '2022-10-23 09:47:23'),
(381, 116, 'SET 3', 2, '2022-10-23 10:15:55', '2022-10-23 10:15:55'),
(382, 116, 'SET 3', 2, '2022-10-23 10:30:45', '2022-10-23 10:30:45'),
(383, 122, 'COLD COFFEE', 1, '2022-10-23 11:08:45', '2022-10-23 11:08:45'),
(384, 122, 'COLD COFFEE', 1, '2022-10-23 11:08:45', '2022-10-23 11:08:45'),
(385, 122, 'COLD COFFEE', 1, '2022-10-23 11:08:46', '2022-10-23 11:08:46'),
(386, 181, 'Chicken shwarma', 2, '2022-10-23 14:51:21', '2022-10-23 14:51:21'),
(387, 208, 'fish finger -4 pcs', 1, '2022-10-23 15:03:06', '2022-10-23 15:03:06'),
(388, 181, 'Chicken shwarma', 1, '2022-10-23 15:56:59', '2022-10-23 15:56:59'),
(389, 115, 'SET 2', 2, '2022-10-23 17:08:34', '2022-10-23 17:08:34'),
(390, 116, 'SET 3', 2, '2022-10-23 17:14:28', '2022-10-23 17:14:28'),
(391, 128, 'MINERAL WATER 500 ML', 1, '2022-10-23 18:12:01', '2022-10-23 18:12:01'),
(392, 160, 'THAI SOUP (THICK)', 1, '2022-10-23 18:20:46', '2022-10-23 18:20:46'),
(393, 160, 'THAI SOUP (THICK)', 1, '2022-10-23 18:20:47', '2022-10-23 18:20:47'),
(394, 160, 'THAI SOUP (THICK)', 1, '2022-10-23 18:20:47', '2022-10-23 18:20:47'),
(395, 160, 'THAI SOUP (THICK)', 1, '2022-10-23 18:20:47', '2022-10-23 18:20:47'),
(396, 128, 'MINERAL WATER 500 ML', 1, '2022-10-23 18:26:39', '2022-10-23 18:26:39'),
(397, 209, 'Package 3', 1, '2022-10-23 19:24:35', '2022-10-23 19:24:35'),
(398, 17, 'JAFRAN SPECIAL CHOWMEIN', 1, '2022-10-23 19:35:45', '2022-10-23 19:35:45'),
(399, 130, 'SOFT DRINKS (250 ML)', 3, '2022-10-24 17:01:16', '2022-10-24 17:01:16'),
(400, 130, 'SOFT DRINKS (250 ML)', 2, '2022-10-25 15:08:49', '2022-10-25 15:08:49'),
(401, 2, 'FRIED WONTON(8 PCS)', 1, '2022-10-25 15:54:12', '2022-10-25 15:54:12'),
(402, 181, 'Chicken shwarma', 1, '2022-10-25 16:49:31', '2022-10-25 16:49:31'),
(403, 17, 'JAFRAN SPECIAL CHOWMEIN', 1, '2022-10-25 17:10:23', '2022-10-25 17:10:23'),
(404, 17, 'JAFRAN SPECIAL CHOWMEIN', 1, '2022-10-25 17:10:23', '2022-10-25 17:10:23'),
(405, 17, 'JAFRAN SPECIAL CHOWMEIN', 1, '2022-10-25 17:10:23', '2022-10-25 17:10:23'),
(406, 17, 'JAFRAN SPECIAL CHOWMEIN', 1, '2022-10-25 17:10:23', '2022-10-25 17:10:23'),
(407, 17, 'JAFRAN SPECIAL CHOWMEIN', 1, '2022-10-25 17:10:23', '2022-10-25 17:10:23'),
(408, 88, 'CHICKEN CHEESE BURGER', 1, '2022-10-25 17:15:06', '2022-10-25 17:15:06'),
(409, 88, 'CHICKEN CHEESE BURGER', 1, '2022-10-25 17:15:06', '2022-10-25 17:15:06'),
(410, 88, 'CHICKEN CHEESE BURGER', 1, '2022-10-25 17:15:06', '2022-10-25 17:15:06'),
(411, 117, 'SET 4', 17, '2022-10-25 17:20:16', '2022-10-25 17:20:16'),
(412, 117, 'SET 4', 11, '2022-10-25 17:20:37', '2022-10-25 17:20:37'),
(413, 181, 'Chicken shwarma', 1, '2022-10-25 17:28:37', '2022-10-25 17:28:37'),
(414, 181, 'Chicken shwarma', 1, '2022-10-25 17:31:52', '2022-10-25 17:31:52'),
(415, 170, 'special wonton(4 pcs)', 1, '2022-10-25 17:49:32', '2022-10-25 17:49:32'),
(416, 93, 'BBQ CHICKEN PIZZA MEDIUM', 1, '2022-10-25 17:50:25', '2022-10-25 17:50:25'),
(417, 181, 'Chicken shwarma', 1, '2022-10-25 17:53:31', '2022-10-25 17:53:31'),
(418, 88, 'CHICKEN CHEESE BURGER', 1, '2022-10-25 18:18:12', '2022-10-25 18:18:12'),
(419, 88, 'CHICKEN CHEESE BURGER', 1, '2022-10-25 18:18:12', '2022-10-25 18:18:12'),
(420, 88, 'CHICKEN CHEESE BURGER', 1, '2022-10-25 18:18:12', '2022-10-25 18:18:12'),
(421, 88, 'CHICKEN CHEESE BURGER', 1, '2022-10-25 18:18:12', '2022-10-25 18:18:12'),
(422, 88, 'CHICKEN CHEESE BURGER', 1, '2022-10-25 18:18:12', '2022-10-25 18:18:12'),
(423, 66, 'BEEF BIRYANI', 1, '2022-10-25 18:39:00', '2022-10-25 18:39:00'),
(424, 6, 'FRENCH FRY', 1, '2022-10-25 19:49:26', '2022-10-25 19:49:26'),
(425, 128, 'MINERAL WATER 500 ML', 3, '2022-10-26 14:12:50', '2022-10-26 14:12:50'),
(426, 6, 'FRENCH FRY', 1, '2022-10-26 15:12:29', '2022-10-26 15:12:29'),
(427, 128, 'MINERAL WATER 500 ML', 3, '2022-10-26 17:53:12', '2022-10-26 17:53:12'),
(428, 214, 'cake +decoration(package)', 1, '2022-10-26 18:04:35', '2022-10-26 18:04:35'),
(429, 28, 'CHICKEN SIZZILING', 5, '2022-10-26 18:19:33', '2022-10-26 18:19:33'),
(430, 61, 'CHICKEN RESMI KABAB (6PCS)', 3, '2022-10-26 19:18:07', '2022-10-26 19:18:07'),
(431, 6, 'FRENCH FRY', 1, '2022-10-26 19:29:48', '2022-10-26 19:29:48'),
(432, 6, 'FRENCH FRY', 1, '2022-10-26 19:46:11', '2022-10-26 19:46:11'),
(433, 69, 'HYDERABADI BIRYANI (BEEF)', 2, '2022-10-26 19:49:59', '2022-10-26 19:49:59'),
(434, 130, 'SOFT DRINKS (250 ML)', 2, '2022-10-27 19:08:35', '2022-10-27 19:08:35'),
(435, 127, 'HOT COFEE', 1, '2022-10-27 19:10:30', '2022-10-27 19:10:30'),
(436, 128, 'MINERAL WATER 500 ML', 1, '2022-10-27 19:13:19', '2022-10-27 19:13:19'),
(437, 6, 'FRENCH FRY', 1, '2022-10-27 19:21:07', '2022-10-27 19:21:07'),
(438, 127, 'HOT COFEE', 3, '2022-10-27 19:35:10', '2022-10-27 19:35:10'),
(439, 6, 'FRENCH FRY', 1, '2022-10-27 19:48:01', '2022-10-27 19:48:01'),
(440, 66, 'BEEF BIRYANI', 2, '2022-10-28 12:17:46', '2022-10-28 12:17:46'),
(441, 122, 'COLD COFFEE', 1, '2022-10-28 15:45:26', '2022-10-28 15:45:26'),
(442, 6, 'FRENCH FRY', 1, '2022-10-28 15:55:00', '2022-10-28 15:55:00'),
(443, 120, 'LEMONADE', 1, '2022-10-28 16:04:38', '2022-10-28 16:04:38'),
(444, 120, 'LEMONADE', 1, '2022-10-28 16:05:42', '2022-10-28 16:05:42'),
(445, 120, 'LEMONADE', 1, '2022-10-28 16:08:39', '2022-10-28 16:08:39'),
(446, 66, 'BEEF BIRYANI', 1, '2022-10-28 16:13:01', '2022-10-28 16:13:01'),
(447, 1, 'SPECIAL FRIED WONTON(8 PCS)', 1, '2022-10-28 16:33:06', '2022-10-28 16:33:06'),
(448, 88, 'CHICKEN CHEESE BURGER', 1, '2022-10-28 16:39:28', '2022-10-28 16:39:28'),
(449, 130, 'SOFT DRINKS (250 ML)', 4, '2022-10-28 16:41:27', '2022-10-28 16:41:27'),
(450, 6, 'FRENCH FRY', 1, '2022-10-28 16:43:44', '2022-10-28 16:43:44'),
(451, 94, 'BBQ CHICKEN   PIZZA LARGE', 1, '2022-10-28 16:49:03', '2022-10-28 16:49:03'),
(452, 117, 'SET 4', 1, '2022-10-28 17:30:04', '2022-10-28 17:30:04'),
(453, 6, 'FRENCH FRY', 1, '2022-10-28 18:11:41', '2022-10-28 18:11:41'),
(454, 6, 'FRENCH FRY', 1, '2022-10-28 18:23:09', '2022-10-28 18:23:09'),
(455, 125, 'FALUDA', 2, '2022-10-28 18:48:13', '2022-10-28 18:48:13'),
(456, 6, 'FRENCH FRY', 1, '2022-10-28 18:57:44', '2022-10-28 18:57:44'),
(457, 6, 'FRENCH FRY', 1, '2022-10-28 18:58:10', '2022-10-28 18:58:10'),
(458, 88, 'CHICKEN CHEESE BURGER', 3, '2022-10-28 19:05:09', '2022-10-28 19:05:09'),
(459, 128, 'MINERAL WATER 500 ML', 1, '2022-10-28 19:06:10', '2022-10-28 19:06:10'),
(460, 67, 'MUTTON BIRYANI', 25, '2022-10-28 20:11:13', '2022-10-28 20:11:13'),
(461, 3, 'FISH FINGER(6PCS)', 1, '2022-10-29 10:50:48', '2022-10-29 10:50:48'),
(462, 6, 'FRENCH FRY', 1, '2022-10-29 15:59:11', '2022-10-29 15:59:11'),
(463, 120, 'LEMONADE', 1, '2022-10-29 16:42:07', '2022-10-29 16:42:07'),
(464, 120, 'LEMONADE', 4, '2022-10-29 17:30:46', '2022-10-29 17:30:46'),
(465, 18, 'CHICKEN CHOWMEIN', 1, '2022-10-29 17:31:33', '2022-10-29 17:31:33'),
(466, 109, 'PASTA CARBONARA (WHITE CREAMY)', 1, '2022-10-29 17:35:58', '2022-10-29 17:35:58'),
(467, 109, 'PASTA CARBONARA (WHITE CREAMY)', 1, '2022-10-29 17:35:58', '2022-10-29 17:35:58'),
(468, 109, 'PASTA CARBONARA (WHITE CREAMY)', 1, '2022-10-29 17:35:58', '2022-10-29 17:35:58'),
(469, 202, 'fry chicken (4 pcs)', 1, '2022-10-29 17:49:49', '2022-10-29 17:49:49'),
(470, 117, 'SET 4', 1, '2022-10-29 17:55:01', '2022-10-29 17:55:01'),
(471, 181, 'Chicken shwarma', 1, '2022-10-29 18:23:33', '2022-10-29 18:23:33'),
(472, 181, 'Chicken shwarma', 1, '2022-10-29 18:23:33', '2022-10-29 18:23:33'),
(473, 181, 'Chicken shwarma', 1, '2022-10-29 18:23:33', '2022-10-29 18:23:33'),
(474, 181, 'Chicken shwarma', 1, '2022-10-29 18:23:33', '2022-10-29 18:23:33'),
(475, 181, 'Chicken shwarma', 1, '2022-10-29 18:23:34', '2022-10-29 18:23:34'),
(476, 181, 'Chicken shwarma', 1, '2022-10-29 18:23:34', '2022-10-29 18:23:34'),
(477, 128, 'MINERAL WATER 500 ML', 3, '2022-10-29 18:24:31', '2022-10-29 18:24:31'),
(478, 117, 'SET 4', 1, '2022-10-29 18:30:07', '2022-10-29 18:30:07'),
(479, 100, 'TANDOORI CHICKEN PIZZA (LARGE)', 1, '2022-10-29 18:51:33', '2022-10-29 18:51:33'),
(480, 130, 'SOFT DRINKS (250 ML)', 1, '2022-10-29 19:22:08', '2022-10-29 19:22:08'),
(481, 130, 'SOFT DRINKS (250 ML)', 1, '2022-10-29 19:22:08', '2022-10-29 19:22:08'),
(482, 130, 'SOFT DRINKS (250 ML)', 1, '2022-10-29 19:22:08', '2022-10-29 19:22:08'),
(483, 117, 'SET 4', 1, '2022-10-30 11:59:05', '2022-10-30 11:59:05'),
(484, 117, 'SET 4', 1, '2022-10-30 12:00:05', '2022-10-30 12:00:05'),
(485, 117, 'SET 4', 1, '2022-10-30 12:00:24', '2022-10-30 12:00:24'),
(486, 117, 'SET 4', 1, '2022-10-30 12:01:15', '2022-10-30 12:01:15'),
(487, 117, 'SET 4', 1, '2022-10-30 12:01:34', '2022-10-30 12:01:34'),
(488, 117, 'SET 4', 1, '2022-10-30 12:18:51', '2022-10-30 12:18:51'),
(489, 117, 'SET 4', 1, '2022-10-30 12:19:12', '2022-10-30 12:19:12'),
(490, 117, 'SET 4', 1, '2022-10-30 12:21:05', '2022-10-30 12:21:05'),
(491, 117, 'SET 4', 1, '2022-10-30 12:28:50', '2022-10-30 12:28:50'),
(492, 117, 'SET 4', 1, '2022-10-30 12:36:35', '2022-10-30 12:36:35'),
(493, 117, 'SET 4', 1, '2022-10-30 12:36:57', '2022-10-30 12:36:57'),
(494, 117, 'SET 4', 1, '2022-10-30 12:38:10', '2022-10-30 12:38:10'),
(495, 128, 'MINERAL WATER 500 ML', 2, '2022-10-30 12:38:43', '2022-10-30 12:38:43'),
(496, 6, 'FRENCH FRY', 1, '2022-10-30 12:42:02', '2022-10-30 12:42:02'),
(497, 6, 'FRENCH FRY', 1, '2022-10-30 12:42:41', '2022-10-30 12:42:41'),
(498, 66, 'BEEF BIRYANI', 1, '2022-10-30 15:24:22', '2022-10-30 15:24:22'),
(499, 66, 'BEEF BIRYANI', 1, '2022-10-30 15:24:23', '2022-10-30 15:24:23'),
(500, 66, 'BEEF BIRYANI', 1, '2022-10-30 15:24:23', '2022-10-30 15:24:23'),
(501, 9, 'JAFRAN SPECIAL THAI SOUP', 1, '2022-10-30 15:51:00', '2022-10-30 15:51:00'),
(502, 66, 'BEEF BIRYANI', 2, '2022-10-30 16:18:33', '2022-10-30 16:18:33'),
(503, 130, 'SOFT DRINKS (250 ML)', 4, '2022-10-30 17:42:06', '2022-10-30 17:42:06'),
(504, 130, 'SOFT DRINKS (250 ML)', 4, '2022-10-30 17:42:06', '2022-10-30 17:42:06'),
(505, 120, 'LEMONADE', 1, '2022-10-30 18:39:58', '2022-10-30 18:39:58'),
(506, 66, 'BEEF BIRYANI', 1, '2022-10-31 12:17:07', '2022-10-31 12:17:07'),
(507, 131, 'SOFT DRINKS (CAN)', 4, '2022-10-31 14:41:33', '2022-10-31 14:41:33'),
(508, 93, 'BBQ CHICKEN PIZZA MEDIUM', 1, '2022-10-31 15:29:13', '2022-10-31 15:29:13'),
(509, 130, 'SOFT DRINKS (250 ML)', 3, '2022-10-31 16:18:13', '2022-10-31 16:18:13'),
(510, 130, 'SOFT DRINKS (250 ML)', 3, '2022-10-31 16:18:13', '2022-10-31 16:18:13'),
(511, 130, 'SOFT DRINKS (250 ML)', 3, '2022-10-31 16:18:13', '2022-10-31 16:18:13'),
(512, 181, 'Chicken shwarma', 1, '2022-10-31 19:06:49', '2022-10-31 19:06:49'),
(513, 181, 'Chicken shwarma', 1, '2022-10-31 19:23:23', '2022-10-31 19:23:23'),
(514, 115, 'SET 2', 1, '2022-10-31 19:26:18', '2022-10-31 19:26:18'),
(515, 92, 'BBQ CHICKEN  PIZZA (SMALL)', 1, '2022-10-31 19:36:47', '2022-10-31 19:36:47'),
(516, 128, 'MINERAL WATER 500 ML', 2, '2022-11-01 10:30:53', '2022-11-01 10:30:53'),
(517, 7, 'THAI FRIED CHICKEN (8 PCS)', 1, '2022-11-01 15:51:17', '2022-11-01 15:51:17'),
(518, 7, 'THAI FRIED CHICKEN (8 PCS)', 1, '2022-11-01 15:51:17', '2022-11-01 15:51:17'),
(519, 127, 'HOT COFEE', 1, '2022-11-01 17:08:24', '2022-11-01 17:08:24'),
(520, 92, 'BBQ CHICKEN  PIZZA (SMALL)', 1, '2022-11-01 17:12:53', '2022-11-01 17:12:53'),
(521, 67, 'MUTTON BIRYANI', 2, '2022-11-01 17:17:47', '2022-11-01 17:17:47'),
(522, 65, 'CHICKEN BIRYANI', 2, '2022-11-01 18:09:20', '2022-11-01 18:09:20'),
(523, 67, 'MUTTON BIRYANI', 2, '2022-11-01 19:23:48', '2022-11-01 19:23:48'),
(524, 127, 'HOT COFEE', 1, '2022-11-02 14:11:11', '2022-11-02 14:11:11'),
(525, 114, 'SET 1', 1, '2022-11-02 15:40:26', '2022-11-02 15:40:26'),
(526, 127, 'HOT COFEE', 1, '2022-11-02 15:41:14', '2022-11-02 15:41:14'),
(527, 95, 'FOUR SEASONS PIZZA (SMALL)', 1, '2022-11-02 15:45:21', '2022-11-02 15:45:21'),
(528, 125, 'FALUDA', 3, '2022-11-02 15:46:01', '2022-11-02 15:46:01'),
(529, 9, 'JAFRAN SPECIAL THAI SOUP', 1, '2022-11-02 16:08:57', '2022-11-02 16:08:57'),
(530, 127, 'HOT COFEE', 2, '2022-11-02 16:42:18', '2022-11-02 16:42:18'),
(531, 128, 'MINERAL WATER 500 ML', 2, '2022-11-02 19:35:26', '2022-11-02 19:35:26'),
(532, 117, 'SET 4', 5, '2022-11-02 20:07:39', '2022-11-02 20:07:39'),
(533, 122, 'COLD COFFEE', 1, '2022-11-02 20:13:31', '2022-11-02 20:13:31'),
(534, 88, 'CHICKEN CHEESE BURGER', 2, '2022-11-02 20:46:47', '2022-11-02 20:46:47'),
(535, 131, 'SOFT DRINKS (CAN)', 1, '2022-11-02 21:01:02', '2022-11-02 21:01:02'),
(536, 127, 'HOT COFEE', 2, '2022-11-03 10:03:04', '2022-11-03 10:03:04'),
(537, 131, 'SOFT DRINKS (CAN)', 1, '2022-11-03 15:05:47', '2022-11-03 15:05:47'),
(538, 15, 'HOT & SOUR SOUP', 1, '2022-11-03 16:28:37', '2022-11-03 16:28:37'),
(539, 7, 'THAI FRIED CHICKEN (8 PCS)', 1, '2022-11-03 17:39:49', '2022-11-03 17:39:49'),
(540, 119, 'FRESH JUICE (SEASONAL FRUITS)', 3, '2022-11-03 17:53:17', '2022-11-03 17:53:17'),
(541, 121, 'MILK SHAKE (VANILLA/STRAWBERRY/CHOCOLATE)', 1, '2022-11-03 17:57:33', '2022-11-03 17:57:33'),
(542, 115, 'SET 2', 2, '2022-11-03 18:00:20', '2022-11-03 18:00:20'),
(543, 127, 'HOT COFEE', 2, '2022-11-03 18:23:44', '2022-11-03 18:23:44'),
(544, 6, 'FRENCH FRY', 1, '2022-11-03 18:30:00', '2022-11-03 18:30:00'),
(545, 6, 'FRENCH FRY', 1, '2022-11-03 18:36:24', '2022-11-03 18:36:24'),
(546, 32, 'CHICKEN DO-PIYAZA', 1, '2022-11-03 18:39:40', '2022-11-03 18:39:40'),
(547, 87, 'CRISPY CHICKEN BURGER', 3, '2022-11-03 18:48:57', '2022-11-03 18:48:57'),
(548, 119, 'FRESH JUICE (SEASONAL FRUITS)', 3, '2022-11-03 18:52:03', '2022-11-03 18:52:03'),
(549, 7, 'THAI FRIED CHICKEN (8 PCS)', 1, '2022-11-03 19:03:36', '2022-11-03 19:03:36'),
(550, 7, 'THAI FRIED CHICKEN (8 PCS)', 1, '2022-11-03 19:17:45', '2022-11-03 19:17:45'),
(551, 22, 'CHICKEN FRIED RICE', 1, '2022-11-03 19:54:41', '2022-11-03 19:54:41'),
(552, 127, 'HOT COFEE', 1, '2022-11-03 19:59:01', '2022-11-03 19:59:01'),
(553, 131, 'SOFT DRINKS (CAN)', 1, '2022-11-03 20:27:32', '2022-11-03 20:27:32'),
(554, 127, 'HOT COFEE', 1, '2022-11-04 16:59:02', '2022-11-04 16:59:02'),
(555, 17, 'JAFRAN SPECIAL CHOWMEIN', 1, '2022-11-04 17:04:37', '2022-11-04 17:04:37'),
(556, 118, 'SPECIAL SET', 2, '2022-11-04 17:15:58', '2022-11-04 17:15:58'),
(557, 125, 'FALUDA', 2, '2022-11-04 18:20:24', '2022-11-04 18:20:24'),
(558, 68, 'HYDERABADI BIRYANI (CHICKEN)', 3, '2022-11-04 18:23:00', '2022-11-04 18:23:00'),
(559, 69, 'HYDERABADI BIRYANI (BEEF)', 3, '2022-11-04 18:24:26', '2022-11-04 18:24:26'),
(560, 10, 'THAI SOUP (THICK)', 1, '2022-11-04 18:29:32', '2022-11-04 18:29:32'),
(561, 118, 'SPECIAL SET', 2, '2022-11-04 18:43:02', '2022-11-04 18:43:02'),
(562, 118, 'SPECIAL SET', 2, '2022-11-04 18:44:31', '2022-11-04 18:44:31'),
(563, 7, 'THAI FRIED CHICKEN (8 PCS)', 1, '2022-11-04 19:05:02', '2022-11-04 19:05:02'),
(564, 128, 'MINERAL WATER 500 ML', 1, '2022-11-04 19:37:51', '2022-11-04 19:37:51'),
(565, 110, 'BEEF SHWARMA', 1, '2022-11-04 19:48:49', '2022-11-04 19:48:49'),
(566, 17, 'JAFRAN SPECIAL CHOWMEIN', 1, '2022-11-04 19:49:13', '2022-11-04 19:49:13'),
(567, 128, 'MINERAL WATER 500 ML', 1, '2022-11-04 20:10:29', '2022-11-04 20:10:29'),
(568, 75, 'STEAM RICE', 1, '2022-11-05 12:17:05', '2022-11-05 12:17:05'),
(569, 65, 'CHICKEN BIRYANI', 14, '2022-11-05 12:41:27', '2022-11-05 12:41:27'),
(570, 65, 'CHICKEN BIRYANI', 2, '2022-11-05 13:43:34', '2022-11-05 13:43:34'),
(571, 66, 'BEEF BIRYANI', 2, '2022-11-05 13:44:20', '2022-11-05 13:44:20'),
(572, 93, 'BBQ CHICKEN PIZZA MEDIUM', 1, '2022-11-05 15:22:13', '2022-11-05 15:22:13'),
(573, 6, 'FRENCH FRY', 1, '2022-11-05 15:45:54', '2022-11-05 15:45:54'),
(574, 98, 'TANDOORI CHICKEN PIZZA (SMALL)', 1, '2022-11-05 16:10:07', '2022-11-05 16:10:07'),
(575, 131, 'SOFT DRINKS (CAN)', 1, '2022-11-05 16:28:15', '2022-11-05 16:28:15'),
(576, 125, 'FALUDA', 1, '2022-11-05 16:57:01', '2022-11-05 16:57:01'),
(577, 10, 'THAI SOUP (THICK)', 1, '2022-11-05 17:15:56', '2022-11-05 17:15:56'),
(578, 65, 'CHICKEN BIRYANI', 2, '2022-11-05 17:25:29', '2022-11-05 17:25:29'),
(579, 7, 'THAI FRIED CHICKEN (8 PCS)', 1, '2022-11-05 17:53:22', '2022-11-05 17:53:22'),
(580, 125, 'FALUDA', 2, '2022-11-05 18:24:39', '2022-11-05 18:24:39'),
(581, 125, 'FALUDA', 2, '2022-11-06 13:14:49', '2022-11-06 13:14:49'),
(582, 110, 'BEEF SHWARMA', 1, '2022-11-06 17:24:08', '2022-11-06 17:24:08'),
(583, 9, 'JAFRAN SPECIAL THAI SOUP', 1, '2022-11-06 18:07:22', '2022-11-06 18:07:22'),
(584, 6, 'FRENCH FRY', 1, '2022-11-06 18:14:10', '2022-11-06 18:14:10'),
(585, 127, 'HOT COFEE', 1, '2022-11-06 18:20:36', '2022-11-06 18:20:36'),
(586, 34, 'BEEF SIZZLING', 1, '2022-11-06 18:21:43', '2022-11-06 18:21:43'),
(587, 108, 'PASTA VASTA (OVEN BAKED)', 1, '2022-11-06 19:21:11', '2022-11-06 19:21:11'),
(588, 115, 'SET 2', 1, '2022-11-06 19:22:39', '2022-11-06 19:22:39');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `offer`
--

CREATE TABLE `offer` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `productname` varchar(50) NOT NULL,
  `amount` float NOT NULL,
  `date` date NOT NULL,
  `description` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `offer`
--

INSERT INTO `offer` (`id`, `email`, `productname`, `amount`, `date`, `description`, `created_at`, `updated_at`) VALUES
(1, 'mdnayem.cse21@gmail.com', 'Pepsi 250 ml', 3.5, '2022-01-15', 'Best Offer', '2022-01-15 04:18:31', '2022-01-15 04:18:31'),
(2, 'mdnayem.cse21@gmail.com', 'Mountain Dew 250 ml', 5.5, '2022-01-15', 'First in First get', '2022-01-15 04:18:57', '2022-01-15 04:18:57'),
(3, 'mdnayem.cse21@gmail.com', 'Pepsi 250 ml', 100, '2022-02-17', 'ABCD', '2022-02-18 23:11:43', '2022-02-18 23:11:43'),
(4, 'mdnayem.cse21@gmail.com', 'Soyabin Oil', 20, '2022-03-07', 'For Eid', '2022-03-07 14:20:10', '2022-03-07 14:20:10');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `payment_id` int(10) UNSIGNED DEFAULT NULL,
  `pid` int(11) DEFAULT NULL,
  `ip_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fname` varchar(55) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pname` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT '1',
  `amount` float DEFAULT 0,
  `vat` float DEFAULT 0,
  `tamount` float DEFAULT 0,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` datetime NOT NULL,
  `phone_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Public',
  `cashpayment` float DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_paid` tinyint(1) NOT NULL DEFAULT 0,
  `is_completed` tinyint(1) NOT NULL DEFAULT 0,
  `is_seen_by_admin` tinyint(1) NOT NULL DEFAULT 0,
  `transaction_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `priority` tinyint(4) NOT NULL DEFAULT 1,
  `short_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '+8801999791578' COMMENT 'Payment No',
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'agent|personal',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `name`, `image`, `priority`, `short_name`, `no`, `type`, `created_at`, `updated_at`) VALUES
(1, 'Cash In', NULL, 1, 'cash_in', NULL, NULL, '2021-11-03 03:31:05', '2021-11-03 03:31:05'),
(2, 'bKash', NULL, 2, 'baksh', '+8801999791578', 'Merchant', '2021-11-03 03:32:05', '2021-11-03 03:32:05'),
(3, 'Rocket', NULL, 3, 'rocket', '+8801999791578', 'Merchant', '2021-11-03 03:32:35', '2021-11-03 03:32:35');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `title` varchar(150) NOT NULL,
  `description` varchar(1500) DEFAULT 'Product description',
  `buyingprice` float NOT NULL,
  `sellingprice` float NOT NULL,
  `updated_price` float NOT NULL,
  `image` varchar(255) DEFAULT 'Product Image',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `email`, `title`, `description`, `buyingprice`, `sellingprice`, `updated_price`, `image`, `created_at`, `updated_at`) VALUES
(1, 'mdnayem.cse21@gmail.com', 'Chicken', 'Chicken for Food', 155, 280, 125, 'images/chicken.webp', '2022-06-19 15:19:37', '2022-06-19 15:19:37'),
(2, 'mdnayem.cse21@gmail.com', 'Beef', 'Beef for Food', 600, 800, 200, 'images/beef.jpg', '2022-06-19 15:20:12', '2022-06-19 15:20:12'),
(3, 'mdnayem.cse21@gmail.com', 'Potato', 'Potato for Cooking', 50, 120, 70, 'images/potato.jpg', '2022-06-19 21:27:21', '2022-06-19 21:27:21'),
(4, 'mdnayem.cse21@gmail.com', 'Rice Plain', 'Plain Rice Raw', 80, 120, 40, 'images/Rice Raw.jpg', '2022-06-22 09:11:08', '2022-06-22 09:13:08'),
(6, 'mdnayem.cse21@gmail.com', 'Sugar', 'Sugar For Food', 80, 120, 40, 'images/Sugar.jpg', '2022-06-22 09:14:51', '2022-06-22 09:14:51'),
(7, 'mdnayem.cse21@gmail.com', 'Ice Cream', 'Ice Cream for Faluda', 200, 300, 100, 'images/Ice Cream.jpg', '2022-06-22 09:16:22', '2022-06-22 09:16:22'),
(8, 'mdnayem.cse21@gmail.com', 'Flour', 'Flour for RUti and Poratha', 40, 80, 40, 'images/Flour.jpg', '2022-06-22 09:19:02', '2022-06-22 09:19:02'),
(9, 'mdnayem.cse21@gmail.com', 'Coffee', 'Raw Coffee', 120, 200, 80, 'images/Coffee Raw.jpg', '2022-06-22 09:20:33', '2022-06-22 09:20:33'),
(10, 'mdnayem.cse21@gmail.com', 'Vegetable', 'Vegetables for Food', 300, 500, 200, 'images/Vegetable.jpg', '2022-06-22 09:23:28', '2022-06-22 09:23:28'),
(11, 'mdnayem.cse21@gmail.com', 'Mutton', 'Mutton For Kacci Biriyani', 700, 850, 150, 'images/Mutton.webp', '2022-06-23 12:16:15', '2022-06-23 12:16:15'),
(12, 'mdnayem.cse21@gmail.com', 'Shrimp', 'Shrimp for Thai Soup', 50, 100, 50, 'images/j0rBoVyb7T7uTzj19np2VrpbZpEQLIw8ijCib6Nm.png', '2022-07-15 16:44:07', '2022-07-15 22:47:10'),
(13, 'mdnayem.cse21@gmail.com', 'Ginger', 'Ginger for food (Specially for Soup)', 50, 100, 50, 'images/j0rBoVyb7T7uTzj19np2VrpbZpEQLIw8ijCib6Nm.png', '2022-07-15 18:21:51', '2022-07-15 22:44:59'),
(56, 'mdnayem.cse21@gmail.com', 'SET -3', 'EGG FRIED RICE ,FRIED CHICKEN,CHINESE VEG', 70, 200, 130, 'images/images.jfif', '2022-08-08 17:27:15', '2022-08-08 17:27:15'),
(57, 'mdnayem.cse21@gmail.com', 'SET 3:', 'EGG FRIED RICE, FRIED CHICKEN (1 PCS), CHINESE VEGETABLE, MINERAL WATER', 70, 200, 130, 'images/images.jfif', '2022-08-08 17:33:54', '2022-08-08 17:33:54'),
(58, 'mdnayem.cse21@gmail.com', 'CHICKEN CUTLET', 'CHICKEN CUTLET', 200, 480, 280, 'images/download (41).jfif', '2022-08-09 17:25:40', '2022-08-09 17:25:40'),
(59, 'nayemmd.cse21@gmail.com', 'Thai soup', 'Thai soup', 80, 150, 70, 'images/download - 2022-09-25T203432.429.jfif', '2022-10-09 18:17:54', '2022-10-09 18:17:54');

-- --------------------------------------------------------

--
-- Table structure for table `productaccount`
--

CREATE TABLE `productaccount` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `id` int(11) NOT NULL,
  `totalperson` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` varchar(50) DEFAULT NULL,
  `phone` varchar(50) NOT NULL,
  `status` varchar(50) DEFAULT 'Pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`id`, `totalperson`, `date`, `time`, `phone`, `status`, `created_at`, `updated_at`) VALUES
(1, 5, '2022-07-03', '8pm', '01999791578', 'Pending', '2022-07-03 13:16:34', '2022-07-03 13:16:34'),
(2, 5, '2022-07-03', '8pm', '01999791578', 'Pending', '2022-07-03 13:19:26', '2022-07-03 13:19:26'),
(3, 5, '2022-07-06', '8pm', '01999791578', 'Pending', '2022-07-03 13:21:38', '2022-07-03 18:42:31');

-- --------------------------------------------------------

--
-- Table structure for table `returncarts`
--

CREATE TABLE `returncarts` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `order_id` int(10) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_quantity` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `returncarts`
--

INSERT INTO `returncarts` (`id`, `product_id`, `user_id`, `order_id`, `ip_address`, `product_quantity`, `created_at`, `updated_at`) VALUES
(1, 5, 1, NULL, '203.80.188.10', 1, '2022-03-06 16:45:47', '2022-03-06 16:45:47');

-- --------------------------------------------------------

--
-- Table structure for table `returnorders`
--

CREATE TABLE `returnorders` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `sr_id` int(10) UNSIGNED DEFAULT NULL,
  `shop_id` int(11) DEFAULT NULL,
  `deliveryman_id` int(11) DEFAULT NULL,
  `payment_id` int(10) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Public',
  `cashpayment` float DEFAULT NULL,
  `shop` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sr` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deliveryman` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_paid` tinyint(1) NOT NULL DEFAULT 0,
  `is_completed` tinyint(1) NOT NULL DEFAULT 0,
  `is_seen_by_admin` tinyint(1) NOT NULL DEFAULT 0,
  `transaction_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_cost` int(10) UNSIGNED DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `email`, `phone`, `address`, `shipping_cost`, `created_at`, `updated_at`) VALUES
(1, 'mdnayem.cse21@gmail.com', '01999791578', 'Najirghat Cross Road, Hajibari, Nirala, Khulna', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `shop`
--

CREATE TABLE `shop` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `shopname` varchar(100) DEFAULT NULL,
  `mobile` varchar(50) NOT NULL,
  `accountno` varchar(50) DEFAULT NULL,
  `bkash` varchar(50) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `deliverymanname` varchar(50) DEFAULT NULL,
  `description` varchar(155) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shop`
--

INSERT INTO `shop` (`id`, `email`, `shopname`, `mobile`, `accountno`, `bkash`, `address`, `deliverymanname`, `description`, `created_at`, `updated_at`) VALUES
(1, 'mdnayem.cse21@gmail.com', 'Alvi Store', '01999791578', 'zbc123', '01999791578', 'Hajibari, Nirala, Khulna, Bangladesh.', 'Shakib-Tamim', 'Nothing', '2022-01-15 03:15:20', '2022-01-15 03:15:20'),
(2, 'mdnayem.cse21@gmail.com', 'Kazi Enterprise', '+8801920440044', 'rwe123', '01999791578', 'Najirghat Cross Road, Hajibari, nirala, Khulna', 'Mushfiq-Mahmudullah', 'Nothing', '2022-01-15 03:16:40', '2022-01-15 03:16:40'),
(3, 'mdnayem.cse21@gmail.com', 'kazi store', '12345667', '123', '0987666', 'andarkilla', 'Shakib-Tamim', 'Abcd', '2022-03-07 14:18:09', '2022-03-07 14:18:09');

-- --------------------------------------------------------

--
-- Table structure for table `sr`
--

CREATE TABLE `sr` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `phone` varchar(50) NOT NULL,
  `company` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sr`
--

INSERT INTO `sr` (`id`, `email`, `name`, `phone`, `company`, `created_at`, `updated_at`) VALUES
(1, 'mdnayem.cse21@gmail.com', 'MD. NAYEM', '01999791578', 'Digital vai Everyone', '2022-01-02 04:57:09', '2022-01-02 05:14:23');

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `productname` varchar(100) NOT NULL,
  `openningstock` float NOT NULL,
  `stock` float DEFAULT 0,
  `remainingstock` float DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`id`, `email`, `date`, `productname`, `openningstock`, `stock`, `remainingstock`, `created_at`, `updated_at`) VALUES
(1, 'mdnayem.cse21@gmail.com', '2022-06-19', 'Chicken', 8000, 8000, 8000, '2022-06-19 17:15:11', '2022-07-15 21:59:55'),
(2, 'mdnayem.cse21@gmail.com', '2022-06-19', 'Beef', 7000, 7000, 7000, '2022-06-19 17:15:24', '2022-07-15 16:21:00'),
(3, 'mdnayem.cse21@gmail.com', '2022-06-19', 'Potato', 10000, 10000, 10000, '2022-06-19 17:33:09', '2022-06-29 14:55:07'),
(4, 'mdnayem.cse21@gmail.com', '2022-06-22', 'Rice Plain', 5000, 5000, 5000, '2022-06-22 09:23:53', '2022-06-22 09:23:53'),
(5, 'mdnayem.cse21@gmail.com', '2022-06-22', 'Rice Fried', 5000, 5000, 5000, '2022-06-22 09:24:39', '2022-07-15 16:47:22'),
(6, 'mdnayem.cse21@gmail.com', '2022-06-22', 'Sugar', 10000, 10000, 10000, '2022-06-22 09:25:02', '2022-06-26 17:42:45'),
(7, 'mdnayem.cse21@gmail.com', '2022-06-22', 'Ice Cream', 1000, 1000, 1000, '2022-06-22 09:25:19', '2022-06-22 09:25:19'),
(8, 'mdnayem.cse21@gmail.com', '2022-06-22', 'Flour', 5000, 5000, 5000, '2022-06-22 09:25:33', '2022-07-03 09:10:42'),
(9, 'mdnayem.cse21@gmail.com', '2022-06-22', 'Coffee', 1000, 1000, 1000, '2022-06-22 09:26:31', '2022-06-22 09:26:31'),
(10, 'mdnayem.cse21@gmail.com', '2022-06-22', 'Vegetable', 5000, 5000, 5000, '2022-06-22 09:26:43', '2022-07-03 09:10:42'),
(11, 'mdnayem.cse21@gmail.com', '2022-06-23', 'Mutton', 8000, 8000, 8000, '2022-06-23 12:16:51', '2022-06-29 14:56:03'),
(12, 'mdnayem.cse21@gmail.com', '2022-07-15', 'Ginger', 10000, 10000, 10000, '2022-07-15 22:50:31', '2022-07-15 22:58:24'),
(13, 'mdnayem.cse21@gmail.com', '2022-07-15', 'Shrimp', 2000, 2000, 2000, '2022-07-15 22:50:48', '2022-07-15 22:59:02'),
(14, 'mdnayem.cse21@gmail.com', '2022-07-31', 'Meat', 5000, 5000, 5000, '2022-07-31 16:09:40', '2022-07-31 16:09:40');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(55) NOT NULL,
  `course` varchar(55) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `name`, `email`, `course`, `created_at`, `updated_at`) VALUES
(1, 'Md. Nayem', 'mdnayem.cse21@gmail.com', 'Web Development', '2022-06-22 12:23:30', '2022-06-22 12:23:30');

-- --------------------------------------------------------

--
-- Table structure for table `tablecarts`
--

CREATE TABLE `tablecarts` (
  `id` int(11) NOT NULL,
  `food_number` int(11) NOT NULL,
  `order_id` int(11) DEFAULT 0,
  `fname` varchar(55) DEFAULT 'Food Name',
  `tablenumber` int(11) DEFAULT 1,
  `amount` float NOT NULL DEFAULT 0,
  `product_quantity` int(11) DEFAULT 1,
  `tamount` float NOT NULL DEFAULT 0,
  `date` date DEFAULT NULL,
  `status` varchar(55) DEFAULT 'Incomplete',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tablecarts`
--

INSERT INTO `tablecarts` (`id`, `food_number`, `order_id`, `fname`, `tablenumber`, `amount`, `product_quantity`, `tamount`, `date`, `status`, `created_at`, `updated_at`) VALUES
(3, 67, 1010002, 'PRAWN MALAI CURRY (6PCS)', 1, 550, 2, 550, '2022-09-06', 'Complete', '2022-09-06 14:38:10', '2022-09-06 14:40:15'),
(4, 88, 1010003, 'BBQ CHICKEN   PIZZA LARGE', 1, 550, 1, 550, '2022-09-06', 'Complete', '2022-09-06 14:41:13', '2022-09-06 14:41:53'),
(5, 6, 1010004, 'FRENCH FRY', 1, 120, 1, 120, '2022-09-06', 'Complete', '2022-09-06 17:32:10', '2022-09-06 19:02:02'),
(6, 7, 1010004, 'THAI FRIED CHICKEN (8 PCS)', 1, 450, 1, 450, '2022-09-06', 'Complete', '2022-09-06 17:32:36', '2022-09-06 19:02:02'),
(7, 9, 1010004, 'JAFRAN SPECIAL THAI SOUP', 1, 490, 1, 490, '2022-09-06', 'Complete', '2022-09-06 17:32:48', '2022-09-06 19:02:02'),
(8, 12, 1020001, 'THAI CLEAR SOUP', 2, 520, 1, 520, '2022-09-06', 'Complete', '2022-09-06 18:03:20', '2022-09-06 19:42:22'),
(9, 6, 1020001, 'FRENCH FRY', 2, 120, 1, 120, '2022-09-06', 'Complete', '2022-09-06 18:03:25', '2022-09-06 19:42:22'),
(11, 126, 1020001, 'CHICKEN SHAWRMA', 2, 160, 4, 160, '2022-09-06', 'Complete', '2022-09-06 18:07:18', '2022-09-06 19:42:22'),
(12, 115, 1010004, 'MINERAL WATER 500 ML', 1, 15, 2, 30, '2022-09-06', 'Complete', '2022-09-06 18:12:25', '2022-09-06 19:02:02'),
(13, 115, 1020001, 'MINERAL WATER 500 ML', 2, 15, 3, 45, '2022-09-06', 'Complete', '2022-09-06 19:03:08', '2022-09-06 19:42:22'),
(14, 114, 1020001, 'SOFT DRINKS', 2, 25, 4, 100, '2022-09-06', 'Complete', '2022-09-06 19:03:17', '2022-09-06 19:42:22'),
(15, 114, 1010005, 'SOFT DRINKS', 1, 25, 2, 50, '2022-09-07', 'Complete', '2022-09-07 13:57:49', '2022-09-07 13:58:05'),
(18, 40, 1020002, 'SET 3', 2, 280, 2, 280, '2022-09-08', 'Complete', '2022-09-08 11:09:53', '2022-09-08 11:43:00'),
(21, 114, 1020002, 'SOFT DRINKS', 2, 25, 1, 25, '2022-09-08', 'Complete', '2022-09-08 11:40:28', '2022-09-08 11:43:00'),
(22, 114, 1030001, 'SOFT DRINKS', 3, 25, 1, 25, '2022-09-08', 'Complete', '2022-09-08 11:45:03', '2022-09-08 11:47:53'),
(23, 115, 1030001, 'MINERAL WATER 500 ML', 3, 15, 1, 15, '2022-09-08', 'Complete', '2022-09-08 11:45:10', '2022-09-08 11:47:53'),
(24, 111, 1030001, 'FALUDA', 3, 180, 1, 180, '2022-09-08', 'Complete', '2022-09-08 11:45:17', '2022-09-08 11:47:53'),
(25, 118, 1030001, 'BEEF BIRYANI', 3, 250, 1, 250, '2022-09-08', 'Complete', '2022-09-08 11:45:26', '2022-09-08 11:47:53'),
(26, 151, 1010006, 'KACCI (BEEF) OFFER', 1, 295, 29, 8555, '2022-09-08', 'Complete', '2022-09-08 14:16:36', '2022-09-08 14:24:17'),
(27, 6, 1020003, 'FRENCH FRY', 2, 120, 1, 120, '2022-09-08', 'Complete', '2022-09-08 15:55:41', '2022-09-08 16:08:41'),
(28, 7, 1020003, 'THAI FRIED CHICKEN (8 PCS)', 2, 450, 1, 450, '2022-09-08', 'Complete', '2022-09-08 15:55:56', '2022-09-08 16:08:41'),
(29, 9, 1020003, 'JAFRAN SPECIAL THAI SOUP', 2, 490, 1, 490, '2022-09-08', 'Complete', '2022-09-08 15:56:05', '2022-09-08 16:08:41'),
(30, 6, 1020004, 'FRENCH FRY', 2, 120, 1, 120, '2022-09-08', 'Complete', '2022-09-08 16:11:57', '2022-09-08 16:13:02'),
(31, 7, 1020004, 'THAI FRIED CHICKEN (8 PCS)', 2, 450, 1, 450, '2022-09-08', 'Complete', '2022-09-08 16:12:05', '2022-09-08 16:13:02'),
(32, 9, 1020004, 'JAFRAN SPECIAL THAI SOUP', 2, 490, 1, 490, '2022-09-08', 'Complete', '2022-09-08 16:12:12', '2022-09-08 16:13:02'),
(33, 114, 1020005, 'SOFT DRINKS', 2, 25, 2, 50, '2022-09-08', 'Complete', '2022-09-08 19:43:48', '2022-09-08 19:44:05'),
(37, 120, 1020006, 'HYDERABADI BIRYANI (BEEF)', 2, 280, 2, 280, '2022-09-10', 'Complete', '2022-09-10 10:53:40', '2022-09-10 11:57:59'),
(38, 115, 1020006, 'MINERAL WATER 500 ML', 2, 15, 2, 30, '2022-09-10', 'Complete', '2022-09-10 11:55:46', '2022-09-10 11:57:59'),
(39, 124, 1010007, 'THAI SOUP/CORN SOUP/VEGETABLE SOUP(CUP)', 1, 150, 3, 450, '2022-09-10', 'Complete', '2022-09-10 15:58:54', '2022-09-10 17:23:04'),
(40, 110, 1010007, 'ICE-CREAM', 1, 120, 1, 120, '2022-09-10', 'Complete', '2022-09-10 16:44:47', '2022-09-10 17:23:04'),
(45, 44, 1010008, 'CHICKEN/BEEF CHOLA BATORA', 1, 260, 2, 260, '2022-09-11', 'Complete', '2022-09-11 08:19:20', '2022-09-11 08:22:59'),
(46, 33, 1010009, 'HYDRABADI BIRYANI(CHICKEN)', 1, 250, 2, 500, '2022-09-11', 'Complete', '2022-09-11 12:25:16', '2022-09-11 13:19:45'),
(47, 115, 1010009, 'MINERAL WATER 500 ML', 1, 15, 1, 15, '2022-09-11', 'Complete', '2022-09-11 13:14:15', '2022-09-11 13:19:45'),
(48, 113, 1020007, 'REGULAR COFFEE', 2, 60, 2, 120, '2022-09-11', 'Complete', '2022-09-11 17:48:59', '2022-09-11 17:51:19'),
(49, 111, 1020008, 'FALUDA', 2, 180, 1, 180, '2022-09-11', 'Complete', '2022-09-11 19:07:09', '2022-09-11 19:14:20'),
(50, 86, 1020008, 'BBQ CHICKEN  PIZZA (SMALL)', 2, 300, 1, 300, '2022-09-11', 'Complete', '2022-09-11 19:12:33', '2022-09-11 19:14:20'),
(51, 54, 1020009, 'CHICKEN TIKKA KABAB (6PCS)', 2, 300, 1, 300, '2022-09-12', 'Complete', '2022-09-12 11:36:35', '2022-09-12 11:37:17'),
(52, 6, 1020009, 'FRENCH FRY', 2, 120, 1, 120, '2022-09-12', 'Complete', '2022-09-12 11:36:43', '2022-09-12 11:37:17'),
(53, 39, 1010010, 'SET 2', 1, 250, 1, 250, '2022-09-12', 'Complete', '2022-09-12 13:17:14', '2022-09-12 13:53:17'),
(55, 111, 1010011, 'FALUDA', 1, 180, 2, 180, '2022-09-12', 'Complete', '2022-09-12 15:49:34', '2022-09-12 15:53:03'),
(56, 113, 1010011, 'REGULAR COFFEE', 1, 80, 1, 80, '2022-09-12', 'Complete', '2022-09-12 15:49:53', '2022-09-12 15:53:03'),
(57, 108, 1010011, 'COLD COFFEE', 1, 180, 1, 180, '2022-09-12', 'Complete', '2022-09-12 15:50:04', '2022-09-12 15:53:03'),
(58, 115, 1010011, 'MINERAL WATER 500 ML', 1, 15, 1, 15, '2022-09-12', 'Complete', '2022-09-12 15:50:12', '2022-09-12 15:53:03'),
(59, 111, 1010012, 'FALUDA', 1, 180, 1, 180, '2022-09-12', 'Complete', '2022-09-12 16:39:36', '2022-09-12 16:50:40'),
(66, 6, 1020010, 'FRENCH FRY', 2, 120, 1, 120, '2022-09-13', 'Complete', '2022-09-13 16:51:39', '2022-09-13 17:44:47'),
(67, 111, 1020010, 'FALUDA', 2, 180, 3, 540, '2022-09-13', 'Complete', '2022-09-13 16:51:52', '2022-09-13 17:44:47'),
(70, 124, 1050001, 'THAI SOUP/CORN SOUP/VEGETABLE SOUP(CUP)', 5, 150, 2, 150, '2022-09-13', 'Complete', '2022-09-13 17:19:34', '2022-09-13 18:13:20'),
(71, 77, 1050001, 'CRISPY CHICKEN BURGER', 5, 140, 1, 140, '2022-09-13', 'Complete', '2022-09-13 17:19:45', '2022-09-13 18:13:20'),
(72, 78, 1050001, 'CHICKEN CHEESE BURGER', 5, 160, 1, 160, '2022-09-13', 'Complete', '2022-09-13 17:19:53', '2022-09-13 18:13:20'),
(73, 115, 1020010, 'MINERAL WATER 500 ML', 2, 15, 1, 15, '2022-09-13', 'Complete', '2022-09-13 17:20:43', '2022-09-13 17:44:47'),
(74, 2, 1050001, 'FRIED WONTON(8 PCS)', 5, 240, 1, 240, '2022-09-13', 'Complete', '2022-09-13 18:11:17', '2022-09-13 18:13:20'),
(76, 115, 1050001, 'MINERAL WATER 500 ML', 5, 15, 1, 15, '2022-09-13', 'Complete', '2022-09-13 18:12:25', '2022-09-13 18:13:20'),
(77, 111, 1010013, 'FALUDA', 1, 180, 1, 180, '2022-09-15', 'Complete', '2022-09-15 12:48:18', '2022-09-15 13:32:05'),
(78, 115, 1010013, 'MINERAL WATER 500 ML', 1, 15, 1, 15, '2022-09-15', 'Complete', '2022-09-15 13:24:27', '2022-09-15 13:32:05'),
(79, 114, 1010013, 'SOFT DRINKS', 1, 25, 1, 25, '2022-09-15', 'Complete', '2022-09-15 13:24:33', '2022-09-15 13:32:05'),
(83, 6, 1010014, 'FRENCH FRY', 1, 120, 1, 120, '2022-09-15', 'Complete', '2022-09-15 14:24:09', '2022-09-15 14:29:25'),
(84, 111, 1010014, 'FALUDA', 1, 180, 1, 180, '2022-09-15', 'Complete', '2022-09-15 14:24:15', '2022-09-15 14:29:25'),
(85, 114, 1010014, 'SOFT DRINKS', 1, 25, 2, 50, '2022-09-15', 'Complete', '2022-09-15 14:24:24', '2022-09-15 14:29:25'),
(86, 6, 1010015, 'FRENCH FRY', 1, 120, 1, 120, '2022-09-15', 'Complete', '2022-09-15 14:30:42', '2022-09-15 14:35:23'),
(87, 111, 1010015, 'FALUDA', 1, 180, 1, 180, '2022-09-15', 'Complete', '2022-09-15 14:30:48', '2022-09-15 14:35:23'),
(88, 114, 1010015, 'SOFT DRINKS', 1, 25, 2, 50, '2022-09-15', 'Complete', '2022-09-15 14:30:55', '2022-09-15 14:35:23'),
(90, 118, 1020011, 'BEEF BIRYANI', 2, 250, 1, 250, '2022-09-15', 'Complete', '2022-09-15 14:38:44', '2022-09-15 15:04:23'),
(91, 111, 1030002, 'FALUDA', 3, 180, 4, 180, '2022-09-15', 'Complete', '2022-09-15 14:40:51', '2022-09-15 15:30:39'),
(92, 114, 1020011, 'SOFT DRINKS', 2, 25, 1, 25, '2022-09-15', 'Complete', '2022-09-15 15:03:23', '2022-09-15 15:04:23'),
(93, 115, 1030002, 'MINERAL WATER 500 ML', 3, 15, 4, 60, '2022-09-15', 'Complete', '2022-09-15 15:25:19', '2022-09-15 15:30:39'),
(94, 6, 1040001, 'FRENCH FRY', 4, 120, 1, 120, '2022-09-15', 'Complete', '2022-09-15 16:09:27', '2022-09-15 16:23:27'),
(95, 115, 1040001, 'MINERAL WATER 500 ML', 4, 15, 1, 15, '2022-09-15', 'Complete', '2022-09-15 16:19:46', '2022-09-15 16:23:27'),
(96, 114, 1010016, 'SOFT DRINKS', 1, 25, 1, 25, '2022-09-16', 'Complete', '2022-09-16 13:02:27', '2022-09-16 13:04:43'),
(100, 113, 1020012, 'REGULAR COFFEE', 2, 80, 2, 80, '2022-09-16', 'Complete', '2022-09-16 16:53:03', '2022-09-16 17:07:53'),
(101, 102, 1020013, 'CHICKEN CHOWMEIN', 2, 250, 1, 250, '2022-09-16', 'Complete', '2022-09-16 17:15:02', '2022-09-16 17:46:46'),
(102, 114, 1020013, 'SOFT DRINKS', 2, 25, 2, 50, '2022-09-16', 'Complete', '2022-09-16 17:32:50', '2022-09-16 17:46:46'),
(103, 115, 1010017, 'MINERAL WATER 500 ML', 1, 15, 2, 30, '2022-09-16', 'Complete', '2022-09-16 17:34:30', '2022-09-16 17:35:47'),
(104, 7, 1010017, 'THAI FRIED CHICKEN (8 PCS)', 1, 450, 1, 450, '2022-09-16', 'Complete', '2022-09-16 17:34:54', '2022-09-16 17:35:47'),
(105, 115, 1020013, 'MINERAL WATER 500 ML', 2, 15, 1, 15, '2022-09-16', 'Complete', '2022-09-16 17:44:42', '2022-09-16 17:46:46'),
(106, 7, 1010018, 'THAI FRIED CHICKEN (8 PCS)', 1, 450, 1, 450, '2022-09-17', 'Complete', '2022-09-17 12:46:22', '2022-09-17 12:47:27'),
(107, 115, 1010018, 'MINERAL WATER 500 ML', 1, 15, 2, 30, '2022-09-17', 'Complete', '2022-09-17 12:46:33', '2022-09-17 12:47:27'),
(108, 86, 1010019, 'BBQ CHICKEN  PIZZA (SMALL)', 1, 300, 1, 300, '2022-09-17', 'Complete', '2022-09-17 13:06:23', '2022-09-17 13:30:42'),
(109, 28, 1010020, 'SPECIAL FRIED RICE (MIXED)', 1, 480, 1, 480, '2022-09-17', 'Complete', '2022-09-17 15:11:49', '2022-09-17 15:58:25'),
(110, 7, 1010020, 'THAI FRIED CHICKEN (8 PCS)', 1, 450, 1, 450, '2022-09-17', 'Complete', '2022-09-17 15:12:00', '2022-09-17 15:58:25'),
(111, 27, 1010020, 'CHINESE VEGETABLE', 1, 270, 1, 270, '2022-09-17', 'Complete', '2022-09-17 15:12:12', '2022-09-17 15:58:25'),
(112, 114, 1010020, 'SOFT DRINKS', 1, 25, 3, 75, '2022-09-17', 'Complete', '2022-09-17 15:48:17', '2022-09-17 15:58:25'),
(113, 115, 1010020, 'MINERAL WATER 500 ML', 1, 15, 2, 30, '2022-09-17', 'Complete', '2022-09-17 15:48:26', '2022-09-17 15:58:25'),
(114, 38, 1010021, 'SET 1:', 1, 220, 1, 220, '2022-09-17', 'Complete', '2022-09-17 18:53:43', '2022-09-17 20:15:30'),
(116, 77, 1010021, 'CRISPY CHICKEN BURGER', 1, 140, 1, 140, '2022-09-17', 'Complete', '2022-09-17 18:53:57', '2022-09-17 20:15:30'),
(117, 73, 1010021, 'COMBO 3:', 1, 220, 1, 220, '2022-09-17', 'Complete', '2022-09-17 18:58:51', '2022-09-17 20:15:30'),
(118, 14, 1020014, 'SPECIAL CORN SOUP', 2, 320, 1, 320, '2022-09-17', 'Complete', '2022-09-17 19:00:55', '2022-09-17 19:32:34'),
(120, 6, 1020014, 'FRENCH FRY', 2, 120, 1, 120, '2022-09-17', 'Complete', '2022-09-17 19:01:13', '2022-09-17 19:32:34'),
(121, 77, 1020014, 'CRISPY CHICKEN BURGER', 2, 140, 1, 140, '2022-09-17', 'Complete', '2022-09-17 19:01:36', '2022-09-17 19:32:34'),
(122, 82, 1020014, 'PENNE ROMA (VEGETABLE PASTA)', 2, 350, 1, 350, '2022-09-17', 'Complete', '2022-09-17 19:02:46', '2022-09-17 19:32:34'),
(123, 110, 1010021, 'ICE-CREAM', 1, 120, 2, 240, '2022-09-17', 'Complete', '2022-09-17 19:48:21', '2022-09-17 20:15:30'),
(124, 115, 1010021, 'MINERAL WATER 500 ML', 1, 15, 2, 30, '2022-09-17', 'Complete', '2022-09-17 19:49:33', '2022-09-17 20:15:30'),
(125, 7, 1010022, 'THAI FRIED CHICKEN (8 PCS)', 1, 450, 1, 450, '2022-09-17', 'Complete', '2022-09-17 20:18:52', '2022-09-17 20:19:45'),
(126, 115, 1010022, 'MINERAL WATER 500 ML', 1, 15, 2, 15, '2022-09-17', 'Complete', '2022-09-17 20:18:59', '2022-09-17 20:19:45'),
(128, 6, 1010023, 'FRENCH FRY', 1, 120, 1, 120, '2022-09-18', 'Complete', '2022-09-18 14:36:43', '2022-09-18 17:05:05'),
(129, 6, 1020015, 'FRENCH FRY', 2, 120, 1, 120, '2022-09-18', 'Complete', '2022-09-18 14:57:07', '2022-09-18 17:05:29'),
(130, 98, 1010024, 'AMERICANO DE PEPPARONI (SMALL)', 1, 300, 1, 300, '2022-09-18', 'Complete', '2022-09-18 18:16:02', '2022-09-18 18:21:12'),
(131, 115, 1010024, 'MINERAL WATER 500 ML', 1, 15, 1, 15, '2022-09-18', 'Complete', '2022-09-18 18:16:14', '2022-09-18 18:21:12'),
(132, 111, 1010025, 'FALUDA', 1, 180, 1, 180, '2022-09-19', 'Complete', '2022-09-19 11:41:51', '2022-09-19 12:16:07'),
(133, 115, 1010025, 'MINERAL WATER 500 ML', 1, 15, 1, 30, '2022-09-19', 'Complete', '2022-09-19 11:52:18', '2022-09-19 12:16:07'),
(134, 39, 1010026, 'SET 2', 1, 250, 2, 500, '2022-09-19', 'Complete', '2022-09-19 12:27:03', '2022-09-19 13:35:03'),
(135, 115, 1010026, 'MINERAL WATER 500 ML', 1, 15, 1, 15, '2022-09-19', 'Complete', '2022-09-19 13:14:52', '2022-09-19 13:35:03'),
(137, 160, 1010026, 'CHINESE VEGETABLE (.5)', 1, 135, 1, 135, '2022-09-19', 'Complete', '2022-09-19 13:24:28', '2022-09-19 13:35:03'),
(138, 161, 1010026, 'EGG FRIED RICE (.5)', 1, 160, 1, 160, '2022-09-19', 'Complete', '2022-09-19 13:24:38', '2022-09-19 13:35:03'),
(139, 6, 1010027, 'FRENCH FRY', 1, 120, 1, 120, '2022-09-19', 'Complete', '2022-09-19 14:31:30', '2022-09-20 13:23:21'),
(140, 86, 1020016, 'BBQ CHICKEN  PIZZA (SMALL)', 2, 300, 1, 300, '2022-09-19', 'Complete', '2022-09-19 17:19:35', '2022-09-19 17:20:45'),
(142, 115, 1020016, 'MINERAL WATER 500 ML', 2, 15, 1, 15, '2022-09-19', 'Complete', '2022-09-19 17:20:00', '2022-09-19 17:20:45'),
(146, 83, 1010028, 'PASTA VASTA', 1, 450, 1, 450, '2022-09-20', 'Complete', '2022-09-20 15:48:51', '2022-09-20 16:34:43'),
(147, 114, 1010028, 'SOFT DRINKS', 1, 25, 2, 50, '2022-09-20', 'Complete', '2022-09-20 16:23:11', '2022-09-20 16:34:43'),
(148, 115, 1010028, 'MINERAL WATER 500 ML', 1, 15, 1, 30, '2022-09-20', 'Complete', '2022-09-20 16:23:48', '2022-09-20 16:34:43'),
(149, 124, 1010029, 'THAI SOUP/CORN SOUP/VEGETABLE SOUP(CUP)', 1, 150, 2, 300, '2022-09-20', 'Complete', '2022-09-20 18:07:55', '2022-09-20 18:30:33'),
(151, 115, 1010029, 'MINERAL WATER 500 ML', 1, 15, 1, 15, '2022-09-20', 'Complete', '2022-09-20 18:25:15', '2022-09-20 18:30:33'),
(152, 162, 1010029, 'FRIED WONTON (.5)', 1, 120, 1, 120, '2022-09-20', 'Complete', '2022-09-20 18:28:09', '2022-09-20 18:30:33'),
(153, 3, 1200001, 'FISH FINGER(6PCS)', 20, 300, 2, 300, '2022-09-20', 'Incomplete', '2022-09-20 20:54:51', '2022-09-20 20:54:56'),
(154, 6, 1010030, 'FRENCH FRY', 1, 120, 1, 120, '2022-09-21', 'Complete', '2022-09-21 10:49:46', '2022-09-21 11:56:16'),
(155, 118, 1010030, 'BEEF BIRYANI', 1, 250, 2, 250, '2022-09-21', 'Complete', '2022-09-21 10:50:05', '2022-09-21 11:56:16'),
(156, 114, 1010030, 'SOFT DRINKS', 1, 25, 2, 50, '2022-09-21', 'Complete', '2022-09-21 11:47:50', '2022-09-21 11:56:16'),
(157, 115, 1010030, 'MINERAL WATER 500 ML', 1, 15, 2, 30, '2022-09-21', 'Complete', '2022-09-21 11:48:00', '2022-09-21 11:56:16'),
(158, 39, 1010031, 'SET 2', 1, 250, 1, 250, '2022-09-21', 'Complete', '2022-09-21 19:00:42', '2022-09-21 20:09:05'),
(159, 164, 1010031, 'BIRIYANI OFFER', 1, 375, 2, 750, '2022-09-21', 'Complete', '2022-09-21 19:02:44', '2022-09-21 20:09:05'),
(161, 32, 1020017, 'CHICKEN BIRYANI', 0, 220, 1, 220, '2022-09-22', 'Incomplete', '2022-09-22 12:20:24', '2022-09-22 12:20:24'),
(168, 38, 1040002, 'SET 1:', 4, 220, 1, 220, '2022-09-22', 'Complete', '2022-09-22 12:27:46', '2022-09-22 12:35:10'),
(169, 118, 1040002, 'BEEF BIRYANI', 4, 250, 1, 250, '2022-09-22', 'Complete', '2022-09-22 12:27:52', '2022-09-22 12:35:10'),
(170, 114, 1040002, 'SOFT DRINKS', 4, 25, 1, 25, '2022-09-22', 'Complete', '2022-09-22 12:30:51', '2022-09-22 12:35:10'),
(171, 39, 1010032, 'SET 2', 1, 250, 3, 750, '2022-09-22', 'Complete', '2022-09-22 12:45:19', '2022-09-22 13:43:19'),
(172, 40, 1020017, 'SET 3', 2, 280, 2, 560, '2022-09-22', 'Complete', '2022-09-22 12:47:21', '2022-09-22 13:44:08'),
(173, 115, 1010032, 'MINERAL WATER 500 ML', 1, 15, 1, 15, '2022-09-22', 'Complete', '2022-09-22 12:57:35', '2022-09-22 13:43:19'),
(174, 31, 1030003, 'EGG FRIED RICE', 3, 320, 1, 320, '2022-09-22', 'Complete', '2022-09-22 13:39:38', '2022-09-22 14:26:41'),
(175, 180, 1030003, 'EGG FRIED RICE HALF', 3, 160, 1, 160, '2022-09-22', 'Complete', '2022-09-22 13:39:45', '2022-09-22 14:26:41'),
(176, 117, 1030003, 'CHICKEN CHINESE VEGETABLE', 3, 320, 1, 320, '2022-09-22', 'Complete', '2022-09-22 13:40:07', '2022-09-22 14:26:41'),
(177, 61, 1030003, 'CHICKEN DO-PIYAZA', 3, 380, 1, 380, '2022-09-22', 'Complete', '2022-09-22 13:40:37', '2022-09-22 14:26:41'),
(179, 130, 1030003, 'MINERAL WATER 2 L', 3, 25, 1, 25, '2022-09-22', 'Complete', '2022-09-22 13:47:50', '2022-09-22 14:26:41'),
(180, 130, 1010033, 'MINERAL WATER 2 L', 1, 25, 1, 25, '2022-09-22', 'Complete', '2022-09-22 14:20:34', '2022-09-22 14:29:44'),
(181, 61, 1010033, 'CHICKEN DO-PIYAZA', 1, 380, 1, 380, '2022-09-22', 'Complete', '2022-09-22 14:20:42', '2022-09-22 14:29:44'),
(182, 117, 1010033, 'CHICKEN CHINESE VEGETABLE', 1, 320, 1, 320, '2022-09-22', 'Complete', '2022-09-22 14:20:51', '2022-09-22 14:29:44'),
(183, 180, 1010033, 'EGG FRIED RICE HALF', 1, 160, 1, 160, '2022-09-22', 'Complete', '2022-09-22 14:20:59', '2022-09-22 14:29:44'),
(184, 31, 1010033, 'EGG FRIED RICE', 1, 320, 1, 320, '2022-09-22', 'Complete', '2022-09-22 14:21:06', '2022-09-22 14:29:44'),
(185, 87, 1010034, 'BBQ CHICKEN PIZZA MEDIUM', 1, 399, 1, 399, '2022-09-22', 'Complete', '2022-09-22 15:10:17', '2022-09-22 16:16:41'),
(186, 6, 1010034, 'FRENCH FRY', 1, 120, 1, 120, '2022-09-22', 'Complete', '2022-09-22 15:11:48', '2022-09-22 16:16:41'),
(187, 113, 1020018, 'REGULAR COFFEE', 2, 80, 2, 80, '2022-09-22', 'Complete', '2022-09-22 15:43:05', '2022-09-22 15:45:24'),
(188, 114, 1010034, 'SOFT DRINKS', 1, 25, 1, 25, '2022-09-22', 'Complete', '2022-09-22 15:59:19', '2022-09-22 16:16:41'),
(189, 115, 1010034, 'MINERAL WATER 500 ML', 1, 15, 1, 15, '2022-09-22', 'Complete', '2022-09-22 15:59:30', '2022-09-22 16:16:41'),
(190, 6, 1010035, 'FRENCH FRY', 1, 120, 1, 120, '2022-09-22', 'Complete', '2022-09-22 16:30:10', '2022-09-22 17:16:32'),
(191, 90, 1010035, 'FOUR SEASONS (MEDIUM)', 1, 450, 1, 450, '2022-09-22', 'Complete', '2022-09-22 16:31:12', '2022-09-22 17:16:32'),
(193, 110, 1010035, 'ICE-CREAM', 1, 120, 3, 480, '2022-09-22', 'Complete', '2022-09-22 16:32:23', '2022-09-22 17:16:32'),
(194, 115, 1010035, 'MINERAL WATER 500 ML', 1, 15, 1, 15, '2022-09-22', 'Complete', '2022-09-22 17:14:17', '2022-09-22 17:16:32'),
(195, 78, 1010036, 'CHICKEN CHEESE BURGER', 1, 160, 2, 320, '2022-09-22', 'Complete', '2022-09-22 19:12:49', '2022-09-22 19:17:25'),
(197, 90, 1010036, 'FOUR SEASONS (MEDIUM)', 1, 450, 1, 450, '2022-09-22', 'Complete', '2022-09-22 19:13:09', '2022-09-22 19:17:25'),
(199, 78, 1020019, 'CHICKEN CHEESE BURGER', 2, 160, 2, 320, '2022-09-23', 'Complete', '2022-09-23 17:59:14', '2022-09-23 18:57:18'),
(200, 124, 1020019, 'THAI SOUP/CORN SOUP/VEGETABLE SOUP(CUP)', 2, 150, 2, 150, '2022-09-23', 'Complete', '2022-09-23 17:59:37', '2022-09-23 18:57:18'),
(201, 90, 1020019, 'FOUR SEASONS (MEDIUM)', 2, 450, 1, 450, '2022-09-23', 'Complete', '2022-09-23 18:00:19', '2022-09-23 18:57:18'),
(202, 16, 1030004, 'VEGETABLE SOUP', 3, 280, 1, 280, '2022-09-23', 'Complete', '2022-09-23 18:01:20', '2022-09-23 18:03:35'),
(204, 127, 1020019, 'CHICKEN SHAWRMA', 2, 180, 1, 180, '2022-09-23', 'Complete', '2022-09-23 18:16:41', '2022-09-23 18:57:18'),
(205, 107, 1020019, 'MILK SHAKE (VANILLA/STRAWBERRY/CHOCOLATE)', 2, 199, 1, 199, '2022-09-23', 'Complete', '2022-09-23 18:37:22', '2022-09-23 18:57:18'),
(206, 114, 1020019, 'SOFT DRINKS', 2, 25, 2, 50, '2022-09-23', 'Complete', '2022-09-23 18:37:34', '2022-09-23 18:57:18'),
(207, 115, 1020019, 'MINERAL WATER 500 ML', 2, 15, 3, 45, '2022-09-23', 'Complete', '2022-09-23 18:50:24', '2022-09-23 18:57:18'),
(208, 113, 1020020, 'REGULAR COFFEE', 2, 80, 1, 80, '2022-09-23', 'Complete', '2022-09-23 19:47:21', '2022-09-23 19:48:03'),
(210, 39, 1010037, 'SET 2', 1, 250, 1, 250, '2022-09-24', 'Complete', '2022-09-24 11:55:36', '2022-09-24 13:18:03'),
(211, 115, 1010037, 'MINERAL WATER 500 ML', 1, 15, 1, 15, '2022-09-24', 'Complete', '2022-09-24 12:25:07', '2022-09-24 13:18:03'),
(212, 102, 1020021, 'CHICKEN CHOWMEIN', 2, 250, 1, 250, '2022-09-25', 'Complete', '2022-09-25 12:18:54', '2022-09-25 12:21:42'),
(213, 21, 1020021, 'SIZLING (CHICKEN/BEEF/PRAWN)', 2, 500, 1, 500, '2022-09-25', 'Complete', '2022-09-25 12:19:03', '2022-09-25 12:21:42'),
(214, 115, 1020021, 'MINERAL WATER 500 ML', 2, 15, 1, 15, '2022-09-25', 'Complete', '2022-09-25 12:19:14', '2022-09-25 12:21:42'),
(217, 115, 1010038, 'MINERAL WATER 500 ML', 1, 15, 1, 15, '2022-09-25', 'Complete', '2022-09-25 15:11:37', '2022-09-25 15:14:52'),
(218, 102, 1010038, 'CHICKEN CHOWMEIN', 1, 250, 1, 250, '2022-09-25', 'Complete', '2022-09-25 15:13:03', '2022-09-25 15:14:52'),
(219, 28, 1010038, 'SIZLING (CHICKEN/BEEF/PRAWN)', 1, 500, 1, 500, '2022-09-25', 'Complete', '2022-09-25 15:14:12', '2022-09-25 15:14:52'),
(223, 6, 1020022, 'FRENCH FRY', 2, 120, 1, 120, '2022-09-25', 'Complete', '2022-09-25 15:52:11', '2022-09-25 15:53:25'),
(224, 120, 1020023, 'HYDERABADI BIRYANI (BEEF)', 2, 280, 2, 280, '2022-09-25', 'Complete', '2022-09-25 18:04:13', '2022-09-25 18:08:13'),
(226, 115, 1020023, 'MINERAL WATER 500 ML', 2, 15, 1, 15, '2022-09-25', 'Complete', '2022-09-25 18:04:33', '2022-09-25 18:08:13'),
(227, 165, 1020024, 'SPICY BEEF PIZZA (MEDIUM)', 2, 450, 1, 450, '2022-09-25', 'Complete', '2022-09-25 18:45:37', '2022-09-25 19:20:16'),
(228, 115, 1020024, 'MINERAL WATER 500 ML', 2, 15, 1, 15, '2022-09-25', 'Complete', '2022-09-25 19:12:44', '2022-09-25 19:20:16'),
(229, 114, 1010039, 'SOFT DRINKS', 1, 25, 1, 25, '2022-09-25', 'Complete', '2022-09-25 20:05:00', '2022-09-25 20:05:21'),
(231, 160, 1010040, 'SET 2', 1, 250, 3, 250, '2022-09-26', 'Complete', '2022-09-26 12:24:28', '2022-09-26 12:37:30'),
(232, 115, 1010040, 'MINERAL WATER 500 ML', 1, 15, 1, 15, '2022-09-26', 'Complete', '2022-09-26 12:25:12', '2022-09-26 12:37:30'),
(233, 118, 1020025, 'BEEF BIRYANI', 2, 250, 3, 250, '2022-09-26', 'Complete', '2022-09-26 12:41:36', '2022-09-26 13:35:25'),
(234, 166, 1020025, 'CHICKEN ROAST', 2, 160, 3, 480, '2022-09-26', 'Complete', '2022-09-26 12:43:15', '2022-09-26 13:35:25'),
(235, 115, 1020025, 'MINERAL WATER 500 ML', 2, 15, 2, 30, '2022-09-26', 'Complete', '2022-09-26 13:33:13', '2022-09-26 13:35:25'),
(236, 114, 1020025, 'SOFT DRINKS', 2, 25, 3, 75, '2022-09-26', 'Complete', '2022-09-26 13:33:22', '2022-09-26 13:35:25'),
(238, 120, 1020026, 'HYDERABADI BIRYANI (BEEF)', 2, 280, 2, 280, '2022-09-26', 'Complete', '2022-09-26 14:05:26', '2022-09-26 15:09:25'),
(239, 128, 1020026, 'MINERAL WATER 500 ML', 2, 15, 1, 15, '2022-09-26', 'Complete', '2022-09-26 15:03:36', '2022-09-26 15:09:25'),
(240, 129, 1010041, 'SET 1 PACKAGE', 1, 215, 26, 215, '2022-09-26', 'Complete', '2022-09-26 17:45:24', '2022-09-26 19:01:08'),
(246, 87, 1010042, 'CRISPY CHICKEN BURGER', 1, 140, 1, 140, '2022-09-27', 'Complete', '2022-09-27 13:23:13', '2022-09-27 13:31:45'),
(247, 115, 1010042, 'SET 2', 1, 250, 2, 500, '2022-09-27', 'Complete', '2022-09-27 13:23:26', '2022-09-27 13:31:45'),
(248, 87, 1010043, 'CRISPY CHICKEN BURGER', 1, 140, 1, 140, '2022-09-27', 'Complete', '2022-09-27 13:37:12', '2022-09-27 13:37:41'),
(249, 115, 1010043, 'SET 2', 1, 250, 2, 500, '2022-09-27', 'Complete', '2022-09-27 13:37:23', '2022-09-27 13:37:41'),
(252, 69, 1030005, 'HYDERABADI BIRYANI (BEEF)', 3, 280, 5, 1400, '2022-09-27', 'Complete', '2022-09-27 14:04:13', '2022-09-27 14:07:32'),
(253, 129, 1030005, 'MINERAL  WATER(2L)', 3, 25, 1, 25, '2022-09-27', 'Complete', '2022-09-27 14:04:26', '2022-09-27 14:07:32'),
(254, 130, 1030005, 'SOFT DRINKS (250 ML)', 3, 25, 5, 125, '2022-09-27', 'Complete', '2022-09-27 14:04:37', '2022-09-27 14:07:32'),
(257, 132, 1030006, 'THAI SOUP/CORN SOUP/VEGETABLE SOUP(CUP)', 3, 150, 2, 300, '2022-09-27', 'Complete', '2022-09-27 19:04:09', '2022-09-27 19:05:06'),
(258, 6, 1030006, 'FRENCH FRY', 3, 120, 1, 120, '2022-09-27', 'Complete', '2022-09-27 19:04:21', '2022-09-27 19:05:06'),
(259, 132, 1030007, 'THAI SOUP/CORN SOUP/VEGETABLE SOUP(CUP)', 3, 150, 2, 300, '2022-09-27', 'Complete', '2022-09-27 19:05:36', '2022-09-27 19:06:17'),
(260, 6, 1030007, 'FRENCH FRY', 3, 120, 1, 120, '2022-09-27', 'Complete', '2022-09-27 19:05:46', '2022-09-27 19:06:17'),
(263, 88, 1020027, 'CHICKEN CHEESE BURGER', 2, 170, 1, 170, '2022-09-28', 'Complete', '2022-09-28 18:32:36', '2022-09-28 18:36:43'),
(264, 128, 1020027, 'MINERAL WATER 500 ML', 2, 15, 1, 15, '2022-09-28', 'Complete', '2022-09-28 18:32:55', '2022-09-28 18:36:43'),
(265, 130, 1020028, 'SOFT DRINKS (250 ML)', 2, 25, 2, 50, '2022-09-28', 'Complete', '2022-09-28 18:51:02', '2022-09-28 18:51:27'),
(266, 109, 1010044, 'SET 4', 1, 300, 2, 600, '2022-09-29', 'Complete', '2022-09-29 11:06:27', '2022-09-29 12:13:08'),
(267, 65, 1020029, 'CHICKEN BIRYANI', 2, 220, 2, 440, '2022-09-29', 'Complete', '2022-09-29 11:08:16', '2022-09-29 11:36:07'),
(268, 66, 1020029, 'BEEF BIRYANI', 2, 250, 6, 1500, '2022-09-29', 'Complete', '2022-09-29 11:08:26', '2022-09-29 11:36:07'),
(272, 129, 1020029, 'MINERAL  WATER(2L)', 2, 30, 1, 30, '2022-09-29', 'Complete', '2022-09-29 11:23:57', '2022-09-29 11:36:07'),
(274, 130, 1020029, 'SOFT DRINKS (250 ML)', 2, 25, 8, 200, '2022-09-29', 'Complete', '2022-09-29 11:25:23', '2022-09-29 11:36:07'),
(276, 124, 1030008, 'ICE-CREAM', 3, 120, 1, 120, '2022-09-29', 'Complete', '2022-09-29 12:00:29', '2022-09-29 12:02:04'),
(278, 130, 1010044, 'SOFT DRINKS (250 ML)', 1, 25, 1, 25, '2022-09-29', 'Complete', '2022-09-29 12:03:42', '2022-09-29 12:13:08'),
(279, 66, 1040003, 'BEEF BIRYANI', 4, 250, 2, 250, '2022-09-29', 'Complete', '2022-09-29 12:17:23', '2022-09-29 12:20:14'),
(280, 67, 1010045, 'MUTTON BIRYANI', 1, 280, 1, 280, '2022-09-29', 'Complete', '2022-09-29 12:27:54', '2022-09-29 12:42:28'),
(281, 75, 1010046, 'STEAM RICE', 1, 80, 2, 160, '2022-09-29', 'Complete', '2022-09-29 18:30:54', '2022-09-29 19:28:59'),
(282, 46, 1010046, 'THAI VEGETABLE', 1, 280, 1, 280, '2022-09-29', 'Complete', '2022-09-29 18:31:52', '2022-09-29 19:28:59'),
(283, 79, 1010046, 'BEEF KARAY CURRY', 1, 430, 1, 430, '2022-09-29', 'Complete', '2022-09-29 18:32:04', '2022-09-29 19:28:59'),
(284, 128, 1010046, 'MINERAL WATER 500 ML', 1, 15, 3, 45, '2022-09-29', 'Complete', '2022-09-29 19:20:13', '2022-09-29 19:28:59'),
(287, 87, 1010047, 'CRISPY CHICKEN BURGER', 1, 140, 1, 140, '2022-09-30', 'Complete', '2022-09-30 16:50:30', '2022-09-30 16:52:12'),
(288, 130, 1010047, 'SOFT DRINKS (250 ML)', 1, 25, 2, 50, '2022-09-30', 'Complete', '2022-09-30 16:50:54', '2022-09-30 16:52:12'),
(289, 124, 1010048, 'ICE-CREAM', 1, 120, 3, 360, '2022-09-30', 'Complete', '2022-09-30 17:13:04', '2022-09-30 17:29:23'),
(299, 6, 1020030, 'FRENCH FRY', 2, 120, 1, 120, '2022-09-30', 'Complete', '2022-09-30 18:09:51', '2022-09-30 18:14:15'),
(300, 109, 1020030, 'SET 4', 2, 300, 1, 300, '2022-09-30', 'Complete', '2022-09-30 18:10:05', '2022-09-30 18:14:15'),
(301, 115, 1050002, 'SET 2', 5, 250, 9, 2000, '2022-09-30', 'Complete', '2022-09-30 18:12:26', '2022-09-30 18:48:23'),
(302, 6, 1050002, 'FRENCH FRY', 5, 120, 1, 120, '2022-09-30', 'Complete', '2022-09-30 18:13:03', '2022-09-30 18:48:23'),
(303, 128, 1050002, 'MINERAL WATER 500 ML', 5, 15, 2, 30, '2022-09-30', 'Complete', '2022-09-30 18:45:28', '2022-09-30 18:48:23'),
(304, 88, 1020031, 'CHICKEN CHEESE BURGER', 2, 170, 1, 170, '2022-10-01', 'Complete', '2022-10-01 11:41:47', '2022-10-01 11:45:21'),
(305, 120, 1020031, 'LEMONADE', 2, 120, 1, 120, '2022-10-01', 'Complete', '2022-10-01 11:41:53', '2022-10-01 11:45:21'),
(306, 19, 1020032, 'PRAWN CHOWMEIN', 2, 300, 1, 300, '2022-10-01', 'Complete', '2022-10-01 16:52:06', '2022-10-01 17:37:33'),
(307, 120, 1020032, 'LEMONADE', 2, 120, 3, 360, '2022-10-01', 'Complete', '2022-10-01 17:28:09', '2022-10-01 17:37:33'),
(308, 128, 1020032, 'MINERAL WATER 500 ML', 2, 15, 1, 15, '2022-10-01', 'Complete', '2022-10-01 17:35:25', '2022-10-01 17:37:33'),
(309, 14, 1020033, 'SPECIAL CORN SOUP', 2, 320, 1, 320, '2022-10-01', 'Complete', '2022-10-01 18:27:14', '2022-10-01 18:56:49'),
(310, 6, 1020033, 'FRENCH FRY', 2, 120, 1, 120, '2022-10-01', 'Complete', '2022-10-01 18:27:30', '2022-10-01 18:56:49'),
(314, 6, 1030009, 'FRENCH FRY', 3, 120, 1, 120, '2022-10-02', 'Complete', '2022-10-02 16:44:46', '2022-10-02 16:45:08'),
(315, 130, 1030010, 'SOFT DRINKS (250 ML)', 3, 25, 2, 50, '2022-10-02', 'Complete', '2022-10-02 16:49:13', '2022-10-02 16:49:38'),
(316, 131, 1030010, 'THAI SOUP (CUP)', 3, 150, 1, 150, '2022-10-02', 'Complete', '2022-10-02 16:49:19', '2022-10-02 16:49:38'),
(317, 92, 1020034, 'BBQ CHICKEN  PIZZA (SMALL)', 2, 300, 1, 300, '2022-10-02', 'Complete', '2022-10-02 19:01:47', '2022-10-02 19:11:03'),
(318, 87, 1020034, 'CRISPY CHICKEN BURGER', 2, 140, 1, 140, '2022-10-02', 'Complete', '2022-10-02 19:02:21', '2022-10-02 19:11:03'),
(319, 6, 1020034, 'FRENCH FRY', 2, 120, 1, 120, '2022-10-02', 'Complete', '2022-10-02 19:02:33', '2022-10-02 19:11:03'),
(320, 66, 1020034, 'BEEF BIRYANI', 2, 250, 2, 500, '2022-10-02', 'Complete', '2022-10-02 19:02:53', '2022-10-02 19:11:03'),
(321, 129, 1020034, 'MINERAL  WATER(2L)', 2, 30, 1, 30, '2022-10-02', 'Complete', '2022-10-02 19:03:08', '2022-10-02 19:11:03'),
(322, 130, 1020034, 'SOFT DRINKS (250 ML)', 2, 25, 3, 75, '2022-10-02', 'Complete', '2022-10-02 19:03:17', '2022-10-02 19:11:03'),
(323, 12, 1030011, 'THAI CLEAR SOUP', 3, 520, 1, 520, '2022-10-02', 'Complete', '2022-10-02 19:05:05', '2022-10-02 19:06:05'),
(324, 93, 1030011, 'BBQ CHICKEN PIZZA MEDIUM', 3, 400, 1, 400, '2022-10-02', 'Complete', '2022-10-02 19:05:21', '2022-10-02 19:06:05'),
(325, 88, 1040004, 'CHICKEN CHEESE BURGER', 4, 170, 2, 170, '2022-10-02', 'Complete', '2022-10-02 19:07:13', '2022-10-02 19:48:00'),
(326, 130, 1040004, 'SOFT DRINKS (250 ML)', 4, 25, 2, 50, '2022-10-02', 'Complete', '2022-10-02 19:21:51', '2022-10-02 19:48:00'),
(327, 129, 1040004, 'MINERAL  WATER(2L)', 4, 30, 1, 30, '2022-10-02', 'Complete', '2022-10-02 19:34:22', '2022-10-02 19:48:00'),
(329, 102, 1020035, 'SPICY BEEF PIZZA (MEDIUM)', 2, 450, 1, 450, '2022-10-03', 'Complete', '2022-10-03 15:43:34', '2022-10-03 16:17:53'),
(330, 130, 1020035, 'SOFT DRINKS (250 ML)', 2, 25, 2, 50, '2022-10-03', 'Complete', '2022-10-03 16:16:45', '2022-10-03 16:17:53'),
(332, 100, 1030012, 'TANDOORI CHICKEN PIZZA (LARGE)', 3, 500, 1, 500, '2022-10-03', 'Complete', '2022-10-03 17:24:12', '2022-10-03 18:05:50'),
(333, 6, 1180001, 'FRENCH FRY', 18, 120, 1, 120, '2022-10-03', 'Complete', '2022-10-03 17:47:48', '2022-10-03 17:55:22'),
(334, 6, 1180001, 'FRENCH FRY', 18, 120, 1, 120, '2022-10-03', 'Complete', '2022-10-03 17:56:05', '2022-10-05 14:10:13'),
(335, 129, 1030012, 'MINERAL  WATER(2L)', 3, 30, 1, 30, '2022-10-03', 'Complete', '2022-10-03 18:03:22', '2022-10-03 18:05:50'),
(336, 130, 1030013, 'SOFT DRINKS (250 ML)', 3, 25, 1, 25, '2022-10-03', 'Complete', '2022-10-03 18:58:02', '2022-10-03 18:58:19'),
(337, 116, 1030014, 'SET 3', 3, 250, 2, 750, '2022-10-04', 'Complete', '2022-10-04 12:28:17', '2022-10-04 13:18:35'),
(338, 87, 1030014, 'CRISPY CHICKEN BURGER', 3, 140, 1, 140, '2022-10-04', 'Complete', '2022-10-04 12:32:10', '2022-10-04 13:18:35'),
(339, 114, 1050003, 'SET 1', 5, 200, 1, 200, '2022-10-04', 'Complete', '2022-10-04 13:33:55', '2022-10-04 14:03:06'),
(341, 69, 1010049, 'HYDERABADI BIRYANI (BEEF)', 1, 280, 2, 560, '2022-10-04', 'Complete', '2022-10-04 15:35:32', '2022-10-04 16:27:52'),
(342, 130, 1010049, 'SOFT DRINKS (250 ML)', 1, 25, 2, 50, '2022-10-04', 'Complete', '2022-10-04 16:23:37', '2022-10-04 16:27:52'),
(343, 128, 1010049, 'MINERAL WATER 500 ML', 1, 15, 1, 15, '2022-10-04', 'Complete', '2022-10-04 16:25:24', '2022-10-04 16:27:52'),
(345, 127, 1020036, 'HOT COFEE', 2, 80, 5, 400, '2022-10-04', 'Complete', '2022-10-04 17:49:13', '2022-10-04 17:56:09'),
(347, 88, 1060001, 'CHICKEN CHEESE BURGER', 6, 170, 1, 170, '2022-10-04', 'Complete', '2022-10-04 18:28:37', '2022-10-04 18:30:29'),
(348, 67, 1060002, 'MUTTON BIRYANI', 6, 280, 2, 560, '2022-10-04', 'Complete', '2022-10-04 18:47:21', '2022-10-04 18:52:26'),
(349, 130, 1060002, 'SOFT DRINKS (250 ML)', 6, 25, 3, 75, '2022-10-04', 'Complete', '2022-10-04 18:47:33', '2022-10-04 18:52:26'),
(350, 128, 1060002, 'MINERAL WATER 500 ML', 6, 15, 1, 15, '2022-10-04', 'Complete', '2022-10-04 18:47:40', '2022-10-04 18:52:26'),
(351, 2, 1030015, 'FRIED WONTON(8 PCS)', 3, 240, 1, 240, '2022-10-04', 'Complete', '2022-10-04 18:51:38', '2022-10-04 19:36:43'),
(352, 9, 1030015, 'JAFRAN SPECIAL THAI SOUP', 3, 490, 1, 490, '2022-10-04', 'Complete', '2022-10-04 18:51:43', '2022-10-04 19:36:43'),
(353, 21, 1030015, 'SPECIAL FRIED RICE (MIXED)', 3, 480, 3, 960, '2022-10-04', 'Complete', '2022-10-04 18:53:01', '2022-10-04 19:36:43'),
(354, 28, 1030015, 'CHICKEN SIZZILING', 3, 480, 3, 960, '2022-10-04', 'Complete', '2022-10-04 18:53:24', '2022-10-04 19:36:43'),
(355, 130, 1030015, 'SOFT DRINKS (250 ML)', 3, 25, 7, 175, '2022-10-04', 'Complete', '2022-10-04 19:27:11', '2022-10-04 19:36:43'),
(357, 128, 1030015, 'MINERAL WATER 500 ML', 3, 15, 3, 45, '2022-10-04', 'Complete', '2022-10-04 19:31:47', '2022-10-04 19:36:43'),
(358, 70, 1030016, 'HYDERABADI BIRYANI (MUTTON)', 3, 300, 3, 900, '2022-10-05', 'Complete', '2022-10-05 10:32:59', '2022-10-05 14:08:18'),
(359, 9, 1030016, 'JAFRAN SPECIAL THAI SOUP', 3, 490, 1, 490, '2022-10-05', 'Complete', '2022-10-05 10:33:11', '2022-10-05 14:08:18'),
(360, 115, 1030016, 'SET 2', 3, 250, 2, 500, '2022-10-05', 'Complete', '2022-10-05 10:33:21', '2022-10-05 14:08:18'),
(361, 150, 1050004, 'HYDERABADI BIRYANI (MUTTON)', 5, 320, 13, 4160, '2022-10-05', 'Complete', '2022-10-05 11:05:03', '2022-10-05 14:53:40'),
(362, 151, 1050004, 'EGG KORMA', 5, 40, 13, 520, '2022-10-05', 'Complete', '2022-10-05 11:07:51', '2022-10-05 14:53:40'),
(363, 130, 1050004, 'SOFT DRINKS (250 ML)', 5, 25, 15, 325, '2022-10-05', 'Complete', '2022-10-05 11:08:01', '2022-10-05 14:53:40'),
(364, 128, 1050004, 'MINERAL WATER 500 ML', 5, 15, 1, 195, '2022-10-05', 'Complete', '2022-10-05 11:08:19', '2022-10-05 14:53:40'),
(365, 129, 1050004, 'MINERAL  WATER(2L)', 5, 30, 1, 30, '2022-10-05', 'Complete', '2022-10-05 13:49:27', '2022-10-05 14:53:40'),
(366, 128, 1060003, 'MINERAL WATER 500 ML', 6, 15, 3, 45, '2022-10-05', 'Complete', '2022-10-05 14:11:23', '2022-10-05 14:11:37'),
(367, 65, 1010050, 'CHICKEN BIRYANI', 1, 220, 1, 220, '2022-10-05', 'Complete', '2022-10-05 14:44:46', '2022-10-05 14:47:27'),
(368, 66, 1010050, 'BEEF BIRYANI', 1, 250, 2, 500, '2022-10-05', 'Complete', '2022-10-05 14:44:55', '2022-10-05 14:47:27'),
(369, 129, 1010050, 'MINERAL  WATER(2L)', 1, 30, 1, 30, '2022-10-05', 'Complete', '2022-10-05 14:45:15', '2022-10-05 14:47:27'),
(370, 130, 1010050, 'SOFT DRINKS (250 ML)', 1, 25, 3, 75, '2022-10-05', 'Complete', '2022-10-05 14:45:25', '2022-10-05 14:47:27'),
(371, 6, 1010051, 'FRENCH FRY', 1, 120, 1, 120, '2022-10-05', 'Complete', '2022-10-05 15:26:33', '2022-10-05 17:07:42'),
(372, 120, 1010051, 'LEMONADE', 1, 120, 2, 240, '2022-10-05', 'Complete', '2022-10-05 15:26:49', '2022-10-05 17:07:42'),
(373, 127, 1010051, 'HOT COFEE', 1, 80, 2, 160, '2022-10-05', 'Complete', '2022-10-05 15:27:43', '2022-10-05 17:07:42'),
(374, 115, 1010052, 'SET 2', 1, 250, 3, 750, '2022-10-05', 'Complete', '2022-10-05 18:07:29', '2022-10-05 18:47:41'),
(375, 128, 1010052, 'MINERAL WATER 500 ML', 1, 15, 1, 15, '2022-10-05', 'Complete', '2022-10-05 18:43:39', '2022-10-05 18:47:41'),
(376, 117, 1020037, 'SET 4', 2, 300, 2, 300, '2022-10-06', 'Complete', '2022-10-06 12:38:08', '2022-10-06 13:45:31'),
(377, 22, 1030017, 'CHICKEN FRIED RICE', 3, 360, 1, 360, '2022-10-06', 'Complete', '2022-10-06 12:38:55', '2022-10-06 13:07:34'),
(378, 43, 1030017, 'CHINESE VEGETABLE', 3, 270, 1, 270, '2022-10-06', 'Complete', '2022-10-06 12:39:06', '2022-10-06 13:07:34'),
(379, 128, 1030017, 'MINERAL WATER 500 ML', 3, 15, 1, 15, '2022-10-06', 'Complete', '2022-10-06 12:59:57', '2022-10-06 13:07:34'),
(380, 128, 1010053, 'MINERAL WATER 500 ML', 1, 15, 2, 30, '2022-10-06', 'Complete', '2022-10-06 13:07:47', '2022-10-06 13:08:02'),
(381, 93, 1010054, 'BBQ CHICKEN PIZZA MEDIUM', 1, 400, 1, 400, '2022-10-06', 'Complete', '2022-10-06 13:13:17', '2022-10-06 13:48:29'),
(382, 128, 1020037, 'MINERAL WATER 500 ML', 2, 15, 1, 15, '2022-10-06', 'Complete', '2022-10-06 13:34:59', '2022-10-06 13:45:31'),
(383, 117, 1020038, 'SET 4', 2, 300, 2, 600, '2022-10-06', 'Complete', '2022-10-06 13:46:09', '2022-10-06 13:46:33'),
(384, 128, 1020038, 'MINERAL WATER 500 ML', 2, 15, 1, 15, '2022-10-06', 'Complete', '2022-10-06 13:46:15', '2022-10-06 13:46:33'),
(385, 131, 1010055, 'SPECIAL FRIED WONTON (4 PCS)', 1, 145, 1, 145, '2022-10-06', 'Complete', '2022-10-06 18:51:28', '2022-10-06 19:25:16'),
(386, 132, 1010055, 'THAI SOUP/CORN SOUP/VEGETABLE SOUP(CUP)', 1, 150, 2, 150, '2022-10-06', 'Complete', '2022-10-06 18:51:34', '2022-10-06 19:25:16'),
(387, 21, 1040005, 'SPECIAL FRIED RICE (MIXED)', 4, 480, 2, 960, '2022-10-06', 'Complete', '2022-10-06 20:10:29', '2022-10-06 20:26:21'),
(388, 44, 1040005, 'CHICKEN CHINESE VEGETABLE', 4, 320, 2, 640, '2022-10-06', 'Complete', '2022-10-06 20:10:41', '2022-10-06 20:26:21'),
(389, 121, 1040005, 'MILK SHAKE (VANILLA/STRAWBERRY/CHOCOLATE)', 4, 180, 3, 540, '2022-10-06', 'Complete', '2022-10-06 20:10:58', '2022-10-06 20:26:21'),
(390, 129, 1040005, 'MINERAL  WATER(2L)', 4, 30, 1, 30, '2022-10-06', 'Complete', '2022-10-06 20:11:29', '2022-10-06 20:26:21'),
(395, 130, 1040005, 'SOFT DRINKS (250 ML)', 4, 25, 2, 50, '2022-10-06', 'Complete', '2022-10-06 20:24:57', '2022-10-06 20:26:21'),
(396, 6, 1010056, 'FRENCH FRY', 1, 120, 2, 240, '2022-10-07', 'Complete', '2022-10-07 16:08:14', '2022-10-07 20:43:31'),
(397, 124, 1010056, 'ICE-CREAM', 1, 120, 2, 240, '2022-10-07', 'Complete', '2022-10-07 16:08:28', '2022-10-07 20:43:31'),
(398, 116, 1030018, 'SET 3', 3, 250, 18, 4000, '2022-10-07', 'Complete', '2022-10-07 17:39:37', '2022-10-07 18:49:58'),
(399, 128, 1030018, 'MINERAL WATER 500 ML', 3, 15, 14, 210, '2022-10-07', 'Complete', '2022-10-07 18:44:14', '2022-10-07 18:49:58'),
(400, 129, 1030018, 'MINERAL  WATER(2L)', 3, 30, 2, 60, '2022-10-07', 'Complete', '2022-10-07 18:44:23', '2022-10-07 18:49:58'),
(401, 87, 1030019, 'CRISPY CHICKEN BURGER', 3, 140, 1, 140, '2022-10-07', 'Complete', '2022-10-07 19:49:41', '2022-10-07 19:51:13'),
(403, 153, 1070001, 'PACAGE KACCHI', 7, 445, 72, 32040, '2022-10-07', 'Complete', '2022-10-07 20:23:41', '2022-10-07 20:27:00'),
(404, 69, 1070002, 'HYDERABADI BIRYANI (BEEF)', 7, 280, 1, 280, '2022-10-07', 'Complete', '2022-10-07 20:35:32', '2022-10-07 20:36:14'),
(405, 130, 1070002, 'SOFT DRINKS (250 ML)', 7, 25, 2, 50, '2022-10-07', 'Complete', '2022-10-07 20:35:56', '2022-10-07 20:36:14'),
(406, 128, 1010056, 'MINERAL WATER 500 ML', 1, 15, 3, 45, '2022-10-07', 'Complete', '2022-10-07 20:42:42', '2022-10-07 20:43:31'),
(407, 88, 1020039, 'CHICKEN CHEESE BURGER', 2, 170, 2, 170, '2022-10-08', 'Complete', '2022-10-08 11:55:45', '2022-10-08 13:25:11'),
(408, 90, 1020039, 'BEEF CHEESE BURGER', 2, 160, 1, 160, '2022-10-08', 'Complete', '2022-10-08 11:55:50', '2022-10-08 13:25:11'),
(409, 9, 1030020, 'JAFRAN SPECIAL THAI SOUP', 3, 490, 1, 490, '2022-10-08', 'Complete', '2022-10-08 12:17:51', '2022-10-08 13:49:43'),
(410, 133, 1030020, 'FRENCH FRY (.5)', 3, 60, 1, 60, '2022-10-08', 'Complete', '2022-10-08 12:22:06', '2022-10-08 13:49:43'),
(411, 21, 1030020, 'SPECIAL FRIED RICE (MIXED)', 3, 480, 1, 480, '2022-10-08', 'Complete', '2022-10-08 12:22:34', '2022-10-08 13:49:43'),
(412, 34, 1030020, 'BEEF SIZZLING', 3, 500, 1, 500, '2022-10-08', 'Complete', '2022-10-08 12:23:06', '2022-10-08 13:49:43'),
(413, 46, 1030020, 'THAI VEGETABLE', 3, 280, 1, 280, '2022-10-08', 'Complete', '2022-10-08 12:23:23', '2022-10-08 13:49:43'),
(414, 134, 1030020, 'SPECIAL FRIED RICE (MIXED) (.5)', 3, 240, 1, 240, '2022-10-08', 'Complete', '2022-10-08 12:26:39', '2022-10-08 13:49:43'),
(415, 135, 1030020, 'THAI FRIED CHICKEN (4 PCS)', 3, 225, 1, 225, '2022-10-08', 'Complete', '2022-10-08 12:28:09', '2022-10-08 13:49:43'),
(416, 130, 1020039, 'SOFT DRINKS (250 ML)', 2, 25, 3, 50, '2022-10-08', 'Complete', '2022-10-08 12:33:35', '2022-10-08 13:25:11'),
(417, 87, 1040006, 'CRISPY CHICKEN BURGER', 4, 140, 3, 420, '2022-10-08', 'Complete', '2022-10-08 12:51:18', '2022-10-08 13:30:15'),
(418, 130, 1040006, 'SOFT DRINKS (250 ML)', 4, 25, 2, 50, '2022-10-08', 'Complete', '2022-10-08 13:25:41', '2022-10-08 13:30:15'),
(419, 128, 1040006, 'MINERAL WATER 500 ML', 4, 15, 1, 15, '2022-10-08', 'Complete', '2022-10-08 13:28:26', '2022-10-08 13:30:15'),
(420, 130, 1030020, 'SOFT DRINKS (250 ML)', 3, 25, 6, 150, '2022-10-08', 'Complete', '2022-10-08 13:35:09', '2022-10-08 13:49:43'),
(421, 128, 1030020, 'MINERAL WATER 500 ML', 3, 15, 1, 15, '2022-10-08', 'Complete', '2022-10-08 13:35:20', '2022-10-08 13:49:43'),
(422, 122, 1010057, 'COLD COFFEE', 1, 150, 3, 450, '2022-10-08', 'Complete', '2022-10-08 16:15:22', '2022-10-08 16:59:07'),
(423, 127, 1010057, 'HOT COFEE', 1, 80, 1, 80, '2022-10-08', 'Complete', '2022-10-08 16:15:29', '2022-10-08 16:59:07'),
(424, 88, 1040007, 'CHICKEN CHEESE BURGER', 4, 170, 1, 170, '2022-10-08', 'Complete', '2022-10-08 17:02:20', '2022-10-08 17:04:46'),
(428, 114, 1010058, 'SET 1', 1, 200, 1, 200, '2022-10-08', 'Complete', '2022-10-08 19:24:48', '2022-10-08 19:27:39'),
(432, 88, 1020040, 'CHICKEN CHEESE BURGER', 2, 170, 1, 170, '2022-10-09', 'Complete', '2022-10-09 11:42:08', '2022-10-09 11:47:11'),
(433, 93, 1010059, 'BBQ CHICKEN PIZZA MEDIUM', 1, 400, 1, 400, '2022-10-09', 'Complete', '2022-10-09 11:48:21', '2022-10-09 11:48:58'),
(436, 3, 1010060, 'FISH FINGER(6PCS)', 1, 300, 1, 300, '2022-10-09', 'Complete', '2022-10-09 18:14:27', '2022-10-09 18:25:42'),
(441, 160, 1010060, 'THAI SOUP (THICK)', 1, 150, 2, 150, '2022-10-09', 'Complete', '2022-10-09 18:18:47', '2022-10-09 18:25:42'),
(443, 19, 1010061, 'PRAWN CHOWMEIN', 1, 300, 1, 300, '2022-10-09', 'Complete', '2022-10-09 18:52:57', '2022-10-09 19:19:40'),
(444, 128, 1010061, 'MINERAL WATER 500 ML', 1, 15, 1, 15, '2022-10-09', 'Complete', '2022-10-09 19:12:26', '2022-10-09 19:19:40'),
(446, 9, 1010062, 'JAFRAN SPECIAL THAI SOUP', 1, 490, 3, 490, '2022-10-09', 'Complete', '2022-10-09 19:23:23', '2022-10-09 20:14:25'),
(447, 1, 1010062, 'SPECIAL FRIED WONTON(8 PCS)', 1, 290, 2, 290, '2022-10-09', 'Complete', '2022-10-09 19:23:50', '2022-10-09 20:14:25'),
(448, 128, 1010062, 'MINERAL WATER 500 ML', 1, 15, 2, 30, '2022-10-09', 'Complete', '2022-10-09 20:05:16', '2022-10-09 20:14:25'),
(449, 162, 1010063, 'MUTTON KACCI', 1, 380, 1, 380, '2022-10-10', 'Complete', '2022-10-10 12:21:47', '2022-10-10 12:41:52'),
(452, 6, 1030021, 'FRENCH FRY', 3, 120, 1, 120, '2022-10-10', 'Complete', '2022-10-10 18:33:27', '2022-10-10 19:05:13'),
(453, 9, 1010064, 'JAFRAN SPECIAL THAI SOUP', 1, 490, 1, 490, '2022-10-10', 'Complete', '2022-10-10 19:05:50', '2022-10-10 20:50:37'),
(454, 170, 1010064, 'special wonton(4 pcs)', 1, 150, 1, 150, '2022-10-10', 'Complete', '2022-10-10 19:07:29', '2022-10-10 20:50:37'),
(455, 22, 1010064, 'CHICKEN FRIED RICE', 1, 360, 1, 360, '2022-10-10', 'Complete', '2022-10-10 19:08:38', '2022-10-10 20:50:37'),
(456, 28, 1010064, 'CHICKEN SIZZILING', 1, 480, 1, 480, '2022-10-10', 'Complete', '2022-10-10 19:08:46', '2022-10-10 20:50:37'),
(458, 24, 1020041, 'EGG FRIED RICE', 2, 320, 4, 1280, '2022-10-10', 'Complete', '2022-10-10 19:41:58', '2022-10-10 20:54:47'),
(459, 32, 1020041, 'CHICKEN DO-PIYAZA', 2, 380, 3, 1140, '2022-10-10', 'Complete', '2022-10-10 19:42:24', '2022-10-10 20:54:47'),
(460, 43, 1020041, 'CHINESE VEGETABLE', 2, 270, 2, 270, '2022-10-10', 'Complete', '2022-10-10 19:42:32', '2022-10-10 20:54:47'),
(461, 130, 1010064, 'SOFT DRINKS (250 ML)', 1, 25, 7, 25, '2022-10-10', 'Complete', '2022-10-10 19:54:30', '2022-10-10 20:50:37'),
(462, 171, 1010064, 'CHINESE VEGETABLE (1/2)', 1, 140, 1, 140, '2022-10-10', 'Complete', '2022-10-10 20:00:26', '2022-10-10 20:50:37'),
(463, 129, 1020041, 'MINERAL  WATER(2L)', 2, 30, 2, 60, '2022-10-10', 'Complete', '2022-10-10 20:28:09', '2022-10-10 20:54:47'),
(466, 24, 1040008, 'EGG FRIED RICE', 4, 320, 4, 1280, '2022-10-10', 'Complete', '2022-10-10 20:38:34', '2022-10-10 20:41:06'),
(467, 43, 1040008, 'CHINESE VEGETABLE', 4, 270, 2, 540, '2022-10-10', 'Complete', '2022-10-10 20:39:09', '2022-10-10 20:41:06'),
(468, 32, 1040008, 'CHICKEN DO-PIYAZA', 4, 380, 3, 1140, '2022-10-10', 'Complete', '2022-10-10 20:39:22', '2022-10-10 20:41:06'),
(469, 129, 1040008, 'MINERAL  WATER(2L)', 4, 30, 2, 60, '2022-10-10', 'Complete', '2022-10-10 20:39:53', '2022-10-10 20:41:06'),
(477, 115, 1030022, 'SET 2', 3, 250, 4, 1000, '2022-10-11', 'Complete', '2022-10-11 11:27:45', '2022-10-11 11:28:42'),
(481, 69, 1020042, 'HYDERABADI BIRYANI (BEEF)', 2, 280, 2, 560, '2022-10-11', 'Complete', '2022-10-11 12:59:14', '2022-10-11 13:44:48'),
(482, 125, 1030023, 'FALUDA', 3, 180, 1, 180, '2022-10-11', 'Complete', '2022-10-11 13:05:15', '2022-10-11 13:05:50'),
(486, 128, 1020042, 'MINERAL WATER 500 ML', 2, 15, 1, 15, '2022-10-11', 'Complete', '2022-10-11 13:40:58', '2022-10-11 13:44:48'),
(487, 130, 1020042, 'SOFT DRINKS (250 ML)', 2, 25, 2, 25, '2022-10-11', 'Complete', '2022-10-11 13:41:05', '2022-10-11 13:44:48'),
(495, 125, 1050005, 'FALUDA', 5, 180, 1, 180, '2022-10-11', 'Complete', '2022-10-11 18:40:11', '2022-10-11 18:45:39'),
(496, 119, 1050005, 'FRESH JUICE (SEASONAL FRUITS)', 5, 150, 1, 150, '2022-10-11', 'Complete', '2022-10-11 18:40:37', '2022-10-11 18:45:39'),
(497, 116, 1050006, 'SET 3', 5, 250, 2, 500, '2022-10-12', 'Complete', '2022-10-12 14:36:50', '2022-10-12 15:25:42'),
(499, 123, 1020043, 'CHOCOLATE COLD COFFEE', 2, 180, 2, 360, '2022-10-12', 'Complete', '2022-10-12 17:30:05', '2022-10-12 17:40:40'),
(500, 121, 1020043, 'MILK SHAKE (VANILLA/STRAWBERRY/CHOCOLATE)', 2, 180, 1, 180, '2022-10-12', 'Complete', '2022-10-12 17:30:14', '2022-10-12 17:40:40'),
(506, 119, 1010065, 'FRESH JUICE (SEASONAL FRUITS)', 1, 150, 1, 150, '2022-10-13', 'Complete', '2022-10-13 14:22:55', '2022-10-13 16:16:55'),
(512, 125, 1020044, 'FALUDA', 2, 180, 1, 180, '2022-10-13', 'Complete', '2022-10-13 16:33:49', '2022-10-13 16:37:50'),
(513, 18, 1020044, 'CHICKEN CHOWMEIN', 2, 280, 1, 280, '2022-10-13', 'Complete', '2022-10-13 16:33:56', '2022-10-13 16:37:50'),
(514, 130, 1010066, 'SOFT DRINKS (250 ML)', 1, 25, 1, 25, '2022-10-13', 'Complete', '2022-10-13 19:32:00', '2022-10-13 19:32:27'),
(516, 180, 1010067, 'Dom Biriany (Beef)', 1, 299, 2, 299, '2022-10-14', 'Complete', '2022-10-14 13:43:34', '2022-10-14 14:22:05'),
(517, 130, 1010067, 'SOFT DRINKS (250 ML)', 1, 25, 2, 50, '2022-10-14', 'Complete', '2022-10-14 14:17:22', '2022-10-14 14:22:05'),
(519, 128, 1010067, 'MINERAL WATER 500 ML', 1, 15, 1, 15, '2022-10-14', 'Complete', '2022-10-14 14:17:53', '2022-10-14 14:22:05'),
(522, 122, 1020045, 'COLD COFFEE', 2, 150, 1, 150, '2022-10-14', 'Complete', '2022-10-14 15:40:02', '2022-10-14 15:44:12'),
(523, 90, 1010068, 'BEEF CHEESE BURGER', 1, 200, 2, 400, '2022-10-14', 'Complete', '2022-10-14 15:53:42', '2022-10-14 16:14:57'),
(525, 123, 1030024, 'CHOCOLATE COLD COFFEE', 3, 180, 1, 180, '2022-10-14', 'Complete', '2022-10-14 16:00:06', '2022-10-14 17:04:50'),
(526, 181, 1030024, 'Chicken shwarma', 3, 160, 1, 160, '2022-10-14', 'Complete', '2022-10-14 16:00:12', '2022-10-14 17:04:50'),
(528, 9, 1040009, 'JAFRAN SPECIAL THAI SOUP', 4, 490, 1, 490, '2022-10-14', 'Complete', '2022-10-14 16:24:51', '2022-10-14 17:01:01'),
(529, 6, 1040009, 'FRENCH FRY', 4, 120, 1, 120, '2022-10-14', 'Complete', '2022-10-14 16:35:55', '2022-10-14 17:01:01'),
(531, 128, 1040009, 'MINERAL WATER 500 ML', 4, 15, 1, 15, '2022-10-14', 'Complete', '2022-10-14 16:54:30', '2022-10-14 17:01:01'),
(532, 124, 1010069, 'ICE-CREAM', 1, 120, 1, 120, '2022-10-14', 'Complete', '2022-10-14 17:50:48', '2022-10-14 17:51:12'),
(533, 181, 1010070, 'Chicken shwarma', 1, 160, 1, 160, '2022-10-14', 'Complete', '2022-10-14 17:58:31', '2022-10-14 18:44:56'),
(534, 182, 1010070, 'Tea', 1, 40, 2, 80, '2022-10-14', 'Complete', '2022-10-14 18:00:35', '2022-10-14 18:44:56'),
(536, 128, 1010070, 'MINERAL WATER 500 ML', 1, 15, 1, 15, '2022-10-14', 'Complete', '2022-10-14 18:01:21', '2022-10-14 18:44:56'),
(538, 69, 1010071, 'HYDERABADI BIRYANI (BEEF)', 1, 280, 1, 280, '2022-10-14', 'Complete', '2022-10-14 19:13:53', '2022-10-14 19:57:09'),
(539, 125, 1010071, 'FALUDA', 1, 180, 1, 180, '2022-10-14', 'Complete', '2022-10-14 19:18:29', '2022-10-14 19:57:09'),
(540, 128, 1010071, 'MINERAL WATER 500 ML', 1, 15, 1, 15, '2022-10-14', 'Complete', '2022-10-14 19:56:00', '2022-10-14 19:57:09'),
(541, 130, 1010071, 'SOFT DRINKS (250 ML)', 1, 25, 1, 25, '2022-10-14', 'Complete', '2022-10-14 19:56:35', '2022-10-14 19:57:09'),
(544, 69, 1010072, 'HYDERABADI BIRYANI (BEEF)', 1, 280, 1, 280, '2022-10-15', 'Complete', '2022-10-15 12:16:57', '2022-10-15 12:54:18'),
(545, 88, 1010072, 'CHICKEN CHEESE BURGER', 1, 170, 2, 340, '2022-10-15', 'Complete', '2022-10-15 12:17:18', '2022-10-15 12:54:18'),
(546, 122, 1010072, 'COLD COFFEE', 1, 150, 1, 150, '2022-10-15', 'Complete', '2022-10-15 12:41:54', '2022-10-15 12:54:18'),
(547, 127, 1010072, 'HOT COFEE', 1, 80, 1, 80, '2022-10-15', 'Complete', '2022-10-15 12:42:04', '2022-10-15 12:54:18'),
(548, 6, 1010073, 'FRENCH FRY', 1, 120, 1, 120, '2022-10-15', 'Complete', '2022-10-15 17:11:44', '2022-10-15 17:25:04'),
(549, 160, 1010073, 'THAI SOUP (THICK)', 1, 150, 2, 300, '2022-10-15', 'Complete', '2022-10-15 17:12:09', '2022-10-15 17:25:04'),
(550, 130, 1010073, 'SOFT DRINKS (250 ML)', 1, 25, 1, 25, '2022-10-15', 'Complete', '2022-10-15 17:24:10', '2022-10-15 17:25:04'),
(551, 9, 1010074, 'JAFRAN SPECIAL THAI SOUP', 1, 490, 1, 490, '2022-10-15', 'Complete', '2022-10-15 17:51:26', '2022-10-15 18:37:58'),
(552, 1, 1010074, 'SPECIAL FRIED WONTON(8 PCS)', 1, 290, 1, 290, '2022-10-15', 'Complete', '2022-10-15 17:51:35', '2022-10-15 18:37:58'),
(556, 122, 1010074, 'COLD COFFEE', 1, 150, 3, 450, '2022-10-15', 'Complete', '2022-10-15 18:13:47', '2022-10-15 18:37:58'),
(557, 110, 1010074, 'BEEF SHWARMA', 1, 200, 3, 200, '2022-10-15', 'Complete', '2022-10-15 18:15:51', '2022-10-15 18:37:58'),
(559, 181, 1010074, 'Chicken shwarma', 1, 160, 2, 160, '2022-10-15', 'Complete', '2022-10-15 18:16:30', '2022-10-15 18:37:58'),
(561, 130, 1020046, 'SOFT DRINKS (250 ML)', 2, 25, 3, 25, '2022-10-15', 'Complete', '2022-10-15 18:34:01', '2022-10-15 18:37:39');
INSERT INTO `tablecarts` (`id`, `food_number`, `order_id`, `fname`, `tablenumber`, `amount`, `product_quantity`, `tamount`, `date`, `status`, `created_at`, `updated_at`) VALUES
(563, 128, 1020046, 'MINERAL WATER 500 ML', 2, 15, 1, 15, '2022-10-15', 'Complete', '2022-10-15 18:34:31', '2022-10-15 18:37:39'),
(564, 125, 1010075, 'FALUDA', 1, 180, 1, 180, '2022-10-16', 'Complete', '2022-10-16 08:40:12', '2022-10-16 08:42:17'),
(565, 66, 1010076, 'BEEF BIRYANI', 1, 250, 4, 1000, '2022-10-16', 'Complete', '2022-10-16 11:50:52', '2022-10-16 12:49:41'),
(566, 128, 1010076, 'MINERAL WATER 500 ML', 1, 15, 3, 15, '2022-10-16', 'Complete', '2022-10-16 12:47:43', '2022-10-16 12:49:41'),
(567, 130, 1010076, 'SOFT DRINKS (250 ML)', 1, 25, 2, 50, '2022-10-16', 'Complete', '2022-10-16 12:48:03', '2022-10-16 12:49:41'),
(568, 6, 1010077, 'FRENCH FRY', 1, 120, 1, 120, '2022-10-16', 'Complete', '2022-10-16 16:53:08', '2022-10-16 16:53:53'),
(569, 6, 1010078, 'FRENCH FRY', 1, 120, 2, 240, '2022-10-16', 'Complete', '2022-10-16 18:33:16', '2022-10-16 18:36:56'),
(570, 128, 1010078, 'MINERAL WATER 500 ML', 1, 15, 1, 15, '2022-10-16', 'Complete', '2022-10-16 18:33:51', '2022-10-16 18:36:56'),
(571, 6, 1010079, 'FRENCH FRY', 1, 120, 1, 120, '2022-10-16', 'Complete', '2022-10-16 20:15:57', '2022-10-16 20:18:06'),
(573, 10, 1010079, 'THAI SOUP (THICK)', 1, 450, 1, 450, '2022-10-16', 'Complete', '2022-10-16 20:16:27', '2022-10-16 20:18:06'),
(574, 130, 1010079, 'SOFT DRINKS (250 ML)', 1, 25, 2, 50, '2022-10-16', 'Complete', '2022-10-16 20:16:40', '2022-10-16 20:18:06'),
(575, 128, 1010079, 'MINERAL WATER 500 ML', 1, 15, 1, 15, '2022-10-16', 'Complete', '2022-10-16 20:16:46', '2022-10-16 20:18:06'),
(576, 6, 1010080, 'FRENCH FRY', 1, 120, 1, 120, '2022-10-16', 'Complete', '2022-10-16 20:20:03', '2022-10-16 20:21:21'),
(577, 10, 1010080, 'THAI SOUP (THICK)', 1, 450, 1, 450, '2022-10-16', 'Complete', '2022-10-16 20:20:12', '2022-10-16 20:21:21'),
(578, 128, 1010080, 'MINERAL WATER 500 ML', 1, 15, 1, 15, '2022-10-16', 'Complete', '2022-10-16 20:20:20', '2022-10-16 20:21:21'),
(579, 130, 1010080, 'SOFT DRINKS (250 ML)', 1, 25, 2, 50, '2022-10-16', 'Complete', '2022-10-16 20:20:28', '2022-10-16 20:21:21'),
(587, 124, 1010081, 'ICE-CREAM', 1, 120, 2, 240, '2022-10-17', 'Complete', '2022-10-17 14:33:29', '2022-10-17 14:34:06'),
(588, 69, 1010082, 'HYDERABADI BIRYANI (BEEF)', 1, 280, 2, 560, '2022-10-17', 'Complete', '2022-10-17 15:21:14', '2022-10-17 16:06:05'),
(589, 128, 1010082, 'MINERAL WATER 500 ML', 1, 15, 1, 15, '2022-10-17', 'Complete', '2022-10-17 16:00:47', '2022-10-17 16:06:05'),
(590, 130, 1010082, 'SOFT DRINKS (250 ML)', 1, 25, 1, 25, '2022-10-17', 'Complete', '2022-10-17 16:01:02', '2022-10-17 16:06:05'),
(595, 181, 1010083, 'Chicken shwarma', 1, 160, 1, 160, '2022-10-17', 'Complete', '2022-10-17 17:16:09', '2022-10-17 17:16:43'),
(596, 17, 1010084, 'JAFRAN SPECIAL CHOWMEIN', 1, 380, 1, 380, '2022-10-17', 'Complete', '2022-10-17 17:18:28', '2022-10-17 17:19:46'),
(603, 69, 1010085, 'HYDERABADI BIRYANI (BEEF)', 1, 280, 2, 560, '2022-10-17', 'Complete', '2022-10-17 18:57:51', '2022-10-17 19:05:48'),
(606, 69, 1010086, 'HYDERABADI BIRYANI (BEEF)', 1, 280, 3, 840, '2022-10-18', 'Complete', '2022-10-18 11:23:46', '2022-10-18 12:28:11'),
(607, 128, 1010086, 'MINERAL WATER 500 ML', 1, 15, 1, 15, '2022-10-18', 'Complete', '2022-10-18 11:45:42', '2022-10-18 12:28:11'),
(608, 130, 1010086, 'SOFT DRINKS (250 ML)', 1, 25, 3, 25, '2022-10-18', 'Complete', '2022-10-18 11:45:58', '2022-10-18 12:28:11'),
(609, 66, 1010087, 'BEEF BIRYANI', 1, 250, 2, 250, '2022-10-18', 'Complete', '2022-10-18 12:28:29', '2022-10-18 13:42:35'),
(610, 130, 1010087, 'SOFT DRINKS (250 ML)', 1, 25, 1, 25, '2022-10-18', 'Complete', '2022-10-18 13:24:03', '2022-10-18 13:42:35'),
(611, 128, 1010087, 'MINERAL WATER 500 ML', 1, 15, 1, 15, '2022-10-18', 'Complete', '2022-10-18 13:24:09', '2022-10-18 13:42:35'),
(612, 69, 1010088, 'HYDERABADI BIRYANI (BEEF)', 1, 280, 5, 1400, '2022-10-18', 'Complete', '2022-10-18 13:42:48', '2022-10-18 14:36:18'),
(613, 93, 1020047, 'BBQ CHICKEN PIZZA MEDIUM', 2, 400, 1, 400, '2022-10-18', 'Complete', '2022-10-18 14:11:18', '2022-10-18 14:11:44'),
(614, 130, 1010088, 'SOFT DRINKS (250 ML)', 1, 25, 3, 75, '2022-10-18', 'Complete', '2022-10-18 14:29:25', '2022-10-18 14:36:18'),
(615, 127, 1030025, 'HOT COFEE', 3, 80, 4, 320, '2022-10-18', 'Complete', '2022-10-18 17:07:07', '2022-10-18 17:08:19'),
(616, 152, 1010089, 'PACAGE KACCHI', 1, 362, 1, 362, '2022-10-18', 'Complete', '2022-10-18 18:14:03', '2022-10-18 18:27:36'),
(623, 108, 1060004, 'PASTA VASTA (OVEN BAKED)', 6, 450, 1, 450, '2022-10-18', 'Complete', '2022-10-18 19:46:14', '2022-10-18 19:52:35'),
(625, 92, 1060005, 'BBQ CHICKEN  PIZZA (SMALL)', 6, 300, 1, 300, '2022-10-19', 'Complete', '2022-10-19 11:02:18', '2022-10-19 11:44:54'),
(626, 130, 1060005, 'SOFT DRINKS (250 ML)', 6, 25, 2, 50, '2022-10-19', 'Complete', '2022-10-19 11:40:14', '2022-10-19 11:44:54'),
(629, 6, 1010090, 'FRENCH FRY', 1, 120, 1, 120, '2022-10-19', 'Complete', '2022-10-19 15:51:06', '2022-10-19 18:50:07'),
(630, 6, 1040010, 'FRENCH FRY', 4, 120, 1, 120, '2022-10-19', 'Complete', '2022-10-19 18:09:44', '2022-10-19 18:10:28'),
(632, 6, 1010091, 'FRENCH FRY', 1, 120, 1, 120, '2022-10-19', 'Complete', '2022-10-19 18:50:28', '2022-10-19 18:51:49'),
(633, 6, 1010092, 'FRENCH FRY', 1, 120, 1, 120, '2022-10-19', 'Complete', '2022-10-19 18:52:00', '2022-10-19 18:52:30'),
(635, 69, 1010093, 'HYDERABADI BIRYANI (BEEF)', 1, 280, 3, 280, '2022-10-19', 'Complete', '2022-10-19 19:24:01', '2022-10-19 19:36:28'),
(637, 128, 1010094, 'MINERAL WATER 500 ML', 1, 15, 1, 15, '2022-10-20', 'Complete', '2022-10-20 10:59:18', '2022-10-20 11:02:37'),
(638, 18, 1010095, 'CHICKEN CHOWMEIN', 1, 280, 1, 280, '2022-10-20', 'Complete', '2022-10-20 11:46:45', '2022-10-20 12:14:55'),
(639, 130, 1010095, 'SOFT DRINKS (250 ML)', 1, 25, 1, 50, '2022-10-20', 'Complete', '2022-10-20 11:47:01', '2022-10-20 12:14:55'),
(640, 128, 1010095, 'MINERAL WATER 500 ML', 1, 15, 1, 15, '2022-10-20', 'Complete', '2022-10-20 12:11:57', '2022-10-20 12:14:55'),
(641, 69, 1020048, 'HYDERABADI BIRYANI (BEEF)', 2, 280, 6, 1400, '2022-10-20', 'Complete', '2022-10-20 13:18:40', '2022-10-20 14:30:29'),
(642, 130, 1020048, 'SOFT DRINKS (250 ML)', 2, 25, 6, 150, '2022-10-20', 'Complete', '2022-10-20 14:25:24', '2022-10-20 14:30:29'),
(644, 121, 1010096, 'MILK SHAKE (VANILLA/STRAWBERRY/CHOCOLATE)', 1, 180, 1, 180, '2022-10-20', 'Complete', '2022-10-20 15:46:54', '2022-10-20 15:49:03'),
(646, 7, 1020049, 'THAI FRIED CHICKEN (8 PCS)', 2, 450, 1, 450, '2022-10-20', 'Complete', '2022-10-20 16:02:26', '2022-10-20 18:55:19'),
(647, 127, 1020049, 'HOT COFEE', 2, 80, 2, 160, '2022-10-20', 'Complete', '2022-10-20 16:21:24', '2022-10-20 18:55:19'),
(648, 128, 1020049, 'MINERAL WATER 500 ML', 2, 15, 1, 15, '2022-10-20', 'Complete', '2022-10-20 16:21:37', '2022-10-20 18:55:19'),
(649, 6, 1030026, 'FRENCH FRY', 3, 120, 1, 120, '2022-10-20', 'Complete', '2022-10-20 17:18:15', '2022-10-20 18:03:48'),
(650, 125, 1030026, 'FALUDA', 3, 180, 1, 180, '2022-10-20', 'Complete', '2022-10-20 17:18:20', '2022-10-20 18:03:48'),
(651, 202, 1030026, 'fry chicken (4 pcs)', 3, 240, 1, 240, '2022-10-20', 'Complete', '2022-10-20 17:29:07', '2022-10-20 18:03:48'),
(653, 160, 1040011, 'THAI SOUP (THICK)', 4, 150, 3, 450, '2022-10-20', 'Complete', '2022-10-20 17:37:47', '2022-10-20 18:45:20'),
(655, 203, 1040011, 'Americano de Peeparoni(m)', 4, 300, 1, 300, '2022-10-20', 'Complete', '2022-10-20 17:43:08', '2022-10-20 18:45:20'),
(656, 130, 1030026, 'SOFT DRINKS (250 ML)', 3, 25, 1, 25, '2022-10-20', 'Complete', '2022-10-20 18:01:09', '2022-10-20 18:03:48'),
(657, 128, 1040011, 'MINERAL WATER 500 ML', 4, 15, 3, 45, '2022-10-20', 'Complete', '2022-10-20 18:43:26', '2022-10-20 18:45:20'),
(658, 160, 1010097, 'THAI SOUP (THICK)', 1, 150, 2, 150, '2022-10-20', 'Complete', '2022-10-20 18:58:36', '2022-10-20 19:02:59'),
(659, 170, 1010097, 'special wonton(4 pcs)', 1, 150, 1, 150, '2022-10-20', 'Complete', '2022-10-20 18:58:42', '2022-10-20 19:02:59'),
(660, 181, 1010098, 'Chicken shwarma', 1, 160, 2, 320, '2022-10-20', 'Complete', '2022-10-20 19:47:41', '2022-10-20 21:50:02'),
(661, 117, 1020050, 'SET 4', 2, 300, 1, 300, '2022-10-20', 'Complete', '2022-10-20 20:19:53', '2022-10-20 20:21:39'),
(663, 204, 1020051, 'package 1', 2, 410, 4, 410, '2022-10-20', 'Complete', '2022-10-20 20:24:54', '2022-10-20 20:25:21'),
(667, 204, 1040012, 'package 1', 4, 410, 20, 8200, '2022-10-20', 'Complete', '2022-10-20 21:48:51', '2022-10-20 21:49:23'),
(669, 21, 1010099, 'SPECIAL FRIED RICE (MIXED)', 1, 480, 1, 480, '2022-10-21', 'Complete', '2022-10-21 12:38:43', '2022-10-21 13:56:55'),
(670, 34, 1010099, 'BEEF SIZZLING', 1, 500, 1, 500, '2022-10-21', 'Complete', '2022-10-21 12:38:51', '2022-10-21 13:56:55'),
(672, 205, 1010099, 'mixed vegetable', 1, 400, 1, 400, '2022-10-21', 'Complete', '2022-10-21 13:42:54', '2022-10-21 13:56:55'),
(673, 130, 1010099, 'SOFT DRINKS (250 ML)', 1, 25, 3, 75, '2022-10-21', 'Complete', '2022-10-21 13:50:10', '2022-10-21 13:56:55'),
(674, 6, 1010100, 'FRENCH FRY', 1, 120, 1, 120, '2022-10-21', 'Complete', '2022-10-21 16:21:43', '2022-10-21 16:22:33'),
(675, 12, 1010101, 'THAI CLEAR SOUP', 1, 520, 1, 520, '2022-10-21', 'Complete', '2022-10-21 17:50:37', '2022-10-21 19:20:06'),
(676, 202, 1010101, 'fry chicken (4 pcs)', 1, 240, 1, 240, '2022-10-21', 'Complete', '2022-10-21 17:51:19', '2022-10-21 19:20:06'),
(677, 170, 1010101, 'special wonton(4 pcs)', 1, 150, 1, 150, '2022-10-21', 'Complete', '2022-10-21 17:51:25', '2022-10-21 19:20:06'),
(681, 2, 1040013, 'FRIED WONTON(8 PCS)', 4, 240, 2, 240, '2022-10-21', 'Complete', '2022-10-21 18:50:15', '2022-10-21 19:57:20'),
(682, 6, 1050007, 'FRENCH FRY', 5, 120, 2, 120, '2022-10-21', 'Complete', '2022-10-21 18:58:37', '2022-10-21 20:03:50'),
(683, 130, 1010101, 'SOFT DRINKS (250 ML)', 1, 25, 3, 75, '2022-10-21', 'Complete', '2022-10-21 19:09:56', '2022-10-21 19:20:06'),
(684, 128, 1010101, 'MINERAL WATER 500 ML', 1, 15, 1, 15, '2022-10-21', 'Complete', '2022-10-21 19:10:03', '2022-10-21 19:20:06'),
(686, 206, 1010102, 'package 1', 1, 280, 116, 280, '2022-10-21', 'Complete', '2022-10-21 19:36:52', '2022-10-21 19:53:19'),
(687, 207, 1010102, 'Mineral water(2L)', 1, 30, 25, 30, '2022-10-21', 'Complete', '2022-10-21 19:37:05', '2022-10-21 19:53:19'),
(688, 128, 1010102, 'MINERAL WATER 500 ML', 1, 15, 15, 15, '2022-10-21', 'Complete', '2022-10-21 19:37:19', '2022-10-21 19:53:19'),
(689, 128, 1040013, 'MINERAL WATER 500 ML', 4, 15, 2, 30, '2022-10-21', 'Complete', '2022-10-21 19:54:01', '2022-10-21 19:57:20'),
(690, 130, 1040013, 'SOFT DRINKS (250 ML)', 4, 25, 3, 75, '2022-10-21', 'Complete', '2022-10-21 19:54:11', '2022-10-21 19:57:20'),
(691, 130, 1050007, 'SOFT DRINKS (250 ML)', 5, 25, 3, 25, '2022-10-21', 'Complete', '2022-10-21 20:02:02', '2022-10-21 20:03:50'),
(692, 182, 1010103, 'Tea', 1, 40, 5, 200, '2022-10-21', 'Complete', '2022-10-21 20:16:32', '2022-10-21 20:17:32'),
(693, 181, 1010104, 'Chicken shwarma', 1, 160, 2, 160, '2022-10-22', 'Complete', '2022-10-22 12:00:05', '2022-10-22 12:01:14'),
(694, 128, 1010105, 'MINERAL WATER 500 ML', 1, 15, 2, 30, '2022-10-22', 'Complete', '2022-10-22 12:01:45', '2022-10-22 12:02:15'),
(695, 181, 1010106, 'Chicken shwarma', 1, 160, 1, 160, '2022-10-22', 'Complete', '2022-10-22 14:43:16', '2022-10-22 14:44:20'),
(696, 70, 1010107, 'HYDERABADI BIRYANI (MUTTON)', 1, 300, 2, 300, '2022-10-22', 'Complete', '2022-10-22 15:15:44', '2022-10-22 16:07:55'),
(697, 121, 1010107, 'MILK SHAKE (VANILLA/STRAWBERRY/CHOCOLATE)', 1, 180, 2, 360, '2022-10-22', 'Complete', '2022-10-22 15:57:48', '2022-10-22 16:07:55'),
(698, 123, 1010108, 'CHOCOLATE COLD COFFEE', 1, 180, 1, 180, '2022-10-23', 'Complete', '2022-10-23 09:46:50', '2022-10-23 09:47:57'),
(699, 120, 1010108, 'LEMONADE', 1, 120, 1, 120, '2022-10-23', 'Complete', '2022-10-23 09:46:58', '2022-10-23 09:47:57'),
(700, 116, 1010109, 'SET 3', 1, 250, 2, 750, '2022-10-23', 'Complete', '2022-10-23 10:15:47', '2022-10-23 11:07:02'),
(705, 181, 1020052, 'Chicken shwarma', 2, 160, 2, 160, '2022-10-23', 'Complete', '2022-10-23 14:51:09', '2022-10-23 16:24:42'),
(706, 6, 1020052, 'FRENCH FRY', 2, 120, 1, 120, '2022-10-23', 'Complete', '2022-10-23 14:58:14', '2022-10-23 16:24:42'),
(707, 95, 1020052, 'FOUR SEASONS PIZZA (SMALL)', 2, 350, 1, 350, '2022-10-23', 'Complete', '2022-10-23 14:59:57', '2022-10-23 16:24:42'),
(708, 208, 1020052, 'fish finger -4 pcs', 2, 160, 1, 160, '2022-10-23', 'Complete', '2022-10-23 15:02:58', '2022-10-23 16:24:42'),
(709, 181, 1010110, 'Chicken shwarma', 1, 160, 1, 160, '2022-10-23', 'Complete', '2022-10-23 15:56:50', '2022-10-23 16:29:02'),
(712, 128, 1020052, 'MINERAL WATER 500 ML', 2, 15, 1, 15, '2022-10-23', 'Complete', '2022-10-23 16:10:06', '2022-10-23 16:24:42'),
(714, 116, 1040014, 'SET 3', 4, 250, 2, 500, '2022-10-23', 'Complete', '2022-10-23 17:14:21', '2022-10-23 18:09:16'),
(715, 128, 1010111, 'MINERAL WATER 500 ML', 1, 15, 1, 15, '2022-10-23', 'Complete', '2022-10-23 17:43:54', '2022-10-23 17:48:56'),
(716, 119, 1040015, 'FRESH JUICE (SEASONAL FRUITS)', 4, 150, 1, 150, '2022-10-23', 'Complete', '2022-10-23 18:19:48', '2022-10-23 19:23:43'),
(717, 120, 1040015, 'LEMONADE', 4, 120, 1, 120, '2022-10-23', 'Complete', '2022-10-23 18:19:55', '2022-10-23 19:23:43'),
(718, 160, 1040015, 'THAI SOUP (THICK)', 4, 150, 1, 150, '2022-10-23', 'Complete', '2022-10-23 18:20:40', '2022-10-23 19:23:43'),
(721, 128, 1040015, 'MINERAL WATER 500 ML', 4, 15, 1, 15, '2022-10-23', 'Complete', '2022-10-23 19:17:18', '2022-10-23 19:23:43'),
(722, 209, 1030027, 'Package 3', 3, 569, 1, 569, '2022-10-23', 'Complete', '2022-10-23 19:24:27', '2022-10-23 19:25:12'),
(725, 17, 1010112, 'JAFRAN SPECIAL CHOWMEIN', 1, 380, 1, 380, '2022-10-23', 'Complete', '2022-10-23 20:06:23', '2022-10-23 20:08:49'),
(726, 128, 1010112, 'MINERAL WATER 500 ML', 1, 15, 1, 15, '2022-10-23', 'Complete', '2022-10-23 20:06:32', '2022-10-23 20:08:49'),
(729, 108, 1010113, 'PASTA VASTA (OVEN BAKED)', 1, 450, 1, 450, '2022-10-25', 'Complete', '2022-10-25 15:07:54', '2022-10-25 15:09:20'),
(730, 89, 1010113, 'CHICKEN DOUBLE DECKER BURGER', 1, 200, 1, 200, '2022-10-25', 'Complete', '2022-10-25 15:08:15', '2022-10-25 15:09:20'),
(731, 130, 1010113, 'SOFT DRINKS (250 ML)', 1, 25, 2, 25, '2022-10-25', 'Complete', '2022-10-25 15:08:38', '2022-10-25 15:09:20'),
(733, 9, 1010114, 'JAFRAN SPECIAL THAI SOUP', 1, 490, 1, 490, '2022-10-25', 'Complete', '2022-10-25 15:53:50', '2022-10-25 16:39:17'),
(734, 2, 1010114, 'FRIED WONTON(8 PCS)', 1, 240, 1, 240, '2022-10-25', 'Complete', '2022-10-25 15:54:06', '2022-10-25 16:39:17'),
(735, 122, 1020053, 'COLD COFFEE', 2, 151, 2, 151, '2022-10-25', 'Complete', '2022-10-25 16:07:20', '2022-10-25 16:08:51'),
(736, 130, 1010114, 'SOFT DRINKS (250 ML)', 1, 25, 1, 25, '2022-10-25', 'Complete', '2022-10-25 16:35:46', '2022-10-25 16:39:17'),
(737, 128, 1010114, 'MINERAL WATER 500 ML', 1, 15, 1, 15, '2022-10-25', 'Complete', '2022-10-25 16:35:54', '2022-10-25 16:39:17'),
(745, 17, 1030028, 'JAFRAN SPECIAL CHOWMEIN', 3, 380, 1, 380, '2022-10-25', 'Complete', '2022-10-25 17:15:47', '2022-10-25 17:17:32'),
(746, 117, 1030029, 'SET 4', 3, 300, 11, 300, '2022-10-25', 'Complete', '2022-10-25 17:20:03', '2022-10-25 17:23:35'),
(748, 9, 1010115, 'JAFRAN SPECIAL THAI SOUP', 1, 490, 1, 490, '2022-10-25', 'Complete', '2022-10-25 17:48:36', '2022-10-25 19:02:05'),
(749, 202, 1010115, 'fry chicken (4 pcs)', 1, 240, 1, 240, '2022-10-25', 'Complete', '2022-10-25 17:49:18', '2022-10-25 19:02:05'),
(750, 170, 1010115, 'special wonton(4 pcs)', 1, 150, 1, 150, '2022-10-25', 'Complete', '2022-10-25 17:49:24', '2022-10-25 19:02:05'),
(751, 93, 1010115, 'BBQ CHICKEN PIZZA MEDIUM', 1, 400, 1, 400, '2022-10-25', 'Complete', '2022-10-25 17:50:15', '2022-10-25 19:02:05'),
(752, 181, 1030030, 'Chicken shwarma', 3, 160, 1, 160, '2022-10-25', 'Complete', '2022-10-25 17:53:17', '2022-10-25 18:09:42'),
(753, 124, 1030030, 'ICE-CREAM', 3, 120, 1, 120, '2022-10-25', 'Complete', '2022-10-25 17:53:44', '2022-10-25 18:09:42'),
(754, 128, 1030030, 'MINERAL WATER 500 ML', 3, 15, 1, 15, '2022-10-25', 'Complete', '2022-10-25 17:54:36', '2022-10-25 18:09:42'),
(758, 66, 1020054, 'BEEF BIRYANI', 2, 250, 1, 250, '2022-10-25', 'Complete', '2022-10-25 18:38:55', '2022-10-25 19:25:00'),
(759, 130, 1020054, 'SOFT DRINKS (250 ML)', 2, 25, 2, 50, '2022-10-25', 'Complete', '2022-10-25 19:19:34', '2022-10-25 19:25:00'),
(760, 160, 1010116, 'THAI SOUP (THICK)', 1, 150, 2, 150, '2022-10-25', 'Complete', '2022-10-25 19:49:05', '2022-10-25 20:16:58'),
(761, 6, 1010116, 'FRENCH FRY', 1, 120, 1, 120, '2022-10-25', 'Complete', '2022-10-25 19:49:18', '2022-10-25 20:16:58'),
(762, 21, 1010117, 'SPECIAL FRIED RICE (MIXED)', 1, 480, 1, 480, '2022-10-26', 'Complete', '2022-10-26 13:45:53', '2022-10-26 14:07:31'),
(764, 25, 1010117, 'JAFRAN SPECIAL SZECHUAN SALAD', 1, 560, 1, 560, '2022-10-26', 'Complete', '2022-10-26 13:46:23', '2022-10-26 14:07:31'),
(766, 34, 1010117, 'BEEF SIZZLING', 1, 500, 1, 500, '2022-10-26', 'Complete', '2022-10-26 13:46:46', '2022-10-26 14:07:31'),
(768, 128, 1010117, 'MINERAL WATER 500 ML', 1, 15, 1, 15, '2022-10-26', 'Complete', '2022-10-26 13:47:07', '2022-10-26 14:07:31'),
(769, 93, 1010117, 'BBQ CHICKEN PIZZA MEDIUM', 1, 400, 1, 400, '2022-10-26', 'Complete', '2022-10-26 13:48:53', '2022-10-26 14:07:31'),
(770, 93, 1010117, 'BBQ CHICKEN PIZZA MEDIUM', 1, 400, 1, 400, '2022-10-26', 'Complete', '2022-10-26 13:49:20', '2022-10-26 14:07:31'),
(772, 125, 1010118, 'FALUDA', 1, 180, 1, 180, '2022-10-26', 'Complete', '2022-10-26 14:11:33', '2022-10-26 14:13:21'),
(773, 128, 1010118, 'MINERAL WATER 500 ML', 1, 15, 3, 15, '2022-10-26', 'Complete', '2022-10-26 14:12:28', '2022-10-26 14:13:21'),
(774, 6, 1010119, 'FRENCH FRY', 1, 120, 1, 120, '2022-10-26', 'Complete', '2022-10-26 15:11:31', '2022-10-26 15:14:10'),
(778, 67, 1010120, 'MUTTON BIRYANI', 1, 280, 14, 3920, '2022-10-26', 'Complete', '2022-10-26 17:52:41', '2022-10-26 18:02:11'),
(779, 130, 1010120, 'SOFT DRINKS (250 ML)', 1, 25, 14, 350, '2022-10-26', 'Complete', '2022-10-26 17:52:55', '2022-10-26 18:02:11'),
(780, 128, 1010120, 'MINERAL WATER 500 ML', 1, 15, 3, 45, '2022-10-26', 'Complete', '2022-10-26 17:53:04', '2022-10-26 18:02:11'),
(781, 128, 1020055, 'MINERAL WATER 500 ML', 2, 15, 2, 30, '2022-10-26', 'Complete', '2022-10-26 17:55:32', '2022-10-26 18:01:53'),
(782, 214, 1010121, 'cake +decoration(package)', 1, 1400, 1, 1400, '2022-10-26', 'Complete', '2022-10-26 18:04:28', '2022-10-26 18:05:00'),
(784, 9, 1010122, 'JAFRAN SPECIAL THAI SOUP', 1, 490, 7, 2450, '2022-10-26', 'Complete', '2022-10-26 18:10:27', '2022-10-26 20:07:45'),
(785, 2, 1010122, 'FRIED WONTON(8 PCS)', 1, 240, 5, 960, '2022-10-26', 'Complete', '2022-10-26 18:11:16', '2022-10-26 20:07:45'),
(786, 216, 1010122, 'FRIED WONTHON(4 PCS)', 1, 120, 1, 120, '2022-10-26', 'Complete', '2022-10-26 18:17:14', '2022-10-26 20:07:45'),
(787, 21, 1010122, 'SPECIAL FRIED RICE (MIXED)', 1, 480, 8, 2880, '2022-10-26', 'Complete', '2022-10-26 18:18:06', '2022-10-26 20:07:45'),
(788, 215, 1010122, 'SPECIAL MIXED VEGETABLE', 1, 400, 7, 2000, '2022-10-26', 'Complete', '2022-10-26 18:18:34', '2022-10-26 20:07:45'),
(789, 28, 1010122, 'CHICKEN SIZZILING', 1, 480, 7, 2400, '2022-10-26', 'Complete', '2022-10-26 18:19:04', '2022-10-26 20:07:45'),
(790, 210, 1020056, 'TANDOORI CHICKEN', 2, 220, 9, 220, '2022-10-26', 'Complete', '2022-10-26 19:15:24', '2022-10-26 19:28:58'),
(791, 212, 1020056, 'BUTTER NAAN', 2, 80, 12, 960, '2022-10-26', 'Complete', '2022-10-26 19:15:47', '2022-10-26 19:28:58'),
(792, 128, 1020056, 'MINERAL WATER 500 ML', 2, 15, 6, 90, '2022-10-26', 'Complete', '2022-10-26 19:16:54', '2022-10-26 19:28:58'),
(793, 128, 1020056, 'MINERAL WATER 500 ML', 2, 15, 6, 90, '2022-10-26', 'Complete', '2022-10-26 19:17:17', '2022-10-26 19:28:58'),
(794, 130, 1020056, 'SOFT DRINKS (250 ML)', 2, 25, 7, 175, '2022-10-26', 'Complete', '2022-10-26 19:17:33', '2022-10-26 19:28:58'),
(795, 60, 1020056, 'CHICKEN TIKKA KABAB (6PCS)', 2, 280, 3, 840, '2022-10-26', 'Complete', '2022-10-26 19:17:47', '2022-10-26 19:28:58'),
(796, 61, 1020056, 'CHICKEN RESMI KABAB (6PCS)', 2, 280, 3, 840, '2022-10-26', 'Complete', '2022-10-26 19:17:56', '2022-10-26 19:28:58'),
(797, 6, 1030031, 'FRENCH FRY', 3, 120, 1, 120, '2022-10-26', 'Complete', '2022-10-26 19:29:41', '2022-10-26 19:51:48'),
(798, 6, 1040016, 'FRENCH FRY', 4, 120, 1, 120, '2022-10-26', 'Complete', '2022-10-26 19:46:03', '2022-10-26 19:46:41'),
(799, 130, 1030031, 'SOFT DRINKS (250 ML)', 3, 25, 2, 50, '2022-10-26', 'Complete', '2022-10-26 19:47:49', '2022-10-26 19:51:48'),
(802, 69, 1020057, 'HYDERABADI BIRYANI (BEEF)', 2, 280, 2, 560, '2022-10-26', 'Complete', '2022-10-26 19:56:33', '2022-10-26 20:09:51'),
(803, 128, 1020057, 'MINERAL WATER 500 ML', 2, 15, 2, 15, '2022-10-26', 'Complete', '2022-10-26 19:57:10', '2022-10-26 20:09:51'),
(804, 128, 1010122, 'MINERAL WATER 500 ML', 1, 15, 19, 285, '2022-10-26', 'Complete', '2022-10-26 19:59:09', '2022-10-26 20:07:45'),
(805, 130, 1010122, 'SOFT DRINKS (250 ML)', 1, 25, 13, 325, '2022-10-26', 'Complete', '2022-10-26 19:59:45', '2022-10-26 20:07:45'),
(808, 7, 1010123, 'THAI FRIED CHICKEN (8 PCS)', 1, 450, 1, 450, '2022-10-27', 'Complete', '2022-10-27 19:07:36', '2022-10-27 19:09:16'),
(809, 130, 1010123, 'SOFT DRINKS (250 ML)', 1, 25, 2, 50, '2022-10-27', 'Complete', '2022-10-27 19:08:18', '2022-10-27 19:09:16'),
(810, 93, 1010124, 'BBQ CHICKEN PIZZA MEDIUM', 1, 400, 1, 400, '2022-10-27', 'Complete', '2022-10-27 19:10:05', '2022-10-27 19:12:05'),
(811, 127, 1010124, 'HOT COFEE', 1, 80, 1, 80, '2022-10-27', 'Complete', '2022-10-27 19:10:22', '2022-10-27 19:12:05'),
(812, 66, 1010125, 'BEEF BIRYANI', 1, 250, 2, 250, '2022-10-27', 'Complete', '2022-10-27 19:12:43', '2022-10-27 19:14:05'),
(813, 65, 1010125, 'CHICKEN BIRYANI', 1, 220, 1, 220, '2022-10-27', 'Complete', '2022-10-27 19:13:02', '2022-10-27 19:14:05'),
(814, 128, 1010125, 'MINERAL WATER 500 ML', 1, 15, 1, 15, '2022-10-27', 'Complete', '2022-10-27 19:13:12', '2022-10-27 19:14:05'),
(815, 6, 1010126, 'FRENCH FRY', 1, 120, 1, 120, '2022-10-27', 'Complete', '2022-10-27 19:21:00', '2022-10-27 19:21:35'),
(816, 6, 1010127, 'FRENCH FRY', 1, 120, 1, 120, '2022-10-27', 'Complete', '2022-10-27 19:34:38', '2022-10-27 19:39:59'),
(817, 127, 1010127, 'HOT COFEE', 1, 80, 3, 240, '2022-10-27', 'Complete', '2022-10-27 19:35:02', '2022-10-27 19:39:59'),
(820, 66, 1010128, 'BEEF BIRYANI', 1, 250, 2, 500, '2022-10-28', 'Complete', '2022-10-28 12:17:29', '2022-10-28 13:04:10'),
(821, 130, 1010128, 'SOFT DRINKS (250 ML)', 1, 25, 2, 50, '2022-10-28', 'Complete', '2022-10-28 13:03:17', '2022-10-28 13:04:10'),
(822, 119, 1010129, 'FRESH JUICE (SEASONAL FRUITS)', 1, 150, 1, 150, '2022-10-28', 'Complete', '2022-10-28 15:45:08', '2022-10-28 15:54:29'),
(823, 122, 1010129, 'COLD COFFEE', 1, 150, 1, 150, '2022-10-28', 'Complete', '2022-10-28 15:45:20', '2022-10-28 15:54:29'),
(824, 6, 1010130, 'FRENCH FRY', 1, 120, 1, 120, '2022-10-28', 'Complete', '2022-10-28 15:54:52', '2022-10-28 17:13:47'),
(828, 87, 1040017, 'CRISPY CHICKEN BURGER', 4, 140, 1, 140, '2022-10-28', 'Complete', '2022-10-28 16:05:26', '2022-10-28 16:27:51'),
(829, 120, 1040017, 'LEMONADE', 4, 120, 1, 120, '2022-10-28', 'Complete', '2022-10-28 16:05:35', '2022-10-28 16:27:51'),
(834, 117, 1070003, 'SET 4', 7, 300, 1, 300, '2022-10-28', 'Complete', '2022-10-28 16:39:15', '2022-10-28 18:09:15'),
(835, 88, 1070003, 'CHICKEN CHEESE BURGER', 7, 170, 1, 170, '2022-10-28', 'Complete', '2022-10-28 16:39:22', '2022-10-28 18:09:15'),
(836, 12, 1080001, 'THAI CLEAR SOUP', 8, 520, 1, 520, '2022-10-28', 'Complete', '2022-10-28 16:40:19', '2022-10-28 19:02:25'),
(837, 116, 1080001, 'SET 3', 8, 250, 2, 250, '2022-10-28', 'Complete', '2022-10-28 16:40:31', '2022-10-28 19:02:25'),
(838, 117, 1080001, 'SET 4', 8, 300, 2, 300, '2022-10-28', 'Complete', '2022-10-28 16:40:37', '2022-10-28 19:02:25'),
(840, 6, 1090001, 'FRENCH FRY', 9, 120, 1, 120, '2022-10-28', 'Incomplete', '2022-10-28 16:43:37', '2022-10-28 16:43:37'),
(842, 67, 2100001, 'MUTTON BIRYANI', 10, 280, 4, 1120, '2022-10-28', 'Complete', '2022-10-28 16:48:40', '2022-10-28 17:25:08'),
(843, 94, 2100001, 'BBQ CHICKEN   PIZZA LARGE', 10, 500, 1, 500, '2022-10-28', 'Complete', '2022-10-28 16:48:58', '2022-10-28 17:25:08'),
(844, 130, 1050008, 'SOFT DRINKS (250 ML)', 5, 25, 2, 50, '2022-10-28', 'Complete', '2022-10-28 16:54:39', '2022-10-28 17:08:37'),
(845, 128, 1050008, 'MINERAL WATER 500 ML', 5, 15, 1, 15, '2022-10-28', 'Complete', '2022-10-28 16:54:44', '2022-10-28 17:08:37'),
(846, 1, 2100001, 'SPECIAL FRIED WONTON(8 PCS)', 10, 290, 1, 290, '2022-10-28', 'Complete', '2022-10-28 16:59:17', '2022-10-28 17:25:08'),
(847, 130, 2100001, 'SOFT DRINKS (250 ML)', 10, 25, 1, 25, '2022-10-28', 'Complete', '2022-10-28 17:04:15', '2022-10-28 17:25:08'),
(848, 128, 1010130, 'MINERAL WATER 500 ML', 1, 15, 1, 15, '2022-10-28', 'Complete', '2022-10-28 17:13:27', '2022-10-28 17:13:47'),
(849, 114, 1020058, 'SET 1', 2, 200, 1, 200, '2022-10-28', 'Complete', '2022-10-28 17:29:22', '2022-10-28 18:10:51'),
(850, 117, 1020058, 'SET 4', 2, 300, 1, 300, '2022-10-28', 'Complete', '2022-10-28 17:29:31', '2022-10-28 18:10:51'),
(851, 95, 1070003, 'FOUR SEASONS PIZZA (SMALL)', 7, 350, 1, 350, '2022-10-28', 'Complete', '2022-10-28 17:36:56', '2022-10-28 18:09:15'),
(852, 128, 1070003, 'MINERAL WATER 500 ML', 7, 15, 1, 15, '2022-10-28', 'Complete', '2022-10-28 17:37:02', '2022-10-28 18:09:15'),
(853, 128, 1020058, 'MINERAL WATER 500 ML', 2, 15, 1, 15, '2022-10-28', 'Complete', '2022-10-28 18:04:56', '2022-10-28 18:10:51'),
(854, 6, 1010131, 'FRENCH FRY', 1, 120, 1, 120, '2022-10-28', 'Complete', '2022-10-28 18:11:35', '2022-10-28 18:52:25'),
(855, 6, 1040018, 'FRENCH FRY', 4, 120, 1, 120, '2022-10-28', 'Complete', '2022-10-28 18:22:33', '2022-10-29 18:54:06'),
(857, 125, 1080001, 'FALUDA', 8, 180, 2, 360, '2022-10-28', 'Complete', '2022-10-28 18:41:15', '2022-10-28 19:02:25'),
(858, 125, 1010131, 'FALUDA', 1, 180, 1, 180, '2022-10-28', 'Complete', '2022-10-28 18:48:28', '2022-10-28 18:52:25'),
(860, 128, 1080001, 'MINERAL WATER 500 ML', 8, 15, 2, 30, '2022-10-28', 'Complete', '2022-10-28 19:01:10', '2022-10-28 19:02:25'),
(861, 88, 1010132, 'CHICKEN CHEESE BURGER', 1, 170, 3, 510, '2022-10-28', 'Complete', '2022-10-28 19:05:02', '2022-10-28 19:26:22'),
(862, 122, 1010132, 'COLD COFFEE', 1, 150, 2, 300, '2022-10-28', 'Complete', '2022-10-28 19:05:50', '2022-10-28 19:26:22'),
(863, 127, 1010132, 'HOT COFEE', 1, 80, 1, 80, '2022-10-28', 'Complete', '2022-10-28 19:05:57', '2022-10-28 19:26:22'),
(864, 128, 1010132, 'MINERAL WATER 500 ML', 1, 15, 1, 15, '2022-10-28', 'Complete', '2022-10-28 19:06:04', '2022-10-28 19:26:22'),
(865, 67, 1010133, 'MUTTON BIRYANI', 1, 280, 25, 7000, '2022-10-28', 'Complete', '2022-10-28 19:33:28', '2022-10-28 19:47:46'),
(866, 130, 1010133, 'SOFT DRINKS (250 ML)', 1, 25, 20, 500, '2022-10-28', 'Complete', '2022-10-28 19:33:58', '2022-10-28 19:47:46'),
(867, 128, 1010133, 'MINERAL WATER 500 ML', 1, 15, 15, 225, '2022-10-28', 'Complete', '2022-10-28 19:34:10', '2022-10-28 19:47:46'),
(873, 3, 1010134, 'FISH FINGER(6PCS)', 1, 300, 1, 300, '2022-10-29', 'Complete', '2022-10-29 10:50:41', '2022-10-29 11:43:48'),
(875, 128, 1010134, 'MINERAL WATER 500 ML', 1, 15, 1, 15, '2022-10-29', 'Complete', '2022-10-29 11:23:59', '2022-10-29 11:43:48'),
(876, 127, 1010134, 'HOT COFEE', 1, 80, 2, 80, '2022-10-29', 'Complete', '2022-10-29 11:41:01', '2022-10-29 11:43:48'),
(878, 2, 1010135, 'FRIED WONTON(8 PCS)', 1, 240, 1, 240, '2022-10-29', 'Complete', '2022-10-29 16:41:19', '2022-10-29 17:33:23'),
(879, 110, 1010135, 'BEEF SHWARMA', 1, 200, 2, 200, '2022-10-29', 'Complete', '2022-10-29 16:41:50', '2022-10-29 17:33:23'),
(880, 120, 1010135, 'LEMONADE', 1, 120, 1, 120, '2022-10-29', 'Complete', '2022-10-29 16:42:02', '2022-10-29 17:33:23'),
(888, 128, 1010135, 'MINERAL WATER 500 ML', 1, 15, 1, 15, '2022-10-29', 'Complete', '2022-10-29 17:29:45', '2022-10-29 17:33:23'),
(890, 87, 1050009, 'CRISPY CHICKEN BURGER', 5, 140, 1, 140, '2022-10-29', 'Complete', '2022-10-29 17:31:14', '2022-10-29 18:31:37'),
(891, 18, 1050009, 'CHICKEN CHOWMEIN', 5, 280, 1, 280, '2022-10-29', 'Complete', '2022-10-29 17:31:27', '2022-10-29 18:31:37'),
(894, 202, 1040018, 'fry chicken (4 pcs)', 4, 240, 1, 240, '2022-10-29', 'Complete', '2022-10-29 17:49:42', '2022-10-29 18:54:06'),
(898, 181, 1010136, 'Chicken shwarma', 1, 160, 1, 160, '2022-10-29', 'Complete', '2022-10-29 18:23:22', '2022-10-29 18:28:31'),
(899, 130, 1050009, 'SOFT DRINKS (250 ML)', 5, 25, 1, 25, '2022-10-29', 'Complete', '2022-10-29 18:24:55', '2022-10-29 18:31:37'),
(901, 128, 1010136, 'MINERAL WATER 500 ML', 1, 15, 2, 15, '2022-10-29', 'Complete', '2022-10-29 18:27:21', '2022-10-29 18:28:31'),
(904, 100, 1050010, 'TANDOORI CHICKEN PIZZA (LARGE)', 5, 500, 1, 500, '2022-10-29', 'Complete', '2022-10-29 18:51:23', '2022-10-29 19:27:40'),
(905, 119, 1040018, 'FRESH JUICE (SEASONAL FRUITS)', 4, 150, 1, 150, '2022-10-29', 'Complete', '2022-10-29 18:53:14', '2022-10-29 18:54:06'),
(906, 127, 1040018, 'HOT COFEE', 4, 80, 1, 80, '2022-10-29', 'Complete', '2022-10-29 18:53:22', '2022-10-29 18:54:06'),
(907, 122, 1070004, 'COLD COFFEE', 7, 150, 1, 150, '2022-10-29', 'Complete', '2022-10-29 19:15:41', '2022-10-29 19:40:29'),
(908, 127, 1070004, 'HOT COFEE', 7, 80, 1, 80, '2022-10-29', 'Complete', '2022-10-29 19:15:49', '2022-10-29 19:40:29'),
(909, 130, 1050010, 'SOFT DRINKS (250 ML)', 5, 25, 1, 25, '2022-10-29', 'Complete', '2022-10-29 19:21:55', '2022-10-29 19:27:40'),
(910, 66, 1010137, 'BEEF BIRYANI', 1, 250, 2, 500, '2022-10-30', 'Complete', '2022-10-30 12:38:28', '2022-10-30 12:40:28'),
(911, 128, 1010137, 'MINERAL WATER 500 ML', 1, 15, 2, 30, '2022-10-30', 'Complete', '2022-10-30 12:38:37', '2022-10-30 12:40:28'),
(913, 66, 1010138, 'BEEF BIRYANI', 1, 250, 1, 250, '2022-10-30', 'Complete', '2022-10-30 15:24:17', '2022-10-30 16:11:04'),
(914, 9, 1020059, 'JAFRAN SPECIAL THAI SOUP', 2, 490, 1, 490, '2022-10-30', 'Complete', '2022-10-30 15:50:55', '2022-10-30 16:42:20'),
(915, 66, 1030032, 'BEEF BIRYANI', 3, 250, 2, 500, '2022-10-30', 'Complete', '2022-10-30 16:18:25', '2022-10-30 16:51:10'),
(916, 127, 1020059, 'HOT COFEE', 2, 80, 2, 160, '2022-10-30', 'Complete', '2022-10-30 16:30:29', '2022-10-30 16:42:20'),
(917, 128, 1020059, 'MINERAL WATER 500 ML', 2, 15, 1, 15, '2022-10-30', 'Complete', '2022-10-30 16:30:39', '2022-10-30 16:42:20'),
(919, 128, 1030032, 'MINERAL WATER 500 ML', 3, 15, 1, 15, '2022-10-30', 'Complete', '2022-10-30 16:41:10', '2022-10-30 16:51:10'),
(920, 131, 1030032, 'SOFT DRINKS (CAN)', 3, 50, 1, 50, '2022-10-30', 'Complete', '2022-10-30 16:44:03', '2022-10-30 16:51:10'),
(921, 6, 1030033, 'FRENCH FRY', 3, 150, 2, 300, '2022-10-30', 'Complete', '2022-10-30 17:41:44', '2022-10-30 17:42:41'),
(922, 130, 1030033, 'SOFT DRINKS (250 ML)', 3, 25, 4, 100, '2022-10-30', 'Complete', '2022-10-30 17:41:59', '2022-10-30 17:42:41'),
(923, 127, 1030034, 'HOT COFEE', 3, 80, 1, 80, '2022-10-30', 'Complete', '2022-10-30 17:59:53', '2022-10-30 18:00:52'),
(924, 17, 1010139, 'JAFRAN SPECIAL CHOWMEIN', 1, 380, 1, 380, '2022-10-30', 'Complete', '2022-10-30 18:39:30', '2022-10-30 19:31:53'),
(925, 120, 1010139, 'LEMONADE', 1, 120, 1, 120, '2022-10-30', 'Complete', '2022-10-30 18:39:50', '2022-10-30 19:31:53'),
(926, 131, 1010139, 'SOFT DRINKS (CAN)', 1, 50, 1, 50, '2022-10-30', 'Complete', '2022-10-30 19:17:17', '2022-10-30 19:31:53'),
(927, 66, 1010140, 'BEEF BIRYANI', 1, 250, 1, 250, '2022-10-31', 'Complete', '2022-10-31 12:16:59', '2022-10-31 14:36:54'),
(930, 24, 1020060, 'EGG FRIED RICE', 2, 320, 2, 640, '2022-10-31', 'Complete', '2022-10-31 12:40:41', '2022-10-31 13:11:49'),
(931, 10, 1020060, 'THAI SOUP (THICK)', 2, 450, 2, 900, '2022-10-31', 'Complete', '2022-10-31 12:41:11', '2022-10-31 13:11:49'),
(932, 45, 1020060, 'VEGETABLE DOPIAZA', 2, 250, 2, 500, '2022-10-31', 'Complete', '2022-10-31 12:41:39', '2022-10-31 13:11:49'),
(933, 39, 1020060, 'FISH SIZLING (PRAWN)', 2, 520, 2, 1040, '2022-10-31', 'Complete', '2022-10-31 12:42:02', '2022-10-31 13:11:49'),
(934, 128, 1020060, 'MINERAL WATER 500 ML', 2, 15, 6, 90, '2022-10-31', 'Complete', '2022-10-31 12:42:18', '2022-10-31 13:11:49'),
(936, 122, 1020061, 'COLD COFFEE', 2, 150, 2, 300, '2022-10-31', 'Complete', '2022-10-31 13:28:42', '2022-10-31 13:29:59'),
(938, 75, 1010141, 'STEAM RICE', 1, 80, 9, 720, '2022-10-31', 'Complete', '2022-10-31 14:38:47', '2022-10-31 14:43:07'),
(939, 301, 1010141, 'korola baji', 1, 80, 5, 400, '2022-10-31', 'Complete', '2022-10-31 14:39:04', '2022-10-31 14:43:07'),
(940, 302, 1010141, 'bagun vartha', 1, 50, 8, 400, '2022-10-31', 'Complete', '2022-10-31 14:39:20', '2022-10-31 14:43:07'),
(941, 303, 1010141, 'mastered hilsha', 1, 400, 8, 3200, '2022-10-31', 'Complete', '2022-10-31 14:39:40', '2022-10-31 14:43:07'),
(942, 304, 1010141, 'beef bhuna (1)', 1, 220, 8, 1760, '2022-10-31', 'Complete', '2022-10-31 14:39:58', '2022-10-31 14:43:07'),
(943, 305, 1010141, 'plain dal', 1, 40, 4, 160, '2022-10-31', 'Complete', '2022-10-31 14:40:13', '2022-10-31 14:43:07'),
(944, 128, 1010141, 'MINERAL WATER 500 ML', 1, 15, 8, 120, '2022-10-31', 'Complete', '2022-10-31 14:40:29', '2022-10-31 14:43:07'),
(945, 131, 1010141, 'SOFT DRINKS (CAN)', 1, 50, 4, 200, '2022-10-31', 'Complete', '2022-10-31 14:41:01', '2022-10-31 14:43:07'),
(946, 93, 1010142, 'BBQ CHICKEN PIZZA MEDIUM', 1, 400, 1, 400, '2022-10-31', 'Complete', '2022-10-31 15:29:08', '2022-10-31 16:17:19'),
(947, 122, 1020062, 'COLD COFFEE', 2, 150, 1, 150, '2022-10-31', 'Complete', '2022-10-31 16:02:04', '2022-10-31 16:08:46'),
(948, 127, 1020062, 'HOT COFEE', 2, 80, 1, 80, '2022-10-31', 'Complete', '2022-10-31 16:02:10', '2022-10-31 16:08:46'),
(949, 128, 1010142, 'MINERAL WATER 500 ML', 1, 15, 1, 15, '2022-10-31', 'Complete', '2022-10-31 16:09:16', '2022-10-31 16:17:19'),
(950, 92, 1030035, 'BBQ CHICKEN  PIZZA (SMALL)', 3, 300, 1, 300, '2022-10-31', 'Complete', '2022-10-31 16:12:46', '2022-10-31 17:13:01'),
(951, 108, 1030035, 'PASTA VASTA (OVEN BAKED)', 3, 450, 2, 450, '2022-10-31', 'Complete', '2022-10-31 16:12:57', '2022-10-31 17:13:01'),
(952, 130, 1030035, 'SOFT DRINKS (250 ML)', 3, 25, 3, 75, '2022-10-31', 'Complete', '2022-10-31 16:13:08', '2022-10-31 17:13:01'),
(953, 181, 1030036, 'Chicken shwarma', 3, 160, 1, 160, '2022-10-31', 'Complete', '2022-10-31 18:50:25', '2022-10-31 19:18:53'),
(955, 110, 1030036, 'BEEF SHWARMA', 3, 200, 1, 200, '2022-10-31', 'Complete', '2022-10-31 18:51:05', '2022-10-31 19:18:53'),
(956, 181, 1010143, 'Chicken shwarma', 1, 160, 1, 160, '2022-10-31', 'Complete', '2022-10-31 19:06:42', '2022-10-31 19:19:18'),
(958, 115, 1010144, 'SET 2', 1, 250, 1, 250, '2022-10-31', 'Complete', '2022-10-31 19:26:07', '2022-10-31 19:27:11'),
(959, 87, 1010145, 'CRISPY CHICKEN BURGER', 1, 140, 1, 140, '2022-10-31', 'Complete', '2022-10-31 19:36:30', '2022-10-31 19:42:07'),
(960, 92, 1010145, 'BBQ CHICKEN  PIZZA (SMALL)', 1, 300, 1, 300, '2022-10-31', 'Complete', '2022-10-31 19:36:41', '2022-10-31 19:42:07'),
(961, 9, 1010146, 'JAFRAN SPECIAL THAI SOUP', 1, 490, 1, 490, '2022-11-01', 'Complete', '2022-11-01 10:16:40', '2022-11-01 10:39:42'),
(962, 210, 1010146, 'CHICKEN SANDWICH', 1, 150, 3, 150, '2022-11-01', 'Complete', '2022-11-01 10:16:48', '2022-11-01 10:39:42'),
(963, 127, 1010146, 'HOT COFEE', 1, 80, 2, 160, '2022-11-01', 'Complete', '2022-11-01 10:18:20', '2022-11-01 10:39:42'),
(964, 182, 1010146, 'Tea', 1, 40, 1, 40, '2022-11-01', 'Complete', '2022-11-01 10:30:34', '2022-11-01 10:39:42'),
(965, 128, 1010146, 'MINERAL WATER 500 ML', 1, 15, 2, 30, '2022-11-01', 'Complete', '2022-11-01 10:30:43', '2022-11-01 10:39:42'),
(966, 7, 1010147, 'THAI FRIED CHICKEN (8 PCS)', 1, 450, 1, 450, '2022-11-01', 'Complete', '2022-11-01 15:51:09', '2022-11-01 16:41:02'),
(967, 131, 1010147, 'SOFT DRINKS (CAN)', 1, 50, 2, 100, '2022-11-01', 'Complete', '2022-11-01 16:31:16', '2022-11-01 16:41:02'),
(968, 127, 1010148, 'HOT COFEE', 1, 80, 1, 80, '2022-11-01', 'Complete', '2022-11-01 17:08:03', '2022-11-01 17:09:08'),
(969, 92, 1010149, 'BBQ CHICKEN  PIZZA (SMALL)', 1, 300, 1, 300, '2022-11-01', 'Complete', '2022-11-01 17:12:46', '2022-11-01 17:20:15'),
(970, 130, 1010149, 'SOFT DRINKS (250 ML)', 1, 25, 1, 25, '2022-11-01', 'Complete', '2022-11-01 17:13:17', '2022-11-01 17:20:15'),
(971, 67, 1020063, 'MUTTON BIRYANI', 2, 280, 2, 560, '2022-11-01', 'Complete', '2022-11-01 17:17:40', '2022-11-01 17:21:21'),
(972, 128, 1010149, 'MINERAL WATER 500 ML', 1, 15, 1, 15, '2022-11-01', 'Complete', '2022-11-01 17:19:31', '2022-11-01 17:20:15'),
(974, 67, 1020064, 'MUTTON BIRYANI', 2, 280, 2, 560, '2022-11-01', 'Complete', '2022-11-01 18:10:40', '2022-11-01 18:14:20'),
(977, 127, 1010150, 'HOT COFEE', 1, 80, 1, 80, '2022-11-02', 'Complete', '2022-11-02 14:11:02', '2022-11-02 15:02:08'),
(978, 131, 1010150, 'SOFT DRINKS (CAN)', 1, 50, 1, 50, '2022-11-02', 'Complete', '2022-11-02 14:35:44', '2022-11-02 15:02:08'),
(979, 207, 1010150, 'Mineral water(2L)', 1, 30, 1, 30, '2022-11-02', 'Complete', '2022-11-02 14:38:11', '2022-11-02 15:02:08'),
(982, 114, 1010151, 'SET 1', 1, 200, 1, 200, '2022-11-02', 'Complete', '2022-11-02 15:38:23', '2022-11-02 16:53:21'),
(983, 127, 1010151, 'HOT COFEE', 1, 80, 1, 80, '2022-11-02', 'Complete', '2022-11-02 15:40:50', '2022-11-02 16:53:21'),
(984, 95, 1010151, 'FOUR SEASONS PIZZA (SMALL)', 1, 350, 1, 350, '2022-11-02', 'Complete', '2022-11-02 15:45:09', '2022-11-02 16:53:21'),
(985, 125, 1020065, 'FALUDA', 2, 180, 3, 540, '2022-11-02', 'Complete', '2022-11-02 15:45:50', '2022-11-02 17:06:20'),
(990, 130, 1010151, 'SOFT DRINKS (250 ML)', 1, 25, 1, 25, '2022-11-02', 'Complete', '2022-11-02 16:51:28', '2022-11-02 16:53:21'),
(992, 128, 1020065, 'MINERAL WATER 500 ML', 2, 15, 1, 15, '2022-11-02', 'Complete', '2022-11-02 17:03:57', '2022-11-02 17:06:20'),
(993, 127, 1010152, 'HOT COFEE', 1, 80, 2, 160, '2022-11-02', 'Complete', '2022-11-02 19:32:09', '2022-11-02 19:33:22'),
(994, 128, 1010152, 'MINERAL WATER 500 ML', 1, 15, 1, 15, '2022-11-02', 'Complete', '2022-11-02 19:32:20', '2022-11-02 19:33:22'),
(995, 118, 1020066, 'SPECIAL SET', 2, 400, 4, 1600, '2022-11-02', 'Complete', '2022-11-02 19:34:56', '2022-11-02 19:35:55'),
(996, 128, 1020066, 'MINERAL WATER 500 ML', 2, 15, 2, 30, '2022-11-02', 'Complete', '2022-11-02 19:35:08', '2022-11-02 19:35:55'),
(999, 122, 1020067, 'COLD COFFEE', 2, 150, 1, 150, '2022-11-02', 'Complete', '2022-11-02 20:12:50', '2022-11-02 20:13:58'),
(1001, 88, 1020068, 'CHICKEN CHEESE BURGER', 2, 170, 2, 340, '2022-11-02', 'Complete', '2022-11-02 20:46:39', '2022-11-02 20:50:28'),
(1002, 117, 1010153, 'SET 4', 1, 300, 1, 300, '2022-11-02', 'Complete', '2022-11-02 21:00:43', '2022-11-02 21:02:04'),
(1003, 131, 1010153, 'SOFT DRINKS (CAN)', 1, 50, 1, 50, '2022-11-02', 'Complete', '2022-11-02 21:00:54', '2022-11-02 21:02:04'),
(1004, 87, 1010154, 'CRISPY CHICKEN BURGER', 1, 140, 1, 140, '2022-11-02', 'Complete', '2022-11-02 21:16:09', '2022-11-02 21:16:48'),
(1005, 128, 1010154, 'MINERAL WATER 500 ML', 1, 15, 1, 15, '2022-11-02', 'Complete', '2022-11-02 21:16:17', '2022-11-02 21:16:48'),
(1009, 131, 1010155, 'SOFT DRINKS (CAN)', 1, 50, 1, 50, '2022-11-03', 'Complete', '2022-11-03 15:05:36', '2022-11-03 15:06:20'),
(1010, 15, 1010156, 'HOT & SOUR SOUP', 1, 290, 1, 290, '2022-11-03', 'Complete', '2022-11-03 16:28:29', '2022-11-03 17:00:44'),
(1011, 128, 1010156, 'MINERAL WATER 500 ML', 1, 15, 1, 15, '2022-11-03', 'Complete', '2022-11-03 16:59:55', '2022-11-03 17:00:44'),
(1012, 1, 1010157, 'SPECIAL FRIED WONTON(8 PCS)', 1, 290, 1, 290, '2022-11-03', 'Complete', '2022-11-03 17:39:04', '2022-11-03 18:26:38'),
(1013, 9, 1010157, 'JAFRAN SPECIAL THAI SOUP', 1, 490, 1, 490, '2022-11-03', 'Complete', '2022-11-03 17:39:14', '2022-11-03 18:26:38'),
(1014, 7, 1010157, 'THAI FRIED CHICKEN (8 PCS)', 1, 450, 1, 450, '2022-11-03', 'Complete', '2022-11-03 17:39:39', '2022-11-03 18:26:38'),
(1019, 108, 1040019, 'PASTA VASTA (OVEN BAKED)', 4, 450, 1, 450, '2022-11-03', 'Complete', '2022-11-03 17:56:22', '2022-11-03 19:08:01'),
(1021, 94, 1040019, 'BBQ CHICKEN   PIZZA LARGE', 4, 500, 1, 500, '2022-11-03', 'Complete', '2022-11-03 17:57:00', '2022-11-03 19:08:01'),
(1022, 6, 1040019, 'FRENCH FRY', 4, 150, 1, 150, '2022-11-03', 'Complete', '2022-11-03 17:57:10', '2022-11-03 19:08:01'),
(1023, 121, 1040019, 'MILK SHAKE (VANILLA/STRAWBERRY/CHOCOLATE)', 4, 180, 1, 180, '2022-11-03', 'Complete', '2022-11-03 17:57:26', '2022-11-03 19:08:01'),
(1025, 128, 1010157, 'MINERAL WATER 500 ML', 1, 15, 2, 30, '2022-11-03', 'Complete', '2022-11-03 18:21:14', '2022-11-03 18:26:38'),
(1026, 130, 1010157, 'SOFT DRINKS (250 ML)', 1, 25, 4, 100, '2022-11-03', 'Complete', '2022-11-03 18:21:32', '2022-11-03 18:26:38'),
(1027, 127, 1060006, 'HOT COFEE', 6, 80, 2, 160, '2022-11-03', 'Complete', '2022-11-03 18:23:38', '2022-11-03 18:24:33'),
(1028, 32, 1020069, 'CHICKEN DO-PIYAZA', 2, 380, 1, 380, '2022-11-03', 'Complete', '2022-11-03 18:28:01', '2022-11-03 18:28:59'),
(1029, 128, 1020069, 'MINERAL WATER 500 ML', 2, 15, 1, 15, '2022-11-03', 'Complete', '2022-11-03 18:28:14', '2022-11-03 18:28:59'),
(1030, 6, 1010158, 'FRENCH FRY', 1, 150, 1, 150, '2022-11-03', 'Complete', '2022-11-03 18:29:40', '2022-11-03 18:30:41'),
(1031, 6, 1040019, 'FRENCH FRY', 4, 150, 1, 150, '2022-11-03', 'Complete', '2022-11-03 18:34:16', '2022-11-03 19:08:01'),
(1032, 92, 1040019, 'BBQ CHICKEN  PIZZA (SMALL)', 4, 300, 1, 300, '2022-11-03', 'Complete', '2022-11-03 18:35:12', '2022-11-03 19:08:01'),
(1033, 87, 1040019, 'CRISPY CHICKEN BURGER', 4, 140, 3, 140, '2022-11-03', 'Complete', '2022-11-03 18:35:53', '2022-11-03 19:08:01'),
(1034, 6, 1010159, 'FRENCH FRY', 1, 150, 1, 150, '2022-11-03', 'Complete', '2022-11-03 18:36:17', '2022-11-03 18:37:40'),
(1039, 119, 1040019, 'FRESH JUICE (SEASONAL FRUITS)', 4, 150, 3, 450, '2022-11-03', 'Complete', '2022-11-03 19:06:29', '2022-11-03 19:08:01'),
(1040, 112, 1040019, 'GRILL CHICKEN SANDWITCH', 4, 180, 1, 180, '2022-11-03', 'Complete', '2022-11-03 19:06:41', '2022-11-03 19:08:01'),
(1041, 128, 1040019, 'MINERAL WATER 500 ML', 4, 15, 4, 60, '2022-11-03', 'Complete', '2022-11-03 19:06:52', '2022-11-03 19:08:01'),
(1042, 130, 1040019, 'SOFT DRINKS (250 ML)', 4, 25, 5, 125, '2022-11-03', 'Complete', '2022-11-03 19:07:09', '2022-11-03 19:08:01'),
(1045, 127, 1010160, 'HOT COFEE', 1, 80, 1, 80, '2022-11-03', 'Complete', '2022-11-03 19:58:50', '2022-11-03 19:59:30'),
(1046, 117, 1010161, 'SET 4', 1, 300, 1, 300, '2022-11-03', 'Complete', '2022-11-03 20:27:05', '2022-11-03 20:28:01'),
(1047, 131, 1010161, 'SOFT DRINKS (CAN)', 1, 50, 1, 50, '2022-11-03', 'Complete', '2022-11-03 20:27:16', '2022-11-03 20:28:01'),
(1048, 9, 1010162, 'JAFRAN SPECIAL THAI SOUP', 1, 490, 1, 490, '2022-11-04', 'Complete', '2022-11-04 15:52:21', '2022-11-04 15:53:23'),
(1049, 128, 1010162, 'MINERAL WATER 500 ML', 1, 15, 1, 15, '2022-11-04', 'Complete', '2022-11-04 15:52:33', '2022-11-04 15:53:23'),
(1050, 130, 1010162, 'SOFT DRINKS (250 ML)', 1, 25, 1, 25, '2022-11-04', 'Complete', '2022-11-04 15:52:49', '2022-11-04 15:53:23'),
(1051, 127, 1010163, 'HOT COFEE', 1, 80, 1, 80, '2022-11-04', 'Complete', '2022-11-04 16:58:54', '2022-11-04 16:59:25'),
(1052, 17, 1010164, 'JAFRAN SPECIAL CHOWMEIN', 1, 380, 1, 380, '2022-11-04', 'Complete', '2022-11-04 17:04:29', '2022-11-04 17:37:06'),
(1053, 131, 1020070, 'SOFT DRINKS (CAN)', 2, 50, 1, 50, '2022-11-04', 'Complete', '2022-11-04 17:08:44', '2022-11-04 17:09:09'),
(1055, 6, 1030037, 'FRENCH FRY', 3, 150, 1, 150, '2022-11-04', 'Complete', '2022-11-04 17:23:03', '2022-11-04 18:09:18'),
(1056, 5, 1030037, 'FISH CUTLET', 3, 300, 1, 300, '2022-11-04', 'Complete', '2022-11-04 17:23:16', '2022-11-04 18:09:18'),
(1057, 128, 1010164, 'MINERAL WATER 500 ML', 1, 15, 1, 15, '2022-11-04', 'Complete', '2022-11-04 17:30:59', '2022-11-04 17:37:06'),
(1058, 2, 1030037, 'FRIED WONTON(8 PCS)', 3, 240, 1, 240, '2022-11-04', 'Complete', '2022-11-04 17:49:38', '2022-11-04 18:09:18'),
(1059, 128, 1030037, 'MINERAL WATER 500 ML', 3, 15, 2, 30, '2022-11-04', 'Complete', '2022-11-04 17:58:46', '2022-11-04 18:09:18'),
(1060, 92, 1010165, 'BBQ CHICKEN  PIZZA (SMALL)', 1, 300, 1, 300, '2022-11-04', 'Complete', '2022-11-04 18:19:39', '2022-11-04 19:07:36'),
(1061, 127, 1010165, 'HOT COFEE', 1, 80, 1, 80, '2022-11-04', 'Complete', '2022-11-04 18:20:01', '2022-11-04 19:07:36'),
(1062, 125, 1010165, 'FALUDA', 1, 180, 2, 360, '2022-11-04', 'Complete', '2022-11-04 18:20:16', '2022-11-04 19:07:36'),
(1064, 69, 1030038, 'HYDERABADI BIRYANI (BEEF)', 3, 280, 3, 840, '2022-11-04', 'Complete', '2022-11-04 18:24:17', '2022-11-04 19:09:17'),
(1065, 10, 1040020, 'THAI SOUP (THICK)', 4, 450, 1, 450, '2022-11-04', 'Complete', '2022-11-04 18:29:25', '2022-11-04 19:13:34'),
(1066, 127, 1020071, 'HOT COFEE', 2, 80, 1, 80, '2022-11-04', 'Complete', '2022-11-04 19:04:24', '2022-11-04 19:38:39'),
(1067, 6, 1020071, 'FRENCH FRY', 2, 150, 1, 150, '2022-11-04', 'Complete', '2022-11-04 19:04:44', '2022-11-04 19:38:39'),
(1068, 7, 1020071, 'THAI FRIED CHICKEN (8 PCS)', 2, 450, 1, 450, '2022-11-04', 'Complete', '2022-11-04 19:04:55', '2022-11-04 19:38:39'),
(1069, 128, 1010165, 'MINERAL WATER 500 ML', 1, 15, 1, 15, '2022-11-04', 'Complete', '2022-11-04 19:06:16', '2022-11-04 19:07:36'),
(1070, 128, 1030038, 'MINERAL WATER 500 ML', 3, 15, 2, 15, '2022-11-04', 'Complete', '2022-11-04 19:08:02', '2022-11-04 19:09:17'),
(1071, 128, 1040020, 'MINERAL WATER 500 ML', 4, 15, 1, 15, '2022-11-04', 'Complete', '2022-11-04 19:12:41', '2022-11-04 19:13:34'),
(1072, 130, 1020071, 'SOFT DRINKS (250 ML)', 2, 25, 2, 50, '2022-11-04', 'Complete', '2022-11-04 19:37:28', '2022-11-04 19:38:39'),
(1073, 128, 1020071, 'MINERAL WATER 500 ML', 2, 15, 1, 15, '2022-11-04', 'Complete', '2022-11-04 19:37:42', '2022-11-04 19:38:39'),
(1074, 87, 1010166, 'CRISPY CHICKEN BURGER', 1, 140, 1, 140, '2022-11-04', 'Complete', '2022-11-04 19:47:09', '2022-11-04 20:12:28'),
(1078, 110, 1010166, 'BEEF SHWARMA', 1, 200, 1, 200, '2022-11-04', 'Complete', '2022-11-04 19:48:37', '2022-11-04 20:12:28'),
(1079, 17, 1010166, 'JAFRAN SPECIAL CHOWMEIN', 1, 380, 1, 380, '2022-11-04', 'Complete', '2022-11-04 19:49:07', '2022-11-04 20:12:28'),
(1080, 131, 1010166, 'SOFT DRINKS (CAN)', 1, 50, 3, 150, '2022-11-04', 'Complete', '2022-11-04 20:09:45', '2022-11-04 20:12:28'),
(1081, 128, 1010166, 'MINERAL WATER 500 ML', 1, 15, 1, 15, '2022-11-04', 'Complete', '2022-11-04 20:10:13', '2022-11-04 20:12:28'),
(1083, 67, 1010167, 'MUTTON BIRYANI', 1, 280, 3, 840, '2022-11-05', 'Complete', '2022-11-05 12:15:18', '2022-11-05 13:00:59'),
(1084, 75, 1010167, 'STEAM RICE', 1, 80, 1, 80, '2022-11-05', 'Complete', '2022-11-05 12:16:58', '2022-11-05 13:00:59'),
(1085, 65, 1020072, 'CHICKEN BIRYANI', 2, 220, 14, 3080, '2022-11-05', 'Complete', '2022-11-05 12:41:19', '2022-11-05 13:36:00'),
(1086, 128, 1010167, 'MINERAL WATER 500 ML', 1, 15, 3, 15, '2022-11-05', 'Complete', '2022-11-05 12:48:35', '2022-11-05 13:00:59'),
(1088, 130, 1010167, 'SOFT DRINKS (250 ML)', 1, 25, 3, 75, '2022-11-05', 'Complete', '2022-11-05 12:49:42', '2022-11-05 13:00:59'),
(1089, 130, 1020072, 'SOFT DRINKS (250 ML)', 2, 25, 1, 25, '2022-11-05', 'Complete', '2022-11-05 13:26:18', '2022-11-05 13:36:00'),
(1090, 131, 1020072, 'SOFT DRINKS (CAN)', 2, 50, 13, 650, '2022-11-05', 'Complete', '2022-11-05 13:26:31', '2022-11-05 13:36:00'),
(1091, 128, 1020072, 'MINERAL WATER 500 ML', 2, 15, 4, 60, '2022-11-05', 'Complete', '2022-11-05 13:34:45', '2022-11-05 13:36:00'),
(1093, 66, 1010168, 'BEEF BIRYANI', 1, 250, 2, 500, '2022-11-05', 'Complete', '2022-11-05 13:44:14', '2022-11-05 14:19:00'),
(1094, 128, 1010168, 'MINERAL WATER 500 ML', 1, 15, 1, 15, '2022-11-05', 'Complete', '2022-11-05 13:48:23', '2022-11-05 14:19:00'),
(1095, 93, 1010169, 'BBQ CHICKEN PIZZA MEDIUM', 1, 400, 1, 400, '2022-11-05', 'Complete', '2022-11-05 15:21:38', '2022-11-05 15:22:43'),
(1096, 10, 1010170, 'THAI SOUP (THICK)', 1, 450, 1, 450, '2022-11-05', 'Complete', '2022-11-05 15:45:18', '2022-11-05 16:26:39'),
(1097, 6, 1010170, 'FRENCH FRY', 1, 150, 1, 150, '2022-11-05', 'Complete', '2022-11-05 15:45:33', '2022-11-05 16:26:39'),
(1098, 98, 1020073, 'TANDOORI CHICKEN PIZZA (SMALL)', 2, 300, 1, 300, '2022-11-05', 'Complete', '2022-11-05 16:09:00', '2022-11-05 16:44:03'),
(1100, 123, 1010171, 'CHOCOLATE COLD COFFEE', 1, 180, 4, 720, '2022-11-05', 'Complete', '2022-11-05 16:27:56', '2022-11-05 16:29:37'),
(1101, 131, 1010171, 'SOFT DRINKS (CAN)', 1, 50, 1, 50, '2022-11-05', 'Complete', '2022-11-05 16:28:07', '2022-11-05 16:29:37'),
(1106, 125, 1010172, 'FALUDA', 1, 180, 1, 180, '2022-11-05', 'Complete', '2022-11-05 17:18:33', '2022-11-05 17:23:36'),
(1107, 131, 1010172, 'SOFT DRINKS (CAN)', 1, 50, 2, 100, '2022-11-05', 'Complete', '2022-11-05 17:20:48', '2022-11-05 17:23:36'),
(1109, 65, 1010173, 'CHICKEN BIRYANI', 1, 220, 2, 440, '2022-11-05', 'Complete', '2022-11-05 17:27:06', '2022-11-05 17:27:43'),
(1110, 20, 1010174, 'VEGETABLE CHOWMEIN', 1, 250, 1, 250, '2022-11-05', 'Complete', '2022-11-05 17:52:17', '2022-11-05 18:36:57'),
(1111, 7, 1010174, 'THAI FRIED CHICKEN (8 PCS)', 1, 450, 1, 450, '2022-11-05', 'Complete', '2022-11-05 17:52:47', '2022-11-05 18:36:57'),
(1113, 128, 1010174, 'MINERAL WATER 500 ML', 1, 15, 1, 15, '2022-11-05', 'Complete', '2022-11-05 18:13:56', '2022-11-05 18:36:57'),
(1114, 10, 1020074, 'THAI SOUP (THICK)', 2, 450, 1, 450, '2022-11-05', 'Complete', '2022-11-05 18:14:32', '2022-11-05 18:15:10'),
(1115, 125, 1020075, 'FALUDA', 2, 180, 2, 360, '2022-11-05', 'Complete', '2022-11-05 18:23:18', '2022-11-05 18:27:00'),
(1116, 131, 1010174, 'SOFT DRINKS (CAN)', 1, 50, 3, 150, '2022-11-05', 'Complete', '2022-11-05 18:35:43', '2022-11-05 18:36:57'),
(1118, 92, 1010175, 'BBQ CHICKEN  PIZZA (SMALL)', 1, 300, 1, 300, '2022-11-06', 'Complete', '2022-11-06 13:14:06', '2022-11-06 13:45:04'),
(1119, 122, 1010175, 'COLD COFFEE', 1, 150, 1, 150, '2022-11-06', 'Complete', '2022-11-06 13:14:18', '2022-11-06 13:45:04'),
(1120, 125, 1010175, 'FALUDA', 1, 180, 2, 360, '2022-11-06', 'Complete', '2022-11-06 13:14:28', '2022-11-06 13:45:04'),
(1121, 128, 1010175, 'MINERAL WATER 500 ML', 1, 15, 2, 30, '2022-11-06', 'Complete', '2022-11-06 13:44:22', '2022-11-06 13:45:04'),
(1130, 1, 1010176, 'SPECIAL FRIED WONTON(8 PCS)', 1, 290, 1, 290, '2022-11-06', 'Complete', '2022-11-06 18:06:40', '2022-11-06 19:10:54'),
(1131, 9, 1010176, 'JAFRAN SPECIAL THAI SOUP', 1, 490, 1, 490, '2022-11-06', 'Complete', '2022-11-06 18:06:53', '2022-11-06 19:10:54'),
(1132, 6, 1020076, 'FRENCH FRY', 2, 150, 2, 150, '2022-11-06', 'Complete', '2022-11-06 18:14:01', '2022-11-06 19:02:06');
INSERT INTO `tablecarts` (`id`, `food_number`, `order_id`, `fname`, `tablenumber`, `amount`, `product_quantity`, `tamount`, `date`, `status`, `created_at`, `updated_at`) VALUES
(1133, 114, 1030039, 'SET 1', 3, 200, 1, 200, '2022-11-06', 'Complete', '2022-11-06 18:20:18', '2022-11-06 19:04:11'),
(1134, 127, 1030039, 'HOT COFEE', 3, 80, 1, 80, '2022-11-06', 'Complete', '2022-11-06 18:20:28', '2022-11-06 19:04:11'),
(1135, 24, 1010176, 'EGG FRIED RICE', 1, 320, 1, 320, '2022-11-06', 'Complete', '2022-11-06 18:21:09', '2022-11-06 19:10:54'),
(1136, 46, 1010176, 'THAI VEGETABLE', 1, 280, 1, 280, '2022-11-06', 'Complete', '2022-11-06 18:21:23', '2022-11-06 19:10:54'),
(1137, 34, 1010176, 'BEEF SIZZLING', 1, 500, 1, 500, '2022-11-06', 'Complete', '2022-11-06 18:21:35', '2022-11-06 19:10:54'),
(1138, 130, 1020076, 'SOFT DRINKS (250 ML)', 2, 25, 2, 50, '2022-11-06', 'Complete', '2022-11-06 19:01:26', '2022-11-06 19:02:06'),
(1139, 128, 1030039, 'MINERAL WATER 500 ML', 3, 15, 1, 15, '2022-11-06', 'Complete', '2022-11-06 19:03:31', '2022-11-06 19:04:11'),
(1140, 131, 1010176, 'SOFT DRINKS (CAN)', 1, 50, 3, 150, '2022-11-06', 'Complete', '2022-11-06 19:06:04', '2022-11-06 19:10:54'),
(1141, 128, 1010176, 'MINERAL WATER 500 ML', 1, 15, 3, 45, '2022-11-06', 'Complete', '2022-11-06 19:06:20', '2022-11-06 19:10:54'),
(1143, 115, 1010177, 'SET 2', 1, 250, 1, 250, '2022-11-06', 'Complete', '2022-11-06 19:22:29', '2022-11-06 19:39:23');

-- --------------------------------------------------------

--
-- Table structure for table `tableorders`
--

CREATE TABLE `tableorders` (
  `id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `wname` varchar(100) DEFAULT 'Waiter Name',
  `vat` float DEFAULT 0,
  `vat_amount` float DEFAULT 0,
  `s_charge` float DEFAULT 0,
  `s_charge_amount` float DEFAULT 0,
  `discount_percentage` int(11) DEFAULT 0,
  `discount_amount` float DEFAULT 0,
  `discount_amount_number` int(11) DEFAULT 0,
  `tamount` float NOT NULL DEFAULT 0,
  `final_amount` float DEFAULT 0,
  `given_amount` int(11) DEFAULT 0,
  `cname` varchar(55) DEFAULT 'Customer Name',
  `date` date DEFAULT NULL,
  `phone_no` varchar(55) DEFAULT 'Customer Phone',
  `payment_type` varchar(55) DEFAULT 'Cash',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tableorders`
--

INSERT INTO `tableorders` (`id`, `order_id`, `wname`, `vat`, `vat_amount`, `s_charge`, `s_charge_amount`, `discount_percentage`, `discount_amount`, `discount_amount_number`, `tamount`, `final_amount`, `given_amount`, `cname`, `date`, `phone_no`, `payment_type`, `created_at`, `updated_at`) VALUES
(3, 1010002, 'MD.RUBEL', 5, 55, 5, 55, 5, 55, 5, 1100, 1150, 1500, NULL, '2022-09-06', NULL, 'Others', '2022-09-06 14:39:43', '2022-09-06 14:40:06'),
(4, 1010003, 'MD.SHOHEL (Ass. Manager)', 2, 11, 2, 11, 2, 11, 10, 550, 551, 1000, NULL, '2022-09-06', NULL, 'Cash', '2022-09-06 14:41:34', '2022-09-06 14:41:45'),
(5, 1010004, 'MD.FARHAD', NULL, 0, NULL, 0, 20, 218, NULL, 1090, 1090, 872, NULL, '2022-09-06', NULL, 'Cash', '2022-09-06 18:12:45', '2022-09-06 19:01:55'),
(6, 1010004, 'MD.FARHAD', NULL, 0, NULL, 0, NULL, 0, NULL, 1090, 1090, 0, NULL, '2022-09-06', 'Customer Phone', 'Cash', '2022-09-06 18:59:43', '2022-09-06 18:59:43'),
(7, 1020001, 'MD.FARHAD', NULL, 0, NULL, 0, 20, 285, NULL, 1425, 1140, 1140, NULL, '2022-09-06', NULL, 'Cash', '2022-09-06 19:03:35', '2022-09-06 19:42:19'),
(8, 1010005, 'MD.FARHAD', NULL, 0, NULL, 0, NULL, 0, NULL, 50, 50, 50, NULL, '2022-09-07', NULL, 'Cash', '2022-09-07 13:57:55', '2022-09-07 13:58:02'),
(9, 1020002, 'MD.FARHAD', NULL, 0, NULL, 0, NULL, 0, NULL, 585, 585, 1000, NULL, '2022-09-08', NULL, 'Cash', '2022-09-08 11:40:37', '2022-09-08 11:42:30'),
(10, 1020002, 'MD.FARHAD', NULL, 0, NULL, 0, NULL, 0, NULL, 470, 470, 0, NULL, '2022-09-08', 'Customer Phone', 'Cash', '2022-09-08 11:44:03', '2022-09-08 11:44:03'),
(11, 1020002, 'MD.FARHAD', NULL, 0, NULL, 0, NULL, 0, NULL, 470, 470, 0, NULL, '2022-09-08', 'Customer Phone', 'Cash', '2022-09-08 11:44:10', '2022-09-08 11:44:10'),
(12, 1020002, 'MD.FARHAD', NULL, 0, NULL, 0, NULL, 0, NULL, 470, 470, 0, NULL, '2022-09-08', 'Customer Phone', 'Cash', '2022-09-08 11:44:20', '2022-09-08 11:44:20'),
(13, 1030001, 'MD.FARHAD', NULL, 0, NULL, 0, NULL, 0, NULL, 470, 470, 500, NULL, '2022-09-08', NULL, 'Cash', '2022-09-08 11:45:36', '2022-09-08 11:47:49'),
(14, 1030001, 'MD.FARHAD', NULL, 0, NULL, 0, NULL, 0, NULL, 470, 470, 0, NULL, '2022-09-08', 'Customer Phone', 'Cash', '2022-09-08 11:47:32', '2022-09-08 11:47:32'),
(15, 1010006, 'MD.SHOHEL (Ass. Manager)', NULL, 0, NULL, 0, NULL, 0, 55, 8555, 8555, 8500, NULL, '2022-09-08', NULL, 'Cash', '2022-09-08 14:17:11', '2022-09-08 14:24:12'),
(16, 1020003, 'RAJIB', 7, 74.2, 5, 53, 10, 106, 40, 1060, 1061.2, 1500, NULL, '2022-09-08', NULL, 'Cash', '2022-09-08 15:59:25', '2022-09-08 16:08:13'),
(17, 1020004, 'MD.SHOHEL (Ass. Manager)', 7, 74.2, 5, 53, 10, 106, 40, 1060, 1040, 1500, NULL, '2022-09-08', NULL, 'Cash', '2022-09-08 16:12:42', '2022-09-08 16:12:56'),
(18, 1020005, 'MD.FARHAD', NULL, 0, NULL, 0, NULL, 0, NULL, 50, 50, 50, NULL, '2022-09-08', NULL, 'Cash', '2022-09-08 19:43:53', '2022-09-08 19:44:00'),
(19, 1010007, 'MD.FARHAD', NULL, 0, NULL, 0, 20, 106, NULL, 530, 480, 600, NULL, '2022-09-10', NULL, 'Cash', '2022-09-10 09:05:06', '2022-09-10 17:18:37'),
(20, 1020006, 'MD.FARHAD', NULL, 0, NULL, 0, NULL, 0, NULL, 590, 590, 1000, NULL, '2022-09-10', NULL, 'Cash', '2022-09-10 11:56:01', '2022-09-10 11:57:39'),
(21, 1010007, 'MD.FARHAD', NULL, 0, NULL, 0, NULL, 0, NULL, 570, 570, 0, NULL, '2022-09-10', 'Customer Phone', 'Cash', '2022-09-10 16:44:58', '2022-09-10 16:44:58'),
(26, 1010008, 'MD.RUBEL', 5, 26, 5, 26, 8, 41.6, 20, 520, 510.4, 600, NULL, '2022-09-11', NULL, 'Cash', '2022-09-11 08:19:40', '2022-09-11 08:22:46'),
(27, 1010009, 'MD.FARHAD', NULL, 0, NULL, 0, NULL, 0, NULL, 515, 515, 600, NULL, '2022-09-11', NULL, 'Cash', '2022-09-11 13:14:23', '2022-09-11 13:18:51'),
(28, 1020007, 'MD.FARHAD', NULL, 0, NULL, 0, NULL, 0, NULL, 120, 120, 1201, NULL, '2022-09-11', NULL, 'Cash', '2022-09-11 17:49:04', '2022-09-11 17:51:15'),
(29, 1020008, 'MD.FARHAD', NULL, 0, NULL, 0, NULL, 0, NULL, 480, 480, 1000, NULL, '2022-09-11', NULL, 'Cash', '2022-09-11 19:13:45', '2022-09-11 19:14:08'),
(30, 1020009, 'MD.FARHAD', NULL, 0, NULL, 0, 10, 42, NULL, 420, 378, 500, NULL, '2022-09-12', NULL, 'Cash', '2022-09-12 11:36:48', '2022-09-12 11:37:13'),
(31, 1010010, 'MD.FARHAD', NULL, 0, NULL, 0, NULL, 0, NULL, 250, 250, 300, NULL, '2022-09-12', NULL, 'Cash', '2022-09-12 13:50:13', '2022-09-12 13:53:13'),
(32, 1010011, 'RAJIB', NULL, 0, NULL, 0, NULL, 0, NULL, 455, 455, 1000, NULL, '2022-09-12', NULL, 'Cash', '2022-09-12 15:50:20', '2022-09-12 15:52:59'),
(33, 1010011, 'RAJIB', NULL, 0, NULL, 0, NULL, 0, NULL, 635, 635, 0, NULL, '2022-09-12', 'Customer Phone', 'Cash', '2022-09-12 15:51:06', '2022-09-12 15:51:06'),
(34, 1010012, 'MD.FARHAD', NULL, 0, NULL, 0, NULL, 0, NULL, 180, 180, 200, NULL, '2022-09-12', NULL, 'Cash', '2022-09-12 16:39:43', '2022-09-12 16:50:35'),
(35, 1010013, 'MD.FARHAD', NULL, 0, NULL, 0, NULL, 0, NULL, 650, 650, 220, NULL, '2022-09-13', NULL, 'Cash', '2022-09-13 10:09:04', '2022-09-15 13:32:00'),
(36, 1040001, 'MD.FARHAD', NULL, 0, NULL, 0, 0, 0, NULL, 350, 350, 150, NULL, '2022-09-13', NULL, 'Cash', '2022-09-13 11:39:25', '2022-09-15 16:23:23'),
(37, 1020010, 'MD.FARHAD', NULL, 0, NULL, 0, NULL, 0, NULL, 675, 675, 700, NULL, '2022-09-13', NULL, 'Cash', '2022-09-13 17:35:53', '2022-09-13 17:44:44'),
(38, 1020010, 'MD.FARHAD', NULL, 0, NULL, 0, NULL, 0, NULL, 675, 675, 0, NULL, '2022-09-13', 'Customer Phone', 'Cash', '2022-09-13 17:44:36', '2022-09-13 17:44:36'),
(39, 1050001, 'MD.FARHAD', NULL, 0, NULL, 0, 20, 171, NULL, 855, 684, 684, NULL, '2022-09-13', NULL, 'Cash', '2022-09-13 18:12:39', '2022-09-13 18:13:15'),
(40, 1010013, 'MD.RUBEL', NULL, 0, NULL, 0, NULL, 0, NULL, 220, 220, 0, NULL, '2022-09-15', 'Customer Phone', 'Cash', '2022-09-15 13:24:40', '2022-09-15 13:24:40'),
(41, 1020011, 'MD.FARHAD', NULL, 0, NULL, 0, NULL, 0, NULL, 325, 325, 500, NULL, '2022-09-15', NULL, 'Cash', '2022-09-15 14:23:22', '2022-09-15 15:04:07'),
(42, 1010014, 'MD.FARHAD', NULL, 0, NULL, 0, NULL, 0, NULL, 350, 350, 500, NULL, '2022-09-15', NULL, 'Cash', '2022-09-15 14:24:28', '2022-09-15 14:29:19'),
(43, 1010014, 'MD.FARHAD', NULL, 0, NULL, 0, NULL, 0, NULL, 350, 350, 0, NULL, '2022-09-15', 'Customer Phone', 'Cash', '2022-09-15 14:25:12', '2022-09-15 14:25:12'),
(44, 1010014, 'MD.FARHAD', NULL, 0, NULL, 0, NULL, 0, NULL, 0, 0, 0, NULL, '2022-09-15', 'Customer Phone', 'Cash', '2022-09-15 14:30:27', '2022-09-15 14:30:27'),
(45, 1010015, 'MD.FARHAD', NULL, 0, NULL, 0, NULL, 0, NULL, 350, 350, 500, NULL, '2022-09-15', NULL, 'Cash', '2022-09-15 14:35:13', '2022-09-15 14:35:19'),
(46, 1020011, 'MD.FARHAD', NULL, 0, NULL, 0, NULL, 0, NULL, 275, 275, 0, NULL, '2022-09-15', 'Customer Phone', 'Cash', '2022-09-15 15:03:59', '2022-09-15 15:03:59'),
(47, 1030002, 'MD.FARHAD', NULL, 0, NULL, 0, NULL, 0, NULL, 780, 780, 780, NULL, '2022-09-15', NULL, 'Cash', '2022-09-15 15:26:26', '2022-09-15 15:30:35'),
(48, 1040001, 'MD.FARHAD', NULL, 0, NULL, 0, NULL, 0, NULL, 135, 135, 0, NULL, '2022-09-15', 'Customer Phone', 'Cash', '2022-09-15 16:19:51', '2022-09-15 16:19:51'),
(49, 1010016, 'NAHODI HASAN SOHAN (Cashier)', NULL, 0, NULL, 0, NULL, 0, NULL, 25, 25, 25, NULL, '2022-09-16', NULL, 'Cash', '2022-09-16 13:04:26', '2022-09-16 13:04:39'),
(50, 1020012, 'MD.FARHAD', NULL, 0, NULL, 0, NULL, 0, NULL, 160, 160, 160, NULL, '2022-09-16', NULL, 'Cash', '2022-09-16 16:58:18', '2022-09-16 17:07:48'),
(51, 1020012, 'MD.FARHAD', NULL, 0, NULL, 0, NULL, 0, NULL, 160, 160, 0, NULL, '2022-09-16', 'Customer Phone', 'Cash', '2022-09-16 17:07:35', '2022-09-16 17:07:35'),
(52, 1020013, 'MD.FARHAD', NULL, 0, NULL, 0, NULL, 0, NULL, 480, 480, 500, NULL, '2022-09-16', NULL, 'Cash', '2022-09-16 17:33:28', '2022-09-16 17:46:16'),
(53, 1020013, 'MD.FARHAD', NULL, 0, NULL, 0, NULL, 0, NULL, 480, 480, 0, NULL, '2022-09-16', 'Customer Phone', 'Cash', '2022-09-16 17:33:36', '2022-09-16 17:33:36'),
(54, 1020013, 'MD.RUBEL', NULL, 0, NULL, 0, NULL, 0, NULL, 480, 480, 0, NULL, '2022-09-16', 'Customer Phone', 'Cash', '2022-09-16 17:34:00', '2022-09-16 17:34:00'),
(55, 1010017, 'MD.FARHAD', NULL, 0, NULL, 0, NULL, 0, NULL, 480, 480, 480, NULL, '2022-09-16', NULL, 'Cash', '2022-09-16 17:35:01', '2022-09-16 17:35:43'),
(56, 1020013, 'MD.FARHAD', NULL, 0, NULL, 0, NULL, 0, NULL, 315, 315, 0, NULL, '2022-09-16', 'Customer Phone', 'Cash', '2022-09-16 17:44:49', '2022-09-16 17:44:49'),
(57, 1010018, 'MD.FARHAD', NULL, 0, NULL, 0, NULL, 0, NULL, 480, 480, 500, NULL, '2022-09-17', NULL, 'Cash', '2022-09-17 12:46:40', '2022-09-17 12:47:23'),
(58, 1010019, 'RAJIB', NULL, 0, NULL, 0, NULL, 0, NULL, 300, 300, 500, NULL, '2022-09-17', NULL, 'Cash', '2022-09-17 13:08:21', '2022-09-17 13:30:37'),
(59, 1010020, 'MD.FARHAD', NULL, 0, NULL, 0, NULL, 0, NULL, 1305, 1305, 1500, NULL, '2022-09-17', NULL, 'Cash', '2022-09-17 15:48:33', '2022-09-17 15:58:20'),
(60, 1010020, 'MD.FARHAD', NULL, 0, NULL, 0, NULL, 0, NULL, 1305, 1305, 0, NULL, '2022-09-17', 'Customer Phone', 'Cash', '2022-09-17 15:58:11', '2022-09-17 15:58:11'),
(61, 1020014, 'MD.FARHAD', NULL, 0, NULL, 0, 20, 186, NULL, 930, 744, 744, NULL, '2022-09-17', NULL, 'Cash', '2022-09-17 19:31:17', '2022-09-17 19:32:30'),
(62, 1010021, 'RAJIB', NULL, 0, NULL, 0, NULL, 0, NULL, 850, 850, 1000, NULL, '2022-09-17', NULL, 'Cash', '2022-09-17 19:49:41', '2022-09-17 20:15:25'),
(63, 1010022, 'MD.FARHAD', NULL, 0, NULL, 0, 20, 96, NULL, 480, 384, 500, NULL, '2022-09-17', NULL, 'Cash', '2022-09-17 20:19:20', '2022-09-17 20:19:40'),
(64, 1010023, 'MD.FARHAD', NULL, 0, NULL, 0, 10, 12, NULL, 120, 108, 108, NULL, '2022-09-18', NULL, 'Cash', '2022-09-18 14:50:57', '2022-09-18 17:05:01'),
(65, 1020015, 'MD.FARHAD', NULL, 0, NULL, 0, 10, 12, NULL, 120, 108, 500, NULL, '2022-09-18', NULL, 'Cash', '2022-09-18 15:01:21', '2022-09-18 17:05:24'),
(66, 1020015, 'MD.FARHAD', NULL, 0, NULL, 0, NULL, 0, NULL, 240, 240, 0, NULL, '2022-09-18', 'Customer Phone', 'Cash', '2022-09-18 17:03:36', '2022-09-18 17:03:36'),
(67, 1020015, 'MD.FARHAD', NULL, 0, NULL, 0, NULL, 0, NULL, 120, 120, 0, NULL, '2022-09-18', 'Customer Phone', 'Cash', '2022-09-18 17:04:19', '2022-09-18 17:04:19'),
(68, 1020015, 'MD.FARHAD', NULL, 0, NULL, 0, NULL, 0, NULL, 120, 120, 0, NULL, '2022-09-18', 'Customer Phone', 'Cash', '2022-09-18 17:04:47', '2022-09-18 17:04:47'),
(69, 1020015, 'MD.FARHAD', NULL, 0, NULL, 0, NULL, 0, NULL, 120, 120, 0, NULL, '2022-09-18', 'Customer Phone', 'Cash', '2022-09-18 17:05:17', '2022-09-18 17:05:17'),
(70, 1010024, 'RAJIB', NULL, 0, NULL, 0, NULL, 0, NULL, 315, 315, 320, NULL, '2022-09-18', NULL, 'Cash', '2022-09-18 18:16:25', '2022-09-18 18:21:05'),
(71, 1010025, 'MD.FARHAD', NULL, 0, NULL, 0, NULL, 0, NULL, 195, 195, 500, NULL, '2022-09-19', NULL, 'Cash', '2022-09-19 12:12:41', '2022-09-19 12:16:04'),
(72, 1010026, 'RAJIB', NULL, 0, NULL, 0, NULL, 0, NULL, 810, 810, 1000, NULL, '2022-09-19', NULL, 'Cash', '2022-09-19 13:26:01', '2022-09-19 13:34:59'),
(73, 1010027, 'MD.FARHAD', NULL, 0, NULL, 0, NULL, 0, 20, 120, 100, 100, NULL, '2022-09-19', NULL, 'Cash', '2022-09-19 14:31:54', '2022-09-20 13:23:09'),
(74, 1020016, 'MD.FARHAD', NULL, 0, NULL, 0, NULL, 0, NULL, 315, 315, 500, NULL, '2022-09-19', NULL, 'Cash', '2022-09-19 17:20:08', '2022-09-19 17:20:41'),
(75, 1010027, 'MD.FARHAD', NULL, 0, NULL, 0, NULL, 0, NULL, 640, 640, 0, NULL, '2022-09-19', 'Customer Phone', 'Cash', '2022-09-19 19:44:42', '2022-09-19 19:44:42'),
(76, 1030003, 'MD.FARHAD', NULL, 0, NULL, 0, 15, 78, NULL, 520, 442, 1200, NULL, '2022-09-19', NULL, 'Cash', '2022-09-19 19:45:32', '2022-09-22 14:24:09'),
(77, 1020017, 'MD.FARHAD', NULL, 0, NULL, 0, NULL, 0, NULL, 300, 300, 1000, NULL, '2022-09-20', NULL, 'Cash', '2022-09-20 12:41:02', '2022-09-22 13:44:04'),
(78, 1020017, 'RAJIB', NULL, 0, NULL, 0, NULL, 0, 20, 120, 100, 0, NULL, '2022-09-20', 'Customer Phone', 'Cash', '2022-09-20 13:22:45', '2022-09-20 13:22:45'),
(79, 1010028, 'RAJIB', NULL, 0, NULL, 0, 10, 51.5, NULL, 515, 463.5, 463, NULL, '2022-09-20', NULL, 'Others', '2022-09-20 16:28:15', '2022-09-20 16:34:40'),
(80, 1010028, 'RAJIB', NULL, 0, NULL, 0, NULL, 0, NULL, 515, 515, 0, NULL, '2022-09-20', 'Customer Phone', 'Cash', '2022-09-20 16:32:43', '2022-09-20 16:32:43'),
(81, 1010029, 'RAJIB', NULL, 0, NULL, 0, NULL, 0, NULL, 435, 435, 500, NULL, '2022-09-20', NULL, 'Cash', '2022-09-20 18:28:15', '2022-09-20 18:30:29'),
(82, 1010030, 'MD.FARHAD', NULL, 0, NULL, 0, NULL, 0, NULL, 700, 700, 700, NULL, '2022-09-21', NULL, 'Cash', '2022-09-21 11:48:08', '2022-09-21 11:56:12'),
(83, 1010031, 'MD.FARHAD', NULL, 0, NULL, 0, 10, 100, NULL, 1000, 900, 1000, NULL, '2022-09-21', NULL, 'Cash', '2022-09-21 20:05:52', '2022-09-21 20:09:01'),
(84, 1040002, 'MD.FARHAD', NULL, 0, NULL, 0, 15, 74.25, NULL, 495, 420.75, 500, NULL, '2022-09-22', NULL, 'Cash', '2022-09-22 12:31:02', '2022-09-22 12:34:57'),
(85, 1040002, 'MD.FARHAD', NULL, 0, NULL, 0, NULL, 0, NULL, 495, 495, 0, NULL, '2022-09-22', 'Customer Phone', 'Cash', '2022-09-22 12:34:50', '2022-09-22 12:34:50'),
(86, 1010032, 'MD.FARHAD', NULL, 0, NULL, 0, NULL, 0, NULL, 560, 560, 1000, NULL, '2022-09-22', NULL, 'Cash', '2022-09-22 13:35:51', '2022-09-22 13:43:13'),
(87, 1010032, 'RAJIB', NULL, 0, NULL, 0, NULL, 0, NULL, 765, 765, 0, NULL, '2022-09-22', 'Customer Phone', 'Cash', '2022-09-22 13:37:08', '2022-09-22 13:37:08'),
(88, 1030003, 'MD.FARHAD', NULL, 0, NULL, 0, 15, 181.5, NULL, 1210, 1028.5, 0, NULL, '2022-09-22', 'Customer Phone', 'Cash', '2022-09-22 13:41:42', '2022-09-22 13:41:42'),
(89, 1030003, 'MD.FARHAD', NULL, 0, NULL, 0, NULL, 0, NULL, 765, 765, 0, NULL, '2022-09-22', 'Customer Phone', 'Cash', '2022-09-22 13:43:01', '2022-09-22 13:43:01'),
(90, 1030003, 'MD.FARHAD', NULL, 0, NULL, 0, NULL, 0, NULL, 560, 560, 0, NULL, '2022-09-22', 'Customer Phone', 'Cash', '2022-09-22 13:43:54', '2022-09-22 13:43:54'),
(91, 1030003, 'MD.FARHAD', NULL, 0, NULL, 0, NULL, 0, NULL, 1205, 1205, 0, NULL, '2022-09-22', 'Customer Phone', 'Cash', '2022-09-22 13:47:58', '2022-09-22 13:47:58'),
(92, 1010033, 'MD.FARHAD', NULL, 0, NULL, 0, 15, 180.75, NULL, 1205, 1024.25, 1200, NULL, '2022-09-22', NULL, 'Cash', '2022-09-22 14:21:19', '2022-09-22 14:29:40'),
(93, 1010033, 'MD.FARHAD', NULL, 0, NULL, 0, NULL, 0, NULL, 1205, 1205, 0, NULL, '2022-09-22', 'Customer Phone', 'Cash', '2022-09-22 14:21:50', '2022-09-22 14:21:50'),
(94, 1010033, 'MD.FARHAD', NULL, 0, NULL, 0, NULL, 0, NULL, 1205, 1205, 0, NULL, '2022-09-22', 'Customer Phone', 'Cash', '2022-09-22 14:22:02', '2022-09-22 14:22:02'),
(95, 1010033, 'MD.FARHAD', NULL, 0, NULL, 0, NULL, 0, NULL, 1205, 1205, 0, NULL, '2022-09-22', 'Customer Phone', 'Cash', '2022-09-22 14:29:16', '2022-09-22 14:29:16'),
(96, 1020018, 'MD.FARHAD', NULL, 0, NULL, 0, NULL, 0, NULL, 80, 80, 160, NULL, '2022-09-22', NULL, 'Cash', '2022-09-22 15:43:31', '2022-09-22 15:44:54'),
(97, 1020018, 'MD.FARHAD', NULL, 0, NULL, 0, NULL, 0, NULL, 160, 160, 0, NULL, '2022-09-22', 'Customer Phone', 'Cash', '2022-09-22 15:44:18', '2022-09-22 15:44:18'),
(98, 1020018, 'MD.FARHAD', NULL, 0, NULL, 0, NULL, 0, NULL, 160, 160, 0, NULL, '2022-09-22', 'Customer Phone', 'Cash', '2022-09-22 15:44:42', '2022-09-22 15:44:42'),
(99, 1010034, 'NAHODI HASAN SOHAN (Cashier)', NULL, 0, NULL, 0, 20, 111.8, NULL, 559, 447.2, 500, NULL, '2022-09-22', NULL, 'Cash', '2022-09-22 16:00:00', '2022-09-22 16:16:09'),
(100, 1010035, 'RAJIB', NULL, 0, NULL, 0, 20, 186, NULL, 930, 744, 759, NULL, '2022-09-22', NULL, 'Cash', '2022-09-22 17:12:20', '2022-09-22 17:15:44'),
(101, 1010035, 'RAJIB', NULL, 0, NULL, 0, 20, 186, NULL, 930, 744, 0, NULL, '2022-09-22', 'Customer Phone', 'Cash', '2022-09-22 17:12:48', '2022-09-22 17:12:48'),
(102, 1010035, 'RAJIB', NULL, 0, NULL, 0, 20, 189, NULL, 945, 756, 0, NULL, '2022-09-22', 'Customer Phone', 'Cash', '2022-09-22 17:14:42', '2022-09-22 17:14:42'),
(103, 1010036, 'NAHODI HASAN SOHAN (Cashier)', NULL, 0, NULL, 0, NULL, 0, 70, 770, 700, 700, NULL, '2022-09-22', NULL, 'Cash', '2022-09-22 19:13:32', '2022-09-22 19:16:55'),
(104, 1020019, 'MD.FARHAD', NULL, 0, NULL, 0, 0, 0, 154, 280, 126, 1390, NULL, '2022-09-23', NULL, 'Cash', '2022-09-23 18:00:32', '2022-09-23 18:57:11'),
(105, 1020019, 'MD.FARHAD', NULL, 0, NULL, 0, 10, 28, NULL, 280, 252, 0, NULL, '2022-09-23', 'Customer Phone', 'Cash', '2022-09-23 18:00:59', '2022-09-23 18:00:59'),
(106, 1030004, 'MD.FARHAD', NULL, 0, NULL, 0, 10, 28, NULL, 280, 252, 500, NULL, '2022-09-23', NULL, 'Cash', '2022-09-23 18:01:29', '2022-09-23 18:03:30'),
(107, 1030004, 'MD.FARHAD', NULL, 0, NULL, 0, NULL, 0, NULL, 280, 280, 0, NULL, '2022-09-23', 'Customer Phone', 'Cash', '2022-09-23 18:02:37', '2022-09-23 18:02:37'),
(108, 1020019, 'RAJIB', NULL, 0, NULL, 0, 10, 154.4, NULL, 1544, 1389.6, 0, NULL, '2022-09-23', 'Customer Phone', 'Cash', '2022-09-23 18:50:51', '2022-09-23 18:50:51'),
(109, 1020019, 'RAJIB', NULL, 0, NULL, 0, 10, 154.4, NULL, 1544, 1389.6, 0, NULL, '2022-09-23', 'Customer Phone', 'Cash', '2022-09-23 18:52:37', '2022-09-23 18:52:37'),
(110, 1020019, 'RAJIB', NULL, 0, NULL, 0, 10, 154.4, NULL, 1544, 1389.6, 0, NULL, '2022-09-23', 'Customer Phone', 'Cash', '2022-09-23 18:54:20', '2022-09-23 18:54:20'),
(111, 1020020, 'MD.FARHAD', NULL, 0, NULL, 0, NULL, 0, NULL, 80, 80, 80, NULL, '2022-09-23', NULL, 'Cash', '2022-09-23 19:47:40', '2022-09-23 19:48:00'),
(112, 1010037, 'MD.FARHAD', NULL, 0, NULL, 0, NULL, 0, NULL, 265, 265, 500, NULL, '2022-09-24', NULL, 'Cash', '2022-09-24 12:25:14', '2022-09-24 13:17:59'),
(113, 1020021, 'RAJIB', NULL, 0, NULL, 0, NULL, 0, NULL, 765, 765, 1000, NULL, '2022-09-25', NULL, 'Cash', '2022-09-25 12:19:22', '2022-09-25 12:21:34'),
(114, 1010038, 'MD.FARHAD', NULL, 0, NULL, 0, NULL, 0, NULL, 875, 875, 1000, NULL, '2022-09-25', NULL, 'Cash', '2022-09-25 15:11:46', '2022-09-25 15:14:25'),
(115, 1010038, 'MD.FARHAD', NULL, 0, NULL, 0, NULL, 0, NULL, 765, 765, 0, NULL, '2022-09-25', 'Customer Phone', 'Cash', '2022-09-25 15:14:19', '2022-09-25 15:14:19'),
(116, 1010039, 'MD.FARHAD', NULL, 0, NULL, 0, NULL, 0, NULL, 580, 580, 25, NULL, '2022-09-25', NULL, 'Cash', '2022-09-25 15:18:25', '2022-09-25 20:05:16'),
(117, 1020022, 'MD.SHOHEL (Ass. Manager)', NULL, 0, NULL, 0, NULL, 0, 20, 120, 100, 100, NULL, '2022-09-25', NULL, 'Cash', '2022-09-25 15:52:55', '2022-09-25 15:53:14'),
(118, 1020023, 'RAJIB', NULL, 0, NULL, 0, NULL, 0, NULL, 575, 575, 600, NULL, '2022-09-25', NULL, 'Cash', '2022-09-25 18:04:44', '2022-09-25 18:08:09'),
(119, 1020024, 'MD.FARHAD', NULL, 0, NULL, 0, NULL, 0, NULL, 465, 465, 500, NULL, '2022-09-25', NULL, 'Cash', '2022-09-25 19:12:50', '2022-09-25 19:20:10'),
(120, 1010039, 'NAHODI HASAN SOHAN (Cashier)', NULL, 0, NULL, 0, NULL, 0, NULL, 25, 25, 0, NULL, '2022-09-25', 'Customer Phone', 'Cash', '2022-09-25 20:05:08', '2022-09-25 20:05:08'),
(121, 1010040, 'MD.FARHAD', NULL, 0, NULL, 0, NULL, 0, NULL, 265, 265, 1000, NULL, '2022-09-26', NULL, 'Cash', '2022-09-26 12:25:32', '2022-09-26 12:37:26'),
(122, 1010040, 'MD.FARHAD', NULL, 0, NULL, 0, NULL, 0, NULL, 765, 765, 0, NULL, '2022-09-26', 'Customer Phone', 'Cash', '2022-09-26 12:26:00', '2022-09-26 12:26:00'),
(123, 1020025, 'MD.FARHAD', NULL, 0, NULL, 0, 15, 200.25, NULL, 1335, 1134.75, 1500, NULL, '2022-09-26', NULL, 'Cash', '2022-09-26 13:33:34', '2022-09-26 13:34:47'),
(124, 1020026, 'RAJIB', NULL, 0, NULL, 0, NULL, 0, NULL, 575, 575, 575, NULL, '2022-09-26', NULL, 'Cash', '2022-09-26 15:05:59', '2022-09-26 15:09:20'),
(125, 1020026, 'RAJIB', NULL, 0, NULL, 0, NULL, 0, NULL, 575, 575, 0, NULL, '2022-09-26', 'Customer Phone', 'Cash', '2022-09-26 15:09:11', '2022-09-26 15:09:11'),
(126, 1010041, 'MD.FARHAD', NULL, 0, NULL, 0, NULL, 0, NULL, 5590, 5590, 5590, NULL, '2022-09-26', NULL, 'Cash', '2022-09-26 18:59:29', '2022-09-26 19:01:04'),
(127, 1020027, 'MD.FARHAD', NULL, 0, NULL, 0, NULL, 0, NULL, 640, 640, 200, NULL, '2022-09-27', NULL, 'Cash', '2022-09-27 13:20:40', '2022-09-28 18:36:39'),
(128, 1020027, 'MD.FARHAD', NULL, 0, NULL, 0, NULL, 0, NULL, 640, 640, 0, NULL, '2022-09-27', 'Customer Phone', 'Cash', '2022-09-27 13:20:52', '2022-09-27 13:20:52'),
(129, 1030005, 'MD.FARHAD', NULL, 0, NULL, 0, NULL, 0, 150, 390, 240, 1400, NULL, '2022-09-27', NULL, 'Cash', '2022-09-27 13:21:35', '2022-09-27 14:07:26'),
(130, 1020027, 'RAJIB', NULL, 0, NULL, 0, NULL, 0, NULL, 640, 640, 0, NULL, '2022-09-27', 'Customer Phone', 'Cash', '2022-09-27 13:22:36', '2022-09-27 13:22:36'),
(131, 1010042, 'RAJIB', NULL, 0, NULL, 0, NULL, 0, NULL, 640, 640, NULL, NULL, '2022-09-27', NULL, 'Cash', '2022-09-27 13:23:37', '2022-09-27 13:31:11'),
(132, 1010043, 'RAJIB', NULL, 0, NULL, 0, NULL, 0, NULL, 640, 640, 640, NULL, '2022-09-27', NULL, 'Cash', '2022-09-27 13:37:32', '2022-09-27 13:37:36'),
(133, 1020027, 'MD.FARHAD', NULL, 0, NULL, 0, 10, 183, NULL, 1830, 1647, 0, NULL, '2022-09-27', 'Customer Phone', 'Cash', '2022-09-27 13:53:25', '2022-09-27 13:53:25'),
(134, 1030005, 'MD.FARHAD', NULL, 0, NULL, 0, 10, 155, NULL, 1550, 1395, 0, NULL, '2022-09-27', 'Customer Phone', 'Cash', '2022-09-27 14:04:51', '2022-09-27 14:04:51'),
(135, 1010044, 'MD.FARHAD', NULL, 0, NULL, 0, NULL, 0, 60, 570, 510, 1000, NULL, '2022-09-27', NULL, 'Cash', '2022-09-27 19:00:37', '2022-09-29 12:12:48'),
(136, 1010044, 'MD.FARHAD', NULL, 0, NULL, 0, 70, 399, NULL, 570, 171, 0, NULL, '2022-09-27', 'Customer Phone', 'Cash', '2022-09-27 19:01:55', '2022-09-27 19:01:55'),
(137, 1010044, 'MD.FARHAD', NULL, 0, NULL, 0, 10, 42, NULL, 420, 378, 0, NULL, '2022-09-27', 'Customer Phone', 'Cash', '2022-09-27 19:02:21', '2022-09-27 19:02:21'),
(138, 1030006, 'MD.FARHAD', NULL, 0, NULL, 0, 10, 42, NULL, 420, 378, 378, NULL, '2022-09-27', NULL, 'Cash', '2022-09-27 19:04:31', '2022-09-27 19:04:58'),
(139, 1030007, 'MD.FARHAD', NULL, 0, NULL, 0, 10, 42, NULL, 420, 378, 378, NULL, '2022-09-27', NULL, 'Cash', '2022-09-27 19:05:55', '2022-09-27 19:06:13'),
(140, 1010044, 'NAHODI HASAN SOHAN (Cashier)', NULL, 0, NULL, 0, NULL, 0, NULL, 195, 195, 0, NULL, '2022-09-28', 'Customer Phone', 'Cash', '2022-09-28 18:31:46', '2022-09-28 18:31:46'),
(141, 1020027, 'NAHODI HASAN SOHAN (Cashier)', NULL, 0, NULL, 0, NULL, 0, NULL, 185, 185, 0, NULL, '2022-09-28', 'Customer Phone', 'Cash', '2022-09-28 18:33:02', '2022-09-28 18:33:02'),
(142, 1020028, 'NAHODI HASAN SOHAN (Cashier)', NULL, 0, NULL, 0, NULL, 0, NULL, 50, 50, 50, NULL, '2022-09-28', NULL, 'Cash', '2022-09-28 18:51:17', '2022-09-28 18:51:23'),
(143, 1020029, 'RAJIB', NULL, 0, NULL, 0, NULL, 0, NULL, 2170, 2170, 2500, NULL, '2022-09-29', NULL, 'Cash', '2022-09-29 11:31:07', '2022-09-29 11:35:24'),
(144, 1030008, 'MD.RUBEL', 0, 0, 0, 0, 0, 0, 20, 500, 480, 100, NULL, '2022-09-29', NULL, 'Cash', '2022-09-29 11:59:27', '2022-09-29 12:01:56'),
(145, 1030008, 'MD.FARHAD', NULL, 0, NULL, 0, NULL, 0, 20, 120, 100, 0, NULL, '2022-09-29', 'Customer Phone', 'Cash', '2022-09-29 12:00:42', '2022-09-29 12:00:42'),
(146, 1030009, 'MD.FARHAD', NULL, 0, NULL, 0, NULL, 0, 20, 120, 100, 100, NULL, '2022-09-29', NULL, 'Others', '2022-09-29 12:03:07', '2022-10-02 16:45:04'),
(147, 1010044, 'MD.FARHAD', NULL, 0, NULL, 0, 10, 62.5, NULL, 625, 562.5, 0, NULL, '2022-09-29', 'Customer Phone', 'Cash', '2022-09-29 12:10:14', '2022-09-29 12:10:14'),
(148, 1010044, 'MD.FARHAD', NULL, 0, NULL, 0, NULL, 0, NULL, 625, 625, 0, NULL, '2022-09-29', 'Customer Phone', 'Cash', '2022-09-29 12:11:16', '2022-09-29 12:11:16'),
(151, 1010046, 'RAJIB', NULL, 0, NULL, 0, NULL, 0, NULL, 915, 915, 1000, NULL, '2022-09-29', NULL, 'Cash', '2022-09-29 19:24:54', '2022-09-29 19:28:54'),
(152, 1010047, 'MD.FARHAD', NULL, 0, NULL, 0, NULL, 0, 40, 190, 150, 200, NULL, '2022-09-30', NULL, 'Cash', '2022-09-30 16:51:03', '2022-09-30 16:52:08'),
(153, 1010048, 'MD.FARHAD', NULL, 0, NULL, 0, 10, 36, NULL, 360, 324, 500, NULL, '2022-09-30', NULL, 'Cash', '2022-09-30 17:27:14', '2022-09-30 17:29:18'),
(154, 1010049, 'MD.FARHAD', NULL, 0, NULL, 0, NULL, 0, 30, 34250, 34220, 600, NULL, '2022-09-30', NULL, 'Cash', '2022-09-30 18:04:27', '2022-10-04 16:27:45'),
(155, 1010049, 'MD.FARHAD', NULL, 0, NULL, 0, NULL, 0, 20, 420, 400, 0, NULL, '2022-09-30', 'Customer Phone', 'Cash', '2022-09-30 18:09:29', '2022-09-30 18:09:29'),
(156, 1010049, 'MD.FARHAD', NULL, 0, NULL, 0, NULL, 0, 20, 420, 400, 0, NULL, '2022-09-30', 'Customer Phone', 'Cash', '2022-09-30 18:09:35', '2022-09-30 18:09:35'),
(157, 1020030, 'MD.FARHAD', NULL, 0, NULL, 0, NULL, 0, NULL, 420, 420, 500, NULL, '2022-09-30', NULL, 'Cash', '2022-09-30 18:11:20', '2022-09-30 18:14:10'),
(158, 1050002, 'MD.FARHAD', NULL, 0, NULL, 0, NULL, 0, 240, 420, 180, 2200, NULL, '2022-09-30', NULL, 'Cash', '2022-09-30 18:13:50', '2022-09-30 18:48:18'),
(159, 1050002, 'MD.FARHAD', NULL, 0, NULL, 0, NULL, 0, NULL, 420, 420, 0, NULL, '2022-09-30', 'Customer Phone', 'Cash', '2022-09-30 18:14:03', '2022-09-30 18:14:03'),
(160, 1050002, 'MD.FARHAD', NULL, 0, NULL, 0, 10, 237, NULL, 2370, 2133, 0, NULL, '2022-09-30', 'Customer Phone', 'Cash', '2022-09-30 18:45:09', '2022-09-30 18:45:09'),
(161, 1050002, 'MD.FARHAD', NULL, 0, NULL, 0, NULL, 0, NULL, 2400, 2400, 0, NULL, '2022-09-30', 'Customer Phone', 'Cash', '2022-09-30 18:45:40', '2022-09-30 18:45:40'),
(162, 1020031, 'RAJIB', NULL, 0, NULL, 0, NULL, 0, NULL, 290, 290, 1000, NULL, '2022-10-01', NULL, 'Cash', '2022-10-01 11:42:02', '2022-10-01 11:45:17'),
(163, 1020031, 'SH.RAJIB', NULL, 0, NULL, 0, NULL, 0, NULL, 290, 290, 0, NULL, '2022-10-01', 'Customer Phone', 'Cash', '2022-10-01 11:42:50', '2022-10-01 11:42:50'),
(164, 1020032, 'SH.RAJIB', NULL, 0, NULL, 0, NULL, 0, NULL, 660, 660, 1000, NULL, '2022-10-01', NULL, 'Cash', '2022-10-01 17:28:18', '2022-10-01 17:37:18'),
(165, 1020032, 'SH.RAJIB', NULL, 0, NULL, 0, NULL, 0, NULL, 675, 675, 0, NULL, '2022-10-01', 'Customer Phone', 'Cash', '2022-10-01 17:35:29', '2022-10-01 17:35:29'),
(166, 1020033, 'SH.RAJIB', NULL, 0, NULL, 0, NULL, 0, 90, 440, 350, 500, NULL, '2022-10-01', NULL, 'Cash', '2022-10-01 18:55:30', '2022-10-01 18:56:43'),
(167, 1030009, 'SH.RAJIB', NULL, 0, NULL, 0, NULL, 0, 20, 120, 100, 0, NULL, '2022-10-02', 'Customer Phone', 'Cash', '2022-10-02 16:44:57', '2022-10-02 16:44:57'),
(168, 1030009, 'MD.FARHAD', NULL, 0, NULL, 0, NULL, 0, 20, 200, 180, 0, NULL, '2022-10-02', 'Customer Phone', 'Cash', '2022-10-02 16:48:20', '2022-10-02 16:48:20'),
(169, 1030009, 'MD.FARHAD', NULL, 0, NULL, 0, NULL, 0, NULL, 200, 200, 0, NULL, '2022-10-02', 'Customer Phone', 'Cash', '2022-10-02 16:48:52', '2022-10-02 16:48:52'),
(170, 1030010, 'MD.FARHAD', NULL, 0, NULL, 0, NULL, 0, 20, 200, 180, 180, NULL, '2022-10-02', NULL, 'Cash', '2022-10-02 16:49:24', '2022-10-02 16:49:34'),
(171, 1030010, 'MD.FARHAD', NULL, 0, NULL, 0, NULL, 0, NULL, 200, 200, 0, NULL, '2022-10-02', 'Customer Phone', 'Cash', '2022-10-02 16:50:03', '2022-10-02 16:50:03'),
(172, 1020034, 'MD.FARHAD', NULL, 0, NULL, 0, 15, 174.75, NULL, 1165, 990.25, 1000, NULL, '2022-10-02', NULL, 'Cash', '2022-10-02 19:03:46', '2022-10-02 19:10:59'),
(173, 1030011, 'SH.RAJIB', NULL, 0, NULL, 0, 20, 184, NULL, 920, 736, 1000, NULL, '2022-10-02', NULL, 'Cash', '2022-10-02 19:05:30', '2022-10-02 19:06:01'),
(174, 1040004, 'MD.FARHAD', NULL, 0, NULL, 0, NULL, 0, NULL, 1165, 1165, 500, NULL, '2022-10-02', NULL, 'Cash', '2022-10-02 19:10:53', '2022-10-02 19:47:51'),
(175, 1040004, 'MD.FARHAD', NULL, 0, NULL, 0, NULL, 0, NULL, 420, 420, 0, NULL, '2022-10-02', 'Customer Phone', 'Cash', '2022-10-02 19:34:27', '2022-10-02 19:34:27'),
(176, 1040005, 'MD.FARHAD', NULL, 0, NULL, 0, NULL, 0, 120, 380, 260, 2100, NULL, '2022-10-03', NULL, 'Cash', '2022-10-03 11:16:18', '2022-10-06 20:26:17'),
(177, 1020035, 'SH.RAJIB', NULL, 0, NULL, 0, 10, 50, NULL, 500, 450, 500, NULL, '2022-10-03', NULL, 'Cash', '2022-10-03 16:17:18', '2022-10-03 16:17:48'),
(178, 1180001, 'SH.RAJIB', NULL, 0, NULL, 0, NULL, 0, 20, 120, 100, 100, NULL, '2022-10-03', NULL, 'Cash', '2022-10-03 17:55:13', '2022-10-03 17:55:19'),
(179, 1030012, 'SH.RAJIB', NULL, 0, NULL, 0, NULL, 0, NULL, 530, 530, 530, NULL, '2022-10-03', NULL, 'Cash', '2022-10-03 18:03:32', '2022-10-03 18:05:47'),
(180, 1030013, 'NAHODI HASAN SOHAN (Cashier)', NULL, 0, NULL, 0, NULL, 0, NULL, 25, 25, 25, NULL, '2022-10-03', NULL, 'Cash', '2022-10-03 18:58:09', '2022-10-03 18:58:16'),
(181, 1030014, 'SH.RAJIB', NULL, 0, NULL, 0, NULL, 0, NULL, 640, 640, 1000, NULL, '2022-10-04', NULL, 'Cash', '2022-10-04 13:16:57', '2022-10-04 13:17:57'),
(182, 1050003, 'MD.SHOHEL (Ass. Manager)', NULL, 0, NULL, 0, NULL, 0, NULL, 200, 200, 200, NULL, '2022-10-04', NULL, 'Cash', '2022-10-04 14:01:45', '2022-10-04 14:03:04'),
(183, 1010049, 'SH.RAJIB', NULL, 0, NULL, 0, NULL, 0, NULL, 625, 625, 0, NULL, '2022-10-04', 'Customer Phone', 'Cash', '2022-10-04 16:25:33', '2022-10-04 16:25:33'),
(184, 1020036, 'SH.RAJIB', NULL, 0, NULL, 0, NULL, 0, NULL, 400, 400, 500, NULL, '2022-10-04', NULL, 'Cash', '2022-10-04 17:54:18', '2022-10-04 17:56:05'),
(185, 1060001, 'MD.FARHAD', NULL, 0, NULL, 0, 10, 17, 3, 170, 150, 500, NULL, '2022-10-04', NULL, 'Cash', '2022-10-04 18:28:43', '2022-10-04 18:30:25'),
(186, 1060002, 'MD.FARHAD', NULL, 0, NULL, 0, 15, 97.5, NULL, 650, 552.5, 1000, NULL, '2022-10-04', NULL, 'Cash', '2022-10-04 18:47:47', '2022-10-04 18:52:22'),
(187, 1030015, 'MD.FARHAD', NULL, 0, NULL, 0, NULL, 0, 385, 650, 265, 4000, NULL, '2022-10-04', NULL, 'Cash', '2022-10-04 18:52:02', '2022-10-04 19:36:38'),
(188, 1030015, 'MD.SHOHEL (Ass. Manager)', NULL, 0, NULL, 0, 10, 390.5, NULL, 3905, 3514.5, 0, NULL, '2022-10-04', 'Customer Phone', 'Cash', '2022-10-04 19:27:59', '2022-10-04 19:27:59'),
(189, 1030015, 'MD.SHOHEL (Ass. Manager)', NULL, 0, NULL, 0, 10, 383, NULL, 3830, 3447, 0, NULL, '2022-10-04', 'Customer Phone', 'Cash', '2022-10-04 19:32:13', '2022-10-04 19:32:13'),
(190, 1030016, 'SH.RAJIB', NULL, 0, NULL, 0, 20, 378, NULL, 1890, 1512, 1512, NULL, '2022-10-05', NULL, 'Cash', '2022-10-05 10:33:40', '2022-10-05 14:08:15'),
(191, 1050004, 'MD.FARHAD', NULL, 0, NULL, 0, 10, 520, NULL, 5200, 4680, 4600, NULL, '2022-10-05', NULL, 'Cash', '2022-10-05 11:08:48', '2022-10-05 14:53:34'),
(192, 1050004, 'MD.FARHAD', NULL, 0, NULL, 0, 15, 765, NULL, 5100, 4335, 0, NULL, '2022-10-05', 'Customer Phone', 'Cash', '2022-10-05 13:50:00', '2022-10-05 13:50:00'),
(193, 1050004, 'SH.RAJIB', NULL, 0, NULL, 0, NULL, 0, NULL, 1890, 1890, 0, NULL, '2022-10-05', 'Customer Phone', 'Cash', '2022-10-05 14:08:06', '2022-10-05 14:08:06'),
(194, 1050004, 'NAHODI HASAN SOHAN (Cashier)', NULL, 0, NULL, 0, NULL, 0, 20, 120, 100, 0, NULL, '2022-10-05', 'Customer Phone', 'Cash', '2022-10-05 14:10:04', '2022-10-05 14:10:04'),
(195, 1060003, 'NAHODI HASAN SOHAN (Cashier)', NULL, 0, NULL, 0, NULL, 0, NULL, 45, 45, 45, NULL, '2022-10-05', NULL, 'Cash', '2022-10-05 14:11:29', '2022-10-05 14:11:33'),
(196, 1010050, 'MD.FARHAD', NULL, 0, NULL, 0, NULL, 0, NULL, 825, 825, 825, NULL, '2022-10-05', NULL, 'Cash', '2022-10-05 14:45:31', '2022-10-05 14:47:23'),
(197, 1010050, 'MD.FARHAD', NULL, 0, NULL, 0, NULL, 0, NULL, 5100, 5100, 0, NULL, '2022-10-05', 'Customer Phone', 'Cash', '2022-10-05 14:53:27', '2022-10-05 14:53:27'),
(198, 1010051, 'MD.FARHAD', NULL, 0, NULL, 0, NULL, 0, 520, 520, 0, 520, NULL, '2022-10-05', NULL, 'Cash', '2022-10-05 17:07:33', '2022-10-05 17:07:37'),
(199, 1010052, 'SH.RAJIB', NULL, 0, NULL, 0, NULL, 0, NULL, 765, 765, 1000, NULL, '2022-10-05', NULL, 'Cash', '2022-10-05 18:43:45', '2022-10-05 18:47:12'),
(200, 1030017, 'MD.FARHAD', NULL, 0, NULL, 0, NULL, 0, NULL, 645, 645, 1000, NULL, '2022-10-06', NULL, 'Cash', '2022-10-06 13:00:03', '2022-10-06 13:04:56'),
(201, 1030017, 'MD.FARHAD', NULL, 0, NULL, 0, NULL, 0, NULL, 645, 645, 0, NULL, '2022-10-06', 'Customer Phone', 'Cash', '2022-10-06 13:02:53', '2022-10-06 13:02:53'),
(202, 1010053, 'NAHODI HASAN SOHAN (Cashier)', NULL, 0, NULL, 0, NULL, 0, NULL, 30, 30, 30, NULL, '2022-10-06', NULL, 'Cash', '2022-10-06 13:07:54', '2022-10-06 13:07:58'),
(203, 1010054, 'SH.RAJIB', NULL, 0, NULL, 0, NULL, 0, NULL, 400, 400, 1000, NULL, '2022-10-06', NULL, 'Cash', '2022-10-06 13:32:46', '2022-10-06 13:48:26'),
(204, 1020037, 'SH.RAJIB', NULL, 0, NULL, 0, NULL, 0, NULL, 615, 615, 615, NULL, '2022-10-06', NULL, 'Cash', '2022-10-06 13:35:05', '2022-10-06 13:45:26'),
(205, 1020038, 'SH.RAJIB', NULL, 0, NULL, 0, NULL, 0, NULL, 615, 615, 615, NULL, '2022-10-06', NULL, 'Cash', '2022-10-06 13:46:20', '2022-10-06 13:46:29'),
(206, 1020038, 'SH.RAJIB', NULL, 0, NULL, 0, NULL, 0, NULL, 400, 400, 0, NULL, '2022-10-06', 'Customer Phone', 'Cash', '2022-10-06 13:47:58', '2022-10-06 13:47:58'),
(207, 1010055, 'MD.FARHAD', NULL, 0, NULL, 0, NULL, 0, NULL, 445, 445, 445, NULL, '2022-10-06', NULL, 'Cash', '2022-10-06 19:22:16', '2022-10-06 19:25:12'),
(208, 1040005, 'SH.RAJIB', NULL, 0, NULL, 0, NULL, 0, NULL, 2170, 2170, 0, NULL, '2022-10-06', 'Customer Phone', 'Cash', '2022-10-06 20:11:40', '2022-10-06 20:11:40'),
(209, 1060004, 'SH.RAJIB', NULL, 0, 15, 325.5, 15, 325.5, 50, 2170, 2120, 400, NULL, '2022-10-06', NULL, 'Cash', '2022-10-06 20:16:54', '2022-10-18 19:52:30'),
(210, 1040005, 'SH.RAJIB', NULL, 0, NULL, 0, NULL, 0, NULL, 2220, 2220, 0, NULL, '2022-10-06', 'Customer Phone', 'Cash', '2022-10-06 20:25:03', '2022-10-06 20:25:03'),
(211, 1030018, 'MD.FARHAD', NULL, 0, NULL, 0, 10, 477, NULL, 4770, 4293, 4300, NULL, '2022-10-07', NULL, 'Cash', '2022-10-07 18:44:29', '2022-10-07 18:49:55'),
(212, 1030019, 'MD.SHOHEL (Ass. Manager)', NULL, 0, NULL, 0, NULL, 0, NULL, 140, 140, 200, NULL, '2022-10-07', NULL, 'Cash', '2022-10-07 19:49:47', '2022-10-07 19:51:05'),
(213, 1070001, 'MD.SHOHEL (Ass. Manager)', NULL, 0, NULL, 0, NULL, 0, 6040, 32040, 26000, 22000, NULL, '2022-10-07', NULL, 'Cash', '2022-10-07 20:24:03', '2022-10-07 20:26:51'),
(214, 1070002, 'MD.FARHAD', NULL, 0, NULL, 0, NULL, 0, NULL, 330, 330, 1000, NULL, '2022-10-07', NULL, 'Cash', '2022-10-07 20:36:04', '2022-10-07 20:36:10'),
(215, 1010056, 'MD.SHOHEL (Ass. Manager)', NULL, 0, NULL, 0, 20, 105, NULL, 525, 420, 420, NULL, '2022-10-07', NULL, 'Cash', '2022-10-07 20:42:48', '2022-10-07 20:43:27'),
(216, 1020039, 'SH.RAJIB', NULL, 0, NULL, 0, NULL, 0, NULL, 380, 380, 600, NULL, '2022-10-08', NULL, 'Cash', '2022-10-08 12:33:42', '2022-10-08 13:25:09'),
(217, 1040006, 'SH.RAJIB', NULL, 0, NULL, 0, NULL, 0, NULL, 575, 575, 500, NULL, '2022-10-08', NULL, 'Cash', '2022-10-08 13:22:12', '2022-10-08 13:30:11'),
(218, 1040006, 'SH.RAJIB', NULL, 0, NULL, 0, NULL, 0, NULL, 485, 485, 0, NULL, '2022-10-08', 'Customer Phone', 'Cash', '2022-10-08 13:28:31', '2022-10-08 13:28:31'),
(219, 1030020, 'MD.FARHAD', NULL, 0, NULL, 0, 15, 366, NULL, 2440, 2074, 2074, NULL, '2022-10-08', NULL, 'Cash', '2022-10-08 13:35:33', '2022-10-08 13:49:38'),
(220, 1010057, 'SH.RAJIB', NULL, 0, NULL, 0, NULL, 0, NULL, 530, 530, 530, NULL, '2022-10-08', NULL, 'Cash', '2022-10-08 16:58:05', '2022-10-08 16:59:03'),
(221, 1040007, 'SH.RAJIB', NULL, 0, NULL, 0, NULL, 0, NULL, 170, 170, 170, NULL, '2022-10-08', NULL, 'Cash', '2022-10-08 17:02:26', '2022-10-08 17:04:38'),
(222, 1010058, 'SH.RAJIB', NULL, 0, NULL, 0, NULL, 0, NULL, 200, 200, 200, NULL, '2022-10-08', NULL, 'Cash', '2022-10-08 19:24:58', '2022-10-08 19:26:43'),
(223, 1020040, 'SH.RAJIB', NULL, 0, NULL, 0, 10, 17, 3, 170, 150, 150, NULL, '2022-10-09', NULL, 'Cash', '2022-10-09 11:42:16', '2022-10-09 11:47:06'),
(224, 1020040, 'SH.RAJIB', NULL, 0, NULL, 0, 10, 17, NULL, 170, 153, 0, NULL, '2022-10-09', 'Customer Phone', 'Cash', '2022-10-09 11:46:46', '2022-10-09 11:46:46'),
(225, 1020040, 'NAHODI HASAN SOHAN (Cashier)', NULL, 0, NULL, 0, 20, 80, NULL, 400, 320, 0, NULL, '2022-10-09', 'Customer Phone', 'Cash', '2022-10-09 11:48:00', '2022-10-09 11:48:00'),
(226, 1020040, 'NAHODI HASAN SOHAN (Cashier)', NULL, 0, NULL, 0, 20, 80, NULL, 400, 320, 0, NULL, '2022-10-09', 'Customer Phone', 'Cash', '2022-10-09 11:48:06', '2022-10-09 11:48:06'),
(227, 1010059, 'NAHODI HASAN SOHAN (Cashier)', NULL, 0, NULL, 0, 20, 80, NULL, 400, 320, 400, NULL, '2022-10-09', NULL, 'Cash', '2022-10-09 11:48:26', '2022-10-09 11:48:44'),
(228, 1010060, 'SH.RAJIB', NULL, 0, NULL, 0, NULL, 0, NULL, 320, 320, 600, NULL, '2022-10-09', NULL, 'Cash', '2022-10-09 16:09:22', '2022-10-09 18:25:39'),
(229, 1010060, 'SH.RAJIB', NULL, 0, NULL, 0, NULL, 0, NULL, 600, 600, 0, NULL, '2022-10-09', 'Customer Phone', 'Cash', '2022-10-09 18:23:48', '2022-10-09 18:23:48'),
(230, 1010061, 'Farid Hosen', NULL, 0, NULL, 0, 0, 0, 30, 315, 285, 285, NULL, '2022-10-09', NULL, 'Cash', '2022-10-09 19:12:35', '2022-10-09 19:19:36'),
(231, 1010062, 'SH.RAJIB', NULL, 0, NULL, 0, 10, 208, NULL, 2080, 1872, 1872, NULL, '2022-10-09', NULL, 'Cash', '2022-10-09 20:05:33', '2022-10-09 20:14:20'),
(232, 1010062, 'SH.RAJIB', NULL, 0, NULL, 0, NULL, 0, NULL, 2080, 2080, 0, NULL, '2022-10-09', 'Customer Phone', 'Cash', '2022-10-09 20:13:59', '2022-10-09 20:13:59'),
(233, 1010063, 'Farid Hosen', NULL, 0, NULL, 0, NULL, 0, NULL, 380, 380, 380, NULL, '2022-10-10', NULL, 'Cash', '2022-10-10 12:39:35', '2022-10-10 12:41:47'),
(234, 1010063, 'Farid Hosen', NULL, 0, NULL, 0, NULL, 0, NULL, 380, 380, 0, NULL, '2022-10-10', 'Customer Phone', 'Cash', '2022-10-10 12:41:37', '2022-10-10 12:41:37'),
(235, 1020041, 'SH.RAJIB', NULL, 0, NULL, 0, 0, 0, 453, 320, -133, 2567, NULL, '2022-10-10', NULL, 'Cash', '2022-10-10 18:28:27', '2022-10-10 20:54:43'),
(236, 1020041, 'Farid Hosen', NULL, 0, NULL, 0, NULL, 0, 20, 120, 100, 0, NULL, '2022-10-10', 'Customer Phone', 'Cash', '2022-10-10 18:31:27', '2022-10-10 18:31:27'),
(237, 1020041, 'Farid Hosen', NULL, 0, NULL, 0, NULL, 0, 20, 120, 100, 0, NULL, '2022-10-10', 'Customer Phone', 'Cash', '2022-10-10 18:31:32', '2022-10-10 18:31:32'),
(238, 1020041, 'Farid Hosen', NULL, 0, NULL, 0, NULL, 0, 20, 120, 100, 0, NULL, '2022-10-10', 'Customer Phone', 'Cash', '2022-10-10 18:31:40', '2022-10-10 18:31:40'),
(239, 1020041, 'Farid Hosen', NULL, 0, NULL, 0, NULL, 0, 20, 120, 100, 0, NULL, '2022-10-10', 'Customer Phone', 'Cash', '2022-10-10 18:32:32', '2022-10-10 18:32:32'),
(240, 1030021, 'Farid Hosen', NULL, 0, NULL, 0, NULL, 0, 20, 120, 100, 100, NULL, '2022-10-10', NULL, 'Cash', '2022-10-10 18:33:36', '2022-10-10 19:05:09'),
(241, 1030021, 'Farid Hosen', NULL, 0, NULL, 0, NULL, 0, NULL, 120, 120, 0, NULL, '2022-10-10', 'Customer Phone', 'Cash', '2022-10-10 19:05:01', '2022-10-10 19:05:01'),
(242, 1010064, 'MD.FARHAD', NULL, 0, NULL, 0, 0, 0, 270, 1795, 1525, 1525, NULL, '2022-10-10', NULL, 'Cash', '2022-10-10 20:22:54', '2022-10-10 20:50:33'),
(243, 1020041, 'MD.FARHAD', NULL, 0, NULL, 0, 15, 453, NULL, 3020, 2567, 0, NULL, '2022-10-10', 'Customer Phone', 'Cash', '2022-10-10 20:28:43', '2022-10-10 20:28:43'),
(244, 1020041, 'MD.FARHAD', NULL, 0, NULL, 0, 15, 462, NULL, 3080, 2618, 0, NULL, '2022-10-10', 'Customer Phone', 'Cash', '2022-10-10 20:29:53', '2022-10-10 20:29:53'),
(245, 1020041, 'MD.FARHAD', NULL, 0, NULL, 0, 15, 462, NULL, 3080, 2618, 0, NULL, '2022-10-10', 'Customer Phone', 'Cash', '2022-10-10 20:30:42', '2022-10-10 20:30:42'),
(246, 1020041, 'MD.FARHAD', NULL, 0, NULL, 0, 15, 471, NULL, 3140, 2669, 0, NULL, '2022-10-10', 'Customer Phone', 'Cash', '2022-10-10 20:32:04', '2022-10-10 20:32:04'),
(247, 1020041, 'MD.FARHAD', NULL, 0, NULL, 0, NULL, 0, 15, 3140, 3125, 0, NULL, '2022-10-10', 'Customer Phone', 'Cash', '2022-10-10 20:33:22', '2022-10-10 20:33:22'),
(248, 1020041, 'MD.FARHAD', NULL, 0, NULL, 0, 15, 453, NULL, 3020, 2567, 0, NULL, '2022-10-10', 'Customer Phone', 'Cash', '2022-10-10 20:35:54', '2022-10-10 20:35:54'),
(249, 1020041, 'MD.FARHAD', NULL, 0, NULL, 0, 15, 453, NULL, 3020, 2567, 0, NULL, '2022-10-10', 'Customer Phone', 'Cash', '2022-10-10 20:37:40', '2022-10-10 20:37:40'),
(250, 1040008, 'MD.FARHAD', NULL, 0, NULL, 0, 15, 453, NULL, 3020, 2567, 3000, NULL, '2022-10-10', NULL, 'Cash', '2022-10-10 20:40:41', '2022-10-10 20:41:01'),
(251, 1040008, 'SH.RAJIB', NULL, 0, NULL, 0, 15, 269.25, NULL, 1795, 1525.75, 0, NULL, '2022-10-10', 'Customer Phone', 'Cash', '2022-10-10 20:49:10', '2022-10-10 20:49:10'),
(252, 1040008, 'SH.RAJIB', NULL, 0, NULL, 0, 1515, 45753, NULL, 3020, -42733, 0, NULL, '2022-10-10', 'Customer Phone', 'Cash', '2022-10-10 20:52:01', '2022-10-10 20:52:01'),
(253, 1020042, 'MD.SHOHEL (Ass. Manager)', NULL, 0, NULL, 0, 0, 0, 0, 750, 750, 625, NULL, '2022-10-11', NULL, 'Cash', '2022-10-11 11:24:11', '2022-10-11 13:44:42'),
(254, 1020042, 'MD.SHOHEL (Ass. Manager)', NULL, 0, NULL, 0, 10, 100, NULL, 1000, 900, 0, NULL, '2022-10-11', 'Customer Phone', 'Cash', '2022-10-11 11:24:39', '2022-10-11 11:24:39'),
(255, 1020042, 'MD.SHOHEL (Ass. Manager)', NULL, 0, NULL, 0, 10, 100, NULL, 1000, 900, 0, NULL, '2022-10-11', 'Customer Phone', 'Cash', '2022-10-11 11:24:47', '2022-10-11 11:24:47'),
(256, 1020042, 'MD.SHOHEL (Ass. Manager)', NULL, 0, NULL, 0, 10, 175, NULL, 1750, 1575, 0, NULL, '2022-10-11', 'Customer Phone', 'Cash', '2022-10-11 11:25:25', '2022-10-11 11:25:25'),
(257, 1020042, 'MD.SHOHEL (Ass. Manager)', NULL, 0, NULL, 0, 10, 100, NULL, 1000, 900, 0, NULL, '2022-10-11', 'Customer Phone', 'Cash', '2022-10-11 11:27:14', '2022-10-11 11:27:14'),
(258, 1020042, 'MD.SHOHEL (Ass. Manager)', NULL, 0, NULL, 0, 10, 100, NULL, 1000, 900, 0, NULL, '2022-10-11', 'Customer Phone', 'Cash', '2022-10-11 11:27:19', '2022-10-11 11:27:19'),
(259, 1030022, 'MD.SHOHEL (Ass. Manager)', NULL, 0, NULL, 0, 10, 100, NULL, 1000, 900, 1000, NULL, '2022-10-11', NULL, 'Cash', '2022-10-11 11:28:01', '2022-10-11 11:28:39'),
(260, 1020042, 'SH.RAJIB', NULL, 0, NULL, 0, NULL, 0, NULL, 180, 180, 0, NULL, '2022-10-11', 'Customer Phone', 'Cash', '2022-10-11 13:04:19', '2022-10-11 13:04:19'),
(261, 1020042, 'SH.RAJIB', NULL, 0, NULL, 0, NULL, 0, NULL, 180, 180, 0, NULL, '2022-10-11', 'Customer Phone', 'Cash', '2022-10-11 13:04:24', '2022-10-11 13:04:24'),
(262, 1030023, 'SH.RAJIB', NULL, 0, NULL, 0, NULL, 0, NULL, 180, 180, 180, NULL, '2022-10-11', NULL, 'Cash', '2022-10-11 13:05:36', '2022-10-11 13:05:47'),
(263, 1020042, 'SH.RAJIB', NULL, 0, NULL, 0, NULL, 0, NULL, 625, 625, 0, NULL, '2022-10-11', 'Customer Phone', 'Cash', '2022-10-11 13:41:16', '2022-10-11 13:41:16'),
(264, 1010065, 'MD.RUBEL', 0, 0, 0, 0, 0, 0, 0, 380, 380, 150, NULL, '2022-10-11', NULL, 'Cash', '2022-10-11 14:23:08', '2022-10-13 16:16:51'),
(265, 1030024, 'MD.SHOHEL (Ass. Manager)', 0, 0, 0, 0, 0, 0, NULL, 90, 90, 340, NULL, '2022-10-11', NULL, 'Cash', '2022-10-11 14:28:04', '2022-10-14 17:04:47'),
(266, 1030024, 'MD.RUBEL', NULL, 0, NULL, 0, 20, 18, NULL, 90, 72, 0, NULL, '2022-10-11', 'Customer Phone', 'Cash', '2022-10-11 14:29:57', '2022-10-11 14:29:57'),
(267, 1030024, 'MD.SHOHEL (Ass. Manager)', NULL, 0, NULL, 0, NULL, 0, NULL, 90, 90, 0, NULL, '2022-10-11', 'Customer Phone', 'Cash', '2022-10-11 14:32:08', '2022-10-11 14:32:08'),
(268, 1010065, 'MD.FARHAD', NULL, 0, NULL, 0, 15, 120, NULL, 800, 680, 0, NULL, '2022-10-11', 'Customer Phone', 'Cash', '2022-10-11 16:22:43', '2022-10-11 16:22:43'),
(269, 1010065, 'MD.FARHAD', NULL, 0, NULL, 0, 10, 80, NULL, 800, 720, 0, NULL, '2022-10-11', 'Customer Phone', 'Cash', '2022-10-11 16:23:00', '2022-10-11 16:23:00'),
(270, 1040009, 'MD.FARHAD', NULL, 0, NULL, 0, 0, 0, NULL, 800, 800, 625, NULL, '2022-10-11', NULL, 'Cash', '2022-10-11 16:23:45', '2022-10-14 17:00:57'),
(271, 1040009, 'MD.FARHAD', NULL, 0, NULL, 0, 10, 80, NULL, 800, 720, 0, NULL, '2022-10-11', 'Customer Phone', 'Cash', '2022-10-11 17:00:24', '2022-10-11 17:00:24'),
(272, 1050005, 'SH.RAJIB', NULL, 0, NULL, 0, NULL, 0, NULL, 330, 330, NULL, NULL, '2022-10-11', NULL, 'Cash', '2022-10-11 18:45:23', '2022-10-11 18:45:32'),
(273, 1050006, 'SH.RAJIB', NULL, 0, NULL, 0, NULL, 0, NULL, 500, 500, NULL, NULL, '2022-10-12', NULL, 'Cash', '2022-10-12 15:25:32', '2022-10-12 15:25:36'),
(274, 1020043, 'Farid Hosen', NULL, 0, NULL, 0, NULL, 0, NULL, 540, 540, 540, NULL, '2022-10-12', NULL, 'Cash', '2022-10-12 17:30:22', '2022-10-12 17:40:37'),
(275, 1010065, 'SH.RAJIB', NULL, 0, NULL, 0, NULL, 0, NULL, 320, 320, 0, NULL, '2022-10-12', 'Customer Phone', 'Cash', '2022-10-12 18:10:20', '2022-10-12 18:10:20'),
(276, 1010065, 'SH.RAJIB', NULL, 0, NULL, 0, NULL, 0, NULL, 25, 25, 0, NULL, '2022-10-13', 'Customer Phone', 'Cash', '2022-10-13 11:46:47', '2022-10-13 11:46:47'),
(277, 1010065, 'SH.RAJIB', NULL, 0, NULL, 0, NULL, 0, NULL, 150, 150, 0, NULL, '2022-10-13', 'Customer Phone', 'Cash', '2022-10-13 14:23:01', '2022-10-13 14:23:01'),
(278, 1020044, 'Farid Hosen', NULL, 0, NULL, 0, NULL, 0, NULL, 460, 460, 460, NULL, '2022-10-13', NULL, 'Cash', '2022-10-13 16:33:05', '2022-10-13 16:37:46'),
(279, 1020044, 'Farid Hosen', NULL, 0, NULL, 0, NULL, 0, NULL, 460, 460, 0, NULL, '2022-10-13', 'Customer Phone', 'Cash', '2022-10-13 16:33:12', '2022-10-13 16:33:12'),
(280, 1020044, 'Farid Hosen', NULL, 0, NULL, 0, NULL, 0, NULL, 460, 460, 0, NULL, '2022-10-13', 'Customer Phone', 'Cash', '2022-10-13 16:34:02', '2022-10-13 16:34:02'),
(281, 1010066, 'Farid Hosen', NULL, 0, NULL, 0, NULL, 0, NULL, 25, 25, 25, NULL, '2022-10-13', NULL, 'Cash', '2022-10-13 19:32:12', '2022-10-13 19:32:23'),
(282, 1010067, 'Farid Hosen', NULL, 0, NULL, 0, 10, 66.3, NULL, 663, 596.7, 600, NULL, '2022-10-14', NULL, 'Cash', '2022-10-14 14:18:03', '2022-10-14 14:21:47'),
(283, 1020045, 'MD.FARHAD', NULL, 0, NULL, 0, NULL, 0, NULL, 150, 150, 150, NULL, '2022-10-14', NULL, 'Cash', '2022-10-14 15:40:08', '2022-10-14 15:43:27'),
(284, 1010068, 'SH.RAJIB', NULL, 0, NULL, 0, NULL, 0, NULL, 400, 400, 400, NULL, '2022-10-14', NULL, 'Cash', '2022-10-14 16:13:57', '2022-10-14 16:14:52'),
(285, 1040009, 'MD.FARHAD', NULL, 0, NULL, 0, NULL, 0, NULL, 625, 625, 0, NULL, '2022-10-14', 'Customer Phone', 'Cash', '2022-10-14 16:54:43', '2022-10-14 16:54:43'),
(286, 1040009, 'MD.FARHAD', NULL, 0, NULL, 0, NULL, 0, NULL, 625, 625, 0, NULL, '2022-10-14', 'Customer Phone', 'Cash', '2022-10-14 16:57:51', '2022-10-14 16:57:51'),
(287, 1030024, 'SH.RAJIB', NULL, 0, NULL, 0, NULL, 0, NULL, 340, 340, 0, NULL, '2022-10-14', 'Customer Phone', 'Cash', '2022-10-14 17:01:46', '2022-10-14 17:01:46'),
(288, 1010069, 'SH.RAJIB', NULL, 0, NULL, 0, NULL, 0, NULL, 120, 120, 120, NULL, '2022-10-14', NULL, 'Cash', '2022-10-14 17:51:00', '2022-10-14 17:51:08'),
(289, 1010070, 'MD.FARHAD', NULL, 0, NULL, 0, 0, 0, 25, 255, 230, 230, NULL, '2022-10-14', NULL, 'Cash', '2022-10-14 18:01:30', '2022-10-14 18:44:52'),
(290, 1010071, 'MD.FARHAD', NULL, 0, NULL, 0, NULL, 0, NULL, 500, 500, 500, NULL, '2022-10-14', NULL, 'Cash', '2022-10-14 19:56:47', '2022-10-14 19:56:56'),
(291, 1010072, 'MD.FARHAD', NULL, 0, NULL, 0, 15, 127.5, 60, 850, 662.5, 662, NULL, '2022-10-15', NULL, 'Cash', '2022-10-15 12:42:28', '2022-10-15 12:54:14'),
(292, 1010073, 'SH.RAJIB', NULL, 0, NULL, 0, NULL, 0, NULL, 445, 445, 445, NULL, '2022-10-15', NULL, 'Cash', '2022-10-15 17:24:43', '2022-10-15 17:24:54'),
(293, 1010074, 'MD.FARHAD', NULL, 0, NULL, 0, NULL, 0, NULL, 2150, 2150, 2150, NULL, '2022-10-15', NULL, 'Cash', '2022-10-15 18:17:53', '2022-10-15 18:37:55'),
(294, 1020046, 'MD.FARHAD', NULL, 0, NULL, 0, NULL, 0, NULL, 90, 90, 90, NULL, '2022-10-15', NULL, 'Cash', '2022-10-15 18:34:46', '2022-10-15 18:37:30'),
(295, 1010075, 'SH.RAJIB', NULL, 0, NULL, 0, NULL, 0, NULL, 180, 180, 150, NULL, '2022-10-16', NULL, 'Cash', '2022-10-16 08:41:25', '2022-10-16 08:42:05'),
(296, 1010076, 'SH.RAJIB', NULL, 0, NULL, 0, NULL, 0, NULL, 1095, 1095, 1095, NULL, '2022-10-16', NULL, 'Cash', '2022-10-16 12:48:11', '2022-10-16 12:49:35'),
(297, 1010077, 'SH.RAJIB', NULL, 0, NULL, 0, NULL, 0, 20, 120, 100, 100, NULL, '2022-10-16', NULL, 'Cash', '2022-10-16 16:53:18', '2022-10-16 16:53:49'),
(298, 1010078, 'Farid Hosen', NULL, 0, NULL, 0, NULL, 0, NULL, 255, 255, 255, NULL, '2022-10-16', NULL, 'Cash', '2022-10-16 18:34:02', '2022-10-16 18:36:52'),
(299, 1010079, 'Farid Hosen', NULL, 0, NULL, 0, NULL, 0, NULL, 635, 635, 635, NULL, '2022-10-16', NULL, 'Cash', '2022-10-16 20:16:59', '2022-10-16 20:17:21'),
(300, 1010080, 'Farid Hosen', NULL, 0, NULL, 0, NULL, 0, NULL, 635, 635, 635, NULL, '2022-10-16', NULL, 'Cash', '2022-10-16 20:20:47', '2022-10-16 20:20:57'),
(301, 1020047, 'Farid Hosen', NULL, 0, NULL, 0, NULL, 0, NULL, 360, 360, 400, NULL, '2022-10-17', NULL, 'Cash', '2022-10-17 10:25:46', '2022-10-18 14:11:41'),
(302, 1030025, 'Farid Hosen', NULL, 0, NULL, 0, 0, 0, 20, 120, 100, 300, NULL, '2022-10-17', NULL, 'Cash', '2022-10-17 10:26:11', '2022-10-18 17:08:16'),
(303, 1050007, 'Farid Hosen', NULL, 0, 0, 0, 0, 0, NULL, 120, 120, 315, NULL, '2022-10-17', NULL, 'Cash', '2022-10-17 12:46:56', '2022-10-21 20:03:42'),
(304, 1010081, 'Farid Hosen', NULL, 0, NULL, 0, NULL, 0, 40, 240, 200, 200, NULL, '2022-10-17', NULL, 'Cash', '2022-10-17 14:33:51', '2022-10-17 14:34:02'),
(305, 1010082, 'Farid Hosen', NULL, 0, NULL, 0, NULL, 0, NULL, 600, 600, 600, NULL, '2022-10-17', NULL, 'Cash', '2022-10-17 16:01:25', '2022-10-17 16:06:01'),
(306, 1010083, 'Farid Hosen', NULL, 0, NULL, 0, NULL, 0, NULL, 160, 160, 160, NULL, '2022-10-17', NULL, 'Cash', '2022-10-17 17:16:16', '2022-10-17 17:16:40'),
(307, 1010084, 'SH.RAJIB', NULL, 0, NULL, 0, NULL, 0, NULL, 380, 380, 380, NULL, '2022-10-17', NULL, 'Cash', '2022-10-17 17:19:01', '2022-10-17 17:19:39'),
(308, 1020047, 'Farid Hosen', NULL, 0, NULL, 0, NULL, 0, 60, 360, 300, 0, NULL, '2022-10-17', 'Customer Phone', 'Cash', '2022-10-17 17:28:17', '2022-10-17 17:28:17'),
(309, 1010085, 'SH.RAJIB', NULL, 0, NULL, 0, 10, 56, 4, 560, 500, 500, NULL, '2022-10-17', NULL, 'Cash', '2022-10-17 18:58:51', '2022-10-17 19:05:45'),
(310, 1010086, 'SH.RAJIB', NULL, 0, NULL, 0, 10, 93, 0, 930, 837, 837, NULL, '2022-10-18', NULL, 'Cash', '2022-10-18 11:46:11', '2022-10-18 12:28:07'),
(311, 1010087, 'Farid Hosen', NULL, 0, NULL, 0, NULL, 0, NULL, 540, 540, 540, NULL, '2022-10-18', NULL, 'Cash', '2022-10-18 13:24:15', '2022-10-18 13:42:31'),
(312, 1020047, 'SH.RAJIB', NULL, 0, NULL, 0, NULL, 0, NULL, 400, 400, 0, NULL, '2022-10-18', 'Customer Phone', 'Cash', '2022-10-18 14:11:26', '2022-10-18 14:11:26'),
(313, 1010088, 'SH.RAJIB', NULL, 0, NULL, 0, 0, 0, 148, 1475, 1327, 1327, NULL, '2022-10-18', NULL, 'Cash', '2022-10-18 14:29:31', '2022-10-18 14:36:14'),
(314, 1030025, 'Farid Hosen', NULL, 0, NULL, 0, 10, 32, NULL, 320, 288, 0, NULL, '2022-10-18', 'Customer Phone', 'Cash', '2022-10-18 17:07:16', '2022-10-18 17:07:16'),
(315, 1010089, 'SH.RAJIB', NULL, 0, NULL, 0, NULL, 0, 2, 362, 360, 360, NULL, '2022-10-18', NULL, 'Cash', '2022-10-18 18:24:48', '2022-10-18 18:27:31'),
(316, 1010090, 'NAHODI HASAN SOHAN (Cashier)', NULL, 0, NULL, 0, 10, 53, NULL, 530, 477, 120, NULL, '2022-10-18', NULL, 'Cash', '2022-10-18 19:15:07', '2022-10-19 18:50:03'),
(317, 1020048, 'SH.RAJIB', NULL, 0, NULL, 0, 0, 0, 180, 590, 410, 1650, NULL, '2022-10-18', NULL, 'Cash', '2022-10-18 19:16:29', '2022-10-20 14:30:25'),
(318, 1020048, 'MD.SHOHEL (Ass. Manager)', NULL, 0, NULL, 0, 20, 48, NULL, 240, 192, 0, NULL, '2022-10-18', 'Customer Phone', 'Cash', '2022-10-18 19:17:20', '2022-10-18 19:17:20');
INSERT INTO `tableorders` (`id`, `order_id`, `wname`, `vat`, `vat_amount`, `s_charge`, `s_charge_amount`, `discount_percentage`, `discount_amount`, `discount_amount_number`, `tamount`, `final_amount`, `given_amount`, `cname`, `date`, `phone_no`, `payment_type`, `created_at`, `updated_at`) VALUES
(319, 1020048, 'MD.SHOHEL (Ass. Manager)', NULL, 0, NULL, 0, 20, 48, NULL, 240, 192, 0, NULL, '2022-10-18', 'Customer Phone', 'Cash', '2022-10-18 19:17:24', '2022-10-18 19:17:24'),
(320, 1020048, 'MD.SHOHEL (Ass. Manager)', NULL, 0, NULL, 0, 20, 48, NULL, 240, 192, 0, NULL, '2022-10-18', 'Customer Phone', 'Cash', '2022-10-18 19:17:30', '2022-10-18 19:17:30'),
(321, 1020048, 'MD.SHOHEL (Ass. Manager)', NULL, 0, NULL, 0, 20, 48, NULL, 240, 192, 0, NULL, '2022-10-18', 'Customer Phone', 'Cash', '2022-10-18 19:17:34', '2022-10-18 19:17:34'),
(322, 1050007, 'MD.SHOHEL (Ass. Manager)', NULL, 0, NULL, 0, 20, 106, NULL, 530, 424, 0, NULL, '2022-10-18', 'Customer Phone', 'Cash', '2022-10-18 19:17:56', '2022-10-18 19:17:56'),
(323, 1050007, 'MD.SHOHEL (Ass. Manager)', NULL, 0, NULL, 0, 25, 132.5, NULL, 530, 397.5, 0, NULL, '2022-10-18', 'Customer Phone', 'Cash', '2022-10-18 19:20:18', '2022-10-18 19:20:18'),
(324, 1050007, 'MD.SHOHEL (Ass. Manager)', NULL, 0, NULL, 0, 25, 132.5, NULL, 530, 397.5, 0, NULL, '2022-10-18', 'Customer Phone', 'Cash', '2022-10-18 19:27:23', '2022-10-18 19:27:23'),
(325, 1050007, 'MD.SHOHEL (Ass. Manager)', NULL, 0, NULL, 0, 25, 132.5, NULL, 530, 397.5, 0, NULL, '2022-10-18', 'Customer Phone', 'Cash', '2022-10-18 19:28:56', '2022-10-18 19:28:56'),
(326, 1050007, 'MD.SHOHEL (Ass. Manager)', NULL, 0, NULL, 0, 15, 79.5, NULL, 530, 450.5, 0, NULL, '2022-10-18', 'Customer Phone', 'Cash', '2022-10-18 19:29:06', '2022-10-18 19:29:06'),
(327, 1060004, 'SH.RAJIB', NULL, 0, NULL, 0, NULL, 0, NULL, 450, 450, 0, NULL, '2022-10-18', 'Customer Phone', 'Cash', '2022-10-18 19:46:27', '2022-10-18 19:46:27'),
(328, 1060005, 'Farid Hosen', NULL, 0, NULL, 0, NULL, 0, NULL, 350, 350, 500, NULL, '2022-10-19', NULL, 'Cash', '2022-10-19 11:40:35', '2022-10-19 11:44:51'),
(329, 1010090, 'SH.RAJIB', NULL, 0, NULL, 0, NULL, 0, NULL, 120, 120, 0, NULL, '2022-10-19', 'Customer Phone', 'Cash', '2022-10-19 17:04:29', '2022-10-19 17:04:29'),
(330, 1010090, 'SH.RAJIB', NULL, 0, NULL, 0, NULL, 0, NULL, 120, 120, 0, NULL, '2022-10-19', 'Customer Phone', 'Cash', '2022-10-19 17:44:21', '2022-10-19 17:44:21'),
(331, 1040010, 'SH.RAJIB', NULL, 0, NULL, 0, NULL, 0, 20, 120, 100, 100, NULL, '2022-10-19', NULL, 'Cash', '2022-10-19 18:10:00', '2022-10-19 18:10:24'),
(332, 1010091, 'SH.RAJIB', NULL, 0, NULL, 0, NULL, 0, NULL, 120, 120, 120, NULL, '2022-10-19', NULL, 'Cash', '2022-10-19 18:50:40', '2022-10-19 18:51:45'),
(333, 1010092, 'Farid Hosen', NULL, 0, NULL, 0, NULL, 0, NULL, 120, 120, 120, NULL, '2022-10-19', NULL, 'Cash', '2022-10-19 18:52:08', '2022-10-19 18:52:26'),
(334, 1030026, 'MD.FARHAD', NULL, 0, NULL, 0, 0, 0, 115, 25, -90, 450, NULL, '2022-10-19', NULL, 'Cash', '2022-10-19 19:12:41', '2022-10-20 18:03:44'),
(335, 1010093, 'SH.RAJIB', NULL, 0, NULL, 0, NULL, 0, NULL, 840, 840, 1000, NULL, '2022-10-19', NULL, 'Cash', '2022-10-19 19:35:23', '2022-10-19 19:36:21'),
(336, 1010094, 'MD.SHOHEL (Ass. Manager)', NULL, 0, NULL, 0, 0, 0, 15, 15, 0, 0, NULL, '2022-10-20', NULL, 'Cash', '2022-10-20 10:59:32', '2022-10-20 11:02:33'),
(337, 1010095, 'MD.FARHAD', NULL, 0, NULL, 0, 10, 32, 0, 320, 288, 500, NULL, '2022-10-20', NULL, 'Cash', '2022-10-20 12:12:43', '2022-10-20 12:14:51'),
(338, 1020048, 'SH.RAJIB', NULL, 0, NULL, 0, NULL, 0, NULL, 1830, 1830, 0, NULL, '2022-10-20', 'Customer Phone', 'Cash', '2022-10-20 14:25:34', '2022-10-20 14:25:34'),
(339, 1010096, 'MD.FARHAD', NULL, 0, NULL, 0, NULL, 0, NULL, 180, 180, 200, NULL, '2022-10-20', NULL, 'Cash', '2022-10-20 15:47:06', '2022-10-20 15:48:58'),
(340, 1030026, 'MD.FARHAD', NULL, 0, NULL, 0, 10, 56.5, NULL, 565, 508.5, 0, NULL, '2022-10-20', 'Customer Phone', 'Cash', '2022-10-20 18:01:33', '2022-10-20 18:01:33'),
(341, 1040011, 'MD.SHOHEL (Ass. Manager)', NULL, 0, NULL, 0, 0, 0, 80, 795, 715, 715, NULL, '2022-10-20', NULL, 'Cash', '2022-10-20 18:44:23', '2022-10-20 18:45:15'),
(342, 1020049, 'MD.FARHAD', NULL, 0, NULL, 0, 0, 0, 60, 625, 565, 565, NULL, '2022-10-20', NULL, 'Cash', '2022-10-20 18:54:24', '2022-10-20 18:55:12'),
(343, 1010097, 'MD.FARHAD', NULL, 0, NULL, 0, 20, 90, NULL, 450, 360, 360, NULL, '2022-10-20', NULL, 'Cash', '2022-10-20 18:59:02', '2022-10-20 19:02:52'),
(344, 1020050, 'SH.RAJIB', NULL, 0, NULL, 0, NULL, 0, NULL, 300, 300, 300, NULL, '2022-10-20', NULL, 'Cash', '2022-10-20 20:20:00', '2022-10-20 20:21:36'),
(345, 1020051, 'SH.RAJIB', NULL, 0, NULL, 0, NULL, 0, NULL, 1640, 1640, 2000, NULL, '2022-10-20', NULL, 'Cash', '2022-10-20 20:25:05', '2022-10-20 20:25:17'),
(346, 1010098, 'MD.FARHAD', NULL, 0, NULL, 0, NULL, 0, NULL, 350, 350, 350, NULL, '2022-10-20', NULL, 'Cash', '2022-10-20 21:47:33', '2022-10-20 21:49:59'),
(347, 1010098, 'MD.FARHAD', NULL, 0, NULL, 0, NULL, 0, NULL, 8200, 8200, 0, NULL, '2022-10-20', 'Customer Phone', 'Cash', '2022-10-20 21:48:20', '2022-10-20 21:48:20'),
(348, 1010098, 'MD.FARHAD', NULL, 0, NULL, 0, NULL, 0, NULL, 8200, 8200, 0, NULL, '2022-10-20', 'Customer Phone', 'Cash', '2022-10-20 21:48:24', '2022-10-20 21:48:24'),
(349, 1040012, 'MD.FARHAD', NULL, 0, NULL, 0, NULL, 0, NULL, 8200, 8200, 8200, NULL, '2022-10-20', NULL, 'Cash', '2022-10-20 21:48:56', '2022-10-20 21:49:15'),
(350, 1010099, 'SH.RAJIB', NULL, 0, NULL, 0, 0, 0, NULL, 1455, 1455, 1455, NULL, '2022-10-21', NULL, 'Cash', '2022-10-21 13:50:41', '2022-10-21 13:56:52'),
(351, 1010100, 'SH.RAJIB', NULL, 0, NULL, 0, NULL, 0, 20, 120, 100, 100, NULL, '2022-10-21', NULL, 'Cash', '2022-10-21 16:21:58', '2022-10-21 16:22:20'),
(352, 1010101, 'MD.FARHAD', 10, 100, 0, 0, 10, 100, NULL, 1000, 1000, 1000, NULL, '2022-10-21', NULL, 'Cash', '2022-10-21 19:12:58', '2022-10-21 19:20:01'),
(353, 1010101, 'MD.SHOHEL (Ass. Manager)', NULL, 0, NULL, 0, NULL, 0, NULL, 33455, 33455, 0, NULL, '2022-10-21', 'Customer Phone', 'Cash', '2022-10-21 19:33:51', '2022-10-21 19:33:51'),
(354, 1010102, 'MD.SHOHEL (Ass. Manager)', NULL, 0, NULL, 0, NULL, 0, NULL, 33455, 33455, 33455, NULL, '2022-10-21', NULL, 'Cash', '2022-10-21 19:37:35', '2022-10-21 19:53:15'),
(355, 1040013, 'MD.FARHAD', NULL, 0, NULL, 0, NULL, 0, NULL, 585, 585, 585, NULL, '2022-10-21', NULL, 'Cash', '2022-10-21 19:54:21', '2022-10-21 19:57:16'),
(356, 1050007, 'MD.FARHAD', NULL, 0, NULL, 0, NULL, 0, NULL, 315, 315, 0, NULL, '2022-10-21', 'Customer Phone', 'Cash', '2022-10-21 20:02:39', '2022-10-21 20:02:39'),
(357, 1010103, 'MD.FARHAD', NULL, 0, NULL, 0, NULL, 0, 20, 200, 180, 180, NULL, '2022-10-21', NULL, 'Cash', '2022-10-21 20:17:02', '2022-10-21 20:17:26'),
(358, 1010104, 'MD.FARHAD', NULL, 0, NULL, 0, NULL, 0, NULL, 320, 320, 320, NULL, '2022-10-22', NULL, 'Cash', '2022-10-22 12:00:38', '2022-10-22 12:01:10'),
(359, 1010105, 'MD.FARHAD', NULL, 0, NULL, 0, NULL, 0, NULL, 30, 30, 30, NULL, '2022-10-22', NULL, 'Cash', '2022-10-22 12:01:50', '2022-10-22 12:02:12'),
(360, 1010106, 'MD.FARHAD', NULL, 0, NULL, 0, NULL, 0, 10, 160, 150, 200, NULL, '2022-10-22', NULL, 'Cash', '2022-10-22 14:43:34', '2022-10-22 14:44:13'),
(361, 1010107, 'Farid hossain', NULL, 0, NULL, 0, NULL, 0, NULL, 960, 960, 1000, NULL, '2022-10-22', NULL, 'Cash', '2022-10-22 16:00:55', '2022-10-22 16:06:49'),
(362, 1010108, 'SH.RAJIB', NULL, 0, NULL, 0, NULL, 0, NULL, 300, 300, NULL, NULL, '2022-10-23', NULL, 'Cash', '2022-10-23 09:47:46', '2022-10-23 09:47:51'),
(363, 1010108, 'SH.RAJIB', NULL, 0, NULL, 0, NULL, 0, NULL, 0, 0, 0, NULL, '2022-10-23', 'Customer Phone', 'Cash', '2022-10-23 09:48:54', '2022-10-23 09:48:54'),
(364, 1010109, 'SH.RAJIB', NULL, 0, NULL, 0, NULL, 0, NULL, 500, 500, 500, NULL, '2022-10-23', NULL, 'Cash', '2022-10-23 11:05:33', '2022-10-23 11:06:59'),
(365, 1020052, 'MD.FARHAD', 10, 96.5, 0, 0, 10, 96.5, NULL, 965, 965, 965, NULL, '2022-10-23', NULL, 'Cash', '2022-10-23 16:10:13', '2022-10-23 16:24:39'),
(366, 1010110, 'Farid hossain', NULL, 0, NULL, 0, NULL, 0, NULL, 160, 160, 160, NULL, '2022-10-23', NULL, 'Cash', '2022-10-23 16:25:54', '2022-10-23 16:28:59'),
(367, 1010111, 'MD.FARHAD', NULL, 0, 5, 25.75, 5, 25.75, NULL, 515, 515, 515, NULL, '2022-10-23', NULL, 'Cash', '2022-10-23 17:44:34', '2022-10-23 17:48:49'),
(368, 1010111, 'MD.FARHAD', NULL, 0, 0, 0, NULL, 0, NULL, 515, 515, 0, NULL, '2022-10-23', 'Customer Phone', 'Cash', '2022-10-23 17:45:14', '2022-10-23 17:45:14'),
(369, 1010111, 'MD.FARHAD', NULL, 0, 0, 0, NULL, 0, NULL, 515, 515, 0, NULL, '2022-10-23', 'Customer Phone', 'Cash', '2022-10-23 17:45:52', '2022-10-23 17:45:52'),
(370, 1010111, 'MD.FARHAD', NULL, 0, 0, 0, NULL, 0, NULL, 515, 515, 0, NULL, '2022-10-23', 'Customer Phone', 'Cash', '2022-10-23 17:46:31', '2022-10-23 17:46:31'),
(371, 1040014, 'SH.RAJIB', NULL, 0, NULL, 0, NULL, 0, NULL, 500, 500, 500, NULL, '2022-10-23', NULL, 'Cash', '2022-10-23 18:06:01', '2022-10-23 18:09:11'),
(372, 1010111, 'MD.FARHAD', NULL, 0, NULL, 0, NULL, 0, NULL, 37000, 37000, 0, NULL, '2022-10-23', 'Customer Phone', 'Cash', '2022-10-23 18:24:55', '2022-10-23 18:24:55'),
(373, 1040015, 'MD.FARHAD', NULL, 0, NULL, 0, NULL, 0, NULL, 435, 435, 435, NULL, '2022-10-23', NULL, 'Cash', '2022-10-23 19:17:28', '2022-10-23 19:23:38'),
(374, 1030027, 'MD.FARHAD', NULL, 0, NULL, 0, NULL, 0, 69, 569, 500, 500, NULL, '2022-10-23', NULL, 'Cash', '2022-10-23 19:24:46', '2022-10-23 19:25:08'),
(375, 1010112, 'MD.RUBEL', NULL, 0, NULL, 0, NULL, 0, NULL, 395, 395, 395, NULL, '2022-10-23', NULL, 'Cash', '2022-10-23 20:06:41', '2022-10-23 20:08:45'),
(376, 1010113, 'SH.RAJIB', NULL, 0, NULL, 0, NULL, 0, NULL, 100, 100, 700, NULL, '2022-10-24', NULL, 'Cash', '2022-10-24 17:37:24', '2022-10-25 15:09:16'),
(377, 1010113, 'Farid hossain', NULL, 0, NULL, 0, NULL, 0, NULL, 700, 700, 0, NULL, '2022-10-25', 'Customer Phone', 'Cash', '2022-10-25 15:08:59', '2022-10-25 15:08:59'),
(378, 1020053, 'Farid hossain', NULL, 0, NULL, 0, NULL, 0, 2, 302, 300, 300, NULL, '2022-10-25', NULL, 'Cash', '2022-10-25 16:07:53', '2022-10-25 16:08:43'),
(379, 1010114, 'Farid hossain', NULL, 0, NULL, 0, NULL, 0, NULL, 770, 770, 770, NULL, '2022-10-25', NULL, 'Cash', '2022-10-25 16:36:55', '2022-10-25 16:39:13'),
(380, 1030028, 'SH.RAJIB', NULL, 0, NULL, 0, NULL, 0, NULL, 380, 380, 380, NULL, '2022-10-25', NULL, 'Cash', '2022-10-25 17:17:02', '2022-10-25 17:17:29'),
(381, 1030029, 'SH.RAJIB', NULL, 0, NULL, 0, NULL, 0, NULL, 3300, 3300, 3300, NULL, '2022-10-25', NULL, 'Cash', '2022-10-25 17:21:11', '2022-10-25 17:23:27'),
(382, 1030028, 'Farid hossain', NULL, 0, NULL, 0, NULL, 0, NULL, 160, 160, 0, NULL, '2022-10-25', 'Customer Phone', 'Cash', '2022-10-25 17:27:21', '2022-10-25 17:27:21'),
(383, 1030030, 'MD.FARHAD', NULL, 0, NULL, 0, NULL, 0, NULL, 295, 295, 295, NULL, '2022-10-25', NULL, 'Cash', '2022-10-25 17:56:14', '2022-10-25 18:09:34'),
(384, 1010115, 'SH.RAJIB', NULL, 0, NULL, 0, 0, 0, 120, 770, 650, 1160, NULL, '2022-10-25', NULL, 'Cash', '2022-10-25 18:15:53', '2022-10-25 19:02:02'),
(385, 1030030, 'MD.FARHAD', NULL, 0, NULL, 0, NULL, 0, NULL, 1280, 1280, 0, NULL, '2022-10-25', 'Customer Phone', 'Cash', '2022-10-25 18:53:54', '2022-10-25 18:53:54'),
(386, 1020054, 'MD.FARHAD', NULL, 0, NULL, 0, NULL, 0, NULL, 300, 300, 300, NULL, '2022-10-25', NULL, 'Cash', '2022-10-25 19:19:47', '2022-10-25 19:24:56'),
(387, 1010116, 'Farid hossain', NULL, 0, NULL, 0, NULL, 0, NULL, 420, 420, 420, NULL, '2022-10-25', NULL, 'Cash', '2022-10-25 20:15:13', '2022-10-25 20:16:54'),
(388, 1010117, 'SH.RAJIB', NULL, 0, NULL, 0, NULL, 0, 400, 2355, 1955, 1955, NULL, '2022-10-26', NULL, 'Cash', '2022-10-26 14:02:46', '2022-10-26 14:07:26'),
(389, 1010118, 'SH.RAJIB', NULL, 0, NULL, 0, NULL, 0, NULL, 225, 225, 225, NULL, '2022-10-26', NULL, 'Cash', '2022-10-26 14:13:00', '2022-10-26 14:13:17'),
(390, 1010119, 'SH.RAJIB', NULL, 0, NULL, 0, NULL, 0, NULL, 120, 120, 120, NULL, '2022-10-26', NULL, 'Cash', '2022-10-26 15:13:50', '2022-10-26 15:14:07'),
(391, 1010120, 'MD.ABDULLAH (Manager)', NULL, 0, NULL, 0, NULL, 0, 15, 4315, 4300, 4300, NULL, '2022-10-26', NULL, 'Cash', '2022-10-26 17:54:11', '2022-10-26 18:02:07'),
(392, 1020055, 'MD.ABDULLAH (Manager)', NULL, 0, NULL, 0, NULL, 0, NULL, 30, 30, 30, NULL, '2022-10-26', NULL, 'Cash', '2022-10-26 17:55:38', '2022-10-26 18:01:48'),
(393, 1010121, 'MD.ABDULLAH (Manager)', NULL, 0, NULL, 0, NULL, 0, NULL, 1400, 1400, 1400, NULL, '2022-10-26', NULL, 'Cash', '2022-10-26 18:04:40', '2022-10-26 18:04:55'),
(394, 1020056, 'MD.ABDULLAH (Manager)', NULL, 0, NULL, 0, 20, 995, NULL, 4975, 3980, 3980, NULL, '2022-10-26', NULL, 'Cash', '2022-10-26 19:22:22', '2022-10-26 19:28:27'),
(395, 1040016, 'SH.RAJIB', NULL, 0, NULL, 0, NULL, 0, NULL, 120, 120, 120, NULL, '2022-10-26', NULL, 'Cash', '2022-10-26 19:46:24', '2022-10-26 19:46:37'),
(396, 1030031, 'MD.FARHAD', NULL, 0, NULL, 0, NULL, 0, NULL, 170, 170, 170, NULL, '2022-10-26', NULL, 'Cash', '2022-10-26 19:48:31', '2022-10-26 19:51:44'),
(397, 1020057, 'Farid hossain', NULL, 0, NULL, 0, NULL, 0, 10, 590, 580, 580, NULL, '2022-10-26', NULL, 'Cash', '2022-10-26 19:58:13', '2022-10-26 20:09:47'),
(398, 1010122, 'MD.ABDULLAH (Manager)', 10, 1536, 5, 768, 15, 2304, 1360, 15360, 14000, 14000, NULL, '2022-10-26', NULL, 'Cash', '2022-10-26 20:01:25', '2022-10-26 20:07:41'),
(399, 1010123, 'MD.FARHAD', NULL, 0, NULL, 0, NULL, 0, NULL, 500, 500, 500, NULL, '2022-10-27', NULL, 'Cash', '2022-10-27 19:08:58', '2022-10-27 19:09:12'),
(400, 1010124, 'Farid hossain', NULL, 0, NULL, 0, NULL, 0, 100, 480, 380, 380, NULL, '2022-10-27', NULL, 'Cash', '2022-10-27 19:10:42', '2022-10-27 19:11:57'),
(401, 1010125, 'SH.RAJIB', NULL, 0, NULL, 0, NULL, 0, NULL, 735, 735, 735, NULL, '2022-10-27', NULL, 'Cash', '2022-10-27 19:13:33', '2022-10-27 19:14:01'),
(402, 1010126, 'MD.ABDULLAH (Manager)', NULL, 0, NULL, 0, NULL, 0, NULL, 120, 120, 120, NULL, '2022-10-27', NULL, 'Cash', '2022-10-27 19:21:18', '2022-10-27 19:21:32'),
(403, 1010127, 'SH.RAJIB', NULL, 0, NULL, 0, NULL, 0, 60, 360, 300, 300, NULL, '2022-10-27', NULL, 'Cash', '2022-10-27 19:36:17', '2022-10-27 19:39:54'),
(404, 1010128, 'SH.RAJIB', NULL, 0, NULL, 0, NULL, 0, NULL, 550, 550, 550, NULL, '2022-10-28', NULL, 'Cash', '2022-10-28 13:03:38', '2022-10-28 13:04:02'),
(405, 1010129, 'Farid hossain', NULL, 0, NULL, 0, NULL, 0, NULL, 300, 300, 300, NULL, '2022-10-28', NULL, 'Cash', '2022-10-28 15:45:31', '2022-10-28 15:54:23'),
(406, 1040017, 'SH.RAJIB', NULL, 0, NULL, 0, NULL, 0, NULL, 260, 260, 260, NULL, '2022-10-28', NULL, 'Cash', '2022-10-28 16:27:26', '2022-10-28 16:27:46'),
(407, 1020058, 'SH.RAJIB', NULL, 0, NULL, 0, NULL, 0, NULL, 685, 685, 515, NULL, '2022-10-28', NULL, 'Cash', '2022-10-28 16:47:46', '2022-10-28 18:10:48'),
(408, 1050008, 'MD.FARHAD', NULL, 0, NULL, 0, NULL, 0, NULL, 315, 315, 315, NULL, '2022-10-28', NULL, 'Cash', '2022-10-28 16:54:49', '2022-10-28 17:08:31'),
(409, 2100001, 'MD.FARHAD', NULL, 0, NULL, 0, NULL, 0, NULL, 1935, 1935, 1935, NULL, '2022-10-28', NULL, 'Cash', '2022-10-28 17:04:20', '2022-10-28 17:25:04'),
(410, 1010130, 'MD.FARHAD', NULL, 0, NULL, 0, NULL, 0, NULL, 135, 135, 135, NULL, '2022-10-28', NULL, 'Cash', '2022-10-28 17:13:31', '2022-10-28 17:13:44'),
(411, 1070003, 'MD.FARHAD', NULL, 0, NULL, 0, NULL, 0, NULL, 835, 835, 835, NULL, '2022-10-28', NULL, 'Cash', '2022-10-28 17:37:10', '2022-10-28 18:09:12'),
(412, 1020058, 'MD.FARHAD', NULL, 0, NULL, 0, NULL, 0, NULL, 515, 515, 0, NULL, '2022-10-28', 'Customer Phone', 'Cash', '2022-10-28 18:05:02', '2022-10-28 18:05:02'),
(413, 1010131, 'MD.SHOHEL (Ass. Manager)', NULL, 0, NULL, 0, 0, 0, 50, 300, 250, 250, NULL, '2022-10-28', NULL, 'Cash', '2022-10-28 18:51:06', '2022-10-28 18:52:21'),
(414, 1010131, 'MD.FARHAD', NULL, 0, NULL, 0, NULL, 0, NULL, 120, 120, 0, NULL, '2022-10-28', 'Customer Phone', 'Cash', '2022-10-28 18:55:30', '2022-10-28 18:55:30'),
(415, 1080001, 'MD.FARHAD', NULL, 0, NULL, 0, NULL, 0, NULL, 2010, 2010, 2010, NULL, '2022-10-28', NULL, 'Cash', '2022-10-28 19:01:26', '2022-10-28 19:02:21'),
(416, 1010132, 'MD.FARHAD', NULL, 0, NULL, 0, NULL, 0, NULL, 905, 905, 905, NULL, '2022-10-28', NULL, 'Cash', '2022-10-28 19:06:33', '2022-10-28 19:26:18'),
(417, 1010133, 'SH.RAJIB', NULL, 0, NULL, 0, NULL, 0, NULL, 7725, 7725, 7725, NULL, '2022-10-28', NULL, 'Cash', '2022-10-28 19:46:53', '2022-10-28 19:47:29'),
(418, 1010134, 'MD.FARHAD', NULL, 0, NULL, 0, NULL, 0, NULL, 475, 475, 1000, NULL, '2022-10-29', NULL, 'Cash', '2022-10-29 11:41:25', '2022-10-29 11:43:44'),
(419, 1010135, 'MD.FARHAD', NULL, 0, NULL, 0, NULL, 0, NULL, 775, 775, 1000, NULL, '2022-10-29', NULL, 'Cash', '2022-10-29 17:29:49', '2022-10-29 17:32:30'),
(420, 1050009, 'MD.FARHAD', NULL, 0, NULL, 0, NULL, 0, NULL, 445, 445, 500, NULL, '2022-10-29', NULL, 'Cash', '2022-10-29 18:25:01', '2022-10-29 18:31:34'),
(421, 1050009, 'MD.FARHAD', NULL, 0, NULL, 0, NULL, 0, NULL, 550, 550, 0, NULL, '2022-10-29', 'Customer Phone', 'Cash', '2022-10-29 18:25:37', '2022-10-29 18:25:37'),
(422, 1010136, 'SH.RAJIB', NULL, 0, NULL, 0, NULL, 0, NULL, 190, 190, 190, NULL, '2022-10-29', NULL, 'Cash', '2022-10-29 18:28:08', '2022-10-29 18:28:27'),
(423, 1010137, 'SH.RAJIB', NULL, 0, NULL, 0, NULL, 0, NULL, 2190, 2190, 550, NULL, '2022-10-29', NULL, 'Cash', '2022-10-29 18:34:06', '2022-10-30 12:40:25'),
(424, 1040018, 'SH.RAJIB', NULL, 0, NULL, 0, NULL, 0, NULL, 590, 590, 600, NULL, '2022-10-29', NULL, 'Cash', '2022-10-29 18:53:37', '2022-10-29 18:54:03'),
(425, 1070004, 'MD.FARHAD', NULL, 0, NULL, 0, NULL, 0, NULL, 230, 230, 230, NULL, '2022-10-29', NULL, 'Cash', '2022-10-29 19:15:58', '2022-10-29 19:40:24'),
(426, 1050010, 'Farid hossain', NULL, 0, NULL, 0, NULL, 0, 25, 525, 500, 500, NULL, '2022-10-29', NULL, 'Cash', '2022-10-29 19:23:47', '2022-10-29 19:27:37'),
(427, 1010137, 'MD.FARHAD', NULL, 0, NULL, 0, NULL, 0, NULL, 530, 530, 0, NULL, '2022-10-30', 'Customer Phone', 'Cash', '2022-10-30 12:38:50', '2022-10-30 12:38:50'),
(428, 1010138, 'Farid hossain', NULL, 0, NULL, 0, NULL, 0, 50, 250, 200, 200, NULL, '2022-10-30', NULL, 'Cash', '2022-10-30 16:10:13', '2022-10-30 16:11:01'),
(429, 1020059, 'SH.RAJIB', NULL, 0, NULL, 0, NULL, 0, NULL, 665, 665, 1000, NULL, '2022-10-30', NULL, 'Cash', '2022-10-30 16:39:36', '2022-10-30 16:42:16'),
(430, 1030032, 'SH.RAJIB', NULL, 0, NULL, 0, NULL, 0, NULL, 565, 565, 565, NULL, '2022-10-30', NULL, 'Cash', '2022-10-30 16:44:09', '2022-10-30 16:50:53'),
(431, 1030033, 'MD.FARHAD', NULL, 0, NULL, 0, 15, 60, NULL, 400, 340, 500, NULL, '2022-10-30', NULL, 'Cash', '2022-10-30 17:42:10', '2022-10-30 17:42:38'),
(432, 1030034, 'MD.SHOHEL (Ass. Manager)', NULL, 0, NULL, 0, NULL, 0, NULL, 80, 80, 80, NULL, '2022-10-30', NULL, 'Cash', '2022-10-30 18:00:02', '2022-10-30 18:00:48'),
(433, 1010139, 'MD.FARHAD', NULL, 0, NULL, 0, NULL, 0, NULL, 550, 550, 550, NULL, '2022-10-30', NULL, 'Cash', '2022-10-30 19:17:45', '2022-10-30 19:31:49'),
(434, 1020060, 'MD.ABDULLAH (Manager)', 10, 317, NULL, 0, NULL, 0, 87, 3170, 3400, 3400, NULL, '2022-10-31', NULL, 'Cash', '2022-10-31 13:10:19', '2022-10-31 13:11:44'),
(435, 1020061, 'MD.FARHAD', NULL, 0, NULL, 0, NULL, 0, 50, 300, 250, 250, NULL, '2022-10-31', NULL, 'Cash', '2022-10-31 13:29:25', '2022-10-31 13:29:54'),
(436, 1010140, 'MD.SHOHEL (Ass. Manager)', NULL, 0, NULL, 0, 20, 50, NULL, 250, 200, 200, NULL, '2022-10-31', NULL, 'Cash', '2022-10-31 14:36:17', '2022-10-31 14:36:50'),
(437, 1010141, 'MD.ABDULLAH (Manager)', NULL, 0, NULL, 0, NULL, 0, NULL, 6960, 6960, 6960, NULL, '2022-10-31', NULL, 'Cash', '2022-10-31 14:41:54', '2022-10-31 14:42:58'),
(438, 1020062, 'Farid hossain', NULL, 0, NULL, 0, NULL, 0, NULL, 230, 230, 230, NULL, '2022-10-31', NULL, 'Cash', '2022-10-31 16:02:17', '2022-10-31 16:08:43'),
(439, 1010142, 'MD.FARHAD', NULL, 0, NULL, 0, NULL, 0, 5, 415, 410, 410, NULL, '2022-10-31', NULL, 'Cash', '2022-10-31 16:09:21', '2022-10-31 16:17:15'),
(440, 1030035, 'MD.FARHAD', NULL, 0, NULL, 0, NULL, 0, NULL, 1275, 1275, 1500, NULL, '2022-10-31', NULL, 'Cash', '2022-10-31 17:04:56', '2022-10-31 17:12:57'),
(441, 1030036, 'MD.FARHAD', NULL, 0, NULL, 0, NULL, 0, 20, 360, 340, 340, NULL, '2022-10-31', NULL, 'Cash', '2022-10-31 18:51:15', '2022-10-31 19:18:48'),
(442, 1010143, 'MD.FARHAD', NULL, 0, NULL, 0, NULL, 0, NULL, 160, 160, 160, NULL, '2022-10-31', NULL, 'Cash', '2022-10-31 19:06:53', '2022-10-31 19:19:10'),
(443, 1010144, 'MD.SHOHEL (Ass. Manager)', NULL, 0, NULL, 0, NULL, 0, 50, 250, 200, 200, NULL, '2022-10-31', NULL, 'Cash', '2022-10-31 19:26:29', '2022-10-31 19:27:07'),
(444, 1010145, 'MD.ABDULLAH (Manager)', NULL, 0, NULL, 0, NULL, 0, 40, 440, 400, 400, NULL, '2022-10-31', NULL, 'Cash', '2022-10-31 19:41:01', '2022-10-31 19:41:54'),
(445, 1010146, 'MD.ABDULLAH (Manager)', NULL, 0, NULL, 0, NULL, 0, NULL, 1170, 1170, 2000, NULL, '2022-11-01', NULL, 'Cash', '2022-11-01 10:30:59', '2022-11-01 10:39:38'),
(446, 1010147, 'Farid hossain', NULL, 0, NULL, 0, NULL, 0, NULL, 550, 550, 550, NULL, '2022-11-01', NULL, 'Cash', '2022-11-01 16:31:56', '2022-11-01 16:40:58'),
(447, 1010148, 'Farid hossain', NULL, 0, NULL, 0, NULL, 0, NULL, 80, 80, 80, NULL, '2022-11-01', NULL, 'Cash', '2022-11-01 17:08:33', '2022-11-01 17:09:03'),
(448, 1010149, 'MD.FARHAD', NULL, 0, NULL, 0, NULL, 0, NULL, 340, 340, 340, NULL, '2022-11-01', NULL, 'Cash', '2022-11-01 17:19:44', '2022-11-01 17:20:11'),
(449, 1020063, 'Farid hossain', NULL, 0, NULL, 0, NULL, 0, NULL, 560, 560, 560, NULL, '2022-11-01', NULL, 'Cash', '2022-11-01 17:20:57', '2022-11-01 17:21:16'),
(450, 1010150, 'Farid hossain', NULL, 0, NULL, 0, NULL, 0, NULL, 440, 440, 160, NULL, '2022-11-01', NULL, 'Cash', '2022-11-01 18:09:31', '2022-11-02 15:02:02'),
(451, 1020064, 'MD.FARHAD', NULL, 0, NULL, 0, NULL, 0, NULL, 560, 560, 600, NULL, '2022-11-01', NULL, 'Cash', '2022-11-01 18:10:48', '2022-11-01 18:14:12'),
(452, 1020064, 'MD.FARHAD', NULL, 0, NULL, 0, NULL, 0, NULL, 560, 560, 0, NULL, '2022-11-01', 'Customer Phone', 'Cash', '2022-11-01 18:14:03', '2022-11-01 18:14:03'),
(453, 1010150, 'Farid hossain', NULL, 0, NULL, 0, NULL, 0, NULL, 160, 160, 0, NULL, '2022-11-02', 'Customer Phone', 'Cash', '2022-11-02 14:42:47', '2022-11-02 14:42:47'),
(454, 1010150, 'Farid hossain', NULL, 0, NULL, 0, NULL, 0, NULL, 160, 160, 0, NULL, '2022-11-02', 'Customer Phone', 'Cash', '2022-11-02 15:00:51', '2022-11-02 15:00:51'),
(455, 1030037, 'Farid hossain', NULL, 0, NULL, 0, NULL, 0, NULL, 680, 680, 720, NULL, '2022-11-02', NULL, 'Cash', '2022-11-02 16:42:40', '2022-11-04 18:09:15'),
(456, 1010151, 'MD.FARHAD', NULL, 0, NULL, 0, NULL, 0, 5, 655, 650, 650, NULL, '2022-11-02', NULL, 'Cash', '2022-11-02 16:51:56', '2022-11-02 16:53:10'),
(457, 1020065, 'MD.FARHAD', NULL, 0, NULL, 0, NULL, 0, 5, 555, 550, 555, NULL, '2022-11-02', NULL, 'Cash', '2022-11-02 16:55:35', '2022-11-02 17:05:59'),
(458, 1020065, 'MD.FARHAD', NULL, 0, NULL, 0, NULL, 0, 5, 555, 550, 0, NULL, '2022-11-02', 'Customer Phone', 'Cash', '2022-11-02 17:04:18', '2022-11-02 17:04:18'),
(459, 1010152, 'MD.FARHAD', NULL, 0, NULL, 0, NULL, 0, 5, 175, 170, 170, NULL, '2022-11-02', NULL, 'Cash', '2022-11-02 19:32:44', '2022-11-02 19:33:15'),
(460, 1020066, 'MD.FARHAD', NULL, 0, NULL, 0, NULL, 0, NULL, 1630, 1630, 1630, NULL, '2022-11-02', NULL, 'Cash', '2022-11-02 19:35:32', '2022-11-02 19:35:52'),
(461, 1020067, 'Farid hossain', NULL, 0, NULL, 0, NULL, 0, NULL, 150, 150, 150, NULL, '2022-11-02', NULL, 'Cash', '2022-11-02 20:13:39', '2022-11-02 20:13:53'),
(462, 1010153, 'Farid hossain', NULL, 0, NULL, 0, NULL, 0, NULL, 1500, 1500, 350, NULL, '2022-11-02', NULL, 'Cash', '2022-11-02 20:34:10', '2022-11-02 21:01:59'),
(463, 1020068, 'Farid hossain', NULL, 0, NULL, 0, NULL, 0, 40, 340, 300, 300, NULL, '2022-11-02', NULL, 'Cash', '2022-11-02 20:49:59', '2022-11-02 20:50:22'),
(464, 1010153, 'MD.FARHAD', NULL, 0, NULL, 0, NULL, 0, NULL, 350, 350, 0, NULL, '2022-11-02', 'Customer Phone', 'Cash', '2022-11-02 21:01:28', '2022-11-02 21:01:28'),
(465, 1010154, 'MD.FARHAD', NULL, 0, NULL, 0, NULL, 0, 5, 155, 150, 150, NULL, '2022-11-02', NULL, 'Cash', '2022-11-02 21:16:29', '2022-11-02 21:16:42'),
(466, 1010155, 'Farid hossain', NULL, 0, NULL, 0, NULL, 0, NULL, 50, 50, 50, NULL, '2022-11-03', NULL, 'Cash', '2022-11-03 15:05:58', '2022-11-03 15:06:16'),
(467, 1010156, 'MD.FARHAD', NULL, 0, NULL, 0, NULL, 0, 5, 305, 300, 300, NULL, '2022-11-03', NULL, 'Cash', '2022-11-03 17:00:16', '2022-11-03 17:00:39'),
(468, 1010157, 'Farid hossain', NULL, 0, NULL, 0, NULL, 0, NULL, 1360, 1360, 1360, NULL, '2022-11-03', NULL, 'Cash', '2022-11-03 18:21:56', '2022-11-03 18:26:30'),
(469, 1060006, 'MD.FARHAD', NULL, 0, NULL, 0, NULL, 0, NULL, 160, 160, 160, NULL, '2022-11-03', NULL, 'Cash', '2022-11-03 18:23:53', '2022-11-03 18:24:15'),
(470, 1060006, 'Farid hossain', NULL, 0, NULL, 0, NULL, 0, 110, 1360, 1250, 0, NULL, '2022-11-03', 'Customer Phone', 'Cash', '2022-11-03 18:25:17', '2022-11-03 18:25:17'),
(471, 1020069, 'MD.FARHAD', NULL, 0, NULL, 0, NULL, 0, 45, 545, 500, 500, NULL, '2022-11-03', NULL, 'Cash', '2022-11-03 18:28:35', '2022-11-03 18:28:55'),
(472, 1010158, 'Farid hossain', NULL, 0, NULL, 0, NULL, 0, NULL, 150, 150, 150, NULL, '2022-11-03', NULL, 'Cash', '2022-11-03 18:30:14', '2022-11-03 18:30:36'),
(473, 1010159, 'Farid hossain', NULL, 0, NULL, 0, NULL, 0, 50, 150, 100, 100, NULL, '2022-11-03', NULL, 'Cash', '2022-11-03 18:37:18', '2022-11-03 18:37:34'),
(474, 1040019, 'MD.FARHAD', NULL, 0, NULL, 0, NULL, 0, 15, 2965, 2950, 2950, NULL, '2022-11-03', NULL, 'Cash', '2022-11-03 19:07:31', '2022-11-03 19:07:57'),
(475, 1010159, 'Farid hossain', NULL, 0, NULL, 0, NULL, 0, NULL, 500, 500, 0, NULL, '2022-11-03', 'Customer Phone', 'Cash', '2022-11-03 19:13:00', '2022-11-03 19:13:00'),
(476, 1040019, 'MD.FARHAD', NULL, 0, NULL, 0, NULL, 0, NULL, 930, 930, 0, NULL, '2022-11-03', 'Customer Phone', 'Cash', '2022-11-03 19:17:31', '2022-11-03 19:17:31'),
(477, 1010160, 'Farid hossain', NULL, 0, NULL, 0, NULL, 0, NULL, 80, 80, 80, NULL, '2022-11-03', NULL, 'Cash', '2022-11-03 19:59:10', '2022-11-03 19:59:25'),
(478, 1010161, 'MD.FARHAD', NULL, 0, NULL, 0, NULL, 0, NULL, 350, 350, 350, NULL, '2022-11-03', NULL, 'Cash', '2022-11-03 20:27:43', '2022-11-03 20:27:57'),
(479, 1010162, 'MD.FARHAD', NULL, 0, NULL, 0, NULL, 0, 5, 530, 525, 525, NULL, '2022-11-04', NULL, 'Cash', '2022-11-04 15:53:03', '2022-11-04 15:53:18'),
(480, 1010163, 'Farid hossain', NULL, 0, NULL, 0, NULL, 0, NULL, 80, 80, 80, NULL, '2022-11-04', NULL, 'Cash', '2022-11-04 16:59:10', '2022-11-04 16:59:21'),
(481, 1020070, 'MD.FARHAD', NULL, 0, NULL, 0, NULL, 0, NULL, 50, 50, 50, NULL, '2022-11-04', NULL, 'Cash', '2022-11-04 17:08:53', '2022-11-04 17:09:04'),
(482, 1010164, 'MD.FARHAD', NULL, 0, NULL, 0, NULL, 0, NULL, 395, 395, 395, NULL, '2022-11-04', NULL, 'Cash', '2022-11-04 17:31:17', '2022-11-04 17:37:01'),
(483, 1030037, 'Farid hossain', NULL, 0, NULL, 0, NULL, 0, 70, 720, 650, 0, NULL, '2022-11-04', 'Customer Phone', 'Cash', '2022-11-04 18:08:15', '2022-11-04 18:08:15'),
(484, 1030037, 'Farid hossain', NULL, 0, NULL, 0, NULL, 0, 70, 720, 650, 0, NULL, '2022-11-04', 'Customer Phone', 'Cash', '2022-11-04 18:08:36', '2022-11-04 18:08:36'),
(485, 1030037, 'Farid hossain', NULL, 0, NULL, 0, NULL, 0, NULL, 800, 800, 0, NULL, '2022-11-04', 'Customer Phone', 'Cash', '2022-11-04 18:42:48', '2022-11-04 18:42:48'),
(486, 1010165, 'MD.FARHAD', NULL, 0, NULL, 0, NULL, 0, NULL, 755, 755, 755, NULL, '2022-11-04', NULL, 'Cash', '2022-11-04 19:06:30', '2022-11-04 19:07:28'),
(487, 1030038, 'MD.FARHAD', NULL, 0, NULL, 0, NULL, 0, NULL, 870, 870, 850, NULL, '2022-11-04', NULL, 'Cash', '2022-11-04 19:08:26', '2022-11-04 19:09:00'),
(488, 1040020, 'MD.FARHAD', NULL, 0, NULL, 0, NULL, 0, NULL, 465, 465, 465, NULL, '2022-11-04', NULL, 'Cash', '2022-11-04 19:13:02', '2022-11-04 19:13:24'),
(489, 1020071, 'Farid hossain', NULL, 0, NULL, 0, NULL, 0, 45, 745, 700, 700, NULL, '2022-11-04', NULL, 'Cash', '2022-11-04 19:38:19', '2022-11-04 19:38:35'),
(490, 1010166, 'Farid hossain', NULL, 0, NULL, 0, NULL, 0, NULL, 885, 885, 885, NULL, '2022-11-04', NULL, 'Cash', '2022-11-04 20:11:02', '2022-11-04 20:12:18'),
(491, 1010167, 'MD.FARHAD', NULL, 0, NULL, 0, NULL, 0, 40, 1040, 1000, 1000, NULL, '2022-11-05', NULL, 'Cash', '2022-11-05 12:50:07', '2022-11-05 13:00:52'),
(492, 1020072, 'MD.FARHAD', NULL, 0, NULL, 0, NULL, 0, NULL, 3815, 3815, 3815, NULL, '2022-11-05', NULL, 'Cash', '2022-11-05 13:35:14', '2022-11-05 13:35:56'),
(493, 1010168, 'MD.FARHAD', NULL, 0, NULL, 0, NULL, 0, NULL, 515, 515, 515, NULL, '2022-11-05', NULL, 'Cash', '2022-11-05 14:18:37', '2022-11-05 14:18:55'),
(494, 1010169, 'MD.FARHAD', NULL, 0, NULL, 0, NULL, 0, NULL, 400, 400, 400, NULL, '2022-11-05', NULL, 'Cash', '2022-11-05 15:22:19', '2022-11-05 15:22:38'),
(495, 1010170, 'MD.FARHAD', NULL, 0, NULL, 0, NULL, 0, NULL, 600, 600, 600, NULL, '2022-11-05', NULL, 'Cash', '2022-11-05 16:24:34', '2022-11-05 16:26:07'),
(496, 1010171, 'MD.FARHAD', NULL, 0, NULL, 0, NULL, 0, NULL, 770, 770, 770, NULL, '2022-11-05', NULL, 'Cash', '2022-11-05 16:28:50', '2022-11-05 16:29:34'),
(497, 1020073, 'MD.FARHAD', NULL, 0, NULL, 0, NULL, 0, NULL, 300, 300, 300, NULL, '2022-11-05', NULL, 'Cash', '2022-11-05 16:42:29', '2022-11-05 16:43:59'),
(498, 1010172, 'MD.FARHAD', NULL, 0, NULL, 0, NULL, 0, NULL, 330, 330, 280, NULL, '2022-11-05', NULL, 'Cash', '2022-11-05 17:17:09', '2022-11-05 17:23:05'),
(499, 1010172, 'MD.FARHAD', NULL, 0, NULL, 0, NULL, 0, 20, 330, 310, 0, NULL, '2022-11-05', 'Customer Phone', 'Cash', '2022-11-05 17:17:57', '2022-11-05 17:17:57'),
(500, 1010172, 'MD.FARHAD', NULL, 0, NULL, 0, NULL, 0, 20, 330, 310, 0, NULL, '2022-11-05', 'Customer Phone', 'Cash', '2022-11-05 17:18:45', '2022-11-05 17:18:45'),
(501, 1010172, 'MD.FARHAD', NULL, 0, NULL, 0, 5, 16.5, NULL, 330, 313.5, 0, NULL, '2022-11-05', 'Customer Phone', 'Cash', '2022-11-05 17:19:13', '2022-11-05 17:19:13'),
(502, 1010172, 'MD.FARHAD', NULL, 0, NULL, 0, NULL, 0, NULL, 280, 280, 0, NULL, '2022-11-05', 'Customer Phone', 'Cash', '2022-11-05 17:20:58', '2022-11-05 17:20:58'),
(503, 1010172, 'MD.FARHAD', NULL, 0, NULL, 0, NULL, 0, NULL, 280, 280, 0, NULL, '2022-11-05', 'Customer Phone', 'Cash', '2022-11-05 17:21:55', '2022-11-05 17:21:55'),
(504, 1010173, 'Farid hossain', NULL, 0, NULL, 0, NULL, 0, NULL, 440, 440, 440, NULL, '2022-11-05', NULL, 'Cash', '2022-11-05 17:26:33', '2022-11-05 17:27:37'),
(505, 1010173, 'Farid hossain', NULL, 0, NULL, 0, NULL, 0, NULL, 440, 440, 0, NULL, '2022-11-05', 'Customer Phone', 'Cash', '2022-11-05 17:26:43', '2022-11-05 17:26:43'),
(506, 1010173, 'Farid hossain', NULL, 0, NULL, 0, NULL, 0, NULL, 440, 440, 0, NULL, '2022-11-05', 'Customer Phone', 'Cash', '2022-11-05 17:27:16', '2022-11-05 17:27:16'),
(507, 1020074, 'Farid hossain', NULL, 0, NULL, 0, NULL, 0, 10, 450, 440, 440, NULL, '2022-11-05', NULL, 'Cash', '2022-11-05 18:14:45', '2022-11-05 18:15:03'),
(508, 1020075, 'MD.FARHAD', NULL, 0, NULL, 0, NULL, 0, 60, 360, 300, 300, NULL, '2022-11-05', NULL, 'Cash', '2022-11-05 18:26:04', '2022-11-05 18:26:56'),
(509, 1010174, 'Farid hossain', NULL, 0, NULL, 0, NULL, 0, NULL, 865, 865, 865, NULL, '2022-11-05', NULL, 'Cash', '2022-11-05 18:36:09', '2022-11-05 18:36:47'),
(510, 1010175, 'Farid hossain', NULL, 0, NULL, 0, NULL, 0, NULL, 840, 840, 840, NULL, '2022-11-06', NULL, 'Cash', '2022-11-06 13:44:35', '2022-11-06 13:45:01'),
(511, 1010176, 'Farid hossain', NULL, 0, NULL, 0, NULL, 0, 75, 200, 125, 2000, NULL, '2022-11-06', NULL, 'Cash', '2022-11-06 17:24:18', '2022-11-06 19:10:50'),
(512, 1020076, 'SH.RAJIB', NULL, 0, NULL, 0, NULL, 0, 50, 350, 300, 300, NULL, '2022-11-06', NULL, 'Cash', '2022-11-06 19:01:44', '2022-11-06 19:02:02'),
(513, 1030039, 'MD.FARHAD', NULL, 0, NULL, 0, NULL, 0, 5, 295, 290, 290, NULL, '2022-11-06', NULL, 'Cash', '2022-11-06 19:03:46', '2022-11-06 19:04:06'),
(514, 1010176, 'SH.RAJIB', NULL, 0, NULL, 0, NULL, 0, 75, 2075, 2000, 0, NULL, '2022-11-06', 'Customer Phone', 'Cash', '2022-11-06 19:10:09', '2022-11-06 19:10:09'),
(515, 1010177, 'SH.RAJIB', NULL, 0, NULL, 0, NULL, 0, NULL, 250, 250, 250, NULL, '2022-11-06', NULL, 'Cash', '2022-11-06 19:38:58', '2022-11-06 19:39:15');

-- --------------------------------------------------------

--
-- Table structure for table `tables`
--

CREATE TABLE `tables` (
  `id` int(11) NOT NULL,
  `email` varchar(55) NOT NULL,
  `tnumber` int(11) DEFAULT 1,
  `description` varchar(50) DEFAULT 'Table Position',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tables`
--

INSERT INTO `tables` (`id`, `email`, `tnumber`, `description`, `created_at`, `updated_at`) VALUES
(1, 'mdnayem.cse21@gmail.com', 1, 'South Side', '2022-07-07 17:20:22', '2022-07-07 17:20:40');

-- --------------------------------------------------------

--
-- Table structure for table `updateprice`
--

CREATE TABLE `updateprice` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `updated_price` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `is_admin` tinyint(1) DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `is_admin`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'MD. NAYEM', 'mdnayem.cse21@gmail.com', NULL, 1, '$2y$10$aqMA5wlkeNfwhKdMt3irp.wFSRKFVGEFAwGG/ZyssbRGbYIQDwIRC', NULL, '2021-12-28 01:43:28', '2021-12-28 01:43:28'),
(4, 'Nayem', 'nayemmd.cse21@gmail.com', NULL, NULL, '$2y$10$hLfXhTYyb11X7aeKvYRchuNWjzUOvp2PZy08pXhZvu3/i4BmtCGlu', NULL, '2022-07-21 09:46:10', '2022-07-21 09:46:10'),
(5, 'Arman', 'arman@gmail.com', NULL, NULL, '$2y$10$bU435TX8YD2nCIZSCDmUreflMKgGAv2oVEpMhS0FPkEgkDb1CaJIC', NULL, '2022-08-09 19:14:55', '2022-08-09 19:14:55');

-- --------------------------------------------------------

--
-- Table structure for table `waiters`
--

CREATE TABLE `waiters` (
  `id` int(11) NOT NULL,
  `email` varchar(55) NOT NULL,
  `name` varchar(55) DEFAULT 'Waiter Name',
  `phone` varchar(30) DEFAULT 'Waiter Phone',
  `address` varchar(100) DEFAULT 'Waiter Address',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `waiters`
--

INSERT INTO `waiters` (`id`, `email`, `name`, `phone`, `address`, `created_at`, `updated_at`) VALUES
(4, 'nayemmd.cse21@gmail.com', 'MD.FARHAD', '01876180214', 'KHULNA', '2022-08-28 12:03:02', '2022-08-28 12:03:02'),
(8, 'nayemmd.cse21@gmail.com', 'NAHODI HASAN SOHAN (Cashier)', '01727166226', 'BARISAL', '2022-08-28 12:07:27', '2022-09-16 13:03:53'),
(9, 'nayemmd.cse21@gmail.com', 'SH.RAJIB', NULL, 'FIROZPUR', '2022-09-08 12:57:43', '2022-10-01 11:42:36'),
(11, 'nayemmd.cse21@gmail.com', 'Farid hossain', '01973314973', 'khulna', '2022-10-22 16:00:33', '2022-10-22 16:00:33'),
(12, 'nayemmd.cse21@gmail.com', 'MD.ABDULLAH RAZU (Manager)', '01720409471', 'KHULNA', '2022-10-23 18:22:53', '2022-11-02 10:29:25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_user_id_foreign` (`user_id`),
  ADD KEY `carts_product_id_foreign` (`product_id`),
  ADD KEY `carts_order_id_foreign` (`order_id`);

--
-- Indexes for table `collectionstatement`
--
ALTER TABLE `collectionstatement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `collectiontable`
--
ALTER TABLE `collectiontable`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `companycarts`
--
ALTER TABLE `companycarts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_user_id_foreign` (`user_id`),
  ADD KEY `carts_product_id_foreign` (`product_id`),
  ADD KEY `carts_order_id_foreign` (`order_id`);

--
-- Indexes for table `companyorders`
--
ALTER TABLE `companyorders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order2s_payment_id_foreign` (`payment_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dailysaleRestaurant`
--
ALTER TABLE `dailysaleRestaurant`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dailysalestable`
--
ALTER TABLE `dailysalestable`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `damageproduct`
--
ALTER TABLE `damageproduct`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deliveryman`
--
ALTER TABLE `deliveryman`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `duetable`
--
ALTER TABLE `duetable`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expense`
--
ALTER TABLE `expense`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expensename`
--
ALTER TABLE `expensename`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ingredients`
--
ALTER TABLE `ingredients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kot`
--
ALTER TABLE `kot`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offer`
--
ALTER TABLE `offer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order2s_payment_id_foreign` (`payment_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `productaccount`
--
ALTER TABLE `productaccount`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `returncarts`
--
ALTER TABLE `returncarts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_user_id_foreign` (`user_id`),
  ADD KEY `carts_product_id_foreign` (`product_id`),
  ADD KEY `carts_order_id_foreign` (`order_id`);

--
-- Indexes for table `returnorders`
--
ALTER TABLE `returnorders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order2s_user_id_foreign` (`sr_id`),
  ADD KEY `order2s_payment_id_foreign` (`payment_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shop`
--
ALTER TABLE `shop`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sr`
--
ALTER TABLE `sr`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tablecarts`
--
ALTER TABLE `tablecarts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tableorders`
--
ALTER TABLE `tableorders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tables`
--
ALTER TABLE `tables`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `updateprice`
--
ALTER TABLE `updateprice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `waiters`
--
ALTER TABLE `waiters`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `collectionstatement`
--
ALTER TABLE `collectionstatement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `collectiontable`
--
ALTER TABLE `collectiontable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `companycarts`
--
ALTER TABLE `companycarts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `companyorders`
--
ALTER TABLE `companyorders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=271;

--
-- AUTO_INCREMENT for table `dailysaleRestaurant`
--
ALTER TABLE `dailysaleRestaurant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dailysalestable`
--
ALTER TABLE `dailysalestable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `damageproduct`
--
ALTER TABLE `damageproduct`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `deliveryman`
--
ALTER TABLE `deliveryman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `duetable`
--
ALTER TABLE `duetable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `expense`
--
ALTER TABLE `expense`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `expensename`
--
ALTER TABLE `expensename`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `food`
--
ALTER TABLE `food`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=604;

--
-- AUTO_INCREMENT for table `ingredients`
--
ALTER TABLE `ingredients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `kot`
--
ALTER TABLE `kot`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=589;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `offer`
--
ALTER TABLE `offer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `productaccount`
--
ALTER TABLE `productaccount`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `returncarts`
--
ALTER TABLE `returncarts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `returnorders`
--
ALTER TABLE `returnorders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `shop`
--
ALTER TABLE `shop`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sr`
--
ALTER TABLE `sr`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tablecarts`
--
ALTER TABLE `tablecarts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1144;

--
-- AUTO_INCREMENT for table `tableorders`
--
ALTER TABLE `tableorders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=516;

--
-- AUTO_INCREMENT for table `tables`
--
ALTER TABLE `tables`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `updateprice`
--
ALTER TABLE `updateprice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `waiters`
--
ALTER TABLE `waiters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
