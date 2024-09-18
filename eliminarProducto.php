<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ELIMINAR PRODUCTO</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body class="inicio">
    <div class="formulario centrar" >
    <form action="eliminarProducto.php" method="post">
    <h1 class="textoTitulo">SELECCIONAR PRODUCTO A ELIMINAR</h1>
    <label class="textoSecundario" for="producto">Ingrese nombre del producto:</label>
    <input type="text" name="producto" required autofocus> <br> <br>
    <input class="boton" type="button" value="Volver" onclick="location='menu.html'">
    <input class="boton" type="reset" value="Borrar">
    <input class="boton"  type="submit" name="enviar" value="Buscar">
    </form>

<?php
if(isset($_POST['enviar'])){
include("conexion.php");
$producto = $_POST["producto"];
$consulta = "SELECT * from productos where nomProducto = '$producto'";
$respuesta = mysqli_query($conexion,$consulta);
if($fila = mysqli_fetch_row($respuesta)){
    echo "<h1 class='textoTitulo'>Producto a eliminar</h1>";
    echo "<form method='post' action='eliminarProducto.php'>";
    echo "<input name='codigo' type='hidden' value='".$fila[0]."' readonly=true />";
    echo "Nombre: <input id='nombre' type='text' name='nombre' value='".$fila[1]."' disabled=true />";
    echo "<br>";
    echo "Precio: <input id='precio' type='text' name='precio' value='".$fila[2]."' disabled=true />";
    echo "<br>";
    echo "Stock: <input id='stock' type='text' name='stock' value='".$fila[3]."' disabled=true />";
    echo "<br>";
    echo "<input class='boton' type='submit' name='enviado' value='Eliminar'/> ";
	echo "</form>";
    } else{
    echo "<h3 class='textoSecundario'> El Producto $producto no existe</h3>";
}
mysqli_close($conexion);
}
?>


<?php
if(isset($_POST['enviado'])){
include("conexion.php");
$codigo = $_POST['codigo']; 
$consulta = "DELETE FROM productos WHERE codProducto = '$codigo'";
if (mysqli_query($conexion, $consulta )){
        if (mysqli_affected_rows($conexion) > 0) {
        echo "<h3 class='textoTitulo'>El producto ha sido eliminado</h3>";
        echo "<input class='boton' type='button' value='Volver' onClick='location=\"menu.html\"'> ";
}else 
{       echo "<h3 class='textoTitulo'>No se borraron productos</h3> ";
        echo "<input class='boton' type='button' value='Volver' onClick='location=\"menu.html\"'> ";
}
}
mysqli_close($conexion);
}
?>

</body>
</div>
</html>