<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>REGISTAR UN PRODUCTO</title>
</head>
<body class="inicio">
    <div  class="formulario">
    <form action="registrarProducto.php" method="post">
    <h1 class="tituloPrinicipal">REGISTRAR UN PRODCUTO</h1>
        <label class="textoSecundario" for="nomProduct">Ingresar nombre:</label>
        <input type="text" name="nomProduct" minlength="3"> <br> <br>
        <label class="textoSecundario" for="precio">Ingresar precio:</label>
        <input type="text" name="precio"> <br> <br>
        <label class="textoSecundario" for="stock">Ingresar stock:</label>
        <input type="text" name="stock"> <br> <br>
        <input class="boton" type="submit" value="Registrar" name="enviar">
        <input class="boton" type="reset" value="Borrar">
        <input class="boton" type="button" value="Volver" onclick="location='menu.html'">
    </form>
    <?php
    if(isset($_POST['enviar'])){
    include("conexion.php");
    $nomProduct = $_POST['nomProduct'];
    $precio = $_POST['precio'];
    $stock = $_POST['stock'];
    $consulta = "SELECT * FROM productos WHERE nomProducto='$nomProduct'";
    $respuesta = mysqli_query($conexion,$consulta);
    $filas = mysqli_num_rows($respuesta);
    if($filas == 1){
        echo "<br>";
        echo "<h3 class='textoSecundario'>El producto a registrar ya existe</h3>";
    } else{
    $sql = "INSERT INTO productos (nomProducto,precio,stock) VALUES ('$nomProduct', '$precio' , '$stock')";
    mysqli_query($conexion,$sql);
    echo "<br>";
    echo "<h3 class='textoSecundario'>El producto $nomProduct se registró correctamente</h3>";
    mysqli_close($conexion);
    }
}
    ?>
    </div>
</body>
</html>