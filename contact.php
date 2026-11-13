<?php
// Initialize session
require_once __DIR__ . '/components/session_start.php';

// Check session
require_once __DIR__ . '/components/session_check.php';

// Connect database
require_once __DIR__ . '/components/connection.php';

$errors = [];
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['send'])) {
    $name = trim($_POST['name'] ?? '');
    $number = trim($_POST['number'] ?? '');
    $email = strtolower(trim($_POST['email'] ?? ''));
    $message = trim($_POST['message'] ?? '');

    // Form check
    if (empty($name) || empty($number) || empty($email) || empty($message)) {
        $errors['form'] = 'All fields are required. Please complete the form.';
    } else {
        // Phone number check
        // if (!filter_var($number, FILTER_VALIDATE_INT)) {
        // I use regular expression(regex) pattern here cuz the above one doesn't work. 
        if (!preg_match('/^[0-9+\-\s()]{7,20}$/', $number)) {
            $errors['number'] = 'Please enter a valid phone number.';
        }

        // Check email
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'Please enter a valid email address.';
        }
    }

    if (empty($errors)) {
        try {
            $sql = 'INSERT INTO contacts(name, number, email, message) VALUES(:name, :number, :email, :message)';
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                ':name' => $name,
                ':number' => $number,
                ':email' => $email,
                ':message' => $message
            ]);
            $safe_name = htmlspecialchars($name);
            $success = "Thank you {$safe_name}. Your inquiry has been received. Our concierge will reach out promptly.";
            $name = $number = $email = $message = '';
        } catch (PDOException $e) {
            error_log('Contact form error: ' . $e->getMessage() . '\n', 3, __DIR__ . '/error.log');
            $errors['connection'] = 'Unable to send your inquiry at this moment. Please try again later.';
        }
    }
}

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

