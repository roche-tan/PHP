<?php
session_start();
//controlaremos los datos introducidos en el formulario para ADMIN
include '../db_conn.php';
include '../funciones/funciones.php';

if (isset($_POST['email']) && isset($_POST['re_password']) && isset(($_POST['re_password']))) { //lo mismo que !empty

    //-------------------------- LIMPIAR DATOS --------------------------

    //la función neteja se ha descrito en funcions.php y se ha incluido al inicio de esta página
    $email = limpiar($_POST['email']);
    $password = limpiar($_POST['password']);
    $re_password = limpiar($_POST['re_password']);

    // CHECK de que hace la función. En producción se elimina
    // echo "<br>Nombre completo: ".$email;;
    // echo "<br>Password: ".$password;
    // echo "<br>Re-password: ".$re_password;

    // //Preparo la comprobación de errores:
    $user_data = 'email=' . $email . '&password=' . $password;

    //Compruebo formulario de registro... campo por campo
    if (empty($email)) {
        header("location:signup.php?error=Falta el email&$user_data");
        exit();
    } elseif (empty($password)) {
        header("location:signup.php?error=Falta password&$user_data");
        exit();
    } elseif (empty($re_password)) {
        header("location:signup.php?error=Falta la confirmación del password&$user_data");
        exit();
    } elseif ($password !== $re_password) {
        header("location:signup.php?error=Las contraseñas no coinciden&$user_data");
        exit();
    } else {
        //si se completado el formulario correctamente
        //Miro a ver si este usuario ya existe en la BBDD
        $sql = "SELECT * FROM admin WHERE email='$email'"; //selecciona todos los campos de la tabla users mientras se cumpla la condicion: el nombre de usuarios de la BBD ya existe
        $result = mysqli_query($conn, $sql);
        //echo "<br>".$sql;

        if (mysqli_num_rows($result) > 0) { //cuantas filas cumplen esta condición
            header("location:signup.php?error=Este email ya existe&$user_data");
            exit();
        } else {
            //si he pasdo todos los filtros anteriores
            //cifrar la contraseña y añadir usuario a la BBDD
            $passCif = cifrar($password);
            //echo "<br>Contraseña inicial: ".$password;
            //echo "<br>Contraseña cifrada: ".$passCif;

            // // SIEMPRE que insertemos en una BBDD haciendo uso de MySQL. Filtrar por SQL. Segundo cifraje después de el de "nateja"
            $email = mysqli_real_escape_string($conn, $email);
            $password = mysqli_real_escape_string($conn, $password);
            
            $_SESSION['email'] = $_POST['email'];
            $_SESSION['password'] = $_POST['password'];

            $sql2 = "INSERT INTO admin (email, password) VALUES ('$email','$passCif')"; //insert en la tabla que se llama users con esta estructura:(name, user_name, password) los VALORES ('$variable','$variable','$variable');
            //echo $sql2; //Para probar antes de que se inserte automáticamente, copiar lo que aparece en pantaña y añadir en MyPHPAdmin en SQL

            //AÑADIMOS A LA BBDD
            $result2 = mysqli_query($conn, $sql2);
            if ($result2) { //if($result2==true) se ha podido insertar la nueva cuenta del usuario
                header("location:signup.php?success=Se ha creado correctamente la cuenta");
                exit();
            } else { //no se ha podido generar la cuenta
                header("Location:signup.php?error=Por alguna causa ha ocurrido un error&$user_data");
                exit();
            }
        }
    }
} else {
    echo "Faltan datos";
}
