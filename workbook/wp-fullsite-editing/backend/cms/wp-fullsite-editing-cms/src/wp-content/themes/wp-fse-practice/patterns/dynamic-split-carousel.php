<?php
/**
 * Title: Dynamic Split Carousel with WordPress Query
 * Slug: wp-fse-practice/dynamic-split-carousel
 * Categories: wp-fse-practice
 * Description: A dynamic split carousel using WordPress Query blocks - featured images carousel on left, editable post list on right with Bootstrap synchronization
 * Keywords: carousel, query, dynamic, bootstrap, split, editable
 *
 * @package wp-fse-practice
 */
?>

<!-- wp:group {"className":"dynamic-split-carousel-container","style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50","left":"var:preset|spacing|30","right":"var:preset|spacing|30"}}},"layout":{"type":"constrained","contentSize":"1200px"}} -->
<div class="wp-block-group dynamic-split-carousel-container" style="padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--30)">

<!-- wp:heading {"textAlign":"center","level":2,"className":"carousel-main-title","fontSize":"x-large"} -->
<h2 class="wp-block-heading has-text-align-center carousel-main-title has-x-large-font-size">Featured Blog Posts</h2>
<!-- /wp:heading -->

<!-- wp:spacer {"height":"40px"} -->
<div style="height:40px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:html -->
<div class="container-fluid">
    <div class="row">
        <!-- Left Side - Featured Images Carousel -->
        <div class="col-lg-6 mb-4 mb-lg-0">
            <div id="dynamicFeaturedCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">
                <div class="carousel-indicators dynamic-carousel-indicators">
                    <!-- Indicators populated by JavaScript -->
                </div>
                <div class="carousel-inner dynamic-carousel-inner" style="border-radius: 15px; overflow: hidden; box-shadow: 0 10px 30px rgba(0,0,0,0.2);">
                    <!-- Slides populated by JavaScript -->
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#dynamicFeaturedCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#dynamicFeaturedCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
        
        <!-- Right Side - WordPress Query Posts -->
        <div class="col-lg-6">
            <div class="posts-list-container h-100 d-flex flex-column justify-content-center">
<!-- /wp:html -->

<!-- wp:query {"queryId":50,"query":{"perPage":3,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false},"className":"dynamic-posts-query"} -->
<div class="wp-block-query dynamic-posts-query">

<!-- wp:post-template {"className":"dynamic-posts-template","layout":{"type":"default","columnCount":1}} -->

<!-- wp:group {"className":"dynamic-post-item","style":{"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"var:preset|spacing|30","right":"var:preset|spacing|30"}},"border":{"radius":"12px","width":"1px"}},"borderColor":"contrast-2","layout":{"type":"constrained"}} -->
<div class="wp-block-group dynamic-post-item has-border-color has-contrast-2-border-color" style="border-width:1px;border-radius:12px;padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)">

<!-- wp:post-featured-image {"isLink":false,"className":"d-none post-featured-image-data"} /-->

<!-- wp:post-terms {"term":"category","className":"post-category-badge","style":{"typography":{"fontSize":"12px","fontWeight":"600","textTransform":"uppercase"}}} /-->

<!-- wp:post-title {"level":4,"isLink":true,"className":"post-title-link","style":{"typography":{"fontWeight":"700","lineHeight":"1.3"},"spacing":{"margin":{"bottom":"var:preset|spacing|20"}}},"fontSize":"large"} /-->

<!-- wp:post-excerpt {"moreText":"Read More →","excerptLength":20,"className":"post-excerpt-text","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|20"}}}} /-->

