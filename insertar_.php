<?php

// Incluimos el archivo de conexión
include 'conexion.php';

// Función para verificar si un campo ya existe en la base de datos
function campoExiste($conexion, $campo, $valor, $tabla) {
    $query = "SELECT * FROM $tabla WHERE $campo = '$valor'";
    $resultado = mysqli_query($conexion, $query);
    return mysqli_num_rows($resultado) > 0;
}

// Datos del formulario
$nombre1 = $_POST['nombre1'];
$nombre2 = $_POST['nombre2'];
$apellido1 = $_POST['apellido1'];
$apellido2 = $_POST['apellido2'];
$fechanac = $_POST['fechanac'];
$direccion = $_POST['direccion'];
$celular = $_POST['celular'];
$cedula = $_POST['cedula'];
$correo = $_POST['correo'];
$contraseña = $_POST['contraseña'];

// Verificar si los campos ya existen en la base de datos
if (campoExiste($conexion, 'cedula', $cedula, 'usuarios')) {
    echo "Ya existe una cédula registrada con ese número";
} elseif (campoExiste($conexion, 'celular', $celular, 'usuarios')) {
    echo "Ya existe un número de celular registrado con ese número";
} elseif (campoExiste($conexion, 'correo', $correo, 'usuarios')) {
    echo "Ya existe un correo electrónico registrado con esa dirección";
} else {
    // Insertar datos en la base de datos
    $query = "INSERT INTO usuarios (nombre1, nombre2, apellido1, apellido2, fechanac, direccion, celular, cedula, correo, contraseña) 
              VALUES ('$nombre1', '$nombre2', '$apellido1', '$apellido2', '$fechanac', '$direccion', '$celular', '$cedula', '$correo', '$contraseña')";
    $resultado = mysqli_query($conexion, $query);

    if ($resultado) {
        echo "Datos insertados";
    } else {
        echo "Error al insertar datos";
    }
}

// Cerramos la conexión
mysqli_close($conexion);

?>
