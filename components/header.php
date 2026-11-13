<?php
/**
 * ============================================================================
 * FURNISHME BACKEND INSTRUCTION GUIDELINE - GLOBAL STOREFRONT HEADER
 * ============================================================================
 * FILE: components/header.php
 * 
 * BACKEND LOGIC REQUIREMENTS:
 * 1. Current Active Page Detection:
 *    - Determine active page via basename($_SERVER['PHP_SELF']) to conditionally
 *      apply active CSS classes (e.g., text-[#FAF6EE] after:w-full) to nav links.
 * 
 * 2. User Authentication State:
 *    - Check if client is logged in via isset($_SESSION['user_id']) or $_SESSION['username'].
 *    - If authenticated: Display client username / avatar and link to logout or profile.
 *    - If guest: Display login link pointing to login.php.
 * 
 * 3. Search Form Handler:
 *    - Search form submits to 'shop.php' using method="GET".
 *    - Query parameter is 'search' (e.g., shop.php?search=walnut).
 * ============================================================================
 */

// Example helper: get current script name for active link highlighting
$current_page = basename($_SERVER['PHP_SELF'] ?? 'index.php');
?>
<!-- Announcement / Top Atelier Bar -->
<div class="bg-[#080705] text-[#B5A591] text-[11px] py-2 px-4 sm:px-6 lg:px-8 border-b border-[#1F1914]">
    <div class="max-w-7xl mx-auto flex items-center justify-between tracking-wide">
        <div class="flex items-center gap-2">
            <span class="w-1.5 h-1.5 rounded-full bg-[#C5A059]"></span>
            <span class="hidden sm:inline">Complimentary White-Glove Installation Across Yangon</span>
            <span class="sm:hidden">White-Glove Yangon Delivery</span>
            <span class="text-[#453A30] hidden md:inline">•</span>
            <span class="hidden md:inline text-[#8C7D6B]">Private Showroom Appointments Daily</span>
        </div>
        <div class="flex items-center gap-4 text-[#8C7D6B]">
            <a href="tel:+959973383719" class="hover:text-[#FAF6EE] transition-colors flex items-center gap-1.5">
                <i class="ri-phone-line text-xs text-[#C5A059]"></i>
                <span class="font-medium text-[#D6C8B4]">+95 9 973 383 719</span>
            </a>
            <span class="hidden lg:inline text-[#3E3227]">|</span>
            <span class="hidden lg:inline text-[#8C7D6B]">Yankin Flagship Atelier</span>
        </div>
    </div>
</div>

