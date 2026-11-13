<?php
/**
 * ============================================================================
 * FURNISHME BACKEND INSTRUCTION GUIDELINE - UPDATE USER ACCOUNT
 * ============================================================================
 * FILE: admin/user_update.php
 * PURPOSE: Queries existing user account by ID, populates the form, handles
 *          optional password reset, and updates the 'users' table.
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
 * 3. Validate and Query Existing User Record:
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
 * 4. Process POST Update:
 *    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
 *        $username = trim($_POST['username'] ?? '');
 *        $email    = trim($_POST['email'] ?? '');
 *        $password = $_POST['password'] ?? '';
 * 
 *        if (empty($username) || empty($email)) {
 *            $error = "Username and email cannot be empty.";
 *        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
 *            $error = "Please provide a valid email address.";
 *        } else {
 *            if (!empty($password)) {
 *                // User provided new password to reset
 *                $hashed = password_hash($password, PASSWORD_DEFAULT);
 *                $update_stmt = $connection->prepare("UPDATE users SET username = ?, email = ?, password = ? WHERE id = ?");
 *                $update_stmt->bind_param("sssi", $username, $email, $hashed, $id);
 *            } else {
 *                // Retain current password
 *                $update_stmt = $connection->prepare("UPDATE users SET username = ?, email = ? WHERE id = ?");
 *                $update_stmt->bind_param("ssi", $username, $email, $id);
 *            }
 * 
 *            if ($update_stmt->execute()) {
 *                $update_stmt->close();
 *                header("Location: users.php?msg=updated");
 *                exit;
 *            } else {
 *                $error = "Failed to update user account: " . $connection->error;
 *            }
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
    <title>Edit User Account | FurnishMe Admin</title>
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
                            <span class="text-[#FAF6EE] font-medium">Edit User</span>
                        </div>
                        <h2 class="font-serif text-2xl sm:text-3xl font-medium text-[#FAF6EE]">Edit Client Account</h2>
                    </div>
                    <a href="users.php" class="px-4 py-2 rounded-xl border border-[#2A231C] text-xs font-medium text-[#D6C8B4] hover:bg-white transition-colors">
                        Back to List
                    </a>
                </div>

                <!-- Error Notification Banner -->
                <?php if (!empty($error)): ?>
                    <div class="p-4 rounded-2xl bg-rose-950/60 border border-rose-800 text-rose-300 text-xs flex items-center gap-2.5">
                        <i class="ri-error-warning-line text-lg flex-shrink-0"></i>
                        <span><?= htmlspecialchars($error) ?></span>
                    </div>
                <?php endif; ?>

                <!-- Form Card -->
                <div class="bg-[#161310] rounded-3xl border border-[#2A231C] p-6 sm:p-10 shadow-xs">
                    <!-- ==========================================================
                         PHP BACKEND GUIDELINE: User Update Form
                         - Action: action="" (submits to self)
                         - Method: POST
                         - Hidden id input: <input type="hidden" name="id" value="<?= $user['id'] ?? 1 ?>">
                         - Prefill inputs with current record values
                         ========================================================== -->
                    <form action="" method="POST" class="space-y-5">
                        <input type="hidden" name="id" value="<?= htmlspecialchars($_GET['id'] ?? '1') ?>">

                        <!-- Username -->
                        <div class="space-y-1.5">
                            <label for="username" class="block text-xs font-semibold uppercase tracking-wider text-[#D6C8B4]">
                                Username <span class="text-rose-600">*</span>
                            </label>
                            <div class="relative">
                                <i class="ri-user-line absolute left-4 top-1/2 -translate-y-1/2 text-stone-400 text-base"></i>
                                <input type="text" id="username" name="username" required value="admin" class="w-full pl-11 pr-4 py-3 bg-[#0D0B09] border border-[#2A231C] rounded-xl text-[#FAF6EE] text-sm placeholder-[#8C7D6B] focus:outline-none focus:ring-2 focus:ring-[#C5A059] focus:border-[#C5A059] transition-all">
                            </div>
                        </div>

                        <!-- Email -->
                        <div class="space-y-1.5">
                            <label for="email" class="block text-xs font-semibold uppercase tracking-wider text-[#D6C8B4]">
                                Email Address <span class="text-rose-600">*</span>
                            </label>
                            <div class="relative">
                                <i class="ri-mail-line absolute left-4 top-1/2 -translate-y-1/2 text-stone-400 text-base"></i>
                                <input type="email" id="email" name="email" required value="admin@gmail.com" class="w-full pl-11 pr-4 py-3 bg-[#0D0B09] border border-[#2A231C] rounded-xl text-[#FAF6EE] text-sm placeholder-[#8C7D6B] focus:outline-none focus:ring-2 focus:ring-[#C5A059] focus:border-[#C5A059] transition-all">
                            </div>
                        </div>

                        <!-- Optional Password Change -->
                        <div class="space-y-1.5 pt-2 border-t border-[#2A231C]">
                            <label for="password" class="block text-xs font-semibold uppercase tracking-wider text-[#D6C8B4]">
                                Reset Password (Optional)
                            </label>
                            <div class="relative">
                                <i class="ri-lock-2-line absolute left-4 top-1/2 -translate-y-1/2 text-stone-400 text-base"></i>
                                <input type="password" id="password" name="password" placeholder="Leave empty to keep existing password" class="w-full pl-11 pr-4 py-3 bg-[#0D0B09] border border-[#2A231C] rounded-xl text-[#FAF6EE] text-sm placeholder-[#8C7D6B] focus:outline-none focus:ring-2 focus:ring-[#C5A059] focus:border-[#C5A059] transition-all">
                            </div>
                            <span class="text-[11px] text-stone-400">Only fill this if you want to replace the user's password.</span>
                        </div>

                        <!-- Actions -->
                        <div class="pt-4 border-t border-[#2A231C] flex items-center justify-end gap-3">
                            <a href="users.php" class="px-5 py-3 rounded-xl border border-[#2A231C] text-xs font-medium text-[#D6C8B4] hover:bg-[#0D0B09] transition-colors">
                                Cancel
                            </a>
                            <button type="submit" name="update_user" class="px-6 py-3 rounded-xl bg-[#C5A059] hover:bg-[#D4AF37] text-[#0D0B09] text-xs font-semibold transition-colors shadow-xs flex items-center gap-2">
                                <i class="ri-save-line text-base"></i>
                                <span>Save User Changes</span>
                            </button>
                        </div>
                    </form>
                </div>

            </main>

            <?php include "components/footer.php"; ?>
        </div>
    </div>

    <?php include "components/js.php"; ?>
</body>

</html>
