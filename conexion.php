<?php
	$hn="localhost";
	$un="root";
	$pw="";
	$db="maicolprogramacionwebbd";
	$port ="3360";
	$conexion = mysqli_connect($hn, $un, $pw, $db, $port);
	if($conexion->connect_error) die("fallo al conectar con la base de datos");
?>
