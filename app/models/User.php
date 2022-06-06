<?php

class User {
 private $db;
 private $query;

 public function __construct() {
   $this->db = Database::make(DATABASE);
   $this->query = new QueryBuilder( $this->db);
 }

 public function all() {
  return $this->query->selectAll('users', 'User');
 }

 public function filter($field, $value) {
   return $this->query->selectByValue('users', $field, $value);
 }

 public function create($data) {
   $userData = [
     'name' => $data['name'],
     'lastname' => $data['lastname'],
     'email' => $data['email'],
     'password' => $data['password']
   ];
   
   return $this->query->insert('users',$userData);
 }

 public function login($email, $password){
  $user = $this->filter('email', $email);

  $hashed_password = $user[0]->password;
  if(password_verify($password, $hashed_password)){
    return $user[0];
  } else {
    return false;
  }
}

}