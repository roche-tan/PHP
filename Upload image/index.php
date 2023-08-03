<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php if (isset($_GET['error'])) : ?>
        <p class="error"> <?php echo $_GET['error']; ?> </p>
    <?php endif ?>

    <h2>Sube una imagen al servidor</h2>

    <form action="upload_corregido.php" method="post" enctype="multipart/form-data">
        <input type="file" name="mi_img" id="">
        <input type="submit" value="Upload" name="enviar">
    </form>
</body>

</html>