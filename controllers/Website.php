<?php
class Website extends Controller{

  public function index(){
    // index.php
    $this->render("website/index", [], $use_default = false);
  }

  public function cours(){
    // Affiche la page des cours

    // courses.php
    $this->render("website/cours");

  }

  public function coursReguliers(){
    // regular_courses.php
    $this->render("website/cours-reguliers");

  }

  public function events(){
    // Affiche la page des cours

    // events.php
    $this->render("website/events");
  }
  public function quiSommesNous(){
    // teacher.php
    $this->render("website/qui-sommes-nous");
  }

  public function prestations(){
    // page de prestations
    $this->render("website/prestations");
  }
  public function blog(){
    // blog.php
    $this->render("website/blog");
  }
  public function article(){
    // article.php
    $this->render("website/article");
  }

  public function popUpSignUp(){
    // pop up proposant de s'inscrire

    // index.php
  }
  public function newsletter(){
    // index.php
  }
  public function formContact(){
    // Se trouve sur la page de prestations
    // hire_us.php
  }
} ?>
