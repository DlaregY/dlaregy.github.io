# Gerald Norby Personal Website

A fresh static personal website with a brighter, more artistic style and focused content pages.

## Design direction
- Personal, quirky, and creative tone.
- Light color palette with playful layered gradients and doodle-like texture.
- Rounded glass cards, subtle motion, and clear modern hierarchy.
- Mobile-first responsive layout with simple JavaScript.

## Pages
- `index.html` — Intro and personality-forward homepage.
- `projects.html` — Featured project links.
- `books.html` — Book recommendations rendered from `assets/js/books.js`.
- `links.html` — External links Gerald recommends.
- `contact.html` — Contact form that can email via FormSubmit.

## Contact form setup
Update this endpoint in `contact.html`:

`https://formsubmit.co/YOUR_EMAIL@example.com`

Replace with your real email to receive form submissions.

## Local run
```bash
python -m http.server 4173
```
Then open `http://localhost:4173`.
