<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>FORMULARIO EXTENSION CRUD </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

    <link rel="stylesheet" href="../css/style_crud.css">
</head>

<body>

<?php

if(isset($_POST['submit'])){
    $enviar=$_POST['submit'];

    $email=$_POST['email'];
    $password=$_POST['password'];

    $secret="6LdRncEgAAAAADybJOLwTqajA4l7I6uDlUkWrAYN";
    $remoteip=$_SERVER['REMOTE_ADDR'];
    $captchat = $_POST['g-recaptcha-response'];
    if (!$captchat) {
        //si no clico en el cuadro del capchat
        echo "<p class='error'> Verifica el captcha";
        echo "<br>";
    } else {

        $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$captchat&remoteip=$remoteip");


        var_dump($response); //val un volcado por pantalla que me devuelve Google

        $arr = json_decode($response, true); //convierte la cadena que me da Google en formato JSON a un array

        echo "<pre>";
        print_r($arr); //imprimir un array
        echo "</pre>";

        if ($arr['success'] == true) { //success nos lo da JSON. 
            echo "<br><br>";
            echo "<h4> Te has validado correctamente </h4>";
        } else {
            echo "<br><br>";
            echo "<p class='error'>Error al comprobar el captcha </p>";
            echo "<p> Motivo del error: " . $arr['error-codes'][0] . "</p>";
        }
    }
} else {



?>


    <!-- ------------------------------ CRUD: (C)REATE (R)EAD (U)PDATE (D)ELATE. Utilizado para las tablas de BBDD ------------------------------ -->
    <div class="container">

        <form action="login.php" method="post">

            <h4 >Acceso registros</h4>
            <hr> <br>

            <!-- ------------------------------ INDICO ZONA DE ERRORES ------------------------------ -->

            <?php if (isset($_GET['error'])) : ?>
                <div class="alert alert-danger">
                    <?php echo $_GET['error'] ?>
                </div>
            <?php endif; ?>


                <label for="email">Email:</label>
                <input type="email" class="form-control" name="email" id="email" placeholder="Introduce tu email" value="<?php echo isset($_GET['email']) ? $_GET['email'] : "" ?>">



                <label for="password">Password: </label>
                <input type="password" name="password" id="password" placeholder="Password">

                <div class="g-recaptcha" data-sitekey="6LdRncEgAAAAAKS0Gf9AwED2BlzkzFy_S8gxtjeG"></div>

            <br>
            <button type="submit" name="submit">Login</button>
            <a href="signup.php" >Registrarme</a>
            <input type="reset" value="Borrar" class="btn">


        </form>
    </div>

</body>

</html>
<?php } ?>