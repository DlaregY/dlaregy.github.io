# Gerald Norby Personal Website

A fully rebuilt, modern personal website with dedicated pages for projects, book recommendations, favorite links, and contact.

## Design direction used
This build follows current personal-site best practices:
- **Strong first-screen storytelling** with clear call-to-actions.
- **Premium modern visuals** (gradient lighting + glassmorphism depth).
- **Mobile-first, responsive layout** with accessible contrast and readable typography.
- **Performance-focused approach**: static pages, minimal JavaScript, and semantic HTML.
- **Content architecture**: separate pages for projects, books, links, and contact.

## Pages
- `index.html` — Hero + summary sections.
- `projects.html` — Web project links (placeholder cards ready for your links).
- `books.html` — Book recommendations rendered from `assets/js/books.js`.
- `links.html` — Misc websites/resources.
- `contact.html` — Contact form using FormSubmit to send email automatically.

## Contact form setup (important)
The form currently posts to:

`https://formsubmit.co/YOUR_EMAIL@example.com`

Replace `YOUR_EMAIL@example.com` in `contact.html` with your real email address to activate delivery.

## Local run
```bash
python -m http.server 4173
```
Then visit `http://localhost:4173`.
