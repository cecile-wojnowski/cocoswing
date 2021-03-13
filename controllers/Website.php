<?php
class Website extends Controller{

  public function index(){
    $this->loadModel("Facebook");
    $events = $this->Facebook->getEvents();
    //$user_token =$this->Facebook->create_user_token();

    $this->render("website/index", [
      "events" => $events
    ], $use_default = false);
  }

  public function cours(){
    $this->render("website/cours",[
      "titlePage" => "Cours & stages",
      "title" => "Cours & stages"
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
    $this->loadModel("Facebook");
    $events = $this->Facebook->getEvents();

    $this->render("website/events",[
      "titlePage" => "Evènements",
      "title" => "Nos évènements",
      "events" => $events
    ]);
  }

  public function quiSommesNous(){
    $this->render("website/qui-sommes-nous",[
      "titlePage" => "Qui sommes-nous ?",
      "title" => "L'association"
    ]);
  }

  public function prestations(){
    $this->render("website/prestations",[
      "titlePage" => "Prestations",
      "title" => "Prestations"
    ]);
  }

  public function stages(){
    $this->loadModel("Course");
    $stages = $this->Course->afficherStages();

    $this->render("website/stages",[
      "titlePage" => "Stages",
      "title" => "Stages",
      "stages" => $stages
    ]);
  }

  public function joinTraineeship(){
    $this->loadModel("Course");
    $stages = $this->Course->rejoindreStage();
    header('Location:stages');
  }

  public function coursParticuliers(){
    $this->render("website/cours-particuliers",[
      "titlePage" => "Cours particuliers",
      "title" => "Cours particuliers"
    ]);
  }

  public function contact(){
    $this->render("website/contact",[
      "titlePage" => "Nous contacter",
      "title" => "Nous contacter"
    ]);
  }

  public function formContact(){
    if(!empty($_POST)){
      $this->loadModel('Admin');
      $this->Admin->insererMessage($_POST);
      header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
  }
} ?>
