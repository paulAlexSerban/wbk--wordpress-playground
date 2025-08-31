# WordPress Template Hierarchy

The WordPress template hierarchy determines which template file(s) WordPress uses to display different types of content. Understanding this system is essential for theme development and customization.

## Official Reference

For a detailed overview, see the official documentation: [WordPress Template Hierarchy](https://developer.wordpress.org/themes/basics/template-hierarchy/)

## How the Template Hierarchy Works

When a page is requested, WordPress searches for the most specific template file available in your theme, following a predefined order. For example, when viewing a single post, WordPress looks for:

1. `single-{post-type}-{slug}.php`
2. `single-{post-type}.php`
3. `single.php`
4. `singular.php`
5. `index.php`

This logic applies to all types of content, including pages, categories, tags, custom post types, and more. The hierarchy allows for granular control over how different content is displayed.

### Common Template Files
- `index.php`: Fallback for all requests
- `home.php`: Blog posts index
- `single.php`: Single post
- `page.php`: Static page
- `archive.php`: Archive pages (categories, tags, etc.)
- `category.php`, `tag.php`: Specific taxonomy archives
- `author.php`: Author archive
- `404.php`: Error page

## Template Hierarchy and Full Site Editing (FSE)

With the introduction of Full Site Editing (FSE) and block themes (WordPress 5.9+), the template hierarchy still exists, but its implementation has evolved:

- **Block Themes** use HTML files in the `/templates` and `/parts` directories instead of PHP files.
- The hierarchy logic is similar: WordPress looks for the most specific template (e.g., `single.html`, `archive.html`, `404.html`).
- You can create and edit templates visually using the Site Editor (Appearance → Editor).
- Custom templates can be assigned to posts, pages, or custom post types directly from the editor.
- Template parts (e.g., header, footer) are reusable and managed in `/parts`.

### What You Need to Know for FSE
- The template hierarchy order still applies, but with `.html` files for block themes.
- You can override or add templates by creating new files in the `/templates` directory of your theme.
- The Site Editor allows you to create, edit, and assign templates without touching code, but you can still add files manually for advanced control.
- Template parts are managed separately and can be reused across multiple templates.
- Classic PHP-based themes still use the traditional hierarchy with `.php` files.

## Summary

Understanding the template hierarchy is crucial for customizing how WordPress displays content. With Full Site Editing, you gain more flexibility and visual control, but the underlying logic of the hierarchy remains important for both classic and block themes.
