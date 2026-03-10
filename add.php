<?php require_once("inc/conexion.php"); ?>
<?php include_once("header.php"); ?>
<?php 
    $consulta = "SELECT * FROM  tbprofesores";
    $sentencia = $conexion -> prepare($consulta);
    $sentencia->execute();
    $resultados = $sentencia->fetchAll(PDO::FETCH_ASSOC);
    // var_dump($resultados);
?>
<?php
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
        $nombreImagen = $imagenCurso['name'];
        $imgTemporal = $nombreImagen['tmp_name'];
        $carpeta = 'img/'. $nombreImagen;
        move_uploaded_file($imgTemporal, $carpeta);
        
        // echo "<pre>";
        // var_dump($imagenCurso);
        // echo "</pre>";

        $consulta2 = "INSERT INTO tbcursos (idProfesor, nombreCurso, fechaCurso, textoCurso, alumnosCurso, precioCurso, activoCurso, seoCurso, imagenCurso) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $sentencia2 = $conexion->prepare($consulta2);
        $sentencia2->execute([$idProfesor, $nombreCurso, $fechaCurso, $textoCurso, $alumnosCurso, $precioCurso, $estado, $seoCurso, $nombreImagen]);

        if($sentencia2){
            header("Location:admin.php");
        }
    }
?>

<div class="container">
    <div class="row">
        <div class="col-md-6 offset-3">
            <form action="#" method="post" enctype="multipart/form-data">
                <!-- <input type="number" name="idProfesor" placeholder="Id Profesor *" required class="form-control my-2"> -->
                <select name="idProfesor" class="form-control my-2" required>
                    <option value="">Seleccionar Profesor</option>
                    <option value="1">Redu</option>
                    <option value="2">Fran</option>
                </select>

                <input type="text" name="nombreCurso" placeholder="Nombre Curso *" required class="form-control my-2">
                <input type="date" name="fechaCurso" required class="form-control my-2">
                <textarea name="textoCurso" rows="5" placeholder="Descripcion del curso" class="form-control my-2"></textarea>
                <input type="number" name="alumnosCurso" placeholder="Alumnos Curso *" required class="form-control my-2">
                <input type="number" name="precioCurso" placeholder="Precio Curso *" required class="form-control my-2">
                
                <select name="estado" class="form-control my-2" required>
                    <option value="">Activar/Desactivar</option>
                    <?php foreach($resultados as $fila) { ?>
                    <option value="1"> Activo </option>
                    <option value="0"> Inactivo </option>
                    <?php } ?> 
                </select>

                <textarea name="seoCurso" rows="5" placeholder="Palabras claves..." class="form-control my-2"></textarea>

                <label for="imagenCurso" class="btn btn-primary">Subir imagen
                    <input type="file" name="imagenCurso" id="imagenCurso" required class="d-none">
                </label>
                <input type="submit" class="btn btn-success" value="insertar curso">
            </form>
        </div>
    </div>
</div>