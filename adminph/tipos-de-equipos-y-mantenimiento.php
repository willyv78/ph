<?php session_start();
require_once ("../conexion/conexion.php");
require_once ("../php/funciones.php");
$res_tipoeq = registroCampo("rmb_teq", "*", "", "", "ORDER BY rmb_teq_nom ASC");
?>
<!-- lista de tipos de equipos -->
<dl class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><?php 
    if($res_tipoeq){
        if(mysql_num_rows($res_tipoeq) > 0){
            while($row_tipoeq = mysql_fetch_array($res_tipoeq)){?>
                <a class="col-xs-12 col-sm-6 col-md-4 col-lg-3 tipos-apartamento" id="<?php echo $row_tipoeq[0];?>" href="#tipo-de-equipos-y-mantenimiento-<?php echo $row_tipoeq[0];?>.html">
                    <dt><?php echo $row_tipoeq[1];?></dt>
                </a>
            <?php }
        }
    }?>
</dl>
<script>
    $(document).ready(function() {
        cargarTipoMantenimiento();
    });
</script>
<!-- Fin lista de tipos de equipos -->