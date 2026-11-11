<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Our Atelier | FurnishMe</title>
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
                <span class="text-zinc-900">About Our Atelier</span>
            </nav>
            <div class="max-w-3xl">
                <h1 class="font-serif text-3xl sm:text-4xl lg:text-5xl font-normal tracking-tight text-zinc-900">
                    Quiet Forms, Honest Timber, Lasting Companions.
                </h1>
                <p class="text-sm sm:text-base text-zinc-600 mt-3 leading-relaxed">
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
                <div class="relative rounded-3xl overflow-hidden aspect-[4/3] bg-zinc-200 shadow-sm">
                    <img src="images/about-showroom.jpg" alt="FurnishMe Showroom Atmosphere" class="w-full h-full object-cover" loading="lazy">
                    <div class="absolute inset-0 bg-zinc-950/10"></div>
                </div>
                <div class="grid grid-cols-2 gap-4 sm:gap-6">
                    <div class="rounded-2xl overflow-hidden aspect-square bg-zinc-100 shadow-xs">
                        <img src="images/about-studio.jpg" alt="Showroom View" class="w-full h-full object-cover" loading="lazy">
                    </div>
                    <div class="rounded-2xl overflow-hidden aspect-square bg-zinc-100 shadow-xs">
                        <img src="images/banner-dining-room.jpg" alt="Craft Workshop" class="w-full h-full object-cover" loading="lazy">
                    </div>
                </div>
            </div>

            <!-- Right Narrative Column -->
            <div class="lg:col-span-6 space-y-6">
                <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-zinc-200/70 text-xs font-semibold uppercase tracking-wider text-zinc-700">
                    <i class="ri-compass-3-line"></i>
                    <span>Philosophy &amp; Roots</span>
                </div>
                <h2 class="font-serif text-3xl sm:text-4xl font-normal text-zinc-900 tracking-tight leading-tight">
                    Where Japanese Restraint Meets Nordic Warmth.
                </h2>
                <div class="space-y-4 text-zinc-600 text-sm sm:text-base leading-relaxed">
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

                <div class="pt-4 grid grid-cols-3 gap-6 border-t border-zinc-200 text-center">
                    <div>
                        <span class="block font-serif text-2xl sm:text-3xl font-semibold text-zinc-900">100%</span>
                        <span class="text-xs text-zinc-500 mt-1 block">Certified Hardwoods</span>
                    </div>
                    <div>
                        <span class="block font-serif text-2xl sm:text-3xl font-semibold text-zinc-900">5 Yrs</span>
                        <span class="text-xs text-zinc-500 mt-1 block">Frame Warranty</span>
                    </div>
                    <div>
                        <span class="block font-serif text-2xl sm:text-3xl font-semibold text-zinc-900">Zero</span>
                        <span class="text-xs text-zinc-500 mt-1 block">Toxic Finishes</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CORE PILLARS SECTION -->
    <section class="bg-zinc-100/70 border-y border-zinc-200 py-16 lg:py-24">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-2xl mx-auto mb-16">
                <span class="text-xs uppercase tracking-[0.25em] text-zinc-500 font-semibold block mb-2">Guiding Standards</span>
                <h2 class="font-serif text-3xl sm:text-4xl font-normal text-zinc-900 tracking-tight">Our Three Foundational Pillars</h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Pillar 1 -->
                <div class="bg-white rounded-2xl border border-zinc-200 p-8 shadow-xs flex flex-col justify-between">
                    <div class="space-y-4">
                        <div class="w-12 h-12 rounded-xl bg-zinc-100 text-zinc-900 flex items-center justify-center text-2xl">
                            <i class="ri-plant-line"></i>
                        </div>
                        <h3 class="font-serif text-xl font-semibold text-zinc-900">Sustainable Sourcing</h3>
                        <p class="text-sm text-zinc-600 leading-relaxed">
                            We collaborate strictly with certified community forestry partners who practice low-impact selective felling, guaranteeing that two saplings are nurtured for every tree harvested.
                        </p>
                    </div>
                    <span class="text-xs font-semibold text-zinc-400 mt-6 uppercase tracking-wider block">Pillar I</span>
                </div>

                <!-- Pillar 2 -->
                <div class="bg-white rounded-2xl border border-zinc-200 p-8 shadow-xs flex flex-col justify-between">
                    <div class="space-y-4">
                        <div class="w-12 h-12 rounded-xl bg-zinc-100 text-zinc-900 flex items-center justify-center text-2xl">
                            <i class="ri-hammer-line"></i>
                        </div>
                        <h3 class="font-serif text-xl font-semibold text-zinc-900">Tactile Craft</h3>
                        <p class="text-sm text-zinc-600 leading-relaxed">
                            We celebrate human touch. From hand-burnished oil wax treatments to custom loom linen upholstery, our textures stimulate the senses and invite everyday intimacy.
                        </p>
                    </div>
                    <span class="text-xs font-semibold text-zinc-400 mt-6 uppercase tracking-wider block">Pillar II</span>
                </div>

                <!-- Pillar 3 -->
                <div class="bg-white rounded-2xl border border-zinc-200 p-8 shadow-xs flex flex-col justify-between">
                    <div class="space-y-4">
                        <div class="w-12 h-12 rounded-xl bg-zinc-100 text-zinc-900 flex items-center justify-center text-2xl">
                            <i class="ri-time-line"></i>
                        </div>
                        <h3 class="font-serif text-xl font-semibold text-zinc-900">Timeless Longevity</h3>
                        <p class="text-sm text-zinc-600 leading-relaxed">
                            We reject trends engineered for obsolescence. Every silhouette is balanced with architectural geometry that feels contemporary today and serene fifty years from now.
                        </p>
                    </div>
                    <span class="text-xs font-semibold text-zinc-400 mt-6 uppercase tracking-wider block">Pillar III</span>
                </div>
            </div>
        </div>
    </section>

    <!-- ATELIER SERVICES -->
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 lg:py-24">
        <div class="text-center max-w-2xl mx-auto mb-16">
            <span class="text-xs uppercase tracking-[0.25em] text-zinc-500 font-semibold block mb-2">Our Capabilities</span>
            <h2 class="font-serif text-3xl sm:text-4xl font-normal text-zinc-900 tracking-tight">Services &amp; Custom Commissions</h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Service 1 -->
            <div class="bg-white rounded-2xl border border-zinc-200 p-8 text-center flex flex-col items-center shadow-xs hover:shadow-md transition-shadow">
                <div class="w-16 h-16 rounded-2xl bg-zinc-100 flex items-center justify-center text-zinc-800 text-3xl mb-6">
                    <i class="ri-store-3-line"></i>
                </div>
                <h3 class="font-serif text-lg font-semibold text-zinc-900 mb-2">Curated Collections</h3>
                <p class="text-sm text-zinc-600 leading-relaxed">
                    Direct access to our limited-production editions, ready for immediate delivery with white-glove placement across Yangon and surrounding regions.
                </p>
            </div>

            <!-- Service 2 -->
            <div class="bg-white rounded-2xl border border-zinc-200 p-8 text-center flex flex-col items-center shadow-xs hover:shadow-md transition-shadow">
                <div class="w-16 h-16 rounded-2xl bg-zinc-100 flex items-center justify-center text-zinc-800 text-3xl mb-6">
                    <i class="ri-pencil-ruler-2-line"></i>
                </div>
                <h3 class="font-serif text-lg font-semibold text-zinc-900 mb-2">Bespoke Architectural Design</h3>
                <p class="text-sm text-zinc-600 leading-relaxed">
                    Custom scale specifications, specialized wood staining, and tailored textile curation for residential renovations and boutique hospitality spaces.
                </p>
            </div>

            <!-- Service 3 -->
            <div class="bg-white rounded-2xl border border-zinc-200 p-8 text-center flex flex-col items-center shadow-xs hover:shadow-md transition-shadow">
                <div class="w-16 h-16 rounded-2xl bg-zinc-100 flex items-center justify-center text-zinc-800 text-3xl mb-6">
                    <i class="ri-customer-service-2-line"></i>
                </div>
                <h3 class="font-serif text-lg font-semibold text-zinc-900 mb-2">Dedicated Concierge &amp; Care</h3>
                <p class="text-sm text-zinc-600 leading-relaxed">
                    Lifetime restoration advisory, seasonal wood conditioning kits, and personalized design consultation six days a week in our showroom.
                </p>
            </div>
        </div>

        <!-- Banner CTA -->
        <div class="mt-16 rounded-3xl bg-zinc-900 text-zinc-100 p-8 sm:p-12 lg:p-16 flex flex-col md:flex-row items-center justify-between gap-8">
            <div class="max-w-xl space-y-3">
                <span class="text-xs uppercase tracking-widest text-zinc-400 font-semibold">Private Viewing</span>
                <h3 class="font-serif text-2xl sm:text-3xl font-normal text-white">Experience the Textures in Person</h3>
                <p class="text-sm text-zinc-400 leading-relaxed">
                    Schedule an appointment with one of our spatial curators at the Bahan Township showroom.
                </p>
            </div>
            <a href="contact.php" class="px-8 py-4 rounded-xl bg-white hover:bg-zinc-100 text-zinc-950 font-medium text-sm transition-colors whitespace-nowrap shadow-sm">
                Book a Consultation
            </a>
        </div>
    </section>

    <?php include "components/footer.php"; ?>
    <?php include "components/js.php"; ?>
</body>

</html>
