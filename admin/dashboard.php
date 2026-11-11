<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard | FurnishMe Atelier</title>
    <link rel="icon" href="../images/favicon.ico">
    <?php include "components/css.php"; ?>
</head>

<body class="bg-[#FAFAFA] text-zinc-900 font-sans antialiased selection:bg-zinc-900 selection:text-white">
    <div class="min-h-screen flex">
        <!-- Sidebar Navigation -->
        <?php include "components/sidebar.php"; ?>

        <!-- Main Content Area -->
        <div class="lg:pl-64 flex flex-col flex-1 min-w-0">
            <?php include "components/topbar.php"; ?>

            <main class="flex-1 p-4 sm:p-6 lg:p-8 max-w-7xl w-full mx-auto space-y-8">
                
                <!-- Welcome Banner -->
                <div class="bg-white rounded-3xl border border-zinc-200 p-6 sm:p-8 shadow-xs flex flex-col sm:flex-row sm:items-center justify-between gap-6">
                    <div>
                        <span class="text-xs uppercase tracking-[0.2em] text-zinc-400 font-semibold block mb-1">Executive Overview</span>
                        <h2 class="font-serif text-2xl sm:text-3xl font-medium text-zinc-900">Welcome to Atelier Control</h2>
                        <p class="text-xs sm:text-sm text-zinc-500 mt-1">Here is a summary of your inventory, active clients, and editorial performance.</p>
                    </div>
                    <div class="flex items-center gap-3">
                        <a href="product_create.php" class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl bg-zinc-900 hover:bg-zinc-800 text-white text-xs font-medium transition-colors shadow-xs">
                            <i class="ri-add-line text-sm"></i>
                            <span>New Product</span>
                        </a>
                        <a href="blog_create.php" class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl border border-zinc-200 hover:bg-zinc-50 text-zinc-700 text-xs font-medium transition-colors">
                            <i class="ri-edit-line text-sm"></i>
                            <span>New Journal Post</span>
                        </a>
                    </div>
                </div>

                <!-- KPI METRICS GRID -->
                <!-- [PHP_BACKEND_HOOK: Aggregate count queries (e.g. SELECT count(*) FROM products, users, blogs, team, contacts, subscribers)] -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-6 gap-4 sm:gap-6">
                    <!-- KPI 1: Products -->
                    <div class="bg-white rounded-2xl border border-zinc-200 p-5 shadow-xs flex flex-col justify-between hover:border-zinc-300 transition-colors">
                        <div class="flex items-center justify-between">
                            <span class="text-xs font-medium text-zinc-500">Products</span>
                            <div class="w-8 h-8 rounded-lg bg-zinc-100 text-zinc-700 flex items-center justify-center">
                                <i class="ri-shopping-bag-3-line text-sm"></i>
                            </div>
                        </div>
                        <div class="mt-4">
                            <strong class="font-serif text-2xl font-semibold text-zinc-900 block leading-tight">8</strong>
                            <span class="text-[11px] text-emerald-600 font-medium inline-flex items-center gap-0.5 mt-1">
                                <i class="ri-arrow-up-line"></i> +2 this month
                            </span>
                        </div>
                    </div>

                    <!-- KPI 2: Users -->
                    <div class="bg-white rounded-2xl border border-zinc-200 p-5 shadow-xs flex flex-col justify-between hover:border-zinc-300 transition-colors">
                        <div class="flex items-center justify-between">
                            <span class="text-xs font-medium text-zinc-500">Active Clients</span>
                            <div class="w-8 h-8 rounded-lg bg-zinc-100 text-zinc-700 flex items-center justify-center">
                                <i class="ri-user-3-line text-sm"></i>
                            </div>
                        </div>
                        <div class="mt-4">
                            <strong class="font-serif text-2xl font-semibold text-zinc-900 block leading-tight">142</strong>
                            <span class="text-[11px] text-emerald-600 font-medium inline-flex items-center gap-0.5 mt-1">
                                <i class="ri-arrow-up-line"></i> +12% growth
                            </span>
                        </div>
                    </div>

                    <!-- KPI 3: Journal Posts -->
                    <div class="bg-white rounded-2xl border border-zinc-200 p-5 shadow-xs flex flex-col justify-between hover:border-zinc-300 transition-colors">
                        <div class="flex items-center justify-between">
                            <span class="text-xs font-medium text-zinc-500">Journal Posts</span>
                            <div class="w-8 h-8 rounded-lg bg-zinc-100 text-zinc-700 flex items-center justify-center">
                                <i class="ri-article-line text-sm"></i>
                            </div>
                        </div>
                        <div class="mt-4">
                            <strong class="font-serif text-2xl font-semibold text-zinc-900 block leading-tight">6</strong>
                            <span class="text-[11px] text-zinc-400 font-medium inline-flex items-center gap-0.5 mt-1">
                                Editorial active
                            </span>
                        </div>
                    </div>

                    <!-- KPI 4: Artisans & Team -->
                    <div class="bg-white rounded-2xl border border-zinc-200 p-5 shadow-xs flex flex-col justify-between hover:border-zinc-300 transition-colors">
                        <div class="flex items-center justify-between">
                            <span class="text-xs font-medium text-zinc-500">Design Team</span>
                            <div class="w-8 h-8 rounded-lg bg-zinc-100 text-zinc-700 flex items-center justify-center">
                                <i class="ri-team-line text-sm"></i>
                            </div>
                        </div>
                        <div class="mt-4">
                            <strong class="font-serif text-2xl font-semibold text-zinc-900 block leading-tight">6</strong>
                            <span class="text-[11px] text-zinc-400 font-medium inline-flex items-center gap-0.5 mt-1">
                                Staff members
                            </span>
                        </div>
                    </div>

                    <!-- KPI 5: Inquiries -->
                    <div class="bg-white rounded-2xl border border-zinc-200 p-5 shadow-xs flex flex-col justify-between hover:border-zinc-300 transition-colors">
                        <div class="flex items-center justify-between">
                            <span class="text-xs font-medium text-zinc-500">Inquiries</span>
                            <div class="w-8 h-8 rounded-lg bg-amber-50 text-amber-800 flex items-center justify-center">
                                <i class="ri-mail-line text-sm"></i>
                            </div>
                        </div>
                        <div class="mt-4">
                            <strong class="font-serif text-2xl font-semibold text-zinc-900 block leading-tight">3</strong>
                            <span class="text-[11px] text-amber-700 font-medium inline-flex items-center gap-0.5 mt-1">
                                Needs follow-up
                            </span>
                        </div>
                    </div>

                    <!-- KPI 6: Subscribers -->
                    <div class="bg-white rounded-2xl border border-zinc-200 p-5 shadow-xs flex flex-col justify-between hover:border-zinc-300 transition-colors">
                        <div class="flex items-center justify-between">
                            <span class="text-xs font-medium text-zinc-500">Subscribers</span>
                            <div class="w-8 h-8 rounded-lg bg-zinc-100 text-zinc-700 flex items-center justify-center">
                                <i class="ri-mail-add-line text-sm"></i>
                            </div>
                        </div>
                        <div class="mt-4">
                            <strong class="font-serif text-2xl font-semibold text-zinc-900 block leading-tight">384</strong>
                            <span class="text-[11px] text-emerald-600 font-medium inline-flex items-center gap-0.5 mt-1">
                                <i class="ri-arrow-up-line"></i> +18 this week
                            </span>
                        </div>
                    </div>
                </div>

                <!-- RECENT INQUIRIES & ACTIONS TABLE -->
                <div class="bg-white rounded-3xl border border-zinc-200 overflow-hidden shadow-xs">
                    <div class="p-6 border-b border-zinc-100 flex items-center justify-between">
                        <div>
                            <h3 class="font-serif text-lg font-medium text-zinc-900">Recent Showroom Inquiries</h3>
                            <p class="text-xs text-zinc-500 mt-0.5">Direct messages received from the storefront contact form.</p>
                        </div>
                        <a href="contacts.php" class="text-xs font-semibold text-zinc-800 hover:text-zinc-600 transition-colors flex items-center gap-1">
                            <span>View All Inquiries</span>
                            <i class="ri-arrow-right-line"></i>
                        </a>
                    </div>

                    <!-- [PHP_BACKEND_HOOK: Dynamic recent inquiries query (SELECT * FROM contacts ORDER BY id DESC LIMIT 5)] -->
                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse text-xs">
                            <thead>
                                <tr class="bg-zinc-50/80 border-b border-zinc-200/80 text-zinc-500 uppercase tracking-wider font-semibold">
                                    <th class="py-3 px-6">ID</th>
                                    <th class="py-3 px-6">Client Name</th>
                                    <th class="py-3 px-6">Email Address</th>
                                    <th class="py-3 px-6">Phone Number</th>
                                    <th class="py-3 px-6">Status</th>
                                    <th class="py-3 px-6 text-right">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-zinc-100 text-zinc-700 font-medium">
                                <tr class="hover:bg-zinc-50/60 transition-colors">
                                    <td class="py-4 px-6 text-zinc-400">#1</td>
                                    <td class="py-4 px-6 font-semibold text-zinc-900">Aung Min</td>
                                    <td class="py-4 px-6 text-zinc-600">aungmin@gmail.com</td>
                                    <td class="py-4 px-6 text-zinc-600">09123456789</td>
                                    <td class="py-4 px-6">
                                        <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-semibold bg-amber-50 text-amber-700 border border-amber-200">
                                             Pending Review
                                        </span>
                                    </td>
                                    <td class="py-4 px-6 text-right">
                                        <div class="inline-flex items-center gap-2">
                                            <a href="contact_view.php?id=1" class="px-2.5 py-1 rounded-lg border border-zinc-200 hover:bg-zinc-100 text-zinc-700 transition-colors">
                                                View
                                            </a>
                                            <a href="contact_delete.php?id=1" class="px-2.5 py-1 rounded-lg border border-rose-200 hover:bg-rose-50 text-rose-600 transition-colors">
                                                Delete
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="hover:bg-zinc-50/60 transition-colors">
                                    <td class="py-4 px-6 text-zinc-400">#2</td>
                                    <td class="py-4 px-6 font-semibold text-zinc-900">Su Su</td>
                                    <td class="py-4 px-6 text-zinc-600">susu@gmail.com</td>
                                    <td class="py-4 px-6 text-zinc-600">09987654321</td>
                                    <td class="py-4 px-6">
                                        <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-semibold bg-emerald-50 text-emerald-700 border border-emerald-200">
                                            Followed Up
                                        </span>
                                    </td>
                                    <td class="py-4 px-6 text-right">
                                        <div class="inline-flex items-center gap-2">
                                            <a href="contact_view.php?id=2" class="px-2.5 py-1 rounded-lg border border-zinc-200 hover:bg-zinc-100 text-zinc-700 transition-colors">
                                                View
                                            </a>
                                            <a href="contact_delete.php?id=2" class="px-2.5 py-1 rounded-lg border border-rose-200 hover:bg-rose-50 text-rose-600 transition-colors">
                                                Delete
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="hover:bg-zinc-50/60 transition-colors">
                                    <td class="py-4 px-6 text-zinc-400">#3</td>
                                    <td class="py-4 px-6 font-semibold text-zinc-900">Ko Ko</td>
                                    <td class="py-4 px-6 text-zinc-600">koko@gmail.com</td>
                                    <td class="py-4 px-6 text-zinc-600">09456123789</td>
                                    <td class="py-4 px-6">
                                        <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-semibold bg-zinc-100 text-zinc-600">
                                            Archived
                                        </span>
                                    </td>
                                    <td class="py-4 px-6 text-right">
                                        <div class="inline-flex items-center gap-2">
                                            <a href="contact_view.php?id=3" class="px-2.5 py-1 rounded-lg border border-zinc-200 hover:bg-zinc-100 text-zinc-700 transition-colors">
                                                View
                                            </a>
                                            <a href="contact_delete.php?id=3" class="px-2.5 py-1 rounded-lg border border-rose-200 hover:bg-rose-50 text-rose-600 transition-colors">
                                                Delete
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
