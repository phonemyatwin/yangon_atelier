<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop Atelier Furniture | FurnishMe</title>
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
                <span class="text-zinc-900">Shop Atelier</span>
            </nav>
            <div class="flex flex-col md:flex-row md:items-end justify-between gap-4">
                <div>
                    <h1 class="font-serif text-3xl sm:text-4xl lg:text-5xl font-normal tracking-tight text-zinc-900">
                        The Furniture Collection
                    </h1>
                    <p class="text-sm sm:text-base text-zinc-600 max-w-xl mt-2 leading-relaxed">
                        Thoughtfully scaled architectural essentials made from solid walnut, natural oak, and textured tactile fabrics.
                    </p>
                </div>
                <div class="text-xs text-zinc-500">
                    Showing <strong>8</strong> curated atelier pieces
                </div>
            </div>
        </div>
    </header>

    <!-- SHOPPING CONTROLS & FILTER BAR -->
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- [PHP_BACKEND_HOOK: Category filter & Sorting handler form (GET params: category, sort, search)] -->
        <div class="bg-white border border-zinc-200 rounded-2xl p-4 sm:p-5 shadow-xs flex flex-col lg:flex-row items-stretch lg:items-center justify-between gap-4">
            
            <!-- Category Filter Pills -->
            <!-- [PHP_BACKEND_HOOK: Category filter query (e.g., WHERE category = :cat ORDER BY price ASC)] -->
            <div class="flex items-center gap-2 overflow-x-auto pb-2 lg:pb-0 scrollbar-none">
                <a href="shop.php" class="px-4 py-2 rounded-xl text-xs font-medium bg-zinc-900 text-white transition-colors whitespace-nowrap shadow-xs">
                    All Pieces
                </a>
                <a href="shop.php?category=chairs" class="px-4 py-2 rounded-xl text-xs font-medium bg-zinc-100 text-zinc-700 hover:bg-zinc-200 transition-colors whitespace-nowrap">
                    Chairs
                </a>
                <a href="shop.php?category=sofas" class="px-4 py-2 rounded-xl text-xs font-medium bg-zinc-100 text-zinc-700 hover:bg-zinc-200 transition-colors whitespace-nowrap">
                    Sofas &amp; Lounge
                </a>
                <a href="shop.php?category=tables" class="px-4 py-2 rounded-xl text-xs font-medium bg-zinc-100 text-zinc-700 hover:bg-zinc-200 transition-colors whitespace-nowrap">
                    Tables
                </a>
                <a href="shop.php?category=beds" class="px-4 py-2 rounded-xl text-xs font-medium bg-zinc-100 text-zinc-700 hover:bg-zinc-200 transition-colors whitespace-nowrap">
                    Beds &amp; Tatami
                </a>
            </div>

            <!-- Search Mockup and Sort Dropdown -->
            <div class="flex items-center gap-3">
                <div class="relative flex-1 sm:w-64">
                    <i class="ri-search-line absolute left-3.5 top-1/2 -translate-y-1/2 text-zinc-400 text-sm"></i>
                    <input type="text" placeholder="Filter in catalog..." class="w-full pl-9 pr-3 py-2 bg-zinc-50 border border-zinc-200 rounded-xl text-xs text-zinc-800 placeholder-zinc-400 focus:outline-none focus:ring-1 focus:ring-zinc-900">
                </div>
                
                <div class="relative">
                    <select aria-label="Sort products" class="appearance-none pl-4 pr-9 py-2 bg-zinc-50 border border-zinc-200 rounded-xl text-xs font-medium text-zinc-700 focus:outline-none focus:ring-1 focus:ring-zinc-900 cursor-pointer">
                        <option value="featured">Sort: Featured</option>
                        <option value="price_asc">Price: Low to High</option>
                        <option value="price_desc">Price: High to Low</option>
                        <option value="newest">Newest First</option>
                    </select>
                    <i class="ri-arrow-down-s-line absolute right-3 top-1/2 -translate-y-1/2 text-zinc-400 text-sm pointer-events-none"></i>
                </div>
            </div>

        </div>
    </section>

    <!-- PRODUCTS GRID -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-24">
        <!-- [PHP_BACKEND_HOOK: Dynamic product catalog loop. Use foreach($products as $product) to render: $product['id'], $product['image'], $product['name'], $product['price'], $product['stock'], $product['category']] -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 sm:gap-8">
            
            <!-- Product Item 1: Nordic Solid Wood Armchair -->
            <article class="group bg-white rounded-2xl border border-zinc-200/90 overflow-hidden transition-all duration-300 hover:shadow-xl flex flex-col justify-between">
                <div class="relative w-full aspect-[4/3] bg-zinc-100 overflow-hidden flex items-center justify-center">
                    <span class="absolute top-3 left-3 z-10 inline-flex items-center px-2.5 py-1 rounded-full text-[11px] font-medium bg-emerald-50 text-emerald-700 border border-emerald-200">
                        In Stock
                    </span>
                    <a href="product_detail.php?id=1" class="w-full h-full block">
                        <img src="images/product-1.png" alt="Nordic Solid Wood Armchair" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" loading="lazy">
                    </a>
                    <div class="absolute inset-0 bg-zinc-950/20 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center gap-2">
                        <a href="product_detail.php?id=1" class="w-10 h-10 rounded-full bg-white text-zinc-900 hover:bg-zinc-900 hover:text-white flex items-center justify-center shadow-md transition-colors" title="View Details">
                            <i class="ri-eye-line text-lg"></i>
                        </a>
                    </div>
                </div>
                <div class="p-5 flex flex-col flex-1 justify-between">
                    <div>
                        <span class="text-[11px] uppercase tracking-wider text-zinc-400 font-medium">Chairs &amp; Seating</span>
                        <h3 class="font-serif text-base font-normal text-zinc-900 group-hover:text-amber-900 transition-colors mt-0.5">
                            <a href="product_detail.php?id=1">Nordic Solid Wood Armchair</a>
                        </h3>
                    </div>
                    <div class="pt-4 flex items-center justify-between border-t border-zinc-100 mt-4">
                        <span class="text-sm font-semibold text-zinc-900">420,000 MMK</span>
                        <span class="text-xs text-zinc-500">25 in stock</span>
                    </div>
                </div>
            </article>

            <!-- Product Item 2: Curved Lounge Armchair -->
            <article class="group bg-white rounded-2xl border border-zinc-200/90 overflow-hidden transition-all duration-300 hover:shadow-xl flex flex-col justify-between">
                <div class="relative w-full aspect-[4/3] bg-zinc-100 overflow-hidden flex items-center justify-center">
                    <span class="absolute top-3 left-3 z-10 inline-flex items-center px-2.5 py-1 rounded-full text-[11px] font-medium bg-emerald-50 text-emerald-700 border border-emerald-200">
                        In Stock
                    </span>
                    <a href="product_detail.php?id=2" class="w-full h-full block">
                        <img src="images/product-2.png" alt="Curved Lounge Armchair" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" loading="lazy">
                    </a>
                    <div class="absolute inset-0 bg-zinc-950/20 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center gap-2">
                        <a href="product_detail.php?id=2" class="w-10 h-10 rounded-full bg-white text-zinc-900 hover:bg-zinc-900 hover:text-white flex items-center justify-center shadow-md transition-colors" title="View Details">
                            <i class="ri-eye-line text-lg"></i>
                        </a>
                    </div>
                </div>
                <div class="p-5 flex flex-col flex-1 justify-between">
                    <div>
                        <span class="text-[11px] uppercase tracking-wider text-zinc-400 font-medium">Lounge</span>
                        <h3 class="font-serif text-base font-normal text-zinc-900 group-hover:text-amber-900 transition-colors mt-0.5">
                            <a href="product_detail.php?id=2">Curved Lounge Armchair</a>
                        </h3>
                    </div>
                    <div class="pt-4 flex items-center justify-between border-t border-zinc-100 mt-4">
                        <span class="text-sm font-semibold text-zinc-900">580,000 MMK</span>
                        <span class="text-xs text-zinc-500">50 in stock</span>
                    </div>
                </div>
            </article>

            <!-- Product Item 3: Bouclé Modular Sofa -->
            <article class="group bg-white rounded-2xl border border-zinc-200/90 overflow-hidden transition-all duration-300 hover:shadow-xl flex flex-col justify-between">
                <div class="relative w-full aspect-[4/3] bg-zinc-100 overflow-hidden flex items-center justify-center">
                    <span class="absolute top-3 left-3 z-10 inline-flex items-center px-2.5 py-1 rounded-full text-[11px] font-medium bg-amber-50 text-amber-700 border border-amber-200">
                        Low Stock
                    </span>
                    <a href="product_detail.php?id=3" class="w-full h-full block">
                        <img src="images/product-3.png" alt="Bouclé Modular Sofa" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" loading="lazy">
                    </a>
                    <div class="absolute inset-0 bg-zinc-950/20 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center gap-2">
                        <a href="product_detail.php?id=3" class="w-10 h-10 rounded-full bg-white text-zinc-900 hover:bg-zinc-900 hover:text-white flex items-center justify-center shadow-md transition-colors" title="View Details">
                            <i class="ri-eye-line text-lg"></i>
                        </a>
                    </div>
                </div>
                <div class="p-5 flex flex-col flex-1 justify-between">
                    <div>
                        <span class="text-[11px] uppercase tracking-wider text-zinc-400 font-medium">Sofas</span>
                        <h3 class="font-serif text-base font-normal text-zinc-900 group-hover:text-amber-900 transition-colors mt-0.5">
                            <a href="product_detail.php?id=3">Bouclé Modular Sofa</a>
                        </h3>
                    </div>
                    <div class="pt-4 flex items-center justify-between border-t border-zinc-100 mt-4">
                        <span class="text-sm font-semibold text-zinc-900">1,250,000 MMK</span>
                        <span class="text-xs text-zinc-500">8 in stock</span>
                    </div>
                </div>
            </article>

            <!-- Product Item 4: Solid Natural Oak Table -->
            <article class="group bg-white rounded-2xl border border-zinc-200/90 overflow-hidden transition-all duration-300 hover:shadow-xl flex flex-col justify-between">
                <div class="relative w-full aspect-[4/3] bg-zinc-100 overflow-hidden flex items-center justify-center">
                    <span class="absolute top-3 left-3 z-10 inline-flex items-center px-2.5 py-1 rounded-full text-[11px] font-medium bg-emerald-50 text-emerald-700 border border-emerald-200">
                        In Stock
                    </span>
                    <a href="product_detail.php?id=4" class="w-full h-full block">
                        <img src="images/product-4.png" alt="Solid Natural Oak Table" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" loading="lazy">
                    </a>
                    <div class="absolute inset-0 bg-zinc-950/20 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center gap-2">
                        <a href="product_detail.php?id=4" class="w-10 h-10 rounded-full bg-white text-zinc-900 hover:bg-zinc-900 hover:text-white flex items-center justify-center shadow-md transition-colors" title="View Details">
                            <i class="ri-eye-line text-lg"></i>
                        </a>
                    </div>
                </div>
                <div class="p-5 flex flex-col flex-1 justify-between">
                    <div>
                        <span class="text-[11px] uppercase tracking-wider text-zinc-400 font-medium">Dining Tables</span>
                        <h3 class="font-serif text-base font-normal text-zinc-900 group-hover:text-amber-900 transition-colors mt-0.5">
                            <a href="product_detail.php?id=4">Solid Natural Oak Table</a>
                        </h3>
                    </div>
                    <div class="pt-4 flex items-center justify-between border-t border-zinc-100 mt-4">
                        <span class="text-sm font-semibold text-zinc-900">890,000 MMK</span>
                        <span class="text-xs text-zinc-500">14 in stock</span>
                    </div>
                </div>
            </article>

            <!-- Product Item 5: Upholstered Platform Bed -->
            <article class="group bg-white rounded-2xl border border-zinc-200/90 overflow-hidden transition-all duration-300 hover:shadow-xl flex flex-col justify-between">
                <div class="relative w-full aspect-[4/3] bg-zinc-100 overflow-hidden flex items-center justify-center">
                    <span class="absolute top-3 left-3 z-10 inline-flex items-center px-2.5 py-1 rounded-full text-[11px] font-medium bg-emerald-50 text-emerald-700 border border-emerald-200">
                        In Stock
                    </span>
                    <a href="product_detail.php?id=5" class="w-full h-full block">
                        <img src="images/product-5.png" alt="Upholstered Platform Bed" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" loading="lazy">
                    </a>
                    <div class="absolute inset-0 bg-zinc-950/20 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center gap-2">
                        <a href="product_detail.php?id=5" class="w-10 h-10 rounded-full bg-white text-zinc-900 hover:bg-zinc-900 hover:text-white flex items-center justify-center shadow-md transition-colors" title="View Details">
                            <i class="ri-eye-line text-lg"></i>
                        </a>
                    </div>
                </div>
                <div class="p-5 flex flex-col flex-1 justify-between">
                    <div>
                        <span class="text-[11px] uppercase tracking-wider text-zinc-400 font-medium">Beds &amp; Bedroom</span>
                        <h3 class="font-serif text-base font-normal text-zinc-900 group-hover:text-amber-900 transition-colors mt-0.5">
                            <a href="product_detail.php?id=5">Upholstered Platform Bed</a>
                        </h3>
                    </div>
                    <div class="pt-4 flex items-center justify-between border-t border-zinc-100 mt-4">
                        <span class="text-sm font-semibold text-zinc-900">1,480,000 MMK</span>
                        <span class="text-xs text-zinc-500">10 in stock</span>
                    </div>
                </div>
            </article>

            <!-- Product Item 6: Scandi Minimalist Dining Chair -->
            <article class="group bg-white rounded-2xl border border-zinc-200/90 overflow-hidden transition-all duration-300 hover:shadow-xl flex flex-col justify-between">
                <div class="relative w-full aspect-[4/3] bg-zinc-100 overflow-hidden flex items-center justify-center">
                    <span class="absolute top-3 left-3 z-10 inline-flex items-center px-2.5 py-1 rounded-full text-[11px] font-medium bg-emerald-50 text-emerald-700 border border-emerald-200">
                        In Stock
                    </span>
                    <a href="product_detail.php?id=6" class="w-full h-full block">
                        <img src="images/product-6.png" alt="Scandi Minimalist Dining Chair" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" loading="lazy">
                    </a>
                    <div class="absolute inset-0 bg-zinc-950/20 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center gap-2">
                        <a href="product_detail.php?id=6" class="w-10 h-10 rounded-full bg-white text-zinc-900 hover:bg-zinc-900 hover:text-white flex items-center justify-center shadow-md transition-colors" title="View Details">
                            <i class="ri-eye-line text-lg"></i>
                        </a>
                    </div>
                </div>
                <div class="p-5 flex flex-col flex-1 justify-between">
                    <div>
                        <span class="text-[11px] uppercase tracking-wider text-zinc-400 font-medium">Chairs</span>
                        <h3 class="font-serif text-base font-normal text-zinc-900 group-hover:text-amber-900 transition-colors mt-0.5">
                            <a href="product_detail.php?id=6">Scandi Minimalist Dining Chair</a>
                        </h3>
                    </div>
                    <div class="pt-4 flex items-center justify-between border-t border-zinc-100 mt-4">
                        <span class="text-sm font-semibold text-zinc-900">260,000 MMK</span>
                        <span class="text-xs text-zinc-500">36 in stock</span>
                    </div>
                </div>
            </article>

            <!-- Product Item 7: Minimalist Linen Three-Seater -->
            <article class="group bg-white rounded-2xl border border-zinc-200/90 overflow-hidden transition-all duration-300 hover:shadow-xl flex flex-col justify-between">
                <div class="relative w-full aspect-[4/3] bg-zinc-100 overflow-hidden flex items-center justify-center">
                    <span class="absolute top-3 left-3 z-10 inline-flex items-center px-2.5 py-1 rounded-full text-[11px] font-medium bg-amber-50 text-amber-700 border border-amber-200">
                        Low Stock
                    </span>
                    <a href="product_detail.php?id=7" class="w-full h-full block">
                        <img src="images/product-7.png" alt="Minimalist Linen Three-Seater" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" loading="lazy">
                    </a>
                    <div class="absolute inset-0 bg-zinc-950/20 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center gap-2">
                        <a href="product_detail.php?id=7" class="w-10 h-10 rounded-full bg-white text-zinc-900 hover:bg-zinc-900 hover:text-white flex items-center justify-center shadow-md transition-colors" title="View Details">
                            <i class="ri-eye-line text-lg"></i>
                        </a>
                    </div>
                </div>
                <div class="p-5 flex flex-col flex-1 justify-between">
                    <div>
                        <span class="text-[11px] uppercase tracking-wider text-zinc-400 font-medium">Sofas &amp; Lounge</span>
                        <h3 class="font-serif text-base font-normal text-zinc-900 group-hover:text-amber-900 transition-colors mt-0.5">
                            <a href="product_detail.php?id=7">Minimalist Linen Three-Seater</a>
                        </h3>
                    </div>
                    <div class="pt-4 flex items-center justify-between border-t border-zinc-100 mt-4">
                        <span class="text-sm font-semibold text-zinc-900">1,650,000 MMK</span>
                        <span class="text-xs text-zinc-500">6 in stock</span>
                    </div>
                </div>
            </article>

            <!-- Product Item 8: Solid Walnut Dining Table -->
            <article class="group bg-white rounded-2xl border border-zinc-200/90 overflow-hidden transition-all duration-300 hover:shadow-xl flex flex-col justify-between">
                <div class="relative w-full aspect-[4/3] bg-zinc-100 overflow-hidden flex items-center justify-center">
                    <span class="absolute top-3 left-3 z-10 inline-flex items-center px-2.5 py-1 rounded-full text-[11px] font-medium bg-emerald-50 text-emerald-700 border border-emerald-200">
                        In Stock
                    </span>
                    <a href="product_detail.php?id=8" class="w-full h-full block">
                        <img src="images/product-8.png" alt="Solid Walnut Dining Table" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" loading="lazy">
                    </a>
                    <div class="absolute inset-0 bg-zinc-950/20 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center gap-2">
                        <a href="product_detail.php?id=8" class="w-10 h-10 rounded-full bg-white text-zinc-900 hover:bg-zinc-900 hover:text-white flex items-center justify-center shadow-md transition-colors" title="View Details">
                            <i class="ri-eye-line text-lg"></i>
                        </a>
                    </div>
                </div>
                <div class="p-5 flex flex-col flex-1 justify-between">
                    <div>
                        <span class="text-[11px] uppercase tracking-wider text-zinc-400 font-medium">Dining Tables</span>
                        <h3 class="font-serif text-base font-normal text-zinc-900 group-hover:text-amber-900 transition-colors mt-0.5">
                            <a href="product_detail.php?id=8">Solid Walnut Executive Table</a>
                        </h3>
                    </div>
                    <div class="pt-4 flex items-center justify-between border-t border-zinc-100 mt-4">
                        <span class="text-sm font-semibold text-zinc-900">1,120,000 MMK</span>
                        <span class="text-xs text-zinc-500">12 in stock</span>
                    </div>
                </div>
            </article>

        </div>

        <!-- PAGINATION MOCKUP -->
        <!-- [PHP_BACKEND_HOOK: Dynamic pagination links (e.g. for page 1..N based on total item count and limit)] -->
        <div class="mt-16 flex items-center justify-center gap-2 text-sm">
            <button type="button" disabled class="w-10 h-10 rounded-xl border border-zinc-200 text-zinc-400 flex items-center justify-center cursor-not-allowed">
                <i class="ri-arrow-left-s-line text-lg"></i>
            </button>
            <span class="w-10 h-10 rounded-xl bg-zinc-900 text-white flex items-center justify-center font-medium">1</span>
            <a href="shop.php?page=2" class="w-10 h-10 rounded-xl border border-zinc-200 text-zinc-700 hover:bg-zinc-100 flex items-center justify-center font-medium transition-colors">2</a>
            <a href="shop.php?page=2" class="w-10 h-10 rounded-xl border border-zinc-200 text-zinc-700 hover:bg-zinc-100 flex items-center justify-center font-medium transition-colors">
                <i class="ri-arrow-right-s-line text-lg"></i>
            </a>
        </div>
    </main>

    <?php include "components/footer.php"; ?>
    <?php include "components/js.php"; ?>
</body>

</html>
