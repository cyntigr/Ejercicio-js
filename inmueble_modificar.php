<?php 
include "conexion.php";

$consulta = "UPDATE inmueble SET
			direccion = '" . $_POST["direccionmodificar"] ."',
			idtipo = " . $_POST["idtipomodificar"] . ",
			visita = " . $_POST["visitamodificar"] . " 
			 WHERE idinmueble = " . $_POST["idinmueblemodificar"];


$conexion->exec($consulta);
?>
	<td class="direccion"><?= $_POST["direccionmodificar"]?></td>
    <td class="idtipo" data-idtipo="<?= $_POST["idtipomodificar"]?>"><?= $_POST["textotipo"] ?></td>
        <td class="visita">
		<span class="incrementavisita" >
		<a href="#"><?= $_POST["visitamodificar"]?></a></span> 
		</td>
        <td> <img class="borrar" src="img/borrar.png" width="20" height="20" alt="Borrar">
    &nbsp;<img class="modificar" src="img/lapiz.png" width="20" height="20" alt="Modificar">
   	</td>
