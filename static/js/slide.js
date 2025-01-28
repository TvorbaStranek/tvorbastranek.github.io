document.addEventListener('DOMContentLoaded', () => {
    let currentSlide = 0; // Index aktuálního obrázku
    const slides = document.querySelectorAll('.slide');
    const totalSlides = slides.length;
  
    // Funkce pro zobrazení aktuálního obrázku
    function showSlide(index) {
      slides.forEach((slide, i) => {
        slide.classList.remove('active'); // Odstranění aktivní třídy ze všech
        if (i === index) {
          slide.classList.add('active'); // Přidání aktivní třídy aktuálnímu
        }
      });
    }
  
    // Předchozí obrázek
    document.getElementById('prev').addEventListener('click', () => {
      currentSlide = (currentSlide - 1 + totalSlides) % totalSlides;
      showSlide(currentSlide);
    });
  
    // Další obrázek
    document.getElementById('next').addEventListener('click', () => {
      currentSlide = (currentSlide + 1) % totalSlides;
      showSlide(currentSlide);
    });
  
    // Automatický posun
    function autoSlide() {
      currentSlide = (currentSlide + 1) % totalSlides;
      showSlide(currentSlide);
    }
  
    // Spuštění slideshow
    showSlide(currentSlide);
    setInterval(autoSlide, 10000); // Automatické přepnutí každých 10 sekund
  });
  