<?php
// Initialize session
require_once __DIR__ . '/../components/session_start.php';

// Check session
require_once __DIR__ . '/components/session_check.php';

// Connect database
require_once __DIR__ . '/../components/connection.php';

$id = $_GET['id'] ?? '';
if (empty($id) || !filter_var($id, FILTER_VALIDATE_INT)) {
    header('Location: contacts.php');
    exit;
}

try {
    $sql = 'SELECT * FROM contacts WHERE id = :id';
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':id' => $id]);
    $contact = $stmt->fetch();
} catch (PDOException $e) {
    error_log('Contact fetch error: ' . $e->getMessage() . "\n", 3, __DIR__ . '/../error.log');
    $_SESSION['error'] = 'Unable to retrieve inquiries. Please try again later.';
    header('Location: contacts.php');
    exit;
}

if (!$contact) {
    $_SESSION['error'] = 'Inquiry not found.';
    header('Location: contacts.php');
    exit;
}

$errors = [];
if (isset($_GET['status'])) {
    $new_status = $_GET['status'] ?? '';
    $allowed_statuses = ['Pending Review', 'Followed Up', 'Archived'];
    try {
        if (in_array($new_status, $allowed_statuses)) {
            $sql = 'UPDATE contacts SET status = :status WHERE id = :id';
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                ':id' => $contact['id'],
                ':status' => $new_status
            ]);
            $_SESSION['success'] = "Status updated to {$new_status}.";
            header("Location: contact_view.php?id={$contact['id']}");
            exit;
        } else {
            $errors['status'] = 'Invalid status selected.';
        }
    } catch (PDOException $e) {
        error_log('Status update error: ' . $e->getMessage() . "\n", 3, __DIR__ . '/../error.log');
        $errors['status'] = 'The status cannot be updated at this moment. Please try again later.';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Inquiry | Yangon Atelier Admin</title>
    <link rel="icon" type="image/x-icon" href="../images/favicon/favicon.ico">
    <?php include "components/css.php"; ?>
</head>

<body class="bg-[#EDE8E0] text-[#362F2A] font-sans antialiased selection:bg-[#8A5A44] selection:text-[#F6F3EE]">
    <div class="min-h-screen flex">
        <?php include "components/sidebar.php"; ?>

        <div class="lg:pl-64 flex flex-col flex-1 min-w-0">
            <?php include "components/topbar.php"; ?>

            <main class="flex-1 p-4 sm:p-6 lg:p-8 max-w-4xl w-full mx-auto space-y-6">

                <!-- Heading & Back Nav -->
                <div class="flex items-center justify-between">
                    <div>
                        <div class="flex items-center gap-2 text-xs text-[#6E6359] mb-1">
                            <a href="dashboard.php" class="hover:text-[#362F2A] transition-colors">Dashboard</a>
                            <span>/</span>
                            <a href="contacts.php" class="hover:text-[#362F2A] transition-colors">Inquiries</a>
                            <span>/</span>
                            <span class="text-[#362F2A] font-medium">Message #<?= (int)$contact['id'] ?></span>
                        </div>
                        <h2 class="font-serif text-2xl sm:text-3xl font-medium text-[#362F2A]">Showroom Inquiry Details</h2>
                    </div>
                    <div class="flex items-center gap-2">
                        <a href="contacts.php" class="px-4 py-2 rounded-xl border border-[#C9C0B3] bg-[#DFD8CD] hover:bg-[#D5CDC1] text-xs font-semibold text-[#362F2A] transition-colors">
                            Back
                        </a>
                        <a href="contact_delete.php?id=<?= (int)$contact['id'] ?>" class="px-4 py-2 rounded-xl border border-[#DFC8C8] bg-[#EFE0E0] hover:bg-[#E5D0D0] text-[#8C3B3B] text-xs font-semibold transition-colors flex items-center gap-1">
                            <i class="ri-delete-bin-line"></i> Delete
                        </a>
                    </div>
                </div>

                <!-- Inquiry Card in Raw Linen (#F6F3EE) -->
                <div class="bg-[#F6F3EE] rounded-3xl border border-[#C9C0B3] p-6 sm:p-10 shadow-xs space-y-8">

                    <!-- Metadata Grid -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 p-5 rounded-2xl bg-[#EDE8E0] border border-[#C9C0B3] text-xs">
                        <div>
                            <span class="text-[#6E6359] block mb-0.5">Sender Name</span>
                            <strong class="text-[#362F2A] text-sm block"><?= htmlspecialchars($contact['name'] ?? ''); ?></strong>
                        </div>
                        <div>
                            <span class="text-[#6E6359] block mb-0.5">Phone / Viber</span>
                            <a href="tel:<?= htmlspecialchars($contact['number'] ?? ''); ?>" class="text-[#362F2A] hover:underline font-mono block">
                                <?= htmlspecialchars($contact['number'] ?? ''); ?>
                            </a>
                        </div>
                        <div>
                            <span class="text-[#6E6359] block mb-0.5">Email Address</span>
                            <a href="mailto:<?= htmlspecialchars($contact['email'] ?? ''); ?>" class="text-[#362F2A] hover:underline font-mono block">
                                <?= htmlspecialchars($contact['email'] ?? ''); ?>
                            </a>
                        </div>
                        <div>
                            <span class="text-[#6E6359] block mb-0.5">Received Date</span>
                            <span class="text-[#362F2A] block"><?= htmlspecialchars(date('F j, Y \a\t g:i a', strtotime($contact['created_at'] ?? ''))); ?></span>
                        </div>
                    </div>

                    <!-- Message Content -->
                    <div class="space-y-3">
                        <span class="text-xs uppercase tracking-widest text-[#8A5A44] font-semibold block">Message Body</span>
                        <div class="p-6 rounded-2xl bg-[#EDE8E0] border border-[#C9C0B3] text-[#362F2A] text-sm leading-relaxed">
                            <p><?= nl2br(htmlspecialchars($contact['message'] ?? '')); ?></p>
                        </div>
                    </div>

                    <?php
                    $status = $contact['status'] ?? 'Pending Review';
                    $badge_class = match ($status) {
                        'Followed Up' => 'text-[#3F624D] bg-[#DCE5DF] border-[#C6D6CB]',
                        'Archived' => 'text-[#6E6359] bg-[#DFD8CD] border-[#C9C0B3]',
                        'Pending Review' => 'text-[#8C5327] bg-[#EFE2D5] border-[#E0CFBF]',
                        default => 'text-[#8C5327] bg-[#EFE2D5] border-[#E0CFBF]'
                    };
                    ?>

                    <!-- Response Actions -->
                    <div class="pt-6 border-t border-[#C9C0B3] flex flex-wrap items-center justify-between gap-4">
                        <span class="text-xs text-[#6E6359]">
                            Current Status: <strong class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[10px] font-semibold border <?= $badge_class; ?>"><?= htmlspecialchars($contact['status'] ?? 'Pending Review'); ?></strong>
                        </span>

                        <div class="flex items-center gap-2">
                            <?php if ($status === 'Followed Up'): ?>
                                <!-- Restore to Pending Button -->
                                <a href="contact_view.php?id=<?= (int)$contact['id']; ?>&status=Pending+Review"
                                    class="px-4 py-2 rounded-xl bg-[#EFE2D5] text-[#8C5327] border border-[#E0CFBF] text-xs font-semibold hover:bg-[#E5D5C5] transition-colors flex items-center gap-1.5">
                                    <i class="ri-restart-line text-sm"></i>
                                    <span>Restore to Pending</span>
                                </a>
                            <?php else: ?>
                                <!-- Mark Followed Up Button -->
                                <a href="contact_view.php?id=<?= (int)$contact['id']; ?>&status=Followed+Up"
                                    class="px-4 py-2 rounded-xl bg-[#DCE5DF] text-[#3F624D] border border-[#C6D6CB] text-xs font-semibold hover:bg-[#cfded3] transition-colors flex items-center gap-1.5">
                                    <i class="ri-check-line text-sm"></i>
                                    <span>Mark as Followed Up</span>
                                </a>
                            <?php endif; ?>

                            <?php if ($status === 'Archived'): ?>
                                <!-- Restore to Pending Button -->
                                <a href="contact_view.php?id=<?= (int)$contact['id']; ?>&status=Pending+Review"
                                    class="px-4 py-2 rounded-xl bg-[#EFE2D5] text-[#8C5327] border border-[#E0CFBF] text-xs font-semibold hover:bg-[#E5D5C5] transition-colors flex items-center gap-1.5">
                                    <i class="ri-restart-line text-sm"></i>
                                    <span>Restore to Pending</span>
                                </a>
                            <?php else: ?>
                                <!-- Archive Button -->
                                <a href="contact_view.php?id=<?= (int)$contact['id']; ?>&status=Archived"
                                    class="px-4 py-2 rounded-xl bg-[#EDE8E0] text-[#6E6359] border border-[#C9C0B3] text-xs font-semibold hover:bg-[#DFD8CD] transition-colors flex items-center gap-1.5">
                                    <i class="ri-archive-line text-sm"></i>
                                    <span>Archive</span>
                                </a>
                            <?php endif; ?>

                            <!-- Reply via Email Button -->
                            <a href="mailto:<?= htmlspecialchars($contact['email']); ?>?subject=<?= rawurlencode('Re: Inquiry - Yangon Atelier'); ?>"
                                class="px-4 py-2 rounded-xl bg-[#8A5A44] hover:bg-[#704735] text-[#F6F3EE] font-semibold text-xs transition-colors flex items-center gap-1.5">
                                <i class="ri-reply-line text-sm"></i>
                                <span>Reply via Email</span>
                            </a>
                        </div>
                    </div>

                </div>

            </main>

            <?php include "components/footer.php"; ?>
        </div>
    </div>

    <script src="js/script.js"></script>
    <script src="../js/script.js"></script>

    <?php if (!empty($_SESSION['success'])): ?>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                showToast(<?= json_encode($_SESSION['success']); ?>, 'success');
            });
        </script>
        <?php unset($_SESSION['success']); ?>
    <?php endif; ?>

    <?php if (!empty($errors)): ?>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                <?php foreach ($errors as $error): ?>
                    showToast(<?= json_encode($error); ?>, 'error');
                <?php endforeach; ?>
            });
        </script>
    <?php endif; ?>
</body>

</html>