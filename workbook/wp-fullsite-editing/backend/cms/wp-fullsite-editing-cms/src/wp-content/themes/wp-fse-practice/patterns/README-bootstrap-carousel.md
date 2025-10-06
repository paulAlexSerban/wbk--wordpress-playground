# Bootstrap Split Carousel Patterns

Two Bootstrap-powered carousel patterns that create a split-screen layout with featured images on the left and highlighted blog posts on the right.

## 🎠 **Pattern Overview**

### **Pattern 1: Static Bootstrap Split Carousel**
- **File**: `bootstrap-split-carousel.php`
- **Content**: Static demo content with placeholder images
- **Use Case**: Quick demonstration and testing

### **Pattern 2: Dynamic WordPress Split Carousel**
- **File**: `bootstrap-wordpress-split-carousel.php` 
- **Content**: Dynamically loads actual WordPress posts via REST API
- **Use Case**: Production websites with real content

## ✨ **Key Features**

### **🎯 Split Layout Design**
- **Left Side**: Bootstrap carousel with featured images (16:9 aspect ratio)
- **Right Side**: List of 3 blog posts with highlighting
- **Responsive**: Stacks vertically on mobile devices

### **🔄 Interactive Synchronization**
- **Auto-highlight**: Blog post highlights based on active carousel slide
- **Click navigation**: Click any blog post to jump to its image
- **Auto-advance**: 4-second intervals with pause on hover
- **Bootstrap controls**: Previous/next arrows and dot indicators

### **📱 Bootstrap 5 Integration**
- **CDN loaded**: Bootstrap 5.3.2 CSS and JS from jsdelivr
- **Responsive grid**: Uses Bootstrap's grid system
- **Utility classes**: Bootstrap spacing, colors, and typography
- **Component**: Native Bootstrap carousel with all features

## 🚀 **Setup & Usage**

### **1. Automatic Bootstrap Loading**
Bootstrap is automatically loaded via functions.php:
```php
// Bootstrap CSS
wp_enqueue_style('bootstrap', 'cdn.jsdelivr.net/npm/bootstrap@5.3.2/...')

// Bootstrap JavaScript  
wp_enqueue_script('bootstrap', 'cdn.jsdelivr.net/npm/bootstrap@5.3.2/...')
```

### **2. Insert Pattern in Block Editor**
1. **Open Block Editor** on any page/post
2. **Click "+" button** to add new block
3. **Search "Bootstrap Split"** or browse patterns
4. **Select from "FSE Practice"** category
5. **Choose static or dynamic version**

### **3. Customize Content**

#### **Static Version** (`bootstrap-split-carousel.php`)
Edit the HTML directly in the pattern file:
- **Images**: Update `src` attributes with your image URLs
- **Content**: Modify titles, excerpts, dates, authors
- **Categories**: Change badge colors and text

#### **Dynamic Version** (`bootstrap-wordpress-split-carousel.php`)
Automatically pulls from WordPress:
- **Posts**: Shows latest 3 posts with featured images
- **REST API**: Uses `/wp-json/wp/v2/posts?per_page=3&_embed`
- **Fallback**: Shows placeholder content if no posts exist

## 🎨 **Styling & Customization**

### **Built-in Styles**
```css
/* Active post highlighting */
.wp-blog-post-item.active {
    background-color: #f8f9fa;
    border-color: #0d6efd;
    border-width: 2px;
}

/* Hover effects */
.wp-blog-post-item:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 8px rgba(0,0,0,0.1);
}

/* Image aspect ratio */
.carousel-item img {
    object-fit: cover;
    height: 400px;
}
```

### **Color Customization**
Change category badge colors:
```javascript
const categoryColors = ['primary', 'warning', 'success', 'info', 'danger'];
```

### **Timing Adjustment**
Modify auto-advance speed:
```html
<div class="carousel slide" data-bs-interval="4000"> <!-- 4 seconds -->
```

## 🔧 **Technical Details**

### **Bootstrap Components Used**
- ✅ **Carousel**: Main image slider with controls
- ✅ **Grid System**: Responsive col-md-6 layout  
- ✅ **Cards/Borders**: Post styling with Bootstrap classes
- ✅ **Badges**: Category indicators
- ✅ **Utilities**: Spacing, typography, colors

### **JavaScript Functionality**
- **Event Listeners**: `slide.bs.carousel` for synchronization
- **Bootstrap API**: `carousel.to(index)` for navigation
- **REST API**: Fetch WordPress posts dynamically
- **Error Handling**: Fallback content if API fails

### **Responsive Behavior**
```css
/* Desktop: Side by side */
.col-md-6 { width: 50%; }

/* Mobile: Stacked */
@media (max-width: 768px) {
    .col-md-6 { width: 100%; }
}
```

## ⚡ **Performance Features**

### **CDN Delivery**
- **Bootstrap CSS/JS**: Loaded from jsdelivr CDN
- **Caching**: Browser caching via CDN
- **Compression**: Minified files for faster loading

### **Lazy Loading**
- **Images**: Use `loading="lazy"` attribute if needed
- **API Calls**: Only loads when pattern is inserted
- **Error Handling**: Graceful fallbacks prevent crashes

### **Optimization Tips**
1. **Use featured images**: Ensure posts have featured images set
2. **Limit posts**: Pattern loads only 3 posts for performance
3. **Cache API**: Consider caching REST API responses
4. **Image sizes**: Use appropriate image dimensions (800x450 recommended)

## 🔧 **Troubleshooting**

### **Carousel Not Working**
1. **Check Bootstrap**: Verify Bootstrap JS is loaded
2. **Console Errors**: Check browser console for JavaScript errors
3. **IDs**: Ensure carousel ID is unique if multiple on page

### **Posts Not Loading (Dynamic Version)**
1. **REST API**: Verify `/wp-json/wp/v2/posts` endpoint works
2. **CORS**: Check for cross-origin issues
3. **Permissions**: Ensure REST API is enabled
4. **Fallback**: Pattern shows placeholder content on API failure

### **Styling Issues**
1. **Bootstrap Conflicts**: Check for CSS conflicts with theme
2. **Responsive**: Test on different screen sizes
3. **Images**: Verify image URLs and aspect ratios

## 🎯 **Use Cases**

### **Perfect For:**
- ✅ **Homepage hero sections** with featured content
- ✅ **Blog archive pages** with highlighted posts  
- ✅ **Portfolio showcases** with project highlights
- ✅ **News sections** with featured articles
- ✅ **Product showcases** with feature highlights

### **Customization Ideas**
- **Category filtering**: Filter posts by specific categories
- **Custom post types**: Adapt for portfolios, products, etc.
- **More posts**: Increase from 3 to 5-6 posts
- **Video backgrounds**: Replace images with video content
- **Animation effects**: Add custom CSS animations

## 📚 **Dependencies**

- ✅ **Bootstrap 5.3.2**: Automatically loaded via CDN
- ✅ **WordPress REST API**: For dynamic content loading
- ✅ **Modern Browser**: ES6+ JavaScript features
- ✅ **Featured Images**: WordPress posts should have featured images set

Both patterns are ready to use immediately and will appear in your WordPress pattern inserter under the "FSE Practice" category! 🎉