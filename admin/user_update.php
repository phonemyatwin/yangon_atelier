<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User | FurnishMe Atelier Admin</title>
    <link rel="icon" type="image/x-icon" href="../images/favicon.ico?v=2">
    <link rel="icon" type="image/png" sizes="32x32" href="../images/favicon-32x32.png?v=2">
    <link rel="icon" type="image/png" sizes="16x16" href="../images/favicon-16x16.png?v=2">
    <link rel="apple-touch-icon" sizes="180x180" href="../images/apple-touch-icon.png?v=2">
    <?php include "components/css.php"; ?>
</head>

<body class="bg-[#F5EFE6] text-stone-900 font-sans antialiased selection:bg-amber-800 selection:text-white">
    <div class="min-h-screen flex">
        <?php include "components/sidebar.php"; ?>

        <div class="lg:pl-64 flex flex-col flex-1 min-w-0">
            <?php include "components/topbar.php"; ?>

            <main class="flex-1 p-4 sm:p-6 lg:p-8 max-w-3xl w-full mx-auto space-y-6">
                
                <!-- Heading -->
                <div class="flex items-center justify-between">
                    <div>
                        <div class="flex items-center gap-2 text-xs text-stone-500 mb-1">
                            <a href="dashboard.php" class="hover:text-stone-900">Dashboard</a>
                            <span>/</span>
                            <a href="users.php" class="hover:text-stone-900">Users</a>
                            <span>/</span>
                            <span class="text-stone-800 font-medium">Edit User</span>
                        </div>
                        <h2 class="font-serif text-2xl sm:text-3xl font-medium text-stone-900">Edit User Account</h2>
                    </div>
                    <a href="users.php" class="px-4 py-2 rounded-xl border border-[#E2D8C9] text-xs font-medium text-stone-700 hover:bg-white transition-colors">
                        Back to List
                    </a>
                </div>

                <!-- Form Card -->
                <div class="bg-[#FCFAF7] rounded-3xl border border-[#E2D8C9] p-6 sm:p-10 shadow-xs">
                    <!-- [PHP_BACKEND_HOOK: User update handler. Method: POST. Sanitize inputs, check if password changed (if so hash new password), UPDATE users SET username = :username, email = :email WHERE id = :id] -->
                    <form method="POST" class="space-y-5">
                        <input type="hidden" name="id" value="1">

                        <!-- Username -->
                        <div class="space-y-1.5">
                            <label for="username" class="block text-xs font-semibold uppercase tracking-wider text-stone-700">
                                Username <span class="text-rose-600">*</span>
                            </label>
                            <div class="relative">
                                <i class="ri-user-line absolute left-4 top-1/2 -translate-y-1/2 text-stone-400 text-base"></i>
                                <input type="text" id="username" name="username" required value="admin" class="w-full pl-11 pr-4 py-3 bg-[#F5EFE6] border border-[#E2D8C9] rounded-xl text-stone-900 text-sm placeholder-stone-400 focus:outline-none focus:ring-2 focus:ring-[#7C4E26] focus:border-amber-900 transition-all">
                            </div>
                        </div>

                        <!-- Email -->
                        <div class="space-y-1.5">
                            <label for="email" class="block text-xs font-semibold uppercase tracking-wider text-stone-700">
                                Email Address <span class="text-rose-600">*</span>
                            </label>
                            <div class="relative">
                                <i class="ri-mail-line absolute left-4 top-1/2 -translate-y-1/2 text-stone-400 text-base"></i>
                                <input type="email" id="email" name="email" required value="admin@gmail.com" class="w-full pl-11 pr-4 py-3 bg-[#F5EFE6] border border-[#E2D8C9] rounded-xl text-stone-900 text-sm placeholder-stone-400 focus:outline-none focus:ring-2 focus:ring-[#7C4E26] focus:border-amber-900 transition-all">
                            </div>
                        </div>

                        <!-- Optional Password Change -->
                        <div class="space-y-1.5 pt-2 border-t border-[#E2D8C9]">
                            <label for="password" class="block text-xs font-semibold uppercase tracking-wider text-stone-700">
                                Reset Password (Optional)
                            </label>
                            <div class="relative">
                                <i class="ri-lock-2-line absolute left-4 top-1/2 -translate-y-1/2 text-stone-400 text-base"></i>
                                <input type="password" id="password" name="password" placeholder="Leave empty to keep existing password" class="w-full pl-11 pr-4 py-3 bg-[#F5EFE6] border border-[#E2D8C9] rounded-xl text-stone-900 text-sm placeholder-stone-400 focus:outline-none focus:ring-2 focus:ring-[#7C4E26] focus:border-amber-900 transition-all">
                            </div>
                            <span class="text-[11px] text-stone-400">Only fill this if you want to replace the user's password.</span>
                        </div>

                        <!-- Form Actions -->
                        <div class="pt-4 border-t border-[#E2D8C9] flex items-center justify-end gap-3">
                            <a href="users.php" class="px-5 py-3 rounded-xl border border-[#E2D8C9] text-xs font-medium text-stone-700 hover:bg-[#F5EFE6] transition-colors">
                                Cancel
                            </a>
                            <button type="submit" name="update" class="px-6 py-3 rounded-xl bg-[#1A1613] hover:bg-[#7C4E26] text-[#F7F3EC] text-xs font-medium transition-colors shadow-xs flex items-center gap-2">
                                <i class="ri-save-line text-sm"></i>
                                <span>Save Changes</span>
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
