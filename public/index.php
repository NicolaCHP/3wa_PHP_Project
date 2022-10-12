<?php

use Symfony\Component\HttpFoundation\Request;

require_once __DIR__.'/../vendor/autoload.php';

$request = Request::createFromGlobals();

$path = $request->getPathInfo();
$method = $request->getMethod();

// Fonctions et classes utiles
// Au choix, faire avec les fonctions php ou les classes Symfony
// php :
    // header : https://www.php.net/manual/fr/function.header.php
// symfony : https://symfony.com/doc/current/components/http_foundation.html
    // Request
    // Response
    // JsonResponse

// questions :
    // requpete vs réponse http
    // code http ?
    // status http ?
    // headers
        // types mimes
// liens :
    // Général : https://developer.mozilla.org/fr/docs/Web/HTTP/Overview
    // Headers : https://developer.mozilla.org/fr/docs/Web/HTTP/Headers
    // Méthodes http : https://developer.mozilla.org/fr/docs/Web/HTTP/Methods

// créer une fonction chargée de rendre le html
// rappel : never trust user input
$content = '';
// accepte uniquement les requêtes 'GET'
if ($path === '/home') {
    // doit être mis dans une fonction réutilisable
    ob_start();
        require_once __DIR__.'/../templates/home.html';
    $content = ob_get_clean();

    // par défaut
    header('Content-Type: text/html');
}

// définir une route about
// accepte uniquement les requête GET

// définir une route blog
// accepte uniquement les requêtes GET et POST

// définir une route blog/post
// accepte uniquement les requêtes GET
// récupére un paramètre id et l'affiche dans la page blog_show.html

// définir une route api/token
// accepte uniquement les requêtes GET
// renvoie un token sous le format JSON
// vérifier les entêtes

else {
    // créer une page html d'erreur
    // $html = require la page error.html
    // renvoyer un code 404
}

echo $content;