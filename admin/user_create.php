<?php

/**
 * ============================================================================
 * YANGON ATELIER BACKEND INSTRUCTION GUIDELINE - CREATE USER
 * ============================================================================
 * FILE: admin/user_create.php
 * PURPOSE: Secure user registration from admin panel. Hashes user passwords
 *          using BCRYPT and inserts user records into 'users' table.
 * ============================================================================
 */

// Initialize session
require_once __DIR__ . '/../components/session_start.php';

// Check session
require_once __DIR__ . '/components/session_check.php';

// Connect database
require_once __DIR__ . '/../components/connection.php';
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
                            <a href="users.php" class="hover:text-[#362F2A] transition-colors">Users</a>
                            <span>/</span>
                            <span class="text-[#362F2A] font-medium">New User</span>
                        </div>
                        <h2 class="font-serif text-2xl sm:text-3xl font-medium text-[#362F2A]">Create Client Account</h2>
                    </div>
                    <a href="users.php" class="px-4 py-2 rounded-xl border border-[#C9C0B3] bg-[#DFD8CD] hover:bg-[#D5CDC1] text-xs font-semibold text-[#362F2A] transition-colors">
                        Cancel &amp; Return
                    </a>
                </div>

                <!-- Error Notification Banner -->
                <?php if (!empty($error)): ?>
                    <div class="p-4 rounded-2xl bg-[#EFE0E0] border border-[#DFC8C8] text-[#8C3B3B] text-xs flex items-center gap-2.5">
                        <i class="ri-error-warning-line text-lg flex-shrink-0"></i>
                        <span><?= htmlspecialchars($error) ?></span>
                    </div>
                <?php endif; ?>

                <!-- Form Card in Raw Linen (#F6F3EE) -->
                <div class="bg-[#F6F3EE] rounded-3xl border border-[#C9C0B3] p-6 sm:p-10 shadow-xs">
                    <form action="" method="POST" class="space-y-5">

                        <!-- Username -->
                        <div class="space-y-1.5">
                            <label for="username" class="block text-xs font-semibold uppercase tracking-wider text-[#6E6359]">
                                Username <span class="text-[#8C3B3B]">*</span>
                            </label>
                            <div class="relative">
                                <i class="ri-user-line absolute left-4 top-1/2 -translate-y-1/2 text-[#6E6359] text-base"></i>
                                <input type="text" id="username" name="username" value="<?= htmlspecialchars($_POST['username'] ?? '') ?>" placeholder="e.g. ko_aung" class="w-full pl-11 pr-4 py-3 bg-[#EDE8E0] border border-[#C9C0B3] rounded-xl text-[#362F2A] text-sm placeholder-[#6E6359] focus:outline-none focus:ring-1 focus:ring-[#8A5A44] focus:border-[#8A5A44] transition-all">
                            </div>
                        </div>

                        <!-- Email -->
                        <div class="space-y-1.5">
                            <label for="email" class="block text-xs font-semibold uppercase tracking-wider text-[#6E6359]">
                                Email Address <span class="text-[#8C3B3B]">*</span>
                            </label>
                            <div class="relative">
                                <i class="ri-mail-line absolute left-4 top-1/2 -translate-y-1/2 text-[#6E6359] text-base"></i>
                                <input type="email" id="email" name="email" value="<?= htmlspecialchars($_POST['email'] ?? '') ?>" placeholder="user@domain.com" class="w-full pl-11 pr-4 py-3 bg-[#EDE8E0] border border-[#C9C0B3] rounded-xl text-[#362F2A] text-sm placeholder-[#6E6359] focus:outline-none focus:ring-1 focus:ring-[#8A5A44] focus:border-[#8A5A44] transition-all">
                            </div>
                        </div>

                        <!-- Password -->
                        <div class="space-y-1.5">
                            <label for="password" class="block text-xs font-semibold uppercase tracking-wider text-[#6E6359]">
                                Password <span class="text-[#8C3B3B]">*</span>
                            </label>
                            <div class="relative">
                                <i class="ri-lock-2-line absolute left-4 top-1/2 -translate-y-1/2 text-[#6E6359] text-base"></i>
                                <input type="password" id="password" name="password" placeholder="Enter strong password (min 6 chars)" class="w-full pl-11 pr-4 py-3 bg-[#EDE8E0] border border-[#C9C0B3] rounded-xl text-[#362F2A] text-sm placeholder-[#6E6359] focus:outline-none focus:ring-1 focus:ring-[#8A5A44] focus:border-[#8A5A44] transition-all">
                            </div>
                        </div>

                        <!-- Actions -->
                        <div class="pt-4 border-t border-[#C9C0B3] flex items-center justify-end gap-3">
                            <a href="users.php" class="px-5 py-3 rounded-xl border border-[#C9C0B3] bg-[#DFD8CD] hover:bg-[#D5CDC1] text-xs font-semibold text-[#362F2A] transition-colors">
                                Cancel
                            </a>
                            <button type="submit" name="create_user" class="px-6 py-3 rounded-xl bg-[#8A5A44] hover:bg-[#704735] text-[#F6F3EE] text-xs font-semibold transition-colors shadow-xs flex items-center gap-2">
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

    <script src="js/script.js"></script>
</body>

</html>