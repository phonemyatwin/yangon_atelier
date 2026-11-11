<!-- [PHP_BACKEND_HOOK: Sticky admin topbar with breadcrumb context and session user status] -->
<header class="sticky top-0 z-30 h-20 bg-white/95 backdrop-blur-md border-b border-stone-200 px-4 sm:px-6 lg:px-8 flex items-center justify-between">
    <div class="flex items-center gap-4">
        <!-- Mobile Sidebar Toggle -->
        <button type="button" id="sidebar-toggle" aria-label="Toggle admin sidebar" class="lg:hidden w-10 h-10 rounded-xl border border-stone-200 flex items-center justify-center text-stone-700 hover:bg-stone-100 transition-colors">
            <i class="ri-menu-2-line text-lg"></i>
        </button>

        <!-- Breadcrumb / Section Header -->
        <div class="flex flex-col">
            <div class="flex items-center gap-1.5 text-xs text-stone-400 font-medium">
                <a href="dashboard.php" class="hover:text-stone-700 transition-colors">Admin</a>
                <span>/</span>
                <span class="text-stone-700">Workspace</span>
            </div>
            <h1 class="font-serif text-lg sm:text-xl font-medium text-stone-900 leading-tight">FurnishMe Management</h1>
        </div>
    </div>

    <!-- Right Profile / Status Chip -->
    <div class="flex items-center gap-3">
        <a href="../index.php" target="_blank" class="hidden sm:inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg border border-stone-200 text-xs font-medium text-stone-700 hover:bg-stone-50 transition-colors" title="Preview public storefront">
            <i class="ri-store-2-line"></i>
            <span>Storefront</span>
        </a>

        <div class="flex items-center gap-2.5 pl-3 border-l border-stone-200">
            <div class="w-9 h-9 rounded-full bg-stone-900 text-stone-100 flex items-center justify-center font-serif text-xs font-semibold">
                AD
            </div>
            <div class="hidden sm:flex flex-col text-left">
                <span class="text-xs font-semibold text-stone-900 leading-none">Senior Curator</span>
                <span class="text-[10px] text-emerald-600 font-medium mt-0.5 flex items-center gap-1">
                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span> Online
                </span>
            </div>
        </div>
    </div>
</header>
