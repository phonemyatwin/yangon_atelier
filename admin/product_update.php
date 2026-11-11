<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Atelier Product | FurnishMe Admin</title>
    <link rel="icon" type="image/x-icon" href="../images/favicon.ico">
    <?php include "components/css.php"; ?>
</head>

<body class="bg-[#0D0B09] text-[#EDE4D7] font-sans antialiased selection:bg-[#C5A059] selection:text-[#0D0B09]">
    <div class="min-h-screen flex">
        <?php include "components/sidebar.php"; ?>

        <div class="lg:pl-64 flex flex-col flex-1 min-w-0">
            <?php include "components/topbar.php"; ?>

            <main class="flex-1 p-4 sm:p-6 lg:p-8 max-w-4xl w-full mx-auto space-y-6">
                
                <!-- Breadcrumbs & Heading -->
                <div class="flex items-center justify-between">
                    <div>
                        <div class="flex items-center gap-2 text-xs text-[#8C7D6B] mb-1">
                            <a href="dashboard.php" class="hover:text-[#FAF6EE]">Dashboard</a>
                            <span>/</span>
                            <a href="products.php" class="hover:text-[#FAF6EE]">Products</a>
                            <span>/</span>
                            <span class="text-[#FAF6EE] font-medium">Edit Piece</span>
                        </div>
                        <h2 class="font-serif text-2xl sm:text-3xl font-medium text-[#FAF6EE]">Edit Furniture Piece</h2>
                    </div>
                    <a href="products.php" class="px-4 py-2 rounded-xl border border-[#2A231C] text-xs font-medium text-[#D6C8B4] hover:bg-white transition-colors">
                        Back to List
                    </a>
                </div>

                <!-- Form Card -->
                <div class="bg-[#161310] rounded-3xl border border-[#2A231C] p-6 sm:p-10 shadow-xs">
                    <!-- [PHP_BACKEND_HOOK: Product update handler. Method: POST, enctype="multipart/form-data". Handle optional new image upload or preserve existing, UPDATE products SET name = :name, price = :price, stock = :stock, description = :description WHERE id = :id] -->
                    <form method="POST" enctype="multipart/form-data" class="space-y-6">
                        <input type="hidden" name="id" value="1">

                        <!-- Name -->
                        <div class="space-y-1.5">
                            <label for="name" class="block text-xs font-semibold uppercase tracking-wider text-[#D6C8B4]">
                                Product Title <span class="text-rose-600">*</span>
                            </label>
                            <input type="text" id="name" name="name" required value="Sculptural Lounge Armchair" class="w-full px-4 py-3 bg-[#0D0B09] border border-[#2A231C] rounded-xl text-[#FAF6EE] text-sm placeholder-[#8C7D6B] focus:outline-none focus:ring-2 focus:ring-[#C5A059] focus:border-[#C5A059] transition-all">
                        </div>

                        <!-- Price and Stock Grid -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                            <div class="space-y-1.5">
                                <label for="price" class="block text-xs font-semibold uppercase tracking-wider text-[#D6C8B4]">
                                    Price in MMK <span class="text-rose-600">*</span>
                                </label>
                                <div class="relative">
                                    <span class="absolute left-4 top-1/2 -translate-y-1/2 text-xs font-semibold text-stone-400">MMK</span>
                                    <input type="number" step="1" id="price" name="price" required value="40000" class="w-full pl-14 pr-4 py-3 bg-[#0D0B09] border border-[#2A231C] rounded-xl text-[#FAF6EE] text-sm placeholder-[#8C7D6B] focus:outline-none focus:ring-2 focus:ring-[#C5A059] focus:border-[#C5A059] transition-all">
                                </div>
                            </div>

                            <div class="space-y-1.5">
                                <label for="stock" class="block text-xs font-semibold uppercase tracking-wider text-[#D6C8B4]">
                                    Inventory Count <span class="text-rose-600">*</span>
                                </label>
                                <input type="number" id="stock" name="stock" required value="25" class="w-full px-4 py-3 bg-[#0D0B09] border border-[#2A231C] rounded-xl text-[#FAF6EE] text-sm placeholder-[#8C7D6B] focus:outline-none focus:ring-2 focus:ring-[#C5A059] focus:border-[#C5A059] transition-all">
                            </div>
                        </div>

                        <!-- Image File & Current Preview -->
                        <div class="space-y-1.5">
                            <label class="block text-xs font-semibold uppercase tracking-wider text-[#D6C8B4]">
                                Current Artwork &amp; Replacement
                            </label>
                            <div class="flex flex-col sm:flex-row items-center gap-6 p-4 rounded-2xl bg-[#0D0B09] border border-[#2A231C]">
                                <div class="w-24 h-24 rounded-xl bg-[#161310] border border-[#2A231C] p-2 flex items-center justify-center flex-shrink-0">
                                    <!-- [PHP_BACKEND_HOOK: Display current product image thumbnail] -->
                                    <img id="product-preview" src="../images/chair-1.jpg" alt="Current Piece" class="max-h-full max-w-full object-contain">
                                </div>
                                <div class="flex-1 space-y-1 text-center sm:text-left">
                                    <span class="text-xs font-medium text-[#FAF6EE] block">Replace Image (Optional)</span>
                                    <span class="text-[11px] text-stone-400 block">Leave empty to keep the current photograph.</span>
                                    <input type="file" id="image" name="image" accept="image/*" data-preview-target="product-preview" class="mt-2 text-xs text-[#8C7D6B] file:mr-3 file:py-1.5 file:px-3 file:rounded-lg file:border-0 file:text-xs file:font-medium file:bg-stone-900 file:text-white hover:file:bg-amber-900 file:cursor-pointer cursor-pointer">
                                </div>
                            </div>
                        </div>

                        <!-- Description -->
                        <div class="space-y-1.5">
                            <label for="description" class="block text-xs font-semibold uppercase tracking-wider text-[#D6C8B4]">
                                Piece Narrative &amp; Specifications
                            </label>
                            <textarea id="description" name="description" rows="4" class="w-full p-4 bg-[#0D0B09] border border-[#2A231C] rounded-xl text-[#FAF6EE] text-sm placeholder-[#8C7D6B] focus:outline-none focus:ring-2 focus:ring-[#C5A059] focus:border-[#C5A059] transition-all">The Sculptural Lounge Armchair merges Scandinavian ergonomic posture with the organic tranquility of Japanese joinery.</textarea>
                        </div>

                        <!-- Form Actions -->
                        <div class="pt-4 border-t border-[#2A231C] flex items-center justify-end gap-3">
                            <a href="products.php" class="px-5 py-3 rounded-xl border border-[#2A231C] text-xs font-medium text-[#D6C8B4] hover:bg-[#0D0B09] transition-colors">
                                Cancel
                            </a>
                            <button type="submit" name="update" class="px-6 py-3 rounded-xl bg-[#C5A059] hover:bg-[#D4AF37] text-[#0D0B09] font-semibold text-xs font-medium transition-colors shadow-xs flex items-center gap-2">
                                <i class="ri-save-line text-sm"></i>
                                <span>Save Changes</span>
                            </button>
                        </div>

                    </form>
                </div>

            </main>

            <?php include "components/footer.php"; ?>
        </div>
    </div>

    <?php include "components/js.php"; ?>
</body>

</html>
