# Bangla LED — Premium WordPress Theme

A production-ready, custom WordPress theme for **BANGLA LED**, a cinema-grade Digital Out-Of-Home (DOOH) billboard network in Bangladesh. Dark-mode luxury editorial design, glassmorphism UI, Inter typography, and a programmatic local-SEO engine built on a Locations custom post type. No page builders required.

## What's in this repo

```
bangla-led-theme/    The installable WordPress theme
SEO-MASTER-PLAN.md   The SEO / CRO / brand domination strategy
```

## Installation

1. Zip the theme folder: `cd` into the repo and run `zip -r bangla-led-theme.zip bangla-led-theme`
   (or download the folder and zip it locally).
2. In WordPress admin: **Appearance → Themes → Add New Theme → Upload Theme**, choose the zip, install, and **Activate**.
3. On first activation the theme automatically:
   - Registers the **Locations** post type with **City** and **Neighborhood** taxonomies, plus **Campaigns** and a private **Leads** post type.
   - Seeds demo content — 5 Dhaka placements (including Police Plaza South Side) and 3 sample campaigns — so the homepage is fully populated out of the box.
4. Go to **Settings → Permalinks** and click **Save Changes** once (refreshes rewrite rules for the `/locations/` URLs).
5. Set **Settings → Reading → Your homepage displays** to "Your latest posts" *or* assign a static front page — `front-page.php` renders the flagship homepage either way.

## Day-to-day usage

- **Add a billboard:** Locations → Add New. Fill the *Placement Intelligence* meta box (impressions, demographic, dimensions, resolution, brightness, peak hours, dwell time, map embed). Tick *Feature on homepage* for the Top Locations grid. Assign a City and Neighborhood, add 150+ words of unique copy, set a featured photo.
- **Add a campaign:** Campaigns → Add New. Set client/sector in the sidebar meta box and a featured image.
- **Leads:** every form submission is emailed to the site admin **and** stored under the **Leads** menu, with email and requested location shown in the list table.
- **Menus/logo:** Appearance → Menus (`Primary` and `Footer` locations) and Appearance → Customize → Site Identity. Sensible fallbacks render until you configure them.

## Tech notes

- Tailwind CSS via CDN (configured inline in `header.php`); core glass/scrollbar styles are duplicated in `style.css` so the design degrades gracefully.
- Forms post to `admin-post.php` with nonce + honeypot protection — no form plugin needed.
- SEO: per-template meta descriptions, Open Graph, and JSON-LD (`Organization`, `Place` + geo, `BreadcrumbList`).
- Requires WordPress 6.0+ and PHP 7.4+.
