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
    why: 'Funny, practical advice on persistence without guru fluff.',
    link: 'https://www.amazon.com/dp/1591847745',
    goodreads: 'https://www.goodreads.com/search?q=How%20to%20Fail%20at%20Everything%20and%20Still%20Win%20Big'
  },
  {
    title: "Asimov's Foundation series",
    author: 'Isaac Asimov',
    why: 'Classic sci-fi about knowledge, prediction, and long-view history.',
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
  },
  {
    title: "Upton Sinclair's Lanny Budd series",
    author: 'Upton Sinclair',
    why: 'Historical fiction sweeping through major events of the 20th century.',
    link: 'https://www.amazon.com/s?k=Lanny+Budd+series+Upton+Sinclair',
    goodreads: 'https://www.goodreads.com/search?q=Lanny%20Budd%20series%20Upton%20Sinclair'
  },
  {
    title: 'It',
    author: 'Stephen King',
    why: 'Horror epic about fear, memory, and friendship across decades.',
    link: 'https://www.amazon.com/s?k=It+Stephen+King',
    goodreads: 'https://www.goodreads.com/search?q=It%20Stephen%20King'
  },
  {
    title: 'The Brothers Karamazov',
    author: 'Fyodor Dostoevsky',
    why: 'A philosophical and psychological novel on morality, family, and faith.',
    link: 'https://www.amazon.com/s?k=The+Brothers+Karamazov',
    goodreads: 'https://www.goodreads.com/search?q=The%20Brothers%20Karamazov'
  },
  {
    title: 'How to Think Like a Roman Emperor',
    author: 'Donald Robertson',
    why: 'Practical Stoic philosophy through the life of Marcus Aurelius.',
    link: 'https://www.amazon.com/s?k=How+to+Think+Like+a+Roman+Emperor+Donald+Robertson',
    goodreads: 'https://www.goodreads.com/search?q=How%20to%20Think%20Like%20a%20Roman%20Emperor%20Donald%20Robertson'
  },
  {
    title: 'The Enchiridion',
    author: 'Epictetus',
    why: 'A concise Stoic handbook on agency, judgment, and resilience.',
    link: 'https://www.amazon.com/s?k=Epictetus+Enchiridion',
    goodreads: 'https://www.goodreads.com/search?q=Epictetus%20Enchiridion'
  },
  {
    title: 'The Zamonia series',
    author: 'Walter Moers',
    why: 'Imaginative fantasy worldbuilding with absurd humor and invention.',
    link: 'https://www.amazon.com/s?k=Zamonia+series+Walter+Moers',
    goodreads: 'https://www.goodreads.com/search?q=Zamonia%20series%20Walter%20Moers'
  },
  {
    title: 'The Callahan series',
    author: 'Spider Robinson',
    why: 'Character-driven sci-fi centered on wit, community, and empathy.',
    link: 'https://www.amazon.com/s?k=Callahan+series+Spider+Robinson',
    goodreads: 'https://www.goodreads.com/search?q=Callahan%20series%20Spider%20Robinson'
  },
  {
    title: 'How to Have Confidence and Power in Dealing with People',
    author: 'Les Giblin',
    why: 'Old-school people skills advice that still works.',
    link: 'https://www.amazon.com/s?k=How+to+Have+Confidence+and+Power+in+Dealing+with+People',
    goodreads: 'https://www.goodreads.com/search?q=How%20to%20Have%20Confidence%20and%20Power%20in%20Dealing%20with%20People'
  },
  {
    title: 'Destiny of the Republic',
    author: 'Candice Millard',
    why: 'Narrative history of President Garfield and a turning point in medicine.',
    link: 'https://www.amazon.com/s?k=Destiny+of+the+Republic+Candice+Millard',
    goodreads: 'https://www.goodreads.com/search?q=Destiny%20of%20the%20Republic%20Candice%20Millard'
  },
  {
    title: 'The Way of the Shaman series',
    author: 'Vasily Mahanenko',
    why: 'Progression-heavy LitRPG with satisfying game-world pacing.',
    link: 'https://www.amazon.com/s?k=The+Way+of+the+Shaman+series',
    goodreads: 'https://www.goodreads.com/search?q=The%20Way%20of%20the%20Shaman%20series'
  },
  {
    title: 'Ready Player One',
    author: 'Ernest Cline',
    why: 'Fast-paced pop-culture quest inside a virtual world.',
    link: 'https://www.amazon.com/s?k=Ready+Player+One',
    goodreads: 'https://www.goodreads.com/search?q=Ready%20Player%20One'
  },
  {
    title: "Old Man's War",
    author: 'John Scalzi',
    why: 'Military sci-fi with sharp pacing and accessible big ideas.',
    link: 'https://www.amazon.com/s?k=Old+Man%27s+War+John+Scalzi',
    goodreads: 'https://www.goodreads.com/search?q=Old%20Man%27s%20War%20John%20Scalzi'
  },
  {
    title: 'Starship Troopers',
    author: 'Robert A. Heinlein',
    why: 'Influential military sci-fi exploring citizenship and duty.',
    link: 'https://www.amazon.com/s?k=Starship+Troopers+Heinlein',
    goodreads: 'https://www.goodreads.com/search?q=Starship%20Troopers%20Robert%20A%20Heinlein'
  },
  {
    title: 'The Moon Is a Harsh Mistress',
    author: 'Robert A. Heinlein',
    why: 'Revolutionary sci-fi with political strategy and AI companionship.',
    link: 'https://www.amazon.com/s?k=The+Moon+Is+a+Harsh+Mistress',
    goodreads: 'https://www.goodreads.com/search?q=The%20Moon%20Is%20a%20Harsh%20Mistress'
  },
  {
    title: 'The Lazarus Long books',
    author: 'Robert A. Heinlein',
    why: 'Long-horizon stories about identity, time, and civilization.',
    link: 'https://www.amazon.com/s?k=Lazarus+Long+books+Heinlein',
    goodreads: 'https://www.goodreads.com/search?q=Lazarus%20Long%20books%20Heinlein'
  },
  {
    title: "The Hitchhiker's Guide to the Galaxy series",
    author: 'Douglas Adams',
    why: 'Comedic sci-fi that blends absurdity with philosophical wit.',
    link: 'https://www.amazon.com/s?k=Hitchhiker%27s+Guide+to+the+Galaxy+series',
    goodreads: 'https://www.goodreads.com/search?q=Hitchhiker%27s%20Guide%20to%20the%20Galaxy%20series'
  },
  {
    title: 'How to Win Friends & Influence People',
    author: 'Dale Carnegie',
    why: 'Foundational principles for social skill and rapport building.',
    link: 'https://www.amazon.com/s?k=How+to+Win+Friends+%26+Influence+People',
    goodreads: 'https://www.goodreads.com/search?q=How%20to%20Win%20Friends%20and%20Influence%20People'
  },
  {
    title: 'Gentleman Bastard series',
    author: 'Scott Lynch',
    why: 'Heist fantasy with layered schemes and memorable dialogue.',
    link: 'https://www.amazon.com/s?k=Gentleman+Bastard+series+Scott+Lynch',
    goodreads: 'https://www.goodreads.com/search?q=Gentleman%20Bastard%20series%20Scott%20Lynch'
  },
  {
    title: 'The Amazing Adventures of Kavalier & Clay',
    author: 'Michael Chabon',
    why: 'Literary adventure about art, ambition, and the comic-book era.',
    link: 'https://www.amazon.com/s?k=The+Amazing+Adventures+of+Kavalier+%26+Clay',
    goodreads: 'https://www.goodreads.com/search?q=The%20Amazing%20Adventures%20of%20Kavalier%20and%20Clay'
  },
  {
    title: 'Homo Deus',
    author: 'Yuval Noah Harari',
    why: 'Speculative nonfiction on future human trajectories and technology.',
    link: 'https://www.amazon.com/s?k=Homo+Deus+Yuval+Noah+Harari',
    goodreads: 'https://www.goodreads.com/search?q=Homo%20Deus%20Yuval%20Noah%20Harari'
  },
  {
    title: 'The Cider House Rules',
    author: 'John Irving',
    why: 'Character-rich literary fiction on ethics, care, and autonomy.',
    link: 'https://www.amazon.com/s?k=The+Cider+House+Rules',
    goodreads: 'https://www.goodreads.com/search?q=The%20Cider%20House%20Rules'
  },
  {
    title: 'The Sot-Weed Factor',
    author: 'John Barth',
    why: 'Postmodern historical satire with linguistic and structural play.',
    link: 'https://www.amazon.com/s?k=The+Sot-Weed+Factor+John+Barth',
    goodreads: 'https://www.goodreads.com/search?q=The%20Sot-Weed%20Factor%20John%20Barth'
  },
  {
    title: 'The End of the Road',
    author: 'John Barth',
    why: 'Darkly comic existential novel examining paralysis and choice.',
    link: 'https://www.amazon.com/s?k=The+End+of+the+Road+John+Barth',
    goodreads: 'https://www.goodreads.com/search?q=The%20End%20of%20the%20Road%20John%20Barth'
  },
  {
    title: 'A Hero of Our Time',
    author: 'Mikhail Lermontov',
    why: 'Psychological classic portraying alienation and fractured identity.',
    link: 'https://www.amazon.com/s?k=A+Hero+of+Our+Time+Lermontov',
    goodreads: 'https://www.goodreads.com/search?q=A%20Hero%20of%20Our%20Time%20Lermontov'
  },
  {
    title: "What's Eating Gilbert Grape",
    author: 'Peter Hedges',
    why: 'Grounded contemporary fiction about obligation and small-town life.',
    link: 'https://www.amazon.com/s?k=What%27s+Eating+Gilbert+Grape',
    goodreads: 'https://www.goodreads.com/search?q=What%27s%20Eating%20Gilbert%20Grape'
  },
  {
    title: 'A Scanner Darkly',
    author: 'Philip K. Dick',
    why: 'Paranoid near-future story about surveillance, identity, and addiction.',
    link: 'https://www.amazon.com/s?k=A+Scanner+Darkly+Philip+K+Dick',
    goodreads: 'https://www.goodreads.com/search?q=A%20Scanner%20Darkly%20Philip%20K%20Dick'
  },
  {
    title: 'Pet Sematary',
    author: 'Stephen King',
    why: 'Psychological horror about grief, denial, and consequences.',
    link: 'https://www.amazon.com/s?k=Pet+Sematary+Stephen+King',
    goodreads: 'https://www.goodreads.com/search?q=Pet%20Sematary%20Stephen%20King'
  },
  {
    title: 'Incerto series',
    author: 'Nassim Nicholas Taleb',
    why: 'A linked set of books on uncertainty, probability, and real-world decision-making.',
    link: 'https://www.amazon.com/s?k=Incerto+Nassim+Nicholas+Taleb',
    goodreads: 'https://www.goodreads.com/search?q=Incerto%20Nassim%20Nicholas%20Taleb'
  },
  {
    title: "The Mote in God's Eye",
    author: 'Larry Niven and Jerry Pournelle',
    why: 'First-contact sci-fi with intricate worldbuilding and diplomacy.',
    link: 'https://www.amazon.com/s?k=The+Mote+in+God%27s+Eye',
    goodreads: 'https://www.goodreads.com/search?q=The%20Mote%20in%20God%27s%20Eye'
  },
  {
    title: 'Adaptive Markets',
    author: 'Andrew W. Lo',
    why: 'A useful look at how people actually behave in financial markets.',
    link: 'https://www.amazon.com/s?k=Adaptive+Markets+Andrew+Lo',
    goodreads: 'https://www.goodreads.com/search?q=Adaptive%20Markets%20Andrew%20W%20Lo'
  },
  {
    title: 'King Coal',
    author: 'Upton Sinclair',
    why: 'Labor-focused novel confronting exploitation in industrial America.',
    link: 'https://www.amazon.com/s?k=King+Coal+Upton+Sinclair',
    goodreads: 'https://www.goodreads.com/search?q=King%20Coal%20Upton%20Sinclair'
  },
  {
    title: 'Babbitt',
    author: 'Sinclair Lewis',
    why: 'Satire of conformity, ambition, and middle-class American life.',
    link: 'https://www.amazon.com/s?k=Babbitt+Sinclair+Lewis',
    goodreads: 'https://www.goodreads.com/search?q=Babbitt%20Sinclair%20Lewis'
  },
  {
    title: 'MaddAddam series',
    author: 'Margaret Atwood',
    why: 'Dystopian trilogy on bioengineering, collapse, and adaptation.',
    link: 'https://www.amazon.com/s?k=MaddAddam+series+Margaret+Atwood',
    goodreads: 'https://www.goodreads.com/search?q=MaddAddam%20series%20Margaret%20Atwood'
  },
  {
    title: 'The Undoing Project: A Friendship That Changed Our Minds',
    author: 'Michael Lewis',
    why: 'Story of Kahneman and Tversky and the ideas behind modern behavioral science.',
    link: 'https://www.amazon.com/s?k=The+Undoing+Project+Michael+Lewis',
    goodreads: 'https://www.goodreads.com/search?q=The%20Undoing%20Project%20Michael%20Lewis'
  },
  {
    title: "Midnight's Children",
    author: 'Salman Rushdie',
    why: 'Expansive literary novel intertwining personal fate with national history.',
    link: 'https://www.amazon.com/s?k=Midnight%27s+Children+Salman+Rushdie',
    goodreads: 'https://www.goodreads.com/search?q=Midnight%27s%20Children%20Salman%20Rushdie'
  },
  {
    title: 'Memos from Purgatory',
    author: 'Harlan Ellison',
    why: 'Dark reportage-style narrative from deep inside outlaw subculture.',
    link: 'https://www.amazon.com/s?k=Memos+from+Purgatory+Harlan+Ellison',
    goodreads: 'https://www.goodreads.com/search?q=Memos%20from%20Purgatory%20Harlan%20Ellison'
  },
  {
    title: 'Dune trilogy',
    author: 'Frank Herbert',
    why: 'Political and ecological epic of power, religion, and empire.',
    link: 'https://www.amazon.com/s?k=Dune+trilogy+Frank+Herbert',
    goodreads: 'https://www.goodreads.com/search?q=Dune%20trilogy%20Frank%20Herbert'
  },
  {
    title: 'The Vampire Chronicles',
    author: 'Anne Rice',
    why: 'Gothic supernatural saga about immortality, desire, and morality.',
    link: 'https://www.amazon.com/s?k=Vampire+Chronicles+Anne+Rice',
    goodreads: 'https://www.goodreads.com/search?q=Vampire%20Chronicles%20Anne%20Rice'
  },
  {
    title: 'The Bonfire of the Vanities',
    author: 'Tom Wolfe',
    why: 'Sharp social satire of status, media, and ambition in New York.',
    link: 'https://www.amazon.com/s?k=The+Bonfire+of+the+Vanities+Tom+Wolfe',
    goodreads: 'https://www.goodreads.com/search?q=The%20Bonfire%20of%20the%20Vanities%20Tom%20Wolfe'
  },
  {
    title: 'A Man in Full',
    author: 'Tom Wolfe',
    why: 'Sweeping modern novel on class, race, and power in urban America.',
    link: 'https://www.amazon.com/s?k=A+Man+in+Full+Tom+Wolfe',
    goodreads: 'https://www.goodreads.com/search?q=A%20Man%20in%20Full%20Tom%20Wolfe'
  },
  {
    title: '12 Rules for Life: An Antidote to Chaos',
    author: 'Jordan B. Peterson',
    why: 'Psychology-forward life principles focused on responsibility and order.',
    link: 'https://www.amazon.com/s?k=12+Rules+for+Life+Jordan+Peterson',
    goodreads: 'https://www.goodreads.com/search?q=12%20Rules%20for%20Life%20Jordan%20B%20Peterson'
  },
  {
    title: 'Cold Mountain',
    author: 'Charles Frazier',
    why: 'Civil War-era literary novel about survival, distance, and devotion.',
    link: 'https://www.amazon.com/s?k=Cold+Mountain+Charles+Frazier',
    goodreads: 'https://www.goodreads.com/search?q=Cold%20Mountain%20Charles%20Frazier'
  },
  {
    title: 'Mount Chicago',
    author: 'Adam Levin',
    why: 'Ambitious contemporary fiction blending humor, grief, and invention.',
    link: 'https://www.amazon.com/s?k=Mount+Chicago+Adam+Levin',
    goodreads: 'https://www.goodreads.com/search?q=Mount%20Chicago%20Adam%20Levin'
  },
  {
    title: 'Moonwalking with Einstein: The Art and Science of Remembering Everything',
    author: 'Joshua Foer',
    why: 'Engaging tour of memory science and practical mnemonic training.',
    link: 'https://www.amazon.com/s?k=Moonwalking+with+Einstein+Joshua+Foer',
    goodreads: 'https://www.goodreads.com/search?q=Moonwalking%20with%20Einstein%20Joshua%20Foer'
  },
  {
    title: 'Half Empty',
    author: 'David Rakoff',
    why: 'Humorous essays examining pessimism, culture, and modern life.',
    link: 'https://www.amazon.com/s?k=Half+Empty+David+Rakoff',
    goodreads: 'https://www.goodreads.com/search?q=Half%20Empty%20David%20Rakoff'
  },
  {
    title: 'The Jungle',
    author: 'Upton Sinclair',
    why: 'Landmark social novel exposing labor conditions and industrial abuse.',
    link: 'https://www.amazon.com/s?k=The+Jungle+Upton+Sinclair',
    goodreads: 'https://www.goodreads.com/search?q=The%20Jungle%20Upton%20Sinclair'
  },
  {
    title: 'Clockwork Angels series',
    author: 'Kevin J. Anderson and Neil Peart',
    why: 'Steampunk-flavored speculative adventure with philosophical undertones.',
    link: 'https://www.amazon.com/s?k=Clockwork+Angels+series',
    goodreads: 'https://www.goodreads.com/search?q=Clockwork%20Angels%20series'
  },
  {
    title: 'Vampire$',
    author: 'John Steakley',
    why: 'Lean horror-action story centered on professional vampire hunters.',
    link: 'https://www.amazon.com/s?k=Vampire%24+John+Steakley',
    goodreads: 'https://www.goodreads.com/search?q=Vampire%24%20John%20Steakley'
  },
  {
    title: 'The World of Null-A',
    author: 'A. E. van Vogt',
    why: 'Golden Age sci-fi classic on identity, logic systems, and power.',
    link: 'https://www.amazon.com/s?k=The+World+of+Null-A+A+E+van+Vogt',
    goodreads: 'https://www.goodreads.com/search?q=The%20World%20of%20Null-A%20A%20E%20van%20Vogt'
  },
  {
    title: 'The Learners',
    author: 'Chip Kidd',
    why: 'Offbeat literary coming-of-age with sharp style and perspective.',
    link: 'https://www.amazon.com/s?k=The+Learners+Chip+Kidd',
    goodreads: 'https://www.goodreads.com/search?q=The%20Learners%20Chip%20Kidd'
  },
  {
    title: 'The Ask',
    author: 'Sam Lipsyte',
    why: 'Satirical contemporary novel about institutions, class, and self-deception.',
    link: 'https://www.amazon.com/s?k=The+Ask+Sam+Lipsyte',
    goodreads: 'https://www.goodreads.com/search?q=The%20Ask%20Sam%20Lipsyte'
  },
  {
    title: 'Lectures of Col. R. G. Ingersoll',
    author: 'Robert G. Ingersoll',
    why: 'Collected public lectures on religion, reason, liberty, and civic life.',
    link: 'https://www.amazon.com/s?k=Lectures+of+Col.+R.+G.+Ingersoll',
    goodreads: 'https://www.goodreads.com/search?q=Lectures%20of%20Col.%20R.%20G.%20Ingersoll'
  }
];

