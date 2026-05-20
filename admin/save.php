<?php
// admin/save.php
header('Content-Type: application/json');

// Récupérer le JSON envoyé par le panel
$input = file_get_contents('php://input');
$data = json_decode($input, true);

if ($data) {
    // Sauvegarder dans le fichier config.json à la racine
    if (file_put_contents('../config.json', json_encode($data, JSON_PRETTY_PRINT))) {
        echo json_encode(['success' => true, 'message' => 'Modifications enregistrées avec succès.']);
    } else {
        http_response_code(500);
        echo json_encode(['success' => false, 'message' => 'Erreur d\'écriture du fichier. Vérifiez les permissions.']);
    }
} else {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'Données invalides.']);
}