<?php
session_start();
require_once ("../conexion/conexion.php");
require_once ("../php/funciones.php");
//////////////////////////////////////////////////////////////////////////////////////
// Aplicación PHP usando Bootstrap, jquery, HTML5 y CSS - PH                        //
// Copyright 2014 Wilson Giovanny Velandia Barreto 3204274564 - willyv78@gmail.com  //
//////////////////////////////////////////////////////////////////////////////////////
$apto_id = "";$apto_torre = "";$apto_banco = "";$prop_vive = "";$apto_inm = "";$apto_propio = "";$apto_parq = "";$apto_dep = "";$apto_vul = "";$total_porc_apto = 0;$total_porc_prop = 0;$total_porc_inm = 0;$total_porc_ban = 0;$total_porc_arren = 0;$total_porc_hab = 0;$total_porc_parq = 0;$total_porc_dep = 0;$total_porc_veh = 0;$total_porc_serv = 0;$total_porc_masc = 0;$total_porc_aut = 0;$total_porc_emer = 0;$total_porc_vuln = 0;$clase_apto = "btn-danger";$clase_prop = "btn-danger";$clase_inm = "btn-danger";$clase_ban = "btn-danger";$clase_arren = "btn-danger";$clase_hab = "btn-danger";$clase_parq = "btn-danger";$clase_dep = "btn-danger";$clase_veh = "btn-danger";$clase_serv = "btn-danger";$clase_masc = "btn-danger";$clase_aut = "btn-danger";$clase_emer = "btn-danger";$clase_vuln = "btn-danger";$num_prop = 0;$num_inm = 0;$num_ban = 0;$num_arren = 0;$num_hab = 0;$num_parq = 0;$num_dep = 0;$num_veh = 0;$num_serv = 0;$num_masc = 0;$num_aut = 0;$num_emer = 0;$num_vuln = 0;

