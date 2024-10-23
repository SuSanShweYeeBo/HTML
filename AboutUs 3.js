let index = 0;
const itemsToShow = 3; // Number of items to show at once

function showSlide() {
    const slides = document.querySelectorAll('.carousel-item');
    const totalSlides = slides.length;

    // Ensure index is within bounds
    if (index >= totalSlides) index = 0;
    if (index < 0) index = totalSlides - itemsToShow;

    // Calculate the offset percentage
    const offset = -index * (100 / itemsToShow);
    document.querySelector('.carousel-inner').style.transform = `translateX(${offset}%)`;
}

function nextSlide() {
    index++;
    showSlide();
}

function prevSlide() {
    index--;
    showSlide();
}

// Initialize the carousel
showSlide();

// Optional: add keyboard controls
document.addEventListener('keydown', (event) => {
    if (event.key === 'ArrowRight') nextSlide();
    if (event.key === 'ArrowLeft') prevSlide();
});
