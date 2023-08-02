<?php
if (isset($_GET['id'])) {
    // este fragmento de codigo vendra del fichero update.php, este trozo de codigo se encarga de la busqueda y posterior visualizacion del registro que queremos actualizar
    //si es por id el include debe estar dentro el if y es como si estuvieran las carpetas al lado
    include "../db_conn.php"; //no está fuera de porque este código se ejecuta en la carpeta update.php de fuera
    include "../funciones/funciones.php"; //Se ejecuta en la carpeta de fuera por lo que accedemos directamente a la carpeta funcions.

    $id = limpiar($_GET['id']); // primera limpieza
    $id = mysqli_real_escape_string($conn, $id); //segunda limpieza

    // preparar consulta que queremos hacer
    $sql = "SELECT * FROM users WHERE id=$id";
    // echo $sql;

    //hacer la consulta:
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) { //si el num de filas es mayor a 0:

        $row = mysqli_fetch_assoc($result); //$row en sigular poque normalemente solo encontrará 1 campo.
        //en row tengo los datos del registro a modificar. solo queremos modificar 1 registro

        // echo "<pre>";
        // print_r($row);
        // echo "</pre>";
    } else {
        header("Location:read.php");
    }
} elseif (isset($_POST['update'])) { //IMPORTANTE PONER NAME EN <button name="update">
    //Esta es la parte en la que realmente se actualiza el registro. AL SER POST ESTÁS --------- DENTRO --------- DE LA CARPETA

    //al ser POST es como seguir estando dentro de la carpeta, por eso hay que volver atrás para poder conectar con los includes
    include "../db_conn.php";
    include "../funciones/funciones.php";


    //primera limpieza
    $uname = limpiar($_POST['uname']);
    $name = limpiar($_POST['name']);
    $rol = limpiar($_POST['rol']);
    $turn = limpiar($_POST['turn']);
    $id = limpiar($_POST['id']);

    //echo    $uname.'-'.   $name.'-'.$rol.'-'.$turn;

    if (empty($uname)) {
        header("Location:../registro/update.php?id=$id&error=Falta el XXX");

    } elseif (empty($name)) {
        header("Location:../registro/update.php?id=$id&error=Falta el YYY");


    }elseif(empty($rol)){
        header("Location:../registro/update.php?id=$id&error=Falta el rol");

    } elseif(empty($turn)){
        header("Location:../registro/update.php?id=$id&error=Falta el turno");


    }else {
        //segunda limpieza
        $uname = mysqli_real_escape_string($conn, $uname);
        $name = mysqli_real_escape_string($conn, $name);
        $rol = mysqli_real_escape_string($conn, $rol);
        $turn = mysqli_real_escape_string($conn, $turn);

        $sql2 = "UPDATE users SET usuario='$uname', nombre='$name', rol='$rol',turno='$turn' WHERE id='$id'";

        echo "Consulta de actualización".$sql2;

        //Ahora actualiza la BBDD:
        $result = mysqli_query($conn, $sql2);
        if ($result) {

            header("location:../registro/read.php?success=Actualización correcta");
            exit;
        } else {
            header("location:../registro/update.php?id=$id&error=Ha habido un error");
        }
    }
} else {
    header("Location:read.php");
}







?>