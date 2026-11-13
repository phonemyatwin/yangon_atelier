<?php
/**
 * ============================================================================
 * YANGON ATELIER BACKEND INSTRUCTION GUIDELINE - JOURNAL / BLOG ARCHIVES
 * ============================================================================
 * FILE: blog.php
 * PURPOSE: Queries and presents editorial journal essays, craft chronicles,
 *          and design philosophy articles from the 'blogs' table.
 * 
 * STEP-BY-STEP IMPLEMENTATION GUIDE:
 * 1. Initialize Session & Database:
 *    if (session_status() === PHP_SESSION_NONE) { session_start(); }
 *    require_once "components/connection.php";
 * 
 * 2. Execute Query to Retrieve All Blog Posts:
 *    $query = "SELECT id, title, author, image, content, category, created_at FROM blogs ORDER BY id DESC";
 *    $result = $connection->query($query);
 *    $blogs = [];
 *    if ($result) {
 *        $blogs = $result->fetch_all(MYSQLI_ASSOC);
 *    }
 * 
 * 3. Render Dynamic Articles:
 *    Loop through $blogs and populate titles, dates, excerpts, and image paths.
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
    <title>The Atelier Journal | Yangon Atelier</title>
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
                <span class="text-[#8A5A44] font-semibold">The Atelier Journal</span>
            </nav>
            <div class="max-w-3xl">
                <h1 class="font-serif text-3xl sm:text-4xl lg:text-5xl font-normal tracking-tight text-[#362F2A]">
                    Chronicles of Craft, Wood &amp; Sanctuary.
                </h1>
                <p class="text-sm sm:text-base text-[#6E6359] mt-3 leading-relaxed">
                    Essays on spatial harmony, sustainable forestry, interior wabi-sabi philosophy, and tactile living.
                </p>
            </div>
        </div>
    </header>

    <!-- MAIN JOURNAL CONTENT -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 lg:py-24">
        <!-- ==================================================================
             PHP BACKEND GUIDELINE: Dynamic Blog Posts Loop
             Query: SELECT * FROM blogs ORDER BY id DESC
             Replace static articles below with a foreach loop:
             
             <?php /*
             if (!empty($blogs)) {
                 foreach ($blogs as $blog) {
                     ?>
                     <article class="group bg-[#F6F3EE] rounded-3xl border border-[#C9C0B3] overflow-hidden shadow-sm hover:shadow-xl hover:border-[#8A5A44] transition-all duration-500 flex flex-col justify-between">
                         <div>
                             <a href="blog_detail.php?id=<?= $blog['id'] ?>" class="relative aspect-[16/10] overflow-hidden bg-[#EDE8E0] border-b border-[#C9C0B3] block">
                                 <img src="images/<?= htmlspecialchars($blog['image']) ?>" alt="<?= htmlspecialchars($blog['title']) ?>" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" loading="lazy">
                                 <span class="absolute top-4 left-4 inline-flex items-center px-3 py-1 rounded-full text-[11px] font-semibold bg-[#F6F3EE]/95 backdrop-blur-md text-[#8A5A44] border border-[#C9C0B3] shadow-xs">
                                     <?= htmlspecialchars($blog['category'] ?? 'Editorial') ?>
                                 </span>
                             </a>
                             <div class="p-6">
                                 <div class="flex items-center gap-3 text-xs text-[#6E6359] mb-3">
                                     <span class="flex items-center gap-1"><i class="ri-calendar-line text-[#8A5A44]"></i> <?= date("M d, Y", strtotime($blog['created_at'])) ?></span>
                                     <span class="w-1 h-1 rounded-full bg-[#C9C0B3]"></span>
                                     <span>By <?= htmlspecialchars($blog['author'] ?? 'Atelier') ?></span>
                                 </div>
                                 <h2 class="font-serif text-xl font-normal text-[#362F2A] group-hover:text-[#8A5A44] transition-colors leading-snug">
                                     <a href="blog_detail.php?id=<?= $blog['id'] ?>"><?= htmlspecialchars($blog['title']) ?></a>
                                 </h2>
                                 <p class="text-sm text-[#6E6359] line-clamp-3 mt-3 leading-relaxed">
                                     <?= htmlspecialchars(substr(strip_tags($blog['content']), 0, 150)) ?>...
                                 </p>
                             </div>
                         </div>
                         <div class="p-6 pt-0">
                             <a href="blog_detail.php?id=<?= $blog['id'] ?>" class="text-xs font-semibold text-[#8A5A44] hover:underline flex items-center gap-1">
                                 <span>Read Full Essay</span>
                                 <i class="ri-arrow-right-line"></i>
                             </a>
                         </div>
                     </article>
                     <?php
                 }
             } else {
                 echo '<p class="col-span-full text-center py-12 text-[#C9C0B3]">No journal essays published yet.</p>';
             }
             */ ?>
             ================================================================== -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 sm:gap-10">
            
            <!-- Journal Post 1 -->
            <article class="group bg-[#F6F3EE] rounded-3xl border border-[#C9C0B3] overflow-hidden shadow-sm hover:shadow-xl hover:border-[#8A5A44] transition-all duration-500 flex flex-col justify-between">
                <div>
                    <a href="blog_detail.php?id=1" class="relative aspect-[16/10] overflow-hidden bg-[#EDE8E0] border-b border-[#C9C0B3] block">
                        <img src="images/blogs/blog1.jpg" alt="The Philosophy of Wabi-Sabi in Modern Interiors" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" loading="lazy">
                        <span class="absolute top-4 left-4 inline-flex items-center px-3 py-1 rounded-full text-[11px] font-semibold bg-[#F6F3EE]/95 backdrop-blur-md text-[#8A5A44] border border-[#C9C0B3] shadow-xs">
                            Philosophy
                        </span>
                    </a>
                    <div class="p-6">
                        <div class="flex items-center gap-3 text-xs text-[#6E6359] mb-3">
                            <span class="flex items-center gap-1"><i class="ri-calendar-line text-[#8A5A44]"></i> May 21, 2026</span>
                            <span class="w-1 h-1 rounded-full bg-[#C9C0B3]"></span>
                            <span>4 min read</span>
                        </div>
                        <h2 class="font-serif text-xl font-normal text-[#362F2A] group-hover:text-[#8A5A44] transition-colors leading-snug">
                            <a href="blog_detail.php?id=1">The Philosophy of Wabi-Sabi in Modern Interiors</a>
                        </h2>
                        <p class="text-sm text-[#6E6359] line-clamp-3 mt-3 leading-relaxed">
                            How embracing natural grain knots, textured linens, and imperfect clay forms fosters sanctuary within contemporary urban homes.
                        </p>
                    </div>
                </div>
                <div class="px-6 pb-6 pt-4 border-t border-[#C9C0B3] flex items-center justify-between">
                    <div class="flex items-center gap-2">
                        <span class="w-7 h-7 rounded-full bg-[#EFE9DF] text-[#8A5A44] flex items-center justify-center text-xs font-semibold">ED</span>
                        <span class="text-xs font-medium text-[#6E6359]">Editorial Staff</span>
                    </div>
                    <a href="blog_detail.php?id=1" class="text-xs font-semibold text-stone-900 hover:text-[#8A5A44] inline-flex items-center gap-1 group-hover:translate-x-0.5 transition-transform">
                        <span>Read</span>
                        <i class="ri-arrow-right-line"></i>
                    </a>
                </div>
            </article>

            <!-- Journal Post 2 -->
            <article class="group bg-[#F6F3EE] rounded-3xl border border-[#C9C0B3] overflow-hidden shadow-sm hover:shadow-xl hover:border-[#8A5A44] transition-all duration-500 flex flex-col justify-between">
                <div>
                    <a href="blog_detail.php?id=2" class="relative aspect-[16/10] overflow-hidden bg-[#EDE8E0] border-b border-[#C9C0B3] block">
                        <img src="images/blogs/blog2.jpg" alt="Joinery Without Nails: The Heritage of Wood Craft" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" loading="lazy">
                        <span class="absolute top-4 left-4 inline-flex items-center px-3 py-1 rounded-full text-[11px] font-semibold bg-[#F6F3EE]/95 backdrop-blur-md text-[#8A5A44] border border-[#C9C0B3] shadow-xs">
                            Artisanship
                        </span>
                    </a>
                    <div class="p-6">
                        <div class="flex items-center gap-3 text-xs text-[#6E6359] mb-3">
                            <span class="flex items-center gap-1"><i class="ri-calendar-line text-[#8A5A44]"></i> Apr 28, 2026</span>
                            <span class="w-1 h-1 rounded-full bg-[#C9C0B3]"></span>
                            <span>6 min read</span>
                        </div>
                        <h2 class="font-serif text-xl font-normal text-[#362F2A] group-hover:text-[#8A5A44] transition-colors leading-snug">
                            <a href="blog_detail.php?id=2">Joinery Without Nails: The Heritage of Wood Craft</a>
                        </h2>
                        <p class="text-sm text-[#6E6359] line-clamp-3 mt-3 leading-relaxed">
                            A deep look inside our workshop where master carpenters shape interlocking joints that withstand temperature shifts for generations.
                        </p>
                    </div>
                </div>
                <div class="px-6 pb-6 pt-4 border-t border-[#C9C0B3] flex items-center justify-between">
                    <div class="flex items-center gap-2">
                        <span class="w-7 h-7 rounded-full bg-[#EFE9DF] text-[#8A5A44] flex items-center justify-center text-xs font-semibold">ST</span>
                        <span class="text-xs font-medium text-[#6E6359]">Su Thinzar Htet</span>
                    </div>
                    <a href="blog_detail.php?id=2" class="text-xs font-semibold text-stone-900 hover:text-[#8A5A44] inline-flex items-center gap-1 group-hover:translate-x-0.5 transition-transform">
                        <span>Read</span>
                        <i class="ri-arrow-right-line"></i>
                    </a>
                </div>
            </article>

            <!-- Journal Post 3 -->
            <article class="group bg-[#F6F3EE] rounded-3xl border border-[#C9C0B3] overflow-hidden shadow-sm hover:shadow-xl hover:border-[#8A5A44] transition-all duration-500 flex flex-col justify-between">
                <div>
                    <a href="blog_detail.php?id=3" class="relative aspect-[16/10] overflow-hidden bg-[#EDE8E0] border-b border-[#C9C0B3] block">
                        <img src="images/blogs/blog3.jpg" alt="Sculpting Ambient Light in Living Rooms" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" loading="lazy">
                        <span class="absolute top-4 left-4 inline-flex items-center px-3 py-1 rounded-full text-[11px] font-semibold bg-[#F6F3EE]/95 backdrop-blur-md text-[#8A5A44] border border-[#C9C0B3] shadow-xs">
                            Lighting
                        </span>
                    </a>
                    <div class="p-6">
                        <div class="flex items-center gap-3 text-xs text-[#6E6359] mb-3">
                            <span class="flex items-center gap-1"><i class="ri-calendar-line text-[#8A5A44]"></i> Apr 14, 2026</span>
                            <span class="w-1 h-1 rounded-full bg-[#C9C0B3]"></span>
                            <span>5 min read</span>
                        </div>
                        <h2 class="font-serif text-xl font-normal text-[#362F2A] group-hover:text-[#8A5A44] transition-colors leading-snug">
                            <a href="blog_detail.php?id=3">Sculpting Ambient Light in Living Rooms</a>
                        </h2>
                        <p class="text-sm text-[#6E6359] line-clamp-3 mt-3 leading-relaxed">
                            How soft indirect fixtures and natural parchment shades change the emotional cadence of our domestic evenings.
                        </p>
                    </div>
                </div>
                <div class="px-6 pb-6 pt-4 border-t border-[#C9C0B3] flex items-center justify-between">
                    <div class="flex items-center gap-2">
                        <span class="w-7 h-7 rounded-full bg-[#EFE9DF] text-[#8A5A44] flex items-center justify-center text-xs font-semibold">TN</span>
                        <span class="text-xs font-medium text-[#6E6359]">Thae Nay Nwe Soe</span>
                    </div>
                    <a href="blog_detail.php?id=3" class="text-xs font-semibold text-stone-900 hover:text-[#8A5A44] inline-flex items-center gap-1 group-hover:translate-x-0.5 transition-transform">
                        <span>Read</span>
                        <i class="ri-arrow-right-line"></i>
                    </a>
                </div>
            </article>

            <!-- Journal Post 4 -->
            <article class="group bg-[#F6F3EE] rounded-3xl border border-[#C9C0B3] overflow-hidden shadow-sm hover:shadow-xl hover:border-[#8A5A44] transition-all duration-500 flex flex-col justify-between">
                <div>
                    <a href="blog_detail.php?id=4" class="relative aspect-[16/10] overflow-hidden bg-[#EDE8E0] border-b border-[#C9C0B3] block">
                        <img src="images/blogs/blog4.jpg" alt="The Ritual of Morning Tea & Minimalist Dining" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" loading="lazy">
                        <span class="absolute top-4 left-4 inline-flex items-center px-3 py-1 rounded-full text-[11px] font-semibold bg-[#F6F3EE]/95 backdrop-blur-md text-[#8A5A44] border border-[#C9C0B3] shadow-xs">
                            Living Rituals
                        </span>
                    </a>
                    <div class="p-6">
                        <div class="flex items-center gap-3 text-xs text-[#6E6359] mb-3">
                            <span class="flex items-center gap-1"><i class="ri-calendar-line text-[#8A5A44]"></i> Mar 30, 2026</span>
                            <span class="w-1 h-1 rounded-full bg-[#C9C0B3]"></span>
                            <span>3 min read</span>
                        </div>
                        <h2 class="font-serif text-xl font-normal text-[#362F2A] group-hover:text-[#8A5A44] transition-colors leading-snug">
                            <a href="blog_detail.php?id=4">The Ritual of Morning Tea &amp; Minimalist Dining</a>
                        </h2>
                        <p class="text-sm text-[#6E6359] line-clamp-3 mt-3 leading-relaxed">
                            Transforming the morning routine through uncluttered solid oak surfaces, tactile ceramic cups, and natural daylight.
                        </p>
                    </div>
                </div>
                <div class="px-6 pb-6 pt-4 border-t border-[#C9C0B3] flex items-center justify-between">
                    <div class="flex items-center gap-2">
                        <span class="w-7 h-7 rounded-full bg-[#EFE9DF] text-[#8A5A44] flex items-center justify-center text-xs font-semibold">ED</span>
                        <span class="text-xs font-medium text-[#6E6359]">Editorial Staff</span>
                    </div>
                    <a href="blog_detail.php?id=4" class="text-xs font-semibold text-stone-900 hover:text-[#8A5A44] inline-flex items-center gap-1 group-hover:translate-x-0.5 transition-transform">
                        <span>Read</span>
                        <i class="ri-arrow-right-line"></i>
                    </a>
                </div>
            </article>

            <!-- Journal Post 5 -->
            <article class="group bg-[#F6F3EE] rounded-3xl border border-[#C9C0B3] overflow-hidden shadow-sm hover:shadow-xl hover:border-[#8A5A44] transition-all duration-500 flex flex-col justify-between">
                <div>
                    <a href="blog_detail.php?id=5" class="relative aspect-[16/10] overflow-hidden bg-[#EDE8E0] border-b border-[#C9C0B3] block">
                        <img src="images/blogs/blog5.jpg" alt="Botanical Plant Waxes: Caring for Solid Wood" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" loading="lazy">
                        <span class="absolute top-4 left-4 inline-flex items-center px-3 py-1 rounded-full text-[11px] font-semibold bg-[#F6F3EE]/95 backdrop-blur-md text-[#8A5A44] border border-[#C9C0B3] shadow-xs">
                            Maintenance
                        </span>
                    </a>
                    <div class="p-6">
                        <div class="flex items-center gap-3 text-xs text-[#6E6359] mb-3">
                            <span class="flex items-center gap-1"><i class="ri-calendar-line text-[#8A5A44]"></i> Mar 18, 2026</span>
                            <span class="w-1 h-1 rounded-full bg-[#C9C0B3]"></span>
                            <span>5 min read</span>
                        </div>
                        <h2 class="font-serif text-xl font-normal text-[#362F2A] group-hover:text-[#8A5A44] transition-colors leading-snug">
                            <a href="blog_detail.php?id=5">Botanical Plant Waxes: Caring for Solid Wood</a>
                        </h2>
                        <p class="text-sm text-[#6E6359] line-clamp-3 mt-3 leading-relaxed">
                            Practical steps to protect unvarnished timber from dryness, humidity shifts, and everyday stains while preserving the velvet feel.
                        </p>
                    </div>
                </div>
                <div class="px-6 pb-6 pt-4 border-t border-[#C9C0B3] flex items-center justify-between">
                    <div class="flex items-center gap-2">
                        <span class="w-7 h-7 rounded-full bg-[#EFE9DF] text-[#8A5A44] flex items-center justify-center text-xs font-semibold">NA</span>
                        <span class="text-xs font-medium text-[#6E6359]">Nyi Nyi Aung</span>
                    </div>
                    <a href="blog_detail.php?id=5" class="text-xs font-semibold text-stone-900 hover:text-[#8A5A44] inline-flex items-center gap-1 group-hover:translate-x-0.5 transition-transform">
                        <span>Read</span>
                        <i class="ri-arrow-right-line"></i>
                    </a>
                </div>
            </article>

            <!-- Journal Post 6 -->
            <article class="group bg-[#F6F3EE] rounded-3xl border border-[#C9C0B3] overflow-hidden shadow-sm hover:shadow-xl hover:border-[#8A5A44] transition-all duration-500 flex flex-col justify-between">
                <div>
                    <a href="blog_detail.php?id=6" class="relative aspect-[16/10] overflow-hidden bg-[#EDE8E0] border-b border-[#C9C0B3] block">
                        <img src="images/blogs/blog6.jpg" alt="Designing Quiet Havens in High-Density Cities" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" loading="lazy">
                        <span class="absolute top-4 left-4 inline-flex items-center px-3 py-1 rounded-full text-[11px] font-semibold bg-[#F6F3EE]/95 backdrop-blur-md text-[#8A5A44] border border-[#C9C0B3] shadow-xs">
                            Architecture
                        </span>
                    </a>
                    <div class="p-6">
                        <div class="flex items-center gap-3 text-xs text-[#6E6359] mb-3">
                            <span class="flex items-center gap-1"><i class="ri-calendar-line text-[#8A5A44]"></i> Feb 27, 2026</span>
                            <span class="w-1 h-1 rounded-full bg-[#C9C0B3]"></span>
                            <span>7 min read</span>
                        </div>
                        <h2 class="font-serif text-xl font-normal text-[#362F2A] group-hover:text-[#8A5A44] transition-colors leading-snug">
                            <a href="blog_detail.php?id=6">Designing Quiet Havens in High-Density Cities</a>
                        </h2>
                        <p class="text-sm text-[#6E6359] line-clamp-3 mt-3 leading-relaxed">
                            How low-profile floor silhouettes and muted earth pigments buffer sensory fatigue in modern apartment dwellings.
                        </p>
                    </div>
                </div>
                <div class="px-6 pb-6 pt-4 border-t border-[#C9C0B3] flex items-center justify-between">
                    <div class="flex items-center gap-2">
                        <span class="w-7 h-7 rounded-full bg-[#EFE9DF] text-[#8A5A44] flex items-center justify-center text-xs font-semibold">PW</span>
                        <span class="text-xs font-medium text-[#6E6359]">Phone Myat Win</span>
                    </div>
                    <a href="blog_detail.php?id=6" class="text-xs font-semibold text-stone-900 hover:text-[#8A5A44] inline-flex items-center gap-1 group-hover:translate-x-0.5 transition-transform">
                        <span>Read</span>
                        <i class="ri-arrow-right-line"></i>
                    </a>
                </div>
            </article>

        </div>

        <!-- JOURNAL PAGINATION -->
        <div class="mt-16 flex items-center justify-center gap-2 text-sm">
            <span class="w-10 h-10 rounded-xl bg-[#8A5A44] text-[#F6F3EE] shadow-sm font-semibold flex items-center justify-center font-medium shadow-xs">1</span>
            <a href="blog.php?page=2" class="w-10 h-10 rounded-xl border border-[#C9C0B3] text-[#6E6359] hover:bg-[#DFD8CD] hover:text-[#362F2A] bg-[#F6F3EE] flex items-center justify-center font-medium transition-colors">2</a>
            <a href="blog.php?page=2" class="w-10 h-10 rounded-xl border border-[#C9C0B3] text-[#6E6359] hover:bg-[#DFD8CD] hover:text-[#362F2A] bg-[#F6F3EE] flex items-center justify-center font-medium transition-colors">
                <i class="ri-arrow-right-s-line text-lg"></i>
            </a>
        </div>
    </main>

    <?php include "components/footer.php"; ?>
    <?php include "components/js.php"; ?>
</body>

</html>
