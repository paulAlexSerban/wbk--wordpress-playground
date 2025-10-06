<?php
/**
 * Title: Bootstrap Split Carousel with WordPress Posts
 * Slug: wp-fse-practice/bootstrap-wordpress-split-carousel
 * Categories: wp-fse-practice
 * Description: A Bootstrap-powered split carousel that dynamically loads WordPress posts - featured images on left, highlighted posts on right
 * Keywords: bootstrap, carousel, split, wordpress, posts, dynamic
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
        <!-- Left Side - WordPress Query for Featured Images Carousel -->
        <div class="col-md-6">
            <div id="wpFeaturedImagesCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="4000">
                <div class="carousel-indicators wp-carousel-indicators">
                    <!-- Indicators will be populated by WordPress -->
                </div>
                <div class="carousel-inner wp-carousel-inner">
                    <!-- Images will be populated by WordPress -->
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#wpFeaturedImagesCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#wpFeaturedImagesCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
        
        <!-- Right Side - WordPress Posts List -->
        <div class="col-md-6">
            <div class="h-100 d-flex flex-column justify-content-center wp-posts-container">
                <!-- Posts will be populated by WordPress -->
            </div>
        </div>
    </div>
</div>

<style>
/* Highlight styles for active post */
.wp-blog-post-item {
    transition: all 0.3s ease;
    opacity: 0.7;
    cursor: pointer;
}

.wp-blog-post-item.active {
    opacity: 1;
    background-color: #f8f9fa !important;
    border-color: #0d6efd !important;
    border-width: 2px !important;
}

.wp-blog-post-item:hover {
    opacity: 1;
    transform: translateY(-2px);
    box-shadow: 0 4px 8px rgba(0,0,0,0.1);
}

/* Ensure carousel images maintain aspect ratio */
.carousel-item img {
    object-fit: cover;
    height: 400px;
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

/* Loading state */
.wp-loading {
    text-align: center;
    padding: 2rem;
}

/* Category badges */
.wp-post-category {
    font-size: 0.75rem;
    padding: 0.25rem 0.75rem;
    border-radius: 1rem;
    text-transform: uppercase;
    font-weight: 600;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    loadWordPressPosts();
});

async function loadWordPressPosts() {
    try {
        // Get the correct WordPress site URL
        const siteUrl = window.location.origin;
        const restUrl = `${siteUrl}/wp-json/wp/v2/posts?per_page=3&_embed`;
        
        console.log('Trying to fetch from:', restUrl);
        
        const response = await fetch(restUrl);
        
        // Check if response is ok
        if (!response.ok) {
            throw new Error(`HTTP error! status: ${response.status}`);
        }
        
        // Check if response is JSON
        const contentType = response.headers.get('content-type');
        if (!contentType || !contentType.includes('application/json')) {
            console.error('Response is not JSON, falling back to static content');
            showFallbackContent();
            return;
        }
        
        const posts = await response.json();
        
        if (posts && posts.length > 0) {
            initializeCarouselWithPosts(posts);
        } else {
            showFallbackContent();
        }
    } catch (error) {
        console.error('Error loading WordPress posts:', error);
        showFallbackContent();
    }
}

function initializeCarouselWithPosts(posts) {
    const carouselInner = document.querySelector('.wp-carousel-inner');
    const carouselIndicators = document.querySelector('.wp-carousel-indicators');
    const postsContainer = document.querySelector('.wp-posts-container');
    
    if (!carouselInner || !carouselIndicators || !postsContainer) return;
    
    // Clear containers
    carouselInner.innerHTML = '';
    carouselIndicators.innerHTML = '';
    postsContainer.innerHTML = '';
    
    posts.forEach((post, index) => {
        // Create carousel slide
        const carouselItem = document.createElement('div');
        carouselItem.className = `carousel-item ${index === 0 ? 'active' : ''}`;
        
        const featuredImage = post._embedded && post._embedded['wp:featuredmedia'] && post._embedded['wp:featuredmedia'][0];
        const imageUrl = featuredImage ? featuredImage.source_url : 'https://via.placeholder.com/800x400/0066cc/ffffff?text=No+Image';
        
        carouselItem.innerHTML = `
            <div class="ratio ratio-16x9">
                <img src="${imageUrl}" class="d-block w-100 rounded" alt="${post.title.rendered}">
            </div>
        `;
        carouselInner.appendChild(carouselItem);
        
        // Create indicator
        const indicator = document.createElement('button');
        indicator.type = 'button';
        indicator.setAttribute('data-bs-target', '#wpFeaturedImagesCarousel');
        indicator.setAttribute('data-bs-slide-to', index);
        indicator.setAttribute('aria-label', `Slide ${index + 1}`);
        if (index === 0) {
            indicator.className = 'active';
            indicator.setAttribute('aria-current', 'true');
        }
        carouselIndicators.appendChild(indicator);
        
        // Create post item
        const categories = post._embedded && post._embedded['wp:term'] && post._embedded['wp:term'][0] ? post._embedded['wp:term'][0] : [];
        const primaryCategory = categories.length > 0 ? categories[0].name : 'Uncategorized';
        
        const postDate = new Date(post.date).toLocaleDateString('en-US', {
            year: 'numeric',
            month: 'long',
            day: 'numeric'
        });
        
        const author = post._embedded && post._embedded.author && post._embedded.author[0] ? post._embedded.author[0].name : 'Admin';
        
        const postItem = document.createElement('div');
        postItem.className = `wp-blog-post-item p-3 mb-3 border rounded ${index === 0 ? 'active' : ''}`;
        postItem.setAttribute('data-post-index', index);
        
        // Get excerpt (limit to ~100 characters)
        const excerpt = post.excerpt.rendered.replace(/<[^>]*>/g, '').substring(0, 100) + '...';
        
        // Define category colors
        const categoryColors = ['primary', 'warning', 'success', 'info', 'danger'];
        const categoryColor = categoryColors[index % categoryColors.length];
        
        postItem.innerHTML = `
            <span class="badge bg-${categoryColor} mb-2 wp-post-category">${primaryCategory}</span>
            <h4 class="mb-2">
                <a href="${post.link}" class="text-decoration-none text-dark">${post.title.rendered}</a>
            </h4>
            <p class="text-muted mb-2">${excerpt}</p>
            <div class="d-flex justify-content-between align-items-center">
                <small class="text-muted">${postDate}</small>
                <small class="text-muted">By ${author}</small>
            </div>
        `;
        
        postsContainer.appendChild(postItem);
    });
    
    // Initialize carousel functionality
    initializeCarouselInteraction();
}

