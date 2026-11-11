<!-- [PHP_BACKEND_HOOK: Admin sidebar navigation. Dynamic active link highlighting based on current script name] -->
<aside id="admin__sidebar" class="fixed inset-y-0 left-0 z-50 w-64 bg-[#14120F] text-[#D8CEBF] flex flex-col justify-between border-r border-[#26201A] transition-transform duration-300 ease-in-out -translate-x-full lg:translate-x-0">
    <div>
        <!-- Brand Header -->
        <div class="h-20 flex items-center gap-3 px-6 border-b border-[#26201A]">
            <span class="w-9 h-9 rounded-xl bg-[#C5A059] text-[#0D0B09] font-bold flex items-center justify-center font-serif text-lg font-semibold shadow-xs">
                F
            </span>
            <div class="flex flex-col">
                <span class="font-serif text-lg font-semibold tracking-tight text-[#FAF6F0] leading-none">FurnishMe</span>
                <span class="text-[10px] tracking-[0.2em] uppercase text-[#CBA57F] font-medium mt-1">Admin Atelier</span>
            </div>
        </div>

        <!-- Navigation Links -->
        <nav class="p-4 space-y-6 text-xs font-medium">
            <!-- Section: Main Operations -->
            <div>
                <span class="px-3 text-[10px] uppercase tracking-[0.2em] text-[#9E8E7C] font-semibold block mb-2">Operations</span>
                <div class="space-y-1">
                    <a href="dashboard.php" class="flex items-center gap-3 px-3 py-2.5 rounded-xl hover:bg-[#1E1A16] hover:text-[#FAF6F0] transition-colors">
                        <i class="ri-dashboard-line text-base text-[#9E8E7C]"></i>
                        <span>Dashboard</span>
                    </a>
                    <a href="products.php" class="flex items-center gap-3 px-3 py-2.5 rounded-xl hover:bg-[#1E1A16] hover:text-[#FAF6F0] transition-colors">
                        <i class="ri-shopping-bag-3-line text-base text-[#9E8E7C]"></i>
                        <span>Products</span>
                    </a>
                    <a href="users.php" class="flex items-center gap-3 px-3 py-2.5 rounded-xl hover:bg-[#1E1A16] hover:text-[#FAF6F0] transition-colors">
                        <i class="ri-user-3-line text-base text-[#9E8E7C]"></i>
                        <span>Users</span>
                    </a>
                </div>
            </div>

            <!-- Section: Editorial Content -->
            <div>
                <span class="px-3 text-[10px] uppercase tracking-[0.2em] text-[#9E8E7C] font-semibold block mb-2">Editorial &amp; CRM</span>
                <div class="space-y-1">
                    <a href="blog.php" class="flex items-center gap-3 px-3 py-2.5 rounded-xl hover:bg-[#1E1A16] hover:text-[#FAF6F0] transition-colors">
                        <i class="ri-article-line text-base text-[#9E8E7C]"></i>
                        <span>Journal / Blog</span>
                    </a>
                    <a href="team.php" class="flex items-center gap-3 px-3 py-2.5 rounded-xl hover:bg-[#1E1A16] hover:text-[#FAF6F0] transition-colors">
                        <i class="ri-team-line text-base text-[#9E8E7C]"></i>
                        <span>Design Team</span>
                    </a>
                    <a href="contacts.php" class="flex items-center gap-3 px-3 py-2.5 rounded-xl hover:bg-[#1E1A16] hover:text-[#FAF6F0] transition-colors">
                        <i class="ri-mail-line text-base text-[#9E8E7C]"></i>
                        <span>Inquiries</span>
                    </a>
                    <a href="subscribers.php" class="flex items-center gap-3 px-3 py-2.5 rounded-xl hover:bg-[#1E1A16] hover:text-[#FAF6F0] transition-colors">
                        <i class="ri-mail-add-line text-base text-[#9E8E7C]"></i>
                        <span>Subscribers</span>
                    </a>
                </div>
            </div>

            <!-- Section: System & Exit -->
            <div>
                <span class="px-3 text-[10px] uppercase tracking-[0.2em] text-[#9E8E7C] font-semibold block mb-2">Portal Actions</span>
                <div class="space-y-1">
                    <a href="../index.php" target="_blank" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-[#A89E90] hover:bg-[#1E1A16] hover:text-[#FAF6F0] transition-colors">
                        <i class="ri-external-link-line text-base"></i>
                        <span>View Storefront</span>
                    </a>
                    <a href="index.php" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-stone-400 hover:bg-rose-950/60 hover:text-rose-300 transition-colors">
                        <i class="ri-logout-box-r-line text-base"></i>
                        <span>Sign Out</span>
                    </a>
                </div>
            </div>
        </nav>
    </div>

    <!-- Sidebar Footer -->
    <div class="p-4 border-t border-[#26201A] text-[11px] text-[#9E8E7C]">
        <p>FurnishMe Atelier v2.4</p>
        <p class="text-[#8C7D6B] mt-0.5">Admin Control Panel</p>
    </div>
</aside>

<!-- Mobile Overlay Backdrop -->
<div id="admin__overlay" class="fixed inset-0 bg-stone-950/60 backdrop-blur-xs z-40 hidden opacity-0 transition-opacity duration-300 lg:hidden"></div>
