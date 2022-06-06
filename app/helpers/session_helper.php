<?php
  session_start();
  
  function flash($name = '', $message = '' , $type = 'success') {
    $type_success = 'success bg-green-200 mt-16 mx-10 px-6 py-8 rounded-md drop-shadow-md text-sm text-gren-800 font-semibold font-poppins';
    $type_alert = 'alert bg-yellow-200 mt-16 mx-10 px-6 py-8 rounded-md drop-shadow-md text-sm text-laces font-semibold font-poppins';
    $type_warning = 'warning bg-orange-200 mt-16 mx-10 px-6 py-8 rounded-md drop-shadow-md text-sm text-laces font-semibold font-poppins';
    $type_error = 'errors bg-red-200 mt-16 mx-10 px-6 py-8 rounded-md drop-shadow-md text-sm text-laces font-semibold font-poppins';
    $class= '';
    if (!empty($name)) {
      if( !empty($message) ) {
        if ( !empty($_SESSION[$name]) ) {
          unset($_SESSION[$name]);
        }
        if ( !empty($_SESSION[$name . '_class']) ) {
          unset($_SESSION[$name . '_class']);
        }
        if ( empty($_SESSION[$name]) ) {
          $_SESSION[$name] = $message;
          switch ($type) {
            case 'success':
              $_SESSION[$name . '_class'] =  $type_success;
              break;
            case 'alert':
              $_SESSION[$name . '_class'] =  $type_alert;
              break;
            case 'warning':
              $_SESSION[$name . '_class'] =  $type_warning;
              break;
            case 'error':
              $_SESSION[$name . '_class'] =  $type_error;
              break;
          }
        }
      } elseif ( empty($message) && !empty($_SESSION[$name]) ) {
        $class = !empty($_SESSION[$name . '_class']) ? $_SESSION[$name . '_class'] : '';
        echo '<div x-data="{ hasMessage: true }" x-show="hasMessage" class="' . $class .'">
        <h2>'. $_SESSION[$name] . '</h2>
        </div>';
      }
    }
  }