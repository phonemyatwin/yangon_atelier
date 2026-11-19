<?php
// Initialize session
require_once __DIR__ . '/../components/session_start.php';

// Check session
require_once __DIR__ . '/components/session_check.php';

// Connect database
require_once __DIR__ . '/../components/connection.php';

$id = $_GET['id'] ?? '';
if (empty($id) || !filter_var($id, FILTER_VALIDATE_INT)) {
    header('Location: products.php');
    exit;
}

try {
    $sql = "SELECT * FROM products WHERE id = :id LIMIT 1";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':id' => $id]);
    $product = $stmt->fetch();
} catch (PDOException $e) {
    error_log('Product fetch error: ' . $e->getMessage() . "\n", 3, __DIR__ . '/../error.log');
    $_SESSION['error'] = 'Unable to retrieve product information. Please try again later.';
    header('Location: products.php');
    exit;
}

if (!$product) {
    $_SESSION['error'] = 'Product not found.';
    header('Location: products.php');
    exit;
}

$categories = [
    'chairs' => 'Chairs & Seating',
    'sofas' => 'Sofas & Lounge',
    'tables' => 'Tables & Desks',
    'beds' => 'Beds & Tatami',
    'objects' => 'Lighting & Objects'
];
$errors = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update'])) {
    $name = trim($_POST['name']) ?? $product['name'];
    $price = trim($_POST['price']) ?? $product['price'];
    $stock = trim($_POST['stock']) ?? $product['stock'];
    $category = trim($_POST['category']) ?? $product['category'];
    $old_image = $product['image'];
    $new_image =  $_FILES['image']['name'] ?? '';
    $description = trim($_POST['description']) ?? $product['description'];

    if (empty($name) || empty($price) || $stock === '' || empty($category)) {
        $errors['product'] = 'All fields are required. Please complete the form.';
    } else {
        if (!is_numeric($price) || $price < 0) {
            $errors['price'] = 'Please enter a valid price.';
        }

        if (filter_var($stock, FILTER_VALIDATE_INT) === false || $stock < 0) {
            $errors['stock'] = 'Please enter a valid inventory count.';
        }

        if (!array_key_exists($category, $categories)) {
            $errors['category'] = 'Please select a valid category.';
        }

        if (!empty($new_image)) {
            $allowed_extensions = ['jpg', 'jpeg', 'png', 'webp'];
            $extension = strtolower(pathinfo($new_image, PATHINFO_EXTENSION));
            if (!in_array($extension, $allowed_extensions)) {
                $errors['extension'] = 'Only JPG, JPEG, PNG, and WEBP image files are allowed.';
            } elseif (!isset($_FILES['image']) || $_FILES['image']['error'] !== UPLOAD_ERR_OK) {
                $errors['image'] = 'An error occurred while uploading the image.';
            }
        }
    }

    if (empty($errors)) {
        try {
            if (!empty($new_image)) {
                $image = time() . '_' . $new_image;
                if (!move_uploaded_file($_FILES['image']['tmp_name'], __DIR__ . '/../media/' . $image)) {
                    $errors['image'] = 'Failed to upload the image. Please check directory permission.';
                } else {
                    if (!empty($old_image) && file_exists(__DIR__ . '/../media/' . $old_image)) {
                        unlink(__DIR__ . '/../media/' . $old_image);
                    }
                }
            } else {
                $image = $old_image;
            }

            if (empty($errors)) {
                $sql = 'UPDATE products SET name = :name, price = :price, stock = :stock, category = :category, image = :image, description = :description WHERE id = :id';
                $stmt = $pdo->prepare($sql);
                $stmt->execute([
                    ':id' => $product['id'],
                    ':name' => $name,
                    ':price' => $price,
                    ':stock' => $stock,
                    ':category' => $category,
                    ':image' => $image,
                    ':description' => $description
                ]);
                $_SESSION['success'] = 'Product id: ' . $product['id'] . ' is updated successfully.';
                header('Location: products.php');
                exit;
            }
        } catch (PDOException $e) {
            error_log('Product update error: ' . $e->getMessage() . "\n", 3, __DIR__ . '/../error.log');
            $errors['update'] = 'This product cannot be updated at this moment. Please try again later.';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Atelier Product | Yangon Atelier Admin</title>
    <link rel="icon" type="image/x-icon" href="../images/favicon/favicon.ico">
    <?php include "components/css.php"; ?>

    <style>
        /* Remove number spinner arrows */
        input[type="number"]::-webkit-inner-spin-button,
        input[type="number"]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        input[type="number"] {
            -moz-appearance: textfield;
            appearance: textfield;
        }
    </style>
</head>

<body class="bg-[#EDE8E0] text-[#362F2A] font-sans antialiased selection:bg-[#8A5A44] selection:text-[#F6F3EE]">
    <div class="min-h-screen flex">
        <?php include "components/sidebar.php"; ?>

        <div class="lg:pl-64 flex flex-col flex-1 min-w-0">
            <?php include "components/topbar.php"; ?>

            <main class="flex-1 p-4 sm:p-6 lg:p-8 max-w-4xl w-full mx-auto space-y-6">

                <!-- Breadcrumbs & Heading -->
                <div class="flex items-center justify-between">
                    <div>
                        <div class="flex items-center gap-2 text-xs text-[#6E6359] mb-1">
                            <a href="dashboard.php" class="hover:text-[#362F2A] transition-colors">Dashboard</a>
                            <span>/</span>
                            <a href="products.php" class="hover:text-[#362F2A] transition-colors">Products</a>
                            <span>/</span>
                            <span class="text-[#362F2A] font-medium">Edit Piece</span>
                        </div>
                        <h2 class="font-serif text-2xl sm:text-3xl font-medium text-[#362F2A]">Edit Furniture Piece</h2>
                    </div>
                    <a href="products.php" class="px-4 py-2 rounded-xl border border-[#C9C0B3] bg-[#DFD8CD] hover:bg-[#D5CDC1] text-xs font-semibold text-[#362F2A] transition-colors">
                        Back to List
                    </a>
                </div>

                <!-- Form Card in Raw Linen (#F6F3EE) -->
                <div class="bg-[#F6F3EE] rounded-3xl border border-[#C9C0B3] p-6 sm:p-10 shadow-xs">
                    <form action="" method="POST" enctype="multipart/form-data" class="space-y-6">
                        <!-- Name -->
                        <div class="space-y-1.5">
                            <label for="name" class="block text-xs font-semibold uppercase tracking-wider text-[#6E6359]">
                                Product Title <span class="text-[#8C3B3B]">*</span>
                            </label>
                            <input type="text" id="name" name="name" value="<?= htmlspecialchars($name ?? $product['name']); ?>" class="w-full px-4 py-3 bg-[#EDE8E0] border border-[#C9C0B3] rounded-xl text-[#362F2A] text-sm placeholder-[#6E6359] focus:outline-none focus:ring-1 focus:ring-[#8A5A44] focus:border-[#8A5A44] transition-all">
                        </div>

                        <!-- Price, Stock, and Category Grid -->
                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">

                            <!-- Price -->
                            <div class="space-y-1.5">
                                <label for="price" class="block text-xs font-semibold uppercase tracking-wider text-[#6E6359]">
                                    Price in MMK <span class="text-[#8C3B3B]">*</span>
                                </label>
                                <div class="relative">
                                    <span class="absolute left-4 top-1/2 -translate-y-1/2 text-xs font-semibold text-[#6E6359]">MMK</span>
                                    <input type="number" step="1" id="price" name="price" value="<?= $price ?? (int)$product['price']; ?>" class="w-full pl-14 pr-4 py-3 bg-[#EDE8E0] border border-[#C9C0B3] rounded-xl text-[#362F2A] text-sm placeholder-[#6E6359] focus:outline-none focus:ring-1 focus:ring-[#8A5A44] focus:border-[#8A5A44] transition-all [appearance:textfield] [&::-webkit-outer-spin-button]:appearance-none [&::-webkit-inner-spin-button]:appearance-none">
                                </div>
                            </div>

                            <!-- Stock -->
                            <div class="space-y-1.5">
                                <label for="stock" class="block text-xs font-semibold uppercase tracking-wider text-[#6E6359]">
                                    Initial Inventory Count <span class="text-[#8C3B3B]">*</span>
                                </label>
                                <input type="number" id="stock" name="stock" value="<?= $stock ?? (int)$product['stock']; ?>" placeholder="e.g. 25" class="w-full px-4 py-3 bg-[#EDE8E0] border border-[#C9C0B3] rounded-xl text-[#362F2A] text-sm placeholder-[#6E6359] focus:outline-none focus:ring-1 focus:ring-[#8A5A44] focus:border-[#8A5A44] transition-all [appearance:textfield] [&::-webkit-outer-spin-button]:appearance-none [&::-webkit-inner-spin-button]:appearance-none">
                            </div>

                            <!-- Category -->
                            <?php
                            $selected_value = $category ?? $product['category'] ?? 'chairs';
                            $selected_label = $categories[$selected_value] ?? 'Chairs & Seating';
                            ?>
                            <div class="space-y-1.5" id="category-dropdown-container">
                                <label class="block text-xs font-semibold uppercase tracking-wider text-[#6E6359]">
                                    Category <span class="text-[#8C3B3B]">*</span>
                                </label>
                                <div class="relative">
                                    <!-- Hidden Input for Form Submission (stores the value e.g. 'chairs') -->
                                    <input type="hidden" name="category" id="category-input" value="<?= htmlspecialchars($selected_value) ?>">

                                    <!-- Dropdown Trigger Button -->
                                    <button type="button" id="category-button" class="w-full px-4 py-3 bg-[#EDE8E0] border border-[#C9C0B3] rounded-xl text-[#362F2A] text-sm focus:outline-none focus:ring-1 focus:ring-[#8A5A44] focus:border-[#8A5A44] cursor-pointer transition-all flex items-center justify-between text-left">
                                        <span id="category-selected-text"><?= htmlspecialchars($selected_label) ?></span>
                                        <i id="category-arrow" class="ri-arrow-down-s-line text-[#6E6359] text-base transition-transform duration-200"></i>
                                    </button>

                                    <!-- Custom Options Menu -->
                                    <div id="category-menu" class="hidden absolute left-0 right-0 top-full mt-1.5 bg-[#F6F3EE] border border-[#C9C0B3] rounded-2xl shadow-xl overflow-hidden py-1.5 z-30">
                                        <?php foreach ($categories as $value => $label):
                                            $is_selected = ($selected_value === $value);
                                        ?>
                                            <div data-value="<?= htmlspecialchars($value) ?>"
                                                data-label="<?= htmlspecialchars($label) ?>"
                                                class="category-option px-4 py-2.5 text-sm cursor-pointer transition-colors flex items-center justify-between <?= $is_selected ? 'bg-[#8A5A44] text-[#F6F3EE] font-medium' : 'text-[#362F2A] hover:bg-[#DFD8CD]' ?>">
                                                <span><?= htmlspecialchars($label) ?></span>
                                                <i class="ri-check-line text-sm check-icon <?= $is_selected ? '' : 'hidden' ?>"></i>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Image File & Current Preview -->
                        <div class="space-y-1.5">
                            <label class="block text-xs font-semibold uppercase tracking-wider text-[#6E6359]">
                                Current Artwork &amp; Replacement
                            </label>
                            <div class="flex flex-col sm:flex-row items-center gap-6 p-4 rounded-2xl bg-[#EDE8E0] border border-[#C9C0B3]">
                                <div class="w-24 h-24 rounded-xl bg-[#F6F3EE] border border-[#C9C0B3] p-2 flex items-center justify-center flex-shrink-0">
                                    <img id="product-preview" src="../media/<?= htmlspecialchars($product['image']); ?>" alt="<?= htmlspecialchars($product['name']); ?>" class="max-h-full max-w-full object-contain">
                                </div>
                                <div class="flex-1 space-y-1 text-center sm:text-left">
                                    <span class="text-xs font-semibold text-[#362F2A] block">Replace Image (Optional)</span>
                                    <span class="text-[11px] text-[#6E6359] block">Leave empty to keep the current photograph.</span>
                                    <input type="file" id="image" name="image" accept="image/*" data-preview-target="product-preview" class="mt-2 text-xs text-[#6E6359] file:mr-3 file:py-1.5 file:px-3 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-[#DFD8CD] file:text-[#362F2A] hover:file:bg-[#C9C0B3] file:cursor-pointer cursor-pointer">
                                </div>
                            </div>
                        </div>

                        <!-- Description -->
                        <div class="space-y-1.5">
                            <label for="description" class="block text-xs font-semibold uppercase tracking-wider text-[#6E6359]">
                                Piece Narrative &amp; Specifications
                            </label>
                            <textarea id="description" name="description" rows="4" class="w-full p-4 bg-[#EDE8E0] border border-[#C9C0B3] rounded-xl text-[#362F2A] text-sm placeholder-[#6E6359] focus:outline-none focus:ring-1 focus:ring-[#8A5A44] focus:border-[#8A5A44] transition-all"><?= htmlspecialchars($product['description']); ?></textarea>
                        </div>

                        <!-- Form Actions -->
                        <div class="pt-4 border-t border-[#C9C0B3] flex items-center justify-end gap-3">
                            <a href="products.php" class="px-5 py-3 rounded-xl border border-[#C9C0B3] bg-[#DFD8CD] hover:bg-[#D5CDC1] text-xs font-semibold text-[#362F2A] transition-colors">
                                Cancel
                            </a>
                            <button type="submit" name="update" class="px-6 py-3 rounded-xl bg-[#8A5A44] hover:bg-[#704735] text-[#F6F3EE] text-xs font-semibold transition-colors shadow-xs flex items-center gap-2">
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

    <script src="js/script.js"></script>
    <script src="../js/script.js"></script>

    <?php if (!empty($errors)): ?>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                <?php foreach ($errors as $error): ?>
                    showToast(<?= json_encode($error); ?>, 'error');
                <?php endforeach; ?>
            });
        </script>
    <?php endif; ?>
</body>

</html>