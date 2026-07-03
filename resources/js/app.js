// Import Bootstrap JS components
import 'bootstrap';
import $ from 'jquery';

$(function() {
    // 1. Sticky Navbar Scroll Trigger
    const $navbar = $('.navbar');
    const handleNavbarScroll = () => {
        if ($(window).scrollTop() > 50) {
            $navbar.addClass('scrolled');
        } else {
            $navbar.removeClass('scrolled');
        }
    };
    $(window).on('scroll', handleNavbarScroll);
    handleNavbarScroll(); // Run once in case page starts scrolled

    // 2. Reveal on Scroll (Fade in effects)
    // IntersectionObserver remains the standard, high-performance API for checking viewport intersection.
    const $revealElements = $('.reveal');
    if ($revealElements.length > 0) {
        const revealObserver = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    $(entry.target).addClass('active');
                    observer.unobserve(entry.target);
                }
            });
        }, {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        });

        $revealElements.each(function() {
            revealObserver.observe(this);
        });
    }

    // 3. Animated Statistics Counters using jQuery animate
    const $counterElements = $('.stat-number');
    const animateCounter = ($el) => {
        const target = parseFloat($el.attr('data-target'));
        const suffix = $el.attr('data-suffix') || '';
        const prefix = $el.attr('data-prefix') || '';
        const isDecimal = $el.attr('data-decimal') === 'true';

        $({ countNum: 0 }).animate({ countNum: target }, {
            duration: 2500,
            easing: 'swing', // Smooth easing effect
            step: function() {
                let formattedVal;
                if (isDecimal) {
                    formattedVal = this.countNum.toFixed(0);
                } else {
                    formattedVal = Math.floor(this.countNum).toString();
                }
                $el.text(`${prefix}${formattedVal}${suffix}`);
            },
            complete: function() {
                $el.text(`${prefix}${target}${suffix}`);
            }
        });
    };

    if ($counterElements.length > 0) {
        const counterObserver = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    animateCounter($(entry.target));
                    observer.unobserve(entry.target);
                }
            });
        }, {
            threshold: 0.2
        });

        $counterElements.each(function() {
            counterObserver.observe(this);
        });
    }

    // 4. Contact Form AJAX Submission with Validation
    const $form = $('.contact-form');
    const $submitBtn = $form.find('button[type="submit"]');
    const $alertContainer = $('#formAlertContainer');

    // Auto-fadeout existing session alerts if present on page load
    const $existingAlert = $alertContainer.find('.alert');
    if ($existingAlert.length > 0) {
        setTimeout(() => {
            $existingAlert.fadeOut(500, function() {
                $(this).remove();
            });
        }, 5000);
    }

    $form.on('submit', function(event) {
        event.preventDefault();
        const form = this;

        if (!form.checkValidity()) {
            event.stopPropagation();
            $form.addClass('was-validated');
            return;
        }

        $form.addClass('was-validated');

        // Disable submit button and show loading state
        $submitBtn.prop('disabled', true).html('Sending Message <span class="spinner-border spinner-border-sm ms-2" role="status" aria-hidden="true"></span>');

        // Perform AJAX POST request
        $.ajax({
            url: $form.attr('action'),
            method: 'POST',
            data: $form.serialize(),
            success: function(response) {
                // Clear any previous alerts
                $alertContainer.empty();

                // Inject success alert banner
                const successAlert = `
                    <div class="alert alert-success alert-dismissible fade show rounded-3 mb-4" role="alert">
                        <i class="bi bi-check-circle-fill me-2" aria-hidden="true"></i>
                        ${response.message || 'Thank you! Your message has been sent successfully.'}
                        <button type="button" class="btn-close shadow-none" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                `;
                $alertContainer.append(successAlert);

                // Reset form fields and validation classes
                form.reset();
                $form.removeClass('was-validated');

                // Auto-fade/hide the success message after 5 seconds
                setTimeout(() => {
                    $alertContainer.find('.alert').fadeOut(500, function() {
                        $(this).remove();
                    });
                }, 5000);
            },
            error: function(xhr) {
                $alertContainer.empty();
                
                let errorMessage = 'An error occurred while sending your message. Please try again.';
                if (xhr.responseJSON && xhr.responseJSON.message) {
                    errorMessage = xhr.responseJSON.message;
                }

                // Inject error alert banner
                const errorAlert = `
                    <div class="alert alert-danger alert-dismissible fade show rounded-3 mb-4" role="alert">
                        <i class="bi bi-exclamation-triangle-fill me-2" aria-hidden="true"></i>
                        ${errorMessage}
                        <button type="button" class="btn-close shadow-none" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                `;
                $alertContainer.append(errorAlert);

                // Auto-fade/hide the error message after 5 seconds
                setTimeout(() => {
                    $alertContainer.find('.alert').fadeOut(500, function() {
                        $(this).remove();
                    });
                }, 5000);
            },
            complete: function() {
                // Restore button state
                $submitBtn.prop('disabled', false).html('Send Message <i class="bi bi-send-fill ms-2" aria-hidden="true" style="font-size: 0.95rem; line-height: 1;"></i>');
            }
        });
    });

    // 5. Active Navigation Link on Scroll
    const $navLinks = $('.navbar-nav .nav-link');
    const $sections = $('section, header');

    $(window).on('scroll', () => {
        let currentSectionId = '';
        const scrollPosition = $(window).scrollTop() + 100; // Offset for navbar height

        $sections.each(function() {
            const $section = $(this);
            const sectionTop = $section.offset().top;
            const sectionHeight = $section.outerHeight();
            if (scrollPosition >= sectionTop && scrollPosition < sectionTop + sectionHeight) {
                currentSectionId = $section.attr('id');
            }
        });

        $navLinks.removeClass('active');
        if (currentSectionId) {
            $navLinks.filter(`[href="#${currentSectionId}"]`).addClass('active');
        }
    });
});
