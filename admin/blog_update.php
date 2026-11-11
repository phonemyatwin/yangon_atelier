<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Journal Article | FurnishMe Admin</title>
    <link rel="icon" href="../images/favicon.ico">
    <?php include "components/css.php"; ?>
</head>

<body class="bg-[#FAFAFA] text-zinc-900 font-sans antialiased selection:bg-zinc-900 selection:text-white">
    <div class="min-h-screen flex">
        <?php include "components/sidebar.php"; ?>

        <div class="lg:pl-64 flex flex-col flex-1 min-w-0">
            <?php include "components/topbar.php"; ?>

            <main class="flex-1 p-4 sm:p-6 lg:p-8 max-w-4xl w-full mx-auto space-y-6">
                
                <!-- Heading -->
                <div class="flex items-center justify-between">
                    <div>
                        <div class="flex items-center gap-2 text-xs text-zinc-500 mb-1">
                            <a href="dashboard.php" class="hover:text-zinc-900">Dashboard</a>
                            <span>/</span>
                            <a href="blog.php" class="hover:text-zinc-900">Journal</a>
                            <span>/</span>
                            <span class="text-zinc-800 font-medium">Edit Article</span>
                        </div>
                        <h2 class="font-serif text-2xl sm:text-3xl font-medium text-zinc-900">Edit Journal Article</h2>
                    </div>
                    <a href="blog.php" class="px-4 py-2 rounded-xl border border-zinc-200 text-xs font-medium text-zinc-700 hover:bg-white transition-colors">
                        Back to List
                    </a>
                </div>

                <!-- Form Card -->
                <div class="bg-white rounded-3xl border border-zinc-200 p-6 sm:p-10 shadow-xs">
                    <!-- [PHP_BACKEND_HOOK: Blog update handler. Method: POST, enctype="multipart/form-data". Optional cover image upload, UPDATE blogs SET title = :title, author = :author, content = :content WHERE id = :id] -->
                    <form method="POST" enctype="multipart/form-data" class="space-y-6">
                        <input type="hidden" name="id" value="1">

                        <!-- Title -->
                        <div class="space-y-1.5">
                            <label for="title" class="block text-xs font-semibold uppercase tracking-wider text-zinc-700">
                                Article Title <span class="text-rose-600">*</span>
                            </label>
                            <input type="text" id="title" name="title" required value="The Philosophy of Wabi-Sabi in Modern Interiors" class="w-full px-4 py-3 bg-zinc-50 border border-zinc-200 rounded-xl text-zinc-900 text-sm placeholder-zinc-400 focus:outline-none focus:ring-2 focus:ring-zinc-900 focus:border-zinc-900 transition-all">
                        </div>

                        <!-- Author -->
                        <div class="space-y-1.5">
                            <label for="author" class="block text-xs font-semibold uppercase tracking-wider text-zinc-700">
                                Author Byline <span class="text-rose-600">*</span>
                            </label>
                            <div class="relative">
                                <i class="ri-user-line absolute left-4 top-1/2 -translate-y-1/2 text-zinc-400 text-base"></i>
                                <input type="text" id="author" name="author" required value="admin" class="w-full pl-11 pr-4 py-3 bg-zinc-50 border border-zinc-200 rounded-xl text-zinc-900 text-sm placeholder-zinc-400 focus:outline-none focus:ring-2 focus:ring-zinc-900 focus:border-zinc-900 transition-all">
                            </div>
                        </div>

                        <!-- Current Image & Replace -->
                        <div class="space-y-1.5">
                            <label class="block text-xs font-semibold uppercase tracking-wider text-zinc-700">
                                Current Cover Visual &amp; Replacement
                            </label>
                            <div class="flex flex-col sm:flex-row items-center gap-6 p-4 rounded-2xl bg-zinc-50 border border-zinc-200">
                                <div class="w-32 h-20 rounded-xl bg-white border border-zinc-200 overflow-hidden flex-shrink-0">
                                    <!-- [PHP_BACKEND_HOOK: Display current blog post cover image] -->
                                    <img id="blog-preview" src="../images/blog-minimalist-spaces.jpg" alt="Cover visual" class="w-full h-full object-cover">
                                </div>
                                <div class="flex-1 space-y-1 text-center sm:text-left">
                                    <span class="text-xs font-medium text-zinc-800 block">Replace Cover (Optional)</span>
                                    <span class="text-[11px] text-zinc-400 block">Leave empty to keep the current photograph.</span>
                                    <input type="file" id="image" name="image" accept="image/*" data-preview-target="blog-preview" class="mt-2 text-xs text-zinc-500 file:mr-3 file:py-1.5 file:px-3 file:rounded-lg file:border-0 file:text-xs file:font-medium file:bg-zinc-900 file:text-white hover:file:bg-zinc-800 file:cursor-pointer cursor-pointer">
                                </div>
                            </div>
                        </div>

                        <!-- Content -->
                        <div class="space-y-1.5">
                            <label for="content" class="block text-xs font-semibold uppercase tracking-wider text-zinc-700">
                                Article Content &amp; Essay Text <span class="text-rose-600">*</span>
                            </label>
                            <textarea id="content" name="content" rows="8" required class="w-full p-4 bg-zinc-50 border border-zinc-200 rounded-xl text-zinc-900 text-sm placeholder-zinc-400 focus:outline-none focus:ring-2 focus:ring-zinc-900 focus:border-zinc-900 transition-all">In an era saturated by industrial high-gloss surfaces, clinical lines, and the constant digital flicker of notifications, our domestic environments have frequently sacrificed soul for sterile uniformity. Japanese philosophy offers an enduring antidote through the worldview of wabi-sabi...</textarea>
                        </div>

                        <!-- Form Actions -->
                        <div class="pt-4 border-t border-zinc-100 flex items-center justify-end gap-3">
                            <a href="blog.php" class="px-5 py-3 rounded-xl border border-zinc-200 text-xs font-medium text-zinc-700 hover:bg-zinc-50 transition-colors">
                                Cancel
                            </a>
                            <button type="submit" name="update" class="px-6 py-3 rounded-xl bg-zinc-900 hover:bg-zinc-800 text-white text-xs font-medium transition-colors shadow-xs flex items-center gap-2">
                                <i class="ri-save-line text-sm"></i>
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