const categoryOrder = [
  'Science Fiction, Fantasy, and Speculative Fiction',
  'Horror and Supernatural',
  'Literary Fiction and Classics',
  'History, Society, and Biography',
  'Psychology, Philosophy, and Self-Development',
  'Markets, Risk, and Decision-Making'
];

const categoryByTitle = {
  "Stephen King's Dark Tower series": 'Horror and Supernatural',
  'How to Fail at Everything and Still Win Big': 'Psychology, Philosophy, and Self-Development',
  "Asimov's Foundation series": 'Science Fiction, Fantasy, and Speculative Fiction',
  'One Summer: America 1927': 'History, Society, and Biography',
  'The Righteous Mind': 'Psychology, Philosophy, and Self-Development',
  "Upton Sinclair's Lanny Budd series": 'History, Society, and Biography',
  It: 'Horror and Supernatural',
  'The Brothers Karamazov': 'Literary Fiction and Classics',
  'How to Think Like a Roman Emperor': 'Psychology, Philosophy, and Self-Development',
  'The Enchiridion': 'Psychology, Philosophy, and Self-Development',
  'The Zamonia series': 'Science Fiction, Fantasy, and Speculative Fiction',
  'The Callahan series': 'Science Fiction, Fantasy, and Speculative Fiction',
  'How to Have Confidence and Power in Dealing with People': 'Psychology, Philosophy, and Self-Development',
  'Destiny of the Republic': 'History, Society, and Biography',
  'The Way of the Shaman series': 'Science Fiction, Fantasy, and Speculative Fiction',
  'Ready Player One': 'Science Fiction, Fantasy, and Speculative Fiction',
  "Old Man's War": 'Science Fiction, Fantasy, and Speculative Fiction',
  'Starship Troopers': 'Science Fiction, Fantasy, and Speculative Fiction',
  'The Moon Is a Harsh Mistress': 'Science Fiction, Fantasy, and Speculative Fiction',
  'The Lazarus Long books': 'Science Fiction, Fantasy, and Speculative Fiction',
  "The Hitchhiker's Guide to the Galaxy series": 'Science Fiction, Fantasy, and Speculative Fiction',
  'How to Win Friends & Influence People': 'Psychology, Philosophy, and Self-Development',
  'Gentleman Bastard series': 'Science Fiction, Fantasy, and Speculative Fiction',
  'The Amazing Adventures of Kavalier & Clay': 'Literary Fiction and Classics',
  'Homo Deus': 'History, Society, and Biography',
  'The Cider House Rules': 'Literary Fiction and Classics',
  'The Sot-Weed Factor': 'Literary Fiction and Classics',
  'The End of the Road': 'Literary Fiction and Classics',
  'A Hero of Our Time': 'Literary Fiction and Classics',
  "What's Eating Gilbert Grape": 'Literary Fiction and Classics',
  'A Scanner Darkly': 'Science Fiction, Fantasy, and Speculative Fiction',
  'Pet Sematary': 'Horror and Supernatural',
  'Incerto series': 'Markets, Risk, and Decision-Making',
  "The Mote in God's Eye": 'Science Fiction, Fantasy, and Speculative Fiction',
  'Adaptive Markets': 'Markets, Risk, and Decision-Making',
  'King Coal': 'History, Society, and Biography',
  Babbitt: 'Literary Fiction and Classics',
  'MaddAddam series': 'Science Fiction, Fantasy, and Speculative Fiction',
  'The Undoing Project: A Friendship That Changed Our Minds': 'Psychology, Philosophy, and Self-Development',
  "Midnight's Children": 'Literary Fiction and Classics',
  'Memos from Purgatory': 'History, Society, and Biography',
  'Dune trilogy': 'Science Fiction, Fantasy, and Speculative Fiction',
  'The Vampire Chronicles': 'Horror and Supernatural',
  'The Bonfire of the Vanities': 'Literary Fiction and Classics',
  'A Man in Full': 'Literary Fiction and Classics',
  '12 Rules for Life: An Antidote to Chaos': 'Psychology, Philosophy, and Self-Development',
  'Cold Mountain': 'Literary Fiction and Classics',
  'Mount Chicago': 'Literary Fiction and Classics',
  'Moonwalking with Einstein: The Art and Science of Remembering Everything': 'Psychology, Philosophy, and Self-Development',
  'Half Empty': 'History, Society, and Biography',
  'The Jungle': 'History, Society, and Biography',
  'Clockwork Angels series': 'Science Fiction, Fantasy, and Speculative Fiction',
  'Vampire$': 'Horror and Supernatural',
  'The World of Null-A': 'Science Fiction, Fantasy, and Speculative Fiction',
  'The Learners': 'Literary Fiction and Classics',
  'The Ask': 'Literary Fiction and Classics',
  'Lectures of Col. R. G. Ingersoll': 'Psychology, Philosophy, and Self-Development'
};

