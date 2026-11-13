<?php

/**
 * ============================================================================
 * YANGON ATELIER BACKEND INSTRUCTION GUIDELINE - DELETE TEAM MEMBER
 * ============================================================================
 * FILE: admin/team_delete.php
 * PURPOSE: Confirms deletion of an artisan profile, removes photo from ../images/,
 *          and executes DELETE query against the 'team' table.
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
    <title>Delete Team Member | Yangon Atelier Admin</title>
    <link rel="icon" type="image/x-icon" href="../images/favicon.ico">
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
                            <a href="team.php" class="hover:text-[#362F2A] transition-colors">Team</a>
                            <span>/</span>
                            <span class="text-[#8C3B3B] font-medium">Delete</span>
                        </div>
                        <h2 class="font-serif text-2xl sm:text-3xl font-medium text-[#362F2A]">Confirm Member Removal</h2>
                    </div>
                    <a href="team.php" class="px-4 py-2 rounded-xl border border-[#C9C0B3] bg-[#DFD8CD] hover:bg-[#D5CDC1] text-xs font-semibold text-[#362F2A] transition-colors">
                        Cancel
                    </a>
                </div>

                <!-- Confirmation Card in Raw Linen (#F6F3EE) -->
                <div class="bg-[#F6F3EE] rounded-3xl border border-[#C9C0B3] p-6 sm:p-10 shadow-xs">
                    <div class="flex items-start gap-4 p-4 rounded-2xl bg-[#EFE0E0] border border-[#DFC8C8] mb-6">
                        <i class="ri-error-warning-line text-2xl text-[#8C3B3B] flex-shrink-0 mt-0.5"></i>
                        <div>
                            <h3 class="text-sm font-semibold text-[#8C3B3B]">Permanent Member Removal</h3>
                            <p class="text-xs text-[#8C3B3B]/90 mt-1 leading-relaxed">
                                Are you sure you wish to remove this artisan from the team list? This will remove their profile from the public About and Team sections.
                            </p>
                        </div>
                    </div>

                    <!-- Member Details Summary -->
                    <div class="border border-[#C9C0B3] bg-[#EDE8E0] rounded-2xl p-5 mb-8 flex items-center gap-5">
                        <div class="w-16 h-20 rounded-xl bg-[#F6F3EE] border border-[#C9C0B3] overflow-hidden flex-shrink-0">
                            <img src="../images/team-1.jpg" alt="Artisan portrait" class="w-full h-full object-cover">
                        </div>
                        <div class="space-y-1 text-xs">
                            <span class="text-[#6E6359] font-mono">Member #<?= htmlspecialchars($_GET['id'] ?? '1') ?></span>
                            <h4 class="font-serif text-base font-semibold text-[#362F2A]">Phone Myat Win</h4>
                            <p class="text-[#6E6359]">Role: <strong class="text-[#362F2A]">Principal Architect &amp; Founder</strong></p>
                        </div>
                    </div>

                    <!-- Deletion Form -->
                    <form action="" method="POST" class="flex items-center justify-end gap-3 pt-4 border-t border-[#C9C0B3]">
                        <input type="hidden" name="id" value="<?= htmlspecialchars($_GET['id'] ?? '1') ?>">
                        <a href="team.php" class="px-5 py-2.5 rounded-xl border border-[#C9C0B3] bg-[#DFD8CD] hover:bg-[#D5CDC1] text-xs font-semibold text-[#362F2A] transition-colors">
                            Cancel
                        </a>
                        <button type="submit" name="delete" class="px-5 py-2.5 rounded-xl bg-[#8C3B3B] hover:bg-[#782F2F] text-[#F6F3EE] text-xs font-semibold transition-colors shadow-xs flex items-center gap-2">
                            <i class="ri-delete-bin-line text-sm"></i>
                            <span>Confirm &amp; Delete Member</span>
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