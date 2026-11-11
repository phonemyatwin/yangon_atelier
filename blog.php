<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Atelier Journal | FurnishMe</title>
    <link rel="icon" href="images/favicon.ico">
    <?php include "components/css.php"; ?>
</head>

<body class="bg-[#FAFAFA] text-zinc-900 font-sans selection:bg-zinc-900 selection:text-white">
    <?php include "components/header.php"; ?>
    <?php include "components/navbar.php"; ?>

    <!-- PAGE HEADER BREADCRUMB -->
    <header class="bg-zinc-100/80 border-b border-zinc-200/80 py-12 lg:py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <nav class="flex items-center gap-2 text-xs font-medium text-zinc-500 mb-3" aria-label="Breadcrumb">
                <a href="index.php" class="hover:text-zinc-900 transition-colors">Home</a>
                <span class="text-zinc-400">/</span>
                <span class="text-zinc-900">The Atelier Journal</span>
            </nav>
            <div class="max-w-3xl">
                <h1 class="font-serif text-3xl sm:text-4xl lg:text-5xl font-normal tracking-tight text-zinc-900">
                    Chronicles of Craft, Wood &amp; Sanctuary.
                </h1>
                <p class="text-sm sm:text-base text-zinc-600 mt-3 leading-relaxed">
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
            <article class="group bg-white rounded-3xl border border-zinc-200 overflow-hidden shadow-xs hover:shadow-xl transition-all duration-500 flex flex-col justify-between">
                <div>
                    <a href="blog_detail.php?id=1" class="relative aspect-[16/10] overflow-hidden bg-zinc-100 block">
                        <img src="images/blog-minimalist-spaces.jpg" alt="The Philosophy of Wabi-Sabi in Modern Interiors" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" loading="lazy">
                        <span class="absolute top-4 left-4 inline-flex items-center px-3 py-1 rounded-full text-[11px] font-semibold bg-white/95 backdrop-blur-md text-zinc-800 border border-zinc-200/80 shadow-xs">
                            Philosophy
                        </span>
                    </a>
                    <div class="p-6">
                        <div class="flex items-center gap-3 text-xs text-zinc-500 mb-3">
                            <span class="flex items-center gap-1"><i class="ri-calendar-line text-zinc-400"></i> May 21, 2026</span>
                            <span class="w-1 h-1 rounded-full bg-zinc-300"></span>
                            <span>4 min read</span>
                        </div>
                        <h2 class="font-serif text-xl font-normal text-zinc-900 group-hover:text-amber-900 transition-colors leading-snug">
                            <a href="blog_detail.php?id=1">The Philosophy of Wabi-Sabi in Modern Interiors</a>
                        </h2>
                        <p class="text-sm text-zinc-600 line-clamp-3 mt-3 leading-relaxed">
                            How embracing natural grain knots, textured linens, and imperfect clay forms fosters sanctuary within contemporary urban homes.
                        </p>
                    </div>
                </div>
                <div class="px-6 pb-6 pt-4 border-t border-zinc-100 flex items-center justify-between">
                    <div class="flex items-center gap-2">
                        <span class="w-7 h-7 rounded-full bg-zinc-100 text-zinc-700 flex items-center justify-center text-xs font-semibold">ED</span>
                        <span class="text-xs font-medium text-zinc-700">Editorial Staff</span>
                    </div>
                    <a href="blog_detail.php?id=1" class="text-xs font-semibold text-zinc-900 hover:text-amber-900 inline-flex items-center gap-1 group-hover:translate-x-0.5 transition-transform">
                        <span>Read</span>
                        <i class="ri-arrow-right-line"></i>
                    </a>
                </div>
            </article>

            <!-- Journal Post 2 -->
            <article class="group bg-white rounded-3xl border border-zinc-200 overflow-hidden shadow-xs hover:shadow-xl transition-all duration-500 flex flex-col justify-between">
                <div>
                    <a href="blog_detail.php?id=2" class="relative aspect-[16/10] overflow-hidden bg-zinc-100 block">
                        <img src="images/blog-sustainable-wood.jpg" alt="Joinery Without Nails: The Heritage of Wood Craft" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" loading="lazy">
                        <span class="absolute top-4 left-4 inline-flex items-center px-3 py-1 rounded-full text-[11px] font-semibold bg-white/95 backdrop-blur-md text-zinc-800 border border-zinc-200/80 shadow-xs">
                            Artisanship
                        </span>
                    </a>
                    <div class="p-6">
                        <div class="flex items-center gap-3 text-xs text-zinc-500 mb-3">
                            <span class="flex items-center gap-1"><i class="ri-calendar-line text-zinc-400"></i> Apr 28, 2026</span>
                            <span class="w-1 h-1 rounded-full bg-zinc-300"></span>
                            <span>6 min read</span>
                        </div>
                        <h2 class="font-serif text-xl font-normal text-zinc-900 group-hover:text-amber-900 transition-colors leading-snug">
                            <a href="blog_detail.php?id=2">Joinery Without Nails: The Heritage of Wood Craft</a>
                        </h2>
                        <p class="text-sm text-zinc-600 line-clamp-3 mt-3 leading-relaxed">
                            A deep look inside our workshop where master carpenters shape interlocking joints that withstand temperature shifts for generations.
                        </p>
                    </div>
                </div>
                <div class="px-6 pb-6 pt-4 border-t border-zinc-100 flex items-center justify-between">
                    <div class="flex items-center gap-2">
                        <span class="w-7 h-7 rounded-full bg-zinc-100 text-zinc-700 flex items-center justify-center text-xs font-semibold">AM</span>
                        <span class="text-xs font-medium text-zinc-700">Aung Myo Tun</span>
                    </div>
                    <a href="blog_detail.php?id=2" class="text-xs font-semibold text-zinc-900 hover:text-amber-900 inline-flex items-center gap-1 group-hover:translate-x-0.5 transition-transform">
                        <span>Read</span>
                        <i class="ri-arrow-right-line"></i>
                    </a>
                </div>
            </article>

            <!-- Journal Post 3 -->
            <article class="group bg-white rounded-3xl border border-zinc-200 overflow-hidden shadow-xs hover:shadow-xl transition-all duration-500 flex flex-col justify-between">
                <div>
                    <a href="blog_detail.php?id=3" class="relative aspect-[16/10] overflow-hidden bg-zinc-100 block">
                        <img src="images/blog-lighting-guide.jpg" alt="Sculpting Ambient Light in Living Rooms" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" loading="lazy">
                        <span class="absolute top-4 left-4 inline-flex items-center px-3 py-1 rounded-full text-[11px] font-semibold bg-white/95 backdrop-blur-md text-zinc-800 border border-zinc-200/80 shadow-xs">
                            Lighting
                        </span>
                    </a>
                    <div class="p-6">
                        <div class="flex items-center gap-3 text-xs text-zinc-500 mb-3">
                            <span class="flex items-center gap-1"><i class="ri-calendar-line text-zinc-400"></i> Apr 14, 2026</span>
                            <span class="w-1 h-1 rounded-full bg-zinc-300"></span>
                            <span>5 min read</span>
                        </div>
                        <h2 class="font-serif text-xl font-normal text-zinc-900 group-hover:text-amber-900 transition-colors leading-snug">
                            <a href="blog_detail.php?id=3">Sculpting Ambient Light in Living Rooms</a>
                        </h2>
                        <p class="text-sm text-zinc-600 line-clamp-3 mt-3 leading-relaxed">
                            How soft indirect fixtures and natural parchment shades change the emotional cadence of our domestic evenings.
                        </p>
                    </div>
                </div>
                <div class="px-6 pb-6 pt-4 border-t border-zinc-100 flex items-center justify-between">
                    <div class="flex items-center gap-2">
                        <span class="w-7 h-7 rounded-full bg-zinc-100 text-zinc-700 flex items-center justify-center text-xs font-semibold">TM</span>
                        <span class="text-xs font-medium text-zinc-700">Thiri May</span>
                    </div>
                    <a href="blog_detail.php?id=3" class="text-xs font-semibold text-zinc-900 hover:text-amber-900 inline-flex items-center gap-1 group-hover:translate-x-0.5 transition-transform">
                        <span>Read</span>
                        <i class="ri-arrow-right-line"></i>
                    </a>
                </div>
            </article>

            <!-- Journal Post 4 -->
            <article class="group bg-white rounded-3xl border border-zinc-200 overflow-hidden shadow-xs hover:shadow-xl transition-all duration-500 flex flex-col justify-between">
                <div>
                    <a href="blog_detail.php?id=4" class="relative aspect-[16/10] overflow-hidden bg-zinc-100 block">
                        <img src="images/blog-interior-tips.jpg" alt="The Ritual of Morning Tea & Minimalist Dining" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" loading="lazy">
                        <span class="absolute top-4 left-4 inline-flex items-center px-3 py-1 rounded-full text-[11px] font-semibold bg-white/95 backdrop-blur-md text-zinc-800 border border-zinc-200/80 shadow-xs">
                            Living Rituals
                        </span>
                    </a>
                    <div class="p-6">
                        <div class="flex items-center gap-3 text-xs text-zinc-500 mb-3">
                            <span class="flex items-center gap-1"><i class="ri-calendar-line text-zinc-400"></i> Mar 30, 2026</span>
                            <span class="w-1 h-1 rounded-full bg-zinc-300"></span>
                            <span>3 min read</span>
                        </div>
                        <h2 class="font-serif text-xl font-normal text-zinc-900 group-hover:text-amber-900 transition-colors leading-snug">
                            <a href="blog_detail.php?id=4">The Ritual of Morning Tea &amp; Minimalist Dining</a>
                        </h2>
                        <p class="text-sm text-zinc-600 line-clamp-3 mt-3 leading-relaxed">
                            Transforming the morning routine through uncluttered solid oak surfaces, tactile ceramic cups, and natural daylight.
                        </p>
                    </div>
                </div>
                <div class="px-6 pb-6 pt-4 border-t border-zinc-100 flex items-center justify-between">
                    <div class="flex items-center gap-2">
                        <span class="w-7 h-7 rounded-full bg-zinc-100 text-zinc-700 flex items-center justify-center text-xs font-semibold">ED</span>
                        <span class="text-xs font-medium text-zinc-700">Editorial Staff</span>
                    </div>
                    <a href="blog_detail.php?id=4" class="text-xs font-semibold text-zinc-900 hover:text-amber-900 inline-flex items-center gap-1 group-hover:translate-x-0.5 transition-transform">
                        <span>Read</span>
                        <i class="ri-arrow-right-line"></i>
                    </a>
                </div>
            </article>

            <!-- Journal Post 5 -->
            <article class="group bg-white rounded-3xl border border-zinc-200 overflow-hidden shadow-xs hover:shadow-xl transition-all duration-500 flex flex-col justify-between">
                <div>
                    <a href="blog_detail.php?id=5" class="relative aspect-[16/10] overflow-hidden bg-zinc-100 block">
                        <img src="images/blog-modern-styling.jpg" alt="Botanical Plant Waxes: Caring for Solid Wood" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" loading="lazy">
                        <span class="absolute top-4 left-4 inline-flex items-center px-3 py-1 rounded-full text-[11px] font-semibold bg-white/95 backdrop-blur-md text-zinc-800 border border-zinc-200/80 shadow-xs">
                            Maintenance
                        </span>
                    </a>
                    <div class="p-6">
                        <div class="flex items-center gap-3 text-xs text-zinc-500 mb-3">
                            <span class="flex items-center gap-1"><i class="ri-calendar-line text-zinc-400"></i> Mar 18, 2026</span>
                            <span class="w-1 h-1 rounded-full bg-zinc-300"></span>
                            <span>5 min read</span>
                        </div>
                        <h2 class="font-serif text-xl font-normal text-zinc-900 group-hover:text-amber-900 transition-colors leading-snug">
                            <a href="blog_detail.php?id=5">Botanical Plant Waxes: Caring for Solid Wood</a>
                        </h2>
                        <p class="text-sm text-zinc-600 line-clamp-3 mt-3 leading-relaxed">
                            Practical steps to protect unvarnished timber from dryness, humidity shifts, and everyday stains while preserving the velvet feel.
                        </p>
                    </div>
                </div>
                <div class="px-6 pb-6 pt-4 border-t border-zinc-100 flex items-center justify-between">
                    <div class="flex items-center gap-2">
                        <span class="w-7 h-7 rounded-full bg-zinc-100 text-zinc-700 flex items-center justify-center text-xs font-semibold">MK</span>
                        <span class="text-xs font-medium text-zinc-700">Min Khant Zaw</span>
                    </div>
                    <a href="blog_detail.php?id=5" class="text-xs font-semibold text-zinc-900 hover:text-amber-900 inline-flex items-center gap-1 group-hover:translate-x-0.5 transition-transform">
                        <span>Read</span>
                        <i class="ri-arrow-right-line"></i>
                    </a>
                </div>
            </article>

            <!-- Journal Post 6 -->
            <article class="group bg-white rounded-3xl border border-zinc-200 overflow-hidden shadow-xs hover:shadow-xl transition-all duration-500 flex flex-col justify-between">
                <div>
                    <a href="blog_detail.php?id=6" class="relative aspect-[16/10] overflow-hidden bg-zinc-100 block">
                        <img src="images/blog-color-palettes.jpg" alt="Designing Quiet Havens in High-Density Cities" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" loading="lazy">
                        <span class="absolute top-4 left-4 inline-flex items-center px-3 py-1 rounded-full text-[11px] font-semibold bg-white/95 backdrop-blur-md text-zinc-800 border border-zinc-200/80 shadow-xs">
                            Architecture
                        </span>
                    </a>
                    <div class="p-6">
                        <div class="flex items-center gap-3 text-xs text-zinc-500 mb-3">
                            <span class="flex items-center gap-1"><i class="ri-calendar-line text-zinc-400"></i> Feb 27, 2026</span>
                            <span class="w-1 h-1 rounded-full bg-zinc-300"></span>
                            <span>7 min read</span>
                        </div>
                        <h2 class="font-serif text-xl font-normal text-zinc-900 group-hover:text-amber-900 transition-colors leading-snug">
                            <a href="blog_detail.php?id=6">Designing Quiet Havens in High-Density Cities</a>
                        </h2>
                        <p class="text-sm text-zinc-600 line-clamp-3 mt-3 leading-relaxed">
                            How low-profile floor silhouettes and muted earth pigments buffer sensory fatigue in modern apartment dwellings.
                        </p>
                    </div>
                </div>
                <div class="px-6 pb-6 pt-4 border-t border-zinc-100 flex items-center justify-between">
                    <div class="flex items-center gap-2">
                        <span class="w-7 h-7 rounded-full bg-zinc-100 text-zinc-700 flex items-center justify-center text-xs font-semibold">KH</span>
                        <span class="text-xs font-medium text-zinc-700">Kyaw Zin Hein</span>
                    </div>
                    <a href="blog_detail.php?id=6" class="text-xs font-semibold text-zinc-900 hover:text-amber-900 inline-flex items-center gap-1 group-hover:translate-x-0.5 transition-transform">
                        <span>Read</span>
                        <i class="ri-arrow-right-line"></i>
                    </a>
                </div>
            </article>

        </div>

        <!-- JOURNAL PAGINATION -->
        <div class="mt-16 flex items-center justify-center gap-2 text-sm">
            <span class="w-10 h-10 rounded-xl bg-zinc-900 text-white flex items-center justify-center font-medium">1</span>
            <a href="blog.php?page=2" class="w-10 h-10 rounded-xl border border-zinc-200 text-zinc-700 hover:bg-zinc-100 flex items-center justify-center font-medium transition-colors">2</a>
            <a href="blog.php?page=2" class="w-10 h-10 rounded-xl border border-zinc-200 text-zinc-700 hover:bg-zinc-100 flex items-center justify-center font-medium transition-colors">
                <i class="ri-arrow-right-s-line text-lg"></i>
            </a>
        </div>
    </main>

    <?php include "components/footer.php"; ?>
    <?php include "components/js.php"; ?>
</body>

</html>
