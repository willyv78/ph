<?php session_start();
require_once ("../conexion/conexion.php");
require_once ("../php/funciones.php");
//////////////////////////////////////////////////////////////////////////////////////
// Aplicación PHP usando Bootstrap, jquery, HTML5 y CSS - PH                        //
// Copyright 2014 Wilson Giovanny Velandia Barreto 3204274564 - willyv78@gmail.com  //
//////////////////////////////////////////////////////////////////////////////////////
$res_val = registroCampo("rmb_aptos a", "a.rmb_aptos_id, t.rmb_torres_nom, a.rmb_aptos_nom, r.rmb_residente_nom, r.rmb_residente_ape, rxa.rmb_tres_id, tes.rmb_est_id", "LEFT JOIN rmb_residente_x_aptos rxa USING(rmb_aptos_id) LEFT JOIN rmb_residente r USING(rmb_residente_id) LEFT JOIN rmb_tesoreria tes USING(rmb_aptos_id) LEFT JOIN rmb_torres t USING(rmb_torres_id)", "GROUP BY a.rmb_aptos_id", "ORDER BY a.rmb_torres_id ASC, a.rmb_aptos_nom ASC");
?>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
  <div class="table-responsive">
    <table class="table table-hover display" id="tabla">
      <tfoot class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
          <tr class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
              <th class="hidden-xs col-sm-4 col-md-3 col-lg-2">torre</th>
              <th class="col-xs-12 col-sm-4 col-md-3 col-lg-2">apartamento</th>
              <th class="hidden-xs col-sm-4 col-md-3 col-lg-4">residente</th>
              <th class="hidden-xs hidden-sm col-md-3 col-lg-2">tipo de residente</th>
              <th class="hidden-xs hidden-sm hidden-md col-lg-2">estado</th>
          </tr>
      </tfoot>
      <thead class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
          <tr class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
              <th class="hidden-xs col-sm-1 col-md-1 col-lg-1">Torre</th>
              <th class="col-xs-4 col-sm-1 col-md-1 col-lg-1">Apto</th>
              <th class="hidden-xs col-sm-6 col-md-4 col-lg-4">Residente</th>
              <th class="hidden-xs hidden-sm col-md-2 col-lg-2">Tipo</th>
              <th class="hidden-xs hidden-sm hidden-md col-lg-2">Estado</th>
              <th class="col-xs-8 col-sm-4 col-md-4 col-lg-2">
                <span class="col-xs-12 col-sm-12 col-md-12 col-lg-12 btn btn-warning" title="Nuevo registro"><i class="glyphicon glyphicon-plus"></i></span>
              </th>
          </tr>
      </thead>
      <tbody class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><?php 
      $num_res = "";
      if ($res_val) {
        if (mysql_num_rows($res_val) > 0) {
          $num_res = mysql_num_rows($res_val);
          while($row_val = mysql_fetch_array($res_val)){
            $clase = "btn-info";
            if(trim($row_val[6]) == 17){$clase = "btn-success";}
            elseif(trim($row_val[6]) == 18){$clase = "btn-warning";}
            elseif(trim($row_val[6]) == 19){$clase = "borange";}
            elseif(trim($row_val[6]) == 20){$clase = "btn-danger";}?>
            <tr class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
              <td class="hidden-xs col-sm-1 col-md-1 col-lg-1"><?php echo $row_val[1];?></td>
              <td class="col-xs-4 col-sm-1 col-md-1 col-lg-1 <?php echo $clase;?>"><?php echo $row_val[2];?></td>
              <td class="hidden-xs col-sm-6 col-md-4 col-lg-4"><?php echo $row_val[3]." ".$row_val[4];?></td>
              <td class="hidden-xs hidden-sm col-md-2 col-lg-2"><?php echo nombreCampo($row_val[5], "rmb_tres");?></td>
              <td class="hidden-xs hidden-sm hidden-md col-lg-2"><?php echo nombreCampo($row_val[6], "rmb_est");?></td>
              <td id="lista_historial_facturas" class="col-xs-8 col-sm-4 col-md-4 col-lg-2 lista_historial_facturas" name="<?php echo $row_val[0];?>">
                <a class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                  <button type="button" class="btn btn-info" title="Datos del Apartamento" style="padding: 5px 10px;">
                      <img src="../images/iconos/home1.png" alt="" width="100%">
                  </button>
                </a>
                <a class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                  <button type="button" class="btn btn-success disabled" title="Estado Financiero" style="padding: 5px 10px;">
                      <img src="../images/iconos/home2.png" alt="" width="100%">
                  </button>
                </a>
                <a class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                  <button type="button" class="btn btn-warning disabled" title="Enviar mensaje" style="padding: 5px 10px;">
                      <img src="../images/iconos/home3.png" alt="" width="100%">
                  </button>
                </a>
              </td>
            </tr><?php 
          }
        }
        else {?>
          <tr>
            <td colspan="6">
              <strong>Atención! </strong>No se encontraron registros
            </td>
          </tr><?php 
        }
      }
      else {?>
        <tr>
          <td colspan="6">
            <strong>Atención! </strong>Error en la consulta
          </td>
        </tr><?php 
      }?>
      </tbody>
    </table>
  </div>
</div>
<script src="../js/jquery-1.12.3.js"></script>
<script src="../js/jquery.dataTables.min.js"></script>
<script>

  $(document).ready(function() {
    var num_res = '<?php echo $num_res;?>';
    function crearTabla() {
      $('#tabla tfoot th').each( function () {
        var title = $(this).text();
        $(this).html( '<input class="form-control" type="text" placeholder="Buscar '+title+'" />' );
      } );
      if(num_res > 0){
        // DataTable
        var table = $('#tabla').DataTable({"dom": '<"toolbar">rt'});
        // Apply the filter
        $( 'input' ).on( 'keyup', function () {
          table.columns($(this).parent().index()).search(this.value).draw();
          $("#tabla > thead > tr > th:last-child").removeClass('sorting');
          $(".btn").on("click", verEstFinanciero);
        });
      }
      // esta funcion quita los iconos de ordenar de la columan de los botones por que no aplica
      $("#tabla thead tr th").on('click', function() {
        $("#tabla > thead > tr > th:last-child").removeClass('sorting');
        $(".btn").on("click", verEstFinanciero);
      });
    }
    crearTabla();
    accionEstFinanciero();
  });
</script>
<!-- FIN Pagina primera pestaña -->