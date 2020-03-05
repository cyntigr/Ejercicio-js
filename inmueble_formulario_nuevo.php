<?php include "conexion.php"?>
<tr id="filanueva" align="center">
<td>
<input  placeholder="Dirección" type="text" id="direccionnuevo" value="">
</td>
<td>
<select placeholder="Tipo" id="idtiponuevo">
<?php
$consulta2 = "SELECT idtipo, nombre 
			FROM tipo
			ORDER BY nombre";
$resultado2 = $conexion->query($consulta2);
while ($fila2 = $resultado2->fetchObject()){?>
<option value="<?php echo $fila2->idtipo?>"><?php echo $fila2->nombre?></option>
<?php } //while ?>
</select>
</td>
<td>
<input  placeholder="Visitas" type="text" id="visitanuevo" value="0">
</td>
<td>
<img id="guardarnuevo" src="img/floppy.png" width="20" height="20" alt="Guardar">
&nbsp;&nbsp;
<img id="cancelarnuevo" src="img/borrar.png" width="20" height="20" alt="Cancelar">

</td>
</tr>