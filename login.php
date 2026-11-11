<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Client Sign In | FurnishMe Atelier</title>
    <link rel="icon" type="image/x-icon" href="images/favicon.ico?v=2">
    <link rel="icon" type="image/png" sizes="32x32" href="images/favicon-32x32.png?v=2">
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon-16x16.png?v=2">
    <link rel="apple-touch-icon" sizes="180x180" href="images/apple-touch-icon.png?v=2">
    <?php include "components/css.php"; ?>
</head>

<body class="bg-[#0D0B09] text-[#EDE4D7] font-sans selection:bg-[#C5A059] selection:text-[#0D0B09] min-h-screen flex flex-col justify-between">
    <?php include "components/header.php"; ?>
    <?php include "components/navbar.php"; ?>

    <!-- MAIN AUTH SECTION -->
    <main class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-12 lg:py-20 w-full flex-1 flex items-center justify-center">
        <div class="w-full bg-[#161310] rounded-3xl border border-[#2A231C] shadow-2xl overflow-hidden grid grid-cols-1 md:grid-cols-12">
            
            <!-- Left Column: Visual Illustration & Brand Note -->
            <div class="md:col-span-5 bg-[#110E0C] p-8 sm:p-10 flex flex-col justify-between items-center text-center border-b md:border-b-0 md:border-r border-[#221C16]">
                <div class="w-full text-left">
                    <span class="text-xs uppercase tracking-[0.2em] text-[#C5A059] font-semibold block mb-1">Client Sanctuary</span>
                    <h2 class="font-serif text-2xl font-normal text-[#FAF6EE]">Welcome Back</h2>
                </div>
                
                <div class="my-8 max-w-xs flex items-center justify-center">
                    <img src="images/auth-login.svg" alt="Client sign in illustration" width="300" height="300" class="max-h-60 w-auto object-contain drop-shadow-sm" loading="lazy">
                </div>

                <div class="text-left w-full border-t border-[#221C16] pt-4">
                    <p class="text-xs text-[#8C7D6B] leading-relaxed">
                        Access saved architectural selections, track commission timelines, and view bespoke proposals.
                    </p>
                </div>
            </div>

            <!-- Right Column: Sign In Form -->
            <div class="md:col-span-7 p-8 sm:p-12 flex flex-col justify-center">
                <div class="mb-8">
                    <span class="text-xs uppercase tracking-widest text-[#C5A059] font-semibold block mb-1">Account Authentication</span>
                    <h1 class="font-serif text-3xl font-normal text-[#FAF6EE]">Sign in to FurnishMe</h1>
                    <p class="text-xs text-[#8C7D6B] mt-1">Please enter your verified email and password.</p>
                </div>

                <!-- [PHP_BACKEND_HOOK: Authentication handler. POST method, CSRF verification, password_verify against users table, session initiation] -->
                <form action="#" method="POST" data-toast-success="Sign in successful. Welcome back to FurnishMe." class="space-y-5">
                    
                    <!-- Email Field -->
                    <div class="space-y-1.5">
                        <label for="email" class="block text-xs font-semibold uppercase tracking-wider text-[#FAF6EE]">
                            Email Address <span class="text-rose-600">*</span>
                        </label>
                        <div class="relative">
                            <i class="ri-mail-line absolute left-4 top-1/2 -translate-y-1/2 text-[#8C7D6B] text-base"></i>
                            <input type="email" id="email" name="email" required placeholder="client@example.com" class="w-full pl-11 pr-4 py-3 bg-[#0D0B09] border border-[#2E241B] rounded-xl text-[#FAF6EE] text-sm placeholder-[#8C7D6B] focus:outline-none focus:ring-1 focus:ring-[#C5A059] focus:border-[#C5A059] transition-all">
                        </div>
                    </div>

                    <!-- Password Field with Toggle -->
                    <div class="space-y-1.5">
                        <div class="flex items-center justify-between">
                            <label for="password" class="block text-xs font-semibold uppercase tracking-wider text-[#FAF6EE]">
                                Password <span class="text-rose-600">*</span>
                            </label>
                            <a href="#" class="text-xs text-[#8C7D6B] hover:text-[#C5A059] transition-colors">Forgot password?</a>
                        </div>
                        <div class="relative">
                            <i class="ri-lock-2-line absolute left-4 top-1/2 -translate-y-1/2 text-[#8C7D6B] text-base"></i>
                            <input type="password" id="password" name="password" required placeholder="Enter your password" class="w-full pl-11 pr-11 py-3 bg-[#0D0B09] border border-[#2E241B] rounded-xl text-[#FAF6EE] text-sm placeholder-[#8C7D6B] focus:outline-none focus:ring-1 focus:ring-[#C5A059] focus:border-[#C5A059] transition-all">
                            <button type="button" data-toggle-password="password" aria-label="Toggle password visibility" class="absolute right-3.5 top-1/2 -translate-y-1/2 text-[#8C7D6B] hover:text-[#FAF6EE] transition-colors">
                                <i class="ri-eye-line text-base"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Remember Me Option -->
                    <div class="flex items-center justify-between text-xs pt-1">
                        <label class="flex items-center gap-2 text-[#8C7D6B] cursor-pointer select-none" for="remember-me">
                            <input type="checkbox" name="remember" id="remember-me" class="rounded border-stone-300 text-[#C5A059] focus:ring-amber-900 w-4 h-4">
                            <span>Keep me signed in on this device</span>
                        </label>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" name="login" class="w-full py-3.5 px-6 rounded-xl bg-[#C5A059] hover:bg-[#D4AF37] text-[#0D0B09] font-semibold text-sm transition-all shadow-md hover:shadow-lg flex items-center justify-center gap-2">
                        <span>Sign In</span>
                        <i class="ri-arrow-right-line text-base"></i>
                    </button>

                    <!-- Link to Register -->
                    <p class="text-center text-xs text-[#8C7D6B] pt-2">
                        New to FurnishMe Atelier? 
                        <a href="register.php" class="font-semibold text-[#C5A059] hover:underline">Create an account</a>
                    </p>
                </form>
            </div>

        </div>
    </main>

    <?php include "components/footer.php"; ?>
    <?php include "components/js.php"; ?>
</body>

</html>
