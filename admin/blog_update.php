<?php
/**
 * ============================================================================
 * FURNISHME BACKEND INSTRUCTION GUIDELINE - UPDATE JOURNAL ARTICLE
 * ============================================================================
 * FILE: admin/blog_update.php
 * PURPOSE: Queries existing blog essay by ID, populates the edit form, handles
 *          optional cover visual replacement, and updates the 'blogs' table.
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
 * 3. Validate and Query Existing Article:
 *    $id = isset($_GET['id']) ? (int)$_GET['id'] : (isset($_POST['id']) ? (int)$_POST['id'] : 0);
 *    if ($id <= 0) {
 *        header("Location: blog.php");
 *        exit;
 *    }
 *    $stmt = $connection->prepare("SELECT * FROM blogs WHERE id = ? LIMIT 1");
 *    $stmt->bind_param("i", $id);
 *    $stmt->execute();
 *    $blog = $stmt->get_result()->fetch_assoc();
 *    $stmt->close();
 *    if (!$blog) {
 *        header("Location: blog.php?error=not_found");
 *        exit;
 *    }
 * 
 * 4. Process POST Update:
 *    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
 *        $title   = trim($_POST['title'] ?? '');
 *        $author  = trim($_POST['author'] ?? '');
 *        $content = trim($_POST['content'] ?? '');
 * 
 *        // Handle Optional Visual Upload
 *        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
 *            $ext = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
 *            $new_image = 'blog-' . time() . '-' . rand(100, 999) . '.' . $ext;
 *            move_uploaded_file($_FILES['image']['tmp_name'], '../images/' . $new_image);
 * 
 *            $update_stmt = $connection->prepare("UPDATE blogs SET title = ?, author = ?, image = ?, content = ? WHERE id = ?");
 *            $update_stmt->bind_param("ssssi", $title, $author, $new_image, $content, $id);
 *        } else {
 *            $update_stmt = $connection->prepare("UPDATE blogs SET title = ?, author = ?, content = ? WHERE id = ?");
 *            $update_stmt->bind_param("sssi", $title, $author, $content, $id);
 *        }
 * 
 *        if ($update_stmt->execute()) {
 *            $update_stmt->close();
 *            header("Location: blog.php?msg=updated");
 *            exit;
 *        } else {
 *            $error = "Failed to update article: " . $connection->error;
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
    <title>Edit Journal Article | FurnishMe Admin</title>
    <link rel="icon" type="image/x-icon" href="../images/favicon.ico">
    <?php include "components/css.php"; ?>
</head>

<body class="bg-[#0D0B09] text-[#EDE4D7] font-sans antialiased selection:bg-[#C5A059] selection:text-[#0D0B09]">
    <div class="min-h-screen flex">
        <?php include "components/sidebar.php"; ?>

        <div class="lg:pl-64 flex flex-col flex-1 min-w-0">
            <?php include "components/topbar.php"; ?>

            <main class="flex-1 p-4 sm:p-6 lg:p-8 max-w-4xl w-full mx-auto space-y-6">
                
                <!-- Heading -->
                <div class="flex items-center justify-between">
                    <div>
                        <div class="flex items-center gap-2 text-xs text-[#8C7D6B] mb-1">
                            <a href="dashboard.php" class="hover:text-[#FAF6EE]">Dashboard</a>
                            <span>/</span>
                            <a href="blog.php" class="hover:text-[#FAF6EE]">Journal</a>
                            <span>/</span>
                            <span class="text-[#FAF6EE] font-medium">Edit Article</span>
                        </div>
                        <h2 class="font-serif text-2xl sm:text-3xl font-medium text-[#FAF6EE]">Edit Journal Article</h2>
                    </div>
                    <a href="blog.php" class="px-4 py-2 rounded-xl border border-[#2A231C] text-xs font-medium text-[#D6C8B4] hover:bg-white transition-colors">
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
                         PHP BACKEND GUIDELINE: Blog Update Form
                         - Action: action="" (submits to self)
                         - Method: POST
                         - Hidden input: <input type="hidden" name="id" value="<?= $blog['id'] ?? 1 ?>">
                         - Prefill inputs with current record values
                         ========================================================== -->
                    <form action="" method="POST" enctype="multipart/form-data" class="space-y-6">
                        <input type="hidden" name="id" value="1">

                        <!-- Title -->
                        <div class="space-y-1.5">
                            <label for="title" class="block text-xs font-semibold uppercase tracking-wider text-[#D6C8B4]">
                                Article Title <span class="text-rose-600">*</span>
                            </label>
                            <input type="text" id="title" name="title" required value="The Philosophy of Wabi-Sabi in Modern Interiors" class="w-full px-4 py-3 bg-[#0D0B09] border border-[#2A231C] rounded-xl text-[#FAF6EE] text-sm placeholder-[#8C7D6B] focus:outline-none focus:ring-2 focus:ring-[#C5A059] focus:border-[#C5A059] transition-all">
                        </div>

                        <!-- Author -->
                        <div class="space-y-1.5">
                            <label for="author" class="block text-xs font-semibold uppercase tracking-wider text-[#D6C8B4]">
                                Author Byline <span class="text-rose-600">*</span>
                            </label>
                            <div class="relative">
                                <i class="ri-user-line absolute left-4 top-1/2 -translate-y-1/2 text-stone-400 text-base"></i>
                                <input type="text" id="author" name="author" required value="admin" class="w-full pl-11 pr-4 py-3 bg-[#0D0B09] border border-[#2A231C] rounded-xl text-[#FAF6EE] text-sm placeholder-[#8C7D6B] focus:outline-none focus:ring-2 focus:ring-[#C5A059] focus:border-[#C5A059] transition-all">
                            </div>
                        </div>

                        <!-- Current Image & Replace -->
                        <div class="space-y-1.5">
                            <label class="block text-xs font-semibold uppercase tracking-wider text-[#D6C8B4]">
                                Current Cover Visual &amp; Replacement
                            </label>
                            <div class="flex flex-col sm:flex-row items-center gap-6 p-4 rounded-2xl bg-[#0D0B09] border border-[#2A231C]">
                                <div class="w-32 h-20 rounded-xl bg-[#161310] border border-[#2A231C] overflow-hidden flex-shrink-0">
                                    <!-- PHP Guideline: src="../images/<?= htmlspecialchars($blog['image'] ?? 'blog-minimalist-spaces.jpg') ?>" -->
                                    <img id="blog-preview" src="../images/blog-minimalist-spaces.jpg" alt="Cover visual" class="w-full h-full object-cover">
                                </div>
                                <div class="flex-1 space-y-1 text-center sm:text-left">
                                    <span class="text-xs font-medium text-[#FAF6EE] block">Replace Cover (Optional)</span>
                                    <span class="text-[11px] text-stone-400 block">Leave empty to keep the current photograph.</span>
                                    <input type="file" id="image" name="image" accept="image/*" data-preview-target="blog-preview" class="mt-2 text-xs text-[#8C7D6B] file:mr-3 file:py-1.5 file:px-3 file:rounded-lg file:border-0 file:text-xs file:font-medium file:bg-stone-900 file:text-white hover:file:bg-amber-900 file:cursor-pointer cursor-pointer">
                                </div>
                            </div>
                        </div>

                        <!-- Content -->
                        <div class="space-y-1.5">
                            <label for="content" class="block text-xs font-semibold uppercase tracking-wider text-[#D6C8B4]">
                                Article Content &amp; Essay Text <span class="text-rose-600">*</span>
                            </label>
                            <textarea id="content" name="content" rows="8" required class="w-full p-4 bg-[#0D0B09] border border-[#2A231C] rounded-xl text-[#FAF6EE] text-sm placeholder-[#8C7D6B] focus:outline-none focus:ring-2 focus:ring-[#C5A059] focus:border-[#C5A059] transition-all">In an era saturated by industrial high-gloss surfaces, clinical lines, and the constant digital flicker of notifications, our domestic environments have frequently sacrificed soul for sterile uniformity. Japanese philosophy offers an enduring antidote through the worldview of wabi-sabi: the appreciation of beauty that is imperfect, impermanent, and incomplete.</textarea>
                        </div>

                        <!-- Actions -->
                        <div class="pt-4 border-t border-[#2A231C] flex items-center justify-end gap-3">
                            <a href="blog.php" class="px-5 py-3 rounded-xl border border-[#2A231C] text-xs font-medium text-[#D6C8B4] hover:bg-[#0D0B09] transition-colors">
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
