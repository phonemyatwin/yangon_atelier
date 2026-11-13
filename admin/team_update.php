<?php
/**
 * ============================================================================
 * FURNISHME BACKEND INSTRUCTION GUIDELINE - UPDATE TEAM MEMBER
 * ============================================================================
 * FILE: admin/team_update.php
 * PURPOSE: Queries existing team member by ID, populates the edit form, handles
 *          optional portrait photograph replacement, and updates the 'team' table.
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
 * 3. Validate and Query Existing Member Record:
 *    $id = isset($_GET['id']) ? (int)$_GET['id'] : (isset($_POST['id']) ? (int)$_POST['id'] : 0);
 *    if ($id <= 0) {
 *        header("Location: team.php");
 *        exit;
 *    }
 *    $stmt = $connection->prepare("SELECT * FROM team WHERE id = ? LIMIT 1");
 *    $stmt->bind_param("i", $id);
 *    $stmt->execute();
 *    $member = $stmt->get_result()->fetch_assoc();
 *    $stmt->close();
 *    if (!$member) {
 *        header("Location: team.php?error=not_found");
 *        exit;
 *    }
 * 
 * 4. Process POST Update:
 *    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
 *        $name     = trim($_POST['name'] ?? '');
 *        $position = trim($_POST['position'] ?? '');
 *        $file_key = isset($_FILES['profile']) ? 'profile' : 'image';
 * 
 *        // Handle Optional Portrait Upload
 *        if (isset($_FILES[$file_key]) && $_FILES[$file_key]['error'] === UPLOAD_ERR_OK) {
 *            $ext = strtolower(pathinfo($_FILES[$file_key]['name'], PATHINFO_EXTENSION));
 *            $new_image = 'team-' . time() . '-' . rand(100, 999) . '.' . $ext;
 *            move_uploaded_file($_FILES[$file_key]['tmp_name'], '../images/' . $new_image);
 * 
 *            $update_stmt = $connection->prepare("UPDATE team SET name = ?, position = ?, image = ? WHERE id = ?");
 *            $update_stmt->bind_param("sssi", $name, $position, $new_image, $id);
 *        } else {
 *            $update_stmt = $connection->prepare("UPDATE team SET name = ?, position = ? WHERE id = ?");
 *            $update_stmt->bind_param("ssi", $name, $position, $id);
 *        }
 * 
 *        if ($update_stmt->execute()) {
 *            $update_stmt->close();
 *            header("Location: team.php?msg=updated");
 *            exit;
 *        } else {
 *            $error = "Failed to update profile: " . $connection->error;
 *        }
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

$error = '';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Team Member | FurnishMe Admin</title>
    <link rel="icon" type="image/x-icon" href="../images/favicon.ico">
    <?php include "components/css.php"; ?>
</head>

<body class="bg-[#0D0B09] text-[#EDE4D7] font-sans antialiased selection:bg-[#C5A059] selection:text-[#0D0B09]">
    <div class="min-h-screen flex">
        <?php include "components/sidebar.php"; ?>

        <div class="lg:pl-64 flex flex-col flex-1 min-w-0">
            <?php include "components/topbar.php"; ?>

            <main class="flex-1 p-4 sm:p-6 lg:p-8 max-w-4xl w-full mx-auto space-y-6">
                
                <!-- Heading -->
                <div class="flex items-center justify-between">
                    <div>
                        <div class="flex items-center gap-2 text-xs text-[#8C7D6B] mb-1">
                            <a href="dashboard.php" class="hover:text-[#FAF6EE]">Dashboard</a>
                            <span>/</span>
                            <a href="team.php" class="hover:text-[#FAF6EE]">Team</a>
                            <span>/</span>
                            <span class="text-[#FAF6EE] font-medium">Edit Member</span>
                        </div>
                        <h2 class="font-serif text-2xl sm:text-3xl font-medium text-[#FAF6EE]">Edit Collective Profile</h2>
                    </div>
                    <a href="team.php" class="px-4 py-2 rounded-xl border border-[#2A231C] text-xs font-medium text-[#D6C8B4] hover:bg-white transition-colors">
                        Back to List
                    </a>
                </div>

                <!-- Error Notification Banner -->
                <?php if (!empty($error)): ?>
                    <div class="p-4 rounded-2xl bg-rose-950/60 border border-rose-800 text-rose-300 text-xs flex items-center gap-2.5">
                        <i class="ri-error-warning-line text-lg flex-shrink-0"></i>
                        <span><?= htmlspecialchars($error) ?></span>
                    </div>
                <?php endif; ?>

                <!-- Form Card -->
                <div class="bg-[#161310] rounded-3xl border border-[#2A231C] p-6 sm:p-10 shadow-xs">
                    <!-- ==========================================================
                         PHP BACKEND GUIDELINE: Team Member Update Form
                         - Action: action="" (submits to self)
                         - Method: POST
                         - Hidden id input: <input type="hidden" name="id" value="<?= $member['id'] ?? 1 ?>">
                         - Prefill inputs with current record values
                         ========================================================== -->
                    <form action="" method="POST" enctype="multipart/form-data" class="space-y-6">
                        <input type="hidden" name="id" value="1">

                        <!-- Name -->
                        <div class="space-y-1.5">
                            <label for="name" class="block text-xs font-semibold uppercase tracking-wider text-[#D6C8B4]">
                                Full Name <span class="text-rose-600">*</span>
                            </label>
                            <div class="relative">
                                <i class="ri-user-line absolute left-4 top-1/2 -translate-y-1/2 text-stone-400 text-base"></i>
                                <input type="text" id="name" name="name" required value="Phone Myat Win" class="w-full pl-11 pr-4 py-3 bg-[#0D0B09] border border-[#2A231C] rounded-xl text-[#FAF6EE] text-sm placeholder-[#8C7D6B] focus:outline-none focus:ring-2 focus:ring-[#C5A059] focus:border-[#C5A059] transition-all">
                            </div>
                        </div>

                        <!-- Position -->
                        <div class="space-y-1.5">
                            <label for="position" class="block text-xs font-semibold uppercase tracking-wider text-[#D6C8B4]">
                                Atelier Role / Title <span class="text-rose-600">*</span>
                            </label>
                            <div class="relative">
                                <i class="ri-briefcase-line absolute left-4 top-1/2 -translate-y-1/2 text-stone-400 text-base"></i>
                                <input type="text" id="position" name="position" required value="Principal Architect &amp; Founder" class="w-full pl-11 pr-4 py-3 bg-[#0D0B09] border border-[#2A231C] rounded-xl text-[#FAF6EE] text-sm placeholder-[#8C7D6B] focus:outline-none focus:ring-2 focus:ring-[#C5A059] focus:border-[#C5A059] transition-all">
                            </div>
                        </div>

                        <!-- Current Image & Replace -->
                        <div class="space-y-1.5">
                            <label class="block text-xs font-semibold uppercase tracking-wider text-[#D6C8B4]">
                                Current Portrait &amp; Replacement
                            </label>
                            <div class="flex flex-col sm:flex-row items-center gap-6 p-4 rounded-2xl bg-[#0D0B09] border border-[#2A231C]">
                                <div class="w-20 h-24 rounded-xl bg-[#161310] border border-[#2A231C] overflow-hidden flex-shrink-0">
                                    <!-- PHP Guideline: src="../images/<?= htmlspecialchars($member['image'] ?? 'team-1.jpg') ?>" -->
                                    <img id="team-preview" src="../images/team-1.jpg" alt="Current portrait" class="w-full h-full object-cover">
                                </div>
                                <div class="flex-1 space-y-1 text-center sm:text-left">
                                    <span class="text-xs font-medium text-[#FAF6EE] block">Replace Portrait (Optional)</span>
                                    <span class="text-[11px] text-stone-400 block">Leave empty to keep current image.</span>
                                    <input type="file" id="profile" name="profile" accept="image/*" data-preview-target="team-preview" class="mt-2 text-xs text-[#8C7D6B] file:mr-3 file:py-1.5 file:px-3 file:rounded-lg file:border-0 file:text-xs file:font-medium file:bg-stone-900 file:text-white hover:file:bg-amber-900 file:cursor-pointer cursor-pointer">
                                </div>
                            </div>
                        </div>

                        <!-- Actions -->
                        <div class="pt-4 border-t border-[#2A231C] flex items-center justify-end gap-3">
                            <a href="team.php" class="px-5 py-3 rounded-xl border border-[#2A231C] text-xs font-medium text-[#D6C8B4] hover:bg-[#0D0B09] transition-colors">
                                Cancel
                            </a>
                            <button type="submit" name="update" class="px-6 py-3 rounded-xl bg-[#C5A059] hover:bg-[#D4AF37] text-[#0D0B09] text-xs font-semibold transition-colors shadow-xs flex items-center gap-2">
                                <i class="ri-save-line text-base"></i>
                                <span>Save Changes</span>
                            </button>
                        </div>
                    </form>
                </div>

            </main>

            <?php include "components/footer.php"; ?>
        </div>
    </div>

    <?php include "components/js.php"; ?>
</body>

</html>
