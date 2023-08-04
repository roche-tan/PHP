<?php

if(isset($_POST['nom']) && isset($_POST['missatge'])){
    include 'db_conn.php'; //incluir el archivo db_conn.php
    
    // echo "Nombre: ".$_POST['nom'];
    // echo "<br>";
    // echo "Mensaje: ".$_POST['missatge'];

    function neteja($data){
        $data=trim($data);
        $data=stripslashes($data);
        $data=htmlspecialchars($data);
        
        return $data;
    }

    $nom=neteja($_POST['nom']);
    $missatge=neteja($_POST['missatge']);

    if(empty($nom)|| empty($missatge)){
        echo "Después de la limpieza no queda nada";
        header("Location:index.html");
    } else{
        //Conexion e insersión a los campos de la base de datos a través de db_conn.php

        $sql="INSERT INTO test (name,message) VALUE ('$nom','$missatge')";//insert en la tabla test X y guarda...
        // echo "<br>Instrucción SQL enviada: $sql";
        mysqli_query($conn,$sql);
        
    }

}else{
    header("Location:index.html");
}

?>