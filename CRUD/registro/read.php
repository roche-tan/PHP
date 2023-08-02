<?php

include "../php/read_in.php"; /*hará la consulta sql y ya incluye el db_conn.php*/
?>

<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Listado usuarios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" /> -->
    <link rel="stylesheet" href="../css/style_crud.css">
</head>

<body>

    <div class="container">
        <div class="box">
            <h4 class="display-4 text-center">Listado de usuarios</h4>
            <hr> <br>

            <!-- --------------- MENSAJE SUCCESS --------------- -->
            <?php if (isset($_GET['success'])) :  ?>
                <div class="alert alert-success">
                    <?php echo $_GET['success'] ?>
                </div>
            <?php endif; ?>
            <!-- ---------------FIN MENSAJE SUCCESS --------------- -->

            <!-- ------------------------- Saco un listado de todo los usuarios de mi BBDD ------------------------- -->
            <!-- include "db_conn.php"; de php/read_in.php se ejecuta aquí por eso el include "db_conn.php"; no tiene que volver atrás. Se ejecuta aquí por lo que la pag de db está al lado-->

            <?php if (mysqli_num_rows($result)) : ?>
                <!-- mysqli_num_rows = obtiene el número de filas de un resultado || dime cuántas filas cumplen lo que me has preguntado -->

                <table class="table table-striped">

                    <thead>
                        <!-- encabezado de la taba  -->
                        <tr>
                            <th scope="col">id</th>
                            <th scope="col">Nombre usuario</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Rol</th>
                            <th scope="col">Turno</th>
                            <th scope="col">Acción</th>
                        </tr>
                    </thead>
                    <!-- cuerpo de la tabla  -->
                    <tbody>

                        <?php

                        $i = 0;

                        // $rows=mysqli_fetch_assoc($result);
                        // echo"<pre>";
                        // print_r($rows);
                        // echo"</pre>";

                        while ($rows = mysqli_fetch_assoc($result)) {  // mysqli_fetch_assoc = obtener una lista array asociativo 

                            $i++; // para que la id se vaya generando automáticamente con la lista

                        ?>

                            <tr>
                                <td> <?php echo $i ?></td>
                                <td><?php echo $rows['usuario'] ?></td>             <!-- ['XXXX'] nombre del campo que hay en la bbdd -->
                                <td><?php echo $rows['nombre'] ?></td>
                                <td><?php echo $rows['rol'] ?></td>
                                <td><?php echo $rows['turno'] ?></td>
                                <td>
                                    <a class="btn btn-success" href="update.php?id=<?php echo $rows['id'] ?>"> Modificar</a> <!-- update.php es el encargado de actualizar el registro con la id -->
                                    <a onclick="return confirm('Estás seguro que quieres borrar este usuario?');" href="../php/delete.php?id=<?php echo $rows['id'] ?>" class="btn btn-danger"> Eliminar</a><!-- Es lo mismo que php/delete.php?id=3 pero dinámico-->
                                </td>

                            </tr>

                        <?php
                        }  ?>

                    </tbody>
                </table>
            <?php endif; ?>
            <?php mysqli_close($conn); ?>
            <!-- CERRAR CONEXIÓN para liberar memoria  -->
            <div class="link-right">

              
                <a href="home_registro.php" class="btn btn-primary mt-3">Crear un nuevo usuario</a>
                <a href="home_registro.php" class="btn btn-primary mt-3"> Volver a inicio</a>
                <a href="../login/logout.php" class="btn btn-primary mt-3"> Cerrar sesión</a>



            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

</body>

</html>