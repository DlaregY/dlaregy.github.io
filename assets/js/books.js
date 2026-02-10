const books = [
  {
    title: "Stephen King's Dark Tower series",
    author: 'Stephen King',
    why: 'Genre-bending epic of myth, western, and long-form character arcs.',
    link: 'https://www.amazon.com/s?k=The+Dark+Tower+series+Stephen+King',
    goodreads: 'https://www.goodreads.com/search?q=The%20Dark%20Tower%20Stephen%20King'
  },
  {
    title: 'How to Fail at Everything and Still Win Big',
    author: 'Scott Adams',
    why: 'A systems-first approach to persistence and practical outcomes.',
    link: 'https://www.amazon.com/dp/1591847745',
    goodreads: 'https://www.goodreads.com/search?q=How%20to%20Fail%20at%20Everything%20and%20Still%20Win%20Big'
  },
  {
    title: "Asimov's Foundation series",
    author: 'Isaac Asimov',
    why: 'Classic sci-fi focused on knowledge, prediction, and history at scale.',
    link: 'https://www.amazon.com/s?k=Foundation+series+Isaac+Asimov',
    goodreads: 'https://www.goodreads.com/search?q=Foundation%20series%20Isaac%20Asimov'
  },
  {
    title: 'One Summer: America 1927',
    author: 'Bill Bryson',
    why: 'Concise narrative of a defining year in American history.',
    link: 'https://www.amazon.com/dp/0767919412',
    goodreads: 'https://www.goodreads.com/search?q=One%20Summer%3A%20America%201927%20Bill%20Bryson'
  },
  {
    title: 'The Righteous Mind',
    author: 'Jonathan Haidt',
    why: 'Moral psychology and the roots of disagreement.',
    link: 'https://www.amazon.com/dp/0307455777',
    goodreads: 'https://www.goodreads.com/search?q=The%20Righteous%20Mind%20Jonathan%20Haidt'
  }
];

const bookGrid = document.getElementById('bookGrid');

if (bookGrid) {
  bookGrid.innerHTML = books
    .map(
      (book) => `
      <article class="compact-item compact-item-static">
        <div class="compact-main">
          <h2>${book.title}</h2>
          <p>${book.author} · ${book.why}</p>
        </div>
        <div class="compact-actions">
          <a class="mini-link" href="${book.link}" target="_blank" rel="noopener noreferrer">Amazon ↗</a>
          <a class="mini-link secondary" href="${book.goodreads}" target="_blank" rel="noopener noreferrer">Goodreads ↗</a>
        </div>
      </article>
    `
    )
    .join('');
}
