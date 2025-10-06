<?php
/**
 * Title: Bootstrap Split Carousel
 * Slug: wp-fse-practice/bootstrap-split-carousel
 * Categories: wp-fse-practice
 * Description: A Bootstrap-powered split carousel with featured images on the left and highlighted blog posts on the right
 * Keywords: bootstrap, carousel, split, featured, highlight
 *
 * @package wp-fse-practice
 */
?>

<!-- wp:html -->
<div class="container-fluid my-5">
    <div class="row">
        <div class="col-12">
            <h2 class="text-center mb-4">Featured Blog Posts</h2>
        </div>
    </div>
    <div class="row">
        <!-- Left Side - Featured Images Carousel -->
        <div class="col-md-6">
            <div id="featuredImagesCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="4000">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#featuredImagesCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#featuredImagesCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#featuredImagesCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="ratio ratio-16x9">
                            <img src="https://via.placeholder.com/800x450/0066cc/ffffff?text=Featured+Post+1" class="d-block w-100 rounded" alt="Featured Post 1">
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="ratio ratio-16x9">
                            <img src="https://via.placeholder.com/800x450/cc6600/ffffff?text=Featured+Post+2" class="d-block w-100 rounded" alt="Featured Post 2">
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="ratio ratio-16x9">
                            <img src="https://via.placeholder.com/800x450/006600/ffffff?text=Featured+Post+3" class="d-block w-100 rounded" alt="Featured Post 3">
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#featuredImagesCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#featuredImagesCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
        
        <!-- Right Side - Blog Posts List -->
        <div class="col-md-6">
            <div class="h-100 d-flex flex-column justify-content-center">
                <!-- Post 1 -->
                <div class="blog-post-item p-3 mb-3 border rounded highlight-post-0" data-post-index="0">
                    <span class="badge bg-primary mb-2">Technology</span>
                    <h4 class="mb-2">
                        <a href="#" class="text-decoration-none text-dark">Understanding WordPress Full Site Editing</a>
                    </h4>
                    <p class="text-muted mb-2">Learn how to create amazing websites with WordPress's new Full Site Editing feature. Discover the power of block-based themes...</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <small class="text-muted">October 6, 2025</small>
                        <small class="text-muted">By Admin</small>
                    </div>
                </div>
                
                <!-- Post 2 -->
                <div class="blog-post-item p-3 mb-3 border rounded highlight-post-1" data-post-index="1">
                    <span class="badge bg-warning mb-2">Design</span>
                    <h4 class="mb-2">
                        <a href="#" class="text-decoration-none text-dark">Modern Web Design Trends 2025</a>
                    </h4>
                    <p class="text-muted mb-2">Explore the latest design trends that are shaping the web in 2025. From minimalism to bold typography and everything in between...</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <small class="text-muted">October 5, 2025</small>
                        <small class="text-muted">By Designer</small>
                    </div>
                </div>
                
                <!-- Post 3 -->
                <div class="blog-post-item p-3 mb-3 border rounded highlight-post-2" data-post-index="2">
                    <span class="badge bg-success mb-2">Development</span>
                    <h4 class="mb-2">
                        <a href="#" class="text-decoration-none text-dark">Building Responsive Layouts with Bootstrap 5</a>
                    </h4>
                    <p class="text-muted mb-2">Master the art of creating responsive web layouts using Bootstrap 5's powerful grid system and utility classes...</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <small class="text-muted">October 4, 2025</small>
                        <small class="text-muted">By Developer</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
/* Highlight styles for active post */
.blog-post-item {
    transition: all 0.3s ease;
    opacity: 0.7;
}

.blog-post-item.active {
    opacity: 1;
    background-color: #f8f9fa !important;
    border-color: #0d6efd !important;
    border-width: 2px !important;
}

.blog-post-item:hover {
    opacity: 1;
    transform: translateY(-2px);
    box-shadow: 0 4px 8px rgba(0,0,0,0.1);
}

/* Ensure carousel images maintain aspect ratio */
.carousel-item img {
    object-fit: cover;
}

/* Custom carousel control positioning */
.carousel-control-prev,
.carousel-control-next {
    width: 5%;
}

/* Make indicators more visible */
.carousel-indicators [data-bs-target] {
    background-color: rgba(255, 255, 255, 0.8);
}

.carousel-indicators .active {
    background-color: #0d6efd;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Initialize carousel
    const carousel = document.querySelector('#featuredImagesCarousel');
    const blogPosts = document.querySelectorAll('.blog-post-item');
    
    if (carousel && blogPosts.length > 0) {
        // Set initial active state
        blogPosts[0].classList.add('active');
        
        // Listen for carousel slide events
        carousel.addEventListener('slide.bs.carousel', function(event) {
            // Remove active class from all posts
            blogPosts.forEach(post => post.classList.remove('active'));
            
            // Add active class to corresponding post
            const activeIndex = event.to;
            if (blogPosts[activeIndex]) {
                blogPosts[activeIndex].classList.add('active');
            }
        });
        
        // Click on blog post to navigate carousel
        blogPosts.forEach((post, index) => {
            post.addEventListener('click', function() {
                const carouselInstance = bootstrap.Carousel.getInstance(carousel) || new bootstrap.Carousel(carousel);
                carouselInstance.to(index);
            });
        });
    }
});
</script>
<!-- /wp:html -->