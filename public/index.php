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


///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Questions :
    // requete vs réponse http
    /*  Lors d'un transfert de données d'un protocole HTTP, l'utilisateurs effectue une reqûete, cette requète suivre d'une réponse envoyé par le serveur. */
    // code http ?
    /* Numéros de 3 chiffres déterminant si la requête à réussit ou non.*/
    // status http ?
    /*
        1XX : réponses informatives.
        2XX : réponses de succès.
        3XX : redirections.
        4XX : réponses d'erreur côté client.
        5XX : réponses d'erreur côté serveur.
    */
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    // headers
        // types mime
// liens :
    // Général : https://developer.mozilla.org/fr/docs/Web/HTTP/Overview
    // Headers : https://developer.mozilla.org/fr/docs/Web/HTTP/Headers
    // Méthodes http : https://developer.mozilla.org/fr/docs/Web/HTTP/Methods

// créer une fonction chargée de rendre le html
function render(string $name):string{
    ob_start();
    require_once __DIR__."/../templates/${name}";
    return ob_get_clean();
}

// rappel : never trust user input
$content = '';
// accepte uniquement les requêtes 'GET'
if ($path === '/home' && $method === 'GET') {
    // doit être mis dans une fonction réutilisable
    ob_start();
    require_once __DIR__.'/../templates/home.html';
    $content = ob_get_clean();

    // par défaut
    header('Content-Type: text/html');
}

// définir une route about
// accepte uniquement les requête GET

elseif ($path === '/about' && $method === 'GET') {
    // doit être mis dans une fonction réutilisable
    ob_start();
    require_once __DIR__.'/../templates/about.html';
    $content = ob_get_clean();
    // par défaut
    header('Content-Type: text/html');
}

// définir une route blog
// accepte uniquement les requêtes GET et POST
elseif ($path === '/blog' && ($method === 'GET' || $method === 'POST')) {
    // doit être mis dans une fonction réutilisable
    ob_start();
    require_once __DIR__.'/../templates/blog.html';
    $content = ob_get_clean();
    // par défaut
    header('Content-Type: text/html');
}
// définir une route blog/post
// accepte uniquement les requêtes GET
// récupére un paramètre id et l'affiche dans la page blog_show.html
elseif ($path === '/blog/post' && $method === 'GET') {
    // doit être mis dans une fonction réutilisable
    ob_start();
    require_once __DIR__.'/../templates/blog_post.html';
    $content = ob_get_clean();
    // par défaut
    header('Content-Type: text/html');
}
// définir une route api/token
// accepte uniquement les requêtes GET
// renvoie un token sous le format JSON
// vérifier les entêtes
elseif ($path === '/api/token' && $method === 'GET') {
    // doit être mis dans une fonction réutilisable
    $token = ["token"=>"mon token JSON"];
    $content = json_encode($token);
    header('Content-Type: application/json; charset=utf-8');

}
else {
    // créer une page html d'erreur
    // $html = require la page error.html
    // renvoyer un code 404
    ob_start();
    require_once __DIR__.'/../templates/error.html';
    $content = ob_get_clean();
    header('HTTP/1.0 404 Not Found');
}

echo $content;