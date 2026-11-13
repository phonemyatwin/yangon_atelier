<?php

/**
 * ============================================================================
 * YANGON ATELIER BACKEND INSTRUCTION GUIDELINE - ADMIN CONTACT INQUIRIES LIST
 * ============================================================================
 * FILE: admin/contacts.php
 * PURPOSE: Lists client showroom inquiries from 'contacts' table and provides
 *          links to view full message detail and delete.
 * ============================================================================
 */

// Initialize session
require_once __DIR__ . '/../components/session_start.php';

// Check session
require_once __DIR__ . '/components/session_check.php';

// Connect database
require_once __DIR__ . '/../components/connection.php';

if (!isset($_SESSION['admin_user'])) {
    header("Location: index.php");
    exit;
}

$success = '';
if (isset($_GET['msg']) && $_GET['msg'] === 'deleted') {
    $success = "Inquiry message deleted successfully.";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inquiries &amp; Messages | Yangon Atelier Admin</title>
    <link rel="icon" type="image/x-icon" href="../images/favicon/favicon.ico">
    <?php include "components/css.php"; ?>
</head>

<body class="bg-[#EDE8E0] text-[#362F2A] font-sans antialiased selection:bg-[#8A5A44] selection:text-[#F6F3EE]">
    <div class="min-h-screen flex">
        <?php include "components/sidebar.php"; ?>

        <div class="lg:pl-64 flex flex-col flex-1 min-w-0">
            <?php include "components/topbar.php"; ?>

            <main class="flex-1 p-4 sm:p-6 lg:p-8 max-w-7xl w-full mx-auto space-y-6">

                <!-- Page Header -->
                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                    <div>
                        <div class="flex items-center gap-2 text-xs text-[#6E6359] mb-1">
                            <a href="dashboard.php" class="hover:text-[#362F2A] transition-colors">Dashboard</a>
                            <span>/</span>
                            <span class="text-[#362F2A] font-medium">Inquiries</span>
                        </div>
                        <h2 class="font-serif text-2xl sm:text-3xl font-medium text-[#362F2A]">Showroom Inquiries &amp; Messages</h2>
                    </div>
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
                            Showing customer inquiries &amp; consultation requests (Total: <strong>3</strong>)
                        </div>
                        <div class="relative sm:w-64">
                            <i class="ri-search-line absolute left-3 top-1/2 -translate-y-1/2 text-[#6E6359] text-xs"></i>
                            <input type="text" placeholder="Filter messages..." class="w-full pl-8 pr-3 py-1.5 bg-[#EDE8E0] border border-[#C9C0B3] rounded-lg text-xs text-[#362F2A] placeholder-[#6E6359] focus:outline-none focus:ring-1 focus:ring-[#8A5A44]">
                        </div>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse text-xs">
                            <thead>
                                <tr class="bg-[#DFD8CD] border-b border-[#C9C0B3] text-[#362F2A] uppercase tracking-wider font-semibold">
                                    <th class="py-3.5 px-6">ID</th>
                                    <th class="py-3.5 px-6">Client Name</th>
                                    <th class="py-3.5 px-6">Email Address</th>
                                    <th class="py-3.5 px-6">Phone Number</th>
                                    <th class="py-3.5 px-6">Status</th>
                                    <th class="py-3.5 px-6 text-right">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-[#C9C0B3] text-[#6E6359] font-medium">

                                <!-- Contact 1 -->
                                <tr class="hover:bg-[#DFD8CD]/40 transition-colors">
                                    <td class="py-4 px-6 text-[#6E6359]">#1</td>
                                    <td class="py-4 px-6 font-semibold text-[#362F2A] text-sm">Aung Min</td>
                                    <td class="py-4 px-6 text-[#6E6359] font-mono text-xs">aungmin@gmail.com</td>
                                    <td class="py-4 px-6 text-[#6E6359]">09973383719</td>
                                    <td class="py-4 px-6">
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[10px] font-semibold text-[#8C5327] bg-[#EFE2D5] border border-[#E0CFBF]">
                                            New Message
                                        </span>
                                    </td>
                                    <td class="py-4 px-6 text-right">
                                        <div class="inline-flex items-center gap-2">
                                            <a href="contact_view.php?id=1" class="px-2.5 py-1 rounded-lg border border-[#C9C0B3] bg-[#DFD8CD] hover:bg-[#D5CDC1] text-[#362F2A] font-semibold transition-colors flex items-center gap-1">
                                                <i class="ri-eye-line"></i> View
                                            </a>
                                            <a href="contact_delete.php?id=1" class="px-2.5 py-1 rounded-lg border border-[#DFC8C8] bg-[#EFE0E0] hover:bg-[#E5D0D0] text-[#8C3B3B] font-semibold transition-colors flex items-center gap-1">
                                                <i class="ri-delete-bin-line"></i> Delete
                                            </a>
                                        </div>
                                    </td>
                                </tr>

                                <!-- Contact 2 -->
                                <tr class="hover:bg-[#DFD8CD]/40 transition-colors">
                                    <td class="py-4 px-6 text-[#6E6359]">#2</td>
                                    <td class="py-4 px-6 font-semibold text-[#362F2A] text-sm">Su Su</td>
                                    <td class="py-4 px-6 text-[#6E6359] font-mono text-xs">susu@gmail.com</td>
                                    <td class="py-4 px-6 text-[#6E6359]">09421122846</td>
                                    <td class="py-4 px-6">
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[10px] font-semibold text-[#3F624D] bg-[#DCE5DF] border border-[#C6D6CB]">
                                            Followed Up
                                        </span>
                                    </td>
                                    <td class="py-4 px-6 text-right">
                                        <div class="inline-flex items-center gap-2">
                                            <a href="contact_view.php?id=2" class="px-2.5 py-1 rounded-lg border border-[#C9C0B3] bg-[#DFD8CD] hover:bg-[#D5CDC1] text-[#362F2A] font-semibold transition-colors flex items-center gap-1">
                                                <i class="ri-eye-line"></i> View
                                            </a>
                                            <a href="contact_delete.php?id=2" class="px-2.5 py-1 rounded-lg border border-[#DFC8C8] bg-[#EFE0E0] hover:bg-[#E5D0D0] text-[#8C3B3B] font-semibold transition-colors flex items-center gap-1">
                                                <i class="ri-delete-bin-line"></i> Delete
                                            </a>
                                        </div>
                                    </td>
                                </tr>

                                <!-- Contact 3 -->
                                <tr class="hover:bg-[#DFD8CD]/40 transition-colors">
                                    <td class="py-4 px-6 text-[#6E6359]">#3</td>
                                    <td class="py-4 px-6 font-semibold text-[#362F2A] text-sm">Ko Ko</td>
                                    <td class="py-4 px-6 text-[#6E6359] font-mono text-xs">koko@gmail.com</td>
                                    <td class="py-4 px-6 text-[#6E6359]">09456123789</td>
                                    <td class="py-4 px-6">
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[10px] font-semibold text-[#6E6359] bg-[#DFD8CD] border border-[#C9C0B3]">
                                            Archived
                                        </span>
                                    </td>
                                    <td class="py-4 px-6 text-right">
                                        <div class="inline-flex items-center gap-2">
                                            <a href="contact_view.php?id=3" class="px-2.5 py-1 rounded-lg border border-[#C9C0B3] bg-[#DFD8CD] hover:bg-[#D5CDC1] text-[#362F2A] font-semibold transition-colors flex items-center gap-1">
                                                <i class="ri-eye-line"></i> View
                                            </a>
                                            <a href="contact_delete.php?id=3" class="px-2.5 py-1 rounded-lg border border-[#DFC8C8] bg-[#EFE0E0] hover:bg-[#E5D0D0] text-[#8C3B3B] font-semibold transition-colors flex items-center gap-1">
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