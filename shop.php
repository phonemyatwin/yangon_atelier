<?php
// Initialize session
require_once __DIR__ . '/components/session_start.php';

// Check session
require_once __DIR__ . '/components/session_check.php';

// Connect database
require_once __DIR__ . '/components/connection.php';

// Function 
require_once __DIR__ . "/components/functions.php";

$category = trim($_GET['category'] ?? 'all');
$search   = trim($_GET['search'] ?? '');
$sort     = trim($_GET['sort'] ?? 'featured');

$error = '';
$limit = 8;
$products = [];
$total_products = 0;
$total_pages = 1;
$page = max(1, (int)($_GET['page'] ?? 1));

$where_clauses = [];
$params = [];

if ($category !== '' && $category !== 'all') {
    $where_clauses[] = "category = ?";
    $params[] = $category;
}

if ($search !== '') {
    $where_clauses[] = "(name LIKE ? OR description LIKE ?)";
    $search_wildcard = "%" . $search . "%";
    $params[] = $search_wildcard;
    $params[] = $search_wildcard;
}

$where_sql = !empty($where_clauses) ? "WHERE " . implode(" AND ", $where_clauses) : "";

$order_sql = match ($sort) {
    'price_asc'  => "ORDER BY price ASC",
    'price_desc' => "ORDER BY price DESC",
    'name_asc'   => "ORDER BY name ASC",
    default      => "ORDER BY id DESC",
};

try {
    $count_sql = "SELECT COUNT(*) FROM products $where_sql";
    $count_stmt = $pdo->prepare($count_sql);
    $count_stmt->execute($params);
    $total_products = (int)$count_stmt->fetchColumn();
    $total_pages = max(1, (int)ceil($total_products / $limit));
    if ($page > $total_pages) {
        $page = $total_pages;
    }

    $offset = ($page - 1) * $limit;
    $sql = "SELECT * FROM products $where_sql $order_sql LIMIT ? OFFSET ?";
    $stmt = $pdo->prepare($sql);
    $query_params = array_merge($params, [$limit, $offset]);
    $stmt->execute($query_params);
    $products = $stmt->fetchAll();
} catch (PDOException $e) {
    error_log("Products fetch error: " . $e->getMessage() . "\n", 3, __DIR__ . "/error.log");
    $error = "Unable to retrieve products. Please try again later.";
}

$categories = [
    'chairs'  => 'Chairs & Seating',
    'sofas'   => 'Sofas & Lounge',
    'tables'  => 'Tables & Desks',
    'beds'    => 'Beds & Tatami'
];

$sort_labels = [
    'featured'   => 'Sort: Featured',
    'price_asc'  => 'Price: Low to High',
    'price_desc' => 'Price: High to Low',
    'name_asc'   => 'Name: A to Z',
];
if (!array_key_exists($sort, $sort_labels)) {
    $sort = 'featured';
}

function build_shop_url(array $overrides = []): string
{
    global $category, $search, $sort;
    $query = array_merge([
        'category' => $category,
        'search'   => $search,
        'sort'     => $sort,
    ], $overrides);

    if (($query['category'] ?? 'all') === 'all' || $query['category'] === '') {
        unset($query['category']);
    }
    if (($query['search'] ?? '') === '') {
        unset($query['search']);
    }
    if (($query['sort'] ?? 'featured') === 'featured') {
        unset($query['sort']);
    }
    if (($query['page'] ?? 1) <= 1) {
        unset($query['page']);
    }

    $qs = http_build_query($query);
    return 'shop.php' . ($qs !== '' ? '?' . $qs : '');
}
?>

