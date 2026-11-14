<?php

/**
 * ============================================================================
 * YANGON ATELIER BACKEND INSTRUCTION GUIDELINE - ADMIN TEAM LIST
 * ============================================================================
 * FILE: admin/team.php
 * PURPOSE: Lists all collective artisans and team members from the 'team' table
 *          and provides links to add, edit, or remove profiles.
 * ============================================================================
 */

// Initialize session
require_once __DIR__ . '/../components/session_start.php';

// Check session
require_once __DIR__ . '/components/session_check.php';

// Connect database
require_once __DIR__ . '/../components/connection.php';

$success = '';
if (isset($_GET['msg'])) {
    if ($_GET['msg'] === 'created') $success = "Team member profile added successfully.";
    if ($_GET['msg'] === 'updated') $success = "Team member profile updated successfully.";
    if ($_GET['msg'] === 'deleted') $success = "Team member profile deleted successfully.";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Design Team | Yangon Atelier Admin</title>
    <link rel="icon" type="image/x-icon" href="../images/favicon/favicon.ico">
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
                            <span class="text-[#362F2A] font-medium">Design Team</span>
                        </div>
                        <h2 class="font-serif text-2xl sm:text-3xl font-medium text-[#362F2A]">Design Team &amp; Artisans</h2>
                    </div>
                    <a href="team_create.php" class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl bg-[#8A5A44] hover:bg-[#704735] text-[#F6F3EE] font-semibold text-xs transition-colors shadow-xs">
                        <i class="ri-user-add-line text-base"></i>
                        <span>Add Member</span>
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
                            Showing <strong>6</strong> active collective artisans &amp; curators
                        </div>
                        <div class="relative sm:w-64">
                            <i class="ri-search-line absolute left-3 top-1/2 -translate-y-1/2 text-[#6E6359] text-xs"></i>
                            <input type="text" placeholder="Search team..." class="w-full pl-8 pr-3 py-1.5 bg-[#EDE8E0] border border-[#C9C0B3] rounded-lg text-xs text-[#362F2A] placeholder-[#6E6359] focus:outline-none focus:ring-1 focus:ring-[#8A5A44]">
                        </div>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse text-xs">
                            <thead>
                                <tr class="bg-[#DFD8CD] border-b border-[#C9C0B3] text-[#362F2A] uppercase tracking-wider font-semibold">
                                    <th class="py-3.5 px-6">ID</th>
                                    <th class="py-3.5 px-6">Portrait</th>
                                    <th class="py-3.5 px-6">Artisan Name</th>
                                    <th class="py-3.5 px-6">Atelier Role</th>
                                    <th class="py-3.5 px-6 text-right">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-[#C9C0B3] text-[#6E6359] font-medium">

                                <!-- Member 1 -->
                                <tr class="hover:bg-[#DFD8CD]/40 transition-colors">
                                    <td class="py-4 px-6 text-[#6E6359]">#1</td>
                                    <td class="py-4 px-6">
                                        <div class="w-10 h-10 rounded-full bg-[#EDE8E0] border border-[#C9C0B3] overflow-hidden">
                                            <img src="../images/team/phonemyatwin.jpg" alt="Phone Myat Win" class="w-full h-full object-cover">
                                        </div>
                                    </td>
                                    <td class="py-4 px-6 font-semibold text-[#362F2A] text-sm">Phone Myat Win</td>
                                    <td class="py-4 px-6 text-[#6E6359]">Principal Architect &amp; Founder</td>
                                    <td class="py-4 px-6 text-right">
                                        <div class="inline-flex items-center gap-2">
                                            <a href="team_update.php?id=1" class="px-2.5 py-1 rounded-lg border border-[#C9C0B3] bg-[#DFD8CD] hover:bg-[#D5CDC1] text-[#8A5A44] font-semibold transition-colors flex items-center gap-1">
                                                <i class="ri-pencil-line"></i> Edit
                                            </a>
                                            <a href="team_delete.php?id=1" class="px-2.5 py-1 rounded-lg border border-[#DFC8C8] bg-[#EFE0E0] hover:bg-[#E5D0D0] text-[#8C3B3B] font-semibold transition-colors flex items-center gap-1">
                                                <i class="ri-delete-bin-line"></i> Delete
                                            </a>
                                        </div>
                                    </td>
                                </tr>

                                <!-- Member 2 -->
                                <tr class="hover:bg-[#DFD8CD]/40 transition-colors">
                                    <td class="py-4 px-6 text-[#6E6359]">#2</td>
                                    <td class="py-4 px-6">
                                        <div class="w-10 h-10 rounded-full bg-[#EDE8E0] border border-[#C9C0B3] overflow-hidden">
                                            <img src="../images/team/thaenaynwesoe.jpg" alt="Thae Nay Nwe Soe" class="w-full h-full object-cover">
                                        </div>
                                    </td>
                                    <td class="py-4 px-6 font-semibold text-[#362F2A] text-sm">Thae Nay Nwe Soe</td>
                                    <td class="py-4 px-6 text-[#6E6359]">Head of Interior Ergonomics</td>
                                    <td class="py-4 px-6 text-right">
                                        <div class="inline-flex items-center gap-2">
                                            <a href="team_update.php?id=2" class="px-2.5 py-1 rounded-lg border border-[#C9C0B3] bg-[#DFD8CD] hover:bg-[#D5CDC1] text-[#8A5A44] font-semibold transition-colors flex items-center gap-1">
                                                <i class="ri-pencil-line"></i> Edit
                                            </a>
                                            <a href="team_delete.php?id=2" class="px-2.5 py-1 rounded-lg border border-[#DFC8C8] bg-[#EFE0E0] hover:bg-[#E5D0D0] text-[#8C3B3B] font-semibold transition-colors flex items-center gap-1">
                                                <i class="ri-delete-bin-line"></i> Delete
                                            </a>
                                        </div>
                                    </td>
                                </tr>

                                <!-- Member 3 -->
                                <tr class="hover:bg-[#DFD8CD]/40 transition-colors">
                                    <td class="py-4 px-6 text-[#6E6359]">#3</td>
                                    <td class="py-4 px-6">
                                        <div class="w-10 h-10 rounded-full bg-[#EDE8E0] border border-[#C9C0B3] overflow-hidden">
                                            <img src="../images/team/suthinzarhtet.jpg" alt="Su Thinzar Htet" class="w-full h-full object-cover">
                                        </div>
                                    </td>
                                    <td class="py-4 px-6 font-semibold text-[#362F2A] text-sm">Su Thinzar Htet</td>
                                    <td class="py-4 px-6 text-[#6E6359]">Master Wood Craftsman</td>
                                    <td class="py-4 px-6 text-right">
                                        <div class="inline-flex items-center gap-2">
                                            <a href="team_update.php?id=3" class="px-2.5 py-1 rounded-lg border border-[#C9C0B3] bg-[#DFD8CD] hover:bg-[#D5CDC1] text-[#8A5A44] font-semibold transition-colors flex items-center gap-1">
                                                <i class="ri-pencil-line"></i> Edit
                                            </a>
                                            <a href="team_delete.php?id=3" class="px-2.5 py-1 rounded-lg border border-[#DFC8C8] bg-[#EFE0E0] hover:bg-[#E5D0D0] text-[#8C3B3B] font-semibold transition-colors flex items-center gap-1">
                                                <i class="ri-delete-bin-line"></i> Delete
                                            </a>
                                        </div>
                                    </td>
                                </tr>

                                <!-- Member 4 -->
                                <tr class="hover:bg-[#DFD8CD]/40 transition-colors">
                                    <td class="py-4 px-6 text-[#6E6359]">#4</td>
                                    <td class="py-4 px-6">
                                        <div class="w-10 h-10 rounded-full bg-[#EDE8E0] border border-[#C9C0B3] overflow-hidden">
                                            <img src="../images/team/myatchaloo.jpg" alt="Myat Chal Oo" class="w-full h-full object-cover">
                                        </div>
                                    </td>
                                    <td class="py-4 px-6 font-semibold text-[#362F2A] text-sm">Myat Chal Oo</td>
                                    <td class="py-4 px-6 text-[#6E6359]">Material &amp; Textile Curator</td>
                                    <td class="py-4 px-6 text-right">
                                        <div class="inline-flex items-center gap-2">
                                            <a href="team_update.php?id=4" class="px-2.5 py-1 rounded-lg border border-[#C9C0B3] bg-[#DFD8CD] hover:bg-[#D5CDC1] text-[#8A5A44] font-semibold transition-colors flex items-center gap-1">
                                                <i class="ri-pencil-line"></i> Edit
                                            </a>
                                            <a href="team_delete.php?id=4" class="px-2.5 py-1 rounded-lg border border-[#DFC8C8] bg-[#EFE0E0] hover:bg-[#E5D0D0] text-[#8C3B3B] font-semibold transition-colors flex items-center gap-1">
                                                <i class="ri-delete-bin-line"></i> Delete
                                            </a>
                                        </div>
                                    </td>
                                </tr>

                                <!-- Member 5 -->
                                <tr class="hover:bg-[#DFD8CD]/40 transition-colors">
                                    <td class="py-4 px-6 text-[#6E6359]">#5</td>
                                    <td class="py-4 px-6">
                                        <div class="w-10 h-10 rounded-full bg-[#EDE8E0] border border-[#C9C0B3] overflow-hidden">
                                            <img src="../images/team/nyinyiaung.jpg" alt="Nyi Nyi Aung" class="w-full h-full object-cover">
                                        </div>
                                    </td>
                                    <td class="py-4 px-6 font-semibold text-[#362F2A] text-sm">Nyi Nyi Aung</td>
                                    <td class="py-4 px-6 text-[#6E6359]">Finishing Specialist</td>
                                    <td class="py-4 px-6 text-right">
                                        <div class="inline-flex items-center gap-2">
                                            <a href="team_update.php?id=5" class="px-2.5 py-1 rounded-lg border border-[#C9C0B3] bg-[#DFD8CD] hover:bg-[#D5CDC1] text-[#8A5A44] font-semibold transition-colors flex items-center gap-1">
                                                <i class="ri-pencil-line"></i> Edit
                                            </a>
                                            <a href="team_delete.php?id=5" class="px-2.5 py-1 rounded-lg border border-[#DFC8C8] bg-[#EFE0E0] hover:bg-[#E5D0D0] text-[#8C3B3B] font-semibold transition-colors flex items-center gap-1">
                                                <i class="ri-delete-bin-line"></i> Delete
                                            </a>
                                        </div>
                                    </td>
                                </tr>

                                <!-- Member 6 -->
                                <tr class="hover:bg-[#DFD8CD]/40 transition-colors">
                                    <td class="py-4 px-6 text-[#6E6359]">#6</td>
                                    <td class="py-4 px-6">
                                        <div class="w-10 h-10 rounded-full bg-[#EDE8E0] border border-[#C9C0B3] overflow-hidden">
                                            <img src="../images/team/minkhantnaung.jpg" alt="Min Khant Naung" class="w-full h-full object-cover">
                                        </div>
                                    </td>
                                    <td class="py-4 px-6 font-semibold text-[#362F2A] text-sm">Min Khant Naung</td>
                                    <td class="py-4 px-6 text-[#6E6359]">Showroom Concierge Director</td>
                                    <td class="py-4 px-6 text-right">
                                        <div class="inline-flex items-center gap-2">
                                            <a href="team_update.php?id=6" class="px-2.5 py-1 rounded-lg border border-[#C9C0B3] bg-[#DFD8CD] hover:bg-[#D5CDC1] text-[#8A5A44] font-semibold transition-colors flex items-center gap-1">
                                                <i class="ri-pencil-line"></i> Edit
                                            </a>
                                            <a href="team_delete.php?id=6" class="px-2.5 py-1 rounded-lg border border-[#DFC8C8] bg-[#EFE0E0] hover:bg-[#E5D0D0] text-[#8C3B3B] font-semibold transition-colors flex items-center gap-1">
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

    <script src="js/admin.js"></script>
</body>

</html>