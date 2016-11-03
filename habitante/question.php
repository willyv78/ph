<?php session_start();
require_once ("../conexion/conexion.php");
require_once ("../php/funciones.php");
//////////////////////////////////////////////////////////////////////////////////////
// Aplicación PHP usando Bootstrap, jquery, HTML5 y CSS - PH                        //
// Copyright 2014 Wilson Giovanny Velandia Barreto 3204274564 - willyv78@gmail.com  //
//////////////////////////////////////////////////////////////////////////////////////
$res_question = registroCampo("rmb_question q", "*", "", "", "ORDER BY q.rmb_question_id ASC");
?>
<!-- Titulo de la pagina -->
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 titulo-pagina">
   <h3 class="pull-left">Preguntas frecuentes</h3>
</div>
<div class="clearfix"></div>
<!-- Contenido preguntas frecuentes -->
<?php 
if($res_question){
    if(mysql_num_rows($res_question) > 0){
        while($row_question = mysql_fetch_array($res_question)){?>
            <div class='panel panel-default' data-toggle='collapse' href='#collapseExample<?php echo $row_question[0];?>' aria-expanded='false' aria-controls='collapseExample<?php echo $row_question[0];?>'>
                <div class='mens-est btn-primary'></div>
                <div class='panel-heading'>
                    <span class='col-xs-9 col-sm-10 col-md-10 col-lg-10 text-nowrap modal-open text-left'><?php echo $row_question[1];?></span><br>
                </div>
            </div>
            <div class='panel-body collapse' style="padding: 0;" id='collapseExample<?php echo $row_question[0];?>'>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 alert alert-info text-left"><?php echo $row_question[2];?></div>
            </div><?php 
        }
    }
    else{?>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 alert alert-danger text-left">
            No se encontraron registros.
        </div><?php 
    }
}
else{?>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 alert alert-danger text-left">
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta possimus dolores velit laudantium maiores ea nobis, omnis sapiente. Dignissimos corporis hic doloremque quaerat expedita in totam esse iure eos commodi.
    </div>
<?php }?>

<script>cargarQuestion();</script>
<!-- FIN Pagina primera pestaña -->