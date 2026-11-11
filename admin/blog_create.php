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

                <!-- Form Card -->
                <div class="bg-[#161310] rounded-3xl border border-[#2A231C] p-6 sm:p-10 shadow-xs">
                    <!-- [PHP_BACKEND_HOOK: Blog post creation handler. Method: POST, enctype="multipart/form-data". Upload cover image to images/ directory, sanitize inputs, execute INSERT INTO blogs (title, author, image, content, created_at)] -->
                    <form method="POST" enctype="multipart/form-data" class="space-y-6">
                        
                        <!-- Title -->
                        <div class="space-y-1.5">
                            <label for="title" class="block text-xs font-semibold uppercase tracking-wider text-[#D6C8B4]">
                                Article Title <span class="text-rose-600">*</span>
                            </label>
                            <input type="text" id="title" name="title" required placeholder="e.g. The Philosophy of Wabi-Sabi in Modern Interiors" class="w-full px-4 py-3 bg-[#0D0B09] border border-[#2A231C] rounded-xl text-[#FAF6EE] text-sm placeholder-[#8C7D6B] focus:outline-none focus:ring-2 focus:ring-[#C5A059] focus:border-[#C5A059] transition-all">
                        </div>

                        <!-- Author -->
                        <div class="space-y-1.5">
                            <label for="author" class="block text-xs font-semibold uppercase tracking-wider text-[#D6C8B4]">
                                Author Name or Byline <span class="text-rose-600">*</span>
                            </label>
                            <div class="relative">
                                <i class="ri-user-line absolute left-4 top-1/2 -translate-y-1/2 text-stone-400 text-base"></i>
                                <input type="text" id="author" name="author" required placeholder="e.g. Atelier Editorial Staff" value="admin" class="w-full pl-11 pr-4 py-3 bg-[#0D0B09] border border-[#2A231C] rounded-xl text-[#FAF6EE] text-sm placeholder-[#8C7D6B] focus:outline-none focus:ring-2 focus:ring-[#C5A059] focus:border-[#C5A059] transition-all">
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
                                    <span class="text-[11px] text-stone-400 mt-0.5">JPG or PNG (recommended aspect ratio 16:10)</span>
                                    <input type="file" id="image" name="image" accept="image/*" required data-preview-target="blog-preview" class="mt-4 text-xs text-[#8C7D6B] file:mr-3 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-medium file:bg-stone-900 file:text-white hover:file:bg-amber-900 file:cursor-pointer cursor-pointer">
                                </div>
                                <div class="mt-4 flex justify-center">
                                    <img id="blog-preview" src="" alt="Cover preview" class="hidden w-40 h-24 object-cover rounded-xl border border-[#2A231C] shadow-xs">
                                </div>
                            </div>
                        </div>

                        <!-- Content -->
                        <div class="space-y-1.5">
                            <label for="content" class="block text-xs font-semibold uppercase tracking-wider text-[#D6C8B4]">
                                Article Content &amp; Essay Text <span class="text-rose-600">*</span>
                            </label>
                            <textarea id="content" name="content" rows="8" required placeholder="Write the editorial essay, material exploration, or interview text..." class="w-full p-4 bg-[#0D0B09] border border-[#2A231C] rounded-xl text-[#FAF6EE] text-sm placeholder-[#8C7D6B] focus:outline-none focus:ring-2 focus:ring-[#C5A059] focus:border-[#C5A059] transition-all"></textarea>
                        </div>

                        <!-- Form Actions -->
                        <div class="pt-4 border-t border-[#2A231C] flex items-center justify-end gap-3">
                            <a href="blog.php" class="px-5 py-3 rounded-xl border border-[#2A231C] text-xs font-medium text-[#D6C8B4] hover:bg-[#0D0B09] transition-colors">
                                Cancel
                            </a>
                            <button type="submit" name="create" class="px-6 py-3 rounded-xl bg-[#C5A059] hover:bg-[#D4AF37] text-[#0D0B09] font-semibold text-xs font-medium transition-colors shadow-xs flex items-center gap-2">
                                <i class="ri-check-line text-sm"></i>
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
