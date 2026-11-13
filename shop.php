<?php

/**
 * ============================================================================
 * FURNISHME BACKEND INSTRUCTION GUIDELINE - PRODUCT CATALOG (SHOP)
 * ============================================================================
 * FILE: shop.php
 * PURPOSE: Queries and renders the furniture catalog, provides multi-criteria
 *          filtering (by category, keyword search, price/name sorting), and
 *          handles server-side or hybrid pagination.
 * 
 * STEP-BY-STEP IMPLEMENTATION GUIDE:
 * 1. Initialize Session & Database:
 *    if (session_status() === PHP_SESSION_NONE) { session_start(); }
 *    require_once "components/connection.php";
 * 
 * 2. Sanitize and Read GET Parameters:
 *    $category = trim($_GET['category'] ?? 'all');
 *    $search   = trim($_GET['search'] ?? '');
 *    $sort     = trim($_GET['sort'] ?? 'featured');
 *    $page     = max(1, (int)($_GET['page'] ?? 1));
 *    $limit    = 8; // items per page
 *    $offset   = ($page - 1) * $limit;
 * 
 * 3. Construct Dynamic SQL Query with Prepared Statements:
 *    $where_sql = "WHERE 1=1";
 *    $types = "";
 *    $params = [];
 * 
 *    if (!empty($category) && $category !== 'all') {
 *        $where_sql .= " AND category = ?";
 *        $types .= "s";
 *        $params[] = $category;
 *    }
 *    if (!empty($search)) {
 *        $where_sql .= " AND (name LIKE ? OR description LIKE ?)";
 *        $search_wildcard = "%" . $search . "%";
 *        $types .= "ss";
 *        $params[] = $search_wildcard;
 *        $params[] = $search_wildcard;
 *    }
 * 
 *    // Sorting Logic
 *    switch ($sort) {
 *        case 'price_asc':  $order_sql = "ORDER BY price ASC"; break;
 *        case 'price_desc': $order_sql = "ORDER BY price DESC"; break;
 *        case 'name_asc':   $order_sql = "ORDER BY name ASC"; break;
 *        default:           $order_sql = "ORDER BY id DESC"; break;
 *    }
 * 
 * 4. Execute Query and Fetch Results:
 *    $sql = "SELECT id, name, price, stock, image, description, category FROM products $where_sql $order_sql LIMIT ?, ?";
 *    $types .= "ii";
 *    $params[] = $offset;
 *    $params[] = $limit;
 * 
 *    $stmt = $connection->prepare($sql);
 *    if (!empty($types)) {
 *        $stmt->bind_param($types, ...$params);
 *    }
 *    $stmt->execute();
 *    $products = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
 *    $stmt->close();
 * ============================================================================
 */

// Initialize session
require_once __DIR__ . '/components/session_start.php';

// Check session
require_once __DIR__ . '/components/session_check.php';

// Connect database
require_once __DIR__ . '/components/connection.php';
$category = $_GET['category'] ?? 'all';
?>
<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop Atelier Furniture | FurnishMe</title>
    <link rel="icon" type="image/x-icon" href="images/favicon.ico">
    <?php include "components/css.php"; ?>
</head>

