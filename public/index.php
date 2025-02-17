<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once dirname(__DIR__) . '/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

$recaptchaSiteKey = $_ENV['RECAPTCHA_SITE_KEY'];
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- SEO Meta Tags Optimisés -->
    <title>Dev2ls | Expert Création Site Web & IA à Marseille | Développement Sur Mesure</title>
    <meta name="description" content="Agence de développement web à Marseille ✓ Expert en création de sites web & landing pages ✓ Solutions IA innovantes ✓ Web 3.0 | Devis gratuit au 06.82.49.51.32">
    <meta name="keywords" content="développement web Marseille, agence web Marseille, création site internet Marseille, landing page Marseille, intelligence artificielle Marseille, IA Marseille, web 3.0, développeur Marseille">
    <meta name="author" content="Dev2ls">
    <meta name="robots" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1">
    
    <!-- Balises de localisation enrichies -->
    <meta name="geo.region" content="FR-13">
    <meta name="geo.placename" content="Marseille">
    <meta name="geo.position" content="43.296482;5.369780">
    <meta name="ICBM" content="43.296482, 5.369780">
    <link rel="canonical" href="https://www.dev2ls.fr/">
    
    <!-- Open Graph / Social Media Meta Tags Optimisés -->
    <meta property="og:title" content="Dev2ls | Expert Développement Web & IA à Marseille">
    <meta property="og:description" content="Agence experte en création de sites web à Marseille ✓ Landing pages ✓ Solutions IA ✓ Web 3.0 | Contactez-nous au 06.82.49.51.32">
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://www.dev2ls.fr">
    <meta property="og:image" content="https://www.dev2ls.fr/assets/icons/icon-512x512.png">
    <meta property="og:locale" content="fr_FR">
    <meta property="og:site_name" content="Dev2ls">

    <!-- Twitter Card Enrichie -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Dev2ls | Expert Web & IA à Marseille">
    <meta name="twitter:description" content="Agence de développement web à Marseille ✓ Expert en création de sites & solutions IA">
    <meta name="twitter:image" content="https://www.dev2ls.fr/assets/icons/icon-512x512.png">
    <meta name="twitter:url" content="https://www.dev2ls.fr">
    
    <!-- Favicon et PWA -->
    <link rel="icon" type="image/x-icon" href="/favicon.ico">
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="manifest" href="manifest.json">
    <meta name="theme-color" content="#00fff2">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="apple-mobile-web-app-title" content="Dev2ls">
    
    <!-- Preload des ressources critiques -->
    <link rel="preload" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" as="style">
    <link rel="preload" href="./assets/css/style.css" as="style">
    <link rel="preload" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js" as="script">
    
    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
    <link rel="stylesheet" href="./assets/css/style.css">

    <!-- Icônes PWA -->
    <link rel="apple-touch-icon" sizes="72x72" href="assets/icons/icon-72x72.png">
    <link rel="apple-touch-icon" sizes="96x96" href="assets/icons/icon-96x96.png">
    <link rel="apple-touch-icon" sizes="128x128" href="assets/icons/icon-128x128.png">
    <link rel="apple-touch-icon" sizes="144x144" href="assets/icons/icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="assets/icons/icon-152x152.png">
    <link rel="apple-touch-icon" sizes="192x192" href="assets/icons/icon-192x192.png">
    <link rel="icon" type="image/png" sizes="192x192" href="assets/icons/icon-192x192.png">

    <!-- Schema.org markup enrichi -->
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "ProfessionalService",
      "name": "Dev2ls",
      "description": "Agence experte en développement web et solutions IA à Marseille. Création de sites web professionnels, landing pages et solutions digitales innovantes sur mesure.",
      "image": "https://www.dev2ls.fr/assets/icons/icon-512x512.png",
      "telephone": "+33682495132",
      "priceRange": "€€",
      "address": {
        "@type": "PostalAddress",
        "addressLocality": "Marseille",
        "addressRegion": "Provence-Alpes-Côte d'Azur",
        "addressCountry": "FR",
        "postalCode": "13000"
      },
      "geo": {
        "@type": "GeoCoordinates",
        "latitude": "43.296482",
        "longitude": "5.369780"
      },
      "url": "https://www.dev2ls.fr",
      "email": "dev2ls13820@gmail.com",
      "serviceType": [
        "Création de Sites Web",
        "Développement Landing Pages",
        "Solutions Intelligence Artificielle",
        "Web 3.0",
        "SEO",
        "Web Design"
      ],
      "areaServed": {
        "@type": "City",
        "name": "Marseille"
      },
      "sameAs": [
        "https://www.linkedin.com/in/stephane-palmini",
        "https://www.instagram.com/dev2ls/"
      ],
      "openingHours": "Mo-Fr 09:00-18:00",
      "availableLanguage": "French"
    }
    </script>

    <!-- Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-0QG1NJSZ0K"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
      gtag('config', 'G-0QG1NJSZ0K');
    </script>

    <!-- Script captcha -->
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>

