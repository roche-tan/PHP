<?php
//Establecer la conexión con una base de datos - en este caso no tenemos-

if (isset($_POST['uname']) && isset($_POST['password'])) {

    function limpia($dato)
    { //"limpia" lo campos a rellenear

        $dato = trim($dato); //quitar espacios en blanco
        $dato = stripslashes($dato); //si hay contrabarras
        $dato = htmlspecialchars($dato); //si hay entidades html 

        return $dato;
    }

    $uname = limpia($_POST['uname']);
    $password = limpia($_POST['password']);

    if (empty($uname)) { //Si esta vacio el user name:
        header("location: index.php?error=tienes que poner el nombre de usuario"); //vete al archivo X y le tienes que poner
        exit(); //abandona este programa
    } else if (empty($password)) {
        header("location: index.php?error=tienes que poner la contraseña"); //vete al archivo X y le tienes que poner
        exit();
    } else {
        //el usuario ha introducido correctamente el nombre de usuario y contraseña
        //comparar los datos del formulario con una base da datos
        if ($uname === 'admin' && $password === 'admin') {
            //eres de los buenos
            header("Location:home.php");
            exit();
        } else {
            //te has quivocado a la hora de introducir el nombre de usuario o contraseña
            header("Location:index.php?error=Usuario o password incorrecto");
            exit();
        }
    }
} else {
    header("Location: index.php");
    exit();
}
