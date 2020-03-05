<?php
include "conexion.php";
//Actualiza el inmueble con el valor vendido
if (!empty($_POST["idinmueble"])){	
	$sql = "UPDATE inmueble SET
		visita = visita + 1  
		WHERE idinmueble=". $_POST["idinmueble"];
	$conexion->exec($sql);

//vuelve a hacer consulta para devolver el valor 
//de la visita
$consulta = "SELECT visita 
			FROM inmueble
			WHERE idinmueble=". $_POST["idinmueble"];
$resultado = $conexion->query($consulta);
$fila = $resultado->fetchObject();
echo $fila-> visita;
}
?>