<!-- [PHP_BACKEND_HOOK: Admin sidebar navigation. Dynamic active link highlighting based on current script name] -->
<aside id="admin__sidebar" class="fixed inset-y-0 left-0 z-50 w-64 bg-zinc-900 text-zinc-300 flex flex-col justify-between border-r border-zinc-800 transition-transform duration-300 ease-in-out -translate-x-full lg:translate-x-0">
    <div>
        <!-- Brand Header -->
        <div class="h-20 flex items-center gap-3 px-6 border-b border-zinc-800">
            <span class="w-9 h-9 rounded-full bg-white text-zinc-950 flex items-center justify-center font-serif text-lg font-semibold">
                F
            </span>
            <div class="flex flex-col">
                <span class="font-serif text-lg font-semibold tracking-tight text-white leading-none">FurnishMe</span>
                <span class="text-[10px] tracking-[0.2em] uppercase text-zinc-400 font-medium mt-1">Admin Atelier</span>
            </div>
        </div>

        <!-- Navigation Links -->
        <nav class="p-4 space-y-6 text-xs font-medium">
            <!-- Section: Main Operations -->
            <div>
                <span class="px-3 text-[10px] uppercase tracking-[0.2em] text-zinc-500 font-semibold block mb-2">Operations</span>
                <div class="space-y-1">
                    <a href="dashboard.php" class="flex items-center gap-3 px-3 py-2.5 rounded-xl hover:bg-zinc-800 hover:text-white transition-colors">
                        <i class="ri-dashboard-line text-base text-zinc-400"></i>
                        <span>Dashboard</span>
                    </a>
                    <a href="products.php" class="flex items-center gap-3 px-3 py-2.5 rounded-xl hover:bg-zinc-800 hover:text-white transition-colors">
                        <i class="ri-shopping-bag-3-line text-base text-zinc-400"></i>
                        <span>Products</span>
                    </a>
                    <a href="users.php" class="flex items-center gap-3 px-3 py-2.5 rounded-xl hover:bg-zinc-800 hover:text-white transition-colors">
                        <i class="ri-user-3-line text-base text-zinc-400"></i>
                        <span>Users</span>
                    </a>
                </div>
            </div>

            <!-- Section: Editorial Content -->
            <div>
                <span class="px-3 text-[10px] uppercase tracking-[0.2em] text-zinc-500 font-semibold block mb-2">Editorial &amp; CRM</span>
                <div class="space-y-1">
                    <a href="blog.php" class="flex items-center gap-3 px-3 py-2.5 rounded-xl hover:bg-zinc-800 hover:text-white transition-colors">
                        <i class="ri-article-line text-base text-zinc-400"></i>
                        <span>Journal / Blog</span>
                    </a>
                    <a href="team.php" class="flex items-center gap-3 px-3 py-2.5 rounded-xl hover:bg-zinc-800 hover:text-white transition-colors">
                        <i class="ri-team-line text-base text-zinc-400"></i>
                        <span>Design Team</span>
                    </a>
                    <a href="contacts.php" class="flex items-center gap-3 px-3 py-2.5 rounded-xl hover:bg-zinc-800 hover:text-white transition-colors">
                        <i class="ri-mail-line text-base text-zinc-400"></i>
                        <span>Inquiries</span>
                    </a>
                    <a href="subscribers.php" class="flex items-center gap-3 px-3 py-2.5 rounded-xl hover:bg-zinc-800 hover:text-white transition-colors">
                        <i class="ri-mail-add-line text-base text-zinc-400"></i>
                        <span>Subscribers</span>
                    </a>
                </div>
            </div>

            <!-- Section: System & Exit -->
            <div>
                <span class="px-3 text-[10px] uppercase tracking-[0.2em] text-zinc-500 font-semibold block mb-2">Portal Actions</span>
                <div class="space-y-1">
                    <a href="../index.php" target="_blank" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-zinc-400 hover:bg-zinc-800 hover:text-white transition-colors">
                        <i class="ri-external-link-line text-base"></i>
                        <span>View Storefront</span>
                    </a>
                    <a href="index.php" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-zinc-400 hover:bg-rose-950/60 hover:text-rose-300 transition-colors">
                        <i class="ri-logout-box-r-line text-base"></i>
                        <span>Sign Out</span>
                    </a>
                </div>
            </div>
        </nav>
    </div>

    <!-- Sidebar Footer -->
    <div class="p-4 border-t border-zinc-800 text-[11px] text-zinc-500">
        <p>FurnishMe Atelier v2.4</p>
        <p class="text-zinc-600 mt-0.5">Admin Control Panel</p>
    </div>
</aside>

<!-- Mobile Overlay Backdrop -->
<div id="admin__overlay" class="fixed inset-0 bg-zinc-950/50 backdrop-blur-xs z-40 hidden opacity-0 transition-opacity duration-300 lg:hidden"></div>