if(isset($_GET['id_apto'])){
    $id_apto = $_GET['id_apto'];
    // Datos del apartamento
    $res_apto = registroCampo("rmb_aptos a", "a.rmb_aptos_nom, a.rmb_torres_id, a.rmb_taptos_id, a.rmb_aptos_tel, a.rmb_aptos_area, a.rmb_aptos_priv, a.rmb_aptos_banos, a.rmb_aptos_hab, a.rmb_aptos_balc, a.rmb_aptos_inm, a.rmb_aptos_habita, a.rmb_aptos_parq, a.rmb_aptos_dep, a.rmb_aptos_coef, a.rmb_aptos_terr, a.rmb_aptos_vul, a.rmb_aptos_banco, a.rmb_aptos_serv, a.rmb_aptos_est, a.rmb_aptos_propio, a.rmb_aptos_numhab, a.rmb_aptos_masc, a.rmb_aptos_arrend", "WHERE a.rmb_aptos_id = '$id_apto'", "", "");
    if($res_apto){
        if(mysql_num_rows($res_apto) > 0){
            $row_apto = mysql_fetch_array($res_apto);
            if($row_apto[0] <> ''){$total_porc_apto += 4.55;}
            if($row_apto[1] <> ''){$apto_torre = $row_apto[1];$total_porc_apto += 4.55;}
            if($row_apto[2] <> ''){$total_porc_apto += 4.55;}
            if($row_apto[3] <> ''){$total_porc_apto += 4.55;}
            if($row_apto[4] <> ''){$total_porc_apto += 4.55;}
            if($row_apto[5] <> ''){$total_porc_apto += 4.55;}
            if($row_apto[6] <> ''){$total_porc_apto += 4.55;}
            if($row_apto[7] <> ''){$total_porc_apto += 4.55;}
            if($row_apto[8] <> ''){$total_porc_apto += 4.55;}
            if($row_apto[9] <> ''){$apto_inm = $row_apto[9];$total_porc_apto += 4.55;}
            if($row_apto[10] <> ''){$total_porc_apto += 4.55;}
            if($row_apto[11] <> ''){$apto_parq = $row_apto[11];$total_porc_apto += 4.55;}
            if($row_apto[12] <> ''){$apto_dep = $row_apto[12];$total_porc_apto += 4.55;}
            if($row_apto[13] <> ''){$total_porc_apto += 4.55;}
            if($row_apto[14] <> ''){$total_porc_apto += 4.55;}
            if($row_apto[15] <> ''){$apto_vul = $row_apto[15];$total_porc_apto += 4.55;}
            if($row_apto[16] <> ''){$apto_banco = $row_apto[16];$total_porc_apto += 4.55;}
            if($row_apto[17] <> ''){$total_porc_apto += 4.55;}
            if($row_apto[18] <> ''){$total_porc_apto += 4.55;}
            if($row_apto[19] <> ''){$apto_propio = $row_apto[19];$total_porc_apto += 4.55;}
            $num_hab = $row_apto[20];
            if($row_apto[21] <> ''){$apto_masc = $row_apto[21];$total_porc_apto += 4.55;}
            if($row_apto[22] <> ''){$apto_arrend = $row_apto[22];$total_porc_apto += 4.55;}
        }
    }
    // Datos de los residentes y otros
    $res_resd = registroCampo("rmb_residente_x_aptos rxa", "rxa.rmb_tres_id, r.rmb_residente_nom, r.rmb_residente_ape, r.rmb_residente_doc, r.rmb_residente_dir, r.rmb_residente_tel, r.rmb_residente_cel, r.rmb_residente_pass, r.rmb_residente_email, r.rmb_residente_fnac, r.rmb_residente_nom2, r.rmb_residente_obs, r.rmb_residente_fini, r.rmb_residente_ffin, r.rmb_residente_foto, r.rmb_gen_id, r.rmb_residente_hijo, r.rmb_residente_vive, r.rmb_residente_perm, r.rmb_perf_id, r.rmb_carg_id, r.rmb_vinculo_id, r.rmb_tdoc_id, r.rmb_est_id, r.rmb_residente_cert, r.rmb_residente_fcert", "LEFT JOIN rmb_residente r USING(rmb_residente_id) WHERE rxa.rmb_aptos_id = '$id_apto' AND (rxa.rmb_tres_id = 1 OR rxa.rmb_tres_id = 2 OR rxa.rmb_tres_id = 3 OR rxa.rmb_tres_id = 5 OR rxa.rmb_tres_id = 6 OR rxa.rmb_tres_id = 7 OR rxa.rmb_tres_id = 8 OR rxa.rmb_tres_id = 9)", "", "");
    if($res_resd){
        if(mysql_num_rows($res_resd) > 0){
            while($row_resd = mysql_fetch_array($res_resd)){
                // Propietario
                if($row_resd[0] == 1){
                    $num_prop += 1;
                    // Nombres
                    if($row_resd[1] <> ''){$total_porc_prop += 5.9;}
                    // Apellidos
                    if($row_resd[2] <> ''){$total_porc_prop += 5.9;}
                    // Numero documento
                    if($row_resd[3] <> ''){$total_porc_prop += 5.9;}
                    // Direccion
                    if($row_resd[4] <> ''){$total_porc_prop += 5.9;}
                    // Telefono
                    if($row_resd[5] <> ''){$total_porc_prop += 5.9;}
                    // Celular
                    if($row_resd[6] <> ''){$total_porc_prop += 5.9;}
                    // Password
                    if($row_resd[7] <> ''){$total_porc_prop += 5.9;}
                    // Email
                    if($row_resd[8] <> ''){$total_porc_prop += 5.9;}
                    // Fecha nacimiento
                    if($row_resd[9] <> ''){$total_porc_prop += 5.9;}
                    // Razon social
                    // Observación
                    // Fecha Inicial
                    // Fecha final
                    // Foto
                    // Genero
                    if($row_resd[15] <> ''){$total_porc_prop += 5.9;}
                    // hijo
                    if($row_resd[16] <> ''){$total_porc_prop += 5.9;}
                    // Vive
                    if($row_resd[17] <> ''){
                        $prop_vive = $row_resd[17];
                        $total_porc_prop += 5.9;
                        if($prop_vive == 1){
                            // Nombres
                            if($row_resd[1] <> ''){$total_porc_hab += 11.2;}
                            // Apellidos
                            if($row_resd[2] <> ''){$total_porc_hab += 11.2;}
                            // Numero documento
                            if($row_resd[3] <> ''){$total_porc_hab += 11.2;}
                            // Fecha nacimiento
                            if($row_resd[9] <> ''){$total_porc_hab += 11.2;}
                            // Genero
                            if($row_resd[15] <> ''){$total_porc_hab += 11.2;}
                            // hijo
                            if($row_resd[16] <> ''){$total_porc_hab += 11.2;}
                            // Vinculo
                            if($row_resd[21] <> ''){$total_porc_hab += 11.2;}
                            // Tipo documento
                            if($row_resd[22] <> ''){$total_porc_hab += 11.2;}
                            // Estado
                            if($row_resd[23] <> ''){$total_porc_hab += 11.2;}
                        }
                    }
                    // Permisos
                    // Perfil
                    if($row_resd[19] <> ''){$total_porc_prop += 5.9;}
                    // Cargo
                    // Vinculo
                    // Tipo documento
                    if($row_resd[22] <> ''){$total_porc_prop += 5.9;}
                    // Estado
                    if($row_resd[23] <> ''){$total_porc_prop += 5.9;}
                    // Certificado de tradicion
                    if($row_resd[24] <> ''){$total_porc_prop += 5.9;}
                    // Fecha certificado de tradición
                    if($row_resd[25] <> ''){$total_porc_prop += 5.9;}
                }
                // Residente / Habitantes
                if($row_resd[0] == 2){
                    // Nombres
                    if($row_resd[1] <> ''){$total_porc_hab += 11.2;}
                    // Apellidos
                    if($row_resd[2] <> ''){$total_porc_hab += 11.2;}
                    // Numero Documento
                    if($row_resd[3] <> ''){$total_porc_hab += 11.2;}
                    // fecha nacimiento
                    if(($row_resd[9] <> '') && ($row_resd[9] <> '0000-00-00')){$total_porc_hab += 11.2;}
                    // Genero
                    if($row_resd[15] <> ''){$total_porc_hab += 11.2;}
                    // tiene hijos
                    if($row_resd[16] <> ''){$total_porc_hab += 11.2;}
                    // Vínculo
                    if($row_resd[21] <> ''){$total_porc_hab += 11.2;}
                    // tipo de documento
                    if($row_resd[22] <> ''){$total_porc_hab += 11.2;}
                    // estado
                    if($row_resd[23] <> ''){$total_porc_hab += 11.2;}
                }
                // Arrendatario
                if($row_resd[0] == 3){
                    $num_arren += 1;
                    // Nombres
                    if($row_resd[1] <> ''){$total_porc_arren += 6.7;}
                    // Apellidos
                    if($row_resd[2] <> ''){$total_porc_arren += 6.7;}
                    // Numero Documento
                    if($row_resd[3] <> ''){$total_porc_arren += 6.7;}
                    // Direccion
                    if($row_resd[4] <> ''){$total_porc_arren += 6.7;}
                    // Telefono
                    if($row_resd[5] <> ''){$total_porc_arren += 6.7;}
                    // Celular
                    if($row_resd[6] <> ''){$total_porc_arren += 6.7;}
                    // Email
                    if($row_resd[8] <> ''){$total_porc_arren += 6.7;}
                    // fecha nacimiento
                    if(($row_resd[9] <> '') && ($row_resd[9] <> '0000-00-00')){$total_porc_arren += 6.7;}
                    // Genero
                    if($row_resd[15] <> ''){$total_porc_arren += 6.7;}
                    // tiene hijos
                    if($row_resd[16] <> ''){$total_porc_arren += 6.7;}
                    // Vive en el apto
                    if($row_resd[17] <> ''){$total_porc_arren += 6.7;}
                    // tipo de documento
                    if($row_resd[22] <> ''){$total_porc_arren += 6.7;}
                    // estado
                    if($row_resd[23] <> ''){$total_porc_arren += 6.7;}
                }
                // Empleados Servicio
                if($row_resd[0] == 5){
                    $num_serv += 1;
                    // Nombres
                    if($row_resd[1] <> ''){$total_porc_serv += 6.7;$total_porc_hab += 11.2;}
                    // Apellidos
                    if($row_resd[2] <> ''){$total_porc_serv += 6.7;$total_porc_hab += 11.2;}
                    // Numero Documento
                    if($row_resd[3] <> ''){$total_porc_serv += 6.7;$total_porc_hab += 11.2;}
                    // Direccion
                    if($row_resd[4] <> ''){$total_porc_serv += 6.7;$total_porc_hab += 11.2;}
                    // Telefono
                    if($row_resd[5] <> ''){$total_porc_serv += 6.7;$total_porc_hab += 11.2;}
                    // Celular
                    if($row_resd[6] <> ''){$total_porc_serv += 6.7;$total_porc_hab += 11.2;}
                    // Email
                    if($row_resd[8] <> ''){$total_porc_serv += 6.7;$total_porc_hab += 11.2;}
                    // fecha nacimiento
                    if(($row_resd[9] <> '') && ($row_resd[9] <> '0000-00-00')){$total_porc_serv += 6.7;$total_porc_hab += 11.2;}
                    // Foto
                    if($row_resd[14] <> ''){$total_porc_serv += 6.7;$total_porc_hab += 11.2;}
                    // Genero
                    if($row_resd[15] <> ''){$total_porc_serv += 6.7;$total_porc_hab += 11.2;}
                    // Vive en el apto
                    if($row_resd[17] <> ''){$total_porc_serv += 6.7;$total_porc_hab += 11.2;}
                    // Pasado Judicial
                    if($row_resd[18] <> ''){$total_porc_serv += 6.7;$total_porc_hab += 11.2;}
                    // cargo
                    if($row_resd[20] <> ''){$total_porc_serv += 6.7;$total_porc_hab += 11.2;}
                    // tipo de documento
                    if($row_resd[22] <> ''){$total_porc_serv += 6.7;$total_porc_hab += 11.2;}
                    // estado
                    if($row_resd[23] <> ''){$total_porc_serv += 6.7;$total_porc_hab += 11.2;}
                }
                // Bancos
                if($row_resd[0] == 6){
                    $num_ban += 1;
                    // Nombres
                    if($row_resd[1] <> ''){$total_porc_ban += 8.4;}
                    // Numero Documento
                    if($row_resd[3] <> ''){$total_porc_ban += 8.4;}
                    // Direccion
                    if($row_resd[4] <> ''){$total_porc_ban += 8.4;}
                    // Telefono
                    if($row_resd[5] <> ''){$total_porc_ban += 8.4;}
                    // Celular
                    if($row_resd[6] <> ''){$total_porc_ban += 8.4;}
                    // Password
                    if($row_resd[7] <> ''){$total_porc_ban += 8.4;}
                    // Email
                    if($row_resd[8] <> ''){$total_porc_ban += 8.4;}
                    // Razon Social
                    if($row_resd[10] <> ''){$total_porc_ban += 8.4;}
                    // tipo de documento
                    if($row_resd[22] <> ''){$total_porc_ban += 8.4;}
                    // estado
                    if($row_resd[23] <> ''){$total_porc_ban += 8.4;}
                    // Certificado de tradición
                    if($row_resd[24] <> ''){$total_porc_ban += 8.4;}
                    // Fecha de certificado
                    if($row_resd[25] <> ''){$total_porc_ban += 8.4;}
                }
                // Autorizadas
                if($row_resd[0] == 7){
                    $num_aut += 1;
                    // Nombres
                    if($row_resd[1] <> ''){$total_porc_aut += 8.4;}
                    // Apellidos
                    if($row_resd[2] <> ''){$total_porc_aut += 8.4;}
                    // Numero Documento
                    if($row_resd[3] <> ''){$total_porc_aut += 8.4;}
                    // Direccion
                    if($row_resd[4] <> ''){$total_porc_aut += 8.4;}
                    // Telefono
                    if($row_resd[5] <> ''){$total_porc_aut += 8.4;}
                    // Celular
                    if($row_resd[6] <> ''){$total_porc_aut += 8.4;}
                    // Email
                    if($row_resd[8] <> ''){$total_porc_aut += 8.4;}
                    // fecha nacimiento
                    if(($row_resd[9] <> '') && ($row_resd[9] <> '0000-00-00')){$total_porc_aut += 8.4;}
                    // Foto
                    if($row_resd[14] <> ''){$total_porc_aut += 8.4;}
                    // Genero
                    if($row_resd[15] <> ''){$total_porc_aut += 8.4;}
                    // Vinculo
                    if($row_resd[21] <> ''){$total_porc_aut += 8.4;}
                    // tipo de documento
                    if($row_resd[22] <> ''){$total_porc_aut += 8.4;}
                }
                // Inmobiliarias
                if($row_resd[0] == 8){
                    $num_inm += 1;
                    // Nombres
                    if($row_resd[1] <> ''){$total_porc_inm += 11.2;}
                    // Numero Documento
                    if($row_resd[3] <> ''){$total_porc_inm += 11.2;}
                    // Direccion
                    if($row_resd[4] <> ''){$total_porc_inm += 11.2;}
                    // Telefono
                    if($row_resd[5] <> ''){$total_porc_inm += 11.2;}
                    // Celular
                    if($row_resd[6] <> ''){$total_porc_inm += 11.2;}
                    // Email
                    if($row_resd[8] <> ''){$total_porc_inm += 11.2;}
                    // Razon Social
                    if($row_resd[10] <> ''){$total_porc_inm += 11.2;}
                    // tipo de documento
                    if($row_resd[22] <> ''){$total_porc_inm += 11.2;}
                    // estado
                    if($row_resd[23] <> ''){$total_porc_inm += 11.2;}
                }
                // Emergencia
                if($row_resd[0] == 9){
                    $num_emer += 1;
                    // Nombres
                    if($row_resd[1] <> ''){$total_porc_emer += 7.7;}
                    // Apellidos
                    if($row_resd[2] <> ''){$total_porc_emer += 7.7;}
                    // Numero Documento
                    if($row_resd[3] <> ''){$total_porc_emer += 7.7;}
                    // Direccion
                    if($row_resd[4] <> ''){$total_porc_emer += 7.7;}
                    // Telefono
                    if($row_resd[5] <> ''){$total_porc_emer += 7.7;}
                    // Celular
                    if($row_resd[6] <> ''){$total_porc_emer += 7.7;}
                    // Email
                    if($row_resd[8] <> ''){$total_porc_emer += 7.7;}
                    // fecha nacimiento
                    if(($row_resd[9] <> '') && ($row_resd[9] <> '0000-00-00')){$total_porc_emer += 7.7;}
                    // Genero
                    if($row_resd[15] <> ''){$total_porc_emer += 7.7;}
                    // Vive en el apto
                    if($row_resd[17] <> ''){$total_porc_emer += 7.7;}
                    // Vinculo
                    if($row_resd[21] <> ''){$total_porc_emer += 7.7;}
                    // tipo de documento
                    if($row_resd[22] <> ''){$total_porc_emer += 7.7;}
                    // estado
                    if($row_resd[23] <> ''){$total_porc_emer += 7.7;}
                }
            }
        }
    }
    // Datos de los vehiculos
    $res_veh = registroCampo("rmb_veh v", "v.rmb_veh_placa, v.rmb_veh_marca, v.rmb_veh_mod, v.rmb_veh_color, v.rmb_tveh_id", "WHERE v.rmb_aptos_id = '$id_apto'", "", "");
    if($res_veh){
        if(mysql_num_rows($res_veh) > 0){
            while ($row_veh = mysql_fetch_array($res_veh)) {
                $num_veh += 1;
                if($row_veh[0] <> ''){$total_porc_veh += 20;}
                if($row_veh[1] <> ''){$total_porc_veh += 20;}
                if($row_veh[2] <> ''){$total_porc_veh += 20;}
                if($row_veh[3] <> ''){$total_porc_veh += 20;}
                if($row_veh[4] <> ''){$total_porc_veh += 20;}
            }
        }
    }
    // Datos de las mascotas
    $res_masc = registroCampo("rmb_mascotas m", "m.rmb_mascotas_nom, m.rmb_mascotas_raza, m.rmb_mascotas_vac, m.rmb_tmascotas_id", "WHERE m.rmb_aptos_id = '$id_apto'", "", "");
    if($res_masc){
        if(mysql_num_rows($res_masc) > 0){
            while ($row_masc = mysql_fetch_array($res_masc)) {
                $num_masc += 1;
                if($row_masc[0] <> ''){$total_porc_masc += 25;}
                if($row_masc[1] <> ''){$total_porc_masc += 25;}
                if($row_masc[2] <> ''){$total_porc_masc += 25;}
                if($row_masc[3] <> ''){$total_porc_masc += 25;}
            }
        }
    }
    // Datos de los parqueaderos
    $res_parq = registroCampo("rmb_parq p", "p.rmb_parq_nom", "WHERE p.rmb_aptos_id = '$id_apto'", "", "");
    if($res_parq){
        if(mysql_num_rows($res_parq) > 0){
            while ($row_parq = mysql_fetch_array($res_parq)) {
                $num_parq += 1;
                if($row_parq[0] <> ''){$total_porc_parq += 100;}
            }
        }
    }
    // Datos de los depositos
    $res_dep = registroCampo("rmb_depos d", "d.rmb_depos_nom", "WHERE d.rmb_aptos_id = '$id_apto'", "", "");
    if($res_dep){
        if(mysql_num_rows($res_dep) > 0){
            while ($row_dep = mysql_fetch_array($res_dep)) {
                $num_dep += 1;
                if($row_dep[0] <> ''){$total_porc_dep += 100;}
            }
        }
    }
    // Datos de las vulnerabilidades
    $res_vuln = registroCampo("rmb_vulnera v", "v.rmb_tvulnera_id, v.rmb_vulnera_obs", "WHERE v.rmb_aptos_id = '$id_apto'", "", "");
    if($res_vuln){
        if(mysql_num_rows($res_vuln) > 0){
            while ($row_vuln = mysql_fetch_array($res_vuln)) {
                $num_vuln += 1;
                if($row_vuln[0] <> ''){$total_porc_vuln += 50;}
                if($row_vuln[1] <> ''){$total_porc_vuln += 50;}
            }
        }
    }
}
if($total_porc_apto > 0){
    // Si el porcentaje de completado de la informacion del apartamento esta entre 0 a 49 % hace esto
    if($total_porc_apto < 50){$clase_apto = "btn-danger";}
    // Si el porcentaje de completado de la informacion del apartamento esta entre 50 a 74 % hace esto
    if(($total_porc_apto > 49) && ($total_porc_apto < 75)){$clase_apto = "btn-warning";}
    // Si el porcentaje de completado de la informacion del apartamento esta entre 75 a 99 % hace esto
    if(($total_porc_apto > 74) && ($total_porc_apto < 100)){$clase_apto = "btn-primary";}
    // Si el porcentaje de completado de la informacion del apartamento esta al 100 % hace esto
    if($total_porc_apto >= 100){$total_porc_apto = 100;$clase_apto = "";}
}
if($total_porc_prop > 0){
    if($num_prop > 0){
        $total_porc_prop = round($total_porc_prop / $num_prop);
    }
    // Si el porcentaje de completado de la informacion del propietario esta entre 0 a 49 % hace esto
    if($total_porc_prop < 50){$clase_prop = "btn-danger";}
    // Si el porcentaje de completado de la informacion del propietario esta entre 50 a 74 % hace esto
    if(($total_porc_prop > 49) && ($total_porc_prop < 75)){$clase_prop = "btn-warning";}
    // Si el porcentaje de completado de la informacion del propietario esta entre 75 a 99 % hace esto
    if(($total_porc_prop > 74) && ($total_porc_prop < 100)){$clase_prop = "btn-primary";}
    // Si el porcentaje de completado de la informacion del propietario esta al 100 % hace esto
    if($total_porc_prop >= 100){$total_porc_prop = 100;$clase_prop = "";}
}
if($total_porc_hab > 0){
    if($num_hab > 0){
        $total_porc_hab = round($total_porc_hab / $num_hab);
    }
    // Si el porcentaje de completado de la informacion del propietario esta entre 0 a 49 % hace esto
    if($total_porc_hab < 50){$clase_hab = "btn-danger";}
    // Si el porcentaje de completado de la informacion del propietario esta entre 50 a 74 % hace esto
    if(($total_porc_hab > 49) && ($total_porc_hab < 75)){$clase_hab = "btn-warning";}
    // Si el porcentaje de completado de la informacion del propietario esta entre 75 a 99 % hace esto
    if(($total_porc_hab > 74) && ($total_porc_hab < 100)){$clase_hab = "btn-primary";}
    // Si el porcentaje de completado de la informacion del propietario esta al 100 % hace esto
    if($total_porc_hab >= 100){$total_porc_hab = 100;$clase_hab = "";}
}
if($total_porc_arren > 0){
    if($num_arren > 0){
        $total_porc_arren = round($total_porc_arren / $num_arren);
    }
    // Si el porcentaje de completado de la informacion del propietario esta entre 0 a 49 % hace esto
    if($total_porc_arren < 50){$clase_arren = "btn-danger";}
    // Si el porcentaje de completado de la informacion del propietario esta entre 50 a 74 % hace esto
    if(($total_porc_arren > 49) && ($total_porc_arren < 75)){$clase_arren = "btn-warning";}
    // Si el porcentaje de completado de la informacion del propietario esta entre 75 a 99 % hace esto
    if(($total_porc_arren > 74) && ($total_porc_arren < 100)){$clase_arren = "btn-primary";}
    // Si el porcentaje de completado de la informacion del propietario esta al 100 % hace esto
    if($total_porc_arren >= 100){$total_porc_arren = 100;$clase_arren = "";}
}
if($total_porc_serv > 0){
    if($num_serv > 0){
        $total_porc_serv = round($total_porc_serv / $num_serv);
    }
    // Si el porcentaje de completado de la informacion del propietario esta entre 0 a 49 % hace esto
    if($total_porc_serv < 50){$clase_serv = "btn-danger";}
    // Si el porcentaje de completado de la informacion del propietario esta entre 50 a 74 % hace esto
    if(($total_porc_serv > 49) && ($total_porc_serv < 75)){$clase_serv = "btn-warning";}
    // Si el porcentaje de completado de la informacion del propietario esta entre 75 a 99 % hace esto
    if(($total_porc_serv > 74) && ($total_porc_serv < 100)){$clase_serv = "btn-primary";}
    // Si el porcentaje de completado de la informacion del propietario esta al 100 % hace esto
    if($total_porc_serv >= 100){$total_porc_serv = 100;$clase_serv = "";}
}
if($total_porc_aut > 0){
    if($num_aut > 0){
        $total_porc_aut = round($total_porc_aut / $num_aut);
    }
    // Si el porcentaje de completado de la informacion del propietario esta entre 0 a 49 % hace esto
    if($total_porc_aut < 50){$clase_aut = "btn-danger";}
    // Si el porcentaje de completado de la informacion del propietario esta entre 50 a 74 % hace esto
    if(($total_porc_aut > 49) && ($total_porc_aut < 75)){$clase_aut = "btn-warning";}
    // Si el porcentaje de completado de la informacion del propietario esta entre 75 a 99 % hace esto
    if(($total_porc_aut > 74) && ($total_porc_aut < 100)){$clase_aut = "btn-primary";}
    // Si el porcentaje de completado de la informacion del propietario esta al 100 % hace esto
    if($total_porc_aut >= 100){$total_porc_aut = 100;$clase_aut = "";}
}
if($total_porc_emer > 0){
    if($num_emer > 0){
        $total_porc_emer = round($total_porc_emer / $num_emer);
    }
    // Si el porcentaje de completado de la informacion del propietario esta entre 0 a 49 % hace esto
    if($total_porc_emer < 50){$clase_emer = "btn-danger";}
    // Si el porcentaje de completado de la informacion del propietario esta entre 50 a 74 % hace esto
    if(($total_porc_emer > 49) && ($total_porc_emer < 75)){$clase_emer = "btn-warning";}
    // Si el porcentaje de completado de la informacion del propietario esta entre 75 a 99 % hace esto
    if(($total_porc_emer > 74) && ($total_porc_emer < 100)){$clase_emer = "btn-primary";}
    // Si el porcentaje de completado de la informacion del propietario esta al 100 % hace esto
    if($total_porc_emer >= 100){$total_porc_emer = 100;$clase_emer = "";}
}
if($total_porc_veh > 0){
    if($num_veh > 0){
        $total_porc_veh = round($total_porc_veh / $num_veh);
    }
    // Si el porcentaje de completado de la informacion del propietario esta entre 0 a 49 % hace esto
    if($total_porc_veh < 50){$clase_veh = "btn-danger";}
    // Si el porcentaje de completado de la informacion del propietario esta entre 50 a 74 % hace esto
    if(($total_porc_veh > 49) && ($total_porc_veh < 75)){$clase_veh = "btn-warning";}
    // Si el porcentaje de completado de la informacion del propietario esta entre 75 a 99 % hace esto
    if(($total_porc_veh > 74) && ($total_porc_veh < 100)){$clase_veh = "btn-primary";}
    // Si el porcentaje de completado de la informacion del propietario esta al 100 % hace esto
    if($total_porc_veh >= 100){$clase_veh = "";}
}
if($total_porc_masc > 0){
    if($num_masc > 0){
        $total_porc_masc = round($total_porc_masc / $num_masc);
    }
    // Si el porcentaje de completado de la informacion del propietario esta entre 0 a 49 % hace esto
    if($total_porc_masc < 50){$clase_masc = "btn-danger";}
    // Si el porcentaje de completado de la informacion del propietario esta entre 50 a 74 % hace esto
    if(($total_porc_masc > 49) && ($total_porc_masc < 75)){$clase_masc = "btn-warning";}
    // Si el porcentaje de completado de la informacion del propietario esta entre 75 a 99 % hace esto
    if(($total_porc_masc > 74) && ($total_porc_masc < 100)){$clase_masc = "btn-primary";}
    // Si el porcentaje de completado de la informacion del propietario esta al 100 % hace esto
    if($total_porc_masc >= 100){$clase_masc = "";}
}
if($total_porc_inm > 0){
    if($num_inm > 0){
        $total_porc_inm = round($total_porc_inm / $num_inm);
    }
    // Si el porcentaje de completado de la informacion del propietario esta entre 0 a 49 % hace esto
    if($total_porc_inm < 50){$clase_inm = "btn-danger";}
    // Si el porcentaje de completado de la informacion del propietario esta entre 50 a 74 % hace esto
    if(($total_porc_inm > 49) && ($total_porc_inm < 75)){$clase_inm = "btn-warning";}
    // Si el porcentaje de completado de la informacion del propietario esta entre 75 a 99 % hace esto
    if(($total_porc_inm > 74) && ($total_porc_inm < 100)){$clase_inm = "btn-primary";}
    // Si el porcentaje de completado de la informacion del propietario esta al 100 % hace esto
    if($total_porc_inm >= 100){$clase_inm = "";}
}
if($total_porc_ban > 0){
    if($num_ban > 0){
        $total_porc_ban = round($total_porc_ban / $num_ban);
    }
    // Si el porcentaje de completado de la informacion del propietario esta entre 0 a 49 % hace esto
    if($total_porc_ban < 50){$clase_ban = "btn-danger";}
    // Si el porcentaje de completado de la informacion del propietario esta entre 50 a 74 % hace esto
    if(($total_porc_ban > 49) && ($total_porc_ban < 75)){$clase_ban = "btn-warning";}
    // Si el porcentaje de completado de la informacion del propietario esta entre 75 a 99 % hace esto
    if(($total_porc_ban > 74) && ($total_porc_ban < 100)){$clase_ban = "btn-primary";}
    // Si el porcentaje de completado de la informacion del propietario esta al 100 % hace esto
    if($total_porc_ban >= 100){$clase_ban = "";}
}
if($total_porc_parq > 0){
    if($num_parq > 0){
        $total_porc_parq = round($total_porc_parq / $num_parq);
    }
    // Si el porcentaje de completado de la informacion del propietario esta entre 0 a 49 % hace esto
    if($total_porc_parq < 50){$clase_parq = "btn-danger";}
    // Si el porcentaje de completado de la informacion del propietario esta entre 50 a 74 % hace esto
    if(($total_porc_parq > 49) && ($total_porc_parq < 75)){$clase_parq = "btn-warning";}
    // Si el porcentaje de completado de la informacion del propietario esta entre 75 a 99 % hace esto
    if(($total_porc_parq > 74) && ($total_porc_parq < 100)){$clase_parq = "btn-primary";}
    // Si el porcentaje de completado de la informacion del propietario esta al 100 % hace esto
    if($total_porc_parq >= 100){$clase_parq = "";}
}
if($total_porc_dep > 0){
    if($num_dep > 0){
        $total_porc_dep = round($total_porc_dep / $num_dep);
    }
    // Si el porcentaje de completado de la informacion del propietario esta entre 0 a 49 % hace esto
    if($total_porc_dep < 50){$clase_dep = "btn-danger";}
    // Si el porcentaje de completado de la informacion del propietario esta entre 50 a 74 % hace esto
    if(($total_porc_dep > 49) && ($total_porc_dep < 75)){$clase_dep = "btn-warning";}
    // Si el porcentaje de completado de la informacion del propietario esta entre 75 a 99 % hace esto
    if(($total_porc_dep > 74) && ($total_porc_dep < 100)){$clase_dep = "btn-primary";}
    // Si el porcentaje de completado de la informacion del propietario esta al 100 % hace esto
    if($total_porc_dep >= 100){$clase_dep = "";}
}
if($total_porc_vuln > 0){
    if($num_vuln > 0){
        $total_porc_vuln = round($total_porc_vuln / $num_vuln);
    }
    // Si el porcentaje de completado de la informacion del propietario esta entre 0 a 49 % hace esto
    if($total_porc_vuln < 50){$clase_vuln = "btn-danger";}
    // Si el porcentaje de completado de la informacion del propietario esta entre 50 a 74 % hace esto
    if(($total_porc_vuln > 49) && ($total_porc_vuln < 75)){$clase_vuln = "btn-warning";}
    // Si el porcentaje de completado de la informacion del propietario esta entre 75 a 99 % hace esto
    if(($total_porc_vuln > 74) && ($total_porc_vuln < 100)){$clase_vuln = "btn-primary";}
    // Si el porcentaje de completado de la informacion del propietario esta al 100 % hace esto
    if($total_porc_vuln >= 100){$clase_vuln = "";}
}
?>
<!-- Titulo de la pagina -->
<div id="titulo" class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <div class="col-xs-12 col-sm-10 col-md-10 col-lg-10 pull-left text-left titulo-pagina">
        <input id="id_apartamento" name="id_apartamento" type="hidden" value="<?php echo $id_apto;?>">
        <h3 class="text-left"><?php 
            if($id_apto <> ''){
                echo "Apartamento: ".nombreCampo($id_apto, "rmb_aptos")." Torre: ".$apto_torre;
            }
            else
            {
                echo "Nuevo Apartamento";
            }?>
        </h3>
    </div>
    <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2 pull-right text-right">
        <h3>
            <button type="button" class="btn btn-default form-control">Regresar</button>
        </h3>
    </div>
