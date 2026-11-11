<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inquiries &amp; Messages | FurnishMe Atelier Admin</title>
    <link rel="icon" href="../images/favicon.ico">
    <?php include "components/css.php"; ?>
</head>

<body class="bg-[#FAFAFA] text-zinc-900 font-sans antialiased selection:bg-zinc-900 selection:text-white">
    <div class="min-h-screen flex">
        <?php include "components/sidebar.php"; ?>

        <div class="lg:pl-64 flex flex-col flex-1 min-w-0">
            <?php include "components/topbar.php"; ?>

            <main class="flex-1 p-4 sm:p-6 lg:p-8 max-w-7xl w-full mx-auto space-y-6">
                
                <!-- Page Header -->
                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                    <div>
                        <div class="flex items-center gap-2 text-xs text-zinc-500 mb-1">
                            <a href="dashboard.php" class="hover:text-zinc-900">Dashboard</a>
                            <span>/</span>
                            <span class="text-zinc-800 font-medium">Inquiries</span>
                        </div>
                        <h2 class="font-serif text-2xl sm:text-3xl font-medium text-zinc-900">Showroom Inquiries &amp; Messages</h2>
                    </div>
                </div>

                <!-- Table Card -->
                <div class="bg-white rounded-3xl border border-zinc-200 overflow-hidden shadow-xs">
                    <div class="p-5 border-b border-zinc-100 flex flex-col sm:flex-row sm:items-center justify-between gap-3">
                        <div class="text-xs text-zinc-500">
                            Showing customer messages from website contact form
                        </div>
                        <div class="relative sm:w-64">
                            <i class="ri-search-line absolute left-3 top-1/2 -translate-y-1/2 text-zinc-400 text-xs"></i>
                            <input type="text" placeholder="Filter messages..." class="w-full pl-8 pr-3 py-1.5 bg-zinc-50 border border-zinc-200 rounded-lg text-xs placeholder-zinc-400 focus:outline-none focus:ring-1 focus:ring-zinc-800">
                        </div>
                    </div>

                    <!-- [PHP_BACKEND_HOOK: Dynamic contacts table loop: SELECT * FROM contacts ORDER BY id DESC. Use foreach($contacts as $contact) to render: $contact['id'], $contact['name'], $contact['email'], $contact['number'], $contact['created_at']] -->
                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse text-xs">
                            <thead>
                                <tr class="bg-zinc-50/80 border-b border-zinc-200/80 text-zinc-500 uppercase tracking-wider font-semibold">
                                    <th class="py-3.5 px-6">ID</th>
                                    <th class="py-3.5 px-6">Client Name</th>
                                    <th class="py-3.5 px-6">Email Address</th>
                                    <th class="py-3.5 px-6">Phone Number</th>
                                    <th class="py-3.5 px-6">Status</th>
                                    <th class="py-3.5 px-6 text-right">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-zinc-100 text-zinc-700 font-medium">
                                
                                <!-- Contact 1 -->
                                <tr class="hover:bg-zinc-50/60 transition-colors">
                                    <td class="py-4 px-6 text-zinc-400">#1</td>
                                    <td class="py-4 px-6 font-semibold text-zinc-900 text-sm">Aung Min</td>
                                    <td class="py-4 px-6 text-zinc-600 font-mono text-xs">aungmin@gmail.com</td>
                                    <td class="py-4 px-6 text-zinc-600">09973383719</td>
                                    <td class="py-4 px-6">
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[10px] font-semibold bg-amber-50 text-amber-700 border border-amber-200">
                                            New Message
                                        </span>
                                    </td>
                                    <td class="py-4 px-6 text-right">
                                        <div class="inline-flex items-center gap-2">
                                            <a href="contact_view.php?id=1" class="px-2.5 py-1 rounded-lg border border-zinc-200 hover:bg-zinc-100 text-zinc-700 transition-colors flex items-center gap-1">
                                                <i class="ri-eye-line"></i> View
                                            </a>
                                            <a href="contact_delete.php?id=1" class="px-2.5 py-1 rounded-lg border border-rose-200 hover:bg-rose-50 text-rose-600 transition-colors flex items-center gap-1">
                                                <i class="ri-delete-bin-line"></i> Delete
                                            </a>
                                        </div>
                                    </td>
                                </tr>

                                <!-- Contact 2 -->
                                <tr class="hover:bg-zinc-50/60 transition-colors">
                                    <td class="py-4 px-6 text-zinc-400">#2</td>
                                    <td class="py-4 px-6 font-semibold text-zinc-900 text-sm">Su Su</td>
                                    <td class="py-4 px-6 text-zinc-600 font-mono text-xs">susu@gmail.com</td>
                                    <td class="py-4 px-6 text-zinc-600">09421122846</td>
                                    <td class="py-4 px-6">
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[10px] font-semibold bg-emerald-50 text-emerald-700 border border-emerald-200">
                                            Followed Up
                                        </span>
                                    </td>
                                    <td class="py-4 px-6 text-right">
                                        <div class="inline-flex items-center gap-2">
                                            <a href="contact_view.php?id=2" class="px-2.5 py-1 rounded-lg border border-zinc-200 hover:bg-zinc-100 text-zinc-700 transition-colors flex items-center gap-1">
                                                <i class="ri-eye-line"></i> View
                                            </a>
                                            <a href="contact_delete.php?id=2" class="px-2.5 py-1 rounded-lg border border-rose-200 hover:bg-rose-50 text-rose-600 transition-colors flex items-center gap-1">
                                                <i class="ri-delete-bin-line"></i> Delete
                                            </a>
                                        </div>
                                    </td>
                                </tr>

                                <!-- Contact 3 -->
                                <tr class="hover:bg-zinc-50/60 transition-colors">
                                    <td class="py-4 px-6 text-zinc-400">#3</td>
                                    <td class="py-4 px-6 font-semibold text-zinc-900 text-sm">Ko Ko</td>
                                    <td class="py-4 px-6 text-zinc-600 font-mono text-xs">koko@gmail.com</td>
                                    <td class="py-4 px-6 text-zinc-600">09456123789</td>
                                    <td class="py-4 px-6">
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[10px] font-semibold bg-zinc-100 text-zinc-600">
                                            Archived
                                        </span>
                                    </td>
                                    <td class="py-4 px-6 text-right">
                                        <div class="inline-flex items-center gap-2">
                                            <a href="contact_view.php?id=3" class="px-2.5 py-1 rounded-lg border border-zinc-200 hover:bg-zinc-100 text-zinc-700 transition-colors flex items-center gap-1">
                                                <i class="ri-eye-line"></i> View
                                            </a>
                                            <a href="contact_delete.php?id=3" class="px-2.5 py-1 rounded-lg border border-rose-200 hover:bg-rose-50 text-rose-600 transition-colors flex items-center gap-1">
                                                <i class="ri-delete-bin-line"></i> Delete
                                            </a>
                                        </div>
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>

            </main>

            <?php include "components/footer.php"; ?>
        </div>
    </div>

    <?php include "components/js.php"; ?>
</body>

</html>
