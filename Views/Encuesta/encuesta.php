<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $data['tag_page'] ?></title>
    <?php require_once "includes/head.php";?>
</head>
<body>
<div class="contenedor_body">
    <div>
    <?php require_once "includes/header.php"?>
    </div>

    <div class="contenido_Inicio">
        <h1><?php echo $data['page_title']; ?></h1>
    </div>

    </div>
    <?php require_once "includes/footer.php"?>
    <?php require_once "includes/scripts.php"?>
</body>
</html>

// EOF