<body class="bg-[#EDE8E0] text-[#362F2A] font-sans selection:bg-[#8A5A44] selection:text-[#F6F3EE] antialiased">
    <?php include "components/header.php"; ?>
    <?php include "components/navbar.php"; ?>

    <!-- PAGE HEADER BREADCRUMB -->
    <header class="bg-[#DFD8CD] border-b border-[#C9C0B3] py-12 lg:py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <nav class="flex items-center gap-2 text-xs font-medium text-[#6E6359] mb-3" aria-label="Breadcrumb">
                <a href="index.php" class="hover:text-[#362F2A] transition-colors">Home</a>
                <span class="text-[#6E6359]">/</span>
                <span class="text-[#8A5A44] font-semibold">Shop Atelier</span>
            </nav>
            <div class="flex flex-col md:flex-row md:items-end justify-between gap-4">
                <div>
                    <h1 class="font-serif text-3xl sm:text-4xl lg:text-5xl font-normal tracking-tight text-[#362F2A]">
                        The Furniture Collection
                    </h1>
                    <p class="text-sm sm:text-base text-[#6E6359] max-w-xl mt-2 leading-relaxed">
                        Thoughtfully scaled architectural essentials made from solid walnut, natural oak, and textured tactile fabrics.
                    </p>
                </div>
                <div class="text-xs text-[#6E6359]">
                    Showing <strong id="product-count" class="text-[#8A5A44] font-semibold">29</strong> curated atelier pieces
                </div>
            </div>
        </div>
    </header>

    <!-- SHOPPING CONTROLS & FILTER BAR -->
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- ==================================================================
             PHP BACKEND GUIDELINE: Category Filter & Sorting
             - Pass parameters via URL: shop.php?category=chairs&sort=price_asc
             - Check active category to set the active styling:
               class="<?= ($category == 'chairs') ? 'bg-[#8A5A44] text-[#F6F3EE]' : 'bg-[#DFD8CD] text-[#6E6359]' ?>"
             ================================================================== -->
        <div class="bg-[#F6F3EE] border border-[#C9C0B3] rounded-3xl p-4 sm:p-5 shadow-xl flex flex-col lg:flex-row items-stretch lg:items-center justify-between gap-4">

            <!-- Category Filter Pills -->
            <div class="flex items-center gap-2 overflow-x-auto pb-2 lg:pb-0 scrollbar-none" id="category-filters">
                <a href="shop.php?category=all" data-filter="all" class="filter-btn px-4 py-2 rounded-xl text-xs font-semibold bg-[#8A5A44] text-[#F6F3EE] transition-colors whitespace-nowrap shadow-sm">
                    All Pieces
                </a>
                <a href="shop.php?category=chairs" data-filter="chairs" class="filter-btn px-4 py-2 rounded-xl text-xs font-medium bg-[#DFD8CD] text-[#6E6359] hover:bg-[#D5CDC1] hover:text-[#362F2A] border border-[#C9C0B3] transition-colors whitespace-nowrap">
                    Chairs
                </a>
                <a href="shop.php?category=sofas" data-filter="sofas" class="filter-btn px-4 py-2 rounded-xl text-xs font-medium bg-[#DFD8CD] text-[#6E6359] hover:bg-[#D5CDC1] hover:text-[#362F2A] border border-[#C9C0B3] transition-colors whitespace-nowrap">
                    Sofas &amp; Lounge
                </a>
                <a href="shop.php?category=tables" data-filter="tables" class="filter-btn px-4 py-2 rounded-xl text-xs font-medium bg-[#DFD8CD] text-[#6E6359] hover:bg-[#D5CDC1] hover:text-[#362F2A] border border-[#C9C0B3] transition-colors whitespace-nowrap">
                    Tables &amp; Desks
                </a>
                <a href="shop.php?category=beds" data-filter="beds" class="filter-btn px-4 py-2 rounded-xl text-xs font-medium bg-[#DFD8CD] text-[#6E6359] hover:bg-[#D5CDC1] hover:text-[#362F2A] border border-[#C9C0B3] transition-colors whitespace-nowrap">
                    Beds &amp; Tatami
                </a>
                <a href="shop.php?category=objects" data-filter="objects" class="filter-btn px-4 py-2 rounded-xl text-xs font-medium bg-[#DFD8CD] text-[#6E6359] hover:bg-[#D5CDC1] hover:text-[#362F2A] border border-[#C9C0B3] transition-colors whitespace-nowrap">
                    Lighting &amp; Objects
                </a>
            </div>

            <!-- Search Input and Sort Dropdown -->
            <div class="flex items-center gap-3">
                <div class="relative flex-1 sm:w-64">
                    <i class="ri-search-line absolute left-3.5 top-1/2 -translate-y-1/2 text-[#6E6359] text-sm"></i>
                    <input type="text" id="catalog-search" placeholder="Filter in catalog..." class="w-full pl-9 pr-3 py-2 bg-[#EDE8E0] border border-[#C9C0B3] rounded-xl text-xs text-[#362F2A] placeholder-[#6E6359] focus:outline-none focus:ring-1 focus:ring-[#8A5A44] focus:border-[#8A5A44]">
                </div>

                <div class="relative">
                    <select id="catalog-sort" aria-label="Sort products" class="appearance-none pl-4 pr-9 py-2 bg-[#EDE8E0] border border-[#C9C0B3] rounded-xl text-xs font-medium text-[#362F2A] focus:outline-none focus:ring-1 focus:ring-[#8A5A44] focus:border-[#8A5A44] cursor-pointer">
                        <option value="featured">Sort: Featured</option>
                        <option value="price_asc">Price: Low to High</option>
                        <option value="price_desc">Price: High to Low</option>
                        <option value="name_asc">Name: A to Z</option>
                    </select>
                    <i class="ri-arrow-down-s-line absolute right-3 top-1/2 -translate-y-1/2 text-[#6E6359] text-sm pointer-events-none"></i>
                </div>
            </div>

        </div>
    </section>

    <!-- PRODUCTS GRID -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-24">
        <!-- ==================================================================
             PHP BACKEND GUIDELINE: Dynamic Product Catalog Loop
             Replace static cards below with a foreach loop over $products:
             
             <?php /*
             if (!empty($products)) {
                 foreach ($products as $product) {
                     ?>
                     <article class="product-card group bg-[#F6F3EE] rounded-3xl border border-[#C9C0B3] overflow-hidden transition-all duration-300 hover:shadow-xl hover:border-[#8A5A44] flex flex-col justify-between">
                         <div class="relative w-full aspect-[4/3] bg-[#EDE8E0] border-b border-[#C9C0B3] overflow-hidden flex items-center justify-center">
                             <?php if ($product['stock'] > 0): ?>
                                 <span class="absolute top-3 left-3 z-10 inline-flex items-center px-2.5 py-1 rounded-full text-[11px] font-medium bg-[#DCE5DF] text-[#3F624D] border border-[#C6D6CB]">
                                     <?= htmlspecialchars($product['stock']) ?> In Stock
                                 </span>
                             <?php else: ?>
                                 <span class="absolute top-3 left-3 z-10 inline-flex items-center px-2.5 py-1 rounded-full text-[11px] font-medium bg-[#EFE0E0] text-[#8C3B3B] border border-[#DFC8C8]">
                                     Made to Order
                                 </span>
                             <?php endif; ?>
                             <a href="product_detail.php?id=<?= $product['id'] ?>" class="w-full h-full block">
                                 <img src="images/<?= htmlspecialchars($product['image']) ?>" alt="<?= htmlspecialchars($product['name']) ?>" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" loading="lazy">
                             </a>
                         </div>
                         <div class="p-5 flex flex-col flex-1 justify-between">
                             <div>
                                 <span class="text-[11px] uppercase tracking-wider text-[#8A5A44] font-medium"><?= htmlspecialchars(ucfirst($product['category'] ?? 'Atelier Piece')) ?></span>
                                 <h3 class="font-serif text-base font-normal text-[#362F2A] group-hover:text-[#8A5A44] transition-colors mt-0.5">
                                     <a href="product_detail.php?id=<?= $product['id'] ?>"><?= htmlspecialchars($product['name']) ?></a>
                                 </h3>
                             </div>
                             <div class="mt-4 pt-4 border-t border-[#C9C0B3] flex items-center justify-between">
                                 <span class="text-sm font-semibold text-[#362F2A] font-serif"><?= number_format($product['price']) ?> MMK</span>
                                 <a href="product_detail.php?id=<?= $product['id'] ?>" class="text-xs text-[#8A5A44] hover:underline">View Piece &rarr;</a>
                             </div>
                         </div>
                     </article>
                     <?php
                 }
             } else {
                 echo '<p class="col-span-full text-center py-12 text-stone-400">No furniture pieces found matching your criteria.</p>';
             }
             */ ?>
             ================================================================== -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 sm:gap-8" id="product-grid">
            <!-- Product Item 1: Nordic Solid Wood Armchair -->
            <article class="product-card group bg-[#F6F3EE] rounded-3xl border border-[#C9C0B3] overflow-hidden transition-all duration-300 hover:shadow-xl hover:border-[#8A5A44] flex flex-col justify-between" data-category="chairs" data-price="420000" data-name="nordic solid wood armchair">
                <div class="relative w-full aspect-[4/3] bg-[#EDE8E0] border-b border-[#C9C0B3] overflow-hidden flex items-center justify-center">
                    <span class="absolute top-3 left-3 z-10 inline-flex items-center px-2.5 py-1 rounded-full text-[11px] font-medium bg-[#DCE5DF] text-[#3F624D] border border-[#C6D6CB]">
                        In Stock
                    </span>
                    <a href="product_detail.php?id=1" class="w-full h-full block">
                        <img src="images/chair-1.jpg" alt="Nordic Solid Wood Armchair" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" loading="lazy">
                    </a>
                    <div class="absolute inset-0 bg-[#362F2A]/20 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center gap-2">
                        <a href="product_detail.php?id=1" class="w-10 h-10 rounded-full bg-[#8A5A44] text-[#F6F3EE] hover:bg-[#704735] hover:text-[#F6F3EE] flex items-center justify-center shadow-md transition-colors" title="View Details">
                            <i class="ri-eye-line text-lg"></i>
                        </a>
                    </div>
                </div>
                <div class="p-5 flex flex-col flex-1 justify-between">
                    <div>
                        <span class="text-[11px] uppercase tracking-wider text-[#8A5A44] font-medium">Chairs & Seating</span>
                        <h3 class="font-serif text-base font-normal text-[#362F2A] group-hover:text-[#8A5A44] transition-colors mt-0.5">
                            <a href="product_detail.php?id=1">Nordic Solid Wood Armchair</a>
                        </h3>
                    </div>
                    <div class="pt-4 flex items-center justify-between border-t border-[#C9C0B3] mt-4">
                        <span class="text-sm font-semibold text-[#362F2A] font-serif">420,000 MMK</span>
                        <span class="text-xs text-[#6E6359]">25 in stock</span>
                    </div>
                </div>
            </article>

            <!-- Product Item 2: Curved Lounge Armchair -->
            <article class="product-card group bg-[#F6F3EE] rounded-3xl border border-[#C9C0B3] overflow-hidden transition-all duration-300 hover:shadow-xl hover:border-[#8A5A44] flex flex-col justify-between" data-category="chairs" data-price="580000" data-name="curved lounge armchair">
                <div class="relative w-full aspect-[4/3] bg-[#EDE8E0] border-b border-[#C9C0B3] overflow-hidden flex items-center justify-center">
                    <span class="absolute top-3 left-3 z-10 inline-flex items-center px-2.5 py-1 rounded-full text-[11px] font-medium bg-[#DCE5DF] text-[#3F624D] border border-[#C6D6CB]">
                        In Stock
                    </span>
                    <a href="product_detail.php?id=2" class="w-full h-full block">
                        <img src="images/chair-2.jpg" alt="Curved Lounge Armchair" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" loading="lazy">
                    </a>
                    <div class="absolute inset-0 bg-[#362F2A]/20 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center gap-2">
                        <a href="product_detail.php?id=2" class="w-10 h-10 rounded-full bg-[#8A5A44] text-[#F6F3EE] hover:bg-[#704735] hover:text-[#F6F3EE] flex items-center justify-center shadow-md transition-colors" title="View Details">
                            <i class="ri-eye-line text-lg"></i>
                        </a>
                    </div>
                </div>
                <div class="p-5 flex flex-col flex-1 justify-between">
                    <div>
                        <span class="text-[11px] uppercase tracking-wider text-[#8A5A44] font-medium">Lounge & Seating</span>
                        <h3 class="font-serif text-base font-normal text-[#362F2A] group-hover:text-[#8A5A44] transition-colors mt-0.5">
                            <a href="product_detail.php?id=2">Curved Lounge Armchair</a>
                        </h3>
                    </div>
                    <div class="pt-4 flex items-center justify-between border-t border-[#C9C0B3] mt-4">
                        <span class="text-sm font-semibold text-[#362F2A] font-serif">580,000 MMK</span>
                        <span class="text-xs text-[#6E6359]">50 in stock</span>
                    </div>
                </div>
            </article>

            <!-- Product Item 3: Scandi Minimalist Dining Chair -->
            <article class="product-card group bg-[#F6F3EE] rounded-3xl border border-[#C9C0B3] overflow-hidden transition-all duration-300 hover:shadow-xl hover:border-[#8A5A44] flex flex-col justify-between" data-category="chairs" data-price="260000" data-name="scandi minimalist dining chair">
                <div class="relative w-full aspect-[4/3] bg-[#EDE8E0] border-b border-[#C9C0B3] overflow-hidden flex items-center justify-center">
                    <span class="absolute top-3 left-3 z-10 inline-flex items-center px-2.5 py-1 rounded-full text-[11px] font-medium bg-[#DCE5DF] text-[#3F624D] border border-[#C6D6CB]">
                        In Stock
                    </span>
                    <a href="product_detail.php?id=3" class="w-full h-full block">
                        <img src="images/chair-3.jpg" alt="Scandi Minimalist Dining Chair" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" loading="lazy">
                    </a>
                    <div class="absolute inset-0 bg-[#362F2A]/20 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center gap-2">
                        <a href="product_detail.php?id=3" class="w-10 h-10 rounded-full bg-[#8A5A44] text-[#F6F3EE] hover:bg-[#704735] hover:text-[#F6F3EE] flex items-center justify-center shadow-md transition-colors" title="View Details">
                            <i class="ri-eye-line text-lg"></i>
                        </a>
                    </div>
                </div>
                <div class="p-5 flex flex-col flex-1 justify-between">
                    <div>
                        <span class="text-[11px] uppercase tracking-wider text-[#8A5A44] font-medium">Chairs & Seating</span>
                        <h3 class="font-serif text-base font-normal text-[#362F2A] group-hover:text-[#8A5A44] transition-colors mt-0.5">
                            <a href="product_detail.php?id=3">Scandi Minimalist Dining Chair</a>
                        </h3>
                    </div>
                    <div class="pt-4 flex items-center justify-between border-t border-[#C9C0B3] mt-4">
                        <span class="text-sm font-semibold text-[#362F2A] font-serif">260,000 MMK</span>
                        <span class="text-xs text-[#6E6359]">36 in stock</span>
                    </div>
                </div>
            </article>

            <!-- Product Item 4: Rattan Occasional Lounge Chair -->
            <article class="product-card group bg-[#F6F3EE] rounded-3xl border border-[#C9C0B3] overflow-hidden transition-all duration-300 hover:shadow-xl hover:border-[#8A5A44] flex flex-col justify-between" data-category="chairs" data-price="490000" data-name="rattan occasional lounge chair">
                <div class="relative w-full aspect-[4/3] bg-[#EDE8E0] border-b border-[#C9C0B3] overflow-hidden flex items-center justify-center">
                    <span class="absolute top-3 left-3 z-10 inline-flex items-center px-2.5 py-1 rounded-full text-[11px] font-medium bg-[#DCE5DF] text-[#3F624D] border border-[#C6D6CB]">
                        In Stock
                    </span>
                    <a href="product_detail.php?id=4" class="w-full h-full block">
                        <img src="images/chair-4.jpg" alt="Rattan Occasional Lounge Chair" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" loading="lazy">
                    </a>
                    <div class="absolute inset-0 bg-[#362F2A]/20 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center gap-2">
                        <a href="product_detail.php?id=4" class="w-10 h-10 rounded-full bg-[#8A5A44] text-[#F6F3EE] hover:bg-[#704735] hover:text-[#F6F3EE] flex items-center justify-center shadow-md transition-colors" title="View Details">
                            <i class="ri-eye-line text-lg"></i>
                        </a>
                    </div>
                </div>
                <div class="p-5 flex flex-col flex-1 justify-between">
                    <div>
                        <span class="text-[11px] uppercase tracking-wider text-[#8A5A44] font-medium">Lounge & Seating</span>
                        <h3 class="font-serif text-base font-normal text-[#362F2A] group-hover:text-[#8A5A44] transition-colors mt-0.5">
                            <a href="product_detail.php?id=4">Rattan Occasional Lounge Chair</a>
                        </h3>
                    </div>
                    <div class="pt-4 flex items-center justify-between border-t border-[#C9C0B3] mt-4">
                        <span class="text-sm font-semibold text-[#362F2A] font-serif">490,000 MMK</span>
                        <span class="text-xs text-[#6E6359]">14 in stock</span>
                    </div>
                </div>
            </article>

            <!-- Product Item 5: Velvet Accent Atelier Chair -->
            <article class="product-card group bg-[#F6F3EE] rounded-3xl border border-[#C9C0B3] overflow-hidden transition-all duration-300 hover:shadow-xl hover:border-[#8A5A44] flex flex-col justify-between" data-category="chairs" data-price="520000" data-name="velvet accent atelier chair">
                <div class="relative w-full aspect-[4/3] bg-[#EDE8E0] border-b border-[#C9C0B3] overflow-hidden flex items-center justify-center">
                    <span class="absolute top-3 left-3 z-10 inline-flex items-center px-2.5 py-1 rounded-full text-[11px] font-medium bg-[#EFE2D5] text-[#8C5327] border border-[#E0CFBF]">
                        Low Stock
                    </span>
                    <a href="product_detail.php?id=5" class="w-full h-full block">
                        <img src="images/chair-5.jpg" alt="Velvet Accent Atelier Chair" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" loading="lazy">
                    </a>
                    <div class="absolute inset-0 bg-[#362F2A]/20 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center gap-2">
                        <a href="product_detail.php?id=5" class="w-10 h-10 rounded-full bg-[#8A5A44] text-[#F6F3EE] hover:bg-[#704735] hover:text-[#F6F3EE] flex items-center justify-center shadow-md transition-colors" title="View Details">
                            <i class="ri-eye-line text-lg"></i>
                        </a>
                    </div>
                </div>
                <div class="p-5 flex flex-col flex-1 justify-between">
                    <div>
                        <span class="text-[11px] uppercase tracking-wider text-[#8A5A44] font-medium">Chairs & Seating</span>
                        <h3 class="font-serif text-base font-normal text-[#362F2A] group-hover:text-[#8A5A44] transition-colors mt-0.5">
                            <a href="product_detail.php?id=5">Velvet Accent Atelier Chair</a>
                        </h3>
                    </div>
                    <div class="pt-4 flex items-center justify-between border-t border-[#C9C0B3] mt-4">
                        <span class="text-sm font-semibold text-[#362F2A] font-serif">520,000 MMK</span>
                        <span class="text-xs text-[#6E6359]">6 in stock</span>
                    </div>
                </div>
            </article>

            <!-- Product Item 6: Minimalist Turned Wooden Stool -->
            <article class="product-card group bg-[#F6F3EE] rounded-3xl border border-[#C9C0B3] overflow-hidden transition-all duration-300 hover:shadow-xl hover:border-[#8A5A44] flex flex-col justify-between" data-category="chairs" data-price="180000" data-name="minimalist turned wooden stool">
                <div class="relative w-full aspect-[4/3] bg-[#EDE8E0] border-b border-[#C9C0B3] overflow-hidden flex items-center justify-center">
                    <span class="absolute top-3 left-3 z-10 inline-flex items-center px-2.5 py-1 rounded-full text-[11px] font-medium bg-[#DCE5DF] text-[#3F624D] border border-[#C6D6CB]">
                        In Stock
                    </span>
                    <a href="product_detail.php?id=6" class="w-full h-full block">
                        <img src="images/chair-6.jpg" alt="Minimalist Turned Wooden Stool" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" loading="lazy">
                    </a>
                    <div class="absolute inset-0 bg-[#362F2A]/20 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center gap-2">
                        <a href="product_detail.php?id=6" class="w-10 h-10 rounded-full bg-[#8A5A44] text-[#F6F3EE] hover:bg-[#704735] hover:text-[#F6F3EE] flex items-center justify-center shadow-md transition-colors" title="View Details">
                            <i class="ri-eye-line text-lg"></i>
                        </a>
                    </div>
                </div>
                <div class="p-5 flex flex-col flex-1 justify-between">
                    <div>
                        <span class="text-[11px] uppercase tracking-wider text-[#8A5A44] font-medium">Seating & Accents</span>
                        <h3 class="font-serif text-base font-normal text-[#362F2A] group-hover:text-[#8A5A44] transition-colors mt-0.5">
                            <a href="product_detail.php?id=6">Minimalist Turned Wooden Stool</a>
                        </h3>
                    </div>
                    <div class="pt-4 flex items-center justify-between border-t border-[#C9C0B3] mt-4">
                        <span class="text-sm font-semibold text-[#362F2A] font-serif">180,000 MMK</span>
                        <span class="text-xs text-[#6E6359]">40 in stock</span>
                    </div>
                </div>
            </article>

            <!-- Product Item 7: Bouclé Modular Sofa -->
            <article class="product-card group bg-[#F6F3EE] rounded-3xl border border-[#C9C0B3] overflow-hidden transition-all duration-300 hover:shadow-xl hover:border-[#8A5A44] flex flex-col justify-between" data-category="sofas" data-price="1250000" data-name="bouclé modular sofa">
                <div class="relative w-full aspect-[4/3] bg-[#EDE8E0] border-b border-[#C9C0B3] overflow-hidden flex items-center justify-center">
                    <span class="absolute top-3 left-3 z-10 inline-flex items-center px-2.5 py-1 rounded-full text-[11px] font-medium bg-[#EFE2D5] text-[#8C5327] border border-[#E0CFBF]">
                        Low Stock
                    </span>
                    <a href="product_detail.php?id=7" class="w-full h-full block">
                        <img src="images/sofa-1.jpg" alt="Bouclé Modular Sofa" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" loading="lazy">
                    </a>
                    <div class="absolute inset-0 bg-[#362F2A]/20 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center gap-2">
                        <a href="product_detail.php?id=7" class="w-10 h-10 rounded-full bg-[#8A5A44] text-[#F6F3EE] hover:bg-[#704735] hover:text-[#F6F3EE] flex items-center justify-center shadow-md transition-colors" title="View Details">
                            <i class="ri-eye-line text-lg"></i>
                        </a>
                    </div>
                </div>
                <div class="p-5 flex flex-col flex-1 justify-between">
                    <div>
                        <span class="text-[11px] uppercase tracking-wider text-[#8A5A44] font-medium">Sofas & Sectionals</span>
                        <h3 class="font-serif text-base font-normal text-[#362F2A] group-hover:text-[#8A5A44] transition-colors mt-0.5">
                            <a href="product_detail.php?id=7">Bouclé Modular Sofa</a>
                        </h3>
                    </div>
                    <div class="pt-4 flex items-center justify-between border-t border-[#C9C0B3] mt-4">
                        <span class="text-sm font-semibold text-[#362F2A] font-serif">1,250,000 MMK</span>
                        <span class="text-xs text-[#6E6359]">8 in stock</span>
                    </div>
                </div>
            </article>

            <!-- Product Item 8: Curved Sculptural Lounge Sofa -->
            <article class="product-card group bg-[#F6F3EE] rounded-3xl border border-[#C9C0B3] overflow-hidden transition-all duration-300 hover:shadow-xl hover:border-[#8A5A44] flex flex-col justify-between" data-category="sofas" data-price="1480000" data-name="curved sculptural lounge sofa">
                <div class="relative w-full aspect-[4/3] bg-[#EDE8E0] border-b border-[#C9C0B3] overflow-hidden flex items-center justify-center">
                    <span class="absolute top-3 left-3 z-10 inline-flex items-center px-2.5 py-1 rounded-full text-[11px] font-medium bg-[#DCE5DF] text-[#3F624D] border border-[#C6D6CB]">
                        In Stock
                    </span>
                    <a href="product_detail.php?id=8" class="w-full h-full block">
                        <img src="images/sofa-2.jpg" alt="Curved Sculptural Lounge Sofa" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" loading="lazy">
                    </a>
                    <div class="absolute inset-0 bg-[#362F2A]/20 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center gap-2">
                        <a href="product_detail.php?id=8" class="w-10 h-10 rounded-full bg-[#8A5A44] text-[#F6F3EE] hover:bg-[#704735] hover:text-[#F6F3EE] flex items-center justify-center shadow-md transition-colors" title="View Details">
                            <i class="ri-eye-line text-lg"></i>
                        </a>
                    </div>
                </div>
                <div class="p-5 flex flex-col flex-1 justify-between">
                    <div>
                        <span class="text-[11px] uppercase tracking-wider text-[#8A5A44] font-medium">Sofas & Lounge</span>
                        <h3 class="font-serif text-base font-normal text-[#362F2A] group-hover:text-[#8A5A44] transition-colors mt-0.5">
                            <a href="product_detail.php?id=8">Curved Sculptural Lounge Sofa</a>
                        </h3>
                    </div>
                    <div class="pt-4 flex items-center justify-between border-t border-[#C9C0B3] mt-4">
                        <span class="text-sm font-semibold text-[#362F2A] font-serif">1,480,000 MMK</span>
                        <span class="text-xs text-[#6E6359]">12 in stock</span>
                    </div>
                </div>
            </article>

            <!-- Product Item 9: Minimalist Linen Three-Seater -->
            <article class="product-card group bg-[#F6F3EE] rounded-3xl border border-[#C9C0B3] overflow-hidden transition-all duration-300 hover:shadow-xl hover:border-[#8A5A44] flex flex-col justify-between" data-category="sofas" data-price="1650000" data-name="minimalist linen three-seater">
                <div class="relative w-full aspect-[4/3] bg-[#EDE8E0] border-b border-[#C9C0B3] overflow-hidden flex items-center justify-center">
                    <span class="absolute top-3 left-3 z-10 inline-flex items-center px-2.5 py-1 rounded-full text-[11px] font-medium bg-[#DCE5DF] text-[#3F624D] border border-[#C6D6CB]">
                        In Stock
                    </span>
                    <a href="product_detail.php?id=9" class="w-full h-full block">
                        <img src="images/sofa-3.jpg" alt="Minimalist Linen Three-Seater" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" loading="lazy">
                    </a>
                    <div class="absolute inset-0 bg-[#362F2A]/20 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center gap-2">
                        <a href="product_detail.php?id=9" class="w-10 h-10 rounded-full bg-[#8A5A44] text-[#F6F3EE] hover:bg-[#704735] hover:text-[#F6F3EE] flex items-center justify-center shadow-md transition-colors" title="View Details">
                            <i class="ri-eye-line text-lg"></i>
                        </a>
                    </div>
                </div>
                <div class="p-5 flex flex-col flex-1 justify-between">
                    <div>
                        <span class="text-[11px] uppercase tracking-wider text-[#8A5A44] font-medium">Sofas & Lounge</span>
                        <h3 class="font-serif text-base font-normal text-[#362F2A] group-hover:text-[#8A5A44] transition-colors mt-0.5">
                            <a href="product_detail.php?id=9">Minimalist Linen Three-Seater</a>
                        </h3>
                    </div>
                    <div class="pt-4 flex items-center justify-between border-t border-[#C9C0B3] mt-4">
                        <span class="text-sm font-semibold text-[#362F2A] font-serif">1,650,000 MMK</span>
                        <span class="text-xs text-[#6E6359]">9 in stock</span>
                    </div>
                </div>
            </article>

            <!-- Product Item 10: Caramel Leather Chaise Longue -->
            <article class="product-card group bg-[#F6F3EE] rounded-3xl border border-[#C9C0B3] overflow-hidden transition-all duration-300 hover:shadow-xl hover:border-[#8A5A44] flex flex-col justify-between" data-category="sofas" data-price="210000" data-name="caramel leather chaise longue">
                <div class="relative w-full aspect-[4/3] bg-[#EDE8E0] border-b border-[#C9C0B3] overflow-hidden flex items-center justify-center">
                    <span class="absolute top-3 left-3 z-10 inline-flex items-center px-2.5 py-1 rounded-full text-[11px] font-medium bg-[#EFE2D5] text-[#8C5327] border border-[#E0CFBF]">
                        Low Stock
                    </span>
                    <a href="product_detail.php?id=10" class="w-full h-full block">
                        <img src="images/sofa-4.jpg" alt="Caramel Leather Chaise Longue" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" loading="lazy">
                    </a>
                    <div class="absolute inset-0 bg-[#362F2A]/20 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center gap-2">
                        <a href="product_detail.php?id=10" class="w-10 h-10 rounded-full bg-[#8A5A44] text-[#F6F3EE] hover:bg-[#704735] hover:text-[#F6F3EE] flex items-center justify-center shadow-md transition-colors" title="View Details">
                            <i class="ri-eye-line text-lg"></i>
                        </a>
                    </div>
                </div>
                <div class="p-5 flex flex-col flex-1 justify-between">
                    <div>
                        <span class="text-[11px] uppercase tracking-wider text-[#8A5A44] font-medium">Luxury Sofas</span>
                        <h3 class="font-serif text-base font-normal text-[#362F2A] group-hover:text-[#8A5A44] transition-colors mt-0.5">
                            <a href="product_detail.php?id=10">Caramel Leather Chaise Longue</a>
                        </h3>
                    </div>
                    <div class="pt-4 flex items-center justify-between border-t border-[#C9C0B3] mt-4">
                        <span class="text-sm font-semibold text-[#362F2A] font-serif">2,100,000 MMK</span>
                        <span class="text-xs text-[#6E6359]">4 in stock</span>
                    </div>
                </div>
            </article>

            <!-- Product Item 11: Compact Nordic Loveseat -->
            <article class="product-card group bg-[#F6F3EE] rounded-3xl border border-[#C9C0B3] overflow-hidden transition-all duration-300 hover:shadow-xl hover:border-[#8A5A44] flex flex-col justify-between" data-category="sofas" data-price="890000" data-name="compact nordic loveseat">
                <div class="relative w-full aspect-[4/3] bg-[#EDE8E0] border-b border-[#C9C0B3] overflow-hidden flex items-center justify-center">
                    <span class="absolute top-3 left-3 z-10 inline-flex items-center px-2.5 py-1 rounded-full text-[11px] font-medium bg-[#DCE5DF] text-[#3F624D] border border-[#C6D6CB]">
                        In Stock
                    </span>
                    <a href="product_detail.php?id=11" class="w-full h-full block">
                        <img src="images/sofa-5.jpg" alt="Compact Nordic Loveseat" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" loading="lazy">
                    </a>
                    <div class="absolute inset-0 bg-[#362F2A]/20 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center gap-2">
                        <a href="product_detail.php?id=11" class="w-10 h-10 rounded-full bg-[#8A5A44] text-[#F6F3EE] hover:bg-[#704735] hover:text-[#F6F3EE] flex items-center justify-center shadow-md transition-colors" title="View Details">
                            <i class="ri-eye-line text-lg"></i>
                        </a>
                    </div>
                </div>
                <div class="p-5 flex flex-col flex-1 justify-between">
                    <div>
                        <span class="text-[11px] uppercase tracking-wider text-[#8A5A44] font-medium">Sofas & Lounge</span>
                        <h3 class="font-serif text-base font-normal text-[#362F2A] group-hover:text-[#8A5A44] transition-colors mt-0.5">
                            <a href="product_detail.php?id=11">Compact Nordic Loveseat</a>
                        </h3>
                    </div>
                    <div class="pt-4 flex items-center justify-between border-t border-[#C9C0B3] mt-4">
                        <span class="text-sm font-semibold text-[#362F2A] font-serif">890,000 MMK</span>
                        <span class="text-xs text-[#6E6359]">15 in stock</span>
                    </div>
                </div>
            </article>

            <!-- Product Item 12: Solid Natural Oak Dining Table -->
            <article class="product-card group bg-[#F6F3EE] rounded-3xl border border-[#C9C0B3] overflow-hidden transition-all duration-300 hover:shadow-xl hover:border-[#8A5A44] flex flex-col justify-between" data-category="tables" data-price="890000" data-name="solid natural oak dining table">
                <div class="relative w-full aspect-[4/3] bg-[#EDE8E0] border-b border-[#C9C0B3] overflow-hidden flex items-center justify-center">
                    <span class="absolute top-3 left-3 z-10 inline-flex items-center px-2.5 py-1 rounded-full text-[11px] font-medium bg-[#DCE5DF] text-[#3F624D] border border-[#C6D6CB]">
                        In Stock
                    </span>
                    <a href="product_detail.php?id=12" class="w-full h-full block">
                        <img src="images/table-1.jpg" alt="Solid Natural Oak Dining Table" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" loading="lazy">
                    </a>
                    <div class="absolute inset-0 bg-[#362F2A]/20 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center gap-2">
                        <a href="product_detail.php?id=12" class="w-10 h-10 rounded-full bg-[#8A5A44] text-[#F6F3EE] hover:bg-[#704735] hover:text-[#F6F3EE] flex items-center justify-center shadow-md transition-colors" title="View Details">
                            <i class="ri-eye-line text-lg"></i>
                        </a>
                    </div>
                </div>
                <div class="p-5 flex flex-col flex-1 justify-between">
                    <div>
                        <span class="text-[11px] uppercase tracking-wider text-[#8A5A44] font-medium">Dining Tables</span>
                        <h3 class="font-serif text-base font-normal text-[#362F2A] group-hover:text-[#8A5A44] transition-colors mt-0.5">
                            <a href="product_detail.php?id=12">Solid Natural Oak Dining Table</a>
                        </h3>
                    </div>
                    <div class="pt-4 flex items-center justify-between border-t border-[#C9C0B3] mt-4">
                        <span class="text-sm font-semibold text-[#362F2A] font-serif">890,000 MMK</span>
                        <span class="text-xs text-[#6E6359]">14 in stock</span>
                    </div>
                </div>
            </article>

            <!-- Product Item 13: Solid Walnut Executive Table -->
            <article class="product-card group bg-[#F6F3EE] rounded-3xl border border-[#C9C0B3] overflow-hidden transition-all duration-300 hover:shadow-xl hover:border-[#8A5A44] flex flex-col justify-between" data-category="tables" data-price="1120000" data-name="solid walnut executive table">
                <div class="relative w-full aspect-[4/3] bg-[#EDE8E0] border-b border-[#C9C0B3] overflow-hidden flex items-center justify-center">
                    <span class="absolute top-3 left-3 z-10 inline-flex items-center px-2.5 py-1 rounded-full text-[11px] font-medium bg-[#DCE5DF] text-[#3F624D] border border-[#C6D6CB]">
                        In Stock
                    </span>
                    <a href="product_detail.php?id=13" class="w-full h-full block">
                        <img src="images/table-2.jpg" alt="Solid Walnut Executive Table" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" loading="lazy">
                    </a>
                    <div class="absolute inset-0 bg-[#362F2A]/20 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center gap-2">
                        <a href="product_detail.php?id=13" class="w-10 h-10 rounded-full bg-[#8A5A44] text-[#F6F3EE] hover:bg-[#704735] hover:text-[#F6F3EE] flex items-center justify-center shadow-md transition-colors" title="View Details">
                            <i class="ri-eye-line text-lg"></i>
                        </a>
                    </div>
                </div>
                <div class="p-5 flex flex-col flex-1 justify-between">
                    <div>
                        <span class="text-[11px] uppercase tracking-wider text-[#8A5A44] font-medium">Executive Tables</span>
                        <h3 class="font-serif text-base font-normal text-[#362F2A] group-hover:text-[#8A5A44] transition-colors mt-0.5">
                            <a href="product_detail.php?id=13">Solid Walnut Executive Table</a>
                        </h3>
                    </div>
                    <div class="pt-4 flex items-center justify-between border-t border-[#C9C0B3] mt-4">
                        <span class="text-sm font-semibold text-[#362F2A] font-serif">1,120,000 MMK</span>
                        <span class="text-xs text-[#6E6359]">12 in stock</span>
                    </div>
                </div>
            </article>

            <!-- Product Item 14: Marble Low Coffee Table -->
            <article class="product-card group bg-[#F6F3EE] rounded-3xl border border-[#C9C0B3] overflow-hidden transition-all duration-300 hover:shadow-xl hover:border-[#8A5A44] flex flex-col justify-between" data-category="tables" data-price="520000" data-name="marble low coffee table">
                <div class="relative w-full aspect-[4/3] bg-[#EDE8E0] border-b border-[#C9C0B3] overflow-hidden flex items-center justify-center">
                    <span class="absolute top-3 left-3 z-10 inline-flex items-center px-2.5 py-1 rounded-full text-[11px] font-medium bg-[#DCE5DF] text-[#3F624D] border border-[#C6D6CB]">
                        In Stock
                    </span>
                    <a href="product_detail.php?id=14" class="w-full h-full block">
                        <img src="images/table-3.jpg" alt="Marble Low Coffee Table" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" loading="lazy">
                    </a>
                    <div class="absolute inset-0 bg-[#362F2A]/20 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center gap-2">
                        <a href="product_detail.php?id=14" class="w-10 h-10 rounded-full bg-[#8A5A44] text-[#F6F3EE] hover:bg-[#704735] hover:text-[#F6F3EE] flex items-center justify-center shadow-md transition-colors" title="View Details">
                            <i class="ri-eye-line text-lg"></i>
                        </a>
                    </div>
                </div>
                <div class="p-5 flex flex-col flex-1 justify-between">
                    <div>
                        <span class="text-[11px] uppercase tracking-wider text-[#8A5A44] font-medium">Coffee Tables</span>
                        <h3 class="font-serif text-base font-normal text-[#362F2A] group-hover:text-[#8A5A44] transition-colors mt-0.5">
                            <a href="product_detail.php?id=14">Marble Low Coffee Table</a>
                        </h3>
                    </div>
                    <div class="pt-4 flex items-center justify-between border-t border-[#C9C0B3] mt-4">
                        <span class="text-sm font-semibold text-[#362F2A] font-serif">520,000 MMK</span>
                        <span class="text-xs text-[#6E6359]">18 in stock</span>
                    </div>
                </div>
            </article>

            <!-- Product Item 15: Travertine Architectural Side Table -->
            <article class="product-card group bg-[#F6F3EE] rounded-3xl border border-[#C9C0B3] overflow-hidden transition-all duration-300 hover:shadow-xl hover:border-[#8A5A44] flex flex-col justify-between" data-category="tables" data-price="380000" data-name="travertine architectural side table">
                <div class="relative w-full aspect-[4/3] bg-[#EDE8E0] border-b border-[#C9C0B3] overflow-hidden flex items-center justify-center">
                    <span class="absolute top-3 left-3 z-10 inline-flex items-center px-2.5 py-1 rounded-full text-[11px] font-medium bg-[#DCE5DF] text-[#3F624D] border border-[#C6D6CB]">
                        In Stock
                    </span>
                    <a href="product_detail.php?id=15" class="w-full h-full block">
                        <img src="images/table-4.jpg" alt="Travertine Architectural Side Table" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" loading="lazy">
                    </a>
                    <div class="absolute inset-0 bg-[#362F2A]/20 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center gap-2">
                        <a href="product_detail.php?id=15" class="w-10 h-10 rounded-full bg-[#8A5A44] text-[#F6F3EE] hover:bg-[#704735] hover:text-[#F6F3EE] flex items-center justify-center shadow-md transition-colors" title="View Details">
                            <i class="ri-eye-line text-lg"></i>
                        </a>
                    </div>
                </div>
                <div class="p-5 flex flex-col flex-1 justify-between">
                    <div>
                        <span class="text-[11px] uppercase tracking-wider text-[#8A5A44] font-medium">Side Tables</span>
                        <h3 class="font-serif text-base font-normal text-[#362F2A] group-hover:text-[#8A5A44] transition-colors mt-0.5">
                            <a href="product_detail.php?id=15">Travertine Architectural Side Table</a>
                        </h3>
                    </div>
                    <div class="pt-4 flex items-center justify-between border-t border-[#C9C0B3] mt-4">
                        <span class="text-sm font-semibold text-[#362F2A] font-serif">380,000 MMK</span>
                        <span class="text-xs text-[#6E6359]">22 in stock</span>
                    </div>
                </div>
            </article>

            <!-- Product Item 16: Round Oak Bistro Dining Table -->
            <article class="product-card group bg-[#F6F3EE] rounded-3xl border border-[#C9C0B3] overflow-hidden transition-all duration-300 hover:shadow-xl hover:border-[#8A5A44] flex flex-col justify-between" data-category="tables" data-price="640000" data-name="round oak bistro dining table">
                <div class="relative w-full aspect-[4/3] bg-[#EDE8E0] border-b border-[#C9C0B3] overflow-hidden flex items-center justify-center">
                    <span class="absolute top-3 left-3 z-10 inline-flex items-center px-2.5 py-1 rounded-full text-[11px] font-medium bg-[#DCE5DF] text-[#3F624D] border border-[#C6D6CB]">
                        In Stock
                    </span>
                    <a href="product_detail.php?id=16" class="w-full h-full block">
                        <img src="images/table-5.jpg" alt="Round Oak Bistro Dining Table" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" loading="lazy">
                    </a>
                    <div class="absolute inset-0 bg-[#362F2A]/20 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center gap-2">
                        <a href="product_detail.php?id=16" class="w-10 h-10 rounded-full bg-[#8A5A44] text-[#F6F3EE] hover:bg-[#704735] hover:text-[#F6F3EE] flex items-center justify-center shadow-md transition-colors" title="View Details">
                            <i class="ri-eye-line text-lg"></i>
                        </a>
                    </div>
                </div>
                <div class="p-5 flex flex-col flex-1 justify-between">
                    <div>
                        <span class="text-[11px] uppercase tracking-wider text-[#8A5A44] font-medium">Dining Tables</span>
                        <h3 class="font-serif text-base font-normal text-[#362F2A] group-hover:text-[#8A5A44] transition-colors mt-0.5">
                            <a href="product_detail.php?id=16">Round Oak Bistro Dining Table</a>
                        </h3>
                    </div>
                    <div class="pt-4 flex items-center justify-between border-t border-[#C9C0B3] mt-4">
                        <span class="text-sm font-semibold text-[#362F2A] font-serif">640,000 MMK</span>
                        <span class="text-xs text-[#6E6359]">16 in stock</span>
                    </div>
                </div>
            </article>

            <!-- Product Item 17: Minimalist Solid Wood Desk -->
            <article class="product-card group bg-[#F6F3EE] rounded-3xl border border-[#C9C0B3] overflow-hidden transition-all duration-300 hover:shadow-xl hover:border-[#8A5A44] flex flex-col justify-between" data-category="tables" data-price="750000" data-name="minimalist solid wood desk">
                <div class="relative w-full aspect-[4/3] bg-[#EDE8E0] border-b border-[#C9C0B3] overflow-hidden flex items-center justify-center">
                    <span class="absolute top-3 left-3 z-10 inline-flex items-center px-2.5 py-1 rounded-full text-[11px] font-medium bg-[#DCE5DF] text-[#3F624D] border border-[#C6D6CB]">
                        In Stock
                    </span>
                    <a href="product_detail.php?id=17" class="w-full h-full block">
                        <img src="images/table-6.jpg" alt="Minimalist Solid Wood Desk" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" loading="lazy">
                    </a>
                    <div class="absolute inset-0 bg-[#362F2A]/20 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center gap-2">
                        <a href="product_detail.php?id=17" class="w-10 h-10 rounded-full bg-[#8A5A44] text-[#F6F3EE] hover:bg-[#704735] hover:text-[#F6F3EE] flex items-center justify-center shadow-md transition-colors" title="View Details">
                            <i class="ri-eye-line text-lg"></i>
                        </a>
                    </div>
                </div>
                <div class="p-5 flex flex-col flex-1 justify-between">
                    <div>
                        <span class="text-[11px] uppercase tracking-wider text-[#8A5A44] font-medium">Workspaces</span>
                        <h3 class="font-serif text-base font-normal text-[#362F2A] group-hover:text-[#8A5A44] transition-colors mt-0.5">
                            <a href="product_detail.php?id=17">Minimalist Solid Wood Desk</a>
                        </h3>
                    </div>
                    <div class="pt-4 flex items-center justify-between border-t border-[#C9C0B3] mt-4">
                        <span class="text-sm font-semibold text-[#362F2A] font-serif">750,000 MMK</span>
                        <span class="text-xs text-[#6E6359]">11 in stock</span>
                    </div>
                </div>
            </article>

            <!-- Product Item 18: Upholstered Platform Bed -->
            <article class="product-card group bg-[#F6F3EE] rounded-3xl border border-[#C9C0B3] overflow-hidden transition-all duration-300 hover:shadow-xl hover:border-[#8A5A44] flex flex-col justify-between" data-category="beds" data-price="1480000" data-name="upholstered platform bed">
                <div class="relative w-full aspect-[4/3] bg-[#EDE8E0] border-b border-[#C9C0B3] overflow-hidden flex items-center justify-center">
                    <span class="absolute top-3 left-3 z-10 inline-flex items-center px-2.5 py-1 rounded-full text-[11px] font-medium bg-[#DCE5DF] text-[#3F624D] border border-[#C6D6CB]">
                        In Stock
                    </span>
                    <a href="product_detail.php?id=18" class="w-full h-full block">
                        <img src="images/bed-1.jpg" alt="Upholstered Platform Bed" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" loading="lazy">
                    </a>
                    <div class="absolute inset-0 bg-[#362F2A]/20 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center gap-2">
                        <a href="product_detail.php?id=18" class="w-10 h-10 rounded-full bg-[#8A5A44] text-[#F6F3EE] hover:bg-[#704735] hover:text-[#F6F3EE] flex items-center justify-center shadow-md transition-colors" title="View Details">
                            <i class="ri-eye-line text-lg"></i>
                        </a>
                    </div>
                </div>
                <div class="p-5 flex flex-col flex-1 justify-between">
                    <div>
                        <span class="text-[11px] uppercase tracking-wider text-[#8A5A44] font-medium">Bedroom Architecture</span>
                        <h3 class="font-serif text-base font-normal text-[#362F2A] group-hover:text-[#8A5A44] transition-colors mt-0.5">
                            <a href="product_detail.php?id=18">Upholstered Platform Bed</a>
                        </h3>
                    </div>
                    <div class="pt-4 flex items-center justify-between border-t border-[#C9C0B3] mt-4">
                        <span class="text-sm font-semibold text-[#362F2A] font-serif">1,480,000 MMK</span>
                        <span class="text-xs text-[#6E6359]">10 in stock</span>
                    </div>
                </div>
            </article>

            <!-- Product Item 19: Japandi Low Tatami Bed -->
            <article class="product-card group bg-[#F6F3EE] rounded-3xl border border-[#C9C0B3] overflow-hidden transition-all duration-300 hover:shadow-xl hover:border-[#8A5A44] flex flex-col justify-between" data-category="beds" data-price="1850000" data-name="japandi low tatami bed">
                <div class="relative w-full aspect-[4/3] bg-[#EDE8E0] border-b border-[#C9C0B3] overflow-hidden flex items-center justify-center">
                    <span class="absolute top-3 left-3 z-10 inline-flex items-center px-2.5 py-1 rounded-full text-[11px] font-medium bg-[#EFE2D5] text-[#8C5327] border border-[#E0CFBF]">
                        Low Stock
                    </span>
                    <a href="product_detail.php?id=19" class="w-full h-full block">
                        <img src="images/bed-2.jpg" alt="Japandi Low Tatami Bed" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" loading="lazy">
                    </a>
                    <div class="absolute inset-0 bg-[#362F2A]/20 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center gap-2">
                        <a href="product_detail.php?id=19" class="w-10 h-10 rounded-full bg-[#8A5A44] text-[#F6F3EE] hover:bg-[#704735] hover:text-[#F6F3EE] flex items-center justify-center shadow-md transition-colors" title="View Details">
                            <i class="ri-eye-line text-lg"></i>
                        </a>
                    </div>
                </div>
                <div class="p-5 flex flex-col flex-1 justify-between">
                    <div>
                        <span class="text-[11px] uppercase tracking-wider text-[#8A5A44] font-medium">Low Platform Beds</span>
                        <h3 class="font-serif text-base font-normal text-[#362F2A] group-hover:text-[#8A5A44] transition-colors mt-0.5">
                            <a href="product_detail.php?id=19">Japandi Low Tatami Bed</a>
                        </h3>
                    </div>
                    <div class="pt-4 flex items-center justify-between border-t border-[#C9C0B3] mt-4">
                        <span class="text-sm font-semibold text-[#362F2A] font-serif">1,850,000 MMK</span>
                        <span class="text-xs text-[#6E6359]">5 in stock</span>
                    </div>
                </div>
            </article>

            <!-- Product Item 20: Solid Oak Frame King Bed -->
            <article class="product-card group bg-[#F6F3EE] rounded-3xl border border-[#C9C0B3] overflow-hidden transition-all duration-300 hover:shadow-xl hover:border-[#8A5A44] flex flex-col justify-between" data-category="beds" data-price="1720000" data-name="solid oak frame king bed">
                <div class="relative w-full aspect-[4/3] bg-[#EDE8E0] border-b border-[#C9C0B3] overflow-hidden flex items-center justify-center">
                    <span class="absolute top-3 left-3 z-10 inline-flex items-center px-2.5 py-1 rounded-full text-[11px] font-medium bg-[#DCE5DF] text-[#3F624D] border border-[#C6D6CB]">
                        In Stock
                    </span>
                    <a href="product_detail.php?id=20" class="w-full h-full block">
                        <img src="images/bed-3.jpg" alt="Solid Oak Frame King Bed" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" loading="lazy">
                    </a>
                    <div class="absolute inset-0 bg-[#362F2A]/20 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center gap-2">
                        <a href="product_detail.php?id=20" class="w-10 h-10 rounded-full bg-[#8A5A44] text-[#F6F3EE] hover:bg-[#704735] hover:text-[#F6F3EE] flex items-center justify-center shadow-md transition-colors" title="View Details">
                            <i class="ri-eye-line text-lg"></i>
                        </a>
                    </div>
                </div>
                <div class="p-5 flex flex-col flex-1 justify-between">
                    <div>
                        <span class="text-[11px] uppercase tracking-wider text-[#8A5A44] font-medium">King Beds</span>
                        <h3 class="font-serif text-base font-normal text-[#362F2A] group-hover:text-[#8A5A44] transition-colors mt-0.5">
                            <a href="product_detail.php?id=20">Solid Oak Frame King Bed</a>
                        </h3>
                    </div>
                    <div class="pt-4 flex items-center justify-between border-t border-[#C9C0B3] mt-4">
                        <span class="text-sm font-semibold text-[#362F2A] font-serif">1,720,000 MMK</span>
                        <span class="text-xs text-[#6E6359]">8 in stock</span>
                    </div>
                </div>
            </article>

            <!-- Product Item 21: Walnut Floating Low Bed -->
            <article class="product-card group bg-[#F6F3EE] rounded-3xl border border-[#C9C0B3] overflow-hidden transition-all duration-300 hover:shadow-xl hover:border-[#8A5A44] flex flex-col justify-between" data-category="beds" data-price="1650000" data-name="walnut floating low bed">
                <div class="relative w-full aspect-[4/3] bg-[#EDE8E0] border-b border-[#C9C0B3] overflow-hidden flex items-center justify-center">
                    <span class="absolute top-3 left-3 z-10 inline-flex items-center px-2.5 py-1 rounded-full text-[11px] font-medium bg-[#DCE5DF] text-[#3F624D] border border-[#C6D6CB]">
                        In Stock
                    </span>
                    <a href="product_detail.php?id=21" class="w-full h-full block">
                        <img src="images/bed-4.jpg" alt="Walnut Floating Low Bed" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" loading="lazy">
                    </a>
                    <div class="absolute inset-0 bg-[#362F2A]/20 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center gap-2">
                        <a href="product_detail.php?id=21" class="w-10 h-10 rounded-full bg-[#8A5A44] text-[#F6F3EE] hover:bg-[#704735] hover:text-[#F6F3EE] flex items-center justify-center shadow-md transition-colors" title="View Details">
                            <i class="ri-eye-line text-lg"></i>
                        </a>
                    </div>
                </div>
                <div class="p-5 flex flex-col flex-1 justify-between">
                    <div>
                        <span class="text-[11px] uppercase tracking-wider text-[#8A5A44] font-medium">Platform Beds</span>
                        <h3 class="font-serif text-base font-normal text-[#362F2A] group-hover:text-[#8A5A44] transition-colors mt-0.5">
                            <a href="product_detail.php?id=21">Walnut Floating Low Bed</a>
                        </h3>
                    </div>
                    <div class="pt-4 flex items-center justify-between border-t border-[#C9C0B3] mt-4">
                        <span class="text-sm font-semibold text-[#362F2A] font-serif">1,650,000 MMK</span>
                        <span class="text-xs text-[#6E6359]">12 in stock</span>
                    </div>
                </div>
            </article>

            <!-- Product Item 22: Natural Linen Canopy Bed -->
            <article class="product-card group bg-[#F6F3EE] rounded-3xl border border-[#C9C0B3] overflow-hidden transition-all duration-300 hover:shadow-xl hover:border-[#8A5A44] flex flex-col justify-between" data-category="beds" data-price="2250000" data-name="natural linen canopy bed">
                <div class="relative w-full aspect-[4/3] bg-[#EDE8E0] border-b border-[#C9C0B3] overflow-hidden flex items-center justify-center">
                    <span class="absolute top-3 left-3 z-10 inline-flex items-center px-2.5 py-1 rounded-full text-[11px] font-medium bg-[#EFE2D5] text-[#8C5327] border border-[#E0CFBF]">
                        Low Stock
                    </span>
                    <a href="product_detail.php?id=22" class="w-full h-full block">
                        <img src="images/bed-5.jpg" alt="Natural Linen Canopy Bed" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" loading="lazy">
                    </a>
                    <div class="absolute inset-0 bg-[#362F2A]/20 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center gap-2">
                        <a href="product_detail.php?id=22" class="w-10 h-10 rounded-full bg-[#8A5A44] text-[#F6F3EE] hover:bg-[#704735] hover:text-[#F6F3EE] flex items-center justify-center shadow-md transition-colors" title="View Details">
                            <i class="ri-eye-line text-lg"></i>
                        </a>
                    </div>
                </div>
                <div class="p-5 flex flex-col flex-1 justify-between">
                    <div>
                        <span class="text-[11px] uppercase tracking-wider text-[#8A5A44] font-medium">Canopy Beds</span>
                        <h3 class="font-serif text-base font-normal text-[#362F2A] group-hover:text-[#8A5A44] transition-colors mt-0.5">
                            <a href="product_detail.php?id=22">Natural Linen Canopy Bed</a>
                        </h3>
                    </div>
                    <div class="pt-4 flex items-center justify-between border-t border-[#C9C0B3] mt-4">
                        <span class="text-sm font-semibold text-[#362F2A] font-serif">2,250,000 MMK</span>
                        <span class="text-xs text-[#6E6359]">3 in stock</span>
                    </div>
                </div>
            </article>

            <!-- Product Item 23: Minimalist Queen Platform Bed -->
            <article class="product-card group bg-[#F6F3EE] rounded-3xl border border-[#C9C0B3] overflow-hidden transition-all duration-300 hover:shadow-xl hover:border-[#8A5A44] flex flex-col justify-between" data-category="beds" data-price="1390000" data-name="minimalist queen platform bed">
                <div class="relative w-full aspect-[4/3] bg-[#EDE8E0] border-b border-[#C9C0B3] overflow-hidden flex items-center justify-center">
                    <span class="absolute top-3 left-3 z-10 inline-flex items-center px-2.5 py-1 rounded-full text-[11px] font-medium bg-[#DCE5DF] text-[#3F624D] border border-[#C6D6CB]">
                        In Stock
                    </span>
                    <a href="product_detail.php?id=23" class="w-full h-full block">
                        <img src="images/bed-6.jpg" alt="Minimalist Queen Platform Bed" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" loading="lazy">
                    </a>
                    <div class="absolute inset-0 bg-[#362F2A]/20 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center gap-2">
                        <a href="product_detail.php?id=23" class="w-10 h-10 rounded-full bg-[#8A5A44] text-[#F6F3EE] hover:bg-[#704735] hover:text-[#F6F3EE] flex items-center justify-center shadow-md transition-colors" title="View Details">
                            <i class="ri-eye-line text-lg"></i>
                        </a>
                    </div>
                </div>
                <div class="p-5 flex flex-col flex-1 justify-between">
                    <div>
                        <span class="text-[11px] uppercase tracking-wider text-[#8A5A44] font-medium">Queen Beds</span>
                        <h3 class="font-serif text-base font-normal text-[#362F2A] group-hover:text-[#8A5A44] transition-colors mt-0.5">
                            <a href="product_detail.php?id=23">Minimalist Queen Platform Bed</a>
                        </h3>
                    </div>
                    <div class="pt-4 flex items-center justify-between border-t border-[#C9C0B3] mt-4">
                        <span class="text-sm font-semibold text-[#362F2A] font-serif">1,390,000 MMK</span>
                        <span class="text-xs text-[#6E6359]">14 in stock</span>
                    </div>
                </div>
            </article>

            <!-- Product Item 24: Nordic Timber Storage Bed -->
            <article class="product-card group bg-[#F6F3EE] rounded-3xl border border-[#C9C0B3] overflow-hidden transition-all duration-300 hover:shadow-xl hover:border-[#8A5A44] flex flex-col justify-between" data-category="beds" data-price="1580000" data-name="nordic timber storage bed">
                <div class="relative w-full aspect-[4/3] bg-[#EDE8E0] border-b border-[#C9C0B3] overflow-hidden flex items-center justify-center">
                    <span class="absolute top-3 left-3 z-10 inline-flex items-center px-2.5 py-1 rounded-full text-[11px] font-medium bg-[#DCE5DF] text-[#3F624D] border border-[#C6D6CB]">
                        In Stock
                    </span>
                    <a href="product_detail.php?id=24" class="w-full h-full block">
                        <img src="images/bed-7.jpg" alt="Nordic Timber Storage Bed" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" loading="lazy">
                    </a>
                    <div class="absolute inset-0 bg-[#362F2A]/20 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center gap-2">
                        <a href="product_detail.php?id=24" class="w-10 h-10 rounded-full bg-[#8A5A44] text-[#F6F3EE] hover:bg-[#704735] hover:text-[#F6F3EE] flex items-center justify-center shadow-md transition-colors" title="View Details">
                            <i class="ri-eye-line text-lg"></i>
                        </a>
                    </div>
                </div>
                <div class="p-5 flex flex-col flex-1 justify-between">
                    <div>
                        <span class="text-[11px] uppercase tracking-wider text-[#8A5A44] font-medium">Storage Beds</span>
                        <h3 class="font-serif text-base font-normal text-[#362F2A] group-hover:text-[#8A5A44] transition-colors mt-0.5">
                            <a href="product_detail.php?id=24">Nordic Timber Storage Bed</a>
                        </h3>
                    </div>
                    <div class="pt-4 flex items-center justify-between border-t border-[#C9C0B3] mt-4">
                        <span class="text-sm font-semibold text-[#362F2A] font-serif">1,580,000 MMK</span>
                        <span class="text-xs text-[#6E6359]">9 in stock</span>
                    </div>
                </div>
            </article>

            <!-- Product Item 25: Coastal Retreat Woven Bed -->
            <article class="product-card group bg-[#F6F3EE] rounded-3xl border border-[#C9C0B3] overflow-hidden transition-all duration-300 hover:shadow-xl hover:border-[#8A5A44] flex flex-col justify-between" data-category="beds" data-price="1890000" data-name="coastal retreat woven bed">
                <div class="relative w-full aspect-[4/3] bg-[#EDE8E0] border-b border-[#C9C0B3] overflow-hidden flex items-center justify-center">
                    <span class="absolute top-3 left-3 z-10 inline-flex items-center px-2.5 py-1 rounded-full text-[11px] font-medium bg-[#DCE5DF] text-[#3F624D] border border-[#C6D6CB]">
                        In Stock
                    </span>
                    <a href="product_detail.php?id=25" class="w-full h-full block">
                        <img src="images/bed-8.jpg" alt="Coastal Retreat Woven Bed" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" loading="lazy">
                    </a>
                    <div class="absolute inset-0 bg-[#362F2A]/20 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center gap-2">
                        <a href="product_detail.php?id=25" class="w-10 h-10 rounded-full bg-[#8A5A44] text-[#F6F3EE] hover:bg-[#704735] hover:text-[#F6F3EE] flex items-center justify-center shadow-md transition-colors" title="View Details">
                            <i class="ri-eye-line text-lg"></i>
                        </a>
                    </div>
                </div>
                <div class="p-5 flex flex-col flex-1 justify-between">
                    <div>
                        <span class="text-[11px] uppercase tracking-wider text-[#8A5A44] font-medium">Woven Beds</span>
                        <h3 class="font-serif text-base font-normal text-[#362F2A] group-hover:text-[#8A5A44] transition-colors mt-0.5">
                            <a href="product_detail.php?id=25">Coastal Retreat Woven Bed</a>
                        </h3>
                    </div>
                    <div class="pt-4 flex items-center justify-between border-t border-[#C9C0B3] mt-4">
                        <span class="text-sm font-semibold text-[#362F2A] font-serif">1,890,000 MMK</span>
                        <span class="text-xs text-[#6E6359]">7 in stock</span>
                    </div>
                </div>
            </article>

            <!-- Product Item 26: Woven Rattan Headboard Bed -->
            <article class="product-card group bg-[#F6F3EE] rounded-3xl border border-[#C9C0B3] overflow-hidden transition-all duration-300 hover:shadow-xl hover:border-[#8A5A44] flex flex-col justify-between" data-category="beds" data-price="1620000" data-name="woven rattan headboard bed">
                <div class="relative w-full aspect-[4/3] bg-[#EDE8E0] border-b border-[#C9C0B3] overflow-hidden flex items-center justify-center">
                    <span class="absolute top-3 left-3 z-10 inline-flex items-center px-2.5 py-1 rounded-full text-[11px] font-medium bg-[#DCE5DF] text-[#3F624D] border border-[#C6D6CB]">
                        In Stock
                    </span>
                    <a href="product_detail.php?id=26" class="w-full h-full block">
                        <img src="images/bed-9.jpg" alt="Woven Rattan Headboard Bed" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" loading="lazy">
                    </a>
                    <div class="absolute inset-0 bg-[#362F2A]/20 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center gap-2">
                        <a href="product_detail.php?id=26" class="w-10 h-10 rounded-full bg-[#8A5A44] text-[#F6F3EE] hover:bg-[#704735] hover:text-[#F6F3EE] flex items-center justify-center shadow-md transition-colors" title="View Details">
                            <i class="ri-eye-line text-lg"></i>
                        </a>
                    </div>
                </div>
                <div class="p-5 flex flex-col flex-1 justify-between">
                    <div>
                        <span class="text-[11px] uppercase tracking-wider text-[#8A5A44] font-medium">Artisan Beds</span>
                        <h3 class="font-serif text-base font-normal text-[#362F2A] group-hover:text-[#8A5A44] transition-colors mt-0.5">
                            <a href="product_detail.php?id=26">Woven Rattan Headboard Bed</a>
                        </h3>
                    </div>
                    <div class="pt-4 flex items-center justify-between border-t border-[#C9C0B3] mt-4">
                        <span class="text-sm font-semibold text-[#362F2A] font-serif">1,620,000 MMK</span>
                        <span class="text-xs text-[#6E6359]">8 in stock</span>
                    </div>
                </div>
            </article>

            <!-- Product Item 27: Modern Slate Upholstered Bed -->
            <article class="product-card group bg-[#F6F3EE] rounded-3xl border border-[#C9C0B3] overflow-hidden transition-all duration-300 hover:shadow-xl hover:border-[#8A5A44] flex flex-col justify-between" data-category="beds" data-price="1790000" data-name="modern slate upholstered bed">
                <div class="relative w-full aspect-[4/3] bg-[#EDE8E0] border-b border-[#C9C0B3] overflow-hidden flex items-center justify-center">
                    <span class="absolute top-3 left-3 z-10 inline-flex items-center px-2.5 py-1 rounded-full text-[11px] font-medium bg-[#EFE2D5] text-[#8C5327] border border-[#E0CFBF]">
                        Low Stock
                    </span>
                    <a href="product_detail.php?id=27" class="w-full h-full block">
                        <img src="images/bed-10.jpg" alt="Modern Slate Upholstered Bed" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" loading="lazy">
                    </a>
                    <div class="absolute inset-0 bg-[#362F2A]/20 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center gap-2">
                        <a href="product_detail.php?id=27" class="w-10 h-10 rounded-full bg-[#8A5A44] text-[#F6F3EE] hover:bg-[#704735] hover:text-[#F6F3EE] flex items-center justify-center shadow-md transition-colors" title="View Details">
                            <i class="ri-eye-line text-lg"></i>
                        </a>
                    </div>
                </div>
                <div class="p-5 flex flex-col flex-1 justify-between">
                    <div>
                        <span class="text-[11px] uppercase tracking-wider text-[#8A5A44] font-medium">Upholstered Beds</span>
                        <h3 class="font-serif text-base font-normal text-[#362F2A] group-hover:text-[#8A5A44] transition-colors mt-0.5">
                            <a href="product_detail.php?id=27">Modern Slate Upholstered Bed</a>
                        </h3>
                    </div>
                    <div class="pt-4 flex items-center justify-between border-t border-[#C9C0B3] mt-4">
                        <span class="text-sm font-semibold text-[#362F2A] font-serif">1,790,000 MMK</span>
                        <span class="text-xs text-[#6E6359]">6 in stock</span>
                    </div>
                </div>
            </article>

            <!-- Product Item 28: Sculptural Ceramic Table Lamp -->
            <article class="product-card group bg-[#F6F3EE] rounded-3xl border border-[#C9C0B3] overflow-hidden transition-all duration-300 hover:shadow-xl hover:border-[#8A5A44] flex flex-col justify-between" data-category="objects" data-price="195000" data-name="sculptural ceramic table lamp">
                <div class="relative w-full aspect-[4/3] bg-[#EDE8E0] border-b border-[#C9C0B3] overflow-hidden flex items-center justify-center">
                    <span class="absolute top-3 left-3 z-10 inline-flex items-center px-2.5 py-1 rounded-full text-[11px] font-medium bg-[#DCE5DF] text-[#3F624D] border border-[#C6D6CB]">
                        In Stock
                    </span>
                    <a href="product_detail.php?id=28" class="w-full h-full block">
                        <img src="images/lamp-1.jpg" alt="Sculptural Ceramic Table Lamp" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" loading="lazy">
                    </a>
                    <div class="absolute inset-0 bg-[#362F2A]/20 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center gap-2">
                        <a href="product_detail.php?id=28" class="w-10 h-10 rounded-full bg-[#8A5A44] text-[#F6F3EE] hover:bg-[#704735] hover:text-[#F6F3EE] flex items-center justify-center shadow-md transition-colors" title="View Details">
                            <i class="ri-eye-line text-lg"></i>
                        </a>
                    </div>
                </div>
                <div class="p-5 flex flex-col flex-1 justify-between">
                    <div>
                        <span class="text-[11px] uppercase tracking-wider text-[#8A5A44] font-medium">Ambient Lighting</span>
                        <h3 class="font-serif text-base font-normal text-[#362F2A] group-hover:text-[#8A5A44] transition-colors mt-0.5">
                            <a href="product_detail.php?id=28">Sculptural Ceramic Table Lamp</a>
                        </h3>
                    </div>
                    <div class="pt-4 flex items-center justify-between border-t border-[#C9C0B3] mt-4">
                        <span class="text-sm font-semibold text-[#362F2A] font-serif">195,000 MMK</span>
                        <span class="text-xs text-[#6E6359]">32 in stock</span>
                    </div>
                </div>
            </article>

            <!-- Product Item 29: Handcrafted Wabi-Sabi Ceramic Vase -->
            <article class="product-card group bg-[#F6F3EE] rounded-3xl border border-[#C9C0B3] overflow-hidden transition-all duration-300 hover:shadow-xl hover:border-[#8A5A44] flex flex-col justify-between" data-category="objects" data-price="120000" data-name="handcrafted wabi-sabi ceramic vase">
                <div class="relative w-full aspect-[4/3] bg-[#EDE8E0] border-b border-[#C9C0B3] overflow-hidden flex items-center justify-center">
                    <span class="absolute top-3 left-3 z-10 inline-flex items-center px-2.5 py-1 rounded-full text-[11px] font-medium bg-[#DCE5DF] text-[#3F624D] border border-[#C6D6CB]">
                        In Stock
                    </span>
                    <a href="product_detail.php?id=29" class="w-full h-full block">
                        <img src="images/decor-1.jpg" alt="Handcrafted Wabi-Sabi Ceramic Vase" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" loading="lazy">
                    </a>
                    <div class="absolute inset-0 bg-[#362F2A]/20 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center gap-2">
                        <a href="product_detail.php?id=29" class="w-10 h-10 rounded-full bg-[#8A5A44] text-[#F6F3EE] hover:bg-[#704735] hover:text-[#F6F3EE] flex items-center justify-center shadow-md transition-colors" title="View Details">
                            <i class="ri-eye-line text-lg"></i>
                        </a>
                    </div>
                </div>
                <div class="p-5 flex flex-col flex-1 justify-between">
                    <div>
                        <span class="text-[11px] uppercase tracking-wider text-[#8A5A44] font-medium">Ceramic Objects</span>
                        <h3 class="font-serif text-base font-normal text-[#362F2A] group-hover:text-[#8A5A44] transition-colors mt-0.5">
                            <a href="product_detail.php?id=29">Handcrafted Wabi-Sabi Ceramic Vase</a>
                        </h3>
                    </div>
                    <div class="pt-4 flex items-center justify-between border-t border-[#C9C0B3] mt-4">
                        <span class="text-sm font-semibold text-[#362F2A] font-serif">120,000 MMK</span>
                        <span class="text-xs text-[#6E6359]">28 in stock</span>
                    </div>
                </div>
            </article>
        </div>

        <!-- NO RESULTS PLACEHOLDER -->
        <div id="no-results" class="hidden text-center py-20 bg-[#F6F3EE] rounded-3xl border border-[#C9C0B3] my-8">
            <div class="w-12 h-12 rounded-full bg-[#DFD8CD] text-[#8A5A44] mx-auto flex items-center justify-center text-xl mb-4">
                <i class="ri-search-line"></i>
            </div>
            <h3 class="font-serif text-lg font-normal text-[#362F2A]">No matching pieces found</h3>
            <p class="text-xs text-[#6E6359] mt-1">Try adjusting your category filter or search keywords.</p>
        </div>

        <!-- PAGINATION CONTROLS -->
        <!-- ==================================================================
             PHP BACKEND GUIDELINE: Server-side Pagination
             Calculate total pages:
             $total_items = $count_result->fetch_row()[0];
             $total_pages = ceil($total_items / $limit);
             
             Render page buttons:
             <?php /*
             for ($i = 1; $i <= $total_pages; $i++): ?>
                 <a href="shop.php?category=<?= urlencode($category) ?>&page=<?= $i ?>"
                    class="px-3.5 py-2 rounded-xl text-xs font-semibold <?= ($page == $i) ? 'bg-[#8A5A44] text-[#F6F3EE]' : 'bg-[#F6F3EE] text-[#362F2A] hover:bg-[#DFD8CD]' ?> transition-colors">
                     <?= $i ?>
                 </a>
             <?php endfor;
             */ ?>
             ================================================================== -->
        <div id="catalog-pagination" class="mt-16 flex items-center justify-center gap-2 text-sm flex-wrap"></div>
    </main>

    <?php include "components/footer.php"; ?>
    <?php include "components/js.php"; ?>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const filterBtns = document.querySelectorAll(".filter-btn");
            const searchInput = document.getElementById("catalog-search");
            const sortSelect = document.getElementById("catalog-sort");
            const productGrid = document.getElementById("product-grid");
            const countEl = document.getElementById("product-count");
            const noResults = document.getElementById("no-results");
            const paginationEl = document.getElementById("catalog-pagination");

            if (!productGrid) return;
            const cards = Array.from(productGrid.querySelectorAll(".product-card"));

            // Refined pagination limit (8 curated pieces per page to prevent card clutter)
            const ITEMS_PER_PAGE = 8;
            let currentCategory = "all";
            let searchQuery = "";
            let currentPage = 1;
            let filteredCards = [...cards];

            function renderPagination(totalPages) {
                if (!paginationEl) return;
                paginationEl.innerHTML = "";
                if (totalPages <= 1) return;

                // Previous page button
                const prevBtn = document.createElement("button");
                prevBtn.type = "button";
                prevBtn.setAttribute("aria-label", "Previous Page");
                prevBtn.className = `w-10 h-10 rounded-xl border border-[#C9C0B3] flex items-center justify-center transition-colors ${currentPage === 1 ? "text-[#B5ABA0] cursor-not-allowed opacity-50" : "text-[#362F2A] hover:bg-[#DFD8CD] cursor-pointer"}`;
                prevBtn.innerHTML = '<i class="ri-arrow-left-s-line text-lg"></i>';
                if (currentPage > 1) {
                    prevBtn.addEventListener("click", () => {
                        currentPage--;
                        updateView();
                        productGrid.scrollIntoView({
                            behavior: "smooth",
                            block: "start"
                        });
                    });
                }
                paginationEl.appendChild(prevBtn);

                // Numeric page buttons
                for (let i = 1; i <= totalPages; i++) {
                    const pageBtn = document.createElement("button");
                    pageBtn.type = "button";
                    pageBtn.textContent = i;
                    if (i === currentPage) {
                        pageBtn.className = "w-10 h-10 rounded-xl bg-[#8A5A44] text-[#F6F3EE] flex items-center justify-center font-semibold shadow-sm";
                    } else {
                        pageBtn.className = "w-10 h-10 rounded-xl border border-[#C9C0B3] text-[#362F2A] hover:bg-[#DFD8CD] flex items-center justify-center font-medium transition-colors cursor-pointer";
                        pageBtn.addEventListener("click", () => {
                            currentPage = i;
                            updateView();
                            productGrid.scrollIntoView({
                                behavior: "smooth",
                                block: "start"
                            });
                        });
                    }
                    paginationEl.appendChild(pageBtn);
                }

                // Next page button
                const nextBtn = document.createElement("button");
                nextBtn.type = "button";
                nextBtn.setAttribute("aria-label", "Next Page");
                nextBtn.className = `w-10 h-10 rounded-xl border border-[#C9C0B3] flex items-center justify-center transition-colors ${currentPage === totalPages ? "text-[#B5ABA0] cursor-not-allowed opacity-50" : "text-[#362F2A] hover:bg-[#DFD8CD] cursor-pointer"}`;
                nextBtn.innerHTML = '<i class="ri-arrow-right-s-line text-lg"></i>';
                if (currentPage < totalPages) {
                    nextBtn.addEventListener("click", () => {
                        currentPage++;
                        updateView();
                        productGrid.scrollIntoView({
                            behavior: "smooth",
                            block: "start"
                        });
                    });
                }
                paginationEl.appendChild(nextBtn);
            }

            function updateView() {
                const total = filteredCards.length;
                const totalPages = Math.ceil(total / ITEMS_PER_PAGE);

                if (currentPage > totalPages && totalPages > 0) currentPage = totalPages;
                if (currentPage < 1) currentPage = 1;

                const startIndex = (currentPage - 1) * ITEMS_PER_PAGE;
                const endIndex = startIndex + ITEMS_PER_PAGE;

                cards.forEach(card => card.style.display = "none");

                filteredCards.slice(startIndex, endIndex).forEach(card => {
                    card.style.display = "";
                });

                if (countEl) {
                    if (total === 0) {
                        countEl.textContent = "0";
                    } else {
                        const displayStart = startIndex + 1;
                        const displayEnd = Math.min(endIndex, total);
                        countEl.textContent = `${displayStart}–${displayEnd} of ${total}`;
                    }
                }

                if (noResults) {
                    noResults.classList.toggle("hidden", total > 0);
                }

                renderPagination(totalPages);
            }

            function applyFilters() {
                filteredCards = cards.filter(card => {
                    const cardCat = card.dataset.category;
                    const cardName = card.dataset.name || "";
                    const matchesCat = (currentCategory === "all" || cardCat === currentCategory);
                    const matchesSearch = (!searchQuery || cardName.includes(searchQuery));
                    return matchesCat && matchesSearch;
                });

                currentPage = 1;
                updateView();
            }

            filterBtns.forEach(btn => {
                btn.addEventListener("click", () => {
                    filterBtns.forEach(b => {
                        b.className = "filter-btn px-4 py-2 rounded-xl text-xs font-medium bg-[#DFD8CD] text-[#6E6359] hover:bg-[#D5CDC1] hover:text-[#362F2A] border border-[#C9C0B3] transition-colors whitespace-nowrap";
                    });
                    btn.className = "filter-btn px-4 py-2 rounded-xl text-xs font-semibold bg-[#8A5A44] text-[#F6F3EE] transition-colors whitespace-nowrap shadow-sm";
                    currentCategory = btn.dataset.filter;
                    applyFilters();
                });
            });

            if (searchInput) {
                searchInput.addEventListener("input", (e) => {
                    searchQuery = e.target.value.toLowerCase().trim();
                    applyFilters();
                });
            }

            if (sortSelect) {
                sortSelect.addEventListener("change", (e) => {
                    const val = e.target.value;
                    cards.sort((a, b) => {
                        const priceA = parseInt(a.dataset.price, 10) || 0;
                        const priceB = parseInt(b.dataset.price, 10) || 0;
                        const nameA = a.dataset.name || "";
                        const nameB = b.dataset.name || "";

                        if (val === "price_asc") return priceA - priceB;
                        if (val === "price_desc") return priceB - priceA;
                        if (val === "name_asc") return nameA.localeCompare(nameB);
                        return 0;
                    });
                    cards.forEach(c => productGrid.appendChild(c));
                    applyFilters();
                });
            }

            // Initial view initialization
            applyFilters();
        });
    </script>
</body>

</html>