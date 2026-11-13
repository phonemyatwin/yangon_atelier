<?php

/**
 * ============================================================================
 * YANGON ATELIER BACKEND INSTRUCTION GUIDELINE - STOREFRONT HOMEPAGE
 * ============================================================================
 * FILE: index.php
 * PURPOSE: Showcases featured hero lookbooks, curated product masterpieces,
 *          craftsmanship narratives, and recent journal editorial essays.
 * 
 * STEP-BY-STEP IMPLEMENTATION GUIDE:
 * 1. Initialize Session & Database Connection:
 *    if (session_status() === PHP_SESSION_NONE) { session_start(); }
 *    require_once "components/connection.php";
 * 
 * 2. Query Curated Masterpiece Products:
 *    $product_stmt = $pdo->query("SELECT id, name, price, stock, image, category FROM products ORDER BY id DESC LIMIT 4");
 *    $featured_products = $product_stmt ? $product_stmt->fetchAll() : [];
 * 
 * 3. Query Recent Journal Articles:
 *    $blog_stmt = $pdo->query("SELECT id, title, author, image, content, category, created_at FROM blogs ORDER BY id DESC LIMIT 4");
 *    $recent_blogs = $blog_stmt ? $blog_stmt->fetchAll() : [];
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
    <title>Yangon Atelier — Warm Minimalist Furniture &amp; Objects</title>
    <link rel="icon" type="image/x-icon" href="images/favicon/favicon.ico">
    <?php include "components/css.php"; ?>
</head>

<body class="bg-[#EDE8E0] text-[#362F2A] font-sans selection:bg-[#8A5A44] selection:text-[#F6F3EE] antialiased">
    <?php include "components/header.php"; ?>
    <?php include "components/navbar.php"; ?>

    <!-- HERO SLIDER SECTION (7 MASTER CURATED SLIDES) -->
    <section class="relative bg-[#362F2A] text-white overflow-hidden">
        <div class="relative min-h-[620px] lg:min-h-[720px] flex items-center">

            <!-- Slide 1: Heirloom Private Library Suite (Active by default) -->
            <div class="hero-slide absolute inset-0 transition-opacity duration-1000 ease-in-out opacity-100 z-10">
                <div class="absolute inset-0">
                    <img src="images/hero/hero1.jpg" alt="Heirloom Private Library Suite" class="w-full h-full object-cover" loading="eager" fetchpriority="high">
                    <div class="absolute inset-0 bg-gradient-to-r from-[#362F2A]/95 via-[#362F2A]/60 to-transparent"></div>
                </div>
                <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full h-full flex items-center py-20">
                    <div class="max-w-2xl space-y-6">
                        <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-[#F6F3EE]/20 backdrop-blur-md border border-[#F6F3EE]/30 text-xs tracking-wider uppercase font-medium text-[#F6F3EE]">
                            <span class="w-2 h-2 rounded-full bg-[#8A5A44]"></span>
                            <span>Grand Manor Edition</span>
                        </div>
                        <h1 class="font-serif text-4xl sm:text-5xl lg:text-6xl font-normal tracking-tight text-[#F6F3EE] leading-[1.12]">
                            The Quiet Grandeur of Heritage Living.
                        </h1>
                        <p class="text-base sm:text-lg text-[#EDE8E0] font-normal leading-relaxed">
                            Hand-rubbed walnut paneling, bespoke tufted daybeds, and sculpted reading illumination curated for distinguished domestic estates.
                        </p>
                        <div class="flex flex-wrap items-center gap-4 pt-4">
                            <a href="shop.php" class="inline-flex items-center gap-2.5 px-7 py-3.5 rounded-xl bg-[#8A5A44] hover:bg-[#704735] text-[#F6F3EE] font-semibold text-sm transition-all shadow-md hover:shadow-lg">
                                <span>Explore Collection</span>
                                <i class="ri-arrow-right-line"></i>
                            </a>
                            <a href="contact.php" class="inline-flex items-center gap-2 px-6 py-3.5 rounded-xl bg-[#F6F3EE]/15 hover:bg-[#F6F3EE]/25 backdrop-blur-md text-[#F6F3EE] border border-[#F6F3EE]/30 text-sm font-medium transition-colors">
                                <span>Showroom Concierge</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Slide 2: Chateau Grand Hearth -->
            <div class="hero-slide absolute inset-0 transition-opacity duration-1000 ease-in-out opacity-0 pointer-events-none z-0">
                <div class="absolute inset-0">
                    <img src="images/hero/hero2.jpg" alt="Chateau Grand Hearth Salon" class="w-full h-full object-cover" loading="lazy">
                    <div class="absolute inset-0 bg-gradient-to-r from-[#362F2A]/95 via-[#362F2A]/60 to-transparent"></div>
                </div>
                <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full h-full flex items-center py-20">
                    <div class="max-w-2xl space-y-6">
                        <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-[#DCE5DF]/30 backdrop-blur-md border border-[#DCE5DF]/40 text-xs tracking-wider uppercase font-medium text-[#F6F3EE]">
                            <span class="w-2 h-2 rounded-full bg-[#3F624D]"></span>
                            <span>Historic Craft Traditions</span>
                        </div>
                        <h2 class="font-serif text-4xl sm:text-5xl lg:text-6xl font-normal tracking-tight text-[#F6F3EE] leading-[1.12]">
                            Monumental Hearth, Hand-Planed Beams.
                        </h2>
                        <p class="text-base sm:text-lg text-[#EDE8E0] font-normal leading-relaxed">
                            Ancient timber joinery traditions resurrected with deep-buttoned leather wingbacks and authentic stone proportions.
                        </p>
                        <div class="flex flex-wrap items-center gap-4 pt-4">
                            <a href="shop.php?category=sofas" class="inline-flex items-center gap-2.5 px-7 py-3.5 rounded-xl bg-[#8A5A44] hover:bg-[#704735] text-[#F6F3EE] font-semibold text-sm transition-all shadow-md hover:shadow-lg">
                                <span>Discover Living Pieces</span>
                                <i class="ri-arrow-right-line"></i>
                            </a>
                            <a href="about.php" class="inline-flex items-center gap-2 px-6 py-3.5 rounded-xl bg-[#F6F3EE]/15 hover:bg-[#F6F3EE]/25 backdrop-blur-md text-[#F6F3EE] border border-[#F6F3EE]/30 text-sm font-medium transition-colors">
                                <span>Atelier Philosophy</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Slide 3: Gilded Drawing Room -->
            <div class="hero-slide absolute inset-0 transition-opacity duration-1000 ease-in-out opacity-0 pointer-events-none z-0">
                <div class="absolute inset-0">
                    <img src="images/hero/hero3.jpg" alt="Gilded Estate Drawing Room" class="w-full h-full object-cover" loading="lazy">
                    <div class="absolute inset-0 bg-gradient-to-r from-[#362F2A]/95 via-[#362F2A]/60 to-transparent"></div>
                </div>
                <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full h-full flex items-center py-20">
                    <div class="max-w-2xl space-y-6">
                        <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-[#F6F3EE]/20 backdrop-blur-md border border-[#F6F3EE]/30 text-xs tracking-wider uppercase font-medium text-[#F6F3EE]">
                            <span class="w-2 h-2 rounded-full bg-[#8A5A44]"></span>
                            <span>Ceremonial Salon</span>
                        </div>
                        <h2 class="font-serif text-4xl sm:text-5xl lg:text-6xl font-normal tracking-tight text-[#F6F3EE] leading-[1.12]">
                            The Splendor of Aristocratic Domesticity.
                        </h2>
                        <p class="text-base sm:text-lg text-[#EDE8E0] font-normal leading-relaxed">
                            Carved consoles, burnished leather seating, and hand-finished bronze chandeliers capturing the majestic romance of royal chambers.
                        </p>
                        <div class="flex flex-wrap items-center gap-4 pt-4">
                            <a href="shop.php" class="inline-flex items-center gap-2.5 px-7 py-3.5 rounded-xl bg-[#8A5A44] hover:bg-[#704735] text-[#F6F3EE] font-semibold text-sm transition-all shadow-md hover:shadow-lg">
                                <span>View Signature Pieces</span>
                                <i class="ri-arrow-right-line"></i>
                            </a>
                            <a href="contact.php" class="inline-flex items-center gap-2 px-6 py-3.5 rounded-xl bg-[#F6F3EE]/15 hover:bg-[#F6F3EE]/25 backdrop-blur-md text-[#F6F3EE] border border-[#F6F3EE]/30 text-sm font-medium transition-colors">
                                <span>Private Commissions</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Slide 4: Executive Estate Study -->
            <div class="hero-slide absolute inset-0 transition-opacity duration-1000 ease-in-out opacity-0 pointer-events-none z-0">
                <div class="absolute inset-0">
                    <img src="images/hero/hero4.jpg" alt="Executive Estate Study & Salon" class="w-full h-full object-cover" loading="lazy">
                    <div class="absolute inset-0 bg-gradient-to-r from-[#362F2A]/95 via-[#362F2A]/60 to-transparent"></div>
                </div>
                <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full h-full flex items-center py-20">
                    <div class="max-w-2xl space-y-6">
                        <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-[#F6F3EE]/20 backdrop-blur-md border border-[#F6F3EE]/30 text-xs tracking-wider uppercase font-medium text-[#F6F3EE]">
                            <span class="w-2 h-2 rounded-full bg-[#8A5A44]"></span>
                            <span>Executive Study</span>
                        </div>
                        <h2 class="font-serif text-4xl sm:text-5xl lg:text-6xl font-normal tracking-tight text-[#F6F3EE] leading-[1.12]">
                            Architectural Harmony &amp; Timeless Focus.
                        </h2>
                        <p class="text-base sm:text-lg text-[#EDE8E0] font-normal leading-relaxed">
                            Stained glass daylight illuminating carved walnut writing desks and woven damask armchairs engineered for contemplative grace.
                        </p>
                        <div class="flex flex-wrap items-center gap-4 pt-4">
                            <a href="shop.php?category=workspace" class="inline-flex items-center gap-2.5 px-7 py-3.5 rounded-xl bg-[#8A5A44] hover:bg-[#704735] text-[#F6F3EE] font-semibold text-sm transition-all shadow-md hover:shadow-lg">
                                <span>Explore Workspace</span>
                                <i class="ri-arrow-right-line"></i>
                            </a>
                            <a href="team.php" class="inline-flex items-center gap-2 px-6 py-3.5 rounded-xl bg-[#F6F3EE]/15 hover:bg-[#F6F3EE]/25 backdrop-blur-md text-[#F6F3EE] border border-[#F6F3EE]/30 text-sm font-medium transition-colors">
                                <span>Design Collective</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Slide 5: Minimalist Living Interior -->
            <div class="hero-slide absolute inset-0 transition-opacity duration-1000 ease-in-out opacity-0 pointer-events-none z-0">
                <div class="absolute inset-0">
                    <img src="images/hero/hero5.jpg" alt="Minimalist Living Interior" class="w-full h-full object-cover" loading="lazy">
                    <div class="absolute inset-0 bg-gradient-to-r from-[#362F2A]/90 via-[#362F2A]/50 to-transparent"></div>
                </div>
                <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full h-full flex items-center py-20">
                    <div class="max-w-2xl space-y-6">
                        <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-[#F6F3EE]/20 backdrop-blur-md border border-[#F6F3EE]/30 text-xs tracking-wider uppercase font-medium text-[#F6F3EE]">
                            <span class="w-2 h-2 rounded-full bg-[#8A5A44]"></span>
                            <span>Autumn Atelier Edition</span>
                        </div>
                        <h2 class="font-serif text-4xl sm:text-5xl lg:text-6xl font-normal tracking-tight text-[#F6F3EE] leading-[1.12]">
                            The Art of Quiet, Tactile Living.
                        </h2>
                        <p class="text-base sm:text-lg text-[#EDE8E0] font-normal leading-relaxed">
                            Experience sculpted silhouettes, solid certified timber, and textured woven textiles handcrafted for mindful domestic sanctuaries.
                        </p>
                        <div class="flex flex-wrap items-center gap-4 pt-4">
                            <a href="shop.php" class="inline-flex items-center gap-2.5 px-7 py-3.5 rounded-xl bg-[#8A5A44] hover:bg-[#704735] text-[#F6F3EE] font-semibold text-sm transition-all shadow-md hover:shadow-lg">
                                <span>Explore Collection</span>
                                <i class="ri-arrow-right-line"></i>
                            </a>
                            <a href="about.php" class="inline-flex items-center gap-2 px-6 py-3.5 rounded-xl bg-[#F6F3EE]/15 hover:bg-[#F6F3EE]/25 backdrop-blur-md text-[#F6F3EE] border border-[#F6F3EE]/30 text-sm font-medium transition-colors">
                                <span>Atelier Philosophy</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Slide 6: Warm Dining Room Interior -->
            <div class="hero-slide absolute inset-0 transition-opacity duration-1000 ease-in-out opacity-0 pointer-events-none z-0">
                <div class="absolute inset-0">
                    <img src="images/hero/hero1.jpg" alt="Warm Dining Room Interior" class="w-full h-full object-cover" loading="lazy">
                    <div class="absolute inset-0 bg-gradient-to-r from-[#362F2A]/90 via-[#362F2A]/50 to-transparent"></div>
                </div>
                <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full h-full flex items-center py-20">
                    <div class="max-w-2xl space-y-6">
                        <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-[#DCE5DF]/30 backdrop-blur-md border border-[#DCE5DF]/40 text-xs tracking-wider uppercase font-medium text-[#F6F3EE]">
                            <span class="w-2 h-2 rounded-full bg-[#3F624D]"></span>
                            <span>Heritage Joinery</span>
                        </div>
                        <h2 class="font-serif text-4xl sm:text-5xl lg:text-6xl font-normal tracking-tight text-[#F6F3EE] leading-[1.12]">
                            Grounded in Nature, Crafted to Endure.
                        </h2>
                        <p class="text-base sm:text-lg text-[#EDE8E0] font-normal leading-relaxed">
                            Form follows serenity. Every piece honors natural timber grain, certified regional teak, and honest craftsmanship without nails.
                        </p>
                        <div class="flex flex-wrap items-center gap-4 pt-4">
                            <a href="shop.php?category=tables" class="inline-flex items-center gap-2.5 px-7 py-3.5 rounded-xl bg-[#8A5A44] hover:bg-[#704735] text-[#F6F3EE] font-semibold text-sm transition-all shadow-md hover:shadow-lg">
                                <span>Discover Dining</span>
                                <i class="ri-arrow-right-line"></i>
                            </a>
                            <a href="product_detail.php?id=4" class="inline-flex items-center gap-2 px-6 py-3.5 rounded-xl bg-[#F6F3EE]/15 hover:bg-[#F6F3EE]/25 backdrop-blur-md text-[#F6F3EE] border border-[#F6F3EE]/30 text-sm font-medium transition-colors">
                                <span>View Oak Table</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Slide 7: Master Bedroom Sanctuary -->
            <div class="hero-slide absolute inset-0 transition-opacity duration-1000 ease-in-out opacity-0 pointer-events-none z-0">
                <div class="absolute inset-0">
                    <img src="images/hero/hero2.jpg" alt="Master Bedroom Sanctuary" class="w-full h-full object-cover" loading="lazy">
                    <div class="absolute inset-0 bg-gradient-to-r from-[#362F2A]/90 via-[#362F2A]/50 to-transparent"></div>
                </div>
                <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full h-full flex items-center py-20">
                    <div class="max-w-2xl space-y-6">
                        <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-[#F6F3EE]/20 backdrop-blur-md border border-[#F6F3EE]/30 text-xs tracking-wider uppercase font-medium text-[#F6F3EE]">
                            <span class="w-2 h-2 rounded-full bg-[#8A5A44]"></span>
                            <span>Rest &amp; Restoration</span>
                        </div>
                        <h2 class="font-serif text-4xl sm:text-5xl lg:text-6xl font-normal tracking-tight text-[#F6F3EE] leading-[1.12]">
                            Sanctuary for Rest &amp; Reflection.
                        </h2>
                        <p class="text-base sm:text-lg text-[#EDE8E0] font-normal leading-relaxed">
                            Low-profile Japanese tatami aesthetics harmonized with European linen upholstery for deep restorative slumber.
                        </p>
                        <div class="flex flex-wrap items-center gap-4 pt-4">
                            <a href="shop.php?category=beds" class="inline-flex items-center gap-2.5 px-7 py-3.5 rounded-xl bg-[#8A5A44] hover:bg-[#704735] text-[#F6F3EE] font-semibold text-sm transition-all shadow-md hover:shadow-lg">
                                <span>Explore Bedroom</span>
                                <i class="ri-arrow-right-line"></i>
                            </a>
                            <a href="product_detail.php?id=5" class="inline-flex items-center gap-2 px-6 py-3.5 rounded-xl bg-[#F6F3EE]/15 hover:bg-[#F6F3EE]/25 backdrop-blur-md text-[#F6F3EE] border border-[#F6F3EE]/30 text-sm font-medium transition-colors">
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
                    <button type="button" aria-label="Slide 1" onclick="showSlide(0)" class="hero-dot h-2 w-8 rounded-full bg-[#8A5A44] transition-all"></button>
                    <button type="button" aria-label="Slide 2" onclick="showSlide(1)" class="hero-dot h-2 w-2.5 rounded-full bg-[#F6F3EE]/50 hover:bg-[#F6F3EE]/80 transition-all"></button>
                    <button type="button" aria-label="Slide 3" onclick="showSlide(2)" class="hero-dot h-2 w-2.5 rounded-full bg-[#F6F3EE]/50 hover:bg-[#F6F3EE]/80 transition-all"></button>
                    <button type="button" aria-label="Slide 4" onclick="showSlide(3)" class="hero-dot h-2 w-2.5 rounded-full bg-[#F6F3EE]/50 hover:bg-[#F6F3EE]/80 transition-all"></button>
                    <button type="button" aria-label="Slide 5" onclick="showSlide(4)" class="hero-dot h-2 w-2.5 rounded-full bg-[#F6F3EE]/50 hover:bg-[#F6F3EE]/80 transition-all"></button>
                    <button type="button" aria-label="Slide 6" onclick="showSlide(5)" class="hero-dot h-2 w-2.5 rounded-full bg-[#F6F3EE]/50 hover:bg-[#F6F3EE]/80 transition-all"></button>
                    <button type="button" aria-label="Slide 7" onclick="showSlide(6)" class="hero-dot h-2 w-2.5 rounded-full bg-[#F6F3EE]/50 hover:bg-[#F6F3EE]/80 transition-all"></button>
                </div>

                <!-- Navigation Arrow Buttons -->
                <div class="flex items-center gap-2.5">
                    <button type="button" id="slide-prev" onclick="prev()" aria-label="Previous Slide" class="w-11 h-11 rounded-full bg-[#362F2A]/60 hover:bg-[#362F2A]/90 backdrop-blur-md text-[#F6F3EE] border border-[#F6F3EE]/20 shadow-sm flex items-center justify-center transition-colors">
                        <i class="ri-arrow-left-line text-lg"></i>
                    </button>
                    <button type="button" id="slide-next" onclick="next()" aria-label="Next Slide" class="w-11 h-11 rounded-full bg-[#362F2A]/60 hover:bg-[#362F2A]/90 backdrop-blur-md text-[#F6F3EE] border border-[#F6F3EE]/20 shadow-sm flex items-center justify-center transition-colors">
                        <i class="ri-arrow-right-line text-lg"></i>
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- ARCHITECTURAL SPACES / PANORAMIC ATMOSPHERIC SUITES -->
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 lg:py-28">
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-12 gap-4">
            <div>
                <span class="text-xs uppercase tracking-[0.25em] text-[#8A5A44] font-semibold block mb-2">Curated Spatial Wings</span>
                <h2 class="font-serif text-3xl sm:text-4xl font-normal text-[#362F2A] tracking-tight">Environments of Quiet Grandeur</h2>
            </div>
            <a href="shop.php" class="inline-flex items-center gap-2 text-xs uppercase tracking-wider text-[#8A5A44] hover:text-[#704735] font-semibold transition-colors">
                <span>View Full Inventory</span>
                <i class="ri-arrow-right-line"></i>
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Space 1: Living Room -->
            <a href="shop.php?category=sofas" class="group relative rounded-3xl overflow-hidden aspect-[4/5] bg-[#F6F3EE] block shadow-md hover:shadow-xl transition-all duration-500 border border-[#C9C0B3] hover:border-[#8A5A44]">
                <img src="images/about/about2.jpg" alt="Living & Lounge Architecture" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700 ease-out" loading="lazy">
                <div class="absolute inset-0 bg-gradient-to-t from-[#362F2A]/90 via-[#362F2A]/30 to-transparent"></div>
                <div class="absolute bottom-0 inset-x-0 p-8 text-white space-y-2">
                    <span class="text-xs uppercase tracking-wider text-[#DFD8CD] font-medium">Lounge &amp; Living</span>
                    <h3 class="font-serif text-2xl font-normal leading-snug text-[#F6F3EE]">The Communal Hearth</h3>
                    <div class="inline-flex items-center gap-1.5 text-xs font-medium text-[#EDE8E0] group-hover:text-[#F6F3EE] pt-2 transition-colors">
                        <span>Discover Lounge Editions</span>
                        <i class="ri-arrow-right-line transition-transform group-hover:translate-x-1"></i>
                    </div>
                </div>
            </a>

            <!-- Space 2: Dining Room -->
            <a href="shop.php?category=tables" class="group relative rounded-3xl overflow-hidden aspect-[4/5] bg-[#F6F3EE] block shadow-md hover:shadow-xl transition-all duration-500 border border-[#C9C0B3] hover:border-[#8A5A44]">
                <img src="images/about/workshop2.jpg" alt="Dining Room Architecture" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700 ease-out" loading="lazy">
                <div class="absolute inset-0 bg-gradient-to-t from-[#362F2A]/90 via-[#362F2A]/30 to-transparent"></div>
                <div class="absolute bottom-0 inset-x-0 p-8 text-white space-y-2">
                    <span class="text-xs uppercase tracking-wider text-[#DFD8CD] font-medium">Dining &amp; Gathering</span>
                    <h3 class="font-serif text-2xl font-normal leading-snug text-[#F6F3EE]">Solid Timber Tables</h3>
                    <div class="inline-flex items-center gap-1.5 text-xs font-medium text-[#EDE8E0] group-hover:text-[#F6F3EE] pt-2 transition-colors">
                        <span>Explore Dining Sets</span>
                        <i class="ri-arrow-right-line transition-transform group-hover:translate-x-1"></i>
                    </div>
                </div>
            </a>

            <!-- Space 3: Workspace -->
            <a href="shop.php?category=workspace" class="group relative rounded-3xl overflow-hidden aspect-[4/5] bg-[#F6F3EE] block shadow-md hover:shadow-xl transition-all duration-500 border border-[#C9C0B3] hover:border-[#8A5A44]">
                <img src="images/about/workshop1.jpg" alt="Workspace & Studio Architecture" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700 ease-out" loading="lazy">
                <div class="absolute inset-0 bg-gradient-to-t from-[#362F2A]/90 via-[#362F2A]/30 to-transparent"></div>
                <div class="absolute bottom-0 inset-x-0 p-8 text-white space-y-2">
                    <span class="text-xs uppercase tracking-wider text-[#DFD8CD] font-medium">Studio &amp; Focus</span>
                    <h3 class="font-serif text-2xl font-normal leading-snug text-[#F6F3EE]">Mindful Workspace</h3>
                    <div class="inline-flex items-center gap-1.5 text-xs font-medium text-[#EDE8E0] group-hover:text-[#F6F3EE] pt-2 transition-colors">
                        <span>View Work Desks</span>
                        <i class="ri-arrow-right-line transition-transform group-hover:translate-x-1"></i>
                    </div>
                </div>
            </a>
        </div>
    </section>

    <!-- CURATED SALON ACQUISITIONS (Muted Section: bg-[#DFD8CD]/50) -->
    <section class="bg-[#DFD8CD]/50 border-y border-[#C9C0B3] py-20 lg:py-28">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-16">

            <div class="flex flex-col md:flex-row md:items-end justify-between gap-4">
                <div>
                    <span class="text-xs uppercase tracking-[0.25em] text-[#8A5A44] font-semibold block mb-2">Private Acquisitions</span>
                    <h2 class="font-serif text-3xl sm:text-4xl font-normal text-[#362F2A] tracking-tight">The Heirloom Showcase</h2>
                </div>
                <div class="flex items-center gap-4">
                    <a href="shop.php" class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl bg-[#F6F3EE] hover:bg-[#EDE8E0] text-[#362F2A] text-xs font-semibold border border-[#C9C0B3] transition-colors shadow-xs">
                        <span>Browse Entire Catalog (29 Pieces)</span>
                        <i class="ri-arrow-right-line text-[#8A5A44]"></i>
                    </a>
                </div>
            </div>

            <!-- PART A: HEROIC MASTERPIECE SPOTLIGHT -->
            <div class="rounded-3xl bg-[#F6F3EE] border border-[#C9C0B3] overflow-hidden shadow-lg p-6 sm:p-10 lg:p-14">
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-center">
                    <!-- Masterpiece Image Bay -->
                    <div class="lg:col-span-7 relative aspect-[4/3] rounded-2xl overflow-hidden bg-[#EDE8E0] border border-[#C9C0B3]">
                        <img src="images/chairs/chair1.jpg" alt="Nordic Solid Wood Armchair" class="w-full h-full object-cover hover:scale-105 transition-transform duration-700" loading="eager">
                        <span class="absolute top-4 left-4 inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-medium bg-[#DCE5DF] text-[#3F624D] border border-[#C6D6CB] shadow-xs">
                            <span class="w-1.5 h-1.5 rounded-full bg-[#3F624D]"></span>
                            <span>Flagship Atelier Piece</span>
                        </span>
                    </div>

                    <!-- Curatorial Dossier & Direct Acquisition -->
                    <div class="lg:col-span-5 space-y-6">
                        <div class="flex items-center gap-3">
                            <span class="font-serif text-xs uppercase tracking-widest text-[#8A5A44] font-semibold">Acquisition № 01</span>
                            <span class="h-px flex-1 bg-[#C9C0B3]"></span>
                        </div>

                        <h3 class="font-serif text-3xl sm:text-4xl font-normal text-[#362F2A] tracking-tight">
                            <a href="product_detail.php?id=1" class="hover:text-[#8A5A44] transition-colors">Nordic Solid Wood Armchair</a>
                        </h3>

                        <p class="text-sm text-[#6E6359] leading-relaxed">
                            A sculptural meditation in Danish ergonomics and Japanese joint assembly. Shaped from certified American walnut, with curved continuous armrests hand-planed to invite the palm's natural resting curvature.
                        </p>

                        <!-- Material Provenance Spec Ledger -->
                        <div class="space-y-2 py-3 border-y border-[#C9C0B3] text-xs">
                            <div class="flex items-center justify-between">
                                <span class="text-[#6E6359]">Timber Species</span>
                                <span class="text-[#362F2A] font-medium">American Walnut / Golden Teak</span>
                            </div>
                            <div class="flex items-center justify-between">
                                <span class="text-[#6E6359]">Joinery Technique</span>
                                <span class="text-[#362F2A] font-medium">Blind Mortise &amp; Tenon (Zero Fasteners)</span>
                            </div>
                            <div class="flex items-center justify-between">
                                <span class="text-[#6E6359]">Upholstery</span>
                                <span class="text-[#362F2A] font-medium">Natural Flax Linen Weave</span>
                            </div>
                        </div>

                        <div class="flex items-baseline justify-between pt-2">
                            <div>
                                <span class="text-2xl font-serif font-semibold text-[#362F2A]">420,000 MMK</span>
                                <span class="text-xs text-[#6E6359] block">White-glove Yangon installation included</span>
                            </div>
                            <a href="product_detail.php?id=1" class="px-6 py-3 rounded-xl bg-[#8A5A44] hover:bg-[#704735] text-[#F6F3EE] font-semibold text-xs transition-all shadow-sm hover:shadow-md">
                                Acquire Piece
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- PART B: CURATED SALON TRIPTYCH -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Companion 1: Lounge Armchair -->
                <article class="group rounded-2xl bg-[#F6F3EE] border border-[#C9C0B3] p-5 hover:border-[#8A5A44] transition-all duration-300 shadow-sm hover:shadow-md flex flex-col justify-between">
                    <div>
                        <div class="relative aspect-[4/3] rounded-xl overflow-hidden bg-[#EDE8E0] border border-[#C9C0B3] mb-5">
                            <img src="images/chairs/chair2.jpg" alt="Curved Lounge Armchair" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" loading="lazy">
                            <span class="absolute top-3 left-3 px-2 py-0.5 rounded-full text-[10px] font-semibold bg-[#DFD8CD] text-[#362F2A] border border-[#C9C0B3]">
                                Companion Piece
                            </span>
                        </div>
                        <span class="text-[10px] uppercase tracking-wider text-[#8A5A44] font-semibold block mb-1">Salon Seating</span>
                        <h4 class="font-serif text-lg font-normal text-[#362F2A] group-hover:text-[#8A5A44] transition-colors">
                            <a href="product_detail.php?id=2">Curved Lounge Armchair</a>
                        </h4>
                    </div>
                    <div class="pt-4 border-t border-[#C9C0B3] mt-4 flex items-center justify-between text-xs">
                        <span class="font-serif font-medium text-[#362F2A]">580,000 MMK</span>
                        <a href="product_detail.php?id=2" class="text-[#8A5A44] hover:text-[#704735] font-medium flex items-center gap-1">
                            <span>Details</span>
                            <i class="ri-arrow-right-line"></i>
                        </a>
                    </div>
                </article>

                <!-- Companion 2: Modular Bouclé Sofa -->
                <article class="group rounded-2xl bg-[#F6F3EE] border border-[#C9C0B3] p-5 hover:border-[#8A5A44] transition-all duration-300 shadow-sm hover:shadow-md flex flex-col justify-between">
                    <div>
                        <div class="relative aspect-[4/3] rounded-xl overflow-hidden bg-[#EDE8E0] border border-[#C9C0B3] mb-5">
                            <img src="images/couches/couch1.jpg" alt="Bouclé Modular Sofa" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" loading="lazy">
                            <span class="absolute top-3 left-3 px-2 py-0.5 rounded-full text-[10px] font-semibold bg-[#DFD8CD] text-[#362F2A] border border-[#C9C0B3]">
                                Living Hearth
                            </span>
                        </div>
                        <span class="text-[10px] uppercase tracking-wider text-[#8A5A44] font-semibold block mb-1">Sofas &amp; Sectionals</span>
                        <h4 class="font-serif text-lg font-normal text-[#362F2A] group-hover:text-[#8A5A44] transition-colors">
                            <a href="product_detail.php?id=3">Bouclé Modular Sofa</a>
                        </h4>
                    </div>
                    <div class="pt-4 border-t border-[#C9C0B3] mt-4 flex items-center justify-between text-xs">
                        <span class="font-serif font-medium text-[#362F2A]">1,250,000 MMK</span>
                        <a href="product_detail.php?id=3" class="text-[#8A5A44] hover:text-[#704735] font-medium flex items-center gap-1">
                            <span>Details</span>
                            <i class="ri-arrow-right-line"></i>
                        </a>
                    </div>
                </article>

                <!-- Companion 3: Solid Oak Table -->
                <article class="group rounded-2xl bg-[#F6F3EE] border border-[#C9C0B3] p-5 hover:border-[#8A5A44] transition-all duration-300 shadow-sm hover:shadow-md flex flex-col justify-between">
                    <div>
                        <div class="relative aspect-[4/3] rounded-xl overflow-hidden bg-[#EDE8E0] border border-[#C9C0B3] mb-5">
                            <img src="images/tables/table1.jpg" alt="Solid Natural Oak Table" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" loading="lazy">
                            <span class="absolute top-3 left-3 px-2 py-0.5 rounded-full text-[10px] font-semibold bg-[#DFD8CD] text-[#362F2A] border border-[#C9C0B3]">
                                Dining Centerpiece
                            </span>
                        </div>
                        <span class="text-[10px] uppercase tracking-wider text-[#8A5A44] font-semibold block mb-1">Dining Architecture</span>
                        <h4 class="font-serif text-lg font-normal text-[#362F2A] group-hover:text-[#8A5A44] transition-colors">
                            <a href="product_detail.php?id=4">Solid Natural Oak Table</a>
                        </h4>
                    </div>
                    <div class="pt-4 border-t border-[#C9C0B3] mt-4 flex items-center justify-between text-xs">
                        <span class="font-serif font-medium text-[#362F2A]">890,000 MMK</span>
                        <a href="product_detail.php?id=4" class="text-[#8A5A44] hover:text-[#704735] font-medium flex items-center gap-1">
                            <span>Details</span>
                            <i class="ri-arrow-right-line"></i>
                        </a>
                    </div>
                </article>
            </div>

        </div>
    </section>

    <!-- THE CRAFT MANIFESTO -->
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 lg:py-24">
        <div class="rounded-3xl bg-[#F6F3EE] border border-[#C9C0B3] p-8 sm:p-12 lg:p-16 shadow-md space-y-12">
            <div class="max-w-3xl space-y-3">
                <span class="text-xs uppercase tracking-[0.25em] text-[#8A5A44] font-semibold">The Atelier Creed</span>
                <h2 class="font-serif text-3xl sm:text-4xl text-[#362F2A] font-normal tracking-tight leading-tight">
                    Rooted in Scandinavian proportion, elevated by the sacred discipline of Japanese joinery.
                </h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-10 border-t border-[#C9C0B3] pt-10">
                <div class="space-y-3">
                    <span class="font-serif text-sm tracking-widest text-[#8A5A44] uppercase block font-semibold">I. Ethical Timber Forestry</span>
                    <h3 class="font-serif text-xl font-normal text-[#362F2A]">Certified Concessions</h3>
                    <p class="text-xs text-[#6E6359] leading-relaxed">
                        Every beam is sourced strictly from FSC &amp; PEFC-certified regional forestry concessions practicing selective low-impact harvesting.
                    </p>
                </div>
                <div class="space-y-3">
                    <span class="font-serif text-sm tracking-widest text-[#8A5A44] uppercase block font-semibold">II. Tactile Reverence</span>
                    <h3 class="font-serif text-xl font-normal text-[#362F2A]">Hand-Planed Surfaces</h3>
                    <p class="text-xs text-[#6E6359] leading-relaxed">
                        Our carpenters hand-rub organic linseed oils and beeswax waxes directly into the wood fiber so the silky living breath of the grain can always be felt.
                    </p>
                </div>
                <div class="space-y-3">
                    <span class="font-serif text-sm tracking-widest text-[#8A5A44] uppercase block font-semibold">III. Generational Patina</span>
                    <h3 class="font-serif text-xl font-normal text-[#362F2A]">Enduring Companions</h3>
                    <p class="text-xs text-[#6E6359] leading-relaxed">
                        Conceived to outlive seasonal fast-furniture fads and mature with a warm, distinctive patina through decades of everyday family domestic rituals.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- THE ATELIER JOURNAL -->
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-24">
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-12 gap-4">
            <div>
                <span class="text-xs uppercase tracking-[0.25em] text-[#8A5A44] font-semibold block mb-2">The Atelier Journal</span>
                <h2 class="font-serif text-3xl sm:text-4xl font-normal text-[#362F2A] tracking-tight">Chronicles of Material, Craft &amp; Space</h2>
            </div>
            <a href="blog.php" class="inline-flex items-center gap-2 text-xs uppercase tracking-wider text-[#8A5A44] hover:text-[#704735] font-semibold transition-colors">
                <span>All Journal Archives</span>
                <i class="ri-arrow-right-line"></i>
            </a>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-stretch">

            <!-- LEFT: FEATURED LEAD EDITORIAL STORY -->
            <article class="lg:col-span-7 rounded-3xl bg-[#F6F3EE] border border-[#C9C0B3] overflow-hidden shadow-md hover:shadow-xl hover:border-[#8A5A44] transition-all flex flex-col justify-between group">
                <a href="blog_detail.php?id=1" class="relative aspect-[16/10] overflow-hidden bg-[#EDE8E0] block border-b border-[#C9C0B3]">
                    <img src="images/blogs/blog1.jpg" alt="The Philosophy of Wabi-Sabi in Modern Interiors" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" loading="lazy">
                    <span class="absolute top-4 left-4 px-3 py-1 rounded-full text-[11px] font-semibold bg-[#DFD8CD] text-[#362F2A] border border-[#C9C0B3]">
                        Lead Editorial Essay
                    </span>
                </a>
                <div class="p-8 space-y-4">
                    <div class="flex items-center gap-3 text-xs text-[#6E6359]">
                        <span>May 21, 2026</span>
                        <span class="w-1 h-1 rounded-full bg-[#C9C0B3]"></span>
                        <span>4 min read</span>
                        <span class="w-1 h-1 rounded-full bg-[#C9C0B3]"></span>
                        <span class="text-[#8A5A44] font-medium">Atelier Editorial</span>
                    </div>
                    <h3 class="font-serif text-2xl sm:text-3xl font-normal text-[#362F2A] group-hover:text-[#8A5A44] transition-colors leading-snug">
                        <a href="blog_detail.php?id=1">The Philosophy of Wabi-Sabi in Modern Domestic Interiors</a>
                    </h3>
                    <p class="text-sm text-[#6E6359] leading-relaxed line-clamp-3">
                        How embracing natural grain knots, textured unbleached linens, and imperfect clay forms fosters an enduring sanctuary within contemporary urban homes.
                    </p>
                    <div class="pt-4 border-t border-[#C9C0B3] flex items-center justify-between">
                        <a href="blog_detail.php?id=1" class="text-xs font-semibold uppercase tracking-wider text-[#8A5A44] hover:text-[#704735] inline-flex items-center gap-1.5 transition-colors">
                            <span>Read Full Essay</span>
                            <i class="ri-arrow-right-line"></i>
                        </a>
                    </div>
                </div>
            </article>

            <!-- RIGHT: CHRONOLOGICAL DISPATCHES LEDGER -->
            <div class="lg:col-span-5 rounded-3xl bg-[#F6F3EE] border border-[#C9C0B3] p-8 shadow-md flex flex-col justify-between">
                <div>
                    <span class="text-xs uppercase tracking-widest text-[#8A5A44] font-semibold block mb-6">Recent Atelier Dispatches</span>

                    <div class="divide-y divide-[#C9C0B3]">
                        <!-- Dispatch 1 -->
                        <article class="py-5 first:pt-0 group">
                            <span class="text-[10px] text-[#6E6359] uppercase tracking-wider block mb-1">Apr 28, 2026 • By Su Thinzar Htet</span>
                            <h4 class="font-serif text-base font-normal text-[#362F2A] group-hover:text-[#8A5A44] transition-colors">
                                <a href="blog_detail.php?id=2">Joinery Without Nails: The Living Heritage of Wood Craft</a>
                            </h4>
                        </article>

                        <!-- Dispatch 2 -->
                        <article class="py-5 group">
                            <span class="text-[10px] text-[#6E6359] uppercase tracking-wider block mb-1">Apr 14, 2026 • By Thae Nay Nwe Soe</span>
                            <h4 class="font-serif text-base font-normal text-[#362F2A] group-hover:text-[#8A5A44] transition-colors">
                                <a href="blog_detail.php?id=3">Sculpting Ambient Light in Living Rooms with Paper &amp; Bronze</a>
                            </h4>
                        </article>

                        <!-- Dispatch 3 -->
                        <article class="py-5 group">
                            <span class="text-[10px] text-[#6E6359] uppercase tracking-wider block mb-1">Mar 30, 2026 • By Myat Chal Oo</span>
                            <h4 class="font-serif text-base font-normal text-[#362F2A] group-hover:text-[#8A5A44] transition-colors">
                                <a href="blog_detail.php?id=4">The Ritual of Morning Tea &amp; Minimalist Dining Furniture</a>
                            </h4>
                        </article>

                        <!-- Dispatch 4 -->
                        <article class="py-5 last:pb-0 group">
                            <span class="text-[10px] text-[#6E6359] uppercase tracking-wider block mb-1">Mar 18, 2026 • By Nyi Nyi Aung</span>
                            <h4 class="font-serif text-base font-normal text-[#362F2A] group-hover:text-[#8A5A44] transition-colors">
                                <a href="blog_detail.php?id=5">Botanical Plant Waxes: Caring for Solid Walnut &amp; Oak</a>
                            </h4>
                        </article>
                    </div>
                </div>

                <div class="pt-6 border-t border-[#C9C0B3] mt-6">
                    <a href="blog.php" class="text-xs uppercase tracking-wider text-[#8A5A44] hover:text-[#704735] font-semibold flex items-center justify-between transition-colors">
                        <span>Explore All 6 Journal Volumes</span>
                        <i class="ri-arrow-right-line"></i>
                    </a>
                </div>
            </div>

        </div>
    </section>

    <?php include "components/footer.php"; ?>
    <?php include "components/js.php"; ?>
</body>

</html>