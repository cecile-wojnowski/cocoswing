<?php
class Website extends Controller{

  public function index(){
    // index.php
    $this->render("website/index", [], $use_default = false);
  }

  public function cours(){
    // Affiche la page des cours

    // courses.php
    $this->render("website/cours",[
      "titlePage" => "Cours & stages"
    ]);
  }

  public function coursReguliers(){
    $this->loadModel("Course");
    $course = $this->Course->recupererCours();

    $this->render("website/cours-reguliers",[
      "titlePage" => "Cours réguliers",
      "course" => $course
    ]);

  }

  public function events(){
    // Affiche la page des cours

    // events.php
    $this->render("website/events",[
      "titlePage" => "Evènements"
    ]);
  }
  public function quiSommesNous(){
    // teacher.php
    $this->render("website/qui-sommes-nous",[
      "titlePage" => "Qui sommes-nous ?"
    ]);
  }

  public function prestations(){
    // page de prestations
    $this->render("website/prestations",[
      "titlePage" => "Prestations"
    ]);
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
