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

require_once __DIR__ . '/function.php';
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
            <div class="w-10 h-10 rounded-xl bg-[#EDE8E0] border border-[#C9C0B3] group-hover:border-[#8A5A44] overflow-hidden flex items-center justify-center p-1 shadow-xs transition-all">
                <img src="images/logo/Yangon_Atelier.png" alt="Yangon Atelier Logo" class="w-full h-full object-contain">
            </div>
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
            <?php 
            $is_authenticated = isset($_SESSION['user']) || isset($_SESSION['user_id']);
            if ($is_authenticated): 
                $client_info = $_SESSION['user'] ?? [];
                $client_name = $client_info['name'] ?? $_SESSION['name'] ?? 'Client';
                $client_email = $client_info['email'] ?? $_SESSION['email'] ?? '';
                
                // Formulate 1-2 letter monogram initials
                $name_words = preg_split('/\s+/', trim($client_name));
                if (count($name_words) >= 2) {
                    $client_monogram = strtoupper(mb_substr($name_words[0], 0, 1) . mb_substr($name_words[count($name_words) - 1], 0, 1));
                } else {
                    $client_monogram = strtoupper(mb_substr($client_name, 0, 2));
                }
                if (empty($client_monogram)) $client_monogram = 'YA';
            ?>
                <!-- Grand Atelier Client Sanctuary Pill & Flyout Menu -->
                <div class="relative group" id="user-menu-container">
                    <!-- Client Chip Trigger -->
                    <button type="button" id="user-menu-btn" aria-expanded="false" aria-haspopup="true" aria-label="Client Account Menu" class="flex items-center gap-2.5 p-1 sm:pl-1.5 sm:pr-3.5 rounded-full bg-[#F6F3EE] hover:bg-[#DFD8CD]/60 border border-[#C9C0B3] hover:border-[#8A5A44]/60 transition-all duration-300 shadow-xs hover:shadow-md focus:outline-none focus:ring-2 focus:ring-[#8A5A44]/30 cursor-pointer">
                        <!-- Terracotta Monogram Seal with Soft Gold/Linen Border -->
                        <span class="w-8 h-8 rounded-full bg-gradient-to-br from-[#8A5A44] to-[#704735] text-[#F6F3EE] font-serif text-xs font-semibold flex items-center justify-center shadow-inner ring-1 ring-[#8A5A44]/40 ring-offset-1 ring-offset-[#F6F3EE] flex-shrink-0">
                            <?= htmlspecialchars(get_initial_name($client_name)) ?>
                        </span>
                        
                        <!-- Client Name & Tier (Hidden on ultra-compact screens) -->
                        <div class="hidden sm:flex flex-col text-left leading-tight pr-0.5">
                            <span class="text-[9px] uppercase tracking-[0.2em] text-[#8A5A44] font-semibold flex items-center gap-1">
                                <span class="w-1.5 h-1.5 rounded-full bg-[#3F624D]"></span>
                                <span>Sanctuary Patron</span>
                            </span>
                            <span class="font-serif text-xs font-semibold text-[#362F2A] truncate max-w-[110px]">
                                <?= htmlspecialchars($client_name) ?>
                            </span>
                        </div>

                        <!-- Refined Directional Chevron -->
                        <i class="ri-arrow-down-s-line text-xs text-[#8C7D6B] group-hover:text-[#362F2A] transition-transform duration-300 group-hover:rotate-180 hidden sm:inline-block"></i>
                    </button>

                    <!-- Floating Grand Dropdown Card -->
                    <div id="user-dropdown" class="absolute right-0 top-full mt-2.5 w-72 bg-[#F6F3EE] border border-[#C9C0B3] rounded-3xl shadow-2xl p-5 transition-all duration-200 z-50 invisible opacity-0 translate-y-2 group-hover:visible group-hover:opacity-100 group-hover:translate-y-0 group-focus-within:visible group-focus-within:opacity-100 group-focus-within:translate-y-0">
                        
                        <!-- Top Beak Arrow Accent -->
                        <div class="absolute -top-1.5 right-6 w-3 h-3 bg-[#F6F3EE] border-t border-l border-[#C9C0B3] rotate-45"></div>

                        <!-- Card Header: Monogram Avatar & Client Persona -->
                        <div class="flex items-start gap-3 pb-4 border-b border-[#C9C0B3]/70">
                            <div class="w-11 h-11 rounded-2xl bg-gradient-to-br from-[#8A5A44] to-[#704735] text-[#F6F3EE] font-serif text-base font-bold flex items-center justify-center shadow-md ring-2 ring-[#8A5A44]/30 ring-offset-2 ring-offset-[#F6F3EE] flex-shrink-0">
                                <?= htmlspecialchars($client_monogram) ?>
                            </div>
                            <div class="flex-1 min-w-0">
                                <span class="text-[9px] uppercase tracking-[0.22em] text-[#8A5A44] font-semibold block leading-none mb-1">Authenticated Patron</span>
                                <h4 class="font-serif text-sm font-semibold text-[#362F2A] truncate leading-snug">
                                    <?= htmlspecialchars($client_name) ?>
                                </h4>
                                <?php if (!empty($client_email)): ?>
                                    <p class="text-[11px] text-[#6E6359] truncate mt-0.5" title="<?= htmlspecialchars($client_email) ?>">
                                        <?= htmlspecialchars($client_email) ?>
                                    </p>
                                <?php endif; ?>
                            </div>
                        </div>

                        <!-- Status Badge -->
                        <div class="mt-3.5 px-3 py-2 rounded-xl bg-[#EDE8E0] border border-[#C9C0B3]/50 flex items-center justify-between text-[11px]">
                            <span class="text-[#6E6359] flex items-center gap-1.5">
                                <span class="w-1.5 h-1.5 rounded-full bg-[#3F624D] animate-pulse"></span>
                                <span>Private Sanctuary</span>
                            </span>
                            <span class="text-[10px] uppercase tracking-wider font-semibold text-[#8A5A44]">Verified Access</span>
                        </div>

                        <!-- Curated Quick Links -->
                        <div class="mt-3.5 space-y-1">
                            <a href="shop.php" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-xs font-medium text-[#362F2A] hover:bg-[#DFD8CD] transition-colors group/item">
                                <span class="w-7 h-7 rounded-lg bg-[#EDE8E0] group-hover/item:bg-[#F6F3EE] text-[#8A5A44] flex items-center justify-center transition-colors">
                                    <i class="ri-compass-3-line text-sm"></i>
                                </span>
                                <div class="flex flex-col">
                                    <span class="font-medium text-[#362F2A]">Atelier Catalog</span>
                                    <span class="text-[10px] text-[#6E6359]">Explore furniture &amp; pieces</span>
                                </div>
                            </a>

                            <a href="contact.php" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-xs font-medium text-[#362F2A] hover:bg-[#DFD8CD] transition-colors group/item">
                                <span class="w-7 h-7 rounded-lg bg-[#EDE8E0] group-hover/item:bg-[#F6F3EE] text-[#8A5A44] flex items-center justify-center transition-colors">
                                    <i class="ri-calendar-event-line text-sm"></i>
                                </span>
                                <div class="flex flex-col">
                                    <span class="font-medium text-[#362F2A]">Showroom Appointment</span>
                                    <span class="text-[10px] text-[#6E6359]">Bespoke Yankin consultation</span>
                                </div>
                            </a>
                        </div>

                        <!-- Sign Out Action -->
                        <div class="mt-3.5 pt-3 border-t border-[#C9C0B3]/70">
                            <a href="logout.php" class="flex items-center justify-between w-full px-3.5 py-2.5 rounded-xl bg-[#EFE0E0]/80 hover:bg-[#EFE0E0] border border-[#DFC8C8] text-[#8C3B3B] text-xs font-semibold transition-all group/logout">
                                <span class="flex items-center gap-2">
                                    <i class="ri-logout-box-r-line text-sm transition-transform group-hover/logout:translate-x-0.5"></i>
                                    <span>Sign Out of Sanctuary</span>
                                </span>
                                <i class="ri-arrow-right-line text-xs opacity-60 group-hover/logout:opacity-100 transition-opacity"></i>
                            </a>
                        </div>

                    </div>
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
