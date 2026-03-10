    <?php
          require_once("./inc/conexion.php");
          include("funciones.php");
          

          $consulta = "SELECT * FROM tbcursos, tbprofesores WHERE tbcursos.idProfesor = tbprofesores.idProfesor LIMIT 3";
          $sentencia = $conexion->prepare($consulta);
          $sentencia->execute();
          $resultados = $sentencia->fetchAll(PDO::FETCH_ASSOC);
        
        //   echo "<pre>";
        //   var_dump($resultados);
        //   echo "</pre>";
        
        
        
        //   $consulta = "SELECT * FROM tbcursos LIMIT 3";
        //   $sentencia = $conexion->prepare($consulta);
        //   $sentencia->execute();
        //   $resultados = $sentencia->fetchAll();
        
            // echo "<pre>";
            // var_dump($resultados);
            // echo "</pre>";
    

        include_once("header.php");
    ?>

    <main id="index">
        <section id="banner">
            <h1>Cursos online</h1>
            <h2>HTML5 - CSS3 - PHP -JAVASCRIPT- WORDPRESS - PRESTASHOP</h2>
            <a href="cursos.php">Más información</a>
        </section>

        <section id="plataforma">
            <div class="bienvenido">
                <h4>Bienvenido a la plataforma E-Web</h4>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Vitae qui assumenda nobis tempora, ad distinctio ex. Beatae saepe architecto doloribus.</p>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <img src="img/icon_1.png" alt="">
                        <h3>Expertos</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis, voluptatum.</p>
                    </div>

                    <div class="col-md-3">
                        <img src="img/icon_2.png" alt="">
                        <h3>Recursos</h3>
                        <p>Labore cum iure tempore culpa iste amet aperiam explicabo quibusdam.</p>
                    </div>

                    <div class="col-md-3">
                        <img src="img/icon_3.png" alt="">
                        <h3>Cursos</h3>
                        <p>Reprehenderit blanditiis, provident tempora soluta architecto sint natus omnis saepe!</p>
                    </div>

                    <div class="col-md-3 my-md-4">
                        <img src="img/icon_4.png" alt="">
                        <h3>Premios</h3>
                        <p>Vitae iusto molestias dolor natus voluptatibus animi sint illo hic.</p>
                    </div>

                </div>
            </div>

        </section>

        <section id="cursos">
        <div class="container">
            <h2>Cursos Online</h2>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Excepturi distinctio quasi aperiam dolores, similique pariatur tenetur voluptatum modi mollitia voluptates, eligendi laudantium? Laborum, impedit ad.</p>
            <div class="row">
                <?php
                    foreach($resultados as $fila){
                        

                ?>
                <div class="col-md-4">
                    <div class="sombra">
                        <img src="img/<?php echo $fila['imagenCurso'] ?>" alt="<?php echo $fila['seoCurso'] ?>">
                    <h3><?php echo $fila['nombreCurso'] ?></h3>
                    <h4><?php echo $fila['nombreProfesor'] ?></h4>
                    <time><?php echo date('d-m-y', strtotime($fila['fechaCurso'])) ?></time>
                    <p><?php echo extraer($fila['textoCurso'], 20)."..." ?>
                       <div>
                           <a href="detalleCurso.php?idCurso=<?php echo $fila['idCurso'] ?>" class="btn btn-primary mt-4"> + info </a> 
                        </div>
                    </p>
                    <hr>
                    <div class="estudent"><i class="bi bi-mortarboard-fill"></i><span><?php echo $fila['alumnosCurso'] ?></span><span><?php echo $fila['precioCurso'] ?></span></div></div>
                    </div>



                <?php

                    }
                ?>
                <!-- <div class="col-md-4">
                    <div class="sombra">
                        <img src="img/curso2.jpg" alt="">
                    <h3>texto</h3>
                    <h4>redu</h4>
                    <time>11/08/2023</time>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Odit, aperiam?</p>
                    <hr>
                    <div class="estudent"><i class="bi bi-mortarboard-fill"></i><span>20 estudiantes</span><span>130$</span></div></div>
                    </div>
                <div class="col-md-4">
                    <div class="sombra">
                        <img src="img/curso3.jpg" alt="">
                    <h3>texto</h3>
                    <h4>redu</h4>
                    <time>11/08/2023</time>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Odit, aperiam?</p>
                    <hr>
                    <div class="estudent"><i class="bi bi-mortarboard-fill"></i><span>20 estudiantes</span><span>130$</span></div></div>
                    </div> -->
            </div>
            
        </div>
        <a href="#">Ver Todos Los Cursos</a>
        </section>
        <section id="noticias" class="container">
            <h2>Noticias</h2>
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Consectetur ut eius consequatur, distinctio impedit inventore tempora eveniet quidem harum tenetur pariatur, saepe vitae iste praesentium.</p>
            <div class="row">
                <div class="col-md-4">
                    <img src="" alt="">
                    <div class="news">
                        <time>21Feb</time>
                        <div>
                            <h4>Insercion Laboral</h4>
                            <i class="icon"></i>
                            <time>15:00-19:30</time>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit, aperiam quibusdam maxime sequi quia dolore omnis dolorem numquam doloremque obcaecati animi enim a odio ullam.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <img src="" alt="">
                    <div class="news">
                        <time>21Feb</time>
                        <div>
                            <h4>Insercion Laboral</h4>
                            <i class="icon"></i>
                            <time>15:00-19:30</time>
                            <p>Nesciunt facere perspiciatis fugit nostrum! Magnam aperiam, blanditiis, nemo saepe provident commodi pariatur molestiae obcaecati modi dolore repudiandae maxime quia unde quis tempore porro rerum?</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <img src="" alt="">
                    <div class="news">
                        <time>21Feb</time>
                        <div>
                            <h4>Insercion Laboral</h4>
                            <i class="icon"></i>
                            <time>15:00-19:30</time>
                            <p>Dolores hic autem deleniti quaerat, nostrum dolore reprehenderit possimus pariatur placeat ratione repellat dolorum cumque obcaecati eum explicabo ullam modi aliquam omnis, nihil ipsa rem.</p>
                        </div>
                    </div>
                </div>
            </div>
            <a href="#">Suscribir</a>
        </section>
    </main>

    <?php
        include_once("footer.php");
    ?>

<script src="bootstrap/js/bootstrap.min.js"></script>  
</body>
</html>  