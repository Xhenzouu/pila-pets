<!-- Full-Viewport Hero Banner Emphasizing PAWS Family -->
<section class="position-relative overflow-hidden" style="min-height: 100vh; margin-top: -76px; padding-top: 76px;">
    <!-- Background Image: PAWS Volunteers Group (Full bleed) -->
    <div class="position-absolute top-0 start-0 w-100 h-100" 
         style="background: url('https://paws.org.ph/wp-content/uploads/2022/06/Dog-Volunteers.jpg') no-repeat center center; 
                background-size: cover; 
                z-index: 0;"></div>

    <!-- Dark overlay for text readability -->
    <div class="position-absolute top-0 start-0 w-100 h-100 bg-dark opacity-50" style="z-index: 1;"></div>

    <!-- Content - Text on the left, no foreground image on the right -->
    <div class="container position-relative h-100" style="z-index: 2;">
        <div class="row align-items-center justify-content-center min-vh-100 g-5">
            <!-- Text Column (Left) -->
            <div class="col-lg-6 text-white">
                <h1 class="display-3 fw-bold mb-4 text-shadow">
                    Welcome to the PAWS Family
                </h1>
                <h3 class="mb-4 text-shadow opacity-95">
                    The Pet Adoption & Welfare Society of Pila
                </h3>
                <p class="lead mb-4 text-shadow">
                    We're more than a platform — we're a caring community of volunteers and animal lovers dedicated to reuniting lost pets, finding forever homes, and protecting animals in Pila, Laguna.
                </p>
                <p class="mb-5 fs-5 text-shadow opacity-90">
                    Join the PAWS family today and make a difference, one paw at a time.
                </p>
                <div class="d-flex flex-column flex-sm-row gap-3">
                    <a href="<?= base_url('resident/browse') ?>" 
                       class="btn btn-outline-light btn-lg px-5 py-3 shadow me-sm-3">
                        <i class="bi bi-search-heart me-2"></i> Explore Pets
                    </a>
                    <a href="<?= base_url('resident/register-pet') ?>" 
                       class="btn btn-light btn-lg px-5 py-3 shadow">
                        <i class="bi bi-plus-circle me-2"></i> Register a Pet
                    </a>
                </div>
            </div>

            <!-- Right Column - Empty (background image fills the space) -->
            <div class="col-lg-6">
                <!-- No foreground image here - background does the work -->
            </div>
        </div>
    </div>

    <!-- Scroll down indicator -->
    <div class="position-absolute bottom-0 start-50 translate-middle-x mb-4 text-white" style="z-index: 2;">
        <i class="bi bi-chevron-down fs-1 animate-bounce"></i>
    </div>
</section>

<!-- Styles -->
<style>
    .text-shadow {
        text-shadow: 2px 2px 10px rgba(0,0,0,0.9);
    }
    .animate-bounce {
        animation: bounce 2s infinite;
    }
    @keyframes bounce {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-15px); }
    }
</style>