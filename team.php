<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Design Collective &amp; Artisans | FurnishMe</title>
    <link rel="icon" href="images/favicon.ico">
    <?php include "components/css.php"; ?>
</head>

<body class="bg-[#FAF8F5] text-stone-900 font-sans selection:bg-amber-100 selection:text-amber-900">
    <?php include "components/header.php"; ?>
    <?php include "components/navbar.php"; ?>

    <!-- PAGE HEADER BREADCRUMB -->
    <header class="bg-[#F2ECE4] border-b border-stone-200/80 py-12 lg:py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <nav class="flex items-center gap-2 text-xs font-medium text-stone-500 mb-3" aria-label="Breadcrumb">
                <a href="index.php" class="hover:text-stone-900 transition-colors">Home</a>
                <span class="text-stone-400">/</span>
                <span class="text-stone-900">Design Collective</span>
            </nav>
            <div class="max-w-3xl">
                <h1 class="font-serif text-3xl sm:text-4xl lg:text-5xl font-medium tracking-tight text-stone-900">
                    The Hands &amp; Minds Behind the Craft.
                </h1>
                <p class="text-sm sm:text-base text-stone-600 mt-3 leading-relaxed">
                    Meet the architects, master woodworkers, and textile specialists who shape every curve and joint in our atelier collections.
                </p>
            </div>
        </div>
    </header>

    <!-- TEAM GRID SECTION -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 lg:py-24">
        <!-- [PHP_BACKEND_HOOK: Dynamic team members loop: SELECT * FROM team ORDER BY id ASC. Use foreach($team as $member) to render: $member['id'], $member['name'], $member['position'], $member['image']] -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 lg:gap-10">
            
            <!-- Member 1 -->
            <article class="group bg-white rounded-2xl border border-stone-200 overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col">
                <div class="relative aspect-[4/5] bg-stone-100 overflow-hidden">
                    <img src="images/team-1.jpg" alt="Kyaw Zin Hein" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" loading="lazy">
                    <div class="absolute inset-0 bg-gradient-to-t from-stone-950/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity flex items-end p-6">
                        <div class="flex items-center gap-3 text-white">
                            <a href="#" aria-label="LinkedIn" class="w-8 h-8 rounded-full bg-white/20 backdrop-blur-md hover:bg-white hover:text-stone-900 flex items-center justify-center text-sm transition-colors">
                                <i class="ri-linkedin-box-line"></i>
                            </a>
                            <a href="#" aria-label="Instagram" class="w-8 h-8 rounded-full bg-white/20 backdrop-blur-md hover:bg-white hover:text-stone-900 flex items-center justify-center text-sm transition-colors">
                                <i class="ri-instagram-line"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="p-6 flex-1 flex flex-col justify-between">
                    <div>
                        <span class="text-xs font-semibold uppercase tracking-wider text-amber-800">Founder &amp; Principal Architect</span>
                        <h3 class="font-serif text-xl font-medium text-stone-900 mt-1">Kyaw Zin Hein</h3>
                        <p class="text-xs text-stone-600 mt-2 leading-relaxed">
                            Formally trained in Kyoto and Copenhagen, bringing twenty years of architectural proportioning and sustainable joinery research.
                        </p>
                    </div>
                </div>
            </article>

            <!-- Member 2 -->
            <article class="group bg-white rounded-2xl border border-stone-200 overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col">
                <div class="relative aspect-[4/5] bg-stone-100 overflow-hidden">
                    <img src="images/team-2.jpg" alt="Thiri May" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" loading="lazy">
                    <div class="absolute inset-0 bg-gradient-to-t from-stone-950/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity flex items-end p-6">
                        <div class="flex items-center gap-3 text-white">
                            <a href="#" aria-label="LinkedIn" class="w-8 h-8 rounded-full bg-white/20 backdrop-blur-md hover:bg-white hover:text-stone-900 flex items-center justify-center text-sm transition-colors">
                                <i class="ri-linkedin-box-line"></i>
                            </a>
                            <a href="#" aria-label="Instagram" class="w-8 h-8 rounded-full bg-white/20 backdrop-blur-md hover:bg-white hover:text-stone-900 flex items-center justify-center text-sm transition-colors">
                                <i class="ri-instagram-line"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="p-6 flex-1 flex flex-col justify-between">
                    <div>
                        <span class="text-xs font-semibold uppercase tracking-wider text-amber-800">Head of Interior Ergonomics</span>
                        <h3 class="font-serif text-xl font-medium text-stone-900 mt-1">Thiri May</h3>
                        <p class="text-xs text-stone-600 mt-2 leading-relaxed">
                            Directs user posture studies and spatial cadence to ensure every chair and daybed delivers profound restorative comfort.
                        </p>
                    </div>
                </div>
            </article>

            <!-- Member 3 -->
            <article class="group bg-white rounded-2xl border border-stone-200 overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col">
                <div class="relative aspect-[4/5] bg-stone-100 overflow-hidden">
                    <img src="images/team-3.jpg" alt="Aung Myo Tun" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" loading="lazy">
                    <div class="absolute inset-0 bg-gradient-to-t from-stone-950/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity flex items-end p-6">
                        <div class="flex items-center gap-3 text-white">
                            <a href="#" aria-label="LinkedIn" class="w-8 h-8 rounded-full bg-white/20 backdrop-blur-md hover:bg-white hover:text-stone-900 flex items-center justify-center text-sm transition-colors">
                                <i class="ri-linkedin-box-line"></i>
                            </a>
                            <a href="#" aria-label="Instagram" class="w-8 h-8 rounded-full bg-white/20 backdrop-blur-md hover:bg-white hover:text-stone-900 flex items-center justify-center text-sm transition-colors">
                                <i class="ri-instagram-line"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="p-6 flex-1 flex flex-col justify-between">
                    <div>
                        <span class="text-xs font-semibold uppercase tracking-wider text-amber-800">Master Wood Craftsman</span>
                        <h3 class="font-serif text-xl font-medium text-stone-900 mt-1">Aung Myo Tun</h3>
                        <p class="text-xs text-stone-600 mt-2 leading-relaxed">
                            Third-generation artisan supervising timber drying seasoning cycles, grain orientation, and precision joinery execution.
                        </p>
                    </div>
                </div>
            </article>

            <!-- Member 4 -->
            <article class="group bg-white rounded-2xl border border-stone-200 overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col">
                <div class="relative aspect-[4/5] bg-stone-100 overflow-hidden">
                    <img src="images/team-4.jpg" alt="Hnin Yu Nandar" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" loading="lazy">
                    <div class="absolute inset-0 bg-gradient-to-t from-stone-950/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity flex items-end p-6">
                        <div class="flex items-center gap-3 text-white">
                            <a href="#" aria-label="LinkedIn" class="w-8 h-8 rounded-full bg-white/20 backdrop-blur-md hover:bg-white hover:text-stone-900 flex items-center justify-center text-sm transition-colors">
                                <i class="ri-linkedin-box-line"></i>
                            </a>
                            <a href="#" aria-label="Instagram" class="w-8 h-8 rounded-full bg-white/20 backdrop-blur-md hover:bg-white hover:text-stone-900 flex items-center justify-center text-sm transition-colors">
                                <i class="ri-instagram-line"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="p-6 flex-1 flex flex-col justify-between">
                    <div>
                        <span class="text-xs font-semibold uppercase tracking-wider text-amber-800">Material &amp; Textile Curator</span>
                        <h3 class="font-serif text-xl font-medium text-stone-900 mt-1">Hnin Yu Nandar</h3>
                        <p class="text-xs text-stone-600 mt-2 leading-relaxed">
                            Selects organic unbleached linens, vegetable-tanned hides, and hand-spun wool weaves from regional smallholder weavers.
                        </p>
                    </div>
                </div>
            </article>

            <!-- Member 5 -->
            <article class="group bg-white rounded-2xl border border-stone-200 overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col">
                <div class="relative aspect-[4/5] bg-stone-100 overflow-hidden">
                    <img src="images/team-5.jpg" alt="Min Khant Zaw" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" loading="lazy">
                    <div class="absolute inset-0 bg-gradient-to-t from-stone-950/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity flex items-end p-6">
                        <div class="flex items-center gap-3 text-white">
                            <a href="#" aria-label="LinkedIn" class="w-8 h-8 rounded-full bg-white/20 backdrop-blur-md hover:bg-white hover:text-stone-900 flex items-center justify-center text-sm transition-colors">
                                <i class="ri-linkedin-box-line"></i>
                            </a>
                            <a href="#" aria-label="Instagram" class="w-8 h-8 rounded-full bg-white/20 backdrop-blur-md hover:bg-white hover:text-stone-900 flex items-center justify-center text-sm transition-colors">
                                <i class="ri-instagram-line"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="p-6 flex-1 flex flex-col justify-between">
                    <div>
                        <span class="text-xs font-semibold uppercase tracking-wider text-amber-800">Industrial Finishing Specialist</span>
                        <h3 class="font-serif text-xl font-medium text-stone-900 mt-1">Min Khant Zaw</h3>
                        <p class="text-xs text-stone-600 mt-2 leading-relaxed">
                            Pioneered our low-sheen botanical wax and natural tung-oil formulation for tactile moisture protection.
                        </p>
                    </div>
                </div>
            </article>

            <!-- Member 6 -->
            <article class="group bg-white rounded-2xl border border-stone-200 overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col">
                <div class="relative aspect-[4/5] bg-stone-100 overflow-hidden">
                    <img src="images/team-6.jpg" alt="Su Myat Mon" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" loading="lazy">
                    <div class="absolute inset-0 bg-gradient-to-t from-stone-950/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity flex items-end p-6">
                        <div class="flex items-center gap-3 text-white">
                            <a href="#" aria-label="LinkedIn" class="w-8 h-8 rounded-full bg-white/20 backdrop-blur-md hover:bg-white hover:text-stone-900 flex items-center justify-center text-sm transition-colors">
                                <i class="ri-linkedin-box-line"></i>
                            </a>
                            <a href="#" aria-label="Instagram" class="w-8 h-8 rounded-full bg-white/20 backdrop-blur-md hover:bg-white hover:text-stone-900 flex items-center justify-center text-sm transition-colors">
                                <i class="ri-instagram-line"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="p-6 flex-1 flex flex-col justify-between">
                    <div>
                        <span class="text-xs font-semibold uppercase tracking-wider text-amber-800">Showroom Concierge Director</span>
                        <h3 class="font-serif text-xl font-medium text-stone-900 mt-1">Su Myat Mon</h3>
                        <p class="text-xs text-stone-600 mt-2 leading-relaxed">
                            Leads customized home spatial walkthroughs and oversees white-glove delivery scheduling throughout Myanmar.
                        </p>
                    </div>
                </div>
            </article>

        </div>
    </main>

    <?php include "components/footer.php"; ?>
    <?php include "components/js.php"; ?>
</body>

</html>
