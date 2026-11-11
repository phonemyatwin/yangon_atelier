<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Team Member | FurnishMe Admin</title>
    <link rel="icon" href="../images/favicon.ico">
    <?php include "components/css.php"; ?>
</head>

<body class="bg-[#FAFAFA] text-zinc-900 font-sans antialiased selection:bg-zinc-900 selection:text-white">
    <div class="min-h-screen flex">
        <?php include "components/sidebar.php"; ?>

        <div class="lg:pl-64 flex flex-col flex-1 min-w-0">
            <?php include "components/topbar.php"; ?>

            <main class="flex-1 p-4 sm:p-6 lg:p-8 max-w-3xl w-full mx-auto space-y-6">
                
                <!-- Heading -->
                <div class="flex items-center justify-between">
                    <div>
                        <div class="flex items-center gap-2 text-xs text-zinc-500 mb-1">
                            <a href="dashboard.php" class="hover:text-zinc-900">Dashboard</a>
                            <span>/</span>
                            <a href="team.php" class="hover:text-zinc-900">Team</a>
                            <span>/</span>
                            <span class="text-zinc-800 font-medium">Add Member</span>
                        </div>
                        <h2 class="font-serif text-2xl sm:text-3xl font-medium text-zinc-900">Add Design Collective Member</h2>
                    </div>
                    <a href="team.php" class="px-4 py-2 rounded-xl border border-zinc-200 text-xs font-medium text-zinc-700 hover:bg-white transition-colors">
                        Cancel &amp; Return
                    </a>
                </div>

                <!-- Form Card -->
                <div class="bg-white rounded-3xl border border-zinc-200 p-6 sm:p-10 shadow-xs">
                    <!-- [PHP_BACKEND_HOOK: Team member creation handler. Method: POST, enctype="multipart/form-data". Upload portrait to images/ directory, sanitize inputs, execute INSERT INTO team (name, position, image)] -->
                    <form method="POST" enctype="multipart/form-data" class="space-y-6">
                        
                        <!-- Name -->
                        <div class="space-y-1.5">
                            <label for="name" class="block text-xs font-semibold uppercase tracking-wider text-zinc-700">
                                Full Name <span class="text-rose-600">*</span>
                            </label>
                            <div class="relative">
                                <i class="ri-user-line absolute left-4 top-1/2 -translate-y-1/2 text-zinc-400 text-base"></i>
                                <input type="text" id="name" name="name" required placeholder="e.g. Thae Nay Nwe Soe" class="w-full pl-11 pr-4 py-3 bg-zinc-50 border border-zinc-200 rounded-xl text-zinc-900 text-sm placeholder-zinc-400 focus:outline-none focus:ring-2 focus:ring-zinc-800 focus:border-zinc-800 transition-all">
                            </div>
                        </div>

                        <!-- Position -->
                        <div class="space-y-1.5">
                            <label for="position" class="block text-xs font-semibold uppercase tracking-wider text-zinc-700">
                                Atelier Role / Title <span class="text-rose-600">*</span>
                            </label>
                            <div class="relative">
                                <i class="ri-briefcase-line absolute left-4 top-1/2 -translate-y-1/2 text-zinc-400 text-base"></i>
                                <input type="text" id="position" name="position" required placeholder="e.g. Master Wood Joiner" class="w-full pl-11 pr-4 py-3 bg-zinc-50 border border-zinc-200 rounded-xl text-zinc-900 text-sm placeholder-zinc-400 focus:outline-none focus:ring-2 focus:ring-zinc-800 focus:border-zinc-800 transition-all">
                            </div>
                        </div>

                        <!-- Portrait Upload Dropzone -->
                        <div class="space-y-1.5">
                            <label class="block text-xs font-semibold uppercase tracking-wider text-zinc-700">
                                Portrait Photograph <span class="text-rose-600">*</span>
                            </label>
                            <div class="border-2 border-dashed border-zinc-200 rounded-2xl p-6 text-center hover:border-zinc-400 transition-colors bg-zinc-50/50">
                                <div class="max-w-xs mx-auto flex flex-col items-center">
                                    <i class="ri-camera-lens-line text-3xl text-zinc-400 mb-2"></i>
                                    <span class="text-xs font-medium text-zinc-700">Upload portrait photograph</span>
                                    <span class="text-[11px] text-zinc-400 mt-0.5">JPG or PNG (aspect ratio 4:5 recommended)</span>
                                    <input type="file" id="profile" name="profile" accept="image/*" required data-preview-target="team-preview" class="mt-4 text-xs text-zinc-500 file:mr-3 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-medium file:bg-zinc-900 file:text-white hover:file:bg-zinc-800 file:cursor-pointer cursor-pointer">
                                </div>
                                <div class="mt-4 flex justify-center">
                                    <img id="team-preview" src="" alt="Portrait preview" class="hidden w-24 h-30 object-cover rounded-xl border border-zinc-200 shadow-xs">
                                </div>
                            </div>
                        </div>

                        <!-- Form Actions -->
                        <div class="pt-4 border-t border-zinc-100 flex items-center justify-end gap-3">
                            <a href="team.php" class="px-5 py-3 rounded-xl border border-zinc-200 text-xs font-medium text-zinc-700 hover:bg-zinc-50 transition-colors">
                                Cancel
                            </a>
                            <button type="submit" name="create" class="px-6 py-3 rounded-xl bg-zinc-900 hover:bg-zinc-800 text-white text-xs font-medium transition-colors shadow-xs flex items-center gap-2">
                                <i class="ri-check-line text-sm"></i>
                                <span>Save Team Member</span>
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
