<?php
class Website extends Controller{

  public function index(){
    // index.php
    $this->render("website/index", [], $use_default = false);
  }

  public function courses(){
    // Affiche la page des cours

    // courses.php
    $this->render("website/courses", [], $use_default = false);

  }

  public function regularCourses(){
    // regular_courses.php

  }

  public function events(){
    // Affiche la page des cours

    // events.php
  }
  public function teachers(){
    // teacher.php

  }

  public function hireUs(){
    // page de prestations

  }
  public function blog(){
    // blog.php

  }
  public function article(){
    // article.php

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
