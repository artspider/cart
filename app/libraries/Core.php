<?php

  class Core {
    protected $currentController = 'Pages';
    protected $currentMethod = 'index';
    protected $params = [];

    public function __construct() {
      
      $URL = $this->getUrl();
      //print_r($URL);

      if(isset($URL[0])) {
        $controller = ucwords($URL[0]);
        if( file_exists('../app/controllers/' . $controller . '.php') ) {
          $this->currentController = $controller;
          unset($URL[0]);
        }
      }

      require_once '../app/controllers/' . $this->currentController . '.php';

      $this->currentController = new $this->currentController;

      if ( isset($URL[1]) ) {
        $method = $URL[1];
        if( method_exists($this->currentController, $method) ) {
          $this->currentMethod = $method;
          unset($URL[1]);
        }
      }

      $this->params = $URL ? array_values($URL) : [];

      call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
    }

    public function getUrl() {
      
      if( isset( $_GET['url'] ) ) {
        $URL = rtrim($_GET['url'], '/');
        $URL = filter_var($URL, FILTER_SANITIZE_URL);
        $URL = explode('/', $URL);

        return $URL;
      }
    }
  }