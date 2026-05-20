<?php
// Lecture sécurisée du fichier de configuration
$config = [];
if (file_exists('config.json')) {
    $config = json_decode(file_get_contents('config.json'), true);
}

// Extraction des nœuds principaux
$global = $config['global'] ?? [];
$sec = $config['sections'] ?? [];
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La Minute Créole | Traiteur Événementiel Créole</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            font-size: <?= htmlspecialchars($global['font_body_size'] ?? '16px') ?>;
            line-height: <?= htmlspecialchars($global['base_line_height'] ?? '1.7') ?>;
        }
    </style>
</head>
<body>

    <nav>
        <div class="logo">La Minute Créole<span>.</span></div>
        <div class="menu-burger" onclick="toggleMenu()">
            <div class="bar"></div>
            <div class="bar"></div>
            <div class="bar"></div>
        </div>
    </nav>

    <div class="menu-overlay" onclick="toggleMenu()"></div>

    <div class="side-menu">
        <div class="close-btn" onclick="toggleMenu()">✕</div>
        <div class="side-menu-links">
            <a href="#manifeste" onclick="toggleMenu()">Accueil</a>
            <a href="#prestations" onclick="toggleMenu()">Mariages</a>
            
            <div class="side-menu-group">
                <span class="side-menu-title">Evennements</span>
                <div class="submenu-content">
                    <div class="submenu-content-inner">
                        <a href="#galas" onclick="toggleMenu()">Galas & Réceptions</a>
                        <a href="#corporate" onclick="toggleMenu()">Corporate</a>
                        <a href="#prive" onclick="toggleMenu()">Événements Privés</a>
                    </div>
                </div>
            </div>
            
            <a href="#devis" onclick="toggleMenu()">Contact</a>
        </div>

        <div class="side-menu-footer">
            <div class="contact-info">
                <a href="tel:+33123456789">+33 1 23 45 67 89</a>
                <a href="mailto:contact@laminutecreole.fr">contact@laminutecreole.fr</a>
            </div>
            <div class="social-links">
                <a href="#" class="social-icon" aria-label="Instagram">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>
                </a>
                <a href="#" class="social-icon" aria-label="Facebook">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></svg>
                </a>
            </div>
            <div class="copyright">
                © 2026 La Minute Créole.
            </div>
        </div>
    </div>

    <header class="hero" style="
        background: linear-gradient(to right, rgba(10, 35, 66, 0.95) 30%, rgba(111, 156, 235, 0.3) 100%), url('<?= htmlspecialchars($sec['hero']['bg_image'] ?? 'https://images.unsplash.com/photo-1555244162-803834f70033?ixlib=rb-4.0.3&auto=format&fit=crop&w=2000&q=80') ?>') center/cover !important;
        --hero-title-color: <?= htmlspecialchars($sec['hero']['title_color'] ?? '#FAF6F0') ?>;
        --hero-text-color: <?= htmlspecialchars($sec['hero']['text_color'] ?? 'rgba(251, 249, 245, 0.9)') ?>;
    ">
        <div class="hero-content">
            <h1 style="font-size: <?= htmlspecialchars($sec['hero']['title_size'] ?? '5rem') ?>; color: var(--hero-title-color);">
                <?= $sec['hero']['title'] ?? "L'Or des Alizés.<br>L'Art de la <span class='serif-italic'>Haute Mer.</span>" ?>
            </h1>
            <p style="font-size: <?= htmlspecialchars($sec['hero']['text_size'] ?? '1.2rem') ?>; color: var(--hero-text-color);">
                <?= htmlspecialchars($sec['hero']['subtitle'] ?? "Une haute gastronomie insulaire dictée par le rythme des marées, la fraîcheur des embruns et l'héritage vibrant des tables créoles.") ?>
            </p>
            <a href="#devis" class="btn-devis" style="background: <?= htmlspecialchars($sec['hero']['btn_bg'] ?? '#6F9CEB') ?>; color: <?= htmlspecialchars($sec['hero']['btn_text'] ?? '#0A2342') ?>;">
                <?= htmlspecialchars($sec['hero']['cta_text'] ?? 'Créer votre événement ↗') ?>
            </a>
        </div>

        <div class="floating-badges">
            <div class="badge-exotique madras-fabric"><span>✦</span> Grand Outremer</div>
            <div class="badge-exotique madras-fabric" style="--delay: 1.5s;"><span>✦</span> Côte Sous-le-Vent</div>
            <div class="badge-exotique madras-fabric" style="--delay: 3s;"><span>✦</span> Douceur des Îles</div>
        </div>
    </header>

    <section class="manifesto" id="manifeste" style="
        background: <?= htmlspecialchars($sec['manifesto']['bg_color'] ?? '#E1E9F5') ?>;
        --manifesto-text-color: <?= htmlspecialchars($sec['manifesto']['text_color'] ?? '#0A2342') ?>;
    ">
        <div class="manifesto-text">
            <div class="madras-line-accent"></div>
            <h2 style="font-size: <?= htmlspecialchars($sec['manifesto']['title_size'] ?? '3.5rem') ?>; color: <?= htmlspecialchars($sec['manifesto']['title_color'] ?? '#0A2342') ?>;">
                <?= $sec['manifesto']['title'] ?? "Brut. Azur.<br><span class='serif-italic'>Profondément solaire.</span>" ?>
            </h2>
            <p style="font-size: <?= htmlspecialchars($sec['manifesto']['text_size'] ?? '1.1rem') ?>; color: var(--manifesto-text-color);">
                <?= htmlspecialchars($sec['manifesto']['p1'] ?? "Maison Solstice célèbre l'alliance de l'océan et de la terre sacrée des Antilles. Notre cuisine est une brise marine.") ?>
            </p>
            <p style="font-size: <?= htmlspecialchars($sec['manifesto']['text_size'] ?? '1.1rem') ?>; color: var(--manifesto-text-color);">
                <?= htmlspecialchars($sec['manifesto']['p2'] ?? "Chaque table est dressée comme un rivage d'exception.") ?>
            </p>
        </div>
        <div style="position: relative;">
            <img src="<?= htmlspecialchars($sec['manifesto']['image_url'] ?? 'https://images.unsplash.com/photo-1600891964092-4316c288032e?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80') ?>" alt="Dressage" style="width: 100%; border-radius: var(--organic-radius); box-shadow: 0 20px 50px rgba(10, 35, 66, 0.15);">
        </div>
    </section>

    <section class="services-section" id="prestations" style="background: <?= htmlspecialchars($sec['services']['bg_color'] ?? '#FAF6F0') ?>;">
        <div class="section-intro">
            <h2 style="font-size: <?= htmlspecialchars($sec['services']['title_size'] ?? '4rem') ?>; color: <?= htmlspecialchars($sec['services']['title_color'] ?? '#0A2342') ?>;">
                <?= $sec['services']['title'] ?? "Écosystèmes de <span class='serif-italic'>Prestations</span>" ?>
            </h2>
            <p style="max-width: 600px; margin: 20px auto 0 auto; color: <?= htmlspecialchars($sec['services']['subtitle_color'] ?? '#526073') ?>;">
                <?= htmlspecialchars($sec['services']['subtitle'] ?? "Trois architectures événementielles guidées par le luxe.") ?>
            </p>
        </div>

        <div class="services-grid" style="
            --card-bg: <?= htmlspecialchars($sec['services']['card_bg'] ?? '#FFFFFF') ?>;
            --card-title: <?= htmlspecialchars($sec['services']['card_title_color'] ?? '#0A2342') ?>;
            --card-text: <?= htmlspecialchars($sec['services']['card_text_color'] ?? '#526073') ?>;
        ">
            <div class="service-luxury-card" style="background: var(--card-bg);">
                <div class="card-meta"><?= htmlspecialchars($sec['services']['s1_meta'] ?? 'Format Intimiste') ?></div>
                <h3 style="color: var(--card-title);"><?= htmlspecialchars($sec['services']['s1_title'] ?? 'Dîners de la Vigie') ?></h3>
                <p style="color: var(--card-text);"><?= htmlspecialchars($sec['services']['s1_desc'] ?? '') ?></p>
                <div class="card-price" style="color: var(--card-title);"><?= htmlspecialchars($sec['services']['s1_price'] ?? '') ?></div>
            </div>

            <div class="service-luxury-card card-featured" style="background: var(--card-bg); border-color: <?= htmlspecialchars($sec['services']['featured_border_color'] ?? '#6F9CEB') ?>;">
                <div class="card-meta" style="color: var(--gold-amber);"><?= htmlspecialchars($sec['services']['s2_meta'] ?? 'Prestige Événementiel') ?></div>
                <h3 style="color: var(--card-title);"><?= htmlspecialchars($sec['services']['s2_title'] ?? 'La Scénographie Bleue') ?></h3>
                <p style="color: var(--card-text);"><?= htmlspecialchars($sec['services']['s2_desc'] ?? '') ?></p>
                <div class="card-price" style="color: var(--card-title);"><?= htmlspecialchars($sec['services']['s2_price'] ?? '') ?></div>
            </div>

            <div class="service-luxury-card" style="background: var(--card-bg);">
                <div class="card-meta"><?= htmlspecialchars($sec['services']['s3_meta'] ?? 'Célébrations') ?></div>
                <h3 style="color: var(--card-title);"><?= htmlspecialchars($sec['services']['s3_title'] ?? 'Grands Banquets Créoles') ?></h3>
                <p style="color: var(--card-text);"><?= htmlspecialchars($sec['services']['s3_desc'] ?? '') ?></p>
                <div class="card-price" style="color: var(--card-title);"><?= htmlspecialchars($sec['services']['s3_price'] ?? '') ?></div>
            </div>
        </div>
    </section>

    <section class="gallery-stories" id="creations" style="background: <?= htmlspecialchars($sec['creations']['bg_color'] ?? '#0A2342') ?>;">
        <h2 style="font-size: <?= htmlspecialchars($sec['creations']['main_title_size'] ?? '4rem') ?>; color: <?= htmlspecialchars($sec['creations']['main_title_color'] ?? '#DDA15E') ?>;">
            <?= $sec['creations']['title'] ?? "Créations d'Atelier" ?>
        </h2>
        <div class="stories-grid" style="
            --story-bg: <?= htmlspecialchars($sec['creations']['card_bg'] ?? 'rgba(255,255,255,0.02)') ?>;
            --story-title: <?= htmlspecialchars($sec['creations']['card_title_color'] ?? '#FAF6F0') ?>;
            --story-text: <?= htmlspecialchars($sec['creations']['card_text_color'] ?? 'rgba(251,249,245,0.75)') ?>;
        ">
            <div class="story-card" style="background: var(--story-bg);">
                <img src="<?= htmlspecialchars($sec['creations']['c1_img'] ?? '') ?>" alt="Plat 1" class="story-img">
                <div class="story-details">
                    <h4 style="color: var(--story-title);"><?= htmlspecialchars($sec['creations']['c1_title'] ?? '') ?></h4>
                    <p style="color: var(--story-text);"><?= htmlspecialchars($sec['creations']['c1_desc'] ?? '') ?></p>
                </div>
            </div>

            <div class="story-card" style="background: var(--story-bg);">
                <img src="<?= htmlspecialchars($sec['creations']['c2_img'] ?? '') ?>" alt="Plat 2" class="story-img">
                <div class="story-details">
                    <h4 style="color: var(--story-title);"><?= htmlspecialchars($sec['creations']['c2_title'] ?? '') ?></h4>
                    <p style="color: var(--story-text);"><?= htmlspecialchars($sec['creations']['c2_desc'] ?? '') ?></p>
                </div>
            </div>
        </div>
    </section>

    <section class="reviews-section" style="background: <?= htmlspecialchars($sec['reviews']['bg_color'] ?? '#6F9CEB') ?>;">
        <div class="reviews-container">
            <p class="review-text" style="font-size: <?= htmlspecialchars($sec['reviews']['text_size'] ?? '2.2rem') ?>; color: <?= htmlspecialchars($sec['reviews']['text_color'] ?? '#0A2342') ?>;">
                <?= htmlspecialchars($sec['reviews']['text'] ?? '') ?>
            </p>
            <div class="review-author" style="color: <?= htmlspecialchars($sec['reviews']['author_color'] ?? '#FAF6F0') ?>;">
                <?= htmlspecialchars($sec['reviews']['author'] ?? '') ?>
            </div>
        </div>
    </section>

    <section style="background: <?= htmlspecialchars($sec['devis']['bg_color'] ?? '#FAF6F0') ?>;" id="devis">
        <div class="devis-box" style="background: <?= htmlspecialchars($sec['devis']['box_bg'] ?? '#071526') ?>;">
            <div>
                <div class="madras-line-accent"></div>
                <h2 style="color: <?= htmlspecialchars($sec['devis']['title_color'] ?? '#6F9CEB') ?>; font-size: <?= htmlspecialchars($sec['devis']['title_size'] ?? '3rem') ?>; margin-bottom: 20px; margin-top: 15px;">
                    <?= $sec['devis']['title'] ?? 'Dessinons<br>votre escale.' ?>
                </h2>
                <p style="color: <?= htmlspecialchars($sec['devis']['text_color'] ?? 'rgba(251,249,245,0.8)') ?>; font-weight: 300;">
                    <?= htmlspecialchars($sec['devis']['desc'] ?? '') ?>
                </p>
            </div>
            <div class="devis-form">
                <form action="#" method="POST" onsubmit="event.preventDefault(); alert('Transmis.');">
                    <input type="text" placeholder="Votre nom d'hôte ou maison" required>
                    <input type="email" placeholder="Adresse email de contact" required>
                    <textarea rows="4" placeholder="Nature de l'événement..." required></textarea>
                    <button type="submit" class="btn-devis" style="width: 100%; border: none; cursor: pointer;">Soumettre au Bureau Créatif ↗</button>
                </form>
            </div>
        </div>
    </section>

    <script>
        function toggleMenu() {
            document.querySelector('.side-menu').classList.toggle('active');
            document.querySelector('.menu-overlay').classList.toggle('active');
        }

        window.addEventListener('scroll', () => {
            const nav = document.querySelector('nav');
            // Get the height of the hero section or viewport
            const heroHeight = window.innerHeight * 0.9;
            if (window.scrollY > heroHeight) {
                nav.classList.add('scrolled');
            } else {
                nav.classList.remove('scrolled');
            }
        });
    </script>
</body>
</html>