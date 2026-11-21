<?php
// Initialize session
require_once __DIR__ . '/../components/session_start.php';

// Redirect if already logged in as admin
if (isset($_SESSION['admin'])) {
    header("Location: dashboard.php");
    exit;
}

// Connect database
require_once __DIR__ . '/../components/connection.php';

$errors = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
    $email = strtolower(trim($_POST['email'] ?? ''));
    $password = $_POST['password'] ?? '';
    $remember = isset($_POST['remember']);

    $sql = 'SELECT * FROM admins WHERE email = :email LIMIT 1';
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':email' => $email]);
    $admin = $stmt->fetch();

    if ($admin && !empty($password) && password_verify($password, $admin['password'])) {
        session_regenerate_id(true);

        $thirty_days = time() + (60 * 60 * 24 * 30);

        setcookie('admin_email_cookie', $remember ? $email : '', [
            'expires' => $remember ? $thirty_days : time() - 3600,
            'path' => '/',
            'httponly' => true,
            'samesite' => 'Lax'
        ]);

        if ($remember) {
            $params = session_get_cookie_params();
            setcookie(session_name(), session_id(), [
                'expires' => $thirty_days,
                'path' => $params['path'],
                'httponly' => $params['httponly'],
                'samesite' => $params['samesite'],
            ]);
        }

        $_SESSION['admin'] = [
            'id' => $admin['id'],
            'name' => $admin['name'],
            'email' => $admin['email'],
            'role' => $admin['role']
        ];

        // Mark active timestamp
        try {
            $stmt = $pdo->prepare("UPDATE admins SET last_activity = NOW() WHERE id = :id");
            $stmt->execute([':id' => $admin['id']]);
        } catch (PDOException $e) {
            // Silently ignore
        }

        $_SESSION['success'] = 'Welcome back! ' . $_SESSION['admin']['name'];
        header('Location: dashboard.php');
        exit;
    } else {
        $errors['login'] = 'The login information you entered is incorrect. Please try again.';
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Authentication | Yangon Atelier</title>
    <link rel="icon" type="image/x-icon" href="../images/favicon/favicon.ico">
    <?php include "components/css.php"; ?>
</head>

<body class="bg-[#EDE8E0] text-[#362F2A] font-sans min-h-screen flex items-center justify-center p-4 selection:bg-[#8A5A44] selection:text-[#F6F3EE] antialiased">
    <div class="w-full max-w-md">
        <!-- Brand Header -->
        <div class="text-center mb-8">
            <div class="inline-flex w-16 h-16 rounded-2xl bg-[#EDE8E0] border border-[#C9C0B3] items-center justify-center p-2 mb-4 shadow-md overflow-hidden">
                <img src="../images/logo/Yangon_Atelier.png" alt="Yangon Atelier Logo" class="w-full h-full object-contain">
            </div>
            <h1 class="font-serif text-2xl sm:text-3xl font-medium tracking-tight text-[#362F2A]">Yangon Atelier</h1>
            <p class="text-xs text-[#8A5A44] uppercase tracking-[0.2em] mt-1.5 font-semibold">Administrative Gateway</p>
        </div>

        <!-- Auth Card in Raw Linen -->
        <div class="bg-[#F6F3EE] border border-[#C9C0B3] rounded-3xl p-8 sm:p-10 shadow-lg">
            <div class="mb-6">
                <h2 class="font-serif text-xl font-medium text-[#362F2A]">Sign in to Workspace</h2>
                <p class="text-xs text-[#6E6359] mt-1">Enter your administrator credentials to manage products, editorial, and clients.</p>
            </div>

            <form action="" method="POST" class="space-y-5">
                <!-- Email -->
                <div class="space-y-1.5">
                    <label for="email" class="block text-xs font-semibold uppercase tracking-wider text-[#6E6359]">
                        Admin Email
                    </label>
                    <div class="relative">
                        <i class="ri-mail-line absolute left-4 top-1/2 -translate-y-1/2 text-[#6E6359] text-base"></i>
                        <input type="email" id="email" name="email" placeholder="admin@example.com" value="<?= htmlspecialchars($email ?? $_COOKIE['admin_email_cookie'] ?? '') ?>" class="w-full pl-11 pr-4 py-3 bg-[#EDE8E0] border border-[#C9C0B3] rounded-xl text-[#362F2A] text-sm placeholder-[#6E6359] focus:outline-none focus:ring-1 focus:ring-[#8A5A44] focus:border-[#8A5A44] transition-all">
                    </div>
                </div>

                <!-- Password -->
                <div class="space-y-1.5">
                    <label for="password" class="block text-xs font-semibold uppercase tracking-wider text-[#6E6359]">
                        Password
                    </label>
                    <div class="relative">
                        <i class="ri-lock-2-line absolute left-4 top-1/2 -translate-y-1/2 text-[#6E6359] text-base"></i>
                        <input type="password" id="password" name="password" placeholder="Enter your password" class="w-full pl-11 pr-11 py-3 bg-[#EDE8E0] border border-[#C9C0B3] rounded-xl text-[#362F2A] text-sm placeholder-[#6E6359] focus:outline-none focus:ring-1 focus:ring-[#8A5A44] focus:border-[#8A5A44] transition-all">
                    </div>
                </div>

                <!-- Remember Me Option -->
                <div class="flex items-center justify-between text-xs pt-1">
                    <label class="flex items-center gap-2.5 text-[#6E6359] hover:text-[#362F2A] cursor-pointer select-none transition-colors" for="remember-me">
                        <input type="checkbox" name="remember" id="remember-me" class="atelier-checkbox" <?= isset($_COOKIE['admin_email_cookie']) ? 'checked' : '' ?>>
                        <span>Remember me</span>
                    </label>
                </div>

                <!-- Submit Button -->
                <button type="submit" name="login" class="w-full py-3.5 px-6 rounded-xl bg-[#8A5A44] hover:bg-[#704735] text-[#F6F3EE] font-semibold text-sm transition-all shadow-md flex items-center justify-center gap-2 mt-2">
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
            Yangon Atelier &copy; <?= date("Y"); ?> • Restricted Atelier Access
        </p>
    </div>

    <script src="js/script.js"></script>
    <script src="../js/script.js"></script>

    <?php if (!empty($errors)): ?>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                showToast(<?= json_encode($errors['login']); ?>, 'error');
            });
        </script>
    <?php endif; ?>
</body>

</html>