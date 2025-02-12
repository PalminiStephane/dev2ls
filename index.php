<?php
require 'vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$recaptchaSiteKey = $_ENV['RECAPTCHA_SITE_KEY'];
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- SEO Meta Tags -->
    <title>Dev2ls | Solutions Web & IA Innovantes à Marseille | Développement sur mesure</title>
    <meta name="description" content="Dev2ls, expert en développement web et solutions IA à Marseille. Création de sites web, applications IA et transformation digitale pour propulser votre entreprise vers l'avenir.">
    <meta name="keywords" content="développement web, intelligence artificielle, IA, création site web, landing page, web 3.0, Marseille">
    <meta name="author" content="Dev2ls">
    <meta name="robots" content="index, follow">
    
    <!-- Open Graph / Social Media Meta Tags -->
    <meta property="og:title" content="Dev2ls | Solutions Web & IA Innovantes">
    <meta property="og:description" content="Expertise en développement web et solutions IA pour propulser votre entreprise vers l'avenir.">
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://www.dev2ls.com">
    <meta property="og:image" content="https://www.dev2ls.com/assets/images/og-image.jpg">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="./assets/images/favicon/favicon.png">


    
    <!-- Preload des ressources critiques -->
    <link rel="preload" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" as="style">
    <link rel="preload" href="./assets/css/style.css" as="style">
    <link rel="preload" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js" as="script">
    
    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
    <link rel="stylesheet" href="./assets/css/style.css">

    <!-- Script captcha -->
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

    <!-- Schema.org markup -->
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "ProfessionalService",
      "name": "Dev2ls",
      "description": "Agence de développement web et solutions IA à Marseille",
      "address": {
        "@type": "PostalAddress",
        "addressLocality": "Marseille",
        "addressCountry": "FR"
      },
      "url": "https://www.dev2ls.com",
      "email": "dev2ls13820@gmail.com",
      "serviceType": ["Développement Web", "Intelligence Artificielle", "Web 3.0"]
    }
    </script>
</head>
<body>
    <div class="background-animation" aria-hidden="true"></div>
    <div class="particles" id="particles" aria-hidden="true"></div>

    <header>
        <nav class="nav" aria-label="Navigation principale">
            <div class="nav-content">
                <div class="logo" aria-label="Dev2ls - Retour à l'accueil">Dev2ls</div>
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
                <h1>Expertise Web & IA à Marseille</h1>
                <p>Solutions innovantes en développement web et intelligence artificielle pour propulser votre entreprise vers l'avenir.</p>
                <a href="tel:+33682495132" class="cta-button">☎️ Appelez-nous au 06.82.49.51.32</a>
            </div>
        </section>

        <section class="services" id="services" aria-labelledby="services-title">
            <h2 id="services-title" class="section-title" data-aos="fade-up">Nos Solutions</h2>
            <div class="services-grid">
                <article class="service-card" data-aos="fade-up" data-aos-delay="100">
                    <h3>Création de Landing Page</h3>
                    <p>Pages optimisées pour la conversion, conçues pour capter l'attention et générer des leads.</p>
                </article>
        
                <article class="service-card" data-aos="fade-up" data-aos-delay="200">
                    <h3>Site Vitrine</h3>
                    <p>Présentez votre activité et vos services de manière claire, attrayante et professionnelle.</p>
                </article>
        
                <article class="service-card" data-aos="fade-up" data-aos-delay="300">
                    <h3>Web 3.0</h3>
                    <p>Applications décentralisées et expériences web nouvelle génération.</p>
                </article>
        
                <article class="service-card" data-aos="fade-up" data-aos-delay="400">
                    <h3>IA Avancée</h3>
                    <p>Solutions d'intelligence artificielle sur mesure et automatisation cognitive.</p>
                </article>
        
                <article class="service-card" data-aos="fade-up" data-aos-delay="500">
                    <h3>Innovation Tech</h3>
                    <p>Conseil en transformation digitale et intégration des dernières technologies émergentes.</p>
                </article>
        
                <article class="service-card" data-aos="fade-up" data-aos-delay="600">
                    <h3>Optimisation & Référencement</h3>
                    <p>Améliorez les performances et la visibilité de votre site (SEO, UX, vitesse de chargement).</p>
                </article>

                <article class="service-card" data-aos="fade-up" data-aos-delay="700">
                    <h3>Web Design</h3>
                    <p>Conception graphique et ergonomique de votre site web pour une expérience utilisateur optimale.</p>
                </article>

                <article class="service-card" data-aos="fade-up" data-aos-delay="800">
                    <h3>Formation & Accompagnement</h3>
                    <p>Formations personnalisées et accompagnement pour maîtriser les outils digitaux.</p>
                </article>

                <article class="service-card" data-aos="fade-up" data-aos-delay="900">
                    <h3>Web Marketing</h3>
                    <p>Stratégie digitale, campagnes publicitaires et marketing de contenu pour booster votre visibilité.</p>
                </article>
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

    <footer>
        <p>&copy; 2024 Dev2ls - Tous droits réservés</p>
    </footer>

    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js" defer></script>
    <script src="./assets/js/script.js" defer></script>
    <script src="./assets/js/form-handler.js"></script>
</body>
</html>