<?php
/**
 * ============================================================================
 * FURNISHME BACKEND INSTRUCTION GUIDELINE - VIEW SHOWROOM INQUIRY
 * ============================================================================
 * FILE: admin/contact_view.php
 * PURPOSE: Inspects the complete details and bespoke consultation message from
 *          a prospective client in the 'contacts' table by ID.
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
 * 3. Validate Contact ID Parameter:
 *    $contact_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
 *    if ($contact_id <= 0) {
 *        header("Location: contacts.php");
 *        exit;
 *    }
 * 
 * 4. Fetch Inquiry Details from Database:
 *    $stmt = $connection->prepare("SELECT * FROM contacts WHERE id = ? LIMIT 1");
 *    $stmt->bind_param("i", $contact_id);
 *    $stmt->execute();
 *    $result = $stmt->get_result();
 *    $contact = $result->fetch_assoc();
 *    if (!$contact) {
 *        header("Location: contacts.php");
 *        exit;
 *    }
 * 
 * 5. (Optional) Auto-Update Status to 'Read' or 'Followed Up':
 *    if ($contact['status'] === 'New') {
 *        $upd = $connection->prepare("UPDATE contacts SET status = 'Replied' WHERE id = ?");
 *        $upd->bind_param("i", $contact_id);
 *        $upd->execute();
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

require_once "../components/connection.php";

$contact_id = isset($_GET['id']) ? (int)$_GET['id'] : 1;
// In production, execute the prepared query:
// $stmt = $connection->prepare("SELECT * FROM contacts WHERE id = ? LIMIT 1");
// $stmt->bind_param("i", $contact_id);
// $stmt->execute();
// $contact = $stmt->get_result()->fetch_assoc();
// If empty, redirect: if (!$contact) { header("Location: contacts.php"); exit; }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Inquiry #<?= (int)$contact_id ?> | FurnishMe Atelier Admin</title>
    <link rel="icon" type="image/x-icon" href="../images/favicon.ico">
    <?php include "components/css.php"; ?>
</head>

<body class="bg-[#0D0B09] text-[#EDE4D7] font-sans antialiased selection:bg-[#C5A059] selection:text-[#0D0B09]">
    <div class="min-h-screen flex">
        <?php include "components/sidebar.php"; ?>

        <div class="lg:pl-64 flex flex-col flex-1 min-w-0">
            <?php include "components/topbar.php"; ?>

            <main class="flex-1 p-4 sm:p-6 lg:p-8 max-w-4xl w-full mx-auto space-y-6">
                
                <!-- Heading & Back Nav -->
                <div class="flex items-center justify-between">
                    <div>
                        <div class="flex items-center gap-2 text-xs text-[#8C7D6B] mb-1">
                            <a href="dashboard.php" class="hover:text-[#FAF6EE]">Dashboard</a>
                            <span>/</span>
                            <a href="contacts.php" class="hover:text-[#FAF6EE]">Inquiries</a>
                            <span>/</span>
                            <span class="text-[#FAF6EE] font-medium">Message #<?= (int)$contact_id ?></span>
                        </div>
                        <h2 class="font-serif text-2xl sm:text-3xl font-medium text-[#FAF6EE]">Showroom Inquiry Details</h2>
                    </div>
                    <div class="flex items-center gap-2">
                        <a href="contacts.php" class="px-4 py-2 rounded-xl border border-[#2A231C] text-xs font-medium text-[#D6C8B4] hover:bg-[#161310] transition-colors">
                            Back
                        </a>
                        <!-- ======================================================
                             PHP BACKEND GUIDELINE: Delete Inquiry Link
                             Directs to contact_delete.php?id=<?= (int)$contact_id ?>
                             ====================================================== -->
                        <a href="contact_delete.php?id=<?= (int)$contact_id ?>" class="px-4 py-2 rounded-xl border border-rose-900/60 text-xs font-medium text-rose-400 hover:bg-rose-950/50 transition-colors flex items-center gap-1">
                            <i class="ri-delete-bin-line"></i> Delete
                        </a>
                    </div>
                </div>

                <!-- Inquiry Card -->
                <!-- ==========================================================
                     PHP BACKEND GUIDELINE: Dynamic Inquiry Details Rendering
                     Extract row from DB: $contact = $result->fetch_assoc();
                     Fields to render:
                     - Name:      <?= htmlspecialchars($contact['name'] ?? 'Aung Min') ?>
                     - Phone:     <?= htmlspecialchars($contact['number'] ?? '09973383719') ?>
                     - Email:     <?= htmlspecialchars($contact['email'] ?? 'aungmin@gmail.com') ?>
                     - Date:      <?= date('F j, Y, g:i a', strtotime($contact['created_at'] ?? 'now')) ?>
                     - Status:    <?= htmlspecialchars($contact['status'] ?? 'New') ?>
                     - Message:   <?= nl2br(htmlspecialchars($contact['message'] ?? '')) ?>
                     ========================================================== -->
                <div class="bg-[#161310] rounded-3xl border border-[#2A231C] p-6 sm:p-10 shadow-xs space-y-8">
                    
                    <!-- Metadata Grid -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 p-5 rounded-2xl bg-[#0D0B09] border border-[#2A231C]/80 text-xs">
                        <div>
                            <span class="text-stone-400 block mb-0.5">Sender Name</span>
                            <strong class="text-[#FAF6EE] text-sm block"><?= htmlspecialchars($contact['name'] ?? 'Aung Min') ?></strong>
                        </div>
                        <div>
                            <span class="text-stone-400 block mb-0.5">Phone / Viber</span>
                            <a href="tel:<?= htmlspecialchars($contact['number'] ?? '09973383719') ?>" class="text-[#FAF6EE] hover:underline font-mono block">
                                <?= htmlspecialchars($contact['number'] ?? '09973383719') ?>
                            </a>
                        </div>
                        <div>
                            <span class="text-stone-400 block mb-0.5">Email Address</span>
                            <a href="mailto:<?= htmlspecialchars($contact['email'] ?? 'aungmin@gmail.com') ?>" class="text-[#FAF6EE] hover:underline font-mono block">
                                <?= htmlspecialchars($contact['email'] ?? 'aungmin@gmail.com') ?>
                            </a>
                        </div>
                        <div>
                            <span class="text-stone-400 block mb-0.5">Received Date</span>
                            <span class="text-[#D6C8B4] block"><?= htmlspecialchars($contact['created_at'] ?? '2026-11-04 14:30') ?></span>
                        </div>
                    </div>

                    <!-- Message Content -->
                    <div class="space-y-3">
                        <span class="text-xs uppercase tracking-widest text-[#C5A059] font-semibold block">Message Body</span>
                        <div class="p-6 rounded-2xl bg-[#1C1814]/50 border border-[#2A231C] text-[#FAF6EE] text-sm leading-relaxed">
                            <p>
                                <?= nl2br(htmlspecialchars($contact['message'] ?? 'Hello, I would like to know more about your modern sofa collection and delivery options in Yangon. We are currently finishing an architectural residence in Yankin and looking for 2 living room modular lounge chairs and an oak dining set. Please contact me with availability and wood finishes. Thank you.')) ?>
                            </p>
                        </div>
                    </div>

                    <!-- Response Actions -->
                    <div class="pt-6 border-t border-[#2A231C] flex flex-wrap items-center justify-between gap-4">
                        <span class="text-xs text-stone-400">Status: <strong class="text-[#C5A059]"><?= htmlspecialchars($contact['status'] ?? 'Requires Follow-up') ?></strong></span>
                        <div class="flex items-center gap-3">
                            <a href="mailto:<?= htmlspecialchars($contact['email'] ?? 'aungmin@gmail.com') ?>?subject=Regarding%20Your%20FurnishMe%20Showroom%20Inquiry" class="px-6 py-2.5 rounded-xl bg-[#C5A059] hover:bg-[#D4AF37] text-[#0D0B09] font-semibold text-xs transition-colors shadow-xs flex items-center gap-2">
                                <i class="ri-reply-line text-sm"></i>
                                <span>Reply via Email</span>
                            </a>
                        </div>
                    </div>

                </div>

            </main>

            <?php include "components/footer.php"; ?>
        </div>
    </div>

    <?php include "components/js.php"; ?>
</body>

</html>
