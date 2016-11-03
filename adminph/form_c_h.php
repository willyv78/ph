<?php 
require ("../conexion/conexion.php");
require_once ("../php/funciones.php");
//////////////////////////////////////////////////////////////////////////////////////
// Aplicación PHP usando Bootstrap, jquery, HTML5 y CSS - PH                        //
// Copyright 2014 Wilson Giovanny Velandia Barreto 3204274564 - willyv78@gmail.com  //
//////////////////////////////////////////////////////////////////////////////////////
$tabla = $_GET['tabla'];
$res_proy = DatosProyecto(1);
if($res_proy){
	if(mysql_num_rows($res_proy) > 0){
		$row_proy = mysql_fetch_array($res_proy);
		if($row_proy[10] <> ''){$src = $row_proy[10];}
		else{$src = imagenDefault();}
		
	}
}
$id_usu = $_GET['id_usu'];
$res_usu = Inmuebles_Usu($id_usu);
if(isset($_GET['id_fact'])){
	$next_fact = $_GET['id_fact'];
	$res_fact = Facturas_Id($next_fact);
	if($res_fact){
		if(mysql_num_rows($res_fact) > 0){
			$row_fact = mysql_fetch_array($res_fact);
			$fechahoy = $row_fact[4];
			$nuevafecha = $row_fact[5];
			$apto = $row_fact[2];
			$fpago = $row_fact[6];
			$estado = $row_fact[8];
			$obs = $row_fact[9];
		}
	}
}
else{
	$next_fact = NextID('rmb_admon', $tabla);
	$fechahoy = date('Y-m-d');
	$nuevafecha = strtotime ( '+10 day' , strtotime ( $fechahoy ) ) ;
	$nuevafecha = date ( 'Y-m-d' , $nuevafecha );
	$apto = "";
	$fpago = "";
	$estado = "";
	$obs = "";
}
$ncampos = 0;
?>
<div id="load_js">
	<script type="text/javascript" src="../js/maestros.js"></script>
