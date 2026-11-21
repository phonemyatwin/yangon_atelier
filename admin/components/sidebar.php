<?php

$current_page = basename($_SERVER['PHP_SELF'] ?? 'dashboard.php');

?>
<!-- Admin Sidebar in Smoked Walnut (#4A4038) -->
<aside id="admin__sidebar" class="fixed inset-y-0 left-0 z-50 w-64 bg-[#4A4038] text-[#F6F3EE] flex flex-col justify-between border-r border-[#3A322B] transition-transform duration-300 ease-in-out -translate-x-full lg:translate-x-0">
    <div>
        <!-- Brand Header -->
        <div class="h-20 flex items-center gap-3 px-6 border-b border-[#3A322B]">
            <div class="w-10 h-10 rounded-xl bg-[#EDE8E0] border border-[#704735] overflow-hidden flex items-center justify-center p-1 shadow-sm">
                <img src="../images/logo/Yangon_Atelier.png" alt="Yangon Atelier Logo" class="w-full h-full object-contain">
            </div>
            <div class="flex flex-col">
                <span class="font-serif text-lg font-semibold tracking-tight text-[#F6F3EE] leading-none">Yangon Atelier</span>
                <span class="text-[10px] tracking-[0.2em] uppercase text-[#DFD8CD] font-medium mt-1">Management Portal</span>
            </div>
        </div>

        <!-- Navigation Links -->
        <nav class="p-4 space-y-6 text-xs font-medium">
            <!-- Section: Main Operations -->
            <div>
                <span class="px-3 text-[10px] uppercase tracking-[0.2em] text-[#C9C0B3] font-semibold block mb-2">Operations</span>
                <div class="space-y-1">
                    <a href="dashboard.php" class="flex items-center gap-3 px-3 py-2.5 rounded-xl <?= ($current_page == 'dashboard.php') ? 'bg-[#3A322B] text-[#F6F3EE] font-semibold shadow-xs' : 'text-[#DFD8CD] hover:bg-[#3A322B]/70 hover:text-[#F6F3EE]' ?> transition-colors">
                        <i class="ri-dashboard-line text-base <?= ($current_page == 'dashboard.php') ? 'text-[#8A5A44]' : 'text-[#C9C0B3]' ?>"></i>
                        <span>Dashboard</span>
                    </a>
                    <a href="products.php" class="flex items-center gap-3 px-3 py-2.5 rounded-xl <?= str_contains($current_page, 'product') ? 'bg-[#3A322B] text-[#F6F3EE] font-semibold shadow-xs' : 'text-[#DFD8CD] hover:bg-[#3A322B]/70 hover:text-[#F6F3EE]' ?> transition-colors">
                        <i class="ri-shopping-bag-3-line text-base <?= str_contains($current_page, 'product') ? 'text-[#8A5A44]' : 'text-[#C9C0B3]' ?>"></i>
                        <span>Products</span>
                    </a>
                    <a href="admins.php" class="flex items-center gap-3 px-3 py-2.5 rounded-xl <?= str_contains($current_page, 'admin') ? 'bg-[#3A322B] text-[#F6F3EE] font-semibold shadow-xs' : 'text-[#DFD8CD] hover:bg-[#3A322B]/70 hover:text-[#F6F3EE]' ?> transition-colors">
                        <i class="ri-user-3-line text-base <?= str_contains($current_page, 'admin') ? 'text-[#8A5A44]' : 'text-[#C9C0B3]' ?>"></i>
                        <span>Admins</span>
                    </a>
                </div>
            </div>

            <!-- Section: Editorial Content -->
            <div>
                <span class="px-3 text-[10px] uppercase tracking-[0.2em] text-[#C9C0B3] font-semibold block mb-2">Editorial &amp; CRM</span>
                <div class="space-y-1">
                    <a href="blog.php" class="flex items-center gap-3 px-3 py-2.5 rounded-xl <?= str_contains($current_page, 'blog') ? 'bg-[#3A322B] text-[#F6F3EE] font-semibold shadow-xs' : 'text-[#DFD8CD] hover:bg-[#3A322B]/70 hover:text-[#F6F3EE]' ?> transition-colors">
                        <i class="ri-article-line text-base <?= str_contains($current_page, 'blog') ? 'text-[#8A5A44]' : 'text-[#C9C0B3]' ?>"></i>
                        <span>Journal / Blog</span>
                    </a>
                    <a href="team.php" class="flex items-center gap-3 px-3 py-2.5 rounded-xl <?= str_contains($current_page, 'team') ? 'bg-[#3A322B] text-[#F6F3EE] font-semibold shadow-xs' : 'text-[#DFD8CD] hover:bg-[#3A322B]/70 hover:text-[#F6F3EE]' ?> transition-colors">
                        <i class="ri-team-line text-base <?= str_contains($current_page, 'team') ? 'text-[#8A5A44]' : 'text-[#C9C0B3]' ?>"></i>
                        <span>Design Team</span>
                    </a>
                    <a href="contacts.php" class="flex items-center gap-3 px-3 py-2.5 rounded-xl <?= str_contains($current_page, 'contact') ? 'bg-[#3A322B] text-[#F6F3EE] font-semibold shadow-xs' : 'text-[#DFD8CD] hover:bg-[#3A322B]/70 hover:text-[#F6F3EE]' ?> transition-colors">
                        <i class="ri-mail-line text-base <?= str_contains($current_page, 'contact') ? 'text-[#8A5A44]' : 'text-[#C9C0B3]' ?>"></i>
                        <span>Inquiries</span>
                    </a>
                    <a href="subscribers.php" class="flex items-center gap-3 px-3 py-2.5 rounded-xl <?= str_contains($current_page, 'subscriber') ? 'bg-[#3A322B] text-[#F6F3EE] font-semibold shadow-xs' : 'text-[#DFD8CD] hover:bg-[#3A322B]/70 hover:text-[#F6F3EE]' ?> transition-colors">
                        <i class="ri-mail-add-line text-base <?= str_contains($current_page, 'subscriber') ? 'text-[#8A5A44]' : 'text-[#C9C0B3]' ?>"></i>
                        <span>Subscribers</span>
                    </a>
                </div>
            </div>

            <!-- Section: System & Exit -->
            <div>
                <span class="px-3 text-[10px] uppercase tracking-[0.2em] text-[#C9C0B3] font-semibold block mb-2">Portal Actions</span>
                <div class="space-y-1">
                    <a href="../index.php" target="_blank" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-[#DFD8CD] hover:bg-[#3A322B] hover:text-[#F6F3EE] transition-colors">
                        <i class="ri-external-link-line text-base"></i>
                        <span>View Storefront</span>
                    </a>
                    <a href="logout.php" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-[#EFE0E0] hover:bg-[#8C3B3B]/30 hover:text-[#FFFFFF] transition-colors">
                        <i class="ri-logout-box-r-line text-base text-[#8C3B3B]"></i>
                        <span>Sign Out</span>
                    </a>
                </div>
            </div>
        </nav>
    </div>

    <!-- Sidebar Footer -->
    <div class="p-4 border-t border-[#3A322B] text-[11px] text-[#C9C0B3]">
        <p class="font-medium text-[#F6F3EE]">Yangon Atelier v2.4</p>
        <p class="text-[#DFD8CD] mt-0.5">Admin Control Panel</p>
    </div>
</aside>

<!-- Mobile Overlay Backdrop -->
<div id="admin__overlay" class="fixed inset-0 bg-black/50 backdrop-blur-xs z-40 hidden opacity-0 transition-opacity duration-300 lg:hidden"></div>
