# Gerald Norby Personal Website

A static personal website with one shared set of pages and three switchable themes: `modern`, `nes`, and `dos`.

## Pages
- `index.html`
- `projects.html`
- `challenges.html`
- `books.html`
- `links.html`
- `contact.html`
- `wisdomvault.html`

## Theme system
- The active theme is stored in `localStorage` as `theme` (`modern`, `nes`, or `dos`).
- The theme is applied by setting `data-theme` on the root `<html>` element.
- Each page loads:
  - `assets/css/base.css`
  - `assets/css/theme-modern.css`
  - `assets/css/theme-nes.css`
  - `assets/css/theme-dos.css`

## Themed images
Use themed image swapping only for images marked with `.themed-img`.

### Naming convention
For any themed image, store both files:
- `assets/img/<name>--modern.<ext>`
- `assets/img/<name>--retro.<ext>`

`--retro` is used automatically for both `nes` and `dos` themes.

If a retro file is missing, JavaScript falls back to `--modern`.

### HTML format
```html
<img
  class="themed-img"
  data-img-base="assets/img/<name>"
  src="assets/img/<name>--modern.<ext>"
  alt="..."
/>
```

### Examples
```html
<img class="themed-img" data-img-base="assets/img/gerald-portrait" src="assets/img/gerald-portrait--modern.png" alt="Portrait of Gerald Norby" />
```

```html
<img class="themed-img" data-img-base="assets/img/challengeboard" src="assets/img/challengeboard--modern.jpg" alt="Challengeboard screenshot" />
```

## Local run
```bash
python -m http.server 4173
```
Then visit `http://localhost:4173`.
