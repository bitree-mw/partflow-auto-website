# PartFlow Auto — Showcase Website

A small marketing site for **PartFlow Auto**, the inventory and point-of-sale system for motor-vehicle parts businesses.

Plain PHP + Tailwind CSS. No database and no framework.

## Run locally

- **Laravel Herd:** the folder is served automatically at `http://partflow-auto-website.test`.
- **PHP built-in server:** `php -S localhost:8000` from this folder, then open http://localhost:8000.

## Structure

| Path | Purpose |
| --- | --- |
| `index.php`, `features.php`, `contact.php`, `not-found.php` | Pages (`index.php` also routes the clean URLs) |
| `.htaccess` | Clean URLs on Apache / cPanel |
| `includes/config.php` | Site name, contact email/phone — **edit this first** |
| `includes/content.php` | All page copy, feature lists, FAQ, and preview sample data |
| `includes/icons.php` | Stroke icon set |
| `partials/` | Header, footer, CTA, and the POS / dashboard / ledger previews |
| `src/app.css` | Tailwind source and brand theme |
| `assets/css/app.css` | Compiled CSS (committed, so hosting needs no build step) |

## Clean URLs

Pages are linked without the `.php` extension (`/features`, `/contact`). Any path that isn't a real file goes to `index.php`, which serves the matching page or a 404. Herd and `php -S` do this on their own. On Apache/cPanel, the included `.htaccess` does it (needs `mod_rewrite`). Old `.php` addresses get a 301 redirect to the clean URL.

## Styles

The compiled CSS is committed. After changing classes in any `.php` file, rebuild it:

```bash
npm install
npm run build   # or: npm run dev  (watch mode)
```

## Contact form

There is no backend storage. A valid demo request opens the visitor's email app with the details filled in, addressed to `contact_email` in `includes/config.php`. Without JavaScript, the server validates the form and shows an "Open email" button.