<header class="sticky top-0 z-40 w-full bg-[#0D0B09]/95 backdrop-blur-md border-b border-[#221C16] transition-all">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-20 flex items-center justify-between">
        <!-- Atelier Brand Logo -->
        <a href="index.php" class="group flex items-center gap-3 focus:outline-none">
            <span class="w-9 h-9 rounded-xl bg-[#C5A059] text-[#0D0B09] border border-[#DFB873]/50 flex items-center justify-center font-serif text-lg font-bold tracking-wider group-hover:bg-[#D4AF37] transition-all shadow-md">
                F
            </span>
            <div class="flex flex-col">
                <span class="font-serif text-xl tracking-tight text-[#FAF6EE] font-semibold leading-none">FurnishMe</span>
                <span class="text-[9px] tracking-[0.3em] uppercase text-[#C5A059] font-semibold mt-1">Design Atelier</span>
            </div>
        </a>

        <!-- Desktop Navigation Bar -->
        <!-- ==================================================================
             PHP BACKEND GUIDELINE: Dynamic Active Menu State
             Compare $current_page with the link target to conditionally add
             active styling.
             Example: class="<?= $current_page == 'index.php' ? 'text-[#FAF6EE] after:w-full' : 'text-[#D6C8B4]' ?> ..."
             ================================================================== -->
        <nav class="hidden md:flex items-center gap-8 text-sm tracking-wide font-medium text-[#D6C8B4]">
            <a href="index.php" class="<?= ($current_page == 'index.php') ? 'text-[#FAF6EE] after:w-full' : '' ?> hover:text-[#FAF6EE] transition-colors py-1 relative after:content-[''] after:absolute after:bottom-0 after:left-0 after:w-0 hover:after:w-full after:h-[1.5px] after:bg-[#C5A059] after:transition-all">Home</a>
            <a href="shop.php" class="<?= ($current_page == 'shop.php' || $current_page == 'product_detail.php') ? 'text-[#FAF6EE] after:w-full' : '' ?> hover:text-[#FAF6EE] transition-colors py-1 relative after:content-[''] after:absolute after:bottom-0 after:left-0 after:w-0 hover:after:w-full after:h-[1.5px] after:bg-[#C5A059] after:transition-all">Shop</a>
            <a href="about.php" class="<?= ($current_page == 'about.php') ? 'text-[#FAF6EE] after:w-full' : '' ?> hover:text-[#FAF6EE] transition-colors py-1 relative after:content-[''] after:absolute after:bottom-0 after:left-0 after:w-0 hover:after:w-full after:h-[1.5px] after:bg-[#C5A059] after:transition-all">About</a>
            <a href="team.php" class="<?= ($current_page == 'team.php') ? 'text-[#FAF6EE] after:w-full' : '' ?> hover:text-[#FAF6EE] transition-colors py-1 relative after:content-[''] after:absolute after:bottom-0 after:left-0 after:w-0 hover:after:w-full after:h-[1.5px] after:bg-[#C5A059] after:transition-all">Team</a>
            <a href="blog.php" class="<?= ($current_page == 'blog.php' || $current_page == 'blog_detail.php') ? 'text-[#FAF6EE] after:w-full' : '' ?> hover:text-[#FAF6EE] transition-colors py-1 relative after:content-[''] after:absolute after:bottom-0 after:left-0 after:w-0 hover:after:w-full after:h-[1.5px] after:bg-[#C5A059] after:transition-all">Journal</a>
            <a href="contact.php" class="<?= ($current_page == 'contact.php') ? 'text-[#FAF6EE] after:w-full' : '' ?> hover:text-[#FAF6EE] transition-colors py-1 relative after:content-[''] after:absolute after:bottom-0 after:left-0 after:w-0 hover:after:w-full after:h-[1.5px] after:bg-[#C5A059] after:transition-all">Contact</a>
        </nav>

        <!-- Right Action Cluster -->
        <div class="flex items-center gap-2 sm:gap-3">
            <!-- Search Trigger Button -->
            <button type="button" id="search-btn" aria-label="Open Search" class="w-10 h-10 rounded-xl flex items-center justify-center text-[#D6C8B4] hover:text-[#FAF6EE] hover:bg-[#1D1914] transition-colors">
                <i class="ri-search-line text-lg"></i>
            </button>

            <!-- ==============================================================
                 PHP BACKEND GUIDELINE: Dynamic Authentication Indicator
                 Check if user session is active:
                 <?php if (isset($_SESSION['user_id'])): ?>
                     <div class="relative group">
                         <a href="logout.php" title="Sign Out (<?= htmlspecialchars($_SESSION['username'] ?? '') ?>)" class="w-10 h-10 rounded-xl flex items-center justify-center text-[#C5A059] hover:bg-[#1D1914] transition-colors">
                             <i class="ri-logout-box-r-line text-lg"></i>
                         </a>
                     </div>
                 <?php else: ?>
                     <a href="login.php" id="login-btn" aria-label="Account Login" class="w-10 h-10 rounded-xl flex items-center justify-center text-[#D6C8B4] hover:text-[#FAF6EE] hover:bg-[#1D1914] transition-colors" title="Account">
                         <i class="ri-user-line text-lg"></i>
                     </a>
                 <?php endif; ?>
                 ============================================================== -->
            <?php if (isset($_SESSION['user_id'])): ?>
                <div class="flex items-center gap-2">
                    <span class="hidden sm:inline text-xs text-[#FAF6EE] font-medium font-serif">
                        <?= htmlspecialchars($_SESSION['username'] ?? 'Client') ?>
                    </span>
                    <a href="logout.php" aria-label="Sign Out" class="w-10 h-10 rounded-xl flex items-center justify-center text-[#C5A059] hover:text-rose-400 hover:bg-[#1D1914] transition-colors" title="Sign Out">
                        <i class="ri-logout-box-r-line text-lg"></i>
                    </a>
                </div>
            <?php else: ?>
                <a href="login.php" id="login-btn" aria-label="Account Login" class="w-10 h-10 rounded-xl flex items-center justify-center text-[#D6C8B4] hover:text-[#FAF6EE] hover:bg-[#1D1914] transition-colors" title="Account">
                    <i class="ri-user-line text-lg"></i>
                </a>
            <?php endif; ?>

            <!-- Mobile Drawer Menu Toggle -->
            <button type="button" id="menu-btn" aria-label="Toggle Mobile Navigation" class="md:hidden w-10 h-10 rounded-xl flex items-center justify-center text-[#D6C8B4] hover:text-[#FAF6EE] hover:bg-[#1D1914] transition-colors">
                <i class="ri-menu-line text-xl"></i>
            </button>
        </div>
    </div>
