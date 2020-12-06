<?php
class Website extends Controller{

  public function index(){
    // index.php
    $this->render("website/index", [], $use_default = false);
  }

  public function courses(){
    // Affiche la page des cours

    // courses.php
    $this->render("website/courses");

  }

  public function regularCourses(){
    // regular_courses.php
    $this->render("website/regular_courses");

  }

  public function events(){
    // Affiche la page des cours

    // events.php
    $this->render("website/events");
  }
  public function teachers(){
    // teacher.php
    $this->render("website/teachers");
  }

  public function hireUs(){
    // page de prestations
    $this->render("website/hire_us", [], $use_default = false);
  }
  public function blog(){
    // blog.php
    $this->render("website/blog", [], $use_default = false);
  }
  public function article(){
    // article.php
    $this->render("website/article", [], $use_default = false);
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
