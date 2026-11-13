<?php
// Initialize session
require_once __DIR__ . '/components/session_start.php';

// Redirect if already logged in as user
if (isset($_SESSION['user'])) {
    header('Location: index.php');
    exit;
}

// Connect database
require_once __DIR__ . '/components/connection.php';

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
    $email = strtolower(trim($_POST['email'] ?? ''));
    $password = $_POST['password'] ?? '';
    $remember = isset($_POST['remember']);

    $sql = 'SELECT * FROM users WHERE email = :email LIMIT 1';
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':email' => $email]);
    $user = $stmt->fetch();

    // I check all of the credentials in a single if statement and output only one error information as I've learnt that it is the industry standard to prevent the malicious attack called User Enumeration(Account Harvesting).
    if ($user && !empty($password) && password_verify($password, $user['password'])) {
        // Regenerate new session id to prevent malicious attack called Session Fixation(session hijacking).
        session_regenerate_id(true);
        // Remember me
        require_once __DIR__ . '/components/remember_me.php';
        $_SESSION['user'] = [
            'id' => $user['id'],
            'username' => $user['username'],
            'email' => $user['email']
        ];

        header('Location: index.php');
        exit;
    } else {
        $errors['login'] = 'The login information you entered is incorrect.';
    }
}

?>

<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Client Sign In | Yangon Atelier</title>
    <link rel="icon" type="image/x-icon" href="images/favicon/favicon.ico">
    <?php include "components/css.php"; ?>
</head>

<body class="bg-[#EDE8E0] text-[#362F2A] font-sans selection:bg-[#8A5A44] selection:text-[#F6F3EE] min-h-screen flex flex-col justify-between antialiased">
    <?php include "components/header.php"; ?>
    <?php include "components/navbar.php"; ?>

    <!-- MAIN AUTH SECTION -->
    <main class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-12 lg:py-20 w-full flex-1 flex items-center justify-center">
        <div class="w-full bg-[#F6F3EE] rounded-3xl border border-[#C9C0B3] shadow-xl overflow-hidden grid grid-cols-1 md:grid-cols-12">

            <!-- Left Column: Visual Illustration & Brand Note -->
            <div class="md:col-span-5 bg-[#DFD8CD] p-8 sm:p-10 flex flex-col justify-between items-center text-center border-b md:border-b-0 md:border-r border-[#C9C0B3]">
                <div class="w-full text-left">
                    <span class="text-xs uppercase tracking-[0.2em] text-[#8A5A44] font-semibold block mb-1">Client Sanctuary</span>
                    <h2 class="font-serif text-2xl font-normal text-[#362F2A]">Welcome Back</h2>
                </div>

                <div class="my-8 w-full max-w-xs flex items-center justify-center">
                    <img src="images/authentication/auth_login.svg" alt="Client sign in illustration" width="300" height="300" class="w-full max-h-60 h-auto object-contain drop-shadow-sm" loading="lazy">
                </div>

                <div class="text-left w-full border-t border-[#C9C0B3] pt-4">
                    <p class="text-xs text-[#6E6359] leading-relaxed">
                        Access saved architectural selections, track commission timelines, and view bespoke proposals.
                    </p>
                </div>
            </div>

            <!-- Right Column: Sign In Form -->
            <div class="md:col-span-7 p-8 sm:p-12 flex flex-col justify-center">
                <div class="mb-8">
                    <span class="text-xs uppercase tracking-widest text-[#8A5A44] font-semibold block mb-1">Account Authentication</span>
                    <h1 class="font-serif text-3xl font-normal text-[#362F2A]">Sign in to Yangon Atelier</h1>
                    <p class="text-xs text-[#6E6359] mt-1">Please enter your verified email and password.</p>
                </div>

                <form action="" method="POST" class="space-y-5">

                    <!-- Email Field -->
                    <div class="space-y-1.5">
                        <label for="email" class="block text-xs font-semibold uppercase tracking-wider text-[#362F2A]">
                            Email Address <span class="text-rose-600">*</span>
                        </label>
                        <div class="relative">
                            <i class="ri-mail-line absolute left-4 top-1/2 -translate-y-1/2 text-[#6E6359] text-base"></i>
                            <input type="email" id="email" name="email" required value="<?= htmlspecialchars($email ?? $_COOKIE['email_cookie'] ?? '') ?>" placeholder="client@example.com" class="w-full pl-11 pr-4 py-3 bg-[#EDE8E0] border border-[#C9C0B3] rounded-xl text-[#362F2A] text-sm placeholder-[#8C7D6B] focus:outline-none focus:ring-1 focus:ring-[#8A5A44] focus:border-[#8A5A44] transition-all">
                        </div>
                    </div>

                    <!-- Password Field with Toggle -->
                    <div class="space-y-1.5">
                        <div class="flex items-center justify-between">
                            <label for="password" class="block text-xs font-semibold uppercase tracking-wider text-[#362F2A]">
                                Password <span class="text-rose-600">*</span>
                            </label>
                            <a href="#" class="text-xs text-[#6E6359] hover:text-[#362F2A] transition-colors">Forgot password?</a>
                        </div>
                        <div class="relative">
                            <i class="ri-lock-2-line absolute left-4 top-1/2 -translate-y-1/2 text-[#6E6359] text-base"></i>
                            <input type="password" id="password" name="password" required placeholder="Enter your password" class="w-full pl-11 pr-11 py-3 bg-[#EDE8E0] border border-[#C9C0B3] rounded-xl text-[#362F2A] text-sm placeholder-[#8C7D6B] focus:outline-none focus:ring-1 focus:ring-[#8A5A44] focus:border-[#8A5A44] transition-all">
                            <button type="button" data-toggle-password="password" aria-label="Toggle password visibility" class="absolute right-3.5 top-1/2 -translate-y-1/2 text-[#6E6359] hover:text-[#362F2A] transition-colors">
                                <i class="ri-eye-line text-base"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Remember Me Option -->
                    <div class="flex items-center justify-between text-xs pt-1">
                        <label class="flex items-center gap-2.5 text-[#6E6359] hover:text-[#362F2A] cursor-pointer select-none transition-colors" for="remember-me">
                            <input type="checkbox" name="remember" id="remember-me" class="atelier-checkbox" <?= isset($_COOKIE['email_cookie']) ? 'checked' : '' ?>>
                            <span>Keep me signed in on this device</span>
                        </label>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" name="login" class="w-full py-3.5 px-6 rounded-xl bg-[#8A5A44] hover:bg-[#704735] text-[#F6F3EE] font-semibold text-sm transition-all shadow-md hover:shadow-lg flex items-center justify-center gap-2">
                        <span>Sign In</span>
                        <i class="ri-arrow-right-line text-base"></i>
                    </button>

                    <!-- Link to Register -->
                    <p class="text-center text-xs text-[#6E6359] pt-2">
                        New to Yangon Atelier?
                        <a href="register.php" class="font-semibold text-[#8A5A44] hover:underline">Create an account</a>
                    </p>
                </form>
            </div>

        </div>
    </main>

    <?php include "components/footer.php"; ?>
    <?php include "components/js.php"; ?>

    <!-- Toaster pop-ups -->
    <?php if (isset($_SESSION['success'])): ?>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                showToast(<?= json_encode($_SESSION['success']); ?>, 'success');
            });
        </script>
        <?php unset($_SESSION['success']); ?>
    <?php endif; ?>

    <!-- Errors -->
    <?php if (!empty($errors)): ?>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                showToast(<?= json_encode($errors['login']); ?>, 'error');
            });
        </script>
    <?php endif; ?>
</body>

</html>