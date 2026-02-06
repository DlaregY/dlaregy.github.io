const books = [
  {
    title: "The Dark Tower Series",
    author: "Stephen King",
    why: "A wildly imaginative blend of fantasy, western, horror, and heart.",
    link: "https://www.amazon.com/s?k=stephen+king+dark+tower+series"
  },
  {
    title: "How to Fail at Almost Everything and Still Win Big",
    author: "Scott Adams",
    why: "A systems-first mindset for success that rewards experimentation over ego.",
    link: "https://www.amazon.com/dp/1591847745"
  },
  {
    title: "Foundation Series",
    author: "Isaac Asimov",
    why: "Big-idea science fiction about civilization, prediction, and long-term strategy.",
    link: "https://www.amazon.com/s?k=asimov+foundation+series"
  },
  {
    title: "One Summer: America, 1927",
    author: "Bill Bryson",
    why: "A brilliant snapshot of a year packed with cultural shifts and larger-than-life characters.",
    link: "https://www.amazon.com/dp/0767919408"
  },
  {
    title: "The Righteous Mind",
    author: "Jonathan Haidt",
    why: "A sharp guide for understanding morality, polarization, and why people disagree.",
    link: "https://www.amazon.com/dp/0307455777"
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
