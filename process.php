<?php
include 'database.php';
include 'scraper.php';

$db = new Database();

function reponseIA($question) {
    global $db;

    // Vérifier si la réponse est déjà enregistrée dans la base de données
    $reponse = $db->getResponse($question);

    if ($reponse) {
        return $reponse;
    }

    // Si aucune réponse n'est trouvée, faire une recherche sur le web
    $reponseWeb = searchWeb($question);

    // Enregistrer la nouvelle information pour s'améliorer
    if ($reponseWeb) {
        $db->addResponse($question, $reponseWeb);
    }

    return $reponseWeb;
}
?>
function reponseIA($question) {
    global $db;

    $reponse = $db->getResponse($question);

    if ($reponse) {
        return $reponse;
    }

    // Si aucune réponse n'est trouvée, faire une recherche sur le web
    $reponseWeb = searchWeb($question);

    if ($reponseWeb) {
        $db->addResponse($question, $reponseWeb);
    }

    return $reponseWeb;
}
