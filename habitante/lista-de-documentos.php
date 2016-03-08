<?php session_start();
require_once ("../conexion/conexion.php");
require_once ("../php/funciones.php");
// include_once ("../php/datatable.php");
$tipo = "";
if(isset($_GET['tipo'])){
    $tipo = $_GET['tipo'];
}
$res_val = DocumentoTipoSQL("rmb_document_nom", "ASC", $tipo);
// Tabla Estado Propietario?>
<table class="table table-hover" id="tabla">
  <tfoot style="display: table-header-group;">
    <tr>
      <th></th>
      <th class="hidden-xs hidden-sm"></th>
      <th class="hidden-xs"></th>
    </tr>
  </tfoot>
  <thead>
    <tr>
      <th class="col-xs-11 col-sm-8 col-md-3 col-lg-3 text-nowrap text-center"><div style='overflow:hidden;white-space:nowrap;text-overflow: ellipsis;width:100%;text-align:center'>Nombre</div></th>
      <th class="hidden-xs hidden-sm col-md-6 col-lg-7 text-nowrap">Descripción</th>
      <th class="hidden-xs col-sm-3 col-md-2 col-lg-1 text-nowrap">Fecha</th>
      <th class="col-xs-1 col-sm-1 col-md-1 col-lg-1 id_tipo" id_tipo="<?php echo $tipo;?>"></th>
    </tr>
  </thead>
  <tbody><?php
  if ($res_val) {
    if (mysql_num_rows($res_val) > 0) {
          for ($i = 0; $i < mysql_num_rows($res_val); $i++) {
            list($id[$i], $nombre[$i], $descripcion[$i], $fecha[$i], $acta[$i]) = mysql_fetch_array($res_val);
            $perfil = PerfilId($id[$i]);
            echo "<tr>
            <td class='col-xs-11 col-sm-8 col-md-3 col-lg-3 text-nowrap'><div style='overflow:hidden;white-space:nowrap;text-overflow: ellipsis;width:100%;text-align:left'>" . cortarTexto($nombre[$i], 31) . "</div></td>
            <td class='hidden-xs hidden-sm text-nowrap'>" . cortarTexto($descripcion[$i], 50) . "</td>
            <td class='hidden-xs text-nowrap'>" . $fecha[$i] . "</td>
            <td class='text-nowrap id_tipo' name='".$id[$i]."' id_tipo='".$tipo."'>
              <button name='".$acta[$i]."' type='button' class='btn btn-default' title='Descargar documento' alt='Descargar documento'><i class='glyphicon glyphicon-save'></i></button>
            </td>
            </tr>";
          }
    }
    else {?>
      <tr>
        <td class='datos-tabla' colspan='4'>No hay registros</td>
      </tr><?php 
    }
  }
  else {?>
    <tr>
      <td class='datos-tabla' colspan='4'>Error en la consulta</td>
    </tr><?php 
  }?>
  </tbody>
</table>
<script>
    $(document).ready(function() {
        editarDocs();
    });
</script>
<!-- FIN Pagina primera pestaña -->