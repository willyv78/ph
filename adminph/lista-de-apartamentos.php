<?php session_start();
require_once ("../conexion/conexion.php");
require_once ("../php/funciones.php");
//////////////////////////////////////////////////////////////////////////////////////
// Aplicación PHP usando Bootstrap, jquery, HTML5 y CSS - PH                        //
// Copyright 2014 Wilson Giovanny Velandia Barreto 3204274564 - willyv78@gmail.com  //
//////////////////////////////////////////////////////////////////////////////////////

$res_val = registroCampo("rmb_aptos a", "a.rmb_aptos_id, t.rmb_torres_nom, a.rmb_aptos_nom, r.rmb_residente_nom, r.rmb_residente_ape, rxa.rmb_tres_id, tes.rmb_est_id", "LEFT JOIN rmb_residente_x_aptos rxa USING(rmb_aptos_id) LEFT JOIN rmb_residente r USING(rmb_residente_id) LEFT JOIN rmb_tesoreria tes USING(rmb_aptos_id) LEFT JOIN rmb_torres t USING(rmb_torres_id)", "GROUP BY a.rmb_aptos_id", "ORDER BY a.rmb_torres_id ASC, a.rmb_aptos_nom ASC, rmb_tesoreria_fpag DESC");
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
        </tr>
      </tfoot>
      <thead>
        <tr>
          <th class="col-xs-3 col-sm-2 col-md-2 col-lg-1">Torre</th>
          <th class="col-xs-2 col-sm-2 col-md-2 col-lg-1">Apto</th>
          <th class="hidden-xs col-sm-5 col-md-4 col-lg-4">Residente</th>
          <th class="hidden-xs hidden-sm col-md-2 col-lg-2">Tipo</th>
          <th class="hidden-xs hidden-sm hidden-md col-lg-2">Estado</th>
          <th class="col-xs-7 col-sm-3 col-md-2 col-lg-2">
            <span class="col-xs-12 col-sm-12 col-md-12 col-lg-12 btn btn-warning btn-accion" title="Nuevo registro"><i class="glyphicon glyphicon-plus"></i></span>
          </th>
        </tr>
      </thead>
      <tbody><?php 
      if ($res_val) {
        if (mysql_num_rows($res_val) > 0) {
          while($row_val = mysql_fetch_array($res_val)){
            $tipo_res = "";
            $clase = "btn-danger";
            if(trim($row_val[6]) == 17){$clase = "btn-success";}
            elseif(trim($row_val[6]) == 18){$clase = "btn-warning";}
            elseif(trim($row_val[6]) == 19){$clase = "borange";}
            elseif(trim($row_val[6]) == 20){$clase = "btn-danger";}

            $clase_det = "btn-danger";
            $res_det = estadoApto($row_val[0]);
            // echo "apto=".$row_val[2]." $res_det=".$res_det."<br>";
            // Si el porcentaje de completado de la informacion esta entre 0 a 49 % hace esto
            if($res_det < 50){$clase_det = "btn-danger";}
            // Si el porcentaje de completado de la informacion del propietario esta entre 50 a 74 % hace esto
            if(($res_det > 49) && ($res_det < 75)){$clase_det = "btn-warning";}
            // Si el porcentaje de completado de la informacion del propietario esta entre 75 a 99 % hace esto
            if(($res_det > 74) && ($res_det < 100)){$clase_det = "btn-primary";}
            // Si el porcentaje de completado de la informacion del propietario esta al 100 % hace esto
            if($res_det >= 100){$clase_det = "btn-default-inverse";$res_det = 100;}?>
            <tr>
              <td class="text-nowrap vertical-middle"><?php echo $row_val[1];?></td>
              <td class="text-nowrap vertical-middle"><?php echo $row_val[2];?></td>
              <td class="hidden-xs text-nowrap vertical-middle"><?php 
                // echo $row_val[3]." ".$row_val[4];
                $res_res = registroCampo("rmb_residente r", "r.rmb_residente_nom, r.rmb_residente_ape", "LEFT JOIN rmb_residente_x_aptos rxa USING(rmb_residente_id) WHERE rxa.rmb_aptos_id = ".$row_val[0]." AND rxa.rmb_tres_id = 1", "", "ORDER BY r.rmb_residente_id DESC");
                if($res_res){
                  if(mysql_num_rows($res_res) > 0){
                    $row_res = mysql_fetch_array($res_res);
                    $tipo_res = "Propietario";
                    echo $row_res[0]." ".$row_res[1];
                  }
                }?>
              </td>
              <td class="hidden-xs hidden-sm text-nowrap vertical-middle"><?php 
                if($tipo_res){
                  echo $tipo_res;
                }
                else{
                  echo nombreCampo($row_val[5], "rmb_tres");
                }?></td>
              <td class="hidden-xs hidden-sm hidden-md text-nowrap vertical-middle"><?php echo nombreCampo($row_val[6], "rmb_est");?></td>
              <td id="lista_historial_facturas" class="lista_historial_facturas vertical-middle" name="<?php echo $row_val[0];?>">
                <a class="col-xs-4 col-sm-4 col-md-4 col-lg-4" href="#detalle-del-apartamento.html" style="width:33%;">
                  <button type="button" class="btn <?php echo $clase_det;?> btn-accion" title="Datos del Apartamento" style="padding: 5px 10px;">
                    <div><?php echo $res_det."%";?></div>
                    <img src="../images/iconos/home1.png" alt="Detalle del apartamento" width="70%">
                  </button>
                </a>
                <a class="col-xs-4 col-sm-4 col-md-4 col-lg-4" href="#estado-financiero.html" style="width:33%;">
                  <button type="button" class="btn <?php echo $clase;?> btn-accion" title="Estado Financiero" style="padding: 7px 10px;">
                    <img src="../images/iconos/home2.png" alt="Estado financiero" width="100%">
                  </button>
                </a>
                <a class="col-xs-4 col-sm-4 col-md-4 col-lg-4" href="#contactar-al-administrador.html" style="width:33%;">
                  <button type="button" class="btn btn-warning btn-accion disabled" title="Enviar mensaje" style="padding: 7px 10px;">
                    <img src="../images/iconos/home3.png" alt="Enviar mensaje" width="100%">
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

      /*ini para los filtros individuales*/

      setTimeout(function(){
        $('#tabla tfoot th').each(function() {
          var title = $('#tabla thead th').eq($(this).index()).text();
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
      }, 400);

      /*fin filtros individuales*/

      function fnGetSelected(oTableLocal) {
        return oTableLocal.$('tr.row_selected');
      }
    }
    setTimeout(function(){crearTabla("tabla");}, 200)
    accionEstFinanciero();
  });
</script>
<!-- FIN Pagina primera pestaña -->