<?php require_once("inc/conexion.php"); ?>
<?php include("funciones.php"); ?>
<?php include_once("header.php"); ?>
<?php 
    if(isset($_GET['idCurso'])){
        $idCurso = $_GET['idCurso'];

        // consulta profesores
        // $consulta = "SELECT * FROM  tbprofesores";
        // $sentencia = $conexion -> prepare($consulta);
        // $sentencia->execute();
        // $resultados = $sentencia->fetchAll(PDO::FETCH_ASSOC);
        // var_dump($resultados);

        // consulta curso
        // $consulta3 = "SELECT * FROM tbcursos WHERE idCurso = ?";
        // $sentencia3 = $conexion ->prepare($consulta3);
        // $sentencia3->execute([$idCurso]);
        // $resultados3 = $sentencia3->fetch(PDO::FETCH_ASSOC);

        // consulta unica
        $consulta = "SELECT * FROM tbcursos, tbprofesores WHERE tbcursos.idProfesor = tbprofesores.idProfesor AND tbcursos.idCurso = ?";
        $sentencia = $conexion->prepare($consulta);
        $sentencia->execute([$idCurso]);
        $resultados = $sentencia->fetch(PDO::FETCH_ASSOC);
        // echo "<pre>";
        // var_dump($resultados);
        // echo "</pre>";
    }
    if($_POST){
        $idProfesor = $_POST['idProfesor'];
        $nombreCurso = $_POST['nombreCurso'];
        $fechaCurso = $_POST['fechaCurso'];
        $textoCurso = $_POST['textoCurso'];
        $alumnosCurso = $_POST['alumnosCurso'];
        $precioCurso = $_POST['precioCurso'];
        $estado = $_POST['estado'];
        $seoCurso = $_POST['seoCurso'];
        $imagenCurso = $_FILES['imagenCurso'];
        if(!empty($imagenCurso)){
            $imagenCurso = $_FILES['imagenCurso'];
            $nombreImagen = $imagenCurso['name'];
            $imgTemporal = $nombreImagen['tmp_name'];
            $carpeta = 'img/'. $nombreImagen;
            move_uploaded_file($imgTemporal, $carpeta);
        }else{
            $nombreImagen = $resultados['imagenCurso'];
        }
        
        
        // echo "<pre>";
        // var_dump($imagenCurso);
        // echo "</pre>";

        $consulta2 = "UPDATE tbcursos SET (idProfesor == ?, nombreCurso == ?, fechaCurso == ?, textoCurso == ?, alumnosCurso == ?, precioCurso == ?, activoCurso == ?, seoCurso == ?, imagenCurso == ?) WHERE idCurso = ? ";
        $sentencia2 = $conexion->prepare($consulta2);
        $sentencia2->execute([$idProfesor, $nombreCurso, $fechaCurso, $textoCurso, $alumnosCurso, $precioCurso, $estado, $seoCurso, $nombreImagen, $idCurso]);

        if($sentencia2){
            header("Location:admin.php");
        }
    }
?>

<div class="container">
    <div class="row text-center">
        <h1>Editar curso: <?php echo $resultados['nombreCurso'] ?></h1>
        <div class="col-md-6 offset-3">
            <div><img src="img/<?php echo $resultados['imagenCurso'] ?>" alt="" class="img-fluid"></div>
        </div>
        <div class="col-md-6 offset-3">
            <form action="#" method="post" enctype="multipart/form-data">
                <!-- <input type="number" name="idProfesor" placeholder="Id Profesor *" required class="form-control my-2"> -->
                <select name="idProfesor" class="form-control my-2" required>
                    <option value="">Seleccionar Profesor</option>
                    <?php foreach($prof as $fila){ ?>
                    <option value="<?php $fila['idProfesor'] ?>" <?php if($fila['idProfesor'] == $resultados['idProfesor']) {echo "selected";} ?>><?php $fila['nombreProfesor'] ?></option>
                    <?php }; ?>
                </select>

                <input type="text" name="nombreCurso" value="<?php echo $resultados['nombreCurso'] ?>" placeholder="Nombre Curso *" required class="form-control my-2">
                <input type="date" name="fechaCurso" value="<?php echo $resultados['fechaCurso'] ?>" required class="form-control my-2">
                <textarea name="textoCurso" rows="5" placeholder="Descripcion del curso" class="form-control my-2"><?php echo $resultados['textoCurso'] ?></textarea>
                <input type="number" name="alumnosCurso" placeholder="Alumnos Curso *"value="<?php echo $resultados['alumnosCurso'] ?>" required class="form-control my-2">
                <input type="number" name="precioCurso" placeholder="Precio Curso *" value="<?php echo $resultados['precioCurso'] ?>" required class="form-control my-2">
                
                <select name="estado" class="form-control my-2" required>
                    <option value="">Activar/Desactivar</option>
                    <option value="1" <?php if($resultados['activoCurso'] == 1) {echo "selected";} ?>> Activo </option>
                    <option value="0" <?php if($resultados['activoCurso'] == 0) {echo "selected";} ?>> Inactivo </option>
                </select>

                <textarea name="seoCurso" rows="5" placeholder="Palabras claves..." class="form-control my-2"><?php echo $resultados['seoCurso'] ?></textarea>

                <label for="imagenCurso" class="btn btn-primary">Subir imagen
                    <input type="file" name="imagenCurso" id="imagenCurso" required class="d-none">
                </label>
                <input type="submit" class="btn btn-success" value="actualizar curso">
            </form>
        </div>
    </div>
</div>