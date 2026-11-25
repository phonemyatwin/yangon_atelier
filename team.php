<?php
// Initialize session
require_once __DIR__ . '/components/session_start.php';

// Check session
require_once __DIR__ . '/components/session_check.php';

// Connect database
require_once __DIR__ . '/components/connection.php';

?>
<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Design Collective &amp; Master Artisans | Yangon Atelier</title>
    <link rel="icon" type="image/x-icon" href="images/favicon/favicon.ico">
    <?php include "components/css.php"; ?>
</head>

<body class="bg-[#EDE8E0] text-[#362F2A] font-sans selection:bg-[#8A5A44] selection:text-[#F6F3EE] antialiased">
    <?php include "components/header.php"; ?>
    <?php include "components/navbar.php"; ?>

    <!-- HERO / ATELIER LINEAGE BANNER -->
    <header class="relative bg-[#DFD8CD] border-b border-[#C9C0B3] py-16 lg:py-24 overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <nav class="flex items-center gap-2 text-xs font-medium text-[#6E6359] mb-4" aria-label="Breadcrumb">
                <a href="index.php" class="hover:text-[#362F2A] transition-colors">Home</a>
                <span class="text-[#C9C0B3]">/</span>
                <span class="text-[#8A5A44] font-semibold">The Design Collective</span>
            </nav>

            <div class="max-w-3xl">
                <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-[#F6F3EE] border border-[#C9C0B3] text-[11px] font-semibold uppercase tracking-[0.25em] text-[#8A5A44] mb-4">
                    <span class="w-1.5 h-1.5 rounded-full bg-[#8A5A44]"></span>
                    <span>Guild of Master Artisans &amp; Spatial Curators</span>
                </div>
                <h1 class="font-serif text-4xl sm:text-5xl lg:text-6xl font-normal tracking-tight text-[#362F2A] leading-[1.15]">
                    The Hands, Lineage &amp; Minds Behind the Craft.
                </h1>
                <p class="text-base sm:text-lg text-[#6E6359] mt-4 leading-relaxed font-normal">
                    In an era of disposable speed and robotic uniformity, we choose the deliberate slowness of human touch. Meet the architects, third-generation joiners, and textile curators who shape each piece in our Yangon workshop.
                </p>
            </div>
        </div>
    </header>

    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 lg:py-24 space-y-24">

        <!-- 1. FEATURED MASTER ARTISAN SPOTLIGHT: FOUNDER & PRINCIPAL ARCHITECT -->
        <section class="relative rounded-3xl bg-[#F6F3EE] border border-[#C9C0B3] overflow-hidden shadow-lg p-8 sm:p-12 lg:p-16">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16 items-center">
                <!-- Large Archival Portrait Bay -->
                <div class="lg:col-span-5 relative">
                    <div class="relative aspect-[3/4] rounded-2xl overflow-hidden border border-[#C9C0B3] shadow-md bg-[#EDE8E0]">
                        <img src="images/team/phonemyatwin.jpg" alt="Phone Myat Win, Founder & Principal Architect" class="w-full h-full object-cover" loading="eager">
                        <div class="absolute inset-0 bg-gradient-to-t from-[#362F2A]/80 via-transparent to-transparent"></div>
                        <div class="absolute bottom-6 left-6 right-6 flex items-center justify-between text-white">
                            <span class="text-xs uppercase tracking-widest text-[#F6F3EE] font-medium">Archival Portrait № 01</span>
                            <span class="text-xs text-[#DFD8CD]">Est. 2026</span>
                        </div>
                    </div>
                    <div class="absolute -bottom-3 -right-3 w-full h-full border border-[#8A5A44]/30 rounded-2xl -z-10 pointer-events-none hidden sm:block"></div>
                </div>

                <!-- Narrative & Architectural Philosophy -->
                <div class="lg:col-span-7 space-y-6">
                    <div class="flex items-center gap-3">
                        <span class="font-serif text-sm tracking-widest text-[#8A5A44] uppercase font-semibold">I. The Master Architect</span>
                        <span class="h-px flex-1 bg-[#C9C0B3]"></span>
                    </div>

                    <h2 class="font-serif text-3xl sm:text-4xl lg:text-5xl font-normal text-[#362F2A] tracking-tight">
                        Phone Myat Win
                    </h2>
                    <p class="text-xs sm:text-sm uppercase tracking-[0.2em] text-[#8A5A44] font-semibold">
                        Founder &amp; Principal Spatial Director
                    </p>

                    <!-- Artisan Credo Quote -->
                    <blockquote class="my-6 border-l-2 border-[#8A5A44] pl-6 py-2 italic font-serif text-lg sm:text-xl text-[#362F2A] leading-snug bg-[#DFD8CD]/50 rounded-r-xl">
                        &ldquo;A piece of furniture should never demand attention with noise; it must command quiet reverence through proportion, silence, and the irreplaceable truth of the wood grain.&rdquo;
                    </blockquote>

                    <p class="text-sm sm:text-base text-[#6E6359] leading-relaxed">
                        Formally trained across classical joinery studios in Kyoto and architectural institutions in Copenhagen, Phone Myat Win founded Yangon Atelier to resurrect the sacred harmony between human sanctuary and sustainably harvested timber. He personally inspects every timber batch arriving from regional certified concessions.
                    </p>

                    <!-- Lineage & Credentials Matrix -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 pt-4 border-t border-[#C9C0B3] text-xs">
                        <div class="p-3.5 rounded-xl bg-[#EDE8E0] border border-[#C9C0B3]">
                            <span class="text-[#6E6359] block uppercase tracking-wider text-[10px]">Guild Lineage</span>
                            <strong class="text-[#362F2A] font-medium mt-0.5 block">Kyoto Joinery Guild &amp; Royal Danish Academy</strong>
                        </div>
                        <div class="p-3.5 rounded-xl bg-[#EDE8E0] border border-[#C9C0B3]">
                            <span class="text-[#6E6359] block uppercase tracking-wider text-[10px]">Mastery Focus</span>
                            <strong class="text-[#362F2A] font-medium mt-0.5 block">Nail-less Interlocking Joints &amp; Spatial Proportions</strong>
                        </div>
                    </div>

                    <!-- Direct Connect Links -->
                    <div class="flex items-center gap-4 pt-2">
                        <a href="contact.php?inquiry=phone-myat-win" class="inline-flex items-center gap-2 px-6 py-3 rounded-xl bg-[#8A5A44] hover:bg-[#704735] text-[#F6F3EE] text-xs font-semibold transition-all shadow-sm hover:shadow-md">
                            <span>Request Architectural Consultation</span>
                            <i class="ri-arrow-right-line"></i>
                        </a>
                        <a href="#" aria-label="LinkedIn Profile" class="w-10 h-10 rounded-xl bg-[#DFD8CD] hover:bg-[#8A5A44] text-[#362F2A] hover:text-[#F6F3EE] border border-[#C9C0B3] flex items-center justify-center transition-colors">
                            <i class="ri-linkedin-box-line text-lg"></i>
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <!-- 2. THE GUILD REGISTRY: ARTISAN ROSTER & WORKSHOP MASTERS -->
        <section class="space-y-12">
            <div class="text-center max-w-2xl mx-auto">
                <span class="text-xs uppercase tracking-[0.25em] text-[#8A5A44] font-semibold block mb-2">Guild Registry</span>
                <h2 class="font-serif text-3xl sm:text-4xl font-normal text-[#362F2A] tracking-tight">Master Craftsmen &amp; Material Curators</h2>
                <p class="text-xs sm:text-sm text-[#6E6359] mt-2 leading-relaxed">
                    Every discipline within our atelier is led by a dedicated specialist committed to preservation, material integrity, and lifelong craftsmanship.
                </p>
            </div>

            <div class="space-y-8">

                <!-- Artisan 2: Thae Nay Nwe Soe (Ergonomics) -->
                <div class="group rounded-3xl bg-[#F6F3EE] border border-[#C9C0B3] p-6 sm:p-8 lg:p-10 hover:border-[#8A5A44] transition-all duration-300 shadow-sm hover:shadow-xl">
                    <div class="grid grid-cols-1 md:grid-cols-12 gap-8 items-center">
                        <div class="md:col-span-4 relative aspect-[4/5] rounded-2xl overflow-hidden bg-[#EDE8E0] border border-[#C9C0B3]">
                            <img src="images/team/thaenaynwesoe.jpg" alt="Thae Nay Nwe Soe" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" loading="lazy">
                            <span class="absolute top-4 left-4 px-2.5 py-1 rounded-full text-[10px] font-semibold bg-[#DFD8CD] text-[#362F2A] border border-[#C9C0B3]">
                                II. Ergonomics
                            </span>
                        </div>
                        <div class="md:col-span-8 space-y-4">
                            <div class="flex flex-col sm:flex-row sm:items-baseline justify-between gap-2 border-b border-[#C9C0B3] pb-4">
                                <div>
                                    <h3 class="font-serif text-2xl sm:text-3xl font-normal text-[#362F2A]">Thae Nay Nwe Soe</h3>
                                    <span class="text-xs uppercase tracking-wider text-[#8A5A44] font-semibold mt-0.5 block">Head of Interior Ergonomics &amp; Living Cadence</span>
                                </div>
                                <div class="flex items-center gap-2">
                                    <span class="px-3 py-1 rounded-full bg-[#DFD8CD] border border-[#C9C0B3] text-[11px] text-[#362F2A]">14 Years Mastery</span>
                                </div>
                            </div>
                            <p class="text-sm text-[#6E6359] leading-relaxed">
                                Directs user posture analysis and dimensional cadence. She calculates the subtle seat rake angle, backrest curvature, and foam density transitions that transform an ordinary chair into a sanctuary of deep restorative comfort.
                            </p>
                            <div class="flex flex-wrap items-center gap-2 pt-2">
                                <span class="text-xs text-[#6E6359] mr-2">Core Materials:</span>
                                <span class="px-3 py-1 rounded-lg bg-[#EDE8E0] border border-[#C9C0B3] text-xs text-[#362F2A]">High-Resilience Latex</span>
                                <span class="px-3 py-1 rounded-lg bg-[#EDE8E0] border border-[#C9C0B3] text-xs text-[#362F2A]">Natural Coconut Coir</span>
                                <span class="px-3 py-1 rounded-lg bg-[#EDE8E0] border border-[#C9C0B3] text-xs text-[#362F2A]">Feather Blend Layers</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Artisan 3: Su Thinzar Htet (Joinery) -->
                <div class="group rounded-3xl bg-[#F6F3EE] border border-[#C9C0B3] p-6 sm:p-8 lg:p-10 hover:border-[#8A5A44] transition-all duration-300 shadow-sm hover:shadow-xl">
                    <div class="grid grid-cols-1 md:grid-cols-12 gap-8 items-center">
                        <div class="md:col-span-4 relative aspect-[4/5] rounded-2xl overflow-hidden bg-[#EDE8E0] border border-[#C9C0B3]">
                            <img src="images/team/suthinzarhtet.jpg" alt="Su Thinzar Htet" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" loading="lazy">
                            <span class="absolute top-4 left-4 px-2.5 py-1 rounded-full text-[10px] font-semibold bg-[#DFD8CD] text-[#362F2A] border border-[#C9C0B3]">
                                III. Joinery
                            </span>
                        </div>
                        <div class="md:col-span-8 space-y-4">
                            <div class="flex flex-col sm:flex-row sm:items-baseline justify-between gap-2 border-b border-[#C9C0B3] pb-4">
                                <div>
                                    <h3 class="font-serif text-2xl sm:text-3xl font-normal text-[#362F2A]">Su Thinzar Htet</h3>
                                    <span class="text-xs uppercase tracking-wider text-[#8A5A44] font-semibold mt-0.5 block">Master Wood Craftsman &amp; Joinery Conservator</span>
                                </div>
                                <div class="flex items-center gap-2">
                                    <span class="px-3 py-1 rounded-full bg-[#DFD8CD] border border-[#C9C0B3] text-[11px] text-[#362F2A]">3rd Generation Woodworker</span>
                                </div>
                            </div>
                            <p class="text-sm text-[#6E6359] leading-relaxed">
                                Oversees our timber seasoning cycles, continuous grain selection, and hand-cut dovetail joints. Under her stewardship, timber fibers are carved with micro-millimeter tolerance so humidity shifts never compromise structural integrity.
                            </p>
                            <div class="flex flex-wrap items-center gap-2 pt-2">
                                <span class="text-xs text-[#6E6359] mr-2">Core Materials:</span>
                                <span class="px-3 py-1 rounded-lg bg-[#EDE8E0] border border-[#C9C0B3] text-xs text-[#362F2A]">Quarter-Sawn White Oak</span>
                                <span class="px-3 py-1 rounded-lg bg-[#EDE8E0] border border-[#C9C0B3] text-xs text-[#362F2A]">Smoked Black Walnut</span>
                                <span class="px-3 py-1 rounded-lg bg-[#EDE8E0] border border-[#C9C0B3] text-xs text-[#362F2A]">Aged Golden Teak</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Artisan 4: Myat Chal Oo (Textiles) -->
                <div class="group rounded-3xl bg-[#F6F3EE] border border-[#C9C0B3] p-6 sm:p-8 lg:p-10 hover:border-[#8A5A44] transition-all duration-300 shadow-sm hover:shadow-xl">
                    <div class="grid grid-cols-1 md:grid-cols-12 gap-8 items-center">
                        <div class="md:col-span-4 relative aspect-[4/5] rounded-2xl overflow-hidden bg-[#EDE8E0] border border-[#C9C0B3]">
                            <img src="images/team/myatchaloo.jpg" alt="Myat Chal Oo" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" loading="lazy">
                            <span class="absolute top-4 left-4 px-2.5 py-1 rounded-full text-[10px] font-semibold bg-[#DFD8CD] text-[#362F2A] border border-[#C9C0B3]">
                                IV. Textiles
                            </span>
                        </div>
                        <div class="md:col-span-8 space-y-4">
                            <div class="flex flex-col sm:flex-row sm:items-baseline justify-between gap-2 border-b border-[#C9C0B3] pb-4">
                                <div>
                                    <h3 class="font-serif text-2xl sm:text-3xl font-normal text-[#362F2A]">Myat Chal Oo</h3>
                                    <span class="text-xs uppercase tracking-wider text-[#8A5A44] font-semibold mt-0.5 block">Material &amp; Fine Textile Curator</span>
                                </div>
                                <div class="flex items-center gap-2">
                                    <span class="px-3 py-1 rounded-full bg-[#DFD8CD] border border-[#C9C0B3] text-[11px] text-[#362F2A]">Textile Historian</span>
                                </div>
                            </div>
                            <p class="text-sm text-[#6E6359] leading-relaxed">
                                Selects coarse-weave unbleached linens, organic bouclés, and vegetable-tanned aniline leather hides from sustainable family-owned mills. She ensures that every textile possesses a tactile presence that deepens in warmth as it ages.
                            </p>
                            <div class="flex flex-wrap items-center gap-2 pt-2">
                                <span class="text-xs text-[#6E6359] mr-2">Core Materials:</span>
                                <span class="px-3 py-1 rounded-lg bg-[#EDE8E0] border border-[#C9C0B3] text-xs text-[#362F2A]">Belgian Linen Weaves</span>
                                <span class="px-3 py-1 rounded-lg bg-[#EDE8E0] border border-[#C9C0B3] text-xs text-[#362F2A]">Vegetable-Tanned Saddle Leather</span>
                                <span class="px-3 py-1 rounded-lg bg-[#EDE8E0] border border-[#C9C0B3] text-xs text-[#362F2A]">Virgin Wool Bouclé</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Artisan 5: Nyi Nyi Aung (Finishing) -->
                <div class="group rounded-3xl bg-[#F6F3EE] border border-[#C9C0B3] p-6 sm:p-8 lg:p-10 hover:border-[#8A5A44] transition-all duration-300 shadow-sm hover:shadow-xl">
                    <div class="grid grid-cols-1 md:grid-cols-12 gap-8 items-center">
                        <div class="md:col-span-4 relative aspect-[4/5] rounded-2xl overflow-hidden bg-[#EDE8E0] border border-[#C9C0B3]">
                            <img src="images/team/nyinyiaung.jpg" alt="Nyi Nyi Aung" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" loading="lazy">
                            <span class="absolute top-4 left-4 px-2.5 py-1 rounded-full text-[10px] font-semibold bg-[#DFD8CD] text-[#362F2A] border border-[#C9C0B3]">
                                V. Finishing
                            </span>
                        </div>
                        <div class="md:col-span-8 space-y-4">
                            <div class="flex flex-col sm:flex-row sm:items-baseline justify-between gap-2 border-b border-[#C9C0B3] pb-4">
                                <div>
                                    <h3 class="font-serif text-2xl sm:text-3xl font-normal text-[#362F2A]">Nyi Nyi Aung</h3>
                                    <span class="text-xs uppercase tracking-wider text-[#8A5A44] font-semibold mt-0.5 block">Master Finishing Alchemist</span>
                                </div>
                                <div class="flex items-center gap-2">
                                    <span class="px-3 py-1 rounded-full bg-[#DFD8CD] border border-[#C9C0B3] text-[11px] text-[#362F2A]">Formulation Chemist</span>
                                </div>
                            </div>
                            <p class="text-sm text-[#6E6359] leading-relaxed">
                                Formulates our proprietary non-toxic botanical waxes, cold-pressed linseed blends, and carnauba sealants. His hand-rubbed oil technique protects against moisture while leaving the wood grain completely open to human touch.
                            </p>
                            <div class="flex flex-wrap items-center gap-2 pt-2">
                                <span class="text-xs text-[#6E6359] mr-2">Core Materials:</span>
                                <span class="px-3 py-1 rounded-lg bg-[#EDE8E0] border border-[#C9C0B3] text-xs text-[#362F2A]">Cold-Pressed Linseed Oil</span>
                                <span class="px-3 py-1 rounded-lg bg-[#EDE8E0] border border-[#C9C0B3] text-xs text-[#362F2A]">Organic Beeswax</span>
                                <span class="px-3 py-1 rounded-lg bg-[#EDE8E0] border border-[#C9C0B3] text-xs text-[#362F2A]">Zero-VOC Bio Hardwax</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Artisan 6: Min Khant Naung (Concierge) -->
                <div class="group rounded-3xl bg-[#F6F3EE] border border-[#C9C0B3] p-6 sm:p-8 lg:p-10 hover:border-[#8A5A44] transition-all duration-300 shadow-sm hover:shadow-xl">
                    <div class="grid grid-cols-1 md:grid-cols-12 gap-8 items-center">
                        <div class="md:col-span-4 relative aspect-[4/5] rounded-2xl overflow-hidden bg-[#EDE8E0] border border-[#C9C0B3]">
                            <img src="images/team/minkhantnaung.jpg" alt="Min Khant Naung" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" loading="lazy">
                            <span class="absolute top-4 left-4 px-2.5 py-1 rounded-full text-[10px] font-semibold bg-[#DFD8CD] text-[#362F2A] border border-[#C9C0B3]">
                                VI. Concierge
                            </span>
                        </div>
                        <div class="md:col-span-8 space-y-4">
                            <div class="flex flex-col sm:flex-row sm:items-baseline justify-between gap-2 border-b border-[#C9C0B3] pb-4">
                                <div>
                                    <h3 class="font-serif text-2xl sm:text-3xl font-normal text-[#362F2A]">Min Khant Naung</h3>
                                    <span class="text-xs uppercase tracking-wider text-[#8A5A44] font-semibold mt-0.5 block">Showroom Concierge &amp; Spatial Advisor</span>
                                </div>
                                <div class="flex items-center gap-2">
                                    <span class="px-3 py-1 rounded-full bg-[#DFD8CD] border border-[#C9C0B3] text-[11px] text-[#362F2A]">Client Steward</span>
                                </div>
                            </div>
                            <p class="text-sm text-[#6E6359] leading-relaxed">
                                Leads private domestic walkthroughs, bespoke commission specifications, and white-glove placement across Myanmar estates. He coordinates with homeowners and interior architects to ensure effortless spatial harmony.
                            </p>
                            <div class="flex flex-wrap items-center gap-2 pt-2">
                                <span class="text-xs text-[#6E6359] mr-2">Specializations:</span>
                                <span class="px-3 py-1 rounded-lg bg-[#EDE8E0] border border-[#C9C0B3] text-xs text-[#362F2A]">Private Salons</span>
                                <span class="px-3 py-1 rounded-lg bg-[#EDE8E0] border border-[#C9C0B3] text-xs text-[#362F2A]">White-Glove Placement</span>
                                <span class="px-3 py-1 rounded-lg bg-[#EDE8E0] border border-[#C9C0B3] text-xs text-[#362F2A]">Architectural Blueprints</span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>

        <!-- 3. THE ATELIER GUILD OATH / WORKSHOP MANIFESTO (Smoked Walnut) -->
        <section class="rounded-3xl bg-[#4A4038] text-[#F6F3EE] border border-[#3A322B] p-8 sm:p-12 lg:p-16 text-center space-y-8 shadow-xl relative overflow-hidden">
            <div class="max-w-2xl mx-auto space-y-3">
                <span class="text-xs uppercase tracking-[0.25em] text-[#E8DDD6] font-semibold">The Atelier Oath</span>
                <h3 class="font-serif text-2xl sm:text-3xl font-normal text-[#F6F3EE]">Three Inviolable Principles of the Guild</h3>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-left border-t border-[#3A322B] pt-8">
                <div class="space-y-2">
                    <span class="font-serif text-lg text-[#F6F3EE] font-semibold">I. The Living Wood</span>
                    <p class="text-xs text-[#DFD8CD] leading-relaxed">
                        We never disguise timber flaws with synthetic fillers. Every knot, grain swirl, and mineral streak is celebrated as the biography of the tree.
                    </p>
                </div>
                <div class="space-y-2">
                    <span class="font-serif text-lg text-[#F6F3EE] font-semibold">II. Joinery Over Fasteners</span>
                    <p class="text-xs text-[#DFD8CD] leading-relaxed">
                        Interlocking timber geometry must support the load before a single fastener is introduced. Mortise and tenon will always outlive cheap hardware.
                    </p>
                </div>
                <div class="space-y-2">
                    <span class="font-serif text-lg text-[#F6F3EE] font-semibold">III. Generational Patina</span>
                    <p class="text-xs text-[#DFD8CD] leading-relaxed">
                        A piece is only complete when it begins its life with its owner. Our finishes are formulated to mature into greater beauty over half a century.
                    </p>
                </div>
            </div>
        </section>

        <!-- 4. PRIVATE AUDIENCE & COMMISSION CONSULTATION -->
        <section class="rounded-3xl bg-[#F6F3EE] border border-[#C9C0B3] p-8 sm:p-12 lg:p-16 flex flex-col md:flex-row items-center justify-between gap-8 shadow-md">
            <div class="max-w-xl space-y-3 text-center md:text-left">
                <span class="text-xs uppercase tracking-widest text-[#8A5A44] font-semibold">Private Commission Audience</span>
                <h3 class="font-serif text-2xl sm:text-3xl font-normal text-[#362F2A]">Request a Consultation with Our Master Joiners</h3>
                <p class="text-sm text-[#6E6359] leading-relaxed">
                    Have custom dimensions, specific timber provenance requirements, or whole-residence joinery in mind? Schedule a private walkthrough at our Yankin showroom.
                </p>
            </div>
            <div class="flex flex-col sm:flex-row items-center gap-4">
                <a href="contact.php" class="px-8 py-4 rounded-xl bg-[#8A5A44] hover:bg-[#704735] text-[#F6F3EE] font-semibold text-sm transition-all whitespace-nowrap shadow-sm hover:shadow-md">
                    Book Showroom Audience
                </a>
                <a href="shop.php" class="px-6 py-4 rounded-xl bg-[#DFD8CD] hover:bg-[#D5CDC1] text-[#362F2A] text-sm font-medium border border-[#C9C0B3] transition-colors whitespace-nowrap">
                    View Portfolio
                </a>
            </div>
        </section>

    </main>

    <?php include "components/footer.php"; ?>
    <script src="js/script.js"></script>
</body>

</html>