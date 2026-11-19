<?php
// Initialize session
require_once __DIR__ . '/../components/session_start.php';

// Check session
require_once __DIR__ . '/components/session_check.php';

// Connect database
require_once __DIR__ . '/../components/connection.php';

$categories = [
    'chairs' => 'Chairs & Seating',
    'sofas' => 'Sofas & Lounge',
    'tables' => 'Tables & Desks',
    'beds' => 'Beds & Tatami',
    'objects' => 'Lighting & Objects',
];

$sql = 'SELECT * FROM products ORDER BY id DESC';
$stmt = $pdo->prepare($sql);
$stmt->execute();
$products = $stmt->fetchAll();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products Management | Yangon Atelier Admin</title>
    <link rel="icon" type="image/x-icon" href="../images/favicon/favicon.ico">
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

                <!-- Products Table Card in Raw Linen (#F6F3EE) -->
                <div class="bg-[#F6F3EE] rounded-3xl border border-[#C9C0B3] overflow-hidden shadow-xs">
                    <div class="p-5 border-b border-[#C9C0B3] flex flex-col sm:flex-row sm:items-center justify-between gap-3">
                        <div class="text-xs text-[#6E6359]">
                            Showing <strong><?= count($products); ?></strong> catalog pieces
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

                                <?php if (!empty($products)): ?>
                                    <?php foreach ($products as $product): ?>
                                        <!-- Item 1 -->
                                        <tr class="hover:bg-[#DFD8CD]/40 transition-colors">
                                            <td class="py-4 px-6 text-[#6E6359]">#<?= htmlspecialchars($product['id']); ?></td>
                                            <td class="py-4 px-6">
                                                <div class="w-14 h-11 rounded-xl bg-[#EDE8E0] border border-[#C9C0B3] overflow-hidden flex items-center justify-center">
                                                    <img src="../media/<?= htmlspecialchars($product['image']); ?>" alt="<?= htmlspecialchars($product['name']); ?>" class="w-full h-full object-cover">
                                                </div>
                                            </td>
                                            <td class="py-4 px-6">
                                                <span class="font-semibold text-[#362F2A] block text-sm"><?= htmlspecialchars($product['name']); ?></span>
                                                <span class="text-[11px] text-[#8A5A44]"><?= htmlspecialchars($categories[$product['category']] ?? ucfirst(htmlspecialchars($product['category']) ?? 'Uncategorized')); ?></span>
                                            </td>
                                            <td class="py-4 px-6 font-semibold text-[#362F2A]"><?= number_format((int)$product['price']); ?> MMK</td>
                                            <td class="py-4 px-6">
                                                <?php if ((int)$product['stock'] > 0): ?>
                                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[11px] font-semibold text-[#3F624D] bg-[#DCE5DF] border border-[#C6D6CB]">
                                                        <?= (int)$product['stock']; ?> In Stock
                                                    </span>
                                                <?php else: ?>
                                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[11px] font-semibold text-[#8C3B3B] bg-[#EFE0E0] border border-[#DFC8C8]">
                                                        Out of Stock
                                                    </span>
                                                <?php endif; ?>
                                            </td>
                                            <td class="py-4 px-6 text-right">
                                                <div class="inline-flex items-center gap-2">
                                                    <a href="product_update.php?id=<?= (int)$product['id']; ?>" class="px-2.5 py-1 rounded-lg border border-[#C9C0B3] bg-[#DFD8CD] hover:bg-[#D5CDC1] text-[#8A5A44] font-semibold transition-colors flex items-center gap-1">
                                                        <i class="ri-pencil-line"></i> Edit
                                                    </a>
                                                    <a href="product_delete.php?id=<?= (int)$product['id']; ?>" class="px-2.5 py-1 rounded-lg border border-[#DFC8C8] bg-[#EFE0E0] hover:bg-[#E5D0D0] text-[#8C3B3B] font-semibold transition-colors flex items-center gap-1">
                                                        <i class="ri-delete-bin-line"></i> Delete
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="6" class="py-12 text-center text-[#6E6359]">
                                            <i class="ri-article-line text-3xl mb-2 block text-[#C9C0B3]"></i>
                                            <p class="font-medium">No furniture pieces found in the catalog.</p>
                                            <a href="blog_create.php" class="inline-block mt-2 text-[#8A5A44] hover:underline font-semibold">Add your first piece &rarr;</a>
                                        </td>
                                    </tr>
                                <?php endif; ?>

                            </tbody>
                        </table>
                    </div>
                </div>

            </main>

            <?php include "components/footer.php"; ?>
        </div>
    </div>

    <script src="js/script.js"></script>
    <script src="../js/script.js"></script>

    <?php if (isset($_SESSION['success'])): ?>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                showToast(<?= json_encode($_SESSION['success']); ?>, 'success');
            });
        </script>
        <?php unset($_SESSION['success']); ?>
    <?php endif; ?>

    <?php if (isset($_SESSION['error'])): ?>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                showToast(<?= json_encode($_SESSION['error']); ?>, 'error');
            });
        </script>
        <?php unset($_SESSION['error']); ?>
    <?php endif; ?>
</body>

</html>