<?php
//Aqui evito la utilizacion de cache con fines de refrescar tablas
header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
header("Expires: Sat, 1 Jul 2000 05:00:00 GMT"); // Fecha en el pasado

require_once "clases/conexion.php";
$obj=new conectar();
$conexion=$obj->conexion();
$sql="SELECT id_conglo,codigo_conglo,descripcion_cod,descripcion_conglo,estado_conglo FROM vw_glosaconcepto ORDER BY codigo_conglo";
//echo $sql;
$result=mysqli_query($conexion,$sql)
?>

<div>
	<table class="table table-hover table-sm table-bordered font13" id="tablaconcep">
		<thead style="background-color: #2574a9;color: white; font-weight: bold;">
			<tr>
				<td>Código</td>
				<td>Concepto General</td>
				<td>Concepto Específico</td>
				<td>Activo</td>				
				<td>Editar</td>				
			</tr>
		</thead>

		<tbody style="background-color: white">
			<?php
			while($row=mysqli_fetch_row($result)){
				if($row[4]=='A')
					{$chequeado='checked';}
				else
					{$chequeado='';}
				?>
				<tr>
					<td><?php echo $row[1];?></td>
					<td><?php echo $row[2];?></td>
					<td><?php echo $row[3];?></td>					
					<td><input type="checkbox" <?php echo $chequeado;?> onclick="cambiarestado('<?php echo $row[0]?>')"></td>
					<td style="text-align: center;">
						<span class="btn btn-warning btn.sm" data-toggle="modal" data-target="#modaleditarconcep" title="Editar El Registro" onclick="FrmActualizar('<?php echo $row[0]?>')">
							<span class="far fa-edit"></span>
						</span>
					</td>
					
				</tr>
				<?php
			}
			?>
		</tbody>
		
	</table>
</div>

<script type="text/javascript">
	$(document).ready(function() {
		$('#tablaconcep').DataTable();
	} );
</script>