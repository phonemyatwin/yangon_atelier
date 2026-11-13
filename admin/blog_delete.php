<?php
/**
 * ============================================================================
 * FURNISHME BACKEND INSTRUCTION GUIDELINE - DELETE JOURNAL ARTICLE
 * ============================================================================
 * FILE: admin/blog_delete.php
 * PURPOSE: Confirms deletion of a journal essay, unlinks its cover photo from
 *          disk, and executes DELETE query against the 'blogs' table.
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
 * 3. Validate and Query Target Article:
 *    $id = isset($_GET['id']) ? (int)$_GET['id'] : (isset($_POST['id']) ? (int)$_POST['id'] : 0);
 *    if ($id <= 0) {
 *        header("Location: blog.php");
 *        exit;
 *    }
 *    $stmt = $connection->prepare("SELECT id, title, author, image, created_at FROM blogs WHERE id = ? LIMIT 1");
 *    $stmt->bind_param("i", $id);
 *    $stmt->execute();
 *    $blog = $stmt->get_result()->fetch_assoc();
 *    $stmt->close();
 *    if (!$blog) {
 *        header("Location: blog.php?error=not_found");
 *        exit;
 *    }
 * 
 * 4. Process POST Deletion:
 *    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete'])) {
 *        // Remove cover image from server
 *        if (!empty($blog['image'])) {
 *            $file = '../images/' . $blog['image'];
 *            if (file_exists($file)) { unlink($file); }
 *        }
 *        $del_stmt = $connection->prepare("DELETE FROM blogs WHERE id = ?");
 *        $del_stmt->bind_param("i", $id);
 *        if ($del_stmt->execute()) {
 *            $del_stmt->close();
 *            header("Location: blog.php?msg=deleted");
 *            exit;
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
    <title>Delete Journal Article | FurnishMe Atelier Admin</title>
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
                            <a href="blog.php" class="hover:text-[#FAF6EE]">Journal</a>
                            <span>/</span>
                            <span class="text-rose-600 font-medium">Delete</span>
                        </div>
                        <h2 class="font-serif text-2xl sm:text-3xl font-medium text-[#FAF6EE]">Confirm Article Removal</h2>
                    </div>
                    <a href="blog.php" class="px-4 py-2 rounded-xl border border-[#2A231C] text-xs font-medium text-[#D6C8B4] hover:bg-white transition-colors">
                        Cancel
                    </a>
                </div>

                <!-- Confirmation Card -->
                <div class="bg-white rounded-3xl border border-rose-200 p-6 sm:p-10 shadow-xs">
                    <div class="flex items-start gap-4 p-4 rounded-2xl bg-rose-50 border border-rose-100 mb-6">
                        <i class="ri-error-warning-line text-2xl text-rose-600 flex-shrink-0 mt-0.5"></i>
                        <div>
                            <h3 class="text-sm font-semibold text-rose-900">Permanent Article Removal</h3>
                            <p class="text-xs text-rose-700 mt-1 leading-relaxed">
                                Are you sure you wish to delete this journal entry? This will permanently remove the article from the public blog and unpublish the essay.
                            </p>
                        </div>
                    </div>

                    <!-- Article Details Summary -->
                    <!-- ==========================================================
                         PHP BACKEND GUIDELINE: Display Article Details
                         Render summary of article to be deleted:
                         - Image: ../images/<?= htmlspecialchars($blog['image'] ?? 'blog-minimalist-spaces.jpg') ?>
                         - Title: <?= htmlspecialchars($blog['title'] ?? '') ?>
                         - Author: <?= htmlspecialchars($blog['author'] ?? 'admin') ?>
                         ========================================================== -->
                    <div class="border border-[#2A231C] rounded-2xl p-5 mb-8 flex items-center gap-5">
                        <div class="w-24 h-16 rounded-xl bg-[#0D0B09] border border-[#2A231C] overflow-hidden flex-shrink-0">
                            <img src="../images/blog-minimalist-spaces.jpg" alt="Article cover" class="w-full h-full object-cover">
                        </div>
                        <div class="space-y-1 text-xs">
                            <span class="text-stone-400 font-mono">Article #<?= htmlspecialchars($_GET['id'] ?? '1') ?></span>
                            <h4 class="font-serif text-base font-medium text-stone-900">The Philosophy of Wabi-Sabi in Modern Interiors</h4>
                            <p class="text-stone-600">Author: <strong class="text-stone-900">admin</strong> • Published: <strong>May 21, 2026</strong></p>
                        </div>
                    </div>

                    <!-- ==========================================================
                         PHP BACKEND GUIDELINE: Deletion Form
                         - Action: action="" (submits to self)
                         - Method: POST
                         - Hidden id input: <input type="hidden" name="id" value="<?= $blog['id'] ?? 1 ?>">
                         ========================================================== -->
                    <form action="" method="POST" class="flex items-center justify-end gap-3 pt-4 border-t border-stone-200">
                        <input type="hidden" name="id" value="<?= htmlspecialchars($_GET['id'] ?? '1') ?>">
                        <a href="blog.php" class="px-5 py-2.5 rounded-xl border border-stone-300 text-xs font-medium text-stone-700 hover:bg-stone-50 transition-colors">
                            Cancel
                        </a>
                        <button type="submit" name="delete" class="px-5 py-2.5 rounded-xl bg-rose-600 hover:bg-rose-700 text-white text-xs font-medium transition-colors shadow-xs flex items-center gap-2">
                            <i class="ri-delete-bin-line text-sm"></i>
                            <span>Confirm &amp; Delete Article</span>
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
