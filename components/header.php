<?php
/**
 * ============================================================================
 * YANGON ATELIER BACKEND INSTRUCTION GUIDELINE - GLOBAL STOREFRONT HEADER
 * ============================================================================
 * FILE: components/header.php
 * 
 * BACKEND LOGIC REQUIREMENTS:
 * 1. Current Active Page Detection:
 *    - Determine active page via basename($_SERVER['PHP_SELF']) to conditionally
 *      apply active CSS classes to nav links.
 * 
 * 2. User Authentication State:
 *    - Check if client is logged in via isset($_SESSION['user_id']) or $_SESSION['username'].
 *    - If authenticated: Display client username / avatar and link to logout.
 *    - If guest: Display login link pointing to login.php.
 * 
 * 3. Search Form Handler:
 *    - Search form submits to 'shop.php' using method="GET".
 *    - Query parameter is 'search' (e.g., shop.php?search=walnut).
 * ============================================================================
 */

$current_page = basename($_SERVER['PHP_SELF'] ?? 'index.php');
?>
<!-- Announcement / Top Atelier Bar (Smoked Walnut) -->
<div class="bg-[#4A4038] text-[#F6F3EE] text-[11px] py-2 px-4 sm:px-6 lg:px-8 border-b border-[#3A322B]">
    <div class="max-w-7xl mx-auto flex items-center justify-between tracking-wide">
        <div class="flex items-center gap-2">
            <span class="w-1.5 h-1.5 rounded-full bg-[#8A5A44]"></span>
            <span class="hidden sm:inline">Complimentary white-glove installation across Yangon</span>
            <span class="sm:hidden">White-glove Yangon delivery</span>
            <span class="text-[#8C7D6B] hidden md:inline">•</span>
            <span class="hidden md:inline text-[#DFD8CD]">Private showroom appointments daily</span>
        </div>
        <div class="flex items-center gap-4 text-[#DFD8CD]">
            <a href="tel:+959973383719" class="hover:text-[#FFFFFF] transition-colors flex items-center gap-1.5">
                <i class="ri-phone-line text-xs text-[#8A5A44]"></i>
                <span class="font-medium text-[#F6F3EE]">+95 9 973 383 719</span>
            </a>
            <span class="hidden lg:inline text-[#6E6359]">|</span>
            <span class="hidden lg:inline text-[#DFD8CD]">Yankin Flagship Atelier</span>
        </div>
    </div>
</div>

<header class="sticky top-0 z-40 w-full bg-[#EDE8E0]/95 backdrop-blur-md border-b border-[#C9C0B3] transition-all">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-20 flex items-center justify-between">
        <!-- Atelier Brand Logo -->
        <a href="index.php" class="group flex items-center gap-3 focus:outline-none">
            <span class="w-9 h-9 rounded-xl bg-[#8A5A44] text-[#F6F3EE] border border-[#704735] flex items-center justify-center font-serif text-lg font-bold tracking-wider group-hover:bg-[#704735] transition-all shadow-sm">
                Y
            </span>
            <div class="flex flex-col">
                <span class="font-serif text-xl tracking-tight text-[#362F2A] font-semibold leading-none">Yangon Atelier</span>
                <span class="text-[9px] tracking-[0.25em] uppercase text-[#8A5A44] font-semibold mt-1">Furniture Studio</span>
            </div>
        </a>

        <!-- Desktop Navigation Bar -->
        <nav class="hidden md:flex items-center gap-8 text-sm tracking-wide font-medium text-[#6E6359]">
            <a href="index.php" class="<?= ($current_page == 'index.php') ? 'text-[#362F2A] font-semibold after:w-full' : '' ?> hover:text-[#362F2A] transition-colors py-1 relative after:content-[''] after:absolute after:bottom-0 after:left-0 after:w-0 hover:after:w-full after:h-[2px] after:bg-[#8A5A44] after:transition-all">Home</a>
            <a href="shop.php" class="<?= ($current_page == 'shop.php' || $current_page == 'product_detail.php') ? 'text-[#362F2A] font-semibold after:w-full' : '' ?> hover:text-[#362F2A] transition-colors py-1 relative after:content-[''] after:absolute after:bottom-0 after:left-0 after:w-0 hover:after:w-full after:h-[2px] after:bg-[#8A5A44] after:transition-all">Shop</a>
            <a href="about.php" class="<?= ($current_page == 'about.php') ? 'text-[#362F2A] font-semibold after:w-full' : '' ?> hover:text-[#362F2A] transition-colors py-1 relative after:content-[''] after:absolute after:bottom-0 after:left-0 after:w-0 hover:after:w-full after:h-[2px] after:bg-[#8A5A44] after:transition-all">About</a>
            <a href="team.php" class="<?= ($current_page == 'team.php') ? 'text-[#362F2A] font-semibold after:w-full' : '' ?> hover:text-[#362F2A] transition-colors py-1 relative after:content-[''] after:absolute after:bottom-0 after:left-0 after:w-0 hover:after:w-full after:h-[2px] after:bg-[#8A5A44] after:transition-all">Team</a>
            <a href="blog.php" class="<?= ($current_page == 'blog.php' || $current_page == 'blog_detail.php') ? 'text-[#362F2A] font-semibold after:w-full' : '' ?> hover:text-[#362F2A] transition-colors py-1 relative after:content-[''] after:absolute after:bottom-0 after:left-0 after:w-0 hover:after:w-full after:h-[2px] after:bg-[#8A5A44] after:transition-all">Journal</a>
            <a href="contact.php" class="<?= ($current_page == 'contact.php') ? 'text-[#362F2A] font-semibold after:w-full' : '' ?> hover:text-[#362F2A] transition-colors py-1 relative after:content-[''] after:absolute after:bottom-0 after:left-0 after:w-0 hover:after:w-full after:h-[2px] after:bg-[#8A5A44] after:transition-all">Contact</a>
        </nav>

        <!-- Right Action Cluster -->
        <div class="flex items-center gap-2 sm:gap-3">
            <!-- Search Trigger Button -->
            <button type="button" id="search-btn" aria-label="Open Search" class="w-10 h-10 rounded-xl flex items-center justify-center text-[#6E6359] hover:text-[#362F2A] hover:bg-[#DFD8CD] transition-colors">
                <i class="ri-search-line text-lg"></i>
            </button>

            <!-- Dynamic Authentication Indicator -->
            <?php if (isset($_SESSION['user_id'])): ?>
                <div class="flex items-center gap-2">
                    <span class="hidden sm:inline text-xs text-[#362F2A] font-medium font-serif">
                        <?= htmlspecialchars($_SESSION['username'] ?? 'Client') ?>
                    </span>
                    <a href="logout.php" aria-label="Sign Out" class="w-10 h-10 rounded-xl flex items-center justify-center text-[#8C3B3B] hover:text-[#702F2F] hover:bg-[#DFD8CD] transition-colors" title="Sign Out">
                        <i class="ri-logout-box-r-line text-lg"></i>
                    </a>
                </div>
            <?php else: ?>
                <a href="login.php" id="login-btn" aria-label="Account Login" class="w-10 h-10 rounded-xl flex items-center justify-center text-[#6E6359] hover:text-[#362F2A] hover:bg-[#DFD8CD] transition-colors" title="Account">
                    <i class="ri-user-line text-lg"></i>
                </a>
            <?php endif; ?>

            <!-- Mobile Drawer Menu Toggle -->
            <button type="button" id="menu-btn" aria-label="Toggle Mobile Navigation" class="md:hidden w-10 h-10 rounded-xl flex items-center justify-center text-[#6E6359] hover:text-[#362F2A] hover:bg-[#DFD8CD] transition-colors">
                <i class="ri-menu-line text-xl"></i>
            </button>
        </div>
    </div>
