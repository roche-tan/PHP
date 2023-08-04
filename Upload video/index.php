<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload video</title>
    <style>

        body{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            min-height: 100vh;
            background-color: #0ffff8;
        }
        h2{
            color: #0842c0;
        }
        .error{
            background-color: #ffa4a8;
            border: 1px solid red;
            color: darkred;
            font-weight: bolder;
            padding: 0.5rem;
            box-shadow: 2px 2px 2px grey;
            
        }
</style>
</head>

<body>
    <?php if (isset($_GET['error'])) : ?>

        <p class="error"> <?php echo $_GET['error']; ?> </p>

    <?php endif ?>

    <h2>Subir un video al servidor sin que esté repetido</h2>

    <h4>Subir video que:</h4>
    <ul>
        <li>No se haya subido antes</li>
        <li>Máximo 5MB</li>
        <li>Si el vídeo ya existe, cambiar el nombre</li>
    </ul>

    <form action="upload_video_normal.php" method="post" enctype="multipart/form-data">
        <input type="file" name="mi_video" id="">
        <br>
        <input type="submit" value="Upload" name="enviar">

    </form>
</body>

</html>