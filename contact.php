<?php
/**
 * ============================================================================
 * FURNISHME BACKEND INSTRUCTION GUIDELINE - CONTACT & INQUIRIES
 * ============================================================================
 * FILE: contact.php
 * PURPOSE: Processes direct showroom inquiries, bespoke dimension requests,
 *          and stores client messages in the 'contacts' table for admin review.
 * 
 * STEP-BY-STEP IMPLEMENTATION GUIDE:
 * 1. Initialize Session:
 *    if (session_status() === PHP_SESSION_NONE) {
 *        session_start();
 *    }
 * 
 * 2. Include Database Connection:
 *    require_once "components/connection.php";
 * 
 * 3. Process POST Inquiry Submission:
 *    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['send'])) {
 *        $name    = trim($_POST['name'] ?? '');
 *        $number  = trim($_POST['number'] ?? '');
 *        $email   = trim($_POST['email'] ?? '');
 *        $message = trim($_POST['message'] ?? '');
 * 
 *        // Validation
 *        if (empty($name) || empty($number) || empty($email) || empty($message)) {
 *            $error = "All fields are required. Please complete the form.";
 *        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
 *            $error = "Please provide a valid email address.";
 *        } else {
 *            // Insert inquiry record into contacts table
 *            $stmt = $connection->prepare("INSERT INTO contacts (name, number, email, message, status) VALUES (?, ?, ?, ?, 'Pending Review')");
 *            $stmt->bind_param("ssss", $name, $number, $email, $message);
 * 
 *            if ($stmt->execute()) {
 *                $success = "Thank you, " . htmlspecialchars($name) . ". Your inquiry has been received. Our concierge will reach out promptly.";
 *                // Clear fields on success
 *                $name = $number = $email = $message = '';
 *            } else {
 *                $error = "Failed to record message: " . $connection->error;
 *            }
 *            $stmt->close();
 *        }
 *    }
 * ============================================================================
 */

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$error = '';
$success = '';
?>
<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact &amp; Showroom Inquiries | FurnishMe</title>
    <link rel="icon" type="image/x-icon" href="images/favicon.ico">
    <?php include "components/css.php"; ?>
</head>

