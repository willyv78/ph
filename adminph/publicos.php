<?php session_start();
require_once ("../conexion/conexion.php");
require_once ("../php/funciones.php");
//////////////////////////////////////////////////////////////////////////////////////
// Aplicación PHP usando Bootstrap, jquery, HTML5 y CSS - PH                        //
// Copyright 2014 Wilson Giovanny Velandia Barreto 3204274564 - willyv78@gmail.com  //
//////////////////////////////////////////////////////////////////////////////////////

$res_val = registroCampo("rmb_servicios s", "s.rmb_servicios_id, st.rmb_serviciostipo_nom, s.rmb_servicios_fini, s.rmb_servicios_ffin, s.rmb_servicios_consumo, s.rmb_servicios_valor, s.rmb_servicios_fpag, s.rmb_servicios_fult", "LEFT JOIN rmb_serviciostipo st USING(rmb_serviciostipo_id)", "", "ORDER BY s.rmb_servicios_id DESC");
?>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
  <div class="table-responsive">
    <table class="table cell-border" id="tabla">
      <tfoot style="display: table-header-group;">
        <tr>
          <th></th>
          <th></th>
          <th class="hidden-xs"></th>
          <th class="hidden-xs hidden-sm"></th>
          <th class="hidden-xs hidden-sm hidden-md"></th>
          <th class="hidden-xs hidden-sm hidden-md"></th>
        </tr>
      </tfoot>
      <thead>
        <tr>
          <th class="col-xs-3 col-sm-2 col-md-2 col-lg-2">Servicio</th>
          <th class="col-xs-2 col-sm-2 col-md-3 col-lg-3">Periodo</th>
          <th class="col-xs-2 col-sm-2 col-md-1 col-lg-1">Consumo</th>
          <th class="hidden-xs col-sm-5 col-md-4 col-lg-1">Valor</th>
          <th class="hidden-xs hidden-sm col-md-2 col-lg-2">Fecha pago</th>
          <th class="hidden-xs hidden-sm hidden-md col-lg-2">Fecha Limite</th>
          <th class="col-xs-7 col-sm-3 col-md-2 col-lg-1">
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
              <td class="text-nowrap vertical-middle"><?php echo "Del: ".$row_val[2]." hasta: ".$row_val[3];?></td>
              <td class="text-nowrap vertical-middle"><?php echo $row_val[4];?></td>
              <td class="hidden-xs text-nowrap vertical-middle"><?php echo $row_val[5];?></td>
              <td class="hidden-xs hidden-sm text-nowrap vertical-middle"><?php echo $row_val[6];?></td>
              <td class="hidden-xs hidden-sm hidden-md text-nowrap vertical-middle"><?php echo $row_val[7];?></td>
              <td class="vertical-middle" name="<?php echo $row_val[0];?>">
                <a class="col-xs-4 col-sm-4 col-md-4 col-lg-4" href="#detalle-del-apartamento.html" style="width:33%;">
                  <button type="button" class="btn btn-default btn-accion" title="Ver detalle del registro" style="padding: 5px 10px;">
                    <i class="fa fa-eye"></i>
                  </button>
                </a>
                <a class="col-xs-4 col-sm-4 col-md-4 col-lg-4" href="#estado-financiero.html" style="width:33%;">
                  <button type="button" class="btn btn-default btn-accion" title="Editar registro" style="padding: 5px 10px;">
                    <i class="fa fa-pencil"></i>
                  </button>
                </a>
                <a class="col-xs-4 col-sm-4 col-md-4 col-lg-4" href="#contactar-al-administrador.html" style="width:33%;">
                  <button type="button" class="btn btn-default btn-accion" title="Eliminar registro" style="padding: 5px 10px;">
                    <i class="fa fa-remove"></i>
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
  <div class="col-xs-offset-2 col-xs-8 col-sm-offset-4 col-sm-4 col-md-offset-5 col-md-2 col-lg-offset-5 col-lg-2">
    <button type="button" class="btn btn-default form-control" alt="Enviar lista de apartamentos" title="Enviar lista de apartamentos">Enviar</button>
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
      var sq = 0;
      var disabled = "";
      /*ini para los filtros individuales*/
      $('#tabla tfoot th').each(function() {
        // sq += 1;
        var title = $('#tabla thead th').eq($(this).index()).text();
        // if(sq === num_th){disabled = "disabled";}
        $(this).html('<input class="form-control" type="text" placeholder="' + title + '" />');
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
    setTimeout(function(){crearTabla("tabla");}, 200)
    cargaListaServiciosPublicos();
  });
</script>
<!-- FIN Pagina primera pestaña -->