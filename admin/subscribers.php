<?php
/**
 * ============================================================================
 * FURNISHME BACKEND INSTRUCTION GUIDELINE - NEWSLETTER SUBSCRIBERS LIST
 * ============================================================================
 * FILE: admin/subscribers.php
 * PURPOSE: Lists all newsletter email subscribers from the 'subscribers' table.
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
 *    if ($msg === 'deleted') $success = "Subscriber email removed successfully.";
 * 
 * 4. Query Subscribers from Database:
 *    $search = trim($_GET['search'] ?? '');
 *    if (!empty($search)) {
 *        $stmt = $connection->prepare("SELECT id, email, created_at FROM subscribers WHERE email LIKE ? ORDER BY id DESC");
 *        $wildcard = "%$search%";
 *        $stmt->bind_param("s", $wildcard);
 *        $stmt->execute();
 *        $subscribers = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
 *    } else {
 *        $res = $connection->query("SELECT id, email, created_at FROM subscribers ORDER BY id DESC");
 *        $subscribers = $res ? $res->fetch_all(MYSQLI_ASSOC) : [];
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
    $success = "Subscriber email removed successfully.";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subscribers | FurnishMe Atelier Admin</title>
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
                            <span class="text-[#FAF6EE] font-medium">Subscribers</span>
                        </div>
                        <h2 class="font-serif text-2xl sm:text-3xl font-medium text-[#FAF6EE]">Journal Newsletter Subscribers</h2>
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
                            Showing <strong><?= count($subscribers ?? []) ?></strong> verified email subscribers
                        </div>
                        <div class="relative sm:w-64">
                            <i class="ri-search-line absolute left-3 top-1/2 -translate-y-1/2 text-stone-400 text-xs"></i>
                            <input type="text" placeholder="Filter subscribers by email..." class="w-full pl-8 pr-3 py-1.5 bg-[#0D0B09] border border-[#2A231C] rounded-lg text-xs placeholder-[#8C7D6B] focus:outline-none focus:ring-1 focus:ring-[#C5A059]">
                        </div>
                    </div>

                    <!-- ==========================================================
                         PHP BACKEND GUIDELINE: Dynamic Subscribers Table Loop
                         Query: SELECT id, email, created_at FROM subscribers ORDER BY id DESC
                         Loop through $subscribers:
                         <?php /*
                         if (!empty($subscribers)) {
                             foreach ($subscribers as $sub) {
                                 ?>
                                 <tr class="hover:bg-[#161310] transition-colors">
                                     <td class="py-4 px-6 text-stone-400">#<?= (int)$sub['id'] ?></td>
                                     <td class="py-4 px-6 font-mono text-[#FAF6EE] text-xs font-semibold"><?= htmlspecialchars($sub['email']) ?></td>
                                     <td class="py-4 px-6 text-[#8C7D6B]"><?= htmlspecialchars(date('M j, Y', strtotime($sub['created_at'] ?? 'now'))) ?></td>
                                     <td class="py-4 px-6">
                                         <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[10px] font-semibold bg-emerald-950/40 text-emerald-300 border border-emerald-800/60">
                                             Active
                                         </span>
                                     </td>
                                     <td class="py-4 px-6 text-right">
                                         <a href="subscriber_delete.php?id=<?= (int)$sub['id'] ?>" class="px-2.5 py-1 rounded-lg border border-rose-900/60 hover:bg-rose-950/50 text-rose-400 transition-colors inline-flex items-center gap-1">
                                             <i class="ri-delete-bin-line"></i> Remove
                                         </a>
                                     </td>
                                 </tr>
                                 <?php
                             }
                         } else {
                             echo '<tr><td colspan="5" class="py-8 text-center text-xs text-[#8C7D6B]">No newsletter subscribers found in the registry.</td></tr>';
                         }
                         */ ?>
                         ========================================================== -->
                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse text-xs">
                            <thead>
                                <tr class="bg-[#0D0B09] border-b border-[#2A231C] text-[#8C7D6B] uppercase tracking-wider font-semibold">
                                    <th class="py-3.5 px-6">ID</th>
                                    <th class="py-3.5 px-6">Subscriber Email</th>
                                    <th class="py-3.5 px-6">Subscription Date</th>
                                    <th class="py-3.5 px-6">Status</th>
                                    <th class="py-3.5 px-6 text-right">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-[#E2D8C9] text-[#D6C8B4] font-medium">
                                
                                <!-- Sub 1 -->
                                <tr class="hover:bg-[#161310] transition-colors">
                                    <td class="py-4 px-6 text-stone-400">#1</td>
                                    <td class="py-4 px-6 font-mono text-[#FAF6EE] text-xs font-semibold">aungmin@gmail.com</td>
                                    <td class="py-4 px-6 text-[#8C7D6B]">2026-11-01</td>
                                    <td class="py-4 px-6">
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[11px] font-semibold bg-emerald-50 text-emerald-700 border border-emerald-200">
                                            Subscribed
                                        </span>
                                    </td>
                                    <td class="py-4 px-6 text-right">
                                        <a href="subscriber_delete.php?id=1" class="px-2.5 py-1 rounded-lg border border-rose-200 hover:bg-rose-50 text-rose-600 transition-colors inline-flex items-center gap-1">
                                            <i class="ri-delete-bin-line"></i> Remove
                                        </a>
                                    </td>
                                </tr>

                                <!-- Sub 2 -->
                                <tr class="hover:bg-[#161310] transition-colors">
                                    <td class="py-4 px-6 text-stone-400">#2</td>
                                    <td class="py-4 px-6 font-mono text-[#FAF6EE] text-xs font-semibold">susu@gmail.com</td>
                                    <td class="py-4 px-6 text-[#8C7D6B]">2026-11-02</td>
                                    <td class="py-4 px-6">
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[11px] font-semibold bg-emerald-50 text-emerald-700 border border-emerald-200">
                                            Subscribed
                                        </span>
                                    </td>
                                    <td class="py-4 px-6 text-right">
                                        <a href="subscriber_delete.php?id=2" class="px-2.5 py-1 rounded-lg border border-rose-200 hover:bg-rose-50 text-rose-600 transition-colors inline-flex items-center gap-1">
                                            <i class="ri-delete-bin-line"></i> Remove
                                        </a>
                                    </td>
                                </tr>

                                <!-- Sub 3 -->
                                <tr class="hover:bg-[#161310] transition-colors">
                                    <td class="py-4 px-6 text-stone-400">#3</td>
                                    <td class="py-4 px-6 font-mono text-[#FAF6EE] text-xs font-semibold">koko@gmail.com</td>
                                    <td class="py-4 px-6 text-[#8C7D6B]">2026-11-03</td>
                                    <td class="py-4 px-6">
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[10px] font-semibold bg-emerald-50 text-emerald-700 border border-emerald-200">
                                            Subscribed
                                        </span>
                                    </td>
                                    <td class="py-4 px-6 text-right">
                                        <a href="subscriber_delete.php?id=3" class="px-2.5 py-1 rounded-lg border border-rose-200 hover:bg-rose-50 text-rose-600 transition-colors inline-flex items-center gap-1">
                                            <i class="ri-delete-bin-line"></i> Remove
                                        </a>
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
