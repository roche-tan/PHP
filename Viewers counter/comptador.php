<?php
//contador de visualizaciones en la página

session_start();
if (isset($_SESSION['comptador'])) {
    // y has visitado esta página

    // $_SESSION['comptador']=$_SESSION['comptador']+1; Es lo mismo que:
    $_SESSION['comptador'] += 1;
} else {
    //si no has visitado la pagina antes
    $_SESSION['comptador'] = 1;
}

if ($_SESSION['comptador'] == 1) {
    $msg = "Es la primera vez que entras en esta página";
} else {
    $msg = " Es la: <span class='no' > ";
    $msg .= $_SESSION['comptador'];
    $msg .= "</span>";
    $msg .= " que entras en esta página";
    //para concatenar las frases, añadir un (.) final después de la variable
    $msg = "Es la <span class='no' >" . $_SESSION['comptador'] . " </span>    que entras en esta página";
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            margin: 5rem;
            text-align: center;
            background-color: lightblue;
        }

        html {
            font-family: 'Poppins', Arial, Helvetica, sans-serif;
        }

        #contenidor {
            margin-top: 4em;
            line-height: 4em;
            text-align: center;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 80vh;

        }

        .contador {

            text-align: center;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            height: 80vh;
            width: 100%;

        }

        .no {
            color: white;
            font-size: 1.5rem;
            border: 1px solid black;
            background-color: blue;
            border-radius: 5px;
            margin: 0.5rem;
            text-align: center;
        }

        p {
            font-size: 1.5em;
        }
    </style>
</head>

<body>
    <h1>Contador de visitas utilizando variables de sesión</h1>
    <div id="contenidor">
        <div class="contador">
            <p> <?php echo $msg ?> </p>
            <p>Recárga la página</p>
        </div>
    </div>

</body>

</html>