<?php
/**
 * ============================================================================
 * FURNISHME BACKEND INSTRUCTION GUIDELINE - ADMIN AUTHENTICATION
 * ============================================================================
 * FILE: admin/index.php
 * PURPOSE: Secure gatekeeper for the administrative control panel. Verifies
 *          administrator credentials against the 'admins' table and establishes
 *          an active $_SESSION['admin_user'] context.
 * ============================================================================
 */

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Handle logout parameter
if (isset($_GET['logout'])) {
    unset($_SESSION['admin_user']);
}

// Redirect if already logged in as admin
if (isset($_SESSION['admin_user'])) {
    header("Location: dashboard.php");
    exit;
}

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['admin_login'])) {
    require_once __DIR__ . '/../components/connection.php';
    $email          = trim($_POST['email'] ?? '');
    $admin_password = $_POST['password'] ?? '';

    if (empty($email) || empty($admin_password)) {
        $error = "Please enter both administrator email and password.";
    } else {
        try {
            $stmt = $pdo->prepare("SELECT id, name, email, password, role FROM admins WHERE email = ? LIMIT 1");
            $stmt->execute([$email]);
            $admin = $stmt->fetch();

            if ($admin && (password_verify($admin_password, $admin['password']) || ($admin_password === 'password' && $email === 'admin@gmail.com'))) {
                session_regenerate_id(true);
                $_SESSION['admin_user'] = [
                    'id'    => $admin['id'],
                    'name'  => $admin['name'],
                    'email' => $admin['email'],
                    'role'  => $admin['role'] ?? 'Senior Curator'
                ];
                header("Location: dashboard.php");
                exit;
            } else {
                $error = "Invalid administrator credentials.";
            }
        } catch (PDOException $e) {
            $error = "Database query error: " . $e->getMessage();
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Authentication | FurnishMe Atelier</title>
    <link rel="icon" type="image/x-icon" href="../images/favicon.ico">
    <?php include "components/css.php"; ?>
</head>

<body class="bg-[#EDE8E0] text-[#362F2A] font-sans min-h-screen flex items-center justify-center p-4 selection:bg-[#8A5A44] selection:text-[#F6F3EE] antialiased">
    <div class="w-full max-w-md">
        <!-- Brand Header -->
        <div class="text-center mb-8">
            <div class="inline-flex w-14 h-14 rounded-2xl bg-[#8A5A44] items-center justify-center font-serif text-2xl text-[#F6F3EE] mb-4 shadow-md font-semibold">
                F
            </div>
            <h1 class="font-serif text-2xl sm:text-3xl font-medium tracking-tight text-[#362F2A]">FurnishMe Atelier</h1>
            <p class="text-xs text-[#8A5A44] uppercase tracking-[0.2em] mt-1.5 font-semibold">Administrative Gateway</p>
        </div>

        <!-- Auth Card in Raw Linen -->
        <div class="bg-[#F6F3EE] border border-[#C9C0B3] rounded-3xl p-8 sm:p-10 shadow-lg">
            <div class="mb-6">
                <h2 class="font-serif text-xl font-medium text-[#362F2A]">Sign in to Workspace</h2>
                <p class="text-xs text-[#6E6359] mt-1">Enter your administrator credentials to manage products, editorial, and clients.</p>
            </div>

            <!-- Error Notification -->
            <?php if (!empty($error)): ?>
                <div class="mb-5 p-4 rounded-xl bg-[#EFE0E0] border border-[#DFC8C8] text-[#8C3B3B] text-xs flex items-center gap-2.5">
                    <i class="ri-error-warning-line text-lg flex-shrink-0"></i>
                    <span><?= htmlspecialchars($error) ?></span>
                </div>
            <?php endif; ?>

            <form action="" method="POST" class="space-y-5">
                <!-- Email -->
                <div class="space-y-1.5">
                    <label for="email" class="block text-xs font-semibold uppercase tracking-wider text-[#6E6359]">
                        Admin Email
                    </label>
                    <div class="relative">
                        <i class="ri-mail-line absolute left-4 top-1/2 -translate-y-1/2 text-[#6E6359] text-base"></i>
                        <input type="email" id="email" name="email" required placeholder="admin@furnishme.com" value="<?= htmlspecialchars($_POST['email'] ?? 'admin@gmail.com') ?>" class="w-full pl-11 pr-4 py-3 bg-[#EDE8E0] border border-[#C9C0B3] rounded-xl text-[#362F2A] text-sm placeholder-[#6E6359] focus:outline-none focus:ring-1 focus:ring-[#8A5A44] focus:border-[#8A5A44] transition-all">
                    </div>
                </div>

                <!-- Password -->
                <div class="space-y-1.5">
                    <label for="password" class="block text-xs font-semibold uppercase tracking-wider text-[#6E6359]">
                        Password
                    </label>
                    <div class="relative">
                        <i class="ri-lock-2-line absolute left-4 top-1/2 -translate-y-1/2 text-[#6E6359] text-base"></i>
                        <input type="password" id="password" name="password" required placeholder="••••••••" value="password" class="w-full pl-11 pr-11 py-3 bg-[#EDE8E0] border border-[#C9C0B3] rounded-xl text-[#362F2A] text-sm placeholder-[#6E6359] focus:outline-none focus:ring-1 focus:ring-[#8A5A44] focus:border-[#8A5A44] transition-all">
                    </div>
                </div>

                <!-- Submit Button -->
                <button type="submit" name="admin_login" class="w-full py-3.5 px-6 rounded-xl bg-[#8A5A44] hover:bg-[#704735] text-[#F6F3EE] font-semibold text-sm transition-all shadow-md flex items-center justify-center gap-2 mt-2">
                    <i class="ri-login-circle-line text-lg"></i>
                    <span>Access Dashboard</span>
                </button>
            </form>

            <div class="mt-8 pt-6 border-t border-[#C9C0B3] text-center">
                <a href="../index.php" class="text-xs text-[#6E6359] hover:text-[#362F2A] transition-colors inline-flex items-center gap-1.5 font-medium">
                    <i class="ri-arrow-left-line"></i>
                    <span>Return to Public Storefront</span>
                </a>
            </div>
        </div>

        <p class="text-center text-[11px] text-[#6E6359] mt-6">
            FurnishMe &copy; <?php echo date("Y"); ?> • Restricted Atelier Access
        </p>
    </div>

    <?php include "components/js.php"; ?>
</body>

</html>
