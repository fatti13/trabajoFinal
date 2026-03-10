<?php
  function profesores(){
    // consulta profesores
    require('inc/conexion.php');
    $consulta = "SELECT * FROM  tbprofesores";
    $sentencia = $conexion -> prepare($consulta);
    $sentencia->execute();
    $resultados2 = $sentencia->fetchAll(PDO::FETCH_ASSOC);
    // var_dump($resultados2);
    return($resultados2);
  }
  $prof = profesores();
  foreach($prof as $fila){
    echo $fila['nombreProfesor'];
  }
?>