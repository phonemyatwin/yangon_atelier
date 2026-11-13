<?php
/**
 * ============================================================================
 * FURNISHME BACKEND INSTRUCTION GUIDELINE - ADD TEAM MEMBER
 * ============================================================================
 * FILE: admin/team_create.php
 * PURPOSE: Adds a new master artisan or curator to the collective, handles portrait
 *          upload to ../images/, and inserts records into the 'team' table.
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
 * 3. Handle POST Request with File Upload:
 *    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
 *        $name     = trim($_POST['name'] ?? '');
 *        $position = trim($_POST['position'] ?? '');
 *        $file_key = isset($_FILES['profile']) ? 'profile' : 'image';
 * 
 *        if (empty($name) || empty($position)) {
 *            $error = "Both artisan name and role are required.";
 *        } elseif (!isset($_FILES[$file_key]) || $_FILES[$file_key]['error'] !== UPLOAD_ERR_OK) {
 *            $error = "Please upload an artisan portrait photograph.";
 *        } else {
 *            $ext = strtolower(pathinfo($_FILES[$file_key]['name'], PATHINFO_EXTENSION));
 *            $allowed_exts = ['jpg', 'jpeg', 'png', 'webp'];
 * 
 *            if (!in_array($ext, $allowed_exts)) {
 *                $error = "Only JPG, PNG, and WEBP image formats are supported.";
 *            } else {
 *                $unique_image = 'team-' . time() . '-' . rand(100, 999) . '.' . $ext;
 *                $destination  = '../images/' . $unique_image;
 * 
 *                if (move_uploaded_file($_FILES[$file_key]['tmp_name'], $destination)) {
 *                    $stmt = $connection->prepare("INSERT INTO team (name, position, image) VALUES (?, ?, ?)");
 *                    $stmt->bind_param("sss", $name, $position, $unique_image);
 *                    
 *                    if ($stmt->execute()) {
 *                        $stmt->close();
 *                        header("Location: team.php?msg=created");
 *                        exit;
 *                    } else {
 *                        $error = "Database insertion failed: " . $connection->error;
 *                    }
 *                } else {
 *                    $error = "Failed to move portrait file to ../images/";
 *                }
 *            }
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
    <title>Create Team Member | FurnishMe Admin</title>
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
                            <span class="text-[#FAF6EE] font-medium">New Artisan</span>
                        </div>
                        <h2 class="font-serif text-2xl sm:text-3xl font-medium text-[#FAF6EE]">Add Design Collective Member</h2>
                    </div>
                    <a href="team.php" class="px-4 py-2 rounded-xl border border-[#2A231C] text-xs font-medium text-[#D6C8B4] hover:bg-white transition-colors">
                        Cancel &amp; Return
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
                         PHP BACKEND GUIDELINE: Team Member Creation Form
                         - Action: action="" (submits to self)
                         - Method: POST
                         - Enctype: multipart/form-data
                         ========================================================== -->
                    <form action="" method="POST" enctype="multipart/form-data" class="space-y-6">
                        
                        <!-- Name -->
                        <div class="space-y-1.5">
                            <label for="name" class="block text-xs font-semibold uppercase tracking-wider text-[#D6C8B4]">
                                Full Name <span class="text-rose-600">*</span>
                            </label>
                            <div class="relative">
                                <i class="ri-user-line absolute left-4 top-1/2 -translate-y-1/2 text-stone-400 text-base"></i>
                                <input type="text" id="name" name="name" required value="<?= htmlspecialchars($_POST['name'] ?? '') ?>" placeholder="e.g. Thae Nay Nwe Soe" class="w-full pl-11 pr-4 py-3 bg-[#0D0B09] border border-[#2A231C] rounded-xl text-[#FAF6EE] text-sm placeholder-[#8C7D6B] focus:outline-none focus:ring-2 focus:ring-[#C5A059] focus:border-[#C5A059] transition-all">
                            </div>
                        </div>

                        <!-- Position -->
                        <div class="space-y-1.5">
                            <label for="position" class="block text-xs font-semibold uppercase tracking-wider text-[#D6C8B4]">
                                Atelier Role / Title <span class="text-rose-600">*</span>
                            </label>
                            <div class="relative">
                                <i class="ri-briefcase-line absolute left-4 top-1/2 -translate-y-1/2 text-stone-400 text-base"></i>
                                <input type="text" id="position" name="position" required value="<?= htmlspecialchars($_POST['position'] ?? '') ?>" placeholder="e.g. Master Wood Joiner" class="w-full pl-11 pr-4 py-3 bg-[#0D0B09] border border-[#2A231C] rounded-xl text-[#FAF6EE] text-sm placeholder-[#8C7D6B] focus:outline-none focus:ring-2 focus:ring-[#C5A059] focus:border-[#C5A059] transition-all">
                            </div>
                        </div>

                        <!-- Portrait Upload Dropzone -->
                        <div class="space-y-1.5">
                            <label class="block text-xs font-semibold uppercase tracking-wider text-[#D6C8B4]">
                                Portrait Photograph <span class="text-rose-600">*</span>
                            </label>
                            <div class="border-2 border-dashed border-[#2A231C] rounded-2xl p-6 text-center hover:border-amber-800 transition-colors bg-[#0D0B09]">
                                <div class="max-w-xs mx-auto flex flex-col items-center">
                                    <i class="ri-camera-lens-line text-3xl text-[#C5A059] mb-2"></i>
                                    <span class="text-xs font-medium text-[#D6C8B4]">Upload portrait photograph</span>
                                    <span class="text-[11px] text-stone-400 mt-0.5">JPG or PNG (aspect ratio 4:5 recommended)</span>
                                    <input type="file" id="profile" name="profile" accept="image/*" required data-preview-target="team-preview" class="mt-4 text-xs text-[#8C7D6B] file:mr-3 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-medium file:bg-stone-900 file:text-white hover:file:bg-amber-900 file:cursor-pointer cursor-pointer">
                                </div>
                                <div class="mt-4 flex justify-center">
                                    <img id="team-preview" src="" alt="Portrait preview" class="hidden w-24 h-24 object-cover rounded-full border border-[#2A231C]">
                                </div>
                            </div>
                        </div>

                        <!-- Actions -->
                        <div class="pt-4 border-t border-[#2A231C] flex items-center justify-end gap-3">
                            <a href="team.php" class="px-5 py-3 rounded-xl border border-[#2A231C] text-xs font-medium text-[#D6C8B4] hover:bg-[#0D0B09] transition-colors">
                                Cancel
                            </a>
                            <button type="submit" name="submit" class="px-6 py-3 rounded-xl bg-[#C5A059] hover:bg-[#D4AF37] text-[#0D0B09] text-xs font-semibold transition-colors shadow-xs flex items-center gap-2">
                                <i class="ri-check-line text-base"></i>
                                <span>Save Artisan Profile</span>
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
