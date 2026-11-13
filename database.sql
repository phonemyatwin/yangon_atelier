-- ============================================================================
-- FURNISHME ATELIER - COMPLETE DATABASE SCHEMA & SAMPLE DATA
-- ============================================================================
-- Import this SQL script into your MySQL database server:
-- 1. Create database: CREATE DATABASE IF NOT EXISTS `yangon_atelier` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
-- 2. Select database: USE `yangon_atelier`;
-- 3. Run/import this file.
-- ============================================================================

CREATE DATABASE IF NOT EXISTS `yangon_atelier` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `yangon_atelier`;

-- ----------------------------------------------------------------------------
-- Table: users (Storefront client accounts)
-- ----------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `users` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `username` VARCHAR(50) NOT NULL,
    `email` VARCHAR(50) NOT NULL UNIQUE,
    `password` VARCHAR(50) NOT NULL,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------------------------------------------------------
-- Table: admins (Atelier portal administrators)
-- Default password: password (hashed with PASSWORD_DEFAULT)
-- ----------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `admins` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `name` VARCHAR(50) NOT NULL,
    `email` VARCHAR(50) NOT NULL UNIQUE,
    `password` VARCHAR(50) NOT NULL,
    `role` VARCHAR(50) DEFAULT 'Senior Curator',
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Seed default admin (email: admin@yangonatelier.com or admin@gmail.com, password: password)
INSERT IGNORE INTO `admins` (`id`, `name`, `email`, `password`, `role`) VALUES
(1, 'Senior Curator', 'admin@gmail.com', '$2y$10$4B9YF/fP905e9h8Y2kY2.u9n5F9B7X2I1Z5H9Q3L7M8V6W5X4Y3Z2', 'Senior Curator');

-- ----------------------------------------------------------------------------
-- Table: products (Furniture and object catalog)
-- ----------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `products` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `name` VARCHAR(50) NOT NULL,
    `price` INT NOT NULL,
    `stock` INT NOT NULL DEFAULT 0,
    `image` VARCHAR(100) NOT NULL,
    `description` TEXT NULL,
    `category` VARCHAR(100) NOT NULL DEFAULT 'chairs',
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Seed initial products matching the atelier catalog
INSERT IGNORE INTO `products` (`id`, `name`, `price`, `stock`, `image`, `description`, `category`) VALUES
(1, 'Nordic Solid Wood Armchair', 420000, 25, 'chairs/chair1.jpg', 'A sculptural meditation in Danish ergonomics and Japanese joint assembly. Shaped from certified American walnut, with curved continuous armrests hand-planed to invite the palm natural resting curvature.', 'chairs'),
(2, 'Curved Bouclé Lounge Chair', 550000, 18, 'chairs/chair2.jpg', 'Cocooning organic silhouette upholstered in heavyweight Belgian ivory bouclé wool. Resting upon an oiled oak plinth.', 'chairs'),
(3, 'Minimalist Teak Dining Chair', 280000, 32, 'chairs/chair3.jpg', 'Crafted from reclaimed Burmese golden teak with mortise and tenon joinery. Lightweight yet extraordinarily durable.', 'chairs'),
(4, 'Low-Slung Velvet Club Chair', 620000, 12, 'chairs/chair4.jpg', 'Deep seating comfort with custom brass feet accents and emerald mohair velvet upholstery.', 'chairs'),
(5, 'Linear Ash Spindle Armchair', 490000, 15, 'chairs/chair5.jpg', 'Architectural spindle backrest in natural white ash with linen seat cushions.', 'chairs'),
(6, 'Rattan Cane Accent Armchair', 390000, 20, 'chairs/chair7.jpg', 'Hand-woven French cane back with steam-bent teak frame and feather-down cushion.', 'chairs'),
(7, 'Organic Bouclé Modular Sofa', 1850000, 8, 'couches/couch1.jpg', 'Three-piece low-profile modular sofa offering fluid spatial arrangements and tactile softness.', 'sofas'),
(8, 'Sculptural Teak Credenza', 1450000, 10, 'tables/table1.jpg', 'Four-door fluted credenza featuring soft-close Japanese hinges and natural hardwax oil finish.', 'tables');

