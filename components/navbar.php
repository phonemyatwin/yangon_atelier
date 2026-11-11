<!-- [PHP_BACKEND_HOOK: Mobile Navigation Drawer Component] -->
<!-- Mobile Drawer Backdrop Overlay -->
<div id="mobile-backdrop" class="fixed inset-0 bg-black/80 backdrop-blur-md z-50 hidden opacity-0 transition-opacity duration-300"></div>

<!-- Mobile Off-Canvas Drawer -->
<nav id="mobile-drawer" class="fixed top-0 right-0 bottom-0 w-80 max-w-[85vw] bg-[#110E0C] border-l border-[#261E16] z-50 shadow-2xl transform translate-x-full transition-transform duration-300 ease-in-out flex flex-col justify-between p-6 overflow-y-auto">
    <div>
        <!-- Drawer Header -->
        <div class="flex items-center justify-between pb-6 border-b border-[#261E16]">
            <div class="flex items-center gap-2.5">
                <span class="w-8 h-8 rounded-lg bg-[#C5A059] text-[#0D0B09] border border-[#DFB873]/40 flex items-center justify-center font-serif text-sm font-bold">F</span>
                <span class="font-serif text-lg font-semibold tracking-tight text-[#FAF6EE]">FurnishMe</span>
            </div>
            <!-- Accessible Close Button with legacy id "closer" -->
            <button type="button" id="closer" aria-label="Close navigation" class="w-9 h-9 rounded-full flex items-center justify-center text-[#8C7D6B] hover:text-[#FAF6EE] hover:bg-[#1D1914] transition-colors">
                <i class="ri-close-line text-2xl"></i>
            </button>
        </div>

        <!-- Navigation Links -->
        <div class="mt-8 flex flex-col space-y-1">
            <a href="index.php" class="flex items-center justify-between py-3 px-4 rounded-xl text-[#D6C8B4] hover:bg-[#1D1914] hover:text-[#FAF6EE] text-base font-medium transition-colors">
                <span>Home</span>
                <i class="ri-arrow-right-s-line text-[#665849]"></i>
            </a>
            <a href="shop.php" class="flex items-center justify-between py-3 px-4 rounded-xl text-[#D6C8B4] hover:bg-[#1D1914] hover:text-[#FAF6EE] text-base font-medium transition-colors">
                <span>Shop Collection</span>
                <i class="ri-arrow-right-s-line text-[#665849]"></i>
            </a>
            <a href="about.php" class="flex items-center justify-between py-3 px-4 rounded-xl text-[#D6C8B4] hover:bg-[#1D1914] hover:text-[#FAF6EE] text-base font-medium transition-colors">
                <span>About Atelier</span>
                <i class="ri-arrow-right-s-line text-[#665849]"></i>
            </a>
            <a href="team.php" class="flex items-center justify-between py-3 px-4 rounded-xl text-[#D6C8B4] hover:bg-[#1D1914] hover:text-[#FAF6EE] text-base font-medium transition-colors">
                <span>Design Team</span>
                <i class="ri-arrow-right-s-line text-[#665849]"></i>
            </a>
            <a href="blog.php" class="flex items-center justify-between py-3 px-4 rounded-xl text-[#D6C8B4] hover:bg-[#1D1914] hover:text-[#FAF6EE] text-base font-medium transition-colors">
                <span>Journal</span>
                <i class="ri-arrow-right-s-line text-[#665849]"></i>
            </a>
            <a href="contact.php" class="flex items-center justify-between py-3 px-4 rounded-xl text-[#D6C8B4] hover:bg-[#1D1914] hover:text-[#FAF6EE] text-base font-medium transition-colors">
                <span>Contact &amp; Showroom</span>
                <i class="ri-arrow-right-s-line text-[#665849]"></i>
            </a>
        </div>
    </div>

    <!-- Drawer Footer / Atelier Info -->
    <div class="pt-6 border-t border-[#261E16]">
        <div class="mb-4">
            <span class="text-xs uppercase tracking-widest text-[#C5A059] font-semibold block mb-1">Yangon Flagship</span>
            <p class="text-xs text-[#8C7D6B] leading-relaxed">No. 55A, Maggin Street, Yankin Township,<br>Yangon, Myanmar</p>
            <p class="text-xs text-[#665849] mt-1">Daily 09:30 AM — 06:30 PM</p>
        </div>
        <a href="login.php" class="w-full flex items-center justify-center gap-2 py-3 px-4 rounded-xl bg-[#C5A059] hover:bg-[#D4AF37] text-[#0D0B09] text-sm font-semibold transition-all shadow-md">
            <i class="ri-user-line"></i>
            <span>Client Sign In</span>
        </a>
    </div>
</nav>
