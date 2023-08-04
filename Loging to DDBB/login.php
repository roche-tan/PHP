<?php

session_start(); //quiero utilizar session y hay que habilitarlo primero
include 'db_conn.php'; //llamar el fichoero externo para incorporarlo en esta página

if (isset($_POST['uname']) && isset($_POST['password'])) {
    function neteja($data)
    { //declaro función
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);

        return $data; //llamo función
    }
    $uname = neteja($_POST['uname']);
    $password = neteja($_POST['password']);
    if (empty($uname) || empty($password)) { //si el campo ususario está vacío:
        header("Location:index.php?error=Nombre de ususario o contraseña no válidos");
        exit();
    } else {
        //hacer limpieza MySQL y consultar a ver su existe usuario con esta contraseña

        $uname = mysqli_real_escape_string($conn, $uname);
        $password = mysqli_real_escape_string($conn, $password);

        //La consulta sera:
        $sql = "SELECT * FROM users WHERE user_name='$uname' AND password='$password'";
        //echo"Consulta realizada: ".$sql; //comprobar que la consulta sale bien

        $result = mysqli_query($conn, $sql); // realizar CONSULTA en una bbdd.
        //compruevo si existe este usuario con esta contraseña

        if (mysqli_num_rows($result) === 1) { // Obtiene el número de filas de un resultado. Si el num de filas es 1 es que existen los datos. son estrictamente iguales. Cuantas filas cumplen la consulta $result
            //en el caso que sea una(1) fila, uiere decir que el usuario y la contraseña son las correctas. Si no son correctas, apareceran cero(0) filas

            $row = mysqli_fetch_assoc($result); //devolvera los resultados como un array asociativo
            // echo "<pre>";
            // echo print_r($row);
            // echo "</pre>";

            if ($row['user_name'] === $uname && $row['password'] === $password) { //Comparo el contenido con lo que tengo en el formulario
                //usuario y contraseña correctos. CASE SENSIIVE
                // echo "Usuario y contraseña correctos";
                $_SESSION['user_name'] = $row['user_name']; //crear variable de sesión
                $_SESSION['name'] = $row['name'];
                $_SESSION['id'] = $row['id'];

                // echo "Nombre de usuario: ".$_SESSION['user_name'];
                // echo "<br>Tu nombre es: ". $_SESSION['name'];
                // echo "<br>Tu ID es: ".$_SESSION['id'];

                header("Location:home.php"); //nos vamos a la pagina "protegida" home.php

            } else {
                header("Location:index.php?error=Nombre de ususario o contraseña no válidos");
                exit();

                // echo "Usuario o contraseña incorrectos";
            } //hasta aquí se programa solo el resultado admin & admin. Abajo se comprobará si se introduce algun dato fuera de admin

        } else {
            //no se ha encontrado ninguna coincidencia en la base de datos
            header("Location:index.php?error=Nombre de ususario o contraseña no válidos");
            exit();
        }
    }
} else {
    //Intentas acceder directamente a esta página
    header("Location:index.php");
    exit();
}
