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
$res_admin = registroCampo("rmb_residente r", "r.rmb_residente_id, r.rmb_residente_nom, r.rmb_residente_ape, r.rmb_carg_id, r.rmb_residente_foto, r.rmb_residente_nom2, r.rmb_residente_tel, r.rmb_residente_cel, r.rmb_residente_dir, r.rmb_residente_email, r.rmb_residente_obs, rmb_residente_perm", "WHERE rmb_residente_pers > 0 AND (r.rmb_carg_id = '3' OR  r.rmb_carg_id = '4' OR r.rmb_carg_id = '5')", "", "ORDER BY r.rmb_carg_id ASC");
if($res_admin){
    $admin_all = true;
    if(mysql_num_rows($res_admin) > 0){
        while ($row_admin = mysql_fetch_array($res_admin)) {
            if($row_admin[3] == '3'){
                $admin_emp = [$row_admin[5], $row_admin[1]." ".$row_admin[2], $row_admin[6], $row_admin[7], $row_admin[9], $row_admin[10], $row_admin[0], $row_admin[11]];
            }
            elseif($row_admin[3] == '4'){
                $admin_gen = [$row_admin[4], $row_admin[1]." ".$row_admin[2], $row_admin[6], $row_admin[7], $row_admin[9], $row_admin[10], $row_admin[0], $row_admin[11]];
            }
            elseif($row_admin[3] == '5'){
                $admin_del = [$row_admin[4], $row_admin[1]." ".$row_admin[2], $row_admin[6], $row_admin[7], $row_admin[9], $row_admin[10], $row_admin[0], $row_admin[11]];
            }
        }
    }
}?>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="margin-bottom: 5px;">
    <button type="button" class="btn btn-default pull-right" data-quien="1">Nuevo</button>
