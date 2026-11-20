<?php
// Initialize session
require_once __DIR__ . '/../components/session_start.php';

// Check session
require_once __DIR__ . '/components/session_check.php';

// Connect database
require_once __DIR__ . '/../components/connection.php';

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
    $_SESSION['error'] = 'You do not have permission to update this account.';
    header('Location: admins.php');
    exit;
}

$errors = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update'])) {
    $name = trim($_POST['name'] ?? $admin['name']);
    $email = strtolower(trim($_POST['email'] ?? $admin['email']));
    $role = trim($_POST['role'] ?? ($admin['role'] ?? 'Senior Curator'));
    $password = $_POST['password'] ?? '';

    if (empty($name) || empty($email) || empty($role)) {
        $errors['update'] = 'All fields are required. Please complete the form';
    } else {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'Please enter a valid email address.';
        }
        if (!isset($errors['email'])) {
            $sql = 'SELECT 1 FROM admins WHERE email = :email AND id != :id LIMIT 1';
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                ':id' => $admin['id'],
                ':email' => $email
            ]);
            if ($stmt->fetch()) {
                $errors['email'] = 'This email is already registered.';
            }
        }

        if (!empty($password) && mb_strlen($password) < 8) {
            $errors['password'] = 'Password must be at least 8 characters.';
        }
    }

    if (empty($errors)) {
        try {
            $password = !empty($password) ? password_hash($password, PASSWORD_DEFAULT) : $admin['password'];
            $sql = 'UPDATE admins SET name = :name, email = :email, role = :role, password = :password WHERE id = :id';
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                ':id' => $admin['id'],
                ':name' => $name,
                ':email' => $email,
                ':role' => $role,
                ':password' => $password,
            ]);

            // Synchronize active session if editing currently authenticated administrator
            if ((int)$_SESSION['admin']['id'] === (int)$admin['id']) {
                $_SESSION['admin']['name']  = $name;
                $_SESSION['admin']['email'] = $email;
                $_SESSION['admin']['role']  = $role;
            }

            $_SESSION['success'] = 'Account updated successfully!';
            header('Location: admins.php');
            exit;
        } catch (PDOException $e) {
            error_log('Admin update error: ' . $e->getMessage() . "\n", 3, __DIR__ . '/../error.log');
            $errors['update'] = 'Unable to update at the moment. Please try again later.';
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User Account | Yangon Atelier Admin</title>
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
                            <a href="admins.php" class="hover:text-[#362F2A] transition-colors">Users</a>
                            <span>/</span>
                            <span class="text-[#362F2A] font-medium">Edit User</span>
                        </div>
                        <h2 class="font-serif text-2xl sm:text-3xl font-medium text-[#362F2A]">Edit Client Account</h2>
                    </div>
                    <a href="admins.php" class="px-4 py-2 rounded-xl border border-[#C9C0B3] bg-[#DFD8CD] hover:bg-[#D5CDC1] text-xs font-semibold text-[#362F2A] transition-colors">
                        Back to List
                    </a>
                </div>

                <!-- Form Card in Raw Linen (#F6F3EE) -->
                <div class="bg-[#F6F3EE] rounded-3xl border border-[#C9C0B3] p-6 sm:p-10 shadow-xs">
                    <form action="" method="POST" class="space-y-5">
                        <!-- Name -->
                        <div class="space-y-1.5">
                            <label for="name" class="block text-xs font-semibold uppercase tracking-wider text-[#6E6359]">
                                Full Name <span class="text-[#8C3B3B]">*</span>
                            </label>
                            <div class="relative">
                                <i class="ri-user-line absolute left-4 top-1/2 -translate-y-1/2 text-[#6E6359] text-base"></i>
                                <input type="text" id="name" name="name" value="<?= htmlspecialchars($name ?? $admin['name']); ?>" class="w-full pl-11 pr-4 py-3 bg-[#EDE8E0] border border-[#C9C0B3] rounded-xl text-[#362F2A] text-sm placeholder-[#6E6359] focus:outline-none focus:ring-1 focus:ring-[#8A5A44] focus:border-[#8A5A44] transition-all">
                            </div>
                        </div>

                        <!-- Email -->
                        <div class="space-y-1.5">
                            <label for="email" class="block text-xs font-semibold uppercase tracking-wider text-[#6E6359]">
                                Email Address <span class="text-[#8C3B3B]">*</span>
                            </label>
                            <div class="relative">
                                <i class="ri-mail-line absolute left-4 top-1/2 -translate-y-1/2 text-[#6E6359] text-base"></i>
                                <input type="email" id="email" name="email" value="<?= htmlspecialchars($email ?? $admin['email']); ?>" class="w-full pl-11 pr-4 py-3 bg-[#EDE8E0] border border-[#C9C0B3] rounded-xl text-[#362F2A] text-sm placeholder-[#6E6359] focus:outline-none focus:ring-1 focus:ring-[#8A5A44] focus:border-[#8A5A44] transition-all">
                            </div>
                        </div>

                        <!-- Role -->
                        <div class="space-y-1.5">
                            <label for="role" class="block text-xs font-semibold uppercase tracking-wider text-[#6E6359]">
                                Admin Role / Title <span class="text-[#8C3B3B]">*</span>
                            </label>
                            <div class="relative">
                                <i class="ri-shield-star-line absolute left-4 top-1/2 -translate-y-1/2 text-[#6E6359] text-base"></i>
                                <input type="text" id="role" name="role" value="<?= htmlspecialchars($role ?? $admin['role'] ?? 'Senior Curator'); ?>" placeholder="e.g. Senior Curator, Atelier Administrator" class="w-full pl-11 pr-4 py-3 bg-[#EDE8E0] border border-[#C9C0B3] rounded-xl text-[#362F2A] text-sm placeholder-[#6E6359] focus:outline-none focus:ring-1 focus:ring-[#8A5A44] focus:border-[#8A5A44] transition-all">
                            </div>
                        </div>

                        <!-- Optional Password Change -->
                        <div class="space-y-1.5 pt-2 border-t border-[#C9C0B3]">
                            <label for="password" class="block text-xs font-semibold uppercase tracking-wider text-[#6E6359]">
                                Reset Password (Optional)
                            </label>
                            <div class="relative">
                                <i class="ri-lock-2-line absolute left-4 top-1/2 -translate-y-1/2 text-[#6E6359] text-base"></i>
                                <input type="password" id="password" name="password" placeholder="Leave empty to keep existing password" class="w-full pl-11 pr-4 py-3 bg-[#EDE8E0] border border-[#C9C0B3] rounded-xl text-[#362F2A] text-sm placeholder-[#6E6359] focus:outline-none focus:ring-1 focus:ring-[#8A5A44] focus:border-[#8A5A44] transition-all">
                            </div>
                            <span class="text-[11px] text-[#6E6359]">Only fill this if you want to replace the user's password.</span>
                        </div>

                        <!-- Actions -->
                        <div class="pt-4 border-t border-[#C9C0B3] flex items-center justify-end gap-3">
                            <a href="admins.php" class="px-5 py-3 rounded-xl border border-[#C9C0B3] bg-[#DFD8CD] hover:bg-[#D5CDC1] text-xs font-semibold text-[#362F2A] transition-colors">
                                Cancel
                            </a>
                            <button type="submit" name="update" class="px-6 py-3 rounded-xl bg-[#8A5A44] hover:bg-[#704735] text-[#F6F3EE] text-xs font-semibold transition-colors shadow-xs flex items-center gap-2">
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