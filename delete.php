<?php require_once("inc/conexion.php"); ?>
<?php include_once("header.php"); ?>

<?php 
    if(isset($_GET['idCurso'])){
        $idCurso = $_GET['idCurso'];
        $consulta = "DELETE FROM tbcursos WHERE idCurso = ?";
        $sentencia = $conexion -> prepare($consulta);
        $sentencia->execute([$idCurso]);
        if($sentencia){
            header('Location:admin.php');
        }else{
            
        }
        
        
    }else{
        header('Location:admin.php');
    }
?>