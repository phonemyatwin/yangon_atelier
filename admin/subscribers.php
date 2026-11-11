<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subscribers | FurnishMe Atelier Admin</title>
    <link rel="icon" type="image/x-icon" href="../images/favicon.ico?v=2">
    <link rel="icon" type="image/png" sizes="32x32" href="../images/favicon-32x32.png?v=2">
    <link rel="icon" type="image/png" sizes="16x16" href="../images/favicon-16x16.png?v=2">
    <link rel="apple-touch-icon" sizes="180x180" href="../images/apple-touch-icon.png?v=2">
    <?php include "components/css.php"; ?>
</head>

<body class="bg-[#FAF8F5] text-stone-900 font-sans antialiased selection:bg-amber-900 selection:text-white">
    <div class="min-h-screen flex">
        <?php include "components/sidebar.php"; ?>

        <div class="lg:pl-64 flex flex-col flex-1 min-w-0">
            <?php include "components/topbar.php"; ?>

            <main class="flex-1 p-4 sm:p-6 lg:p-8 max-w-7xl w-full mx-auto space-y-6">
                
                <!-- Page Header -->
                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                    <div>
                        <div class="flex items-center gap-2 text-xs text-stone-500 mb-1">
                            <a href="dashboard.php" class="hover:text-stone-900">Dashboard</a>
                            <span>/</span>
                            <span class="text-stone-800 font-medium">Subscribers</span>
                        </div>
                        <h2 class="font-serif text-2xl sm:text-3xl font-medium text-stone-900">Journal Newsletter Subscribers</h2>
                    </div>
                </div>

                <!-- Table Card -->
                <div class="bg-white rounded-3xl border border-stone-200/90 overflow-hidden shadow-xs">
                    <div class="p-5 border-b border-stone-100 flex flex-col sm:flex-row sm:items-center justify-between gap-3">
                        <div class="text-xs text-stone-500">
                            Showing verified email subscribers
                        </div>
                        <div class="relative sm:w-64">
                            <i class="ri-search-line absolute left-3 top-1/2 -translate-y-1/2 text-stone-400 text-xs"></i>
                            <input type="text" placeholder="Filter subscribers by email..." class="w-full pl-8 pr-3 py-1.5 bg-stone-50 border border-stone-200 rounded-lg text-xs placeholder-stone-400 focus:outline-none focus:ring-1 focus:ring-amber-900">
                        </div>
                    </div>

                    <!-- [PHP_BACKEND_HOOK: Dynamic subscribers table loop: SELECT * FROM subscribers ORDER BY id DESC. Use foreach($subscribers as $sub) to render: $sub['id'], $sub['email'], $sub['created_at']] -->
                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse text-xs">
                            <thead>
                                <tr class="bg-stone-50/80 border-b border-stone-200/80 text-stone-500 uppercase tracking-wider font-semibold">
                                    <th class="py-3.5 px-6">ID</th>
                                    <th class="py-3.5 px-6">Subscriber Email</th>
                                    <th class="py-3.5 px-6">Subscription Date</th>
                                    <th class="py-3.5 px-6">Status</th>
                                    <th class="py-3.5 px-6 text-right">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-stone-100 text-stone-700 font-medium">
                                
                                <!-- Sub 1 -->
                                <tr class="hover:bg-stone-50/60 transition-colors">
                                    <td class="py-4 px-6 text-stone-400">#1</td>
                                    <td class="py-4 px-6 font-mono text-stone-900 text-xs font-semibold">aungmin@gmail.com</td>
                                    <td class="py-4 px-6 text-stone-500">2026-11-01</td>
                                    <td class="py-4 px-6">
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[11px] font-semibold bg-emerald-50 text-emerald-700 border border-emerald-200">
                                            Subscribed
                                        </span>
                                    </td>
                                    <td class="py-4 px-6 text-right">
                                        <a href="subscriber_delete.php?id=1" class="px-2.5 py-1 rounded-lg border border-rose-200 hover:bg-rose-50 text-rose-600 transition-colors inline-flex items-center gap-1">
                                            <i class="ri-delete-bin-line"></i> Remove
                                        </a>
                                    </td>
                                </tr>

                                <!-- Sub 2 -->
                                <tr class="hover:bg-stone-50/60 transition-colors">
                                    <td class="py-4 px-6 text-stone-400">#2</td>
                                    <td class="py-4 px-6 font-mono text-stone-900 text-xs font-semibold">susu@gmail.com</td>
                                    <td class="py-4 px-6 text-stone-500">2026-11-02</td>
                                    <td class="py-4 px-6">
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[11px] font-semibold bg-emerald-50 text-emerald-700 border border-emerald-200">
                                            Subscribed
                                        </span>
                                    </td>
                                    <td class="py-4 px-6 text-right">
                                        <a href="subscriber_delete.php?id=2" class="px-2.5 py-1 rounded-lg border border-rose-200 hover:bg-rose-50 text-rose-600 transition-colors inline-flex items-center gap-1">
                                            <i class="ri-delete-bin-line"></i> Remove
                                        </a>
                                    </td>
                                </tr>

                                <!-- Sub 3 -->
                                <tr class="hover:bg-stone-50/60 transition-colors">
                                    <td class="py-4 px-6 text-stone-400">#3</td>
                                    <td class="py-4 px-6 font-mono text-stone-900 text-xs font-semibold">koko@gmail.com</td>
                                    <td class="py-4 px-6 text-stone-500">2026-11-03</td>
                                    <td class="py-4 px-6">
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[10px] font-semibold bg-emerald-50 text-emerald-700 border border-emerald-200">
                                            Subscribed
                                        </span>
                                    </td>
                                    <td class="py-4 px-6 text-right">
                                        <a href="subscriber_delete.php?id=3" class="px-2.5 py-1 rounded-lg border border-rose-200 hover:bg-rose-50 text-rose-600 transition-colors inline-flex items-center gap-1">
                                            <i class="ri-delete-bin-line"></i> Remove
                                        </a>
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
