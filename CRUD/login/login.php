<?php
session_start();
include '../db_conn.php'; //llamar el fichero externo para incorporarlo en esta página
include '../funciones/funciones.php';


if(isset($_POST['email']) && ($_POST['password'])){
    
    $email=limpiar($_POST['email']);
    $password=limpiar($_POST['password']);



    if(empty($email)){
        header("Location:index.php?error=Nombre de ususario o contraseña no válidos");
        exit();
    }elseif(empty($password)){
        header("Location:index.php?error=No has puesto contraseña&email$email"); //el password tiene que estar vacío, si hay algo, no funciona
        exit();
    }else{
        //hacer limpieza MySQL y consultar a ver su existe email con esta contraseña
        

        $email = mysqli_real_escape_string($conn, $email);
        $password = mysqli_real_escape_string($conn, $password);
        
        $_SESSION['email']=$email;
        $_SESSION['password']=$password;

        //La consulta sera:

        $sql = "SELECT * FROM admin WHERE email='$email'"; 
        // $sql = "SELECT * FROM admin WHERE email='$email' AND password='$password'"; 
        
        //echo  $sql;

        $result = mysqli_query($conn, $sql); // realizar CONSULTA en una bbdd.
        //compruebo si existe este usuario con esta contraseña

        if(mysqli_num_rows($result)===1){

            //EXISTE USER

            $row=mysqli_fetch_assoc($result);
             
            // echo "<pre>";
            // echo print_r($row);
            // echo "</pre>";

            //CIFRAR PRIMERO CONTRASEÑA EN SIGNUP-CHECK
            if(password_verify($password,$row['password'])){ 
                //compara/verifica la contraseña de la pag web del usuario
                //se mira si $row['password'] está en las bbdd y se confirma que coincida con la contraseña que se ha escrito en la web usando PASSWORD_VERIFY
                // if ($row['user_name'] === $uname && $row['password'] === $password) { //Comparo el contenido con lo que tengo en el formulario. Esto en el caso de que la contraseña no esté encriptada

                //usuario y contraseña correctos. CASE SENSIIVE
                header("location:../registro/home_registro.php"); //vamos a la página donde tenemos el formulario
           
            }else {
                
          header("Location:index.php?error=Nombre de ususario o contraseña no válidos");
                exit();
            }
        }else {
            //no se ha encontrado ninguna coincidencia en la base de datos
            header("Location:index.php?error=Nombre de ususario o contraseña no válidos");
            exit();
        }
            

        

    }

}else {
    //Intentas acceder directamente a esta página
    header("Location:index.php");
    exit();
}
