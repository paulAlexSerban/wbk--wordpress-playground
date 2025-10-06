# WordPress Full Site Editing (FSE) Practice Theme

A comprehensive WordPress child theme that demonstrates the power of Full Site Editing by extending the Twenty Twenty-Five theme with custom features.

## 🎯 What We Built

This theme showcases the key concepts of WordPress Full Site Editing:

### 1. **Child Theme Structure**
- Inherits from Twenty Twenty-Five theme using `Template: twentytwentyfive`
- Custom `theme.json` with design system (colors, typography, spacing)
- Enhanced `functions.php` with theme support and optimizations

### 2. **Template Parts** (`/parts/`)
- **Header** (`header.html`): Custom navigation with site title and menu
- **Footer** (`footer.html`): Multi-column footer with links and contact info
- **Sidebar** (`sidebar.html`): Recent posts, categories, and tag cloud

### 3. **Custom Templates** (`/templates/`)
- **Index** (`index.html`): Main blog listing with sidebar
- **Single** (`single.html`): Individual post template with comments
- **Page** (`page.html`): Static page template
- **Custom Home** (`custom-home.html`): Special homepage with hero section

### 4. **Block Patterns** (`/patterns/`)
- **Hero Section**: Call-to-action with gradient background
- **Testimonials**: Customer testimonials in card layout
- **Feature Cards**: Service highlights with icons and descriptions

### 5. **Design System** (`theme.json`)
```json
{
  "colors": {
    "primary": "#2563eb",
    "secondary": "#7c3aed", 
    "accent": "#059669"
  },
  "typography": {
    "fontSizes": ["14px", "18px", "24px", "32px"]
  },
  "spacing": {
    "small": "1rem",
    "medium": "2rem",
    "large": "3rem"
  }
}
```

## 🔧 How FSE Works

### Template Hierarchy
1. **Templates** define page structure using HTML + block markup
2. **Template Parts** are reusable components (header, footer, sidebar)
3. **Block Patterns** are pre-designed content layouts
4. **theme.json** controls design system and editor settings

### Block Markup Syntax
```html
<!-- wp:group {"className":"custom-class"} -->
<div class="wp-block-group custom-class">
    <!-- wp:heading {"level":1,"fontSize":"large"} -->
    <h1 class="wp-block-heading has-large-font-size">Title</h1>
    <!-- /wp:heading -->
</div>
<!-- /wp:group -->
```

### Template Parts Usage
```html
<!-- Include header template part -->
<!-- wp:template-part {"slug":"header","tagName":"header"} /-->

<!-- Include footer template part -->
<!-- wp:template-part {"slug":"footer","tagName":"footer"} /-->
```

## 🎨 Key Features Demonstrated

### 1. **Child Theme Inheritance**
- Extends Twenty Twenty-Five functionality
- Overrides templates while keeping parent theme updates
- Custom CSS builds upon parent theme styles

### 2. **Block-Based Templates**
- No PHP template files needed
- Visual editing in WordPress admin
- Consistent with Gutenberg editor

### 3. **Custom Design System**
- Predefined colors, fonts, and spacing
- Consistent across all blocks and patterns
- Easy to modify via theme.json

### 4. **Responsive Design**
- Mobile-first approach
- Flexible layouts using CSS Grid and Flexbox
- Responsive images and typography

### 5. **Performance Optimizations**
- Minimal CSS and JavaScript
- Efficient block rendering
- Optimized image sizes

## 📱 Templates Explained

### Index Template (`index.html`)
- **Purpose**: Main blog page
- **Features**: Post loop, pagination, sidebar
- **Blocks Used**: Query, Post Template, Columns

### Single Template (`single.html`)
- **Purpose**: Individual blog posts
- **Features**: Featured image, content, comments, tags
- **Blocks Used**: Post Title, Post Content, Comments

### Custom Home Template (`custom-home.html`)
- **Purpose**: Special homepage design
- **Features**: Hero section, featured posts, call-to-action
- **Blocks Used**: Group, Heading, Buttons, Query

## 🎯 Block Patterns Explained

### Hero Section Pattern
```php
// Pattern registration
Title: Hero Section
Slug: wp-fse-practice/hero-section
Categories: featured
```
- Gradient background
- Centered content
- Call-to-action buttons
- Fully responsive

### Testimonials Pattern
- Three-column layout
- Customer quotes with attribution
- Consistent styling
- Hover effects

## 🚀 How to Use This Theme

### 1. **Activate the Theme**
1. Upload to `/wp-content/themes/`
2. Activate in WordPress admin
3. Go to Appearance > Site Editor

### 2. **Customize Templates**
1. Site Editor > Templates
2. Select template to edit
3. Use visual editor to modify
4. Save changes

### 3. **Use Block Patterns**
1. Edit any page/post
2. Click "+" to add blocks
3. Go to "Patterns" tab
4. Insert desired pattern

### 4. **Modify Design System**
1. Edit `theme.json`
2. Change colors, fonts, spacing
3. See changes reflected site-wide

## 💡 Key Learning Points

### 1. **FSE vs Traditional Themes**
- **Traditional**: PHP templates with HTML/CSS
- **FSE**: Block markup with JSON configuration
- **Benefits**: Visual editing, consistency, future-proof

### 2. **Block Markup Understanding**
- Every block has specific attributes
- Nesting creates complex layouts
- CSS classes generated automatically

### 3. **Template Parts Benefits**
- Reusable across templates
- Single source of truth
- Easy global changes

### 4. **Design System Power**
- Central configuration in theme.json
- Consistent spacing and colors
- Editor integration

## 🔄 Development Workflow

1. **Plan Structure**: Decide on templates and template parts needed
2. **Create theme.json**: Define design system first
3. **Build Template Parts**: Header, footer, sidebar
4. **Create Templates**: Index, single, page, custom templates
5. **Add Patterns**: Reusable content blocks
6. **Style Enhancement**: Custom CSS for unique features
7. **Test & Iterate**: Use Site Editor to refine

## 🎉 Next Steps

- **Experiment**: Try modifying colors in theme.json
- **Create Patterns**: Build your own block patterns
- **Custom Blocks**: Learn to create custom Gutenberg blocks
- **Global Styles**: Explore advanced styling options
- **Template Variations**: Create multiple template options

This FSE theme demonstrates modern WordPress development, showing how block-based themes provide flexibility, consistency, and ease of use for both developers and content creators.