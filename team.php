<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Design Collective &amp; Artisans | FurnishMe</title>
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
                <span class="text-[#453A30]">/</span>
                <span class="text-[#C5A059] font-semibold">Design Collective</span>
            </nav>
            <div class="max-w-3xl">
                <h1 class="font-serif text-3xl sm:text-4xl lg:text-5xl font-normal tracking-tight text-[#FAF6EE]">
                    The Hands &amp; Minds Behind the Craft.
                </h1>
                <p class="text-sm sm:text-base text-[#D6C8B4] mt-3 leading-relaxed">
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
            <article class="group bg-[#161310] rounded-3xl border border-[#2A231C] overflow-hidden shadow-xl hover:shadow-2xl hover:border-[#C5A059] transition-all duration-500 flex flex-col">
                <div class="relative aspect-[4/5] bg-[#0D0B09] border-b border-[#221C16] overflow-hidden">
                    <img src="images/team-1.jpg" alt="Phone Myat Win" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" loading="lazy">
                    <div class="absolute inset-0 bg-gradient-to-t from-stone-950/80 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity flex items-end p-6">
                        <div class="flex items-center gap-3 text-white">
                            <a href="#" aria-label="LinkedIn" class="w-9 h-9 rounded-full bg-white/20 backdrop-blur-md hover:bg-[#C5A059] hover:text-[#0D0B09] flex items-center justify-center text-sm transition-colors">
                                <i class="ri-linkedin-box-line"></i>
                            </a>
                            <a href="#" aria-label="Instagram" class="w-9 h-9 rounded-full bg-white/20 backdrop-blur-md hover:bg-[#C5A059] hover:text-[#0D0B09] flex items-center justify-center text-sm transition-colors">
                                <i class="ri-instagram-line"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="p-6 flex-1 flex flex-col justify-between">
                    <div>
                        <span class="text-xs font-semibold uppercase tracking-wider text-[#C5A059]">Founder &amp; Principal Architect</span>
                        <h3 class="font-serif text-xl font-normal text-[#FAF6EE] mt-1">Phone Myat Win</h3>
                        <p class="text-xs text-[#8C7D6B] mt-2 leading-relaxed">
                            Formally trained in Kyoto and Copenhagen, bringing twenty years of architectural proportioning and sustainable joinery research.
                        </p>
                    </div>
                </div>
            </article>

            <!-- Member 2 -->
            <article class="group bg-[#161310] rounded-3xl border border-[#2A231C] overflow-hidden shadow-xl hover:shadow-2xl hover:border-[#C5A059] transition-all duration-500 flex flex-col">
                <div class="relative aspect-[4/5] bg-[#0D0B09] border-b border-[#221C16] overflow-hidden">
                    <img src="images/team-2.jpg" alt="Thae Nay Nwe Soe" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" loading="lazy">
                    <div class="absolute inset-0 bg-gradient-to-t from-stone-950/80 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity flex items-end p-6">
                        <div class="flex items-center gap-3 text-white">
                            <a href="#" aria-label="LinkedIn" class="w-9 h-9 rounded-full bg-white/20 backdrop-blur-md hover:bg-[#C5A059] hover:text-[#0D0B09] flex items-center justify-center text-sm transition-colors">
                                <i class="ri-linkedin-box-line"></i>
                            </a>
                            <a href="#" aria-label="Instagram" class="w-9 h-9 rounded-full bg-white/20 backdrop-blur-md hover:bg-[#C5A059] hover:text-[#0D0B09] flex items-center justify-center text-sm transition-colors">
                                <i class="ri-instagram-line"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="p-6 flex-1 flex flex-col justify-between">
                    <div>
                        <span class="text-xs font-semibold uppercase tracking-wider text-[#C5A059]">Head of Interior Ergonomics</span>
                        <h3 class="font-serif text-xl font-normal text-[#FAF6EE] mt-1">Thae Nay Nwe Soe</h3>
                        <p class="text-xs text-[#8C7D6B] mt-2 leading-relaxed">
                            Directs user posture studies and spatial cadence to ensure every chair and daybed delivers profound restorative comfort.
                        </p>
                    </div>
                </div>
            </article>

            <!-- Member 3 -->
            <article class="group bg-[#161310] rounded-3xl border border-[#2A231C] overflow-hidden shadow-xl hover:shadow-2xl hover:border-[#C5A059] transition-all duration-500 flex flex-col">
                <div class="relative aspect-[4/5] bg-[#0D0B09] border-b border-[#221C16] overflow-hidden">
                    <img src="images/team-3.jpg" alt="Su Thinzar Htet" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" loading="lazy">
                    <div class="absolute inset-0 bg-gradient-to-t from-stone-950/80 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity flex items-end p-6">
                        <div class="flex items-center gap-3 text-white">
                            <a href="#" aria-label="LinkedIn" class="w-9 h-9 rounded-full bg-white/20 backdrop-blur-md hover:bg-[#C5A059] hover:text-[#0D0B09] flex items-center justify-center text-sm transition-colors">
                                <i class="ri-linkedin-box-line"></i>
                            </a>
                            <a href="#" aria-label="Instagram" class="w-9 h-9 rounded-full bg-white/20 backdrop-blur-md hover:bg-[#C5A059] hover:text-[#0D0B09] flex items-center justify-center text-sm transition-colors">
                                <i class="ri-instagram-line"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="p-6 flex-1 flex flex-col justify-between">
                    <div>
                        <span class="text-xs font-semibold uppercase tracking-wider text-[#C5A059]">Master Wood Craftsman</span>
                        <h3 class="font-serif text-xl font-normal text-[#FAF6EE] mt-1">Su Thinzar Htet</h3>
                        <p class="text-xs text-[#8C7D6B] mt-2 leading-relaxed">
                            Third-generation artisan supervising timber drying seasoning cycles, grain orientation, and precision joinery execution.
                        </p>
                    </div>
                </div>
            </article>

            <!-- Member 4 -->
            <article class="group bg-[#161310] rounded-3xl border border-[#2A231C] overflow-hidden shadow-xl hover:shadow-2xl hover:border-[#C5A059] transition-all duration-500 flex flex-col">
                <div class="relative aspect-[4/5] bg-[#0D0B09] border-b border-[#221C16] overflow-hidden">
                    <img src="images/team-4.jpg" alt="Myat Chal Oo" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" loading="lazy">
                    <div class="absolute inset-0 bg-gradient-to-t from-stone-950/80 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity flex items-end p-6">
                        <div class="flex items-center gap-3 text-white">
                            <a href="#" aria-label="LinkedIn" class="w-9 h-9 rounded-full bg-white/20 backdrop-blur-md hover:bg-[#C5A059] hover:text-[#0D0B09] flex items-center justify-center text-sm transition-colors">
                                <i class="ri-linkedin-box-line"></i>
                            </a>
                            <a href="#" aria-label="Instagram" class="w-9 h-9 rounded-full bg-white/20 backdrop-blur-md hover:bg-[#C5A059] hover:text-[#0D0B09] flex items-center justify-center text-sm transition-colors">
                                <i class="ri-instagram-line"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="p-6 flex-1 flex flex-col justify-between">
                    <div>
                        <span class="text-xs font-semibold uppercase tracking-wider text-[#C5A059]">Material &amp; Textile Curator</span>
                        <h3 class="font-serif text-xl font-normal text-[#FAF6EE] mt-1">Myat Chal Oo</h3>
                        <p class="text-xs text-[#8C7D6B] mt-2 leading-relaxed">
                            Selects organic unbleached linens, vegetable-tanned hides, and hand-spun wool weaves from regional smallholder weavers.
                        </p>
                    </div>
                </div>
            </article>

            <!-- Member 5 -->
            <article class="group bg-[#161310] rounded-3xl border border-[#2A231C] overflow-hidden shadow-xl hover:shadow-2xl hover:border-[#C5A059] transition-all duration-500 flex flex-col">
                <div class="relative aspect-[4/5] bg-[#0D0B09] border-b border-[#221C16] overflow-hidden">
                    <img src="images/team-5.jpg" alt="Nyi Nyi Aung" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" loading="lazy">
                    <div class="absolute inset-0 bg-gradient-to-t from-stone-950/80 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity flex items-end p-6">
                        <div class="flex items-center gap-3 text-white">
                            <a href="#" aria-label="LinkedIn" class="w-9 h-9 rounded-full bg-white/20 backdrop-blur-md hover:bg-[#C5A059] hover:text-[#0D0B09] flex items-center justify-center text-sm transition-colors">
                                <i class="ri-linkedin-box-line"></i>
                            </a>
                            <a href="#" aria-label="Instagram" class="w-9 h-9 rounded-full bg-white/20 backdrop-blur-md hover:bg-[#C5A059] hover:text-[#0D0B09] flex items-center justify-center text-sm transition-colors">
                                <i class="ri-instagram-line"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="p-6 flex-1 flex flex-col justify-between">
                    <div>
                        <span class="text-xs font-semibold uppercase tracking-wider text-[#C5A059]">Finishing Specialist</span>
                        <h3 class="font-serif text-xl font-normal text-[#FAF6EE] mt-1">Nyi Nyi Aung</h3>
                        <p class="text-xs text-[#8C7D6B] mt-2 leading-relaxed">
                            Pioneered our low-sheen botanical wax and natural tung-oil formulation for tactile moisture protection.
                        </p>
                    </div>
                </div>
            </article>

            <!-- Member 6 -->
            <article class="group bg-[#161310] rounded-3xl border border-[#2A231C] overflow-hidden shadow-xl hover:shadow-2xl hover:border-[#C5A059] transition-all duration-500 flex flex-col">
                <div class="relative aspect-[4/5] bg-[#0D0B09] border-b border-[#221C16] overflow-hidden">
                    <img src="images/team-6.jpg" alt="Min Khant Naung" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" loading="lazy">
                    <div class="absolute inset-0 bg-gradient-to-t from-stone-950/80 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity flex items-end p-6">
                        <div class="flex items-center gap-3 text-white">
                            <a href="#" aria-label="LinkedIn" class="w-9 h-9 rounded-full bg-white/20 backdrop-blur-md hover:bg-[#C5A059] hover:text-[#0D0B09] flex items-center justify-center text-sm transition-colors">
                                <i class="ri-linkedin-box-line"></i>
                            </a>
                            <a href="#" aria-label="Instagram" class="w-9 h-9 rounded-full bg-white/20 backdrop-blur-md hover:bg-[#C5A059] hover:text-[#0D0B09] flex items-center justify-center text-sm transition-colors">
                                <i class="ri-instagram-line"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="p-6 flex-1 flex flex-col justify-between">
                    <div>
                        <span class="text-xs font-semibold uppercase tracking-wider text-[#C5A059]">Showroom Concierge Director</span>
                        <h3 class="font-serif text-xl font-normal text-[#FAF6EE] mt-1">Min Khant Naung</h3>
                        <p class="text-xs text-[#8C7D6B] mt-2 leading-relaxed">
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
