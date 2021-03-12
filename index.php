<?php
session_start();

define('ROOT', str_replace('index.php','',$_SERVER['SCRIPT_FILENAME'])); // ROOT contient C:/wamp64/www/cocoswing/
// Définit une constante contenant http://localhost/cocoswing
define('URL', $_SERVER["REQUEST_SCHEME"]."://".$_SERVER["SERVER_NAME"].str_replace('index.php','',$_SERVER['PHP_SELF']));

require_once(ROOT.'app/Model.php');
require_once(ROOT.'app/Controller.php');

$params = explode('/', $_GET['p']); // On sépare les paramètres et on les met dans le tableau $params
if($params[0] != ""){ // Si au moins 1 paramètre existe
    $controller = ucfirst($params[0]); // On sauvegarde le 1er paramètre dans $controller en mettant sa 1ère lettre en majuscule
    // On sauvegarde le 2ème paramètre dans $action si il existe, sinon index
    $action = isset($params[1]) ? $params[1] : 'index';
    require_once(ROOT.'controllers/'.$controller.'.php');
    $controller = new $controller();

    if(method_exists($controller, $action)){
        unset($params[0]);
        unset($params[1]);
        call_user_func_array([$controller,$action], $params);
    }else{
        // On envoie le code réponse 404
        http_response_code(404);
        header('Location:'.URL.'website');
    }
  }else{
    // Ici aucun paramètre n'est défini. On appelle le contrôleur par défaut
    require_once(ROOT.'controllers/Website.php');
    $controller = new Website();
    $controller->index();
  }
