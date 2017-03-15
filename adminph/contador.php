<?php session_start();
require_once ("../conexion/conexion.php");
require_once ("../php/funciones.php");
//////////////////////////////////////////////////////////////////////////////////////
// Aplicación PHP usando Bootstrap, jquery, HTML5 y CSS - PH                        //
// Copyright 2014 Wilson Giovanny Velandia Barreto 3204274564 - willyv78@gmail.com  //
//////////////////////////////////////////////////////////////////////////////////////
$conta_all = false;
$conta_emp = array();
$conta_gen = array();
$conta_del = array();
$res_conta = registroCampo("rmb_residente r", "r.rmb_residente_id, r.rmb_residente_nom, r.rmb_residente_ape, r.rmb_carg_id, r.rmb_residente_foto, r.rmb_residente_nom2, r.rmb_residente_tel, r.rmb_residente_cel, r.rmb_residente_dir, r.rmb_residente_email, r.rmb_residente_obs, rmb_residente_perm", "WHERE rmb_residente_pers > 0 AND (r.rmb_carg_id = '10' OR  r.rmb_carg_id = '11' OR r.rmb_carg_id = '12')", "", "ORDER BY r.rmb_carg_id ASC");
if($res_conta){
    $conta_all = true;
    if(mysql_num_rows($res_conta) > 0){
        while ($row_conta = mysql_fetch_array($res_conta)) {
            if($row_conta[3] == '10'){
                $conta_emp = [$row_conta[5], $row_conta[1]." ".$row_conta[2], $row_conta[6], $row_conta[7], $row_conta[9], $row_conta[10], $row_conta[0], $row_conta[11]];
            }
            elseif($row_conta[3] == '11'){
                $conta_gen = [$row_conta[4], $row_conta[1]." ".$row_conta[2], $row_conta[6], $row_conta[7], $row_conta[9], $row_conta[10], $row_conta[0], $row_conta[11]];
            }
            elseif($row_conta[3] == '12'){
                $conta_del = [$row_conta[4], $row_conta[1]." ".$row_conta[2], $row_conta[6], $row_conta[7], $row_conta[9], $row_conta[10], $row_conta[0], $row_conta[11]];
            }
        }
    }
}
if($conta_all){
    if($conta_emp){?>
        <!-- Administrador Empresa -->
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 info-contador">
            <!-- Información Administrador Empresa -->
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 info-emp">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 linea-bottom">
                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-2 text-left">Empresa:</div>
                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-4 text-left"><?php echo $conta_emp[0];?></div>
                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-2 text-left">Contacto:</div>
                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-4 text-left"><?php echo $conta_emp[1];?></div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 linea-bottom">
                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-2 text-left">Teléfono:</div>
                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-4 text-left"><?php echo $conta_emp[2];?></div>
                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-2 text-left">Celular:</div>
                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-4 text-left"><?php echo $conta_emp[3];?></div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 linea-bottom">
                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-2 text-left">Correo:</div>
                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-4 text-left"><?php echo $conta_emp[4];?></div>
                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-2 text-left">WEB:</div>
                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-4 text-left"><?php echo $conta_emp[7];?></div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 linea-bottom-last">
                    <span class="col-xs-12 col-sm-3 col-md-2 col-lg-2 text-nowrap modal-open text-left">Horario Atención:</span>
                    <span class="col-xs-12 col-sm-9 col-md-10 col-lg-10 text-nowrap modal-open text-left"><?php echo $conta_emp[5];?></span>
                </div>
                <div class="clearfix">&nbsp;</div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <button type="button" class="btn btn-default pull-right" data-id="<?php echo $conta_emp[6];?>" data-quien="5">Eliminar</button>
                    <button type="button" class="btn btn-default pull-right" style="margin-right: 5px;" data-id="<?php echo $conta_emp[6];?>" data-quien="5">Editar</button>
                    <button type="button" class="btn btn-default pull-right" data-quien="5">Nuevo</button>
                </div>
            </div>
        </div><?php 
    }
    if($conta_gen){?>
        <!-- Contador titular -->
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 info-contador">
            <!-- datos del contador -->
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 linea-bottom">
                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-2 text-left">Contador General:</div>
                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-4 text-left"><?php echo $conta_gen[1];?></div>
                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-2 text-left">Teléfono:</div>
                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-4 text-left"><?php echo $conta_gen[2];?></div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 linea-bottom-last">
                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-2 text-left">Correo:</div>
                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-4 text-left"><?php echo $conta_gen[4];?></div>
                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-2 text-left">Celular:</div>
                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-1 text-left"><?php echo $conta_gen[3];?></div>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-3">
                        <button type="button" class="btn btn-default pull-right" data-id="<?php echo $conta_gen[6];?>" data-quien="5" style="margin-right: -265px">Eliminar</button>
                        <button type="button" class="btn btn-default pull-right" style="margin-right: -185px;" data-id="<?php echo $conta_gen[6];?>" data-quien="5">Editar</button>
                        <button type="button" class="btn btn-default pull-right" data-quien="5" style="margin-right: -120px;">Nuevo</button>
                    </div>
                </div>
            </div>
        </div><?php 
    }
    if($conta_del){?>
        <!-- Contador Delegado -->
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 info-contador">
            <!-- Información del contador delegado -->
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 linea-bottom">
                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-2 text-left">Cont. Delegado:</div>
                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-4 text-left"><?php echo $conta_del[1];?></div>
                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-2 text-left">Teléfono:</div>
                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-4 text-left"><?php echo $conta_del[2];?></div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 linea-bottom-last">
                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-2 text-left">Correo:</div>
                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-4 text-left"><?php echo $conta_del[4];?></div>
                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-2 text-left">Celular:</div>
                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-1 text-left"><?php echo $conta_del[3];?></div>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-3">
                        <button type="button" class="btn btn-default pull-right" data-id="<?php echo $conta_del[6];?>" data-quien="5" style="margin-right: -265px">Eliminar</button>
                        <button type="button" class="btn btn-default pull-right" style="margin-right: -185px;" data-id="<?php echo $conta_del[6];?>" data-quien="5">Editar</button>
                        <button type="button" class="btn btn-default pull-right" data-quien="5" style="margin-right: -120px;">Nuevo</button>
                    </div>
                </div>
            </div>
        </div><?php 
    }
    if((!$conta_emp) && (!$conta_gen) && (!$conta_del)){?>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 alert alert-danger">No hay contador registrado</div><?php 
    }
}
else{?>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 alert alert-danger">Error en la consulta</div><?php 
}?>
<!-- jQuery -->
<script src="../js/jquery.min.js"></script>
<script src="../js/sweet-alert.js"></script><!-- Personalizar alertas -->
<script src="../js/bootstrapValidator.js"></script>
<script>
    $(document).ready(function() {cargarPerfil();});
</script>
<!-- FIN Pagina primera pestaña -->