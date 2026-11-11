<!-- [PHP_BACKEND_HOOK: Global storefront footer with atelier story and newsletter handler] -->
<footer class="bg-zinc-950 text-zinc-300 pt-16 pb-12 border-t border-zinc-900">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12 lg:gap-8 pb-12 border-b border-zinc-800/80">
            <!-- Col 1: Atelier Story & Mission -->
            <div class="space-y-4">
                <div class="flex items-center gap-3">
                    <span class="w-8 h-8 rounded-xl bg-white text-zinc-950 flex items-center justify-center font-serif text-base font-semibold">F</span>
                    <span class="font-serif text-xl tracking-tight text-white font-semibold">FurnishMe</span>
                </div>
                <p class="text-sm text-zinc-400 leading-relaxed">
                    A design atelier founded on the principles of Japanese simplicity and Scandinavian warmth. We curate tactile, sculptural furniture handcrafted from sustainably harvested woods and honest textiles.
                </p>
                <div class="flex items-center gap-3 pt-2">
                    <a href="#" aria-label="Instagram" class="w-9 h-9 rounded-xl bg-zinc-900 hover:bg-zinc-800 text-zinc-300 hover:text-white flex items-center justify-center transition-colors border border-zinc-800">
                        <i class="ri-instagram-line text-lg"></i>
                    </a>
                    <a href="#" aria-label="Pinterest" class="w-9 h-9 rounded-xl bg-zinc-900 hover:bg-zinc-800 text-zinc-300 hover:text-white flex items-center justify-center transition-colors border border-zinc-800">
                        <i class="ri-pinterest-line text-lg"></i>
                    </a>
                    <a href="#" aria-label="Facebook" class="w-9 h-9 rounded-xl bg-zinc-900 hover:bg-zinc-800 text-zinc-300 hover:text-white flex items-center justify-center transition-colors border border-zinc-800">
                        <i class="ri-facebook-circle-line text-lg"></i>
                    </a>
                    <a href="#" aria-label="LinkedIn" class="w-9 h-9 rounded-xl bg-zinc-900 hover:bg-zinc-800 text-zinc-300 hover:text-white flex items-center justify-center transition-colors border border-zinc-800">
                        <i class="ri-linkedin-box-line text-lg"></i>
                    </a>
                </div>
            </div>

            <!-- Col 2: Curated Links -->
            <div>
                <h4 class="text-xs uppercase tracking-[0.2em] text-zinc-400 font-semibold mb-5">Atelier Collection</h4>
                <ul class="space-y-3 text-sm">
                    <li><a href="index.php" class="text-zinc-400 hover:text-white transition-colors">Home &amp; Highlights</a></li>
                    <li><a href="shop.php" class="text-zinc-400 hover:text-white transition-colors">All Furniture</a></li>
                    <li><a href="about.php" class="text-zinc-400 hover:text-white transition-colors">Our Philosophy</a></li>
                    <li><a href="team.php" class="text-zinc-400 hover:text-white transition-colors">Design Collective</a></li>
                    <li><a href="blog.php" class="text-zinc-400 hover:text-white transition-colors">Design Journal</a></li>
                    <li><a href="contact.php" class="text-zinc-400 hover:text-white transition-colors">Showroom Inquiries</a></li>
                </ul>
            </div>

            <!-- Col 3: Customer Care & Showroom Info -->
            <div>
                <h4 class="text-xs uppercase tracking-[0.2em] text-zinc-400 font-semibold mb-5">Concierge &amp; Showroom</h4>
                <div class="space-y-3 text-sm text-zinc-300">
                    <p class="text-zinc-400">
                        <strong class="text-zinc-200 block">Yangon Flagship</strong>
                        No. 55A, Maggin Street, Yankin Township,<br>Yangon, Myanmar
                    </p>
                    <p class="text-zinc-400 pt-1">
                        <span class="block text-zinc-200 font-medium">Visiting Hours</span>
                        Tue — Sun: 09:30 AM — 06:30 PM<br>
                        (Closed on Mondays)
                    </p>
                    <p class="text-zinc-400 pt-1">
                        <span class="block text-zinc-200 font-medium">Direct Inquiries</span>
                        <a href="tel:+959973383719" class="hover:text-white transition-colors">+95 9 973 383 719</a><br>
                        <a href="mailto:atelier@furnishme.com" class="hover:text-white transition-colors">atelier@furnishme.com</a>
                    </p>
                </div>
            </div>

            <!-- Col 4: Editorial Newsletter -->
            <div>
                <h4 class="text-xs uppercase tracking-[0.2em] text-zinc-400 font-semibold mb-5">The Atelier Journal</h4>
                <p class="text-sm text-zinc-400 leading-relaxed mb-4">
                    Subscribe for seasonal lookbooks, tactile wood release previews, and invitations to private showroom vernissages.
                </p>
                <!-- [PHP_BACKEND_HOOK: Newsletter subscription handler. Post email to subscribers table, validate format, prevent duplicates] -->
                <form action="#" method="POST" data-toast-success="Thank you for subscribing to our journal." class="space-y-3">
                    <div class="relative">
                        <input type="email" name="subscriber_email" placeholder="Enter your email address" required class="w-full px-4 py-3 bg-zinc-900 border border-zinc-800 rounded-xl text-zinc-100 placeholder-zinc-500 text-sm focus:outline-none focus:border-zinc-400 focus:ring-1 focus:ring-zinc-400 transition-all">
                    </div>
                    <button type="submit" class="w-full py-3 px-4 rounded-xl bg-white hover:bg-zinc-200 text-zinc-950 font-medium text-sm transition-colors flex items-center justify-center gap-2 shadow-xs">
                        <span>Subscribe</span>
                        <i class="ri-arrow-right-line"></i>
                    </button>
                </form>
            </div>
        </div>

        <!-- Bottom Copyright & Credits -->
        <div class="pt-8 flex flex-col sm:flex-row items-center justify-between text-xs text-zinc-500 gap-4">
            <p>&copy; <?php echo date("Y"); ?> FurnishMe Atelier. All rights reserved.</p>
            <div class="flex items-center gap-6">
                <a href="#" class="hover:text-zinc-400 transition-colors">Privacy Policy</a>
                <a href="#" class="hover:text-zinc-400 transition-colors">Terms of Service</a>
                <a href="#" class="hover:text-zinc-400 transition-colors">Care Instructions</a>
                <a href="admin/index.php" class="text-zinc-400 hover:text-white transition-colors flex items-center gap-1">
                    <i class="ri-shield-keyhole-line"></i> Atelier Portal
                </a>
            </div>
        </div>
    </div>
</footer>

<!-- Toast Feedback Notifications Container -->
<div id="toast-container" class="fixed bottom-6 right-6 z-50 flex flex-col gap-3 pointer-events-none"></div>
