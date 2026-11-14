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
    `name` VARCHAR(255) NOT NULL,
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
(2, 'Curved Lounge Armchair', 580000, 50, 'chairs/chair2.jpg', 'Cocooning organic silhouette upholstered in heavyweight Belgian ivory bouclé wool. Resting upon an oiled oak plinth.', 'chairs'),
(3, 'Scandi Minimalist Dining Chair', 260000, 36, 'chairs/chair3.jpg', 'Crafted from reclaimed Burmese golden teak with mortise and tenon joinery. Lightweight yet extraordinarily durable.', 'chairs'),
(4, 'Rattan Occasional Lounge Chair', 490000, 14, 'chairs/chair4.jpg', 'Deep seating comfort with custom brass feet accents and natural hand-woven French cane weave backrest.', 'chairs'),
(5, 'Velvet Accent Atelier Chair', 520000, 6, 'chairs/chair5.jpg', 'Architectural spindle silhouette wrapped in custom emerald mohair velvet with linen cushions.', 'chairs'),
(6, 'Minimalist Turned Wooden Stool', 180000, 40, 'chairs/chair7.jpg', 'Solid turned hardwood stool and side plinth with satin wax finish.', 'chairs'),
(7, 'Bouclé Modular Sofa', 1250000, 8, 'couches/couch1.jpg', 'Three-piece low-profile modular sofa offering fluid spatial arrangements and tactile softness.', 'sofas'),
(8, 'Curved Sculptural Lounge Sofa', 1480000, 12, 'couches/couch2.jpg', 'Sweeping organic curvature upholstered in textured neutral bouclé, designed for open salon living spaces.', 'sofas'),
(9, 'Minimalist Linen Three-Seater', 1650000, 9, 'couches/couch3.jpg', 'Generous proportions, deep feather-down cushioning, and unbleached Belgian linen removable slipcovers.', 'sofas'),
(10, 'Caramel Leather Chaise Longue', 2100000, 4, 'couches/couch4.jpg', 'Vegetable-tanned full-grain aniline saddle leather over an architectural smoked oak base.', 'sofas'),
(11, 'Compact Nordic Loveseat', 890000, 15, 'couches/couch5.jpg', 'Tailored two-seater ideal for intimate studies and apartments, featuring tapered solid ash legs.', 'sofas'),
(12, 'Solid Natural Oak Dining Table', 890000, 12, 'tables/table1.jpg', 'Eight-seater architectural dining table crafted from sustainably sourced European white oak with chamfered edges.', 'tables'),
(13, 'Solid Walnut Executive Table', 1120000, 7, 'tables/table2.jpg', 'Substantial book-matched American walnut top showcasing natural cathedral grain patterns.', 'tables'),
(14, 'Marble Low Coffee Table', 520000, 16, 'tables/table3.jpg', 'Honed organic marble slab elevated on solid smoked oak plinth feet.', 'tables'),
(15, 'Travertine Architectural Side Table', 380000, 22, 'tables/table4.jpg', 'Monolithic Roman travertine with unfilled porous texture and geometric cylindrical form.', 'tables'),
(16, 'Round Oak Bistro Dining Table', 640000, 18, 'tables/table5.jpg', 'Centrally pedestal-mounted solid oak dining table creating unencumbered legroom.', 'tables'),
(17, 'Minimalist Solid Wood Desk', 750000, 11, 'tables/table6.jpg', 'Integrated wire management channel, dual concealed shallow drawers, and solid timber construction.', 'tables'),
(18, 'Upholstered Platform Bed', 1480000, 10, 'beds/bed1.jpg', 'Low-profile solid hardwood platform upholstered in textured wool bouclé with an integrated headboard ledge.', 'beds'),
(19, 'Japandi Low Tatami Bed', 1850000, 6, 'beds/bed2.jpg', 'Wide low-slung frame in natural white oak inspired by traditional Japanese sleeping platforms.', 'beds'),
(20, 'Solid Oak Frame King Bed', 1720000, 8, 'beds/bed3.jpg', 'Substantial architectural bedstead featuring mortise and tenon corner joints and rounded edge profiles.', 'beds'),
(21, 'Walnut Floating Low Bed', 1650000, 7, 'beds/bed4.jpg', 'Recessed plinth base creating a serene weightless silhouette in master bedrooms.', 'beds'),
(22, 'Natural Linen Canopy Bed', 2250000, 4, 'beds/bed5.jpg', 'Slender blackened steel and solid teak four-post framework dressed with sheer Belgian linen drapes.', 'beds'),
(23, 'Minimalist Queen Platform Bed', 1390000, 14, 'beds/bed6.jpg', 'Clean horizontal lines with an angled ergonomic headboard for evening reading.', 'beds'),
(24, 'Nordic Timber Storage Bed', 1580000, 9, 'beds/bed7.jpg', 'Concealed soft-close solid timber pull-out drawers integrated seamlessly beneath the mattress base.', 'beds'),
(25, 'Coastal Retreat Woven Bed', 1890000, 5, 'beds/bed8.jpg', 'Intricately hand-woven Danish paper cord headboard framed in natural oil-treated white oak.', 'beds'),
(26, 'Woven Rattan Headboard Bed', 1620000, 8, 'beds/bed9.jpg', 'Natural rattan weave paneling set into a curved steam-bent solid teak surround.', 'beds'),
(27, 'Modern Slate Upholstered Bed', 1790000, 6, 'beds/bed10.jpg', 'Tailored Belgian linen upholstery in charcoal slate with brushed bronze recessed legs.', 'beds'),
(28, 'Sculptural Ceramic Table Lamp', 195000, 30, 'tables/table8.jpg', 'Hand-thrown stoneware lamp base finished in coarse matte glaze with a pleated washi paper shade.', 'objects'),
(29, 'Handcrafted Wabi-Sabi Ceramic Vase', 120000, 45, 'about/about3.jpg', 'Wheel-thrown earthenware vase with subtle iron flecks and organic asymmetric rim.', 'objects');

