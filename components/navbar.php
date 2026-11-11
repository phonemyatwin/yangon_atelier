<!-- [PHP_BACKEND_HOOK: Mobile Navigation Drawer Component] -->
<!-- Mobile Drawer Backdrop Overlay -->
<div id="mobile-backdrop" class="fixed inset-0 bg-zinc-950/60 backdrop-blur-sm z-50 hidden opacity-0 transition-opacity duration-300"></div>

<!-- Mobile Off-Canvas Drawer -->
<nav id="mobile-drawer" class="fixed top-0 right-0 bottom-0 w-80 max-w-[85vw] bg-white border-l border-zinc-200 z-50 shadow-2xl transform translate-x-full transition-transform duration-300 ease-in-out flex flex-col justify-between p-6 overflow-y-auto">
    <div>
        <!-- Drawer Header -->
        <div class="flex items-center justify-between pb-6 border-b border-zinc-100">
            <div class="flex items-center gap-2.5">
                <span class="w-8 h-8 rounded-lg bg-zinc-900 text-white flex items-center justify-center font-serif text-sm font-semibold">F</span>
                <span class="font-serif text-lg font-semibold tracking-tight text-zinc-900">FurnishMe</span>
            </div>
            <!-- Accessible Close Button with legacy id "closer" -->
            <button type="button" id="closer" aria-label="Close navigation" class="w-9 h-9 rounded-full flex items-center justify-center text-zinc-500 hover:text-zinc-900 hover:bg-zinc-100 transition-colors">
                <i class="ri-close-line text-2xl"></i>
            </button>
        </div>

        <!-- Navigation Links -->
        <div class="mt-8 flex flex-col space-y-1">
            <a href="index.php" class="flex items-center justify-between py-3 px-4 rounded-xl text-zinc-800 hover:bg-zinc-100 hover:text-zinc-950 text-base font-medium transition-colors">
                <span>Home</span>
                <i class="ri-arrow-right-s-line text-zinc-400"></i>
            </a>
            <a href="shop.php" class="flex items-center justify-between py-3 px-4 rounded-xl text-zinc-800 hover:bg-zinc-100 hover:text-zinc-950 text-base font-medium transition-colors">
                <span>Shop Collection</span>
                <i class="ri-arrow-right-s-line text-zinc-400"></i>
            </a>
            <a href="about.php" class="flex items-center justify-between py-3 px-4 rounded-xl text-zinc-800 hover:bg-zinc-100 hover:text-zinc-950 text-base font-medium transition-colors">
                <span>About Atelier</span>
                <i class="ri-arrow-right-s-line text-zinc-400"></i>
            </a>
            <a href="team.php" class="flex items-center justify-between py-3 px-4 rounded-xl text-zinc-800 hover:bg-zinc-100 hover:text-zinc-950 text-base font-medium transition-colors">
                <span>Design Team</span>
                <i class="ri-arrow-right-s-line text-zinc-400"></i>
            </a>
            <a href="blog.php" class="flex items-center justify-between py-3 px-4 rounded-xl text-zinc-800 hover:bg-zinc-100 hover:text-zinc-950 text-base font-medium transition-colors">
                <span>Journal</span>
                <i class="ri-arrow-right-s-line text-zinc-400"></i>
            </a>
            <a href="contact.php" class="flex items-center justify-between py-3 px-4 rounded-xl text-zinc-800 hover:bg-zinc-100 hover:text-zinc-950 text-base font-medium transition-colors">
                <span>Contact &amp; Showroom</span>
                <i class="ri-arrow-right-s-line text-zinc-400"></i>
            </a>
        </div>
    </div>

    <!-- Drawer Footer / Atelier Info -->
    <div class="pt-6 border-t border-zinc-100">
        <div class="mb-4">
            <span class="text-xs uppercase tracking-widest text-zinc-400 font-medium block mb-1">Yangon Flagship</span>
            <p class="text-xs text-zinc-600 leading-relaxed">No. 42, Inya Road, Bahan Township,<br>Yangon, Myanmar</p>
            <p class="text-xs text-zinc-500 mt-1">Daily 09:30 AM — 06:30 PM</p>
        </div>
        <a href="login.php" class="w-full flex items-center justify-center gap-2 py-3 px-4 rounded-xl bg-zinc-900 hover:bg-zinc-800 text-white text-sm font-medium transition-colors shadow-xs">
            <i class="ri-user-line"></i>
            <span>Client Sign In</span>
        </a>
    </div>
</nav>
