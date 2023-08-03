<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <form action="login.php" method="post">
        <!--Importante poner POST al ser contraseña-->
        <!-- Aquí comienzan los errores  -->

        <?php

        if (isset($_GET['error'])) {  ?>
            <p class="error"><?php echo $_GET['error'] ?> </p>
        <?php  } ?>

        <!-- Aquí acaban los errores  -->

        <label for="">Nombre usuario: </label>
        <input type="text" name="uname" id="uname" placeholder="nombre usuario">
        <br>

        <label for="">Contraseña: </label>
        <input type="password" name="password" id="password" placeholder="contraseña">
        <br>

        <button type="submit">Login</button>

    </form>
</body>

</html>