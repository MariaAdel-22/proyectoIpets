<?php

$con=mysqli_connect('us-cdbr-east-05.cleardb.net','be2cf74825313e','e459b73e','heroku_0c87bc892272e39') or die('Conexion fallida.'.mysqli_error($con));
$consulta="GRANT ALL heroku_0c87bc892272e39 TO username@'be2cf74825313e' IDENTIFIED BY 'e459b73e'";
mysqli_query($con,$consulta);
?>
