<?php

/**
 * ============================================================================
 * YANGON ATELIER BACKEND INSTRUCTION GUIDELINE - PRODUCT DETAIL PAGE
 * ============================================================================
 * FILE: product_detail.php
 * PURPOSE: Queries and presents high-fidelity specifications for a single
 *          furniture piece, handles Add-to-Cart submissions, and fetches
 *          complementary related pieces in the same category.
 * 
 * STEP-BY-STEP IMPLEMENTATION GUIDE:
 * 1. Initialize Session & Database:
 *    if (session_status() === PHP_SESSION_NONE) { session_start(); }
 *    require_once "components/connection.php";
 * 
 * 2. Validate GET Parameter 'id':
 *    $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
 *    if ($id <= 0) {
 *        header("Location: shop.php");
 *        exit;
 *    }
 * 
 * 3. Query Single Product Record:
 *    $stmt = $connection->prepare("SELECT * FROM products WHERE id = ? LIMIT 1");
 *    $stmt->bind_param("i", $id);
 *    $stmt->execute();
 *    $result = $stmt->get_result();
 *    $product = $result->fetch_assoc();
 *    $stmt->close();
 * 
 *    if (!$product) {
 *        header("Location: shop.php?error=not_found");
 *        exit;
 *    }
 * 
 * 4. Query Related Products (same category, excluding current):
 *    $category = $product['category'] ?? 'chairs';
 *    $rel_stmt = $connection->prepare("SELECT * FROM products WHERE category = ? AND id != ? ORDER BY id DESC LIMIT 4");
 *    $rel_stmt->bind_param("si", $category, $id);
 *    $rel_stmt->execute();
 *    $related_products = $rel_stmt->get_result()->fetch_all(MYSQLI_ASSOC);
 *    $rel_stmt->close();
 * 
 * 5. Handle Add-to-Cart Form Submission:
 *    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['quantity'])) {
 *        $qty = max(1, min((int)$_POST['quantity'], (int)$product['stock']));
 *        // Initialize session cart array:
 *        if (!isset($_SESSION['cart'])) { $_SESSION['cart'] = []; }
 *        if (isset($_SESSION['cart'][$id])) {
 *            $_SESSION['cart'][$id]['quantity'] += $qty;
 *        } else {
 *            $_SESSION['cart'][$id] = [
 *                'id'       => $product['id'],
 *                'name'     => $product['name'],
 *                'price'    => $product['price'],
 *                'image'    => $product['image'],
 *                'quantity' => $qty
 *            ];
 *        }
 *        $cart_success = "Added " . htmlspecialchars($product['name']) . " to your cart.";
 *    }
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
    <!-- ==================================================================
         PHP BACKEND GUIDELINE: Dynamic Page Title
         <title><?= htmlspecialchars($product['name'] ?? 'Product Detail') ?> | Yangon Atelier</title>
         ================================================================== -->
    <title>Nordic Solid Wood Armchair | Yangon Atelier</title>
    <link rel="icon" type="image/x-icon" href="images/favicon/favicon.ico">
    <?php include "components/css.php"; ?>
</head>

<body class="bg-[#EDE8E0] text-[#362F2A] font-sans selection:bg-[#8A5A44] selection:text-[#F6F3EE] antialiased">
    <?php include "components/header.php"; ?>
    <?php include "components/navbar.php"; ?>

    <!-- BREADCRUMB NAVIGATION -->
    <div class="border-b border-[#C9C0B3] bg-[#DFD8CD] py-4">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <nav class="flex items-center gap-2 text-xs font-medium text-[#6E6359]" aria-label="Breadcrumb">
                <a href="index.php" class="hover:text-[#362F2A] transition-colors">Home</a>
                <span class="text-[#C9C0B3]">/</span>
                <a href="shop.php" class="hover:text-[#362F2A] transition-colors">Shop</a>
                <span class="text-[#C9C0B3]">/</span>
                <!-- [PHP_BACKEND_HOOK: Dynamic category & product name breadcrumb] -->
                <a href="shop.php?category=chairs" class="hover:text-[#362F2A] transition-colors">Chairs &amp; Seating</a>
                <span class="text-[#C9C0B3]">/</span>
                <span class="text-[#8A5A44] font-semibold">Nordic Solid Wood Armchair</span>
            </nav>
        </div>
    </div>

    <!-- MAIN PRODUCT SHOWCASE SPLIT LAYOUT -->
    <!-- ==================================================================
         PHP BACKEND GUIDELINE: Single Product Record
         Fields available in $product:
         - $product['id']
         - $product['name']
         - $product['price']
         - $product['stock']
         - $product['image']
         - $product['description']
         - $product['category']
         ================================================================== -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 lg:py-16">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16 items-start">

            <!-- Left Column: Gallery & Showcase -->
            <div class="lg:col-span-7 space-y-6">
                <!-- Large Primary Image Container -->
                <div class="relative w-full aspect-[4/3] bg-[#EDE8E0] rounded-3xl border border-[#C9C0B3] overflow-hidden shadow-lg flex items-center justify-center">
                    <span class="absolute top-5 left-5 z-10 inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full text-xs font-medium bg-[#DCE5DF] text-[#3F624D] border border-[#C6D6CB] shadow-xs">
                        <span class="w-1.5 h-1.5 rounded-full bg-[#3F624D]"></span>
                        <span><?= ($product['stock'] ?? 25) > 0 ? 'In Stock & Ready for White-Glove Delivery' : 'Crafted to Order' ?></span>
                    </span>
                    <!-- PHP Guideline: src="images/<?= htmlspecialchars($product['image'] ?? 'chair-1.jpg') ?>" -->
                    <img id="main-product-img" src="images/chairs/chair1.jpg" alt="Nordic Solid Wood Armchair" class="w-full h-full object-cover transition-all duration-300" loading="eager">
                </div>

                <!-- Gallery Thumbnails (Atelier Perspectives) -->
                <div class="grid grid-cols-4 gap-4" id="gallery-thumbs">
                    <button type="button" data-src="images/chairs/chair1.jpg" class="thumb-btn aspect-[4/3] rounded-2xl bg-[#EDE8E0] border-2 border-[#8A5A44] overflow-hidden shadow-sm transition-all">
                        <img src="images/chairs/chair1.jpg" alt="Front angle" class="w-full h-full object-cover pointer-events-none">
                    </button>
                    <button type="button" data-src="images/chairs/chair2.jpg" class="thumb-btn aspect-[4/3] rounded-2xl bg-[#EDE8E0] border border-[#C9C0B3] hover:border-[#8A5A44] overflow-hidden transition-all">
                        <img src="images/chairs/chair2.jpg" alt="Curved profile angle" class="w-full h-full object-cover pointer-events-none">
                    </button>
                    <button type="button" data-src="images/chairs/chair3.jpg" class="thumb-btn aspect-[4/3] rounded-2xl bg-[#EDE8E0] border border-[#C9C0B3] hover:border-[#8A5A44] overflow-hidden transition-all">
                        <img src="images/chairs/chair3.jpg" alt="Joinery craft detail" class="w-full h-full object-cover pointer-events-none">
                    </button>
                    <button type="button" data-src="images/about/about2.jpg" class="thumb-btn aspect-[4/3] rounded-2xl bg-[#EDE8E0] border border-[#C9C0B3] hover:border-[#8A5A44] overflow-hidden transition-all">
                        <img src="images/about/about2.jpg" alt="Atmospheric room view" class="w-full h-full object-cover pointer-events-none">
                    </button>
                </div>

                <!-- Atelier Sustainability Stamp -->
                <div class="p-6 rounded-3xl bg-[#F6F3EE] border border-[#C9C0B3] flex items-center gap-4 shadow-sm">
                    <div class="w-12 h-12 rounded-2xl bg-[#DFD8CD] flex items-center justify-center text-[#8A5A44] text-2xl flex-shrink-0 border border-[#C9C0B3]">
                        <i class="ri-leaf-line"></i>
                    </div>
                    <div>
                        <h4 class="font-serif text-sm font-semibold text-[#362F2A]">Certified Heritage Harvest</h4>
                        <p class="text-xs text-[#6E6359] mt-0.5 leading-relaxed">
                            Crafted from legally sourced timber certified under regional reforestation agreements. Coated exclusively with food-safe bio-based hardwax oils.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Right Column: Sticky Product Details & Purchase Controls -->
            <div class="lg:col-span-5 lg:sticky lg:top-28 space-y-8">
                <div>
                    <div class="flex items-center justify-between mb-2">
                        <span class="text-xs uppercase tracking-[0.2em] text-[#8A5A44] font-semibold">Atelier Seating Collection</span>
                        <span class="text-xs text-[#6E6359]">SKU: FM-CH-0104</span>
                    </div>
                    <!-- [PHP_BACKEND_HOOK: Dynamic product name] -->
                    <h1 class="font-serif text-3xl sm:text-4xl font-normal tracking-tight text-[#362F2A]">
                        Nordic Solid Wood Armchair
                    </h1>
                    <!-- [PHP_BACKEND_HOOK: Dynamic product price] -->
                    <div class="mt-4 flex items-baseline gap-3">
                        <span class="text-2xl sm:text-3xl font-semibold text-[#362F2A]">420,000 MMK</span>
                        <span class="text-xs text-[#6E6359] font-normal">Taxes &amp; 5-year structural warranty included</span>
                    </div>
                </div>

                <!-- Tactile Editorial Description -->
                <!-- [PHP_BACKEND_HOOK: Dynamic product description] -->
                <div class="prose text-sm text-[#6E6359] leading-relaxed border-t border-b border-[#C9C0B3] py-6 space-y-3">
                    <p>
                        The Nordic Solid Wood Armchair merges Scandinavian ergonomic posture with the organic tranquility of Japanese joinery. Featuring sculpted curved armrests and an expansive hand-finished frame that contours effortlessly to the body.
                    </p>
                    <p>
                        Finished with non-toxic, matte plant oils that protect the wood while allowing the natural breath and silky tactile warmth of the grain to be felt.
                    </p>
                </div>

                <!-- Purchase Form Handler -->
                <!-- ==============================================================
                     PHP BACKEND GUIDELINE: Add to Cart Form
                     - Set action="" (posts to current page or cart handler)
                     - Method: POST
                     - Hidden product_id: value="&lt;?= $product['id'] ?? 1 ?&gt;"
                     - Quantity input: max="&lt;?= (int)($product['stock'] ?? 25) ?&gt;"
                     ============================================================== -->
                <form action="" method="POST" data-toast-success="Added piece to your cart." class="space-y-6">
                    <input type="hidden" name="product_id" value="1">

                    <!-- Stock Status & Quantity Stepper -->
                    <div class="space-y-2">
                        <div class="flex items-center justify-between text-xs">
                            <span class="font-medium text-[#362F2A]">Quantity</span>
                            <span class="text-[#3F624D] font-medium flex items-center gap-1">
                                <i class="ri-checkbox-circle-fill"></i> 25 pieces in Yangon warehouse
                            </span>
                        </div>

                        <div class="flex items-center gap-4">
                            <!-- Stepper Container -->
                            <div class="inline-flex items-center border border-[#C9C0B3] rounded-xl bg-[#F6F3EE] shadow-sm" data-stepper>
                                <button type="button" data-stepper-decrease aria-label="Decrease quantity" class="w-11 h-12 flex items-center justify-center text-[#6E6359] hover:text-[#362F2A] hover:bg-[#DFD8CD] rounded-l-xl transition-colors">
                                    <i class="ri-subtract-line text-base"></i>
                                </button>
                                <input type="number" name="quantity" min="1" max="25" value="1" readonly class="w-14 text-center text-sm font-semibold text-[#362F2A] bg-transparent focus:outline-none">
                                <button type="button" data-stepper-increase aria-label="Increase quantity" class="w-11 h-12 flex items-center justify-center text-[#6E6359] hover:text-[#362F2A] hover:bg-[#DFD8CD] rounded-r-xl transition-colors">
                                    <i class="ri-add-line text-base"></i>
                                </button>
                            </div>

                            <!-- Add to Cart CTA -->
                            <button type="submit" class="flex-1 h-12 rounded-xl bg-[#8A5A44] hover:bg-[#704735] text-[#F6F3EE] font-semibold text-sm transition-all shadow-sm hover:shadow-md flex items-center justify-center gap-2">
                                <i class="ri-shopping-bag-3-line text-lg"></i>
                                <span>Add to Atelier Cart</span>
                            </button>
                        </div>
                    </div>

                    <!-- Secondary Concierge Action -->
                    <div class="flex items-center gap-3">
                        <a href="contact.php?inquiry=FM-CH-0104" class="w-full h-11 rounded-xl border border-[#C9C0B3] bg-[#F6F3EE] hover:bg-[#DFD8CD] text-[#362F2A] text-xs font-medium transition-colors flex items-center justify-center gap-2">
                            <i class="ri-customer-service-2-line text-base text-[#8A5A44]"></i>
                            <span>Inquire via Showroom Concierge</span>
                        </a>
                    </div>
                </form>

                <!-- Architectural Specifications Grid -->
                <div class="bg-[#F6F3EE] rounded-3xl border border-[#C9C0B3] p-6 shadow-sm space-y-3">
                    <h4 class="text-xs uppercase tracking-wider text-[#8A5A44] font-semibold mb-2">Specifications</h4>
                    <div class="grid grid-cols-2 gap-y-2.5 gap-x-4 text-xs">
                        <span class="text-[#6E6359]">Materials:</span>
                        <span class="text-[#362F2A] font-medium">Solid American Walnut, Linen Weave</span>
                        <span class="text-[#6E6359]">Dimensions:</span>
                        <span class="text-[#362F2A] font-medium">W 78 &times; D 84 &times; H 76 cm</span>
                        <span class="text-[#6E6359]">Seat Height:</span>
                        <span class="text-[#362F2A] font-medium">42 cm</span>
                        <span class="text-[#6E6359]">Net Weight:</span>
                        <span class="text-[#362F2A] font-medium">14.2 kg</span>
                        <span class="text-[#6E6359]">Assembly:</span>
                        <span class="text-[#362F2A] font-medium">Fully Assembled Piece</span>
                    </div>
                </div>

                <!-- Delivery & Care Information Accordion -->
                <div class="border-t border-[#C9C0B3] pt-4 space-y-3 text-xs text-[#6E6359]">
                    <div class="flex items-start gap-3">
                        <i class="ri-truck-line text-base text-[#8A5A44] flex-shrink-0 mt-0.5"></i>
                        <div>
                            <strong class="text-[#362F2A] block">Complimentary White-Glove Yangon Delivery</strong>
                            Unpacking, placement in your room of choice, and debris removal included.
                        </div>
                    </div>
                    <div class="flex items-start gap-3">
                        <i class="ri-shield-check-line text-base text-[#8A5A44] flex-shrink-0 mt-0.5"></i>
                        <div>
                            <strong class="text-[#362F2A] block">5-Year Structural Frame Guarantee</strong>
                            Guaranteed against timber warping or joinery separation under residential use.
                        </div>
                    </div>
                    <div class="flex items-start gap-3">
                        <i class="ri-sparkling-line text-base text-[#8A5A44] flex-shrink-0 mt-0.5"></i>
                        <div>
                            <strong class="text-[#362F2A] block">Artisan Stewardship &amp; Maintenance</strong>
                            Learn how to nurture natural timbers and fine fabrics in our <a href="care.php" class="text-[#8A5A44] underline font-medium hover:text-[#362F2A]">Care Guide</a>.
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </main>

    <!-- RELATED PIECES SECTION -->
    <section class="border-t border-[#C9C0B3] bg-[#DFD8CD]/50 py-16 lg:py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-end justify-between mb-10">
                <div>
                    <span class="text-xs uppercase tracking-[0.25em] text-[#8A5A44] font-semibold block mb-1">Harmonious Pairings</span>
                    <h2 class="font-serif text-2xl sm:text-3xl font-normal text-[#362F2A]">Complementary Pieces</h2>
                </div>
                <a href="shop.php" class="text-xs font-semibold text-[#362F2A] hover:text-[#8A5A44] flex items-center gap-1">
                    <span>Explore All</span>
                    <i class="ri-arrow-right-line"></i>
                </a>
            </div>

            <!-- ==============================================================
                 PHP BACKEND GUIDELINE: Related Products Loop
                 Query: SELECT * FROM products WHERE category = ? AND id != ? LIMIT 4
                 Loop over $related_products:
                 <?php /*
                 if (!empty($related_products)) {
                     foreach ($related_products as $rel) {
                         ?>
                         <div class="group bg-[#F6F3EE] rounded-3xl border border-[#C9C0B3] overflow-hidden transition-all duration-300 hover:shadow-xl hover:border-[#8A5A44] flex flex-col justify-between">
                             <div class="relative w-full aspect-[4/3] bg-[#EDE8E0] border-b border-[#C9C0B3] overflow-hidden flex items-center justify-center">
                                 <a href="product_detail.php?id=<?= $rel['id'] ?>" class="w-full h-full block">
                                     <img src="images/<?= htmlspecialchars($rel['image']) ?>" alt="<?= htmlspecialchars($rel['name']) ?>" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" loading="lazy">
                                 </a>
                             </div>
                             <div class="p-4">
                                 <h4 class="font-serif text-sm font-medium text-[#362F2A] group-hover:text-[#8A5A44] transition-colors">
                                     <a href="product_detail.php?id=<?= $rel['id'] ?>"><?= htmlspecialchars($rel['name']) ?></a>
                                 </h4>
                                 <div class="pt-2 flex items-center justify-between text-xs">
                                     <span class="font-semibold text-[#362F2A]"><?= number_format($rel['price']) ?> MMK</span>
                                     <span class="text-[#6E6359]"><?= $rel['stock'] > 0 ? 'In stock' : 'Made to order' ?></span>
                                 </div>
                             </div>
                         </div>
                         <?php
                     }
                 }
                 */ ?>
                 ============================================================== -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Related 1 -->
                <div class="group bg-[#F6F3EE] rounded-3xl border border-[#C9C0B3] overflow-hidden transition-all duration-300 hover:shadow-xl hover:border-[#8A5A44] flex flex-col justify-between">
                    <div class="relative w-full aspect-[4/3] bg-[#EDE8E0] border-b border-[#C9C0B3] overflow-hidden flex items-center justify-center">
                        <a href="product_detail.php?id=2" class="w-full h-full block">
                            <img src="images/chairs/chair2.jpg" alt="Curved Lounge Armchair" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" loading="lazy">
                        </a>
                    </div>
                    <div class="p-4">
                        <h4 class="font-serif text-sm font-medium text-[#362F2A] group-hover:text-[#8A5A44] transition-colors">
                            <a href="product_detail.php?id=2">Curved Lounge Armchair</a>
                        </h4>
                        <div class="pt-2 flex items-center justify-between text-xs">
                            <span class="font-semibold text-[#362F2A]">580,000 MMK</span>
                            <span class="text-[#6E6359]">In stock</span>
                        </div>
                    </div>
                </div>

                <!-- Related 2 -->
                <div class="group bg-[#F6F3EE] rounded-3xl border border-[#C9C0B3] overflow-hidden transition-all duration-300 hover:shadow-xl hover:border-[#8A5A44] flex flex-col justify-between">
                    <div class="relative w-full aspect-[4/3] bg-[#EDE8E0] border-b border-[#C9C0B3] overflow-hidden flex items-center justify-center">
                        <a href="product_detail.php?id=3" class="w-full h-full block">
                            <img src="images/couches/couch1.jpg" alt="Bouclé Modular Sofa" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" loading="lazy">
                        </a>
                    </div>
                    <div class="p-4">
                        <h4 class="font-serif text-sm font-medium text-[#362F2A] group-hover:text-[#8A5A44] transition-colors">
                            <a href="product_detail.php?id=3">Bouclé Modular Sofa</a>
                        </h4>
                        <div class="pt-2 flex items-center justify-between text-xs">
                            <span class="font-semibold text-[#362F2A]">1,250,000 MMK</span>
                            <span class="text-[#8C5327] font-medium">Low stock</span>
                        </div>
                    </div>
                </div>

                <!-- Related 3 -->
                <div class="group bg-[#F6F3EE] rounded-3xl border border-[#C9C0B3] overflow-hidden transition-all duration-300 hover:shadow-xl hover:border-[#8A5A44] flex flex-col justify-between">
                    <div class="relative w-full aspect-[4/3] bg-[#EDE8E0] border-b border-[#C9C0B3] overflow-hidden flex items-center justify-center">
                        <a href="product_detail.php?id=4" class="w-full h-full block">
                            <img src="images/tables/table1.jpg" alt="Solid Oak Dining Table" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" loading="lazy">
                        </a>
                    </div>
                    <div class="p-4">
                        <h4 class="font-serif text-sm font-medium text-[#362F2A] group-hover:text-[#8A5A44] transition-colors">
                            <a href="product_detail.php?id=4">Solid Natural Oak Table</a>
                        </h4>
                        <div class="pt-2 flex items-center justify-between text-xs">
                            <span class="font-semibold text-[#362F2A]">890,000 MMK</span>
                            <span class="text-[#6E6359]">In stock</span>
                        </div>
                    </div>
                </div>

                <!-- Related 4 -->
                <div class="group bg-[#F6F3EE] rounded-3xl border border-[#C9C0B3] overflow-hidden transition-all duration-300 hover:shadow-xl hover:border-[#8A5A44] flex flex-col justify-between">
                    <div class="relative w-full aspect-[4/3] bg-[#EDE8E0] border-b border-[#C9C0B3] overflow-hidden flex items-center justify-center">
                        <a href="product_detail.php?id=8" class="w-full h-full block">
                            <img src="images/tables/table3.jpg" alt="Polished Marble Low Coffee Table" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" loading="lazy">
                        </a>
                    </div>
                    <div class="p-4">
                        <h4 class="font-serif text-sm font-medium text-[#362F2A] group-hover:text-[#8A5A44] transition-colors">
                            <a href="product_detail.php?id=8">Marble Low Coffee Table</a>
                        </h4>
                        <div class="pt-2 flex items-center justify-between text-xs">
                            <span class="font-semibold text-[#362F2A]">620,000 MMK</span>
                            <span class="text-[#6E6359]">In stock</span>
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