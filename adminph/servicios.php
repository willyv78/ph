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
}
if($servi_all){
    if($servi_emp){?>
        <!-- Servicios Empresa -->
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 info-contador">
            <!-- Información servicios Empresa -->
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 info-emp">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 linea-bottom">
                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-2 text-left">Empresa:</div>
                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-4 text-left"><?php echo $servi_emp[0];?></div>
                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-2 text-left">Contacto:</div>
                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-4 text-left"><?php echo $servi_emp[1];?></div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 linea-bottom">
                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-2 text-left">Teléfono:</div>
                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-4 text-left"><?php echo $servi_emp[2];?></div>
                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-2 text-left">Celular:</div>
                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-4 text-left"><?php echo $servi_emp[3];?></div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 linea-bottom-last">
                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-2 text-left">Correo:</div>
                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-4 text-left"><?php echo $servi_emp[4];?></div>
                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-2 text-left">WEB:</div>
                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-4 text-left"><?php echo $servi_emp[7];?></div>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <button type="button" class="btn btn-default pull-right" data-id="<?php echo $servi_emp[6];?>" data-quien="8">Eliminar</button>
            <button type="button" class="btn btn-default pull-right" style="margin-right: 5px;" data-id="<?php echo $servi_emp[6];?>" data-quien="8">Editar</button>
            <button type="button" class="btn btn-default pull-right" style="margin-right: 5px;" data-quien="8">Nuevo</button>
        </div><?php 
    }
    if($servi_gen){?>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">&nbsp;</div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">&nbsp;</div>
        <!-- Suplentes -->
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><?php 
            for($i = 0; $i < count($servi_gen); $i++){?>
                <div class="col-xs-12 text-center mieconsejo serviciodelegado"><?php 
                    if($servi_gen[$i][0]){$src_gen = $servi_gen[$i][0];}
                    else{$src_gen = imagenDefault();}?>
                    <img src="<?php echo $src_gen;?>" class="img-responsive" alt="Image">
                    <div class="iconos-edit hidden">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true" alt="Editar Registro" title="Editar Registro" data-id="<?php echo $servi_gen[$i][6];?>" data-quien="8"></span>
                        <span class="glyphicon glyphicon-remove" aria-hidden="true" alt="Eliminar Registro" title="Eliminar Registro" data-id="<?php echo $servi_gen[$i][6];?>" data-quien="8"></span>
                    </div>
                    <div class="text-center"><?php echo $servi_gen[$i][1]; ?></div>
                </div><?php 
            }?>
        </div><?php 
    }
    if((!$servi_emp) && (!$servi_gen)){?>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 alert alert-danger">No hay seguridad registrado</div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <button type="button" class="btn btn-default pull-right" data-quien="8">Nuevo</button>
        </div><?php 
    }
}
else{?>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">Error en la consulta</div>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <button type="button" class="btn btn-default pull-right" data-quien="8">Nuevo</button>
    </div><?php 
}?>
<script>
    $(document).ready(function() {
        cargarPerfil();
    });
</script>
<!-- FIN Pagina primera pestaña -->