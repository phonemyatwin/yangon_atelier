<?php
/**
 * ============================================================================
 * FURNISHME BACKEND INSTRUCTION GUIDELINE - DELETE USER ACCOUNT
 * ============================================================================
 * FILE: admin/user_delete.php
 * PURPOSE: Confirms permanent removal of a user account and executes DELETE
 *          query against the 'users' table.
 * 
 * STEP-BY-STEP IMPLEMENTATION GUIDE:
 * 1. Initialize Session & Enforce Authentication Guard:
 *    if (session_status() === PHP_SESSION_NONE) { session_start(); }
 *    if (!isset($_SESSION['admin_user'])) {
 *        header("Location: index.php");
 *        exit;
 *    }
 * 
 * 2. Include Database Connection:
 *    require_once "../components/connection.php";
 * 
 * 3. Validate and Query Target User:
 *    $id = isset($_GET['id']) ? (int)$_GET['id'] : (isset($_POST['id']) ? (int)$_POST['id'] : 0);
 *    if ($id <= 0) {
 *        header("Location: users.php");
 *        exit;
 *    }
 *    $stmt = $connection->prepare("SELECT id, username, email FROM users WHERE id = ? LIMIT 1");
 *    $stmt->bind_param("i", $id);
 *    $stmt->execute();
 *    $user = $stmt->get_result()->fetch_assoc();
 *    $stmt->close();
 *    if (!$user) {
 *        header("Location: users.php?error=not_found");
 *        exit;
 *    }
 * 
 * 4. Process POST Deletion:
 *    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete'])) {
 *        $del_stmt = $connection->prepare("DELETE FROM users WHERE id = ?");
 *        $del_stmt->bind_param("i", $id);
 *        if ($del_stmt->execute()) {
 *            $del_stmt->close();
 *            header("Location: users.php?msg=deleted");
 *            exit;
 *        }
 *    }
 * ============================================================================
 */

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['admin_user'])) {
    header("Location: index.php");
    exit;
}

$error = '';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete User Account | FurnishMe Atelier Admin</title>
    <link rel="icon" type="image/x-icon" href="../images/favicon.ico">
    <?php include "components/css.php"; ?>
</head>

<body class="bg-[#0D0B09] text-[#EDE4D7] font-sans antialiased selection:bg-[#C5A059] selection:text-[#0D0B09]">
    <div class="min-h-screen flex">
        <?php include "components/sidebar.php"; ?>

        <div class="lg:pl-64 flex flex-col flex-1 min-w-0">
            <?php include "components/topbar.php"; ?>

            <main class="flex-1 p-4 sm:p-6 lg:p-8 max-w-3xl w-full mx-auto space-y-6">
                
                <!-- Heading -->
                <div class="flex items-center justify-between">
                    <div>
                        <div class="flex items-center gap-2 text-xs text-[#8C7D6B] mb-1">
                            <a href="dashboard.php" class="hover:text-[#FAF6EE]">Dashboard</a>
                            <span>/</span>
                            <a href="users.php" class="hover:text-[#FAF6EE]">Users</a>
                            <span>/</span>
                            <span class="text-rose-600 font-medium">Delete</span>
                        </div>
                        <h2 class="font-serif text-2xl sm:text-3xl font-medium text-[#FAF6EE]">Confirm Account Removal</h2>
                    </div>
                    <a href="users.php" class="px-4 py-2 rounded-xl border border-[#2A231C] text-xs font-medium text-[#D6C8B4] hover:bg-white transition-colors">
                        Cancel
                    </a>
                </div>

                <!-- Confirmation Card -->
                <div class="bg-white rounded-3xl border border-rose-200 p-6 sm:p-10 shadow-xs">
                    <div class="flex items-start gap-4 p-4 rounded-2xl bg-rose-50 border border-rose-100 mb-6">
                        <i class="ri-error-warning-line text-2xl text-rose-600 flex-shrink-0 mt-0.5"></i>
                        <div>
                            <h3 class="text-sm font-semibold text-rose-900">Permanent Account Removal</h3>
                            <p class="text-xs text-rose-700 mt-1 leading-relaxed">
                                Are you sure you wish to delete this user account? The user will no longer be able to log in or access order history.
                            </p>
                        </div>
                    </div>

                    <!-- User Details Summary -->
                    <!-- ==========================================================
                         PHP BACKEND GUIDELINE: Display User Details
                         Render summary of user to be deleted:
                         - Username: <?= htmlspecialchars($user['username'] ?? '') ?>
                         - Email: <?= htmlspecialchars($user['email'] ?? '') ?>
                         ========================================================== -->
                    <div class="border border-[#2A231C] rounded-2xl p-5 mb-8 flex items-center gap-4">
                        <div class="w-12 h-12 rounded-full bg-stone-900 text-white flex items-center justify-center font-serif text-sm font-semibold flex-shrink-0">
                            <?= strtoupper(substr($user['username'] ?? 'AD', 0, 2)) ?>
                        </div>
                        <div class="space-y-0.5 text-xs">
                            <span class="text-stone-400 font-mono">User #<?= htmlspecialchars($_GET['id'] ?? '1') ?></span>
                            <h4 class="font-semibold text-stone-900 text-sm"><?= htmlspecialchars($user['username'] ?? 'admin') ?></h4>
                            <p class="text-stone-600">Email: <span class="font-mono text-stone-900"><?= htmlspecialchars($user['email'] ?? 'admin@gmail.com') ?></span></p>
                        </div>
                    </div>

                    <!-- ==========================================================
                         PHP BACKEND GUIDELINE: Deletion Form
                         - Action: action="" (submits to self)
                         - Method: POST
                         - Hidden id input: <input type="hidden" name="id" value="<?= $user['id'] ?? 1 ?>">
                         ========================================================== -->
                    <form action="" method="POST" class="flex items-center justify-end gap-3 pt-4 border-t border-stone-200">
                        <input type="hidden" name="id" value="<?= htmlspecialchars($_GET['id'] ?? '1') ?>">
                        <a href="users.php" class="px-5 py-2.5 rounded-xl border border-stone-300 text-xs font-medium text-stone-700 hover:bg-stone-50 transition-colors">
                            Cancel
                        </a>
                        <button type="submit" name="delete" class="px-5 py-2.5 rounded-xl bg-rose-600 hover:bg-rose-700 text-white text-xs font-medium transition-colors shadow-xs flex items-center gap-2">
                            <i class="ri-delete-bin-line text-sm"></i>
                            <span>Confirm &amp; Delete User</span>
                        </button>
                    </form>
                </div>

            </main>

            <?php include "components/footer.php"; ?>
        </div>
    </div>

    <?php include "components/js.php"; ?>
</body>

</html>
