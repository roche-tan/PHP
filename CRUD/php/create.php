<!-- Se encargará de crear los usuarios  -->

<?php
session_start();
if(isset($_POST['create'])){ //si se ha dado al botón create de home_registro.php:
    include "../db_conn.php"; // incluir connexión BBDD
    include "../funciones/funciones.php"; //añadir función limpieza

    //asignamos variables
    $uname=limpiar($_POST['uname']);
    $name=limpiar($_POST['name']);
    $rol=$_POST['rol'];
    $turn=$_POST['turn'];
    
    $user_data='usuer='.$uname.'&name='.$name.'&rol='.$rol.'&turn='.$turn;

    if(empty($uname)){
        header("Location:../registro/home_registro.php?error=Hace falta poner tu usuario&$user_data");

        exit;
    }elseif(empty($name)){
        header("Location:../registro/home_registro.php?error=Hace falta poner tu nombre&$user_data");
      
        exit;

    }elseif(empty($rol)){
        header("Location:../registro/home_registro.php?error=Hace falta poner tu rol&$user_data");

        exit;

    }elseif(empty($turn)){
        header("Location:../registro/home_registro.php?error=Hace falta poner tu turno&$user_data");
   
        exit;

    }else{
        $uname=mysqli_real_escape_string($conn,$uname);
        $name=mysqli_real_escape_string($conn,$name);
        $rol=mysqli_real_escape_string($conn,$rol);
        $turn=mysqli_real_escape_string($conn,$turn);

        $sql2="INSERT INTO users (usuario, nombre, rol, turno) VALUES ('$uname','$name','$rol','$turn')";
        echo $sql2;
        
        //echo $sql; PROBAR QUE RECIBE LA CONSULTA
        
        $result=mysqli_query($conn,$sql2);

        if($result){
            header("location:../registro/read.php?success=El usuario se ha insertado correctamente");
            exit;
        }else{
            header("location:../registro/home_registro.php?error=Ha habido un error");
            echo "estas aquí";
            exit;
        }
    }

}

?>