</header>

<!-- Search Dialog Modal Overlay -->
<div id="search-modal" class="fixed inset-0 z-50 hidden transition-opacity duration-200 opacity-0" role="dialog" aria-modal="true">
    <div id="search-modal-backdrop" class="fixed inset-0 bg-black/80 backdrop-blur-md"></div>

    <div class="fixed inset-0 overflow-y-auto flex items-start justify-center pt-20 px-4 sm:px-6">
        <div class="relative w-full max-w-2xl bg-[#15120F] rounded-3xl shadow-2xl border border-[#2A231C] p-6 sm:p-8 z-10 transition-transform">
            <div class="flex items-center justify-between pb-4 border-b border-[#2A231C]">
                <div class="flex items-center gap-2">
                    <i class="ri-search-2-line text-[#C5A059] text-lg"></i>
                    <h3 class="font-serif text-lg text-[#FAF6EE] font-medium">Search the Collection</h3>
                </div>
                <button type="button" id="search-close-btn" aria-label="Close search" class="w-8 h-8 rounded-full flex items-center justify-center text-[#8C7D6B] hover:text-[#FAF6EE] hover:bg-[#1D1914] transition-colors">
                    <i class="ri-close-line text-xl"></i>
                </button>
            </div>

            <!-- ==============================================================
                 PHP BACKEND GUIDELINE: Search Form Submission Target
                 - Submits GET request to shop.php with ?search=term
                 - Handled in shop.php via: $search = trim($_GET['search'] ?? '');
                   SQL: WHERE name LIKE ? OR description LIKE ?
                 ============================================================== -->
            <form action="shop.php" method="GET" class="mt-6">
                <div class="relative flex items-center">
                    <i class="ri-search-line absolute left-4 text-[#8C7D6B] text-lg"></i>
                    <input type="search" name="search" id="search-box" value="<?= htmlspecialchars($_GET['search'] ?? '') ?>" placeholder="Search by piece, wood type, designer..." class="w-full pl-12 pr-4 py-3.5 bg-[#0D0B09] border border-[#2E241B] rounded-xl text-[#FAF6EE] placeholder-[#8C7D6B] focus:outline-none focus:ring-2 focus:ring-[#C5A059] focus:border-[#C5A059] text-sm transition-all">
                </div>
            </form>

            <!-- Popular Curated Suggestions -->
            <div class="mt-6 pt-5 border-t border-[#2A231C]">
                <span class="text-xs uppercase tracking-wider text-[#8C7D6B] font-medium block mb-3">Popular Searches</span>
                <div class="flex flex-wrap gap-2 text-xs">
                    <a href="shop.php?category=chairs" class="px-3.5 py-1.5 rounded-full bg-[#1C1814] text-[#D6C8B4] hover:bg-[#C5A059] hover:text-[#0D0B09] border border-[#2A231C] transition-colors">Nordic Armchair</a>
                    <a href="shop.php?category=tables" class="px-3.5 py-1.5 rounded-full bg-[#1C1814] text-[#D6C8B4] hover:bg-[#C5A059] hover:text-[#0D0B09] border border-[#2A231C] transition-colors">Solid Oak Dining Table</a>
                    <a href="shop.php?category=sofas" class="px-3.5 py-1.5 rounded-full bg-[#1C1814] text-[#D6C8B4] hover:bg-[#C5A059] hover:text-[#0D0B09] border border-[#2A231C] transition-colors">Bouclé Modular Sofa</a>
                    <a href="shop.php?category=beds" class="px-3.5 py-1.5 rounded-full bg-[#1C1814] text-[#D6C8B4] hover:bg-[#C5A059] hover:text-[#0D0B09] border border-[#2A231C] transition-colors">Platform Bed</a>
                </div>
            </div>
        </div>
    </div>
</div>
