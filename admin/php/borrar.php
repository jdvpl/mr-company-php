<?php 
include "../../env/conexion.php";
include("functions.php");

$id = $_GET['id'];
$table=$_GET['table'];
$field_id=$_GET['field_id'];

if($table=="productos"){
    $query = "SELECT * FROM productos WHERE id='$id'";
    $stmt = $conexion->prepare($query);
	$stmt->execute();
	$result = $stmt->get_result();
	$imagen = "";
	if (mysqli_num_rows($result) > 0) {
		while ($row = $result->fetch_assoc()) {
			$imagen = $row['foto'];
		}
	}
    $ruta="../../uploads/";
    unlink($ruta . $imagen);
}
delete($table,$field_id,$id);

header("location: ../page/".$table);
?>