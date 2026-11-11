<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Accounts | FurnishMe Atelier Admin</title>
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

            <main class="flex-1 p-4 sm:p-6 lg:p-8 max-w-7xl w-full mx-auto space-y-6">
                
                <!-- Page Action Header -->
                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                    <div>
                        <div class="flex items-center gap-2 text-xs text-stone-500 mb-1">
                            <a href="dashboard.php" class="hover:text-stone-900">Dashboard</a>
                            <span>/</span>
                            <span class="text-stone-800 font-medium">Users</span>
                        </div>
                        <h2 class="font-serif text-2xl sm:text-3xl font-medium text-stone-900">Registered Accounts</h2>
                    </div>
                    <a href="user_create.php" class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl bg-[#1A1613] hover:bg-[#7C4E26] text-[#F7F3EC] text-xs font-medium transition-colors shadow-xs">
                        <i class="ri-user-add-line text-base"></i>
                        <span>Add New User</span>
                    </a>
                </div>

                <!-- Table Card -->
                <div class="bg-[#FCFAF7] rounded-3xl border border-[#E2D8C9] overflow-hidden shadow-xs">
                    <div class="p-5 border-b border-[#E2D8C9] flex flex-col sm:flex-row sm:items-center justify-between gap-3">
                        <div class="text-xs text-stone-500">
                            Showing registered accounts
                        </div>
                        <div class="relative sm:w-64">
                            <i class="ri-search-line absolute left-3 top-1/2 -translate-y-1/2 text-stone-400 text-xs"></i>
                            <input type="text" placeholder="Search users by name or email..." class="w-full pl-8 pr-3 py-1.5 bg-[#F5EFE6] border border-[#E2D8C9] rounded-lg text-xs placeholder-stone-400 focus:outline-none focus:ring-1 focus:ring-[#7C4E26]">
                        </div>
                    </div>

                    <!-- [PHP_BACKEND_HOOK: Dynamic users table loop: SELECT * FROM users ORDER BY id DESC. Use foreach($users as $user) to render: $user['id'], $user['username'], $user['email']] -->
                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse text-xs">
                            <thead>
                                <tr class="bg-[#F5EFE6] border-b border-[#E2D8C9] text-stone-500 uppercase tracking-wider font-semibold">
                                    <th class="py-3.5 px-6">ID</th>
                                    <th class="py-3.5 px-6">User Profile</th>
                                    <th class="py-3.5 px-6">Email Address</th>
                                    <th class="py-3.5 px-6">Account Status</th>
                                    <th class="py-3.5 px-6 text-right">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-[#E2D8C9] text-stone-700 font-medium">
                                <tr class="hover:bg-[#F5EFE6]/60 transition-colors">
                                    <td class="py-4 px-6 text-stone-400">#1</td>
                                    <td class="py-4 px-6">
                                        <div class="flex items-center gap-3">
                                            <span class="w-9 h-9 rounded-full bg-stone-900 text-white flex items-center justify-center font-serif text-xs font-semibold">
                                                AD
                                            </span>
                                            <div>
                                                <span class="font-semibold text-stone-900 block text-sm">admin</span>
                                                <span class="text-[10px] text-[#7C4E26] font-medium uppercase tracking-wider">Super Administrator</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="py-4 px-6 text-stone-600 font-mono text-xs">admin@gmail.com</td>
                                    <td class="py-4 px-6">
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[11px] font-medium bg-emerald-50 text-emerald-700 border border-emerald-200">
                                            Verified Active
                                        </span>
                                    </td>
                                    <td class="py-4 px-6 text-right">
                                        <div class="inline-flex items-center gap-2">
                                            <a href="user_update.php?id=1" class="px-2.5 py-1 rounded-lg border border-[#E2D8C9] hover:bg-[#EFE8DD] text-stone-700 transition-colors flex items-center gap-1">
                                                <i class="ri-pencil-line"></i> Edit
                                            </a>
                                            <a href="user_delete.php?id=1" class="px-2.5 py-1 rounded-lg border border-rose-200 hover:bg-rose-50 text-rose-600 transition-colors flex items-center gap-1">
                                                <i class="ri-delete-bin-line"></i> Delete
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

            </main>

            <?php include "components/footer.php"; ?>
        </div>
    </div>

    <?php include "components/js.php"; ?>
</body>

</html>