<body class="bg-[#0D0B09] text-[#EDE4D7] font-sans selection:bg-[#C5A059] selection:text-[#0D0B09]">
    <?php include "components/header.php"; ?>
    <?php include "components/navbar.php"; ?>

    <!-- PAGE HEADER BREADCRUMB -->
    <header class="bg-[#110E0C] border-b border-[#221C16] py-12 lg:py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <nav class="flex items-center gap-2 text-xs font-medium text-stone-500 mb-3" aria-label="Breadcrumb">
                <a href="index.php" class="hover:text-[#FAF6EE] transition-colors">Home</a>
                <span class="text-stone-400">/</span>
                <span class="text-[#C5A059] font-semibold">Showroom &amp; Inquiries</span>
            </nav>
            <div class="max-w-3xl">
                <h1 class="font-serif text-3xl sm:text-4xl lg:text-5xl font-normal tracking-tight text-[#FAF6EE]">
                    Connect With Our Atelier.
                </h1>
                <p class="text-sm sm:text-base text-[#D6C8B4] mt-3 leading-relaxed">
                    Whether you are seeking custom architectural dimensions, trade collaborations, or a private walkthrough in Yangon, our concierge is at your service.
                </p>
            </div>
        </div>
    </header>

    <!-- CONTACT DETAILS & FORM TWO-COLUMN LAYOUT -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 lg:py-24">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16 items-start">
            
            <!-- Left Column: Showroom Contact Information -->
            <div class="lg:col-span-5 space-y-8">
                <div>
                    <span class="text-xs uppercase tracking-[0.25em] text-[#C5A059] font-semibold block mb-2">Yangon Flagship</span>
                    <h2 class="font-serif text-2xl sm:text-3xl font-normal text-[#FAF6EE]">The Showroom &amp; Studio</h2>
                    <p class="text-sm text-[#8C7D6B] mt-2 leading-relaxed">
                        Experience our tactile wood pieces, test seat proportions, and inspect fabric swatch books in an atmosphere of natural daylight.
                    </p>
                </div>

                <div class="space-y-6 border-t border-b border-[#221C16] py-6">
                    <!-- Location -->
                    <div class="flex items-start gap-4">
                        <div class="w-10 h-10 rounded-xl bg-[#221C16] border border-[#3E3224] flex items-center justify-center text-[#C5A059] text-lg flex-shrink-0 shadow-xs">
                            <i class="ri-map-pin-2-line"></i>
                        </div>
                        <div class="text-sm">
                            <strong class="text-[#FAF6EE] font-medium block">Atelier Address</strong>
                            <p class="text-[#8C7D6B] mt-0.5 leading-relaxed">
                                No. 55A, Maggin Street, Yankin Township,<br>Yangon, Myanmar
                            </p>
                        </div>
                    </div>

                    <!-- Hours -->
                    <div class="flex items-start gap-4">
                        <div class="w-10 h-10 rounded-xl bg-[#221C16] border border-[#3E3224] flex items-center justify-center text-[#C5A059] text-lg flex-shrink-0 shadow-xs">
                            <i class="ri-time-line"></i>
                        </div>
                        <div class="text-sm">
                            <strong class="text-[#FAF6EE] font-medium block">Visiting &amp; Consultation Hours</strong>
                            <p class="text-[#8C7D6B] mt-0.5">Tuesday — Sunday: 09:30 AM — 06:30 PM</p>
                            <p class="text-[#665849] text-xs mt-0.5">Closed on Mondays &amp; Public Holidays</p>
                        </div>
                    </div>

                    <!-- Phone -->
                    <div class="flex items-start gap-4">
                        <div class="w-10 h-10 rounded-xl bg-[#221C16] border border-[#3E3224] flex items-center justify-center text-[#C5A059] text-lg flex-shrink-0 shadow-xs">
                            <i class="ri-phone-line"></i>
                        </div>
                        <div class="text-sm">
                            <strong class="text-[#FAF6EE] font-medium block">Telephone &amp; Viber</strong>
                            <a href="tel:+959973383719" class="text-[#D6C8B4] hover:text-[#C5A059] transition-colors mt-0.5 block">+95 9 973 383 719</a>
                            <a href="tel:+959421122846" class="text-[#D6C8B4] hover:text-[#C5A059] transition-colors block">+95 9 421 122 846</a>
                        </div>
                    </div>

                    <!-- Email -->
                    <div class="flex items-start gap-4">
                        <div class="w-10 h-10 rounded-xl bg-[#221C16] border border-[#3E3224] flex items-center justify-center text-[#C5A059] text-lg flex-shrink-0 shadow-xs">
                            <i class="ri-mail-line"></i>
                        </div>
                        <div class="text-sm">
                            <strong class="text-[#FAF6EE] font-medium block">Electronic Correspondence</strong>
                            <a href="mailto:concierge@furnishme.com" class="text-[#D6C8B4] hover:text-[#C5A059] transition-colors mt-0.5 block">concierge@furnishme.com</a>
                            <a href="mailto:orders@furnishme.com" class="text-[#D6C8B4] hover:text-[#C5A059] transition-colors block">orders@furnishme.com</a>
                        </div>
                    </div>
                </div>

                <!-- Trade Inquiries Note -->
                <div class="p-5 rounded-2xl bg-[#161310] border border-[#2A231C] text-xs text-[#8C7D6B] space-y-1">
                    <strong class="text-[#FAF6EE] font-medium block">Architect &amp; Interior Designer Program</strong>
                    <p>We extend trade discounts, 3D CAD assets, and custom timber finishing samples to qualified spatial design practices.</p>
                </div>
            </div>

            <!-- Right Column: Contact Form -->
            <div class="lg:col-span-7">
                <div class="bg-[#161310] rounded-3xl border border-[#2A231C] p-8 sm:p-10 shadow-2xl">
                    <div class="mb-8">
                        <span class="text-xs uppercase tracking-widest text-[#C5A059] font-semibold block mb-1">Direct Message</span>
                        <h3 class="font-serif text-2xl font-normal text-[#FAF6EE]">Send an Inquiry to the Curators</h3>
                        <p class="text-xs text-[#8C7D6B] mt-1">Our team typically responds within four business hours.</p>
                    </div>

                    <!-- ==============================================================
                         PHP BACKEND GUIDELINE: Alert Messages
                         Output feedback notification if form submission succeeds or fails
                         ============================================================== -->
                    <?php if (!empty($error)): ?>
                        <div class="mb-6 p-4 rounded-xl bg-rose-950/50 border border-rose-800 text-rose-300 text-xs flex items-center gap-3">
                            <i class="ri-error-warning-line text-lg flex-shrink-0"></i>
                            <span><?= htmlspecialchars($error) ?></span>
                        </div>
                    <?php endif; ?>

                    <?php if (!empty($success)): ?>
                        <div class="mb-6 p-4 rounded-xl bg-emerald-950/50 border border-emerald-800 text-emerald-300 text-xs flex items-center gap-3">
                            <i class="ri-checkbox-circle-line text-lg flex-shrink-0"></i>
                            <span><?= htmlspecialchars($success) ?></span>
                        </div>
                    <?php endif; ?>

                    <!-- ==============================================================
                         PHP BACKEND GUIDELINE: Contact Form Handler
                         - Action: action="" (submits to self)
                         - Method: POST
                         - Trigger: name="send" on submit button
                         - Retains entered values on validation error
                         ============================================================== -->
                    <form action="" method="POST" data-toast-success="Your message has been sent. Our team will contact you shortly." class="space-y-6">
                        
                        <!-- Name Field -->
                        <div class="space-y-2">
                            <label for="name" class="block text-xs font-semibold uppercase tracking-wider text-[#FAF6EE]">
                                Full Name <span class="text-rose-600">*</span>
                            </label>
                            <div class="relative">
                                <i class="ri-user-line absolute left-4 top-1/2 -translate-y-1/2 text-[#8C7D6B] text-base"></i>
                                <input type="text" id="name" name="name" required value="<?= htmlspecialchars($_POST['name'] ?? '') ?>" placeholder="e.g. Daw Khin Hnin" class="w-full pl-11 pr-4 py-3 bg-[#0D0B09] border border-[#2E241B] rounded-xl text-[#FAF6EE] text-sm placeholder-[#8C7D6B] focus:outline-none focus:ring-1 focus:ring-[#C5A059] focus:border-[#C5A059] transition-all">
                            </div>
                        </div>

                        <!-- Grid: Phone and Email -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                            <!-- Phone -->
                            <div class="space-y-2">
                                <label for="number" class="block text-xs font-semibold uppercase tracking-wider text-[#FAF6EE]">
                                    Phone / Viber <span class="text-rose-600">*</span>
                                </label>
                                <div class="relative">
                                    <i class="ri-phone-line absolute left-4 top-1/2 -translate-y-1/2 text-[#8C7D6B] text-base"></i>
                                    <input type="tel" id="number" name="number" required value="<?= htmlspecialchars($_POST['number'] ?? '') ?>" placeholder="09 973 383 719" class="w-full pl-11 pr-4 py-3 bg-[#0D0B09] border border-[#2E241B] rounded-xl text-[#FAF6EE] text-sm placeholder-[#8C7D6B] focus:outline-none focus:ring-1 focus:ring-[#C5A059] focus:border-[#C5A059] transition-all">
                                </div>
                            </div>

                            <!-- Email -->
                            <div class="space-y-2">
                                <label for="email" class="block text-xs font-semibold uppercase tracking-wider text-[#FAF6EE]">
                                    Email Address <span class="text-rose-600">*</span>
                                </label>
                                <div class="relative">
                                    <i class="ri-mail-line absolute left-4 top-1/2 -translate-y-1/2 text-[#8C7D6B] text-base"></i>
                                    <input type="email" id="email" name="email" required value="<?= htmlspecialchars($_POST['email'] ?? '') ?>" placeholder="you@domain.com" class="w-full pl-11 pr-4 py-3 bg-[#0D0B09] border border-[#2E241B] rounded-xl text-[#FAF6EE] text-sm placeholder-[#8C7D6B] focus:outline-none focus:ring-1 focus:ring-[#C5A059] focus:border-[#C5A059] transition-all">
                                </div>
                            </div>
                        </div>

                        <!-- Message -->
                        <div class="space-y-2">
                            <label for="message" class="block text-xs font-semibold uppercase tracking-wider text-[#FAF6EE]">
                                Inquiry or Piece of Interest <span class="text-rose-600">*</span>
                            </label>
                            <div class="relative">
                                <textarea id="message" name="message" rows="5" required placeholder="Tell us about your spatial project, requested piece specifications, or desired delivery timing..." class="w-full p-4 bg-[#0D0B09] border border-[#2E241B] rounded-xl text-[#FAF6EE] text-sm placeholder-[#8C7D6B] focus:outline-none focus:ring-1 focus:ring-[#C5A059] focus:border-[#C5A059] transition-all"><?= htmlspecialchars($_POST['message'] ?? '') ?></textarea>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" name="send" class="w-full py-4 px-6 rounded-xl bg-[#C5A059] hover:bg-[#D4AF37] text-[#0D0B09] font-semibold text-sm transition-all shadow-md hover:shadow-lg flex items-center justify-center gap-2">
                            <i class="ri-send-plane-line text-base"></i>
                            <span>Send Message &amp; Inquire</span>
                        </button>
                    </form>
                </div>
            </div>

        </div>

        <!-- EMBEDDED GOOGLE MAP SECTION -->
        <div class="mt-16 sm:mt-20">
            <div class="mb-4">
                <span class="text-xs uppercase tracking-widest text-[#C5A059] font-semibold block">Map &amp; Directions</span>
                <h3 class="font-serif text-xl font-normal text-[#FAF6EE]">Locate Our Yankin Atelier</h3>
            </div>
            <div class="w-full h-96 sm:h-[450px] rounded-3xl overflow-hidden border border-[#2A231C] shadow-2xl bg-[#0D0B09]">
                <iframe class="w-full h-full border-0"
                    src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d3818.839551851325!2d96.16721207535012!3d16.834313983961668!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMTbCsDUwJzAzLjUiTiA5NsKwMTAnMTEuMiJF!5e0!3m2!1sen!2sch!4v1794417196576!5m2!1sen!2sch"
                    allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>
    </main>

    <?php include "components/footer.php"; ?>
    <?php include "components/js.php"; ?>
</body>

</html>
