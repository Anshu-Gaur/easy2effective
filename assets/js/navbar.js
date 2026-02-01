// navbar
let menuOpen = false;

const nav = document.getElementById('nav-links');
const icon = document.getElementById('menuIcon');

function openMenu() {
  nav.style.right = '0';
  nav.style.opacity = '1';
  icon.classList.remove('fa-bars');
  icon.classList.add('fa-xmark');
  menuOpen = true;
}

function closeMenu() {
  nav.style.right = '-100%';
  nav.style.opacity = '0';
  icon.classList.remove('fa-xmark');
  icon.classList.add('fa-bars');
  menuOpen = false;
}

function toggleMenu() {
  menuOpen ? closeMenu() : openMenu();
}

/* Reset menu on page show (refresh / back button) */
window.addEventListener('pageshow', () => {
  if (window.innerWidth <= 576) {
    closeMenu();
  }
});

/* Auto close menu when resizing to desktop */
window.addEventListener('resize', () => {
  if (window.innerWidth >= 576) {
    openMenu();
  }
});
