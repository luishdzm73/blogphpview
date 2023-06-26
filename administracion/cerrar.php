<?php session_start();//mandando a llamar a la funcino session estar para trabajar con sesiones

session_destroy();//funcion session destry para cerrar la session o destruir la session
$_SESSION=array();//la variable SESSION sera igual al arreglo al decirle que era un arreglo en blaco es como decirle que lo estamos reiniciando

header('Location: ../');//redirigimos al location y a un directorio hacia atras
die();//matamos la ejecucion de la pagina


?>