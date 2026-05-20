<?php
$config = [];
if (file_exists('../config.json')) {
    $config = json_decode(file_get_contents('../config.json'), true);
}
$global = $config['global'] ?? [];
$sec = $config['sections'] ?? [];
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maison Solstice | Back Office Global</title>
    <link rel="stylesheet" href="admin.css">
</head>
<body>

    <aside class="sidebar">
        <div class="logo">Solstice<span>Engine</span></div>
        <nav>
            <a href="#tab-global" class="active">⚙️ Configuration Globale</a>
            <a href="#tab-hero">🌅 Section En-tête (Hero)</a>
            <a href="#tab-manifesto">📖 Section Le Manifeste</a>
            <a href="#tab-services">🛎️ Section Prestations</a>
            <a href="#tab-creations">🧑‍🍳 Section Créations</a>
            <a href="#tab-reviews">💬 Section Témoignages</a>
            <a href="#tab-devis">✉️ Section Formulaire Devis</a>
        </nav>
    </aside>

    <main class="content">
        <header class="topbar">
            <h1>Panneau d'Administration Intégral</h1>
            <div class="actions">
                <button id="btn-undo" class="btn-secondary" disabled>↩️ Annuler l'action</button>
                <button id="btn-save" class="btn-primary">💾 Sauvegarder l'état</button>
            </div>
        </header>

        <form id="admin-form">
            
            <section id="tab-global" class="admin-section active">
                <h2>Réglages Généraux de Structure</h2>
                <div class="grid">
                    <div class="input-group">
                        <label>Taille de Police Globale</label>
                        <input type="text" name="global.font_body_size" value="<?= htmlspecialchars($global['font_body_size'] ?? '16px') ?>">
                    </div>
                    <div class="input-group">
                        <label>Hauteur de Ligne (Interlignage)</label>
                        <input type="text" name="global.base_line_height" value="<?= htmlspecialchars($global['base_line_height'] ?? '1.7') ?>">
                    </div>
                </div>
            </section>

            <section id="tab-hero" class="admin-section">
                <h2>Édition : En-tête de page (Hero)</h2>
                <div class="grid">
                    <div class="input-group"><label>Couleur du Titre</label><div class="color-picker-wrapper"><input type="color" name="sections.hero.title_color" value="<?= $sec['hero']['title_color'] ?? '#FAF6F0' ?>"><input type="text" value="<?= $sec['hero']['title_color'] ?? '#FAF6F0' ?>" readonly></div></div>
                    <div class="input-group"><label>Taille du Titre</label><input type="text" name="sections.hero.title_size" value="<?= $sec['hero']['title_size'] ?? '5rem' ?>"></div>
                    <div class="input-group"><label>Couleur du Texte</label><div class="color-picker-wrapper"><input type="color" name="sections.hero.text_color" value="<?= $sec['hero']['text_color'] ?? 'rgba(251, 249, 245, 0.9)' ?>"><input type="text" value="<?= $sec['hero']['text_color'] ?? 'rgba(251, 249, 245, 0.9)' ?>" readonly></div></div>
                    <div class="input-group"><label>Taille du Texte</label><input type="text" name="sections.hero.text_size" value="<?= $sec['hero']['text_size'] ?? '1.2rem' ?>"></div>
                    <div class="input-group"><label>Fond du Bouton CTA</label><div class="color-picker-wrapper"><input type="color" name="sections.hero.btn_bg" value="<?= $sec['hero']['btn_bg'] ?? '#6F9CEB' ?>"><input type="text" value="<?= $sec['hero']['btn_bg'] ?? '#6F9CEB' ?>" readonly></div></div>
                    <div class="input-group"><label>Texte du Bouton CTA</label><div class="color-picker-wrapper"><input type="color" name="sections.hero.btn_text" value="<?= $sec['hero']['btn_text'] ?? '#0A2342' ?>"><input type="text" value="<?= $sec['hero']['btn_text'] ?? '#0A2342' ?>" readonly></div></div>
                    <div class="input-group full-width"><label>URL Image d'arrière-plan</label><input type="url" name="sections.hero.bg_image" value="<?= htmlspecialchars($sec['hero']['bg_image'] ?? '') ?>"></div>
                    <div class="input-group full-width"><label>Titre Principal (HTML supporté)</label><input type="text" name="sections.hero.title" value="<?= htmlspecialchars($sec['hero']['title'] ?? '') ?>"></div>
                    <div class="input-group full-width"><label>Sous-titre explicatif</label><textarea name="sections.hero.subtitle" rows="3"><?= htmlspecialchars($sec['hero']['subtitle'] ?? '') ?></textarea></div>
                    <div class="input-group"><label>Libellé du Bouton</label><input type="text" name="sections.hero.cta_text" value="<?= htmlspecialchars($sec['hero']['cta_text'] ?? '') ?>"></div>
                </div>
            </section>

            <section id="tab-manifesto" class="admin-section">
                <h2>Édition : Le Manifeste</h2>
                <div class="grid">
                    <div class="input-group"><label>Couleur de Fond</label><div class="color-picker-wrapper"><input type="color" name="sections.manifesto.bg_color" value="<?= $sec['manifesto']['bg_color'] ?? '#E1E9F5' ?>"><input type="text" value="<?= $sec['manifesto']['bg_color'] ?? '#E1E9F5' ?>" readonly></div></div>
                    <div class="input-group"><label>Couleur du Titre</label><div class="color-picker-wrapper"><input type="color" name="sections.manifesto.title_color" value="<?= $sec['manifesto']['title_color'] ?? '#0A2342' ?>"><input type="text" value="<?= $sec['manifesto']['title_color'] ?? '#0A2342' ?>" readonly></div></div>
                    <div class="input-group"><label>Taille du Titre</label><input type="text" name="sections.manifesto.title_size" value="<?= $sec['manifesto']['title_size'] ?? '3.5rem' ?>"></div>
                    <div class="input-group"><label>Couleur des Paragraphes</label><div class="color-picker-wrapper"><input type="color" name="sections.manifesto.text_color" value="<?= $sec['manifesto']['text_color'] ?? '#0A2342' ?>"><input type="text" value="<?= $sec['manifesto']['text_color'] ?? '#0A2342' ?>" readonly></div></div>
                    <div class="input-group"><label>Taille des Paragraphes</label><input type="text" name="sections.manifesto.text_size" value="<?= $sec['manifesto']['text_size'] ?? '1.1rem' ?>"></div>
                    <div class="input-group full-width"><label>URL Image latérale</label><input type="url" name="sections.manifesto.image_url" value="<?= htmlspecialchars($sec['manifesto']['image_url'] ?? '') ?>"></div>
                    <div class="input-group full-width"><label>Titre de la Section (HTML)</label><input type="text" name="sections.manifesto.title" value="<?= htmlspecialchars($sec['manifesto']['title'] ?? '') ?>"></div>
                    <div class="input-group full-width"><label>Paragraphe 1</label><textarea name="sections.manifesto.p1" rows="3"><?= htmlspecialchars($sec['manifesto']['p1'] ?? '') ?></textarea></div>
                    <div class="input-group full-width"><label>Paragraphe 2</label><textarea name="sections.manifesto.p2" rows="3"><?= htmlspecialchars($sec['manifesto']['p2'] ?? '') ?></textarea></div>
                </div>
            </section>

            <section id="tab-services" class="admin-section">
                <h2>Édition : Catalogue des Prestations</h2>
                <div class="grid">
                    <div class="input-group"><label>Fond de Section</label><div class="color-picker-wrapper"><input type="color" name="sections.services.bg_color" value="<?= $sec['services']['bg_color'] ?? '#FAF6F0' ?>"><input type="text" value="<?= $sec['services']['bg_color'] ?? '#FAF6F0' ?>" readonly></div></div>
                    <div class="input-group"><label>Couleur Titre principal</label><div class="color-picker-wrapper"><input type="color" name="sections.services.title_color" value="<?= $sec['services']['title_color'] ?? '#0A2342' ?>"><input type="text" value="<?= $sec['services']['title_color'] ?? '#0A2342' ?>" readonly></div></div>
                    <div class="input-group"><label>Taille Titre principal</label><input type="text" name="sections.services.title_size" value="<?= $sec['services']['title_size'] ?? '4rem' ?>"></div>
                    <div class="input-group"><label>Couleur du Sous-titre intro</label><div class="color-picker-wrapper"><input type="color" name="sections.services.subtitle_color" value="<?= $sec['services']['subtitle_color'] ?? '#526073' ?>"><input type="text" value="<?= $sec['services']['subtitle_color'] ?? '#526073' ?>" readonly></div></div>
                    <div class="input-group"><label>Fond des Cartes</label><div class="color-picker-wrapper"><input type="color" name="sections.services.card_bg" value="<?= $sec['services']['card_bg'] ?? '#FFFFFF' ?>"><input type="text" value="<?= $sec['services']['card_bg'] ?? '#FFFFFF' ?>" readonly></div></div>
                    <div class="input-group"><label>Couleur Titre des Cartes</label><div class="color-picker-wrapper"><input type="color" name="sections.services.card_title_color" value="<?= $sec['services']['card_title_color'] ?? '#0A2342' ?>"><input type="text" value="<?= $sec['services']['card_title_color'] ?? '#0A2342' ?>" readonly></div></div>
                    <div class="input-group"><label>Couleur Descriptif Cartes</label><div class="color-picker-wrapper"><input type="color" name="sections.services.card_text_color" value="<?= $sec['services']['card_text_color'] ?? '#526073' ?>"><input type="text" value="<?= $sec['services']['card_text_color'] ?? '#526073' ?>" readonly></div></div>
                    <div class="input-group"><label>Bordure Carte Vedette</label><div class="color-picker-wrapper"><input type="color" name="sections.services.featured_border_color" value="<?= $sec['services']['featured_border_color'] ?? '#6F9CEB' ?>"><input type="text" value="<?= $sec['services']['featured_border_color'] ?? '#6F9CEB' ?>" readonly></div></div>
                    <div class="input-group full-width"><label>Titre Principal (HTML)</label><input type="text" name="sections.services.title" value="<?= htmlspecialchars($sec['services']['title'] ?? '') ?>"></div>
                    <div class="input-group full-width"><label>Sous-titre Introduction</label><input type="text" name="sections.services.subtitle" value="<?= htmlspecialchars($sec['services']['subtitle'] ?? '') ?>"></div>
                    
                    <h3 class="full-width">Prestation 1</h3>
                    <div class="input-group"><label>Badge</label><input type="text" name="sections.services.s1_meta" value="<?= htmlspecialchars($sec['services']['s1_meta'] ?? '') ?>"></div>
                    <div class="input-group"><label>Titre</label><input type="text" name="sections.services.s1_title" value="<?= htmlspecialchars($sec['services']['s1_title'] ?? '') ?>"></div>
                    <div class="input-group full-width"><label>Description</label><textarea name="sections.services.s1_desc" rows="2"><?= htmlspecialchars($sec['services']['s1_desc'] ?? '') ?></textarea></div>
                    <div class="input-group"><label>Tarification</label><input type="text" name="sections.services.s1_price" value="<?= htmlspecialchars($sec['services']['s1_price'] ?? '') ?>"></div>
                    <div></div>

                    <h3 class="full-width">Prestation 2 (Mise en avant)</h3>
                    <div class="input-group"><label>Badge</label><input type="text" name="sections.services.s2_meta" value="<?= htmlspecialchars($sec['services']['s2_meta'] ?? '') ?>"></div>
                    <div class="input-group"><label>Titre</label><input type="text" name="sections.services.s2_title" value="<?= htmlspecialchars($sec['services']['s2_title'] ?? '') ?>"></div>
                    <div class="input-group full-width"><label>Description</label><textarea name="sections.services.s2_desc" rows="2"><?= htmlspecialchars($sec['services']['s2_desc'] ?? '') ?></textarea></div>
                    <div class="input-group"><label>Tarification</label><input type="text" name="sections.services.s2_price" value="<?= htmlspecialchars($sec['services']['s2_price'] ?? '') ?>"></div>
                    <div></div>

                    <h3 class="full-width">Prestation 3</h3>
                    <div class="input-group"><label>Badge</label><input type="text" name="sections.services.s3_meta" value="<?= htmlspecialchars($sec['services']['s3_meta'] ?? '') ?>"></div>
                    <div class="input-group"><label>Titre</label><input type="text" name="sections.services.s3_title" value="<?= htmlspecialchars($sec['services']['s3_title'] ?? '') ?>"></div>
                    <div class="input-group full-width"><label>Description</label><textarea name="sections.services.s3_desc" rows="2"><?= htmlspecialchars($sec['services']['s3_desc'] ?? '') ?></textarea></div>
                    <div class="input-group"><label>Tarification</label><input type="text" name="sections.services.s3_price" value="<?= htmlspecialchars($sec['services']['s3_price'] ?? '') ?>"></div>
                </div>
            </section>

            <section id="tab-creations" class="admin-section">
                <h2>Édition : Galerie de Créations</h2>
                <div class="grid">
                    <div class="input-group"><label>Fond de Section</label><div class="color-picker-wrapper"><input type="color" name="sections.creations.bg_color" value="<?= $sec['creations']['bg_color'] ?? '#0A2342' ?>"><input type="text" value="<?= $sec['creations']['bg_color'] ?? '#0A2342' ?>" readonly></div></div>
                    <div class="input-group"><label>Couleur du Titre Principal</label><div class="color-picker-wrapper"><input type="color" name="sections.creations.main_title_color" value="<?= $sec['creations']['main_title_color'] ?? '#DDA15E' ?>"><input type="text" value="<?= $sec['creations']['main_title_color'] ?? '#DDA15E' ?>" readonly></div></div>
                    <div class="input-group"><label>Taille du Titre Principal</label><input type="text" name="sections.creations.main_title_size" value="<?= $sec['creations']['main_title_size'] ?? '4rem' ?>"></div>
                    <div class="input-group"><label>Fond des Blocs Conteneurs</label><div class="color-picker-wrapper"><input type="color" name="sections.creations.card_bg" value="<?= $sec['creations']['card_bg'] ?? 'rgba(255,255,255,0.02)' ?>"><input type="text" value="<?= $sec['creations']['card_bg'] ?? 'rgba(255,255,255,0.02)' ?>" readonly></div></div>
                    <div class="input-group"><label>Couleur des Titres plats</label><div class="color-picker-wrapper"><input type="color" name="sections.creations.card_title_color" value="<?= $sec['creations']['card_title_color'] ?? '#FAF6F0' ?>"><input type="text" value="<?= $sec['creations']['card_title_color'] ?? '#FAF6F0' ?>" readonly></div></div>
                    <div class="input-group"><label>Couleur des Textes de recettes</label><div class="color-picker-wrapper"><input type="color" name="sections.creations.card_text_color" value="<?= $sec['creations']['card_text_color'] ?? 'rgba(251,249,245,0.75)' ?>"><input type="text" value="<?= $sec['creations']['card_text_color'] ?? 'rgba(251,249,245,0.75)' ?>" readonly></div></div>
                    <div class="input-group full-width"><label>Titre Global de la Galerie</label><input type="text" name="sections.creations.title" value="<?= htmlspecialchars($sec['creations']['title'] ?? '') ?>"></div>
                    
                    <h3 class="full-width">Création Culinaire 1</h3>
                    <div class="input-group full-width"><label>URL Image Illustration</label><input type="url" name="sections.creations.c1_img" value="<?= htmlspecialchars($sec['creations']['c1_img'] ?? '') ?>"></div>
                    <div class="input-group"><label>Nom de la Création</label><input type="text" name="sections.creations.c1_title" value="<?= htmlspecialchars($sec['creations']['c1_title'] ?? '') ?>"></div>
                    <div class="input-group full-width"><label>Recette / Composition</label><textarea name="sections.creations.c1_desc" rows="2"><?= htmlspecialchars($sec['creations']['c1_desc'] ?? '') ?></textarea></div>

                    <h3 class="full-width">Création Culinaire 2</h3>
                    <div class="input-group full-width"><label>URL Image Illustration</label><input type="url" name="sections.creations.c2_img" value="<?= htmlspecialchars($sec['creations']['c2_img'] ?? '') ?>"></div>
                    <div class="input-group"><label>Nom de la Création</label><input type="text" name="sections.creations.c2_title" value="<?= htmlspecialchars($sec['creations']['c2_title'] ?? '') ?>"></div>
                    <div class="input-group full-width"><label>Recette / Composition</label><textarea name="sections.creations.c2_desc" rows="2"><?= htmlspecialchars($sec['creations']['c2_desc'] ?? '') ?></textarea></div>
                </div>
            </section>

            <section id="tab-reviews" class="admin-section">
                <h2>Édition : Témoignages & Critiques</h2>
                <div class="grid">
                    <div class="input-group"><label>Fond de Section</label><div class="color-picker-wrapper"><input type="color" name="sections.reviews.bg_color" value="<?= $sec['reviews']['bg_color'] ?? '#6F9CEB' ?>"><input type="text" value="<?= $sec['reviews']['bg_color'] ?? '#6F9CEB' ?>" readonly></div></div>
                    <div class="input-group"><label>Couleur du Commentaire</label><div class="color-picker-wrapper"><input type="color" name="sections.reviews.text_color" value="<?= $sec['reviews']['text_color'] ?? '#0A2342' ?>"><input type="text" value="<?= $sec['reviews']['text_color'] ?? '#0A2342' ?>" readonly></div></div>
                    <div class="input-group"><label>Taille de Citation</label><input type="text" name="sections.reviews.text_size" value="<?= $sec['reviews']['text_size'] ?? '2.2rem' ?>"></div>
                    <div class="input-group"><label>Couleur de Signature</label><div class="color-picker-wrapper"><input type="color" name="sections.reviews.author_color" value="<?= $sec['reviews']['author_color'] ?? '#FAF6F0' ?>"><input type="text" value="<?= $sec['reviews']['author_color'] ?? '#FAF6F0' ?>" readonly></div></div>
                    <div class="input-group full-width"><label>Corps de la Critique</label><textarea name="sections.reviews.text" rows="3"><?= htmlspecialchars($sec['reviews']['text'] ?? '') ?></textarea></div>
                    <div class="input-group full-width"><label>Auteurs et Date</label><input type="text" name="sections.reviews.author" value="<?= htmlspecialchars($sec['reviews']['author'] ?? '') ?>"></div>
                </div>
            </section>

            <section id="tab-devis" class="admin-section">
                <h2>Édition : Boîte de Renseignement (Devis)</h2>
                <div class="grid">
                    <div class="input-group"><label>Fond de Section externe</label><div class="color-picker-wrapper"><input type="color" name="sections.devis.bg_color" value="<?= $sec['devis']['bg_color'] ?? '#FAF6F0' ?>"><input type="text" value="<?= $sec['devis']['bg_color'] ?? '#FAF6F0' ?>" readonly></div></div>
                    <div class="input-group"><label>Fond de l'écrin de formulaire</label><div class="color-picker-wrapper"><input type="color" name="sections.devis.box_bg" value="<?= $sec['devis']['box_bg'] ?? '#071526' ?>"><input type="text" value="<?= $sec['devis']['box_bg'] ?? '#071526' ?>" readonly></div></div>
                    <div class="input-group"><label>Couleur du Titre</label><div class="color-picker-wrapper"><input type="color" name="sections.devis.title_color" value="<?= $sec['devis']['title_color'] ?? '#6F9CEB' ?>"><input type="text" value="<?= $sec['devis']['title_color'] ?? '#6F9CEB' ?>" readonly></div></div>
                    <div class="input-group"><label>Taille du Titre</label><input type="text" name="sections.devis.title_size" value="<?= $sec['devis']['title_size'] ?? '3rem' ?>"></div>
                    <div class="input-group"><label>Couleur des consignes</label><div class="color-picker-wrapper"><input type="color" name="sections.devis.text_color" value="<?= $sec['devis']['text_color'] ?? 'rgba(251,249,245,0.8)' ?>"><input type="text" value="<?= $sec['devis']['text_color'] ?? 'rgba(251,249,245,0.8)' ?>" readonly></div></div>
                    <div class="input-group full-width"><label>Titre d'appel (HTML supporté)</label><input type="text" name="sections.devis.title" value="<?= htmlspecialchars($sec['devis']['title'] ?? '') ?>"></div>
                    <div class="input-group full-width"><label>Consigne d'introduction</label><textarea name="sections.devis.desc" rows="3"><?= htmlspecialchars($sec['devis']['desc'] ?? '') ?></textarea></div>
                </div>
            </section>
        </form>
    </main>

    <div id="toast" class="toast">Structure et intégrité des variables synchronisées !</div>

    <script>window.initialConfig = <?= json_encode($config) ?>;</script>
    <script src="admin.js"></script>
</body>
</html>