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
}?>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="margin-bottom: 5px;">
    <button type="button" class="btn btn-default pull-right" data-quien="5">Nuevo</button>
</div><?php 
if($conta_all){
    if($conta_emp){?>
        <!-- Administrador Empresa -->
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 alert alert-warning">
            <!-- Imagen Administrador Empresa -->
            <div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
                <img src="../images/CONTADOR1.png" class="img-responsive admon2" alt="Image">
            </div>
            <!-- Información Administrador Empresa -->
            <div class="col-xs-12 col-sm-8 col-md-9 col-lg-9 info-emp">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <span class="col-xs-12 col-sm-3 col-md-2 col-lg-2 text-nowrap modal-open text-left">Empresa:</span>
                    <span class="col-xs-12 col-sm-9 col-md-10 col-lg-10 text-nowrap modal-open text-left"><?php echo $conta_emp[0];?></span>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <span class="col-xs-12 col-sm-3 col-md-2 col-lg-2 text-nowrap modal-open text-left">Contacto:</span>
                    <span class="col-xs-12 col-sm-9 col-md-5 col-lg-4 text-nowrap modal-open text-left"> <?php echo $conta_emp[1];?></span>
                    <span class="col-xs-12 col-sm-3 col-md-1 col-lg-1 text-nowrap modal-open text-left">Tel:</span>
                    <span class="col-xs-12 col-sm-9 col-md-4 col-lg-2 text-nowrap modal-open text-left"><?php echo $conta_emp[2];?></span>
                    <span class="col-xs-12 col-sm-3 col-md-2 col-lg-1 text-nowrap modal-open text-left">Cel:</span>
                    <span class="col-xs-12 col-sm-9 col-md-4 col-lg-2 text-nowrap modal-open text-left"><?php echo $conta_emp[3];?></span>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <span class="col-xs-12 col-sm-3 col-md-2 col-lg-2 text-nowrap modal-open text-left">Correo:</span>
                    <span class="col-xs-12 col-sm-9 col-md-5 col-lg-4 text-nowrap modal-open text-left"><?php echo $conta_emp[4];?></span>
                    <span class="col-xs-12 col-sm-3 col-md-1 col-lg-1 text-nowrap modal-open text-left">WEB:</span>
                    <span class="col-xs-12 col-sm-9 col-md-4 col-lg-5 text-nowrap modal-open text-left"><?php echo $conta_emp[7];?></span>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <span class="col-xs-12 col-sm-3 col-md-2 col-lg-2 text-nowrap modal-open text-left">Horario Atención:</span>
                    <span class="col-xs-12 col-sm-9 col-md-10 col-lg-10 text-nowrap modal-open text-left"><?php echo $conta_emp[5];?></span>
                </div>
                <div class="clearfix">&nbsp;</div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <button type="button" class="btn btn-default pull-right" data-id="<?php echo $conta_emp[6];?>" data-quien="5">Eliminar</button>
                    <button type="button" class="btn btn-default pull-right" style="margin-right: 5px;" data-id="<?php echo $conta_emp[6];?>" data-quien="5">Editar</button>
                </div>
            </div>
        </div><?php 
    }
    if($conta_gen){?>
        <!-- Contador titular -->
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 alert alert-info">
            <!-- imagen del contador -->
            <div class="col-xs-12 col-sm-4 col-md-3 col-lg-3"><?php 
                if($conta_gen[0]){$src_gen = $conta_gen[0];}
                else{$src_gen = imagenDefault();}?>
                <img src="../images/CONTADOR1.png" class="img-responsive admon2" alt="Image">
                <img src="<?php echo $src_gen;?>" class="img-responsive fotocontador" alt="Image">
            </div>
            <!-- datos del contador -->
            <div class="col-xs-12 col-sm-8 col-md-9 col-lg-9 info-gen">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <span class="col-xs-12 col-sm-3 col-md-2 col-lg-2 text-nowrap modal-open text-left">Contador General:</span>
                    <span class="col-xs-12 col-sm-9 col-md-5 col-lg-4 text-nowrap modal-open text-left"><?php echo $conta_gen[1];?></span>
                    <span class="col-xs-12 col-sm-3 col-md-1 col-lg-1 text-nowrap modal-open text-left">Tel:</span>
                    <span class="col-xs-12 col-sm-9 col-md-4 col-lg-2 text-nowrap modal-open text-left"><?php echo $conta_gen[2];?></span>
                    <span class="col-xs-12 col-sm-3 col-md-2 col-lg-1 text-nowrap modal-open text-left">Cel:</span>
                    <span class="col-xs-12 col-sm-9 col-md-3 col-lg-2 text-nowrap modal-open text-left"><?php echo $conta_gen[3];?></span>
                    <span class="col-xs-12 col-sm-3 col-md-2 col-lg-2 text-nowrap modal-open text-left">Correo:</span>
                    <span class="col-xs-12 col-sm-9 col-md-5 col-lg-10 text-nowrap modal-open text-left"><?php echo $conta_gen[4];?></span>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <span class="col-xs-12 col-sm-3 col-md-2 col-lg-2 text-nowrap modal-open text-left">Horario Atención:</span>
                    <span class="col-xs-12 col-sm-9 col-md-10 col-lg-10 text-nowrap modal-open text-left"><?php echo $conta_gen[5];?></span>
                </div>
                <div class="clearfix">&nbsp;</div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <button type="button" class="btn btn-default pull-right" data-id="<?php echo $conta_gen[6];?>" data-quien="5">Eliminar</button>
                    <button type="button" class="btn btn-default pull-right" style="margin-right: 5px;" data-id="<?php echo $conta_gen[6];?>" data-quien="5">Editar</button>
                </div>
            </div>
        </div><?php 
    }
    if($conta_del){?>
        <!-- Contador Delegado -->
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 alert alert-danger">
            <!-- imagen del contador delegado -->
            <div class="col-xs-12 col-sm-4 col-md-3 col-lg-3"><?php 
                if($conta_del[0]){$src_del = $conta_del[0];}
                else{$src_del = imagenDefault();}?>
                <img src="../images/CONTADOR2.png" class="img-responsive admon2" alt="Image">
                <img src="<?php echo $src_del;?>" class="img-responsive fotocontador" alt="Image">
            </div>
            <!-- Información del contador delegado -->
            <div class="col-xs-12 col-sm-8 col-md-9 col-lg-9 info-gen">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <span class="col-xs-12 col-sm-3 col-md-2 col-lg-2 text-nowrap modal-open text-left">Cont. Delegado:</span>
                    <span class="col-xs-12 col-sm-9 col-md-5 col-lg-4 text-nowrap modal-open text-left"><?php echo $conta_del[1];?></span>
                    <span class="col-xs-12 col-sm-3 col-md-1 col-lg-1 text-nowrap modal-open text-left">Tel:</span>
                    <span class="col-xs-12 col-sm-9 col-md-4 col-lg-2 text-nowrap modal-open text-left"><?php echo $conta_del[2];?></span>
                    <span class="col-xs-12 col-sm-3 col-md-2 col-lg-1 text-nowrap modal-open text-left">Cel:</span>
                    <span class="col-xs-12 col-sm-9 col-md-3 col-lg-2 text-nowrap modal-open text-left"><?php echo $conta_del[3];?></span>
                    <span class="col-xs-12 col-sm-3 col-md-2 col-lg-2 text-nowrap modal-open text-left">Correo:</span>
                    <span class="col-xs-12 col-sm-9 col-md-5 col-lg-2 text-nowrap modal-open text-left"><?php echo $conta_del[4];?></span>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <span class="col-xs-12 col-sm-3 col-md-2 col-lg-2 text-nowrap modal-open text-left">Horario Atención:</span>
                    <span class="col-xs-12 col-sm-9 col-md-10 col-lg-10 text-nowrap modal-open text-left"><?php echo $conta_del[5];?></span>
                </div>
                <div class="clearfix">&nbsp;</div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <button type="button" class="btn btn-default pull-right" data-id="<?php echo $conta_del[6];?>" data-quien="5">Eliminar</button>
                    <button type="button" class="btn btn-default pull-right" style="margin-right: 5px;" data-id="<?php echo $conta_del[6];?>" data-quien="5">Editar</button>
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
<script>
    $(document).ready(function() {cargarPerfil();});
</script>
<!-- FIN Pagina primera pestaña -->