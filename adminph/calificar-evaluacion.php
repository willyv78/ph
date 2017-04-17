<?php session_start();
require_once ("../conexion/conexion.php");
require_once ("../php/funciones.php");
//////////////////////////////////////////////////////////////////////////////////////
// Aplicación PHP usando Bootstrap, jquery, HTML5 y CSS - PH                        //
// Copyright 2014 Wilson Giovanny Velandia Barreto 3204274564 - willyv78@gmail.com  //
//////////////////////////////////////////////////////////////////////////////////////

$res_val = registroCampo("rmb_eva e", "e.rmb_eva_id, e.rmb_eva_nom", "WHERE rmb_eva_est = 1", "", "ORDER BY e.rmb_eva_id DESC");
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
          <th class="col-xs-8 col-sm-6 col-md-7 col-lg-8">Nombre</th>
          <th class="hidden-xs col-sm-2 col-md-2 col-lg-2">Calificación</th>
          <th class="col-xs-4 col-sm-4 col-md-3 col-lg-2">Calificar</th>
        </tr>
      </thead>
      <tbody><?php 
      if ($res_val) {
        if (mysql_num_rows($res_val) > 0) {
          while($row_val = mysql_fetch_array($res_val)){
            $total = 0;
            $res_cal_tema_cate_eva = registroCampo("rmb_eva_tema_x_cate_cal cal", "SUM(cal.rmb_eva_tema_x_cate_cal_cal), COUNT(cal.rmb_eva_tema_x_cate_cal_cal)", "LEFT JOIN rmb_eva_tema_x_cate tc USING(rmb_eva_tema_x_cate_id) WHERE tc.rmb_eva_id = ".$row_val[0]." AND rmb_residente_id = ".$_SESSION['UsuID'], "", "");
            if($res_cal_tema_cate_eva){
                if(mysql_num_rows($res_cal_tema_cate_eva) > 0){
                    $row_cal_tema_cate_eva = mysql_fetch_array($res_cal_tema_cate_eva);
                    $cal = $row_cal_tema_cate_eva[0];
                    $can = $row_cal_tema_cate_eva[1];
                    $total = $cal / $can;
                    if($total < 1){$total = 0;}
                }
            }?>
            <tr>
              <td class="text-nowrap vertical-middle"><?php echo $row_val[1];?></td>
              <td class="hidden-xs text-nowrap vertical-middle"><?php echo $total;?></td>
              <td class="lista_evaluaciones vertical-middle" name="<?php echo $row_val[0];?>">
                <button type="button" class="btn btn-default btn-accion" title="Calificar Evaluación" alt="Calificar Evaluación" style="padding: 5px 10px;"><?php 
                  for($i = 1; $i <= 5; $i++){
                      if($i > $total){$clase = "glyphicon-star-empty";}
                      else{$clase = "glyphicon-star";}
                      echo '<i class="glyphicon '.$clase.'"></i>';
                  }?>
                </button>
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
          $(this).html('<input class="form-control" type="text" placeholder=" Busqueda por ' + title + ' de la evaluación" />');
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
    cargaListaCalificaEva();
  });
</script>
<!-- FIN Pagina primera pestaña -->