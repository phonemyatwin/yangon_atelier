<?php
/**
 * ============================================================================
 * FURNISHME BACKEND INSTRUCTION GUIDELINE - ADMIN PRODUCTS LIST
 * ============================================================================
 * FILE: admin/products.php
 * PURPOSE: Lists all products from the 'products' table, provides search filtering,
 *          and links to create, update, and delete actions.
 * 
 * STEP-BY-STEP IMPLEMENTATION GUIDE:
 * 1. Initialize Session & Enforce Authentication Guard:
 *    if (session_status() === PHP_SESSION_NONE) { session_start(); }
 *    if (!isset($_SESSION['admin_user'])) {
 *        header("Location: index.php");
 *        exit;
 *    }
 * 
 * 2. Include Database Connection:
 *    require_once "../components/connection.php";
 * 
 * 3. Handle Flash Notifications from Actions:
 *    $msg = $_GET['msg'] ?? '';
 *    if ($msg === 'created') $success = "Product piece added successfully.";
 *    if ($msg === 'updated') $success = "Product piece updated successfully.";
 *    if ($msg === 'deleted') $success = "Product piece deleted successfully.";
 * 
 * 4. Query Products from Database:
 *    $search = trim($_GET['search'] ?? '');
 *    if (!empty($search)) {
 *        $stmt = $connection->prepare("SELECT * FROM products WHERE name LIKE ? OR category LIKE ? ORDER BY id DESC");
 *        $wildcard = "%$search%";
 *        $stmt->bind_param("ss", $wildcard, $wildcard);
 *        $stmt->execute();
 *        $products = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
 *    } else {
 *        $res = $connection->query("SELECT * FROM products ORDER BY id DESC");
 *        $products = $res ? $res->fetch_all(MYSQLI_ASSOC) : [];
 *    }
 * ============================================================================
 */

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

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

