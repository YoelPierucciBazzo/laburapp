<?php

    include ("parametros.php");
    
	$conexion = mysqli_connect($db_host, $db_usuario, $db_pass);

	if (mysqli_connect_errno()) {
		echo "No se puede conectar con el servidor";
		exit();
	}

	mysqli_select_db($conexion, $db_nombre) or die ("No se puede conectar a la BBDD");

	mysqli_set_charset($conexion, "utf8");
	
?>