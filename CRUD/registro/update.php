<?php
include '../php/update_in.php';
?>  

<!-- DE AQUI HACIA ABAJO ES LA PARTE VISUAL -->
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar registro_ejercicio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

   <link rel="stylesheet" href="../css/style_crud.css">
</head>

<body>
    <div class="container">
        <form action="../php/update_in.php" method="post">
            <!-- documento que hacer realmente la accion -->
            <h4 class="display-4 text-center">Actualiza usuario_ejercicio</h4>

            <hr><br>

            <!-- ----------------- ZONA DE ERRORES ----------------- -->

            <?php if (isset($_GET['error'])) : ?>

                <div class="alert alert-danger">

                    <?php echo $_GET['error'] ?>

                </div>

            <?php endif ?>
            
            <div class="form-group">
                <label for="uname">Nombre usuario: </label>
                <input type="text" class="form-control" name="uname" id="uname" value="<?php echo $row['usuario'] ?>" >

            </div>
            
            <div class="form-group">
                <label for="name">Nombre: </label>
                <input type="text" class="form-control" name="name" id="name" value="<?php echo $row['nombre'] ?>">
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
            <input type="text" name="id" id="id" value="<?php echo $row['id'] ?>" hidden>
            <!-- este echo tiene sentido porque la pag php/update.php hace el código y le llamamos arriba del todo (include)  -->

            <button type="submit" class="btn btn-primary" name="update">Actualiza</button>    <!-- IMPORTANTE PONER EL NOMBRE DEL BOTON -->
            <a href="read.php" class="link-primary">Ver usuarios</a>

        </form>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

</body>

</html>