<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .resultat {
            width: 400px;
            background-color: lightcoral;
        }
    </style>
</head>

<body>




    <?php

    if (!empty($_GET['extras'])) { //si no está vacío lo que me has enviado con el metodo GET/POST. REQUEST sirve tanto para get/post pero puede dar errores... si se pone REQUEST, ya recoge el método del html automáticamente. En html siempre metodo POST/GET 
        $opcio = $_GET['extras'];
        echo "<div class='resultat'> \n";
        //recorrer un array:
        echo "<ul>\n";
        foreach ($opcio as $valor) { //coges el array y le cambias de nombre dentro del foreach. DINÁMICO tantas veces como el array se haya seleccionado. //PROBAR SI SOLO CON OPCION FUNCINA
            echo "<li>" . $valor . "</li>\n";
        }
        echo "</ul>\n";
        echo "</div> ";
    }
    ?>




</body>

</html>