function initializeCarouselInteraction() {
    const carousel = document.querySelector('#wpFeaturedImagesCarousel');
    const blogPosts = document.querySelectorAll('.wp-blog-post-item');
    
    if (carousel && blogPosts.length > 0) {
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
}

function showFallbackContent() {
    const carouselInner = document.querySelector('.wp-carousel-inner');
    const carouselIndicators = document.querySelector('.wp-carousel-indicators');
    const postsContainer = document.querySelector('.wp-posts-container');
    
    // Create fallback carousel with sample content
    if (carouselInner) {
        carouselInner.innerHTML = `
            <div class="carousel-item active">
                <div class="ratio ratio-16x9">
                    <img src="https://via.placeholder.com/800x450/0066cc/ffffff?text=Sample+Post+1" class="d-block w-100 rounded" alt="Sample Post 1">
                </div>
                <div class="carousel-caption d-none d-md-block" style="background: rgba(0,0,0,0.7); border-radius: 10px; padding: 1rem;">
                    <h5>Welcome to WordPress FSE</h5>
                    <p>Learn about Full Site Editing with our comprehensive guide</p>
                </div>
            </div>
            <div class="carousel-item">
                <div class="ratio ratio-16x9">
                    <img src="https://via.placeholder.com/800x450/cc6600/ffffff?text=Sample+Post+2" class="d-block w-100 rounded" alt="Sample Post 2">
                </div>
                <div class="carousel-caption d-none d-md-block" style="background: rgba(0,0,0,0.7); border-radius: 10px; padding: 1rem;">
                    <h5>Building Modern Websites</h5>
                    <p>Discover the power of block-based themes and patterns</p>
                </div>
            </div>
            <div class="carousel-item">
                <div class="ratio ratio-16x9">
                    <img src="https://via.placeholder.com/800x450/006600/ffffff?text=Sample+Post+3" class="d-block w-100 rounded" alt="Sample Post 3">
                </div>
                <div class="carousel-caption d-none d-md-block" style="background: rgba(0,0,0,0.7); border-radius: 10px; padding: 1rem;">
                    <h5>Advanced WordPress Features</h5>
                    <p>Explore custom patterns, templates, and theme development</p>
                </div>
            </div>
        `;
    }
    
    // Create fallback indicators
    if (carouselIndicators) {
        carouselIndicators.innerHTML = `
            <button type="button" data-bs-target="#wpFeaturedImagesCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#wpFeaturedImagesCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#wpFeaturedImagesCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
        `;
    }
    
    // Create fallback posts
    if (postsContainer) {
        postsContainer.innerHTML = `
            <div class="wp-blog-post-item p-3 mb-3 border rounded active" data-post-index="0">
                <span class="badge bg-primary mb-2">WordPress</span>
                <h4 class="mb-2">
                    <a href="#" class="text-decoration-none text-dark">Welcome to WordPress FSE</a>
                </h4>
                <p class="text-muted mb-2">Learn about Full Site Editing with our comprehensive guide. Discover how to create amazing websites using block-based themes and the power of WordPress patterns.</p>
                <div class="d-flex justify-content-between align-items-center">
                    <small class="text-muted">October 6, 2025</small>
                    <small class="text-muted">By Admin</small>
                </div>
            </div>
            
            <div class="wp-blog-post-item p-3 mb-3 border rounded" data-post-index="1">
                <span class="badge bg-warning mb-2">Development</span>
                <h4 class="mb-2">
                    <a href="#" class="text-decoration-none text-dark">Building Modern Websites</a>
                </h4>
                <p class="text-muted mb-2">Discover the power of block-based themes and patterns. Learn how to create responsive, dynamic websites that adapt to your content needs automatically.</p>
                <div class="d-flex justify-content-between align-items-center">
                    <small class="text-muted">October 5, 2025</small>
                    <small class="text-muted">By Developer</small>
                </div>
            </div>
            
            <div class="wp-blog-post-item p-3 mb-3 border rounded" data-post-index="2">
                <span class="badge bg-success mb-2">Advanced</span>
                <h4 class="mb-2">
                    <a href="#" class="text-decoration-none text-dark">Advanced WordPress Features</a>
                </h4>
                <p class="text-muted mb-2">Explore custom patterns, templates, and theme development. Master the art of creating professional WordPress websites with modern development practices.</p>
                <div class="d-flex justify-content-between align-items-center">
                    <small class="text-muted">October 4, 2025</small>
                    <small class="text-muted">By Expert</small>
                </div>
            </div>
        `;
    }
    
    // Initialize carousel interaction with fallback content
    initializeCarouselInteraction();
    }
    
    if (postsContainer) {
        postsContainer.innerHTML = `
            <div class="text-center">
                <p class="text-muted">No blog posts found. Please add some posts to see them here.</p>
            </div>
        `;
    }
}
</script>
<!-- /wp:html -->