-- ----------------------------------------------------------------------------
-- Table: blogs (Journal editorial essays and articles)
-- ----------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `blogs` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `title` VARCHAR(255) NOT NULL,
    `author` VARCHAR(50) NOT NULL DEFAULT 'Atelier Editorial',
    `author_id` INT NULL,
    `image` VARCHAR(100) NOT NULL,
    `content` LONGTEXT NOT NULL,
    `category` VARCHAR(100) DEFAULT 'Philosophy',
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT `fk_blogs_admin` FOREIGN KEY (`author_id`) REFERENCES `admins` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Seed initial journal essays
INSERT IGNORE INTO `blogs` (`id`, `title`, `author`, `author_id`, `image`, `content`, `category`) VALUES
(1, 'The Philosophy of Wabi-Sabi in Modern Interiors', 'Atelier Editorial', 1, 'blogs/blog1.jpg', 'In an era saturated by industrial high-gloss surfaces, clinical lines, and the constant digital flicker of notifications, our domestic environments have frequently sacrificed soul for sterile uniformity. Japanese philosophy offers an enduring antidote through the worldview of wabi-sabi: the appreciation of beauty that is imperfect, impermanent, and incomplete.\n\nWhen applied to the curation of the contemporary home, wabi-sabi does not signify austerity or neglected rusticity. Rather, it represents a deep reverence for authenticity. It encourages us to celebrate the natural swirl of teak grain, the gentle curvature of steam-bent walnut, and the tactile weave of undyed coarse linen that grows softer with every turn of the seasons.\n\nIntegrating this serene cadence into our living rooms begins not with acquiring more decorative accents, but with pruning away the superfluous: allow furniture pieces room to breathe, celebrate honest materials over synthetic imitations, and embrace subtle illumination that casts warm pools of indirect ambient light.', 'Philosophy'),
(2, 'Sustainable Forestry: Sourcing Reclaimed Teak & Oak', 'Su Thinzar Htet', 1, 'blogs/blog2.jpg', 'Understanding the lifecycle of timber is central to ethical atelier furniture craft. We partner directly with certified forest stewardships to source responsibly felled walnut and salvaged historical teak.\n\nIn our Yangon workshop, timber undergoes a meticulous twelve-month moisture stabilization regimen. By allowing the wood fibers to adapt gradually to Southeast Asia\'s seasonal monsoon humidity cycles before milling, we ensure that mortise and tenon joints will remain tight and stable for generations without warping.\n\nEvery harvested trunk is tracked back to its specific community reserve. For every single specimen transformed into our furniture collection, our reforestation pact ensures that two native saplings are nurtured to maturity.', 'Craftsmanship'),
(3, 'Lighting Architecture: Sculpting Shadow and Warmth', 'Thae Nay Nwe Soe', 1, 'blogs/blog3.jpg', 'Direct overhead downlights create clinical glare and sensory fatigue. In this spatial guide, we explore how low-profile floor lanterns, washi paper pendants, and indirect wall sconces establish restorative evening sanctuaries.\n\nLight should never be treated as a purely utilitarian tool to erase darkness; it is an architectural medium designed to sculpt warmth and define intimacy within living spaces. By positioning low-wattage warm illumination between 2200K and 2700K near the floor plane, our minds naturally transition toward restfulness and quiet contemplation.\n\nNatural parchment, woven hemp, and hand-spun paper shades filter harsh rays into soft, poetic gradients that reveal the subtle depths of solid timber furniture.', 'Spatial Design'),
(4, 'The Ritual of Morning Tea & Minimalist Dining', 'Myat Chal Oo', 1, 'blogs/blog4.jpg', 'Transforming the morning routine through uncluttered solid oak surfaces, tactile ceramic cups, and natural daylight.\n\nThe dining table serves as the spiritual heart of the home—a sanctuary where conversations linger and morning reflections unfold. When surfaces are stripped of clutter and synthetic finishes, the natural warmth of unvarnished timber invites the human palm, fostering grounded calm before the day demands our attention.\n\nPairing minimalist wooden benches with hand-thrown ceramic tableware creates a mindful dining ritual rooted in tactile presence and unhurried elegance.', 'Living Rituals'),
(5, 'Botanical Plant Waxes: Caring for Solid Wood', 'Nyi Nyi Aung', 1, 'blogs/blog5.jpg', 'Practical steps to protect unvarnished timber from dryness, humidity shifts, and everyday stains while preserving the velvet feel of the living grain.\n\nUnlike plastic polyurethane coatings that seal timber behind an impenetrable synthetic barrier, our proprietary blend of cold-pressed linseed oil, carnauba, and organic beeswax allows the wood to breathe. It responds naturally to indoor humidity changes while repelling spills.\n\nA seasonal application of botanical wax takes merely fifteen minutes and deepens the timber\'s golden honey patina over years of companionship.', 'Maintenance'),
(6, 'The Palette of Quietude: Earth Pigments in Living Spaces', 'Phone Myat Win', 1, 'blogs/blog6.jpg', 'Moving beyond sterile monochrome whites. How chalky lime-wash mineral paints, raw linen, and terracotta nuances bring organic depth to contemporary interior architecture.\n\nColor in the atelier home is never loud; it whispers. Drawing inspiration from river silt, dried palm thatch, toasted sesame, and damp clay, our palette anchors living spaces in the timeless tranquility of the natural landscape.\n\nWhen combined with natural timber furnishings, earth pigments reflect natural daylight with a soft velvety bloom that shifts subtly from morning dawn to evening twilight.', 'Interior Styling'),
(7, 'Tactile Bedrooms: Designing Restorative Sleep Sanctuaries', 'Min Khant Naung', 1, 'blogs/blog7.jpg', 'The modern bedroom should function as a sensory retreat—a quiet enclave shielded from the accelerated pace of the outside city.\n\nBy anchoring the room with a low-slung solid timber platform bed, breathable washed linen beddings, and natural woven rattan textures, we establish a grounded physical foundation for regenerative sleep. Removing visual clutter and artificial synthetics calms the nervous system and fosters deep tranquility.\n\nEvery tactile surface that meets the skin should offer gentle organic reassurance and thermal breathability.', 'Spatial Design'),
(8, 'Designing Quiet Havens in High-Density Cities', 'Phone Myat Win', 1, 'blogs/blog8.jpg', 'How low-profile floor silhouettes, open spatial thresholds, and muted earth pigments buffer sensory fatigue in modern apartment dwellings.\n\nUrban living in fast-growing metropolitan centers like Yangon often places immense sensory demands upon our daily lives. Within our personal residences, we must intentionally cultivate spaces of decompression and silence.\n\nBy lowering the visual center of gravity through low-profile lounges and platform plinths, rooms feel dramatically taller and more expansive, granting residents a feeling of boundless horizon and internal peace.', 'Architecture');

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
