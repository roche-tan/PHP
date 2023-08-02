<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EJERCICIO CRUD - PROB. EXAMEN</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

    <link rel="stylesheet" href="../css/style_crud.css">
</head>

<body>
    <div class="container">
        <form action="../php/create.php" method="post">
            <!-- Vuelca datos a la pag create donde crerá los usuarios  -->

            <h4 class="display-4 text-center">Introducir registro</h4>
            <hr><br>

            <!-- INICIO ZONA DE ERRORES  -->

            <?php if (isset($_GET['error'])) : ?>
                <div class="alert alert-danger">
                    <?php echo $_GET['error'] ?>
                </div>
            <?php endif; ?>

            <!-- FIN ZONA DE ERRORES  -->

            <div class="form-group">
                <label for="uname">Nombre usuario: </label>
                <input type="text" class="form-control" name="uname" id="uname" placeholder="Nombre usuario" >

            </div>
            
            <div class="form-group">
                <label for="name">Nombre: </label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Nombre">
            </div>
            <br>

            <div class="form-group">
                <p>Rol</p>
                <input type="radio" name="rol" value="Editor"> Editor <br>
                <input type="radio" name="rol" value="Suscriptor"> Suscriptor<br>
                <input type="radio" name="rol" value="Autor"> Autor<br>
                <input type="radio" name="rol" value="Administrador"> Administrador<br>

            </div>
            <br>
            <div class="form-group">
                <p>Turno trabajo</p>
                <select name="turn" id="turn">
                    <option value="">Escoge una opción</option>
                    <option value="Mañana">Mañana</option>
                    <option value="Tarde">Tarde</option>
                    <option value="Noche">Noche</option>
                </select>
            </div>
            <br>

            <button type="submit" class="btn btn-primary mt-3" name="create">Crear usuario</button>   <!-- el nombre CREATE del otón es el que luego cogerá pa página php/create.php $_POST['create'] -->
            <a href="read.php" class="btn btn-primary mt-3">Ver registros</a>


        </form>
    </div>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

</body>

</html>