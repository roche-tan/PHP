<?php
session_start();

//echo "estás a punto de borrar un registro";

if(isset($_GET['id'])){
    include "../db_conn.php"; //la bbdd está fuera de esta carpeta
    include "../funciones/funciones.php";

    $id=limpiar($_GET['id']);  //limpiar porque al ser metodo GET, se ve en el navegador y se podría modificar
    $id=mysqli_real_escape_string($conn,$id);  // se vuelve a limpiar y se puede hacer la consulta

    //consulta SQL
    $sql="DELETE FROM users WHERE id=$id"; //importante poner la variable id, sino no borrará la que queramos
    $result=mysqli_query($conn,$sql);
    mysqli_close($conn); //cerramos sesión para liberar memoria
    
    // echo $result;
    // die();  
    if($result){
        header("Location:../registro/read.php?success=Usuario eliminado correctamente");
        exit;
    }else{
        header("location:../registro/read.php?error=Ha ocurrido un error");
        exit;
    }
}

?>