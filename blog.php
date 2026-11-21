<?php
// Initialize session
require_once __DIR__ . '/components/session_start.php';

// Check session
require_once __DIR__ . '/components/session_check.php';

// Connect database
require_once __DIR__ . '/components/connection.php';
require_once __DIR__ . '/components/functions.php';

// Pagination setup
$limit = 6;
$page = max(1, (int)($_GET['page'] ?? 1));
$total = (int)$pdo->query("SELECT COUNT(*) FROM blogs")->fetchColumn();
$total_pages = max(1, (int)ceil($total / $limit));
if ($page > $total_pages) {
    $page = $total_pages;
}
$offset = ($page - 1) * $limit;

$stmt = $pdo->prepare("SELECT * FROM blogs ORDER BY id DESC LIMIT :limit OFFSET :offset");
$stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
$stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
$stmt->execute();
$blogs = $stmt->fetchAll();
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
        <?php if (!empty($blogs)): ?>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 sm:gap-10">
                <?php foreach ($blogs as $blog):
                    $img_src = __DIR__ . '/media/' . $blog['image'];

                    // Reading time
                    $reading_time = get_reading_time($blog['content'] ?? '');

                    // Author initials
                    $author_name = trim($blog['author'] ?? 'Atelier Editorial');
                    $words = preg_split('/\s+/', $author_name);
                    $initials = '';
                    foreach ($words as $w) {
                        if (!empty($w)) {
                            $initials .= strtoupper(mb_substr($w, 0, 1));
                        }
                    }
                    $initials = mb_substr($initials, 0, 2) ?: 'YA';

                    // Excerpt
                    $clean_content = strip_tags($blog['content'] ?? '');
                    $excerpt = mb_substr($clean_content, 0, 140);
                    if (mb_strlen($clean_content) > 140) {
                        $excerpt .= '...';
                    }
                ?>
                    <article class="group bg-[#F6F3EE] rounded-3xl border border-[#C9C0B3] overflow-hidden shadow-sm hover:shadow-xl hover:border-[#8A5A44] transition-all duration-500 flex flex-col justify-between">
                        <div>
                            <a href="blog_detail.php?id=<?= (int)$blog['id'] ?>" class="relative aspect-[16/10] overflow-hidden bg-[#EDE8E0] border-b border-[#C9C0B3] block">
                                <img src="<?= htmlspecialchars($img_src) ?>" alt="<?= htmlspecialchars($blog['title']) ?>" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" loading="lazy">
                                <span class="absolute top-4 left-4 inline-flex items-center px-3 py-1 rounded-full text-[11px] font-semibold bg-[#F6F3EE]/95 backdrop-blur-md text-[#8A5A44] border border-[#C9C0B3] shadow-xs">
                                    <?= htmlspecialchars($blog['category'] ?? 'Philosophy') ?>
                                </span>
                            </a>
                            <div class="p-6">
                                <div class="flex items-center gap-3 text-xs text-[#6E6359] mb-3">
                                    <span class="flex items-center gap-1"><i class="ri-calendar-line text-[#8A5A44]"></i> <?= date("M d, Y", strtotime($blog['created_at'])) ?></span>
                                    <span class="w-1 h-1 rounded-full bg-[#C9C0B3]"></span>
                                    <span><?= htmlspecialchars($reading_time) ?></span>
                                </div>
                                <h2 class="font-serif text-xl font-normal text-[#362F2A] group-hover:text-[#8A5A44] transition-colors leading-snug">
                                    <a href="blog_detail.php?id=<?= (int)$blog['id'] ?>"><?= htmlspecialchars($blog['title']) ?></a>
                                </h2>
                                <p class="text-sm text-[#6E6359] line-clamp-3 mt-3 leading-relaxed">
                                    <?= htmlspecialchars($excerpt) ?>
                                </p>
                            </div>
                        </div>
                        <div class="px-6 pb-6 pt-4 border-t border-[#C9C0B3] flex items-center justify-between">
                            <div class="flex items-center gap-2">
                                <span class="w-7 h-7 rounded-full bg-[#EFE9DF] text-[#8A5A44] flex items-center justify-center text-xs font-semibold"><?= htmlspecialchars($initials) ?></span>
                                <span class="text-xs font-medium text-[#6E6359]"><?= htmlspecialchars($author_name) ?></span>
                            </div>
                            <a href="blog_detail.php?id=<?= (int)$blog['id'] ?>" class="text-xs font-semibold text-stone-900 hover:text-[#8A5A44] inline-flex items-center gap-1 group-hover:translate-x-0.5 transition-transform">
                                <span>Read</span>
                                <i class="ri-arrow-right-line"></i>
                            </a>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>

            <!-- JOURNAL PAGINATION -->
            <?php if ($total_pages > 1): ?>
                <div class="mt-16 flex items-center justify-center gap-2 text-sm">
                    <?php if ($page > 1): ?>
                        <a href="blog.php?page=<?= $page - 1 ?>" aria-label="Previous Page" class="w-10 h-10 rounded-xl border border-[#C9C0B3] text-[#6E6359] hover:bg-[#DFD8CD] hover:text-[#362F2A] bg-[#F6F3EE] flex items-center justify-center font-medium transition-colors">
                            <i class="ri-arrow-left-s-line text-lg"></i>
                        </a>
                    <?php endif; ?>

                    <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                        <?php if ($i === $page): ?>
                            <span class="w-10 h-10 rounded-xl bg-[#8A5A44] text-[#F6F3EE] shadow-sm font-semibold flex items-center justify-center shadow-xs"><?= $i ?></span>
                        <?php else: ?>
                            <a href="blog.php?page=<?= $i ?>" class="w-10 h-10 rounded-xl border border-[#C9C0B3] text-[#6E6359] hover:bg-[#DFD8CD] hover:text-[#362F2A] bg-[#F6F3EE] flex items-center justify-center font-medium transition-colors"><?= $i ?></a>
                        <?php endif; ?>
                    <?php endfor; ?>

                    <?php if ($page < $total_pages): ?>
                        <a href="blog.php?page=<?= $page + 1 ?>" aria-label="Next Page" class="w-10 h-10 rounded-xl border border-[#C9C0B3] text-[#6E6359] hover:bg-[#DFD8CD] hover:text-[#362F2A] bg-[#F6F3EE] flex items-center justify-center font-medium transition-colors">
                            <i class="ri-arrow-right-s-line text-lg"></i>
                        </a>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        <?php else: ?>
            <div class="text-center py-24 bg-[#F6F3EE] rounded-3xl border border-[#C9C0B3]">
                <p class="text-[#6E6359] text-base">No journal essays published yet.</p>
            </div>
        <?php endif; ?>
    </main>

    <?php include "components/footer.php"; ?>
    <script src="js/script.js"></script>
</body>

</html>