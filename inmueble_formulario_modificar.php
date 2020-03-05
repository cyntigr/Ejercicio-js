<form id="formulario">
Direccion:<input type="text" id="direccionmodificar" value=""><br>
Tipo:<select id="idtipomodificar">
<?php
$consulta2 = "SELECT idtipo, nombre 
			FROM tipo
			ORDER BY nombre";
$resultado2 = $conexion->query($consulta2);
while ($fila2 = $resultado2->fetchObject()){?>
<option value="<?= $fila2->idtipo?>"><?= $fila2->nombre?></option>
<?php } ?>
</select>
<br>
Visitas:<input type="text" id="visitamodificar" value="" />
</form>
