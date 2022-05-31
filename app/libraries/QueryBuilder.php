<?php

class QueryBuilder {
  protected $pdo;

  public function __construct(PDO $pdo) {
    $this->pdo = $pdo;
  }

  public function selectAll($table, $inToClass) {    
    $statement = $this->pdo->prepare("select * from {$table}");
    $statement->execute();
    // Obtener todos los registros y mostrarlos como un objeto
    return $alumnos = $statement->fetchAll(PDO::FETCH_OBJ);
    // Obtener todos los registros y enviarlos a una clase
    //return $statement->fetchAll(PDO::FETCH_CLASS, 'Alumno');
    //return $statement->fetchAll(PDO::FETCH_CLASS, $inToClass);
  }

  public function selectByValue($table, $field, $value){
    $statement = $this->pdo->prepare("select * from {$table} where {$field} = :value ");
    $statement->bindParam(':value', $value);
    $statement->execute();
    // Obtener todos los registros y mostrarlos como un objeto
    return $result = $statement->fetchAll(PDO::FETCH_OBJ);
  }

  public function insert() {
    /* $statement = $this->pdo->prepare("INSERT INTO {$table} (control, nombre, paterno, materno) 
      VALUES (:control, :nombre, :paterno, :materno)");
    
    $control = "123456789";
    $nombre = "Jose";
    $paterno = "Torres";
    $ciudad = "Salinas";
    $statement->bindParam(':control', $control);
    $statement->bindParam(':nombre', $nombre);
    $statement->bindParam(':paterno', $paterno);
    $statement->bindParam(':materno', $materno);
    
    $statement->execute(); */
  }
}