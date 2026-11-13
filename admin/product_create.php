<?php
/**
 * ============================================================================
 * FURNISHME BACKEND INSTRUCTION GUIDELINE - CREATE PRODUCT
 * ============================================================================
 * FILE: admin/product_create.php
 * PURPOSE: Handles creation of new furniture catalog items, processes image
 *          uploads to the ../images/ directory, and inserts records into 'products'.
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
 * 3. Handle POST Request with File Upload (enctype="multipart/form-data"):
 *    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
 *        $name        = trim($_POST['name'] ?? '');
 *        $price       = (int)($_POST['price'] ?? 0);
 *        $stock       = (int)($_POST['stock'] ?? 0);
 *        $description = trim($_POST['description'] ?? '');
 *        $category    = trim($_POST['category'] ?? 'chairs');
 * 
 *        // Validation
 *        if (empty($name) || $price <= 0) {
 *            $error = "Please provide a valid product title and price.";
 *        } elseif (!isset($_FILES['image']) || $_FILES['image']['error'] !== UPLOAD_ERR_OK) {
 *            $error = "Please select a product photograph to upload.";
 *        } else {
 *            // Process Image Upload
 *            $ext = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
 *            $allowed_exts = ['jpg', 'jpeg', 'png', 'webp'];
 * 
 *            if (!in_array($ext, $allowed_exts)) {
 *                $error = "Only JPG, PNG, and WEBP image formats are supported.";
 *            } else {
 *                $unique_image_name = 'product-' . time() . '-' . rand(100, 999) . '.' . $ext;
 *                $target_destination = '../images/' . $unique_image_name;
 * 
 *                if (move_uploaded_file($_FILES['image']['tmp_name'], $target_destination)) {
 *                    // Insert into products table
 *                    $stmt = $connection->prepare("INSERT INTO products (name, price, stock, image, description, category) VALUES (?, ?, ?, ?, ?, ?)");
 *                    $stmt->bind_param("siisss", $name, $price, $stock, $unique_image_name, $description, $category);
 *                    
 *                    if ($stmt->execute()) {
 *                        $stmt->close();
 *                        header("Location: products.php?msg=created");
 *                        exit;
 *                    } else {
 *                        $error = "Database insertion failed: " . $connection->error;
 *                    }
 *                } else {
 *                    $error = "Failed to save uploaded image. Check folder permissions for ../images/";
 *                }
 *            }
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
    <title>Create Atelier Product | FurnishMe Admin</title>
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
                            <span class="text-[#FAF6EE] font-medium">New Piece</span>
                        </div>
                        <h2 class="font-serif text-2xl sm:text-3xl font-medium text-[#FAF6EE]">Add Furniture Piece</h2>
                    </div>
                    <a href="products.php" class="px-4 py-2 rounded-xl border border-[#2A231C] text-xs font-medium text-[#D6C8B4] hover:bg-white transition-colors">
                        Cancel &amp; Return
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
                         PHP BACKEND GUIDELINE: Product Creation Form
                         - Action: action="" (submits to self)
                         - Method: POST
                         - Enctype: multipart/form-data (Required for file upload)
                         ========================================================== -->
                    <form action="" method="POST" enctype="multipart/form-data" class="space-y-6">
                        
                        <!-- Name & Category -->
                        <div class="space-y-1.5">
                            <label for="name" class="block text-xs font-semibold uppercase tracking-wider text-[#D6C8B4]">
                                Product Title <span class="text-rose-600">*</span>
                            </label>
                            <input type="text" id="name" name="name" required value="<?= htmlspecialchars($_POST['name'] ?? '') ?>" placeholder="e.g. Sculptural Lounge Armchair" class="w-full px-4 py-3 bg-[#0D0B09] border border-[#2A231C] rounded-xl text-[#FAF6EE] text-sm placeholder-[#8C7D6B] focus:outline-none focus:ring-2 focus:ring-[#C5A059] focus:border-[#C5A059] transition-all">
                        </div>

                        <!-- Price and Stock Grid -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                            <div class="space-y-1.5">
                                <label for="price" class="block text-xs font-semibold uppercase tracking-wider text-[#D6C8B4]">
                                    Price in MMK <span class="text-rose-600">*</span>
                                </label>
                                <div class="relative">
                                    <span class="absolute left-4 top-1/2 -translate-y-1/2 text-xs font-semibold text-stone-400">MMK</span>
                                    <input type="number" step="1" id="price" name="price" required value="<?= htmlspecialchars($_POST['price'] ?? '') ?>" placeholder="40000" class="w-full pl-14 pr-4 py-3 bg-[#0D0B09] border border-[#2A231C] rounded-xl text-[#FAF6EE] text-sm placeholder-[#8C7D6B] focus:outline-none focus:ring-2 focus:ring-[#C5A059] focus:border-[#C5A059] transition-all">
                                </div>
                            </div>

                            <div class="space-y-1.5">
                                <label for="stock" class="block text-xs font-semibold uppercase tracking-wider text-[#D6C8B4]">
                                    Initial Inventory Count <span class="text-rose-600">*</span>
                                </label>
                                <input type="number" id="stock" name="stock" required value="<?= htmlspecialchars($_POST['stock'] ?? '25') ?>" placeholder="e.g. 25" class="w-full px-4 py-3 bg-[#0D0B09] border border-[#2A231C] rounded-xl text-[#FAF6EE] text-sm placeholder-[#8C7D6B] focus:outline-none focus:ring-2 focus:ring-[#C5A059] focus:border-[#C5A059] transition-all">
                            </div>
                        </div>

                        <!-- Image Dropzone / Upload -->
                        <div class="space-y-1.5">
                            <label class="block text-xs font-semibold uppercase tracking-wider text-[#D6C8B4]">
                                Atelier Photograph <span class="text-rose-600">*</span>
                            </label>
                            <div class="border-2 border-dashed border-[#2A231C] rounded-2xl p-6 text-center hover:border-amber-800 transition-colors bg-[#0D0B09]">
                                <div class="max-w-xs mx-auto flex flex-col items-center">
                                    <i class="ri-image-add-line text-3xl text-[#C5A059] mb-2"></i>
                                    <span class="text-xs font-medium text-[#D6C8B4]">Select product imagery</span>
                                    <span class="text-[11px] text-stone-400 mt-0.5">PNG, JPG, or WEBP with authentic studio lighting</span>
                                    <input type="file" id="image" name="image" accept="image/*" required data-preview-target="product-preview" class="mt-4 text-xs text-[#8C7D6B] file:mr-3 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-medium file:bg-stone-900 file:text-white hover:file:bg-amber-900 file:cursor-pointer cursor-pointer">
                                </div>
                                <div class="mt-4 flex justify-center">
                                    <img id="product-preview" src="" alt="Image preview" class="hidden w-28 h-28 object-contain rounded-xl border border-[#2A231C] bg-white p-2">
                                </div>
                            </div>
                        </div>

                        <!-- Description -->
                        <div class="space-y-1.5">
                            <label for="description" class="block text-xs font-semibold uppercase tracking-wider text-[#D6C8B4]">
                                Piece Narrative &amp; Specifications
                            </label>
                            <textarea id="description" name="description" rows="4" placeholder="Detail the timber source, joinery style, finish oils, and ergonomic proportions..." class="w-full p-4 bg-[#0D0B09] border border-[#2A231C] rounded-xl text-[#FAF6EE] text-sm placeholder-[#8C7D6B] focus:outline-none focus:ring-2 focus:ring-[#C5A059] focus:border-[#C5A059] transition-all"><?= htmlspecialchars($_POST['description'] ?? '') ?></textarea>
                        </div>

                        <!-- Form Actions -->
                        <div class="pt-4 border-t border-[#2A231C] flex items-center justify-end gap-3">
                            <a href="products.php" class="px-5 py-3 rounded-xl border border-[#2A231C] text-xs font-medium text-[#D6C8B4] hover:bg-[#0D0B09] transition-colors">
                                Cancel
                            </a>
                            <button type="submit" name="submit" class="px-6 py-3 rounded-xl bg-[#C5A059] hover:bg-[#D4AF37] text-[#0D0B09] text-xs font-semibold transition-colors shadow-xs flex items-center gap-2">
                                <i class="ri-check-line text-base"></i>
                                <span>Save &amp; Publish Piece</span>
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
