<?php 

$login = "";
$pass = "";

if($_POST){
    $login = $_POST['usuario'];
    $pass = $_POST['password'];
}


if($login == "admin" && $pass == "admin"){
    header("Location:admin.php");
}else{
    include_once("header.php");

?>
<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <form action="#" class="border p-5" method="post">
                <input type="text" class="form-control" name="usuario" placeholder="Usuario" required>
                <input type="password" class="form-control my-3" name="password" placeholder="Contraseña" required>
                <input type="submit" value="Enviar" class="btn btn-primary">
            </form>
        </div>
    </div>
</div>

<?php } ?>