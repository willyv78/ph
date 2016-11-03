<?php session_start();
require_once ("../conexion/conexion.php");
require_once ("../php/funciones.php");
//////////////////////////////////////////////////////////////////////////////////////
// Aplicación PHP usando Bootstrap, jquery, HTML5 y CSS - PH                        //
// Copyright 2014 Wilson Giovanny Velandia Barreto 3204274564 - willyv78@gmail.com  //
//////////////////////////////////////////////////////////////////////////////////////
$res_val = Equipos();
$datos = "";
$table = "";
if($res_val){
	if(mysql_num_rows($res_val) > 0){
		$sq = 0;
		while($row_val = mysql_fetch_array($res_val)){?>
			<!-- <div class='col-xs-12 col-sm-12 col-md-12 col-lg-12'> -->
			<div class='col-xs-12 col-sm-12 col-md-6 col-lg-6' style="border:1px solid #D4D4D4;border-radius:5px;">
				<div class="clearfix">&nbsp;</div>
				<!-- imagen del equipo -->
				<div class='col-xs-4 col-sm-4 col-md-4 col-lg-4 text-center'>
					<img id='vistaPrevia' src='<?php echo $row_val[10];?>' width='100px' height="100px"/>
				</div>
				<!-- Nombre equipo y botones -->
				<div class='col-xs-8 col-sm-8 col-md-8 col-lg-8 text-left'>
			 		<div class='col-xs-12 col-sm-12 col-md-12 col-lg-12'>
			 			<span style='color:#808080;font-family:Verdana;font-size:16px;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;'><?php echo $row_val[1];?></span>
			 		</div>
			 		<div class='col-xs-12 col-sm-4 col-md-4 col-lg-4'>
			 		    <button type='button' class='col-xs-12 col-sm-12 col-md-12 col-lg-12 btn btn-danger' data-dismiss='modal'>Historial</button>
			 		</div>
			 		<!-- <div class="visible-xs clearfix">&nbsp;</div> -->
			 		<div class='col-xs-12 col-sm-4 col-md-4 col-lg-4'>
			 		    <button type='button' class='col-xs-12 col-sm-12 col-md-12 col-lg-12 btn btn-danger' data-dismiss='modal'>Detalle</button>
			 		</div>
					<!-- <div class="visible-xs clearfix">&nbsp;</div> -->
			 		<div class='col-xs-12 col-sm-4 col-md-4 col-lg-4'>
			 		    <button type='button' class='col-xs-12 col-sm-12 col-md-12 col-lg-12 btn btn-danger' data-dismiss='modal'>Editar</button>
			 		</div>
				</div>
				<!-- Especificaciones tecnicas -->
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-left">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					 	<span style='color:#808080;font-family:Verdana;font-size:13px;'><strong>Datos Técnicos</strong></span>
					</div>
					<!-- Label modelo -->
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					 	<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
					 		<span style='color:#808080;font-family:Verdana;font-size:13px;'>Modelo: </span>
					 	</div>
					 	<div class="col-xs-4 col-sm-8 col-md-8 col-lg-8">
					 		<span style='color:#000000;font-family:Arial;font-size:13px;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;'><?php echo $row_val[3];?></span>
					 	</div>
					</div>
					<!-- Label marca -->
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					 	<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
					 		<span style='color:#808080;font-family:Verdana;font-size:13px;'>Marca: </span>
					 	</div>
					 	<div class="col-xs-4 col-sm-8 col-md-8 col-lg-8">
					 		<span style='color:#000000;font-family:Arial;font-size:13px;'><?php echo $row_val[2];?></span>
					 	</div>
					</div>
					<!-- label Fabricante -->
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					 	<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
					 		<span style='color:#808080;font-family:Verdana;font-size:13px;'>Fabricante: </span>
					 	</div>
					 	<div class="col-xs-4 col-sm-8 col-md-8 col-lg-8">
					 		<span style='color:#000000;font-family:Arial;font-size:13px;'><?php echo $row_val[4];?></span>
					 	</div>
					</div>
					<!-- Label fecha de adquisicion -->
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					 	<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
					 		<span style='color:#808080;font-family:Verdana;font-size:13px;'>Fecha compra: </span>
					 	</div>
					 	<div class="col-xs-4 col-sm-8 col-md-8 col-lg-8">
					 		<span style='color:#000000;font-family:Arial;font-size:13px;'><?php echo $row_val[5];?></span>
					 	</div>
					</div>
					<!-- Label costo del equipo -->
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					 	<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
					 		<span style='color:#808080;font-family:Verdana;font-size:13px;'>Costo: </span>
					 	</div>
					 	<div class="col-xs-4 col-sm-8 col-md-8 col-lg-8">
					 		<span style='color:#696969;font-family:Verdana;font-size:15px;'><?php echo $row_val[6];?></span>
					 	</div>
					</div>
					<!-- Label estado del equipo -->
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					 	<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
					 		<span style='color:#808080;font-family:Verdana;font-size:13px;'>Estado: </span>
					 	</div>
					 	<div class="col-xs-4 col-sm-8 col-md-8 col-lg-8">
					 		<span style='color:#32CD32;font-family:Verdana;font-size:16px;'><strong><?php echo $row_val[7];?></strong></span>
					 	</div>
					</div>
					<!-- Label ultima Fecha de mantenimiento -->
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					 	<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
					 		<span style='color:#808080;font-family:Verdana;font-size:13px;'>Último Mant.: </span>
					 	</div>
					 	<div class="col-xs-4 col-sm-8 col-md-8 col-lg-8">
					 		<span style='color:#000000;font-family:Arial;font-size:13px;'>01/02/02</span>
					 	</div>
					</div>
					<!-- Label proximo mantenimiento -->
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					 	<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
					 		<span style='color:#808080;font-family:Verdana;font-size:13px;'>Próximo Mant.: </span>
					 	</div>
					 	<div class="col-xs-4 col-sm-8 col-md-8 col-lg-8">
					 		<span style='color:#32CD32;font-family:Verdana;font-size:15px;'>10/10/2000</span>
					 	</div>
					</div>
					<!-- Label observaciones -->
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					 	<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
					 		<span style='color:#808080;font-family:Verdana;font-size:13px;'>Observación: </span>
					 	</div>
					 	<div class="col-xs-4 col-sm-8 col-md-8 col-lg-8">
					 		<span style='color:#000000;font-family:Arial;font-size:13px;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;'><?php echo substr($row_val[8], 0, 45);?></span>
					 	</div>
					</div>
				</div>
				<div class="clearfix">&nbsp;</div>
			</div><?php 
		}
	}
	else{?>
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		    <div class="alert alert-danger text-left">
		        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		        <strong>Atención!</strong>
		          <p>No se encontraron datos.</p>
		          <footer>Si necesita ayuda o soporte, comuniquese con el desarrollador de la aplicación al correo <cite title="Source Title">info@rmasb.com</cite> o al telefono <cite title="Source Title">7569919</cite></footer>
		    </div>
		</div><?php 
	}
}
else{?>
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
	    <div class="alert alert-danger text-left">
	        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	        <strong>Atención!</strong>
	          <p>No se encontraron datos.</p>
	          <footer>Si necesita ayuda o soporte, comuniquese con el desarrollador de la aplicación al correo <cite title="Source Title">info@rmasb.com</cite> o al telefono <cite title="Source Title">7569919</cite></footer>
	    </div>
	</div><?php 
}
?>

<script>
	cargarListaEquipos();
</script>



























