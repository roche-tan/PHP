<?php
error_reporting(0);
$nom=$_GET['nom'];
$password=$_GET['password']; //cuando los datos sean password. SIEMPRE con POST

echo "Nom: $nom <br>";
echo "Password: $password <br>";

if($nom==="root" && $password==="root"){
    session_start();
    $_SESSION['autentificat']='si';
    date_default_timezone_set("Europe/Andorra"); //Declaro zona de tiempo
    $data_actual=date("Y-n-j H:i:s"); 
    echo $data_actual; //saca por pantalla 2022-6-27 14:10:17
    echo "<br>";
    echo strtotime($data_actual); //de un formato de hora lo pasa a números. 1656332397. Se necesita cuando se quiere restar tiempo del cronómetro (para el caso de querer poner X tiempo para estar en la sesión)
    $_SESSION['dataGuardada']=$data_actual;
    echo "<br>" .$_SESSION['dataGuardada'];

    header("refresh:2; url=manager.php"); //a los 2 segundos, se redirige a la página manager.php, que controlará la hora de la sesión usando la strtotime
}
else{
echo "<h2>Usuario no válido</h2>";
header("refresh:2; url=index.html"); //refresca la pag y ve a la pág inicial
}
