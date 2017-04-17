<?php
session_start();
require_once ("../conexion/conexion.php");
require_once ("../php/funciones.php");
//////////////////////////////////////////////////////////////////////////////////////
// Aplicación PHP usando Bootstrap, jquery, HTML5 y CSS - PH                        //
// Copyright 2014 Wilson Giovanny Velandia Barreto 3204274564 - willyv78@gmail.com  //
//////////////////////////////////////////////////////////////////////////////////////

$id_eva = "";
$disabled = "";
$res_cate_eva = false;
if(isset($_GET['id_eva'])){
    $id_eva = $_GET['id_eva'];
    // consulta de categorias
    $res_eva = registroCampo("rmb_eva e", "e.rmb_eva_nom", "WHERE e.rmb_eva_id = $id_eva", "", "ORDER BY e.rmb_eva_nom ASC");
}
?>
<div class="panel-body">
    <table class="table table-hover" style="font-size: .8rem !important;border-collapse:separate;border-color: #ddd;" border="1" cellpadding="1" cellspacing="1"><?php 
    if($res_eva){
        if(mysql_num_rows($res_eva) > 0){
            $sq = 1;
            $row_eva = mysql_fetch_array($res_eva);?>
            <thead>
                <tr style="font-weight: bold; font-size: 1.2rem;">
                    <td colspan="16"><?php echo $row_eva[0];?></td>
                </tr>
                <tr style="font-weight: bold;">
                    <td width="3%">No.</td>
                    <td width="6%">PESO % EVALUACION</td>
                    <td width="6%">PUNTAJE</td>
                    <td width="7%">PUNTAJE CALIFICACIÓN</td>
                    <td width="8%">CALIFICACIÓN CONSEJERO 1 A 5</td>
                    <td width="40%">TEMA A CALIFICAR</td>
                    <td width="3%">1</td>
                    <td width="3%">2</td>
                    <td width="3%">3</td>
                    <td width="3%">4</td>
                    <td width="3%">5</td>
                    <td width="3%">6</td>
                    <td width="3%">7</td>
                    <td width="3%">8</td>
                    <td width="3%">9</td>
                    <td width="3%">10</td>
                </tr>
            </thead>
            <tbody><?php 
            $res_cate_eva = registroCampo("rmb_eva_cate_x_eva ce", "ce.rmb_eva_cate_x_eva_id, ce.rmb_eva_cate_x_eva_peso, ce.rmb_eva_cate_x_eva_punt, c.rmb_eva_cate_nom, ce.rmb_eva_cate_id", "LEFT JOIN rmb_eva_cate c USING(rmb_eva_cate_id) WHERE ce.rmb_eva_id = '$id_eva'", "", "ORDER BY c.rmb_eva_cate_nom");
            if($res_cate_eva){
                if(mysql_num_rows($res_cate_eva) > 0){
                    while($row_cate_eva = mysql_fetch_array($res_cate_eva)){?>
                        <tr style="background-color: #dbdbdb;font-weight: bold;">
                            <td><?php echo $sq;?></td>
                            <td><?php echo $row_cate_eva[1];?></td>
                            <td><?php echo $row_cate_eva[2];?></td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td><?php echo $row_cate_eva[3];?></td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr><?php 
                        $res_tema_eva = false;
                        $res_tema_eva = registroCampo("rmb_eva_tema_x_cate tc", "tc.rmb_eva_tema_id, t.rmb_eva_tema_nom", "LEFT JOIN rmb_eva_tema t USING(rmb_eva_tema_id) WHERE rmb_eva_cate_id = ".$row_cate_eva[4]." AND rmb_eva_id = $id_eva", "", "ORDER BY t.rmb_eva_tema_nom ASC");
                        if($res_tema_eva){
                            if(mysql_num_rows($res_tema_eva) > 0){?>
                                <tr><td colspan="4" rowspan="<?php echo mysql_num_rows($res_tema_eva) + 1;?>">&nbsp;</td></tr><?php 
                                while($row_tema_eva = mysql_fetch_array($res_tema_eva)){?>
                                    <tr style="font-size: .6rem !important;">
                                        <td><?php echo $row_tema_eva[0];?></td>
                                        <td><?php echo $row_tema_eva[1];?></td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                    </tr><?php 
                                }
                            }
                            else{?>
                                <tr><td colspan="16">No hay temas para calificar</td></tr><?php 
                            }
                        }
                        else{?>
                            <tr><td colspan="16">No hay temas para calificar</td></tr><?php 
                        }
                        $sq++;?>
                        <tr><td colspan="16">&nbsp;</td></tr><?php 
                    }
                }
            }?>
            </tbody>
            <tfooter>
                <tr>
                    <td>TOTAL</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
            </tfooter><?php 
        }
        else{?>
            <tbody>
                <tr>
                    <td>No se encontraron registros</td>
                </tr>
            </tbody><?php 
        }
    }
    else{?>
        <tbody>
            <tr>
                <td>No se encontraron registros</td>
            </tr>
        </tbody><?php 
    }?>
    </table>
</div>
<script>accionListaCateEva();</script>