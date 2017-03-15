<?php session_start();
require_once ("../conexion/conexion.php");
require_once ("../php/funciones.php");
//////////////////////////////////////////////////////////////////////////////////////
// Aplicación PHP usando Bootstrap, jquery, HTML5 y CSS - PH                        //
// Copyright 2014 Wilson Giovanny Velandia Barreto 3204274564 - willyv78@gmail.com  //
//////////////////////////////////////////////////////////////////////////////////////
$admin_all = false;
$admin_emp = array();
$admin_gen = array();
$admin_del = array();
$res_admin = registroCampo("rmb_residente r", "r.rmb_residente_id, r.rmb_residente_nom, r.rmb_residente_ape, r.rmb_carg_id, r.rmb_residente_foto, r.rmb_residente_nom2, r.rmb_residente_tel, r.rmb_residente_cel, r.rmb_residente_dir, r.rmb_residente_email, r.rmb_residente_obs, rmb_residente_perm", "WHERE rmb_residente_pers > 0 AND (r.rmb_carg_id = '13' OR  r.rmb_carg_id = '14' OR r.rmb_carg_id = '15')", "", "ORDER BY r.rmb_carg_id ASC");
if($res_admin){
    $admin_all = true;
    if(mysql_num_rows($res_admin) > 0){
        while ($row_admin = mysql_fetch_array($res_admin)) {
            if($row_admin[3] == '13'){
                $admin_emp = [$row_admin[5], $row_admin[1]." ".$row_admin[2], $row_admin[6], $row_admin[7], $row_admin[9], $row_admin[10], $row_admin[0], $row_admin[11]];
            }
            elseif($row_admin[3] == '14'){
                $admin_gen = [$row_admin[4], $row_admin[1]." ".$row_admin[2], $row_admin[6], $row_admin[7], $row_admin[9], $row_admin[10], $row_admin[0], $row_admin[11]];
            }
            elseif($row_admin[3] == '15'){
                $admin_del = [$row_admin[4], $row_admin[1]." ".$row_admin[2], $row_admin[6], $row_admin[7], $row_admin[9], $row_admin[10], $row_admin[0], $row_admin[11]];
            }
        }
    }
}
if($admin_all){
    if($admin_emp){?>
        <!-- Revisor fiscal Empresa -->
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 info-contador">
            <!-- Información Revisor fiscal Empresa -->
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 info-emp">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 linea-bottom">
                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-2 text-left">Empresa:</div>
                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-4 text-left"><?php echo $admin_emp[0];?></div>
                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-2 text-left">Contacto:</div>
                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-4 text-left"><?php echo $admin_emp[1];?></div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 linea-bottom">
                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-2 text-left">Teléfono:</div>
                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-4 text-left"><?php echo $admin_emp[2];?></div>
                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-2 text-left">Celular:</div>
                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-4 text-left"><?php echo $admin_emp[3];?></div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 linea-bottom">
                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-2 text-left">Correo:</div>
                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-4 text-left"><?php echo $admin_emp[4];?></div>
                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-2 text-left">WEB:</div>
                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-4 text-left"><?php echo $admin_emp[7];?></div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 linea-bottom-last">
                    <span class="col-xs-12 col-sm-3 col-md-2 col-lg-2 text-nowrap modal-open text-left">Horario Atención:</span>
                    <span class="col-xs-12 col-sm-9 col-md-10 col-lg-10 text-nowrap modal-open text-left"><?php echo $admin_emp[5];?></span>
                </div>
                <div class="clearfix">&nbsp;</div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <button type="button" class="btn btn-default pull-right" data-id="<?php echo $admin_emp[6];?>" data-quien="6">Eliminar</button>
                    <button type="button" class="btn btn-default pull-right" style="margin-right: 5px;" data-id="<?php echo $admin_emp[6];?>" data-quien="6">Editar</button>
                    <button type="button" class="btn btn-default pull-right" data-quien="6">Nuevo</button>
                </div>
            </div>
        </div><?php 
    }
    if($admin_gen){?>
        <!-- Contador titular -->
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 info-contador">
            <!-- datos del contador -->
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 linea-bottom">
                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-2 text-left">Revisor General:</div>
                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-4 text-left"><?php echo $admin_gen[1];?></div>
                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-2 text-left">Teléfono:</div>
                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-4 text-left"><?php echo $admin_gen[2];?></div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 linea-bottom-last">
                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-2 text-left">Correo:</div>
                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-4 text-left"><?php echo $admin_gen[4];?></div>
                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-2 text-left">Celular:</div>
                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-1 text-left"><?php echo $admin_gen[3];?></div>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-3">
                        <button type="button" class="btn btn-default pull-right" data-id="<?php echo $admin_gen[6];?>" data-quien="6" style="margin-right: -265px">Eliminar</button>
                        <button type="button" class="btn btn-default pull-right" style="margin-right: -185px;" data-id="<?php echo $admin_gen[6];?>" data-quien="6">Editar</button>
                        <button type="button" class="btn btn-default pull-right" data-quien="6" style="margin-right: -120px;">Nuevo</button>
                    </div>
                </div>
            </div>
        </div><?php 
    }
    if($admin_del){?>
        <!-- Contador Delegado -->
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 info-contador">
            <!-- Información del contador delegado -->
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 linea-bottom">
                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-2 text-left">Rev. Delegado:</div>
                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-4 text-left"><?php echo $admin_del[1];?></div>
                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-2 text-left">Teléfono:</div>
                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-4 text-left"><?php echo $admin_del[2];?></div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 linea-bottom-last">
                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-2 text-left">Correo:</div>
                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-4 text-left"><?php echo $admin_del[4];?></div>
                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-2 text-left">Celular:</div>
                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-1 text-left"><?php echo $admin_del[3];?></div>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-3">
                        <button type="button" class="btn btn-default pull-right" data-id="<?php echo $admin_del[6];?>" data-quien="6" style="margin-right: -265px">Eliminar</button>
                        <button type="button" class="btn btn-default pull-right" style="margin-right: -185px;" data-id="<?php echo $admin_del[6];?>" data-quien="6">Editar</button>
                        <button type="button" class="btn btn-default pull-right" data-quien="6" style="margin-right: -120px;">Nuevo</button>
                    </div>
                </div>
            </div>
        </div><?php 
    }
    if((!$admin_emp) && (!$admin_gen) && (!$admin_del)){?>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 alert alert-danger">No hay administrador registrado</div><?php 
    }
}
else{?>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">Error en la consulta</div><?php 
}?>
<script>
    $(document).ready(function() {
        cargarPerfil();
    });
</script>
<!-- FIN Pagina primera pestaña -->