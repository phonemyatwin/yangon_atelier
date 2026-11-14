<?php

/**
 * ============================================================================
 * YANGON ATELIER BACKEND INSTRUCTION GUIDELINE - GLOBAL STOREFRONT FOOTER
 * ============================================================================
 * FILE: components/footer.php
 * 
 * BACKEND LOGIC REQUIREMENTS:
 * 1. Newsletter Subscription Handler:
 *    - Triggered by POST submission of input 'subscriber_email'.
 *    - Validate email format with filter_var($email, FILTER_VALIDATE_EMAIL).
 *    - Check for duplicates before inserting into 'subscribers' table:
 *      $stmt = $pdo->prepare("INSERT IGNORE INTO subscribers (email) VALUES (?)");
 *      $stmt->execute([$email]);
 *    - Provide user feedback via toast or session flash message.
 * ============================================================================
 */
?>
<!-- GLOBAL STOREFRONT FOOTER (Smoked Walnut) -->
<footer class="bg-[#4A4038] border-t border-[#3A322B] pt-16 pb-12 text-[#F6F3EE]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-10 lg:gap-12 pb-16 border-b border-[#3A322B]">

            <!-- Col 1: Brand & Atelier Ethos -->
            <div class="space-y-4">
                <div class="flex items-center gap-3">
                    <span class="w-8 h-8 rounded-xl bg-[#8A5A44] text-[#F6F3EE] flex items-center justify-center font-serif text-base font-bold shadow-xs">
                        Y
                    </span>
                    <span class="font-serif text-xl tracking-tight text-[#F6F3EE] font-semibold">Yangon Atelier</span>
                </div>
                <p class="text-xs sm:text-sm text-[#DFD8CD] leading-relaxed">
                    A Yangon-based design studio crafting architectural furniture, quiet lighting, and tactile domestic sanctuaries. Hand-finished with certified organic timber oils.
                </p>
                <div class="flex items-center gap-3 pt-2">
                    <a href="https://instagram.com" target="_blank" rel="noopener" aria-label="Atelier Instagram" class="w-8 h-8 rounded-full bg-[#3A322B] text-[#DFD8CD] hover:bg-[#8A5A44] hover:text-[#F6F3EE] flex items-center justify-center transition-colors">
                        <i class="ri-instagram-line text-sm"></i>
                    </a>
                    <a href="https://facebook.com" target="_blank" rel="noopener" aria-label="Atelier Facebook" class="w-8 h-8 rounded-full bg-[#3A322B] text-[#DFD8CD] hover:bg-[#8A5A44] hover:text-[#F6F3EE] flex items-center justify-center transition-colors">
                        <i class="ri-facebook-fill text-sm"></i>
                    </a>
                    <a href="https://pinterest.com" target="_blank" rel="noopener" aria-label="Atelier Pinterest" class="w-8 h-8 rounded-full bg-[#3A322B] text-[#DFD8CD] hover:bg-[#8A5A44] hover:text-[#F6F3EE] flex items-center justify-center transition-colors">
                        <i class="ri-pinterest-line text-sm"></i>
                    </a>
                </div>
            </div>

            <!-- Col 2: Navigation Quick Links -->
            <div>
                <h4 class="text-xs uppercase tracking-[0.2em] text-[#E8DDD6] font-semibold mb-5">Atelier Collections</h4>
                <ul class="space-y-2.5 text-xs sm:text-sm text-[#DFD8CD]">
                    <li><a href="shop.php?category=chairs" class="hover:text-[#FFFFFF] transition-colors">Chairs &amp; Lounges</a></li>
                    <li><a href="shop.php?category=sofas" class="hover:text-[#FFFFFF] transition-colors">Sofas &amp; Daybeds</a></li>
                    <li><a href="shop.php?category=tables" class="hover:text-[#FFFFFF] transition-colors">Dining &amp; Coffee Tables</a></li>
                    <li><a href="shop.php?category=beds" class="hover:text-[#FFFFFF] transition-colors">Platform Beds &amp; Tatami</a></li>
                    <li><a href="shop.php?category=objects" class="hover:text-[#FFFFFF] transition-colors">Sculptural Lighting</a></li>
                    <li><a href="shop.php" class="text-[#F2ECE8] hover:underline font-medium pt-1 inline-block">Browse All Catalog &rarr;</a></li>
                </ul>
            </div>

            <!-- Col 3: Atelier Showroom & Contact -->
            <div>
                <h4 class="text-xs uppercase tracking-[0.2em] text-[#E8DDD6] font-semibold mb-5">Flagship Atelier</h4>
                <div class="space-y-3 text-xs sm:text-sm text-[#DFD8CD] leading-relaxed">
                    <p>
                        <strong class="text-[#F6F3EE] block font-medium">Yangon Sanctuary</strong>
                        No. 55A, Maggin Street, Yankin Township,<br>
                        Yangon 11081, Myanmar
                    </p>
                    <p class="pt-1">
                        <span class="block text-[#F6F3EE] font-medium">Visiting Hours</span>
                        Tue — Sun: 09:30 AM — 06:30 PM<br>
                        (Closed on Mondays)
                    </p>
                    <p class="pt-1">
                        <span class="block text-[#F6F3EE] font-medium">Direct Inquiries</span>
                        <a href="tel:+959973383719" class="hover:text-[#FFFFFF] transition-colors">+95 9 973 383 719</a><br>
                        <a href="mailto:atelier@yangonatelier.com" class="hover:text-[#FFFFFF] transition-colors">atelier@yangonatelier.com</a>
                    </p>
                </div>
            </div>

            <!-- Col 4: Editorial Newsletter -->
            <div>
                <h4 class="text-xs uppercase tracking-[0.2em] text-[#E8DDD6] font-semibold mb-5">The Atelier Journal</h4>
                <p class="text-xs sm:text-sm text-[#DFD8CD] leading-relaxed mb-4">
                    Subscribe for seasonal lookbooks, tactile wood release previews, and invitations to private showroom vernissages.
                </p>
                <form action="" method="POST" data-toast-success="Thank you for subscribing to our journal." class="space-y-3">
                    <div class="relative">
                        <input type="email" name="subscriber_email" placeholder="Enter your email address" class="w-full px-4 py-3 bg-[#3A322B] border border-[#5C5046] rounded-xl text-[#F6F3EE] placeholder-[#C9C0B3] text-xs sm:text-sm focus:outline-none focus:border-[#8A5A44] focus:ring-1 focus:ring-[#8A5A44] transition-all">
                    </div>
                    <button type="submit" name="subscribe_newsletter" class="w-full py-3 px-4 rounded-xl bg-[#8A5A44] hover:bg-[#704735] text-[#F6F3EE] font-semibold text-xs sm:text-sm transition-all flex items-center justify-center gap-2 shadow-sm">
                        <span>Subscribe</span>
                        <i class="ri-arrow-right-line"></i>
                    </button>
                </form>
            </div>
        </div>

        <!-- Bottom Copyright & Credits -->
        <div class="pt-8 flex flex-col sm:flex-row items-center justify-between text-xs text-[#C9C0B3] gap-4">
            <p>&copy; <?php echo date("Y"); ?> Yangon Atelier. All rights reserved.</p>
            <div class="flex items-center gap-6">
                <a href="privacy.php" class="hover:text-[#FFFFFF] transition-colors">Privacy Policy</a>
                <a href="terms.php" class="hover:text-[#FFFFFF] transition-colors">Terms of Service</a>
                <a href="care.php" class="hover:text-[#FFFFFF] transition-colors">Care Instructions</a>
                <a href="admin/index.php" class="text-[#DFD8CD] hover:text-[#FFFFFF] transition-colors flex items-center gap-1">
                    <i class="ri-shield-keyhole-line text-[#8A5A44]"></i> Atelier Portal
                </a>
            </div>
        </div>
    </div>
</footer>

<!-- Toast Feedback Notifications Container -->
<div id="toast-container" class="fixed bottom-6 right-6 z-50 flex flex-col gap-3 pointer-events-none"></div>