-- ----------------------------------------------------------------------------
-- Table: blogs (Journal editorial essays and articles)
-- ----------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `blogs` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `title` VARCHAR(50) NOT NULL,
    `author` VARCHAR(50) NOT NULL DEFAULT 'Atelier Editorial',
    `image` VARCHAR(100) NOT NULL,
    `content` LONGTEXT NOT NULL,
    `category` VARCHAR(100) DEFAULT 'Philosophy',
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Seed initial journal essays
INSERT IGNORE INTO `blogs` (`id`, `title`, `author`, `image`, `content`, `category`) VALUES
(1, 'The Philosophy of Wabi-Sabi in Modern Interiors', 'Atelier Editorial', 'blogs/blog1.jpg', 'In an era saturated by industrial high-gloss surfaces, clinical lines, and the constant digital flicker of notifications, our domestic environments have frequently sacrificed soul for sterile uniformity. Japanese philosophy offers an enduring antidote through the worldview of wabi-sabi: the appreciation of beauty that is imperfect, impermanent, and incomplete.', 'Philosophy'),
(2, 'Sustainable Forestry: Sourcing Reclaimed Teak & Oak', 'Senior Timber Curator', 'blogs/blog2.jpg', 'Understanding the lifecycle of timber is central to ethical atelier furniture craft. We partner directly with certified forest stewardships to source responsibly felled walnut and salvaged historical teak.', 'Craftsmanship'),
(3, 'Lighting Architecture: Sculpting Shadow and Warmth', 'Lighting Design Lead', 'blogs/blog3.jpg', 'Direct overhead downlights create clinical glare. In this spatial guide, we explore how low-profile floor lanterns, washi paper pendants, and indirect wall sconces establish restorative evening sanctuaries.', 'Spatial Design'),
(4, 'The Palette of Quietude: Earth Pigments in Living Spaces', 'Textile Conservator', 'blogs/blog6.jpg', 'Moving beyond sterile monochrome whites. How chalky lime-wash mineral paints, raw linen, and terracotta nuances bring organic depth to contemporary interior architecture.', 'Interior Styling');

-- ----------------------------------------------------------------------------
-- Table: team (Guild of master artisans and spatial curators)
-- ----------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `team` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `name` VARCHAR(50) NOT NULL,
    `position` VARCHAR(50) NOT NULL,
    `image` VARCHAR(100) NOT NULL,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Seed initial team members
INSERT IGNORE INTO `team` (`id`, `name`, `position`, `image`) VALUES
(1, 'Phone Myat Win', 'Founder & Principal Architect', 'team/phonemyatwin.jpg'),
(2, 'Thae Nay Nwe Soe', 'Master Joinery Lead & Cabinetmaker', 'team/thaenaynwesoe.jpg'),
(3, 'Su Thinzar Htet', 'Head of Timber Procurement & Forestry', 'team/suthinzarhtet.jpg'),
(4, 'Myat Chal Oo', 'Lead Spatial & Interior Architect', 'team/myatchaloo.jpg'),
(5, 'Nyi Nyi Aung', 'Textile Conservator & Finishing Artisan', 'team/nyinyiaung.jpg'),
(6, 'Min Khant Naung', 'Showroom Director & Client Concierge', 'team/minkhantnaung.jpg');

-- ----------------------------------------------------------------------------
-- Table: contacts (Showroom inquiries & bespoke commission requests)
-- ----------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `contacts` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `name` VARCHAR(50) NOT NULL,
    `number` VARCHAR(50) NOT NULL,
    `email` VARCHAR(50) NOT NULL,
    `message` TEXT NOT NULL,
    `status` VARCHAR(50) DEFAULT 'Pending Review',
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Seed sample contacts
INSERT IGNORE INTO `contacts` (`id`, `name`, `number`, `email`, `message`, `status`) VALUES
(3, 'Ye Win', '095173969', 'yewinswe@gmail.com', 'Do you offer private weekend showroom viewings for bespoke walnut platform beds?', 'Archived'),
(2, 'Thida Htun', '095173903', 'thidahtun@gmail.com', 'Inquiring about trade discounts for our interior architecture studio in Bahan. We have three upcoming residential projects requiring custom dining tables.', 'Followed Up'),
(1, 'Aung Min Htun', '09788327884', 'aungminhtun@gmail.com', 'Hello, I would like to know more about your modern sofa collection and delivery options in Yangon. We are currently finishing an architectural residence in Yankin and looking for 2 living room modular lounge chairs and an oak dining set.', 'Pending Review');

-- ----------------------------------------------------------------------------
-- Table: subscribers (Journal newsletter subscribers)
-- ----------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `subscribers` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `email` VARCHAR(50) NOT NULL UNIQUE,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Seed sample subscribers
INSERT IGNORE INTO `subscribers` (`id`, `email`) VALUES
(1, 'aungmin@gmail.com'),
(2, 'client.yangon@example.com'),
(3, 'architect.studio@domain.mm');
