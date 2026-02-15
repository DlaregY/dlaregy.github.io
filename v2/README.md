# GeraldNorby.com v2 (Retro Beta)

This folder contains a full-site redesign experiment inspired by retro interfaces.

## Goals
- Mirror the main pages of the classic site while preserving information.
- Provide switchable DOS and NES inspired themes.
- Keep accessibility, keyboard support, and responsive behavior.

## Assumptions
- Classic pages remain unchanged except for a single link from `index.html` into this beta.
- Content is mirrored manually in v2 HTML so it can be served as plain static files.
- Book recommendation data is sourced from existing `assets/js/books.js`.

## Typography + pixel styling notes
- Pixel font stack is loaded in `v2/assets/base.css` via Google Fonts: **Press Start 2P**, **Silkscreen**, **VT323**, and **Pixelify Sans**.
- Theme wiring:
  - **NES** (`theme-nes.css`): headings/navigation use Press Start 2P with chunkier letter spacing; body text uses Pixelify Sans for readability.
  - **DOS** (`theme-dos.css`): VT323 is used for most text and display headings.
- Size tuning guidance:
  - Press Start 2P looks best on 8px multiples (`16px`, `24px`, `32px`).
  - Adjust `--font-body`, `--font-ui`, and `--font-display` in theme files to swap type styles quickly.
  - Keep spacing on the 8px scale defined in base (`--space-1` through `--space-4`) to preserve pixel rhythm.
