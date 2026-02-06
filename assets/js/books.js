const books = [
  {
    title: 'Atomic Habits',
    author: 'James Clear',
    why: 'The most practical framework I have found for building durable habits.',
    link: 'https://www.amazon.com/dp/0735211299'
  },
  {
    title: 'The Psychology of Money',
    author: 'Morgan Housel',
    why: 'Simple lessons on behavior, risk, and long-term wealth decisions.',
    link: 'https://www.amazon.com/dp/0857197681'
  },
  {
    title: 'Deep Work',
    author: 'Cal Newport',
    why: 'A powerful reminder to protect focus in a distracted world.',
    link: 'https://www.amazon.com/dp/1455586692'
  },
  {
    title: 'The Lean Startup',
    author: 'Eric Ries',
    why: 'Great for building products through rapid experimentation and learning.',
    link: 'https://www.amazon.com/dp/0307887898'
  },
  {
    title: 'Thinking, Fast and Slow',
    author: 'Daniel Kahneman',
    why: 'Sharpens your understanding of decision-making and cognitive bias.',
    link: 'https://www.amazon.com/dp/0374533555'
  }
];

const bookGrid = document.getElementById('bookGrid');

if (bookGrid) {
  bookGrid.innerHTML = books
    .map(
      (book) => `
      <article class="card book-card">
        <p class="eyebrow">${book.author}</p>
        <h2>${book.title}</h2>
        <p>${book.why}</p>
        <a href="${book.link}" target="_blank" rel="noopener noreferrer">View on Amazon →</a>
      </article>
    `
    )
    .join('');
}
