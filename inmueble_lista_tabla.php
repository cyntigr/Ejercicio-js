<?php
include "conexion.php";
//Solo en el caso de que se pulse para buscar por idtipo se duerme un segundo el servidor
if (!empty($_POST["idtipo"])  && empty($_POST["idinmueble"]) ) sleep(1);


//Consulta general del listado de inmuebles
$consulta = "
SELECT i.idinmueble, i.direccion, i.idtipo, i.visita, t.nombre as nombretipo
FROM inmueble i, tipo t
WHERE i.idtipo = t.idtipo";

//Consulta en función de dirección
if (!empty($_GET["busquedadireccion"])){
$consulta.= " AND i.direccion LIKE '%" . $_GET["busquedadireccion"] . "%' ";
}

//Si llega el parametro ordenapor se ordena por ese campo
if (!empty($_POST["idtipo"])) 
	$consulta .= " AND i.idtipo =" . $_POST[" idtipo"];
		 

if (empty($_POST["ordenapor"]))
	$consulta .= " ORDER BY i.direccion";

else{
	$ordena="";
	if ($_POST["ordenapor"]=="nombreTipo") $ordena = " t.nombre";
	else if ($_POST["ordenapor"]=="visita") $ordena = " i.visita";
	else $ordena = " i.direccion";
	$consulta .= " ORDER BY " . $ordena;
	}

$resultado = $conexion->query($consulta);

//if (($resultado->rowCount()) > 0 ){

	?>
        
		
<table id="tabladatos" align="center" >
<tr align="center">
	<th><a class="orden" href="#" name="direccion">Dirección</a></th>	
	<th><a class="orden" href="#" name="nombreTipo">Tipo</a></th>
	<th><a class="orden" href="#" name="visita">Visitas</a></th>  
    <th>Acciones</th>                              
</tr>
<?php 
$fil = $resultado->fetchAll(PDO::FETCH_ASSOC);
foreach ($fil as $row => $fila ){?>
<tr id="inmueble_<?=$fila["idinmueble"]?>" align="center" data-idinmueble="<?=$fila["idinmueble"]?>">
		<td class="direccion"  data-direccion="<?=$fila["direccion"]?>"><input type="text" value="<?=$fila["direccion"]?>">
		<img class="guardar"  src="img/floppy.png" width="20" height="20" alt="Guardar">
		<img class="borra" src="img/borrar.png" width="20" height="20" alt="Borrar"></td>
		<td class="idtipo" data-idtipo="<?=$fila["idtipo"]?>"><input type="text" value="<?=$fila["nombretipo"]?>">
		<img class="guardar"  src="img/floppy.png" width="20" height="20" alt="Guardar">
		<img class="borra" src="img/borrar.png" width="20" height="20" alt="Borrar">
		</td>
        <td class="visita">
		<span class="incrementavisita" >
		<a href="#"><?=$fila["visita"];?></a></span> 
		</td>
        <td> <img class="borrar" src="img/borrar.png" width="20" height="20" alt="Borrar">
    &nbsp;<img class="modificar" src="img/lapiz.png" width="20" height="20" alt="Modificar">
   	</td>
</tr>
<?php }//while ?>
</table>