<?php
/**
 * ============================================================================
 * YANGON ATELIER BACKEND INSTRUCTION GUIDELINE - MOBILE NAVIGATION DRAWER
 * ============================================================================
 * FILE: components/navbar.php
 * 
 * BACKEND LOGIC REQUIREMENTS:
 * 1. Active Navigation Indicator:
 *    - Compare basename($_SERVER['PHP_SELF']) to highlight current active link.
 * 
 * 2. Mobile User Auth Button:
 *    - If $_SESSION['user_id'] is set, display client name and 'Sign Out' (logout.php).
 *    - If not set, display 'Client Sign In' linking to login.php.
 * ============================================================================
 */
$current_page = basename($_SERVER['PHP_SELF'] ?? 'index.php');
?>
<!-- Mobile Drawer Backdrop Overlay -->
<div id="mobile-backdrop" class="fixed inset-0 bg-black/50 backdrop-blur-sm z-50 hidden opacity-0 transition-opacity duration-300"></div>

<!-- Mobile Off-Canvas Drawer (Raw Linen Surface) -->
<nav id="mobile-drawer" class="fixed top-0 right-0 bottom-0 w-80 max-w-[85vw] bg-[#F6F3EE] border-l border-[#C9C0B3] z-50 shadow-2xl transform translate-x-full transition-transform duration-300 ease-in-out flex flex-col justify-between p-6 overflow-y-auto">
    <div>
        <!-- Drawer Header -->
        <div class="flex items-center justify-between pb-6 border-b border-[#C9C0B3]">
            <div class="flex items-center gap-2.5">
                <div class="w-9 h-9 rounded-xl bg-[#EDE8E0] border border-[#C9C0B3] overflow-hidden flex items-center justify-center p-1 shadow-xs">
                    <img src="images/logo/Yangon_Atelier.png" alt="Yangon Atelier Logo" class="w-full h-full object-contain">
                </div>
                <span class="font-serif text-lg font-semibold tracking-tight text-[#362F2A]">Yangon Atelier</span>
            </div>
            <!-- Accessible Close Button with legacy id "closer" -->
            <button type="button" id="closer" aria-label="Close navigation" class="w-9 h-9 rounded-full flex items-center justify-center text-[#6E6359] hover:text-[#362F2A] hover:bg-[#DFD8CD] transition-colors">
                <i class="ri-close-line text-2xl"></i>
            </button>
        </div>

        <!-- Navigation Links with dynamic active state check -->
        <div class="mt-8 flex flex-col space-y-1">
            <a href="index.php" class="flex items-center justify-between py-3 px-4 rounded-xl <?= ($current_page == 'index.php') ? 'bg-[#DFD8CD] text-[#362F2A] font-semibold' : 'text-[#6E6359]' ?> hover:bg-[#DFD8CD] hover:text-[#362F2A] text-base font-medium transition-colors">
                <span>Home</span>
                <i class="ri-arrow-right-s-line text-[#6E6359]"></i>
            </a>
            <a href="shop.php" class="flex items-center justify-between py-3 px-4 rounded-xl <?= ($current_page == 'shop.php' || $current_page == 'product_detail.php') ? 'bg-[#DFD8CD] text-[#362F2A] font-semibold' : 'text-[#6E6359]' ?> hover:bg-[#DFD8CD] hover:text-[#362F2A] text-base font-medium transition-colors">
                <span>Shop Collection</span>
                <i class="ri-arrow-right-s-line text-[#6E6359]"></i>
            </a>
            <a href="about.php" class="flex items-center justify-between py-3 px-4 rounded-xl <?= ($current_page == 'about.php') ? 'bg-[#DFD8CD] text-[#362F2A] font-semibold' : 'text-[#6E6359]' ?> hover:bg-[#DFD8CD] hover:text-[#362F2A] text-base font-medium transition-colors">
                <span>About Atelier</span>
                <i class="ri-arrow-right-s-line text-[#6E6359]"></i>
            </a>
            <a href="team.php" class="flex items-center justify-between py-3 px-4 rounded-xl <?= ($current_page == 'team.php') ? 'bg-[#DFD8CD] text-[#362F2A] font-semibold' : 'text-[#6E6359]' ?> hover:bg-[#DFD8CD] hover:text-[#362F2A] text-base font-medium transition-colors">
                <span>Design Team</span>
                <i class="ri-arrow-right-s-line text-[#6E6359]"></i>
            </a>
            <a href="blog.php" class="flex items-center justify-between py-3 px-4 rounded-xl <?= ($current_page == 'blog.php' || $current_page == 'blog_detail.php') ? 'bg-[#DFD8CD] text-[#362F2A] font-semibold' : 'text-[#6E6359]' ?> hover:bg-[#DFD8CD] hover:text-[#362F2A] text-base font-medium transition-colors">
                <span>Journal</span>
                <i class="ri-arrow-right-s-line text-[#6E6359]"></i>
            </a>
            <a href="contact.php" class="flex items-center justify-between py-3 px-4 rounded-xl <?= ($current_page == 'contact.php') ? 'bg-[#DFD8CD] text-[#362F2A] font-semibold' : 'text-[#6E6359]' ?> hover:bg-[#DFD8CD] hover:text-[#362F2A] text-base font-medium transition-colors">
                <span>Contact &amp; Showroom</span>
                <i class="ri-arrow-right-s-line text-[#6E6359]"></i>
            </a>
        </div>
    </div>

    <!-- Drawer Footer / Atelier Info -->
    <div class="pt-6 border-t border-[#C9C0B3]">
        <div class="mb-4">
            <span class="text-xs uppercase tracking-widest text-[#8A5A44] font-semibold block mb-1">Yangon Flagship</span>
            <p class="text-xs text-[#6E6359] leading-relaxed">No. 55A, Maggin Street, Yankin Township,<br>Yangon, Myanmar</p>
            <p class="text-xs text-[#6E6359] mt-1 font-medium">Daily 09:30 AM — 06:30 PM</p>
        </div>

        <?php if (isset($_SESSION['user_id'])): ?>
            <div class="space-y-2">
                <div class="text-xs text-[#362F2A] text-center font-medium">
                    Signed in as <span class="text-[#8A5A44] font-semibold"><?= htmlspecialchars($_SESSION['username'] ?? 'Client') ?></span>
                </div>
                <a href="logout.php" class="w-full flex items-center justify-center gap-2 py-3 px-4 rounded-xl bg-[#EFE0E0] hover:bg-[#DFC8C8] text-[#8C3B3B] text-sm font-semibold transition-all">
                    <i class="ri-logout-box-r-line"></i>
                    <span>Sign Out</span>
                </a>
            </div>
        <?php else: ?>
            <a href="login.php" class="w-full flex items-center justify-center gap-2 py-3 px-4 rounded-xl bg-[#8A5A44] hover:bg-[#704735] text-[#F6F3EE] text-sm font-semibold transition-all shadow-sm">
                <i class="ri-user-line"></i>
                <span>Client Sign In</span>
            </a>
        <?php endif; ?>
    </div>
</nav>
