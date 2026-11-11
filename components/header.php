<!-- [PHP_BACKEND_HOOK: Global storefront header with navigation and search overlay] -->
<div class="bg-[#181512] text-[#D8CEBF] text-[11px] py-2 px-4 sm:px-6 lg:px-8 border-b border-[#28221B]">
    <div class="max-w-7xl mx-auto flex items-center justify-between tracking-wide">
        <div class="flex items-center gap-2">
            <span class="w-1.5 h-1.5 rounded-full bg-[#CBA57F]"></span>
            <span class="hidden sm:inline">Complimentary White-Glove Installation Across Yangon</span>
            <span class="sm:hidden">White-Glove Yangon Delivery</span>
            <span class="text-stone-600 hidden md:inline">•</span>
            <span class="hidden md:inline text-stone-400">Private Showroom Appointments Daily</span>
        </div>
        <div class="flex items-center gap-4 text-stone-400">
            <a href="tel:+959973383719" class="hover:text-amber-200 transition-colors flex items-center gap-1.5">
                <i class="ri-phone-line text-xs text-[#CBA57F]"></i>
                <span class="font-medium text-stone-300">+95 9 973 383 719</span>
            </a>
            <span class="hidden lg:inline text-stone-700">|</span>
            <span class="hidden lg:inline text-stone-400">Yankin Flagship Atelier</span>
        </div>
    </div>
</div>

<header class="sticky top-0 z-40 w-full bg-[#F5EFE6]/95 backdrop-blur-md border-b border-[#E2D8C9] transition-all">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-20 flex items-center justify-between">
        <!-- Atelier Brand Logo -->
        <a href="index.php" class="group flex items-center gap-3 focus:outline-none">
            <span class="w-9 h-9 rounded-xl bg-[#1A1613] text-[#F7F3EC] border border-[#3E342B] flex items-center justify-center font-serif text-lg tracking-wider group-hover:bg-[#7C4E26] transition-colors shadow-xs">
                F
            </span>
            <div class="flex flex-col">
                <span class="font-serif text-xl tracking-tight text-stone-900 font-semibold leading-none">FurnishMe</span>
                <span class="text-[9px] tracking-[0.3em] uppercase text-stone-500 font-semibold mt-1">Design Atelier</span>
            </div>
        </a>

        <!-- Desktop Navigation Bar -->
        <nav class="hidden md:flex items-center gap-8 text-sm tracking-wide font-medium text-stone-700">
            <a href="index.php" class="hover:text-stone-950 transition-colors py-1 relative after:content-[''] after:absolute after:bottom-0 after:left-0 after:w-0 hover:after:w-full after:h-[1.5px] after:bg-amber-800 after:transition-all">Home</a>
            <a href="shop.php" class="hover:text-stone-950 transition-colors py-1 relative after:content-[''] after:absolute after:bottom-0 after:left-0 after:w-0 hover:after:w-full after:h-[1.5px] after:bg-amber-800 after:transition-all">Shop</a>
            <a href="about.php" class="hover:text-stone-950 transition-colors py-1 relative after:content-[''] after:absolute after:bottom-0 after:left-0 after:w-0 hover:after:w-full after:h-[1.5px] after:bg-amber-800 after:transition-all">About</a>
            <a href="team.php" class="hover:text-stone-950 transition-colors py-1 relative after:content-[''] after:absolute after:bottom-0 after:left-0 after:w-0 hover:after:w-full after:h-[1.5px] after:bg-amber-800 after:transition-all">Team</a>
            <a href="blog.php" class="hover:text-stone-950 transition-colors py-1 relative after:content-[''] after:absolute after:bottom-0 after:left-0 after:w-0 hover:after:w-full after:h-[1.5px] after:bg-amber-800 after:transition-all">Journal</a>
            <a href="contact.php" class="hover:text-stone-950 transition-colors py-1 relative after:content-[''] after:absolute after:bottom-0 after:left-0 after:w-0 hover:after:w-full after:h-[1.5px] after:bg-amber-800 after:transition-all">Contact</a>
        </nav>

        <!-- Right Action Cluster -->
        <div class="flex items-center gap-2 sm:gap-3">
            <!-- Search Trigger Button -->
            <button type="button" id="search-btn" aria-label="Open Search" class="w-10 h-10 rounded-xl flex items-center justify-center text-stone-700 hover:text-stone-950 hover:bg-[#EFE9DF] transition-colors">
                <i class="ri-search-line text-lg"></i>
            </button>

            <!-- User Account Link -->
            <!-- [PHP_BACKEND_HOOK: Dynamic user state. If authenticated, link to account/profile, else to login.php] -->
            <a href="login.php" id="login-btn" aria-label="Account Login" class="w-10 h-10 rounded-xl flex items-center justify-center text-stone-700 hover:text-stone-950 hover:bg-[#EFE9DF] transition-colors" title="Account">
                <i class="ri-user-line text-lg"></i>
            </a>

            <!-- Mobile Drawer Menu Toggle -->
            <button type="button" id="menu-btn" aria-label="Toggle Mobile Navigation" class="md:hidden w-10 h-10 rounded-xl flex items-center justify-center text-stone-800 hover:bg-[#EFE9DF] transition-colors">
                <i class="ri-menu-line text-xl"></i>
            </button>
        </div>
    </div>
