<?php 

require 'administracion/config.php';
require 'functions.php';

$conexion = conexion($bd_config);//cargaremos el articulo de la base de datos osea que nos conectaremos con eso usamos la variable conexion igualado a $bd_config y la guardamos en la variable conexion.
$id_articulo = id_articulo($_GET['id']);//obtendremos el id del articulo crearemos una funcion nueva llamada id_articulo con la variable get y dentro el id. revisa las funciones
if (!$conexion) {//si no hay conexion enviame a la pagina de error
	header('Location: error.php');
}

if(empty($id_articulo)) {//si esta vacio ese articulo, vamos a enviar al archivo header a location index.php
	header('Location: index.php');
}

$post = obtener_post_por_id($conexion, $id_articulo);//esta funcion obtendra el post de la base de datos dependiendo de su id le pasaremos 2 parametros l conexion y el id del articulo
if(!$post) {//si no hay post redirige al usuario al index.php osea si pone post 100 y no hay nos mandara al index
	header ('Location: index.php');
}

$post = $post[0];//post va a ser igual a post en su posicion 0, esto es porque dentro de post tenemos un areglo y dentro otro arreglo pero el arreglo de la posicion 0

require 'views/single.view.php';//mandando a llamar al archivo single.view.php


?>