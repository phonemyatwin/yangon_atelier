<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FurnishMe Atelier — Warm Minimalist Furniture &amp; Objects</title>
    <link rel="icon" type="image/x-icon" href="images/favicon.ico?v=2">
    <link rel="icon" type="image/png" sizes="32x32" href="images/favicon-32x32.png?v=2">
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon-16x16.png?v=2">
    <link rel="apple-touch-icon" sizes="180x180" href="images/apple-touch-icon.png?v=2">
    <?php include "components/css.php"; ?>
</head>

<body class="bg-[#0D0B09] text-[#EDE4D7] font-sans selection:bg-[#C5A059] selection:text-[#0D0B09]">
    <?php include "components/header.php"; ?>
    <?php include "components/navbar.php"; ?>

    <!-- HERO SLIDER SECTION -->
    <!-- [PHP_BACKEND_HOOK: Featured Hero Slider Query (e.g., SELECT * FROM hero_slides WHERE active = 1 ORDER BY sort_order ASC)] -->
    <section class="relative bg-stone-950 text-white overflow-hidden">
        <div class="relative min-h-[620px] lg:min-h-[720px] flex items-center">
            
            <!-- Slide 1: Heirloom Private Library Suite (Active by default) -->
            <div class="hero-slide absolute inset-0 transition-opacity duration-1000 ease-in-out opacity-100 z-10">
                <div class="absolute inset-0">
                    <img src="images/hero-luxury-suite.jpg" alt="Heirloom Private Library Suite" class="w-full h-full object-cover" loading="eager" fetchpriority="high">
                    <div class="absolute inset-0 bg-gradient-to-r from-stone-950/95 via-stone-950/60 to-transparent"></div>
                </div>
                <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full h-full flex items-center py-20">
                    <div class="max-w-2xl space-y-6">
                        <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-white/10 backdrop-blur-md border border-[#C5A059]/40 text-xs tracking-wider uppercase font-medium text-[#C5A059]">
                            <span class="w-2 h-2 rounded-full bg-[#C5A059]"></span>
                            <span>Grand Manor Edition</span>
                        </div>
                        <h1 class="font-serif text-4xl sm:text-5xl lg:text-6xl font-normal tracking-tight text-[#FAF6EE] leading-[1.12]">
                            The Quiet Grandeur of Heritage Living.
                        </h1>
                        <p class="text-base sm:text-lg text-[#D6C8B4] font-normal leading-relaxed">
                            Hand-rubbed walnut paneling, bespoke tufted daybeds, and sculpted reading illumination curated for distinguished domestic estates.
                        </p>
                        <div class="flex flex-wrap items-center gap-4 pt-4">
                            <a href="shop.php" class="inline-flex items-center gap-2.5 px-7 py-3.5 rounded-xl bg-[#C5A059] hover:bg-[#D4AF37] text-[#0D0B09] font-semibold text-sm transition-all shadow-xl hover:shadow-2xl">
                                <span>Explore Collection</span>
                                <i class="ri-arrow-right-line"></i>
                            </a>
                            <a href="contact.php" class="inline-flex items-center gap-2 px-6 py-3.5 rounded-xl bg-white/10 hover:bg-white/20 backdrop-blur-md text-[#FAF6EE] border border-white/20 text-sm font-medium transition-colors">
                                <span>Showroom Concierge</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Slide 2: Chateau Grand Hearth -->
            <div class="hero-slide absolute inset-0 transition-opacity duration-1000 ease-in-out opacity-0 pointer-events-none z-0">
                <div class="absolute inset-0">
                    <img src="images/hero-chateau-salon.jpg" alt="Chateau Grand Hearth Salon" class="w-full h-full object-cover" loading="lazy">
                    <div class="absolute inset-0 bg-gradient-to-r from-stone-950/95 via-stone-950/60 to-transparent"></div>
                </div>
                <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full h-full flex items-center py-20">
                    <div class="max-w-2xl space-y-6">
                        <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-white/10 backdrop-blur-md border border-emerald-500/40 text-xs tracking-wider uppercase font-medium text-emerald-300">
                            <span class="w-2 h-2 rounded-full bg-emerald-400"></span>
                            <span>Historic Craft Traditions</span>
                        </div>
                        <h2 class="font-serif text-4xl sm:text-5xl lg:text-6xl font-normal tracking-tight text-[#FAF6EE] leading-[1.12]">
                            Monumental Hearth, Hand-Planed Beams.
                        </h2>
                        <p class="text-base sm:text-lg text-[#D6C8B4] font-normal leading-relaxed">
                            Ancient timber joinery traditions resurrected with deep-buttoned leather wingbacks and authentic stone proportions.
                        </p>
                        <div class="flex flex-wrap items-center gap-4 pt-4">
                            <a href="shop.php?category=sofas" class="inline-flex items-center gap-2.5 px-7 py-3.5 rounded-xl bg-[#C5A059] hover:bg-[#D4AF37] text-[#0D0B09] font-semibold text-sm transition-all shadow-xl hover:shadow-2xl">
                                <span>Discover Living Pieces</span>
                                <i class="ri-arrow-right-line"></i>
                            </a>
                            <a href="about.php" class="inline-flex items-center gap-2 px-6 py-3.5 rounded-xl bg-white/10 hover:bg-white/20 backdrop-blur-md text-[#FAF6EE] border border-white/20 text-sm font-medium transition-colors">
                                <span>Atelier Philosophy</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Slide 3: Gilded Drawing Room -->
            <div class="hero-slide absolute inset-0 transition-opacity duration-1000 ease-in-out opacity-0 pointer-events-none z-0">
                <div class="absolute inset-0">
                    <img src="images/hero-gilded-salon.jpg" alt="Gilded Estate Drawing Room" class="w-full h-full object-cover" loading="lazy">
                    <div class="absolute inset-0 bg-gradient-to-r from-stone-950/95 via-stone-950/60 to-transparent"></div>
                </div>
                <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full h-full flex items-center py-20">
                    <div class="max-w-2xl space-y-6">
                        <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-white/10 backdrop-blur-md border border-[#C5A059]/40 text-xs tracking-wider uppercase font-medium text-[#C5A059]">
                            <span class="w-2 h-2 rounded-full bg-[#C5A059]"></span>
                            <span>Ceremonial Salon</span>
                        </div>
                        <h2 class="font-serif text-4xl sm:text-5xl lg:text-6xl font-normal tracking-tight text-[#FAF6EE] leading-[1.12]">
                            The Splendor of Aristocratic Domesticity.
                        </h2>
                        <p class="text-base sm:text-lg text-[#D6C8B4] font-normal leading-relaxed">
                            Carved consoles, burnished leather seating, and hand-finished bronze chandeliers capturing the majestic romance of royal chambers.
                        </p>
                        <div class="flex flex-wrap items-center gap-4 pt-4">
                            <a href="shop.php" class="inline-flex items-center gap-2.5 px-7 py-3.5 rounded-xl bg-[#C5A059] hover:bg-[#D4AF37] text-[#0D0B09] font-semibold text-sm transition-all shadow-xl hover:shadow-2xl">
                                <span>View Signature Pieces</span>
                                <i class="ri-arrow-right-line"></i>
                            </a>
                            <a href="contact.php" class="inline-flex items-center gap-2 px-6 py-3.5 rounded-xl bg-white/10 hover:bg-white/20 backdrop-blur-md text-[#FAF6EE] border border-white/20 text-sm font-medium transition-colors">
                                <span>Private Commissions</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Slide 4: Executive Estate Study -->
            <div class="hero-slide absolute inset-0 transition-opacity duration-1000 ease-in-out opacity-0 pointer-events-none z-0">
                <div class="absolute inset-0">
                    <img src="images/hero-estate-study.jpg" alt="Executive Estate Study & Salon" class="w-full h-full object-cover" loading="lazy">
                    <div class="absolute inset-0 bg-gradient-to-r from-stone-950/95 via-stone-950/60 to-transparent"></div>
                </div>
                <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full h-full flex items-center py-20">
                    <div class="max-w-2xl space-y-6">
                        <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-white/10 backdrop-blur-md border border-[#C5A059]/40 text-xs tracking-wider uppercase font-medium text-[#C5A059]">
                            <span class="w-2 h-2 rounded-full bg-[#C5A059]"></span>
                            <span>Executive Study</span>
                        </div>
                        <h2 class="font-serif text-4xl sm:text-5xl lg:text-6xl font-normal tracking-tight text-[#FAF6EE] leading-[1.12]">
                            Architectural Harmony &amp; Timeless Focus.
                        </h2>
                        <p class="text-base sm:text-lg text-[#D6C8B4] font-normal leading-relaxed">
                            Stained glass daylight illuminating carved walnut writing desks and woven damask armchairs engineered for contemplative grace.
                        </p>
                        <div class="flex flex-wrap items-center gap-4 pt-4">
                            <a href="shop.php?category=workspace" class="inline-flex items-center gap-2.5 px-7 py-3.5 rounded-xl bg-[#C5A059] hover:bg-[#D4AF37] text-[#0D0B09] font-semibold text-sm transition-all shadow-xl hover:shadow-2xl">
                                <span>Explore Workspace</span>
                                <i class="ri-arrow-right-line"></i>
                            </a>
                            <a href="team.php" class="inline-flex items-center gap-2 px-6 py-3.5 rounded-xl bg-white/10 hover:bg-white/20 backdrop-blur-md text-[#FAF6EE] border border-white/20 text-sm font-medium transition-colors">
                                <span>Design Collective</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Slide 5: Minimalist Living Interior -->
            <div class="hero-slide absolute inset-0 transition-opacity duration-1000 ease-in-out opacity-0 pointer-events-none z-0">
                <div class="absolute inset-0">
                    <img src="images/hero-slide-1.jpg" alt="Minimalist Living Interior" class="w-full h-full object-cover" loading="lazy">
                    <div class="absolute inset-0 bg-gradient-to-r from-stone-950/90 via-stone-950/50 to-transparent"></div>
                </div>
                <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full h-full flex items-center py-20">
                    <div class="max-w-2xl space-y-6">
                        <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-white/10 backdrop-blur-md border border-[#C5A059]/40 text-xs tracking-wider uppercase font-medium text-[#C5A059]">
                            <span class="w-2 h-2 rounded-full bg-[#C5A059]"></span>
                            <span>Autumn Atelier Edition</span>
                        </div>
                        <h2 class="font-serif text-4xl sm:text-5xl lg:text-6xl font-normal tracking-tight text-[#FAF6EE] leading-[1.12]">
                            The Art of Quiet, Tactile Living.
                        </h2>
                        <p class="text-base sm:text-lg text-[#D6C8B4] font-normal leading-relaxed">
                            Experience sculpted silhouettes, solid certified timber, and textured woven textiles handcrafted for mindful domestic sanctuaries.
                        </p>
                        <div class="flex flex-wrap items-center gap-4 pt-4">
                            <a href="shop.php" class="inline-flex items-center gap-2.5 px-7 py-3.5 rounded-xl bg-[#C5A059] hover:bg-[#D4AF37] text-[#0D0B09] font-semibold text-sm transition-all shadow-xl hover:shadow-2xl">
                                <span>Explore Collection</span>
                                <i class="ri-arrow-right-line"></i>
                            </a>
                            <a href="about.php" class="inline-flex items-center gap-2 px-6 py-3.5 rounded-xl bg-white/10 hover:bg-white/20 backdrop-blur-md text-[#FAF6EE] border border-white/20 text-sm font-medium transition-colors">
                                <span>Atelier Philosophy</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Slide 6: Warm Dining Room Interior -->
            <div class="hero-slide absolute inset-0 transition-opacity duration-1000 ease-in-out opacity-0 pointer-events-none z-0">
                <div class="absolute inset-0">
                    <img src="images/hero-slide-2.jpg" alt="Warm Dining Room Interior" class="w-full h-full object-cover" loading="lazy">
                    <div class="absolute inset-0 bg-gradient-to-r from-stone-950/90 via-stone-950/50 to-transparent"></div>
                </div>
                <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full h-full flex items-center py-20">
                    <div class="max-w-2xl space-y-6">
                        <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-white/10 backdrop-blur-md border border-emerald-500/40 text-xs tracking-wider uppercase font-medium text-emerald-300">
                            <span class="w-2 h-2 rounded-full bg-emerald-400"></span>
                            <span>Heritage Joinery</span>
                        </div>
                        <h2 class="font-serif text-4xl sm:text-5xl lg:text-6xl font-normal tracking-tight text-[#FAF6EE] leading-[1.12]">
                            Grounded in Nature, Crafted to Endure.
                        </h2>
                        <p class="text-base sm:text-lg text-[#D6C8B4] font-normal leading-relaxed">
                            Form follows serenity. Every piece honors natural timber grain, certified regional teak, and honest craftsmanship without nails.
                        </p>
                        <div class="flex flex-wrap items-center gap-4 pt-4">
                            <a href="shop.php?category=dining" class="inline-flex items-center gap-2.5 px-7 py-3.5 rounded-xl bg-[#C5A059] hover:bg-[#D4AF37] text-[#0D0B09] font-semibold text-sm transition-all shadow-xl hover:shadow-2xl">
                                <span>Discover Dining</span>
                                <i class="ri-arrow-right-line"></i>
                            </a>
                            <a href="product_detail.php?id=4" class="inline-flex items-center gap-2 px-6 py-3.5 rounded-xl bg-white/10 hover:bg-white/20 backdrop-blur-md text-[#FAF6EE] border border-white/20 text-sm font-medium transition-colors">
                                <span>View Oak Table</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Slide 7: Master Bedroom Sanctuary -->
            <div class="hero-slide absolute inset-0 transition-opacity duration-1000 ease-in-out opacity-0 pointer-events-none z-0">
                <div class="absolute inset-0">
                    <img src="images/hero-slide-3.jpg" alt="Master Bedroom Sanctuary" class="w-full h-full object-cover" loading="lazy">
                    <div class="absolute inset-0 bg-gradient-to-r from-stone-950/90 via-stone-950/50 to-transparent"></div>
                </div>
                <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full h-full flex items-center py-20">
                    <div class="max-w-2xl space-y-6">
                        <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-white/10 backdrop-blur-md border border-[#C5A059]/40 text-xs tracking-wider uppercase font-medium text-[#C5A059]">
                            <span class="w-2 h-2 rounded-full bg-[#C5A059]"></span>
                            <span>Rest &amp; Restoration</span>
                        </div>
                        <h2 class="font-serif text-4xl sm:text-5xl lg:text-6xl font-normal tracking-tight text-[#FAF6EE] leading-[1.12]">
                            Sanctuary for Rest &amp; Reflection.
                        </h2>
                        <p class="text-base sm:text-lg text-[#D6C8B4] font-normal leading-relaxed">
                            Low-profile Japanese tatami aesthetics harmonized with European linen upholstery for deep restorative slumber.
                        </p>
                        <div class="flex flex-wrap items-center gap-4 pt-4">
                            <a href="shop.php?category=beds" class="inline-flex items-center gap-2.5 px-7 py-3.5 rounded-xl bg-[#C5A059] hover:bg-[#D4AF37] text-[#0D0B09] font-semibold text-sm transition-all shadow-xl hover:shadow-2xl">
                                <span>Explore Bedroom</span>
                                <i class="ri-arrow-right-line"></i>
                            </a>
                            <a href="product_detail.php?id=5" class="inline-flex items-center gap-2 px-6 py-3.5 rounded-xl bg-white/10 hover:bg-white/20 backdrop-blur-md text-[#FAF6EE] border border-white/20 text-sm font-medium transition-colors">
                                <span>View Platform Bed</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- Slider Controls -->
        <div class="absolute bottom-8 left-0 right-0 z-20">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex items-center justify-between">
                <!-- Dots / Indicators (7 slides) -->
                <div class="flex items-center gap-2.5">
                    <button type="button" aria-label="Slide 1" onclick="showSlide(0)" class="hero-dot h-2 w-8 rounded-full bg-[#C5A059] transition-all"></button>
                    <button type="button" aria-label="Slide 2" onclick="showSlide(1)" class="hero-dot h-2 w-2.5 rounded-full bg-white/40 hover:bg-white/70 transition-all"></button>
                    <button type="button" aria-label="Slide 3" onclick="showSlide(2)" class="hero-dot h-2 w-2.5 rounded-full bg-white/40 hover:bg-white/70 transition-all"></button>
                    <button type="button" aria-label="Slide 4" onclick="showSlide(3)" class="hero-dot h-2 w-2.5 rounded-full bg-white/40 hover:bg-white/70 transition-all"></button>
                    <button type="button" aria-label="Slide 5" onclick="showSlide(4)" class="hero-dot h-2 w-2.5 rounded-full bg-white/40 hover:bg-white/70 transition-all"></button>
                    <button type="button" aria-label="Slide 6" onclick="showSlide(5)" class="hero-dot h-2 w-2.5 rounded-full bg-white/40 hover:bg-white/70 transition-all"></button>
                    <button type="button" aria-label="Slide 7" onclick="showSlide(6)" class="hero-dot h-2 w-2.5 rounded-full bg-white/40 hover:bg-white/70 transition-all"></button>
                </div>

                <!-- Navigation Arrow Buttons -->
                <div class="flex items-center gap-2.5">
                    <button type="button" id="slide-prev" onclick="prev()" aria-label="Previous Slide" class="w-11 h-11 rounded-full bg-white/10 hover:bg-white/25 backdrop-blur-md text-[#FAF6EE] border border-white/20 shadow-sm flex items-center justify-center transition-colors">
                        <i class="ri-arrow-left-line text-lg"></i>
                    </button>
                    <button type="button" id="slide-next" onclick="next()" aria-label="Next Slide" class="w-11 h-11 rounded-full bg-white/10 hover:bg-white/25 backdrop-blur-md text-[#FAF6EE] border border-white/20 shadow-sm flex items-center justify-center transition-colors">
                        <i class="ri-arrow-right-line text-lg"></i>
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- BENTO / EDITORIAL BANNERS -->
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
        <div class="text-center max-w-2xl mx-auto mb-14">
            <span class="text-xs uppercase tracking-[0.25em] text-[#C5A059] font-semibold block mb-2">Architectural Spaces</span>
            <h2 class="font-serif text-3xl sm:text-4xl font-normal text-[#FAF6EE] tracking-tight">Environments of Calm &amp; Rest</h2>
        </div>

        <!-- [PHP_BACKEND_HOOK: Dynamic banner collection loop or seasonal promotional query] -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 lg:gap-8">
            <!-- Banner 1: Living Room -->
            <a href="shop.php?category=sofas" class="group relative rounded-3xl overflow-hidden aspect-[4/5] bg-[#161310] block shadow-xl hover:shadow-2xl transition-all duration-500 border border-[#2A231C] hover:border-[#C5A059]">
                <img src="images/banner-living-room.jpg" alt="Living & Lounge Architecture" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700 ease-out" loading="lazy">
                <div class="absolute inset-0 bg-gradient-to-t from-stone-950/90 via-stone-950/30 to-transparent"></div>
                <div class="absolute bottom-0 inset-x-0 p-6 sm:p-8 text-white space-y-2">
                    <span class="text-xs uppercase tracking-wider text-[#C5A059] font-medium">Lounge &amp; Living</span>
                    <h3 class="font-serif text-2xl font-normal leading-snug text-[#FAF6EE]">The Communal Hearth</h3>
                    <div class="inline-flex items-center gap-1.5 text-xs font-medium text-[#D6C8B4] group-hover:text-[#C5A059] pt-2 transition-colors">
                        <span>Discover Lounge Editions</span>
                        <i class="ri-arrow-right-line transition-transform group-hover:translate-x-1"></i>
                    </div>
                </div>
            </a>

            <!-- Banner 2: Dining Room -->
            <a href="shop.php?category=tables" class="group relative rounded-3xl overflow-hidden aspect-[4/5] bg-[#161310] block shadow-xl hover:shadow-2xl transition-all duration-500 border border-[#2A231C] hover:border-[#C5A059]">
                <img src="images/banner-dining-room.jpg" alt="Dining Room Architecture" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700 ease-out" loading="lazy">
                <div class="absolute inset-0 bg-gradient-to-t from-stone-950/90 via-stone-950/30 to-transparent"></div>
                <div class="absolute bottom-0 inset-x-0 p-6 sm:p-8 text-white space-y-2">
                    <span class="text-xs uppercase tracking-wider text-[#C5A059] font-medium">Dining &amp; Gathering</span>
                    <h3 class="font-serif text-2xl font-normal leading-snug text-[#FAF6EE]">Solid Timber Tables</h3>
                    <div class="inline-flex items-center gap-1.5 text-xs font-medium text-[#D6C8B4] group-hover:text-[#C5A059] pt-2 transition-colors">
                        <span>Explore Dining Sets</span>
                        <i class="ri-arrow-right-line transition-transform group-hover:translate-x-1"></i>
                    </div>
                </div>
            </a>

            <!-- Banner 3: Workspace -->
            <a href="shop.php?category=workspace" class="group relative rounded-3xl overflow-hidden aspect-[4/5] bg-[#161310] block shadow-xl hover:shadow-2xl transition-all duration-500 border border-[#2A231C] hover:border-[#C5A059]">
                <img src="images/banner-workspace.jpg" alt="Workspace & Studio Architecture" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700 ease-out" loading="lazy">
                <div class="absolute inset-0 bg-gradient-to-t from-stone-950/90 via-stone-950/30 to-transparent"></div>
                <div class="absolute bottom-0 inset-x-0 p-6 sm:p-8 text-white space-y-2">
                    <span class="text-xs uppercase tracking-wider text-[#C5A059] font-medium">Studio &amp; Focus</span>
                    <h3 class="font-serif text-2xl font-normal leading-snug text-[#FAF6EE]">Mindful Workspace</h3>
                    <div class="inline-flex items-center gap-1.5 text-xs font-medium text-[#D6C8B4] group-hover:text-[#C5A059] pt-2 transition-colors">
                        <span>View Work Desks</span>
                        <i class="ri-arrow-right-line transition-transform group-hover:translate-x-1"></i>
                    </div>
                </div>
            </a>
        </div>
    </section>

    <!-- FEATURED PRODUCTS GRID -->
    <section class="bg-[#110E0C] border-y border-[#221C16] py-20 lg:py-28">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row md:items-end justify-between mb-14 gap-4">
                <div>
                    <span class="text-xs uppercase tracking-[0.25em] text-[#C5A059] font-semibold block mb-2">Signature Editions</span>
                    <h2 class="font-serif text-3xl sm:text-4xl font-normal text-[#FAF6EE] tracking-tight">Featured Atelier Pieces</h2>
                </div>
                <a href="shop.php" class="inline-flex items-center gap-2 text-sm font-medium text-[#FAF6EE] hover:text-[#C5A059] transition-colors">
                    <span>View Entire Catalog</span>
                    <i class="ri-arrow-right-line"></i>
                </a>
            </div>

            <!-- [PHP_BACKEND_HOOK: Dynamic product loop. Use foreach($products as $product) to render: $product['id'], $product['image'], $product['name'], $product['price'], $product['stock']] -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 sm:gap-8">
                
                <!-- Product 1: Nordic Armchair -->
                <div class="group bg-[#161310] rounded-3xl border border-[#2A231C] overflow-hidden transition-all duration-300 hover:shadow-2xl hover:border-[#C5A059] flex flex-col justify-between">
                    <div class="relative w-full aspect-[4/3] bg-[#0D0B09] border-b border-[#221C16] overflow-hidden flex items-center justify-center">
                        <span class="absolute top-3 left-3 z-10 inline-flex items-center px-2.5 py-1 rounded-full text-[11px] font-medium bg-[#132A1C] text-[#52D288] border border-[#1E4D32]">
                            In Stock
                        </span>
                        <a href="product_detail.php?id=1" class="w-full h-full block">
                            <img src="images/chair-1.jpg" alt="Nordic Solid Wood Armchair" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" loading="lazy">
                        </a>
                        <div class="absolute inset-0 bg-stone-950/40 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center gap-2">
                            <a href="product_detail.php?id=1" class="w-10 h-10 rounded-full bg-[#C5A059] text-[#0D0B09] hover:bg-[#FAF6EE] flex items-center justify-center shadow-md transition-colors" title="View Details">
                                <i class="ri-eye-line text-lg"></i>
                            </a>
                        </div>
                    </div>
                    <div class="p-5 flex flex-col flex-1 justify-between">
                        <div>
                            <span class="text-[11px] uppercase tracking-wider text-[#C5A059] font-medium">Chairs &amp; Seating</span>
                            <h3 class="font-serif text-base font-normal text-[#FAF6EE] group-hover:text-[#C5A059] transition-colors mt-0.5">
                                <a href="product_detail.php?id=1">Nordic Solid Wood Armchair</a>
                            </h3>
                        </div>
                        <div class="pt-4 flex items-center justify-between border-t border-[#221C16] mt-4">
                            <span class="text-sm font-semibold text-[#FAF6EE]">420,000 MMK</span>
                            <span class="text-xs text-[#8C7D6B]">25 available</span>
                        </div>
                    </div>
                </div>

                <!-- Product 2: Sculptural Lounge Chair -->
                <div class="group bg-[#161310] rounded-3xl border border-[#2A231C] overflow-hidden transition-all duration-300 hover:shadow-2xl hover:border-[#C5A059] flex flex-col justify-between">
                    <div class="relative w-full aspect-[4/3] bg-[#0D0B09] border-b border-[#221C16] overflow-hidden flex items-center justify-center">
                        <span class="absolute top-3 left-3 z-10 inline-flex items-center px-2.5 py-1 rounded-full text-[11px] font-medium bg-[#132A1C] text-[#52D288] border border-[#1E4D32]">
                            In Stock
                        </span>
                        <a href="product_detail.php?id=2" class="w-full h-full block">
                            <img src="images/chair-2.jpg" alt="Curved Lounge Armchair" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" loading="lazy">
                        </a>
                        <div class="absolute inset-0 bg-stone-950/40 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center gap-2">
                            <a href="product_detail.php?id=2" class="w-10 h-10 rounded-full bg-[#C5A059] text-[#0D0B09] hover:bg-[#FAF6EE] flex items-center justify-center shadow-md transition-colors" title="View Details">
                                <i class="ri-eye-line text-lg"></i>
                            </a>
                        </div>
                    </div>
                    <div class="p-5 flex flex-col flex-1 justify-between">
                        <div>
                            <span class="text-[11px] uppercase tracking-wider text-[#C5A059] font-medium">Lounge</span>
                            <h3 class="font-serif text-base font-normal text-[#FAF6EE] group-hover:text-[#C5A059] transition-colors mt-0.5">
                                <a href="product_detail.php?id=2">Curved Lounge Armchair</a>
                            </h3>
                        </div>
                        <div class="pt-4 flex items-center justify-between border-t border-[#221C16] mt-4">
                            <span class="text-sm font-semibold text-[#FAF6EE]">580,000 MMK</span>
                            <span class="text-xs text-[#8C7D6B]">50 available</span>
                        </div>
                    </div>
                </div>

                <!-- Product 3: Bouclé Modular Sofa -->
                <div class="group bg-[#161310] rounded-3xl border border-[#2A231C] overflow-hidden transition-all duration-300 hover:shadow-2xl hover:border-[#C5A059] flex flex-col justify-between">
                    <div class="relative w-full aspect-[4/3] bg-[#0D0B09] border-b border-[#221C16] overflow-hidden flex items-center justify-center">
                        <span class="absolute top-3 left-3 z-10 inline-flex items-center px-2.5 py-1 rounded-full text-[11px] font-medium bg-[#2D1B0E] text-[#F39C38] border border-[#543018]">
                            Low Stock
                        </span>
                        <a href="product_detail.php?id=3" class="w-full h-full block">
                            <img src="images/sofa-1.jpg" alt="Bouclé Modular Sofa" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" loading="lazy">
                        </a>
                        <div class="absolute inset-0 bg-stone-950/40 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center gap-2">
                            <a href="product_detail.php?id=3" class="w-10 h-10 rounded-full bg-[#C5A059] text-[#0D0B09] hover:bg-[#FAF6EE] flex items-center justify-center shadow-md transition-colors" title="View Details">
                                <i class="ri-eye-line text-lg"></i>
                            </a>
                        </div>
                    </div>
                    <div class="p-5 flex flex-col flex-1 justify-between">
                        <div>
                            <span class="text-[11px] uppercase tracking-wider text-[#C5A059] font-medium">Sofas &amp; Sectionals</span>
                            <h3 class="font-serif text-base font-normal text-[#FAF6EE] group-hover:text-[#C5A059] transition-colors mt-0.5">
                                <a href="product_detail.php?id=3">Bouclé Modular Sofa</a>
                            </h3>
                        </div>
                        <div class="pt-4 flex items-center justify-between border-t border-[#221C16] mt-4">
                            <span class="text-sm font-semibold text-[#FAF6EE]">1,250,000 MMK</span>
                            <span class="text-xs text-[#8C7D6B]">8 available</span>
                        </div>
                    </div>
                </div>

                <!-- Product 4: Solid Oak Dining Table -->
                <div class="group bg-[#161310] rounded-3xl border border-[#2A231C] overflow-hidden transition-all duration-300 hover:shadow-2xl hover:border-[#C5A059] flex flex-col justify-between">
                    <div class="relative w-full aspect-[4/3] bg-[#0D0B09] border-b border-[#221C16] overflow-hidden flex items-center justify-center">
                        <span class="absolute top-3 left-3 z-10 inline-flex items-center px-2.5 py-1 rounded-full text-[11px] font-medium bg-[#132A1C] text-[#52D288] border border-[#1E4D32]">
                            In Stock
                        </span>
                        <a href="product_detail.php?id=4" class="w-full h-full block">
                            <img src="images/table-1.jpg" alt="Solid Oak Dining Table" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" loading="lazy">
                        </a>
                        <div class="absolute inset-0 bg-stone-950/40 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center gap-2">
                            <a href="product_detail.php?id=4" class="w-10 h-10 rounded-full bg-[#C5A059] text-[#0D0B09] hover:bg-[#FAF6EE] flex items-center justify-center shadow-md transition-colors" title="View Details">
                                <i class="ri-eye-line text-lg"></i>
                            </a>
                        </div>
                    </div>
                    <div class="p-5 flex flex-col flex-1 justify-between">
                        <div>
                            <span class="text-[11px] uppercase tracking-wider text-[#C5A059] font-medium">Dining Tables</span>
                            <h3 class="font-serif text-base font-normal text-[#FAF6EE] group-hover:text-[#C5A059] transition-colors mt-0.5">
                                <a href="product_detail.php?id=4">Solid Natural Oak Table</a>
                            </h3>
                        </div>
                        <div class="pt-4 flex items-center justify-between border-t border-[#221C16] mt-4">
                            <span class="text-sm font-semibold text-[#FAF6EE]">890,000 MMK</span>
                            <span class="text-xs text-[#8C7D6B]">14 available</span>
                        </div>
                    </div>
                </div>

                <!-- Product 5: Upholstered Platform Bed -->
                <div class="group bg-[#161310] rounded-3xl border border-[#2A231C] overflow-hidden transition-all duration-300 hover:shadow-2xl hover:border-[#C5A059] flex flex-col justify-between">
                    <div class="relative w-full aspect-[4/3] bg-[#0D0B09] border-b border-[#221C16] overflow-hidden flex items-center justify-center">
                        <span class="absolute top-3 left-3 z-10 inline-flex items-center px-2.5 py-1 rounded-full text-[11px] font-medium bg-[#132A1C] text-[#52D288] border border-[#1E4D32]">
                            In Stock
                        </span>
                        <a href="product_detail.php?id=5" class="w-full h-full block">
                            <img src="images/bed-1.jpg" alt="Upholstered Platform Bed" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" loading="lazy">
                        </a>
                        <div class="absolute inset-0 bg-stone-950/40 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center gap-2">
                            <a href="product_detail.php?id=5" class="w-10 h-10 rounded-full bg-[#C5A059] text-[#0D0B09] hover:bg-[#FAF6EE] flex items-center justify-center shadow-md transition-colors" title="View Details">
                                <i class="ri-eye-line text-lg"></i>
                            </a>
                        </div>
                    </div>
                    <div class="p-5 flex flex-col flex-1 justify-between">
                        <div>
                            <span class="text-[11px] uppercase tracking-wider text-[#C5A059] font-medium">Beds &amp; Bedroom</span>
                            <h3 class="font-serif text-base font-normal text-[#FAF6EE] group-hover:text-[#C5A059] transition-colors mt-0.5">
                                <a href="product_detail.php?id=5">Upholstered Platform Bed</a>
                            </h3>
                        </div>
                        <div class="pt-4 flex items-center justify-between border-t border-[#221C16] mt-4">
                            <span class="text-sm font-semibold text-[#FAF6EE]">1,480,000 MMK</span>
                            <span class="text-xs text-[#8C7D6B]">10 available</span>
                        </div>
                    </div>
                </div>

                <!-- Product 6: Japandi Low Tatami Bed -->
                <div class="group bg-[#161310] rounded-3xl border border-[#2A231C] overflow-hidden transition-all duration-300 hover:shadow-2xl hover:border-[#C5A059] flex flex-col justify-between">
                    <div class="relative w-full aspect-[4/3] bg-[#0D0B09] border-b border-[#221C16] overflow-hidden flex items-center justify-center">
                        <span class="absolute top-3 left-3 z-10 inline-flex items-center px-2.5 py-1 rounded-full text-[11px] font-medium bg-[#2D1B0E] text-[#F39C38] border border-[#543018]">
                            Low Stock
                        </span>
                        <a href="product_detail.php?id=6" class="w-full h-full block">
                            <img src="images/bed-2.jpg" alt="Japandi Low Tatami Bed" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" loading="lazy">
                        </a>
                        <div class="absolute inset-0 bg-stone-950/40 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center gap-2">
                            <a href="product_detail.php?id=6" class="w-10 h-10 rounded-full bg-[#C5A059] text-[#0D0B09] hover:bg-[#FAF6EE] flex items-center justify-center shadow-md transition-colors" title="View Details">
                                <i class="ri-eye-line text-lg"></i>
                            </a>
                        </div>
                    </div>
                    <div class="p-5 flex flex-col flex-1 justify-between">
                        <div>
                            <span class="text-[11px] uppercase tracking-wider text-[#C5A059] font-medium">Beds &amp; Bedroom</span>
                            <h3 class="font-serif text-base font-normal text-[#FAF6EE] group-hover:text-[#C5A059] transition-colors mt-0.5">
                                <a href="product_detail.php?id=6">Japandi Low Tatami Bed</a>
                            </h3>
                        </div>
                        <div class="pt-4 flex items-center justify-between border-t border-[#221C16] mt-4">
                            <span class="text-sm font-semibold text-[#FAF6EE]">1,850,000 MMK</span>
                            <span class="text-xs text-[#8C7D6B]">5 available</span>
                        </div>
                    </div>
                </div>

                <!-- Product 7: Marble Low Coffee Table -->
                <div class="group bg-[#161310] rounded-3xl border border-[#2A231C] overflow-hidden transition-all duration-300 hover:shadow-2xl hover:border-[#C5A059] flex flex-col justify-between">
                    <div class="relative w-full aspect-[4/3] bg-[#0D0B09] border-b border-[#221C16] overflow-hidden flex items-center justify-center">
                        <span class="absolute top-3 left-3 z-10 inline-flex items-center px-2.5 py-1 rounded-full text-[11px] font-medium bg-[#132A1C] text-[#52D288] border border-[#1E4D32]">
                            In Stock
                        </span>
                        <a href="product_detail.php?id=7" class="w-full h-full block">
                            <img src="images/table-3.jpg" alt="Marble Low Coffee Table" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" loading="lazy">
                        </a>
                        <div class="absolute inset-0 bg-stone-950/40 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center gap-2">
                            <a href="product_detail.php?id=7" class="w-10 h-10 rounded-full bg-[#C5A059] text-[#0D0B09] hover:bg-[#FAF6EE] flex items-center justify-center shadow-md transition-colors" title="View Details">
                                <i class="ri-eye-line text-lg"></i>
                            </a>
                        </div>
                    </div>
                    <div class="p-5 flex flex-col flex-1 justify-between">
                        <div>
                            <span class="text-[11px] uppercase tracking-wider text-[#C5A059] font-medium">Tables &amp; Living</span>
                            <h3 class="font-serif text-base font-normal text-[#FAF6EE] group-hover:text-[#C5A059] transition-colors mt-0.5">
                                <a href="product_detail.php?id=7">Marble Low Coffee Table</a>
                            </h3>
                        </div>
                        <div class="pt-4 flex items-center justify-between border-t border-[#221C16] mt-4">
                            <span class="text-sm font-semibold text-[#FAF6EE]">520,000 MMK</span>
                            <span class="text-xs text-[#8C7D6B]">18 available</span>
                        </div>
                    </div>
                </div>

                <!-- Product 8: Sculptural Ceramic Table Lamp -->
                <div class="group bg-[#161310] rounded-3xl border border-[#2A231C] overflow-hidden transition-all duration-300 hover:shadow-2xl hover:border-[#C5A059] flex flex-col justify-between">
                    <div class="relative w-full aspect-[4/3] bg-[#0D0B09] border-b border-[#221C16] overflow-hidden flex items-center justify-center">
                        <span class="absolute top-3 left-3 z-10 inline-flex items-center px-2.5 py-1 rounded-full text-[11px] font-medium bg-[#132A1C] text-[#52D288] border border-[#1E4D32]">
                            In Stock
                        </span>
                        <a href="product_detail.php?id=8" class="w-full h-full block">
                            <img src="images/lamp-1.jpg" alt="Sculptural Ceramic Table Lamp" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" loading="lazy">
                        </a>
                        <div class="absolute inset-0 bg-stone-950/40 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center gap-2">
                            <a href="product_detail.php?id=8" class="w-10 h-10 rounded-full bg-[#C5A059] text-[#0D0B09] hover:bg-[#FAF6EE] flex items-center justify-center shadow-md transition-colors" title="View Details">
                                <i class="ri-eye-line text-lg"></i>
                            </a>
                        </div>
                    </div>
                    <div class="p-5 flex flex-col flex-1 justify-between">
                        <div>
                            <span class="text-[11px] uppercase tracking-wider text-[#C5A059] font-medium">Lighting &amp; Objects</span>
                            <h3 class="font-serif text-base font-normal text-[#FAF6EE] group-hover:text-[#C5A059] transition-colors mt-0.5">
                                <a href="product_detail.php?id=8">Sculptural Ceramic Table Lamp</a>
                            </h3>
                        </div>
                        <div class="pt-4 flex items-center justify-between border-t border-[#221C16] mt-4">
                            <span class="text-sm font-semibold text-[#FAF6EE]">195,000 MMK</span>
                            <span class="text-xs text-[#8C7D6B]">32 available</span>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- BRAND PILLARS / PHILOSOPHY -->
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
        <div class="bg-[#161310] text-[#EDE4D7] rounded-3xl p-8 sm:p-12 lg:p-16 border border-[#2A231C] shadow-2xl">
            <div class="max-w-3xl mb-12">
                <span class="text-xs uppercase tracking-[0.25em] text-[#C5A059] font-semibold block mb-2">Our Craft Manifesto</span>
                <h2 class="font-serif text-3xl sm:text-4xl text-[#FAF6EE] font-normal tracking-tight leading-tight">
                    Rooted in Scandinavian proportion, elevated by the reverence of Japanese joinery.
                </h2>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 pt-4 border-t border-[#2A231C]">
                <div class="space-y-3">
                    <div class="w-11 h-11 rounded-2xl bg-[#221C16] border border-[#3E3224] flex items-center justify-center text-[#C5A059] text-lg shadow-inner">
                        <i class="ri-seedling-line"></i>
                    </div>
                    <h3 class="font-serif text-lg font-semibold text-[#FAF6EE]">Sustainable Sourcing</h3>
                    <p class="text-sm text-[#8C7D6B] leading-relaxed">
                        Every timber beam is responsibly extracted from PEFC and FSC-certified regional forestry concessions.
                    </p>
                </div>
                <div class="space-y-3">
                    <div class="w-11 h-11 rounded-2xl bg-[#221C16] border border-[#3E3224] flex items-center justify-center text-[#C5A059] text-lg shadow-inner">
                        <i class="ri-hammer-line"></i>
                    </div>
                    <h3 class="font-serif text-lg font-semibold text-[#FAF6EE]">Tactile Craft</h3>
                    <p class="text-sm text-[#8C7D6B] leading-relaxed">
                        Hand-planed surfaces, natural plant oil finishes, and mortise-and-tenon joints celebrate real touch.
                    </p>
                </div>
                <div class="space-y-3">
                    <div class="w-11 h-11 rounded-2xl bg-[#221C16] border border-[#3E3224] flex items-center justify-center text-[#C5A059] text-lg shadow-inner">
                        <i class="ri-infinity-line"></i>
                    </div>
                    <h3 class="font-serif text-lg font-semibold text-[#FAF6EE]">Timeless Longevity</h3>
                    <p class="text-sm text-[#8C7D6B] leading-relaxed">
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
                <span class="text-xs uppercase tracking-[0.25em] text-[#C5A059] font-semibold block mb-2">The Journal</span>
                <h2 class="font-serif text-3xl sm:text-4xl font-normal text-[#FAF6EE] tracking-tight">Chronicles of Material &amp; Space</h2>
            </div>
            <a href="blog.php" class="inline-flex items-center gap-2 text-sm font-medium text-[#FAF6EE] hover:text-[#C5A059] transition-colors">
                <span>Read All Journal Entries</span>
                <i class="ri-arrow-right-line"></i>
            </a>
        </div>

        <!-- [PHP_BACKEND_HOOK: Dynamic blog posts query (SELECT * FROM blogs ORDER BY created_at DESC LIMIT 6)] -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Article 1 -->
            <article class="group bg-[#161310] rounded-3xl border border-[#2A231C] overflow-hidden shadow-xl hover:shadow-2xl hover:border-[#C5A059] transition-all duration-500 flex flex-col">
                <a href="blog_detail.php?id=1" class="relative aspect-[16/10] overflow-hidden bg-[#0D0B09] block border-b border-[#221C16]">
                    <img src="images/blog-minimalist-spaces.jpg" alt="The Philosophy of Wabi-Sabi in Modern Interiors" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" loading="lazy">
                </a>
                <div class="p-6 flex flex-col flex-1 justify-between">
                    <div class="space-y-3">
                        <div class="flex items-center gap-3 text-xs text-[#8C7D6B]">
                            <span>May 21, 2026</span>
                            <span class="w-1 h-1 rounded-full bg-[#453A30]"></span>
                            <span>4 min read</span>
                        </div>
                        <h3 class="font-serif text-xl font-normal text-[#FAF6EE] group-hover:text-[#C5A059] transition-colors">
                            <a href="blog_detail.php?id=1">The Philosophy of Wabi-Sabi in Modern Interiors</a>
                        </h3>
                        <p class="text-sm text-[#8C7D6B] line-clamp-2 leading-relaxed">
                            How embracing natural grain knots, textured linens, and imperfect clay forms fosters sanctuary within contemporary urban homes.
                        </p>
                    </div>
                    <div class="pt-6 border-t border-[#221C16] mt-6 flex items-center justify-between">
                        <div class="flex items-center gap-2 text-xs font-medium text-[#D6C8B4]">
                            <i class="ri-user-line text-[#C5A059]"></i>
                            <span>Atelier Editorial</span>
                        </div>
                        <a href="blog_detail.php?id=1" class="text-xs font-semibold text-[#FAF6EE] hover:text-[#C5A059] inline-flex items-center gap-1">
                            <span>Read</span>
                            <i class="ri-arrow-right-line"></i>
                        </a>
                    </div>
                </div>
            </article>

            <!-- Article 2 -->
            <article class="group bg-[#161310] rounded-3xl border border-[#2A231C] overflow-hidden shadow-xl hover:shadow-2xl hover:border-[#C5A059] transition-all duration-500 flex flex-col">
                <a href="blog_detail.php?id=2" class="relative aspect-[16/10] overflow-hidden bg-[#0D0B09] block border-b border-[#221C16]">
                    <img src="images/blog-sustainable-wood.jpg" alt="Joinery Without Nails: The Heritage of Wood Craft" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" loading="lazy">
                </a>
                <div class="p-6 flex flex-col flex-1 justify-between">
                    <div class="space-y-3">
                        <div class="flex items-center gap-3 text-xs text-[#8C7D6B]">
                            <span>Apr 28, 2026</span>
                            <span class="w-1 h-1 rounded-full bg-[#453A30]"></span>
                            <span>6 min read</span>
                        </div>
                        <h3 class="font-serif text-xl font-normal text-[#FAF6EE] group-hover:text-[#C5A059] transition-colors">
                            <a href="blog_detail.php?id=2">Joinery Without Nails: The Heritage of Wood Craft</a>
                        </h3>
                        <p class="text-sm text-[#8C7D6B] line-clamp-2 leading-relaxed">
                            A deep look inside our workshop where master carpenters shape interlocking joints that withstand temperature shifts for generations.
                        </p>
                    </div>
                    <div class="pt-6 border-t border-[#221C16] mt-6 flex items-center justify-between">
                        <div class="flex items-center gap-2 text-xs font-medium text-[#D6C8B4]">
                            <i class="ri-user-line text-[#C5A059]"></i>
                            <span>Su Thinzar Htet</span>
                        </div>
                        <a href="blog_detail.php?id=2" class="text-xs font-semibold text-[#FAF6EE] hover:text-[#C5A059] inline-flex items-center gap-1">
                            <span>Read</span>
                            <i class="ri-arrow-right-line"></i>
                        </a>
                    </div>
                </div>
            </article>

            <!-- Article 3 -->
            <article class="group bg-[#161310] rounded-3xl border border-[#2A231C] overflow-hidden shadow-xl hover:shadow-2xl hover:border-[#C5A059] transition-all duration-500 flex flex-col">
                <a href="blog_detail.php?id=3" class="relative aspect-[16/10] overflow-hidden bg-[#0D0B09] block border-b border-[#221C16]">
                    <img src="images/blog-lighting-guide.jpg" alt="Sculpting Ambient Light in Living Rooms" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" loading="lazy">
                </a>
                <div class="p-6 flex flex-col flex-1 justify-between">
                    <div class="space-y-3">
                        <div class="flex items-center gap-3 text-xs text-[#8C7D6B]">
                            <span>Apr 14, 2026</span>
                            <span class="w-1 h-1 rounded-full bg-[#453A30]"></span>
                            <span>5 min read</span>
                        </div>
                        <h3 class="font-serif text-xl font-normal text-[#FAF6EE] group-hover:text-[#C5A059] transition-colors">
                            <a href="blog_detail.php?id=3">Sculpting Ambient Light in Living Rooms</a>
                        </h3>
                        <p class="text-sm text-[#8C7D6B] line-clamp-2 leading-relaxed">
                            How soft indirect fixtures and natural parchment shades change the emotional cadence of our domestic evenings.
                        </p>
                    </div>
                    <div class="pt-6 border-t border-[#221C16] mt-6 flex items-center justify-between">
                        <div class="flex items-center gap-2 text-xs font-medium text-[#D6C8B4]">
                            <i class="ri-user-line text-[#C5A059]"></i>
                            <span>Thae Nay Nwe Soe</span>
                        </div>
                        <a href="blog_detail.php?id=3" class="text-xs font-semibold text-[#FAF6EE] hover:text-[#C5A059] inline-flex items-center gap-1">
                            <span>Read</span>
                            <i class="ri-arrow-right-line"></i>
                        </a>
                    </div>
                </div>
            </article>

            <!-- Article 4 -->
            <article class="group bg-[#161310] rounded-3xl border border-[#2A231C] overflow-hidden shadow-xl hover:shadow-2xl hover:border-[#C5A059] transition-all duration-500 flex flex-col">
                <a href="blog_detail.php?id=4" class="relative aspect-[16/10] overflow-hidden bg-[#0D0B09] block border-b border-[#221C16]">
                    <img src="images/blog-interior-tips.jpg" alt="The Ritual of Morning Tea & Minimalist Dining" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" loading="lazy">
                </a>
                <div class="p-6 flex flex-col flex-1 justify-between">
                    <div class="space-y-3">
                        <div class="flex items-center gap-3 text-xs text-[#8C7D6B]">
                            <span>Mar 30, 2026</span>
                            <span class="w-1 h-1 rounded-full bg-[#453A30]"></span>
                            <span>4 min read</span>
                        </div>
                        <h3 class="font-serif text-xl font-normal text-[#FAF6EE] group-hover:text-[#C5A059] transition-colors">
                            <a href="blog_detail.php?id=4">The Ritual of Morning Tea &amp; Minimalist Dining</a>
                        </h3>
                        <p class="text-sm text-[#8C7D6B] line-clamp-2 leading-relaxed">
                            Arranging dining corners with natural oak benches, low stoneware vessels, and unfiltered morning sun.
                        </p>
                    </div>
                    <div class="pt-6 border-t border-[#221C16] mt-6 flex items-center justify-between">
                        <div class="flex items-center gap-2 text-xs font-medium text-[#D6C8B4]">
                            <i class="ri-user-line text-[#C5A059]"></i>
                            <span>Myat Chal Oo</span>
                        </div>
                        <a href="blog_detail.php?id=4" class="text-xs font-semibold text-[#FAF6EE] hover:text-[#C5A059] inline-flex items-center gap-1">
                            <span>Read</span>
                            <i class="ri-arrow-right-line"></i>
                        </a>
                    </div>
                </div>
            </article>

            <!-- Article 5 -->
            <article class="group bg-[#161310] rounded-3xl border border-[#2A231C] overflow-hidden shadow-xl hover:shadow-2xl hover:border-[#C5A059] transition-all duration-500 flex flex-col">
                <a href="blog_detail.php?id=5" class="relative aspect-[16/10] overflow-hidden bg-[#0D0B09] block border-b border-[#221C16]">
                    <img src="images/blog-modern-styling.jpg" alt="Botanical Plant Waxes: Caring for Solid Wood" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" loading="lazy">
                </a>
                <div class="p-6 flex flex-col flex-1 justify-between">
                    <div class="space-y-3">
                        <div class="flex items-center gap-3 text-xs text-[#8C7D6B]">
                            <span>Mar 18, 2026</span>
                            <span class="w-1 h-1 rounded-full bg-[#453A30]"></span>
                            <span>7 min read</span>
                        </div>
                        <h3 class="font-serif text-xl font-normal text-[#FAF6EE] group-hover:text-[#C5A059] transition-colors">
                            <a href="blog_detail.php?id=5">Botanical Plant Waxes: Caring for Solid Wood</a>
                        </h3>
                        <p class="text-sm text-[#8C7D6B] line-clamp-2 leading-relaxed">
                            A tactile handbook on nourishing walnut and white oak tables using cold-pressed linseed oils and organic beeswax.
                        </p>
                    </div>
                    <div class="pt-6 border-t border-[#221C16] mt-6 flex items-center justify-between">
                        <div class="flex items-center gap-2 text-xs font-medium text-[#D6C8B4]">
                            <i class="ri-user-line text-[#C5A059]"></i>
                            <span>Nyi Nyi Aung</span>
                        </div>
                        <a href="blog_detail.php?id=5" class="text-xs font-semibold text-[#FAF6EE] hover:text-[#C5A059] inline-flex items-center gap-1">
                            <span>Read</span>
                            <i class="ri-arrow-right-line"></i>
                        </a>
                    </div>
                </div>
            </article>

            <!-- Article 6 -->
            <article class="group bg-[#161310] rounded-3xl border border-[#2A231C] overflow-hidden shadow-xl hover:shadow-2xl hover:border-[#C5A059] transition-all duration-500 flex flex-col">
                <a href="blog_detail.php?id=6" class="relative aspect-[16/10] overflow-hidden bg-[#0D0B09] block border-b border-[#221C16]">
                    <img src="images/blog-color-palettes.jpg" alt="Designing Quiet Havens in High-Density Cities" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" loading="lazy">
                </a>
                <div class="p-6 flex flex-col flex-1 justify-between">
                    <div class="space-y-3">
                        <div class="flex items-center gap-3 text-xs text-[#8C7D6B]">
                            <span>Feb 25, 2026</span>
                            <span class="w-1 h-1 rounded-full bg-[#453A30]"></span>
                            <span>5 min read</span>
                        </div>
                        <h3 class="font-serif text-xl font-normal text-[#FAF6EE] group-hover:text-[#C5A059] transition-colors">
                            <a href="blog_detail.php?id=6">Designing Quiet Havens in High-Density Cities</a>
                        </h3>
                        <p class="text-sm text-[#8C7D6B] line-clamp-2 leading-relaxed">
                            Selecting acoustic textiles, muted travertine hues, and low silhouettes that mute metropolitan turbulence.
                        </p>
                    </div>
                    <div class="pt-6 border-t border-[#221C16] mt-6 flex items-center justify-between">
                        <div class="flex items-center gap-2 text-xs font-medium text-[#D6C8B4]">
                            <i class="ri-user-line text-[#C5A059]"></i>
                            <span>Phone Myat Win</span>
                        </div>
                        <a href="blog_detail.php?id=6" class="text-xs font-semibold text-[#FAF6EE] hover:text-[#C5A059] inline-flex items-center gap-1">
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
