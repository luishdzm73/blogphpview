<?php 

require 'administracion/config.php';//trallendo el archivo config.php pero ponemos la carpeta en la que esta en este caso administracion.

require 'functions.php';//mandando a llamar a la function.php

$conexion = conexion($bd_config);
if (!$conexion) {//comprobando conexion si no hay conexion..
	header('Location: error.php');//dirigeme al archivo error.php
}

$posts = obtener_post($blog_config['post_por_pagina'], $conexion);//obteniendo los posts mediante una funcion y sus respectivos parametros en este caso los post por pagina y como segundo parametro la conexion, revisa el archivo function.php

if (!$posts) {//con este condicional si no hay post mandame un error
	header('Location: error.php');
}

require 'views/inde.view.php';


?>