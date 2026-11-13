<?php
/**
 * ============================================================================
 * FURNISHME BACKEND INSTRUCTION GUIDELINE - SHOWROOM INQUIRIES LIST
 * ============================================================================
 * FILE: admin/contacts.php
 * PURPOSE: Lists all client inquiries and bespoke commission messages submitted
 *          via the public contact form from the 'contacts' table.
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
 *    if ($msg === 'deleted') $success = "Inquiry message deleted successfully.";
 * 
 * 4. Query Inquiries from Database:
 *    $search = trim($_GET['search'] ?? '');
 *    if (!empty($search)) {
 *        $stmt = $connection->prepare("SELECT id, name, email, number, status, created_at FROM contacts WHERE name LIKE ? OR email LIKE ? ORDER BY id DESC");
 *        $wildcard = "%$search%";
 *        $stmt->bind_param("ss", $wildcard, $wildcard);
 *        $stmt->execute();
 *        $contacts = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
 *    } else {
 *        $res = $connection->query("SELECT id, name, email, number, status, created_at FROM contacts ORDER BY id DESC");
 *        $contacts = $res ? $res->fetch_all(MYSQLI_ASSOC) : [];
 *    }
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
if (isset($_GET['msg']) && $_GET['msg'] === 'deleted') {
    $success = "Inquiry message deleted successfully.";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inquiries &amp; Messages | FurnishMe Atelier Admin</title>
    <link rel="icon" type="image/x-icon" href="../images/favicon.ico">
    <?php include "components/css.php"; ?>
</head>

<body class="bg-[#0D0B09] text-[#EDE4D7] font-sans antialiased selection:bg-[#C5A059] selection:text-[#0D0B09]">
    <div class="min-h-screen flex">
        <?php include "components/sidebar.php"; ?>

        <div class="lg:pl-64 flex flex-col flex-1 min-w-0">
            <?php include "components/topbar.php"; ?>

            <main class="flex-1 p-4 sm:p-6 lg:p-8 max-w-7xl w-full mx-auto space-y-6">
                
                <!-- Page Header -->
                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                    <div>
                        <div class="flex items-center gap-2 text-xs text-[#8C7D6B] mb-1">
                            <a href="dashboard.php" class="hover:text-[#FAF6EE]">Dashboard</a>
                            <span>/</span>
                            <span class="text-[#FAF6EE] font-medium">Inquiries</span>
                        </div>
                        <h2 class="font-serif text-2xl sm:text-3xl font-medium text-[#FAF6EE]">Showroom Inquiries &amp; Messages</h2>
                    </div>
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
                            Showing customer inquiries &amp; consultation requests (Total: <strong><?= count($contacts ?? []) ?></strong>)
                        </div>
                        <div class="relative sm:w-64">
                            <i class="ri-search-line absolute left-3 top-1/2 -translate-y-1/2 text-stone-400 text-xs"></i>
                            <input type="text" placeholder="Filter messages..." class="w-full pl-8 pr-3 py-1.5 bg-[#0D0B09] border border-[#2A231C] rounded-lg text-xs placeholder-[#8C7D6B] focus:outline-none focus:ring-1 focus:ring-[#C5A059]">
                        </div>
                    </div>

                    <!-- ==========================================================
                         PHP BACKEND GUIDELINE: Dynamic Contacts Table Loop
                         Query: SELECT id, name, email, number, status, created_at FROM contacts ORDER BY id DESC
                         Loop through $contacts:
                         <?php /*
                         if (!empty($contacts)) {
                             foreach ($contacts as $contact) {
                                 $statusClass = ($contact['status'] === 'New')
                                     ? 'bg-amber-950/40 text-amber-300 border-amber-800/60'
                                     : (($contact['status'] === 'Replied')
                                         ? 'bg-emerald-950/40 text-emerald-300 border-emerald-800/60'
                                         : 'bg-[#0D0B09] text-[#8C7D6B] border-[#2A231C]');
                                 ?>
                                 <tr class="hover:bg-[#161310] transition-colors">
                                     <td class="py-4 px-6 text-stone-400">#<?= (int)$contact['id'] ?></td>
                                     <td class="py-4 px-6 font-semibold text-[#FAF6EE] text-sm"><?= htmlspecialchars($contact['name']) ?></td>
                                     <td class="py-4 px-6 text-[#8C7D6B] font-mono text-xs"><?= htmlspecialchars($contact['email']) ?></td>
                                     <td class="py-4 px-6 text-[#8C7D6B]"><?= htmlspecialchars($contact['number'] ?: '—') ?></td>
                                     <td class="py-4 px-6">
                                         <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[10px] font-semibold border <?= $statusClass ?>">
                                             <?= htmlspecialchars($contact['status'] ?? 'New') ?>
                                         </span>
                                     </td>
                                     <td class="py-4 px-6 text-right">
                                         <div class="inline-flex items-center gap-2">
                                             <a href="contact_view.php?id=<?= (int)$contact['id'] ?>" class="px-2.5 py-1 rounded-lg border border-[#2A231C] hover:bg-[#0D0B09] text-[#D6C8B4] transition-colors flex items-center gap-1">
                                                 <i class="ri-eye-line"></i> View
                                             </a>
                                             <a href="contact_delete.php?id=<?= (int)$contact['id'] ?>" class="px-2.5 py-1 rounded-lg border border-rose-900/60 hover:bg-rose-950/50 text-rose-400 transition-colors flex items-center gap-1">
                                                 <i class="ri-delete-bin-line"></i> Delete
                                             </a>
                                         </div>
                                     </td>
                                 </tr>
                                 <?php
                             }
                         } else {
                             echo '<tr><td colspan="6" class="py-8 text-center text-xs text-[#8C7D6B]">No client messages found in the repository.</td></tr>';
                         }
                         */ ?>
                         ========================================================== -->
                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse text-xs">
                            <thead>
                                <tr class="bg-[#0D0B09] border-b border-[#2A231C] text-[#8C7D6B] uppercase tracking-wider font-semibold">
                                    <th class="py-3.5 px-6">ID</th>
                                    <th class="py-3.5 px-6">Client Name</th>
                                    <th class="py-3.5 px-6">Email Address</th>
                                    <th class="py-3.5 px-6">Phone Number</th>
                                    <th class="py-3.5 px-6">Status</th>
                                    <th class="py-3.5 px-6 text-right">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-[#E2D8C9] text-[#D6C8B4] font-medium">
                                
                                <!-- Contact 1 -->
                                <tr class="hover:bg-[#161310] transition-colors">
                                    <td class="py-4 px-6 text-stone-400">#1</td>
                                    <td class="py-4 px-6 font-semibold text-[#FAF6EE] text-sm">Aung Min</td>
                                    <td class="py-4 px-6 text-[#8C7D6B] font-mono text-xs">aungmin@gmail.com</td>
                                    <td class="py-4 px-6 text-[#8C7D6B]">09973383719</td>
                                    <td class="py-4 px-6">
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[10px] font-semibold bg-amber-50 text-[#C5A059] border border-amber-200">
                                             New Message
                                        </span>
                                    </td>
                                    <td class="py-4 px-6 text-right">
                                        <div class="inline-flex items-center gap-2">
                                            <a href="contact_view.php?id=1" class="px-2.5 py-1 rounded-lg border border-[#2A231C] hover:bg-[#0D0B09] text-[#D6C8B4] transition-colors flex items-center gap-1">
                                                <i class="ri-eye-line"></i> View
                                            </a>
                                            <a href="contact_delete.php?id=1" class="px-2.5 py-1 rounded-lg border border-rose-200 hover:bg-rose-50 text-rose-600 transition-colors flex items-center gap-1">
                                                <i class="ri-delete-bin-line"></i> Delete
                                            </a>
                                        </div>
                                    </td>
                                </tr>

                                <!-- Contact 2 -->
                                <tr class="hover:bg-[#161310] transition-colors">
                                    <td class="py-4 px-6 text-stone-400">#2</td>
                                    <td class="py-4 px-6 font-semibold text-[#FAF6EE] text-sm">Su Su</td>
                                    <td class="py-4 px-6 text-[#8C7D6B] font-mono text-xs">susu@gmail.com</td>
                                    <td class="py-4 px-6 text-[#8C7D6B]">09421122846</td>
                                    <td class="py-4 px-6">
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[10px] font-semibold bg-emerald-50 text-emerald-800 border border-emerald-200">
                                             Followed Up
                                        </span>
                                    </td>
                                    <td class="py-4 px-6 text-right">
                                        <div class="inline-flex items-center gap-2">
                                            <a href="contact_view.php?id=2" class="px-2.5 py-1 rounded-lg border border-[#2A231C] hover:bg-[#0D0B09] text-[#D6C8B4] transition-colors flex items-center gap-1">
                                                <i class="ri-eye-line"></i> View
                                            </a>
                                            <a href="contact_delete.php?id=2" class="px-2.5 py-1 rounded-lg border border-rose-200 hover:bg-rose-50 text-rose-600 transition-colors flex items-center gap-1">
                                                <i class="ri-delete-bin-line"></i> Delete
                                            </a>
                                        </div>
                                    </td>
                                </tr>

                                <!-- Contact 3 -->
                                <tr class="hover:bg-[#161310] transition-colors">
                                    <td class="py-4 px-6 text-stone-400">#3</td>
                                    <td class="py-4 px-6 font-semibold text-[#FAF6EE] text-sm">Ko Ko</td>
                                    <td class="py-4 px-6 text-[#8C7D6B] font-mono text-xs">koko@gmail.com</td>
                                    <td class="py-4 px-6 text-[#8C7D6B]">09456123789</td>
                                    <td class="py-4 px-6">
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[10px] font-semibold bg-[#0D0B09] text-[#8C7D6B]">
                                             Archived
                                        </span>
                                    </td>
                                    <td class="py-4 px-6 text-right">
                                        <div class="inline-flex items-center gap-2">
                                            <a href="contact_view.php?id=3" class="px-2.5 py-1 rounded-lg border border-[#2A231C] hover:bg-[#0D0B09] text-[#D6C8B4] transition-colors flex items-center gap-1">
                                                <i class="ri-eye-line"></i> View
                                            </a>
                                            <a href="contact_delete.php?id=3" class="px-2.5 py-1 rounded-lg border border-rose-200 hover:bg-rose-50 text-rose-600 transition-colors flex items-center gap-1">
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
