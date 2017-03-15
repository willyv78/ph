<?php session_start();
require_once ("../conexion/conexion.php");
require_once ("../php/funciones.php");
//////////////////////////////////////////////////////////////////////////////////////
// Aplicación PHP usando Bootstrap, jquery, HTML5 y CSS - PH                        //
// Copyright 2014 Wilson Giovanny Velandia Barreto 3204274564 - willyv78@gmail.com  //
//////////////////////////////////////////////////////////////////////////////////////
$res_residente = false;
$res_residente = registroCampo("rmb_residente r", "r.rmb_residente_id, r.rmb_residente_nom, r.rmb_residente_ape, r.rmb_carg_id, r.rmb_residente_foto, r.rmb_residente_tel, r.rmb_residente_email, r.rmb_residente_fnac", "WHERE r.rmb_residente_id = ".$_SESSION['UsuID'], "", "");
$res_apto = false;
$res_apto = registroCampo("rmb_residente_x_aptos rxa", "rxa.rmb_aptos_id", "WHERE rxa.rmb_residente_id = ".$_SESSION['UsuID'], "", "");
$res_apto_2 = false;
$res_apto_2 = registroCampo("rmb_residente_x_aptos rxa", "rxa.rmb_aptos_id", "WHERE rxa.rmb_residente_id = ".$_SESSION['UsuID'], "", "");
?>
<div class="form-body">
    <div class="row" ><?php 
    if($res_residente){
        if(mysql_num_rows($res_residente) > 0){
            $row_residente = mysql_fetch_array($res_residente);?>
            <!-- Datos básicos -->
            <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
                <!-- imagen de perfil -->
                <div class="col-xs-12 col-sm-3 col-md-2 col-lg-2"><?php 
                    if($row_residente[4]){$src_admin = $row_residente[4];}
                    else{$src_admin = imagenDefault();}?>
                    <img id="imagen_rande" src="<?php echo $src_admin;?>" width="100%" class="image" />
                </div>
                <div class="col-xs-12 col-sm-9 col-md-10 col-lg-10">
                    <div class="clearfix">&nbsp;</div>
                    <!-- Datos residente -->
                    <div id="datosperfil" class="col-xs-12 col-sm-6 col-md-6 col-lg-6 text-left">
                        <legend>Datos Básicos:</legend>
                        <table class="table table-striped"><?php 
                        if(($row_residente[1]) || ($row_residente[2])){?>
                            <tr>
                                <th class="col-xs-5 col-sm-5 col-md-5 col-lg-2">Nombre:</th>
                                <td class="col-xs-7 col-sm-7 col-md-7 col-lg-10"><?php echo $row_residente[1]." ".$row_residente[2];?></td>
                            </tr><?php 
                        }
                        if($row_residente[5]){?>
                            <tr>
                                <th>Teléfono:</th>
                                <td><?php echo $row_residente[5];?></td>
                            </tr><?php 
                        }
                        if($row_residente[6]){?>
                            <tr>
                                <th>Email:</th>
                                <td><?php echo $row_residente[6];?></td>
                            </tr><?php 
                        }
                        if($row_residente[7]){?>
                            <tr>
                                <th>Edad:</th>
                                <td><?php echo calculaedad($row_residente[7]);?></td>
                            </tr><?php 
                        }?>
                        </table>  
                    </div><?php 
                    if($res_apto){
                        if(mysql_num_rows($res_apto) > 0){
                            $row_apto = mysql_fetch_array($res_apto);
                            $res_papto = false;
                            $res_papto = registroCampo("rmb_residente_x_aptos rxa", "r.rmb_residente_nom, r.rmb_residente_ape, r.rmb_residente_tel, r.rmb_residente_email", "LEFT JOIN rmb_residente r USING(rmb_residente_id) WHERE rxa.rmb_tres_id = 1 AND rxa.rmb_aptos_id = ".$row_apto[0], "", "");
                            if($res_papto){
                                if(mysql_num_rows($res_papto) > 0){
                                    $row_papto = mysql_fetch_array($res_papto);?>
                                    <!-- Datos propietario apartamento -->
                                    <div id="datosperfil" class="col-xs-12 col-sm-6 col-md-6 col-lg-6 text-left">
                                        <legend>Propietario Apartamento:</legend>
                                        <table class="table table-striped">
                                            <tr>
                                                <th class="col-xs-5 col-sm-5 col-md-5 col-lg-2">Nombre:</th>
                                                <td class="col-xs-7 col-sm-7 col-md-7 col-lg-10"><?php echo $row_papto[0]. " " .$row_papto[1];?></td>
                                            </tr>
                                            <tr>
                                                <th>Teléfono:</th>
                                                <td><?php echo $row_papto[2];?></td>
                                            </tr>
                                            <tr>
                                                <th>Email:</th>
                                                <td><?php echo $row_papto[3];?></td>
                                            </tr>
                                        </table>
                                    </div><?php 
                                }
                            }
                        }
                    }?>
                </div>
            </div>
            <!-- fin datos básicos -->
            <?php 
            if($res_apto_2){
                if(mysql_num_rows($res_apto_2) > 0){
                    $row_id_apto = mysql_fetch_array($res_apto_2);?>
                    <!-- Otros datos -->
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><?php 
                        $res_aptos = false;
                        $res_aptos = registroCampo("rmb_aptos a", "a.rmb_taptos_id, a.rmb_aptos_nom, p.rmb_parq_nom, a.rmb_aptos_area, a.rmb_aptos_hab, a.rmb_aptos_banos, a.rmb_aptos_coef, d.rmb_depos_nom, a.rmb_aptos_terr", "LEFT JOIN rmb_depos d USING(rmb_aptos_id) LEFT JOIN rmb_parq p USING(rmb_aptos_id) WHERE a.rmb_aptos_id = ".$row_id_apto[0], "", "");
                        if($res_aptos){
                            if(mysql_num_rows($res_aptos) > 0){
                                $row_aptos = mysql_fetch_array($res_aptos);?>
                                <!-- Datos apartamento -->
                                <div id="datosperfil" class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-left">
                                    <div id="datosperfil" class="col-md-12 col-sm-12 col-xs-12 col-lg-12 text-left">
                                        <legend>Apartamento:</legend>
                                        <div class="col-xs-5 col-sm-2 col-md-2 col-lg-2 text-nowrap"><b>Tipo:</b></div>
                                        <div class="col-xs-7 col-sm-2 col-md-2 col-lg-2 text-nowrap"><?php echo nombreCampo($row_aptos[0], "rmb_taptos");?></div>
                                        <div class="col-xs-5 col-sm-2 col-md-2 col-lg-2 text-nowrap"><b>Número:</b></div>
                                        <div class="col-xs-7 col-sm-2 col-md-2 col-lg-2 text-nowrap"><?php echo $row_aptos[1];?></div>
                                        <div class="col-xs-5 col-sm-2 col-md-2 col-lg-2 text-nowrap"><b>Nº Parqueadero:</b></div>
                                        <div class="col-xs-7 col-sm-2 col-md-2 col-lg-2 text-nowrap"><?php echo $row_aptos[2];?></div>
                                        <div class="col-xs-5 col-sm-2 col-md-2 col-lg-2 text-nowrap"><b>Área:</b></div>
                                        <div class="col-xs-7 col-sm-2 col-md-2 col-lg-2 text-nowrap"><?php echo $row_aptos[3];?> Mts2</div>
                                        <div class="col-xs-5 col-sm-2 col-md-2 col-lg-2 text-nowrap"><b>Nº Alcobas:</b></div>
                                        <div class="col-xs-7 col-sm-2 col-md-2 col-lg-2 text-nowrap"><?php echo $row_aptos[4];?></div>
                                        <div class="col-xs-5 col-sm-2 col-md-2 col-lg-2 text-nowrap"><b>Nº Baños:</b></div>
                                        <div class="col-xs-7 col-sm-2 col-md-2 col-lg-2 text-nowrap"><?php echo $row_aptos[5];?></div>
                                        <div class="col-xs-5 col-sm-2 col-md-2 col-lg-2 text-nowrap"><b>Coeficiente(%):</b></div>
                                        <div class="col-xs-7 col-sm-2 col-md-2 col-lg-2 text-nowrap"><?php echo $row_aptos[6];?></div>
                                        <div class="col-xs-5 col-sm-2 col-md-2 col-lg-2 text-nowrap"><b>Nº Deposito:</b></div>
                                        <div class="col-xs-7 col-sm-2 col-md-2 col-lg-2 text-nowrap"><?php echo $row_aptos[7];?></div>
                                        <div class="col-xs-5 col-sm-2 col-md-2 col-lg-2 text-nowrap"><b>Terraza:</b></div>
                                        <div class="col-xs-7 col-sm-2 col-md-2 col-lg-2 text-nowrap"><?php if($row_aptos[8] <> '0'){echo "SI";}else{echo "NO";}?></div>
                                    </div>
                                </div>
                                <div class="clearfix">&nbsp;</div><?php 
                            }
                        }
                        $res_residentes = false;
                        $res_residentes = registroCampo("rmb_residente_x_aptos rxa", "r.rmb_residente_nom, r.rmb_residente_ape, r.rmb_residente_fnac", "LEFT JOIN rmb_residente r USING(rmb_residente_id) WHERE rxa.rmb_tres_id = 2 AND rxa.rmb_aptos_id = ".$row_id_apto[0], "", "");
                        if($res_residentes){
                            if(mysql_num_rows($res_residentes) > 0){?>
                                <div class="clearfix">&nbsp;</div>
                                <!-- Datos habitantes -->
                                <div id="datosperfil" class="col-xs-12 col-sm-12 col-md-12 col-lg-6 text-left">
                                    <legend>Residentes:</legend>
                                    <table class="table table-striped">
                                        <tr>
                                            <th class="col-xs-7 col-sm-7 col-md-7 col-lg-6">Nombre</th>
                                            <th class="col-xs-5 col-sm-5 col-md-5 col-lg-6">Edad</th>
                                        </tr><?php 
                                        while($row_residentes = mysql_fetch_array($res_residentes)){?>
                                            <tr>
                                                <td><?php echo $row_residentes[0] ." ". $row_residentes[1];?></td>
                                                <td><?php echo calculaedad($row_residentes[2]);?></td>
                                            </tr><?php 
                                        }?>
                                    </table>  
                                </div><?php 
                            }
                        }
                        $res_autorizadas = false;
                        $res_autorizadas = registroCampo("rmb_residente_x_aptos rxa", "r.rmb_residente_nom, r.rmb_residente_ape, r.rmb_residente_doc", "LEFT JOIN rmb_residente r USING(rmb_residente_id) WHERE rxa.rmb_tres_id = 7 AND rxa.rmb_aptos_id = ".$row_id_apto[0], "", "");
                        if($res_autorizadas){
                            if(mysql_num_rows($res_autorizadas) > 0){?>
                                <!-- Datos personas autorizadas -->
                                <div id="datosperfil" class="col-xs-12 col-sm-12 col-md-12 col-lg-6 text-left">
                                    <legend>Personas Autorizadas:</legend>
                                    <table class="table table-striped">
                                        <tr>
                                            <th class="col-xs-7 col-sm-7 col-md-7 col-lg-6">Nombre</th>
                                            <th class="col-xs-5 col-sm-5 col-md-5 col-lg-6">Documento</th>
                                        </tr><?php 
                                        while($row_autorizadas = mysql_fetch_array($res_autorizadas)){?>
                                            <tr>
                                                <td><?php echo $row_autorizadas[0] ." ". $row_autorizadas[1];?></td>
                                                <td><?php echo $row_autorizadas[2];?></td>
                                            </tr><?php 
                                        }?>
                                    </table>  
                                </div><?php 
                            }
                        }
                        $res_emergencia = false;
                        $res_emergencia = registroCampo("rmb_residente_x_aptos rxa", "r.rmb_residente_nom, r.rmb_residente_ape, r.rmb_residente_doc, r.rmb_residente_tel", "LEFT JOIN rmb_residente r USING(rmb_residente_id) WHERE rxa.rmb_tres_id = 9 AND rxa.rmb_aptos_id = ".$row_id_apto[0], "", "");
                        if($res_emergencia){
                            if(mysql_num_rows($res_emergencia) > 0){?>
                                <div class="clearfix">&nbsp;</div>
                                <!-- Datos en caso de emergencia -->
                                <div id="datosperfil" class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-left">
                                    <legend>En caso de emergencia:</legend>
                                    <table class="table table-striped">
                                        <tr>
                                            <th class="col-xs-7 col-sm-7 col-md-7 col-lg-3">Nombre</th>
                                            <th class="col-xs-5 col-sm-5 col-md-5 col-lg-3">Documento</th>
                                            <th class="col-xs-5 col-sm-5 col-md-5 col-lg-6">Teléfono</th>
                                        </tr><?php 
                                        while($row_emergencia = mysql_fetch_array($res_emergencia)){?>
                                            <tr>
                                                <td><?php echo $row_emergencia[0] ." ". $row_emergencia[1];?></td>
                                                <td><?php echo $row_emergencia[2];?></td>
                                                <td><?php echo $row_emergencia[3];?></td>
                                            </tr><?php 
                                        }?>
                                    </table>  
                                </div><?php 
                            }
                        }
                        $res_mascotas = false;
                        $res_mascotas = registroCampo("rmb_mascotas m", "m.rmb_tmascotas_id, m.rmb_mascotas_raza, m.rmb_mascotas_nom, m.rmb_mascotas_vac", "WHERE m.rmb_aptos_id = ".$row_id_apto[0], "", "");
                        if($res_mascotas){
                            if(mysql_num_rows($res_mascotas) > 0){?>
                                <div class="clearfix">&nbsp;</div>
                                <!-- Datos mascotas -->
                                <div id="datosperfil" class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-left">
                                    <legend>Mascotas:</legend>
                                    <table class="table table-striped">
                                        <tr>
                                            <th class="col-xs-5 col-sm-3 col-md-3 col-lg-3">Tipo</th>
                                            <th class="hidden-xs col-sm-3 col-md-3 col-lg-3">Raza</th>
                                            <th class="col-xs-7 col-sm-3 col-md-3 col-lg-3">Nombre</th>
                                            <th class="hidden-xs col-sm-3 col-md-3 col-lg-3">Vacunas</th>
                                        </tr><?php 
                                        while($row_mascotas = mysql_fetch_array($res_mascotas)){?>
                                            <tr>
                                                <td><?php echo nombreCampo($row_mascotas[0], "rmb_tmascotas");?></td>
                                                <td class="hidden-xs"><?php echo $row_mascotas[1];?></td>
                                                <td><?php echo $row_mascotas[2];?></td>
                                                <td class="hidden-xs"><?php 
                                                if($row_mascotas[3]){?>
                                                    <button name="" type='button' class='btn btn-default' title='Descargar documento' alt='Descargar documento'>
                                                        <i class='glyphicon glyphicon-save'></i>
                                                    </button><?php 
                                                }?>
                                                </td>
                                            </tr><?php 
                                        }?>
                                    </table>  
                                </div><?php 
                            }
                        }
                        $res_veh = false;
                        $res_veh = registroCampo("rmb_veh v", "v.rmb_tveh_id, v.rmb_veh_marca, v.rmb_veh_mod, v.rmb_veh_placa, v.rmb_veh_color", "WHERE v.rmb_aptos_id = ".$row_id_apto[0], "", "");
                        if($res_veh){
                            if(mysql_num_rows($res_veh) > 0){?>
                                <div class="clearfix">&nbsp;</div>
                                <!-- Datos vehículos -->
                                <div id="datosperfil" class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-left">
                                    <legend>Mascotas:</legend>
                                    <table class="table table-striped">
                                        <tr>
                                            <th class="col-xs-5 col-sm-3 col-md-3 col-lg-3">Tipo</th>
                                            <th class="hidden-xs col-sm-3 col-md-3 col-lg-3">Marca</th>
                                            <th class="hidden-xs col-sm-2 col-md-2 col-lg-2">Modelo</th>
                                            <th class="col-xs-7 col-sm-2 col-md-2 col-lg-2">Placa</th>
                                            <th class="hidden-xs col-sm-2 col-md-2 col-lg-2">Color</th>
                                        </tr><?php 
                                        while($row_veh = mysql_fetch_array($res_veh)){?>
                                            <tr>
                                                <td><?php echo nombreCampo($row_veh[0], "rmb_tveh");?></td>
                                                <td class="hidden-xs"><?php echo $row_veh[1];?></td>
                                                <td><?php echo $row_veh[2];?></td>
                                                <td><?php echo $row_veh[3];?></td>
                                                <td><?php echo $row_veh[4];?></td>
                                            </tr><?php 
                                        }?>
                                    </table>  
                                </div><?php 
                            }
                        }
                        $res_servicio = false;
                        $res_servicio = registroCampo("rmb_residente_x_aptos rxa", "r.rmb_residente_nom, r.rmb_residente_ape, r.rmb_residente_doc, r.rmb_residente_nom2, r.rmb_residente_obs, r.rmb_carg_id, r.rmb_residente_foto", "LEFT JOIN rmb_residente r USING(rmb_residente_id) WHERE rxa.rmb_tres_id = 5 AND rxa.rmb_aptos_id = ".$row_id_apto[0], "", "");
                        if($res_servicio){
                            if(mysql_num_rows($res_servicio) > 0){?>
                                <div class="clearfix">&nbsp;</div>
                                <!-- Datos en caso de emergencia -->
                                <div id="datosperfil" class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-left">
                                    <legend>En caso de emergencia:</legend>
                                    <table class="table table-striped">
                                        <tr>
                                            <th class="col-xs-5 col-sm-3 col-md-3 col-lg-2">Nombre</th>
                                            <th class="hidden-xs hidden-sm hidden-md col-lg-2">Nº Identificación</th>
                                            <th class="hidden-xs hidden-sm hidden-md col-lg-2">Horario</th>
                                            <th class="hidden-xs col-sm-4 col-md-4 col-lg-3">Permisos</th>
                                            <th class="col-xs-7 col-sm-2 col-md-2 col-lg-2">Cargo</th>
                                            <th class="hidden-xs col-sm-1 col-md-1 col-lg-1">Foto</th>
                                        </tr><?php 
                                        while($row_servicio = mysql_fetch_array($res_servicio)){?>
                                            <tr>
                                                <td><?php echo $row_servicio[0] ." ". $row_servicio[1];?></td>
                                                <td><?php echo $row_servicio[2];?></td>
                                                <td><?php echo $row_servicio[3];?></td>
                                                <td><?php echo $row_servicio[4];?></td>
                                                <td><?php echo nombreCampo($row_servicio[5], "rmb_carg");?></td>
                                                <td><?php 
                                                if($row_servicio[6]){$src = $row_servicio[6];}
                                                else{$src = imagenDefault();}?>
                                                    <img src="<?php echo $src;?>" width="30%"/>
                                                </td>
                                            </tr><?php 
                                        }?>
                                    </table>  
                                </div><?php 
                            }
                        }?>

                    </div><?php 
                }
            }?>
            <div id="datosperfil" class="col-md-12 col-sm-12 col-xs-12 col-lg-12"><br>
                <button type="button" class="btn btn-default"> Actualizar Datos </button>
            </div><?php 
        }
    }?>
    </div>
</div>
<script>cargaPerfil();</script>