<?php

function db_query($query) {
    include '../../env/variable.php';
    $conexion = new mysqli($hosting,$user,$pass,$bd);
    return $conexion->query($query);
}
function delete($tblname,$field_id,$id){ //Funcion para borrar registros
	$sql = "delete from ".$tblname." where ".$field_id."=".$id."";
	return db_query($sql);
}