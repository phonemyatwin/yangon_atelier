<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Journal Article | FurnishMe Admin</title>
    <link rel="icon" href="../images/favicon.ico">
    <?php include "components/css.php"; ?>
</head>

<body class="bg-[#FAFAFA] text-zinc-900 font-sans antialiased selection:bg-zinc-900 selection:text-white">
    <div class="min-h-screen flex">
        <?php include "components/sidebar.php"; ?>

        <div class="lg:pl-64 flex flex-col flex-1 min-w-0">
            <?php include "components/topbar.php"; ?>

            <main class="flex-1 p-4 sm:p-6 lg:p-8 max-w-3xl w-full mx-auto space-y-6">
                
                <!-- Heading -->
                <div class="flex items-center justify-between">
                    <div>
                        <div class="flex items-center gap-2 text-xs text-zinc-500 mb-1">
                            <a href="dashboard.php" class="hover:text-zinc-900">Dashboard</a>
                            <span>/</span>
                            <a href="blog.php" class="hover:text-zinc-900">Journal</a>
                            <span>/</span>
                            <span class="text-rose-600 font-medium">Delete</span>
                        </div>
                        <h2 class="font-serif text-2xl sm:text-3xl font-medium text-zinc-900">Confirm Article Deletion</h2>
                    </div>
                    <a href="blog.php" class="px-4 py-2 rounded-xl border border-zinc-200 text-xs font-medium text-zinc-700 hover:bg-white transition-colors">
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
                    <!-- [PHP_BACKEND_HOOK: Query blog details by ID for deletion confirmation (SELECT * FROM blogs WHERE id = :id)] -->
                    <div class="border border-zinc-200 rounded-2xl p-5 mb-8 flex items-center gap-5">
                        <div class="w-24 h-16 rounded-xl bg-zinc-100 border border-zinc-200 overflow-hidden flex-shrink-0">
                            <img src="../images/blog-minimalist-spaces.jpg" alt="Article cover" class="w-full h-full object-cover">
                        </div>
                        <div class="space-y-1 text-xs">
                            <span class="text-zinc-400 font-mono">Article #1</span>
                            <h4 class="font-serif text-base font-medium text-zinc-900">The Philosophy of Wabi-Sabi in Modern Interiors</h4>
                            <p class="text-zinc-500">Author: <strong class="text-zinc-800">admin</strong> • Published: <strong>May 21, 2026</strong></p>
                        </div>
                    </div>

                    <!-- [PHP_BACKEND_HOOK: Blog deletion handler. POST method, unlink image file if exists, execute DELETE FROM blogs WHERE id = :id] -->
                    <form method="POST" class="flex items-center justify-end gap-3 pt-4 border-t border-zinc-100">
                        <input type="hidden" name="id" value="1">
                        <a href="blog.php" class="px-5 py-2.5 rounded-xl border border-zinc-200 text-xs font-medium text-zinc-700 hover:bg-zinc-50 transition-colors">
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
