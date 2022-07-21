<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximun-scale=1.0, 
    minumun-scale=1.0">
    <!-- <?php //require_once "../SistemaFederacionArbritos/sistema/includes/head.html";?>-->
    <link href="https://fonts.googleapis.com/css2?family=Krub:wght@400;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous">
    </script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <title>Federación de Arbritos</title>
    <link rel="icon" type="image/png" href="<?php echo media();?>archivos/img/icono.png" />
    <link rel="stylesheet" href="<?php echo BASE_URL;?>Librerias/css/estiloshome/slideshow.home.css">
    <link rel="stylesheet" href="<?php echo BASE_URL;?>Librerias/css/estiloshome/home.css">
    <link rel="stylesheet" href="<?php echo BASE_URL;?>Librerias/css/estiloshome/normalize.css">
    <link rel="stylesheet" href="<?php echo BASE_URL;?>Librerias/css/estiloshome/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
        integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

    <style>
    /* Para un comportamiento responsive */
    .carousel-inner img {
        width: 100%;
        height: 100%;
    }
    </style>
</head>

<body>
    <div class="container">
        <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
            <a href="#" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
                <span class="fs-1" style="font-weight: bold;">Federación de Arbritos del Ecuador</span>
            </a>

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">

                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-2" >
                            <li class="nav-item h2 ">
                                <a class="nav-link hoverMenu" aria-current="page" href="#">Inicio</a>
                            </li>
                            <li class="nav-item h2 ">
                                <a class="nav-link hoverMenu" href="#">Nosotros</a>
                            </li>
                            <li class="nav-item h2 ">
                                <a class="nav-link hoverMenu" href="#">Contactos</a>
                            </li>
                            <li class="nav-item h2 ">
                                <a class="nav-link hoverMenu" href="<?php echo base_url();?>login" target=".blank" tabindex="-1" aria-disabled="true">Ingresar al Sistema </a>
                            </li>
                        </ul>

                    </div>
                </div>
            </nav>
        </header>
    </div>
    <div>
        <?php
            require_once "includes/home/slideshow.html";
        ?>
    </div>
    <div>
        <div>
            <br>
        </div>
        <?php
  require_once "includes/home/informacion.html";
    ?>
    </div>
    <div>
        <br>
    </div>
    <div>
        <?php
      require_once "includes/home/footer.html";
    ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>

</body>

</html>

// EOF