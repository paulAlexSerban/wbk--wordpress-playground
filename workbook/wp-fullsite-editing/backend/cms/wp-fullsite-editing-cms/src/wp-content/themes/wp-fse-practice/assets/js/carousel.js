/**
 * Blog Carousel JavaScript
 * Handles carousel navigation, auto-play, and responsive behavior
 */
document.addEventListener('DOMContentLoaded', function() {
    const carousels = document.querySelectorAll('.blog-carousel-container');
    
    carousels.forEach(carousel => {
        initCarousel(carousel);
    });
});

function initCarousel(container) {
    const track = container.querySelector('.wp-block-post-template');
    const slides = container.querySelectorAll('.carousel-slide');
    const prevBtn = container.querySelector('.carousel-prev');
    const nextBtn = container.querySelector('.carousel-next');
    const dotsContainer = container.querySelector('.carousel-dots');
    
    if (!track || !slides.length) return;
    
    let currentIndex = 0;
    let slidesToShow = getSlidesToShow();
    const totalSlides = slides.length;
    const maxIndex = Math.max(0, totalSlides - slidesToShow);
    
    // Set CSS custom property for total slides
    track.style.setProperty('--total-slides', totalSlides);
    
    // Create dots
    createDots();
    
    // Initialize carousel
    updateCarousel();
    
    // Event listeners
    prevBtn?.addEventListener('click', () => {
        currentIndex = Math.max(0, currentIndex - 1);
        updateCarousel();
    });
    
    nextBtn?.addEventListener('click', () => {
        currentIndex = Math.min(maxIndex, currentIndex + 1);
        updateCarousel();
    });
    
    // Auto-play functionality
    let autoPlayInterval;
    startAutoPlay();
    
    // Pause auto-play on hover
    container.addEventListener('mouseenter', stopAutoPlay);
    container.addEventListener('mouseleave', startAutoPlay);
    
    // Handle window resize
    window.addEventListener('resize', debounce(() => {
        slidesToShow = getSlidesToShow();
        const newMaxIndex = Math.max(0, totalSlides - slidesToShow);
        if (currentIndex > newMaxIndex) {
            currentIndex = newMaxIndex;
        }
        updateCarousel();
    }, 250));
    
    // Touch/swipe support
    let startX = 0;
    let isDragging = false;
    
    track.addEventListener('touchstart', handleTouchStart, { passive: true });
    track.addEventListener('touchmove', handleTouchMove, { passive: true });
    track.addEventListener('touchend', handleTouchEnd, { passive: true });
    
    // Mouse drag support
    track.addEventListener('mousedown', handleMouseDown);
    track.addEventListener('mousemove', handleMouseMove);
    track.addEventListener('mouseup', handleMouseUp);
    track.addEventListener('mouseleave', handleMouseUp);
    
    function getSlidesToShow() {
        const width = window.innerWidth;
        if (width <= 768) return 1;
        if (width <= 1024) return 2;
        return 3;
    }
    
    function createDots() {
        if (!dotsContainer) return;
        
        dotsContainer.innerHTML = '';
        const numDots = Math.ceil(totalSlides / slidesToShow);
        
        for (let i = 0; i < numDots; i++) {
            const dot = document.createElement('button');
            dot.className = 'carousel-dot';
            dot.setAttribute('aria-label', `Go to slide group ${i + 1}`);
            dot.addEventListener('click', () => {
                currentIndex = i * slidesToShow;
                if (currentIndex > maxIndex) currentIndex = maxIndex;
                updateCarousel();
            });
            dotsContainer.appendChild(dot);
        }
    }
    
    function updateCarousel() {
        const translateX = -(currentIndex * (100 / slidesToShow));
        track.style.transform = `translateX(${translateX}%)`;
        
        // Update navigation buttons
        if (prevBtn) {
            prevBtn.disabled = currentIndex === 0;
        }
        if (nextBtn) {
            nextBtn.disabled = currentIndex >= maxIndex;
        }
        
        // Update dots
        const dots = dotsContainer?.querySelectorAll('.carousel-dot');
        dots?.forEach((dot, index) => {
            const isActive = Math.floor(currentIndex / slidesToShow) === index;
            dot.classList.toggle('active', isActive);
        });
        
        // Update ARIA attributes
        slides.forEach((slide, index) => {
            const isVisible = index >= currentIndex && index < currentIndex + slidesToShow;
            slide.setAttribute('aria-hidden', !isVisible);
        });
    }
    
    function startAutoPlay() {
        stopAutoPlay();
        autoPlayInterval = setInterval(() => {
            if (currentIndex >= maxIndex) {
                currentIndex = 0;
            } else {
                currentIndex++;
            }
            updateCarousel();
        }, 5000);
    }
    
    function stopAutoPlay() {
        if (autoPlayInterval) {
            clearInterval(autoPlayInterval);
            autoPlayInterval = null;
        }
    }
    
    function handleTouchStart(e) {
        startX = e.touches[0].clientX;
        isDragging = true;
        stopAutoPlay();
    }
    
    function handleTouchMove(e) {
        if (!isDragging) return;
        e.preventDefault();
    }
    
    function handleTouchEnd(e) {
        if (!isDragging) return;
        
        const endX = e.changedTouches[0].clientX;
        const diffX = startX - endX;
        const threshold = 50;
        
        if (Math.abs(diffX) > threshold) {
            if (diffX > 0 && currentIndex < maxIndex) {
                currentIndex++;
            } else if (diffX < 0 && currentIndex > 0) {
                currentIndex--;
            }
            updateCarousel();
        }
        
        isDragging = false;
        startAutoPlay();
    }
    
    function handleMouseDown(e) {
        startX = e.clientX;
        isDragging = true;
        track.style.cursor = 'grabbing';
        stopAutoPlay();
        e.preventDefault();
    }
    
    function handleMouseMove(e) {
        if (!isDragging) return;
        e.preventDefault();
    }
    
    function handleMouseUp(e) {
        if (!isDragging) return;
        
        const endX = e.clientX;
        const diffX = startX - endX;
        const threshold = 50;
        
        if (Math.abs(diffX) > threshold) {
            if (diffX > 0 && currentIndex < maxIndex) {
                currentIndex++;
            } else if (diffX < 0 && currentIndex > 0) {
                currentIndex--;
            }
            updateCarousel();
        }
        
        isDragging = false;
        track.style.cursor = 'grab';
        startAutoPlay();
    }
}

// Utility function for debouncing
function debounce(func, wait) {
    let timeout;
    return function executedFunction(...args) {
        const later = () => {
            clearTimeout(timeout);
            func(...args);
        };
        clearTimeout(timeout);
        timeout = setTimeout(later, wait);
    };
}

// Intersection Observer for performance optimization
if ('IntersectionObserver' in window) {
    const carouselObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            const carousel = entry.target;
            if (entry.isIntersecting) {
                carousel.classList.add('carousel-visible');
            } else {
                carousel.classList.remove('carousel-visible');
            }
        });
    }, {
        threshold: 0.1
    });
    
    // Observe all carousels when they're added to the DOM
    const observeCarousels = () => {
        document.querySelectorAll('.blog-carousel-container').forEach(carousel => {
            carouselObserver.observe(carousel);
        });
    };
    
    // Initial observation
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', observeCarousels);
    } else {
        observeCarousels();
    }
}