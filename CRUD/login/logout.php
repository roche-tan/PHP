<?php
//siempre que se genere una pág el último paso es borrar/eliminar todo
session_start();
session_unset();
session_destroy();

header("location:index.php?success=Has cerrado sessión");
?>