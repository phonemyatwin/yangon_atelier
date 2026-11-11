<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FurnishMe Atelier — Warm Minimalist Furniture &amp; Objects</title>
    <link rel="icon" href="images/favicon.ico">
    <?php include "components/css.php"; ?>
</head>

<body class="bg-[#FAF8F5] text-stone-900 font-sans selection:bg-amber-100 selection:text-amber-900">
    <?php include "components/header.php"; ?>
    <?php include "components/navbar.php"; ?>

    <!-- HERO SLIDER SECTION -->
    <!-- [PHP_BACKEND_HOOK: Featured Hero Slider Query (e.g., SELECT * FROM hero_slides WHERE active = 1 ORDER BY sort_order ASC)] -->
    <section class="relative bg-[#F4EFEA] border-b border-stone-200 overflow-hidden">
        <div class="relative min-h-[580px] lg:min-h-[660px] flex items-center">
            
            <!-- Slide 1 (Active by default) -->
            <div class="hero-slide absolute inset-0 flex items-center transition-opacity duration-700 ease-in-out opacity-100 z-10">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full py-12 lg:py-16">
                    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 items-center">
                        <div class="lg:col-span-7 space-y-6 text-left">
                            <div class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-white/80 border border-stone-200/80 text-xs tracking-wider uppercase font-medium text-stone-700">
                                <span class="w-2 h-2 rounded-full bg-amber-800"></span>
                                <span>Autumn Atelier Edition</span>
                            </div>
                            <h1 class="font-serif text-4xl sm:text-5xl lg:text-6xl font-medium tracking-tight text-stone-900 leading-[1.15]">
                                The Art of Quiet, Tactile Living.
                            </h1>
                            <p class="text-base sm:text-lg text-stone-600 max-w-xl font-normal leading-relaxed">
                                Experience organic silhouettes and sculpted solid woods handcrafted with century-old joinery traditions for the modern sanctuary.
                            </p>
                            <div class="flex flex-wrap items-center gap-4 pt-2">
                                <a href="shop.php" class="inline-flex items-center gap-2.5 px-7 py-3.5 rounded-xl bg-stone-900 hover:bg-amber-950 text-stone-50 font-medium text-sm transition-all shadow-sm hover:shadow">
                                    <span>Explore Collection</span>
                                    <i class="ri-arrow-right-line"></i>
                                </a>
                                <a href="about.php" class="inline-flex items-center gap-2 px-6 py-3.5 rounded-xl bg-white hover:bg-stone-100 text-stone-800 border border-stone-200 text-sm font-medium transition-colors">
                                    <span>Atelier Story</span>
                                </a>
                            </div>
                        </div>
                        <div class="lg:col-span-5 flex justify-center items-center">
                            <div class="relative w-full max-w-md aspect-square rounded-3xl bg-gradient-to-tr from-stone-200/40 to-transparent flex items-center justify-center p-6">
                                <img src="images/home-img-1.png" alt="Flexible Sculptural Chair" class="max-h-[460px] w-auto object-contain drop-shadow-2xl transition-transform duration-500 hover:scale-105" loading="lazy">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Slide 2 -->
            <div class="hero-slide absolute inset-0 flex items-center transition-opacity duration-700 ease-in-out opacity-0 pointer-events-none z-0">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full py-12 lg:py-16">
                    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 items-center">
                        <div class="lg:col-span-7 space-y-6 text-left">
                            <div class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-white/80 border border-stone-200/80 text-xs tracking-wider uppercase font-medium text-stone-700">
                                <span class="w-2 h-2 rounded-full bg-emerald-600"></span>
                                <span>New Nordic Arrivals</span>
                            </div>
                            <h2 class="font-serif text-4xl sm:text-5xl lg:text-6xl font-medium tracking-tight text-stone-900 leading-[1.15]">
                                Grounded in Nature, Designed to Endure.
                            </h2>
                            <p class="text-base sm:text-lg text-stone-600 max-w-xl font-normal leading-relaxed">
                                Form follows serenity. Each piece honors natural imperfections, certified teak, and breathable textured bouclé textiles.
                            </p>
                            <div class="flex flex-wrap items-center gap-4 pt-2">
                                <a href="shop.php" class="inline-flex items-center gap-2.5 px-7 py-3.5 rounded-xl bg-stone-900 hover:bg-amber-950 text-stone-50 font-medium text-sm transition-all shadow-sm hover:shadow">
                                    <span>Shop New Arrivals</span>
                                    <i class="ri-arrow-right-line"></i>
                                </a>
                                <a href="product_detail.php?id=2" class="inline-flex items-center gap-2 px-6 py-3.5 rounded-xl bg-white hover:bg-stone-100 text-stone-800 border border-stone-200 text-sm font-medium transition-colors">
                                    <span>View Feature Piece</span>
                                </a>
                            </div>
                        </div>
                        <div class="lg:col-span-5 flex justify-center items-center">
                            <div class="relative w-full max-w-md aspect-square rounded-3xl bg-gradient-to-tr from-stone-200/40 to-transparent flex items-center justify-center p-6">
                                <img src="images/home-img-2.png" alt="Curved Lounge Armchair" class="max-h-[460px] w-auto object-contain drop-shadow-2xl transition-transform duration-500 hover:scale-105" loading="lazy">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- Slider Controls -->
        <div class="absolute bottom-6 left-0 right-0 z-20">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex items-center justify-between">
                <!-- Dots / Indicators -->
                <div class="flex items-center gap-2">
                    <button type="button" aria-label="Slide 1" onclick="showSlide(0)" class="hero-dot h-2.5 w-8 rounded-full bg-stone-900 transition-all"></button>
                    <button type="button" aria-label="Slide 2" onclick="showSlide(1)" class="hero-dot h-2.5 w-2.5 rounded-full bg-stone-300 hover:bg-stone-400 transition-all"></button>
                </div>

                <!-- Navigation Arrow Buttons -->
                <div class="flex items-center gap-2">
                    <button type="button" id="slide-prev" onclick="prev()" aria-label="Previous Slide" class="w-11 h-11 rounded-full bg-white/90 hover:bg-white text-stone-800 border border-stone-200 shadow-sm flex items-center justify-center transition-colors">
                        <i class="ri-arrow-left-line text-lg"></i>
                    </button>
                    <button type="button" id="slide-next" onclick="next()" aria-label="Next Slide" class="w-11 h-11 rounded-full bg-white/90 hover:bg-white text-stone-800 border border-stone-200 shadow-sm flex items-center justify-center transition-colors">
                        <i class="ri-arrow-right-line text-lg"></i>
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- BENTO / EDITORIAL BANNERS -->
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 lg:py-20">
        <div class="text-center max-w-2xl mx-auto mb-12">
            <span class="text-xs uppercase tracking-[0.25em] text-stone-500 font-semibold block mb-2">Curated Spaces</span>
            <h2 class="font-serif text-3xl sm:text-4xl font-medium text-stone-900">Atmospheres of Calm &amp; Rest</h2>
        </div>

        <!-- [PHP_BACKEND_HOOK: Dynamic banner collection loop or seasonal promotional query] -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 lg:gap-8">
            <!-- Banner 1 -->
            <a href="shop.php?category=dining" class="group relative rounded-2xl overflow-hidden aspect-[4/5] bg-stone-200 block shadow-sm hover:shadow-xl transition-all">
                <img src="images/banner-1.jpg" alt="Living & Dining Atmosphere" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700 ease-out" loading="lazy">
                <div class="absolute inset-0 bg-gradient-to-t from-stone-950/80 via-stone-950/20 to-transparent"></div>
                <div class="absolute bottom-0 inset-x-0 p-6 sm:p-8 text-white space-y-2">
                    <span class="text-xs uppercase tracking-wider text-stone-300 font-medium">Dining &amp; Tables</span>
                    <h3 class="font-serif text-2xl font-medium leading-snug">The Communal Hearth</h3>
                    <div class="inline-flex items-center gap-1.5 text-xs font-medium text-stone-200 group-hover:text-white pt-2">
                        <span>Discover Editions</span>
                        <i class="ri-arrow-right-line transition-transform group-hover:translate-x-1"></i>
                    </div>
                </div>
            </a>

            <!-- Banner 2 -->
            <a href="shop.php?category=lounge" class="group relative rounded-2xl overflow-hidden aspect-[4/5] bg-stone-200 block shadow-sm hover:shadow-xl transition-all">
                <img src="images/banner-2.jpg" alt="Seating & Lounge Pieces" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700 ease-out" loading="lazy">
                <div class="absolute inset-0 bg-gradient-to-t from-stone-950/80 via-stone-950/20 to-transparent"></div>
                <div class="absolute bottom-0 inset-x-0 p-6 sm:p-8 text-white space-y-2">
                    <span class="text-xs uppercase tracking-wider text-stone-300 font-medium">Lounge &amp; Rest</span>
                    <h3 class="font-serif text-2xl font-medium leading-snug">Sculpted Solitude</h3>
                    <div class="inline-flex items-center gap-1.5 text-xs font-medium text-stone-200 group-hover:text-white pt-2">
                        <span>Discover Editions</span>
                        <i class="ri-arrow-right-line transition-transform group-hover:translate-x-1"></i>
                    </div>
                </div>
            </a>

            <!-- Banner 3 -->
            <a href="shop.php?category=lighting" class="group relative rounded-2xl overflow-hidden aspect-[4/5] bg-stone-200 block shadow-sm hover:shadow-xl transition-all">
                <img src="images/banner-3.jpg" alt="Atmospheric Lighting and Objects" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700 ease-out" loading="lazy">
                <div class="absolute inset-0 bg-gradient-to-t from-stone-950/80 via-stone-950/20 to-transparent"></div>
                <div class="absolute bottom-0 inset-x-0 p-6 sm:p-8 text-white space-y-2">
                    <span class="text-xs uppercase tracking-wider text-stone-300 font-medium">Objects &amp; Light</span>
                    <h3 class="font-serif text-2xl font-medium leading-snug">Shadow &amp; Warmth</h3>
                    <div class="inline-flex items-center gap-1.5 text-xs font-medium text-stone-200 group-hover:text-white pt-2">
                        <span>Discover Editions</span>
                        <i class="ri-arrow-right-line transition-transform group-hover:translate-x-1"></i>
                    </div>
                </div>
            </a>
        </div>
    </section>

    <!-- FEATURED PRODUCTS GRID -->
    <section class="bg-white border-y border-stone-200 py-16 lg:py-24">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row md:items-end justify-between mb-12 gap-4">
                <div>
                    <span class="text-xs uppercase tracking-[0.25em] text-stone-500 font-semibold block mb-2">Signature Craft</span>
                    <h2 class="font-serif text-3xl sm:text-4xl font-medium text-stone-900">Featured Atelier Pieces</h2>
                </div>
                <a href="shop.php" class="inline-flex items-center gap-2 text-sm font-medium text-stone-800 hover:text-amber-900 transition-colors">
                    <span>View Entire Catalog</span>
                    <i class="ri-arrow-right-line"></i>
                </a>
            </div>

            <!-- [PHP_BACKEND_HOOK: Dynamic product loop. Use foreach($products as $product) to render: $product['id'], $product['image'], $product['name'], $product['price'], $product['stock']] -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 sm:gap-8">
                <!-- Product 1 -->
                <div class="group bg-[#FAF8F5] rounded-2xl border border-stone-200/80 p-4 transition-all duration-300 hover:shadow-lg flex flex-col justify-between">
                    <div class="relative w-full aspect-square bg-stone-100 rounded-xl overflow-hidden flex items-center justify-center p-4">
                        <span class="absolute top-3 left-3 z-10 inline-flex items-center px-2.5 py-1 rounded-full text-[11px] font-medium bg-emerald-50 text-emerald-700 border border-emerald-200">
                            In Stock
                        </span>
                        <a href="product_detail.php?id=1" class="w-full h-full flex items-center justify-center">
                            <img src="images/product-1.png" alt="Flexible Chair" class="max-h-full max-w-full object-contain group-hover:scale-105 transition-transform duration-500" loading="lazy">
                        </a>
                        <div class="absolute inset-0 bg-stone-950/20 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center gap-2">
                            <a href="product_detail.php?id=1" class="w-10 h-10 rounded-full bg-white text-stone-900 hover:bg-stone-900 hover:text-white flex items-center justify-center shadow-md transition-colors" title="View Details">
                                <i class="ri-eye-line text-lg"></i>
                            </a>
                        </div>
                    </div>
                    <div class="pt-4 flex flex-col flex-1 justify-between">
                        <div>
                            <span class="text-[11px] uppercase tracking-wider text-stone-400 font-medium">Seating</span>
                            <h3 class="font-serif text-base font-medium text-stone-900 group-hover:text-amber-900 transition-colors mt-0.5">
                                <a href="product_detail.php?id=1">Flexible Lounge Chair</a>
                            </h3>
                        </div>
                        <div class="pt-3 flex items-center justify-between border-t border-stone-200/60 mt-3">
                            <span class="text-sm font-semibold text-stone-900">40,000 MMK</span>
                            <span class="text-xs text-stone-500">25 available</span>
                        </div>
                    </div>
                </div>

                <!-- Product 2 -->
                <div class="group bg-[#FAF8F5] rounded-2xl border border-stone-200/80 p-4 transition-all duration-300 hover:shadow-lg flex flex-col justify-between">
                    <div class="relative w-full aspect-square bg-stone-100 rounded-xl overflow-hidden flex items-center justify-center p-4">
                        <span class="absolute top-3 left-3 z-10 inline-flex items-center px-2.5 py-1 rounded-full text-[11px] font-medium bg-emerald-50 text-emerald-700 border border-emerald-200">
                            In Stock
                        </span>
                        <a href="product_detail.php?id=2" class="w-full h-full flex items-center justify-center">
                            <img src="images/product-2.png" alt="Modern Armchair" class="max-h-full max-w-full object-contain group-hover:scale-105 transition-transform duration-500" loading="lazy">
                        </a>
                        <div class="absolute inset-0 bg-stone-950/20 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center gap-2">
                            <a href="product_detail.php?id=2" class="w-10 h-10 rounded-full bg-white text-stone-900 hover:bg-stone-900 hover:text-white flex items-center justify-center shadow-md transition-colors" title="View Details">
                                <i class="ri-eye-line text-lg"></i>
                            </a>
                        </div>
                    </div>
                    <div class="pt-4 flex flex-col flex-1 justify-between">
                        <div>
                            <span class="text-[11px] uppercase tracking-wider text-stone-400 font-medium">Armchairs</span>
                            <h3 class="font-serif text-base font-medium text-stone-900 group-hover:text-amber-900 transition-colors mt-0.5">
                                <a href="product_detail.php?id=2">Curved Bouclé Armchair</a>
                            </h3>
                        </div>
                        <div class="pt-3 flex items-center justify-between border-t border-stone-200/60 mt-3">
                            <span class="text-sm font-semibold text-stone-900">40,000 MMK</span>
                            <span class="text-xs text-stone-500">50 available</span>
                        </div>
                    </div>
                </div>

                <!-- Product 3 -->
                <div class="group bg-[#FAF8F5] rounded-2xl border border-stone-200/80 p-4 transition-all duration-300 hover:shadow-lg flex flex-col justify-between">
                    <div class="relative w-full aspect-square bg-stone-100 rounded-xl overflow-hidden flex items-center justify-center p-4">
                        <span class="absolute top-3 left-3 z-10 inline-flex items-center px-2.5 py-1 rounded-full text-[11px] font-medium bg-amber-50 text-amber-700 border border-amber-200">
                            Low Stock
                        </span>
                        <a href="product_detail.php?id=3" class="w-full h-full flex items-center justify-center">
                            <img src="images/product-3.png" alt="Minimalist Table" class="max-h-full max-w-full object-contain group-hover:scale-105 transition-transform duration-500" loading="lazy">
                        </a>
                        <div class="absolute inset-0 bg-stone-950/20 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center gap-2">
                            <a href="product_detail.php?id=3" class="w-10 h-10 rounded-full bg-white text-stone-900 hover:bg-stone-900 hover:text-white flex items-center justify-center shadow-md transition-colors" title="View Details">
                                <i class="ri-eye-line text-lg"></i>
                            </a>
                        </div>
                    </div>
                    <div class="pt-4 flex flex-col flex-1 justify-between">
                        <div>
                            <span class="text-[11px] uppercase tracking-wider text-stone-400 font-medium">Tables</span>
                            <h3 class="font-serif text-base font-medium text-stone-900 group-hover:text-amber-900 transition-colors mt-0.5">
                                <a href="product_detail.php?id=3">Sculpted Oak Side Table</a>
                            </h3>
                        </div>
                        <div class="pt-3 flex items-center justify-between border-t border-stone-200/60 mt-3">
                            <span class="text-sm font-semibold text-stone-900">40,000 MMK</span>
                            <span class="text-xs text-stone-500">8 available</span>
                        </div>
                    </div>
                </div>

                <!-- Product 4 -->
                <div class="group bg-[#FAF8F5] rounded-2xl border border-stone-200/80 p-4 transition-all duration-300 hover:shadow-lg flex flex-col justify-between">
                    <div class="relative w-full aspect-square bg-stone-100 rounded-xl overflow-hidden flex items-center justify-center p-4">
                        <span class="absolute top-3 left-3 z-10 inline-flex items-center px-2.5 py-1 rounded-full text-[11px] font-medium bg-emerald-50 text-emerald-700 border border-emerald-200">
                            In Stock
                        </span>
                        <a href="product_detail.php?id=4" class="w-full h-full flex items-center justify-center">
                            <img src="images/product-4.png" alt="Dining Chair" class="max-h-full max-w-full object-contain group-hover:scale-105 transition-transform duration-500" loading="lazy">
                        </a>
                        <div class="absolute inset-0 bg-stone-950/20 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center gap-2">
                            <a href="product_detail.php?id=4" class="w-10 h-10 rounded-full bg-white text-stone-900 hover:bg-stone-900 hover:text-white flex items-center justify-center shadow-md transition-colors" title="View Details">
                                <i class="ri-eye-line text-lg"></i>
                            </a>
                        </div>
                    </div>
                    <div class="pt-4 flex flex-col flex-1 justify-between">
                        <div>
                            <span class="text-[11px] uppercase tracking-wider text-stone-400 font-medium">Dining</span>
                            <h3 class="font-serif text-base font-medium text-stone-900 group-hover:text-amber-900 transition-colors mt-0.5">
                                <a href="product_detail.php?id=4">Atelier Spindle Dining Chair</a>
                            </h3>
                        </div>
                        <div class="pt-3 flex items-center justify-between border-t border-stone-200/60 mt-3">
                            <span class="text-sm font-semibold text-stone-900">40,000 MMK</span>
                            <span class="text-xs text-stone-500">50 available</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- BRAND PILLARS / PHILOSOPHY -->
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
        <div class="bg-[#F2ECE4] rounded-3xl p-8 sm:p-12 lg:p-16 border border-stone-200/70">
            <div class="max-w-3xl mb-12">
                <span class="text-xs uppercase tracking-[0.25em] text-stone-500 font-semibold block mb-2">Our Craft Manifesto</span>
                <h2 class="font-serif text-3xl sm:text-4xl text-stone-900 font-medium leading-tight">
                    Rooted in the calm of Scandinavian proportion, elevated by the reverence of Japanese woodwork.
                </h2>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 pt-4 border-t border-stone-300/60">
                <div class="space-y-3">
                    <div class="w-10 h-10 rounded-xl bg-white flex items-center justify-center text-stone-900 text-lg shadow-sm">
                        <i class="ri-seedling-line"></i>
                    </div>
                    <h3 class="font-serif text-lg font-semibold text-stone-900">Sustainable Sourcing</h3>
                    <p class="text-sm text-stone-600 leading-relaxed">
                        Every timber beam is responsibly extracted from PEFC and FSC-certified regional forestry concessions.
                    </p>
                </div>
                <div class="space-y-3">
                    <div class="w-10 h-10 rounded-xl bg-white flex items-center justify-center text-stone-900 text-lg shadow-sm">
                        <i class="ri-hammer-line"></i>
                    </div>
                    <h3 class="font-serif text-lg font-semibold text-stone-900">Tactile Craft</h3>
                    <p class="text-sm text-stone-600 leading-relaxed">
                        Hand-planed surfaces, natural plant oil finishes, and mortise-and-tenon joints celebrate real touch.
                    </p>
                </div>
                <div class="space-y-3">
                    <div class="w-10 h-10 rounded-xl bg-white flex items-center justify-center text-stone-900 text-lg shadow-sm">
                        <i class="ri-infinity-line"></i>
                    </div>
                    <h3 class="font-serif text-lg font-semibold text-stone-900">Timeless Longevity</h3>
                    <p class="text-sm text-stone-600 leading-relaxed">
                        Conceived to outlive seasonal fads and mature with a warm, distinctive patina through decades of use.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- JOURNAL / BLOG PREVIEW -->
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-24">
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-12 gap-4">
            <div>
                <span class="text-xs uppercase tracking-[0.25em] text-stone-500 font-semibold block mb-2">The Journal</span>
                <h2 class="font-serif text-3xl sm:text-4xl font-medium text-stone-900">Chronicles of Material &amp; Space</h2>
            </div>
            <a href="blog.php" class="inline-flex items-center gap-2 text-sm font-medium text-stone-800 hover:text-amber-900 transition-colors">
                <span>Read All Journal Entries</span>
                <i class="ri-arrow-right-line"></i>
            </a>
        </div>

        <!-- [PHP_BACKEND_HOOK: Dynamic blog posts query (SELECT * FROM blogs ORDER BY created_at DESC LIMIT 3)] -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Article 1 -->
            <article class="group bg-white rounded-2xl border border-stone-200 overflow-hidden shadow-sm hover:shadow-md transition-shadow flex flex-col">
                <a href="blog_detail.php?id=1" class="relative aspect-[16/10] overflow-hidden bg-stone-100 block">
                    <img src="images/blog-1.jpg" alt="The Philosophy of Wabi-Sabi in Modern Interiors" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" loading="lazy">
                </a>
                <div class="p-6 flex flex-col flex-1 justify-between">
                    <div class="space-y-3">
                        <div class="flex items-center gap-3 text-xs text-stone-500">
                            <span>May 21, 2026</span>
                            <span class="w-1 h-1 rounded-full bg-stone-300"></span>
                            <span>4 min read</span>
                        </div>
                        <h3 class="font-serif text-xl font-medium text-stone-900 group-hover:text-amber-900 transition-colors">
                            <a href="blog_detail.php?id=1">The Philosophy of Wabi-Sabi in Modern Interiors</a>
                        </h3>
                        <p class="text-sm text-stone-600 line-clamp-2 leading-relaxed">
                            How embracing natural grain knots, textured linens, and imperfect clay forms fosters sanctuary within contemporary urban homes.
                        </p>
                    </div>
                    <div class="pt-6 border-t border-stone-100 mt-6 flex items-center justify-between">
                        <div class="flex items-center gap-2 text-xs font-medium text-stone-700">
                            <i class="ri-user-line text-stone-400"></i>
                            <span>Atelier Editorial</span>
                        </div>
                        <a href="blog_detail.php?id=1" class="text-xs font-semibold text-stone-900 hover:text-amber-900 inline-flex items-center gap-1">
                            <span>Read</span>
                            <i class="ri-arrow-right-line"></i>
                        </a>
                    </div>
                </div>
            </article>

            <!-- Article 2 -->
            <article class="group bg-white rounded-2xl border border-stone-200 overflow-hidden shadow-sm hover:shadow-md transition-shadow flex flex-col">
                <a href="blog_detail.php?id=2" class="relative aspect-[16/10] overflow-hidden bg-stone-100 block">
                    <img src="images/blog-2.jpg" alt="Joinery Without Nails: The Heritage of Wood Craft" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" loading="lazy">
                </a>
                <div class="p-6 flex flex-col flex-1 justify-between">
                    <div class="space-y-3">
                        <div class="flex items-center gap-3 text-xs text-stone-500">
                            <span>Apr 28, 2026</span>
                            <span class="w-1 h-1 rounded-full bg-stone-300"></span>
                            <span>6 min read</span>
                        </div>
                        <h3 class="font-serif text-xl font-medium text-stone-900 group-hover:text-amber-900 transition-colors">
                            <a href="blog_detail.php?id=2">Joinery Without Nails: The Heritage of Wood Craft</a>
                        </h3>
                        <p class="text-sm text-stone-600 line-clamp-2 leading-relaxed">
                            A deep look inside our workshop where master carpenters shape interlocking joints that withstand temperature shifts for generations.
                        </p>
                    </div>
                    <div class="pt-6 border-t border-stone-100 mt-6 flex items-center justify-between">
                        <div class="flex items-center gap-2 text-xs font-medium text-stone-700">
                            <i class="ri-user-line text-stone-400"></i>
                            <span>Atelier Editorial</span>
                        </div>
                        <a href="blog_detail.php?id=2" class="text-xs font-semibold text-stone-900 hover:text-amber-900 inline-flex items-center gap-1">
                            <span>Read</span>
                            <i class="ri-arrow-right-line"></i>
                        </a>
                    </div>
                </div>
            </article>

            <!-- Article 3 -->
            <article class="group bg-white rounded-2xl border border-stone-200 overflow-hidden shadow-sm hover:shadow-md transition-shadow flex flex-col">
                <a href="blog_detail.php?id=3" class="relative aspect-[16/10] overflow-hidden bg-stone-100 block">
                    <img src="images/blog-3.jpg" alt="Sculpting Ambient Light in Living Rooms" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" loading="lazy">
                </a>
                <div class="p-6 flex flex-col flex-1 justify-between">
                    <div class="space-y-3">
                        <div class="flex items-center gap-3 text-xs text-stone-500">
                            <span>Apr 14, 2026</span>
                            <span class="w-1 h-1 rounded-full bg-stone-300"></span>
                            <span>5 min read</span>
                        </div>
                        <h3 class="font-serif text-xl font-medium text-stone-900 group-hover:text-amber-900 transition-colors">
                            <a href="blog_detail.php?id=3">Sculpting Ambient Light in Living Rooms</a>
                        </h3>
                        <p class="text-sm text-stone-600 line-clamp-2 leading-relaxed">
                            How soft indirect fixtures and natural parchment shades change the emotional cadence of our domestic evenings.
                        </p>
                    </div>
                    <div class="pt-6 border-t border-stone-100 mt-6 flex items-center justify-between">
                        <div class="flex items-center gap-2 text-xs font-medium text-stone-700">
                            <i class="ri-user-line text-stone-400"></i>
                            <span>Atelier Editorial</span>
                        </div>
                        <a href="blog_detail.php?id=3" class="text-xs font-semibold text-stone-900 hover:text-amber-900 inline-flex items-center gap-1">
                            <span>Read</span>
                            <i class="ri-arrow-right-line"></i>
                        </a>
                    </div>
                </div>
            </article>
        </div>
    </section>

    <?php include "components/footer.php"; ?>
    <?php include "components/js.php"; ?>
</body>

</html>
