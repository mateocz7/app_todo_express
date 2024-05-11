<?php

include 'conexion.php';

$cedula = $_POST['cedula'];
$contraseña = $_POST['contraseña'];

$query = "SELECT * FROM usuarios WHERE cedula = '$cedula' AND contraseña = '$contraseña'";

$resultado = mysqli_query($conexion, $query);

if ($resultado && mysqli_num_rows($resultado) > 0) {
    echo "usuario_encontrado";
} else {
    echo "no_existe_usuario";
}

mysqli_close($conexion);

?>
