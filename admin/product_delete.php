<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Atelier Product | FurnishMe Admin</title>
    <link rel="icon" type="image/x-icon" href="../images/favicon.ico">
    <?php include "components/css.php"; ?>
</head>

<body class="bg-[#0D0B09] text-[#EDE4D7] font-sans antialiased selection:bg-[#C5A059] selection:text-[#0D0B09]">
    <div class="min-h-screen flex">
        <?php include "components/sidebar.php"; ?>

        <div class="lg:pl-64 flex flex-col flex-1 min-w-0">
            <?php include "components/topbar.php"; ?>

            <main class="flex-1 p-4 sm:p-6 lg:p-8 max-w-3xl w-full mx-auto space-y-6">
                
                <!-- Heading -->
                <div class="flex items-center justify-between">
                    <div>
                        <div class="flex items-center gap-2 text-xs text-[#8C7D6B] mb-1">
                            <a href="dashboard.php" class="hover:text-[#FAF6EE]">Dashboard</a>
                            <span>/</span>
                            <a href="products.php" class="hover:text-[#FAF6EE]">Products</a>
                            <span>/</span>
                            <span class="text-rose-600 font-medium">Delete</span>
                        </div>
                        <h2 class="font-serif text-2xl sm:text-3xl font-medium text-[#FAF6EE]">Confirm Deletion</h2>
                    </div>
                    <a href="products.php" class="px-4 py-2 rounded-xl border border-[#2A231C] text-xs font-medium text-[#D6C8B4] hover:bg-white transition-colors">
                        Cancel
                    </a>
                </div>

                <!-- Confirmation Card -->
                <div class="bg-white rounded-3xl border border-rose-200 p-6 sm:p-10 shadow-xs">
                    <div class="flex items-start gap-4 p-4 rounded-2xl bg-rose-50 border border-rose-100 mb-6">
                        <i class="ri-error-warning-line text-2xl text-rose-600 flex-shrink-0 mt-0.5"></i>
                        <div>
                            <h3 class="text-sm font-semibold text-rose-900">Irreversible Action Warning</h3>
                            <p class="text-xs text-rose-700 mt-1 leading-relaxed">
                                Are you sure you wish to delete this piece from the catalog? Its associated images and sales listings will be removed.
                            </p>
                        </div>
                    </div>

                    <!-- Piece Details Summary -->
                    <!-- [PHP_BACKEND_HOOK: Query product by ID for deletion confirmation display (SELECT * FROM products WHERE id = :id)] -->
                    <div class="border border-[#2A231C] rounded-2xl p-5 mb-8 flex items-center gap-6">
                        <div class="w-20 h-20 rounded-xl bg-[#0D0B09] border border-[#2A231C] p-2 flex items-center justify-center flex-shrink-0">
                            <img src="../images/chair-1.jpg" alt="Lounge Armchair" class="max-h-full max-w-full object-contain">
                        </div>
                        <div class="space-y-1 text-xs">
                            <span class="text-stone-400 font-mono">Product #1</span>
                            <h4 class="font-serif text-base font-medium text-[#FAF6EE]">Sculptural Lounge Armchair</h4>
                            <p class="text-[#8C7D6B]">Price: <strong class="text-[#FAF6EE]">40,000 MMK</strong> • Stock: <strong>25 units</strong></p>
                        </div>
                    </div>

                    <!-- [PHP_BACKEND_HOOK: Product deletion handler. POST method, CSRF token verification, unlink associated image, execute DELETE FROM products WHERE id = :id] -->
                    <form method="POST" class="flex items-center justify-end gap-3 pt-4 border-t border-[#2A231C]">
                        <input type="hidden" name="id" value="1">
                        <a href="products.php" class="px-5 py-2.5 rounded-xl border border-[#2A231C] text-xs font-medium text-[#D6C8B4] hover:bg-[#0D0B09] transition-colors">
                            Cancel
                        </a>
                        <button type="submit" name="delete" class="px-5 py-2.5 rounded-xl bg-rose-600 hover:bg-rose-700 text-white text-xs font-medium transition-colors shadow-xs flex items-center gap-2">
                            <i class="ri-delete-bin-line text-sm"></i>
                            <span>Confirm &amp; Delete Piece</span>
                        </button>
                    </form>
                </div>

            </main>

            <?php include "components/footer.php"; ?>
        </div>
    </div>

    <?php include "components/js.php"; ?>
</body>

</html>
