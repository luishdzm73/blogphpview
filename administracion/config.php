<?php 

define('RUTA', 'http://localhost/Curso_php/practicas/blog');//esto es para tener la ruta disponible y despues enviar los archivos a la ruta principal

$bd_config = array(//variable base de datos configuracion(db_config) dentro de ella tiene un arreglo que guarda la base de datos, el usuario y la contraseña
'basedatos' => 'blog_practicas',//nombre de la base de datos
'usuario' => 'root',// nombre de usuario
'pass' => ''//contrasena
);

$blog_config = array(//variable configuracion de blog igual a un arreglo se le pondra los post pot pagina que queremos mostrar
'post_por_pagina' => '2',//post pot pagina que queremos mostrar
'carpeta_imagenes' => 'imagenes/'//carpeta de las imagenes importante agregar la diagonal
);

$blog_admin = array(//guardando los datos del administrador usuario y contrasena lo hacemos asi para no complicar las cosas osea crear una base de datos y traerla desde ahi, por esa razon para esta practica lo haremos de esta forma con un arreglo
'usuario' => 'Carlos',//usuario de administrador
'password' => '123'//constrasena de administrador

);


 ?>