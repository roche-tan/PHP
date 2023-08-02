<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>FORMULARIO EXTENSION CRUD </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <!--Sript sacado del recaptcha de google "Automatically render the reCAPTCHA widget"-->

    <link rel="stylesheet" href="../css/style_crud.css">
</head>

<body>

    <!-- ------------------------------ CRUD: (C)REATE (R)EAD (U)PDATE (D)ELATE. Utilizado para las tablas de BBDD ------------------------------ -->
    <div class="container_form">

        <form action="login.php " method="post">

            <h4 class="display-4 text-center">Acceso registros</h4>
            <hr> <br>

            <!-- ------------------------------ INDICO ZONA DE ERRORES ------------------------------ -->

            <?php if (isset($_GET['error'])) : ?>
                <div class="alert alert-danger">
                    <?php echo $_GET['error'] ?>
                </div>
            <?php endif; ?>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" name="email" id="email" placeholder="Introduce tu email" value="<?php echo isset($_GET['email']) ? $_GET['email'] : "" ?>">
            </div>

            <div class="form-group">
                <label for="password">Password: </label>
                <input type="password" name="password" id="password" placeholder="Password">
            </div>

            <br>


            <?php
            if (isset($_POST['enviar'])) {

                $enviar = $_POST['enviar'];
                $secret = "6LdRncEgAAAAADybJOLwTqajA4l7I6uDlUkWrAYN"; //Clave secreta del servicio reCAPTCHA
                $remoteip = $_SERVER['REMOTE_ADDR']; //nos da la IP del servidor donde se está ejecutndo el script
                $captchat = $_POST['g-recaptcha-response']; //respuesta del captchat

                if (!$captchat) {
                    //si no clico en el cuadro del capchat
                    echo "<p class='error'> Verifica el captcha";
                    echo "<br>";
                } else {

                    $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$captchat&remoteip=$remoteip");

                    //https://www.google.com/recaptcha/api/siteverify (url de recaptcha)+ (?) post + secret (parámetro secret de recpchat) + $secret (variable) + & response= + $captchat & remoteip= + $remoteip

                    // (https://www.google.com/recaptcha/api/siteverify? secret=$secret  &  response=$captchat  &  remoteip=$remoteip )

                    /*Transmiten datos a Google: secret, captcha, remoteip
            La respuesta de Google la pone en la variable $response en formato cadena JSON*/

                    // var_dump($response); //val un volcado por pantalla que me devuelve Google

                    // $arr = json_decode($response, true); //convierte la cadena que me da Google en formato JSON a un array

                    // echo "<pre>";
                    // print_r($arr); //imprimir un array
                    // echo "</pre>";

                    // if ($arr['success'] == true) { //success nos lo da JSON. 
                    //     echo "<br><br>";
                    //     echo "<h4> Te has validado correctamente </h4>";

                    // } else {
                    //     echo "<br><br>";
                    //     echo "<p class='error'>Error al comprobar el captcha </p>";
                    //     echo "<p> Motivo del error: " . $arr['error-codes'][0] . "</p>";
                    // }
                }
            } else {


            ?>

                <div class="g-recaptcha" data-sitekey="6LdRncEgAAAAAKS0Gf9AwED2BlzkzFy_S8gxtjeG"></div>

                <button type="submit" name="enaviar">Login</button>
                <a href="signup.php">Registrarme</a>
                <input type="reset" value="Borrar">



        </form>
    </div>

</body>

</html>
<?php } ?>