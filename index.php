<?php
session_start();
//var_dump($_SERVER['SCRIPT_FILENAME']);
//var_dump(str_replace('index.php','',$_SERVER['SCRIPT_FILENAME']));

// ROOT contient C:/wamp64/www/cocoswing/
define('ROOT', str_replace('index.php','',$_SERVER['SCRIPT_FILENAME']));

// On intègre les classes abstraites Model & Controller
require_once(ROOT.'app/Model.php');
require_once(ROOT.'app/Controller.php');

// On sépare les paramètres et on les met dans le tableau $params
$params = explode('/', $_GET['p']);
//var_dump($_GET['p']);
//var_dump($params);

// Si au moins 1 paramètre existe
if($params[0] != ""){
    // On sauvegarde le 1er paramètre dans $controller en mettant sa 1ère lettre en majuscule
    $controller = ucfirst($params[0]);

    // On sauvegarde le 2ème paramètre dans $action si il existe, sinon index
    $action = isset($params[1]) ? $params[1] : 'index';

    // On appelle le contrôleur
    require_once(ROOT.'controllers/'.$controller.'.php');

    // echo ROOT.'controllers/'.$controller.'.php';
    // var_dump($action);
    // On instancie le contrôleur
    $controller = new $controller();

    if(method_exists($controller, $action)){

        unset($params[0]);
        unset($params[1]);
        call_user_func_array([$controller,$action], $params);
        // On appelle la méthode
        //$controller->$action();
    }else{
        // On envoie le code réponse 404
        http_response_code(404);
        echo "La page recherchée n'existe pas";
    }

  }else{
    // Ici aucun paramètre n'est défini
    // On appelle le contrôleur par défaut
    require_once(ROOT.'controllers/Website.php');

    // On instancie le contrôleur
    $controller = new Website();

    // On appelle la méthode index
    $controller->index();
  }
