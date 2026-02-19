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

const prefillContactFormFromQuery = () => {
  const isContactPage = window.location.pathname.endsWith('contact.html');
  if (!isContactPage) {
    return;
  }

  const params = new URLSearchParams(window.location.search);
  const fieldMap = [
    { param: 'name', id: 'name' },
    { param: 'email', id: 'email' },
    { param: 'comment', id: 'comment' },
    { param: 'things_i_love', id: 'love' }
  ];

  fieldMap.forEach(({ param, id }) => {
    const value = (params.get(param) || '').trim();
    if (!value) {
      return;
    }

    const field = document.getElementById(id);
    if (!field || field.value) {
      return;
    }

    field.value = value;
  });
};

prefillContactFormFromQuery();

const marcusPopup = document.getElementById('marcus-popup');
const marcusPopupTriggers = document.querySelectorAll('[data-open-marcus-popup]');

if (marcusPopup && marcusPopupTriggers.length) {
  marcusPopupTriggers.forEach((trigger) => {
    trigger.addEventListener('click', (event) => {
      event.preventDefault();

      if (typeof marcusPopup.showModal === 'function') {
        if (!marcusPopup.open) {
          marcusPopup.showModal();
        }
      } else {
        marcusPopup.setAttribute('open', '');
      }
    });
  });

  marcusPopup.addEventListener('click', (event) => {
    const rect = marcusPopup.getBoundingClientRect();
    const isInDialog =
      rect.top <= event.clientY &&
      event.clientY <= rect.top + rect.height &&
      rect.left <= event.clientX &&
      event.clientX <= rect.left + rect.width;

    if (!isInDialog) {
      if (typeof marcusPopup.close === 'function') {
        marcusPopup.close();
      } else {
        marcusPopup.removeAttribute('open');
      }
    }
  });
}


const brandTagline = document.querySelector('.brand > span');

if (brandTagline) {
  brandTagline.setAttribute('role', 'link');
  brandTagline.setAttribute('tabindex', '0');
  brandTagline.setAttribute('aria-label', 'Open restricted access page');
  brandTagline.style.cursor = 'pointer';

  const openSecretLoginPage = (event) => {
    event.preventDefault();
    event.stopPropagation();
    window.location.href = 'login.html';
  };

  brandTagline.addEventListener('click', openSecretLoginPage);
  brandTagline.addEventListener('keydown', (event) => {
    if (event.key === 'Enter' || event.key === ' ') {
      openSecretLoginPage(event);
    }
  });
}
