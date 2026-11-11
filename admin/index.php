<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Authentication | FurnishMe Atelier</title>
    <link rel="icon" type="image/x-icon" href="../images/favicon.ico?v=2">
    <link rel="icon" type="image/png" sizes="32x32" href="../images/favicon-32x32.png?v=2">
    <link rel="icon" type="image/png" sizes="16x16" href="../images/favicon-16x16.png?v=2">
    <link rel="apple-touch-icon" sizes="180x180" href="../images/apple-touch-icon.png?v=2">
    <?php include "components/css.php"; ?>
</head>

<body class="bg-[#100E0C] text-stone-100 font-sans min-h-screen flex items-center justify-center p-4 selection:bg-amber-800 selection:text-white antialiased">
    <div class="w-full max-w-md">
        <!-- Brand Header -->
        <div class="text-center mb-8">
            <div class="inline-flex w-14 h-14 rounded-2xl bg-[#CBA57F] items-center justify-center font-serif text-2xl text-[#14120F] mb-4 shadow-xl font-semibold">
                F
            </div>
            <h1 class="font-serif text-2xl sm:text-3xl font-medium tracking-tight text-[#FAF6F0]">FurnishMe Atelier</h1>
            <p class="text-xs text-[#CBA57F] uppercase tracking-[0.2em] mt-1.5 font-medium">Administrative Gateway</p>
        </div>

        <!-- Auth Card -->
        <div class="bg-[#161311]/95 backdrop-blur-lg border border-[#2D2620] rounded-3xl p-8 sm:p-10 shadow-2xl">
            <div class="mb-6">
                <h2 class="text-lg font-medium text-[#FAF6F0]">Sign In to Workspace</h2>
                <p class="text-xs text-[#A89E90] mt-1">Enter your administrator credentials to manage products, editorial, and clients.</p>
            </div>

            <!-- [PHP_BACKEND_HOOK: Admin authentication handler. POST method, CSRF verification, password_verify against admin users, set $_SESSION['admin_user']] -->
            <form action="dashboard.php" method="POST" class="space-y-5">
                <!-- Email -->
                <div class="space-y-1.5">
                    <label for="email" class="block text-xs font-semibold uppercase tracking-wider text-[#D8CEBF]">
                        Admin Email
                    </label>
                    <div class="relative">
                        <i class="ri-mail-line absolute left-4 top-1/2 -translate-y-1/2 text-[#8C7D6B] text-base"></i>
                        <input type="email" id="email" name="email" required placeholder="admin@furnishme.com" value="admin@gmail.com" class="w-full pl-11 pr-4 py-3 bg-[#1E1A16] border border-[#3A3229] rounded-xl text-white text-sm placeholder-stone-500 focus:outline-none focus:ring-1 focus:ring-[#CBA57F] focus:border-[#CBA57F] transition-all">
                    </div>
                </div>

                <!-- Password -->
                <div class="space-y-1.5">
                    <label for="password" class="block text-xs font-semibold uppercase tracking-wider text-[#D8CEBF]">
                        Password
                    </label>
                    <div class="relative">
                        <i class="ri-lock-2-line absolute left-4 top-1/2 -translate-y-1/2 text-[#8C7D6B] text-base"></i>
                        <input type="password" id="password" name="password" required placeholder="••••••••" value="password" class="w-full pl-11 pr-11 py-3 bg-[#1E1A16] border border-[#3A3229] rounded-xl text-white text-sm placeholder-stone-500 focus:outline-none focus:ring-1 focus:ring-[#CBA57F] focus:border-[#CBA57F] transition-all">
                    </div>
                </div>

                <!-- Submit Button -->
                <button type="submit" name="admin_login" class="w-full py-3.5 px-6 rounded-xl bg-[#CBA57F] hover:bg-[#B58245] text-[#14120F] font-semibold text-sm transition-all shadow-lg flex items-center justify-center gap-2 mt-2">
                    <i class="ri-login-circle-line text-lg"></i>
                    <span>Access Dashboard</span>
                </button>
            </form>

            <div class="mt-8 pt-6 border-t border-[#26201A] text-center">
                <a href="../index.php" class="text-xs text-[#A89E90] hover:text-[#FAF6F0] transition-colors inline-flex items-center gap-1.5">
                    <i class="ri-arrow-left-line"></i>
                    <span>Return to Public Storefront</span>
                </a>
            </div>
        </div>

        <p class="text-center text-[11px] text-[#A89E90] mt-6">
            FurnishMe &copy; <?php echo date("Y"); ?> • Restricted Atelier Access
        </p>
    </div>

    <?php include "components/js.php"; ?>
</body>

</html>
