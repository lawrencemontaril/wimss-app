// JavaScript for carousel functionality
document.addEventListener('DOMContentLoaded', function () {
  const carousel = document.getElementById('carousel');
  const items = document.querySelectorAll('.carousel-item');
  const totalItems = items.length;
  let currentIndex = 0;

  function updateCarousel() {
    const offset = -currentIndex * 100;
    carousel.style.transform = `translateX(${offset}%)`;
  }

  document.getElementById('prev').addEventListener('click', function () {
    currentIndex = currentIndex > 0 ? currentIndex - 1 : totalItems - 1;
    updateCarousel();
  });

  document.getElementById('next').addEventListener('click', function () {
    currentIndex = (currentIndex + 1) % totalItems;
    updateCarousel();
  });

  // Optional: Auto-play functionality
  setInterval(function () {
    currentIndex = (currentIndex + 1) % totalItems;
    updateCarousel();
  }, 5000);
});
