-- phpMyAdmin SQL Dump
-- version 5.2.3deb1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 21, 2026 at 12:54 PM
-- Server version: 8.4.13-0ubuntu0.26.04.2
-- PHP Version: 8.5.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `yangon_atelier`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'Senior Curator',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `last_activity` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `role`, `created_at`) VALUES
(1, 'Phone Myat Win', 'phonemyatwin@gmail.com', '$2y$12$AORQ2nTld.nLYHxLDPeF.OZMtMW5BoxIog9Nu2cRceGfAVrOq.v3K', 'Founder & Principal Spatial Director', '2026-11-20 03:30:16'),
(2, 'Thae Nay Nwe Soe', 'thaenaynwesoe@gmail.com', '$2y$12$x0b5J4z1H7v2m39x9baIw.4l3ihXStNmYifVBk86f6fCbHMtqr/Me', 'Head of Interior Ergonomics & Living Cadence', '2026-11-20 05:56:20'),
(3, 'Su Thinzar Htet', 'suthinzarhtet@gmail.com', '$2y$12$DyLVTaytAS86q/zqfue52unxJQMYKxs9qfBLZlDW9h.6jp7KbZ8rS', 'Master Wood Craftsman & Joinery Conservator', '2026-11-20 08:43:54'),
(4, 'Myat Chal Oo', 'myatchaloo@gmail.com', '$2y$12$GGBNIcJMRutmjDJm.ct0cOn1IkKFSU180auVxNt8HNTmN4AuwQTMO', 'Material & Fine Textile Curator', '2026-11-20 08:47:28'),
(5, 'Nyi Nyi Aung', 'nyinyiaung@gmail.com', '$2y$12$.2ekN7fVQHKHdHF6a5sXLecdEvrZI2cQqKbISESU5LpymaUrFsBqG', 'Master Finishing Alchemist', '2026-11-20 08:48:22'),
(6, 'Min Khant Naung', 'minkhantnaung@gmail.com', '$2y$12$9AKEDGLeYN.g9EysOYJZsOaDRf2STgJm9hBCQTHflnFj50IwrWmQy', 'Showroom Concierge & Spatial Advisor', '2026-11-20 08:49:58');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `author` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Atelier Editorial',
  `author_id` int DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'Philosophy',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `author`, `author_id`, `image`, `content`, `category`, `created_at`) VALUES
