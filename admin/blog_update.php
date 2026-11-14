<?php
// Initialize session
require_once __DIR__ . '/../components/session_start.php';

// Check session
require_once __DIR__ . '/components/session_check.php';

// Connect database
require_once __DIR__ . '/../components/connection.php';

$id = $_GET['id'] ?? '';
$errors = [];
if (empty($id) || !filter_var($id, FILTER_VALIDATE_INT)) {
    header('Location: blog.php');
    exit;
}

try {
    $sql = 'SELECT * FROM blogs WHERE id = :id LIMIT 1';
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':id' => $id]);
    $blog = $stmt->fetch();
} catch (PDOException $e) {
    error_log('Blog fetch error: ' . $e->getMessage() . "\n", 3, __DIR__ . '/../error.log');
    $_SESSION['error'] = 'Unable to retrieve article information.';
    header('Location: blog.php');
    exit;
}

if (!$blog || $_SESSION['admin']['id'] !== $blog['author_id']) {
    $_SESSION['error'] = 'You do not have permission to update this article.';
    header('Location: blog.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update'])) {
    $title = trim($_POST['title'] ?? $blog['title']);
    $author = trim($_POST['author'] ?? $blog['author']);
    $old_image = trim($blog['image'] ?? '');
    $new_image = trim($_FILES['image']['name'] ?? '');
    $content = trim($_POST['content'] ?? $blog['content']);
    $category = trim($_POST['category'] ?? $blog['category']);

    if (empty($title) || empty($author) || empty($content) || empty($category)) {
        $errors['blog_update_form'] = 'All fields are required. Please complete the form.';
    } else {
        if (mb_strlen($title) > 50) {
            $errors['title'] = 'Title cannot exceed 50 characters.';
        }
        if (mb_strlen($author) > 50) {
            $errors['author'] = 'Author name cannot exceed 50 characters.';
        }
    }

    if (empty($errors)) {
        try {
            if (!empty($new_image)) {
                $image = time() . '_' . $new_image;
                move_uploaded_file($_FILES['image']['tmp_name'], '../media/' . $image);
                if (!empty($old_image) && file_exists('../media/' . $old_image)) {
                    unlink('../media/' . $old_image);
                }
            } else {
                $image = $old_image;
            }

            $sql = 'UPDATE blogs SET title = :title, author = :author, image = :image, content = :content, category = :category WHERE id = :id AND author_id = :author_id';
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                ':id' => $blog['id'],
                ':title' => $title,
                ':author' => $author,
                ':author_id' => $_SESSION['admin']['id'],
                ':image' => $image,
                ':content' => $content,
                ':category' => $category
            ]);
            $_SESSION['success'] = 'Your article is updated successfully.';
            header('Location: blog.php');
            exit;
        } catch (PDOException $e) {
            error_log('Blog update error: ' . $e->getMessage() . "\n", 3, __DIR__ . '/../error.log');
            $errors['update'] = 'Your article cannot be updated at this moment. Please try again later.';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Journal Article | Yangon Atelier Admin</title>
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
                            <span class="text-[#362F2A] font-medium">Edit Article</span>
                        </div>
                        <h2 class="font-serif text-2xl sm:text-3xl font-medium text-[#362F2A]">Edit Journal Article</h2>
                    </div>
                    <a href="blog.php" class="px-4 py-2 rounded-xl border border-[#C9C0B3] bg-[#DFD8CD] hover:bg-[#D5CDC1] text-xs font-semibold text-[#362F2A] transition-colors">
                        Back to List
                    </a>
                </div>

                <!-- Form Card in Raw Linen (#F6F3EE) -->
                <div class="bg-[#F6F3EE] rounded-3xl border border-[#C9C0B3] p-6 sm:p-10 shadow-xs">
                    <form action="" method="POST" enctype="multipart/form-data" class="space-y-6">
                        <!-- Title -->
                        <div class="space-y-1.5">
                            <label for="title" class="block text-xs font-semibold uppercase tracking-wider text-[#6E6359]">
                                Article Title <span class="text-[#8C3B3B]">*</span>
                            </label>
                            <input type="text" id="title" name="title" value="<?= htmlspecialchars($title ?? $blog['title'] ?? ''); ?>" class="w-full px-4 py-3 bg-[#EDE8E0] border border-[#C9C0B3] rounded-xl text-[#362F2A] text-sm placeholder-[#6E6359] focus:outline-none focus:ring-1 focus:ring-[#8A5A44] focus:border-[#8A5A44] transition-all">
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
                                    <input type="text" id="author" maxlength="50" name="author" placeholder="e.g. Atelier Editorial Staff" value="<?= htmlspecialchars($author ?? $blog['author'] ?? 'Atelier Editorial Staff') ?>" class="w-full pl-11 pr-4 py-3 bg-[#EDE8E0] border border-[#C9C0B3] rounded-xl text-[#362F2A] text-sm placeholder-[#6E6359] focus:outline-none focus:ring-1 focus:ring-[#8A5A44] focus:border-[#8A5A44] transition-all">
                                </div>
                            </div>

                            <!-- Category -->
                            <div class="space-y-1.5">
                                <label for="category" class="block text-xs font-semibold uppercase tracking-wider text-[#6E6359]">
                                    Category <span class="text-[#8C3B3B]">*</span>
                                </label>
                                <div class="relative">
                                    <select id="category" name="category" class="w-full appearance-none px-4 py-3 bg-[#EDE8E0] border border-[#C9C0B3] rounded-xl text-[#362F2A] text-sm focus:outline-none focus:ring-1 focus:ring-[#8A5A44] focus:border-[#8A5A44] cursor-pointer transition-all">
                                        <?php
                                        $categories = ['Philosophy', 'Craftsmanship', 'Spatial Design', 'Interior Styling', 'Artisanship', 'Lighting', 'Living Rituals', 'Architecture', 'Editorial'];
                                        $selected_category = $category ?? $blog['category'] ?? 'Philosophy';
                                        foreach ($categories as $cat):
                                        ?>
                                            <option value="<?= htmlspecialchars($cat) ?>" <?= ($selected_category === $cat) ? 'selected' : '' ?>>
                                                <?= htmlspecialchars($cat) ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                    <i class="ri-arrow-down-s-line absolute right-4 top-1/2 -translate-y-1/2 text-[#6E6359] text-base pointer-events-none"></i>
                                </div>
                            </div>
                        </div>

                        <!-- Current Image & Replace -->
                        <div class="space-y-1.5">
                            <label class="block text-xs font-semibold uppercase tracking-wider text-[#6E6359]">
                                Current Cover Visual &amp; Replacement
                            </label>
                            <div class="flex flex-col sm:flex-row items-center gap-6 p-4 rounded-2xl bg-[#EDE8E0] border border-[#C9C0B3]">
                                <div class="w-32 h-20 rounded-xl bg-[#F6F3EE] border border-[#C9C0B3] overflow-hidden flex-shrink-0">
                                    <img id="blog-preview" src="../media/<?= htmlspecialchars($blog['image'] ?? ''); ?>" alt="Cover visual" class="w-full h-full object-cover">
                                </div>
                                <div class="flex-1 space-y-1 text-center sm:text-left">
                                    <span class="text-xs font-semibold text-[#362F2A] block">Replace Cover (Optional)</span>
                                    <span class="text-[11px] text-[#6E6359] block">Leave empty to keep the current photograph.</span>
                                    <input type="file" id="image" name="image" accept="image/*" data-preview-target="blog-preview" class="mt-2 text-xs text-[#6E6359] file:mr-3 file:py-1.5 file:px-3 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-[#DFD8CD] file:text-[#362F2A] hover:file:bg-[#C9C0B3] file:cursor-pointer cursor-pointer">
                                </div>
                            </div>
                        </div>

                        <!-- Content -->
                        <div class="space-y-1.5">
                            <label for="content" class="block text-xs font-semibold uppercase tracking-wider text-[#6E6359]">
                                Article Content &amp; Essay Text <span class="text-[#8C3B3B]">*</span>
                            </label>
                            <textarea id="content" name="content" rows="8" class="w-full p-4 bg-[#EDE8E0] border border-[#C9C0B3] rounded-xl text-[#362F2A] text-sm placeholder-[#6E6359] focus:outline-none focus:ring-1 focus:ring-[#8A5A44] focus:border-[#8A5A44] transition-all"><?= htmlspecialchars($content ?? $blog['content'] ?? ''); ?></textarea>
                        </div>

                        <!-- Actions -->
                        <div class="pt-4 border-t border-[#C9C0B3] flex items-center justify-end gap-3">
                            <a href="blog.php" class="px-5 py-3 rounded-xl border border-[#C9C0B3] bg-[#DFD8CD] hover:bg-[#D5CDC1] text-xs font-semibold text-[#362F2A] transition-colors">
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

    <script src="js/admin.js"></script>
    <script src="../js/user.js"></script>
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