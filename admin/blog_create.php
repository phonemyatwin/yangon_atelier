<?php
// Initialize session
require_once __DIR__ . '/../components/session_start.php';

// Check session
require_once __DIR__ . '/components/session_check.php';

// Connect database
require_once __DIR__ . '/../components/connection.php';

$errors = [];
$categories = ['Philosophy', 'Craftsmanship', 'Spatial Design', 'Interior Styling', 'Artisanship', 'Lighting', 'Living Rituals', 'Architecture', 'Editorial'];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['publish'])) {
    $title = trim($_POST['title'] ?? '');
    $author = trim($_POST['author'] ?? '');
    $image = $_FILES['image']['name'] ?? '';
    $content = trim($_POST['content'] ?? '');
    $category = trim($_POST['category'] ?? 'Philosophy');

    if (empty($title) || empty($author) || empty($image) || empty($content) || empty($category)) {
        $errors['blog_form'] = 'All fields are required. Please complete the form.';
    } else {
        $allowed_extensions = ['jpg', 'jpeg', 'png', 'webp'];
        $extension = strtolower(pathinfo($image, PATHINFO_EXTENSION));
        if (!in_array($extension, $allowed_extensions)) {
            $errors['extension'] = 'Only JPG, JPEG, PNG, and WEBP image files are allowed.';
        }

        if (!in_array($category, $categories)) {
            $errors['category'] = 'Please enter a valid category.';
        }
    }

    if (empty($errors)) {
        try {
            $image = time() . '_' . $image;
            if (!move_uploaded_file($_FILES['image']['tmp_name'], '../media/' . $image)) {
                $errors['image'] = 'Failed to upload the image. Please check the folder permission.';
            } else {
                $sql = 'INSERT INTO blogs(title, author, author_id, image, content, category) VALUES(:title, :author, :author_id, :image, :content, :category)';
                $stmt = $pdo->prepare($sql);
                $stmt->execute([
                    ':title' => $title,
                    ':author' => $author,
                    ':author_id' => $_SESSION['admin']['id'],
                    ':image' => $image,
                    ':content' => $content,
                    ':category' => $category,
                ]);
                $_SESSION['success'] = 'Journal article published successfully.';
                header('Location: blog.php');
                exit;
            }
        } catch (PDOException $e) {
            if (!empty($image) && file_exists(__DIR__ . '/../media/' . $image)) {
                unlink(__DIR__ . '/../media/' . $image);
            }
            error_log('Blog create error: ' . $e->getMessage() . "\n", 3, __DIR__ . '/../error.log');
            $errors['create'] = 'Unable to publish your article at this moment. Please try again later.';
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Journal Article | Yangon Atelier Admin</title>
    <link rel="icon" type="image/x-icon" href="../images/favicon/favicon.ico">
    <?php include "components/css.php"; ?>
</head>

<body class="bg-[#EDE8E0] text-[#362F2A] font-sans antialiased selection:bg-[#8A5A44] selection:text-[#F6F3EE]">
    <div class="min-h-screen flex">
        <?php include "components/sidebar.php"; ?>

        <div class="lg:pl-64 flex flex-col flex-1 min-w-0">
            <?php include "components/topbar.php"; ?>

            <main class="flex-1 p-4 sm:p-6 lg:p-8 max-w-4xl w-full mx-auto space-y-6">

                <!-- Heading -->
                <div class="flex items-center justify-between">
                    <div>
                        <div class="flex items-center gap-2 text-xs text-[#6E6359] mb-1">
                            <a href="dashboard.php" class="hover:text-[#362F2A] transition-colors">Dashboard</a>
                            <span>/</span>
                            <a href="blog.php" class="hover:text-[#362F2A] transition-colors">Journal</a>
                            <span>/</span>
                            <span class="text-[#362F2A] font-medium">New Post</span>
                        </div>
                        <h2 class="font-serif text-2xl sm:text-3xl font-medium text-[#362F2A]">Compose Journal Article</h2>
                    </div>
                    <a href="blog.php" class="px-4 py-2 rounded-xl border border-[#C9C0B3] bg-[#DFD8CD] hover:bg-[#D5CDC1] text-xs font-semibold text-[#362F2A] transition-colors">
                        Cancel &amp; Return
                    </a>
                </div>

                <!-- Form Card in Raw Linen -->
                <div class="bg-[#F6F3EE] rounded-3xl border border-[#C9C0B3] p-6 sm:p-10 shadow-xs">
                    <form action="" method="POST" enctype="multipart/form-data" class="space-y-6">

                        <!-- Title -->
                        <div class="space-y-1.5">
                            <label for="title" class="block text-xs font-semibold uppercase tracking-wider text-[#6E6359]">
                                Article Title <span class="text-[#8C3B3B]">*</span>
                            </label>
                            <input type="text" id="title" name="title" value="<?= htmlspecialchars($title ?? '') ?>" placeholder="e.g. The Philosophy of Wabi-Sabi in Modern Interiors" class="w-full px-4 py-3 bg-[#EDE8E0] border border-[#C9C0B3] rounded-xl text-[#362F2A] text-sm placeholder-[#6E6359] focus:outline-none focus:ring-1 focus:ring-[#8A5A44] focus:border-[#8A5A44] transition-all">
                        </div>

                        <!-- Author & Category Grid -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                            <!-- Author -->
                            <div class="space-y-1.5">
                                <label for="author" class="block text-xs font-semibold uppercase tracking-wider text-[#6E6359]">
                                    Author Name or Byline <span class="text-[#8C3B3B]">*</span>
                                </label>
                                <div class="relative">
                                    <i class="ri-user-line absolute left-4 top-1/2 -translate-y-1/2 text-[#6E6359] text-base"></i>
                                    <input type="text" id="author" name="author" placeholder="e.g. Atelier Editorial Staff" value="<?= htmlspecialchars($author ?? 'Atelier Editorial Staff') ?>" class="w-full pl-11 pr-4 py-3 bg-[#EDE8E0] border border-[#C9C0B3] rounded-xl text-[#362F2A] text-sm placeholder-[#6E6359] focus:outline-none focus:ring-1 focus:ring-[#8A5A44] focus:border-[#8A5A44] transition-all">
                                </div>
                            </div>

                            <!-- Category -->
                            <?php
                            $category = $_POST['category'] ?? 'Philosophy';
                            ?>
                            <div class="space-y-1.5" id="category-dropdown-container">
                                <label class="block text-xs font-semibold uppercase tracking-wider text-[#6E6359]">
                                    Category <span class="text-[#8C3B3B]">*</span>
                                </label>
                                <div class="relative">

                                    <!-- Hidden Input for Form Submission -->
                                    <input type="hidden" name="category" id="category-input" value="<?= htmlspecialchars($category) ?>">

                                    <!-- Dropdown Trigger Button -->
                                    <button type="button" id="category-button" class="w-full px-4 py-3 bg-[#EDE8E0] border border-[#C9C0B3] rounded-xl text-[#362F2A] text-sm focus:outline-none focus:ring-1 focus:ring-[#8A5A44] focus:border-[#8A5A44] cursor-pointer transition-all flex items-center justify-between text-left">
                                        <span id="category-selected-text"><?= htmlspecialchars($category) ?></span>
                                        <i id="category-arrow" class="ri-arrow-down-s-line text-[#6E6359] text-base transition-transform duration-200"></i>
                                    </button>

                                    <!-- Custom Options Menu -->
                                    <div id="category-menu" class="hidden absolute left-0 right-0 top-full mt-1.5 bg-[#F6F3EE] border border-[#C9C0B3] rounded-2xl shadow-xl overflow-hidden py-1.5 z-30 max-h-60 overflow-y-auto">
                                        <?php foreach ($categories as $cat):
                                            $selected_category = ($category === $cat);
                                        ?>
                                            <div data-value="<?= htmlspecialchars($cat) ?>"
                                                data-label="<?= htmlspecialchars($cat) ?>"
                                                class="category-option px-4 py-2.5 text-sm cursor-pointer transition-colors flex items-center justify-between <?= $selected_category ? 'bg-[#8A5A44] text-[#F6F3EE] font-medium' : 'text-[#362F2A] hover:bg-[#DFD8CD]' ?>">
                                                <span><?= htmlspecialchars($cat) ?></span>
                                                <i class="ri-check-line text-sm check-icon <?= $selected_category ? '' : 'hidden' ?>"></i>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Cover Image Dropzone -->
                        <div class="space-y-1.5">
                            <label class="block text-xs font-semibold uppercase tracking-wider text-[#6E6359]">
                                Header Photography <span class="text-[#8C3B3B]">*</span>
                            </label>
                            <div class="border-2 border-dashed border-[#C9C0B3] rounded-2xl p-6 text-center hover:border-[#8A5A44] transition-colors bg-[#EDE8E0]">
                                <div class="max-w-xs mx-auto flex flex-col items-center">
                                    <i class="ri-image-add-line text-3xl text-[#8A5A44] mb-2"></i>
                                    <span class="text-xs font-semibold text-[#362F2A]">Upload high-resolution article visual</span>
                                    <span class="text-[11px] text-[#6E6359] mt-0.5">Recommended landscape ratio 16:10</span>
                                    <input type="file" id="image" name="image" accept="image/*" data-preview-target="blog-preview" class="mt-4 text-xs text-[#6E6359] file:mr-3 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-[#DFD8CD] file:text-[#362F2A] hover:file:bg-[#C9C0B3] file:cursor-pointer cursor-pointer">
                                </div>
                                <div class="mt-4 flex justify-center">
                                    <img id="blog-preview" src="" alt="Cover preview" class="hidden w-40 h-24 object-cover rounded-xl border border-[#C9C0B3] bg-[#F6F3EE]">
                                </div>
                            </div>
                        </div>

                        <!-- Content Body -->
                        <div class="space-y-1.5">
                            <label for="content" class="block text-xs font-semibold uppercase tracking-wider text-[#6E6359]">
                                Journal Essay Body <span class="text-[#8C3B3B]">*</span>
                            </label>
                            <textarea id="content" name="content" rows="8" placeholder="Write your long-form craft essay, reflections on natural materials, and spatial philosophies..." class="w-full p-4 bg-[#EDE8E0] border border-[#C9C0B3] rounded-xl text-[#362F2A] text-sm placeholder-[#6E6359] focus:outline-none focus:ring-1 focus:ring-[#8A5A44] focus:border-[#8A5A44] transition-all"><?= htmlspecialchars($content ?? '') ?></textarea>
                        </div>

                        <!-- Actions -->
                        <div class="pt-4 border-t border-[#C9C0B3] flex items-center justify-end gap-3">
                            <a href="blog.php" class="px-5 py-3 rounded-xl border border-[#C9C0B3] bg-[#DFD8CD] hover:bg-[#D5CDC1] text-xs font-semibold text-[#362F2A] transition-colors">
                                Cancel
                            </a>
                            <button type="submit" name="publish" class="px-6 py-3 rounded-xl bg-[#8A5A44] hover:bg-[#704735] text-[#F6F3EE] text-xs font-semibold transition-colors shadow-xs flex items-center gap-2">
                                <i class="ri-check-line text-base"></i>
                                <span>Publish Journal Post</span>
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