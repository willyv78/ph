<?php session_start();
require_once ("../conexion/conexion.php");
require_once ("../php/funciones.php");
//////////////////////////////////////////////////////////////////////////////////////
// Aplicación PHP usando Bootstrap, jquery, HTML5 y CSS - PH                        //
// Copyright 2014 Wilson Giovanny Velandia Barreto 3204274564 - willyv78@gmail.com  //
//////////////////////////////////////////////////////////////////////////////////////

$res_val = registroCampo("rmb_eva_tema c", "c.rmb_eva_tema_id, c.rmb_eva_tema_nom", "", "", "ORDER BY c.rmb_eva_tema_nom ASC");
?>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
  <div class="table-responsive">
    <table class="table cell-border" id="tabla">
      <tfoot style="display: table-header-group;">
        <tr>
          <th></th>
        </tr>
      </tfoot>
      <thead>
        <tr>
          <th class="col-xs-8 col-sm-8 col-md-8 col-lg-8">Nombre</th>
          <th class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
            <span class="col-xs-12 col-sm-12 col-md-12 col-lg-12 btn btn-warning btn-accion" title="Nuevo registro"><i class="glyphicon glyphicon-plus"></i></span>
          </th>
        </tr>
      </thead>
      <tbody><?php 
      if ($res_val) {
        if (mysql_num_rows($res_val) > 0) {
          while($row_val = mysql_fetch_array($res_val)){?>
            <tr>
              <td class="text-nowrap vertical-middle"><?php echo $row_val[1];?></td>
              <td id="lista_tema" class="vertical-middle" name="<?php echo $row_val[0];?>">
                <button type="button" class="btn btn-default btn-accion" title="Consultar información" alt="Consultar información" style="padding: 5px 10px;">
                  <i class="glyphicon glyphicon-eye-open"></i>
                </button>

                <button type="button" class="btn btn-default btn-accion" title="Editar Información" alt="Editar Información" style="padding: 5px 10px;">
                  <i class="glyphicon glyphicon-pencil"></i>
                </button>

                <button type="button" class="btn btn-default btn-accion" title="Borrar registro" alt="Borrar registro" style="padding: 5px 10px;">
                  <i class="glyphicon glyphicon-remove"></i>
                </button>
                </a>
              </td>
            </tr><?php 
          }
        }
      }?>
      </tbody>
    </table>
  </div>
</div>
<script>
  jQuery(document).ready(function($){
    // funcion que se ejecuta al crear una tabla
    function crearTabla (selector) {
      var table = $('#' + selector).dataTable({
        "oLanguage": {
          "sZeroRecords": "No se encontraron registros",
          "sInfoEmpty": "No se encontraron registros",
          "sEmptyTable": "No se encontraron registros"
        },
        "sDom": 't',
        "bJQueryUI": true,
        "bAutoWidth": false,
        "iDisplayLength": 5000
        // "bScrollInfinite": true,
        // "bScrollCollapse": false,
        // "sScrollY": "645px"
      });
      $("#tabla tbody tr").click(function(e) {
        if ($(this).hasClass('row_selected')) {
          $(this).removeClass('row_selected');
        }
        else {
          table.$('tr.row_selected').removeClass('row_selected');
          $(this).addClass('row_selected');
        }
      });
      var num_th = $('#tabla tfoot th').length;

      /*ini para los filtros individuales*/

      setTimeout(function(){
        $('#tabla tfoot th').each(function() {
          var title = $('#tabla thead th').eq($(this).index()).text();
          $(this).html('<input class="form-control" type="text" placeholder=" Busqueda por ' + title + ' del tema" />');
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
      }, 200);

      /*fin filtros individuales*/

      function fnGetSelected(oTableLocal) {
        return oTableLocal.$('tr.row_selected');
      }
    }
    setTimeout(function(){crearTabla("tabla");}, 200)
    cargaListaTemas();
  });
</script>
<!-- FIN Pagina primera pestaña -->