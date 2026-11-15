<?php
// Initialize session
require_once __DIR__ . '/../components/session_start.php';

// Check session
require_once __DIR__ . '/components/session_check.php';

// Connect database
require_once __DIR__ . '/../components/connection.php';

$errors = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['create'])) {
    $name = trim($_POST['name'] ?? '');
    $price = $_POST['price'] ?? '';
    $stock = $_POST['stock'] ?? '';
    $image = $_FILES['image']['name'];
    $description = trim($_POST['description'] ?? '');
    $category = trim($_POST['category'] ?? 'chairs');

    if (empty($name) || empty($price) || empty($stock) || empty($image) || empty($category)) {
        $errors['product'] = 'All fields are required. Please complete the form.';
    }

    if (empty($errors)) {
        $image = time() . '_' . $image;
        $sql = 'INSERT INTO products(name, price, stock, image, description) VALUES(:name, :price, :stock, :image, :description)';
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':name' => $name,
            ':price' => $price,
            ':stock' => $stock,
            ':image' => $image,
            ':description' => $description,
            ':category' => $category
        ]);
        move_uploaded_file($_FILES['image']['tmp_name'], __DIR__ . '/../media/' . $image);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Atelier Product | Yangon Atelier Admin</title>
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
                            <span class="text-[#362F2A] font-medium">New Piece</span>
                        </div>
                        <h2 class="font-serif text-2xl sm:text-3xl font-medium text-[#362F2A]">Add Furniture Piece</h2>
                    </div>
                    <a href="products.php" class="px-4 py-2 rounded-xl border border-[#C9C0B3] bg-[#DFD8CD] hover:bg-[#D5CDC1] text-xs font-semibold text-[#362F2A] transition-colors">
                        Cancel &amp; Return
                    </a>
                </div>

                <!-- Form Card in Raw Linen (#F6F3EE) -->
                <div class="bg-[#F6F3EE] rounded-3xl border border-[#C9C0B3] p-6 sm:p-10 shadow-xs">
                    <form action="" method="POST" enctype="multipart/form-data" class="space-y-6">

                        <!-- Name & Category -->
                        <div class="space-y-1.5">
                            <label for="name" class="block text-xs font-semibold uppercase tracking-wider text-[#6E6359]">
                                Product Title <span class="text-[#8C3B3B]">*</span>
                            </label>
                            <input type="text" id="name" name="name" value="<?= htmlspecialchars($name ?? '') ?>" placeholder="e.g. Sculptural Lounge Armchair" class="w-full px-4 py-3 bg-[#EDE8E0] border border-[#C9C0B3] rounded-xl text-[#362F2A] text-sm placeholder-[#6E6359] focus:outline-none focus:ring-1 focus:ring-[#8A5A44] focus:border-[#8A5A44] transition-all">
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
                                    <input type="number" step="1" id="price" name="price" value="<?= htmlspecialchars($price ?? '') ?>" placeholder="400000" class="w-full pl-14 pr-4 py-3 bg-[#EDE8E0] border border-[#C9C0B3] rounded-xl text-[#362F2A] text-sm placeholder-[#6E6359] focus:outline-none focus:ring-1 focus:ring-[#8A5A44] focus:border-[#8A5A44] transition-all [appearance:textfield] [&::-webkit-outer-spin-button]:appearance-none [&::-webkit-inner-spin-button]:appearance-none">
                                </div>
                            </div>

                            <!-- Stock -->
                            <div class="space-y-1.5">
                                <label for="stock" class="block text-xs font-semibold uppercase tracking-wider text-[#6E6359]">
                                    Initial Inventory Count <span class="text-[#8C3B3B]">*</span>
                                </label>
                                <input type="number" id="stock" name="stock" value="<?= htmlspecialchars($stock ?? '25') ?>" placeholder="e.g. 25" class="w-full px-4 py-3 bg-[#EDE8E0] border border-[#C9C0B3] rounded-xl text-[#362F2A] text-sm placeholder-[#6E6359] focus:outline-none focus:ring-1 focus:ring-[#8A5A44] focus:border-[#8A5A44] transition-all [appearance:textfield] [&::-webkit-outer-spin-button]:appearance-none [&::-webkit-inner-spin-button]:appearance-none">
                            </div>

                            <!-- Category -->
                            <?php
                            $categories = [
                                'chairs' => 'Chairs & Seating',
                                'sofas' => 'Sofas & Lounge',
                                'tables' => 'Tables & Desks',
                                'beds' => 'Beds & Tatami',
                                'objects' => 'Lighting & Objects'
                            ];
                            $category = $_POST['category'] ?? 'chairs';
                            ?>
                            <div class="space-y-1.5" id="category-dropdown-container">
                                <label class="block text-xs font-semibold uppercase tracking-wider text-[#6E6359]">
                                    Category <span class="text-[#8C3B3B]">*</span>
                                </label>
                                <div class="relative">
                                    <!-- Hidden Input for Form Submission -->
                                    <input type="hidden" name="category" id="category-input" value="<?= htmlspecialchars($category ?? 'chair') ?>">

                                    <!-- Dropdown Trigger Button -->
                                    <button type="button" id="category-button" class="w-full px-4 py-3 bg-[#EDE8E0] border border-[#C9C0B3] rounded-xl text-[#362F2A] text-sm focus:outline-none focus:ring-1 focus:ring-[#8A5A44] focus:border-[#8A5A44] cursor-pointer transition-all flex items-center justify-between text-left">
                                        <span id="category-selected-text"><?= htmlspecialchars(ucfirst($category)) ?></span>
                                        <i id="category-arrow" class="ri-arrow-down-s-line text-[#6E6359] text-base transition-transform duration-200"></i>
                                    </button>

                                    <!-- Custom Options Menu -->
                                    <div id="category-menu" class="hidden absolute left-0 right-0 top-full mt-1.5 bg-[#F6F3EE] border border-[#C9C0B3] rounded-2xl shadow-xl overflow-hidden py-1.5 z-30">
                                        <?php foreach ($categories as $cat):
                                            $selected_category = ($category === $cat);
                                        ?>
                                            <div data-value="<?= htmlspecialchars($cat) ?>"
                                                data-label="<?= htmlspecialchars(ucfirst($cat)) ?>"
                                                class="category-option px-4 py-2.5 text-sm cursor-pointer transition-colors flex items-center justify-between <?= $selected_category ? 'bg-[#8A5A44] text-[#F6F3EE] font-medium' : 'text-[#362F2A] hover:bg-[#DFD8CD]' ?>">
                                                <span><?= htmlspecialchars(ucfirst($cat)) ?></span>
                                                <i class="ri-check-line text-sm check-icon <?= $selected_category ? '' : 'hidden' ?>"></i>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                        </div>



                        <!-- Image Dropzone / Upload -->
                        <div class="space-y-1.5">
                            <label class="block text-xs font-semibold uppercase tracking-wider text-[#6E6359]">
                                Atelier Photograph <span class="text-[#8C3B3B]">*</span>
                            </label>
                            <div class="border-2 border-dashed border-[#C9C0B3] rounded-2xl p-6 text-center hover:border-[#8A5A44] transition-colors bg-[#EDE8E0]">
                                <div class="max-w-xs mx-auto flex flex-col items-center">
                                    <i class="ri-image-add-line text-3xl text-[#8A5A44] mb-2"></i>
                                    <span class="text-xs font-semibold text-[#362F2A]">Select product imagery</span>
                                    <span class="text-[11px] text-[#6E6359] mt-0.5">PNG, JPG, or WEBP with authentic studio lighting</span>
                                    <input type="file" id="image" name="image" accept="image/*" data-preview-target="product-preview" class="mt-4 text-xs text-[#6E6359] file:mr-3 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-[#DFD8CD] file:text-[#362F2A] hover:file:bg-[#C9C0B3] file:cursor-pointer cursor-pointer">
                                </div>
                                <div class="mt-4 flex justify-center">
                                    <img id="product-preview" src="" alt="Image preview" class="hidden w-28 h-28 object-contain rounded-xl border border-[#C9C0B3] bg-[#F6F3EE] p-2">
                                </div>
                            </div>
                        </div>

                        <!-- Description -->
                        <div class="space-y-1.5">
                            <label for="description" class="block text-xs font-semibold uppercase tracking-wider text-[#6E6359]">
                                Piece Narrative &amp; Specifications
                            </label>
                            <textarea id="description" name="description" rows="4" placeholder="Detail the timber source, joinery style, finish oils, and ergonomic proportions..." class="w-full p-4 bg-[#EDE8E0] border border-[#C9C0B3] rounded-xl text-[#362F2A] text-sm placeholder-[#6E6359] focus:outline-none focus:ring-1 focus:ring-[#8A5A44] focus:border-[#8A5A44] transition-all"><?= htmlspecialchars($description ?? '') ?></textarea>
                        </div>

                        <!-- Form Actions -->
                        <div class="pt-4 border-t border-[#C9C0B3] flex items-center justify-end gap-3">
                            <a href="products.php" class="px-5 py-3 rounded-xl border border-[#C9C0B3] bg-[#DFD8CD] hover:bg-[#D5CDC1] text-xs font-semibold text-[#362F2A] transition-colors">
                                Cancel
                            </a>
                            <button type="submit" name="create" class="px-6 py-3 rounded-xl bg-[#8A5A44] hover:bg-[#704735] text-[#F6F3EE] text-xs font-semibold transition-colors shadow-xs flex items-center gap-2">
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

    <script src="js/script.js"></script>
    <script src="../js/script.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const button = document.getElementById('category-button');
            const menu = document.getElementById('category-menu');
            const arrow = document.getElementById('category-arrow');
            const input = document.getElementById('category-input');
            const selectedText = document.getElementById('category-selected-text');
            const options = document.querySelectorAll('.category-option');
            const container = document.getElementById('category-dropdown-container');

            if (button && menu) {
                button.addEventListener('click', function(e) {
                    e.stopPropagation();
                    const isOpen = !menu.classList.contains('hidden');
                    if (isOpen) {
                        menu.classList.add('hidden');
                        arrow.classList.remove('rotate-180');
                    } else {
                        menu.classList.remove('hidden');
                        arrow.classList.add('rotate-180');
                    }
                });

                options.forEach(function(opt) {
                    opt.addEventListener('click', function(e) {
                        e.stopPropagation();
                        const value = this.getAttribute('data-value');
                        const label = this.getAttribute('data-label');

                        input.value = value;
                        selectedText.textContent = label;

                        options.forEach(function(el) {
                            el.className = 'category-option px-4 py-2.5 text-sm cursor-pointer transition-colors flex items-center justify-between text-[#362F2A] hover:bg-[#DFD8CD]';
                            const check = el.querySelector('.check-icon');
                            if (check) check.classList.add('hidden');
                        });

                        this.className = 'category-option px-4 py-2.5 text-sm cursor-pointer transition-colors flex items-center justify-between bg-[#8A5A44] text-[#F6F3EE] font-medium';
                        const activeCheck = this.querySelector('.check-icon');
                        if (activeCheck) activeCheck.classList.remove('hidden');

                        menu.classList.add('hidden');
                        arrow.classList.remove('rotate-180');
                    });
                });

                document.addEventListener('click', function(e) {
                    if (container && !container.contains(e.target)) {
                        menu.classList.add('hidden');
                        arrow.classList.remove('rotate-180');
                    }
                });

                document.addEventListener('keydown', function(e) {
                    if (e.key === 'Escape' && !menu.classList.contains('hidden')) {
                        menu.classList.add('hidden');
                        arrow.classList.remove('rotate-180');
                    }
                });
            }
        });
    </script>

    <?php if (!empty($errors)): ?>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                showToast(<?= json_encode($errors); ?>, 'error');
            });
        </script>
    <?php endif; ?>
</body>

</html>