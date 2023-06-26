<?php session_start();//incluye la funcion session star porque trabajaremos con sesiones

require 'administracion/config.php';//mandando a llamar a la configuracion
require 'functions.php';//madando a llamar a las funciones

if ($_SERVER['REQUEST_METHOD'] == 'POST') {//si los datos se envian al mismo archivo con requestmethod entonces si es igual igual a post significa que ya se enciarios y si ya se enviario recibelos en usuario y password
	$usuario = limpiarDatos($_POST['usuario']);//usuario igual a la funcion limpiar dato y la variable post y el valor usuario
		$password = limpiarDatos($_POST['password']);//usando la variable password igualandola a limpiar datos y la variable post con el valor password
		if ($usuario == $blog_admin['usuario'] && $password == $blog_admin['password']) {//si usuario es igual al usuario que ponemos y es igual a la contrasena (todo eso esta en la variable blog_afmin revida esl config.php)
			$_SESSION['admin'] = $blog_admin['usuario'];//entonces crea la session ponemos.
			header('Location: ' . RUTA . '/administracion');//redirige a la ruta y concatena la ruta y la carpeta admin
			
		}

}

require 'views/login.view.php';


 ?>