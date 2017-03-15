<?php
session_start();
require_once ("../conexion/conexion.php");
require_once ("../php/funciones.php");
//////////////////////////////////////////////////////////////////////////////////////
// Aplicación PHP usando Bootstrap, jquery, HTML5 y CSS - PH                        //
// Copyright 2014 Wilson Giovanny Velandia Barreto 3204274564 - willyv78@gmail.com  //
//////////////////////////////////////////////////////////////////////////////////////
    
$res_tareas = registroCampo("rmb_calendario c", "c.rmb_calendario_id, c.rmb_calendario_nom, c.rmb_calendario_fini, c.rmb_est_id", "WHERE c.rmb_tcal_id = 4", "", "ORDER BY c.rmb_calendario_fini DESC");
?>
<!-- Titulo de la pagina -->
<!-- <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 titulo-pagina">
   <input type="hidden" value="rmb_residente">
   <h3 class="text-left">Tareas</h3>
</div> -->
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><?php 
    if($res_tareas){?>
      <div class="table-responsive">
        <table class="table table-hover" id="tabla">
          <tfoot style="display: table-header-group;">
              <tr>
                  <th class="hidden-xs hidden-sm"></th>
                  <th></th>
                  <th class="hidden-xs"></th>
              </tr>
          </tfoot>
          <thead>
              <tr>
                  <th class='hidden-xs hidden-sm col-md-2 col-lg-2 text-center'>Fecha</th>
                  <th class='col-xs-7 col-sm-4 col-md-3 col-lg-6 text-center'>Título</th>
                  <th class='hidden-xs col-sm-4 col-md-3 col-lg-2 text-center'>Estado</th>
                  <th class='col-xs-5 col-sm-4 col-md-4 col-lg-2 text-center'>
                      <input id="tipo_nom" name="tipo_nom" type="hidden" value="col-md-12">
                      <span class="col-xs-12 col-sm-12 col-md-12 col-lg-12 btn btn-warning" title="Nuevo registro"><i class="glyphicon glyphicon-plus"></i></span>
                  </th>
              </tr>
          </thead>
          <tbody><?php 
          if(mysql_num_rows($res_tareas) > 0){
            while ($row_tareas = mysql_fetch_array($res_tareas)) {?>
              <tr>
                <td class='hidden-xs hidden-sm col-md-2 col-lg-2 text-center'><?php echo $row_tareas[2];?></td>
                <td class='col-xs-7 col-sm-4 col-md-3 col-lg-6 text-center'><?php echo $row_tareas[1];?></td><?php 
                if($row_tareas[3] == 15){$clase = "bgreen";}
                else{$clase = "bred";}?>
                <td class='hidden-xs col-sm-4 col-md-3 col-lg-2 text-center <?php echo $clase;?>'><?php echo nombreCampo($row_tareas[3], "rmb_est");?></td>
                <td class='col-xs-5 col-sm-4 col-md-4 col-lg-2 text-center <?php echo $clase;?>'>
                  <div name="<?php echo $row_tareas[0];?>" class="input-group input-group-md btn_est">
                    <span class="btn btn-info input-group-addon" title="Ver Información"><i class="glyphicon glyphicon-eye-open"></i></span>
                    <span class="btn btn-success input-group-addon" title="Editar Información"> <i class="glyphicon glyphicon-pencil"></i></span>
                    <span class="btn btn-danger input-group-addon" name="perm" title="Eliminar"> <i class="glyphicon glyphicon-remove"></i></span>
                  </div>
                </td>
              </tr><?php 
            }
          }
          else{?>
            <tr>
              <td colspan="4">No se encontraron resultados</td>
            </tr><?php 
          }?>
          </tbody>
        </table>
      </div><?php 
    }
    else {?>
      <div class="alert alert-danger text-left">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <strong>Atención!</strong>Error en la consulta                 
      </div><?php 
    }?>
</div>
<script src="../js/jquery.min.js"></script>
<!-- Librerias para crear las tablas con filtro y paginado -->
<script src="../libraries/dataTables/media/js/jquery.js"></script>
<script src="../libraries/dataTables/media/js/jquery.dataTables.js"></script>
<script src="../libraries/dataTables/media/js/jquery.dataTables.min.js"></script>
<script src="../libraries/dataTables/media/js/jquery.jeditable.js"></script>
<script src="../libraries/dataTables/extras/TableTools/media/js/TableTools.js"></script>
<script src="../libraries/dataTables/extras/TableTools/media/js/TableTools.min.js"></script>
<script src="../libraries/dataTables/extras/TableTools/media/js/ZeroClipboard.js"></script>
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
      accionListaTareas();
    });
</script>
