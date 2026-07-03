<section id="contact" class="py-7 bg-white">
    <div class="container">
        <div class="row gy-5">
            <!-- Left Column: Company Information -->
            <div class="col-lg-5 reveal">
                <div class="pe-lg-4">
                    <span class="text-gold fw-bold text-uppercase tracking-wider mb-2 d-block" style="font-size: 0.85rem; letter-spacing: 0.1em;">
                        Let's Work Together
                    </span>
                    <h2 class="h1 fw-extrabold mb-4">Have a project in mind?<br>We'd love to hear from you.</h2>
                    <p class="text-muted mb-5">
                        Whether you are planning a high-impact digital campaign, launching video production, or designing a physical brand activation, we have the team to make it a success.
                    </p>

                    <!-- Contact Details list -->
                    <div class="contact-info-list mb-5">
                        <div class="contact-info-item">
                            <div class="contact-info-icon" aria-hidden="true">
                                <i class="bi bi-telephone"></i>
                            </div>
                            <div>
                                <h3 class="h6 fw-bold mb-1">Call Us</h3>
                                <a href="tel:+971507006848" class="text-decoration-none text-dark fw-medium">+971 50 700 6848</a>
                            </div>
                        </div>

                        <div class="contact-info-item">
                            <div class="contact-info-icon" aria-hidden="true">
                                <i class="bi bi-envelope"></i>
                            </div>
                            <div>
                                <h3 class="h6 fw-bold mb-1">Email Us</h3>
                                <a href="mailto:hello@uhemedia.com" class="text-decoration-none text-dark fw-medium">hello@uhemedia.com</a>
                            </div>
                        </div>

                        <div class="contact-info-item">
                            <div class="contact-info-icon" aria-hidden="true">
                                <i class="bi bi-geo-alt"></i>
                            </div>
                            <div>
                                <h3 class="h6 fw-bold mb-1">Our Location</h3>
                                <address class="text-dark fw-medium mb-0">Dubai, United Arab Emirates</address>
                            </div>
                        </div>
                    </div>

                    <!-- Social Icons -->
                    <div class="d-flex gap-3">
                        <a href="https://facebook.com" class="social-icon" aria-label="Follow UHE Media on Facebook" target="_blank" rel="noopener">
                            <i class="bi bi-facebook" aria-hidden="true"></i>
                        </a>
                        <a href="https://instagram.com" class="social-icon" aria-label="Follow UHE Media on Instagram" target="_blank" rel="noopener">
                            <i class="bi bi-instagram" aria-hidden="true"></i>
                        </a>
                        <a href="https://linkedin.com" class="social-icon" aria-label="Connect with UHE Media on LinkedIn" target="_blank" rel="noopener">
                            <i class="bi bi-linkedin" aria-hidden="true"></i>
                        </a>
                        <a href="https://youtube.com" class="social-icon" aria-label="Subscribe to UHE Media on YouTube" target="_blank" rel="noopener">
                            <i class="bi bi-youtube" aria-hidden="true"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Right Column: Contact Form with Validation -->
            <div class="col-lg-7 reveal">
                <div class="p-4 p-md-5 bg-white border border-light-subtle rounded-4 shadow-sm">
                    <!-- Alert Container for AJAX and Session Feedback -->
                    <div id="formAlertContainer">
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show rounded-3 mb-4" role="alert">
                                <i class="bi bi-check-circle-fill me-2" aria-hidden="true"></i>
                                {{ session('success') }}
                                <button type="button" class="btn-close shadow-none" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                    </div>

                    <form action="{{ route('contact.submit') }}" method="POST" class="contact-form needs-validation" novalidate>
                        @csrf
                        <div class="row g-4">
                            <!-- Full Name -->
                            <div class="col-md-6">
                                <label for="fullName" class="form-label fw-semibold text-dark mb-2">Full Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="fullName" name="name" placeholder="John Doe" required aria-required="true">
                                <div class="invalid-feedback">
                                    Please enter your full name.
                                </div>
                            </div>

                            <!-- Email Address -->
                            <div class="col-md-6">
                                <label for="emailAddress" class="form-label fw-semibold text-dark mb-2">Email Address <span class="text-danger">*</span></label>
                                <input type="email" class="form-control" id="emailAddress" name="email" placeholder="john@example.com" required aria-required="true">
                                <div class="invalid-feedback">
                                    Please enter a valid email address.
                                </div>
                            </div>

                            <!-- Phone Number -->
                            <div class="col-md-6">
                                <label for="phoneNumber" class="form-label fw-semibold text-dark mb-2">Phone Number <span class="text-danger">*</span></label>
                                <input type="tel" class="form-control" id="phoneNumber" name="phone" placeholder="+971 50 123 4567" required aria-required="true">
                                <div class="invalid-feedback">
                                    Please enter your phone number.
                                </div>
                            </div>

                            <!-- Company Name -->
                            <div class="col-md-6">
                                <label for="companyName" class="form-label fw-semibold text-dark mb-2">Company</label>
                                <input type="text" class="form-control" id="companyName" name="company" placeholder="Your Company Ltd">
                            </div>

                            <!-- Message -->
                            <div class="col-12">
                                <label for="messageText" class="form-label fw-semibold text-dark mb-2">Your Message <span class="text-danger">*</span></label>
                                <textarea class="form-control" id="messageText" name="message" placeholder="Tell us about your project goals..." required aria-required="true"></textarea>
                                <div class="invalid-feedback">
                                    Please write your message text.
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <div class="col-12">
                                <button type="submit" class="btn btn-dark btn-lg w-100 py-3 mt-2" aria-label="Send contact message">
                                    Send Message <i class="bi bi-send-fill ms-2" aria-hidden="true" style="font-size: 0.95rem; line-height: 1;"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
