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
        $data_errors = '';
        if(!empty( $data['confirm_password_err'] )) {
          $data_errors = $data['confirm_password_err'];
        }
        
        if(!empty( $data['email_err'] )) {
          $data_errors = $data_errors . ',' . $data['email_err'];
        }

        $data_errors = trim($data_errors, ',');
        flash('register_error', 'Hubo un error al registrarte: ' . $data_errors, 'error' );
        $this->view('users/signup', $data);
      }else{
        // formData sin errores, listo para guardarse en la tabla
        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

        // Tratamos de guardar el registro en la tabla
        if ($this->userModel->create($data)) {
          flash('register_success', 'Ahora ya estas registrado, puedes hacer Login', 'success');
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
    // Check for POST
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
      // Process form
      // Sanitize POST data
      $_POST = filter_input_array(INPUT_POST, FILTER_UNSAFE_RAW);
      
      // Init data
      $data =[
        'email' => trim($_POST['email']),
        'password' => trim($_POST['password']),
        'email_err' => '',
        'password_err' => '',      
      ];

      // Validar Email
      if(empty($data['email'])){
        $data['email_err'] = 'Te olvidaste ingresar tu correo electrónico';
      }

      // Validar Password
      if(empty($data['password'])){
        $data['password_err'] = 'Te olvidaste ingresar tu contraseña';
      }
      
      // Make sure errors are empty
      if(empty($data['email_err']) && empty($data['password_err'])){
        // Validated
        // Check and set logged in user
        // Checar si existe el email
        if($this->userModel->filter('email', $data['email'])) {
          $loggedInUser = $this->userModel->login($data['email'], $data['password']);
          if($loggedInUser){
            // Crear Sesion
            $this->createUserSession($loggedInUser);
          } else {
            $data['password_err'] = 'Password incorrecto';

            $data['errors'] = true;
            $data_errors = '';

            if(!empty( $data['password_err'] )) {
              $data_errors = $data['password_err'];
            }
            
            if(!empty( $data['email_err'] )) {
              $data_errors = $data_errors . ',' . $data['email_err'];
            }

            $data_errors = trim($data_errors, ',');
            flash('register_error', 'Hubo un error al intentar ingresar: ' . $data_errors, 'error' );
            $this->view('users/login', $data);
          }
        }else {
          $data['email_err'] = 'Usuario no encontrado';
          $data['errors'] = true;
          $data_errors = '';
          if(!empty( $data['password_err'] )) {
            $data_errors = $data['password_err'];
          }
          
          if(!empty( $data['email_err'] )) {
            $data_errors = $data_errors . ',' . $data['email_err'];
          }

          $data_errors = trim($data_errors, ',');
          flash('register_error', 'Hubo un error al intentar ingresar: ' . $data_errors, 'error' );
          $this->view('users/login', $data);
        }

        
      } else {
        // Load view with errors
        $data['errors'] = true;

        $data_errors = '';
        if(!empty( $data['password_err'] )) {
          $data_errors = $data['password_err'];
        }
        
        if(!empty( $data['email_err'] )) {
          $data_errors = $data_errors . ',' . $data['email_err'];
        }

        $data_errors = trim($data_errors, ',');
        flash('register_error', 'Hubo un error al intentar ingresar: ' . $data_errors, 'error' );
        $this->view('users/login', $data);
      }


    } else {
      // Init data
      $data =[    
        'email' => '',
        'password' => '',
        'email_err' => '',
        'password_err' => '',        
      ];

      // Load view
      $this->view('users/login', $data);
    }
  }

  public function createUserSession($user){
    $_SESSION['user_id'] = $user->id;
    $_SESSION['user_email'] = $user->email;
    $_SESSION['user_name'] = $user->name;
    redirect('pages/index');
  }

  public static function AuthCheck() {
    if ( isset($_SESSION['user_id']) ) {
      return true;
    } else {
      return false;
    }
  }

  public function clearData() {}

  public function logout() {
    unset($_SESSION['user_id']);
    unset($_SESSION['user_email']);
    unset($_SESSION['user_name']);
    session_destroy();
    redirect('pages/index');
  }
}