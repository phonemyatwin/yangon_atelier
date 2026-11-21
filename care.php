<?php
// Initialize session
require_once __DIR__ . '/components/session_start.php';

// Connect database
require_once __DIR__ . '/components/connection.php';
?>
<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Material Care &amp; Maintenance Handbook | Yangon Atelier</title>
    <link rel="icon" type="image/x-icon" href="images/favicon/favicon.ico">
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
                <span class="text-[#362F2A]">Care Instructions</span>
            </nav>
            <div class="flex flex-col md:flex-row md:items-end justify-between gap-4">
                <div>
                    <span class="text-xs uppercase tracking-[0.25em] text-[#8A5A44] font-semibold block mb-2">Preservation &amp; Stewardship</span>
                    <h1 class="font-serif text-3xl sm:text-4xl lg:text-5xl font-normal tracking-tight text-[#362F2A]">
                        Material Care &amp; Longevity Guide
                    </h1>
                    <p class="text-sm sm:text-base text-[#6E6359] max-w-2xl mt-3 leading-relaxed">
                        Thoughtful rituals to nurture solid timbers, tactile textiles, honest leathers, and honed stone so they mature with graceful distinction through generations.
                    </p>
                </div>
                <div class="text-xs text-[#6E6359] bg-[#EDE8E0] px-4 py-2.5 rounded-xl border border-[#C9C0B3] whitespace-nowrap">
                    <span>Curated by: </span>
                    <strong class="text-[#362F2A] font-semibold">Nyi Nyi Aung, Finishing Specialist</strong>
                </div>
            </div>
        </div>
    </header>

    <!-- MAIN CARE CONTENT & NAVIGATION -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 lg:py-16">

        <!-- PHILOSOPHY INTRO BANNER -->
        <div class="mb-14 bg-[#F6F3EE] rounded-3xl border border-[#C9C0B3] overflow-hidden shadow-xs grid grid-cols-1 lg:grid-cols-12">
            <div class="lg:col-span-7 p-8 sm:p-10 lg:p-12 flex flex-col justify-between">
                <div>
                    <span class="text-xs uppercase tracking-[0.2em] text-[#8A5A44] font-semibold block mb-3">The Art of Wabi-Sabi Patina</span>
                    <h2 class="font-serif text-2xl sm:text-3xl font-normal text-[#362F2A] tracking-tight leading-snug">
                        Furniture designed to breathe, settle, and grow richer with time.
                    </h2>
                    <p class="text-sm text-[#6E6359] leading-relaxed mt-4">
                        Unlike mass-manufactured synthetic furniture coated in impervious plastic varnishes, Yangon Atelier pieces are alive. We finish our white oak, black walnut, and golden teak with organic plant waxes and breathable oils. Proper stewardship is not a burden—it is a tactile, grounding ritual that connects you directly to the life of the timber.
                    </p>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 pt-8 mt-8 border-t border-[#C9C0B3] text-xs">
                    <div>
                        <strong class="text-[#362F2A] block font-semibold">40% — 60%</strong>
                        <span class="text-[#6E6359]">Ideal indoor relative humidity</span>
                    </div>
                    <div>
                        <strong class="text-[#362F2A] block font-semibold">Twice Yearly</strong>
                        <span class="text-[#6E6359]">Natural oil replenishing ritual</span>
                    </div>
                    <div>
                        <strong class="text-[#362F2A] block font-semibold">Zero Aerosols</strong>
                        <span class="text-[#6E6359]">Pure water &amp; bio-waxes only</span>
                    </div>
                </div>
            </div>
            <div class="lg:col-span-5 relative min-h-[280px] bg-[#DFD8CD]">
                <img src="images/blogs/blog5.jpg" alt="Botanical plant wax application on solid wood" class="w-full h-full object-cover">
                <div class="absolute bottom-4 left-4 right-4 bg-stone-950/70 backdrop-blur-md rounded-2xl p-4 text-white text-xs">
                    <span class="font-serif text-amber-200 block text-sm">Cold-Pressed Linseed &amp; Carnauba Wax</span>
                    <p class="text-stone-300 text-[11px] mt-0.5">Hand-rubbed finishes celebrate natural grain texture and tactile warmth.</p>
                </div>
            </div>
        </div>

        <!-- QUICK DOS & DON'TS -->
        <section class="mb-16">
            <div class="text-center max-w-xl mx-auto mb-8">
                <span class="text-xs uppercase tracking-[0.2em] text-[#8A5A44] font-semibold block mb-2">Golden Rules</span>
                <h2 class="font-serif text-2xl sm:text-3xl font-normal text-[#362F2A]">Atelier Principles of Care</h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- DOs -->
                <div class="p-6 sm:p-8 rounded-3xl bg-[#DCE5DF]/70 border border-[#C6D6CB] shadow-xs">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-9 h-9 rounded-xl bg-[#3F624D] text-[#F6F3EE] flex items-center justify-center text-lg shadow-xs">
                            <i class="ri-check-line"></i>
                        </div>
                        <h3 class="font-serif text-lg font-semibold text-[#2D4537]">Recommended Practices</h3>
                    </div>
                    <ul class="space-y-3 text-xs sm:text-sm text-[#3F624D]">
                        <li class="flex items-start gap-2.5">
                            <i class="ri-checkbox-circle-fill text-[#3F624D] text-base flex-shrink-0 mt-0.5"></i>
                            <span>Wipe spills immediately using a clean, soft microfiber cloth wrung out in lukewarm water.</span>
                        </li>
                        <li class="flex items-start gap-2.5">
                            <i class="ri-checkbox-circle-fill text-[#3F624D] text-base flex-shrink-0 mt-0.5"></i>
                            <span>Use coasters, natural cork trivets, and felt pads beneath stoneware vases, teapots, and laptops.</span>
                        </li>
                        <li class="flex items-start gap-2.5">
                            <i class="ri-checkbox-circle-fill text-[#3F624D] text-base flex-shrink-0 mt-0.5"></i>
                            <span>Dust weekly in the direction of the timber grain with a dry, lint-free cotton cloth.</span>
                        </li>
                        <li class="flex items-start gap-2.5">
                            <i class="ri-checkbox-circle-fill text-[#3F624D] text-base flex-shrink-0 mt-0.5"></i>
                            <span>Rotate reversible cushions and lounger seats monthly to promote balanced textile wear.</span>
                        </li>
                    </ul>
                </div>

                <!-- DON'Ts -->
                <div class="p-6 sm:p-8 rounded-3xl bg-[#EFE0E0]/70 border border-[#DFC8C8] shadow-xs">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-9 h-9 rounded-xl bg-[#8C3B3B] text-[#F6F3EE] flex items-center justify-center text-lg shadow-xs">
                            <i class="ri-close-line"></i>
                        </div>
                        <h3 class="font-serif text-lg font-semibold text-[#4D2424]">What to Strictly Avoid</h3>
                    </div>
                    <ul class="space-y-3 text-xs sm:text-sm text-[#8C3B3B]">
                        <li class="flex items-start gap-2.5">
                            <i class="ri-close-circle-fill text-[#8C3B3B] text-base flex-shrink-0 mt-0.5"></i>
                            <span>Never use aerosol spray polishes, ammonia, bleach, acidic citrus sprays, or chemical degreasers.</span>
                        </li>
                        <li class="flex items-start gap-2.5">
                            <i class="ri-close-circle-fill text-[#8C3B3B] text-base flex-shrink-0 mt-0.5"></i>
                            <span>Do not place solid wood furniture directly against high-velocity air conditioner discharge vents.</span>
                        </li>
                        <li class="flex items-start gap-2.5">
                            <i class="ri-close-circle-fill text-[#8C3B3B] text-base flex-shrink-0 mt-0.5"></i>
                            <span>Avoid placing boiling cast-iron cookware directly on raw timber or unsealed travertine surfaces.</span>
                        </li>
                        <li class="flex items-start gap-2.5">
                            <i class="ri-close-circle-fill text-[#8C3B3B] text-base flex-shrink-0 mt-0.5"></i>
                            <span>Never scrub fabric stains aggressively; always gently dab and blot from the edge inward.</span>
                        </li>
                    </ul>
                </div>
            </div>
        </section>

        <!-- MATERIAL SPECIFIC SECTIONS -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">

            <!-- STICKY TABLE OF CONTENTS -->
            <aside class="lg:col-span-4">
                <div class="lg:sticky lg:top-28 bg-[#F6F3EE] border border-[#C9C0B3] rounded-3xl p-6 shadow-xs">
                    <h3 class="text-xs uppercase tracking-[0.2em] text-[#6E6359] font-semibold mb-4">
                        Material Chapters
                    </h3>
                    <nav class="space-y-1 text-xs">
                        <a href="#care-wood" class=" py-2.5 px-3 rounded-xl font-medium text-[#6E6359] hover:text-[#362F2A] hover:bg-[#DFD8CD] transition-colors flex items-center gap-2">
                            <i class="ri-hammer-line text-[#8A5A44]"></i>
                            <span>Solid Woods &amp; Plant Oils</span>
                        </a>
                        <a href="#care-textiles" class=" py-2.5 px-3 rounded-xl font-medium text-[#6E6359] hover:text-[#362F2A] hover:bg-[#DFD8CD] transition-colors flex items-center gap-2">
                            <i class="ri-t-shirt-air-line text-[#8A5A44]"></i>
                            <span>Bouclé &amp; Belgian Linens</span>
                        </a>
                        <a href="#care-leather" class=" py-2.5 px-3 rounded-xl font-medium text-[#6E6359] hover:text-[#362F2A] hover:bg-[#DFD8CD] transition-colors flex items-center gap-2">
                            <i class="ri-pantone-line text-[#8A5A44]"></i>
                            <span>Full-Grain Vegetable Leather</span>
                        </a>
                        <a href="#care-stone" class=" py-2.5 px-3 rounded-xl font-medium text-[#6E6359] hover:text-[#362F2A] hover:bg-[#DFD8CD] transition-colors flex items-center gap-2">
                            <i class="ri-shape-line text-[#8A5A44]"></i>
                            <span>Honed Marble &amp; Travertine</span>
                        </a>
                        <a href="#care-rattan" class=" py-2.5 px-3 rounded-xl font-medium text-[#6E6359] hover:text-[#362F2A] hover:bg-[#DFD8CD] transition-colors flex items-center gap-2">
                            <i class="ri-grid-line text-[#8A5A44]"></i>
                            <span>Natural Woven Rattan &amp; Cane</span>
                        </a>
                        <a href="#care-monsoon" class=" py-2.5 px-3 rounded-xl font-medium text-[#6E6359] hover:text-[#362F2A] hover:bg-[#DFD8CD] transition-colors flex items-center gap-2">
                            <i class="ri-drop-line text-[#8A5A44]"></i>
                            <span>Tropical Climate &amp; Monsoon Care</span>
                        </a>
                    </nav>

                    <!-- Concierge Card -->
                    <div class="mt-8 pt-6 border-t border-[#C9C0B3] text-xs text-[#6E6359] space-y-3">
                        <div class="flex items-center gap-3">
                            <img src="images/team/nyinyiaung.jpg" alt="Nyi Nyi Aung" class="w-11 h-11 rounded-full object-cover border border-[#C9C0B3]">
                            <div>
                                <span class="text-[11px] uppercase tracking-wider text-[#8A5A44] font-semibold block">Craft Concierge</span>
                                <p class="font-medium text-[#362F2A]">Nyi Nyi Aung</p>
                                <p class="text-[11px] text-[#6E6359]">Finishing Specialist</p>
                            </div>
                        </div>
                        <p class="text-[11px] text-[#6E6359] leading-relaxed">
                            Need a bespoke restoration touch-up kit or guidance on oiling an heirloom tabletop?
                        </p>
                        <a href="contact.php" class="w-full py-2.5 px-3 rounded-xl bg-[#8A5A44] hover:bg-[#704735] text-[#F6F3EE] text-xs font-medium transition-colors flex items-center justify-center gap-1.5 shadow-xs">
                            <i class="ri-service-line"></i>
                            <span>Request Atelier Care Kit</span>
                        </a>
                    </div>
                </div>
            </aside>

            <!-- MATERIAL ARTICLES -->
            <article class="lg:col-span-8 space-y-14 text-sm leading-relaxed text-[#6E6359]">

                <!-- WOOD CARE -->
                <section id="care-wood" class="scroll-mt-28 space-y-5">
                    <div class="flex items-center gap-2">
                        <span class="w-2 h-2 rounded-full bg-[#8A5A44]"></span>
                        <span class="text-xs uppercase tracking-wider text-[#8A5A44] font-semibold">Chapter 1</span>
                    </div>
                    <h2 class="font-serif text-2xl sm:text-3xl font-normal text-[#362F2A] tracking-tight">Solid Woods &amp; Plant Oil Finishes</h2>
                    <p>
                        We craft our dining tables, beds, and chairs from premium solid timbers: American White Oak, Black Walnut, and sustainably harvested Burmese Teak. Our pieces are treated with breathable bio-based hardwax oils that penetrate deep into the pores, leaving the natural tactile grain palpable to the touch.
                    </p>

                    <div class="bg-[#F6F3EE] rounded-3xl p-6 sm:p-8 border border-[#C9C0B3] shadow-xs space-y-6">
                        <div class="space-y-2">
                            <h3 class="font-serif text-base font-semibold text-[#362F2A]">Daily &amp; Weekly Maintenance</h3>
                            <p class="text-xs text-[#6E6359]">
                                Use a clean, dry cloth for regular dusting. For light residue, wipe with a soft cloth slightly dampened in lukewarm water and dry immediately with a clean linen towel. Always wipe parallel to the timber grain direction.
                            </p>
                        </div>

                        <div class="space-y-2 pt-4 border-t border-[#C9C0B3]">
                            <h3 class="font-serif text-base font-semibold text-[#362F2A]">Bi-Annual Re-Oiling Ritual</h3>
                            <p class="text-xs text-[#6E6359]">
                                Once or twice per year (preferably before the dry season and after monsoon), apply a thin coat of Yangon Atelier Botanical Hardwax Oil using a soft cotton pad. Allow the oil to absorb for 15 minutes, then vigorously buff away all excess surface residue with a dry cloth until the timber feels dry and silky.
                            </p>
                        </div>

                        <div class="space-y-2 pt-4 border-t border-[#C9C0B3]">
                            <h3 class="font-serif text-base font-semibold text-[#362F2A]">Treating Minor Scratches</h3>
                            <p class="text-xs text-[#6E6359]">
                                Superficial hairline scratches can be gently sanded along the grain using ultra-fine 320-grit sandpaper, followed by a localized dab of our natural maintenance oil. The scratch will gracefully blend back into the surrounding wood fibers.
                            </p>
                        </div>
                    </div>
                </section>

                <!-- TEXTILE CARE -->
                <section id="care-textiles" class="scroll-mt-28 space-y-5 pt-8 border-t border-[#C9C0B3]">
                    <div class="flex items-center gap-2">
                        <span class="w-2 h-2 rounded-full bg-[#8A5A44]"></span>
                        <span class="text-xs uppercase tracking-wider text-[#8A5A44] font-semibold">Chapter 2</span>
                    </div>
                    <h2 class="font-serif text-2xl sm:text-3xl font-normal text-[#362F2A] tracking-tight">Bouclé, Woven Fabrics &amp; Belgian Linens</h2>
                    <p>
                        Our modular sectionals, armchairs, and tatami bed headboards feature tactile bouclé wools, heavy-slub Belgian linens, and muted architectural weaves. These fabrics offer comforting softness while resisting pilling through structural yarn twists.
                    </p>

                    <div class="bg-[#F6F3EE] rounded-3xl p-6 sm:p-8 border border-[#C9C0B3] shadow-xs space-y-6">
                        <div class="space-y-2">
                            <h3 class="font-serif text-base font-semibold text-[#362F2A]">Vacuuming &amp; Aeration</h3>
                            <p class="text-xs text-[#6E6359]">
                                Vacuum upholstery fortnightly using a clean, soft-bristle brush attachment on low suction. This prevents micro-dust particles from embedding into the looped bouclé fibers.
                            </p>
                        </div>

                        <div class="space-y-2 pt-4 border-t border-[#C9C0B3]">
                            <h3 class="font-serif text-base font-semibold text-[#362F2A]">Emergency Spot Cleaning</h3>
                            <p class="text-xs text-[#6E6359]">
                                Immediately blot liquids with an undyed absorbent cloth. For light marks, use a mixture of distilled water and a drop of pH-neutral soap. Dab gently without scrubbing to protect the loop structure. Allow to air dry completely away from direct sun.
                            </p>
                        </div>
                    </div>
                </section>

                <!-- LEATHER CARE -->
                <section id="care-leather" class="scroll-mt-28 space-y-5 pt-8 border-t border-[#C9C0B3]">
                    <div class="flex items-center gap-2">
                        <span class="w-2 h-2 rounded-full bg-[#8A5A44]"></span>
                        <span class="text-xs uppercase tracking-wider text-[#8A5A44] font-semibold">Chapter 3</span>
                    </div>
                    <h2 class="font-serif text-2xl sm:text-3xl font-normal text-[#362F2A] tracking-tight">Full-Grain Vegetable-Tanned Leather</h2>
                    <p>
                        Our caramel leather chaise sofas and accent lounge chairs are upholstered in uncorrected, full-grain aniline and semi-aniline hides tanned using organic bark tannins. The leather retains natural neck creases, light pore variations, and breathes in harmony with ambient climate.
                    </p>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div class="p-6 rounded-2xl bg-[#F6F3EE] border border-[#C9C0B3] shadow-xs">
                            <h4 class="font-serif text-sm font-semibold text-[#362F2A] mb-2">Preserving Hydration</h4>
                            <p class="text-xs text-[#6E6359]">
                                In modern air-conditioned interiors, leather can lose moisture. Apply an organic beeswax leather cream once per year to preserve suppleness and prevent hairline surface creasing.
                            </p>
                        </div>
                        <div class="p-6 rounded-2xl bg-[#F6F3EE] border border-[#C9C0B3] shadow-xs">
                            <h4 class="font-serif text-sm font-semibold text-[#362F2A] mb-2">Sunlight Precautions</h4>
                            <p class="text-xs text-[#6E6359]">
                                Prolonged direct tropical sunlight will bleach natural tanning dyes. Position your leather lounger at least 1 meter away from unshaded floor-to-ceiling windows.
                            </p>
                        </div>
                    </div>
                </section>

                <!-- STONE & TRAVERTINE -->
                <section id="care-stone" class="scroll-mt-28 space-y-5 pt-8 border-t border-[#C9C0B3]">
                    <div class="flex items-center gap-2">
                        <span class="w-2 h-2 rounded-full bg-[#8A5A44]"></span>
                        <span class="text-xs uppercase tracking-wider text-[#8A5A44] font-semibold">Chapter 4</span>
                    </div>
                    <h2 class="font-serif text-2xl sm:text-3xl font-normal text-[#362F2A] tracking-tight">Honed Marble &amp; Travertine Stone</h2>
                    <p>
                        Yangon Atelier low coffee tables and architectural pedestals feature natural Italian Carrara marble and unfilled Roman travertine. We hand-hone their surfaces to a matte, non-glossy finish that honors their geological sediment.
                    </p>

                    <div class="bg-[#F6F3EE] rounded-3xl p-6 sm:p-8 border border-[#C9C0B3] shadow-xs space-y-4 text-xs text-[#6E6359]">
                        <p>
                            <strong class="text-[#362F2A]">Acid Sensitivity:</strong> Natural marble and travertine are calcium-based and susceptible to etching from acidic liquids (lemon juice, vinegar, red wine, perfume). Always place glassware on linen or cork coasters.
                        </p>
                        <p>
                            <strong class="text-[#362F2A]">Cleaning Method:</strong> Clean exclusively with warm water and a stone-specific neutral soap. Never use bathroom descalers, abrasive powders, or scouring sponges.
                        </p>
                    </div>
                </section>

                <!-- RATTAN & CANE -->
                <section id="care-rattan" class="scroll-mt-28 space-y-5 pt-8 border-t border-[#C9C0B3]">
                    <div class="flex items-center gap-2">
                        <span class="w-2 h-2 rounded-full bg-[#8A5A44]"></span>
                        <span class="text-xs uppercase tracking-wider text-[#8A5A44] font-semibold">Chapter 5</span>
                    </div>
                    <h2 class="font-serif text-2xl sm:text-3xl font-normal text-[#362F2A] tracking-tight">Natural Woven Rattan &amp; Cane</h2>
                    <p>
                        Our occasional lounge chairs and bed headboards incorporate handwoven natural rattan peel. Rattan is remarkably tensile and flexible, yet thrives best when shielded from extreme dryness.
                    </p>
                    <div class="p-6 rounded-2xl bg-[#F6F3EE] border border-[#C9C0B3] shadow-xs text-xs text-[#6E6359] space-y-3">
                        <p>
                            To prevent natural cane fibers from becoming brittle in high-air-conditioned homes, lightly mist the underside of the cane weaving once every few months with filtered water from a spray bottle, then allow it to dry naturally. This restores natural elasticity and prevents sagging.
                        </p>
                    </div>
                </section>

                <!-- MONSOON & TROPICAL CLIMATE -->
                <section id="care-monsoon" class="scroll-mt-28 space-y-5 pt-8 border-t border-[#C9C0B3]">
                    <div class="flex items-center gap-2">
                        <span class="w-2 h-2 rounded-full bg-[#8A5A44]"></span>
                        <span class="text-xs uppercase tracking-wider text-[#8A5A44] font-semibold">Chapter 6</span>
                    </div>
                    <h2 class="font-serif text-2xl sm:text-3xl font-normal text-[#362F2A] tracking-tight">Tropical Climate &amp; Monsoon Care</h2>
                    <p>
                        Myanmar's seasonal shifts—from hot, dry summers to torrential monsoons—require conscientious ventilation. Solid wood is hygroscopic, expanding during high humidity and contracting in dry months.
                    </p>

                    <div class="bg-[#F6F3EE] rounded-3xl p-6 sm:p-8 border border-[#C9C0B3] shadow-xs space-y-4 text-xs text-[#6E6359]">
                        <div class="flex items-start gap-3">
                            <i class="ri-temp-hot-line text-lg text-[#8A5A44] flex-shrink-0 mt-0.5"></i>
                            <div>
                                <strong class="text-[#362F2A] block mb-0.5">Airflow &amp; Monsoon Ventilation</strong>
                                <p class="text-[#6E6359]">During the heavy rains from June to October, maintain gentle cross-ventilation or run a dehumidifier to keep indoor humidity under 65%. Avoid leaving wooden tables pushed flush against exterior walls that conduct dampness.</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-3 pt-3 border-t border-[#C9C0B3]/80">
                            <i class="ri-sun-line text-lg text-[#8A5A44] flex-shrink-0 mt-0.5"></i>
                            <div>
                                <strong class="text-[#362F2A] block mb-0.5">Dry Season Acclimatization</strong>
                                <p class="text-[#6E6359]">During the arid winter and dry season months (December to April), a localized application of our botanical wood balm prevents timber from losing its natural moisture reserve.</p>
                            </div>
                        </div>
                    </div>
                </section>

            </article>

        </div>
    </main>

    <?php include "components/footer.php"; ?>
    <script src="js/script.js"></script>
</body>

</html>