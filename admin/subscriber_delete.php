<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Subscriber | FurnishMe Atelier Admin</title>
    <link rel="icon" type="image/x-icon" href="../images/favicon.ico">
    <?php include "components/css.php"; ?>
</head>

<body class="bg-[#0D0B09] text-[#EDE4D7] font-sans antialiased selection:bg-[#C5A059] selection:text-[#0D0B09]">
    <div class="min-h-screen flex">
        <?php include "components/sidebar.php"; ?>

        <div class="lg:pl-64 flex flex-col flex-1 min-w-0">
            <?php include "components/topbar.php"; ?>

            <main class="flex-1 p-4 sm:p-6 lg:p-8 max-w-3xl w-full mx-auto space-y-6">
                
                <!-- Heading -->
                <div class="flex items-center justify-between">
                    <div>
                        <div class="flex items-center gap-2 text-xs text-[#8C7D6B] mb-1">
                            <a href="dashboard.php" class="hover:text-[#FAF6EE]">Dashboard</a>
                            <span>/</span>
                            <a href="subscribers.php" class="hover:text-[#FAF6EE]">Subscribers</a>
                            <span>/</span>
                            <span class="text-rose-600 font-medium">Delete</span>
                        </div>
                        <h2 class="font-serif text-2xl sm:text-3xl font-medium text-[#FAF6EE]">Confirm Subscriber Removal</h2>
                    </div>
                    <a href="subscribers.php" class="px-4 py-2 rounded-xl border border-[#2A231C] text-xs font-medium text-[#D6C8B4] hover:bg-white transition-colors">
                        Cancel
                    </a>
                </div>

                <!-- Confirmation Card -->
                <div class="bg-white rounded-3xl border border-rose-200 p-6 sm:p-10 shadow-xs">
                    <div class="flex items-start gap-4 p-4 rounded-2xl bg-rose-50 border border-rose-100 mb-6">
                        <i class="ri-error-warning-line text-2xl text-rose-600 flex-shrink-0 mt-0.5"></i>
                        <div>
                            <h3 class="text-sm font-semibold text-rose-900">Remove Newsletter Subscriber</h3>
                            <p class="text-xs text-rose-700 mt-1 leading-relaxed">
                                Are you sure you wish to unsubscribe this email address? They will no longer receive journal digests or studio release announcements.
                            </p>
                        </div>
                    </div>

                    <!-- Subscriber Details Summary -->
                    <!-- [PHP_BACKEND_HOOK: Query subscriber by ID for deletion confirmation (SELECT * FROM subscribers WHERE id = :id)] -->
                    <div class="border border-[#2A231C] rounded-2xl p-5 mb-8 space-y-2 text-xs">
                        <div class="flex items-center justify-between border-b border-[#2A231C] pb-2">
                            <span class="text-stone-400 font-mono">Subscriber #1</span>
                            <span class="text-stone-400">Subscribed on 2026-11-01</span>
                        </div>
                        <h4 class="font-mono font-semibold text-[#FAF6EE] text-sm">aungmin@gmail.com</h4>
                    </div>

                    <!-- [PHP_BACKEND_HOOK: Subscriber deletion handler. POST method, execute DELETE FROM subscribers WHERE id = :id] -->
                    <form method="POST" class="flex items-center justify-end gap-3 pt-4 border-t border-[#2A231C]">
                        <input type="hidden" name="id" value="1">
                        <a href="subscribers.php" class="px-5 py-2.5 rounded-xl border border-[#2A231C] text-xs font-medium text-[#D6C8B4] hover:bg-[#0D0B09] transition-colors">
                            Cancel
                        </a>
                        <button type="submit" name="delete" class="px-5 py-2.5 rounded-xl bg-rose-600 hover:bg-rose-700 text-white text-xs font-medium transition-colors shadow-xs flex items-center gap-2">
                            <i class="ri-delete-bin-line text-sm"></i>
                            <span>Confirm &amp; Remove Subscriber</span>
                        </button>
                    </form>
                </div>

            </main>

            <?php include "components/footer.php"; ?>
        </div>
    </div>

    <?php include "components/js.php"; ?>
</body>

</html>
