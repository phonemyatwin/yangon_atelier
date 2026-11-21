<?php
require_once __DIR__ . '/../../components/functions.php';
$admin_name = $_SESSION['admin']['name'] ?? 'Senior Curator';
$admin_role = $_SESSION['admin']['role'] ?? 'Atelier Administrator';
$admin_initials = get_initial_name($admin_name);
?>
<header class="sticky top-0 z-30 h-20 bg-[#F6F3EE]/95 backdrop-blur-md border-b border-[#C9C0B3] px-4 sm:px-6 lg:px-8 flex items-center justify-between transition-all">
    <div class="flex items-center gap-4">
        <!-- Mobile Sidebar Toggle -->
        <button type="button" id="sidebar-toggle" aria-label="Toggle admin sidebar" class="lg:hidden w-10 h-10 rounded-xl border border-[#C9C0B3] flex items-center justify-center text-[#362F2A] hover:bg-[#DFD8CD] transition-colors">
            <i class="ri-menu-2-line text-lg"></i>
        </button>

        <!-- Breadcrumb / Section Header -->
        <div class="flex flex-col">
            <div class="flex items-center gap-1.5 text-xs text-[#6E6359] font-medium">
                <a href="dashboard.php" class="hover:text-[#362F2A] transition-colors">Admin</a>
                <span>/</span>
                <span class="text-[#362F2A]">Workspace</span>
            </div>
            <h1 class="font-serif text-lg sm:text-xl font-medium text-[#362F2A] leading-tight">Yangon Atelier Management</h1>
        </div>
    </div>

    <!-- Right Profile / Status Chip -->
    <div class="flex items-center gap-3">
        <a href="../index.php" target="_blank" class="hidden sm:inline-flex items-center gap-1.5 px-3 py-1.5 rounded-xl border border-[#C9C0B3] bg-[#F6F3EE] text-xs font-medium text-[#362F2A] hover:bg-[#DFD8CD] transition-colors" title="Preview public storefront">
            <i class="ri-store-2-line text-[#8A5A44]"></i>
            <span>Storefront</span>
        </a>

        <!-- Admin Profile Chip -->
        <div class="flex items-center gap-2.5 pl-3 border-l border-[#C9C0B3]">
            <div class="w-9 h-9 rounded-full bg-[#8A5A44] text-[#F6F3EE] font-bold flex items-center justify-center font-serif text-xs  shadow-xs">
                <?= htmlspecialchars($admin_initials) ?>
            </div>
            <div class="hidden sm:flex flex-col text-left">
                <span class="text-xs font-semibold text-[#362F2A] leading-none"><?= htmlspecialchars($admin_name) ?></span>
                <span class="text-[10px] text-[#3F624D] font-medium mt-0.5 flex items-center gap-1">
                    <span class="w-1.5 h-1.5 rounded-full bg-[#3F624D] animate-pulse"></span> Online
                </span>
            </div>
        </div>
    </div>
</header>