<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Atelier Journal | FurnishMe</title>
    <link rel="icon" type="image/x-icon" href="images/favicon.ico?v=2">
    <link rel="icon" type="image/png" sizes="32x32" href="images/favicon-32x32.png?v=2">
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon-16x16.png?v=2">
    <link rel="apple-touch-icon" sizes="180x180" href="images/apple-touch-icon.png?v=2">
    <?php include "components/css.php"; ?>
</head>

<body class="bg-[#0D0B09] text-[#EDE4D7] font-sans selection:bg-[#C5A059] selection:text-[#0D0B09]">
    <?php include "components/header.php"; ?>
    <?php include "components/navbar.php"; ?>

    <!-- PAGE HEADER BREADCRUMB -->
    <header class="bg-[#110E0C] border-b border-[#221C16] py-12 lg:py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <nav class="flex items-center gap-2 text-xs font-medium text-[#8C7D6B] mb-3" aria-label="Breadcrumb">
                <a href="index.php" class="hover:text-[#FAF6EE] transition-colors">Home</a>
                <span class="text-stone-400">/</span>
                <span class="text-[#C5A059] font-semibold">The Atelier Journal</span>
            </nav>
            <div class="max-w-3xl">
                <h1 class="font-serif text-3xl sm:text-4xl lg:text-5xl font-normal tracking-tight text-[#FAF6EE]">
                    Chronicles of Craft, Wood &amp; Sanctuary.
                </h1>
                <p class="text-sm sm:text-base text-[#D6C8B4] mt-3 leading-relaxed">
                    Essays on spatial harmony, sustainable forestry, interior wabi-sabi philosophy, and tactile living.
                </p>
            </div>
        </div>
    </header>

    <!-- MAIN JOURNAL CONTENT -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 lg:py-24">
        <!-- [PHP_BACKEND_HOOK: Dynamic blog posts loop: SELECT * FROM blogs ORDER BY id DESC. Use foreach($blogs as $blog) to render: $blog['id'], $blog['title'], $blog['content'], $blog['image'], $blog['created_at']] -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 sm:gap-10">
            
            <!-- Journal Post 1 -->
            <article class="group bg-[#161310] rounded-3xl border border-[#2A231C] overflow-hidden shadow-xl hover:shadow-2xl hover:border-[#C5A059] transition-all duration-500 flex flex-col justify-between">
                <div>
                    <a href="blog_detail.php?id=1" class="relative aspect-[16/10] overflow-hidden bg-[#0D0B09] border-b border-[#221C16] block">
                        <img src="images/blog-minimalist-spaces.jpg" alt="The Philosophy of Wabi-Sabi in Modern Interiors" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" loading="lazy">
                        <span class="absolute top-4 left-4 inline-flex items-center px-3 py-1 rounded-full text-[11px] font-semibold bg-[#161310]/95 backdrop-blur-md text-[#C5A059] border border-[#2A231C] shadow-xs">
                            Philosophy
                        </span>
                    </a>
                    <div class="p-6">
                        <div class="flex items-center gap-3 text-xs text-[#8C7D6B] mb-3">
                            <span class="flex items-center gap-1"><i class="ri-calendar-line text-[#C5A059]"></i> May 21, 2026</span>
                            <span class="w-1 h-1 rounded-full bg-[#453A30]"></span>
                            <span>4 min read</span>
                        </div>
                        <h2 class="font-serif text-xl font-normal text-[#FAF6EE] group-hover:text-[#C5A059] transition-colors leading-snug">
                            <a href="blog_detail.php?id=1">The Philosophy of Wabi-Sabi in Modern Interiors</a>
                        </h2>
                        <p class="text-sm text-[#8C7D6B] line-clamp-3 mt-3 leading-relaxed">
                            How embracing natural grain knots, textured linens, and imperfect clay forms fosters sanctuary within contemporary urban homes.
                        </p>
                    </div>
                </div>
                <div class="px-6 pb-6 pt-4 border-t border-[#221C16] flex items-center justify-between">
                    <div class="flex items-center gap-2">
                        <span class="w-7 h-7 rounded-full bg-[#EFE9DF] text-[#C5A059] flex items-center justify-center text-xs font-semibold">ED</span>
                        <span class="text-xs font-medium text-[#D6C8B4]">Editorial Staff</span>
                    </div>
                    <a href="blog_detail.php?id=1" class="text-xs font-semibold text-stone-900 hover:text-[#C5A059] inline-flex items-center gap-1 group-hover:translate-x-0.5 transition-transform">
                        <span>Read</span>
                        <i class="ri-arrow-right-line"></i>
                    </a>
                </div>
            </article>

            <!-- Journal Post 2 -->
            <article class="group bg-[#161310] rounded-3xl border border-[#2A231C] overflow-hidden shadow-xl hover:shadow-2xl hover:border-[#C5A059] transition-all duration-500 flex flex-col justify-between">
                <div>
                    <a href="blog_detail.php?id=2" class="relative aspect-[16/10] overflow-hidden bg-[#0D0B09] border-b border-[#221C16] block">
                        <img src="images/blog-sustainable-wood.jpg" alt="Joinery Without Nails: The Heritage of Wood Craft" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" loading="lazy">
                        <span class="absolute top-4 left-4 inline-flex items-center px-3 py-1 rounded-full text-[11px] font-semibold bg-[#161310]/95 backdrop-blur-md text-[#C5A059] border border-[#2A231C] shadow-xs">
                            Artisanship
                        </span>
                    </a>
                    <div class="p-6">
                        <div class="flex items-center gap-3 text-xs text-[#8C7D6B] mb-3">
                            <span class="flex items-center gap-1"><i class="ri-calendar-line text-[#C5A059]"></i> Apr 28, 2026</span>
                            <span class="w-1 h-1 rounded-full bg-[#453A30]"></span>
                            <span>6 min read</span>
                        </div>
                        <h2 class="font-serif text-xl font-normal text-[#FAF6EE] group-hover:text-[#C5A059] transition-colors leading-snug">
                            <a href="blog_detail.php?id=2">Joinery Without Nails: The Heritage of Wood Craft</a>
                        </h2>
                        <p class="text-sm text-[#8C7D6B] line-clamp-3 mt-3 leading-relaxed">
                            A deep look inside our workshop where master carpenters shape interlocking joints that withstand temperature shifts for generations.
                        </p>
                    </div>
                </div>
                <div class="px-6 pb-6 pt-4 border-t border-[#221C16] flex items-center justify-between">
                    <div class="flex items-center gap-2">
                        <span class="w-7 h-7 rounded-full bg-[#EFE9DF] text-[#C5A059] flex items-center justify-center text-xs font-semibold">ST</span>
                        <span class="text-xs font-medium text-[#D6C8B4]">Su Thinzar Htet</span>
                    </div>
                    <a href="blog_detail.php?id=2" class="text-xs font-semibold text-stone-900 hover:text-[#C5A059] inline-flex items-center gap-1 group-hover:translate-x-0.5 transition-transform">
                        <span>Read</span>
                        <i class="ri-arrow-right-line"></i>
                    </a>
                </div>
            </article>

            <!-- Journal Post 3 -->
            <article class="group bg-[#161310] rounded-3xl border border-[#2A231C] overflow-hidden shadow-xl hover:shadow-2xl hover:border-[#C5A059] transition-all duration-500 flex flex-col justify-between">
                <div>
                    <a href="blog_detail.php?id=3" class="relative aspect-[16/10] overflow-hidden bg-[#0D0B09] border-b border-[#221C16] block">
                        <img src="images/blog-lighting-guide.jpg" alt="Sculpting Ambient Light in Living Rooms" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" loading="lazy">
                        <span class="absolute top-4 left-4 inline-flex items-center px-3 py-1 rounded-full text-[11px] font-semibold bg-[#161310]/95 backdrop-blur-md text-[#C5A059] border border-[#2A231C] shadow-xs">
                            Lighting
                        </span>
                    </a>
                    <div class="p-6">
                        <div class="flex items-center gap-3 text-xs text-[#8C7D6B] mb-3">
                            <span class="flex items-center gap-1"><i class="ri-calendar-line text-[#C5A059]"></i> Apr 14, 2026</span>
                            <span class="w-1 h-1 rounded-full bg-[#453A30]"></span>
                            <span>5 min read</span>
                        </div>
                        <h2 class="font-serif text-xl font-normal text-[#FAF6EE] group-hover:text-[#C5A059] transition-colors leading-snug">
                            <a href="blog_detail.php?id=3">Sculpting Ambient Light in Living Rooms</a>
                        </h2>
                        <p class="text-sm text-[#8C7D6B] line-clamp-3 mt-3 leading-relaxed">
                            How soft indirect fixtures and natural parchment shades change the emotional cadence of our domestic evenings.
                        </p>
                    </div>
                </div>
                <div class="px-6 pb-6 pt-4 border-t border-[#221C16] flex items-center justify-between">
                    <div class="flex items-center gap-2">
                        <span class="w-7 h-7 rounded-full bg-[#EFE9DF] text-[#C5A059] flex items-center justify-center text-xs font-semibold">TN</span>
                        <span class="text-xs font-medium text-[#D6C8B4]">Thae Nay Nwe Soe</span>
                    </div>
                    <a href="blog_detail.php?id=3" class="text-xs font-semibold text-stone-900 hover:text-[#C5A059] inline-flex items-center gap-1 group-hover:translate-x-0.5 transition-transform">
                        <span>Read</span>
                        <i class="ri-arrow-right-line"></i>
                    </a>
                </div>
            </article>

            <!-- Journal Post 4 -->
            <article class="group bg-[#161310] rounded-3xl border border-[#2A231C] overflow-hidden shadow-xl hover:shadow-2xl hover:border-[#C5A059] transition-all duration-500 flex flex-col justify-between">
                <div>
                    <a href="blog_detail.php?id=4" class="relative aspect-[16/10] overflow-hidden bg-[#0D0B09] border-b border-[#221C16] block">
                        <img src="images/blog-interior-tips.jpg" alt="The Ritual of Morning Tea & Minimalist Dining" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" loading="lazy">
                        <span class="absolute top-4 left-4 inline-flex items-center px-3 py-1 rounded-full text-[11px] font-semibold bg-[#161310]/95 backdrop-blur-md text-[#C5A059] border border-[#2A231C] shadow-xs">
                            Living Rituals
                        </span>
                    </a>
                    <div class="p-6">
                        <div class="flex items-center gap-3 text-xs text-[#8C7D6B] mb-3">
                            <span class="flex items-center gap-1"><i class="ri-calendar-line text-[#C5A059]"></i> Mar 30, 2026</span>
                            <span class="w-1 h-1 rounded-full bg-[#453A30]"></span>
                            <span>3 min read</span>
                        </div>
                        <h2 class="font-serif text-xl font-normal text-[#FAF6EE] group-hover:text-[#C5A059] transition-colors leading-snug">
                            <a href="blog_detail.php?id=4">The Ritual of Morning Tea &amp; Minimalist Dining</a>
                        </h2>
                        <p class="text-sm text-[#8C7D6B] line-clamp-3 mt-3 leading-relaxed">
                            Transforming the morning routine through uncluttered solid oak surfaces, tactile ceramic cups, and natural daylight.
                        </p>
                    </div>
                </div>
                <div class="px-6 pb-6 pt-4 border-t border-[#221C16] flex items-center justify-between">
                    <div class="flex items-center gap-2">
                        <span class="w-7 h-7 rounded-full bg-[#EFE9DF] text-[#C5A059] flex items-center justify-center text-xs font-semibold">ED</span>
                        <span class="text-xs font-medium text-[#D6C8B4]">Editorial Staff</span>
                    </div>
                    <a href="blog_detail.php?id=4" class="text-xs font-semibold text-stone-900 hover:text-[#C5A059] inline-flex items-center gap-1 group-hover:translate-x-0.5 transition-transform">
                        <span>Read</span>
                        <i class="ri-arrow-right-line"></i>
                    </a>
                </div>
            </article>

            <!-- Journal Post 5 -->
            <article class="group bg-[#161310] rounded-3xl border border-[#2A231C] overflow-hidden shadow-xl hover:shadow-2xl hover:border-[#C5A059] transition-all duration-500 flex flex-col justify-between">
                <div>
                    <a href="blog_detail.php?id=5" class="relative aspect-[16/10] overflow-hidden bg-[#0D0B09] border-b border-[#221C16] block">
                        <img src="images/blog-modern-styling.jpg" alt="Botanical Plant Waxes: Caring for Solid Wood" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" loading="lazy">
                        <span class="absolute top-4 left-4 inline-flex items-center px-3 py-1 rounded-full text-[11px] font-semibold bg-[#161310]/95 backdrop-blur-md text-[#C5A059] border border-[#2A231C] shadow-xs">
                            Maintenance
                        </span>
                    </a>
                    <div class="p-6">
                        <div class="flex items-center gap-3 text-xs text-[#8C7D6B] mb-3">
                            <span class="flex items-center gap-1"><i class="ri-calendar-line text-[#C5A059]"></i> Mar 18, 2026</span>
                            <span class="w-1 h-1 rounded-full bg-[#453A30]"></span>
                            <span>5 min read</span>
                        </div>
                        <h2 class="font-serif text-xl font-normal text-[#FAF6EE] group-hover:text-[#C5A059] transition-colors leading-snug">
                            <a href="blog_detail.php?id=5">Botanical Plant Waxes: Caring for Solid Wood</a>
                        </h2>
                        <p class="text-sm text-[#8C7D6B] line-clamp-3 mt-3 leading-relaxed">
                            Practical steps to protect unvarnished timber from dryness, humidity shifts, and everyday stains while preserving the velvet feel.
                        </p>
                    </div>
                </div>
                <div class="px-6 pb-6 pt-4 border-t border-[#221C16] flex items-center justify-between">
                    <div class="flex items-center gap-2">
                        <span class="w-7 h-7 rounded-full bg-[#EFE9DF] text-[#C5A059] flex items-center justify-center text-xs font-semibold">NA</span>
                        <span class="text-xs font-medium text-[#D6C8B4]">Nyi Nyi Aung</span>
                    </div>
                    <a href="blog_detail.php?id=5" class="text-xs font-semibold text-stone-900 hover:text-[#C5A059] inline-flex items-center gap-1 group-hover:translate-x-0.5 transition-transform">
                        <span>Read</span>
                        <i class="ri-arrow-right-line"></i>
                    </a>
                </div>
            </article>

            <!-- Journal Post 6 -->
            <article class="group bg-[#161310] rounded-3xl border border-[#2A231C] overflow-hidden shadow-xl hover:shadow-2xl hover:border-[#C5A059] transition-all duration-500 flex flex-col justify-between">
                <div>
                    <a href="blog_detail.php?id=6" class="relative aspect-[16/10] overflow-hidden bg-[#0D0B09] border-b border-[#221C16] block">
                        <img src="images/blog-color-palettes.jpg" alt="Designing Quiet Havens in High-Density Cities" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" loading="lazy">
                        <span class="absolute top-4 left-4 inline-flex items-center px-3 py-1 rounded-full text-[11px] font-semibold bg-[#161310]/95 backdrop-blur-md text-[#C5A059] border border-[#2A231C] shadow-xs">
                            Architecture
                        </span>
                    </a>
                    <div class="p-6">
                        <div class="flex items-center gap-3 text-xs text-[#8C7D6B] mb-3">
                            <span class="flex items-center gap-1"><i class="ri-calendar-line text-[#C5A059]"></i> Feb 27, 2026</span>
                            <span class="w-1 h-1 rounded-full bg-[#453A30]"></span>
                            <span>7 min read</span>
                        </div>
                        <h2 class="font-serif text-xl font-normal text-[#FAF6EE] group-hover:text-[#C5A059] transition-colors leading-snug">
                            <a href="blog_detail.php?id=6">Designing Quiet Havens in High-Density Cities</a>
                        </h2>
                        <p class="text-sm text-[#8C7D6B] line-clamp-3 mt-3 leading-relaxed">
                            How low-profile floor silhouettes and muted earth pigments buffer sensory fatigue in modern apartment dwellings.
                        </p>
                    </div>
                </div>
                <div class="px-6 pb-6 pt-4 border-t border-[#221C16] flex items-center justify-between">
                    <div class="flex items-center gap-2">
                        <span class="w-7 h-7 rounded-full bg-[#EFE9DF] text-[#C5A059] flex items-center justify-center text-xs font-semibold">PW</span>
                        <span class="text-xs font-medium text-[#D6C8B4]">Phone Myat Win</span>
                    </div>
                    <a href="blog_detail.php?id=6" class="text-xs font-semibold text-stone-900 hover:text-[#C5A059] inline-flex items-center gap-1 group-hover:translate-x-0.5 transition-transform">
                        <span>Read</span>
                        <i class="ri-arrow-right-line"></i>
                    </a>
                </div>
            </article>

        </div>

        <!-- JOURNAL PAGINATION -->
        <div class="mt-16 flex items-center justify-center gap-2 text-sm">
            <span class="w-10 h-10 rounded-xl bg-[#C5A059] text-[#0D0B09] font-semibold flex items-center justify-center font-medium shadow-xs">1</span>
            <a href="blog.php?page=2" class="w-10 h-10 rounded-xl border border-[#2A231C] text-[#D6C8B4] hover:bg-[#1D1914] hover:text-[#FAF6EE] bg-[#161310] flex items-center justify-center font-medium transition-colors">2</a>
            <a href="blog.php?page=2" class="w-10 h-10 rounded-xl border border-[#2A231C] text-[#D6C8B4] hover:bg-[#1D1914] hover:text-[#FAF6EE] bg-[#161310] flex items-center justify-center font-medium transition-colors">
                <i class="ri-arrow-right-s-line text-lg"></i>
            </a>
        </div>
    </main>

    <?php include "components/footer.php"; ?>
    <?php include "components/js.php"; ?>
</body>

</html>
