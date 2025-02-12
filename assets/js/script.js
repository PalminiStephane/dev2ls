// Performance optimization
document.addEventListener('DOMContentLoaded', function() {
  // Lazy load images
  const images = document.querySelectorAll('img[data-src]');
  if ('IntersectionObserver' in window) {
      const imageObserver = new IntersectionObserver((entries, observer) => {
          entries.forEach(entry => {
              if (entry.isIntersecting) {
                  const img = entry.target;
                  img.src = img.dataset.src;
                  img.removeAttribute('data-src');
                  observer.unobserve(img);
              }
          });
      });

      images.forEach(img => imageObserver.observe(img));
  }

  // Initialize AOS with performance options
  AOS.init({
      duration: 1000,
      once: true,
      disable: window.innerWidth < 768
  });
});

// Optimized particle creation
function createParticles() {
  const particles = document.getElementById('particles');
  const fragment = document.createDocumentFragment();
  
  for (let i = 0; i < 50; i++) {
      const particle = document.createElement('div');
      particle.className = 'particle';
      particle.style.cssText = `
          left: ${Math.random() * 100}%;
          animation-delay: ${Math.random() * 15}s;
          opacity: ${Math.random() * 0.5 + 0.2};
      `;
      fragment.appendChild(particle);
  }
  
  particles.appendChild(fragment);
}

// Defer non-critical operations
window.addEventListener('load', () => {
  createParticles();
});