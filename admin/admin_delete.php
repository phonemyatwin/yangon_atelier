<?php
// Initialize session
require_once __DIR__ . '/../components/session_start.php';

// Check session
require_once __DIR__ . '/components/session_check.php';

// Connect database
require_once __DIR__ . '/../components/connection.php';
require_once __DIR__ . '/../components/functions.php';

$id = $_GET['id'] ?? '';
if (empty($id) || !filter_var($id, FILTER_VALIDATE_INT)) {
    header('Location: admins.php');
    exit;
}

try {
    $sql = "SELECT * FROM admins WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':id' => $id]);
    $admin = $stmt->fetch();
} catch (PDOException $e) {
    error_log('Admin fetch error: ' . $e->getMessage() . "\n", 3, __DIR__ . '/../error.log');
    $_SESSION['error'] = 'Unable to retrieve administrator details. Please try again later.';
    header('Location: admins.php');
    exit;
}

if (!$admin) {
    $_SESSION['error'] = 'Admin not found.';
    header('Location: admins.php');
    exit;
}

if ((int)$_SESSION['admin']['id'] !== (int)$admin['id']) {
    $_SESSION['error'] = 'You do not have permission to delete this account.';
    header('Location: admins.php');
    exit;
}

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete'])) {
    try {
        $sql = "DELETE FROM admins WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([':id' => $admin['id']]);
        $_SESSION['success'] = 'Administrator account removed successfully.';
        header('Location: admins.php');
        exit;
    } catch (PDOException $e) {
        error_log('Admin delete error: ' . $e->getMessage() . "\n", 3, __DIR__ . '/../error.log');
        $error = 'Unable to remove administrator at this moment. Please try again later.';
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete User Account | Yangon Atelier Admin</title>
    <link rel="icon" type="image/x-icon" href="../images/favicon/favicon.ico">
    <?php include "components/css.php"; ?>
</head>

<body class="bg-[#EDE8E0] text-[#362F2A] font-sans antialiased selection:bg-[#8A5A44] selection:text-[#F6F3EE]">
    <div class="min-h-screen flex">
        <?php include "components/sidebar.php"; ?>

        <div class="lg:pl-64 flex flex-col flex-1 min-w-0">
            <?php include "components/topbar.php"; ?>

            <main class="flex-1 p-4 sm:p-6 lg:p-8 max-w-3xl w-full mx-auto space-y-6">

                <!-- Heading -->
                <div class="flex items-center justify-between">
                    <div>
                        <div class="flex items-center gap-2 text-xs text-[#6E6359] mb-1">
                            <a href="dashboard.php" class="hover:text-[#362F2A] transition-colors">Dashboard</a>
                            <span>/</span>
                            <a href="admins.php" class="hover:text-[#362F2A] transition-colors">Admins</a>
                            <span>/</span>
                            <span class="text-[#8C3B3B] font-medium">Delete</span>
                        </div>
                        <h2 class="font-serif text-2xl sm:text-3xl font-medium text-[#362F2A]">Confirm Account Removal</h2>
                    </div>
                    <a href="admins.php" class="px-4 py-2 rounded-xl border border-[#C9C0B3] bg-[#DFD8CD] hover:bg-[#D5CDC1] text-xs font-semibold text-[#362F2A] transition-colors">
                        Cancel
                    </a>
                </div>

                <!-- Confirmation Card in Raw Linen (#F6F3EE) -->
                <div class="bg-[#F6F3EE] rounded-3xl border border-[#C9C0B3] p-6 sm:p-10 shadow-xs">
                    <div class="flex items-start gap-4 p-4 rounded-2xl bg-[#EFE0E0] border border-[#DFC8C8] mb-6">
                        <i class="ri-error-warning-line text-2xl text-[#8C3B3B] flex-shrink-0 mt-0.5"></i>
                        <div>
                            <h3 class="text-sm font-semibold text-[#8C3B3B]">Permanent Account Removal</h3>
                            <p class="text-xs text-[#8C3B3B]/90 mt-1 leading-relaxed">
                                Are you sure you wish to delete this admin account? The admin will no longer be able to log in or access order history.
                            </p>
                        </div>
                    </div>

                    <!-- Admin Details Summary -->
                    <div class="border border-[#C9C0B3] bg-[#EDE8E0] rounded-2xl p-5 mb-8 flex items-center gap-4">
                        <div class="w-12 h-12 rounded-full bg-[#DFD8CD] text-[#8A5A44] flex items-center justify-center font-serif text-sm font-semibold flex-shrink-0 uppercase">
                            <?= htmlspecialchars(get_initial_name($admin['name'])); ?>
                        </div>
                        <div class="space-y-0.5 text-xs">
                            <span class="text-[#6E6359] font-mono">Admin #<?= htmlspecialchars($admin['id']); ?></span>
                            <h4 class="font-semibold text-[#362F2A] text-sm"><?= htmlspecialchars($admin['name']); ?></h4>
                            <p class="text-[#6E6359]">Email: <span class="font-mono text-[#362F2A]"><?= htmlspecialchars($admin['email']); ?></span></p>
                            <p class="text-[#6E6359]">Role: <span class="font-mono text-[#362F2A]"><?= htmlspecialchars($admin['role']); ?></span></p>
                        </div>
                    </div>

                    <!-- Deletion Form -->
                    <form action="" method="POST" class="flex items-center justify-end gap-3 pt-4 border-t border-[#C9C0B3]">
                        <a href="admins.php" class="px-5 py-2.5 rounded-xl border border-[#C9C0B3] bg-[#DFD8CD] hover:bg-[#D5CDC1] text-xs font-semibold text-[#362F2A] transition-colors">
                            Cancel
                        </a>
                        <button type="submit" name="delete" class="px-5 py-2.5 rounded-xl bg-[#8C3B3B] hover:bg-[#782F2F] text-[#F6F3EE] text-xs font-semibold transition-colors shadow-xs flex items-center gap-2">
                            <i class="ri-delete-bin-line text-sm"></i>
                            <span>Confirm &amp; Delete User</span>
                        </button>
                    </form>
                </div>

            </main>

            <?php include "components/footer.php"; ?>
        </div>
    </div>

    <script src="js/script.js"></script>
    <script src="../js/script.js"></script>

    <?php if (!empty($error)): ?>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                showToast(<?= json_encode($error); ?>, 'error');
            });
        </script>
    <?php endif; ?>
</body>

</html>