<body>
    <div class="background-animation" aria-hidden="true"></div>
    <div class="particles" id="particles" aria-hidden="true"></div>

    <header>
        <nav class="nav" aria-label="Navigation principale">
            <div class="nav-content">
                <div class="logo" aria-label="Dev2ls - Retour à l'accueil">
                    <a href="/" title="Dev2ls - Agence Web Marseille">Dev2ls</a>
                </div>
                <div class="nav-links">
                    <a href="#accueil" aria-current="page">Accueil</a>
                    <a href="#services">Services</a>
                    <a href="#contact">Contact</a>
                </div>
            </div>
        </nav>
    </header>

    <main>
        <section class="hero" id="accueil">
            <div class="hero-content" data-aos="fade-up">
                <h1>Agence Web & Solutions IA à Marseille | Dev2ls</h1>
                <p>Votre partenaire digital local pour la création de sites web professionnels et solutions IA innovantes. Plus de 5 ans d'expertise au service des entreprises marseillaises et de la région PACA.</p>
                <div class="cta-group">
                    <a href="tel:+33682495132" class="cta-button">📞 06.82.49.51.32</a>
                    <a href="#contact" class="cta-button secondary">Devis Gratuit à Marseille</a>
                </div>
                <div class="location-badge">
                    <p>🏢 Basé à Marseille | 📍 Intervention dans toute la région PACA</p>
                </div>
            </div>
        </section>

        <section class="services" id="services" aria-labelledby="services-title">
            <h2 id="services-title" class="section-title" data-aos="fade-up">Nos Solutions Digitales à Marseille</h2>
            <div class="services-grid">
                <article class="service-card" data-aos="fade-up" data-aos-delay="100">
                    <h3>Landing Pages Performantes</h3>
                    <p>Création de pages d'atterrissage optimisées pour la conversion. Idéal pour vos campagnes marketing et la génération de leads qualifiés.</p>
                </article>
        
                <article class="service-card" data-aos="fade-up" data-aos-delay="200">
                    <h3>Sites Web Professionnels</h3>
                    <p>Développement de sites vitrines et e-commerce sur mesure. Design moderne, responsive et optimisé pour le référencement naturel.</p>
                </article>
        
                <article class="service-card" data-aos="fade-up" data-aos-delay="300">
                    <h3>Web 3.0</h3>
                    <p>Développement d'applications décentralisées et blockchain innovantes. Une approche avant-gardiste pour des expériences web nouvelle génération et sécurisées.</p>
                </article>

                <article class="service-card" data-aos="fade-up" data-aos-delay="400">
                    <h3>IA Avancée</h3>
                    <p>Intégration de solutions d'intelligence artificielle personnalisées. Automatisation intelligente, chatbots avancés et analyse prédictive pour optimiser vos processus.</p>
                </article>

                <article class="service-card" data-aos="fade-up" data-aos-delay="500">
                    <h3>Innovation Tech</h3>
                    <p>Accompagnement expert en transformation digitale. Audit, conseil et intégration des dernières technologies pour donner un avantage concurrentiel à votre entreprise.</p>
                </article>

                <article class="service-card" data-aos="fade-up" data-aos-delay="600">
                    <h3>Optimisation & Référencement</h3>
                    <p>Amélioration des performances techniques et de la visibilité en ligne. Optimisation SEO, expérience utilisateur et vitesse de chargement pour un impact maximal.</p>
                </article>

                <article class="service-card" data-aos="fade-up" data-aos-delay="700">
                    <h3>Web Design</h3>
                    <p>Création d'interfaces modernes et intuitives. Design graphique personnalisé, ergonomie optimale et expérience utilisateur fluide pour captiver vos visiteurs.</p>
                </article>

                <article class="service-card" data-aos="fade-up" data-aos-delay="800">
                    <h3>Formation & Accompagnement</h3>
                    <p>Programmes de formation sur mesure aux outils digitaux. Accompagnement personnalisé et support continu pour assurer la maîtrise de vos solutions numériques.</p>
                </article>

                <article class="service-card" data-aos="fade-up" data-aos-delay="900">
                    <h3>Web Marketing</h3>
                    <p>Élaboration de stratégies digitales performantes. Campagnes publicitaires ciblées, marketing de contenu et optimisation des conversions pour maximiser votre ROI.</p>
                </article>
            </div>
        </section>

        <section class="local-expertise" data-aos="fade-up">
            <h2 class="section-title">Votre Expert Digital à Marseille</h2>
            <div class="expertise-grid">
                <div class="expertise-card">
                    <h3>🎯 Expertise Locale</h3>
                    <p>Une compréhension approfondie du marché marseillais et des besoins spécifiques des entreprises de la région PACA.</p>
                </div>
                <div class="expertise-card">
                    <h3>💼 Clients Locaux</h3>
                    <p>Plus de 50 entreprises marseillaises nous font confiance pour leur présence digitale.</p>
                </div>
                <div class="expertise-card">
                    <h3>🤝 Support de Proximité</h3>
                    <p>Un accompagnement personnalisé avec des rendez-vous possibles sur Marseille et ses environs.</p>
                </div>
            </div>
        </section>

	    <section class="why-us" data-aos="fade-up">
            <h2>Pourquoi Choisir Dev2ls ?</h2>
            <div class="features-grid">
                <div class="feature">
                    <h3>Transparence & Engagement</h3>
                    <p>Une communication claire sur chaque étape de votre projet et un engagement total pour atteindre vos objectifs. Devis détaillé et suivi régulier garantis.</p>
                </div>
                <div class="feature">
                    <h3>Solutions Sur Mesure</h3>
                    <p>Chaque projet est unique. Nous développons des solutions adaptées à vos objectifs et votre budget.</p>
                </div>
                <div class="feature">
                    <h3>Innovation Technologique</h3>
                    <p>Experts en IA et Web 3.0, nous intégrons les dernières technologies pour votre avantage concurrentiel.</p>
                </div>
            </div>
        </section>

        <section class="testimonials" data-aos="fade-up">
            <h2>Ils Nous Font Confiance à Marseille</h2>
            <div class="testimonials-grid">
                <div class="testimonial-card">
                    <p class="quote">"Dev2ls a développé une application innovante de tombola digitale nous permettant de vendre des tickets pour tenter de gagner des places en loge au Vélodrome. Cette solution nous aide à financer des voyages pour nos adhérents. Simple d'utilisation et très efficace !"</p>
                    <p class="author">- Pauline, Club de Judo Ensuès</p>
                </div>
                
                <div class="testimonial-card">
                    <p class="quote">"Site vitrine élégant et professionnel qui reflète parfaitement mon activité. L'équipe a su retranscrire exactement mes besoins."</p>
                    <p class="author">- Alexandre, Safride</p>
                </div>
                
                <div class="testimonial-card">
                    <p class="quote">"Une landing page efficace qui convertit. Les résultats sont au rendez-vous avec une augmentation significative des prises de contact."</p>
                    <p class="author">- Anaïs, Rose de Soie</p>
                </div>
            </div>
        </section>

        <section class="contact" id="contact" aria-labelledby="contact-form-title">
            <form action="send_email.php" method="POST" class="contact-form" data-aos="fade-up">
              <input type="hidden" name="csrf_token" id="csrf_token">
                <h3 id="contact-form-title">Say Hello!</h3>
                
                <div class="form-group">
                    <label for="name">Nom</label>
                    <input 
                        type="text" 
                        id="name" 
                        name="name" 
                        placeholder="Entrez votre nom"
                        required
                    >
                </div>
        
                <div class="form-group">
                    <label for="email">Email</label>
                    <input 
                        type="email" 
                        id="email" 
                        name="email" 
                        placeholder="Entrez votre email"
                        required
                    >
                </div>
        
                <div class="form-group">
                    <label for="service">Service souhaité</label>
                    <select id="service" name="service" required>
                        <option value="" disabled selected>Choisissez un service</option>
                        <option value="landing">Landing Page</option>
                        <option value="vitrine">Site Vitrine</option>
                        <option value="web3">Web 3.0</option>
                        <option value="ia">IA Avancée</option>
                        <option value="innovation">Innovation Tech</option>
                        <option value="seo">Optimisation & Référencement</option>
                        <option value="design">Web Design</option>
                        <option value="formation">Formation & Accompagnement</option>
                        <option value="marketing">Web Marketing</option>
                    </select>
                </div>
        
                <div class="form-group">
                    <label for="budget">Budget estimé</label>
                    <select id="budget" name="budget">
                        <option value="" disabled selected>Sélectionnez votre budget</option>
                        <option value="small">< 1000€</option>
                        <option value="medium">1000€ - 5000€</option>
                        <option value="large">5000€ - 10000€</option>
                        <option value="xl">> 10000€</option>
                    </select>
                </div>
        
                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea 
                        id="message" 
                        name="message" 
                        placeholder="Décrivez votre projet..."
                        required
                    ></textarea>
                </div>
        
                <div class="form-group">
                  <div class="g-recaptcha" data-sitekey="<?php echo $recaptchaSiteKey; ?>"></div>
                </div>

                <button type="submit" class="cta-button">Envoyer →</button>
            </form>
        </section>
    </main>

   <footer class="footer">
    <div class="footer-content">
        <!-- Section principale -->
        <div class="footer-main">
            <h3>Dev2ls</h3>
            <p class="footer-slogan">Solutions digitales innovantes à Marseille</p>
            <div class="footer-contact">
                <a href="tel:+33682495132">
                    <span>📞</span> 06.82.49.51.32
                </a>
                <a href="mailto:dev2ls13820@gmail.com">
                    <span>📧</span> dev2ls13820@gmail.com
                </a>
            </div>
        </div>

        <!-- Section Services -->
        <div class="footer-services">
            <h4>Nos Services</h4>
            <ul>
                <li><a href="#landing">Landing Pages</a></li>
                <li><a href="#sites">Sites Web</a></li>
                <li><a href="#web3">Web 3.0</a></li>
                <li><a href="#ia">Intelligence Artificielle</a></li>
                <li><a href="#seo">SEO & Performance</a></li>
            </ul>
        </div>

        <!-- Section Navigation -->
        <div class="footer-nav">
            <h4>Navigation</h4>
            <ul>
                <li><a href="#accueil">Accueil</a></li>
                <li><a href="#services">Services</a></li>
                <li><a href="#contact">Contact</a></li>
                <li><a href="#contact">Demander un devis</a></li>
            </ul>
        </div>

         <!-- Section Localisation enrichie -->
         <div class="footer-location">
            <h4>Zone d'Intervention</h4>
            <p>🏢 Basé à Marseille</p>
            <p>Intervention dans toute la région PACA :</p>
            <ul class="service-areas">
                <li>Marseille et alentours</li>
                <li>Aix-en-Provence</li>
                <li>Côte Bleue</li>
                <li>Martigues</li>
                <li>Aubagne</li>
            </ul>
        </div>

        <!-- Section Réseaux Sociaux -->
        <div class="footer-social">
                <h4>Suivez-nous</h4>
                <div class="social-links">
                    <a href="https://www.linkedin.com/in/stephane-palmini" target="_blank" rel="noopener noreferrer" class="social-link">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"></path><rect x="2" y="9" width="4" height="12"></rect><circle cx="4" cy="4" r="2"></circle></svg>
                        <span class="sr-only"></span>
                    </a>
                    <a href="https://www.facebook.com/profile.php?id=61571050186124" target="_blank" rel="noopener noreferrer" class="social-link">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></svg>
                        <span class="sr-only"></span>
                    </a>
                    <a href="https://www.instagram.com/dev2ls/" target="_blank" rel="noopener noreferrer" class="social-link">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>
                        <span class="sr-only"></span>
                    </a>
                </div>
        </div>
    </div>

    <!-- Barre de copyright -->
    <div class="footer-bottom">
        <div class="footer-legal">
            <p>&copy; 2024 Dev2ls - Tous droits réservés</p>
            <div class="footer-links">
                <a href="./mentions-legales.php">Mentions légales</a>
                <a href="./politique-confidentialite.php">Politique de confidentialité</a>
            </div>
        </div>
    </div>
  </footer>

    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js" defer></script>
    <script src="./assets/js/script.js" defer></script>
    <script src="./assets/js/form-handler.js"></script>
    <script>
    if ('serviceWorker' in navigator) {
    window.addEventListener('load', async () => {
        try {
        const registration = await navigator.serviceWorker.register('service-worker.js');
        console.log('ServiceWorker registration successful with scope: ', registration.scope);
        } catch(err) {
        console.log('ServiceWorker registration failed: ', err);
        }
    });
    }
    </script>
</body>
</html>
