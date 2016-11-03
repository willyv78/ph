<?php
session_start();
require_once ("../conexion/conexion.php");
require_once ("../php/funciones.php");
//////////////////////////////////////////////////////////////////////////////////////
// Aplicación PHP usando Bootstrap, jquery, HTML5 y CSS - PH                        //
// Copyright 2014 Wilson Giovanny Velandia Barreto 3204274564 - willyv78@gmail.com  //
//////////////////////////////////////////////////////////////////////////////////////
    
$res_taptos = registroCampo("rmb_taptos t", "t.rmb_taptos_id, t.rmb_taptos_nom, t.rmb_taptos_area, t.rmb_taptos_coef", "", "", "");
?>
<!-- Titulo de la pagina -->
<!-- <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 titulo-pagina">
   <input type="hidden" value="rmb_residente">
   <h3 class="text-left">Tipos de Apartamento</h3>
</div> -->
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
  <div class="table-responsive">
    <table class="table table-hover" id="tabla">
      <tfoot>
        <tr>
          <th>Tipo</th>
          <th class="hidden-xs hidden-sm">Área Construida</th>
          <th class="hidden-xs">Coeficiente</th>
        </tr>
      </tfoot>
      <thead>
        <tr>
          <th class='col-xs-7 col-sm-4 col-md-2 col-lg-3 text-center'>Tipo</th>
          <th class='hidden-xs hidden-sm col-md-3 col-lg-3 text-center'>Const. Mts2</th>
          <th class='hidden-xs col-sm-4 col-md-3 col-lg-3 text-center'>Coef. %</th>
          <th class='col-xs-5 col-sm-4 col-md-4 col-lg-3 text-center'>
            <input id="tipo_nom" name="tipo_nom" type="hidden" value="col-md-12">
            <span class="col-xs-12 col-sm-12 col-md-12 col-lg-12 btn btn-warning" title="Nuevo registro"><i class="glyphicon glyphicon-plus"></i></span>
          </th>
        </tr>
      </thead>
      <tbody><?php 
      $num_res = "";
      if($res_taptos){
        if(mysql_num_rows($res_taptos) > 0){
          $num_res = mysql_num_rows($res_taptos);?><?php 
          while ($row_taptos = mysql_fetch_array($res_taptos)) {?>
            <tr class="">
              <td class='col-xs-7 col-sm-4 col-md-3 col-lg-3 text-center'><?php echo $row_taptos[1];?></td>
              <td class='hidden-xs hidden-sm col-md-3 col-lg-3 text-center'><?php echo $row_taptos[2];?></td>
              <td class='hidden-xs col-sm-4 col-md-3 col-lg-3 text-center'><?php echo $row_taptos[3];?></td>
              <td class='col-xs-5 col-sm-4 col-md-3 col-lg-3 text-center'>
                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 btn_est" name="<?php echo $row_taptos[0];?>">
                  <button class="btn btn-info form-control" title="Ver Información"><i class="glyphicon glyphicon-eye-open"></i></button>
                </div>
                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 btn_est" name="<?php echo $row_taptos[0];?>">
                  <button class="btn btn-success form-control" title="Editar Información"> <i class="glyphicon glyphicon-pencil"></i></button>
                </div>
                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 btn_est" name="<?php echo $row_taptos[0];?>">
                  <button class="btn btn-danger form-control" name="perm" title="Eliminar"> <i class="glyphicon glyphicon-remove"></i></button>
                </div>
              </td>
            </tr><?php 
          }
        }
        else {?>
          <tr>
            <td colspan="4">
              <strong>Atención! </strong>No se encontraron registros
            </td>
          </tr><?php 
        }
      }
      else {?>
        <tr>
          <td colspan="4">
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
    jQuery(document).ready(function($){
      var num_res = '<?php echo $num_res;?>';
      // funcion que se ejecuta al crear una tabla
      function crearTabla (selector) {
        $('#tabla tfoot th').each( function () {
          var title = $(this).text();
          $(this).html( '<input type="text" placeholder="Buscar '+title+'" />' );
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
      crearTabla("tabla");
      accionListaTaptos();
    });
</script>
