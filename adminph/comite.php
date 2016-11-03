<?php session_start();
require_once ("../conexion/conexion.php");
require_once ("../php/funciones.php");
//////////////////////////////////////////////////////////////////////////////////////
// Aplicación PHP usando Bootstrap, jquery, HTML5 y CSS - PH                        //
// Copyright 2014 Wilson Giovanny Velandia Barreto 3204274564 - willyv78@gmail.com  //
//////////////////////////////////////////////////////////////////////////////////////
$comite_all = false;
$comite_pre = array();
$comite_vic = array();
$comite_tit = array();
$comite_del = array();
$res_comite = registroCampo("rmb_residente r", "r.rmb_residente_id, r.rmb_residente_nom, r.rmb_residente_ape, r.rmb_carg_id, a.rmb_aptos_nom, r.rmb_residente_foto", "LEFT JOIN rmb_residente_x_aptos rxa USING(rmb_residente_id) LEFT JOIN rmb_aptos a USING(rmb_aptos_id) WHERE rmb_residente_pers > 0 AND (r.rmb_carg_id = '6' OR  r.rmb_carg_id = '7' OR r.rmb_carg_id = '22' OR r.rmb_carg_id = '23')", "", "ORDER BY r.rmb_carg_id ASC");
if($res_comite){
    $comite_all = true;
    if(mysql_num_rows($res_comite) > 0){

        while ($row_comite = mysql_fetch_array($res_comite)) {
            if($row_comite[3] == '22'){
                $comite_pre = [$row_comite[0], $row_comite[1], $row_comite[4], $row_comite[5]];
            }
            elseif($row_comite[3] == '23'){
                $comite_vic = [$row_comite[0], $row_comite[1], $row_comite[4], $row_comite[5]];
            }
            elseif($row_comite[3] == '6'){
                $comite_tit[] = [$row_comite[0], $row_comite[1], $row_comite[4], $row_comite[5]];
            }
            elseif($row_comite[3] == '7'){
                $comite_del[] = [$row_comite[0], $row_comite[1], $row_comite[4], $row_comite[5]];
            }
        }
    }
}?>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="margin-bottom: 5px;">
    <button type="button" class="btn btn-default pull-right" data-quien="3">Nuevo</button>
</div><?php 
if($comite_all){
    if(($comite_pre) || ($comite_vic) || ($comite_tit)){?>
        <!-- Titulares -->
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 alert alert-info">
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 text-center imgcomite">
                <img src="../images/CONVIVENCIA.png" class="img-responsive" alt="Image">
            </div><?php 
        if($comite_pre){?>
            <div class="col-xs-12 text-center miecomite"><?php 
                if($comite_pre[3]){$src_pre = $comite_pre[3];}
                else{$src_pre = imagenDefault();}?>
                <img src="<?php echo $src_pre;?>" class="img-responsive fotocomite" alt="Image" >
                <div class="iconos-edit hidden">
                    <span class="glyphicon glyphicon-pencil" aria-hidden="true" alt="Editar Registro" title="Editar Registro" data-id="<?php echo $comite_pre[0];?>" data-quien="3"></span>
                    <span class="glyphicon glyphicon-remove" aria-hidden="true" alt="Eliminar Registro" title="Eliminar Registro" data-id="<?php echo $comite_pre[0];?>" data-quien="3"></span>
                </div>
                <div class="blightblue text-center datacomite">Presidente<br><?php echo $comite_pre[1]; ?><br>Apto <?php echo $comite_pre[2]; ?></div>
            </div><?php 
        }
        if($comite_vic){?>
            <div class="col-xs-12 text-center miecomite"><?php 
                if($comite_vic[3]){$src_vic = $comite_vic[3];}
                else{$src_vic = imagenDefault();}?>
                <img src="<?php echo $src_vic;?>" class="img-responsive fotocomite" alt="Image" >
                <div class="iconos-edit hidden">
                    <span class="glyphicon glyphicon-pencil" aria-hidden="true" alt="Editar Registro" title="Editar Registro" data-id="<?php echo $comite_vic[0];?>" data-quien="3"></span>
                    <span class="glyphicon glyphicon-remove" aria-hidden="true" alt="Eliminar Registro" title="Eliminar Registro" data-id="<?php echo $comite_vic[0];?>" data-quien="3"></span>
                </div>
                <div class="blightblue text-center datacomite">Vice-Presidente<br><?php echo $comite_vic[1]; ?><br>Apto <?php echo $comite_vic[2]; ?></div>
            </div><?php 
        }
        if($comite_tit){
            for($i = 0; $i < count($comite_tit); $i++){?>
                <div class="col-xs-12 text-center miecomite"><?php 
                    if($comite_tit[$i][3]){$src_tit = $comite_tit[$i][3];}
                    else{$src_tit = imagenDefault();}?>
                    <img src="<?php echo $src_tit;?>" class="img-responsive fotocomite" alt="Image">
                    <div class="iconos-edit hidden">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true" alt="Editar Registro" title="Editar Registro" data-id="<?php echo $comite_tit[$i][0];?>" data-quien="3"></span>
                        <span class="glyphicon glyphicon-remove" aria-hidden="true" alt="Eliminar Registro" title="Eliminar Registro" data-id="<?php echo $comite_tit[$i][0];?>" data-quien="3"></span>
                    </div>
                    <div class="blightblue text-center datacomite">Titular<br><?php echo $comite_tit[$i][1]; ?><br>Apto <?php echo $comite_tit[$i][2]; ?></div>
                </div><?php 
            }
        }
        if((!$comite_pre) && (!$comite_vic) && (!$comite_tit) && (!$comite_del)){?>
            <div class="col-xs-12 col-sm-6 col-md-8 col-lg-8">No hay miembros del comite registrados</div><?php 
        }?>
        </div><?php 
    }
    if($comite_del){?>
        <!-- Suplentes -->
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 alert alert-danger">
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 text-center imgcomite">
                <img src="../images/CONVIVENCIA2.png" class="img-responsive" alt="Image">
            </div><?php 
            for($i = 0; $i < count($comite_del); $i++){?>
                <div class="col-xs-12 text-center miecomite"><?php 
                    if($comite_del[$i][3]){$src_del = $comite_del[$i][3];}
                    else{$src_del = imagenDefault();}?>
                    <img src="<?php echo $src_del;?>" class="img-responsive fotocomite2" alt="Image">
                    <div class="iconos-edit hidden">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true" alt="Editar Registro" title="Editar Registro" data-id="<?php echo $comite_del[$i][0];?>" data-quien="3"></span>
                        <span class="glyphicon glyphicon-remove" aria-hidden="true" alt="Eliminar Registro" title="Eliminar Registro" data-id="<?php echo $comite_del[$i][0];?>" data-quien="3"></span>
                    </div>
                    <div class="bgreen text-center datacomite">Suplente<br><?php echo $comite_del[$i][1]; ?><br>Apto <?php echo $comite_del[$i][2]; ?></div>
                    <div class="clearfix">&nbsp;</div>
                </div><?php 
            }?>
        </div><?php 
    }
}?>
<script>
    $(document).ready(function() {
        cargarPerfil();
    });
</script>
<!-- FIN Pagina primera pestaña -->











