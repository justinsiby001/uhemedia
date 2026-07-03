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

    // 4. Contact Form Validation and Submission Preparation
    const $forms = $('.needs-validation');
    $forms.on('submit', function(event) {
        const form = this;
        if (!form.checkValidity()) {
            event.preventDefault();
            event.stopPropagation();
        }
        $(form).addClass('was-validated');
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
