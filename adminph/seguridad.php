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
}?>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="margin-bottom: 5px;">
    <button type="button" class="btn btn-default pull-right" data-quien="7">Nuevo</button>
</div><?php 
if($segur_all){
    if($segur_emp){?>
        <!-- Titulares -->
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 alert alert-info">
            <div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
                <img src="../images/VIGILANCIA1.png" class="img-responsive admon2" alt="Image">
            </div>
            <!-- Información seguridad Empresa -->
            <div class="col-xs-12 col-sm-8 col-md-9 col-lg-9 info-emp">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <span class="col-xs-12 col-sm-3 col-md-2 col-lg-2 text-nowrap modal-open text-left">Empresa:</span>
                    <span class="col-xs-12 col-sm-9 col-md-10 col-lg-10 text-nowrap modal-open text-left"><?php echo $segur_emp[0];?></span>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <span class="col-xs-12 col-sm-3 col-md-2 col-lg-2 text-nowrap modal-open text-left">Contacto:</span>
                    <span class="col-xs-12 col-sm-9 col-md-5 col-lg-4 text-nowrap modal-open text-left"> <?php echo $segur_emp[1];?></span>
                    <span class="col-xs-12 col-sm-3 col-md-1 col-lg-1 text-nowrap modal-open text-left">Teléfono:</span>
                    <span class="col-xs-12 col-sm-9 col-md-4 col-lg-1 text-nowrap modal-open text-left"><?php echo $segur_emp[2];?></span>
                    <span class="col-xs-12 col-sm-3 col-md-2 col-lg-2 text-nowrap modal-open text-left">Cel:</span>
                    <span class="col-xs-12 col-sm-9 col-md-4 col-lg-2 text-nowrap modal-open text-left"><?php echo $segur_emp[3];?></span>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <span class="col-xs-12 col-sm-3 col-md-2 col-lg-2 text-nowrap modal-open text-left">Correo:</span>
                    <span class="col-xs-12 col-sm-9 col-md-5 col-lg-4 text-nowrap modal-open text-left"><?php echo $segur_emp[4];?></span>
                    <span class="col-xs-12 col-sm-3 col-md-1 col-lg-1 text-nowrap modal-open text-left">WEB:</span>
                    <span class="col-xs-12 col-sm-9 col-md-4 col-lg-5 text-nowrap modal-open text-left"><?php echo $segur_emp[7];?></span>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <span class="col-xs-12 col-sm-3 col-md-2 col-lg-2 text-nowrap modal-open text-left">Horario Atención:</span>
                    <span class="col-xs-12 col-sm-9 col-md-10 col-lg-10 text-nowrap modal-open text-left"><?php echo $segur_emp[5];?></span>
                </div>
                <div class="clearfix">&nbsp;</div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <button type="button" class="btn btn-default pull-right" data-id="<?php echo $segur_emp[6];?>" data-quien="7">Eliminar</button>
                    <button type="button" class="btn btn-default pull-right" style="margin-right: 5px;" data-id="<?php echo $segur_emp[6];?>" data-quien="7">Editar</button>
                </div>
            </div>
        </div><?php 
    }
    if($segur_gen){?>
        <!-- Suplentes -->
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 alert alert-danger"><?php 
            for($i = 0; $i < count($segur_gen); $i++){?>
                <div class="col-xs-12 text-center mieconsejo"><?php 
                    if($segur_gen[$i][0]){$src_gen = $segur_gen[$i][0];}
                    else{$src_gen = imagenDefault();}?>
                    <img src="<?php echo $src_gen;?>" class="img-responsive fotocomite2" alt="Image">
                    <div class="iconos-edit hidden">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true" alt="Editar Registro" title="Editar Registro" data-id="<?php echo $segur_gen[$i][6];?>" data-quien="7"></span>
                        <span class="glyphicon glyphicon-remove" aria-hidden="true" alt="Eliminar Registro" title="Eliminar Registro" data-id="<?php echo $segur_gen[$i][6];?>" data-quien="7"></span>
                    </div>
                    <div class="bgreen text-center datacomite"><?php echo $segur_gen[$i][1]; ?></div>
                </div><?php 
            }?>
        </div><?php 
    }
    if((!$segur_emp) && (!$segur_gen)){?>
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