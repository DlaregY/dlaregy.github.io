const books = [
  {
    title: "Stephen King's Dark Tower series",
    author: 'Stephen King',
    why: 'A genre-bending epic that mixes myth, western, and friendship into one sprawling quest.',
    link: 'https://www.amazon.com/s?k=The+Dark+Tower+series+Stephen+King'
  },
  {
    title: 'How to Fail at Everything and Still Win Big',
    author: 'Scott Adams',
    why: 'A candid take on systems, persistence, and redefining what success feels like.',
    link: 'https://www.amazon.com/dp/1591847745'
  },
  {
    title: "Asimov's Foundation series",
    author: 'Isaac Asimov',
    why: 'Grand-scale sci-fi about knowledge, foresight, and the arc of civilizations.',
    link: 'https://www.amazon.com/s?k=Foundation+series+Isaac+Asimov'
  },
  {
    title: 'One Summer: America 1927',
    author: 'Bill Bryson',
    why: 'A vivid snapshot of an electric moment in American history.',
    link: 'https://www.amazon.com/dp/0767919412'
  },
  {
    title: 'The Righteous Mind',
    author: 'Jonathan Haidt',
    why: 'A thoughtful exploration of moral psychology and why good people disagree.',
    link: 'https://www.amazon.com/dp/0307455777'
  }
];

const bookGrid = document.getElementById('bookGrid');

if (bookGrid) {
  bookGrid.innerHTML = books
    .map(
      (book) => `
      <article class="card book-card">
        <div class="image-placeholder small">
          <strong>Cover placeholder:</strong>
          <span>Vintage cover art or illustrated motif for "${book.title}".</span>
        </div>
        <p class="eyebrow">${book.author}</p>
        <h2>${book.title}</h2>
        <p>${book.why}</p>
        <a href="${book.link}" target="_blank" rel="noopener noreferrer">View on Amazon →</a>
      </article>
    `
    )
    .join('');
}
