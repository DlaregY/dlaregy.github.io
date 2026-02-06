const yearTarget = document.getElementById('year');
if (yearTarget) yearTarget.textContent = new Date().getFullYear();

const menuButton = document.querySelector('.menu-button');
const nav = document.querySelector('header nav');

if (menuButton && nav) {
  menuButton.addEventListener('click', () => {
    nav.classList.toggle('show');
  });
}
