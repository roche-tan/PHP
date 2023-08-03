<?php
error_reporting(0);
session_start(); //habilito variable de sesión. Necesario hacerlo SIEMPRE en cada sesión

echo $_SESSION['autentificat'];
define("Tmax", 40); //defino una constante, tiempo máx en segundos. Sustituirá "Tmax" por "40"
date_default_timezone_set("Europe/Andorra");//Declaro zona de tiempo
echo "Estas autentificado?" .$_SESSION['autentificat']. "<br>";
if(isset($_SESSION['autentificat']) && $_SESSION['autentificat']='si'){ //se ha puesto algo? (isset) y encima es correcto
    //si eres de los buenos
    $dataGuardada=strtotime($_SESSION['dataGuardada']); //1656332397. strtotime lo pasa a sring
    echo $dataGuardada; //saca por pantalla 2022-6-27 14:10:17
    echo "<br>";
    // echo strtotime($dataGuardada); //Saca por pantalla 1656332397. mismo que lo anterior pero lo pasa a string para poder calcular mejor la hora
    $ara=strtotime(date("Y-n-j H:i:s")); //esta fecha irá cambiando y 'dataGuardada' será fija. Estos 2 datos serán los que se usarán para calcular el tiempo de la sesión
    echo "<br>";
    echo "Ahora son las $ara";
    echo "<br>";
    echo "1. Marca inicial de tiempo: $dataGuardada";
    echo "<br>";
    echo "2.- Marca actual de tiempo: $ara";
    echo "<br>";
    $temps_transcorregut=$ara-$dataGuardada;
    echo "3.- Tiempo transcurrido: $temps_transcorregut s";
    echo "<br>";
    echo "4.- Cerraré la sesión a los " .Tmax. "s ";
    header("refresh:1");//para ver como evoluciona el tiempo (contador)
    if($temps_transcorregut>Tmax){ //si ha pasado el tiempo máx de sesión
        echo "<br>";
        echo "Cerraré la sesión a los 3 segundos";
        //Cierro sesión
        session_unset(); //libero las variables de sesión
        session_destroy(); //destruyo los datos de sesión
        header("refresh:3; url=sessioTancada.html"); //cuando pasen los 40s, en 3 segundos redirige a otro fichero
        return false;
    }
    else{ //estoy dentro y no ha pasado el tiempo máximo
        $_SESSION['ultimAccess']=$dataGuardada;
        echo "<br>";
        echo "<hr>";
        echo "<br>";
        echo "***************** Estoy dentro *****************";
        echo "<br>";
        echo "Último acceso: $dataGuardada";
    }
}else{ //si no te has autentificado de forma correcta
    echo "Nombre de usuario o contraseña incorrecta";
    header("refresh:5; url=index.html");
    return false;
}


?>