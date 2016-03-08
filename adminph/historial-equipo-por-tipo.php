<?php session_start();
require_once ("../conexion/conexion.php");
require_once ("../php/funciones.php");
$id_equipo = $_GET['id_equipo'];
$query_sql = Mantenimientos($id_equipo);
?>

<div class="modal-dialog" style="width:80%;">
   <div class="modal-content">
      <div class="modal-header">
         <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 titulo-pagina">
            <div class="clearfix">&nbsp;</div>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">
               <span style="font-weight: bold;color: #546E7A">
                  <i class="glyphicon glyphicon-search"></i>&nbsp;Historial Equipo
               </span>
            </h4>
            <input type="hidden" name="rmb_equipos_id" id="rmb_equipos_id" class="form-control" value="<?php echo $id_equipo;?>">
            <div class="clearfix">&nbsp;</div>
         </div>
      </div>
      <div class="modal-body">
         <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><?php 
            if($query_sql){
               if(mysql_num_rows($query_sql) > 0){?>
                  <div class="table-responsive">
                     <table class="table table-hover" id="histo-tabla">
                        <thead>
                           <tr>
                              <th class="col-xs-12 col-sm-4 col-md-2 col-lg-2">Fecha Mant.</th>
                              <th class="hidden-xs col-sm-8 col-md-2 col-lg-2">Prox. Mant.</th>
                              <th class="hidden-xs hidden-sm col-md-2 col-lg-2">Valor</th>
                              <th class="hidden-xs hidden-sm col-md-2 col-lg-2">Estado</th>
                              <th class="hidden-xs hidden-sm col-md-4 col-lg-4">Observación</th>
                           </tr>
                        </thead>
                        <tbody><?php
                           for($i = 0; $i < mysql_num_rows($query_sql); $i++){
                              list($id[$i], $id_eq[$i], $fmant[$i], $fprox[$i], $obs[$i], $val[$i], $est[$i], $emp[$i], $fecha[$i], $user[$i]) = mysql_fetch_array($query_sql);

                              echo "
                              <tr name='".$id[$i]."' alt='Haga click para editar o eliminar este mantenimiento' title='Haga click para editar o eliminar este mantenimiento'>
                                 <td>
                                    <div>
                                       <span style='font-family:Arial;font-size:13px;'>" . $fmant[$i] . "</span>
                                    </div>
                                 </td>
                                 <td class='hidden-xs'>
                                    <div>
                                       <span style='font-family:Arial;font-size:13px;'>" . $fprox[$i] . "</span>
                                    </div>
                                 </td>
                                 <td class='hidden-xs hidden-sm'>
                                    <div>
                                       <span style='font-family:Arial;font-size:13px;'>" . $val[$i] . "</span>
                                    </div>
                                 </td>
                                 <td class='hidden-xs hidden-sm'>
                                    <div>
                                       <span style='font-family:Arial;font-size:13px;'>" . nombreCampo($est[$i], "rmb_est") . "</span>
                                    </div>
                                 </td>
                                 <td class='hidden-xs hidden-sm'>
                                    <div>
                                       <span style='font-family:Arial;font-size:13px;'>" . $obs[$i] . "</span>
                                    </div>
                                 </td>
                              </tr>";
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
            <div class="form-group text-center col-xs-offset-2 col-sm-offset-5 col-md-offset-5 col-lg-offset-5 col-xs-8 col-sm-3 col-md-2 col-lg-2">
               <button type="button" class="btn btn-default form-control" alt="Agregar nuevo mantenimiento de equipo" title="Agregar nuevo mantenimiento de equipo">Nuevo</button>
            </div>
         </div>
      </div>
      <div class="modal-footer"></div>
   </div>
</div>
<script>
   $(document).ready(function() {
      histoMantenimiento();
   });
</script>

