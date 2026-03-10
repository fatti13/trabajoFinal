<?php require("./inc/conexion.php"); ?>
<?php 
    if($_POST){
        $titulo = $_POST['titulo'];
        $inicio = $_POST['inicio'];
        $fin = $_POST['fin'];
        $descripcion = $_POST['descripcion'];
        $color = $_POST['color'];

        $consulta= "INSERT INTO tbeventos (tituloEvento, inicioEvento, finEvento, descripcion, color) VALUES (?,?,?,?,?)";
        $sentencia = $conexion->prepare($consulta);
        $sentencia->execute([$titulo, $inicio, $fin, $descripcion, $color]);
        if($sentencia){
            header("Location:eventos.php");
        }
     }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
</head>
<body>
    <div class="container my-5 p-5">
        <div class="row p-5">
            <div class="col-md-8 offset-2 border p-5">
                <h1 class="my-3">Añadir Eventos</h1>
                <form action="#" method="post">
                    <input type="text" class="form-control my-3" name="titulo" placeholder="titulo evento" required>
                    <input type="datetime-local" class="form-control my-3" name="inicio" required>
                    <input type="datetime-local" class="form-control my-5" name="fin" required>
                    <textarea name="descripcion" class="form-control my-3" rows="10" placeholder="Descripcion del evento"></textarea>
                    <label for="color" class="form-label">
                        <input type="color" name="color" id="color" class="form-control-color">
                        Color del evento
                    </label>
                    <input type="submit" value="Añadir evento" class="btn btn-primary d-block my-3">
                </form>
            </div>
        </div>
    </div>



<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.6/index.global.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="bootstrap/js/bootstrap.min.js"></script> 


</body>
</html>