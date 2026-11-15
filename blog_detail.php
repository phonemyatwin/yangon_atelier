<?php
// Initialize session
require_once __DIR__ . '/components/session_start.php';

// Check session
require_once __DIR__ . '/components/session_check.php';

// Connect database
require_once __DIR__ . '/components/connection.php';
require_once __DIR__ . '/components/function.php';

// Validate GET Parameter 'id'
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
if ($id <= 0) {
    header("Location: blog.php");
    exit;
}

// Query Single Article from 'blogs' table
$stmt = $pdo->prepare("SELECT * FROM blogs WHERE id = ? LIMIT 1");
$stmt->execute([$id]);
$blog = $stmt->fetch();

if (!$blog) {
    header("Location: blog.php?error=article_not_found");
    exit;
}

// Compute reading time
$reading_time = get_reading_time($blog['content'] ?? '');

// Author name and initials
$author_name = trim($blog['author'] ?? 'Atelier Editorial');
$words = preg_split('/\s+/', $author_name);
$initials = '';
foreach ($words as $w) {
    if (!empty($w)) {
        $initials .= strtoupper(mb_substr($w, 0, 1));
    }
}
$initials = mb_substr($initials, 0, 2) ?: 'YA';

// Image resolver
$img_src = resolve_blog_image($blog['image'] ?? '');

// Paragraph parsing
$paragraphs = array_filter(array_map('trim', explode("\n\n", $blog['content'] ?? '')));
if (empty($paragraphs) && !empty($blog['content'])) {
    $paragraphs = [trim($blog['content'])];
}
?>
<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($blog['title']) ?> | Yangon Atelier Journal</title>
    <link rel="icon" type="image/x-icon" href="images/favicon/favicon.ico">
    <?php include "components/css.php"; ?>
</head>

<body class="bg-[#EDE8E0] text-[#362F2A] font-sans selection:bg-[#8A5A44] selection:text-[#F6F3EE] antialiased">
    <?php include "components/header.php"; ?>
    <?php include "components/navbar.php"; ?>

    <!-- ARTICLE HEADER / HERO -->
    <article class="py-12 lg:py-16">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Back Navigation & Meta -->
            <div class="flex items-center justify-between mb-8">
                <a href="blog.php" class="inline-flex items-center gap-2 text-xs font-semibold text-[#6E6359] hover:text-[#362F2A] transition-colors">
                    <i class="ri-arrow-left-line text-sm"></i>
                    <span>Back to Journal</span>
                </a>
                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-[#DFD8CD] border border-[#C9C0B3] text-[#362F2A]">
                    <?= htmlspecialchars($blog['category'] ?? 'Philosophy') ?>
                </span>
            </div>

            <!-- Title & Lead -->
            <div class="space-y-4 mb-8">
                <h1 class="font-serif text-3xl sm:text-4xl lg:text-5xl font-normal tracking-tight text-[#362F2A] leading-[1.2]">
                    <?= htmlspecialchars($blog['title']) ?>
                </h1>
                <div class="flex items-center gap-4 text-xs text-[#6E6359] pt-2 border-b border-[#C9C0B3] pb-6">
                    <div class="flex items-center gap-2">
                        <span class="w-8 h-8 rounded-full bg-[#8A5A44] text-[#F6F3EE] flex items-center justify-center font-serif text-xs font-semibold"><?= htmlspecialchars($initials) ?></span>
                        <span class="font-medium text-[#362F2A]"><?= htmlspecialchars($author_name) ?></span>
                    </div>
                    <span class="w-1 h-1 rounded-full bg-[#C9C0B3]"></span>
                    <time datetime="<?= date('Y-m-d', strtotime($blog['created_at'])) ?>"><?= date("F j, Y", strtotime($blog['created_at'])) ?></time>
                    <span class="w-1 h-1 rounded-full bg-[#C9C0B3]"></span>
                    <span><?= htmlspecialchars($reading_time) ?></span>
                </div>
            </div>

            <!-- Featured Image -->
            <div class="rounded-3xl overflow-hidden aspect-[16/10] bg-[#EDE8E0] border border-[#C9C0B3] shadow-lg mb-12">
                <img src="<?= htmlspecialchars($img_src) ?>" alt="<?= htmlspecialchars($blog['title']) ?>" class="w-full h-full object-cover">
            </div>

            <!-- Reading Body Layout -->
            <div class="max-w-3xl mx-auto space-y-6 text-base sm:text-lg text-[#362F2A] leading-relaxed font-normal">
                <?php foreach ($paragraphs as $index => $paragraph): ?>
                    <?php if ($index === 0): ?>
                        <p class="first-letter:float-left first-letter:text-5xl first-letter:pr-4 first-letter:font-serif first-letter:text-[#362F2A] first-letter:leading-none">
                            <?= nl2br(htmlspecialchars($paragraph)) ?>
                        </p>
                    <?php else: ?>
                        <p>
                            <?= nl2br(htmlspecialchars($paragraph)) ?>
                        </p>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>

            <!-- Author Bio Box -->
            <div class="max-w-3xl mx-auto mt-14 p-6 sm:p-8 rounded-3xl bg-[#F6F3EE] border border-[#C9C0B3] shadow-md flex flex-col sm:flex-row items-center sm:items-start gap-6">
                <span class="w-16 h-16 rounded-2xl bg-[#8A5A44] text-[#F6F3EE] flex items-center justify-center font-serif text-xl font-medium flex-shrink-0">
                    <?= htmlspecialchars($initials) ?>
                </span>
                <div class="space-y-2 text-center sm:text-left">
                    <h3 class="font-serif text-lg font-semibold text-[#362F2A]"><?= htmlspecialchars($author_name) ?></h3>
                    <p class="text-xs text-[#6E6359] leading-relaxed">
                        Curator and resident craft practitioner at Yangon Atelier. Documenting material studies, sustainable forestry reports, and spatial interior philosophy for contemporary sanctuaries.
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
    <script src="js/script.js"></script>
</body>

</html>