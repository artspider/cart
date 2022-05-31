<?php

  class Pages extends Controller {
    public function __construct() {
      //echo 'Modelo Pages Cargado...';
      $this->alumnoModel = $this->model('Alumno');
    }

    public function index() {
      $data = [
        'title' => 'Welcome',
        'alumnos' =>  $this->alumnoModel->filter('paterno','Campos')
      ];
      $this->view('pages/index', $data);
    }
  }