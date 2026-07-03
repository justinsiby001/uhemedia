<header id="home" class="hero-section bg-white d-flex align-items-center">
    <!-- Subtle Background Vector Shapes -->
    <div class="hero-shapes" aria-hidden="true">
        <div class="hero-shape-1"></div>
    </div>
    
    <div class="container position-relative">
        <div class="row align-items-center gy-5">
            <!-- Left Text Content Column -->
            <div class="col-lg-6">
                <div class="pe-lg-4">
                    <span class="text-gold fw-bold text-uppercase tracking-wider mb-3 d-block animate-fade-up-1" style="font-size: 0.9rem; letter-spacing: 0.1em;">
                        Media & Marketing Agency
                    </span>
                    <h1 class="display-4 fw-extrabold lh-sm mb-4 animate-fade-up-1">
                        <span class="interactive-title">Creative Marketing</span> <br>
                        That <span class="text-gold">Delivers Results</span>.
                    </h1>
                    <p class="lead text-muted mb-5 animate-fade-up-2">
                        We help brands grow with data-driven marketing, stunning content, and impactful experiences.
                    </p>
                    <div class="d-flex flex-wrap gap-3 animate-fade-up-3">
                        <a href="#contact" class="btn btn-gold px-4 py-3" aria-label="Start Your Project with UHE Media">
                            Start Your Project <i class="bi bi-arrow-up-right-short" aria-hidden="true" style="font-size: 1.2rem; line-height: 1;"></i>
                        </a>
                        <a href="#services" class="btn btn-outline-dark px-4 py-3" aria-label="View our services">
                            View Services <i class="bi bi-arrow-up-right-short" aria-hidden="true" style="font-size: 1.2rem; line-height: 1;"></i>
                        </a>
                    </div>
                    
                    <!-- Scroll Down Link -->
                    <div class="animate-fade-up-3">
                        <a href="#services" class="scroll-down-indicator" aria-label="Scroll down to services">
                            <i class="bi bi-arrow-down" aria-hidden="true"></i> Scroll Down
                        </a>
                    </div>
                </div>
            </div>
            
            <!-- Right Visual Asset Column -->
            <div class="col-lg-6 text-center text-lg-end">
                <div class="hero-image-container animate-fade-up-2">
                    <!-- Premium Generated Hero Image (Camera + Dubai Skyline + Yellow Circle) -->
                    <img src="{{ asset('images/hero.png') }}" alt="UHE Media professional production camera and Dubai skyline creative design" class="img-fluid" style="max-height: 520px; object-fit: contain;" width="520" height="520" fetchpriority="high">
                    
                    <!-- Interactive Play Button Overlay -->
                    <div class="play-button-overlay" data-bs-toggle="modal" data-bs-target="#videoModal" aria-label="Play showreel video" role="button">
                        <i class="bi bi-play-fill" aria-hidden="true"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Video Showreel Modal (Accessible and fully functional) -->
<div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="videoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content border-0 bg-dark rounded-4 overflow-hidden">
            <div class="modal-header border-0 bg-transparent text-end p-2">
                <button type="button" class="btn-close btn-close-white ms-auto shadow-none" data-bs-dismiss="modal" aria-label="Close modal"></button>
            </div>
            <div class="modal-body p-0">
                <!-- Premium aspect ratio video wrapper -->
                <div class="ratio ratio-16x9">
                    <iframe src="https://www.youtube.com/embed/dQw4w9WgXcQ" title="UHE Media Agency Showreel" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>
</div>