<body class="bg-[#EDE8E0] text-[#362F2A] font-sans selection:bg-[#8A5A44] selection:text-[#F6F3EE] antialiased">
    <?php include "components/header.php"; ?>
    <?php include "components/navbar.php"; ?>

    <!-- PAGE HEADER BREADCRUMB -->
    <header class="bg-[#DFD8CD] border-b border-[#C9C0B3] py-12 lg:py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <nav class="flex items-center gap-2 text-xs font-medium text-[#6E6359] mb-3" aria-label="Breadcrumb">
                <a href="index.php" class="hover:text-[#362F2A] transition-colors">Home</a>
                <span class="text-[#C9C0B3]">/</span>
                <span class="text-[#8A5A44] font-semibold">Showroom &amp; Inquiries</span>
            </nav>
            <div class="max-w-3xl">
                <h1 class="font-serif text-3xl sm:text-4xl lg:text-5xl font-normal tracking-tight text-[#362F2A]">
                    Connect With Our Atelier.
                </h1>
                <p class="text-sm sm:text-base text-[#6E6359] mt-3 leading-relaxed">
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
                    <span class="text-xs uppercase tracking-[0.25em] text-[#8A5A44] font-semibold block mb-2">Yangon Flagship</span>
                    <h2 class="font-serif text-2xl sm:text-3xl font-normal text-[#362F2A]">The Showroom &amp; Studio</h2>
                    <p class="text-sm text-[#6E6359] mt-2 leading-relaxed">
                        Experience our tactile wood pieces, test seat proportions, and inspect fabric swatch books in an atmosphere of natural daylight.
                    </p>
                </div>

                <div class="space-y-6 border-t border-b border-[#C9C0B3] py-6">
                    <!-- Location -->
                    <div class="flex items-start gap-4">
                        <div class="w-10 h-10 rounded-xl bg-[#DFD8CD] border border-[#C9C0B3] flex items-center justify-center text-[#8A5A44] text-lg flex-shrink-0 shadow-xs">
                            <i class="ri-map-pin-2-line"></i>
                        </div>
                        <div class="text-sm">
                            <strong class="text-[#362F2A] font-medium block">Atelier Address</strong>
                            <p class="text-[#6E6359] mt-0.5 leading-relaxed">
                                No. 55A, Maggin Street, Yankin Township,<br>Yangon, Myanmar
                            </p>
                        </div>
                    </div>

                    <!-- Hours -->
                    <div class="flex items-start gap-4">
                        <div class="w-10 h-10 rounded-xl bg-[#DFD8CD] border border-[#C9C0B3] flex items-center justify-center text-[#8A5A44] text-lg flex-shrink-0 shadow-xs">
                            <i class="ri-time-line"></i>
                        </div>
                        <div class="text-sm">
                            <strong class="text-[#362F2A] font-medium block">Visiting &amp; Consultation Hours</strong>
                            <p class="text-[#6E6359] mt-0.5">Tuesday — Sunday: 09:30 AM — 06:30 PM</p>
                            <p class="text-[#6E6359] text-xs mt-0.5">Closed on Mondays &amp; Public Holidays</p>
                        </div>
                    </div>

                    <!-- Phone -->
                    <div class="flex items-start gap-4">
                        <div class="w-10 h-10 rounded-xl bg-[#DFD8CD] border border-[#C9C0B3] flex items-center justify-center text-[#8A5A44] text-lg flex-shrink-0 shadow-xs">
                            <i class="ri-phone-line"></i>
                        </div>
                        <div class="text-sm">
                            <strong class="text-[#362F2A] font-medium block">Telephone &amp; Viber</strong>
                            <a href="tel:+959973383719" class="text-[#6E6359] hover:text-[#8A5A44] transition-colors mt-0.5 block">+95 9 973 383 719</a>
                            <a href="tel:+959421122846" class="text-[#6E6359] hover:text-[#8A5A44] transition-colors block">+95 9 421 122 846</a>
                        </div>
                    </div>

                    <!-- Email -->
                    <div class="flex items-start gap-4">
                        <div class="w-10 h-10 rounded-xl bg-[#DFD8CD] border border-[#C9C0B3] flex items-center justify-center text-[#8A5A44] text-lg flex-shrink-0 shadow-xs">
                            <i class="ri-mail-line"></i>
                        </div>
                        <div class="text-sm">
                            <strong class="text-[#362F2A] font-medium block">Electronic Correspondence</strong>
                            <a href="mailto:concierge@furnishme.com" class="text-[#6E6359] hover:text-[#8A5A44] transition-colors mt-0.5 block">concierge@furnishme.com</a>
                            <a href="mailto:orders@furnishme.com" class="text-[#6E6359] hover:text-[#8A5A44] transition-colors block">orders@furnishme.com</a>
                        </div>
                    </div>
                </div>

                <!-- Trade Inquiries Note -->
                <div class="p-5 rounded-2xl bg-[#F6F3EE] border border-[#C9C0B3] text-xs text-[#6E6359] space-y-1">
                    <strong class="text-[#362F2A] font-medium block">Architect &amp; Interior Designer Program</strong>
                    <p>We extend trade discounts, 3D CAD assets, and custom timber finishing samples to qualified spatial design practices.</p>
                </div>
            </div>

            <!-- Right Column: Contact Form -->
            <div class="lg:col-span-7">
                <div class="bg-[#F6F3EE] rounded-3xl border border-[#C9C0B3] p-8 sm:p-10 shadow-lg">
                    <div class="mb-8">
                        <span class="text-xs uppercase tracking-widest text-[#8A5A44] font-semibold block mb-1">Direct Message</span>
                        <h3 class="font-serif text-2xl font-normal text-[#362F2A]">Send an Inquiry to the Curators</h3>
                        <p class="text-xs text-[#6E6359] mt-1">Our team typically responds within four business hours.</p>
                    </div>

                    <form action="" method="POST" class="space-y-6">
                        <!-- Name Field -->
                        <div class="space-y-2">
                            <label for="name" class="block text-xs font-semibold uppercase tracking-wider text-[#362F2A]">
                                Full Name <span class="text-rose-600">*</span>
                            </label>
                            <div class="relative">
                                <i class="ri-user-line absolute left-4 top-1/2 -translate-y-1/2 text-[#6E6359] text-base"></i>
                                <input type="text" id="name" name="name" required value="<?= htmlspecialchars($name ?? '') ?>" placeholder="e.g. Phone Myat Win" class="w-full pl-11 pr-4 py-3 bg-[#EDE8E0] border border-[#C9C0B3] rounded-xl text-[#362F2A] text-sm placeholder-[#8C7D6B] focus:outline-none focus:ring-1 focus:ring-[#8A5A44] focus:border-[#8A5A44] transition-all">
                            </div>
                        </div>

                        <!-- Grid: Phone and Email -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                            <!-- Phone -->
                            <div class="space-y-2">
                                <label for="number" class="block text-xs font-semibold uppercase tracking-wider text-[#362F2A]">
                                    Phone / Viber <span class="text-rose-600">*</span>
                                </label>
                                <div class="relative">
                                    <i class="ri-phone-line absolute left-4 top-1/2 -translate-y-1/2 text-[#6E6359] text-base"></i>
                                    <input type="tel" id="number" name="number" required value="<?= htmlspecialchars($number ?? '') ?>" placeholder="09 973 383 719" class="w-full pl-11 pr-4 py-3 bg-[#EDE8E0] border border-[#C9C0B3] rounded-xl text-[#362F2A] text-sm placeholder-[#8C7D6B] focus:outline-none focus:ring-1 focus:ring-[#8A5A44] focus:border-[#8A5A44] transition-all">
                                </div>
                            </div>

                            <!-- Email -->
                            <div class="space-y-2">
                                <label for="email" class="block text-xs font-semibold uppercase tracking-wider text-[#362F2A]">
                                    Email Address <span class="text-rose-600">*</span>
                                </label>
                                <div class="relative">
                                    <i class="ri-mail-line absolute left-4 top-1/2 -translate-y-1/2 text-[#6E6359] text-base"></i>
                                    <input type="email" id="email" name="email" required value="<?= htmlspecialchars($email ?? '') ?>" placeholder="you@domain.com" class="w-full pl-11 pr-4 py-3 bg-[#EDE8E0] border border-[#C9C0B3] rounded-xl text-[#362F2A] text-sm placeholder-[#8C7D6B] focus:outline-none focus:ring-1 focus:ring-[#8A5A44] focus:border-[#8A5A44] transition-all">
                                </div>
                            </div>
                        </div>

                        <!-- Message -->
                        <div class="space-y-2">
                            <label for="message" class="block text-xs font-semibold uppercase tracking-wider text-[#362F2A]">
                                Inquiry or Piece of Interest <span class="text-rose-600">*</span>
                            </label>
                            <div class="relative">
                                <textarea id="message" name="message" rows="5" required placeholder="Tell us about your spatial project, requested piece specifications, or desired delivery timing..." class="w-full p-4 bg-[#EDE8E0] border border-[#C9C0B3] rounded-xl text-[#362F2A] text-sm placeholder-[#8C7D6B] focus:outline-none focus:ring-1 focus:ring-[#8A5A44] focus:border-[#8A5A44] transition-all"><?= htmlspecialchars($message ?? '') ?></textarea>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" name="send" class="w-full py-4 px-6 rounded-xl bg-[#8A5A44] hover:bg-[#704735] text-[#F6F3EE] font-semibold text-sm transition-all shadow-md hover:shadow-lg flex items-center justify-center gap-2">
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
                <span class="text-xs uppercase tracking-widest text-[#8A5A44] font-semibold block">Map &amp; Directions</span>
                <h3 class="font-serif text-xl font-normal text-[#362F2A]">Locate Our Yankin Atelier</h3>
            </div>
            <div class="w-full h-96 sm:h-[450px] rounded-3xl overflow-hidden border border-[#C9C0B3] shadow-md bg-[#EDE8E0]">
                <iframe title="FurnishMe Yangon Atelier Location" class="w-full h-full border-0"
                    src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d3818.839551851325!2d96.16721207535012!3d16.834313983961668!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMTbCsDUwJzAzLjUiTiA5NsKwMTAnMTEuMiJF!5e0!3m2!1sen!2sch!4v1794417196576!5m2!1sen!2sch"
                    allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>
    </main>

    <?php include "components/footer.php"; ?>
    <?php include "components/js.php"; ?>

    <!-- Errors pop-up like a toaster -->
    <?php if (!empty($errors)): ?>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                <?php foreach ($errors as $error): ?>
                    showToast(<?= json_encode($error); ?>, 'error');
                <?php endforeach; ?>
            });
        </script>
    <?php endif; ?>

    <!-- Success pop-up -->
    <?php if (!empty($success)): ?>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                showToast(<?= json_encode($success); ?>, 'success');
            });
        </script>
    <?php endif; ?>
</body>

</html>