<?php

  class Pages extends Controller {
    public function __construct() {
      //echo 'Modelo Pages Cargado...';
    }

    public function index() {
      $data = [
        'title' => 'Welcome',
      ];
      $this->view('pages/index', $data);
    }
  }