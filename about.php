<?php
/**
 * ============================================================================
 * YANGON ATELIER BACKEND INSTRUCTION GUIDELINE - ABOUT ATELIER
 * ============================================================================
 * FILE: about.php
 * PURPOSE: Brand heritage narrative, master workshop timeline, and sustainability
 *          commitments.
 * 
 * STEP-BY-STEP IMPLEMENTATION GUIDE:
 * 1. Initialize Session & Database Connection:
 *    if (session_status() === PHP_SESSION_NONE) { session_start(); }
 *    require_once "components/connection.php";
 * 
 * 2. Optional Dynamic Metrics:
 *    You can query dynamic metrics from the database (e.g. total bespoke commissions,
 *    active artisans in `team`, total catalog pieces in `products`):
 *    $stat_products = $pdo->query("SELECT COUNT(*) FROM products")->fetchColumn() ?? 0;
 *    $stat_artisans = $pdo->query("SELECT COUNT(*) FROM team")->fetchColumn() ?? 0;
 * ============================================================================
 */

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
    <title>About Our Studio | Yangon Atelier</title>
    <link rel="icon" type="image/x-icon" href="images/favicon.ico">
    <?php include "components/css.php"; ?>
</head>

<body class="bg-[#EDE8E0] text-[#362F2A] font-sans selection:bg-[#8A5A44] selection:text-[#F6F3EE] antialiased">
    <?php include "components/header.php"; ?>
    <?php include "components/navbar.php"; ?>

    <!-- PAGE HEADER BREADCRUMB -->
    <header class="bg-[#DFD8CD] border-b border-[#C9C0B3] py-12 lg:py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <nav class="flex items-center gap-2 text-xs font-medium text-[#6E6359] mb-3" aria-label="Breadcrumb">
                <a href="index.php" class="hover:text-[#362F2A] transition-colors">Home</a>
                <span class="text-[#C9C0B3]">/</span>
                <span class="text-[#8A5A44] font-semibold">About Our Atelier</span>
            </nav>
            <div class="max-w-3xl">
                <h1 class="font-serif text-3xl sm:text-4xl lg:text-5xl font-normal tracking-tight text-[#362F2A]">
                    Quiet Forms, Honest Timber, Lasting Companions.
                </h1>
                <p class="text-sm sm:text-base text-[#6E6359] mt-3 leading-relaxed">
                    Yangon Atelier was founded in 2026 as a quiet reaction to the ephemeral speed of disposable design. We engineer living pieces that invite touch, stillness, and human warmth.
                </p>
            </div>
        </div>
    </header>

    <!-- NARRATIVE & IMAGERY EDITORIAL -->
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 lg:py-24">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16 items-center">
            <!-- Left Editorial Image Collage -->
            <div class="lg:col-span-6 space-y-6">
                <div class="relative rounded-3xl overflow-hidden aspect-[4/3] bg-[#F6F3EE] shadow-md border border-[#C9C0B3]">
                    <img src="images/about-showroom.jpg" alt="Yangon Atelier Showroom Atmosphere" class="w-full h-full object-cover" loading="lazy">
                    <div class="absolute inset-0 bg-[#362F2A]/10"></div>
                </div>
                <div class="grid grid-cols-2 gap-4 sm:gap-6">
                    <div class="rounded-2xl overflow-hidden aspect-square bg-[#F6F3EE] shadow-sm border border-[#C9C0B3]">
                        <img src="images/banner-workspace.jpg" alt="Design Atelier & Workspace" class="w-full h-full object-cover" loading="lazy">
                    </div>
                    <div class="rounded-2xl overflow-hidden aspect-square bg-[#F6F3EE] shadow-sm border border-[#C9C0B3]">
                        <img src="images/banner-dining-room.jpg" alt="Craft Workshop" class="w-full h-full object-cover" loading="lazy">
                    </div>
                </div>
            </div>

            <!-- Right Narrative Column -->
            <div class="lg:col-span-6 space-y-6">
                <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-[#DFD8CD] border border-[#C9C0B3] text-xs font-semibold uppercase tracking-wider text-[#8A5A44]">
                    <i class="ri-compass-3-line"></i>
                    <span>Philosophy &amp; Roots</span>
                </div>
                <h2 class="font-serif text-3xl sm:text-4xl font-normal text-[#362F2A] tracking-tight leading-tight">
                    Where Japanese Restraint Meets Nordic Warmth.
                </h2>
                <div class="space-y-4 text-[#6E6359] text-sm sm:text-base leading-relaxed">
                    <p>
                        At the heart of Yangon Atelier is the reverence for organic materials. We view wood grain not as an arbitrary pattern, but as the biographical recording of a tree's decades in wind, rain, and sun.
                    </p>
                    <p>
                        Our design language marries the minimal silhouettes of Danish modernism with the Japanese philosophy of <em>shibui</em>—subtle, unobtrusive beauty that reveals itself gradually through tactile engagement over years of everyday rituals.
                    </p>
                    <p>
                        Every piece in our collection is produced in limited studio batches by dedicated master joiners who respect traditional mortise-and-tenon construction, ensuring structural integrity without excess synthetic adhesives or hidden hardware.
                    </p>
                </div>

                <div class="pt-4 grid grid-cols-3 gap-6 border-t border-[#C9C0B3] text-center">
                    <div>
                        <span class="block font-serif text-2xl sm:text-3xl font-semibold text-[#362F2A]">100%</span>
                        <span class="text-xs text-[#6E6359] mt-1 block">Certified Hardwoods</span>
                    </div>
                    <div>
                        <span class="block font-serif text-2xl sm:text-3xl font-semibold text-[#362F2A]">5 Yrs</span>
                        <span class="text-xs text-[#6E6359] mt-1 block">Frame Warranty</span>
                    </div>
                    <div>
                        <span class="block font-serif text-2xl sm:text-3xl font-semibold text-[#362F2A]">Zero</span>
                        <span class="text-xs text-[#6E6359] mt-1 block">Toxic Finishes</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CORE PILLARS SECTION (Muted Section) -->
    <section class="bg-[#DFD8CD]/50 border-y border-[#C9C0B3] py-16 lg:py-24">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-2xl mx-auto mb-16">
                <span class="text-xs uppercase tracking-[0.25em] text-[#8A5A44] font-semibold block mb-2">Guiding Standards</span>
                <h2 class="font-serif text-3xl sm:text-4xl font-normal text-[#362F2A] tracking-tight">Our Three Foundational Pillars</h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Pillar 1 -->
                <div class="bg-[#F6F3EE] rounded-3xl border border-[#C9C0B3] p-8 shadow-sm flex flex-col justify-between hover:shadow-xl hover:border-[#8A5A44] transition-all">
                    <div class="space-y-4">
                        <div class="w-12 h-12 rounded-xl bg-[#DFD8CD] text-[#8A5A44] border border-[#C9C0B3] flex items-center justify-center text-2xl">
                            <i class="ri-plant-line"></i>
                        </div>
                        <h3 class="font-serif text-xl font-semibold text-[#362F2A]">Sustainable Sourcing</h3>
                        <p class="text-sm text-[#6E6359] leading-relaxed">
                            We collaborate strictly with certified community forestry partners who practice low-impact selective felling, guaranteeing that two saplings are nurtured for every tree harvested.
                        </p>
                    </div>
                    <span class="text-xs font-semibold text-[#8A5A44] mt-6 uppercase tracking-wider block">Pillar I</span>
                </div>

                <!-- Pillar 2 -->
                <div class="bg-[#F6F3EE] rounded-3xl border border-[#C9C0B3] p-8 shadow-sm flex flex-col justify-between hover:shadow-xl hover:border-[#8A5A44] transition-all">
                    <div class="space-y-4">
                        <div class="w-12 h-12 rounded-xl bg-[#DFD8CD] text-[#8A5A44] border border-[#C9C0B3] flex items-center justify-center text-2xl">
                            <i class="ri-hammer-line"></i>
                        </div>
                        <h3 class="font-serif text-xl font-semibold text-[#362F2A]">Tactile Craft</h3>
                        <p class="text-sm text-[#6E6359] leading-relaxed">
                            We celebrate human touch. From hand-burnished oil wax treatments to custom loom linen upholstery, our textures stimulate the senses and invite everyday intimacy.
                        </p>
                    </div>
                    <span class="text-xs font-semibold text-[#8A5A44] mt-6 uppercase tracking-wider block">Pillar II</span>
                </div>

                <!-- Pillar 3 -->
                <div class="bg-[#F6F3EE] rounded-3xl border border-[#C9C0B3] p-8 shadow-sm flex flex-col justify-between hover:shadow-xl hover:border-[#8A5A44] transition-all">
                    <div class="space-y-4">
                        <div class="w-12 h-12 rounded-xl bg-[#DFD8CD] text-[#8A5A44] border border-[#C9C0B3] flex items-center justify-center text-2xl">
                            <i class="ri-time-line"></i>
                        </div>
                        <h3 class="font-serif text-xl font-semibold text-[#362F2A]">Timeless Longevity</h3>
                        <p class="text-sm text-[#6E6359] leading-relaxed">
                            We reject trends engineered for obsolescence. Every silhouette is balanced with architectural geometry that feels contemporary today and serene fifty years from now.
                        </p>
                    </div>
                    <span class="text-xs font-semibold text-[#8A5A44] mt-6 uppercase tracking-wider block">Pillar III</span>
                </div>
            </div>
        </div>
    </section>

    <!-- ATELIER SERVICES -->
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 lg:py-24">
        <div class="text-center max-w-2xl mx-auto mb-16">
            <span class="text-xs uppercase tracking-[0.25em] text-[#8A5A44] font-semibold block mb-2">Our Capabilities</span>
            <h2 class="font-serif text-3xl sm:text-4xl font-normal text-[#362F2A] tracking-tight">Services &amp; Custom Commissions</h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Service 1 -->
            <div class="bg-[#F6F3EE] rounded-3xl border border-[#C9C0B3] p-8 text-center flex flex-col items-center shadow-sm hover:shadow-xl hover:border-[#8A5A44] transition-all">
                <div class="w-16 h-16 rounded-2xl bg-[#DFD8CD] text-[#8A5A44] border border-[#C9C0B3] flex items-center justify-center text-3xl mb-6 shadow-xs">
                    <i class="ri-store-3-line"></i>
                </div>
                <h3 class="font-serif text-lg font-semibold text-[#362F2A] mb-2">Curated Collections</h3>
                <p class="text-sm text-[#6E6359] leading-relaxed">
                    Direct access to our limited-production editions, ready for immediate delivery with white-glove placement across Yangon and surrounding regions.
                </p>
            </div>

            <!-- Service 2 -->
            <div class="bg-[#F6F3EE] rounded-3xl border border-[#C9C0B3] p-8 text-center flex flex-col items-center shadow-sm hover:shadow-xl hover:border-[#8A5A44] transition-all">
                <div class="w-16 h-16 rounded-2xl bg-[#DFD8CD] text-[#8A5A44] border border-[#C9C0B3] flex items-center justify-center text-3xl mb-6 shadow-xs">
                    <i class="ri-pencil-ruler-2-line"></i>
                </div>
                <h3 class="font-serif text-lg font-semibold text-[#362F2A] mb-2">Bespoke Architectural Design</h3>
                <p class="text-sm text-[#6E6359] leading-relaxed">
                    Custom scale specifications, specialized wood staining, and tailored textile curation for residential renovations and boutique hospitality spaces.
                </p>
            </div>

            <!-- Service 3 -->
            <div class="bg-[#F6F3EE] rounded-3xl border border-[#C9C0B3] p-8 text-center flex flex-col items-center shadow-sm hover:shadow-xl hover:border-[#8A5A44] transition-all">
                <div class="w-16 h-16 rounded-2xl bg-[#DFD8CD] text-[#8A5A44] border border-[#C9C0B3] flex items-center justify-center text-3xl mb-6 shadow-xs">
                    <i class="ri-customer-service-2-line"></i>
                </div>
                <h3 class="font-serif text-lg font-semibold text-[#362F2A] mb-2">Dedicated Concierge &amp; Care</h3>
                <p class="text-sm text-[#6E6359] leading-relaxed">
                    Lifetime restoration advisory, seasonal wood conditioning kits, and personalized design consultation six days a week in our showroom.
                </p>
            </div>
        </div>

        <!-- Banner CTA (Smoked Walnut) -->
        <div class="mt-16 rounded-3xl bg-[#4A4038] text-[#F6F3EE] border border-[#3A322B] p-8 sm:p-12 lg:p-16 flex flex-col md:flex-row items-center justify-between gap-8 shadow-xl">
            <div class="max-w-xl space-y-3">
                <span class="text-xs uppercase tracking-widest text-[#E8DDD6] font-semibold">Private Viewing</span>
                <h3 class="font-serif text-2xl sm:text-3xl font-normal text-[#F6F3EE]">Experience the Textures in Person</h3>
                <p class="text-sm text-[#DFD8CD] leading-relaxed">
                    Schedule an appointment with one of our spatial curators at the Yankin Township showroom.
                </p>
            </div>
            <a href="contact.php" class="px-8 py-4 rounded-xl bg-[#8A5A44] hover:bg-[#704735] text-[#F6F3EE] font-semibold text-sm transition-all whitespace-nowrap shadow-sm hover:shadow-md">
                Book a Consultation
            </a>
        </div>
    </section>

    <?php include "components/footer.php"; ?>
    <?php include "components/js.php"; ?>
</body>

</html>
