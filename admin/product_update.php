<?php
/**
 * ============================================================================
 * FURNISHME BACKEND INSTRUCTION GUIDELINE - UPDATE PRODUCT
 * ============================================================================
 * FILE: admin/product_update.php
 * PURPOSE: Retrieves an existing product by ID, displays current values in the form,
 *          processes modifications (including optional new image replacement), and
 *          updates the 'products' database table.
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
 * 3. Validate and Query Existing Record:
 *    $id = isset($_GET['id']) ? (int)$_GET['id'] : (isset($_POST['id']) ? (int)$_POST['id'] : 0);
 *    if ($id <= 0) {
 *        header("Location: products.php");
 *        exit;
 *    }
 *    $stmt = $connection->prepare("SELECT * FROM products WHERE id = ? LIMIT 1");
 *    $stmt->bind_param("i", $id);
 *    $stmt->execute();
 *    $product = $stmt->get_result()->fetch_assoc();
 *    $stmt->close();
 *    if (!$product) {
 *        header("Location: products.php?error=not_found");
 *        exit;
 *    }
 * 
 * 4. Process POST Update:
 *    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
 *        $name        = trim($_POST['name'] ?? '');
 *        $price       = (int)($_POST['price'] ?? 0);
 *        $stock       = (int)($_POST['stock'] ?? 0);
 *        $description = trim($_POST['description'] ?? '');
 * 
 *        // Handle Optional Image Upload
 *        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
 *            $ext = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
 *            $new_image = 'product-' . time() . '-' . rand(100, 999) . '.' . $ext;
 *            move_uploaded_file($_FILES['image']['tmp_name'], '../images/' . $new_image);
 * 
 *            // Optional: delete old image file if needed
 *            // if (!empty($product['image']) && file_exists('../images/' . $product['image'])) { unlink('../images/' . $product['image']); }
 * 
 *            $update_stmt = $connection->prepare("UPDATE products SET name = ?, price = ?, stock = ?, image = ?, description = ? WHERE id = ?");
 *            $update_stmt->bind_param("siissi", $name, $price, $stock, $new_image, $description, $id);
 *        } else {
 *            // Preserve existing image
 *            $update_stmt = $connection->prepare("UPDATE products SET name = ?, price = ?, stock = ?, description = ? WHERE id = ?");
 *            $update_stmt->bind_param("siisi", $name, $price, $stock, $description, $id);
 *        }
 * 
 *        if ($update_stmt->execute()) {
 *            $update_stmt->close();
 *            header("Location: products.php?msg=updated");
 *            exit;
 *        } else {
 *            $error = "Failed to update piece: " . $connection->error;
 *        }
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

$error = '';
?>
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

                <!-- Error Notification Banner -->
                <?php if (!empty($error)): ?>
                    <div class="p-4 rounded-2xl bg-rose-950/60 border border-rose-800 text-rose-300 text-xs flex items-center gap-2.5">
                        <i class="ri-error-warning-line text-lg flex-shrink-0"></i>
                        <span><?= htmlspecialchars($error) ?></span>
                    </div>
                <?php endif; ?>

                <!-- Form Card -->
                <div class="bg-[#161310] rounded-3xl border border-[#2A231C] p-6 sm:p-10 shadow-xs">
                    <!-- ==========================================================
                         PHP BACKEND GUIDELINE: Product Update Form
                         - Action: action="" (submits to self)
                         - Method: POST
                         - Hidden input: <input type="hidden" name="id" value="<?= $product['id'] ?? 1 ?>">
                         - Prefill inputs with values from $product array
                         ========================================================== -->
                    <form action="" method="POST" enctype="multipart/form-data" class="space-y-6">
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
                                    <!-- PHP Guideline: src="../images/<?= htmlspecialchars($product['image'] ?? 'chair-1.jpg') ?>" -->
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
                            <textarea id="description" name="description" rows="4" class="w-full p-4 bg-[#0D0B09] border border-[#2A231C] rounded-xl text-[#FAF6EE] text-sm placeholder-[#8C7D6B] focus:outline-none focus:ring-2 focus:ring-[#C5A059] focus:border-[#C5A059] transition-all">Sculptural lounge armchair shaped from certified American walnut with hand-rubbed organic oil finish.</textarea>
                        </div>

                        <!-- Form Actions -->
                        <div class="pt-4 border-t border-[#2A231C] flex items-center justify-end gap-3">
                            <a href="products.php" class="px-5 py-3 rounded-xl border border-[#2A231C] text-xs font-medium text-[#D6C8B4] hover:bg-[#0D0B09] transition-colors">
                                Cancel
                            </a>
                            <button type="submit" name="update" class="px-6 py-3 rounded-xl bg-[#C5A059] hover:bg-[#D4AF37] text-[#0D0B09] text-xs font-semibold transition-colors shadow-xs flex items-center gap-2">
                                <i class="ri-save-line text-base"></i>
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
