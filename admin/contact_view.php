<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Inquiry | FurnishMe Atelier Admin</title>
    <link rel="icon" href="../images/favicon.ico">
    <?php include "components/css.php"; ?>
</head>

<body class="bg-[#FAF8F5] text-stone-900 font-sans antialiased selection:bg-amber-900 selection:text-white">
    <div class="min-h-screen flex">
        <?php include "components/sidebar.php"; ?>

        <div class="lg:pl-64 flex flex-col flex-1 min-w-0">
            <?php include "components/topbar.php"; ?>

            <main class="flex-1 p-4 sm:p-6 lg:p-8 max-w-4xl w-full mx-auto space-y-6">
                
                <!-- Heading & Back Nav -->
                <div class="flex items-center justify-between">
                    <div>
                        <div class="flex items-center gap-2 text-xs text-stone-500 mb-1">
                            <a href="dashboard.php" class="hover:text-stone-900">Dashboard</a>
                            <span>/</span>
                            <a href="contacts.php" class="hover:text-stone-900">Inquiries</a>
                            <span>/</span>
                            <span class="text-stone-800 font-medium">Message #1</span>
                        </div>
                        <h2 class="font-serif text-2xl sm:text-3xl font-medium text-stone-900">Showroom Inquiry Details</h2>
                    </div>
                    <div class="flex items-center gap-2">
                        <a href="contacts.php" class="px-4 py-2 rounded-xl border border-stone-200 text-xs font-medium text-stone-700 hover:bg-white transition-colors">
                            Back
                        </a>
                        <a href="contact_delete.php?id=1" class="px-4 py-2 rounded-xl border border-rose-200 text-xs font-medium text-rose-600 hover:bg-rose-50 transition-colors flex items-center gap-1">
                            <i class="ri-delete-bin-line"></i> Delete
                        </a>
                    </div>
                </div>

                <!-- Inquiry Card -->
                <!-- [PHP_BACKEND_HOOK: Single contact message query (SELECT * FROM contacts WHERE id = :id)] -->
                <div class="bg-white rounded-3xl border border-stone-200/90 p-6 sm:p-10 shadow-xs space-y-8">
                    
                    <!-- Metadata Grid -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 p-5 rounded-2xl bg-stone-50 border border-stone-200/80 text-xs">
                        <div>
                            <span class="text-stone-400 block mb-0.5">Sender Name</span>
                            <strong class="text-stone-900 text-sm block">Aung Min</strong>
                        </div>
                        <div>
                            <span class="text-stone-400 block mb-0.5">Phone / Viber</span>
                            <a href="tel:09973383719" class="text-stone-800 hover:underline font-mono block">09973383719</a>
                        </div>
                        <div>
                            <span class="text-stone-400 block mb-0.5">Email Address</span>
                            <a href="mailto:aungmin@gmail.com" class="text-stone-800 hover:underline font-mono block">aungmin@gmail.com</a>
                        </div>
                        <div>
                            <span class="text-stone-400 block mb-0.5">Received Date</span>
                            <span class="text-stone-700 block">2026-11-04 14:30</span>
                        </div>
                    </div>

                    <!-- Message Content -->
                    <div class="space-y-3">
                        <span class="text-xs uppercase tracking-widest text-amber-800 font-semibold block">Message Body</span>
                        <div class="p-6 rounded-2xl bg-[#F4EFE8]/50 border border-stone-200/80 text-stone-800 text-sm leading-relaxed">
                            <p>
                                Hello, I would like to know more about your modern sofa collection and delivery options in Yangon. We are currently finishing an architectural residence in Yankin and looking for 2 living room modular lounge chairs and an oak dining set. Please contact me with availability and wood finishes. Thank you.
                            </p>
                        </div>
                    </div>

                    <!-- Response Actions -->
                    <div class="pt-6 border-t border-stone-100 flex flex-wrap items-center justify-between gap-4">
                        <span class="text-xs text-stone-400">Status: <strong class="text-amber-800">Requires Follow-up</strong></span>
                        <div class="flex items-center gap-3">
                            <a href="mailto:aungmin@gmail.com?subject=Regarding%20Your%20FurnishMe%20Showroom%20Inquiry" class="px-6 py-2.5 rounded-xl bg-stone-900 hover:bg-amber-900 text-white text-xs font-medium transition-colors shadow-xs flex items-center gap-2">
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
