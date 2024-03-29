<?php
$servidor = "localhost";
$usuario = "root";
$clave = "";
$baseDedatos = "ejemplo";

$conexion = mysqli_connect($servidor, $usuario, $clave, $baseDedatos);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="#" name="ejemplo" method="post">
        <input type="text" name="nombre" placeholder="Nombre">
        <input type="email" name="correo" placeholder="Correo">
        <input type="text" name="telefono" placeholder="Telefono">

        <button type="submit" name="registro">Envie</button>
        <input type="reset" name="Restablecer">

    </form>

    <table>
        <tr>
            <td>Nombre</td>
            <td>Correo</td>
            <td>Telefono</td>
        </tr>
        <?php
        $sql = "SELECT * FROM datos";
        $resultado = $conexion->query($sql);

        while ($fila = $resultado->fetch_assoc()) {
        ?>
            <tr>
                <td><?php echo $fila['nombre'] ?></td>
                <td><?php echo $fila['correo'] ?></td>
                <td><?php echo $fila['telefono'] ?></td>
            </tr>
        <?php
        }
        ?>
</body>

</html>

<?php
if (isset($_POST['registro'])) {
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $telefono = $_POST['telefono'];

    $sql = "INSERT INTO datos (nombre, correo, telefono) VALUES ('$nombre', '$correo', '$telefono')";
    $conexion->query($sql);

    header("Location: {$_SERVER['PHP_SELF']}");
    exit();
}

if (isset($_POST['Restablecer'])) {
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $telefono = $_POST['telefono'];

    $sql = "DELETE FROM datos WHERE nombre = '$nombre'";
    $conexion->query($sql);

    header("Location: {$_SERVER['PHP_SELF']}");
    exit();
}

?>