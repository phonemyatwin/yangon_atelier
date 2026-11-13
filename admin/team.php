<?php
/**
 * ============================================================================
 * FURNISHME BACKEND INSTRUCTION GUIDELINE - ADMIN TEAM LIST
 * ============================================================================
 * FILE: admin/team.php
 * PURPOSE: Lists all design collective members and master artisans from the
 *          'team' table, with links to add, edit, or delete staff profiles.
 * 
 * STEP-BY-STEP IMPLEMENTATION GUIDE:
 * 1. Initialize Session & Enforce Authentication Guard:
 *    if (session_status() === PHP_SESSION_NONE) { session_start(); }
 *    if (!isset($_SESSION['admin_user'])) {
 *        header("Location: index.php");
 *        exit;
 *    }
 * 
 * 2. Include Database Connection:
 *    require_once "../components/connection.php";
 * 
 * 3. Handle Flash Notifications:
 *    $msg = $_GET['msg'] ?? '';
 *    if ($msg === 'created') $success = "Team member profile created successfully.";
 *    if ($msg === 'updated') $success = "Team member profile updated successfully.";
 *    if ($msg === 'deleted') $success = "Team member profile removed successfully.";
 * 
 * 4. Query Team Members:
 *    $res = $connection->query("SELECT id, name, position, image FROM team ORDER BY id ASC");
 *    $team = $res ? $res->fetch_all(MYSQLI_ASSOC) : [];
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
    if ($_GET['msg'] === 'created') $success = "Team member added successfully.";
    if ($_GET['msg'] === 'updated') $success = "Team member updated successfully.";
    if ($_GET['msg'] === 'deleted') $success = "Team member deleted successfully.";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Design Collective | FurnishMe Atelier Admin</title>
    <link rel="icon" type="image/x-icon" href="../images/favicon.ico">
    <?php include "components/css.php"; ?>
</head>

<body class="bg-[#0D0B09] text-[#EDE4D7] font-sans antialiased selection:bg-[#C5A059] selection:text-[#0D0B09]">
    <div class="min-h-screen flex">
        <?php include "components/sidebar.php"; ?>

        <div class="lg:pl-64 flex flex-col flex-1 min-w-0">
            <?php include "components/topbar.php"; ?>

            <main class="flex-1 p-4 sm:p-6 lg:p-8 max-w-7xl w-full mx-auto space-y-6">
                
                <!-- Page Action Header -->
                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                    <div>
                        <div class="flex items-center gap-2 text-xs text-[#8C7D6B] mb-1">
                            <a href="dashboard.php" class="hover:text-[#FAF6EE]">Dashboard</a>
                            <span>/</span>
                            <span class="text-[#FAF6EE] font-medium">Design Team</span>
                        </div>
                        <h2 class="font-serif text-2xl sm:text-3xl font-medium text-[#FAF6EE]">Design Team &amp; Artisans</h2>
                    </div>
                    <a href="team_create.php" class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl bg-[#C5A059] hover:bg-[#D4AF37] text-[#0D0B09] font-semibold text-xs font-medium transition-colors shadow-xs">
                        <i class="ri-user-add-line text-base"></i>
                        <span>Add Member</span>
                    </a>
                </div>

                <!-- ==============================================================
                     PHP BACKEND GUIDELINE: Success Notification Banner
                     ============================================================== -->
                <?php if (!empty($success)): ?>
                    <div class="p-4 rounded-2xl bg-emerald-950/60 border border-emerald-800 text-emerald-300 text-xs flex items-center gap-2.5">
                        <i class="ri-checkbox-circle-line text-lg flex-shrink-0"></i>
                        <span><?= htmlspecialchars($success) ?></span>
                    </div>
                <?php endif; ?>

                <!-- Table Card -->
                <div class="bg-[#161310] rounded-3xl border border-[#2A231C] overflow-hidden shadow-xs">
                    <div class="p-5 border-b border-[#2A231C] flex flex-col sm:flex-row sm:items-center justify-between gap-3">
                        <div class="text-xs text-[#8C7D6B]">
                            Showing <strong><?= count($team ?? []) ?></strong> active collective artisans &amp; curators
                        </div>
                        <div class="relative sm:w-64">
                            <i class="ri-search-line absolute left-3 top-1/2 -translate-y-1/2 text-stone-400 text-xs"></i>
                            <input type="text" placeholder="Search team..." class="w-full pl-8 pr-3 py-1.5 bg-[#0D0B09] border border-[#2A231C] rounded-lg text-xs placeholder-[#8C7D6B] focus:outline-none focus:ring-1 focus:ring-[#C5A059]">
                        </div>
                    </div>

                    <!-- ==========================================================
                         PHP BACKEND GUIDELINE: Dynamic Team Members Loop
                         Query: SELECT * FROM team ORDER BY id ASC
                         Loop through $team and output table rows:
                         <?php /*
                         if (!empty($team)) {
                             foreach ($team as $member) {
                                 ?>
                                 <tr class="hover:bg-[#161310] transition-colors">
                                     <td class="py-4 px-6 text-stone-400">#<?= $member['id'] ?></td>
                                     <td class="py-4 px-6">
                                         <div class="w-10 h-10 rounded-full bg-[#0D0B09] border border-[#2A231C] overflow-hidden">
                                             <img src="../images/<?= htmlspecialchars($member['image']) ?>" alt="<?= htmlspecialchars($member['name']) ?>" class="w-full h-full object-cover">
                                         </div>
                                     </td>
                                     <td class="py-4 px-6 font-semibold text-[#FAF6EE] text-sm"><?= htmlspecialchars($member['name']) ?></td>
                                     <td class="py-4 px-6 text-[#8C7D6B]"><?= htmlspecialchars($member['position']) ?></td>
                                     <td class="py-4 px-6 text-right">
                                         <div class="inline-flex items-center gap-2">
                                             <a href="team_update.php?id=<?= $member['id'] ?>" class="px-2.5 py-1 rounded-lg border border-[#2A231C] hover:bg-[#0D0B09] text-[#D6C8B4] transition-colors flex items-center gap-1">
                                                 <i class="ri-pencil-line"></i> Edit
                                             </a>
                                             <a href="team_delete.php?id=<?= $member['id'] ?>" class="px-2.5 py-1 rounded-lg border border-rose-200 hover:bg-rose-50 text-rose-600 transition-colors flex items-center gap-1">
                                                 <i class="ri-delete-bin-line"></i> Delete
                                             </a>
                                         </div>
                                     </td>
                                 </tr>
                                 <?php
                             }
                         } else {
                             echo '<tr><td colspan="5" class="py-8 text-center text-stone-400">No team members added yet.</td></tr>';
                         }
                         */ ?>
                         ========================================================== -->
                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse text-xs">
                            <thead>
                                <tr class="bg-[#0D0B09] border-b border-[#2A231C] text-[#8C7D6B] uppercase tracking-wider font-semibold">
                                    <th class="py-3.5 px-6">ID</th>
                                    <th class="py-3.5 px-6">Portrait</th>
                                    <th class="py-3.5 px-6">Artisan Name</th>
                                    <th class="py-3.5 px-6">Atelier Role</th>
                                    <th class="py-3.5 px-6 text-right">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-[#E2D8C9] text-[#D6C8B4] font-medium">
                                
                                <!-- Member 1 -->
                                <tr class="hover:bg-[#161310] transition-colors">
                                    <td class="py-4 px-6 text-stone-400">#1</td>
                                    <td class="py-4 px-6">
                                        <div class="w-10 h-10 rounded-full bg-[#0D0B09] border border-[#2A231C] overflow-hidden">
                                            <img src="../images/team-1.jpg" alt="Phone Myat Win" class="w-full h-full object-cover">
                                        </div>
                                    </td>
                                    <td class="py-4 px-6 font-semibold text-[#FAF6EE] text-sm">Phone Myat Win</td>
                                    <td class="py-4 px-6 text-[#8C7D6B]">Principal Architect &amp; Founder</td>
                                    <td class="py-4 px-6 text-right">
                                        <div class="inline-flex items-center gap-2">
                                            <a href="team_update.php?id=1" class="px-2.5 py-1 rounded-lg border border-[#2A231C] hover:bg-[#0D0B09] text-[#D6C8B4] transition-colors flex items-center gap-1">
                                                <i class="ri-pencil-line"></i> Edit
                                            </a>
                                            <a href="team_delete.php?id=1" class="px-2.5 py-1 rounded-lg border border-rose-200 hover:bg-rose-50 text-rose-600 transition-colors flex items-center gap-1">
                                                <i class="ri-delete-bin-line"></i> Delete
                                            </a>
                                        </div>
                                    </td>
                                </tr>

                                <!-- Member 2 -->
                                <tr class="hover:bg-[#161310] transition-colors">
                                    <td class="py-4 px-6 text-stone-400">#2</td>
                                    <td class="py-4 px-6">
                                        <div class="w-10 h-10 rounded-full bg-[#0D0B09] border border-[#2A231C] overflow-hidden">
                                            <img src="../images/team-2.jpg" alt="Thae Nay Nwe Soe" class="w-full h-full object-cover">
                                        </div>
                                    </td>
                                    <td class="py-4 px-6 font-semibold text-[#FAF6EE] text-sm">Thae Nay Nwe Soe</td>
                                    <td class="py-4 px-6 text-[#8C7D6B]">Head of Interior Ergonomics</td>
                                    <td class="py-4 px-6 text-right">
                                        <div class="inline-flex items-center gap-2">
                                            <a href="team_update.php?id=2" class="px-2.5 py-1 rounded-lg border border-[#2A231C] hover:bg-[#0D0B09] text-[#D6C8B4] transition-colors flex items-center gap-1">
                                                <i class="ri-pencil-line"></i> Edit
                                            </a>
                                            <a href="team_delete.php?id=2" class="px-2.5 py-1 rounded-lg border border-rose-200 hover:bg-rose-50 text-rose-600 transition-colors flex items-center gap-1">
                                                <i class="ri-delete-bin-line"></i> Delete
                                            </a>
                                        </div>
                                    </td>
                                </tr>

                                <!-- Member 3 -->
                                <tr class="hover:bg-[#161310] transition-colors">
                                    <td class="py-4 px-6 text-stone-400">#3</td>
                                    <td class="py-4 px-6">
                                        <div class="w-10 h-10 rounded-full bg-[#0D0B09] border border-[#2A231C] overflow-hidden">
                                            <img src="../images/team-3.jpg" alt="Su Thinzar Htet" class="w-full h-full object-cover">
                                        </div>
                                    </td>
                                    <td class="py-4 px-6 font-semibold text-[#FAF6EE] text-sm">Su Thinzar Htet</td>
                                    <td class="py-4 px-6 text-[#8C7D6B]">Master Wood Craftsman</td>
                                    <td class="py-4 px-6 text-right">
                                        <div class="inline-flex items-center gap-2">
                                            <a href="team_update.php?id=3" class="px-2.5 py-1 rounded-lg border border-[#2A231C] hover:bg-[#0D0B09] text-[#D6C8B4] transition-colors flex items-center gap-1">
                                                <i class="ri-pencil-line"></i> Edit
                                            </a>
                                            <a href="team_delete.php?id=3" class="px-2.5 py-1 rounded-lg border border-rose-200 hover:bg-rose-50 text-rose-600 transition-colors flex items-center gap-1">
                                                <i class="ri-delete-bin-line"></i> Delete
                                            </a>
                                        </div>
                                    </td>
                                </tr>

                                <!-- Member 4 -->
                                <tr class="hover:bg-[#161310] transition-colors">
                                    <td class="py-4 px-6 text-stone-400">#4</td>
                                    <td class="py-4 px-6">
                                        <div class="w-10 h-10 rounded-full bg-[#0D0B09] border border-[#2A231C] overflow-hidden">
                                            <img src="../images/team-4.jpg" alt="Myat Chal Oo" class="w-full h-full object-cover">
                                        </div>
                                    </td>
                                    <td class="py-4 px-6 font-semibold text-[#FAF6EE] text-sm">Myat Chal Oo</td>
                                    <td class="py-4 px-6 text-[#8C7D6B]">Material &amp; Textile Curator</td>
                                    <td class="py-4 px-6 text-right">
                                        <div class="inline-flex items-center gap-2">
                                            <a href="team_update.php?id=4" class="px-2.5 py-1 rounded-lg border border-[#2A231C] hover:bg-[#0D0B09] text-[#D6C8B4] transition-colors flex items-center gap-1">
                                                <i class="ri-pencil-line"></i> Edit
                                            </a>
                                            <a href="team_delete.php?id=4" class="px-2.5 py-1 rounded-lg border border-rose-200 hover:bg-rose-50 text-rose-600 transition-colors flex items-center gap-1">
                                                <i class="ri-delete-bin-line"></i> Delete
                                            </a>
                                        </div>
                                    </td>
                                </tr>

                                <!-- Member 5 -->
                                <tr class="hover:bg-[#161310] transition-colors">
                                    <td class="py-4 px-6 text-stone-400">#5</td>
                                    <td class="py-4 px-6">
                                        <div class="w-10 h-10 rounded-full bg-[#0D0B09] border border-[#2A231C] overflow-hidden">
                                            <img src="../images/team-5.jpg" alt="Nyi Nyi Aung" class="w-full h-full object-cover">
                                        </div>
                                    </td>
                                    <td class="py-4 px-6 font-semibold text-[#FAF6EE] text-sm">Nyi Nyi Aung</td>
                                    <td class="py-4 px-6 text-[#8C7D6B]">Finishing Specialist</td>
                                    <td class="py-4 px-6 text-right">
                                        <div class="inline-flex items-center gap-2">
                                            <a href="team_update.php?id=5" class="px-2.5 py-1 rounded-lg border border-[#2A231C] hover:bg-[#0D0B09] text-[#D6C8B4] transition-colors flex items-center gap-1">
                                                <i class="ri-pencil-line"></i> Edit
                                            </a>
                                            <a href="team_delete.php?id=5" class="px-2.5 py-1 rounded-lg border border-rose-200 hover:bg-rose-50 text-rose-600 transition-colors flex items-center gap-1">
                                                <i class="ri-delete-bin-line"></i> Delete
                                            </a>
                                        </div>
                                    </td>
                                </tr>

                                <!-- Member 6 -->
                                <tr class="hover:bg-[#161310] transition-colors">
                                    <td class="py-4 px-6 text-stone-400">#6</td>
                                    <td class="py-4 px-6">
                                        <div class="w-10 h-10 rounded-full bg-[#0D0B09] border border-[#2A231C] overflow-hidden">
                                            <img src="../images/team-6.jpg" alt="Min Khant Naung" class="w-full h-full object-cover">
                                        </div>
                                    </td>
                                    <td class="py-4 px-6 font-semibold text-[#FAF6EE] text-sm">Min Khant Naung</td>
                                    <td class="py-4 px-6 text-[#8C7D6B]">Showroom Concierge Director</td>
                                    <td class="py-4 px-6 text-right">
                                        <div class="inline-flex items-center gap-2">
                                            <a href="team_update.php?id=6" class="px-2.5 py-1 rounded-lg border border-[#2A231C] hover:bg-[#0D0B09] text-[#D6C8B4] transition-colors flex items-center gap-1">
                                                <i class="ri-pencil-line"></i> Edit
                                            </a>
                                            <a href="team_delete.php?id=6" class="px-2.5 py-1 rounded-lg border border-rose-200 hover:bg-rose-50 text-rose-600 transition-colors flex items-center gap-1">
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
