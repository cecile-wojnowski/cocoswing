<?php
class Blog extends Controller{

  public function index(){
    $this->render("website/blog");
  }

  public function getArticle($id){
    // charger le modèle

    // utiliser getOne du modèle pour créer un tableau $article

    //envoyer le tableau $article à la vue
    $this->render("website/article");
  }

  public function createArticle(){
    $this->render("admin/gestion-blog");
  }

  public function updateArticle(){
    $this->render("admin/gestion-blog");
  }

  public function deleteArticle(){
    $this->render("admin/gestion-blog");
  }

  public function createCategory(){
    $this->render("admin/gestion-blog");
  }

  public function updateCategory(){
    $this->render("admin/gestion-blog");
  }

  public function deleteCategory(){
    $this->render("admin/gestion-blog");
  }
} ?>
