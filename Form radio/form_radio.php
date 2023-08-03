<?php

if (empty($_GET['color'])) {
    echo "No has seleccionado ningún color";
    header("refresh:5, url=index.html");
} else {
    $color = $_GET['color'];
    echo "Has escogido el color: $color";

    switch ($color) {
        case 'Rojo':
            $color_fons = 'red';
            break;
        case 'Naranja':
            $color_fons = 'orange';
            break;
        default:
            $color_fons = 'white';
    }

    if ($color == 'Azul') {
        $color_fons = '#7498fb';
    } elseif ($color == 'Amarillo') {
        $color_fons = 'yellow';
    }
}

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Radio 2</title>
    <style>
        body {
            background-color: <?php echo $color_fons ?>;
            /*Hay que poner echo para que lo lea y se salga en la pantalla */
        }
    </style>
</head>

<body>

</body>

</html>