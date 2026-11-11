<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop Atelier Furniture | FurnishMe</title>
    <link rel="icon" type="image/x-icon" href="images/favicon.ico?v=2">
    <link rel="icon" type="image/png" sizes="32x32" href="images/favicon-32x32.png?v=2">
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon-16x16.png?v=2">
    <link rel="apple-touch-icon" sizes="180x180" href="images/apple-touch-icon.png?v=2">
    <?php include "components/css.php"; ?>
</head>

<body class="bg-[#FAF8F5] text-stone-900 font-sans selection:bg-amber-900 selection:text-white">
    <?php include "components/header.php"; ?>
    <?php include "components/navbar.php"; ?>

    <!-- PAGE HEADER BREADCRUMB -->
    <header class="bg-[#F4EFE8] border-b border-stone-200 py-12 lg:py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <nav class="flex items-center gap-2 text-xs font-medium text-stone-500 mb-3" aria-label="Breadcrumb">
                <a href="index.php" class="hover:text-stone-900 transition-colors">Home</a>
                <span class="text-stone-400">/</span>
                <span class="text-stone-900">Shop Atelier</span>
            </nav>
            <div class="flex flex-col md:flex-row md:items-end justify-between gap-4">
                <div>
                    <h1 class="font-serif text-3xl sm:text-4xl lg:text-5xl font-normal tracking-tight text-stone-900">
                        The Furniture Collection
                    </h1>
                    <p class="text-sm sm:text-base text-stone-600 max-w-xl mt-2 leading-relaxed">
                        Thoughtfully scaled architectural essentials made from solid walnut, natural oak, and textured tactile fabrics.
                    </p>
                </div>
                <div class="text-xs text-stone-500">
                    Showing <strong id="product-count" class="text-stone-900 font-semibold">29</strong> curated atelier pieces
                </div>
            </div>
        </div>
    </header>

    <!-- SHOPPING CONTROLS & FILTER BAR -->
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- [PHP_BACKEND_HOOK: Category filter & Sorting handler form (GET params: category, sort, search)] -->
        <div class="bg-white border border-stone-200 rounded-2xl p-4 sm:p-5 shadow-xs flex flex-col lg:flex-row items-stretch lg:items-center justify-between gap-4">
            
            <!-- Category Filter Pills -->
            <!-- [PHP_BACKEND_HOOK: Category filter query (e.g., WHERE category = :cat ORDER BY price ASC)] -->
            <div class="flex items-center gap-2 overflow-x-auto pb-2 lg:pb-0 scrollbar-none" id="category-filters">
                <button type="button" data-filter="all" class="filter-btn px-4 py-2 rounded-xl text-xs font-medium bg-stone-900 text-white transition-colors whitespace-nowrap shadow-xs">
                    All Pieces
                </button>
                <button type="button" data-filter="chairs" class="filter-btn px-4 py-2 rounded-xl text-xs font-medium bg-stone-100 text-stone-700 hover:bg-stone-200/80 transition-colors whitespace-nowrap">
                    Chairs
                </button>
                <button type="button" data-filter="sofas" class="filter-btn px-4 py-2 rounded-xl text-xs font-medium bg-stone-100 text-stone-700 hover:bg-stone-200/80 transition-colors whitespace-nowrap">
                    Sofas &amp; Lounge
                </button>
                <button type="button" data-filter="tables" class="filter-btn px-4 py-2 rounded-xl text-xs font-medium bg-stone-100 text-stone-700 hover:bg-stone-200/80 transition-colors whitespace-nowrap">
                    Tables &amp; Desks
                </button>
                <button type="button" data-filter="beds" class="filter-btn px-4 py-2 rounded-xl text-xs font-medium bg-stone-100 text-stone-700 hover:bg-stone-200/80 transition-colors whitespace-nowrap">
                    Beds &amp; Tatami
                </button>
                <button type="button" data-filter="objects" class="filter-btn px-4 py-2 rounded-xl text-xs font-medium bg-stone-100 text-stone-700 hover:bg-stone-200/80 transition-colors whitespace-nowrap">
                    Lighting &amp; Objects
                </button>
            </div>

            <!-- Search Mockup and Sort Dropdown -->
            <div class="flex items-center gap-3">
                <div class="relative flex-1 sm:w-64">
                    <i class="ri-search-line absolute left-3.5 top-1/2 -translate-y-1/2 text-stone-400 text-sm"></i>
                    <input type="text" id="catalog-search" placeholder="Filter in catalog..." class="w-full pl-9 pr-3 py-2 bg-stone-50 border border-stone-200 rounded-xl text-xs text-stone-800 placeholder-stone-400 focus:outline-none focus:ring-1 focus:ring-amber-900">
                </div>
                
                <div class="relative">
                    <select id="catalog-sort" aria-label="Sort products" class="appearance-none pl-4 pr-9 py-2 bg-stone-50 border border-stone-200 rounded-xl text-xs font-medium text-stone-700 focus:outline-none focus:ring-1 focus:ring-amber-900 cursor-pointer">
                        <option value="featured">Sort: Featured</option>
                        <option value="price_asc">Price: Low to High</option>
                        <option value="price_desc">Price: High to Low</option>
                        <option value="name_asc">Name: A to Z</option>
                    </select>
                    <i class="ri-arrow-down-s-line absolute right-3 top-1/2 -translate-y-1/2 text-stone-400 text-sm pointer-events-none"></i>
                </div>
            </div>

        </div>
    </section>

    <!-- PRODUCTS GRID -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-24">
        <!-- [PHP_BACKEND_HOOK: Dynamic product catalog loop. Use foreach($products as $product) to render: $product[id], $product[image], $product[name], $product[price], $product[stock], $product[category]] -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 sm:gap-8" id="product-grid">
            <!-- Product Item 1: Nordic Solid Wood Armchair -->
            <article class="product-card group bg-white rounded-2xl border border-stone-200 overflow-hidden transition-all duration-300 hover:shadow-xl hover:border-amber-900/40 flex flex-col justify-between" data-category="chairs" data-price="420000" data-name="nordic solid wood armchair">
                <div class="relative w-full aspect-[4/3] bg-stone-100 overflow-hidden flex items-center justify-center">
                    <span class="absolute top-3 left-3 z-10 inline-flex items-center px-2.5 py-1 rounded-full text-[11px] font-medium bg-emerald-50 text-emerald-800 border-emerald-200 border">
                        In Stock
                    </span>
                    <a href="product_detail.php?id=1" class="w-full h-full block">
                        <img src="images/chair-1.jpg" alt="Nordic Solid Wood Armchair" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" loading="lazy">
                    </a>
                    <div class="absolute inset-0 bg-stone-950/20 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center gap-2">
                        <a href="product_detail.php?id=1" class="w-10 h-10 rounded-full bg-white text-stone-900 hover:bg-stone-900 hover:text-white flex items-center justify-center shadow-md transition-colors" title="View Details">
                            <i class="ri-eye-line text-lg"></i>
                        </a>
                    </div>
                </div>
                <div class="p-5 flex flex-col flex-1 justify-between">
                    <div>
                        <span class="text-[11px] uppercase tracking-wider text-amber-800 font-medium">Chairs & Seating</span>
                        <h3 class="font-serif text-base font-normal text-stone-900 group-hover:text-amber-900 transition-colors mt-0.5">
                            <a href="product_detail.php?id=1">Nordic Solid Wood Armchair</a>
                        </h3>
                    </div>
                    <div class="pt-4 flex items-center justify-between border-t border-stone-100 mt-4">
                        <span class="text-sm font-semibold text-stone-900">420,000 MMK</span>
                        <span class="text-xs text-stone-500">25 in stock</span>
                    </div>
                </div>
            </article>

            <!-- Product Item 2: Curved Lounge Armchair -->
            <article class="product-card group bg-white rounded-2xl border border-stone-200 overflow-hidden transition-all duration-300 hover:shadow-xl hover:border-amber-900/40 flex flex-col justify-between" data-category="chairs" data-price="580000" data-name="curved lounge armchair">
                <div class="relative w-full aspect-[4/3] bg-stone-100 overflow-hidden flex items-center justify-center">
                    <span class="absolute top-3 left-3 z-10 inline-flex items-center px-2.5 py-1 rounded-full text-[11px] font-medium bg-emerald-50 text-emerald-800 border-emerald-200 border">
                        In Stock
                    </span>
                    <a href="product_detail.php?id=2" class="w-full h-full block">
                        <img src="images/chair-2.jpg" alt="Curved Lounge Armchair" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" loading="lazy">
                    </a>
                    <div class="absolute inset-0 bg-stone-950/20 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center gap-2">
                        <a href="product_detail.php?id=2" class="w-10 h-10 rounded-full bg-white text-stone-900 hover:bg-stone-900 hover:text-white flex items-center justify-center shadow-md transition-colors" title="View Details">
                            <i class="ri-eye-line text-lg"></i>
                        </a>
                    </div>
                </div>
                <div class="p-5 flex flex-col flex-1 justify-between">
                    <div>
                        <span class="text-[11px] uppercase tracking-wider text-amber-800 font-medium">Lounge & Seating</span>
                        <h3 class="font-serif text-base font-normal text-stone-900 group-hover:text-amber-900 transition-colors mt-0.5">
                            <a href="product_detail.php?id=2">Curved Lounge Armchair</a>
                        </h3>
                    </div>
                    <div class="pt-4 flex items-center justify-between border-t border-stone-100 mt-4">
                        <span class="text-sm font-semibold text-stone-900">580,000 MMK</span>
                        <span class="text-xs text-stone-500">50 in stock</span>
                    </div>
                </div>
            </article>

            <!-- Product Item 3: Scandi Minimalist Dining Chair -->
            <article class="product-card group bg-white rounded-2xl border border-stone-200 overflow-hidden transition-all duration-300 hover:shadow-xl hover:border-amber-900/40 flex flex-col justify-between" data-category="chairs" data-price="260000" data-name="scandi minimalist dining chair">
                <div class="relative w-full aspect-[4/3] bg-stone-100 overflow-hidden flex items-center justify-center">
                    <span class="absolute top-3 left-3 z-10 inline-flex items-center px-2.5 py-1 rounded-full text-[11px] font-medium bg-emerald-50 text-emerald-800 border-emerald-200 border">
                        In Stock
                    </span>
                    <a href="product_detail.php?id=3" class="w-full h-full block">
                        <img src="images/chair-3.jpg" alt="Scandi Minimalist Dining Chair" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" loading="lazy">
                    </a>
                    <div class="absolute inset-0 bg-stone-950/20 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center gap-2">
                        <a href="product_detail.php?id=3" class="w-10 h-10 rounded-full bg-white text-stone-900 hover:bg-stone-900 hover:text-white flex items-center justify-center shadow-md transition-colors" title="View Details">
                            <i class="ri-eye-line text-lg"></i>
                        </a>
                    </div>
                </div>
                <div class="p-5 flex flex-col flex-1 justify-between">
                    <div>
                        <span class="text-[11px] uppercase tracking-wider text-amber-800 font-medium">Chairs & Seating</span>
                        <h3 class="font-serif text-base font-normal text-stone-900 group-hover:text-amber-900 transition-colors mt-0.5">
                            <a href="product_detail.php?id=3">Scandi Minimalist Dining Chair</a>
                        </h3>
                    </div>
                    <div class="pt-4 flex items-center justify-between border-t border-stone-100 mt-4">
                        <span class="text-sm font-semibold text-stone-900">260,000 MMK</span>
                        <span class="text-xs text-stone-500">36 in stock</span>
                    </div>
                </div>
            </article>

            <!-- Product Item 4: Rattan Occasional Lounge Chair -->
            <article class="product-card group bg-white rounded-2xl border border-stone-200 overflow-hidden transition-all duration-300 hover:shadow-xl hover:border-amber-900/40 flex flex-col justify-between" data-category="chairs" data-price="490000" data-name="rattan occasional lounge chair">
                <div class="relative w-full aspect-[4/3] bg-stone-100 overflow-hidden flex items-center justify-center">
                    <span class="absolute top-3 left-3 z-10 inline-flex items-center px-2.5 py-1 rounded-full text-[11px] font-medium bg-emerald-50 text-emerald-800 border-emerald-200 border">
                        In Stock
                    </span>
                    <a href="product_detail.php?id=4" class="w-full h-full block">
                        <img src="images/chair-4.jpg" alt="Rattan Occasional Lounge Chair" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" loading="lazy">
                    </a>
                    <div class="absolute inset-0 bg-stone-950/20 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center gap-2">
                        <a href="product_detail.php?id=4" class="w-10 h-10 rounded-full bg-white text-stone-900 hover:bg-stone-900 hover:text-white flex items-center justify-center shadow-md transition-colors" title="View Details">
                            <i class="ri-eye-line text-lg"></i>
                        </a>
                    </div>
                </div>
                <div class="p-5 flex flex-col flex-1 justify-between">
                    <div>
                        <span class="text-[11px] uppercase tracking-wider text-amber-800 font-medium">Lounge & Seating</span>
                        <h3 class="font-serif text-base font-normal text-stone-900 group-hover:text-amber-900 transition-colors mt-0.5">
                            <a href="product_detail.php?id=4">Rattan Occasional Lounge Chair</a>
                        </h3>
                    </div>
                    <div class="pt-4 flex items-center justify-between border-t border-stone-100 mt-4">
                        <span class="text-sm font-semibold text-stone-900">490,000 MMK</span>
                        <span class="text-xs text-stone-500">14 in stock</span>
                    </div>
                </div>
            </article>

            <!-- Product Item 5: Velvet Accent Atelier Chair -->
            <article class="product-card group bg-white rounded-2xl border border-stone-200 overflow-hidden transition-all duration-300 hover:shadow-xl hover:border-amber-900/40 flex flex-col justify-between" data-category="chairs" data-price="520000" data-name="velvet accent atelier chair">
                <div class="relative w-full aspect-[4/3] bg-stone-100 overflow-hidden flex items-center justify-center">
                    <span class="absolute top-3 left-3 z-10 inline-flex items-center px-2.5 py-1 rounded-full text-[11px] font-medium bg-amber-50 text-amber-800 border-amber-200 border">
                        Low Stock
                    </span>
                    <a href="product_detail.php?id=5" class="w-full h-full block">
                        <img src="images/chair-5.jpg" alt="Velvet Accent Atelier Chair" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" loading="lazy">
                    </a>
                    <div class="absolute inset-0 bg-stone-950/20 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center gap-2">
                        <a href="product_detail.php?id=5" class="w-10 h-10 rounded-full bg-white text-stone-900 hover:bg-stone-900 hover:text-white flex items-center justify-center shadow-md transition-colors" title="View Details">
                            <i class="ri-eye-line text-lg"></i>
                        </a>
                    </div>
                </div>
                <div class="p-5 flex flex-col flex-1 justify-between">
                    <div>
                        <span class="text-[11px] uppercase tracking-wider text-amber-800 font-medium">Chairs & Seating</span>
                        <h3 class="font-serif text-base font-normal text-stone-900 group-hover:text-amber-900 transition-colors mt-0.5">
                            <a href="product_detail.php?id=5">Velvet Accent Atelier Chair</a>
                        </h3>
                    </div>
                    <div class="pt-4 flex items-center justify-between border-t border-stone-100 mt-4">
                        <span class="text-sm font-semibold text-stone-900">520,000 MMK</span>
                        <span class="text-xs text-stone-500">6 in stock</span>
                    </div>
                </div>
            </article>

            <!-- Product Item 6: Minimalist Turned Wooden Stool -->
            <article class="product-card group bg-white rounded-2xl border border-stone-200 overflow-hidden transition-all duration-300 hover:shadow-xl hover:border-amber-900/40 flex flex-col justify-between" data-category="chairs" data-price="180000" data-name="minimalist turned wooden stool">
                <div class="relative w-full aspect-[4/3] bg-stone-100 overflow-hidden flex items-center justify-center">
                    <span class="absolute top-3 left-3 z-10 inline-flex items-center px-2.5 py-1 rounded-full text-[11px] font-medium bg-emerald-50 text-emerald-800 border-emerald-200 border">
                        In Stock
                    </span>
                    <a href="product_detail.php?id=6" class="w-full h-full block">
                        <img src="images/chair-6.jpg" alt="Minimalist Turned Wooden Stool" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" loading="lazy">
                    </a>
                    <div class="absolute inset-0 bg-stone-950/20 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center gap-2">
                        <a href="product_detail.php?id=6" class="w-10 h-10 rounded-full bg-white text-stone-900 hover:bg-stone-900 hover:text-white flex items-center justify-center shadow-md transition-colors" title="View Details">
                            <i class="ri-eye-line text-lg"></i>
                        </a>
                    </div>
                </div>
                <div class="p-5 flex flex-col flex-1 justify-between">
                    <div>
                        <span class="text-[11px] uppercase tracking-wider text-amber-800 font-medium">Seating & Accents</span>
                        <h3 class="font-serif text-base font-normal text-stone-900 group-hover:text-amber-900 transition-colors mt-0.5">
                            <a href="product_detail.php?id=6">Minimalist Turned Wooden Stool</a>
                        </h3>
                    </div>
                    <div class="pt-4 flex items-center justify-between border-t border-stone-100 mt-4">
                        <span class="text-sm font-semibold text-stone-900">180,000 MMK</span>
                        <span class="text-xs text-stone-500">40 in stock</span>
                    </div>
                </div>
            </article>

            <!-- Product Item 7: Bouclé Modular Sofa -->
            <article class="product-card group bg-white rounded-2xl border border-stone-200 overflow-hidden transition-all duration-300 hover:shadow-xl hover:border-amber-900/40 flex flex-col justify-between" data-category="sofas" data-price="1250000" data-name="bouclé modular sofa">
                <div class="relative w-full aspect-[4/3] bg-stone-100 overflow-hidden flex items-center justify-center">
                    <span class="absolute top-3 left-3 z-10 inline-flex items-center px-2.5 py-1 rounded-full text-[11px] font-medium bg-amber-50 text-amber-800 border-amber-200 border">
                        Low Stock
                    </span>
                    <a href="product_detail.php?id=7" class="w-full h-full block">
                        <img src="images/sofa-1.jpg" alt="Bouclé Modular Sofa" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" loading="lazy">
                    </a>
                    <div class="absolute inset-0 bg-stone-950/20 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center gap-2">
                        <a href="product_detail.php?id=7" class="w-10 h-10 rounded-full bg-white text-stone-900 hover:bg-stone-900 hover:text-white flex items-center justify-center shadow-md transition-colors" title="View Details">
                            <i class="ri-eye-line text-lg"></i>
                        </a>
                    </div>
                </div>
                <div class="p-5 flex flex-col flex-1 justify-between">
                    <div>
                        <span class="text-[11px] uppercase tracking-wider text-amber-800 font-medium">Sofas & Sectionals</span>
                        <h3 class="font-serif text-base font-normal text-stone-900 group-hover:text-amber-900 transition-colors mt-0.5">
                            <a href="product_detail.php?id=7">Bouclé Modular Sofa</a>
                        </h3>
                    </div>
                    <div class="pt-4 flex items-center justify-between border-t border-stone-100 mt-4">
                        <span class="text-sm font-semibold text-stone-900">1,250,000 MMK</span>
                        <span class="text-xs text-stone-500">8 in stock</span>
                    </div>
                </div>
            </article>

            <!-- Product Item 8: Curved Sculptural Lounge Sofa -->
            <article class="product-card group bg-white rounded-2xl border border-stone-200 overflow-hidden transition-all duration-300 hover:shadow-xl hover:border-amber-900/40 flex flex-col justify-between" data-category="sofas" data-price="1480000" data-name="curved sculptural lounge sofa">
                <div class="relative w-full aspect-[4/3] bg-stone-100 overflow-hidden flex items-center justify-center">
                    <span class="absolute top-3 left-3 z-10 inline-flex items-center px-2.5 py-1 rounded-full text-[11px] font-medium bg-emerald-50 text-emerald-800 border-emerald-200 border">
                        In Stock
                    </span>
                    <a href="product_detail.php?id=8" class="w-full h-full block">
                        <img src="images/sofa-2.jpg" alt="Curved Sculptural Lounge Sofa" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" loading="lazy">
                    </a>
                    <div class="absolute inset-0 bg-stone-950/20 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center gap-2">
                        <a href="product_detail.php?id=8" class="w-10 h-10 rounded-full bg-white text-stone-900 hover:bg-stone-900 hover:text-white flex items-center justify-center shadow-md transition-colors" title="View Details">
                            <i class="ri-eye-line text-lg"></i>
                        </a>
                    </div>
                </div>
                <div class="p-5 flex flex-col flex-1 justify-between">
                    <div>
                        <span class="text-[11px] uppercase tracking-wider text-amber-800 font-medium">Sofas & Lounge</span>
                        <h3 class="font-serif text-base font-normal text-stone-900 group-hover:text-amber-900 transition-colors mt-0.5">
                            <a href="product_detail.php?id=8">Curved Sculptural Lounge Sofa</a>
                        </h3>
                    </div>
                    <div class="pt-4 flex items-center justify-between border-t border-stone-100 mt-4">
                        <span class="text-sm font-semibold text-stone-900">1,480,000 MMK</span>
                        <span class="text-xs text-stone-500">12 in stock</span>
                    </div>
                </div>
            </article>

            <!-- Product Item 9: Minimalist Linen Three-Seater -->
            <article class="product-card group bg-white rounded-2xl border border-stone-200 overflow-hidden transition-all duration-300 hover:shadow-xl hover:border-amber-900/40 flex flex-col justify-between" data-category="sofas" data-price="1650000" data-name="minimalist linen three-seater">
                <div class="relative w-full aspect-[4/3] bg-stone-100 overflow-hidden flex items-center justify-center">
                    <span class="absolute top-3 left-3 z-10 inline-flex items-center px-2.5 py-1 rounded-full text-[11px] font-medium bg-emerald-50 text-emerald-800 border-emerald-200 border">
                        In Stock
                    </span>
                    <a href="product_detail.php?id=9" class="w-full h-full block">
                        <img src="images/sofa-3.jpg" alt="Minimalist Linen Three-Seater" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" loading="lazy">
                    </a>
                    <div class="absolute inset-0 bg-stone-950/20 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center gap-2">
                        <a href="product_detail.php?id=9" class="w-10 h-10 rounded-full bg-white text-stone-900 hover:bg-stone-900 hover:text-white flex items-center justify-center shadow-md transition-colors" title="View Details">
                            <i class="ri-eye-line text-lg"></i>
                        </a>
                    </div>
                </div>
                <div class="p-5 flex flex-col flex-1 justify-between">
                    <div>
                        <span class="text-[11px] uppercase tracking-wider text-amber-800 font-medium">Sofas & Lounge</span>
                        <h3 class="font-serif text-base font-normal text-stone-900 group-hover:text-amber-900 transition-colors mt-0.5">
                            <a href="product_detail.php?id=9">Minimalist Linen Three-Seater</a>
                        </h3>
                    </div>
                    <div class="pt-4 flex items-center justify-between border-t border-stone-100 mt-4">
                        <span class="text-sm font-semibold text-stone-900">1,650,000 MMK</span>
                        <span class="text-xs text-stone-500">9 in stock</span>
                    </div>
                </div>
            </article>

            <!-- Product Item 10: Caramel Leather Chaise Longue -->
            <article class="product-card group bg-white rounded-2xl border border-stone-200 overflow-hidden transition-all duration-300 hover:shadow-xl hover:border-amber-900/40 flex flex-col justify-between" data-category="sofas" data-price="210000" data-name="caramel leather chaise longue">
                <div class="relative w-full aspect-[4/3] bg-stone-100 overflow-hidden flex items-center justify-center">
                    <span class="absolute top-3 left-3 z-10 inline-flex items-center px-2.5 py-1 rounded-full text-[11px] font-medium bg-amber-50 text-amber-800 border-amber-200 border">
                        Low Stock
                    </span>
                    <a href="product_detail.php?id=10" class="w-full h-full block">
                        <img src="images/sofa-4.jpg" alt="Caramel Leather Chaise Longue" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" loading="lazy">
                    </a>
                    <div class="absolute inset-0 bg-stone-950/20 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center gap-2">
                        <a href="product_detail.php?id=10" class="w-10 h-10 rounded-full bg-white text-stone-900 hover:bg-stone-900 hover:text-white flex items-center justify-center shadow-md transition-colors" title="View Details">
                            <i class="ri-eye-line text-lg"></i>
                        </a>
                    </div>
                </div>
                <div class="p-5 flex flex-col flex-1 justify-between">
                    <div>
                        <span class="text-[11px] uppercase tracking-wider text-amber-800 font-medium">Luxury Sofas</span>
                        <h3 class="font-serif text-base font-normal text-stone-900 group-hover:text-amber-900 transition-colors mt-0.5">
                            <a href="product_detail.php?id=10">Caramel Leather Chaise Longue</a>
                        </h3>
                    </div>
                    <div class="pt-4 flex items-center justify-between border-t border-stone-100 mt-4">
                        <span class="text-sm font-semibold text-stone-900">2,100,000 MMK</span>
                        <span class="text-xs text-stone-500">4 in stock</span>
                    </div>
                </div>
            </article>

            <!-- Product Item 11: Compact Nordic Loveseat -->
            <article class="product-card group bg-white rounded-2xl border border-stone-200 overflow-hidden transition-all duration-300 hover:shadow-xl hover:border-amber-900/40 flex flex-col justify-between" data-category="sofas" data-price="890000" data-name="compact nordic loveseat">
                <div class="relative w-full aspect-[4/3] bg-stone-100 overflow-hidden flex items-center justify-center">
                    <span class="absolute top-3 left-3 z-10 inline-flex items-center px-2.5 py-1 rounded-full text-[11px] font-medium bg-emerald-50 text-emerald-800 border-emerald-200 border">
                        In Stock
                    </span>
                    <a href="product_detail.php?id=11" class="w-full h-full block">
                        <img src="images/sofa-5.jpg" alt="Compact Nordic Loveseat" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" loading="lazy">
                    </a>
                    <div class="absolute inset-0 bg-stone-950/20 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center gap-2">
                        <a href="product_detail.php?id=11" class="w-10 h-10 rounded-full bg-white text-stone-900 hover:bg-stone-900 hover:text-white flex items-center justify-center shadow-md transition-colors" title="View Details">
                            <i class="ri-eye-line text-lg"></i>
                        </a>
                    </div>
                </div>
                <div class="p-5 flex flex-col flex-1 justify-between">
                    <div>
                        <span class="text-[11px] uppercase tracking-wider text-amber-800 font-medium">Sofas & Lounge</span>
                        <h3 class="font-serif text-base font-normal text-stone-900 group-hover:text-amber-900 transition-colors mt-0.5">
                            <a href="product_detail.php?id=11">Compact Nordic Loveseat</a>
                        </h3>
                    </div>
                    <div class="pt-4 flex items-center justify-between border-t border-stone-100 mt-4">
                        <span class="text-sm font-semibold text-stone-900">890,000 MMK</span>
                        <span class="text-xs text-stone-500">15 in stock</span>
                    </div>
                </div>
            </article>

            <!-- Product Item 12: Solid Natural Oak Dining Table -->
            <article class="product-card group bg-white rounded-2xl border border-stone-200 overflow-hidden transition-all duration-300 hover:shadow-xl hover:border-amber-900/40 flex flex-col justify-between" data-category="tables" data-price="890000" data-name="solid natural oak dining table">
                <div class="relative w-full aspect-[4/3] bg-stone-100 overflow-hidden flex items-center justify-center">
                    <span class="absolute top-3 left-3 z-10 inline-flex items-center px-2.5 py-1 rounded-full text-[11px] font-medium bg-emerald-50 text-emerald-800 border-emerald-200 border">
                        In Stock
                    </span>
                    <a href="product_detail.php?id=12" class="w-full h-full block">
                        <img src="images/table-1.jpg" alt="Solid Natural Oak Dining Table" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" loading="lazy">
                    </a>
                    <div class="absolute inset-0 bg-stone-950/20 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center gap-2">
                        <a href="product_detail.php?id=12" class="w-10 h-10 rounded-full bg-white text-stone-900 hover:bg-stone-900 hover:text-white flex items-center justify-center shadow-md transition-colors" title="View Details">
                            <i class="ri-eye-line text-lg"></i>
                        </a>
                    </div>
                </div>
                <div class="p-5 flex flex-col flex-1 justify-between">
                    <div>
                        <span class="text-[11px] uppercase tracking-wider text-amber-800 font-medium">Dining Tables</span>
                        <h3 class="font-serif text-base font-normal text-stone-900 group-hover:text-amber-900 transition-colors mt-0.5">
                            <a href="product_detail.php?id=12">Solid Natural Oak Dining Table</a>
                        </h3>
                    </div>
                    <div class="pt-4 flex items-center justify-between border-t border-stone-100 mt-4">
                        <span class="text-sm font-semibold text-stone-900">890,000 MMK</span>
                        <span class="text-xs text-stone-500">14 in stock</span>
                    </div>
                </div>
            </article>

            <!-- Product Item 13: Solid Walnut Executive Table -->
            <article class="product-card group bg-white rounded-2xl border border-stone-200 overflow-hidden transition-all duration-300 hover:shadow-xl hover:border-amber-900/40 flex flex-col justify-between" data-category="tables" data-price="1120000" data-name="solid walnut executive table">
                <div class="relative w-full aspect-[4/3] bg-stone-100 overflow-hidden flex items-center justify-center">
                    <span class="absolute top-3 left-3 z-10 inline-flex items-center px-2.5 py-1 rounded-full text-[11px] font-medium bg-emerald-50 text-emerald-800 border-emerald-200 border">
                        In Stock
                    </span>
                    <a href="product_detail.php?id=13" class="w-full h-full block">
                        <img src="images/table-2.jpg" alt="Solid Walnut Executive Table" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" loading="lazy">
                    </a>
                    <div class="absolute inset-0 bg-stone-950/20 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center gap-2">
                        <a href="product_detail.php?id=13" class="w-10 h-10 rounded-full bg-white text-stone-900 hover:bg-stone-900 hover:text-white flex items-center justify-center shadow-md transition-colors" title="View Details">
                            <i class="ri-eye-line text-lg"></i>
                        </a>
                    </div>
                </div>
                <div class="p-5 flex flex-col flex-1 justify-between">
                    <div>
                        <span class="text-[11px] uppercase tracking-wider text-amber-800 font-medium">Executive Tables</span>
                        <h3 class="font-serif text-base font-normal text-stone-900 group-hover:text-amber-900 transition-colors mt-0.5">
                            <a href="product_detail.php?id=13">Solid Walnut Executive Table</a>
                        </h3>
                    </div>
                    <div class="pt-4 flex items-center justify-between border-t border-stone-100 mt-4">
                        <span class="text-sm font-semibold text-stone-900">1,120,000 MMK</span>
                        <span class="text-xs text-stone-500">12 in stock</span>
                    </div>
                </div>
            </article>

            <!-- Product Item 14: Marble Low Coffee Table -->
            <article class="product-card group bg-white rounded-2xl border border-stone-200 overflow-hidden transition-all duration-300 hover:shadow-xl hover:border-amber-900/40 flex flex-col justify-between" data-category="tables" data-price="520000" data-name="marble low coffee table">
                <div class="relative w-full aspect-[4/3] bg-stone-100 overflow-hidden flex items-center justify-center">
                    <span class="absolute top-3 left-3 z-10 inline-flex items-center px-2.5 py-1 rounded-full text-[11px] font-medium bg-emerald-50 text-emerald-800 border-emerald-200 border">
                        In Stock
                    </span>
                    <a href="product_detail.php?id=14" class="w-full h-full block">
                        <img src="images/table-3.jpg" alt="Marble Low Coffee Table" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" loading="lazy">
                    </a>
                    <div class="absolute inset-0 bg-stone-950/20 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center gap-2">
                        <a href="product_detail.php?id=14" class="w-10 h-10 rounded-full bg-white text-stone-900 hover:bg-stone-900 hover:text-white flex items-center justify-center shadow-md transition-colors" title="View Details">
                            <i class="ri-eye-line text-lg"></i>
                        </a>
                    </div>
                </div>
                <div class="p-5 flex flex-col flex-1 justify-between">
                    <div>
                        <span class="text-[11px] uppercase tracking-wider text-amber-800 font-medium">Coffee Tables</span>
                        <h3 class="font-serif text-base font-normal text-stone-900 group-hover:text-amber-900 transition-colors mt-0.5">
                            <a href="product_detail.php?id=14">Marble Low Coffee Table</a>
                        </h3>
                    </div>
                    <div class="pt-4 flex items-center justify-between border-t border-stone-100 mt-4">
                        <span class="text-sm font-semibold text-stone-900">520,000 MMK</span>
                        <span class="text-xs text-stone-500">18 in stock</span>
                    </div>
                </div>
            </article>

            <!-- Product Item 15: Travertine Architectural Side Table -->
            <article class="product-card group bg-white rounded-2xl border border-stone-200 overflow-hidden transition-all duration-300 hover:shadow-xl hover:border-amber-900/40 flex flex-col justify-between" data-category="tables" data-price="380000" data-name="travertine architectural side table">
                <div class="relative w-full aspect-[4/3] bg-stone-100 overflow-hidden flex items-center justify-center">
                    <span class="absolute top-3 left-3 z-10 inline-flex items-center px-2.5 py-1 rounded-full text-[11px] font-medium bg-emerald-50 text-emerald-800 border-emerald-200 border">
                        In Stock
                    </span>
                    <a href="product_detail.php?id=15" class="w-full h-full block">
                        <img src="images/table-4.jpg" alt="Travertine Architectural Side Table" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" loading="lazy">
                    </a>
                    <div class="absolute inset-0 bg-stone-950/20 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center gap-2">
                        <a href="product_detail.php?id=15" class="w-10 h-10 rounded-full bg-white text-stone-900 hover:bg-stone-900 hover:text-white flex items-center justify-center shadow-md transition-colors" title="View Details">
                            <i class="ri-eye-line text-lg"></i>
                        </a>
                    </div>
                </div>
                <div class="p-5 flex flex-col flex-1 justify-between">
                    <div>
                        <span class="text-[11px] uppercase tracking-wider text-amber-800 font-medium">Side Tables</span>
                        <h3 class="font-serif text-base font-normal text-stone-900 group-hover:text-amber-900 transition-colors mt-0.5">
                            <a href="product_detail.php?id=15">Travertine Architectural Side Table</a>
                        </h3>
                    </div>
                    <div class="pt-4 flex items-center justify-between border-t border-stone-100 mt-4">
                        <span class="text-sm font-semibold text-stone-900">380,000 MMK</span>
                        <span class="text-xs text-stone-500">22 in stock</span>
                    </div>
                </div>
            </article>

            <!-- Product Item 16: Round Oak Bistro Dining Table -->
            <article class="product-card group bg-white rounded-2xl border border-stone-200 overflow-hidden transition-all duration-300 hover:shadow-xl hover:border-amber-900/40 flex flex-col justify-between" data-category="tables" data-price="640000" data-name="round oak bistro dining table">
                <div class="relative w-full aspect-[4/3] bg-stone-100 overflow-hidden flex items-center justify-center">
                    <span class="absolute top-3 left-3 z-10 inline-flex items-center px-2.5 py-1 rounded-full text-[11px] font-medium bg-emerald-50 text-emerald-800 border-emerald-200 border">
                        In Stock
                    </span>
                    <a href="product_detail.php?id=16" class="w-full h-full block">
                        <img src="images/table-5.jpg" alt="Round Oak Bistro Dining Table" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" loading="lazy">
                    </a>
                    <div class="absolute inset-0 bg-stone-950/20 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center gap-2">
                        <a href="product_detail.php?id=16" class="w-10 h-10 rounded-full bg-white text-stone-900 hover:bg-stone-900 hover:text-white flex items-center justify-center shadow-md transition-colors" title="View Details">
                            <i class="ri-eye-line text-lg"></i>
                        </a>
                    </div>
                </div>
                <div class="p-5 flex flex-col flex-1 justify-between">
                    <div>
                        <span class="text-[11px] uppercase tracking-wider text-amber-800 font-medium">Dining Tables</span>
                        <h3 class="font-serif text-base font-normal text-stone-900 group-hover:text-amber-900 transition-colors mt-0.5">
                            <a href="product_detail.php?id=16">Round Oak Bistro Dining Table</a>
                        </h3>
                    </div>
                    <div class="pt-4 flex items-center justify-between border-t border-stone-100 mt-4">
                        <span class="text-sm font-semibold text-stone-900">640,000 MMK</span>
                        <span class="text-xs text-stone-500">16 in stock</span>
                    </div>
                </div>
            </article>

            <!-- Product Item 17: Minimalist Solid Wood Desk -->
            <article class="product-card group bg-white rounded-2xl border border-stone-200 overflow-hidden transition-all duration-300 hover:shadow-xl hover:border-amber-900/40 flex flex-col justify-between" data-category="tables" data-price="750000" data-name="minimalist solid wood desk">
                <div class="relative w-full aspect-[4/3] bg-stone-100 overflow-hidden flex items-center justify-center">
                    <span class="absolute top-3 left-3 z-10 inline-flex items-center px-2.5 py-1 rounded-full text-[11px] font-medium bg-emerald-50 text-emerald-800 border-emerald-200 border">
                        In Stock
                    </span>
                    <a href="product_detail.php?id=17" class="w-full h-full block">
                        <img src="images/table-6.jpg" alt="Minimalist Solid Wood Desk" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" loading="lazy">
                    </a>
                    <div class="absolute inset-0 bg-stone-950/20 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center gap-2">
                        <a href="product_detail.php?id=17" class="w-10 h-10 rounded-full bg-white text-stone-900 hover:bg-stone-900 hover:text-white flex items-center justify-center shadow-md transition-colors" title="View Details">
                            <i class="ri-eye-line text-lg"></i>
                        </a>
                    </div>
                </div>
                <div class="p-5 flex flex-col flex-1 justify-between">
                    <div>
                        <span class="text-[11px] uppercase tracking-wider text-amber-800 font-medium">Workspaces</span>
                        <h3 class="font-serif text-base font-normal text-stone-900 group-hover:text-amber-900 transition-colors mt-0.5">
                            <a href="product_detail.php?id=17">Minimalist Solid Wood Desk</a>
                        </h3>
                    </div>
                    <div class="pt-4 flex items-center justify-between border-t border-stone-100 mt-4">
                        <span class="text-sm font-semibold text-stone-900">750,000 MMK</span>
                        <span class="text-xs text-stone-500">11 in stock</span>
                    </div>
                </div>
            </article>

            <!-- Product Item 18: Upholstered Platform Bed -->
            <article class="product-card group bg-white rounded-2xl border border-stone-200 overflow-hidden transition-all duration-300 hover:shadow-xl hover:border-amber-900/40 flex flex-col justify-between" data-category="beds" data-price="1480000" data-name="upholstered platform bed">
                <div class="relative w-full aspect-[4/3] bg-stone-100 overflow-hidden flex items-center justify-center">
                    <span class="absolute top-3 left-3 z-10 inline-flex items-center px-2.5 py-1 rounded-full text-[11px] font-medium bg-emerald-50 text-emerald-800 border-emerald-200 border">
                        In Stock
                    </span>
                    <a href="product_detail.php?id=18" class="w-full h-full block">
                        <img src="images/bed-1.jpg" alt="Upholstered Platform Bed" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" loading="lazy">
                    </a>
                    <div class="absolute inset-0 bg-stone-950/20 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center gap-2">
                        <a href="product_detail.php?id=18" class="w-10 h-10 rounded-full bg-white text-stone-900 hover:bg-stone-900 hover:text-white flex items-center justify-center shadow-md transition-colors" title="View Details">
                            <i class="ri-eye-line text-lg"></i>
                        </a>
                    </div>
                </div>
                <div class="p-5 flex flex-col flex-1 justify-between">
                    <div>
                        <span class="text-[11px] uppercase tracking-wider text-amber-800 font-medium">Bedroom Architecture</span>
                        <h3 class="font-serif text-base font-normal text-stone-900 group-hover:text-amber-900 transition-colors mt-0.5">
                            <a href="product_detail.php?id=18">Upholstered Platform Bed</a>
                        </h3>
                    </div>
                    <div class="pt-4 flex items-center justify-between border-t border-stone-100 mt-4">
                        <span class="text-sm font-semibold text-stone-900">1,480,000 MMK</span>
                        <span class="text-xs text-stone-500">10 in stock</span>
                    </div>
                </div>
            </article>

            <!-- Product Item 19: Japandi Low Tatami Bed -->
            <article class="product-card group bg-white rounded-2xl border border-stone-200 overflow-hidden transition-all duration-300 hover:shadow-xl hover:border-amber-900/40 flex flex-col justify-between" data-category="beds" data-price="1850000" data-name="japandi low tatami bed">
                <div class="relative w-full aspect-[4/3] bg-stone-100 overflow-hidden flex items-center justify-center">
                    <span class="absolute top-3 left-3 z-10 inline-flex items-center px-2.5 py-1 rounded-full text-[11px] font-medium bg-amber-50 text-amber-800 border-amber-200 border">
                        Low Stock
                    </span>
                    <a href="product_detail.php?id=19" class="w-full h-full block">
                        <img src="images/bed-2.jpg" alt="Japandi Low Tatami Bed" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" loading="lazy">
                    </a>
                    <div class="absolute inset-0 bg-stone-950/20 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center gap-2">
                        <a href="product_detail.php?id=19" class="w-10 h-10 rounded-full bg-white text-stone-900 hover:bg-stone-900 hover:text-white flex items-center justify-center shadow-md transition-colors" title="View Details">
                            <i class="ri-eye-line text-lg"></i>
                        </a>
                    </div>
                </div>
                <div class="p-5 flex flex-col flex-1 justify-between">
                    <div>
                        <span class="text-[11px] uppercase tracking-wider text-amber-800 font-medium">Low Platform Beds</span>
                        <h3 class="font-serif text-base font-normal text-stone-900 group-hover:text-amber-900 transition-colors mt-0.5">
                            <a href="product_detail.php?id=19">Japandi Low Tatami Bed</a>
                        </h3>
                    </div>
                    <div class="pt-4 flex items-center justify-between border-t border-stone-100 mt-4">
                        <span class="text-sm font-semibold text-stone-900">1,850,000 MMK</span>
                        <span class="text-xs text-stone-500">5 in stock</span>
                    </div>
                </div>
            </article>

            <!-- Product Item 20: Solid Oak Frame King Bed -->
            <article class="product-card group bg-white rounded-2xl border border-stone-200 overflow-hidden transition-all duration-300 hover:shadow-xl hover:border-amber-900/40 flex flex-col justify-between" data-category="beds" data-price="1720000" data-name="solid oak frame king bed">
                <div class="relative w-full aspect-[4/3] bg-stone-100 overflow-hidden flex items-center justify-center">
                    <span class="absolute top-3 left-3 z-10 inline-flex items-center px-2.5 py-1 rounded-full text-[11px] font-medium bg-emerald-50 text-emerald-800 border-emerald-200 border">
                        In Stock
                    </span>
                    <a href="product_detail.php?id=20" class="w-full h-full block">
                        <img src="images/bed-3.jpg" alt="Solid Oak Frame King Bed" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" loading="lazy">
                    </a>
                    <div class="absolute inset-0 bg-stone-950/20 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center gap-2">
                        <a href="product_detail.php?id=20" class="w-10 h-10 rounded-full bg-white text-stone-900 hover:bg-stone-900 hover:text-white flex items-center justify-center shadow-md transition-colors" title="View Details">
                            <i class="ri-eye-line text-lg"></i>
                        </a>
                    </div>
                </div>
                <div class="p-5 flex flex-col flex-1 justify-between">
                    <div>
                        <span class="text-[11px] uppercase tracking-wider text-amber-800 font-medium">King Beds</span>
                        <h3 class="font-serif text-base font-normal text-stone-900 group-hover:text-amber-900 transition-colors mt-0.5">
                            <a href="product_detail.php?id=20">Solid Oak Frame King Bed</a>
                        </h3>
                    </div>
                    <div class="pt-4 flex items-center justify-between border-t border-stone-100 mt-4">
                        <span class="text-sm font-semibold text-stone-900">1,720,000 MMK</span>
                        <span class="text-xs text-stone-500">8 in stock</span>
                    </div>
                </div>
            </article>

            <!-- Product Item 21: Walnut Floating Low Bed -->
            <article class="product-card group bg-white rounded-2xl border border-stone-200 overflow-hidden transition-all duration-300 hover:shadow-xl hover:border-amber-900/40 flex flex-col justify-between" data-category="beds" data-price="1650000" data-name="walnut floating low bed">
                <div class="relative w-full aspect-[4/3] bg-stone-100 overflow-hidden flex items-center justify-center">
                    <span class="absolute top-3 left-3 z-10 inline-flex items-center px-2.5 py-1 rounded-full text-[11px] font-medium bg-emerald-50 text-emerald-800 border-emerald-200 border">
                        In Stock
                    </span>
                    <a href="product_detail.php?id=21" class="w-full h-full block">
                        <img src="images/bed-4.jpg" alt="Walnut Floating Low Bed" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" loading="lazy">
                    </a>
                    <div class="absolute inset-0 bg-stone-950/20 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center gap-2">
                        <a href="product_detail.php?id=21" class="w-10 h-10 rounded-full bg-white text-stone-900 hover:bg-stone-900 hover:text-white flex items-center justify-center shadow-md transition-colors" title="View Details">
                            <i class="ri-eye-line text-lg"></i>
                        </a>
                    </div>
                </div>
                <div class="p-5 flex flex-col flex-1 justify-between">
                    <div>
                        <span class="text-[11px] uppercase tracking-wider text-amber-800 font-medium">Platform Beds</span>
                        <h3 class="font-serif text-base font-normal text-stone-900 group-hover:text-amber-900 transition-colors mt-0.5">
                            <a href="product_detail.php?id=21">Walnut Floating Low Bed</a>
                        </h3>
                    </div>
                    <div class="pt-4 flex items-center justify-between border-t border-stone-100 mt-4">
                        <span class="text-sm font-semibold text-stone-900">1,650,000 MMK</span>
                        <span class="text-xs text-stone-500">12 in stock</span>
                    </div>
                </div>
            </article>

            <!-- Product Item 22: Natural Linen Canopy Bed -->
            <article class="product-card group bg-white rounded-2xl border border-stone-200 overflow-hidden transition-all duration-300 hover:shadow-xl hover:border-amber-900/40 flex flex-col justify-between" data-category="beds" data-price="2250000" data-name="natural linen canopy bed">
                <div class="relative w-full aspect-[4/3] bg-stone-100 overflow-hidden flex items-center justify-center">
                    <span class="absolute top-3 left-3 z-10 inline-flex items-center px-2.5 py-1 rounded-full text-[11px] font-medium bg-amber-50 text-amber-800 border-amber-200 border">
                        Low Stock
                    </span>
                    <a href="product_detail.php?id=22" class="w-full h-full block">
                        <img src="images/bed-5.jpg" alt="Natural Linen Canopy Bed" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" loading="lazy">
                    </a>
                    <div class="absolute inset-0 bg-stone-950/20 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center gap-2">
                        <a href="product_detail.php?id=22" class="w-10 h-10 rounded-full bg-white text-stone-900 hover:bg-stone-900 hover:text-white flex items-center justify-center shadow-md transition-colors" title="View Details">
                            <i class="ri-eye-line text-lg"></i>
                        </a>
                    </div>
                </div>
                <div class="p-5 flex flex-col flex-1 justify-between">
                    <div>
                        <span class="text-[11px] uppercase tracking-wider text-amber-800 font-medium">Canopy Beds</span>
                        <h3 class="font-serif text-base font-normal text-stone-900 group-hover:text-amber-900 transition-colors mt-0.5">
                            <a href="product_detail.php?id=22">Natural Linen Canopy Bed</a>
                        </h3>
                    </div>
                    <div class="pt-4 flex items-center justify-between border-t border-stone-100 mt-4">
                        <span class="text-sm font-semibold text-stone-900">2,250,000 MMK</span>
                        <span class="text-xs text-stone-500">3 in stock</span>
                    </div>
                </div>
            </article>

            <!-- Product Item 23: Minimalist Queen Platform Bed -->
            <article class="product-card group bg-white rounded-2xl border border-stone-200 overflow-hidden transition-all duration-300 hover:shadow-xl hover:border-amber-900/40 flex flex-col justify-between" data-category="beds" data-price="1390000" data-name="minimalist queen platform bed">
                <div class="relative w-full aspect-[4/3] bg-stone-100 overflow-hidden flex items-center justify-center">
                    <span class="absolute top-3 left-3 z-10 inline-flex items-center px-2.5 py-1 rounded-full text-[11px] font-medium bg-emerald-50 text-emerald-800 border-emerald-200 border">
                        In Stock
                    </span>
                    <a href="product_detail.php?id=23" class="w-full h-full block">
                        <img src="images/bed-6.jpg" alt="Minimalist Queen Platform Bed" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" loading="lazy">
                    </a>
                    <div class="absolute inset-0 bg-stone-950/20 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center gap-2">
                        <a href="product_detail.php?id=23" class="w-10 h-10 rounded-full bg-white text-stone-900 hover:bg-stone-900 hover:text-white flex items-center justify-center shadow-md transition-colors" title="View Details">
                            <i class="ri-eye-line text-lg"></i>
                        </a>
                    </div>
                </div>
                <div class="p-5 flex flex-col flex-1 justify-between">
                    <div>
                        <span class="text-[11px] uppercase tracking-wider text-amber-800 font-medium">Queen Beds</span>
                        <h3 class="font-serif text-base font-normal text-stone-900 group-hover:text-amber-900 transition-colors mt-0.5">
                            <a href="product_detail.php?id=23">Minimalist Queen Platform Bed</a>
                        </h3>
                    </div>
                    <div class="pt-4 flex items-center justify-between border-t border-stone-100 mt-4">
                        <span class="text-sm font-semibold text-stone-900">1,390,000 MMK</span>
                        <span class="text-xs text-stone-500">14 in stock</span>
                    </div>
                </div>
            </article>

            <!-- Product Item 24: Nordic Timber Storage Bed -->
            <article class="product-card group bg-white rounded-2xl border border-stone-200 overflow-hidden transition-all duration-300 hover:shadow-xl hover:border-amber-900/40 flex flex-col justify-between" data-category="beds" data-price="1580000" data-name="nordic timber storage bed">
                <div class="relative w-full aspect-[4/3] bg-stone-100 overflow-hidden flex items-center justify-center">
                    <span class="absolute top-3 left-3 z-10 inline-flex items-center px-2.5 py-1 rounded-full text-[11px] font-medium bg-emerald-50 text-emerald-800 border-emerald-200 border">
                        In Stock
                    </span>
                    <a href="product_detail.php?id=24" class="w-full h-full block">
                        <img src="images/bed-7.jpg" alt="Nordic Timber Storage Bed" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" loading="lazy">
                    </a>
                    <div class="absolute inset-0 bg-stone-950/20 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center gap-2">
                        <a href="product_detail.php?id=24" class="w-10 h-10 rounded-full bg-white text-stone-900 hover:bg-stone-900 hover:text-white flex items-center justify-center shadow-md transition-colors" title="View Details">
                            <i class="ri-eye-line text-lg"></i>
                        </a>
                    </div>
                </div>
                <div class="p-5 flex flex-col flex-1 justify-between">
                    <div>
                        <span class="text-[11px] uppercase tracking-wider text-amber-800 font-medium">Storage Beds</span>
                        <h3 class="font-serif text-base font-normal text-stone-900 group-hover:text-amber-900 transition-colors mt-0.5">
                            <a href="product_detail.php?id=24">Nordic Timber Storage Bed</a>
                        </h3>
                    </div>
                    <div class="pt-4 flex items-center justify-between border-t border-stone-100 mt-4">
                        <span class="text-sm font-semibold text-stone-900">1,580,000 MMK</span>
                        <span class="text-xs text-stone-500">9 in stock</span>
                    </div>
                </div>
            </article>

            <!-- Product Item 25: Coastal Retreat Woven Bed -->
            <article class="product-card group bg-white rounded-2xl border border-stone-200 overflow-hidden transition-all duration-300 hover:shadow-xl hover:border-amber-900/40 flex flex-col justify-between" data-category="beds" data-price="1890000" data-name="coastal retreat woven bed">
                <div class="relative w-full aspect-[4/3] bg-stone-100 overflow-hidden flex items-center justify-center">
                    <span class="absolute top-3 left-3 z-10 inline-flex items-center px-2.5 py-1 rounded-full text-[11px] font-medium bg-emerald-50 text-emerald-800 border-emerald-200 border">
                        In Stock
                    </span>
                    <a href="product_detail.php?id=25" class="w-full h-full block">
                        <img src="images/bed-8.jpg" alt="Coastal Retreat Woven Bed" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" loading="lazy">
                    </a>
                    <div class="absolute inset-0 bg-stone-950/20 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center gap-2">
                        <a href="product_detail.php?id=25" class="w-10 h-10 rounded-full bg-white text-stone-900 hover:bg-stone-900 hover:text-white flex items-center justify-center shadow-md transition-colors" title="View Details">
                            <i class="ri-eye-line text-lg"></i>
                        </a>
                    </div>
                </div>
                <div class="p-5 flex flex-col flex-1 justify-between">
                    <div>
                        <span class="text-[11px] uppercase tracking-wider text-amber-800 font-medium">Woven Beds</span>
                        <h3 class="font-serif text-base font-normal text-stone-900 group-hover:text-amber-900 transition-colors mt-0.5">
                            <a href="product_detail.php?id=25">Coastal Retreat Woven Bed</a>
                        </h3>
                    </div>
                    <div class="pt-4 flex items-center justify-between border-t border-stone-100 mt-4">
                        <span class="text-sm font-semibold text-stone-900">1,890,000 MMK</span>
                        <span class="text-xs text-stone-500">7 in stock</span>
                    </div>
                </div>
            </article>

            <!-- Product Item 26: Woven Rattan Headboard Bed -->
            <article class="product-card group bg-white rounded-2xl border border-stone-200 overflow-hidden transition-all duration-300 hover:shadow-xl hover:border-amber-900/40 flex flex-col justify-between" data-category="beds" data-price="1620000" data-name="woven rattan headboard bed">
                <div class="relative w-full aspect-[4/3] bg-stone-100 overflow-hidden flex items-center justify-center">
                    <span class="absolute top-3 left-3 z-10 inline-flex items-center px-2.5 py-1 rounded-full text-[11px] font-medium bg-emerald-50 text-emerald-800 border-emerald-200 border">
                        In Stock
                    </span>
                    <a href="product_detail.php?id=26" class="w-full h-full block">
                        <img src="images/bed-9.jpg" alt="Woven Rattan Headboard Bed" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" loading="lazy">
                    </a>
                    <div class="absolute inset-0 bg-stone-950/20 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center gap-2">
                        <a href="product_detail.php?id=26" class="w-10 h-10 rounded-full bg-white text-stone-900 hover:bg-stone-900 hover:text-white flex items-center justify-center shadow-md transition-colors" title="View Details">
                            <i class="ri-eye-line text-lg"></i>
                        </a>
                    </div>
                </div>
                <div class="p-5 flex flex-col flex-1 justify-between">
                    <div>
                        <span class="text-[11px] uppercase tracking-wider text-amber-800 font-medium">Artisan Beds</span>
                        <h3 class="font-serif text-base font-normal text-stone-900 group-hover:text-amber-900 transition-colors mt-0.5">
                            <a href="product_detail.php?id=26">Woven Rattan Headboard Bed</a>
                        </h3>
                    </div>
                    <div class="pt-4 flex items-center justify-between border-t border-stone-100 mt-4">
                        <span class="text-sm font-semibold text-stone-900">1,620,000 MMK</span>
                        <span class="text-xs text-stone-500">8 in stock</span>
                    </div>
                </div>
            </article>

            <!-- Product Item 27: Modern Slate Upholstered Bed -->
            <article class="product-card group bg-white rounded-2xl border border-stone-200 overflow-hidden transition-all duration-300 hover:shadow-xl hover:border-amber-900/40 flex flex-col justify-between" data-category="beds" data-price="1790000" data-name="modern slate upholstered bed">
                <div class="relative w-full aspect-[4/3] bg-stone-100 overflow-hidden flex items-center justify-center">
                    <span class="absolute top-3 left-3 z-10 inline-flex items-center px-2.5 py-1 rounded-full text-[11px] font-medium bg-amber-50 text-amber-800 border-amber-200 border">
                        Low Stock
                    </span>
                    <a href="product_detail.php?id=27" class="w-full h-full block">
                        <img src="images/bed-10.jpg" alt="Modern Slate Upholstered Bed" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" loading="lazy">
                    </a>
                    <div class="absolute inset-0 bg-stone-950/20 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center gap-2">
                        <a href="product_detail.php?id=27" class="w-10 h-10 rounded-full bg-white text-stone-900 hover:bg-stone-900 hover:text-white flex items-center justify-center shadow-md transition-colors" title="View Details">
                            <i class="ri-eye-line text-lg"></i>
                        </a>
                    </div>
                </div>
                <div class="p-5 flex flex-col flex-1 justify-between">
                    <div>
                        <span class="text-[11px] uppercase tracking-wider text-amber-800 font-medium">Upholstered Beds</span>
                        <h3 class="font-serif text-base font-normal text-stone-900 group-hover:text-amber-900 transition-colors mt-0.5">
                            <a href="product_detail.php?id=27">Modern Slate Upholstered Bed</a>
                        </h3>
                    </div>
                    <div class="pt-4 flex items-center justify-between border-t border-stone-100 mt-4">
                        <span class="text-sm font-semibold text-stone-900">1,790,000 MMK</span>
                        <span class="text-xs text-stone-500">6 in stock</span>
                    </div>
                </div>
            </article>

            <!-- Product Item 28: Sculptural Ceramic Table Lamp -->
            <article class="product-card group bg-white rounded-2xl border border-stone-200 overflow-hidden transition-all duration-300 hover:shadow-xl hover:border-amber-900/40 flex flex-col justify-between" data-category="objects" data-price="195000" data-name="sculptural ceramic table lamp">
                <div class="relative w-full aspect-[4/3] bg-stone-100 overflow-hidden flex items-center justify-center">
                    <span class="absolute top-3 left-3 z-10 inline-flex items-center px-2.5 py-1 rounded-full text-[11px] font-medium bg-emerald-50 text-emerald-800 border-emerald-200 border">
                        In Stock
                    </span>
                    <a href="product_detail.php?id=28" class="w-full h-full block">
                        <img src="images/lamp-1.jpg" alt="Sculptural Ceramic Table Lamp" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" loading="lazy">
                    </a>
                    <div class="absolute inset-0 bg-stone-950/20 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center gap-2">
                        <a href="product_detail.php?id=28" class="w-10 h-10 rounded-full bg-white text-stone-900 hover:bg-stone-900 hover:text-white flex items-center justify-center shadow-md transition-colors" title="View Details">
                            <i class="ri-eye-line text-lg"></i>
                        </a>
                    </div>
                </div>
                <div class="p-5 flex flex-col flex-1 justify-between">
                    <div>
                        <span class="text-[11px] uppercase tracking-wider text-amber-800 font-medium">Ambient Lighting</span>
                        <h3 class="font-serif text-base font-normal text-stone-900 group-hover:text-amber-900 transition-colors mt-0.5">
                            <a href="product_detail.php?id=28">Sculptural Ceramic Table Lamp</a>
                        </h3>
                    </div>
                    <div class="pt-4 flex items-center justify-between border-t border-stone-100 mt-4">
                        <span class="text-sm font-semibold text-stone-900">195,000 MMK</span>
                        <span class="text-xs text-stone-500">32 in stock</span>
                    </div>
                </div>
            </article>

            <!-- Product Item 29: Handcrafted Wabi-Sabi Ceramic Vase -->
            <article class="product-card group bg-white rounded-2xl border border-stone-200 overflow-hidden transition-all duration-300 hover:shadow-xl hover:border-amber-900/40 flex flex-col justify-between" data-category="objects" data-price="120000" data-name="handcrafted wabi-sabi ceramic vase">
                <div class="relative w-full aspect-[4/3] bg-stone-100 overflow-hidden flex items-center justify-center">
                    <span class="absolute top-3 left-3 z-10 inline-flex items-center px-2.5 py-1 rounded-full text-[11px] font-medium bg-emerald-50 text-emerald-800 border-emerald-200 border">
                        In Stock
                    </span>
                    <a href="product_detail.php?id=29" class="w-full h-full block">
                        <img src="images/decor-1.jpg" alt="Handcrafted Wabi-Sabi Ceramic Vase" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" loading="lazy">
                    </a>
                    <div class="absolute inset-0 bg-stone-950/20 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center gap-2">
                        <a href="product_detail.php?id=29" class="w-10 h-10 rounded-full bg-white text-stone-900 hover:bg-stone-900 hover:text-white flex items-center justify-center shadow-md transition-colors" title="View Details">
                            <i class="ri-eye-line text-lg"></i>
                        </a>
                    </div>
                </div>
                <div class="p-5 flex flex-col flex-1 justify-between">
                    <div>
                        <span class="text-[11px] uppercase tracking-wider text-amber-800 font-medium">Ceramic Objects</span>
                        <h3 class="font-serif text-base font-normal text-stone-900 group-hover:text-amber-900 transition-colors mt-0.5">
                            <a href="product_detail.php?id=29">Handcrafted Wabi-Sabi Ceramic Vase</a>
                        </h3>
                    </div>
                    <div class="pt-4 flex items-center justify-between border-t border-stone-100 mt-4">
                        <span class="text-sm font-semibold text-stone-900">120,000 MMK</span>
                        <span class="text-xs text-stone-500">28 in stock</span>
                    </div>
                </div>
            </article>
        </div>

        <!-- NO RESULTS PLACEHOLDER -->
        <div id="no-results" class="hidden text-center py-20 bg-white rounded-3xl border border-stone-200 my-8">
            <div class="w-12 h-12 rounded-full bg-stone-100 text-stone-500 mx-auto flex items-center justify-center text-xl mb-4">
                <i class="ri-search-line"></i>
            </div>
            <h3 class="font-serif text-lg font-normal text-stone-900">No matching pieces found</h3>
            <p class="text-xs text-stone-500 mt-1">Try adjusting your category filter or search keywords.</p>
        </div>

        <!-- PAGINATION MOCKUP -->
        <!-- [PHP_BACKEND_HOOK: Dynamic pagination links (e.g. for page 1..N based on total item count and limit)] -->
        <div class="mt-16 flex items-center justify-center gap-2 text-sm">
            <button type="button" disabled class="w-10 h-10 rounded-xl border border-stone-200 text-stone-400 flex items-center justify-center cursor-not-allowed">
                <i class="ri-arrow-left-s-line text-lg"></i>
            </button>
            <span class="w-10 h-10 rounded-xl bg-stone-900 text-white flex items-center justify-center font-medium">1</span>
            <a href="shop.php?page=2" class="w-10 h-10 rounded-xl border border-stone-200 text-stone-700 hover:bg-stone-100 flex items-center justify-center font-medium transition-colors">2</a>
            <a href="shop.php?page=2" class="w-10 h-10 rounded-xl border border-stone-200 text-stone-700 hover:bg-stone-100 flex items-center justify-center font-medium transition-colors">
                <i class="ri-arrow-right-s-line text-lg"></i>
            </a>
        </div>
    </main>

    <?php include "components/footer.php"; ?>
    <?php include "components/js.php"; ?>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const filterBtns = document.querySelectorAll(".filter-btn");
            const searchInput = document.getElementById("catalog-search");
            const sortSelect = document.getElementById("catalog-sort");
            const productGrid = document.getElementById("product-grid");
            const countEl = document.getElementById("product-count");
            const noResults = document.getElementById("no-results");

            if (!productGrid) return;
            const cards = Array.from(productGrid.querySelectorAll(".product-card"));

            let currentCategory = "all";
            let searchQuery = "";

            function applyFilters() {
                let visibleCount = 0;
                cards.forEach(card => {
                    const cardCat = card.dataset.category;
                    const cardName = card.dataset.name || "";
                    const matchesCat = (currentCategory === "all" || cardCat === currentCategory);
                    const matchesSearch = (!searchQuery || cardName.includes(searchQuery));

                    if (matchesCat && matchesSearch) {
                        card.style.display = "";
                        visibleCount++;
                    } else {
                        card.style.display = "none";
                    }
                });

                if (countEl) countEl.textContent = visibleCount;
                if (noResults) {
                    noResults.classList.toggle("hidden", visibleCount > 0);
                }
            }

            filterBtns.forEach(btn => {
                btn.addEventListener("click", () => {
                    filterBtns.forEach(b => {
                        b.className = "filter-btn px-4 py-2 rounded-xl text-xs font-medium bg-stone-100 text-stone-700 hover:bg-stone-200/80 transition-colors whitespace-nowrap";
                    });
                    btn.className = "filter-btn px-4 py-2 rounded-xl text-xs font-medium bg-stone-900 text-white transition-colors whitespace-nowrap shadow-xs";
                    currentCategory = btn.dataset.filter;
                    applyFilters();
                });
            });

            if (searchInput) {
                searchInput.addEventListener("input", (e) => {
                    searchQuery = e.target.value.toLowerCase().trim();
                    applyFilters();
                });
            }

            if (sortSelect) {
                sortSelect.addEventListener("change", (e) => {
                    const val = e.target.value;
                    const sorted = [...cards].sort((a, b) => {
                        const priceA = parseInt(a.dataset.price, 10) || 0;
                        const priceB = parseInt(b.dataset.price, 10) || 0;
                        const nameA = a.dataset.name || "";
                        const nameB = b.dataset.name || "";

                        if (val === "price_asc") return priceA - priceB;
                        if (val === "price_desc") return priceB - priceA;
                        if (val === "name_asc") return nameA.localeCompare(nameB);
                        return parseInt(a.dataset.id || "0", 10) - parseInt(b.dataset.id || "0", 10);
                    });
                    sorted.forEach(c => productGrid.appendChild(c));
                    applyFilters();
                });
            }
        });
    </script>
</body>

</html>