</header>

<!-- Search Dialog Modal Overlay -->
<div id="search-modal" class="fixed inset-0 z-50 hidden transition-opacity duration-200 opacity-0" role="dialog" aria-modal="true">
    <div id="search-modal-backdrop" class="fixed inset-0 bg-stone-950/70 backdrop-blur-md"></div>

    <div class="fixed inset-0 overflow-y-auto flex items-start justify-center pt-20 px-4 sm:px-6">
        <div class="relative w-full max-w-2xl bg-[#FAF6F0] rounded-3xl shadow-2xl border border-[#E2D8C9] p-6 sm:p-8 z-10 transition-transform">
            <div class="flex items-center justify-between pb-4 border-b border-stone-200">
                <div class="flex items-center gap-2">
                    <i class="ri-search-2-line text-amber-800 text-lg"></i>
                    <h3 class="font-serif text-lg text-stone-900 font-medium">Search the Collection</h3>
                </div>
                <button type="button" id="search-close-btn" aria-label="Close search" class="w-8 h-8 rounded-full flex items-center justify-center text-stone-400 hover:text-stone-800 hover:bg-[#EFE9DF] transition-colors">
                    <i class="ri-close-line text-xl"></i>
                </button>
            </div>

            <!-- [PHP_BACKEND_HOOK: Search query submission handler. Target action="shop.php" method="GET" with input name="search"] -->
            <form action="shop.php" method="GET" class="mt-6">
                <div class="relative flex items-center">
                    <i class="ri-search-line absolute left-4 text-stone-400 text-lg"></i>
                    <input type="search" name="search" id="search-box" placeholder="Search by piece, wood type, designer..." class="w-full pl-12 pr-4 py-3.5 bg-[#EFE9DF] border border-[#CEBFAC] rounded-xl text-stone-900 placeholder-[#9E8E7C] focus:outline-none focus:ring-2 focus:ring-amber-800 focus:border-amber-800 text-sm transition-all">
                </div>
            </form>

            <!-- Popular Curated Suggestions -->
            <div class="mt-6 pt-5 border-t border-stone-200">
                <span class="text-xs uppercase tracking-wider text-stone-500 font-medium block mb-3">Popular Searches</span>
                <div class="flex flex-wrap gap-2 text-xs">
                    <a href="shop.php?category=chairs" class="px-3.5 py-1.5 rounded-full bg-[#EFE9DF] text-stone-800 hover:bg-[#1A1613] hover:text-white border border-[#E2D8C9] transition-colors">Nordic Armchair</a>
                    <a href="shop.php?category=tables" class="px-3.5 py-1.5 rounded-full bg-[#EFE9DF] text-stone-800 hover:bg-[#1A1613] hover:text-white border border-[#E2D8C9] transition-colors">Solid Oak Dining Table</a>
                    <a href="shop.php?category=sofas" class="px-3.5 py-1.5 rounded-full bg-[#EFE9DF] text-stone-800 hover:bg-[#1A1613] hover:text-white border border-[#E2D8C9] transition-colors">Bouclé Modular Sofa</a>
                    <a href="shop.php?category=beds" class="px-3.5 py-1.5 rounded-full bg-[#EFE9DF] text-stone-800 hover:bg-[#1A1613] hover:text-white border border-[#E2D8C9] transition-colors">Platform Bed</a>
                </div>
            </div>
        </div>
    </div>
</div>
