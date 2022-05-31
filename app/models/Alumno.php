<?php

class Alumno {
 private $db;
 private $query;

 public function __construct() {
   $this->db = Database::make(DATABASE);
   $this->query = new QueryBuilder( $this->db);
 }

 public function all() {
  return $this->query->selectAll('alumnos', 'Alumno');
 }

 public function filter($field, $value) {
   return $this->query->selectByValue('alumnos', $field, $value);
 }
}