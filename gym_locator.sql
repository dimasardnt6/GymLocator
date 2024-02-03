-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 03, 2024 at 09:24 AM
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
-- Database: `gym_locator`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gym_locator`
--

CREATE TABLE `gym_locator` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_gym` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `latitude` varchar(255) NOT NULL,
  `longitude` varchar(255) NOT NULL,
  `deskripsi_gym` varchar(255) NOT NULL,
  `nomor_telepon` varchar(12) NOT NULL,
  `harga_member` decimal(10,0) NOT NULL,
  `harga_visit` decimal(10,0) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `foto_gym` varchar(255) DEFAULT NULL,
  `jam_operasional` varchar(255) NOT NULL,
  `fasilitas_gym` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gym_locator`
--

INSERT INTO `gym_locator` (`id`, `nama_gym`, `alamat`, `latitude`, `longitude`, `deskripsi_gym`, `nomor_telepon`, `harga_member`, `harga_visit`, `created_at`, `updated_at`, `foto_gym`, `jam_operasional`, `fasilitas_gym`) VALUES
(1, 'Gym Nation Bandung', 'Jl. Mekar Laksana No.8B, Mekarwangi, Kec. Bojongloa Kidul, Kota Bandung, Jawa Barat 40234', '-6.953185566908248', '107.60392080992462', 'Tempat ini adalah perpaduan harmonis antara pusat kebugaran yang lengkap dan lingkungan yang memotivasi.', '089668214274', 500000, 50000, '2023-12-14 00:49:04', '2023-12-27 23:48:22', 'gym_images/esJ2Br13iE07D0sJ5erU37LojhsvY7tTrIZ9VZ4b.jpg', '08.00 - 23.00', '<ul><li><strong>Stationary Bike:</strong> Sepeda diam yang digunakan untuk latihan kardiovaskular.</li><li><strong>Dumbbell Rack:</strong> Rak untuk menyimpan dumbbell berbagai berat.</li><li><strong>Sauna Room:</strong> Ruangan sauna untuk relaksasi dan detoksifikasi.</li><li><strong>Fitness Classes:</strong> Kelas fitness seperti Zumba, Pilates, atau spinning.</li><li><strong>Stretching Area:</strong> Area khusus untuk latihan peregangan dan fleksibilitas.</li><li><strong>Locker Room:</strong> Ruang ganti dengan loker untuk menyimpan barang bawaan.</li></ul>'),
(3, 'Gym laqisya studio Bandung', 'Jl. Tirtawangi No.12, Cipagalo, Kec. Bojongsoang, Kabupaten Bandung, Jawa Barat 40287', '-6.974565479446338', '107.65387360006571', 'Tempat latihan kebugaran premium', '081222280079', 400000, 40000, '2023-12-14 01:33:19', '2023-12-27 23:48:58', 'gym_images/S0SgXDGXHHoDlXBCOmsdVkNvMvQZhmMUEIREdR9j.jpg', '09.00 - 23.00', '<ul><li><strong>Cardio Area:</strong> Tempat dengan treadmill, elliptical, dan sepeda statis untuk latihan kardiovaskular.</li><li><strong>Free Weights Section:</strong> Area dengan berbagai beban bebas seperti dumbbell, barbell, dan kettlebell.</li><li><strong>Weight Machines:</strong> Mesin latihan berat untuk target otot tertentu.</li><li><strong>Functional Training Zone:</strong> Area untuk latihan fungsional menggunakan TRX, bola kecil, dan alat kebugaran lainnya.</li><li><strong>Yoga Studio:</strong> Ruangan khusus untuk kelas yoga dan latihan pernapasan.</li></ul>'),
(4, 'Asia Gym Bandung', 'Komplek, Setra Duta Raya No.Ruko B, Sarijadi, Sukasari, Bandung City, West Java 40151', '-6.882436436145131', '107.5716930627823', 'Gym dengan fasilitas lengkap', '089626030199', 400000, 40000, '2023-12-14 01:37:36', '2023-12-27 23:49:35', 'gym_images/6TtUoHNIIkege06Y8QAdOHAsIMvR8TYw34ODyV58.jpg', '10.00 - 23.00', '<ul><li><strong>Cardio Area:</strong> Tempat yang dilengkapi dengan treadmill, sepeda statis, dan alat cardio lainnya untuk latihan kardiovaskular.</li><li><strong>Free Weights Section:</strong> Area dengan berbagai macam dumbbell, barbell, dan peralatan beban lainnya untuk latihan kekuatan.</li><li><strong>Weight Machines:</strong> Mesin latihan yang dirancang untuk melibatkan berbagai grup otot.</li><li><strong>Functional Training Zone:</strong> Ruang khusus untuk latihan fungsional seperti TRX, kettlebell, dan latihan tubuh bebas.</li><li><strong>Group Exercise Studio:</strong> Studio untuk kelas latihan berkelompok seperti aerobik, yoga, atau Zumba.</li></ul>'),
(11, 'Urban Gym', 'Jl. Dago Asri No.8 Blok A, Dago, Coblong, Bandung City, West Java 40135', '-6.8775962917706295', '107.61552270501853', 'Tempat gym terbaik di daerah bandung yang menyediakan berbagai fasilitas gym.', '0222534588', 300000, 35000, '2023-12-25 00:29:02', '2023-12-27 23:50:04', 'gym_images/HBqiHGLcKNlWZIzSJCaRe3BwNgIbfGU4H8Hozqcw.jpg', '10.00 - 23.00', '<ul><li><strong>Treadmill:</strong> Alat untuk berlari atau berjalan dalam ruangan.</li><li><strong>Dumbbells:</strong> Beban yang bisa dipegang dengan satu tangan untuk latihan beban.</li><li><strong>Bench Press:</strong> Alat untuk latihan angkat beban saat berbaring.</li><li><strong>Pull-Up Bars:</strong> Alat untuk latihan pull-up dan chin-up.</li><li><strong>Yoga Studio:</strong> Ruang untuk kelas yoga atau meditasi.</li><li><strong>Swimming Pool:</strong> Kolam renang untuk latihan berenang dan kesehatan.</li><li><strong>Boxing Ring:</strong> Tempat untuk latihan tinju atau olahraga beladiri.</li><li><strong>Functional Training Area:</strong> Area dengan alat-alat khusus untuk latihan fungsional.</li><li><strong>Cycling Studio:</strong> Ruang khusus untuk kelas spinning atau sepeda statis.</li></ul>'),
(12, '79 Gym Fitness Center', 'Jl. Pelesiran No.79, Tamansari, Kec. Bandung Wetan, Kota Bandung, Jawa Barat 40116', '-6.895384758468626', '107.6053131294499', '79 Gym Fitness Center adalah pusat kebugaran modern yang menawarkan berbagai fasilitas dan program untuk membantu Anda mencapai kesehatan dan kebugaran optimal.', '081221817441', 350000, 40000, '2023-12-25 00:32:50', '2023-12-26 01:01:15', 'gym_images/hWL3B3FOM2FVQ7Meet5wOKTOwci01PhuBiiQsW56.jpg', '08.00 - 22.00', '<ul><li><strong>Cardio Area:</strong> Area dengan peralatan kardiovaskular seperti treadmill, sepeda statis, dan elips.</li><li><strong>Free Weights Section:</strong> Ruang dengan berbagai dumbbell, barbell, dan peralatan latihan beban bebas.</li><li><strong>Strength Training Machines:</strong> Mesin latihan berat yang mengarah pada berbagai kelompok otot.</li><li><strong>Yoga Studio:</strong> Ruangan khusus untuk kelas yoga dan latihan kebugaran fleksibilitas.</li><li><strong>Group Exercise Room:</strong> Ruang untuk kelas latihan berkelompok seperti aerobik atau pilates.</li><li><strong>Indoor Cycling Studio:</strong> Studio khusus untuk kelas spinning atau sepeda statis berkelompok.</li><li><strong>Sauna and Steam Room:</strong> Fasilitas untuk relaksasi, detoksifikasi, dan pemulihan otot.</li></ul><div><br></div>'),
(13, 'Rebel Gym', 'Jl. Kyai Gede Utama No.14, Lebakgede, Kecamatan Coblong, Kota Bandung, Jawa Barat 40132', '-6.896557163282759', '107.6142905652523', 'Selamat datang di Rebel Gym, tempat di mana kekuatan dan semangat menyatu untuk menciptakan pengalaman kebugaran yang luar biasa. Rebel Gym adalah pusat kebugaran yang terbaik', '081220033666', 250000, 30000, '2023-12-25 00:39:30', '2023-12-27 23:51:26', 'gym_images/LCSImbf9HsAak7Zu0P5UGwapRNFNnzCaFEIpF5fG.jpg', '09.30 - 21.00', '<ul><li><strong>Cardio Area:</strong> Tempat khusus dengan berbagai peralatan kardiovaskular seperti treadmill, sepeda elips, dan alat lari.</li><li><strong>Free Weights Section:</strong> Area dengan dumbbell, barbell, dan alat beban lainnya untuk latihan kekuatan.</li><li><strong>Functional Training Zone:</strong> Ruang untuk latihan fungsional dengan peralatan seperti TRX, bola kecil, dan bangku senam.</li><li><strong>Indoor Cycling Studio:</strong> Studio khusus untuk kelas sepeda indoor dengan instruktur.</li><li><strong>Swimming Pool:</strong> Kolam renang untuk latihan kebugaran dan pemulihan.</li></ul><div><br></div>'),
(14, 'David Sports Gym Bandung', 'Jl. Lemahnendeut No.7, Sukawarna, Kec. Sukajadi, Kota Bandung, Jawa Barat 40164', '-6.883483311424952', '107.580286860466', 'David Sports Gym Bandung adalah destinasi utama bagi pecinta kebugaran yang mencari pengalaman terbaik dalam mencapai tujuan kesehatan mereka. Terletak di jantung Bandung, gym kami menawarkan fasilitas terdepan.', '08112340488', 350000, 35000, '2023-12-25 00:44:21', '2023-12-27 23:53:15', 'gym_images/tUAsXBnULUjUnFtLt3f1inwfmiz1x6lViNbRfnw3.png', '09.00 - 22.00', '<ul><li><strong>Free Weights Area:</strong> Area dengan berbagai macam dumbbell, barbell, dan alat beban bebas lainnya.</li><li><strong>Cardio Machines:</strong> Mesin-mesin seperti eliptikal, sepeda statis, dan treadmill untuk latihan kardiovaskular.</li><li><strong>Strength Training Equipment:</strong> Alat-alat untuk latihan kekuatan otot, seperti lat pulldown machine dan leg press machine.</li><li><strong>Yoga Studio:</strong> Ruang khusus untuk kelas yoga dan latihan peregangan.</li><li><strong>Group Exercise Rooms:</strong> Ruang untuk kelas latihan berkelompok seperti aerobik, Zumba, dan spinning.</li><li><strong>Swimming Pool:</strong> Kolam renang untuk latihan low-impact dan berenang.</li><li><strong>Sauna:</strong> Ruangan sauna untuk relaksasi dan detoksifikasi.</li><li><strong>Locker Rooms:</strong> Ruangan ganti dengan fasilitas shower dan penyimpanan barang.</li></ul>'),
(15, 'Tiger Gym', 'Jl. Indramayu No.2, Antapani Kidul, Kec. Antapani, Kota Bandung, Jawa Barat 40291', '-6.917823476440127', '107.65742417424919', 'Tiger Gym adalah tempat terbaik untuk mengejar impian kebugaran Anda. Dengan atmosfer yang energik dan fasilitas terkini, Tiger Gym menjadi pusat kebugaran yang menginspirasi', '085871442499', 200000, 25000, '2023-12-25 00:47:00', '2023-12-27 23:54:06', 'gym_images/SW9XMozlivRCU2TXS57nZhFwogCtCfXfxhfZGhaE.jpg', '08.00 - 22.00', '<ul><li><strong>Treadmill:</strong> Alat latihan lari yang digunakan untuk kardiovaskular.</li><li><strong>Dumbbells:</strong> Beban tangan untuk latihan kekuatan otot.</li><li><strong>Smith Machine:</strong> Alat latihan beban yang memberikan kestabilan selama latihan.</li><li><strong>Yoga Studio:</strong> Ruang khusus untuk kelas yoga dan latihan peregangan.</li><li><strong>Swimming Pool:</strong> Kolam renang untuk latihan kardiovaskular dan olahraga air.</li><li><strong>Stationary Bike:</strong> Sepeda statis untuk latihan kardiovaskular.</li><li><strong>Elliptical Trainer:</strong> Alat latihan seluruh tubuh dengan gerakan elips.</li><li><strong>Sauna Room:</strong> Ruangan sauna untuk relaksasi dan detoksifikasi.</li><li><strong>Weight Machines:</strong> Mesin latihan berat untuk target otot tertentu.</li><li><strong>Group Fitness Classes:</strong> Kelas latihan berkelompok seperti aerobik, Zumba, atau spinning.</li></ul>'),
(24, 'Gym Festival CityLink', 'Jalan Citylink', '-6.929542118296835', '107.58653640747072', 'Tempat gym terbaik di dekat Citylink', '081321766654', 500000, 70000, '2024-02-02 00:07:48', '2024-02-02 00:07:48', 'gym_images/1BIWI3Fn4fpJjPPWkvyW9hjQxoi3WjIahD0yraeY.png', '10.00 - 23.00', '<div>test</div>');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_12_14_061019_create_gym_locator', 1),
(6, '2023_12_21_150541_add_foto_gym_to_gym_locator', 2),
(7, '2023_12_22_080024_add_data_to_gym_locator', 3),
(8, '2023_12_26_090516_create_table_polygon', 4),
(9, '2023_12_26_091712_create_polygon', 5);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `polygon`
--

CREATE TABLE `polygon` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `gym_id` bigint(20) UNSIGNED NOT NULL,
  `latitude_polygon` varchar(255) NOT NULL,
  `longitude_polygon` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `polygon`
--

INSERT INTO `polygon` (`id`, `gym_id`, `latitude_polygon`, `longitude_polygon`, `created_at`, `updated_at`) VALUES
(37, 1, '-6.953163934238', '107.60390236974', '2023-12-27 23:48:22', '2023-12-27 23:48:22'),
(38, 1, '-6.9531619373761', '107.60393623263', '2023-12-27 23:48:22', '2023-12-27 23:48:22'),
(39, 1, '-6.9532052027157', '107.60393992066', '2023-12-27 23:48:22', '2023-12-27 23:48:22'),
(40, 1, '-6.9532085308186', '107.6039057225', '2023-12-27 23:48:22', '2023-12-27 23:48:22'),
(41, 3, '-6.9745132306072', '107.65383169055', '2023-12-27 23:48:58', '2023-12-27 23:48:58'),
(42, 3, '-6.9745368590638', '107.65393126756', '2023-12-27 23:48:58', '2023-12-27 23:48:58'),
(43, 3, '-6.9746217218208', '107.6539138332', '2023-12-27 23:48:58', '2023-12-27 23:48:58'),
(44, 3, '-6.9746000901391', '107.65381291509', '2023-12-27 23:48:58', '2023-12-27 23:48:58'),
(45, 4, '-6.8824331075434', '107.57161628455', '2023-12-27 23:49:35', '2023-12-27 23:49:35'),
(46, 4, '-6.8823934971815', '107.57174469531', '2023-12-27 23:49:35', '2023-12-27 23:49:35'),
(47, 4, '-6.8824440919289', '107.57176514715', '2023-12-27 23:49:35', '2023-12-27 23:49:35'),
(48, 4, '-6.8824946970729', '107.57164210081', '2023-12-27 23:49:35', '2023-12-27 23:49:35'),
(49, 11, '-6.8775683312307', '107.61548582464', '2023-12-27 23:50:04', '2023-12-27 23:50:04'),
(50, 11, '-6.8775769856837', '107.61556360871', '2023-12-27 23:50:04', '2023-12-27 23:50:04'),
(51, 11, '-6.8776262494902', '107.61555790901', '2023-12-27 23:50:04', '2023-12-27 23:50:04'),
(52, 11, '-6.8776182607651', '107.61548113078', '2023-12-27 23:50:04', '2023-12-27 23:50:04'),
(53, 12, '-6.8953189587114', '107.60527767241', '2023-12-27 23:50:29', '2023-12-27 23:50:29'),
(54, 12, '-6.8953156302001', '107.60534338653', '2023-12-27 23:50:29', '2023-12-27 23:50:29'),
(55, 12, '-6.89544144791', '107.60535210371', '2023-12-27 23:50:29', '2023-12-27 23:50:29'),
(56, 12, '-6.8954467735266', '107.60528773069', '2023-12-27 23:50:29', '2023-12-27 23:50:29'),
(57, 13, '-6.8964912797306', '107.61411890388', '2023-12-27 23:51:26', '2023-12-27 23:51:26'),
(58, 13, '-6.8964966053354', '107.61427849531', '2023-12-27 23:51:26', '2023-12-27 23:51:26'),
(59, 13, '-6.8964513376926', '107.61428117752', '2023-12-27 23:51:26', '2023-12-27 23:51:26'),
(60, 13, '-6.8964753029158', '107.61451452971', '2023-12-27 23:51:26', '2023-12-27 23:51:26'),
(61, 13, '-6.896665693257', '107.6145131886', '2023-12-27 23:51:26', '2023-12-27 23:51:26'),
(62, 13, '-6.8966563734519', '107.61411890388', '2023-12-27 23:51:26', '2023-12-27 23:51:26'),
(63, 14, '-6.8835631976824', '107.57996365428', '2023-12-27 23:53:15', '2023-12-27 23:53:15'),
(64, 14, '-6.8833954365263', '107.58026540279', '2023-12-27 23:53:15', '2023-12-27 23:53:15'),
(65, 14, '-6.8837243015939', '107.58054569364', '2023-12-27 23:53:15', '2023-12-27 23:53:15'),
(66, 14, '-6.8838228279261', '107.58043169975', '2023-12-27 23:53:15', '2023-12-27 23:53:15'),
(67, 14, '-6.883765576141', '107.58038341999', '2023-12-27 23:53:15', '2023-12-27 23:53:15'),
(68, 14, '-6.883881411141', '107.58023187518', '2023-12-27 23:53:15', '2023-12-27 23:53:15'),
(69, 15, '-6.9178068346753', '107.65738494694', '2023-12-27 23:54:06', '2023-12-27 23:54:06'),
(70, 15, '-6.9178091645224', '107.65745166689', '2023-12-27 23:54:06', '2023-12-27 23:54:06'),
(71, 15, '-6.9178431137219', '107.65745032579', '2023-12-27 23:54:06', '2023-12-27 23:54:06'),
(72, 15, '-6.9178394525338', '107.65738293529', '2023-12-27 23:54:06', '2023-12-27 23:54:06'),
(85, 24, '-6.9295284931903', '107.58639425039', '2024-02-02 00:07:48', '2024-02-02 00:07:48'),
(86, 24, '-6.9296256786742', '107.58675903082', '2024-02-02 00:07:48', '2024-02-02 00:07:48'),
(87, 24, '-6.9294486146955', '107.5867831707', '2024-02-02 00:07:48', '2024-02-02 00:07:48'),
(88, 24, '-6.9293767240385', '107.58649617434', '2024-02-02 00:07:48', '2024-02-02 00:07:48');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'Admin', 'admin@gmail.com', NULL, '$2y$10$kCA.sKJgm/Ji.mIUJwKmwuxaSxgA0Nd4IYV9IiefM9/J1hRNEy7pu', NULL, '2023-12-14 00:03:59', '2023-12-14 00:03:59');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `gym_locator`
--
ALTER TABLE `gym_locator`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `polygon`
--
ALTER TABLE `polygon`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gym_id` (`gym_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gym_locator`
--
ALTER TABLE `gym_locator`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `polygon`
--
ALTER TABLE `polygon`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `polygon`
--
ALTER TABLE `polygon`
  ADD CONSTRAINT `polygon_ibfk_1` FOREIGN KEY (`gym_id`) REFERENCES `gym_locator` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
