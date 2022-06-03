<?php

class Users extends Controller {

  public function __construct() {
    $this->userModel = $this->model('User');
  }


  public function index() {
    die('Estoy en el user controller');
  }

  public function signup() {
    // Revisamos que el métdo sea POST, solo por ese método recibiremos datos 
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
      // Procesamos el formulario
      $_POST = filter_input_array(INPUT_POST, FILTER_UNSAFE_RAW);
      $data = [ 
        'name' => trim( $_POST['name'] ),
        'lastname' => trim( $_POST['lastname'] ),
        'email' => trim( $_POST['email'] ),
        'password' => trim( $_POST['password'] ),
        'confirm_password' => trim( $_POST['confirm-password'] ),
        'errors' => false,
        'name_err' => '',
        'lastname_err' => '',
        'email_err' => '',
        'password_err' => '',
        'confirm_password_err' => ''
      ];

      if($this->userModel->filter('email', $data['email'])) {
        $data['email_err'] = 'Correo ya esta registrado';
        $data['errors'] = true;
      }

      if ($data['password'] != $data['confirm_password']) {
        $data['confirm_password_err'] = 'Contraseñas no coinciden';
        $data['errors'] = true;
      }

      if ($data['errors']) {
        $this->view('users/signup', $data);
      }else{
        // formData sin errores, listo para guardarse en la tabla
        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

        // Tratamos de guardar el registro en la tabla
        if ($this->userModel->create($data)) {
          redirect('users/login');
        } else {
          die('algo salio mal...');
        }
      }
      
    }else {
      // Se deberá cargar el formulario primero
      // Los datos que se leerán del formulario
      $data = [
        'name' => '',
        'lastname' => '',
        'email' => '',
        'password' => '',
        'confirm_password' => '',
        'errors' => false,
        'name_err' => '',
        'lastname_err' => '',
        'email_err' => '',
        'password_err' => '',
        'confirm_password_err' => ''
      ];

      // Se carga la vista
      $this->view('users/signup', $data);
    }
  }

  public function login() {
    echo 'login...';
  }

  public function clearData() {}
}