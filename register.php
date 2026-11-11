<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Atelier Account | FurnishMe</title>
    <link rel="icon" type="image/x-icon" href="images/favicon.ico">
    <?php include "components/css.php"; ?>
</head>

<body class="bg-[#0D0B09] text-[#EDE4D7] font-sans selection:bg-[#C5A059] selection:text-[#0D0B09] min-h-screen flex flex-col justify-between">
    <?php include "components/header.php"; ?>
    <?php include "components/navbar.php"; ?>

    <!-- MAIN REGISTRATION SECTION -->
    <main class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-12 lg:py-20 w-full flex-1 flex items-center justify-center">
        <div class="w-full bg-[#161310] rounded-3xl border border-[#2A231C] shadow-2xl overflow-hidden grid grid-cols-1 md:grid-cols-12">
            
            <!-- Left Column: Visual Illustration & Brand Note -->
            <div class="md:col-span-5 bg-[#110E0C] p-8 sm:p-10 flex flex-col justify-between items-center text-center border-b md:border-b-0 md:border-r border-[#221C16]">
                <div class="w-full text-left">
                    <span class="text-xs uppercase tracking-[0.2em] text-[#C5A059] font-semibold block mb-1">New Membership</span>
                    <h2 class="font-serif text-2xl font-normal text-[#FAF6EE]">Join the Atelier</h2>
                </div>
                
                <div class="my-8 max-w-xs flex items-center justify-center">
                    <img src="images/auth-register.svg" alt="Client registration illustration" width="300" height="300" class="max-h-60 w-auto object-contain drop-shadow-sm" loading="lazy">
                </div>

                <div class="text-left w-full border-t border-[#221C16] pt-4">
                    <p class="text-xs text-[#8C7D6B] leading-relaxed">
                        Curate your personal spatial catalog, receive invitations to studio releases, and access private bespoke commissions.
                    </p>
                </div>
            </div>

            <!-- Right Column: Registration Form -->
            <div class="md:col-span-7 p-8 sm:p-12 flex flex-col justify-center">
                <div class="mb-8">
                    <span class="text-xs uppercase tracking-widest text-[#C5A059] font-semibold block mb-1">Client Registration</span>
                    <h1 class="font-serif text-3xl font-normal text-[#FAF6EE]">Create an Account</h1>
                    <p class="text-xs text-[#8C7D6B] mt-1">Fill in the details below to complete your registration.</p>
                </div>

                <!-- [PHP_BACKEND_HOOK: User registration handler. Target action, POST method, CSRF token verification, password_hash, duplicate email check: INSERT INTO users (username, email, password)] -->
                <form action="#" method="POST" data-toast-success="Account created successfully. Welcome to FurnishMe." class="space-y-4">
                    
                    <!-- Username Field -->
                    <div class="space-y-1.5">
                        <label for="username" class="block text-xs font-semibold uppercase tracking-wider text-[#FAF6EE]">
                            Username / Full Name <span class="text-rose-600">*</span>
                        </label>
                        <div class="relative">
                            <i class="ri-user-line absolute left-4 top-1/2 -translate-y-1/2 text-[#8C7D6B] text-base"></i>
                            <input type="text" id="username" name="username" required placeholder="Choose a username" class="w-full pl-11 pr-4 py-3 bg-[#0D0B09] border border-[#2E241B] rounded-xl text-[#FAF6EE] text-sm placeholder-[#8C7D6B] focus:outline-none focus:ring-1 focus:ring-[#C5A059] focus:border-[#C5A059] transition-all">
                        </div>
                    </div>

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

                    <!-- Password Fields Grid -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <!-- Password -->
                        <div class="space-y-1.5">
                            <label for="password" class="block text-xs font-semibold uppercase tracking-wider text-[#FAF6EE]">
                                Password <span class="text-rose-600">*</span>
                            </label>
                            <div class="relative">
                                <i class="ri-lock-2-line absolute left-4 top-1/2 -translate-y-1/2 text-[#8C7D6B] text-base"></i>
                                <input type="password" id="password" name="password" required placeholder="Create password" class="w-full pl-11 pr-10 py-3 bg-[#0D0B09] border border-[#2E241B] rounded-xl text-[#FAF6EE] text-sm placeholder-[#8C7D6B] focus:outline-none focus:ring-1 focus:ring-[#C5A059] focus:border-[#C5A059] transition-all">
                                <button type="button" data-toggle-password="password" aria-label="Toggle password visibility" class="absolute right-3 top-1/2 -translate-y-1/2 text-[#8C7D6B] hover:text-[#FAF6EE] transition-colors">
                                    <i class="ri-eye-line text-sm"></i>
                                </button>
                            </div>
                        </div>

                        <!-- Confirm Password -->
                        <div class="space-y-1.5">
                            <label for="confirm_password" class="block text-xs font-semibold uppercase tracking-wider text-[#FAF6EE]">
                                Confirm <span class="text-rose-600">*</span>
                            </label>
                            <div class="relative">
                                <i class="ri-lock-password-line absolute left-4 top-1/2 -translate-y-1/2 text-[#8C7D6B] text-base"></i>
                                <input type="password" id="confirm_password" name="confirm_password" required placeholder="Re-enter password" class="w-full pl-11 pr-10 py-3 bg-[#0D0B09] border border-[#2E241B] rounded-xl text-[#FAF6EE] text-sm placeholder-[#8C7D6B] focus:outline-none focus:ring-1 focus:ring-[#C5A059] focus:border-[#C5A059] transition-all">
                                <button type="button" data-toggle-password="confirm_password" aria-label="Toggle password visibility" class="absolute right-3 top-1/2 -translate-y-1/2 text-[#8C7D6B] hover:text-[#FAF6EE] transition-colors">
                                    <i class="ri-eye-line text-sm"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Terms agreement note -->
                    <p class="text-[11px] text-[#8C7D6B] pt-1 leading-relaxed">
                        By creating an account, you agree to our <a href="terms.php" class="underline hover:text-[#C5A059]">Terms of Service</a> and acknowledge our <a href="privacy.php" class="underline hover:text-[#C5A059]">Privacy Policy</a>.
                    </p>

                    <!-- Submit Button -->
                    <button type="submit" name="click" class="w-full py-3.5 px-6 rounded-xl bg-[#C5A059] hover:bg-[#D4AF37] text-[#0D0B09] font-semibold text-sm transition-all shadow-md hover:shadow-lg flex items-center justify-center gap-2">
                        <span>Register Account</span>
                        <i class="ri-arrow-right-line text-base"></i>
                    </button>

                    <!-- Link to Login -->
                    <p class="text-center text-xs text-[#8C7D6B] pt-2">
                        Already have an account? 
                        <a href="login.php" class="font-semibold text-[#C5A059] hover:underline">Sign in instead</a>
                    </p>
                </form>
            </div>

        </div>
    </main>

    <?php include "components/footer.php"; ?>
    <?php include "components/js.php"; ?>
</body>

</html>
