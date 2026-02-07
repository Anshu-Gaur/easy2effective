// navbar mobile fix
const nav = document.getElementById('nav-links');
const icon = document.getElementById('menuIcon');
const navLinks = document.querySelectorAll('#nav-links a');

let menuOpen = false;

// open menu
function openMenu() {
  nav.classList.add('active');
  icon.classList.remove('fa-bars');
  icon.classList.add('fa-xmark');
  menuOpen = true;
}

// close menu
function closeMenu() {
  nav.classList.remove('active');
  icon.classList.remove('fa-xmark');
  icon.classList.add('fa-bars');
  menuOpen = false;
}

// toggle
function toggleMenu() {
  if (window.innerWidth > 576) return; // desktop ignore
  menuOpen ? closeMenu() : openMenu();
}

/* ✅ Close menu when any link is clicked (mobile) */
navLinks.forEach(link => {
  link.addEventListener('click', () => {
    if (window.innerWidth <= 576) {
      closeMenu();
    }
  });
});

/* ✅ Always close menu on page load / back navigation */
window.addEventListener('pageshow', () => {
  closeMenu();
});

/* ✅ Handle resize correctly */
window.addEventListener('resize', () => {
  if (window.innerWidth > 576) {
    // desktop reset
    nav.classList.remove('active');
    icon.classList.remove('fa-xmark');
    icon.classList.add('fa-bars');
    menuOpen = false;
  } else {
    closeMenu();
  }
});
