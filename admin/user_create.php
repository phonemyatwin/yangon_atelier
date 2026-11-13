<?php
/**
 * ============================================================================
 * FURNISHME BACKEND INSTRUCTION GUIDELINE - CREATE USER ACCOUNT
 * ============================================================================
 * FILE: admin/user_create.php
 * PURPOSE: Allows administrators to create new client accounts, verifies unique
 *          email addresses, hashes passwords, and inserts records into 'users'.
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
 * 3. Handle POST Request:
 *    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
 *        $username = trim($_POST['username'] ?? '');
 *        $email    = trim($_POST['email'] ?? '');
 *        $password = $_POST['password'] ?? '';
 * 
 *        if (empty($username) || empty($email) || empty($password)) {
 *            $error = "All fields marked with an asterisk are required.";
 *        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
 *            $error = "Please enter a valid email address.";
 *        } elseif (strlen($password) < 6) {
 *            $error = "Password must be at least 6 characters long.";
 *        } else {
 *            // Unique email check
 *            $stmt = $connection->prepare("SELECT id FROM users WHERE email = ? LIMIT 1");
 *            $stmt->bind_param("s", $email);
 *            $stmt->execute();
 *            $stmt->store_result();
 * 
 *            if ($stmt->num_rows > 0) {
 *                $error = "A user account with that email already exists.";
 *            } else {
 *                $stmt->close();
 *                $hashed_pw = password_hash($password, PASSWORD_DEFAULT);
 *                $insert_stmt = $connection->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
 *                $insert_stmt->bind_param("sss", $username, $email, $hashed_pw);
 * 
 *                if ($insert_stmt->execute()) {
 *                    $insert_stmt->close();
 *                    header("Location: users.php?msg=created");
 *                    exit;
 *                } else {
 *                    $error = "Failed to create user account: " . $connection->error;
 *                }
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
    <title>Create User Account | FurnishMe Admin</title>
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
                            <span class="text-[#FAF6EE] font-medium">New User</span>
                        </div>
                        <h2 class="font-serif text-2xl sm:text-3xl font-medium text-[#FAF6EE]">Create Client Account</h2>
                    </div>
                    <a href="users.php" class="px-4 py-2 rounded-xl border border-[#2A231C] text-xs font-medium text-[#D6C8B4] hover:bg-white transition-colors">
                        Cancel &amp; Return
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
                         PHP BACKEND GUIDELINE: User Creation Form
                         - Action: action="" (submits to self)
                         - Method: POST
                         - Trigger: name="create_user"
                         ========================================================== -->
                    <form action="" method="POST" class="space-y-5">
                        
                        <!-- Username -->
                        <div class="space-y-1.5">
                            <label for="username" class="block text-xs font-semibold uppercase tracking-wider text-[#D6C8B4]">
                                Username <span class="text-rose-600">*</span>
                            </label>
                            <div class="relative">
                                <i class="ri-user-line absolute left-4 top-1/2 -translate-y-1/2 text-stone-400 text-base"></i>
                                <input type="text" id="username" name="username" required value="<?= htmlspecialchars($_POST['username'] ?? '') ?>" placeholder="e.g. ko_aung" class="w-full pl-11 pr-4 py-3 bg-[#0D0B09] border border-[#2A231C] rounded-xl text-[#FAF6EE] text-sm placeholder-[#8C7D6B] focus:outline-none focus:ring-2 focus:ring-[#C5A059] focus:border-[#C5A059] transition-all">
                            </div>
                        </div>

                        <!-- Email -->
                        <div class="space-y-1.5">
                            <label for="email" class="block text-xs font-semibold uppercase tracking-wider text-[#D6C8B4]">
                                Email Address <span class="text-rose-600">*</span>
                            </label>
                            <div class="relative">
                                <i class="ri-mail-line absolute left-4 top-1/2 -translate-y-1/2 text-stone-400 text-base"></i>
                                <input type="email" id="email" name="email" required value="<?= htmlspecialchars($_POST['email'] ?? '') ?>" placeholder="user@domain.com" class="w-full pl-11 pr-4 py-3 bg-[#0D0B09] border border-[#2A231C] rounded-xl text-[#FAF6EE] text-sm placeholder-[#8C7D6B] focus:outline-none focus:ring-2 focus:ring-[#C5A059] focus:border-[#C5A059] transition-all">
                            </div>
                        </div>

                        <!-- Password -->
                        <div class="space-y-1.5">
                            <label for="password" class="block text-xs font-semibold uppercase tracking-wider text-[#D6C8B4]">
                                Password <span class="text-rose-600">*</span>
                            </label>
                            <div class="relative">
                                <i class="ri-lock-2-line absolute left-4 top-1/2 -translate-y-1/2 text-stone-400 text-base"></i>
                                <input type="password" id="password" name="password" required placeholder="Enter strong password (min 6 chars)" class="w-full pl-11 pr-4 py-3 bg-[#0D0B09] border border-[#2A231C] rounded-xl text-[#FAF6EE] text-sm placeholder-[#8C7D6B] focus:outline-none focus:ring-2 focus:ring-[#C5A059] focus:border-[#C5A059] transition-all">
                            </div>
                        </div>

                        <!-- Actions -->
                        <div class="pt-4 border-t border-[#2A231C] flex items-center justify-end gap-3">
                            <a href="users.php" class="px-5 py-3 rounded-xl border border-[#2A231C] text-xs font-medium text-[#D6C8B4] hover:bg-[#0D0B09] transition-colors">
                                Cancel
                            </a>
                            <button type="submit" name="create_user" class="px-6 py-3 rounded-xl bg-[#C5A059] hover:bg-[#D4AF37] text-[#0D0B09] text-xs font-semibold transition-colors shadow-xs flex items-center gap-2">
                                <i class="ri-user-add-line text-base"></i>
                                <span>Create User Account</span>
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
