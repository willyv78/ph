

<?php session_start();
require_once ("../conexion/conexion.php");
require_once ("../php/funciones.php");
//////////////////////////////////////////////////////////////////////////////////////
// Aplicación PHP usando Bootstrap, jquery, HTML5 y CSS - PH                        //
// Copyright 2014 Wilson Giovanny Velandia Barreto 3204274564 - willyv78@gmail.com  //
//////////////////////////////////////////////////////////////////////////////////////
$res_val = Propietarios("rmb_residente_nom", "ASC");
?>

<!-- Pagina primera pestaña (maestros) -->
<!-- Titulo de la pagina -->
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
   <input type="hidden" value="rmb_residente">
   <h3 class="text-left">Estado Financiero Residentes</h3>
</div>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <div class="alert alert-danger text-left">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <strong>Atención!</strong>
          <p>En esta pestaña encontrará la lista de los residentes registrados en la aplicación y a los cuales podrá ingrsar su estado financiero por mes y consultar su historial en el tiempo.</p>
          <footer>Si no esta seguro de los cambios a realizar o si el cambio afectará el funcionamiento de la aplicación, comuniquese con el desarrollador de la aplicación al correo <cite title="Source Title">info@rmasb.com</cite> o al teléfono <cite title="Source Title">7569919</cite></footer>
          
    </div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><?php 
    if ($res_val) {
        if (mysql_num_rows($res_val) > 0) {?>
            <div class="table-responsive">
                <table class="table table-hover" id="tabla">
                    <tfoot style="display: table-header-group;">
                        <tr>
                            <th></th>
                            <th class="hidden-xs"></th>
                            <th class="hidden-xs hidden-sm"></th>
                            <th class="hidden-xs hidden-sm"></th>
                        </tr>
                    </tfoot>
                    <thead>
                        <tr style="background-color:#546E7A;border:1px #C0C0C0 solid;text-align:center;vertical-align:middle;height:30px;color: white">
                            <th style="background-color:#546E7A;border:1px #C0C0C0 solid;text-align:center;vertical-align:middle;height:30px;">Fact.</th>
                            <th class="hidden-xs" style="background-color:#546E7A;border:1px #C0C0C0 solid;text-align:center;vertical-align:middle;height:30px;">Mes / Año</th>
                            <th class="hidden-xs hidden-sm" style="background-color:#546E7A;border:1px #C0C0C0 solid;text-align:center;vertical-align:middle;height:30px;">Total</th>
                            <th class="hidden-xs hidden-sm" style="background-color:#546E7A;border:1px #C0C0C0 solid;text-align:center;vertical-align:middle;height:30px;">Estado</th>
                            <th style="background-color:#546E7A;border:1px #C0C0C0 solid;text-align:center;vertical-align:middle;height:30px;"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Mayo -->
                        <tr style="background-color: #FFFE8F;">
                            <td style="background-color:transparent;border:1px #C0C0C0 solid;text-align:center;vertical-align:middle;height:25px;">
                                <div>
                                   <span style="color:#000000;font-family:Arial;font-size:13px;">0502</span>
                                </div>
                            </td>
                            <td class="hidden-xs" style="background-color:transparent;border:1px #C0C0C0 solid;text-align:center;vertical-align:middle;height:25px;">
                                <div>
                                   <span style="color:#000000;font-family:Arial;font-size:13px;">Mayo / 2015</span>
                                </div>
                            </td>
                            <td class="hidden-xs hidden-sm" style="background-color:transparent;border:1px #C0C0C0 solid;text-align:center;vertical-align:middle;height:25px;">
                                <div>
                                   <span style="color:#000000;font-family:Arial;font-size:13px;">$ -70.000</span>
                                </div>
                            </td>
                            <td class="hidden-xs hidden-sm" style="background-color:transparent;border:1px #C0C0C0 solid;text-align:center;vertical-align:middle;height:25px;">
                                <div>
                                    <span style="color:#000000;font-family:Arial;font-size:13px;">Mora 1 mes</span>
                                </div>
                            </td>
                            <td id="lista_historial_facturas" class="lista_historial_facturas" name="" style="background-color:transparent; border:1px #C0C0C0 solid; text-align:center; vertical-align:middle; height:25px; color:#32CD32; font-family:Arial; font-size:13px; cursor:pointer;">
                                <button type="button" class="btn btn-info"><i class="glyphicon glyphicon-eye-open"></i></button>
                            </td>
                        </tr>
                        <!-- Abril -->
                        <tr style="background-color: #FFCB8F;">
                            <td style="background-color:transparent;border:1px #C0C0C0 solid;text-align:center;vertical-align:middle;height:25px;">
                                <div>
                                   <span style="color:#000000;font-family:Arial;font-size:13px;">0405</span>
                                </div>
                            </td>
                            <td class="hidden-xs" style="background-color:transparent;border:1px #C0C0C0 solid;text-align:center;vertical-align:middle;height:25px;">
                                <div>
                                   <span style="color:#000000;font-family:Arial;font-size:13px;">Abril / 2015</span>
                                </div>
                            </td>
                            <td class="hidden-xs hidden-sm" style="background-color:transparent;border:1px #C0C0C0 solid;text-align:center;vertical-align:middle;height:25px;">
                                <div>
                                   <span style="color:#000000;font-family:Arial;font-size:13px;">$ -80.000</span>
                                </div>
                            </td>
                            <td class="hidden-xs hidden-sm" style="background-color:transparent;border:1px #C0C0C0 solid;text-align:center;vertical-align:middle;height:25px;">
                                <div>
                                    <span style="color:#000000;font-family:Arial;font-size:13px;">Mora 2 meses</span>
                                </div>
                            </td>
                            <td id="lista_historial_facturas" class="lista_historial_facturas" name="" style="background-color:transparent; border:1px #C0C0C0 solid; text-align:center; vertical-align:middle; height:25px; color:#32CD32; font-family:Arial; font-size:13px; cursor:pointer;">
                                <button type="button" class="btn btn-info"><i class="glyphicon glyphicon-eye-open"></i></button>
                            </td>
                        </tr>
                        <!-- marzo -->
                        <tr style="background-color: #DEFFE0;">
                            <td style="background-color:transparent;border:1px #C0C0C0 solid;text-align:center;vertical-align:middle;height:25px;">
                                <div>
                                   <span style="color:#000000;font-family:Arial;font-size:13px;">0201</span>
                                </div>
                            </td>
                            <td class="hidden-xs" style="background-color:transparent;border:1px #C0C0C0 solid;text-align:center;vertical-align:middle;height:25px;">
                                <div>
                                   <span style="color:#000000;font-family:Arial;font-size:13px;">Marzo / 2015</span>
                                </div>
                            </td>
                            <td class="hidden-xs hidden-sm" style="background-color:transparent;border:1px #C0C0C0 solid;text-align:center;vertical-align:middle;height:25px;">
                                <div>
                                   <span style="color:#000000;font-family:Arial;font-size:13px;">$  70.000</span>
                                </div>
                            </td>
                            <td class="hidden-xs hidden-sm" style="background-color:transparent;border:1px #C0C0C0 solid;text-align:center;vertical-align:middle;height:25px;">
                                <div>
                                    <span style="color:#000000;font-family:Arial;font-size:13px;">Al dia</span>
                                </div>
                            </td>
                            <td id="lista_historial_facturas" class="lista_historial_facturas" name="" style="background-color:transparent; border:1px #C0C0C0 solid; text-align:center; vertical-align:middle; height:25px; color:#32CD32; font-family:Arial; font-size:13px; cursor:pointer;">
                                <button type="button" class="btn btn-info"><i class="glyphicon glyphicon-eye-open"></i></button>
                            </td>
                        </tr>
                        <!-- febrero -->
                        <tr style="background-color: #FE7E82;">
                            <td style="background-color:transparent;border:1px #C0C0C0 solid;text-align:center;vertical-align:middle;height:25px;">
                                <div>
                                   <span style="color:#000000;font-family:Arial;font-size:13px;">0103</span>
                                </div>
                            </td>
                            <td class="hidden-xs" style="background-color:transparent;border:1px #C0C0C0 solid;text-align:center;vertical-align:middle;height:25px;">
                                <div>
                                   <span style="color:#000000;font-family:Arial;font-size:13px;">Febrero / 2015</span>
                                </div>
                            </td>
                            <td class="hidden-xs hidden-sm" style="background-color:transparent;border:1px #C0C0C0 solid;text-align:center;vertical-align:middle;height:25px;">
                                <div>
                                   <span style="color:#000000;font-family:Arial;font-size:13px;">$ -10.000</span>
                                </div>
                            </td>
                            <td class="hidden-xs hidden-sm" style="background-color:transparent;border:1px #C0C0C0 solid;text-align:center;vertical-align:middle;height:25px;">
                                <div>
                                    <span style="color:#000000;font-family:Arial;font-size:13px;">Mora 3 meses +</span>
                                </div>
                            </td>
                            <td id="lista_historial_facturas" class="lista_historial_facturas" name="" style="background-color:transparent; border:1px #C0C0C0 solid; text-align:center; vertical-align:middle; height:25px; color:#32CD32; font-family:Arial; font-size:13px; cursor:pointer;">
                                <button type="button" class="btn btn-info"><i class="glyphicon glyphicon-eye-open"></i></button>
                            </td>
                        </tr>
                        <!-- enero -->
                        <tr style="background-color: #FFFE8F;">
                            <td style="background-color:transparent;border:1px #C0C0C0 solid;text-align:center;vertical-align:middle;height:25px;">
                                <div>
                                   <span style="color:#000000;font-family:Arial;font-size:13px;">0004</span>
                                </div>
                            </td>
                            <td class="hidden-xs" style="background-color:transparent;border:1px #C0C0C0 solid;text-align:center;vertical-align:middle;height:25px;">
                                <div>
                                   <span style="color:#000000;font-family:Arial;font-size:13px;">Enero / 2015</span>
                                </div>
                            </td>
                            <td class="hidden-xs hidden-sm" style="background-color:transparent;border:1px #C0C0C0 solid;text-align:center;vertical-align:middle;height:25px;">
                                <div>
                                   <span style="color:#000000;font-family:Arial;font-size:13px;">$ -20.000</span>
                                </div>
                            </td>
                            <td class="hidden-xs hidden-sm" style="background-color:transparent;border:1px #C0C0C0 solid;text-align:center;vertical-align:middle;height:25px;">
                                <div>
                                    <span style="color:#000000;font-family:Arial;font-size:13px;">Mora 1 mes</span>
                                </div>
                            </td>
                            <td id="lista_historial_facturas" class="lista_historial_facturas" name="" style="background-color:transparent; border:1px #C0C0C0 solid; text-align:center; vertical-align:middle; height:25px; color:#32CD32; font-family:Arial; font-size:13px; cursor:pointer;">
                                <button type="button" class="btn btn-info"><i class="glyphicon glyphicon-eye-open"></i></button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div><?php 
        }
        else {?>
            <div class="alert alert-danger text-left">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <strong>Atención!</strong>No se encontraron registros                  
            </div><?php 
        }
    }
    else {?>
        <div class="alert alert-danger text-left">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <strong>Atención!</strong>Error en la consulta                 
        </div><?php 
    }?>
</div>
<script>
    $(document).ready(function() {
        accionEstFinanciero();
    });
</script>
<!-- FIN Pagina primera pestaña -->