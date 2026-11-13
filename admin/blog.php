<?php
/**
 * ============================================================================
 * FURNISHME BACKEND INSTRUCTION GUIDELINE - ADMIN JOURNAL / BLOG LIST
 * ============================================================================
 * FILE: admin/blog.php
 * PURPOSE: Lists all editorial essays from the 'blogs' table and provides links
 *          to compose, edit, or delete articles.
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
 * 3. Handle Flash Notifications:
 *    $msg = $_GET['msg'] ?? '';
 *    if ($msg === 'created') $success = "Journal article published successfully.";
 *    if ($msg === 'updated') $success = "Journal article updated successfully.";
 *    if ($msg === 'deleted') $success = "Journal article deleted successfully.";
 * 
 * 4. Query Blog Articles:
 *    $res = $connection->query("SELECT id, title, author, image, category, created_at FROM blogs ORDER BY id DESC");
 *    $blogs = $res ? $res->fetch_all(MYSQLI_ASSOC) : [];
 * ============================================================================
 */

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['admin_user'])) {
    header("Location: index.php");
    exit;
}

$success = '';
if (isset($_GET['msg'])) {
    if ($_GET['msg'] === 'created') $success = "Journal article published successfully.";
    if ($_GET['msg'] === 'updated') $success = "Journal article updated successfully.";
    if ($_GET['msg'] === 'deleted') $success = "Journal article deleted successfully.";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Journal Management | FurnishMe Atelier Admin</title>
    <link rel="icon" type="image/x-icon" href="../images/favicon.ico">
    <?php include "components/css.php"; ?>
</head>

<body class="bg-[#0D0B09] text-[#EDE4D7] font-sans antialiased selection:bg-[#C5A059] selection:text-[#0D0B09]">
    <div class="min-h-screen flex">
        <?php include "components/sidebar.php"; ?>

        <div class="lg:pl-64 flex flex-col flex-1 min-w-0">
            <?php include "components/topbar.php"; ?>

            <main class="flex-1 p-4 sm:p-6 lg:p-8 max-w-7xl w-full mx-auto space-y-6">
                
                <!-- Page Action Header -->
                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                    <div>
                        <div class="flex items-center gap-2 text-xs text-[#8C7D6B] mb-1">
                            <a href="dashboard.php" class="hover:text-[#FAF6EE]">Dashboard</a>
                            <span>/</span>
                            <span class="text-[#FAF6EE] font-medium">Journal Posts</span>
                        </div>
                        <h2 class="font-serif text-2xl sm:text-3xl font-medium text-[#FAF6EE]">Atelier Journal &amp; Editorial</h2>
                    </div>
                    <a href="blog_create.php" class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl bg-[#C5A059] hover:bg-[#D4AF37] text-[#0D0B09] font-semibold text-xs font-medium transition-colors shadow-xs">
                        <i class="ri-add-line text-base"></i>
                        <span>New Journal Article</span>
                    </a>
                </div>

                <!-- ==============================================================
                     PHP BACKEND GUIDELINE: Success Notification Banner
                     ============================================================== -->
                <?php if (!empty($success)): ?>
                    <div class="p-4 rounded-2xl bg-emerald-950/60 border border-emerald-800 text-emerald-300 text-xs flex items-center gap-2.5">
                        <i class="ri-checkbox-circle-line text-lg flex-shrink-0"></i>
                        <span><?= htmlspecialchars($success) ?></span>
                    </div>
                <?php endif; ?>

                <!-- Blog Table Card -->
                <div class="bg-[#161310] rounded-3xl border border-[#2A231C] overflow-hidden shadow-xs">
                    <div class="p-5 border-b border-[#2A231C] flex flex-col sm:flex-row sm:items-center justify-between gap-3">
                        <div class="text-xs text-[#8C7D6B]">
                            Showing <strong><?= count($blogs ?? []) ?></strong> published editorial entries
                        </div>
                        <div class="relative sm:w-64">
                            <i class="ri-search-line absolute left-3 top-1/2 -translate-y-1/2 text-stone-400 text-xs"></i>
                            <input type="text" placeholder="Search articles..." class="w-full pl-8 pr-3 py-1.5 bg-[#0D0B09] border border-[#2A231C] rounded-lg text-xs placeholder-[#8C7D6B] focus:outline-none focus:ring-1 focus:ring-[#C5A059]">
                        </div>
                    </div>

                    <!-- ==========================================================
                         PHP BACKEND GUIDELINE: Dynamic Blog Articles Table Loop
                         Query: SELECT * FROM blogs ORDER BY id DESC
                         Loop through $blogs and render each row:
                         <?php /*
                         if (!empty($blogs)) {
                             foreach ($blogs as $blog) {
                                 ?>
                                 <tr class="hover:bg-[#161310] transition-colors">
                                     <td class="py-4 px-6 text-stone-400">#<?= $blog['id'] ?></td>
                                     <td class="py-4 px-6">
                                         <div class="w-16 h-11 rounded-lg bg-[#0D0B09] border border-[#2A231C] overflow-hidden">
                                             <img src="../images/<?= htmlspecialchars($blog['image']) ?>" alt="<?= htmlspecialchars($blog['title']) ?>" class="w-full h-full object-cover">
                                         </div>
                                     </td>
                                     <td class="py-4 px-6">
                                         <span class="font-semibold text-[#FAF6EE] block text-sm"><?= htmlspecialchars($blog['title']) ?></span>
                                         <span class="text-[11px] text-[#C5A059]"><?= htmlspecialchars($blog['category'] ?? 'Editorial') ?></span>
                                     </td>
                                     <td class="py-4 px-6 text-[#8C7D6B]"><?= htmlspecialchars($blog['author']) ?></td>
                                     <td class="py-4 px-6 text-[#8C7D6B]"><?= date("M d, Y", strtotime($blog['created_at'])) ?></td>
                                     <td class="py-4 px-6 text-right">
                                         <div class="inline-flex items-center gap-2">
                                             <a href="blog_update.php?id=<?= $blog['id'] ?>" class="px-2.5 py-1 rounded-lg border border-[#2A231C] hover:bg-[#0D0B09] text-[#D6C8B4] transition-colors flex items-center gap-1">
                                                 <i class="ri-pencil-line"></i> Edit
                                             </a>
                                             <a href="blog_delete.php?id=<?= $blog['id'] ?>" class="px-2.5 py-1 rounded-lg border border-rose-200 hover:bg-rose-50 text-rose-600 transition-colors flex items-center gap-1">
                                                 <i class="ri-delete-bin-line"></i> Delete
                                             </a>
                                         </div>
                                     </td>
                                 </tr>
                                 <?php
                             }
                         } else {
                             echo '<tr><td colspan="6" class="py-8 text-center text-stone-400">No blog articles found.</td></tr>';
                         }
                         */ ?>
                         ========================================================== -->
                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse text-xs">
                            <thead>
                                <tr class="bg-[#0D0B09] border-b border-[#2A231C] text-[#8C7D6B] uppercase tracking-wider font-semibold">
                                    <th class="py-3.5 px-6">ID</th>
                                    <th class="py-3.5 px-6">Header Image</th>
                                    <th class="py-3.5 px-6">Article Title</th>
                                    <th class="py-3.5 px-6">Author</th>
                                    <th class="py-3.5 px-6">Published</th>
                                    <th class="py-3.5 px-6 text-right">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-[#E2D8C9] text-[#D6C8B4] font-medium">
                                
                                <!-- Post 1 -->
                                <tr class="hover:bg-[#161310] transition-colors">
                                    <td class="py-4 px-6 text-stone-400">#1</td>
                                    <td class="py-4 px-6">
                                        <div class="w-16 h-11 rounded-lg bg-[#0D0B09] border border-[#2A231C] overflow-hidden">
                                            <img src="../images/blog-minimalist-spaces.jpg" alt="Article image" class="w-full h-full object-cover">
                                        </div>
                                    </td>
                                    <td class="py-4 px-6">
                                        <span class="font-semibold text-[#FAF6EE] block text-sm">The Philosophy of Wabi-Sabi in Modern Interiors</span>
                                        <span class="text-[11px] text-[#C5A059]">Philosophy • 4 min read</span>
                                    </td>
                                    <td class="py-4 px-6 text-[#D6C8B4]">Editorial Staff</td>
                                    <td class="py-4 px-6 text-[#8C7D6B]">2026-05-21</td>
                                    <td class="py-4 px-6 text-right">
                                        <div class="inline-flex items-center gap-2">
                                            <a href="blog_update.php?id=1" class="px-2.5 py-1 rounded-lg border border-[#2A231C] hover:bg-[#0D0B09] text-[#D6C8B4] transition-colors flex items-center gap-1">
                                                <i class="ri-pencil-line"></i> Edit
                                            </a>
                                            <a href="blog_delete.php?id=1" class="px-2.5 py-1 rounded-lg border border-rose-200 hover:bg-rose-50 text-rose-600 transition-colors flex items-center gap-1">
                                                <i class="ri-delete-bin-line"></i> Delete
                                            </a>
                                        </div>
                                    </td>
                                </tr>

                                <!-- Post 2 -->
                                <tr class="hover:bg-[#161310] transition-colors">
                                    <td class="py-4 px-6 text-stone-400">#2</td>
                                    <td class="py-4 px-6">
                                        <div class="w-16 h-11 rounded-lg bg-[#0D0B09] border border-[#2A231C] overflow-hidden">
                                            <img src="../images/blog-sustainable-wood.jpg" alt="Article image" class="w-full h-full object-cover">
                                        </div>
                                    </td>
                                    <td class="py-4 px-6">
                                        <span class="font-semibold text-[#FAF6EE] block text-sm">Joinery Without Nails: The Heritage of Wood Craft</span>
                                        <span class="text-[11px] text-[#C5A059]">Artisanship • 6 min read</span>
                                    </td>
                                    <td class="py-4 px-6 text-[#D6C8B4]">Su Thinzar Htet</td>
                                    <td class="py-4 px-6 text-[#8C7D6B]">2026-04-28</td>
                                    <td class="py-4 px-6 text-right">
                                        <div class="inline-flex items-center gap-2">
                                            <a href="blog_update.php?id=2" class="px-2.5 py-1 rounded-lg border border-[#2A231C] hover:bg-[#0D0B09] text-[#D6C8B4] transition-colors flex items-center gap-1">
                                                <i class="ri-pencil-line"></i> Edit
                                            </a>
                                            <a href="blog_delete.php?id=2" class="px-2.5 py-1 rounded-lg border border-rose-200 hover:bg-rose-50 text-rose-600 transition-colors flex items-center gap-1">
                                                <i class="ri-delete-bin-line"></i> Delete
                                            </a>
                                        </div>
                                    </td>
                                </tr>

                                <!-- Post 3 -->
                                <tr class="hover:bg-[#161310] transition-colors">
                                    <td class="py-4 px-6 text-stone-400">#3</td>
                                    <td class="py-4 px-6">
                                        <div class="w-16 h-11 rounded-lg bg-[#0D0B09] border border-[#2A231C] overflow-hidden">
                                            <img src="../images/blog-lighting-guide.jpg" alt="Article image" class="w-full h-full object-cover">
                                        </div>
                                    </td>
                                    <td class="py-4 px-6">
                                        <span class="font-semibold text-[#FAF6EE] block text-sm">Sculpting Ambient Light in Living Rooms</span>
                                        <span class="text-[11px] text-[#C5A059]">Lighting • 5 min read</span>
                                    </td>
                                    <td class="py-4 px-6 text-[#D6C8B4]">Thae Nay Nwe Soe</td>
                                    <td class="py-4 px-6 text-[#8C7D6B]">2026-04-14</td>
                                    <td class="py-4 px-6 text-right">
                                        <div class="inline-flex items-center gap-2">
                                            <a href="blog_update.php?id=3" class="px-2.5 py-1 rounded-lg border border-[#2A231C] hover:bg-[#0D0B09] text-[#D6C8B4] transition-colors flex items-center gap-1">
                                                <i class="ri-pencil-line"></i> Edit
                                            </a>
                                            <a href="blog_delete.php?id=3" class="px-2.5 py-1 rounded-lg border border-rose-200 hover:bg-rose-50 text-rose-600 transition-colors flex items-center gap-1">
                                                <i class="ri-delete-bin-line"></i> Delete
                                            </a>
                                        </div>
                                    </td>
                                </tr>

                                <!-- Post 4 -->
                                <tr class="hover:bg-[#161310] transition-colors">
                                    <td class="py-4 px-6 text-stone-400">#4</td>
                                    <td class="py-4 px-6">
                                        <div class="w-16 h-11 rounded-lg bg-[#0D0B09] border border-[#2A231C] overflow-hidden">
                                            <img src="../images/blog-interior-tips.jpg" alt="Article image" class="w-full h-full object-cover">
                                        </div>
                                    </td>
                                    <td class="py-4 px-6">
                                        <span class="font-semibold text-[#FAF6EE] block text-sm">The Ritual of Morning Tea &amp; Minimalist Dining</span>
                                        <span class="text-[11px] text-[#C5A059]">Lifestyle • 4 min read</span>
                                    </td>
                                    <td class="py-4 px-6 text-[#D6C8B4]">Myat Chal Oo</td>
                                    <td class="py-4 px-6 text-[#8C7D6B]">2026-03-30</td>
                                    <td class="py-4 px-6 text-right">
                                        <div class="inline-flex items-center gap-2">
                                            <a href="blog_update.php?id=4" class="px-2.5 py-1 rounded-lg border border-[#2A231C] hover:bg-[#0D0B09] text-[#D6C8B4] transition-colors flex items-center gap-1">
                                                <i class="ri-pencil-line"></i> Edit
                                            </a>
                                            <a href="blog_delete.php?id=4" class="px-2.5 py-1 rounded-lg border border-rose-200 hover:bg-rose-50 text-rose-600 transition-colors flex items-center gap-1">
                                                <i class="ri-delete-bin-line"></i> Delete
                                            </a>
                                        </div>
                                    </td>
                                </tr>

                                <!-- Post 5 -->
                                <tr class="hover:bg-[#161310] transition-colors">
                                    <td class="py-4 px-6 text-stone-400">#5</td>
                                    <td class="py-4 px-6">
                                        <div class="w-16 h-11 rounded-lg bg-[#0D0B09] border border-[#2A231C] overflow-hidden">
                                            <img src="../images/blog-modern-styling.jpg" alt="Article image" class="w-full h-full object-cover">
                                        </div>
                                    </td>
                                    <td class="py-4 px-6">
                                        <span class="font-semibold text-[#FAF6EE] block text-sm">Botanical Plant Waxes: Caring for Solid Wood</span>
                                        <span class="text-[11px] text-[#C5A059]">Care • 7 min read</span>
                                    </td>
                                    <td class="py-4 px-6 text-[#D6C8B4]">Nyi Nyi Aung</td>
                                    <td class="py-4 px-6 text-[#8C7D6B]">2026-03-18</td>
                                    <td class="py-4 px-6 text-right">
                                        <div class="inline-flex items-center gap-2">
                                            <a href="blog_update.php?id=5" class="px-2.5 py-1 rounded-lg border border-[#2A231C] hover:bg-[#0D0B09] text-[#D6C8B4] transition-colors flex items-center gap-1">
                                                <i class="ri-pencil-line"></i> Edit
                                            </a>
                                            <a href="blog_delete.php?id=5" class="px-2.5 py-1 rounded-lg border border-rose-200 hover:bg-rose-50 text-rose-600 transition-colors flex items-center gap-1">
                                                <i class="ri-delete-bin-line"></i> Delete
                                            </a>
                                        </div>
                                    </td>
                                </tr>

                                <!-- Post 6 -->
                                <tr class="hover:bg-[#161310] transition-colors">
                                    <td class="py-4 px-6 text-stone-400">#6</td>
                                    <td class="py-4 px-6">
                                        <div class="w-16 h-11 rounded-lg bg-[#0D0B09] border border-[#2A231C] overflow-hidden">
                                            <img src="../images/blog-color-palettes.jpg" alt="Article image" class="w-full h-full object-cover">
                                        </div>
                                    </td>
                                    <td class="py-4 px-6">
                                        <span class="font-semibold text-[#FAF6EE] block text-sm">Designing Quiet Havens in High-Density Cities</span>
                                        <span class="text-[11px] text-[#C5A059]">Interior • 5 min read</span>
                                    </td>
                                    <td class="py-4 px-6 text-[#D6C8B4]">Phone Myat Win</td>
                                    <td class="py-4 px-6 text-[#8C7D6B]">2026-02-25</td>
                                    <td class="py-4 px-6 text-right">
                                        <div class="inline-flex items-center gap-2">
                                            <a href="blog_update.php?id=6" class="px-2.5 py-1 rounded-lg border border-[#2A231C] hover:bg-[#0D0B09] text-[#D6C8B4] transition-colors flex items-center gap-1">
                                                <i class="ri-pencil-line"></i> Edit
                                            </a>
                                            <a href="blog_delete.php?id=6" class="px-2.5 py-1 rounded-lg border border-rose-200 hover:bg-rose-50 text-rose-600 transition-colors flex items-center gap-1">
                                                <i class="ri-delete-bin-line"></i> Delete
                                            </a>
                                        </div>
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>

            </main>

            <?php include "components/footer.php"; ?>
        </div>
    </div>

    <?php include "components/js.php"; ?>
</body>

</html>