</header>

<!-- Search Dialog Modal Overlay -->
<div id="search-modal" class="fixed inset-0 z-50 hidden transition-opacity duration-200 opacity-0" role="dialog" aria-modal="true">
    <div id="search-modal-backdrop" class="fixed inset-0 bg-black/50 backdrop-blur-sm"></div>

    <div class="fixed inset-0 overflow-y-auto flex items-start justify-center pt-20 px-4 sm:px-6">
        <div class="relative w-full max-w-2xl bg-[#F6F3EE] rounded-3xl shadow-2xl border border-[#C9C0B3] p-6 sm:p-8 z-10 transition-transform">
            <div class="flex items-center justify-between pb-4 border-b border-[#C9C0B3]">
                <div class="flex items-center gap-2">
                    <i class="ri-search-2-line text-[#8A5A44] text-lg"></i>
                    <h3 class="font-serif text-lg text-[#362F2A] font-medium">Search the Collection</h3>
                </div>
                <button type="button" id="search-close-btn" aria-label="Close search" class="w-8 h-8 rounded-full flex items-center justify-center text-[#6E6359] hover:text-[#362F2A] hover:bg-[#DFD8CD] transition-colors">
                    <i class="ri-close-line text-xl"></i>
                </button>
            </div>

            <form action="shop.php" method="GET" class="mt-6">
                <div class="relative flex items-center">
                    <i class="ri-search-line absolute left-4 text-[#6E6359] text-lg"></i>
                    <input type="search" name="search" id="search-box" value="<?= htmlspecialchars($_GET['search'] ?? '') ?>" placeholder="Search by piece, wood type, designer..." class="w-full pl-12 pr-4 py-3.5 bg-[#EDE8E0] border border-[#C9C0B3] rounded-xl text-[#362F2A] placeholder-[#6E6359] focus:outline-none focus:ring-2 focus:ring-[#8A5A44] focus:border-[#8A5A44] text-sm transition-all">
                </div>
            </form>

            <!-- Popular Curated Suggestions -->
            <div class="mt-6 pt-5 border-t border-[#C9C0B3]">
                <span class="text-xs uppercase tracking-wider text-[#6E6359] font-medium block mb-3">Popular Searches</span>
                <div class="flex flex-wrap gap-2 text-xs">
                    <a href="shop.php?category=chairs" class="px-3.5 py-1.5 rounded-full bg-[#DFD8CD] text-[#362F2A] hover:bg-[#8A5A44] hover:text-[#F6F3EE] border border-[#C9C0B3] transition-colors">Nordic Armchair</a>
                    <a href="shop.php?category=tables" class="px-3.5 py-1.5 rounded-full bg-[#DFD8CD] text-[#362F2A] hover:bg-[#8A5A44] hover:text-[#F6F3EE] border border-[#C9C0B3] transition-colors">Solid Oak Dining Table</a>
                    <a href="shop.php?category=sofas" class="px-3.5 py-1.5 rounded-full bg-[#DFD8CD] text-[#362F2A] hover:bg-[#8A5A44] hover:text-[#F6F3EE] border border-[#C9C0B3] transition-colors">Bouclé Modular Sofa</a>
                    <a href="shop.php?category=beds" class="px-3.5 py-1.5 rounded-full bg-[#DFD8CD] text-[#362F2A] hover:bg-[#8A5A44] hover:text-[#F6F3EE] border border-[#C9C0B3] transition-colors">Platform Bed</a>
                </div>
            </div>
        </div>
    </div>
</div>