<!-- wp:group {"className":"post-meta-info","style":{"spacing":{"blockGap":"var:preset|spacing|10"}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
<div class="wp-block-group post-meta-info">

<!-- wp:post-date {"format":"M j, Y","className":"post-date-info","style":{"typography":{"fontSize":"14px"}}} /-->

<!-- wp:post-author {"showAvatar":false,"byline":"By","className":"post-author-info","style":{"typography":{"fontSize":"14px"}}} /-->

</div>
<!-- /wp:group -->

</div>
<!-- /wp:group -->

<!-- /wp:post-template -->

</div>
<!-- /wp:query -->

<!-- wp:html -->
            </div>
        </div>
    </div>
</div>

<style>
.dynamic-split-carousel-container {
    position: relative;
}

.dynamic-post-item {
    transition: all 0.4s ease;
    opacity: 0.6;
    cursor: pointer;
    transform: translateX(10px);
    margin-bottom: 1rem;
}

.dynamic-post-item.active {
    opacity: 1;
    background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%) !important;
    border-color: #0d6efd !important;
    border-width: 2px !important;
    transform: translateX(0px) scale(1.02);
    box-shadow: 0 8px 25px rgba(13, 110, 253, 0.15);
}

.dynamic-post-item:hover {
    opacity: 1;
    transform: translateX(0px) translateY(-3px);
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
}

.carousel-item img {
    object-fit: cover;
    height: 450px;
    width: 100%;
}

.carousel-fade .carousel-item {
    opacity: 0;
    transition-property: opacity;
    transform: none;
}

.carousel-fade .carousel-item.active {
    opacity: 1;
}

.carousel-indicators {
    bottom: -50px;
}

.carousel-indicators [data-bs-target] {
    width: 12px;
    height: 12px;
    border-radius: 50%;
    background-color: rgba(255, 255, 255, 0.5);
    border: 2px solid #fff;
}

.carousel-indicators .active {
    background-color: #0d6efd;
    transform: scale(1.2);
}

.post-category-badge a {
    background: linear-gradient(135deg, #0d6efd, #6610f2);
    color: white !important;
    padding: 0.25rem 0.75rem;
    border-radius: 15px;
    text-decoration: none;
    font-size: 0.75rem;
    font-weight: 600;
    text-transform: uppercase;
    display: inline-block;
}

.post-title-link a {
    color: inherit;
    text-decoration: none;
    transition: color 0.3s ease;
}

.post-title-link a:hover {
    color: #0d6efd;
}

.post-excerpt-text {
    color: #6c757d;
    line-height: 1.6;
}

.post-meta-info {
    color: #6c757d;
    font-size: 0.875rem;
}

.post-featured-image-data {
    display: none !important;
}

@media (max-width: 991px) {
    .col-lg-6:first-child {
        margin-bottom: 2rem;
    }
    .carousel-item img {
        height: 300px;
    }
}

@media (max-width: 576px) {
    .dynamic-post-item {
        transform: none;
    }
    .dynamic-post-item.active {
        transform: scale(1.01);
    }
    .carousel-item img {
        height: 250px;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    initializeDynamicSplitCarousel();
});

function initializeDynamicSplitCarousel() {
    const postItems = document.querySelectorAll('.dynamic-post-item');
    const carouselInner = document.querySelector('.dynamic-carousel-inner');
    const carouselIndicators = document.querySelector('.dynamic-carousel-indicators');
    const carousel = document.querySelector('#dynamicFeaturedCarousel');
    
    if (!postItems.length || !carouselInner || !carouselIndicators) {
        showCarouselLoading();
        return;
    }
    
    const postsData = extractPostsData(postItems);
    
    if (postsData.length === 0) {
        showCarouselLoading();
        return;
    }
    
    buildCarouselSlides(postsData, carouselInner, carouselIndicators);
    setupCarouselInteractions(carousel, postItems);
    
    if (postItems[0]) {
        postItems[0].classList.add('active');
    }
}

function extractPostsData(postItems) {
    const postsData = [];
    
    postItems.forEach((item, index) => {
        const featuredImage = item.querySelector('.post-featured-image-data img');
        const title = item.querySelector('.post-title-link a');
        const category = item.querySelector('.post-category-badge a');
        
        const postData = {
            index: index,
            title: title ? title.textContent.trim() : `Post ${index + 1}`,
            link: title ? title.href : '#',
            featuredImage: featuredImage ? featuredImage.src : getPlaceholderImage(index),
            category: category ? category.textContent.trim() : 'Uncategorized'
        };
        
        postsData.push(postData);
    });
    
    return postsData;
}

function buildCarouselSlides(postsData, carouselInner, carouselIndicators) {
    carouselInner.innerHTML = '';
    carouselIndicators.innerHTML = '';
    
    postsData.forEach((post, index) => {
        const slide = document.createElement('div');
        slide.className = `carousel-item${index === 0 ? ' active' : ''}`;
        slide.innerHTML = `
            <img src="${post.featuredImage}" 
                 class="d-block w-100" 
                 alt="${post.title}"
                 onerror="this.src='${getPlaceholderImage(index)}'">
            <div class="carousel-caption d-none d-md-block" style="background: rgba(0,0,0,0.7); border-radius: 10px; padding: 1rem;">
                <h5>${post.title}</h5>
                <p>Click to read more about this post</p>
            </div>
        `;
        carouselInner.appendChild(slide);
        
        const indicator = document.createElement('button');
        indicator.type = 'button';
        indicator.setAttribute('data-bs-target', '#dynamicFeaturedCarousel');
        indicator.setAttribute('data-bs-slide-to', index);
        indicator.setAttribute('aria-label', `Slide ${index + 1}`);
        if (index === 0) {
            indicator.className = 'active';
            indicator.setAttribute('aria-current', 'true');
        }
        carouselIndicators.appendChild(indicator);
    });
}

function setupCarouselInteractions(carousel, postItems) {
    if (!carousel || !postItems.length) return;
    
    carousel.addEventListener('slide.bs.carousel', function(event) {
        postItems.forEach(post => post.classList.remove('active'));
        
        const activeIndex = event.to;
        if (postItems[activeIndex]) {
            postItems[activeIndex].classList.add('active');
        }
    });
    
    postItems.forEach((post, index) => {
        post.addEventListener('click', function(e) {
            if (e.target.tagName === 'A') return;
            
            const carouselInstance = bootstrap.Carousel.getInstance(carousel) || new bootstrap.Carousel(carousel);
            carouselInstance.to(index);
        });
    });
    
    carousel.addEventListener('mouseenter', function() {
        const carouselInstance = bootstrap.Carousel.getInstance(carousel);
        if (carouselInstance) {
            carouselInstance.pause();
        }
    });
    
    carousel.addEventListener('mouseleave', function() {
        const carouselInstance = bootstrap.Carousel.getInstance(carousel);
        if (carouselInstance) {
            carouselInstance.cycle();
        }
    });
}

function getPlaceholderImage(index) {
    const colors = ['0066cc', 'cc6600', '006600', 'cc0066', '6600cc'];
    const color = colors[index % colors.length];
    return `https://lipsum.app/random/800x400`;
}

function showCarouselLoading() {
    const carouselInner = document.querySelector('.dynamic-carousel-inner');
    if (carouselInner) {
        carouselInner.innerHTML = `
            <div style="display: flex; align-items: center; justify-content: center; height: 450px; background: #f8f9fa; border-radius: 15px;">
                <div class="text-center">
                    <div class="spinner-border text-primary mb-3" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                    <p class="text-muted">Loading featured posts...</p>
                </div>
            </div>
        `;
    }
}

if (typeof wp !== 'undefined' && wp.data) {
    wp.data.subscribe(function() {
        setTimeout(initializeDynamicSplitCarousel, 500);
    });
}
</script>
<!-- /wp:html -->

</div>
<!-- /wp:group -->
