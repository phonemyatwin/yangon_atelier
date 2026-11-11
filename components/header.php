<!-- [PHP_BACKEND_HOOK: Global storefront header with navigation and search overlay] -->
<header class="sticky top-0 z-40 w-full bg-[#FAF8F5]/90 backdrop-blur-md border-b border-stone-200/80 transition-all">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-20 flex items-center justify-between">
        <!-- Atelier Brand Logo -->
        <a href="index.php" class="group flex items-center gap-3 focus:outline-none">
            <span class="w-9 h-9 rounded-xl bg-stone-900 text-stone-100 flex items-center justify-center font-serif text-lg tracking-wider group-hover:bg-amber-900 transition-colors shadow-xs">
                F
            </span>
            <div class="flex flex-col">
                <span class="font-serif text-xl tracking-tight text-stone-900 font-semibold leading-none">FurnishMe</span>
                <span class="text-[10px] tracking-[0.25em] uppercase text-stone-500 font-medium mt-1">Design Atelier</span>
            </div>
        </a>

        <!-- Desktop Navigation Bar -->
        <nav class="hidden md:flex items-center gap-8 text-sm tracking-wide font-medium text-stone-600">
            <a href="index.php" class="hover:text-stone-950 transition-colors py-1 relative after:content-[''] after:absolute after:bottom-0 after:left-0 after:w-0 hover:after:w-full after:h-[1.5px] after:bg-stone-900 after:transition-all">Home</a>
            <a href="shop.php" class="hover:text-stone-950 transition-colors py-1 relative after:content-[''] after:absolute after:bottom-0 after:left-0 after:w-0 hover:after:w-full after:h-[1.5px] after:bg-stone-900 after:transition-all">Shop</a>
            <a href="about.php" class="hover:text-stone-950 transition-colors py-1 relative after:content-[''] after:absolute after:bottom-0 after:left-0 after:w-0 hover:after:w-full after:h-[1.5px] after:bg-stone-900 after:transition-all">About</a>
            <a href="team.php" class="hover:text-stone-950 transition-colors py-1 relative after:content-[''] after:absolute after:bottom-0 after:left-0 after:w-0 hover:after:w-full after:h-[1.5px] after:bg-stone-900 after:transition-all">Team</a>
            <a href="blog.php" class="hover:text-stone-950 transition-colors py-1 relative after:content-[''] after:absolute after:bottom-0 after:left-0 after:w-0 hover:after:w-full after:h-[1.5px] after:bg-stone-900 after:transition-all">Journal</a>
            <a href="contact.php" class="hover:text-stone-950 transition-colors py-1 relative after:content-[''] after:absolute after:bottom-0 after:left-0 after:w-0 hover:after:w-full after:h-[1.5px] after:bg-stone-900 after:transition-all">Contact</a>
        </nav>

        <!-- Right Action Cluster -->
        <div class="flex items-center gap-2 sm:gap-3">
            <!-- Search Trigger Button -->
            <button type="button" id="search-btn" aria-label="Open Search" class="w-10 h-10 rounded-xl flex items-center justify-center text-stone-700 hover:text-stone-900 hover:bg-stone-100 transition-colors">
                <i class="ri-search-line text-lg"></i>
            </button>

            <!-- User Account Link -->
            <!-- [PHP_BACKEND_HOOK: Dynamic user state. If authenticated, link to account/profile, else to login.php] -->
            <a href="login.php" id="login-btn" aria-label="Account Login" class="w-10 h-10 rounded-xl flex items-center justify-center text-stone-700 hover:text-stone-900 hover:bg-stone-100 transition-colors" title="Account">
                <i class="ri-user-line text-lg"></i>
            </a>

            <!-- Mobile Drawer Menu Toggle -->
            <button type="button" id="menu-btn" aria-label="Toggle Mobile Navigation" class="md:hidden w-10 h-10 rounded-xl flex items-center justify-center text-stone-800 hover:bg-stone-100 transition-colors">
                <i class="ri-menu-line text-xl"></i>
            </button>
        </div>
    </div>
</header>

<!-- Search Dialog Modal Overlay -->
<div id="search-modal" class="fixed inset-0 z-50 hidden transition-opacity duration-200 opacity-0" role="dialog" aria-modal="true">
    <div id="search-modal-backdrop" class="fixed inset-0 bg-stone-950/60 backdrop-blur-sm"></div>

    <div class="fixed inset-0 overflow-y-auto flex items-start justify-center pt-20 px-4 sm:px-6">
        <div class="relative w-full max-w-2xl bg-white rounded-2xl shadow-2xl border border-stone-200 p-6 sm:p-8 z-10 transition-transform">
            <div class="flex items-center justify-between pb-4 border-b border-stone-100">
                <div class="flex items-center gap-2">
                    <i class="ri-search-2-line text-stone-400 text-lg"></i>
                    <h3 class="font-serif text-lg text-stone-900 font-medium">Search the Collection</h3>
                </div>
                <button type="button" id="search-close-btn" aria-label="Close search" class="w-8 h-8 rounded-full flex items-center justify-center text-stone-400 hover:text-stone-800 hover:bg-stone-100 transition-colors">
                    <i class="ri-close-line text-xl"></i>
                </button>
            </div>

            <!-- [PHP_BACKEND_HOOK: Search query submission handler. Target action="shop.php" method="GET" with input name="search"] -->
            <form action="shop.php" method="GET" class="mt-6">
                <div class="relative flex items-center">
                    <i class="ri-search-line absolute left-4 text-stone-400 text-lg"></i>
                    <input type="search" name="search" id="search-box" placeholder="Search by piece, wood type, designer..." class="w-full pl-12 pr-4 py-3.5 bg-stone-50 border border-stone-200 rounded-xl text-stone-900 placeholder-stone-400 focus:outline-none focus:ring-2 focus:ring-amber-900 focus:border-amber-900 text-sm transition-all">
                </div>
            </form>

            <!-- Popular Curated Suggestions -->
            <div class="mt-6 pt-5 border-t border-stone-100">
                <span class="text-xs uppercase tracking-wider text-stone-400 font-medium block mb-3">Popular Searches</span>
                <div class="flex flex-wrap gap-2 text-xs">
                    <a href="shop.php?category=chairs" class="px-3 py-1.5 rounded-full bg-stone-100 text-stone-700 hover:bg-stone-900 hover:text-white transition-colors">Nordic Armchair</a>
                    <a href="shop.php?category=tables" class="px-3 py-1.5 rounded-full bg-stone-100 text-stone-700 hover:bg-stone-900 hover:text-white transition-colors">Solid Oak Dining Table</a>
                    <a href="shop.php?category=sofas" class="px-3 py-1.5 rounded-full bg-stone-100 text-stone-700 hover:bg-stone-900 hover:text-white transition-colors">Bouclé Modular Sofa</a>
                    <a href="shop.php?category=beds" class="px-3 py-1.5 rounded-full bg-stone-100 text-stone-700 hover:bg-stone-900 hover:text-white transition-colors">Platform Bed</a>
                </div>
            </div>
        </div>
    </div>
</div>
