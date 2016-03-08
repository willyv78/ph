<?php
session_start();
require_once ("../conexion/conexion.php");
require_once ("../php/funciones.php");
//////////////////////////////////////////////////////////////////////////////////////
// Aplicación PHP usando Bootstrap, jquery, HTML5 y CSS - PH                        //
// Copyright 2014 Wilson Giovanny Velandia Barreto 3204274564 - willyv78@gmail.com  //
//////////////////////////////////////////////////////////////////////////////////////

$id_apto = "";$apto_id = "";$apto_nom = "";$apto_torre = "";$apto_tipo = "";$apto_dir = "";$apto_tel = "";$apto_area = "";$apto_priv = "";$apto_banc = "";$apto_coc = "";$apto_hab = "";$apto_est = "";$apto_obs = "";$apto_inm = "";$apto_habita = "";$apto_parq = "";$apto_dep = "";$apto_coef = "";$apto_terr = "";$apto_balc = "";$apto_vul = "";$apto_nom_res = "";$apto_ape_res = "";$apto_banco = "";$apto_serv = "";$apto_est = "";$apto_fecha = "";
if(isset($_GET['id_apto'])){
    $id_apto = $_GET['id_apto'];
    // Datos del apartamento
    $res_apto = registroCampo("rmb_aptos a", "a.rmb_aptos_id, a.rmb_aptos_nom, a.rmb_torres_id, a.rmb_taptos_id, a.rmb_aptos_dir, a.rmb_aptos_tel, a.rmb_aptos_area, a.rmb_aptos_priv, a.rmb_aptos_banos, a.rmb_aptos_coc, a.rmb_aptos_hab, a.rmb_aptos_balc, a.rmb_est_id, a.rmb_aptos_obs, a.rmb_aptos_inm, a.rmb_aptos_habita, a.rmb_aptos_parq, a.rmb_aptos_dep, a.rmb_aptos_coef, a.rmb_aptos_terr, a.rmb_aptos_vul, a.rmb_aptos_banco, a.rmb_aptos_serv, a.rmb_aptos_est, a.rmb_aptos_fecha", "WHERE a.rmb_aptos_id = '$id_apto'", "", "");
    if($res_apto){
        if(mysql_num_rows($res_apto) > 0){
            $row_apto = mysql_fetch_array($res_apto);
            $apto_id = $row_apto[0];$apto_nom = $row_apto[1];$apto_torre = $row_apto[2];$apto_tipo = $row_apto[3];$apto_dir = $row_apto[4];$apto_tel = $row_apto[5];$apto_area = $row_apto[6];$apto_priv = $row_apto[7];$apto_banos = $row_apto[8];$apto_coc = $row_apto[9];$apto_hab = $row_apto[10];$apto_balc = $row_apto[11];$apto_est = $row_apto[12];$apto_obs = $row_apto[13];$apto_inm = $row_apto[14];$apto_habita = $row_apto[15];$apto_parq = $row_apto[16];$apto_dep = $row_apto[17];$apto_coef = $row_apto[18];$apto_terr = $row_apto[19];$apto_vul = $row_apto[20];$apto_banco = $row_apto[21];$apto_serv = $row_apto[22];$apto_est = $row_apto[23];$apto_fecha = $row_apto[24];
        }
    }
}
// consultamos los apartamentos que se han asociado a los tipos de apartamento
$res = registroCampo("rmb_aptos_x_taptos", "rmb_aptos_nom", "WHERE rmb_aptos_nom NOT IN (SELECT rmb_aptos_nom FROM rmb_aptos)", "", "ORDER BY LENGTH(rmb_aptos_nom), rmb_aptos_nom ASC");
?>
<div class="text-left">
    <form id="form_apto" name="form_apto" action="" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">
        <!-- Torre -->
        <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
            <label class="col-xs-12 col-sm-7 col-md-5 col-lg-5 control-label" for="rmb_torres_id">Torre: </label>
            <div class="col-xs-12 col-sm-5 col-md-7 col-lg-7">
                <?php echo campoSelect($apto_torre, "rmb_torres");?>
            </div>
        </div>
        <!-- Número de apartamento -->
        <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
            <label class="col-xs-12 col-sm-7 col-md-5 col-lg-5 control-label" for="rmb_aptos_nom">Número: </label>
            <div class="col-xs-12 col-sm-5 col-md-7 col-lg-7">
                <div class="input-group">
                    <input id="rmb_aptos_nom" list="search_cont2" name="rmb_aptos_nom" class="form-control" placeholder="Número Apartamento" value="<?php echo $apto_nom;?>" alt="Digite un número Apartamento" title="Digite un número Apartamento">
                    <datalist id="search_cont2"><?php 
                        if($res){
                            if(mysql_num_rows($res) > 0){
                                while($row = mysql_fetch_array($res)){?>
                                    <option value="<?php echo $row[0];?>"><?php
                                }
                            }
                        }?>
                    </datalist>
                    <span id="new_emp" class="input-group-addon btn btn-danger" title="Buscar tipo de apartamento"><i class="glyphicon glyphicon-search"></i></span>
                </div>
                <!-- <input class="form-control" type="text" id="rmb_aptos_nom" name="rmb_aptos_nom" placeholder="Número de apartamento" <?php echo $desabilitar;?> value="<?php echo $apto_nom;?>"> -->
            </div>
        </div>
        <!-- Tipo -->
        <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
            <label class="col-xs-12 col-sm-7 col-md-5 col-lg-5 control-label" for="rmb_taptos_id">Tipo: </label>
            <div class="col-xs-12 col-sm-5 col-md-7 col-lg-7">
                <input class="form-control" type="hidden" id="rmb_taptos_id" name="rmb_taptos_id" placeholder="Tipo" value="<?php echo $apto_tipo;?>">
                <div class="nombre_tipo form-control" alt="Este es el tipo de apartamento correspondiente al número de aratamento digitado" title="Este es el tipo de apartamento correspondiente al número de aratamento digitado"><?php echo nombreCampo($apto_tipo, "rmb_taptos"); ?></div>
            </div>
        </div>
        <!-- Dirección -->
        <!-- <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
            <label class="col-xs-12 col-sm-7 col-md-5 col-lg-5 control-label" for="rmb_aptos_dir">Dirección: </label>
            <div class="col-xs-12 col-sm-5 col-md-7 col-lg-7">
                <input class="form-control" type="text" id="rmb_aptos_dir" name="rmb_aptos_dir" placeholder="Dirección" <?php echo $desabilitar;?> value="<?php echo $apto_dir;?>">
            </div>
        </div> -->
        <!-- Teléfono -->
        <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
            <label class="col-xs-12 col-sm-7 col-md-5 col-lg-5 control-label" for="rmb_aptos_tel">Teléfono: </label>
            <div class="col-xs-12 col-sm-5 col-md-7 col-lg-7">
                <input class="form-control" type="text" id="rmb_aptos_tel" name="rmb_aptos_tel" placeholder="Teléfono" <?php echo $desabilitar;?> value="<?php echo $apto_tel;?>" alt="Digite un número telefónico fijo o mobil" title="Digite un número telefónico fijo o mobil">
            </div>
        </div>
        <!-- Estado -->
        <!-- <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
            <label class="col-xs-12 col-sm-7 col-md-5 col-lg-5 control-label" for="rmb_aptos_id">Estado: </label>
            <div class="col-xs-12 col-sm-5 col-md-7 col-lg-7">
                <?php echo campoSelectEst($apto_est, "rmb_est", "8");?>
            </div>
        </div> -->
        <!-- Área Construida -->
        <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
            <label class="col-xs-12 col-sm-7 col-md-5 col-lg-5 control-label" for="rmb_aptos_area">Área Construida: </label>
            <div class="col-xs-12 col-sm-5 col-md-7 col-lg-7">
                <input class="form-control" type="text" id="rmb_aptos_area" name="rmb_aptos_area" placeholder="Área Construida" <?php echo $desabilitar;?> value="<?php echo $apto_area;?>" alt="Digite el valor en metros cuadrados del total del área construida" title="Digite el valor en metros cuadrados del total del área construida">
            </div>
        </div>
        <!-- Área Privada -->
        <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
            <label class="col-xs-12 col-sm-7 col-md-5 col-lg-5 control-label" for="rmb_aptos_priv">Área Privada: </label>
            <div class="col-xs-12 col-sm-5 col-md-7 col-lg-7">
                <input class="form-control" type="text" id="rmb_aptos_priv" name="rmb_aptos_priv" placeholder="Área Privada" <?php echo $desabilitar;?> value="<?php echo $apto_priv;?>" alt="Digite el valor en metros cuadrados del total del área privada" title="Digite el valor en metros cuadrados del total del área privada">
            </div>
        </div>
        <!-- Alcobas -->
        <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
            <label class="col-xs-12 col-sm-7 col-md-5 col-lg-5 control-label" for="rmb_aptos_hab">Nº Alcobas: </label>
            <div class="col-xs-12 col-sm-5 col-md-7 col-lg-7">
                <input class="form-control" type="text" id="rmb_aptos_hab" name="rmb_aptos_hab" placeholder="Nº Habitaciones" <?php echo $desabilitar;?> value="<?php echo $apto_hab;?>" alt="Digite el número de alcobas" title="Digite el número de alcobas">
            </div>
        </div>
        <!-- Baños -->
        <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
            <label class="col-xs-12 col-sm-7 col-md-5 col-lg-5 control-label" for="rmb_aptos_banos">Nº Baños: </label>
            <div class="col-xs-12 col-sm-5 col-md-7 col-lg-7">
                <input class="form-control" type="text" id="rmb_aptos_banos" name="rmb_aptos_banos" placeholder="Área" <?php echo $desabilitar;?> value="<?php echo $apto_banos;?>" alt="Digite el número de baños" title="Digite el número de baños">
            </div>
        </div>
        <!-- Cocinas -->
        <!-- <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
            <label class="col-xs-12 col-sm-7 col-md-5 col-lg-5 control-label" for="rmb_aptos_coc">Nº Cocinas: </label>
            <div class="col-xs-12 col-sm-5 col-md-7 col-lg-7">
                <input class="form-control" type="text" id="rmb_aptos_coc" name="rmb_aptos_coc" placeholder="Nº Cocinas" <?php echo $desabilitar;?> value="<?php echo $apto_coc;?>">
            </div>
        </div> -->
        <!-- Balcones -->
        <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
            <label class="col-xs-12 col-sm-7 col-md-5 col-lg-5 control-label" for="rmb_aptos_balc">Nº Balcones: </label>
            <div class="col-xs-12 col-sm-5 col-md-7 col-lg-7">
                <input class="form-control" type="text" id="rmb_aptos_balc" name="rmb_aptos_balc" placeholder="Número de Balcones" <?php echo $desabilitar;?> value="<?php echo $apto_balc;?>" alt="Digite el número de balcones" title="Digite el número de balcones">
            </div>
        </div>
        <!-- Terrazas -->
        <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
            <label class="col-xs-12 col-sm-7 col-md-5 col-lg-5 control-label" for="rmb_aptos_terr">Nº Terrazas: </label>
            <div class="col-xs-12 col-sm-5 col-md-7 col-lg-7">
                <input class="form-control" type="text" id="rmb_aptos_terr" name="rmb_aptos_terr" placeholder="Número de terrazas" alt="Número de terrazas" title="Número de terrazas" <?php echo $desabilitar;?> value="<?php echo $apto_terr;?>" alt="Digite el número de terrazas" title="Digite el número de terrazas">
            </div>
        </div>
        <!-- Estudios -->
        <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
            <label class="col-xs-12 col-sm-7 col-md-5 col-lg-5 control-label" for="rmb_aptos_est">¿Estudio?: </label>
            <div class="col-xs-12 col-sm-5 col-md-7 col-lg-7">
                <div class="radio">
                    <label>
                        <input type="radio" name="rmb_aptos_est" id="rmb_aptos_est1" value="1" alt="Si el apartamento tiene alcoba o espacio para estudio marque esta opción" title="Si el apartamento tiene alcoba o espacio para estudio marque esta opción" <?php if($apto_est == '1'){echo 'checked="checked"';}?> <?php echo $desabilitar;?>>SI
                    </label>
                    <label>
                        <input type="radio" name="rmb_aptos_est" id="rmb_aptos_est2" value="0" alt="Si el apartamento NO tiene alcoba o espacio para estudio marque esta opción" title="Si el apartamento NO tiene alcoba o espacio para estudio marque esta opción" <?php if($apto_est <> '1'){echo 'checked="checked"';}?> <?php echo $desabilitar;?>>NO
                    </label>
                </div>
            </div>
        </div>
        <!-- Servicio -->
        <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
            <label class="col-xs-12 col-sm-7 col-md-5 col-lg-5 control-label" for="rmb_aptos_serv">¿Alcoba Servicio?: </label>
            <div class="col-xs-12 col-sm-5 col-md-7 col-lg-7">
                <div class="radio">
                    <label>
                        <input type="radio" name="rmb_aptos_serv" id="rmb_aptos_serv1" value="1" alt="Si el apartamento tiene alcoba de servicio marque esta opción" title="Si el apartamento tiene alcoba de servicio marque esta opción" <?php if($apto_serv == '1'){echo 'checked="checked"';}?> <?php echo $desabilitar;?>>SI
                    </label>
                    <label>
                        <input type="radio" name="rmb_aptos_serv" id="rmb_aptos_serv2" value="0" alt="Si el apartamento NO tiene alcoba de servicio marque esta opción" title="Si el apartamento NO tiene alcoba de servicio marque esta opción" <?php if($apto_serv <> '1'){echo 'checked="checked"';}?> <?php echo $desabilitar;?>>NO
                    </label>
                </div>
            </div>
        </div>
        <!-- Coeficiente -->
        <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
            <label class="col-xs-12 col-sm-7 col-md-5 col-lg-5 control-label" for="rmb_aptos_coef">Coeficiente Area (%): </label>
            <div class="col-xs-12 col-sm-5 col-md-7 col-lg-7">
                <input class="form-control" type="text" id="rmb_aptos_coef" name="rmb_aptos_coef" placeholder="Coeficiente Area (%)" alt="Digite el Coeficiente Área en porcentaje (%)" title="Digite el Coeficiente Área en porcentaje (%)" <?php echo $desabilitar;?> value="<?php echo $apto_coef;?>">
            </div>
        </div>
        <div class="clearfix"></div>
        <!-- Parquedero -->
        <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
            <label class="col-xs-12 col-sm-7 col-md-5 col-lg-5 control-label" for="rmb_aptos_parq">¿Parquedero?: </label>
            <div class="col-xs-12 col-sm-5 col-md-7 col-lg-7">
                <div class="radio">
                    <label>
                        <input type="radio" name="rmb_aptos_parq" id="rmb_aptos_parq1" value="1" alt="Si tiene el apartamento asignado un parqueadero marque esta opción" title="Si tiene el apartamento asignado un parqueadero marque esta opción" <?php if($apto_parq == '1'){echo 'checked="checked"';}?>>SI
                    </label>
                    <label>
                        <input type="radio" name="rmb_aptos_parq" id="rmb_aptos_parq2" value="0" alt="Si NO tiene el apartamento asignado un parqueadero marque esta opción" title="Si NO tiene el apartamento asignado un parqueadero marque esta opción" <?php if($apto_parq <> '1'){echo 'checked="checked"';}?>>NO
                    </label>
                </div>
            </div>
        </div>
        <!-- Habitado -->
        <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
            <label class="col-xs-12 col-sm-7 col-md-5 col-lg-5 control-label" for="rmb_aptos_habita">¿Habitado?: </label>
            <div class="col-xs-12 col-sm-5 col-md-7 col-lg-7">
                <div class="radio">
                    <label>
                        <input type="radio" name="rmb_aptos_habita" id="rmb_aptos_habita1" value="1" alt="Si el apartamento está habitado marque esta opción" title="Si el apartamento está habitado marque esta opción" <?php if($apto_habita == '1'){echo 'checked="checked"';}?>>SI
                    </label>
                    <label>
                        <input type="radio" name="rmb_aptos_habita" id="rmb_aptos_habita2" value="0" alt="Si el apartamento NO está habitado marque esta opción" title="Si el apartamento NO está habitado marque esta opción" <?php if($apto_habita <> '1'){echo 'checked="checked"';}?>>NO
                    </label>
                </div>
            </div>
        </div>
        <!-- Depósito -->
        <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
            <label class="col-xs-12 col-sm-7 col-md-5 col-lg-5 control-label" for="rmb_aptos_dep">¿Depósito?: </label>
            <div class="col-xs-12 col-sm-5 col-md-7 col-lg-7">
                <div class="radio">
                    <label>
                        <input type="radio" name="rmb_aptos_dep" id="rmb_aptos_dep1" value="1" alt="Si tiene el apartamento asignado un deposito marque esta opción" title="Si tiene el apartamento asignado un deposito marque esta opción" <?php if($apto_dep == '1'){echo 'checked="checked"';}?>>SI
                    </label>
                    <label>
                        <input type="radio" name="rmb_aptos_dep" id="rmb_aptos_dep2" value="0" alt="Si NO tiene el apartamento asignado un depósito marque esta opción" title="Si NO tiene el apartamento asignado un depósito marque esta opción" <?php if($apto_dep <> '1'){echo 'checked="checked"';}?>>NO
                    </label>
                </div>
            </div>
        </div>
        <!-- Banco -->
        <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
            <label class="col-xs-12 col-sm-7 col-md-5 col-lg-5 control-label" for="rmb_aptos_banco">¿Banco?: </label>
            <div class="col-xs-12 col-sm-5 col-md-7 col-lg-7">
                <div class="radio">
                    <label>
                        <input type="radio" name="rmb_aptos_banco" id="rmb_aptos_banco1" value="1" alt="Si el apartamento está pignorado por una entidad finaciera marque esta opción" title="Si el apartamento está pignorado por una entidad finaciera marque esta opción" <?php if($apto_banco == '1'){echo 'checked="checked"';}?>>SI
                    </label>
                    <label>
                        <input type="radio" name="rmb_aptos_banco" id="rmb_aptos_banco2" value="0" alt="Si el apartamento NO está pignorado por una entidad finaciera marque esta opción" title="Si el apartamento NO está pignorado por una entidad finaciera marque esta opción" <?php if($apto_banco <> '1'){echo 'checked="checked"';}?>>NO
                    </label>
                </div>
            </div>
        </div>
        <!-- Vulnerabilidad -->
        <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
            <label class="col-xs-12 col-sm-7 col-md-5 col-lg-5 control-label" for="rmb_aptos_vul">¿Vulnerabilidad?: </label>
            <div class="col-xs-12 col-sm-5 col-md-7 col-lg-7">
                <div class="radio">
                    <label>
                        <input type="radio" name="rmb_aptos_vul" id="rmb_aptos_vul1" value="1" alt="Si el apartamento presenta al menos una vulnerabilidad marque esta opción" title="Si el apartamento presenta al menos una vulnerabilidad marque esta opción" <?php if($apto_vul == '1'){echo 'checked="checked"';}?>>SI
                    </label>
                    <label>
                        <input type="radio" name="rmb_aptos_vul" id="rmb_aptos_vul2" value="0" alt="Si el apartamento NO presenta una vulnerabilidad marque esta opción" title="Si el apartamento NO presenta una vulnerabilidad marque esta opción" <?php if($apto_vul <> '1'){echo 'checked="checked"';}?>>NO
                    </label>
                </div>
            </div>
        </div>
        <!-- Inmobiliaria -->
        <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
            <label class="col-xs-12 col-sm-7 col-md-5 col-lg-5 control-label" for="rmb_aptos_inm">¿Inmobiliaria?: </label>
            <div class="col-xs-12 col-sm-5 col-md-7 col-lg-7">
                <div class="radio">
                    <label>
                        <input type="radio" name="rmb_aptos_inm" id="rmb_aptos_inm1" value="1" alt="Si el apartamento está arrendado por medio de una inmobiliaria marque esta opción" title="Si el apartamento está arrendado por medio de una inmobiliaria marque esta opción" <?php if($apto_inm == '1'){echo 'checked="checked"';}?>>SI
                    </label>
                    <label>
                        <input type="radio" name="rmb_aptos_inm" id="rmb_aptos_inm2" value="0" alt="Si el apartamento NO está arrendado por medio de una inmobiliaria marque esta opción" title="Si el apartamento NO está arrendado por medio de una inmobiliaria marque esta opción" <?php if($apto_inm <> '1'){echo 'checked="checked"';}?>>NO
                    </label>
                </div>
            </div>
        </div>
        <!-- Observación -->
        <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
            <label class="col-xs-12 col-sm-7 col-md-5 col-lg-5 control-label" for="rmb_aptos_obs">Observación: </label>
            <div class="col-xs-12 col-sm-5 col-md-7 col-lg-7">
                <textarea name="rmb_aptos_obs" id="rmb_aptos_obs" rows="3" placeholder="Ingrese una observación del apartamento, algo que le ayude a recordar de quien se trata, o tambien puede colocar el horario en que el contacto esta disponible, si cree que no es necesario deje el campo en blanco." alt="Ingrese una observación del apartamento, algo que le ayude a recordar de quien se trata, o tambien puede colocar el horario en que el contacto esta disponible, si cree que no es necesario deje el campo en blanco." title="Ingrese una observación del apartamento, algo que le ayude a recordar de quien se trata, o tambien puede colocar el horario en que el contacto esta disponible, si cree que no es necesario deje el campo en blanco." class="form-control" ><?php echo $apto_obs;?></textarea>
            </div>
        </div>
        <!-- Fecha -->
        <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
            <label class="col-xs-12 col-sm-7 col-md-5 col-lg-5 control-label" for="rmb_aptos_fecha">Última Actualización: </label>
            <div class="col-xs-12 col-sm-5 col-md-7 col-lg-7">
                <div class="form-control" alt="Esta es la fecha de la Última Actualización" title="Esta es la fecha de la Última Actualización"><?php echo $apto_fecha; ?></div>
            </div>
        </div>
        <div class="clearfix">&nbsp;</div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
            <?php 
            if($id_apto){?>
                <input type="hidden" name="id_upd" id="id_upd" class="form-control" value="<?php echo $id_apto;?>">
            <?php }?>
            <button type="submit" class="btn" alt="Ingresar / Actualizar datos del apartamento" title="Ingresar / Actualizar datos del apartamento" style="border: none;background-color: transparent;"><img src="../css/plantilla1/img/actualizar.png"></button>
        </div>
    </form>
