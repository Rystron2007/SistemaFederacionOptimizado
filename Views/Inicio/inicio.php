<!DOCTYPE html>
<html lang="es">
<head>
    <!--LLamado al Archivo head.php que contiene todos los atributos de la página-->
    <?php require_once "includes/head.php";?>
    <!--Llamado al archivo ViewsInicio que se usa para el contendio de la página de inicio-->
    <link rel="stylesheet" href="Librerias/css/estilosVistas/ViewsInicio.css">
</head>

<body>
    <div class="contenedor_body">
    <!--Llamado al archivo header que contiene la cabecera del Sistema,
    junto con el Nav para todas las páginas-->
    <div>
        <!--Div para separar el Header y Nav-->
    <?php require_once "includes/header.php"?>
    </div>

    <div class="contenido_Inicio">
        <!--Div para separar el Main y Contenido de la página-->
        <!--Div para separar el Main y Contenido de la página-->
        <h1><?php echo $data['page_title']; ?></h1>
        <h2>hdhdhd</h2>
        <h3>ddede</h3>
        <button></button>
    </div>

    </div>
    <!--LLamado del Footer de la Pagina Web-->
    <?php require_once "includes/footer.php"?>
    <!--Llamado al archivo de Scripts e incorporarlo en las páginas-->
    <?php require_once "includes/scripts.php"?>
</body>

</html>

// EOF
