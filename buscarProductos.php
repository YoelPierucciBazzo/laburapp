<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BUSCAR PRODUCTOS</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body class="inicio">
<div class="formulario">
<form  action="buscarProductos.php" method="get">
<h1 class="textoTitulo">Buscar productos</h1>
        <label class="textoSecundario" for="prod">Ingrese producto a buscar:</label>
        <input type="text" name="prod" autofocus><br> <br>
        <input class="boton" type="submit" value="Buscar" name="enviar">
        <input class="boton" type="reset" value="Borrar">
        <input  class="boton" type="button" value="Volver" onclick="location='menu.html'">
        </form>
<?php
include("conexion.php");
if(isset($_GET['enviar'])){
$prod = $_GET['prod'];
$pregunta = "SELECT * FROM productos WHERE nomProducto LIKE '%$prod%'";
$respuesta = mysqli_query($conexion, $pregunta);
$contFila = mysqli_num_rows($respuesta);
if($contFila == 0){
    echo "<h3 class='textoSecundario'>No existe el producto que desea buscar</h3>";
}else{
    echo "<table class='formulario'>";
    echo "<tr>";
    echo "<th class='textoSecundario'>Código</th>";
    echo "<th class='textoSecundario'>Nombre</th>";
    echo "<th class='textoSecundario'>Precio</th>";
    echo "<th class='textoSecundario'>Stock</th>";
    echo "</tr>";
    while($contFila = mysqli_fetch_assoc($respuesta)){
        echo "<td class='textoSecundario'>".$contFila['codProducto']."</td>";  
        echo "<td class='textoSecundario'>".$contFila['nomProducto']."</td>";
        echo "<td class='textoSecundario'>".$contFila['precio']."</td>";
        echo "<td class='textoSecundario'>".$contFila['stock']."</td>";  
        echo "</tr>";
    }
    echo "</table>";
}
mysqli_close($conexion);
}
?>
        </div>
</body>
</html>