<!-- [PHP_BACKEND_HOOK: Global storefront footer with atelier story and newsletter handler] -->
<footer class="bg-[#14120F] text-[#D8CEBF] pt-16 pb-12 border-t border-[#26201A]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12 lg:gap-8 pb-12 border-b border-[#28221B]">
            <!-- Col 1: Atelier Story & Mission -->
            <div class="space-y-4">
                <div class="flex items-center gap-3">
                    <span class="w-8 h-8 rounded-xl bg-[#CBA57F] text-[#14120F] flex items-center justify-center font-serif text-base font-semibold shadow-xs">F</span>
                    <span class="font-serif text-xl tracking-tight text-[#FAF6F0] font-semibold">FurnishMe</span>
                </div>
                <p class="text-xs sm:text-sm text-[#A89C8D] leading-relaxed">
                    A design atelier founded on the principles of Japanese simplicity and Scandinavian warmth. We curate tactile, sculptural furniture handcrafted from sustainably harvested woods and honest textiles.
                </p>
                <div class="flex items-center gap-3 pt-2">
                    <a href="#" aria-label="Instagram" class="w-9 h-9 rounded-xl bg-[#1E1A16] hover:bg-[#2B241E] text-stone-300 hover:text-white flex items-center justify-center transition-colors border border-[#302821]">
                        <i class="ri-instagram-line text-lg"></i>
                    </a>
                    <a href="#" aria-label="Pinterest" class="w-9 h-9 rounded-xl bg-[#1E1A16] hover:bg-[#2B241E] text-stone-300 hover:text-white flex items-center justify-center transition-colors border border-[#302821]">
                        <i class="ri-pinterest-line text-lg"></i>
                    </a>
                    <a href="#" aria-label="Facebook" class="w-9 h-9 rounded-xl bg-[#1E1A16] hover:bg-[#2B241E] text-stone-300 hover:text-white flex items-center justify-center transition-colors border border-[#302821]">
                        <i class="ri-facebook-circle-line text-lg"></i>
                    </a>
                    <a href="#" aria-label="LinkedIn" class="w-9 h-9 rounded-xl bg-[#1E1A16] hover:bg-[#2B241E] text-stone-300 hover:text-white flex items-center justify-center transition-colors border border-[#302821]">
                        <i class="ri-linkedin-box-line text-lg"></i>
                    </a>
                </div>
            </div>

            <!-- Col 2: Curated Links -->
            <div>
                <h4 class="text-xs uppercase tracking-[0.2em] text-[#CBA57F] font-semibold mb-5">Atelier Collection</h4>
                <ul class="space-y-3 text-xs sm:text-sm">
                    <li><a href="index.php" class="text-[#A89C8D] hover:text-[#FAF6F0] transition-colors">Home &amp; Highlights</a></li>
                    <li><a href="shop.php" class="text-[#A89C8D] hover:text-[#FAF6F0] transition-colors">All Furniture</a></li>
                    <li><a href="about.php" class="text-[#A89C8D] hover:text-[#FAF6F0] transition-colors">Our Philosophy</a></li>
                    <li><a href="team.php" class="text-[#A89C8D] hover:text-[#FAF6F0] transition-colors">Design Collective</a></li>
                    <li><a href="blog.php" class="text-[#A89C8D] hover:text-[#FAF6F0] transition-colors">Design Journal</a></li>
                    <li><a href="contact.php" class="text-[#A89C8D] hover:text-[#FAF6F0] transition-colors">Showroom Inquiries</a></li>
                </ul>
            </div>

            <!-- Col 3: Customer Care & Showroom Info -->
            <div>
                <h4 class="text-xs uppercase tracking-[0.2em] text-[#CBA57F] font-semibold mb-5">Concierge &amp; Showroom</h4>
                <div class="space-y-3 text-xs sm:text-sm text-stone-300">
                    <p class="text-[#A89C8D]">
                        <strong class="text-[#FAF6F0] block font-medium">Yangon Flagship</strong>
                        No. 55A, Maggin Street, Yankin Township,<br>Yangon, Myanmar
                    </p>
                    <p class="text-[#A89C8D] pt-1">
                        <span class="block text-[#FAF6F0] font-medium">Visiting Hours</span>
                        Tue — Sun: 09:30 AM — 06:30 PM<br>
                        (Closed on Mondays)
                    </p>
                    <p class="text-[#A89C8D] pt-1">
                        <span class="block text-[#FAF6F0] font-medium">Direct Inquiries</span>
                        <a href="tel:+959973383719" class="hover:text-amber-200 transition-colors">+95 9 973 383 719</a><br>
                        <a href="mailto:atelier@furnishme.com" class="hover:text-amber-200 transition-colors">atelier@furnishme.com</a>
                    </p>
                </div>
            </div>

            <!-- Col 4: Editorial Newsletter -->
            <div>
                <h4 class="text-xs uppercase tracking-[0.2em] text-[#CBA57F] font-semibold mb-5">The Atelier Journal</h4>
                <p class="text-xs sm:text-sm text-[#A89C8D] leading-relaxed mb-4">
                    Subscribe for seasonal lookbooks, tactile wood release previews, and invitations to private showroom vernissages.
                </p>
                <!-- [PHP_BACKEND_HOOK: Newsletter subscription handler. Post email to subscribers table, validate format, prevent duplicates] -->
                <form action="#" method="POST" data-toast-success="Thank you for subscribing to our journal." class="space-y-3">
                    <div class="relative">
                        <input type="email" name="subscriber_email" placeholder="Enter your email address" required class="w-full px-4 py-3 bg-[#1E1A16] border border-[#332A23] rounded-xl text-stone-100 placeholder-[#7B6E60] text-xs sm:text-sm focus:outline-none focus:border-[#CBA57F] focus:ring-1 focus:ring-[#CBA57F] transition-all">
                    </div>
                    <button type="submit" class="w-full py-3 px-4 rounded-xl bg-[#FAF6F0] hover:bg-[#CBA57F] text-[#14120F] font-semibold text-xs sm:text-sm transition-colors flex items-center justify-center gap-2 shadow-xs">
                        <span>Subscribe</span>
                        <i class="ri-arrow-right-line"></i>
                    </button>
                </form>
            </div>
        </div>

        <!-- Bottom Copyright & Credits -->
        <div class="pt-8 flex flex-col sm:flex-row items-center justify-between text-xs text-stone-500 gap-4">
            <p>&copy; <?php echo date("Y"); ?> FurnishMe Atelier. All rights reserved.</p>
            <div class="flex items-center gap-6">
                <a href="privacy.php" class="hover:text-[#FAF6F0] transition-colors">Privacy Policy</a>
                <a href="terms.php" class="hover:text-[#FAF6F0] transition-colors">Terms of Service</a>
                <a href="care.php" class="hover:text-[#FAF6F0] transition-colors">Care Instructions</a>
                <a href="admin/index.php" class="text-stone-400 hover:text-white transition-colors flex items-center gap-1">
                    <i class="ri-shield-keyhole-line text-[#CBA57F]"></i> Atelier Portal
                </a>
            </div>
        </div>
    </div>
</footer>

<!-- Toast Feedback Notifications Container -->
<div id="toast-container" class="fixed bottom-6 right-6 z-50 flex flex-col gap-3 pointer-events-none"></div>
