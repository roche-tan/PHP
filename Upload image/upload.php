<?php

if(isset($_POST['enviar']) && isset($_FILES['mi_img'])) {

    echo "<pre>";
    print_r($_FILES['mi_img']); //print array
    echo "</pre>";

    $img_name = $_FILES['mi_img']['name'];
    $img_size = $_FILES['mi_img']['size'];
    $tmp_name = $_FILES['mi_img']['tmp_name'];
    $error = $_FILES['mi_img']['error'];
    $nom = pathinfo($img_name);
    $nomImatge = $nom['filename'];

    if ($error === 0) {
        if($img_size>200000){
            $em="Disculpa, la imagen pesa demasiado";
            header("Location:index.php?error=$em");
        }
        else{
            $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
            $img_ex_minus = strtolower($img_ex);
            $ext_permeses = array("jpeg", "jpg", "png");
            if (in_array($img_ex_minus, $ext_permeses)) {
                $new_img_name = $nomImatge . '-' . time() . '.' . $img_ex_minus;
                $img_upload_path = 'uploads/' . $new_img_name;
                move_uploaded_file($tmp_name, $img_upload_path);
            } else {
            echo "No puedes subir este tipo de fichero";
            $em="No puedes subir este tipo de fichero";
            header("Location:index.php?error=$em");
            }
        } 
    }else {
        $em="Selecciona una imagen";
        echo "Selecciona una imagen";
        header("Location:index.php?error=$em");
    }
} else {
    echo "estas aquí";
    header("Location:index.php");
}
