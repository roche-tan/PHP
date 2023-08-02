<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIGN UP (registrarse)</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

        <link rel="stylesheet" href="../css/style_crud.css">

</head>

<body>
    <div class="container">

        
        <form action="signup-check.php" method="post">
            <h2>Formulario de registro</h2>
            <hr> <br>
            <!-- ZONA ERRORES  -->

            <?php if (isset($_GET['error'])) :   ?>

                <p class="error"> <?php echo $_GET['error'] ?> </p>

            <?php elseif (isset($_GET['success'])) :  ?>

                <p class="success"> <?php echo $_GET['success'] ?> </p>
                <!-- no hay errores, el registro ha ido bien  -->

            <?php endif;  ?>



                <label for="email">Email:</label>
                <input type="email" class="form-control" name="email" id="email" placeholder="Introduce tu email" value="<?php echo isset($_GET['email']) ? $_GET['email'] : "" ?>">

            <br>

            <label for="password">Password: </label>
            <input type="password" name="password" id="password" placeholder="Password">
            <br>
            
            <label for="re_password">Repita la contraseña </label>
            <input type="password" name="re_password" id="re_password" placeholder="Repita el password">

            <br>

            <button type="submit" class="btn btn-primary mt-3">Registrarme</button>
            <a href="index.php"class="btn btn-primary mt-3">Ya estoy registrado</a>


        </form>
    </div>
</body>

</html>