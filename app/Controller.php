<?php
abstract class Controller{

  public function render(string $fichier, array $data = [], $use_default = true){
    extract($data);

    if($use_default) {
      // On démarre le buffer de sortie
      ob_start();

      // On génère la vue
      require_once(ROOT.'views/'.$fichier.'.php');

      // On stocke le contenu dans $content
      $content = ob_get_clean();

      // On fabrique le "template"
      require_once(ROOT.'views/default.php');

    } else {
      require_once(ROOT.'views/'.$fichier.'.php');
    }
}

  public function loadModel(string $model){
      require_once(ROOT.'models/'.$model.'.php');
      // On crée une instance de ce modèle. Ainsi "Article" sera accessible par $this->Article
      $this->$model = new $model();
  }
}
