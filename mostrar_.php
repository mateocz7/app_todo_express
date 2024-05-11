<?php 
include 'conexion.php';


$result= array();
$result['datos'] =array();
$query ="SELECT *FROM tb_negocios";
$responce = mysqli_query($conexion,$query);

while($row = mysqli_fetch_array($responce))
{
    $index['id_negocio'] =$row['1'];
    $index['nombre_negocio'] =$row['2'];
    $index['direccion_negocio'] =$row['3'];
    $index['telefono'] =$row['4'];
    $index['longitud'] =$row['5'];
    $index['latitud'] =$row['6'];
    array_push($result['datos'], $index);

}
$result["exito"]="1";
echo json_encode($result);

?>