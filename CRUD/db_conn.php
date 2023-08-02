<?php
$sname='localhost';
$uname='root';
$password="";
$db_name='empresa';

$conn=mysqli_connect($sname,$uname,$password,$db_name);

mysqli_set_charset($conn,"utf8mb4"); // para formzar los accentos. En el caso de que no aparezcan los acentos, con esto, se forzarán y saldrán

if(!$conn){
    echo "Error de conexión con la BBDD";

    exit;
}

?>