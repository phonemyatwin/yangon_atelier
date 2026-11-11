<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Design Collective | FurnishMe Atelier Admin</title>
    <link rel="icon" href="../images/favicon.ico">
    <?php include "components/css.php"; ?>
</head>

<body class="bg-[#FAF8F5] text-stone-900 font-sans antialiased selection:bg-amber-100 selection:text-amber-900">
    <div class="min-h-screen flex">
        <?php include "components/sidebar.php"; ?>

        <div class="lg:pl-64 flex flex-col flex-1 min-w-0">
            <?php include "components/topbar.php"; ?>

            <main class="flex-1 p-4 sm:p-6 lg:p-8 max-w-7xl w-full mx-auto space-y-6">
                
                <!-- Page Action Header -->
                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                    <div>
                        <div class="flex items-center gap-2 text-xs text-stone-500 mb-1">
                            <a href="dashboard.php" class="hover:text-stone-900">Dashboard</a>
                            <span>/</span>
                            <span class="text-stone-800 font-medium">Design Team</span>
                        </div>
                        <h2 class="font-serif text-2xl sm:text-3xl font-medium text-stone-900">Design Team &amp; Artisans</h2>
                    </div>
                    <a href="team_create.php" class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl bg-stone-900 hover:bg-amber-950 text-white text-xs font-medium transition-colors shadow-xs">
                        <i class="ri-user-add-line text-base"></i>
                        <span>Add Member</span>
                    </a>
                </div>

                <!-- Table Card -->
                <div class="bg-white rounded-3xl border border-stone-200 overflow-hidden shadow-xs">
                    <div class="p-5 border-b border-stone-100 flex flex-col sm:flex-row sm:items-center justify-between gap-3">
                        <div class="text-xs text-stone-500">
                            Showing active collective artisans &amp; curators
                        </div>
                        <div class="relative sm:w-64">
                            <i class="ri-search-line absolute left-3 top-1/2 -translate-y-1/2 text-stone-400 text-xs"></i>
                            <input type="text" placeholder="Search team..." class="w-full pl-8 pr-3 py-1.5 bg-stone-50 border border-stone-200 rounded-lg text-xs placeholder-stone-400 focus:outline-none focus:ring-1 focus:ring-stone-800">
                        </div>
                    </div>

                    <!-- [PHP_BACKEND_HOOK: Dynamic team table loop: SELECT * FROM team ORDER BY id ASC. Use foreach($team as $member) to render: $member['id'], $member['image'], $member['name'], $member['position']] -->
                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse text-xs">
                            <thead>
                                <tr class="bg-stone-50/80 border-b border-stone-200/80 text-stone-500 uppercase tracking-wider font-semibold">
                                    <th class="py-3.5 px-6">ID</th>
                                    <th class="py-3.5 px-6">Portrait</th>
                                    <th class="py-3.5 px-6">Artisan Name</th>
                                    <th class="py-3.5 px-6">Atelier Role</th>
                                    <th class="py-3.5 px-6 text-right">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-stone-100 text-stone-700 font-medium">
                                
                                <!-- Member 1 -->
                                <tr class="hover:bg-stone-50/60 transition-colors">
                                    <td class="py-4 px-6 text-stone-400">#1</td>
                                    <td class="py-4 px-6">
                                        <div class="w-10 h-10 rounded-full bg-stone-100 border border-stone-200 overflow-hidden">
                                            <img src="../images/team-1.jpg" alt="Kyaw Zin Hein" class="w-full h-full object-cover">
                                        </div>
                                    </td>
                                    <td class="py-4 px-6 font-semibold text-stone-900 text-sm">Kyaw Zin Hein</td>
                                    <td class="py-4 px-6 text-stone-600">Principal Architect &amp; Founder</td>
                                    <td class="py-4 px-6 text-right">
                                        <div class="inline-flex items-center gap-2">
                                            <a href="team_update.php?id=1" class="px-2.5 py-1 rounded-lg border border-stone-200 hover:bg-stone-100 text-stone-700 transition-colors flex items-center gap-1">
                                                <i class="ri-pencil-line"></i> Edit
                                            </a>
                                            <a href="team_delete.php?id=1" class="px-2.5 py-1 rounded-lg border border-rose-200 hover:bg-rose-50 text-rose-600 transition-colors flex items-center gap-1">
                                                <i class="ri-delete-bin-line"></i> Delete
                                            </a>
                                        </div>
                                    </td>
                                </tr>

                                <!-- Member 2 -->
                                <tr class="hover:bg-stone-50/60 transition-colors">
                                    <td class="py-4 px-6 text-stone-400">#2</td>
                                    <td class="py-4 px-6">
                                        <div class="w-10 h-10 rounded-full bg-stone-100 border border-stone-200 overflow-hidden">
                                            <img src="../images/team-2.jpg" alt="Thiri May" class="w-full h-full object-cover">
                                        </div>
                                    </td>
                                    <td class="py-4 px-6 font-semibold text-stone-900 text-sm">Thiri May</td>
                                    <td class="py-4 px-6 text-stone-600">Head of Interior Ergonomics</td>
                                    <td class="py-4 px-6 text-right">
                                        <div class="inline-flex items-center gap-2">
                                            <a href="team_update.php?id=2" class="px-2.5 py-1 rounded-lg border border-stone-200 hover:bg-stone-100 text-stone-700 transition-colors flex items-center gap-1">
                                                <i class="ri-pencil-line"></i> Edit
                                            </a>
                                            <a href="team_delete.php?id=2" class="px-2.5 py-1 rounded-lg border border-rose-200 hover:bg-rose-50 text-rose-600 transition-colors flex items-center gap-1">
                                                <i class="ri-delete-bin-line"></i> Delete
                                            </a>
                                        </div>
                                    </td>
                                </tr>

                                <!-- Member 3 -->
                                <tr class="hover:bg-stone-50/60 transition-colors">
                                    <td class="py-4 px-6 text-stone-400">#3</td>
                                    <td class="py-4 px-6">
                                        <div class="w-10 h-10 rounded-full bg-stone-100 border border-stone-200 overflow-hidden">
                                            <img src="../images/team-3.jpg" alt="Aung Myo Tun" class="w-full h-full object-cover">
                                        </div>
                                    </td>
                                    <td class="py-4 px-6 font-semibold text-stone-900 text-sm">Aung Myo Tun</td>
                                    <td class="py-4 px-6 text-stone-600">Master Wood Craftsman</td>
                                    <td class="py-4 px-6 text-right">
                                        <div class="inline-flex items-center gap-2">
                                            <a href="team_update.php?id=3" class="px-2.5 py-1 rounded-lg border border-stone-200 hover:bg-stone-100 text-stone-700 transition-colors flex items-center gap-1">
                                                <i class="ri-pencil-line"></i> Edit
                                            </a>
                                            <a href="team_delete.php?id=3" class="px-2.5 py-1 rounded-lg border border-rose-200 hover:bg-rose-50 text-rose-600 transition-colors flex items-center gap-1">
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
