<?php session_start();
require_once ("../conexion/conexion.php");
require_once ("../php/funciones.php");
//////////////////////////////////////////////////////////////////////////////////////
// Aplicación PHP usando Bootstrap, jquery, HTML5 y CSS - PH                        //
// Copyright 2014 Wilson Giovanny Velandia Barreto 3204274564 - willyv78@gmail.com  //
//////////////////////////////////////////////////////////////////////////////////////
$res_val = registroCampo("rmb_aptos a", "a.rmb_aptos_id, t.rmb_torres_nom, a.rmb_aptos_nom, r.rmb_residente_nom, r.rmb_residente_ape, rxa.rmb_tres_id, tes.rmb_est_id", "LEFT JOIN rmb_residente_x_aptos rxa USING(rmb_aptos_id) LEFT JOIN rmb_residente r USING(rmb_residente_id) LEFT JOIN rmb_tesoreria tes USING(rmb_aptos_id) LEFT JOIN rmb_torres t USING(rmb_torres_id)", "GROUP BY a.rmb_aptos_id", "ORDER BY a.rmb_torres_id ASC, a.rmb_aptos_nom ASC");
?>

<!-- Pagina primera pestaña (maestros) -->
<!-- Titulo de la pagina -->
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 titulo-pagina">
   <input type="hidden" value="rmb_residente">
   <h3 class="text-left">Lista de Apartamentos</h3>
</div>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <div class="alert alert-danger text-left">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <strong>Atención!</strong>
          <p>En esta pestaña encontrará la lista de los residentes registrados en la aplicación y a los cuales podrá ingresar su estado financiero por mes y consultar su historial en el tiempo.</p>
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
                            <th></th>
                            <th class="hidden-xs"></th>
                            <th class="hidden-xs hidden-sm"></th>
                            <th class="hidden-xs hidden-sm"></th>
                        </tr>
                    </tfoot>
                    <thead>
                        <tr>
                            <th class="col-xs-3 col-sm-2 col-md-1 col-lg-1">Torre</th>
                            <th class="col-xs-2 col-sm-2 col-md-1 col-lg-1">Apto</th>
                            <th class="hidden-xs col-sm-4 col-md-2 col-lg-2">Residente</th>
                            <th class="hidden-xs hidden-sm col-md-2 col-lg-2">Tipo</th>
                            <th class="hidden-xs hidden-sm col-md-2 col-lg-2">Estado</th>
                            <th class="col-xs-7 col-sm-4 col-md-3 col-lg-2">
                              <span class="col-xs-12 col-sm-12 col-md-12 col-lg-12 btn btn-warning" title="Nuevo registro"><i class="glyphicon glyphicon-plus"></i></span>
                            </th>
                        </tr>
                    </thead>
                    <tbody><?php 
                        while($row_val = mysql_fetch_array($res_val)){?>
                            <tr>
                                <td><?php echo $row_val[1];?></td>
                                <td><?php echo $row_val[2];?></td>
                                <td class="hidden-xs"><?php echo $row_val[3]." ".$row_val[4];?></td>
                                <td class="hidden-xs hidden-sm"><?php echo nombreCampo($row_val[5], "rmb_tres");?></td>
                                <td class="hidden-xs hidden-sm" style="background-color: #DEFFE0;"><?php echo nombreCampo($row_val[6], "rmb_est");?></td>
                                <td id="lista_historial_facturas" class="lista_historial_facturas" name="<?php echo $row_val[0];?>">
                                    <a class="col-xs-4 col-sm-4 col-md-4 col-lg-4" href="#detalle-del-apartamento.html">
                                      <button type="button" class="btn btn-info" title="Datos del Apartamento">
                                          <img src="../images/iconos/home1.png" alt="">
                                      </button>
                                    </a>
                                    <a class="col-xs-4 col-sm-4 col-md-4 col-lg-4" href="#estado-financiero.html">
                                      <button type="button" class="btn btn-success" title="Estado Financiero">
                                          <img src="../images/iconos/home2.png" alt="">
                                      </button>
                                    </a>
                                    <a class="col-xs-4 col-sm-4 col-md-4 col-lg-4" href="#contactar-al-administrador.html">
                                      <button type="button" class="btn btn-warning disabled" title="Enviar mensaje">
                                          <img src="../images/iconos/home3.png" alt="">
                                      </button>
                                    </a>
                                </td>
                            </tr><?php 
                        }?>
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
    jQuery(document).ready(function($){
      // funcion que se ejecuta al crear una tabla
      function crearTabla (selector) {
          var table = $('#' + selector).dataTable({
            "oLanguage": {
                "sLengthMenu": "Mostrar _MENU_ resultados por página",
                "sZeroRecords": "No se encontraron resultados",
                "sInfo": "Mostrando del _START_ al _END_ de _TOTAL_ resultados",
                "sInfoEmpty": "Mostrando del 0 al 0 de 0 resultados",
                "sInfoFiltered": "(Filtrado _MAX_ de los resultados totales)",
                "sSearch": "Buscar: ",
                "oPaginate": {
                    "sPrevious": "Anterior",
                    "sNext": "Siguiente",
                    "sFirst": "Inicio",
                    "sLast": "Fin"
                }

            },
            "sDom": 'T<"clear">lfrtip',
            "oTableTools": {
                "aButtons": [
                    {
                        "sExtends": "copy",
                        "sButtonText": "Copiar"
                    },
                    {
                        "sExtends": "print",
                        "sButtonText": "Imprimir"
                    },
                    {
                        "sExtends": "collection",
                        "sButtonText": "Exportar",
                        "aButtons": [
                            "csv",
                            {
                                "sExtends": "xls",
                                "sFileName": "*.xls"
                            },
                            {
                                "sExtends": "pdf",
                                "sPdfOrientation": "landscape"
                            }
                        ]
                    }
                ]
            },
            "bJQueryUI": false,
            "sPaginationType": "full_numbers",
            "aaSorting": []
          });
          $('#result').slideDown(1000);

          $("#tabla tbody tr").click(function(e) {
              if ($(this).hasClass('row_selected')) {
                  $(this).removeClass('row_selected');
              }
              else {
                  table.$('tr.row_selected').removeClass('row_selected');
                  $(this).addClass('row_selected');
              }
          });

          /*ini para los filtros individuales*/
          $('#tabla tfoot th').each(function() {
              var title = $('#tabla thead th').eq($(this).index()).text();
              $(this).html('<input type="text" placeholder="' + title + '" />');
          });
          $("tfoot input").keyup(function() {
              /* Filter on the column (the index) of this element */
              table.fnFilter(this.value, $("tfoot input").index(this));
          });
          var asInitVals = [];
          $("tfoot input").each(function(i) {
              asInitVals[i] = this.value;
          });

          $("tfoot input").focus(function() {
              if (this.className == "search_init")
              {
                  this.className = "";
                  this.value = "";
              }
          });
          $("tfoot input").blur(function(i) {
              if (this.value == "")
              {
                  this.className = "search_init";
                  this.value = asInitVals[$("tfoot input").index(this)];
              }
          });
          /*fin filtros individuales*/
          function fnGetSelected(oTableLocal) {
              return oTableLocal.$('tr.row_selected');
          }
      }
      crearTabla("tabla");
      accionEstFinanciero();
    });
</script>
<!-- FIN Pagina primera pestaña -->