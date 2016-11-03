<?php
session_start();
require_once ("../conexion/conexion.php");
require_once ("../php/funciones.php");
//////////////////////////////////////////////////////////////////////////////////////
// Aplicación PHP usando Bootstrap, jquery, HTML5 y CSS - PH                        //
// Copyright 2014 Wilson Giovanny Velandia Barreto 3204274564 - willyv78@gmail.com  //
//////////////////////////////////////////////////////////////////////////////////////

$id_apto = "";$id_habita = "";$tipo_res = "";$reside_id = "";$reside_nom = "";$reside_ape = "";$reside_doc = "";$reside_dir = "";$reside_tel = "";$reside_cel = "";$reside_pass = "";$reside_email = "";$reside_fnac = "";$reside_nom2 = "";$reside_obs = "";$reside_fini = "";$reside_ffin = "";$reside_foto = "";$reside_gen = "";$reside_hijo = "";$reside_vive = "";$reside_perm = "";$reside_perf = "";$reside_carg = "";$reside_vinculo = "";$reside_tdoc = "";$reside_est = "";$reside_cert = "";$reside_fcert = date("Y-m-d");$desabilitar = "";$observacion = "";

if(isset($_GET['tipo_res'])){
    $tipo_res = $_GET['tipo_res'];
}
if(isset($_GET['id_apto'])){
    $id_apto = $_GET['id_apto'];
}
if(isset($_GET['id_habita'])){
    $id_habita = $_GET['id_habita'];
    // Datos del propietario, arrendatario, banco, inmobiliaria, habitante, personal de servicio, personas autorizadas y en caso de emergencia
    $res_reside = registroCampo("rmb_residente_x_aptos rxa", "r.rmb_residente_id, r.rmb_residente_nom, r.rmb_residente_ape, r.rmb_residente_doc, r.rmb_residente_dir, r.rmb_residente_tel, r.rmb_residente_cel, r.rmb_residente_pass, r.rmb_residente_email, r.rmb_residente_fnac, r.rmb_residente_nom2, r.rmb_residente_obs, r.rmb_residente_fini, r.rmb_residente_ffin, r.rmb_residente_foto, r.rmb_gen_id, r.rmb_residente_hijo, r.rmb_residente_vive, r.rmb_residente_perm, r.rmb_perf_id, r.rmb_carg_id, r.rmb_vinculo_id, r.rmb_tdoc_id, r.rmb_est_id, r.rmb_residente_cert, r.rmb_residente_fcert", "LEFT JOIN rmb_residente r USING(rmb_residente_id) WHERE rxa.rmb_aptos_id = '$id_apto' AND rxa.rmb_residente_id = '$id_habita'", "", "");
    if($res_reside){
        if(mysql_num_rows($res_reside) > 0){
            $row_reside = mysql_fetch_array($res_reside);
            $reside_id = $row_reside[0];$reside_nom = $row_reside[1];$reside_ape = $row_reside[2];$reside_doc = $row_reside[3];$reside_dir = $row_reside[4];$reside_tel = $row_reside[5];$reside_cel = $row_reside[6];$reside_pass = $row_reside[7];$reside_email = $row_reside[8];$reside_fnac = $row_reside[9];$reside_nom2 = $row_reside[10];$reside_obs = $row_reside[11];$reside_fini = $row_reside[12];$reside_ffin = $row_reside[13];$reside_foto = $row_reside[14];$reside_gen = $row_reside[15];$reside_hijo = $row_reside[16];$reside_vive = $row_reside[17];$reside_perm = $row_reside[18];$reside_perf = $row_reside[19];$reside_carg = $row_reside[20];$reside_vinculo = $row_reside[21];$reside_tdoc = $row_reside[22];$reside_est = $row_reside[23];$reside_cert = $row_reside[24];
            if($row_reside[25] == '0000-00-00'){
                $reside_fcert = date("Y-m-d");
            }
            else{
                $reside_fcert = $row_reside[25];
            }
        }
    }
    // Si el tipo de residente es empleado hace esto
    if($tipo_res == '5'){
        for($i = 1; $i <= 7; $i++){
            $hent[$i] = "00:00";
            $hsal[$i] = "00:00";
        }
        $observacion = "";
        // consulta que trae los horarios del residente
        $res_hor = registroCampo("rmb_horarios", "rmb_horarios_dia, rmb_horarios_hent, rmb_horarios_hsal, rmb_horarios_obs", "WHERE rmb_residente_id = '".$id_habita."'", "", "ORDER BY rmb_horarios_dia ASC");
        if($res_hor){
            if(mysql_num_rows($res_hor) > 0){
                while($row_hor = mysql_fetch_array($res_hor)){
                    $dia = $row_hor[0];
                    $entrada = $row_hor[1];
                    $salida = $row_hor[2];
                    $observacion = $row_hor[3];
                    // echo "dia=".$dia." entrada=".$entrada." salida=".$salida;
                    $hent[$dia] = $entrada;
                    $hsal[$dia] = $salida;
                }
            }
        }
    }
}
if(isset($_GET['id_apto_ver']))
{
    $desabilitar = "disabled";
}
if(isset($_GET['tipo_nom'])){
    $tipo_nom = $_GET['tipo_nom'];
}
?>
<div class="text-left">
    <form id="form_reside" name="form_reside" action="" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">
        <!-- Nombres -->
        <?php if($reside_nom <> ''){$class_nom = "";}else{$class_nom = "has-error";}?>
        <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6 <?php echo $class_nom;?>">
            <label class="col-xs-12 col-sm-7 col-md-5 col-lg-5 control-label" for="rmb_residente_nom">Nombres: </label>
            <div class="col-xs-12 col-sm-5 col-md-7 col-lg-7">
                <input class="form-control" type="text" id="rmb_residente_nom" name="rmb_residente_nom" placeholder="Nombres" value="<?php echo $reside_nom;?>" <?php echo $desabilitar;?>>
            </div>
        </div>
        <!-- Apellidos -->
        <?php if($reside_ape <> ''){$class_ape = "";}else{$class_ape = "has-error";}?>
        <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6 <?php echo $class_ape;?>">
            <label class="col-xs-12 col-sm-7 col-md-5 col-lg-5 control-label" for="rmb_residente_ape">Apellidos: </label>
            <div class="col-xs-12 col-sm-5 col-md-7 col-lg-7">
                <input class="form-control" type="text" id="rmb_residente_ape" name="rmb_residente_ape" placeholder="Apellidos" value="<?php echo $reside_ape;?>" <?php echo $desabilitar;?>>
            </div>
        </div>
        <div class="clearfix"></div>
        <!-- Tipo documento -->
        <?php if($reside_tdoc <> ''){$class_tdoc = "";}else{$class_tdoc = "has-error";}?>
        <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6 <?php echo $class_tdoc;?>">
            <label class="col-xs-12 col-sm-7 col-md-5 col-lg-5 control-label" for="rmb_tdoc_id">Tipo Identificación: </label>
            <div class="col-xs-12 col-sm-5 col-md-7 col-lg-7">
                <?php echo campoSelect($reside_tdoc, "rmb_tdoc", $desabilitar);?>
            </div>
        </div>
        <!-- No. Documento -->
        <?php if($reside_doc <> ''){$class_doc = "";}else{$class_doc = "has-error";}?>
        <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6 <?php echo $class_doc;?>">
            <label class="col-xs-12 col-sm-7 col-md-5 col-lg-5 control-label" for="rmb_residente_doc">No. Identificación: </label>
            <div class="col-xs-12 col-sm-5 col-md-7 col-lg-7">
                <input class="form-control" type="text" id="rmb_residente_doc" name="rmb_residente_doc" placeholder="Número de identificación" value="<?php echo $reside_doc;?>" <?php echo $desabilitar;?>>
            </div>
        </div>
        <div class="clearfix"></div>
        <?php if($tipo_res <> '2'){ ?>
            <!-- Dirección -->
            <?php if($reside_dir <> ''){$class_dir = "";}else{$class_dir = "has-error";}?>
            <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6 <?php echo $class_dir;?>">
                <label class="col-xs-12 col-sm-7 col-md-5 col-lg-5 control-label" for="rmb_residente_dir">Dirección: </label>
                <div class="col-xs-12 col-sm-5 col-md-7 col-lg-7">
                    <input class="form-control" type="text" id="rmb_residente_dir" name="rmb_residente_dir" placeholder="Dirección de correspondencia" value="<?php echo $reside_dir;?>" <?php echo $desabilitar;?>>
                </div>
            </div>
            <!-- Teléfono fijo -->
            <?php if($reside_tel <> ''){$class_tel = "";}else{$class_tel = "has-error";}?>
            <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6 <?php echo $class_tel;?>">
                <label class="col-xs-12 col-sm-7 col-md-5 col-lg-5 control-label" for="rmb_residente_tel">Teléfono Fijo: </label>
                <div class="col-xs-12 col-sm-5 col-md-7 col-lg-7">
                    <input class="form-control" type="text" id="rmb_residente_tel" name="rmb_residente_tel" placeholder="Número de teléfono fijo" value="<?php echo $reside_tel;?>" <?php echo $desabilitar;?>>
                </div>
            </div>
            <div class="clearfix"></div>
            <!-- Telefono celular -->
            <?php if($reside_cel <> ''){$class_cel = "";}else{$class_cel = "has-error";}?>
            <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6 <?php echo $class_cel;?>">
                <label class="col-xs-12 col-sm-7 col-md-5 col-lg-5 control-label" for="rmb_residente_cel">Teléfono Celular: </label>
                <div class="col-xs-12 col-sm-5 col-md-7 col-lg-7">
                    <input class="form-control" type="text" id="rmb_residente_cel" name="rmb_residente_cel" placeholder="Número de teléfono celular" value="<?php echo $reside_cel;?>" <?php echo $desabilitar;?>>
                </div>
            </div>
            <!-- Correo electronico -->
            <?php if($reside_email <> ''){$class_email = "";}else{$class_email = "has-error";}?>
            <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6 <?php echo $class_email;?>">
                <label class="col-xs-12 col-sm-7 col-md-5 col-lg-5 control-label" for="rmb_residente_email">Correo Electrónico: </label>
                <div class="col-xs-12 col-sm-5 col-md-7 col-lg-7">
                    <input class="form-control" type="text" id="rmb_residente_email" name="rmb_residente_email" placeholder="Correo Electrónico" value="<?php echo $reside_email;?>" <?php echo $desabilitar;?>>
                </div>
            </div>
            <div class="clearfix"></div>
        <?php }?>
        <!-- Fecha de nacimiento -->
        <?php if(($reside_fnac <> '') && ($reside_fnac <> '0000-00-00')){$class_fnac = "";}else{$class_fnac = "has-error";}?>
        <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6 <?php echo $class_fnac;?>">
            <label class="col-xs-12 col-sm-7 col-md-5 col-lg-5 control-label" for="rmb_residente_fnac">Fecha de Nacimiento: </label>
            <div class="col-xs-12 col-sm-5 col-md-7 col-lg-7">
                <input class="form-control" type="text" id="rmb_residente_fnac" name="rmb_residente_fnac" placeholder="YYYY-MM-DD" value="<?php echo $reside_fnac;?>" <?php echo $desabilitar;?>>
            </div>
        </div><?php 
        if($tipo_res <> '7'){?>
            <!-- Estado -->
            <?php if($reside_est <> ''){$class_est = "";}else{$class_est = "has-error";}?>
            <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6 <?php echo $class_est;?>">
                <label class="col-xs-12 col-sm-7 col-md-5 col-lg-5 control-label" for="rmb_tdoc_id">Estado: </label>
                <div class="col-xs-12 col-sm-5 col-md-7 col-lg-7">
                    <?php echo campoSelectEst($reside_est, "rmb_est", "10", $desabilitar);?>
                </div>
            </div><?php 
        } 
        // si el tipo de residente es propietario hace esto
        if($tipo_res == '1'){?>
            <!-- Perfil -->
            <?php if($reside_perf <> ''){$class_perf = "";}else{$class_perf = "has-error";}?>
            <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6 <?php echo $class_perf;?>">
                <label class="col-xs-12 col-sm-7 col-md-5 col-lg-5 control-label" for="rmb_tdoc_id">Perfil: </label>
                <div class="col-xs-12 col-sm-5 col-md-7 col-lg-7"><?php 
                    echo campoSelectMaster("rmb_perf", $reside_perf, "*", "WHERE (rmb_perf_id <> '1' AND rmb_perf_id <> '7' AND rmb_perf_id <> '8')", "", "ORDER BY rmb_perf_nom ASC", $desabilitar);?>
                </div>
            </div>
            <!-- Contraseña -->
            <?php if($reside_pass <> ''){$class_pass = "";}else{$class_pass = "has-error";}?>
            <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6 <?php echo $class_pass;?>">
                <label class="col-xs-12 col-sm-7 col-md-5 col-lg-5 control-label" for="rmb_residente_pass">Password: </label>
                <div class="col-xs-12 col-sm-5 col-md-7 col-lg-7">
                    <input class="form-control" type="text" id="rmb_residente_pass" name="rmb_residente_pass" placeholder="Clave de acceso a la aplicación" value="<?php echo $reside_pass;?>" <?php echo $desabilitar;?>>
                </div>
            </div>
            <div class="clearfix"></div><?php 
        }
        else{?>
            <input type="hidden" name="rmb_perf_id" id="rmb_perf_id" value="4"><?php 
        }
        // Si el tipo de residente es diferente a propietario, arrendatario y empleado hace esto
        if(($tipo_res <> '1') && ($tipo_res <> '5') && ($tipo_res <> '3')){
            if(($tipo_res == '7') || ($tipo_res == '9')){
                $where = "WHERE rmb_vinculo_id <> '4'";
            }
            else{
                $where = "";
            }?>
            <!-- Vínculo -->
            <?php if($reside_vinculo <> ''){$class_vinculo = "";}else{$class_vinculo = "has-error";}?>
            <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6 <?php echo $class_vinculo;?>">
                <label class="col-xs-12 col-sm-7 col-md-5 col-lg-5 control-label" for="rmb_vinculo_id">Vínculo: <?php echo $reside_vinculo;?></label>
                <div class="col-xs-12 col-sm-5 col-md-7 col-lg-7">
                    <?php echo campoSelectMaster("rmb_vinculo", $reside_vinculo, "*", "$where", "", "ORDER BY rmb_vinculo_id ASC", $desabilitar);?>
                </div>
            </div><?php 
        }
        // si el tipo de residente es personal de servicio
        if($tipo_res == '5'){?>
            <!-- Cargo -->
            <?php if($reside_carg <> ''){$class_carg = "";}else{$class_carg = "has-error";}?>
            <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6 <?php echo $class_carg;?>">
                <input type="hidden" name="rmb_vinculo_id" id="rmb_vinculo_id" class="form-control" value="7">
                <label class="col-xs-12 col-sm-7 col-md-5 col-lg-5 control-label" for="rmb_carg_id">Cargo: </label>
                <div class="col-xs-12 col-sm-5 col-md-7 col-lg-7"><?php 
                    echo campoSelectMaster("rmb_carg", $reside_carg, "*", "WHERE (rmb_carg_id > '6' OR rmb_carg_id = '4')", "", "ORDER BY rmb_carg_nom ASC", $desabilitar);?>
                </div>
            </div>
            <div class="clearfix">&nbsp;</div><?php 
        }
        if(($tipo_res == '5') || ($tipo_res == '7')){?>
            <!-- Foto -->
            <?php if($reside_foto <> ''){$class_foto = "";}else{$class_foto = "has-error";}?>
            <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6 <?php echo $class_foto;?>">
                <label class="col-xs-12 col-sm-7 col-md-5 col-lg-5 control-label" for="rmb_residente_foto">Foto: </label>
                <div class="col-xs-12 col-sm-5 col-md-7 col-lg-7"><?php 
                    $src_foto = "../images/noimage.png";
                    if($reside_foto <> ''){
                        $src_foto = $reside_foto;
                    }?>
                    <img id="vistaPrevia" src="<?php echo $src_foto;?>" alt="Image" width="150px" height="150px">
                    <input type="file" name="rmb_residente_foto" id="rmb_residente_foto" class="form-control fileimagen" placeholder="Imagen / foto" alt="Imagen y/o foto" title="Imagen y/o foto" value="" <?php echo $desabilitar;?>>
                </div>
            </div><?php 
        }
        if($tipo_res == '5'){?>
            <!-- Pasado Judicial -->
            <?php if($reside_perm <> ''){$class_perm = "";}else{$class_perm = "has-error";}?>
            <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6 <?php echo $class_perm;?>">
                <label class="col-xs-12 col-sm-7 col-md-5 col-lg-5 control-label" for="rmb_residente_perm">Pasado Judicial: </label>
                <div class="col-xs-12 col-sm-5 col-md-7 col-lg-7"><?php 
                    $url_file_pj = "#";
                    $src = "../images/noimage.png";
                    if($desabilitar == ''){
                        if($reside_perm){
                            $url_file_pj = $reside_perm;
                            $url_file_array = explode(".", $reside_perm);
                            $src = "../images/TiposArchivo/".$url_file_array[3].".png";
                        }
                    }?>
                    <a href="<?php echo $url_file_pj;?>" target="_blank">
                        <img id="vistaPrevia2" src="<?php echo $src;?>" alt="Image" width="150px" height="150px">
                    </a>
                    <input type="file" name="rmb_residente_perm" id="rmb_residente_perm" class="form-control fileimagen2" placeholder="Pasado Judicial" alt="Pasado Judicial" title="Pasado Judicial" value="" <?php echo $desabilitar;?>>
                </div>
            </div><?php 
        }?>
        <!-- Género -->
        <?php if($reside_gen <> ''){$class_gen = "";}else{$class_gen = "has-error";}?>
        <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6 <?php echo $class_gen;?>">
            <label class="col-xs-7 col-sm-7 col-md-5 col-lg-5 control-label" for="rmb_gen_id">Género: </label>
            <div class="col-xs-5 col-sm-5 col-md-7 col-lg-7">
                <div class="radio">
                    <label>
                        <input type="radio" name="rmb_gen_id" id="rmb_gen_id1" value="1" <?php echo $desabilitar; if($reside_gen == '1'){echo ' checked="checked"';}?>>Masculino
                    </label>
                    <label>
                        <input type="radio" name="rmb_gen_id" id="rmb_gen_id2" value="0" <?php echo $desabilitar; if($reside_gen <> '1'){echo ' checked="checked"';}?>>Femenino
                    </label>
                </div>
            </div>
        </div><?php 
        if(($tipo_res <> '7') && ($tipo_res <> '9') && ($tipo_res <> '5')){?>
            <!-- Hijos -->
            <?php if($reside_hijo <> ''){$class_hijo = "";}else{$class_hijo = "has-error";}?>
            <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6 <?php echo $class_hijo;?>">
                <label class="col-xs-7 col-sm-7 col-md-5 col-lg-5 control-label" for="rmb_residente_hijo">¿Hijos?: </label>
                <div class="col-xs-5 col-sm-5 col-md-7 col-lg-7">
                    <div class="radio">
                        <label>
                            <input type="radio" name="rmb_residente_hijo" id="rmb_residente_hijo1" value="1" <?php echo $desabilitar; if($reside_hijo == '1'){echo ' checked="checked"';}?>>SI
                        </label>
                        <label>
                            <input type="radio" name="rmb_residente_hijo" id="rmb_residente_hijo2" value="0" <?php echo $desabilitar; if($reside_hijo <> '1'){echo ' checked="checked"';}?>>NO
                        </label>
                    </div>
                </div>
            </div><?php 
        }
        if(($tipo_res <> '2') && ($tipo_res <> '7')){?>
             <!-- Vive Aquí -->
            <?php if($reside_vive <> ''){$class_vive = "";}else{$class_vive = "has-error";}?>
            <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6 <?php echo $class_vive;?>">
                <label class="col-xs-7 col-sm-7 col-md-5 col-lg-5 control-label" for="rmb_residente_vive">¿Vive Aquí?: </label>
                <div class="col-xs-5 col-sm-5 col-md-7 col-lg-7">
                    <div class="radio">
                        <label>
                            <input type="radio" name="rmb_residente_vive" id="rmb_residente_vive1" value="1" <?php echo $desabilitar; if($reside_vive == '1'){echo ' checked="checked"';}?>>SI
                        </label>
                        <label>
                            <input type="radio" name="rmb_residente_vive" id="rmb_residente_vive2" value="0" <?php echo $desabilitar; if($reside_vive <> '1'){echo ' checked="checked"';}?>>NO
                        </label>
                    </div>
                </div>
            </div><?php 
        }
        if($tipo_res == '5'){?>
            <!-- Observación -->
            <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <label class="col-xs-12 col-sm-3 col-md-2 col-lg-2 control-label" for="rmb_residente_obs">Observación: </label>
                <div class="col-xs-12 col-sm-9 col-md-10 col-lg-10">
                    <textarea name="rmb_residente_obs" id="rmb_residente_obs" rows="3" placeholder="Ingrese una observación del personal de servicio, algo que le ayude a recordar de quien se trata, si cree que NO es necesario deje el campo en blanco." class="form-control" <?php echo $desabilitar;?>><?php echo $reside_obs;?></textarea>
                </div>
            </div>
            <!-- Horario -->
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-offset-1 col-lg-11 text-left">
                    <legend>Horario</legend>
                </div>
                <!-- Dias / horas -->
                <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <label class="col-xs-12 col-sm-3 col-md-2 col-lg-2 control-label" for="rmb_horarios_hent">Días / Horas: </label>
                    <div class="col-xs-12 col-sm-9 col-md-10 col-lg-10">
                        <!-- Lunes -->
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="checkbox col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                <label>
                                    <input id="rmb_horarios_dia_1" type="checkbox" name="rmb_horarios_dia[]" value="1" data-bv-choice="false" data-bv-choice-min="1" data-bv-choice-max="10" data-bv-choice-message="Seleccione mínimo 1 de los 7 días." <?php if(($hent[1] <> '') && ($hsal[1] <> '') && ($hent[1] <> '00:00') && ($hsal[1] <> '00:00')){echo 'checked="checked"';}?>>
                                    Lunes
                                </label>
                            </div>
                            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 div_ing_1">
                                <input id="rmb_horarios_hent_1" type="text" name="rmb_horarios_hent_1" placeholder="Ingrese HH:MM" value="<?php echo $hent[1];?>" class="form-control time-picker" <?php echo $desabilitar;?>/>
                            </div>
                            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 div_sal_1">
                                <input id="rmb_horarios_hsal_1" type="text" name="rmb_horarios_hsal_1" placeholder="Ingrese HH:MM" value="<?php echo $hsal[1];?>" class="form-control time-picker" <?php echo $desabilitar;?>/>
                            </div>
                        </div>
                        <!-- Martes -->
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="checkbox col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                <label>
                                    <input id="rmb_horarios_dia_2" type="checkbox" name="rmb_horarios_dia[]" value="2" <?php if(($hent[2] <> '') && ($hsal[2] <> '') && ($hent[2] <> '00:00') && ($hsal[2] <> '00:00')){echo 'checked="checked"';}?>>
                                    Martes
                                </label>
                            </div>
                            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 div_ing_2">
                                <input id="rmb_horarios_hent_2" type="text" name="rmb_horarios_hent_2" placeholder="Ingrese HH:MM" value="<?php echo $hent[2];?>" class="form-control time-picker" <?php echo $desabilitar;?>/>
                            </div>
                            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 div_sal_2">
                                <input id="rmb_horarios_hsal_2" type="text" name="rmb_horarios_hsal_2" placeholder="Ingrese HH:MM" value="<?php echo $hsal[2];?>" class="form-control time-picker" <?php echo $desabilitar;?>/>
                            </div>
                        </div>
                        <!-- Miercoles -->
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="checkbox col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                <label>
                                    <input id="rmb_horarios_dia_3" type="checkbox" name="rmb_horarios_dia[]" value="3" <?php if(($hent[3] <> '') && ($hsal[3] <> '') && ($hent[3] <> '00:00') && ($hsal[3] <> '00:00')){echo 'checked="checked"';}?>>
                                    Miercoles
                                </label>
                            </div>
                            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 div_ing_3">
                                <input id="rmb_horarios_hent_3" type="text" name="rmb_horarios_hent_3" placeholder="Ingrese HH:MM" value="<?php echo $hent[3];?>" class="form-control time-picker" <?php echo $desabilitar;?>/>
                            </div>
                            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 div_sal_3">
                                <input id="rmb_horarios_hsal_3" type="text" name="rmb_horarios_hsal_3" placeholder="Ingrese HH:MM" value="<?php echo $hsal[3];?>" class="form-control time-picker" <?php echo $desabilitar;?>/>
                            </div>
                        </div>
                        <!-- Jueves -->
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="checkbox col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                <label>
                                    <input id="rmb_horarios_dia_4" type="checkbox" name="rmb_horarios_dia[]" value="4" <?php if(($hent[4] <> '') && ($hsal[4] <> '') && ($hent[4] <> '00:00') && ($hsal[4] <> '00:00')){echo 'checked="checked"';}?>>
                                    Jueves
                                </label>
                            </div>
                            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 div_ing_4">
                                <input id="rmb_horarios_hent_4" type="text" name="rmb_horarios_hent_4" placeholder="Ingrese HH:MM" value="<?php echo $hent[4];?>" class="form-control time-picker" <?php echo $desabilitar;?>/>
                            </div>
                            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 div_sal_4">
                                <input id="rmb_horarios_hsal_4" type="text" name="rmb_horarios_hsal_4" placeholder="Ingrese HH:MM" value="<?php echo $hsal[4];?>" class="form-control time-picker" <?php echo $desabilitar;?>/>
                            </div>
                        </div>
                        <!-- Viernes -->
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="checkbox col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                <label>
                                    <input id="rmb_horarios_dia_5" type="checkbox" name="rmb_horarios_dia[]" value="5" <?php if(($hent[5] <> '') && ($hsal[5] <> '') && ($hent[5] <> '00:00') && ($hsal[5] <> '00:00')){echo 'checked="checked"';}?>>
                                    Viernes
                                </label>
                            </div>
                            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 div_ing_5">
                                <input id="rmb_horarios_hent_5" type="text" name="rmb_horarios_hent_5" placeholder="Ingrese HH:MM" value="<?php echo $hent[5];?>" class="form-control time-picker" <?php echo $desabilitar;?>/>
                            </div>
                            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 div_sal_5">
                                <input id="rmb_horarios_hsal_5" type="text" name="rmb_horarios_hsal_5" placeholder="Ingrese HH:MM" value="<?php echo $hsal[5];?>" class="form-control time-picker" <?php echo $desabilitar;?>/>
                            </div>
                        </div>
                        <!-- Sabado -->
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="checkbox col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                <label>
                                    <input id="rmb_horarios_dia_6" type="checkbox" name="rmb_horarios_dia[]" value="6" <?php if(($hent[6] <> '') && ($hsal[6] <> '') && ($hent[6] <> '00:00') && ($hsal[6] <> '00:00')){echo 'checked="checked"';}?>>
                                    Sabado
                                </label>
                            </div>
                            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 div_ing_6">
                                <input id="rmb_horarios_hent_6" type="text" name="rmb_horarios_hent_6" placeholder="Ingrese HH:MM" value="<?php echo $hent[6];?>" class="form-control time-picker" <?php echo $desabilitar;?>/>
                            </div>
                            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 div_sal_6">
                                <input id="rmb_horarios_hsal_6" type="text" name="rmb_horarios_hsal_6" placeholder="Ingrese HH:MM" value="<?php echo $hsal[6];?>" class="form-control time-picker" <?php echo $desabilitar;?>/>
                            </div>
                        </div>
                        <!-- Domingo -->
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="checkbox col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                <label>
                                    <input id="rmb_horarios_dia_7" type="checkbox" name="rmb_horarios_dia[]" value="7" <?php if(($hent[7] <> '') && ($hsal[7] <> '') && ($hent[7] <> '00:00') && ($hsal[7] <> '00:00')){echo 'checked="checked"';}?>>
                                    Domingo
                                </label>
                            </div>
                            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 div_ing_7">
                                <input id="rmb_horarios_hent_7" type="text" name="rmb_horarios_hent_7" placeholder="Ingrese HH:MM" value="<?php echo $hent[7];?>" class="form-control time-picker" <?php echo $desabilitar;?>/>
                            </div>
                            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 div_sal_7">
                                <input id="rmb_horarios_hsal_7" type="text" name="rmb_horarios_hsal_7" placeholder="Ingrese HH:MM" value="<?php echo $hsal[7];?>" class="form-control time-picker" <?php echo $desabilitar;?>/>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Observacion del horario -->
                <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <label class="col-xs-12 col-sm-3 col-md-2 col-lg-2 control-label" for="rmb_horarios_obs">Observación horario: </label>
                    <div class="col-xs-12 col-sm-9 col-md-10 col-lg-10">
                        <textarea name="rmb_horarios_obs" id="rmb_horarios_obs" rows="3" placeholder="Ingrese una observación acerca del horario." class="form-control" <?php echo $desabilitar;?>><?php echo $observacion;?></textarea>
                    </div>
                </div>
                <div class="widget"></div>
            </div><?php 
        }
        else{?>
            <!-- Observación -->
            <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <label class="col-xs-12 col-sm-7 col-md-5 col-lg-5 control-label" for="rmb_residente_obs">Observación: </label>
                <div class="col-xs-12 col-sm-5 col-md-7 col-lg-7">
                    <textarea name="rmb_residente_obs" id="rmb_residente_obs" rows="3" placeholder="Ingrese una observación del propietario, algo que le ayude a recordar de quien se trata, o tambien puede colocar el horario en que el contacto esta disponible, si cree que NO es necesario deje el campo en blanco." class="form-control" <?php echo $desabilitar;?>><?php echo $reside_obs;?></textarea>
                </div>
            </div><?php 
        }?>
        <div class="clearfix">&nbsp;</div><?php 
        if($tipo_res == '1'){?>
            <!-- Certificado de tradición y Libertad -->
            <?php if($reside_cert <> ''){$class_cert = "";}else{$class_cert = "has-error";}?>
            <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6 <?php echo $class_cert;?>">
                <label class="col-xs-12 col-sm-7 col-md-5 col-lg-5 control-label" for="rmb_residente_cert">Certificado de Tradición y Libertad: </label>
                <div class="col-xs-12 col-sm-5 col-md-7 col-lg-7"><?php 
                    $url_file_cert = "#";
                    $disabled_a = 'onclick="return false;"';
                    $src = "../images/noimage.png";
                    if($desabilitar == ''){
                        if($reside_cert){
                            $url_file_cert = $reside_cert;
                            $disabled_a = "";
                            $url_file_array = explode(".", $reside_cert);
                            $src = "../images/TiposArchivo/".$url_file_array[3].".png";
                        }
                    }?>
                    <a href="<?php echo $url_file_cert;?>" target="_blank" <?php echo $disabled_a;?>>
                        <img id="vistaPrevia2" src="<?php echo $src;?>" alt="Image" width="150px" height="150px">
                    </a>
                    <input type="file" name="rmb_residente_cert" id="rmb_residente_cert" class="form-control fileimagen2" placeholder="Certificado de tradición y Libertad" alt="Certificado de tradición y Libertad" title="Certificado de tradición y Libertad" value="" <?php echo $desabilitar;?>>
                </div>
            </div>
            <div class="clearfix">&nbsp;</div>
            <!-- Fecha de Expedición Certificado de Libertad -->
            <?php if(($reside_fcert <> '') && ($reside_fcert <> '0000-00-00')){$class_fcert = "";}else{$class_fcert = "has-error";}?>
            <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6 <?php echo $class_fcert;?>">
                <label class="col-xs-12 col-sm-7 col-md-5 col-lg-5 control-label" for="rmb_residente_fcert">Fecha Certificado de Tradición y Libertad: </label>
                <div class="col-xs-12 col-sm-5 col-md-7 col-lg-7">
                    <input class="form-control" type="text" id="rmb_residente_fcert" name="rmb_residente_fcert" placeholder="YYYY-MM-DD" alt="Fecha de expedición del Certificado de tradición y Libertad" title="Fecha de expedición del Certificado de tradición y Libertad" value="<?php echo $reside_fcert;?>" <?php echo $desabilitar;?>>
                </div>
            </div><?php 
        }?>
        <div class="clearfix">&nbsp;</div>
        <div class="clearfix">&nbsp;</div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center"><?php 
            if($reside_id){?>
                <input type="hidden" name="id_upd" id="id_upd" value="<?php echo $reside_id;?>"><?php 
            }
            if($tipo_res == '5'){?>
                <input type="hidden" name="rmb_perf_id" id="rmb_perf_id" value="4"><?php 
            }
            if($tipo_res == '2'){?>
                <input type="hidden" name="rmb_residente_vive" id="rmb_residente_vive" class="form-control" value="1"><?php 
            }?>
            <input type="hidden" name="id_apto" id="id_apto" value="<?php echo $id_apto;?>">
            <input type="hidden" name="tipo_res" id="tipo_res" value="<?php echo $tipo_res;?>">
            <input type="hidden" name="tipo_nom" id="tipo_nom" value="<?php echo $tipo_nom;?>"><?php 
            if(!isset($_GET['id_apto_ver'])){?>
                <button type="submit" class="btn btn-default">Actualizar</button><?php 
            }?>
            <button type="button" class="btn btn-default regresar">Regresar</button>
        </div>
        <div class="clearfix">&nbsp;</div>
    </form>
