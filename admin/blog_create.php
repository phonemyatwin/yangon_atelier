<?php
/**
 * ============================================================================
 * FURNISHME BACKEND INSTRUCTION GUIDELINE - COMPOSE JOURNAL ARTICLE
 * ============================================================================
 * FILE: admin/blog_create.php
 * PURPOSE: Handles creation of new journal editorial essays, processes cover
 *          photograph uploads, and inserts records into the 'blogs' table.
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
 * 3. Handle POST Request with File Upload:
 *    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
 *        $title   = trim($_POST['title'] ?? '');
 *        $author  = trim($_POST['author'] ?? 'Atelier Editorial Staff');
 *        $content = trim($_POST['content'] ?? '');
 * 
 *        // Validation
 *        if (empty($title) || empty($content)) {
 *            $error = "Both article title and body content are required.";
 *        } elseif (!isset($_FILES['image']) || $_FILES['image']['error'] !== UPLOAD_ERR_OK) {
 *            $error = "Please upload a high-resolution article cover visual.";
 *        } else {
 *            $ext = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
 *            $allowed_exts = ['jpg', 'jpeg', 'png', 'webp'];
 * 
 *            if (!in_array($ext, $allowed_exts)) {
 *                $error = "Only JPG, PNG, and WEBP image formats are supported.";
 *            } else {
 *                $unique_image = 'blog-' . time() . '-' . rand(100, 999) . '.' . $ext;
 *                $destination  = '../images/' . $unique_image;
 * 
 *                if (move_uploaded_file($_FILES['image']['tmp_name'], $destination)) {
 *                    $stmt = $connection->prepare("INSERT INTO blogs (title, author, image, content) VALUES (?, ?, ?, ?)");
 *                    $stmt->bind_param("ssss", $title, $author, $unique_image, $content);
 *                    
 *                    if ($stmt->execute()) {
 *                        $stmt->close();
 *                        header("Location: blog.php?msg=created");
 *                        exit;
 *                    } else {
 *                        $error = "Failed to save journal article: " . $connection->error;
 *                    }
 *                } else {
 *                    $error = "Failed to move uploaded visual to ../images/";
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
    <title>Create Journal Article | FurnishMe Admin</title>
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
                            <span class="text-[#FAF6EE] font-medium">New Post</span>
                        </div>
                        <h2 class="font-serif text-2xl sm:text-3xl font-medium text-[#FAF6EE]">Compose Journal Article</h2>
                    </div>
                    <a href="blog.php" class="px-4 py-2 rounded-xl border border-[#2A231C] text-xs font-medium text-[#D6C8B4] hover:bg-white transition-colors">
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
                         PHP BACKEND GUIDELINE: Blog Post Creation Form
                         - Action: action="" (submits to self)
                         - Method: POST
                         - Enctype: multipart/form-data
                         ========================================================== -->
                    <form action="" method="POST" enctype="multipart/form-data" class="space-y-6">
                        
                        <!-- Title -->
                        <div class="space-y-1.5">
                            <label for="title" class="block text-xs font-semibold uppercase tracking-wider text-[#D6C8B4]">
                                Article Title <span class="text-rose-600">*</span>
                            </label>
                            <input type="text" id="title" name="title" required value="<?= htmlspecialchars($_POST['title'] ?? '') ?>" placeholder="e.g. The Philosophy of Wabi-Sabi in Modern Interiors" class="w-full px-4 py-3 bg-[#0D0B09] border border-[#2A231C] rounded-xl text-[#FAF6EE] text-sm placeholder-[#8C7D6B] focus:outline-none focus:ring-2 focus:ring-[#C5A059] focus:border-[#C5A059] transition-all">
                        </div>

                        <!-- Author -->
                        <div class="space-y-1.5">
                            <label for="author" class="block text-xs font-semibold uppercase tracking-wider text-[#D6C8B4]">
                                Author Name or Byline <span class="text-rose-600">*</span>
                            </label>
                            <div class="relative">
                                <i class="ri-user-line absolute left-4 top-1/2 -translate-y-1/2 text-stone-400 text-base"></i>
                                <input type="text" id="author" name="author" required placeholder="e.g. Atelier Editorial Staff" value="<?= htmlspecialchars($_POST['author'] ?? 'Atelier Editorial Staff') ?>" class="w-full pl-11 pr-4 py-3 bg-[#0D0B09] border border-[#2A231C] rounded-xl text-[#FAF6EE] text-sm placeholder-[#8C7D6B] focus:outline-none focus:ring-2 focus:ring-[#C5A059] focus:border-[#C5A059] transition-all">
                            </div>
                        </div>

                        <!-- Cover Image Dropzone -->
                        <div class="space-y-1.5">
                            <label class="block text-xs font-semibold uppercase tracking-wider text-[#D6C8B4]">
                                Header Photography <span class="text-rose-600">*</span>
                            </label>
                            <div class="border-2 border-dashed border-[#2A231C] rounded-2xl p-6 text-center hover:border-amber-800 transition-colors bg-[#0D0B09]">
                                <div class="max-w-xs mx-auto flex flex-col items-center">
                                    <i class="ri-image-add-line text-3xl text-[#C5A059] mb-2"></i>
                                    <span class="text-xs font-medium text-[#D6C8B4]">Upload high-resolution article visual</span>
                                    <span class="text-[11px] text-stone-400 mt-0.5">Recommended landscape ratio 16:10</span>
                                    <input type="file" id="image" name="image" accept="image/*" required data-preview-target="blog-preview" class="mt-4 text-xs text-[#8C7D6B] file:mr-3 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-medium file:bg-stone-900 file:text-white hover:file:bg-amber-900 file:cursor-pointer cursor-pointer">
                                </div>
                                <div class="mt-4 flex justify-center">
                                    <img id="blog-preview" src="" alt="Cover preview" class="hidden w-40 h-24 object-cover rounded-xl border border-[#2A231C]">
                                </div>
                            </div>
                        </div>

                        <!-- Content Body -->
                        <div class="space-y-1.5">
                            <label for="content" class="block text-xs font-semibold uppercase tracking-wider text-[#D6C8B4]">
                                Journal Essay Body <span class="text-rose-600">*</span>
                            </label>
                            <textarea id="content" name="content" rows="8" required placeholder="Write your long-form craft essay, reflections on natural materials, and spatial philosophies..." class="w-full p-4 bg-[#0D0B09] border border-[#2A231C] rounded-xl text-[#FAF6EE] text-sm placeholder-[#8C7D6B] focus:outline-none focus:ring-2 focus:ring-[#C5A059] focus:border-[#C5A059] transition-all"><?= htmlspecialchars($_POST['content'] ?? '') ?></textarea>
                        </div>

                        <!-- Actions -->
                        <div class="pt-4 border-t border-[#2A231C] flex items-center justify-end gap-3">
                            <a href="blog.php" class="px-5 py-3 rounded-xl border border-[#2A231C] text-xs font-medium text-[#D6C8B4] hover:bg-[#0D0B09] transition-colors">
                                Cancel
                            </a>
                            <button type="submit" name="submit" class="px-6 py-3 rounded-xl bg-[#C5A059] hover:bg-[#D4AF37] text-[#0D0B09] text-xs font-semibold transition-colors shadow-xs flex items-center gap-2">
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

    <?php include "components/js.php"; ?>
</body>

</html>