</div>
<table width="100%" aling="center" border="1" style="font-size:14px;">
	<tr>
		<td width="12.5%">Apartamento: </td>
		<td <?php if(isset($_GET['id_fact'])){echo 'colspan="2"';}else{echo 'colspan="5"';}?>><?php 
			if($res_usu){
				if(mysql_num_rows($res_usu) > 0){?>
					<select id="rmb_aptos_id">
						<option value="" <?php if($apto == ''){echo "selected='selected'";}?>>Seleccione...</option><?php 
						while($row_usu = mysql_fetch_array($res_usu)){?>
							<option value="<?php echo $row_usu[0];?>" <?php if($apto == $row_usu[0]){echo "selected='selected'";}?>><?php echo $row_usu[1];?></option>
						<?php }
						?>
					</select>
				<?php 
				}
			}
		?></td><?php 
		if(isset($_GET['id_fact'])){?>
			<td width="12.5%">Estado: </td>
			<td colspan="2" width="25%"><?php echo Estados($estado, 7);?></td><?php
		}?>
		<td width="12.5%">Factura No.: </td>
		<td width="12.5%" align="right"><input id="rmb_tesoreria_id" type="number" name="rmb_tesoreria_id" value="<?php echo $next_fact;?>" style="width:80px;text-align:right;" readonly="readonly"></td>
	</tr>
	<tr>
		<td colspan="2" width="25%">Fecha Oportuna Pago: </td>
		<td colspan="2" width="25%">
			<input id="rmb_tesoreria_fpag" type="date" name="rmb_tesoreria_fpag" value="<?php echo $fechahoy;?>" style="width:130px;">
		</td>
		<td colspan="2" width="25%">Fecha Limite pago: </td>
		<td colspan="2" width="25%">
			<input id="rmb_tesoreria_fven" type="date" name="rmb_tesoreria_fven" value="<?php echo $nuevafecha;?>" style="width:130px;">
		</td>
	</tr><?php 
	if(isset($_GET['id_fact'])){?>
		<tr>
			<td colspan="2" width="25%">Forma Pago: </td>
			<td colspan="2" width="25%"><?php echo FormaPago($fpago);?></td>
			<td colspan="2" width="25%">Fecha de Pago: </td>
			<td colspan="2" width="25%">
				<input id="rmb_tesoreria_fpago" type="date" name="rmb_tesoreria_fpago" value="" style="width:130px;">
			</td>
		</tr><?php 
	}?>
	<tr align="center" style="height:35px;font-weight:bold;">
		<td width="12.5%">Cant.</td>
		<td colspan="4" width="50%">Detalle</td>
		<td width="12.5%"><span id="new_detalle" style="color:#32CD32;font-family:Arial;font-size:13px;cursor:pointer;">Nuevo +</span></td>
		<td width="12.5%">Valor Unit.</td>
		<td width="12.5%">Valor Total</td>
	</tr>
	<tr>
		<td id="det_fact" colspan="8" align="center">
			<div id="0" class="no_registros">No hay registros, Haga click en "Nuevo +" para agregar conceptos a pagar.</div>
		</td>
	</tr>
	<tr>
		<td colspan="6">Valor letras: <strong id="letras">Docientos mil pesos M/cte.</strong></td>
		<td>Total: </td>
		<td align="right"><input id="rmb_tesoreria_val" type="number" name="rmb_tesoreria_val" value="0" style="width:80px;text-align:right;" readonly="readonly"></td>
	</tr>
	<tr>
		<td>Observaciones: </td>
		<td colspan="5"><textarea class="form-control" id="rmb_tesoreria_obs" rows="2" style="vertical-align:middle;"><?php echo $obs;?></textarea></td>
		<td colspan="2" style="vertical-align:top;">Recibí Conforme:</td>
	</tr>
	<tr>
		<td colspan="8" align="center">
			<input id="ncampos" type="hidden" name="ncampos" value="<?php echo $ncampos;?>" >
			<input id="id_usu" type="hidden" name="id_usu" value="<?php echo $id_usu;?>" >
			<div class="bienvenida">
				<?php 
				if(isset($_GET['id_fact'])){?>
					<div id="actualizar" name="actualizar" class="button_c_h">Actualizar Registro</div>
				<?php }
				else{?>
					<div id="ingresar" name="ingresar" class="button_c_h">Ingresar Registro</div>
				<?php }
				?>
				<div id="cancel" name="cancel" class="button_c_h">Cancelar</div>
			</div>			
		</td>
	</tr>
</table>
<script type="text/javascript">
	//funcion para armar los conceptos de la factura
	function ConceptosFactura(id, cant, tpago, val, num){
	  	var detalle = '<div id="'+num+'" style="width:100%;"></div>';
	  	if(parseInt(num) === 1){$("#det_fact").html(detalle);}
		else{$("#det_fact").append(detalle);}
		$("#"+num).load('det_fact.php?num='+num+'&cant='+cant+'&tpago='+tpago+'&val='+val+'&id='+id);
	}
</script>
<?php 
if(isset($_GET['id_fact'])){
	$id_fact = $_GET['id_fact'];
	$res_concep = Concept_fact($id_fact);
	if($res_concep){
		if(mysql_num_rows($res_concep) > 0){
			$ncampos = mysql_num_rows($res_concep);
			$sq = 1;
			while($row_concep = mysql_fetch_array($res_concep)){?>
				<script type="text/javascript">
					var id = <?php echo $row_concep[0];?>;
					var cant = <?php echo $row_concep[3];?>;
					var tpago = <?php echo $row_concep[2];?>;
					var val = <?php echo $row_concep[4];?>;
					var num = <?php echo $sq;?>;
					$("#ncampos").val(<?php echo $ncampos;?>);
					ConceptosFactura(id, cant, tpago, val, num);
				</script><?php 
				$sq += 1;
			}
		}
	}
}?>