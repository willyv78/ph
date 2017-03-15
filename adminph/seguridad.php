<?php session_start();
require_once ("../conexion/conexion.php");
require_once ("../php/funciones.php");
//////////////////////////////////////////////////////////////////////////////////////
// Aplicación PHP usando Bootstrap, jquery, HTML5 y CSS - PH                        //
// Copyright 2014 Wilson Giovanny Velandia Barreto 3204274564 - willyv78@gmail.com  //
//////////////////////////////////////////////////////////////////////////////////////
$segur_all = false;
$segur_emp = array();
$segur_gen = array();
$res_segur = registroCampo("rmb_residente r", "r.rmb_residente_id, r.rmb_residente_nom, r.rmb_residente_ape, r.rmb_carg_id, r.rmb_residente_foto, r.rmb_residente_nom2, r.rmb_residente_tel, r.rmb_residente_cel, r.rmb_residente_dir, r.rmb_residente_email, r.rmb_residente_obs, rmb_residente_perm", "WHERE rmb_residente_pers > 0 AND (r.rmb_carg_id = '16' OR  r.rmb_carg_id = '17')", "", "ORDER BY r.rmb_carg_id ASC");
if($res_segur){
    $segur_all = true;
    if(mysql_num_rows($res_segur) > 0){
        while ($row_segur = mysql_fetch_array($res_segur)) {
            if($row_segur[3] == '16'){
                $segur_emp = [$row_segur[5], $row_segur[1]." ".$row_segur[2], $row_segur[6], $row_segur[7], $row_segur[9], $row_segur[10], $row_segur[0], $row_segur[11]];
            }
            elseif($row_segur[3] == '17'){
                $segur_gen[] = [$row_segur[4], $row_segur[1]." ".$row_segur[2], $row_segur[6], $row_segur[7], $row_segur[9], $row_segur[10], $row_segur[0], $row_segur[11]];
            }
        }
    }
}
if($segur_all){
    if($segur_emp){?>
        <!-- Seguridad Empresa -->
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 info-contador">
            <!-- Información seguridad Empresa -->
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 info-emp">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 linea-bottom">
                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-2 text-left">Empresa:</div>
                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-4 text-left"><?php echo $segur_emp[0];?></div>
                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-2 text-left">Contacto:</div>
                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-4 text-left"><?php echo $segur_emp[1];?></div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 linea-bottom">
                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-2 text-left">Teléfono:</div>
                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-4 text-left"><?php echo $segur_emp[2];?></div>
                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-2 text-left">Celular:</div>
                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-4 text-left"><?php echo $segur_emp[3];?></div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 linea-bottom-last">
                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-2 text-left">Correo:</div>
                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-4 text-left"><?php echo $segur_emp[4];?></div>
                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-2 text-left">WEB:</div>
                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-4 text-left"><?php echo $segur_emp[7];?></div>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <button type="button" class="btn btn-default pull-right" data-id="<?php echo $segur_emp[6];?>" data-quien="7">Eliminar</button>
            <button type="button" class="btn btn-default pull-right" style="margin-right: 5px;" data-id="<?php echo $segur_emp[6];?>" data-quien="7">Editar</button>
            <button type="button" class="btn btn-default pull-right" style="margin-right: 5px;" data-quien="7">Nuevo</button>
        </div><?php 
    }
    if($segur_gen){?>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">&nbsp;</div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">&nbsp;</div>
        <!-- Suplentes -->
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><?php 
            for($i = 0; $i < count($segur_gen); $i++){?>
                <div class="col-xs-12 text-center mieconsejo serviciodelegado"><?php 
                    if($segur_gen[$i][0]){$src_gen = $segur_gen[$i][0];}
                    else{$src_gen = imagenDefault();}?>
                    <img src="<?php echo $src_gen;?>" class="img-responsive" alt="Image">
                    <div class="iconos-edit hidden">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true" alt="Editar Registro" title="Editar Registro" data-id="<?php echo $segur_gen[$i][6];?>" data-quien="7"></span>
                        <span class="glyphicon glyphicon-remove" aria-hidden="true" alt="Eliminar Registro" title="Eliminar Registro" data-id="<?php echo $segur_gen[$i][6];?>" data-quien="7"></span>
                    </div>
                    <div class="text-center"><?php echo $segur_gen[$i][1]; ?></div>
                </div><?php 
            }?>
        </div><?php 
    }
    if((!$segur_emp) && (!$segur_gen)){?>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 alert alert-danger">No hay seguridad registrado</div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <button type="button" class="btn btn-default pull-right" data-quien="7">Nuevo</button>
        </div><?php 
    }
}
else{?>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 alert">Error en la consulta</div>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <button type="button" class="btn btn-default pull-right" data-quien="7">Nuevo</button>
    </div><?php 
}?>
<script>
    $(document).ready(function() {
        cargarPerfil();
    });
</script>
<!-- FIN Pagina primera pestaña -->