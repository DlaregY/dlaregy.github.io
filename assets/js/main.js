const yearTarget = document.getElementById('year');
if (yearTarget) yearTarget.textContent = new Date().getFullYear();

const menuButton = document.querySelector('.menu-button');
const nav = document.querySelector('header nav');

if (menuButton && nav) {
  menuButton.addEventListener('click', () => {
    nav.classList.toggle('show');
  });
}

const THEME_KEY = 'theme';
const THEMES = ['modern', 'dos', 'nes'];

function normalizeTheme(theme) {
  return THEMES.includes(theme) ? theme : 'modern';
}

function getImageExtension(img) {
  const src = img.getAttribute('src') || '';
  const extMatch = src.match(/\.[a-zA-Z0-9]+$/);
  return extMatch ? extMatch[0] : '.png';
}

function swapThemedImages(theme) {
  document.querySelectorAll('img.themed-img[data-img-base]').forEach((img) => {
    const basePath = img.dataset.imgBase;
    const ext = getImageExtension(img);

    if (!basePath) return;

    const targetSrc = `${basePath}--${theme}${ext}`;
    const modernSrc = `${basePath}--modern${ext}`;

    if (img.dataset.activeTheme === theme && img.getAttribute('src') === targetSrc) {
      return;
    }

    img.onerror = () => {
      img.onerror = null;
      img.setAttribute('src', modernSrc);
    };

    img.dataset.activeTheme = theme;
    img.setAttribute('src', targetSrc);
  });
}

function applyTheme(theme) {
  const normalizedTheme = normalizeTheme(theme);
  document.documentElement.setAttribute('data-theme', normalizedTheme);
  localStorage.setItem(THEME_KEY, normalizedTheme);

  document.querySelectorAll('[data-theme-btn]').forEach((button) => {
    button.setAttribute('aria-pressed', String(button.dataset.themeBtn === normalizedTheme));
  });

  swapThemedImages(normalizedTheme);
}

const savedTheme = normalizeTheme(localStorage.getItem(THEME_KEY));

document.querySelectorAll('[data-theme-btn]').forEach((button) => {
  button.addEventListener('click', () => applyTheme(button.dataset.themeBtn));
});

applyTheme(savedTheme);