</div>
<div class="clearfix">&nbsp;</div>
<!-- jQuery -->
<script src="../js/jquery.min.js"></script>
<script src="../js/sweet-alert.js"></script><!-- Personalizar alertas -->
<!-- Libreria java script que realiza la validacion de los formulariosP -->
<script src="../js/bootstrap-datepicker.js"></script><!--  Datetimepicker -->
<script src="../js/bootstrap-datetimepicker.min.js"></script> <!-- Datetimepicker -->
<script src="../js/bootstrap-timepicker.min.js"></script>
<script src="../js/bootstrapValidator.js"></script>
<script>
    $(document).ready(function() {
        setTimeout(esperehide, 1000);
        var id_apto = '<?php echo $id_apto;?>';
        var tipo_res = '<?php echo $tipo_res;?>';
        var pestaña = "propietario";
        // Funcion que agrega la validacion de los campos hora de ingreso y hora de salida para el dia marcado
        function agregarValidacionCampo(argument) {
            // obtenemos el id del dia
            var obj = $(this).val();
            // creamos los nombre de los campos a gregar validacion
            var nom_obj_ing = 'rmb_horarios_hent_' + obj;
            var nom_obj_sal = 'rmb_horarios_hsal_' + obj;
            // Si el inout tipo checked esta marcado hace esto
            if($(this).prop('checked')){
                // agregamos las validaciones
                $('#form_reside').bootstrapValidator('addField', nom_obj_ing, {
                    validators: {
                        notEmpty: {
                            message: 'Seleccione hora de ingreso'
                        }
                    }
                });
                $('#form_reside').bootstrapValidator('addField', nom_obj_sal, {
                    validators: {
                        notEmpty: {
                            message: 'Seleccione hora de salida'
                        }
                    }
                });
            }
            else{
                $("#" + nom_obj_ing).val("");
                $("#" + nom_obj_sal).val("");
                $('#form_reside').bootstrapValidator('removeField', nom_obj_ing);
                $('#form_reside').bootstrapValidator('removeField', nom_obj_sal);
            }
        }
        if(tipo_res === '1'){
            pestaña = "propietario";
            //Cuando se selecciona un archivo en pasado judicial
            $('.fileimagen2').on('change', function(e) {PreImagen2($(this).val(), e);});
            $('#rmb_residente_fcert').datepicker({format: "yyyy-mm-dd", autoclose: true});
        }
        else if(tipo_res === '2'){pestaña = "residente";}
        else if(tipo_res === '3'){pestaña = "arrendatario";}
        else if(tipo_res === '4'){pestaña = "visitante";}
        else if(tipo_res === '5'){
            pestaña = "empleado";
            $('.time-picker').timepicker({minuteStep: 5, showMeridian: false});
            //Cuando se selecciona una imagen en usuario
            $('.fileimagen').on('change', function(e) {PreImagen(this, e);});
            //Cuando se selecciona un archivo en pasado judicial
            $('.fileimagen2').on('change', function(e) {PreImagen2($(this).val(), e);});
            // agrega o quita los campos de hora de ingreso y salida si hace click en el checkbox
            $("input[type=checkbox]").on("click", agregarValidacionCampo);
        }
        else if(tipo_res === '6'){pestaña = "locatario";}
        else if(tipo_res === '7'){
            pestaña = "autorizada";
            //Cuando se selecciona una imagen en usuario
            $('.fileimagen').on('change', function(e) {PreImagen(this, e);});
        }
        else if(tipo_res === '8'){pestaña = "inmobiliaria";}
        else if(tipo_res === '9'){pestaña = "emergencia";}
        else{pestaña = "propietario";}
        // Validación formulario de datos del propietario
        $('#form_reside').bootstrapValidator({
            message: 'Este valor no es valido',
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                rmb_residente_nom: {
                    message: 'El nombre no es valido',
                    validators: {
                        notEmpty: {
                            message: 'El nombre es requerido'
                        },
                        stringLength: {
                            min: 3,
                            max: 50,
                            message: 'El nombre debe contener de 3 a 50 characteres'
                        },
                        regexp: {
                            regexp: /^[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ\_\s\.\-]+$/,
                            message: 'El nombre debe ser alfanumérico.'
                        }
                    }
                },
                rmb_residente_ape: {
                    message: 'El apellido no es valido',
                    validators: {
                        notEmpty: {
                            message: 'El apellido es requerido'
                        },
                        stringLength: {
                            min: 3,
                            max: 50,
                            message: 'El apellido debe contener de 3 a 50 characteres'
                        },
                        regexp: {
                            regexp: /^[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ\_\s\.\-]+$/,
                            message: 'El apellido debe ser alfanumérico.'
                        }
                    }
                },
                rmb_tdoc_id: {
                    message: 'El tipo de documento de identificación no es valida',
                    validators: {
                        notEmpty: {
                            message: 'El tipo de documento de identificación es requerida'
                        }
                    }
                },
                rmb_residente_doc: {
                    message: 'El número de documento de identificación no es valido',
                    validators: {
                        notEmpty: {
                            message: 'El número de documento de identificación es requerido'
                        },
                        stringLength: {
                            min: 3,
                            max: 50,
                            message: 'El número de documento de identificación debe contener de 3 a 50 characteres'
                        },
                        regexp: {
                            regexp: /^[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ\_\s\.\-]+$/,
                            message: 'El número de documento de identificación debe ser alfanumérico.'
                        }
                    }
                },
                rmb_est_id: {
                    message: 'El estado no es valido',
                    validators: {
                        notEmpty: {
                            message: 'El estado es requerido'
                        }
                    }
                }
            }
        })
        .on('success.form.bv', function(e) {
            // Prevent form submission
            e.preventDefault();
            espereshow();
            var datos_form = new FormData($("#form_reside")[0]);
            $.ajax({
                url:"../php/ins_upd_prop.php",
                cache:false,
                type:"POST",
                contentType:false,
                data:datos_form,
                processData:false,
                success: function(datos){
                    if(datos !== ''){
                        // alert(datos);
                        setTimeout(esperehide, 500);
                        $("#col-md-12").load('detalle-del-apartamento.php?id_apto='+id_apto);
                        swal({
                            title: "Felicidades!",
                            text: "El registro se ha guardado correctamente!",
                            type: "success",
                            confirmButtonText: "Continuar",
                            confirmButtonColor: "#94B86E"
                        },
                        function(){
                            $("#"+pestaña).addClass('activo');
                            pag = "lista_residentes.php?id_apto="+id_apto+"&tipo_res="+tipo_res+"&tipo_nom="+pestaña+"s";
                            $("#"+pestaña).parent().next().load(pag);
                            $("#"+pestaña).parent().next().show();
                        });
                    }
                    else{
                        setTimeout(esperehide, 500);
                        swal({
                            title: "Error!",
                            text: "Ha ocurrido un error,\nNo se ha realizado cambios,\nrevise la información diligenciada he intentelo nuevamente.",
                            type: "error",
                            confirmButtonText: "Aceptar",
                            confirmButtonColor: "#E25856"
                        });
                        return;
                    }
                }
            });
        });
        function volverAtras(argument) {
            $("#col-md-12").load('detalle-del-apartamento.php?id_apto='+id_apto);
            setTimeout(function(){
                $("#" + pestaña).addClass('activo');
                pag = "lista_residentes.php?id_apto="+id_apto+"&tipo_res="+tipo_res+"&tipo_nom="+pestaña+"s";
                $("#" + pestaña).parent().next().load(pag);
                $("#" + pestaña).parent().next().show();
            }, 500);
        }
        $(".regresar").on("click", volverAtras);
        $('#rmb_residente_fnac').datepicker({format: "yyyy-mm-dd", autoclose: true});
        if(tipo_res === '1'){
            $('#form_reside').bootstrapValidator('addField', 'rmb_perf_id', {
                validators: {
                    notEmpty: {
                        message: 'El perfil es requerido'
                    }
                }
            });
        }
    });
</script>