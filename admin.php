<?php require_once("./inc/conexion.php"); ?>
<?php require("funciones.php"); ?>
<?php 
    $consulta = "SELECT * FROM tbcursos";
    $sentencia = $conexion->prepare($consulta);
    $sentencia-> execute();
    $resultados = $sentencia->fetchAll(PDO::FETCH_ASSOC);
    // var_dump($resultados);
?>

<?php include_once("header.php"); ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-8 offset-2">
        <table class="table">
  <thead>
    <tr>
      <th scope="col">#ID</th>
      <th scope="col">Curso</th>
      <th scope="col">Fecha</th>
      <th scope="col">Descripcion</th>
      <th scope="col">Foto</th>
      <th scope="col">Precio</th>
      <th scope="col">Visible</th>
      <th scope="col"><a href="add.php" class="btn btn-primary">Añadir<i class="bi bi-plus-circle"></i></a></th>
    </tr>
  </thead>
  <tbody>

  <?php foreach($resultados as $fila) { ?>
    <tr>
      <td><?php echo $fila['idCurso'] ?></td>
      <td><?php echo $fila['nombreCurso'] ?></td>
      <td><?php echo date('d-m-y', strtotime($fila['fechaCurso'])) ?></td>
      <td><?php echo extraer($fila['textoCurso'], 10) ?> "..." </td>
      <td><img src="img/<?php echo $fila['imagenCurso'] ?>" alt="" class="img-fluid" width="50"></td>
      <td><?php echo $fila['precioCurso'] ?></td>
      <td><?php echo $fila['activoCurso'] == 1 ? "Sí": "No"; ?></td>
      <td><a href="edit.php?idCurso=<?php echo $fila['idCurso'] ?>" class="btn btn-success">Editar<i class="bi bi-pencil-square"></i></a></td>
      <td><a href="#" onClick="eliminar(<?php echo $fila['idCurso'] ?>,` <?php echo $fila['nombreCurso'] ?>`)" class="btn btn-danger">Borrar<i class="bi bi-x-circle"></i></a></td>
    </tr>

    <?php } ?>

  </tbody>
</table>
        </div>
    </div>
</div>