<?php session_start();
require_once ("../conexion/conexion.php");
require_once ("../php/funciones.php");
//////////////////////////////////////////////////////////////////////////////////////
// Aplicación PHP usando Bootstrap, jquery, HTML5 y CSS - PH                        //
// Copyright 2014 Wilson Giovanny Velandia Barreto 3204274564 - willyv78@gmail.com  //
//////////////////////////////////////////////////////////////////////////////////////
$servi_all = false;
$servi_emp = array();
$servi_gen = array();
$res_servi = registroCampo("rmb_residente r", "r.rmb_residente_id, r.rmb_residente_nom, r.rmb_residente_ape, r.rmb_carg_id, r.rmb_residente_foto, r.rmb_residente_nom2, r.rmb_residente_tel, r.rmb_residente_cel, r.rmb_residente_dir, r.rmb_residente_email, r.rmb_residente_obs, rmb_residente_perm", "WHERE rmb_residente_pers > 0 AND (r.rmb_carg_id = '18' OR  r.rmb_carg_id = '19')", "", "ORDER BY r.rmb_carg_id ASC");
if($res_servi){
    $servi_all = true;
    if(mysql_num_rows($res_servi) > 0){
        while ($row_servi = mysql_fetch_array($res_servi)) {
            if($row_servi[3] == '18'){
                $servi_emp = [$row_servi[5], $row_servi[1]." ".$row_servi[2], $row_servi[6], $row_servi[7], $row_servi[9], $row_servi[10], $row_servi[0], $row_servi[11]];
            }
            elseif($row_servi[3] == '19'){
                $servi_gen[] = [$row_servi[4], $row_servi[1]." ".$row_servi[2], $row_servi[6], $row_servi[7], $row_servi[9], $row_servi[10], $row_servi[0], $row_servi[11]];
            }
        }
    }
}?>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="margin-bottom: 5px;">
    <button type="button" class="btn btn-default pull-right" data-quien="8">Nuevo</button>
</div><?php 
if($servi_all){
    if($servi_emp){?>
        <!-- Titulares -->
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 alert alert-info">
            <div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
                <img src="../images/ASEO1.png" class="img-responsive admon2" alt="Image">
            </div>
            <!-- Información seguridad Empresa -->
            <div class="col-xs-12 col-sm-8 col-md-9 col-lg-9 info-emp">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <span class="col-xs-12 col-sm-3 col-md-2 col-lg-2 text-nowrap modal-open text-left">Empresa:</span>
                    <span class="col-xs-12 col-sm-9 col-md-10 col-lg-10 text-nowrap modal-open text-left"><?php echo $servi_emp[0];?></span>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <span class="col-xs-12 col-sm-3 col-md-2 col-lg-2 text-nowrap modal-open text-left">Contacto:</span>
                    <span class="col-xs-12 col-sm-9 col-md-5 col-lg-4 text-nowrap modal-open text-left"> <?php echo $servi_emp[1];?></span>
                    <span class="col-xs-12 col-sm-3 col-md-1 col-lg-1 text-nowrap modal-open text-left">Tel:</span>
                    <span class="col-xs-12 col-sm-9 col-md-4 col-lg-1 text-nowrap modal-open text-left"><?php echo $servi_emp[2];?></span>
                    <span class="col-xs-12 col-sm-3 col-md-2 col-lg-2 text-nowrap modal-open text-left">Cel:</span>
                    <span class="col-xs-12 col-sm-9 col-md-4 col-lg-2 text-nowrap modal-open text-left"><?php echo $servi_emp[3];?></span>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <span class="col-xs-12 col-sm-3 col-md-2 col-lg-2 text-nowrap modal-open text-left">Correo:</span>
                    <span class="col-xs-12 col-sm-9 col-md-5 col-lg-4 text-nowrap modal-open text-left"><?php echo $servi_emp[4];?></span>
                    <span class="col-xs-12 col-sm-3 col-md-1 col-lg-1 text-nowrap modal-open text-left">WEB:</span>
                    <span class="col-xs-12 col-sm-9 col-md-4 col-lg-5 text-nowrap modal-open text-left"><?php echo $servi_emp[7];?></span>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <span class="col-xs-12 col-sm-3 col-md-2 col-lg-2 text-nowrap modal-open text-left">Horario Atención:</span>
                    <span class="col-xs-12 col-sm-9 col-md-10 col-lg-10 text-nowrap modal-open text-left"><?php echo $servi_emp[5];?></span>
                </div>
                <div class="clearfix">&nbsp;</div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <button type="button" class="btn btn-default pull-right" data-id="<?php echo $servi_emp[6];?>" data-quien="8">Eliminar</button>
                    <button type="button" class="btn btn-default pull-right" style="margin-right: 5px;" data-id="<?php echo $servi_emp[6];?>" data-quien="8">Editar</button>
                </div>
            </div>
        </div><?php 
    }
    if($servi_gen){?>
        <!-- Suplentes -->
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 alert alert-danger"><?php 
            for($i = 0; $i < count($servi_gen); $i++){?>
                <div class="col-xs-12 text-center miecomite"><?php 
                    if($servi_gen[$i][0]){$src_gen = $servi_gen[$i][0];}
                    else{$src_gen = imagenDefault();}?>
                    <img src="<?php echo $src_gen;?>" class="img-responsive fotoservicios" alt="Image">
                    <div class="iconos-edit hidden">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true" alt="Editar Registro" title="Editar Registro" data-id="<?php echo $servi_gen[$i][6];?>" data-quien="8"></span>
                        <span class="glyphicon glyphicon-remove" aria-hidden="true" alt="Eliminar Registro" title="Eliminar Registro" data-id="<?php echo $servi_gen[$i][6];?>" data-quien="8"></span>
                    </div>
                    <div class="bgreen text-center datacomite"><?php echo $servi_gen[$i][1]; ?></div>
                </div><?php 
            }?>
        </div><?php 
    }
    if((!$servi_emp) && (!$servi_gen)){?>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 alert alert-danger">No hay seguridad registrado</div><?php 
    }
}
else{?>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 alert alert-danger">Error en la consulta</div><?php 
}?>
<script>
    $(document).ready(function() {
        cargarPerfil();
    });
</script>
<!-- FIN Pagina primera pestaña -->