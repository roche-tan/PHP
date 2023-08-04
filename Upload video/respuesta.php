<?php
// [...] 
if (in_array($img_ex_minus, $ext_permeses)) {

    //esta dentro de este array la extension que me has hecho llegar?.
    //Si la extensión de la imagen está dentro del array
    $new_img_name = $nomImatge . '-' . time() . '.' . $img_ex_minus;
    echo "<br>Nuevo nombre de la imagen: $new_img_name"; //pez-1657021444.png
    $img_upload_path = 'uploads/' . $new_img_name; //indico la ruta donde dejaremos la imagen (en este caso se ha creado la carpeta uploads)
    move_uploaded_file($tmp_name, $img_upload_path); //mueve el archivo a la carpeta temporal a la carpeta definitiva
    if(!is_file('uploads/'.$vid_name)){
        $new_vid_name=$vid_name;
    }
    else{
        $new_vid_name=$nameVideo.'-'.time().'.'.$vid_ext_minus;
        echo"<br> Nuevo nombre de la imagen".$new_vid_name;
    }
    $img_upload_path= 'uploads/'.$new_vid_name;
    move_uploaded_file($tmp_name, $img_upload_path);

} else {
    $em = "No puedes subir este tipo de fichero";
    header("Location:index.php?error=$em");
}
// [...] 
?>