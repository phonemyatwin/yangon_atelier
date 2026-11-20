<?php
// Initialize session
require_once __DIR__ . '/../components/session_start.php';

// Check session
require_once __DIR__ . '/components/session_check.php';

// Connect database
require_once __DIR__ . '/../components/connection.php';

$id = $_GET['id'] ?? '';
if (empty($id) || !filter_var($id, FILTER_VALIDATE_INT)) {
    header('Location: team.php');
    exit;
}

try {
    $sql = 'SELECT * FROM team WHERE id = :id LIMIT 1';
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':id' => $id]);
    $member = $stmt->fetch();
} catch (PDOException $e) {
    error_log('Team member fetch error: ' . $e->getMessage() . "\n", 3, __DIR__ . '/../error.log');
    $_SESSION['error'] = 'Unable to retrieve team member details. Please try again later.';
    header('Location: team.php');
    exit;
}

if (!$member) {
    $_SESSION['error'] = 'Team member not found.';
    header('Location: team.php');
    exit;
}

if ((int)$_SESSION['admin']['id'] !== (int)$member['id']) {
    $_SESSION['error'] = 'You do not have permission to update this team member.';
    header('Location: team.php');
    exit;
}

$errors = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update'])) {
    $name = trim($_POST['name'] ?? $member['name']);
    $position = trim($_POST['position'] ?? $member['position']);
    $old_image = $member['image'];
    $new_image = $_FILES['profile']['name'] ?? '';

    if (empty($name) || empty($position)) {
        $errors['member'] = 'All fields are required. Please complete the form.';
    } else {
        $allowed_extensions = ['jpg', 'jpeg', 'png', 'webp'];
        $extension = strtolower(pathinfo($new_image, PATHINFO_EXTENSION));
        if (!in_array($extension, $allowed_extensions)) {
            $errors['extension'] = 'Only JPG, JPEG, PNG, and WEBP image files are allowed.';
        } elseif (!isset($_FILES['profile']) && $_FILES['profile']['error'] !== UPLOAD_ERR_OK) {
            $errors['image'] = 'An error occurred while uploading the image.';
        }
    }

    if (empty($errors)) {
        try {
            if (!empty($new_image)) {
                $image = time() . '_' . $new_image ?? '';
                if (!move_uploaded_file($_FILES['profile']['tmp_name'], __DIR__ . '/../media/' . $image)) {
                    $errors['image'] = 'Failed to upload the image. Please check directory permission.';
                } else if (!empty($old_image) && file_exists(__DIR__ . '/../media' . $old_image)) {
                    unlink(__DIR__ . '/../media' . $old_image);
                }
            } else {
                $image = $old_image;
            }

            if (empty($errors)) {
                $sql = 'UPDATE team SET name = :name, position = :position, image = :image WHERE id = :id';
                $stmt = $pdo->prepare($sql);
                $stmt->execute([
                    ':id' => $member['id'],
                    ':name' => $name,
                    ':position' => $position,
                    ':image' => $image
                ]);

                $_SESSION['success'] = 'Team member updated successfully.';
                header('Location: team.php');
                exit;
            }
        } catch (PDOException $e) {
            error_log('Team member update error: ' . $e->getMessage() . "\n", 3, __DIR__ . '/../error.log');
            $errors['update'] = 'Unable to update team member at this moment. Please try again later.';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Team Member | Yangon Atelier Admin</title>
    <link rel="icon" type="image/x-icon" href="../images/favicon/favicon.ico">
    <?php include "components/css.php"; ?>
</head>

<body class="bg-[#EDE8E0] text-[#362F2A] font-sans antialiased selection:bg-[#8A5A44] selection:text-[#F6F3EE]">
    <div class="min-h-screen flex">
        <?php include "components/sidebar.php"; ?>

        <div class="lg:pl-64 flex flex-col flex-1 min-w-0">
            <?php include "components/topbar.php"; ?>

            <main class="flex-1 p-4 sm:p-6 lg:p-8 max-w-4xl w-full mx-auto space-y-6">

                <!-- Heading -->
                <div class="flex items-center justify-between">
                    <div>
                        <div class="flex items-center gap-2 text-xs text-[#6E6359] mb-1">
                            <a href="dashboard.php" class="hover:text-[#362F2A] transition-colors">Dashboard</a>
                            <span>/</span>
                            <a href="team.php" class="hover:text-[#362F2A] transition-colors">Team</a>
                            <span>/</span>
                            <span class="text-[#362F2A] font-medium">Edit Member</span>
                        </div>
                        <h2 class="font-serif text-2xl sm:text-3xl font-medium text-[#362F2A]">Edit Collective Profile</h2>
                    </div>
                    <a href="team.php" class="px-4 py-2 rounded-xl border border-[#C9C0B3] bg-[#DFD8CD] hover:bg-[#D5CDC1] text-xs font-semibold text-[#362F2A] transition-colors">
                        Back to List
                    </a>
                </div>

                <!-- Form Card in Raw Linen (#F6F3EE) -->
                <div class="bg-[#F6F3EE] rounded-3xl border border-[#C9C0B3] p-6 sm:p-10 shadow-xs">
                    <form action="" method="POST" enctype="multipart/form-data" class="space-y-6">
                        <!-- Name -->
                        <div class="space-y-1.5">
                            <label for="name" class="block text-xs font-semibold uppercase tracking-wider text-[#6E6359]">
                                Full Name <span class="text-[#8C3B3B]">*</span>
                            </label>
                            <div class="relative">
                                <i class="ri-user-line absolute left-4 top-1/2 -translate-y-1/2 text-[#6E6359] text-base"></i>
                                <input type="text" id="name" name="name" value="<?= htmlspecialchars($member['name']); ?>" class="w-full pl-11 pr-4 py-3 bg-[#EDE8E0] border border-[#C9C0B3] rounded-xl text-[#362F2A] text-sm placeholder-[#6E6359] focus:outline-none focus:ring-1 focus:ring-[#8A5A44] focus:border-[#8A5A44] transition-all">
                            </div>
                        </div>

                        <!-- Position -->
                        <div class="space-y-1.5">
                            <label for="position" class="block text-xs font-semibold uppercase tracking-wider text-[#6E6359]">
                                Atelier Role / Title <span class="text-[#8C3B3B]">*</span>
                            </label>
                            <div class="relative">
                                <i class="ri-briefcase-line absolute left-4 top-1/2 -translate-y-1/2 text-[#6E6359] text-base"></i>
                                <input type="text" id="position" name="position" value="<?= htmlspecialchars($member['position']); ?>" class="w-full pl-11 pr-4 py-3 bg-[#EDE8E0] border border-[#C9C0B3] rounded-xl text-[#362F2A] text-sm placeholder-[#6E6359] focus:outline-none focus:ring-1 focus:ring-[#8A5A44] focus:border-[#8A5A44] transition-all">
                            </div>
                        </div>

                        <!-- Current Image & Replace -->
                        <div class="space-y-1.5">
                            <label class="block text-xs font-semibold uppercase tracking-wider text-[#6E6359]">
                                Current Portrait &amp; Replacement
                            </label>
                            <div class="flex flex-col sm:flex-row items-center gap-6 p-4 rounded-2xl bg-[#EDE8E0] border border-[#C9C0B3]">
                                <div class="w-20 h-24 rounded-xl bg-[#F6F3EE] border border-[#C9C0B3] overflow-hidden flex-shrink-0">
                                    <img id="team-preview" src="../media/<?= htmlspecialchars($member['image']); ?>" alt="<?= htmlspecialchars($member['name']); ?>" class="w-full h-full object-cover">
                                </div>
                                <div class="flex-1 space-y-1 text-center sm:text-left">
                                    <span class="text-xs font-semibold text-[#362F2A] block">Replace Portrait (Optional)</span>
                                    <span class="text-[11px] text-[#6E6359] block">Leave empty to keep current image.</span>
                                    <input type="file" id="profile" name="profile" accept="image/*" data-preview-target="team-preview" class="mt-2 text-xs text-[#6E6359] file:mr-3 file:py-1.5 file:px-3 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-[#DFD8CD] file:text-[#362F2A] hover:file:bg-[#C9C0B3] file:cursor-pointer cursor-pointer">
                                </div>
                            </div>
                        </div>

                        <!-- Actions -->
                        <div class="pt-4 border-t border-[#C9C0B3] flex items-center justify-end gap-3">
                            <a href="team.php" class="px-5 py-3 rounded-xl border border-[#C9C0B3] bg-[#DFD8CD] hover:bg-[#D5CDC1] text-xs font-semibold text-[#362F2A] transition-colors">
                                Cancel
                            </a>
                            <button type="submit" name="update" class="px-6 py-3 rounded-xl bg-[#8A5A44] hover:bg-[#704735] text-[#F6F3EE] text-xs font-semibold transition-colors shadow-xs flex items-center gap-2">
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

    <script src="js/script.js"></script>
    <script src="../js/script.js"></script>
    <?php if (!empty($errors)): ?>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                <?php foreach ($errors as $error): ?>
                    showToast(<?= json_encode($error); ?>, 'error');
                <?php endforeach; ?>
            });
        </script>
    <?php endif; ?>
</body>

</html>