</div>
<div class="clearfix">&nbsp;</div>
<script>
    cargaFormAptos();
    var id_apto = '<?php echo $id_apto;?>';
    // Validación formulario datos del apartamento
    $('#form_apto').bootstrapValidator({
        message: 'Este valor no es valido',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            rmb_torres_id: {
                message: 'La torre no es valida',
                validators: {
                    notEmpty: {
                        message: 'La torre es requerida'
                    }
                }
            },
            rmb_aptos_nom: {
                message: 'El número de apartamento no es valido',
                validators: {
                    notEmpty: {
                        message: 'El número de apartamento es requerido'
                    },
                    stringLength: {
                        min: 1,
                        max: 10,
                        message: 'El número de apartamento debe contener de 3 a 10 characteres'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ\_\s\.\-]+$/,
                        message: 'El número de apartamento debe ser alfanumérico.'
                    }
                }
            },
            rmb_taptos_id: {
                message: 'El número de apartamento no es valido',
                validators: {
                    notEmpty: {
                        message: 'El número de apartamento es requerido'
                    }
                }
            }
        }
    })
    .on('success.form.bv', function(e) {
        // Prevent form submission
        e.preventDefault();
        espereshow();
        var datos_form = new FormData($("#form_apto")[0]);
        $.ajax({
            url:"../php/ins_upd_apto.php",
            cache:false,
            type:"POST",
            contentType:false,
            data:datos_form,
            processData:false,
            success: function(datos){
                if(datos !== ''){
                    // alert(datos);
                    $("#col-md-12").load('detalle-del-apartamento.php?id_apto='+id_apto);
                    
                    swal({
                        title: "Felicidades!",
                        text: "El registro se ha guardado correctamente!",
                        type: "success",
                        confirmButtonText: "Continuar",
                        confirmButtonColor: "#94B86E"
                    },
                    function(){
                        $("#apto").parent().next().load('form_apto.php?id_apto='+datos);
                        $("#apto").addClass('activo');
                        $("#apto").parent().next().show();
                    });
                }
                else{
                    setTimeout(esperehide, 1000);
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
</script>