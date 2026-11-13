<?php
/**
 * ============================================================================
 * FURNISHME BACKEND INSTRUCTION GUIDELINE - ADMIN TOPBAR
 * ============================================================================
 * FILE: admin/components/topbar.php
 * PURPOSE: Global sticky admin top navigation bar, quick link to public storefront,
 *          and active logged-in administrator status display.
 * 
 * BACKEND LOGIC REQUIREMENTS:
 * 1. Admin Session Details:
 *    - Check $_SESSION['admin_user'] to render current logged-in administrator name.
 *    - Example:
 *      $admin_name = $_SESSION['admin_user']['name'] ?? 'Senior Curator';
 *      $admin_role = $_SESSION['admin_user']['role'] ?? 'Atelier Admin';
 *      $admin_initials = strtoupper(substr($admin_name, 0, 2));
 * ============================================================================
 */

$admin_name = $_SESSION['admin_user']['name'] ?? 'Senior Curator';
$admin_role = $_SESSION['admin_user']['role'] ?? 'Atelier Administrator';
$admin_initials = strtoupper(substr($admin_name, 0, 2));
?>
<header class="sticky top-0 z-30 h-20 bg-[#0D0B09]/95 backdrop-blur-md border-b border-[#221C16] px-4 sm:px-6 lg:px-8 flex items-center justify-between">
    <div class="flex items-center gap-4">
        <!-- Mobile Sidebar Toggle -->
        <button type="button" id="sidebar-toggle" aria-label="Toggle admin sidebar" class="lg:hidden w-10 h-10 rounded-xl border border-[#2A231C] flex items-center justify-center text-[#D6C8B4] hover:bg-[#1C1814] transition-colors">
            <i class="ri-menu-2-line text-lg"></i>
        </button>

        <!-- Breadcrumb / Section Header -->
        <div class="flex flex-col">
            <div class="flex items-center gap-1.5 text-xs text-[#8C7D6B] font-medium">
                <a href="dashboard.php" class="hover:text-[#FAF6EE] transition-colors">Admin</a>
                <span>/</span>
                <span class="text-[#D6C8B4]">Workspace</span>
            </div>
            <h1 class="font-serif text-lg sm:text-xl font-medium text-[#FAF6EE] leading-tight">FurnishMe Management</h1>
        </div>
    </div>

    <!-- Right Profile / Status Chip -->
    <div class="flex items-center gap-3">
        <a href="../index.php" target="_blank" class="hidden sm:inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg border border-[#2A231C] text-xs font-medium text-[#D6C8B4] hover:bg-[#1C1814] transition-colors" title="Preview public storefront">
            <i class="ri-store-2-line"></i>
            <span>Storefront</span>
        </a>

        <!-- ==================================================================
             PHP BACKEND GUIDELINE: Dynamic Admin Profile Chip
             Populate initials and name from administrator session
             ================================================================== -->
        <div class="flex items-center gap-2.5 pl-3 border-l border-[#2A231C]">
            <div class="w-9 h-9 rounded-full bg-[#C5A059] text-[#0D0B09] font-bold flex items-center justify-center font-serif text-xs font-semibold">
                <?= htmlspecialchars($admin_initials) ?>
            </div>
            <div class="hidden sm:flex flex-col text-left">
                <span class="text-xs font-semibold text-[#FAF6EE] leading-none"><?= htmlspecialchars($admin_name) ?></span>
                <span class="text-[10px] text-emerald-700 font-medium mt-0.5 flex items-center gap-1">
                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-600"></span> Online
                </span>
            </div>
        </div>
    </div>
</header>
