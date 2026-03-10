<?php

?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Práctica Sass - Php</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab|Roboto:400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/estilo.css">
    <script>
        function eliminar(idCurso, nombreCurso){
            let ok = confirm("¿Quieres eliminar de verdad esto " + nombreCurso +" ?");
            if(ok){
                window.location= "delete.php?idCurso="+idCurso;
            }
        }
    </script>
</head>
<body>
<header id="header">
        <div class="navTop">
           <div class="container">
                <p>¿Tienes alguna pregunta?</p>

                <div>
                    <a href="tel:+34958343434">
                        <i class="bi bi-telephone"></i>
                            958 34 34 34
                    </a>
                </div>

                <div>
                    <a href="contacto.php">
                        <i class="bi bi-envelope"></i>
                        info@escuelaartegranada.com
                    </a>
                </div>

                <div>
                    <a href="login.php">
                        <i class="bi bi-person-fill"></i>
                    </a>
                </div>

           </div>
        </div>


        <nav class="navbar navbar-expand-lg container">
            <div class="container-fluid">

              <a class="navbar-brand" href="index.php">E-<span>WEB</span></a>

              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu" aria-controls="menu" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>

              <div class="collapse navbar-collapse" id="menu">

                <div class="navbar-nav ms-auto">
                    <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    <a class="nav-link" href="#">Escuela</a>
                    <a class="nav-link" href="#">Cursos</a>
                    <a class="nav-link" href="#">Blog</a>
                    <a class="nav-link" href="#">Contacto</a>
                    <div class="buscador">
                        <!-- <input type="search" placeholder="Buscar curso"> lo haremos con js-->
                        <i class="bi bi-search"></i>
                    </div>
                </div> 
              </div>

            </div>
          </nav>
    </header>