=== 24 Ads Website ===
Contributors: 24adsmarketing
Tags: landing page, agency, one-click, pages
Requires at least: 5.5
Tested up to: 6.7
Requires PHP: 7.0
Stable tag: 2.1.0
License: GPLv2 or later

One-click installer for the complete 24 Ads Marketing website.

== Description ==

Activate the plugin and the entire 24 Ads Marketing website is built automatically:

* Home page (set as the site front page, so it loads at the root URL)
* About, Services, Clients & Results, Developed Websites, Contact, Career
* All 6 service pages (Performance Marketing, Shopify, Social, Marketplace, Graphics, Scaling)

Every page is served with the original design — the same HTML, the same
styles.css and script.js — at the original URLs (e.g. /about/, /services/,
/service-performance/). The plugin bypasses your theme for these pages so they
look pixel-identical to the design.

== Installation ==

1. In WordPress admin go to **Plugins → Add New → Upload Plugin**.
2. Choose `24ads-website.zip` and click **Install Now**.
3. Click **Activate**. That's it — visit your site, everything is live.

Notes:
* If your site was on "Plain" permalinks, the plugin switches it to "Post name"
  so the original pretty URLs work.
* Logos and photos load from your WordPress Media Library
  (wp-content/uploads/2026/05/...). Those images are already uploaded on
  24adsmarketing.com, so they appear automatically.
* To edit copy or design later, edit the files inside the plugin
  (`/pages/*.html`, `/assets/styles.css`, `/assets/script.js`).

== Uninstall ==

Deleting the plugin removes the pages it created and resets the front-page
setting. Deactivating alone leaves your pages untouched.

== Changelog ==

= 2.1.0 =
* Clients page — replaced the dashboard video thumbnail images with a styled,
  animated CSS placeholder (analytics grid + growth chart) for a more
  professional look. No poster images required.

= 1.0.0 =
* Initial release — creates and serves the full 24 Ads Marketing site.
