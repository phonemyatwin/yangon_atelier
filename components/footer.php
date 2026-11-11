<!-- [PHP_BACKEND_HOOK: Global storefront footer with atelier story and newsletter handler] -->
<footer class="bg-[#070605] text-[#A89C8D] pt-16 pb-12 border-t border-[#1C1611]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12 lg:gap-8 pb-12 border-b border-[#1F1914]">
            <!-- Col 1: Atelier Story & Mission -->
            <div class="space-y-4">
                <div class="flex items-center gap-3">
                    <span class="w-8 h-8 rounded-xl bg-[#C5A059] text-[#0D0B09] flex items-center justify-center font-serif text-base font-bold shadow-md">F</span>
                    <span class="font-serif text-xl tracking-tight text-[#FAF6EE] font-semibold">FurnishMe</span>
                </div>
                <p class="text-xs sm:text-sm text-[#8C7D6B] leading-relaxed">
                    A design atelier founded on the principles of Japanese simplicity and Scandinavian warmth. We curate tactile, sculptural furniture handcrafted from sustainably harvested woods and honest textiles.
                </p>
                <div class="flex items-center gap-3 pt-2">
                    <a href="#" aria-label="Instagram" class="w-9 h-9 rounded-xl bg-[#13100D] hover:bg-[#C5A059] text-[#B5A591] hover:text-[#0D0B09] flex items-center justify-center transition-colors border border-[#221C16] hover:border-[#C5A059]">
                        <i class="ri-instagram-line text-lg"></i>
                    </a>
                    <a href="#" aria-label="Pinterest" class="w-9 h-9 rounded-xl bg-[#13100D] hover:bg-[#C5A059] text-[#B5A591] hover:text-[#0D0B09] flex items-center justify-center transition-colors border border-[#221C16] hover:border-[#C5A059]">
                        <i class="ri-pinterest-line text-lg"></i>
                    </a>
                    <a href="#" aria-label="Facebook" class="w-9 h-9 rounded-xl bg-[#13100D] hover:bg-[#C5A059] text-[#B5A591] hover:text-[#0D0B09] flex items-center justify-center transition-colors border border-[#221C16] hover:border-[#C5A059]">
                        <i class="ri-facebook-circle-line text-lg"></i>
                    </a>
                    <a href="#" aria-label="LinkedIn" class="w-9 h-9 rounded-xl bg-[#13100D] hover:bg-[#C5A059] text-[#B5A591] hover:text-[#0D0B09] flex items-center justify-center transition-colors border border-[#221C16] hover:border-[#C5A059]">
                        <i class="ri-linkedin-box-line text-lg"></i>
                    </a>
                </div>
            </div>

            <!-- Col 2: Curated Links -->
            <div>
                <h4 class="text-xs uppercase tracking-[0.2em] text-[#C5A059] font-semibold mb-5">Atelier Collection</h4>
                <ul class="space-y-3 text-xs sm:text-sm">
                    <li><a href="index.php" class="text-[#8C7D6B] hover:text-[#FAF6EE] transition-colors">Home &amp; Highlights</a></li>
                    <li><a href="shop.php" class="text-[#8C7D6B] hover:text-[#FAF6EE] transition-colors">All Furniture</a></li>
                    <li><a href="about.php" class="text-[#8C7D6B] hover:text-[#FAF6EE] transition-colors">Our Philosophy</a></li>
                    <li><a href="team.php" class="text-[#8C7D6B] hover:text-[#FAF6EE] transition-colors">Design Collective</a></li>
                    <li><a href="blog.php" class="text-[#8C7D6B] hover:text-[#FAF6EE] transition-colors">Design Journal</a></li>
                    <li><a href="contact.php" class="text-[#8C7D6B] hover:text-[#FAF6EE] transition-colors">Showroom Inquiries</a></li>
                </ul>
            </div>

            <!-- Col 3: Customer Care & Showroom Info -->
            <div>
                <h4 class="text-xs uppercase tracking-[0.2em] text-[#C5A059] font-semibold mb-5">Concierge &amp; Showroom</h4>
                <div class="space-y-3 text-xs sm:text-sm text-[#D6C8B4]">
                    <p class="text-[#8C7D6B]">
                        <strong class="text-[#FAF6EE] block font-medium">Yangon Flagship</strong>
                        No. 55A, Maggin Street, Yankin Township,<br>Yangon, Myanmar
                    </p>
                    <p class="text-[#8C7D6B] pt-1">
                        <span class="block text-[#FAF6EE] font-medium">Visiting Hours</span>
                        Tue — Sun: 09:30 AM — 06:30 PM<br>
                        (Closed on Mondays)
                    </p>
                    <p class="text-[#8C7D6B] pt-1">
                        <span class="block text-[#FAF6EE] font-medium">Direct Inquiries</span>
                        <a href="tel:+959973383719" class="hover:text-[#C5A059] transition-colors">+95 9 973 383 719</a><br>
                        <a href="mailto:atelier@furnishme.com" class="hover:text-[#C5A059] transition-colors">atelier@furnishme.com</a>
                    </p>
                </div>
            </div>

            <!-- Col 4: Editorial Newsletter -->
            <div>
                <h4 class="text-xs uppercase tracking-[0.2em] text-[#C5A059] font-semibold mb-5">The Atelier Journal</h4>
                <p class="text-xs sm:text-sm text-[#8C7D6B] leading-relaxed mb-4">
                    Subscribe for seasonal lookbooks, tactile wood release previews, and invitations to private showroom vernissages.
                </p>
                <!-- [PHP_BACKEND_HOOK: Newsletter subscription handler. Post email to subscribers table, validate format, prevent duplicates] -->
                <form action="#" method="POST" data-toast-success="Thank you for subscribing to our journal." class="space-y-3">
                    <div class="relative">
                        <input type="email" name="subscriber_email" placeholder="Enter your email address" required class="w-full px-4 py-3 bg-[#13100D] border border-[#2A221A] rounded-xl text-[#FAF6EE] placeholder-[#665849] text-xs sm:text-sm focus:outline-none focus:border-[#C5A059] focus:ring-1 focus:ring-[#C5A059] transition-all">
                    </div>
                    <button type="submit" class="w-full py-3 px-4 rounded-xl bg-[#C5A059] hover:bg-[#D4AF37] text-[#0D0B09] font-semibold text-xs sm:text-sm transition-all flex items-center justify-center gap-2 shadow-md">
                        <span>Subscribe</span>
                        <i class="ri-arrow-right-line"></i>
                    </button>
                </form>
            </div>
        </div>

        <!-- Bottom Copyright & Credits -->
        <div class="pt-8 flex flex-col sm:flex-row items-center justify-between text-xs text-[#665849] gap-4">
            <p>&copy; <?php echo date("Y"); ?> FurnishMe Atelier. All rights reserved.</p>
            <div class="flex items-center gap-6">
                <a href="privacy.php" class="hover:text-[#FAF6EE] transition-colors">Privacy Policy</a>
                <a href="terms.php" class="hover:text-[#FAF6EE] transition-colors">Terms of Service</a>
                <a href="care.php" class="hover:text-[#FAF6EE] transition-colors">Care Instructions</a>
                <a href="admin/index.php" class="text-[#8C7D6B] hover:text-[#FAF6EE] transition-colors flex items-center gap-1">
                    <i class="ri-shield-keyhole-line text-[#C5A059]"></i> Atelier Portal
                </a>
            </div>
        </div>
    </div>
</footer>

<!-- Toast Feedback Notifications Container -->
<div id="toast-container" class="fixed bottom-6 right-6 z-50 flex flex-col gap-3 pointer-events-none"></div>
