const books = [
  {
    title: "Stephen King's Dark Tower series",
    author: 'Stephen King',
    why: 'A genre-bending epic that mixes myth, western, and friendship into one sprawling quest.',
    link: 'https://www.amazon.com/s?k=The+Dark+Tower+series+Stephen+King',
    goodreads: 'https://www.goodreads.com/search?q=The%20Dark%20Tower%20Stephen%20King'
  },
  {
    title: 'How to Fail at Everything and Still Win Big',
    author: 'Scott Adams',
    why: 'A candid take on systems, persistence, and redefining what success feels like.',
    link: 'https://www.amazon.com/dp/1591847745',
    goodreads: 'https://www.goodreads.com/search?q=How%20to%20Fail%20at%20Everything%20and%20Still%20Win%20Big'
  },
  {
    title: "Asimov's Foundation series",
    author: 'Isaac Asimov',
    why: 'Grand-scale sci-fi about knowledge, foresight, and the arc of civilizations.',
    link: 'https://www.amazon.com/s?k=Foundation+series+Isaac+Asimov',
    goodreads: 'https://www.goodreads.com/search?q=Foundation%20series%20Isaac%20Asimov'
  },
  {
    title: 'One Summer: America 1927',
    author: 'Bill Bryson',
    why: 'A vivid snapshot of an electric moment in American history.',
    link: 'https://www.amazon.com/dp/0767919412',
    goodreads: 'https://www.goodreads.com/search?q=One%20Summer%3A%20America%201927%20Bill%20Bryson'
  },
  {
    title: 'The Righteous Mind',
    author: 'Jonathan Haidt',
    why: 'A thoughtful exploration of moral psychology and why good people disagree.',
    link: 'https://www.amazon.com/dp/0307455777',
    goodreads: 'https://www.goodreads.com/search?q=The%20Righteous%20Mind%20Jonathan%20Haidt'
  }
];

const bookGrid = document.getElementById('bookGrid');
const slugify = (text) =>
  text
    .toLowerCase()
    .replace(/['"]/g, '')
    .replace(/[^a-z0-9]+/g, '-')
    .replace(/(^-|-$)/g, '');

if (bookGrid) {
  bookGrid.innerHTML = books
    .map(
      (book) => {
        const coverFile = `assets/images/books/${slugify(book.title)}.png`;
        return `
      <article class="card book-card">
        <div class="image-placeholder small">
          <strong>Cover placeholder:</strong>
          <span>Vintage cover art or illustrated motif for "${book.title}". Proposed file: ${coverFile}.</span>
        </div>
        <p class="eyebrow">${book.author}</p>
        <h2>${book.title}</h2>
        <p>${book.why}</p>
        <div class="link-group">
          <a class="text-link" href="${book.link}" target="_blank" rel="noopener noreferrer">View on Amazon →</a>
          <a class="text-link secondary" href="${book.goodreads}" target="_blank" rel="noopener noreferrer"
            >View on Goodreads →</a
          >
        </div>
      </article>
    `;
      }
    )
    .join('');
}
