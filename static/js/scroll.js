// Najdeme všechny odkazy v navigaci
const navLinks = document.querySelectorAll('nav a');

// Pro každý odkaz přidáme posluchač událostí
navLinks.forEach(link => {
    link.addEventListener('click', () => {
        // Povolíme scrollování po kliknutí na odkaz
        document.body.style.overflow = 'auto';
    });
});
