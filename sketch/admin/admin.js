document.addEventListener('DOMContentLoaded', () => {
    // Navigation par onglets structurels
    const links = document.querySelectorAll('.sidebar nav a');
    const sections = document.querySelectorAll('.admin-section');

    links.forEach(link => {
        link.addEventListener('click', (e) => {
            e.preventDefault();
            links.forEach(l => l.classList.remove('active'));
            sections.forEach(s => s.classList.remove('active'));
            link.classList.add('active');
            document.querySelector(link.getAttribute('href')).classList.add('active');
        });
    });

    // Écouteurs dynamiques pour les palettes HTML5 avancées
    document.querySelectorAll('input[type="color"]').forEach(picker => {
        picker.addEventListener('input', (e) => {
            e.target.nextElementSibling.value = e.target.value.toUpperCase();
        });
    });

    // Système de gestion des états imbriqués et de l'historique d'annulation
    let history = [JSON.parse(JSON.stringify(window.initialConfig))];
    const form = document.getElementById('admin-form');
    const btnUndo = document.getElementById('btn-undo');

    form.addEventListener('change', () => {
        const currentState = serializeNestedForm();
        history.push(currentState);
        if (history.length > 30) history.shift(); // Mémoire tampon de 30 actions
        btnUndo.disabled = false;
    });

    // Fonction de conversion magique : Chaîne plate (ex: "sections.hero.title") -> Objet JSON profond
    function serializeNestedForm() {
        let state = {};
        const formData = new FormData(form);

        for (let [key, value] of formData.entries()) {
            const parts = key.split('.');
            let current = state;

            for (let i = 0; i < parts.length; i++) {
                const part = parts[i];
                if (i === parts.length - 1) {
                    current[part] = value;
                } else {
                    current[part] = current[part] || {};
                    current = current[part];
                }
            }
        }
        return state;
    }

    // Gestion native de l'annulation (Undo)
    btnUndo.addEventListener('click', () => {
        if (history.length > 1) {
            history.pop();
            const previousState = history[history.length - 1];
            applyStateToInputs(previousState);
            if (history.length === 1) btnUndo.disabled = true;
        }
    });

    function applyStateToInputs(state) {
        // Parcours récursif à plat de l'arbre objet pour restaurer les entrées du formulaire
        const flattenAndApply = (obj, prefix = '') => {
            for (const key in obj) {
                const path = prefix ? `${prefix}.${key}` : key;
                if (typeof obj[key] === 'object' && obj[key] !== null) {
                    flattenAndApply(obj[key], path);
                } else {
                    const input = document.querySelector(`[name="${path}"]`);
                    if (input) {
                        input.value = obj[key];
                        if (input.type === 'color') {
                            input.nextElementSibling.value = obj[key].toUpperCase();
                        }
                    }
                }
            }
        };
        flattenAndApply(state);
    }

    // Échange réseau asynchrone (Fetch AJAX) avec save.php
    document.getElementById('btn-save').addEventListener('click', () => {
        const structuralData = serializeNestedForm();

        fetch('save.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify(structuralData)
        })
            .then(res => res.json())
            .then(output => {
                if (output.success) {
                    const toast = document.getElementById('toast');
                    toast.classList.add('show');
                    setTimeout(() => toast.classList.remove('show'), 3500);
                } else {
                    alert(output.message);
                }
            })
            .catch(() => alert("Défaillance d'écriture réseau vers save.php"));
    });
});