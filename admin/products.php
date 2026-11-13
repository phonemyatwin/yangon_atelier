<?php

/**
 * ============================================================================
 * FURNISHME BACKEND INSTRUCTION GUIDELINE - ADMIN PRODUCTS LIST
 * ============================================================================
 * FILE: admin/products.php
 * PURPOSE: Lists all products from the 'products' table, provides search filtering,
 *          and links to create, update, and delete actions.
 * ============================================================================
 */

// Initialize session
require_once __DIR__ . '/components/session_start.php';

// Check session
require_once __DIR__ . '/components/session_check.php';

// Connect database
require_once __DIR__ . '/components/connection.php';

if (!isset($_SESSION['admin_user'])) {
    header("Location: index.php");
    exit;
}

$success = '';
if (isset($_GET['msg'])) {
    if ($_GET['msg'] === 'created') $success = "Product piece created successfully.";
    if ($_GET['msg'] === 'updated') $success = "Product piece updated successfully.";
    if ($_GET['msg'] === 'deleted') $success = "Product piece deleted successfully.";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products Management | FurnishMe Atelier Admin</title>
    <link rel="icon" type="image/x-icon" href="../images/favicon.ico">
    <?php include "components/css.php"; ?>
</head>

<body class="bg-[#EDE8E0] text-[#362F2A] font-sans antialiased selection:bg-[#8A5A44] selection:text-[#F6F3EE]">
    <div class="min-h-screen flex">
        <?php include "components/sidebar.php"; ?>

        <div class="lg:pl-64 flex flex-col flex-1 min-w-0">
            <?php include "components/topbar.php"; ?>

            <main class="flex-1 p-4 sm:p-6 lg:p-8 max-w-7xl w-full mx-auto space-y-6">

                <!-- Page Action Header -->
                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                    <div>
                        <div class="flex items-center gap-2 text-xs text-[#6E6359] mb-1">
                            <a href="dashboard.php" class="hover:text-[#362F2A] transition-colors">Dashboard</a>
                            <span>/</span>
                            <span class="text-[#362F2A] font-medium">Products</span>
                        </div>
                        <h2 class="font-serif text-2xl sm:text-3xl font-medium text-[#362F2A]">Atelier Furniture Catalog</h2>
                    </div>
                    <a href="product_create.php" class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl bg-[#8A5A44] hover:bg-[#704735] text-[#F6F3EE] font-semibold text-xs transition-colors shadow-xs">
                        <i class="ri-add-line text-base"></i>
                        <span>Add New Piece</span>
                    </a>
                </div>

                <!-- Success Notification Banner -->
                <?php if (!empty($success)): ?>
                    <div class="p-4 rounded-2xl bg-[#DCE5DF] border border-[#C6D6CB] text-[#3F624D] text-xs flex items-center gap-2.5">
                        <i class="ri-checkbox-circle-line text-lg flex-shrink-0"></i>
                        <span><?= htmlspecialchars($success) ?></span>
                    </div>
                <?php endif; ?>

                <!-- Products Table Card in Raw Linen (#F6F3EE) -->
                <div class="bg-[#F6F3EE] rounded-3xl border border-[#C9C0B3] overflow-hidden shadow-xs">
                    <div class="p-5 border-b border-[#C9C0B3] flex flex-col sm:flex-row sm:items-center justify-between gap-3">
                        <div class="text-xs text-[#6E6359]">
                            Showing <strong>8</strong> catalog pieces
                        </div>
                        <div class="relative sm:w-64">
                            <i class="ri-search-line absolute left-3 top-1/2 -translate-y-1/2 text-[#6E6359] text-xs"></i>
                            <input type="text" placeholder="Search catalog..." class="w-full pl-8 pr-3 py-1.5 bg-[#EDE8E0] border border-[#C9C0B3] rounded-lg text-xs text-[#362F2A] placeholder-[#6E6359] focus:outline-none focus:ring-1 focus:ring-[#8A5A44]">
                        </div>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse text-xs">
                            <thead>
                                <tr class="bg-[#DFD8CD] border-b border-[#C9C0B3] text-[#362F2A] uppercase tracking-wider font-semibold">
                                    <th class="py-3.5 px-6">ID</th>
                                    <th class="py-3.5 px-6">Piece Preview</th>
                                    <th class="py-3.5 px-6">Product Title</th>
                                    <th class="py-3.5 px-6">Price (MMK)</th>
                                    <th class="py-3.5 px-6">Stock Status</th>
                                    <th class="py-3.5 px-6 text-right">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-[#C9C0B3] text-[#6E6359] font-medium">

                                <!-- Item 1 -->
                                <tr class="hover:bg-[#DFD8CD]/40 transition-colors">
                                    <td class="py-4 px-6 text-[#6E6359]">#1</td>
                                    <td class="py-4 px-6">
                                        <div class="w-14 h-11 rounded-xl bg-[#EDE8E0] border border-[#C9C0B3] overflow-hidden flex items-center justify-center">
                                            <img src="../images/chair-1.jpg" alt="Nordic Solid Wood Armchair" class="w-full h-full object-cover">
                                        </div>
                                    </td>
                                    <td class="py-4 px-6">
                                        <span class="font-semibold text-[#362F2A] block text-sm">Nordic Solid Wood Armchair</span>
                                        <span class="text-[11px] text-[#8A5A44]">Chairs &amp; Seating</span>
                                    </td>
                                    <td class="py-4 px-6 font-semibold text-[#362F2A]">420,000 MMK</td>
                                    <td class="py-4 px-6">
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[11px] font-semibold text-[#3F624D] bg-[#DCE5DF] border border-[#C6D6CB]">
                                            25 In Stock
                                        </span>
                                    </td>
                                    <td class="py-4 px-6 text-right">
                                        <div class="inline-flex items-center gap-2">
                                            <a href="product_update.php?id=1" class="px-2.5 py-1 rounded-lg border border-[#C9C0B3] bg-[#DFD8CD] hover:bg-[#D5CDC1] text-[#8A5A44] font-semibold transition-colors flex items-center gap-1">
                                                <i class="ri-pencil-line"></i> Edit
                                            </a>
                                            <a href="product_delete.php?id=1" class="px-2.5 py-1 rounded-lg border border-[#DFC8C8] bg-[#EFE0E0] hover:bg-[#E5D0D0] text-[#8C3B3B] font-semibold transition-colors flex items-center gap-1">
                                                <i class="ri-delete-bin-line"></i> Delete
                                            </a>
                                        </div>
                                    </td>
                                </tr>

                                <!-- Item 2 -->
                                <tr class="hover:bg-[#DFD8CD]/40 transition-colors">
                                    <td class="py-4 px-6 text-[#6E6359]">#2</td>
                                    <td class="py-4 px-6">
                                        <div class="w-14 h-11 rounded-xl bg-[#EDE8E0] border border-[#C9C0B3] overflow-hidden flex items-center justify-center">
                                            <img src="../images/chair-2.jpg" alt="Curved Lounge Armchair" class="w-full h-full object-cover">
                                        </div>
                                    </td>
                                    <td class="py-4 px-6">
                                        <span class="font-semibold text-[#362F2A] block text-sm">Curved Lounge Armchair</span>
                                        <span class="text-[11px] text-[#8A5A44]">Lounge &amp; Seating</span>
                                    </td>
                                    <td class="py-4 px-6 font-semibold text-[#362F2A]">580,000 MMK</td>
                                    <td class="py-4 px-6">
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[11px] font-semibold text-[#3F624D] bg-[#DCE5DF] border border-[#C6D6CB]">
                                            50 In Stock
                                        </span>
                                    </td>
                                    <td class="py-4 px-6 text-right">
                                        <div class="inline-flex items-center gap-2">
                                            <a href="product_update.php?id=2" class="px-2.5 py-1 rounded-lg border border-[#C9C0B3] bg-[#DFD8CD] hover:bg-[#D5CDC1] text-[#8A5A44] font-semibold transition-colors flex items-center gap-1">
                                                <i class="ri-pencil-line"></i> Edit
                                            </a>
                                            <a href="product_delete.php?id=2" class="px-2.5 py-1 rounded-lg border border-[#DFC8C8] bg-[#EFE0E0] hover:bg-[#E5D0D0] text-[#8C3B3B] font-semibold transition-colors flex items-center gap-1">
                                                <i class="ri-delete-bin-line"></i> Delete
                                            </a>
                                        </div>
                                    </td>
                                </tr>

                                <!-- Item 3 -->
                                <tr class="hover:bg-[#DFD8CD]/40 transition-colors">
                                    <td class="py-4 px-6 text-[#6E6359]">#3</td>
                                    <td class="py-4 px-6">
                                        <div class="w-14 h-11 rounded-xl bg-[#EDE8E0] border border-[#C9C0B3] overflow-hidden flex items-center justify-center">
                                            <img src="../images/sofa-1.jpg" alt="Bouclé Modular Sofa" class="w-full h-full object-cover">
                                        </div>
                                    </td>
                                    <td class="py-4 px-6">
                                        <span class="font-semibold text-[#362F2A] block text-sm">Bouclé Modular Sofa</span>
                                        <span class="text-[11px] text-[#8A5A44]">Sofas &amp; Sectionals</span>
                                    </td>
                                    <td class="py-4 px-6 font-semibold text-[#362F2A]">1,250,000 MMK</td>
                                    <td class="py-4 px-6">
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[11px] font-semibold text-[#8C5327] bg-[#EFE2D5] border border-[#E0CFBF]">
                                            8 Low Stock
                                        </span>
                                    </td>
                                    <td class="py-4 px-6 text-right">
                                        <div class="inline-flex items-center gap-2">
                                            <a href="product_update.php?id=3" class="px-2.5 py-1 rounded-lg border border-[#C9C0B3] bg-[#DFD8CD] hover:bg-[#D5CDC1] text-[#8A5A44] font-semibold transition-colors flex items-center gap-1">
                                                <i class="ri-pencil-line"></i> Edit
                                            </a>
                                            <a href="product_delete.php?id=3" class="px-2.5 py-1 rounded-lg border border-[#DFC8C8] bg-[#EFE0E0] hover:bg-[#E5D0D0] text-[#8C3B3B] font-semibold transition-colors flex items-center gap-1">
                                                <i class="ri-delete-bin-line"></i> Delete
                                            </a>
                                        </div>
                                    </td>
                                </tr>

                                <!-- Item 4 -->
                                <tr class="hover:bg-[#DFD8CD]/40 transition-colors">
                                    <td class="py-4 px-6 text-[#6E6359]">#4</td>
                                    <td class="py-4 px-6">
                                        <div class="w-14 h-11 rounded-xl bg-[#EDE8E0] border border-[#C9C0B3] overflow-hidden flex items-center justify-center">
                                            <img src="../images/table-1.jpg" alt="Solid Natural Oak Dining Table" class="w-full h-full object-cover">
                                        </div>
                                    </td>
                                    <td class="py-4 px-6">
                                        <span class="font-semibold text-[#362F2A] block text-sm">Solid Natural Oak Dining Table</span>
                                        <span class="text-[11px] text-[#8A5A44]">Dining Tables</span>
                                    </td>
                                    <td class="py-4 px-6 font-semibold text-[#362F2A]">890,000 MMK</td>
                                    <td class="py-4 px-6">
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[11px] font-semibold text-[#3F624D] bg-[#DCE5DF] border border-[#C6D6CB]">
                                            14 In Stock
                                        </span>
                                    </td>
                                    <td class="py-4 px-6 text-right">
                                        <div class="inline-flex items-center gap-2">
                                            <a href="product_update.php?id=4" class="px-2.5 py-1 rounded-lg border border-[#C9C0B3] bg-[#DFD8CD] hover:bg-[#D5CDC1] text-[#8A5A44] font-semibold transition-colors flex items-center gap-1">
                                                <i class="ri-pencil-line"></i> Edit
                                            </a>
                                            <a href="product_delete.php?id=4" class="px-2.5 py-1 rounded-lg border border-[#DFC8C8] bg-[#EFE0E0] hover:bg-[#E5D0D0] text-[#8C3B3B] font-semibold transition-colors flex items-center gap-1">
                                                <i class="ri-delete-bin-line"></i> Delete
                                            </a>
                                        </div>
                                    </td>
                                </tr>

                                <!-- Item 5 -->
                                <tr class="hover:bg-[#DFD8CD]/40 transition-colors">
                                    <td class="py-4 px-6 text-[#6E6359]">#5</td>
                                    <td class="py-4 px-6">
                                        <div class="w-14 h-11 rounded-xl bg-[#EDE8E0] border border-[#C9C0B3] overflow-hidden flex items-center justify-center">
                                            <img src="../images/bed-1.jpg" alt="Upholstered Platform Bed" class="w-full h-full object-cover">
                                        </div>
                                    </td>
                                    <td class="py-4 px-6">
                                        <span class="font-semibold text-[#362F2A] block text-sm">Upholstered Platform Bed</span>
                                        <span class="text-[11px] text-[#8A5A44]">Bedroom Architecture</span>
                                    </td>
                                    <td class="py-4 px-6 font-semibold text-[#362F2A]">1,480,000 MMK</td>
                                    <td class="py-4 px-6">
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[11px] font-semibold text-[#3F624D] bg-[#DCE5DF] border border-[#C6D6CB]">
                                            10 In Stock
                                        </span>
                                    </td>
                                    <td class="py-4 px-6 text-right">
                                        <div class="inline-flex items-center gap-2">
                                            <a href="product_update.php?id=5" class="px-2.5 py-1 rounded-lg border border-[#C9C0B3] bg-[#DFD8CD] hover:bg-[#D5CDC1] text-[#8A5A44] font-semibold transition-colors flex items-center gap-1">
                                                <i class="ri-pencil-line"></i> Edit
                                            </a>
                                            <a href="product_delete.php?id=5" class="px-2.5 py-1 rounded-lg border border-[#DFC8C8] bg-[#EFE0E0] hover:bg-[#E5D0D0] text-[#8C3B3B] font-semibold transition-colors flex items-center gap-1">
                                                <i class="ri-delete-bin-line"></i> Delete
                                            </a>
                                        </div>
                                    </td>
                                </tr>

                                <!-- Item 6 -->
                                <tr class="hover:bg-[#DFD8CD]/40 transition-colors">
                                    <td class="py-4 px-6 text-[#6E6359]">#6</td>
                                    <td class="py-4 px-6">
                                        <div class="w-14 h-11 rounded-xl bg-[#EDE8E0] border border-[#C9C0B3] overflow-hidden flex items-center justify-center">
                                            <img src="../images/table-3.jpg" alt="Marble Low Coffee Table" class="w-full h-full object-cover">
                                        </div>
                                    </td>
                                    <td class="py-4 px-6">
                                        <span class="font-semibold text-[#362F2A] block text-sm">Marble Low Coffee Table</span>
                                        <span class="text-[11px] text-[#8A5A44]">Coffee Tables</span>
                                    </td>
                                    <td class="py-4 px-6 font-semibold text-[#362F2A]">520,000 MMK</td>
                                    <td class="py-4 px-6">
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[11px] font-semibold text-[#3F624D] bg-[#DCE5DF] border border-[#C6D6CB]">
                                            18 In Stock
                                        </span>
                                    </td>
                                    <td class="py-4 px-6 text-right">
                                        <div class="inline-flex items-center gap-2">
                                            <a href="product_update.php?id=6" class="px-2.5 py-1 rounded-lg border border-[#C9C0B3] bg-[#DFD8CD] hover:bg-[#D5CDC1] text-[#8A5A44] font-semibold transition-colors flex items-center gap-1">
                                                <i class="ri-pencil-line"></i> Edit
                                            </a>
                                            <a href="product_delete.php?id=6" class="px-2.5 py-1 rounded-lg border border-[#DFC8C8] bg-[#EFE0E0] hover:bg-[#E5D0D0] text-[#8C3B3B] font-semibold transition-colors flex items-center gap-1">
                                                <i class="ri-delete-bin-line"></i> Delete
                                            </a>
                                        </div>
                                    </td>
                                </tr>

                                <!-- Item 7 -->
                                <tr class="hover:bg-[#DFD8CD]/40 transition-colors">
                                    <td class="py-4 px-6 text-[#6E6359]">#7</td>
                                    <td class="py-4 px-6">
                                        <div class="w-14 h-11 rounded-xl bg-[#EDE8E0] border border-[#C9C0B3] overflow-hidden flex items-center justify-center">
                                            <img src="../images/bed-2.jpg" alt="Japandi Low Tatami Bed" class="w-full h-full object-cover">
                                        </div>
                                    </td>
                                    <td class="py-4 px-6">
                                        <span class="font-semibold text-[#362F2A] block text-sm">Japandi Low Tatami Bed</span>
                                        <span class="text-[11px] text-[#8A5A44]">Low Platform Beds</span>
                                    </td>
                                    <td class="py-4 px-6 font-semibold text-[#362F2A]">1,850,000 MMK</td>
                                    <td class="py-4 px-6">
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[11px] font-semibold text-[#8C5327] bg-[#EFE2D5] border border-[#E0CFBF]">
                                            5 Low Stock
                                        </span>
                                    </td>
                                    <td class="py-4 px-6 text-right">
                                        <div class="inline-flex items-center gap-2">
                                            <a href="product_update.php?id=7" class="px-2.5 py-1 rounded-lg border border-[#C9C0B3] bg-[#DFD8CD] hover:bg-[#D5CDC1] text-[#8A5A44] font-semibold transition-colors flex items-center gap-1">
                                                <i class="ri-pencil-line"></i> Edit
                                            </a>
                                            <a href="product_delete.php?id=7" class="px-2.5 py-1 rounded-lg border border-[#DFC8C8] bg-[#EFE0E0] hover:bg-[#E5D0D0] text-[#8C3B3B] font-semibold transition-colors flex items-center gap-1">
                                                <i class="ri-delete-bin-line"></i> Delete
                                            </a>
                                        </div>
                                    </td>
                                </tr>

                                <!-- Item 8 -->
                                <tr class="hover:bg-[#DFD8CD]/40 transition-colors">
                                    <td class="py-4 px-6 text-[#6E6359]">#8</td>
                                    <td class="py-4 px-6">
                                        <div class="w-14 h-11 rounded-xl bg-[#EDE8E0] border border-[#C9C0B3] overflow-hidden flex items-center justify-center">
                                            <img src="../images/lamp-1.jpg" alt="Sculptural Ceramic Table Lamp" class="w-full h-full object-cover">
                                        </div>
                                    </td>
                                    <td class="py-4 px-6">
                                        <span class="font-semibold text-[#362F2A] block text-sm">Sculptural Ceramic Table Lamp</span>
                                        <span class="text-[11px] text-[#8A5A44]">Lighting &amp; Objects</span>
                                    </td>
                                    <td class="py-4 px-6 font-semibold text-[#362F2A]">195,000 MMK</td>
                                    <td class="py-4 px-6">
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[11px] font-semibold text-[#3F624D] bg-[#DCE5DF] border border-[#C6D6CB]">
                                            32 In Stock
                                        </span>
                                    </td>
                                    <td class="py-4 px-6 text-right">
                                        <div class="inline-flex items-center gap-2">
                                            <a href="product_update.php?id=8" class="px-2.5 py-1 rounded-lg border border-[#C9C0B3] bg-[#DFD8CD] hover:bg-[#D5CDC1] text-[#8A5A44] font-semibold transition-colors flex items-center gap-1">
                                                <i class="ri-pencil-line"></i> Edit
                                            </a>
                                            <a href="product_delete.php?id=8" class="px-2.5 py-1 rounded-lg border border-[#DFC8C8] bg-[#EFE0E0] hover:bg-[#E5D0D0] text-[#8C3B3B] font-semibold transition-colors flex items-center gap-1">
                                                <i class="ri-delete-bin-line"></i> Delete
                                            </a>
                                        </div>
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>

            </main>

            <?php include "components/footer.php"; ?>
        </div>
    </div>

    <?php include "components/js.php"; ?>
</body>

</html>