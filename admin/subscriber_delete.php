<?php

/**
 * ============================================================================
 * YANGON ATELIER BACKEND INSTRUCTION GUIDELINE - DELETE SUBSCRIBER
 * ============================================================================
 * FILE: admin/subscriber_delete.php
 * PURPOSE: Confirms deletion of a subscriber and removes email from 'subscribers'.
 * ============================================================================
 */

// Initialize session
require_once __DIR__ . '/../components/session_start.php';

// Check session
require_once __DIR__ . '/components/session_check.php';

// Connect database
require_once __DIR__ . '/../components/connection.php';

$sub_id = isset($_GET['id']) ? (int)$_GET['id'] : 1;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Subscriber | Yangon Atelier Admin</title>
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
                            <a href="subscribers.php" class="hover:text-[#362F2A] transition-colors">Subscribers</a>
                            <span>/</span>
                            <span class="text-[#8C3B3B] font-medium">Delete</span>
                        </div>
                        <h2 class="font-serif text-2xl sm:text-3xl font-medium text-[#362F2A]">Confirm Subscriber Removal</h2>
                    </div>
                    <a href="subscribers.php" class="px-4 py-2 rounded-xl border border-[#C9C0B3] bg-[#DFD8CD] hover:bg-[#D5CDC1] text-xs font-semibold text-[#362F2A] transition-colors">
                        Cancel
                    </a>
                </div>

                <!-- Confirmation Card in Raw Linen (#F6F3EE) -->
                <div class="bg-[#F6F3EE] rounded-3xl border border-[#C9C0B3] p-6 sm:p-10 shadow-xs">
                    <div class="flex items-start gap-4 p-4 rounded-2xl bg-[#EFE0E0] border border-[#DFC8C8] mb-6">
                        <i class="ri-error-warning-line text-2xl text-[#8C3B3B] flex-shrink-0 mt-0.5"></i>
                        <div>
                            <h3 class="text-sm font-semibold text-[#8C3B3B]">Remove Newsletter Subscriber</h3>
                            <p class="text-xs text-[#8C3B3B]/90 mt-1 leading-relaxed">
                                Are you sure you wish to unsubscribe this email address? They will no longer receive journal digests or studio release announcements.
                            </p>
                        </div>
                    </div>

                    <!-- Subscriber Details Summary -->
                    <div class="border border-[#C9C0B3] bg-[#EDE8E0] rounded-2xl p-5 mb-8 space-y-2 text-xs">
                        <div class="flex items-center justify-between border-b border-[#C9C0B3] pb-2">
                            <span class="text-[#6E6359] font-mono">Subscriber #<?= (int)$sub_id ?></span>
                            <span class="text-[#6E6359]">Subscribed on 2026-11-01</span>
                        </div>
                        <h4 class="font-mono font-semibold text-[#362F2A] text-sm">aungmin@gmail.com</h4>
                    </div>

                    <!-- Deletion Form -->
                    <form method="POST" action="subscribers.php?msg=deleted" class="flex items-center justify-end gap-3 pt-4 border-t border-[#C9C0B3]">
                        <input type="hidden" name="id" value="<?= (int)$sub_id ?>">
                        <a href="subscribers.php" class="px-5 py-2.5 rounded-xl border border-[#C9C0B3] bg-[#DFD8CD] hover:bg-[#D5CDC1] text-xs font-semibold text-[#362F2A] transition-colors">
                            Cancel
                        </a>
                        <button type="submit" name="delete" class="px-5 py-2.5 rounded-xl bg-[#8C3B3B] hover:bg-[#782F2F] text-[#F6F3EE] text-xs font-semibold transition-colors shadow-xs flex items-center gap-2">
                            <i class="ri-delete-bin-line text-sm"></i>
                            <span>Confirm &amp; Remove Subscriber</span>
                        </button>
                    </form>
                </div>

            </main>

            <?php include "components/footer.php"; ?>
        </div>
    </div>

    <script src="js/admin.js"></script>
</body>

</html>