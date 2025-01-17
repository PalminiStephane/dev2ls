// Initialise AOS une fois le DOM chargé
document.addEventListener('DOMContentLoaded', function () {
    AOS.init({
      duration: 1000,
      once: true
    });
  });
  
  // Création des particules
  function createParticles() {
    const particles = document.getElementById('particles');
    for (let i = 0; i < 50; i++) {
      const particle = document.createElement('div');
      particle.className = 'particle';
      particle.style.left = Math.random() * 100 + '%';
      particle.style.animationDelay = Math.random() * 15 + 's';
      particle.style.opacity = Math.random() * 0.5 + 0.2;
      particles.appendChild(particle);
    }
  }
  createParticles();
  