<?php

function searchWeb($query) {
    $url = "https://www.google.com/search?q=" . urlencode($query);
    
    // Utilisation de file_get_contents pour récupérer la page HTML
    $html = file_get_contents($url);
    
    if ($html === false) {
        return "Désolé, je ne peux pas effectuer la recherche.";
    }

    // Charger la page HTML dans un DOMDocument pour analyser
    $dom = new DOMDocument();
    @$dom->loadHTML($html);
    
    // Utilisation de DOMXPath pour rechercher des éléments spécifiques
    $xpath = new DOMXPath($dom);
    
    // Rechercher les liens de résultats (par exemple, les extraits en haut de page)
    $links = $xpath->query("//h3/a");
    
    // Vérifier si des résultats sont trouvés
    if ($links->length > 0) {
        // Extraire le lien du premier résultat
        $firstResult = $links->item(0)->nodeValue;
        return $firstResult;
    }

    return "Désolé, je n'ai pas pu trouver une réponse sur le web.";
}

?>
function searchWeb($query) {
    $url = "https://www.google.com/search?q=" . urlencode($query);
    
    $html = file_get_contents($url);
    
    if ($html === false) {
        return "Désolé, je ne peux pas effectuer la recherche.";
    }

    $dom = new DOMDocument();
    @$dom->loadHTML($html);
    
    $xpath = new DOMXPath($dom);
    
    $links = $xpath->query("//h3/a");
    
    if ($links->length > 0) {
        $firstResult = $links->item(0)->nodeValue;
        return "Premier résultat : " . $firstResult;
    }

    return "Aucun résultat trouvé.";
}