const defaultCategory = 'Literary Fiction and Classics';
const amazonAffiliateTag = 'geraldnorby-20';

const bookGrid = document.getElementById('bookGrid');

const withAmazonTag = (url) => {
  try {
    const parsed = new URL(url);
    if (parsed.hostname.includes('amazon.com')) {
      parsed.searchParams.set('tag', amazonAffiliateTag);
    }
    return parsed.toString();
  } catch (_error) {
    return url;
  }
};

const renderBookCard = (book) => `
  <article class="compact-item compact-item-static">
    <div class="compact-main">
      <h3>${book.title}</h3>
      <p>${book.author} - ${book.why}</p>
    </div>
    <div class="compact-actions">
      <a class="mini-link" href="${withAmazonTag(book.link)}" target="_blank" rel="noopener noreferrer">Amazon &#8599;</a>
      <a class="mini-link secondary" href="${book.goodreads}" target="_blank" rel="noopener noreferrer">Goodreads &#8599;</a>
    </div>
  </article>
`;

if (bookGrid) {
  const groupedBooks = books.reduce((acc, book) => {
    const category = categoryByTitle[book.title] || defaultCategory;
    if (!acc[category]) {
      acc[category] = [];
    }
    acc[category].push(book);
    return acc;
  }, {});

  bookGrid.classList.remove('compact-list');
  bookGrid.classList.add('category-stack');

  bookGrid.innerHTML = categoryOrder
    .filter((category) => groupedBooks[category]?.length)
    .map(
      (category) => `
      <section class="compact-section" aria-label="${category}">
        <h2>${category}</h2>
        <div class="compact-list">
          ${groupedBooks[category].map(renderBookCard).join('')}
        </div>
      </section>
    `
    )
    .join('');
}

