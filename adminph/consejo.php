<?php session_start();
require_once ("../conexion/conexion.php");
require_once ("../php/funciones.php");
//////////////////////////////////////////////////////////////////////////////////////
// Aplicación PHP usando Bootstrap, jquery, HTML5 y CSS - PH                        //
// Copyright 2014 Wilson Giovanny Velandia Barreto 3204274564 - willyv78@gmail.com  //
//////////////////////////////////////////////////////////////////////////////////////
$consejo_all = false;
$consejo_pre = array();
$consejo_vic = array();
$consejo_tit = array();
$consejo_del = array();
$res_consejo = registroCampo("rmb_residente r", "r.rmb_residente_id, r.rmb_residente_nom, r.rmb_residente_ape, r.rmb_carg_id, a.rmb_aptos_nom, r.rmb_residente_foto", "LEFT JOIN rmb_residente_x_aptos rxa USING(rmb_residente_id) LEFT JOIN rmb_aptos a USING(rmb_aptos_id) WHERE r.rmb_carg_id = '8' OR  r.rmb_carg_id = '9' OR r.rmb_carg_id = '20' OR r.rmb_carg_id = '21'", "", "ORDER BY r.rmb_carg_id ASC");
if($res_consejo){
    $consejo_all = true;
    if(mysql_num_rows($res_consejo) > 0){
        while ($row_consejo = mysql_fetch_array($res_consejo)) {
            if($row_consejo[3] == '20'){
                $consejo_pre = [$row_consejo[0], $row_consejo[1], $row_consejo[2], $row_consejo[4], $row_consejo[5]];
            }
            elseif($row_consejo[3] == '21'){
                $consejo_vic = [$row_consejo[0], $row_consejo[1], $row_consejo[2], $row_consejo[4], $row_consejo[5]];
            }
            elseif($row_consejo[3] == '8'){
                $consejo_tit[] = [$row_consejo[0], $row_consejo[1], $row_consejo[2], $row_consejo[4], $row_consejo[5]];
            }
            elseif($row_consejo[3] == '9'){
                $consejo_del[] = [$row_consejo[0], $row_consejo[1], $row_consejo[2], $row_consejo[4], $row_consejo[5]];
            }
        }
    }
}
if($consejo_all){
    if(($consejo_pre) || ($consejo_vic) || ($consejo_tit)){?>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <?php 
        if($consejo_pre){?>
            <div class="col-xs-12 text-center mieconsejo">
                <div class="text-center dataconsejo consejopresidente">Presidente<br><?php echo $consejo_pre[1];?><br><?php echo $consejo_pre[2];?><br>Apto <?php echo $consejo_pre[3];?></div>
                <div class="iconos-edit-consejo-comite hidden">
                    <span class="glyphicon glyphicon-pencil" aria-hidden="true" alt="Editar Registro" title="Editar Registro" data-id="<?php echo $consejo_pre[0];?>" data-quien="2"></span>
                    <span class="glyphicon glyphicon-remove" aria-hidden="true" alt="Eliminar Registro" title="Eliminar Registro" data-id="<?php echo $consejo_pre[0];?>" data-quien="2"></span>
                </div>
            </div><?php 
        }
        if($consejo_vic){?>
            <div class="col-xs-12 text-center mieconsejo">
                <div class="text-center dataconsejo consejovicepresidente">Vice-Presidente<br><?php echo $consejo_vic[1];?><br><?php echo $consejo_vic[2];?><br>Apto <?php echo $consejo_vic[3];?></div>
                <div class="iconos-edit-consejo-comite hidden">
                    <span class="glyphicon glyphicon-pencil" aria-hidden="true" alt="Editar Registro" title="Editar Registro" data-id="<?php echo $consejo_vic[0];?>" data-quien="2"></span>
                    <span class="glyphicon glyphicon-remove" aria-hidden="true" alt="Eliminar Registro" title="Eliminar Registro" data-id="<?php echo $consejo_vic[0];?>" data-quien="2"></span>
                </div>
            </div><?php 
        }
        if($consejo_tit){
            for($i = 0; $i < count($consejo_tit); $i++){?>
                <div class="col-xs-12 text-center mieconsejo">
                    <div class="text-center dataconsejo consejotitular">Titular<br><?php echo $consejo_tit[$i][1]; ?><br><?php echo $consejo_tit[$i][2]; ?><br>Apto <?php echo $consejo_tit[$i][3]; ?></div>
                    <div class="iconos-edit-consejo-comite hidden">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true" alt="Editar Registro" title="Editar Registro" data-id="<?php echo $consejo_tit[$i][0];?>" data-quien="2"></span>
                        <span class="glyphicon glyphicon-remove" aria-hidden="true" alt="Eliminar Registro" title="Eliminar Registro" data-id="<?php echo $consejo_tit[$i][0];?>" data-quien="2"></span>
                    </div>
                </div><?php 
            }
        }
        if((!$consejo_pre) && (!$consejo_vic) && (!$consejo_tit) && (!$consejo_del)){?>
            <div class="col-xs-12 col-sm-6 col-md-8 col-lg-8">No hay miembros del consejo registrados</div><?php 
        }?>
        </div><?php 
    }
    if($consejo_del){?>
        <!-- Suplentes -->
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <!-- <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 text-center imgconsejo">
            </div> -->
            <?php 
            for($i = 0; $i < count($consejo_del); $i++){?>
                <div class="col-xs-12 text-center mieconsejo">
                    <div class="text-center dataconsejo consejodelegado">Suplente<br><?php echo $consejo_del[$i][1];?><br><?php echo $consejo_del[$i][2];?><br>Apto <?php echo $consejo_del[$i][3]; ?></div>
                    <div class="iconos-edit-consejo-comite hidden">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true" alt="Editar Registro" title="Editar Registro" data-id="<?php echo $consejo_del[$i][0];?>" data-quien="2"></span>
                        <span class="glyphicon glyphicon-remove" aria-hidden="true" alt="Eliminar Registro" title="Eliminar Registro" data-id="<?php echo $consejo_del[$i][0];?>" data-quien="2"></span>
                    </div>
                </div><?php 
            }?>
        </div><?php 
    }
    if((!$consejo_pre) && (!$consejo_vic) && (!$consejo_tit) && (!$consejo_del)){?>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 alert alert-danger">No hay miembros del consejo registrados</div><?php 
    }
}
else{?>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 alert alert-danger">Error en la consulta</div><?php 
}?>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="margin-bottom: 5px;">
    <button type="button" class="btn btn-default pull-right" data-quien="2">Nuevo</button>
</div>
<!-- jQuery -->
<script src="../js/jquery.min.js"></script>
<script src="../js/sweet-alert.js"></script>
<script src="../js/bootstrapValidator.js"></script>
<script>
    $(document).ready(function() {
        cargarConsejoComite();
    });
</script>
<!-- FIN Pagina primera pestaña -->