(1, 'The Philosophy of Wabi-Sabi in Modern Interiors', 'Phone Myat Win', 1, '1795175089_blog1.jpg', 'In an era saturated by industrial high-gloss surfaces, clinical lines, and the constant digital flicker of notifications, our domestic environments have frequently sacrificed soul for sterile uniformity. Japanese philosophy offers an enduring antidote through the worldview of wabi-sabi: the appreciation of beauty that is imperfect, impermanent, and incomplete.\r\n\r\nWhen applied to the curation of the contemporary home, wabi-sabi does not signify austerity or neglected rusticity. Rather, it represents a deep reverence for authenticity. It encourages us to celebrate the natural swirl of teak grain, the gentle curvature of steam-bent walnut, and the tactile weave of undyed coarse linen that grows softer with every turn of the seasons.\r\n\r\nIntegrating this serene cadence into our living rooms begins not with acquiring more decorative accents, but with pruning away the superfluous: allow furniture pieces room to breathe, celebrate honest materials over synthetic imitations, and embrace subtle illumination that casts warm pools of indirect ambient light.', 'Philosophy', '2026-11-14 17:32:31'),
(2, 'Sustainable Forestry: Sourcing Reclaimed Teak & Oak', 'Thae Nay Nwe Soe', 2, '1795175223_blog2.jpg', 'Understanding the lifecycle of timber is central to ethical atelier furniture craft. We partner directly with certified forest stewardships to source responsibly felled walnut and salvaged historical teak.\r\n\r\nIn our Yangon workshop, timber undergoes a meticulous twelve-month moisture stabilization regimen. By allowing the wood fibers to adapt gradually to Southeast Asia\'s seasonal monsoon humidity cycles before milling, we ensure that mortise and tenon joints will remain tight and stable for generations without warping.\r\n\r\nEvery harvested trunk is tracked back to its specific community reserve. For every single specimen transformed into our furniture collection, our reforestation pact ensures that two native saplings are nurtured to maturity.', 'Craftsmanship', '2026-11-14 17:32:31'),
(3, 'Lighting Architecture: Sculpting Shadow and Warmth', 'Su Thinzar Htet', 3, '1795175258_blog3.jpg', 'Direct overhead downlights create clinical glare and sensory fatigue. In this spatial guide, we explore how low-profile floor lanterns, washi paper pendants, and indirect wall sconces establish restorative evening sanctuaries.\r\n\r\nLight should never be treated as a purely utilitarian tool to erase darkness; it is an architectural medium designed to sculpt warmth and define intimacy within living spaces. By positioning low-wattage warm illumination between 2200K and 2700K near the floor plane, our minds naturally transition toward restfulness and quiet contemplation.\r\n\r\nNatural parchment, woven hemp, and hand-spun paper shades filter harsh rays into soft, poetic gradients that reveal the subtle depths of solid timber furniture.', 'Spatial Design', '2026-11-14 17:32:31'),
(4, 'The Ritual of Morning Tea & Minimalist Dining', 'Myat Chal Oo', 4, '1795175295_blog4.jpg', 'Transforming the morning routine through uncluttered solid oak surfaces, tactile ceramic cups, and natural daylight.\r\n\r\nThe dining table serves as the spiritual heart of the home—a sanctuary where conversations linger and morning reflections unfold. When surfaces are stripped of clutter and synthetic finishes, the natural warmth of unvarnished timber invites the human palm, fostering grounded calm before the day demands our attention.\r\n\r\nPairing minimalist wooden benches with hand-thrown ceramic tableware creates a mindful dining ritual rooted in tactile presence and unhurried elegance.', 'Living Rituals', '2026-11-14 17:32:31'),
(5, 'Botanical Plant Waxes: Caring for Solid Wood', 'Nyi Nyi Aung', 5, '1795175324_blog5.jpg', 'Practical steps to protect unvarnished timber from dryness, humidity shifts, and everyday stains while preserving the velvet feel of the living grain.\r\n\r\nUnlike plastic polyurethane coatings that seal timber behind an impenetrable synthetic barrier, our proprietary blend of cold-pressed linseed oil, carnauba, and organic beeswax allows the wood to breathe. It responds naturally to indoor humidity changes while repelling spills.\r\n\r\nA seasonal application of botanical wax takes merely fifteen minutes and deepens the timber\'s golden honey patina over years of companionship.', 'Philosophy', '2026-11-14 17:32:31'),
(6, 'The Palette of Quietude: Earth Pigments in Living Spaces', 'Min Khant Naung', 6, '1795175370_blog6.jpg', 'Moving beyond sterile monochrome whites. How chalky lime-wash mineral paints, raw linen, and terracotta nuances bring organic depth to contemporary interior architecture.\r\n\r\nColor in the atelier home is never loud; it whispers. Drawing inspiration from river silt, dried palm thatch, toasted sesame, and damp clay, our palette anchors living spaces in the timeless tranquility of the natural landscape.\r\n\r\nWhen combined with natural timber furnishings, earth pigments reflect natural daylight with a soft velvety bloom that shifts subtly from morning dawn to evening twilight.', 'Interior Styling', '2026-11-14 17:32:31'),
(7, 'Tactile Bedrooms: Designing Restorative Sleep Sanctuaries', 'Phone Myat Win', 1, '1795175105_blog7.jpg', 'The modern bedroom should function as a sensory retreat—a quiet enclave shielded from the accelerated pace of the outside city.\r\n\r\nBy anchoring the room with a low-slung solid timber platform bed, breathable washed linen beddings, and natural woven rattan textures, we establish a grounded physical foundation for regenerative sleep. Removing visual clutter and artificial synthetics calms the nervous system and fosters deep tranquility.\r\n\r\nEvery tactile surface that meets the skin should offer gentle organic reassurance and thermal breathability.', 'Spatial Design', '2026-11-14 17:32:31'),
(8, 'Designing Quiet Havens in High-Density Cities', 'Thae Nay Nwe Soe', 2, '1795175232_blog8.jpg', 'How low-profile floor silhouettes, open spatial thresholds, and muted earth pigments buffer sensory fatigue in modern apartment dwellings.\r\n\r\nUrban living in fast-growing metropolitan centers like Yangon often places immense sensory demands upon our daily lives. Within our personal residences, we must intentionally cultivate spaces of decompression and silence.\r\n\r\nBy lowering the visual center of gravity through low-profile lounges and platform plinths, rooms feel dramatically taller and more expansive, granting residents a feeling of boundless horizon and internal peace.', 'Architecture', '2026-11-14 17:32:31');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'Pending Review',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `number`, `email`, `message`, `status`, `created_at`) VALUES
(1, 'Ye Win', '095173969', 'yewin@gmail.com', 'Hello, I would like to know more about your modern sofa collection and delivery options in Yangon. We are currently finishing an architectural residence in Yankin and looking for 2 living room modular lounge chairs and an oak dining set.', 'Archived', '2026-11-13 16:10:46'),
(2, 'Thida Htun', '095173903', 'thidahtun@gmail.com', 'Inquiring about trade discounts for our interior architecture studio in Bahan. We have three upcoming residential projects requiring custom dining tables.', 'Followed Up', '2026-11-13 16:10:46'),
(3, 'Win Yu Naing', '09757049524', 'winyunaing@gmail.com', 'Do you offer private weekend showroom viewings for bespoke walnut platform beds?', 'Pending Review', '2026-11-15 09:15:51');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int NOT NULL,
  `stock` int NOT NULL DEFAULT '0',
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `category` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Chairs',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `stock`, `image`, `description`, `category`, `created_at`) VALUES
(1, 'Nordic Solid Wood Armchair', 420000, 25, '1795085605_chair1.jpg', 'A sculptural meditation in Danish ergonomics and Japanese joint assembly. Shaped from certified American walnut, with curved continuous armrests hand-planed to invite the palm natural resting curvature.', 'chairs', '2026-11-13 16:10:10'),
(2, 'Curved Lounge Armchair', 580000, 50, '1795085619_chair2.jpg', 'Cocooning organic silhouette upholstered in heavyweight Belgian ivory bouclé wool. Resting upon an oiled oak plinth.', 'chairs', '2026-11-13 16:10:10'),
(3, 'Scandi Minimalist Dining Chair', 260000, 36, '1795085630_chair3.jpg', 'Crafted from reclaimed Burmese golden teak with mortise and tenon joinery. Lightweight yet extraordinarily durable.', 'chairs', '2026-11-13 16:10:10'),
(4, 'Rattan Occasional Lounge Chair', 490000, 14, '1795085688_chair4.jpg', 'Deep seating comfort with custom brass feet accents and natural hand-woven French cane weave backrest.', 'chairs', '2026-11-13 16:10:10'),
(5, 'Velvet Accent Atelier Chair', 520000, 6, '1795085700_chair5.jpg', 'Architectural spindle silhouette wrapped in custom emerald mohair velvet with linen cushions.', 'chairs', '2026-11-13 16:10:10'),
(6, 'Minimalist Turned Wooden Stool', 180000, 40, '1795085751_chair7.jpg', 'Solid turned hardwood stool and side plinth with satin wax finish.', 'chairs', '2026-11-13 16:10:10'),
(7, 'Bouclé Modular Sofa', 1250000, 8, '1795085777_couch1.jpg', 'Three-piece low-profile modular sofa offering fluid spatial arrangements and tactile softness.', 'sofas', '2026-11-13 16:10:10'),
(8, 'Curved Sculptural Lounge Sofa', 1480000, 12, '1795085795_couch2.jpg', 'Sweeping organic curvature upholstered in textured neutral bouclé, designed for open salon living spaces.', 'sofas', '2026-11-13 16:10:10'),
(9, 'Minimalist Linen Three-Seater', 1650000, 9, '1795085808_couch3.jpg', 'Generous proportions, deep feather-down cushioning, and unbleached Belgian linen removable slipcovers.', 'sofas', '2026-11-14 16:33:38'),
(10, 'Caramel Leather Chaise Longue', 2100000, 4, '1795085849_couch4.jpg', 'Vegetable-tanned full-grain aniline saddle leather over an architectural smoked oak base.', 'sofas', '2026-11-14 16:33:38'),
(11, 'Compact Nordic Loveseat', 890000, 15, '1795085870_couch5.jpg', 'Tailored two-seater ideal for intimate studies and apartments, featuring tapered solid ash legs.', 'sofas', '2026-11-14 16:33:38'),
(12, 'Solid Natural Oak Dining Table', 890000, 12, '1795086255_table1.jpg', 'Eight-seater architectural dining table crafted from sustainably sourced European white oak with chamfered edges.', 'tables', '2026-11-14 16:33:38'),
(13, 'Solid Walnut Executive Table', 1120000, 7, '1795086240_table2.jpg', 'Substantial book-matched American walnut top showcasing natural cathedral grain patterns.', 'tables', '2026-11-14 16:33:38'),
(14, 'Marble Low Coffee Table', 520000, 16, '1795086229_table3.jpg', 'Honed organic marble slab elevated on solid smoked oak plinth feet.', 'tables', '2026-11-14 16:33:38'),
(15, 'Travertine Architectural Side Table', 380000, 22, '1795086216_table4.jpg', 'Monolithic Roman travertine with unfilled porous texture and geometric cylindrical form.', 'tables', '2026-11-14 16:33:38'),
(16, 'Round Oak Bistro Dining Table', 640000, 18, '1795086204_table5.jpg', 'Centrally pedestal-mounted solid oak dining table creating unencumbered legroom.', 'tables', '2026-11-14 16:33:38'),
(17, 'Minimalist Solid Wood Desk', 750000, 11, '1795086189_table6.jpg', 'Integrated wire management channel, dual concealed shallow drawers, and solid timber construction.', 'tables', '2026-11-14 16:33:38'),
(18, 'Upholstered Platform Bed', 1480000, 10, '1795086159_bed1.jpg', 'Low-profile solid hardwood platform upholstered in textured wool bouclé with an integrated headboard ledge.', 'beds', '2026-11-14 16:33:38'),
(19, 'Japandi Low Tatami Bed', 1850000, 6, '1795086151_bed2.jpg', 'Wide low-slung frame in natural white oak inspired by traditional Japanese sleeping platforms.', 'beds', '2026-11-14 16:33:38'),
(20, 'Solid Oak Frame King Bed', 1720000, 8, '1795086140_bed3.jpg', 'Substantial architectural bedstead featuring mortise and tenon corner joints and rounded edge profiles.', 'beds', '2026-11-14 16:33:38'),
(21, 'Walnut Floating Low Bed', 1650000, 7, '1795086130_bed4.jpg', 'Recessed plinth base creating a serene weightless silhouette in master bedrooms.', 'beds', '2026-11-14 16:33:38'),
(22, 'Natural Linen Canopy Bed', 2250000, 4, '1795086120_bed5.jpg', 'Slender blackened steel and solid teak four-post framework dressed with sheer Belgian linen drapes.', 'beds', '2026-11-14 16:33:38'),
(23, 'Minimalist Queen Platform Bed', 1390000, 14, '1795086111_bed6.jpg', 'Clean horizontal lines with an angled ergonomic headboard for evening reading.', 'beds', '2026-11-14 16:33:38'),
(24, 'Nordic Timber Storage Bed', 1580000, 9, '1795086101_bed7.jpg', 'Concealed soft-close solid timber pull-out drawers integrated seamlessly beneath the mattress base.', 'beds', '2026-11-14 16:33:38'),
(25, 'Coastal Retreat Woven Bed', 1890000, 5, '1795086092_bed8.jpg', 'Intricately hand-woven Danish paper cord headboard framed in natural oil-treated white oak.', 'beds', '2026-11-14 16:33:38'),
(26, 'Woven Rattan Headboard Bed', 1620000, 8, '1795086065_bed9.jpg', 'Natural rattan weave paneling set into a curved steam-bent solid teak surround.', 'beds', '2026-11-14 16:33:38'),
(27, 'Modern Slate Upholstered Bed', 1790000, 6, '1795086058_bed10.jpg', 'Tailored Belgian linen upholstery in charcoal slate with brushed bronze recessed legs.', 'beds', '2026-11-14 16:33:38');

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `id` int NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscribers`
--

INSERT INTO `subscribers` (`id`, `email`, `created_at`) VALUES
(1, 'winthumon@gmail.com', '2026-11-13 16:10:46'),
(2, 'myatthinzarmaw@gmail.com', '2026-11-13 16:10:46'),
(3, 'kyawhtetaung@gmail.com', '2026-11-19 15:33:28');

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`id`, `name`, `position`, `image`, `created_at`) VALUES
(1, 'Phone Myat Win', 'Founder & Principal Architect', '1795110410_phonemyatwin.jpg', '2026-11-13 16:10:10'),
(2, 'Thae Nay Nwe Soe', 'Master Joinery Lead & Cabinetmaker', '1795110392_thaenaynwesoe.jpg', '2026-11-13 16:10:10'),
(3, 'Su Thinzar Htet', 'Head of Timber Procurement & Forestry', '1795110382_suthinzarhtet.jpg', '2026-11-13 16:10:10'),
(4, 'Myat Chal Oo', 'Lead Spatial & Interior Architect', '1795110374_myatchaloo.jpg', '2026-11-13 16:10:10'),
(5, 'Nyi Nyi Aung', 'Textile Conservator & Finishing Artisan', '1795110340_nyinyiaung.jpg', '2026-11-13 16:10:10'),
(6, 'Min Khant Naung', 'Showroom Director & Client Concierge', '1795110469_minkhantnaung.jpg', '2026-11-19 17:47:49');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `created_at`) VALUES
(1, 'Phone Myat Win', 'phonemyatwin@gmail.com', '$2y$12$z13C13TW3SdD5Uph65rrNuaxmEnjHITe0.DMqpus51MT/C5rsEYCC', '2026-11-20 08:58:10'),
(2, 'Thae Nay Nwe Soe', 'thaenaynwesoe@gmail.com', '$2y$12$D30LnzOH2GwFJkYMikeTiO6m3J4Hcp6uIYbaTbAbjrqGPdt5XuvTK', '2026-11-21 12:51:39'),
(3, 'Su Thinzar Htet', 'suthinzarhtet@gmail.com', '$2y$12$7AGLZJtPMdpmv3/PF.6Jp.UjDUJw4dp5hSiRrUW3dPtWpuRlsbY/6', '2026-11-21 12:52:25'),
(4, 'Myat Chal Oo', 'myatchaloo@gmail.com', '$2y$12$a628D6W69PZWXHSqVy4WQ.dRKfQ4ttBbMbVZ5WP.04.A1vPmffwIW', '2026-11-21 12:52:41'),
(5, 'Nyi Nyi Aung', 'nyinyiaung@gmail.com', '$2y$12$l7R0bBbSrytZ.C3UnhVfSuwBhEtrf9lZXOA1BIx8foVJ0I5bu/nL.', '2026-11-21 12:53:04'),
(6, 'Min Khant Naung', 'minkhantnaung@gmail.com', '$2y$12$cJiVeEWHS9pSsu1NrKOA5uyFs2J8GIqvZsGFnrgOqnkq3azOKLMVO', '2026-11-21 12:53:28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_blogs_admin` (`author_id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`name`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `team`
--
ALTER TABLE `team`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blogs`
--
ALTER TABLE `blogs`
  ADD CONSTRAINT `fk_blogs_admin` FOREIGN KEY (`author_id`) REFERENCES `admins` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
