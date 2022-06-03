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
}