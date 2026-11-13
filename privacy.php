<?php
// Initialize session
require_once __DIR__ . '/components/session_start.php';

// Connect database
require_once __DIR__ . '/components/connection.php';
?>
<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Privacy Policy &amp; Data Stewardship | Yangon Atelier</title>
    <link rel="icon" type="image/x-icon" href="images/favicon/favicon.ico">
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
                <span class="text-[#362F2A]">Privacy Policy</span>
            </nav>
            <div class="flex flex-col md:flex-row md:items-end justify-between gap-4">
                <div>
                    <span class="text-xs uppercase tracking-[0.25em] text-[#8A5A44] font-semibold block mb-2">Legal &amp; Governance</span>
                    <h1 class="font-serif text-3xl sm:text-4xl lg:text-5xl font-normal tracking-tight text-[#362F2A]">
                        Privacy Policy &amp; Data Stewardship
                    </h1>
                    <p class="text-sm sm:text-base text-[#6E6359] max-w-2xl mt-3 leading-relaxed">
                        Our uncompromising commitment to safeguarding your private information, bespoke commission records, and showroom consultations with transparency and care.
                    </p>
                </div>
                <div class="text-xs text-[#6E6359] bg-[#EDE8E0] px-4 py-2.5 rounded-xl border border-[#C9C0B3] whitespace-nowrap">
                    <span>Effective Date: </span>
                    <strong class="text-[#362F2A] font-semibold">November 11, 2026</strong>
                </div>
            </div>
        </div>
    </header>

    <!-- MAIN POLICY CONTENT & STICKY NAVIGATION -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 lg:py-16">

        <!-- EXECUTIVE OVERVIEW / ATELIER COMMITMENT -->
        <div class="mb-12 bg-[#F6F3EE] rounded-3xl p-6 sm:p-8 lg:p-10 border border-[#C9C0B3] shadow-xs">
            <div class="flex items-center gap-3 mb-4">
                <div class="w-10 h-10 rounded-xl bg-[#DFD8CD] text-[#8A5A44] flex items-center justify-center text-xl">
                    <i class="ri-shield-check-line"></i>
                </div>
                <h2 class="font-serif text-xl sm:text-2xl font-normal text-[#362F2A]">Executive Privacy Commitment</h2>
            </div>
            <p class="text-[#6E6359] text-sm leading-relaxed mb-6">
                At Yangon Atelier ("Yangon Atelier", "we", "our", or "us"), we operate with the same deliberate mindfulness in our digital infrastructure as we do when hand-planing solid teak and walnut timbers. We treat your personal data with profound reverence. We do not sell, rent, monetize, or broker your personal information to third-party data brokers under any circumstance.
            </p>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 pt-4 border-t border-[#C9C0B3] text-xs">
                <div class="p-4 rounded-2xl bg-[#EDE8E0] border border-[#C9C0B3]">
                    <div class="text-[#8A5A44] font-semibold mb-1 flex items-center gap-1.5">
                        <i class="ri-forbid-line"></i>
                        <span>Zero Data Brokering</span>
                    </div>
                    <p class="text-[#6E6359] leading-normal">Your information is never sold or exchanged for behavioral ad targeting.</p>
                </div>
                <div class="p-4 rounded-2xl bg-[#EDE8E0] border border-[#C9C0B3]">
                    <div class="text-[#8A5A44] font-semibold mb-1 flex items-center gap-1.5">
                        <i class="ri-lock-line"></i>
                        <span>Secure Fulfillment</span>
                    </div>
                    <p class="text-[#6E6359] leading-normal">Delivery details are shared solely with vetted white-glove transport artisans.</p>
                </div>
                <div class="p-4 rounded-2xl bg-[#EDE8E0] border border-[#C9C0B3]">
                    <div class="text-[#8A5A44] font-semibold mb-1 flex items-center gap-1.5">
                        <i class="ri-fingerprint-line"></i>
                        <span>Full Sovereignty</span>
                    </div>
                    <p class="text-[#6E6359] leading-normal">Request complete export or permanent deletion of your profile anytime.</p>
                </div>
                <div class="p-4 rounded-2xl bg-[#EDE8E0] border border-[#C9C0B3]">
                    <div class="text-[#8A5A44] font-semibold mb-1 flex items-center gap-1.5">
                        <i class="ri-bank-card-line"></i>
                        <span>PCI-DSS Compliant</span>
                    </div>
                    <p class="text-[#6E6359] leading-normal">Card credentials are processed via tokenized tier-one bank gateways.</p>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">

            <!-- STICKY TABLE OF CONTENTS -->
            <aside class="lg:col-span-4">
                <div class="lg:sticky lg:top-28 bg-[#F6F3EE] border border-[#C9C0B3] rounded-3xl p-6 shadow-xs">
                    <h3 class="text-xs uppercase tracking-[0.2em] text-[#6E6359] font-semibold mb-4">
                        Sections &amp; Articles
                    </h3>
                    <nav class="space-y-1 text-xs">
                        <a href="#section-1" class="block py-2 px-3 rounded-xl font-medium text-[#6E6359] hover:text-[#362F2A] hover:bg-[#DFD8CD] transition-colors">
                            1. Scope &amp; Atelier Introduction
                        </a>
                        <a href="#section-2" class="block py-2 px-3 rounded-xl font-medium text-[#6E6359] hover:text-[#362F2A] hover:bg-[#DFD8CD] transition-colors">
                            2. Information We Collect
                        </a>
                        <a href="#section-3" class="block py-2 px-3 rounded-xl font-medium text-[#6E6359] hover:text-[#362F2A] hover:bg-[#DFD8CD] transition-colors">
                            3. Purpose &amp; Processing Grounds
                        </a>
                        <a href="#section-4" class="block py-2 px-3 rounded-xl font-medium text-[#6E6359] hover:text-[#362F2A] hover:bg-[#DFD8CD] transition-colors">
                            4. Logistics &amp; Service Partners
                        </a>
                        <a href="#section-5" class="block py-2 px-3 rounded-xl font-medium text-[#6E6359] hover:text-[#362F2A] hover:bg-[#DFD8CD] transition-colors">
                            5. Cookies &amp; Telemetry
                        </a>
                        <a href="#section-6" class="block py-2 px-3 rounded-xl font-medium text-[#6E6359] hover:text-[#362F2A] hover:bg-[#DFD8CD] transition-colors">
                            6. Retention &amp; Archival Lifecycles
                        </a>
                        <a href="#section-7" class="block py-2 px-3 rounded-xl font-medium text-[#6E6359] hover:text-[#362F2A] hover:bg-[#DFD8CD] transition-colors">
                            7. Technical Safeguards &amp; Security
                        </a>
                        <a href="#section-8" class="block py-2 px-3 rounded-xl font-medium text-[#6E6359] hover:text-[#362F2A] hover:bg-[#DFD8CD] transition-colors">
                            8. Your Privacy Rights &amp; Recourse
                        </a>
                        <a href="#section-9" class="block py-2 px-3 rounded-xl font-medium text-[#6E6359] hover:text-[#362F2A] hover:bg-[#DFD8CD] transition-colors">
                            9. Children's Privacy Notice
                        </a>
                        <a href="#section-10" class="block py-2 px-3 rounded-xl font-medium text-[#6E6359] hover:text-[#362F2A] hover:bg-[#DFD8CD] transition-colors">
                            10. Direct Privacy Officer Inquiries
                        </a>
                    </nav>

                    <!-- Concierge Card -->
                    <div class="mt-8 pt-6 border-t border-[#C9C0B3] text-xs text-[#6E6359] space-y-2">
                        <span class="text-[11px] uppercase tracking-wider text-[#8A5A44] font-semibold block">Data Protection Office</span>
                        <p class="font-medium text-[#362F2A]">Min Khant Naung</p>
                        <p class="text-[#6E6359]">Showroom Concierge &amp; Governance</p>
                        <a href="mailto:privacy@yangonatelier.com" class="inline-flex items-center gap-1.5 text-[#362F2A] hover:text-[#8A5A44] font-medium transition-colors pt-1">
                            <i class="ri-mail-line"></i>
                            <span>privacy@yangonatelier.com</span>
                        </a>
                    </div>
                </div>
            </aside>

            <!-- LEGAL PROSE & ARTICLES -->
            <article class="lg:col-span-8 space-y-12 text-sm leading-relaxed text-[#6E6359]">

                <!-- SECTION 1 -->
                <section id="section-1" class="scroll-mt-28 space-y-4">
                    <span class="text-xs uppercase tracking-wider text-[#8A5A44] font-semibold">Section 1</span>
                    <h2 class="font-serif text-2xl font-normal text-[#362F2A] tracking-tight">Scope &amp; Atelier Introduction</h2>
                    <p>
                        This Privacy Policy applies to personal data collected by Yangon Atelier through our digital boutique at <code>yangonatelier.com</code>, our local atelier communications, private client consultations, architectural bespoke commissions, and physical visits to our Yangon Flagship showroom located at No. 55A, Maggin Street, Yankin Township, Yangon, Myanmar.
                    </p>
                    <p>
                        By visiting our website, engaging our bespoke joinery team, creating an atelier account, or transacting for furniture acquisitions, you acknowledge the data handling practices set forth in this document.
                    </p>
                </section>

                <!-- SECTION 2 -->
                <section id="section-2" class="scroll-mt-28 space-y-4 pt-8 border-t border-[#C9C0B3]">
                    <span class="text-xs uppercase tracking-wider text-[#8A5A44] font-semibold">Section 2</span>
                    <h2 class="font-serif text-2xl font-normal text-[#362F2A] tracking-tight">Information We Collect</h2>
                    <p>
                        We deliberately limit data collection to that which is strictly essential for precision furniture fabrication, white-glove architectural delivery, customer warranty validation, and serene client communication:
                    </p>

                    <div class="space-y-4 pl-4 border-l-2 border-[#7C4E26]/60 mt-4">
                        <div>
                            <h3 class="font-serif text-base font-semibold text-[#362F2A]">A. Identity &amp; Contact Credentials</h3>
                            <p class="text-xs text-[#6E6359] mt-1">
                                Full name, telephone number (e.g., +95 9 973 383 719), primary email address, physical residence or commercial architectural delivery address, and apartment access instructions.
                            </p>
                        </div>
                        <div>
                            <h3 class="font-serif text-base font-semibold text-[#362F2A]">B. Bespoke Furniture &amp; Commission Specifications</h3>
                            <p class="text-xs text-[#6E6359] mt-1">
                                Room floor dimensions, custom timber preferences (e.g., Natural White Oak, Burmese Teak, Smoked Walnut), fabric curation swatches, joinery finish selections, and custom engraving notations.
                            </p>
                        </div>
                        <div>
                            <h3 class="font-serif text-base font-semibold text-[#362F2A]">C. Commercial Transaction &amp; Payment Data</h3>
                            <p class="text-xs text-[#6E6359] mt-1">
                                Transaction timestamps, order amounts denominated in Myanmar Kyat (MMK), invoice numbers, and encrypted gateway payment tokens. We never store raw debit/credit card numbers or CVV codes on our servers.
                            </p>
                        </div>
                        <div>
                            <h3 class="font-serif text-base font-semibold text-[#362F2A]">D. Technical &amp; Device Telemetry</h3>
                            <p class="text-xs text-[#6E6359] mt-1">
                                Anonymized IP addresses, browser engine types, screen resolutions, preferred language preferences, and pages viewed, strictly used to ensure tactile responsive rendering and protect against fraud.
                            </p>
                        </div>
                    </div>
                </section>

                <!-- SECTION 3 -->
                <section id="section-3" class="scroll-mt-28 space-y-4 pt-8 border-t border-[#C9C0B3]">
                    <span class="text-xs uppercase tracking-wider text-[#8A5A44] font-semibold">Section 3</span>
                    <h2 class="font-serif text-2xl font-normal text-[#362F2A] tracking-tight">Purpose &amp; Processing Grounds</h2>
                    <p>
                        Every piece of data collected corresponds to a genuine operational necessity under recognized legal standards:
                    </p>
                    <ul class="list-disc pl-5 space-y-2 text-[#6E6359]">
                        <li>
                            <strong class="text-[#362F2A]">Contractual Fulfillment:</strong> Processing orders, verifying stock availability, coordinating white-glove doorstep assembly, and honoring our comprehensive 5-year structural timber warranty.
                        </li>
                        <li>
                            <strong class="text-[#362F2A]">Direct Client Inquiries:</strong> Responding to showroom visit appointments, material sample requests, and wood finishing inquiries submitted through our contact channels.
                        </li>
                        <li>
                            <strong class="text-[#362F2A]">Consensual Editorial Journal:</strong> Delivering our seasonal design lookbooks, timber care advice, and private exhibition invitations when you explicitly subscribe to <em>The Atelier Journal</em>.
                        </li>
                        <li>
                            <strong class="text-[#362F2A]">Legal Compliance &amp; Tax Obligations:</strong> Maintaining formal commercial receipts and corporate audit records in compliance with regional commercial laws of Myanmar.
                        </li>
                    </ul>
                </section>

                <!-- SECTION 4 -->
                <section id="section-4" class="scroll-mt-28 space-y-4 pt-8 border-t border-[#C9C0B3]">
                    <span class="text-xs uppercase tracking-wider text-[#8A5A44] font-semibold">Section 4</span>
                    <h2 class="font-serif text-2xl font-normal text-[#362F2A] tracking-tight">Logistics &amp; Service Partners</h2>
                    <p>
                        Yangon Atelier does not distribute your information to marketers. We share selective data solely with trusted operational partners bound by strict confidentiality agreements:
                    </p>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mt-4">
                        <div class="p-5 rounded-2xl bg-white border border-[#C9C0B3] shadow-xs">
                            <h3 class="font-serif text-sm font-semibold text-[#362F2A] mb-1">White-Glove Couriers</h3>
                            <p class="text-xs text-[#6E6359]">
                                Designated transport specialists receive only your name, phone number, and delivery destination to coordinate scheduled in-room installation.
                            </p>
                        </div>
                        <div class="p-5 rounded-2xl bg-white border border-[#C9C0B3] shadow-xs">
                            <h3 class="font-serif text-sm font-semibold text-[#362F2A] mb-1">Payment Gateways</h3>
                            <p class="text-xs text-[#6E6359]">
                                Certified financial clearing networks (including KBZPay, CB Pay, and Visa/Mastercard processing facilities) process transactions over end-to-end TLS 1.3 encryption.
                            </p>
                        </div>
                    </div>
                </section>

                <!-- SECTION 5 -->
                <section id="section-5" class="scroll-mt-28 space-y-4 pt-8 border-t border-[#C9C0B3]">
                    <span class="text-xs uppercase tracking-wider text-[#8A5A44] font-semibold">Section 5</span>
                    <h2 class="font-serif text-2xl font-normal text-[#362F2A] tracking-tight">Cookies &amp; Telemetry</h2>
                    <p>
                        Our website utilizes minimal, non-invasive cookies strictly to enable smooth digital commerce. These cookies maintain session state for your shopping bag, preserve sorting selections, and retain UI preferences.
                    </p>
                    <p>
                        We do not utilize cross-site tracking pixels, third-party advertising cookies, or fingerprinting scripts. You may disable cookies in your web browser settings at any moment, although certain interactive features (such as real-time bag updates) may require manual reloads.
                    </p>
                </section>

                <!-- SECTION 6 -->
                <section id="section-6" class="scroll-mt-28 space-y-4 pt-8 border-t border-[#C9C0B3]">
                    <span class="text-xs uppercase tracking-wider text-[#8A5A44] font-semibold">Section 6</span>
                    <h2 class="font-serif text-2xl font-normal text-[#362F2A] tracking-tight">Retention &amp; Archival Lifecycles</h2>
                    <p>
                        Personal data is retained only for the duration required to achieve the purpose for which it was assembled:
                    </p>
                    <ul class="list-disc pl-5 space-y-2 text-[#6E6359]">
                        <li><strong>Order Records:</strong> Retained for 5 years to guarantee warranty inspections, joinery replacements, and regulatory accounting.</li>
                        <li><strong>Inquiry Transcripts:</strong> Showroom and consultation records are safely deleted 12 months after resolution.</li>
                        <li><strong>Newsletter Subscriptions:</strong> Maintained until you click "Unsubscribe" or formally request removal.</li>
                        <li><strong>Atelier Accounts:</strong> Retained until you request account closure through our concierge desk.</li>
                    </ul>
                </section>

                <!-- SECTION 7 -->
                <section id="section-7" class="scroll-mt-28 space-y-4 pt-8 border-t border-[#C9C0B3]">
                    <span class="text-xs uppercase tracking-wider text-[#8A5A44] font-semibold">Section 7</span>
                    <h2 class="font-serif text-2xl font-normal text-[#362F2A] tracking-tight">Technical Safeguards &amp; Security</h2>
                    <p>
                        We implement rigorous organizational and technical measures to protect your data against unauthorized destruction, loss, alteration, or interception. These include:
                    </p>
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 pt-2">
                        <div class="p-4 rounded-2xl bg-[#DFD8CD]/70 border border-[#C9C0B3]">
                            <i class="ri-shield-keyhole-line text-lg text-[#8A5A44] block mb-1"></i>
                            <strong class="text-xs text-[#362F2A] block">TLS 1.3 Encryption</strong>
                            <p class="text-[11px] text-[#6E6359] mt-1">All data transmitted between your browser and our servers is cryptographically secured.</p>
                        </div>
                        <div class="p-4 rounded-2xl bg-[#DFD8CD]/70 border border-[#C9C0B3]">
                            <i class="ri-database-2-line text-lg text-[#8A5A44] block mb-1"></i>
                            <strong class="text-xs text-[#362F2A] block">Restricted Access</strong>
                            <p class="text-[11px] text-[#6E6359] mt-1">Only bonded atelier personnel with verified roles can inspect delivery logs.</p>
                        </div>
                        <div class="p-4 rounded-2xl bg-[#DFD8CD]/70 border border-[#C9C0B3]">
                            <i class="ri-history-line text-lg text-[#8A5A44] block mb-1"></i>
                            <strong class="text-xs text-[#362F2A] block">Security Auditing</strong>
                            <p class="text-[11px] text-[#6E6359] mt-1">Quarterly vulnerability assessments on our hosting clusters and software dependencies.</p>
                        </div>
                    </div>
                </section>

                <!-- SECTION 8 -->
                <section id="section-8" class="scroll-mt-28 space-y-4 pt-8 border-t border-[#C9C0B3]">
                    <span class="text-xs uppercase tracking-wider text-[#8A5A44] font-semibold">Section 8</span>
                    <h2 class="font-serif text-2xl font-normal text-[#362F2A] tracking-tight">Your Privacy Rights &amp; Recourse</h2>
                    <p>
                        Regardless of where you reside, Yangon Atelier accords you fundamental data privacy rights:
                    </p>
                    <div class="space-y-3">
                        <div class="flex items-start gap-3 p-4 rounded-2xl bg-white border border-[#C9C0B3]">
                            <i class="ri-checkbox-circle-line text-emerald-700 text-lg flex-shrink-0 mt-0.5"></i>
                            <div>
                                <strong class="text-xs text-[#362F2A] block">Right of Access &amp; Portability</strong>
                                <span class="text-xs text-[#6E6359]">Request a complete copy of all personal records, order histories, and bespoke notes associated with your identity in an open format.</span>
                            </div>
                        </div>
                        <div class="flex items-start gap-3 p-4 rounded-2xl bg-white border border-[#C9C0B3]">
                            <i class="ri-edit-line text-amber-700 text-lg flex-shrink-0 mt-0.5"></i>
                            <div>
                                <strong class="text-xs text-[#362F2A] block">Right of Rectification</strong>
                                <span class="text-xs text-[#6E6359]">Instruct our concierge to modify inaccurate delivery contacts or update your architectural measurements at any time.</span>
                            </div>
                        </div>
                        <div class="flex items-start gap-3 p-4 rounded-2xl bg-white border border-[#C9C0B3]">
                            <i class="ri-delete-bin-line text-rose-700 text-lg flex-shrink-0 mt-0.5"></i>
                            <div>
                                <strong class="text-xs text-[#362F2A] block">Right of Erasure ("To Be Forgotten")</strong>
                                <span class="text-xs text-[#6E6359]">Request permanent deletion of your profile, newsletter subscription, and correspondence logs, subject to mandatory statutory tax retention limits.</span>
                            </div>
                        </div>
                    </div>
                    <p class="text-xs text-[#6E6359] pt-2">
                        To exercise any of these privileges, please send an electronic request to <a href="mailto:privacy@yangonatelier.com" class="text-[#8A5A44] underline font-medium">privacy@yangonatelier.com</a>. We respond to all verified inquiries within 5 business days.
                    </p>
                </section>

                <!-- SECTION 9 -->
                <section id="section-9" class="scroll-mt-28 space-y-4 pt-8 border-t border-[#C9C0B3]">
                    <span class="text-xs uppercase tracking-wider text-[#8A5A44] font-semibold">Section 9</span>
                    <h2 class="font-serif text-2xl font-normal text-[#362F2A] tracking-tight">Children's Privacy Notice</h2>
                    <p>
                        Yangon Atelier specializes in heirloom residential furniture and architectural interiors conceived for discerning adult homeowners and design professionals. Our digital services are not directed toward children under the age of 18, and we do not knowingly collect personal data from minors. If you believe a minor has submitted personal information through our forms, please alert our concierge immediately for immediate deletion.
                    </p>
                </section>

                <!-- SECTION 10 -->
                <section id="section-10" class="scroll-mt-28 space-y-6 pt-8 border-t border-[#C9C0B3]">
                    <span class="text-xs uppercase tracking-wider text-[#8A5A44] font-semibold">Section 10</span>
                    <h2 class="font-serif text-2xl font-normal text-[#362F2A] tracking-tight">Direct Privacy Officer Inquiries</h2>
                    <p>
                        For questions, formal clarifications, data deletion petitions, or to discuss our responsible data governance policies in detail, please reach our designated officers:
                    </p>

                    <div class="bg-[#F4EFE8] rounded-3xl p-6 sm:p-8 border border-[#C9C0B3] space-y-6">
                        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 pb-6 border-b border-[#C9C0B3]/80">
                            <div>
                                <h3 class="font-serif text-lg font-semibold text-[#362F2A]">Yangon Atelier — Data Governance Desk</h3>
                                <p class="text-xs text-[#6E6359] mt-1">Supervised by Min Khant Naung, Showroom Concierge Director</p>
                            </div>
                            <a href="contact.php" class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl bg-stone-900 text-white text-xs font-medium hover:bg-amber-900 transition-colors shadow-xs">
                                <span>Contact Showroom</span>
                                <i class="ri-arrow-right-line"></i>
                            </a>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 text-xs text-[#6E6359]">
                            <div>
                                <span class="font-semibold text-[#362F2A] block mb-1">Yangon Flagship Atelier</span>
                                <p class="text-[#6E6359] leading-relaxed">
                                    No. 55A, Maggin Street,<br>
                                    Yankin Township,<br>
                                    Yangon, Myanmar
                                </p>
                            </div>
                            <div>
                                <span class="font-semibold text-[#362F2A] block mb-1">Direct Telecommunications</span>
                                <p class="text-[#6E6359] leading-relaxed">
                                    Showroom: <a href="tel:+959973383719" class="text-[#8A5A44] font-medium hover:underline">+95 9 973 383 719</a><br>
                                    Office: <a href="tel:+959421122846" class="text-[#8A5A44] font-medium hover:underline">+95 9 421 122 846</a>
                                </p>
                            </div>
                            <div>
                                <span class="font-semibold text-[#362F2A] block mb-1">Electronic Correspondence</span>
                                <p class="text-[#6E6359] leading-relaxed">
                                    Privacy Officer: <a href="mailto:privacy@yangonatelier.com" class="text-[#8A5A44] font-medium hover:underline">privacy@yangonatelier.com</a><br>
                                    General Atelier: <a href="mailto:atelier@yangonatelier.com" class="text-[#8A5A44] font-medium hover:underline">atelier@yangonatelier.com</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </section>

            </article>

        </div>
    </main>

    <?php include "components/footer.php"; ?>
    <?php include "components/js.php"; ?>
</body>

</html>