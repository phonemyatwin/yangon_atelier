<?php
/**
 * ============================================================================
 * FURNISHME BACKEND INSTRUCTION GUIDELINE - DESIGN COLLECTIVE & TEAM
 * ============================================================================
 * FILE: team.php
 * PURPOSE: Queries and showcases the master artisans, spatial curators, and
 *          architects from the 'team' table.
 * 
 * STEP-BY-STEP IMPLEMENTATION GUIDE:
 * 1. Initialize Session & Database:
 *    if (session_status() === PHP_SESSION_NONE) { session_start(); }
 *    require_once "components/connection.php";
 * 
 * 2. Execute Query to Retrieve Team Members:
 *    $stmt = $connection->query("SELECT id, name, position, image FROM team ORDER BY id ASC");
 *    $team = [];
 *    if ($stmt) {
 *        $team = $stmt->fetch_all(MYSQLI_ASSOC);
 *    }
 * 
 * 3. Render Dynamic Artisan Dossiers:
 *    Loop through $team to render name, position/title, and portrait photo.
 * ============================================================================
 */

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Design Collective &amp; Master Artisans | FurnishMe Atelier</title>
    <link rel="icon" type="image/x-icon" href="images/favicon.ico">
    <?php include "components/css.php"; ?>
</head>

<body class="bg-[#0D0B09] text-[#EDE4D7] font-sans selection:bg-[#C5A059] selection:text-[#0D0B09]">
    <?php include "components/header.php"; ?>
    <?php include "components/navbar.php"; ?>

    <!-- HERO / ATELIER LINEAGE BANNER -->
    <header class="relative bg-[#110E0C] border-b border-[#221C16] py-16 lg:py-24 overflow-hidden">
        <!-- Subtle gilded atmospheric background glow -->
        <div class="absolute top-0 right-1/4 w-96 h-96 bg-[#C5A059]/5 rounded-full blur-3xl pointer-events-none"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <nav class="flex items-center gap-2 text-xs font-medium text-[#8C7D6B] mb-4" aria-label="Breadcrumb">
                <a href="index.php" class="hover:text-[#FAF6EE] transition-colors">Home</a>
                <span class="text-[#453A30]">/</span>
                <span class="text-[#C5A059] font-semibold">The Design Collective</span>
            </nav>

            <div class="max-w-3xl">
                <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-[#1C1814] border border-[#2A231C] text-[11px] font-semibold uppercase tracking-[0.25em] text-[#C5A059] mb-4">
                    <span class="w-1.5 h-1.5 rounded-full bg-[#C5A059]"></span>
                    <span>Guild of Master Artisans &amp; Spatial Curators</span>
                </div>
                <h1 class="font-serif text-4xl sm:text-5xl lg:text-6xl font-normal tracking-tight text-[#FAF6EE] leading-[1.15]">
                    The Hands, Lineage &amp; Minds Behind the Craft.
                </h1>
                <p class="text-base sm:text-lg text-[#D6C8B4] mt-4 leading-relaxed font-normal">
                    In an era of disposable speed and robotic uniformity, we choose the deliberate slowness of human touch. Meet the architects, third-generation joiners, and textile curators who shape each piece in our Yangon workshop.
                </p>
            </div>
        </div>
    </header>

    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 lg:py-24 space-y-24">

        <!-- ==================================================================
             PHP BACKEND GUIDELINE: Dynamic Team Members Loop
             Query: SELECT * FROM team ORDER BY id ASC
             Example dynamic loop:
             <?php /*
             if (!empty($team)) {
                 foreach ($team as $member) {
                     ?>
                     <div class="rounded-3xl bg-[#161310] border border-[#2A231C] p-6 flex items-center gap-6">
                         <img src="images/<?= htmlspecialchars($member['image']) ?>" alt="<?= htmlspecialchars($member['name']) ?>" class="w-20 h-20 rounded-2xl object-cover">
                         <div>
                             <h3 class="font-serif text-xl font-normal text-[#FAF6EE]"><?= htmlspecialchars($member['name']) ?></h3>
                             <p class="text-xs text-[#C5A059] uppercase tracking-wider font-semibold"><?= htmlspecialchars($member['position']) ?></p>
                         </div>
                     </div>
                     <?php
                 }
             }
             */ ?>
             ================================================================== -->

        <!-- 1. FEATURED MASTER ARTISAN SPOTLIGHT: FOUNDER & PRINCIPAL ARCHITECT -->
        <section class="relative rounded-3xl bg-[#15120F] border border-[#2A231C] overflow-hidden shadow-2xl p-8 sm:p-12 lg:p-16">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16 items-center">
                <!-- Large Archival Portrait Bay -->
                <div class="lg:col-span-5 relative">
                    <div class="relative aspect-[3/4] rounded-2xl overflow-hidden border border-[#2A231C] shadow-2xl bg-[#0D0B09]">
                        <img src="images/team-1.jpg" alt="Phone Myat Win, Founder & Principal Architect" class="w-full h-full object-cover" loading="eager">
                        <div class="absolute inset-0 bg-gradient-to-t from-stone-950/80 via-transparent to-transparent"></div>
                        <div class="absolute bottom-6 left-6 right-6 flex items-center justify-between text-white">
                            <span class="text-xs uppercase tracking-widest text-[#C5A059] font-medium">Archival Portrait № 01</span>
                            <span class="text-xs text-[#B5A591]">Est. 2021</span>
                        </div>
                    </div>
                    <!-- Decorative gilded framing accent -->
                    <div class="absolute -bottom-3 -right-3 w-full h-full border border-[#C5A059]/30 rounded-2xl -z-10 pointer-events-none hidden sm:block"></div>
                </div>

                <!-- Narrative & Architectural Philosophy -->
                <div class="lg:col-span-7 space-y-6">
                    <div class="flex items-center gap-3">
                        <span class="font-serif text-sm tracking-widest text-[#C5A059] uppercase font-semibold">I. The Master Architect</span>
                        <span class="h-px flex-1 bg-[#2A231C]"></span>
                    </div>

                    <h2 class="font-serif text-3xl sm:text-4xl lg:text-5xl font-normal text-[#FAF6EE] tracking-tight">
                        Phone Myat Win
                    </h2>
                    <p class="text-xs sm:text-sm uppercase tracking-[0.2em] text-[#C5A059] font-semibold">
                        Founder &amp; Principal Spatial Director
                    </p>

                    <!-- Artisan Credo Quote -->
                    <blockquote class="my-6 border-l-2 border-[#C5A059] pl-6 py-2 italic font-serif text-lg sm:text-xl text-[#FAF6EE] leading-snug bg-[#1A1613]/80 rounded-r-xl">
                        &ldquo;A piece of furniture should never demand attention with noise; it must command quiet reverence through proportion, silence, and the irreplaceable truth of the wood grain.&rdquo;
                    </blockquote>

                    <p class="text-sm sm:text-base text-[#D6C8B4] leading-relaxed">
                        Formally trained across classical joinery studios in Kyoto and architectural institutions in Copenhagen, Phone Myat Win founded FurnishMe to resurrect the sacred harmony between human sanctuary and sustainably harvested timber. He personally inspects every timber batch arriving from regional certified concessions.
                    </p>

                    <!-- Lineage & Credentials Matrix -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 pt-4 border-t border-[#221C16] text-xs">
                        <div class="p-3.5 rounded-xl bg-[#0D0B09] border border-[#221C16]">
                            <span class="text-[#8C7D6B] block uppercase tracking-wider text-[10px]">Guild Lineage</span>
                            <strong class="text-[#FAF6EE] font-medium mt-0.5 block">Kyoto Joinery Guild &amp; Royal Danish Academy</strong>
                        </div>
                        <div class="p-3.5 rounded-xl bg-[#0D0B09] border border-[#221C16]">
                            <span class="text-[#8C7D6B] block uppercase tracking-wider text-[10px]">Mastery Focus</span>
                            <strong class="text-[#FAF6EE] font-medium mt-0.5 block">Nail-less Interlocking Joints &amp; Spatial Proportions</strong>
                        </div>
                    </div>

                    <!-- Direct Connect Links -->
                    <div class="flex items-center gap-4 pt-2">
                        <a href="contact.php?inquiry=phone-myat-win" class="inline-flex items-center gap-2 px-6 py-3 rounded-xl bg-[#C5A059] hover:bg-[#D4AF37] text-[#0D0B09] text-xs font-semibold transition-all shadow-md">
                            <span>Request Architectural Consultation</span>
                            <i class="ri-arrow-right-line"></i>
                        </a>
                        <a href="#" aria-label="LinkedIn Profile" class="w-10 h-10 rounded-xl bg-[#1C1814] hover:bg-[#C5A059] text-[#B5A591] hover:text-[#0D0B09] border border-[#2A231C] flex items-center justify-center transition-colors">
                            <i class="ri-linkedin-box-line text-lg"></i>
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <!-- 2. THE GUILD REGISTRY: ARTISAN ROSTER & WORKSHOP MASTERS -->
        <section class="space-y-12">
            <div class="text-center max-w-2xl mx-auto">
                <span class="text-xs uppercase tracking-[0.25em] text-[#C5A059] font-semibold block mb-2">Guild Registry</span>
                <h2 class="font-serif text-3xl sm:text-4xl font-normal text-[#FAF6EE] tracking-tight">Master Craftsmen &amp; Material Curators</h2>
                <p class="text-xs sm:text-sm text-[#8C7D6B] mt-2 leading-relaxed">
                    Every discipline within our atelier is led by a dedicated specialist committed to preservation, material integrity, and lifelong craftsmanship.
                </p>
            </div>

            <div class="space-y-8">

                <!-- Artisan 2: Thae Nay Nwe Soe (Ergonomics) -->
                <div class="group rounded-3xl bg-[#161310] border border-[#2A231C] p-6 sm:p-8 lg:p-10 hover:border-[#C5A059] transition-all duration-300 shadow-xl">
                    <div class="grid grid-cols-1 md:grid-cols-12 gap-8 items-center">
                        <div class="md:col-span-4 relative aspect-[4/5] rounded-2xl overflow-hidden bg-[#0D0B09] border border-[#2A231C]">
                            <img src="images/team-2.jpg" alt="Thae Nay Nwe Soe" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" loading="lazy">
                            <span class="absolute top-4 left-4 px-2.5 py-1 rounded-full text-[10px] font-semibold bg-[#0D0B09]/80 backdrop-blur-md text-[#C5A059] border border-[#C5A059]/30">
                                II. ERGONOMICS
                            </span>
                        </div>
                        <div class="md:col-span-8 space-y-4">
                            <div class="flex flex-col sm:flex-row sm:items-baseline justify-between gap-2 border-b border-[#221C16] pb-4">
                                <div>
                                    <h3 class="font-serif text-2xl sm:text-3xl font-normal text-[#FAF6EE]">Thae Nay Nwe Soe</h3>
                                    <span class="text-xs uppercase tracking-wider text-[#C5A059] font-semibold mt-0.5 block">Head of Interior Ergonomics &amp; Living Cadence</span>
                                </div>
                                <div class="flex items-center gap-2">
                                    <span class="px-3 py-1 rounded-full bg-[#1C1814] border border-[#2A231C] text-[11px] text-[#B5A591]">14 Years Mastery</span>
                                </div>
                            </div>
                            <p class="text-sm text-[#D6C8B4] leading-relaxed">
                                Directs user posture analysis and dimensional cadence. She calculates the subtle seat rake angle, backrest curvature, and foam density transitions that transform an ordinary chair into a sanctuary of deep restorative comfort.
                            </p>
                            <div class="flex flex-wrap items-center gap-2 pt-2">
                                <span class="text-xs text-[#8C7D6B] mr-2">Core Materials:</span>
                                <span class="px-3 py-1 rounded-lg bg-[#0D0B09] border border-[#221C16] text-xs text-[#FAF6EE]">High-Resilience Latex</span>
                                <span class="px-3 py-1 rounded-lg bg-[#0D0B09] border border-[#221C16] text-xs text-[#FAF6EE]">Natural Coconut Coir</span>
                                <span class="px-3 py-1 rounded-lg bg-[#0D0B09] border border-[#221C16] text-xs text-[#FAF6EE]">Feather Blend Layers</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Artisan 3: Su Thinzar Htet (Joinery) -->
                <div class="group rounded-3xl bg-[#161310] border border-[#2A231C] p-6 sm:p-8 lg:p-10 hover:border-[#C5A059] transition-all duration-300 shadow-xl">
                    <div class="grid grid-cols-1 md:grid-cols-12 gap-8 items-center">
                        <div class="md:col-span-4 relative aspect-[4/5] rounded-2xl overflow-hidden bg-[#0D0B09] border border-[#2A231C]">
                            <img src="images/team-3.jpg" alt="Su Thinzar Htet" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" loading="lazy">
                            <span class="absolute top-4 left-4 px-2.5 py-1 rounded-full text-[10px] font-semibold bg-[#0D0B09]/80 backdrop-blur-md text-[#C5A059] border border-[#C5A059]/30">
                                III. JOINERY
                            </span>
                        </div>
                        <div class="md:col-span-8 space-y-4">
                            <div class="flex flex-col sm:flex-row sm:items-baseline justify-between gap-2 border-b border-[#221C16] pb-4">
                                <div>
                                    <h3 class="font-serif text-2xl sm:text-3xl font-normal text-[#FAF6EE]">Su Thinzar Htet</h3>
                                    <span class="text-xs uppercase tracking-wider text-[#C5A059] font-semibold mt-0.5 block">Master Wood Craftsman &amp; Joinery Conservator</span>
                                </div>
                                <div class="flex items-center gap-2">
                                    <span class="px-3 py-1 rounded-full bg-[#1C1814] border border-[#2A231C] text-[11px] text-[#B5A591]">3rd Generation Woodworker</span>
                                </div>
                            </div>
                            <p class="text-sm text-[#D6C8B4] leading-relaxed">
                                Oversees our timber seasoning cycles, continuous grain selection, and hand-cut dovetail joints. Under her stewardship, timber fibers are carved with micro-millimeter tolerance so humidity shifts never compromise structural integrity.
                            </p>
                            <div class="flex flex-wrap items-center gap-2 pt-2">
                                <span class="text-xs text-[#8C7D6B] mr-2">Core Materials:</span>
                                <span class="px-3 py-1 rounded-lg bg-[#0D0B09] border border-[#221C16] text-xs text-[#FAF6EE]">Quarter-Sawn White Oak</span>
                                <span class="px-3 py-1 rounded-lg bg-[#0D0B09] border border-[#221C16] text-xs text-[#FAF6EE]">Smoked Black Walnut</span>
                                <span class="px-3 py-1 rounded-lg bg-[#0D0B09] border border-[#221C16] text-xs text-[#FAF6EE]">Aged Golden Teak</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Artisan 4: Myat Chal Oo (Textiles) -->
                <div class="group rounded-3xl bg-[#161310] border border-[#2A231C] p-6 sm:p-8 lg:p-10 hover:border-[#C5A059] transition-all duration-300 shadow-xl">
                    <div class="grid grid-cols-1 md:grid-cols-12 gap-8 items-center">
                        <div class="md:col-span-4 relative aspect-[4/5] rounded-2xl overflow-hidden bg-[#0D0B09] border border-[#2A231C]">
                            <img src="images/team-4.jpg" alt="Myat Chal Oo" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" loading="lazy">
                            <span class="absolute top-4 left-4 px-2.5 py-1 rounded-full text-[10px] font-semibold bg-[#0D0B09]/80 backdrop-blur-md text-[#C5A059] border border-[#C5A059]/30">
                                IV. TEXTILES
                            </span>
                        </div>
                        <div class="md:col-span-8 space-y-4">
                            <div class="flex flex-col sm:flex-row sm:items-baseline justify-between gap-2 border-b border-[#221C16] pb-4">
                                <div>
                                    <h3 class="font-serif text-2xl sm:text-3xl font-normal text-[#FAF6EE]">Myat Chal Oo</h3>
                                    <span class="text-xs uppercase tracking-wider text-[#C5A059] font-semibold mt-0.5 block">Material &amp; Fine Textile Curator</span>
                                </div>
                                <div class="flex items-center gap-2">
                                    <span class="px-3 py-1 rounded-full bg-[#1C1814] border border-[#2A231C] text-[11px] text-[#B5A591]">Textile Historian</span>
                                </div>
                            </div>
                            <p class="text-sm text-[#D6C8B4] leading-relaxed">
                                Selects coarse-weave unbleached linens, organic bouclés, and vegetable-tanned aniline leather hides from sustainable family-owned mills. She ensures that every textile possesses a tactile presence that deepens in warmth as it ages.
                            </p>
                            <div class="flex flex-wrap items-center gap-2 pt-2">
                                <span class="text-xs text-[#8C7D6B] mr-2">Core Materials:</span>
                                <span class="px-3 py-1 rounded-lg bg-[#0D0B09] border border-[#221C16] text-xs text-[#FAF6EE]">Belgian Linen Weaves</span>
                                <span class="px-3 py-1 rounded-lg bg-[#0D0B09] border border-[#221C16] text-xs text-[#FAF6EE]">Vegetable-Tanned Saddle Leather</span>
                                <span class="px-3 py-1 rounded-lg bg-[#0D0B09] border border-[#221C16] text-xs text-[#FAF6EE]">Virgin Wool Bouclé</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Artisan 5: Nyi Nyi Aung (Finishing) -->
                <div class="group rounded-3xl bg-[#161310] border border-[#2A231C] p-6 sm:p-8 lg:p-10 hover:border-[#C5A059] transition-all duration-300 shadow-xl">
                    <div class="grid grid-cols-1 md:grid-cols-12 gap-8 items-center">
                        <div class="md:col-span-4 relative aspect-[4/5] rounded-2xl overflow-hidden bg-[#0D0B09] border border-[#2A231C]">
                            <img src="images/team-5.jpg" alt="Nyi Nyi Aung" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" loading="lazy">
                            <span class="absolute top-4 left-4 px-2.5 py-1 rounded-full text-[10px] font-semibold bg-[#0D0B09]/80 backdrop-blur-md text-[#C5A059] border border-[#C5A059]/30">
                                V. FINISHING
                            </span>
                        </div>
                        <div class="md:col-span-8 space-y-4">
                            <div class="flex flex-col sm:flex-row sm:items-baseline justify-between gap-2 border-b border-[#221C16] pb-4">
                                <div>
                                    <h3 class="font-serif text-2xl sm:text-3xl font-normal text-[#FAF6EE]">Nyi Nyi Aung</h3>
                                    <span class="text-xs uppercase tracking-wider text-[#C5A059] font-semibold mt-0.5 block">Master Finishing Alchemist</span>
                                </div>
                                <div class="flex items-center gap-2">
                                    <span class="px-3 py-1 rounded-full bg-[#1C1814] border border-[#2A231C] text-[11px] text-[#B5A591]">Formulation Chemist</span>
                                </div>
                            </div>
                            <p class="text-sm text-[#D6C8B4] leading-relaxed">
                                Formulates our proprietary non-toxic botanical waxes, cold-pressed linseed blends, and carnauba sealants. His hand-rubbed oil technique protects against moisture while leaving the wood grain completely open to human touch.
                            </p>
                            <div class="flex flex-wrap items-center gap-2 pt-2">
                                <span class="text-xs text-[#8C7D6B] mr-2">Core Materials:</span>
                                <span class="px-3 py-1 rounded-lg bg-[#0D0B09] border border-[#221C16] text-xs text-[#FAF6EE]">Cold-Pressed Linseed Oil</span>
                                <span class="px-3 py-1 rounded-lg bg-[#0D0B09] border border-[#221C16] text-xs text-[#FAF6EE]">Organic Beeswax</span>
                                <span class="px-3 py-1 rounded-lg bg-[#0D0B09] border border-[#221C16] text-xs text-[#FAF6EE]">Zero-VOC Bio Hardwax</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Artisan 6: Min Khant Naung (Concierge) -->
                <div class="group rounded-3xl bg-[#161310] border border-[#2A231C] p-6 sm:p-8 lg:p-10 hover:border-[#C5A059] transition-all duration-300 shadow-xl">
                    <div class="grid grid-cols-1 md:grid-cols-12 gap-8 items-center">
                        <div class="md:col-span-4 relative aspect-[4/5] rounded-2xl overflow-hidden bg-[#0D0B09] border border-[#2A231C]">
                            <img src="images/team-6.jpg" alt="Min Khant Naung" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" loading="lazy">
                            <span class="absolute top-4 left-4 px-2.5 py-1 rounded-full text-[10px] font-semibold bg-[#0D0B09]/80 backdrop-blur-md text-[#C5A059] border border-[#C5A059]/30">
                                VI. CONCIERGE
                            </span>
                        </div>
                        <div class="md:col-span-8 space-y-4">
                            <div class="flex flex-col sm:flex-row sm:items-baseline justify-between gap-2 border-b border-[#221C16] pb-4">
                                <div>
                                    <h3 class="font-serif text-2xl sm:text-3xl font-normal text-[#FAF6EE]">Min Khant Naung</h3>
                                    <span class="text-xs uppercase tracking-wider text-[#C5A059] font-semibold mt-0.5 block">Showroom Concierge &amp; Spatial Advisor</span>
                                </div>
                                <div class="flex items-center gap-2">
                                    <span class="px-3 py-1 rounded-full bg-[#1C1814] border border-[#2A231C] text-[11px] text-[#B5A591]">Client Steward</span>
                                </div>
                            </div>
                            <p class="text-sm text-[#D6C8B4] leading-relaxed">
                                Leads private domestic walkthroughs, bespoke commission specifications, and white-glove placement across Myanmar estates. He coordinates with homeowners and interior architects to ensure effortless spatial harmony.
                            </p>
                            <div class="flex flex-wrap items-center gap-2 pt-2">
                                <span class="text-xs text-[#8C7D6B] mr-2">Specializations:</span>
                                <span class="px-3 py-1 rounded-lg bg-[#0D0B09] border border-[#221C16] text-xs text-[#FAF6EE]">Private Salons</span>
                                <span class="px-3 py-1 rounded-lg bg-[#0D0B09] border border-[#221C16] text-xs text-[#FAF6EE]">White-Glove Placement</span>
                                <span class="px-3 py-1 rounded-lg bg-[#0D0B09] border border-[#221C16] text-xs text-[#FAF6EE]">Architectural Blueprints</span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>

        <!-- 3. THE ATELIER GUILD OATH / WORKSHOP MANIFESTO -->
        <section class="rounded-3xl bg-[#080705] border border-[#2A231C] p-8 sm:p-12 lg:p-16 text-center space-y-8 shadow-2xl relative overflow-hidden">
            <div class="max-w-2xl mx-auto space-y-3">
                <span class="text-xs uppercase tracking-[0.25em] text-[#C5A059] font-semibold">The Atelier Oath</span>
                <h3 class="font-serif text-2xl sm:text-3xl font-normal text-[#FAF6EE]">Three Inviolable Principles of the Guild</h3>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-left border-t border-[#1F1914] pt-8">
                <div class="space-y-2">
                    <span class="font-serif text-lg text-[#C5A059] font-semibold">I. The Living Wood</span>
                    <p class="text-xs text-[#8C7D6B] leading-relaxed">
                        We never disguise timber flaws with synthetic fillers. Every knot, grain swirl, and mineral streak is celebrated as the biography of the tree.
                    </p>
                </div>
                <div class="space-y-2">
                    <span class="font-serif text-lg text-[#C5A059] font-semibold">II. Joinery Over Fasteners</span>
                    <p class="text-xs text-[#8C7D6B] leading-relaxed">
                        Interlocking timber geometry must support the load before a single fastener is introduced. Mortise and tenon will always outlive cheap hardware.
                    </p>
                </div>
                <div class="space-y-2">
                    <span class="font-serif text-lg text-[#C5A059] font-semibold">III. Generational Patina</span>
                    <p class="text-xs text-[#8C7D6B] leading-relaxed">
                        A piece is only complete when it begins its life with its owner. Our finishes are formulated to mature into greater beauty over half a century.
                    </p>
                </div>
            </div>
        </section>

        <!-- 4. PRIVATE AUDIENCE & COMMISSION CONSULTATION -->
        <section class="rounded-3xl bg-gradient-to-br from-[#161310] via-[#110E0C] to-[#0D0B09] border border-[#2A231C] p-8 sm:p-12 lg:p-16 flex flex-col md:flex-row items-center justify-between gap-8 shadow-2xl">
            <div class="max-w-xl space-y-3 text-center md:text-left">
                <span class="text-xs uppercase tracking-widest text-[#C5A059] font-semibold">Private Commission Audience</span>
                <h3 class="font-serif text-2xl sm:text-3xl font-normal text-[#FAF6EE]">Request a Consultation with Our Master Joiners</h3>
                <p class="text-sm text-[#8C7D6B] leading-relaxed">
                    Have custom dimensions, specific timber provenance requirements, or whole-residence joinery in mind? Schedule a private walkthrough at our Yankin showroom.
                </p>
            </div>
            <div class="flex flex-col sm:flex-row items-center gap-4">
                <a href="contact.php" class="px-8 py-4 rounded-xl bg-[#C5A059] hover:bg-[#D4AF37] text-[#0D0B09] font-semibold text-sm transition-all whitespace-nowrap shadow-md hover:shadow-lg">
                    Book Showroom Audience
                </a>
                <a href="shop.php" class="px-6 py-4 rounded-xl bg-[#1C1814] hover:bg-[#2A231C] text-[#FAF6EE] text-sm font-medium border border-[#2A231C] transition-colors whitespace-nowrap">
                    View Portfolio
                </a>
            </div>
        </section>

    </main>

    <?php include "components/footer.php"; ?>
    <?php include "components/js.php"; ?>
</body>

</html>