</div>
<dl class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <!-- Apartamento -->
    <a id="apartamentos" href="#titulo">
        <dt class="<?php echo $clase_apto;?>" id="apto">Apartamento 
            <img src="../css/plantilla1/img/residentes4.png" alt="Información del apartamento" title="Información del apartamento">
            <span class="pull-right" style="margin-right:15px;"><?php echo $total_porc_apto;?>%</span>
        </dt>
    </a>
    <dd></dd><?php 
    // Si el apartamento existe muestra esto
    if($id_apto && $apto_propio == '1'){?>
        <a id="propietarios" href="#apto">
            <dt class="<?php echo $clase_prop;?>" id="propietario">Propietario
                <img src="../css/plantilla1/img/residentes1.png" alt="Propietario del apartamento" title="Propietario del apartamento">
                <span class="pull-right" style="margin-right:15px;"><?php echo $total_porc_prop;?>%</span>
            </dt>
        </a>
        <dd></dd><?php 
    }
    // Si el apartamento existe y si marco inmobiliaria en la pestaña del apartamento
    if(($id_apto) && ($apto_inm == '1')){?>
        <a id="inmobiliarias" href="#propietario">
            <dt class="<?php echo $clase_inm;?>" id="inmobiliaria">Inmobiliaria
                <img src="../css/plantilla1/img/residentes3.png" alt="Datos de la inmobiliaria" title="Datos de la inmobiliaria">
                <span class="pull-right" style="margin-right:15px;"><?php echo $total_porc_inm;?>%</span>
            </dt>
        </a>
        <dd></dd><?php 
    }
    // Si el apartamento existe y si marco banco en la pestaña del apartamento
    if(($id_apto) && ($apto_banco == '1')){?>
        <!-- Datos basicos del Banco -->
        <a id="locatarios" href="#propietario">
            <dt class="<?php echo $clase_ban;?>" id="locatario">Locatario
                <img src="../css/plantilla1/img/residentes5.png" alt="Datos del locatario" title="Datos del locatario">
                <span class="pull-right" style="margin-right:15px;"><?php echo $total_porc_ban;?>%</span>
            </dt>
        </a>
        <dd></dd><?php 
    }
    // Si el apartamento existe y si marco que NO VIVE en la pestaña del propietario
    if(($id_apto) && ($apto_arrend == '1')){?>
        <a id="arrendatarios" href="#propietario">
            <dt class="<?php echo $clase_arren;?>" id="arrendatario">Arrendatario
                <img src="../css/plantilla1/img/residentes3.png" alt="Datos del arrendatario" title="Datos del arrendatario">
                <span class="pull-right" style="margin-right:15px;"><?php echo $total_porc_arren;?>%</span>
            </dt>
        </a>
        <dd></dd><?php 
    }?>
    <!-- Si el apartamento existe muestra esto -->
    <?php if($id_apto){?>
        <!-- Personal Servicio -->
        <a id="empleados" href="#vehiculo">
            <dt class="<?php echo $clase_serv;?>" id="empleado">Personal Servicio
                <img src="../css/plantilla1/img/residentes7.png" alt="Personal de servicio" title="Personal de servicio">
                <span class="pull-right" style="margin-right:15px;"><?php echo $total_porc_serv;?>%</span>
            </dt>
        </a>
        <dd></dd>
        <!-- Habitantes -->
        <a id="residentes" href="#propietario">
            <dt class="<?php echo $clase_hab;?>" id="residente">Habitantes
                <img src="../css/plantilla1/img/residentes14.png" alt="Datos de los habitantes" title="Datos de los habitantes">
                <span class="pull-right" style="margin-right:15px;"><?php echo $total_porc_hab;?>%</span>
            </dt>
        </a>
        <dd></dd><?php 
    }
    // Si el apartamento existe y si marco PARQUEADERO en la pestaña del apartamento
    if(($id_apto) && ($apto_parq == '1')){?>
        <a id="parqueaderos" href="#residente">
            <dt class="<?php echo $clase_parq;?>" id="parqueadero">Parqueaderos
                <img src="../css/plantilla1/img/residentes11.png" alt="Parqueaderos" title="Parqueaderos">
                <span class="pull-right" style="margin-right:15px;"><?php echo $total_porc_parq;?>%</span>
            </dt>
        </a>
        <dd></dd><?php 
    }
    // Si el apartamento existe y marco DEPOSITO en la pestaña del apartamento muestra esto
    if(($id_apto) && ($apto_dep == '1')){?>
        <a id="depositos" href="#residente">
            <dt class="<?php echo $clase_dep;?>" id="deposito">Depósitos
                <img src="../css/plantilla1/img/residentes12.png" alt="Depositos" title="Depositos">
                <span class="pull-right" style="margin-right:15px;"><?php echo $total_porc_dep;?>%</span>
            </dt>
        </a>
        <dd></dd><?php 
    }
    // Si el apartamento existe muestra esto
    if($id_apto){?>
        <!-- Vehículos -->
        <a id="vehiculos" href="#residente">
            <dt class="<?php echo $clase_veh;?>" id="vehiculo">Vehículos
                <img src="../css/plantilla1/img/residentes6.png" alt="Vehículos" title="Vehículos">
                <span class="pull-right" style="margin-right:15px;"><?php echo $total_porc_veh;?>%</span>
            </dt>
        </a>
        <dd></dd><?php 
        if($apto_masc == 1){?>
        <!-- Mascotas -->
        <a id="mascotas" href="#empleado">
            <dt class="<?php echo $clase_masc;?>" id="mascota">Mascotas
                <img src="../css/plantilla1/img/residentes8.png" alt="Mascotas" title="Mascotas">
                <span class="pull-right" style="margin-right:15px;"><?php echo $total_porc_masc;?>%</span>
            </dt>
        </a>
        <dd></dd><?php 
        }?>
        <!-- Personas Autorizadas -->
        <a id="autorizadas" href="#mascota">
            <dt class="<?php echo $clase_aut;?>" id="autorizada">Personas Autorizadas
                <img src="../css/plantilla1/img/residentes9.png" alt="Personas autorizadas" title="Personas autorizadas">
                <span class="pull-right" style="margin-right:15px;"><?php echo $total_porc_aut;?>%</span>
            </dt>
        </a>
        <dd></dd>
        <!-- En caso emergencia -->
        <a id="emergencias" href="#autorizada">
            <dt class="<?php echo $clase_emer;?>" id="emergencia">En caso emergencia
                <img src="../css/plantilla1/img/residentes10.png" alt="Emergencia" title="Emergencia">
                <span class="pull-right" style="margin-right:15px;"><?php echo $total_porc_emer;?>%</span>
            </dt>
        </a>
        <dd></dd><?php 
    }
    // Si el apartamento existe y marco VULNERABILIDADES en la pestaña del apartamento muestra esto
    if(($id_apto) && ($apto_vul == '1')){?>
        <a id="vulnerabilidades" href="#residente">
            <dt class="<?php echo $clase_vuln;?>" id="vulnerabilidad">Vulnerabilidades
                <img src="../css/plantilla1/img/residentes13.png" alt="Vulnerabilidades" title="Vulnerabilidades">
                <span class="pull-right" style="margin-right:15px;"><?php echo $total_porc_vuln;?>%</span>
            </dt>
        </a>
        <dd></dd><?php 
    }?>
</dl>
<script>
    $(document).ready(function() {
        camposDinamicos();
    });
</script>