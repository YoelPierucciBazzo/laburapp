<?php
include("conexion.php");

$usuario = $_POST['usuario'];
$clave = $_POST['clave'];

$solicitud = "SELECT * FROM usuarios WHERE usuario = '$usuario' AND clave = '$clave'";
$resultado = mysqli_query($conexion, $solicitud);
$cantFilas = mysqli_num_rows($resultado);

if($cantFilas == 1){
    header("location:menu.html");
} else{
    echo "Usuario o Constraseña erroneos";
    echo "<input type='button' value='Volver' onClick='location=\"index.html\"'>";
}

mysqli_close($conexion);

?>