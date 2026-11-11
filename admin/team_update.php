<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Team Member | FurnishMe Admin</title>
    <link rel="icon" type="image/x-icon" href="../images/favicon.ico?v=2">
    <link rel="icon" type="image/png" sizes="32x32" href="../images/favicon-32x32.png?v=2">
    <link rel="icon" type="image/png" sizes="16x16" href="../images/favicon-16x16.png?v=2">
    <link rel="apple-touch-icon" sizes="180x180" href="../images/apple-touch-icon.png?v=2">
    <?php include "components/css.php"; ?>
</head>

<body class="bg-[#F5EFE6] text-stone-900 font-sans antialiased selection:bg-amber-800 selection:text-white">
    <div class="min-h-screen flex">
        <?php include "components/sidebar.php"; ?>

        <div class="lg:pl-64 flex flex-col flex-1 min-w-0">
            <?php include "components/topbar.php"; ?>

            <main class="flex-1 p-4 sm:p-6 lg:p-8 max-w-3xl w-full mx-auto space-y-6">
                
                <!-- Heading -->
                <div class="flex items-center justify-between">
                    <div>
                        <div class="flex items-center gap-2 text-xs text-stone-500 mb-1">
                            <a href="dashboard.php" class="hover:text-stone-900">Dashboard</a>
                            <span>/</span>
                            <a href="team.php" class="hover:text-stone-900">Team</a>
                            <span>/</span>
                            <span class="text-stone-800 font-medium">Edit Member</span>
                        </div>
                        <h2 class="font-serif text-2xl sm:text-3xl font-medium text-stone-900">Edit Team Member</h2>
                    </div>
                    <a href="team.php" class="px-4 py-2 rounded-xl border border-[#E2D8C9] text-xs font-medium text-stone-700 hover:bg-white transition-colors">
                        Back to List
                    </a>
                </div>

                <!-- Form Card -->
                <div class="bg-[#FCFAF7] rounded-3xl border border-[#E2D8C9] p-6 sm:p-10 shadow-xs">
                    <!-- [PHP_BACKEND_HOOK: Team update handler. Method: POST, enctype="multipart/form-data". Optional portrait upload, UPDATE team SET name = :name, position = :position WHERE id = :id] -->
                    <form method="POST" enctype="multipart/form-data" class="space-y-6">
                        <input type="hidden" name="id" value="1">

                        <!-- Name -->
                        <div class="space-y-1.5">
                            <label for="name" class="block text-xs font-semibold uppercase tracking-wider text-stone-700">
                                Full Name <span class="text-rose-600">*</span>
                            </label>
                            <div class="relative">
                                <i class="ri-user-line absolute left-4 top-1/2 -translate-y-1/2 text-stone-400 text-base"></i>
                                <input type="text" id="name" name="name" required value="Phone Myat Win" class="w-full pl-11 pr-4 py-3 bg-[#F5EFE6] border border-[#E2D8C9] rounded-xl text-stone-900 text-sm placeholder-stone-400 focus:outline-none focus:ring-2 focus:ring-[#7C4E26] focus:border-amber-900 transition-all">
                            </div>
                        </div>

                        <!-- Position -->
                        <div class="space-y-1.5">
                            <label for="position" class="block text-xs font-semibold uppercase tracking-wider text-stone-700">
                                Atelier Role / Title <span class="text-rose-600">*</span>
                            </label>
                            <div class="relative">
                                <i class="ri-briefcase-line absolute left-4 top-1/2 -translate-y-1/2 text-stone-400 text-base"></i>
                                <input type="text" id="position" name="position" required value="Principal Architect &amp; Founder" class="w-full pl-11 pr-4 py-3 bg-[#F5EFE6] border border-[#E2D8C9] rounded-xl text-stone-900 text-sm placeholder-stone-400 focus:outline-none focus:ring-2 focus:ring-[#7C4E26] focus:border-amber-900 transition-all">
                            </div>
                        </div>

                        <!-- Current Image & Replace -->
                        <div class="space-y-1.5">
                            <label class="block text-xs font-semibold uppercase tracking-wider text-stone-700">
                                Current Portrait &amp; Replacement
                            </label>
                            <div class="flex flex-col sm:flex-row items-center gap-6 p-4 rounded-2xl bg-[#F5EFE6] border border-[#E2D8C9]">
                                <div class="w-20 h-24 rounded-xl bg-[#FCFAF7] border border-[#E2D8C9] overflow-hidden flex-shrink-0">
                                    <!-- [PHP_BACKEND_HOOK: Display current team member portrait] -->
                                    <img id="team-preview" src="../images/team-1.jpg" alt="Current portrait" class="w-full h-full object-cover">
                                </div>
                                <div class="flex-1 space-y-1 text-center sm:text-left">
                                    <span class="text-xs font-medium text-stone-800 block">Replace Portrait (Optional)</span>
                                    <span class="text-[11px] text-stone-400 block">Leave empty to keep the current photograph.</span>
                                    <input type="file" id="profile" name="profile" accept="image/*" data-preview-target="team-preview" class="mt-2 text-xs text-stone-500 file:mr-3 file:py-1.5 file:px-3 file:rounded-lg file:border-0 file:text-xs file:font-medium file:bg-stone-900 file:text-white hover:file:bg-amber-900 file:cursor-pointer cursor-pointer">
                                </div>
                            </div>
                        </div>

                        <!-- Form Actions -->
                        <div class="pt-4 border-t border-[#E2D8C9] flex items-center justify-end gap-3">
                            <a href="team.php" class="px-5 py-3 rounded-xl border border-[#E2D8C9] text-xs font-medium text-stone-700 hover:bg-[#F5EFE6] transition-colors">
                                Cancel
                            </a>
                            <button type="submit" name="update" class="px-6 py-3 rounded-xl bg-[#1A1613] hover:bg-[#7C4E26] text-[#F7F3EC] text-xs font-medium transition-colors shadow-xs flex items-center gap-2">
                                <i class="ri-save-line text-sm"></i>
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
