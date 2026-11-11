<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- [PHP_BACKEND_HOOK: Dynamic page title with product name (e.g. $product['name'] . ' | FurnishMe Atelier')] -->
    <title>Nordic Solid Wood Armchair | FurnishMe Atelier</title>
    <link rel="icon" type="image/x-icon" href="images/favicon.ico?v=2">
    <link rel="icon" type="image/png" sizes="32x32" href="images/favicon-32x32.png?v=2">
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon-16x16.png?v=2">
    <link rel="apple-touch-icon" sizes="180x180" href="images/apple-touch-icon.png?v=2">
    <?php include "components/css.php"; ?>
</head>

<body class="bg-[#0D0B09] text-[#EDE4D7] font-sans selection:bg-[#C5A059] selection:text-[#0D0B09]">
    <?php include "components/header.php"; ?>
    <?php include "components/navbar.php"; ?>

    <!-- BREADCRUMB NAVIGATION -->
    <div class="border-b border-[#221C16] bg-[#110E0C] py-4">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <nav class="flex items-center gap-2 text-xs font-medium text-[#8C7D6B]" aria-label="Breadcrumb">
                <a href="index.php" class="hover:text-[#FAF6EE] transition-colors">Home</a>
                <span class="text-[#453A30]">/</span>
                <a href="shop.php" class="hover:text-[#FAF6EE] transition-colors">Shop</a>
                <span class="text-[#453A30]">/</span>
                <!-- [PHP_BACKEND_HOOK: Dynamic category & product name breadcrumb] -->
                <a href="shop.php?category=chairs" class="hover:text-[#FAF6EE] transition-colors">Chairs &amp; Seating</a>
                <span class="text-[#453A30]">/</span>
                <span class="text-[#C5A059] font-semibold">Nordic Solid Wood Armchair</span>
            </nav>
        </div>
    </div>

    <!-- MAIN PRODUCT SHOWCASE SPLIT LAYOUT -->
    <!-- [PHP_BACKEND_HOOK: Single product detail query (SELECT * FROM products WHERE id = :id)] -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 lg:py-16">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16 items-start">
            
            <!-- Left Column: Gallery & Showcase -->
            <div class="lg:col-span-7 space-y-6">
                <!-- Large Primary Image Container -->
                <div class="relative w-full aspect-[4/3] bg-[#0D0B09] rounded-3xl border border-[#2A231C] overflow-hidden shadow-2xl flex items-center justify-center">
                    <span class="absolute top-5 left-5 z-10 inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full text-xs font-medium bg-[#132A1C] text-[#52D288] border border-[#1E4D32] shadow-md">
                        <span class="w-1.5 h-1.5 rounded-full bg-[#52D288]"></span>
                        <span>In Stock &amp; Ready for White-Glove Delivery</span>
                    </span>
                    <!-- [PHP_BACKEND_HOOK: Dynamic product main image: $product['image']] -->
                    <img id="main-product-img" src="images/chair-1.jpg" alt="Nordic Solid Wood Armchair" class="w-full h-full object-cover transition-all duration-300" loading="eager">
                </div>

                <!-- Gallery Thumbnails (Atelier Perspectives) -->
                <div class="grid grid-cols-4 gap-4" id="gallery-thumbs">
                    <button type="button" data-src="images/chair-1.jpg" class="thumb-btn aspect-[4/3] rounded-2xl bg-[#0D0B09] border-2 border-[#C5A059] overflow-hidden shadow-sm transition-all">
                        <img src="images/chair-1.jpg" alt="Front angle" class="w-full h-full object-cover pointer-events-none">
                    </button>
                    <button type="button" data-src="images/chair-2.jpg" class="thumb-btn aspect-[4/3] rounded-2xl bg-[#0D0B09] border border-[#2A231C] hover:border-[#C5A059] overflow-hidden transition-all">
                        <img src="images/chair-2.jpg" alt="Curved profile angle" class="w-full h-full object-cover pointer-events-none">
                    </button>
                    <button type="button" data-src="images/chair-3.jpg" class="thumb-btn aspect-[4/3] rounded-2xl bg-[#0D0B09] border border-[#2A231C] hover:border-[#C5A059] overflow-hidden transition-all">
                        <img src="images/chair-3.jpg" alt="Joinery craft detail" class="w-full h-full object-cover pointer-events-none">
                    </button>
                    <button type="button" data-src="images/banner-living-room.jpg" class="thumb-btn aspect-[4/3] rounded-2xl bg-[#0D0B09] border border-[#2A231C] hover:border-[#C5A059] overflow-hidden transition-all">
                        <img src="images/banner-living-room.jpg" alt="Atmospheric room view" class="w-full h-full object-cover pointer-events-none">
                    </button>
                </div>

                <!-- Atelier Sustainability Stamp -->
                <div class="p-6 rounded-3xl bg-[#161310] border border-[#2A231C] flex items-center gap-4 shadow-sm">
                    <div class="w-12 h-12 rounded-2xl bg-[#221C16] flex items-center justify-center text-[#C5A059] text-2xl flex-shrink-0 shadow-inner border border-[#3E3224]">
                        <i class="ri-leaf-line"></i>
                    </div>
                    <div>
                        <h4 class="font-serif text-sm font-semibold text-[#FAF6EE]">Certified Heritage Harvest</h4>
                        <p class="text-xs text-[#8C7D6B] mt-0.5 leading-relaxed">
                            Crafted from legally sourced timber certified under regional reforestation agreements. Coated exclusively with food-safe bio-based hardwax oils.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Right Column: Sticky Product Details & Purchase Controls -->
            <div class="lg:col-span-5 lg:sticky lg:top-28 space-y-8">
                <div>
                    <div class="flex items-center justify-between mb-2">
                        <span class="text-xs uppercase tracking-[0.2em] text-[#C5A059] font-semibold">Atelier Seating Collection</span>
                        <span class="text-xs text-[#665849]">SKU: FM-CH-0104</span>
                    </div>
                    <!-- [PHP_BACKEND_HOOK: Dynamic product name] -->
                    <h1 class="font-serif text-3xl sm:text-4xl font-normal tracking-tight text-[#FAF6EE]">
                        Nordic Solid Wood Armchair
                    </h1>
                    <!-- [PHP_BACKEND_HOOK: Dynamic product price] -->
                    <div class="mt-4 flex items-baseline gap-3">
                        <span class="text-2xl sm:text-3xl font-semibold text-[#FAF6EE]">420,000 MMK</span>
                        <span class="text-xs text-[#8C7D6B] font-normal">Taxes &amp; 5-year structural warranty included</span>
                    </div>
                </div>

                <!-- Tactile Editorial Description -->
                <!-- [PHP_BACKEND_HOOK: Dynamic product description] -->
                <div class="prose prose-invert text-sm text-[#D6C8B4] leading-relaxed border-t border-b border-[#221C16] py-6 space-y-3">
                    <p>
                        The Nordic Solid Wood Armchair merges Scandinavian ergonomic posture with the organic tranquility of Japanese joinery. Featuring sculpted curved armrests and an expansive hand-finished frame that contours effortlessly to the body.
                    </p>
                    <p>
                        Finished with non-toxic, matte plant oils that protect the wood while allowing the natural breath and silky tactile warmth of the grain to be felt.
                    </p>
                </div>

                <!-- Purchase Form Handler -->
                <!-- [PHP_BACKEND_HOOK: Form submission handler target for Add-to-Cart (POST to cart_process.php or session cart array)] -->
                <form action="#" method="POST" data-toast-success="Added Nordic Armchair to your cart." class="space-y-6">
                    <input type="hidden" name="product_id" value="1">

                    <!-- Stock Status & Quantity Stepper -->
                    <div class="space-y-2">
                        <div class="flex items-center justify-between text-xs">
                            <span class="font-medium text-[#FAF6EE]">Quantity</span>
                            <span class="text-[#52D288] font-medium flex items-center gap-1">
                                <i class="ri-checkbox-circle-fill"></i> 25 pieces in Yangon warehouse
                            </span>
                        </div>

                        <div class="flex items-center gap-4">
                            <!-- Stepper Container -->
                            <div class="inline-flex items-center border border-[#3A3026] rounded-xl bg-[#161310] shadow-sm" data-stepper>
                                <button type="button" data-stepper-decrease aria-label="Decrease quantity" class="w-11 h-12 flex items-center justify-center text-[#D6C8B4] hover:text-[#FAF6EE] hover:bg-[#1D1914] rounded-l-xl transition-colors">
                                    <i class="ri-subtract-line text-base"></i>
                                </button>
                                <input type="number" name="quantity" min="1" max="25" value="1" readonly class="w-14 text-center text-sm font-semibold text-[#FAF6EE] bg-transparent focus:outline-none">
                                <button type="button" data-stepper-increase aria-label="Increase quantity" class="w-11 h-12 flex items-center justify-center text-[#D6C8B4] hover:text-[#FAF6EE] hover:bg-[#1D1914] rounded-r-xl transition-colors">
                                    <i class="ri-add-line text-base"></i>
                                </button>
                            </div>

                            <!-- Add to Cart CTA -->
                            <button type="submit" class="flex-1 h-12 rounded-xl bg-[#C5A059] hover:bg-[#D4AF37] text-[#0D0B09] font-semibold text-sm transition-all shadow-md hover:shadow-lg flex items-center justify-center gap-2">
                                <i class="ri-shopping-bag-3-line text-lg"></i>
                                <span>Add to Atelier Cart</span>
                            </button>
                        </div>
                    </div>

                    <!-- Secondary Concierge Action -->
                    <div class="flex items-center gap-3">
                        <a href="contact.php?inquiry=FM-CH-0104" class="w-full h-11 rounded-xl border border-[#2A231C] bg-[#161310] hover:bg-[#1D1914] text-[#D6C8B4] hover:text-[#FAF6EE] text-xs font-medium transition-colors flex items-center justify-center gap-2">
                            <i class="ri-customer-service-2-line text-base text-[#C5A059]"></i>
                            <span>Inquire via Showroom Concierge</span>
                        </a>
                    </div>
                </form>

                <!-- Architectural Specifications Grid -->
                <div class="bg-[#161310] rounded-3xl border border-[#2A231C] p-6 shadow-sm space-y-3">
                    <h4 class="text-xs uppercase tracking-wider text-[#C5A059] font-semibold mb-2">Specifications</h4>
                    <div class="grid grid-cols-2 gap-y-2.5 gap-x-4 text-xs">
                        <span class="text-[#8C7D6B]">Materials:</span>
                        <span class="text-[#FAF6EE] font-medium">Solid American Walnut, Linen Weave</span>
                        <span class="text-[#8C7D6B]">Dimensions:</span>
                        <span class="text-[#FAF6EE] font-medium">W 78 &times; D 84 &times; H 76 cm</span>
                        <span class="text-[#8C7D6B]">Seat Height:</span>
                        <span class="text-[#FAF6EE] font-medium">42 cm</span>
                        <span class="text-[#8C7D6B]">Net Weight:</span>
                        <span class="text-[#FAF6EE] font-medium">14.2 kg</span>
                        <span class="text-[#8C7D6B]">Assembly:</span>
                        <span class="text-[#FAF6EE] font-medium">Fully Assembled Piece</span>
                    </div>
                </div>

                <!-- Delivery & Care Information Accordion -->
                <div class="border-t border-[#221C16] pt-4 space-y-3 text-xs text-[#8C7D6B]">
                    <div class="flex items-start gap-3">
                        <i class="ri-truck-line text-base text-[#C5A059] flex-shrink-0 mt-0.5"></i>
                        <div>
                            <strong class="text-[#FAF6EE] block">Complimentary White-Glove Yangon Delivery</strong>
                            Unpacking, placement in your room of choice, and debris removal included.
                        </div>
                    </div>
                    <div class="flex items-start gap-3">
                        <i class="ri-shield-check-line text-base text-[#C5A059] flex-shrink-0 mt-0.5"></i>
                        <div>
                            <strong class="text-[#FAF6EE] block">5-Year Structural Frame Guarantee</strong>
                            Guaranteed against timber warping or joinery separation under residential use.
                        </div>
                    </div>
                    <div class="flex items-start gap-3">
                        <i class="ri-sparkling-line text-base text-[#C5A059] flex-shrink-0 mt-0.5"></i>
                        <div>
                            <strong class="text-[#FAF6EE] block">Artisan Stewardship &amp; Maintenance</strong>
                            Learn how to nurture natural timbers and fine fabrics in our <a href="care.php" class="text-[#C5A059] underline font-medium hover:text-[#FAF6EE]">Care Guide</a>.
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </main>

    <!-- RELATED PIECES SECTION -->
    <section class="border-t border-[#221C16] bg-[#110E0C] py-16 lg:py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-end justify-between mb-10">
                <div>
                    <span class="text-xs uppercase tracking-[0.25em] text-[#C5A059] font-semibold block mb-1">Harmonious Pairings</span>
                    <h2 class="font-serif text-2xl sm:text-3xl font-normal text-[#FAF6EE]">Complementary Pieces</h2>
                </div>
                <a href="shop.php" class="text-xs font-semibold text-[#FAF6EE] hover:text-[#C5A059] flex items-center gap-1">
                    <span>Explore All</span>
                    <i class="ri-arrow-right-line"></i>
                </a>
            </div>

            <!-- [PHP_BACKEND_HOOK: Related products query (WHERE category = :cat AND id != :current_id LIMIT 4)] -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Related 1 -->
                <div class="group bg-[#161310] rounded-3xl border border-[#2A231C] overflow-hidden transition-all duration-300 hover:shadow-2xl hover:border-[#C5A059] flex flex-col justify-between">
                    <div class="relative w-full aspect-[4/3] bg-[#0D0B09] border-b border-[#221C16] overflow-hidden flex items-center justify-center">
                        <a href="product_detail.php?id=2" class="w-full h-full block">
                            <img src="images/chair-2.jpg" alt="Curved Lounge Armchair" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" loading="lazy">
                        </a>
                    </div>
                    <div class="p-4">
                        <h4 class="font-serif text-sm font-medium text-[#FAF6EE] group-hover:text-[#C5A059] transition-colors">
                            <a href="product_detail.php?id=2">Curved Lounge Armchair</a>
                        </h4>
                        <div class="pt-2 flex items-center justify-between text-xs">
                            <span class="font-semibold text-[#FAF6EE]">580,000 MMK</span>
                            <span class="text-[#8C7D6B]">In stock</span>
                        </div>
                    </div>
                </div>

                <!-- Related 2 -->
                <div class="group bg-[#161310] rounded-3xl border border-[#2A231C] overflow-hidden transition-all duration-300 hover:shadow-2xl hover:border-[#C5A059] flex flex-col justify-between">
                    <div class="relative w-full aspect-[4/3] bg-[#0D0B09] border-b border-[#221C16] overflow-hidden flex items-center justify-center">
                        <a href="product_detail.php?id=3" class="w-full h-full block">
                            <img src="images/sofa-1.jpg" alt="Bouclé Modular Sofa" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" loading="lazy">
                        </a>
                    </div>
                    <div class="p-4">
                        <h4 class="font-serif text-sm font-medium text-[#FAF6EE] group-hover:text-[#C5A059] transition-colors">
                            <a href="product_detail.php?id=3">Bouclé Modular Sofa</a>
                        </h4>
                        <div class="pt-2 flex items-center justify-between text-xs">
                            <span class="font-semibold text-[#FAF6EE]">1,250,000 MMK</span>
                            <span class="text-[#F39C38] font-medium">Low stock</span>
                        </div>
                    </div>
                </div>

                <!-- Related 3 -->
                <div class="group bg-[#161310] rounded-3xl border border-[#2A231C] overflow-hidden transition-all duration-300 hover:shadow-2xl hover:border-[#C5A059] flex flex-col justify-between">
                    <div class="relative w-full aspect-[4/3] bg-[#0D0B09] border-b border-[#221C16] overflow-hidden flex items-center justify-center">
                        <a href="product_detail.php?id=4" class="w-full h-full block">
                            <img src="images/table-1.jpg" alt="Solid Oak Dining Table" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" loading="lazy">
                        </a>
                    </div>
                    <div class="p-4">
                        <h4 class="font-serif text-sm font-medium text-[#FAF6EE] group-hover:text-[#C5A059] transition-colors">
                            <a href="product_detail.php?id=4">Solid Natural Oak Table</a>
                        </h4>
                        <div class="pt-2 flex items-center justify-between text-xs">
                            <span class="font-semibold text-[#FAF6EE]">890,000 MMK</span>
                            <span class="text-[#8C7D6B]">In stock</span>
                        </div>
                    </div>
                </div>

                <!-- Related 4 -->
                <div class="group bg-[#161310] rounded-3xl border border-[#2A231C] overflow-hidden transition-all duration-300 hover:shadow-2xl hover:border-[#C5A059] flex flex-col justify-between">
                    <div class="relative w-full aspect-[4/3] bg-[#0D0B09] border-b border-[#221C16] overflow-hidden flex items-center justify-center">
                        <a href="product_detail.php?id=8" class="w-full h-full block">
                            <img src="images/table-3.jpg" alt="Polished Marble Low Coffee Table" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" loading="lazy">
                        </a>
                    </div>
                    <div class="p-4">
                        <h4 class="font-serif text-sm font-medium text-[#FAF6EE] group-hover:text-[#C5A059] transition-colors">
                            <a href="product_detail.php?id=8">Marble Low Coffee Table</a>
                        </h4>
                        <div class="pt-2 flex items-center justify-between text-xs">
                            <span class="font-semibold text-[#FAF6EE]">620,000 MMK</span>
                            <span class="text-[#8C7D6B]">In stock</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include "components/footer.php"; ?>
    <?php include "components/js.php"; ?>
</body>

</html>
