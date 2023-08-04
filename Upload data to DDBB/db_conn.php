<?php
    $sname='localhost'; //server name(sname) en este caso. Nombre del servidor de la BD
        $uname='root';      //nombre del usuario de la BD
        $password='';       //contraseña del usuario
        $db_name='testdb';  //nombre de la base de datos

        //establecer una conexión con la basede datos
        $conn=mysqli_connect($sname, $uname, $password,$db_name);
        //$conn es el nombre que le hemos dado a la connexión establecid con l BD
        if(!$conn){
            echo "no se ha podido hacer la connexión";
        }else{
            echo "Sí que hemos podido conectarnos a la BD";
        }
?>