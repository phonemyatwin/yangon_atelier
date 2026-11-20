<?php
// Initialize session
require_once __DIR__ . '/../components/session_start.php';

// Check session
require_once __DIR__ . '/components/session_check.php';

// Connect database
require_once __DIR__ . '/../components/connection.php';

$contacts = [];
$error = '';

try {
    $sql = 'SELECT * FROM contacts ORDER BY id DESC';
    $stmt = $pdo->query($sql);
    $contacts = $stmt->fetchAll();
} catch (PDOException $e) {
    error_log('Contacts fetch error: ' . $e->getMessage() . "\n", 3, __DIR__ . '/../error.log');
    $error = 'Unable to retrieve client inquiries. Please try again later.';
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inquiries &amp; Messages | Yangon Atelier Admin</title>
    <link rel="icon" type="image/x-icon" href="../images/favicon/favicon.ico">
    <?php include "components/css.php"; ?>
</head>

<body class="bg-[#EDE8E0] text-[#362F2A] font-sans antialiased selection:bg-[#8A5A44] selection:text-[#F6F3EE]">
    <div class="min-h-screen flex">
        <?php include "components/sidebar.php"; ?>

        <div class="lg:pl-64 flex flex-col flex-1 min-w-0">
            <?php include "components/topbar.php"; ?>

            <main class="flex-1 p-4 sm:p-6 lg:p-8 max-w-7xl w-full mx-auto space-y-6">

                <!-- Page Header -->
                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                    <div>
                        <div class="flex items-center gap-2 text-xs text-[#6E6359] mb-1">
                            <a href="dashboard.php" class="hover:text-[#362F2A] transition-colors">Dashboard</a>
                            <span>/</span>
                            <span class="text-[#362F2A] font-medium">Inquiries</span>
                        </div>
                        <h2 class="font-serif text-2xl sm:text-3xl font-medium text-[#362F2A]">Showroom Inquiries &amp; Messages</h2>
                    </div>
                </div>

                <!-- Table Card in Raw Linen (#F6F3EE) -->
                <div class="bg-[#F6F3EE] rounded-3xl border border-[#C9C0B3] overflow-hidden shadow-xs">
                    <div class="p-5 border-b border-[#C9C0B3] flex flex-col sm:flex-row sm:items-center justify-between gap-3">
                        <div class="text-xs text-[#6E6359]">
                            Showing customer inquiries &amp; consultation requests (Total: <strong><?= count($contacts); ?></strong>)
                        </div>
                        <div class="relative sm:w-64">
                            <i class="ri-search-line absolute left-3 top-1/2 -translate-y-1/2 text-[#6E6359] text-xs"></i>
                            <input type="text" placeholder="Filter messages..." class="w-full pl-8 pr-3 py-1.5 bg-[#EDE8E0] border border-[#C9C0B3] rounded-lg text-xs text-[#362F2A] placeholder-[#6E6359] focus:outline-none focus:ring-1 focus:ring-[#8A5A44]">
                        </div>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse text-xs">
                            <thead>
                                <tr class="bg-[#DFD8CD] border-b border-[#C9C0B3] text-[#362F2A] uppercase tracking-wider font-semibold">
                                    <th class="py-3.5 px-6">ID</th>
                                    <th class="py-3.5 px-6">Client Name</th>
                                    <th class="py-3.5 px-6">Email Address</th>
                                    <th class="py-3.5 px-6">Phone Number</th>
                                    <th class="py-3.5 px-6">Status</th>
                                    <th class="py-3.5 px-6 text-right">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-[#C9C0B3] text-[#6E6359] font-medium">

                                <?php if (!empty($contacts)): ?>
                                    <?php foreach ($contacts as $contact): ?>
                                        <!-- Contact 1 -->
                                        <tr class="hover:bg-[#DFD8CD]/40 transition-colors">
                                            <td class="py-4 px-6 text-[#6E6359]">#<?= (int)$contact['id']; ?></td>
                                            <td class="py-4 px-6 font-semibold text-[#362F2A] text-sm"><?= htmlspecialchars($contact['name'] ?? ''); ?></td>
                                            <td class="py-4 px-6 text-[#6E6359] font-mono text-xs"><?= htmlspecialchars($contact['email'] ?? ''); ?></td>
                                            <td class="py-4 px-6 text-[#6E6359]"><?= htmlspecialchars($contact['number'] ?? ''); ?></td>

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
                                                    <a href="contact_view.php?id=<?= (int)$contact['id'] ?>" class="px-2.5 py-1 rounded-lg border border-[#C9C0B3] bg-[#DFD8CD] hover:bg-[#D5CDC1] text-[#362F2A] font-semibold transition-colors flex items-center gap-1">
                                                        <i class="ri-eye-line"></i> View
                                                    </a>
                                                    <a href="contact_delete.php?id=<?= (int)$contact['id'] ?>" class="px-2.5 py-1 rounded-lg border border-[#DFC8C8] bg-[#EFE0E0] hover:bg-[#E5D0D0] text-[#8C3B3B] font-semibold transition-colors flex items-center gap-1">
                                                        <i class="ri-delete-bin-line"></i> Delete
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
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

    <?php if (isset($_SESSION['error'])): ?>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                showToast(<?= json_encode($_SESSION['error']); ?>, 'error');
            });
        </script>
        <?php unset($_SESSION['error']); ?>
    <?php endif; ?>
    <?php if (!empty($error)): ?>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                showToast(<?= json_encode($error); ?>, 'error');
            });
        </script>
    <?php endif; ?>
</body>

</html>