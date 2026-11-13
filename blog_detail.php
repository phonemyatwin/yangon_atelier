<?php
/**
 * ============================================================================
 * FURNISHME BACKEND INSTRUCTION GUIDELINE - JOURNAL ESSAY DETAIL
 * ============================================================================
 * FILE: blog_detail.php
 * PURPOSE: Queries and renders a single editorial journal essay based on the
 *          provided GET parameter 'id'.
 * 
 * STEP-BY-STEP IMPLEMENTATION GUIDE:
 * 1. Initialize Session & Database:
 *    if (session_status() === PHP_SESSION_NONE) { session_start(); }
 *    require_once "components/connection.php";
 * 
 * 2. Validate GET Parameter 'id':
 *    $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
 *    if ($id <= 0) {
 *        header("Location: blog.php");
 *        exit;
 *    }
 * 
 * 3. Query Single Article from 'blogs' table:
 *    $stmt = $connection->prepare("SELECT * FROM blogs WHERE id = ? LIMIT 1");
 *    $stmt->bind_param("i", $id);
 *    $stmt->execute();
 *    $result = $stmt->get_result();
 *    $blog = $result->fetch_assoc();
 *    $stmt->close();
 * 
 *    if (!$blog) {
 *        header("Location: blog.php?error=article_not_found");
 *        exit;
 *    }
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
    <!-- ==================================================================
         PHP BACKEND GUIDELINE: Dynamic Page Title
         <title><?= htmlspecialchars($blog['title'] ?? 'Journal Article') ?> | FurnishMe Atelier Journal</title>
         ================================================================== -->
    <title>The Philosophy of Wabi-Sabi in Modern Interiors | FurnishMe Atelier Journal</title>
    <link rel="icon" type="image/x-icon" href="images/favicon.ico">
    <?php include "components/css.php"; ?>
</head>

<body class="bg-[#EDE8E0] text-[#362F2A] font-sans selection:bg-[#8A5A44] selection:text-[#F6F3EE] antialiased">
    <?php include "components/header.php"; ?>
    <?php include "components/navbar.php"; ?>

    <!-- ARTICLE HEADER / HERO -->
    <!-- ==================================================================
         PHP BACKEND GUIDELINE: Single Article Display
         Use variables from $blog:
         - &lt;?= htmlspecialchars($blog['title'] ?? '') ?&gt;
         - &lt;?= htmlspecialchars($blog['author'] ?? '') ?&gt;
         - &lt;?= date("F j, Y", strtotime($blog['created_at'] ?? 'now')) ?&gt;
         - src="images/&lt;?= htmlspecialchars($blog['image'] ?? '') ?&gt;"
         - &lt;?= nl2br($blog['content'] ?? '') ?&gt;
         ================================================================== -->
    <article class="py-12 lg:py-16">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <!-- Back Navigation & Meta -->
            <div class="flex items-center justify-between mb-8">
                <a href="blog.php" class="inline-flex items-center gap-2 text-xs font-semibold text-[#6E6359] hover:text-[#362F2A] transition-colors">
                    <i class="ri-arrow-left-line text-sm"></i>
                    <span>Back to Journal</span>
                </a>
                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-[#DFD8CD] border border-[#C9C0B3] text-[#362F2A]">
                    Interior Philosophy
                </span>
            </div>

            <!-- Title & Lead -->
            <div class="space-y-4 mb-8">
                <!-- [PHP_BACKEND_HOOK: Dynamic blog title: $blog['title']] -->
                <h1 class="font-serif text-3xl sm:text-4xl lg:text-5xl font-normal tracking-tight text-[#362F2A] leading-[1.2]">
                    The Philosophy of Wabi-Sabi in Modern Interiors
                </h1>
                <div class="flex items-center gap-4 text-xs text-[#6E6359] pt-2 border-b border-[#C9C0B3] pb-6">
                    <div class="flex items-center gap-2">
                        <span class="w-8 h-8 rounded-full bg-[#8A5A44] text-[#F6F3EE] flex items-center justify-center font-serif text-xs font-semibold">ED</span>
                        <span class="font-medium text-[#362F2A]">Atelier Editorial</span>
                    </div>
                    <span class="w-1 h-1 rounded-full bg-[#C9C0B3]"></span>
                    <time datetime="2026-05-21">May 21, 2026</time>
                    <span class="w-1 h-1 rounded-full bg-[#C9C0B3]"></span>
                    <span>4 min read</span>
                </div>
            </div>

            <!-- Featured Image -->
            <!-- [PHP_BACKEND_HOOK: Dynamic blog image: $blog['image']] -->
            <div class="rounded-3xl overflow-hidden aspect-[16/10] bg-[#EDE8E0] border border-[#C9C0B3] shadow-lg mb-12">
                <img src="images/blog-minimalist-spaces.jpg" alt="The Philosophy of Wabi-Sabi in Modern Interiors" class="w-full h-full object-cover">
            </div>

            <!-- Reading Body Layout (max-w-3xl) -->
            <!-- [PHP_BACKEND_HOOK: Dynamic blog content rendering: $blog['content']] -->
            <div class="max-w-3xl mx-auto space-y-6 text-base sm:text-lg text-[#362F2A] leading-relaxed font-normal">
                <p class="first-letter:float-left first-letter:text-5xl first-letter:pr-4 first-letter:font-serif first-letter:text-[#362F2A] first-letter:leading-none">
                    In an era saturated by industrial high-gloss surfaces, clinical lines, and the constant digital flicker of notifications, our domestic environments have frequently sacrificed soul for sterile uniformity. Japanese philosophy offers an enduring antidote through the worldview of <em>wabi-sabi</em>: the appreciation of beauty that is imperfect, impermanent, and incomplete.
                </p>

                <p>
                    When applied to the curation of the contemporary home, wabi-sabi does not signify austerity or neglected rusticity. Rather, it represents a deep reverence for authenticity. It encourages us to celebrate the natural swirl of teak grain, the gentle curvature of steam-bent walnut, and the tactile weave of undyed coarse linen that grows softer with every turn of the seasons.
                </p>

                <!-- Editorial Pull Quote -->
                <blockquote class="my-10 border-l-2 border-[#8A5A44] pl-6 py-3 italic font-serif text-xl sm:text-2xl text-[#362F2A] leading-snug bg-[#DFD8CD] border-y border-r border-[#C9C0B3] rounded-r-2xl">
                    "True luxury in modern living is the tactile reassurance that an object was shaped by human hands and will mature alongside your own life."
                </blockquote>

                <h2 class="font-serif text-2xl sm:text-3xl font-normal text-[#362F2A] pt-4">
                    The Three Disciplines of Mindful Space
                </h2>

                <p>
                    Integrating this serene cadence into our living rooms begins not with acquiring more decorative accents, but with pruning away the superfluous:
                </p>

                <ul class="space-y-4 pl-6 list-disc list-outside text-[#362F2A] text-base">
                    <li>
                        <strong class="text-[#362F2A]">Embracing the Breath of Empty Space (<em>Ma</em>):</strong> 
                        Allow furniture pieces room to breathe. A single sculpted armchair bathed in the angled amber glow of afternoon light exerts far more grounding power than a crowded cluster of furnishings.
                    </li>
                    <li>
                        <strong class="text-[#362F2A]">Honest Materials Over Mimicry:</strong> 
                        Reject synthetic veneers and laminate imitations. Solid timber reacts to the climate, accepts patina, and can be sanded or oiled after a decade of memories rather than discarded into a landfill.
                    </li>
                    <li>
                        <strong class="text-[#362F2A]">Subtle Illumination:</strong> 
                        Replace glaring ceiling downlights with low-slung paper pendants and table lamps that cast warm, tranquil pools of indirect ambient light.
                    </li>
                </ul>

                <p class="pt-4">
                    As we navigate the complexities of contemporary life, returning each evening to an atelier sanctuary grounded in warmth, proportion, and quiet timber reminds us of our innate kinship with the natural world.
                </p>
            </div>

            <!-- Author Bio Box -->
            <div class="max-w-3xl mx-auto mt-14 p-6 sm:p-8 rounded-3xl bg-[#F6F3EE] border border-[#C9C0B3] shadow-md flex flex-col sm:flex-row items-center sm:items-start gap-6">
                <span class="w-16 h-16 rounded-2xl bg-[#8A5A44] text-[#F6F3EE] flex items-center justify-center font-serif text-xl font-medium flex-shrink-0">
                    ED
                </span>
                <div class="space-y-2 text-center sm:text-left">
                    <h3 class="font-serif text-lg font-semibold text-[#362F2A]">FurnishMe Editorial Collective</h3>
                    <p class="text-xs text-[#6E6359] leading-relaxed">
                        Curated by our resident architects and wood craft historians based in Yangon. We document material studies, sustainable forestry reports, and spatial philosophy.
                    </p>
                </div>
            </div>

            <!-- Back to Journal CTA -->
            <div class="max-w-3xl mx-auto mt-12 pt-8 border-t border-[#C9C0B3] flex items-center justify-between">
                <a href="blog.php" class="inline-flex items-center gap-2 text-sm font-semibold text-[#362F2A] hover:text-[#8A5A44] transition-colors">
                    <i class="ri-arrow-left-line"></i>
                    <span>All Journal Entries</span>
                </a>
                <a href="shop.php" class="inline-flex items-center gap-2 text-sm font-semibold text-[#362F2A] hover:text-[#8A5A44] transition-colors">
                    <span>Explore Featured Furniture</span>
                    <i class="ri-arrow-right-line"></i>
                </a>
            </div>

        </div>
    </article>

    <?php include "components/footer.php"; ?>
    <?php include "components/js.php"; ?>
</body>

</html>
