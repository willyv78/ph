<?php session_start();
require_once ("../conexion/conexion.php");
require_once ("../php/funciones.php");
// include_once ("../php/datatable.php");
$tipo = "";
if(isset($_GET['tipo'])){
    $tipo = $_GET['tipo'];
}
$res_val = DocumentoTipoSQL("rmb_document_nom", "ASC", $tipo);?>
<!-- Tabla Estado Propietario -->
<table class="table table-hover" id="tabla">
  <thead>
    <tr>
      <th class="col-xs-8 col-sm-6 col-md-3 col-lg-3 text-nowrap">Nombre</th>
      <th class="hidden-xs hidden-sm col-md-4 col-lg-5 text-nowrap">Descripción</th>
      <th class="hidden-xs col-sm-3 col-md-2 col-lg-1 text-nowrap">Fecha</th>
      <th class="col-xs-4 col-sm-3 col-md-3 col-lg-3 text-nowrap id_tipo" id_tipo="<?php echo $tipo;?>">
        <button type="button" class="btn btn-warning" alt="Nuevo Documento" title="Nuevo Documento"><i class="glyphicon glyphicon-plus"></i> Nuevo</button>
      </th>
    </tr>
  </thead>
  <tbody><?php
  if ($res_val) {
    if (mysql_num_rows($res_val) > 0) {
          for ($i = 0; $i < mysql_num_rows($res_val); $i++) {
            list($id[$i], $nombre[$i], $descripcion[$i], $fecha[$i], $acta[$i]) = mysql_fetch_array($res_val);
            $perfil = PerfilId($id[$i]);
            echo "<tr>
            <td class='col-xs-8 col-sm-6 col-md-3 col-lg-3 text-nowrap'><div style='overflow:hidden;white-space:nowrap;text-overflow: ellipsis;max-width:100%;text-align:left'>" . cortarTexto($nombre[$i], 31) . "</div></td>
            <td class='hidden-xs hidden-sm col-md-4 col-lg-5' style='text-align:left'><div style='overflow:hidden;white-space:nowrap;text-overflow: ellipsis;max-width:100%;text-align:left'>" . cortarTexto($descripcion[$i], 40) . "</div></td>
            <td class='hidden-xs col-sm-3 col-md-2 col-lg-1 text-nowrap'>" . $fecha[$i] . "</td>
            <td class='col-xs-4 col-sm-3 col-md-3 col-lg-3 id_tipo' name='".$id[$i]."' id_tipo='".$tipo."'>
              <div class='col-xs-6 col-sm-6 col-md-6 col-lg-3'>
                <button name='".$acta[$i]."' type='button' class='btn btn-default form-control' title='Descargar documento' alt='Descargar documento'><i class='glyphicon glyphicon-save'></i></button>
              </div>
              <div class='col-xs-6 col-sm-6 col-md-6 col-lg-3'>
                <button type='button' class='btn btn-info form-control' title='Ver detalle del documento' alt='Ver detalle del documento'><i class='glyphicon glyphicon-eye-open'></i></button>
              </div>
              <div class='col-xs-6 col-sm-6 col-md-6 col-lg-3'>
                <button type='button' class='btn btn-success form-control' title='Editar detalle del documento' alt='Editar detalle del documento'><i class='glyphicon glyphicon-pencil'></i></button>
              </div>
              <div class='col-xs-6 col-sm-6 col-md-6 col-lg-3'>
                <button type='button' class='btn btn-danger form-control' title='Eliminar documento' alt='Eliminar documento'><i class='glyphicon glyphicon-remove'></i></button>
              </div>
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