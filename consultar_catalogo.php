<?php
include 'conexion.php';

// Verificar si se ha recibido el parámetro id_negocio
if(isset($_POST['id_negocio'])) {
    // Obtener el valor del parámetro id_negocio
    $id_negocio = $_POST['id_negocio'];

    // Preparar la consulta SQL con el parámetro filtrado
    $query = "SELECT * FROM catalogo WHERE id_negocio = '$id_negocio'";
    $responce = mysqli_query($conexion, $query);

    // Verificar si se encontraron resultados
    if(mysqli_num_rows($responce) > 0) {
        $result = array();
        $result['datos'] = array();
        
        while($row = mysqli_fetch_array($responce)) {
            $index['id_negocio'] = $row['1'];
            $index['id_producto'] = $row['2'];
            $index['nom_producto'] = $row['3'];
            $index['descripcion'] = $row['4'];
            $index['valor'] = $row['5'];
            $index['url_imagen'] = $row['6'];
            array_push($result['datos'], $index);
        }
        
        $result["exito"] = "1";
        echo json_encode($result);
    } else {
        // No se encontraron resultados para el id_negocio dado
        $result["exito"] = "0";
        $result["mensaje"] = "No se encontraron resultados para el id_negocio proporcionado";
        echo json_encode($result);
    }
} else {
    // Si no se proporciona el parámetro id_negocio
    $result["exito"] = "0";
    $result["mensaje"] = "Se requiere el parámetro id_negocio";
    echo json_encode($result);
}

// Cerrar la conexión a la base de datos
mysqli_close($conexion);
?>
