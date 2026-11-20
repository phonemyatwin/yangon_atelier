<?php
// Initialize session
require_once __DIR__ . '/../components/session_start.php';

// Check session
require_once __DIR__ . '/components/session_check.php';

// Connect database
require_once __DIR__ . '/../components/connection.php';

$errors = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['create'])) {
    $name = trim($_POST['name'] ?? '');
    $email = strtolower(trim($_POST['email'] ?? ''));
    $role = trim($_POST['role'] ?? '');
    $password = $_POST['password'] ?? '';
    $confirm_password = $_POST['confirm_password'] ?? '';

    // Check name
    if (empty($name)) {
        $errors['name'] = 'name is required.';
    } else if (mb_strlen($name) < 3 || mb_strlen($name) > 30) {
        $errors['name'] = 'name must be at least 3 to 30 characters.';
    }

    // Check email
    if (empty($email)) {
        $errors['email'] = 'Email is required.';
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Please enter a valid email address.';
    }
    if (!isset($errors['email'])) {
        $sql = 'SELECT 1 FROM admins WHERE email = :email LIMIT 1';
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['email' => $email]);
        if ($stmt->fetch()) {
            $errors['email'] = 'This email is already registered.';
        }
    }

    // Check role
    if (empty($role)) {
        $errors['role'] = 'Role is required.';
    }

    // Check password
    if (empty($password)) {
        $errors['password'] = 'Password is required.';
    } else if (mb_strlen($password) < 8) {
        $errors['password'] = 'Password must be at least 8 characters.';
    }

    // Check confirm password
    if (empty($confirm_password)) {
        $errors['confirm_password'] = 'Please confirm your password.';
    } else if ($password !== $confirm_password) {
        $errors['confirm_password'] = 'Passwords do not match.';
    }

    if (empty($errors)) {
        try {
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $sql = 'INSERT INTO admins(name, email, password, role) VALUES(:name, :email, :password, :role)';
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                ':name' => $name,
                ':email' => $email,
                ':password' => $hashed_password,
                ':role' => $role
            ]);
            $_SESSION['success'] = 'Account created successfully!';
            header('Location: admins.php');
            exit;
        } catch (PDOException $e) {
            error_log('Admin create error: ' . $e->getMessage() . "\n", 3, __DIR__ . '/../error.log');
            $errors['create'] = 'Unable to create at the moment. Please try again later.';
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create User Account | Yangon Atelier Admin</title>
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
                            <span class="text-[#362F2A] font-medium">New Admin</span>
                        </div>
                        <h2 class="font-serif text-2xl sm:text-3xl font-medium text-[#362F2A]">Create Client Account</h2>
                    </div>
                    <a href="admins.php" class="px-4 py-2 rounded-xl border border-[#C9C0B3] bg-[#DFD8CD] hover:bg-[#D5CDC1] text-xs font-semibold text-[#362F2A] transition-colors">
                        Cancel &amp; Return
                    </a>
                </div>

                <!-- Form Card in Raw Linen (#F6F3EE) -->
                <div class="bg-[#F6F3EE] rounded-3xl border border-[#C9C0B3] p-6 sm:p-10 shadow-xs">
                    <form action="" method="POST" class="space-y-5">

                        <!-- Name Field -->
                        <div class="space-y-1.5">
                            <label for="name" class="block text-xs font-semibold uppercase tracking-wider text-[#362F2A]">
                                Full Name <span class="text-rose-600">*</span>
                            </label>
                            <div class="relative">
                                <i class="ri-user-line absolute left-4 top-1/2 -translate-y-1/2 text-[#6E6359] text-base"></i>
                                <input type="text" id="name" name="name" value="<?= htmlspecialchars($name ?? '') ?>" placeholder="Enter a full name" class="w-full pl-11 pr-4 py-3 bg-[#EDE8E0] border border-[#C9C0B3] rounded-xl text-[#362F2A] text-sm placeholder-[#8C7D6B] focus:outline-none focus:ring-1 focus:ring-[#8A5A44] focus:border-[#8A5A44] transition-all">
                            </div>
                        </div>

                        <!-- Email Field -->
                        <div class="space-y-1.5">
                            <label for="email" class="block text-xs font-semibold uppercase tracking-wider text-[#362F2A]">
                                Email Address <span class="text-rose-600">*</span>
                            </label>
                            <div class="relative">
                                <i class="ri-mail-line absolute left-4 top-1/2 -translate-y-1/2 text-[#6E6359] text-base"></i>
                                <input type="email" id="email" name="email" value="<?= htmlspecialchars($email ?? '') ?>" placeholder="admin@domain.com" class="w-full pl-11 pr-4 py-3 bg-[#EDE8E0] border border-[#C9C0B3] rounded-xl text-[#362F2A] text-sm placeholder-[#8C7D6B] focus:outline-none focus:ring-1 focus:ring-[#8A5A44] focus:border-[#8A5A44] transition-all">
                            </div>
                        </div>

                        <!-- Role Field -->
                        <div class="space-y-1.5">
                            <label for="role" class="block text-xs font-semibold uppercase tracking-wider text-[#362F2A]">
                                Admin Role / Title <span class="text-rose-600">*</span>
                            </label>
                            <div class="relative">
                                <i class="ri-shield-star-line absolute left-4 top-1/2 -translate-y-1/2 text-[#6E6359] text-base"></i>
                                <input type="text" id="role" name="role" value="<?= htmlspecialchars($role ?? 'Senior Curator') ?>" placeholder="e.g. Senior Curator, Atelier Administrator" class="w-full pl-11 pr-4 py-3 bg-[#EDE8E0] border border-[#C9C0B3] rounded-xl text-[#362F2A] text-sm placeholder-[#8C7D6B] focus:outline-none focus:ring-1 focus:ring-[#8A5A44] focus:border-[#8A5A44] transition-all">
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

                        <!-- Actions -->
                        <div class="pt-4 border-t border-[#C9C0B3] flex items-center justify-end gap-3">
                            <a href="admins.php" class="px-5 py-3 rounded-xl border border-[#C9C0B3] bg-[#DFD8CD] hover:bg-[#D5CDC1] text-xs font-semibold text-[#362F2A] transition-colors">
                                Cancel
                            </a>
                            <button type="submit" name="create" class="px-6 py-3 rounded-xl bg-[#8A5A44] hover:bg-[#704735] text-[#F6F3EE] text-xs font-semibold transition-colors shadow-xs flex items-center gap-2">
                                <i class="ri-user-add-line text-base"></i>
                                <span>Create Admin Account</span>
                            </button>
                        </div>
                    </form>
                </div>

            </main>

            <?php include "components/footer.php"; ?>
        </div>
    </div>

    <script src="js/script.js"></script>
    <script src="../js/script.js"></script>

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