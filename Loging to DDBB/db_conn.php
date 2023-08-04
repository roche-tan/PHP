<?php

$sname='localhost';
$uname='root'; //en local
$password='';
$db_name='testdb';//nombre de la bbdd NO la tabla

$conn=mysqli_connect($sname,$uname,$password,$db_name);

if(!$conn){ //si no se ha podido realzar la connexión con la bbdd

    echo "no se ha podido realizar la conexión con la BBDD";
    exit();
}
?>