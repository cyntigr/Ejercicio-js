<?php 
include "conexion.php";

$consulta = "INSERT INTO inmueble (direccion,idtipo,visita) 
			VALUES('" . $_POST["direccionnuevo"] ."'," . 
			$_POST["idtiponuevo"] . "," . 
			$_POST["visitanuevo"] . ")";

$conexion->exec($consulta);		

$consulta = "SELECT LAST_INSERT_ID() AS idinmueble " .
			"FROM inmueble";

$resultado = $conexion->query($consulta);
$fila = $resultado->fetchObject();

?>
<tr id="inmueble_<?= $fila->idinmueble?>" align="center" data-idinmueble="<?= $fila->idinmueble?>">
		<td class="direccion"><?= $_POST["direccionnuevo"]?></td>
        <td class="idtipo" data-idtipo="<?= $_POST["idtiponuevo"]?>"><?= $_POST["textotipo"]?></td>
        <td class="visita">
		<span class="incrementavisita" >
		<a href="#"><?= $_POST["visitanuevo"] ?></a></span> 
		</td>
        <td> <img class="borrar" src="img/borrar.png" width="20" height="20" alt="Borrar">
    &nbsp;<img class="modificar" src="img/lapiz.png" width="20" height="20" alt="Modificar">
   	</td>
</tr>

