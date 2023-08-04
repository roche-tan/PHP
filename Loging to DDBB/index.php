<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <h2>Login</h2>
    <form action="login.php" method="post">

        <!-- -------------------- ERRORES -------------------- -->
        <?php if(isset($_GET['error'])) : ?> <!--esta variable "error" sale de: header("Location:index.php?error=No has puesto la contraseña");-->
            <!-- HTML que se ejecuta si hay errores  -->
            <p class="error"> <?php echo $_GET['error']?> </p>
        <?php endif ?>
        


        <label for="uname">Nombre de usuario: </label>
        <input type="text" name="uname" id="uname" placeholder="Nombre de usuario">

        <br>

        <label for="password">Password: </label>
        <input type="password" name="password" id="password" placeholder="Password">

        <br>

        <button type="submit">Login</button>

    </form>
</body>

</html>