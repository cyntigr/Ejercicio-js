<?php
include "conexion.php";


$consulta ="DELETE FROM inmueble 
			WHERE idinmueble = ". $_GET["idinmueble"];
		
$conexion->exec($consulta);
?>
