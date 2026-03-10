<?php require_once("./inc/conexion.php"); ?>
<?php require_once("header.php"); ?>

<?php
if(isset($_GET['idCurso'])){
    $idCurso = $_GET['idCurso'];
    // echo "<h1 class='ms-5'>".$idCurso."</h1>"; 
}else{
    header("Location:index.php");
}

$consulta2 = "SELECT * FROM tbcursos, tbprofesores WHERE idCurso = ?";
$sentencia2 = $conexion->prepare($consulta2);
$sentencia2 -> execute([$idCurso]);
$resultado2 = $sentencia2->fetch();
// var_dump($resultado2);

if($resultado2['idCurso'] != $idCurso){
    header("Location:index.php");
}

?>


<div class="container border p-5 my-5">
   <div class="row my-5">
        <div class="col-12 my-5">
            <div><img src="img/<?php echo $resultado2['imagenCurso'] ?>" alt=""></div>
            <h1><?php echo $resultado2['nombreCurso'] ?></h1>
            <h2><?php echo $resultado2['nombreProfesor'] ?></h2>
            <p><?php echo $resultado2['textoCurso'] ?></p>
            <a href="index.php" class="btn btn-primary">Volver</a>
        </div>
    </div>
</div>
</div>

<?php require_once("footer.php"); ?>