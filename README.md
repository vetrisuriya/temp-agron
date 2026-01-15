# Agron Static HTML Site

This is a static HTML version of the Agron WordPress theme, converted from the original WordPress theme.

## Structure

- `index.html` - Homepage with blog post previews
- `single.html` - Single blog post template
- `page.html` - Static page template (About Us example)
- `archive.html` - Blog archive with multiple posts
- `404.html` - Error page
- `search.html` - Search results page
- `single-project.html` - Project custom post type template
- `single-service.html` - Service custom post type template
- `single-team.html` - Team member custom post type template
- `assets/` - All CSS, JavaScript, fonts, and images

## Features

### Working Features (Client-Side)
- Responsive design
- CSS animations and transitions
- JavaScript interactions (sliders, modals, etc.)
- Navigation menus
- Back-to-top button
- Smooth scrolling (GSAP)
- Image galleries and carousels (Swiper)
- Form HTML structure

### Features Requiring Backend (Placeholders)

The following features require server-side processing and are represented as placeholders:

1. **Comments System**
   - Location: `single.html`
   - Requires: PHP/WordPress comments system or third-party service (Disqus, Commento, etc.)
   - Current state: HTML form with note about backend requirement

2. **Search Functionality**
   - Location: `search.html`
   - Requires: Server-side search or JavaScript search library with indexed content
   - Current state: Search form with placeholder results

3. **Contact Forms**
   - Location: `page.html`
   - Requires: Form processing backend (PHP, Node.js, or form service like Formspree)
   - Current state: HTML form structure maintained, action="#" placeholder

4. **Dynamic Content**
   - Blog pagination (limited to static HTML pages)
   - Category filtering
   - Tag filtering
   - Author archives
   
5. **WordPress Shortcodes**
   - All WordPress shortcodes have been removed or replaced with static HTML
   - Plugin-specific features from Case Addons and Revolution Slider are not functional

6. **WooCommerce Features**
   - E-commerce functionality is not included in this static version
   - For e-commerce, consider using services like Shopify, Snipcart, or rebuilding with a headless CMS

## Sample Content

This static site uses representative sample content based on the theme templates:
- Sample blog posts about sustainable agriculture
- Sample author information
- Sample comments count
- Placeholder images (you can replace with actual images from `elements/assets/img-layouts/`)

## Assets

All theme assets have been copied to the `assets/` directory:
- **CSS**: All stylesheets including libraries (animate, swiper, magnific-popup)
- **JavaScript**: All scripts including GSAP, Swiper, and theme-specific JS
- **Fonts**: Custom fonts (Walsheim, Case Icons, Flaticon)
- **Images**: Logo and theme images

All asset references use relative paths (`assets/...`) for portability.

## Inline Styles

All inline styles from the original theme have been preserved exactly as-is, without minification or optimization.

## Customization

To customize this site:
1. Edit HTML files directly for content changes
2. Modify `assets/css/custom.css` for style changes
3. Update `assets/js/theme.js` for behavior changes
4. Replace placeholder images in `assets/img/`

## Implementing Backend Features

To make this a fully functional site:

1. **Add a Static Site Generator**: Consider using Eleventy, Hugo, or Jekyll
2. **Integrate a Headless CMS**: Use Strapi, Contentful, or WordPress as headless CMS
3. **Add Search**: Implement Algolia, Lunr.js, or Pagefind for search
4. **Add Comments**: Integrate Disqus, Commento, or utterances
5. **Form Processing**: Use Formspree, Netlify Forms, or custom backend

## Deployment

This static site can be deployed to:
- Netlify
- Vercel
- GitHub Pages
- AWS S3 + CloudFront
- Any web server (Apache, Nginx)

Simply upload all files to your hosting provider.

## License

Original theme: Agron by Case-Themes (ThemeForest License)
This conversion maintains the original theme's structure and assets.

## Notes

- Forms are maintained with their original HTML structure but will need backend processing
- All CSS and JS files are preserved without minification
- No WordPress-specific files (PHP) are included
- Plugin assets (Case Addons, Revolution Slider) are not included as they require WordPress