<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop Atelier Furniture | Yangon Atelier</title>
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
                <span class="text-[#6E6359]">/</span>
                <span class="text-[#8A5A44] font-semibold">Shop Atelier</span>
            </nav>
            <div class="flex flex-col md:flex-row md:items-end justify-between gap-4">
                <div>
                    <h1 class="font-serif text-3xl sm:text-4xl lg:text-5xl font-normal tracking-tight text-[#362F2A]">
                        The Furniture Collection
                    </h1>
                    <p class="text-sm sm:text-base text-[#6E6359] max-w-xl mt-2 leading-relaxed">
                        Thoughtfully scaled architectural essentials made from solid walnut, natural oak, and textured tactile fabrics.
                    </p>
                </div>
                <div class="text-xs text-[#6E6359]">
                    Showing <strong id="product-count" class="text-[#8A5A44] font-semibold"><?= count($products); ?></strong> curated atelier pieces
                </div>
            </div>
        </div>
    </header>

    <!-- SHOPPING CONTROLS & FILTER BAR -->
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="bg-[#F6F3EE] border border-[#C9C0B3] rounded-3xl p-4 sm:p-5 shadow-xl flex flex-col lg:flex-row items-stretch lg:items-center justify-between gap-4">

            <!-- Category Filter Pills -->
            <div class="flex items-center gap-2 overflow-x-auto pb-2 lg:pb-0 scrollbar-none" id="category-filters">
                <?php
                $filter_pills = array_merge(['all' => 'All Pieces'], $categories);
                foreach ($filter_pills as $cat_key => $cat_label):
                    $is_active = ($category === $cat_key);
                    $pill_classes = $is_active
                        ? 'bg-[#8A5A44] text-[#F6F3EE] font-semibold shadow-sm'
                        : 'bg-[#DFD8CD] text-[#6E6359] hover:bg-[#D5CDC1] hover:text-[#362F2A] border border-[#C9C0B3] font-medium';
                ?>
                    <a href="<?= htmlspecialchars(build_shop_url(['category' => $cat_key, 'page' => 1])) ?>" class="filter-btn px-4 py-2 rounded-xl text-xs <?= $pill_classes ?> transition-colors whitespace-nowrap">
                        <?= htmlspecialchars($cat_label) ?>
                    </a>
                <?php endforeach; ?>
            </div>

            <!-- Search Input and Sort Dropdown -->
            <form action="shop.php" method="GET" id="shop-filter-form" class="flex items-center gap-3">
                <?php if ($category !== 'all' && $category !== ''): ?>
                    <input type="hidden" name="category" value="<?= htmlspecialchars($category) ?>">
                <?php endif; ?>

                <div class="relative flex-1 sm:w-64">
                    <i class="ri-search-line absolute left-3.5 top-1/2 -translate-y-1/2 text-[#6E6359] text-sm"></i>
                    <input type="search" name="search" id="catalog-search" value="<?= htmlspecialchars($search) ?>" placeholder="Filter in catalog..." class="w-full pl-9 pr-3 py-2 bg-[#EDE8E0] border border-[#C9C0B3] rounded-xl text-xs text-[#362F2A] placeholder-[#6E6359] focus:outline-none focus:ring-1 focus:ring-[#8A5A44] focus:border-[#8A5A44]">
                </div>

                <div class="relative" id="sort-dropdown-container">
                    <select id="catalog-sort" name="sort" aria-label="Sort products" class="hidden">
                        <?php foreach ($sort_labels as $sort_val => $sort_text): ?>
                            <option value="<?= htmlspecialchars($sort_val) ?>" <?= $sort === $sort_val ? 'selected' : '' ?>><?= htmlspecialchars($sort_text) ?></option>
                        <?php endforeach; ?>
                    </select>

                    <button type="button" id="sort-dropdown-btn" class="pl-4 pr-8 py-2 bg-[#EDE8E0] border border-[#C9C0B3] rounded-xl text-xs font-medium text-[#362F2A] focus:outline-none focus:ring-1 focus:ring-[#8A5A44] focus:border-[#8A5A44] cursor-pointer flex items-center justify-between gap-2 whitespace-nowrap transition-all">
                        <span id="sort-dropdown-label"><?= htmlspecialchars($sort_labels[$sort]) ?></span>
                        <i id="sort-dropdown-arrow" class="ri-arrow-down-s-line text-[#6E6359] text-sm transition-transform duration-200"></i>
                    </button>

                    <div id="sort-dropdown-menu" class="hidden absolute right-0 top-full mt-1.5 w-44 bg-[#F6F3EE] border border-[#C9C0B3] rounded-2xl shadow-xl overflow-hidden py-1.5 z-30">
                        <?php foreach ($sort_labels as $sort_val => $sort_text): ?>
                            <?php $is_selected_sort = ($sort === $sort_val); ?>
                            <div data-value="<?= htmlspecialchars($sort_val) ?>" class="sort-option px-4 py-2 text-xs cursor-pointer transition-colors flex items-center justify-between <?= $is_selected_sort ? 'bg-[#8A5A44] text-[#F6F3EE] font-medium' : 'text-[#362F2A] hover:bg-[#DFD8CD]' ?>">
                                <span><?= htmlspecialchars($sort_text) ?></span>
                                <i class="ri-check-line text-xs check-icon <?= $is_selected_sort ? '' : 'hidden' ?>"></i>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </form>

        </div>
    </section>

    <!-- PRODUCTS GRID -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-24">
        <?php if (!empty($products)): ?>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 sm:gap-8" id="product-grid">
                <?php foreach ($products as $product): ?>
                    <?php $category_label = $categories[$product['category']] ?? ucfirst($product['category']); ?>
                    <article class="product-card group bg-[#F6F3EE] rounded-3xl border border-[#C9C0B3] overflow-hidden transition-all duration-300 hover:shadow-xl hover:border-[#8A5A44] flex flex-col justify-between" data-category="<?= htmlspecialchars($category_label); ?>" data-price="<?= (int)$product['price']; ?>" data-name="<?= htmlspecialchars($product['name']); ?>">
                        <div class="relative w-full aspect-[4/3] bg-[#EDE8E0] border-b border-[#C9C0B3] overflow-hidden flex items-center justify-center">
                            <?php if ((int)$product['stock'] > 0): ?>
                                <span class="absolute top-3 left-3 z-10 inline-flex items-center px-2.5 py-1 rounded-full text-[11px] font-medium bg-[#DCE5DF] text-[#3F624D] border border-[#C6D6CB]">
                                    In Stock
                                </span>
                            <?php else: ?>
                                <span class="absolute top-3 left-3 z-10 inline-flex items-center px-2.5 py-1 rounded-full text-[11px] font-medium bg-[#F2ECE8] text-[#8A5A44] border border-[#DFC8C8]">
                                    Crafted to Order
                                </span>
                            <?php endif; ?>
                            <a href="product_detail.php?id=<?= (int)$product['id']; ?>" class="w-full h-full block">
                                <img src="media/<?= htmlspecialchars($product['image']); ?>" alt="<?= htmlspecialchars($product['name']); ?>" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" loading="lazy">
                            </a>
                            <div class="absolute inset-0 bg-[#362F2A]/20 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center gap-2">
                                <a href="product_detail.php?id=<?= (int)$product['id']; ?>" class="w-10 h-10 rounded-full bg-[#8A5A44] text-[#F6F3EE] hover:bg-[#704735] hover:text-[#F6F3EE] flex items-center justify-center shadow-md transition-colors" title="View Details">
                                    <i class="ri-eye-line text-lg"></i>
                                </a>
                            </div>
                        </div>
                        <div class="p-5 flex flex-col flex-1 justify-between">
                            <div>
                                <span class="text-[11px] uppercase tracking-wider text-[#8A5A44] font-medium"><?= htmlspecialchars($category_label); ?></span>
                                <h3 class="font-serif text-base font-normal text-[#362F2A] group-hover:text-[#8A5A44] transition-colors mt-0.5">
                                    <a href="product_detail.php?id=<?= (int)$product['id']; ?>"><?= htmlspecialchars($product['name']); ?></a>
                                </h3>
                            </div>
                            <div class="pt-4 flex items-center justify-between border-t border-[#C9C0B3] mt-4">
                                <span class="text-sm font-semibold text-[#362F2A] font-serif"><?= number_format((int)$product['price']); ?> MMK</span>
                                <span class="text-xs text-[#6E6359]"><?= (int)$product['stock'] > 0 ? (int)$product['stock'] . ' in stock' : 'Made to order'; ?></span>
                            </div>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>

            <!-- SHOP PAGINATION -->
            <?php if ($total_pages > 1): ?>
                <div class="mt-16 flex items-center justify-center gap-2 text-sm">
                    <?php if ($page > 1): ?>
                        <a href="<?= htmlspecialchars(build_shop_url(['page' => $page - 1])) ?>" aria-label="Previous Page" class="w-10 h-10 rounded-xl border border-[#C9C0B3] text-[#6E6359] hover:bg-[#DFD8CD] hover:text-[#362F2A] bg-[#F6F3EE] flex items-center justify-center font-medium transition-colors">
                            <i class="ri-arrow-left-s-line text-lg"></i>
                        </a>
                    <?php endif; ?>

                    <?php for ($num = 1; $num <= $total_pages; $num++): ?>
                        <?php if ($num === $page): ?>
                            <span class="w-10 h-10 rounded-xl bg-[#8A5A44] text-[#F6F3EE] shadow-sm font-semibold flex items-center justify-center shadow-xs"><?= $num ?></span>
                        <?php else: ?>
                            <a href="<?= htmlspecialchars(build_shop_url(['page' => $num])) ?>" class="w-10 h-10 rounded-xl border border-[#C9C0B3] text-[#6E6359] hover:bg-[#DFD8CD] hover:text-[#362F2A] bg-[#F6F3EE] flex items-center justify-center font-medium transition-colors"><?= $num ?></a>
                        <?php endif; ?>
                    <?php endfor; ?>

                    <?php if ($page < $total_pages): ?>
                        <a href="<?= htmlspecialchars(build_shop_url(['page' => $page + 1])) ?>" aria-label="Next Page" class="w-10 h-10 rounded-xl border border-[#C9C0B3] text-[#6E6359] hover:bg-[#DFD8CD] hover:text-[#362F2A] bg-[#F6F3EE] flex items-center justify-center font-medium transition-colors">
                            <i class="ri-arrow-right-s-line text-lg"></i>
                        </a>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        <?php else: ?>
            <div class="text-center py-24 bg-[#F6F3EE] rounded-3xl border border-[#C9C0B3] space-y-4">
                <p class="text-[#6E6359] text-base">No atelier pieces match your current selection.</p>
                <?php if ($category !== 'all' || $search !== ''): ?>
                    <a href="shop.php" class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl bg-[#8A5A44] hover:bg-[#704735] text-[#F6F3EE] text-xs font-semibold transition-colors">
                        <span>Reset Filters</span>
                    </a>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    </main>

    <?php include "components/footer.php"; ?>
    <script src="js/script.js"></script>

    <?php if (!empty($_SESSION['error'])): ?>
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                showToast(<?= json_encode($_SESSION['error']); ?>, "error");
            })
        </script>
        <?php unset($_SESSION['error']); ?>
    <?php endif; ?>

    <?php if (!empty($error)): ?>
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                showToast(<?= json_encode($error); ?>, "error");
            })
        </script>
    <?php endif; ?>


    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const filterForm = document.getElementById("shop-filter-form");
            const sortSelect = document.getElementById("catalog-sort");
            const sortBtn = document.getElementById("sort-dropdown-btn");
            const sortMenu = document.getElementById("sort-dropdown-menu");
            const sortArrow = document.getElementById("sort-dropdown-arrow");
            const sortLabel = document.getElementById("sort-dropdown-label");
            const sortOptions = document.querySelectorAll(".sort-option");
            const sortContainer = document.getElementById("sort-dropdown-container");

            if (sortBtn && sortMenu) {
                sortBtn.addEventListener("click", (e) => {
                    e.stopPropagation();
                    const isOpen = !sortMenu.classList.contains("hidden");
                    sortMenu.classList.toggle("hidden", isOpen);
                    if (sortArrow) sortArrow.classList.toggle("rotate-180", !isOpen);
                });

                sortOptions.forEach((opt) => {
                    opt.addEventListener("click", (e) => {
                        e.stopPropagation();
                        const val = opt.getAttribute("data-value");
                        const txt = opt.querySelector("span") ? opt.querySelector("span").textContent : opt.textContent;

                        if (sortLabel) sortLabel.textContent = txt;
                        sortMenu.classList.add("hidden");
                        if (sortArrow) sortArrow.classList.remove("rotate-180");

                        if (sortSelect && val) {
                            sortSelect.value = val;
                            if (filterForm) {
                                filterForm.submit();
                            }
                        }
                    });
                });

                document.addEventListener("click", (e) => {
                    if (sortContainer && !sortContainer.contains(e.target)) {
                        sortMenu.classList.add("hidden");
                        if (sortArrow) sortArrow.classList.remove("rotate-180");
                    }
                });

                document.addEventListener("keydown", (e) => {
                    if (e.key === "Escape" && !sortMenu.classList.contains("hidden")) {
                        sortMenu.classList.add("hidden");
                        if (sortArrow) sortArrow.classList.remove("rotate-180");
                    }
                });
            }
        });
    </script>
</body>

</html>