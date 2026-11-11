<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products Management | FurnishMe Atelier Admin</title>
    <link rel="icon" href="../images/favicon.ico">
    <?php include "components/css.php"; ?>
</head>

<body class="bg-[#FAFAFA] text-zinc-900 font-sans antialiased selection:bg-zinc-900 selection:text-white">
    <div class="min-h-screen flex">
        <?php include "components/sidebar.php"; ?>

        <div class="lg:pl-64 flex flex-col flex-1 min-w-0">
            <?php include "components/topbar.php"; ?>

            <main class="flex-1 p-4 sm:p-6 lg:p-8 max-w-7xl w-full mx-auto space-y-6">
                
                <!-- Page Action Header -->
                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                    <div>
                        <div class="flex items-center gap-2 text-xs text-zinc-500 mb-1">
                            <a href="dashboard.php" class="hover:text-zinc-900">Dashboard</a>
                            <span>/</span>
                            <span class="text-zinc-800 font-medium">Products</span>
                        </div>
                        <h2 class="font-serif text-2xl sm:text-3xl font-medium text-zinc-900">Atelier Furniture Catalog</h2>
                    </div>
                    <a href="product_create.php" class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl bg-zinc-900 hover:bg-zinc-800 text-white text-xs font-medium transition-colors shadow-xs">
                        <i class="ri-add-line text-base"></i>
                        <span>Add New Piece</span>
                    </a>
                </div>

                <!-- Products Table Card -->
                <div class="bg-white rounded-3xl border border-zinc-200 overflow-hidden shadow-xs">
                    <div class="p-5 border-b border-zinc-100 flex flex-col sm:flex-row sm:items-center justify-between gap-3">
                        <div class="text-xs text-zinc-500">
                            Showing <strong>8</strong> catalog pieces
                        </div>
                        <div class="relative sm:w-64">
                            <i class="ri-search-line absolute left-3 top-1/2 -translate-y-1/2 text-zinc-400 text-xs"></i>
                            <input type="text" placeholder="Search catalog..." class="w-full pl-8 pr-3 py-1.5 bg-zinc-50 border border-zinc-200 rounded-lg text-xs placeholder-zinc-400 focus:outline-none focus:ring-1 focus:ring-zinc-900">
                        </div>
                    </div>

                    <!-- [PHP_BACKEND_HOOK: Dynamic products table loop: SELECT * FROM products ORDER BY id DESC. Use foreach($products as $product) to render: $product['id'], $product['image'], $product['name'], $product['price'], $product['stock']] -->
                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse text-xs">
                            <thead>
                                <tr class="bg-zinc-50/80 border-b border-zinc-200/80 text-zinc-500 uppercase tracking-wider font-semibold">
                                    <th class="py-3.5 px-6">ID</th>
                                    <th class="py-3.5 px-6">Piece Preview</th>
                                    <th class="py-3.5 px-6">Product Title</th>
                                    <th class="py-3.5 px-6">Price (MMK)</th>
                                    <th class="py-3.5 px-6">Stock Status</th>
                                    <th class="py-3.5 px-6 text-right">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-zinc-100 text-zinc-700 font-medium">
                                
                                <!-- Item 1 -->
                                <tr class="hover:bg-zinc-50/60 transition-colors">
                                    <td class="py-4 px-6 text-zinc-400">#1</td>
                                    <td class="py-4 px-6">
                                        <div class="w-14 h-11 rounded-xl bg-zinc-100 border border-zinc-200/80 overflow-hidden flex items-center justify-center">
                                            <img src="../images/product-1.png" alt="Nordic Armchair" class="w-full h-full object-cover">
                                        </div>
                                    </td>
                                    <td class="py-4 px-6">
                                        <span class="font-semibold text-zinc-900 block text-sm">Nordic Solid Wood Armchair</span>
                                        <span class="text-[11px] text-zinc-400">Chairs &amp; Seating</span>
                                    </td>
                                    <td class="py-4 px-6 font-semibold text-zinc-900">420,000 MMK</td>
                                    <td class="py-4 px-6">
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[11px] font-medium bg-emerald-50 text-emerald-700 border border-emerald-200">
                                            25 In Stock
                                        </span>
                                    </td>
                                    <td class="py-4 px-6 text-right">
                                        <div class="inline-flex items-center gap-2">
                                            <a href="product_update.php?id=1" class="px-2.5 py-1 rounded-lg border border-zinc-200 hover:bg-zinc-100 text-zinc-700 transition-colors flex items-center gap-1">
                                                <i class="ri-pencil-line"></i> Edit
                                            </a>
                                            <a href="product_delete.php?id=1" class="px-2.5 py-1 rounded-lg border border-rose-200 hover:bg-rose-50 text-rose-600 transition-colors flex items-center gap-1">
                                                <i class="ri-delete-bin-line"></i> Delete
                                            </a>
                                        </div>
                                    </td>
                                </tr>

                                <!-- Item 2 -->
                                <tr class="hover:bg-zinc-50/60 transition-colors">
                                    <td class="py-4 px-6 text-zinc-400">#2</td>
                                    <td class="py-4 px-6">
                                        <div class="w-14 h-11 rounded-xl bg-zinc-100 border border-zinc-200/80 overflow-hidden flex items-center justify-center">
                                            <img src="../images/product-2.png" alt="Curved Lounge Armchair" class="w-full h-full object-cover">
                                        </div>
                                    </td>
                                    <td class="py-4 px-6">
                                        <span class="font-semibold text-zinc-900 block text-sm">Curved Lounge Armchair</span>
                                        <span class="text-[11px] text-zinc-400">Lounge</span>
                                    </td>
                                    <td class="py-4 px-6 font-semibold text-zinc-900">580,000 MMK</td>
                                    <td class="py-4 px-6">
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[11px] font-medium bg-emerald-50 text-emerald-700 border border-emerald-200">
                                            50 In Stock
                                        </span>
                                    </td>
                                    <td class="py-4 px-6 text-right">
                                        <div class="inline-flex items-center gap-2">
                                            <a href="product_update.php?id=2" class="px-2.5 py-1 rounded-lg border border-zinc-200 hover:bg-zinc-100 text-zinc-700 transition-colors flex items-center gap-1">
                                                <i class="ri-pencil-line"></i> Edit
                                            </a>
                                            <a href="product_delete.php?id=2" class="px-2.5 py-1 rounded-lg border border-rose-200 hover:bg-rose-50 text-rose-600 transition-colors flex items-center gap-1">
                                                <i class="ri-delete-bin-line"></i> Delete
                                            </a>
                                        </div>
                                    </td>
                                </tr>

                                <!-- Item 3 -->
                                <tr class="hover:bg-zinc-50/60 transition-colors">
                                    <td class="py-4 px-6 text-zinc-400">#3</td>
                                    <td class="py-4 px-6">
                                        <div class="w-14 h-11 rounded-xl bg-zinc-100 border border-zinc-200/80 overflow-hidden flex items-center justify-center">
                                            <img src="../images/product-3.png" alt="Bouclé Modular Sofa" class="w-full h-full object-cover">
                                        </div>
                                    </td>
                                    <td class="py-4 px-6">
                                        <span class="font-semibold text-zinc-900 block text-sm">Bouclé Modular Sofa</span>
                                        <span class="text-[11px] text-zinc-400">Sofas</span>
                                    </td>
                                    <td class="py-4 px-6 font-semibold text-zinc-900">1,250,000 MMK</td>
                                    <td class="py-4 px-6">
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[11px] font-medium bg-amber-50 text-amber-700 border border-amber-200">
                                            8 Low Stock
                                        </span>
                                    </td>
                                    <td class="py-4 px-6 text-right">
                                        <div class="inline-flex items-center gap-2">
                                            <a href="product_update.php?id=3" class="px-2.5 py-1 rounded-lg border border-zinc-200 hover:bg-zinc-100 text-zinc-700 transition-colors flex items-center gap-1">
                                                <i class="ri-pencil-line"></i> Edit
                                            </a>
                                            <a href="product_delete.php?id=3" class="px-2.5 py-1 rounded-lg border border-rose-200 hover:bg-rose-50 text-rose-600 transition-colors flex items-center gap-1">
                                                <i class="ri-delete-bin-line"></i> Delete
                                            </a>
                                        </div>
                                    </td>
                                </tr>

                                <!-- Item 4 -->
                                <tr class="hover:bg-zinc-50/60 transition-colors">
                                    <td class="py-4 px-6 text-zinc-400">#4</td>
                                    <td class="py-4 px-6">
                                        <div class="w-14 h-11 rounded-xl bg-zinc-100 border border-zinc-200/80 overflow-hidden flex items-center justify-center">
                                            <img src="../images/product-4.png" alt="Solid Oak Table" class="w-full h-full object-cover">
                                        </div>
                                    </td>
                                    <td class="py-4 px-6">
                                        <span class="font-semibold text-zinc-900 block text-sm">Solid Natural Oak Table</span>
                                        <span class="text-[11px] text-zinc-400">Tables</span>
                                    </td>
                                    <td class="py-4 px-6 font-semibold text-zinc-900">890,000 MMK</td>
                                    <td class="py-4 px-6">
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[11px] font-medium bg-emerald-50 text-emerald-700 border border-emerald-200">
                                            14 In Stock
                                        </span>
                                    </td>
                                    <td class="py-4 px-6 text-right">
                                        <div class="inline-flex items-center gap-2">
                                            <a href="product_update.php?id=4" class="px-2.5 py-1 rounded-lg border border-zinc-200 hover:bg-zinc-100 text-zinc-700 transition-colors flex items-center gap-1">
                                                <i class="ri-pencil-line"></i> Edit
                                            </a>
                                            <a href="product_delete.php?id=4" class="px-2.5 py-1 rounded-lg border border-rose-200 hover:bg-rose-50 text-rose-600 transition-colors flex items-center gap-1">
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