<body class="bg-[#0D0B09] text-[#EDE4D7] font-sans antialiased selection:bg-[#C5A059] selection:text-[#0D0B09]">
    <div class="min-h-screen flex">
        <?php include "components/sidebar.php"; ?>

        <div class="lg:pl-64 flex flex-col flex-1 min-w-0">
            <?php include "components/topbar.php"; ?>

            <main class="flex-1 p-4 sm:p-6 lg:p-8 max-w-7xl w-full mx-auto space-y-6">
                
                <!-- Page Action Header -->
                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                    <div>
                        <div class="flex items-center gap-2 text-xs text-[#8C7D6B] mb-1">
                            <a href="dashboard.php" class="hover:text-[#FAF6EE]">Dashboard</a>
                            <span>/</span>
                            <span class="text-[#FAF6EE] font-medium">Products</span>
                        </div>
                        <h2 class="font-serif text-2xl sm:text-3xl font-medium text-[#FAF6EE]">Atelier Furniture Catalog</h2>
                    </div>
                    <a href="product_create.php" class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl bg-[#C5A059] hover:bg-[#D4AF37] text-[#0D0B09] font-semibold text-xs font-medium transition-colors shadow-xs">
                        <i class="ri-add-line text-base"></i>
                        <span>Add New Piece</span>
                    </a>
                </div>

                <!-- ==============================================================
                     PHP BACKEND GUIDELINE: Success Notification Banner
                     ============================================================== -->
                <?php if (!empty($success)): ?>
                    <div class="p-4 rounded-2xl bg-emerald-950/60 border border-emerald-800 text-emerald-300 text-xs flex items-center gap-2.5">
                        <i class="ri-checkbox-circle-line text-lg flex-shrink-0"></i>
                        <span><?= htmlspecialchars($success) ?></span>
                    </div>
                <?php endif; ?>

                <!-- Products Table Card -->
                <div class="bg-[#161310] rounded-3xl border border-[#2A231C] overflow-hidden shadow-xs">
                    <div class="p-5 border-b border-[#2A231C] flex flex-col sm:flex-row sm:items-center justify-between gap-3">
                        <div class="text-xs text-[#8C7D6B]">
                            Showing <strong><?= count($products ?? []) ?></strong> catalog pieces
                        </div>
                        <div class="relative sm:w-64">
                            <i class="ri-search-line absolute left-3 top-1/2 -translate-y-1/2 text-stone-400 text-xs"></i>
                            <input type="text" placeholder="Search catalog..." class="w-full pl-8 pr-3 py-1.5 bg-[#0D0B09] border border-[#2A231C] rounded-lg text-xs placeholder-[#8C7D6B] focus:outline-none focus:ring-1 focus:ring-[#C5A059]">
                        </div>
                    </div>

                    <!-- ==========================================================
                         PHP BACKEND GUIDELINE: Dynamic Products Table Loop
                         Query: SELECT * FROM products ORDER BY id DESC
                         Loop through $products and output row markup:
                         <?php /*
                         if (!empty($products)) {
                             foreach ($products as $product) {
                                 ?>
                                 <tr class="hover:bg-[#161310] transition-colors">
                                     <td class="py-4 px-6 text-stone-400">#<?= $product['id'] ?></td>
                                     <td class="py-4 px-6">
                                         <div class="w-14 h-11 rounded-xl bg-[#0D0B09] border border-[#2A231C] overflow-hidden flex items-center justify-center">
                                             <img src="../images/<?= htmlspecialchars($product['image']) ?>" alt="<?= htmlspecialchars($product['name']) ?>" class="w-full h-full object-cover">
                                         </div>
                                     </td>
                                     <td class="py-4 px-6">
                                         <span class="font-semibold text-[#FAF6EE] block text-sm"><?= htmlspecialchars($product['name']) ?></span>
                                         <span class="text-[11px] text-[#C5A059]"><?= htmlspecialchars(ucfirst($product['category'] ?? 'General')) ?></span>
                                     </td>
                                     <td class="py-4 px-6 font-semibold text-[#FAF6EE]"><?= number_format($product['price']) ?> MMK</td>
                                     <td class="py-4 px-6">
                                         <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[11px] font-medium <?= $product['stock'] > 0 ? 'bg-emerald-50 text-emerald-700 border border-emerald-200' : 'bg-rose-50 text-rose-700 border border-rose-200' ?>">
                                             <?= (int)$product['stock'] ?> In Stock
                                         </span>
                                     </td>
                                     <td class="py-4 px-6 text-right">
                                         <div class="inline-flex items-center gap-2">
                                             <a href="product_update.php?id=<?= $product['id'] ?>" class="px-2.5 py-1 rounded-lg border border-[#2A231C] hover:bg-[#0D0B09] text-[#D6C8B4] transition-colors flex items-center gap-1">
                                                 <i class="ri-pencil-line"></i> Edit
                                             </a>
                                             <a href="product_delete.php?id=<?= $product['id'] ?>" class="px-2.5 py-1 rounded-lg border border-rose-200 hover:bg-rose-50 text-rose-600 transition-colors flex items-center gap-1">
                                                 <i class="ri-delete-bin-line"></i> Delete
                                             </a>
                                         </div>
                                     </td>
                                 </tr>
                                 <?php
                             }
                         } else {
                             echo '<tr><td colspan="6" class="py-8 text-center text-stone-400">No products found in catalog.</td></tr>';
                         }
                         */ ?>
                         ========================================================== -->
                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse text-xs">
                            <thead>
                                <tr class="bg-[#0D0B09] border-b border-[#2A231C] text-[#8C7D6B] uppercase tracking-wider font-semibold">
                                    <th class="py-3.5 px-6">ID</th>
                                    <th class="py-3.5 px-6">Piece Preview</th>
                                    <th class="py-3.5 px-6">Product Title</th>
                                    <th class="py-3.5 px-6">Price (MMK)</th>
                                    <th class="py-3.5 px-6">Stock Status</th>
                                    <th class="py-3.5 px-6 text-right">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-[#E2D8C9] text-[#D6C8B4] font-medium">
                                
                                <!-- Item 1 -->
                                <tr class="hover:bg-[#161310] transition-colors">
                                    <td class="py-4 px-6 text-stone-400">#1</td>
                                    <td class="py-4 px-6">
                                        <div class="w-14 h-11 rounded-xl bg-[#0D0B09] border border-[#2A231C] overflow-hidden flex items-center justify-center">
                                            <img src="../images/chair-1.jpg" alt="Nordic Solid Wood Armchair" class="w-full h-full object-cover">
                                        </div>
                                    </td>
                                    <td class="py-4 px-6">
                                        <span class="font-semibold text-[#FAF6EE] block text-sm">Nordic Solid Wood Armchair</span>
                                        <span class="text-[11px] text-[#C5A059]">Chairs &amp; Seating</span>
                                    </td>
                                    <td class="py-4 px-6 font-semibold text-[#FAF6EE]">420,000 MMK</td>
                                    <td class="py-4 px-6">
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[11px] font-medium bg-emerald-50 text-emerald-700 border border-emerald-200">
                                            25 In Stock
                                        </span>
                                    </td>
                                    <td class="py-4 px-6 text-right">
                                        <div class="inline-flex items-center gap-2">
                                            <a href="product_update.php?id=1" class="px-2.5 py-1 rounded-lg border border-[#2A231C] hover:bg-[#0D0B09] text-[#D6C8B4] transition-colors flex items-center gap-1">
                                                <i class="ri-pencil-line"></i> Edit
                                            </a>
                                            <a href="product_delete.php?id=1" class="px-2.5 py-1 rounded-lg border border-rose-200 hover:bg-rose-50 text-rose-600 transition-colors flex items-center gap-1">
                                                <i class="ri-delete-bin-line"></i> Delete
                                            </a>
                                        </div>
                                    </td>
                                </tr>

                                <!-- Item 2 -->
                                <tr class="hover:bg-[#161310] transition-colors">
                                    <td class="py-4 px-6 text-stone-400">#2</td>
                                    <td class="py-4 px-6">
                                        <div class="w-14 h-11 rounded-xl bg-[#0D0B09] border border-[#2A231C] overflow-hidden flex items-center justify-center">
                                            <img src="../images/chair-2.jpg" alt="Curved Lounge Armchair" class="w-full h-full object-cover">
                                        </div>
                                    </td>
                                    <td class="py-4 px-6">
                                        <span class="font-semibold text-[#FAF6EE] block text-sm">Curved Lounge Armchair</span>
                                        <span class="text-[11px] text-[#C5A059]">Lounge &amp; Seating</span>
                                    </td>
                                    <td class="py-4 px-6 font-semibold text-[#FAF6EE]">580,000 MMK</td>
                                    <td class="py-4 px-6">
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[11px] font-medium bg-emerald-50 text-emerald-700 border border-emerald-200">
                                            50 In Stock
                                        </span>
                                    </td>
                                    <td class="py-4 px-6 text-right">
                                        <div class="inline-flex items-center gap-2">
                                            <a href="product_update.php?id=2" class="px-2.5 py-1 rounded-lg border border-[#2A231C] hover:bg-[#0D0B09] text-[#D6C8B4] transition-colors flex items-center gap-1">
                                                <i class="ri-pencil-line"></i> Edit
                                            </a>
                                            <a href="product_delete.php?id=2" class="px-2.5 py-1 rounded-lg border border-rose-200 hover:bg-rose-50 text-rose-600 transition-colors flex items-center gap-1">
                                                <i class="ri-delete-bin-line"></i> Delete
                                            </a>
                                        </div>
                                    </td>
                                </tr>

                                <!-- Item 3 -->
                                <tr class="hover:bg-[#161310] transition-colors">
                                    <td class="py-4 px-6 text-stone-400">#3</td>
                                    <td class="py-4 px-6">
                                        <div class="w-14 h-11 rounded-xl bg-[#0D0B09] border border-[#2A231C] overflow-hidden flex items-center justify-center">
                                            <img src="../images/sofa-1.jpg" alt="Bouclé Modular Sofa" class="w-full h-full object-cover">
                                        </div>
                                    </td>
                                    <td class="py-4 px-6">
                                        <span class="font-semibold text-[#FAF6EE] block text-sm">Bouclé Modular Sofa</span>
                                        <span class="text-[11px] text-[#C5A059]">Sofas &amp; Sectionals</span>
                                    </td>
                                    <td class="py-4 px-6 font-semibold text-[#FAF6EE]">1,250,000 MMK</td>
                                    <td class="py-4 px-6">
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[11px] font-medium bg-amber-50 text-[#C5A059] border border-amber-200">
                                            8 Low Stock
                                        </span>
                                    </td>
                                    <td class="py-4 px-6 text-right">
                                        <div class="inline-flex items-center gap-2">
                                            <a href="product_update.php?id=3" class="px-2.5 py-1 rounded-lg border border-[#2A231C] hover:bg-[#0D0B09] text-[#D6C8B4] transition-colors flex items-center gap-1">
                                                <i class="ri-pencil-line"></i> Edit
                                            </a>
                                            <a href="product_delete.php?id=3" class="px-2.5 py-1 rounded-lg border border-rose-200 hover:bg-rose-50 text-rose-600 transition-colors flex items-center gap-1">
                                                <i class="ri-delete-bin-line"></i> Delete
                                            </a>
                                        </div>
                                    </td>
                                </tr>

                                <!-- Item 4 -->
                                <tr class="hover:bg-[#161310] transition-colors">
                                    <td class="py-4 px-6 text-stone-400">#4</td>
                                    <td class="py-4 px-6">
                                        <div class="w-14 h-11 rounded-xl bg-[#0D0B09] border border-[#2A231C] overflow-hidden flex items-center justify-center">
                                            <img src="../images/table-1.jpg" alt="Solid Natural Oak Dining Table" class="w-full h-full object-cover">
                                        </div>
                                    </td>
                                    <td class="py-4 px-6">
                                        <span class="font-semibold text-[#FAF6EE] block text-sm">Solid Natural Oak Dining Table</span>
                                        <span class="text-[11px] text-[#C5A059]">Dining Tables</span>
                                    </td>
                                    <td class="py-4 px-6 font-semibold text-[#FAF6EE]">890,000 MMK</td>
                                    <td class="py-4 px-6">
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[11px] font-medium bg-emerald-50 text-emerald-700 border border-emerald-200">
                                            14 In Stock
                                        </span>
                                    </td>
                                    <td class="py-4 px-6 text-right">
                                        <div class="inline-flex items-center gap-2">
                                            <a href="product_update.php?id=4" class="px-2.5 py-1 rounded-lg border border-[#2A231C] hover:bg-[#0D0B09] text-[#D6C8B4] transition-colors flex items-center gap-1">
                                                <i class="ri-pencil-line"></i> Edit
                                            </a>
                                            <a href="product_delete.php?id=4" class="px-2.5 py-1 rounded-lg border border-rose-200 hover:bg-rose-50 text-rose-600 transition-colors flex items-center gap-1">
                                                <i class="ri-delete-bin-line"></i> Delete
                                            </a>
                                        </div>
                                    </td>
                                </tr>

                                <!-- Item 5 -->
                                <tr class="hover:bg-[#161310] transition-colors">
                                    <td class="py-4 px-6 text-stone-400">#5</td>
                                    <td class="py-4 px-6">
                                        <div class="w-14 h-11 rounded-xl bg-[#0D0B09] border border-[#2A231C] overflow-hidden flex items-center justify-center">
                                            <img src="../images/bed-1.jpg" alt="Upholstered Platform Bed" class="w-full h-full object-cover">
                                        </div>
                                    </td>
                                    <td class="py-4 px-6">
                                        <span class="font-semibold text-[#FAF6EE] block text-sm">Upholstered Platform Bed</span>
                                        <span class="text-[11px] text-[#C5A059]">Bedroom Architecture</span>
                                    </td>
                                    <td class="py-4 px-6 font-semibold text-[#FAF6EE]">1,480,000 MMK</td>
                                    <td class="py-4 px-6">
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[11px] font-medium bg-emerald-50 text-emerald-700 border border-emerald-200">
                                            10 In Stock
                                        </span>
                                    </td>
                                    <td class="py-4 px-6 text-right">
                                        <div class="inline-flex items-center gap-2">
                                            <a href="product_update.php?id=5" class="px-2.5 py-1 rounded-lg border border-[#2A231C] hover:bg-[#0D0B09] text-[#D6C8B4] transition-colors flex items-center gap-1">
                                                <i class="ri-pencil-line"></i> Edit
                                            </a>
                                            <a href="product_delete.php?id=5" class="px-2.5 py-1 rounded-lg border border-rose-200 hover:bg-rose-50 text-rose-600 transition-colors flex items-center gap-1">
                                                <i class="ri-delete-bin-line"></i> Delete
                                            </a>
                                        </div>
                                    </td>
                                </tr>

                                <!-- Item 6 -->
                                <tr class="hover:bg-[#161310] transition-colors">
                                    <td class="py-4 px-6 text-stone-400">#6</td>
                                    <td class="py-4 px-6">
                                        <div class="w-14 h-11 rounded-xl bg-[#0D0B09] border border-[#2A231C] overflow-hidden flex items-center justify-center">
                                            <img src="../images/table-3.jpg" alt="Marble Low Coffee Table" class="w-full h-full object-cover">
                                        </div>
                                    </td>
                                    <td class="py-4 px-6">
                                        <span class="font-semibold text-[#FAF6EE] block text-sm">Marble Low Coffee Table</span>
                                        <span class="text-[11px] text-[#C5A059]">Coffee Tables</span>
                                    </td>
                                    <td class="py-4 px-6 font-semibold text-[#FAF6EE]">520,000 MMK</td>
                                    <td class="py-4 px-6">
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[11px] font-medium bg-emerald-50 text-emerald-700 border border-emerald-200">
                                            18 In Stock
                                        </span>
                                    </td>
                                    <td class="py-4 px-6 text-right">
                                        <div class="inline-flex items-center gap-2">
                                            <a href="product_update.php?id=6" class="px-2.5 py-1 rounded-lg border border-[#2A231C] hover:bg-[#0D0B09] text-[#D6C8B4] transition-colors flex items-center gap-1">
                                                <i class="ri-pencil-line"></i> Edit
                                            </a>
                                            <a href="product_delete.php?id=6" class="px-2.5 py-1 rounded-lg border border-rose-200 hover:bg-rose-50 text-rose-600 transition-colors flex items-center gap-1">
                                                <i class="ri-delete-bin-line"></i> Delete
                                            </a>
                                        </div>
                                    </td>
                                </tr>

                                <!-- Item 7 -->
                                <tr class="hover:bg-[#161310] transition-colors">
                                    <td class="py-4 px-6 text-stone-400">#7</td>
                                    <td class="py-4 px-6">
                                        <div class="w-14 h-11 rounded-xl bg-[#0D0B09] border border-[#2A231C] overflow-hidden flex items-center justify-center">
                                            <img src="../images/bed-2.jpg" alt="Japandi Low Tatami Bed" class="w-full h-full object-cover">
                                        </div>
                                    </td>
                                    <td class="py-4 px-6">
                                        <span class="font-semibold text-[#FAF6EE] block text-sm">Japandi Low Tatami Bed</span>
                                        <span class="text-[11px] text-[#C5A059]">Low Platform Beds</span>
                                    </td>
                                    <td class="py-4 px-6 font-semibold text-[#FAF6EE]">1,850,000 MMK</td>
                                    <td class="py-4 px-6">
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[11px] font-medium bg-amber-50 text-[#C5A059] border border-amber-200">
                                            5 Low Stock
                                        </span>
                                    </td>
                                    <td class="py-4 px-6 text-right">
                                        <div class="inline-flex items-center gap-2">
                                            <a href="product_update.php?id=7" class="px-2.5 py-1 rounded-lg border border-[#2A231C] hover:bg-[#0D0B09] text-[#D6C8B4] transition-colors flex items-center gap-1">
                                                <i class="ri-pencil-line"></i> Edit
                                            </a>
                                            <a href="product_delete.php?id=7" class="px-2.5 py-1 rounded-lg border border-rose-200 hover:bg-rose-50 text-rose-600 transition-colors flex items-center gap-1">
                                                <i class="ri-delete-bin-line"></i> Delete
                                            </a>
                                        </div>
                                    </td>
                                </tr>

                                <!-- Item 8 -->
                                <tr class="hover:bg-[#161310] transition-colors">
                                    <td class="py-4 px-6 text-stone-400">#8</td>
                                    <td class="py-4 px-6">
                                        <div class="w-14 h-11 rounded-xl bg-[#0D0B09] border border-[#2A231C] overflow-hidden flex items-center justify-center">
                                            <img src="../images/lamp-1.jpg" alt="Sculptural Ceramic Table Lamp" class="w-full h-full object-cover">
                                        </div>
                                    </td>
                                    <td class="py-4 px-6">
                                        <span class="font-semibold text-[#FAF6EE] block text-sm">Sculptural Ceramic Table Lamp</span>
                                        <span class="text-[11px] text-[#C5A059]">Lighting &amp; Objects</span>
                                    </td>
                                    <td class="py-4 px-6 font-semibold text-[#FAF6EE]">195,000 MMK</td>
                                    <td class="py-4 px-6">
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[11px] font-medium bg-emerald-50 text-emerald-700 border border-emerald-200">
                                            32 In Stock
                                        </span>
                                    </td>
                                    <td class="py-4 px-6 text-right">
                                        <div class="inline-flex items-center gap-2">
                                            <a href="product_update.php?id=8" class="px-2.5 py-1 rounded-lg border border-[#2A231C] hover:bg-[#0D0B09] text-[#D6C8B4] transition-colors flex items-center gap-1">
                                                <i class="ri-pencil-line"></i> Edit
                                            </a>
                                            <a href="product_delete.php?id=8" class="px-2.5 py-1 rounded-lg border border-rose-200 hover:bg-rose-50 text-rose-600 transition-colors flex items-center gap-1">
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
