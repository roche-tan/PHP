<?php 
if(isset($_POST['enviar']) && isset($_FILES['mi_video'])){
    // echo "<pre>";
    // print_r($_FILES['mi_video']);
    // echo "</pre>";

    $vid_name = $_FILES['mi_video']['name'];
    echo "Nombre de mi imagen: $vid_name";
    $vid_size =  $_FILES['mi_video']['size'];
    echo "<br>La imagen tiene un peso en bytes de: " . $vid_size . " B";
    $tmp_name = $_FILES['mi_video']['tmp_name'];
    echo "<br>Nombre provisional de mi imagen: $tmp_name";
    $error = $_FILES['mi_video']['error'];

    $name = pathinfo($vid_name);
    echo "<br>Nombre de la imagen es: " . $name['filename']; 
    $nameVideo = $name['filename'];

    if($error === 0){
      
        if($vid_size > 5242880000){
            $em = "Disculpa, el video pesa demasiado";
            echo $em;
            header("Location:index.php?error=$em");    
        }
        else{
            $vid_ext = pathinfo($vid_name, PATHINFO_EXTENSION);
            $vid_ext_minus = strtolower($vid_ext);
            $ext_permit = array("mp4","avi", "mov", "wmv", "mkv", "flv");
            if(in_array($vid_ext_minus, $ext_permit)){
                $new_vid_name = $nameVideo.'-'.time().'.'.$vid_ext_minus;
                $vid_upload_path = 'uploads/'.$new_vid_name;
                move_uploaded_file($tmp_name, $vid_upload_path);
            } 
            else{
                $em = "No puedes subir este tipo de fichero";
                echo $em;
                header("Location:index.php?error=$em");
            }
        }
    }else{
        $em = "Selecciona una imagen";
        echo $em;
        header("Location:index.php?error=$em");
}
} else {
    $em="Error";
    echo $em;
    header("Location:index.php");
}
