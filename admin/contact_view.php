<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Inquiry | FurnishMe Atelier Admin</title>
    <link rel="icon" type="image/x-icon" href="../images/favicon.ico?v=2">
    <link rel="icon" type="image/png" sizes="32x32" href="../images/favicon-32x32.png?v=2">
    <link rel="icon" type="image/png" sizes="16x16" href="../images/favicon-16x16.png?v=2">
    <link rel="apple-touch-icon" sizes="180x180" href="../images/apple-touch-icon.png?v=2">
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
                            <span class="text-[#FAF6EE] font-medium">Message #1</span>
                        </div>
                        <h2 class="font-serif text-2xl sm:text-3xl font-medium text-[#FAF6EE]">Showroom Inquiry Details</h2>
                    </div>
                    <div class="flex items-center gap-2">
                        <a href="contacts.php" class="px-4 py-2 rounded-xl border border-[#2A231C] text-xs font-medium text-[#D6C8B4] hover:bg-white transition-colors">
                            Back
                        </a>
                        <a href="contact_delete.php?id=1" class="px-4 py-2 rounded-xl border border-rose-200 text-xs font-medium text-rose-600 hover:bg-rose-50 transition-colors flex items-center gap-1">
                            <i class="ri-delete-bin-line"></i> Delete
                        </a>
                    </div>
                </div>

                <!-- Inquiry Card -->
                <!-- [PHP_BACKEND_HOOK: Single contact message query (SELECT * FROM contacts WHERE id = :id)] -->
                <div class="bg-[#161310] rounded-3xl border border-[#2A231C] p-6 sm:p-10 shadow-xs space-y-8">
                    
                    <!-- Metadata Grid -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 p-5 rounded-2xl bg-[#0D0B09] border border-[#2A231C]/80 text-xs">
                        <div>
                            <span class="text-stone-400 block mb-0.5">Sender Name</span>
                            <strong class="text-[#FAF6EE] text-sm block">Aung Min</strong>
                        </div>
                        <div>
                            <span class="text-stone-400 block mb-0.5">Phone / Viber</span>
                            <a href="tel:09973383719" class="text-[#FAF6EE] hover:underline font-mono block">09973383719</a>
                        </div>
                        <div>
                            <span class="text-stone-400 block mb-0.5">Email Address</span>
                            <a href="mailto:aungmin@gmail.com" class="text-[#FAF6EE] hover:underline font-mono block">aungmin@gmail.com</a>
                        </div>
                        <div>
                            <span class="text-stone-400 block mb-0.5">Received Date</span>
                            <span class="text-[#D6C8B4] block">2026-11-04 14:30</span>
                        </div>
                    </div>

                    <!-- Message Content -->
                    <div class="space-y-3">
                        <span class="text-xs uppercase tracking-widest text-[#C5A059] font-semibold block">Message Body</span>
                        <div class="p-6 rounded-2xl bg-[#1C1814]/50 border border-[#2A231C] text-[#FAF6EE] text-sm leading-relaxed">
                            <p>
                                Hello, I would like to know more about your modern sofa collection and delivery options in Yangon. We are currently finishing an architectural residence in Yankin and looking for 2 living room modular lounge chairs and an oak dining set. Please contact me with availability and wood finishes. Thank you.
                            </p>
                        </div>
                    </div>

                    <!-- Response Actions -->
                    <div class="pt-6 border-t border-[#2A231C] flex flex-wrap items-center justify-between gap-4">
                        <span class="text-xs text-stone-400">Status: <strong class="text-[#C5A059]">Requires Follow-up</strong></span>
                        <div class="flex items-center gap-3">
                            <a href="mailto:aungmin@gmail.com?subject=Regarding%20Your%20FurnishMe%20Showroom%20Inquiry" class="px-6 py-2.5 rounded-xl bg-[#C5A059] hover:bg-[#D4AF37] text-[#0D0B09] font-semibold text-xs font-medium transition-colors shadow-xs flex items-center gap-2">
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
