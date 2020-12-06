<?php
define('ROOT', str_replace('index.php','',$_SERVER['SCRIPT_FILENAME']));

require_once(ROOT.'app/Model.php');
require_once(ROOT.'app/Controller.php');

// On sépare les paramètres et on les met dans le tableau $params
$params = explode('/', $_GET['p']);

// Si au moins 1 paramètre existe
if($params[0] != ""){
    // On sauvegarde le 1er paramètre dans $controller en mettant sa 1ère lettre en majuscule
    $controller = ucfirst($params[0]);

    // On sauvegarde le 2ème paramètre dans $action si il existe, sinon index
    $action = isset($params[1]) ? $params[1] : 'index';

?>
    <main id="main_index">
      <div class="container">
<?php
    // On appelle le contrôleur
    require_once(ROOT.'controllers/'.$controller.'.php');


    // On instancie le contrôleur
    $controller = new $controller();

    if(method_exists($controller, $action)){
        // On appelle la méthode
        $controller->$action();
    }else{
        // On envoie le code réponse 404
        http_response_code(404);
        echo "La page recherchée n'existe pas";
    }

  }else{
    // Ici aucun paramètre n'est défini
    // On appelle le contrôleur par défaut
    require_once(ROOT.'controllers/Main.php');

    // On instancie le contrôleur
    $controller = new Main();

    // On appelle la méthode index
    $controller->index();
  }
?>


      <section class="list_buttons_index">
        <button type="button" name="button_pages" class="button_pages"> Cours </button>
        <button type="button" name="button_pages" class="button_pages"> Evènements </button>
        <button type="button" name="button_pages" class="button_pages"> Animations </button>
      </section>
    </div>
    </main>

      <?php include("includes/footer.php"); ?>
  </body>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script src="js/animate.js" charset="utf-8"></script>
</html>