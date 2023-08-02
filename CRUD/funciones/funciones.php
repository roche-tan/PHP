<?php

function limpiar($datos){
    $datos=trim($datos);
    $datos=stripslashes($datos);
    $datos=htmlspecialchars($datos);
    return $datos;
}

function cifrar($datos){

    $password_cifrado=password_hash($datos,PASSWORD_BCRYPT,['cost' =>10]);
    return $password_cifrado;
    //PASSWORD_BCRYPT cifra la contraseña
}

?>

