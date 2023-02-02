<?php
//@author Josue Martinez Fernandez
//@version 1.0
//ultima actualizacion 12/01/2023
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="./webroot/css/style.css">
        <title>205ProyectoFinal</title>
        <script defer src="./webroot/scripts/reloj.js"></script>
    </head>
    <body>
        <header>
            <h1>&lt;/DWES&gt;</h1>
            <h2>ProyectoFinal <?php echo $_SESSION['paginaEnCurso'] ?></h2>
        </header>
        <main>
            <section>              
                <?php require_once $aVistas[$_SESSION['paginaEnCurso']] ?>
            </section>
        </main>
        <footer>
            <div class="footerIcons">
                <a href="./doc/curriculum.pdf" target="_blank"><img src="./webroot/images/curriculum.png"
                                                                     alt="Imagen curriculum"></a>
                <a href="https://github.com/JosueMarFer/205DWESProyectoFinal" target="_blank"><img
                        src="./webroot/images/github.png" alt="Imagen github"></a>
            </div>
            <div class="home">
                <a href="../../index.html"><img src="./webroot/images/home.png" alt="Imagen home"></a>
                <p>Josué martínez Fernández</p>
            </div>
            <div class="paginaImitada">
                <p>Pagina imitada:</p>
                <a href="https://www.freecodecamp.org/"><img src="./webroot/images/freeCodeCamp.png" alt="Imagen freeCodeCamp"></a>
            </div>
            <div class="relojJS">
            </div>
        </footer>
    </body>
</html>