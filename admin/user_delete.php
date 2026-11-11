<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete User | FurnishMe Atelier Admin</title>
    <link rel="icon" href="../images/favicon.ico">
    <?php include "components/css.php"; ?>
</head>

<body class="bg-[#FAF8F5] text-stone-900 font-sans antialiased selection:bg-amber-900 selection:text-white">
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
                            <span class="text-rose-600 font-medium">Delete</span>
                        </div>
                        <h2 class="font-serif text-2xl sm:text-3xl font-medium text-stone-900">Confirm User Deletion</h2>
                    </div>
                    <a href="users.php" class="px-4 py-2 rounded-xl border border-stone-200 text-xs font-medium text-stone-700 hover:bg-white transition-colors">
                        Cancel
                    </a>
                </div>

                <!-- Confirmation Card -->
                <div class="bg-white rounded-3xl border border-rose-200 p-6 sm:p-10 shadow-xs">
                    <div class="flex items-start gap-4 p-4 rounded-2xl bg-rose-50 border border-rose-100 mb-6">
                        <i class="ri-error-warning-line text-2xl text-rose-600 flex-shrink-0 mt-0.5"></i>
                        <div>
                            <h3 class="text-sm font-semibold text-rose-900">Permanent Account Removal</h3>
                            <p class="text-xs text-rose-700 mt-1 leading-relaxed">
                                Are you sure you wish to delete this user account? The user will no longer be able to log in or access order history.
                            </p>
                        </div>
                    </div>

                    <!-- User Details Summary -->
                    <!-- [PHP_BACKEND_HOOK: Query user details by ID for deletion confirmation (SELECT * FROM users WHERE id = :id)] -->
                    <div class="border border-stone-200 rounded-2xl p-5 mb-8 flex items-center gap-4">
                        <div class="w-12 h-12 rounded-full bg-stone-900 text-white flex items-center justify-center font-serif text-sm font-semibold flex-shrink-0">
                            AD
                        </div>
                        <div class="space-y-0.5 text-xs">
                            <span class="text-stone-400 font-mono">User #1</span>
                            <h4 class="font-semibold text-stone-900 text-sm">admin</h4>
                            <p class="text-stone-500">Email: <span class="font-mono text-stone-800">admin@gmail.com</span></p>
                        </div>
                    </div>

                    <!-- [PHP_BACKEND_HOOK: User deletion handler. POST method, prevent deleting self/last admin account, execute DELETE FROM users WHERE id = :id] -->
                    <form method="POST" class="flex items-center justify-end gap-3 pt-4 border-t border-stone-100">
                        <input type="hidden" name="id" value="1">
                        <a href="users.php" class="px-5 py-2.5 rounded-xl border border-stone-200 text-xs font-medium text-stone-700 hover:bg-stone-50 transition-colors">
                            Cancel
                        </a>
                        <button type="submit" name="delete" class="px-5 py-2.5 rounded-xl bg-rose-600 hover:bg-rose-700 text-white text-xs font-medium transition-colors shadow-xs flex items-center gap-2">
                            <i class="ri-delete-bin-line text-sm"></i>
                            <span>Confirm &amp; Delete User</span>
                        </button>
                    </form>
                </div>

            </main>

            <?php include "components/footer.php"; ?>
        </div>
    </div>

    <?php include "components/js.php"; ?>
</body>

</html>
