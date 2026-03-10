<?php require_once('inc/conexion.php'); ?>
<?php 
    $consulta= 'SELECT * FROM tbeventos';
    $sentencia= $conexion->prepare($consulta);
    $sentencia->execute();
    $resultados= $sentencia->fetchAll();
    
    echo json_encode($resultados);
?>