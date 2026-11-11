<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Our Atelier | FurnishMe</title>
    <link rel="icon" type="image/x-icon" href="images/favicon.ico?v=2">
    <link rel="icon" type="image/png" sizes="32x32" href="images/favicon-32x32.png?v=2">
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon-16x16.png?v=2">
    <link rel="apple-touch-icon" sizes="180x180" href="images/apple-touch-icon.png?v=2">
    <?php include "components/css.php"; ?>
</head>

<body class="bg-[#F5EFE6] text-stone-900 font-sans selection:bg-amber-800 selection:text-white">
    <?php include "components/header.php"; ?>
    <?php include "components/navbar.php"; ?>

    <!-- PAGE HEADER BREADCRUMB -->
    <header class="bg-[#EDE5D8] border-b border-[#E2D8C9] py-12 lg:py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <nav class="flex items-center gap-2 text-xs font-medium text-stone-500 mb-3" aria-label="Breadcrumb">
                <a href="index.php" class="hover:text-stone-900 transition-colors">Home</a>
                <span class="text-stone-400">/</span>
                <span class="text-stone-900">About Our Atelier</span>
            </nav>
            <div class="max-w-3xl">
                <h1 class="font-serif text-3xl sm:text-4xl lg:text-5xl font-normal tracking-tight text-stone-900">
                    Quiet Forms, Honest Timber, Lasting Companions.
                </h1>
                <p class="text-sm sm:text-base text-stone-600 mt-3 leading-relaxed">
                    FurnishMe was founded in 2021 as a quiet reaction to the ephemeral speed of disposable design. We engineer living pieces that invite touch, stillness, and human warmth.
                </p>
            </div>
        </div>
    </header>

    <!-- NARRATIVE & IMAGERY EDITORIAL -->
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 lg:py-24">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16 items-center">
            <!-- Left Editorial Image Collage -->
            <div class="lg:col-span-6 space-y-6">
                <div class="relative rounded-3xl overflow-hidden aspect-[4/3] bg-[#EDE5D8] shadow-xs border border-[#E2D8C9]">
                    <img src="images/about-showroom.jpg" alt="FurnishMe Showroom Atmosphere" class="w-full h-full object-cover" loading="lazy">
                    <div class="absolute inset-0 bg-stone-950/10"></div>
                </div>
                <div class="grid grid-cols-2 gap-4 sm:gap-6">
                    <div class="rounded-2xl overflow-hidden aspect-square bg-[#EFE8DD] shadow-xs border border-[#E2D8C9]">
                        <img src="images/banner-workspace.jpg" alt="Design Atelier & Workspace" class="w-full h-full object-cover" loading="lazy">
                    </div>
                    <div class="rounded-2xl overflow-hidden aspect-square bg-[#EFE8DD] shadow-xs border border-[#E2D8C9]">
                        <img src="images/banner-dining-room.jpg" alt="Craft Workshop" class="w-full h-full object-cover" loading="lazy">
                    </div>
                </div>
            </div>

            <!-- Right Narrative Column -->
            <div class="lg:col-span-6 space-y-6">
                <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-[#EAD6B8]/50 border border-[#CEBFAC] text-xs font-semibold uppercase tracking-wider text-[#7C4E26]">
                    <i class="ri-compass-3-line"></i>
                    <span>Philosophy &amp; Roots</span>
                </div>
                <h2 class="font-serif text-3xl sm:text-4xl font-normal text-stone-900 tracking-tight leading-tight">
                    Where Japanese Restraint Meets Nordic Warmth.
                </h2>
                <div class="space-y-4 text-stone-600 text-sm sm:text-base leading-relaxed">
                    <p>
                        At the heart of FurnishMe is the reverence for organic materials. We view wood grain not as an arbitrary pattern, but as the biographical recording of a tree's decades in wind, rain, and sun.
                    </p>
                    <p>
                        Our design language marries the minimal silhouettes of Danish modernism with the Japanese philosophy of <em>shibui</em>—subtle, unobtrusive beauty that reveals itself gradually through tactile engagement over years of everyday rituals.
                    </p>
                    <p>
                        Every piece in our collection is produced in limited studio batches by dedicated master joiners who respect traditional mortise-and-tenon construction, ensuring structural integrity without excess synthetic adhesives or hidden hardware.
                    </p>
                </div>

                <div class="pt-4 grid grid-cols-3 gap-6 border-t border-[#E2D8C9] text-center">
                    <div>
                        <span class="block font-serif text-2xl sm:text-3xl font-semibold text-stone-900">100%</span>
                        <span class="text-xs text-stone-500 mt-1 block">Certified Hardwoods</span>
                    </div>
                    <div>
                        <span class="block font-serif text-2xl sm:text-3xl font-semibold text-stone-900">5 Yrs</span>
                        <span class="text-xs text-stone-500 mt-1 block">Frame Warranty</span>
                    </div>
                    <div>
                        <span class="block font-serif text-2xl sm:text-3xl font-semibold text-stone-900">Zero</span>
                        <span class="text-xs text-stone-500 mt-1 block">Toxic Finishes</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CORE PILLARS SECTION -->
    <section class="bg-[#EDE5D8]/45 border-y border-[#E2D8C9] py-16 lg:py-24">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-2xl mx-auto mb-16">
                <span class="text-xs uppercase tracking-[0.25em] text-[#7C4E26] font-semibold block mb-2">Guiding Standards</span>
                <h2 class="font-serif text-3xl sm:text-4xl font-normal text-stone-900 tracking-tight">Our Three Foundational Pillars</h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Pillar 1 -->
                <div class="bg-[#FCFAF7] rounded-3xl border border-[#E2D8C9] p-8 shadow-xs flex flex-col justify-between hover:shadow-xl hover:border-[#B58245] transition-all">
                    <div class="space-y-4">
                        <div class="w-12 h-12 rounded-xl bg-[#F4EFE8] text-[#7C4E26] flex items-center justify-center text-2xl">
                            <i class="ri-plant-line"></i>
                        </div>
                        <h3 class="font-serif text-xl font-semibold text-stone-900">Sustainable Sourcing</h3>
                        <p class="text-sm text-stone-600 leading-relaxed">
                            We collaborate strictly with certified community forestry partners who practice low-impact selective felling, guaranteeing that two saplings are nurtured for every tree harvested.
                        </p>
                    </div>
                    <span class="text-xs font-semibold text-[#7C4E26] mt-6 uppercase tracking-wider block">Pillar I</span>
                </div>

                <!-- Pillar 2 -->
                <div class="bg-[#FCFAF7] rounded-3xl border border-[#E2D8C9] p-8 shadow-xs flex flex-col justify-between hover:shadow-xl hover:border-[#B58245] transition-all">
                    <div class="space-y-4">
                        <div class="w-12 h-12 rounded-xl bg-[#F4EFE8] text-[#7C4E26] flex items-center justify-center text-2xl">
                            <i class="ri-hammer-line"></i>
                        </div>
                        <h3 class="font-serif text-xl font-semibold text-stone-900">Tactile Craft</h3>
                        <p class="text-sm text-stone-600 leading-relaxed">
                            We celebrate human touch. From hand-burnished oil wax treatments to custom loom linen upholstery, our textures stimulate the senses and invite everyday intimacy.
                        </p>
                    </div>
                    <span class="text-xs font-semibold text-[#7C4E26] mt-6 uppercase tracking-wider block">Pillar II</span>
                </div>

                <!-- Pillar 3 -->
                <div class="bg-[#FCFAF7] rounded-3xl border border-[#E2D8C9] p-8 shadow-xs flex flex-col justify-between hover:shadow-xl hover:border-[#B58245] transition-all">
                    <div class="space-y-4">
                        <div class="w-12 h-12 rounded-xl bg-[#F4EFE8] text-[#7C4E26] flex items-center justify-center text-2xl">
                            <i class="ri-time-line"></i>
                        </div>
                        <h3 class="font-serif text-xl font-semibold text-stone-900">Timeless Longevity</h3>
                        <p class="text-sm text-stone-600 leading-relaxed">
                            We reject trends engineered for obsolescence. Every silhouette is balanced with architectural geometry that feels contemporary today and serene fifty years from now.
                        </p>
                    </div>
                    <span class="text-xs font-semibold text-[#7C4E26] mt-6 uppercase tracking-wider block">Pillar III</span>
                </div>
            </div>
        </div>
    </section>

    <!-- ATELIER SERVICES -->
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 lg:py-24">
        <div class="text-center max-w-2xl mx-auto mb-16">
            <span class="text-xs uppercase tracking-[0.25em] text-[#7C4E26] font-semibold block mb-2">Our Capabilities</span>
            <h2 class="font-serif text-3xl sm:text-4xl font-normal text-stone-900 tracking-tight">Services &amp; Custom Commissions</h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Service 1 -->
            <div class="bg-[#FCFAF7] rounded-3xl border border-[#E2D8C9] p-8 text-center flex flex-col items-center shadow-xs hover:shadow-xl hover:border-[#B58245] transition-all">
                <div class="w-16 h-16 rounded-2xl bg-[#F4EFE8] flex items-center justify-center text-[#7C4E26] text-3xl mb-6">
                    <i class="ri-store-3-line"></i>
                </div>
                <h3 class="font-serif text-lg font-semibold text-stone-900 mb-2">Curated Collections</h3>
                <p class="text-sm text-stone-600 leading-relaxed">
                    Direct access to our limited-production editions, ready for immediate delivery with white-glove placement across Yangon and surrounding regions.
                </p>
            </div>

            <!-- Service 2 -->
            <div class="bg-[#FCFAF7] rounded-3xl border border-[#E2D8C9] p-8 text-center flex flex-col items-center shadow-xs hover:shadow-xl hover:border-[#B58245] transition-all">
                <div class="w-16 h-16 rounded-2xl bg-[#F4EFE8] flex items-center justify-center text-[#7C4E26] text-3xl mb-6">
                    <i class="ri-pencil-ruler-2-line"></i>
                </div>
                <h3 class="font-serif text-lg font-semibold text-stone-900 mb-2">Bespoke Architectural Design</h3>
                <p class="text-sm text-stone-600 leading-relaxed">
                    Custom scale specifications, specialized wood staining, and tailored textile curation for residential renovations and boutique hospitality spaces.
                </p>
            </div>

            <!-- Service 3 -->
            <div class="bg-[#FCFAF7] rounded-3xl border border-[#E2D8C9] p-8 text-center flex flex-col items-center shadow-xs hover:shadow-xl hover:border-[#B58245] transition-all">
                <div class="w-16 h-16 rounded-2xl bg-[#F4EFE8] flex items-center justify-center text-[#7C4E26] text-3xl mb-6">
                    <i class="ri-customer-service-2-line"></i>
                </div>
                <h3 class="font-serif text-lg font-semibold text-stone-900 mb-2">Dedicated Concierge &amp; Care</h3>
                <p class="text-sm text-stone-600 leading-relaxed">
                    Lifetime restoration advisory, seasonal wood conditioning kits, and personalized design consultation six days a week in our showroom.
                </p>
            </div>
        </div>

        <!-- Banner CTA -->
        <div class="mt-16 rounded-3xl bg-[#181512] text-[#EDE6DC] border border-[#2D2620] p-8 sm:p-12 lg:p-16 flex flex-col md:flex-row items-center justify-between gap-8 shadow-xl">
            <div class="max-w-xl space-y-3">
                <span class="text-xs uppercase tracking-widest text-[#CBA57F] font-semibold">Private Viewing</span>
                <h3 class="font-serif text-2xl sm:text-3xl font-normal text-[#FAF6F0]">Experience the Textures in Person</h3>
                <p class="text-sm text-[#A89C8D] leading-relaxed">
                    Schedule an appointment with one of our spatial curators at the Yankin Township showroom.
                </p>
            </div>
            <a href="contact.php" class="px-8 py-4 rounded-xl bg-[#CBA57F] hover:bg-[#B58245] text-[#14120F] font-semibold text-sm transition-colors whitespace-nowrap shadow-md">
                Book a Consultation
            </a>
        </div>
    </section>

    <?php include "components/footer.php"; ?>
    <?php include "components/js.php"; ?>
</body>

</html>