</div><?php 
if($admin_all){
    if($admin_emp){?>
        <!-- Administrador Empresa -->
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 alert alert-warning">
            <!-- Imagen Administrador Empresa -->
            <div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
                <img src="../images/ADMON2.png" class="img-responsive admon2" alt="Image">
            </div>
            <!-- Información Administrador Empresa -->
            <div class="col-xs-12 col-sm-8 col-md-9 col-lg-9 info-emp">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <span class="col-xs-12 col-sm-3 col-md-2 col-lg-2 text-nowrap modal-open text-left">Empresa:</span>
                    <span class="col-xs-12 col-sm-9 col-md-10 col-lg-10 text-nowrap modal-open text-left"><?php echo $admin_emp[0];?></span>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <span class="col-xs-12 col-sm-3 col-md-2 col-lg-2 text-nowrap modal-open text-left">Contacto:</span>
                    <span class="col-xs-12 col-sm-9 col-md-5 col-lg-4 text-nowrap modal-open text-left"> <?php echo $admin_emp[1];?></span>
                    <span class="col-xs-12 col-sm-3 col-md-1 col-lg-1 text-nowrap modal-open text-left">Tel:</span>
                    <span class="col-xs-12 col-sm-9 col-md-4 col-lg-2 text-nowrap modal-open text-left"><?php echo $admin_emp[2];?></span>
                    <span class="col-xs-12 col-sm-3 col-md-2 col-lg-1 text-nowrap modal-open text-left">Cel:</span>
                    <span class="col-xs-12 col-sm-9 col-md-4 col-lg-2 text-nowrap modal-open text-left"><?php echo $admin_emp[3];?></span>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <span class="col-xs-12 col-sm-3 col-md-2 col-lg-2 text-nowrap modal-open text-left">Correo:</span>
                    <span class="col-xs-12 col-sm-9 col-md-5 col-lg-4 text-nowrap modal-open text-left"><?php echo $admin_emp[4];?></span>
                    <span class="col-xs-12 col-sm-3 col-md-1 col-lg-1 text-nowrap modal-open text-left">WEB:</span>
                    <span class="col-xs-12 col-sm-9 col-md-4 col-lg-5 text-nowrap modal-open text-left"><?php echo $admin_emp[7];?></span>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <span class="col-xs-12 col-sm-3 col-md-2 col-lg-2 text-nowrap modal-open text-left">Horario Atención:</span>
                    <span class="col-xs-12 col-sm-9 col-md-10 col-lg-10 text-nowrap modal-open text-left"><?php echo $admin_emp[5];?></span>
                </div>
                <div class="clearfix">&nbsp;</div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <button type="button" class="btn btn-default pull-right" data-id="<?php echo $admin_emp[6];?>" data-quien="1">Eliminar</button>
                    <button type="button" class="btn btn-default pull-right" style="margin-right: 5px;" data-id="<?php echo $admin_emp[6];?>" data-quien="1">Editar</button>
                </div>
            </div>
        </div><?php 
    }
    if($admin_gen){?>
        <!-- Administrador General -->
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 alert alert-info">
            <!-- Imagen administrador General -->
            <div class="col-xs-12 col-sm-4 col-md-3 col-lg-3"><?php 
                if($admin_gen[0]){$src_gen = $admin_gen[0];}
                else{$src_gen = imagenDefault();}?>
                <img src="../images/ADMON2.png" class="img-responsive admon2" alt="Image">
                <img src="<?php echo $src_gen;?>" class="img-responsive fotoadmin" alt="Image">
            </div>
            <!-- Información administrador General -->
            <div class="col-xs-12 col-sm-8 col-md-9 col-lg-9 info-gen">
                <!-- Información Administrador General -->
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <span class="col-xs-12 col-sm-3 col-md-2 col-lg-2 text-nowrap modal-open text-left">Admin. General:</span>
                    <span class="col-xs-12 col-sm-9 col-md-4 col-lg-2 text-nowrap modal-open text-left"><?php echo $admin_gen[1];?></span>
                    <span class="col-xs-12 col-sm-3 col-md-2 col-lg-2 text-nowrap modal-open text-left">Teléfono:</span>
                    <span class="col-xs-12 col-sm-9 col-md-4 col-lg-2 text-nowrap modal-open text-left"><?php echo $admin_gen[2];?></span>
                    <span class="col-xs-12 col-sm-3 col-md-2 col-lg-2 text-nowrap modal-open text-left">Cel:</span>
                    <span class="col-xs-12 col-sm-9 col-md-4 col-lg-2 text-nowrap modal-open text-left"><?php echo $admin_gen[3];?></span>
                    <span class="col-xs-12 col-sm-3 col-md-2 col-lg-2 text-nowrap modal-open text-left">Correo:</span>
                    <span class="col-xs-12 col-sm-9 col-md-4 col-lg-10 text-nowrap modal-open text-left"><?php echo $admin_gen[4];?></span>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <span class="col-xs-12 col-sm-3 col-md-2 col-lg-2 text-nowrap modal-open text-left">Horario Atención:</span>
                    <span class="col-xs-12 col-sm-9 col-md-10 col-lg-10 text-nowrap modal-open text-left"><?php echo $admin_gen[5];?></span>
                </div>
                <div class="clearfix">&nbsp;</div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <button type="button" class="btn btn-default pull-right" data-id="<?php echo $admin_gen[6];?>" data-quien="1">Eliminar</button>
                    <button type="button" class="btn btn-default pull-right" style="margin-right: 5px;" data-id="<?php echo $admin_gen[6];?>" data-quien="1">Editar</button>
                </div>
            </div>
        </div><?php 
    }
    if($admin_del){?>
        <!-- Administrador delegado -->
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 alert alert-danger">
            <!-- Imagen administrador delegado -->
            <div class="col-xs-12 col-sm-4 col-md-3 col-lg-3"><?php 
                if($admin_del[0]){$src_del = $admin_del[0];}
                else{$src_del = imagenDefault();}?>
                <img src="../images/ADMON2.png" class="img-responsive admon2" alt="Image">
                <img src="<?php echo $src_del;?>" class="img-responsive fotoadmin" alt="Image">
            </div>
            <!-- Información administrador delegado -->
            <div class="col-xs-12 col-sm-8 col-md-9 col-lg-9 info-gen">
                <!-- Información Administrador delegado -->
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <span class="col-xs-12 col-sm-3 col-md-2 col-lg-2 text-nowrap modal-open text-left">Admin. Delegado:</span>
                    <span class="col-xs-12 col-sm-9 col-md-4 col-lg-2 text-nowrap modal-open text-left"><?php echo $admin_del[1];?></span>
                    <span class="col-xs-12 col-sm-3 col-md-2 col-lg-2 text-nowrap modal-open text-left">Teléfono:</span>
                    <span class="col-xs-12 col-sm-9 col-md-4 col-lg-2 text-nowrap modal-open text-left"><?php echo $admin_del[2];?></span>
                    <span class="col-xs-12 col-sm-3 col-md-2 col-lg-2 text-nowrap modal-open text-left">Cel:</span>
                    <span class="col-xs-12 col-sm-9 col-md-4 col-lg-2 text-nowrap modal-open text-left"><?php echo $admin_del[3];?></span>
                    <span class="col-xs-12 col-sm-3 col-md-2 col-lg-2 text-nowrap modal-open text-left">Correo:</span>
                    <span class="col-xs-12 col-sm-9 col-md-4 col-lg-10 text-nowrap modal-open text-left"><?php echo $admin_del[4];?></span>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <span class="col-xs-12 col-sm-3 col-md-2 col-lg-2 text-nowrap modal-open text-left">Horario Atención:</span>
                    <span class="col-xs-12 col-sm-9 col-md-10 col-lg-10 text-nowrap modal-open text-left"><?php echo $admin_del[5];?></span>
                </div>
                <div class="clearfix">&nbsp;</div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <button type="button" class="btn btn-default pull-right" data-id="<?php echo $admin_emp[6];?>" data-quien="1">Eliminar</button>
                    <button type="button" class="btn btn-default pull-right" style="margin-right: 5px;" data-id="<?php echo $admin_emp[6];?>" data-quien="1">Editar</button>
                </div>
            </div>
        </div><?php 
    }
    if((!$admin_emp) && (!$admin_gen) && (!$admin_del)){?>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 alert alert-danger">No hay administrador registrado</div><?php 
    }
}
else{?>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 alert alert-danger">Error en la consulta</div><?php 
}?>
<script>
    $(document).ready(function() {cargarPerfil();});
</script>
<!-- FIN Pagina primera pestaña -->