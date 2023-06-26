<?php session_start();//ejecutando la funcion sessiones para trabajar con sessiones

//archivo index del admin

require 'config.php';//mandando a llamar al config
require '../functions.php';//retocediendo una carpeta y llamando al archivo fuction.php

$conexion = conexion($bd_config);//igualamos la variable conexion a la conexion y pasamos como parametro la bd_config(revisa config.php) esto nos sirve para poner utilizar los post en la vista del index del administrador

comprobarSession();//llamando la funcion comprobarsession revisa el archivo function.php

if (!$conexion) {//si no hay conexion
	header('Location: ../error.php');// retrocedemos una carpeta y vamos al archivo de error para mandar un error
}

$posts = obtener_post($blog_config['post_por_pagina'], $conexion);//igualar la vaiable post con la funcion obtener post y pasamos de parametros la el arrelo blog_config con el valor post pot pagina y como segundo parametro la conexion.


require '../views/admin_index.view.php';


?>