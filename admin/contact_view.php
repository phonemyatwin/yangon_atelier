<?php
/**
 * ============================================================================
 * FURNISHME BACKEND INSTRUCTION GUIDELINE - VIEW INQUIRY
 * ============================================================================
 * FILE: admin/contact_view.php
 * PURPOSE: Displays full message content and sender info for a specific inquiry.
 * ============================================================================
 */

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['admin_user'])) {
    header("Location: index.php");
    exit;
}

$contact_id = isset($_GET['id']) ? (int)$_GET['id'] : 1;
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

<body class="bg-[#EDE8E0] text-[#362F2A] font-sans antialiased selection:bg-[#8A5A44] selection:text-[#F6F3EE]">
    <div class="min-h-screen flex">
        <?php include "components/sidebar.php"; ?>

        <div class="lg:pl-64 flex flex-col flex-1 min-w-0">
            <?php include "components/topbar.php"; ?>

            <main class="flex-1 p-4 sm:p-6 lg:p-8 max-w-4xl w-full mx-auto space-y-6">
                
                <!-- Heading & Back Nav -->
                <div class="flex items-center justify-between">
                    <div>
                        <div class="flex items-center gap-2 text-xs text-[#6E6359] mb-1">
                            <a href="dashboard.php" class="hover:text-[#362F2A] transition-colors">Dashboard</a>
                            <span>/</span>
                            <a href="contacts.php" class="hover:text-[#362F2A] transition-colors">Inquiries</a>
                            <span>/</span>
                            <span class="text-[#362F2A] font-medium">Message #<?= (int)$contact_id ?></span>
                        </div>
                        <h2 class="font-serif text-2xl sm:text-3xl font-medium text-[#362F2A]">Showroom Inquiry Details</h2>
                    </div>
                    <div class="flex items-center gap-2">
                        <a href="contacts.php" class="px-4 py-2 rounded-xl border border-[#C9C0B3] bg-[#DFD8CD] hover:bg-[#D5CDC1] text-xs font-semibold text-[#362F2A] transition-colors">
                            Back
                        </a>
                        <a href="contact_delete.php?id=<?= (int)$contact_id ?>" class="px-4 py-2 rounded-xl border border-[#DFC8C8] bg-[#EFE0E0] hover:bg-[#E5D0D0] text-[#8C3B3B] text-xs font-semibold transition-colors flex items-center gap-1">
                            <i class="ri-delete-bin-line"></i> Delete
                        </a>
                    </div>
                </div>

                <!-- Inquiry Card in Raw Linen (#F6F3EE) -->
                <div class="bg-[#F6F3EE] rounded-3xl border border-[#C9C0B3] p-6 sm:p-10 shadow-xs space-y-8">
                    
                    <!-- Metadata Grid -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 p-5 rounded-2xl bg-[#EDE8E0] border border-[#C9C0B3] text-xs">
                        <div>
                            <span class="text-[#6E6359] block mb-0.5">Sender Name</span>
                            <strong class="text-[#362F2A] text-sm block">Aung Min</strong>
                        </div>
                        <div>
                            <span class="text-[#6E6359] block mb-0.5">Phone / Viber</span>
                            <a href="tel:09973383719" class="text-[#362F2A] hover:underline font-mono block">
                                09973383719
                            </a>
                        </div>
                        <div>
                            <span class="text-[#6E6359] block mb-0.5">Email Address</span>
                            <a href="mailto:aungmin@gmail.com" class="text-[#362F2A] hover:underline font-mono block">
                                aungmin@gmail.com
                            </a>
                        </div>
                        <div>
                            <span class="text-[#6E6359] block mb-0.5">Received Date</span>
                            <span class="text-[#362F2A] block">2026-11-04 14:30</span>
                        </div>
                    </div>

                    <!-- Message Content -->
                    <div class="space-y-3">
                        <span class="text-xs uppercase tracking-widest text-[#8A5A44] font-semibold block">Message Body</span>
                        <div class="p-6 rounded-2xl bg-[#EDE8E0] border border-[#C9C0B3] text-[#362F2A] text-sm leading-relaxed">
                            <p>
                                Hello, I would like to know more about your modern sofa collection and delivery options in Yangon. We are currently finishing an architectural residence in Yankin and looking for 2 living room modular lounge chairs and an oak dining set. Please contact me with availability and wood finishes. Thank you.
                            </p>
                        </div>
                    </div>

                    <!-- Response Actions -->
                    <div class="pt-6 border-t border-[#C9C0B3] flex flex-wrap items-center justify-between gap-4">
                        <span class="text-xs text-[#6E6359]">Status: <strong class="text-[#8C5327]">Requires Follow-up</strong></span>
                        <div class="flex items-center gap-3">
                            <a href="mailto:aungmin@gmail.com?subject=Regarding%20Your%20FurnishMe%20Showroom%20Inquiry" class="px-6 py-2.5 rounded-xl bg-[#8A5A44] hover:bg-[#704735] text-[#F6F3EE] font-semibold text-xs transition-colors shadow-xs flex items-center gap-2">
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
