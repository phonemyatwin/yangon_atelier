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

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['register'])) {
    $username = trim($_POST['username'] ?? '');
    $email = strtolower(trim($_POST['email'] ?? ''));
    $password = $_POST['password'] ?? '';
    $confirm_password = $_POST['confirm_password'] ?? '';

    // Check username
    if (empty($username)) {
        $errors['username'] = 'Username is .';
    } else if (strlen($username) < 3 || strlen($username) > 30) {
        $errors['username'] = 'Username must be at least 3 to 30 characters.';
    }
    if (!isset($errors['username'])) {
        $sql = 'SELECT 1 FROM users WHERE username = :username LIMIT 1';
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['username' => $username]);
        if ($stmt->fetch()) {
            $errors['username'] = 'This username is already registered.';
        }
    }

    // Check email
    if (empty($email)) {
        $errors['email'] = 'Email is .';
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Please enter a valid email address.';
    }
    if (!isset($errors['email'])) {
        $sql = 'SELECT 1 FROM users WHERE email = :email LIMIT 1';
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['email' => $email]);
        if ($stmt->fetch()) {
            $errors['email'] = 'This email is already registered.';
        }
    }

    // Check password
    if (empty($password)) {
        $errors['password'] = 'Password is .';
    } else if (strlen($password) < 8) {
        $errors['password'] = 'Password must be at least 8 characters.';
    }

    // Check confirm password
    if (empty($confirm_password)) {
        $errors['confirm_password'] = 'Please confirm your password.';
    } else if ($password !== $confirm_password) {
        $errors['confirm_password'] = 'Passwords do not match.';
    }

    // Approve registration
    if (empty($errors)) {
        try {
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $sql = 'INSERT INTO users(username, email, password) VALUES(:username, :email, :password)';
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                ':username' => $username,
                ':email' => $email,
                ':password' => $hashed_password
            ]);
            $_SESSION['success'] = 'Account created successfully! Please sign in.';
            header('Location: login.php');
            exit;
        } catch (PDOException $e) {
            error_log('Register form error: ' . $e->getMessage() . '\n', 3, __DIR__ . '/error.log');
            $errors['register'] = 'Unable to register at the moment. Please try again later.';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Atelier Account | Yangon Atelier</title>
    <link rel="icon" type="image/x-icon" href="images/favicon/favicon.ico">
    <?php include "components/css.php"; ?>
</head>

<body class="bg-[#EDE8E0] text-[#362F2A] font-sans selection:bg-[#8A5A44] selection:text-[#F6F3EE] min-h-screen flex flex-col justify-between antialiased">
    <?php include "components/header.php"; ?>
    <?php include "components/navbar.php"; ?>

    <!-- MAIN REGISTRATION SECTION -->
    <main class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-12 lg:py-20 w-full flex-1 flex items-center justify-center">
        <div class="w-full bg-[#F6F3EE] rounded-3xl border border-[#C9C0B3] shadow-xl overflow-hidden grid grid-cols-1 md:grid-cols-12">

            <!-- Left Column: Visual Illustration & Brand Note -->
            <div class="md:col-span-5 bg-[#DFD8CD] p-8 sm:p-10 flex flex-col justify-between items-center text-center border-b md:border-b-0 md:border-r border-[#C9C0B3]">
                <div class="w-full text-left">
                    <span class="text-xs uppercase tracking-[0.2em] text-[#8A5A44] font-semibold block mb-1">New Membership</span>
                    <h2 class="font-serif text-2xl font-normal text-[#362F2A]">Join the Atelier</h2>
                </div>

                <div class="my-8 w-full max-w-xs flex items-center justify-center">
                    <img src="images/authentication/auth_register.svg" alt="Client registration illustration" width="300" height="300" class="w-full max-h-60 h-auto object-contain drop-shadow-sm" loading="lazy">
                </div>

                <div class="text-left w-full border-t border-[#C9C0B3] pt-4">
                    <p class="text-xs text-[#6E6359] leading-relaxed">
                        Curate your personal spatial catalog, receive invitations to studio releases, and access private bespoke commissions.
                    </p>
                </div>
            </div>

            <!-- Right Column: Registration Form -->
            <div class="md:col-span-7 p-8 sm:p-12 flex flex-col justify-center">
                <div class="mb-8">
                    <span class="text-xs uppercase tracking-widest text-[#8A5A44] font-semibold block mb-1">Client Registration</span>
                    <h1 class="font-serif text-3xl font-normal text-[#362F2A]">Create an Account</h1>
                    <p class="text-xs text-[#6E6359] mt-1">Fill in the details below to complete your registration.</p>
                </div>

                <form action="" method="POST" class="space-y-4">

                    <!-- Username Field -->
                    <div class="space-y-1.5">
                        <label for="username" class="block text-xs font-semibold uppercase tracking-wider text-[#362F2A]">
                            Username / Full Name <span class="text-rose-600">*</span>
                        </label>
                        <div class="relative">
                            <i class="ri-user-line absolute left-4 top-1/2 -translate-y-1/2 text-[#6E6359] text-base"></i>
                            <input type="text" id="username" name="username" value="<?= htmlspecialchars($username ?? '') ?>" placeholder="Choose a username" class="w-full pl-11 pr-4 py-3 bg-[#EDE8E0] border border-[#C9C0B3] rounded-xl text-[#362F2A] text-sm placeholder-[#8C7D6B] focus:outline-none focus:ring-1 focus:ring-[#8A5A44] focus:border-[#8A5A44] transition-all">
                        </div>
                    </div>

                    <!-- Email Field -->
                    <div class="space-y-1.5">
                        <label for="email" class="block text-xs font-semibold uppercase tracking-wider text-[#362F2A]">
                            Email Address <span class="text-rose-600">*</span>
                        </label>
                        <div class="relative">
                            <i class="ri-mail-line absolute left-4 top-1/2 -translate-y-1/2 text-[#6E6359] text-base"></i>
                            <input type="email" id="email" name="email" value="<?= htmlspecialchars($email ?? '') ?>" placeholder="client@example.com" class="w-full pl-11 pr-4 py-3 bg-[#EDE8E0] border border-[#C9C0B3] rounded-xl text-[#362F2A] text-sm placeholder-[#8C7D6B] focus:outline-none focus:ring-1 focus:ring-[#8A5A44] focus:border-[#8A5A44] transition-all">
                        </div>
                    </div>

                    <!-- Password Fields Grid -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <!-- Password -->
                        <div class="space-y-1.5">
                            <label for="password" class="block text-xs font-semibold uppercase tracking-wider text-[#362F2A]">
                                Password <span class="text-rose-600">*</span>
                            </label>
                            <div class="relative">
                                <i class="ri-lock-2-line absolute left-4 top-1/2 -translate-y-1/2 text-[#6E6359] text-base"></i>
                                <input type="password" id="password" name="password" placeholder="Min 8 characters" class="w-full pl-11 pr-10 py-3 bg-[#EDE8E0] border border-[#C9C0B3] rounded-xl text-[#362F2A] text-sm placeholder-[#8C7D6B] focus:outline-none focus:ring-1 focus:ring-[#8A5A44] focus:border-[#8A5A44] transition-all">
                                <button type="button" data-toggle-password="password" aria-label="Toggle password visibility" class="absolute right-3 top-1/2 -translate-y-1/2 text-[#6E6359] hover:text-[#362F2A] transition-colors">
                                    <i class="ri-eye-line text-sm"></i>
                                </button>
                            </div>
                        </div>

                        <!-- Confirm Password -->
                        <div class="space-y-1.5">
                            <label for="confirm_password" class="block text-xs font-semibold uppercase tracking-wider text-[#362F2A]">
                                Confirm <span class="text-rose-600">*</span>
                            </label>
                            <div class="relative">
                                <i class="ri-lock-password-line absolute left-4 top-1/2 -translate-y-1/2 text-[#6E6359] text-base"></i>
                                <input type="password" id="confirm_password" name="confirm_password" placeholder="Re-enter password" class="w-full pl-11 pr-10 py-3 bg-[#EDE8E0] border border-[#C9C0B3] rounded-xl text-[#362F2A] text-sm placeholder-[#8C7D6B] focus:outline-none focus:ring-1 focus:ring-[#8A5A44] focus:border-[#8A5A44] transition-all">
                                <button type="button" data-toggle-password="confirm_password" aria-label="Toggle password visibility" class="absolute right-3 top-1/2 -translate-y-1/2 text-[#6E6359] hover:text-[#362F2A] transition-colors">
                                    <i class="ri-eye-line text-sm"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Terms agreement note -->
                    <p class="text-[11px] text-[#6E6359] pt-1 leading-relaxed">
                        By creating an account, you agree to our <a href="terms.php" class="underline hover:text-[#8A5A44]">Terms of Service</a> and acknowledge our <a href="privacy.php" class="underline hover:text-[#8A5A44]">Privacy Policy</a>.
                    </p>

                    <!-- Submit Button -->
                    <button type="submit" name="register" class="w-full py-3.5 px-6 rounded-xl bg-[#8A5A44] hover:bg-[#704735] text-[#F6F3EE] font-semibold text-sm transition-all shadow-md hover:shadow-lg flex items-center justify-center gap-2">
                        <span>Register Account</span>
                        <i class="ri-arrow-right-line text-base"></i>
                    </button>

                    <!-- Link to Login -->
                    <p class="text-center text-xs text-[#6E6359] pt-2">
                        Already have an atelier account?
                        <a href="login.php" class="font-semibold text-[#8A5A44] hover:underline">Sign in instead</a>
                    </p>
                </form>
            </div>

        </div>
    </main>

    <?php include "components/footer.php"; ?>
    <script src="js/user.js"></script>
    <!-- Errors pop-up like a toaster -->
    <?php if (!empty($errors)): ?>
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                <?php foreach ($errors as $error): ?>
                    showToast(<?= json_encode($error); ?>, 'error');
                <?php endforeach; ?>
            });
        </script>
    <?php endif; ?>
</body>

</html>