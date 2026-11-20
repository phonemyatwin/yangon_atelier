<?php
// Initialize session
require_once __DIR__ . '/../components/session_start.php';

// Check session
require_once __DIR__ . '/components/session_check.php';

// Connect database
require_once __DIR__ . '/../components/connection.php';

$sql = 'SELECT * FROM contacts ORDER BY id DESC';
$stmt = $pdo->query($sql);
$contacts = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard | Yangon Atelier</title>
    <link rel="icon" type="image/x-icon" href="../images/favicon/favicon.ico">
    <?php include "components/css.php"; ?>
</head>

<body class="bg-[#EDE8E0] text-[#362F2A] font-sans antialiased selection:bg-[#8A5A44] selection:text-[#F6F3EE]">
    <div class="min-h-screen flex">
        <!-- Sidebar Navigation -->
        <?php include "components/sidebar.php"; ?>

        <!-- Main Content Area -->
        <div class="lg:pl-64 flex flex-col flex-1 min-w-0">
            <?php include "components/topbar.php"; ?>

            <main class="flex-1 p-4 sm:p-6 lg:p-8 max-w-7xl w-full mx-auto space-y-8">

                <!-- Welcome Banner in Raw Linen (#F6F3EE) -->
                <div class="bg-[#F6F3EE] rounded-3xl border border-[#C9C0B3] p-6 sm:p-8 shadow-xs flex flex-col sm:flex-row sm:items-center justify-between gap-6">
                    <div>
                        <span class="text-xs uppercase tracking-[0.2em] text-[#8A5A44] font-semibold block mb-1">Executive Overview</span>
                        <h2 class="font-serif text-2xl sm:text-3xl font-medium text-[#362F2A]">Welcome to Atelier Control</h2>
                        <p class="text-xs sm:text-sm text-[#6E6359] mt-1">Here is a summary of your inventory, active clients, and editorial performance.</p>
                    </div>
                    <div class="flex items-center gap-3">
                        <a href="product_create.php" class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl bg-[#8A5A44] hover:bg-[#704735] text-[#F6F3EE] font-semibold text-xs transition-colors shadow-xs">
                            <i class="ri-add-line text-sm"></i>
                            <span>New Product</span>
                        </a>
                        <a href="blog_create.php" class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl border border-[#C9C0B3] bg-[#DFD8CD] hover:bg-[#D5CDC1] text-[#362F2A] text-xs font-semibold transition-colors">
                            <i class="ri-edit-line text-sm text-[#8A5A44]"></i>
                            <span>New Journal Post</span>
                        </a>
                    </div>
                </div>

                <!-- KPI METRICS GRID -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-6 gap-4 sm:gap-6">
                    <!-- KPI 1: Products -->
                    <div class="bg-[#F6F3EE] rounded-2xl border border-[#C9C0B3] p-5 shadow-xs flex flex-col justify-between hover:border-[#8A5A44] transition-colors">
                        <div class="flex items-center justify-between">
                            <span class="text-xs font-medium text-[#6E6359]">Products</span>
                            <div class="w-8 h-8 rounded-lg bg-[#DFD8CD] text-[#8A5A44] flex items-center justify-center">
                                <i class="ri-shopping-bag-3-line text-sm"></i>
                            </div>
                        </div>
                        <div class="mt-4">
                            <strong class="font-serif text-2xl font-semibold text-[#362F2A] block leading-tight">27</strong>
                            <span class="text-[11px] text-[#3F624D] font-medium inline-flex items-center gap-0.5 mt-1">
                                <i class="ri-arrow-up-line"></i> +4 this month
                            </span>
                        </div>
                    </div>

                    <!-- KPI 2: Users -->
                    <div class="bg-[#F6F3EE] rounded-2xl border border-[#C9C0B3] p-5 shadow-xs flex flex-col justify-between hover:border-[#8A5A44] transition-colors">
                        <div class="flex items-center justify-between">
                            <span class="text-xs font-medium text-[#6E6359]">Active Clients</span>
                            <div class="w-8 h-8 rounded-lg bg-[#DFD8CD] text-[#8A5A44] flex items-center justify-center">
                                <i class="ri-user-3-line text-sm"></i>
                            </div>
                        </div>
                        <div class="mt-4">
                            <strong class="font-serif text-2xl font-semibold text-[#362F2A] block leading-tight">142</strong>
                            <span class="text-[11px] text-[#3F624D] font-medium inline-flex items-center gap-0.5 mt-1">
                                <i class="ri-arrow-up-line"></i> +12% growth
                            </span>
                        </div>
                    </div>

                    <!-- KPI 3: Journal Posts -->
                    <div class="bg-[#F6F3EE] rounded-2xl border border-[#C9C0B3] p-5 shadow-xs flex flex-col justify-between hover:border-[#8A5A44] transition-colors">
                        <div class="flex items-center justify-between">
                            <span class="text-xs font-medium text-[#6E6359]">Journal Posts</span>
                            <div class="w-8 h-8 rounded-lg bg-[#DFD8CD] text-[#8A5A44] flex items-center justify-center">
                                <i class="ri-article-line text-sm"></i>
                            </div>
                        </div>
                        <div class="mt-4">
                            <strong class="font-serif text-2xl font-semibold text-[#362F2A] block leading-tight">8</strong>
                            <span class="text-[11px] text-[#6E6359] font-medium inline-flex items-center gap-0.5 mt-1">
                                Editorial active
                            </span>
                        </div>
                    </div>

                    <!-- KPI 4: Artisans & Team -->
                    <div class="bg-[#F6F3EE] rounded-2xl border border-[#C9C0B3] p-5 shadow-xs flex flex-col justify-between hover:border-[#8A5A44] transition-colors">
                        <div class="flex items-center justify-between">
                            <span class="text-xs font-medium text-[#6E6359]">Design Team</span>
                            <div class="w-8 h-8 rounded-lg bg-[#DFD8CD] text-[#8A5A44] flex items-center justify-center">
                                <i class="ri-team-line text-sm"></i>
                            </div>
                        </div>
                        <div class="mt-4">
                            <strong class="font-serif text-2xl font-semibold text-[#362F2A] block leading-tight">8</strong>
                            <span class="text-[11px] text-[#6E6359] font-medium inline-flex items-center gap-0.5 mt-1">
                                Staff members
                            </span>
                        </div>
                    </div>

                    <!-- KPI 5: Inquiries -->
                    <div class="bg-[#F6F3EE] rounded-2xl border border-[#C9C0B3] p-5 shadow-xs flex flex-col justify-between hover:border-[#8A5A44] transition-colors">
                        <div class="flex items-center justify-between">
                            <span class="text-xs font-medium text-[#6E6359]">Inquiries</span>
                            <div class="w-8 h-8 rounded-lg bg-[#EFE2D5] text-[#8C5327] flex items-center justify-center">
                                <i class="ri-mail-line text-sm"></i>
                            </div>
                        </div>
                        <div class="mt-4">
                            <strong class="font-serif text-2xl font-semibold text-[#362F2A] block leading-tight">3</strong>
                            <span class="text-[11px] text-[#8C5327] font-medium inline-flex items-center gap-0.5 mt-1">
                                Needs follow-up
                            </span>
                        </div>
                    </div>

                    <!-- KPI 6: Subscribers -->
                    <div class="bg-[#F6F3EE] rounded-2xl border border-[#C9C0B3] p-5 shadow-xs flex flex-col justify-between hover:border-[#8A5A44] transition-colors">
                        <div class="flex items-center justify-between">
                            <span class="text-xs font-medium text-[#6E6359]">Subscribers</span>
                            <div class="w-8 h-8 rounded-lg bg-[#DFD8CD] text-[#8A5A44] flex items-center justify-center">
                                <i class="ri-mail-add-line text-sm"></i>
                            </div>
                        </div>
                        <div class="mt-4">
                            <strong class="font-serif text-2xl font-semibold text-[#362F2A] block leading-tight">384</strong>
                            <span class="text-[11px] text-[#3F624D] font-medium inline-flex items-center gap-0.5 mt-1">
                                <i class="ri-arrow-up-line"></i> +18 this week
                            </span>
                        </div>
                    </div>
                </div>

                <!-- RECENT INQUIRIES & ACTIONS TABLE -->
                <div class="bg-[#F6F3EE] rounded-3xl border border-[#C9C0B3] overflow-hidden shadow-xs">
                    <div class="p-6 border-b border-[#C9C0B3] flex items-center justify-between">
                        <div>
                            <h3 class="font-serif text-lg font-medium text-[#362F2A]">Recent Showroom Inquiries</h3>
                            <p class="text-xs text-[#6E6359] mt-0.5">Direct messages received from the storefront contact form.</p>
                        </div>
                        <a href="contacts.php" class="text-xs font-semibold text-[#8A5A44] hover:text-[#704735] transition-colors flex items-center gap-1">
                            <span>View All Inquiries</span>
                            <i class="ri-arrow-right-line"></i>
                        </a>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse text-xs">
                            <thead>
                                <tr class="bg-[#DFD8CD] border-b border-[#C9C0B3] text-[#362F2A] uppercase tracking-wider font-semibold">
                                    <th class="py-3 px-6">ID</th>
                                    <th class="py-3 px-6">Client Name</th>
                                    <th class="py-3 px-6">Email Address</th>
                                    <th class="py-3 px-6">Phone Number</th>
                                    <th class="py-3 px-6">Status</th>
                                    <th class="py-3 px-6 text-right">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-[#C9C0B3] text-[#6E6359] font-medium">
                                <?php if (!empty($contacts)): ?>
                                    <?php foreach ($contacts as $contact): ?>
                                        <tr class="hover:bg-[#DFD8CD]/40 transition-colors">
                                            <td class="py-4 px-6 text-[#6E6359]">#<?= (int)$contact['id'] ?></td>
                                            <td class="py-4 px-6 font-semibold text-[#362F2A]"><?= htmlspecialchars($contact['name']); ?></td>
                                            <td class="py-4 px-6 text-[#6E6359]"><?= htmlspecialchars($contact['email']); ?></td>
                                            <td class="py-4 px-6 text-[#6E6359]"><?= htmlspecialchars($contact['number']); ?></td>

                                            <?php
                                            $status = $contact['status'] ?? 'Pending Review';
                                            $badge_class = match ($status) {
                                                'Followed Up' => 'text-[#3F624D] bg-[#DCE5DF] border-[#C6D6CB]',
                                                'Archived' => 'text-[#6E6359] bg-[#DFD8CD] border-[#C9C0B3]',
                                                'Pending Review' => 'text-[#8C5327] bg-[#EFE2D5] border-[#E0CFBF]',
                                                default => 'text-[#8C5327] bg-[#EFE2D5] border-[#E0CFBF]'
                                            };
                                            ?>

                                            <td class="py-4 px-6">
                                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[10px] font-semibold border <?= $badge_class; ?>">
                                                    <?= htmlspecialchars($status); ?>
                                                </span>
                                            </td>
                                            <td class="py-4 px-6 text-right">
                                                <div class="inline-flex items-center gap-2">
                                                    <a href="contact_view.php?id=<?= (int)$contact['id']; ?>" class="px-2.5 py-1 rounded-lg border border-[#C9C0B3] bg-[#DFD8CD] hover:bg-[#D5CDC1] text-[#362F2A] font-semibold transition-colors">View</a>
                                                    <a href="contact_delete.php?id=<?= (int)$contact['id']; ?>" class="px-2.5 py-1 rounded-lg border border-[#DFC8C8] bg-[#EFE0E0] hover:bg-[#E5D0D0] text-[#8C3B3B] font-semibold transition-colors">Delete</a>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="6" class="py-12 text-center text-[#6E6359]">
                                            No customer inquiries or messages found.
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>

            </main>

            <?php include "components/footer.php"; ?>
        </div>
    </div>

    <script src="js/script.js"></script>
    <script src="../js/script.js"></script>

    <?php if (isset($_SESSION['success'])): ?>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                showToast(<?= json_encode($_SESSION['success']); ?>, 'success');
            });
        </script>
        <?php unset($_SESSION['success']); ?>
    <?php endif; ?>
</body>

</html>