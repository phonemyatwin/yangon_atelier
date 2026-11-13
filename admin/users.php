<?php
/**
 * ============================================================================
 * FURNISHME BACKEND INSTRUCTION GUIDELINE - ADMIN USERS LIST
 * ============================================================================
 * FILE: admin/users.php
 * PURPOSE: Lists all user accounts, displays account details, and links to
 *          account creation, update, and deletion flows.
 * ============================================================================
 */

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['admin_user'])) {
    header("Location: index.php");
    exit;
}

$success = '';
if (isset($_GET['msg'])) {
    if ($_GET['msg'] === 'created') $success = "User account created successfully.";
    if ($_GET['msg'] === 'updated') $success = "User account updated successfully.";
    if ($_GET['msg'] === 'deleted') $success = "User account deleted successfully.";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Accounts | FurnishMe Atelier Admin</title>
    <link rel="icon" type="image/x-icon" href="../images/favicon.ico">
    <?php include "components/css.php"; ?>
</head>

<body class="bg-[#EDE8E0] text-[#362F2A] font-sans antialiased selection:bg-[#8A5A44] selection:text-[#F6F3EE]">
    <div class="min-h-screen flex">
        <?php include "components/sidebar.php"; ?>

        <div class="lg:pl-64 flex flex-col flex-1 min-w-0">
            <?php include "components/topbar.php"; ?>

            <main class="flex-1 p-4 sm:p-6 lg:p-8 max-w-7xl w-full mx-auto space-y-6">
                
                <!-- Page Action Header -->
                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                    <div>
                        <div class="flex items-center gap-2 text-xs text-[#6E6359] mb-1">
                            <a href="dashboard.php" class="hover:text-[#362F2A] transition-colors">Dashboard</a>
                            <span>/</span>
                            <span class="text-[#362F2A] font-medium">Users</span>
                        </div>
                        <h2 class="font-serif text-2xl sm:text-3xl font-medium text-[#362F2A]">Registered Accounts</h2>
                    </div>
                    <a href="user_create.php" class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl bg-[#8A5A44] hover:bg-[#704735] text-[#F6F3EE] font-semibold text-xs transition-colors shadow-xs">
                        <i class="ri-user-add-line text-base"></i>
                        <span>Add New User</span>
                    </a>
                </div>

                <!-- Success Notification Banner -->
                <?php if (!empty($success)): ?>
                    <div class="p-4 rounded-2xl bg-[#DCE5DF] border border-[#C6D6CB] text-[#3F624D] text-xs flex items-center gap-2.5">
                        <i class="ri-checkbox-circle-line text-lg flex-shrink-0"></i>
                        <span><?= htmlspecialchars($success) ?></span>
                    </div>
                <?php endif; ?>

                <!-- Table Card in Raw Linen (#F6F3EE) -->
                <div class="bg-[#F6F3EE] rounded-3xl border border-[#C9C0B3] overflow-hidden shadow-xs">
                    <div class="p-5 border-b border-[#C9C0B3] flex flex-col sm:flex-row sm:items-center justify-between gap-3">
                        <div class="text-xs text-[#6E6359]">
                            Showing <strong>1</strong> registered account
                        </div>
                        <div class="relative sm:w-64">
                            <i class="ri-search-line absolute left-3 top-1/2 -translate-y-1/2 text-[#6E6359] text-xs"></i>
                            <input type="text" placeholder="Search users by name or email..." class="w-full pl-8 pr-3 py-1.5 bg-[#EDE8E0] border border-[#C9C0B3] rounded-lg text-xs text-[#362F2A] placeholder-[#6E6359] focus:outline-none focus:ring-1 focus:ring-[#8A5A44]">
                        </div>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse text-xs">
                            <thead>
                                <tr class="bg-[#DFD8CD] border-b border-[#C9C0B3] text-[#362F2A] uppercase tracking-wider font-semibold">
                                    <th class="py-3.5 px-6">ID</th>
                                    <th class="py-3.5 px-6">User Profile</th>
                                    <th class="py-3.5 px-6">Email Address</th>
                                    <th class="py-3.5 px-6">Account Status</th>
                                    <th class="py-3.5 px-6 text-right">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-[#C9C0B3] text-[#6E6359] font-medium">
                                <tr class="hover:bg-[#DFD8CD]/40 transition-colors">
                                    <td class="py-4 px-6 text-[#6E6359]">#1</td>
                                    <td class="py-4 px-6">
                                        <div class="flex items-center gap-3">
                                            <span class="w-9 h-9 rounded-full bg-[#DFD8CD] text-[#8A5A44] flex items-center justify-center font-serif text-xs font-semibold">
                                                AD
                                            </span>
                                            <div>
                                                <span class="font-semibold text-[#362F2A] block text-sm">admin</span>
                                                <span class="text-[10px] text-[#8A5A44] font-semibold uppercase tracking-wider">Super Administrator</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="py-4 px-6 text-[#6E6359] font-mono text-xs">admin@gmail.com</td>
                                    <td class="py-4 px-6">
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[11px] font-semibold text-[#3F624D] bg-[#DCE5DF] border border-[#C6D6CB]">
                                            Verified Active
                                        </span>
                                    </td>
                                    <td class="py-4 px-6 text-right">
                                        <div class="inline-flex items-center gap-2">
                                            <a href="user_update.php?id=1" class="px-2.5 py-1 rounded-lg border border-[#C9C0B3] bg-[#DFD8CD] hover:bg-[#D5CDC1] text-[#8A5A44] font-semibold transition-colors flex items-center gap-1">
                                                <i class="ri-pencil-line"></i> Edit
                                            </a>
                                            <a href="user_delete.php?id=1" class="px-2.5 py-1 rounded-lg border border-[#DFC8C8] bg-[#EFE0E0] hover:bg-[#E5D0D0] text-[#8C3B3B] font-semibold transition-colors flex items-center gap-1">
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
